<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\dto\response\SafetyProjectListRes;

use App\safety\project\autocomplete\dto\response\SafetyProjectAutocompleteRes;
use App\safety\project\autocomplete\dto\query\SafetyProjectAutocompleteQuery;

use App\safety\project\add\dto\request\SafetyProjectAddReq;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes;

use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFacilityRemarkFilterRes;
use App\safety\project\detail\schedule\dto\request\SafetyProjectScheduleUpdateReq;
use App\safety\project\detail\schedule\dto\response\SafetyProjectScheduleAssignedFilterRes;
use App\safety\project\detail\schedule\dto\response\SafetyProjectScheduleRes;
use App\safety\project\detail\fieldInfo\dto\request\SafetyProjectFieldInfoUpdateReq;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectContractManagerFilterRes;
use App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFacilityTypeFilterRes;
use App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery;

class SafetyProjectController extends BASE_Controller
{
    public SafetyModule $safetyModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('SafetyModule', null, 'safetyModule');
    }

    /*
     @Description
     - [GET] /api/web/safety-projects
     - Header: Authorization: Bearer {accessToken}
     - Query: SafetyProjectListQuery (query string)
       - page, size
       - sortBy, sortDir (복수 가능, SafetyProjectListQuery가 화이트리스트/정규화)
       - status, licenseSeq, engineerSeq, region, searchKeyword, filedBeginDate, fieldEndDate
     - Response: SafetyProjectListRes
     */
    public function list()
    {
        try {
            /** @var SafetyProjectListQuery $query */
            $query = $this->requestQueryDtoMapper->queryRequestDto(SafetyProjectListQuery::class);

            $res = $this->safetyModule->safetyProjectList($query);

            ApiResult::ok($res, SafetyProjectListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
    public function add()
    {
        try {
            /** @var SafetyProjectAddReq $req */
            $safetyProjectAddReq = $this->requestQueryDtoMapper->jsonRequestDto(SafetyProjectAddReq::class);
            $userSeq = (int) ($this->userContext->seq() ?? 0);

            $this->safetyModule->safetyProjectAdd($userSeq, $safetyProjectAddReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function autocompleteList()
    {
        try {
            /** @var SafetyProjectAutocompleteQuery $query */
            $query = $this->requestQueryDtoMapper->queryRequestDto(SafetyProjectAutocompleteQuery::class);

            $res = $this->safetyModule->safetyProjectAutocompleteList($query);

            ApiResult::ok($res, SafetyProjectAutocompleteRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
    @Description
    - [GET] /api/web/safety/{projectSeq}/field-info
    - Header: Authorization: Bearer {accessToken}
    - Response: SafetyProjectFieldInfoItem
    */
    public function fieldInfo(int $projectSeq): void
    {
        try {
            $res = $this->safetyModule->safetyProjectGetFieldInfo($projectSeq);
            ApiResult::ok($res, SafetyProjectFieldInfoRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function updateFieldInfo(int $projectSeq): void
    {
        try {
            /** @var SafetyProjectFieldInfoUpdateReq $req */
            $req = $this->requestQueryDtoMapper->jsonRequestDto(SafetyProjectFieldInfoUpdateReq::class);

            $this->safetyModule->safetyProjectPutFieldInfo($projectSeq, $req);
            ApiResult::none();

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
    /*
     @Description
     - [GET] /api/web/safety/{projectSeq}/facility-remark-filter
     - Header: Authorization: Bearer {accessToken}
     - Response: SafetyProjectFacilityRemarkFilterRes
     */
    public function facilityRemarkFilter(): void
    {
        try {
            /** @var SafetyProjectFieldInfoFacilityRemarkFilterQuery $req */
            $query = $this->requestQueryDtoMapper->queryRequestDto(SafetyProjectFieldInfoFacilityRemarkFilterQuery::class);

            $res = $this->safetyModule->safetyProjectFacilityRemarkFilter($query);
            ApiResult::ok($res, SafetyProjectFacilityRemarkFilterRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
  @Description
  - [GET] /api/web/safety/{projectSeq}/facility-type-filter
  - Header: Authorization: Bearer {accessToken}
  - Response: SafetyProjectFacilityTypeFilterRes
  */
    public function facilityTypeFilter(): void
    {
        try {
            $res = $this->safetyModule->safetyProjectFacilityTypeFilter();
            ApiResult::ok($res, SafetyProjectFacilityTypeFilterRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
     @Description
     - [GET] /api/web/safety/{projectSeq}/contract-manager-filter
     - Header: Authorization: Bearer {accessToken}
     - Response: SafetyProjectContractManagerFilterRes
     */
    public function contractManagerFilter(): void
    {
        try {
            $currentUserSeq = (int) ($this->userContext->seq() ?? 0);

            $res = $this->safetyModule->safetyProjectContractManagerFilter($currentUserSeq);
            ApiResult::ok($res, SafetyProjectContractManagerFilterRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
    /*
 @Description
 - [GET] /api/web/safety/{projectSeq}/schedule
 - Header: Authorization: Bearer {accessToken}
 - Response: SafetyProjectScheduleRes
 */
    public function schedule(int $projectSeq): void
    {
        try {
            $res = $this->safetyModule->safetyProjectSchedule($projectSeq);
            ApiResult::ok($res, SafetyProjectScheduleRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /*
 @Description
 - [GET] /api/web/safety/{projectSeq}/schedule/candidates
 - Header: Authorization: Bearer {accessToken}
 - Response: SafetyProjectScheduleCandidatesRes
*/
    public function assignedFilter(int $projectSeq): void
    {
        try {
            $res = $this->safetyModule->safetyProjectScheduleAssignedFilter($projectSeq);
            ApiResult::ok($res, SafetyProjectScheduleAssignedFilterRes::class);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }


    /*
     @Description
     - [PUT] /api/web/safety/{projectSeq}/schedule
     - Header: Authorization: Bearer {accessToken}
     - Body: SafetyProjectScheduleUpdateReq (JSON)
     - Response: none (204)
     */
    public function updateSchedule(int $projectSeq): void
    {
        try {
            /** @var SafetyProjectScheduleUpdateReq $req */
            $req = $this->requestQueryDtoMapper->jsonRequestDto(SafetyProjectScheduleUpdateReq::class);

            $this->safetyModule->safetyProjectUpdateSchedule($projectSeq, $req);

            ApiResult::none();

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}
