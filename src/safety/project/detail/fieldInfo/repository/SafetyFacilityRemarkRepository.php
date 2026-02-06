<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\repository;

use App\common\repository\preset\PresetListRepository;
use App\common\repository\preset\ListPresetInterface;
use App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset;
use App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery;

final class SafetyFacilityRemarkRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyFacilityRemarkByJongListPreset();
    }

    public function findRemarkList(
        SafetyProjectFieldInfoFacilityRemarkFilterQuery $query
    ): array {
        return $this->findListUsingPreset(
            new SafetyFacilityRemarkByJongListPreset(),
            $query 
        );
    }

     /**
     * (호환/간단 호출용) jong 문자열로 바로 조회
     *
     * @return object[] row: { remark }
     */
    public function findByJong(string $jong): array
    {
        $jong = trim($jong);
        if ($jong === '') {
            return [];
        }

        // preset applyWhere가 string도 처리하도록 되어있다면 그대로 OK
        return $this->findListUsingPreset($this->preset(), $jong);
    }

}
