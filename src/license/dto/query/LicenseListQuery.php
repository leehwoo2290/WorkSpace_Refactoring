<?php
declare(strict_types=1);

namespace App\license\dto\query;

use App\common\dto\HttpRequestDto;

final class LicenseListQuery implements HttpRequestDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyword; // name/bizno/ceo_name 부분검색
    private ?string $region;        // 지역
    private ?string $status;        // 상태

    public function __construct(int $page, int $size, ?string $searchKeyword, ?string $region, ?string $status)
    {
        $this->page = $page;
        $this->size = $size;
        $this->searchKeyword = ($searchKeyword !== null && trim($searchKeyword) !== '') ? trim($searchKeyword) : null;
        $this->region = ($region !== null && trim($region) !== '') ? trim($region) : null;
        $this->status = ($status !== null && trim($status) !== '') ? trim($status) : null;
    }

    public static function fromArray(array $query): self
    {
        $page = (int)($query['page'] ?? 1);
        $size = (int)($query['size'] ?? 20);

        $searchKeyword = (string)($query['keyword'] ?? '');
        $region = (string)($query['region'] ?? '');
        $status = (string)($query['status'] ?? '');

        return new self($page, $size, $searchKeyword, $region, $status);
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }

    /** repository where 배열로 변환 */
    public function where(): array
    {
        $where = [];
        if ($this->searchKeyword !== null) $where['q'] = $this->searchKeyword;
        return $where;
    }
}
