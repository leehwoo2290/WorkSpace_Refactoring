<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;

use App\user\detail\dto\response\UserDetailRes;
use App\user\detail\dto\query\UserDetailQuery;

use App\user\detail\dto\response\UserBasicRes;
use App\user\detail\dto\response\UserPrivacyRes;
use App\user\detail\dto\response\UserOfficeRes;
use App\user\detail\dto\response\UserEtcRes;
use App\user\detail\dto\response\UserCareerRes;

use App\user\detail\dto\request\UserBasicReq;
use App\user\detail\dto\request\UserPrivacyReq;
use App\user\detail\dto\request\UserOfficeReq;
use App\user\detail\dto\request\UserEtcReq;
use App\user\detail\dto\request\UserCareerReq;

class UserDetailController extends BASE_Controller
{

    public UserModule $userModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('UserModule', null, 'userModule');
    }

    /*
     @Description
     - [GET] /api/web/user (예: /api/web/user?userSeq=123)
     - NOTE: application/config/routes.php에서 현재 주석처리됨 (필요 시 라우트 추가/활성화)
     - Header: Authorization: Bearer {accessToken}
     - Query: UserDetailQuery (query string)
     - Response: UserDetailRes
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function detail()
    {
        try {
            $userDetailQuery = $this->requestQueryDtoMapper->queryRequestDto(UserDetailQuery::class);
            $userDetailRes = $this->userModule->userDetail($userDetailQuery);

            ApiResult::ok($userDetailRes, UserDetailRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [GET] /api/web/user/(:num)/basic
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function basic(int $userSeq): void
    {
        try {
            $userBasicRes = $this->userModule->userBasic($userSeq);

            ApiResult::ok($userBasicRes, UserBasicRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [GET] /api/web/user/(:num)/privacy
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function privacy(int $userSeq): void
    {
        try {
            $userPrivacyRes = $this->userModule->userPrivacy($userSeq);

            ApiResult::ok($userPrivacyRes, UserPrivacyRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

      /*
     @Description
     - [GET] /api/web/user/(:num)/office
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function office(int $userSeq): void
    {
        try {
            $userOfficeRes = $this->userModule->userOffice($userSeq);

            ApiResult::ok($userOfficeRes, UserOfficeRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

     /*
     @Description
     - [GET] /api/web/user/(:num)/career
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function career(int $userSeq): void
    {
        try {
            $userCareerRes = $this->userModule->userCareer($userSeq);

            ApiResult::ok($userCareerRes, UserCareerRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [GET] /api/web/user/(:num)/etc
     - Header: Authorization: Bearer {accessToken}
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/404/500 (인증/권한/대상없음/서버)
     */
    public function etc(int $userSeq): void
    {
        try {
            $userEtcRes = $this->userModule->userEtc($userSeq);

            ApiResult::ok($userEtcRes, UserEtcRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [PUT] /api/web/user/(:num)/basic
     - Header: Authorization: Bearer {accessToken}
     - Header: X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Body(JSON): UserBasicReq
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 400/401/404/500 (요청/인증/대상없음/서버)
     */
    public function updateBasic(int $userSeq): void
    {
        try {
            $userBasicReq =  $this->requestQueryDtoMapper->jsonRequestDto(UserBasicReq::class, true);
            $this->userModule->putUserBasic($userSeq, $userBasicReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [PUT] /api/web/user/(:num)/privacy
     - Header: Authorization: Bearer {accessToken}
     - Header: X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Body(JSON): UserPrivacyReq
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 400/401/404/500 (요청/인증/대상없음/서버)
     */
    public function updatePrivacy(int $userSeq): void
    {
        try {
            $userPrivacyReq =  $this->requestQueryDtoMapper->jsonRequestDto(UserPrivacyReq::class, true);
            $this->userModule->putUserPrivacy($userSeq, $userPrivacyReq);

           ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function updateOffice(int $userSeq): void
    {
        try {
            $userOfficeReq =  $this->requestQueryDtoMapper->jsonRequestDto(UserOfficeReq::class, true);
            $this->userModule->putUserOffice($userSeq, $userOfficeReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [PUT] /api/web/user/(:num)/office
     - Header: Authorization: Bearer {accessToken}
     - Header: X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Body(JSON): UserOfficeReq
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 400/401/404/500 (요청/인증/대상없음/서버)
     */
    public function updateCareer(int $userSeq): void
    {
        try {
            $userCareerReq =  $this->requestQueryDtoMapper->jsonRequestDto(UserCareerReq::class, true);
            $this->userModule->putUserCareer($userSeq, $userCareerReq);

           ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

     /*
     @Description
     - [PUT] /api/web/user/(:num)/career
     - Header: Authorization: Bearer {accessToken}
     - Header: X-CSRF-TOKEN: {csrfToken} (cookie: csrf_cookie)
     - Body(JSON): UserCareerReq
     - 성공: 204 No Content (ApiResult::none)
     - 실패: 400/401/404/500 (요청/인증/대상없음/서버)
     */
    public function updateEtc(int $userSeq): void
    {
        try {
            $userEtcReq = $this->requestQueryDtoMapper->jsonRequestDto(UserEtcReq::class, true);
            $this->userModule->putUserEtc($userSeq, $userEtcReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}