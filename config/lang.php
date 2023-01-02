<?php
// +----------------------------------------------------------------------
// | Multilingual Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Default Language
    'default_lang'    => env('lang.default_lang', 'en-us'),
    // List of allowed languages
    'allow_lang_list' => ['zh-cn', 'en-us'],
    // Multilingual automatic detection of variable names
    'detect_var'      => 'lang',
    // Whether to use cookie record
    'use_cookie'      => true,
    // Multilingual cookie variables
    'cookie_var'      => 'mucenter_lang',
    // Multilingual header variable
    'header_var'      => 'mucenter-lang',
    // Extended Language Pack
    'extend_list'     => [],
    // Accept-Language Escape to the corresponding language pack name
    'accept_language' => [
        'zh-hans-cn' => 'zh-cn',
    ],
    // Whether language grouping is supported
    'allow_group'     => true,
];
