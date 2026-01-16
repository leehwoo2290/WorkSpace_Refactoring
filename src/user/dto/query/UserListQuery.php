<?php
declare(strict_types=1);

namespace App\user\dto\query;

use App\common\dto\HttpQueryDto;
use InvalidArgumentException;

final class UserListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

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
    private ?int $careerYear;      // careerYear (근속년수)
    private ?string $status;       // status (예: NORMAL/PENDING/QUIT/LEAVE)
    private ?int $birthMonth;      // birthMonth (1~12)
    private ?string $region; // region

    private function __construct(
        int $page,
        int $size,

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
            $page, $size,
            $name,  $region,
            $licenseName, $department, $position,
            $contractType, $laborForm,$workForm,
            $nationality,$gender,
            $careerYear,$status,$birthMonth
        );
    }

    /** 허용되지 않은 쿼리 키가 들어오면 즉시 실패(규격 강제) */
    private static function checkAllowedKeys(array $query): void
    {
        $allowed = [
            'page','size',
            'name','region',
            'licenseName','department','position',
            'contractType','laborForm','workForm',
            'nationality','gender','careerYear','status','birthMonth',
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

    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

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

    private static function getStr(array $q, string $key): ?string
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null) return null;
        $t = trim((string)$v);
        return $t === '' ? null : $t;
    }

    private static function getInt(array $q, string $key, bool $allowZero): ?int
    {
        if (!array_key_exists($key, $q)) return null;
        $v = $q[$key];
        if ($v === null || $v === '') return null;

        $n = (int)$v;
        if ($allowZero) return ($n >= 0) ? $n : null;
        return ($n > 0) ? $n : null;
    }
}
