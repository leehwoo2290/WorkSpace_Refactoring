<?php
declare(strict_types=1);

namespace App\userDetail\entity;

use App\common\repository\WritePayloadBuilder;
use App\userDetail\dto\request\UserPrivacyReq;

/**
 * UserPrivacyUpdateCommand
 *
 * - Req에서 유도되는 값(예: foreignYn, jumin digits, carYn)은 Command에서 확정해 둔다.
 *   => Repository는 "DB 작업(UPDATE/resolve)"만 담당.
 */
final class UserPrivacyUpdateEntity
{
    private ?string $foreignYn;
    private ?string $juminNumDigits;
    private ?string $birthday;
    private ?string $mobile;
    private ?string $emerNum1;
    private ?string $emerNum2;
    private ?string $addr;

    private ?string $educationLevel;
    private ?string $educationMajor;
    private ?int $familyCnt;

    private ?string $carYn;
    private ?string $carNumber;
    private ?int $carTax;
    private ?string $carModel;

    private ?string $religion;
    private ?string $bankName;
    private ?string $bankNumber;

    private function __construct(
        ?string $foreignYn,
        ?string $juminNumDigits,
        ?string $birthday,
        ?string $mobile,
        ?string $emerNum1,
        ?string $emerNum2,
        ?string $addr,
        ?string $educationLevel,
        ?string $educationMajor,
        ?int $familyCnt,
        ?string $carYn,
        ?string $carNumber,
        ?int $carTax,
        ?string $carModel,
        ?string $religion,
        ?string $bankName,
        ?string $bankNumber
    ) {
        $this->foreignYn = $foreignYn;
        $this->juminNumDigits = $juminNumDigits;
        $this->birthday = $birthday;
        $this->mobile = $mobile;
        $this->emerNum1 = $emerNum1;
        $this->emerNum2 = $emerNum2;
        $this->addr = $addr;
        $this->educationLevel = $educationLevel;
        $this->educationMajor = $educationMajor;
        $this->familyCnt = $familyCnt;
        $this->carYn = $carYn;
        $this->carNumber = $carNumber;
        $this->carTax = $carTax;
        $this->carModel = $carModel;
        $this->religion = $religion;
        $this->bankName = $bankName;
        $this->bankNumber = $bankNumber;
    }

    public static function fromReq(UserPrivacyReq $req): self
    {
        return new self(
            $req->foreignYn(),
            $req->juminNumDigits(),
            $req->birthday(),
            $req->phoneNumber(),
            $req->emergency1(),
            $req->emergency2(),
            $req->address(),
            $req->educationLevel(),
            $req->educationMajor(),
            $req->familyCnt(),
            $req->carYn(),
            $req->carNumber(),
            $req->suwonCarReg(),
            $req->carModel(),
            $req->religion(),
            $req->bankName(),
            $req->bankNumber()
        );
    }

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'foreignYn'      => $this->foreignYn,
            'juminNumDigits' => $this->juminNumDigits,
            'birthday'       => $this->birthday,
            'mobile'         => $this->mobile,
            'emerNum1'       => $this->emerNum1,
            'emerNum2'       => $this->emerNum2,
            'addr'           => $this->addr,
            'educationLevel' => $this->educationLevel,
            'educationMajor' => $this->educationMajor,
            'familyCnt'      => $this->familyCnt,
            'carYn'          => $this->carYn,
            'carNumber'      => $this->carNumber,
            'carTax'         => $this->carTax,
            'carModel'       => $this->carModel,
            'religion'       => $this->religion,
            'bankName'       => $this->bankName,
            'bankNumber'     => $this->bankNumber,
        ], [
            'foreignYn'      => ['col' => 'foreignYn'],
            'juminNumDigits' => ['col' => 'jumin_num'],
            'birthday'       => ['col' => 'birthday'],
            'mobile'         => ['col' => 'mobile'],
            'emerNum1'       => ['col' => 'emer_num1'],
            'emerNum2'       => ['col' => 'emer_num2'],
            'addr'           => ['col' => 'addr'],
            'educationLevel' => ['col' => 'education_level'],
            'educationMajor' => ['col' => 'education_major'],
            'familyCnt'      => ['col' => 'family_cnt'],
            'carYn'          => ['col' => 'carYn'],
            'carNumber'      => ['col' => 'car_number'],
            'carTax'         => ['col' => 'car_tax'],
            'carModel'       => ['col' => 'car_model'],
            'religion'       => ['col' => 'religion'],
            'bankName'       => ['col' => 'bank_name'],
            'bankNumber'     => ['col' => 'bank_number'],
        ]);
    }
    
}
