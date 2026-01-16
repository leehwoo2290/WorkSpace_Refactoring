<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-15 05:56:21 --> DETAIL ROW = Array
(
    [userId] => 276
    [licenseName] => 엘림주식회사
    [name] => 김엘림
    [role] => Admin
    [status] => Normal
    [email] => test@elimsafety.com
    [avatarFile] => 
    [remark] => 
    [configJson] => {"list_scale":"15","machine_report_picture_w":336,"machine_report_picture_h":231,"fms_jsessionid":"D4hiuymCaTaeN8Ru1VOMxDHL7f117nzm4fwjZzDTLI3zNzZyzkUyhjXJDYLyoTfT.amV1c19kb21haW4vZmltcw==","uplus_gw_userId":"","uplus_gw_pswd":"","delete_empty_picture_box":"Y","report_pagenum":"Y","show_top_project_name":"Y","show_bottom_company":"Y","insert_machine_cate_cover":"Y","customer_menu":"Y","customer_detail":"N","contract_menu":"N","counseling_menu":"N","income_view":"N","maintenance_checklist_left":"N","fms_id_manage":"N"}
    [staffNum] => 
    [departmentName] => 건설안전
    [positionName] => 팀장
    [engineerYn] => N
    [joinDate] => 
    [resignDate] => 
    [birthday] => 
    [mobile] => 01012345678
)

ERROR - 2026-01-15 05:59:09 --> DETAIL ROW = Array
(
    [userId] => 276
    [licenseName] => 엘림주식회사
    [name] => 김엘림
    [role] => Admin
    [status] => Normal
    [email] => test@elimsafety.com
    [avatarFile] => 
    [remark] => 
    [configJson] => {"list_scale":"15","machine_report_picture_w":336,"machine_report_picture_h":231,"fms_jsessionid":"D4hiuymCaTaeN8Ru1VOMxDHL7f117nzm4fwjZzDTLI3zNzZyzkUyhjXJDYLyoTfT.amV1c19kb21haW4vZmltcw==","uplus_gw_userId":"","uplus_gw_pswd":"","delete_empty_picture_box":"Y","report_pagenum":"Y","show_top_project_name":"Y","show_bottom_company":"Y","insert_machine_cate_cover":"Y","customer_menu":"Y","customer_detail":"N","contract_menu":"N","counseling_menu":"N","income_view":"N","maintenance_checklist_left":"N","fms_id_manage":"N"}
    [staffNum] => 
    [departmentName] => 건설안전
    [positionName] => 팀장
    [engineerYn] => N
    [joinDate] => 
    [resignDate] => 
    [birthday] => 
    [mobile] => 01012345678
)

ERROR - 2026-01-15 06:07:49 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 06:07:53 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 06:19:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 06:23:38 --> Class 'QueryEnumMapper' not found | Class 'QueryEnumMapper' not found
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(60): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-15 06:40:51 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 06:44:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:07:09 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:07:16 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:07:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:08:13 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:08:19 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:08:23 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:08:24 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:09:07 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:10:36 --> 404 Page Not Found: userDetail/UserSectionController/basic
ERROR - 2026-01-15 07:10:48 --> 404 Page Not Found: userDetail/UserSectionController/basic
ERROR - 2026-01-15 07:10:51 --> 404 Page Not Found: userDetail/UserSectionController/basic
ERROR - 2026-01-15 07:11:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:11:48 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:13:10 --> 404 Page Not Found: userDetail/UserSectionController/basic
ERROR - 2026-01-15 07:13:37 --> userId is required | userId is required
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\userDetail\dto\query\UserDetailQuery::fromArray(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(64): RequestQueryDtoJsonMapper->queryRequestDto('App\\userDetail\\...')
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->basic()
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('basic', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-01-15 07:16:12 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:06 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:14 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:34 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:49 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:21:52 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:23:04 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:29:12 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:29:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:29:35 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:31:34 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:31:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:48:41 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:48:58 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:48:59 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:52:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:54:50 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:54:51 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:55:06 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:55:18 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 07:55:20 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:01:29 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:01:57 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:04:09 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:04:13 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:09:37 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:12:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:15:09 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:19:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:20:37 --> userId is required | userId is required
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\userDetail\dto\query\UserDetailQuery::fromArray(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(64): RequestQueryDtoJsonMapper->queryRequestDto('App\\userDetail\\...')
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->basic(276)
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('basic', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-01-15 08:20:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:20:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:21:14 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:21:17 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:21:20 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:21:21 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:27:23 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:38:01 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:40:59 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:43:03 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:47:41 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:58:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:58:11 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:58:13 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 08:58:46 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:00:06 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:01:47 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:02:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:02:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:03:18 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:09:18 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:09:43 --> Class 'QueryEnumMapper' not found | Class 'QueryEnumMapper' not found
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-15 09:10:10 --> Class 'QueryEnumMapper' not found | Class 'QueryEnumMapper' not found
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-15 09:10:10 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:10:10 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:12:10 --> Class 'QueryEnumMapper' not found | Class 'QueryEnumMapper' not found
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-15 09:12:39 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:12:39 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:13:20 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:13:20 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:13:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:13:28 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:13:47 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:13:47 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:13:53 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:13:53 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:14:00 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:14:00 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:14:10 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:14:10 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:14:17 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:14:17 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:28:40 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:29:41 --> UNKNOWN_QUERY_KEY: licwense | UNKNOWN_QUERY_KEY: licwense
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:29:47 --> INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(127): QueryEnumMapper::map(Array, 'contract_type', 'SENIOR_ASSISTAN...')
#1 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-01-15 09:29:50 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:30:30 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:30:34 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:31:39 --> 404 Page Not Found: Api/web
ERROR - 2026-01-15 09:31:46 --> INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(127): QueryEnumMapper::map(Array, 'contract_type', 'SENIOR_ASSISTAN...')
#1 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-01-15 09:32:18 --> INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=SENIOR_ASSISTANT_MANAGER allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(127): QueryEnumMapper::map(Array, 'contract_type', 'SENIOR_ASSISTAN...')
#1 C:\xampp\htdocs\workspace_refactoring\src\user\repository\UserRepository.php(23): App\user\repository\UserRepository->applyWhere(Object(App\user\dto\query\UserListQuery))
#2 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(80): App\user\repository\UserRepository->count(Object(App\user\dto\query\UserListQuery))
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(71): App\user\service\UserService->userList(Object(App\user\dto\query\UserListQuery))
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(43): UserModule->userList(Object(App\user\dto\query\UserListQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-01-15 09:35:41 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:38:57 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:42:28 --> UNKNOWN_QUERY_KEY: officeDepartmentName | UNKNOWN_QUERY_KEY: officeDepartmentName
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:43:55 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:44:09 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:44:21 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-15 09:44:45 --> UNKNOWN_QUERY_KEY: sort | UNKNOWN_QUERY_KEY: sort
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(81): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(67): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(42): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
