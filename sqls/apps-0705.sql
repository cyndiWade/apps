-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 07 月 05 日 07:27
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `apps`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_apps`
-- 

CREATE TABLE `oa_apps` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '公司id',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `info` text COMMENT '公司介绍',
  `logo` varchar(255) NOT NULL COMMENT '公司logo图片',
  `phone` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL default '0' COMMENT '0启用',
  `time` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公司表' AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `oa_apps`
-- 

INSERT INTO `oa_apps` VALUES (1, '坑爹啊', '什么东西啊', '', '', '', 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_subcompanys`
-- 

CREATE TABLE `oa_subcompanys` (
  `id` int(10) NOT NULL auto_increment,
  `appid` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `opentime` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `oa_subcompanys`
-- 

