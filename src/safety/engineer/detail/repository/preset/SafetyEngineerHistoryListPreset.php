<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\repository\preset;

use App\common\repository\preset\ListPresetInterface;

/**
 * SafetyEngineerHistoryListPreset
 *
 * "엔지니어 점검이력" = tb_safety_mans(engineer_seq -> project_seq)로 매핑된 프로젝트들을
 * tb_safety_project에서 최신 점검 시작일(bgn_dt) DESC로 조회한다.
 *
 * - 조회 기준: tb_safety_mans.engineer_seq = :engineerSeq
 * - 프로젝트 삭제 제외: tb_safety_project.deleted = 'N'
 * - limit: legacy 화면과 동일하게 기본 1000
 */
final class SafetyEngineerHistoryListPreset implements ListPresetInterface
{
    private const T_PROJECT = 'tb_safety_project';
    private const T_MANS = 'tb_safety_mans';
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';
    private const T_FACILITY_TYPE = 'tb_safety_facility_type';

    private const A_PROJECT = 'p';
    private const A_FACILITY_TYPE = 'ft';
    private const A_ENG_AGG = 'eng';

    /** @return string[] */
    public function selectCols(): array
    {
        $p = self::A_PROJECT;
        $ft = self::A_FACILITY_TYPE;
        $eng = self::A_ENG_AGG;

        return [
            "{$p}.seq AS project_seq",

            // legacy make_project_name()과 동일한 조합(현장명 + 연도/상·하반기 + 시설물구분 + 점검종류)
            "CONCAT_WS(' ',
                {$p}.place_name,
                IF({$p}.bgn_dt IS NULL, NULL,
                    CONCAT(
                        YEAR({$p}.bgn_dt),
                        '년 ',
                        IF(MONTH({$p}.bgn_dt) BETWEEN 1 AND 6, '상반기', '하반기')
                    )
                ),
                {$ft}.name,
                {$p}.check_type
            ) AS project_name",

            "{$p}.bgn_dt AS bgn_dt",
            "{$p}.end_dt AS end_dt",

            // 참여기술진: tb_safety_mans → tb_safety_engineer → tb_user.name
            "IFNULL({$eng}.engineers, '[]') AS engineers",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $p = self::A_PROJECT;
        $ft = self::A_FACILITY_TYPE;
        $eng = self::A_ENG_AGG;

        $db->from(self::T_PROJECT . " {$p}");
        $db->join(self::T_FACILITY_TYPE . " {$ft}", "{$ft}.seq = {$p}.facility_seq", 'left');
        $db->join('(' . $this->engineerAggSql() . ") {$eng}", "{$eng}.project_seq = {$p}.seq", 'left', false);
    }

    /** @param mixed $db @param mixed $query */
    public function applyWhere($db, $query): void
    {
        $p = self::A_PROJECT;
        $engineerSeq = (int) $query;

        $db->where("{$p}.deleted", 'N');

        // CI3 바인딩이 어려워 int 캐스팅으로 안전 확보
        $db->where(
            "{$p}.seq IN (SELECT project_seq FROM " . self::T_MANS . " WHERE engineer_seq = {$engineerSeq})",
            null,
            false
        );
    }

    /** @param mixed $db @param mixed $query */
    public function applyOrderBy($db, $query): void
    {
        $p = self::A_PROJECT;

        $db->order_by("{$p}.bgn_dt", 'DESC');

        // legacy 화면과 동일: 기본 1000
        $db->limit(1000);
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
                ) AS engineers
            FROM {$mans} sm
            JOIN {$se} se ON se.seq = sm.engineer_seq AND se.deleted = 'N'
            JOIN {$u}  u  ON u.seq = se.user_seq AND u.status != 'Quit'
            GROUP BY sm.project_seq
        ";
    }
}
