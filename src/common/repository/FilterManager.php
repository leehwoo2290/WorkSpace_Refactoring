<?php
declare(strict_types=1);

namespace App\common\repository;

use EnumMapper;

/**
 * FilterManager
 *
 * Repository의 where/filter 패턴을 통일하기 위한 공통 helper.
 *
 * - likeAny(): 여러 컬럼 OR LIKE 묶기
 * - dateRangeYmd(): from/to 날짜 범위(00:00:00 ~ 23:59:59) 통일
 * - whereEnum(): QueryEnumMapper 기반 enum 매핑/검증 통일
 * - whereMonth(): MONTH(col) = n 같은 raw expr는 int만 허용하도록 안전하게 통일
 * - whereCareerYearsGte(): TIMESTAMPDIFF(YEAR, ...) >= n 같은 raw expr 안전 통일
 *
 */
final class FilterManager
{
    /** @var mixed CI_DB_query_builder */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /** 빈 문자열/공백이면 필터 적용 안 함 */
    private function norm($raw): string
    {
        $t = trim((string) $raw);
        return $t;
    }

    /** 여러 컬럼을 OR LIKE로 묶어서 검색 */
    public function likeAny(array $cols, $rawKeyword): void
    {
        $q = $this->norm($rawKeyword);
        if ($q === '' || empty($cols))
            return;

        $this->db->group_start();
        $first = true;

        foreach ($cols as $col) {
            $col = trim((string) $col);
            if ($col === '')
                continue;

            if ($first) {
                $this->db->like($col, $q);
                $first = false;
            } else {
                $this->db->or_like($col, $q);
            }
        }

        $this->db->group_end();
    }

    /** 값이 비어있지 않으면 where(=) */
    public function whereEq(string $col, $raw): void
    {
        $v = $this->norm($raw);
        if ($v === '')
            return;

        $this->db->where($col, $v);
    }

    /** 숫자 문자열이면 where(= int) */
    public function whereEqInt(string $col, $raw): void
    {
        $v = $this->norm($raw);
        if ($v === '' || !ctype_digit($v))
            return;

        $this->db->where($col, (int) $v);
    }

    /**
     * enum 매핑 후 where(=)
     * - strict=true: 허용되지 않은 값이면 예외 (QueryEnumMapper)
     * - strict=false: 알 수 없는 값은 그대로 통과(레거시/점진 이행용)
     */
    public function whereEnum(string $col, array $maps, string $mapKey, $raw, bool $strict = true): void
    {
        $v = $this->norm($raw);
        if ($v === '')
            return;

        $mapped = EnumMapper::map($maps, $mapKey, $v, $strict);
        if (trim((string) $mapped) === '')
            return;

        $this->db->where($col, $mapped);
    }

    /**
     * 날짜 범위(YYYY-MM-DD) → col >= from 00:00:00 AND col <= to 23:59:59
     * - from/to가 비어있으면 해당 조건은 생략
     */
    public function dateRangeYmd(string $col, $fromYmd, $toYmd): void
    {
        $from = $this->norm($fromYmd);
        if ($from !== '') {
            $this->db->where($col . ' >=', $from . ' 00:00:00');
        }

        $to = $this->norm($toYmd);
        if ($to !== '') {
            $this->db->where($col . ' <=', $to . ' 23:59:59');
        }
    }

    /**
     * MONTH(dateCol) = month (month는 1~12만 허용)
     * - dateCol은 코드 상수/컬럼명(예: 'pr.birthday')만 넘겨야 함 (사용자 입력 금지)
     */
    public function whereMonth(string $dateCol, $month): void
    {
        $m = (int) $month;
        if ($m < 1 || $m > 12)
            return;

        $expr = 'MONTH(' . $dateCol . ') = ' . $m;
        $this->db->where($expr, null, false);
    }

    /**
     * TIMESTAMPDIFF(YEAR, joinDateCol, IFNULL(resignDateCol, CURDATE())) >= years
     * - years는 int(0 이상)만 허용
     * - 컬럼명은 코드 상수/컬럼명만 사용 (사용자 입력 금지)
     */
    public function whereCareerYearsGte(string $joinDateCol, string $resignDateCol, $years): void
    {
        // 값이 아예 없으면 필터 적용 X
        if ($years === null)
            return;

        $raw = trim((string) $years);

        // 빈값/undefined/null 문자열이면 필터 적용 X
        if ($raw === '' || strtolower($raw) === 'null' || strtolower($raw) === 'undefined') {
            return;
        }

        // 숫자만 허용 (0,1,2... 형태)
        if (!ctype_digit($raw))
            return;

        $y = (int) $raw;

        // 0은 "필터 없음"으로 취급 (0년 이상은 사실상 전체라 의미 없음)
        if ($y <= 0)
            return;

        $expr =
            'TIMESTAMPDIFF(YEAR, ' . $joinDateCol . ', IFNULL(' . $resignDateCol . ', CURDATE())) >= ' . $y;

        $this->db->where($expr, null, false);
    }

    /**
     * enum 매핑 후 likeAny 적용
     * - 예: region 값(enum or 문자열)을 addr/sido/sigungu LIKE 검색에 사용
     */
    public function likeAnyEnum(array $cols, array $maps, string $mapKey, $raw, bool $strict = false): void
    {
        $v = $this->norm($raw);
        if ($v === '' || empty($cols))
            return;

        $mapped = EnumMapper::map($maps, $mapKey, $v, $strict);
        if (trim((string) $mapped) === '')
            return;

        $this->likeAny($cols, $mapped);
    }

    /**
     * 숫자면 ID 컬럼(where = int), 아니면 enum 매핑 후 name 컬럼(where =)
     * - 예: department/position 필터(숫자면 seq, 문자열이면 enum→한글명 매핑 후 d.name/p.name 비교)
     */
    public function whereIdOrMappedName(
        string $idCol,
        string $nameCol,
        array $maps,
        string $mapKey,
        $raw,
        bool $strict = false
    ): void {
        $v = $this->norm($raw);
        if ($v === '')
            return;

        if (ctype_digit($v)) {
            $this->db->where($idCol, (int) $v);
            return;
        }

        $mapped = EnumMapper::map($maps, $mapKey, $v, $strict);
        if (trim((string) $mapped) === '')
            return;

        $this->db->where($nameCol, $mapped);
    }

}
