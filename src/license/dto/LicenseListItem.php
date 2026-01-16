<?php
declare(strict_types=1);

namespace App\license\dto;


final class LicenseListItem implements \JsonSerializable
{
    private int $num;
    private int $licenseSeq;

    private ?string $name;
    private ?string $englishName;
    private ?string $bizno;
    private ?string $ceoName;

    private ?string $contractDate; // YYYY-MM-DD
    private ?string $expireDate;   // YYYY-MM-DD

    private int $userCnt;
    private int $machineEngineerCnt;
    private int $safetyEngineerCnt;
    private int $machineProjectCnt;
    private int $safetyProjectCnt;

    public function __construct(
        int $num,
        int $licenseSeq,
        ?string $name,
        ?string $englishName,
        ?string $bizno,
        ?string $ceoName,
        ?string $contractDate,
        ?string $expireDate,
        int $userCnt,
        int $machineEngineerCnt,
        int $safetyEngineerCnt,
        int $machineProjectCnt,
        int $safetyProjectCnt
    ) {
        $this->num = $num;
        $this->licenseSeq = $licenseSeq;
        $this->name = $name;
        $this->englishName = $englishName;
        $this->bizno = $bizno;
        $this->ceoName = $ceoName;
        $this->contractDate = $contractDate;
        $this->expireDate = $expireDate;
        $this->userCnt = $userCnt;
        $this->machineEngineerCnt = $machineEngineerCnt;
        $this->safetyEngineerCnt = $safetyEngineerCnt;
        $this->machineProjectCnt = $machineProjectCnt;
        $this->safetyProjectCnt = $safetyProjectCnt;
    }

    public function jsonSerialize(): array
    {
        return [
            'num' => $this->num,
            'licenseSeq' => $this->licenseSeq,
            'name' => $this->name,
            'englishName' => $this->englishName,
            'bizno' => $this->bizno,
            'ceoName' => $this->ceoName,
            'contractDate' => $this->contractDate,
            'expireDate' => $this->expireDate,
            'userCnt' => $this->userCnt,
            'machineEngineerCnt' => $this->machineEngineerCnt,
            'safetyEngineerCnt' => $this->safetyEngineerCnt,
            'machineProjectCnt' => $this->machineProjectCnt,
            'safetyProjectCnt' => $this->safetyProjectCnt,
        ];
    }
}
