<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto\response;

use App\safety\project\detail\schedule\dto\SafetyProjectAssignedEngineerItem;
use App\safety\project\detail\schedule\dto\SafetyProjectScheduleItem;

final class SafetyProjectScheduleRes implements \JsonSerializable
{
    private int $projectSeq;
    private int $licenseSeq;

    private SafetyProjectScheduleItem $schedule;

    /** @var SafetyProjectAssignedEngineerItem[] */
    private array $assignedEngineers;


    /**
     * @param SafetyProjectAssignedEngineerItem[] $assignedEngineers
     */
    public function __construct(
        int $projectSeq,
        int $licenseSeq,
        SafetyProjectScheduleItem $schedule,
        array $assignedEngineers
    ) {
        $this->projectSeq = $projectSeq;
        $this->licenseSeq = $licenseSeq;
        $this->schedule = $schedule;
        $this->assignedEngineers = $assignedEngineers;
    }

    public function jsonSerialize(): array
    {
        return [
            'projectSeq' => $this->projectSeq,
            'licenseSeq' => $this->licenseSeq,
            'schedule' => $this->schedule,
            'assignedEngineers' => $this->assignedEngineers,
        ];
    }
}
