<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\repository\preset;

use App\common\repository\preset\ListPresetInterface;

final class SafetyProjectListEngineerFilterPreset implements ListPresetInterface
{
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER     = 'tb_user';

    private const A_ENGINEER = 'e';
    private const A_USER     = 'u';

    /** @return string[] */
    public function selectCols(): array
    {
        $e = self::A_ENGINEER;
        $u = self::A_USER;

        return [
            "{$e}.seq   AS engineer_seq",
            "{$u}.name  AS name",
            "{$e}.grade AS grade",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $e = self::A_ENGINEER;
        $u = self::A_USER;

        $db->from(self::T_ENGINEER . ' ' . $e);

        // name은 user_seq로 user 조인해서 가져옴
        $db->join(self::T_USER . ' ' . $u, "{$u}.seq = {$e}.user_seq", 'inner');

        // 기본 필터(프로젝트 preset이랑 동일한 성격)
        $db->where("{$e}.deleted", 'N');     // tb_safety_engineer.deleted :contentReference[oaicite:1]{index=1}
        $db->where("{$u}.status !=", 'Quit'); // tb_user.status Quit 제외(기존 패턴)
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        // 필터용 리스트라 별도 where 없으면 비워둬도 OK
        // (필요하면 여기서 name 검색 등 추가)
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $u = self::A_USER;
        $e = self::A_ENGINEER;

        // 이름 기준 정렬
        $db->order_by("{$u}.name", 'ASC');
        $db->order_by("{$e}.seq", 'DESC');
    }
}
