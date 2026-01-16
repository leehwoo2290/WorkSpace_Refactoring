<?php
declare(strict_types=1);

namespace App\userDetail\dto\query;

use App\common\dto\HttpQueryDto;

final class UserDetailQuery implements HttpQueryDto
{
    private int $userSeq;

    private function __construct(int $userSeq)
    {
        if ($userSeq <= 0) {
            throw new \InvalidArgumentException('userSeq must be a positive integer');
        }
        $this->userSeq = $userSeq;
    }

    public static function fromArray(array $query): self
    {
        $raw = $query['userId'] ?? $query['user_id'] ?? $query['userSeq'] ?? null;

        if ($raw === null || $raw === '') {
            throw new \InvalidArgumentException('userId is required');
        }

        return new self((int) $raw);
    }


    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

        if ($this->userSeq !== null)
            $where['user_seq'] = $this->userSeq;

        return $where;
    }

    public function userSeq(): int
    {
        return $this->userSeq;
    }

}
