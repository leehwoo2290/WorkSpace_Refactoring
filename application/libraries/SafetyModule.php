<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\dto\response\SafetyProjectListRes;

use App\safety\project\getList\repository\SafetyProjectRepository;
use App\safety\project\getList\service\SafetyProjectService;

/**
 * SafetyModule
 *
 * CI3에서 src/safety 도메인(Service/Repository)을 조립(wiring)해 컨트롤러에 제공하는 얇은 어댑터.
 */
final class SafetyModule
{
    private $CI;

    private SafetyProjectRepository $safetyProjectRepository;
    private SafetyProjectService $safetyProjectService;

    public function __construct()
    {
        $this->CI = &get_instance();

        // Composer autoload가 설정되어 있어야 src/ 네임스페이스 로딩이 됩니다.
        if (!class_exists('Firebase\\JWT\\JWT')) {
            throw new \RuntimeException(
                "Composer autoload is not enabled. Set \$config['composer_autoload'] = FCPATH.'vendor/autoload.php';"
            );
        }

        // db 로딩 보장
        if (!isset($this->CI->db)) {
            $this->CI->load->database();
        }

        $this->safetyProjectRepository = new SafetyProjectRepository($this->CI->db);
        $this->safetyProjectService = new SafetyProjectService($this->safetyProjectRepository);
    }

    public function safetyProjectList(SafetyProjectListQuery $query): SafetyProjectListRes
    {
        return $this->safetyProjectService->list($query);
    }
}
