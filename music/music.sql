-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2020-07-01 17:01:44
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- 表的结构 `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `singer` varchar(20) NOT NULL,
  `song` varchar(20) NOT NULL,
  `url` char(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `music`
--

INSERT INTO `music` (`ID`, `singer`, `song`, `url`) VALUES
(2, '徐海俏', '空', 'assets/music/kong.mp3'),
(3, '林俊杰', '江南', 'assets/music/jiangnan.mp3'),
(4, '华晨宇', '国王与乞丐', 'assets/music/xiaochou.mp3'),
(5, '任然', '无人之岛', 'assets/music/wrzd.mp3'),
(6, '温岚', '夏天的风', 'assets/music/xtdf.mp3'),
(7, '周深', '亲爱的旅人', 'assets/music/qadlr.mp3'),
(8, '吴亦凡', '贰叄', 'assets/music/ersan.mp3'),
(9, '房东的猫', '云烟成雨', 'assets/music/yycy.mp3'),
(10, '陈洁仪', '喜欢你', 'assets/music/xhn.mp3'),
(18, '周深', '大鱼', 'assets/music/dayu.mp3'),
(19, 'Idina Menze', 'Let It Go', 'assets/music/letitgo.mp3'),
(20, '银临,AKI阿杰', '牵丝戏', 'assets/music/qsx.mp3');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(1, '张三', '123456'),
(2, '李四', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
