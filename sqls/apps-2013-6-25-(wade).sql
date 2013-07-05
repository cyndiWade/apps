-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 05 日 15:08
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
-- 表的结构 `oa_apps`
--

CREATE TABLE IF NOT EXISTS `oa_apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公司id',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `info` text COMMENT '公司介绍',
  `logo` varchar(255) NOT NULL COMMENT '公司logo图片',
  `phone` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用',
  `time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公司表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `oa_apps`
--

INSERT INTO `oa_apps` (`id`, `name`, `info`, `logo`, `phone`, `contact`, `status`, `time`) VALUES
(1, 'aaaa', 'weqeqwe', '20130705/51d6b977b8e2d.jpg', '222', '11', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_subcompanys`
--

CREATE TABLE IF NOT EXISTS `oa_subcompanys` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `area` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `site` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `opentime` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `oa_subcompanys`
--

INSERT INTO `oa_subcompanys` (`id`, `app_id`, `name`, `area`, `address`, `site`, `phone`, `opentime`, `status`, `time`) VALUES
(1, 1, 'aaaa', '7,124', 'bbbb', '上海', '1234567891', '上午', 0, 0),
(2, 1, 'bbbbbb', '2,25', 'bbbbb', 'babab', 'ababa', 'bab', 0, 0),
(3, 1, 'aaaaa', '9,156', 'fsdfsdf', 'sdfsdf', 'sfs', 'fsfsdfa', 0, 1373035523);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
