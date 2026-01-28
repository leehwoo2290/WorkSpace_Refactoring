<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserOfficeRes implements \JsonSerializable
{
    public ?string $staffNum = null;        // tb_user_office.staff_num

    //public ?int $departmentSeq = null;      // office.department_seq
    public ?string $departmentName = null;  // join: department.name as department

    //public ?int $teamSeq = null;            // office.team_seq
   // public ?string $teamName = null;        

    //public ?int $taskSeq = null;            // office.task_seq
    //public ?string $taskName = null;       

    //public ?int $positionSeq = null;        // office.position_seq
    public ?string $positionName = null;   

    public ?string $contractType = null;    // office.contract_type
    public ?string $apprentice = null;      // office.apprentice
    public ?string $workForm = null;        // office.work_form (간주/별정)
    public ?string $laborForm = null;       // office.labor_form (상근/비상근)

    public ?string $joinDate = null;        // office.join_date
    public ?string $resignDate = null;      // office.resign_date

    //4대보험
    public ?string $insurancesAcquisitionDate = null; // office.insurances_acquisition_date
    public ?string $insurancesLossDate = null;        // office.insurances_loss_date

    public ?int $years = null;              // select 계산값(years)

    // 근로계약, 인사카드 발급, 현장근무
    public ?string $contractYn = null;      // office.contract_yn
    public ?string $staffCardYn = null;     // office.staff_card_yn
    public ?string $fieldworkYn = null;     // office.fieldwork_yn

    public function jsonSerialize(): array
    {
        return [
            'staffNum' => $this->staffNum,

            // 'department' => ['seq' => $this->departmentSeq, 'name' => $this->departmentName],
            // 'team'       => ['seq' => $this->teamSeq,       'name' => $this->teamName],
            // 'task'       => ['seq' => $this->taskSeq,       'name' => $this->taskName],
            // 'position'   => ['seq' => $this->positionSeq,   'name' => $this->positionName],

            'department' => $this->departmentName,
            'position'    => $this->positionName,

            'contractType' => $this->contractType,
            'apprentice'   => $this->apprentice,
            'workForm'     => $this->workForm,
            'laborForm'    => $this->laborForm,

            'joinDate'  => $this->joinDate,
            'resignDate'=> $this->resignDate,

            'insurancesAcquisitionDate' => $this->insurancesAcquisitionDate,
            'insurancesLossDate'        => $this->insurancesLossDate,

            //'years' => $this->years,

            'contractYn'  => $this->contractYn,
            'staffCardYn' => $this->staffCardYn,
            'fieldworkYn' => $this->fieldworkYn,
        ];
    }
}
