/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : tp_blog

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-08-16 14:11:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '管理员账户',
  `password` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0是禁用，1是可用',
  `is_super` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0不是超级管理员，1是超级管理员',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_t` int(11) DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin01', '123456', 'admin01', '', '1', '1', '0', '0', null);
INSERT INTO `tp_admin` VALUES ('2', '22', '22', '22', '', '1', '0', '0', '0', null);
INSERT INTO `tp_admin` VALUES ('3', '333', '333', '333', '', '1', '0', '0', '0', null);
INSERT INTO `tp_admin` VALUES ('4', '55555', '55555', '55555', '', '1', '0', '0', '0', null);

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `is_top` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0不是推荐，1是推荐',
  `cate_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('0', 'aaa', 'Description', 'aaa', '<p>aaaaa</p>', '1', '0', '1533883701', '1534123043', null);
INSERT INTO `tp_article` VALUES ('1', 'The SecondeArticle', 'Description', 'Tags', '<pre class=\"brush:php;toolbar:false\">PHP02</pre><p><br/></p>', '0', '1', '1533883802', '1533883802', null);
INSERT INTO `tp_article` VALUES ('2', 'a', 'a', 'a', '<p>a</p>', '1', '2', '1533886175', '1533886175', null);
INSERT INTO `tp_article` VALUES ('3', 'aa', 'aa', 'aa', '<p>aa</p>', '1', '3', '1533886193', '1533886193', null);
INSERT INTO `tp_article` VALUES ('4', 'aa', 'aa', 'aa', '<p>aaaa</p>', '1', '4', '1533886376', '1533886376', null);
INSERT INTO `tp_article` VALUES ('5', 'asda', 'asda', 'asd', '<p>asdas</p>', '1', '5', '1533886434', '1534126022', '1534126022');
INSERT INTO `tp_article` VALUES ('6', 'aaa', 'aaaaaaaaaaaaaaa', 'aaa', '<p>aaaaa</p>', '1', '6', '1533891099', '1533891099', null);

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES ('1', 'asasasd', '11', null, null, null);
INSERT INTO `tp_cate` VALUES ('2', 'php', '1', null, null, null);
INSERT INTO `tp_cate` VALUES ('3', 'thinkphp', '2', null, null, null);
INSERT INTO `tp_cate` VALUES ('4', 'thinkphp', '2', null, null, null);
INSERT INTO `tp_cate` VALUES ('5', 'thinkphp', '2', null, null, null);
INSERT INTO `tp_cate` VALUES ('6', 'thinkphp', '2', null, null, null);
INSERT INTO `tp_cate` VALUES ('7', '11', '111', null, null, null);
INSERT INTO `tp_cate` VALUES ('8', '11', '111', null, null, null);
INSERT INTO `tp_cate` VALUES ('9', 'asd', '0', null, '1534127402', '1534127402');
INSERT INTO `tp_cate` VALUES ('10', 'tthink', '22', null, null, null);
INSERT INTO `tp_cate` VALUES ('11', 'clearrun', '77777', null, null, null);
INSERT INTO `tp_cate` VALUES ('12', 'ccccclearRun', '7777777', null, null, null);
INSERT INTO `tp_cate` VALUES ('13', 'aaaaaaaa', '0', null, '1534132295', '1534132295');

-- ----------------------------
-- Table structure for tp_comment
-- ----------------------------
DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE `tp_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_comment
-- ----------------------------
INSERT INTO `tp_comment` VALUES ('2', 'c2', '0', '1', '0', '0', null);
INSERT INTO `tp_comment` VALUES ('3', 'c3', '0', '3', '0', '0', null);
INSERT INTO `tp_comment` VALUES ('4', 'c4', '0', '4', '0', '0', null);
INSERT INTO `tp_comment` VALUES ('5', '牛啤酒', '0', '28', '1534316000', '1534316000', null);
INSERT INTO `tp_comment` VALUES ('6', '213123', '0', '28', '1534316087', '1534316087', null);
INSERT INTO `tp_comment` VALUES ('7', '敖德萨所', '0', '28', '1534316863', '1534316863', null);

