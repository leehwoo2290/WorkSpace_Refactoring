<?php
declare(strict_types=1);

namespace App\safety\engineer\add\dto\request;

use App\common\dto\ReqDtoBase;

final class SafetyEngineerAddReq extends ReqDtoBase
{
    private string $email;        // 이메일
    private ?string $grade;      // 등급
    private ?string $licenseNum;      // 기술자 자격번호
    private ?string $remark;        //비고


    public function __construct(
        string $email,
        ?string $grade,
        ?string $licenseNum,
        ?string $remark
    ) {
        $this->email = $email;
        $this->grade = $grade;
        $this->licenseNum = $licenseNum;
        $this->remark = $remark;
    }

    public static function fromArray(array $data): self
    {
        // array_key_exists로 null 입력도 "의도된 null"로 처리
        $email = self::toStr(self::get($data, ['email'], ''));
        $grade = self::toStrOrNull(self::get($data, ['grade'], null));
        $licenseNum = self::toStrOrNull(self::get($data, ['licenseNum'], null));
        $remark = self::toStrOrNull(self::get($data, ['remark'], null));

        return new self(
            $email,
            $grade,
            $licenseNum,
            $remark
        );
    }

    // getters (프로젝트 스타일에 맞게 name() 대신 xxx()로 제공)
    public function email(): string
    {
        return $this->email;
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
