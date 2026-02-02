<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;
final class UserCareerRes implements \JsonSerializable
{
    // tb_user_privacy
    private ?string $jobField = null; // privacy.job_field
    private ?string $jobGrade = null; // privacy.job_grade
    private ?string $certNum1 = null; // privacy.cert_num1
    private ?string $certNum2 = null; // privacy.cert_num2

    // tb_user_office
    private ?int $industrySameMonth = null;  // office.industry_same_month
    private ?int $industryOtherMonth = null; // office.industry_other_month

    public function jsonSerialize(): array
    {
        return [
            'jobField' => $this->jobField,
            'jobGrade' => $this->jobGrade,
            'certNum1' => $this->certNum1,
            'certNum2' => $this->certNum2,
            'preJoinExperienceMonth' => [
                'industrySameMonth' => $this->industrySameMonth,
                'industryOtherMonth' => $this->industryOtherMonth,
            ],
        ];
    }
    public static function fromArray(array $d): self
    {
        $o = new self();

        $o->jobField = $d['jobField'] ?? null;
        $o->jobGrade = $d['jobGrade'] ?? null;
        $o->certNum1 = $d['certNum1'] ?? null;
        $o->certNum2 = $d['certNum2'] ?? null;
        $o->industrySameMonth = isset($d['industrySameMonth']) ? (int) $d['industrySameMonth'] : null;
        $o->industryOtherMonth = isset($d['industryOtherMonth']) ? (int) $d['industryOtherMonth'] : null;

        return $o;
    }

    public static function fromRow(?object $r): self
    {
        if ($r === null)
            return new self();

        return self::fromArray([
            'jobField' => $r->jobField ?? null,
            'jobGrade' => $r->jobGrade ?? null,
            'certNum1' => $r->certNum1 ?? null,
            'certNum2' => $r->certNum2 ?? null,
            'industrySameMonth' => $r->industrySameMonth ?? null,
            'industryOtherMonth' => $r->industryOtherMonth ?? null,
        ]);
    }


}
