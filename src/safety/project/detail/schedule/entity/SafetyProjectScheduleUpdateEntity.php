<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\entity;

use App\common\repository\WritePayloadBuilder;
use App\safety\project\detail\schedule\dto\request\SafetyProjectScheduleUpdateReq;

final class SafetyProjectScheduleUpdateEntity
{
    private ?string $beginDate;
    private ?string $endDate;
    private ?string $fieldBeginDate;
    private ?string $fieldEndDate;
    private ?string $reportDate;
    private ?string $doneDate;
    private ?string $reportEmail;
    private ?string $tiIssueDate;

    private function __construct(
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

    public static function fromReq(SafetyProjectScheduleUpdateReq $req): self
    {
        return new self(
            $req->beginDate(),
            $req->endDate(),
            $req->fieldBeginDate(),
            $req->fieldEndDate(),
            $req->reportDate(),
            $req->doneDate(),
            $req->reportEmail(),
            $req->tiIssueDate()
        );
    }

    /**
     * tb_safety_project 업데이트 payload
     *
     * - PUT 성격: 값이 null이어도 "컬럼을 비운다" 의도로 반영
     */
    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'beginDate' => $this->beginDate,
            'endDate' => $this->endDate,
            'fieldBeginDate' => $this->fieldBeginDate,
            'fieldEndDate' => $this->fieldEndDate,
            'reportDate' => $this->reportDate,
            'doneDate' => $this->doneDate,
            'reportEmail' => $this->reportEmail,
            'tiIssueDate' => $this->tiIssueDate,
        ], [
            'beginDate' => ['col' => 'bgn_dt'],
            'endDate' => ['col' => 'end_dt'],
            'fieldBeginDate' => ['col' => 'field_bgn_dt'],
            'fieldEndDate' => ['col' => 'field_end_dt'],
            'reportDate' => ['col' => 'report_dt'],
            'doneDate' => ['col' => 'done_dt'],
            'reportEmail' => ['col' => 'report_email'],
            'tiIssueDate' => ['col' => 'ti_issue_date'],
        ]);
    }
}
