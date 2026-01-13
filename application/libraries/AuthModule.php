<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\auth\service\JwtService;
use App\user\service\UserService;
use App\auth\component\JwtManager;
use App\auth\component\JwtBootstrapper;
use App\auth\component\RefreshTokenHasher;
use App\auth\component\TokenTransport;
use App\user\component\UserContext;
use App\auth\dto\response\JwtTokenRes;
use App\auth\dto\request\UserLoginReq;
use App\auth\dto\response\UserLoginRes;
use App\auth\dto\response\UserMeRes;
use App\user\dto\response\UserLoginLogListRes;
use App\user\dto\query\UserLoginLogListQuery;
use App\user\dto\response\UserListRes;
use App\user\dto\query\UserListQuery;
use App\auth\repository\UserRoleRepository;
use App\auth\repository\UserAuthRepository;
use App\auth\repository\RefreshTokenRepository;
use App\user\Repository\UserLoginLogRepository;
use App\user\Repository\UserRepository;

/**
 * AuthModule (구 JwtLibrary)
 *
 * CI3에서 src/ 하위 JWT 모듈을 "조립(wiring)"해서 제공하는 얇은 어댑터/파사드.
 * - 비즈니스 로직은 AuthService/TokenService 쪽으로 내려간다.
 */
class AuthModule
{
    private $CI;
    private array $jwtConfig;

    private JwtManager $jwtManager;

    private RefreshTokenHasher $refreshTokenHasher;
    private RefreshTokenRepository $refreshTokenRepository;
    private UserContext $userContext;
    private TokenTransport $tokenTransport;
    private JwtBootstrapper $jwtBootstrapper;
    private UserRoleRepository $userRoleRepository;
    private UserAuthRepository $userAuthRepository;
    private UserLoginLogRepository $userLoginLogRepository;
    private UserRepository $userRepository;
    private JwtService $jwtService;
    private UserService $userService;


    public function __construct()
    {
        $this->CI = &get_instance();

        // Composer autoload가 설정되어 있어야 src/ 네임스페이스 및 firebase/php-jwt가 로딩됩니다.
        if (!class_exists('Firebase\\JWT\\JWT')) {
            throw new \RuntimeException(
                "Composer autoload is not enabled. Set \$config['composer_autoload'] = FCPATH.'vendor/autoload.php';"
            );
        }

        // 2) db 로딩 보장 (Repository가 db 필요)
        if (!isset($this->CI->db)) {
            $this->CI->load->database();
        }

        // 3) config 로딩
        $this->CI->config->load('jwt');
        $this->jwtConfig = (array) $this->CI->config->item('jwt');


        // === wiring ===
        $this->jwtManager = new JwtManager(
            (string) ($this->jwtConfig['access_secret']),
            (string) ($this->jwtConfig['refresh_secret']),
            (int) ($this->jwtConfig['access_ttl']),
            (int) ($this->jwtConfig['refresh_ttl'])
        );

        $this->refreshTokenHasher = new RefreshTokenHasher();
        $this->refreshTokenRepository = new RefreshTokenRepository($this->CI->db);

        $this->tokenTransport = new TokenTransport($this->CI->input, $this->CI->output, $this->jwtConfig);
        $this->userContext = new UserContext();
        $this->userRoleRepository = new UserRoleRepository($this->CI->db);
        $this->userAuthRepository = new UserAuthRepository($this->CI->db);

        $this->userLoginLogRepository = new UserLoginLogRepository($this->CI->db);
        $this->userRepository = new UserRepository($this->CI->db);

        $this->jwtService = new JwtService($this->jwtManager, $this->tokenTransport, $this->userContext, $this->userRoleRepository, $this->userAuthRepository, $this->refreshTokenHasher, $this->refreshTokenRepository, $this->userLoginLogRepository);
        $this->userService = new UserService($this->userLoginLogRepository, $this->userRepository);
    }

    /** @return UserContext */
    public function context()
    {
        return $this->jwtService->context();
    }

    public function bootstrap(): void
    {
        $this->jwtService->bootstrap();
    }

    public function loginByCredentials(UserLoginReq $userLoginReq): UserLoginRes
    {
        return $this->jwtService->loginByCredentials($userLoginReq);
    }

    public function me(): UserMeRes
    {
        return $this->jwtService->me();
    }

    public function refreshAccessToken(): JwtTokenRes
    {
        return $this->jwtService->refreshAccessToken();
    }

    public function logout(): void
    {
        $this->jwtService->logout();
    }

    public function purgeRefreshTokens(int $replacedRetentionDays = 7, int $limit = 5000): int
    {
        return $this->refreshTokenRepository->purgeExpiredAndOldReplaced($replacedRetentionDays, $limit);
    }

    public function logList(UserLoginLogListQuery $userLoginLogListQuery): UserLoginLogListRes
    {
        return $this->userService->logList($userLoginLogListQuery);
    }

    public function userList(UserListQuery $userListQuery): UserListRes
    {
        return $this->userService->userList($userListQuery);
    }

}
