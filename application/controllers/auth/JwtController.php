<?php defined('BASEPATH') OR exit('No direct script access allowed');


use App\common\ApiResult;

use App\auth\dto\response\UserLoginRes;
use App\auth\dto\response\UserMeRes;
use App\auth\dto\response\JwtTokenRes;

use App\auth\dto\request\UserLoginReq;

class JwtController extends BASE_Controller
{

    /*
     @Description
     - [POST] /api/web/auth/login
     - [POST] /api/app/auth/login
     - Header(웹): X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Header(Optional): X-Device-Id: {deviceId} (or cookie: _device)
     - Body(JSON): UserLoginReq
     - 성공: 201 Created (ApiResult::created)
     - 실패: 400/401/403/500 (요청/인증/CSRF/서버)
     */
    public function login()
    {
        try {
         
            $userLoginReq = $this->requestQueryDtoMapper->jsonRequestDto(UserLoginReq::class, true);
            $userLoginRes = $this->authModule->loginByCredentials($userLoginReq);
            
            ApiResult::created($userLoginRes, UserLoginRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [GET] /api/web/auth/me
     - [GET] /api/app/auth/me
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/500 (인증/권한/서버)
     */
    public function me()
    {
        try {
            $userMeRes = $this->authModule->me();

            ApiResult::ok($userMeRes, UserMeRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }


     /*
     @Description
     - [POST] /api/web/auth/refresh
     - [POST] /api/app/auth/refresh
     - [ANY] /api/jwt/refresh
     - Header(웹): X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - RefreshToken: Cookie(웹)=refreshToken(HttpOnly) / Header(앱)=X-Refresh-Token
     - Header(Optional): X-Device-Id: {deviceId} (or cookie: _device)
     - 성공: 201 Created (ApiResult::created)
     - 실패: 401/403/500 (인증/CSRF/서버)
     */
    public function refresh()
    {
        try {
            $jwtTokenRes = $this->authModule->refreshAccessToken();
           
            ApiResult::created($jwtTokenRes, JwtTokenRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

     /*
     @Description
     - [POST] /api/web/auth/logout
     - [POST] /api/app/auth/logout
     - [ANY] /api/jwt/logout
     - Header(웹): X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - RefreshToken: Cookie(웹)=refreshToken(HttpOnly) / Header(앱)=X-Refresh-Token
     - Header(Optional): X-Device-Id: {deviceId} (or cookie: _device)
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 403/500 (CSRF/서버)
     */
    public function logout()
    {
        try {
            $this->authModule->logout();

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}
