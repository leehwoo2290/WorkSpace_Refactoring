<?php
declare(strict_types=1);

namespace App\safety\project\getList\dto;

final class SafetyProjectListItem implements \JsonSerializable
{
    private int $projectSeq;          // 프로젝트id
    private int $num;                 // 번호(화면용)
    private ?string $status;          // 상태
    private ?string $checkType;       // 점검 종류
    private ?string $region;          // 지역
    private ?string $placeName;       // 건물명
    private ?string $fieldBeginDate;  // 현장 시작일 (※ 필드명이 filed로 되어있음)
    private ?string $fieldEndDate;    // 현장 종료일
    private ?string $reportDate;      // 보고서 종료일
    private ?string $facilityType;    // 건축물 구분
    private ?string $jong;            // 종별
    private ?string $licenseName;     // 점검업체
    private ?string $engineers;       // 참여 기술진(콤마 구분)
    private ?int $grossArea;          // 연면적

    public function __construct(
        int $projectSeq,
        int $num,
        ?string $status,
        ?string $checkType,
        ?string $region,
        ?string $placeName,
        ?string $fieldBeginDate,
        ?string $fieldEndDate,
        ?string $reportDate,
        ?string $facilityType,
        ?string $jong,
        ?string $licenseName,
        ?string $engineers,
        ?int $grossArea
    ) {
        $this->projectSeq = $projectSeq;
        $this->num = $num;
        $this->status = $status;
        $this->checkType = $checkType;
        $this->region = $region;
        $this->placeName = $placeName;
        $this->fieldBeginDate = $fieldBeginDate;
        $this->fieldEndDate = $fieldEndDate;
        $this->reportDate = $reportDate;
        $this->facilityType = $facilityType;
        $this->jong = $jong;
        $this->licenseName = $licenseName;
        $this->engineers = $engineers;
        $this->grossArea = $grossArea;
    }

    public function jsonSerialize(): array
    {
        return [
            'projectSeq' => $this->projectSeq,
            'num' => $this->num,
            'status' => $this->status,
            'checkType' => $this->checkType,
            'region' => $this->region,
            'placeName' => $this->placeName,
            'fieldBeginDate' => $this->fieldBeginDate,
            'fieldEndDate' => $this->fieldEndDate,
            'reportDate' => $this->reportDate,
            'facilityType' => $this->facilityType,
            'jong' => $this->jong,
            'licenseName' => $this->licenseName,
            'engineers' => $this->engineers,
            'grossArea' => $this->grossArea,
        ];
    }
}
