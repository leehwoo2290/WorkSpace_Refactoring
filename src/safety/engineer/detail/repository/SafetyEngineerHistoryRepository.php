<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\safety\engineer\detail\repository\preset\SafetyEngineerHistoryListPreset;

final class SafetyEngineerHistoryRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyEngineerHistoryListPreset();
    }

    /** @return object[] */
    public function findByEngineerSeq(int $engineerSeq): array
    {
        if ($engineerSeq <= 0) return [];
        return $this->findListUsingPreset($this->preset(), $engineerSeq);
    }
}
