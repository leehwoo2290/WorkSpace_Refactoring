<?php
declare(strict_types=1);

namespace App\user\detail\dto\request;

use App\common\Exception\ApiException;
use App\common\ExceptionErrorCode\ApiErrorCode;
use App\common\dto\ReqDtoBase;

final class UserPrivacyReq extends ReqDtoBase
{
    private ?string $nationality;
    private ?string $juminNum;
    private ?string $birthday;
    private ?string $phoneNumber;
    private ?string $emergency1;
    private ?string $emergency2;
    private ?string $address;

    private ?string $educationLevel;
    private ?string $educationMajor;
    private ?int $familyCnt;

    private ?string $carOwned;   // 'Y'/'N' or null
    private ?string $carNumber;
    private ?int $suwonCarReg;
    private ?string $carModel;

    private ?string $religion;
    private ?string $bankName;
    private ?string $bankNumber;

    private function __construct(
        ?string $nationality,
        ?string $juminNum,
        ?string $birthday,
        ?string $phoneNumber,
        ?string $emergency1,
        ?string $emergency2,
        ?string $address,
        ?string $educationLevel,
        ?string $educationMajor,
        ?int $familyCnt,
        ?string $carOwned,
        ?string $carNumber,
        ?int $suwonCarReg,
        ?string $carModel,
        ?string $religion,
        ?string $bankName,
        ?string $bankNumber
    ) {
        $this->nationality = $nationality;
        $this->juminNum = $juminNum;
        $this->birthday = $birthday;
        $this->phoneNumber = $phoneNumber;
        $this->emergency1 = $emergency1;
        $this->emergency2 = $emergency2;
        $this->address = $address;
        $this->educationLevel = $educationLevel;
        $this->educationMajor = $educationMajor;
        $this->familyCnt = $familyCnt;
        $this->carOwned = $carOwned;
        $this->carNumber = $carNumber;
        $this->suwonCarReg = $suwonCarReg;
        $this->carModel = $carModel;
        $this->religion = $religion;
        $this->bankName = $bankName;
        $this->bankNumber = $bankNumber;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            self::toStrOrNull(self::pick($data, 'nationality', 'nationality')),
            self::toStrOrNull(self::pick($data, 'juminNum', 'jumin_num')),
            self::toStrOrNull(self::pick($data, 'birthday', 'birthday')),
            self::toStrOrNull(self::pick($data, 'phoneNumber', 'phone_number')),
            self::toStrOrNull(self::pick($data, 'emergency1', 'emer_num1')),
            self::toStrOrNull(self::pick($data, 'emergency2', 'emer_num2')),
            self::toStrOrNull(self::pick($data, 'address', 'addr')),

            self::toStrOrNull(self::pick($data, 'educationLevel', 'education_level')),
            self::toStrOrNull(self::pick($data, 'educationMajor', 'education_major')),
            self::toIntOrNull(self::pick($data, 'familyCnt', 'family_cnt')),

            // carOwned: 들어오는 값이 bool/1/'Y'/'N' 다 가능하게 Y/N으로 정규화
            self::toYnOrNull(self::pick($data, 'carOwned', 'car_owned')),
            self::toStrOrNull(self::pick($data, 'carNumber', 'car_number')),
            self::toIntOrNull(self::pick($data, 'suwonCarReg', 'car_tax')),
            self::toStrOrNull(self::pick($data, 'carModel', 'car_model')),

            self::toStrOrNull(self::pick($data, 'religion', 'religion')),
            self::toStrOrNull(self::pick($data, 'bankName', 'bank_name')),
            self::toStrOrNull(self::pick($data, 'bankNumber', 'bank_number')),
        );
    }

    public function nationality(): ?string
    {
        return $this->nationality;
    }
    public function juminNum(): ?string
    {
        return $this->juminNum;
    }
    public function birthday(): ?string
    {
        return $this->birthday;
    }
    public function phoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    public function emergency1(): ?string
    {
        return $this->emergency1;
    }
    public function emergency2(): ?string
    {
        return $this->emergency2;
    }
    public function address(): ?string
    {
        return $this->address;
    }

    public function educationLevel(): ?string
    {
        return $this->educationLevel;
    }
    public function educationMajor(): ?string
    {
        return $this->educationMajor;
    }
    public function familyCnt(): ?int
    {
        return $this->familyCnt;
    }

    public function carYn(): ?string
    {
        return $this->toYnOrNull($this->carOwned);
    }

    public function carNumber(): ?string
    {
        return $this->carNumber;
    }
    public function suwonCarReg(): ?int
    {
        return $this->suwonCarReg;
    }
    public function carModel(): ?string
    {
        return $this->carModel;
    }

    public function religion(): ?string
    {
        return $this->religion;
    }
    public function bankName(): ?string
    {
        return $this->bankName;
    }
    public function bankNumber(): ?string
    {
        return $this->bankNumber;
    }

    public function foreignYn(): ?string
    {
        if ($this->nationality === null)
            return null;

        $v = trim($this->nationality);
        if ($v === '')
            return null;

        // 의미 변환만 담당
        if ($v === '내국인')
            return 'N';
        if ($v === '외국인')
            return 'Y';

        // 이미 Y/N으로 온 경우도 허용
        return $this->toYnOrNull($v);
    }

    /** 하이픈 허용 → 숫자 13자리 */
    public function juminNumDigits(): ?string
    {
        if ($this->juminNum === null)
            return null;

        $digits = preg_replace('/\D+/', '', $this->juminNum);
        if ($digits === '')
            return null;

        if (strlen($digits) !== 13) {
            throw ApiException::badRequest('VALIDATION_FAILED', ApiErrorCode::VALIDATION_FAILED);
        }

        return $digits;
    }
}
