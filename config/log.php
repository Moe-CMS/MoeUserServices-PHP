<?php
// +----------------------------------------------------------------------
// | log setting
// +----------------------------------------------------------------------
return [
    // Default logging channel
    'default'      => 'file',
    // Logging Level
    'level'        => [],
    // Log type recorded channel ['error'=>'email',...]
    'type_channel' => [],
    // Turn off global log writing
    'close'        => false,
    // Global log processing supports closures
    'processor'    => null,

    // Log Channel List
    'channels'     => [
        'file' => [
            // Logging mode
            'type'           => \LogTrace\FileLog::class,
            // Log save directory
            'path'           => app()->getRuntimePath() . 'log',
            // Single file log writing
            'single'         => false,
            // Independent log level
            'apart_level'    => [],
            // Maximum number of log files
            'max_files'      => 256,
            // Record in JSON format
            'json'           => false,
            // Log processing
            'processor'      => null,
            // Turn off channel log writing
            'close'          => false,
            // Log Output Format
            'format'         => '[%s][%s] %s',
            // Whether to write in real time
            'realtime_write' => true,
        ],
        // Other log channel configurations
    ],

];
