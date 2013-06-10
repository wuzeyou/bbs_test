-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 10 日 15:40
-- 服务器版本: 5.6.11
-- PHP 版本: 5.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `name`, `body`, `dt`, `postid`) VALUES
(1, 'admin', '源码爱好者（CodeFans.net）提供各类编程源码、书籍教程、JavaScript/CSS特效代码以及常用软件下载等，做有质量的学习型源码下载站。<br />', '0000-00-00 00:00:00', 1),
(2, 'sdfsf', 'dfwefw', '0000-00-00 00:00:00', 1),
(3, '你妹', '你妹啊！！！', '0000-00-00 00:00:00', 1),
(4, 'dsge', 'dsfsefsgsge', '0000-00-00 00:00:00', 2),
(5, 'tester', 'test time', '2013-06-08 14:58:41', 3),
(6, 'tester', '添加评论', '2013-06-09 22:25:07', 1),
(7, '测试员', '再次测试添加评论', '2013-06-09 22:27:39', 16),
(8, '酱油', '我们一起来评论吧！！！！', '2013-06-09 22:31:08', 8),
(9, '我不是二逼', '楼上是二逼！', '2013-06-09 22:31:25', 8),
(10, '我不是测试员', '听说只有评论内容足够长，甚至长到比原po还要长，才能看出格式对不对，整不整齐，是这样没错的！', '2013-06-10 13:41:11', 1),
(11, '', '看看没昵称会怎样。。。', '2013-06-10 14:31:40', 1),
(13, '', '我才不是路人呢！！！', '2013-06-10 14:46:37', 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
