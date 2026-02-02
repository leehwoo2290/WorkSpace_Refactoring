<?php
declare(strict_types=1);

namespace App\safety\project\add\repository;

use App\common\repository\WritePayloadBuilder;
use App\safety\project\add\entity\SafetyProjectAddEntity;

final class SafetyProjectAddRepository
{
    private const T_PROJECT = 'tb_safety_project';

    /** @var mixed CI_DB_query_builder */
    private $db;

    private WritePayloadBuilder $builder;

    /** @param mixed $db */
    public function __construct($db)
    {
        $this->db = $db;
        $this->builder = new WritePayloadBuilder();
    }

    public function insert(SafetyProjectAddEntity $entity): int
    {
        $payload = $entity->toDbPayload($this->builder);
        $this->db->insert(self::T_PROJECT, $payload);
        return (int) $this->db->insert_id();
    }
}
