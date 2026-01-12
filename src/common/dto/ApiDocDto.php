<?php
declare(strict_types=1);

namespace App\common\dto;

interface ApiDocDto
{
    public static function apiDocSchema(): array;  // 필드 타입 정의
    public static function apiDocExample(): array; // 예시 JSON
}
