<?php
declare(strict_types=1);

final class QueryEnumMapper
{
    /**
     * @param array<string, array<string,string>> $maps
     */
    public static function map(array $maps, string $mapKey, $raw, bool $strict = true): string
    {
        $t = trim((string)$raw);
        if ($t === '') return $t;

        if (!isset($maps[$mapKey])) {
            throw new \InvalidArgumentException("UNKNOWN_MAP_KEY: {$mapKey}");
        }

        $map = $maps[$mapKey];
        $u = strtoupper($t);

        if (isset($map[$u])) return $map[$u];

        if ($strict) {
            $allowed = implode(', ', array_keys($map));
            throw new \InvalidArgumentException("INVALID_ENUM_VALUE: {$mapKey}={$t} allowed=[{$allowed}]");
        }

        return $t;
    }

    /**
     * allowed values helper
     * @return string[]
     */
    public static function allowed(array $maps, string $mapKey): array
    {
        if (!isset($maps[$mapKey])) return [];
        return array_keys($maps[$mapKey]);
    }
}
