<?php
declare(strict_types=1);

namespace App\loginLog\entity;

use App\common\repository\WritePayloadBuilder;
use DateTimeImmutable;

final class UserLoginLogEntity
{
    private ?int $seq;
    private string $email;
    private ?string $passwd;     // 레거시 컬럼(평문 저장 금지 권장)
    private string $success;     // 'Y'|'N'
    private string $domain;
    private string $ipAddr;
    private string $userAgent;
    private string $countryCode;
    private string $language;
    private string $isMobile;    // 'Y'|'N'
    private ?DateTimeImmutable $regTime;
    private ?string $deviceId;

    public function __construct(
        ?int $seq,
        string $email,
        ?string $passwd,
        string $success,
        string $domain,
        string $ipAddr,
        string $userAgent,
        string $countryCode,
        string $language,
        string $isMobile,
        ?DateTimeImmutable $regTime,
        ?string $deviceId
    ) {
        $this->seq = $seq;
        $this->email = $email;
        $this->passwd = $passwd;
        $this->success = $success;
        $this->domain = $domain;
        $this->ipAddr = $ipAddr;
        $this->userAgent = $userAgent;
        $this->countryCode = $countryCode;
        $this->language = $language;
        $this->isMobile = $isMobile;
        $this->regTime = $regTime;
        $this->deviceId = $deviceId;
    }

     public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'email'       => $this->email,
            'passwd'      => $this->passwd,
            'success'     => $this->success,
            'domain'      => $this->domain,
            'ipAddr'      => $this->ipAddr,
            'userAgent'   => $this->userAgent,
            'countryCode' => $this->countryCode,
            'language'    => $this->language,
            'isMobile'    => $this->isMobile,
            'deviceId'    => $this->deviceId,
            'regTime'     => $this->regTime,
        ], [
            'email'       => ['col' => 'email'],
            'passwd'      => ['col' => 'passwd'],
            'success'     => ['col' => 'success'],
            'domain'      => ['col' => 'domain'],
            'ipAddr'      => ['col' => 'ip_addr'],
            'userAgent'   => ['col' => 'user_agent'],
            'countryCode' => ['col' => 'country_code'],
            'language'    => ['col' => 'language'],
            'isMobile'    => ['col' => 'is_mobile'],
            'deviceId'    => ['col' => 'device_id'],
            'regTime'     => [
                'col' => 'reg_time',
                'transform' => static function ($v) {
                    if ($v instanceof DateTimeImmutable) return $v->format('Y-m-d H:i:s');
                    return null;
                },
            ],
        ]);
    }
    // getters
    public function seq(): ?int { return $this->seq; }
    public function email(): string { return $this->email; }
    public function passwd(): ?string { return $this->passwd; }
    public function success(): string { return $this->success; }
    public function domain(): string { return $this->domain; }
    public function ipAddr(): string { return $this->ipAddr; }
    public function userAgent(): string { return $this->userAgent; }
    public function countryCode(): string { return $this->countryCode; }
    public function language(): string { return $this->language; }
    public function isMobile(): string { return $this->isMobile; }
    public function regTime(): ?DateTimeImmutable { return $this->regTime; }
    public function deviceId(): ?string { return $this->deviceId; }
}
