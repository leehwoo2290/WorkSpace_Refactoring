<?php
declare(strict_types=1);

namespace App\user\detail\repository\preset;

use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\RowPresetInterface;

final class UserEtcRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return [
            'etc.youth_job_leap AS youthJobLeap',
            'etc.youth_employment_incentive AS youthEmploymentIncentive',
            'etc.youth_digital AS youthDigital',
            'etc.senior_internship AS seniorInternship',
            'etc.new_middle_aged_jobs AS newMiddleAgedJobs',
            'etc.group_insurance_yn AS groupInsuranceYn',
            'etc.income_tax_reduction_begin_date AS incomeTaxReductionBeginDate',
            'etc.income_tax_reduction_end_date AS incomeTaxReductionEndDate',
            'etc.employed_type AS employedType',
            'etc.military_period AS militaryPeriod',
        ];
    }

    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinEtc('u', 'etc', 'left');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('u.seq', (int) $query);
    }
}
