<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\dto\response;

use App\safety\engineer\autocomplete\dto\SafetyEngineerAutocompleteItem;

final class SafetyEngineerAutocompleteRes implements \JsonSerializable
{
    /** @var SafetyEngineerAutocompleteItem[] */
    private array $items;

    public function __construct(array $items)
    {
        $this->items = array_values($items);
    }

    public function jsonSerialize(): array
    {
        return ['items' => $this->items];
    }
}
