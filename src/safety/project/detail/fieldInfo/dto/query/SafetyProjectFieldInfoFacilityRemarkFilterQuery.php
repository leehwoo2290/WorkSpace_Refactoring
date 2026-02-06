<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\dto\query;

use App\common\dto\HttpQueryDto;
use App\safety\common\SafetyEnumMaps;
use EnumMapper;

/**
 * SafetyProjectFieldInfoUpdateReq
 *
 * - Safety 프로젝트 상세 > 현장정보(FieldInfo) PUT payload
 * - 현 프로젝트의 다른 PUT(Update/Upsert)들과 동일하게: "키가 존재하면 null이라도 업데이트 의도"로 간주
 */
final class SafetyProjectFieldInfoFacilityRemarkFilterQuery implements HttpQueryDto
{
    private ?string $jong;      

    public function __construct(
        ?string $jong     
    ) {
        $this->jong = $jong;       
    }

    public static function fromArray(array $query): self
    {
        $maps = SafetyEnumMaps::maps();
        $raw = $query['jong'] ?? null;
        $jongMapped = EnumMapper::map($maps, 'safety_facility_jong', $raw, true);
        return new self(
            // placeName, uniqueId, buildingId, facilityNum, address
            
            $jongMapped
           
        );
    }
  
    /** repository where 배열로 변환 */
    public function makeWhere(): array
    {
       return ['jong' => $this->jong];
    }

    public function jong(): ?string
    {
        return $this->jong;
    }
}
