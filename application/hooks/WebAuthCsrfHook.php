<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WebAuthCsrfHook
{  
    private CsrfGuard $csrfGuard;
    
       public function __construct()
    {
        require_once APPPATH . 'libraries/CsrfGuard.php';
        $this->csrfGuard = new CsrfGuard();
    }

    public function run(): void
    {
        $CI = &get_instance();

        $uri = (string)$CI->uri->uri_string(); // 예: api/authentication/web/login
        if (strpos($uri, 'api/authentication/web/') !== 0) {
            return; // web auth가 아니면 패스
        }

        // /csrf는 예외 (토큰 발급 엔드포인트)
        if ($uri === 'api/authentication/web/csrf') {
            return;
        }

        // web auth에서 보호할 엔드포인트만 지정
        $protected = [
            'api/authentication/web/login',
            'api/authentication/web/refresh',
            'api/authentication/web/logout',
        ];
        if (!in_array($uri, $protected, true)) {
            return;
        }

        $this->csrfGuard->requirePostOrFail();
        $this->csrfGuard->validateOrFail();
    }
}
