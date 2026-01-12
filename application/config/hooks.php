<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['pre_system'][] = [
    'class'    => 'CorsHook',
    'function' => 'run',
    'filename' => 'CorsHook.php',
    'filepath' => 'hooks',
];

// 컨트롤러 생성자 실행 후, 액션 실행 전 시점
// $hook['post_controller_constructor'][] = [
//     'class'    => 'WebAuthCsrfHook',
//     'function' => 'run',
//     'filename' => 'WebAuthCsrfHook.php',
//     'filepath' => 'hooks',
// ];

