<?php defined('BASEPATH') OR exit('No direct script access allowed');

use App\safety\engineer\add\dto\request\SafetyEngineerAddReq;



use App\safety\project\getList\dto\query\SafetyProjectListQuery;
use App\safety\project\getList\dto\response\SafetyProjectListRes;

use App\safety\project\getList\repository\SafetyProjectRepository;
use App\safety\project\getList\service\SafetyProjectService;

use App\safety\project\add\repository\SafetyProjectAddRepository;
use App\safety\project\add\service\SafetyProjectAddService;

use App\safety\engineer\getList\dto\query\SafetyEngineerListQuery;
use App\safety\engineer\getList\dto\response\SafetyEngineerListRes;

use App\safety\engineer\getList\repository\SafetyEngineerRepository;
use App\safety\engineer\getList\service\SafetyEngineerService;

use App\safety\engineer\add\repository\SafetyEngineerAddRepository;
use App\safety\engineer\add\service\SafetyEngineerAddService;

use App\safety\engineer\detail\repository\SafetyEngineerDetailRepository;
use App\safety\engineer\detail\service\SafetyEngineerDetailService;

use App\safety\project\autocomplete\repository\SafetyProjectAutocompleteRepository;
use App\safety\project\autocomplete\service\SafetyProjectAutocompleteService;

use App\safety\project\autocomplete\dto\response\SafetyProjectAutocompleteRes;
use App\safety\project\autocomplete\dto\query\SafetyProjectAutocompleteQuery;

use App\safety\engineer\getList\dto\response\SafetyProjectListEngineerFilterRes;

use App\safety\project\add\dto\request\SafetyProjectAddReq;
use App\safety\engineer\detail\dto\request\SafetyEngineerReq;
use App\safety\engineer\detail\dto\response\SafetyEngineerRes;
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
    private SafetyProjectAddRepository $safetyProjectAddRepository;
    private SafetyProjectAddService $safetyProjectAddService;
    private SafetyEngineerRepository $safetyEngineerRepository;
    private SafetyEngineerService $safetyEngineerService;
    private SafetyEngineerAddRepository $safetyEngineerAddRepository;
    private SafetyEngineerAddService $safetyEngineerAddService;
    private SafetyEngineerDetailRepository $safetyEngineerDetailRepository;
    private SafetyEngineerDetailService $safetyEngineerDetailService;
    private SafetyProjectAutocompleteRepository $safetyProjectAutocompleteRepository;
    private SafetyProjectAutocompleteService $safetyProjectAutocompleteService;

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

        $this->safetyProjectAddRepository = new SafetyProjectAddRepository($this->CI->db);
        $this->safetyProjectAddService = new SafetyProjectAddService($this->safetyProjectAddRepository);

        $this->safetyEngineerRepository = new SafetyEngineerRepository($this->CI->db);
        $this->safetyEngineerService = new SafetyEngineerService($this->safetyEngineerRepository);

        $this->safetyEngineerAddRepository = new SafetyEngineerAddRepository($this->CI->db);
        $this->safetyEngineerAddService = new SafetyEngineerAddService($this->safetyEngineerAddRepository);

        $this->safetyEngineerDetailRepository = new SafetyEngineerDetailRepository($this->CI->db);
        $this->safetyEngineerDetailService = new SafetyEngineerDetailService($this->safetyEngineerDetailRepository);

        $this->safetyProjectAutocompleteRepository = new SafetyProjectAutocompleteRepository($this->CI->db);
        $this->safetyProjectAutocompleteService = new SafetyProjectAutocompleteService($this->safetyProjectAutocompleteRepository);
    }

    public function safetyProjectList(SafetyProjectListQuery $query): SafetyProjectListRes
    {
        return $this->safetyProjectService->list($query);
    }
    public function safetyProjectAutocompleteList(SafetyProjectAutocompleteQuery $query): SafetyProjectAutocompleteRes
    {
        return $this->safetyProjectAutocompleteService->list($query);
    }
    public function safetyProjectAdd(int $userSeq, SafetyProjectAddReq $safetyProjectAddReq)
    {
        $this->safetyProjectAddService->add($userSeq, $safetyProjectAddReq);
    }
    public function safetyEngineerList(SafetyEngineerListQuery $query): SafetyEngineerListRes
    {
        return $this->safetyEngineerService->list($query);
    }
    public function safetyEngineerAdd(SafetyEngineerAddReq $safetyEngineerAddReq)
    {
        $this->safetyEngineerAddService->add($safetyEngineerAddReq);
    }
    public function safetyEngineerGetDetail(int $userSeq):SafetyEngineerRes
    {
       return $this->safetyEngineerDetailService->getDetail($userSeq);
    }

    public function safetyEngineerUpdateDetail(int $userSeq, SafetyEngineerReq $safetyEngineerReq)
    {
        $this->safetyEngineerDetailService->updateDetail($userSeq, $safetyEngineerReq);
    }

    public function safetyEngineerFilter(): SafetyProjectListEngineerFilterRes
    {
        return $this->safetyEngineerService->safetyEngineerFilter();
    }


}
