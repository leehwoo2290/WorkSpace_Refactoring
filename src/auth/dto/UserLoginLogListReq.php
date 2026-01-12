<?php
declare(strict_types=1);

namespace App\auth\dto;

use App\common\dto\HttpRequestDto;
use App\common\dto\ApiDocDto;

final class UserLoginLogListReq implements HttpRequestDto, ApiDocDto
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
    public static function fromArray(array $q): self
    {
        $page = (int) ($q['page'] ?? 1);
        $size = (int) ($q['size'] ?? 20);

        $email = trim((string) ($q['email'] ?? ''));
        $success = trim((string) ($q['success'] ?? ''));
        $from = trim((string) ($q['from'] ?? ''));
        $to = trim((string) ($q['to'] ?? ''));

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

   public static function apiDocSchema(): array
    {
        return [
            [
                'field' => 'page',
                'type' => 'int',
                'required' => false,
                'description' => '페이지(1부터). default=1',
            ],
            [
                'field' => 'size',
                'type' => 'int',
                'required' => false,
                'description' => '페이지 크기. default=20, max=100',
            ],
            [
                'field' => 'email',
                'type' => 'string',
                'required' => false,
                'description' => '이메일 필터(선택)',
            ],
            [
                'field' => 'success',
                'type' => "string('Y'|'N')",
                'required' => false,
                'description' => "성공여부 필터('Y' 또는 'N')",
            ],
            [
                'field' => 'from',
                'type' => 'string',
                'required' => false,
                'description' => "시작일(예: 2026-01-01 또는 2026-01-01 00:00:00)",
            ],
            [
                'field' => 'to',
                'type' => 'string',
                'required' => false,
                'description' => "종료일(예: 2026-01-12 또는 2026-01-12 23:59:59)",
            ],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'page' => 1,
            'size' => 20,
            'email' => 'user@example.com',
            'success' => 'Y',
            'from' => '2026-01-01',
            'to' => '2026-01-12',
        ];
    }
}
