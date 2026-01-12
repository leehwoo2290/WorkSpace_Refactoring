<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\auth\dto\UserLoginReq;
use App\common\ApiResult;

use App\auth\dto\UserLoginRes;
use App\auth\dto\UserMeRes;
use App\auth\dto\JwtTokenRes;

class JwtController extends BASE_Controller
{

    public function login()
    {
        /*
      @Description
      - [POST] /api/authentication/web/login
      - 필요: X-CSRF-TOKEN 헤더 (= csrf_cookie 쿠키 값과 동일)
      - Body(JSON): { "email": "...", "password": "..." }
      - 성공: 201 Created (ApiResult::created)
      - 실패: ApiResult::fail(에러코드, 메시지, httpStatus)
        */

        try {
            $userLoginReq = $this->requestDtoMapper->jsonRequestDto(UserLoginReq::class, true);
            $userLoginRes = $this->authModule->loginByCredentials($userLoginReq);

            ApiResult::created($userLoginRes, UserLoginRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function me()
    {
        /*
       @Description
       - [GET] /api/authentication/web/me
       - 성공: 200 OK (ApiResult::ok)
       - 인증: accessToken 쿠키 기반
        */

        try {
            $userMeRes = $this->authModule->me();

            ApiResult::ok($userMeRes, UserMeRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }


    public function refresh()
    {
        /*
        @Description
        - [POST] /api/authentication/web/refresh
        - 필요: X-CSRF-TOKEN 헤더 (= csrf_cookie 쿠키 값과 동일)
        - 인증: refreshToken 쿠키 기반
        - 성공: 201 Created (ApiResult::created)
        */

        try {
            $jwtTokenRes = $this->authModule->refreshAccessToken();

            //보안상 위험 때문에 refresh token은 노출하지 않는다. 현재는 테스트용
            ApiResult::created($jwtTokenRes, JwtTokenRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function logout()
    {
        /*
        @Description
        - [POST] /api/authentication/web/logout
        - 필요: X-CSRF-TOKEN 헤더 (= csrf_cookie 쿠키 값과 동일)
        - 성공: 204 No Content (ApiResult::none)
        */

        try {
            $this->authModule->logout();

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}
