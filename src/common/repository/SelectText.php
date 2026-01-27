<?php
declare(strict_types=1);

namespace App\common\repository;

final class SelectText
{
    /** @param string[] $cols 각 요소는 "expr AS alias" 한 줄(콤마 없이) */
    public static function cols(array $cols): string
    {
        $lines = [];
        foreach ($cols as $c) {
            $t = trim((string) $c);
            if ($t === '') continue;
            $t = rtrim($t, ",\n\r\t ");
            if (substr($t, -1) === ',') {
                $t = rtrim(substr($t, 0, -1));
            }
            $lines[] = $t;
        }
        return implode(",\n", $lines);
    }

    /** 기존 multi-line 문자열을 점진 정리할 때 사용 */
    public static function block(string $sql): string
    {
        return trim($sql);
    }
}
