<?php
declare(strict_types=1);

namespace App\license\dto;

use App\common\dto\ApiDocDto;

final class LicenseListItem implements \JsonSerializable, ApiDocDto
{
    private int $num;
    private int $licenseSeq;

    private ?string $name;
    private ?string $bizno;
    private ?string $ceoName;

    private ?string $contractDate; // YYYY-MM-DD
    private ?string $expireDate;   // YYYY-MM-DD

    private int $userCnt;
    private int $machineEngineerCnt;
    private int $safetyEngineerCnt;
    private int $machineProjectCnt;
    private int $safetyProjectCnt;

    public function __construct(
        int $num,
        int $licenseSeq,
        ?string $name,
        ?string $bizno,
        ?string $ceoName,
        ?string $contractDate,
        ?string $expireDate,
        int $userCnt,
        int $machineEngineerCnt,
        int $safetyEngineerCnt,
        int $machineProjectCnt,
        int $safetyProjectCnt
    ) {
        $this->num = $num;
        $this->licenseSeq = $licenseSeq;
        $this->name = $name;
        $this->bizno = $bizno;
        $this->ceoName = $ceoName;
        $this->contractDate = $contractDate;
        $this->expireDate = $expireDate;
        $this->userCnt = $userCnt;
        $this->machineEngineerCnt = $machineEngineerCnt;
        $this->safetyEngineerCnt = $safetyEngineerCnt;
        $this->machineProjectCnt = $machineProjectCnt;
        $this->safetyProjectCnt = $safetyProjectCnt;
    }

    public function jsonSerialize(): array
    {
        return [
            'no' => $this->num,
            'licenseSeq' => $this->licenseSeq,
            'name' => $this->name,
            'bizno' => $this->bizno,
            'ceoName' => $this->ceoName,
            'contractDate' => $this->contractDate,
            'expireDate' => $this->expireDate,
            'userCnt' => $this->userCnt,
            'machineEngineerCnt' => $this->machineEngineerCnt,
            'safetyEngineerCnt' => $this->safetyEngineerCnt,
            'machineProjectCnt' => $this->machineProjectCnt,
            'safetyProjectCnt' => $this->safetyProjectCnt,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'num' => ['type' => 'int', 'required' => true, 'description' => '화면용 번호(1부터)'],
            'licenseSeq' => ['type' => 'int', 'required' => true, 'description' => '라이선스 PK'],
            'name' => ['type' => 'string', 'required' => false, 'description' => '업체명'],
            'bizno' => ['type' => 'string', 'required' => false, 'description' => '사업자번호(저장 포맷은 DB 기준)'],
            'ceoName' => ['type' => 'string', 'required' => false, 'description' => '대표자명'],
            'contractDate' => ['type' => 'string(YYYY-MM-DD)', 'required' => false, 'description' => '계약일'],
            'expireDate' => ['type' => 'string(YYYY-MM-DD)', 'required' => false, 'description' => '만료일'],
            'userCnt' => ['type' => 'int', 'required' => true, 'description' => '소속 사용자 수(status!=Quit)'],
            'machineEngineerCnt' => ['type' => 'int', 'required' => true, 'description' => '기계 기술인 수'],
            'safetyEngineerCnt' => ['type' => 'int', 'required' => true, 'description' => '안전 기술인 수'],
            'machineProjectCnt' => ['type' => 'int', 'required' => true, 'description' => '기계 프로젝트 수(deleted=N)'],
            'safetyProjectCnt' => ['type' => 'int', 'required' => true, 'description' => '안전 프로젝트 수(레거시 쿼리 기반)'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'num' => 1,
            'licenseSeq' => 10,
            'name' => '엘림엔지니어링',
            'bizno' => '1234567890',
            'ceoName' => '홍길동',
            'contractDate' => '2025-01-01',
            'expireDate' => '2026-01-01',
            'userCnt' => 12,
            'machineEngineerCnt' => 3,
            'safetyEngineerCnt' => 2,
            'machineProjectCnt' => 7,
            'safetyProjectCnt' => 5,
        ];
    }
}
