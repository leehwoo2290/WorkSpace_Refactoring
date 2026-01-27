<?php
declare(strict_types=1);

namespace App\userDetail\repository\preset;

use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\RowPresetInterface;

final class UserCareerRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return [
            'pr.job_field AS jobField',
            'pr.job_grade AS jobGrade',
            'pr.cert_num1 AS certNum1',
            'pr.cert_num2 AS certNum2',
            'o.industry_same_month AS industrySameMonth',
            'o.industry_other_month AS industryOtherMonth',
        ];
    }

    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinPrivacy('u', 'pr')
            ->joinOffice('u', 'o');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('u.seq', (int) $query);
    }
}
