<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\repository\preset;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\FilterManager;

final class SafetyProjectAutocompletePreset implements ListPresetInterface
{
    private const T_PROJECT = 'tb_safety_project';
    private const A_PROJECT = 'sp';

    /** @return string[] */
    public function selectCols(): array
    {
        $sp = self::A_PROJECT;

        return [
            "$sp.seq AS id",
            "IFNULL($sp.place_name, '') AS place_name",
            "$sp.facility_no AS facility_no",
            "$sp.unique_id AS unique_id",
            "$sp.building_id AS building_id",
        ];
    }

    public function baseFromJoin($db): void
    {
        $db->from(self::T_PROJECT . ' ' . self::A_PROJECT);
    }
    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere'))
            return;

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();

        $sp = self::A_PROJECT;
        $f = new FilterManager($db);

        // 기본: 삭제 제외
        $db->where("$sp.deleted", 'N');

        $type = (string) ($where['type'] ?? 'placeName');
        $term = trim((string) ($where['q'] ?? ''));

        // 타이핑 중 과도 호출 방지(1글자 미만이면 빈 결과)
        // if (mb_strlen($term) < 1) {
        //     $db->where('1=0', null, false);
        //     return;
        // }

        // type -> column allow-list (인젝션 방지)
        $colMap = [
            'placeName' => "$sp.place_name",
            'facilityNum' => "$sp.facility_no",
            'uniqueNum' => "$sp.unique_id",
            'buildingId' => "$sp.building_id",
        ];

        //기본은 place
        $col = $colMap[$type] ?? "$sp.place_name";

        $type = (string) ($where['type'] ?? 'placeName');
        $term = trim((string) ($where['q'] ?? ''));

        //  q 비면 전체목록 내려주지 말고 빈 결과로
        if ($term === '') {
            $db->where('1=0', null, false);
            return;
        }

        // placeName 자동완성일 때: 중복 place_name 제거 + bgn_dt 최신 1건만
        if ($type === 'placeName') {
            // bgn_dt NULL 제외 (점검시작일) :contentReference[oaicite:1]{index=1}
            $db->where("$sp.bgn_dt IS NOT NULL", null, false);

            // 같은 place_name 중 bgn_dt가 가장 큰(최신) 행만 남김
            $db->where(
                "$sp.bgn_dt = (
            SELECT MAX(p2.bgn_dt)
            FROM " . self::T_PROJECT . " p2
            WHERE p2.deleted = 'N'
              AND p2.bgn_dt IS NOT NULL
              AND p2.place_name = $sp.place_name
        )",
                null,
                false
            );

            // 최신 bgn_dt가 같은 행이 여러 개면 seq가 가장 큰 1건만
            $db->where(
                "$sp.seq = (
            SELECT MAX(p3.seq)
            FROM " . self::T_PROJECT . " p3
            WHERE p3.deleted = 'N'
              AND p3.bgn_dt IS NOT NULL
              AND p3.place_name = $sp.place_name
              AND p3.bgn_dt = $sp.bgn_dt
        )",
                null,
                false
            );
        }
        // 프로젝트 스타일: FilterManager로 LIKE 처리
        $f->likeAny([$col], $term);

        // limit 강제
        // 자동완성은 타이핑할 때마다 API가 호출돼서 DB가 자주 조회됨.
        //limit이 안오면 기본 100개
        // $limit = (int) ($where['limit'] ?? 100);
        // if ($limit <= 0)
        //     $limit = 100;
        // $db->limit($limit);
    }

    public function applyOrderBy($db, $query): void
    {
        // 입력한 type 기준으로 정렬
        $type = 'placeName';
        $where = (is_object($query) && method_exists($query, 'makeWhere')) ? (array) $query->makeWhere() : [];
        $type = (string) ($where['type'] ?? 'placeName');

        $sp = self::A_PROJECT;

        $colMap = [
            'placeName' => "$sp.place_name",
            'facilityNum' => "$sp.facility_no",
            'uniqueNum' => "$sp.unique_id",
            'buildingId' => "$sp.building_id",
        ];
        $col = $colMap[$type] ?? "$sp.place_name";

        $db->order_by($col, 'ASC');
        $db->order_by("$sp.seq", 'DESC');
    }
}
