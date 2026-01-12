<?php
declare(strict_types=1);

namespace App\auth;

use App\auth\repository\UserRoleRepository;
use App\auth\service\JwtService;
use App\auth\TokenTransport;
use App\auth\UserContext;

final class JwtBootstrapper
{
    private JwtManager $jwtManager;
    private JwtService $jwtService;
    private TokenTransport $tokenTransport;
    private UserContext $userContext;
    private UserRoleRepository $userRoleRepository;

    public function __construct(
        JwtManager $jwt,
        JwtService $service,
        TokenTransport $transport,
        UserContext $userContext,
        UserRoleRepository $roles
    ) {
        $this->jwtManager = $jwt;
        $this->jwtService = $service;
        $this->tokenTransport = $transport;
        $this->userContext = $userContext;
        $this->userRoleRepository = $roles;
    }

    /** 요청 시작 시 1회 호출: access 검증 → 실패하면 refresh로 자동 갱신(옵션) */
    public function bootstrap(): void
    {
        $access = $this->tokenTransport->getAccessToken();
        if ($access) {
            try {
                $claims = $this->jwtManager->validateAccessToken($access);
                $userSeq = (int) $claims->sub;

                if ($this->userRoleRepository->exists($userSeq)) {
                    $roles = $this->userRoleRepository->rolesOf($userSeq);
                    $this->userContext->authenticate($userSeq, $roles);
                    return;
                }
            } catch (\Throwable $e) {
                // fall through to refresh
            }
        }

        //     if (!$autoRefresh) return;

        //     try {

        //         $this->jwtService->refreshAccessToken();

        //     } catch (\Throwable $e) {
        //         $this->tokenTransport->clear();
        //         $this->userContext->clear();
        //     }
    }
}
