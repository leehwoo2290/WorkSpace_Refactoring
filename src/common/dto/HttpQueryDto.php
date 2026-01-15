<?php
declare(strict_types=1);

namespace App\common\dto;

interface HttpQueryDto
{
    /** @return static */
    public static function fromArray(array $data);

    public function makeWhere();

}
