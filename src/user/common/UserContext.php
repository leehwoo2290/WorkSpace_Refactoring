<?php
declare(strict_types=1);

namespace App\user\common;

/**
 * 요청 스코프(Request-scope) 인증 컨텍스트.
 *
 * - "현재 요청에서 인증된 사용자" 정보를 담는 단순 컨테이너
 * - CI3/CI4 어느 쪽에서도 재사용 가능하도록 프레임워크 의존 없음
 */
final class UserContext
{
    private ?int $userSeq = null;
    /** @var string[] */
    private array $roles = [];

    public function __construct()
    {
        // intentionally empty
    }

    /** 현재 요청을 "인증됨" 상태로 만든다. */
    public function authenticate(int $userSeq, array $roles = []): void
    {
        $this->userSeq = $userSeq;
        $this->roles  = array_values(array_unique(array_map('strval', $roles)));
    }

    /** BC(이전 코드) 호환용 alias */
    public function setAuthenticatedUser(int $userSeq, array $roles = []): void
    {
        $this->authenticate($userSeq, $roles);
    }

    public function clear(): void
    {
        $this->userSeq = null;
        $this->roles  = [];
    }

    public function isAuthenticated(): bool { return $this->userSeq !== null; }
    public function seq(): ?int { return $this->userSeq; }

    /** @return string[] */
    public function roles(): array { return $this->roles; }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->roles, true);
    }
}
