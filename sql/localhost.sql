-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 30 日 02:16
-- 服务器版本: 5.5.29
-- PHP 版本: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--
CREATE DATABASE `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- 表的结构 `hd_admin`
--

CREATE TABLE IF NOT EXISTS `hd_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '' COMMENT '后台管理员用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `lock` enum('是','否') NOT NULL DEFAULT '否' COMMENT '账号是否锁定',
  PRIMARY KEY (`id`),
  KEY `user` (`username`,`lock`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台管理员' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `hd_admin`
--

INSERT INTO `hd_admin` (`id`, `username`, `password`, `lock`) VALUES
(1, 'mao', '96e79218965eb72c92a549dd5a330112', '否');

-- --------------------------------------------------------

--
-- 表的结构 `hd_brand`
--

CREATE TABLE IF NOT EXISTS `hd_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` varchar(100) NOT NULL DEFAULT '' COMMENT '品牌LOGO',
  `cid` int(10) unsigned NOT NULL COMMENT '所属栏目ID',
  `hot` enum('0','1') DEFAULT '0',
  `descript` text,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品品牌' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `hd_brand`
--

INSERT INTO `hd_brand` (`id`, `name`, `logo`, `cid`, `hot`, `descript`) VALUES
(16, '波司登', '/thinkmao/Uploads/brand/201301/51024e2bcf5ca.jpg', 15, '1', '   波司登以轻、薄、美使原来的厚、重、肿的羽绒服形象焕然一新，带动了整个羽绒服行业向时装化、休闲化的发展               \r\n                       '),
(17, 'Ochirly', '/thinkmao/Uploads/brand/201301/51024eca720e9.jpg', 15, '1', '     Ochirly 以奢华设计灵感，完美融合欧洲魅力与时尚艺术，优雅摩登，无尽灵感。  \r\n                       '),
(18, 'ONLY', '/thinkmao/Uploads/brand/201301/51024f0642e78.jpg', 15, '1', 'ONLY产品个性突出，适合参加聚会和社交，让大胆而独立的都市女孩通过服饰表现特立独行的自我。      '),
(19, 'Uniqlo', '/thinkmao/Uploads/brand/201301/51024f6c49fdc.jpg', 15, '1', ' 为了让所有的人都能穿上高品质的、简约自然的、易于搭配的休闲服装而努力的著名国际休闲品牌。                          \r\n                       '),
(20, '韩都衣舍', '/thinkmao/Uploads/brand/201301/51024f96e2b7e.jpg', 15, '1', '韩都衣舍秉承韩风快时尚这一理念，将韩国的时尚元素引入国内,为中国的顾客提供最时尚的韩国风格服饰'),
(21, 'Uniqlo', '/thinkmao/Uploads/brand/201301/51024fe7bd26b.jpg', 15, '1', ' 为了让所有的人都能穿上高品质的、简约自然的、易于搭配的休闲服装而努力的著名国际休闲品牌。                          \r\n                       '),
(22, '裂帛', '/thinkmao/Uploads/brand/201301/5102502fb4305.jpg', 15, '1', '裂帛，中国知名设计师品牌，主营狂喜、神秘、流浪、异域、民族，打造原创女装服饰新时尚。                 '),
(23, '秋水伊人', '/thinkmao/Uploads/brand/201301/510250712a4a8.jpg', 15, '1', '  秋水伊人品通过设计师优雅、浪漫的设计表达手法，充分演绎都市淑女时尚经典又精致优雅的着衣风格。                         \r\n                       '),
(24, 'Cartelo', '/thinkmao/Uploads/brand/201301/510250c8c8d21.jpg', 16, '1', '       卡帝乐鳄鱼是最早进入中国的世界知名品牌之一；公司拥有55年悠久历史；曾连续三年保持了T恤衫全国销量第一。                    \r\n                       '),
(25, 'Septwolves', '/thinkmao/Uploads/brand/201301/51025161e8846.jpg', 16, '1', '七匹狼狼文化的理念是勇敢，忠诚，沟通，力量，团队，不屈，自信。追逐人生，男人不止一面。'),
(26, 'INMAN/茵曼', '/thinkmao/Uploads/brand/201301/5107656d6ce2c.png', 36, '1', ' 茵曼-棉麻艺术家，素雅而简洁、个性而不张扬。倡导自然、写意、清新的现代都市生活方式。     '),
(27, 'Meters Bonwe/美特斯邦威', '/thinkmao/Uploads/brand/201301/510765fc8a9d7.png', 15, '1', '16~25岁活力时尚的年轻人群,倡导青春和个性的时尚品牌形象,带给广大消费者富有活力的休闲品牌!'),
(28, 'Goelia/歌莉娅', '/thinkmao/Uploads/brand/201301/5107663c216b4.jpg', 39, '1', '歌莉娅，自1995年诞生以来，在持续超过10年的环球之旅中，发现、探索、采撷，将潮流与各地文化融合。          '),
(29, 'Basic House/百家好', '/thinkmao/Uploads/brand/201301/510766d0e351e.jpg', 37, '1', '以“NOT BIG,BUT GOOD”为品牌座右铭，成为广大中国消费者钟爱的服装品牌。      '),
(30, 'PEACEBIRD/太平鸟', '/thinkmao/Uploads/brand/201301/510767134ca28.jpg', 40, '1', '太平鸟PEACEBIRD时装追求理性、简约、休闲、时尚的设计理念，倡导时尚理念，引导时尚生活品质。'),
(31, 'Eifini/伊芙丽', '/thinkmao/Uploads/brand/201301/510767506a948.jpg', 15, '1', '   法式优雅、自信、自然是eifini一直倡导的品牌灵魂，并以此来诠释现代女性时尚自主、精致优雅的形象。               \r\n                       '),
(32, 'OSA', '/thinkmao/Uploads/brand/201301/510767eaab4f1.png', 15, '1', 'O.SA是专注时尚的女装品牌，坚持做白领的时尚家。             ');

-- --------------------------------------------------------

--
-- 表的结构 `hd_category`
--

CREATE TABLE IF NOT EXISTS `hd_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` int(10) unsigned NOT NULL COMMENT '父级分类ID',
  `tid` int(10) unsigned NOT NULL COMMENT '所属类型ID',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品分类' AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `hd_category`
--

INSERT INTO `hd_category` (`id`, `name`, `pid`, `tid`) VALUES
(22, '化妆品', 0, 9),
(21, '珠宝饰品/手表眼镜', 0, 11),
(20, '箱/鞋包', 0, 10),
(19, '精致内衣', 14, 8),
(18, '时尚家居', 14, 8),
(17, '精品男装', 14, 8),
(16, '服饰配件', 14, 0),
(15, '品牌女装', 14, 0),
(14, '服装/内衣/配件', 0, 8),
(23, '户外运动', 0, 13),
(24, '手机数码', 0, 14),
(25, '家用电器', 0, 15),
(26, '家具建材', 0, 16),
(27, '家纺/居家', 0, 17),
(28, '母婴玩具', 0, 18),
(29, '食品', 0, 19),
(30, '医药保健', 0, 20),
(31, '汽车配件', 0, 21),
(32, '图书音箱', 0, 22),
(33, '文化娱乐', 0, 23),
(34, '羽绒服', 55, 8),
(35, '毛衣裙', 55, 8),
(36, '毛呢外套', 55, 8),
(37, '毛衣', 55, 8),
(38, '真皮皮衣', 55, 8),
(39, '外套', 55, 8),
(40, '休闲裤', 56, 8),
(41, '牛仔裤', 56, 8),
(42, '皮草', 55, 8),
(43, '针织衫', 55, 8),
(44, '棉衣服装', 55, 8),
(45, '衬衫', 55, 8),
(46, 'T恤', 55, 8),
(47, '卫衣', 55, 8),
(48, '婚纱/礼服/旗袍', 57, 8),
(49, '短外套', 55, 8),
(50, '风衣', 55, 8),
(51, '半身裙', 54, 8),
(52, '小西装', 55, 8),
(53, '中老年服装', 57, 8),
(54, '裙装', 15, 8),
(55, '上衣', 15, 8),
(56, '裤子', 15, 8),
(57, '特色市场', 15, 8),
(58, '其他分类', 15, 8),
(59, '连衣裙', 54, 8),
(60, '正装裤', 56, 8),
(61, '打底裤', 56, 8),
(62, '中老年服装', 57, 8),
(63, '套装', 57, 8),
(64, '唐装/中式服装', 57, 8),
(65, '制服校服', 57, 8),
(66, '大码女装', 57, 8),
(67, '孕妇装', 58, 8),
(68, '防辐射装', 58, 8);

-- --------------------------------------------------------

--
-- 表的结构 `hd_comment`
--

CREATE TABLE IF NOT EXISTS `hd_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '审核状态(1:已审核,2:未审核)',
  `uid` int(10) unsigned NOT NULL COMMENT '评论用户ID',
  `gid` int(10) unsigned NOT NULL COMMENT '评论商品ID',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods`
--

CREATE TABLE IF NOT EXISTS `hd_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '商品名称',
  `unit` varchar(10) NOT NULL DEFAULT '' COMMENT '单位',
  `number` varchar(45) NOT NULL DEFAULT '' COMMENT '货号',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `pic` varchar(200) NOT NULL DEFAULT '' COMMENT '列表页展示图',
  `click` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐商品(1:是,0:否)',
  `hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖商品(1:是,0:否)',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上架时间',
  `cid` varchar(10) NOT NULL COMMENT '所属分类ID',
  `bid` int(10) unsigned NOT NULL COMMENT '所属品牌ID',
  `tid` int(10) unsigned NOT NULL COMMENT '所属类型ID',
  `aid` int(10) unsigned NOT NULL COMMENT '上架管理员ID',
  `mprice` char(50) NOT NULL DEFAULT '0',
  `sell_num` int(11) NOT NULL DEFAULT '0' COMMENT '商品的总的销售量',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `bid` (`bid`),
  KEY `tid` (`tid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `hd_goods`
--

INSERT INTO `hd_goods` (`id`, `name`, `unit`, `number`, `price`, `pic`, `click`, `recommend`, `hot`, `time`, `cid`, `bid`, `tid`, `aid`, `mprice`, `sell_num`) VALUES
(11, '【爆】Ochirly欧时力新女秋装圆领宽松长袖羊毛呢外套', '件', '3243243432', 499.00, '/thinkmao/Uploads/img_list/201301/5105e80d8eeb6.jpg', 34345, 1, 1, 1359341758, '15', 17, 8, 1, '1190', 232),
(10, '【优】【爆】Ochirly女秋装长袖羊毛呢外套', '件', '1115340700133', 449.00, '/thinkmao/Uploads/img_list/201301/510290ad9a59d.jpg', 3421, 1, 1, 1359122607, '15', 17, 8, 1, '1390.00', 1203),
(12, '秋水伊人2013 春装新款时尚淑女修身中袖镂空钩花大红连衣裙子女', '件', '32432432', 353.00, '/thinkmao/Uploads/img_list/201301/5105eb9ab68b4.jpg', 3432, 1, 0, 1359342513, '15|43|35', 23, 8, 1, '553.00', 432),
(13, '秋水伊人2012秋冬装新品羊毛针织立体花装毛呢短外套', '件', '454221221223', 169.00, '/thinkmao/Uploads/img_list/201301/5105ee7c08b8e.jpg', 343, 1, 1, 1359343260, '15|36', 23, 8, 1, '458', 1243);

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_attr`
--

CREATE TABLE IF NOT EXISTS `hd_goods_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT '属性值',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `gid` int(10) unsigned NOT NULL COMMENT '商品ID',
  `aid` int(10) unsigned NOT NULL COMMENT '属性ID',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品属性值' AUTO_INCREMENT=199 ;

--
-- 转存表中的数据 `hd_goods_attr`
--

INSERT INTO `hd_goods_attr` (`id`, `value`, `price`, `gid`, `aid`) VALUES
(109, '500-800', 0.00, 10, 32),
(108, ' 51%-70%', 0.00, 10, 31),
(107, '纽扣', 0.00, 10, 30),
(106, '长袖', 0.00, 10, 29),
(105, '1115340700133', 0.00, 10, 28),
(104, '白色', 0.00, 10, 27),
(103, '仿呢料', 0.00, 10, 26),
(102, '休闲', 0.00, 10, 25),
(101, '常规袖', 0.00, 10, 24),
(100, '街头', 0.00, 10, 23),
(99, '常规款(50cm<衣长≤65cm)', 0.00, 10, 22),
(98, '加厚', 0.00, 10, 21),
(97, '实拍', 0.00, 10, 12),
(96, '修身型', 0.00, 10, 13),
(95, '常规', 0.00, 10, 14),
(94, '立领', 0.00, 10, 15),
(93, '花纹', 0.00, 10, 16),
(92, '涤纶', 0.00, 10, 17),
(91, '2012', 0.00, 10, 18),
(90, '记忆/仿记忆面料', 0.00, 10, 19),
(89, 'Ochirly/欧时力', 0.00, 10, 20),
(110, '中码', 0.00, 10, 33),
(111, 'Ochirly/欧时力', 0.00, 10, 34),
(112, 'X', 10.00, 10, 37),
(113, 'XXXL', 40.00, 10, 37),
(114, 'XXL', 30.00, 10, 37),
(115, 'XL', 20.00, 10, 37),
(116, '粉红', 20.00, 10, 38),
(117, '白色', 20.00, 10, 38),
(118, '灰色', 78.00, 10, 38),
(119, '红色', 56.00, 10, 38),
(120, '灰色', 40.00, 10, 38),
(121, 'Ochirly欧时力', 0.00, 11, 20),
(122, '涤丝纺', 0.00, 11, 19),
(123, '2012', 0.00, 11, 18),
(124, '仿呢料', 0.00, 11, 17),
(125, '无', 0.00, 11, 16),
(126, '圆领', 0.00, 11, 15),
(127, '英伦', 0.00, 11, 14),
(128, '修身型', 0.00, 11, 13),
(129, '实拍', 0.00, 11, 12),
(130, '加厚', 0.00, 11, 21),
(131, '常规款(50cm<衣长≤65cm)', 0.00, 11, 22),
(132, '甜美', 0.00, 11, 23),
(133, '常规袖', 0.00, 11, 24),
(134, '蕾丝', 0.00, 11, 25),
(135, '其它', 0.00, 11, 26),
(136, '黄色', 0.00, 11, 27),
(137, '1223132', 0.00, 11, 28),
(138, '短袖', 0.00, 11, 29),
(139, '纽扣', 0.00, 11, 30),
(140, '仿呢料', 0.00, 11, 31),
(141, '500-800', 0.00, 11, 32),
(142, '中码', 0.00, 11, 33),
(143, 'Ochirly欧时力', 0.00, 11, 34),
(144, 'XL', 21.00, 11, 37),
(145, 'XXL', 56.00, 11, 37),
(146, '蓝色', 67.00, 11, 38),
(147, '蓝色', 89.00, 11, 38),
(148, '秋水伊人', 0.00, 12, 20),
(149, '涤丝纺', 0.00, 12, 19),
(150, '2012', 0.00, 12, 18),
(151, '锦纶', 0.00, 12, 17),
(152, '纯色', 0.00, 12, 16),
(153, '圆领', 0.00, 12, 15),
(154, '英伦', 0.00, 12, 14),
(155, '修身型', 0.00, 12, 13),
(156, '实拍', 0.00, 12, 12),
(157, '超薄', 0.00, 12, 21),
(158, '中长款(65cm<衣长≤80cm)', 0.00, 12, 22),
(159, '百搭', 0.00, 12, 23),
(160, '常规袖', 0.00, 12, 24),
(161, '拉链', 0.00, 12, 25),
(162, '无', 0.00, 12, 26),
(163, '黄色', 0.00, 12, 27),
(164, '23432112', 0.00, 12, 28),
(165, '长袖', 0.00, 12, 29),
(166, '拉链', 0.00, 12, 30),
(167, '锦纶', 0.00, 12, 31),
(168, '500-800', 0.00, 12, 32),
(169, '中码', 0.00, 12, 33),
(170, 'XL', 32.00, 12, 37),
(171, 'XXL', 78.00, 12, 37),
(172, '红色', 53.00, 12, 38),
(173, '秋水伊人', 0.00, 13, 20),
(174, '蕾丝', 0.00, 13, 19),
(175, '2012', 0.00, 13, 18),
(176, '棉纶', 0.00, 13, 17),
(177, '纯色', 0.00, 13, 16),
(178, '圆领', 0.00, 13, 15),
(179, '英伦', 0.00, 13, 14),
(180, '修身型', 0.00, 13, 13),
(181, '实拍', 0.00, 13, 12),
(182, '加厚', 0.00, 13, 21),
(183, '短款(40cm<衣长≤50cm)', 0.00, 13, 22),
(184, '甜美', 0.00, 13, 23),
(185, '毛袖', 0.00, 13, 24),
(186, '纽扣', 0.00, 13, 25),
(187, '棉纶', 0.00, 13, 26),
(188, '黄色', 0.00, 13, 27),
(189, '长袖', 0.00, 13, 29),
(190, '纽扣', 0.00, 13, 30),
(191, '棉纶', 0.00, 13, 31),
(192, '100-500', 0.00, 13, 32),
(193, '中码', 0.00, 13, 33),
(194, 'XL', 0.00, 13, 37),
(195, 'XXL', 23.00, 13, 37),
(196, 'X', 53.00, 13, 37),
(197, 'XXXL', 77.00, 13, 37),
(198, '白色', 12.00, 13, 38);

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_intro`
--

CREATE TABLE IF NOT EXISTS `hd_goods_intro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mini` varchar(255) NOT NULL DEFAULT '' COMMENT '小图',
  `medium` varchar(255) NOT NULL DEFAULT '' COMMENT '中图',
  `max` varchar(255) NOT NULL DEFAULT '' COMMENT '大图',
  `intro` text COMMENT '详细介绍',
  `service` text COMMENT '售后服务',
  `gid` int(10) unsigned NOT NULL COMMENT '所属商品ID',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品介绍' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `hd_goods_intro`
--

INSERT INTO `hd_goods_intro` (`id`, `mini`, `medium`, `max`, `intro`, `service`, `gid`) VALUES
(12, '/thinkmao/Uploads/img_list/201301/mini5105eb96a3b8b.jpg|/thinkmao/Uploads/img_list/201301/mini5105eb90312c9.jpg|/thinkmao/Uploads/img_list/201301/mini5105eb8ba1927.jpg|/thinkmao/Uploads/img_list/201301/mini5105eb88b575a.jpg', '/thinkmao/Uploads/img_list/201301/5105eb96a3b8b.jpg|/thinkmao/Uploads/img_list/201301/5105eb90312c9.jpg|/thinkmao/Uploads/img_list/201301/5105eb8ba1927.jpg|/thinkmao/Uploads/img_list/201301/5105eb88b575a.jpg', '/thinkmao/Uploads/img_list/201301/5105eb96a3b8b.jpg|/thinkmao/Uploads/img_list/201301/5105eb90312c9.jpg|/thinkmao/Uploads/img_list/201301/5105eb8ba1927.jpg|/thinkmao/Uploads/img_list/201301/5105eb88b575a.jpg', '<p><img src="/thinkmao/Public/Ueditor/php/upload/91871359342276.jpg" /><br /></p>', '<div id="J_AfterSales" class="J_DetailSection" style="line-height:25px;width:750px;top:-9999em;color:#404040;font-family:tahoma, arial, 宋体;font-size:12px;background-color:#ffffff;position:static;left:0px;"><ul class="content" style="margin:10px 0px 0px;padding:0px;list-style:none;overflow:hidden;width:auto;"><li class="item-afterservices" style="margin:0px;padding:0px;"><div class="section-box" style="margin-bottom:15px;"><div class="J_TMDStaticMod" data-type="afterSale" data-params="{&quot;show7&quot;:true}"><div class="server-container b-detail" style="border:1px solid #e6e6e6;"><dl class="promise-server" style="margin:0px;padding:5px 5px 0px;line-height:1.5;overflow:hidden;"><dd class="first-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:270px;display:inline;"><div style="padding:10px;"><br class="Apple-interchange-newline" />天猫的商家出售均为正品，承诺提供&quot;正品保障&quot;服务，一旦发现有出售假货及非原厂正品商品,买家可在交易成功后向天猫投诉商家并申请天猫使用商家保证金余额进行先行赔付。</div></dd><dt class="second-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-130px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#TGFP" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="second-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:113px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家均提供商品发票。</div></dd><dt class="third-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-60px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#QTTH" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="split-end third-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border:none;float:left;word-wrap:break-word;overflow:hidden;width:110px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家提供&quot;七天无理由退换货&quot;的保障服务。</div></dd></dl></div><div class="tb-weiQuanBox" style="border:1px solid #e6e6e6;color:#333333;padding:20px;margin-top:10px;"><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-cn" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:90px;background-position:0px -81px;background-repeat:no-repeat no-repeat;margin-left:-50px;"></strong>天猫承诺</h5><ol class="tb-chengNuo" style="margin:0px;padding:10px 10px 20px;list-style:none;line-height:20px;"><li style="margin:0px;padding:0px;"><p>1、您付款之后，如果商家延迟发货，可以获得商品价格30%（不大于500元）的赔付金，<a href="http://service.tmall.com/support/tmall/knowledge-1126800.htm" target="_blank" style="text-decoration:initial;color:#2953a6;">详见</a></p></li><li style="margin:0px;padding:0px;"><p>2、天猫所有在售商品均支持7天无理由退货（不包含珠宝类和定制商品）；</p></li><li style="margin:0px;padding:0px;"><p>3、天猫所有在售商品均开具正规发票；</p></li><li style="margin:0px;padding:0px;"><p>4、天猫所售商品均为正品行货，如商家出售假货，支持假一赔三处理，并清退商家。</p></li></ol><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-lc" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:188px;background-position:-90px -81px;background-repeat:no-repeat no-repeat;margin-left:-94px;"></strong>维权服务发起流程</h5><p class="tb-weiQuanLiuCheng" style="padding:30px;height:70px;text-align:center;position:relative;margin-top:0px;margin-bottom:0px;"><strong style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:81px;top:23px;left:50%;z-index:3;width:612px;background-position:0px 0px;background-repeat:no-repeat no-repeat;margin-left:-306px;"></strong>购买商品出现问题-未确认收货-发起退款申请-天猫客服48小时内介入纠纷调解-退款成功；<br />购买商品出现问题-已确认收货-发起维权申请-天猫客服48小时内介入纠纷调解-维权成功</p><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-bz" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:180px;background-position:-279px -81px;background-repeat:no-repeat no-repeat;margin-left:-74px;"></strong>退换货服务标准</h5><dl class="tb-tuiBiaoZhun" style="margin:0px;padding:0px 10px 20px;line-height:20px;"><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货基本条件：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">对全部商品：</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">外包装完整，且不影响二次销售。一旦拆封无法复原商品不可退货（质量问题除外）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">若交易已完成，发现质量问题，请在交易完成后15天内进行退款申请。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">退款时买家需将发票和赠品一起退回。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">不可退换货特殊说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">无质量问题且外包装已拆无法复原，影响二次销售。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">为客户特殊定制的商品不支持7天无理由退换货。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">人为刻意损害或不可抗力导致的损坏。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">7天无理由退换货超过食用期限的商品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">非天猫店铺出售的商品或已超出退换货期限的商品（7天无理由退货以签收日为准起始7日之内）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">商品的图片及信息仅供参考。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有细微色差。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货费用说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是买家原因退货，由买家自行承担退货费用。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是商品质量问题、描述不符而导致的退货，退货费用则应由店铺承担。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退货时可能涉及的证明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">购货发票以及赠品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">权威检验机构以及品牌所有者出具的鉴定报告或其他能够证明所购买商品为假货的凭证。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">旺旺聊天记录截图（在使用阿里旺旺与店铺沟通时，请事先在系统设置-聊天设置中选择“将我的消息记录保存到阿里旺旺服务器上”）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">其他天猫需要双方出具的证明文件。</dd></dl></div></div></div></li></ul></div><div class="J_TMDStaticMod" data-type="official" style="color:#404040;font-family:tahoma, arial, 宋体;font-size:12px;line-height:18px;background-color:#ffffff;"><div id="official-remind" style="clear:both;padding:10px;background-color:#ffffe5;border:1px solid #ffcc7f;background-position:initial initial;background-repeat:initial initial;margin-top:20px;"><dl class="tb-secu" style="margin:0px 0px 10px;padding:0px 0px 10px 68px;line-height:2;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ffe8ca;"><dt style="margin:0px 0px 0px -68px;padding:0px;display:inline;float:left;width:68px;font-weight:bold;">安全提示：</dt><dd style="margin:0px;padding:0px;"><p style="padding:0px;margin-top:0px;margin-bottom:0px;">交易过程中请勿随意接收卖家发送的可疑文件，请勿点击不明来源的链接，付款前请务必详细核对支付信息。</p></dd></dl></div></div><p><br /></p>', 12),
(13, '/thinkmao/Uploads/img_list/201301/mini5105ee76719e6.jpg|/thinkmao/Uploads/img_list/201301/mini5105ee7292cb7.jpg|/thinkmao/Uploads/img_list/201301/mini5105ee6ec30e5.jpg|/thinkmao/Uploads/img_list/201301/mini5105ee6a52137.jpg', '/thinkmao/Uploads/img_list/201301/5105ee76719e6.jpg|/thinkmao/Uploads/img_list/201301/5105ee7292cb7.jpg|/thinkmao/Uploads/img_list/201301/5105ee6ec30e5.jpg|/thinkmao/Uploads/img_list/201301/5105ee6a52137.jpg', '/thinkmao/Uploads/img_list/201301/5105ee76719e6.jpg|/thinkmao/Uploads/img_list/201301/5105ee7292cb7.jpg|/thinkmao/Uploads/img_list/201301/5105ee6ec30e5.jpg|/thinkmao/Uploads/img_list/201301/5105ee6a52137.jpg', '<p><img src="/thinkmao/Public/Ueditor/php/upload/30311359343017.jpg" /><br /></p><p><br /></p>', '<div class="server-container b-detail" style="border:1px solid #e6e6e6;color:#404040;font-family:tahoma, arial, 宋体;font-size:12px;line-height:25px;background-color:#ffffff;"><dl class="promise-server" style="margin:0px;padding:5px 5px 0px;line-height:1.5;overflow:hidden;"><dd class="first-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:270px;display:inline;"><div style="padding:10px;"><br class="Apple-interchange-newline" />天猫的商家出售均为正品，承诺提供&quot;正品保障&quot;服务，一旦发现有出售假货及非原厂正品商品,买家可在交易成功后向天猫投诉商家并申请天猫使用商家保证金余额进行先行赔付。</div></dd><dt class="second-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-130px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#TGFP" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="second-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:113px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家均提供商品发票。</div></dd><dt class="third-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-60px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#QTTH" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="split-end third-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border:none;float:left;word-wrap:break-word;overflow:hidden;width:110px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家提供&quot;七天无理由退换货&quot;的保障服务。</div></dd></dl></div><div class="tb-weiQuanBox" style="border:1px solid #e6e6e6;color:#333333;padding:20px;font-family:tahoma, arial, 宋体;font-size:12px;line-height:25px;background-color:#ffffff;margin-top:10px;"><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-cn" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:90px;background-position:0px -81px;background-repeat:no-repeat no-repeat;margin-left:-50px;"></strong>天猫承诺</h5><ol class="tb-chengNuo" style="margin:0px;padding:10px 10px 20px;list-style:none;line-height:20px;"><li style="margin:0px;padding:0px;"><p>1、您付款之后，如果商家延迟发货，可以获得商品价格30%（不大于500元）的赔付金，<a href="http://service.tmall.com/support/tmall/knowledge-1126800.htm" target="_blank" style="text-decoration:initial;color:#2953a6;">详见</a></p></li><li style="margin:0px;padding:0px;"><p>2、天猫所有在售商品均支持7天无理由退货（不包含珠宝类和定制商品）；</p></li><li style="margin:0px;padding:0px;"><p>3、天猫所有在售商品均开具正规发票；</p></li><li style="margin:0px;padding:0px;"><p>4、天猫所售商品均为正品行货，如商家出售假货，支持假一赔三处理，并清退商家。</p></li></ol><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-lc" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:188px;background-position:-90px -81px;background-repeat:no-repeat no-repeat;margin-left:-94px;"></strong>维权服务发起流程</h5><p class="tb-weiQuanLiuCheng" style="padding:30px;height:70px;text-align:center;position:relative;margin-top:0px;margin-bottom:0px;"><strong style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:81px;top:23px;left:50%;z-index:3;width:612px;background-position:0px 0px;background-repeat:no-repeat no-repeat;margin-left:-306px;"></strong>购买商品出现问题-未确认收货-发起退款申请-天猫客服48小时内介入纠纷调解-退款成功；<br />购买商品出现问题-已确认收货-发起维权申请-天猫客服48小时内介入纠纷调解-维权成功</p><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-bz" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:180px;background-position:-279px -81px;background-repeat:no-repeat no-repeat;margin-left:-74px;"></strong>退换货服务标准</h5><dl class="tb-tuiBiaoZhun" style="margin:0px;padding:0px 10px 20px;line-height:20px;"><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货基本条件：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">对全部商品：</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">外包装完整，且不影响二次销售。一旦拆封无法复原商品不可退货（质量问题除外）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">若交易已完成，发现质量问题，请在交易完成后15天内进行退款申请。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">退款时买家需将发票和赠品一起退回。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">不可退换货特殊说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">无质量问题且外包装已拆无法复原，影响二次销售。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">为客户特殊定制的商品不支持7天无理由退换货。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">人为刻意损害或不可抗力导致的损坏。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">7天无理由退换货超过食用期限的商品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">非天猫店铺出售的商品或已超出退换货期限的商品（7天无理由退货以签收日为准起始7日之内）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">商品的图片及信息仅供参考。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有细微色差。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货费用说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是买家原因退货，由买家自行承担退货费用。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是商品质量问题、描述不符而导致的退货，退货费用则应由店铺承担。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退货时可能涉及的证明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">购货发票以及赠品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">权威检验机构以及品牌所有者出具的鉴定报告或其他能够证明所购买商品为假货的凭证。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">旺旺聊天记录截图（在使用阿里旺旺与店铺沟通时，请事先在系统设置-聊天设置中选择“将我的消息记录保存到阿里旺旺服务器上”）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">其他天猫需要双方出具的证明文件。</dd></dl></div><p><br /></p>', 13),
(10, '/thinkmao/Uploads/img_list/201301/mini510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/mini510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/mini5102909d4845f.jpg', '/thinkmao/Uploads/img_list/201301/510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/5102909d4845f.jpg', '/thinkmao/Uploads/img_list/201301/510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/5102909d4845f.jpg', '<p><img src="/thinkmao/Public/Ueditor/php/upload/64971359122206.jpg" /><br /></p>', '', 10),
(11, '/thinkmao/Uploads/img_list/201301/mini5105e8068d6e8.jpg|/thinkmao/Uploads/img_list/201301/mini5105e802ddfb2.jpg|/thinkmao/Uploads/img_list/201301/mini5105e7fe5e295.jpg|/thinkmao/Uploads/img_list/201301/mini5105e7f95821f.jpg', '/thinkmao/Uploads/img_list/201301/5105e8068d6e8.jpg|/thinkmao/Uploads/img_list/201301/5105e802ddfb2.jpg|/thinkmao/Uploads/img_list/201301/5105e7fe5e295.jpg|/thinkmao/Uploads/img_list/201301/5105e7f95821f.jpg', '/thinkmao/Uploads/img_list/201301/5105e8068d6e8.jpg|/thinkmao/Uploads/img_list/201301/5105e802ddfb2.jpg|/thinkmao/Uploads/img_list/201301/5105e7fe5e295.jpg|/thinkmao/Uploads/img_list/201301/5105e7f95821f.jpg', '<p><img src="/thinkmao/Public/Ueditor/php/upload/2451359341316.jpg" /><br /></p>', '<div id="J_AfterSales" class="J_DetailSection" style="line-height:25px;width:750px;top:-9999em;color:#404040;font-family:tahoma, arial, 宋体;font-size:12px;background-color:#ffffff;position:static;left:0px;"><ul class="content" style="margin:10px 0px 0px;padding:0px;list-style:none;overflow:hidden;width:auto;"><li class="item-afterservices" style="margin:0px;padding:0px;"><div class="section-box" style="margin-bottom:15px;"><div class="J_TMDStaticMod" data-type="afterSale" data-params="{&quot;show7&quot;:true}"><div class="server-container b-detail" style="border:1px solid #e6e6e6;"><dl class="promise-server" style="margin:0px;padding:5px 5px 0px;line-height:1.5;overflow:hidden;"><dd class="first-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:270px;display:inline;"><div style="padding:10px;"><br class="Apple-interchange-newline" />天猫的商家出售均为正品，承诺提供&quot;正品保障&quot;服务，一旦发现有出售假货及非原厂正品商品,买家可在交易成功后向天猫投诉商家并申请天猫使用商家保证金余额进行先行赔付。</div></dd><dt class="second-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-130px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#TGFP" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="second-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border-right-width:1px;border-right-style:solid;border-right-color:#e6e6e6;float:left;word-wrap:break-word;overflow:hidden;width:113px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家均提供商品发票。</div></dd><dt class="third-dt" style="margin:10px 2px 0px;padding:0px;background-image:url(http://img01.taobaocdn.com/tps/i1/t1zufyxgpyxxxxxxxx-192-200.png);float:left;height:75px;overflow:hidden;width:74px;border-right-width:1px;border-right-style:solid;border-right-color:#f0f0f0;display:inline;background-position:-60px -59px;background-repeat:no-repeat no-repeat;"><a href="http://www.tmall.com/go/chn/mall2010/promise.php#QTTH" target="_blank" style="text-decoration:initial;color:#2953a6;width:74px;height:75px;display:block;"></a></dt><dd class="split-end third-dd" style="margin:0px 0px -1000px;padding:0px 0px 1000px;border:none;float:left;word-wrap:break-word;overflow:hidden;width:110px;display:inline;"><div style="padding:10px;">对于在天猫购物的买家提供&quot;七天无理由退换货&quot;的保障服务。</div></dd></dl></div><div class="tb-weiQuanBox" style="border:1px solid #e6e6e6;color:#333333;padding:20px;margin-top:10px;"><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-cn" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:90px;background-position:0px -81px;background-repeat:no-repeat no-repeat;margin-left:-50px;"></strong>天猫承诺</h5><ol class="tb-chengNuo" style="margin:0px;padding:10px 10px 20px;list-style:none;line-height:20px;"><li style="margin:0px;padding:0px;"><p>1、您付款之后，如果商家延迟发货，可以获得商品价格30%（不大于500元）的赔付金，<a href="http://service.tmall.com/support/tmall/knowledge-1126800.htm" target="_blank" style="text-decoration:initial;color:#2953a6;">详见</a></p></li><li style="margin:0px;padding:0px;"><p>2、天猫所有在售商品均支持7天无理由退货（不包含珠宝类和定制商品）；</p></li><li style="margin:0px;padding:0px;"><p>3、天猫所有在售商品均开具正规发票；</p></li><li style="margin:0px;padding:0px;"><p>4、天猫所售商品均为正品行货，如商家出售假货，支持假一赔三处理，并清退商家。</p></li></ol><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-lc" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:188px;background-position:-90px -81px;background-repeat:no-repeat no-repeat;margin-left:-94px;"></strong>维权服务发起流程</h5><p class="tb-weiQuanLiuCheng" style="padding:30px;height:70px;text-align:center;position:relative;margin-top:0px;margin-bottom:0px;"><strong style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:81px;top:23px;left:50%;z-index:3;width:612px;background-position:0px 0px;background-repeat:no-repeat no-repeat;margin-left:-306px;"></strong>购买商品出现问题-未确认收货-发起退款申请-天猫客服48小时内介入纠纷调解-退款成功；<br />购买商品出现问题-已确认收货-发起维权申请-天猫客服48小时内介入纠纷调解-维权成功</p><h5 style="margin:0px;padding:20px 0px 0px;font-size:12px;text-align:center;height:32px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#e6e6e6;position:relative;"><strong class="tb-title-bz" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);position:absolute;height:23px;top:16px;left:50%;z-index:3;width:180px;background-position:-279px -81px;background-repeat:no-repeat no-repeat;margin-left:-74px;"></strong>退换货服务标准</h5><dl class="tb-tuiBiaoZhun" style="margin:0px;padding:0px 10px 20px;line-height:20px;"><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货基本条件：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">对全部商品：</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">外包装完整，且不影响二次销售。一旦拆封无法复原商品不可退货（质量问题除外）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">若交易已完成，发现质量问题，请在交易完成后15天内进行退款申请。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">退款时买家需将发票和赠品一起退回。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">不可退换货特殊说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">无质量问题且外包装已拆无法复原，影响二次销售。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">为客户特殊定制的商品不支持7天无理由退换货。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">人为刻意损害或不可抗力导致的损坏。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">7天无理由退换货超过食用期限的商品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">非天猫店铺出售的商品或已超出退换货期限的商品（7天无理由退货以签收日为准起始7日之内）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">商品的图片及信息仅供参考。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有细微色差。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退换货费用说明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是买家原因退货，由买家自行承担退货费用。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">如果是商品质量问题、描述不符而导致的退货，退货费用则应由店铺承担。</dd><dt style="margin:0px;padding:15px 0px 0px;font-weight:bold;">退货时可能涉及的证明：</dt><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">购货发票以及赠品。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">权威检验机构以及品牌所有者出具的鉴定报告或其他能够证明所购买商品为假货的凭证。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">旺旺聊天记录截图（在使用阿里旺旺与店铺沟通时，请事先在系统设置-聊天设置中选择“将我的消息记录保存到阿里旺旺服务器上”）。</dd><dd style="margin:0px;padding:0px 0px 0px 20px;background-image:url(http://img03.taobaocdn.com/tps/i3/t1i6otxbvkxxxxxxxx-620-109.png);background-position:-605px -81px;background-repeat:no-repeat no-repeat;">其他天猫需要双方出具的证明文件。</dd></dl></div></div></div></li></ul></div><div class="J_TMDStaticMod" data-type="official" style="color:#404040;font-family:tahoma, arial, 宋体;font-size:12px;line-height:18px;background-color:#ffffff;"><div id="official-remind" style="clear:both;padding:10px;background-color:#ffffe5;border:1px solid #ffcc7f;background-position:initial initial;background-repeat:initial initial;margin-top:20px;"><dl class="tb-secu" style="margin:0px 0px 10px;padding:0px 0px 10px 68px;line-height:2;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ffe8ca;"><dt style="margin:0px 0px 0px -68px;padding:0px;display:inline;float:left;width:68px;font-weight:bold;">安全提示：</dt><dd style="margin:0px;padding:0px;"><p style="padding:0px;margin-top:0px;margin-bottom:0px;">交易过程中请勿随意接收卖家发送的可疑文件，请勿点击不明来源的链接，付款前请务必详细核对支付信息。</p><p class="tm-secu clearfix" style="padding:0px;margin-top:0px;margin-bottom:0px;"><em style="font-style:normal;float:left;">推荐安全软件：</em><span class="tm-secu-tb" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1ozn4xj8xxxaxn9_d-16-330.png);float:left;margin:4px 10px 0px 0px;color:#999999;height:16px;line-height:16px;background-position:0px -150px;background-repeat:no-repeat no-repeat;padding-left:18px;">淘宝浏览器</span><span class="tm-secu-360" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1ozn4xj8xxxaxn9_d-16-330.png);float:left;margin:4px 10px 0px 0px;color:#999999;height:16px;line-height:16px;background-position:0px -166px;background-repeat:no-repeat no-repeat;padding-left:18px;">360网盾</span><span class="tm-secu-king" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1ozn4xj8xxxaxn9_d-16-330.png);float:left;margin:4px 10px 0px 0px;color:#999999;height:16px;line-height:16px;background-position:0px -182px;background-repeat:no-repeat no-repeat;padding-left:18px;">金山卫士</span><span class="tm-secu-sogou" style="background-image:url(http://img03.taobaocdn.com/tps/i3/t1ozn4xj8xxxaxn9_d-16-330.png);float:left;margin:4px 10px 0px 0px;color:#999999;height:16px;line-height:16px;background-position:0px -198px;background-repeat:no-repeat no-repeat;padding-left:18px;">搜狗浏览器</span><a href="http://110.taobao.com/home/software.htm?spm=3.69637.227610.1&amp;tracelog=detail_aq" target="_blank" style="text-decoration:initial;color:#2953a6;">淘宝网安全中心&gt;&gt;</a></p></dd></dl><dl class="tb-exemption" style="margin:0px;padding:0px 0px 0px 68px;line-height:2;"><dt style="margin:0px 0px 0px -68px;padding:0px;display:inline;float:left;width:68px;font-weight:bold;">免责声明：</dt><dd style="margin:0px;padding:0px;">天猫所展示的宝贝供求信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。天猫不提供任何保证，并不承担任何法律责任。天猫友情提醒：为保障您的利益，请网上成交，贵重宝贝，请使用<a href="http://www.taobao.com/strade/strade.php" target="_blank" style="text-decoration:initial;color:#2953a6;">支付宝</a>交易。</dd></dl></div></div><p><br /></p>', 11);

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_list`
--

CREATE TABLE IF NOT EXISTS `hd_goods_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `attr` varchar(45) DEFAULT NULL COMMENT '商品属性(属性ID，属性值ID|属性ID，属性值ID）',
  `gid` int(10) unsigned NOT NULL COMMENT '所属商品ID',
  `number` varchar(20) NOT NULL DEFAULT '0' COMMENT '货号',
  `series` varchar(40) NOT NULL DEFAULT '0' COMMENT '套餐',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '套餐价格',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品列表(不同货品的库存、货号)' AUTO_INCREMENT=165 ;

--
-- 转存表中的数据 `hd_goods_list`
--

INSERT INTO `hd_goods_list` (`id`, `inventory`, `attr`, `gid`, `number`, `series`, `price`) VALUES
(162, 323, '37,112|38,118', 10, '12321334', '', 0),
(163, 212, '37,114|38,120', 10, '32343243', '1359374165569', 322),
(151, 67, '37,145|38,147', 11, '23243424443', '', 0),
(157, 90, '37,171|38,172', 12, '643334234', '', 0),
(156, 89, '37,170|38,172', 12, '123143243', '1359343490641', 56),
(150, 890, '37,144|38,146', 11, '6747543243', '1359343422863', 78),
(159, 67, '37,196|38,198', 13, '32456', '1359372699898', 453),
(158, 3243, '37,195|38,198', 13, '324324', '', 0),
(161, 321, '37,115|38,116', 10, '324132432', '', 0),
(160, 323, '37,197|38,198', 13, '3256', '', 0),
(164, 323, '37,112|38,117', 10, '3124321432', '1359374170813', 213);

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_type`
--

CREATE TABLE IF NOT EXISTS `hd_goods_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类型' AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `hd_goods_type`
--

INSERT INTO `hd_goods_type` (`id`, `name`) VALUES
(11, '黄金'),
(10, '靴子'),
(9, '腰带'),
(8, '服装'),
(12, '化妆品'),
(13, '运动鞋'),
(14, '手机'),
(15, '电器'),
(16, '家具'),
(17, '家纺/饰品'),
(18, '奶粉'),
(19, '食品'),
(20, '医药'),
(21, '汽车'),
(22, '图书'),
(23, '消费卷');

-- --------------------------------------------------------

--
-- 表的结构 `hd_order`
--

CREATE TABLE IF NOT EXISTS `hd_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `consignee` varchar(45) DEFAULT NULL COMMENT '收货人',
  `mobile` varchar(15) DEFAULT NULL COMMENT '联系手机',
  `tel` varchar(15) DEFAULT NULL COMMENT '联系固话',
  `address` varchar(45) DEFAULT NULL COMMENT '地址',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单生成时间',
  `status` enum('待审核','待付款','未发货','已发货','已完成') NOT NULL DEFAULT '待付款' COMMENT '订单状态',
  `uid` int(10) unsigned NOT NULL COMMENT '所属用户ID',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_order_list`
--

CREATE TABLE IF NOT EXISTS `hd_order_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` smallint(6) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '小计',
  `remark` varchar(45) NOT NULL DEFAULT '' COMMENT '订单备注说明',
  `gid` int(10) unsigned NOT NULL COMMENT '商品ID',
  `oid` int(10) unsigned NOT NULL COMMENT '所属订单ID',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`),
  KEY `oid` (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单商品列表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_type_attr`
--

CREATE TABLE IF NOT EXISTS `hd_type_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '属性名称',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '选择类型（1:属性，2：规格，规格可以指定价格）',
  `tid` int(10) unsigned NOT NULL COMMENT '所属类型ID',
  `gselect` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='类型属性' AUTO_INCREMENT=107 ;

--
-- 转存表中的数据 `hd_type_attr`
--

INSERT INTO `hd_type_attr` (`id`, `name`, `value`, `type`, `tid`, `gselect`) VALUES
(20, '品牌', '0', 0, 8, '0'),
(19, '面料', '蕾丝|涤丝纺|记忆/仿记忆面料', 0, 8, '0'),
(18, '年份', '0', 0, 8, '0'),
(17, '材质', '0', 0, 8, '0'),
(16, '图案', '0', 0, 8, '0'),
(15, '领子', '0', 0, 8, '0'),
(14, '通勤', '英伦|常规', 0, 8, '0'),
(13, '板型', '修身型|宽松型|直筒型', 0, 8, '1'),
(12, '主图来源', '0', 0, 8, '0'),
(21, '厚薄', '加厚|超薄', 0, 8, '0'),
(22, '衣长', '短款(40cm<衣长≤50cm)|常规款(50cm<衣长≤65cm)|中长款(65cm<衣长≤80cm)|   长款(80cm<衣长≤100cm)', 0, 8, '1'),
(23, '风格', '甜美|通勤|原创设计|百搭|街头', 0, 8, '1'),
(24, '袖型', '常规袖|毛袖|笼袖', 0, 8, '0'),
(25, '流行元素/工艺', '0', 0, 8, '0'),
(26, '填充料', '0', 0, 8, '0'),
(27, '颜色分类', '黑色|白色|黄色|紫色|蓝色', 0, 8, '0'),
(28, '货号', '0', 0, 8, '0'),
(29, '袖长', '长袖|短袖|摆袖', 0, 8, '0'),
(30, '衣门襟', '拉链|纽扣', 0, 8, '0'),
(31, '主材质含量', '0', 0, 8, '0'),
(32, '价格', '100-500|500-800|800-1000|1000-1200|1200-1500|1500+', 0, 8, '0'),
(33, '尺码', '大码|中码|小码', 0, 8, '0'),
(34, '品牌', '0', 0, 8, '0'),
(35, '尺码', 'X|XL|XXL|XXXL', 1, 9, '0'),
(36, '颜色分类', '白色|红色|蓝色|灰色|粉红', 1, 9, '0'),
(37, '尺码', 'X|XL|XXL|XXXL', 1, 8, '0'),
(38, '颜色分类', '白色|红色|蓝色|灰色|粉红', 1, 8, '0'),
(39, '材质特性', '光面|粗面', 0, 9, '0'),
(40, '带扣材质', '合金头|纽扣', 1, 9, '0'),
(41, '风格', '休闲|商务', 0, 9, '0'),
(42, '配件性别', '通用型|男型|女型', 0, 9, '0'),
(43, '款式', '腰带|装饰', 0, 9, '0'),
(44, '带身元素', '光身|花纹', 1, 9, '0'),
(45, '流行元素', '0', 0, 9, '0'),
(46, '佩戴部位', '腰部|腿部', 0, 9, '0'),
(47, '颜色分类', '蓝色|黄色|白色', 0, 9, '0'),
(48, '主材质', '牛皮|棉', 0, 9, '0'),
(49, '带扣', '针抠|纽扣', 0, 9, '0'),
(50, '带身宽度', '3-4cm|5-6cm|6-8cm', 0, 9, '0'),
(51, '长度', '单圈|多圈', 0, 9, '0'),
(52, '货号', '0', 0, 9, '0'),
(53, '品牌', '0', 0, 10, '0'),
(54, '风格', '甜美|休闲', 0, 10, '0'),
(55, '皮质特征', '0', 0, 10, '0'),
(56, '筒高:', '短靴|中靴|高筒靴', 0, 10, '0'),
(57, '鞋跟形状', '平跟|高跟', 1, 10, '0'),
(58, '制作工艺', '0', 0, 10, '0'),
(59, '图案', '0', 0, 10, '0'),
(60, '体积(含包装)', '0', 0, 10, '0'),
(61, '场合', '休闲|商务', 0, 10, '0'),
(62, '货号', '0', 0, 10, '0'),
(63, '帮面材质', '0', 0, 10, '0'),
(64, '鞋底材质', '0', 0, 10, '0'),
(65, '鞋头', '0', 0, 10, '0'),
(66, '闭合方式', '0', 0, 10, '0'),
(67, '颜色分类', '巧克力色|栗色|沙色|黑色|灰色', 0, 10, '0'),
(68, '适合季节', '夏季|春季|秋季|冬季', 0, 10, '0'),
(69, '重量(含包装)', '0', 0, 10, '0'),
(70, '上市年份', '0', 0, 10, '0'),
(71, '内里材质', '0', 0, 10, '0'),
(72, '女鞋流行靴款', '0', 0, 10, '0'),
(73, '跟高', '平梗|高梗', 0, 10, '0'),
(74, '流行元素', '0', 0, 10, '0'),
(75, '尺码', '大码|中码|小码', 0, 10, '0'),
(76, '价格区间', '100-200|200-500|500-800|800-1000|1000-1500|1500+', 0, 10, '0'),
(77, '消费人群', '青年|老年|小孩|中年', 0, 10, '0'),
(78, '尺码', '大号码|小号码|中号码', 1, 10, '0'),
(79, '货号', '0', 0, 11, '0'),
(80, '是否镶嵌', '是|否', 0, 11, '0'),
(81, '贵重珠宝款式', '0', 0, 11, '0'),
(82, '品牌', '0', 0, 11, '0'),
(83, '图案/形状', '0', 0, 11, '0'),
(84, '售后', '0', 0, 11, '0'),
(85, '贵金属成色', '0', 0, 11, '0'),
(86, '化妆品规格', '0', 0, 12, '0'),
(87, '适合肤质', '0', 0, 12, '0'),
(88, '品牌', '0', 0, 12, '0'),
(89, '化妆品特性', '0', 0, 12, '0'),
(90, '面部护理套装', '0', 0, 12, '0'),
(91, '颜色分类', '0', 0, 13, '0'),
(92, '尺码', '30|31|32|33|34|35|36|37|38|39|40|41|42', 1, 13, '0'),
(93, '颜色分类', '黄色|白色|蓝色|棕色', 1, 13, '0'),
(94, '上市年份', '0', 0, 13, '0'),
(95, '是否现货', '是|否', 0, 13, '0'),
(96, '运动鞋外底材料', '0', 0, 13, '0'),
(97, '价格区间', '100-200|200-300|300-1000', 0, 13, '0'),
(98, '货号', '0', 0, 13, '0'),
(99, '吊牌价', '0', 0, 13, '0'),
(100, '鞋帮款式', '0', 0, 13, '0'),
(101, '运动鞋功能', '0', 0, 13, '0'),
(102, '帆布鞋闭合方式', '0', 0, 13, '0'),
(103, '品牌', '0', 0, 13, '0'),
(104, '运动鞋性别', '男|女|通用', 0, 13, '0'),
(105, '鞋面材料', '0', 0, 13, '0'),
(106, '系列', '0', 0, 13, '0');

-- --------------------------------------------------------

--
-- 表的结构 `hd_user`
--

CREATE TABLE IF NOT EXISTS `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '手机',
  `tel` char(15) NOT NULL DEFAULT '' COMMENT '固定电话',
  `email` char(35) NOT NULL DEFAULT '' COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `hd_user`
--

INSERT INTO `hd_user` (`id`, `username`, `password`, `mobile`, `tel`, `email`) VALUES
(1, 'mao', '96e79218965eb72c92a549dd5a330112', '1392812213', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
