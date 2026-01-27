<?php
declare(strict_types=1);

namespace App\common\db;

use RuntimeException;

/**
 * DbTransactionRunner
 *
 * - CI3 Query Builder($this->db)를 받아 유스케이스 단위 트랜잭션을 실행한다.
 * - 트랜잭션 범위(원자성)는 Service 계층에서만 결정/사용한다.
 */
final class DbTransactionRunner
{
    /** @var mixed CI_DB_query_builder */
    private $db;

    public function __construct($ciDb)
    {
        $this->db = $ciDb;
    }

    /**
     * @template T
     * @param callable():T $fn
     * @return T
     */
    public function run(callable $fn)
    {
        $this->db->trans_begin();
        try {
            $result = $fn();

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('DB transaction failed');
            }

            $this->db->trans_commit();
            return $result;
        } catch (\Throwable $e) {
            $this->db->trans_rollback();
            throw $e;
        }
    }
}
