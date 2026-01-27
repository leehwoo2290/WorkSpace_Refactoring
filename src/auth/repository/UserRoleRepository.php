<?php
declare(strict_types=1);

namespace App\auth\repository;

use App\common\repository\BaseTableRepository;

final class UserRoleRepository extends BaseTableRepository
{
    protected const TABLE = 'tb_user';
    protected const PK = 'seq';

    public function exists(int $userSeq): bool
    {
        return $this->existsWhere(['seq' => $userSeq]);
    }

    /** @return string[] */
    public function rolesOf(int $userSeq): array
    {
        $row = $this->findByPk($userSeq, ['role']);

        if (!$row) {
            return ['User'];
        }

        $role = isset($row->role) && (string) $row->role !== '' ? (string) $row->role : 'User';
        return [$role];
    }
}
