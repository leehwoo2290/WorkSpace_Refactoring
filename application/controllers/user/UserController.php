<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\user\dto\response\UserLoginLogListRes;
use App\user\dto\query\UserLoginLogListQuery;

use App\user\dto\response\UserListRes;
use App\user\dto\query\UserListQuery;

use App\user\dto\response\UserListLicenseFilterRes;

class UserController extends BASE_Controller
{
    public UserModule $userModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('UserModule', null, 'userModule');
    }

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
            $userListQuery = $this->requestQueryDtoMapper->queryRequestDto(UserListQuery::class);
            $userListRes = $this->userModule->userList($userListQuery);

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
            $userLoginLogListReq = $this->requestQueryDtoMapper->queryRequestDto(UserLoginLogListQuery::class);
            $userLoginLogListRes = $this->userModule->logList($userLoginLogListReq);

            ApiResult::ok($userLoginLogListRes, UserLoginLogListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

      public function licenseFilter()
    {
        try {
            $userListLicenseFilterRes = $this->userModule->licenseFilter();

            ApiResult::ok($userListLicenseFilterRes, UserListLicenseFilterRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}