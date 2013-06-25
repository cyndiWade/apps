-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 25 日 09:44
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oa_active`
--

INSERT INTO `oa_active` (`id`, `app_id`, `title`, `info`, `pics`, `sort`, `time`, `status`) VALUES
(1, 1, 'aaaaaaaa', 'aaaaaaa', '20130619/51c16296a1b62.jpg', 1, 1371456619, 0),
(2, 1, 'bbbbb', 'bbbbb', '20130619/51c162a7bf7ee.jpg', 1, 1371456642, 0);

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
  `style` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='案例表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `oa_case`
--

INSERT INTO `oa_case` (`id`, `app_id`, `uid`, `title`, `info`, `time`, `status`, `style`, `type`) VALUES
(3, 1, 3, 'aaaaa', 'bbbbbb', 1371201678, -2, 0, 0),
(4, 1, 8, 'bbbbb', 'bbbb', 1371201979, 0, 0, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='案例图片表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oa_comment`
--

CREATE TABLE IF NOT EXISTS `oa_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `tid` int(10) unsigned NOT NULL COMMENT '评论所属主题id',
  `uid` int(10) unsigned NOT NULL COMMENT '评论人',
  `content` text COMMENT '评论内容',
  `voice` int(10) unsigned DEFAULT NULL COMMENT '评论声音id',
  `time` int(10) unsigned NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `oa_comment`
--

INSERT INTO `oa_comment` (`id`, `app_id`, `tid`, `uid`, `content`, `voice`, `time`) VALUES
(9, 1, 2, 1, 'zzzzzzzzzzz', 1, 0),
(10, 1, 2, 1, 'bbbbbb', 2, 0),
(11, 1, 3, 1, 'qqqqqqq', 3, 0),
(12, 1, 3, 1, 'wwwwww', 4, 0),
(13, 1, 4, 1, 'rrrrrrr', 5, 0),
(14, 1, 4, 1, 'ttttttt', 6, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_dynamic`
--

CREATE TABLE IF NOT EXISTS `oa_dynamic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
  `msg` varchar(255) NOT NULL COMMENT '消息',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '链接id',
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1已读',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oa_file`
--

CREATE TABLE IF NOT EXISTS `oa_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `type` tinyint(1) NOT NULL COMMENT '文件类型：1图片、2声音',
  `thumbs` text COMMENT '缩略图类型：，号分割',
  `size` varchar(30) NOT NULL COMMENT '字节大小',
  `url` varchar(50) NOT NULL COMMENT '文件地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `oa_file`
--

INSERT INTO `oa_file` (`id`, `type`, `thumbs`, `size`, `url`) VALUES
(1, 2, NULL, '49820', '20130619/51c1642594860.aac'),
(2, 2, NULL, '49820', '20130619/51c1642594860.aac'),
(3, 2, NULL, '49820', '20130619/51c1642594860.aac'),
(4, 2, NULL, '49820', '20130619/51c1642594860.aac'),
(5, 1, NULL, '285771', '20130619/51c162a7bf7ee.jpg'),
(6, 2, NULL, '45336', '20130619/51c1642594860.aac');

-- --------------------------------------------------------

--
-- 表的结构 `oa_project`
--

CREATE TABLE IF NOT EXISTS `oa_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL COMMENT '项目名称',
  `province` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '省',
  `city` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '市',
  `region` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '区',
  `area` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '面积',
  `style` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '风格',
  `budget` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '预算',
  `community` varchar(50) NOT NULL COMMENT '小区',
  `road` varchar(60) NOT NULL COMMENT '路',
  `number` varchar(10) NOT NULL COMMENT '几号',
  `touid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '设计师uid',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `oa_project`
--

INSERT INTO `oa_project` (`id`, `app_id`, `name`, `province`, `city`, `region`, `area`, `style`, `budget`, `community`, `road`, `number`, `touid`, `status`, `time`) VALUES
(1, 1, '测试项目11', 123, 456, 789, 100, 1, 1000, 'xxxxx小区', 'XXXX路', 'xxx号', 9, 0, 0),
(2, 1, '测试项目2', 123, 456, 789, 100, 1, 1000, 'xxxxx小区', 'XXXX路', 'xxx号', 10, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_session`
--

