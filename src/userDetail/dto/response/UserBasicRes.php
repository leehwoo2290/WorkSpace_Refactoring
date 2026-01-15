<?php
declare(strict_types=1);

namespace App\userDetail\dto\response;

final class UserBasicRes implements \JsonSerializable
{
    //public ?int $licenseSeq = null;      // tb_user.license_seq
    public ?string $licenseName = null;  // tb_license.name

    public ?string $name = null;         // tb_user.name
    public ?string $role = null;         // tb_user.role
    public ?string $status = null;       // tb_user.status
    public ?string $email = null;        // tb_user.email

    public ?string $avatarFile = null;   // tb_user.avatar_file
    public ?string $remark = null;       // tb_user.remark

    public UserPermissionsRes $permissions;

    public function __construct()
    {
        $this->permissions = new UserPermissionsRes();
    }

    public function jsonSerialize(): array
    {
        return [
            'licenseName' => $this->licenseName,
            'name'        => $this->name,
            'role'        => $this->role,
            'status'      => $this->status,
            'email'       => $this->email,
            'avatarFile'  => $this->avatarFile,
            'remark'      => $this->remark,
            'permissions' => $this->permissions->jsonSerialize(),
        ];
    }
}
