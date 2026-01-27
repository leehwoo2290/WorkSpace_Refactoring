<?php
declare(strict_types=1);

namespace App\userDetail\repository\preset;

use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\RowPresetInterface;

final class UserPrivacyRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return [
            'pr.foreignYn        AS foreignYn',
            'pr.jumin_num        AS juminNum',
            'pr.birthday         AS birthday',
            'pr.mobile           AS phoneNumber',
            'pr.emer_num1        AS emerNum1',
            'pr.emer_num2        AS emerNum2',
            'pr.addr             AS addr',
            'pr.education_level  AS educationLevel',
            'pr.education_major  AS educationMajor',
            'pr.family_cnt       AS familyCnt',
            'pr.carYn            AS carYn',
            'pr.car_number       AS carNumber',
            'pr.car_tax          AS carTax',
            'pr.car_model        AS carModel',
            'pr.religion         AS religion',
            'pr.bank_name        AS bankName',
            'pr.bank_number      AS bankNumber',
        ];
    }

    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinPrivacy('u', 'pr');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('u.seq', (int) $query);
    }
}
