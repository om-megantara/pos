/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 100420
Source Host           : localhost:3307
Source Database       : pos_apl

Target Server Type    : MYSQL
Target Server Version : 100420
File Encoding         : 65001

Date: 2023-02-06 17:05:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_activation_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_groups
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
INSERT INTO `auth_groups` VALUES ('1', 'admin', 'untuk administrator');
INSERT INTO `auth_groups` VALUES ('2', 'user', 'user biasa');
INSERT INTO `auth_groups` VALUES ('3', 'web', 'Administrasi website');
INSERT INTO `auth_groups` VALUES ('4', 'sales', 'Penjualan di Luar');
INSERT INTO `auth_groups` VALUES ('5', 'hrd', 'hrd');

-- ----------------------------
-- Table structure for auth_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------
INSERT INTO `auth_groups_permissions` VALUES ('1', '1');
INSERT INTO `auth_groups_permissions` VALUES ('1', '2');
INSERT INTO `auth_groups_permissions` VALUES ('1', '3');
INSERT INTO `auth_groups_permissions` VALUES ('1', '4');
INSERT INTO `auth_groups_permissions` VALUES ('1', '6');
INSERT INTO `auth_groups_permissions` VALUES ('1', '7');
INSERT INTO `auth_groups_permissions` VALUES ('1', '8');
INSERT INTO `auth_groups_permissions` VALUES ('1', '9');
INSERT INTO `auth_groups_permissions` VALUES ('1', '10');
INSERT INTO `auth_groups_permissions` VALUES ('1', '11');
INSERT INTO `auth_groups_permissions` VALUES ('1', '12');
INSERT INTO `auth_groups_permissions` VALUES ('1', '13');
INSERT INTO `auth_groups_permissions` VALUES ('1', '14');
INSERT INTO `auth_groups_permissions` VALUES ('1', '15');
INSERT INTO `auth_groups_permissions` VALUES ('1', '16');
INSERT INTO `auth_groups_permissions` VALUES ('1', '17');
INSERT INTO `auth_groups_permissions` VALUES ('1', '18');
INSERT INTO `auth_groups_permissions` VALUES ('1', '19');

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
INSERT INTO `auth_groups_users` VALUES ('1', '1');
INSERT INTO `auth_groups_users` VALUES ('1', '2');
INSERT INTO `auth_groups_users` VALUES ('2', '7');
INSERT INTO `auth_groups_users` VALUES ('3', '8');

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES ('1', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 03:31:53', '0');
INSERT INTO `auth_logins` VALUES ('2', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 03:32:28', '1');
INSERT INTO `auth_logins` VALUES ('3', '::1', 'gundhez.dwr@gmail.com', '5', '2022-10-20 03:53:57', '1');
INSERT INTO `auth_logins` VALUES ('4', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 04:18:19', '1');
INSERT INTO `auth_logins` VALUES ('5', '::1', 'gundhez.dwr@gmail.com', '5', '2022-10-20 04:18:40', '1');
INSERT INTO `auth_logins` VALUES ('6', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 04:30:55', '1');
INSERT INTO `auth_logins` VALUES ('7', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 04:39:52', '1');
INSERT INTO `auth_logins` VALUES ('8', '::1', 'gundhez.dwr@gmail.com', '5', '2022-10-20 04:40:49', '1');
INSERT INTO `auth_logins` VALUES ('9', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 20:45:58', '1');
INSERT INTO `auth_logins` VALUES ('10', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 20:53:36', '1');
INSERT INTO `auth_logins` VALUES ('11', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 21:12:54', '1');
INSERT INTO `auth_logins` VALUES ('12', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 21:17:19', '1');
INSERT INTO `auth_logins` VALUES ('13', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 21:34:58', '1');
INSERT INTO `auth_logins` VALUES ('14', '::1', 'gundhez', null, '2022-10-20 22:15:14', '0');
INSERT INTO `auth_logins` VALUES ('15', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:15:25', '1');
INSERT INTO `auth_logins` VALUES ('16', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:46:40', '1');
INSERT INTO `auth_logins` VALUES ('17', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 22:47:00', '1');
INSERT INTO `auth_logins` VALUES ('18', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:53:47', '1');
INSERT INTO `auth_logins` VALUES ('19', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 22:55:14', '1');
INSERT INTO `auth_logins` VALUES ('20', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:57:06', '1');
INSERT INTO `auth_logins` VALUES ('21', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 22:57:38', '1');
INSERT INTO `auth_logins` VALUES ('22', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:58:31', '1');
INSERT INTO `auth_logins` VALUES ('23', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 22:59:29', '1');
INSERT INTO `auth_logins` VALUES ('24', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:00:34', '1');
INSERT INTO `auth_logins` VALUES ('25', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:00:53', '1');
INSERT INTO `auth_logins` VALUES ('26', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:01:19', '1');
INSERT INTO `auth_logins` VALUES ('27', '::1', 'a', null, '2022-10-20 23:11:51', '0');
INSERT INTO `auth_logins` VALUES ('28', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:14:14', '1');
INSERT INTO `auth_logins` VALUES ('29', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:14:43', '1');
INSERT INTO `auth_logins` VALUES ('30', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:15:29', '1');
INSERT INTO `auth_logins` VALUES ('31', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:16:28', '1');
INSERT INTO `auth_logins` VALUES ('32', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:18:38', '1');
INSERT INTO `auth_logins` VALUES ('33', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:19:04', '1');
INSERT INTO `auth_logins` VALUES ('34', '::1', 'gundhez', null, '2022-10-20 23:22:57', '0');
INSERT INTO `auth_logins` VALUES ('35', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:23:08', '1');
INSERT INTO `auth_logins` VALUES ('36', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:24:53', '1');
INSERT INTO `auth_logins` VALUES ('37', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:25:17', '1');
INSERT INTO `auth_logins` VALUES ('38', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:26:42', '1');
INSERT INTO `auth_logins` VALUES ('39', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:33:23', '1');
INSERT INTO `auth_logins` VALUES ('40', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:34:00', '1');
INSERT INTO `auth_logins` VALUES ('41', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-20 23:35:35', '1');
INSERT INTO `auth_logins` VALUES ('42', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-20 23:35:54', '1');
INSERT INTO `auth_logins` VALUES ('43', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-21 02:17:00', '1');
INSERT INTO `auth_logins` VALUES ('44', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 02:18:13', '1');
INSERT INTO `auth_logins` VALUES ('45', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 02:39:36', '1');
INSERT INTO `auth_logins` VALUES ('46', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 03:23:12', '1');
INSERT INTO `auth_logins` VALUES ('47', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-21 20:26:39', '1');
INSERT INTO `auth_logins` VALUES ('48', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 20:31:55', '1');
INSERT INTO `auth_logins` VALUES ('49', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 20:55:44', '1');
INSERT INTO `auth_logins` VALUES ('50', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-21 23:45:49', '1');
INSERT INTO `auth_logins` VALUES ('51', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 03:44:36', '1');
INSERT INTO `auth_logins` VALUES ('52', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-22 03:46:06', '1');
INSERT INTO `auth_logins` VALUES ('53', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 03:47:45', '1');
INSERT INTO `auth_logins` VALUES ('54', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-22 04:41:17', '1');
INSERT INTO `auth_logins` VALUES ('55', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 04:41:47', '1');
INSERT INTO `auth_logins` VALUES ('56', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-22 04:46:17', '1');
INSERT INTO `auth_logins` VALUES ('57', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 04:47:06', '1');
INSERT INTO `auth_logins` VALUES ('58', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 04:47:55', '1');
INSERT INTO `auth_logins` VALUES ('59', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 04:49:08', '1');
INSERT INTO `auth_logins` VALUES ('60', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-22 04:50:21', '1');
INSERT INTO `auth_logins` VALUES ('61', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-22 04:51:25', '1');
INSERT INTO `auth_logins` VALUES ('62', '::1', 'gundhez', null, '2022-10-23 20:18:05', '0');
INSERT INTO `auth_logins` VALUES ('63', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-23 20:18:13', '1');
INSERT INTO `auth_logins` VALUES ('64', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-23 21:39:15', '1');
INSERT INTO `auth_logins` VALUES ('65', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-23 21:41:20', '1');
INSERT INTO `auth_logins` VALUES ('66', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-23 21:47:33', '1');
INSERT INTO `auth_logins` VALUES ('67', '::1', 'gundhez', null, '2022-10-23 21:50:56', '0');
INSERT INTO `auth_logins` VALUES ('68', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-23 21:51:02', '1');
INSERT INTO `auth_logins` VALUES ('69', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 20:22:01', '1');
INSERT INTO `auth_logins` VALUES ('70', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 20:26:51', '1');
INSERT INTO `auth_logins` VALUES ('71', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 21:21:50', '1');
INSERT INTO `auth_logins` VALUES ('72', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 21:51:20', '1');
INSERT INTO `auth_logins` VALUES ('73', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 21:55:18', '1');
INSERT INTO `auth_logins` VALUES ('74', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 21:56:59', '1');
INSERT INTO `auth_logins` VALUES ('75', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 21:57:28', '1');
INSERT INTO `auth_logins` VALUES ('76', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 21:57:51', '1');
INSERT INTO `auth_logins` VALUES ('77', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:07:26', '1');
INSERT INTO `auth_logins` VALUES ('78', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:10:28', '1');
INSERT INTO `auth_logins` VALUES ('79', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:13:13', '1');
INSERT INTO `auth_logins` VALUES ('80', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:16:40', '1');
INSERT INTO `auth_logins` VALUES ('81', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:17:23', '1');
INSERT INTO `auth_logins` VALUES ('82', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 22:18:51', '1');
INSERT INTO `auth_logins` VALUES ('83', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:19:05', '1');
INSERT INTO `auth_logins` VALUES ('84', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 22:22:46', '1');
INSERT INTO `auth_logins` VALUES ('85', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 22:26:10', '1');
INSERT INTO `auth_logins` VALUES ('86', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:26:24', '1');
INSERT INTO `auth_logins` VALUES ('87', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:35:36', '1');
INSERT INTO `auth_logins` VALUES ('88', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:35:57', '1');
INSERT INTO `auth_logins` VALUES ('89', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 22:45:32', '1');
INSERT INTO `auth_logins` VALUES ('90', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-24 22:58:58', '1');
INSERT INTO `auth_logins` VALUES ('91', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-24 23:14:39', '1');
INSERT INTO `auth_logins` VALUES ('92', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 03:35:11', '1');
INSERT INTO `auth_logins` VALUES ('93', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 03:40:26', '1');
INSERT INTO `auth_logins` VALUES ('94', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 03:41:58', '1');
INSERT INTO `auth_logins` VALUES ('95', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 03:58:54', '1');
INSERT INTO `auth_logins` VALUES ('96', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:03:11', '1');
INSERT INTO `auth_logins` VALUES ('97', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:05:22', '1');
INSERT INTO `auth_logins` VALUES ('98', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 04:14:21', '1');
INSERT INTO `auth_logins` VALUES ('99', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 04:19:05', '1');
INSERT INTO `auth_logins` VALUES ('100', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:19:35', '1');
INSERT INTO `auth_logins` VALUES ('101', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:37:11', '1');
INSERT INTO `auth_logins` VALUES ('102', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 04:41:50', '1');
INSERT INTO `auth_logins` VALUES ('103', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:42:19', '1');
INSERT INTO `auth_logins` VALUES ('104', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 04:43:27', '1');
INSERT INTO `auth_logins` VALUES ('105', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 04:45:25', '1');
INSERT INTO `auth_logins` VALUES ('106', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 21:51:33', '1');
INSERT INTO `auth_logins` VALUES ('107', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 21:52:32', '1');
INSERT INTO `auth_logins` VALUES ('108', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:00:07', '1');
INSERT INTO `auth_logins` VALUES ('109', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:03:26', '1');
INSERT INTO `auth_logins` VALUES ('110', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:05:27', '1');
INSERT INTO `auth_logins` VALUES ('111', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:12:46', '1');
INSERT INTO `auth_logins` VALUES ('112', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:13:37', '1');
INSERT INTO `auth_logins` VALUES ('113', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 22:15:04', '1');
INSERT INTO `auth_logins` VALUES ('114', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:15:41', '1');
INSERT INTO `auth_logins` VALUES ('115', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-25 22:21:03', '1');
INSERT INTO `auth_logins` VALUES ('116', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-25 22:21:47', '1');
INSERT INTO `auth_logins` VALUES ('117', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 01:16:07', '1');
INSERT INTO `auth_logins` VALUES ('118', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 03:21:47', '1');
INSERT INTO `auth_logins` VALUES ('119', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 03:24:56', '1');
INSERT INTO `auth_logins` VALUES ('120', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 04:24:57', '1');
INSERT INTO `auth_logins` VALUES ('121', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:30:23', '1');
INSERT INTO `auth_logins` VALUES ('122', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:34:43', '1');
INSERT INTO `auth_logins` VALUES ('123', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:35:09', '1');
INSERT INTO `auth_logins` VALUES ('124', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-26 20:35:45', '1');
INSERT INTO `auth_logins` VALUES ('125', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:53:33', '1');
INSERT INTO `auth_logins` VALUES ('126', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:57:08', '1');
INSERT INTO `auth_logins` VALUES ('127', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 20:57:21', '1');
INSERT INTO `auth_logins` VALUES ('128', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:00:17', '1');
INSERT INTO `auth_logins` VALUES ('129', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-26 21:09:14', '1');
INSERT INTO `auth_logins` VALUES ('130', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:36:31', '1');
INSERT INTO `auth_logins` VALUES ('131', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:41:08', '1');
INSERT INTO `auth_logins` VALUES ('132', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:43:35', '1');
INSERT INTO `auth_logins` VALUES ('133', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:44:09', '1');
INSERT INTO `auth_logins` VALUES ('134', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:50:44', '1');
INSERT INTO `auth_logins` VALUES ('135', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:51:27', '1');
INSERT INTO `auth_logins` VALUES ('136', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-26 21:51:45', '1');
INSERT INTO `auth_logins` VALUES ('137', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:52:28', '1');
INSERT INTO `auth_logins` VALUES ('138', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-26 21:53:22', '1');
INSERT INTO `auth_logins` VALUES ('139', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-26 21:54:02', '1');
INSERT INTO `auth_logins` VALUES ('140', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 03:19:27', '1');
INSERT INTO `auth_logins` VALUES ('141', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 03:51:38', '1');
INSERT INTO `auth_logins` VALUES ('142', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-27 03:53:29', '1');
INSERT INTO `auth_logins` VALUES ('143', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 03:55:06', '1');
INSERT INTO `auth_logins` VALUES ('144', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-27 03:58:51', '1');
INSERT INTO `auth_logins` VALUES ('145', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 04:05:04', '1');
INSERT INTO `auth_logins` VALUES ('146', '::1', 'web@gmail.com', '8', '2022-10-27 04:07:50', '1');
INSERT INTO `auth_logins` VALUES ('147', '::1', 'web@gmail.com', '8', '2022-10-27 04:10:37', '1');
INSERT INTO `auth_logins` VALUES ('148', '::1', 'web@gmail.com', '8', '2022-10-27 04:11:41', '1');
INSERT INTO `auth_logins` VALUES ('149', '::1', 'web@gmail.com', '8', '2022-10-27 04:16:31', '1');
INSERT INTO `auth_logins` VALUES ('150', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 04:17:12', '1');
INSERT INTO `auth_logins` VALUES ('151', '::1', 'web@gmail.com', '8', '2022-10-27 04:19:08', '1');
INSERT INTO `auth_logins` VALUES ('152', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-27 04:19:29', '1');
INSERT INTO `auth_logins` VALUES ('153', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-27 04:19:48', '1');
INSERT INTO `auth_logins` VALUES ('154', '::1', 'web@gmail.com', '8', '2022-10-27 04:20:57', '1');
INSERT INTO `auth_logins` VALUES ('155', '::1', 'web@gmail.com', '8', '2022-10-27 04:25:02', '1');
INSERT INTO `auth_logins` VALUES ('156', '::1', 'web@gmail.com', '8', '2022-10-27 04:29:28', '1');
INSERT INTO `auth_logins` VALUES ('157', '::1', 'web@gmail.com', '8', '2022-10-27 04:31:05', '1');
INSERT INTO `auth_logins` VALUES ('158', '::1', 'web@gmail.com', '8', '2022-10-27 04:33:55', '1');
INSERT INTO `auth_logins` VALUES ('159', '::1', 'fajar.dwr@gmail.com', null, '2022-10-27 04:35:04', '0');
INSERT INTO `auth_logins` VALUES ('160', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-27 04:35:10', '1');
INSERT INTO `auth_logins` VALUES ('161', '::1', 'web@gmail.com', '8', '2022-10-27 04:36:19', '1');
INSERT INTO `auth_logins` VALUES ('162', '::1', 'web@gmail.com', '8', '2022-10-27 20:30:33', '1');
INSERT INTO `auth_logins` VALUES ('163', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-30 23:19:24', '1');
INSERT INTO `auth_logins` VALUES ('164', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-31 21:43:22', '1');
INSERT INTO `auth_logins` VALUES ('165', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-31 21:53:40', '1');
INSERT INTO `auth_logins` VALUES ('166', '::1', 'gundhez.dwr@gmail.com', '7', '2022-10-31 21:54:02', '1');
INSERT INTO `auth_logins` VALUES ('167', '::1', 'web', null, '2022-10-31 21:56:26', '0');
INSERT INTO `auth_logins` VALUES ('168', '::1', 'web@gmail.com', '8', '2022-10-31 21:56:35', '1');
INSERT INTO `auth_logins` VALUES ('169', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-31 22:00:46', '1');
INSERT INTO `auth_logins` VALUES ('170', '::1', 'web@gmail.com', '8', '2022-10-31 22:01:03', '1');
INSERT INTO `auth_logins` VALUES ('171', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-31 22:02:50', '1');
INSERT INTO `auth_logins` VALUES ('172', '::1', 'web@gmail.com', '8', '2022-10-31 22:04:57', '1');
INSERT INTO `auth_logins` VALUES ('173', '::1', 'web@gmail.com', '8', '2022-10-31 22:06:12', '1');
INSERT INTO `auth_logins` VALUES ('174', '::1', 'fajar', null, '2022-10-31 22:11:14', '0');
INSERT INTO `auth_logins` VALUES ('175', '::1', 'fajar.dwr@gmail.com', '1', '2022-10-31 22:11:19', '1');
INSERT INTO `auth_logins` VALUES ('176', '::1', 'web', null, '2022-10-31 22:14:45', '0');
INSERT INTO `auth_logins` VALUES ('177', '::1', 'gundhez', null, '2022-10-31 22:14:51', '0');
INSERT INTO `auth_logins` VALUES ('178', '::1', 'fajar', null, '2022-10-31 22:14:56', '0');
INSERT INTO `auth_logins` VALUES ('179', '::1', 'web@gmail.com', '8', '2022-10-31 23:23:29', '1');
INSERT INTO `auth_logins` VALUES ('180', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 01:30:08', '1');
INSERT INTO `auth_logins` VALUES ('181', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 02:23:57', '1');
INSERT INTO `auth_logins` VALUES ('182', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 02:29:43', '1');
INSERT INTO `auth_logins` VALUES ('183', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 02:33:20', '1');
INSERT INTO `auth_logins` VALUES ('184', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 02:39:46', '1');
INSERT INTO `auth_logins` VALUES ('185', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 02:43:03', '1');
INSERT INTO `auth_logins` VALUES ('186', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 03:04:05', '1');
INSERT INTO `auth_logins` VALUES ('187', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 04:08:43', '1');
INSERT INTO `auth_logins` VALUES ('188', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 04:11:00', '1');
INSERT INTO `auth_logins` VALUES ('189', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 04:16:17', '1');
INSERT INTO `auth_logins` VALUES ('190', '::1', 'web@gmail.com', '8', '2022-11-01 04:28:55', '1');
INSERT INTO `auth_logins` VALUES ('191', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-01 04:29:14', '1');
INSERT INTO `auth_logins` VALUES ('192', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 04:40:12', '1');
INSERT INTO `auth_logins` VALUES ('193', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-01 21:10:19', '1');
INSERT INTO `auth_logins` VALUES ('194', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 02:59:48', '1');
INSERT INTO `auth_logins` VALUES ('195', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:01:38', '1');
INSERT INTO `auth_logins` VALUES ('196', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:02:18', '1');
INSERT INTO `auth_logins` VALUES ('197', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:02:38', '1');
INSERT INTO `auth_logins` VALUES ('198', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:03:07', '1');
INSERT INTO `auth_logins` VALUES ('199', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:04:30', '1');
INSERT INTO `auth_logins` VALUES ('200', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:05:52', '1');
INSERT INTO `auth_logins` VALUES ('201', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:07:38', '1');
INSERT INTO `auth_logins` VALUES ('202', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:09:49', '1');
INSERT INTO `auth_logins` VALUES ('203', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:10:14', '1');
INSERT INTO `auth_logins` VALUES ('204', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:12:48', '1');
INSERT INTO `auth_logins` VALUES ('205', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:16:59', '1');
INSERT INTO `auth_logins` VALUES ('206', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-02 03:17:15', '1');
INSERT INTO `auth_logins` VALUES ('207', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:17:35', '1');
INSERT INTO `auth_logins` VALUES ('208', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:18:10', '1');
INSERT INTO `auth_logins` VALUES ('209', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-02 03:18:27', '1');
INSERT INTO `auth_logins` VALUES ('210', '::1', 'web@gmail.com', '8', '2022-11-02 03:18:59', '1');
INSERT INTO `auth_logins` VALUES ('211', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:19:42', '1');
INSERT INTO `auth_logins` VALUES ('212', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:20:10', '1');
INSERT INTO `auth_logins` VALUES ('213', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-02 03:21:19', '1');
INSERT INTO `auth_logins` VALUES ('214', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:21:50', '1');
INSERT INTO `auth_logins` VALUES ('215', '::1', 'web@gmail.com', '8', '2022-11-02 03:22:17', '1');
INSERT INTO `auth_logins` VALUES ('216', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:23:21', '1');
INSERT INTO `auth_logins` VALUES ('217', '::1', 'web@gmail.com', '8', '2022-11-02 03:23:42', '1');
INSERT INTO `auth_logins` VALUES ('218', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:30:12', '1');
INSERT INTO `auth_logins` VALUES ('219', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:30:28', '1');
INSERT INTO `auth_logins` VALUES ('220', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-02 03:30:48', '1');
INSERT INTO `auth_logins` VALUES ('221', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-02 03:31:04', '1');
INSERT INTO `auth_logins` VALUES ('222', '::1', 'web@gmail.com', '8', '2022-11-02 03:31:55', '1');
INSERT INTO `auth_logins` VALUES ('223', '::1', 'web@gmail.com', '8', '2022-11-02 03:32:37', '1');
INSERT INTO `auth_logins` VALUES ('224', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 03:33:15', '1');
INSERT INTO `auth_logins` VALUES ('225', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-02 20:17:47', '1');
INSERT INTO `auth_logins` VALUES ('226', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 02:33:39', '1');
INSERT INTO `auth_logins` VALUES ('227', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-03 02:34:21', '1');
INSERT INTO `auth_logins` VALUES ('228', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 02:35:51', '1');
INSERT INTO `auth_logins` VALUES ('229', '::1', 'fajar', null, '2022-11-03 02:36:04', '0');
INSERT INTO `auth_logins` VALUES ('230', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 02:36:11', '1');
INSERT INTO `auth_logins` VALUES ('231', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 20:14:51', '1');
INSERT INTO `auth_logins` VALUES ('232', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 20:17:54', '1');
INSERT INTO `auth_logins` VALUES ('233', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 20:20:16', '1');
INSERT INTO `auth_logins` VALUES ('234', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 20:21:04', '1');
INSERT INTO `auth_logins` VALUES ('235', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-03 20:21:25', '1');
INSERT INTO `auth_logins` VALUES ('236', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-03 20:21:43', '1');
INSERT INTO `auth_logins` VALUES ('237', '::1', 'web@gmail.com', '8', '2022-11-03 20:21:58', '1');
INSERT INTO `auth_logins` VALUES ('238', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 20:29:43', '1');
INSERT INTO `auth_logins` VALUES ('239', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-03 21:43:35', '1');
INSERT INTO `auth_logins` VALUES ('240', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-04 01:01:40', '1');
INSERT INTO `auth_logins` VALUES ('241', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-04 03:57:19', '1');
INSERT INTO `auth_logins` VALUES ('242', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-04 20:15:17', '1');
INSERT INTO `auth_logins` VALUES ('243', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-04 20:31:07', '1');
INSERT INTO `auth_logins` VALUES ('244', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-05 02:18:03', '1');
INSERT INTO `auth_logins` VALUES ('245', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-05 02:18:45', '1');
INSERT INTO `auth_logins` VALUES ('246', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-05 02:20:41', '1');
INSERT INTO `auth_logins` VALUES ('247', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-06 19:38:13', '1');
INSERT INTO `auth_logins` VALUES ('248', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-07 19:58:40', '1');
INSERT INTO `auth_logins` VALUES ('249', '::1', 'gundhez.dwr@gmail.com', '7', '2022-11-07 20:21:32', '1');
INSERT INTO `auth_logins` VALUES ('250', '::1', 'web@gmail.com', '8', '2022-11-07 20:22:32', '1');
INSERT INTO `auth_logins` VALUES ('251', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-07 22:53:26', '1');
INSERT INTO `auth_logins` VALUES ('252', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-08 01:41:33', '1');
INSERT INTO `auth_logins` VALUES ('253', '::1', 'web@gmail.com', '8', '2022-11-08 02:05:05', '1');
INSERT INTO `auth_logins` VALUES ('254', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-08 02:48:25', '1');
INSERT INTO `auth_logins` VALUES ('255', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-09 00:20:14', '1');
INSERT INTO `auth_logins` VALUES ('256', '::1', 'web@gmail.com', '8', '2022-11-09 03:54:12', '1');
INSERT INTO `auth_logins` VALUES ('257', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-10 21:01:22', '1');
INSERT INTO `auth_logins` VALUES ('258', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-11 20:57:27', '1');
INSERT INTO `auth_logins` VALUES ('259', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-15 02:45:14', '1');
INSERT INTO `auth_logins` VALUES ('260', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-15 19:22:24', '1');
INSERT INTO `auth_logins` VALUES ('261', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-16 03:14:10', '1');
INSERT INTO `auth_logins` VALUES ('262', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-16 21:49:38', '1');
INSERT INTO `auth_logins` VALUES ('263', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-17 03:46:57', '1');
INSERT INTO `auth_logins` VALUES ('264', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-17 21:07:38', '1');
INSERT INTO `auth_logins` VALUES ('265', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-18 20:20:21', '1');
INSERT INTO `auth_logins` VALUES ('266', '::1', 'fajar.dwr@gmail.com', '1', '2022-11-21 01:00:28', '1');
INSERT INTO `auth_logins` VALUES ('267', '::1', 'fajar', null, '2022-12-28 00:55:57', '0');
INSERT INTO `auth_logins` VALUES ('268', '::1', 'admin', null, '2022-12-28 00:56:01', '0');
INSERT INTO `auth_logins` VALUES ('269', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 00:56:41', '1');
INSERT INTO `auth_logins` VALUES ('270', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 01:13:40', '1');
INSERT INTO `auth_logins` VALUES ('271', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 01:15:05', '1');
INSERT INTO `auth_logins` VALUES ('272', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 01:18:40', '1');
INSERT INTO `auth_logins` VALUES ('273', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 01:26:25', '1');
INSERT INTO `auth_logins` VALUES ('274', '::1', 'fajar.dwr@gmail.com', '1', '2022-12-28 01:31:53', '1');
INSERT INTO `auth_logins` VALUES ('275', '127.0.0.1', 'Admin \' OR NOT username=1120-- BGqV', null, '2023-01-17 01:59:30', '0');
INSERT INTO `auth_logins` VALUES ('276', '127.0.0.1', 'sd', null, '2023-01-17 01:59:37', '0');
INSERT INTO `auth_logins` VALUES ('277', '127.0.0.1', '\'', null, '2023-01-17 01:59:41', '0');
INSERT INTO `auth_logins` VALUES ('278', '127.0.0.1', 'fajar', null, '2023-01-17 02:03:13', '0');
INSERT INTO `auth_logins` VALUES ('279', '127.0.0.1', 'fajar.dwr@gmail.com', '1', '2023-01-17 02:03:33', '1');
INSERT INTO `auth_logins` VALUES ('280', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-18 20:18:31', '1');
INSERT INTO `auth_logins` VALUES ('281', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-19 20:19:23', '1');
INSERT INTO `auth_logins` VALUES ('282', '::1', 'fajar', null, '2023-01-19 20:33:57', '0');
INSERT INTO `auth_logins` VALUES ('283', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-19 20:34:04', '1');
INSERT INTO `auth_logins` VALUES ('284', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-19 20:40:36', '1');
INSERT INTO `auth_logins` VALUES ('285', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-19 20:46:34', '1');
INSERT INTO `auth_logins` VALUES ('286', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 01:40:09', '1');
INSERT INTO `auth_logins` VALUES ('287', '::1', 'fajar', null, '2023-01-20 02:28:25', '0');
INSERT INTO `auth_logins` VALUES ('288', '::1', '\'', null, '2023-01-20 02:28:29', '0');
INSERT INTO `auth_logins` VALUES ('289', '::1', 'fajar', null, '2023-01-20 02:33:53', '0');
INSERT INTO `auth_logins` VALUES ('290', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:33:59', '1');
INSERT INTO `auth_logins` VALUES ('291', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:47:59', '1');
INSERT INTO `auth_logins` VALUES ('292', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:49:43', '1');
INSERT INTO `auth_logins` VALUES ('293', '::1', 'Admin \' OR NOT username=1120-- BGqV', null, '2023-01-20 02:52:27', '0');
INSERT INTO `auth_logins` VALUES ('294', '::1', 'Admin \' OR NOT username=1120-- BGqV', null, '2023-01-20 02:52:31', '0');
INSERT INTO `auth_logins` VALUES ('295', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:54:37', '1');
INSERT INTO `auth_logins` VALUES ('296', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:57:15', '1');
INSERT INTO `auth_logins` VALUES ('297', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:57:48', '1');
INSERT INTO `auth_logins` VALUES ('298', '127.0.0.1', 'fajar.dwr@gmail.com', '1', '2023-01-20 02:59:28', '1');
INSERT INTO `auth_logins` VALUES ('299', '127.0.0.1', 'dfh', null, '2023-01-20 03:01:06', '0');
INSERT INTO `auth_logins` VALUES ('300', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 03:37:44', '1');
INSERT INTO `auth_logins` VALUES ('301', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 03:38:39', '1');
INSERT INTO `auth_logins` VALUES ('302', '127.0.0.1', 'fajar.dwr@gmail.com', '1', '2023-01-20 03:39:11', '1');
INSERT INTO `auth_logins` VALUES ('303', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 19:04:27', '1');
INSERT INTO `auth_logins` VALUES ('304', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 21:30:51', '1');
INSERT INTO `auth_logins` VALUES ('305', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-20 22:43:56', '1');
INSERT INTO `auth_logins` VALUES ('306', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-21 00:32:12', '1');
INSERT INTO `auth_logins` VALUES ('307', '::1', 'fajar', null, '2023-01-23 19:36:20', '0');
INSERT INTO `auth_logins` VALUES ('308', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-23 19:36:26', '1');
INSERT INTO `auth_logins` VALUES ('309', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-23 20:49:16', '1');
INSERT INTO `auth_logins` VALUES ('310', '::1', 'fajar.dwr@gmail.com', '1', '2023-01-24 02:28:10', '1');
INSERT INTO `auth_logins` VALUES ('311', '192.168.6.86', 'fajar.dwr@gmail.com', '1', '2023-01-24 03:57:12', '1');
INSERT INTO `auth_logins` VALUES ('312', '192.168.6.86', 'admin@gmail.com', '2', '2023-01-24 04:00:52', '1');
INSERT INTO `auth_logins` VALUES ('313', '192.168.6.85', 'admin@gmail.com', '2', '2023-01-24 04:03:59', '1');
INSERT INTO `auth_logins` VALUES ('314', '192.168.6.85', 'admin@gmail.com', '2', '2023-01-24 04:13:04', '1');
INSERT INTO `auth_logins` VALUES ('315', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-24 20:07:09', '1');
INSERT INTO `auth_logins` VALUES ('316', '192.168.6.85', 'fajar', null, '2023-01-25 21:13:27', '0');
INSERT INTO `auth_logins` VALUES ('317', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-25 21:13:39', '1');
INSERT INTO `auth_logins` VALUES ('318', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 00:04:26', '1');
INSERT INTO `auth_logins` VALUES ('319', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 00:36:29', '1');
INSERT INTO `auth_logins` VALUES ('320', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 00:51:32', '1');
INSERT INTO `auth_logins` VALUES ('321', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 19:50:31', '1');
INSERT INTO `auth_logins` VALUES ('322', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 19:51:32', '1');
INSERT INTO `auth_logins` VALUES ('323', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 21:16:31', '1');
INSERT INTO `auth_logins` VALUES ('324', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 21:19:21', '1');
INSERT INTO `auth_logins` VALUES ('325', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-26 21:26:39', '1');
INSERT INTO `auth_logins` VALUES ('326', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-27 00:32:54', '1');
INSERT INTO `auth_logins` VALUES ('327', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-27 19:06:40', '1');
INSERT INTO `auth_logins` VALUES ('328', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-30 19:20:41', '1');
INSERT INTO `auth_logins` VALUES ('329', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-30 22:13:24', '1');
INSERT INTO `auth_logins` VALUES ('330', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-31 00:45:40', '1');
INSERT INTO `auth_logins` VALUES ('331', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-01-31 03:24:49', '1');
INSERT INTO `auth_logins` VALUES ('332', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-01 19:26:07', '1');
INSERT INTO `auth_logins` VALUES ('333', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-01 19:34:00', '1');
INSERT INTO `auth_logins` VALUES ('334', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-01 20:43:46', '1');
INSERT INTO `auth_logins` VALUES ('335', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-02 03:02:46', '1');
INSERT INTO `auth_logins` VALUES ('336', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-02 19:08:18', '1');
INSERT INTO `auth_logins` VALUES ('337', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-03 04:21:21', '1');
INSERT INTO `auth_logins` VALUES ('338', '192.168.6.85', 'admin@gmail.com', '2', '2023-02-03 19:41:15', '1');
INSERT INTO `auth_logins` VALUES ('339', '192.168.6.85', 'fajar.dwr@gmail.com', '1', '2023-02-06 01:28:07', '1');

-- ----------------------------
-- Table structure for auth_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------
INSERT INTO `auth_permissions` VALUES ('1', 'manage-users', 'Manage All users');
INSERT INTO `auth_permissions` VALUES ('2', 'manage-profile', 'Manage Users Profile');
INSERT INTO `auth_permissions` VALUES ('3', 'change-password', 'Ubah password');
INSERT INTO `auth_permissions` VALUES ('4', 'user-list', 'user-list');
INSERT INTO `auth_permissions` VALUES ('5', 'manage-shop', '');
INSERT INTO `auth_permissions` VALUES ('6', 'manage-master', '');
INSERT INTO `auth_permissions` VALUES ('7', 'manage-transaction', '');
INSERT INTO `auth_permissions` VALUES ('8', 'view-report', '');
INSERT INTO `auth_permissions` VALUES ('9', 'user-access', '');
INSERT INTO `auth_permissions` VALUES ('10', 'list-product', '');
INSERT INTO `auth_permissions` VALUES ('11', 'list-category', '');
INSERT INTO `auth_permissions` VALUES ('12', 'purchasing', 'transaksi');
INSERT INTO `auth_permissions` VALUES ('13', 'selling', 'transaksi');
INSERT INTO `auth_permissions` VALUES ('14', 'list-customer', 'Master Customer');
INSERT INTO `auth_permissions` VALUES ('15', 'list-selling', 'List Transaksi Penjualan ');
INSERT INTO `auth_permissions` VALUES ('16', 'list-selling-report', 'List Report Penjualan');
INSERT INTO `auth_permissions` VALUES ('17', 'lost-profit', 'Report Rugi/Laba');
INSERT INTO `auth_permissions` VALUES ('18', 'list-purchase', 'List Pembelian');
INSERT INTO `auth_permissions` VALUES ('19', 'list-supplier', 'List Supliyer');

-- ----------------------------
-- Table structure for auth_permissions_submenu
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions_submenu`;
CREATE TABLE `auth_permissions_submenu` (
  `id_submenu` varchar(11) NOT NULL,
  `name_submenu` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_permissions_submenu
-- ----------------------------
INSERT INTO `auth_permissions_submenu` VALUES ('1.1', 'user-list', 'user-list');
INSERT INTO `auth_permissions_submenu` VALUES ('1.2', 'user-access', 'user akses');

-- ----------------------------
-- Table structure for auth_reset_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for auth_users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------
INSERT INTO `auth_users_permissions` VALUES ('1', '1');
INSERT INTO `auth_users_permissions` VALUES ('1', '2');
INSERT INTO `auth_users_permissions` VALUES ('1', '3');
INSERT INTO `auth_users_permissions` VALUES ('1', '4');
INSERT INTO `auth_users_permissions` VALUES ('1', '5');
INSERT INTO `auth_users_permissions` VALUES ('1', '6');
INSERT INTO `auth_users_permissions` VALUES ('1', '7');
INSERT INTO `auth_users_permissions` VALUES ('1', '8');
SET FOREIGN_KEY_CHECKS=1;
