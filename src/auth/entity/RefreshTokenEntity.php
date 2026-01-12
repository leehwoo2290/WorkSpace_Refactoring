<?php
declare(strict_types=1);

namespace App\auth\entity;

use DateTimeImmutable;

final class RefreshTokenEntity
{
    private ?int $id;
    private int $userSeq;
    private string $tokenId;         // JWT jti
    private string $hashedToken;     // sha256(token)->bcrypt
    private DateTimeImmutable $expiresAt;
    private ?DateTimeImmutable $replacedAt;
    private DateTimeImmutable $firstIssuedAt;
    private int $tokenVersion;
    private ?string $deviceId;

    private function __construct(
        ?int $id,
        int $userSeq,
        string $tokenId,
        string $hashedToken,
        DateTimeImmutable $expiresAt,
        ?DateTimeImmutable $replacedAt,
        DateTimeImmutable $firstIssuedAt,
        int $tokenVersion,
        ?string $deviceId
    ) {
        $this->id = $id;
        $this->userSeq = $userSeq;
        $this->tokenId = $tokenId;
        $this->hashedToken = $hashedToken;
        $this->expiresAt = $expiresAt;
        $this->replacedAt = $replacedAt;
        $this->firstIssuedAt = $firstIssuedAt;
        $this->tokenVersion = $tokenVersion;
        $this->deviceId = $deviceId;
    }

    public static function createToken(
        int $userSeq,
        string $tokenId,
        string $hashedToken,
        DateTimeImmutable $firstIssuedAt,
        DateTimeImmutable $expiresAt,
        int $tokenVersion,
        ?string $deviceId = null
    ): self {
        return new self(null, $userSeq, $tokenId, $hashedToken, $expiresAt, null, $firstIssuedAt, $tokenVersion, $deviceId);
    }

    public static function reconstitute(
        int $id,
        int $userSeq,
        string $tokenId,
        string $hashedToken,
        DateTimeImmutable $expiresAt,
        ?DateTimeImmutable $replacedAt,
        DateTimeImmutable $firstIssuedAt,
        int $tokenVersion,
        ?string $deviceId
    ): self {
        return new self($id, $userSeq, $tokenId, $hashedToken, $expiresAt, $replacedAt, $firstIssuedAt, $tokenVersion, $deviceId);
    }

    public function isExpired(DateTimeImmutable $now): bool
    {
        return $this->expiresAt->getTimestamp() < $now->getTimestamp();
    }

    public function isReplaced(): bool
    {
        return $this->replacedAt !== null;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getUserSeq(): int { return $this->userSeq; }
    public function getTokenId(): string { return $this->tokenId; }
    public function getHashedToken(): string { return $this->hashedToken; }
    public function getExpiresAt(): DateTimeImmutable { return $this->expiresAt; }
    public function getReplacedAt(): ?DateTimeImmutable { return $this->replacedAt; }
    public function getFirstIssuedAt(): DateTimeImmutable { return $this->firstIssuedAt; }
    public function getTokenVersion(): int { return $this->tokenVersion; }
    public function getDeviceId(): ?string { return $this->deviceId; }
}
