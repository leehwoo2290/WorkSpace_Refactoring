<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\user\dto\response\UserLoginLogListRes;
use App\user\dto\query\UserLoginLogListQuery;

use App\user\dto\response\UserListRes;
use App\user\dto\query\UserListQuery;

use App\userDetail\dto\query\UserDetailQuery;
use App\userDetail\dto\response\UserDetailRes;

use App\userDetail\dto\response\UserBasicRes;

use App\userDetail\dto\response\UserPrivacyRes;

use App\userDetail\dto\response\UserOfficeRes;

use App\userDetail\dto\response\UserEtcRes;

use App\userDetail\dto\response\UserCareerRes;


use App\user\service\UserService;
use App\userDetail\service\UserDetailService;

use App\user\repository\UserLoginLogRepository;
use App\user\repository\UserRepository;
use App\userDetail\repository\UserDetailRepository;

use App\user\dto\response\UserListLicenseFilterRes;

final class UserModule
{
    private $CI;
    private UserService $userService;
    private UserDetailService $userDetailService;
    private UserRepository $userRepository;

    private UserLoginLogRepository $userLoginLogRepository;
    private UserDetailRepository $userDetailRepository;

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

        $this->userLoginLogRepository = new UserLoginLogRepository($this->CI->db);
        $this->userRepository = new UserRepository($this->CI->db);
        $this->userDetailRepository = new UserDetailRepository($this->CI->db);

        $this->userService = new UserService($this->userLoginLogRepository, $this->userRepository);
        $this->userDetailService = new UserDetailService($this->userDetailRepository);
    }

    public function logList(UserLoginLogListQuery $userLoginLogListQuery): UserLoginLogListRes
    {
        return $this->userService->logList($userLoginLogListQuery);
    }
    public function licenseFilter(): UserListLicenseFilterRes
    {
        return $this->userService->licenseFilter();
    }
    public function userList(UserListQuery $userListQuery): UserListRes
    {
        return $this->userService->userList($userListQuery);
    }
    public function userDetail(UserDetailQuery $userDetailQuery): UserDetailRes
    {
        return $this->userDetailService->userDetail($userDetailQuery);
    }
    public function userBasic(int $userSeq): UserBasicRes
    {
        return $this->userDetailService->userBasic($userSeq);
    }
    public function userPrivacy(int $userSeq): UserPrivacyRes
    {
        return $this->userDetailService->userPrivacy($userSeq);
    }
    public function userOffice(int $userSeq): UserOfficeRes
    {
        return $this->userDetailService->userOffice($userSeq);
    }
    public function userEtc(int $userSeq): UserEtcRes
    {
        return $this->userDetailService->userEtc($userSeq);
    }
    public function userCareer(int $userSeq): UserCareerRes
    {
        return $this->userDetailService->userCareer($userSeq);
    }
}
