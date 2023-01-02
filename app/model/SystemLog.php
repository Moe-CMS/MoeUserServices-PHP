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

class SystemLog extends TimeModel
{

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->name = 'system_log_' . date('Ym');
    }

    public function setMonth($month)
    {
        $this->name = 'system_log_' . $month;
        return $this;
    }

    public function admin()
    {
        return $this->belongsTo('app\model\SystemAdmin', 'admin_id', 'id');
    }


}