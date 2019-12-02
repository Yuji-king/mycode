/*
 Navicat Premium Data Transfer

 Source Server         : endnews
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : db_news

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 02/12/2019 11:29:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_lanmu
-- ----------------------------
DROP TABLE IF EXISTS `t_lanmu`;
CREATE TABLE `t_lanmu`  (
  `lanmuId` int(11) NOT NULL AUTO_INCREMENT,
  `lanmuName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lanmuDel` smallint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`lanmuId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_news
-- ----------------------------
DROP TABLE IF EXISTS `t_news`;
CREATE TABLE `t_news`  (
  `newId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contents` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `userId` int(11) NULL DEFAULT NULL,
  `addTime` datetime(0) NULL DEFAULT NULL,
  `hitCounts` int(8) NULL DEFAULT NULL,
  `lanmuId` int(11) NULL DEFAULT NULL,
  `lanmuName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userName` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `delId` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`newId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userPwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lanmuId` int(11) NULL DEFAULT NULL,
  `userDelId` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userId`) USING BTREE,
  INDEX `lanmuId`(`lanmuId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
