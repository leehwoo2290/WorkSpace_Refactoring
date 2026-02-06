<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-02-03 00:46:35 --> SafetyProjectAddService::add ENTER {"userSeq":0,"licenseSeq":1,"checkType":"REGULAR_SAFETY_INSPECTION","placeName":"테스트건물234","inspectionBeginDate":"2026-02-03","inspectionEndDate":"2026-02-06","fieldBeginDate":"2026-02-03","fieldEndDate":"2026-02-05"}
ERROR - 2026-02-03 00:46:35 --> SafetyProjectAddService::add UNAUTHORIZED because userSeq<=0 userSeq=0
ERROR - 2026-02-03 00:46:35 --> SafetyProjectAddService::add ENTER {"userSeq":38,"licenseSeq":1,"checkType":"REGULAR_SAFETY_INSPECTION","placeName":"테스트건물234","inspectionBeginDate":"2026-02-03","inspectionEndDate":"2026-02-06","fieldBeginDate":"2026-02-03","fieldEndDate":"2026-02-05"}
ERROR - 2026-02-03 03:03:36 --> Query error: Unknown column 'p.name' in 'field list' - Invalid query: SELECT p.name AS projectName, p.license_seq, p.place_name, p.unique_id, p.building_id, p.facility_no, p.addr, p.manager_name, p.gross_area, p.ceo_name, p.completion_dt, p.check_type, p.safety_grade, p.facility_seq, p.pic_name, p.jong, p.pic_tel, IFNULL(p.facility_remark, ft.name) AS facility_remark, p.tel, p.bizno, p.color, p.live_tour_url, p.requirement, p.remark, p.attachment1, p.attachment2, p.attachment3, p.attachment4, p.contract_dt, p.status, p.contract_price, p.sales_user_seq, su.email AS sales_user_email, sp.mobile AS sales_user_tel, p.contract_pic, p.contract_pic_tel, p.contract_pic_email
FROM `tb_safety_project` `p`
LEFT JOIN `tb_user` `su` ON `su`.`seq` = `p`.`sales_user_seq`
LEFT JOIN `tb_user_privacy` `sp` ON `sp`.`user_seq` = `su`.`seq`
LEFT JOIN `tb_safety_facility_type` `ft` ON `ft`.`seq` = `p`.`facility_seq`
WHERE `p`.`seq` = 255
AND `p`.`deleted` = 'N'
 LIMIT 1
