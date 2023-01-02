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


use think\Model;
use think\model\concern\SoftDelete;

/**
 * Time related model
 * Class TimeModel
 * @package app\model
 */
class TimeModel extends Model
{

    /**
     * Automatic timestamp type
     * @var string
     */
    protected $autoWriteTimestamp = true;

    /**
     * Add Time
     * @var string
     */
    protected $createTime = 'create_time';

    /**
     * Update time
     * @var string
     */
    protected $updateTime = 'update_time';

    /**
     * Soft deletion
     */
    use SoftDelete;
    protected $deleteTime = false;

}