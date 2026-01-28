<?php
declare(strict_types=1);

namespace App\user\detail\entity;

use App\common\repository\WritePayloadBuilder;
use App\user\detail\dto\request\UserBasicReq;

/**
 * UserBasicUpdateCommand
 *
 * - ReqDTO(UserBasicReq): "HTTP 입력" 전용(파싱/검증/정규화)
 * - Command: "DB 쓰기" 전용(payload 구성)
 *
 * NOTE
 * - license_seq 처럼 DB 조회(이름→seq)가 필요한 값은 Repository에서 resolve한다.
 */
final class UserBasicUpdateEntity
{
    private ?string $licenseName;
    private ?string $name;
    private ?string $role;
    private ?string $status;
    private ?string $email;
    private ?string $avatarFile;
    private ?string $remark;

    private function __construct(
        ?string $licenseName,
        ?string $name,
        ?string $role,
        ?string $status,
        ?string $email,
        ?string $avatarFile,
        ?string $remark
    ) {
        $this->licenseName = $licenseName;
        $this->name = $name;
        $this->role = $role;
        $this->status = $status;
        $this->email = $email;
        $this->avatarFile = $avatarFile;
        $this->remark = $remark;
    }

    public static function fromReq(UserBasicReq $req): self
    {
        return new self(
            $req->licenseName(),
            $req->name(),
            $req->role(),
            $req->status(),
            $req->email(),
            $req->avatarFile(),
            $req->remark()
        );
    }

    public function licenseName(): ?string { return $this->licenseName; }

    public function toDbPayload(WritePayloadBuilder $builder, callable $resolveSeqOrFail): array
    {
        $data = $builder->build([
            'name'       => $this->name,
            'role'       => $this->role,
            'status'     => $this->status,
            'email'      => $this->email,
            'avatarFile' => $this->avatarFile,
            'remark'     => $this->remark,
        ], [
            'name'       => ['col' => 'name'],
            'role'       => ['col' => 'role'],
            'status'     => ['col' => 'status'],
            'email'      => ['col' => 'email'],
            'avatarFile' => ['col' => 'avatar_file'],
            'remark'     => ['col' => 'remark'],
        ]);
          
        if ($this->licenseName !== null && trim($this->licenseName) !== '') {
            $data['license_seq'] = $resolveSeqOrFail($this->licenseName, 'tb_license', 'name');
        }

          return $data;
    }
}
