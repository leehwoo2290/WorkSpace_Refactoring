<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CorsHook
{
    public function run(): void
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';

        // 허용할 프론트 Origin들
        $allowed = [
            'http://localhost:3001',
            'http://127.0.0.1:3001',
            'http://192.168.0.50:3001',
            'http://192.168.0.50.nip.io:3001',
            // 프론트를 IP로 접속할 수도 있으면 이것도 추가(쿠키 SameSite 이슈 줄어듦)
            'http://192.168.0.136:3001',
        ];

        if ($origin !== '' && in_array($origin, $allowed, true)) {
            header("Access-Control-Allow-Origin: {$origin}");
            header("Vary: Origin");

            // 쿠키(refreshToken/csrf_cookie) 쓰는 구조면 사실상 필수
            header("Access-Control-Allow-Credentials: true");

            // 프론트가 보낼 헤더들(Authorization, CSRF 등)
            header("Access-Control-Allow-Headers: Content-Type, Authorization, X-CSRF-TOKEN");

            header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
            header("Access-Control-Max-Age: 86400");
        }

        // preflight는 여기서 바로 끝내야 함(안 그러면 브라우저가 막음)
        if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
            http_response_code(204);
            exit;
        }
    }
}
