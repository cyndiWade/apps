-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 07 月 11 日 07:43
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `apps`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_active`
-- 

CREATE TABLE `oa_active` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `title` varchar(255) NOT NULL COMMENT '活动名称',
  `info` text COMMENT '活动介绍',
  `pics` varchar(255) NOT NULL COMMENT '图片地址',
  `sort` tinyint(1) NOT NULL default '0' COMMENT '置顶：1为置顶，0不置顶',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '图片状态：0启用，-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='活动表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `oa_active`
-- 

INSERT INTO `oa_active` VALUES (1, 1, 'aaaaaaaa', 'aaaaaaa', '20130708/51da8681940c6.jpg', 1, 1371456619, 0);
INSERT INTO `oa_active` VALUES (2, 1, 'bbbbb', 'bbbbb', '20130708/51da86a031138.jpg', 1, 1371456642, 0);

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

INSERT INTO `oa_apps` VALUES (1, 'aaaa', 'weqeqwe', '20130708/51da3439cf748.jpg', '222', '11', 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_area`
-- 

CREATE TABLE `oa_area` (
  `id` smallint(10) unsigned NOT NULL auto_increment COMMENT 'id',
  `fid` smallint(10) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(2) NOT NULL COMMENT '等级',
  `name` varchar(50) NOT NULL COMMENT '读取名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='地区表' AUTO_INCREMENT=316 ;

-- 
-- 导出表中的数据 `oa_area`
-- 

INSERT INTO `oa_area` VALUES (1, 0, 1, '上海');
INSERT INTO `oa_area` VALUES (2, 1, 2, '黄浦');
INSERT INTO `oa_area` VALUES (3, 1, 2, '卢湾');
INSERT INTO `oa_area` VALUES (4, 1, 2, '静安');
INSERT INTO `oa_area` VALUES (5, 1, 2, '徐汇');
INSERT INTO `oa_area` VALUES (6, 1, 2, '浦东');
INSERT INTO `oa_area` VALUES (7, 1, 2, '长宁');
INSERT INTO `oa_area` VALUES (8, 1, 2, '虹口');
INSERT INTO `oa_area` VALUES (9, 1, 2, '杨浦');
INSERT INTO `oa_area` VALUES (10, 1, 2, '普陀');
INSERT INTO `oa_area` VALUES (11, 1, 2, '闸北');
INSERT INTO `oa_area` VALUES (12, 1, 2, '闵行');
INSERT INTO `oa_area` VALUES (13, 1, 2, '宝山');
INSERT INTO `oa_area` VALUES (14, 1, 2, '嘉定');
INSERT INTO `oa_area` VALUES (15, 1, 2, '青浦');
INSERT INTO `oa_area` VALUES (16, 1, 2, '奉贤');
INSERT INTO `oa_area` VALUES (17, 1, 2, '南汇');
INSERT INTO `oa_area` VALUES (18, 1, 2, '崇明');
INSERT INTO `oa_area` VALUES (19, 1, 2, '金山');
INSERT INTO `oa_area` VALUES (20, 1, 2, '松江');
INSERT INTO `oa_area` VALUES (21, 1, 2, '上海周边');
INSERT INTO `oa_area` VALUES (22, 2, 3, '半淞园路');
INSERT INTO `oa_area` VALUES (23, 2, 3, '董家渡');
INSERT INTO `oa_area` VALUES (24, 2, 3, '黄浦周边');
INSERT INTO `oa_area` VALUES (25, 2, 3, '老西门');
INSERT INTO `oa_area` VALUES (26, 2, 3, '南京东路');
INSERT INTO `oa_area` VALUES (27, 2, 3, '南浦大桥');
INSERT INTO `oa_area` VALUES (28, 2, 3, '南外滩');
INSERT INTO `oa_area` VALUES (29, 2, 3, '蓬莱公园');
INSERT INTO `oa_area` VALUES (30, 2, 3, '人民广场');
INSERT INTO `oa_area` VALUES (31, 2, 3, '外滩/十六铺');
INSERT INTO `oa_area` VALUES (32, 2, 3, '西藏南路');
INSERT INTO `oa_area` VALUES (33, 2, 3, '斜桥');
INSERT INTO `oa_area` VALUES (34, 2, 3, '豫园');
INSERT INTO `oa_area` VALUES (35, 3, 3, '打浦桥');
INSERT INTO `oa_area` VALUES (36, 3, 3, '复兴公园');
INSERT INTO `oa_area` VALUES (37, 3, 3, '淮海公园');
INSERT INTO `oa_area` VALUES (38, 3, 3, '淮海中路');
INSERT INTO `oa_area` VALUES (39, 3, 3, '鲁班路');
INSERT INTO `oa_area` VALUES (40, 3, 3, '卢湾周边');
INSERT INTO `oa_area` VALUES (41, 3, 3, '瑞金二路');
INSERT INTO `oa_area` VALUES (42, 3, 3, '世博滨江');
INSERT INTO `oa_area` VALUES (43, 3, 3, '五里桥');
INSERT INTO `oa_area` VALUES (44, 3, 3, '新天地');
INSERT INTO `oa_area` VALUES (45, 3, 3, '中山南一路');
INSERT INTO `oa_area` VALUES (46, 4, 3, '北京西路');
INSERT INTO `oa_area` VALUES (47, 4, 3, '曹家渡');
INSERT INTO `oa_area` VALUES (48, 4, 3, '江宁路');
INSERT INTO `oa_area` VALUES (49, 4, 3, '静安寺');
INSERT INTO `oa_area` VALUES (50, 4, 3, '静安周边');
INSERT INTO `oa_area` VALUES (51, 4, 3, '南京西路');
INSERT INTO `oa_area` VALUES (52, 4, 3, '上海电视台');
INSERT INTO `oa_area` VALUES (53, 4, 3, '西康路');
INSERT INTO `oa_area` VALUES (54, 4, 3, '新闸路');
INSERT INTO `oa_area` VALUES (55, 4, 3, '玉佛寺');
INSERT INTO `oa_area` VALUES (56, 5, 3, '漕宝路地铁口');
INSERT INTO `oa_area` VALUES (57, 5, 3, '漕河泾');
INSERT INTO `oa_area` VALUES (58, 5, 3, '长桥');
INSERT INTO `oa_area` VALUES (59, 5, 3, '枫林路');
INSERT INTO `oa_area` VALUES (60, 5, 3, '复兴中路');
INSERT INTO `oa_area` VALUES (61, 5, 3, '衡山路');
INSERT INTO `oa_area` VALUES (62, 5, 3, '华东理工');
INSERT INTO `oa_area` VALUES (63, 5, 3, '淮海西路');
INSERT INTO `oa_area` VALUES (64, 5, 3, '华泾');
INSERT INTO `oa_area` VALUES (65, 5, 3, '湖南路');
INSERT INTO `oa_area` VALUES (66, 5, 3, '康建');
INSERT INTO `oa_area` VALUES (67, 5, 3, '凌云路');
INSERT INTO `oa_area` VALUES (68, 5, 3, '龙华');
INSERT INTO `oa_area` VALUES (69, 5, 3, '日晖新村');
INSERT INTO `oa_area` VALUES (70, 5, 3, '上海交大');
INSERT INTO `oa_area` VALUES (71, 5, 3, '上海南站');
INSERT INTO `oa_area` VALUES (72, 5, 3, '上海师大');
INSERT INTO `oa_area` VALUES (73, 5, 3, '上海图书馆');
INSERT INTO `oa_area` VALUES (74, 5, 3, '上海植物园');
INSERT INTO `oa_area` VALUES (75, 5, 3, '田林');
INSERT INTO `oa_area` VALUES (76, 5, 3, '万体馆');
INSERT INTO `oa_area` VALUES (77, 5, 3, '襄阳公园');
INSERT INTO `oa_area` VALUES (78, 5, 3, '斜土路');
INSERT INTO `oa_area` VALUES (79, 5, 3, '徐汇周边');
INSERT INTO `oa_area` VALUES (80, 5, 3, '徐家汇');
INSERT INTO `oa_area` VALUES (81, 5, 3, '肇嘉浜路');
INSERT INTO `oa_area` VALUES (82, 6, 3, '八佰伴');
INSERT INTO `oa_area` VALUES (83, 6, 3, '北蔡');
INSERT INTO `oa_area` VALUES (84, 6, 3, '碧云');
INSERT INTO `oa_area` VALUES (85, 6, 3, '曹路');
INSERT INTO `oa_area` VALUES (86, 6, 3, '昌里');
INSERT INTO `oa_area` VALUES (87, 6, 3, '川沙');
INSERT INTO `oa_area` VALUES (88, 6, 3, '东昌站地铁站');
INSERT INTO `oa_area` VALUES (89, 6, 3, '东方路地铁');
INSERT INTO `oa_area` VALUES (90, 6, 3, '东明路');
INSERT INTO `oa_area` VALUES (91, 6, 3, '高行');
INSERT INTO `oa_area` VALUES (92, 6, 3, '花木');
INSERT INTO `oa_area` VALUES (93, 6, 3, '金桥');
INSERT INTO `oa_area` VALUES (94, 6, 3, '金杨新村');
INSERT INTO `oa_area` VALUES (95, 6, 3, '联洋');
INSERT INTO `oa_area` VALUES (96, 6, 3, '临港新城');
INSERT INTO `oa_area` VALUES (97, 6, 3, '六里');
INSERT INTO `oa_area` VALUES (98, 6, 3, '龙阳路地铁站');
INSERT INTO `oa_area` VALUES (99, 6, 3, '陆家嘴');
INSERT INTO `oa_area` VALUES (100, 6, 3, '梅园');
INSERT INTO `oa_area` VALUES (101, 6, 3, '南码头');
INSERT INTO `oa_area` VALUES (102, 6, 3, '浦东周边');
INSERT INTO `oa_area` VALUES (103, 6, 3, '三林');
INSERT INTO `oa_area` VALUES (104, 6, 3, '上钢新村');
INSERT INTO `oa_area` VALUES (105, 6, 3, '上南');
INSERT INTO `oa_area` VALUES (106, 6, 3, '世博滨江');
INSERT INTO `oa_area` VALUES (107, 6, 3, '世纪公园');
INSERT INTO `oa_area` VALUES (108, 6, 3, '塘桥');
INSERT INTO `oa_area` VALUES (109, 6, 3, '唐镇');
INSERT INTO `oa_area` VALUES (110, 6, 3, '外高桥');
INSERT INTO `oa_area` VALUES (111, 6, 3, '潍坊新村');
INSERT INTO `oa_area` VALUES (112, 6, 3, '杨东');
INSERT INTO `oa_area` VALUES (113, 6, 3, '洋泾');
INSERT INTO `oa_area` VALUES (114, 6, 3, '御桥');
INSERT INTO `oa_area` VALUES (115, 6, 3, '张江');
INSERT INTO `oa_area` VALUES (116, 6, 3, '周家渡');
INSERT INTO `oa_area` VALUES (117, 6, 3, '竹园商贸区');
INSERT INTO `oa_area` VALUES (118, 7, 3, '北新泾');
INSERT INTO `oa_area` VALUES (119, 7, 3, '长宁周边');
INSERT INTO `oa_area` VALUES (120, 7, 3, '程家桥');
INSERT INTO `oa_area` VALUES (121, 7, 3, '地铁中山公园');
INSERT INTO `oa_area` VALUES (122, 7, 3, '动物园');
INSERT INTO `oa_area` VALUES (123, 7, 3, '古北');
INSERT INTO `oa_area` VALUES (124, 7, 3, '虹桥路');
INSERT INTO `oa_area` VALUES (125, 7, 3, '江苏路地铁');
INSERT INTO `oa_area` VALUES (126, 7, 3, '上海影城');
INSERT INTO `oa_area` VALUES (127, 7, 3, '天山路');
INSERT INTO `oa_area` VALUES (128, 7, 3, '仙霞');
INSERT INTO `oa_area` VALUES (129, 7, 3, '西郊公园');
INSERT INTO `oa_area` VALUES (130, 7, 3, '新华路');
INSERT INTO `oa_area` VALUES (131, 7, 3, '镇宁路');
INSERT INTO `oa_area` VALUES (132, 7, 3, '周家桥');
INSERT INTO `oa_area` VALUES (133, 8, 3, '北外滩');
INSERT INTO `oa_area` VALUES (134, 8, 3, '大柏树');
INSERT INTO `oa_area` VALUES (135, 8, 3, '海宁路');
INSERT INTO `oa_area` VALUES (136, 8, 3, '和平公园');
INSERT INTO `oa_area` VALUES (137, 8, 3, '虹口周边');
INSERT INTO `oa_area` VALUES (138, 8, 3, '虹口足球场');
INSERT INTO `oa_area` VALUES (139, 8, 3, '江湾');
INSERT INTO `oa_area` VALUES (140, 8, 3, '凉城');
INSERT INTO `oa_area` VALUES (141, 8, 3, '临平路');
INSERT INTO `oa_area` VALUES (142, 8, 3, '鲁迅公园');
INSERT INTO `oa_area` VALUES (143, 8, 3, '曲阳路');
INSERT INTO `oa_area` VALUES (144, 8, 3, '四川北路');
INSERT INTO `oa_area` VALUES (145, 8, 3, '四平路');
INSERT INTO `oa_area` VALUES (146, 8, 3, '提篮桥');
INSERT INTO `oa_area` VALUES (147, 8, 3, '周家嘴路');
INSERT INTO `oa_area` VALUES (148, 9, 3, '鞍山');
INSERT INTO `oa_area` VALUES (149, 9, 3, '长白新村');
INSERT INTO `oa_area` VALUES (150, 9, 3, '长阳路');
INSERT INTO `oa_area` VALUES (151, 9, 3, '东外滩');
INSERT INTO `oa_area` VALUES (152, 9, 3, '黄兴');
INSERT INTO `oa_area` VALUES (153, 9, 3, '江浦路');
INSERT INTO `oa_area` VALUES (154, 9, 3, '控江路');
INSERT INTO `oa_area` VALUES (155, 9, 3, '平凉路');
INSERT INTO `oa_area` VALUES (156, 9, 3, '五角场');
INSERT INTO `oa_area` VALUES (157, 9, 3, '新华医院');
INSERT INTO `oa_area` VALUES (158, 9, 3, '新江湾城');
INSERT INTO `oa_area` VALUES (159, 9, 3, '杨浦大桥');
INSERT INTO `oa_area` VALUES (160, 9, 3, '杨浦公园');
INSERT INTO `oa_area` VALUES (161, 9, 3, '杨浦周边');
INSERT INTO `oa_area` VALUES (162, 9, 3, '运光/复旦');
INSERT INTO `oa_area` VALUES (163, 9, 3, '中原');
INSERT INTO `oa_area` VALUES (164, 9, 3, '周家嘴路');
INSERT INTO `oa_area` VALUES (165, 10, 3, '曹杨');
INSERT INTO `oa_area` VALUES (166, 10, 3, '长风公园');
INSERT INTO `oa_area` VALUES (167, 10, 3, '长寿路');
INSERT INTO `oa_area` VALUES (168, 10, 3, '长征');
INSERT INTO `oa_area` VALUES (169, 10, 3, '甘泉路');
INSERT INTO `oa_area` VALUES (170, 10, 3, '光新');
INSERT INTO `oa_area` VALUES (171, 10, 3, '华东师大');
INSERT INTO `oa_area` VALUES (172, 10, 3, '建德花园');
INSERT INTO `oa_area` VALUES (173, 10, 3, '金沙江路');
INSERT INTO `oa_area` VALUES (174, 10, 3, '普陀周边');
INSERT INTO `oa_area` VALUES (175, 10, 3, '轻纺市场');
INSERT INTO `oa_area` VALUES (176, 10, 3, '桃浦');
INSERT INTO `oa_area` VALUES (177, 10, 3, '万里城');
INSERT INTO `oa_area` VALUES (178, 10, 3, '武宁路');
INSERT INTO `oa_area` VALUES (179, 10, 3, '宜川路');
INSERT INTO `oa_area` VALUES (180, 10, 3, '真光');
INSERT INTO `oa_area` VALUES (181, 10, 3, '真如');
INSERT INTO `oa_area` VALUES (182, 10, 3, '中远两湾城');
INSERT INTO `oa_area` VALUES (183, 11, 3, '宝山路');
INSERT INTO `oa_area` VALUES (184, 11, 3, '场中路');
INSERT INTO `oa_area` VALUES (185, 11, 3, '大宁路');
INSERT INTO `oa_area` VALUES (186, 11, 3, '共和新路');
INSERT INTO `oa_area` VALUES (187, 11, 3, '和田地区');
INSERT INTO `oa_area` VALUES (188, 11, 3, '老北站');
INSERT INTO `oa_area` VALUES (189, 11, 3, '彭浦');
INSERT INTO `oa_area` VALUES (190, 11, 3, '天目西路');
INSERT INTO `oa_area` VALUES (191, 11, 3, '汶水路');
INSERT INTO `oa_area` VALUES (192, 11, 3, '西藏北路');
INSERT INTO `oa_area` VALUES (193, 11, 3, '新客站');
INSERT INTO `oa_area` VALUES (194, 11, 3, '延长路');
INSERT INTO `oa_area` VALUES (195, 11, 3, '闸北公园');
INSERT INTO `oa_area` VALUES (196, 11, 3, '闸北周边');
INSERT INTO `oa_area` VALUES (197, 11, 3, '芷江西路');
INSERT INTO `oa_area` VALUES (198, 12, 3, '漕宝路');
INSERT INTO `oa_area` VALUES (199, 12, 3, '春申');
INSERT INTO `oa_area` VALUES (200, 12, 3, '东兰新村');
INSERT INTO `oa_area` VALUES (201, 12, 3, '古美罗阳');
INSERT INTO `oa_area` VALUES (202, 12, 3, '航华');
INSERT INTO `oa_area` VALUES (203, 12, 3, '虹梅路');
INSERT INTO `oa_area` VALUES (204, 12, 3, '虹桥');
INSERT INTO `oa_area` VALUES (205, 12, 3, '华漕');
INSERT INTO `oa_area` VALUES (206, 12, 3, '江川路');
INSERT INTO `oa_area` VALUES (207, 12, 3, '静安新城');
INSERT INTO `oa_area` VALUES (208, 12, 3, '金虹桥');
INSERT INTO `oa_area` VALUES (209, 12, 3, '老闵行');
INSERT INTO `oa_area` VALUES (210, 12, 3, '龙柏金汇');
INSERT INTO `oa_area` VALUES (211, 12, 3, '马桥');
INSERT INTO `oa_area` VALUES (212, 12, 3, '梅陇');
INSERT INTO `oa_area` VALUES (213, 12, 3, '闵行周边');
INSERT INTO `oa_area` VALUES (214, 12, 3, '南方商城');
INSERT INTO `oa_area` VALUES (215, 12, 3, '浦江');
INSERT INTO `oa_area` VALUES (216, 12, 3, '蔷薇新村');
INSERT INTO `oa_area` VALUES (217, 12, 3, '七宝');
INSERT INTO `oa_area` VALUES (218, 12, 3, '七莘路');
INSERT INTO `oa_area` VALUES (219, 12, 3, '莘庄');
INSERT INTO `oa_area` VALUES (220, 12, 3, '莘庄工业区');
INSERT INTO `oa_area` VALUES (221, 12, 3, '吴泾');
INSERT INTO `oa_area` VALUES (222, 12, 3, '颛桥');
INSERT INTO `oa_area` VALUES (223, 13, 3, '宝山周边');
INSERT INTO `oa_area` VALUES (224, 13, 3, '大场');
INSERT INTO `oa_area` VALUES (225, 13, 3, '大华路');
INSERT INTO `oa_area` VALUES (226, 13, 3, '东城区');
INSERT INTO `oa_area` VALUES (227, 13, 3, '高镜');
INSERT INTO `oa_area` VALUES (228, 13, 3, '共富新村');
INSERT INTO `oa_area` VALUES (229, 13, 3, '共康');
INSERT INTO `oa_area` VALUES (230, 13, 3, '顾村');
INSERT INTO `oa_area` VALUES (231, 13, 3, '锦秋花园');
INSERT INTO `oa_area` VALUES (232, 13, 3, '刘行');
INSERT INTO `oa_area` VALUES (233, 13, 3, '罗店');
INSERT INTO `oa_area` VALUES (234, 13, 3, '罗泾');
INSERT INTO `oa_area` VALUES (235, 13, 3, '上海大学');
INSERT INTO `oa_area` VALUES (236, 13, 3, '水产路');
INSERT INTO `oa_area` VALUES (237, 13, 3, '泗塘');
INSERT INTO `oa_area` VALUES (238, 13, 3, '淞宝');
INSERT INTO `oa_area` VALUES (239, 13, 3, '淞南');
INSERT INTO `oa_area` VALUES (240, 13, 3, '通河西城');
INSERT INTO `oa_area` VALUES (241, 13, 3, '通河新村');
INSERT INTO `oa_area` VALUES (242, 13, 3, '杨行');
INSERT INTO `oa_area` VALUES (243, 13, 3, '友谊路');
INSERT INTO `oa_area` VALUES (244, 13, 3, '月浦');
INSERT INTO `oa_area` VALUES (245, 13, 3, '张庙');
INSERT INTO `oa_area` VALUES (246, 14, 3, '安亭');
INSERT INTO `oa_area` VALUES (247, 14, 3, '封浜');
INSERT INTO `oa_area` VALUES (248, 14, 3, '丰庄');
INSERT INTO `oa_area` VALUES (249, 14, 3, '黄渡');
INSERT INTO `oa_area` VALUES (250, 14, 3, '嘉城');
INSERT INTO `oa_area` VALUES (251, 14, 3, '嘉定城区');
INSERT INTO `oa_area` VALUES (252, 14, 3, '嘉定周边');
INSERT INTO `oa_area` VALUES (253, 14, 3, '江桥新城');
INSERT INTO `oa_area` VALUES (254, 14, 3, '金鹤新城');
INSERT INTO `oa_area` VALUES (255, 14, 3, '菊园新区');
INSERT INTO `oa_area` VALUES (256, 14, 3, '马陆');
INSERT INTO `oa_area` VALUES (257, 14, 3, '南翔');
INSERT INTO `oa_area` VALUES (258, 14, 3, '真新');
INSERT INTO `oa_area` VALUES (259, 15, 3, '朱家角');
INSERT INTO `oa_area` VALUES (260, 15, 3, '赵巷');
INSERT INTO `oa_area` VALUES (261, 15, 3, '徐泾');
INSERT INTO `oa_area` VALUES (262, 15, 3, '重固');
INSERT INTO `oa_area` VALUES (263, 15, 3, '白鹤');
INSERT INTO `oa_area` VALUES (264, 15, 3, '青浦周边');
INSERT INTO `oa_area` VALUES (265, 15, 3, '青浦新城');
INSERT INTO `oa_area` VALUES (266, 15, 3, '青浦北部');
INSERT INTO `oa_area` VALUES (267, 16, 3, '金汇');
INSERT INTO `oa_area` VALUES (268, 16, 3, '南桥');
INSERT INTO `oa_area` VALUES (269, 16, 3, '庄行');
INSERT INTO `oa_area` VALUES (270, 16, 3, '奉城');
INSERT INTO `oa_area` VALUES (271, 16, 3, '柘林');
INSERT INTO `oa_area` VALUES (272, 16, 3, '海湾');
INSERT INTO `oa_area` VALUES (273, 16, 3, '海湾旅游区');
INSERT INTO `oa_area` VALUES (274, 16, 3, '奉贤周边');
INSERT INTO `oa_area` VALUES (275, 16, 3, '西渡');
INSERT INTO `oa_area` VALUES (276, 17, 3, '航头');
INSERT INTO `oa_area` VALUES (277, 17, 3, '合庆');
INSERT INTO `oa_area` VALUES (278, 17, 3, '惠南');
INSERT INTO `oa_area` VALUES (279, 17, 3, '康桥');
INSERT INTO `oa_area` VALUES (280, 17, 3, '芦潮港');
INSERT INTO `oa_area` VALUES (281, 17, 3, '南汇周边');
INSERT INTO `oa_area` VALUES (282, 17, 3, '泥城');
INSERT INTO `oa_area` VALUES (283, 17, 3, '新场');
INSERT INTO `oa_area` VALUES (284, 17, 3, '周浦');
INSERT INTO `oa_area` VALUES (285, 17, 3, '祝桥');
INSERT INTO `oa_area` VALUES (286, 18, 3, '城桥');
INSERT INTO `oa_area` VALUES (287, 18, 3, '堡镇');
INSERT INTO `oa_area` VALUES (288, 18, 3, '陈家');
INSERT INTO `oa_area` VALUES (289, 18, 3, '崇明周边');
INSERT INTO `oa_area` VALUES (290, 19, 3, '枫泾');
INSERT INTO `oa_area` VALUES (291, 19, 3, '朱泾');
INSERT INTO `oa_area` VALUES (292, 19, 3, '亭林');
INSERT INTO `oa_area` VALUES (293, 19, 3, '漕泾');
INSERT INTO `oa_area` VALUES (294, 19, 3, '金山新城');
INSERT INTO `oa_area` VALUES (295, 19, 3, '金山周边');
INSERT INTO `oa_area` VALUES (296, 19, 3, '金山中部');
INSERT INTO `oa_area` VALUES (297, 20, 3, '车墩');
INSERT INTO `oa_area` VALUES (298, 20, 3, '洞泾');
INSERT INTO `oa_area` VALUES (299, 20, 3, '方松');
INSERT INTO `oa_area` VALUES (300, 20, 3, '九亭');
INSERT INTO `oa_area` VALUES (301, 20, 3, '莘闵');
INSERT INTO `oa_area` VALUES (302, 20, 3, '佘山');
INSERT INTO `oa_area` VALUES (303, 20, 3, '泗泾');
INSERT INTO `oa_area` VALUES (304, 20, 3, '松江大学城');
INSERT INTO `oa_area` VALUES (305, 20, 3, '松江工业区');
INSERT INTO `oa_area` VALUES (306, 20, 3, '松江科技园');
INSERT INTO `oa_area` VALUES (307, 20, 3, '松江老城');
INSERT INTO `oa_area` VALUES (308, 20, 3, '松江新城');
INSERT INTO `oa_area` VALUES (309, 20, 3, '松江周边');
INSERT INTO `oa_area` VALUES (310, 20, 3, '新浜');
INSERT INTO `oa_area` VALUES (311, 20, 3, '新桥');
INSERT INTO `oa_area` VALUES (312, 20, 3, '叶榭');
INSERT INTO `oa_area` VALUES (313, 20, 3, '永丰');
INSERT INTO `oa_area` VALUES (314, 20, 3, '岳阳');
INSERT INTO `oa_area` VALUES (315, 20, 3, '中山');

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_case`
-- 

CREATE TABLE `oa_case` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `uid` int(10) unsigned NOT NULL COMMENT '案例所属人',
  `title` varchar(255) NOT NULL COMMENT '案例名称',
  `info` text COMMENT '案例介绍',
  `style` tinyint(2) unsigned NOT NULL,
  `time` int(10) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0正常-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='案例表' AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `oa_case`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `oa_case_pics`
-- 

CREATE TABLE `oa_case_pics` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司Id',
  `cid` int(10) unsigned NOT NULL COMMENT '项目id',
  `url` varchar(100) NOT NULL COMMENT '图片地址',
  `info` text NOT NULL COMMENT '图片说明',
  `style` tinyint(2) unsigned NOT NULL COMMENT '风格',
  `room_type` tinyint(3) unsigned NOT NULL COMMENT '房间类型',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0正常-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='案例图片表' AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `oa_case_pics`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `oa_comment`
-- 

CREATE TABLE `oa_comment` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '评论id',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `tid` int(10) unsigned NOT NULL COMMENT '评论所属主题id',
  `uid` int(10) unsigned NOT NULL COMMENT '评论人',
  `content` text COMMENT '评论内容',
  `voice` int(10) unsigned default NULL COMMENT '评论声音id',
  `time` int(10) unsigned NOT NULL COMMENT '评论时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `oa_comment`
-- 

INSERT INTO `oa_comment` VALUES (2, 1, 1, 20, '', 10, 1373275925);
INSERT INTO `oa_comment` VALUES (3, 1, 1, 20, 'qer', NULL, 1373275937);
INSERT INTO `oa_comment` VALUES (4, 1, 2, 21, '', 13, 1373351270);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_dynamic`
-- 

CREATE TABLE `oa_dynamic` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `type` tinyint(3) unsigned NOT NULL default '0' COMMENT '类型',
  `msg` varchar(255) NOT NULL COMMENT '消息',
  `link_id` int(10) unsigned NOT NULL default '0' COMMENT '链接id',
  `isread` tinyint(1) unsigned NOT NULL default '0' COMMENT '1已读',
  `status` tinyint(1) NOT NULL default '0',
  `time` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `oa_dynamic`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `oa_file`
-- 

CREATE TABLE `oa_file` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `type` tinyint(1) NOT NULL COMMENT '文件类型：1图片、2声音',
  `thumbs` text COMMENT '缩略图类型：，号分割',
  `size` varchar(30) NOT NULL COMMENT '字节大小',
  `url` varchar(50) NOT NULL COMMENT '文件地址',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `oa_file`
-- 

INSERT INTO `oa_file` VALUES (1, 2, NULL, '49820', '20130619/51c1642594860.aac');
INSERT INTO `oa_file` VALUES (2, 2, NULL, '49820', '20130619/51c1642594860.aac');
INSERT INTO `oa_file` VALUES (3, 2, NULL, '49820', '20130619/51c1642594860.aac');
INSERT INTO `oa_file` VALUES (4, 2, NULL, '49820', '20130619/51c1642594860.aac');
INSERT INTO `oa_file` VALUES (5, 1, NULL, '285771', '20130619/51c162a7bf7ee.jpg');
INSERT INTO `oa_file` VALUES (6, 2, NULL, '45336', '20130619/51c1642594860.aac');
INSERT INTO `oa_file` VALUES (7, 1, NULL, '253213', '20130708/51da7fed13181.png');
INSERT INTO `oa_file` VALUES (8, 2, NULL, '35769', '20130708/51da7fed149c3.aac');
INSERT INTO `oa_file` VALUES (9, 2, NULL, '29553', '20130708/51da7ff8e4a81.aac');
INSERT INTO `oa_file` VALUES (10, 2, NULL, '26632', '20130708/51da8715e56c6.aac');
INSERT INTO `oa_file` VALUES (11, 1, NULL, '290687', '20130709/51dbad2562462.png');
INSERT INTO `oa_file` VALUES (12, 2, NULL, '35323', '20130709/51dbad256687f.aac');
INSERT INTO `oa_file` VALUES (13, 2, NULL, '44357', '20130709/51dbad66a9097.aac');

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_project`
-- 

CREATE TABLE `oa_project` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `app_id` int(10) unsigned NOT NULL default '0',
  `name` varchar(60) NOT NULL COMMENT '项目名称',
  `province` int(10) unsigned NOT NULL default '0' COMMENT '省',
  `city` int(10) unsigned NOT NULL default '0' COMMENT '市',
  `region` int(10) unsigned NOT NULL default '0' COMMENT '区',
  `area` int(10) unsigned NOT NULL default '0' COMMENT '面积',
  `style` int(10) unsigned NOT NULL default '0' COMMENT '风格',
  `budget` int(10) unsigned NOT NULL default '0' COMMENT '预算',
  `community` varchar(50) NOT NULL COMMENT '小区',
  `road` varchar(60) NOT NULL COMMENT '路',
  `number` varchar(10) NOT NULL COMMENT '几号',
  `touid` int(10) unsigned NOT NULL default '0' COMMENT '设计师uid',
  `status` tinyint(1) NOT NULL default '0',
  `time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `oa_project`
-- 

INSERT INTO `oa_project` VALUES (1, 1, '测试项目11', 123, 456, 789, 100, 1, 1000, 'xxxxx小区', 'XXXX路', 'xxx号', 9, 0, 0);
INSERT INTO `oa_project` VALUES (2, 1, '测试项目2', 123, 456, 789, 100, 1, 1000, 'xxxxx小区', 'XXXX路', 'xxx号', 10, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_session`
-- 

CREATE TABLE `oa_session` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `key` char(32) NOT NULL COMMENT '加密串',
  `expire` int(10) NOT NULL COMMENT '过期时间',
  PRIMARY KEY  (`id`),
  KEY `key` (`key`),
  KEY `key_2` (`key`),
  KEY `key_3` (`key`)
) ENGINE=MEMORY  DEFAULT CHARSET=utf8 COMMENT='session表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `oa_session`
-- 

INSERT INTO `oa_session` VALUES (1, 11, 'fa3f923700c3e8100336da82d3aac67b', 1373283113);
INSERT INTO `oa_session` VALUES (2, 20, 'd1ed0ea01356971b6b36bb4408ca78a7', 1373293819);
INSERT INTO `oa_session` VALUES (3, 21, '688b2418d2c4017cb220707647907f4e', 1373372678);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_subcompanys`
-- 

CREATE TABLE `oa_subcompanys` (
  `id` int(10) NOT NULL auto_increment,
  `app_id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `area` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `site` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `opentime` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `oa_subcompanys`
-- 

INSERT INTO `oa_subcompanys` VALUES (1, 1, 'aaaa', '7,124', 'bbbb', '上海', '1234567891', '上午', 0, 0);
INSERT INTO `oa_subcompanys` VALUES (2, 1, 'bbbbbb', '2,25', 'bbbbb', 'babab', 'ababa', 'babbb', 0, 0);
INSERT INTO `oa_subcompanys` VALUES (3, 1, 'aaaaa', '9,156', 'fsdfsdf', 'sdfsdf', 'sfs', 'fsfsdfa', 0, 1373035523);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_topic`
-- 

CREATE TABLE `oa_topic` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '主题类型：1为拍拍说，2为项目',
  `pid` int(10) unsigned NOT NULL default '0' COMMENT '所属项目',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `phase` tinyint(2) unsigned default NULL COMMENT '阶段',
  `content` text COMMENT '主题内容',
  `voice` int(10) default NULL COMMENT '声音地址id',
  `pic` int(10) default NULL COMMENT '图片地址id',
  `time` int(10) NOT NULL COMMENT '发送时间',
  `new_comids` varchar(50) default NULL COMMENT '最新3条评论id',
  `num` int(10) unsigned NOT NULL default '0' COMMENT '评论数',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态（0显示，-2删除）',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='主题' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `oa_topic`
-- 

INSERT INTO `oa_topic` VALUES (1, 1, 1, 0, 11, NULL, 'helloWorld', 8, 7, 1373274093, '3,2', 2, 0);
INSERT INTO `oa_topic` VALUES (2, 1, 1, 0, 21, NULL, 'helloWorld', 12, 11, 1373351205, '4', 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `oa_users`
-- 

CREATE TABLE `oa_users` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `app_id` int(10) unsigned NOT NULL COMMENT '公司id',
  `type` tinyint(2) unsigned NOT NULL COMMENT '用户类型:0管理员，1设计师，2普通用户',
  `account` varchar(64) NOT NULL COMMENT '账户',
  `nickname` varchar(50) NOT NULL COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned default '0',
  `last_login_ip` varchar(40) default NULL,
  `login_count` mediumint(8) unsigned default '0' COMMENT '登陆次数',
  `email` varchar(50) default NULL COMMENT '邮箱',
  `introduce` text COMMENT '备注',
  `avatar` varchar(50) NOT NULL default 'avatar/avatar.gif' COMMENT '用户头像',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL default '0' COMMENT '0正常-2删除',
  `sex` tinyint(1) unsigned default NULL COMMENT '性别：1为男，0为女',
  PRIMARY KEY  (`id`),
  KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=22 ;

-- 
-- 导出表中的数据 `oa_users`
-- 

INSERT INTO `oa_users` VALUES (1, 1, 0, 'admin1', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1371801744, '117.184.3.198', 20, NULL, NULL, 'avatar/avatar.gif', 0, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (2, 2, 0, 'admin2', '管理员2', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, '', 0, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (3, 1, 1, 'shejishi1', '设计师1', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, 0, NULL, NULL, '', 0, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (4, 1, 2, 'aaaa', 'ccc', 'bbb', 0, '127.0.0.1', 0, NULL, 'sdasdasd', '', 1371374608, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (5, 1, 2, 'bbb', '123123', 'a21075a36eeddd084e17611a238c7101', 0, '127.0.0.1', 0, NULL, 'sdfsdff', '20130616/51bd867abd3eb.jpg', 1371375226, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (6, 1, 2, 'cccc', '123123123', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 0, '127.0.0.1', 0, NULL, 'qweqweaaa', '20130616/51bd8c3c2a673.jpg', 1371376700, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (21, 1, 2, 'test', 'test', '202cb962ac59075b964b07152d234b70', 1373351157, '117.184.3.198', 1, NULL, NULL, 'avatar/avatar.gif', 0, 0, 0, NULL);
INSERT INTO `oa_users` VALUES (20, 1, 2, 'test1', 'test1', '202cb962ac59075b964b07152d234b70', 0, '117.184.3.198', 0, NULL, NULL, 'avatar/avatar.gif', 0, 0, 0, NULL);
