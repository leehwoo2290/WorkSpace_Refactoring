<?php
declare(strict_types=1);

namespace App\license\dto\request;

use App\common\dto\HttpRequestDto;
use App\common\dto\ApiDocDto;

final class LicenseListReq implements HttpRequestDto, ApiDocDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyword; // name/bizno/ceo_name 부분검색

    public function __construct(int $page, int $size, ?string $searchKeyword)
    {
        $this->page = $page;
        $this->size = $size;
        $this->searchKeyword = ($searchKeyword !== null && trim($searchKeyword) !== '') ? trim($searchKeyword) : null;
    }

    public static function fromArray(array $query): self
    {
        $page = (int)($query['page'] ?? 1);
        $size = (int)($query['size'] ?? 20);

        // userListReq처럼 q/keyword 둘 다 허용
        $searchKeyword = (string)($query['q'] ?? $query['keyword'] ?? '');

        return new self($page, $size, $searchKeyword);
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

    public static function apiDocSchema(): array
    {
        return [
            'page' => ['type' => 'int', 'required' => false, 'description' => '페이지(1-base), 기본 1'],
            'size' => ['type' => 'int', 'required' => false, 'description' => '페이지 사이즈, 기본 20'],
            'searchKeyword' => ['type' => 'string', 'required' => false, 'description' => '검색어(q 또는 keyword): 업체명/사업자번호/대표자명 부분검색'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'page' => 1,
            'size' => 20,
            'searchKeyword' => '엘림',
        ];
    }
}
