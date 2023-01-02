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

namespace app\service;

use think\facade\Cache;

class TriggerService
{

    /**
     * Update menu cache
     * @param null $adminId
     * @return bool
     */
    public static function updateMenu($userId = null)
    {
        if(empty($userId)){
            Cache::tag('initUser')->clear();
        }else{
            Cache::delete('initUser_' . $userId);
        }
        return true;
    }

    /**
     * Update node cache
     * @param null $adminId
     * @return bool
     */
    public static function updateNode($userId = null)
    {
        if(empty($userId)){
            Cache::tag('authNode')->clear();
        }else{
            Cache::delete('allAuthNode_' . $userId);
        }
        return true;
    }

    /**
     * Update system settings cache
     * @return bool
     */
    public static function updateSysconfig()
    {
        Cache::tag('sysconfig')->clear();
        return true;
    }

}