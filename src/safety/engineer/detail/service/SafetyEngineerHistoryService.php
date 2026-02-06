<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\service;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\safety\engineer\detail\dto\SafetyEngineerHistoryItem;
use App\safety\engineer\detail\dto\response\SafetyEngineerHistoryRes;
use App\safety\engineer\detail\repository\SafetyEngineerHistoryRepository;

/**
 * SafetyEngineerHistoryService
 *
 * 엔지니어(기술자) 기준 점검이력:
 * - tb_safety_mans에 engineer_seq로 매핑된 project_seq들을 찾아
 * - tb_safety_project를 최신 bgn_dt DESC로 내려준다.
 */
final class SafetyEngineerHistoryService
{
    private SafetyEngineerHistoryRepository $repository;

    public function __construct(SafetyEngineerHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function history(int $engineerSeq): SafetyEngineerHistoryRes
    {
        if ($engineerSeq <= 0) {
            throw ApiException::badRequest('INVALID_ENGINEER_SEQ', ApiErrorCode::VALIDATION_FAILED);
        }

        $rows = $this->repository->findByEngineerSeq($engineerSeq);

        $items = [];
        $num = 1;

        foreach ($rows as $r) {
            $projectSeq = (int) ($r->project_seq ?? 0);

            // engineers: JSON 문자열 -> 배열
            $engineersJson = isset($r->engineers) ? (string) $r->engineers : '[]';
            $engineersArr = json_decode($engineersJson, true);

            if (!is_array($engineersArr)) {
                $engineersArr = [];
            }

            $items[] = new SafetyEngineerHistoryItem(
                $num++,
                $projectSeq,
                !empty($r->project_name) ? (string) $r->project_name : null,
                !empty($r->bgn_dt) ? (string) $r->bgn_dt : null,
                !empty($r->end_dt) ? (string) $r->end_dt : null,
                $engineersArr
            );
        }

        return new SafetyEngineerHistoryRes($items);
    }
}
