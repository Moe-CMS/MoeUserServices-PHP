<?php
// +----------------------------------------------------------------------
// | Database Settings
// +----------------------------------------------------------------------
use think\facade\Env;

return [
    // Default database connection configuration
    'default'         => env('database.driver', 'mysql'),

    // Custom time query rules
    'time_query_rule' => [],

    // Auto write timestamp field
    // True is the automatic recognition type. False is disable.
    // String specifies the time field type support explicitly: int timestamp datetime date
    'auto_timestamp'  => true,

    // Default time format after the time field is retrieved
    'datetime_format' => 'Y-m-d H:i:s',

    // Time field configuration configuration format: create_time,update_time
    'datetime_field'  => '',

    // Database connection configuration information
    'connections'     => [
        'mysql' => [
            'type'            => env('database.type', 'mysql'),
            'hostname'        => env('database.hostname', 'localhost'),
            'database'        => env('database.database', 'mucenter'),
            'username'        => env('database.username', 'username'),
            'password'        => env('database.password', 'password'),
            'hostport'        => env('database.hostport', '3306'),
            // Database connection parameters
            'params'          => [],
            'charset'         => env('database.charset', 'utf8'),
            'prefix'          => env('database.prefix', 'muc_'),

            // Database deployment mode: 0 centralized (single server), 1 distributed (master and slave servers)
            'deploy'          => env('database.deploy', 0),
            // Whether the database reading and writing are separated from the master-slave mode
            'rw_separate'     => env('database.rw_separate', false),
            // Number of primary servers after read/write separation
            'master_num'      => env('database.master_num', 1),
            // Specify slave server serial number
            'slave_no'        => env('database.slave_no', ''),
            // Strictly check whether the field exists
            'fields_strict'   => true,
            // Whether disconnection and reconnection are required
            'break_reconnect' => false,
            // Listen to SQL
            'trigger_sql'     => env('app_debug', true),
            // Enable field caching
            'fields_cache'    => env('app_debug', false),
            // Field Cache Path
            'schema_cache_path' => app()->getRuntimePath() . 'schema' . DIRECTORY_SEPARATOR,
        ],
        // More database configuration information
    ],
];
