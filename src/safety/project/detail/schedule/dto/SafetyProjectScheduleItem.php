<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto;

final class SafetyProjectScheduleItem implements \JsonSerializable
{
    private ?string $beginDate;
    private ?string $endDate;
    private ?string $fieldBeginDate;
    private ?string $fieldEndDate;
    private ?string $reportDate;
    private ?string $doneDate;
    private ?string $reportEmail;
    private ?string $tiIssueDate;

    public function __construct(
        ?string $beginDate,
        ?string $endDate,
        ?string $fieldBeginDate,
        ?string $fieldEndDate,
        ?string $reportDate,
        ?string $doneDate,
        ?string $reportEmail,
        ?string $tiIssueDate
    ) {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->fieldBeginDate = $fieldBeginDate;
        $this->fieldEndDate = $fieldEndDate;
        $this->reportDate = $reportDate;
        $this->doneDate = $doneDate;
        $this->reportEmail = $reportEmail;
        $this->tiIssueDate = $tiIssueDate;
    }

    /** @param object|array $row */
    public static function fromRow($row): self
    {
        $get = static function ($row, string $key) {
            if (is_array($row)) return $row[$key] ?? null;
            if (is_object($row)) return $row->{$key} ?? null;
            return null;
        };

        $toStrOrNull = static function ($v): ?string {
            if ($v === null) return null;
            $s = trim((string) $v);
            return $s === '' ? null : $s;
        };

        return new self(
            $toStrOrNull($get($row, 'bgn_dt')),
            $toStrOrNull($get($row, 'end_dt')),
            $toStrOrNull($get($row, 'field_bgn_dt')),
            $toStrOrNull($get($row, 'field_end_dt')),
            $toStrOrNull($get($row, 'report_dt')),
            $toStrOrNull($get($row, 'done_dt')),
            $toStrOrNull($get($row, 'report_email')),
            $toStrOrNull($get($row, 'ti_issue_date'))
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'beginDate' => $this->beginDate,
            'endDate' => $this->endDate,
            'fieldBeginDate' => $this->fieldBeginDate,
            'fieldEndDate' => $this->fieldEndDate,
            'reportDate' => $this->reportDate,
            'doneDate' => $this->doneDate,
            'reportEmail' => $this->reportEmail,
            'tiIssueDate' => $this->tiIssueDate,
        ];
    }
}
