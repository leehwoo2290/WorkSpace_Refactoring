<?php
declare(strict_types=1);

namespace App\userDetail\repository;

final class UserDetailRepository
{
    /** @var \CI_DB_query_builder */
    private \CI_DB_query_builder $db;

    public function __construct(\CI_DB_query_builder $db)
    {
        $this->db = $db;
    }

    public function existsUser(int $userSeq): bool
    {
        $this->db->from('tb_user');
        $this->db->where('seq', $userSeq);
        return ((int) $this->db->count_all_results()) > 0;
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
}
