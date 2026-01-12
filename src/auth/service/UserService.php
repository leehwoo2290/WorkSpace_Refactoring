<?php
declare(strict_types=1);

namespace App\auth\service;

use App\auth\dto\UserLoginLogListRes;
use App\auth\dto\UserLoginLogListReq;
use App\auth\dto\UserLoginLogItem;
use App\auth\dto\UserListRes;
use App\auth\dto\UserListReq;
use App\auth\dto\UserListItem;

use App\auth\Repository\UserLoginLogRepository;
use App\auth\Repository\UserRepository;
use App\common\Exception\ApiException;
use App\auth\ExceptionErrorCode\AuthErrorCode;

final class UserService
{

    private UserLoginLogRepository $loginLogRepository;
    private UserRepository $userRepository;
    public function __construct(UserLoginLogRepository $loginLogRepository, UserRepository $userRepository)
    {
        $this->loginLogRepository = $loginLogRepository;
        $this->userRepository = $userRepository;
    }

    public function logList(UserLoginLogListReq $userLoginLogListReq): UserLoginLogListRes
    {
        if ($userLoginLogListReq->success() !== null && $userLoginLogListReq->success() !== 'Y' && $userLoginLogListReq->success() !== 'N') {
            throw ApiException::badRequest('VALIDATION_FAILED Not(N , Y ," ")', AuthErrorCode::VALIDATION_FAILED);
        }

        $page = max(1, $userLoginLogListReq->page());
        $size = max(1, min(100, $userLoginLogListReq->size()));
        $offset = ($page - 1) * $size;

        $where = $userLoginLogListReq->where();
        $total = $this->loginLogRepository->count($where);
        $rows = $this->loginLogRepository->findList($where, $offset, $size);

        $items = [];
        foreach ($rows as $r) {
            $affParts = [];
            if (!empty($r->license_name))
                $affParts[] = (string) $r->license_name;
            if (!empty($r->department_name))
                $affParts[] = (string) $r->department_name;
            if (!empty($r->team_name))
                $affParts[] = (string) $r->team_name;
            $affiliation = empty($affParts) ? null : implode(' / ', $affParts);

            $deviceType = ((string) ($r->is_mobile ?? 'N') === 'Y') ? 'MOBILE' : 'PC';

            $items[] = new UserLoginLogItem(
                (int) ($r->seq ?? 0),
                (string) ($r->reg_time ?? ''),
                (string) ($r->email ?? ''),
                !empty($r->user_name) ? (string) $r->user_name : null,
                $affiliation,
                !empty($r->mobile) ? (string) $r->mobile : null,
                (string) ($r->country_code ?? ''),
                (string) ($r->ip_addr ?? ''),
                $deviceType,
                (string) ($r->success ?? 'N')
            );
        }

        return new UserLoginLogListRes($items, $total, $page, $size);
    }


    public function userList(UserListReq $req): UserListRes
    {
        // 간단 검증(원하면 여기서 role/status allowed set 제한 가능)
        $where = $req->where();

        if (isset($where['engineer_yn']) && $where['engineer_yn'] !== 'Y' && $where['engineer_yn'] !== 'N') {
            throw ApiException::badRequest('VALIDATION_FAILED engineerYn must be Y or N', AuthErrorCode::VALIDATION_FAILED);
        }

        $page = max(1, $req->page());
        $size = max(1, min(100, $req->size()));
        $offset = ($page - 1) * $size;

        $total = $this->userRepository->count($where);
        $rows = $this->userRepository->findList($where, $offset, $size);

        $tz = new \DateTimeZone('Asia/Seoul');
        $today = new \DateTimeImmutable('now', $tz);

        $items = [];
        foreach ($rows as $i => $r) {
            $no = $offset + $i + 1;

            $birthday = !empty($r->birthday) ? (string) $r->birthday : null;
            $joinDate = !empty($r->join_date) ? (string) $r->join_date : null;
            $resignDate = !empty($r->resign_date) ? (string) $r->resign_date : null;

            $age = $this->calcYearsFromDate($birthday, $today);
            $tenureYears = $this->calcTenureYears($joinDate, $resignDate, $today);

            $items[] = new UserListItem(
                $no,
                (int) ($r->user_seq ?? 0),
                !empty($r->role) ? (string) $r->role : null,
                !empty($r->name) ? (string) $r->name : null,
                !empty($r->staff_num) ? (string) $r->staff_num : null,
                !empty($r->license_name) ? (string) $r->license_name : null,
                !empty($r->department_name) ? (string) $r->department_name : null,
                !empty($r->position_name) ? (string) $r->position_name : null,
                $age,
                !empty($r->email) ? (string) $r->email : null,
                !empty($r->mobile) ? (string) $r->mobile : null,
                !empty($r->engineer_yn) ? (string) $r->engineer_yn : null,
                $joinDate,
                $tenureYears,
                !empty($r->status) ? (string) $r->status : null
            );
        }

        return new UserListRes($items, $total, $page, $size);
    }

    private function calcYearsFromDate(?string $date, \DateTimeImmutable $today): ?int
    {
        if ($date === null)
            return null;
        try {
            $d = new \DateTimeImmutable($date, $today->getTimezone());
            return $d->diff($today)->y;
        } catch (\Throwable $e) {
            return null;
        }
    }

    private function calcTenureYears(?string $joinDate, ?string $resignDate, \DateTimeImmutable $today): ?int
    {
        if ($joinDate === null)
            return null;

        try {
            $start = new \DateTimeImmutable($joinDate, $today->getTimezone());
            $end = $today;
            if ($resignDate !== null) {
                $end = new \DateTimeImmutable($resignDate, $today->getTimezone());
            }
            if ($end < $start)
                return 0;
            return $start->diff($end)->y;
        } catch (\Throwable $e) {
            return null;
        }
    }
}