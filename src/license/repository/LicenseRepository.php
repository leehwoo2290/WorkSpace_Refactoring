<?php
declare(strict_types=1);

namespace App\license\repository;

final class LicenseRepository
{
    private $db;

    public function __construct($ciDb)
    {
        $this->db = $ciDb;
    }

    /** 레거시 M_license get_select_text() 기반 */
    private function selectText(): string
    {
        // 레거시에는 tb_safety_project에 license_seq 조건이 없음.
        // 만약 tb_safety_project에 license_seq가 있다면 아래 주석 해제하고 교체하는 걸 추천.
        return '
            license.*,
            (select count(*) from tb_user where status != "Quit" and license_seq=license.seq) as user_cnt,

            (
                select count(*) from tb_machine_engineer engineer
                inner join tb_user user on user.seq = engineer.user_seq
                where user.license_seq=license.seq and user.status != "Quit"
            ) as machine_engineer_cnt,

            (
                select count(*) from tb_safety_engineer engineer
                inner join tb_user user on user.seq = engineer.user_seq
                where user.license_seq=license.seq and user.status != "Quit"
            ) as safety_engineer_cnt,

            (select count(*) from tb_machine_project where license_seq=license.seq and deleted="N") as machine_project_cnt,
            (select count(*) from tb_safety_project where deleted="N") as safety_project_cnt
        ';

        // (컬럼 존재 시)
        // (select count(*) from tb_safety_project where license_seq=license.seq and deleted="N") as safety_project_cnt
    }

    private function applyWhere(array $where): void
    {
        if (!empty($where['q'])) {
            $q = trim((string) $where['q']);
            if ($q !== '') {
                $this->db->group_start();
                $this->db->like('license.name', $q);
                $this->db->or_like('license.name_abbr', $q);
                $this->db->or_like('license.ceo_name', $q);

                // bizno는 저장 포맷이 하이픈 없는 경우가 많아서 둘 다 시도
                $qBiz = str_replace('-', '', $q);
                $this->db->or_like('license.bizno', $qBiz);

                $this->db->group_end();
            }
        }
    }

    public function count(array $where): int
    {
        $this->db->from('tb_license license');
        $this->applyWhere($where);

        // count_all_results는 내부적으로 쿼리 실행 후 builder 초기화
        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(array $where, int $offset, int $limit): array
    {
        $this->db->select($this->selectText(), false)->from('tb_license license');
        $this->applyWhere($where);

        $this->db->order_by('license.seq', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }
}
