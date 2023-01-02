<?php
namespace app;

// Application Request Object Class
class Request extends \think\Request
{

    protected $filter = ['htmlspecialchars'];

}
