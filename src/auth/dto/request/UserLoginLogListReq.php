<?php
declare(strict_types=1);

namespace App\auth\dto\request;

use App\common\dto\HttpRequestDto;


final class UserLoginLogListReq implements HttpRequestDto
{
    private int $page;
    private int $size;

    private ?string $email;     // like 검색용
    private ?string $success;   // 'Y'|'N'
    private ?string $from;      // 'YYYY-MM-DD' or 'YYYY-MM-DD HH:ii:ss'
    private ?string $to;

    private function __construct(
        int $page,
        int $size,
        ?string $email,
        ?string $success,
        ?string $from,
        ?string $to
    ) {
        $this->page = $page;
        $this->size = $size;

        $this->email = $email !== '' ? $email : null;
        $this->success = $success !== '' ? $success : null;
        $this->from = $from !== '' ? $from : null;
        $this->to = $to !== '' ? $to : null;
    }


    public function success(): ?string
    {
        return $this->success;
    }
    public static function fromArray(array $query): self
    {
        $page = (int) ($query['page'] ?? 1);
        $size = (int) ($query['size'] ?? 20);

        $email = trim((string) ($query['email'] ?? ''));
        $success = trim((string) ($query['success'] ?? ''));
        $from = trim((string) ($query['from'] ?? ''));
        $to = trim((string) ($query['to'] ?? ''));

        return new self($page, $size, $email, $success, $from, $to);
    }


    public function page(): int
    {
        return $this->page;
    }
    public function size(): int
    {
        return $this->size;
    }

    public function offset(): int
    {
        return ($this->page - 1) * $this->size;
    }

    /** repository where 배열로 변환 */
    public function where(): array
    {
        $where = [];

        if ($this->email !== null)
            $where['email'] = $this->email;     
        if ($this->success !== null)
            $where['success'] = $this->success;

        if ($this->from !== null)
            $where['from'] = $this->from;
        if ($this->to !== null)
            $where['to'] = $this->to;

        return $where;
    }
}
