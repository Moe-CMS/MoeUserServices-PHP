<?php
// +----------------------------------------------------------------------
// | Filesystem Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Default Disk
    'default' => env('filesystem.driver', 'local'),
    // Disk list
    'disks'   => [
        'local'  => [
            'type' => 'local',
            'root' => app()->getRuntimePath() . 'storage',
        ],
        'public' => [
            // Disk Type
            'type'       => 'local',
            // Disk Path
            'root'       => app()->getRootPath() . 'public/storage',
            // External URL path corresponding to disk path
            'url'        => '/storage',
            // visibility
            'visibility' => 'public',
        ],
        // More disk configuration information
    ],
];
