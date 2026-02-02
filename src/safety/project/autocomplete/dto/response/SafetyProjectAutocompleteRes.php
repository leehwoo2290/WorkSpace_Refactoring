<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\dto\response;

use App\safety\project\getList\dto\SafetyProjectListItem;

final class SafetyProjectAutocompleteRes implements \JsonSerializable
{
    /** @var SafetyProjectListItem[] */
    private array $items;
    // private int $total;
    // private int $page;
    // private int $size;

    public function __construct(array $items)
    {
        $this->items = array_values($items);
        // $this->total = $total;
        // $this->page = $page;
        // $this->size = $size;
    }

    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items,
            // 'total' => $this->total,
            // 'page' => $this->page,
            // 'size' => $this->size,
        ];
    }
}
