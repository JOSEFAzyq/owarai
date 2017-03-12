/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : owarai

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-03-12 20:37:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `bbschild_id` int(5) NOT NULL COMMENT '板块id',
  `fansub_id` int(5) NOT NULL COMMENT '字幕组id',
  `sensitive_auth` varchar(255) NOT NULL DEFAULT '' COMMENT '敏感权限',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员类型',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `tags` varchar(20) NOT NULL DEFAULT '' COMMENT '标签',
  `user_id` int(11) NOT NULL COMMENT '发布者id',
  `bbschild_id` int(5) unsigned NOT NULL DEFAULT '1' COMMENT '所属板块',
  `fansub_id` int(5) NOT NULL DEFAULT '1' COMMENT '所属字幕组id.',
  `authority` int(3) NOT NULL DEFAULT '0' COMMENT '权限限制,0没有权限限制.',
  `reply` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复数目',
  `thumb_up` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `thumb_down` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '踩数目',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `is_top` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶.0:不置顶.1:置顶',
  `is_elite` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否精华',
  `is_ori` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否原创',
  `is_pay` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否付款可见',
  `pay_amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '付款金额',
  `is_show` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '是否展示',
  `is_close` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否关闭',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `管理员发布文章` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bbs_child
-- ----------------------------
DROP TABLE IF EXISTS `bbs_child`;
CREATE TABLE `bbs_child` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '板块/字幕组名称',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for fansub
-- ----------------------------
DROP TABLE IF EXISTS `fansub`;
CREATE TABLE `fansub` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT '字幕组名称',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
