<?php
declare(strict_types=1);

namespace App\userDetail\repository\preset;

use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\RowPresetInterface;

final class UserOfficeRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return [
            'o.staff_num AS staffNum',
            'd.name AS departmentNameMapped',
            'p.name AS positionNameMapped',
            'o.apprentice AS apprentice',
            'o.contract_type AS contractType',
            'o.contract_yn AS contractYn',
            'o.labor_form AS laborForm',
            'o.work_form AS workForm',
            'o.fieldwork_yn AS fieldworkYn',
            'o.staff_card_yn AS staffCardYn',
            'o.join_date AS joinDate',
            'o.resign_date AS resignDate',
            'o.insurances_acquisition_date AS insurancesAcquisitionDate',
            'o.insurances_loss_date AS insurancesLossDate',
        ];
    }

    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinOffice('u', 'o')
            ->joinDepartment('o', 'd')
            ->joinPosition('o', 'p');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('u.seq', (int) $query);
    }
}
