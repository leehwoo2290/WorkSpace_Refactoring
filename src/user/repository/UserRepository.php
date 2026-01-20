<?php
declare(strict_types=1);

namespace App\user\repository;

use App\common\traits\SortHelperTrait;
use App\user\dto\query\UserListQuery;
use App\user\dto\UserListQueryEnumMaps;
use QueryEnumMapper;

final class UserRepository
{
    use SortHelperTrait;

    /** @var \CI_DB_query_builder */
    private \CI_DB_query_builder $db;

    public function __construct(\CI_DB_query_builder $db)
    {
        $this->db = $db;
    }

    public function count(UserListQuery $query): int
    {
        $this->baseFromJoin();
        $this->applyWhere($query);

        return (int) $this->db->count_all_results();
    }

    /** @return object[] */
    public function findList(UserListQuery $query): array
    {
        $this->db->select("
        u.seq AS user_seq,
        u.role,
        u.name,
        u.email,
        u.status,
        l.name AS license_name,
        o.staff_num,
        d.name AS department_name,
        p.name AS position_name,
        pr.birthday,
        pr.mobile,
        o.engineer_yn,
        o.join_date,
        o.resign_date
    ", false);

        $this->baseFromJoin();
        $this->applyWhere($query);

        //$this->db->order_by('u.seq', 'DESC');
        $this->applyOrderBy($query);
        $this->db->limit($query->size(), $query->offset());

        return $this->db->get()->result();
    }

    private function baseFromJoin(): void
    {
        $this->db->from('tb_user u');
        $this->db->join('tb_license l', 'l.seq = u.license_seq', 'left');
        $this->db->join('tb_user_office o', 'o.user_seq = u.seq', 'left');
        $this->db->join('tb_office_department d', 'd.seq = o.department_seq', 'left');
        $this->db->join('tb_office_position p', 'p.seq = o.position_seq', 'left');
        $this->db->join('tb_user_privacy pr', 'pr.user_seq = u.seq', 'left');
    }

    private function applyWhere(UserListQuery $query): void
    {

        $where = $query->makeWhere();
        //log_message('error', '[UserList] where = ' . json_encode($query, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        // 1) 이름 검색(name): 이름/이메일/사번 통합 LIKE (원하면 u.name만 남겨도 됨)
        if (!empty($where['name'])) {
            $q = (string) $where['name'];
            $this->db->group_start();
            $this->db->like('u.name', $q);
            $this->db->or_like('u.email', $q);
            $this->db->or_like('o.staff_num', $q);
            $this->db->group_end();
        }

        // 2) 지역 검색(region): 주소/시도/시군구
        if (!empty($where['region'])) {
            // 프론트가 enum(SEOUL/GYEONGGI...)을 보내면 DB(서울/경기...) 값으로 매핑
            // strict=false: 이미 '서울', '경기' 같은 실제 값이 들어와도 그대로 통과
            $raw = (string) $where['region'];
            $r = QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'region', $raw, false);

            $this->db->group_start();
            $this->db->like('pr.addr', $r);
            $this->db->or_like('pr.sido', $r);
            $this->db->or_like('pr.sigungu', $r);
            $this->db->group_end();
        }

        // 3) 소속(licenseName): 숫자면 seq, 아니면 license.name
        if (!empty($where['licenseName'])) {
            $v = (string) $where['licenseName'];
            if (ctype_digit($v))
                $this->db->where('u.license_seq', (int) $v);
            else
                $this->db->where('l.name', $v);
        }

        // 4) 부서(department): 숫자면 seq, 아니면 department.name
        if (!empty($where['department'])) {
            $v = (string) $where['department'];
            if (ctype_digit($v))
                $this->db->where('o.department_seq', (int) $v);
            else {
                $mapped = QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'office_department', $v, false);
                $this->db->where('d.name', $mapped);
            }
        }

