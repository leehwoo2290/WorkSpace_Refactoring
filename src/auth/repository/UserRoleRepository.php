<?php
declare(strict_types=1);

namespace App\auth\repository;


final class UserRoleRepository
{
    private $db;

    public function __construct($ciDb)
    {
        $this->db = $ciDb;
    }

    public function exists(int $userSeq): bool
    {
        $q = $this->db->query('SELECT seq FROM tb_user WHERE seq = ? LIMIT 1', [$userSeq]);
        return ($q->num_rows() > 0);
    }

    public function rolesOf(int $userSeq): array
    {
        $q = $this->db->query('SELECT role FROM tb_user WHERE seq = ? LIMIT 1', [$userSeq]);
        if ($q->num_rows() <= 0) return ['User'];

        $row = $q->row();
        $role = $row->role ?? 'User';
        return [$role];
    }
}
