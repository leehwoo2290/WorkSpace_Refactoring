<?php
declare(strict_types=1);

namespace App\user\dto;

final class UserListItem implements \JsonSerializable
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
        int $num,
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
        $this->num = $num;
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
}
