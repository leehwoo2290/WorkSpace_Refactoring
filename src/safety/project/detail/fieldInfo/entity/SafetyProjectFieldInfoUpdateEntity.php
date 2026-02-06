<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\entity;

use App\common\repository\WritePayloadBuilder;
use App\safety\common\SafetyEnumMaps;
use App\safety\project\detail\fieldInfo\dto\request\SafetyProjectFieldInfoUpdateReq;
use EnumMapper;

final class SafetyProjectFieldInfoUpdateEntity
{
    private ?string $placeName;
    private ?string $uniqueId;
    private ?string $buildingId;
    private ?string $facilityNum;
    private ?string $address;

    private ?string $managerName;
    private ?string $grossArea;
    private ?string $ceoName;
    private ?string $completionDate;

    private ?string $checkType;       // 점검종류 (check_type)
    private ?string $safetyGrade;     // 안전등급 (safety_grade)
    private ?int $facilitySeq;        // 시설물구분 번호 (facility_seq)


    private ?string $picName;
    private ?string $jong;
    private ?string $picTelephone;

    private ?string $facilityRemark;

    private ?string $telephone;
    private ?string $bizno;
    private ?string $color;
    private ?string $liveTourUrl;

    private ?string $requirement;
    private ?string $remark;

    private ?string $facilityAttachmentUrl;
    private ?string $architectureAttachmentUrl;
    private ?string $taskAttachmentUrl;
    private ?string $educationAttachmentUrl;

    private ?string $contractDate;
    private ?string $status;
    private ?string $contractPrice;

    private ?int $licenseSeq;

    private ?int $salesUserSeq;
    private ?string $salesUserEmail;
    private ?string $salesUserTel;

    private ?string $contractPic;
    private ?string $contractPicTelephone;
    private ?string $contractPicEmail;

    private function __construct(
        ?string $placeName,
        ?string $uniqueId,
        ?string $buildingId,
        ?string $facilityNum,
        ?string $address,

        ?string $managerName,
        ?string $grossArea,
        ?string $ceoName,
        ?string $completionDate,

        ?string $picName,
        ?string $jong,
        ?string $picTelephone,

        ?string $checkType,
        ?string $safetyGrade,
        ?int $facilitySeq,

        ?string $facilityRemark,

        ?string $telephone,
        ?string $bizno,
        ?string $color,
        ?string $liveTourUrl,

        ?string $requirement,
        ?string $remark,

        ?string $facilityAttachmentUrl,
        ?string $architectureAttachmentUrl,
        ?string $taskAttachmentUrl,
        ?string $educationAttachmentUrl,

        ?string $contractDate,
        ?string $status,
        ?string $contractPrice,
        ?int $licenseSeq,

        ?int $salesUserSeq,
        ?string $salesUserEmail,
        ?string $salesUserTel,

        ?string $contractPic,
        ?string $contractPicTelephone,
        ?string $contractPicEmail
    ) {
        $this->placeName = $placeName;
        $this->uniqueId = $uniqueId;
        $this->buildingId = $buildingId;
        $this->facilityNum = $facilityNum;
        $this->address = $address;

        $this->managerName = $managerName;
        $this->grossArea = $grossArea;
        $this->ceoName = $ceoName;
        $this->completionDate = $completionDate;

        $this->picName = $picName;
        $this->jong = $jong;
        $this->picTelephone = $picTelephone;

        $this->checkType = $checkType;
        $this->safetyGrade = $safetyGrade;
        $this->facilitySeq = $facilitySeq;

        $this->facilityRemark = $facilityRemark;

        $this->telephone = $telephone;
        $this->bizno = $bizno;
        $this->color = $color;
        $this->liveTourUrl = $liveTourUrl;

        $this->requirement = $requirement;
        $this->remark = $remark;

        $this->facilityAttachmentUrl = $facilityAttachmentUrl;
        $this->architectureAttachmentUrl = $architectureAttachmentUrl;
        $this->taskAttachmentUrl = $taskAttachmentUrl;
        $this->educationAttachmentUrl = $educationAttachmentUrl;

        $this->contractDate = $contractDate;
        $this->status = $status;
        $this->contractPrice = $contractPrice;
        $this->licenseSeq = $licenseSeq;

        $this->salesUserSeq = $salesUserSeq;
        $this->salesUserEmail = $salesUserEmail;
        $this->salesUserTel = $salesUserTel;

        $this->contractPic = $contractPic;
        $this->contractPicTelephone = $contractPicTelephone;
        $this->contractPicEmail = $contractPicEmail;
    }

    private static function toFloatOrNull($v): ?float
    {
        if ($v === null || $v === '')
            return null;
        if (is_float($v))
            return $v;
        if (is_int($v))
            return (float) $v;
        $s = trim((string) $v);
        return $s === '' ? null : (float) $s;
    }

