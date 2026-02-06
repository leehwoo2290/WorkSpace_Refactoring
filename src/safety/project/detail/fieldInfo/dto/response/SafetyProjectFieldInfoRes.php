<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\dto\response;

final class SafetyProjectFieldInfoRes implements \JsonSerializable
{
    // ===== 기본 키/식별 =====
    //private int $seq;                 // 프로젝트 seq
    private ?string $projectName;            // 프로젝트명(가공된 이름일 수도 있음)

    // ===== 관리주체 현황(현장정보) =====
    private ?string $placeName;       // 건물명 (tb_safety_project.place_name)
    private ?string $uniqueId;        // 고유번호 (unique_id)
    private ?string $buildingId;      // 건물 ID (building_id)
    private ?string $facilityNum;      // 시설물 번호 (facility_no)
    private ?string $address;            // 주소 (addr)

    private ?string $managerName;     // 관리주체명 (manager_name)
    private ?string $grossArea;        // 연면적 (gross_area)
    private ?string $ceoName;         // 대표자명 (ceo_name)
    private ?string $completionDate;  // 준공일 (completion_dt, Y-m-d)

    private ?string $checkType;       // 점검종류 (check_type)
    private ?string $safetyGrade;     // 안전등급 (safety_grade)

    private ?int $facilitySeq;        // 시설물구분 번호 (facility_seq)

    private ?string $picName;         // 담당자(상대방) (pic_name)
    private ?string $jong;            // 종별 (jong)
    private ?string $picTelephone;    // 담당자 연락처 (pic_tel)

    private ?string $facilityRemark;  // 시설물종류(설명 문자열) (facility_remark)

    private ?string $telephone;             // 전화번호 (tel)
    private ?string $bizno;           // 사업자번호 (bizno)
    private ?string $color;           // 색상(hex) (color)
    private ?string $liveTourUrl;     // 3D URL (live_tour_url)

    private ?string $requirement;     // 요청사항 (requirement)
    private ?string $remark;          // 비고 (remark)

    // ===== 첨부파일 =====
    private ?string $facilityAttachmentUrl;     // 시설물대장 파일경로 (attachment1)
    private ?string $architectureAttachmentUrl;     // 건축물대장 파일경로 (attachment2)
    private ?string $taskAttachmentUrl;     // 과업지시서 파일경로 (attachment3)
    private ?string $educationAttachmentUrl;     // 교육수료증 파일경로 (attachment4)

    // ===== 계약사항 =====
    private ?string $contractDate;    // 계약일 (contract_dt, Y-m-d)
    private ?string $status;          // 진행상태 (status)
    private ?string $contractPrice;   // 계약 금액
    private ?int $licenseSeq;         // 점검업체 seq
    //private ?string $vatIncYn;        // 부가세 포함 여부 (vat_inc_yn: Y/N)

    // 계약담당자(내부: sales_user_seq 기반)
    private ?int $salesUserSeq;       // 영업/계약담당 사용자 seq (sales_user_seq)
    private ?string $salesUserEmail;  // (가공/조인) sales_user_email
    private ?string $salesUserTelephone;    // (가공/조인) sales_user_tel

    // 계약상대자(외부: 프로젝트에 직접 저장)
    private ?string $contractPic;      // 계약상대자 이름 (contract_pic)
    private ?string $contractPicTelephone;   // 계약상대자 연락처 (contract_pic_tel)
    private ?string $contractPicEmail; // 계약상대자 이메일 (contract_pic_email)

