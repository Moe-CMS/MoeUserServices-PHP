-- MoeUserServices
-- V0.0.1 development
-- Install database file
-- Project address: https://github.com/Moe-CMS/MoeUserServices-PHP.git

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- 表的结构 `muc_applications`
--

CREATE TABLE `muc_applications` (
  `appid` smallint(6) UNSIGNED NOT NULL COMMENT '应用ID',
  `uid` bigint(20) UNSIGNED NOT NULL COMMENT '添加应用的用户ID',
  `type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '应用类型',
  `API` smallint(1) NOT NULL COMMENT 'API类型(0:旧版UCenter, 1:MAuth, 2:OAuth 2.0)',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '应用名',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '应用域名',
  `authkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UCenter、MAuth应用认证key，OAuth 2.0的API key',
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '应用IP地址，当应用连接失败时使用它',
  `viewprourl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户中心页的地址',
  `apifilename` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'API连接的客户端文件名，UCenter为uc.php，MAuth、OAuth则可以为NULL',
  `charset` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dbcharset` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `synlogin` tinyint(1) NOT NULL DEFAULT 0,
  `recvnote` tinyint(1) DEFAULT 0,
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '额外代码',
  `tagtemplates` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签模版',
  `allowips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP白名单，仅对于UCenter应用开启IP白名单后有效，对于MAuth、OAuth 2.0无效'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='应用表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_auth`
--

CREATE TABLE `muc_auth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL COMMENT '权限名称',
  `sort` int(11) DEFAULT 0 COMMENT '排序',
  `status` tinyint(1) UNSIGNED DEFAULT 1 COMMENT '状态(0:禁用,1:启用)',
  `auth` tinyint(1) NOT NULL COMMENT '权限(0:游客, 1:管理员, 2:普通用户)',
  `node` tinyint(1) NOT NULL COMMENT '节点验证ID',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统权限表' ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `muc_auth`
--

INSERT INTO `muc_auth` (`id`, `title`, `sort`, `status`, `auth`, `node`, `remark`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'Administrator', 1, 1, 1, 0, '', NULL, NULL, NULL),
(2, 'Users', 2, 1, 2, 0, NULL, NULL, NULL, NULL),
(3, 'Guide', 3, 1, 0, 0, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `muc_badwords`
--

CREATE TABLE `muc_badwords` (
  `id` smallint(6) NOT NULL COMMENT '违禁词ID',
  `admin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '添加违禁词的管理员UID',
  `find` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '违禁词',
  `replacement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '替换为',
  `findpattern` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '查找模式'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='违禁词表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_config`
--

CREATE TABLE `muc_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '变量名',
  `group` varchar(30) NOT NULL DEFAULT '' COMMENT '分组',
  `value` mediumtext DEFAULT NULL COMMENT '变量值',
  `remark` varchar(100) DEFAULT '' COMMENT '备注信息',
  `sort` int(10) DEFAULT 0,
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统配置表' ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `muc_config`
--

INSERT INTO `muc_config` (`id`, `name`, `group`, `value`, `remark`, `sort`, `create_time`, `update_time`) VALUES
(1, 'repo', 'site', 'https://github.com/Moe-CMS/MoeUserServices-PHP.git', 'Repo address.', 0, NULL, NULL),
(2, 'site_version', 'site', '0.0.1(development)', 'System version information.', 0, NULL, NULL),
(3, 'site_name', 'site', 'MoeUserServices', 'The name of the Web site.', 0, NULL, NULL),
(4, 'logo_title', 'site', 'MoeUserServices', 'LOGO Title', 0, NULL, NULL),
(5, 'logo_image', 'site', '/favicon.ico', 'logo image', 0, NULL, NULL),
(6, 'site_ico', 'site', '/favicon.ico', 'Favicon ico', 0, NULL, NULL),
(7, 'site_copyright', 'site', 'MoeUserServices-PHP', 'Copyright Information', 0, NULL, NULL),
(8, 'site_beian', 'site', NULL, 'Filing information', 0, NULL, NULL),
(9, 'mailauth', 'mail', '1', 'Email authentication', 0, NULL, NULL),
(10, 'mailusername', 'mail', 'muc@mojy.xyz', 'Email authentication username', 0, NULL, NULL),
(11, 'mailpassword', 'mail', '123456', 'Email authentication password', 0, NULL, NULL),
(12, 'mailencrypt', 'mail', NULL, 'The mailbox encryption method. If it is empty, it will not be encrypted. TLS and SSL are supported.', 0, NULL, NULL),
(13, 'mailfrom', 'mail', 'MUCenter<muc@mojy.xyz>', 'Mail source address, support syntax: MUCenter<muc@mojy.xyz>', 0, NULL, NULL),
(14, 'mailport', 'mail', '25', 'Mail port.', 0, NULL, NULL),
(15, 'mailserver', 'mail', 'mail.mojy.xyz', 'Mail Server', 0, NULL, NULL),
(16, 'mailauth_1', 'mail', '1', 'Recursive verification of multiple emails.', 0, NULL, NULL),
(17, 'mailusername_1', 'mail', 'muc@mojy.xyz', 'Multi email recursive verification of user names.', 0, NULL, NULL),
(18, 'mailpassword_1', 'mail', '123456', 'Multi email recursive verification of password.', 0, NULL, NULL),
(19, 'mailencrypt_1', 'mail', NULL, 'The mailbox encryption method. If it is empty, it will not be encrypted. TLS and SSL are supported.', 0, NULL, NULL),
(20, 'mailfrom_1', 'mail', 'MUCenter<muc@mojy.xyz>', 'Mail source address, support syntax: MUCenter<muc@mojy.xyz>', 0, NULL, NULL),
(21, 'mailport_1', 'mail', '25', 'Multi email recursive verification of port.', 0, NULL, NULL),
(22, 'mailserver_1', 'mail', 'mail.mojy.xyz', 'Multi email recursive verification of server.', 0, NULL, NULL),
(23, 'mailauth_2', 'mail', '1', 'Recursive verification of multiple emails.', 0, NULL, NULL),
(24, 'mailusername_2', 'mail', 'muc@mojy.xyz', 'Multi email recursive verification of user names.', 0, NULL, NULL),
(25, 'mailpassword_2', 'mail', '123456', 'Multi email recursive verification of password.', 0, NULL, NULL),
(26, 'mailencrypt_2', 'mail', NULL, 'The mailbox encryption method. If it is empty, it will not be encrypted. TLS and SSL are supported.', 0, NULL, NULL),
(27, 'mailfrom_2', 'mail', 'MUCenter<muc@mojy.xyz>', 'Mail source address, support syntax: MUCenter<muc@mojy.xyz>', 0, NULL, NULL),
(28, 'mailport_2', 'mail', '25', 'Multi email recursive verification of port.', 0, NULL, NULL),
(29, 'mailserver_2', 'mail', 'mail.mojy.xyz', 'Multi email recursive verification of server.', 0, NULL, NULL),
(30, 'mailauth_3', 'mail', '1', 'Recursive verification of multiple emails.', 0, NULL, NULL),
(31, 'mailusername_3', 'mail', 'muc@mojy.xyz', 'Multi email recursive verification of user names.', 0, NULL, NULL),
(32, 'mailpassword_3', 'mail', '123456', 'Multi email recursive verification of password.', 0, NULL, NULL),
(33, 'mailencrypt_3', 'mail', NULL, 'The mailbox encryption method. If it is empty, it will not be encrypted. TLS and SSL are supported.', 0, NULL, NULL),
(34, 'mailfrom_3', 'mail', 'MUCenter<muc@mojy.xyz>', 'Mail source address, support syntax: MUCenter<muc@mojy.xyz>', 0, NULL, NULL),
(35, 'mailport_3', 'mail', '25', 'Multi email recursive verification of port.', 0, NULL, NULL),
(36, 'mailserver_3', 'mail', 'mail.mojy.xyz', 'Multi email recursive verification of server.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `muc_domains`
--

CREATE TABLE `muc_domains` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '域名解析ID',
  `domain` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '域名',
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='应用域名解析表(类似于hosts)';

-- --------------------------------------------------------

--
-- 表的结构 `muc_events`
--

CREATE TABLE `muc_events` (
  `fid` mediumint(8) UNSIGNED NOT NULL COMMENT '事件ID',
  `appid` varchar(30) NOT NULL COMMENT '应用ID',
  `icon` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图标',
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户id',
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `dateline` int(10) UNSIGNED NOT NULL COMMENT '时间线',
  `hash_template` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '哈希模版',
  `hash_data` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '哈希数据',
  `title_template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题模版',
  `title_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题数据',
  `body_template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身体模版',
  `body_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身体数据',
  `body_general` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '身体',
  `image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像1',
  `image_1_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像1链接',
  `image_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像2',
  `image_2_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像2链接',
  `image_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像3',
  `image_3_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像3链接',
  `image_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像4',
  `image_4_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图像4链接',
  `target_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '返回ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='事件表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_friends`
--

CREATE TABLE `muc_friends` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户ID',
  `friendid` mediumint(8) UNSIGNED NOT NULL COMMENT '好友ID',
  `direction` tinyint(1) NOT NULL COMMENT '介绍',
  `version` int(10) UNSIGNED NOT NULL COMMENT '版本',
  `delstatus` tinyint(1) NOT NULL COMMENT '删除状态',
  `comment` char(255) NOT NULL COMMENT '讨论'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='好友表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_pm_group`
--

CREATE TABLE `muc_pm_group` (
  `pgid` int(20) UNSIGNED NOT NULL COMMENT '群聊ID',
  `uid` int(20) NOT NULL DEFAULT 0 COMMENT '用户ID',
  `plid` int(20) NOT NULL DEFAULT 0 COMMENT '列表ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `muc_pm_lists`
--

CREATE TABLE `muc_pm_lists` (
  `plid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息列表ID',
  `pgid` mediumint(8) UNSIGNED DEFAULT 0 COMMENT '群聊ID，NULL为私信',
  `authorid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息发起人UID',
  `pmtype` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息类型',
  `subject` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '短消息名称',
  `users` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息用户',
  `min_max` varchar(17) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最低/最高',
  `dateline` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '时间线',
  `lastmessage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最后的消息'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='短消息列表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_pm_members`
--

CREATE TABLE `muc_pm_members` (
  `plid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息ID',
  `pgid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '群聊ID，NULL为私信',
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户ID',
  `isnew` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否为新短消息(0:否, 1:是)',
  `pmnum` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '短消息序号',
  `lastupdate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后更新日期',
  `lastdateline` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后时间线'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='短消息用户';

-- --------------------------------------------------------

--
-- 表的结构 `muc_pm_messages`
--

CREATE TABLE `muc_pm_messages` (
  `pmid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '消息ID',
  `plid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '列表ID',
  `pgid` mediumint(8) UNSIGNED DEFAULT NULL COMMENT '群聊ID，NULL为私信',
  `authorid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发送者ID',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消息',
  `delstatus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '删除状态',
  `dateline` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '时间线'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='短消息内容表';

-- --------------------------------------------------------

--
-- 表的结构 `muc_users`
--

CREATE TABLE `muc_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_ids` int(20) DEFAULT NULL COMMENT '认证权限ID',
  `head_img` varchar(255) DEFAULT NULL COMMENT '头像',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '用户密码',
  `email` tinytext DEFAULT NULL COMMENT '用户邮箱',
  `phone` varchar(16) DEFAULT NULL COMMENT '手机号',
  `qq` varchar(16) DEFAULT NULL COMMENT 'QQ号',
  `wechat` varchar(32) DEFAULT NULL COMMENT '微信号',
  `other` varchar(32) DEFAULT NULL COMMENT '其它联系方式',
  `remark` varchar(255) DEFAULT '' COMMENT '备注说明',
  `login_num` bigint(20) UNSIGNED DEFAULT 0 COMMENT '登录次数',
  `sort` int(11) DEFAULT 0 COMMENT '排序',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态(0:封禁,1:正常,)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统用户表' ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `muc_users`
--

INSERT INTO `muc_users` (`id`, `auth_ids`, `head_img`, `username`, `password`, `email`, `phone`, `qq`, `wechat`, `other`, `remark`, `login_num`, `sort`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 1, '/static/user/images/head.jpg', 'admin', 'a33b679d5581a8692988ec9f92ad2d6a2259eaa7', NULL, NULL, NULL, NULL, NULL, '', 0, 0, 1, NULL, NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `muc_applications`
--
ALTER TABLE `muc_applications`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `API` (`API`),
  ADD KEY `uid` (`uid`);

--
-- 表的索引 `muc_auth`
--
ALTER TABLE `muc_auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`) USING BTREE;

--
-- 表的索引 `muc_badwords`
--
ALTER TABLE `muc_badwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- 表的索引 `muc_config`
--
ALTER TABLE `muc_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `group` (`group`);

--
-- 表的索引 `muc_domains`
--
ALTER TABLE `muc_domains`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `muc_events`
--
ALTER TABLE `muc_events`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `appid` (`appid`),
  ADD KEY `dateline` (`dateline`);

--
-- 表的索引 `muc_friends`
--
ALTER TABLE `muc_friends`
  ADD PRIMARY KEY (`version`),
  ADD KEY `uid` (`uid`),
  ADD KEY `friendid` (`friendid`);

--
-- 表的索引 `muc_pm_group`
--
ALTER TABLE `muc_pm_group`
  ADD PRIMARY KEY (`pgid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `lid` (`plid`);

--
-- 表的索引 `muc_pm_lists`
--
ALTER TABLE `muc_pm_lists`
  ADD PRIMARY KEY (`plid`),
  ADD KEY `pmtype` (`pmtype`),
  ADD KEY `min_max` (`min_max`),
  ADD KEY `authorid` (`authorid`,`dateline`) USING BTREE,
  ADD KEY `pgid` (`pgid`);

--
-- 表的索引 `muc_pm_members`
--
ALTER TABLE `muc_pm_members`
  ADD PRIMARY KEY (`plid`,`uid`,`pgid`) USING BTREE,
  ADD KEY `pmnum` (`pmnum`),
  ADD KEY `lastupdate` (`lastupdate`,`uid`) USING BTREE,
  ADD KEY `lastdateline` (`lastdateline`,`uid`) USING BTREE;

--
-- 表的索引 `muc_users`
--
ALTER TABLE `muc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `auth_ids` (`auth_ids`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `muc_applications`
--
ALTER TABLE `muc_applications`
  MODIFY `appid` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '应用ID';

--
-- 使用表AUTO_INCREMENT `muc_auth`
--
ALTER TABLE `muc_auth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `muc_config`
--
ALTER TABLE `muc_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- 使用表AUTO_INCREMENT `muc_domains`
--
ALTER TABLE `muc_domains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '域名解析ID';

--
-- 使用表AUTO_INCREMENT `muc_events`
--
ALTER TABLE `muc_events`
  MODIFY `fid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '事件ID';

--
-- 使用表AUTO_INCREMENT `muc_friends`
--
ALTER TABLE `muc_friends`
  MODIFY `version` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '版本';

--
-- 使用表AUTO_INCREMENT `muc_pm_group`
--
ALTER TABLE `muc_pm_group`
  MODIFY `pgid` int(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '群聊ID';

--
-- 使用表AUTO_INCREMENT `muc_users`
--
ALTER TABLE `muc_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
