<?php
declare(strict_types=1);

namespace App\safety\project\detail\fieldInfo\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyProjectFieldInfoRowPreset implements RowPresetInterface
{
    private const T_PROJECT = 'tb_safety_project';
    private const T_USER = 'tb_user';
    private const T_PRIVACY = 'tb_user_privacy';
    private const T_FACILITY_TYPE = 'tb_safety_facility_type';

    private const A_PROJECT = 'p';
    private const A_SALES_USER = 'su';
    private const A_SALES_PRIVACY = 'sp';
    private const A_FACILITY_TYPE = 'ft';

    /** @return string[] */
    public function selectCols(): array
    {
        $p = self::A_PROJECT;
        $su = self::A_SALES_USER;
        $sp = self::A_SALES_PRIVACY;
        $ft = self::A_FACILITY_TYPE;

        return [
                "CONCAT_WS(' ',
                    {$p}.place_name,
                    IF({$p}.bgn_dt IS NULL, NULL,
                        CONCAT(
                            YEAR({$p}.bgn_dt),
                            '년 ',
                             IF(MONTH({$p}.bgn_dt) BETWEEN 1 AND 6, '상반기', '하반기')
                    )
                ),
                {$ft}.name,
                {$p}.check_type
            ) AS projectName",
            "{$p}.license_seq",
            "{$p}.place_name",
            "{$p}.unique_id",
            "{$p}.building_id",
            "{$p}.facility_no",
            "{$p}.addr",
            "{$p}.manager_name",
            "{$p}.gross_area",
            "{$p}.ceo_name",
            "{$p}.completion_dt",
            "{$p}.check_type",
            "{$p}.safety_grade",
            "{$p}.facility_seq",
            "{$p}.pic_name",
            "{$p}.jong",
            "{$p}.pic_tel",
            "IFNULL({$p}.facility_remark, {$ft}.name) AS facility_remark",
            "{$p}.tel",
            "{$p}.bizno",
            "{$p}.color",
            "{$p}.live_tour_url",
            "{$p}.requirement",
            "{$p}.remark",
            "{$p}.attachment1",
            "{$p}.attachment2",
            "{$p}.attachment3",
            "{$p}.attachment4",
            "{$p}.contract_dt",
            "{$p}.status",
            "{$p}.contract_price",
            "{$p}.sales_user_seq",
            "{$su}.email AS sales_user_email",
            "{$sp}.mobile AS sales_user_tel",
            "{$p}.contract_pic",
            "{$p}.contract_pic_tel",
            "{$p}.contract_pic_email",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $p = self::A_PROJECT;
        $su = self::A_SALES_USER;
        $sp = self::A_SALES_PRIVACY;
        $ft = self::A_FACILITY_TYPE;

        $db->from(self::T_PROJECT . " {$p}");

        // 계약/영업담당자(내부). 없을 수 있으므로 LEFT JOIN
        $db->join(self::T_USER . " {$su}", "{$su}.seq = {$p}.sales_user_seq", 'left');
        $db->join(self::T_PRIVACY . " {$sp}", "{$sp}.user_seq = {$su}.seq", 'left');

        // 시설물 구분 이름(없을 수 있으므로 LEFT JOIN)
        $db->join(self::T_FACILITY_TYPE . " {$ft}", "{$ft}.seq = {$p}.facility_seq", 'left');
    }

    /** @param mixed $db @param mixed $query */
    public function applyWhere($db, $query): void
    {
        $p = self::A_PROJECT;

        $db->where("{$p}.seq", (int) $query);
        $db->where("{$p}.deleted", 'N');
    }
}
