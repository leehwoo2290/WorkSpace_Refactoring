<?php
declare(strict_types=1);

namespace App\license\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;

use App\license\dto\query\LicenseListQuery;

use App\license\repository\preset\LicenseListPreset;
use App\license\repository\preset\UserLicenseFilterPreset;

final class LicenseRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new LicenseListPreset();
    }

    /** @return object[] */
    public function findList(LicenseListQuery $query): array
    {
        return $this->findListByPreset($query);
    }

    public function count(LicenseListQuery $query): int
    {
        return $this->countByPreset($query);
    }

    /**
     * @return object[] row: { license_seq, name }
     */
    public function findListLicenseFilter(): array
    {
        return $this->findListUsingPreset(new UserLicenseFilterPreset(), null);
    }
}
