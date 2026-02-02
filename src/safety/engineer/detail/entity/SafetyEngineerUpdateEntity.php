<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\entity;

use App\common\repository\WritePayloadBuilder;
use App\safety\engineer\detail\dto\request\SafetyEngineerReq;

/**
 * UserBasicUpdateCommand
 *
 * - ReqDTO(UserBasicReq): "HTTP 입력" 전용(파싱/검증/정규화)
 * - Command: "DB 쓰기" 전용(payload 구성)
 *
 * NOTE
 * - license_seq 처럼 DB 조회(이름→seq)가 필요한 값은 Repository에서 resolve한다.
 */
final class SafetyEngineerUpdateEntity
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

    public static function fromReq(SafetyEngineerReq $req): self
    {
        return new self(
            $req->email(),
            $req->name(),
            $req->phoneNumber(),
            $req->grade(),
            $req->licenseNum(),
            $req->remark()
        );
    }

    /** tb_user */
    public function toUserDbPayload(WritePayloadBuilder $b): array
    {
        return $b->build([
            'email' => $this->email,
            'name' => $this->name,
        ], [
            'email' => ['col' => 'email', 'type' => 'string', 'nullable' => true],
            'name' => ['col' => 'name', 'type' => 'string', 'nullable' => true],
        ]);
    }

    /** tb_user_privacy (mobile) */
    public function toPrivacyDbPayload(WritePayloadBuilder $b): array
    {
        return $b->build([
            'phoneNumber' => $this->phoneNumber,
        ], [
            'phoneNumber' => ['col' => 'mobile', 'type' => 'string', 'nullable' => true],
        ]);
    }
    /** tb_safety_engineer */
    public function toEngineerDbPayload(WritePayloadBuilder $b): array
    {
        // remark: "" 같은 빈값은 NULL로 내리고 싶으면 이렇게(※ "0"까지 null 되는게 싫으면 ?: 대신 trim 체크 권장)
        $remark = $this->remark;
        if ($remark !== null && trim($remark) === '') {
            $remark = null;
        }

        return $b->build([
            'grade' => $this->grade,
            'licenseNum' => $this->licenseNum,
            'remark' => $remark,
            'deleted' => 'N', // 업데이트 시에도 복구 의도면 유지
        ], [
            'grade' => ['col' => 'grade', 'type' => 'string', 'nullable' => true],
            'licenseNum' => ['col' => 'license_no', 'type' => 'string', 'nullable' => true],
            'remark' => ['col' => 'remark', 'type' => 'string', 'nullable' => true],
            'deleted' => ['col' => 'deleted', 'type' => 'string', 'nullable' => false],
        ]);
    }
}
