<?php
declare(strict_types=1);

namespace App\userDetail\dto\query;

use App\common\dto\HttpQueryDto;

final class UserDetailQuery implements HttpQueryDto
{
    private int $userSeq;

    private function __construct(int $userSeq)
    {
        $this->userSeq = $userSeq;
    }

    public static function fromArray(array $query): self
    {
         $userSeq = (int)($query['user_seq']);
         return new self($userSeq);
    }


    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
        $where = [];

        

        return $where;
    }

}
