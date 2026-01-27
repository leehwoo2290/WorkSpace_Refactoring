<?php
declare(strict_types=1);

namespace App\auth\repository;

use App\auth\entity\RefreshTokenEntity;

use App\common\repository\BaseRepository;
use App\common\repository\WritePayloadBuilder;

use DateTimeImmutable;


final class RefreshTokenRepository extends BaseRepository
{

    private string $table = 'tb_user_refresh_token';

    // public function transaction(callable $fn)
    // {
    //     $this->db->trans_begin();
    //     try {
    //         $result = $fn();
    //         if ($this->db->trans_status() === false) {
    //             throw new Exception('DB transaction failed');
    //         }
    //         $this->db->trans_commit();
    //         return $result;
    //     } catch (\Throwable $e) {
    //         $this->db->trans_rollback();
    //         throw $e;
    //     }
    // }

    public function findByTokenIdForUpdate(string $tokenId): ?RefreshTokenEntity
    {
        $sql = "SELECT * FROM {$this->table} WHERE token_id = ? FOR UPDATE";
        $q = $this->queryWith($sql, [$tokenId]);

        if ($q->num_rows() <= 0) {
            return null;
        }

        $r = $q->row_array();
        if (!$r) {
            return null;
        }

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
        $builder = new WritePayloadBuilder();
        $data = $token->toDbPayload($builder);

        return $this->insertOrThrow($this->table, $data);
    }

    public function markReplaced(int $id): void
    {
        $this->updateOrThrow(
            $this->table,
            [
                'replaced_date' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
            ],
            function () use ($id): void {
                $this->db->where('seq', $id);
                $this->db->limit(1);
            }
        );
    }

    public function revokeAllByUserSeq(int $userSeq): void
    {
        $this->deleteOrThrow(
            $this->table,
            function () use ($userSeq): void {
                $this->db->where('user_seq', $userSeq);
            }
        );
    }

    public function revokeByTokenId(string $tokenId): void
    {
        $this->deleteOrThrow(
            $this->table,
            function () use ($tokenId): void {
                $this->db->where('token_id', $tokenId);
            }
        );
    }

    /**
     * 로그인 시 “해당 디바이스”의 기존 active refresh를 정리하고 싶을 때 사용.
     * - 멀티 디바이스(웹/앱 동시 로그인)를 허용하려면 user+device 기준으로만 정리하는 것이 안전합니다.
     */
    public function revokeActiveByUserSeqAndDeviceId(int $userSeq, ?string $deviceId): void
    {
        $this->deleteOrThrow(
            $this->table,
            function () use ($userSeq, $deviceId): void {
                $this->db->where('user_seq', $userSeq);

                if ($deviceId !== null) {
                    $this->db->where('device_id', $deviceId);
                } else {
                    $this->db->where('device_id IS NULL', null, false);
                }

                $this->db->where('replaced_date IS NULL', null, false);
            }
        );
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

        // 안전장치: LIMIT 0이면 아무 것도 안 지우니 최소 1로
        $limit = max(1, $limit);

        $sql = "DELETE FROM {$this->table}
            WHERE expires_date < NOW()
               OR (replaced_date IS NOT NULL AND replaced_date < DATE_SUB(NOW(), INTERVAL ? DAY))
            LIMIT ?";

        // BaseRepository::queryWith() 내부에서 resetQuery()를 강제함
        $this->queryWith($sql, [$retention, $limit]);

        return (int) $this->db->affected_rows();
    }
}
