<?php

namespace App\common;
use App\common\Exception\ApiException;

final class ApiResult
{
    public bool $success;               // 성공 여부
    public string $message;             // 상태 메시지
    public int $code;                   // HTTP 상태 코드나 커스텀 코드
    public $data;                       // 실제 응답 데이터 (DTO)

    private function __construct(bool $success, int $code, string $message, $data = null)
    {
        $this->success = $success;
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    // 일반 조회/성공 (GET, PUT, PATCH)
    //200 OK
    public static function ok($data = null, ?string $dataDtoClass = null, int $httpStatus = 200): void
    {
        self::assertDto($data, $dataDtoClass);
        self::emit(new self(true, 0, 'OK', $data), $httpStatus);
        self::terminate();
    }

    // POST 생성 성공 (POST)
    //201 Created
    public static function created($data = null, ?string $dataDtoClass = null): void
    {
        self::assertDto($data, $dataDtoClass);
        self::emit(new self(true, 0, 'CREATED', $data), 201);
        self::terminate();
    }

    // 성공하지만 반환 데이터 없음 (DELETE, PUT/PATCH (데이터 반환 없이 성공))
    //204 No Content
    public static function none($data = null, ?string $dataDtoClass = null): void
    {
        self::assertDto($data, $dataDtoClass, true);
        self::emit(new self(true, 0, 'none', $data), 204);
        self::terminate();
    }

    // 실패 응답 (요청 실패, 클라이언트 오류 등)
    //400 Bad Request
    public static function fail(int $code, string $message, int $httpStatus = 400, $data = null): void
    {
        self::emit(new self(false, $code, $message, $data), $httpStatus);
        self::terminate();
    }

    private static function emit(self $result, int $httpStatus = 200): void
    {
        $CI = &get_instance();

        $CI->output
            ->set_status_header($httpStatus)
            ->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0')
            ->set_header('Pragma: no-cache');

        // 204 No Content는 바디/Content-Type을 보내지 않는다
        if ($httpStatus === 204) {
            $CI->output->set_output('');
            return;
        }

        $CI->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($result->toArray(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    private static function terminate(): void
    {
        // CI3에서 안전하게 즉시 종료(추가 출력 방지)
        $CI = &get_instance();
        $CI->output->_display();
        exit;
    }

    public static function failThrowable(\Throwable $e, string $fallbackMessage = 'INTERNAL_ERROR'): void
    {
        if ($e instanceof ApiException) {
            //log_message('error', '[REFRESH] ApiException code=' . ($e->errorCode() ?? 'null') . ' msg=' . $e->getMessage());
            self::fail($e->errorCode(), $e->getMessage(), $e->httpStatus(), $e->data());
            return;
        }

        // 나머지는 서버 오류로 통일 + 서버 로그
        log_message('error', $fallbackMessage . ' | ' . $e->getMessage() . "\n" . $e->getTraceAsString());
        self::fail(50000, $fallbackMessage, 500);
        return;
    }


    private static function assertDto($data, ?string $dtoClass, bool $allowNull = false): void
    {
        if ($dtoClass === null)
            return;

        // class-string 유효성 (존배여부 판단)
        if (!class_exists($dtoClass)) {
            self::fail(50000, "RESPONSE_DTO_CLASS_NOT_FOUND: {$dtoClass}", 500);
            return;
        }

        if ($data === null) {
            //none은 반환하는 타입이 없음
            if ($allowNull)
                return;
            self::fail(50000, "RESPONSE_DTO_NULL_NOT_ALLOWED: expected {$dtoClass}", 500);
            return;
        }

        //데이터가 객체인지 판별
        if (!is_object($data)) {
            $actual = gettype($data);
            self::fail(50000, "RESPONSE_DTO_NOT_OBJECT: expected {$dtoClass}, actual {$actual}", 500);
            return;
        }

        //같은 타입인지 체크
        if (!($data instanceof $dtoClass)) {
            $actual = get_class($data);
            self::fail(50000, "RESPONSE_DTO_MISMATCH: expected {$dtoClass}, actual {$actual}", 500);
            return;
        }
    }

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'code' => $this->code,
            'data' => $this->data,
        ];
    }
}
