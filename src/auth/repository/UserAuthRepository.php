<?php
declare(strict_types=1);

namespace App\auth\repository;

use App\common\repository\BaseTableRepository;

final class UserAuthRepository extends BaseTableRepository
{
    protected const TABLE = 'tb_user';
    protected const PK    = 'seq';

    public function findByEmail(string $email): ?object
    {
        // UNIQUE(email) 전제: 단건
        return $this->findOneWhere(['email' => $email]);
    }

    /**
     * SHA1 → bcrypt 자동 마이그레이션용
     * 주의: tb_user.passwd 컬럼이 VARCHAR(255) 이상이어야 bcrypt 저장 가능
     */
    public function updatePasswordHash(int $userSeq, string $newHash): void
    {
        // BaseTableRepository::updateByPk()는 내부에서 updateWhereOrThrow로 예외를 표준화함
        $this->updateByPk($userSeq, ['passwd' => $newHash]);
    }
}
