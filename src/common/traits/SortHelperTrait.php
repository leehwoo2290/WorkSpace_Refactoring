<?php
declare(strict_types=1);

namespace App\common\traits;

trait SortHelperTrait
{
    /**
     * Query에서 sort 정보를 꺼내서 표준 배열로 반환
     * 반환: [ ['by' => 'name', 'dir' => 'ASC'], ... ]
     */
    protected function extractSorts($query): array
    {
        $sorts = [];

        // 1) query->sorts()가 있으면 최우선
        if (is_object($query) && method_exists($query, 'sorts')) {
            $sorts = (array) $query->sorts();
        }

        // 2) fallback: makeWhere() 기반
        if (empty($sorts) && is_object($query) && method_exists($query, 'makeWhere')) {
            $where = (array) $query->makeWhere();

            if (isset($where['sorts']) && is_array($where['sorts'])) {
                $sorts = $where['sorts'];
            } elseif (!empty($where['sortBy'])) {
                $dir = !empty($where['sortDir']) ? (string) $where['sortDir'] : 'ASC';
                $sorts = [
                    ['by' => (string) $where['sortBy'], 'dir' => strtoupper((string) $dir)],
                ];
            }
        }

        // 3) 표준화(형태 깨진 것 방어)
        $out = [];
        foreach ($sorts as $spec) {
            if (!is_array($spec)) continue;
            $by = isset($spec['by']) ? trim((string)$spec['by']) : '';
            if ($by === '') continue;

            $dirRaw = isset($spec['dir']) ? strtoupper(trim((string)$spec['dir'])) : 'ASC';
            $dir = ($dirRaw === 'DESC') ? 'DESC' : 'ASC';

            $out[] = ['by' => $by, 'dir' => $dir];
        }

        return $out;
    }

    /**
     * map 기반으로 ORDER BY 적용
     * map 예:
     * [
     *   'name' => ['type'=>'col','value'=>'u.name'],
     *   'age'  => ['type'=>'raw','value'=>'TIMESTAMPDIFF(...)'],
     * ]
     */
    protected function applySortMap($db, array $sorts, array $map, string $defaultOrderCol, string $defaultOrderDir = 'DESC'): void
    {
        if (empty($sorts)) {
            $db->order_by($defaultOrderCol, $defaultOrderDir);
            return;
        }

        foreach ($sorts as $spec) {
            $by = $spec['by'];
            if (!isset($map[$by])) continue;

            $dir = ($spec['dir'] === 'DESC') ? 'DESC' : 'ASC';
            $def = $map[$by];

            $type = isset($def['type']) ? (string)$def['type'] : 'col';
            $value = isset($def['value']) ? (string)$def['value'] : '';

            if ($value === '') continue;

            if ($type === 'raw') {
                $this->orderByNullLastRaw($db, $value, $dir);
            } else {
                $this->orderByNullLast($db, $value, $dir);
            }
        }

        // 안정 정렬
        $db->order_by($defaultOrderCol, $defaultOrderDir);
    }

    protected function orderByNullLast($db, string $columnOrExpr, string $dir): void
    {
        $db->order_by("({$columnOrExpr}) IS NULL", 'ASC', false);
        $db->order_by($columnOrExpr, $dir, false);
    }

    protected function orderByNullLastRaw($db, string $expr, string $dir): void
    {
        $db->order_by("({$expr}) IS NULL", 'ASC', false);
        $db->order_by($expr, $dir, false);
    }
}
