<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-27 01:00:11 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-27 01:00:11 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:00:11 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:04:25 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:04:25 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:04:26 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:04:33 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:04:44 --> Severity: Compile Error --> Access level to App\auth\repository\RefreshTokenRepository::$db must be protected (as in class App\common\repository\BaseRepository) or weaker C:\xampp\htdocs\workspace_refactoring\src\auth\repository\RefreshTokenRepository.php 13
ERROR - 2026-01-27 01:06:03 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQ3MjM2MywiZXhwIjoxNzY5NDcyMzczLCJqdGkiOiJhMmY3NDQyMy02N2QyLTRjNmQtYTA2ZC1iNGNmNWNhZDJjZTEiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.gy7L24ArCIMWkFw-rw5AAtxpBPgr0_Ckcq3WKnVv91s","accessExp":1769472373,"tokenType":"Bearer"}}
ERROR - 2026-01-27 01:09:46 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQ3MjU4NiwiZXhwIjoxNzY5NDcyNTk2LCJqdGkiOiIzMWRiN2JmNS1kMjBmLTQxYjItYWVmNy1mOWIxZGQwN2EzMTIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.RZQi1eDNQ3gohEKwUEjbJ2qm4ZZoHV3svA2wxoTlhZM","accessExp":1769472596,"tokenType":"Bearer"}}
ERROR - 2026-01-27 03:15:12 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQ4MDExMSwiZXhwIjoxNzY5NDgwMTIxLCJqdGkiOiJkMzk1Y2UwNS05MDA0LTQxZWUtOGIwMy0yMzVjM2JkOTNkMTIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.j72t_xsxioZLlJJGgT6ugAVs7CwEnm0LNt0EYPZ3HTo","accessExp":1769480121,"tokenType":"Bearer"}}
ERROR - 2026-01-27 04:23:48 --> Class 'App\user\repository\preset\UserLicenseFilterPreset' not found | Class 'App\user\repository\preset\UserLicenseFilterPreset' not found
#0 C:\xampp\htdocs\workspace_refactoring\src\user\service\UserService.php(128): App\user\repository\UserRepository->findListLicenseFilter()
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(85): App\user\service\UserService->licenseFilter()
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(81): UserModule->licenseFilter()
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->licenseFilter()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('licenseFilter', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 04:42:41 --> 404 Page Not Found: user/LicenseController/licenseFilter
ERROR - 2026-01-27 04:44:21 --> 404 Page Not Found: user/LicenseController/licenseFilter
ERROR - 2026-01-27 04:44:22 --> 404 Page Not Found: user/LicenseController/licenseFilter
ERROR - 2026-01-27 04:44:56 --> 404 Page Not Found: user/LicenseController/licenseFilter
ERROR - 2026-01-27 05:46:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:40 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:42 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:42 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:51 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:52 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:46:52 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:47:25 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:47:25 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:47:26 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:47:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:47:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:18 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:29 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:49:29 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:51:02 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:52:57 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:52:59 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:53:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:53:22 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:53:23 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:53:56 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:54:33 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:54:35 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:54:36 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:54:56 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:56:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:57:22 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:57:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 05:58:50 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:00:53 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:01:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:01:17 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:02:07 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:02:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:03:02 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:13:55 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:14:00 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:16:37 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:16:38 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:24:23 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:24:25 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:24:34 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:25:16 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:25:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:25:32 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:25:34 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:27:07 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:27:43 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:27:49 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:27:52 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:27:56 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:28:33 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:31:11 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:31:36 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:36:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:36:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:36:29 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:44:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:46:02 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:51:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:51:09 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:51:13 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:51:14 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:52:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:54:57 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:55:56 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 06:56:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:02:47 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:09:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:11:36 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:11:44 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:12:50 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:12:53 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:03 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:48 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:50 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:50 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:51 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:52 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:13:59 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:15:31 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:17:15 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:18:22 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:19:49 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:20:29 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:22:06 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:22:14 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:22:45 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:22:47 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:23:13 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:24:37 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:25:01 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:25:12 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:25:54 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:28:33 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 07:28:34 --> 404 Page Not Found: Api/web
ERROR - 2026-01-27 08:10:10 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:13:09 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:22:15 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:22:37 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:22:40 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:22:46 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:22:56 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:28:38 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:38:00 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:43:55 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-27 08:47:52 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
