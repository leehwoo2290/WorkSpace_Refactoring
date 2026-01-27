<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class RequestQueryDtoJsonMapper
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    //-------Request DTO from JSON Body -------
    private function requestDtoJsonBody(bool $requireNonEmpty = false): array
    {
        $CI = &get_instance();

        $raw = $CI->input->raw_input_stream ?? '';
        $raw = is_string($raw) ? trim($raw) : '';

        if ($raw === '') {
            if ($requireNonEmpty) {
                throw new InvalidArgumentException('EMPTY_JSON_BODY');
            }
            return [];
        }

        $data = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('INVALID_JSON');
        }

        if (!is_array($data)) {
            throw new InvalidArgumentException('JSON_BODY_MUST_BE_OBJECT');
        }

        return $data;
    }
    private function jsonPayload(bool $requiredBody = true): array
    {
        return $this->requestDtoJsonBody($requiredBody);
    }

    public function jsonRequestDto(string $dtoClass, bool $requiredBody = true)
    {
        $payload = $this->jsonPayload($requiredBody);

        // log_message('error', 'jsonPayload=' . json_encode(
        //     $payload,
        //     JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        // ));

        if (!is_callable([$dtoClass, 'fromArray'])) {
            throw new RuntimeException("DTO_CLASS_INVALID: {$dtoClass}");
        }

        return $dtoClass::fromArray($payload);
    }

    //-------Query DTO from Query String -------
    public function queryRequestDto(string $dtoClass)
    {
        $query = $this->CI->input->get(NULL, true);
        if (!is_array($query))
            $query = [];

        if (!is_callable([$dtoClass, 'fromArray'])) {
            throw new RuntimeException("DTO_CLASS_INVALID: {$dtoClass}");
        }

        return $dtoClass::fromArray($query);
    }


}
