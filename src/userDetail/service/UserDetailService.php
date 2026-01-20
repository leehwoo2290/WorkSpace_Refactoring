<?php
declare(strict_types=1);

namespace App\userDetail\service;

use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\Exception\ApiException;
use App\userDetail\dto\query\UserDetailQuery;
use App\userDetail\dto\response\UserBasicRes;
use App\userDetail\dto\response\UserDetailRes;
use App\userDetail\dto\response\UserOfficeRes;
use App\userDetail\dto\response\UserPermissionsRes;
use App\userDetail\dto\response\UserPrivacyRes;
use App\userDetail\dto\response\UserEtcRes;
use App\userDetail\dto\response\UserCareerRes;
use App\userDetail\repository\UserDetailRepository;

final class UserDetailService
{
    private UserDetailRepository $userDetailRepository;

    public function __construct(UserDetailRepository $userDetailRepository)
    {
        $this->userDetailRepository = $userDetailRepository;
    }


    private function checkUserExists(int $userSeq): ?bool
    {
        return $this->userDetailRepository->existsUser($userSeq) ? true : null;
    }

    public function userDetail(UserDetailQuery $query): ?UserDetailRes
    {
        $row = $this->userDetailRepository->findDetailRow($query->userSeq());

        /** 없으면 null 반환(Controller에서 404 처리) */
        if ($row === null)
            return null;

        $basic = new UserBasicRes(
            $row->licenseName ?? null,
            $row->name ?? null,
            $row->role ?? null,
            $row->status ?? null,
            $row->email ?? null,
            $row->avatarFile ?? null,
            $row->remark ?? null,
            $this->permissionsFromConfig($row->configJson ?? null)
        );

        $office = null;
        $privacy = null;
        $career = null;
        $etc = null;

        // etc/career: 테이블/필드 확정되면 채우기 (지금은 null 허용)
        return new UserDetailRes(
            $basic,
            $office,
            $etc,
            $privacy,
            $career,
        );
    }

