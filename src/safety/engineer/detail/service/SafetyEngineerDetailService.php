<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\service;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\safety\engineer\detail\dto\request\SafetyEngineerReq;
use App\safety\engineer\detail\entity\SafetyEngineerUpdateEntity;
use App\safety\engineer\detail\repository\SafetyEngineerDetailRepository;
use App\safety\engineer\detail\dto\response\SafetyEngineerRes;

final class SafetyEngineerDetailService
{
    private SafetyEngineerDetailRepository $safetyEngineerDetailRepository;

    public function __construct($safetyEngineerDetailRepository)
    {
        $this->safetyEngineerDetailRepository = $safetyEngineerDetailRepository;
    }

    public function getDetail(int $userSeq): SafetyEngineerRes
    {
        if ($userSeq <= 0) {
            throw ApiException::badRequest(
                'INVALID_USER_SEQ',
                ApiErrorCode::VALIDATION_FAILED
            );
        }

        $row = $this->safetyEngineerDetailRepository->findDetailRow($userSeq);

        if ($row === null) {
            throw ApiException::badRequest(
                'INVALID_ROW',
                ApiErrorCode::VALIDATION_FAILED
            );
        }

        return SafetyEngineerRes::fromRow($row);
    }

    public function updateDetail(int $userSeq, SafetyEngineerReq $req): void
    {
        if ($userSeq <= 0) {
            throw ApiException::badRequest(
                'INVALID_USER_SEQ',
                ApiErrorCode::VALIDATION_FAILED
            );
        }

        // request → entity 변환
        $entity = SafetyEngineerUpdateEntity::fromReq($req);

        // 실제 저장 로직
        $this->safetyEngineerDetailRepository->updateDetail($userSeq, $entity);
    }
}
