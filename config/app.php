<?php
// +----------------------------------------------------------------------
// | Apply Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // App Address
    'app_host'         => env('app.host', ''),
    // Namespace applied
    'app_namespace'    => '',
    // Enable routing
    'with_route'       => true,
    // Whether to enable events
    'with_event'       => true,
    // Enable application quick access
    'app_express'      => true,
    // Automatic multi application mode.
    'auto_multi_app'    =>  false,
    // Default application
    'default_app'      => 'index',
    // Default Time Zone
    'default_timezone' => env('app.default_timezone', 'Asia/Shanghai'),
    // Application mapping (automatic multi application mode is valid)
    'app_map'          => [],
    // Background alias
    'user_alias_name' => '',
    // Domain name binding (automatic multi application mode is valid)
    'domain_bind'      => [],
    // List of apps that URL access is prohibited (automatic multi app mode is valid)
    'deny_app_list'    => [],
    // Template file of exception page
    'exception_tmpl'   => Env::get('app_debug') == 1 ? app()->getThinkPath() . 'tpl/think_exception.tpl' : app()->getBasePath() . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR . 'think_exception.tpl',
    // Success template file of jump page
    'dispatch_success_tmpl'   => app()->getBasePath() . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR . 'dispatch_jump.tpl',
    // Failed template file for jump page
    'dispatch_error_tmpl'   => app()->getBasePath() . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR . 'dispatch_jump.tpl',
    // Error display information, valid in non debug mode
    'error_message'    => env('app.error_message', '出错啦！请刷新试试哦～'),
    // Display error message
    'show_error_msg'   => false,
];
