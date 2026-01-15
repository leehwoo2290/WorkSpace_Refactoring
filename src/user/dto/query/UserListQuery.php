<?php
declare(strict_types=1);

namespace App\user\dto\query;

use App\common\dto\HttpQueryDto;

final class UserListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyWord; // 이름/이메일/사번 부분검색(q/keyword)
    private ?string $role;          // 권한
    private ?string $status;        // 상태
    private ?string $engineerYn;    // 엔지니어 여부(Y/N)

    private ?int $licenseSeq;       // 소속(license)
    private ?int $departmentSeq;    // 부서(seq)
    private ?int $positionSeq;      // 직위(seq)

    private ?string $position;      // 직위(문자열 필터)
    private ?string $department;    // 부서(문자열 필터)
    private ?string $workType;      // 근무 형태
    private ?string $laborContract; // 근로계약형태
    private ?string $laborType;     // 근무계약구분
    private ?int $yearOfService;    // 근속연수
    private ?string $country;       // 국적
    private ?string $region;        // 지역
    private ?string $gender;        // 성별
    private ?string $birthMonth;    // 탄생월(예: "1", "01", "12")

    private function __construct(
        int $page,
        int $size,

        ?string $searchKeyWord,
        ?string $role,
        ?string $status,
        ?string $engineerYn,

        ?int $licenseSeq,
        ?int $departmentSeq,
        ?int $positionSeq,

        ?string $position,
        ?string $department,
        ?string $workType,
        ?string $laborContract,
        ?string $laborType,
        ?int $yearOfService,
        ?string $country,
        ?string $region,
        ?string $gender,
        ?string $birthMonth
    ) {
        $this->page = $page > 0 ? $page : 1;
        $this->size = $size > 0 ? $size : 20;

        $this->searchKeyWord = self::normStr($searchKeyWord);
        $this->role          = self::normStr($role);
        $this->status        = self::normStr($status);
        $this->engineerYn    = self::normStr($engineerYn);

        $this->licenseSeq    = ($licenseSeq !== null && $licenseSeq > 0) ? $licenseSeq : null;
        $this->departmentSeq = ($departmentSeq !== null && $departmentSeq > 0) ? $departmentSeq : null;
        $this->positionSeq   = ($positionSeq !== null && $positionSeq > 0) ? $positionSeq : null;

        $this->position      = self::normStr($position);
        $this->department    = self::normStr($department);
        $this->workType      = self::normStr($workType);
        $this->laborContract = self::normStr($laborContract);
        $this->laborType     = self::normStr($laborType);
        $this->yearOfService = ($yearOfService !== null && $yearOfService > 0) ? $yearOfService : null;
        $this->country       = self::normStr($country);
        $this->region        = self::normStr($region);
        $this->gender        = self::normStr($gender);
        $this->birthMonth    = self::normStr($birthMonth);
    }

    public static function fromArray(array $query): self
    {
        //값이 ''(빈 문자열)이면 null로 바꿔서 반환
        $get = static function(string $k) use ($query) {
        $v = $query[$k] ?? null;
        if ($v === '') return null;
        return $v;
    };

    return new self(
    // 1) page, size (생성자 첫 파라미터 순서대로!)
    ($v = $get('page')) !== null ? max(1, (int)$v) : 1,
    ($v = $get('size')) !== null ? max(1, (int)$v) : 20,

    // 2) 문자열 필터
    $get('q') ?? $get('searchKeyWord'),
    $get('role'),
    $get('status') ?? $get('memberStatus'),
    $get('engineer_yn') ?? $get('engineerYn'),

    // 3) seq 필터
    ($v = $get('license_seq')) !== null ? (int)$v : null,
    ($v = $get('department_seq')) !== null ? (int)$v : null,
    ($v = $get('position_seq')) !== null ? (int)$v : null,

    // 4) 기타 필터
    $get('position'),
    $get('department'),
    $get('work_type') ?? $get('workForm'),
    $get('labor_contract') ?? $get('contract_type'),
    $get('labor_type') ?? $get('laborForm'),
    ($v = $get('year_of_service')) !== null ? (int)$v : null,
    $get('country'),
    $get('region'),
    $get('gender'),

    // 생성자에서 birthMonth가 ?string 이면 int 캐스팅하면 TypeError 날 수 있음
    // 그래서 그대로 문자열/NULL로 넘김
    $get('birth_month')
);
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }

    public function offset(): int
    {
        return ($this->page - 1) * $this->size;
    }

    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

        if ($this->searchKeyWord !== null) $where['q'] = $this->searchKeyWord;
        if ($this->role !== null)          $where['role'] = $this->role;
        if ($this->status !== null)        $where['status'] = $this->status;
        if ($this->engineerYn !== null)    $where['engineer_yn'] = $this->engineerYn;

        if ($this->licenseSeq !== null)    $where['license_seq'] = $this->licenseSeq;
        if ($this->departmentSeq !== null) $where['department_seq'] = $this->departmentSeq;
        if ($this->positionSeq !== null)   $where['position_seq'] = $this->positionSeq;

        if ($this->position !== null)      $where['position'] = $this->position;
        if ($this->department !== null)    $where['department'] = $this->department;
        if ($this->workType !== null)      $where['work_type'] = $this->workType;
        if ($this->laborContract !== null) $where['labor_contract'] = $this->laborContract;
        if ($this->laborType !== null)     $where['labor_type'] = $this->laborType;
        if ($this->yearOfService !== null) $where['year_of_service'] = $this->yearOfService;
        if ($this->country !== null)       $where['country'] = $this->country;
        if ($this->region !== null)        $where['region'] = $this->region;
        if ($this->gender !== null)        $where['gender'] = $this->gender;
        if ($this->birthMonth !== null)    $where['birth_month'] = $this->birthMonth;

        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null) return null;
        $t = trim($v);
        return $t !== '' ? $t : null;
    }

    private static function pickInt(array $arr, array $keys): ?int
    {
        foreach ($keys as $k) {
            if (isset($arr[$k]) && $arr[$k] !== '' && $arr[$k] !== null) {
                $n = (int)$arr[$k];
                return $n > 0 ? $n : null;
            }
        }
        return null;
    }
}
