<?php
declare(strict_types=1);

namespace App\common\ExceptionErrorCode;

final class ApiErrorCode
{
    // --------------------------------------------------------------------
    // 400 Bad Request (요청 자체가 잘못됨: 프론트 입력/형식 수정 필요)

    //요청 DTO 검증 실패(필수값 누락/형식 오류). data.errors에 필드별 오류를 담는 용도 
    public const VALIDATION_FAILED = 40001;

    // --------------------------------------------------------------------
    // 401 Unauthorized (인증 실패: 로그인/토큰 문제. 보통 refresh 시도 또는 재로그인 유도)

    //인증 필요하지만 인증 정보가 없거나 유효하지 않음(일반 UNAUTHORIZED)
    public const UNAUTHORIZED = 40110;

    //로그인/refresh 등에서 사용자 식별 불가(이메일 없음/사용자 삭제). 보안상 INVALID_CREDENTIALS로 합칠 수도 있음
    public const USER_NOT_FOUND = 40111;

    //로그인 비밀번호 불일치(자격 증명 실패)
    public const INVALID_PASSWORD = 40112;

    //refresh 요청에 refreshToken 쿠키(또는 저장소)가 없음
    public const NO_REFRESH_TOKEN = 40114;

    //refreshToken이 구조적으로 이상하거나(sub/jti 누락 등) 검증 결과 사용자 식별 불가
    public const INVALID_REFRESH_TOKEN = 40115;

    // --------------------------------------------------------------------
    // 401 Unauthorized - refresh rotate 상세(리프레시 토큰 회전/재사용 방지 로직)

    //DB에서 jti에 해당하는 refresh row를 찾지 못함(이미 revoke/정리되었거나 위조 가능)
    public const REFRESH_ROW_NOT_FOUND = 40116;

    //DB row의 userSeq와 토큰 sub(userSeq)가 불일치(토큰 소유자 불일치/위조 의심)
    public const TOKEN_OWNER_MISMATCH = 40117;

    //이미 replaced 된 refreshToken을 재사용(replay) 시도함(탈취/중복 요청/재사용 공격 의심)
    public const REFRESH_TOKEN_REPLAY = 40118;

    //DB 기준 refreshToken 만료(rotate 대상이 이미 만료됨)
    public const REFRESH_TOKEN_EXPIRED = 40119;

    //JWT 서명은 통과했지만 DB에 저장된 해시와 불일치(토큰 탈취/패밀리 꼬임/위조 의심)
    public const REFRESH_HASH_MISMATCH = 40120;

    //refreshToken row의 PK(id)가 null 등 비정상(데이터 무결성 문제)    
    public const INVALID_TOKEN_ROW_ID = 40121;

    //refresh 처리 중 예상 못한 인증 실패(내부 예외를 401로 래핑한 케이스). 보통 재로그인 유도
    public const REFRESH_UNAUTHORIZED = 40122;

    // --------------------------------------------------------------------
    // 403 Forbidden (권한/정책 위반: 로그인 여부와 무관하게 접근 금지)

    // 쿠키/헤더 불일치 or 누락
    public const CSRF_FAILED = 40301;

    // Origin/Referer 허용 실패(옵션)
    public const CSRF_FORBIDDEN_ORIGIN = 40302;

    //사용자 상태가 Normal이 아님(휴면/탈퇴/비활성 등 정책상 로그인/접근 불가)
    public const USER_NOT_ACTIVE = 40311;

    //블랙리스트/차단 사용자(정책상 접근 금지)
    public const USER_BLOCKED = 40312;

    //사용자 역할 목록이 비어있음(권한 설정 없음 → 접근 금지)
    public const USER_NO_ROLES = 40313;

    public const FORBIDDEN_ALL_OF_ROLES = 40321;
    public const FORBIDDEN_ANY_OF_ROLES = 40322;

    // --------------------------------------------------------------------
// 404 Not Found (요청한 리소스가 없음)
    public const RESOURCE_NOT_FOUND = 40401;

    // --------------------------------------------------------------------
    // 409 conflict - DB/제약 충돌
    public const USER_EMAIL_CONFLICT = 40901;
    public const DB_DUPLICATE_KEY = 40990;
    public const DB_FOREIGN_KEY_CONSTRAINT = 40991;

    // --------------------------------------------------------------------
    // 500 Internal (서버 내부 오류: 프론트가 해결 불가, 재시도/에러 안내)
    public const DB_WRITE_FAILED = 50010;
    public const DB_QUERY_FAILED = 50011;
    public const DB_INVALID_IDENTIFIER = 50012;

    // 알 수 없는 내부 오류(예상 못한 예외). 서버 로그 확인 필요
    public const INTERNAL_ERROR = 50000;

    public const DB_INSERT_FAILED = 50013;
    public const DB_UPDATE_FAILED = 50014;
    public const DB_DELETE_FAILED = 50015;

}
