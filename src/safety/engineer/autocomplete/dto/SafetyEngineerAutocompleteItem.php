<?php
declare(strict_types=1);

namespace App\safety\engineer\autocomplete\dto;

final class SafetyEngineerAutocompleteItem implements \JsonSerializable
{
    private int $userSeq;
    private string $email;
    private string $name;

    public function __construct(int $userSeq, string $email, string $name)
    {
        $this->userSeq = $userSeq;
        $this->email = $email;
        $this->name = $name;
    }

    public function jsonSerialize(): array
    {
        return ['userSeq' => $this->userSeq, 'email' => $this->email, 'name' => $this->name];
    }
}
