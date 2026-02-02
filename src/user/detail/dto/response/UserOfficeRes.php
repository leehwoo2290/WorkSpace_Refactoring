<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserOfficeRes implements \JsonSerializable
{
    private ?string $staffNum = null;        // tb_user_office.staff_num

    //public ?int $departmentSeq = null;      // office.department_seq
    private ?string $departmentName = null;  // join: department.name as department

    //public ?int $teamSeq = null;            // office.team_seq
    // public ?string $teamName = null;        

    //public ?int $taskSeq = null;            // office.task_seq
    //public ?string $taskName = null;       

    //public ?int $positionSeq = null;        // office.position_seq
    private ?string $positionName = null;

    private ?string $contractType = null;    // office.contract_type
    private ?string $apprentice = null;      // office.apprentice
    private ?string $workForm = null;        // office.work_form (간주/별정)
    private ?string $laborForm = null;       // office.labor_form (상근/비상근)

    private ?string $joinDate = null;        // office.join_date
    private ?string $resignDate = null;      // office.resign_date

    //4대보험
    private ?string $insurancesAcquisitionDate = null; // office.insurances_acquisition_date
    private ?string $insurancesLossDate = null;        // office.insurances_loss_date

    private ?int $years = null;              // select 계산값(years)

    // 근로계약, 인사카드 발급, 현장근무
    private ?string $contractYn = null;      // office.contract_yn
    private ?string $staffCardYn = null;     // office.staff_card_yn
    private ?string $fieldworkYn = null;     // office.fieldwork_yn

    public function jsonSerialize(): array
    {
        return [
            'staffNum' => $this->staffNum,

            // 'department' => ['seq' => $this->departmentSeq, 'name' => $this->departmentName],
            // 'team'       => ['seq' => $this->teamSeq,       'name' => $this->teamName],
            // 'task'       => ['seq' => $this->taskSeq,       'name' => $this->taskName],
            // 'position'   => ['seq' => $this->positionSeq,   'name' => $this->positionName],

            'department' => $this->departmentName,
            'position' => $this->positionName,

            'contractType' => $this->contractType,
            'apprentice' => $this->apprentice,
            'workForm' => $this->workForm,
            'laborForm' => $this->laborForm,

            'joinDate' => $this->joinDate,
            'resignDate' => $this->resignDate,

            'insurancesAcquisitionDate' => $this->insurancesAcquisitionDate,
            'insurancesLossDate' => $this->insurancesLossDate,

            //'years' => $this->years,

            'contractYn' => $this->contractYn,
            'staffCardYn' => $this->staffCardYn,
            'fieldworkYn' => $this->fieldworkYn,
        ];
    }

    public static function fromArray(array $d): self
    {
        $o = new self();

        $o->staffNum = $d['staffNum'] ?? null;
        $o->departmentName  = $d['department'] ?? null;
        $o->positionName  = $d['position'] ?? null;

        $o->contractType = $d['contractType'] ?? null;
        $o->apprentice = $d['apprentice'] ?? null;
        $o->workForm = $d['workForm'] ?? null;
        $o->laborForm = $d['laborForm'] ?? null;

        $o->joinDate = $d['joinDate'] ?? null;
        $o->resignDate = $d['resignDate'] ?? null;

        $o->insurancesAcquisitionDate = $d['insurancesAcquisitionDate'] ?? null;
        $o->insurancesLossDate = $d['insurancesLossDate'] ?? null;

        $o->years = isset($d['years']) ? (int) $d['years'] : null;

        $o->contractYn = $d['contractYn'] ?? null;
        $o->staffCardYn = $d['staffCardYn'] ?? null;
        $o->fieldworkYn = $d['fieldworkYn'] ?? null;

        return $o;
    }

    public static function fromRow(?object $r): self
    {
        if ($r === null)
            return new self();

        return self::fromArray([
            'staffNum' => $r->staffNum ?? null,
            'department' => $r->department ?? null,
            'position' => $r->position ?? null,

            'contractType' => $r->contractType ?? null,
            'apprentice' => $r->apprentice ?? null,
            'workForm' => $r->workForm ?? null,
            'laborForm' => $r->laborForm ?? null,

            'joinDate' => $r->joinDate ?? null,
            'resignDate' => $r->resignDate ?? null,

            'insurancesAcquisitionDate' => $r->insurancesAcquisitionDate ?? null,
            'insurancesLossDate' => $r->insurancesLossDate ?? null,

            'years' => $r->years ?? null,

            'contractYn' => $r->contractYn ?? null,
            'staffCardYn' => $r->staffCardYn ?? null,
            'fieldworkYn' => $r->fieldworkYn ?? null,
        ]);
    }

}
