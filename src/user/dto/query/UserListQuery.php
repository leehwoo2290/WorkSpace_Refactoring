<?php
declare(strict_types=1);

namespace App\user\dto\query;

use App\common\dto\HttpQueryDto;
use InvalidArgumentException;

/**
 * User List Query
 *
 * 정렬 파라미터(확정):
 * - sortBy: name | licenseName | age | email | joinDate | careerYear
 * - sortDir: ASC | DESC
 *
 * 멀티 정렬 지원:
 * - /users?sortBy=licenseName,name&sortDir=ASC,DESC
 *   (sortBy의 개수만큼 순서대로 적용)
 * - sortDir가 1개만 오면 모든 sortBy에 동일하게 적용
 */
final class UserListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    /** @var array<int, array{by:string, dir:string}> */
    private array $sorts;

    // Search Input
    private ?string $name;   // name

    // Filter (프론트 key 그대로)
    private ?string $licenseName;  // licenseName (문자열 or 숫자(seq) 모두 허용)
    private ?string $department;   // department (문자열 or 숫자(seq) 모두 허용)
    private ?string $position;     // position (예: INTERN)
    private ?string $contractType; // contractType (예: REGULAR)
    private ?string $laborForm;    // laborForm (예: RESIDENT)
    private ?string $workForm;     // workForm (예: DEEMED)
    private ?string $nationality;  // nationality (예: Y/N or FOREIGN/DOMESTIC)
    private ?string $gender;       // gender (예: MALE/FEMALE)
    private ?int $careerYear;      // careerYear (근속년수)  (필터)
    private ?string $status;       // status (예: NORMAL/PENDING/QUIT/LEAVE)
    private ?int $birthMonth;      // birthMonth (1~12)
    private ?string $region;       // region

    /**
     * @param array<int, array{by:string, dir:string}> $sorts
     */
    private function __construct(
        int $page,
        int $size,
        array $sorts,
        ?string $name,
        ?string $region,
        ?string $licenseName,
        ?string $department,
        ?string $position,
        ?string $contractType,
        ?string $laborForm,
        ?string $workForm,
        ?string $nationality,
        ?string $gender,
        ?int $careerYear,
        ?string $status,
        ?int $birthMonth
    ) {
        $this->page = $page > 0 ? $page : 1;
        $this->size = $size > 0 ? $size : 20;

        $this->sorts = $sorts;

        $this->name = self::normStr($name);
        $this->region = self::normStr($region);

        $this->licenseName = self::normStr($licenseName);
        $this->department = self::normStr($department);
        $this->position = self::normStr($position);

        $this->contractType = self::normStr($contractType);
        $this->laborForm = self::normStr($laborForm);
        $this->workForm = self::normStr($workForm);

        $this->nationality = self::normStr($nationality);
        $this->gender = self::normStr($gender);

        // careerYear: 0도 의미 있을 수 있어서 >=0 허용
        $this->careerYear = ($careerYear !== null && $careerYear >= 0) ? $careerYear : null;

        $this->status = self::normStr($status);

        // birthMonth: 1~12만 허용
        $this->birthMonth = ($birthMonth !== null && $birthMonth >= 1 && $birthMonth <= 12) ? $birthMonth : null;
    }

    public static function fromArray(array $query): self
    {
        self::checkAllowedKeys($query);

        $page = isset($query['page']) ? max(1, (int) $query['page']) : 1;
        $size = isset($query['size']) ? max(1, (int) $query['size']) : 20;

        $rawSortBy = $query['sortBy'] ?? null;  // string|array|null
        $rawSortDir = $query['sortDir'] ?? null;
        $sorts = self::parseSorts($rawSortBy, $rawSortDir);

        $name = self::getStr($query, 'name');
        $region = self::getStr($query, 'region');

        $licenseName = self::getStr($query, 'licenseName');
        $department = self::getStr($query, 'department');
        $position = self::getStr($query, 'position');

        $contractType = self::getStr($query, 'contractType');
        $laborForm = self::getStr($query, 'laborForm');
        $workForm = self::getStr($query, 'workForm');

        $nationality = self::getStr($query, 'nationality');
        $gender = self::getStr($query, 'gender');

        $careerYear = self::getInt($query, 'careerYear', true);
        $status = self::getStr($query, 'status');
        $birthMonth = self::getInt($query, 'birthMonth', false);

        return new self(
            $page,
            $size,
            $sorts,
            $name,
            $region,
            $licenseName,
            $department,
            $position,
            $contractType,
            $laborForm,
            $workForm,
            $nationality,
            $gender,
            $careerYear,
            $status,
            $birthMonth
        );
    }

    /** 허용되지 않은 쿼리 키가 들어오면 즉시 실패(규격 강제) */
    private static function checkAllowedKeys(array $query): void
    {
        $allowed = [
            'page', 'size',
            'sortBy', 'sortDir',
            'name', 'region',
            'licenseName', 'department', 'position',
            'contractType', 'laborForm', 'workForm',
            'nationality', 'gender', 'careerYear', 'status', 'birthMonth',
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

    /**
     * 멀티 정렬 스펙
     * @return array<int, array{by:string, dir:string}>
     */
    public function sorts(): array
    {
        return $this->sorts;
    }

    /** 기존 단일 정렬 호환(첫 번째 정렬) */
    public function sortBy(): ?string
    {
        return $this->sorts[0]['by'] ?? null;
    }

    /** 기존 단일 정렬 호환(첫 번째 정렬) */
    public function sortDir(): ?string
    {
        return $this->sorts[0]['dir'] ?? null;
    }

    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

        if (!empty($this->sorts)) {
            $where['sorts'] = $this->sorts;
            // 단일 호환
            $where['sortBy'] = $this->sorts[0]['by'];
            $where['sortDir'] = $this->sorts[0]['dir'];
        }

        if ($this->name !== null)        $where['name'] = $this->name;

        if ($this->licenseName !== null) $where['licenseName'] = $this->licenseName;
        if ($this->department !== null)  $where['department'] = $this->department;
        if ($this->position !== null)    $where['position'] = $this->position;

        if ($this->contractType !== null) $where['contractType'] = $this->contractType;
        if ($this->laborForm !== null)    $where['laborForm'] = $this->laborForm;
        if ($this->workForm !== null)     $where['workForm'] = $this->workForm;

        if ($this->nationality !== null) $where['nationality'] = $this->nationality;
        if ($this->gender !== null)      $where['gender'] = $this->gender;

        if ($this->careerYear !== null)  $where['careerYear'] = $this->careerYear;
        if ($this->status !== null)      $where['status'] = $this->status;
        if ($this->birthMonth !== null)  $where['birthMonth'] = $this->birthMonth;
        if ($this->region !== null)      $where['region'] = $this->region;

        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null) return null;
        $t = trim($v);
        return $t === '' ? null : $t;
    }

    /**
     * sortBy/sortDir 파서
     * @param mixed $rawSortBy string|array|null
     * @param mixed $rawSortDir string|array|null
     * @return array<int, array{by:string, dir:string}>
     */
    private static function parseSorts($rawSortBy, $rawSortDir): array
    {
        $bys = self::parseList($rawSortBy);
        $dirs = self::parseList($rawSortDir);

        if (empty($bys)) {
            return [];
        }

        $out = [];
        foreach ($bys as $i => $byRaw) {
            $by = self::normSortBy($byRaw);
            $dir = 'ASC';

            if (!empty($dirs)) {
                if (count($dirs) === 1) {
                    $dir = self::normSortDir($dirs[0]);
                } else {
                    $dir = isset($dirs[$i]) ? self::normSortDir($dirs[$i]) : 'ASC';
                }
            }

            $out[] = ['by' => $by, 'dir' => $dir];
        }

        return $out;
    }

    /**
     * string|array|null -> string[]
     * - "a,b" => ["a","b"]
     * - ["a","b"] => ["a","b"]
     * - ["a,b","c"] => ["a","b","c"]
     * @param mixed $v
     * @return string[]
     */
    private static function parseList($v): array
    {
        if ($v === null) return [];

        $parts = [];
        if (is_array($v)) {
            foreach ($v as $item) {
                $s = trim((string) $item);
                if ($s === '') continue;
                foreach (explode(',', $s) as $p) {
                    $p = trim($p);
                    if ($p !== '') $parts[] = $p;
                }
            }
            return $parts;
        }

        $s = trim((string) $v);
        if ($s === '') return [];

        foreach (explode(',', $s) as $p) {
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
     * sortBy 허용 값(확정):
     * - name, licenseName, age, email, joinDate, careerYear
     */
    private static function normSortBy(string $v): string
    {
        $t = trim($v);
        if ($t === '') {
            throw new InvalidArgumentException('INVALID_SORT_BY: (empty)');
        }

        // case-insensitive + 일부 변형 허용
        $lower = strtolower($t);
        $canon = $t;

        if ($lower === 'name') $canon = 'name';
        elseif ($lower === 'licensename') $canon = 'licenseName';
        elseif ($lower === 'age') $canon = 'age';
        elseif ($lower === 'email') $canon = 'email';
        elseif ($lower === 'joindate' || $lower === 'join_date') $canon = 'joinDate';
        elseif ($lower === 'careeryear') $canon = 'careerYear';

        $allowed = ['name', 'licenseName', 'age', 'email', 'joinDate', 'careerYear'];
        if (!in_array($canon, $allowed, true)) {
            throw new InvalidArgumentException("INVALID_SORT_BY: {$t}");
        }

        return $canon;
    }

    private static function getStr(array $q, string $key): ?string
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null) return null;
        if (is_array($v)) {
            // string param expected (filter). array로 오면 첫 값만 사용
            $v = $v[0] ?? null;
            if ($v === null) return null;
        }
        $t = trim((string) $v);
        return $t === '' ? null : $t;
    }

    private static function getInt(array $q, string $key, bool $allowZero): ?int
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null || $v === '') return null;
        if (is_array($v)) {
            $v = $v[0] ?? null;
            if ($v === null || $v === '') return null;
        }

        $n = (int) $v;
        if ($allowZero) return ($n >= 0) ? $n : null;
        return ($n > 0) ? $n : null;
    }
}
