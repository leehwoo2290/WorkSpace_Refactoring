<?php
declare(strict_types=1);

namespace App\safety\engineer\detail\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyEngineerDetailRowPreset implements RowPresetInterface
{
    private const T_USER = 'tb_user';
    private const T_PRIVACY = 'tb_user_privacy';
    private const T_ENGINEER = 'tb_safety_engineer';

    private const A_USER = 'u';
    private const A_PRIVACY = 'pr';
    private const A_ENGINEER = 'se';

    /** @return string[] */
    public function selectCols(): array
    {
        $u = self::A_USER;
        $pr = self::A_PRIVACY;
        $se = self::A_ENGINEER;

        return [
            "{$se}.seq AS engineerSeq",
            "{$u}.email AS email",
            "{$u}.name AS name",

            // mobile을 응답 필드명과 동일하게 alias
            "COALESCE({$pr}.mobile, '') AS phoneNumber",

            "{$se}.grade AS grade",
            "{$se}.license_no AS licenseNum",
            "{$se}.remark AS remark",
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        $u = self::A_USER;
        $pr = self::A_PRIVACY;
        $se = self::A_ENGINEER;

        $db->from(self::T_USER . " {$u}");

        // privacy는 없을 수 있음 (LEFT JOIN)
        $db->join(self::T_PRIVACY . " {$pr}", "{$pr}.user_seq = {$u}.seq", 'left');

        // engineer는 user_seq 중복 가능 구조라 최신 1건을 뽑기 위해 정렬을 같이 둠
        $db->join(
            self::T_ENGINEER . " {$se}",
            "{$se}.user_seq = {$u}.seq AND {$se}.deleted = 'N'",
            'inner'
        );

        $db->order_by("{$se}.seq", 'DESC');
    }

    /** @param mixed $db @param mixed $query */
    public function applyWhere($db, $query): void
    {
        $u = self::A_USER;
        $db->where("{$u}.seq", (int) $query);
    }
}
