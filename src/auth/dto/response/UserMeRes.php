<?php
declare(strict_types=1);

namespace App\auth\dto\response;


final class UserMeRes implements \JsonSerializable
{
    private int $userSeq;
    /** @var string[] */
    private array $roles;

    /**
     * @param string[] $roles
     */
    public function __construct(int $userSeq, array $roles)
    {
        $this->userSeq = $userSeq;
        $this->roles = array_values(array_map('strval', $roles));
    }

    public function jsonSerialize(): array
    {
        return [
            'userSeq' => $this->userSeq,
            'roles' => $this->roles,
        ];
    }

}
