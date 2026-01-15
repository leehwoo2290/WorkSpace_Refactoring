<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\user\dto\response\UserLoginLogListRes;
use App\user\dto\query\UserLoginLogListQuery;

use App\user\dto\response\UserListRes;
use App\user\dto\query\UserListQuery;

class UserDetailController extends BASE_Controller
{

    public function detail()
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
            $userListRes = $this->authModule->userList($userListQuery);

            ApiResult::ok($userListRes, UserListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

}