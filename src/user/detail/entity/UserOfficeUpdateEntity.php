<?php
declare(strict_types=1);

namespace App\user\detail\entity;

use App\common\repository\WritePayloadBuilder;
use App\user\detail\dto\request\UserOfficeReq;
use App\user\common\UserQueryEnumMaps;
use QueryEnumMapper;

/**
 * UserOfficeUpdateCommand
 *
 * - enum 매핑(키 → 실제 저장값)은 Command에서 처리한다.
 * - department_seq/position_seq 처럼 DB 조회가 필요한 값은 Repository가 담당한다.
 */
final class UserOfficeUpdateEntity
{
    private ?string $staffNum;

    private ?string $contractTypeMapped;
    private ?string $apprentice;
    private ?string $workFormMapped;
    private ?string $laborFormMapped;

    private ?string $joinDate;
    private ?string $resignDate;

    private ?string $insurancesAcquisitionDate;
    private ?string $insurancesLossDate;

    private ?string $contractYn;
    private ?string $staffCardYn;
    private ?string $fieldworkYn;

    private ?string $departmentNameMapped;
    private ?string $positionNameMapped;

    private function __construct(
        ?string $staffNum,
        ?string $contractTypeMapped,
        ?string $apprentice,
        ?string $workFormMapped,
        ?string $laborFormMapped,
        ?string $joinDate,
        ?string $resignDate,
        ?string $insurancesAcquisitionDate,
        ?string $insurancesLossDate,
        ?string $contractYn,
        ?string $staffCardYn,
        ?string $fieldworkYn,
        ?string $departmentNameMapped,
        ?string $positionNameMapped
    ) {
        $this->staffNum = $staffNum;
        $this->contractTypeMapped = $contractTypeMapped;
        $this->apprentice = $apprentice;
        $this->workFormMapped = $workFormMapped;
        $this->laborFormMapped = $laborFormMapped;
        $this->joinDate = $joinDate;
        $this->resignDate = $resignDate;
        $this->insurancesAcquisitionDate = $insurancesAcquisitionDate;
        $this->insurancesLossDate = $insurancesLossDate;
        $this->contractYn = $contractYn;
        $this->staffCardYn = $staffCardYn;
        $this->fieldworkYn = $fieldworkYn;
        $this->departmentNameMapped = $departmentNameMapped;
        $this->positionNameMapped = $positionNameMapped;
    }

    public static function fromReq(UserOfficeReq $req): self
    {
        $maps = UserQueryEnumMaps::maps();

        $contractType = QueryEnumMapper::map($maps, 'contract_type', $req->contractType(), true);
        $workForm = QueryEnumMapper::map($maps, 'work_form', $req->workForm(), true);
        $laborForm = QueryEnumMapper::map($maps, 'labor_form', $req->laborForm(), true);

        $department = QueryEnumMapper::map($maps, 'office_department', $req->department(), true);
        $position = QueryEnumMapper::map($maps, 'office_position', $req->position(), true);

        return new self(
            $req->staffNum(),
            $contractType,
            $req->apprentice(),
            $workForm,
            $laborForm,
            $req->joinDate(),
            $req->resignDate(),
            $req->insurancesAcquisitionDate(),
            $req->insurancesLossDate(),
            $req->contractYn(),
            $req->staffCardYn(),
            $req->fieldworkYn(),
            $department,
            $position
        );
    }

    public function departmentName(): ?string
    {
        return $this->departmentNameMapped;
    }
    public function positionName(): ?string
    {
        return $this->positionNameMapped;
    }

    public function toDbPayload(WritePayloadBuilder $builder, callable $resolveSeqOrFail): array
    {
        $data = $builder->build([
            'staffNum' => $this->staffNum,
            //department_seq

            //position_seq
            'apprentice' => $this->apprentice,

            'contractType' => $this->contractTypeMapped,
            'contractYn' => $this->contractYn,

            'laborForm' => $this->laborFormMapped,
            'workForm' => $this->workFormMapped,

            'fieldworkYn' => $this->fieldworkYn,
            'staffCardYn' => $this->staffCardYn,

            'joinDate' => $this->joinDate,
            'resignDate' => $this->resignDate,
            
            'insurancesAcquisitionDate' => $this->insurancesAcquisitionDate,
            'insurancesLossDate' => $this->insurancesLossDate,
        ], [
            'staffNum' => ['col' => 'staff_num'],
            'contractType' => ['col' => 'contract_type'],
            'workForm' => ['col' => 'work_form'],
            'apprentice' => ['col' => 'apprentice'],
            'laborForm' => ['col' => 'labor_form'],
            'contractYn' => ['col' => 'contract_yn'],
            'staffCardYn' => ['col' => 'staff_card_yn'],
            'fieldworkYn' => ['col' => 'fieldwork_yn'],
            'joinDate' => ['col' => 'join_date'],
            'resignDate' => ['col' => 'resign_date'],
            'insurancesAcquisitionDate' => ['col' => 'insurances_acquisition_date'],
            'insurancesLossDate' => ['col' => 'insurances_loss_date'],
        ]);

        if ($this->departmentNameMapped !== null && trim($this->departmentNameMapped) !== '') {
            $data['department_seq'] = $resolveSeqOrFail($this->departmentNameMapped, 'tb_office_department', 'name');
        }

        if ($this->positionNameMapped !== null && trim($this->positionNameMapped) !== '') {
            $data['position_seq'] = $resolveSeqOrFail($this->positionNameMapped, 'tb_office_position', 'name');
        }

        return $data;
    }
}
