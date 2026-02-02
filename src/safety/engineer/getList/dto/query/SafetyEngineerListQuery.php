<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\dto\query;

use App\common\dto\HttpQueryDto;
use InvalidArgumentException;

final class SafetyEngineerListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    /** @var array<int, array{by:string, dir:string}> */
    private array $sorts;

    private ?int $licenseSeq;                 // 회사
    private ?string $grade;                  // 등급
    private ?string $status;                 // 상태
    private ?string $searchKeywordName;      // 검색(이름)
    private ?string $searchKeywordPlaceName; // 검색(현장명)

    /**
     * @param array<int, array{by:string, dir:string}> $sorts
     */
    private function __construct(
        int $page,
        int $size,
        array $sorts,
        ?int $licenseSeq,
        ?string $grade,
        ?string $status,
        ?string $searchKeywordName,
        ?string $searchKeywordPlaceName
    ) {
        $this->page = $page > 0 ? $page : 1;
        $this->size = $size > 0 ? $size : 20;
        $this->sorts = $sorts;

        $this->licenseSeq = ($licenseSeq !== null && $licenseSeq > 0) ? $licenseSeq : null;

        $this->grade = self::normStr($grade);
        $this->status = self::normStr($status);
        $this->searchKeywordName = self::normStr($searchKeywordName);
        $this->searchKeywordPlaceName = self::normStr($searchKeywordPlaceName);
    }

    public static function fromArray(array $query): self
    {
        if (!array_key_exists('searchKeywordName', $query) && array_key_exists('name', $query)) {
            $query['searchKeywordName'] = $query['name'];
        }
        unset($query['name']);

        if (!array_key_exists('searchKeywordPlaceName', $query) && array_key_exists('placeName', $query)) {
            $query['searchKeywordPlaceName'] = $query['placeName'];
        }
        unset($query['placeName']);

        self::checkAllowedKeys($query);

        $page = isset($query['page']) ? max(1, (int) $query['page']) : 1;
        $size = isset($query['size']) ? max(1, (int) $query['size']) : 20;

        $sorts = self::parseSorts($query['sortBy'] ?? null, $query['sortDir'] ?? null);

        $licenseSeq = self::getInt($query, 'licenseSeq') ?? 0;
        $grade = self::getStr($query, 'grade');
        $status = self::getStr($query, 'status');

        $searchKeywordName = self::getStr($query, 'searchKeywordName');
        $searchKeywordPlaceName = self::getStr($query, 'searchKeywordPlaceName');

        return new self(
            $page,
            $size,
            $sorts,
            $licenseSeq,
            $grade,
            $status,
            $searchKeywordName,
            $searchKeywordPlaceName
        );
    }

    private static function checkAllowedKeys(array $query): void
    {
        $allowed = [
            'page',
            'size',
            'sortBy',
            'sortDir',
            'licenseSeq',
            'grade',
            'status',
            'searchKeywordName',
            'searchKeywordPlaceName',
        ];

        foreach ($query as $k => $_) {
            if (!in_array($k, $allowed, true)) {
                throw new InvalidArgumentException("UNKNOWN_QUERY_KEY: {$k}");
            }
        }
    }

    public function page(): int
    {
        return $this->page;
    }
    public function size(): int
    {
        return $this->size;
    }
    public function offset(): int
    {
        return ($this->page - 1) * $this->size;
    }

    /** @return array<int, array{by:string, dir:string}> */
    public function sorts(): array
    {
        return $this->sorts;
    }

    public function licenseSeq(): int
    {
        return $this->licenseSeq;
    }
    public function grade(): ?string
    {
        return $this->grade;
    }
    public function status(): ?string
    {
        return $this->status;
    }
    public function searchKeywordName(): ?string
    {
        return $this->searchKeywordName;
    }
    public function searchKeywordPlaceName(): ?string
    {
        return $this->searchKeywordPlaceName;
    }

    public function makeWhere(): array
    {
        $where = [
            'page' => $this->page,
            'size' => $this->size,
            'offset' => $this->offset(),
            'licenseSeq' => $this->licenseSeq,
        ];

        if (!empty($this->sorts))
            $where['sorts'] = $this->sorts;
        if ($this->grade !== null)
            $where['grade'] = $this->grade;
        if ($this->status !== null)
            $where['status'] = $this->status;
        if ($this->searchKeywordName !== null)
            $where['searchKeywordName'] = $this->searchKeywordName;
        if ($this->searchKeywordPlaceName !== null)
            $where['searchKeywordPlaceName'] = $this->searchKeywordPlaceName;

        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null)
            return null;
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

        if (empty($bys))
            return [];

        $out = [];
        foreach ($bys as $i => $byRaw) {
            $by = self::normSortBy($byRaw);
            $dir = 'ASC';

            if (!empty($dirs)) {
                if (count($dirs) === 1)
                    $dir = self::normSortDir($dirs[0]);
                else
                    $dir = isset($dirs[$i]) ? self::normSortDir($dirs[$i]) : 'ASC';
            }
            $out[] = ['by' => $by, 'dir' => $dir];
        }
        return $out;
    }

    /** @return string[] */
    private static function parseList($v): array
    {
        if ($v === null)
            return [];

        $parts = [];
        if (is_array($v)) {
            foreach ($v as $item) {
                foreach (explode(',', (string) $item) as $p) {
                    $p = trim($p);
                    if ($p !== '')
                        $parts[] = $p;
                }
            }
            return $parts;
        }

        foreach (explode(',', trim((string) $v)) as $p) {
            $p = trim($p);
            if ($p !== '')
                $parts[] = $p;
        }
        return $parts;
    }

    private static function normSortDir(string $v): string
    {
        $t = strtoupper(trim($v));
        if ($t === '')
            $t = 'ASC';
        if ($t !== 'ASC' && $t !== 'DESC') {
            throw new InvalidArgumentException("INVALID_SORT_DIR: {$t}");
        }
        return $t;
    }

    /**
     * sortBy 화이트리스트
     * - name, licenseName, grade, department, position, status, projectCnt, lastProjectDate, email, licenseNum
     */
    private static function normSortBy(string $v): string
    {
        $t = trim($v);
        if ($t === '')
            throw new InvalidArgumentException('INVALID_SORT_BY: (empty)');

        $lower = strtolower($t);

        if ($lower === 'licensename' || $lower === 'license_name')
            $t = 'licenseName';
        if ($lower === 'projectcnt' || $lower === 'project_cnt')
            $t = 'projectCnt';
        if ($lower === 'lastprojectdate' || $lower === 'last_project_date')
            $t = 'lastProjectDate';
        if ($lower === 'licensenum' || $lower === 'license_no' || $lower === 'license_num')
            $t = 'licenseNum';

        $allowed = [
            'name',
            'licenseName',
            'grade',
            'department',
            'position',
            'status',
            'projectCnt',
            'lastProjectDate',
            'email',
            'licenseNum',
        ];
        if (!in_array($t, $allowed, true)) {
            throw new InvalidArgumentException("INVALID_SORT_BY: {$v}");
        }
        return $t;
    }

    private static function getStr(array $q, string $key): ?string
    {
        if (!array_key_exists($key, $q))
            return null;
        $v = $q[$key];
        if ($v === null)
            return null;
        if (is_array($v))
            $v = $v[0] ?? null;
        return self::normStr($v === null ? null : (string) $v);
    }

    private static function getInt(array $q, string $key): ?int
    {
        if (!array_key_exists($key, $q))
            return null;
        $v = $q[$key];
        if ($v === null || $v === '')
            return null;
        if (is_array($v))
            $v = $v[0] ?? null;
        if ($v === null || $v === '')
            return null;
        return (int) $v;
    }
}
