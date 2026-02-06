<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\dto\response;

final class SafetyEngineerRes implements \JsonSerializable
{
    private int $userSeq;                   //유저 id
    private int $engineerSeq;               //엔지니어 id
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
            'userSeq' => $this->userSeq,
            'engineerSeq' => $this->engineerSeq,
            'email' => $this->email,
            'name' => $this->name,
            'phoneNumber' => $this->phoneNumber,
            'grade' => $this->grade,
            'licenseNum' => $this->licenseNum,
            'remark' => $this->remark,
        ];
    }
    public static function fromArray(array $data): self
    {
        $res = new self();

        $userSeqRaw = $data['userSeq'] ?? $data['user_seq'] ?? null;
        $res->userSeq = ($userSeqRaw === null || $userSeqRaw === '')
            ? 0
            : (int) $userSeqRaw;

        $engineerSeqRaw = $data['engineerSeq'] ?? $data['engineer_seq'] ?? null;
        $res->engineerSeq = ($engineerSeqRaw === null || $engineerSeqRaw === '')
            ? 0
            : (int) $engineerSeqRaw;

        $res->email = (string) ($data['email'] ?? '');
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
            return self::fromArray([]);
        }

        return self::fromArray([
            'userSeq' => $row->userSeq ?? null,
            'engineerSeq' => $row->engineerSeq ?? null,
            'email' => $row->email ?? null,
            'name' => $row->name ?? null,
            'phoneNumber' => $row->phoneNumber ?? null,
            'grade' => $row->grade ?? null,
            'licenseNum' => $row->licenseNum ?? null,
            'remark' => $row->remark ?? null,
        ]);
    }
}
