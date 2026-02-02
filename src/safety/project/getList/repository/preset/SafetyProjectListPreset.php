<?php
declare(strict_types=1);

namespace App\safety\project\getList\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\preset\ListPresetInterface;
use App\common\traits\SortHelperTrait;

use App\safety\common\SafetyEnumMaps;

use EnumMapper;

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
        $l = self::A_LICENSE;
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
        $l = self::A_LICENSE;
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

    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) {
            return;
        }

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();

        $f = new FilterManager($db);
        $maps = SafetyEnumMaps::maps();

        $sp = self::A_PROJECT;
        $l = self::A_LICENSE;

        // 기본: 삭제 제외
        $db->where("$sp.deleted", 'N');

        // status (projectStatus -> DB status 매핑)
        $statusRaw = trim((string) (($where['projectStatus'] ?? ($where['status'] ?? ''))));

        if ($statusRaw !== '') {
            $mapped = EnumMapper::map($maps, 'safety_status', $statusRaw);
            $db->where("$sp.status", $mapped);
        }

        // checkType (inspectionType -> DB checkType 매핑)
        $checkTypeRaw = trim((string) (($where['inspectionType'] ?? ($where['checkType'] ?? ''))));

        if ($checkTypeRaw !== '') {
            $mapped = EnumMapper::map($maps, 'safety_checkType', $checkTypeRaw);
            $db->where("$sp.check_type", $mapped);
        }

        // licenseSeq
        $f->whereEqInt("$sp.license_seq", $where['licenseSeq'] ?? null);

        // region (시도/시군구/주소 LIKE) - pr 조인 없으니 sp 기준으로
        $f->likeAnyEnum(
            ["$sp.addr", "$sp.sido", "$sp.sigungu"],
            $maps,
            'region',
            $where['region'] ?? null,
            false
        );

        // 날짜 필터(현장 시작/종료)
        if (!empty($where['fieldBeginDate'])) {
            $db->where("$sp.field_bgn_dt >=", (string) $where['fieldBeginDate']);
        }
        if (!empty($where['fieldEndDate'])) {
            $db->where("$sp.field_end_dt <=", (string) $where['fieldEndDate']);
        }

        // engineerSeq 참여 필터 (기존 유지)
        if (!empty($where['engineerSeq']) && ctype_digit((string) $where['engineerSeq'])) {
            $engineerSeq = (int) $where['engineerSeq'];

            $mans = self::T_MANS;
            $se = self::T_ENGINEER;
            $u = self::T_USER;

            $existsSql = "EXISTS (
            SELECT 1
              FROM {$mans} sm
              JOIN {$se} se ON se.seq = sm.engineer_seq AND se.deleted = 'N'
              JOIN {$u}  u  ON u.seq = se.user_seq AND u.status != 'Quit'
             WHERE sm.project_seq = {$sp}.seq
               AND (sm.engineer_seq = {$engineerSeq} OR se.user_seq = {$engineerSeq})
        )";

            $db->where($existsSql, null, false);
        }

        // searchKeyword (업체명 등)
        $f->likeAny(
            [
                //"$l.name",
                //"$l.name_abbr",
                "$sp.place_name",
                //"$sp.manager_name",
                //"$sp.unique_id",
                //"$sp.building_id",
                //"$sp.addr",
                //"$sp.report_no",
            ],
            $where['searchKeyword'] ?? null
        );
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $sorts = $this->extractSorts($query);

        $sp = self::A_PROJECT;
        $l = self::A_LICENSE;

        $map = [
            'fieldBeginDate' => ['type' => 'col', 'value' => "$sp.field_bgn_dt"],
            'fieldEndDate' => ['type' => 'col', 'value' => "$sp.field_end_dt"],
            'reportDate' => ['type' => 'col', 'value' => "$sp.report_dt"],
            'licenseName' => ['type' => 'col', 'value' => "$l.name"],
            'grossArea' => ['type' => 'col', 'value' => "$sp.gross_area"],
        ];

        $this->applySortMap($db, $sorts, $map, "$sp.seq", 'DESC');
    }

    /** 참여기술진을 JSON 객체 배열 문자열로(project_seq 단위) 반환 */
    private function engineerAggSql(): string
    {
        $mans = self::T_MANS;
        $se = self::T_ENGINEER;
        $u = self::T_USER;

        // 결과 예: [{"name":"홍길동"},{"name":"김철수"}]
        return "\n            SELECT
                sm.project_seq AS project_seq,
                CONCAT(
                    '[',
                    IFNULL(
                        GROUP_CONCAT(
                            DISTINCT CONCAT(
                                '{\"name\":', JSON_QUOTE(u.name),
                                '}'
                            )
                            ORDER BY u.name SEPARATOR ','
                        ),
                        ''
                    ),
                    ']'
                ) AS engineer_name
            FROM {$mans} sm
            JOIN {$se} se ON se.seq = sm.engineer_seq AND se.deleted = 'N'
            JOIN {$u} u ON u.seq = se.user_seq AND u.status != 'Quit'
            GROUP BY sm.project_seq
        ";
    }

}
