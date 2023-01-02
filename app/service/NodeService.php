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

namespace app\service;


use EasyAdmin\auth\Node;

class NodeService
{

    /**
     * Get Node Service
     * @return array
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \ReflectionException
     */
    public function getNodelist()
    {
        $basePath = base_path() . DIRECTORY_SEPARATOR . 'controller';
        $baseNamespace = "app\controller";

        $nodeList  = (new Node($basePath, $baseNamespace))
            ->getNodelist();

        return $nodeList;
    }
}