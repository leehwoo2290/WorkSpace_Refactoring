<?php
declare(strict_types=1);
namespace App\auth\dto\response;

final class UserLoginRes implements \JsonSerializable
{
    private int $userSeq;
    private string $email;
    private ?string $name;
    /** @var string[] */
    private array $roles;
    private string $status;
    private int $licenseSeq;
    private bool $pwResetRequired;
    private JwtTokenRes $jwtTokenRes;       //로그인 시 프론트 accesstoken 세팅에 필요

    /**
     * @param string[] $roles
     */
    public function __construct(
        int $userSeq,
        string $email,
        ?string $name,
        array $roles,
        string $status,
        int $licenseSeq,
        bool $pwResetRequired,
        JwtTokenRes $jwtTokenRes
    ) {
        $this->userSeq = $userSeq;
        $this->email = $email;
        $this->name = $name;
        $this->roles = $roles;
        $this->status = $status;
        $this->licenseSeq = $licenseSeq;
        $this->pwResetRequired = $pwResetRequired;
        $this->jwtTokenRes = $jwtTokenRes;
    }

    public function jsonSerialize(): array
    {
        return [
            'userSeq' => $this->userSeq,
            'email' => $this->email,
            'name' => $this->name,
            'roles' => $this->roles,
            'status' => $this->status,
            'licenseSeq' => $this->licenseSeq,
            'pwResetRequired' => $this->pwResetRequired,
            'jwtTokenRes' => $this->jwtTokenRes,
        ];
    }
}
