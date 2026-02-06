<?php
declare(strict_types=1);

namespace App\safety\project\add\service;

use App\safety\common\SafetyEnumMaps;
use App\safety\project\add\dto\request\SafetyProjectAddReq;
use App\safety\project\add\entity\SafetyProjectAddEntity;
use App\safety\project\add\repository\SafetyProjectAddRepository;

use EnumMapper;
use App\common\exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;

final class SafetyProjectAddService
{
    private SafetyProjectAddRepository $safetyProjectAddRepository;

    public function __construct(SafetyProjectAddRepository $safetyProjectAddRepository)
    {
        $this->safetyProjectAddRepository = $safetyProjectAddRepository;
    }

    public function add(int $userSeq, SafetyProjectAddReq $req): void
    {
        // log_message('error', 'SafetyProjectAddService::add ENTER ' . json_encode([
        //     'userSeq' => $userSeq,
        //     'licenseSeq' => $req->licenseSeq(),
        //     'checkType' => $req->checkType(),
        //     'placeName' => $req->placeName(),
        //     'inspectionBeginDate' => $req->inspectionBeginDate(),
        //     'inspectionEndDate' => $req->inspectionEndDate(),
        //     'fieldBeginDate' => $req->fieldBeginDate(),
        //     'fieldEndDate' => $req->fieldEndDate(),
        // ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        // 필수 검증(화면 기준)
        if ($userSeq <= 0) {
             log_message('error', 'SafetyProjectAddService::add UNAUTHORIZED because userSeq<=0 userSeq=' . $userSeq);
            throw ApiException::unauthorized('UNAUTHORIZED', ApiErrorCode::UNAUTHORIZED);
        }
        if ($req->licenseSeq() <= 0) {
             log_message('error', 'SafetyProjectAddService::add VALIDATION_FAILED licenseSeq' . $userSeq);
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }
        if (trim($req->checkType()) === '' || trim($req->placeName()) === '') {
             log_message('error', 'SafetyProjectAddService::add VALIDATION_FAILED checkType' . $userSeq);
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }
        if (!$this->isDate($req->inspectionBeginDate()) || !$this->isDate($req->inspectionEndDate())) {
             log_message('error', 'SafetyProjectAddService::add badRequest inspectionBeginDate' . $userSeq);
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }

        // checkType enum 매핑(프로젝트 패턴 그대로)
        $maps = SafetyEnumMaps::maps();
        $dbCheckType = EnumMapper::map($maps, 'safety_checkType', $req->checkType());

        $entity = new SafetyProjectAddEntity(
            $userSeq,
            $req->licenseSeq(),
            $dbCheckType,
            $req->placeName(),
            $req->facilityNum() ?: null,
            $req->uniqueNum() ?: null,
            $req->buildingId() ?: null,
            $req->inspectionBeginDate(),
            $req->inspectionEndDate(),
            $req->fieldBeginDate() ?: null,
            $req->fieldEndDate() ?: null,
            $req->remark() ?: null
        );

        $this->safetyProjectAddRepository->insert($entity);
    }

    private function isDate(string $v): bool
    {
        return preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($v)) === 1;
    }
}
