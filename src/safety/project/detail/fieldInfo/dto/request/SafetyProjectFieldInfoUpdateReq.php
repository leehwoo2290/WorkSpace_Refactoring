<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\dto\request;

use App\common\dto\ReqDtoBase;

/**
 * SafetyProjectFieldInfoUpdateReq
 *
 * - Safety 프로젝트 상세 > 현장정보(FieldInfo) PUT payload
 * - 현 프로젝트의 다른 PUT(Update/Upsert)들과 동일하게: "키가 존재하면 null이라도 업데이트 의도"로 간주
 */
final class SafetyProjectFieldInfoUpdateReq extends ReqDtoBase
{
    // ===== 관리주체 현황(현장정보) =====
    private ?string $placeName;       // 건물명 (tb_safety_project.place_name)
    private ?string $uniqueId;        // 고유번호 (unique_id)
    private ?string $buildingId;      // 건물 ID (building_id)
    private ?string $facilityNum;      // 시설물 번호 (facility_no)
    private ?string $address;            // 주소 (addr)

    private ?string $managerName;     // 관리주체명 (manager_name)
    private ?float $grossArea;        // 연면적 (gross_area)
    private ?string $ceoName;         // 대표자명 (ceo_name)
    private ?string $completionDate;  // 준공일 (completion_dt, Y-m-d)

    private ?string $checkType;       // 점검종류 (check_type)
    private ?string $safetyGrade;     // 안전등급 (safety_grade)

    private ?int $facilitySeq;        // 시설물구분 번호 (facility_seq)

    private ?string $picName;         // 담당자(상대방) (pic_name)
    private ?string $jong;            // 종별 (jong)
    private ?string $picTelephone;          // 담당자 연락처 (pic_tel)

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
    private ?string $salesUserTel;    // (가공/조인) sales_user_tel

    // 계약상대자(외부: 프로젝트에 직접 저장)
    private ?string $contractPic;      // 계약상대자 이름 (contract_pic)
    private ?string $contractPicTelephone;   // 계약상대자 연락처 (contract_pic_tel)
    private ?string $contractPicEmail; // 계약상대자 이메일 (contract_pic_email)

    public function __construct(
        ?string $placeName,
        ?string $uniqueId,
        ?string $buildingId,
        ?string $facilityNum,
        ?string $address,

        ?string $managerName,
        ?float $grossArea,
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
        $this->salesUserTel = $salesUserTel;

        $this->contractPic = $contractPic;
        $this->contractPicTelephone = $contractPicTelephone;
        $this->contractPicEmail = $contractPicEmail;
    }

