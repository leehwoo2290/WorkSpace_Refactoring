<?php
declare(strict_types=1);

namespace App\safety\project\getList\service;

use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\dto\SafetyProjectListItem;
use App\safety\project\getList\dto\response\SafetyProjectListRes;
use App\safety\project\getList\repository\SafetyProjectRepository;

/**
 * SafetyProjectService
 *
 * - page/size 보정(응답용)
 * - total/count 조회
 * - row -> SafetyProjectListItem 변환
 */
final class SafetyProjectService
{
    private SafetyProjectRepository $safetyProjectRepository;

    public function __construct(SafetyProjectRepository $safetyProjectRepository)
    {
        $this->safetyProjectRepository = $safetyProjectRepository;
    }

    public function list(SafetyProjectListQuery $query): SafetyProjectListRes
    {
        $page = max(1, $query->page());
        $size = max(1, min(100, $query->size()));
        $offset = ($page - 1) * $size;

        $total = $this->safetyProjectRepository->count($query);
        $rows  = $this->safetyProjectRepository->findList($query);

        $items = [];
        foreach ($rows as $i => $row) {
            $no = $offset + $i + 1;

            $grossArea = null;
            if (isset($row->gross_area) && $row->gross_area !== null && $row->gross_area !== '') {
                $grossArea = (int) round((float) $row->gross_area);
            }

            $items[] = new SafetyProjectListItem(
                $no,
                !empty($row->status) ? (string) $row->status : null,
                !empty($row->check_type) ? (string) $row->check_type : null,
                !empty($row->region) ? (string) $row->region : null,
                !empty($row->place_name) ? (string) $row->place_name : null,
                !empty($row->filed_begin_date) ? (string) $row->filed_begin_date : null,
                !empty($row->field_end_date) ? (string) $row->field_end_date : null,
                !empty($row->report_date) ? (string) $row->report_date : null,
                !empty($row->facility_type) ? (string) $row->facility_type : null,
                !empty($row->jong) ? (string) $row->jong : null,
                !empty($row->license_name) ? (string) $row->license_name : null,
                !empty($row->engineer_name) ? (string) $row->engineer_name : null,
                $grossArea
            );
        }

        return new SafetyProjectListRes($items, $total, $page, $size);
    }
}
