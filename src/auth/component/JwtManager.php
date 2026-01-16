<?php
declare(strict_types=1);

namespace App\auth\component;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;
use App\auth\dto\JwtTokenPair;
use DateTimeImmutable;

final class JwtManager
{
    private string $accessSecret;
    private string $refreshSecret;
    private int $accessTtl;
    private int $refreshTtl;

    public function __construct(string $accessSecret, string $refreshSecret, int $accessTtl, int $refreshTtl)
    {
        $this->accessSecret  = $accessSecret;
        $this->refreshSecret = $refreshSecret;
        $this->accessTtl = $accessTtl;
        $this->refreshTtl = $refreshTtl;
    }

    public function getRefreshTtl(): int { return $this->refreshTtl; }

    // ================= Access Token =================
    //만료 시간과 발급 시간을 포함한 Access Token을 생성
  
    public function generateAccessToken(string $userSeq, int $version, array $roles): string
    {
        $now = time();
        $exp = $now + $this->accessTtl;

        return JWT::encode([
            'sub' => $userSeq,
            'iat' => $now,
            'exp' => $exp,
            'jti' => $this->uuidv4(),
            'typ' => 'access',
            'version' => $version,
            'roles' => array_values(array_unique($roles)),
        ], $this->accessSecret, 'HS256');
    }

    // ================= Refresh Token =================
    /** refresh 만료는 firstIssuedAt + refreshTtl 고정 */
    public function generateRefreshToken(string $userSeq, int $version, int $firstIssuedAtTs): string
    {
        $now = time();
        $exp = $firstIssuedAtTs + $this->refreshTtl;

        return JWT::encode([
            'sub' => $userSeq,
            'iat' => $now,
            'exp' => $exp,
            'jti' => $this->uuidv4(),
            'typ' => 'refresh',
            'version' => $version,
        ], $this->refreshSecret, 'HS256');
    }

    public function validateAccessToken(string $token): object
    {
        $claims = JWT::decode($token, new Key($this->accessSecret, 'HS256'));
        if (!isset($claims->typ) || $claims->typ !== 'access') {
            throw new Exception('Invalid token type (access)');
        }
        return $claims;
    }

    public function validateRefreshToken(string $token): object
    {
        $claims = JWT::decode($token, new Key($this->refreshSecret, 'HS256'));
        if (!isset($claims->typ) || $claims->typ !== 'refresh') {
            throw new Exception('Invalid token type (refresh)');
        }
        return $claims;
    }

    public function generateTokens(int $userSeq, array $roles, DateTimeImmutable $firstIssuedAt): JwtTokenPair{
        
        $version = 0;

        $access = $this->generateAccessToken((string)$userSeq, $version, $roles);
        $accessClaims = $this->validateAccessToken($access);

        $refresh = $this->generateRefreshToken((string)$userSeq, $version, $firstIssuedAt->getTimestamp());

        $expiresAt = $firstIssuedAt->modify('+' . $this->getRefreshTtl() . ' seconds');
        

        return new JwtTokenPair(
            $access,
            (int)$accessClaims->exp,
            $refresh,
            $expiresAt->getTimestamp(),
            $version
        );
    }

    private function uuidv4(): string
    {
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
