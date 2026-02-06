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
    // Auth
    ['methods' => ['POST'], 'pattern' => 'api/web/auth/login', 'auth' => false],
    ['methods' => ['POST'], 'pattern' => 'api/web/auth/refresh', 'auth' => false],

    ['methods' => ['GET'], 'pattern' => 'api/web/licenseFilter', 'auth' => false],

    // ===== 로그인 필요(roles 제한 없음) =====

    //Auth
    ['methods' => ['POST'], 'pattern' => 'api/web/auth/logout', 'auth' => true],

    // Users
    ['methods' => ['GET'], 'pattern' => 'api/web/users', 'auth' => true],
    ['methods' => ['POST'], 'pattern' => 'api/web/user', 'auth' => true],

    // UserDetail (GET)
    ['methods' => ['GET'], 'pattern' => 'api/web/user/*/basic', 'auth' => true],
    ['methods' => ['GET'], 'pattern' => 'api/web/user/*/privacy', 'auth' => true],
    ['methods' => ['GET'], 'pattern' => 'api/web/user/*/office', 'auth' => true],
    ['methods' => ['GET'], 'pattern' => 'api/web/user/*/etc', 'auth' => true],
    ['methods' => ['GET'], 'pattern' => 'api/web/user/*/career', 'auth' => true],

    // UserDetail (PUT)
    ['methods' => ['PUT'], 'pattern' => 'api/web/user/*/basic', 'auth' => true],
    ['methods' => ['PUT'], 'pattern' => 'api/web/user/*/privacy', 'auth' => true],
    ['methods' => ['PUT'], 'pattern' => 'api/web/user/*/office', 'auth' => true],
    ['methods' => ['PUT'], 'pattern' => 'api/web/user/*/career', 'auth' => true],
    ['methods' => ['PUT'], 'pattern' => 'api/web/user/*/etc', 'auth' => true],

    // Login logs
    //['methods' => ['GET'], 'pattern' => 'api/web/login-logs', 'auth' => true],

    //auth
    ['methods' => ['GET'], 'pattern' => 'api/web/auth/me', 'auth' => true],
    // License
    ['methods' => ['GET'], 'pattern' => 'api/web/licenses', 'auth' => true],

    // SafetyProject
    ['methods' => ['GET'], 'pattern' => 'api/web/safety', 'auth' => false],
    ['methods' => ['POST'], 'pattern' => 'api/web/safety', 'auth' => true],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/autocomplete', 'auth' => true],

    // SafetyProject detail (GET)
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/*/field-info', 'auth' => false],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/*/schedule', 'auth' => false],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/*/schedule/assigned-filter', 'auth' => false],

    ['methods' => ['GET'], 'pattern' => 'api/web/safety/facility-remark-filter', 'auth' => false],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/facility-type-filter', 'auth' => false],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/contract-manager-filter', 'auth' => false],

    // SafetyEngineer
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/engineers', 'auth' => false],
    ['methods' => ['POST'], 'pattern' => 'api/web/safety/engineer', 'auth' => false],
    ['methods' => ['GET'], 'pattern' => 'api/web/safety/engineer/*', 'auth' => false],
    ['methods' => ['PUT'], 'pattern' => 'api/web/safety/engineer/*', 'auth' => false],

    // SafetyEngineerFilter
    ['methods' => ['GET'], 'pattern' => 'api/web/safetyEngineerFilter', 'auth' => true],

    // ===== 관리자 영역 =====
    ['methods' => ['*'], 'pattern' => 'api/web/admin/*', 'auth' => true, 'any_of' => ['Admin', 'SuperAdmin']],
    ['methods' => ['GET'], 'pattern' => 'api/web/login-logs', 'auth' => true, 'any_of' => ['Admin', 'SuperAdmin']],

    // 필요하면 더 추가...
];

// 룰이 매칭되지 않을 때 기본 동작
$config['access_policy_default'] = [
    'auth' => true, // false면 기본 공개 / true면 기본 로그인 필요(화이트리스트 방식)
];
