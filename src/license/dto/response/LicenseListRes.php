<?php
declare(strict_types=1);

namespace App\license\dto\response;

use App\common\dto\ApiDocDto;
use App\license\dto\LicenseListItem;

final class LicenseListRes implements \JsonSerializable, ApiDocDto
{
    /** @var LicenseListItem[] */
    private array $items;
    private int $total;
    private int $page;
    private int $size;

    public function __construct(array $items, int $total, int $page, int $size)
    {
        $this->items = $items;
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

    public static function apiDocSchema(): array
    {
        return [
            'items' => ['type' => 'array', 'required' => true, 'description' => '목록', 'items' => LicenseListItem::apiDocSchema()],
            'total' => ['type' => 'int', 'required' => true, 'description' => '총 개수'],
            'page'  => ['type' => 'int', 'required' => true, 'description' => '현재 페이지(1-base)'],
            'size'  => ['type' => 'int', 'required' => true, 'description' => '페이지 사이즈'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'items' => [LicenseListItem::apiDocExample()],
            'total' => 57,
            'page' => 1,
            'size' => 20,
        ];
    }
}
