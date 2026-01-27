<?php
declare(strict_types=1);

namespace App\userDetail\dto\request;

final class UserOfficeReq extends UserDetailBaseReq
{
    private ?string $staffNum;

    private ?string $department;
    private ?string $team;
    private ?string $task;
    private ?string $position;

    private ?string $contractType;
    private ?string $apprentice;
    private ?string $workForm;
    private ?string $laborForm;

    private ?string $joinDate;
    private ?string $resignDate;

    private ?string $insurancesAcquisitionDate;
    private ?string $insurancesLossDate;

    private ?string $contractYn;  // Y/N
    private ?string $staffCardYn; // Y/N
    private ?string $fieldworkYn; // Y/N

    private function __construct(
        ?string $staffNum,
        ?string $department,
        ?string $team,
        ?string $task,
        ?string $position,
        ?string $contractType,
        ?string $apprentice,
        ?string $workForm,
        ?string $laborForm,
        ?string $joinDate,
        ?string $resignDate,
        ?string $insurancesAcquisitionDate,
        ?string $insurancesLossDate,
        ?string $contractYn,
        ?string $staffCardYn,
        ?string $fieldworkYn
    ) {
        $this->staffNum = $staffNum;
        $this->department = $department;
        $this->team = $team;
        $this->task = $task;
        $this->position = $position;
        $this->contractType = $contractType;
        $this->apprentice = $apprentice;
        $this->workForm = $workForm;
        $this->laborForm = $laborForm;
        $this->joinDate = $joinDate;
        $this->resignDate = $resignDate;
        $this->insurancesAcquisitionDate = $insurancesAcquisitionDate;
        $this->insurancesLossDate = $insurancesLossDate;
        $this->contractYn = $contractYn;
        $this->staffCardYn = $staffCardYn;
        $this->fieldworkYn = $fieldworkYn;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            self::toStrOrNull(self::pick($data, 'staffNum', 'staff_num')),

            self::toStrOrNull(self::pick($data, 'department', 'department')),
            self::toStrOrNull(self::pick($data, 'team', 'team')),
            self::toStrOrNull(self::pick($data, 'task', 'task')),
            self::toStrOrNull(self::pick($data, 'position', 'position')),

            self::toStrOrNull(self::pick($data, 'contractType', 'contract_type')),
            self::toStrOrNull(self::pick($data, 'apprentice', 'apprentice')),
            self::toStrOrNull(self::pick($data, 'workForm', 'work_form')),
            self::toStrOrNull(self::pick($data, 'laborForm', 'labor_form')),

            self::toStrOrNull(self::pick($data, 'joinDate', 'join_date')),
            self::toStrOrNull(self::pick($data, 'resignDate', 'resign_date')),

            self::toStrOrNull(self::pick($data, 'insurancesAcquisitionDate', 'insurances_acquisition_date')),
            self::toStrOrNull(self::pick($data, 'insurancesLossDate', 'insurances_loss_date')),

            self::toYnOrNull(self::pick($data, 'contractYn', 'contract_yn')),
            self::toYnOrNull(self::pick($data, 'staffCardYn', 'staff_card_yn')),
            self::toYnOrNull(self::pick($data, 'fieldworkYn', 'fieldwork_yn')),
        );
    }

    public function staffNum(): ?string
    {
        return $this->staffNum;
    }
    public function department(): ?string
    {
        return $this->department;
    }
    public function team(): ?string
    {
        return $this->team;
    }
    public function task(): ?string
    {
        return $this->task;
    }
    public function position(): ?string
    {
        return $this->position;
    }

    public function contractType(): ?string
    {
        return $this->contractType;
    }
    public function apprentice(): ?string
    {
        return $this->apprentice;
    }
    public function workForm(): ?string
    {
        return $this->workForm;
    }
    public function laborForm(): ?string
    {
        return $this->laborForm;
    }

    public function joinDate(): ?string
    {
        return $this->joinDate;
    }
    public function resignDate(): ?string
    {
        return $this->resignDate;
    }

    public function insurancesAcquisitionDate(): ?string
    {
        return $this->insurancesAcquisitionDate;
    }
    public function insurancesLossDate(): ?string
    {
        return $this->insurancesLossDate;
    }

    public function contractYn(): ?string
    {
        return $this->contractYn;
    }
    public function staffCardYn(): ?string
    {
        return $this->staffCardYn;
    }
    public function fieldworkYn(): ?string
    {
        return $this->fieldworkYn;
    }
}
