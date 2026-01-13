<?php
declare(strict_types=1);

namespace App\license\service;

use App\license\dto\request\LicenseListReq;
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

    public function licenseList(LicenseListReq $req): LicenseListRes
    {
        $page = max(1, $req->page());
        $size = max(1, min(100, $req->size()));
        $offset = ($page - 1) * $size;

        $where = $req->where();

        $total = $this->licenseRepository->count($where);
        $rows = $this->licenseRepository->findList($where, $offset, $size);

        $items = [];
        foreach ($rows as $i => $r) {
            $no = $offset + $i + 1;

            $items[] = new LicenseListItem(
                $no,
                (int)($r->seq ?? 0),
                !empty($r->name) ? (string)$r->name : null,
                !empty($r->bizno) ? (string)$r->bizno : null,
                !empty($r->ceo_name) ? (string)$r->ceo_name : null,
                !empty($r->contract_date) ? (string)$r->contract_date : null,
                !empty($r->expire_date) ? (string)$r->expire_date : null,
                (int)($r->user_cnt ?? 0),
                (int)($r->machine_engineer_cnt ?? 0),
                (int)($r->safety_engineer_cnt ?? 0),
                (int)($r->machine_project_cnt ?? 0),
                (int)($r->safety_project_cnt ?? 0),
            );
        }

        return new LicenseListRes($items, $total, $page, $size);
    }
}
