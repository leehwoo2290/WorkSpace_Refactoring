<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GeoIp2\Database\Reader;
use App\user\component\UserContext;

// require_once("application/core/ADMIN_Controller.php");
// require_once("application/core/MEMBER_Controller.php");

class BASE_Controller extends CI_Controller
{

    //추후 별도 컨트롤러에 빼기
    protected UserContext $userContext;
    public AuthModule $authModule;
    public RequestDtoJsonMapper $requestDtoMapper;

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
        $this->load->library('RequestDtoJsonMapper', null,'requestDtoMapper');

        $this->authModule->bootstrap();

        // 컨트롤러에서 접근할 UserContext
        $this->userContext = $this->authModule->context();
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