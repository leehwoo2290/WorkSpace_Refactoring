<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserPrivacyRes implements \JsonSerializable
{
    private ?string $foreignYn = null;        // tb_user_privacy.foreignYn (Y/N)
    private ?string $juminNum = null;         // tb_user_privacy.jumin_num (마스킹 권장)
    private ?string $birthday = null;         // tb_user_privacy.birthday
    private ?string $phoneNumber = null;      // tb_user_privacy.mobile
    private ?string $emerNum1 = null;         // tb_user_privacy.emer_num1
    private ?string $emerNum2 = null;         // tb_user_privacy.emer_num2
    private ?string $addr = null;             // tb_user_privacy.addr

    private ?string $educationLevel = null;   // tb_user_privacy.education_level
    private ?string $educationMajor = null;   // tb_user_privacy.education_major
    private ?int $familyCnt = null;           // tb_user_privacy.family_cnt

    private ?string $carYn = null;            // tb_user_privacy.carYn (Y/N)
    private ?string $carNumber = null;        // tb_user_privacy.car_number
    private ?int $carTax = null;              // tb_user_privacy.car_tax
    private ?string $carModel = null;         // tb_user_privacy.car_model

    private ?string $religion = null;         // tb_user_privacy.religion
    private ?string $bankName = null;         // tb_user_privacy.bank_name
    private ?string $bankNumber = null;       // tb_user_privacy.bank_number

    public function jsonSerialize(): array
    {
        return [
            'nationality' => $this->foreignYn === 'Y' ? '외국인' : '내국인',
            'juminNum' => $this->juminNum,
            'birthday' => $this->birthday,
            'phoneNumber' => $this->phoneNumber,
            'emergency1' => $this->emerNum1,
            'emergency2' => $this->emerNum2,
            'address' => $this->addr,

            'educationLevel' => $this->educationLevel,
            'educationMajor' => $this->educationMajor,

            'familyCnt' => $this->familyCnt,
            'carOwned' => $this->carYn,
            'carNumber' => $this->carNumber,
            'suwonCarReg' => $this->carTax,
            'carModel' => $this->carModel,

            'religion' => $this->religion,
            'bankName' => $this->bankName,
            'bankNumber' => $this->bankNumber,
        ];
    }
    public static function fromArray(array $d): self
    {
        $o = new self();

        $o->foreignYn = $d['foreignYn'] ?? null;
        $o->juminNum = $d['juminNum'] ?? null;
        $o->birthday = $d['birthday'] ?? null;
        $o->phoneNumber = $d['phoneNumber'] ?? null;
        $o->emerNum1 = $d['emerNum1'] ?? null;
        $o->emerNum2 = $d['emerNum2'] ?? null;
        $o->addr = $d['addr'] ?? null;

        $o->educationLevel = $d['educationLevel'] ?? null;
        $o->educationMajor = $d['educationMajor'] ?? null;
        $o->familyCnt = isset($d['familyCnt']) ? (int) $d['familyCnt'] : null;

        $o->carYn = $d['carYn'] ?? null;
        $o->carNumber = $d['carNumber'] ?? null;
        $o->carTax = isset($d['carTax']) ? (int) $d['carTax'] : null;
        $o->carModel = $d['carModel'] ?? null;

        $o->religion = $d['religion'] ?? null;
        $o->bankName = $d['bankName'] ?? null;
        $o->bankNumber = $d['bankNumber'] ?? null;

        return $o;
    }

    public static function fromRow(?object $r): self
    {
        if ($r === null)
            return new self();

        return self::fromArray([
            'foreignYn' => $r->foreignYn ?? null,
            'juminNum' => $r->juminNum ?? null,
            'birthday' => $r->birthday ?? null,
            'phoneNumber' => $r->phoneNumber ?? null,
            'emerNum1' => $r->emerNum1 ?? null,
            'emerNum2' => $r->emerNum2 ?? null,
            'addr' => $r->addr ?? null,

            'educationLevel' => $r->educationLevel ?? null,
            'educationMajor' => $r->educationMajor ?? null,
            'familyCnt' => $r->familyCnt ?? null,

            'carYn' => $r->carYn ?? null,
            'carNumber' => $r->carNumber ?? null,
            'carTax' => $r->carTax ?? null,
            'carModel' => $r->carModel ?? null,

            'religion' => $r->religion ?? null,
            'bankName' => $r->bankName ?? null,
            'bankNumber' => $r->bankNumber ?? null,
        ]);
    }

}
