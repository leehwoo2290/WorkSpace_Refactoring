<?php

use App\safety\engineer\add\dto\request\SafetyEngineerAddReq;
defined('BASEPATH') OR exit('No direct script access allowed');

use App\common\ApiResult;
use App\safety\engineer\getList\dto\query\SafetyEngineerListQuery;
use App\safety\engineer\getList\dto\response\SafetyEngineerListRes;

use App\safety\engineer\detail\dto\response\SafetyEngineerRes;
use App\safety\engineer\detail\dto\request\SafetyEngineerReq;

use App\safety\engineer\getList\dto\response\SafetyProjectListEngineerFilterRes;

final class SafetyEngineerController extends BASE_Controller
{
    public SafetyModule $safetyModule;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('SafetyModule', null, 'safetyModule');
    }

    public function list(): void
    {
        try {
            /** @var SafetyEngineerListQuery $query */
            $query = $this->requestQueryDtoMapper->queryRequestDto(SafetyEngineerListQuery::class);

            $res = $this->safetyModule->safetyEngineerList($query);

            ApiResult::ok($res, SafetyEngineerListRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    public function add(): void
    {
        try {
            /** @var SafetyEngineerAddReq $req */
            $safetyEngineerAddReq = $this->requestQueryDtoMapper->jsonRequestDto(SafetyEngineerAddReq::class);

            $this->safetyModule->safetyEngineerAdd($safetyEngineerAddReq);

            ApiResult::none();

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }

    /** GET /safety/engineer/{userSeq} */
    public function detail(int $userSeq): void
    {
        try {

            /** @var SafetyEngineerRes $res */
            $res = $this->safetyModule->safetyEngineerGetDetail($userSeq);
            ApiResult::ok($res);

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e);
        }
    }

    /** PUT /safety/engineer/{userSeq} */
    public function update(int $userSeq): void
    {
        try {
            /** @var SafetyEngineerReq $req */
            $req = $this->requestQueryDtoMapper->jsonRequestDto(SafetyEngineerReq::class);

            $this->safetyModule->safetyEngineerUpdateDetail($userSeq, $req);
            ApiResult::ok();

        } catch (\Throwable $e) {
            ApiResult::failThrowable($e);
        }
    }

    public function safetyEngineerFilter()
    {
        try {
            $safetyProjectListEngineerFilterRes = $this->safetyModule->safetyEngineerFilter();

            ApiResult::ok($safetyProjectListEngineerFilterRes, SafetyProjectListEngineerFilterRes::class);

        } catch (\Throwable $e) {

            ApiResult::failThrowable($e, $e->getMessage());
        }
    }
}
