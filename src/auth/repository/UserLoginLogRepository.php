<?php
declare(strict_types=1);

namespace App\auth\Repository;

use App\auth\entity\UserLoginLogEntity;
use App\auth\dto\UserLoginLogRes;
use DateTimeImmutable;

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
            'passwd' => $e->passwd(),      // 리팩토링에서는 null 권장
            'success' => $e->success(),
            'domain' => $e->domain(),
            'ip_addr' => $e->ipAddr(),
            'user_agent' => $e->userAgent(),
            'country_code' => $e->countryCode(),
            'language' => $e->language(),
            'is_mobile' => $e->isMobile(),
            'device_id' => $e->deviceId(),
            // reg_time은 DB default current_timestamp 사용
        ];

        $this->db->insert('tb_user_login_log', $data);
        return (int) $this->db->insert_id();
    }

    /** 조회 예시: 최신 1건 */
    // public function findLatestByEmail(string $email): ?UserLoginLogEntity
    // {
    //     $this->db->from('tb_user_login_log');
    //     $this->db->where('email', $email);
    //     $this->db->order_by('reg_time', 'DESC');
    //     $this->db->limit(1);

    //     $q = $this->db->get();
    //     if ($q->num_rows() < 1) return null;

    //     return $this->rowToEntity($q->row());
    // }

    /** row(stdClass/array) -> Entity */
    private function rowToEntity($row): UserLoginLogEntity
    {
        $get = static function (string $k) use ($row) {
            if (is_array($row))
                return $row[$k] ?? null;
            if (is_object($row))
                return $row->$k ?? null;
            return null;
        };

        $reg = $get('reg_time');
        $regTime = null;
        if (is_string($reg) && $reg !== '') {
            $regTime = new DateTimeImmutable($reg);
        }

        return new UserLoginLogEntity(
            ($get('seq') !== null) ? (int) $get('seq') : null,
            (string) $get('email'),
            ($get('passwd') !== null && $get('passwd') !== '') ? (string) $get('passwd') : null,
            (string) $get('success'),
            (string) $get('domain'),
            (string) $get('ip_addr'),
            (string) $get('user_agent'),
            (string) $get('country_code'),
            (string) $get('language'),
            (string) $get('is_mobile'),
            $regTime,
            ($get('device_id') !== null && $get('device_id') !== '') ? (string) $get('device_id') : null
        );
    }

    public function count(array $where = []): int
    {
        $this->db->from('tb_user_login_log log');
        $this->db->join('tb_user user', 'user.email=log.email', 'left');
        $this->db->join('tb_license license', 'license.seq=user.license_seq', 'left');
        $this->db->join('tb_user_privacy privacy', 'privacy.user_seq=user.seq', 'left');

        // 소속(부서/팀)까지 쓰려면 아래 join 추가(테이블 없으면 주석)
        $this->db->join('tb_user_office office', 'office.user_seq=user.seq', 'left');
        $this->db->join('tb_office_department department', 'department.seq=office.department_seq', 'left');
        $this->db->join('tb_office_team team', 'team.seq=office.team_seq', 'left');

        $this->applyWhere($where);

        return (int) $this->db->count_all_results();
    }

    /**
     * @return object[] row list
     */
    public function findList(array $where, int $offset, int $limit, string $orderBy = 'log.reg_time DESC'): array
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

        $this->db->from('tb_user_login_log log');
        $this->db->join('tb_user user', 'user.email=log.email', 'left');
        $this->db->join('tb_license license', 'license.seq=user.license_seq', 'left');
        $this->db->join('tb_user_privacy privacy', 'privacy.user_seq=user.seq', 'left');

        $this->db->join('tb_user_office office', 'office.user_seq=user.seq', 'left');
        $this->db->join('tb_office_department department', 'department.seq=office.department_seq', 'left');
        $this->db->join('tb_office_team team', 'team.seq=office.team_seq', 'left');

        $this->applyWhere($where);

        $this->db->order_by($orderBy);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    private function applyWhere(array $where): void
    {
        if (!empty($where['email'])) {
            $this->db->like('log.email', (string) $where['email']);
        }

        if (!empty($where['success'])) {
            $this->db->where('log.success', (string) $where['success']); // 'Y'|'N'
        }

        if (!empty($where['from'])) {
            $this->db->where('log.reg_time >=', (string) $where['from'] . ' 00:00:00');
        }

        if (!empty($where['to'])) {
            $this->db->where('log.reg_time <=', (string) $where['to'] . ' 23:59:59');
        }
    }

}
