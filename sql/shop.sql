-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 22 日 12:31
-- 服务器版本: 5.5.29
-- PHP 版本: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `logo` varchar(45) NOT NULL DEFAULT '' COMMENT '品牌LOGO',
  `cid` int(10) unsigned NOT NULL COMMENT '所属栏目ID',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品品牌' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品分类' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `hd_category`
--

INSERT INTO `hd_category` (`id`, `name`, `pid`, `tid`) VALUES
(1, '手机', 0, 6),
(2, '智能机', 1, 6),
(3, '非智能机', 1, 6),
(4, '服装', 0, 3),
(6, '冬装', 4, 3),
(10, '棉袄', 6, 3),
(9, '夏装', 4, 3);

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
  `pic` varchar(45) NOT NULL DEFAULT '' COMMENT '列表页展示图',
  `click` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐商品(1:是,0:否)',
  `hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖商品(1:是,0:否)',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上架时间',
  `cid` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  `bid` int(10) unsigned NOT NULL COMMENT '所属品牌ID',
  `tid` int(10) unsigned NOT NULL COMMENT '所属类型ID',
  `aid` int(10) unsigned NOT NULL COMMENT '上架管理员ID',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `bid` (`bid`),
  KEY `tid` (`tid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性值' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品介绍' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_list`
--

CREATE TABLE IF NOT EXISTS `hd_goods_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL DEFAULT '' COMMENT '商品货号',
  `inventory` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `attr` varchar(45) DEFAULT NULL COMMENT '商品属性(属性ID|属性ID)',
  `gid` int(10) unsigned NOT NULL COMMENT '所属商品ID',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品列表(不同货品的库存、货号)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `hd_goods_type`
--

CREATE TABLE IF NOT EXISTS `hd_goods_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类型' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `hd_goods_type`
--

INSERT INTO `hd_goods_type` (`id`, `name`) VALUES
(2, '书包'),
(3, '裤子'),
(5, '耳机'),
(6, '手机');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='类型属性' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hd_type_attr`
--

INSERT INTO `hd_type_attr` (`id`, `name`, `value`, `type`, `tid`) VALUES
(1, '尺码', '28|29|30|31', 1, 3),
(2, '颜色', '黑色|黄色|白色|蓝色', 1, 3),
(3, '货号', '0', 0, 3);

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

