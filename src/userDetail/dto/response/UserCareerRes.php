<?php
declare(strict_types=1);

namespace App\userDetail\dto\response;
final class UserCareerRes implements \JsonSerializable
{
    // tb_user_privacy
    public ?string $jobField = null; // privacy.job_field
    public ?string $jobGrade = null; // privacy.job_grade
    public ?string $certNum1 = null; // privacy.cert_num1
    public ?string $certNum2 = null; // privacy.cert_num2

    // tb_user_office
    public ?int $industrySameMonth = null;  // office.industry_same_month
    public ?int $industryOtherMonth = null; // office.industry_other_month

    public function jsonSerialize(): array
    {
        return [
            'jobField' => $this->jobField,
            'jobGrade' => $this->jobGrade,
            'certNum1' => $this->certNum1,
            'certNum2' => $this->certNum2,
            'preJoinExperienceMonth' => [
                'industrySameMonth'  => $this->industrySameMonth,
                'industryOtherMonth' => $this->industryOtherMonth,
            ],
        ];
    }
}
