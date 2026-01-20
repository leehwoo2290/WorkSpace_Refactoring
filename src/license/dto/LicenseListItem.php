<?php
declare(strict_types=1);

namespace App\license\dto;


final class LicenseListItem implements \JsonSerializable
{
    private int $num;
    private int $licenseSeq;

    private ?string $name;
    private ?string $region;
    private ?string $bizno;
    private ?string $ceoName;

    private ?string $contractDate; // YYYY-MM-DD
    private ?string $expireDate;   // YYYY-MM-DD

    private int $userCnt;
    private int $machineEngineerCnt;
    private int $safetyEngineerCnt;
    private int $machineProjectCnt;
    private int $safetyProjectCnt;
    private ?string $managerName;
    private ?string $managerEmail;
    private ?string $managerPhoneNumber ;
    private ?string $officePhoneNumber ;

    public function __construct(
        int $num,
        int $licenseSeq,
        ?string $name,
        ?string $region,
        ?string $bizno,
        ?string $ceoName,
        ?string $contractDate,
        ?string $expireDate,
        int $userCnt,
        int $machineEngineerCnt,
        int $safetyEngineerCnt,
        int $machineProjectCnt,
        int $safetyProjectCnt,
        ?string $managerName,
        ?string $managerEmail,
        ?string $managerPhoneNumber,
        ?string $officePhoneNumber
    ) {
        $this->num = $num;
        $this->licenseSeq = $licenseSeq;
        $this->name = $name;
        $this->region = $region;
        $this->bizno = $bizno;
        $this->ceoName = $ceoName;
        $this->contractDate = $contractDate;
        $this->expireDate = $expireDate;
        $this->userCnt = $userCnt;
        $this->machineEngineerCnt = $machineEngineerCnt;
        $this->safetyEngineerCnt = $safetyEngineerCnt;
        $this->machineProjectCnt = $machineProjectCnt;
        $this->safetyProjectCnt = $safetyProjectCnt;
        $this->managerName = $managerName;
        $this->managerEmail = $managerEmail;
        $this->managerPhoneNumber = $managerPhoneNumber;
        $this->officePhoneNumber = $officePhoneNumber;
    }

    public function jsonSerialize(): array
    {
        return [
            'num' => $this->num,
            'licenseSeq' => $this->licenseSeq,
            'name' => $this->name,
            'region' => $this->region,
            'bizno' => $this->bizno,
            'ceoName' => $this->ceoName,
            'contractDate' => $this->contractDate,
            'expireDate' => $this->expireDate,
            'userCnt' => $this->userCnt,
            'machineEngineerCnt' => $this->machineEngineerCnt,
            'safetyEngineerCnt' => $this->safetyEngineerCnt,
            'machineProjectCnt' => $this->machineProjectCnt,
            'safetyProjectCnt' => $this->safetyProjectCnt,
            'managerName' => $this->managerName,
            'managerEmail' => $this->managerEmail,
            'managerPhoneNumber' => $this->managerPhoneNumber,
            'officePhoneNumber' => $this->officePhoneNumber
        ];
    }
}
