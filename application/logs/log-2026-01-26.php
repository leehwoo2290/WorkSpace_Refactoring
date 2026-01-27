<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-26 03:23:58 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(306): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('ELIM', 'tb_license', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(277): App\userDetail\repository\UserDetailRepository->updateBasic(287, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 03:24:23 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(306): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('ELIM', 'tb_license', 'name')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(277): App\userDetail\repository\UserDetailRepository->updateBasic(287, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 03:28:02 --> Argument 10 passed to App\userDetail\entity\UserPrivacyUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php on line 95 | Argument 10 passed to App\userDetail\entity\UserPrivacyUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php on line 95
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php(95): App\userDetail\entity\UserPrivacyUpdateEntity->__construct('N', '9801191111111', NULL, '11', NULL, NULL, NULL, NULL, NULL, 0, 'N', NULL, NULL, NULL, NULL, NULL, NULL)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(282): App\userDetail\entity\UserPrivacyUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserPrivacyReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserPrivacy(287, Object(App\userDetail\dto\request\UserPrivacyReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(192): UserModule->putUserPrivacy(287, Object(App\userDetail\dto\request\UserPrivacyReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updatePrivacy(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updatePrivacy', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 03:28:21 --> Argument 10 passed to App\userDetail\entity\UserPrivacyUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php on line 95 | Argument 10 passed to App\userDetail\entity\UserPrivacyUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php on line 95
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserPrivacyUpdateEntity.php(95): App\userDetail\entity\UserPrivacyUpdateEntity->__construct('N', '9801191111111', NULL, '11', NULL, NULL, NULL, NULL, NULL, 0, 'N', NULL, NULL, NULL, NULL, NULL, NULL)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(282): App\userDetail\entity\UserPrivacyUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserPrivacyReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(121): App\userDetail\service\UserDetailService->putUserPrivacy(287, Object(App\userDetail\dto\request\UserPrivacyReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(192): UserModule->putUserPrivacy(287, Object(App\userDetail\dto\request\UserPrivacyReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updatePrivacy(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updatePrivacy', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 03:38:40 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:38:42 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:21 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:21 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:44 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:52 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:54 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:39:55 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:40:50 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:40:51 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:40:53 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:40:54 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:41:42 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:42:53 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:42:56 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 281
ERROR - 2026-01-26 03:43:00 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 277
ERROR - 2026-01-26 03:43:07 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 274
ERROR - 2026-01-26 03:43:09 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 274
ERROR - 2026-01-26 03:43:19 --> Query error: Unknown column 'o.labor_contract' in 'field list' - Invalid query: SELECT o.staff_num AS staffNum, o.labor_form AS laborForm, o.contract_type AS contractType, o.work_form AS workForm, o.engineer_yn AS engineerYn, o.join_date AS joinDate, o.resign_date AS resignDate, d.name AS departmentName, p.name AS positionName, o.labor_contract AS laborContract, o.hr_card_issue AS hrCardIssue, o.site_work AS siteWork, o.insure_acq_date AS insureAcqDate, o.insure_loss_date AS insureLossDate, o.group_insure_join AS groupInsureJoin
FROM `tb_user` `u`
LEFT JOIN `tb_user_office` `o` ON `o`.`user_seq` = `u`.`seq`
LEFT JOIN `tb_office_department` `d` ON `d`.`seq` = `o`.`department_seq`
LEFT JOIN `tb_office_position` `p` ON `p`.`seq` = `o`.`position_seq`
WHERE `u`.`seq` = 276
ERROR - 2026-01-26 03:47:46 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTM5NTY2NiwiZXhwIjoxNzY5Mzk1Njc2LCJqdGkiOiJiZjI3MjU2Zi0xNWYzLTQwZjgtYWJjMy00ZWM3MGQ3NWE4NWMiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.Pe709UD5azUHK8-ERJqGvqFp3dcEzHOOIz84YPEoBbM","accessExp":1769395676,"tokenType":"Bearer"}}
ERROR - 2026-01-26 03:49:58 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 03:50:07 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 04:25:16 --> Query error: Unknown column 'etc.militaryYn' in 'field list' - Invalid query: SELECT etc.militaryYn AS militaryYn, etc.military_start AS militaryStart, etc.military_end AS militaryEnd, etc.certificate AS certificate, etc.skill AS skill, etc.hobby AS hobby, etc.remark AS remark
FROM `tb_user` `u`
LEFT JOIN `tb_user_etc` `etc` ON `etc`.`user_seq` = `u`.`seq`
WHERE `u`.`seq` = 287
ERROR - 2026-01-26 05:10:15 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMDYxNSwiZXhwIjoxNzY5NDAwNjI1LCJqdGkiOiI4MzcxMTkwNC0zOTQ3LTRiZTMtOGYzOS1lMTEwZWZmMDA5NDMiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.OsrtcUe0TI-e0zArL9Lu2VSMwV0Yyxdam0xXJ8wGMzs","accessExp":1769400625,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:10:33 --> Query error: Unknown column 'registered_at' in 'field list' - Invalid query: INSERT INTO `tb_user_etc` (`user_seq`, `youth_job_leap`, `youth_employment_incentive`, `youth_digital`, `senior_internship`, `new_middle_aged_jobs`, `income_tax_reduction_begin_date`, `income_tax_reduction_end_date`, `employed_type`, `military_period`, `registered_at`, `last_login_at`) VALUES (287, '1', '1', '1', '1', '1', NULL, NULL, '1', '1', NULL, NULL) ON DUPLICATE KEY UPDATE `youth_job_leap` = VALUES(`youth_job_leap`), `youth_employment_incentive` = VALUES(`youth_employment_incentive`), `youth_digital` = VALUES(`youth_digital`), `senior_internship` = VALUES(`senior_internship`), `new_middle_aged_jobs` = VALUES(`new_middle_aged_jobs`), `income_tax_reduction_begin_date` = VALUES(`income_tax_reduction_begin_date`), `income_tax_reduction_end_date` = VALUES(`income_tax_reduction_end_date`), `employed_type` = VALUES(`employed_type`), `military_period` = VALUES(`military_period`), `registered_at` = VALUES(`registered_at`), `last_login_at` = VALUES(`last_login_at`)
ERROR - 2026-01-26 05:10:54 --> Query error: Unknown column 'registered_at' in 'field list' - Invalid query: INSERT INTO `tb_user_etc` (`user_seq`, `youth_job_leap`, `youth_employment_incentive`, `youth_digital`, `senior_internship`, `new_middle_aged_jobs`, `income_tax_reduction_begin_date`, `income_tax_reduction_end_date`, `employed_type`, `military_period`, `registered_at`, `last_login_at`) VALUES (287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL) ON DUPLICATE KEY UPDATE `youth_job_leap` = VALUES(`youth_job_leap`), `youth_employment_incentive` = VALUES(`youth_employment_incentive`), `youth_digital` = VALUES(`youth_digital`), `senior_internship` = VALUES(`senior_internship`), `new_middle_aged_jobs` = VALUES(`new_middle_aged_jobs`), `income_tax_reduction_begin_date` = VALUES(`income_tax_reduction_begin_date`), `income_tax_reduction_end_date` = VALUES(`income_tax_reduction_end_date`), `employed_type` = VALUES(`employed_type`), `military_period` = VALUES(`military_period`), `registered_at` = VALUES(`registered_at`), `last_login_at` = VALUES(`last_login_at`)
ERROR - 2026-01-26 05:10:58 --> Query error: Unknown column 'registered_at' in 'field list' - Invalid query: INSERT INTO `tb_user_etc` (`user_seq`, `youth_job_leap`, `youth_employment_incentive`, `youth_digital`, `senior_internship`, `new_middle_aged_jobs`, `income_tax_reduction_begin_date`, `income_tax_reduction_end_date`, `employed_type`, `military_period`, `registered_at`, `last_login_at`) VALUES (287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL) ON DUPLICATE KEY UPDATE `youth_job_leap` = VALUES(`youth_job_leap`), `youth_employment_incentive` = VALUES(`youth_employment_incentive`), `youth_digital` = VALUES(`youth_digital`), `senior_internship` = VALUES(`senior_internship`), `new_middle_aged_jobs` = VALUES(`new_middle_aged_jobs`), `income_tax_reduction_begin_date` = VALUES(`income_tax_reduction_begin_date`), `income_tax_reduction_end_date` = VALUES(`income_tax_reduction_end_date`), `employed_type` = VALUES(`employed_type`), `military_period` = VALUES(`military_period`), `registered_at` = VALUES(`registered_at`), `last_login_at` = VALUES(`last_login_at`)
ERROR - 2026-01-26 05:23:13 --> Query error: Unknown column 'registered_at' in 'field list' - Invalid query: INSERT INTO `tb_user_etc` (`user_seq`, `youth_job_leap`, `youth_employment_incentive`, `youth_digital`, `senior_internship`, `new_middle_aged_jobs`, `income_tax_reduction_begin_date`, `income_tax_reduction_end_date`, `employed_type`, `military_period`, `registered_at`, `last_login_at`) VALUES (287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '11', NULL, NULL) ON DUPLICATE KEY UPDATE `youth_job_leap` = VALUES(`youth_job_leap`), `youth_employment_incentive` = VALUES(`youth_employment_incentive`), `youth_digital` = VALUES(`youth_digital`), `senior_internship` = VALUES(`senior_internship`), `new_middle_aged_jobs` = VALUES(`new_middle_aged_jobs`), `income_tax_reduction_begin_date` = VALUES(`income_tax_reduction_begin_date`), `income_tax_reduction_end_date` = VALUES(`income_tax_reduction_end_date`), `employed_type` = VALUES(`employed_type`), `military_period` = VALUES(`military_period`), `registered_at` = VALUES(`registered_at`), `last_login_at` = VALUES(`last_login_at`)
ERROR - 2026-01-26 05:27:15 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTYzNSwiZXhwIjoxNzY5NDAxNjQ1LCJqdGkiOiJmZWMyMTFhOS1jNDkwLTQ2N2YtOGI1ZS05Y2JlZDI0ZTkyYzgiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.K1I6iFtKjy5VPZ81UnRpMHJkd-uqUY93z0Ny7qHB5a4","accessExp":1769401645,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:28:01 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTY4MSwiZXhwIjoxNzY5NDAxNjkxLCJqdGkiOiIzNDJkYjlmMy1kY2QyLTRiNjYtYWM2MS04MTJjZDRiYTI2OTIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.I7Zyrx4Ypzn7OiV4t4tO5B1dyvh0pc4h_PuDashl8PY","accessExp":1769401691,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:28:01 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTY4MSwiZXhwIjoxNzY5NDAxNjkxLCJqdGkiOiJkMDdjMDNiNS04NzNlLTQzYzctODliYy05NGFjODU5NmFkYmMiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.00zYTiM0z2IHnCAkExrUzh2hrf5e9YkOe0FKOuTUuB4","accessExp":1769401691,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:28:11 --> syntax error, unexpected ')', expecting variable (T_VARIABLE) | syntax error, unexpected ')', expecting variable (T_VARIABLE)
#0 C:\xampp\htdocs\workspace_refactoring\vendor\composer\ClassLoader.php(427): Composer\Autoload\{closure}('C:\\xampp\\htdocs...')
#1 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\userDetail\\...')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(302): spl_autoload_call('App\\userDetail\\...')
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(133): App\userDetail\service\UserDetailService->putUserEtc(287, Object(App\userDetail\dto\request\UserEtcReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(252): UserModule->putUserEtc(287, Object(App\userDetail\dto\request\UserEtcReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateEtc(287)
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateEtc', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-01-26 05:28:22 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTcwMiwiZXhwIjoxNzY5NDAxNzEyLCJqdGkiOiI5M2ZlYjY5Yy0zNDA2LTRlOWItYTk2Zi0zZGM0ZDI2ZGVlYTEiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.h7ikxE01DHkX2T55lQ5G-cIpkoIUcedGYl6UT5caWxY","accessExp":1769401712,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:28:58 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTczOCwiZXhwIjoxNzY5NDAxNzQ4LCJqdGkiOiIyMjg2MWQwNi1iM2Q2LTQwMjktODI3OS0xZGI5N2MzMDE4ZTkiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.AhHcvj1A81m6Icdvk6Jy2LPTS7LPm2znX2I5PdwIU1w","accessExp":1769401748,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:31:57 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMTkxNywiZXhwIjoxNzY5NDAxOTI3LCJqdGkiOiIwNGQ2ODlhMy1jMjVlLTQ3NTItODRiOS04ZGYwNzFjMWJiYjQiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.tOpfNUJRGNu9hgDnP1vazc6p00O-LQAnJqoMbZiFsS8","accessExp":1769401927,"tokenType":"Bearer"}}
ERROR - 2026-01-26 05:59:17 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwMzU1NywiZXhwIjoxNzY5NDAzNTY3LCJqdGkiOiJmMThmYjg3Mi04YzVhLTQzOWQtYWU4NS01MWZlYmUwZGZmZTkiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.g98AoGhGcuiSbhDmWLdWQlMvG20IeZf8LV0ZzMmbuEU","accessExp":1769403567,"tokenType":"Bearer"}}
ERROR - 2026-01-26 06:21:14 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwNDg3NCwiZXhwIjoxNzY5NDA0ODg0LCJqdGkiOiI0OWNkNjMxMi1hYTc3LTRhZmEtOTQ2MS0wMDllNTkxMjQ3YzIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.ZO1yqa0M6rLJkrsYrcKhRLeEzb2PcaxVD9WO5tQUo9E","accessExp":1769404884,"tokenType":"Bearer"}}
ERROR - 2026-01-26 06:31:52 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(310): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(287, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 06:32:06 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(310): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(287, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(287, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(287)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:07:31 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwNzY1MSwiZXhwIjoxNzY5NDA3NjYxLCJqdGkiOiJiMTkzN2JjMy00MDM2LTRiOWMtOWE4Ny05OGNmZjM4MjI2ZjMiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.gtbQPLn87vBrvlP61z0xJXt9DcTaoa1gxVGS6A__UQg","accessExp":1769407661,"tokenType":"Bearer"}}
ERROR - 2026-01-26 07:08:22 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwNzcwMiwiZXhwIjoxNzY5NDA3NzEyLCJqdGkiOiJkMmRiMWQ4Mi1jODYzLTQ4Y2MtOTdlYy1kOGM1MjQ1MGI0MWIiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.ekeynFfnazxH66xxsWMYRTetGtVkbcIa2a7vkjVQHtg","accessExp":1769407712,"tokenType":"Bearer"}}
ERROR - 2026-01-26 07:11:07 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:11:13 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:11:19 --> INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT] | INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(77): QueryEnumMapper::map(Array, 'labor_form', '\xEC\x83\x81\xEA\xB7\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:13:25 --> INVALID_ENUM_VALUE: contract_type=일용직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=일용직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEC\x9D\xBC\xEC\x9A\xA9\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:14:11 --> INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT] | INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(77): QueryEnumMapper::map(Array, 'labor_form', '\xEC\x83\x81\xEA\xB7\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:14:16 --> INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT] | INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(79): QueryEnumMapper::map(Array, 'office_departme...', '\xED\x86\xA0\xEB\xAA\xA9\xEA\xB8\xB0\xEC\x88\xA0', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:15:35 --> INVALID_ENUM_VALUE: contract_type=일용직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=일용직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEC\x9D\xBC\xEC\x9A\xA9\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:15:40 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:15:43 --> INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT] | INVALID_ENUM_VALUE: labor_form=상근 allowed=[RESIDENT, NON_RESIDENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(77): QueryEnumMapper::map(Array, 'labor_form', '\xEC\x83\x81\xEA\xB7\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:19:42 --> UserOfficeReq={}
ERROR - 2026-01-26 07:19:57 --> UserOfficeReq={}
ERROR - 2026-01-26 07:20:16 --> INVALID_ENUM_VALUE: contract_type=계약직1년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직1년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x811\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:20:22 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:20:48 --> INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT] | INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(79): QueryEnumMapper::map(Array, 'office_departme...', '\xED\x86\xA0\xEB\xAA\xA9\xEA\xB8\xB0\xEC\x88\xA0', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:23:36 --> UserOfficeReq={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"계약직1년","apprentice":null,"workForm":"간주","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":null,"insurancesLossDate":null,"contractYn":"N","staffCardYn":"N","fieldworkYn":"N"}
ERROR - 2026-01-26 07:23:36 --> INVALID_ENUM_VALUE: contract_type=계약직1년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직1년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x811\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(320): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:24:10 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwODY1MCwiZXhwIjoxNzY5NDA4NjYwLCJqdGkiOiI5MjM5YzMxOC02NDA5LTRiNTItYjc3My1lNWQzZWJkZTE5YzciLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.rIimCiuowrVOAkrctBXdQN3wppfE-nmokk3TKbN4ETg","accessExp":1769408660,"tokenType":"Bearer"}}
ERROR - 2026-01-26 07:27:05 --> UserOfficeReq={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"NON_REGULAR","apprentice":null,"workForm":"간주","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":null,"insurancesLossDate":null,"contractYn":"N","staffCardYn":"N","fieldworkYn":"N"}
ERROR - 2026-01-26 07:27:05 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(320): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:28:22 --> UserOfficeReq={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"REGULAR","apprentice":null,"workForm":"간주","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":null,"insurancesLossDate":null,"contractYn":"N","staffCardYn":"N","fieldworkYn":"N"}
ERROR - 2026-01-26 07:28:22 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(320): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:30:08 --> 404 Page Not Found: Api/web
ERROR - 2026-01-26 07:30:27 --> 404 Page Not Found: Api/web
ERROR - 2026-01-26 07:32:34 --> UserOfficeReq={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"REGULAR","apprentice":null,"workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":null,"insurancesLossDate":null,"contractYn":"N","staffCardYn":"N","fieldworkYn":"N"}
ERROR - 2026-01-26 07:32:34 --> INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT] | INVALID_ENUM_VALUE: office_department=토목기술 allowed=[CONSTRUCTION_BUSINESS, CONSTRUCTION_SAFETY, ARCHITECTURAL_ENGINEERING, MANAGEMENT_PLANNING, MANAGEMENT_SUPPORT, STRUCTURE, STRUCTURAL_ENGINEERING, MECHANICAL_EQUIPMENT, TECHNICAL_SALES, TECHNICAL_SALES_CS, TECHNICAL_DATA, CORPORATE_RESEARCH_CENTER, PLANNING_DEPARTMENT, PLANNING_PROMOTION, EXTERNAL_COOPERATION_TEAM, CEO, LEGAL_ADVISORY, ADMINISTRATION, DESIGN_TEAM, SAFETY_DIAGNOSIS_DEPARTMENT, EXECUTIVE_OFFICE, CIVIL_ENGINEERING_TECH, CIVIL_ENGINEERING_DEPARTMENT]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(79): QueryEnumMapper::map(Array, 'office_departme...', '\xED\x86\xA0\xEB\xAA\xA9\xEA\xB8\xB0\xEC\x88\xA0', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(320): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:36:08 --> jsonPayload={"email":"test@eleng.co.kr","password":"test12345"}
ERROR - 2026-01-26 07:36:08 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQwOTM2OCwiZXhwIjoxNzY5NDA5Mzc4LCJqdGkiOiIzMzhmY2NhMi1iMmRhLTRkYWYtYmVkOS1hMDRjODFkMzRjODAiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.ZNkjjK-E15kWV_2en280DmKIyzIBzqTso4KlZb9Qfnk","accessExp":1769409378,"tokenType":"Bearer"}}
ERROR - 2026-01-26 07:36:23 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_TECH","team":null,"task":null,"position":"TEMPORARY","contractType":"REGULAR","apprentice":"","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:36:45 --> jsonPayload={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"ASSISTANT_MANAGER","contractType":"정규직","apprentice":"","workForm":"별정","laborForm":"상근","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:36:45 --> INVALID_ENUM_VALUE: contract_type=정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEC\xA0\x95\xEA\xB7\x9C\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:37:41 --> jsonPayload={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"CONTRACT_1Y","apprentice":"","workForm":"별정","laborForm":"상근","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:37:41 --> INVALID_ENUM_VALUE: work_form=별정 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=별정 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEB\xB3\x84\xEC\xA0\x95', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:37:50 --> jsonPayload={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"단기","contractType":"CONTRACT_1Y","apprentice":"","workForm":"별정","laborForm":"상근","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:37:50 --> INVALID_ENUM_VALUE: work_form=별정 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=별정 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEB\xB3\x84\xEC\xA0\x95', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 07:37:59 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_TECH","team":null,"task":null,"position":"ASSISTANT_MANAGER","contractType":"REGULAR","apprentice":"","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:38:04 --> jsonPayload={"staffNum":"123","department":"토목기술","team":null,"task":null,"position":"RESPONSIBLE","contractType":"정규직","apprentice":"","workForm":"별정","laborForm":"상근","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"","staffCardYn":"","fieldworkYn":""}
ERROR - 2026-01-26 07:38:04 --> INVALID_ENUM_VALUE: contract_type=정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEC\xA0\x95\xEA\xB7\x9C\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:04:41 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:04:51 --> INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL] | INVALID_ENUM_VALUE: work_form=간주 allowed=[DEEMED, SPECIAL]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(76): QueryEnumMapper::map(Array, 'work_form', '\xEA\xB0\x84\xEC\xA3\xBC', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:05:26 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:06:05 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:06:52 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:07:17 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:07:56 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:08:19 --> INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직2년 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x812\xEB\x85\x84', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(284, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:09:33 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_TECH","team":null,"task":null,"position":"ASSISTANT_MANAGER","contractType":"NON_REGULAR","apprentice":"11","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:11:50 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(284, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(284, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(284, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(284)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:12:46 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:13:18 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:15:52 --> INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEB\xB9\x84\xEC\xA0\x95\xEA\xB7\x9C\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:16:28 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_DEPARTMENT","position":"TEMPORARY","contractType":"비정규직","apprentice":"1","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:16:28 --> INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEB\xB9\x84\xEC\xA0\x95\xEA\xB7\x9C\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:16:33 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_DEPARTMENT","position":"TEMPORARY","contractType":"비정규직","apprentice":"1","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:16:33 --> INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=비정규직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEB\xB9\x84\xEC\xA0\x95\xEA\xB7\x9C\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:16:50 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_DEPARTMENT","position":"TEMPORARY","contractType":"CONTRACT_2Y","apprentice":"1","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:16:56 --> jsonPayload={"staffNum":"123","department":"CIVIL_ENGINEERING_DEPARTMENT","position":"TEMPORARY","contractType":"CONTRACT_1Y","apprentice":"1","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:17:20 --> jsonPayload={"staffNum":"123","department":"STRUCTURE","position":"TEMPORARY","contractType":"CONTRACT_1Y","apprentice":"1","workForm":"SPECIAL","laborForm":"RESIDENT","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"","insurancesLossDate":"","contractYn":"Y","staffCardYn":"Y","fieldworkYn":"Y"}
ERROR - 2026-01-26 08:17:51 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:21:17 --> {"userSeq":38,"email":"test@eleng.co.kr","name":"테스트1","roles":["Admin"],"status":"Normal","licenseSeq":2,"pwResetRequired":false,"jwtTokenRes":{"accessToken":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIzOCIsImlhdCI6MTc2OTQxMjA3NywiZXhwIjoxNzY5NDEyMDg3LCJqdGkiOiJiZGVkNjg4Yy1mOWE2LTQ4MzctOWI3NS1mZGMyMGI0M2ZjMDYiLCJ0eXAiOiJhY2Nlc3MiLCJ2ZXJzaW9uIjowLCJyb2xlcyI6WyJBZG1pbiJdfQ.5HpeHXN57NpIxrjLIBL3K6GDWDAUclcNQw_2sapRAEw","accessExp":1769412087,"tokenType":"Bearer"}}
ERROR - 2026-01-26 08:21:29 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:21:37 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:21:37 --> INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(283, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(283, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:22:00 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:23:56 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('(\xEC\xA3\xBC)\xEC\x99\x80\xEC\x9A\xB0\xEA\xB7\xB8\xEB...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(282, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(282, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(282, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(282)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:25:08 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:25:25 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:26:55 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:28:01 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:29:02 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:29:02 --> INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(283, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(283, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:36:48 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:39:03 --> INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY] | INVALID_ENUM_VALUE: contract_type=계약직 allowed=[REGULAR, CONTRACT_1Y, CONTRACT_2Y, NON_REGULAR, DAILY, TEMPORARY]
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserOfficeUpdateEntity.php(75): QueryEnumMapper::map(Array, 'contract_type', '\xEA\xB3\x84\xEC\x95\xBD\xEC\xA7\x81', true)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(297): App\userDetail\entity\UserOfficeUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserOfficeReq))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(125): App\userDetail\service\UserDetailService->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(206): UserModule->putUserOffice(288, Object(App\userDetail\dto\request\UserOfficeReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateOffice(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateOffice', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:42:03 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(285, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(285)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:42:09 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(285, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(285)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:42:58 --> [office] office=
ERROR - 2026-01-26 08:42:59 --> [office] office=
ERROR - 2026-01-26 08:43:05 --> [office] office=
ERROR - 2026-01-26 08:43:52 --> [office] office=
ERROR - 2026-01-26 08:44:09 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(170): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:45:09 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":null,"contractType":"정규직","contractYn":"N","laborForm":"상근","workForm":"별정","fieldworkYn":"N","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:46:15 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":null,"contractType":"정규직","contractYn":"N","laborForm":"상근","workForm":"별정","fieldworkYn":"N","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:46:48 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":null,"contractType":"정규직","contractYn":"N","laborForm":"상근","workForm":"별정","fieldworkYn":"N","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:46:52 --> findOfficeRow row={"staffNum":null,"departmentNameMapped":null,"positionNameMapped":null,"apprentice":null,"contractType":"계약직2년","contractYn":"Y","laborForm":"상근","workForm":"간주","fieldworkYn":"N","staffCardYn":"N","joinDate":null,"resignDate":null,"insurancesAcquisitionDate":null,"insurancesLossDate":null}
ERROR - 2026-01-26 08:48:26 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":null,"contractType":"정규직","contractYn":"N","laborForm":"상근","workForm":"별정","fieldworkYn":"N","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:48:42 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":"123","contractType":"정규직","contractYn":"N","laborForm":"비상근","workForm":"간주","fieldworkYn":"Y","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:49:07 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(286): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:49:56 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":"123","contractType":"정규직","contractYn":"N","laborForm":"비상근","workForm":"간주","fieldworkYn":"Y","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:50:06 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":"123","contractType":"정규직","contractYn":"N","laborForm":"비상근","workForm":"간주","fieldworkYn":"Y","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:50:34 --> findOfficeRow row={"staffNum":"1234","departmentNameMapped":"경영지원","positionNameMapped":"인턴","apprentice":"123","contractType":"정규직","contractYn":"N","laborForm":"비상근","workForm":"간주","fieldworkYn":"Y","staffCardYn":"Y","joinDate":"2026-01-01","resignDate":"2026-01-02","insurancesAcquisitionDate":"2026-01-01","insurancesLossDate":"2026-01-03"}
ERROR - 2026-01-26 08:51:08 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:52:53 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:52:58 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(316): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x97\x98\xEB\xA6\xBC\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(288, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 08:54:15 --> userBasic row={"userSeq":"288","licenseName":"엘림테크원(주)","name":"직원수정추가테스트","role":"User","status":"Normal","email":"1234@test.com","avatarFile":null,"remark":"tester","configJson":null}
ERROR - 2026-01-26 08:56:43 --> Query error: Unknown column 'licenseName' in 'field list' - Invalid query: UPDATE `tb_user` SET `licenseName` = 'ELIMST', `name` = '직원수정추가테스트', `role` = 'User', `status` = 'NORMAL', `email` = '1234@test.com', `avatar_file` = NULL, `remark` = 'tester', `license_seq` = 5
WHERE `seq` = 288
ERROR - 2026-01-26 09:01:24 --> Too few arguments to function App\userDetail\entity\UserBasicUpdateEntity::toDbPayload(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 312 and exactly 2 expected | Too few arguments to function App\userDetail\entity\UserBasicUpdateEntity::toDbPayload(), 1 passed in C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php on line 312 and exactly 2 expected
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(312): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder))
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(288, Object(App\userDetail\entity\UserBasicUpdateEntity))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-01-26 09:02:30 --> Query error: Unknown column 'licenseName' in 'field list' - Invalid query: UPDATE `tb_user` SET `licenseName` = 'ELIM', `name` = '직원수정추가테스트', `role` = 'User', `status` = 'NORMAL', `email` = '1234@test.com', `avatar_file` = NULL, `remark` = 'tester', `license_seq` = 1
WHERE `seq` = 288
ERROR - 2026-01-26 09:04:22 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x9D\xB4\xEC\x97\x98\xEC\x97\x94\xEC\xA7\x80\xEB\x8B\x88...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(285, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(285, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(285)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:04:39 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:06:12 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:08:02 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:08:23 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x9D\xB4\xEC\x97\x98\xED\x85\x8C\xED\x81\xAC\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(283, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(283, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(283)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:09:06 --> NOT_FOUND | NOT_FOUND
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(314): App\userDetail\repository\UserDetailRepository->resolveSeqOrFail('\xEC\x97\x98\xEB\xA6\xBC\xEA\xB8\xB0\xEC\x88\xA0\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserBasicUpdateEntity.php(82): App\userDetail\repository\UserDetailRepository->App\userDetail\repository\{closure}('\xEC\x97\x98\xEB\xA6\xBC\xEA\xB8\xB0\xEC\x88\xA0\xEC\x9B\x90...', 'tb_license', 'name_abbr')
#2 C:\xampp\htdocs\workspace_refactoring\src\userDetail\repository\UserDetailRepository.php(315): App\userDetail\entity\UserBasicUpdateEntity->toDbPayload(Object(App\common\repository\WritePayloadBuilder), Object(Closure))
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(288): App\userDetail\repository\UserDetailRepository->updateBasic(288, Object(App\userDetail\entity\UserBasicUpdateEntity))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(117): App\userDetail\service\UserDetailService->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(169): UserModule->putUserBasic(288, Object(App\userDetail\dto\request\UserBasicReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateBasic(288)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateBasic', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:17:02 --> industrySameMonth=NULL
ERROR - 2026-01-26 09:17:02 --> industryOtherMonth=NULL
ERROR - 2026-01-26 09:17:02 --> officeData={"industry_same_month":null,"industry_other_month":null}
ERROR - 2026-01-26 09:22:20 --> Argument 5 passed to App\userDetail\entity\UserCareerUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserCareerUpdateEntity.php on line 49 | Argument 5 passed to App\userDetail\entity\UserCareerUpdateEntity::__construct() must be of the type string or null, int given, called in C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserCareerUpdateEntity.php on line 49
#0 C:\xampp\htdocs\workspace_refactoring\src\userDetail\entity\UserCareerUpdateEntity.php(49): App\userDetail\entity\UserCareerUpdateEntity->__construct('123', NULL, '123', '123', 11, 11)
#1 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(306): App\userDetail\entity\UserCareerUpdateEntity::fromReq(Object(App\userDetail\dto\request\UserCareerReq))
#2 C:\xampp\htdocs\workspace_refactoring\src\common\db\DbTransactionRunner.php(33): App\userDetail\service\UserDetailService->App\userDetail\service\{closure}()
#3 C:\xampp\htdocs\workspace_refactoring\src\userDetail\service\UserDetailService.php(308): App\common\db\DbTransactionRunner->run(Object(Closure))
#4 C:\xampp\htdocs\workspace_refactoring\application\libraries\UserModule.php(129): App\userDetail\service\UserDetailService->putUserCareer(288, Object(App\userDetail\dto\request\UserCareerReq))
#5 C:\xampp\htdocs\workspace_refactoring\application\controllers\userDetail\UserDetailController.php(229): UserModule->putUserCareer(288, Object(App\userDetail\dto\request\UserCareerReq))
#6 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(55): UserDetailController->updateCareer(288)
#7 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('updateCareer', Array)
#8 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#9 {main}
ERROR - 2026-01-26 09:25:50 --> industrySameMonth=111
ERROR - 2026-01-26 09:25:50 --> industryOtherMonth=111
ERROR - 2026-01-26 09:25:50 --> officeData={"industry_same_month":111,"industry_other_month":111}
ERROR - 2026-01-26 09:29:42 --> userEtc row={"youthJobLeap":"111","youthEmploymentIncentive":"111","youthDigital":"111","seniorInternship":"111","newMiddleAgedJobs":"111","groupInsuranceYn":"N","incomeTaxReductionBeginDate":"2026-01-01","incomeTaxReductionEndDate":"2026-01-01","employedType":"111","militaryPeriod":"111"}
ERROR - 2026-01-26 09:30:55 --> userEtc row={"youthJobLeap":null,"youthEmploymentIncentive":null,"youthDigital":null,"seniorInternship":null,"newMiddleAgedJobs":null,"groupInsuranceYn":"N","incomeTaxReductionBeginDate":null,"incomeTaxReductionEndDate":null,"employedType":"일반","militaryPeriod":"해당없음"}
