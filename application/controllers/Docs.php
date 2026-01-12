<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Docs (apidoc viewer)
 *
 * - 기존 apidoc(owen1025) 기반인데, DTO 구조를 못 보는 문제가 있어서:
 *   1) jsonRequestDto(...Dto::class) 패턴에서 Request DTO 추출
 *   2) ApiResult::ok/created/none(..., Dto::class) 패턴에서 Response DTO 추출
 *   3) DTO의 static apiDocSchema/apiDocExample를 호출해서 docs.html에 표기
 */
class Docs extends CI_Controller
{
    // 네 프로젝트 기준 컨트롤러 폴더
    const CONTROLLER_DIR = './application/controllers/auth';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        // DTO 클래스 자동 로드(Composer) - 있으면 사용
        $autoload = FCPATH . 'vendor/autoload.php';
        if (is_file($autoload)) {
            require_once $autoload;
        }
    }

    public function index()
    {
        redirect('docs/view');
    }

    public function view($controller_name = null)
    {
        $api_list = $this->_get_controller_list();

        if ($controller_name === null) {
            // 첫 컨트롤러로 기본 선택
            $keys = array_keys($api_list);
            $controller_name = isset($keys[0]) ? $keys[0] : null;
        }

        $api_detail = $controller_name ? $this->_get_api_detail($controller_name) : [];

        // /docs 전까지를 base로 잡는다. (예: http://host/workspace_refactoring/)
        $u = current_url();
        $pos = strpos($u, '/docs');
        $base_url = ($pos !== false) ? (substr($u, 0, $pos) . '/') : rtrim(base_url(), '/') . '/';

        $view_data = [
            'base_url' => $base_url,
            'api_list' => $api_list,
            'active_controller' => $controller_name,
            'api_detail' => $api_detail,
        ];

        $this->load->view('docs.html', $view_data);
    }

    private function _get_controller_list()
    {
        $controller_arr = [];
        $dir = self::CONTROLLER_DIR;

        if (!is_dir($dir)) return $controller_arr;

        foreach (scandir($dir) as $f) {
            if ($f === '.' || $f === '..') continue;
            if (!preg_match('/\.php$/i', $f)) continue;

            $controller_name = preg_replace('/\.php$/i', '', $f);
            $api_str = $this->_get_controller_source($controller_name);

            $controller_arr[$controller_name] = [];
            if ($api_str === '') continue;

            // public function xxx( 형태로 추출 (언더스코어 시작 메서드는 제외)
            preg_match_all('/function\s+(?P<method_name>[^_]\w+)\s*\(/', $api_str, $method_list);
            foreach ($method_list['method_name'] as $method_value) {
                $controller_arr[$controller_name][] = preg_replace('/_(get|post|put|delete|patch)$/', '', $method_value);
            }
        }

        return $controller_arr;
    }

    private function _get_controller_source($controller_name)
    {
        $path = rtrim(self::CONTROLLER_DIR, '/\\') . '/' . $controller_name . '.php';
        if (!is_file($path)) return '';
        $src = file_get_contents($path);
        return is_string($src) ? $src : '';
    }

    private function _get_api_detail($controller_name)
    {
        $src = $this->_get_controller_source($controller_name);
        if ($src === '') return [];

        $use_map = $this->_build_use_map($src);
        $namespace = $this->_parse_namespace($src);

        $api_list = [];

        // 함수 단위로 쪼개기
        $parts = preg_split('/\bfunction\b/', $src);
        foreach ($parts as $i => $part) {
            if ($i === 0) continue;

            $api_str = 'function' . $part;

            // method name + args
            $m = [];
            if (!preg_match('/function\s+(?P<method_name>[^_]\w+)\s*\((?P<args>[^\)]*)\)/', $api_str, $m)) {
                continue;
            }

            $method_name_raw = $m['method_name'];
            $args_str = $m['args'];

            // URL parameter: function foo($id, $x)
            preg_match_all('/\$(\w+)/', $args_str, $api_url_parameter);

            // @Description 블록 (/* @Description ... */ / /** @Description ... */)
            $api_description = [];
            preg_match('/\/\*{1,2}\s*@Description(?P<description>.*?)\*\//si', $api_str, $api_description);

            // call type: _get/_post/_put/_delete/_patch suffix
            $call_type = null;
            $api_method_name = $method_name_raw;
            if (preg_match('/_(get|post|put|delete|patch)$/', $method_name_raw, $rest_method_parameter)) {
                $api_method_name = preg_replace('/_(get|post|put|delete|patch)$/', '', $method_name_raw);
                $call_type = strtoupper($rest_method_parameter[1]);
            }

            // query/form parameter: $this->input->get/post('x')
            $api_parameter = [];
            preg_match_all('/\b(?:get|post|put|delete|patch)\s*\(\s*[\'"](\w+)[\'"]\s*\)/', $api_str, $api_parameter);

            // custom header: get_request_header('X-...')
            $api_header = [];
            preg_match_all('/get_request_header\s*\(\s*[\'"]([^\'"]+)[\'"]/', $api_str, $api_header);

            // === NEW: Request/Response DTO 추출 ===
            $request_dto_token = $this->_extract_request_dto_token($api_str);
            $response = $this->_extract_response_dto($api_str);

            $request_dto_class = $this->_resolve_class($request_dto_token, $use_map, $namespace);
            $response_dto_class = $this->_resolve_class($response['dto_token'], $use_map, $namespace);

            // schema/example 생성 (DTO가 apiDocSchema/apiDocExample를 구현했을 때만)
            $request_schema_rows = $this->_dto_schema_rows($request_dto_class, '');
            $request_example_json = $this->_dto_example_json($request_dto_class);

            // Response wrapper(ApiResult) + data DTO
            $response_schema_rows = $this->_apiresult_schema_rows($response_dto_class, $response['kind']);
            $response_example_json = $this->_apiresult_example_json($response_dto_class, $response['kind']);

            $api_list[] = [
                'method_name' => $api_method_name,
                'url_parameter' => isset($api_url_parameter[1]) ? $api_url_parameter[1] : [],
                'parameter' => isset($api_parameter[1]) ? $api_parameter[1] : [],
                'header' => isset($api_header[1]) ? $api_header[1] : [],
                'call_type' => $call_type,
                'description' => isset($api_description['description']) ? $api_description['description'] : '',

                // DTO 확장 데이터
                'request_dto_class' => $request_dto_class,
                'response_dto_class' => $response_dto_class,
                'request_schema_rows' => $request_schema_rows,
                'response_schema_rows' => $response_schema_rows,
                'request_example_json' => $request_example_json,
                'response_example_json' => $response_example_json,
            ];
        }

        return $api_list;
    }

    private function _parse_namespace($src)
    {
        if (preg_match('/^\s*namespace\s+([^;]+);/m', $src, $m)) {
            return trim($m[1]);
        }
        return '';
    }

    private function _build_use_map($src)
    {
        $map = [];
        if (!preg_match_all('/^\s*use\s+([^;]+);/m', $src, $m)) return $map;

        foreach ($m[1] as $useLine) {
            // "A\B\C as X, D\E\F"
            $chunks = array_map('trim', explode(',', $useLine));
            foreach ($chunks as $chunk) {
                if ($chunk === '') continue;
                if (preg_match('/^([\\\\\w]+)\s+as\s+(\w+)$/i', $chunk, $mm)) {
                    $fqcn = ltrim($mm[1], '\\');
                    $alias = $mm[2];
                    $map[$alias] = $fqcn;
                } else {
                    $fqcn = ltrim($chunk, '\\');
                    $short = preg_replace('/^.*\\\\/', '', $fqcn);
                    $map[$short] = $fqcn;
                }
            }
        }
        return $map;
    }

    private function _resolve_class($token, $use_map, $namespace)
    {
        if (!$token) return null;

        $t = trim($token);
        $t = ltrim($t, '\\');

        // 이미 FQCN이면 그대로
        if (strpos($t, '\\') !== false) return $t;

        // use alias
        if (isset($use_map[$t])) return $use_map[$t];

        // namespace가 있으면 붙임(거의 없지만)
        if ($namespace !== '') return $namespace . '\\' . $t;

        return $t; // 글로벌로 남김
    }

    private function _extract_request_dto_token($api_str)
    {
        // $this->requestDtoMapper->jsonRequestDto(UserLoginReq::class, true)
        if (preg_match('/jsonRequestDto\s*\(\s*([\\\\\w]+)\s*::class/i', $api_str, $m)) {
            return $m[1];
        }

        // (확장) queryRequestDto / formRequestDto 등
        if (preg_match('/(?:queryRequestDto|formRequestDto)\s*\(\s*([\\\\\w]+)\s*::class/i', $api_str, $m)) {
            return $m[1];
        }

        return null;
    }

    private function _extract_response_dto($api_str)
    {
        // ApiResult::ok($data, 200, Dto::class) / created / none
        // kind: ok|created|none
        $out = ['kind' => null, 'dto_token' => null];

        if (!preg_match('/ApiResult::(ok|created|none)\s*\((?P<args>.*?)\)\s*;/si', $api_str, $m)) {
            return $out;
        }

        $out['kind'] = $m[1];
        $args = $m['args'];

        // args에서 마지막 ::class를 DTO로 간주
        if (preg_match_all('/([\\\\\w]+)\s*::class/', $args, $mm) && !empty($mm[1])) {
            $out['dto_token'] = $mm[1][count($mm[1]) - 1];
        }

        return $out;
    }

    private function _dto_schema_rows($dtoClass, $prefix)
    {
        if (!$dtoClass) return [];

        $schema = $this->_call_static_schema($dtoClass);
        if (!is_array($schema)) return [];

        $rows = [];
        $this->_flatten_schema($schema, $rows, $prefix);
        return $rows;
    }

    private function _call_static_schema($dtoClass)
    {
        if (!class_exists($dtoClass)) return null;

        try {
            if (method_exists($dtoClass, 'apiDocSchema')) return $dtoClass::apiDocSchema();
            if (method_exists($dtoClass, 'docsSchema')) return $dtoClass::docsSchema();
            if (method_exists($dtoClass, 'schema')) return $dtoClass::schema();
        } catch (\Throwable $e) {
            return null;
        }

        return null;
    }

    private function _call_static_example($dtoClass)
    {
        if (!class_exists($dtoClass)) return null;

        try {
            if (method_exists($dtoClass, 'apiDocExample')) return $dtoClass::apiDocExample();
            if (method_exists($dtoClass, 'docsExample')) return $dtoClass::docsExample();
            if (method_exists($dtoClass, 'example')) return $dtoClass::example();
        } catch (\Throwable $e) {
            return null;
        }

        return null;
    }

    private function _dto_example_json($dtoClass)
    {
        $ex = $this->_call_static_example($dtoClass);
        if ($ex === null) return '';

        $json = json_encode($ex, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return is_string($json) ? $json : '';
    }

    private function _apiresult_schema_rows($dtoClass, $kind)
    {
        // kind === 'none' 이면 204 반환(바디 없음) → schema도 비워둠
        if ($kind === 'none') return [];

        $rows = [
            ['name' => 'success', 'type' => 'bool', 'required' => true, 'desc' => 'ApiResult wrapper', 'aliases' => []],
            ['name' => 'message', 'type' => 'string', 'required' => true, 'desc' => 'ApiResult wrapper', 'aliases' => []],
            ['name' => 'code', 'type' => 'int', 'required' => true, 'desc' => 'ApiResult wrapper', 'aliases' => []],
        ];

        if ($dtoClass) {
            $rows[] = ['name' => 'data', 'type' => $dtoClass, 'required' => true, 'desc' => 'ApiResult payload', 'aliases' => []];
            $dataRows = $this->_dto_schema_rows($dtoClass, 'data.');
            $rows = array_merge($rows, $dataRows);
        } else {
            $rows[] = ['name' => 'data', 'type' => 'mixed', 'required' => true, 'desc' => 'ApiResult payload', 'aliases' => []];
        }

        return $rows;
    }

    private function _apiresult_example_json($dtoClass, $kind)
    {
        if ($kind === 'none') {
            return "204 No Content (Success)\n- This endpoint returns no body by design.";
        }

        $msg = ($kind === 'created') ? 'CREATED' : 'OK';

        $dataEx = $this->_call_static_example($dtoClass);
        $payload = [
            'success' => true,
            'message' => $msg,
            'code' => 0,
            'data' => $dataEx,
        ];

        $json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return is_string($json) ? $json : '';
    }

    /**
     * schema flatten
     *
     * 지원 입력 형태(권장):
     *  - 'field' => 'string'
     *  - 'field' => ['type'=>'string', 'required'=>true, 'desc'=>'...', 'aliases'=>['a','b']]
     *  - 'field' => SomeDto::class  (nested)
     *  - 'field' => ['type'=>SomeDto::class] (nested)
     *  - 'field' => 'SomeDto[]' or ['type'=>SomeDto::class,'isArray'=>true] (nested array)
     */
    private function _flatten_schema($schema, &$rows, $prefix)
    {
        foreach ($schema as $field => $spec) {
            $name = $prefix . $field;

            $type = 'mixed';
            $required = true;
            $desc = '';
            $aliases = [];

            $nestedClass = null;
            $nestedPrefix = null;

            if (is_string($spec)) {
                // class-string?
                if (class_exists($spec)) {
                    $type = $spec;
                    $nestedClass = $spec;
                    $nestedPrefix = $name . '.';
                } else {
                    // Foo[]?
                    if (preg_match('/^([\\\\\w]+)\[\]$/', $spec, $m) && class_exists($m[1])) {
                        $type = $spec;
                        $nestedClass = $m[1];
                        $nestedPrefix = $name . '[].';
                    } else {
                        $type = $spec;
                    }
                }
            } elseif (is_array($spec)) {
                $type = isset($spec['type']) ? $spec['type'] : 'mixed';
                $required = isset($spec['required']) ? (bool)$spec['required'] : true;
                $desc = (string)($spec['desc'] ?? ($spec['description'] ?? ''));
                $aliases = $spec['aliases'] ?? [];

                if (is_string($type) && class_exists($type)) {
                    $nestedClass = $type;
                    $nestedPrefix = $name . '.';
                } elseif (isset($spec['isArray']) && $spec['isArray'] && is_string($type) && class_exists($type)) {
                    $nestedClass = $type;
                    $nestedPrefix = $name . '[].';
                    $type = $type . '[]';
                } elseif (is_string($type) && preg_match('/^([\\\\\w]+)\[\]$/', $type, $m) && class_exists($m[1])) {
                    $nestedClass = $m[1];
                    $nestedPrefix = $name . '[].';
                }
            }

            $rows[] = [
                'name' => $name,
                'type' => is_string($type) ? ltrim($type, '\\') : 'mixed',
                'required' => $required,
                'desc' => $desc,
                'aliases' => $aliases,
            ];

            if ($nestedClass) {
                $nestedSchema = $this->_call_static_schema($nestedClass);
                if (is_array($nestedSchema)) {
                    $this->_flatten_schema($nestedSchema, $rows, $nestedPrefix);
                }
            }
        }
    }
}
