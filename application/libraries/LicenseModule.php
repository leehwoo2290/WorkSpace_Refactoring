<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\license\dto\query\LicenseListQuery;

use App\license\dto\response\LicenseListRes;
use App\license\repository\LicenseRepository;
use App\license\service\LicenseService;

final class LicenseModule
{
    private $CI;
    private LicenseService $licenseService;
    private LicenseRepository $licenseRepository;


    public function __construct(?LicenseService $licenseService = null)
    {
         $this->CI = &get_instance();

        // Composer autoload가 설정되어 있어야 src/ 네임스페이스 및 firebase/php-jwt가 로딩됩니다.
        if (!class_exists('Firebase\\JWT\\JWT')) {
            throw new \RuntimeException(
                "Composer autoload is not enabled. Set \$config['composer_autoload'] = FCPATH.'vendor/autoload.php';"
            );
        }

        // 2) db 로딩 보장 (Repository가 db 필요)
        if (!isset($this->CI->db)) {
            $this->CI->load->database();
        }

        $this->licenseRepository = new LicenseRepository($this->CI->db);
        $this->licenseService = new LicenseService($this->licenseRepository);
    }

    /**
     * 라이선스 목록(검색/페이징)
     */
    public function list(LicenseListQuery $licenseListQuery): LicenseListRes
    {

        if (method_exists($this->licenseService, 'list')) {

            return $this->licenseService->list($licenseListQuery);
        }

        return $this->licenseService->licenseList($licenseListQuery);
    }

    // ====== 아래는 레거시(M_license + dashboard/upload License) 기준으로 "추가될 수 있는" 모듈 API 스켈레톤 ======
    // 필요할 때 DTO/Service만 맞춰서 구현해 붙이면 됨.

    // public function detail(int $licenseSeq): LicenseDetailRes
    // public function save(LicenseSaveReq $req): LicenseSaveRes   // 등록/수정 (레거시 submit)
    // public function delete(int $licenseSeq): void               // 삭제 + tb_user.license_seq null 처리
    // public function uploadLogo(int $licenseSeq, array $file): string // 로고 업로드(레거시 upload/License::logo)
    // public function stats(int $licenseSeq): LicenseStatsRes     // user/engineer/project 집계

}
