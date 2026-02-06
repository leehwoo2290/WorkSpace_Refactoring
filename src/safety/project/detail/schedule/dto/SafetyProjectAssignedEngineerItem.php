<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto;

final class SafetyProjectAssignedEngineerItem implements \JsonSerializable
{
    private int $engineerSeq;
    private int $userSeq;

    private ?string $name;
    private ?string $grade;
    private ?string $licenseNum;

    private ?string $beginDate;
    private ?string $endDate;
    private ?string $remark;

    public function __construct(
        int $engineerSeq,
        int $userSeq,
        ?string $name,
        ?string $grade,
        ?string $licenseNo,
        ?string $bgnDt,
        ?string $endDt,
        ?string $remark
    ) {
        $this->engineerSeq = $engineerSeq;
        $this->userSeq = $userSeq;
        $this->name = $name;
        $this->grade = $grade;
        $this->licenseNum = $licenseNo;
        $this->beginDate = $bgnDt;
        $this->endDate = $endDt;
        $this->remark = $remark;
    }

    /** @param object|array $row */
    public static function fromRow($row): self
    {
        $get = static function ($row, string $key) {
            if (is_array($row)) return $row[$key] ?? null;
            if (is_object($row)) return $row->{$key} ?? null;
            return null;
        };

        $toInt = static function ($v): int {
            if ($v === null || $v === '') return 0;
            return (int) $v;
        };

        $toStrOrNull = static function ($v): ?string {
            if ($v === null) return null;
            $s = trim((string) $v);
            return $s === '' ? null : $s;
        };

        return new self(
            $toInt($get($row, 'engineer_seq')),
            $toInt($get($row, 'user_seq')),
            $toStrOrNull($get($row, 'name')),
            $toStrOrNull($get($row, 'grade')),
            $toStrOrNull($get($row, 'license_no')),
            $toStrOrNull($get($row, 'bgn_dt')),
            $toStrOrNull($get($row, 'end_dt')),
            $toStrOrNull($get($row, 'remark'))
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'engineerSeq' => $this->engineerSeq,
            'userSeq' => $this->userSeq,
            'name' => $this->name,
            'grade' => $this->grade,
            'licenseNo' => $this->licenseNum,
            'bgnDt' => $this->beginDate,
            'endDt' => $this->endDate,
            'remark' => $this->remark,
        ];
    }
}
