<?php
declare(strict_types=1);

namespace App\user\getList\repository\preset;

use App\common\repository\FilterManager;
use App\common\repository\UserJoinBuilder;
use App\common\repository\preset\ListPresetInterface;
use App\common\traits\SortHelperTrait;

use App\user\common\UserQueryEnumMaps;
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
        $maps = UserQueryEnumMaps::maps();

        // 1) 통합 검색(현재 name만)
        $f->likeAny(['u.name'], $where['name'] ?? '');

        // 2) 지역(region): enum 또는 실제 문자열 → addr/sido/sigungu LIKE
        $f->likeAnyEnum(['pr.addr', 'pr.sido', 'pr.sigungu'], $maps, 'region', $where['region'] ?? null, false);

        // 3) 소속(licenseSeq): 숫자만 허용(필요하면 "회사명 검색" 버전은 별도 필터로 확장)
        $f->whereEqInt('u.license_seq', $where['licenseSeq'] ?? null);

        // 4) 부서(department): 숫자면 seq, 아니면 enum→name 매핑 후 d.name
        $f->whereIdOrMappedName('o.department_seq', 'd.name', $maps, 'office_department', $where['department'] ?? null, false);

        // 5) 직위(position): 숫자면 seq, 아니면 enum→name 매핑 후 p.name
        $f->whereIdOrMappedName('o.position_seq', 'p.name', $maps, 'office_position', $where['position'] ?? null, false);

        // 6) 계약유형/근로/근무 형태(enum)
        $f->whereEnum('o.contract_type', $maps, 'contract_type', $where['contractType'] ?? null, true);
        $f->whereEnum('o.labor_form', $maps, 'labor_form', $where['laborForm'] ?? null, true);
        $f->whereEnum('o.work_form', $maps, 'work_form', $where['workForm'] ?? null, true);

        // 7) 외국인/성별(enum)
        $f->whereEnum('pr.foreignYn', $maps, 'nationality', $where['nationality'] ?? null, true);
        $f->whereEnum('pr.gender', $maps, 'gender', $where['gender'] ?? null, true);

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
        $f->whereMonth('pr.birthday', $where['birthMonth'] ?? null);

        // 10) 근속년수(careerYear)
        $f->whereCareerYearsGte('o.join_date', 'o.resign_date', $where['careerYear'] ?? null);

        // 11) 엔지니어 여부(yn)
        //$f->whereEnum('o.engineer_yn', $maps, 'yn', $where['engineerYn'] ?? null, true);
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
