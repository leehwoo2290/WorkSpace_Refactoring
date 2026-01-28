<?php
declare(strict_types=1);

namespace App\user\loginLog\dto\query;

use App\common\dto\HttpQueryDto;

final class UserLoginLogListQuery implements HttpQueryDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyWord;   // 부분검색
    private ?string $success; // 'Y'|'N'
    private ?string $from;    // 'YYYY-MM-DD' or 'YYYY-MM-DD HH:ii:ss'
    private ?string $to;      // 'YYYY-MM-DD' or 'YYYY-MM-DD HH:ii:ss'

    private function __construct(
        int $page,
        int $size,
        ?string $searchKeyWord,
        ?string $success,
        ?string $from,
        ?string $to
    ) {
        $this->page = ($page >= 1) ? $page : 1;
        $this->size = ($size >= 1) ? $size : 20;

        $this->searchKeyWord = self::normStr($searchKeyWord);
        $this->success = self::normStr($success);
        $this->from    = self::normStr($from);
        $this->to      = self::normStr($to);
    }

    public static function fromArray(array $query): self
    {
        $page = (int)($query['page'] ?? 1);
        $size = (int)($query['size'] ?? 20);

        // email은 email 우선, 없으면 q/keyword/searchKeyWord 등도 호환
        $email = (string)($query['email'] ?? $query['q'] ?? $query['keyword'] ?? $query['searchKeyWord'] ?? '');
        $success = (string)($query['success'] ?? '');
        $from = (string)($query['from'] ?? '');
        $to = (string)($query['to'] ?? '');

        return new self($page, $size, $email, $success, $from, $to);
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }

    public function offset(): int
    {
        return ($this->page - 1) * $this->size;
    }

    public function success(): ?string
    {
        return $this->success;
    }

    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

        if ($this->searchKeyWord !== null)   $where['searchKeyWord'] = $this->searchKeyWord;
        if ($this->success !== null) $where['success'] = $this->success;
        if ($this->from !== null)    $where['from'] = $this->from;
        if ($this->to !== null)      $where['to'] = $this->to;

        return $where;
    }

    private static function normStr(?string $v): ?string
    {
        if ($v === null) return null;
        $t = trim($v);
        return $t !== '' ? $t : null;
    }
}
