<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;

use App\userDetail\dto\response\UserDetailRes;
use App\userDetail\dto\query\UserDetailQuery;

use App\userDetail\dto\response\UserBasicRes;
use App\userDetail\dto\response\UserPrivacyRes;
use App\userDetail\dto\response\UserOfficeRes;
use App\userDetail\dto\response\UserEtcRes;
use App\userDetail\dto\response\UserCareerRes;

use App\userDetail\dto\request\UserBasicReq;
use App\userDetail\dto\request\UserPrivacyReq;
use App\userDetail\dto\request\UserOfficeReq;
use App\userDetail\dto\request\UserEtcReq;
use App\userDetail\dto\request\UserCareerReq;

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

    public function career(int $userSeq): void
    {
        try {
            $userCareerRes = $this->userModule->userCareer($userSeq);

            ApiResult::ok($userCareerRes, UserCareerRes::class);

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