<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\dto\query;

/**
 * SafetyEngineerUserAutocompleteQuery
 *
 * Query params (GET):
 * - q: 검색어(필수). jQuery UI(term), legacy(keyword)도 alias로 지원
 * - type: all|email|name (기본 all)
 * - limit: 최대 반환 개수 (기본 20, 최대 50)
 */
final class SafetyEngineerAutocompleteQuery
{
    private string $type;
    private string $keyword;
    //private int $limit;

    public function __construct(string $type, string $keyword)
    {
        $this->type = $type;
        $this->keyword = $keyword;
       // $this->limit = $limit;
    }

    public static function fromArray(array $query): self
    {
        // alias 지원: keyword/term -> q
        if (!array_key_exists('q', $query)) {
            if (array_key_exists('keyword', $query)) {
                $query['q'] = $query['keyword'];
            } elseif (array_key_exists('term', $query)) {
                $query['q'] = $query['term'];
            }
        }
        unset($query['keyword'], $query['term']);

        $type = trim((string)($query['type'] ?? 'all'));
        $keyword = trim((string)($query['q'] ?? ''));

       // $limitRaw = $query['limit'] ?? ($query['size'] ?? 20);
       // $limit = (int)$limitRaw;
        //if ($limit <= 0) $limit = 20;
        //if ($limit > 50) $limit = 50;

        $allowed = ['all', 'email', 'name'];
        if (!in_array($type, $allowed, true)) {
            $type = 'all';
        }

        return new self($type, $keyword);
    }

    public function type(): string { return $this->type; }
    public function keyword(): string { return $this->keyword; }

    /** @return array<string,mixed> */
    public function makeWhere(): array
    {
        return ['type' => $this->type, 'keyword' => $this->keyword];
    }
}
