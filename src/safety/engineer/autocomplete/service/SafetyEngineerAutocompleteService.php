<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\service;

use App\safety\engineer\autocomplete\dto\SafetyEngineerAutocompleteItem;
use App\safety\engineer\autocomplete\dto\query\SafetyEngineerAutocompleteQuery;
use App\safety\engineer\autocomplete\dto\response\SafetyEngineerAutocompleteRes;
use App\safety\engineer\autocomplete\repository\SafetyEngineerAutocompleteRepository;

final class SafetyEngineerAutocompleteService
{
    private SafetyEngineerAutocompleteRepository $repo;

    public function __construct(SafetyEngineerAutocompleteRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list(SafetyEngineerAutocompleteQuery $query): SafetyEngineerAutocompleteRes
    {
        $rows = $this->repo->findList($query);

        $items = [];
        foreach ($rows as $row) {
            $userSeq = (int)($row->user_seq ?? 0);
            $email = trim((string)($row->email ?? ''));
            $name = trim((string)($row->name ?? ''));

            if ($userSeq <= 0 || $email === '' || $name === '') continue;

            $items[] = new SafetyEngineerAutocompleteItem($userSeq, $email, $name);
        }

        return new SafetyEngineerAutocompleteRes($items);
    }
}
