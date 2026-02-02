<?php
declare(strict_types=1);

namespace App\common\dto;

use App\common\dto\HttpRequestDto;

abstract class ReqDtoBase implements HttpRequestDto
{
    protected static function pick(array $data, string $camel, ?string $snake = null)
    {
        if (array_key_exists($camel, $data))
            return $data[$camel];
        if ($snake !== null && array_key_exists($snake, $data))
            return $data[$snake];
        return null;
    }

    /** @param string[] $keys */
    protected static function get(array $data, array $keys, $default)
    {
        foreach ($keys as $k) {
            if (array_key_exists($k, $data))
                return $data[$k];
        }
        return $default;
    }

    protected static function toStr($v): string
    {
        return trim((string) ($v ?? ''));
    }

    protected static function toStrOrNull($v): ?string
    {
        if ($v === null)
            return null;
        $s = trim((string) $v);
        return $s === '' ? null : $s;
    }

    protected static function toInt($v): int
    {
        return (int) ($v ?? 0);
    }

    protected static function toIntOrNull($v): ?int
    {
        if ($v === null || $v === '')
            return null;
        if (!is_numeric($v))
            return null;
        return (int) $v;
    }

    protected static function toBool($v): bool
    {
        if (is_bool($v))
            return $v;
        if (is_int($v))
            return $v === 1;
        $s = strtoupper(trim((string) $v));
        return in_array($s, ['1', 'Y', 'YES', 'TRUE', 'ON'], true);
    }

    protected static function toYnOrNull($v): ?string
    {
        if ($v === null)
            return null;
        if (is_bool($v))
            return $v ? 'Y' : 'N';
        if (is_int($v))
            return $v === 1 ? 'Y' : 'N';
        $s = strtoupper(trim((string) $v));
        return in_array($s, ['1', 'Y', 'YES', 'TRUE', 'ON'], true) ? 'Y' : 'N';
    }
}
