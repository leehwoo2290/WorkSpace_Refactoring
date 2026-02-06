<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyProjectJongRowPreset implements RowPresetInterface
{
    private const T_PROJECT = 'tb_safety_project';
    private const A_PROJECT = 'p';

    /** @return string[] */
    public function selectCols(): array
    {
        $p = self::A_PROJECT;

        return [
            "{$p}.jong AS jong",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $p = self::A_PROJECT;
        $db->from(self::T_PROJECT . " {$p}");
    }

    /** @param mixed $db @param mixed $query */
    public function applyWhere($db, $query): void
    {
        $p = self::A_PROJECT;

        $db->where("{$p}.seq", (int) $query);
        $db->where("{$p}.deleted", 'N');
    }
}
