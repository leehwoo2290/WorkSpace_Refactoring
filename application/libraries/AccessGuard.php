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

        $this->policy = (array) $this->CI->config->item('access_policy', 'access_policy');
        $this->default = (array) $this->CI->config->item('access_policy_default', 'access_policy');
    }

    public function check(string $method, string $uri, $userContext): void
    {
        // CORS preflight는 보통 통과
        if ($method === 'OPTIONS')
            return;

        // (1) 들어오는 요청 / uri 확인
        // log_message('error', 'GUARD_IN ' . json_encode([
        //     'method' => $method,
        //     'uri' => $uri,
        //     'request_uri' => $_SERVER['REQUEST_URI'] ?? '',
        //     'query' => $_SERVER['QUERY_STRING'] ?? '',
        // ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        $rule = $this->findRule($method, $uri);

        // (2) 어떤 룰이 매칭됐는지 확인
        // log_message('error', 'GUARD_RULE ' . json_encode([
        //     'method' => $method,
        //     'uri' => $uri,
        //     'matched' => $rule ? ($rule['pattern'] ?? null) : null,
        //     'auth' => $rule ? ($rule['auth'] ?? null) : null,
        // ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        if ($rule === null) {
            $rule = $this->defaultRule();
            // log_message('error', 'GUARD_DEFAULT_APPLIED ' . json_encode([
            //     'default_auth' => $rule['auth'] ?? null,
            // ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        }

        $needAuth = !empty($rule['auth']);

        if ($needAuth) {
            if (!$userContext || !method_exists($userContext, 'isAuthenticated') || !$userContext->isAuthenticated()) {
                // 401
                // log_message('error', 'GUARD_DENY_401 ' . json_encode([
                //     'method' => $method,
                //     'uri' => $uri,
                //     'matched' => $rule['pattern'] ?? null,
                //     'needAuth' => $needAuth,
                // ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                ApiResult::fail(ApiErrorCode::UNAUTHORIZED, 'UNAUTHORIZED', 401);
                return;
            }

            $roles = [];
            if (method_exists($userContext, 'roles')) {
                $roles = (array) $userContext->roles();
            }

            $anyOf = isset($rule['any_of']) ? (array) $rule['any_of'] : [];
            $allOf = isset($rule['all_of']) ? (array) $rule['all_of'] : [];

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
            $methods = array_map('strtoupper', (array) ($r['methods'] ?? ['*']));
            $pattern = trim((string) ($r['pattern'] ?? ''), '/');
            if ($pattern === '')
                continue;

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
            if (in_array($r, $roles, true))
                return true;
        }
        return false;
    }

    private function hasAll(array $roles, array $need): bool
    {
        foreach ($need as $r) {
            if (!in_array($r, $roles, true))
                return false;
        }
        return true;
    }
}
