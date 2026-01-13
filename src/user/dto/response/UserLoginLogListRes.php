<?php
declare(strict_types=1);

namespace App\user\dto\response;

use App\user\dto\UserLoginLogItem;

final class UserLoginLogListRes implements \JsonSerializable
{
    /** @var UserLoginLogItem[] */
    private array $items;
    private int $total;
    private int $page;
    private int $size;


    public function __construct(array $items, int $total, int $page, int $size)
    {
        $this->items = array_values($items);
        $this->total = $total;
        $this->page = $page;
        $this->size = $size;
    }

    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items,
            'total' => $this->total,
            'page' => $this->page,
            'size' => $this->size,
        ];
    }
}
