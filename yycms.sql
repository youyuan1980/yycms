/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : yycms

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2016-07-06 16:58:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `ID` bigint(20) NOT NULL,
  `CLASS` bigint(20) NOT NULL default '0',
  `TITLE` varchar(500) NOT NULL,
  `TITLECOLOR` varchar(50) default NULL,
  `CONTENT` mediumtext,
  `HITS` int(11) NOT NULL default '0',
  `KEYWORD` varchar(200) default NULL,
  `LINKURL` varchar(500) default NULL,
  `SOURCE` varchar(80) default NULL,
  `AUTHOR` varchar(80) default NULL,
  `TITLEIMAGE` varchar(500) default NULL,
  `ISCHECKED` char(1) NOT NULL default '1',
  `ISIMGNEWS` char(1) NOT NULL default '0',
  `ISTOP` char(1) NOT NULL default '0',
  `ISRECOMMEND` char(1) NOT NULL default '0',
  `ISHOT` char(1) NOT NULL default '0',
  `ISDELETE` char(1) NOT NULL default '0',
  `ADDTIME` datetime NOT NULL,
  `UPTIME` datetime NOT NULL,
  `EDITUSERNAME` varchar(80) NOT NULL,
  `CHECKUSERNAME` varchar(80) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `CLASS` (`CLASS`),
  KEY `ID` (`ID`),
  KEY `KEYWORD` (`KEYWORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `article_classlist`
-- ----------------------------
DROP TABLE IF EXISTS `article_classlist`;
CREATE TABLE `article_classlist` (
  `ID` bigint(20) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `PARENT` bigint(20) NOT NULL default '0',
  `UPTIME` datetime NOT NULL,
  `ORDERNUM` int(11) NOT NULL default '1',
  `ISSHOW` char(1) NOT NULL default '1',
  `ALLOWUSERS` varchar(100) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `ID` (`ID`),
  KEY `ORDERNUM` (`ORDERNUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_classlist
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) character set utf8 NOT NULL,
  `PID` int(11) NOT NULL default '-1',
  `ISPARENT` varchar(20) character set utf8 NOT NULL default '0',
  `URL` varchar(200) character set utf8 default NULL,
  `ROLEID` varchar(50) character set utf8 default NULL,
  `MENUORDER` int(11) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '用户信息', '0', '1', '', '', '10');
INSERT INTO `menu` VALUES ('2', '信息管理', '0', '1', '', 'reporter', '40');
INSERT INTO `menu` VALUES ('3', '栏目管理', '0', '1', '', 'reporter', '70');
INSERT INTO `menu` VALUES ('4', '系统管理', '0', '1', '', 'admin', '113');
INSERT INTO `menu` VALUES ('11', '用户基本信息', '1', '0', 'main.php', '', '20');
INSERT INTO `menu` VALUES ('12', '修改密码', '1', '0', 'sys/UpdatePassWord.php', '', '30');
INSERT INTO `menu` VALUES ('21', '添加信息', '2', '0', 'Tax/SqEdit.aspx', 'reporter', '50');
INSERT INTO `menu` VALUES ('22', '信息列表', '2', '0', 'Tax/Sqlist.aspx', 'reporter', '60');
INSERT INTO `menu` VALUES ('31', '添加栏目', '3', '0', 'articleclass/articleclass_edit.php', 'reporter', '80');
INSERT INTO `menu` VALUES ('32', '栏目列表', '3', '0', 'articleclass/articleclass_list.php', 'reporter', '90');
INSERT INTO `menu` VALUES ('41', '用户列表', '4', '0', 'sys/userlist.php', 'admin', '114');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `ROLEID` varchar(50) NOT NULL,
  `ROLENAME` varchar(50) NOT NULL,
  `ROLEDESC` varchar(200) default NULL,
  `ORDERNUM` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ROLEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('admin', '超级管理员', '1', '1');
INSERT INTO `roles` VALUES ('audi', '审核人员', '3', '3');
INSERT INTO `roles` VALUES ('reporter', '填报人员', '2', '2');

-- ----------------------------
-- Table structure for `systemconfig`
-- ----------------------------
DROP TABLE IF EXISTS `systemconfig`;
CREATE TABLE `systemconfig` (
  `ID` int(11) NOT NULL,
  `CONFIG` mediumtext,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of systemconfig
-- ----------------------------

-- ----------------------------
-- Table structure for `userinrole`
-- ----------------------------
DROP TABLE IF EXISTS `userinrole`;
CREATE TABLE `userinrole` (
  `USERID` varchar(50) NOT NULL,
  `ROLEID` varchar(50) NOT NULL,
  PRIMARY KEY  (`USERID`,`ROLEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userinrole
-- ----------------------------
INSERT INTO `userinrole` VALUES ('232323', 'admin');
INSERT INTO `userinrole` VALUES ('232323', 'reporter');
INSERT INTO `userinrole` VALUES ('345', 'admin');
INSERT INTO `userinrole` VALUES ('345', 'audi');
INSERT INTO `userinrole` VALUES ('345', 'reporter');
INSERT INTO `userinrole` VALUES ('5454', 'admin');
INSERT INTO `userinrole` VALUES ('5454', 'reporter');
INSERT INTO `userinrole` VALUES ('767878', 'admin');
INSERT INTO `userinrole` VALUES ('admin', 'admin');
INSERT INTO `userinrole` VALUES ('admin', 'reporter');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `USERID` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `USERPASSWORD` varchar(80) NOT NULL,
  `PHONE` varchar(50) default NULL,
  `USERDESC` varchar(80) default NULL,
  `ADDTIME` datetime NOT NULL,
  `UPTIME` datetime NOT NULL,
  `LASTLOGINTIME` datetime default NULL,
  `LASTLOGINIP` varchar(50) default NULL,
  PRIMARY KEY  (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('232323', '23232', '202cb962ac59075b964b07152d234b70', null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', null, null);
INSERT INTO `users` VALUES ('767878', '78787', '202cb962ac59075b964b07152d234b70', null, null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', null, null);
INSERT INTO `users` VALUES ('admin', '超级管理员', '202cb962ac59075b964b07152d234b70', null, null, '2015-01-01 00:00:00', '2012-01-01 00:00:00', null, null);
