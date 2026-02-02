<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\safety\project\autocomplete\dto\query\SafetyProjectAutocompleteQuery;
use App\safety\project\autocomplete\repository\preset\SafetyProjectAutocompletePreset;

final class SafetyProjectAutocompleteRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new SafetyProjectAutocompletePreset();
    }

    /** @return object[] row: {id, place_name, facility_no, unique_id, building_id} */
    public function findList(SafetyProjectAutocompleteQuery $query): array
    {
        return $this->findListByPreset($query);
    }
}
