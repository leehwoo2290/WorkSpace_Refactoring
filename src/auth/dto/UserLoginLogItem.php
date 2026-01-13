<?php
declare(strict_types=1);

namespace App\auth\Dto;


final class UserLoginLogItem implements \JsonSerializable
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
}
