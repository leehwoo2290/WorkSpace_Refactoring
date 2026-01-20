<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 중앙 권한 정책
 * - methods: ['GET','POST'] 또는 ['*']
 * - pattern: URI 패턴(와일드카드 * 지원). 예: 'api/web/admin/*'
 * - auth: true면 로그인 필요
 * - any_of: roles 중 하나라도 있으면 OK
 * - all_of: roles 전부 있어야 OK
 * - public: auth=false면 공개
 */
$config['access_policy'] = [
    // ===== 공개 =====
    ['methods' => ['*'],   'pattern' => 'api/web/auth/login',  'auth' => false],
    ['methods' => ['*'],   'pattern' => 'api/web/auth/refresh','auth' => false], // refresh는 보통 로그인 없이도 시도 가능
    ['methods' => ['*'],   'pattern' => 'api/web/public/*',    'auth' => false],

    // ===== 로그인 필요(roles 제한 없음) =====
    ['methods' => ['GET'], 'pattern' => 'api/web/auth/me',     'auth' => true],
    ['methods' => ['POST'],'pattern' => 'api/web/auth/logout', 'auth' => true],
    ['methods' => ['*'],   'pattern' => 'api/web/user/*',      'auth' => true],

    // ===== 관리자 영역 =====
    ['methods' => ['*'],   'pattern' => 'api/web/admin/*',     'auth' => true, 'any_of' => ['ADMIN','SUPERADMIN']],

    // 필요하면 더 추가...
];

// 룰이 매칭되지 않을 때 기본 동작
$config['access_policy_default'] = [
    'auth' => false, // false면 기본 공개 / true면 기본 로그인 필요(화이트리스트 방식)
];
