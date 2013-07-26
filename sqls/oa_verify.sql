-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 07 月 26 日 02:52
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `apps`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_verify`
-- 

CREATE TABLE `oa_verify` (
  `id` int(10) NOT NULL auto_increment,
  `telephone` varchar(11) NOT NULL COMMENT '手机',
  `verify` varchar(6) NOT NULL COMMENT '验证码',
  `expired` int(10) unsigned NOT NULL default '0' COMMENT '过期时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0可用，1已使用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