    public function userBasic(int $userSeq): ?UserBasicRes
    {
        if ($userSeq < 0) {
            ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findBasicRow($userSeq);
        if ($row === null)
            return null;

        $basic = new UserBasicRes();
        $basic->licenseName = $row->licenseName ?? null;
        $basic->name = $row->name ?? null;
        $basic->role = $row->role ?? null;
        $basic->status = $row->status ?? null;
        $basic->email = $row->email ?? null;
        $basic->avatarFile = $row->avatarFile ?? null;
        $basic->remark = $row->remark ?? null;

        $basic->permissions = $this->permissionsFromConfig($row->configJson ?? null);

        return $basic;
    }

    /** privacy row가 없으면 ok(null) 내려주려고 ?UserPrivacyRes 반환 */
    public function userPrivacy(int $userSeq): ?UserPrivacyRes
    {
        if ($userSeq <= 0) {
            throw ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null) {
            return null;
        }

        $row = $this->userDetailRepository->findPrivacyRow($userSeq);

        // user는 있는데 privacy row가 없을 수 있음
        if ($row === null) {
            $privacy = new UserPrivacyRes();
            $privacy->foreignYn = 'N'; // 기본 내국인 처리(원하면 null로 둬도 됨)
            return $privacy;
        }

        $privacy = new UserPrivacyRes();

        $privacy->foreignYn = $row->foreignYn ?? 'N';
        $privacy->juminNum = $row->juminNum ?? null;
        $privacy->birthday = $row->birthday ?? null;
        $privacy->phoneNumber = $row->phoneNumber ?? null;
        $privacy->emerNum1 = $row->emerNum1 ?? null;
        $privacy->emerNum2 = $row->emerNum2 ?? null;
        $privacy->addr = $row->addr ?? null;

        $privacy->educationLevel = $row->educationLevel ?? null;
        $privacy->educationMajor = $row->educationMajor ?? null;

        $privacy->familyCnt = isset($row->familyCnt) ? (int) $row->familyCnt : null;

        $privacy->carYn = $row->carYn ?? null;          // jsonSerialize에서 carOwned로 나감
        $privacy->carNumber = $row->carNumber ?? null;
        $privacy->carTax = isset($row->carTax) ? (int) $row->carTax : null; // jsonSerialize에서 suwonCarReg
        $privacy->carModel = $row->carModel ?? null;

        $privacy->religion = $row->religion ?? null;
        $privacy->bankName = $row->bankName ?? null;
        $privacy->bankNumber = $row->bankNumber ?? null;

        return $privacy;
    }

    public function userOffice(int $userSeq): ?UserOfficeRes
    {
        if ($userSeq < 0) {
            ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findOfficeRow($userSeq);
        if ($row === null)
            return null;

        $office = new UserOfficeRes();
        $office->staffNum = $row->staffNum ?? null;
        $office->departmentName = $row->departmentName ?? null;
        $office->positionName = $row->positionName ?? null;

        $office->contractYn = $row->contractYn ?? null;
        $office->staffCardYn = $row->staffCardYn ?? null;
        $office->fieldworkYn = $row->fieldworkYn ?? null;
        $office->engineerYn = $row->engineerYn ?? null;

        $office->joinDate = $row->joinDate ?? null;
        $office->resignDate = $row->resignDate ?? null;

        $office->workForm = $row->workForm ?? null;
        $office->laborForm = $row->laborForm ?? null;
        $office->contractType = $row->contractType ?? null;

        $office->insurancesAcquisitionDate = $row->insurancesAcquisitionDate ?? null;
        $office->insurancesLossDate = $row->insurancesLossDate ?? null;

        return $office;
    }

    public function userEtc(int $userSeq): ?UserEtcRes
    {
        if ($userSeq < 0) {
            ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findEtcRow($userSeq);
        if ($row === null)
            return null;

        $etc = new UserEtcRes();
        $etc->groupInsuranceYn = $row->groupInsuranceYn ?? 'N';
        $etc->incomeTaxReductionBeginDate = $row->incomeTaxReductionBeginDate ?? null;
        $etc->incomeTaxReductionEndDate = $row->incomeTaxReductionEndDate ?? null;
        $etc->employedType = $row->employedType ?? null;
        $etc->militaryPeriod = $row->militaryPeriod ?? null;

        return $etc;
    }

    public function userCareer(int $userSeq): ?UserCareerRes
    {
        if ($userSeq < 0) {
            ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findCareerRow($userSeq);

        // user는 있는데 privacy가 없으면 data:null로 내려도 됨(스펙에 맞게)
        if ($row === null)
            return null;

        $career = new UserCareerRes();
        $career->jobField = $row->jobField ?? null;
        $career->jobGrade = $row->jobGrade ?? null;
        $career->certNum1 = $row->certNum1 ?? null;
        $career->certNum2 = $row->certNum2 ?? null;
        $career->industrySameMonth = isset($row->industrySameMonth) ? (int) $row->industrySameMonth : null;
        $career->industryOtherMonth = isset($row->industryOtherMonth) ? (int) $row->industryOtherMonth : null;

        return $career;
    }


    private function permissionsFromConfig(?string $json): UserPermissionsRes
    {
        $p = new UserPermissionsRes(); // 기본값 N

        if ($json === null || trim($json) === '') {
            return $p;
        }

        $arr = json_decode($json, true);
        if (!is_array($arr)) {
            return $p;
        }

        $yn = static function ($v): string {
            $v = strtoupper((string) $v);
            return $v === 'Y' ? 'Y' : 'N';
        };

        // tb_user.config의 키가 이 이름이라고 가정(네 DTO 주석 기준)
        $p->customer_menu = $yn($arr['customer_menu'] ?? 'N');
        $p->customer_detail = $yn($arr['customer_detail'] ?? 'N');
        $p->fms_id_manage = $yn($arr['fms_id_manage'] ?? 'N');
        $p->contract_menu = $yn($arr['contract_menu'] ?? 'N');
        $p->counseling_menu = $yn($arr['counseling_menu'] ?? 'N');
        $p->income_view = $yn($arr['income_view'] ?? 'N');

        return $p;
    }
}
