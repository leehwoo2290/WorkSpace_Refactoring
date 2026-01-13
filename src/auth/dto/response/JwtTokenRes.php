<?php
declare(strict_types=1);

namespace App\auth\dto\response;

use App\common\dto\ApiDocDto;

final class JwtTokenRes implements \JsonSerializable, ApiDocDto
{
    private string $accessToken;
    private int $accessExp;

    public function __construct(string $accessToken, int $accessExp)
    {
        $this->accessToken = $accessToken;
        $this->accessExp = $accessExp;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
    public function getAccessExp(): int
    {
        return $this->accessExp;
    }

    public function jsonSerialize(): array
    {
        return [
            'accessToken' => $this->accessToken,
            'accessExp' => $this->accessExp,
            'tokenType' => 'Bearer',
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'accessToken' => ['type' => 'string', 'required' => true, 'description' => 'JWT access token'],
            'accessExp' => ['type' => 'int', 'required' => true, 'description' => '만료시간(unix timestamp)'],
            'tokenType' => ['type' => 'string', 'required' => true, 'description' => '항상 Bearer'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'accessToken' => 'eyJ...access',
            'accessExp' => 1700000000,
            'tokenType' => 'Bearer',
        ];
    }
}
