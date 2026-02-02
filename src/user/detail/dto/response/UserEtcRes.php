<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserEtcRes implements \JsonSerializable
{
    // tb_user_etc (청년/지원)
    private ?string $youthJobLeap = null;
    private ?string $youthEmploymentIncentive = null;
    private ?string $youthDigital = null;
    private ?string $seniorInternship = null;
    private ?string $newMiddleAgedJobs = null;

    // tb_user_etc (소득세 감면 + 군복무)
    private ?string $incomeTaxReductionBeginDate = null;
    private ?string $incomeTaxReductionEndDate = null;
    private ?string $employedType = null;
    private ?string $militaryPeriod = null;

    // tb_user_etc (단체보험)
    //public ?string $groupInsuranceYn = null; // Y/N

    private ?string $registeredAt = null; // tb_user.reg_time
    private ?string $lastLoginAt = null;  // tb_user.last_login_time

    public function jsonSerialize(): array
    {
        return [
            'benefits' => [
                'youthJobLeap' => $this->youthJobLeap,
                'youthEmploymentIncentive' => $this->youthEmploymentIncentive,
                'youthDigital' => $this->youthDigital,
                'seniorInternship' => $this->seniorInternship,
                'newMiddleAgedJobs' => $this->newMiddleAgedJobs,
            ],
            'incomeTaxReduction' => [
                'beginDate' => $this->incomeTaxReductionBeginDate,
                'endDate' => $this->incomeTaxReductionEndDate,
                'employedType' => $this->employedType,
                'militaryPeriod' => $this->militaryPeriod,
            ],
            'registeredAt' => $this->registeredAt,
            'lastLoginAt' => $this->lastLoginAt,
        ];
    }

    public static function fromArray(array $d): self
    {
        $o = new self();

        $o->youthJobLeap = $d['youthJobLeap'] ?? null;
        $o->youthEmploymentIncentive = $d['youthEmploymentIncentive'] ?? null;
        $o->youthDigital = $d['youthDigital'] ?? null;
        $o->seniorInternship = $d['seniorInternship'] ?? null;
        $o->newMiddleAgedJobs = $d['newMiddleAgedJobs'] ?? null;

        $o->incomeTaxReductionBeginDate = $d['incomeTaxReductionBeginDate'] ?? null;
        $o->incomeTaxReductionEndDate = $d['incomeTaxReductionEndDate'] ?? null;
        $o->employedType = $d['employedType'] ?? null;
        $o->militaryPeriod = $d['militaryPeriod'] ?? null;

        $o->registeredAt = $d['registeredAt'] ?? null;
        $o->lastLoginAt = $d['lastLoginAt'] ?? null;

        return $o;
    }

    public static function fromRow(?object $r): self
    {
        if ($r === null)
            return new self();

        return self::fromArray([
            'youthJobLeap' => $r->youthJobLeap ?? null,
            'youthEmploymentIncentive' => $r->youthEmploymentIncentive ?? null,
            'youthDigital' => $r->youthDigital ?? null,
            'seniorInternship' => $r->seniorInternship ?? null,
            'newMiddleAgedJobs' => $r->newMiddleAgedJobs ?? null,

            'incomeTaxReductionBeginDate' => $r->incomeTaxReductionBeginDate ?? null,
            'incomeTaxReductionEndDate' => $r->incomeTaxReductionEndDate ?? null,
            'employedType' => $r->employedType ?? null,
            'militaryPeriod' => $r->militaryPeriod ?? null,

            'registeredAt' => $r->registeredAt ?? null,
            'lastLoginAt' => $r->lastLoginAt ?? null,
        ]);
    }

}
