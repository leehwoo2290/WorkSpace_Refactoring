<?php
declare(strict_types=1);

namespace App\safety\engineer\add\entity;

use App\common\repository\WritePayloadBuilder;

final class SafetyEngineerAddEntity
{
    private int $userSeq;          // tb_user.seq
    private string $grade;         // tb_safety_engineer.grade (DB 저장값: 한글 매핑값)
    private ?string $licenseNum;   // tb_safety_engineer.license_no
    private string $status;        // tb_safety_engineer.status (DB 저장값: 한글 매핑값)
    private ?string $remark;       // tb_safety_engineer.remark

    public function __construct(
        int $userSeq,
        string $grade,
        ?string $licenseNum,
        string $status,
        ?string $remark
    ) {
        $this->userSeq = $userSeq;
        $this->grade = $grade;
        $this->licenseNum = $licenseNum;
        $this->status = $status;
        $this->remark = $remark;
    }

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'userSeq' => $this->userSeq,
            'grade' => $this->grade,
            'licenseNum' => $this->licenseNum,
            'status' => $this->status,
            'remark' => $this->remark,
            'deleted' => 'N',
        ], [
            'userSeq' => ['col' => 'user_seq'],
            'grade' => ['col' => 'grade'],
            'licenseNum' => ['col' => 'license_no'],
            'status' => ['col' => 'status'],
            'remark' => ['col' => 'remark'],
            'deleted' => ['col' => 'deleted'],
        ]);
    }
}
