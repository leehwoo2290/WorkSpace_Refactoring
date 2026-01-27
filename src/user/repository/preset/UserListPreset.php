<?php
declare(strict_types=1);

namespace App\user\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\ListPresetInterface;
use App\common\traits\SortHelperTrait;

use App\user\dto\UserListQueryEnumMaps;
use QueryEnumMapper;

/**
 * UserListPreset
 *
 * User 목록 조회(list/count) 쿼리 레시피를 한 곳에 고정.
 */
final class UserListPreset implements ListPresetInterface
{
    use SortHelperTrait;

    /** @return string[] */
    public function selectCols(): array
    {
        return [
            'u.seq AS user_seq',
            'u.role',
            'u.name',
            'u.email',
            'u.status',
            'l.name AS license_name',
            'o.staff_num',
            'd.name AS department_name',
            'p.name AS position_name',
            'pr.birthday',
            'pr.mobile',
            'o.engineer_yn',
            'o.join_date',
            'o.resign_date',
        ];
    }

    /** @param mixed $db */
    public function baseFromJoin($db): void
    {
        (new UserJoinBuilder($db))
            ->fromUser('u')
            ->joinLicense('u', 'l')
            ->joinOffice('u', 'o')
            ->joinDepartment('o', 'd')
            ->joinPosition('o', 'p')
            ->joinPrivacy('u', 'pr');
    }

    /** @param mixed $db */
    public function applyWhere($db, $query): void
    {
        if (!is_object($query) || !method_exists($query, 'makeWhere')) {
            return;
        }

        /** @var mixed[] $where */
        $where = (array) $query->makeWhere();
        $f = new FilterManager($db);
        $maps = UserListQueryEnumMaps::maps();

        // 1) 통합 검색(현재 name만)
        $f->likeAny(['u.name'], $where['name'] ?? '');

        // 2) 지역(region): enum 또는 실제 문자열 → addr/sido/sigungu LIKE
        if (!empty($where['region'])) {
            $raw = (string) $where['region'];
            $r = QueryEnumMapper::map($maps, 'region', $raw, false);
            $f->likeAny(['pr.addr', 'pr.sido', 'pr.sigungu'], $r);
        }

        // 3) 소속(licenseName): 숫자면 seq, 아니면 l.name/l.name_abbr exact
        if (!empty($where['licenseName'])) {
            $v = trim((string) $where['licenseName']);

            if (ctype_digit($v)) {
                $db->where('u.license_seq', (int) $v);
            } else {
                $db->group_start()
                    ->where('l.name', $v)
                    ->or_where('l.name_abbr', $v)
                    ->group_end();
            }
        }

        // 4) 부서(department)
        if (!empty($where['department'])) {
            $v = (string) $where['department'];
            if (ctype_digit($v)) {
                $db->where('o.department_seq', (int) $v);
            } else {
                $mapped = QueryEnumMapper::map($maps, 'office_department', $v, false);
                $f->whereEq('d.name', $mapped);
            }
        }

        // 5) 직위(position)
        if (!empty($where['position'])) {
            $v = (string) $where['position'];
            if (ctype_digit($v)) {
                $db->where('o.position_seq', (int) $v);
            } else {
                $mapped = QueryEnumMapper::map($maps, 'office_position', $v, false);
                $f->whereEq('p.name', $mapped);
            }
        }

        // 6) 계약유형/근로/근무 형태(enum)
        $f->whereEnum('o.contract_type', $maps, 'contract_type', $where['contractType'] ?? null);
        $f->whereEnum('o.labor_form', $maps, 'labor_form', $where['laborForm'] ?? null);
        $f->whereEnum('o.work_form', $maps, 'work_form', $where['workForm'] ?? null);

        // 7) 외국인/성별(enum)
        $f->whereEnum('pr.foreignYn', $maps, 'nationality', $where['nationality'] ?? null);
        $f->whereEnum('pr.gender', $maps, 'gender', $where['gender'] ?? null);

        // 8) 재직상태(status)
        // - 기본: QUIT 제외
        // - status=QUIT 요청 시: QUIT만 조회
        $statusRaw = trim((string) ($where['status'] ?? ''));

        if ($statusRaw === '') {
            $quit = QueryEnumMapper::map($maps, 'user_status', 'QUIT', false);
            $db->where('u.status !=', $quit);
        } else {
            $mapped = QueryEnumMapper::map($maps, 'user_status', $statusRaw, false);
            $f->whereEq('u.status', $mapped);
        }

        // 9) 생월(birthMonth)
        if (!empty($where['birthMonth'])) {
            $f->whereMonth('pr.birthday', (int) $where['birthMonth']);
        }

        // 10) 근속년수(careerYear)
        if (!empty($where['careerYear'])) {
            $f->whereCareerYearsGte('o.join_date', 'o.resign_date', (int) $where['careerYear']);
        }

        // 11) 엔지니어 여부(yn)
        $f->whereEnum('o.engineer_yn', $maps, 'yn', $where['engineerYn'] ?? null);
    }

    /** @param mixed $db */
    public function applyOrderBy($db, $query): void
    {
        $sorts = $this->extractSorts($query);

        $map = [
            'name' => ['type' => 'col', 'value' => 'u.name'],
            'licenseName' => ['type' => 'col', 'value' => 'l.name'],
            'email' => ['type' => 'col', 'value' => 'u.email'],
            'joinDate' => ['type' => 'col', 'value' => 'o.join_date'],

            'age' => ['type' => 'raw', 'value' => 'TIMESTAMPDIFF(YEAR, pr.birthday, CURDATE())'],
            'careerYear' => ['type' => 'raw', 'value' => 'TIMESTAMPDIFF(YEAR, o.join_date, IFNULL(o.resign_date, CURDATE()))'],
        ];

        $this->applySortMap($db, $sorts, $map, 'u.seq', 'DESC');
    }
}
