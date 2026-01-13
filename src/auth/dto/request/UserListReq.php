<?php
declare(strict_types=1);

namespace App\auth\dto\request;

use App\common\dto\HttpRequestDto;

final class UserListReq implements HttpRequestDto
{
    private int $page;
    private int $size;

    private ?string $searchKeyWord;          // 이름/이메일/사번 부분검색
    private ?string $role;       // 권한
    private ?string $status;     // 상태
    private ?string $engineerYn; // 'Y'|'N'

    private ?int $licenseSeq;    // 소속(license)
    private ?int $departmentSeq; // 부서
    private ?int $positionSeq;   // 직위

    private function __construct(
        int $page,
        int $size,
        ?string $searchKeyWord,
        ?string $role,
        ?string $status,
        ?string $engineerYn,
        ?int $licenseSeq,
        ?int $departmentSeq,
        ?int $positionSeq
    ) {
        $this->page = $page;
        $this->size = $size;

        $this->searchKeyWord = ($searchKeyWord !== null && trim($searchKeyWord) !== '') ? trim($searchKeyWord) : null;
        $this->role = ($role !== null && trim($role) !== '') ? trim($role) : null;
        $this->status = ($status !== null && trim($status) !== '') ? trim($status) : null;
        $this->engineerYn = ($engineerYn !== null && trim($engineerYn) !== '') ? trim($engineerYn) : null;

        $this->licenseSeq = $licenseSeq;
        $this->departmentSeq = $departmentSeq;
        $this->positionSeq = $positionSeq;
    }

    public static function fromArray(array $query): self
    {
        $page = (int)($query['page'] ?? 1);
        $size = (int)($query['size'] ?? 20);

        $searchKeyWord = (string)($query['q'] ?? $query['keyword'] ?? '');
        $role = (string)($query['role'] ?? '');
        $status = (string)($query['status'] ?? '');
        $engineerYn = (string)($query['engineerYn'] ?? $query['engineer_yn'] ?? '');

        $licenseSeq = isset($query['licenseSeq']) ? (int)$query['licenseSeq'] : (isset($query['license_seq']) ? (int)$query['license_seq'] : null);
        $departmentSeq = isset($query['departmentSeq']) ? (int)$query['departmentSeq'] : (isset($query['department_seq']) ? (int)$query['department_seq'] : null);
        $positionSeq = isset($query['positionSeq']) ? (int)$query['positionSeq'] : (isset($query['position_seq']) ? (int)$query['position_seq'] : null);
        return new self($page, $size, $searchKeyWord, $role, $status, $engineerYn, $licenseSeq, $departmentSeq, $positionSeq);
    }

    public function page(): int { return $this->page; }
    public function size(): int { return $this->size; }

    /** repository where 배열로 변환 */
    public function where(): array
    {
        $where = [];

        if ($this->searchKeyWord !== null) $where['q'] = $this->searchKeyWord;
        if ($this->role !== null) $where['role'] = $this->role;
        if ($this->status !== null) $where['status'] = $this->status;
        if ($this->engineerYn !== null) $where['engineer_yn'] = $this->engineerYn;

        if ($this->licenseSeq !== null && $this->licenseSeq > 0) $where['license_seq'] = $this->licenseSeq;
        if ($this->departmentSeq !== null && $this->departmentSeq > 0) $where['department_seq'] = $this->departmentSeq;
        if ($this->positionSeq !== null && $this->positionSeq > 0) $where['position_seq'] = $this->positionSeq;

        return $where;
    }
}