        // 5) 직위(position): 숫자면 seq, 아니면 enum(INTERN..) -> DB 한글 직급명으로 매핑 후 p.name 비교
        if (!empty($where['position'])) {
            $v = (string) $where['position'];

            if (ctype_digit($v)) {
                $this->db->where('o.position_seq', (int) $v);
            } else {
                // strict=false: 혹시 프론트가 '팀장' 같은 실제 DB name을 보내도 동작하도록
                $mapped = QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'office_position', $v, false);
                $this->db->where('p.name', $mapped);
            }
        }

        // 6) 계약유형(contractType) -> o.contract_type
        if (!empty($where['contractType'])) {
            $this->db->where(
                'o.contract_type',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'contract_type', (string) $where['contractType'])
            );
        }

        // 7) 근로/근무 형태
        // laborForm(RESIDENT/NON_RESIDENT) -> o.labor_form(상근/비상근)
        if (!empty($where['laborForm'])) {
            $this->db->where(
                'o.labor_form',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'labor_form', (string) $where['laborForm'])
            );
        }

        // workForm(DEEMED/SPECIAL) -> o.work_form(간주/별정)
        if (!empty($where['workForm'])) {
            $this->db->where(
                'o.work_form',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'work_form', (string) $where['workForm'])
            );
        }

        // 8) 외국인 여부(nationality) -> pr.foreignYn(Y/N)
        if (!empty($where['nationality'])) {
            $this->db->where(
                'pr.foreignYn',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'nationality', (string) $where['nationality'])
            );
        }

        // 9) 성별(gender) -> pr.gender(남/여)
        if (!empty($where['gender'])) {
            $this->db->where(
                'pr.gender',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'gender', (string) $where['gender'])
            );
        }

        // 10) 재직 상태(status) -> u.status(Pending/Normal/Quit)
        if (!empty($where['status'])) {
            $this->db->where(
                'u.status',
                QueryEnumMapper::map(UserListQueryEnumMaps::maps(), 'user_status', (string) $where['status'])
            );
        }

        // 11) 생일 월(birthMonth)
        if (!empty($where['birthMonth'])) {
            $m = (int) $where['birthMonth'];
            if ($m >= 1 && $m <= 12) {
                $this->db->where("MONTH(pr.birthday) = {$m}", null, false);
            }
        }

        // 12) 근속 년수(careerYear)
        if (array_key_exists('careerYear', $where) && $where['careerYear'] !== null && $where['careerYear'] !== '') {
            $y = (int) $where['careerYear'];
            if ($y >= 0) {
                $this->db->where(
                    "TIMESTAMPDIFF(YEAR, o.join_date, IFNULL(o.resign_date, CURDATE())) = {$y}",
                    null,
                    false
                );
            }
        }
    }

    /**
     * 정렬 지원(확정 키)
     * - sortBy: name | licenseName | age | email | joinDate | careerYear
     * - sortDir: ASC | DESC
     *
     * 멀티 정렬:
     * - /users?sortBy=licenseName,name&sortDir=ASC,DESC
     */
    private function applyOrderBy(UserListQuery $query): void
    {
        $sorts = $this->extractSorts($query);

        $map = [
            'name'        => ['type' => 'col', 'value' => 'u.name'],
            'licenseName' => ['type' => 'col', 'value' => 'l.name'],
            'email'       => ['type' => 'col', 'value' => 'u.email'],
            'joinDate'    => ['type' => 'col', 'value' => 'o.join_date'],

            'age'         => ['type' => 'raw', 'value' => 'TIMESTAMPDIFF(YEAR, pr.birthday, CURDATE())'],
            'careerYear'  => ['type' => 'raw', 'value' => 'TIMESTAMPDIFF(YEAR, o.join_date, IFNULL(o.resign_date, CURDATE()))'],
        ];

        $this->applySortMap($this->db, $sorts, $map, 'u.seq', 'DESC');
    }

    /**
     * @return object[] row: { license_seq, name, english_name }
     */
    public function findListLicenseFilter(): array
    {
        // NOTE: DTO가 englishName을 string으로 받으므로 NULL이면 빈 문자열로 내림
        $this->db->select(
            "\n                license.seq AS license_seq,\n                license.name AS name,\n                IFNULL(license.name_abbr, '') AS english_name\n            ",
            false
        );
        $this->db->from('tb_license license');


        // 정렬: 회사명 우선(가나다순), 동명이면 최신 seq
        $this->db->order_by('license.name', 'ASC');
        $this->db->order_by('license.seq', 'DESC');

        return $this->db->get()->result();
    }
}