ERROR - 2026-02-03 03:19:14 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"a6bbc09d-910c-4355-a2e1-2b7d070df589","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":38}}
ERROR - 2026-02-03 03:32:06 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"1dcda948-0b4f-47ab-8938-ca11d543dda8","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":52}}
ERROR - 2026-02-03 03:45:07 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"aff1c78b-4aab-42b7-8e8e-eddd9cd6b080","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":55}}
ERROR - 2026-02-03 05:08:41 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"1bcf5c96-4e40-4f05-b3ab-33a4fc042f23","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":62}}
ERROR - 2026-02-03 05:20:38 --> 404 Page Not Found: Api/web
ERROR - 2026-02-03 05:27:00 --> 404 Page Not Found: Api/web
ERROR - 2026-02-03 05:27:39 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":278,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"29d19ab0-f580-42a7-8bab-daf6196b9e5e","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":129}}
ERROR - 2026-02-03 05:29:13 --> 404 Page Not Found: Api/web
ERROR - 2026-02-03 05:29:31 --> Severity: Notice --> Undefined property: stdClass::$seq C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\add\service\SafetyEngineerAddService.php 46
ERROR - 2026-02-03 05:29:31 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_safety_engineer`, CONSTRAINT `FK_tb_safety_engineer_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_safety_engineer` (`user_seq`, `grade`, `license_no`, `status`, `remark`, `deleted`) VALUES (0, '참여', '111', '대기', '111', 'N')
ERROR - 2026-02-03 05:30:25 --> Severity: Notice --> Undefined property: stdClass::$seq C:\xampp\htdocs\workspace_refactoring\src\safety\engineer\add\service\SafetyEngineerAddService.php 46
ERROR - 2026-02-03 05:30:25 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`eleng_dev_copy`.`tb_safety_engineer`, CONSTRAINT `FK_tb_safety_engineer_tb_user` FOREIGN KEY (`user_seq`) REFERENCES `tb_user` (`seq`) ON DELETE NO ACTION ON UPDATE NO ACTION) - Invalid query: INSERT INTO `tb_safety_engineer` (`user_seq`, `grade`, `license_no`, `status`, `remark`, `deleted`) VALUES (0, '참여', '11', '대기', '11', 'N')
ERROR - 2026-02-03 05:36:43 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"0e435a6c-e0cc-4bf9-a007-6d9799ce12c2","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":80}}
ERROR - 2026-02-03 05:41:52 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"7a5a9ef9-b347-403f-83bd-2d76f98ac38f","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":85}}
ERROR - 2026-02-03 05:58:24 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"93d75f71-b77c-4f6d-8d9d-24dec8fda9bc","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":86}}
ERROR - 2026-02-03 06:35:31 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"8994c75a-9724-458b-9920-d1ac28858eea","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":94}}
ERROR - 2026-02-03 06:50:17 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"c5531a9e-1c33-4613-ae7e-db7693b263a8","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":101}}
ERROR - 2026-02-03 06:54:14 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"b544a5cc-df1b-4a90-b0f8-e34af7d7021d","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":103}}
ERROR - 2026-02-03 06:55:24 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"9797c6ac-a62a-49c2-8caf-14efa46ede78","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":106}}
ERROR - 2026-02-03 06:57:37 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":278,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"c44ea74d-4677-4a6e-8175-353a1a7debc1","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":131}}
ERROR - 2026-02-03 06:58:16 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":278,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"4184e7d5-1730-4e23-ad9d-be2f613c508a","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":132}}
ERROR - 2026-02-03 06:59:10 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":278,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"a8638d62-440a-43ac-8cb9-ee06ae477fed","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":133}}
ERROR - 2026-02-03 07:25:00 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"54791f99-4c17-4f0c-a74a-0b3aced965bc","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":109}}
ERROR - 2026-02-03 07:30:31 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"03c8cd4c-07ec-4112-be16-51ed99401f2b","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":111}}
ERROR - 2026-02-03 07:43:21 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"9629bfe2-8afb-4f5b-961e-612647f1b928","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":115}}
ERROR - 2026-02-03 07:48:54 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":278,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"66a4101f-011e-4322-b886-286afd63ba42","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":140}}
ERROR - 2026-02-03 07:51:58 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"2bb0efba-f7de-478e-bacc-9aae005fb6de","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":127}}
ERROR - 2026-02-03 07:58:12 --> refreshAccessToken
ERROR - 2026-02-03 07:58:23 --> refreshAccessToken
ERROR - 2026-02-03 07:58:33 --> refreshAccessToken
ERROR - 2026-02-03 07:58:33 --> refreshAccessToken
ERROR - 2026-02-03 07:58:33 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"6ce88d67-ae9e-4163-8f61-e80bce1a88a6","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":136}}
ERROR - 2026-02-03 07:59:03 --> refreshAccessToken
ERROR - 2026-02-03 07:59:03 --> refreshAccessToken
ERROR - 2026-02-03 07:59:03 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"9c7426ff-a32d-4294-8f10-33cdd9f0d909","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":137}}
ERROR - 2026-02-03 07:59:23 --> refreshAccessToken
ERROR - 2026-02-03 07:59:33 --> refreshAccessToken
ERROR - 2026-02-03 07:59:43 --> refreshAccessToken
ERROR - 2026-02-03 07:59:53 --> refreshAccessToken
ERROR - 2026-02-03 08:00:04 --> refreshAccessToken
ERROR - 2026-02-03 08:00:14 --> refreshAccessToken
ERROR - 2026-02-03 08:00:24 --> refreshAccessToken
ERROR - 2026-02-03 08:00:36 --> refreshAccessToken
ERROR - 2026-02-03 08:00:48 --> refreshAccessToken
ERROR - 2026-02-03 08:00:58 --> refreshAccessToken
ERROR - 2026-02-03 08:01:08 --> refreshAccessToken
ERROR - 2026-02-03 08:01:19 --> refreshAccessToken
ERROR - 2026-02-03 08:01:19 --> refreshAccessToken
ERROR - 2026-02-03 08:01:19 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"f7793fb3aff4b729f86f59633888d276","tokenId":"15fdfd64-296e-4898-bbf1-ce858c9013aa","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":149}}
ERROR - 2026-02-03 08:01:40 --> refreshAccessToken
ERROR - 2026-02-03 08:01:40 --> refreshAccessToken
ERROR - 2026-02-03 08:01:40 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"d313030a-8936-4a27-a2b1-d68be0764b42","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":150}}
ERROR - 2026-02-03 08:02:51 --> refreshAccessToken
ERROR - 2026-02-03 08:03:02 --> refreshAccessToken
ERROR - 2026-02-03 08:03:02 --> refreshAccessToken
ERROR - 2026-02-03 08:03:02 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"7b23d996-7b1a-40e4-b6b8-fcf7bbc85ad2","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":152}}
ERROR - 2026-02-03 08:03:58 --> refreshAccessToken
ERROR - 2026-02-03 08:05:08 --> refreshAccessToken
ERROR - 2026-02-03 08:05:51 --> refreshAccessToken
ERROR - 2026-02-03 08:07:04 --> refreshAccessToken
ERROR - 2026-02-03 08:07:04 --> refreshAccessToken
ERROR - 2026-02-03 08:09:22 --> refreshAccessToken
ERROR - 2026-02-03 08:09:22 --> refreshAccessToken
ERROR - 2026-02-03 08:09:22 --> JWT_REFRESH FAIL {"code":40118,"msg":"REFRESH_TOKEN_REPLAY","userSeq":38,"deviceId":"3c031b65e2510ecc653f3a1231115c1b","tokenId":"f95ec0bf-13ef-4f46-96f8-8ded4095b7c5","db":{"hasTokenIdRow":true,"activeCountByUserDevice":1,"totalCountByUser":158}}
ERROR - 2026-02-03 08:09:22 --> refreshAccessToken
ERROR - 2026-02-03 08:09:22 --> refreshAccessToken
ERROR - 2026-02-03 08:09:43 --> refreshAccessToken
ERROR - 2026-02-03 08:09:53 --> refreshAccessToken
ERROR - 2026-02-03 08:10:04 --> refreshAccessToken
ERROR - 2026-02-03 08:10:45 --> refreshAccessToken
ERROR - 2026-02-03 08:13:48 --> refreshAccessToken
ERROR - 2026-02-03 08:13:52 --> refreshAccessToken
ERROR - 2026-02-03 08:14:56 --> refreshAccessToken
ERROR - 2026-02-03 08:15:10 --> refreshAccessToken
ERROR - 2026-02-03 08:17:26 --> refreshAccessToken
ERROR - 2026-02-03 08:18:41 --> refreshAccessToken
ERROR - 2026-02-03 08:23:01 --> refreshAccessToken
ERROR - 2026-02-03 08:28:22 --> refreshAccessToken
ERROR - 2026-02-03 08:30:01 --> refreshAccessToken
ERROR - 2026-02-03 08:30:12 --> refreshAccessToken
ERROR - 2026-02-03 08:30:22 --> refreshAccessToken
ERROR - 2026-02-03 08:30:59 --> refreshAccessToken
ERROR - 2026-02-03 08:34:14 --> refreshAccessToken
ERROR - 2026-02-03 08:37:14 --> refreshAccessToken
ERROR - 2026-02-03 08:38:01 --> refreshAccessToken
ERROR - 2026-02-03 08:39:56 --> refreshAccessToken
ERROR - 2026-02-03 08:46:24 --> refreshAccessToken
ERROR - 2026-02-03 08:49:14 --> refreshAccessToken
ERROR - 2026-02-03 08:55:47 --> refreshAccessToken
ERROR - 2026-02-03 08:55:57 --> refreshAccessToken
ERROR - 2026-02-03 08:58:17 --> refreshAccessToken
ERROR - 2026-02-03 09:03:38 --> refreshAccessToken
ERROR - 2026-02-03 09:20:58 --> refreshAccessToken
ERROR - 2026-02-03 09:21:24 --> refreshAccessToken
ERROR - 2026-02-03 09:25:01 --> refreshAccessToken
ERROR - 2026-02-03 09:25:14 --> refreshAccessToken
ERROR - 2026-02-03 09:25:54 --> refreshAccessToken
ERROR - 2026-02-03 09:26:23 --> refreshAccessToken
ERROR - 2026-02-03 09:26:36 --> refreshAccessToken
ERROR - 2026-02-03 09:28:50 --> refreshAccessToken
ERROR - 2026-02-03 09:35:26 --> refreshAccessToken
ERROR - 2026-02-03 09:35:39 --> refreshAccessToken
ERROR - 2026-02-03 09:35:58 --> refreshAccessToken
ERROR - 2026-02-03 09:36:12 --> refreshAccessToken
ERROR - 2026-02-03 09:36:24 --> refreshAccessToken
ERROR - 2026-02-03 09:36:33 --> refreshAccessToken
ERROR - 2026-02-03 09:36:52 --> refreshAccessToken
ERROR - 2026-02-03 09:36:52 --> refreshAccessToken
ERROR - 2026-02-03 09:37:18 --> refreshAccessToken
ERROR - 2026-02-03 09:37:18 --> refreshAccessToken
ERROR - 2026-02-03 09:37:34 --> refreshAccessToken
ERROR - 2026-02-03 09:37:34 --> refreshAccessToken
ERROR - 2026-02-03 09:38:11 --> refreshAccessToken
ERROR - 2026-02-03 09:38:11 --> refreshAccessToken
ERROR - 2026-02-03 09:38:54 --> refreshAccessToken
ERROR - 2026-02-03 09:38:54 --> refreshAccessToken
ERROR - 2026-02-03 09:39:04 --> refreshAccessToken
ERROR - 2026-02-03 09:39:04 --> refreshAccessToken
ERROR - 2026-02-03 09:39:24 --> refreshAccessToken
ERROR - 2026-02-03 09:39:24 --> refreshAccessToken
ERROR - 2026-02-03 09:39:47 --> refreshAccessToken
ERROR - 2026-02-03 09:39:47 --> refreshAccessToken
ERROR - 2026-02-03 09:40:00 --> refreshAccessToken
ERROR - 2026-02-03 09:40:00 --> refreshAccessToken
ERROR - 2026-02-03 09:43:21 --> refreshAccessToken
ERROR - 2026-02-03 09:43:21 --> refreshAccessToken
ERROR - 2026-02-03 09:46:16 --> refreshAccessToken
ERROR - 2026-02-03 09:46:16 --> refreshAccessToken
ERROR - 2026-02-03 09:47:26 --> refreshAccessToken
ERROR - 2026-02-03 09:52:30 --> refreshAccessToken
ERROR - 2026-02-03 09:52:31 --> refreshAccessToken
ERROR - 2026-02-03 09:55:25 --> refreshAccessToken
ERROR - 2026-02-03 09:57:03 --> refreshAccessToken
ERROR - 2026-02-03 09:59:22 --> refreshAccessToken
ERROR - 2026-02-03 10:00:29 --> refreshAccessToken
ERROR - 2026-02-03 10:00:29 --> refreshAccessToken
