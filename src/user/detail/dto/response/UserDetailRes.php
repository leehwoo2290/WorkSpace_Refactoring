<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserDetailRes implements \JsonSerializable
{
    public UserBasicRes $basic;
    public ?UserOfficeRes $office;
    public ?UserEtcRes $etc;
    public ?UserPrivacyRes $privacy;
    public ?UserCareerRes $career;

    public function __construct(
        UserBasicRes $basic,
        ?UserOfficeRes $office = null,
        ?UserEtcRes $etc = null,
        ?UserPrivacyRes $privacy = null,
        ?UserCareerRes $career = null
    ) {
        $this->basic   = $basic;
        $this->office  = $office;
        $this->etc     = $etc;
        $this->privacy = $privacy;
        $this->career  = $career;
    }

    public function jsonSerialize(): array
    {
        return [
            'basic'   => $this->basic->jsonSerialize(),
            'office'  => $this->office ? $this->office->jsonSerialize() : null,
            'etc'     => $this->etc ? $this->etc->jsonSerialize() : null,
            'privacy' => $this->privacy ? $this->privacy->jsonSerialize() : null,
            'career'  => $this->career ? $this->career->jsonSerialize() : null,
        ];
    }
}
