/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : jue

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-05-04 19:50:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `grzl`
-- ----------------------------
DROP TABLE IF EXISTS `grzl`;
CREATE TABLE `grzl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nc` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `txpic` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `nc` (`nc`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grzl
-- ----------------------------
INSERT INTO `grzl` VALUES ('1', '我没钱', 'root', 'elem', '0', null, null, null);
INSERT INTO `grzl` VALUES ('2', '想暴富', 'elem', 'lem', '0', null, null, null);

-- ----------------------------
-- Table structure for `gwc`
-- ----------------------------
DROP TABLE IF EXISTS `gwc`;
CREATE TABLE `gwc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `dpmc` varchar(50) DEFAULT NULL,
  `sppic` varchar(200) DEFAULT NULL,
  `spmc` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `dj` decimal(20,3) DEFAULT NULL,
  `sl` decimal(20,0) DEFAULT NULL,
  `zje` decimal(20,3) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spmc` (`spmc`),
  CONSTRAINT `spmc` FOREIGN KEY (`spmc`) REFERENCES `spmx` (`spmc`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gwc
-- ----------------------------
INSERT INTO `gwc` VALUES ('2', null, '123', null, 'wazi', 'blue', 's', '50.000', '100', '5000.000', '1587190616', '1587190616');
INSERT INTO `gwc` VALUES ('3', null, '123', null, 'wazi', 'blue', 's', '50.000', '100', '5000.000', '1587190619', '1587190619');
INSERT INTO `gwc` VALUES ('4', null, null, null, null, null, null, null, null, '0.000', '1587190645', '1587190645');
INSERT INTO `gwc` VALUES ('5', null, '123', null, 'wz', 'red', 'm', '45.000', '50', null, '1587194537', '1587194537');
INSERT INTO `gwc` VALUES ('6', null, '123', null, 'wz', 'red', 'm', '45.000', '1', null, '1587196987', '1587196987');
INSERT INTO `gwc` VALUES ('7', null, '123', null, 'wazi', 'blue', 's', '50.000', '1', null, '1587196992', '1587196992');
INSERT INTO `gwc` VALUES ('8', '[]', '123', null, 'wz', 'red', 'm', '45.000', '1', null, '1587212079', '1587212079');
INSERT INTO `gwc` VALUES ('9', null, '123', null, 'wz', 'red', 'm', '45.000', '1', null, '1587212262', '1587212262');

-- ----------------------------
-- Table structure for `shadress`
-- ----------------------------
DROP TABLE IF EXISTS `shadress`;
CREATE TABLE `shadress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nc` varchar(50) DEFAULT NULL,
  `shName` varchar(50) DEFAULT NULL,
  `shAdress` varchar(200) DEFAULT NULL,
  `shCall` decimal(20,0) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nc` (`nc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shadress
-- ----------------------------
INSERT INTO `shadress` VALUES ('3', 'elem', '十一', '广东广州', '12345678998', '1588584573', '1588584573');
INSERT INTO `shadress` VALUES ('4', 'elem', '十一', '广东广州', '12345678998', '1588584585', '1588584585');

-- ----------------------------
-- Table structure for `spfl`
-- ----------------------------
DROP TABLE IF EXISTS `spfl`;
CREATE TABLE `spfl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `splb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ggy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sppic1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sppic2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `splb` (`splb`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of spfl
-- ----------------------------

-- ----------------------------
-- Table structure for `spmx`
-- ----------------------------
DROP TABLE IF EXISTS `spmx`;
CREATE TABLE `spmx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spmc` varchar(50) NOT NULL,
  `spbm` varchar(200) DEFAULT NULL,
  `pplogo` varchar(200) DEFAULT NULL,
  `ppmc` varchar(50) DEFAULT NULL,
  `splb` varchar(50) NOT NULL,
  `dpmc` varchar(50) NOT NULL,
  `spxqjs` varchar(500) DEFAULT NULL,
  `dj` decimal(50,0) NOT NULL,
  `sl` decimal(50,0) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `gmsl` decimal(50,0) DEFAULT NULL,
  `yh` varchar(20) DEFAULT NULL,
  `ygsl` decimal(10,0) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spmc` (`spmc`),
  KEY `splb` (`splb`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of spmx
-- ----------------------------
INSERT INTO `spmx` VALUES ('1', 'wazi', '001', null, null, '01', '123', 'qweqrtwrt', '50', '100', 's', 'blue', null, '0.8', null, null, null, null);
INSERT INTO `spmx` VALUES ('2', 'wz', '002', null, null, '01', '123', 'dsafag', '45', '50', 'm', 'red', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `tjdd`
-- ----------------------------
DROP TABLE IF EXISTS `tjdd`;
CREATE TABLE `tjdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ddh` decimal(10,0) DEFAULT NULL,
  `spmc` varchar(50) DEFAULT NULL,
  `dpmc` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `dj` decimal(10,0) DEFAULT NULL,
  `sl` decimal(10,0) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `sppic` varchar(500) DEFAULT NULL,
  `nc` varchar(50) DEFAULT NULL,
  `mjtips` varchar(200) DEFAULT NULL COMMENT '买家备注',
  `sjr` varchar(20) DEFAULT NULL,
  `sjrsj` decimal(20,0) DEFAULT NULL,
  `sjrdz` varchar(200) DEFAULT '' COMMENT '收件人地址',
  `psfs` varchar(50) NOT NULL COMMENT '配送方式',
  `zje` decimal(10,0) NOT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nickname` (`nc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tjdd
-- ----------------------------
INSERT INTO `tjdd` VALUES ('1', null, null, null, null, null, null, null, null, null, null, null, null, '', 'zt', '0', '1588578221', '1588578221');
INSERT INTO `tjdd` VALUES ('2', null, null, null, null, null, null, null, null, null, null, null, null, '', 'zt', '0', '1588578858', '1588578858');
INSERT INTO `tjdd` VALUES ('3', null, null, null, null, null, null, null, null, null, null, null, null, '', 'zt', '0', '1588578899', '1588578899');
INSERT INTO `tjdd` VALUES ('6', null, null, null, null, null, null, null, null, 'elem', null, null, null, '', 'zt', '0', '1588579096', '1588579096');
INSERT INTO `tjdd` VALUES ('7', null, null, null, null, null, null, null, null, 'elem', null, null, null, '', 'zt', '0', '1588579118', '1588579118');
INSERT INTO `tjdd` VALUES ('8', null, null, null, null, null, null, null, null, 'elem', null, null, null, '', 'zt', '0', '1588579239', '1588579239');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `callnum` decimal(20,0) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'root', '123456', '13602792111', '123456@qq.com', null, null, null);
INSERT INTO `users` VALUES ('4', 'elem', '$2y$10$0HfU5AjsSmKRey5F1nxC.OWa7t1SEW9irebk4B0bzPO/OnIpO3UYa', '12345678', '123@123.com', '2020-04-17 13:54:33', '2020-04-17 13:54:33', null);
INSERT INTO `users` VALUES ('5', 'root', '$2y$10$QAnoJsOqhq.MXwHVRSwCeuxIbsNZ5BJoGs7tm9i1YtjwtYCMdW3Im', null, null, '2020-04-20 06:25:48', '2020-04-20 06:25:48', null);
INSERT INTO `users` VALUES ('6', 'root', '$2y$10$u.jk5mbMAAlvyZT1QLGRN./917QakfJAfNTr.c7oMcjOMSl1HuqSC', null, null, '2020-04-20 06:27:25', '2020-04-20 06:27:25', null);
INSERT INTO `users` VALUES ('7', 'root', '$2y$10$0xBPO3bZ66oeeaYZXCed3.Bjn1XdQgUwGrCO7jwg.2.LxAeEHcPD6', null, null, '2020-04-20 06:28:22', '2020-04-20 06:28:22', null);
INSERT INTO `users` VALUES ('8', 'root', '$2y$10$0n4cWiTrboF2gCHKS.DdhenTmq8ooPPrKHophhiZMOSYCz2FmMBS6', null, null, '2020-04-20 06:35:53', '2020-04-20 06:35:53', null);
INSERT INTO `users` VALUES ('9', 'root', '$2y$10$IYUYiAUAfgP3RVV7F2sf7OvyzNfwS2pziU5fU4lUr1jG2xjLwuj/i', null, null, '2020-04-20 07:13:30', '2020-04-20 07:13:30', null);
INSERT INTO `users` VALUES ('10', 'root', '$2y$10$0XzPDYhFPHa3kUkJm2LWl.82VX3gRnCgLTRaoDFKzhFYvOoLebFLa', null, null, '2020-04-20 07:17:45', '2020-04-20 07:17:45', null);
INSERT INTO `users` VALUES ('11', 'root', '$2y$10$UGhC0DWS2kOtGa6DjWaE/.PyOYCbVFI1hAVciRHI9P3tHrgxlRxVu', null, null, '2020-04-20 07:21:45', '2020-04-20 07:21:45', null);
INSERT INTO `users` VALUES ('12', 'root', '$2y$10$TbRoTwkTs/zmW2m2q9AeG.QjtTh/iNwXYvpmC9iVP2HGg2I6fyhG.', null, null, '2020-04-20 07:22:34', '2020-04-20 07:22:34', null);
INSERT INTO `users` VALUES ('13', 'root', '$2y$10$.812NlSj36ZPVETLFnxn3OysMeg23gXjg9MQQGQIB2YEgC6WT1yk2', null, null, '2020-04-20 07:25:48', '2020-04-20 07:25:48', null);
INSERT INTO `users` VALUES ('14', 'emm', '$2y$10$9BslR4IlixXLPl/lsjxD9.Xx8zNXHUAMVwb3GxVAzCuXujQ0FPzIW', null, null, '2020-04-20 07:26:02', '2020-04-20 07:26:02', null);
INSERT INTO `users` VALUES ('16', 'root', '$2y$10$c2cpepAOptWEf9Hvy0IrjuvlfwSiI8axzEAOCETgZcIeoVvGJE4WC', null, null, '2020-04-20 07:26:36', '2020-04-20 07:26:36', null);
INSERT INTO `users` VALUES ('17', 'root', '$2y$10$HCt/pqPexjW3i.Rs6Wd6TelhZR7n/6QIy7HtI7xZrRHBla45mrSjy', null, null, '2020-04-21 04:48:32', '2020-04-21 04:48:32', null);
INSERT INTO `users` VALUES ('18', 'root', '$2y$10$tHi4ymQlzQT/6cKilf0LIe07v5/gqxh10T7esL7c.JKkY.2yqxIbS', null, null, '2020-04-21 04:48:39', '2020-04-21 04:48:39', null);
