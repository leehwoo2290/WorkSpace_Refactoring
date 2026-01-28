<?php
declare(strict_types=1);

namespace App\user\detail\entity;

use App\common\repository\WritePayloadBuilder;
use App\user\detail\dto\request\UserCareerReq;

/**
 * UserCareerUpdateCommand
 *
 * - Career는 (privacy + office) 두 테이블을 함께 갱신한다.
 * - Repository는 transaction 안에서 각각 updateByUserSeq로 처리한다.
 */
final class UserCareerUpdateEntity
{
    private ?string $jobField;
    private ?string $jobGrade;
    private ?string $certNum1;
    private ?string $certNum2;

    private ?int $industrySameMonth;
    private ?int $industryOtherMonth;

    private function __construct(
        ?string $jobField,
        ?string $jobGrade,
        ?string $certNum1,
        ?string $certNum2,
        ?int $industrySameMonth,
        ?int $industryOtherMonth
    ) {
        $this->jobField = $jobField;
        $this->jobGrade = $jobGrade;
        $this->certNum1 = $certNum1;
        $this->certNum2 = $certNum2;
        $this->industrySameMonth = $industrySameMonth;
        $this->industryOtherMonth = $industryOtherMonth;
    }

    public static function fromReq(UserCareerReq $req): self
    {
        return new self(
            $req->jobField(),
            $req->jobGrade(),
            $req->certNum1(),
            $req->certNum2(),
            $req->industrySameMonth(),
            $req->industryOtherMonth()
        );
    }

    public function toPrivacyDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'jobField' => $this->jobField,
            'jobGrade' => $this->jobGrade,
            'certNum1' => $this->certNum1,
            'certNum2' => $this->certNum2,
        ], [
            'jobField' => ['col' => 'job_field'],
            'jobGrade' => ['col' => 'job_grade'],
            'certNum1' => ['col' => 'cert_num1'],
            'certNum2' => ['col' => 'cert_num2'],
        ]);
    }

    public function toOfficeDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'industrySameMonth' => $this->industrySameMonth,
            'industryOtherMonth' => $this->industryOtherMonth,
        ], [
            'industrySameMonth' => ['col' => 'industry_same_month'],
            'industryOtherMonth' => ['col' => 'industry_other_month'],
        ]);
    }
}
