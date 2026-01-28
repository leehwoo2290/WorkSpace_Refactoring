<?php
declare(strict_types=1);

namespace App\safety\project\getList\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\preset\ListPresetInterface;
use App\common\traits\SortHelperTrait;

/**
 * SafetyProjectListPreset
 *
 * 안전진단 프로젝트 목록 조회(list/count) 쿼리 레시피.
 *
 * DB 스키마 기준:
 * - tb_safety_project
 * - tb_safety_mans (project_seq, engineer_seq)
 * - tb_safety_engineer (seq, user_seq)
 * - tb_user (seq, name)
 * - tb_license (seq, name, name_abbr)
 * - tb_safety_facility_type (seq, name)
 */
final class SafetyProjectListPreset implements ListPresetInterface
{
    use SortHelperTrait;

    private const T_PROJECT = 'tb_safety_project';
    private const T_LICENSE = 'tb_license';
    private const T_FACILITY_TYPE = 'tb_safety_facility_type';

    private const T_MANS = 'tb_safety_mans';
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';

    private const A_PROJECT = 'sp';
    private const A_LICENSE = 'l';
    private const A_FACILITY_TYPE = 'ft';
    private const A_ENG_AGG = 'eng';

    /** @return string[] */
    public function selectCols(): array
    {
        $sp = self::A_PROJECT;
        $l  = self::A_LICENSE;
        $ft = self::A_FACILITY_TYPE;
        $eng = self::A_ENG_AGG;

        return [
            "$sp.status AS status",
            "$sp.check_type AS check_type",
            // region: "시도 시군구" (둘 다 없으면 NULL)
            "NULLIF(CONCAT_WS(' ', $sp.sido, $sp.sigungu), '') AS region",
            "$sp.place_name AS place_name",

            // DTO 표기: filedBeginDate / fieldEndDate / reportDate
            "$sp.field_bgn_dt AS filed_begin_date",
            "$sp.field_end_dt AS field_end_date",
            "$sp.report_dt AS report_date",

            "$ft.name AS facility_type",
            "$sp.jong AS jong",
            "$l.name AS license_name",
            "$eng.engineer_name AS engineer_name",
            "$sp.gross_area AS gross_area",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $sp = self::A_PROJECT;
        $l  = self::A_LICENSE;
        $ft = self::A_FACILITY_TYPE;
        $eng = self::A_ENG_AGG;

        $db->from(self::T_PROJECT . ' ' . $sp);

        // license
        $db->join(self::T_LICENSE . ' ' . $l, "$l.seq = $sp.license_seq", 'left');

        // facility type
        $db->join(self::T_FACILITY_TYPE . ' ' . $ft, "$ft.seq = $sp.facility_seq", 'left');

        // engineer name aggregation (참여기술진)
        $db->join('(' . $this->engineerAggSql() . ") $eng", "$eng.project_seq = $sp.seq", 'left', false);
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) {
            return;
        }

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();

        $f = new FilterManager($db);

        $sp = self::A_PROJECT;
        $l  = self::A_LICENSE;

        // 기본: 삭제 제외
        $db->where("$sp.deleted", 'N');

        // status
        $f->whereEq("$sp.status", $where['status'] ?? null);

        // licenseSeq
        $f->whereEqInt("$sp.license_seq", $where['licenseSeq'] ?? null);

        // region (시도/시군구/주소 LIKE)
        $f->likeAny(["$sp.sido", "$sp.sigungu", "$sp.addr"], $where['region'] ?? null);

        // 날짜 필터(현장 시작/종료)
        if (!empty($where['filedBeginDate'])) {
            $db->where("$sp.field_bgn_dt >=", (string) $where['filedBeginDate']);
        }
        if (!empty($where['fieldEndDate'])) {
            $db->where("$sp.field_end_dt <=", (string) $where['fieldEndDate']);
        }

        // engineerSeq 참여 필터
        // - 스키마상 sm.engineer_seq는 tb_safety_engineer.seq를 가리키지만,
        //   프론트/기존 코드에서 tb_user.seq를 전달하는 경우도 있어
        //   (engineer_seq == v OR engineer.user_seq == v) 둘 다 허용.
        if (!empty($where['engineerSeq']) && ctype_digit((string) $where['engineerSeq'])) {
            $engineerSeq = (int) $where['engineerSeq'];

            $mans = self::T_MANS;
            $se = self::T_ENGINEER;
            $u = self::T_USER;

            $existsSql = "EXISTS (\n"
                . "  SELECT 1\n"
                . "    FROM {$mans} sm\n"
                . "    JOIN {$se} se ON se.seq = sm.engineer_seq AND se.deleted = 'N'\n"
                . "    JOIN {$u} u ON u.seq = se.user_seq AND u.status != 'Quit'\n"
                . "   WHERE sm.project_seq = {$sp}.seq\n"
                . "     AND (sm.engineer_seq = {$engineerSeq} OR se.user_seq = {$engineerSeq})\n"
                . ")";

            $db->where($existsSql, null, false);
        }

        // searchKeyword (업체명 등)
        $f->likeAny(
            [
                "$l.name",
                "$l.name_abbr",
                "$sp.place_name",
                "$sp.manager_name",
                "$sp.unique_id",
                "$sp.building_id",
                "$sp.addr",
                "$sp.report_no",
            ],
            $where['searchKeyword'] ?? null
        );
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $sorts = $this->extractSorts($query);

        $sp = self::A_PROJECT;
        $l  = self::A_LICENSE;

        $map = [
            'filedBeginDate' => ['type' => 'col', 'value' => "$sp.field_bgn_dt"],
            'fieldEndDate'   => ['type' => 'col', 'value' => "$sp.field_end_dt"],
            'reportDate'     => ['type' => 'col', 'value' => "$sp.report_dt"],
            'licenseName'    => ['type' => 'col', 'value' => "$l.name"],
            'grossArea'      => ['type' => 'col', 'value' => "$sp.gross_area"],
        ];

        $this->applySortMap($db, $sorts, $map, "$sp.seq", 'DESC');
    }

    /** 참여기술진을 "A / B / C" 형태로 합쳐서 project_seq 단위로 반환 */
    private function engineerAggSql(): string
    {
        $mans = self::T_MANS;
        $se = self::T_ENGINEER;
        $u = self::T_USER;

        // MySQL: GROUP_CONCAT
        return "\n            SELECT\n                sm.project_seq AS project_seq,\n                GROUP_CONCAT(DISTINCT u.name ORDER BY u.name SEPARATOR ' / ') AS engineer_name\n            FROM {$mans} sm\n            JOIN {$se} se ON se.seq = sm.engineer_seq AND se.deleted = 'N'\n            JOIN {$u} u ON u.seq = se.user_seq AND u.status != 'Quit'\n            GROUP BY sm.project_seq\n        ";
    }
}
