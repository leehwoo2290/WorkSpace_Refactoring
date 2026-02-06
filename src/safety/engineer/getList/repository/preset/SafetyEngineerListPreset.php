<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\preset\ListPresetInterface;
use App\common\traits\SortHelperTrait;

use App\safety\common\SafetyEnumMaps;

use EnumMapper;

/**
 * SafetyEngineerListPreset
 *
 * 테이블:
 * - tb_safety_engineer(se)
 * - tb_user(u)
 * - tb_license(l)
 * - tb_user_office(o)
 * - tb_office_department(d)
 * - tb_office_position(p)
 * - tb_safety_mans(sm)
 * - tb_safety_project(sp)
 */
final class SafetyEngineerListPreset implements ListPresetInterface
{
    use SortHelperTrait;

    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';
    private const T_LICENSE = 'tb_license';
    private const T_OFFICE = 'tb_user_office';
    private const T_DEPT = 'tb_office_department';
    private const T_POS = 'tb_office_position';

    private const T_MANS = 'tb_safety_mans';
    private const T_PROJECT = 'tb_safety_project';

    private const A_ENGINEER = 'se';
    private const A_USER = 'u';
    private const A_LICENSE = 'l';
    private const A_OFFICE = 'o';
    private const A_DEPT = 'd';
    private const A_POS = 'p';
    private const A_PROJ_AGG = 'pa';

