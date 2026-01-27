<?php
declare(strict_types=1);

namespace App\common\repository;

use QueryEnumMapper;

/**
 * WritePayloadBuilder
 *
 * raw input(array)에서 "허용된 키만" 골라 DB payload를 만든다.
 * - array_key_exists 기반이라, 값이 null이어도 "키가 존재하면" payload에 포함된다.
 *   => null로 컬럼을 비우는 PUT/PATCH 시나리오 지원
 *
 */
final class WritePayloadBuilder
{
    /**
     * @param array $input  raw request body (json_decode 결과)
     * @param array $spec   [
     *   'inputKey' => ['col' => 'db_col', 'transform' => callable|null, 'enum' => ['maps'=>..., 'key'=>..., 'strict'=>bool]|null]
     * ]
     */
    //['col' => 'name']은 DB 컬럼명
    public function build(array $input, array $spec): array
    {
        $out = [];

        foreach ($spec as $inKey => $rule) {
            if (!\array_key_exists($inKey, $input)) continue;

            $col = (string)($rule['col'] ?? '');
            if ($col === '') continue;

            $val = $input[$inKey];

            // enum mapping
            if (isset($rule['enum']) && \is_array($rule['enum'])) {
                $maps   = (array)($rule['enum']['maps'] ?? []);
                $mapKey = (string)($rule['enum']['key'] ?? '');
                $strict = (bool)($rule['enum']['strict'] ?? true);

                if ($mapKey !== '' && $val !== null && $val !== '') {
                    $val = QueryEnumMapper::map($maps, $mapKey, $val, $strict);
                }
            }

            // transform
            if (isset($rule['transform']) && \is_callable($rule['transform'])) {
                $val = \call_user_func($rule['transform'], $val, $input);
            }

            $out[$col] = $val; // null도 그대로 포함(키 존재가 곧 업데이트 의도)
        }

        return $out;
    }
}
