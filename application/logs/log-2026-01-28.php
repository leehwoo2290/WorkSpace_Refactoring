<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-28 00:29:23 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 00:29:25 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 00:30:12 --> UNKNOWN_QUERY_KEY: licenseSeqs | UNKNOWN_QUERY_KEY: licenseSeqs
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:13:47 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('4', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:23:02 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('5', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:23:38 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('1', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:25:39 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('4', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:26:23 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:26:27 --> UNKNOWN_QUERY_KEY: licenseSeq | UNKNOWN_QUERY_KEY: licenseSeq
#0 C:\xampp\htdocs\workspace_refactoring\src\user\dto\query\UserListQuery.php(97): App\user\dto\query\UserListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\user\dto\query\UserListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php(37): RequestQueryDtoJsonMapper->queryRequestDto('App\\user\\dto\\qu...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:31:41 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('1', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:32:21 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('6', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:33:21 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('4', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:37:00 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('5', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:39:27 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('5', '\xEB\xB3\x80\xEA\xB2\xBD \xED\x85\x8C\xEC\x8A\xA4\xED\x8A...', 'User', 'PENDING', 'ddd123123@ddd.c...', NULL, '123', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:40:58 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('1', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:44:26 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('(\xEC\xA3\xBC)\xEC\x99\x80\xEC\x9A\xB0\xEA\xB7\xB8\xEB...', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:44:42 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('(\xEC\xA3\xBC)\xEC\x99\x80\xEC\x9A\xB0\xEA\xB7\xB8\xEB...', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:46:37 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('(\xEC\xA3\xBC)\xEC\x99\x80\xEC\x9A\xB0\xEA\xB7\xB8\xEB...', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:49:47 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('\xEC\x97\x98\xEB\xA6\xBC\xEC\xA3\xBC\xEC\x8B\x9D\xED\x9A\x8C...', '\xEB\xB3\x80\xEA\xB2\xBD \xED\x85\x8C\xEC\x8A\xA4\xED\x8A...', 'User', 'PENDING', 'ddd123123@ddd.c...', NULL, '123', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:50:04 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('\xEC\x97\x98\xEB\xA6\xBC\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:50:24 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('\xEC\x97\x98\xEB\xA6\xBC\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', '\xEB\xB3\x80\xEA\xB2\xBD \xED\x85\x8C\xEC\x8A\xA4\xED\x8A...', 'User', 'PENDING', 'ddd123123@ddd.c...', NULL, '123', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 01:52:32 --> Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used | Typed property App\userDetail\dto\request\UserBasicReq::$licenseName must be int or null, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\dto\request\UserBasicReq.php(46): App\userDetail\dto\request\UserBasicReq->__construct('\xEC\x97\x98\xEB\xA6\xBC\xEA\xB8\xB0\xEC\x88\xA0\xEC\x9B\x90...', '\xEC\xA7\x81\xEC\x9B\x90\xEC\x88\x98\xEC\xA0\x95\xEC\xB6\x94...', 'User', 'PENDING', '41234@test.com', NULL, 'tester445', Object(App\userDetail\dto\request\UserPermissionsReq))
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(58): App\userDetail\dto\request\UserBasicReq::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(168): RequestQueryDtoJsonMapper->jsonRequestDto('App\\userDetail\\...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}

ERROR - 2026-01-28 03:01:02 --> Severity: error --> Exception: Class 'App\user\component\UserContext' not found C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php 79
ERROR - 2026-01-28 03:01:22 --> Severity: error --> Exception: Class 'App\user\component\UserContext' not found C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php 79
ERROR - 2026-01-28 03:02:20 --> Severity: error --> Exception: Class 'App\user\component\UserContext' not found C:\xampp\htdocs\workspace_refactoring\application\libraries\AuthModule.php 79
ERROR - 2026-01-28 04:49:18 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php 5
ERROR - 2026-01-28 05:15:38 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php 5
ERROR - 2026-01-28 05:19:16 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php 8
ERROR - 2026-01-28 05:20:30 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php 10
ERROR - 2026-01-28 05:20:58 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\controllers\user\UserController.php 10
ERROR - 2026-01-28 05:21:18 --> 404 Page Not Found: Api/web
ERROR - 2026-01-28 05:21:33 --> 404 Page Not Found: Api/web
ERROR - 2026-01-28 05:21:50 --> Severity: error --> Exception: syntax error, unexpected 'list' (T_LIST), expecting identifier (T_STRING) or '{' C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php 8
ERROR - 2026-01-28 05:33:08 --> loginloginlogin
ERROR - 2026-01-28 05:33:08 --> EMPTY_JSON_BODY | EMPTY_JSON_BODY
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(42): RequestQueryDtoJsonMapper->requestDtoJsonBody(true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(47): RequestQueryDtoJsonMapper->jsonPayload(true)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\auth\JwtController.php(29): RequestQueryDtoJsonMapper->jsonRequestDto('App\\auth\\dto\\re...', true)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): JwtController->login()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('login', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 05:36:31 --> 404 Page Not Found: Api/web
ERROR - 2026-01-28 05:37:30 --> 404 Page Not Found: Api/web
ERROR - 2026-01-28 06:04:09 --> 404 Page Not Found: Api/api
ERROR - 2026-01-28 06:08:26 --> loginloginlogin
ERROR - 2026-01-28 06:08:26 --> loginByCredentials0{}
ERROR - 2026-01-28 06:08:26 --> loginByCredentials1{}
ERROR - 2026-01-28 06:08:26 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTU3NjkwNiwiZXhwIjoxNzY5NTc2OTE2LCJqdGkiOiI5ZjQ1MjkyZC03ODIzLTQ3MjYtYjNkZC00M2M1MDEzNDU3NmIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.ihxzAkHLXLeu0Qy0K1CFFyf8tcasIguyT6ZgUBOrxMk","accessExp":1769576916,"tokenType":"Bearer"}}
ERROR - 2026-01-28 06:08:34 --> loginloginlogin
ERROR - 2026-01-28 06:08:34 --> loginByCredentials0{}
ERROR - 2026-01-28 06:08:34 --> loginByCredentials1{}
ERROR - 2026-01-28 06:08:35 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTU3NjkxNCwiZXhwIjoxNzY5NTc2OTI0LCJqdGkiOiIzNTRhOTgwNi0yZmRjLTQwYWQtOTUzZS1iMDUxM2Y4YmRjNmUiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.kBOVQLu78LXlb2g6Du5WGLFgktjxsuNpQ4Dz385ZQJ8","accessExp":1769576924,"tokenType":"Bearer"}}
ERROR - 2026-01-28 06:22:00 --> loginloginlogin
ERROR - 2026-01-28 06:22:00 --> loginByCredentials0{}
ERROR - 2026-01-28 06:22:00 --> loginByCredentials1{}
ERROR - 2026-01-28 06:22:10 --> loginloginlogin
ERROR - 2026-01-28 06:22:10 --> loginByCredentials0{}
ERROR - 2026-01-28 06:22:10 --> loginByCredentials1{}
ERROR - 2026-01-28 06:22:10 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTU3NzczMCwiZXhwIjoxNzY5NTc3NzQwLCJqdGkiOiI2ODhlMjJlYi04M2YyLTQyNDUtOTg0OC0xMzJkMjQ4MWViZjAiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.B_qcADhMb_DUAk-VigcrGwpcjxvsdbqIB0Z6c2dXUjI","accessExp":1769577740,"tokenType":"Bearer"}}
ERROR - 2026-01-28 07:51:34 --> SAFETY_ENGINEER_LIST_FAILED | LICENSE_SEQ_REQUIRED
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(70): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery->__construct(1, 20, Array, 0, NULL, NULL, NULL, NULL)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(19): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyEngineerController->list()
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-01-28 07:57:22 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 07:59:29 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 07:59:33 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 07:59:46 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 08:00:18 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 08:00:39 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 08:00:43 --> Severity: error --> Exception: Typed property SafetyModule::$safetyEngineerRepository must not be accessed before initialization C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 48
ERROR - 2026-01-28 08:02:09 --> LICENSE_SEQ_REQUIRED | LICENSE_SEQ_REQUIRED
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(70): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery->__construct(1, 20, Array, 0, NULL, NULL, NULL, NULL)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(23): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 08:03:32 --> Typed property App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::$licenseSeq must be int, null used | Typed property App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::$licenseSeq must be int, null used
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(67): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery->__construct(1, 20, Array, 0, NULL, NULL, NULL, NULL)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(23): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 08:07:41 --> SafetyEngineerListQuery={"page":1,"size":20,"offset":0,"licenseSeq":null}
ERROR - 2026-01-28 08:08:48 --> SafetyEngineerListQuery={"page":1,"size":20,"offset":0,"licenseSeq":null}
ERROR - 2026-01-28 08:39:34 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:39:47 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:40:21 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:40:37 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:40:46 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:40:53 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:41:08 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 08:41:44 --> INVALID_SORT_BY: engineers | INVALID_SORT_BY: engineers
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('engineers')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('engineers', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:06:49 --> INVALID_SORT_BY: engineers | INVALID_SORT_BY: engineers
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('engineers')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('engineers', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:06:51 --> INVALID_SORT_BY: engineers | INVALID_SORT_BY: engineers
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('engineers')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('engineers', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:10:02 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:12:20 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:12:46 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:13:56 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:15:54 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:19:01 --> INVALID_SORT_BY: status | INVALID_SORT_BY: status
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(164): App\safety\project\getList\dto\query\SafetyProjectListQuery::normSortBy('status')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(65): App\safety\project\getList\dto\query\SafetyProjectListQuery::parseSorts('status', 'ASC')
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-28 09:35:18 --> UNKNOWN_QUERY_KEY: projectStatus | UNKNOWN_QUERY_KEY: projectStatus
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:37:27 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:37:55 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:38:00 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:38:51 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:39:27 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:39:31 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:40:33 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:40:34 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:40:35 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:40:36 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:41:07 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:41:19 --> UNKNOWN_QUERY_KEY: fieldBeginDate | UNKNOWN_QUERY_KEY: fieldBeginDate
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:52:12 --> UNKNOWN_QUERY_KEY: projectStatus | UNKNOWN_QUERY_KEY: projectStatus
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-01-28 09:52:18 --> UNKNOWN_QUERY_KEY: placeName | UNKNOWN_QUERY_KEY: placeName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\getList\dto\query\SafetyProjectListQuery.php(60): App\safety\project\getList\dto\query\SafetyProjectListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\getList\dto\query\SafetyProjectListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(33): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): SafetyProjectController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
