<?php
declare(strict_types=1);

namespace App\userDetail\repository;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;


use App\userDetail\dto\request\UserBasicReq;
use App\userDetail\dto\request\UserCareerReq;
use App\userDetail\dto\request\UserEtcReq;
use App\userDetail\dto\request\UserOfficeReq;
use App\userDetail\dto\request\UserPermissionsReq;
use App\userDetail\dto\request\UserPrivacyReq;

use QueryEnumMapper;
use App\user\dto\UserListQueryEnumMaps;

final class UserDetailRepository
{
    ///** @var \CI_DB_query_builder */
    private $db;

    private const TABLE_USER = 'tb_user';
    private const TABLE_LICENSE = 'tb_license';

    private const TABLE_PRIVACY = 'tb_user_privacy';
    private const TABLE_OFFICE = 'tb_user_office';
    private const TABLE_ETC = 'tb_user_etc';

    // career는 별도 테이블(tb_user_career)이 아니라 privacy+office에 분산됨(권장: 상수 제거 or 분리상수로)
// private const TABLE_CAREER = 'tb_user_career';

    // permissions는 sql코드.txt에서 테이블 정의가 안 보임(아래 서비스/레포는 "있으면 쓰고, 없으면 tb_user 컬럼 있으면 거기 업데이트"로 처리)
    private const TABLE_PERMISSIONS = 'tb_user_permissions';


    public function __construct($db)
    {
        $this->db = $db;
    }

    private function existsRow(string $table, array $where): bool
    {
        $qb = $this->db->select('1', false)->from($table)->limit(1);
        foreach ($where as $k => $v) {
            $qb->where($k, $v);
        }
        return (bool) $qb->get()->row();
    }

    public function existsUser(int $userSeq): bool
    {
        return $this->existsRow(self::TABLE_USER, ['seq' => $userSeq]);
    }

