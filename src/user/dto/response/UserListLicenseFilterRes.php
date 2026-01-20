<?php
declare(strict_types=1);

namespace App\user\dto\response;

use App\user\dto\UserListLicenseFilterItem;

final class UserListLicenseFilterRes implements \JsonSerializable
{
    /** @var UserListLicenseFilterItem[] */
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
