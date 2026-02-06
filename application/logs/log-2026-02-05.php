<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-02-05 00:30:42 --> refreshAccessToken
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-02-05 00:30:42 --> refreshAccessToken
ERROR - 2026-02-05 00:30:48 --> refreshAccessToken
ERROR - 2026-02-05 00:31:14 --> refreshAccessToken
ERROR - 2026-02-05 00:37:04 --> refreshAccessToken
ERROR - 2026-02-05 00:38:11 --> refreshAccessToken
ERROR - 2026-02-05 00:42:16 --> refreshAccessToken
ERROR - 2026-02-05 00:51:21 --> refreshAccessToken
ERROR - 2026-02-05 00:56:28 --> refreshAccessToken
ERROR - 2026-02-05 00:57:07 --> refreshAccessToken
ERROR - 2026-02-05 00:57:39 --> refreshAccessToken
ERROR - 2026-02-05 00:59:55 --> refreshAccessToken
ERROR - 2026-02-05 01:00:34 --> refreshAccessToken
ERROR - 2026-02-05 01:03:44 --> refreshAccessToken
ERROR - 2026-02-05 01:04:39 --> refreshAccessToken
ERROR - 2026-02-05 01:04:57 --> refreshAccessToken
ERROR - 2026-02-05 01:06:11 --> refreshAccessToken
ERROR - 2026-02-05 01:09:53 --> refreshAccessToken
ERROR - 2026-02-05 01:10:05 --> refreshAccessToken
ERROR - 2026-02-05 01:26:53 --> refreshAccessToken
ERROR - 2026-02-05 01:32:22 --> refreshAccessToken
ERROR - 2026-02-05 01:32:26 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_user_privacy`, CONSTRAINT `FK_tb_user_privacy_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_user_privacy` (`user_seq`, `mobile`) VALUES (11, '01054991282') ON DUPLICATE KEY UPDATE `mobile` = VALUES(`mobile`)
ERROR - 2026-02-05 01:32:37 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_user_privacy`, CONSTRAINT `FK_tb_user_privacy_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_user_privacy` (`user_seq`, `mobile`) VALUES (11, '01054991282') ON DUPLICATE KEY UPDATE `mobile` = VALUES(`mobile`)
ERROR - 2026-02-05 01:33:12 --> refreshAccessToken
ERROR - 2026-02-05 01:33:19 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_user_privacy`, CONSTRAINT `FK_tb_user_privacy_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_user_privacy` (`user_seq`, `mobile`) VALUES (10, '01038765923') ON DUPLICATE KEY UPDATE `mobile` = VALUES(`mobile`)
ERROR - 2026-02-05 01:33:34 --> refreshAccessToken
ERROR - 2026-02-05 01:38:28 --> refreshAccessToken
ERROR - 2026-02-05 01:40:00 --> Query error: Duplicate entry 'test@eleng.co.kr' for key 'email' - Invalid query: UPDATE `tb_user` SET `email` = 'test@eleng.co.kr', `name` = '테스트1'
WHERE `seq` = 1
ERROR - 2026-02-05 01:53:49 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:03 --> UNKNOWN_QUERY_KEY: projectName | UNKNOWN_QUERY_KEY: projectName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(60): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(35): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 01:54:05 --> refreshAccessToken
ERROR - 2026-02-05 01:54:09 --> UNKNOWN_QUERY_KEY: projectName | UNKNOWN_QUERY_KEY: projectName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(60): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(35): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 01:54:14 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:16 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(148)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:20 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:45 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:59 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(148)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:54:59 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:55:06 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(131)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:01 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(131)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:02 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:07 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:23 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:45 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:48 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:56:50 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:57:25 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(171)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 01:57:29 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$userSeq must not be accessed before initialization
#0 [internal function]: App\safety\engineer\detail\dto\response\SafetyEngineerRes->jsonSerialize()
#1 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(73): json_encode(Array, 320)
#2 C:\xampp\htdocs\workspace_refactoring\src\common\ApiResult.php(26): App\common\ApiResult::emit(Object(App\common\ApiResult), 200)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(70): App\common\ApiResult::ok(Object(App\safety\engineer\detail\dto\response\SafetyEngineerRes))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(131)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 02:00:43 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_user_privacy`, CONSTRAINT `FK_tb_user_privacy_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_user_privacy` (`user_seq`, `mobile`) VALUES (10, '01038765923') ON DUPLICATE KEY UPDATE `mobile` = VALUES(`mobile`)
ERROR - 2026-02-05 02:01:28 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_user_privacy`, CONSTRAINT `FK_tb_user_privacy_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_user_privacy` (`user_seq`, `mobile`) VALUES (11, '01054991282') ON DUPLICATE KEY UPDATE `mobile` = VALUES(`mobile`)
ERROR - 2026-02-05 02:01:38 --> refreshAccessToken
ERROR - 2026-02-05 02:01:57 --> UNKNOWN_QUERY_KEY: projectName | UNKNOWN_QUERY_KEY: projectName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(60): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(35): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 02:02:17 --> refreshAccessToken
ERROR - 2026-02-05 02:02:48 --> refreshAccessToken
ERROR - 2026-02-05 02:09:18 --> refreshAccessToken
ERROR - 2026-02-05 02:18:38 --> refreshAccessToken
ERROR - 2026-02-05 02:22:45 --> refreshAccessToken
ERROR - 2026-02-05 02:57:20 --> refreshAccessToken
ERROR - 2026-02-05 02:57:39 --> refreshAccessToken
ERROR - 2026-02-05 02:58:04 --> refreshAccessToken
ERROR - 2026-02-05 03:08:38 --> UNKNOWN_QUERY_KEY: projectName | UNKNOWN_QUERY_KEY: projectName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(60): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(35): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 03:08:43 --> UNKNOWN_QUERY_KEY: projectName | UNKNOWN_QUERY_KEY: projectName
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\getList\dto\query\SafetyEngineerListQuery.php(60): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::checkAllowedKeys(Array)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\engineer\getList\dto\query\SafetyEngineerListQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(35): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\engi...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->list()
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('list', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 03:10:08 --> refreshAccessToken
ERROR - 2026-02-05 03:13:46 --> refreshAccessToken
ERROR - 2026-02-05 03:15:44 --> refreshAccessToken
ERROR - 2026-02-05 03:17:28 --> refreshAccessToken
ERROR - 2026-02-05 03:20:52 --> refreshAccessToken
ERROR - 2026-02-05 03:21:02 --> refreshAccessToken
ERROR - 2026-02-05 03:21:25 --> refreshAccessToken
ERROR - 2026-02-05 03:27:44 --> refreshAccessToken
ERROR - 2026-02-05 03:31:33 --> refreshAccessToken
ERROR - 2026-02-05 03:32:46 --> refreshAccessToken
ERROR - 2026-02-05 03:33:17 --> refreshAccessToken
ERROR - 2026-02-05 03:36:26 --> refreshAccessToken
ERROR - 2026-02-05 03:36:54 --> refreshAccessToken
ERROR - 2026-02-05 03:40:23 --> refreshAccessToken
ERROR - 2026-02-05 03:41:58 --> refreshAccessToken
ERROR - 2026-02-05 03:48:18 --> refreshAccessToken
ERROR - 2026-02-05 03:48:47 --> refreshAccessToken
ERROR - 2026-02-05 04:36:47 --> refreshAccessToken
ERROR - 2026-02-05 04:37:47 --> refreshAccessToken
ERROR - 2026-02-05 05:12:32 --> refreshAccessToken
ERROR - 2026-02-05 05:14:40 --> refreshAccessToken
ERROR - 2026-02-05 05:18:47 --> refreshAccessToken
ERROR - 2026-02-05 05:20:36 --> refreshAccessToken
ERROR - 2026-02-05 05:24:13 --> refreshAccessToken
ERROR - 2026-02-05 05:24:34 --> refreshAccessToken
ERROR - 2026-02-05 05:24:45 --> refreshAccessToken
ERROR - 2026-02-05 05:25:01 --> refreshAccessToken
ERROR - 2026-02-05 05:27:37 --> refreshAccessToken
ERROR - 2026-02-05 05:30:08 --> refreshAccessToken
ERROR - 2026-02-05 05:30:53 --> refreshAccessToken
ERROR - 2026-02-05 05:33:28 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 05:34:21 --> Argument 9 passed to App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes::__construct() must be of the type string or null, float given, called in C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes.php on line 244 | Argument 9 passed to App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes::__construct() must be of the type string or null, float given, called in C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes.php on line 244
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes.php(244): App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes->__construct('\xEA\xB3\xA4\xEC\xA7\x80\xEC\x95\x94\xEB\xA6\xAC\xEC\xA1\xB0...', 1, '\xEA\xB3\xA4\xEC\xA7\x80\xEC\x95\x94\xEB\xA6\xAC\xEC\xA1\xB0...', '4161033026-1-05...', '212010223000054...', 'AR2008-0003705', '\xEA\xB2\xBD\xEA\xB8\xB0 \xEA\xB4\x91\xEC\xA3\xBC\xEC\x8B...', '(\xEC\xA3\xBC)\xEB\x94\x94\xEC\x95\xA4\xEC\x98\xA4', 300000, '\xEB\x91\x90\xEB\xB2\x88\xEC\xA7\xB8\xEB\x8C\x80\xED\x91\x9C', '2010-06-10', '\xEC\xA0\x95\xEA\xB8\xB0\xEC\x95\x88\xEC\xA0\x84\xEC\xA0\x90...', '\xEC\x96\x91\xED\x98\xB8', 5, '\xEB\xB3\xB5\xEC\x82\xAC\xED\x95\xA0\xEB\x8B\xB4\xEB\x8B\xB9...', '2\xEC\xA2\x85', '01011112222', '16\xEC\xB8\xB5 \xEC\x9D\xB4\xEC\x83\x81 21...', '03180265122', '1078609325', '#F19149', 'https://livetou...', '\xEB\xB3\xB5\xEC\x82\xAC\xED\x95\xA0\xEB\x91\x90\xEB\xB2\x88...', '\xEB\xB3\xB5\xEC\x82\xAC\xED\x95\xA0\xEB\x91\x90\xEB\xB2\x88...', NULL, '/data/safety/20...', NULL, NULL, '2024-12-01', '\xEA\xB3\x84\xEC\x95\xBD\xEC\x99\x84\xEB\xA3\x8C', '500', NULL, NULL, NULL, '\xEA\xB3\xA4\xEC\xA7\x80\xEC\x95\x94', '0311234567', 'twice@project.c...')
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php(41): App\safety\project\detail\fieldInfo\dto\response\SafetyProjectFieldInfoRes::fromRow(Object(stdClass))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(164): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFieldInfo(110)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(100): SafetyModule->safetyProjectGetFieldInfo(110)
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->fieldInfo(110)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('fieldInfo', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-05 05:39:33 --> refreshAccessToken
ERROR - 2026-02-05 05:45:03 --> refreshAccessToken
ERROR - 2026-02-05 05:45:06 --> refreshAccessToken
ERROR - 2026-02-05 05:55:36 --> refreshAccessToken
ERROR - 2026-02-05 06:24:51 --> refreshAccessToken
ERROR - 2026-02-05 06:36:45 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 06:42:22 --> Severity: error --> Exception: Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::__construct(), 2 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 131 and exactly 4 expected C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php 29
ERROR - 2026-02-05 06:48:44 --> refreshAccessToken
ERROR - 2026-02-05 07:05:48 --> Too few arguments to function App\safety\project\detail\fieldInfo\dto\SafetyProjectContractManagerFilterItem::__construct(), 3 passed in C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php on line 163 and exactly 4 expected | Too few arguments to function App\safety\project\detail\fieldInfo\dto\SafetyProjectContractManagerFilterItem::__construct(), 3 passed in C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php on line 163 and exactly 4 expected
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php(163): App\safety\project\detail\fieldInfo\dto\SafetyProjectContractManagerFilterItem->__construct(131, '\xEA\xB9\x80\xEB\x8F\x99\xEC\xA0\x9C', '\xEA\xB1\xB4\xEC\x84\xA4\xEC\x95\x88\xEC\xA0\x84')
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(191): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getContractManagerFilter(110, 38)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(168): SafetyModule->safetyProjectContractManagerFilter(110, 38)
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->contractManagerFilter(110)
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('contractManager...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 07:12:28 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 07:29:42 --> refreshAccessToken
ERROR - 2026-02-05 07:59:24 --> Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected | Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(182): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(220)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(132): SafetyModule->safetyProjectFacilityRemarkFilter(220)
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter(220)
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-02-05 08:04:05 --> Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected | Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(182): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(220)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(132): SafetyModule->safetyProjectFacilityRemarkFilter(220)
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter(220)
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-02-05 08:04:46 --> refreshAccessToken
ERROR - 2026-02-05 08:07:37 --> Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected | Too few arguments to function App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService::getFacilityRemarkFilter(), 1 passed in C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php on line 182 and exactly 2 expected
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(182): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(220)
#1 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(132): SafetyModule->safetyProjectFacilityRemarkFilter(220)
#2 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter(220)
#3 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#4 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#5 {main}
ERROR - 2026-02-05 08:10:20 --> Severity: error --> Exception: Argument 1 passed to SafetyProjectController::facilityRemarkFilter() must be of the type int, string given, called in C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php on line 64 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php 129
ERROR - 2026-02-05 08:12:09 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:14:47 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:16:27 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:17:17 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:18:26 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:18:26 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:19:59 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:19:59 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:20:12 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:19 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:20 --> refreshAccessToken
ERROR - 2026-02-05 08:20:20 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:23 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:30 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:30 --> refreshAccessToken
ERROR - 2026-02-05 08:20:30 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:35 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:36 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:20:36 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:12 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:12 --> refreshAccessToken
ERROR - 2026-02-05 08:21:12 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:13 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:14 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:14 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:38 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:21:39 --> refreshAccessToken
ERROR - 2026-02-05 08:21:39 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:22:46 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:22:46 --> refreshAccessToken
ERROR - 2026-02-05 08:22:46 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:23:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:23:11 --> refreshAccessToken
ERROR - 2026-02-05 08:23:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:26:15 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:26:15 --> refreshAccessToken
ERROR - 2026-02-05 08:26:16 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:06 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:07 --> refreshAccessToken
ERROR - 2026-02-05 08:27:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:10 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:12 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:27:12 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:28:28 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:28:28 --> refreshAccessToken
ERROR - 2026-02-05 08:28:29 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:32:45 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:32:45 --> refreshAccessToken
ERROR - 2026-02-05 08:32:45 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:33:19 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:33:19 --> refreshAccessToken
ERROR - 2026-02-05 08:33:19 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:33:53 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:33:53 --> refreshAccessToken
ERROR - 2026-02-05 08:33:53 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:34:06 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:34:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:34:07 --> refreshAccessToken
ERROR - 2026-02-05 08:34:07 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:35:23 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:35:23 --> refreshAccessToken
ERROR - 2026-02-05 08:35:23 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:35:29 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:35:29 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php 189
ERROR - 2026-02-05 08:37:00 --> EMPTY_JSON_BODY | EMPTY_JSON_BODY
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(42): RequestQueryDtoJsonMapper->requestDtoJsonBody(true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(47): RequestQueryDtoJsonMapper->jsonPayload(true)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->jsonRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 08:37:28 --> EMPTY_JSON_BODY | EMPTY_JSON_BODY
#0 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(42): RequestQueryDtoJsonMapper->requestDtoJsonBody(true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(47): RequestQueryDtoJsonMapper->jsonPayload(true)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->jsonRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 08:45:16 --> refreshAccessToken
ERROR - 2026-02-05 08:45:35 --> refreshAccessToken
ERROR - 2026-02-05 08:45:51 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:45:51 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 08:47:57 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:48:55 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:48:56 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:48:57 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:49:47 --> refreshAccessToken
ERROR - 2026-02-05 08:49:57 --> 404 Page Not Found: Api/web
ERROR - 2026-02-05 08:57:52 --> findProjectJongRow req={"jong":""}
ERROR - 2026-02-05 08:58:12 --> findProjectJongRow req={"jong":""}
ERROR - 2026-02-05 08:58:43 --> refreshAccessToken
ERROR - 2026-02-05 08:58:58 --> findProjectJongRow req={"jong":""}
ERROR - 2026-02-05 08:59:10 --> findProjectJongRow req={"jong":null}
ERROR - 2026-02-05 09:01:06 --> findProjectJongRow req={"jong":"CLASS_1"}
ERROR - 2026-02-05 09:01:16 --> findProjectJongRow req={"jong":"CLASS_2"}
ERROR - 2026-02-05 09:01:22 --> findProjectJongRow req={"jong":"CLASS_3"}
ERROR - 2026-02-05 09:03:34 --> findProjectJongRow reqObj={}
ERROR - 2026-02-05 09:04:00 --> findProjectJongRow req={"jong":"3종"}
ERROR - 2026-02-05 09:04:00 --> findProjectJongRow reqObj={}
ERROR - 2026-02-05 09:04:59 --> findProjectJongRow reqObj={}
ERROR - 2026-02-05 09:05:59 --> findProjectJongRow reqObj={}
ERROR - 2026-02-05 09:08:44 --> Severity: Notice --> Undefined variable: req C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php 135
ERROR - 2026-02-05 09:08:44 --> Call to a member function jong() on null | Call to a member function jong() on null
#0 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#1 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#2 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#3 {main}
ERROR - 2026-02-05 09:08:56 --> Severity: Notice --> Undefined variable: req C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php 135
ERROR - 2026-02-05 09:08:56 --> Call to a member function jong() on null | Call to a member function jong() on null
#0 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#1 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#2 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#3 {main}
ERROR - 2026-02-05 09:09:15 --> facilityRemarkFilter jong=3종
ERROR - 2026-02-05 09:09:15 --> facilityRemarkFilter req={"jong":"3종"}
ERROR - 2026-02-05 09:09:55 --> facilityRemarkFilter req={"jong":"3종"}
ERROR - 2026-02-05 09:10:04 --> facilityRemarkFilter req={"jong":"3종"}
ERROR - 2026-02-05 09:17:51 --> refreshAccessToken
ERROR - 2026-02-05 09:20:21 --> Severity: Notice --> Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to int C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\repository\preset\SafetyProjectFieldInfoRowPreset.php 103
ERROR - 2026-02-05 09:29:48 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 09:36:06 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 09:36:09 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 09:36:09 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 09:36:37 --> 404 Page Not Found: Api/api
ERROR - 2026-02-05 09:37:38 --> refreshAccessToken
ERROR - 2026-02-05 09:37:41 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:37:43 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:37:49 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:38:09 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:38:44 --> refreshAccessToken
ERROR - 2026-02-05 09:38:46 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:38:52 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:39:14 --> Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string | Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string
#0 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(52): App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset->applyWhere(Object(CI_DB_mysqli_driver), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\common\repository\BaseListRepository.php(34): App\common\repository\preset\PresetListRepository->App\common\repository\preset\{closure}()
#2 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(56): App\common\repository\BaseListRepository->listWith(Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository.php(22): App\common\repository\preset\PresetListRepository->findListUsingPreset(Object(App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#4 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php(82): App\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository->findRemarkList(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(183): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#6 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(136): SafetyModule->safetyProjectFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#7 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#8 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#9 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#10 {main}
ERROR - 2026-02-05 09:39:47 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:39:48 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:39:55 --> refreshAccessToken
ERROR - 2026-02-05 09:39:59 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:40:04 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:40:14 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:40:15 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:40:19 --> Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string | Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string
#0 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(52): App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset->applyWhere(Object(CI_DB_mysqli_driver), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\common\repository\BaseListRepository.php(34): App\common\repository\preset\PresetListRepository->App\common\repository\preset\{closure}()
#2 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(56): App\common\repository\BaseListRepository->listWith(Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository.php(22): App\common\repository\preset\PresetListRepository->findListUsingPreset(Object(App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#4 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php(82): App\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository->findRemarkList(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(183): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#6 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(136): SafetyModule->safetyProjectFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#7 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#8 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#9 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#10 {main}
ERROR - 2026-02-05 09:40:24 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:41:15 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:41:15 --> Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string | Object of class App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery could not be converted to string
#0 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(52): App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset->applyWhere(Object(CI_DB_mysqli_driver), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#1 C:\xampp\htdocs\workspace_refactoring\src\common\repository\BaseListRepository.php(34): App\common\repository\preset\PresetListRepository->App\common\repository\preset\{closure}()
#2 C:\xampp\htdocs\workspace_refactoring\src\common\repository\preset\PresetListRepository.php(56): App\common\repository\BaseListRepository->listWith(Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository.php(22): App\common\repository\preset\PresetListRepository->findListUsingPreset(Object(App\safety\project\detail\fieldInfo\repository\preset\SafetyFacilityRemarkByJongListPreset), Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#4 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService.php(82): App\safety\project\detail\fieldInfo\repository\SafetyFacilityRemarkRepository->findRemarkList(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#5 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(183): App\safety\project\detail\fieldInfo\service\SafetyProjectFieldInfoService->getFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#6 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(136): SafetyModule->safetyProjectFacilityRemarkFilter(Object(App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery))
#7 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#8 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#9 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#10 {main}
ERROR - 2026-02-05 09:42:07 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:42:10 --> INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=2종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '2\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:42:11 --> refreshAccessToken
ERROR - 2026-02-05 09:42:22 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:42:27 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:42:33 --> INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT] | INVALID_ENUM_VALUE: safety_facility_jong=1종 allowed=[CLASS_1, CLASS_2, CLASS_3, CLASS_OUT]
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery.php(30): EnumMapper::map(Array, 'safety_facility...', '1\xEC\xA2\x85', true)
#1 C:\xampp\htdocs\workspace_refactoring\application\libraries\RequestQueryDtoJsonMapper.php(72): App\safety\project\detail\fieldInfo\dto\query\SafetyProjectFieldInfoFacilityRemarkFilterQuery::fromArray(Array)
#2 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(134): RequestQueryDtoJsonMapper->queryRequestDto('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->facilityRemarkFilter('$1')
#4 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('facilityRemarkF...', Array)
#5 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#6 {main}
ERROR - 2026-02-05 09:43:59 --> refreshAccessToken
