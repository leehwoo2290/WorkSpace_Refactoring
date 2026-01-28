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
