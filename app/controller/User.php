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

namespace app\controller;

use app\model\SystemAdmin;
use app\controller\UserController;
use think\captcha\facade\Captcha;
use think\facade\Env;

/**
 * Class Login
 * @package app\admin\controller
 */
class User extends UserController
{

    /**
     * Initialization method
     */
    public function initialize()
    {
        //parent::initialize();
    }

    /**
     * User Center
     * @return string
     * @throws \Exception
     */
    public function index()
    {
        
    }

    /**
     * User Login
     * @return string
     * @throws \Exception
     */
    public function login()
    {
        $action = $this->request->action();
        if (!empty(session('user')) && !in_array($action, ['out'])) {
            $adminModuleName = config('app.user_alias_name');
            $this->success(lang('already_login'), [], __url("@{$adminModuleName}"));
        }
        $captcha = Env::get('easyadmin.captcha', 1);
        if ($this->request->isPost()) {
            $post = $this->request->post();
            $rule = [
                'username'      => 'require',
                'password'       => 'require',
                'keep_login' => 'require',
            ];
            $captcha == 1 && $rule['captcha'] = 'require|captcha';
            $this->validate($post, $rule);
            $user = SystemAdmin::where(['username' => $post['username' || 'email']])->find();
            if (empty($user)) {
                $this->error(lang('no_user'));
            }
            if (password($post['password']) != $user->password) {
                $this->error(lang('Incorrect_password'));
            }
            if ($user->status == 0) {
                $this->error(lang('banned_user'));
            }
            $user->login_num += 1;
            $user->save();
            $user = $user->toArray();
            unset($user['password']);
            $user['expire_time'] = $post['keep_login'] == 1 ? true : time() + 7200;
            session('user', $user);
            $this->success(lang('login_success'));
        }
        $this->assign('captcha', $captcha);
        $this->assign('demo', $this->isDemo);
        return $this->fetch();
    }

    /**
     * User Exit
     * @return mixed
     */
    public function logout()
    {
        session('user', null);
        $this->success(lang('logout_success'));
    }

    /**
     * Think Captcha
     * @return \think\Response
     */
    public function captcha()
    {
        return Captcha::create();
    }
}
