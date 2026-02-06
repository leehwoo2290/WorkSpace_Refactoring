<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\dto;

/**
 * SafetyProjectFacilityRemarkFilterItem
 *
 * - 시설물종류(세부/remark) 드롭다운 옵션 1개
 * - 값/라벨이 동일한 구조: remark
 */
final class SafetyProjectFacilityRemarkFilterItem implements \JsonSerializable
{
    private ?string $jong;
    private ?string $remark;

    public function __construct(?string $jong, ?string $remark)
    {
        $this->jong = $jong;
        $this->remark = $remark;
    }

    public function jsonSerialize(): array
    {
        return [
            'jong' => $this->jong,
            'remark' => $this->remark,
        ];
    }
}
