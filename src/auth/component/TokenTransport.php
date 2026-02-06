<?php
declare(strict_types=1);

namespace App\auth\component;

use App\auth\dto\JwtTokenPair;

/**
 * 운영 권장(웹/앱 공통):
 * - AccessToken: Authorization: Bearer 로만 전달(프론트/앱이 저장)
 * - RefreshToken: HttpOnly 쿠키로만 전달(서버 Set-Cookie / 브라우저 자동 전송)
 *
 * (앱이 쿠키를 못 쓰는 환경이면 X-Refresh-Token 헤더 fallback은 남겨둠)
 */
final class TokenTransport
{
    private $input;   // CI_Input
    private $output;  // CI_Output
    private array $jwtConfig;

    public function __construct($ciInput, $ciOutput, array $jwtConfig)
    {
        $this->input = $ciInput;
        $this->output = $ciOutput;
        $this->jwtConfig = $jwtConfig;
    }

    //“이 사용자가 지금 어떤 디바이스(기기/브라우저/앱)에서 온 요청인지 구분할 ID”를 반환.
    public function getDeviceId(): ?string
    {
        $h = $this->input->get_request_header('X-Device-Id', true);
        if ($h)
            return trim((string) $h);

        $c = $this->input->cookie('_device', true);
        if ($c)
            return (string) $c;

        $id = bin2hex(random_bytes(16));
        $this->setCookie('_device', $id, time() + (365 * 24 * 3600), [
            'path' => '/',
            'domain' => $this->jwtConfig['cookie']['domain'] ?? '',
            'secure' => (bool) ($this->jwtConfig['cookie']['secure'] ?? false),
            'httponly' => true,
            'samesite' => $this->jwtConfig['cookie']['samesite'] ?? 'Lax',
        ]);

        return $id;
    }

    public function getAccessToken(): ?string
    {
        // Bearer 우선 (앱)
        $h = $this->input->get_request_header('Authorization', true);
        if (!$h && isset($_SERVER['HTTP_AUTHORIZATION']))
            $h = $_SERVER['HTTP_AUTHORIZATION'];

        if ($h && preg_match('/^\s*Bearer\s+(.+)\s*$/i', (string) $h, $m)) {
            return (string) $m[1];
        }
        return null;
    }

    public function getRefreshToken(): ?string
    {
        // 웹 쿠키
        $name = $this->jwtConfig['cookie']['refresh_name'] ?? 'refreshToken';
        $c = $this->input->cookie($name, true);
        if ($c) return (string)$c;

        $h = $this->input->get_request_header('X-Refresh-Token', true);
        return $h ? trim((string)$h) : null;
    }

    
    /**
     * 토큰 발급/갱신 시:
     * - RefreshToken은 Set-Cookie로 저장
     * - AccessToken은 JSON 응답 body로 내려주는 것을 권장(프론트 저장)
     */
    public function store(JwtTokenPair $pair): void
    {
        $c = $this->jwtConfig['cookie'] ?? [];
        $refreshName = $c['refresh_name'] ?? 'refreshToken';

        $this->setCookie($refreshName, $pair->getRefreshToken(), $pair->getRefreshExp(), $c);

        // (마이그레이션/잔여 쿠키 정리용)
        if (!empty($c['access_name'])) {
            $this->setCookie((string)$c['access_name'], '', time() - 3600, $c);
        }
    }

    public function clear(): void
    {
        $c = $this->jwtConfig['cookie'] ?? [];

        $refreshName = (string)($c['refresh_name'] ?? 'refreshToken');
        $this->clearCookieVariants($refreshName, $c);

        if (!empty($c['access_name'])) {
            $this->clearCookieVariants((string)$c['access_name'], $c);
        }
    }

    private function setCookie(string $name, string $value, int $expTs, array $opt): void
    {
        $options = [
            'expires'  => $expTs,
            'path'     => $opt['path'] ?? '/',
            'secure'   => (bool)($opt['secure'] ?? false),
            'httponly' => (bool)($opt['httponly'] ?? true),
            'samesite' => $opt['samesite'] ?? 'Lax',
        ];

        // domain이 빈 문자열이면 Domain 속성을 아예 생략(브라우저별 Domain= 처리 이슈 방지)
        if (!empty($opt['domain'])) {
            $options['domain'] = (string)$opt['domain'];
        }

        setcookie($name, $value, $options);
    }

    private function clearCookieVariants(string $name, array $opt): void
    {
        // 과거 path/domain 설정이 달라 중복 쿠키가 생겼을 때를 대비해 여러 변형을 같이 만료시킨다.
        $paths = array_values(array_unique(array_filter([
            (string)($opt['path'] ?? '/'),
            '/',
            '/api',
            '/dashboard',
        ], static fn($p) => is_string($p) && $p !== '')));

        $domains = array_values(array_unique([
            (string)($opt['domain'] ?? ''),
            '',
        ]));

        foreach ($paths as $path) {
            foreach ($domains as $domain) {
                $o = $opt;
                $o['path'] = $path;
                $o['domain'] = $domain;
                $this->setCookie($name, '', time() - 3600, $o);
            }
        }
    }
}
