<?php
declare(strict_types=1);

namespace App\safety\project\detail\schedule\repository;

use App\common\repository\BaseListRepository;
use App\common\repository\SelectText;
use App\common\repository\WritePayloadBuilder;
use App\common\repository\preset\ListPresetInterface;

use App\safety\project\detail\schedule\repository\preset\SafetyProjectScheduleRowPreset;
use App\safety\project\detail\schedule\repository\preset\SafetyProjectAssignedEngineerListPreset;
use App\safety\project\detail\schedule\repository\preset\SafetyProjectEngineerAssignedFilterListPreset;

final class SafetyProjectScheduleRepository extends BaseListRepository
{
    private const T_PROJECT = 'tb_safety_project';
    private const T_MANS = 'tb_safety_mans';
    private const T_ENGINEER = 'tb_safety_engineer';
    private const T_USER = 'tb_user';

    public function findProjectScheduleRow(int $projectSeq): ?object
    {
        if ($projectSeq <= 0) return null;
        return $this->rowByPreset(new SafetyProjectScheduleRowPreset(), $projectSeq);
    }

    /** @return object[] */
    public function findAssignedEngineers(int $projectSeq): array
    {
        if ($projectSeq <= 0) return [];
        return $this->listUsingPreset(new SafetyProjectAssignedEngineerListPreset(), $projectSeq);
    }

    /** @return object[] */
    public function findEngineerCandidatesByLicenseSeq(int $licenseSeq): array
    {
        if ($licenseSeq <= 0) return [];
        return $this->listUsingPreset(new SafetyProjectEngineerAssignedFilterListPreset(), $licenseSeq);
    }

    public function updateProjectSchedule(int $projectSeq, array $data): void
    {
        if ($projectSeq <= 0) return;
        if (empty($data)) return;

        $this->updateOrThrow(self::T_PROJECT, $data, function () use ($projectSeq): void {
            $this->db->where('seq', $projectSeq);
        });
    }

    public function deleteAllMans(int $projectSeq): void
    {
        if ($projectSeq <= 0) return;

        $this->deleteOrThrow(self::T_MANS, function () use ($projectSeq): void {
            $this->db->where('project_seq', $projectSeq);
        });
    }

    public function insertMan(int $projectSeq, int $engineerSeq, ?string $bgnDt, ?string $endDt, ?string $remark): void
    {
        if ($projectSeq <= 0 || $engineerSeq <= 0) return;

        $this->insertOrThrow(self::T_MANS, [
            'project_seq' => $projectSeq,
            'engineer_seq' => $engineerSeq,
            'bgn_dt' => $bgnDt,
            'end_dt' => $endDt,
            'remark' => $remark,
        ]);
    }

    /**
     * engineerSeq가 "해당 licenseSeq에 속한 안전진단 기술자"인지 검증한다.
     * - tb_safety_engineer.deleted = 'N'
     * - tb_user.status <> 'Quit'
     * - tb_user.license_seq = :licenseSeq
     */
    public function existsEngineerInLicense(int $engineerSeq, int $licenseSeq): bool
    {
        if ($engineerSeq <= 0 || $licenseSeq <= 0) return false;

        return $this->existsWith(function () use ($engineerSeq, $licenseSeq): void {
            $this->db->from(self::T_ENGINEER . ' se');
            $this->db->join(self::T_USER . ' u', 'u.seq = se.user_seq', 'inner');

            $this->db->where('se.seq', $engineerSeq);
            $this->db->where('u.license_seq', $licenseSeq);
            $this->db->where('u.status <>', 'Quit');
            $this->db->where('se.deleted', 'N');
        });
    }

    /**
     * engineerEmail로 engineer_seq를 찾는다(licenseSeq 범위 내).
     * 없으면 null.
     */
    public function resolveEngineerSeqByEmail(string $email, int $licenseSeq): ?int
    {
        $email = trim($email);
        if ($email === '' || $licenseSeq <= 0) return null;

        $row = $this->rowWith(function () use ($email, $licenseSeq): void {
            $this->db->select('se.seq AS engineer_seq', false);

            $this->db->from(self::T_ENGINEER . ' se');
            $this->db->join(self::T_USER . ' u', 'u.seq = se.user_seq', 'inner');

            $this->db->where('u.email', $email);
            $this->db->where('u.license_seq', $licenseSeq);
            $this->db->where('u.status <>', 'Quit');
            $this->db->where('se.deleted', 'N');

            $this->db->limit(1);
        });

        if (!$row || !isset($row->engineer_seq)) return null;
        return (int) $row->engineer_seq;
    }

    /** @return object[] */
    private function listUsingPreset(ListPresetInterface $p, $query): array
    {
        return $this->listWith(function () use ($p, $query): void {
            $cols = $p->selectCols();
            if (!empty($cols)) {
                $this->db->select(SelectText::cols($cols), false);
            }

            $p->baseFromJoin($this->db);
            $p->applyWhere($this->db, $query);
            $p->applyOrderBy($this->db, $query);
        });
    }
}
