<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto\request;

use App\common\dto\ReqDtoBase;

final class SafetyProjectScheduleUpdateReq extends ReqDtoBase
{
    private ?string $beginDate;
    private ?string $endDate;
    private ?string $fieldBeginDate;
    private ?string $fieldEndDate;
    private ?string $reportDate;
    private ?string $doneDate;
    private ?string $reportEmail;
    private ?string $tiIssueDate;

    /** @var SafetyProjectScheduleEngineerReq[] */
    private array $engineers;

    /**
     * @param SafetyProjectScheduleEngineerReq[] $engineers
     */
    private function __construct(
        ?string $beginDate,
        ?string $endDate,
        ?string $fieldBeginDate,
        ?string $fieldEndDate,
        ?string $reportDate,
        ?string $doneDate,
        ?string $reportEmail,
        ?string $tiIssueDate,
        array $engineers
    ) {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->fieldBeginDate = $fieldBeginDate;
        $this->fieldEndDate = $fieldEndDate;
        $this->reportDate = $reportDate;
        $this->doneDate = $doneDate;
        $this->reportEmail = $reportEmail;
        $this->tiIssueDate = $tiIssueDate;
        $this->engineers = $engineers;
    }

    public static function fromArray(array $data): self
    {
        $beginDate = self::toStrOrNull(self::pick($data, 'beginDate', 'begin_Date'));
        $endDate = self::toStrOrNull(self::pick($data, 'endDate', 'end_Date'));

        $fieldBeginDate = self::toStrOrNull(self::pick($data, 'fieldBeginDate', 'field_Begin_Date'));
        $fieldEndDate = self::toStrOrNull(self::pick($data, 'fieldEndDate', 'field_End_Date'));

        $reportDate = self::toStrOrNull(self::pick($data, 'reportDate', 'report_Date'));
        $doneDate = self::toStrOrNull(self::pick($data, 'doneDate', 'done_Date'));

        $reportEmail = self::toStrOrNull(self::pick($data, 'reportEmail', 'report_Email'));
        $tiIssueDate = self::toStrOrNull(self::pick($data, 'tiIssueDate', 'ti_issue_date'));

        // engineers array: accept "engineers" or "mans"
        $rawEngineers = self::get($data, ['engineers', 'mans'], []);
        $engineers = [];
        if (is_array($rawEngineers)) {
            foreach ($rawEngineers as $r) {
                if (!is_array($r)) continue;
                $engineers[] = SafetyProjectScheduleEngineerReq::fromArray($r);
            }
        }

        return new self(
            $beginDate,
            $endDate,
            $fieldBeginDate,
            $fieldEndDate,
            $reportDate,
            $doneDate,
            $reportEmail,
            $tiIssueDate,
            $engineers
        );
    }

    public function beginDate(): ?string { return $this->beginDate; }
    public function endDate(): ?string { return $this->endDate; }
    public function fieldBeginDate(): ?string { return $this->fieldBeginDate; }
    public function fieldEndDate(): ?string { return $this->fieldEndDate; }
    public function reportDate(): ?string { return $this->reportDate; }
    public function doneDate(): ?string { return $this->doneDate; }
    public function reportEmail(): ?string { return $this->reportEmail; }
    public function tiIssueDate(): ?string { return $this->tiIssueDate; }

    /** @return SafetyProjectScheduleEngineerReq[] */
    public function engineers(): array { return $this->engineers; }
}
