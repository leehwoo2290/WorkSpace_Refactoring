<?php
declare(strict_types=1);

namespace App\user\detail\repository;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\repository\BaseRepository;

use App\user\detail\entity\UserBasicUpdateEntity;
use App\user\detail\entity\UserCareerUpdateEntity;
use App\user\detail\entity\UserEtcUpdateEntity;
use App\user\detail\entity\UserOfficeUpdateEntity;
use App\user\detail\entity\UserPermissionsUpdateEntity;
use App\user\detail\entity\UserPrivacyUpdateEntity;

use App\user\detail\repository\preset\UserBasicRowPreset;
use App\user\detail\repository\preset\UserPrivacyRowPreset;
use App\user\detail\repository\preset\UserOfficeRowPreset;
use App\user\detail\repository\preset\UserCareerRowPreset;
use App\user\detail\repository\preset\UserEtcRowPreset;
use App\user\detail\repository\preset\UserPermissionsRowPreset;

use App\common\repository\WritePayloadBuilder;


final class UserDetailRepository extends BaseRepository
{
    private const TABLE_USER = 'tb_user';
    private const TABLE_LICENSE = 'tb_license';

    private const TABLE_PRIVACY = 'tb_user_privacy';
    private const TABLE_OFFICE = 'tb_user_office';
    private const TABLE_ETC = 'tb_user_etc';

    // permissions는 환경에 따라 없을 수도 있음(레거시). 있으면 upsert로 쓰는 구조
    private const TABLE_PERMISSIONS = 'tb_user_permissions';

    public function __construct($db)
    {
        parent::__construct($db);
    }

    private function existsRow(string $table, array $where): bool
    {
        // 안전장치: dynamic table/column이 들어오는 경우를 대비
        $this->assertIdent($table);

        return $this->existsWith(function () use ($table, $where): void {
            $this->db->select('1', false)->from($table)->limit(1);
            foreach ($where as $k => $v) {
                $this->assertIdent((string) $k);
                $this->db->where((string) $k, $v);
            }
        });
    }

    public function existsUser(int $userSeq): bool
    {
        return $this->existsRow(self::TABLE_USER, ['seq' => $userSeq]);
    }

    // /** 기본 + 재직 + 개인정보를 한 번에 가져오기 (없으면 null) */
    // public function findDetailRow(int $userSeq): ?object
    // {
    //     $this->resetQuery();

    //            $this->db->select(SelectText::cols([
    //         'u.seq AS userSeq',
    //         'l.name AS licenseName',
    //         'u.name AS name',
    //         'u.role AS role',
    //         'u.status AS status',
    //         'u.email AS email',
    //         'u.avatar_file AS avatarFile',
    //         'u.remark AS remark',
    //         'u.config AS configJson',
    //         'o.staff_num AS staffNum',
    //         'd.name AS departmentName',
    //         'p.name AS positionName',
    //         'o.engineer_yn AS engineerYn',
    //         'o.join_date AS joinDate',
    //         'o.resign_date AS resignDate',
    //         'pr.birthday AS birthday',
    //         'pr.mobile AS mobile',
    //     ]), false);


    //     (new UserJoinBuilder($this->db))
    //         ->fromUser('u')
    //         ->joinLicense('u', 'l')
    //         ->joinOffice('u', 'o')
    //         ->joinDepartment('o', 'd')
    //         ->joinPosition('o', 'p')
    //         ->joinPrivacy('u', 'pr');

    //     $this->db->where('u.seq', $userSeq);
    //     $row = $this->db->get()->row();

    //     return $row ?: null;
    // }

    public function findBasicRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserBasicRowPreset(), $userSeq);
    }

    public function findPrivacyRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserPrivacyRowPreset(), $userSeq);
    }

    public function findOfficeRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserOfficeRowPreset(), $userSeq);
    }

    public function findCareerRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserCareerRowPreset(), $userSeq);
    }

    public function findEtcRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserEtcRowPreset(), $userSeq);
    }

    public function findPermissionsRow(int $userSeq): ?object
    {
        return $this->rowByPreset(new UserPermissionsRowPreset(), $userSeq);
    }

    private function resolveSeqOrFail(string $nameOrSeq, string $tableType, string $whereType): int
    {
        $v = trim($nameOrSeq);
        if ($v === '') {
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED, [
                'ref' => "{$tableType}.{$whereType}",
                'value' => '',
            ]);
        }

        if (ctype_digit($v)) {
            return (int) $v;
        }

        // 안전장치: 동적 식별자(table/column) 사용 시 SQL injection 방지
        $this->assertIdent($tableType);
        $this->assertIdent($whereType);

        $row = $this->rowWith(function () use ($tableType, $whereType, $v): void {
            $this->db->select('seq')
                ->from($tableType)
                ->group_start()
                ->where($whereType, $v)
                // ->or_where('name_abbr', $v) // 필요하면 테이블별로 따로 켜기
                ->group_end()
                ->limit(1);
        });

        $err = (array) $this->db->error();
        if ((int) ($err['code'] ?? 0) !== 0) {
            throw ApiException::internal('DB_QUERY_FAILED', ApiErrorCode::DB_QUERY_FAILED, $err);
        }

        if (!$row || !isset($row->seq)) {
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED, [
                'ref' => "{$tableType}.{$whereType}",
                'value' => $v,
            ]);
        }

        return (int) $row->seq;
    }

    public function updateBasic(int $userSeq, UserBasicUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload(
            $builder,
            fn(string $v, string $table, string $col) => $this->resolveSeqOrFail($v, $table, $col)
        );

        // 업데이트할 게 없으면 조용히 종료(업데이트 쿼리 자체를 만들지 않음)
        if (empty($data)) {
            return;
        }

        // tb_user는 반드시 존재해야 하는 row(없으면 서비스에서 404 처리)
        // => 일반 UPDATE + 공통 에러 처리
        $this->updateWhereOrThrow(
            self::TABLE_USER,
            $data,
            ['seq' => $userSeq],
            'UPDATE_USER_BASIC_FAILED',
            ApiErrorCode::DB_UPDATE_FAILED
        );
    }
    // ===== Permissions =====

    public function updatePermissions(int $userSeq, UserPermissionsUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

        $this->upsertByUserSeq(self::TABLE_PERMISSIONS, $userSeq, $data);
    }

    // ===== Privacy =====

    public function updatePrivacy(int $userSeq, UserPrivacyUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

        $this->upsertByUserSeq(self::TABLE_PRIVACY, $userSeq, $data);
    }

    // ===== Office =====

    public function updateOffice(int $userSeq, UserOfficeUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload(
            $builder,
            fn(string $v, string $table, string $col) => $this->resolveSeqOrFail($v, $table, $col)
        );

        $this->upsertByUserSeq(self::TABLE_OFFICE, $userSeq, $data);
    }

    // ===== Career =====

    public function updateCareer(int $userSeq, UserCareerUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();

        $privacyData = $entity->toPrivacyDbPayload($builder);
        $this->upsertByUserSeq(self::TABLE_PRIVACY, $userSeq, $privacyData);

        $officeData = $entity->toOfficeDbPayload($builder);
        $this->upsertByUserSeq(self::TABLE_OFFICE, $userSeq, $officeData);
    }

    // ===== Etc =====

    public function updateEtc(int $userSeq, UserEtcUpdateEntity $entity): void
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

        $this->upsertByUserSeq(self::TABLE_ETC, $userSeq, $data);
    }
}
