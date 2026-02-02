<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\safety\engineer\getList\dto\query\SafetyEngineerListQuery;
use App\safety\engineer\getList\repository\preset\SafetyEngineerListPreset;
use App\safety\engineer\getList\repository\preset\SafetyProjectListEngineerFilterPreset;

final class SafetyEngineerRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyEngineerListPreset();
    }

    public function count(SafetyEngineerListQuery $query): int
    {
        return $this->countByPreset($query);
    }

    /** @return object[] */
    public function findList(SafetyEngineerListQuery $query): array
    {
        return $this->findListByPreset($query);
    }

    /**
     * @return object[] row: { engineer_seq, name, grade }
     */
    public function findSafetyEngineerFilter(): array
    {
        return $this->findListUsingPreset(new SafetyProjectListEngineerFilterPreset(), null);
    }
}
