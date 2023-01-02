<?php
declare (strict_types = 1);

namespace app;

use think\App;
use think\exception\ValidateException;
use think\Validate;

/**
 * Basic class of controller
 */
abstract class BaseController
{
    /**
     * Request instance
     * @var \think\Request
     */
    protected $request;

    /**
     * Application examples
     * @var \think\App
     */
    protected $app;

    /**
     * Batch validation or not
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * Controller middleware
     * @var array
     */
    protected $middleware = [];

    /**
     * Construction method
     * @access public
     * @param  App  $app  Application Object
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // Controller initialization
        $this->initialize();
    }

    // initialization
    protected function initialize()
    {}

    /**
     * Validation data
     * @access protected
     * @param  array        $data     Data
     * @param  string|array $validate Authenticator name or validation rule array
     * @param  array        $message  Prompt information
     * @param  bool         $batch    Batch validation or not
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // Support Scenarios
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // Batch validation or not
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

}
