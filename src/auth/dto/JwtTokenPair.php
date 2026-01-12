<?php
declare(strict_types=1);

namespace App\auth\dto;

final class JwtTokenPair
{
    private string $accessToken;
    private int $accessExp;              //accessToken 만료시간 (unix timestamp)
    private string $refreshToken;
    private int $refreshExp;             //refreshToken 만료시간 (unix timestamp)
    private int $tokenVersion;           //refreshToken 토큰버전 (무효화 체크용)

    public function __construct(string $accessToken, int $accessExp, string $refreshToken, int $refreshExp, int $tokenVersion)
    {
        $this->accessToken  = $accessToken;
        $this->accessExp    = $accessExp;
        $this->refreshToken = $refreshToken;
        $this->refreshExp   = $refreshExp;
        $this->tokenVersion = $tokenVersion;
    }

    // getters
    public function getAccessToken(): string { return $this->accessToken; }
    public function getAccessExp(): int { return $this->accessExp; }
    public function getRefreshToken(): string { return $this->refreshToken; }
    public function getRefreshExp(): int { return $this->refreshExp; }
    public function getTokenVersion(): int { return $this->tokenVersion; }
}
