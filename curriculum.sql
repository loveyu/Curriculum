-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 13 日 02:51
-- 服务器版本: 5.1.50
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `curriculum`
--

-- --------------------------------------------------------

--
-- 表的结构 `c_group`
--

CREATE TABLE IF NOT EXISTS `c_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(256) NOT NULL,
  `class` int(2) NOT NULL,
  `grade` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `c_group`
--

INSERT INTO `c_group` (`id`, `major`, `class`, `grade`) VALUES
(1, '计应', 1, 2011),
(2, '计应', 2, 2011),
(3, '计应', 3, 2011);

-- --------------------------------------------------------

--
-- 表的结构 `c_setting`
--

CREATE TABLE IF NOT EXISTS `c_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `c_setting`
--

INSERT INTO `c_setting` (`id`, `name`, `value`) VALUES
(1, 'first_week', '2012-09-03'),
(2, 'all_week', '21'),
(3, 'one_day_number', '8');

-- --------------------------------------------------------

--
-- 表的结构 `c_subject`
--

CREATE TABLE IF NOT EXISTS `c_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `week` varchar(200) NOT NULL,
  `time` varchar(100) NOT NULL,
  `week2` varchar(20) NOT NULL,
  `classroom` varchar(20) NOT NULL,
  `group` int(11) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `credit` float NOT NULL,
  `hours` int(11) NOT NULL,
  `other` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- 转存表中的数据 `c_subject`
--

INSERT INTO `c_subject` (`id`, `name`, `week`, `time`, `week2`, `classroom`, `group`, `teacher`, `credit`, `hours`, `other`) VALUES
(1, '网页设计与制作', ',3,4,5,6,7,8,9,10,', ',1,2,', '1', 'A605', 1, '严耀伟', 3, 48, ''),
(2, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',1,2,', '1', '4307', 1, '郭胜', 3.5, 56, ''),
(3, '网页设计与制作上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '1', 'A605', 1, '严耀伟', 3, 48, ''),
(4, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '1', '4305', 1, '王志', 3.5, 56, ''),
(5, '多媒体作品创意与制作', ',3,4,5,6,7,8,9,10,', ',5,6,', '1', '4302', 1, '王方', 2, 32, ''),
(6, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',7,8,', '1', '2401', 1, '张亚丽', 4.5, 72, ''),
(7, '微机原理与汇编语言', ',1,2,3,4,5,6,7,8,9,10,11,', ',1,2,', '2', '4303', 1, '翁广安', 3.5, 56, ''),
(8, 'JSP Web应用开发上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '2', 'A605', 1, '王志', 3.5, 56, ''),
(10, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',5,6,', '2', '4302', 1, '祝宏', 3.5, 56, ''),
(11, '计算机图行图像处理', ',3,4,5,6,7,8,9,10,', ',1,2,', '3', 'A614', 1, '王方', 2, 32, ''),
(12, '计算机图行图像处理上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '3', 'A614', 1, '王方', 2, 32, ''),
(13, '多媒体作品创意与制作上机', ',3,4,5,6,7,8,9,10,', ',5,6,', '3', 'A614', 1, '王方', 2, 32, ''),
(14, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',7,8,', '3', '4303', 1, '郭胜', 3.5, 56, ''),
(15, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',1,2,', '4', '103', 1, '张亚丽', 4.5, 72, ''),
(16, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '4', '4305', 1, '王志', 3.5, 56, ''),
(17, '微机原理与汇编语言', ',3,4,5,6,7,8,9,10,11,', ',5,6,', '4', '4303', 1, '翁广安', 3.5, 56, ''),
(18, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',7,8,', '4', '4302', 1, '祝宏', 3.5, 56, ''),
(19, '微机原理与汇编语言上机', ',6,8,10,12,', ',1,2,3,4,', '5', 'A614', 1, '翁广安', 3.5, 56, ''),
(20, '数据库技术及应用上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '5', 'A605', 1, '郭胜', 3.5, 56, ''),
(23, '网页设计与制作', ',1,2,3,4,', ',5,6,7,8,', '5', 'A605', 1, '严耀伟', 3, 48, ''),
(24, '电子测试与实验技术', ',9,10,11,12,14,15,16,17,', ',5,6,7,8,', '5', 'B211,B210,B212', 1, '刘袁缘,惠志敏,谢永峰', 2, 32, ''),
(27, '形势与政策', ',9,', ',-1,', '6', '5103', 1, '史成虎', 0.25, 4, '与11级新闻一班二班合上'),
(28, '数据结构课程设计', ',1,2,', ',5,6,7,8,', '2,3,4', 'A614', 1, '严耀伟,杨薇薇,王方', 2, 32, ''),
(29, '数据结构课程设计', ',1,2,', ',1,2,3,4,', '5', 'A614', 1, '严耀伟,杨薇薇,王方', 2, 32, ''),
(117, '微机原理与汇编语言', ',3,4,5,6,7,8,9,10,11,', ',5,6,', '4', '4303', 3, '翁广安', 3.5, 56, ''),
(116, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '4', '4305', 3, '王志', 3.5, 56, ''),
(115, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',1,2,', '4', '405', 3, '张亚丽', 4.5, 72, ''),
(114, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',7,8,', '3', '4303', 3, '郭胜', 3.5, 56, ''),
(113, '多媒体作品创意与制作上机', ',3,4,5,6,7,8,9,10,', ',5,6,', '3', 'A614', 3, '王方', 2, 32, ''),
(112, '计算机图行图像处理上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '3', 'A614', 3, '王方', 2, 32, ''),
(111, '计算机图行图像处理', ',3,4,5,6,7,8,9,10,', ',1,2,', '3', 'A614', 3, '王方', 2, 32, ''),
(110, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',5,6,', '2', '4302', 3, '祝宏', 3.5, 56, ''),
(109, 'JSP Web应用开发上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '2', 'A605', 3, '王志', 3.5, 56, ''),
(108, '微机原理与汇编语言', ',1,2,3,4,5,6,7,8,9,10,11,', ',1,2,', '2', '4303', 3, '翁广安', 3.5, 56, ''),
(107, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',7,8,', '1', '2403', 3, '张亚丽', 4.5, 72, ''),
(106, '多媒体作品创意与制作', ',3,4,5,6,7,8,9,10,', ',5,6,', '1', '4302', 3, '王方', 2, 32, ''),
(105, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '1', '4305', 3, '王志', 3.5, 56, ''),
(104, '网页设计与制作上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '1', 'A605', 3, '严耀伟', 3, 48, ''),
(103, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',1,2,', '1', '4307', 3, '郭胜', 3.5, 56, ''),
(102, '网页设计与制作', ',3,4,5,6,7,8,9,10,', ',1,2,', '1', 'A605', 3, '严耀伟', 3, 48, ''),
(101, '数据结构课程设计', ',1,2,', ',1,2,3,4,', '5', 'A614', 2, '严耀伟,杨薇薇,王方', 2, 32, ''),
(100, '数据结构课程设计', ',1,2,', ',5,6,7,8,', '2,3,4', 'A614', 2, '严耀伟,杨薇薇,王方', 2, 32, ''),
(99, '形势与政策', ',9,', ',-1,', '6', '5103', 2, '史成虎', 0.25, 4, '与11级新闻一班二班合上'),
(98, '电子测试与实验技术', ',9,10,11,12,14,15,16,17,', ',5,6,7,8,', '5', 'B211,B210,B212', 2, '刘袁缘,惠志敏,谢永峰', 2, 32, ''),
(97, '网页设计与制作', ',1,2,3,4,', ',5,6,7,8,', '5', 'A605', 2, '严耀伟', 3, 48, ''),
(96, '数据库技术及应用上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '5', 'A605', 2, '郭胜', 3.5, 56, ''),
(95, '微机原理与汇编语言上机', ',6,8,10,12,', ',1,2,3,4,', '5', 'A614', 2, '翁广安', 3.5, 56, ''),
(94, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',7,8,', '4', '4302', 2, '祝宏', 3.5, 56, ''),
(93, '微机原理与汇编语言', ',3,4,5,6,7,8,9,10,11,', ',5,6,', '4', '4303', 2, '翁广安', 3.5, 56, ''),
(92, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '4', '4305', 2, '王志', 3.5, 56, ''),
(91, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',1,2,', '4', '103', 2, '张亚丽', 4.5, 72, ''),
(90, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',7,8,', '3', '4303', 2, '郭胜', 3.5, 56, ''),
(89, '多媒体作品创意与制作上机', ',3,4,5,6,7,8,9,10,', ',5,6,', '3', 'A614', 2, '王方', 2, 32, ''),
(88, '计算机图行图像处理上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '3', 'A614', 2, '王方', 2, 32, ''),
(87, '计算机图行图像处理', ',3,4,5,6,7,8,9,10,', ',1,2,', '3', 'A614', 2, '王方', 2, 32, ''),
(86, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',5,6,', '2', '4302', 2, '祝宏', 3.5, 56, ''),
(85, 'JSP Web应用开发上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '2', 'A605', 2, '王志', 3.5, 56, ''),
(84, '微机原理与汇编语言', ',1,2,3,4,5,6,7,8,9,10,11,', ',1,2,', '2', '4303', 2, '翁广安', 3.5, 56, ''),
(83, '英语', ',1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,', ',7,8,', '1', '2401', 2, '张亚丽', 4.5, 72, ''),
(82, '多媒体作品创意与制作', ',3,4,5,6,7,8,9,10,', ',5,6,', '1', '4302', 2, '王方', 2, 32, ''),
(81, 'JSP Web应用开发', ',11,12,14,15,16,17,18,19,', ',3,4,', '1', '4305', 2, '王志', 3.5, 56, ''),
(80, '网页设计与制作上机', ',3,4,5,6,7,8,9,10,', ',3,4,', '1', 'A605', 2, '严耀伟', 3, 48, ''),
(79, '数据库技术及应用', ',11,12,14,15,16,17,18,19,', ',1,2,', '1', '4307', 2, '郭胜', 3.5, 56, ''),
(78, '网页设计与制作', ',3,4,5,6,7,8,9,10,', ',1,2,', '1', 'A605', 2, '严耀伟', 3, 48, ''),
(118, '数字电路与逻辑设计', ',3,4,5,6,7,8,9,10,11,12,14,15,16,17,', ',7,8,', '4', '4302', 3, '祝宏', 3.5, 56, ''),
(119, '微机原理与汇编语言上机', ',6,8,10,12,', ',1,2,3,4,', '5', 'A614', 3, '翁广安', 3.5, 56, ''),
(120, '数据库技术及应用上机', ',14,15,16,17,18,19,', ',1,2,3,4,', '5', 'A605', 3, '郭胜', 3.5, 56, ''),
(121, '网页设计与制作', ',1,2,3,4,', ',5,6,7,8,', '5', 'A605', 3, '严耀伟', 3, 48, ''),
(122, '电子测试与实验技术', ',9,10,11,12,14,15,16,17,', ',5,6,7,8,', '5', 'B211,B210,B212', 3, '刘袁缘,惠志敏,谢永峰', 2, 32, ''),
(123, '形势与政策', ',9,', ',-1,', '6', '5103', 3, '史成虎', 0.25, 4, '与11级新闻一班二班合上'),
(124, '数据结构课程设计', ',1,2,', ',5,6,7,8,', '2,3,4', 'A614', 3, '严耀伟,杨薇薇,王方', 2, 32, ''),
(125, '数据结构课程设计', ',1,2,', ',1,2,3,4,', '5', 'A614', 3, '严耀伟,杨薇薇,王方', 2, 32, '');

-- --------------------------------------------------------

--
-- 表的结构 `c_time`
--

CREATE TABLE IF NOT EXISTS `c_time` (
  `id` int(11) NOT NULL,
  `begin` time NOT NULL,
  `end` time NOT NULL,
  `other` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `c_time`
--

INSERT INTO `c_time` (`id`, `begin`, `end`, `other`) VALUES
(-1, '09:00:00', '12:00:00', '形势与政策独有'),
(1, '08:10:00', '08:55:00', ''),
(2, '09:00:00', '09:45:00', ''),
(3, '10:00:00', '10:45:00', ''),
(4, '10:50:00', '11:35:00', ''),
(5, '14:00:00', '14:45:00', ''),
(6, '14:50:00', '15:35:00', ''),
(7, '15:45:00', '16:30:00', ''),
(8, '16:35:00', '17:20:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
