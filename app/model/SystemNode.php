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

class SystemNode extends TimeModel
{

    public function getNodeTreeList()
    {
        $list = $this->select()->toArray();
        $list = $this->buildNodeTree($list);
        return $list;
    }

    protected function buildNodeTree($list)
    {
        $newList = [];
        $repeatString = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        foreach ($list as $vo) {
            if ($vo['type'] == 1) {
                $newList[] = $vo;
                foreach ($list as $v) {
                    if ($v['type'] == 2 && strpos($v['node'], $vo['node'] . '/') !== false) {
                        $v['node'] = "{$repeatString}├{$repeatString}" . $v['node'];
                        $newList[] = $v;
                    }
                }
            }
        }
        return $newList;
    }


}