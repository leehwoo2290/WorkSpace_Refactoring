<?php
declare(strict_types=1);

namespace App\auth\dto\response;


final class CsrfTokenRes implements \JsonSerializable
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

}
