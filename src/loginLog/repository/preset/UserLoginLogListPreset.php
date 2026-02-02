<?php
declare(strict_types=1);

namespace App\loginLog\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\ListPresetInterface;

use App\user\common\UserEnumMaps;

/**
 * UserLoginLogListPreset
 *
 * 로그인 로그 목록 조회(list/count) 쿼리 레시피.
 */
final class UserLoginLogListPreset implements ListPresetInterface
{
    /** @return string[] */
    public function selectCols(): array
    {
        return [
            'log.seq',
            'log.reg_time',
            'log.email',
            'log.success',
            'log.country_code',
            'log.ip_addr',
            'log.is_mobile',
            'u.name as user_name',
            'pr.mobile',
            'l.name as license_name',
            'd.name as department_name',
            't.name as team_name',
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromLoginLog('log')
            ->joinUserByEmail('log', 'u')
            ->joinLicense('u', 'l')
            ->joinPrivacy('u', 'pr')
            ->joinOffice('u', 'o')
            ->joinDepartment('o', 'd')
            ->joinTeam('o', 't');
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) {
            return;
        }

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();

        $f = new FilterManager($db);
        $maps = UserEnumMaps::maps();

        $f->likeAny(['log.email'], $where['searchKeyWord'] ?? '');
        $f->whereEnum('log.success', $maps, 'yn', $where['success'] ?? null);
        $f->dateRangeYmd('log.reg_time', $where['from'] ?? null, $where['to'] ?? null);
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $db->order_by('log.reg_time', 'DESC');
        //$db->order_by('log.seq', 'DESC');
    }
}
