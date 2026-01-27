<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['jwt'] = [
    // Spring JwtProperties 대응
    'access_secret'  => getenv('JWT_ACCESS_SECRET')  ?: 'CHANGE_ME_ACCESS_SECRET_32B_PLUS',
    'refresh_secret' => getenv('JWT_REFRESH_SECRET') ?: 'CHANGE_ME_REFRESH_SECRET_32B_PLUS',

    // ms가 아니라 seconds로 관리(내부에서 ms로 바꾸지 않음)
    'access_ttl'  => 10,//15 * 60,        // 15분
    'refresh_ttl' => 14 * 24 * 3600, // 14일 (firstIssuedAt 기준 고정)

    // 웹 쿠키 옵션
    'cookie' => [
        'access_name'  => 'accessToken',
        'refresh_name' => 'refreshToken',
        'path'         => '/',
        'secure'       => false,   // 로컬 개발이면 false로
        'httponly'     => true,
        'samesite'     => 'Lax',  // 웹이면 CSRF 고려해서 보통 Lax/Strict
        'domain'       => '',     // 필요 시 지정
    ],

     'csrf' => [
        'enabled'     => true,

        // CI4 친화: 프론트가 헤더로 보내는 이름을 X-CSRF-TOKEN으로 고정
        'header_name' => 'X-CSRF-TOKEN',

        // 서버가 저장할 쿠키 이름(도메인 미정이라 일단 단순하게)
        'cookie_name' => 'csrf_cookie',

        // 토큰 수명(초)
        'ttl' => 7200, // 2시간

        // 쿠키 옵션(운영에서 HTTPS/도메인 확정되면 여기만 바꾸면 됨)
        'cookie' => [
            'path'     => '/',    // 필요하면 '/api/' 또는 '/api/authentication/'로 좁혀도 됨
            'domain'   => '',     // 예: '.example.com' (확정되면 설정)
            'secure'   => false,  // 운영(HTTPS)에서는 true 권장
            'httponly' => true,   // JS가 쿠키를 못 읽게(더 안전). 토큰은 /csrf 응답으로 받음
            'samesite' => 'Lax',  // 크로스도메인이면 'None' + secure=true 필요
        ],

        // 도메인 확정 전에는 비워두고, 확정 후에는 허용 Origin을 넣으면 더 강력함
        'allowed_origins' => [
            // 'https://www.example.com',
            // 'https://app.example.com',
        ],
    ],
];
