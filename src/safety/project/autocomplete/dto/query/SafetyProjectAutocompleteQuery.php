<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\dto\query;

final class SafetyProjectAutocompleteQuery
{
    private string $type;
    private string $q;
    //private int $limit;

    public function __construct(string $type, string $q)
    {
        $this->type = $type;
        $this->q = $q;
        //$this->limit = $limit > 0 ? $limit : 20;
    }

    public static function fromArray(array $query): self
    {
        // 1) jQuery UI autocomplete 기본 파라미터(term)도 지원
        if (!array_key_exists('q', $query) && array_key_exists('keyword', $query)) {
            $query['q'] = $query['keyword'];
        }
        unset($query['keyword']);

        // 2) 어떤 필드가 들어왔는지로 type/q를 "추론"할 수 있도록 key alias 묶음
        //    - 프론트가 type을 안 보내고 placeName=... 같이 보내도 동작하게
        $typeKeyMap = [
            'placeName' => ['placeName', 'place_name'],
            'facilityNum' => ['facilityNum', 'facility_no', 'facility_num'],
            'uniqueNum' => ['uniqueNum', 'unique_id', 'unique_num'],
            'buildingId' => ['buildingId', 'building_id'],
        ];

        // 3) type 결정
        $type = isset($query['type']) ? trim((string) $query['type']) : '';

        // 4) q 결정
        $q = isset($query['q']) ? trim((string) $query['q']) : '';

        // type은 allow-list로만 허용 (안전)
        $allowedTypes = array_keys($typeKeyMap);
        if (!in_array($type, $allowedTypes, true)) {
            $type = 'placeName';
        }

        // // 5) limit 결정 (기본 20, 범위 제한)
        // $limit = isset($query['limit']) ? (int) $query['limit']
        //     : (isset($query['size']) ? (int) $query['size'] : 100);

        // if ($limit <= 0)
        //     $limit = 100;

        return new self($type, $q);
    }

    /** @return array<string,mixed> */
    public function makeWhere(): array
    {
        return [
            'type' => $this->type,
            'q' => $this->q,
            //'limit' => $this->limit,
        ];
    }

    // public function limit(): int
    // {
    //     return $this->limit;
    // }
}
