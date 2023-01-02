<?php
// +----------------------------------------------------------------------
// | MoeUserServices [ A SIMPLE USER SERVER AND USER CENTER ]
// +----------------------------------------------------------------------
// | Copyright (c) 2020-2022 SANYIMOE Inc. All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Chihiro <abcd2890000456@gmail.com>
// +----------------------------------------------------------------------

// [ Application portal file ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';

// Execute HTTP application and respond
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);
