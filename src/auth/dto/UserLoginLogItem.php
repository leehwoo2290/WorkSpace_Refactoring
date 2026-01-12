<?php
declare(strict_types=1);

namespace App\auth\Dto;

use App\common\dto\ApiDocDto;

final class UserLoginLogItem implements \JsonSerializable, ApiDocDto
{
    private int $seq;
    private string $regTime;      // 접속시간
    private string $email;
    private ?string $name;        // 이름
    private ?string $affiliation; // 소속(가공)
    private ?string $mobile;      // 휴대폰
    private string $countryCode;  // 국가코드(ISO2)
    private string $ipAddr;       // IP
    private string $deviceType;   // 'PC'|'MOBILE'
    private string $success;      // 'Y'|'N'

    public function __construct(
        int $seq,
        string $regTime,
        string $email,
        ?string $name,
        ?string $affiliation,
        ?string $mobile,
        string $countryCode,
        string $ipAddr,
        string $deviceType,
        string $success
    ) {
        $this->seq = $seq;
        $this->regTime = $regTime;
        $this->email = $email;
        $this->name = $name;
        $this->affiliation = $affiliation;
        $this->mobile = $mobile;
        $this->countryCode = $countryCode;
        $this->ipAddr = $ipAddr;
        $this->deviceType = $deviceType;
        $this->success = $success;
    }

    public function jsonSerialize(): array
    {
        return [
            'seq' => $this->seq,
            'regTime' => $this->regTime,
            'email' => $this->email,
            'name' => $this->name,
            'affiliation' => $this->affiliation,
            'mobile' => $this->mobile,
            'countryCode' => $this->countryCode,
            'ipAddr' => $this->ipAddr,
            'deviceType' => $this->deviceType,
            'success' => $this->success,
        ];
    }

    public static function apiDocSchema(): array
    {
        return [
            'seq' => ['type' => 'int', 'required' => true, 'description' => '로그 PK'],
            'regTime' => ['type' => 'string', 'required' => true, 'description' => '접속시간(Y-m-d H:i:s)'],
            'email' => ['type' => 'string', 'required' => true, 'description' => '로그인 이메일'],
            'name' => ['type' => 'string|null', 'required' => false, 'description' => '사용자 이름'],
            'affiliation' => ['type' => 'string|null', 'required' => false, 'description' => '소속(회사/부서/팀 등 가공)'],
            'mobile' => ['type' => 'string|null', 'required' => false, 'description' => '휴대폰번호'],
            'countryCode' => ['type' => 'string', 'required' => true, 'description' => '국가코드'],
            'ipAddr' => ['type' => 'string', 'required' => true, 'description' => 'IP 주소'],
            'deviceType' => ['type' => 'string', 'required' => true, 'description' => 'PC 또는 MOBILE'],
            'success' => ['type' => 'string', 'required' => true, 'description' => '로그인 성공 여부(Y|N)'],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'seq' => 11906,
            'regTime' => '2026-01-12 08:10:11',
            'email' => 'test@example.com',
            'name' => '홍길동',
            'affiliation' => '회사A / 개발팀 / 1팀',
            'mobile' => '01012345678',
            'countryCode' => 'KR',
            'ipAddr' => '192.168.0.10',
            'deviceType' => 'PC',
            'success' => 'Y',
        ];
    }
}
