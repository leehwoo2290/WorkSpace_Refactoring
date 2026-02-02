<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\dto\request;

use App\common\dto\ReqDtoBase;

final class SafetyEngineerReq extends ReqDtoBase
{
    private string $email;                  //이메일
    private ?string $name;                  //이름
    private ?string $phoneNumber;           //휴대폰 번호
    private ?string $grade;                 //등급
    private ?string $licenseNum;            //기술자 자격번호
    private ?string $remark;                //비고

    private function __construct(
        string $email,
        ?string $name,
        ?string $phoneNumber,
        ?string $grade,
        ?string $licenseNum,
        ?string $remark
    ) {
        $this->email = $email;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->grade = $grade;
        $this->licenseNum = $licenseNum;
        $this->remark = $remark;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            self::toStr(self::pick($data, 'email', 'email')),
            self::toStrOrNull(self::pick($data, 'name', 'name')),
            self::toStrOrNull(self::pick($data, 'phoneNumber', 'phoneNumber')),
            self::toStrOrNull(self::pick($data, 'grade', 'grade')),
            self::toStrOrNull(self::pick($data, 'licenseNum', 'licenseNum')),
            self::toStrOrNull(self::pick($data, 'remark', 'remark')),
        );
    }
    public function email(): string
    {
        return $this->email;
    }
    public function name(): ?string
    {
        return $this->name;
    }
    public function phoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    public function grade(): ?string
    {
        return $this->grade;
    }
    public function licenseNum(): ?string
    {
        return $this->licenseNum;
    }
    public function remark(): ?string
    {
        return $this->remark;
    }
}
