<?php
declare(strict_types=1);

namespace App\auth\repository;

final class UserAuthRepository
{
    private $db;

    public function __construct( $db)
    {
        $this->db = $db;
    }

    public function findByEmail(string $email): ?object
    {
        $row = $this->db->select('*')
            ->from('tb_user')
            ->where('email', $email)
            ->limit(1)
            ->get()
            ->row();

        return $row ?: null;
    }

    /**
     * SHA1 → bcrypt 자동 마이그레이션용
     * 주의: tb_user.passwd 컬럼이 VARCHAR(255) 이상이어야 bcrypt 저장 가능
     */
    public function updatePasswordHash(int $userSeq, string $newHash): void
    {
        $this->db->set('passwd', $newHash)
            ->where('seq', $userSeq)
            ->limit(1)
            ->update('tb_user');
    }
}
