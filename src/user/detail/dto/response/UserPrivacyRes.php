<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserPrivacyRes implements \JsonSerializable
{
    public ?string $foreignYn = null;        // tb_user_privacy.foreignYn (Y/N)
    public ?string $juminNum = null;         // tb_user_privacy.jumin_num (마스킹 권장)
    public ?string $birthday = null;         // tb_user_privacy.birthday
    public ?string $phoneNumber = null;      // tb_user_privacy.mobile
    public ?string $emerNum1 = null;         // tb_user_privacy.emer_num1
    public ?string $emerNum2 = null;         // tb_user_privacy.emer_num2
    public ?string $addr = null;             // tb_user_privacy.addr

    public ?string $educationLevel = null;   // tb_user_privacy.education_level
    public ?string $educationMajor = null;   // tb_user_privacy.education_major
    public ?int $familyCnt = null;           // tb_user_privacy.family_cnt

    public ?string $carYn = null;            // tb_user_privacy.carYn (Y/N)
    public ?string $carNumber = null;        // tb_user_privacy.car_number
    public ?int $carTax = null;              // tb_user_privacy.car_tax
    public ?string $carModel = null;         // tb_user_privacy.car_model

    public ?string $religion = null;         // tb_user_privacy.religion
    public ?string $bankName = null;         // tb_user_privacy.bank_name
    public ?string $bankNumber = null;       // tb_user_privacy.bank_number

    public function jsonSerialize(): array
    {
        return [
            'nationality' => $this->foreignYn === 'Y' ? '외국인' : '내국인',
            'juminNum'    => $this->juminNum,
            'birthday'    => $this->birthday,
            'phoneNumber' => $this->phoneNumber,
            'emergency1'  => $this->emerNum1,
            'emergency2'  => $this->emerNum2,
            'address'     => $this->addr,

            'educationLevel' => $this->educationLevel,
            'educationMajor' => $this->educationMajor,

            'familyCnt'   => $this->familyCnt,
            'carOwned'    => $this->carYn,
            'carNumber'   => $this->carNumber,
            'suwonCarReg' => $this->carTax,
            'carModel'    => $this->carModel,

            'religion'    => $this->religion,
            'bankName'    => $this->bankName,
            'bankNumber'  => $this->bankNumber,
        ];
    }
}
