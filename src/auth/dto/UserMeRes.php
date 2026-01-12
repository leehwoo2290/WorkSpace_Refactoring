<?php
declare(strict_types=1);

namespace App\auth\dto;

use App\common\dto\ApiDocDto;

final class UserMeRes implements \JsonSerializable, ApiDocDto
{
    private int $userSeq;
    /** @var string[] */
    private array $roles;

    /**
     * @param string[] $roles
     */
    public function __construct(int $userSeq, array $roles)
    {
        $this->userSeq = $userSeq;
        $this->roles = array_values(array_map('strval', $roles));
    }

    public function jsonSerialize(): array
    {
        return [
            'userSeq' => $this->userSeq,
            'roles' => $this->roles,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'userSeq' => ['type' => 'int', 'required' => true, 'description' => '사용자 식별자'],
            'roles' => ['type' => 'string[]', 'required' => true, 'description' => '권한 리스트'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'userSeq' => 1,
            'roles' => ['USER'],
        ];
    }
}
