<?php
declare(strict_types=1);

namespace App\common\repository\preset;

/**
 * RowPresetInterface
 *
 * 단건 조회(1 row) "레시피" 규격.
 *
 * - select/from/join/where를 preset으로 분리해서 한 곳에서 관리
 * - Repository는 preset 실행만 담당하도록 유도
 */
interface RowPresetInterface
{
    /** @return string[] */
    public function selectCols(): array;

    /** @param mixed $db */
    public function baseFromJoin($db): void;

    /** @param mixed $db */
    public function applyWhere($db, $query): void;
}
