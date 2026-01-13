<?php
declare(strict_types=1);

namespace App\auth\dto\response;

use App\common\dto\ApiDocDto;
use App\auth\dto\UserLoginLogItem;

final class UserLoginLogListRes implements \JsonSerializable, ApiDocDto
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

    public static function apiDocSchema(): array
    {
        return [
            'items' => ['type' => 'UserLoginLogRes[]', 'required' => true, 'description' => '로그 목록'],
            'total' => ['type' => 'int', 'required' => true, 'description' => '전체 건수'],
            'page'  => ['type' => 'int', 'required' => true, 'description' => '현재 페이지(1-base)'],
            'size'  => ['type' => 'int', 'required' => true, 'description' => '페이지 사이즈'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'items' => [UserLoginLogItem::apiDocExample()],
            'total' => 123,
            'page' => 1,
            'size' => 20,
        ];
    }
}
