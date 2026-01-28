<?php
declare(strict_types=1);

namespace App\user\detail\entity;

use App\common\repository\WritePayloadBuilder;
use App\user\detail\dto\request\UserEtcReq;

/**
 * UserEtcUpdateCommand
 *
 * NOTE
 * - 현재 UserEtcReq가 보유한 필드 기준으로 snake_case 컬럼에 매핑한다.
 * - 만약 DB 컬럼명이 다르면 spec의 'col'만 수정하면 된다.
 */
final class UserEtcUpdateEntity
{
    private ?string $youthJobLeap;
    private ?string $youthEmploymentIncentive;
    private ?string $youthDigital;
    private ?string $seniorInternship;
    private ?string $newMiddleAgedJobs;

    private ?string $beginDate;
    private ?string $endDate;
    private ?string $employedType;
    private ?string $militaryPeriod;

    private function __construct(
        ?string $youthJobLeap,
        ?string $youthEmploymentIncentive,
        ?string $youthDigital,
        ?string $seniorInternship,
        ?string $newMiddleAgedJobs,
        ?string $beginDate,
        ?string $endDate,
        ?string $employedType,
        ?string $militaryPeriod
    ) {
        $this->youthJobLeap = $youthJobLeap;
        $this->youthEmploymentIncentive = $youthEmploymentIncentive;
        $this->youthDigital = $youthDigital;
        $this->seniorInternship = $seniorInternship;
        $this->newMiddleAgedJobs = $newMiddleAgedJobs;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->employedType = $employedType;
        $this->militaryPeriod = $militaryPeriod;
    }

    public static function fromReq(UserEtcReq $req): self
    {
        return new self(
            $req->youthJobLeap(),
            $req->youthEmploymentIncentive(),
            $req->youthDigital(),
            $req->seniorInternship(),
            $req->newMiddleAgedJobs(),
            $req->beginDate(),
            $req->endDate(),
            $req->employedType(),
            $req->militaryPeriod(),
        );
    }

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'youthJobLeap' => $this->youthJobLeap,
            'youthEmploymentIncentive' => $this->youthEmploymentIncentive,
            'youthDigital' => $this->youthDigital,
            'seniorInternship' => $this->seniorInternship,
            'newMiddleAgedJobs' => $this->newMiddleAgedJobs,
            'beginDate' => $this->beginDate,
            'endDate' => $this->endDate,
            'employedType' => $this->employedType,
            'militaryPeriod' => $this->militaryPeriod,
        ], [
            'youthJobLeap' => ['col' => 'youth_job_leap'],
            'youthEmploymentIncentive' => ['col' => 'youth_employment_incentive'],
            'youthDigital' => ['col' => 'youth_digital'],
            'seniorInternship' => ['col' => 'senior_internship'],
            'newMiddleAgedJobs' => ['col' => 'new_middle_aged_jobs'],
            'beginDate' => ['col' => 'income_tax_reduction_begin_date'],
            'endDate' => ['col' => 'income_tax_reduction_end_date'],
            'employedType' => ['col' => 'employed_type'],
            'militaryPeriod' => ['col' => 'military_period'],
        ]);
    }
}
