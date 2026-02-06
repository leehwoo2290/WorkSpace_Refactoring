<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\repository\preset;

use App\common\repository\preset\ListPresetInterface;

final class SafetyProjectEngineerAssignedFilterListPreset implements ListPresetInterface
{
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';
    private const T_OFFICE = 'tb_user_office';
    private const T_POSITION = 'tb_office_position';
    private const T_MANS = 'tb_safety_mans';

    private const A_ENGINEER = 'se';
    private const A_USER = 'u';
    private const A_OFFICE = 'o';
    private const A_POSITION = 'p';
    private const A_MANS = 'm';

    /** @return string[] */
    public function selectCols(): array
    {
        $m = self::A_MANS;
        $se = self::A_ENGINEER;
        $u = self::A_USER;
        $p = self::A_POSITION;

        return [
            "{$se}.seq AS engineer_seq",
            "{$u}.seq AS user_seq",
            "{$u}.name AS name",
            "{$se}.grade AS grade",
            "{$se}.license_no AS license_no",
            "{$m}.remark AS remark",
            "{$p}.name AS position", //  직급명
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $m = self::A_MANS;
        $se = self::A_ENGINEER;
        $u = self::A_USER;
        $o = self::A_OFFICE;
        $p = self::A_POSITION;

        $db->from(self::T_MANS . " {$m}");
        $db->from(self::T_ENGINEER . " {$se}");
        $db->join(self::T_USER . " {$u}", "{$u}.seq = {$se}.user_seq", 'inner');

        // 직급: user_office.position_seq -> office_position.name
        $db->join(self::T_OFFICE . " {$o}", "{$o}.user_seq = {$u}.seq", 'left');
        $db->join(self::T_POSITION . " {$p}", "{$p}.seq = {$o}.position_seq", 'left');
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        $se = self::A_ENGINEER;
        $u = self::A_USER;

        $db->where("{$u}.license_seq", (int) $query);
        $db->where("{$u}.status <>", 'Quit');
        $db->where("{$se}.deleted", 'N');
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $u = self::A_USER;

        $db->order_by("{$u}.name", 'ASC');
        $db->order_by("{$u}.seq", 'ASC');
    }
}
