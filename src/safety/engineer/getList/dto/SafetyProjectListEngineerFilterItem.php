<?php
declare(strict_types=1);

namespace App\safety\engineer\getList\dto;


final class SafetyProjectListEngineerFilterItem implements \JsonSerializable
{
    private int $engineerSeq;
    private string $name;
    private string $grade;
    //private int $userCnt;

    public function __construct(
        int $engineerSeq,
        string $name,
        string $grade
        //int $userCnt
    ) {
        $this->engineerSeq = $engineerSeq;
        $this->name = $name;
        $this->grade = $grade;
       // $this->userCnt = $userCnt;
    }

    public function jsonSerialize(): array
    {
        return [
            'engineerSeq' => $this->engineerSeq,
            'name' => $this->name,
            'grade' => $this->grade,
            //'userCnt' => $this->userCnt,
        ];
    }
}
