<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\auth\dto\CsrfTokenRes;
use App\auth\service\CsrfService;
use App\common\Exception\ApiException;
use App\auth\ExceptionErrorCode\AuthErrorCode;
use App\common\ApiResult;

class CsrfGuard
{
    private $CI;
    private array $csrfConfig;
    private CsrfService $csrfService;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->config->load('jwt');
        $jwt = (array) $this->CI->config->item('jwt');
        $this->csrfConfig = (array) ($jwt['csrf'] ?? []);

        $allowed = (array) ($this->csrfConfig['allowed_origins'] ?? []);
        $originCheck = (bool) ($this->csrfConfig['origin_check_enabled'] ?? false);

        $this->csrfService = new CsrfService(
            $this->headerName(),
            $this->cookieName(),
            $this->ttl(),
            $allowed,
            $originCheck
        );
    }

    public function enabled(): bool
    {
        return (bool) ($this->csrfConfig['enabled']);
    }

    private function headerName(): string
    {
        return (string) ($this->csrfConfig['header_name']);
    }

    public function cookieName(): string
    {
        return (string) ($this->csrfConfig['cookie_name']);
    }

    private function ttl(): int
    {
        return (int) ($this->csrfConfig['ttl']);
    }

    public function generateToken(): CsrfTokenRes
    {
        if (!$this->enabled()) {
            throw ApiException::badRequest('CSRF_DISABLED', AuthErrorCode::CSRF_FAILED);
        }

        $token = $this->csrfService->generateToken($this->enabled());
        $expTs = time() + $this->ttl();

        $cookieOptions = (array) ($this->csrfConfig['cookie'] ?? []);
        $this->setCookie($this->cookieName(), $token, $expTs, $cookieOptions);

        return new CsrfTokenRes($token, $this->csrfService->headerName(), $this->csrfService->ttl());
    }

    public function validateOrFail(): void
    {
        if (!$this->enabled())
            return;

        $cookieVal = (string) ($this->CI->input->cookie($this->cookieName(), true) ?? '');
        $headerVal = (string) ($this->CI->input->get_request_header($this->headerName(), true) ?? '');

        // $origin = (string) ($this->CI->input->get_request_header('Origin', true) ?? '');
        // $referer = (string) ($this->CI->input->get_request_header('Referer', true) ?? '');

        try {
            // $this->csrfService->validateOrigin($origin, $referer);     // 옵션
            $this->csrfService->validateDoubleSubmit($cookieVal, $headerVal);
        } catch (\Throwable $e) {
            //hook은 controller를 통하지 않으므로 Apiresult를 직접 반환
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function requirePostOrFail(): void
    {
        if (!$this->enabled())
            return;

        try {
            $method = strtoupper((string) $this->CI->input->method(TRUE)); // CI3
            $this->csrfService->requirePost($method);
        } catch (\Throwable $e) {
            //hook은 controller를 통하지 않으므로 Apiresult를 직접 반환
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    private function setCookie(string $name, string $value, int $expTs, array $opt): void
    {
        setcookie($name, $value, [
            'expires' => $expTs,
            'path' => $opt['path'] ?? '/',
            'domain' => $opt['domain'] ?? '',
            'secure' => (bool) ($opt['secure'] ?? false),
            'httponly' => (bool) ($opt['httponly'] ?? true),
            'samesite' => $opt['samesite'] ?? 'Lax',
        ]);
    }
}
