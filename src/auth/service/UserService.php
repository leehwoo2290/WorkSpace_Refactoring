<?php
declare(strict_types=1);

namespace App\auth\service;

use App\auth\dto\UserLoginLogListRes;
use App\auth\dto\UserLoginLogListReq;
use App\auth\dto\UserLoginLogItem;
use App\auth\Repository\UserLoginLogRepository;
use App\common\Exception\ApiException;
use App\auth\ExceptionErrorCode\AuthErrorCode;

final class UserService{

    private UserLoginLogRepository $repository;

    public function __construct(UserLoginLogRepository $repository)
    {
        $this->repository = $repository;
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
        $total = $this->repository->count($where);
        $rows = $this->repository->findList($where, $offset, $size);

        $items = [];
        foreach ($rows as $r) {
            $affParts = [];
            if (!empty($r->license_name)) $affParts[] = (string)$r->license_name;
            if (!empty($r->department_name)) $affParts[] = (string)$r->department_name;
            if (!empty($r->team_name)) $affParts[] = (string)$r->team_name;
            $affiliation = empty($affParts) ? null : implode(' / ', $affParts);

            $deviceType = ((string)($r->is_mobile ?? 'N') === 'Y') ? 'MOBILE' : 'PC';

            $items[] = new UserLoginLogItem(
                (int)($r->seq ?? 0),
                (string)($r->reg_time ?? ''),
                (string)($r->email ?? ''),
                !empty($r->user_name) ? (string)$r->user_name : null,
                $affiliation,
                !empty($r->mobile) ? (string)$r->mobile : null,
                (string)($r->country_code ?? ''),
                (string)($r->ip_addr ?? ''),
                $deviceType,
                (string)($r->success ?? 'N')
            );
        }

        return new UserLoginLogListRes($items, $total, $page, $size);
    }

}