-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2021-09-02 08:51:04
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
-- 表的结构 `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题，lang(apidoc.table.lang.title)',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名，lang(apidoc.table.lang.name)',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别，lang(apidoc.table.lang.sex)',
  `age` int(3) DEFAULT NULL COMMENT '年龄，lang(apidoc.table.lang.age)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `delete_time` int(10) DEFAULT NULL,
  `money` float(8,2) DEFAULT NULL COMMENT '余额'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `roster`
--

INSERT INTO `roster` (`id`, `name`, `sex`, `age`, `phone`, `create_time`, `update_time`, `delete_time`, `money`) VALUES
(1, '张三', 1, 19, '1597779888', 1609336721, 1609336721, NULL, NULL),
(3, '李四1', 1, 22, '12345678999', 1610941886, 1610941886, NULL, NULL),
(4, 'varchar(32)', 1, 10, 'varchar(11)', 1611278464, 1611278464, NULL, NULL),
(5, '多多', 1, 25, '123456789', 1612965106, 1612965106, NULL, NULL),
(6, 'varchar(32)', 0, 0, 'varchar(11)', 1629894532, 1629894532, NULL, 0.00),
(7, 'varchar(32)', 0, 0, 'varchar(11)', 1629964279, 1629964279, NULL, 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `test_crud`
--

CREATE TABLE IF NOT EXISTS `test_crud` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `test_rest`
--

CREATE TABLE IF NOT EXISTS `test_rest` (
  `id` int(11) NOT NULL COMMENT '唯一id',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `name` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `sex` tinyint(1) unsigned DEFAULT '0' COMMENT '性别,lang(apidoc.lang.sex)',
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
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_crud`
--
ALTER TABLE `test_crud`
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
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test_crud`
--
ALTER TABLE `test_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id';
--
-- AUTO_INCREMENT for table `test_rest`
--
ALTER TABLE `test_rest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id';
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
