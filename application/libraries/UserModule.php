<?php defined('BASEPATH') OR exit('No direct script access allowed');



use App\loginLog\dto\response\UserLoginLogListRes;
use App\loginLog\dto\query\UserLoginLogListQuery;

use App\user\getList\dto\response\UserListRes;
use App\user\getList\dto\query\UserListQuery;

use App\user\detail\dto\query\UserDetailQuery;
use App\user\detail\dto\response\UserDetailRes;

use App\user\detail\dto\response\UserBasicRes;

use App\user\detail\dto\response\UserPrivacyRes;

use App\user\detail\dto\response\UserOfficeRes;

use App\user\detail\dto\response\UserEtcRes;

use App\user\detail\dto\response\UserCareerRes;


use App\user\common\service\UserService;
use App\user\detail\service\UserDetailService;

use App\loginLog\repository\UserLoginLogRepository;
use App\user\common\repository\UserRepository;
use App\user\detail\repository\UserDetailRepository;

use App\user\detail\dto\request\UserBasicReq;
use App\user\detail\dto\request\UserPrivacyReq;
use App\user\detail\dto\request\UserOfficeReq;
use App\user\detail\dto\request\UserEtcReq;
use App\user\detail\dto\request\UserCareerReq;
use App\user\add\dto\request\UserAddReq;

use App\common\db\DbTransactionRunner;

final class UserModule
{
    private $CI;
    private UserService $userService;
    private UserDetailService $userDetailService;
    private UserRepository $userRepository;

    private UserLoginLogRepository $userLoginLogRepository;
    private UserDetailRepository $userDetailRepository;
    private DbTransactionRunner $dbTransactionRunner;
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

         $dbTransactionRunner = new DbTransactionRunner($this->CI->db);
        $this->userDetailService = new UserDetailService($this->userDetailRepository, $dbTransactionRunner);
    }

    public function logList(UserLoginLogListQuery $userLoginLogListQuery): UserLoginLogListRes
    {
        return $this->userService->logList($userLoginLogListQuery);
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
    public function putUserBasic(int $userSeq, UserBasicReq $userBasicReq)
    {
        return $this->userDetailService->putUserBasic($userSeq, $userBasicReq);
    }
    public function putUserPrivacy(int $userSeq, UserPrivacyReq $userPrivacyReq)
    {
        return $this->userDetailService->putUserPrivacy($userSeq, $userPrivacyReq);
    }
    public function putUserOffice(int $userSeq, UserOfficeReq $userOfficeReq)
    {
        return $this->userDetailService->putUserOffice($userSeq, $userOfficeReq);
    }
    public function putUserCareer(int $userSeq, UserCareerReq $userCareerReq)
    {
        return $this->userDetailService->putUserCareer($userSeq, $userCareerReq);
    }
    public function putUserEtc(int $userSeq, UserEtcReq $userEtcReq)
    {
        return $this->userDetailService->putUserEtc($userSeq, $userEtcReq);
    }

    public function addUser(UserAddReq $addUserReq)
    {
        $this->userService->userAdd($addUserReq);
    }
}