    public function __construct(
        ?string $projectName,
        ?int $licenseSeq,

        ?string $placeName,
        ?string $uniqueId,
        ?string $buildingId,
        ?string $facilityNum,
        ?string $address,

        ?string $managerName,
        ?string $grossArea,
        ?string $ceoName,
        ?string $completionDate,

        ?string $checkType,
        ?string $safetyGrade,

        ?int $facilitySeq,

        ?string $picName,
        ?string $jong,
        ?string $picTelephone,

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

        ?int $salesUserSeq,
        ?string $salesUserEmail,
        ?string $salesUserTelephone,

        ?string $contractPic,
        ?string $contractPicTelephone,
        ?string $contractPicEmail
    ) {
        $this->projectName = $projectName;
        $this->licenseSeq = $licenseSeq;

        $this->placeName = $placeName;
        $this->uniqueId = $uniqueId;
        $this->buildingId = $buildingId;
        $this->facilityNum = $facilityNum;
        $this->address = $address;

        $this->managerName = $managerName;
        $this->grossArea = $grossArea;
        $this->ceoName = $ceoName;
        $this->completionDate = $completionDate;

        $this->checkType = $checkType;
        $this->safetyGrade = $safetyGrade;

        $this->facilitySeq = $facilitySeq;

        $this->picName = $picName;
        $this->jong = $jong;
        $this->picTelephone = $picTelephone;

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

        $this->salesUserSeq = $salesUserSeq;
        $this->salesUserEmail = $salesUserEmail;
        $this->salesUserTelephone = $salesUserTelephone;

        $this->contractPic = $contractPic;
        $this->contractPicTelephone = $contractPicTelephone;
        $this->contractPicEmail = $contractPicEmail;
    }

    /**
     * @param array<string,mixed>|object $row
     */
    public static function fromRow($row): self
    {
        $get = static function ($row, string $key) {
            if (is_array($row)) return $row[$key] ?? null;
            if (is_object($row)) return $row->{$key} ?? null;
            return null;
        };

        $toInt = static function ($v): ?int {
            if ($v === null || $v === '') return null;
            return (int)$v;
        };

        $toFloat = static function ($v): ?float {
            if ($v === null || $v === '') return null;
            return (float)$v;
        };

        $toStr = static function ($v): ?string {
            if ($v === null) return null;
            $s = trim((string)$v);
            return $s === '' ? null : $s;
        };

        return new self(
            $get($row, 'projectName'),
            $toInt($get($row, 'license_seq')),

            $toStr($get($row, 'place_name')),
            $toStr($get($row, 'unique_id')),
            $toStr($get($row, 'building_id')),
            $toStr($get($row, 'facility_no')),
            $toStr($get($row, 'addr')),

            $toStr($get($row, 'manager_name')),
            $toStr($get($row, 'gross_area')),
            $toStr($get($row, 'ceo_name')),
            $toStr($get($row, 'completion_dt')),

            $toStr($get($row, 'check_type')),
            $toStr($get($row, 'safety_grade')),

            $toInt($get($row, 'facility_seq')),

            $toStr($get($row, 'pic_name')),
            $toStr($get($row, 'jong')),
            $toStr($get($row, 'pic_tel')),

            $toStr($get($row, 'facility_remark')),

            $toStr($get($row, 'tel')),
            $toStr($get($row, 'bizno')),
            $toStr($get($row, 'color')),
            $toStr($get($row, 'live_tour_url')),

            $toStr($get($row, 'requirement')),
            $toStr($get($row, 'remark')),

            $toStr($get($row, 'attachment1')),
            $toStr($get($row, 'attachment2')),
            $toStr($get($row, 'attachment3')),
            $toStr($get($row, 'attachment4')),

            $toStr($get($row, 'contract_dt')),
            $toStr($get($row, 'status')),
            $toStr($get($row, 'contract_price')),

            $toInt($get($row, 'sales_user_seq')),
            $toStr($get($row, 'sales_user_email')),
            $toStr($get($row, 'sales_user_tel')),

            $toStr($get($row, 'contract_pic')),
            $toStr($get($row, 'contract_pic_tel')),
            $toStr($get($row, 'contract_pic_email'))
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'projectName' => $this->projectName,

            'placeName' => $this->placeName,
            'uniqueId' => $this->uniqueId,
            'buildingId' => $this->buildingId,
            'facilityNo' => $this->facilityNum,
            'address' => $this->address,

            'managerName' => $this->managerName,
            'grossArea' => $this->grossArea,
            'ceoName' => $this->ceoName,
            'completionDate' => $this->completionDate,

            'checkType' => $this->checkType,
            'safetyGrade' => $this->safetyGrade,

            'facilitySeq' => $this->facilitySeq,

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

            'salesUserSeq' => $this->salesUserSeq,
            'salesUserEmail' => $this->salesUserEmail,
            'salesUserTelephone' => $this->salesUserTelephone,

            'contractPic' => $this->contractPic,
            'contractPicTelephone' => $this->contractPicTelephone,
            'contractPicEmail' => $this->contractPicEmail,
        ];
    }
}
