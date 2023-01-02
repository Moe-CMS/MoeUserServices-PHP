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

use think\facade\Db;
use think\facade\Config;

/**
 * System Log Table
 * Class SystemLogService
 * @package app\service
 */
class SystemLogService
{

    /**
     * Current instance
     * @var object
     */
    protected static $instance;

    /**
     * Table prefix
     * @var string
     */
    protected $tablePrefix;

    /**
     * Table suffix
     * @var string
     */
    protected $tableSuffix;

    /**
     * Table Name
     * @var string
     */
    protected $tableName;

    /**
     * Construction method
     * SystemLogService constructor.
     */
    protected function __construct()
    {
        $this->tablePrefix = Config::get('database.connections.mysql.prefix');
        $this->tableSuffix = date('Ym', time());
        $this->tableName = "{$this->tablePrefix}system_log_{$this->tableSuffix}";
        return $this;
    }

    /**
     * Get Instance Object
     * @return SystemLogService|object
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    /**
     * Save Data
     * @param $data
     * @return bool|string
     */
    public function save($data)
    {
        Db::startTrans();
        try {
            $this->detectTable();
            Db::table($this->tableName)->insert($data);
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            return $e->getMessage();
        }
        return true;
    }

    /**
     * Test Data Sheet
     * @return bool
     */
    protected function detectTable()
    {
        $check = Db::query("show tables like '{$this->tableName}'");
        if (empty($check)) {
            $sql = $this->getCreateSql();
            Db::execute($sql);
        }
        return true;
    }

    public function getAllTableList()
    {

    }

    /**
     * Obtain the sql for creating tables according to the suffix
     * @return string
     */
    protected function getCreateSql()
    {
        return <<<EOT
CREATE TABLE `{$this->tableName}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `admin_id` int(10) unsigned DEFAULT '0' COMMENT '管理员ID',
  `url` varchar(1500) NOT NULL DEFAULT '' COMMENT '操作页面',
  `method` varchar(50) NOT NULL COMMENT '请求方法',
  `title` varchar(100) DEFAULT '' COMMENT '日志标题',
  `content` text NOT NULL COMMENT '内容',
  `ip` varchar(50) NOT NULL DEFAULT '' COMMENT 'IP',
  `useragent` varchar(255) DEFAULT '' COMMENT 'User-Agent',
  `create_time` int(10) DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=630 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台操作日志表 - {$this->tableSuffix}';
EOT;
    }

}
