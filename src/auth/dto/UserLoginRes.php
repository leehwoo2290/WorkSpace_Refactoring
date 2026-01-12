<?php
declare(strict_types=1);
namespace App\auth\dto;

use App\common\dto\ApiDocDto;

final class UserLoginRes implements \JsonSerializable, ApiDocDto
{
    private int $userSeq;
    private string $email;
    private ?string $name;
    /** @var string[] */
    private array $roles;

    private string $status;
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
        bool $pwResetRequired,
        JwtTokenRes $jwtTokenRes
    ) {
        $this->userSeq = $userSeq;
        $this->email = $email;
        $this->name = $name;
        $this->roles = $roles;
        $this->status = $status;
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
            'pwResetRequired' => $this->pwResetRequired,
            'jwtTokenRes' => $this->jwtTokenRes,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'userSeq' => ['type' => 'int', 'required' => true, 'description' => '사용자 식별자'],
            'email' => ['type' => 'string', 'required' => true, 'description' => '이메일'],
            'name' => ['type' => '?string', 'required' => false, 'description' => '이름(없을 수 있음)'],
            'roles' => ['type' => 'string[]', 'required' => true, 'description' => '권한 리스트'],
            'status' => ['type' => 'string', 'required' => true, 'description' => '계정 상태'],
            'pwResetRequired' => ['type' => 'bool', 'required' => true, 'description' => '비밀번호 재설정 필요 여부'],
            'jwtTokenRes' => ['type' => JwtTokenRes::class, 'required' => true, 'description' => 'access token 정보'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'userSeq' => 1,
            'email' => 'user@example.com',
            'name' => '홍길동',
            'roles' => ['USER'],
            'status' => 'ACTIVE',
            'pwResetRequired' => false,
            'jwtTokenRes' => JwtTokenRes::apiDocExample(),
        ];
    }
}
