<?php
// +----------------------------------------------------------------------
// | Template Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Template engine type uses Think
    'type'          => 'Think',
    // Default template rendering rule 1: resolve to lowercase+underline 2: convert all lowercase 3: keep operation method
    'auto_rule'     => 1,
    // Template directory name
    'view_dir_name' => 'view',
    // Template suffix
    'view_suffix'   => 'html',
    // Template file name separator
    'view_depr'     => DIRECTORY_SEPARATOR,
    // Template engine general tag start tag
    'tpl_begin'     => '{',
    // Template engine general tag end tag
    'tpl_end'       => '}',
    // Label Library Label Start Tag
    'taglib_begin'  => '{',
    // Label library label end tag
    'taglib_end'    => '}',
    // Template Cache
    'display_cache' => true,
    // Character substitution
    'tpl_replace_string' => [
        '__STATIC__' => Env::get('mucenter.static_path', '/static'),
        '__JS__'     => Env::get('mucenter.javascript_path', '/static/javascript'),
    ]
];
