<?php
declare(strict_types=1);

namespace App\common\Exception;

class ApiException extends \RuntimeException
{
    private int $httpStatus;
    private int $errorCode;
    private $data;

    public function __construct(int $httpStatus, int $errorCode, string $message, $data = null, ?\Throwable $prev = null)
    {
        parent::__construct($message, $errorCode, $prev);
        $this->httpStatus = $httpStatus;
        $this->errorCode = $errorCode;
        $this->data = $data;
    }

    public function httpStatus(): int
    {
        return $this->httpStatus;
    }
    public function errorCode(): int
    {
        return $this->errorCode;
    }
    public function data()
    {
        return $this->data;
    }

    // 클라이언트가 요청을 잘못 보냄
    // EX) 필수 필드 누락, 타입 오류, 형식 오류, JSON 형식이 깨짐 / body가 비어있음, 허용되지 않은 값
    public static function badRequest(string $message, int $errorCode, $data = null, ?\Throwable $prev = null): self
    {
        return new self(400, $errorCode, $message, $data, $prev);
    }

    // 인증 실패 
    // EX) 로그인에서 비밀번호 틀림 / 사용자 없음, Token 없음 , 서명 불일치
    public static function unauthorized(string $message, int $errorCode, $data = null, ?\Throwable $prev = null): self
    {
        return new self(401, $errorCode, $message, $data, $prev);
    }

    // 권한/정책에 의해 거부
    // EX) 권한 없음, CSRF 실패, 차단된 IP, 계정 정지
    public static function forbidden(string $message, int $errorCode, $data = null, ?\Throwable $prev = null): self
    {
        return new self(403, $errorCode, $message, $data, $prev);
    }
}
