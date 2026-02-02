<?php
declare(strict_types=1);

namespace App\safety\project\add\dto\request;

use App\common\dto\ReqDtoBase;

final class SafetyProjectAddReq extends ReqDtoBase
{
    private int $licenseSeq;        // 점검 업체
    private string $checkType;      // 점검 종류
    private string $placeName;      // 건물명
    private ?string $facilityNum;    // 시설물 번호
    private ?string $uniqueNum;      // 고유 번호
    private ?string $buildingId;     // 건물 ID
    private string $inspectionBeginDate; //점검 시작
    private string $inspectionEndDate;  //점검 종료
    private ?string $fieldBeginDate; // 투입 시작 (YYYY-MM-DD)
    private ?string $fieldEndDate;   // 투입 종료 (YYYY-MM-DD)
    private ?string $remark;         // 비고

    public function __construct(
        int $licenseSeq,
        string $checkType,
        string $placeName,
        ?string $facilityNum,
        ?string $uniqueNum,
        ?string $buildingId,
        string $inspectionBeginDate,
        string $inspectionEndDate,
        ?string $fieldBeginDate,
        ?string $fieldEndDate,
        ?string $remark
    ) {
        $this->licenseSeq = $licenseSeq;
        $this->checkType = $checkType;
        $this->placeName = $placeName;
        $this->facilityNum = $facilityNum;
        $this->uniqueNum = $uniqueNum;
        $this->buildingId = $buildingId;
        $this->inspectionBeginDate = $inspectionBeginDate;
        $this->inspectionEndDate = $inspectionEndDate;
        $this->fieldBeginDate = $fieldBeginDate;
        $this->fieldEndDate = $fieldEndDate;
        $this->remark = $remark;
    }

    public static function fromArray(array $data): self
    {
        // array_key_exists로 null 입력도 "의도된 null"로 처리
        $licenseSeq = self::toInt(self::get($data, ['license_seq', 'licenseSeq'], 0));
        $checkType = self::toStr(self::get($data, ['check_type', 'checkType'], ''));
        $placeName = self::toStr(self::get($data, ['place_name', 'placeName'], ''));

        $facilityNum = self::toStrOrNull(self::get($data, ['facility_no', 'facility_num', 'facilityNum'], null));
        $uniqueNum = self::toStrOrNull(self::get($data, ['unique_id', 'unique_num', 'uniqueNum'], null));
        $buildingId = self::toStrOrNull(self::get($data, ['building_id', 'buildingId'], null));

        // 프로젝트에 field_bgn_dt/field_end_dt가 섞여있을 수 있어 alias 지원
        $fieldBeginDate = self::toStrOrNull(self::get($data, ['field_begin_date', 'fieldBeginDate'], ''));
        $fieldEndDate = self::toStrOrNull(self::get($data, ['field_end_date', 'fieldEndDate'], ''));

        $inspectionBeginDate = self::toStr(self::get($data, ['inspection_begin_date', 'inspectionBeginDate'], ''));
        $inspectionEndDate = self::toStr(self::get($data, ['inspection_end_date', 'inspectionndDate'], ''));

        $remark = self::toStrOrNull(self::get($data, ['remark'], null));

        return new self(
            $licenseSeq,
            $checkType,
            $placeName,
            $facilityNum,
            $uniqueNum,
            $buildingId,
            $inspectionBeginDate,
            $inspectionEndDate,
            $fieldBeginDate,
            $fieldEndDate,
            $remark
        );
    }

    // getters (프로젝트 스타일에 맞게 name() 대신 xxx()로 제공)
    public function licenseSeq(): int
    {
        return $this->licenseSeq;
    }
    public function checkType(): string
    {
        return $this->checkType;
    }
    public function placeName(): string
    {
        return $this->placeName;
    }
    public function facilityNum(): ?string
    {
        return $this->facilityNum;
    }
    public function uniqueNum(): ?string
    {
        return $this->uniqueNum;
    }
    public function buildingId(): ?string
    {
        return $this->buildingId;
    }
    public function inspectionBeginDate(): ?string
    {
        return $this->inspectionBeginDate;
    }
    public function inspectionEndDate(): ?string
    {
        return $this->inspectionEndDate;
    }
    public function fieldBeginDate(): ?string
    {
        return $this->fieldBeginDate;
    }
    public function fieldEndDate(): ?string
    {
        return $this->fieldEndDate;
    }
    public function remark(): ?string
    {
        return $this->remark;
    }
}
