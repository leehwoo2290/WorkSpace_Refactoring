<?php
declare(strict_types=1);

namespace App\safety\engineer\add\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyEngineerActiveExistsByUserSeqPreset implements RowPresetInterface
{
    private const T_ENGINEER = 'tb_safety_engineer';
    private const A_ENGINEER = 'se';

    public function selectCols(): array
    {
        // existsByPreset()는 selectCols를 안 쓰지만, 인터페이스 규격상 구현은 필요
        return [];
    }

    public function baseFromJoin($db): void
    {
        $db->from(self::T_ENGINEER . ' ' . self::A_ENGINEER);
    }

    /** @param mixed $query userSeq(int) */
    public function applyWhere($db, $query): void
    {
        $se = self::A_ENGINEER;
        $db->where("{$se}.user_seq", (int) $query);
        $db->where("{$se}.deleted", 'N');
    }
}
