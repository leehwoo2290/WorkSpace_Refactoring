<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\service;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\db\DbTransactionRunner;
use App\common\repository\WritePayloadBuilder;

use App\safety\project\detail\schedule\dto\SafetyProjectAssignedEngineerItem;
use App\safety\project\detail\schedule\dto\SafetyProjectEngineerAssignedFilterItem;
use App\safety\project\detail\schedule\dto\SafetyProjectScheduleItem;
use App\safety\project\detail\schedule\dto\request\SafetyProjectScheduleUpdateReq;
use App\safety\project\detail\schedule\dto\request\SafetyProjectScheduleEngineerReq;
use App\safety\project\detail\schedule\dto\response\SafetyProjectScheduleRes;
use App\safety\project\detail\schedule\dto\response\SafetyProjectScheduleAssignedFilterRes;
use App\safety\project\detail\schedule\entity\SafetyProjectScheduleUpdateEntity;
use App\safety\project\detail\schedule\repository\SafetyProjectScheduleRepository;

final class SafetyProjectScheduleService
{
    private SafetyProjectScheduleRepository $repository;
    private DbTransactionRunner $tx;

    public function __construct(SafetyProjectScheduleRepository $repository, DbTransactionRunner $tx)
    {
        $this->repository = $repository;
        $this->tx = $tx;
    }

    public function getSchedule(int $projectSeq): SafetyProjectScheduleRes
    {
        if ($projectSeq <= 0) {
            throw ApiException::badRequest('INVALID_PROJECT_SEQ', ApiErrorCode::VALIDATION_FAILED);
        }

        $project = $this->repository->findProjectScheduleRow($projectSeq);
        if ($project === null) {
            throw ApiException::notFound('SAFETY_PROJECT_NOT_FOUND', ApiErrorCode::RESOURCE_NOT_FOUND);
        }

        $licenseSeq = (int) ($project->license_seq ?? 0);

        $schedule = SafetyProjectScheduleItem::fromRow($project);

        $assignedRows = $this->repository->findAssignedEngineers($projectSeq);
        $assigned = [];
        foreach ($assignedRows as $r) {
            $assigned[] = SafetyProjectAssignedEngineerItem::fromRow($r);
        }

        return new SafetyProjectScheduleRes(
            $projectSeq,
            $licenseSeq,
            $schedule,
            $assigned
        );
    }

    /**
     * 참여기술진 후보 목록(드롭다운/필터용) - 별도 API로 분리
     */
    public function getAssignedFilter(int $projectSeq): SafetyProjectScheduleAssignedFilterRes
    {
        if ($projectSeq <= 0) {
            throw ApiException::badRequest('INVALID_PROJECT_SEQ', ApiErrorCode::VALIDATION_FAILED);
        }

        $project = $this->repository->findProjectScheduleRow($projectSeq);
        if ($project === null) {
            throw ApiException::notFound('SAFETY_PROJECT_NOT_FOUND', ApiErrorCode::RESOURCE_NOT_FOUND);
        }

        $licenseSeq = (int) ($project->license_seq ?? 0);

        $candidateRows = $this->repository->findEngineerCandidatesByLicenseSeq($licenseSeq);
        $candidates = [];
        foreach ($candidateRows as $r) {
            $candidates[] = SafetyProjectEngineerAssignedFilterItem::fromRow($r);
        }

        return new SafetyProjectScheduleAssignedFilterRes($projectSeq, $licenseSeq, $candidates);
    }

    public function updateSchedule(int $projectSeq, SafetyProjectScheduleUpdateReq $req): void
    {
        if ($projectSeq <= 0) {
            throw ApiException::badRequest('INVALID_PROJECT_SEQ', ApiErrorCode::VALIDATION_FAILED);
        }

        $project = $this->repository->findProjectScheduleRow($projectSeq);
        if ($project === null) {
            throw ApiException::notFound('SAFETY_PROJECT_NOT_FOUND', ApiErrorCode::RESOURCE_NOT_FOUND);
        }

        $licenseSeq = (int) ($project->license_seq ?? 0);

        // 1) schedule payload
        $entity = SafetyProjectScheduleUpdateEntity::fromReq($req);
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

        // 날짜/이메일 형식 검증(잘못된 포맷이면 400)
        $this->assertSchedulePayloadValid($data);

        // 2) engineers
        $engineers = $this->normalizeEngineerReqs($req->engineers(), $licenseSeq);

        // 3) TX: 프로젝트 일정 업데이트 + mans 전체 교체
        $this->tx->run(function () use ($projectSeq, $data, $engineers): void {
            $this->repository->updateProjectSchedule($projectSeq, $data);

            $this->repository->deleteAllMans($projectSeq);

            foreach ($engineers as $e) {
                $this->repository->insertMan(
                    $projectSeq,
                    $e['engineerSeq'],
                    $e['bgnDt'],
                    $e['endDt'],
                    $e['remark']
                );
            }
        });
    }

