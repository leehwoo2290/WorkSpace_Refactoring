<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;

use App\auth\dto\response\UserLoginLogListRes;
use App\auth\dto\request\UserLoginLogListReq;

use App\auth\dto\response\UserListRes;
use App\auth\dto\request\UserListReq;

class UserController extends BASE_Controller
{

    public function list()
    {
        /*
        @Description
        - [GET] /api/web/audit/users
        - Header: Authorization: Bearer {accessToken}
        - Query:
        - page: int (default 1)
        - size: int (default 20)
        - searchKeyword: string (이름/이메일/사번 부분검색)
        - role: '' | 'User' | 'Staff' | 'Manager' | 'Admin' | 'SuperAdmin'
        - status: '' | 'Pending' | 'Normal' | 'Quit'
        - engineerYn: '' | 'Y' | 'N'
        - 성공: 200 OK (ApiResult::ok)
        - 실패: 401/403 (권한/인증)
        */
        
        try {
            $userListReq = $this->requestDtoMapper->queryRequestDto(UserListReq::class);
            $userListRes = $this->authModule->userList($userListReq);

            ApiResult::ok($userListRes, UserListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function logList()
    {
        /*
        @Description
        - [GET] /api/web/audit/login-logs
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