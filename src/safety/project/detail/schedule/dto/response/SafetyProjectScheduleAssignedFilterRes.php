<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto\response;

use App\safety\project\detail\schedule\dto\SafetyProjectEngineerAssignedFilterItem;

/**
 * SafetyProjectScheduleCandidatesRes
 *
 * - 참여기술진 '선택 후보' 목록(드롭다운/필터용)
 * - 프로젝트의 license_seq 범위 내에서만 반환
 */
final class SafetyProjectScheduleAssignedFilterRes implements \JsonSerializable
{
    private int $projectSeq;
    private int $licenseSeq;

    /** @var SafetyProjectEngineerAssignedFilterItem[] */
    private array $engineerCandidates;

    /**
     * @param SafetyProjectEngineerAssignedFilterItem[] $engineerCandidates
     */
    public function __construct(int $projectSeq, int $licenseSeq, array $engineerCandidates)
    {
        $this->projectSeq = $projectSeq;
        $this->licenseSeq = $licenseSeq;
        $this->engineerCandidates = $engineerCandidates;
    }

    public function jsonSerialize(): array
    {
        return [
            'projectSeq' => $this->projectSeq,
            'licenseSeq' => $this->licenseSeq,
            'engineerCandidates' => $this->engineerCandidates,
        ];
    }
}
