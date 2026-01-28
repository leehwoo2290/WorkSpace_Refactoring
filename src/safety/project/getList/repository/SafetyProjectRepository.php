<?php
declare(strict_types=1);

namespace App\safety\project\getList\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\repository\preset\SafetyProjectListPreset;

/**
 * SafetyProjectRepository
 */
final class SafetyProjectRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyProjectListPreset();
    }

    public function count(SafetyProjectListQuery $query): int
    {
        return $this->countByPreset($query);
    }

    /** @return object[] */
    public function findList(SafetyProjectListQuery $query): array
    {
        return $this->findListByPreset($query);
    }
}
