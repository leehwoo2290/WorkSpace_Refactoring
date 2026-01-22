<?php
declare(strict_types=1);

namespace App\userDetail\dto\request;
final class UserCareerReq extends UserDetailBaseReq
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

    public static function fromArray(array $data): self
    {
        return new self(
            self::toStrOrNull(self::pick($data, 'jobField', 'job_field')),
            self::toStrOrNull(self::pick($data, 'jobGrade', 'job_grade')),
            self::toStrOrNull(self::pick($data, 'certNum1', 'cert_num1')),
            self::toStrOrNull(self::pick($data, 'certNum2', 'cert_num2')),
            self::toIntOrNull(self::pick($data, 'industrySameMonth', 'industry_same_month')),
            self::toIntOrNull(self::pick($data, 'industryOtherMonth', 'industry_other_month')),
        );
    }

    public function jobField(): ?string
    {
        return $this->jobField;
    }
    public function jobGrade(): ?string
    {
        return $this->jobGrade;
    }
    public function certNum1(): ?string
    {
        return $this->certNum1;
    }
    public function certNum2(): ?string
    {
        return $this->certNum2;
    }
    public function industrySameMonth(): ?int
    {
        return $this->industrySameMonth;
    }
    public function industryOtherMonth(): ?int
    {
        return $this->industryOtherMonth;
    }

    public function toArray(): array
    {
        return [
            'jobField' => $this->jobField,
            'jobGrade' => $this->jobGrade,
            'certNum1' => $this->certNum1,
            'certNum2' => $this->certNum2,
            'industrySameMonth' => $this->industrySameMonth,
            'industryOtherMonth' => $this->industryOtherMonth,
        ];
    }
}
