<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-22 00:44:14 --> Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned | Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned
#0 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(88): UserModule->userCareer(274)
#1 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->career(274)
#2 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('career', Array)
#3 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2026-01-22 00:44:18 --> Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned | Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned
#0 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(88): UserModule->userCareer(274)
#1 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->career(274)
#2 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('career', Array)
#3 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2026-01-22 00:44:19 --> Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned | Return value of UserModule::userCareer() must be an instance of App\userDetail\dto\response\UserCareerRes, null returned
#0 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(88): UserModule->userCareer(274)
#1 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->career(274)
#2 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('career', Array)
#3 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2026-01-22 00:48:59 --> Too few arguments to function App\userDetail\repository\UserDetailRepository::resolveLicenseSeqOrFail(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 328 and exactly 3 expected | Too few arguments to function App\userDetail\repository\UserDetailRepository::resolveLicenseSeqOrFail(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 328 and exactly 3 expected
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(328): App\userDetail\repository\UserDetailRepository->resolveLicenseSeqOrFail('MANAGEMENT_SUPP...')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 00:49:10 --> Too few arguments to function App\userDetail\repository\UserDetailRepository::resolveLicenseSeqOrFail(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 328 and exactly 3 expected | Too few arguments to function App\userDetail\repository\UserDetailRepository::resolveLicenseSeqOrFail(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 328 and exactly 3 expected
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(328): App\userDetail\repository\UserDetailRepository->resolveLicenseSeqOrFail('MANAGEMENT_SUPP...')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 01:19:56 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 01:20:26 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 01:28:21 --> LICENSE_NOT_FOUND | LICENSE_NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(335): App\userDetail\repository\UserDetailRepository->resolveLicenseSeqOrFail('CONSTRUCTION_BU...', 'tb_office_depar...', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 01:38:00 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(335): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('STRUCTURAL_ENGI...', 'tb_office_depar...', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 02:18:16 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(351): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('TEMPORARY', 'tb_office_posit...', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 02:19:17 --> $department건설사업
ERROR - 2026-01-22 02:19:17 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(352): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('TEMPORARY', 'tb_office_posit...', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(275): App\userDetail\repository\UserDetailRepository->updateOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(143): UserModule->putUserOffice(279, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(279)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-22 02:20:55 --> $department건설사업
ERROR - 2026-01-22 02:27:04 --> $data: {"staff_num":"123456","contract_type":"DAILY","apprentice":"3\ub144","work_form":"SPECIAL","labor_form":"NON_RESIDENT","join_date":"2025-12-01","resign_date":null,"insurances_acquisition_date":"2025-12-01","insurances_loss_date":null,"contract_yn":"N","staff_card_yn":"N","fieldwork_yn":"N","department_seq":17,"position_seq":8}
ERROR - 2026-01-22 02:35:42 --> $data: {"staff_num":"123456","contract_type":"\uacc4\uc57d\uc9c1","apprentice":"3\ub144","work_form":"\uac04\uc8fc","labor_form":"\uc0c1\uadfc","join_date":"2025-12-01","resign_date":null,"insurances_acquisition_date":"2025-12-01","insurances_loss_date":null,"contract_yn":"N","staff_card_yn":"N","fieldwork_yn":"N","department_seq":12,"position_seq":6}
ERROR - 2026-01-22 05:23:08 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 05:38:12 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 05:38:17 --> Query error: Unknown column 'u.password_hash' in 'field list' - Invalid query: SELECT `u`.`seq`, `u`.`email`, `u`.`password_hash`, `u`.`salt`, `u`.`role`, `u`.`status`
FROM `tb_user` `u`
WHERE `u`.`email` = 'newuser@test.com'
ERROR - 2026-01-22 05:38:52 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 05:39:40 --> 404 Page Not Found: Api/authentication
