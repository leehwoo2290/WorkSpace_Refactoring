<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\dto;

final class SafetyEngineerHistoryItem implements \JsonSerializable
{
    private int $num;              // num
    private int $projectSeq;       // tb_safety_project.seq
    private ?string $projectName;  // 화면용 현장명(조립)
    private ?string $bgnDt;        // 점검 시작일(tb_safety_project.bgn_dt)
    private ?string $endDt;        // 점검 종료일(tb_safety_project.end_dt)

    /** @var array<int, array{name:string}> */
    private array $engineers;

    public function __construct(
        int $num,
        int $projectSeq,
        ?string $projectName,
        ?string $bgnDt,
        ?string $endDt,
        array $engineers
    ) {
        $this->num = $num;
        $this->projectSeq = $projectSeq;
        $this->projectName = $projectName;
        $this->bgnDt = $bgnDt;
        $this->endDt = $endDt;
        $this->engineers = $engineers;
    }

    public function jsonSerialize(): array
    {
        return [
            'num' => $this->num,
            'projectSeq' => $this->projectSeq,
            'projectName' => $this->projectName,
            'bgnDt' => $this->bgnDt,
            'endDt' => $this->endDt,
            'engineers' => $this->engineers,
        ];
    }
}
