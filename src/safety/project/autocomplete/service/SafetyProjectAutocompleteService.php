<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\service;


use App\safety\project\autocomplete\dto\query\SafetyProjectAutocompleteQuery;
use App\safety\project\autocomplete\dto\response\SafetyProjectAutocompleteRes;
use App\safety\project\autocomplete\dto\SafetyProjectAutocompleteItem;
use App\safety\project\autocomplete\repository\SafetyProjectAutocompleteRepository;

use App\common\exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;

final class SafetyProjectAutocompleteService
{
    private SafetyProjectAutocompleteRepository $safetyProjectAutocompleteRepository;

    public function __construct(SafetyProjectAutocompleteRepository $safetyProjectAutocompleteRepository)
    {
        $this->safetyProjectAutocompleteRepository = $safetyProjectAutocompleteRepository;
    }

    public function list(SafetyProjectAutocompleteQuery $query): SafetyProjectAutocompleteRes
    {
        $rows = $this->safetyProjectAutocompleteRepository->findList($query);

        $items = [];
        foreach ($rows as $i => $row) {
            $placeName = trim((string) ($row->place_name ?? ''));
            if ($placeName === '')
                continue; // 또는 ''로 내려도 됨
            $items[] = new SafetyProjectAutocompleteItem(
                !empty($row->place_name) ? (string) $row->place_name : null,
                !empty($row->facility_no) ? (string) $row->facility_no : null,
                !empty($row->unique_id) ? (string) $row->unique_id : null,
                !empty($row->building_id) ? (string) $row->building_id : null,
            );
        }

        return new SafetyProjectAutocompleteRes($items);
    }
}

