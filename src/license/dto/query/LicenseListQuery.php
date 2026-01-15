<?php
declare(strict_types=1);

namespace App\license\dto\query;

use App\common\dto\HttpQueryDto;

final class LicenseListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyword;
    private ?string $region;
    private ?string $status;

    private function __construct(
        int $page,
        int $size,
        ?string $searchKeyword,
        ?string $region,
        ?string $status
    ) {
        $this->page = ($page >= 1) ? $page : 1;
        $this->size = ($size >= 1) ? $size : 20;

        $this->searchKeyword = self::normStr($searchKeyword);
        $this->region        = self::normStr($region);
        $this->status        = self::normStr($status);
    }

    public static function fromArray(array $query): self
    {
        $page = (int)($query['page'] ?? 1);
        $size = (int)($query['size'] ?? 20);

        $searchKeyword = (string)($query['q'] ?? $query['keyword'] ?? $query['searchKeyword'] ?? $query['searchKeyWord'] ?? '');
        $region        = (string)($query['region'] ?? '');
        $status        = (string)($query['status'] ?? '');

        return new self($page, $size, $searchKeyword, $region, $status);
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }

    public function offset(): int
    {
        return ($this->page - 1) * $this->size;
    }

    public function makeWhere(): array
    {
        $where = [];
        if ($this->searchKeyword !== null) $where['q'] = $this->searchKeyword;
        if ($this->region !== null)        $where['region'] = $this->region;
        if ($this->status !== null)        $where['status'] = $this->status;
        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null) return null;
        $t = trim($v);
        return $t !== '' ? $t : null;
    }
}
