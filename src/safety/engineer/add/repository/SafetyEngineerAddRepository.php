<?php
declare(strict_types=1);

namespace App\safety\engineer\add\repository;

use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\repository\BaseRepository;
use App\common\repository\WritePayloadBuilder;

use App\safety\engineer\add\entity\SafetyEngineerAddEntity;
use App\safety\engineer\add\repository\preset\SafetyEngineerUserByEmailRowPreset;
use App\safety\engineer\add\repository\preset\SafetyEngineerActiveExistsByUserSeqPreset;

final class SafetyEngineerAddRepository extends BaseRepository
{
    private const T_ENGINEER = 'tb_safety_engineer';

    private WritePayloadBuilder $builder;

    /** @param mixed $db */
    public function __construct($db)
    {
        parent::__construct($db);
        $this->builder = new WritePayloadBuilder();
    }

    /** @return object|null row: { user_seq, status, license_seq } */
    public function findUserRowByEmail(string $email): ?object
    {
        return $this->rowByPreset(new SafetyEngineerUserByEmailRowPreset(), $email);
    }

    public function existsActiveEngineerByUserSeq(int $userSeq): bool
    {
        return $this->existsByPreset(new SafetyEngineerActiveExistsByUserSeqPreset(), $userSeq);
    }

    public function insert(SafetyEngineerAddEntity $entity): int
    {
        $payload = $entity->toDbPayload($this->builder);

        // UNIQUE(user_seq) 같은 제약이 있다면 dupMessage로도 방어 가능
        return $this->insertOrThrow(
            self::T_ENGINEER,
            $payload,
            'ENGINEER_ALREADY_EXISTS',
            ApiErrorCode::DB_DUPLICATE_KEY
        );
    }
}
