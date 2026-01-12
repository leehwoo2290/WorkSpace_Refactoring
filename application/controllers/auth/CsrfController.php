<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;
use App\auth\dto\CsrfTokenRes;

class CsrfController extends BASE_Controller
{
    public CsrfGuard $csrfGuard;

    public function csrf()
    {
        /*
       @Description
       [GET] /api/authentication/web/csrf
       - 목적: CSRF 더블서브밋 토큰 발급
       - 응답: 200 OK (ApiResult::ok)
       - 부가: csrf_cookie 쿠키가 세팅되고,
              응답 data.token 값을 X-CSRF-TOKEN 헤더로 이후 요청에 보냄
        */

        try {
            $this->load->library('CsrfGuard', null, 'csrfGuard');
            $csrfTokenRes = $this->csrfGuard->generateToken();

            ApiResult::ok($csrfTokenRes, CsrfTokenRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }

    }
}
