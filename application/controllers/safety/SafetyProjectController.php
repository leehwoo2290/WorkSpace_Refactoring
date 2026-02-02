<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\common\ApiResult;

use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\dto\response\SafetyProjectListRes;

use App\safety\project\autocomplete\dto\response\SafetyProjectAutocompleteRes;
use App\safety\project\autocomplete\dto\query\SafetyProjectAutocompleteQuery;

use App\safety\project\add\dto\request\SafetyProjectAddReq;

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
}
