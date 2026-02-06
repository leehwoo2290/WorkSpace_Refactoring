<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\repository\preset;

use App\common\repository\preset\ListPresetInterface;

final class SafetyProjectAssignedEngineerListPreset implements ListPresetInterface
{
    private const T_MANS = 'tb_safety_mans';
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';

    private const A_MANS = 'm';
    private const A_ENGINEER = 'se';
    private const A_USER = 'u';

    /** @return string[] */
    public function selectCols(): array
    {
        $m = self::A_MANS;
        $se = self::A_ENGINEER;
        $u = self::A_USER;

        return [
            "{$se}.seq AS engineer_seq",
            "{$u}.seq AS user_seq",
            "{$u}.name AS name",
            "{$se}.grade AS grade",
            "{$se}.license_no AS license_no",
            "{$m}.bgn_dt",
            "{$m}.end_dt",
            "{$m}.remark",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $m = self::A_MANS;
        $se = self::A_ENGINEER;
        $u = self::A_USER;

        $db->from(self::T_MANS . " {$m}");
        $db->join(self::T_ENGINEER . " {$se}", "{$se}.seq = {$m}.engineer_seq", 'inner');
        $db->join(self::T_USER . " {$u}", "{$u}.seq = {$se}.user_seq", 'inner');
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        $m = self::A_MANS;
        $db->where("{$m}.project_seq", (int) $query);
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $u = self::A_USER;
        $db->order_by("{$u}.name", 'ASC');
        $db->order_by("{$u}.seq", 'ASC');
    }
}
