<?php
declare(strict_types=1);

namespace App\userDetail\repository\preset;

use App\common\repository\preset\RowPresetInterface;

final class UserPermissionsRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return ['*'];
    }

    public function baseFromJoin($db): void
    {
        $db->from('tb_user_permissions');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('user_seq', (int) $query);
    }
}
