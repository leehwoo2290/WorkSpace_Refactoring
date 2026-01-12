<?php
declare(strict_types=1);

namespace App\auth\dto;

use App\common\dto\ApiDocDto;

final class CsrfTokenRes implements \JsonSerializable, ApiDocDto
{
    private string $token;
    private string $headerName;
    private int $ttl;

    public function __construct(string $token, string $headerName, int $ttl)
    {
        $this->token = $token;
        $this->headerName = $headerName;
        $this->ttl = $ttl;
    }

    public function jsonSerialize(): array
    {
        return [
            'token' => $this->token,
            'headerName' => $this->headerName,
            'ttl' => $this->ttl,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'token' => ['type' => 'string', 'required' => true, 'description' => '더블서브밋 토큰 값'],
            'headerName' => ['type' => 'string', 'required' => true, 'description' => '요청 시 담을 헤더 이름'],
            'ttl' => ['type' => 'int', 'required' => true, 'description' => '유효기간(초)'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'token' => 'a1b2c3d4e5f6...',
            'headerName' => 'X-CSRF-TOKEN',
            'ttl' => 600,
        ];
    }
}
