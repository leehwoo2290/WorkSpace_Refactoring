<?php
declare(strict_types=1);

namespace App\user\add\entity;

use App\common\repository\WritePayloadBuilder;

final class UserAddEntity
{
    private string $name;
    private string $email;
    private int $licenseSeq;
    private string $status;
    private string $passwdHash;
    private ?string $remark;

    public function __construct(
        string $name,
        string $email,
        int $licenseSeq,
        string $status,
        string $passwdHash,
        ?string $remark
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->licenseSeq = $licenseSeq;
        $this->status = $status;
        $this->passwdHash = $passwdHash;
        $this->remark = $remark;
    }

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'name'       => $this->name,
            'email'      => $this->email,
            'licenseSeq' => $this->licenseSeq,
            'status'     => $this->status,
            'passwdHash' => $this->passwdHash,
            'remark'     => $this->remark,
        ], [
            'name'       => ['col' => 'name'],
            'email'      => ['col' => 'email'],
            'licenseSeq' => ['col' => 'license_seq'],
            'status'     => ['col' => 'status'],
            'passwdHash' => ['col' => 'passwd'],
            'remark'     => ['col' => 'remark'],
        ]);
    }
}
