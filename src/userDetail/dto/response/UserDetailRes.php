<?php
declare(strict_types=1);

namespace App\userDetail\dto\response;

final class UserDetailRes implements \JsonSerializable
{
    public int $userId;
    public UserBasicRes $basic;
    public UserOfficeRes $office;
    public UserEtcRes $etc;
    public ?UserPrivacyRes $privacy;
    public ?UserCareerRes $career;

    public function __construct(
        int $userId,
        UserBasicRes $basic,
        UserOfficeRes $office,
        UserEtcRes $etc,
        ?UserPrivacyRes $privacy = null,
        ?UserCareerRes $career = null
    ) {
        $this->userId  = $userId;
        $this->basic   = $basic;
        $this->office  = $office;
        $this->etc     = $etc;
        $this->privacy = $privacy;
        $this->career  = $career;
    }

    public function jsonSerialize(): array
    {
        return [
            'userId'  => $this->userId,
            'basic'   => $this->basic->jsonSerialize(),
            'office'  => $this->office->jsonSerialize(),
            'etc'     => $this->etc->jsonSerialize(),
            'privacy' => $this->privacy ? $this->privacy->jsonSerialize() : null,
            'career'  => $this->career ? $this->career->jsonSerialize() : null,
        ];
    }
}
