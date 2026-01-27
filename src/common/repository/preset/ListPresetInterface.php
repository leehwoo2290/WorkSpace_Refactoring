<?php
declare(strict_types=1);

namespace App\common\repository\preset;

/**
 * ListPresetInterface
 *
 * "조회(list/count) 쿼리 레시피"를 한 곳에 모아두기 위한 인터페이스.
 *
 * - select/from/join/where/order를 repo 밖으로 빼서 preset으로 관리
 * - repository는 preset 실행만 담당(쿼리 스타일 강제)
 *
 * 주의:
 * - $db는 CI_DB_query_builder
 * - $query는 각 도메인 Query DTO(UserListQuery, LicenseListQuery, ...)를 그대로 전달
 */
interface ListPresetInterface
{
    /** @return string[] */
    public function selectCols(): array;

    /** @param mixed $db */
    public function baseFromJoin($db): void;

    /** @param mixed $db */
    public function applyWhere($db, $query): void;

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void;
}
