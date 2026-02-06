<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\service;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\safety\project\detail\fieldInfo\dto\request\SafetyProjectFieldInfoUpdateReq;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFacilityRemarkFilterRes;
use App\safety\project\detail\fieldInfo\dto\SafetyProjectFacilityRemarkFilterItem;
use App\safety\project\detail\fieldInfo\repository\SafetyProjectFieldInfoRepository;
use App\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository;
use App\safety\project\detail\fieldInfo\entity\SafetyProjectFieldInfoUpdateEntity;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectContractManagerFilterRes;
use App\safety\project\detail\fieldInfo\dto\SafetyProjectContractManagerFilterItem;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFacilityTypeFilterRes;
use App\safety\project\detail\fieldInfo\dto\SafetyProjectFacilityTypeFilterItem;
use App\safety\project\detail\fieldInfo\repository\SafetyFacilityTypeRepository;
use App\safety\project\detail\fieldInfo\repository\SafetyContractManagerRepository;
use App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery;

final class SafetyProjectFieldInfoService
{
    private SafetyProjectFieldInfoRepository $safetyProjectFieldInfoRepository;
    private SafetyFacilityRemarkRepository $SafetyFacilityRemarkRepository;
    private SafetyFacilityTypeRepository $safetyFacilityTypeRepository;
    private SafetyContractManagerRepository $safetyContractManagerRepository;

    public function __construct(
        SafetyProjectFieldInfoRepository $safetyProjectFieldInfoRepository,
        SafetyFacilityRemarkRepository $SafetyFacilityRemarkRepository,
        SafetyFacilityTypeRepository $safetyFacilityTypeRepository,
        SafetyContractManagerRepository $safetyContractManagerRepository
    ) {
        $this->safetyProjectFieldInfoRepository = $safetyProjectFieldInfoRepository;
        $this->SafetyFacilityRemarkRepository = $SafetyFacilityRemarkRepository;
        $this->safetyFacilityTypeRepository = $safetyFacilityTypeRepository;
        $this->safetyContractManagerRepository = $safetyContractManagerRepository;
    }

    public function getFieldInfo(int $projectSeq): SafetyProjectFieldInfoRes
    {
        if ($projectSeq <= 0) {
            throw ApiException::badRequest('INVALID_PROJECT_SEQ', ApiErrorCode::VALIDATION_FAILED);
        }

        $row = $this->safetyProjectFieldInfoRepository->findRow($projectSeq);

        if ($row === null) {
            throw ApiException::notFound('SAFETY_PROJECT_NOT_FOUND', ApiErrorCode::RESOURCE_NOT_FOUND);
        }

        return SafetyProjectFieldInfoRes::fromRow($row);
    }

    /**
     * 시설물종류(세부/remark) 필터(드롭다운 옵션)
     *
     * - project.jong 기준으로 tb_safety_facility_remark에서 후보 목록을 가져온다
     * - project.jong == NULL (또는 빈값) 이면 빈 목록(items=[]) 반환
     */

    public function getFacilityRemarkFilter(
        SafetyProjectFieldInfoFacilityRemarkFilterQuery $query
    ): SafetyProjectFacilityRemarkFilterRes {
        $jong = $query->jong();

        // jong이 NULL/빈값이면 "아무것도 안 나오도록"
        if ($jong === null || trim((string) $jong) === '') {
            return new SafetyProjectFacilityRemarkFilterRes([]);
        }

        // jong 기준 후보 목록 조회
        $rows = $this->SafetyFacilityRemarkRepository->findByJong((string) $jong);

        // DTO 변환 (jong는 요청값 그대로 내려줌)
        $items = [];
        foreach ($rows as $r) {
            $remark = isset($r->remark) ? trim((string) $r->remark) : '';
            if ($remark === '') {
                continue;
            }
            $items[] = new SafetyProjectFacilityRemarkFilterItem((string) $jong, $remark);
        }

        return new SafetyProjectFacilityRemarkFilterRes($items);
    }


    /**
     * 시설물 구분(시설물 종류) 필터(드롭다운 옵션)
     *
     * - tb_safety_facility_type 기준
     * - `order` 기준으로 ASC 정렬
     */
    public function getFacilityTypeFilter(): SafetyProjectFacilityTypeFilterRes
    {
        $rows = $this->safetyFacilityTypeRepository->findAll();

        $items = [];
        foreach ($rows as $r) {
            $seq = isset($r->seq) ? (int) $r->seq : 0;
            $name = isset($r->name) ? trim((string) $r->name) : '';
            if ($seq <= 0 || $name === '') {
                continue;
            }
            $items[] = new SafetyProjectFacilityTypeFilterItem($seq, $name);
        }

        return new SafetyProjectFacilityTypeFilterRes($items);
    }

    /**
     * 계약담당자 후보 목록(드롭다운 옵션)
     *
     * 조건
     * - 같은 회사: tb_user.license_seq == (현재 로그인 사용자 license_seq)
     * - role < 3
     * - status == Normal
     * 정렬: 부서명 → 이름
     */
    public function getContractManagerFilter(int $currentUserSeq): SafetyProjectContractManagerFilterRes
    {
        if ($currentUserSeq <= 0) {
            throw ApiException::unauthorized('UNAUTHORIZED', ApiErrorCode::UNAUTHORIZED);
        }

        $licenseSeq = $this->safetyContractManagerRepository->findLicenseSeqByUserSeq($currentUserSeq);

        // 현재 로그인 유저가 license_seq가 없으면 빈 목록
        if ($licenseSeq === null || $licenseSeq <= 0) {
            return new SafetyProjectContractManagerFilterRes([]);
        }

        $rows = $this->safetyContractManagerRepository->findCandidatesByLicenseSeq($licenseSeq);

        $items = [];
        foreach ($rows as $r) {
            $userSeq = isset($r->userSeq) ? (int) $r->userSeq : 0;
            $name = isset($r->name) ? trim((string) $r->name) : '';
            $departmentName = isset($r->departmentName) ? trim((string) $r->departmentName) : null;
            $position = isset($r->position) ? trim((string) $r->position) : null;

            if ($userSeq <= 0 || $name === '') {
                continue;
            }

            $items[] = new SafetyProjectContractManagerFilterItem($userSeq, $name, $departmentName, $position);
        }

        return new SafetyProjectContractManagerFilterRes($items);
    }
    public function putFieldInfo(int $projectSeq, SafetyProjectFieldInfoUpdateReq $safetyProjectFieldInfoUpdateReq): void
    {
        $entity = SafetyProjectFieldInfoUpdateEntity::fromReq($safetyProjectFieldInfoUpdateReq);
        $this->safetyProjectFieldInfoRepository->updateFieldInfo($projectSeq, $entity);
    }
}

