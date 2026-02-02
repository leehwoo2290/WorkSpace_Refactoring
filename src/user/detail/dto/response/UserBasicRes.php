<?php
declare(strict_types=1);

namespace App\user\detail\dto\response;

final class UserBasicRes implements \JsonSerializable
{
    //public ?int $licenseSeq = null;      // tb_user.license_seq
    private ?string $licenseName = null;  // tb_license.name

    private ?string $name = null;         // tb_user.name
    private ?string $role = null;         // tb_user.role
    private ?string $status = null;       // tb_user.status
    private ?string $email = null;        // tb_user.email

    private ?string $avatarFile = null;   // tb_user.avatar_file
    private ?string $remark = null;       // tb_user.remark

    private UserPermissionsRes $permissions;

    public function __construct(
        ?string $licenseName = null,
        ?string $name = null,
        ?string $role = null,
        ?string $status = null,
        ?string $email = null,
        ?string $avatarFile = null,
        ?string $remark = null,
        ?UserPermissionsRes $permissions = null
    ) {
        $this->licenseName = $licenseName;
        $this->name = $name;
        $this->role = $role;
        $this->status = $status;
        $this->email = $email;
        $this->avatarFile = $avatarFile;
        $this->remark = $remark;

        $this->permissions = $permissions ?: new UserPermissionsRes();
    }

    public function jsonSerialize(): array
    {
        return [
            'licenseName' => $this->licenseName,
            'name' => $this->name,
            'role' => $this->role,
            'status' => $this->status,
            'email' => $this->email,
            'avatarFile' => $this->avatarFile,
            'remark' => $this->remark,
            'permissions' => $this->permissions->jsonSerialize(),
        ];
    }

   public static function fromRow(?object $r, ?UserPermissionsRes $perm = null): self
{
    if ($r === null) return new self(null, null, null, null, null, null, null, $perm);

    return new self(
        $r->licenseName ?? null,
        $r->name ?? null,
        $r->role ?? null,
        $r->status ?? null,
        $r->email ?? null,
        $r->avatarFile ?? null,
        $r->remark ?? null,
        $perm
    );
}

}
