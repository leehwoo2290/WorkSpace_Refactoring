<?php
declare(strict_types=1);

namespace App\common\repository;

/**
 * BaseTableRepository
 *
 * 단일 테이블에 대한 기본 CRUD를 표준화.
 *
 * - 대부분의 repository가 결국 "table + pk" 기반 CRUD를 반복하므로
 *   최소한의 공통 뼈대를 제공.
 * - DB write는 BaseRepository의 insertOrThrow/updateOrThrow/deleteOrThrow로 통일.
 * - DB read는 BaseRepository의 rowWith/existsWith로 통일.
 *
 * 사용 예:
 *   final class FooRepository extends BaseTableRepository {
 *     protected const TABLE = 'tb_foo';
 *     protected const PK    = 'seq';
 *   }
 */
abstract class BaseTableRepository extends BaseRepository
{
    protected const TABLE = '';
    protected const PK = 'seq';

    /** @return string[] */
    protected function defaultSelectCols(): array
    {
        return ['*'];
    }

    protected function table(): string
    {
        return (string) static::TABLE;
    }

    protected function pk(): string
    {
        return (string) static::PK;
    }

    public function existsWhere(array $where): bool
    {
        return $this->existsWith(function () use ($where): void {
            $this->db->select('1', false)->from($this->table())->limit(1);
            foreach ($where as $k => $v) {
                $this->db->where((string) $k, $v);
            }
        });
    }

    public function findOneWhere(array $where, ?array $cols = null): ?object
    {
        $cols = $cols ?? $this->defaultSelectCols();

        return $this->rowWith(function () use ($where, $cols): void {
            $this->db->select(SelectText::cols($cols), false)
                ->from($this->table())
                ->limit(1);

            foreach ($where as $k => $v) {
                $this->db->where((string) $k, $v);
            }
        });
    }

    public function findByPk($id, ?array $cols = null): ?object
    {
        return $this->findOneWhere([$this->pk() => $id], $cols);
    }

    public function insert(array $data, ?string $dupMessage = null, ?int $dupErrorCode = null): int
    {
        return $this->insertOrThrow($this->table(), $data, $dupMessage, $dupErrorCode);
    }

    /** @return int affected rows */
    public function updateWhere(array $data, array $where): int
    {
        return $this->updateWhereOrThrow($this->table(), $data, $where);
    }

    /** @return int affected rows */
    public function updateByPk($id, array $data): int
    {
        return $this->updateWhere($data, [$this->pk() => $id]);
    }

    /** @return int affected rows */
    public function deleteWhere(array $where): int
    {
        return $this->deleteWhereOrThrow($this->table(), $where);
    }

    /** @return int affected rows */
    public function deleteByPk($id): int
    {
        return $this->deleteWhere([$this->pk() => $id]);
    }
}
