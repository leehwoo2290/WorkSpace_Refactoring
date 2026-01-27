<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;
use App\auth\dto\response\CsrfTokenRes;

class CsrfController extends BASE_Controller
{
    public CsrfGuard $csrfGuard;

    /*
     @Description
     - [GET] /api/web/auth/csrf
     - NOTE: application/config/routes.php에서 현재 주석처리됨 (활성화 필요)
     - Response: CsrfTokenRes
     - Set-Cookie: csrf_cookie (또는 CsrfGuard 설정값)
     - 성공: 200 OK (ApiResult::ok)
     - 실패: 500 (서버)
     */
    public function csrf()
    {
        try {
            $this->load->library('CsrfGuard', null, 'csrfGuard');
            $csrfTokenRes = $this->csrfGuard->generateToken();

            ApiResult::ok($csrfTokenRes, CsrfTokenRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }

    }
}
