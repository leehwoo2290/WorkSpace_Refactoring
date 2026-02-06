<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\repository;

use App\common\repository\WritePayloadBuilder;
use App\common\ExceptionErrorCode\ApiErrorCode;

use App\common\repository\BaseListRepository;
use App\safety\project\detail\fieldInfo\repository\preset\SafetyProjectFieldInfoRowPreset;
use App\safety\project\detail\fieldInfo\entity\SafetyProjectFieldInfoUpdateEntity;


final class SafetyProjectFieldInfoRepository extends BaseListRepository
{
    private const TABLE_PROJECT = 'tb_safety_project';

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function findRow(int $projectSeq): ?object
    {
        return $this->rowByPreset(new SafetyProjectFieldInfoRowPreset(), $projectSeq);
    }

    /** @param array<string,mixed> $data */
    public function updateFieldInfo(int $projectSeq, SafetyProjectFieldInfoUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

        $this->updateWhereOrThrow(
            self::TABLE_PROJECT,
            $data,
            ['seq' => $projectSeq],
            'UPDATE_PROJECT_FIELDINFO_FAILED',
            ApiErrorCode::DB_UPDATE_FAILED
        );
    }

}
