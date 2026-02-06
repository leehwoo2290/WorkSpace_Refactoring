<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\dto;

final class SafetyEngineerListItem implements \JsonSerializable
{
    private int $num;                 // 번호
    private int $userSeq;              // 유저 id
    private ?string $licenseName;     // 소속(license_name)
    private ?string $grade;           // 등급
    private ?string $name;           // 이름
    private ?string $department;      // 부서명
    private ?string $position;        // 직위명
    private ?string $licenseNum;      // 기술자격번호
    private ?string $email;           // 이메일
    private ?string $status;          // 대기
    private ?int $projectCnt;         // 현장수
    private ?string $lastProject;     // 마지막 현장
    private ?string $lastProjectDate; // 마지막 현장 투입 기간
    private ?string $remark;          // 비고

    public function __construct(
        int $num,
        int $userSeq,
        ?string $licenseName,
        ?string $grade,
        ?string $name,
        ?string $department,
        ?string $position,
        ?string $licenseNum,
        ?string $email,
        ?string $status,
        ?int $projectCnt,
        ?string $lastProject,
        ?string $lastProjectDate,
        ?string $remark
    ) {
        $this->num = $num;
        $this->userSeq = $userSeq;
        $this->licenseName = $licenseName;
        $this->grade = $grade;
        $this->name = $name;
        $this->department = $department;
        $this->position = $position;
        $this->licenseNum = $licenseNum;
        $this->email = $email;
        $this->status = $status;
        $this->projectCnt = $projectCnt;
        $this->lastProject = $lastProject;
        $this->lastProjectDate = $lastProjectDate;
        $this->remark = $remark;
    }

    public function userSeq(): int
    {
        return $this->userSeq;
    }
    public function num(): int
    {
        return $this->num;
    }
    public function licenseName(): ?string
    {
        return $this->licenseName;
    }
    public function grade(): ?string
    {
        return $this->grade;
    }
    public function department(): ?string
    {
        return $this->department;
    }
    public function position(): ?string
    {
        return $this->position;
    }
    public function licenseNum(): ?string
    {
        return $this->licenseNum;
    }
    public function email(): ?string
    {
        return $this->email;
    }
    public function status(): ?string
    {
        return $this->status;
    }
    public function projectCnt(): ?int
    {
        return $this->projectCnt;
    }
    public function lastProject(): ?string
    {
        return $this->lastProject;
    }
    public function lastProjectDate(): ?string
    {
        return $this->lastProjectDate;
    }
    public function remark(): ?string
    {
        return $this->remark;
    }

    public function jsonSerialize(): array
    {
        return [
            'userSeq' => $this->userSeq,
            'num' => $this->num,
            'licenseName' => $this->licenseName,
            'grade' => $this->grade,
            'name' => $this->name,
            'department' => $this->department,
            'position' => $this->position,
            'licenseNum' => $this->licenseNum,
            'email' => $this->email,
            'status' => $this->status,
            'projectCnt' => $this->projectCnt,
            'lastProject' => $this->lastProject,
            'lastProjectDate' => $this->lastProjectDate,
            'remark' => $this->remark,
        ];
    }
}
