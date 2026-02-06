<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\safety\engineer\autocomplete\dto\query\SafetyEngineerAutocompleteQuery;
use App\safety\engineer\autocomplete\repository\preset\SafetyEngineerAutocompletePreset;

final class SafetyEngineerAutocompleteRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyEngineerAutocompletePreset();
    }

    /** @return object[] row: {user_seq, email, name} */
    public function findList(SafetyEngineerAutocompleteQuery $query): array
    {
        return $this->findListByPreset($query);
    }
}
