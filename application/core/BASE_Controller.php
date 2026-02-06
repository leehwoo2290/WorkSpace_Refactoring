<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GeoIp2\Database\Reader;
use App\user\common\UserContext;

// require_once("application/core/ADMIN_Controller.php");
// require_once("application/core/MEMBER_Controller.php");

class BASE_Controller extends CI_Controller
{

    //추후 별도 컨트롤러에 빼기
    protected UserContext $userContext;
    public AuthModule $authModule;

    public AccessGuard $accessGuard;
    public RequestQueryDtoJsonMapper $requestQueryDtoMapper;

    public function __construct()
    {

        parent::__construct();


        // 1) composer autoload
        $autoload = (defined('FCPATH') ? (FCPATH . 'vendor/autoload.php') : 'vendor/autoload.php');
        if (file_exists($autoload))
            require_once $autoload;

        // ApiResult (composer autoload files가 없을 수도 있으니 안전장치)
        if (!class_exists('ApiResult') && defined('FCPATH') && file_exists(FCPATH . 'src/common/ApiResult.php')) {
            require_once FCPATH . 'src/common/ApiResult.php';
        }

        // 2) db 등 필요한 것 보장
        $this->load->database();

        $this->load->library('AuthModule', null, 'authModule');
        $this->load->library('RequestQueryDtoJsonMapper', null, 'requestQueryDtoMapper');

        $this->authModule->bootstrap();

        // 컨트롤러에서 접근할 UserContext
        $this->userContext = $this->authModule->context();

        $this->load->library('AccessGuard', null, 'accessGuard');

        $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $uri = (string) $this->uri->uri_string(); // "api/web/..." 형태로 나옴 (REQUEST_URI 쓰면 prefix 섞일 수 있음)

        $this->accessGuard->check($method, $uri, $this->userContext);
    }

    public function __destruct()
    {

    }


    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $params);
        }
        show_404();

    }

}

/* End of file MY_Ccontroller.php */
/* Location: ./application/core/MY_Ccontroller.php */