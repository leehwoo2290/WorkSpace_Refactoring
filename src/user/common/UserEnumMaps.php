<?php
declare(strict_types=1);

namespace App\user\common;

final class UserEnumMaps
{
    /**
     * @return array<string, array<string,string>>
     */
    public static function maps(): array
    {
        return [
            // tb_user.status enum('Pending','Normal','Quit')
            'user_status' => [
                'PENDING' => 'Pending',
                'NORMAL'  => 'Normal',
                'QUIT'    => 'Quit',
            ],

            // tb_user_privacy.gender enum('남','여')
            'gender' => [
                'MALE'   => '남',
                'FEMALE' => '여',
            ],

            // tb_user_privacy.foreignYn enum('Y','N')
            'nationality' => [
                'FOREIGNER' => 'Y',
                'KOREAN' => 'N',
            ],

            // tb_user_office.labor_form enum('상근','비상근')
            'labor_form' => [
                'RESIDENT'     => '상근',
                'NON_RESIDENT' => '비상근',
            ],

            // tb_user_office.work_form enum('간주','별정')
            'work_form' => [
                'DEEMED'  => '간주',
                'SPECIAL' => '별정',
            ],

            // tb_user_office.contract_type varchar(50) (프로젝트 DB 값에 맞게 조정 가능)
            'contract_type' => [
                'REGULAR'      => '정규직',
                'CONTRACT_1Y'  => '계약직1년',
                'CONTRACT_2Y'  => '계약직2년',
                'NON_REGULAR'  => '무기계약직',
                'DAILY'        => '일용직',
                'TEMPORARY'    => '단기시급',
            ],

            // tb_office_position.name (DB에 저장된 한글 직급명과 맞춰야 함)
            'office_position' => [
                'TEMPORARY'               => '단기',
                'INTERN'                  => '인턴',
                'STAFF'                   => '사원',
                'JUNIOR_STAFF'            => '주임',
                'ASSISTANT_MANAGER'       => '대리',
                'SENIOR_ASSISTANT_MANAGER'=> '선임',
                'RESPONSIBLE'             => '책임',
                'TEAM_LEADER'             => '팀장',
                'SECTION_CHIEF'           => '소장',

                'DEPUTY_GENERAL_MANAGER'  => '본부장',
                'MANAGER'                 => '과장',
                'SENIOR_MANAGER'          => '부장',
                'DEPUTY_MANAGER'          => '차장',

                'DIRECTOR'                => '이사',
                'EXECUTIVE_DIRECTOR'      => '상무',
                'SENIOR_EXECUTIVE_DIRECTOR'=> '전무',
                'ADVISOR'                 => '고문',
                'VICE_PRESIDENT'          => '부사장',
                'PRESIDENT'               => '사장',
            ],

            'office_department' => [
                'CONSTRUCTION_BUSINESS'         => '건설사업',
                'CONSTRUCTION_SAFETY'           => '건설안전',
                'ARCHITECTURAL_ENGINEERING'     => '건축기술',
                'MANAGEMENT_PLANNING'           => '경영기획',
                'MANAGEMENT_SUPPORT'            => '경영지원',
                'STRUCTURE'                     => '구조',
                'STRUCTURAL_ENGINEERING'        => '구조기술',
                'MECHANICAL_EQUIPMENT'          => '기계설비',
                'TECHNICAL_SALES'               => '기술영업',
                'TECHNICAL_SALES_CS'            => '기술영업CS',
                'TECHNICAL_DATA'                => '기술자료',
                'CORPORATE_RESEARCH_CENTER'     => '기업부설연구소',
                'PLANNING_DEPARTMENT'           => '기획부',
                'PLANNING_PROMOTION'            => '기획홍보',
                'EXTERNAL_COOPERATION_TEAM'     => '대외협력팀',
                'CEO'                           => '대표이사',
                'LEGAL_ADVISORY'                => '법률자문',
                'ADMINISTRATION'                => '사무',
                'DESIGN_TEAM'                   => '설계팀',
                'SAFETY_DIAGNOSIS_DEPARTMENT'   => '안전진단부',
                'EXECUTIVE_OFFICE'              => '임원실',
                'CIVIL_ENGINEERING_TECH'        => '토목기술',
                'CIVIL_ENGINEERING_DEPARTMENT'  => '토목부',
            ],

            'region' => [
                'SEOUL'         => '서울',
                'BUSAN'         => '부산',
                'DAEGU'         => '대구',
                'INCHEON'       => '인천',
                'GWANGJU'       => '광주',
                'DAEJEON'       => '대전',
                'ULSAN'         => '울산',
                'SEJONG'        => '세종',
                'GYEONGGI'      => '경기',
                'GANGWON'       => '강원',
                'CHUNGBUK'      => '충북',
                'CHUNGNAM'      => '충남',
                'JEONBUK'       => '전북',
                'JEONNAM'       => '전남',
                'GYEONGBUK'     => '경북',
                'GYEONGNAM'     => '경남',
                'JEJU'          => '제주',
            ],
        ];
    }
}
