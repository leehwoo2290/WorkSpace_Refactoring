<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;
use App\license\dto\request\LicenseListReq;
use App\license\dto\response\LicenseListRes;

class LicenseController extends BASE_Controller
{
    public LicenseModule $licenseModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('LicenseModule', null, 'licenseModule');        
    }

    public function list()
    {
        /*
        @Description 
        - [GET] /api/web/audit/licenses
        - Header: Authorization: Bearer {accessToken}
        - Query:
        - page: int (default 1)
        - size: int (default 20)
        - searchKeyword: string (업체명/사업자번호/대표자명 부분검색)
        - 성공: 200 OK (ApiResult::ok)
        - 실패: 401/403 (권한/인증)
        */

        try {
            $licenseListReq = $this->requestDtoMapper->queryRequestDto(LicenseListReq::class);
            $licenseListRes = $this->licenseModule->list($licenseListReq);

            ApiResult::ok($licenseListRes, LicenseListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}
