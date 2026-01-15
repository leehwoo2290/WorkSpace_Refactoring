<?php
declare(strict_types=1);

namespace App\user\repository;

use App\user\dto\query\UserListQuery;
use App\user\dto\UserListQueryEnumMaps;
use QueryEnumMapper;

final class UserRepository
{
    /** @var \CI_DB_query_builder */
    private \CI_DB_query_builder $db;

    public function __construct(\CI_DB_query_builder $db)
    {
        $this->db = $db;
    }

    public function count(UserListQuery $query): int
    {
        $this->baseFromJoin();
        $this->applyWhere($query);
        
        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(UserListQuery $query): array
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
        $this->applyWhere($query);

        $this->db->order_by('u.seq', 'DESC');
        $this->db->limit($query->size(), $query->offset());

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

    private function applyWhere(UserListQuery $query): void
    {

        $where = $query->makeWhere();

        // 1) 통합 검색(q): 이름/이메일/사번
        if (!empty($where['q'])) {
            $q = (string) $where['q'];
            $this->db->group_start();
            $this->db->like('u.name', $q);
            $this->db->or_like('u.email', $q);
            $this->db->or_like('o.staff_num', $q);
            $this->db->group_end();
        }

        // 2) 권한
        if (!empty($where['role'])) {
            $this->db->where('u.role', (string) $where['role']);
        }

        // 3) status (프론트 enum만: PENDING/NORMAL/QUIT)
        $status = $where['status'] ?? $where['memberStatus'] ?? '';
        if ($status !== '') {
            $this->db->where('u.status', QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'user_status', $status));
        }

        if (!empty($where['engineer_yn'])) {
            $this->db->where('o.engineer_yn', (string) $where['engineer_yn']);
        }

        // 4) seq 기반 필터 (부서/직위는 seq가 제일 안전)
        if (!empty($where['license_seq'])) {
            $this->db->where('u.license_seq', (int) $where['license_seq']);
        }

        if (!empty($where['department_seq'])) {
            $this->db->where('o.department_seq', (int) $where['department_seq']);
        }

        if (!empty($where['position_seq'])) {
            $this->db->where('o.position_seq', (int) $where['position_seq']);
        }

        // (선택) 문자열 fallback (필요 없으면 삭제 가능)
        if (empty($where['department_seq']) && !empty($where['department'])) {
            $this->db->where('d.name', (string) $where['department']);
        }
        if (empty($where['position_seq']) && !empty($where['position'])) {
            $this->db->where('p.name', (string) $where['position']);
        }

        // 5) 재직정보 enum 필터
        // 기존 키(work_type/labor_type/labor_contract)도 alias로 지원
        $workForm = $where['work_form'] ?? $where['work_type'] ?? '';
        if ($workForm !== '') {
            $this->db->where('o.work_form', QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'work_form', $workForm));
        }

        $laborForm = $where['labor_form'] ?? $where['labor_type'] ?? '';
        if ($laborForm !== '') {
            $this->db->where('o.labor_form', QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'labor_form', $laborForm));
        }

        $contractType = $where['contract_type'] ?? $where['labor_contract'] ?? '';
        if ($contractType !== '') {
            $this->db->where('o.contract_type', QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'contract_type', $contractType));
        }

        // 6) 개인정보 enum 필터 (gender)
        $gender = $where['gender'] ?? '';
        if ($gender !== '') {
            $this->db->where('pr.gender', QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'gender', $gender));
        }

        // birth month
        if (!empty($where['birth_month'])) {
            $m = (int) $where['birth_month'];
            if ($m >= 1 && $m <= 12) {
                $this->db->where("MONTH(pr.birthday) = {$m}", null, false);
            }
        }

        // 7) 근속연수(년): TIMESTAMPDIFF로 계산
        $yos = $where['year_of_service'] ?? $where['career_year'] ?? $where['careerYear'] ?? null;
        if ($yos !== null && $yos !== '') {
            $y = (int) $yos;
            if ($y >= 0) {
                $this->db->where(
                    "TIMESTAMPDIFF(YEAR, o.join_date, IFNULL(o.resign_date, CURDATE())) = {$y}",
                    null,
                    false
                );
            }
        }
    }
}
