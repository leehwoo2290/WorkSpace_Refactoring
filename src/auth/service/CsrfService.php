<?php
declare(strict_types=1);

namespace App\auth\service;

use App\common\Exception\ApiException;
use App\auth\ExceptionErrorCode\AuthErrorCode;

final class CsrfService
{
    private string $headerName;
    private string $cookieName;
    private int $ttl;
    private array $allowedOrigins;
    private bool $originCheckEnabled;

    public function __construct(
        string $headerName,
        string $cookieName,
        int $ttl,
        array $allowedOrigins = [],
        bool $originCheckEnabled = false
    ) {
        $this->headerName = $headerName;
        $this->cookieName = $cookieName;
        $this->ttl = $ttl;
        $this->allowedOrigins = $allowedOrigins;
        $this->originCheckEnabled = $originCheckEnabled;
    }

    public function headerName(): string
    {
        return $this->headerName;
    }
    public function cookieName(): string
    {
        return $this->cookieName;
    }
    public function ttl(): int
    {
        return $this->ttl;
    }

    /** 토큰 문자열 생성 (쿠키 세팅은 Guard가 담당) */
    public function generateToken(bool $enabled, int $bytes = 32): string
    {
        return bin2hex(random_bytes($bytes));
    }

    /** Double-submit 검증: cookie 값과 header 값이 동일해야 함 */
    public function validateDoubleSubmit(string $cookieVal, string $headerVal): void
    {
        if ($cookieVal === '' || $headerVal === '' || !hash_equals($cookieVal, $headerVal)) {
            throw ApiException::forbidden('CSRF_FAILED', AuthErrorCode::CSRF_FAILED);
        }
    }

    public function requirePost(string $method): void
    {
        if ($method !== 'POST') {
            throw ApiException::forbidden('METHOD_NOT_ALLOWED', AuthErrorCode::VALIDATION_FAILED);
        }
    }
    /** (옵션) Origin/Referer allowlist 검증 */ //추후 추가
    // public function validateOrigin(string $originHeader, string $refererHeader): void
    // {
    //     if (!$this->originCheckEnabled) return;
    //     if (empty($this->allowedOrigins)) return; // allowlist 미정이면 끄는 정책

    //     $origin = $originHeader !== '' ? $originHeader : $this->originFromReferer($refererHeader);
    //     if ($origin === '') return; // 앱/특수 환경에서 비어있을 수 있음(팀 정책)

    //     if (!in_array($origin, $this->allowedOrigins, true)) {
    //         throw ApiException::forbidden('FORBIDDEN_ORIGIN', AuthErrorCode::CSRF_FORBIDDEN_ORIGIN);
    //     }
    // }

    // private function originFromReferer(string $referer): string
    // {
    //     if ($referer === '') return '';
    //     $p = parse_url($referer);
    //     if (empty($p['scheme']) || empty($p['host'])) return '';
    //     $origin = $p['scheme'] . '://' . $p['host'];
    //     if (!empty($p['port'])) $origin .= ':' . $p['port'];
    //     return $origin;
    // }
}