    /** @return string[] */
    public function selectCols(): array
    {
        $se = self::A_ENGINEER;
        $u = self::A_USER;
        $l = self::A_LICENSE;
        $d = self::A_DEPT;
        $p = self::A_POS;
        $pa = self::A_PROJ_AGG;

        return [
            "{$u}.seq AS user_seq",
            "$l.name AS license_name",
            "$se.grade AS grade",
            "$u.name AS name",
            "$d.name AS department_name",
            "$p.name AS position_name",
            "$se.license_no AS license_no",
            "$u.email AS email",
            "$se.status AS status",
            "$pa.project_cnt AS project_cnt",
            "$pa.last_project AS last_project",
            "$pa.last_project_date AS last_project_date",
            "$se.remark AS remark",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $se = self::A_ENGINEER;
        $u = self::A_USER;
        $l = self::A_LICENSE;
        $o = self::A_OFFICE;
        $d = self::A_DEPT;
        $p = self::A_POS;
        $pa = self::A_PROJ_AGG;

        $db->from(self::T_ENGINEER . " {$se}");
        $db->join(self::T_USER . " {$u}", "{$u}.seq = {$se}.user_seq", 'inner');

        $db->join(self::T_LICENSE . " {$l}", "{$l}.seq = {$u}.license_seq", 'left');
        $db->join(self::T_OFFICE . " {$o}", "{$o}.user_seq = {$u}.seq", 'left');
        $db->join(self::T_DEPT . " {$d}", "{$d}.seq = {$o}.department_seq", 'left');
        $db->join(self::T_POS . " {$p}", "{$p}.seq = {$o}.position_seq", 'left');

        // 프로젝트 집계(현장수, 마지막 현장/기간)
        $db->join('(' . $this->projectAggSql() . ") {$pa}", "{$pa}.engineer_seq = {$se}.seq", 'left', false);
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
        $maps = SafetyEnumMaps::maps();

        $se = self::A_ENGINEER;
        $u = self::A_USER;

        // 기본: 삭제 제외
        $db->where("{$se}.deleted", 'N');

        // 기본: 퇴사 제외(프로젝트 preset에서도 Quit 하드코딩 사용 중)
        $db->where("{$u}.status !=", 'Quit');

        // 회사(필수)
        $f->whereEqInt("{$u}.license_seq", $where['licenseSeq'] ?? null);

        // 등급/상태
        // grade (grade -> DB status 매핑)
        $gradeRaw = trim((string) ($where['grade'] ?? ''));

        if ($gradeRaw !== '') {
            $mapped = EnumMapper::map($maps, 'safety_engineer_grade', $gradeRaw);
            $db->where("$se.grade", $mapped);
        }

        // status (status -> DB checkType 매핑)
        $statusRaw = trim((string) ($where['status'] ?? ''));

        if ($statusRaw !== '') {
            $mapped = EnumMapper::map($maps, 'safety_engineer_status', $statusRaw);
            $db->where("$se.status", $mapped);
        }

        // 검색(이름)
        $f->likeAny(["{$u}.name"], $where['searchKeywordName'] ?? null);

        // 검색(현장명): 참여 프로젝트 중 place_name LIKE
        $kwPlace = trim((string) ($where['searchKeywordPlaceName'] ?? ''));
        if ($kwPlace !== '') {
            $escaped = $db->escape_like_str($kwPlace);
            $like = '%' . $escaped . '%';

            $existsSql =
                "EXISTS ("
                . " SELECT 1"
                . "   FROM " . self::T_MANS . " sm"
                . "   JOIN " . self::T_PROJECT . " sp ON sp.seq = sm.project_seq AND sp.deleted = 'N'"
                . "  WHERE sm.engineer_seq = {$se}.seq"
                . "    AND sp.place_name LIKE " . $db->escape($like) . " ESCAPE '!'"
                . ")";

            $db->where($existsSql, null, false);
        }
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $sorts = $this->extractSorts($query);

        $se = self::A_ENGINEER;
        $u = self::A_USER;
        $l = self::A_LICENSE;
        $d = self::A_DEPT;
        $p = self::A_POS;
        $pa = self::A_PROJ_AGG;

        $map = [
            'name' => ['type' => 'col', 'value' => "{$u}.name"],
            'licenseName' => ['type' => 'col', 'value' => "{$l}.name"],
            'grade' => ['type' => 'col', 'value' => "{$se}.grade"],
            'department' => ['type' => 'col', 'value' => "{$d}.name"],
            'position' => ['type' => 'col', 'value' => "{$p}.name"],
            'status' => ['type' => 'col', 'value' => "{$se}.status"],
            'projectCnt' => ['type' => 'col', 'value' => "{$pa}.project_cnt"],
            // 정렬은 날짜 컬럼으로(문자열 last_project_date가 아니라 last_dt)
            'lastProjectDate' => ['type' => 'col', 'value' => "{$pa}.last_dt"],
            'email' => ['type' => 'col', 'value' => "{$u}.email"],
            'licenseNum' => ['type' => 'col', 'value' => "{$se}.license_no"],
        ];

        $this->applySortMap($db, $sorts, $map, "{$se}.seq", 'DESC');
    }

    /**
     * engineer_seq 단위 집계:
     * - project_cnt
     * - last_project (가장 최근 투입 프로젝트 place_name)
     * - last_project_date ("bgn_dt ~ end_dt" 문자열)
     * - last_dt (정렬용)
     */
    private function projectAggSql(): string
    {
        return "\n"
            . "SELECT\n"
            . "  sm.engineer_seq AS engineer_seq,\n"
            . "  COUNT(DISTINCT sm.project_seq) AS project_cnt,\n"
            . "  SUBSTRING_INDEX(\n"
            . "    GROUP_CONCAT(\n"
            . "      sp.place_name\n"
            . "      ORDER BY COALESCE(sm.end_dt, sp.field_end_dt, sm.bgn_dt, sp.field_bgn_dt) DESC\n"
            . "      SEPARATOR '||'\n"
            . "    ),\n"
            . "    '||', 1\n"
            . "  ) AS last_project,\n"
            . "  SUBSTRING_INDEX(\n"
            . "    GROUP_CONCAT(\n"
            . "      NULLIF(CONCAT_WS(' ~ ', sm.bgn_dt, sm.end_dt), '')\n"
            . "      ORDER BY COALESCE(sm.end_dt, sp.field_end_dt, sm.bgn_dt, sp.field_bgn_dt) DESC\n"
            . "      SEPARATOR '||'\n"
            . "    ),\n"
            . "    '||', 1\n"
            . "  ) AS last_project_date,\n"
            . "  MAX(COALESCE(sm.end_dt, sp.field_end_dt, sm.bgn_dt, sp.field_bgn_dt)) AS last_dt\n"
            . "FROM " . self::T_MANS . " sm\n"
            . "JOIN " . self::T_PROJECT . " sp ON sp.seq = sm.project_seq AND sp.deleted = 'N'\n"
            . "GROUP BY sm.engineer_seq\n";
    }
}
