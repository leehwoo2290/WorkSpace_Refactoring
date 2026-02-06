<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\dto\response;

use App\safety\project\detail\fieldInfo\dto\SafetyProjectFacilityRemarkFilterItem;

final class SafetyProjectFacilityRemarkFilterRes implements \JsonSerializable
{
    /** @var SafetyProjectFacilityRemarkFilterItem[] */
    private array $items;

    /** @param SafetyProjectFacilityRemarkFilterItem[] $items */
    public function __construct(array $items)
    {
        $this->items = array_values($items);
    }

    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items,
        ];
    }
}
