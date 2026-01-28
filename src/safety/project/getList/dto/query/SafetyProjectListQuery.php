<?php
declare(strict_types=1);

namespace App\safety\project\getList\dto\query;

use App\common\dto\HttpQueryDto;
use InvalidArgumentException;

final class SafetyProjectListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    /** @var array<int, array{by:string, dir:string}> */
    private array $sorts;

    // filters/search
    private ?string $status;         // 진행 상태
    private ?int $licenseSeq;        // 점검업체 seq
    private ?int $engineerSeq;       // 점검자/기술자 seq (참여기술진 필터)
    private ?string $region;         // 지역
    private ?string $searchKeyword;  // 검색(업체명 등)
    private ?string $filedBeginDate; // 점검 시작일 (yyyy-mm-dd)
    private ?string $fieldEndDate;   // 점검 종료일 (yyyy-mm-dd)

    /**
     * @param array<int, array{by:string, dir:string}> $sorts
     */
    private function __construct(
        int $page,
        int $size,
        array $sorts,
        ?string $status,
        ?int $licenseSeq,
        ?int $engineerSeq,
        ?string $region,
        ?string $searchKeyword,
        ?string $filedBeginDate,
        ?string $fieldEndDate
    ) {
        $this->page = $page > 0 ? $page : 1;
        $this->size = $size > 0 ? $size : 20;

        $this->sorts = $sorts;

        $this->status = self::normStr($status);

        $this->licenseSeq = ($licenseSeq !== null && $licenseSeq > 0) ? $licenseSeq : null;
        $this->engineerSeq = ($engineerSeq !== null && $engineerSeq > 0) ? $engineerSeq : null;

        $this->region = self::normStr($region);
        $this->searchKeyword = self::normStr($searchKeyword);

        $this->filedBeginDate = self::normStr($filedBeginDate);
        $this->fieldEndDate = self::normStr($fieldEndDate);
    }

    public static function fromArray(array $query): self
    {
        self::checkAllowedKeys($query);

        $page = isset($query['page']) ? max(1, (int) $query['page']) : 1;
        $size = isset($query['size']) ? max(1, (int) $query['size']) : 20;

        $sorts = self::parseSorts($query['sortBy'] ?? null, $query['sortDir'] ?? null);

        $status = self::getStr($query, 'status');
        $licenseSeq = self::getInt($query, 'licenseSeq');
        $engineerSeq = self::getInt($query, 'engineerSeq');

        $region = self::getStr($query, 'region');
        $searchKeyword = self::getStr($query, 'searchKeyword');

        $filedBeginDate = self::getStr($query, 'filedBeginDate'); // 스펙 그대로(오타 포함)
        $fieldEndDate = self::getStr($query, 'fieldEndDate');

        return new self(
            $page,
            $size,
            $sorts,
            $status,
            $licenseSeq,
            $engineerSeq,
            $region,
            $searchKeyword,
            $filedBeginDate,
            $fieldEndDate
        );
    }

    private static function checkAllowedKeys(array $query): void
    {
        $allowed = [
            'page', 'size',
            'sortBy', 'sortDir',

            'status',
            'licenseSeq',
            'engineerSeq',
            'region',
            'searchKeyword',
            'filedBeginDate',
            'fieldEndDate',
        ];

        foreach ($query as $k => $_) {
            if (!in_array($k, $allowed, true)) {
                throw new InvalidArgumentException("UNKNOWN_QUERY_KEY: {$k}");
            }
        }
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }
    public function offset(): int { return ($this->page - 1) * $this->size; }

    /** @return array<int, array{by:string, dir:string}> */
    public function sorts(): array { return $this->sorts; }

    public function makeWhere(): array
    {
        $where = [
            'page' => $this->page,
            'size' => $this->size,
            'offset' => $this->offset(),
        ];

        if (!empty($this->sorts)) {
            $where['sorts'] = $this->sorts;
        }

        if ($this->status !== null)        $where['status'] = $this->status;
        if ($this->licenseSeq !== null)    $where['licenseSeq'] = $this->licenseSeq;
        if ($this->engineerSeq !== null)   $where['engineerSeq'] = $this->engineerSeq;
        if ($this->region !== null)        $where['region'] = $this->region;
        if ($this->searchKeyword !== null) $where['searchKeyword'] = $this->searchKeyword;
        if ($this->filedBeginDate !== null)$where['filedBeginDate'] = $this->filedBeginDate;
        if ($this->fieldEndDate !== null)  $where['fieldEndDate'] = $this->fieldEndDate;

        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null) return null;
        $t = trim($v);
        return $t === '' ? null : $t;
    }

    /**
     * @param mixed $rawSortBy  string|array|null
     * @param mixed $rawSortDir string|array|null
     * @return array<int, array{by:string, dir:string}>
     */
    private static function parseSorts($rawSortBy, $rawSortDir): array
    {
        $bys = self::parseList($rawSortBy);
        $dirs = self::parseList($rawSortDir);

        if (empty($bys)) return [];

        $out = [];
        foreach ($bys as $i => $byRaw) {
            $by = self::normSortBy($byRaw); //  화이트리스트 강제
            $dir = 'ASC';

            if (!empty($dirs)) {
                if (count($dirs) === 1) $dir = self::normSortDir($dirs[0]);
                else $dir = isset($dirs[$i]) ? self::normSortDir($dirs[$i]) : 'ASC';
            }

            $out[] = ['by' => $by, 'dir' => $dir];
        }
        return $out;
    }

    /** @return string[] */
    private static function parseList($v): array
    {
        if ($v === null) return [];

        $parts = [];
        if (is_array($v)) {
            foreach ($v as $item) {
                foreach (explode(',', (string)$item) as $p) {
                    $p = trim($p);
                    if ($p !== '') $parts[] = $p;
                }
            }
            return $parts;
        }

        foreach (explode(',', trim((string)$v)) as $p) {
            $p = trim($p);
            if ($p !== '') $parts[] = $p;
        }

        return $parts;
    }

    private static function normSortDir(string $v): string
    {
        $t = strtoupper(trim($v));
        if ($t === '') $t = 'ASC';
        if ($t !== 'ASC' && $t !== 'DESC') {
            throw new InvalidArgumentException("INVALID_SORT_DIR: {$t}");
        }
        return $t;
    }

    /**
     *  프로젝트 리스트 sortBy 화이트리스트(확정)
     * - filedBeginDate, fieldEndDate, reportDate, licenseName, grossArea
     */
    private static function normSortBy(string $v): string
    {
        $t = trim($v);
        if ($t === '') throw new InvalidArgumentException('INVALID_SORT_BY: (empty)');

        $lower = strtolower($t);

        // 변형/스네이크/오타 약간 흡수
        if ($lower === 'fieldbegindate')  $t = 'filedBeginDate'; // fieldBeginDate로 와도 filedBeginDate로 정규화
        if ($lower === 'filedbegindate')  $t = 'filedBeginDate';
        if ($lower === 'fieldenddate')    $t = 'fieldEndDate';
        if ($lower === 'reportdate')      $t = 'reportDate';
        if ($lower === 'licensename')     $t = 'licenseName';
        if ($lower === 'grossarea' || $lower === 'gross_area') $t = 'grossArea';

        $allowed = ['filedBeginDate', 'fieldEndDate', 'reportDate', 'licenseName', 'grossArea'];
        if (!in_array($t, $allowed, true)) {
            throw new InvalidArgumentException("INVALID_SORT_BY: {$v}");
        }

        return $t;
    }

    private static function getStr(array $q, string $key): ?string
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null) return null;
        if (is_array($v)) $v = $v[0] ?? null;
        return self::normStr($v === null ? null : (string)$v);
    }

    private static function getInt(array $q, string $key): ?int
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null || $v === '') return null;
        if (is_array($v)) $v = $v[0] ?? null;
        if ($v === null || $v === '') return null;

        return (int)$v;
    }
}
