<?php
declare(strict_types=1);

namespace App\auth\dto;

use App\common\dto\ApiDocDto;

final class UserListItem implements \JsonSerializable, ApiDocDto
{
    private int $num;          // 화면용 번호(1..)
    private int $userSeq;     // 실제 PK

    private ?string $role;
    private ?string $name;
    private ?string $staffNum;

    private ?string $affiliation;   // 소속(license_name)
    private ?string $department;    // 부서명
    private ?string $position;      // 직위명

    private ?int $age;              // 만 나이(대략)
    private ?string $email;
    private ?string $mobile;

    private ?string $engineerYn;    // 'Y'|'N'
    private ?string $joinDate;      // YYYY-MM-DD
    private ?int $tenureYears;      // 근속(년)

    private ?string $status;

    public function __construct(
        int $no,
        int $userSeq,
        ?string $role,
        ?string $name,
        ?string $staffNum,
        ?string $affiliation,
        ?string $department,
        ?string $position,
        ?int $age,
        ?string $email,
        ?string $mobile,
        ?string $engineerYn,
        ?string $joinDate,
        ?int $tenureYears,
        ?string $status
    ) {
        $this->num = $no;
        $this->userSeq = $userSeq;
        $this->role = $role;
        $this->name = $name;
        $this->staffNum = $staffNum;
        $this->affiliation = $affiliation;
        $this->department = $department;
        $this->position = $position;
        $this->age = $age;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->engineerYn = $engineerYn;
        $this->joinDate = $joinDate;
        $this->tenureYears = $tenureYears;
        $this->status = $status;
    }

    public function jsonSerialize(): array
    {
        return [
            'no' => $this->num,
            'userSeq' => $this->userSeq,
            'role' => $this->role,
            'name' => $this->name,
            'staffNum' => $this->staffNum,
            'affiliation' => $this->affiliation,
            'department' => $this->department,
            'position' => $this->position,
            'age' => $this->age,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'engineerYn' => $this->engineerYn,
            'joinDate' => $this->joinDate,
            'tenureYears' => $this->tenureYears,
            'status' => $this->status,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'no' => ['type' => 'int', 'required' => true, 'description' => '화면용 번호(1부터)'],
            'userSeq' => ['type' => 'int', 'required' => true, 'description' => '회원 PK'],
            'role' => ['type' => 'string', 'required' => false, 'description' => '권한'],
            'name' => ['type' => 'string', 'required' => false, 'description' => '이름'],
            'staffNum' => ['type' => 'string', 'required' => false, 'description' => '사번'],
            'affiliation' => ['type' => 'string', 'required' => false, 'description' => '소속(license)'],
            'department' => ['type' => 'string', 'required' => false, 'description' => '부서'],
            'position' => ['type' => 'string', 'required' => false, 'description' => '직위'],
            'age' => ['type' => 'int', 'required' => false, 'description' => '나이(년)'],
            'email' => ['type' => 'string', 'required' => false, 'description' => '이메일'],
            'mobile' => ['type' => 'string', 'required' => false, 'description' => '휴대폰'],
            'engineerYn' => ['type' => "string('Y'|'N')", 'required' => false, 'description' => '기술인 여부'],
            'joinDate' => ['type' => 'string', 'required' => false, 'description' => '입사일(YYYY-MM-DD)'],
            'tenureYears' => ['type' => 'int', 'required' => false, 'description' => '근속(년)'],
            'status' => ['type' => 'string', 'required' => false, 'description' => '상태'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'no' => 1,
            'userSeq' => 38,
            'role' => 'Admin',
            'name' => '홍길동',
            'staffNum' => 'A-1023',
            'affiliation' => 'OO라이선스',
            'department' => '개발팀',
            'position' => '대리',
            'age' => 29,
            'email' => 'user@example.com',
            'mobile' => '010-1234-5678',
            'engineerYn' => 'Y',
            'joinDate' => '2023-04-01',
            'tenureYears' => 2,
            'status' => '정상',
        ];
    }
}
