<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;
use App\common\ExceptionErrorCode\ApiErrorCode;

// 공개면 통과

// 로그인 필요인데 미인증이면 401

// 로그인은 됐는데 role 부족이면 403
final class AccessGuard
{
    private $CI;
    private $policy;
    private $default;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->config('access_policy', true);

        $this->policy  = (array) $this->CI->config->item('access_policy', 'access_policy');
        $this->default = (array) $this->CI->config->item('access_policy_default', 'access_policy');
    }

    public function check(string $method, string $uri, $userContext): void
    {
        // CORS preflight는 보통 통과
        if ($method === 'OPTIONS') return;

        $rule = $this->findRule($method, $uri);
        if ($rule === null) {
            $rule = $this->defaultRule();
        }

        $needAuth = !empty($rule['auth']);

        if ($needAuth) {
            if (!$userContext || !method_exists($userContext, 'isAuthenticated') || !$userContext->isAuthenticated()) {
                // 401
                ApiResult::fail(ApiErrorCode::UNAUTHORIZED, 'UNAUTHORIZED', 401);
                return;
            }

            $roles = [];
            if (method_exists($userContext, 'roles')) {
                $roles = (array) $userContext->roles();
            }

            $anyOf = isset($rule['any_of']) ? (array)$rule['any_of'] : [];
            $allOf = isset($rule['all_of']) ? (array)$rule['all_of'] : [];

            if (!empty($allOf) && !$this->hasAll($roles, $allOf)) {
                ApiResult::fail(ApiErrorCode::FORBIDDEN_ALL_OF_ROLES, 'FORBIDDEN_ALL_OF_ROLES', 403);
                return;
            }
            if (!empty($anyOf) && !$this->hasAny($roles, $anyOf)) {
                ApiResult::fail(ApiErrorCode::FORBIDDEN_ANY_OF_ROLES, 'FORBIDDEN_ANY_OF_ROLES', 403);
                return;
            }
        }

        // 통과
    }

    private function defaultRule(): array
    {
        return [
            'auth' => !empty($this->default['auth']),
            'any_of' => [],
            'all_of' => [],
        ];
    }

    private function findRule(string $method, string $uri): ?array
    {
        $method = strtoupper($method);
        $uri = trim($uri, '/');

        foreach ($this->policy as $r) {
            $methods = array_map('strtoupper', (array)($r['methods'] ?? ['*']));
            $pattern = trim((string)($r['pattern'] ?? ''), '/');
            if ($pattern === '') continue;

            if (!in_array('*', $methods, true) && !in_array($method, $methods, true)) {
                continue;
            }
            if (!$this->matchPattern($pattern, $uri)) {
                continue;
            }
            return $r;
        }
        return null;
    }

    private function matchPattern(string $pattern, string $uri): bool
    {
        // '*' 와일드카드 지원
        $re = preg_quote($pattern, '/');
        $re = str_replace('\*', '.*', $re);
        return (bool) preg_match('/^' . $re . '$/i', $uri);
    }

    private function hasAny(array $roles, array $need): bool
    {
        foreach ($need as $r) {
            if (in_array($r, $roles, true)) return true;
        }
        return false;
    }

    private function hasAll(array $roles, array $need): bool
    {
        foreach ($need as $r) {
            if (!in_array($r, $roles, true)) return false;
        }
        return true;
    }
}
