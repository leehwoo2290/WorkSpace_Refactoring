<?php
declare(strict_types=1);

namespace App\auth\repository;

use App\auth\entity\RefreshTokenEntity;
use DateTimeImmutable;
use Exception;

final class RefreshTokenRepository
{
    private $db; // CI_DB_query_builder
    private string $table = 'tb_user_refresh_token';

    public function __construct($ciDb)
    {
        $this->db = $ciDb;
    }

    public function transaction(callable $fn)
    {
        $this->db->trans_begin();
        try {
            $result = $fn();
            if ($this->db->trans_status() === false) {
                throw new Exception('DB transaction failed');
            }
            $this->db->trans_commit();
            return $result;
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }
    }

    public function findByTokenIdForUpdate(string $tokenId): ?RefreshTokenEntity
    {
        $sql = "SELECT * FROM {$this->table} WHERE token_id = ? FOR UPDATE";
        $q = $this->db->query($sql, [$tokenId]);
        if ($q->num_rows() <= 0)
            return null;

        $r = $q->row_array();

        return RefreshTokenEntity::reconstitute(
            (int) $r['seq'],
            (int) $r['user_seq'],
            (string) $r['token_id'],
            (string) $r['hashed_token'],
            new DateTimeImmutable($r['expires_date']),
            $r['replaced_date'] ? new DateTimeImmutable($r['replaced_date']) : null,
            new DateTimeImmutable($r['first_issued_at']),
            (int) $r['token_version'],
            $r['device_id'] ?? null
        );
    }

    public function insert(RefreshTokenEntity $token): int
    {
        $this->db->insert($this->table, [
            'user_seq' => $token->getUserSeq(),
            'token_id' => $token->getTokenId(),
            'hashed_token' => $token->getHashedToken(),
            'token_version' => $token->getTokenVersion(),
            'first_issued_at' => $token->getFirstIssuedAt()->format('Y-m-d H:i:s'),
            'expires_date' => $token->getExpiresAt()->format('Y-m-d H:i:s'),
            'replaced_date' => null,
            'device_id' => $token->getDeviceId(),
            'reg_time' => date('Y-m-d H:i:s'),
        ]);
        return (int) $this->db->insert_id();
    }

    public function markReplaced(int $id): void
    {
        $this->db->where('seq', $id);
        $this->db->update($this->table, [
            'replaced_date' => date('Y-m-d H:i:s'),
            'update_time' => date('Y-m-d H:i:s'),
        ]);
    }

    public function revokeAllByUserSeq(int $userSeq): void
    {
        $this->db->where('user_seq', $userSeq);
        $this->db->delete($this->table);
    }

    public function revokeByTokenId(string $tokenId): void
    {
        $this->db->where('token_id', $tokenId);
        $this->db->delete($this->table);
    }

    /**
     * 로그인 시 “해당 디바이스”의 기존 active refresh를 정리하고 싶을 때 사용.
     * - 멀티 디바이스(웹/앱 동시 로그인)를 허용하려면 user+device 기준으로만 정리하는 것이 안전합니다.
     */
    public function revokeActiveByUserSeqAndDeviceId(int $userSeq, ?string $deviceId): void
    {
        $this->db->where('user_seq', $userSeq);

        if ($deviceId !== null) {
            $this->db->where('device_id', $deviceId);
        } else {
            // device_id가 없던 구버전 토큰까지 같이 정리(선택)
            $this->db->where('device_id IS NULL', null, false);
        }

        $this->db->where('replaced_date IS NULL', null, false);
        $this->db->delete($this->table);
    }

    /**
     * 운영 필수: 만료/오래된 replaced 토큰 정리(배치/크론)
     * - expired: NOW() 이전
     * - replaced: replaced_date가 오래된 것(기본 7일 보관 후 삭제)
     * 반환: 삭제된 row 수(참고용)
     */
    public function purgeExpiredAndOldReplaced(int $replacedRetentionDays = 7, int $limit = 5000): int
    {
        $retention = max(0, $replacedRetentionDays);

        $sql = "DELETE FROM {$this->table}
                WHERE expires_date < NOW()
                   OR (replaced_date IS NOT NULL AND replaced_date < DATE_SUB(NOW(), INTERVAL ? DAY))
                LIMIT ?";

        $this->db->query($sql, [$retention, $limit]);
        return (int) $this->db->affected_rows();
    }
}
