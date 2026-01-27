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
ERROR - 2026-01-22 06:42:38 --> 404 Page Not Found: Api/web
ERROR - 2026-01-22 06:43:00 --> 404 Page Not Found: Api/web
ERROR - 2026-01-22 06:54:30 --> 404 Page Not Found: Api/authentication
ERROR - 2026-01-22 08:01:19 --> 404 Page Not Found: Api/web
ERROR - 2026-01-22 08:02:28 --> 404 Page Not Found: Api/web
ERROR - 2026-01-22 08:08:00 --> cookie_refreshToken=NULL
ERROR - 2026-01-22 08:10:57 --> 11111=
ERROR - 2026-01-22 08:10:57 --> cookie_refreshToken=NULL
ERROR - 2026-01-22 08:20:57 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:20:57 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:21:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:21:19 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:26 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:35 --> 11111=
ERROR - 2026-01-22 08:22:35 --> cookie_refreshToken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTA2NjU0NSwiZXhwIjoxNzY5MDY2NjM1LCJqdGkiOiI4YjA0OTI5MS04MzkzLTQ4ZTMtODk0ZS1lZWY4NmI0MTNjNmUiLCJ0eXAiOiJyZWZyZXNoIiwidmVyc2lvbiI6MH0.kyl9PdMKK3PLD8av7ka51AKvJ604jb4sIcHv28ylzfo
ERROR - 2026-01-22 08:22:42 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:22:42 --> 11111=
ERROR - 2026-01-22 08:22:42 --> cookie_refreshToken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTA2NjU1NSwiZXhwIjoxNzY5MDY2NjM1LCJqdGkiOiI5MmI2NzMyOC05NzRhLTQ1MjMtYjBmZS0zZTAwZWNhMjEzMjYiLCJ0eXAiOiJyZWZyZXNoIiwidmVyc2lvbiI6MX0.LPTOS5ZW4LewxCCNsOzQqlJWDMLcLikuNhx7OmPrtUk
ERROR - 2026-01-22 08:23:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:23:13 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:23:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:23:17 --> 11111=
ERROR - 2026-01-22 08:23:17 --> cookie_refreshToken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTA2NjU2MiwiZXhwIjoxNzY5MDY2NjM1LCJqdGkiOiJhOTgwOWZiZS04OTYxLTQ0NWEtYTA4Ni1kZmJlZGZkYjhhYzMiLCJ0eXAiOiJyZWZyZXNoIiwidmVyc2lvbiI6Mn0.114a1kfNS1QEL8Vo6pqd6Xs_kCvfzCQtjG8zVYiztsY
ERROR - 2026-01-22 08:24:09 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:24:09 --> 11111=
ERROR - 2026-01-22 08:24:09 --> cookie_refreshToken=NULL
ERROR - 2026-01-22 08:24:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:24:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:24:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:06 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:09 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:10 --> refreshToken: refreshToken refreshToken: 
ERROR - 2026-01-22 08:25:26 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:25:26 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:26:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:26:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:26:52 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:26:54 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:26:54 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:29:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:29:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:29:32 --> refreshToken: refreshToken refreshToken: 
ERROR - 2026-01-22 08:30:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:30:10 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:30:10 --> refreshToken: refreshToken refreshToken: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTA2NzAwNiwiZXhwIjoxNzY5MDY3MDk2LCJqdGkiOiI2ZGMyNWQwMi02NDhhLTRkMTgtOTdmMC01YWM0ZDEwMGEwZGIiLCJ0eXAiOiJyZWZyZXNoIiwidmVyc2lvbiI6MH0.BA3g14KxBQq_nK8MHFd0ceEmf5CFXCmcifT7qpA7a_I
ERROR - 2026-01-22 08:35:27 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:37:59 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:38:15 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:38:49 --> refreshToken: refreshToken refreshToken: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIyNzgiLCJpYXQiOjE3NjkwNjc0OTUsImV4cCI6MTc3MDI3NzA5NSwianRpIjoiYzhkZGM2NTMtOWU4OC00YmE0LTllOTAtN2IwYzZkY2RlNWM3IiwidHlwIjoicmVmcmVzaCIsInZlcnNpb24iOjB9.M2WtzXAK1UCg7Ypls_SUeStkPReyKiLVrlURIFcA9cg
ERROR - 2026-01-22 08:38:49 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:39:11 --> refreshToken: refreshToken refreshToken: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIyNzgiLCJpYXQiOjE3NjkwNjc1MjksImV4cCI6MTc3MDI3NzA5NSwianRpIjoiZDM0NTJkOWQtNTE5NC00YjhhLTgxYzUtYTEzMjAwNzQ0MDViIiwidHlwIjoicmVmcmVzaCIsInZlcnNpb24iOjF9.ZcJsaqqc0oUqRSbhDso10q-gHZDokLt3kDsciRIr_mM
ERROR - 2026-01-22 08:39:11 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:40:26 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:40:28 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:40:28 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:41:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:41:25 --> 404 Page Not Found: Api/web
ERROR - 2026-01-22 08:41:27 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:41:31 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:42:22 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:00 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:01 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:25 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:29 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:43:40 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:44:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:18 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:18 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:22 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:23 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:23 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:33 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:33 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:46:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:47:11 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:47:13 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:48:33 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:14 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:24 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:29 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:49:42 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:06 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:06 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:12 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:15 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:15 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:43 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:46 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:50:46 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:05 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:25 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:56 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:58 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:51:58 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:52:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 08:52:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:01:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:01:57 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:02:05 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:02:06 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:02:29 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:03:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:03:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:03:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:03:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:07:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:57 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:08:57 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:38 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:47 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:48 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:48 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:09:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:11 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:11 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:38 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:38 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:56 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:12:56 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:07 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:31 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:13:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:14:02 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:14:05 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:14:30 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:14:47 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:14 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:18 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:18 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:19 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:21 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:22 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:22 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:15:55 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:00 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:02 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:02 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:04 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:24 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:24 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:37 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:37 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:42 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:44 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:45 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:45 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:46 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:47 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:53 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:54 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:54 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:56 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:16:58 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:03 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:08 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:12 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:13 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:13 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:37 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:37 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:38 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:39 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:40 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:41 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:42 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:48 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:48 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:17:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:18:05 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:21:42 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:22:37 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:22:38 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:26:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:26:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:34 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:36 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:39 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:27:39 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:28:50 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:28:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:28:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:32:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:32:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:17 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:21 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:26 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:35:35 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:45:51 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:46:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:46:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:46:32 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:47:11 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:47:12 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:47:12 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:48:49 --> 404 Page Not Found: Api/api
ERROR - 2026-01-22 09:48:50 --> 404 Page Not Found: Api/api
