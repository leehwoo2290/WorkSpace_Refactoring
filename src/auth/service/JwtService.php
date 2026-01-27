<?php
declare(strict_types=1);

namespace App\auth\service;

use App\auth\component\JwtManager;
use App\auth\component\TokenTransport;
use App\user\component\UserContext;
use App\auth\component\JwtBootstrapper;
use App\auth\dto\JwtTokenPair;
use App\auth\entity\RefreshTokenEntity;
use App\auth\component\RefreshTokenHasher;
use App\user\component\UserLoginLogRecoder;
use App\auth\repository\RefreshTokenRepository;
use App\auth\repository\UserRoleRepository;
use App\auth\repository\UserAuthRepository;
use App\user\repository\UserLoginLogRepository;
use App\auth\dto\request\UserLoginReq;
use App\auth\dto\response\UserLoginRes;
use App\auth\dto\response\UserMeRes;
use App\auth\dto\response\JwtTokenRes;
use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;

use App\common\db\DbTransactionRunner;

use DateTimeImmutable;

/**
 * 인증/토큰 유스케이스(Service).
 *
 * - JwtManager/TokenService/Repository 같은 "핵심 로직"을 조합해서
 *   login/refresh/logout/bootstrap 같은 유스케이스 단위 API를 제공한다.
 * - CI3/CI4에서도 재사용 가능하도록 "프레임워크 의존"은 TokenTransport(입출력)로만 한정한다.
 */
final class JwtService
{
    private JwtManager $jwtManager;
    private TokenTransport $tokenTransport;
    private UserContext $userContext;
    private UserRoleRepository $userRoleRepository;
    private UserAuthRepository $userAuthRepository;
    private JwtBootstrapper $jwtBootstrapper;
    private RefreshTokenHasher $refreshTokenHasher;
    private RefreshTokenRepository $refreshTokenRepository;
    private UserLoginLogRecoder $loginLogRecoder;
    private UserLoginLogRepository $userLoginLogRepository;
    private DbTransactionRunner $dbTransactionRunner;

    public function __construct(
        JwtManager $jwtManager,
        TokenTransport $transport,
        UserContext $userContext,
        UserRoleRepository $roleRepository,
        UserAuthRepository $authRepository,
        UserLoginLogRepository $userLoginLogRepository,
        RefreshTokenHasher $hasher,
        RefreshTokenRepository $refreshTokenRepository,
        DbTransactionRunner $dbTransactionRunner
    ) {
        $this->jwtManager = $jwtManager;
        $this->tokenTransport = $transport;
        $this->userContext = $userContext;
        $this->userRoleRepository = $roleRepository;
        $this->userAuthRepository = $authRepository;
        $this->refreshTokenHasher = $hasher;
        $this->refreshTokenRepository = $refreshTokenRepository;
        $this->userLoginLogRepository = $userLoginLogRepository;
        $this->dbTransactionRunner = $dbTransactionRunner;

        $this->loginLogRecoder = new UserLoginLogRecoder($userLoginLogRepository);
        $this->jwtBootstrapper = new JwtBootstrapper($jwtManager, $this, $transport, $userContext, $roleRepository);
    }

    public function context(): UserContext
    {
        return $this->userContext;
    }

    //요청 시작 시 1회 호출: access 검증 
    public function bootstrap(): void
    {
        $this->jwtBootstrapper->bootstrap();
    }

