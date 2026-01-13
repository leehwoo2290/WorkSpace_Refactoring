<?php
declare(strict_types=1);

namespace App\user\repository;

final class UserRepository
{
    /** @var \CI_DB_query_builder */
    private \CI_DB_query_builder $db;

    public function __construct(\CI_DB_query_builder $db)
    {
        $this->db = $db;
    }

    public function count(array $where): int
    {
        $this->baseFromJoin();
        $this->applyWhere($where);

        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(array $where, int $offset, int $limit): array
    {
        $this->db->select("
            u.seq AS user_seq,
            u.role,
            u.name,
            u.email,
            u.status,
            l.name AS license_name,
            o.staff_num,
            d.name AS department_name,
            p.name AS position_name,
            pr.birthday,
            pr.mobile,
            o.engineer_yn,
            o.join_date,
            o.resign_date
            ", false);

        $this->baseFromJoin();
        $this->applyWhere($where);

        $this->db->order_by('u.seq', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    private function baseFromJoin(): void
    {
        $this->db->from('tb_user u');
        $this->db->join('tb_license l', 'l.seq = u.license_seq', 'left');
        $this->db->join('tb_user_office o', 'o.user_seq = u.seq', 'left');
        $this->db->join('tb_office_department d', 'd.seq = o.department_seq', 'left');
        $this->db->join('tb_office_position p', 'p.seq = o.position_seq', 'left');
        $this->db->join('tb_user_privacy pr', 'pr.user_seq = u.seq', 'left');
    }

    private function applyWhere(array $where): void
    {
        if (!empty($where['q'])) {
            $q = (string) $where['q'];
            $this->db->group_start();
            $this->db->like('u.name', $q);
            $this->db->or_like('u.email', $q);
            $this->db->or_like('o.staff_num', $q);
            $this->db->group_end();
        }

        if (!empty($where['role'])) {
            $this->db->where('u.role', (string) $where['role']);
        }

        if (!empty($where['status'])) {
            $this->db->where('u.status', (string) $where['status']);
        }

        if (!empty($where['engineer_yn'])) {
            $this->db->where('o.engineer_yn', (string) $where['engineer_yn']);
        }

        if (!empty($where['license_seq'])) {
            $this->db->where('u.license_seq', (int) $where['license_seq']);
        }

        if (!empty($where['department_seq'])) {
            $this->db->where('o.department_seq', (int) $where['department_seq']);
        }

        if (!empty($where['position_seq'])) {
            $this->db->where('o.position_seq', (int) $where['position_seq']);
        }
    }
}