    /** @param array<string,mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            // placeName, uniqueId, buildingId, facilityNum, address
            self::toStrOrNull(self::pick($data, 'placeName', 'place_name')),
            self::toStrOrNull(self::pick($data, 'uniqueId', 'unique_id')),
            self::toStrOrNull(self::pick($data, 'buildingId', 'building_id')),
            self::toStrOrNull(self::pick($data, 'facilityNum', 'facility_Num')),
            self::toStrOrNull(self::pick($data, 'address', 'addr')),

            // managerName, grossArea, ceoName, completionDate
            self::toStrOrNull(self::pick($data, 'managerName', 'manager_name')),
            self::toStrOrNull(self::pick($data, 'grossArea', 'gross_area')),
            self::toStrOrNull(self::pick($data, 'ceoName', 'ceo_name')),
            self::toStrOrNull(self::pick($data, 'completionDate', 'completionDt')),

            // checkType, safetyGrade
            self::toStrOrNull(self::pick($data, 'checkType', 'check_type')),
            self::toStrOrNull(self::pick($data, 'safetyGrade', 'safety_grade')),

            // facilitySeq
            self::toIntOrNull(self::pick($data, 'facilitySeq', 'facility_seq')),

            // picName, jong, picTelephone
            self::toStrOrNull(self::pick($data, 'picName', 'pic_name')),
            self::toStrOrNull(self::pick($data, 'jong')),
            self::toStrOrNull(self::pick($data, 'picTelephone', 'picTel')),

            // facilityRemark
            self::toStrOrNull(self::pick($data, 'facilityRemark', 'facility_remark')),

            // telephone, bizno, color, liveTourUrl
            self::toStrOrNull(self::pick($data, 'telephone', 'tel')),
            self::toStrOrNull(self::pick($data, 'bizno')),
            self::toStrOrNull(self::pick($data, 'color')),
            self::toStrOrNull(self::pick($data, 'liveTourUrl', 'live_tour_url')),

            // requirement, remark
            self::toStrOrNull(self::pick($data, 'requirement', 'requirements')),
            self::toStrOrNull(self::pick($data, 'remark')),

            // facilityAttachmentUrl, architectureAttachmentUrl, taskAttachmentUrl, educationAttachmentUrl
            self::toStrOrNull(self::pick($data, 'facilityAttachmentUrl', 'attachment1')),
            self::toStrOrNull(self::pick($data, 'architectureAttachmentUrl', 'attachment2')),
            self::toStrOrNull(self::pick($data, 'taskAttachmentUrl', 'attachment3')),
            self::toStrOrNull(self::pick($data, 'educationAttachmentUrl', 'attachment4')),

            // contractDate, status, contractPrice
            self::toStrOrNull(self::pick($data, 'contractDate', 'contractDt')),
            self::toStrOrNull(self::pick($data, 'status')),
            self::toStrOrNull(self::pick($data, 'contractPrice', 'contract_price')),

            // salesUserSeq, salesUserEmail, salesUserTel
            self::toIntOrNull(self::pick($data, 'salesUserSeq', 'sales_user_seq')),
            self::toStrOrNull(self::pick($data, 'salesUserEmail', 'sales_user_email')),
            self::toStrOrNull(self::pick($data, 'salesUserTel', 'sales_user_tel')),

            // contractPic, contractPicTelephone, contractPicEmail
            self::toStrOrNull(self::pick($data, 'contractPic', 'contract_pic')),
            self::toStrOrNull(self::pick($data, 'contractPicTelephone', 'contractPicTel')),
            self::toStrOrNull(self::pick($data, 'contractPicEmail', 'contract_pic_email')),
        );
    }
    // ===== 기본 필드 =====
    public function placeName(): ?string
    {
        return $this->placeName;
    }
    public function uniqueId(): ?string
    {
        return $this->uniqueId;
    }
    public function buildingId(): ?string
    {
        return $this->buildingId;
    }
    public function facilityNum(): ?string
    {
        return $this->facilityNum;
    }     // 원본명

    public function address(): ?string
    {
        return $this->address;
    }

    public function managerName(): ?string
    {
        return $this->managerName;
    }
    public function grossArea(): ?string
    {
        return $this->grossArea;
    }          //  float 유지
    public function ceoName(): ?string
    {
        return $this->ceoName;
    }

    public function completionDate(): ?string
    {
        return $this->completionDate;
    }
    public function checkType(): ?string
    {
        return $this->checkType;
    }
    public function safetyGrade(): ?string
    {
        return $this->safetyGrade;
    }

    public function facilitySeq(): ?int
    {
        return $this->facilitySeq;
    }

    // facilityType은 프로퍼티가 없으니 제거하거나, 정말 필요하면 null 반환으로만 유지
    public function facilityType(): ?string
    {
        return null;
    } // (선택) 기존 호출부가 있으면 안전용

    public function picName(): ?string
    {
        return $this->picName;
    }
    public function jong(): ?string
    {
        return $this->jong;
    }

    public function picTelephone(): ?string
    {
        return $this->picTelephone;
    }

    public function facilityRemark(): ?string
    {
        return $this->facilityRemark;
    }

    public function telephone(): ?string
    {
        return $this->telephone;
    }

    public function bizno(): ?string
    {
        return $this->bizno;
    }
    public function color(): ?string
    {
        return $this->color;
    }
    public function liveTourUrl(): ?string
    {
        return $this->liveTourUrl;
    }

    public function requirement(): ?string
    {
        return $this->requirement;
    }

    public function remark(): ?string
    {
        return $this->remark;
    }

    // ===== 첨부파일(프로퍼티명에 맞게) =====
    public function facilityAttachmentUrl(): ?string
    {
        return $this->facilityAttachmentUrl;
    }
    public function architectureAttachmentUrl(): ?string
    {
        return $this->architectureAttachmentUrl;
    }
    public function taskAttachmentUrl(): ?string
    {
        return $this->taskAttachmentUrl;
    }
    public function educationAttachmentUrl(): ?string
    {
        return $this->educationAttachmentUrl;
    }

    // ===== 계약 =====
    public function contractDate(): ?string
    {
        return $this->contractDate;
    }

    public function status(): ?string
    {
        return $this->status;
    }

    public function contractPrice(): ?string
    {
        return $this->contractPrice;
    }

    // licenseSeq는 프로퍼티는 있는데 생성자/할당이 없으니 지금은 getter만 두면 null 고정됨
    public function licenseSeq(): ?int
    {
        return $this->licenseSeq;
    }           // (필요하면 fromArray/생성자에도 추가)

    // ===== 계약담당(내부) =====
    public function salesUserSeq(): ?int
    {
        return $this->salesUserSeq;
    }
    public function salesUserEmail(): ?string
    {
        return $this->salesUserEmail;
    }
    public function salesUserTel(): ?string
    {
        return $this->salesUserTel;
    }

    // ===== 계약상대자(외부) =====
    public function contractPic(): ?string
    {
        return $this->contractPic;
    }

    public function contractPicTelephone(): ?string
    {
        return $this->contractPicTelephone;
    }

    public function contractPicEmail(): ?string
    {
        return $this->contractPicEmail;
    }

}
