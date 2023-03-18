/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 100420
Source Host           : localhost:3307
Source Database       : pos_apl

Target Server Type    : MYSQL
Target Server Version : 100420
File Encoding         : 65001

Date: 2023-02-06 16:35:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `SupplierID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Village` varchar(255) DEFAULT NULL,
  `SubDistricts` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `ZipCode` varchar(255) DEFAULT '',
  `Phone` varchar(255) DEFAULT NULL,
  `MobilePhone` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `UserInput` varchar(255) DEFAULT NULL,
  `UserUpdate` varchar(255) DEFAULT NULL,
  `InputDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `DateInputPhoto` datetime DEFAULT NULL,
  `DateUpdatePhoto` datetime DEFAULT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_supplier
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
