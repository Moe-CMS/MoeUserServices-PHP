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

namespace app\middleware;

use app\Request;
use CsrfVerify\drive\ThinkphpCache;
use CsrfVerify\entity\CsrfVerifyEntity;
use CsrfVerify\interfaces\CsrfVerifyInterface;
use think\facade\Session;
use think\facade\Lang;

class CsrfMiddleware
{
    use \app\traits\JumpTrait;

    public function handle(Request $request, \Closure $next)
    {
        if (env('EASYADMIN.IS_CSRF', true)) {
            if (!in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'])) {

                // Cross domain verification
                $refererUrl = $request->header('REFERER', null);
                $refererInfo = parse_url($refererUrl);
                $host = $request->host(true);
                if (!isset($refererInfo['host']) || $refererInfo['host'] != $host) {
                    $this->error(lang('Illegal_request'));
                }

                // CSRF calibration
                $ckCsrfToken = $request->post('ckCsrfToken', null);
                $data = !empty($ckCsrfToken) ? ['__token__' => $ckCsrfToken] : [];

                $check = $request->checkToken('__token__', $data);
                if (!$check) {
                    $this->error(lang('Request_verification_failed'));
                }

            }
        }
        return $next($request);
    }
}