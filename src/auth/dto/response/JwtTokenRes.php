<?php
declare(strict_types=1);

namespace App\auth\dto\response;


final class JwtTokenRes implements \JsonSerializable
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

}
