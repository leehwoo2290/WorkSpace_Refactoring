<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-02-04 00:36:56 --> refreshAccessToken
ERROR - 2026-02-04 00:38:45 --> refreshAccessToken
ERROR - 2026-02-04 00:41:44 --> refreshAccessToken
ERROR - 2026-02-04 00:42:52 --> refreshAccessToken
ERROR - 2026-02-04 00:43:50 --> refreshAccessToken
ERROR - 2026-02-04 00:44:23 --> refreshAccessToken
ERROR - 2026-02-04 00:46:09 --> refreshAccessToken
ERROR - 2026-02-04 00:46:20 --> refreshAccessToken
ERROR - 2026-02-04 00:47:04 --> refreshAccessToken
ERROR - 2026-02-04 00:47:37 --> refreshAccessToken
ERROR - 2026-02-04 00:47:59 --> refreshAccessToken
ERROR - 2026-02-04 00:52:59 --> refreshAccessToken
ERROR - 2026-02-04 00:53:16 --> refreshAccessToken
ERROR - 2026-02-04 00:54:06 --> refreshAccessToken
ERROR - 2026-02-04 00:58:11 --> refreshAccessToken
ERROR - 2026-02-04 00:58:28 --> refreshAccessToken
ERROR - 2026-02-04 00:58:39 --> refreshAccessToken
ERROR - 2026-02-04 00:58:57 --> refreshAccessToken
ERROR - 2026-02-04 00:59:08 --> refreshAccessToken
ERROR - 2026-02-04 01:01:39 --> refreshAccessToken
ERROR - 2026-02-04 01:02:29 --> refreshAccessToken
ERROR - 2026-02-04 01:03:22 --> refreshAccessToken
ERROR - 2026-02-04 01:08:21 --> refreshAccessToken
ERROR - 2026-02-04 01:10:27 --> refreshAccessToken
ERROR - 2026-02-04 01:12:56 --> refreshAccessToken
ERROR - 2026-02-04 01:14:17 --> refreshAccessToken
ERROR - 2026-02-04 01:15:32 --> refreshAccessToken
ERROR - 2026-02-04 01:17:59 --> refreshAccessToken
ERROR - 2026-02-04 01:20:59 --> refreshAccessToken
ERROR - 2026-02-04 01:24:54 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$engineerSeq must be int, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\dto\response\SafetyEngineerRes.php(66): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromArray(Array)
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\service\SafetyEngineerDetailService.php(41): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromRow(Object(stdClass))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(164): App\safety\engineer\detail\service\SafetyEngineerDetailService->getDetail(38)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(69): SafetyModule->safetyEngineerGetDetail(38)
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-04 01:26:45 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$engineerSeq must be int, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\dto\response\SafetyEngineerRes.php(66): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromArray(Array)
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\service\SafetyEngineerDetailService.php(41): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromRow(Object(stdClass))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(164): App\safety\engineer\detail\service\SafetyEngineerDetailService->getDetail(38)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(69): SafetyModule->safetyEngineerGetDetail(38)
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-04 01:39:45 --> SafetyEngineerList row=[{"user_seq":"171","license_name":"엘림주식회사","grade":"참여","name":"문준일","department_name":"건설사업","position_name":"사원","license_no":"1","email":"wnsdlf9412@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"148","license_name":"엘림주식회사","grade":"참여","name":"강명석","department_name":"경영기획","position_name":"부장","license_no":"215235213234243","email":"nicekang88@elimsafety.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"131","license_name":"이엘엔지니어링(주)","grade":"초급","name":"김동제","department_name":"건설안전","position_name":"사원","license_no":"123","email":"kimdj6279@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":"123"},{"user_seq":"70","license_name":"이엘엔지니어링(주)","grade":"초급","name":"최은범","department_name":"건축기술","position_name":"과장","license_no":"","email":"bluekant319@naver.com","status":"대기","project_cnt":"1","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"276","license_name":"엘림주식회사","grade":"특급","name":"김엘림","department_name":"건설안전","position_name":"팀장","license_no":"1515253542","email":"test@elimsafety.com","status":"대기","project_cnt":"3","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"38","license_name":"이엘엔지니어링(주)","grade":"고급","name":"테스트1","department_name":"안전진단부","position_name":null,"license_no":"1234567","email":"test@eleng.co.kr","status":"대기","project_cnt":"10","last_project":"판교실리콘파크","last_project_date":"2024-11-25 ~ 2024-12-31","remark":""}]
ERROR - 2026-02-04 01:39:49 --> SafetyEngineerList row=[{"user_seq":"171","license_name":"엘림주식회사","grade":"참여","name":"문준일","department_name":"건설사업","position_name":"사원","license_no":"1","email":"wnsdlf9412@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"148","license_name":"엘림주식회사","grade":"참여","name":"강명석","department_name":"경영기획","position_name":"부장","license_no":"215235213234243","email":"nicekang88@elimsafety.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"131","license_name":"이엘엔지니어링(주)","grade":"초급","name":"김동제","department_name":"건설안전","position_name":"사원","license_no":"123","email":"kimdj6279@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":"123"},{"user_seq":"70","license_name":"이엘엔지니어링(주)","grade":"초급","name":"최은범","department_name":"건축기술","position_name":"과장","license_no":"","email":"bluekant319@naver.com","status":"대기","project_cnt":"1","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"276","license_name":"엘림주식회사","grade":"특급","name":"김엘림","department_name":"건설안전","position_name":"팀장","license_no":"1515253542","email":"test@elimsafety.com","status":"대기","project_cnt":"3","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"38","license_name":"이엘엔지니어링(주)","grade":"고급","name":"테스트1","department_name":"안전진단부","position_name":null,"license_no":"1234567","email":"test@eleng.co.kr","status":"대기","project_cnt":"10","last_project":"판교실리콘파크","last_project_date":"2024-11-25 ~ 2024-12-31","remark":""}]
ERROR - 2026-02-04 01:39:55 --> SafetyEngineerList row=[{"user_seq":"171","license_name":"엘림주식회사","grade":"참여","name":"문준일","department_name":"건설사업","position_name":"사원","license_no":"1","email":"wnsdlf9412@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"148","license_name":"엘림주식회사","grade":"참여","name":"강명석","department_name":"경영기획","position_name":"부장","license_no":"215235213234243","email":"nicekang88@elimsafety.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":null},{"user_seq":"131","license_name":"이엘엔지니어링(주)","grade":"초급","name":"김동제","department_name":"건설안전","position_name":"사원","license_no":"123","email":"kimdj6279@naver.com","status":"대기","project_cnt":null,"last_project":null,"last_project_date":null,"remark":"123"},{"user_seq":"70","license_name":"이엘엔지니어링(주)","grade":"초급","name":"최은범","department_name":"건축기술","position_name":"과장","license_no":"","email":"bluekant319@naver.com","status":"대기","project_cnt":"1","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"276","license_name":"엘림주식회사","grade":"특급","name":"김엘림","department_name":"건설안전","position_name":"팀장","license_no":"1515253542","email":"test@elimsafety.com","status":"대기","project_cnt":"3","last_project":"현대썬앤빌 서초","last_project_date":"2024-12-16 ~ 2024-12-31","remark":""},{"user_seq":"38","license_name":"이엘엔지니어링(주)","grade":"고급","name":"테스트1","department_name":"안전진단부","position_name":null,"license_no":"1234567","email":"test@eleng.co.kr","status":"대기","project_cnt":"10","last_project":"판교실리콘파크","last_project_date":"2024-11-25 ~ 2024-12-31","remark":""}]
ERROR - 2026-02-04 01:40:52 --> INTERNAL_ERROR | Typed property App\safety\engineer\detail\dto\response\SafetyEngineerRes::$engineerSeq must be int, string used
#0 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\dto\response\SafetyEngineerRes.php(66): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromArray(Array)
#1 C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\detail\service\SafetyEngineerDetailService.php(41): App\safety\engineer\detail\dto\response\SafetyEngineerRes::fromRow(Object(stdClass))
#2 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(164): App\safety\engineer\detail\service\SafetyEngineerDetailService->getDetail(38)
#3 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyEngineerController.php(69): SafetyModule->safetyEngineerGetDetail(38)
#4 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyEngineerController->detail(38)
#5 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('detail', Array)
#6 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#7 {main}
ERROR - 2026-02-04 01:45:39 --> refreshAccessToken
ERROR - 2026-02-04 01:47:44 --> refreshAccessToken
ERROR - 2026-02-04 01:48:39 --> refreshAccessToken
ERROR - 2026-02-04 02:05:24 --> refreshAccessToken
ERROR - 2026-02-04 02:13:20 --> refreshAccessToken
ERROR - 2026-02-04 02:24:42 --> refreshAccessToken
ERROR - 2026-02-04 02:24:57 --> refreshAccessToken
ERROR - 2026-02-04 02:33:18 --> refreshAccessToken
ERROR - 2026-02-04 02:33:18 --> JWT_REFRESH FAIL {"code":40116,"msg":"REFRESH_ROW_NOT_FOUND","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"f3be5b1e-2606-4859-9ac8-b46327ce64e8","db":{"hasTokenIdRow":false,"activeCountByUserDevice":0,"totalCountByUser":1}}
ERROR - 2026-02-04 02:36:08 --> refreshAccessToken
ERROR - 2026-02-04 02:36:24 --> refreshAccessToken
ERROR - 2026-02-04 02:38:51 --> refreshAccessToken
ERROR - 2026-02-04 02:39:01 --> refreshAccessToken
ERROR - 2026-02-04 02:39:53 --> refreshAccessToken
ERROR - 2026-02-04 02:40:05 --> refreshAccessToken
ERROR - 2026-02-04 02:42:39 --> refreshAccessToken
ERROR - 2026-02-04 02:52:38 --> refreshAccessToken
ERROR - 2026-02-04 02:52:45 --> IP_DEBUG {"REMOTE_ADDR":"192.168.0.50","XFF":null,"X_REAL_IP":null,"CLIENT_IP":null}
ERROR - 2026-02-04 03:01:20 --> refreshAccessToken
ERROR - 2026-02-04 03:01:20 --> JWT_REFRESH FAILdebugSnapshot {"code":40116,"msg":"REFRESH_ROW_NOT_FOUND","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"d0a315cf-7306-4f67-9436-8faee991bcd1","db":{"hasTokenIdRow":false,"activeCountByUserDevice":0,"totalCountByUser":1}}
ERROR - 2026-02-04 03:01:37 --> IP_DEBUG {"REMOTE_ADDR":"192.168.0.50","XFF":null,"X_REAL_IP":null,"CLIENT_IP":null}
ERROR - 2026-02-04 03:03:00 --> refreshAccessToken
ERROR - 2026-02-04 03:03:12 --> refreshAccessToken
ERROR - 2026-02-04 03:14:52 --> refreshAccessToken
ERROR - 2026-02-04 03:31:14 --> refreshAccessToken
ERROR - 2026-02-04 03:31:30 --> refreshAccessToken
ERROR - 2026-02-04 03:31:50 --> refreshAccessToken
ERROR - 2026-02-04 03:33:08 --> refreshAccessToken
ERROR - 2026-02-04 03:33:25 --> refreshAccessToken
ERROR - 2026-02-04 03:36:53 --> refreshAccessToken
ERROR - 2026-02-04 03:47:02 --> refreshAccessToken
ERROR - 2026-02-04 03:50:38 --> refreshAccessToken
ERROR - 2026-02-04 04:28:37 --> refreshAccessToken
ERROR - 2026-02-04 05:01:26 --> refreshAccessToken
ERROR - 2026-02-04 05:08:04 --> refreshAccessToken
ERROR - 2026-02-04 05:13:21 --> refreshAccessToken
ERROR - 2026-02-04 05:13:32 --> refreshAccessToken
ERROR - 2026-02-04 05:19:48 --> refreshAccessToken
ERROR - 2026-02-04 05:29:58 --> refreshAccessToken
ERROR - 2026-02-04 05:35:52 --> refreshAccessToken
ERROR - 2026-02-04 05:49:15 --> refreshAccessToken
ERROR - 2026-02-04 06:17:15 --> refreshAccessToken
ERROR - 2026-02-04 06:21:38 --> refreshAccessToken
ERROR - 2026-02-04 06:24:24 --> refreshAccessToken
ERROR - 2026-02-04 06:24:40 --> refreshAccessToken
ERROR - 2026-02-04 06:30:24 --> refreshAccessToken
ERROR - 2026-02-04 06:32:12 --> refreshAccessToken
ERROR - 2026-02-04 06:35:10 --> 404 Page Not Found: Api/web
ERROR - 2026-02-04 06:42:30 --> refreshAccessToken
ERROR - 2026-02-04 06:43:18 --> refreshAccessToken
ERROR - 2026-02-04 06:43:41 --> refreshAccessToken
ERROR - 2026-02-04 06:44:12 --> refreshAccessToken
ERROR - 2026-02-04 06:45:13 --> refreshAccessToken
ERROR - 2026-02-04 06:49:13 --> refreshAccessToken
ERROR - 2026-02-04 06:50:10 --> syntax error, unexpected ')', expecting variable (T_VARIABLE) | syntax error, unexpected ')', expecting variable (T_VARIABLE)
#0 C:\xampp\htdocs\workspace_refactoring\vendor\composer\ClassLoader.php(427): Composer\Autoload\{closure}('C:\\xampp\\htdocs...')
#1 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\safety\\proj...')
#2 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\schedule\service\SafetyProjectScheduleService.php(53): spl_autoload_call('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(171): App\safety\project\detail\schedule\service\SafetyProjectScheduleService->getSchedule(191)
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(132): SafetyModule->safetyProjectSchedule(191)
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->schedule(191)
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('schedule', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-02-04 06:50:48 --> refreshAccessToken
ERROR - 2026-02-04 06:51:13 --> refreshAccessToken
ERROR - 2026-02-04 06:51:45 --> refreshAccessToken
ERROR - 2026-02-04 06:53:25 --> refreshAccessToken
ERROR - 2026-02-04 06:54:41 --> refreshAccessToken
ERROR - 2026-02-04 06:54:54 --> refreshAccessToken
ERROR - 2026-02-04 06:55:18 --> refreshAccessToken
ERROR - 2026-02-04 06:56:58 --> refreshAccessToken
ERROR - 2026-02-04 06:57:08 --> refreshAccessToken
ERROR - 2026-02-04 06:58:52 --> refreshAccessToken
ERROR - 2026-02-04 07:00:42 --> refreshAccessToken
ERROR - 2026-02-04 07:04:15 --> refreshAccessToken
ERROR - 2026-02-04 07:06:15 --> refreshAccessToken
ERROR - 2026-02-04 07:06:53 --> refreshAccessToken
ERROR - 2026-02-04 07:07:18 --> refreshAccessToken
ERROR - 2026-02-04 07:08:56 --> refreshAccessToken
ERROR - 2026-02-04 07:10:10 --> refreshAccessToken
ERROR - 2026-02-04 07:11:30 --> refreshAccessToken
ERROR - 2026-02-04 07:16:22 --> refreshAccessToken
ERROR - 2026-02-04 07:17:04 --> refreshAccessToken
ERROR - 2026-02-04 07:19:24 --> refreshAccessToken
ERROR - 2026-02-04 07:19:44 --> Query error: Unknown column 'se.position' in 'field list' - Invalid query: SELECT se.seq AS engineer_seq, u.seq AS user_seq, u.name AS name, se.grade AS grade, se.position AS position
FROM `tb_safety_engineer` `se`
INNER JOIN `tb_user` `u` ON `u`.`seq` = `se`.`user_seq`
WHERE `u`.`license_seq` = 1
AND `u`.`status` <> 'Quit'
AND `se`.`deleted` = 'N'
ORDER BY `u`.`name` ASC, `u`.`seq` ASC
ERROR - 2026-02-04 07:19:54 --> refreshAccessToken
ERROR - 2026-02-04 07:20:08 --> refreshAccessToken
ERROR - 2026-02-04 07:20:19 --> Query error: Unknown column 'u.position' in 'field list' - Invalid query: SELECT se.seq AS engineer_seq, u.seq AS user_seq, u.name AS name, se.grade AS grade, u.position AS position
FROM `tb_safety_engineer` `se`
INNER JOIN `tb_user` `u` ON `u`.`seq` = `se`.`user_seq`
WHERE `u`.`license_seq` = 1
AND `u`.`status` <> 'Quit'
AND `se`.`deleted` = 'N'
ORDER BY `u`.`name` ASC, `u`.`seq` ASC
ERROR - 2026-02-04 07:53:26 --> refreshAccessToken
ERROR - 2026-02-04 07:54:48 --> syntax error, unexpected ')', expecting variable (T_VARIABLE) | syntax error, unexpected ')', expecting variable (T_VARIABLE)
#0 C:\xampp\htdocs\workspace_refactoring\vendor\composer\ClassLoader.php(427): Composer\Autoload\{closure}('C:\\xampp\\htdocs...')
#1 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\safety\\proj...')
#2 C:\xampp\htdocs\workspace_refactoring\src\safety\project\detail\schedule\service\SafetyProjectScheduleService.php(80): spl_autoload_call('App\\safety\\proj...')
#3 C:\xampp\htdocs\workspace_refactoring\application\libraries\SafetyModule.php(180): App\safety\project\detail\schedule\service\SafetyProjectScheduleService->getCandidates(191)
#4 C:\xampp\htdocs\workspace_refactoring\application\controllers\safety\SafetyProjectController.php(149): SafetyModule->safetyProjectScheduleCandidates(191)
#5 C:\xampp\htdocs\workspace_refactoring\application\core\BASE_Controller.php(64): SafetyProjectController->scheduleCandidates(191)
#6 C:\xampp\htdocs\workspace_refactoring\system\core\CodeIgniter.php(533): BASE_Controller->_remap('scheduleCandida...', Array)
#7 C:\xampp\htdocs\workspace_refactoring\index.php(184): require_once('C:\\xampp\\htdocs...')
#8 {main}
ERROR - 2026-02-04 08:00:21 --> refreshAccessToken
ERROR - 2026-02-04 08:00:38 --> refreshAccessToken
ERROR - 2026-02-04 08:01:48 --> refreshAccessToken
ERROR - 2026-02-04 08:04:22 --> refreshAccessToken
ERROR - 2026-02-04 08:04:35 --> refreshAccessToken
ERROR - 2026-02-04 08:07:55 --> refreshAccessToken
ERROR - 2026-02-04 08:09:02 --> refreshAccessToken
ERROR - 2026-02-04 08:09:17 --> refreshAccessToken
ERROR - 2026-02-04 08:11:06 --> refreshAccessToken
ERROR - 2026-02-04 08:12:54 --> refreshAccessToken
ERROR - 2026-02-04 08:14:23 --> refreshAccessToken
ERROR - 2026-02-04 08:18:41 --> Query error: Unknown column 'sp.projectSeq' in 'field list' - Invalid query: SELECT sp.projectSeq AS seq, sp.status AS status, sp.check_type AS check_type, NULLIF(CONCAT_WS(' ', sp.sido, sp.sigungu), '') AS region, sp.place_name AS place_name, sp.field_bgn_dt AS filed_begin_date, sp.field_end_dt AS field_end_date, sp.report_dt AS report_date, ft.name AS facility_type, sp.jong AS jong, l.name AS license_name, eng.engineer_name AS engineer_name, sp.gross_area AS gross_area
FROM `tb_safety_project` `sp`
LEFT JOIN `tb_license` `l` ON `l`.`seq` = `sp`.`license_seq`
LEFT JOIN `tb_safety_facility_type` `ft` ON `ft`.`seq` = `sp`.`facility_seq`
LEFT JOIN (
            SELECT
                sm.project_seq AS project_seq,
                CONCAT(
                    '[',
                    IFNULL(
                        GROUP_CONCAT(
                            DISTINCT CONCAT(
                                '{"name":', JSON_QUOTE(u.name),
                                '}'
                            )
                            ORDER BY u.name SEPARATOR ','
                        ),
                        ''
                    ),
                    ']'
                ) AS engineer_name
            FROM tb_safety_mans sm
            JOIN tb_safety_engineer se ON se.seq = sm.engineer_seq AND se.deleted = 'N'
            JOIN tb_user u ON u.seq = se.user_seq AND u.status != 'Quit'
            GROUP BY sm.project_seq
        ) eng ON eng.project_seq = sp.seq
WHERE `sp`.`deleted` = 'N'
ORDER BY `sp`.`seq` DESC
 LIMIT 20
ERROR - 2026-02-04 08:18:43 --> refreshAccessToken
ERROR - 2026-02-04 08:19:25 --> refreshAccessToken
ERROR - 2026-02-04 08:20:34 --> refreshAccessToken
ERROR - 2026-02-04 08:20:40 --> Query error: Unknown column 'sp.projectSeq' in 'field list' - Invalid query: SELECT sp.projectSeq AS seq, sp.status AS status, sp.check_type AS check_type, NULLIF(CONCAT_WS(' ', sp.sido, sp.sigungu), '') AS region, sp.place_name AS place_name, sp.field_bgn_dt AS filed_begin_date, sp.field_end_dt AS field_end_date, sp.report_dt AS report_date, ft.name AS facility_type, sp.jong AS jong, l.name AS license_name, eng.engineer_name AS engineer_name, sp.gross_area AS gross_area
FROM `tb_safety_project` `sp`
LEFT JOIN `tb_license` `l` ON `l`.`seq` = `sp`.`license_seq`
LEFT JOIN `tb_safety_facility_type` `ft` ON `ft`.`seq` = `sp`.`facility_seq`
LEFT JOIN (
            SELECT
                sm.project_seq AS project_seq,
                CONCAT(
                    '[',
                    IFNULL(
                        GROUP_CONCAT(
                            DISTINCT CONCAT(
                                '{"name":', JSON_QUOTE(u.name),
                                '}'
                            )
                            ORDER BY u.name SEPARATOR ','
                        ),
                        ''
                    ),
                    ']'
                ) AS engineer_name
            FROM tb_safety_mans sm
            JOIN tb_safety_engineer se ON se.seq = sm.engineer_seq AND se.deleted = 'N'
            JOIN tb_user u ON u.seq = se.user_seq AND u.status != 'Quit'
            GROUP BY sm.project_seq
        ) eng ON eng.project_seq = sp.seq
WHERE `sp`.`deleted` = 'N'
ORDER BY `sp`.`seq` DESC
 LIMIT 15
ERROR - 2026-02-04 08:26:15 --> refreshAccessToken
ERROR - 2026-02-04 08:26:55 --> refreshAccessToken
ERROR - 2026-02-04 08:29:12 --> refreshAccessToken
ERROR - 2026-02-04 08:29:41 --> refreshAccessToken
ERROR - 2026-02-04 08:29:58 --> refreshAccessToken
ERROR - 2026-02-04 08:30:10 --> refreshAccessToken
ERROR - 2026-02-04 08:31:09 --> refreshAccessToken
ERROR - 2026-02-04 08:32:29 --> refreshAccessToken
ERROR - 2026-02-04 08:33:01 --> refreshAccessToken
ERROR - 2026-02-04 08:34:30 --> refreshAccessToken
ERROR - 2026-02-04 08:34:42 --> refreshAccessToken
ERROR - 2026-02-04 08:35:13 --> refreshAccessToken
ERROR - 2026-02-04 08:36:13 --> refreshAccessToken
ERROR - 2026-02-04 08:42:39 --> refreshAccessToken
ERROR - 2026-02-04 08:46:24 --> refreshAccessToken
ERROR - 2026-02-04 08:47:05 --> refreshAccessToken
ERROR - 2026-02-04 08:47:15 --> refreshAccessToken
ERROR - 2026-02-04 08:47:29 --> refreshAccessToken
ERROR - 2026-02-04 08:53:07 --> refreshAccessToken
ERROR - 2026-02-04 08:53:41 --> refreshAccessToken
ERROR - 2026-02-04 08:54:20 --> 404 Page Not Found: Api/web
ERROR - 2026-02-04 08:55:31 --> 404 Page Not Found: Api/web
ERROR - 2026-02-04 08:59:50 --> refreshAccessToken
ERROR - 2026-02-04 09:02:20 --> refreshAccessToken
ERROR - 2026-02-04 09:03:12 --> refreshAccessToken
ERROR - 2026-02-04 09:04:38 --> refreshAccessToken
ERROR - 2026-02-04 09:04:58 --> refreshAccessToken
ERROR - 2026-02-04 09:05:52 --> refreshAccessToken
ERROR - 2026-02-04 09:08:33 --> refreshAccessToken
ERROR - 2026-02-04 09:09:17 --> refreshAccessToken
ERROR - 2026-02-04 09:11:24 --> refreshAccessToken
ERROR - 2026-02-04 09:12:42 --> refreshAccessToken
ERROR - 2026-02-04 09:12:52 --> refreshAccessToken
ERROR - 2026-02-04 09:18:34 --> refreshAccessToken
ERROR - 2026-02-04 09:21:28 --> refreshAccessToken
ERROR - 2026-02-04 09:22:30 --> refreshAccessToken
ERROR - 2026-02-04 09:24:00 --> refreshAccessToken
ERROR - 2026-02-04 09:29:54 --> refreshAccessToken
ERROR - 2026-02-04 09:34:16 --> refreshAccessToken
ERROR - 2026-02-04 09:43:29 --> refreshAccessToken
ERROR - 2026-02-04 09:51:17 --> refreshAccessToken
