<?php

// +----------------------------------------------------------------------
// | Cache Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Default Cache Driver
    'default' => env('cache.driver', 'file'),

    // Cache connection mode configuration
    'stores'  => [
        // Default file cache
        'file' => [
            // Drive mode
            'type'       => 'File',
            // Cache save directory
            'path'       => app()->getRuntimePath() . 'cache',
            // Cache prefix
            'prefix'     => env('cache.prefix', 'mucenter_'),
            // Cache validity period 0 means permanent cache
            'expire'     => 0,
            // Cache label prefix
            'tag_prefix' => 'tag:',
            // Serialization mechanisms, such as ['serialize', 'unserialize']
            'serialize'  => [],
        ],
        // More cache connections
        // Redis Cache
        'redis'   =>  [
            // Drive mode
            'type'   => 'redis',
            // server address
            'host'       => env('cache.host', 'localhost'),
            'port'       => env('cache.port', 6379),
            'password'       => env('cache.password', ''),
            'prefix'       => env('cache.prefix', 'mucenter_'),
        ],
        // Memcache Cache
        'memcache'   =>  [
            // Drive mode
            'type'   => 'memcache',
            // server address
            'host'       => env('cache.host', 'localhost'),
            'port'       => env('cache.port', 11211),
            'prefix'       => env('cache.prefix', 'mucenter_'),
        ],
        // Memcached Cache
        'memcached'   =>  [
            // Drive mode
            'type'   => 'memcached',
            // server address
            'host'       => env('cache.host', 'localhost'),
            'port'       => env('cache.port', 11211),
            'prefix'       => env('cache.prefix', 'mucenter_'),
            'username'       => env('cache.username', ''),
            'password'       => env('cache.password', ''),
        ],
    ],
];
