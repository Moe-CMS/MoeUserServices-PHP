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

namespace app\model;

use app\model\TimeModel;

class SystemAdmin extends TimeModel
{

    protected $deleteTime = 'delete_time';

    public function getAuthList()
    {
        $list = (new SystemAuth())
            ->where('status', 1)
            ->column('title', 'id');
        return $list;
    }

}