<?php
declare(strict_types=1);

namespace App\common\repository;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\repository\preset\RowPresetInterface;

/**
 * BaseRepository
 *
 * -CI3 Query Builder는 이전 쿼리 상태(where, join, select 등)가 누적될 수 있고, DB write(insert/update/delete) 실패 시 
 *  에러처리가 제각각이 되기 쉬운데, 이걸 **“초기화 + 예외처리 표준화”**로 묶어주는 베이스
 * - insert/update/delete 공통 래퍼로 DB 에러 처리 표준화
 */
abstract class BaseRepository
{
    /** @var mixed CI_DB_query_builder */
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // query 초기화
    //CI3 Query Builder는 객체가 살아있는 동안 where(), join() 같은게 누적될 수 있음, write, select전 초기화
    protected function resetQuery(): void
    {
        if (is_object($this->db) && method_exists($this->db, 'reset_query')) {
            $this->db->reset_query();
            return;
        }

        // 아주 구버전/특이 환경 fallback
        if (is_object($this->db) && method_exists($this->db, 'flush_cache')) {
            $this->db->flush_cache();
        }
    }

    /**
     * 조회(SELECT) 공통 래퍼
     *
     * - 모든 SELECT 계열에서 resetQuery()를 강제해 Query Builder 상태 누적을 방지
     * - $build() 안에서 select/from/join/where/limit 등을 구성하고,
     *   마지막에 get()->row()가 가능한 상태로 만들면 됨
     *
     * @param callable():void $build
     */
    protected function rowWith(callable $build): ?object
    {
        $this->resetQuery();
        $build();

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    /**
     * @param callable():void $build
     */
    protected function rowArrayWith(callable $build): ?array
    {
        $this->resetQuery();
        $build();

        $row = $this->db->get()->row_array();
        return $row ?: null;
    }

    /**
     * @param callable():void $build
     */
    protected function existsWith(callable $build): bool
    {
        $this->resetQuery();
        $build();

        return (bool) $this->db->get()->row();
    }

    /** @param callable():mixed $fn */
    //resetQuery() 호출 강제
    protected function writeWith(callable $fn)
    {
        $this->resetQuery();
        return $fn();
    }

    // CI3에서 “$ok는 true인데 error code가 남는” 케이스까지 잡으려고 $err['code']도 같이 검사
    // “insert 성공/실패/중복/외래키실패를 전부 ApiException으로 통일”
    protected function insertOrThrow(
        string $table,
        array $data,
        ?string $dupMessage = null,
        ?int $dupErrorCode = null,
        string $failMessage = 'DB_INSERT_FAILED',
        int $failErrorCode = ApiErrorCode::DB_INSERT_FAILED
    ): int {
        return (int) $this->writeWith(function () use ($table, $data, $dupMessage, $dupErrorCode, $failMessage, $failErrorCode): int {
            $ok = $this->db->insert($table, $data);

            $err = (array) $this->db->error();
            if (!$ok || (int) ($err['code'] ?? 0) !== 0) {
                $this->throwDbWriteException($failMessage, $failErrorCode, $err, $dupMessage, $dupErrorCode);
            }

            return (int) $this->db->insert_id();
        });
    }

    /**
     * @param callable():void $buildWhere
     * @return int affected rows
     * 이미 row가 반드시 존재
     */
    protected function updateOrThrow(
        string $table,
        array $data,
        callable $buildWhere,
        string $failMessage = 'DB_WRITE_FAILED',
        int $failErrorCode = ApiErrorCode::DB_WRITE_FAILED
    ): int {
        return (int) $this->writeWith(function () use ($table, $data, $buildWhere, $failMessage, $failErrorCode): int {
            // 업데이트할 게 없으면 아무 것도 안 함
            if (empty($data)) {
                return 0;
            }

            $buildWhere();

            $ok = $this->db->update($table, $data);

            $err = (array) $this->db->error();
            if (!$ok || (int) ($err['code'] ?? 0) !== 0) {
                $this->throwDbWriteException($failMessage, $failErrorCode, $err);
            }

            return (int) $this->db->affected_rows();
        });
    }

    /**
     * 배열 where 지원 (편의 래퍼)
     *
     * @return int affected rows
     */
    protected function updateWhereOrThrow(
        string $table,
        array $data,
        array $where,
        string $failMessage = 'DB_WRITE_FAILED',
        int $failErrorCode = ApiErrorCode::DB_WRITE_FAILED
    ): int {
        return $this->updateOrThrow(
            $table,
            $data,
            function () use ($where): void {
                foreach ($where as $k => $v) {
                    $this->db->where((string) $k, $v);
                }
            },
            $failMessage,
            $failErrorCode
        );
    }

    /**
     * user_seq UNIQUE/PK 기준 upsert
     * - $data: user_seq 제외한 나머지 컬럼=>값
     * - 값이 없을 때도 있음(예: 최초에는 detail row를 아직 안 만들었거나, 실제로 업데이트할 값이 없음)
     *
     * 규칙:
     * - raw write는 execOrThrow()로만 실행해서 “조용히 실패”를 원천 차단
     * - DB 에러(중복키/외래키 포함)는 throwDbWriteException 규칙을 그대로 따름
     */
    public function upsertByUserSeq(string $table, int $userSeq, array $data): void
    {
        // 1) 업데이트할 게 없으면 아무 것도 안 함(기존 동작 유지)
        if (empty($data)) {
            return;
        }

        // 테이블/컬럼명 안전성 확보
        $this->assertIdent($table);

        // user_seq는 인자로 받은 userSeq만 신뢰
        unset($data['user_seq']);

        // user_seq 외에 실제 컬럼이 하나도 없으면 upsert 의미가 없으니 종료
        if (empty($data)) {
            return;
        }

        // 컬럼 구성: user_seq + data keys
        $cols = array_merge(['user_seq'], array_keys($data));

        // 식별자 검증 + backtick
        $colSql = [];
        foreach ($cols as $c) {
            $colSql[] = $this->q((string) $c);
        }

        $binds = array_merge([$userSeq], array_values($data));
        $placeholders = implode(', ', array_fill(0, count($cols), '?'));

        // ON DUPLICATE KEY UPDATE 절 (user_seq 제외)
        $updates = [];
        foreach (array_keys($data) as $c) {
            $qc = $this->q((string) $c);
            // MariaDB/MySQL 호환: VALUES(col)
            $updates[] = "{$qc} = VALUES({$qc})";
        }

        // 업데이트 컬럼이 0개면 upsert SQL이 깨지므로 방지
        if (empty($updates)) {
            return;
        }

        $tableQ = $this->q($table);

        $sql =
            "INSERT INTO {$tableQ} (" . implode(', ', $colSql) . ") " .
            "VALUES ({$placeholders}) " .
            "ON DUPLICATE KEY UPDATE " . implode(', ', $updates);

        // 중복키(1062)가 “다른 UNIQUE 컬럼 충돌”로도 발생할 수 있으니 메시지에 테이블을 포함
        $dupCode = defined(ApiErrorCode::class . '::DB_DUPLICATE_KEY')
            ? ApiErrorCode::DB_DUPLICATE_KEY
            : ApiErrorCode::INTERNAL_ERROR;

        // execOrThrow()가 resetQuery + error 검사 + 표준 예외 처리까지 전부 담당
        $this->execOrThrow(
            $sql,
            $binds,
            "DB_DUPLICATE_KEY: {$table}",
            $dupCode,
            "DB_UPSERT_FAILED: {$table}",
            defined(ApiErrorCode::class . '::DB_WRITE_FAILED') ? ApiErrorCode::DB_WRITE_FAILED : ApiErrorCode::INTERNAL_ERROR
        );
    }


    //영숫자/언더스코어만 허용해서 위험한 문자 차단
    protected function assertIdent(string $name): void
    {
        // 식별자 안전장치(영숫자/언더스코어만)
        if (!preg_match('/^[A-Za-z0-9_]+$/', $name)) {
            throw ApiException::internal(
                'INVALID_IDENTIFIER: ' . $name,
                defined(ApiErrorCode::class . '::DB_INVALID_IDENTIFIER') ? ApiErrorCode::DB_INVALID_IDENTIFIER : ApiErrorCode::INTERNAL_ERROR
            );
        }
    }

    //검증 후 백틱으로 감싸서 SQL로 안전하게 삽입
    protected function q(string $name): string
    {
        $this->assertIdent($name);
        return '`' . $name . '`';
    }
    /**
     * @param callable():void $buildWhere
     * @return int affected rows
     */
    protected function deleteOrThrow(
        string $table,
        callable $buildWhere,
        string $failMessage = 'DB_WRITE_FAILED',
        int $failErrorCode = ApiErrorCode::DB_WRITE_FAILED
    ): int {
        return (int) $this->writeWith(function () use ($table, $buildWhere, $failMessage, $failErrorCode): int {
            $buildWhere();

            $ok = $this->db->delete($table);

            $err = (array) $this->db->error();
            if (!$ok || (int) ($err['code'] ?? 0) !== 0) {
                $this->throwDbWriteException($failMessage, $failErrorCode, $err);
            }

            return (int) $this->db->affected_rows();
        });
    }

    /**
     * 배열 where 지원 (편의 래퍼)
     *
     * @return int affected rows
     */
    protected function deleteWhereOrThrow(
        string $table,
        array $where,
        string $failMessage = 'DB_WRITE_FAILED',
        int $failErrorCode = ApiErrorCode::DB_WRITE_FAILED
    ): int {
        return $this->deleteOrThrow(
            $table,
            function () use ($where): void {
                foreach ($where as $k => $v) {
                    $this->db->where((string) $k, $v);
                }
            },
            $failMessage,
            $failErrorCode
        );
    }

    protected function throwDbWriteException(
        string $defaultMessage,
        int $defaultErrorCode,
        array $err,
        ?string $dupMessage = null,
        ?int $dupErrorCode = null
    ): void {
        $code = (int) ($err['code'] ?? 0);

        // 1062: duplicate key
        if ($code === 1062) {
            if ($dupMessage !== null && $dupErrorCode !== null) {
                throw ApiException::conflict($dupMessage, $dupErrorCode, $err);
            }
            throw ApiException::conflict(
                'DB_DUPLICATE_KEY',
                defined(ApiErrorCode::class . '::DB_DUPLICATE_KEY') ? ApiErrorCode::DB_DUPLICATE_KEY : ApiErrorCode::INTERNAL_ERROR,
                $err
            );
        }

        // 1451/1452: FK constraint
        if ($code === 1451 || $code === 1452) {
            throw ApiException::conflict(
                'DB_FOREIGN_KEY_CONSTRAINT',
                defined(ApiErrorCode::class . '::DB_FOREIGN_KEY_CONSTRAINT') ? ApiErrorCode::DB_FOREIGN_KEY_CONSTRAINT : ApiErrorCode::INTERNAL_ERROR,
                $err
            );
        }

        throw ApiException::internal($defaultMessage, $defaultErrorCode, $err);
    }

    // ===== Preset 기반 단건 조회(ROW) =====

    protected function rowByPreset(RowPresetInterface $preset, $query): ?object
    {
        return $this->rowWith(function () use ($preset, $query): void {
            $cols = $preset->selectCols();
            if (!empty($cols)) {
                $this->db->select(SelectText::cols($cols), false);
            }

            $preset->baseFromJoin($this->db);
            $preset->applyWhere($this->db, $query);

            $this->db->limit(1);
        });
    }

    /** RowPreset 단건 조회 helper (row_array 반환) */
    protected function rowArrayByPreset(RowPresetInterface $preset, $query): ?array
    {
        return $this->rowArrayWith(function () use ($preset, $query): void {
            $cols = $preset->selectCols();
            if (!empty($cols)) {
                $this->db->select(SelectText::cols($cols), false);
            }

            $preset->baseFromJoin($this->db);
            $preset->applyWhere($this->db, $query);

            $this->db->limit(1);
        });
    }

    /** RowPreset 존재 여부 helper */
    protected function existsByPreset(RowPresetInterface $preset, $query): bool
    {
        return $this->existsWith(function () use ($preset, $query): void {
            $this->db->select('1', false);

            $preset->baseFromJoin($this->db);
            $preset->applyWhere($this->db, $query);

            $this->db->limit(1);
        });
    }

    /**
     * Raw SQL 조회(SELECT) 실행 래퍼 (예외 표준화)
     *
     * - resetQuery()를 강제해 Query Builder 상태 누적을 방지
     * - $this->db->error()를 확인해, 실패 시 ApiException으로 통일해서 던짐
     *
     * @return mixed CI_DB_result
     */
    protected function queryOrThrow(
        string $sql,
        array $binds = [],
        string $failMessage = 'DB_QUERY_FAILED',
        int $failErrorCode = ApiErrorCode::DB_QUERY_FAILED
    ) {
        $this->resetQuery();

        $q = $this->db->query($sql, $binds);

        $err = (array) $this->db->error();
        if ($q === false || (int) ($err['code'] ?? 0) !== 0) {
            throw ApiException::internal($failMessage, $failErrorCode, $err);
        }

        return $q;
    }

    /**
     * Raw SQL 쓰기(INSERT/UPDATE/DELETE) 실행 래퍼 (예외 표준화)
     *
     * - resetQuery()를 강제해 Query Builder 상태 누적을 방지
     * - $this->db->error()를 확인해, 실패 시 throwDbWriteException() 경유로 예외를 통일
     *   (중복키/외래키 등도 insertOrThrow/updateOrThrow와 동일한 규칙)
     * - 성공 시 affected_rows()를 반환
     */

    protected function execOrThrow(
        string $sql,
        array $binds = [],
        ?string $dupMessage = null,
        ?int $dupErrorCode = null,
        string $failMessage = 'DB_WRITE_FAILED',
        int $failErrorCode = ApiErrorCode::DB_WRITE_FAILED
    ): int {
        return (int) $this->writeWith(function () use ($sql, $binds, $dupMessage, $dupErrorCode, $failMessage, $failErrorCode): int {
            $q = $this->db->query($sql, $binds);

            $err = (array) $this->db->error();
            if ($q === false || (int) ($err['code'] ?? 0) !== 0) {
                $this->throwDbWriteException($failMessage, $failErrorCode, $err, $dupMessage, $dupErrorCode);
            }

            return (int) $this->db->affected_rows();
        });
    }
}
