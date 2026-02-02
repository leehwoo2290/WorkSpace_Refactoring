<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\dto\response;

final class SafetyEngineerRes implements \JsonSerializable
{
    private string $email;                  //이메일
    private ?string $name;                  //이름
    private ?string $phoneNumber;           //휴대폰 번호
    private ?string $grade;                 //등급
    private ?string $licenseNum;            //기술자 자격번호
    private ?string $remark;                //비고

    // private function __construct(
    //     string $email,
    //     ?string $name,
    //     ?string $phoneNumber,
    //     ?string $grade,
    //     ?string $licenseNum,
    //     ?string $remark
    // ) {
    //     $this->email = $email;
    //     $this->name = $name;
    //     $this->phoneNumber = $phoneNumber;
    //     $this->grade = $grade;
    //     $this->licenseNum = $licenseNum;
    //     $this->remark = $remark;
    // }

    public function jsonSerialize(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'phoneNumber' => $this->phoneNumber,
            'grade' => $this->grade,
            'licenseNum' => $this->licenseNum,
            'remark' => $this->remark,
        ];
    }
    /** @param array<string,mixed> $data */
    public static function fromArray(array $data): self
    {
        $res = new self();
        $res->email = $data['email'] ?? null;
        $res->name = $data['name'] ?? null;
        $res->phoneNumber = $data['phoneNumber'] ?? null;
        $res->grade = $data['grade'] ?? null;
        $res->licenseNum = $data['licenseNum'] ?? null;
        $res->remark = $data['remark'] ?? null;
        return $res;
    }

    /** Repository row(stdClass) → Res */
    public static function fromRow(?object $row): self
    {
        if ($row === null) {
            return new self();
        }

        return self::fromArray([
            'email' => $row->email ?? null,
            'name' => $row->name ?? null,
            'phoneNumber' => $row->phoneNumber ?? null,
            'grade' => $row->grade ?? null,
            'licenseNum' => $row->licenseNum ?? null,
            'remark' => $row->remark ?? null,
        ]);
    }
}
