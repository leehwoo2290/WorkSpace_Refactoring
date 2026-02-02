<?php
declare(strict_types=1);

namespace App\safety\project\add\entity;

use App\common\repository\WritePayloadBuilder;

final class SafetyProjectAddEntity
{
    private int $userSeq;
    private int $licenseSeq;
    private string $checkType;
    private string $placeName;
    private ?string $facilityNum;
    private ?string $uniqueNum;
    private ?string $buildingId;
    private string $inspectionBeginDate;
    private string $inspectionEndDate;
    private ?string $fieldBeginDate;
    private ?string $fieldEndDate;
    private ?string $remark;

    public function __construct(
        int $userSeq,
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
        ?string $remark,
    ) {
        $this->userSeq = $userSeq;
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

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'userSeq' => $this->userSeq,
            'licenseSeq' => $this->licenseSeq,
            'checkType' => $this->checkType,
            'placeName' => $this->placeName,
            'facilityNum' => $this->facilityNum,
            'uniqueNum' => $this->uniqueNum,
            'buildingId' => $this->buildingId,
            'inspectionBeginDate' => $this->inspectionBeginDate,
            'inspectionEndDate' => $this->inspectionEndDate,
            'fieldBeginDate' => $this->fieldBeginDate,
            'fieldEndDate' => $this->fieldEndDate,
            'remark' => $this->remark,
            'deleted' => 'N',
        ], [
            'userSeq' => ['col' => 'user_seq'],
            'licenseSeq' => ['col' => 'license_seq'],
            'checkType' => ['col' => 'check_type'],
            'placeName' => ['col' => 'place_name'],
            'facilityNum' => ['col' => 'facility_no'],
            'uniqueNum' => ['col' => 'unique_id'],
            'buildingId' => ['col' => 'building_id'],
            'fieldBeginDate' => ['col' => 'field_bgn_dt'],
            'fieldEndDate' => ['col' => 'field_end_dt'],
            'inspectionBeginDate' => ['col' => 'bgn_dt'],
            'inspectionEndDate' => ['col' => 'end_dt'],
            'remark' => ['col' => 'remark'],
            'deleted' => ['col' => 'deleted'],
        ]);
    }
}
