<?php
declare(strict_types=1);

namespace App\auth\component;

final class RefreshTokenHasher
{
    //리프레시 토큰 원문을 암호화, DB에 저장할 값으로 변환
    //DigestUtils는 토큰을 SHA-256 같은 해시로 바꾸기 쉽게 도와주는 유틸
    //token 그대로 BCryptPasswordEncoder암호화 하면 72바이트 넘어서 오류 고로 SHA-256로 변환해서 고정 길이
    //원래 토큰 → SHA-256 → BCrypt → DB 저장용 해시
    public function hash(string $token): string
    {
        $sha256 = hash('sha256', $token);
        return password_hash($sha256, PASSWORD_BCRYPT);
    }

    //요청받은 리프레시 토큰이 DB의 해시값과 일치하는지 확인
    //SHA-256으로 먼저 변환해야 DB에 저장된 값과 같은 기준으로 비교할 수 있음
    public function matches(string $token, string $hashedToken): bool
    {
        $sha256 = hash('sha256', $token);
        return password_verify($sha256, $hashedToken);
    }
}
