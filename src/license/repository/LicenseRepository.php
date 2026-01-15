<?php
declare(strict_types=1);

namespace App\license\repository;

use App\license\dto\query\LicenseListQuery;
use QueryEnumMapper;

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


    public function count(LicenseListQuery $query): int
    {
        $this->db->from('tb_license license');
        $this->applyWhere($query);

        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(LicenseListQuery $query): array
    {
        $this->db->select($this->selectText(), false)->from('tb_license license');
        $this->applyWhere($query);

        $this->db->order_by('license.seq', 'DESC');
        $this->db->limit($query->size(), $query->offset());

        return $this->db->get()->result();
    }

    private function applyWhere(LicenseListQuery $query): void
    {
        $where = $query->makeWhere();

        if (!empty($where['q'])) {
            $q = trim((string) $where['q']);
            if ($q !== '') {
                $this->db->group_start();
                $this->db->like('license.name', $q);
                $this->db->or_like('license.name_abbr', $q);
                $this->db->or_like('license.ceo_name', $q);

                $qBiz = str_replace('-', '', $q);
                $this->db->or_like('license.bizno', $qBiz);
                $this->db->group_end();
            }
        }

        // region/status 매핑 (일단 strict=false: maps 없으면 원문 통과)
        $maps = [
            'license_region' => [
                // TODO: 'SEOUL' => '서울', 'CHUNGNAM' => '충남' ... (DB값에 맞춰 채우기)
            ],
            'license_status' => [
                // TODO: 'ACTIVE' => 'Active', 'INACTIVE' => 'Inactive' ... (DB값에 맞춰 채우기)
            ],
        ];

        if (!empty($where['region'])) {
            $this->db->where(
                'license.region',
                QueryEnumMapper::map($maps, 'license_region', (string) $where['region'], false)
            );
        }

        if (!empty($where['status'])) {
            $this->db->where(
                'license.status',
                QueryEnumMapper::map($maps, 'license_status', (string) $where['status'], false)
            );
        }
    }
}
