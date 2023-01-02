<?php
// Event definition file
return [
    'bind'      => [
    ],

    'listen'    => [
        'AppInit'  => [
            //\app\listener\ViewInitListener::class,
            ],
        'HttpRun'  => [
            //\app\listener\ViewInitListener::class,
            ],
        'HttpEnd'  => [],
        'LogLevel' => [],
        'LogWrite' => [],
    ],

    'subscribe' => [
    ],
];
