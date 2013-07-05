-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 05 日 15:00
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
-- 表的结构 `oa_area`
--

CREATE TABLE IF NOT EXISTS `oa_area` (
  `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `fid` smallint(10) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(2) NOT NULL COMMENT '等级',
  `name` varchar(50) NOT NULL COMMENT '读取名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='地区表' AUTO_INCREMENT=316 ;

--
-- 转存表中的数据 `oa_area`
--

INSERT INTO `oa_area` (`id`, `fid`, `level`, `name`) VALUES
(1, 0, 1, '上海'),
(2, 1, 2, '黄浦'),
(3, 1, 2, '卢湾'),
(4, 1, 2, '静安'),
(5, 1, 2, '徐汇'),
(6, 1, 2, '浦东'),
(7, 1, 2, '长宁'),
(8, 1, 2, '虹口'),
(9, 1, 2, '杨浦'),
(10, 1, 2, '普陀'),
(11, 1, 2, '闸北'),
(12, 1, 2, '闵行'),
(13, 1, 2, '宝山'),
(14, 1, 2, '嘉定'),
(15, 1, 2, '青浦'),
(16, 1, 2, '奉贤'),
(17, 1, 2, '南汇'),
(18, 1, 2, '崇明'),
(19, 1, 2, '金山'),
(20, 1, 2, '松江'),
(21, 1, 2, '上海周边'),
(22, 2, 3, '半淞园路'),
(23, 2, 3, '董家渡'),
(24, 2, 3, '黄浦周边'),
(25, 2, 3, '老西门'),
(26, 2, 3, '南京东路'),
(27, 2, 3, '南浦大桥'),
(28, 2, 3, '南外滩'),
(29, 2, 3, '蓬莱公园'),
(30, 2, 3, '人民广场'),
(31, 2, 3, '外滩/十六铺'),
(32, 2, 3, '西藏南路'),
(33, 2, 3, '斜桥'),
(34, 2, 3, '豫园'),
(35, 3, 3, '打浦桥'),
(36, 3, 3, '复兴公园'),
(37, 3, 3, '淮海公园'),
(38, 3, 3, '淮海中路'),
(39, 3, 3, '鲁班路'),
(40, 3, 3, '卢湾周边'),
(41, 3, 3, '瑞金二路'),
(42, 3, 3, '世博滨江'),
(43, 3, 3, '五里桥'),
(44, 3, 3, '新天地'),
(45, 3, 3, '中山南一路'),
(46, 4, 3, '北京西路'),
(47, 4, 3, '曹家渡'),
(48, 4, 3, '江宁路'),
(49, 4, 3, '静安寺'),
(50, 4, 3, '静安周边'),
(51, 4, 3, '南京西路'),
(52, 4, 3, '上海电视台'),
(53, 4, 3, '西康路'),
(54, 4, 3, '新闸路'),
(55, 4, 3, '玉佛寺'),
(56, 5, 3, '漕宝路地铁口'),
(57, 5, 3, '漕河泾'),
(58, 5, 3, '长桥'),
(59, 5, 3, '枫林路'),
(60, 5, 3, '复兴中路'),
(61, 5, 3, '衡山路'),
(62, 5, 3, '华东理工'),
(63, 5, 3, '淮海西路'),
(64, 5, 3, '华泾'),
(65, 5, 3, '湖南路'),
(66, 5, 3, '康建'),
(67, 5, 3, '凌云路'),
(68, 5, 3, '龙华'),
(69, 5, 3, '日晖新村'),
(70, 5, 3, '上海交大'),
(71, 5, 3, '上海南站'),
(72, 5, 3, '上海师大'),
(73, 5, 3, '上海图书馆'),
(74, 5, 3, '上海植物园'),
(75, 5, 3, '田林'),
(76, 5, 3, '万体馆'),
(77, 5, 3, '襄阳公园'),
(78, 5, 3, '斜土路'),
(79, 5, 3, '徐汇周边'),
(80, 5, 3, '徐家汇'),
(81, 5, 3, '肇嘉浜路'),
(82, 6, 3, '八佰伴'),
(83, 6, 3, '北蔡'),
(84, 6, 3, '碧云'),
(85, 6, 3, '曹路'),
(86, 6, 3, '昌里'),
(87, 6, 3, '川沙'),
(88, 6, 3, '东昌站地铁站'),
(89, 6, 3, '东方路地铁'),
(90, 6, 3, '东明路'),
(91, 6, 3, '高行'),
(92, 6, 3, '花木'),
(93, 6, 3, '金桥'),
(94, 6, 3, '金杨新村'),
(95, 6, 3, '联洋'),
(96, 6, 3, '临港新城'),
(97, 6, 3, '六里'),
(98, 6, 3, '龙阳路地铁站'),
(99, 6, 3, '陆家嘴'),
(100, 6, 3, '梅园'),
(101, 6, 3, '南码头'),
(102, 6, 3, '浦东周边'),
(103, 6, 3, '三林'),
(104, 6, 3, '上钢新村'),
(105, 6, 3, '上南'),
(106, 6, 3, '世博滨江'),
(107, 6, 3, '世纪公园'),
(108, 6, 3, '塘桥'),
(109, 6, 3, '唐镇'),
(110, 6, 3, '外高桥'),
(111, 6, 3, '潍坊新村'),
(112, 6, 3, '杨东'),
(113, 6, 3, '洋泾'),
(114, 6, 3, '御桥'),
(115, 6, 3, '张江'),
(116, 6, 3, '周家渡'),
(117, 6, 3, '竹园商贸区'),
(118, 7, 3, '北新泾'),
(119, 7, 3, '长宁周边'),
(120, 7, 3, '程家桥'),
(121, 7, 3, '地铁中山公园'),
(122, 7, 3, '动物园'),
(123, 7, 3, '古北'),
(124, 7, 3, '虹桥路'),
(125, 7, 3, '江苏路地铁'),
(126, 7, 3, '上海影城'),
(127, 7, 3, '天山路'),
(128, 7, 3, '仙霞'),
(129, 7, 3, '西郊公园'),
(130, 7, 3, '新华路'),
(131, 7, 3, '镇宁路'),
(132, 7, 3, '周家桥'),
(133, 8, 3, '北外滩'),
(134, 8, 3, '大柏树'),
(135, 8, 3, '海宁路'),
(136, 8, 3, '和平公园'),
(137, 8, 3, '虹口周边'),
(138, 8, 3, '虹口足球场'),
(139, 8, 3, '江湾'),
(140, 8, 3, '凉城'),
(141, 8, 3, '临平路'),
(142, 8, 3, '鲁迅公园'),
(143, 8, 3, '曲阳路'),
(144, 8, 3, '四川北路'),
(145, 8, 3, '四平路'),
(146, 8, 3, '提篮桥'),
(147, 8, 3, '周家嘴路'),
(148, 9, 3, '鞍山'),
(149, 9, 3, '长白新村'),
(150, 9, 3, '长阳路'),
(151, 9, 3, '东外滩'),
(152, 9, 3, '黄兴'),
(153, 9, 3, '江浦路'),
(154, 9, 3, '控江路'),
(155, 9, 3, '平凉路'),
(156, 9, 3, '五角场'),
(157, 9, 3, '新华医院'),
(158, 9, 3, '新江湾城'),
(159, 9, 3, '杨浦大桥'),
(160, 9, 3, '杨浦公园'),
(161, 9, 3, '杨浦周边'),
(162, 9, 3, '运光/复旦'),
(163, 9, 3, '中原'),
(164, 9, 3, '周家嘴路'),
(165, 10, 3, '曹杨'),
(166, 10, 3, '长风公园'),
(167, 10, 3, '长寿路'),
(168, 10, 3, '长征'),
(169, 10, 3, '甘泉路'),
(170, 10, 3, '光新'),
(171, 10, 3, '华东师大'),
(172, 10, 3, '建德花园'),
(173, 10, 3, '金沙江路'),
(174, 10, 3, '普陀周边'),
(175, 10, 3, '轻纺市场'),
(176, 10, 3, '桃浦'),
(177, 10, 3, '万里城'),
(178, 10, 3, '武宁路'),
(179, 10, 3, '宜川路'),
(180, 10, 3, '真光'),
(181, 10, 3, '真如'),
(182, 10, 3, '中远两湾城'),
(183, 11, 3, '宝山路'),
(184, 11, 3, '场中路'),
(185, 11, 3, '大宁路'),
(186, 11, 3, '共和新路'),
(187, 11, 3, '和田地区'),
(188, 11, 3, '老北站'),
(189, 11, 3, '彭浦'),
(190, 11, 3, '天目西路'),
(191, 11, 3, '汶水路'),
(192, 11, 3, '西藏北路'),
(193, 11, 3, '新客站'),
(194, 11, 3, '延长路'),
(195, 11, 3, '闸北公园'),
(196, 11, 3, '闸北周边'),
(197, 11, 3, '芷江西路'),
(198, 12, 3, '漕宝路'),
(199, 12, 3, '春申'),
(200, 12, 3, '东兰新村'),
(201, 12, 3, '古美罗阳'),
(202, 12, 3, '航华'),
(203, 12, 3, '虹梅路'),
(204, 12, 3, '虹桥'),
(205, 12, 3, '华漕'),
(206, 12, 3, '江川路'),
(207, 12, 3, '静安新城'),
(208, 12, 3, '金虹桥'),
(209, 12, 3, '老闵行'),
(210, 12, 3, '龙柏金汇'),
(211, 12, 3, '马桥'),
(212, 12, 3, '梅陇'),
(213, 12, 3, '闵行周边'),
(214, 12, 3, '南方商城'),
(215, 12, 3, '浦江'),
(216, 12, 3, '蔷薇新村'),
(217, 12, 3, '七宝'),
(218, 12, 3, '七莘路'),
(219, 12, 3, '莘庄'),
(220, 12, 3, '莘庄工业区'),
(221, 12, 3, '吴泾'),
(222, 12, 3, '颛桥'),
(223, 13, 3, '宝山周边'),
(224, 13, 3, '大场'),
(225, 13, 3, '大华路'),
(226, 13, 3, '东城区'),
(227, 13, 3, '高镜'),
(228, 13, 3, '共富新村'),
(229, 13, 3, '共康'),
(230, 13, 3, '顾村'),
(231, 13, 3, '锦秋花园'),
(232, 13, 3, '刘行'),
(233, 13, 3, '罗店'),
(234, 13, 3, '罗泾'),
(235, 13, 3, '上海大学'),
(236, 13, 3, '水产路'),
(237, 13, 3, '泗塘'),
(238, 13, 3, '淞宝'),
(239, 13, 3, '淞南'),
(240, 13, 3, '通河西城'),
(241, 13, 3, '通河新村'),
(242, 13, 3, '杨行'),
(243, 13, 3, '友谊路'),
(244, 13, 3, '月浦'),
(245, 13, 3, '张庙'),
(246, 14, 3, '安亭'),
(247, 14, 3, '封浜'),
(248, 14, 3, '丰庄'),
(249, 14, 3, '黄渡'),
(250, 14, 3, '嘉城'),
(251, 14, 3, '嘉定城区'),
(252, 14, 3, '嘉定周边'),
(253, 14, 3, '江桥新城'),
(254, 14, 3, '金鹤新城'),
(255, 14, 3, '菊园新区'),
(256, 14, 3, '马陆'),
(257, 14, 3, '南翔'),
(258, 14, 3, '真新'),
(259, 15, 3, '朱家角'),
(260, 15, 3, '赵巷'),
(261, 15, 3, '徐泾'),
(262, 15, 3, '重固'),
(263, 15, 3, '白鹤'),
(264, 15, 3, '青浦周边'),
(265, 15, 3, '青浦新城'),
(266, 15, 3, '青浦北部'),
(267, 16, 3, '金汇'),
(268, 16, 3, '南桥'),
(269, 16, 3, '庄行'),
(270, 16, 3, '奉城'),
(271, 16, 3, '柘林'),
(272, 16, 3, '海湾'),
(273, 16, 3, '海湾旅游区'),
(274, 16, 3, '奉贤周边'),
(275, 16, 3, '西渡'),
(276, 17, 3, '航头'),
(277, 17, 3, '合庆'),
(278, 17, 3, '惠南'),
(279, 17, 3, '康桥'),
(280, 17, 3, '芦潮港'),
(281, 17, 3, '南汇周边'),
(282, 17, 3, '泥城'),
(283, 17, 3, '新场'),
(284, 17, 3, '周浦'),
(285, 17, 3, '祝桥'),
(286, 18, 3, '城桥'),
(287, 18, 3, '堡镇'),
(288, 18, 3, '陈家'),
(289, 18, 3, '崇明周边'),
(290, 19, 3, '枫泾'),
(291, 19, 3, '朱泾'),
(292, 19, 3, '亭林'),
(293, 19, 3, '漕泾'),
(294, 19, 3, '金山新城'),
(295, 19, 3, '金山周边'),
(296, 19, 3, '金山中部'),
(297, 20, 3, '车墩'),
(298, 20, 3, '洞泾'),
(299, 20, 3, '方松'),
(300, 20, 3, '九亭'),
(301, 20, 3, '莘闵'),
(302, 20, 3, '佘山'),
(303, 20, 3, '泗泾'),
(304, 20, 3, '松江大学城'),
(305, 20, 3, '松江工业区'),
(306, 20, 3, '松江科技园'),
(307, 20, 3, '松江老城'),
(308, 20, 3, '松江新城'),
(309, 20, 3, '松江周边'),
(310, 20, 3, '新浜'),
(311, 20, 3, '新桥'),
(312, 20, 3, '叶榭'),
(313, 20, 3, '永丰'),
(314, 20, 3, '岳阳'),
(315, 20, 3, '中山');

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
