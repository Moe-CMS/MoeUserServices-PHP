<?php
use app\ExceptionHandle;
use app\Request;

// Container Provider Definition File
return [
    'think\Request'          => Request::class,
    'think\exception\Handle' => ExceptionHandle::class,
];
