-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 25 日 20:32
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品品牌' AUTO_INCREMENT=26 ;

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
(25, 'Septwolves', '/thinkmao/Uploads/brand/201301/51025161e8846.jpg', 16, '1', '七匹狼狼文化的理念是勇敢，忠诚，沟通，力量，团队，不屈，自信。追逐人生，男人不止一面。');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品分类' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `hd_category`
--

INSERT INTO `hd_category` (`id`, `name`, `pid`, `tid`) VALUES
(19, '精致内衣', 14, 8),
(18, '时尚家居', 14, 8),
(17, '精品男装', 14, 8),
(16, '服饰配件', 14, 0),
(15, '品牌女装', 14, 0),
(14, '服装/内衣/配件', 0, 8);

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
  `cid` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  `bid` int(10) unsigned NOT NULL COMMENT '所属品牌ID',
  `tid` int(10) unsigned NOT NULL COMMENT '所属类型ID',
  `aid` int(10) unsigned NOT NULL COMMENT '上架管理员ID',
  `mprice` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `bid` (`bid`),
  KEY `tid` (`tid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hd_goods`
--

INSERT INTO `hd_goods` (`id`, `name`, `unit`, `number`, `price`, `pic`, `click`, `recommend`, `hot`, `time`, `cid`, `bid`, `tid`, `aid`, `mprice`) VALUES
(4, 'aaa', 'aa', '324234', 3243.00, '/thinkmao/Uploads/img_list/201301/51027ac6d1644.jpg', 3421, 1, 1, 1359117013, 15, 17, 8, 1, '13423');

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_attr`
--

CREATE TABLE IF NOT EXISTS `hd_goods_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT '属性值',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `gid` int(10) unsigned NOT NULL COMMENT '商品ID',
  `aid` int(10) unsigned NOT NULL COMMENT '属性ID',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品属性值' AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `hd_goods_attr`
--

INSERT INTO `hd_goods_attr` (`id`, `value`, `price`, `gid`, `aid`) VALUES
(30, '长款(80cm<衣长≤100cm)', NULL, 4, 22),
(29, '加厚', NULL, 4, 21),
(28, 'wqwq', NULL, 4, 12),
(27, '宽松型', NULL, 4, 13),
(26, '英伦', NULL, 4, 14),
(25, 'sds', NULL, 4, 15),
(24, 'tuan', NULL, 4, 16),
(23, 'ciazhi', NULL, 4, 17),
(22, '2101', NULL, 4, 18),
(21, '记忆/仿记忆面料', NULL, 4, 19),
(20, 'orchily', NULL, 4, 20),
(31, '通勤', NULL, 4, 23),
(32, '毛袖', NULL, 4, 24),
(33, 'wq', NULL, 4, 25),
(34, 'qwq', NULL, 4, 26),
(35, '紫色', NULL, 4, 27),
(36, 'qwqwqw', NULL, 4, 28),
(37, '短袖', NULL, 4, 29),
(38, '纽扣', NULL, 4, 30),
(39, 'wqwqw', NULL, 4, 31),
(40, '1200-1500', NULL, 4, 32),
(41, '中码', NULL, 4, 33),
(42, 'wqwq', NULL, 4, 34),
(43, 'XXXL', 213.00, 4, 37),
(44, 'XL', 890.00, 4, 37),
(45, 'X', 565.00, 4, 37),
(46, '粉红', 32.00, 4, 38),
(47, '蓝色', 67.00, 4, 38);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品介绍' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hd_goods_intro`
--

INSERT INTO `hd_goods_intro` (`id`, `mini`, `medium`, `max`, `intro`, `service`, `gid`) VALUES
(4, '/thinkmao/Uploads/img_list/201301/mini51027ac27fc3f.jpg', '/thinkmao/Uploads/img_list/201301/max51027ac27fc3f.jpg', '/thinkmao/Uploads/img_list/201301/51027ac27fc3f.jpg', '<p>3423432</p>', '<p>21321321</p>', 4);

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_list`
--

CREATE TABLE IF NOT EXISTS `hd_goods_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `attr` varchar(45) DEFAULT NULL COMMENT '商品属性(属性ID,该选项索引|属性ID,该选项索引)',
  `gid` int(10) unsigned NOT NULL COMMENT '所属商品ID',
  `number` varchar(20) NOT NULL DEFAULT '0' COMMENT '货号',
  `series` int(20) NOT NULL DEFAULT '0' COMMENT '套餐',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品列表(不同货品的库存、货号)' AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_type`
--

CREATE TABLE IF NOT EXISTS `hd_goods_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类型' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `hd_goods_type`
--

INSERT INTO `hd_goods_type` (`id`, `name`) VALUES
(10, '靴子'),
(9, '腰带'),
(8, '服装');

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
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='类型属性' AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `hd_type_attr`
--

INSERT INTO `hd_type_attr` (`id`, `name`, `value`, `type`, `tid`) VALUES
(20, '品牌', '0', 0, 8),
(19, '面料', '蕾丝|涤丝纺|记忆/仿记忆面料', 0, 8),
(18, '年份', '0', 0, 8),
(17, '材质', '0', 0, 8),
(16, '图案', '0', 0, 8),
(15, '领子', '0', 0, 8),
(14, '通勤', '英伦|常规', 0, 8),
(13, '板型', '修身型|宽松型|直筒型', 0, 8),
(12, '主图来源', '0', 0, 8),
(21, '厚薄', '加厚|超薄', 0, 8),
(22, '衣长', '短款(40cm<衣长≤50cm)|常规款(50cm<衣长≤65cm)|中长款(65cm<衣长≤80cm)|   长款(80cm<衣长≤100cm)', 0, 8),
(23, '风格', '甜美|通勤|原创设计|百搭|街头', 0, 8),
(24, '袖型', '常规袖|毛袖|笼袖', 0, 8),
(25, '流行元素/工艺', '0', 0, 8),
(26, '填充料', '0', 0, 8),
(27, '颜色分类', '黑色|白色|黄色|紫色|蓝色', 0, 8),
(28, '货号', '0', 0, 8),
(29, '袖长', '长袖|短袖|摆袖', 0, 8),
(30, '衣门襟', '拉链|纽扣', 0, 8),
(31, '主材质含量', '0', 0, 8),
(32, '价格', '100-500|500-800|800-1000|1000-1200|1200-1500|1500+', 0, 8),
(33, '尺码', '大码|中码|小码', 0, 8),
(34, '品牌', '0', 0, 8),
(35, '尺码', 'X|XL|XXL|XXXL', 1, 9),
(36, '颜色分类', '白色|红色|蓝色|灰色|粉红', 1, 9),
(37, '尺码', 'X|XL|XXL|XXXL', 1, 8),
(38, '颜色分类', '白色|红色|蓝色|灰色|粉红', 1, 8),
(39, '材质特性', '光面|粗面', 0, 9),
(40, '带扣材质', '合金头|纽扣', 1, 9),
(41, '风格', '休闲|商务', 0, 9),
(42, '配件性别', '通用型|男型|女型', 0, 9),
(43, '款式', '腰带|装饰', 0, 9),
(44, '带身元素', '光身|花纹', 1, 9),
(45, '流行元素', '0', 0, 9),
(46, '佩戴部位', '腰部|腿部', 0, 9),
(47, '颜色分类', '蓝色|黄色|白色', 0, 9),
(48, '主材质', '牛皮|棉', 0, 9),
(49, '带扣', '针抠|纽扣', 0, 9),
(50, '带身宽度', '3-4cm|5-6cm|6-8cm', 0, 9),
(51, '长度', '单圈|多圈', 0, 9),
(52, '货号', '0', 0, 9),
(53, '品牌', '0', 0, 10),
(54, '风格', '甜美|休闲', 0, 10),
(55, '皮质特征', '0', 0, 10),
(56, '筒高:', '短靴|中靴|高筒靴', 0, 10),
(57, '鞋跟形状', '平跟|高跟', 1, 10),
(58, '制作工艺', '0', 0, 10),
(59, '图案', '0', 0, 10),
(60, '体积(含包装)', '0', 0, 10),
(61, '场合', '休闲|商务', 0, 10),
(62, '货号', '0', 0, 10),
(63, '帮面材质', '0', 0, 10),
(64, '鞋底材质', '0', 0, 10),
(65, '鞋头', '0', 0, 10),
(66, '闭合方式', '0', 0, 10),
(67, '颜色分类', '巧克力色|栗色|沙色|黑色|灰色', 0, 10),
(68, '适合季节', '夏季|春季|秋季|冬季', 0, 10),
(69, '重量(含包装)', '0', 0, 10),
(70, '上市年份', '0', 0, 10),
(71, '内里材质', '0', 0, 10),
(72, '女鞋流行靴款', '0', 0, 10),
(73, '跟高', '平梗|高梗', 0, 10),
(74, '流行元素', '0', 0, 10),
(75, '尺码', '大码|中码|小码', 0, 10),
(76, '价格区间', '100-200|200-500|500-800|800-1000|1000-1500|1500+', 0, 10),
(77, '消费人群', '青年|老年|小孩|中年', 0, 10),
(78, '尺码', '大号码|小号码|中号码', 1, 10);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
