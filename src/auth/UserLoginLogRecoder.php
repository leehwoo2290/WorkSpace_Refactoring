<?php
declare(strict_types=1);

namespace App\auth;

use App\auth\Entity\UserLoginLogEntity;
use App\auth\Repository\UserLoginLogRepository;

/**
 * 로그인 로그 기록 서비스
 * 
 * - 로그인 성공/실패를 일관되게 기록
 * - 레거시의 insert_login_log 기능 대체
 * - Controller나 AuthService에서 주입받아 사용
 */
final class UserLoginLogRecoder
{
    private UserLoginLogRepository $repository;

    public function __construct(UserLoginLogRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 로그인 성공 시 로그 기록
     */
    public function logSuccess(
        string $email,
        ?string $deviceId = null
    ): void {
        $entity = new UserLoginLogEntity(
            null,
            $email,
            null,  // 비밀번호는 성공 시 기록하지 않음
            'Y',
            $_SERVER['HTTP_HOST'] ?? '',
            $this->getUserIp(),
            $_SERVER['HTTP_USER_AGENT'] ?? '',
            $_SERVER['GEOIP_COUNTRY_CODE'] ?? '',
            $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '',
            $this->isMobile() ? 'Y' : 'N',
            null,
            $deviceId
        );

        $this->repository->insert($entity);
    }

    /**
     * 로그인 실패 시 로그 기록
     *
     * 레거시 호환을 위해 평문 비밀번호를 남기지만,
     * 실제 운영 환경에서는 null로 바꾸는 것을 권장.
     */
    public function logFail(
        string $email,
        ?string $inputPw = null,
        ?string $deviceId = null
    ): void {
        $entity = new UserLoginLogEntity(
            null,
            $email,
            $inputPw, // 보안상 실제 환경에서는 null로 두는 것이 안전함
            'N',
            $_SERVER['HTTP_HOST'] ?? '',
            $this->getUserIp(),
            $_SERVER['HTTP_USER_AGENT'] ?? '',
            $_SERVER['GEOIP_COUNTRY_CODE'] ?? '',
            $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '',
            $this->isMobile() ? 'Y' : 'N',
            null,
            $deviceId
        );

        $this->repository->insert($entity);
    }

    // -------------------------------------------------------
    // 내부 유틸리티
    // -------------------------------------------------------

    private function getUserIp(): string
    {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    private function isMobile(): bool
    {
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        return (bool)preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $ua);
    }
}
