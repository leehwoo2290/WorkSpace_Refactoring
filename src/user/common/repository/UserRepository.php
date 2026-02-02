<?php
declare(strict_types=1);

namespace App\user\common\repository;

use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\common\repository\WritePayloadBuilder;

use App\user\getList\dto\query\UserListQuery;

use App\user\getList\repository\preset\UserListPreset;
use App\user\add\entity\UserAddEntity;

final class UserRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new UserListPreset();
    }

    public function count(UserListQuery $query): int
    {
        return $this->countByPreset($query);
    }

    /** @return object[] */
    public function findList(UserListQuery $query): array
    {
        return $this->findListByPreset($query);
    }

    public function existsByEmail(string $email): bool
    {
        return $this->existsWith(function () use ($email): void {
            $this->db->select('1', false)
                ->from('tb_user u')
                ->where('u.email', $email)
                ->limit(1);
        });
    }

    public function addUser(UserAddEntity $userAddEntity): void
    {
        $builder = new WritePayloadBuilder();
        $userData = $userAddEntity->toDbPayload($builder);

        $this->insertOrThrow(
            'tb_user',
            $userData,
            'USER_EMAIL_CONFLICT',
            ApiErrorCode::USER_EMAIL_CONFLICT
        );
    }
}
