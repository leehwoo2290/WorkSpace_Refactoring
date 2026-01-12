<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;

use App\auth\dto\UserLoginLogListRes;
use App\auth\dto\UserLoginLogListReq;

class UserController extends BASE_Controller
{

    public function list()
    {
        try {
            $userLoginLogListReq = $this->requestDtoMapper->queryRequestDto(UserLoginLogListReq::class);
            $userLoginLogListRes = $this->authModule->logList($userLoginLogListReq);

            ApiResult::ok($userLoginLogListRes, UserLoginLogListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function logList()
    {
        /*
        @Description
        - [GET] /api/authentication/web/login-logs
        - Header: Authorization: Bearer {accessToken}
        - Query:
          - page: int (default 1)
          - size: int (default 20)
          - email: string (부분검색)
          - success: '' | 'Y' | 'N'
          - from: YYYY-MM-DD
          - to: YYYY-MM-DD
        - 성공: 200 OK (ApiResult::ok)
        - 실패: 401/403 (권한/인증)
        */

        try {
            $userLoginLogListReq = $this->requestDtoMapper->queryRequestDto(UserLoginLogListReq::class);
            $userLoginLogListRes = $this->authModule->logList($userLoginLogListReq);

            ApiResult::ok($userLoginLogListRes, UserLoginLogListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

}