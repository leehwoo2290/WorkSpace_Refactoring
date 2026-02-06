<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\preset\ListPresetInterface;

final class SafetyEngineerAutocompletePreset implements ListPresetInterface
{
    private const T_USER = 'tb_user';
    private const T_ENGINEER = 'tb_safety_engineer';

    private const A_USER = 'u';
    private const A_ENGINEER = 'e';

    public function selectCols(): array
    {
        $u = self::A_USER;

        return [
            "{$u}.seq AS user_seq",
            "{$u}.email AS email",
            "{$u}.name AS name",
        ];
    }

    public function baseFromJoin($db): void
    {
        $u = self::A_USER;
        $e = self::A_ENGINEER;

        $db->from(self::T_USER . ' ' . $u);

        // 이미 기술자로 등록된 유저는 제외(활성 deleted='N')
        $db->join(
            self::T_ENGINEER . ' ' . $e,
            "{$e}.user_seq = {$u}.seq AND {$e}.deleted = 'N'",
            'left'
        );
    }

    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) return;

        $where = (array)$query->makeWhere();
        $u = self::A_USER;
        $e = self::A_ENGINEER;

        $type = (string)($where['type'] ?? 'all');
        $term = trim((string)($where['keyword'] ?? ''));

        if ($term === '') { // 검색어 없으면 빈 결과
            $db->where('1=0', null, false);
            return;
        }

        $db->where("{$u}.status !=", 'Quit');
        $db->where("{$e}.user_seq IS NULL", null, false);

        $f = new FilterManager($db);
        if ($type === 'email')      $f->likeAny(["{$u}.email"], $term);
        else if ($type === 'name')  $f->likeAny(["{$u}.name"], $term);
        else                        $f->likeAny(["{$u}.email", "{$u}.name"], $term);

        // $limit = (int)($where['limit'] ?? 20);
        // if ($limit <= 0) $limit = 20;
        // if ($limit > 50) $limit = 50;
        // $db->limit($limit);
    }

    public function applyOrderBy($db, $query): void
    {
        $u = self::A_USER;
        $where = (is_object($query) && method_exists($query, 'makeWhere')) ? (array)$query->makeWhere() : [];
        $type = (string)($where['type'] ?? 'all');

        if ($type === 'email') $db->order_by("{$u}.email", 'ASC');
        else                  $db->order_by("{$u}.name", 'ASC');

        $db->order_by("{$u}.seq", 'DESC');
    }
}
