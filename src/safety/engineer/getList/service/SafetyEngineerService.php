<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\service;

use App\safety\engineer\getList\dto\query\SafetyEngineerListQuery;
use App\safety\engineer\getList\dto\SafetyEngineerListItem;
use App\safety\engineer\getList\dto\response\SafetyEngineerListRes;
use App\safety\engineer\getList\repository\SafetyEngineerRepository;

use App\safety\engineer\getList\dto\response\SafetyProjectListEngineerFilterRes;
use App\safety\engineer\getList\dto\SafetyProjectListEngineerFilterItem;

final class SafetyEngineerService
{
    private SafetyEngineerRepository $safetyEngineerRepository;

    public function __construct(SafetyEngineerRepository $safetyEngineerRepository)
    {
        $this->safetyEngineerRepository = $safetyEngineerRepository;
    }

    public function list(SafetyEngineerListQuery $query): SafetyEngineerListRes
    {
        $page = max(1, $query->page());
        $size = max(1, min(100, $query->size()));
        $offset = ($page - 1) * $size;

        $total = $this->safetyEngineerRepository->count($query);
        $rows = $this->safetyEngineerRepository->findList($query);
  
        $items = [];
        foreach ($rows as $i => $r) {
            $no = $offset + $i + 1;

            $projectCnt = null;
            if (isset($r->project_cnt) && $r->project_cnt !== null && $r->project_cnt !== '') {
                $projectCnt = (int) $r->project_cnt;
            }

            $userSeq = null;
            if (isset($r->user_seq) && $r->user_seq !== null && $r->user_seq !== '') {
                $userSeq = (int) $r->user_seq;
            }

            $items[] = new SafetyEngineerListItem(
                $no,
                $userSeq,
                !empty($r->license_name) ? (string) $r->license_name : null,
                !empty($r->grade) ? (string) $r->grade : null,
                !empty($r->name) ? (string) $r->name : null,
                !empty($r->department_name) ? (string) $r->department_name : null,
                !empty($r->position_name) ? (string) $r->position_name : null,
                !empty($r->license_no) ? (string) $r->license_no : null,
                !empty($r->email) ? (string) $r->email : null,
                !empty($r->status) ? (string) $r->status : null,
                $projectCnt,
                !empty($r->last_project) ? (string) $r->last_project : null,
                !empty($r->last_project_date) ? (string) $r->last_project_date : null,
                !empty($r->remark) ? (string) $r->remark : null
            );
        }

        return new SafetyEngineerListRes($items, $total, $page, $size);
    }

    public function safetyEngineerFilter(): SafetyProjectListEngineerFilterRes
    {

        $rows = $this->safetyEngineerRepository->findSafetyEngineerFilter();

        $items = [];
        foreach ($rows as $r) {
            $items[] = new SafetyProjectListEngineerFilterItem(
                (int) ($r->engineer_seq ?? 0),
                (string) ($r->name ?? ''),
                (string) ($r->grade ?? '')
            );
        }

        return new SafetyProjectListEngineerFilterRes($items);
    }
}
