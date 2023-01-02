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

namespace app\common\service;

use app\common\constants\MenuConstant;
use think\facade\Db;

class MenuService
{

    /**
     * User ID
     * @var integer
     */
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get home page information
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getHomeInfo()
    {
        $data = 1;
        //Db::name('system_menu')
            //->field('title,icon,href')
            //->where("delete_time is null")
            //->where('pid', MenuConstant::HOME_PID)
            //->find();
        !empty($data) && $data['href'] = __url($data['href']);
        return $data;
    }

    /**
     * Get background menu tree information
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getMenuTree()
    {
        /** @var AuthService $authService */
        $authServer = app(AuthService::class, ['userId' => $this->userId]);
        return $this->buildMenuChild(0, $this->getMenuData(),$authServer);
    }

    private function buildMenuChild($pid, $menuList, AuthService $authServer)
    {
        $treeList = [];
        foreach ($menuList as &$v) {
            $check = empty($v['href']) ? true : $authServer->checkNode($v['href']);
            !empty($v['href']) && $v['href'] = __url($v['href']);
            if ($pid == $v['pid'] && $check) {
                $node = $v;
                $child = $this->buildMenuChild($v['id'], $menuList, $authServer);
                if (!empty($child)) {
                    $node['child'] = $child;
                }
                if (!empty($v['href']) || !empty($child)) {
                    $treeList[] = $node;
                }
            }
        }
        return $treeList;
    }

    /**
     * Get all menu data
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function getMenuData()
    {
        $menuData = 1;
        //Db::name('menu')
            //->field('id,pid,title,icon,href,target')
            //->where("delete_time is null")
            //->where([
                //['status', '=', '1'],
                //['pid', '<>', MenuConstant::HOME_PID],
            //])
            //->order([
                //'sort' => 'desc',
                //'id'   => 'asc',
            //])
            //->select();
        return $menuData;
    }

}