-- ----------------------------
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES ('1', 'dasdas', '222', 'abc', '', '1534136769', '1534148218', null);
INSERT INTO `tp_member` VALUES ('2', '1', '阿萨德', 'QQ啊多', '', '1534136973', '1534215536', '1534215536');
INSERT INTO `tp_member` VALUES ('3', '15162113905', '11', '安抚', '', '1534137302', '1534137302', null);
INSERT INTO `tp_member` VALUES ('4', '15162113905', '11', '11', '', '1534137313', '1534137313', null);
INSERT INTO `tp_member` VALUES ('5', '1', '是颠倒是非 ', '第三方 ', '', '1534137391', '1534137391', null);
INSERT INTO `tp_member` VALUES ('6', '111', ' 说的 ', ' 是是', '', '1534137462', '1534137462', null);
INSERT INTO `tp_member` VALUES ('7', 'aa', ' 说的', '是说的', '', '1534138840', '1534138840', null);
INSERT INTO `tp_member` VALUES ('8', 'qq', '是', '说的是', '', '1534139181', '1534139181', null);
INSERT INTO `tp_member` VALUES ('9', 'qqa', '说的说的说的', '说说的', '', '1534140207', '1534140207', null);
INSERT INTO `tp_member` VALUES ('10', 'aa', '是', '', '', '1534141582', '1534141582', null);
INSERT INTO `tp_member` VALUES ('11', 'aa', ' 说的', ' 是', '', '1534141660', '1534141660', null);
INSERT INTO `tp_member` VALUES ('12', '13131313', ' 阿萨德', '说的说的', '', '1534142003', '1534142003', null);
INSERT INTO `tp_member` VALUES ('13', '1313131', 'aa', 'aaa', '', '1534142144', '1534142144', null);
INSERT INTO `tp_member` VALUES ('14', 'aaaaaaa', 'aaaaa', 'aaaaa', '', '1534143001', '1534143001', null);
INSERT INTO `tp_member` VALUES ('15', '', 'aaaaa', 'aaaaasf', '', '1534143077', '1534215603', '1534215603');
INSERT INTO `tp_member` VALUES ('16', '', 'asfdsf', 'sdfsdfs', '', '1534143123', '1534143123', null);
INSERT INTO `tp_member` VALUES ('17', '15162113905', '1', 'sdfsd', '', '1534143472', '1534143472', null);
INSERT INTO `tp_member` VALUES ('18', '212121', '2eqwseqweq', 'dsfsd', '', '1534143483', '1534143483', null);
INSERT INTO `tp_member` VALUES ('19', '212121', '2eqwseqweq', 'dsadasda', '', '1534143489', '1534143489', null);
INSERT INTO `tp_member` VALUES ('20', 'qqqqqqqqqqqqqqqqqqqq', 'dasdasd', 'dsfsd', '', '1534143634', '1534143634', null);
INSERT INTO `tp_member` VALUES ('21', 'qqqqqq', 'dasdasd', 'sd', '', '1534143646', '1534150376', null);
INSERT INTO `tp_member` VALUES ('22', '1111', 'dasdasd', 's', '', '1534143660', '1534143660', null);
INSERT INTO `tp_member` VALUES ('23', '21212', 'dsadasdas', 'sdfs', '', '1534144051', '1534144051', null);
INSERT INTO `tp_member` VALUES ('24', 'ssssssssss', 'sdfsdf', 'sdfsdf', '', '1534144257', '1534150004', null);
INSERT INTO `tp_member` VALUES ('25', 'asd', 'asd', 'sdfsdf', '', '1534144565', '1534150196', null);
INSERT INTO `tp_member` VALUES ('26', 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '1534145007', '1534145007', null);
INSERT INTO `tp_member` VALUES ('27', 'ABC', '111', 'abc', 'abc', '1534147944', '1534147944', null);
INSERT INTO `tp_member` VALUES ('28', 'admin01', '12345', 'admin01', '11@163.com', '1534298123', '1534298123', null);
INSERT INTO `tp_member` VALUES ('29', '厂长', '777', 'clearrun', 'clear@run.com', '1534298611', '1534298611', null);
INSERT INTO `tp_member` VALUES ('30', 'wwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwww', '', '1534299052', '1534299052', null);
INSERT INTO `tp_member` VALUES ('31', '345', '345', '345', '345', '1534300220', '1534300220', null);
INSERT INTO `tp_member` VALUES ('32', 'admin01', '12345', null, '', '1534301919', '1534301919', null);
INSERT INTO `tp_member` VALUES ('33', '3333', '3333', '3333', '3333', '1534302809', '1534302809', null);
INSERT INTO `tp_member` VALUES ('34', '134', '134', '134', '', '1534307560', '1534307560', null);

-- ----------------------------
-- Table structure for tp_system
-- ----------------------------
DROP TABLE IF EXISTS `tp_system`;
CREATE TABLE `tp_system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `webname` varchar(20) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_system
-- ----------------------------
INSERT INTO `tp_system` VALUES ('1', '123', '321', '0', '1534221873', null);
