<?php
declare(strict_types=1);

namespace App\userDetail\dto\request;

final class UserBasicReq extends UserDetailBaseReq
{
     private ?string $licenseName;
    private ?string $name;
    private ?string $role;
    private ?string $status;
    private ?string $email;
    private ?string $avatarFile;
    private ?string $remark;
    private ?UserPermissionsReq $permissions;

    private function __construct(
        ?string $licenseName,
        ?string $name,
        ?string $role,
        ?string $status,
        ?string $email,
        ?string $avatarFile,
        ?string $remark,
        ?UserPermissionsReq $permissions
    ) {
        $this->licenseName  = $licenseName;
        $this->name         = $name;
        $this->role         = $role;
        $this->status       = $status;
        $this->email        = $email;
        $this->avatarFile   = $avatarFile;
        $this->remark       = $remark;
        $this->permissions  = $permissions;
    }

    public static function fromArray(array $data): self
    {
        $perm = null;
        $permRaw = self::pick($data, 'permissions', 'permissions');
        if (is_array($permRaw)) {
            $perm = UserPermissionsReq::fromArray($permRaw);
        }

        return new self(
            self::toStrOrNull(self::pick($data, 'licenseName', 'license_name')),
            self::toStrOrNull(self::pick($data, 'name', 'name')),
            self::toStrOrNull(self::pick($data, 'role', 'role')),
            self::toStrOrNull(self::pick($data, 'status', 'status')),
            self::toStrOrNull(self::pick($data, 'email', 'email')),
            self::toStrOrNull(self::pick($data, 'avatarFile', 'avatar_file')),
            self::toStrOrNull(self::pick($data, 'remark', 'remark')),
            $perm
        );
    }

    public function licenseName(): ?string { return $this->licenseName; }
    public function name(): ?string        { return $this->name; }
    public function role(): ?string        { return $this->role; }
    public function status(): ?string      { return $this->status; }
    public function email(): ?string       { return $this->email; }
    public function avatarFile(): ?string  { return $this->avatarFile; }
    public function remark(): ?string      { return $this->remark; }
    public function permissions(): ?UserPermissionsReq { return $this->permissions; }

    public function toArray(): array
    {
        return [
            'licenseName'  => $this->licenseName,
            'name'         => $this->name,
            'role'         => $this->role,
            'status'       => $this->status,
            'email'        => $this->email,
            'avatarFile'   => $this->avatarFile,
            'remark'       => $this->remark,
            'permissions'  => $this->permissions ? $this->permissions->toArray() : null,
        ];
    }
}
