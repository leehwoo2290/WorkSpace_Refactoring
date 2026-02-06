<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyProjectScheduleRowPreset implements RowPresetInterface
{
    private const T_PROJECT = 'tb_safety_project';
    private const A_PROJECT = 'p';

    /** @return string[] */
    public function selectCols(): array
    {
        $p = self::A_PROJECT;

        return [
            "{$p}.seq AS project_seq",
            "{$p}.license_seq",
            "{$p}.bgn_dt",
            "{$p}.end_dt",
            "{$p}.field_bgn_dt",
            "{$p}.field_end_dt",
            "{$p}.report_dt",
            "{$p}.done_dt",
            "{$p}.report_email",
            "{$p}.ti_issue_date",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $db->from(self::T_PROJECT . ' ' . self::A_PROJECT);
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        $p = self::A_PROJECT;
        $db->where("{$p}.seq", (int) $query);
        $db->where("{$p}.deleted", 'N');
    }
}
