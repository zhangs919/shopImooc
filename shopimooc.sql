-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-09-09 14:52:01
-- 服务器版本： 5.5.20-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopimooc`
--

-- --------------------------------------------------------

--
-- 表的结构 `imooc_admin`
--

CREATE TABLE IF NOT EXISTS `imooc_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `imooc_admin`
--

INSERT INTO `imooc_admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '290648237@qq.com'),
(2, 'imooc', '098f6bcd4621d373cade4e832627b4f6', 'ad'),
(10, 'test', '098f6bcd4621d373cade4e832627b4f6', 'asdfas@asd.sad'),
(5, 'sssssss', 'eed8cdc400dfd4ec85dff70a170066b7', 'dfsdfsd'),
(6, 'asdfasf', '5e64fe04bfd8363b6c74ea86f5c867f1', 'sdfasdfs'),
(11, 'tests', 'e942a32ca77b7fc57da04e089d67ee6b', 'test@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_album`
--

CREATE TABLE IF NOT EXISTS `imooc_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `imooc_album`
--

INSERT INTO `imooc_album` (`id`, `pid`, `albumPath`) VALUES
(21, 8, '1b6de9b698c3d5d078f1214f87c6817a.jpg'),
(22, 8, '57ae7615c3d8f1c1271ad12ce5461800.jpg'),
(12, 1, '44cd2539226f851924d7e17ca2f6a2a0.jpg'),
(13, 1, 'bdceda7f26a51c9b1b4f62868e630e8c.jpg'),
(20, 8, 'd56f3bf248375f449e8c36a9581fec5e.jpg'),
(15, 1, '9adba713d6b680d35abfbc8f2b71f6fd.jpg'),
(16, 1, '2a347e1ddac1760d29c41768f39d9fb2.jpg'),
(17, 1, 'a36870f58bc8cd7cc567230279629adf.jpg'),
(23, 10, '3250fd350a2efaca42e9039d6d45a176.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_cate`
--

