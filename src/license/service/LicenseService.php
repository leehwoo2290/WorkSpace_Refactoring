<?php
declare(strict_types=1);

namespace App\license\service;

use App\license\dto\query\LicenseListQuery;
use App\license\dto\response\LicenseListRes;
use App\license\dto\LicenseListItem;
use App\license\Repository\LicenseRepository;

final class LicenseService
{
    private LicenseRepository $licenseRepository;

    public function __construct(?LicenseRepository $licenseRepository)
    {
        $this->licenseRepository = $licenseRepository;
    }

    public function licenseList(LicenseListQuery $licenseListQuery): LicenseListRes
    {
        $page = max(1, $licenseListQuery->page());
        $size = max(1, min(100, $licenseListQuery->size()));
        $offset = ($page - 1) * $size;

        $total = $this->licenseRepository->count($licenseListQuery);
        $rows = $this->licenseRepository->findList($licenseListQuery);

        $items = [];
        foreach ($rows as $i => $row) {
           // log_message('error', 'row['.$i.'] = ' . print_r($row, true));
            $num = $offset + $i + 1;

            $items[] = new LicenseListItem(
                $num,
                (int)($row->seq ?? 0),
                !empty($row->name) ? (string)$row->name : null,
                !empty($row->name_abbr) ? (string)$row->name_abbr : null,
                !empty($row->bizno) ? (string)$row->bizno : null,
                !empty($row->ceo_name) ? (string)$row->ceo_name : null,
                !empty($row->contract_date) ? (string)$row->contract_date : null,
                !empty($row->expire_date) ? (string)$row->expire_date : null,
                (int)($row->user_cnt ?? 0),
                (int)($row->machine_engineer_cnt ?? 0),
                (int)($row->safety_engineer_cnt ?? 0),
                (int)($row->machine_project_cnt ?? 0),
                (int)($row->safety_project_cnt ?? 0),
            );
        }

        return new LicenseListRes($items, $total, $page, $size);
    }
}
