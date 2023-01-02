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

use think\facade\Lang;
use app\service\ConfigService;
use app\BaseController;
use app\constants\UserConstant;
use app\service\AuthService;
use EasyAdmin\tool\CommonTool;
use think\facade\Env;
use think\facade\View;
use think\Model;

/**
 * Class AdminController
 * @package app\controller
 */
class UserController extends BaseController
{

    use \app\traits\JumpTrait;

    /**
     * Current model
     * @Model
     * @var object
     */
    protected $model;

    /**
     * field order
     * @var array
     */
    protected $sort = [
        'id' => 'desc',
    ];

    /**
     * Fields allowed to be modified
     * @var array
     */
    protected $allowModifyFields = [
        'status',
        'sort',
        'remark',
        'is_delete',
        'is_auth',
        'title',
    ];

    /**
     * Field information not exported
     * @var array
     */
    protected $noExportFields = ['delete_time', 'update_time'];

    /**
     * Drop down selection criteria
     * @var array
     */
    protected $selectWhere = [];

    /**
     * Associate Query
     * @var bool
     */
    protected $relationSearch = false;

    /**
     * Template layout, false cancel
     * @var string|bool
     */
    protected $layout = 'layout/default';

    /**
     * Is it a demonstration environment
     * @var bool
     */
    protected $isDemo = false;


    /**
     * Initialization method
     */
    protected function initialize()
    {
        parent::initialize();
        $this->layout && $this->app->view->engine()->layout($this->layout);
        $this->isDemo = Env::get('mucenter.is_demo', false);
        $this->viewInit();
        $this->checkAuth();
    }

    /**
     * Template variable assignment
     * @param string|array $name Template Variables
     * @param mixed $value Variable value
     * @return mixed
     */
    public function assign($name, $value = null)
    {
        return $this->app->view->assign($name, $value);
    }

    /**
     * Parse and obtain template content for output
     * @param string $template
     * @param array $vars
     * @return mixed
     */
    public function fetch($template = '', $vars = [])
    {
        return $this->app->view->fetch($template, $vars);
    }

    /**
     * Override validation rules
     * @param array $data
     * @param array|string $validate
     * @param array $message
     * @param bool $batch
     * @return array|bool|string|true
     */
    public function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        try {
            parent::validate($data, $validate, $message, $batch);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        return true;
    }

    /**
     * Build request parameters
     * @param array $excludeFields Ignore fields for build search
     * @return array
     */
    protected function buildTableParames($excludeFields = [])
    {
        $get = $this->request->get('', null, null);
        $page = isset($get['page']) && !empty($get['page']) ? $get['page'] : 1;
        $limit = isset($get['limit']) && !empty($get['limit']) ? $get['limit'] : 15;
        $filters = isset($get['filter']) && !empty($get['filter']) ? $get['filter'] : '{}';
        $ops = isset($get['op']) && !empty($get['op']) ? $get['op'] : '{}';
        // Json to array
        $filters = json_decode($filters, true);
        $ops = json_decode($ops, true);
        $where = [];
        $excludes = [];

        // Judge whether to associate query
        $tableName = CommonTool::humpToLine(lcfirst($this->model->getName()));

        foreach ($filters as $key => $val) {
            if (in_array($key, $excludeFields)) {
                $excludes[$key] = $val;
                continue;
            }
            $op = isset($ops[$key]) && !empty($ops[$key]) ? $ops[$key] : '%*%';
            if ($this->relationSearch && count(explode('.', $key)) == 1) {
                $key = "{$tableName}.{$key}";
            }
            switch (strtolower($op)) {
                case '=':
                    $where[] = [$key, '=', $val];
                    break;
                case '%*%':
                    $where[] = [$key, 'LIKE', "%{$val}%"];
                    break;
                case '*%':
                    $where[] = [$key, 'LIKE', "{$val}%"];
                    break;
                case '%*':
                    $where[] = [$key, 'LIKE', "%{$val}"];
                    break;
                case 'range':
                    [$beginTime, $endTime] = explode(' - ', $val);
                    $where[] = [$key, '>=', strtotime($beginTime)];
                    $where[] = [$key, '<=', strtotime($endTime)];
                    break;
                case 'in':
                    $where[] = [$key, 'IN', $val];
                    break;
                default:
                    $where[] = [$key, $op, "%{$val}"];
            }
        }
        return [$page, $limit, $where, $excludes];
    }

    /**
     * Drop down selection list
     * @return \think\response\Json
     */
    public function selectList()
    {
        $fields = input('selectFields');
        $data = $this->model
            ->where($this->selectWhere)
            ->field($fields)
            ->select();
        $this->success(null, $data);
    }

    /**
     * Initialize view parameters
     */
    private function viewInit(){
        $request = app()->request;
        list($thisModule, $thisController, $thisAction) = [app('http')->getName(), app()->request->controller(), $request->action()];
        list($thisControllerArr, $jsPath) = [explode('.', $thisController), null];
        foreach ($thisControllerArr as $vo) {
            empty($jsPath) ? $jsPath = parse_name($vo) : $jsPath .= '/' . parse_name($vo);
        }
        $autoloadJs = file_exists(root_path('public') . "static/{$thisModule}/js/{$jsPath}.js") ? true : false;
        $thisControllerJsPath = "{$thisModule}/js/{$jsPath}.js";
        $userModuleName = config('app.user_alias_name');
        $isSuperAdmin = session('user.id') == UserConstant::SUPER_ADMIN_ID ? true : false;
        $data = [
            'userModuleName'      => $userModuleName,
            'thisController'       => parse_name($thisController),
            'thisAction'           => $thisAction,
            'thisRequest'          => parse_name("{$thisModule}/{$thisController}/{$thisAction}"),
            'thisControllerJsPath' => "{$thisControllerJsPath}",
            'autoloadJs'           => $autoloadJs,
            'isSuperAdmin'         => $isSuperAdmin,
            'version'              => env('app_debug') ? time() : ConfigService::getVersion(),
        ];

        View::assign($data);
    }

    /**
     * Detection permission
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    private function checkAuth(){
        $userConfig = config('user');
        $userId = session('user.id');
        $expireTime = session('user.expire_time');
        /** @var AuthService $authService */
        $authService = app(AuthService::class, ['userId' => $userId]);
        $currentNode = $authService->getCurrentNode();
        $currentController = parse_name(app()->request->controller());

        // Verify Login
        if (!in_array($currentController, $userConfig['no_login_controller']) &&
            !in_array($currentNode, $userConfig['no_login_node'])) {
            empty($userId) && $this->error(lang('please_login_first'), [], __url('login/index'));

            // Judge whether the login expires
            if ($expireTime !== true && time() > $expireTime) {
                session('user', null);
                $this->error(lang('login_expired'), [], __url('login/index'));
            }
        }

        // Verify permissions
        if (!in_array($currentController, $userConfig['no_auth_controller']) &&
            !in_array($currentNode, $userConfig['no_auth_node'])) {
            $check = $authService->checkNode($currentNode);
            !$check && $this->error(lang('no_access'));

            // Judge whether it is a demonstration environment
            if(env('mucenter.is_demo', false) && app()->request->isPost()){
                $this->error(lang('not_mod_in_demo'));
            }

        }
    }

    /**
     * Strictly verify whether the interface is a POST request
     */
    protected function checkPostRequest(){
        if (!$this->request->isPost()) {
            $this->error(lang('request_illegal'));
        }
    }

}
