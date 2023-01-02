<?php
// +----------------------------------------------------------------------
// | Cookie Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Cookie save time
    'expire'    => 0,
    // Cookie save path
    'path'      => '/',
    // Cookie valid domain name
    'domain'    => env('cookie.domain', ''),
    // Cookies enable secure transmission
    'secure'    => false,
    // Httponly settings
    'httponly'  => false,
    // Whether to use setcookie
    'setcookie' => true,
    // Samesite settings, support 'strict' 'lax'
    'samesite'  => '',
];
