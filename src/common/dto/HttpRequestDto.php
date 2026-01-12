<?php
declare(strict_types=1);

namespace App\common\dto;

interface HttpRequestDto
{
    /** @return static */
    public static function fromArray(array $data);

}
