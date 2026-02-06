<?php
declare(strict_types=1);

namespace App\safety\engineer\add\service;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;

use App\safety\common\SafetyEnumMaps;
use App\safety\engineer\add\dto\request\SafetyEngineerAddReq;
use App\safety\engineer\add\entity\SafetyEngineerAddEntity;
use App\safety\engineer\add\repository\SafetyEngineerAddRepository;

use EnumMapper;

final class SafetyEngineerAddService
{
    private SafetyEngineerAddRepository $repo;

    public function __construct(SafetyEngineerAddRepository $repo)
    {
        $this->repo = $repo;
    }

    public function add(SafetyEngineerAddReq $req)
    {
        $email = trim($req->email());
        if ($email === '') {
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }

        $userRow = $this->repo->findUserRowByEmail($email);
        if ($userRow === null) {
            throw ApiException::badRequest('USER_NOT_FOUND', ApiErrorCode::VALIDATION_FAILED);
        }

        // 퇴사 유저는 등록 막고 싶으면 여기서 차단
        // tb_user.status가 Quit이면 제외
        if (isset($userRow->status) && (string)$userRow->status === 'Quit') {
            throw ApiException::badRequest('USER_QUIT', ApiErrorCode::VALIDATION_FAILED);
        }

        $userSeq = (int) $userRow->user_seq;

        // 이미 엔지니어 등록되어 있으면 충돌
        if ($this->repo->existsActiveEngineerByUserSeq($userSeq)) {
            throw ApiException::conflict('ENGINEER_ALREADY_EXISTS', ApiErrorCode::DB_DUPLICATE_KEY);
        }

        $maps = SafetyEnumMaps::maps();

        // grade: 없으면 기본 참여(ASSIST)
        $rawGrade = trim((string)($req->grade() ?? ''));
        if ($rawGrade === '') {
            $rawGrade = 'ASSIST';
        }
        $dbGrade = EnumMapper::map($maps, 'safety_engineer_grade', $rawGrade);

        // status: 기본 대기(WAITING)
        $dbStatus = EnumMapper::map($maps, 'safety_engineer_status', 'WAITING');

        $licenseNum = $req->licenseNum();
        $licenseNum = ($licenseNum !== null && trim($licenseNum) !== '') ? trim($licenseNum) : null;

        $entity = new SafetyEngineerAddEntity(
            $userSeq,
            $dbGrade,
            $licenseNum,
            $dbStatus,
            $req->remark() // remark
        );

        $this->repo->insert($entity);
    }
}