CREATE TABLE IF NOT EXISTS `imooc_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cName` (`cName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `imooc_cate`
--

INSERT INTO `imooc_cate` (`id`, `cName`) VALUES
(4, '美食诱惑1'),
(3, '家用电器');

-- --------------------------------------------------------

--
-- 表的结构 `imooc_node`
--

CREATE TABLE IF NOT EXISTS `imooc_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(128) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `navtype` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- 转存表中的数据 `imooc_node`
--

INSERT INTO `imooc_node` (`id`, `pid`, `name`, `title`, `path`, `remark`, `status`, `sort`, `url`, `navtype`) VALUES
(48, 0, '用户管理', 'userManage', '0,', '', 0, 0, '', 0),
(47, 0, '订单管理', 'ProOrder', '0,', '', 0, 0, '', 0),
(45, 0, '商品分类管理', 'ProCate', '0,', '', 0, 0, '', 0),
(46, 45, '添加分类', 'addCate', '0,45,', '', 0, 0, 'addCate', 0),
(43, 42, '添加商品', 'addPro', '0,42,', '', 0, 0, 'addPro', 0),
(44, 42, '商品列表', 'listPro', '0,42,', '', 0, 0, 'listPro', 0),
(42, 0, '商品管理', 'ProManage', '0,', '', 0, 0, '', 0),
(49, 48, '添加用户', 'addUser', '0,48,', '', 0, 0, 'addUser', 0),
(50, 48, '用户列表', 'listUser', '0,48,', '', 0, 0, 'listUser', 0),
(51, 0, '管理员管理', 'AdministratorManage', '0,', '', 0, 0, '', 0),
(52, 51, '添加管理员', 'addAdmin', '0,51,', '', 0, 0, 'addAdmin', 0),
(53, 51, '管理员列表', 'listAdmin', '0,51,', '', 0, 0, 'listAdmin', 0),
(54, 0, '商品图片管理', 'ProImagesManage', '0,', '', 0, 0, '', 0),
(55, 54, '商品图片列表', 'listProImages', '0,54,', '', 0, 0, 'listProImages', 0),
(56, 0, '节点管理', 'nodeManage', '0,', '', 0, 0, '', 0),
(57, 56, '添加节点', 'addNode', '0,56,', '', 0, 0, 'addNode', 0),
(58, 56, '节点列表', 'listNode', '0,56,', '', 0, 0, 'listNode', 0),
(59, 47, '订单修改', 'editOrder', '0,47,', '', 0, 0, 'editOrder', 0),
(60, 55, '商品图片列表-1', '', '0,54,55,', '', 0, 0, '', 0),
(61, 45, '商品分类列表', 'listCate', '0,45,', '', 0, 0, 'listCate', 0);

-- --------------------------------------------------------

--
-- 表的结构 `imooc_pro`
--

CREATE TABLE IF NOT EXISTS `imooc_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pSn` varchar(50) NOT NULL,
  `pNum` int(10) unsigned DEFAULT '1',
  `mPrice` decimal(10,2) NOT NULL,
  `iPrice` decimal(10,2) NOT NULL,
  `pDesc` text,
  `pubTime` int(10) unsigned NOT NULL,
  `isShow` tinyint(1) DEFAULT '1',
  `isHot` tinyint(1) DEFAULT '0',
  `cId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pName` (`pName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `imooc_pro`
--

INSERT INTO `imooc_pro` (`id`, `pName`, `pSn`, `pNum`, `mPrice`, `iPrice`, `pDesc`, `pubTime`, `isShow`, `isHot`, `cId`) VALUES
(1, '全网底价 Apple 苹果 iPad mini 16G wifi版 平板电脑 前白后银 MD531C', 'sssss222', 3232222, '23423.00', '42342342.00', '<p>\r\n	<span style="color:#656565;font-family:Simsun;font-size:14px;line-height:22px;background-color:#FFFFFF;">现在就是买mini的好时候！换代清仓直降，但苹果品质不变！A5双核，内置Lightning闪电接口，正反可插，方便人性。小身材，炫丽的7.9英寸显示屏，7.2mm的厚度，薄如铅笔。女生包包随身携带更时尚！facetime视频通话，与密友24小时畅聊不断线。微信倾力打造，你的智能助理。苹果的牌子就不用我说了，1111补仓，存货不多哦！</span>\r\n</p>\r\n<p>\r\n	<span style="color:#656565;font-family:Simsun;font-size:14px;line-height:22px;background-color:#FFFFFF;"><span style="color:#656565;font-family:Simsun;font-size:14px;line-height:22px;background-color:#FFFFFF;">现在就是买mini的好时候！换代清仓直降，但苹果品质不变！A5双核，内置Lightning闪电接口，正反可插，方便人性。小身材，炫丽的7.9英寸显示屏，7.2mm的厚度，薄如铅笔。女生包包随身携带更时尚！facetime视频通话，与密友24小时畅聊不断线。微信倾力打造，你的智能助理。苹果的牌子就不用我说了，1111补仓，存货不多哦！</span><br />\r\n</span>\r\n</p>', 1409905826, 1, 0, 4),
(8, '呃呃呃呃', 'sssss222', 3232222, '23423.00', '0.00', '士大夫士大夫', 1409995551, 1, 0, 3),
(10, 'ddddd', 'ssssssssssssssd', 0, '0.00', '0.00', 'asdaddd', 1410269886, 1, 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `imooc_user`
--

CREATE TABLE IF NOT EXISTS `imooc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `face` varchar(50) NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  `activeFlag` tinyint(1) DEFAULT '0',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `imooc_user`
--

INSERT INTO `imooc_user` (`id`, `username`, `password`, `sex`, `face`, `regTime`, `activeFlag`, `email`) VALUES
(1, 'test', 'd41d8cd98f00b204e9800998ecf8427e', '女', '0dd2d808d959b3f31cdf155584db7b14.jpg', 1409927131, 0, 'test'),
(9, 'sdfs', '6224be3286c6cd4319745ea6533fcd7a', '男', 'e61d614a1feae025790e5290438d14dc.jpg', 1409930332, 0, 'asdfas@asd.sad'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', '男', 'f91b55fbdcf1e25071cdff5ba51cf948.jpg', 1409930416, 0, 'test@qq.com'),
(11, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '保密', 'f6d65aab2da833855854ab0e6df1fda8.jpg', 1409930471, 0, 'admin@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