    /** @param array<string,mixed> $data */
    private function assertSchedulePayloadValid(array $data): void
    {
        $dateCols = [
            'bgn_dt' => 'bgnDt',
            'end_dt' => 'endDt',
            'field_bgn_dt' => 'fieldBgnDt',
            'field_end_dt' => 'fieldEndDt',
            'report_dt' => 'reportDt',
            'done_dt' => 'doneDt',
            'ti_issue_date' => 'tiIssueDate',
        ];

        foreach ($dateCols as $dbCol => $field) {
            if (!array_key_exists($dbCol, $data))
                continue;
            $v = $data[$dbCol];

            if ($v === null || $v === '')
                continue;
            $s = trim((string) $v);

            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $s)) {
                throw ApiException::badRequest(
                    'INVALID_DATE_FORMAT',
                    ApiErrorCode::VALIDATION_FAILED,
                    ['field' => $field, 'value' => $s]
                );
            }
        }

        if (array_key_exists('report_email', $data)) {
            $email = $data['report_email'];

            if ($email !== null && $email !== '') {
                $s = trim((string) $email);
                if (!filter_var($s, FILTER_VALIDATE_EMAIL)) {
                    throw ApiException::badRequest(
                        'INVALID_EMAIL',
                        ApiErrorCode::VALIDATION_FAILED,
                        ['field' => 'reportEmail', 'value' => $s]
                    );
                }
            }
        }
    }

    /**
     * @param SafetyProjectScheduleEngineerReq[] $reqs
     * @return array<int, array{engineerSeq:int,bgnDt:?string,endDt:?string,remark:?string}>
     */
    private function normalizeEngineerReqs(array $reqs, int $licenseSeq): array
    {
        $out = [];
        $seen = [];

        foreach ($reqs as $i => $r) {
            $engineerSeq = (int) ($r->engineerSeq() ?? 0);

            if ($engineerSeq <= 0) {
                $email = (string) ($r->engineerEmail() ?? '');
                if (trim($email) !== '') {
                    $resolved = $this->repository->resolveEngineerSeqByEmail($email, $licenseSeq);
                    if ($resolved !== null) {
                        $engineerSeq = $resolved;
                    }
                }
            }

            if ($engineerSeq <= 0) {
                throw ApiException::badRequest(
                    'INVALID_ENGINEER',
                    ApiErrorCode::VALIDATION_FAILED,
                    ['index' => $i, 'field' => 'engineerSeq']
                );
            }

            // license 범위 검증(프론트 드롭다운을 우회한 입력 방지)
            if (!$this->repository->existsEngineerInLicense($engineerSeq, $licenseSeq)) {
                throw ApiException::badRequest(
                    'ENGINEER_NOT_ALLOWED',
                    ApiErrorCode::VALIDATION_FAILED,
                    ['index' => $i, 'engineerSeq' => $engineerSeq]
                );
            }

            if (isset($seen[$engineerSeq])) {
                // 같은 engineerSeq가 중복으로 들어오면 마지막 값으로 덮어씀
                $out[$seen[$engineerSeq]] = [
                    'engineerSeq' => $engineerSeq,
                    'bgnDt' => $this->normalizeDateOrNull($r->bgnDt(), 'engineers.bgnDt', $i),
                    'endDt' => $this->normalizeDateOrNull($r->endDt(), 'engineers.endDt', $i),
                    'remark' => $this->normalizeStrOrNull($r->remark()),
                ];
                continue;
            }

            $seen[$engineerSeq] = count($out);

            $out[] = [
                'engineerSeq' => $engineerSeq,
                'bgnDt' => $this->normalizeDateOrNull($r->bgnDt(), 'engineers.bgnDt', $i),
                'endDt' => $this->normalizeDateOrNull($r->endDt(), 'engineers.endDt', $i),
                'remark' => $this->normalizeStrOrNull($r->remark()),
            ];
        }

        return $out;
    }

    private function normalizeStrOrNull(?string $s): ?string
    {
        if ($s === null)
            return null;
        $t = trim($s);
        return $t === '' ? null : $t;
    }

    private function normalizeDateOrNull(?string $s, string $field, int $index): ?string
    {
        if ($s === null)
            return null;
        $t = trim($s);
        if ($t === '')
            return null;

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $t)) {
            throw ApiException::badRequest(
                'INVALID_DATE_FORMAT',
                ApiErrorCode::VALIDATION_FAILED,
                ['index' => $index, 'field' => $field, 'value' => $t]
            );
        }

        return $t;
    }
}
