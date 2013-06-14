-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 14 日 11:07
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `apps`
--

-- --------------------------------------------------------

--
-- 表的结构 `oa_active`
--

CREATE TABLE IF NOT EXISTS `oa_active` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `title` varchar(255) NOT NULL COMMENT '活动名称',
  `info` text COMMENT '活动介绍',
  `pics` varchar(255) NOT NULL COMMENT '图片地址',
  `sort` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶：1为置顶，0不置顶',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '图片状态：0启用，-2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活动表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oa_apps`
--

CREATE TABLE IF NOT EXISTS `oa_apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公司id',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `info` text COMMENT '公司介绍',
  `logo` varchar(255) NOT NULL COMMENT '公司logo图片',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用',
  `time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='公司表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `oa_apps`
--

INSERT INTO `oa_apps` (`id`, `name`, `info`, `logo`, `status`, `time`) VALUES
(1, '1', 'weqeqwe', 'qeqweqw', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_case`
--

CREATE TABLE IF NOT EXISTS `oa_case` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `uid` int(10) unsigned NOT NULL COMMENT '案例所属人',
  `title` varchar(255) NOT NULL COMMENT '案例名称',
  `info` text COMMENT '案例介绍',
  `time` int(10) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常-2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='案例表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `oa_case`
--

INSERT INTO `oa_case` (`id`, `app_id`, `uid`, `title`, `info`, `time`, `status`) VALUES
(3, 1, 3, 'aaaaa', 'bbbbbb', 1371201678, 0),
(4, 1, 3, 'bbbbb', 'bbbb', 1371201979, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_case_pics`
--

CREATE TABLE IF NOT EXISTS `oa_case_pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司Id',
  `cid` int(10) unsigned NOT NULL COMMENT '项目id',
  `url` varchar(100) NOT NULL COMMENT '图片地址',
  `info` text NOT NULL COMMENT '图片说明',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常-2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='案例图片表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `oa_case_pics`
--

INSERT INTO `oa_case_pics` (`id`, `app_id`, `cid`, `url`, `info`, `status`) VALUES
(7, 1, 4, '20130614/51bae1bb4c003.jpg', '', 0),
(6, 1, 3, '20130614/51bae08edb665.jpg', '', 0),
(5, 1, 3, '20130614/51bae08eda55a.jpg', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_users`
--

CREATE TABLE IF NOT EXISTS `oa_users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `type` tinyint(2) unsigned NOT NULL COMMENT '用户类型:0管理员，1设计师，2普通用户',
  `account` varchar(64) NOT NULL COMMENT '账户',
  `nickname` varchar(50) NOT NULL COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0' COMMENT '登陆次数',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `introduce` text COMMENT '备注',
  `avatar` varchar(50) DEFAULT NULL COMMENT '用户头像',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常-2删除',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '性别：1为男，0为女',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `oa_users`
--

INSERT INTO `oa_users` (`id`, `app_id`, `type`, `account`, `nickname`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `email`, `introduce`, `avatar`, `create_time`, `update_time`, `status`, `sex`) VALUES
(1, 1, 0, 'admin1', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, NULL),
(2, 2, 0, 'admin2', '管理员2', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, NULL),
(3, 1, 1, 'shejishi1', '设计师1', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
