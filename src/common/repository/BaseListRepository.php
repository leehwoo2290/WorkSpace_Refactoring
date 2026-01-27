<?php
declare(strict_types=1);

namespace App\common\repository;

/**
 * BaseListRepository
 *
 * - list/count 류 Repository의 공통 골격 제공
 * - public 메서드에서 resetQuery()를 강제해 query builder 상태 누적을 방지
 */
abstract class BaseListRepository extends BaseRepository
{
    /**
     * @param callable():void $build
     */
    protected function countWith(callable $build): int
    {
        $this->resetQuery();

        $build();

        return (int) $this->db->count_all_results();
    }

    /**
     * @param callable():void $build
     * @return object[]
     */
    protected function listWith(callable $build): array
    {
        $this->resetQuery();

        $build();

        return $this->db->get()->result();
    }

    /**
     * paging helper (query에 size()/offset()이 있는 경우만 적용)
     * @param mixed $query
     */
    protected function applyPaging($query): void
    {
        if (!is_object($query)) return;
        if (!method_exists($query, 'size') || !method_exists($query, 'offset')) return;

        $size = (int) $query->size();
        $offset = (int) $query->offset();

        $this->db->limit($size, $offset);
    }
}
