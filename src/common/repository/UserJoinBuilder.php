<?php
declare(strict_types=1);

namespace App\common\repository;

/**
 * UserJoinBuilder
 *
 * user 계열 Repository에서 반복되는 JOIN 세트를 한 곳으로 모으기 위한 빌더.
 * - alias는 Repository에서 필요에 따라 지정 가능
 * - 'from' 테이블은 상황에 따라 user(u) / login_log(log) 둘 다 지원
 */
final class UserJoinBuilder
{
    /** @var mixed CI_DB_query_builder */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // ----------------------------
    // FROM
    // ----------------------------

    public function fromUser(string $u = 'u'): self
    {
        $this->db->from('tb_user ' . $u);
        return $this;
    }

    public function fromLoginLog(string $log = 'log'): self
    {
        $this->db->from('tb_user_login_log ' . $log);
        return $this;
    }

    public function fromOffice(string $o = 'o'): self
    {
        $this->db->from('tb_user_office ' . $o);
        return $this;
    }
    // ----------------------------
    // JOIN: user 기준
    // ----------------------------

    public function joinLicense(string $u = 'u', string $l = 'l', string $type = 'left'): self
    {
        $this->db->join('tb_license ' . $l, "{$l}.seq = {$u}.license_seq", $type);
        return $this;
    }

    public function joinOffice(string $u = 'u', string $o = 'o', string $type = 'left'): self
    {
        $this->db->join('tb_user_office ' . $o, "{$o}.user_seq = {$u}.seq", $type);
        return $this;
    }

    public function joinPrivacy(string $u = 'u', string $pr = 'pr', string $type = 'left'): self
    {
        $this->db->join('tb_user_privacy ' . $pr, "{$pr}.user_seq = {$u}.seq", $type);
        return $this;
    }

    public function joinEtc(string $u = 'u', string $etc = 'etc', string $type = 'left'): self
    {
        $this->db->join('tb_user_etc ' . $etc, "{$etc}.user_seq = {$u}.seq", $type);
        return $this;
    }

    public function joinDepartment(string $o = 'o', string $d = 'd', string $type = 'left'): self
    {
        $this->db->join('tb_office_department ' . $d, "{$d}.seq = {$o}.department_seq", $type);
        return $this;
    }

    public function joinPosition(string $o = 'o', string $p = 'p', string $type = 'left'): self
    {
        $this->db->join('tb_office_position ' . $p, "{$p}.seq = {$o}.position_seq", $type);
        return $this;
    }

    public function joinTeam(string $o = 'o', string $t = 't', string $type = 'left'): self
    {
        $this->db->join('tb_office_team ' . $t, "{$t}.seq = {$o}.team_seq", $type);
        return $this;
    }

    // ----------------------------
    // JOIN: login_log 기준
    // ----------------------------

    public function joinUserByEmail(string $log = 'log', string $u = 'u', string $type = 'left'): self
    {
        $this->db->join('tb_user ' . $u, "{$u}.email = {$log}.email", $type);
        return $this;
    }
}
