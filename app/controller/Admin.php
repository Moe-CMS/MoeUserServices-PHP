<?php
namespace app\controller;

use think\facade\Lang;
use app\model\SystemAdmin;
use app\model\SystemQuick;
use app\controller\UserController;
use think\App;
use think\facade\Env;

class Admin extends UserController
{
    /**
     * Background Home Page
     * @return string
     * @throws \Exception
     */
    public function index()
    {
        return $this->fetch('', [
            'user' => session('user'),
        ]);
    }

    /**
     * Background Welcome Page
     * @return string
     * @throws \Exception
     */
    public function welcome()
    {
        $quicks = SystemQuick::field('id,title,icon,href')
            ->where(['status' => 1])
            ->order('sort', 'desc')
            ->limit(8)
            ->select();
        $this->assign('quicks', $quicks);
        return $this->fetch();
    }

    /**
     * Modify user information
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function editUser()
    {
        $id = session('user.id');
        $row = (new SystemAdmin())
            ->withoutField('password')
            ->find($id);
        empty($row) && $this->error(lang('no_user_info'));
        if ($this->request->isPost()) {
            $post = $this->request->post();
            $this->isDemo && $this->error(lang('not_mod_in_demo'));
            $rule = [];
            $this->validate($post, $rule);
            try {
                $save = $row
                    ->allowField(['head_img', 'phone', 'remark', 'update_time'])
                    ->save($post);
            } catch (\Exception $e) {
                $this->error(lang('save_success'));
            }
            $save ? $this->success(lang('save_success')) : $this->error(lang('save_fail'));
        }
        $this->assign('row', $row);
        return $this->fetch();
    }

    /**
     * Change Password
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function editPassword()
    {
        $id = session('user.id');
        $row = (new SystemAdmin())
            ->withoutField('password')
            ->find($id);
        if (!$row) {
            $this->error(lang('no_user_info'));
        }
        if ($this->request->isPost()) {
            $post = $this->request->post();
            $this->isDemo && $this->error(lang('not_mod_in_demo'));
            $rule = [
                'password'       => 'require',
                'password_again' => 'require',
            ];
            $this->validate($post, $rule);
            if ($post['password'] != $post['password_again']) {
                $this->error(lang('passwords_not_inconsistent'));
            }

            try {
                $save = $row->save([
                    'password' => password($post['password']),
                ]);
            } catch (\Exception $e) {
                $this->error(lang('save_fail'));
            }
            if ($save) {
                $this->success(lang('save_success'));
            } else {
                $this->error(lang('save_fail'));
            }
        }
        $this->assign('row', $row);
        return $this->fetch();
    }

}
