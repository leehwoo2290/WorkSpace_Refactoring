<?php
declare(strict_types=1);

namespace App\safety\common;

final class SafetyEnumMaps
{
    /**
     * @return array<string, array<string,string>>
     */
    public static function maps(): array
    {
        return [
            // tb_user.status enum('Pending','Normal','Quit')
            'safety_status' => [
                'CONTRACT_COMPLETED' => '계약완료',
                'SITE_INSPECTION_COMPLETED' => '현장점검완료',
                'REPORT_WRITING' => '보고서작성중',
                'REPORT_WRITING_COMPLETED' => '보고서작성완료',
                'REPORT_SUBMITTING' => '보고서제출중',
                'REPORT_SUBMITTED' => '보고서제출완료',
            ],

            'safety_checkType' => [
                'REGULAR_SAFETY_INSPECTION' => '정기안전점검',
                'PRECISE_SAFETY_INSPECTION' => '정밀안전점검',
                'PRECISE_SAFETY_DIAGNOSTIC' => '정밀안전진단',
                'SEISMIC_PERFORMANCE_EVALUATION' => '내진성능평가',
                'STRUCTURAL_SAFETY_ASSESSMENT' => '구조안전성검토',
            ],

            'region' => [
                'SEOUL' => '서울',
                'BUSAN' => '부산',
                'DAEGU' => '대구',
                'INCHEON' => '인천',
                'GWANGJU' => '광주',
                'DAEJEON' => '대전',
                'ULSAN' => '울산',
                'SEJONG' => '세종',
                'GYEONGGI' => '경기',
                'GANGWON' => '강원',
                'CHUNGBUK' => '충북',
                'CHUNGNAM' => '충남',
                'JEONBUK' => '전북',
                'JEONNAM' => '전남',
                'GYEONGBUK' => '경북',
                'GYEONGNAM' => '경남',
                'JEJU' => '제주',
            ],

            'safety_engineer_grade' => [
                'ASSIST' => '참여',
                'BEGINNER' => '초급',
                'INTERMEDIATE' => '중급',
                'ADVANCED' => '고급',
                'EXPERT' => '특급',
            ],

            'safety_engineer_status' => [
                'WAITING' => '대기',
                'ONSITE' => '현장',
                'WORKING' => '작업',
                'RESERVED' => '예약',
            ],
        ];
    }
}
