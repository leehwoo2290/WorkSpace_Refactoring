<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\repository;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\repository\BaseRepository;
use App\common\repository\WritePayloadBuilder;
use App\safety\engineer\detail\entity\SafetyEngineerUpdateEntity;
use App\safety\engineer\detail\repository\preset\SafetyEngineerDetailRowPreset;

final class SafetyEngineerDetailRepository extends BaseRepository
{
    private const TABLE_USER = 'tb_user';
    private const TABLE_PRIVACY = 'tb_user_privacy';
    private const TABLE_ENGINEER = 'tb_safety_engineer';

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function findDetailRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new SafetyEngineerDetailRowPreset(), $userSeq);
    }

    /**
     * 전제:
     * - tb_user: 반드시 존재(UPDATE)
     * - tb_safety_engineer: 반드시 존재(최신 1건 UPDATE)
     * - tb_user_privacy: 없을 수 있음(UPSERT)
     */
    public function updateDetail(int $userSeq, SafetyEngineerUpdateEntity $entity): void
    {
        $b = new WritePayloadBuilder();

        // 1) tb_user (항상 존재)
        $userData = $entity->toUserDbPayload($b);
        if (!empty($userData)) {
            $this->updateWhereOrThrow(
                self::TABLE_USER,
                $userData,
                ['seq' => $userSeq],
                'UPDATE_USER_FAILED',
                ApiErrorCode::DB_WRITE_FAILED
            );
        }

        // 2) tb_user_privacy (없을 수 있음 → user_seq PK upsert)
        $privacyData = $entity->toPrivacyDbPayload($b);
        if (!empty($privacyData)) {
            $this->upsertByUserSeq(self::TABLE_PRIVACY, $userSeq, $privacyData);
        }

        // 3) tb_safety_engineer (항상 존재 가정 + 중복 가능 구조 → 최신 seq를 찾아 seq로 update)
        $engineerData = $entity->toEngineerDbPayload($b);
        if (!empty($engineerData)) {
            $engineerSeq = $this->findLatestEngineerSeqOrFail($userSeq);

            $this->updateWhereOrThrow(
                self::TABLE_ENGINEER,
                $engineerData,
                ['seq' => $engineerSeq],
                'UPDATE_SAFETY_ENGINEER_FAILED',
                ApiErrorCode::DB_WRITE_FAILED
            );
        }
    }

    //user_seq이 unique가 아니라 중복된 값이 모두 바뀔 위험이 있으므로 최신 값만 변경한다.
    private function findLatestEngineerSeqOrFail(int $userSeq): int
    {
        $row = $this->rowWith(function () use ($userSeq): void {
            $this->db->select('seq', false);
            $this->db->from(self::TABLE_ENGINEER);
            $this->db->where('user_seq', $userSeq);
            $this->db->where('deleted', 'N');
            $this->db->order_by('seq', 'DESC');
            $this->db->limit(1);
        });

        if (!$row || !isset($row->seq)) {
            //엔지니어는 무조건 존재해야함 (추가 한 상태니까 수정이 가능)
            throw ApiException::internal(
                'SAFETY_ENGINEER_ROW_NOT_FOUND',
                ApiErrorCode::INTERNAL_ERROR
            );
        }

        return (int)$row->seq;
    }
}
