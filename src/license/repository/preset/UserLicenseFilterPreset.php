<?php
declare(strict_types=1);

namespace App\license\repository\preset;

use App\common\repository\preset\ListPresetInterface;

final class UserLicenseFilterPreset implements ListPresetInterface
{
    /** @return string[] */
    public function selectCols(): array
    {
        return [
            'license.seq AS license_seq',
            'license.name AS name',
            //"IFNULL(license.name_abbr, '') AS english_name",
        ];
    }

    public function baseFromJoin($db): void
    {
        $db->from('tb_license license');
    }

    public function applyWhere($db, $query): void
    {
        // 필터용 리스트는 where 없음
    }

    public function applyOrderBy($db, $query): void
    {
        //$db->order_by("IFNULL(license.name_abbr, '')", 'ASC', false);
        $db->order_by('license.name', 'ASC');
        $db->order_by('license.seq', 'DESC');
    }
}
