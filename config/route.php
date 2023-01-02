<?php
// +----------------------------------------------------------------------
// | Routing Settings
// +----------------------------------------------------------------------
return [
    // pathinfo Separator
    'pathinfo_depr'         => '/',
    // URL Pseudo static suffix
    'url_html_suffix'       => 'html',
    // URL Common method parameters are used for automatic generation
    'url_common_param'      => true,
    // Whether to enable route delay resolution
    'url_lazy_route'        => false,
    // Whether to force routing
    'url_route_must'        => true,
    // Merge routing rules
    'route_rule_merge'      => false,
    // Whether the route matches exactly
    'route_complete_match'  => false,
    // Access controller layer name
    'controller_layer'      => 'controller',
    // Empty controller name
    'empty_controller'      => 'Error',
    // Whether to use controller suffix
    'controller_suffix'     => false,
    // Default routing variable rules
    'default_route_pattern' => '[\w\.]+',
    // Whether to enable request caching. True is Automatic caching. Support setting request caching rules.
    'request_cache_key'     => false,
    // Request cache validity
    'request_cache_expire'  => null,
    // Global Request Cache Exclusion Rules
    'request_cache_except'  => [],
    // Default Controller Name
    'default_controller'    => 'Index',
    // Default Action Name
    'default_action'        => 'index',
    // Operation method suffix
    'action_suffix'         => '',
    // Processing method returned by default JSONP format
    'default_jsonp_handler' => 'jsonpReturn',
    // Default JSONP processing method
    'var_jsonp_handler'     => 'callback',
    // Routing middleware
    'middleware' => [
        // Background View Initialization
        //\app\admin\middleware\ViewInit::class,
        
        // Detect whether the user is logged in
        //\app\admin\middleware\CheckUser::class,
    ],
];
