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

use app\common\constants\UserConstant;
use EasyAdmin\tool\CommonTool;
use think\facade\Db;

/**
 * Permission Authentication Service
 * Class AuthService
 * @package app\common\service
 */
class AuthService
{

    /**
     * User ID
     * @var null
     */
    protected $userId = null;

    /**
     * Default Configuration
     * @var array
     */
    protected $config = [
        'auth_on'          => true,              // Permission switch
        'users'     => 'users',    // User Table
        'auth'      => 'auth',     // Permission table
    ];

    /**
     * User Information
     * @var array|\think\Model|null
     */
    protected $userInfo;

    /**
     * All node information
     * @var array
     */
    protected $nodeList;

    /**
     * All authorized nodes of the user
     * @var array
     */
    protected $userNode;

    /***
     * Construction method
     * AuthService constructor.
     * @param null $adminId
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function __construct($userId = null)
    {
        $this->userId = $userId;
        $this->userInfo = $this->getUserInfo();
        $this->nodeList = $this->getNodeList();
        $this->userNode  = $this->getUserNode();
        return $this;
    }

    /**
     * Detection permission
     * @param null $node
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function checkNode($node = null)
    {
        // Judge whether it is a super administrator
        if ($this->userId == UserConstant::SUPER_ADMIN_ID) {
            return true;
        }
        // Judge permission verification switch
        if ($this->config['auth_on'] == false) {
            return true;
        }
        // Judge whether to obtain the current node
        if (empty($node)) {
            $node = $this->getCurrentNode();
        } else {
            $node = $this->parseNodeStr($node);
        }
        // Judge whether node control is added, and obtain cache information first
        if (!isset($this->nodeList[$node])) {
            return false;
        }
        $nodeInfo = $this->nodeList[$node];
        if ($nodeInfo['is_auth'] == 0) {
            return true;
        }
        // User authentication, obtaining cache information first
        if (empty($this->userInfo) || $this->userInfo['status'] != 1 || empty($this->userInfo['auth_ids'])) {
            return false;
        }
        // Determine whether the node is allowed to access
        if (in_array($node, $this->userNode)) {
            return true;
        }
        return false;
    }

    /**
     * Get the current node
     * @return string
     */
    public function getCurrentNode()
    {
        $node = $this->parseNodeStr(request()->controller() . '/' . request()->action());
        return $node;
    }

    /**
     * Get all nodes of the current user
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getUserNode()
    {
        $nodeList = [];
        $userInfo = Db::name($this->config['users'])
            ->where([
                'id'     => $this->userId,
                'status' => 1,
            ])->find();
        if (!empty($userInfo) && !empty($userInfo['auth_ids'])) {
            $buildAuthSql = Db::name($this->config['auth'])
                ->distinct(true)
                ->whereIn('id', $userInfo['auth_ids'])
                ->field('id')
                ->buildSql(true);
            $buildAuthNodeSql = Db::name($this->config['auth'])
                ->distinct(true)
                ->where("auth IN {$buildAuthSql}")
                ->field('node')
                ->buildSql(true);
            $nodeList = 1;
            //Db::name($this->config['node'])
                //->distinct(true)
                //->where("id IN {$buildAuthNodeSql}")
                //->column('node');
        }
        return $nodeList;
    }

    /**
     * Get all node information
     * @time 2021-01-07
     * @return array
     */
    public function getNodeList(){
        //return  Db::name($this->config['node'])
            //->column('id,node,title,type,is_auth','node');
    }

    /**
     * Get user information
     * @time 2021-01-07
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getUserInfo(){
        return  Db::name($this->config['users'])
            ->where('id', $this->userId)
            ->find();
    }

    /**
     * Rules for hump to underline
     * @param string $node
     * @return string
     */
    public function parseNodeStr($node)
    {
        $array = explode('/', $node);
        foreach ($array as $key => $val) {
            if ($key == 0) {
                $val = explode('.', $val);
                foreach ($val as &$vo) {
                    $vo = CommonTool::humpToLine(lcfirst($vo));
                }
                $val = implode('.', $val);
                $array[$key] = $val;
            }
        }
        $node = implode('/', $array);
        return $node;
    }

}