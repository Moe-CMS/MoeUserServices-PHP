<?php
namespace app\traits;

use think\exception\HttpResponseException;
use think\Response;

/**
 * Trait JumpTrait
 * @package app\traits
 */
trait JumpTrait
{

    /**
     * Shortcut for successful jump operation
     * @access protected
     * @param mixed $msg Prompt information
     * @param mixed $data Data returned
     * @param string $url URL address of the jump
     * @param int $wait Jump waiting time
     * @param array $header Header information sent
     * @return void
     * @throws HttpResponseException
     */
    protected function success($msg = '', $data = '', $url = null, $wait = 3, array $header = [])
    {
        if (is_null($url) && isset($_SERVER["HTTP_REFERER"])) {
            $url = $_SERVER["HTTP_REFERER"];
        } elseif ($url) {
            $url = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : app('route')->buildUrl($url)->__toString();
        }

        $result = [
            'code' => 1,
            'msg'  => $msg,
            'data' => $data,
            'url'  => $url,
            'wait' => $wait,
        ];

        $type = $this->getResponseType();
        if ($type == 'html') {
            $response = view(app('config')->get('app.dispatch_success_tmpl'), $result);
        } elseif ($type == 'json') {
            $response = json($result);
        }
        throw new HttpResponseException($response);
    }

    /**
     * Shortcut to jump to operation error
     * @access protected
     * @param mixed $msg Prompt information
     * @param mixed $data Data returned
     * @param string $url URL address of the jump
     * @param int $wait Jump waiting time
     * @param array $header Header information sent
     * @return void
     * @throws HttpResponseException
     */
    protected function error($msg = '', $data = '', $url = null, $wait = 3, array $header = [])
    {
        if (is_null($url)) {
            $url = request()->isAjax() ? '' : 'javascript:history.back(-1);';
        } elseif ($url) {
            $url = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : app('route')->buildUrl($url)->__toString();
        }

        $type   = $this->getResponseType();
        $result = [
            'code' => 0,
            'msg'  => $msg,
            'data' => $data,
            'url'  => $url,
            'wait' => $wait,
        ];
        if ($type == 'html') {
            $response = view(app('config')->get('app.dispatch_error_tmpl'), $result);
        } elseif ($type == 'json') {
            $response = json($result);
        }
        throw new HttpResponseException($response);
    }

    /**
     * Return encapsulated API data to the client
     * @access protected
     * @param mixed $data Data to be returned
     * @param int $code Code returned
     * @param mixed $msg Prompt information
     * @param string $type Return data format
     * @param array $header Header information sent
     * @return void
     * @throws HttpResponseException
     */
    protected function result($data, $code = 0, $msg = '', $type = '', array $header = [])
    {
        $result   = [
            'code' => $code,
            'msg'  => $msg,
            'time' => time(),
            'data' => $data,
        ];
        $type     = $type ?: $this->getResponseType();
        $response = Response::create($result, $type)->header($header);

        throw new HttpResponseException($response);
    }

    /**
     * URL Redirection
     * @access protected
     * @param string $url Jumped URL expression
     * @param array|int $params Other URL parameters
     * @param int $code http code
     * @param array $with Implicit parameter transfer
     * @return void
     * @throws HttpResponseException
     */
    protected function redirect($url = [], $params = [], $code = 302)
    {
        if (is_integer($params)) {
            $code   = $params;
            $params = [];
        }

        $response = Response::create($url, 'redirect', $code);
        throw new HttpResponseException($response);
    }

    /**
     * Get the current response output type
     * @access protected
     * @return string
     */
    protected function getResponseType()
    {
        return (request()->isJson() || request()->isAjax() || request()->isPost()) ? 'json' : 'html';
    }
}