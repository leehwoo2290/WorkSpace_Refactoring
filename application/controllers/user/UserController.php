<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\user\dto\response\UserLoginLogListRes;
use App\user\dto\query\UserLoginLogListQuery;

use App\user\dto\response\UserListRes;
use App\user\dto\query\UserListQuery;

use App\user\dto\request\UserAddReq;

class UserController extends BASE_Controller
{
    public UserModule $userModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('UserModule', null, 'userModule');
    }

    /*
     @Description
     - [GET] /api/web/audit/users
     - Header: Authorization: Bearer {accessToken}
     - Query: UserListQuery (query string)
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/500 (인증/권한/서버)
     */
    public function list()
    {
        try {
            $userListQuery = $this->requestQueryDtoMapper->queryRequestDto(UserListQuery::class);
            $userListRes = $this->userModule->userList($userListQuery);

            ApiResult::ok($userListRes, UserListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
    @Description
    - [GET] /api/web/audit/login-logs
    - Header: Authorization: Bearer {accessToken}
    - Query: UserLoginLogListQuery (query string)
    - 성공: 200 OK (ApiResult::ok)
    - 실패: 401/403/500 (인증/권한/서버)
    */
    public function logList()
    {
        try {
            $userLoginLogListReq = $this->requestQueryDtoMapper->queryRequestDto(UserLoginLogListQuery::class);
            $userLoginLogListRes = $this->userModule->logList($userLoginLogListReq);

            ApiResult::ok($userLoginLogListRes, UserLoginLogListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

     /*
     @Description
     - [POST] /api/web/user
     - Header: Authorization: Bearer {accessToken}
     - Header: X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Body(JSON): UserAddReq
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 400/401/403/409/500 (요청/인증/CSRF/중복/서버)
     */
    public function add()
    {
        try {
            $addUserReq = $this->requestQueryDtoMapper->jsonRequestDto(UserAddReq::class);
            //$userId = $this->userModule->addUser($addUserReq);
            $this->userModule->addUser($addUserReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}