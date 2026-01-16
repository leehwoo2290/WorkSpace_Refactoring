<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\userDetail\dto\response\UserDetailRes;
use App\userDetail\dto\query\UserDetailQuery;

use App\userDetail\dto\response\UserBasicRes;

use App\userDetail\dto\response\UserPrivacyRes;

use App\userDetail\dto\response\UserOfficeRes;

use App\userDetail\dto\response\UserEtcRes;

use App\userDetail\dto\response\UserCareerRes;

class UserDetailController extends BASE_Controller
{

    public UserModule $userModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('UserModule', null, 'userModule');
    }

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

    public function basic(int $userSeq): void
    {
        try {
            $userBasicRes = $this->userModule->userBasic($userSeq);

            ApiResult::ok($userBasicRes, UserBasicRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function privacy(int $userSeq): void
    {
        try {
            $userPrivacyRes = $this->userModule->userPrivacy($userSeq);

            ApiResult::ok($userPrivacyRes, UserPrivacyRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function office(int $userSeq): void
    {
        try {
            $userOfficeRes = $this->userModule->userOffice($userSeq);

            ApiResult::ok($userOfficeRes, UserOfficeRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function etc(int $userSeq): void
    {
        try {
            $userEtcRes = $this->userModule->userEtc($userSeq);

            ApiResult::ok($userEtcRes, UserEtcRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function career(int $userSeq): void
    {
        try {
            $userCareerRes = $this->userModule->userCareer($userSeq);

            ApiResult::ok($userCareerRes, UserCareerRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}