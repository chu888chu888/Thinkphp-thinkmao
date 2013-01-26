-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 27 日 02:39
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品分类' AUTO_INCREMENT=54 ;

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
(34, '羽绒服', 15, 8),
(35, '毛衣裙', 15, 8),
(36, '毛呢外套', 15, 8),
(37, '毛衣', 15, 8),
(38, '真皮皮衣', 15, 8),
(39, '外套', 15, 8),
(40, '休闲裤', 15, 8),
(41, '牛仔裤', 15, 8),
(42, '皮草', 15, 8),
(43, '针织衫', 15, 8),
(44, '棉衣服装', 15, 8),
(45, '衬衫', 15, 8),
(46, 'T恤', 15, 8),
(47, '卫衣', 15, 8),
(48, '婚纱/礼服/旗袍', 15, 8),
(49, '短外套', 15, 8),
(50, '风衣', 15, 8),
(51, '半身裙', 15, 8),
(52, '小西装', 15, 8),
(53, '中老年服装', 15, 8);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `hd_goods`
--

INSERT INTO `hd_goods` (`id`, `name`, `unit`, `number`, `price`, `pic`, `click`, `recommend`, `hot`, `time`, `cid`, `bid`, `tid`, `aid`, `mprice`) VALUES
(10, '【优】【爆】Ochirly欧时力新女秋装长袖羊毛呢外套1115340700', '件', '1115340700133', 449.00, '/thinkmao/Uploads/img_list/201301/510290ad9a59d.jpg', 3421, 1, 1, 1359122607, 15, 17, 8, 1, '1390.00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品属性值' AUTO_INCREMENT=121 ;

--
-- 转存表中的数据 `hd_goods_attr`
--

INSERT INTO `hd_goods_attr` (`id`, `value`, `price`, `gid`, `aid`) VALUES
(109, '500-800', NULL, 10, 32),
(108, ' 51%-70%', NULL, 10, 31),
(107, '纽扣', NULL, 10, 30),
(106, '长袖', NULL, 10, 29),
(105, '1115340700133', NULL, 10, 28),
(104, '白色', NULL, 10, 27),
(103, '仿呢料', NULL, 10, 26),
(102, '休闲', NULL, 10, 25),
(101, '常规袖', NULL, 10, 24),
(100, '街头', NULL, 10, 23),
(99, '常规款(50cm<衣长≤65cm)', NULL, 10, 22),
(98, '加厚', NULL, 10, 21),
(97, '实拍', NULL, 10, 12),
(96, '修身型', NULL, 10, 13),
(95, '常规', NULL, 10, 14),
(94, '立领', NULL, 10, 15),
(93, '花纹', NULL, 10, 16),
(92, '涤纶', NULL, 10, 17),
(91, '2012', NULL, 10, 18),
(90, '记忆/仿记忆面料', NULL, 10, 19),
(89, 'Ochirly/欧时力', NULL, 10, 20),
(110, '中码', NULL, 10, 33),
(111, 'Ochirly/欧时力', NULL, 10, 34),
(112, 'X', 10.00, 10, 37),
(113, 'XXXL', 40.00, 10, 37),
(114, 'XXL', 30.00, 10, 37),
(115, 'XL', 20.00, 10, 37),
(116, '粉红', 20.00, 10, 38),
(117, '白色', 20.00, 10, 38),
(118, '灰色', 78.00, 10, 38),
(119, '红色', 56.00, 10, 38),
(120, '灰色', 40.00, 10, 38);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品介绍' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `hd_goods_intro`
--

INSERT INTO `hd_goods_intro` (`id`, `mini`, `medium`, `max`, `intro`, `service`, `gid`) VALUES
(10, '/thinkmao/Uploads/img_list/201301/mini510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/mini510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/mini5102909d4845f.jpg', '/thinkmao/Uploads/img_list/201301/max510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/max510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/max5102909d4845f.jpg', '/thinkmao/Uploads/img_list/201301/510290a50f146.jpg|/thinkmao/Uploads/img_list/201301/510290a15f589.jpg|/thinkmao/Uploads/img_list/201301/5102909d4845f.jpg', '<p><img src="/thinkmao/Public/Ueditor/php/upload/64971359122206.jpg" /><br /></p>', '', 10);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品列表(不同货品的库存、货号)' AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `hd_goods_list`
--

INSERT INTO `hd_goods_list` (`id`, `inventory`, `attr`, `gid`, `number`, `series`) VALUES
(66, 788, '0,1|1,3', 10, '5657', 0),
(65, 32, '0,2|1,2', 10, '564', 0),
(64, 231, '0,0|1,2', 10, '2132', 2147483647);

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
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='类型属性' AUTO_INCREMENT=107 ;

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
(78, '尺码', '大号码|小号码|中号码', 1, 10),
(79, '货号', '0', 0, 11),
(80, '是否镶嵌', '是|否', 0, 11),
(81, '贵重珠宝款式', '0', 0, 11),
(82, '品牌', '0', 0, 11),
(83, '图案/形状', '0', 0, 11),
(84, '售后', '0', 0, 11),
(85, '贵金属成色', '0', 0, 11),
(86, '化妆品规格', '0', 0, 12),
(87, '适合肤质', '0', 0, 12),
(88, '品牌', '0', 0, 12),
(89, '化妆品特性', '0', 0, 12),
(90, '面部护理套装', '0', 0, 12),
(91, '颜色分类', '0', 0, 13),
(92, '尺码', '30|31|32|33|34|35|36|37|38|39|40|41|42', 1, 13),
(93, '颜色分类', '黄色|白色|蓝色|棕色', 1, 13),
(94, '上市年份', '0', 0, 13),
(95, '是否现货', '是|否', 0, 13),
(96, '运动鞋外底材料', '0', 0, 13),
(97, '价格区间', '100-200|200-300|300-1000', 0, 13),
(98, '货号', '0', 0, 13),
(99, '吊牌价', '0', 0, 13),
(100, '鞋帮款式', '0', 0, 13),
(101, '运动鞋功能', '0', 0, 13),
(102, '帆布鞋闭合方式', '0', 0, 13),
(103, '品牌', '0', 0, 13),
(104, '运动鞋性别', '男|女|通用', 0, 13),
(105, '鞋面材料', '0', 0, 13),
(106, '系列', '0', 0, 13);

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