    public function loginByCredentials(UserLoginReq $userLoginReq): UserLoginRes
    {
        $user = $this->userAuthRepository->findByEmail($userLoginReq->email());
        $deviceId = $this->tokenTransport->getDeviceId();

        try {
            if (!$user)
                throw ApiException::unauthorized('USER_NOT_FOUND', ApiErrorCode::USER_NOT_FOUND);

            // status/black 체크 (레거시 규칙 반영)
            if (($user->status ?? '') !== 'Normal')
                throw ApiException::forbidden('USER_NOT_ACTIVE', ApiErrorCode::USER_NOT_ACTIVE);
            if (($user->black ?? 'N') === 'Y')
                throw ApiException::forbidden('USER_BLOCKED', ApiErrorCode::USER_BLOCKED);

            //$this->verifyPasswordAndMaybeUpgrade((int) $user->seq, (string) ($user->passwd ?? ''), $userLoginReq->passwd());
            // 비번 체크 (레거시: SHA1)
            $hashed = sha1($userLoginReq->passwd());
            if (!hash_equals((string) $user->passwd, $hashed)) {
                throw ApiException::unauthorized('INVALID_PASSWORD', ApiErrorCode::INVALID_PASSWORD);
            }

            $roles = $this->userRoleRepository->rolesOf((int) $user->seq);
            if (empty($roles)) {
                throw ApiException::forbidden('USER_NO_ROLES', ApiErrorCode::USER_NO_ROLES);
            }

            // 토큰 발급 + 쿠키 set + refresh 저장
            $jwtTokenRes = $this->login((int) $user->seq, $roles);
            $this->loginLogRecoder->logSuccess($userLoginReq->email(), $deviceId);

            return new UserLoginRes(
                (int) $user->seq,
                (string) $user->email,
                $user->name ?? null,
                $roles,
                (string) $user->status,
                (int) $user->license_seq,
                (($user->pw_reset ?? 'N') === 'Y'),
                $jwtTokenRes
            );
        } catch (ApiException $e) {
            // 레거시와 동일하게 "비번 불일치"만 실패 로그 남기기
            if (method_exists($e, 'errorCode') && $e->errorCode() === ApiErrorCode::INVALID_PASSWORD) {
                // 비번 평문 저장 금지 → null로 남김
                $this->loginLogRecoder->logFail($userLoginReq->email(), null, $deviceId);
            }

            throw $e;
        }

    }



    //로그인 성공 직후 호출
    public function login(int $userSeq, array $roles): JwtTokenRes
    {
        if (!$this->userRoleRepository->exists($userSeq)) {
            throw ApiException::unauthorized('USER_NOT_FOUND', ApiErrorCode::USER_NOT_FOUND);
        }

        $deviceId = $this->tokenTransport->getDeviceId();

        $firstIssuedAt = new DateTimeImmutable('now');

        //DB 쓰기( revoke + insert )는 트랜잭션으로 원자성 보장
        $jwtTokenPair = $this->dbTransactionRunner->run(function () use ($userSeq, $roles, $deviceId, $firstIssuedAt) {
            if ($deviceId !== null) {
                $this->refreshTokenRepository->revokeActiveByUserSeqAndDeviceId($userSeq, $deviceId);
            }

            $jwtTokenPair = $this->jwtManager->generateTokens($userSeq, $roles, $firstIssuedAt);

            $refreshClaims = $this->jwtManager->validateRefreshToken($jwtTokenPair->getRefreshToken());

            $refreshTokenEntity = RefreshTokenEntity::createToken(
                $userSeq,
                (string) $refreshClaims->jti,
                $this->refreshTokenHasher->hash($jwtTokenPair->getRefreshToken()),
                $firstIssuedAt,
                (new DateTimeImmutable())->setTimestamp($jwtTokenPair->getRefreshExp()),
                $jwtTokenPair->getTokenVersion(),
                $deviceId
            );

            $this->refreshTokenRepository->insert($refreshTokenEntity);

            return $jwtTokenPair;
        });

        //커밋 이후에만 클라이언트에 토큰 저장 / 컨텍스트 인증 처리
        $this->tokenTransport->store($jwtTokenPair);
        $this->userContext->authenticate($userSeq, $roles);

        return new JwtTokenRes(
            $jwtTokenPair->getAccessToken(),
            (int) $jwtTokenPair->getAccessExp()
        );
    }

    //sha1에서 bcrypt/argon2로 비밀번호 해시 업그레이드 (확정아님)
    private function verifyPasswordAndMaybeUpgrade(int $userSeq, string $stored, string $plain): void
    {
        $stored = trim($stored);

        // bcrypt/argon2 계열
        if ((strpos($stored, '$2y$') === 0) || (strpos($stored, '$argon2id$') === 0) || (strpos($stored, '$argon2i$') === 0)) {
            if (!password_verify($plain, $stored)) {
                throw ApiException::unauthorized('INVALID_PASSWORD', ApiErrorCode::INVALID_PASSWORD);
            }
            return;
        }

        // 레거시 SHA1
        $sha1 = sha1($plain);
        if (!hash_equals($stored, $sha1)) {
            throw ApiException::unauthorized('INVALID_PASSWORD', ApiErrorCode::INVALID_PASSWORD);
        }

        // 성공하면 bcrypt로 자동 업그레이드(실패해도 로그인은 성공)
        try {
            $newHash = password_hash($plain, PASSWORD_BCRYPT, ['cost' => 12]);
            if ($newHash)
                $this->userAuthRepository->updatePasswordHash($userSeq, $newHash);
        } catch (\Throwable $e) {
            // no-op
        }
    }

