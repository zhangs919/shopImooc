DROP DATABASE IF EXISTS `shopImooc`;
CREATE DATABASE IF NOT EXISTS `shopImooc`;
USE `shopImooc`;
--管理员表
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
`id` tinyint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`email` varchar(50) not null
) ENGINE=MyISAM CHARSET=utf8;

--分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
`id` smallint unsigned auto_increment key,
`cName` varchar(50) unique
) ENGINE=MyISAM CHARSET=utf8;

--商品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
`id` int unsigned auto_increment key,
`pName` varchar(50) not null unique,
`pSn` varchar(50) not null,
`pNum` int unsigned default 1,
`mPrice` decimal(10,2) not null,
`iPrice` decimal(10,2) not null,
`pDesc` text,
`pImg` varchar(50) not null,
`pubTime` int unsigned not null,
`isShow` tinyint(1) default 1,
`isHot` tinyint(1) default 0,
`cId` smallint unsigned not null
) ENGINE=MyISAM CHARSET=utf8;

--用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`sex` enum("男","女","保密") not null default "保密",
`face` varchar(50) not null,
`regTime` int unsigned not null
) ENGINE=MyISAM CHARSET=utf8;

--相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,
`albumPath` varchar(50) not null
) ENGINE=MyISAM CHARSET=utf8;

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
  `status` tinyint(1) NOT NULL,
  `sort` smallint(6) NOT NULL,
  `url` varchar(255) NOT NULL,
  `navtype` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;