CREATE TABLE IF NOT EXISTS `oa_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `key` char(32) NOT NULL COMMENT '加密串',
  `expire` int(10) NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`),
  KEY `key` (`key`),
  KEY `key_2` (`key`),
  KEY `key_3` (`key`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='session表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `oa_topic`
--

CREATE TABLE IF NOT EXISTS `oa_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '主题类型：1为拍拍说，2为项目',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属项目',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `phase` tinyint(2) unsigned DEFAULT NULL COMMENT '阶段',
  `content` text COMMENT '主题内容',
  `voice` int(10) DEFAULT NULL COMMENT '声音地址id',
  `pic` int(10) DEFAULT NULL COMMENT '图片地址id',
  `time` int(10) NOT NULL COMMENT '发送时间',
  `new_comids` varchar(50) DEFAULT NULL COMMENT '最新3条评论id',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态（0显示，-2删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='主题' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `oa_topic`
--

INSERT INTO `oa_topic` (`id`, `app_id`, `type`, `pid`, `user_id`, `phase`, `content`, `voice`, `pic`, `time`, `new_comids`, `num`, `status`) VALUES
(2, 1, 1, 0, 1, NULL, 'helloWorld', 6, 5, 1371628581, '10,9', 2, 0),
(3, 1, 1, 0, 1, NULL, 'helloWorld', 6, 5, 1371628581, '12,11', 2, 0),
(4, 1, 1, 0, 1, NULL, 'helloWorld', 6, 5, 1371628581, '14,13', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_users`
--

CREATE TABLE IF NOT EXISTS `oa_users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `type` tinyint(2) unsigned NOT NULL COMMENT '用户类型:0管理员，1设计师，2普通用户,3项目经理',
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
  KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `oa_users`
--

INSERT INTO `oa_users` (`id`, `app_id`, `type`, `account`, `nickname`, `password`, `last_login_time`, `last_login_ip`, `login_count`, `email`, `introduce`, `avatar`, `create_time`, `update_time`, `status`, `sex`) VALUES
(1, 1, 0, 'admin1', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1371695572, '192.168.1.116', 11, NULL, NULL, '20130619/51c162a7bf7ee.jpg', 0, 0, 0, NULL),
(2, 2, 0, 'admin2', '管理员2', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, NULL, 0, 0, 0, NULL),
(3, 1, 1, 'shejishi1', '设计师1', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, NULL, 0, 0, 0, NULL),
(4, 1, 2, 'aaaa', 'ccc', 'bbb', 0, '127.0.0.1', 0, NULL, 'sdasdasd', NULL, 1371374608, 0, 0, NULL),
(5, 1, 2, 'bbb', '123123', 'a21075a36eeddd084e17611a238c7101', 0, '127.0.0.1', 0, NULL, 'sdfsdff', '20130616/51bd867abd3eb.jpg', 1371375226, 0, 0, NULL),
(6, 1, 2, 'cccc', '123123123', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 0, '127.0.0.1', 0, NULL, 'qweqweaaa', '20130616/51bd8c3c2a673.jpg', 1371376700, 0, 0, NULL),
(7, 1, 2, 'dddd', 'dfdsfsdf', '11ddbaf3386aea1f2974eee984542152', 0, '127.0.0.1', 0, NULL, '', NULL, 1371375861, 0, 0, NULL),
(8, 1, 1, 'shejishi2', '设计师2', 'e10adc3949ba59abbe56e057f20f883e', 0, '127.0.0.1', 0, NULL, 'aaaa', '20130625/51c95812858d7.jpg', 1372149778, 0, 0, NULL),
(9, 1, 3, 'project1', '项目经理1', 'e10adc3949ba59abbe56e057f20f883e', 0, '127.0.0.1', 0, NULL, 'aaaa', '20130625/51c95812858d7.jpg', 1372149778, 0, 0, NULL),
(10, 1, 3, 'project2', '项目经理2', 'e10adc3949ba59abbe56e057f20f883e', 0, '127.0.0.1', 0, NULL, 'aaaa', '20130625/51c95812858d7.jpg', 1372149778, 0, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
