<?php
declare(strict_types=1);

namespace App\user\repository;

use App\user\entity\UserLoginLogEntity;
use App\user\dto\query\UserLoginLogListQuery;
use DateTimeImmutable;
use QueryEnumMapper;

final class UserLoginLogRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /** insert 후 seq 반환 */
    public function insert(UserLoginLogEntity $e): int
    {
        $data = [
            'email' => $e->email(),
            'passwd' => $e->passwd(),
            'success' => $e->success(),
            'domain' => $e->domain(),
            'ip_addr' => $e->ipAddr(),
            'user_agent' => $e->userAgent(),
            'country_code' => $e->countryCode(),
            'language' => $e->language(),
            'is_mobile' => $e->isMobile(),
            'device_id' => $e->deviceId(),
            'reg_time' => $e->regTime()->format('Y-m-d H:i:s'),
        ];

        $this->db->insert('tb_user_login_log', $data);

        return (int) $this->db->insert_id();
    }

    /** DB row -> Entity */
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
        $this->baseFromJoin();
        $this->applyWhere($query);

        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(UserLoginLogListQuery $query, string $orderBy = 'log.reg_time DESC'): array
    {
        $this->db->select("
            log.seq,
            log.reg_time,
            log.email,
            log.success,
            log.country_code,
            log.ip_addr,
            log.is_mobile,
            user.name as user_name,
            privacy.mobile,
            license.name as license_name,
            department.name as department_name,
            team.name as team_name
        ", false);

        $this->baseFromJoin();
        $this->applyWhere($query);

        $this->db->order_by($orderBy);
        $this->db->limit($query->size(), $query->offset());

        return $this->db->get()->result();
    }

    private function baseFromJoin(): void
    {
        $this->db->from('tb_user_login_log log');
        $this->db->join('tb_user user', 'user.email=log.email', 'left');
        $this->db->join('tb_license license', 'license.seq=user.license_seq', 'left');
        $this->db->join('tb_user_privacy privacy', 'privacy.user_seq=user.seq', 'left');

        $this->db->join('tb_user_office office', 'office.user_seq=user.seq', 'left');
        $this->db->join('tb_office_department department', 'department.seq=office.department_seq', 'left');
        $this->db->join('tb_office_team team', 'team.seq=office.team_seq', 'left');
    }

    private function applyWhere(UserLoginLogListQuery $query): void
    {
        $where = $query->makeWhere();

        if (!empty($where['searchKeyWord'])) {
            $this->db->like('log.email', (string) $where['searchKeyWord']);
        }

        if (!empty($where['searchKeyWord'])) {
            $this->db->like('log.email', (string) $where['searchKeyWord']);
        }

        // success enum 매핑/검증 (Y/N)
        if (!empty($where['success'])) {
            $maps = [
                'yn' => [
                    'Y' => 'Y',
                    'N' => 'N',
                ],
            ];

            $this->db->where(
                'log.success',
                QueryEnumMapper::map($maps, 'yn', (string) $where['success'])
            );
        }

        if (!empty($where['from'])) {
            $this->db->where('log.reg_time >=', (string) $where['from'] . ' 00:00:00');
        }

        if (!empty($where['to'])) {
            $this->db->where('log.reg_time <=', (string) $where['to'] . ' 23:59:59');
        }
    }
}
