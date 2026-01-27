<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;

use App\license\dto\query\LicenseListQuery;
use App\license\dto\response\LicenseListRes;

use App\license\dto\response\UserListLicenseFilterRes;

class LicenseController extends BASE_Controller
{
    public LicenseModule $licenseModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('LicenseModule', null, 'licenseModule');
    }

    /*
     @Description
     - [GET] /api/web/audit/licenses
     - Header: Authorization: Bearer {accessToken}
     - Query: LicenseListQuery (query string)
     - Response: LicenseListRes
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 401/403/500 (인증/권한/서버)
     */
    public function list()
    {
        try {
            $licenseListQuery = $this->requestQueryDtoMapper->queryRequestDto(LicenseListQuery::class);
            $licenseListRes = $this->licenseModule->list($licenseListQuery);

            ApiResult::ok($licenseListRes, LicenseListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
  @Description
  - [GET] /api/web/users/licenseFilter
  - Header: Authorization: Bearer {accessToken}
  - 성공: 200 OK (ApiResult::ok)
  - 실패: 401/403/500 (인증/권한/서버)
  */
    public function licenseFilter()
    {
        try {
            $userListLicenseFilterRes = $this->licenseModule->licenseFilter();

            ApiResult::ok($userListLicenseFilterRes, UserListLicenseFilterRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    // public function create()
    // {
    //     try {
    //         $licenseCreateReq = $this->requestQueryDtoMapper->jsonRequestDto(LicenseCreateReq::class);

    //         ApiResult::none();

    //     } catch (\Throwable $e) {

    //         ApiResult::failThrowable($e, $e->getMessage());
    //     }
    // }
}
