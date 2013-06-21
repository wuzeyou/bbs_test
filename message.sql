-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 22 日 00:52
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
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` tinytext NOT NULL,
  `lastdate` datetime NOT NULL,
  `like_num` int(10) unsigned NOT NULL DEFAULT '0',
  `bless_num` int(10) unsigned NOT NULL DEFAULT '0',
  `shit_num` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user`, `title`, `content`, `lastdate`, `like_num`, `bless_num`, `shit_num`) VALUES
(1, 'testuser', 'testtitle', 'i''m content', '2013-06-03 15:42:26', 0, 0, 0),
(2, '用户名', '题目', '内容诶荣内容内容', '2013-06-03 15:56:01', 0, 0, 1),
(3, 'test', 'title', 'dstlisj;sagoasgj', '2013-06-03 16:06:46', 0, 0, 0),
(4, 'test2', 'title2', 'dstlisj;\r\n\r\nsagoasgj', '2013-06-03 16:06:46', 0, 0, 0),
(5, '用户名2', '标题2', '到底怎么才能添加条目进数据库呢？', '2013-06-05 14:58:30', 0, 0, 0),
(7, 'sdf', 'sfwge', 'sdfsfgesgsg', '2013-06-05 16:57:29', 0, 0, 0),
(8, '酱油', '快来打我', '我就是一坨翔！', '2013-06-05 17:00:27', 0, 0, 0),
(11, '测试员', '序号问题', '测试序号是否连续', '2013-06-05 18:44:12', 0, 0, 0),
(12, 'test', 'stet', 'dsfgwg', '2013-06-05 18:49:38', 0, 0, 0),
(13, 'dsfef', 'sdfsf', 'dfsfsgg', '2013-06-05 18:53:48', 0, 0, 0),
(14, '测试员', '测试跳转页面', '添加成功后javascript跳转至list页面', '2013-06-05 18:54:31', 0, 0, 0),
(15, '测试员', '', '再次测试跳转，这次使用location.href，上次是self.location', '2013-06-05 19:12:51', 0, 0, 0),
(16, '开发者', '分页', '实现分页功能啦！', '2013-06-06 19:05:24', 0, 0, 0),
(17, '', '', '', '2013-06-10 16:41:40', 0, 0, 0),
(18, '', '', '', '2013-06-10 16:45:00', 0, 0, 0),
(19, '验证', '验证', '表单', '2013-06-10 18:24:34', 0, 0, 0),
(20, '巅峰', '', '', '2013-06-10 18:24:42', 0, 1, 1),
(21, '验证', '', '验证表单', '2013-06-10 18:24:58', 0, 0, 0),
(22, '', '', '都纷纷为', '2013-06-10 18:31:38', 1, 2, 2),
(24, '苦逼的程序猿', '就剩美化了', '现在基本功能应该都已经实现了吧？！要是还有遗漏的我就该砍人了呀！喂喂，我是认真地！非常认真地码了三天code啊！！！', '2013-06-11 15:55:48', 0, 2, 1),
(25, '测试员', 'bootstrap', '用了bootstrap，看看效果。\r\n不过好像，添加页面变丑了呀', '2013-06-21 22:34:49', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
