<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-16 00:08:38 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-16 00:27:34 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-16 00:41:23 --> INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(127): QueryEnumMapper::map(Array, 'contract_type', 'SENIOR_ASSISTAN...')
#1 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-01-16 01:01:42 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 01:02:16 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 01:09:30 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 01:25:46 --> row[0] = stdClass Object
(
    [seq] => 6
    [name] => (주)와우그로스
    [name_abbr] => WOW
    [ceo_name] => 김영진
    [bizno] => 3208703391
    [bizType] => 서비스업
    [bizClass] => 응용소프트웨어개발
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 김영진
    [mobile] => 
    [email] => contract@wowgrowth.co.kr
    [homepage] => 
    [tel] => 01030949944
    [fax] => 
    [addr1] => 경기도 화성시 봉담읍 와우안길 17
    [addr2] => 고운첨단과학기술연구원 906호
    [sido] => 경기도
    [sigungu] => 화성시
    [tax_email] => contract@wowgrowth.co.kr
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2025-01-17 08:10:52
    [user_cnt] => 1
    [machine_engineer_cnt] => 0
    [safety_engineer_cnt] => 0
    [machine_project_cnt] => 0
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 01:25:46 --> row[1] = stdClass Object
(
    [seq] => 5
    [name] => 엘림기술원(주)
    [name_abbr] => ELIMST
    [ceo_name] => 김남재
    [bizno] => 5298802749
    [bizType] => 
    [bizClass] => 
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 
    [mobile] => 
    [email] => elimsafetytech@gmail.com
    [homepage] => http://www.elimsafetytech.com/
    [tel] =>  0513615999
    [fax] => 0513615998
    [addr1] => 부산 북구 금곡대로638번길 9-7 라현빌딩 602호
    [addr2] => 
    [sido] => 부산광역시
    [sigungu] => 북구
    [tax_email] => 
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2024-03-06 02:46:32
    [user_cnt] => 8
    [machine_engineer_cnt] => 5
    [safety_engineer_cnt] => 0
    [machine_project_cnt] => 1
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 01:25:46 --> row[2] = stdClass Object
(
    [seq] => 4
    [name] => 엘림테크원(주)
    [name_abbr] => ELIMT
    [ceo_name] => 김남재
    [bizno] => 4438802784
    [bizType] => 
    [bizClass] => 
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 
    [mobile] => 
    [email] => elimtechone@gmail.com
    [homepage] => http://www.elimtechone.com/
    [tel] => 0613319001
    [fax] => 0613319002
    [addr1] => 전남 나주시 빛가람로 685 비전타워 406호
    [addr2] => 
    [sido] => 전라남도
    [sigungu] => 나주시
    [tax_email] => 
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2024-03-06 02:45:09
    [user_cnt] => 6
    [machine_engineer_cnt] => 2
    [safety_engineer_cnt] => 0
    [machine_project_cnt] => 2
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 01:25:46 --> row[3] = stdClass Object
(
    [seq] => 3
    [name] => 이엘테크원(주)
    [name_abbr] => ELTECHONE
    [ceo_name] => 김순영
    [bizno] => 5108137684
    [bizType] => 
    [bizClass] => 
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 
    [mobile] => 
    [email] => eltechone@daum.net
    [homepage] => http://eltechone.co.kr/
    [tel] => 0221359003
    [fax] => 05080908600
    [addr1] => 서울 송파구 법원로 114 B동 614호
    [addr2] => 
    [sido] => 서울특별시
    [sigungu] => 송파구
    [tax_email] => 
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2024-03-06 02:42:55
    [user_cnt] => 5
    [machine_engineer_cnt] => 0
    [safety_engineer_cnt] => 0
    [machine_project_cnt] => 0
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 01:25:46 --> row[4] = stdClass Object
(
    [seq] => 2
    [name] => 이엘엔지니어링(주)
    [name_abbr] => ELENG
    [ceo_name] => 김남재
    [bizno] => 6728801535
    [bizType] => 
    [bizClass] => 
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 
    [mobile] => 
    [email] => eleng1535@naver.com
    [homepage] => http://www.eleng.co.kr/
    [tel] => 0312127006
    [fax] => 05080977006
    [addr1] => 경기도 수원시 영통구 하동 984, 그랜드프라자 6층
    [addr2] => 
    [sido] => 경기도
    [sigungu] => 수원시
    [tax_email] => 
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2024-03-04 04:54:32
    [user_cnt] => 28
    [machine_engineer_cnt] => 2
    [safety_engineer_cnt] => 2
    [machine_project_cnt] => 0
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 01:25:46 --> row[5] = stdClass Object
(
    [seq] => 1
    [name] => 엘림주식회사
    [name_abbr] => ELIM
    [ceo_name] => 김남재
    [bizno] => 7178600698
    [bizType] => 먹태
    [bizClass] => 종종
    [contract_date] => 
    [expire_date] => 9999-12-31
    [pic] => 남상윤
    [mobile] => 
    [email] => oasis8600@hanmail.net
    [homepage] => https://elimsafety.com/
    [tel] => 0312129001
    [fax] => 0312129002
    [addr1] => 경기도 수원시 광교중앙로 248번길 7-7, 5층(하동)
    [addr2] => 5층
    [sido] => 경기도
    [sigungu] => 수원시
    [tax_email] => 
    [logo_file] => 
    [max_user_cnt] => 5
    [remark] => 
    [reg_time] => 2024-03-04 04:54:32
    [user_cnt] => 83
    [machine_engineer_cnt] => 11
    [safety_engineer_cnt] => 1
    [machine_project_cnt] => 1
    [safety_project_cnt] => 30
)

ERROR - 2026-01-16 04:53:58 --> [UserList] where = []
ERROR - 2026-01-16 04:53:58 --> [UserList] where = []
ERROR - 2026-01-16 04:56:42 --> Severity: Notice --> Undefined index: region C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php 71
ERROR - 2026-01-16 04:56:42 --> [UserList] where = null
ERROR - 2026-01-16 04:56:42 --> Severity: Notice --> Undefined index: region C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php 71
ERROR - 2026-01-16 04:56:42 --> [UserList] where = null
ERROR - 2026-01-16 04:58:24 --> [UserList] where = {}
ERROR - 2026-01-16 04:58:24 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:16 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:16 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:18 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:18 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:25 --> [UserList] where = {}
ERROR - 2026-01-16 04:59:25 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:28 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:28 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:38 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:38 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:45 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:45 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:48 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:48 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:50 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:50 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:52 --> [UserList] where = {}
ERROR - 2026-01-16 05:08:52 --> [UserList] where = {}
ERROR - 2026-01-16 05:09:02 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 05:09:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:09:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:09:06 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 05:14:05 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 05:14:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:14:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:21 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:21 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:39 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:39 --> [UserList] where = {}
ERROR - 2026-01-16 05:17:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 05:18:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:18:23 --> [UserList] where = {}
ERROR - 2026-01-16 05:18:53 --> [UserList] where = {}
ERROR - 2026-01-16 05:18:53 --> [UserList] where = {}
ERROR - 2026-01-16 05:18:59 --> [UserList] where = {}
ERROR - 2026-01-16 05:18:59 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:03 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:03 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:09 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:09 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:34 --> [UserList] where = {}
ERROR - 2026-01-16 05:19:34 --> [UserList] where = {}
ERROR - 2026-01-16 05:25:25 --> [UserList] where = {}
ERROR - 2026-01-16 05:25:25 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:00 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:00 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:03 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:03 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:26:48 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:27:07 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('test@eleng.co.k...', NULL, 'c54587b8806a102...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:10 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '5e1ce611ad37f78...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:13 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '1fb3ca89dbd1ccf...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:20 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('test@eleng.co.k...', NULL, 'a4f0a1b8661ea8d...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:23 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', 'a7a26e7eb2ff22a...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:28 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', 'c30211df2a20d5d...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:27:58 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:28:03 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', 'd657b12940cfb8c...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:28:09 --> 404 Page Not Found: Api/web
ERROR - 2026-01-16 05:28:09 --> [UserList] where = {}
ERROR - 2026-01-16 05:28:09 --> [UserList] where = {}
ERROR - 2026-01-16 05:28:10 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:28:16 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '0b2731653bd3ea5...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:28:21 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@elimsafety...', '429f133016605ee...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:28:30 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('test@elimsafety...', NULL, 'a8e8d874b216282...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:28:50 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:28:55 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:29:03 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '791172a44867682...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:29:08 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', 'a49f2a565fd69de...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:29:17 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '60ba114c2b0bfa2...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:30:06 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('lee@test.com', NULL, 'ef91ba839b5108e...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:30:08 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('lee@test.com', NULL, '96f44ec166c2b8b...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:30:15 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '284463efa79a0ee...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:30:35 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(76): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(125): App\user\component\UserLoginLogRecoder->logFail('lee@test.com', NULL, '72cc1406ab383f8...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:31:40 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('lee@test.com', '889eccfa8b59230...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:33:00 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '15477c254631167...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:37:16 --> [UserList] where = {}
ERROR - 2026-01-16 05:37:16 --> [UserList] where = {}
ERROR - 2026-01-16 05:39:49 --> [UserList] where = {}
ERROR - 2026-01-16 05:39:49 --> [UserList] where = {}
ERROR - 2026-01-16 05:41:31 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:41:47 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:41:52 --> Call to a member function format() on null | Call to a member function format() on null
#0 C:\xampp\htdocs\workspace_refactoring\src\user\component\UserLoginLogRecoder.php(47): App\user\repository\UserLoginLogRepository->insert(Object(App\user\entity\UserLoginLogEntity))
#1 C:\xampp\htdocs\workspace_refactoring\src\auth\service\JwtService.php(110): App\user\component\UserLoginLogRecoder->logSuccess('test@eleng.co.k...', '79b7058d0d9dff1...')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php(108): App\auth\service\JwtService->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(28): AuthModule->loginByCredentials(Object(App\auth\dto\request\UserLoginReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-16 05:44:28 --> [UserList] where = {}
ERROR - 2026-01-16 05:44:28 --> [UserList] where = {}
ERROR - 2026-01-16 05:46:29 --> [UserList] where = {}
ERROR - 2026-01-16 05:46:29 --> [UserList] where = {}
ERROR - 2026-01-16 05:50:16 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:58:15 --> [UserList] where = {}
ERROR - 2026-01-16 05:58:15 --> [UserList] where = {}
ERROR - 2026-01-16 05:58:53 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 05:58:59 --> [UserList] where = {}
ERROR - 2026-01-16 05:58:59 --> [UserList] where = {}
ERROR - 2026-01-16 05:59:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:59:05 --> [UserList] where = {}
ERROR - 2026-01-16 05:59:29 --> [UserList] where = {}
ERROR - 2026-01-16 05:59:29 --> [UserList] where = {}
ERROR - 2026-01-16 06:02:52 --> [UserList] where = {}
ERROR - 2026-01-16 06:02:52 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:19 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:19 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:28 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:28 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:57 --> [UserList] where = {}
ERROR - 2026-01-16 06:06:57 --> [UserList] where = {}
ERROR - 2026-01-16 06:07:27 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 06:36:20 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-16 06:36:31 --> [REFRESH] ApiException code=40112 msg=INVALID_PASSWORD
ERROR - 2026-01-16 06:36:31 --> 404 Page Not Found: Api/authentication
