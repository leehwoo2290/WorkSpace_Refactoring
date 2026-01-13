<?php
declare(strict_types=1);

namespace App\auth\dto\request;

use App\common\dto\HttpRequestDto;
use App\common\dto\ApiDocDto;

final class UserLoginReq implements HttpRequestDto, ApiDocDto
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

    public static function apiDocSchema(): array
    {
        return [
            'email' => [
                'type' => 'string',
                'required' => true,
                'description' => '로그인 이메일',
            ],
            // fromArray에서 passwd 또는 password 둘 다 허용
            'password' => [
                'type' => 'string',
                'required' => true,
                'aliases' => ['passwd'],
                'description' => '평문 비밀번호 (legacy key: passwd)',
            ],
            'rememberEmail' => [
                'type' => 'bool',
                'required' => false,
                'aliases' => ['remember_email'],
                'description' => '이메일 저장 여부 (legacy key: remember_email)',
            ],
            'autoLogin' => [
                'type' => 'bool',
                'required' => false,
                'aliases' => ['auto_login'],
                'description' => '자동 로그인 여부 (legacy key: auto_login)',
            ],
        ];
    }

    public static function apiDocExample(): array
    {
        return [
            'email' => 'test@eleng.co.kr',
            'password' => 'test12345',
            'rememberEmail' => false,
            'autoLogin' => false,
        ];
    }

}
