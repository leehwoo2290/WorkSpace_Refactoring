<?php
declare(strict_types=1);

namespace App\user\detail\dto\request;

final class UserEtcReq extends UserDetailBaseReq
{
    // benefits
    private ?string $youthJobLeap;
    private ?string $youthEmploymentIncentive;
    private ?string $youthDigital;
    private ?string $seniorInternship;
    private ?string $newMiddleAgedJobs;

    // incomeTaxReduction
    private ?string $beginDate;
    private ?string $endDate;
    private ?string $employedType;
    private ?string $militaryPeriod;

    // server-managed (원하면 서비스에서 무시)
    private ?string $registeredAt;
    private ?string $lastLoginAt;

    private function __construct(
        ?string $youthJobLeap,
        ?string $youthEmploymentIncentive,
        ?string $youthDigital,
        ?string $seniorInternship,
        ?string $newMiddleAgedJobs,
        ?string $beginDate,
        ?string $endDate,
        ?string $employedType,
        ?string $militaryPeriod,
        ?string $registeredAt,
        ?string $lastLoginAt
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

        $this->registeredAt = $registeredAt;
        $this->lastLoginAt = $lastLoginAt;
    }

    public static function fromArray(array $data): self
    {
        // 프론트가 { data: { etc: {...} } } 같이 감싸서 줄 수도 있어서 방어
        $etc = $data;
        if (isset($data['etc']) && is_array($data['etc'])) {
            $etc = $data['etc'];
        }

        $benefits = (isset($etc['benefits']) && is_array($etc['benefits'])) ? $etc['benefits'] : [];
        $tax = (isset($etc['incomeTaxReduction']) && is_array($etc['incomeTaxReduction'])) ? $etc['incomeTaxReduction'] : [];

        return new self(
            self::toStrOrNull($benefits['youthJobLeap'] ?? null),
            self::toStrOrNull($benefits['youthEmploymentIncentive'] ?? null),
            self::toStrOrNull($benefits['youthDigital'] ?? null),
            self::toStrOrNull($benefits['seniorInternship'] ?? null),
            self::toStrOrNull($benefits['newMiddleAgedJobs'] ?? null),

            self::toStrOrNull($tax['beginDate'] ?? null),
            self::toStrOrNull($tax['endDate'] ?? null),
            self::toStrOrNull($tax['employedType'] ?? null),
            self::toStrOrNull($tax['militaryPeriod'] ?? null),

            self::toStrOrNull($etc['registeredAt'] ?? null),
            self::toStrOrNull($etc['lastLoginAt'] ?? null),
        );
    }

    // ---- getters ----
    public function youthJobLeap(): ?string
    {
        return $this->youthJobLeap;
    }
    public function youthEmploymentIncentive(): ?string
    {
        return $this->youthEmploymentIncentive;
    }
    public function youthDigital(): ?string
    {
        return $this->youthDigital;
    }
    public function seniorInternship(): ?string
    {
        return $this->seniorInternship;
    }
    public function newMiddleAgedJobs(): ?string
    {
        return $this->newMiddleAgedJobs;
    }

    public function beginDate(): ?string
    {
        return $this->beginDate;
    }
    public function endDate(): ?string
    {
        return $this->endDate;
    }
    public function employedType(): ?string
    {
        return $this->employedType;
    }
    public function militaryPeriod(): ?string
    {
        return $this->militaryPeriod;
    }

    public function registeredAt(): ?string
    {
        return $this->registeredAt;
    }
    public function lastLoginAt(): ?string
    {
        return $this->lastLoginAt;
    }
}