    /** 기본 + 재직 + 개인정보를 한 번에 가져오기 (없으면 null) */
    public function findDetailRow(int $userSeq): ?object
    {
        $this->db->select("
            u.seq AS userSeq,
            l.name AS licenseName,
            u.name AS name,
            u.role AS role,
            u.status AS status,
            u.email AS email,
            u.avatar_file AS avatarFile,
            u.remark AS remark,
            u.config AS configJson,

            o.staff_num AS staffNum,
            d.name AS departmentName,
            p.name AS positionName,
            o.engineer_yn AS engineerYn,
            o.join_date AS joinDate,
            o.resign_date AS resignDate,

            pr.birthday AS birthday,
            pr.mobile AS mobile
        ", false);

        $this->db->from('tb_user u');
        $this->db->join('tb_license l', 'l.seq = u.license_seq', 'left');
        $this->db->join('tb_user_office o', 'o.user_seq = u.seq', 'left');
        $this->db->join('tb_office_department d', 'd.seq = o.department_seq', 'left');
        $this->db->join('tb_office_position p', 'p.seq = o.position_seq', 'left');
        $this->db->join('tb_user_privacy pr', 'pr.user_seq = u.seq', 'left');

        $this->db->where('u.seq', $userSeq);
        $row = $this->db->get()->row();

        return $row ?: null;
    }

    public function findBasicRow(int $userSeq): ?object
    {
        $this->db->select("
        u.seq AS userSeq,
        l.name AS licenseName,
        u.name AS name,
        u.role AS role,
        u.status AS status,
        u.email AS email,
        u.avatar_file AS avatarFile,
        u.remark AS remark,
        u.config AS configJson
    ", false);

        $this->db->from('tb_user u');
        $this->db->join('tb_license l', 'l.seq = u.license_seq', 'left');
        $this->db->where('u.seq', $userSeq);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    public function findPrivacyRow(int $userSeq): ?object
    {
        $this->db->select("
        pr.foreignYn        AS foreignYn,
        pr.jumin_num        AS juminNum,
        pr.birthday         AS birthday,
        pr.mobile           AS phoneNumber,
        pr.emer_num1        AS emerNum1,
        pr.emer_num2        AS emerNum2,
        pr.addr             AS addr,

        pr.education_level  AS educationLevel,
        pr.education_major  AS educationMajor,
        pr.family_cnt       AS familyCnt,

        pr.carYn            AS carYn,
        pr.car_number       AS carNumber,
        pr.car_tax          AS carTax,
        pr.car_model        AS carModel,

        pr.religion         AS religion,
        pr.bank_name        AS bankName,
        pr.bank_number      AS bankNumber
    ", false);

        $this->db->from('tb_user_privacy pr');
        $this->db->where('pr.user_seq', $userSeq);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    public function findOfficeRow(int $userSeq): ?object
    {
        $this->db->select("
        o.staff_num AS staffNum,
        d.name AS departmentName,
        p.name AS positionName,

        o.contract_yn AS contractYn,
        o.staff_card_yn AS staffCardYn,
        o.fieldwork_yn AS fieldworkYn,
        o.engineer_yn AS engineerYn,

        o.join_date AS joinDate,
        o.resign_date AS resignDate,

        o.work_form AS workForm,
        o.labor_form AS laborForm,
        o.contract_type AS contractType,

        o.insurances_acquisition_date AS insurancesAcquisitionDate,
        o.insurances_loss_date AS insurancesLossDate
    ", false);

        $this->db->from('tb_user_office o');
        $this->db->join('tb_office_department d', 'd.seq = o.department_seq', 'left');
        $this->db->join('tb_office_position p', 'p.seq = o.position_seq', 'left');
        $this->db->where('o.user_seq', $userSeq);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    public function findEtcRow(int $userSeq): ?object
    {
        $this->db->select("
        e.group_insurance_yn AS groupInsuranceYn,
        e.income_tax_reduction_begin_date AS incomeTaxReductionBeginDate,
        e.income_tax_reduction_end_date AS incomeTaxReductionEndDate,
        e.employed_type AS employedType,
        e.military_period AS militaryPeriod
    ", false);

        $this->db->from('tb_user_etc e');
        $this->db->where('e.user_seq', $userSeq);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    public function findCareerRow(int $userSeq): ?object
    {
        $this->db->select("
        pr.job_field AS jobField,
        pr.job_grade AS jobGrade,
        pr.cert_num1 AS certNum1,
        pr.cert_num2 AS certNum2,

        o.industry_same_month AS industrySameMonth,
        o.industry_other_month AS industryOtherMonth
    ", false);

        // privacy 기준으로 office left join
        $this->db->from('tb_user_privacy pr');
        $this->db->join('tb_user_office o', 'o.user_seq = pr.user_seq', 'left');
        $this->db->where('pr.user_seq', $userSeq);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    private function resolveSeqOrFail(string $nameOrSeq, string $tableType, string $whereType): int
    {
        $v = trim($nameOrSeq);
        if ($v === '') {
            throw new \InvalidArgumentException('EMPTY');
        }

        // 숫자면 seq로 간주
        if (ctype_digit($v)) {
            return (int) $v;
        }

        // 이름 또는 영문약어(name_abbr)로 조회
        $row = $this->db->select('seq')
            ->from($tableType)
            ->group_start()
            ->where($whereType, $v)
            //->or_where('name_abbr', $v)
            ->group_end()
            ->limit(1)
            ->get()
            ->row();

        if (!$row) {
            throw new \InvalidArgumentException('NOT_FOUND');
        }

        return (int) $row->seq;
    }

    public function updateBasic(int $userSeq, UserBasicReq $req): void
    {
        $data = [
            'name' => $req->name(),
            'role' => $req->role(),
            'status' => $req->status(),
            'email' => $req->email(),
            'avatar_file' => $req->avatarFile(),
            'remark' => $req->remark(),
        ];

        // licenseName(문자열/숫자) → license_seq(int) 변환
        $licenseName = $req->licenseName(); // DTO에 있는 getter 기준
        if ($licenseName !== null && trim($licenseName) !== '') {
            $data['license_seq'] = $this->resolveSeqOrFail($licenseName, self::TABLE_LICENSE, 'name');
        }

        $this->db->where('seq', $userSeq)->update(self::TABLE_USER, $data);

        if ($this->db->error()['code'] !== 0) {
            throw new \RuntimeException('UPDATE_USER_BASIC_FAILED');
        }
    }

    // ===== Permissions =====

    public function updatePermissions(int $userSeq, UserPermissionsReq $req): void
    {
        $data = $req->toArray(); // snake_case로 이미 내려줌
        $this->updateByUserSeq(self::TABLE_PERMISSIONS, $userSeq, $data);
    }

    // ===== Privacy =====

    public function updatePrivacy(int $userSeq, UserPrivacyReq $req): void
    {
        $data = [
            'foreignYn' => $req->foreignYn(),
            'jumin_num' => $req->juminNumDigits(), // 이미 DTO에서 정규화
            'birthday' => $req->birthday(),
            'mobile' => $req->phoneNumber(),
            'emer_num1' => $req->emergency1(),
            'emer_num2' => $req->emergency2(),
            'addr' => $req->address(),
            'education_level' => $req->educationLevel(),
            'education_major' => $req->educationMajor(),
            'family_cnt' => $req->familyCnt(),
            'carYn' => $req->carYn(),
            'car_number' => $req->carNumber(),
            'car_tax' => $req->suwonCarReg(),
            'car_model' => $req->carModel(),
            'religion' => $req->religion(),
            'bank_name' => $req->bankName(),
            'bank_number' => $req->bankNumber(),
        ];

        $this->updateByUserSeq(self::TABLE_PRIVACY, $userSeq, $data);
    }

    // ===== Office =====

    public function updateOffice(int $userSeq, UserOfficeReq $req): void
    {
        $data = [
            'staff_num' => $req->staffNum(),

            //'department' => $req->department(),
            //'team' => $req->team(),
            //'task' => $req->task(),
            //'position' => $req->position(),

            'contract_type' => QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'contract_type', $req->contractType()),
            'apprentice' => $req->apprentice(),
            'work_form' => QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'work_form', $req->workForm()),
            'labor_form' => QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'labor_form', $req->laborForm()),

            'join_date' => $req->joinDate(),
            'resign_date' => $req->resignDate(),

            'insurances_acquisition_date' => $req->insurancesAcquisitionDate(),
            'insurances_loss_date' => $req->insurancesLossDate(),

            'contract_yn' => $req->contractYn(),
            'staff_card_yn' => $req->staffCardYn(),
            'fieldwork_yn' => $req->fieldworkYn(),
        ];

        $department = QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'office_department', $req->department()); 
        if ($department !== null && trim($department) !== '') {
            $data['department_seq'] = $this->resolveSeqOrFail($department, 'tb_office_department', 'name');
        }
       
        $position = QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'office_position', $req->position());  
        if ($position !== null && trim($position) !== '') {
            $data['position_seq'] = $this->resolveSeqOrFail($position, 'tb_office_position', 'name');
        }
         // $team = $req->team(); // DTO에 있는 getter 기준
        // if ($team !== null && trim($team) !== '') {
        //     $data['team_seq'] = $this->resolveSeqOrFail($team, 'tb_office_team', 'name');
        // }
        // $task = $req->task(); // DTO에 있는 getter 기준
        // if ($task !== null && trim($task) !== '') {
        //     $data['task_seq'] = $this->resolveSeqOrFail($task, 'tb_office_task', 'name');
        // }
        //log_message('error', '$data: ' . json_encode($data));
        $this->updateByUserSeq(self::TABLE_OFFICE, $userSeq, $data);
    }

    // ===== Career =====

    public function updateCareer(int $userSeq, UserCareerReq $req): void
    {
        // 1) tb_user_privacy 쪽 career 필드
        $privacyData = [
            'job_field' => $req->jobField(),
            'job_grade' => $req->jobGrade(),
            'cert_num1' => $req->certNum1(),
            'cert_num2' => $req->certNum2(),
        ];

        // privacy row upsert/update
        $this->updateByUserSeq(self::TABLE_PRIVACY, $userSeq, $privacyData);

        // 2) tb_user_office 쪽 career 필드
        $officeData = [
            'industry_same_month' => $req->industrySameMonth(),
            'industry_other_month' => $req->industryOtherMonth(),
        ];

        // office row upsert/update
        $this->updateByUserSeq(self::TABLE_OFFICE, $userSeq, $officeData);
    }

    // ===== Etc =====

    public function updateEtc(int $userSeq, UserEtcReq $req): void
    {
        // registeredAt/lastLoginAt는 DTO에 있지만 주석대로 "서버 관리"라면 업데이트에서 제외(원하면 추가)
        $data = [
            'youth_job_leap' => $req->youthJobLeap(),
            'youth_employment_incentive' => $req->youthEmploymentIncentive(),
            'youth_digital' => $req->youthDigital(),
            'senior_internship' => $req->seniorInternship(),
            'new_middle_aged_jobs' => $req->newMiddleAgedJobs(),

            'income_tax_reduction_begin_date' => $req->beginDate(),
            'income_tax_reduction_end_date' => $req->endDate(),

            'employed_type' => $req->employedType(),
            'military_period' => $req->militaryPeriod(),
        ];

        $this->updateByUserSeq(self::TABLE_ETC, $userSeq, $data);
    }

    private function updateByUserSeq(string $table, int $userSeq, array $data): void
    {
        // 1업데이트할 게 없으면 아무 것도 안 함
        if (empty($data)) {
            return;
        }

        $exists = $this->existsRow($table, ['user_seq' => $userSeq]);

        if ($exists) {
            $this->db->where('user_seq', $userSeq)->update($table, $data);
        } else {
            $payload = array_merge(['user_seq' => $userSeq], $data);
            $this->db->insert($table, $payload);
        }

        if ($this->db->error()['code'] !== 0) {
            throw new \RuntimeException('DB_WRITE_FAILED: ' . $table);
        }
    }
}
