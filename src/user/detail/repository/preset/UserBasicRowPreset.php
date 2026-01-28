<?php
declare(strict_types=1);

namespace App\user\detail\repository\preset;

use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\RowPresetInterface;

final class UserBasicRowPreset implements RowPresetInterface
{
    public function selectCols(): array
    {
        return [
            'u.seq AS userSeq',
            'l.name AS licenseName',
            'u.name AS name',
            'u.role AS role',
            'u.status AS status',
            'u.email AS email',
            'u.avatar_file AS avatarFile',
            'u.remark AS remark',
            'u.config AS configJson',
        ];
    }

    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinLicense('u', 'l');
    }

    public function applyWhere($db, $query): void
    {
        $db->where('u.seq', (int) $query);
    }
}
