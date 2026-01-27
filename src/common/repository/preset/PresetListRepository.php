<?php
declare(strict_types=1);

namespace App\common\repository\preset;

use App\common\repository\BaseListRepository;
use App\common\repository\SelectText;

/**
 * PresetListRepository
 *
 * "list/count"를 preset 기반으로 강제하는 베이스.
 *
 * 중요: 이 클래스는 public count/findList를 제공하지 않습니다.
 * - 도메인 Repository에서 `count(UserListQuery $query)`처럼 타입힌트가 들어가면
 *   상속 시 method signature 호환 문제가 생길 수 있어서,
 *   `countByPreset($query)` / `findListByPreset($query)` 형태의 protected helper만 제공합니다.
 */
abstract class PresetListRepository extends BaseListRepository
{
    abstract protected function preset(): ListPresetInterface;

    protected function countByPreset($query): int
    {
        return $this->countUsingPreset($this->preset(), $query);
    }

    /** @return object[] */
    protected function findListByPreset($query): array
    {
        return $this->findListUsingPreset($this->preset(), $query);
    }

    protected function countUsingPreset(ListPresetInterface $p, $query): int
    {
        return $this->countWith(function () use ($p, $query): void {
            $p->baseFromJoin($this->db);
            $p->applyWhere($this->db, $query);
        });
    }

    /** @return object[] */
    protected function findListUsingPreset(ListPresetInterface $p, $query): array
    {
        return $this->listWith(function () use ($p, $query): void {
            $cols = $p->selectCols();
            if (!empty($cols)) {
                $this->db->select(SelectText::cols($cols), false);
            }

            $p->baseFromJoin($this->db);
            $p->applyWhere($this->db, $query);
            $p->applyOrderBy($this->db, $query);

            $this->applyPaging($query);
        });
    }
}
