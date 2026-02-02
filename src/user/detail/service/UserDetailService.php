<?php
declare(strict_types=1);

namespace App\user\detail\service;

use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\Exception\ApiException;
use App\user\detail\dto\query\UserDetailQuery;
use App\user\detail\dto\response\UserBasicRes;
use App\user\detail\dto\response\UserDetailRes;
use App\user\detail\dto\response\UserOfficeRes;
use App\user\detail\dto\response\UserPermissionsRes;
use App\user\detail\dto\response\UserPrivacyRes;
use App\user\detail\dto\response\UserEtcRes;
use App\user\detail\dto\response\UserCareerRes;

use App\user\detail\repository\UserDetailRepository;

use App\user\detail\dto\request\UserBasicReq;
use App\user\detail\dto\request\UserCareerReq;
use App\user\detail\dto\request\UserEtcReq;
use App\user\detail\dto\request\UserOfficeReq;
use App\user\detail\dto\request\UserPrivacyReq;

use App\common\db\DbTransactionRunner;

use App\user\detail\entity\UserBasicUpdateEntity;
use App\user\detail\entity\UserCareerUpdateEntity;
use App\user\detail\entity\UserEtcUpdateEntity;
use App\user\detail\entity\UserOfficeUpdateEntity;
use App\user\detail\entity\UserPrivacyUpdateEntity;

final class UserDetailService
{
    private UserDetailRepository $userDetailRepository;
    private DbTransactionRunner $dbTransactionRunner;

    public function __construct(UserDetailRepository $userDetailRepository, DbTransactionRunner $dbTransactionRunner)
    {
        $this->userDetailRepository = $userDetailRepository;
        $this->dbTransactionRunner = $dbTransactionRunner;
    }


    private function checkUserExists(int $userSeq): ?bool
    {
        return $this->userDetailRepository->existsUser($userSeq) ? true : null;
    }

    public function userDetail(UserDetailQuery $query): ?UserDetailRes
    {
        $row = null;
        //$this->userDetailRepository->findDetailRow($query->userSeq());

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
            throw ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findBasicRow($userSeq);

        if ($row === null) {
            throw ApiException::notFound("USER_NOT_FOUND", ApiErrorCode::RESOURCE_NOT_FOUND, [
                'userSeq' => $userSeq,
            ]);
        }

        return UserBasicRes::fromRow($row);
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
            return $privacy;
        }

        return UserPrivacyRes::fromRow($row);
    }

    public function userOffice(int $userSeq): ?UserOfficeRes
    {
        if ($userSeq < 0) {
            throw ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findOfficeRow($userSeq);

        if ($row === null) {
            return new UserOfficeRes();
        }

        return UserOfficeRes::fromRow($row);
    }

    public function userCareer(int $userSeq): ?UserCareerRes
    {
        if ($userSeq < 0) {
            throw ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findCareerRow($userSeq);

        // user는 있는데 privacy가 없으면 data:null로 내려도 됨(스펙에 맞게)
        if ($row === null) {
            return new UserCareerRes();
        }

        return UserCareerRes::fromRow($row);
    }


    public function userEtc(int $userSeq): ?UserEtcRes
    {
        if ($userSeq < 0) {
            throw ApiException::badRequest("VALIDATION_FAILED", ApiErrorCode::VALIDATION_FAILED);
        }

        if ($this->checkUserExists($userSeq) === null)
            return null;

        $row = $this->userDetailRepository->findEtcRow($userSeq);
        
        if ($row === null) {
            return new UserEtcRes();
        }

        return UserEtcRes::fromRow($row);
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

    // 탭별 PUT
    public function putUserBasic(int $userSeq, UserBasicReq $userBasicReq): void
    {
        $entity = UserBasicUpdateEntity::fromReq($userBasicReq);
        $this->userDetailRepository->updateBasic($userSeq, $entity);
    }

    public function putUserPrivacy(int $userSeq, UserPrivacyReq $userPrivacyReq): void
    {
        $entity = UserPrivacyUpdateEntity::fromReq($userPrivacyReq);
        $this->userDetailRepository->updatePrivacy($userSeq, $entity);
    }

    public function putUserOffice(int $userSeq, UserOfficeReq $userOfficeReq): void
    {
        $entity = UserOfficeUpdateEntity::fromReq($userOfficeReq);
        $this->userDetailRepository->updateOffice($userSeq, $entity);
    }

    public function putUserCareer(int $userSeq, UserCareerReq $userCareerReq): void
    {
        $this->dbTransactionRunner->run(function () use ($userSeq, $userCareerReq): void {
            $entity = UserCareerUpdateEntity::fromReq($userCareerReq);
            $this->userDetailRepository->updateCareer($userSeq, $entity);
        });
    }

    public function putUserEtc(int $userSeq, UserEtcReq $userEtcReq): void
    {
        $entity = UserEtcUpdateEntity::fromReq($userEtcReq);
        $this->userDetailRepository->updateEtc($userSeq, $entity);
    }
}
