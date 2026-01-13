<?php
declare(strict_types=1);

namespace App\auth\dto\request;

use App\common\dto\HttpRequestDto;

final class UserLoginReq implements HttpRequestDto
{
    private string $email;
    private string $passwd;         // plain password from client
    private bool $rememberEmail;    // legacy: remember_email (Y/N, 1/0, true/false)
    private bool $autoLogin;        // legacy: auto_login

    private function __construct(string $email, string $passwd, bool $rememberEmail, bool $autoLogin)
    {
        $this->email = $email;
        $this->passwd = $passwd;
        $this->rememberEmail = $rememberEmail;
        $this->autoLogin = $autoLogin;
    }

    /** @throws \InvalidArgumentException */
    public static function fromArray(array $data): self
    {
        $emailRaw = (string) ($data['email'] ?? '');
        $email = strtolower(trim($emailRaw));

        // legacy key: passwd, common modern key: password
        $passwd = (string) ($data['passwd'] ?? ($data['password'] ?? ''));

        $rememberEmail = self::toBool($data['remember_email'] ?? ($data['rememberEmail'] ?? false));
        $autoLogin = self::toBool($data['auto_login'] ?? ($data['autoLogin'] ?? false));

        return new self($email, $passwd, $rememberEmail, $autoLogin);
    }

    // public function validateOrThrow(): void
    // {
    //     $errors = $this->validate();
    //     if (!empty($errors)) {
    //         throw new \InvalidArgumentException(implode(',', $errors));
    //     }
    // }

    // /**
    //  * @return string[] list of validation error codes
    //  */
    // public function validate(): array
    // {
    //     $errors = [];

    //     if ($this->email === '' || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         $errors[] = 'INVALID_EMAIL';
    //     }
    //     if ($this->passwd === '') {
    //         $errors[] = 'EMPTY_PASSWORD';
    //     }

    //     return $errors;
    // }

    public function email(): string
    {
        return $this->email;
    }

    public function passwd(): string
    {
        return $this->passwd;
    }

    public function rememberEmail(): bool
    {
        return $this->rememberEmail;
    }

    public function autoLogin(): bool
    {
        return $this->autoLogin;
    }

    private static function toBool($v): bool
    {
        if (is_bool($v))
            return $v;
        if (is_int($v))
            return $v === 1;

        $s = strtoupper(trim((string) $v));
        return in_array($s, ['1', 'Y', 'YES', 'TRUE', 'ON'], true);
    }

}
