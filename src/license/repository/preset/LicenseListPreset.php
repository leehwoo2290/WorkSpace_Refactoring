<?php
declare(strict_types=1);

namespace App\license\repository\preset;

use App\common\repository\preset\ListPresetInterface;
use EnumMapper;

/**
 * LicenseListPreset
 *
 * 라이선스(회사) 목록 조회(list/count) 쿼리 레시피를 한 곳에 고정.
 */
final class LicenseListPreset implements ListPresetInterface
{
    /** 레거시 M_license get_select_text() 기반 */
    /** @return string[] */
    public function selectCols(): array
    {
        return [
            'license.*',
            '(select count(*) from tb_user where status != "Quit" and license_seq=license.seq) as user_cnt',
            '(
            select count(*) from tb_machine_engineer engineer
            inner join tb_user user on user.seq = engineer.user_seq
            where user.license_seq = license.seq
              and user.status != "Quit"
        ) as machine_engineer_cnt',
            '(
            select count(*) from tb_safety_engineer engineer
            inner join tb_user user on user.seq = engineer.user_seq
            where user.license_seq = license.seq
              and user.status != "Quit"
        ) as safety_engineer_cnt',
            '(select count(*) from tb_machine_project where license_seq=license.seq and deleted="N") as machine_project_cnt',
            '(select count(*) from tb_safety_project where deleted="N") as safety_project_cnt',
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $db->from('tb_license license');
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) {
            return;
        }

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();

        if (!empty($where['q'])) {
            $q = trim((string) $where['q']);
            if ($q !== '') {
                $db->group_start();
                $db->like('license.name', $q);
                $db->or_like('license.name_abbr', $q);
                $db->or_like('license.ceo_name', $q);

                $qBiz = str_replace('-', '', $q);
                $db->or_like('license.bizno', $qBiz);
                $db->group_end();
            }
        }

        $maps = [
            'license_region' => [],
            'license_status' => [],
        ];

        if (!empty($where['region'])) {
            $db->where(
                'license.region',
                EnumMapper::map($maps, 'license_region', (string) $where['region'], false)
            );
        }

        if (!empty($where['status'])) {
            $db->where(
                'license.status',
                EnumMapper::map($maps, 'license_status', (string) $where['status'], false)
            );
        }
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $db->order_by('license.seq', 'DESC');
    }
}