    public static function fromReq(SafetyProjectFieldInfoUpdateReq $req): self
    {
        $maps = SafetyEnumMaps::maps();

        $jong = EnumMapper::map($maps, 'contract_type', $req->jong(), true);
        $safetyGrade = EnumMapper::map($maps, 'work_form', $req->safetyGrade(), true);

        return new self(
            $req->placeName(),
            $req->uniqueId(),
            $req->buildingId(),
            $req->facilityNum(),
            $req->address(),

            $req->managerName(),
            self::toFloatOrNull($req->grossArea()),
            $req->ceoName(),
            $req->completionDate(),

            $req->picName(),
            $jong,
            $req->picTelephone(),

            $req->checkType(),
            $safetyGrade,
            $req->facilitySeq(),

            $req->facilityRemark(),

            $req->telephone(),
            $req->bizno(),
            $req->color(),
            $req->liveTourUrl(),

            $req->requirement(),
            $req->remark(),

            $req->facilityAttachmentUrl(),
            $req->architectureAttachmentUrl(),
            $req->taskAttachmentUrl(),
            $req->educationAttachmentUrl(),

            $req->contractDate(),
            $req->status(),
            $req->contractPrice(),
            $req->licenseSeq(),

            $req->salesUserSeq(),
            $req->salesUserEmail(),
            $req->salesUserTel(),

            $req->contractPic(),
            $req->contractPicTelephone(),
            $req->contractPicEmail()
        );
    }

    /** @return array<string,mixed> */
    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build(
            [
                'placeName' => $this->placeName,
                'uniqueId' => $this->uniqueId,
                'buildingId' => $this->buildingId,
                'facilityNum' => $this->facilityNum,
                'address' => $this->address,

                'managerName' => $this->managerName,
                'grossArea' => $this->grossArea,
                'ceoName' => $this->ceoName,
                'completionDate' => $this->completionDate,

                'picName' => $this->picName,
                'jong' => $this->jong,
                'picTelephone' => $this->picTelephone,

                'facilityRemark' => $this->facilityRemark,

                'telephone' => $this->telephone,
                'bizno' => $this->bizno,
                'color' => $this->color,
                'liveTourUrl' => $this->liveTourUrl,

                'requirement' => $this->requirement,
                'remark' => $this->remark,

                'facilityAttachmentUrl' => $this->facilityAttachmentUrl,
                'architectureAttachmentUrl' => $this->architectureAttachmentUrl,
                'taskAttachmentUrl' => $this->taskAttachmentUrl,
                'educationAttachmentUrl' => $this->educationAttachmentUrl,

                'contractDate' => $this->contractDate,
                'status' => $this->status,
                'contractPrice' => $this->contractPrice,
                'licenseSeq' => $this->licenseSeq,

                // 조인/가공 필드는 보통 DB 업데이트 대상 아님 → 원하면 spec에서 빼도 됨
                'salesUserSeq' => $this->salesUserSeq,
                'salesUserEmail' => $this->salesUserEmail,
                'salesUserTel' => $this->salesUserTel,

                'contractPic' => $this->contractPic,
                'contractPicTelephone' => $this->contractPicTelephone,
                'contractPicEmail' => $this->contractPicEmail,
            ],
            [
                'placeName' => ['col' => 'place_name'],
                'uniqueId' => ['col' => 'unique_id'],
                'buildingId' => ['col' => 'building_id'],
                'facilityNum' => ['col' => 'facility_no'],
                'address' => ['col' => 'addr'],

                'managerName' => ['col' => 'manager_name'],
                'grossArea' => ['col' => 'gross_area'],
                'ceoName' => ['col' => 'ceo_name'],
                'completionDate' => ['col' => 'completion_dt'],

                'picName' => ['col' => 'pic_name'],
                'jong' => ['col' => 'jong'],
                'picTelephone' => ['col' => 'pic_tel'],

                'facilityRemark' => ['col' => 'facility_remark'],

                'telephone' => ['col' => 'tel'],
                'bizno' => ['col' => 'bizno'],
                'color' => ['col' => 'color'],
                'liveTourUrl' => ['col' => 'live_tour_url'],

                'requirement' => ['col' => 'requirement'],
                'remark' => ['col' => 'remark'],

                // url → attachment1~4
                'facilityAttachmentUrl' => ['col' => 'attachment1'],
                'architectureAttachmentUrl' => ['col' => 'attachment2'],
                'taskAttachmentUrl' => ['col' => 'attachment3'],
                'educationAttachmentUrl' => ['col' => 'attachment4'],

                'contractDate' => ['col' => 'contract_dt'],
                'status' => ['col' => 'status'],
                'contractPrice' => ['col' => 'contract_price'],
                'licenseSeq' => ['col' => 'license_seq'],

                // sales_user_email/tel은 보통 컬럼이 없음(조인 결과) → DB 컬럼 있으면 그때만 매핑
                'salesUserSeq' => ['col' => 'sales_user_seq'],

                'contractPic' => ['col' => 'contract_pic'],
                'contractPicTelephone' => ['col' => 'contract_pic_tel'],
                'contractPicEmail' => ['col' => 'contract_pic_email'],
            ]
        );
    }
}
