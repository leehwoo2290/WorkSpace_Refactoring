<?php
declare(strict_types=1);

namespace App\user\add\dto\request;

use App\common\dto\HttpRequestDto;

final class UserAddReq implements HttpRequestDto
{
    private ?string $name;
    private ?string $email;
    private ?int $licenseSeq;
    private ?string $status;
    private ?string $remark;
   // private ?string $password;


    private function __construct(
        ?string $name,
        ?string $email,
        ?int $licenseSeq,
        ?string $status,
        ?string $remark
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->licenseSeq = $licenseSeq;
        $this->status = $status;
        $this->remark = $remark;
    }

    /** @throws \InvalidArgumentException */
    public static function fromArray(array $data): self
    {
        // 가공/변환 없이 "기본형"으로만 세팅
        $name = isset($data['name']) ? (string) $data['name'] : null;
        $email = isset($data['email']) ? (string) $data['email'] : null;
        $licenseSeq = isset($data['license_seq']) ? (int) $data['license_seq'] : (isset($data['licenseSeq']) ? (int) $data['licenseSeq'] : null);
        $status = isset($data['status']) ? (string) $data['status'] : null;
        $password = isset($data['password']) ? (string) $data['password'] : null;
        $remark = isset($data['remark']) ? (string) $data['remark'] : null;

        return new self($name, $email, $licenseSeq, $status, $remark);
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function email(): ?string
    {
        return $this->email;
    }

    public function licenseSeq(): ?int
    {
        return $this->licenseSeq;
    }

    public function status(): ?string
    {
        return $this->status;
    }

    public function remark(): ?string
    {
        return $this->remark;
    }
    // public function password(): ?string
    // {
    //     return $this->password;
    // }
}
