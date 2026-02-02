<?php
declare(strict_types=1);

namespace App\safety\engineer\add\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class SafetyEngineerUserByEmailRowPreset implements RowPresetInterface
{
    private const T_USER = 'tb_user';
    private const A_USER = 'u';

    public function selectCols(): array
    {
        $u = self::A_USER;

        return [
            "{$u}.seq AS user_seq",
            "{$u}.status AS status",
            "{$u}.license_seq AS license_seq",
        ];
    }

    public function baseFromJoin($db): void
    {
        $db->from(self::T_USER . ' ' . self::A_USER);
    }

    /** @param mixed $query email(string) */
    public function applyWhere($db, $query): void
    {
        $u = self::A_USER;
        $db->where("{$u}.email", (string) $query);
    }
}