    public function me(): UserMeRes
    {
        if (!$this->userContext->isAuthenticated()) {
            throw ApiException::unauthorized('UNAUTHORIZED', ApiErrorCode::UNAUTHORIZED);
        }

        return new UserMeRes((int) $this->userContext->seq(), $this->userContext->roles());
    }


    //refresh endpoint 호출
    public function refreshAccessToken(): JwtTokenRes
    {
        $refreshToken = $this->tokenTransport->getRefreshToken();
        
        if (!$refreshToken) {
            //$this->endSession();
            throw ApiException::unauthorized('NO_REFRESH_TOKEN', ApiErrorCode::NO_REFRESH_TOKEN);
        }
        try {
            //토큰이 유효한지 최소한의 검증
            //validateRefreshToken에서 유효하지 않거나 만료된 토큰이면 InvalidTokenException이 발생
            $claims = $this->jwtManager->validateRefreshToken($refreshToken);
            $userSeq = (int) ($claims->sub ?? 0);
            if ($userSeq <= 0) {
                throw ApiException::unauthorized('INVALID_REFRESH_TOKEN', ApiErrorCode::INVALID_REFRESH_TOKEN);
            }

            //userSeq에 해당하는 사용자가 실제로 존재하는지 확인
            if (!$this->userRoleRepository->exists($userSeq)) {
                // 사용자 자체가 없으면 쿠키를 정리하고 끝
                $this->tokenTransport->clear();
                $this->userContext->clear();
                throw ApiException::unauthorized('USER_NOT_FOUND', ApiErrorCode::USER_NOT_FOUND);
            }

            //권한 조회
            $roles = $this->userRoleRepository->rolesOf($userSeq);

            $now = new DateTimeImmutable('now');
            $tokenId = (string) $claims->jti;

            //회전(rotate) 처리를 트랜잭션으로 묶음
            //동시 요청/경쟁 조건을 막기 위해 DB 트랜잭션 + row lock
            $jwtTokenPair = $this->dbTransactionRunner->run(function () use ($now, $userSeq, $tokenId, $refreshToken, $roles) {

                //기존 Refresh Token row를 잠금
                //동시에 두 요청이 와도 한쪽이 먼저 처리되면 다른 쪽은 “이미 replaced” 체크에 걸리게 됨
                $oldRefreshToken = $this->refreshTokenRepository->findByTokenIdForUpdate($tokenId);
                if (!$oldRefreshToken)
                    throw ApiException::unauthorized('REFRESH_ROW_NOT_FOUND', ApiErrorCode::REFRESH_ROW_NOT_FOUND);

                //refreshToken을 요청한 사용자가 맞는지 확인
                if ($oldRefreshToken->getUserSeq() !== $userSeq)
                    throw ApiException::unauthorized('TOKEN_OWNER_MISMATCH', ApiErrorCode::TOKEN_OWNER_MISMATCH);

                //replacedDate != null이면 이미 rotate가 발생함
                //이미 rotate 된 refresh token을 재사용(replay) 시도한 경우
                if ($oldRefreshToken->isReplaced())
                    throw ApiException::unauthorized('REFRESH_TOKEN_REPLAY', ApiErrorCode::REFRESH_TOKEN_REPLAY);

                //만료일이 현 시각보다 이전이면 만료된 토큰
                if ($oldRefreshToken->isExpired($now))
                    throw ApiException::unauthorized('REFRESH_TOKEN_EXPIRED', ApiErrorCode::REFRESH_TOKEN_EXPIRED);

                //refreshToken과 db에 저장된 암호환된 토큰이 같은지 확인
                //JWT 검증은 통과했는데(서명 ok) DB에 저장된 해시와 다른 토큰인 경우
                //도난/토큰 패밀리 꼬임/재사용 공격 의심 케이스
                if (!$this->refreshTokenHasher->matches($refreshToken, $oldRefreshToken->getHashedToken())) {
                    throw ApiException::unauthorized('REFRESH_HASH_MISMATCH', ApiErrorCode::REFRESH_HASH_MISMATCH);
                }

                $oldId = $oldRefreshToken->getId();
                if ($oldId === null)
                    throw ApiException::unauthorized('INVALID_TOKEN_ROW_ID', ApiErrorCode::INVALID_TOKEN_ROW_ID);

                //이미 교체(replaced)되었음으로 표시, 기존 refreshToken 즉시 무효화
                $this->refreshTokenRepository->markReplaced($oldId);

                //버전 업
                $newVersion = $oldRefreshToken->getTokenVersion() + 1;

                //새로운 AccessToken, RefreshToken 발급
                $firstIssuedAt = $oldRefreshToken->getFirstIssuedAt();

                $newAccessToken = $this->jwtManager->generateAccessToken((string) $userSeq, $newVersion, $roles);
                $newAccessClaims = $this->jwtManager->validateAccessToken($newAccessToken);


                $newRefreshToken = $this->jwtManager->generateRefreshToken((string) $userSeq, $newVersion, $firstIssuedAt->getTimestamp());
                $newRefreshClaims = $this->jwtManager->validateRefreshToken($newRefreshToken);

                //refreshToken 수명 고정
                $expiresAt = $firstIssuedAt->modify('+' . $this->jwtManager->getRefreshTtl() . ' seconds');
                $hashed = $this->refreshTokenHasher->hash($newRefreshToken);

                $newEntity = RefreshTokenEntity::createToken(
                    $userSeq,
                    (string) $newRefreshClaims->jti,
                    $hashed,
                    $firstIssuedAt,
                    $expiresAt,
                    $newVersion,
                    $oldRefreshToken->getDeviceId()
                );

                $this->refreshTokenRepository->insert($newEntity);

                return new JwtTokenPair(
                    $newAccessToken,
                    (int) $newAccessClaims->exp,
                    $newRefreshToken,
                    (int) $newRefreshClaims->exp,
                    $newVersion
                );
            });

            //DB 커밋 이후 transport 저장 + userContext 세팅
            $this->tokenTransport->store($jwtTokenPair);
            $this->userContext->authenticate($userSeq, $roles);

            return new JwtTokenRes($jwtTokenPair->getAccessToken(), (int) $jwtTokenPair->getAccessExp());

        } catch (ApiException $e) {
            if (
                in_array($e->errorCode(), [
                    ApiErrorCode::REFRESH_TOKEN_EXPIRED,
                    ApiErrorCode::INVALID_REFRESH_TOKEN,
                    ApiErrorCode::REFRESH_HASH_MISMATCH,
                    ApiErrorCode::REFRESH_TOKEN_REPLAY,
                    ApiErrorCode::REFRESH_ROW_NOT_FOUND,
                    ApiErrorCode::USER_NOT_FOUND,
                ], true)
            ) {
                //$this->endSession();  
            }
            throw $e;
        } catch (\Throwable $e) {
            //예상 못한 refresh 실패
            throw ApiException::unauthorized('REFRESH_UNAUTHORIZED', ApiErrorCode::REFRESH_UNAUTHORIZED);
        }
    }

