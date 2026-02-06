<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\repository\preset;

use App\common\repository\preset\ListPresetInterface;

final class SafetyFacilityRemarkByJongListPreset implements ListPresetInterface
{
    private const T_FACILITY_REMARK = 'tb_safety_facility_remark';
    private const A_FACILITY_REMARK = 'fr';

    /** @return string[] */
    public function selectCols(): array
    {
        $fr = self::A_FACILITY_REMARK;

        return [
            "{$fr}.remark AS remark",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $fr = self::A_FACILITY_REMARK;

        $db->from(self::T_FACILITY_REMARK . " {$fr}");
    }

    /** @param mixed $db @param mixed $query */
    public function applyWhere($db, $query): void
    {
         $fr = self::A_FACILITY_REMARK;
         
        if ($query instanceof SafetyProjectFieldInfoFacilityRemarkFilterQuery) {
            $jong = trim((string) $query->jong());
        } elseif (is_array($query)) {
            // (혹시 배열로 넘기는 경우까지 방어)
            $jong = trim((string) ($query['jong'] ?? ''));
        } else {
            // 기존 문자열 방식도 호환
            $jong = trim((string) $query);
        }

        if ($jong === '') {
            $db->where('1=', '0', false);
            return;
        }

        $db->where("{$fr}.jong", $jong);
    }

    /** @param mixed $db @param mixed $query */
    public function applyOrderBy($db, $query): void
    {
        $fr = self::A_FACILITY_REMARK;

        // `order` 예약어 -> 백틱 + escape 끔(false)
        $db->order_by("{$fr}.`order`", 'ASC', false);
        $db->order_by("{$fr}.remark", 'ASC');
    }
}
