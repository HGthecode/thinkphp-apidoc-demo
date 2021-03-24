-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2021-03-24 11:39:33
-- 服务器版本： 5.6.49-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apidoc_demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_function`
--

CREATE TABLE IF NOT EXISTS `auth_function` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `value` varchar(32) NOT NULL COMMENT '权限值',
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_function`
--

INSERT INTO `auth_function` (`id`, `name`, `value`, `pid`, `sort`) VALUES
(5, '文档编辑', 'doc', NULL, 1),
(47, '新增', 'add', 17, 1),
(12, '用户管理', 'user', NULL, 20),
(13, '新增', 'add', 12, 1),
(14, '编辑', 'edit', 12, 2),
(15, '删除', 'del', 12, 3),
(16, '重置密码', 'reset', 12, 4),
(17, '角色管理', 'role', NULL, 30),
(18, '系统设置', 'set', NULL, 60),
(20, '系统参数', 'sysparam', 18, 0),
(50, '删除', 'del', 17, 3),
(49, '编辑', 'edit', 17, 2),
(48, '查看', 'view', 17, 0),
(46, '新增', 'add', 42, 1),
(45, '删除', 'del', 42, 3),
(44, '编辑', 'edit', 42, 2),
(43, '查看', 'view', 42, 0),
(42, '文章', 'article', NULL, 10),
(41, '删除', 'del', 5, 3),
(40, '编辑', 'edit', 5, 2),
(39, '新增', 'add', 5, 1),
(38, '查看', 'view', 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ceshi_crud`
--

CREATE TABLE IF NOT EXISTS `ceshi_crud` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='CeshiCrud';

--
-- 转存表中的数据 `ceshi_crud`
--

INSERT INTO `ceshi_crud` (`id`, `create_time`, `update_time`, `delete_time`, `name`) VALUES
(1, 1613037848, 1613037848, NULL, '张三'),
(2, 1613037852, 1613037852, NULL, '李四'),
(3, 1613106879, 1613106879, NULL, 'varchar(255)'),
(4, 1613106888, 1613106888, NULL, 'varchar');

-- --------------------------------------------------------

--
-- 表的结构 `ceshi_demo`
--

CREATE TABLE IF NOT EXISTS `ceshi_demo` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='测试Crud';

-- --------------------------------------------------------

--
-- 表的结构 `ceshi_user`
--

CREATE TABLE IF NOT EXISTS `ceshi_user` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='测试Crud生成';

--
-- 转存表中的数据 `ceshi_user`
--

INSERT INTO `ceshi_user` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `age`) VALUES
(1, 1613038057, 1613038057, NULL, '张三', 4),
(2, 1613038066, 1613038066, NULL, '李四', 4);

-- --------------------------------------------------------

--
-- 表的结构 `my_test`
--

CREATE TABLE IF NOT EXISTS `my_test` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='测试接口';

--
-- 转存表中的数据 `my_test`
--

INSERT INTO `my_test` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `age`) VALUES
(1, 1614133779, 1614133779, NULL, 'varchar(255)', 0);

-- --------------------------------------------------------

--
-- 表的结构 `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `sex` int(1) DEFAULT NULL COMMENT '性别；1=男，2=女',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '最后修改时间',
  `delete_time` int(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `roster`
--

INSERT INTO `roster` (`id`, `name`, `sex`, `age`, `phone`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '张三', 1, 19, '1597779888', 1609336721, 1609336721, NULL),
(3, '李四1', 1, 22, '12345678999', 1610941886, 1610941886, NULL),
(4, 'varchar(32)', 1, 10, 'varchar(11)', 1611278464, 1611278464, NULL),
(5, '多多', 1, 25, '123456789', 1612965106, 1612965106, NULL),
(6, 'varchar(32)', 0, 0, 'varchar(11)', 1614136669, 1614136669, NULL),
(7, 'varchar(32)', 0, 0, 'varchar(11)', 1614231498, 1614231498, NULL),
(8, 'varchar(32)', 0, 0, 'varchar(11)', 1614231510, 1614231510, NULL),
(9, 'varchar(32)', 0, 0, 'varchar(11)', 1615142856, 1615142856, NULL),
(10, 'varchar(32)', 0, 0, 'varchar(11)', 1615142858, 1615142858, NULL),
(11, 'varchar(32)', 0, 0, 'varchar(11)', 1615337781, 1615337781, NULL),
(12, 'varchar(32)', 0, 0, 'varchar(11)', 1615532343, 1615532343, NULL),
(13, 'varchar(32)', 0, 0, 'varchar(11)', 1615598361, 1615598361, NULL),
(14, 'varchar(32)', 0, 0, 'varchar(11)', 1615598381, 1615598381, NULL),
(15, 'varchar(32)', 0, 0, 'varchar(11)', 1615683681, 1615683681, NULL),
(16, 'varchar(32)', 0, 0, 'varchar(11)', 1615960315, 1615960315, NULL),
(17, 'varchar(32)', 0, 0, 'varchar(11)', 1616378462, 1616378462, NULL),
(18, 'varchar(32)', 0, 0, 'varchar(11)', 1616546844, 1616546844, NULL),
(19, 'varchar(32)', 0, 0, 'varchar(11)', 1616546864, 1616546864, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Test';

-- --------------------------------------------------------

--
-- 表的结构 `test123`
--

CREATE TABLE IF NOT EXISTS `test123` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Test123';

-- --------------------------------------------------------

--
-- 表的结构 `test_auto`
--

CREATE TABLE IF NOT EXISTS `test_auto` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='测试生成';

--
-- 转存表中的数据 `test_auto`
--

INSERT INTO `test_auto` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `age`, `sex`) VALUES
(2, 1615110676, 1615110676, NULL, '5555', 4, 1),
(3, 1615110681, 1615110681, NULL, '5555', 4, 1),
(4, 1615110682, 1615110682, NULL, '5555', 4, 1),
(5, 1615110683, 1615110683, NULL, '5555', 4, 1),
(6, 1615110684, 1615110684, NULL, '5555', 4, 1),
(7, 1615110684, 1615110684, NULL, '5555', 4, 1),
(8, 1615110684, 1615110684, NULL, '5555', 4, 1),
(9, 1615110685, 1615110685, NULL, '5555', 4, 1),
(10, 1615110685, 1615110685, NULL, '5555', 4, 1),
(11, 1615110685, 1615110685, NULL, '5555', 4, 1),
(12, 1615110686, 1615110686, NULL, '5555', 4, 1),
(13, 1615110686, 1615110686, NULL, '5555', 4, 1),
(14, 1615110687, 1615110687, NULL, '5555', 4, 1),
(15, 1615110687, 1615110687, NULL, '5555', 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `test_crud`
--

CREATE TABLE IF NOT EXISTS `test_crud` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='自动生成Crud';

--
-- 转存表中的数据 `test_crud`
--

INSERT INTO `test_crud` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `sex`, `age`) VALUES
(1, 1612963224, 1612963224, NULL, '张三1', 2, 6),
(3, 1615142973, 1615142973, NULL, '222', 1, 20);

-- --------------------------------------------------------

--
-- 表的结构 `test_one`
--

CREATE TABLE IF NOT EXISTS `test_one` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='试一下';

--
-- 转存表中的数据 `test_one`
--

INSERT INTO `test_one` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `sex`, `age`) VALUES
(1, 1613626773, 1613626773, NULL, '张三', 1, 18);

-- --------------------------------------------------------

--
-- 表的结构 `test_rest`
--

CREATE TABLE IF NOT EXISTS `test_rest` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `age` int(11) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='测试REST';

--
-- 转存表中的数据 `test_rest`
--

INSERT INTO `test_rest` (`id`, `create_time`, `update_time`, `delete_time`, `name`, `age`) VALUES
(1, 1612963514, 1612963514, NULL, '张三1', 10),
(3, 1615775293, 1615775293, NULL, '试试水', 15),
(4, 1615775299, 1615775299, NULL, '试试水', 15),
(5, 1615775299, 1615775299, NULL, '试试水', 15),
(6, 1615775300, 1615775300, NULL, '试试水', 15),
(7, 1615775301, 1615775301, NULL, '试试水', 15),
(8, 1615775301, 1615775301, NULL, '试试水', 15),
(9, 1615775302, 1615775302, NULL, '试试水', 15),
(10, 1615775302, 1615775302, NULL, '试试水', 15),
(11, 1615775302, 1615775302, NULL, '试试水', 15),
(12, 1615775302, 1615775302, NULL, '试试水', 15),
(13, 1615775303, 1615775303, NULL, '试试水', 15),
(14, 1615954573, 1615954573, NULL, 'varchar(255)', 11),
(15, 1616044885, 1616044885, NULL, 'varchar(255)', 1),
(16, 1616044886, 1616044886, NULL, 'varchar(255)', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL COMMENT '用户id',
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `nickname` varchar(64) DEFAULT NULL COMMENT '昵称',
  `password` char(64) NOT NULL COMMENT '登录密码',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `regip` bigint(11) DEFAULT NULL COMMENT '注册IP',
  `update_time` int(11) unsigned DEFAULT NULL COMMENT '更新时间',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态',
  `phone` char(32) DEFAULT NULL COMMENT '联系电话',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `sex` tinyint(1) unsigned DEFAULT '1' COMMENT '性别',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `role` varchar(64) DEFAULT NULL COMMENT '角色',
  `name` varchar(64) DEFAULT NULL COMMENT '姓名'
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `nickname`, `password`, `avatar`, `regip`, `update_time`, `state`, `phone`, `create_time`, `sex`, `delete_time`, `role`, `name`) VALUES
(33, 'test10', '测试10', 'c54731e6344dbe60c5092f120dd7d9b0', NULL, NULL, 1607321361, 1, NULL, 1607321361, 1, NULL, NULL, NULL),
(34, 'test11', '测试11', 'c54731e6344dbe60c5092f120dd7d9b0', NULL, NULL, 1607321383, 1, NULL, 1607321383, 2, NULL, NULL, NULL),
(35, 'test12', '测试12', 'c54731e6344dbe60c5092f120dd7d9b0', NULL, NULL, 1607321398, 1, NULL, 1607321398, 2, NULL, NULL, NULL),
(36, 'test13', '测试13', 'c54731e6344dbe60c5092f120dd7d9b0', NULL, NULL, 1607321418, 1, NULL, 1607321418, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_function`
--
ALTER TABLE `auth_function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceshi_crud`
--
ALTER TABLE `ceshi_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceshi_demo`
--
ALTER TABLE `ceshi_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceshi_user`
--
ALTER TABLE `ceshi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_test`
--
ALTER TABLE `my_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test123`
--
ALTER TABLE `test123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_auto`
--
ALTER TABLE `test_auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_crud`
--
ALTER TABLE `test_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_one`
--
ALTER TABLE `test_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_rest`
--
ALTER TABLE `test_rest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_function`
--
ALTER TABLE `auth_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `ceshi_crud`
--
ALTER TABLE `ceshi_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ceshi_demo`
--
ALTER TABLE `ceshi_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id';
--
-- AUTO_INCREMENT for table `ceshi_user`
--
ALTER TABLE `ceshi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `my_test`
--
ALTER TABLE `my_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id';
--
-- AUTO_INCREMENT for table `test123`
--
ALTER TABLE `test123`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id';
--
-- AUTO_INCREMENT for table `test_auto`
--
ALTER TABLE `test_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `test_crud`
--
ALTER TABLE `test_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test_one`
--
ALTER TABLE `test_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test_rest`
--
ALTER TABLE `test_rest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