    //로그아웃:
    public function logout(): void
    {
        // 멱등: 인증 여부와 상관없이 항상 쿠키/컨텍스트 정리
        try {
            $userSeq = (int) ($this->userContext->seq() ?? 0);

            // access로 userSeq를 알 수 있으면 revoke
            if ($userSeq > 0) {
                try {
                    $this->refreshTokenRepository->revokeAllByUserSeq($userSeq);
                } catch (\Throwable $e) {
                    // revoke 실패는 치명적이지 않음: 로그만
                    log_message('error', 'logout: revokeAllByUserSeq failed: ' . $e->getMessage());
                }
            } else {
                // access가 없더라도 refresh 쿠키/헤더가 남아있으면 revoke 시도 (실패해도 무시)
                $refreshToken = $this->tokenTransport->getRefreshToken();
                if ($refreshToken) {
                    try {
                        $claims = $this->jwtManager->validateRefreshToken($refreshToken);
                        $uid = (int) ($claims->sub ?? 0);
                        if ($uid > 0) {
                            $this->refreshTokenRepository->revokeAllByUserSeq($uid);
                        }
                    } catch (\Throwable $e) {
                        log_message('debug', 'logout: revoke by refresh failed: ' . $e->getMessage());
                    }
                }
            }
        } finally {
            $this->endSession();
        }
    }

    private function endSession()
    {
        $this->tokenTransport->clear();
        $this->userContext->clear();
    }
}
