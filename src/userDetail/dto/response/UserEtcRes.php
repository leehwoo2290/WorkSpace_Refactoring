<?php
declare(strict_types=1);

namespace App\userDetail\dto\response;

final class UserEtcRes implements \JsonSerializable
{
    // tb_user_etc (청년/지원)
    public ?string $youthJobLeap = null;
    public ?string $youthEmploymentIncentive = null;
    public ?string $youthDigital = null;
    public ?string $seniorInternship = null;
    public ?string $newMiddleAgedJobs = null;

    // tb_user_etc (소득세 감면 + 군복무)
    public ?string $incomeTaxReductionBeginDate = null;
    public ?string $incomeTaxReductionEndDate = null;
    public ?string $employedType = null;
    public ?string $militaryPeriod = null;

    // tb_user_etc (단체보험)
    //public ?string $groupInsuranceYn = null; // Y/N

    public ?string $registeredAt = null; // tb_user.reg_time
    public ?string $lastLoginAt = null;  // tb_user.last_login_time

    public function jsonSerialize(): array
    {
        return [
            'benefits' => [
                'youthJobLeap'             => $this->youthJobLeap,
                'youthEmploymentIncentive' => $this->youthEmploymentIncentive,
                'youthDigital'             => $this->youthDigital,
                'seniorInternship'         => $this->seniorInternship,
                'newMiddleAgedJobs'        => $this->newMiddleAgedJobs,
            ],
            'incomeTaxReduction' => [
                'beginDate'      => $this->incomeTaxReductionBeginDate,
                'endDate'        => $this->incomeTaxReductionEndDate,
                'employedType'   => $this->employedType,
                'militaryPeriod' => $this->militaryPeriod,
            ],
            'registeredAt' => $this->registeredAt,
            'lastLoginAt'  => $this->lastLoginAt,
        ];
    }
}
