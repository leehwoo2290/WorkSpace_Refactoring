<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\dto\request;

use App\common\dto\ReqDtoBase;

final class SafetyProjectScheduleEngineerReq extends ReqDtoBase
{
    private ?int $engineerSeq;
    private ?string $engineerEmail;

    private ?string $bgnDt;
    private ?string $endDt;
    private ?string $remark;

    private function __construct(
        ?int $engineerSeq,
        ?string $engineerEmail,
        ?string $bgnDt,
        ?string $endDt,
        ?string $remark
    ) {
        $this->engineerSeq = $engineerSeq;
        $this->engineerEmail = $engineerEmail;
        $this->bgnDt = $bgnDt;
        $this->endDt = $endDt;
        $this->remark = $remark;
    }

    public static function fromArray(array $data): self
    {
        $engineerSeq = self::toIntOrNull(self::pick($data, 'engineerSeq', 'engineer_seq'));
        $engineerEmail = self::toStrOrNull(self::pick($data, 'engineerEmail', 'engineer_email'));

        $bgnDt = self::toStrOrNull(self::pick($data, 'bgnDt', 'bgn_dt'));
        $endDt = self::toStrOrNull(self::pick($data, 'endDt', 'end_dt'));
        $remark = self::toStrOrNull(self::pick($data, 'remark'));

        return new self($engineerSeq, $engineerEmail, $bgnDt, $endDt, $remark);
    }

    public function engineerSeq(): ?int
    {
        return $this->engineerSeq;
    }

    public function engineerEmail(): ?string
    {
        return $this->engineerEmail;
    }

    public function bgnDt(): ?string
    {
        return $this->bgnDt;
    }

    public function endDt(): ?string
    {
        return $this->endDt;
    }

    public function remark(): ?string
    {
        return $this->remark;
    }
}
