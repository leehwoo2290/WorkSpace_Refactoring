<?php
declare(strict_types=1);

namespace App\safety\project\autocomplete\dto;

final class SafetyProjectAutocompleteItem implements \JsonSerializable
{
    private string $placeName;       // 건물명
    private ?string $facilityNum;    // 시설물 번호
    private ?string $uniqueNum;      // 고유 번호
    private ?string $buildingId;     // 건물 ID

    public function __construct(
        string $placeName,
        ?string $facilityNum,
        ?string $uniqueNum,
        ?string $buildingId
    ) {
        $this->placeName = $placeName;
        $this->facilityNum = $facilityNum;
        $this->uniqueNum = $uniqueNum;
        $this->buildingId = $buildingId;
    }

    public function jsonSerialize(): array
    {
        return [
            'placeName' => $this->placeName,
            'facilityNum' => $this->facilityNum,
            'uniqueNum' => $this->uniqueNum,
            'buildingId' => $this->buildingId,
        ];
    }
}
