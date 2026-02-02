<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\dto\response;

use App\safety\engineer\getList\dto\SafetyProjectListEngineerFilterItem;

final class SafetyProjectListEngineerFilterRes implements \JsonSerializable
{
    /** @var SafetyProjectListEngineerFilterItem[] */
    private array $items;

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
