<?php
declare(strict_types=1);

namespace App\user\dto;


final class UserListLicenseFilterItem implements \JsonSerializable
{
    private int $licenseSeq;
    private string $name;
    private string $englishName;
    //private int $userCnt;

    public function __construct(
        int $licenseSeq,
        string $name,
        string $englishName
        //int $userCnt
    ) {
        $this->licenseSeq = $licenseSeq;
        $this->name = $name;
        $this->englishName = $englishName;
       // $this->userCnt = $userCnt;
    }

    public function jsonSerialize(): array
    {
        return [
            'licenseSeq' => $this->licenseSeq,
            'name' => $this->name,
            'englishName' => $this->englishName,
            //'userCnt' => $this->userCnt,
        ];
    }
}
