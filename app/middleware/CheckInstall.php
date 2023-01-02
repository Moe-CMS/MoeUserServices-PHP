<?php
declare (strict_types = 1);

namespace app\middleware;

use think\db\exception\PDOException;
use think\exception\HttpResponseException;
use think\facade\Db;

class CheckInstall
{
    protected static $installLock = '';
    protected static $envFile = '';
    protected static $sqlFile = '';

    /**
     * Initialize common information
     */
    private static function init()
    {
        // Installation lock address
        self::$installLock = app()->getRootPath() . 'install.lock';
    }

    /**
     * Judge the installation lock
     * @return bool
     */
    public static function isLock()
    {
        self::init();
        if (file_exists(self::$installLock)) {
            return true;
        } else
            return false;
    }

    /**
     * Process request
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        // Judge whether the system is effectively installed
        if (!preg_match('/install/i',$request->url())){
            if (!self::isLock()){
                return redirect('/install.php');
            }
            try {
                $table = Db::name('config')->where('id', 1)->where('group', 'site')->where('value', 'https://github.com/Moe-CMS/MoeUserServices-PHP.git')->find();
            }catch (PDOException $e){
                unlink(self::$installLock);
                return redirect('/install.php');
            }
        }
        // Install Skip verification
        return $next($request);
    }
}
