<?php
declare(strict_types=1);

namespace App\user\repository;

use App\common\repository\preset\ListPresetInterface;
use App\common\repository\preset\PresetListRepository;
use App\common\repository\WritePayloadBuilder;

use App\user\dto\query\UserLoginLogListQuery;
use App\user\entity\UserLoginLogEntity;
use App\user\repository\preset\UserLoginLogListPreset;
use DateTimeImmutable;


final class UserLoginLogRepository extends PresetListRepository
{
    protected function preset(): ListPresetInterface
    {
        return new UserLoginLogListPreset();
    }

    public function insert(UserLoginLogEntity $entity): int
    {
        $builder = new WritePayloadBuilder();
        $data = $entity->toDbPayload($builder);

         return $this->insertOrThrow('tb_user_login_log', $data);
    }

    public static function fromRow(object $row): UserLoginLogEntity
    {
        $get = static function (string $k) use ($row) {
            return $row->{$k} ?? null;
        };

        $regTimeRaw = (string) ($get('reg_time') ?? '');
        $regTime = $regTimeRaw !== '' ? new DateTimeImmutable($regTimeRaw) : new DateTimeImmutable('now');

        return new UserLoginLogEntity(
            (int) ($get('seq') ?? 0),
            (string) ($get('email') ?? ''),
            ($get('passwd') !== null && $get('passwd') !== '') ? (string) $get('passwd') : null,
            (string) ($get('success') ?? 'N'),
            ($get('domain') !== null && $get('domain') !== '') ? (string) $get('domain') : null,
            ($get('ip_addr') !== null && $get('ip_addr') !== '') ? (string) $get('ip_addr') : null,
            ($get('user_agent') !== null && $get('user_agent') !== '') ? (string) $get('user_agent') : null,
            ($get('country_code') !== null && $get('country_code') !== '') ? (string) $get('country_code') : null,
            ($get('language') !== null && $get('language') !== '') ? (string) $get('language') : null,
            (string) ($get('is_mobile') ?? ''),
            $regTime,
            ($get('device_id') !== null && $get('device_id') !== '') ? (string) $get('device_id') : null
        );
    }

    public function count(UserLoginLogListQuery $query): int
    {
        return $this->countByPreset($query);
    }

    /** @return object[] */
    public function findList(UserLoginLogListQuery $query): array
    {
        return $this->findListByPreset($query);
    }
}
