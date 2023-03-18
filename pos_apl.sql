/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 100420
Source Host           : localhost:3307
Source Database       : pos_apl

Target Server Type    : MYSQL
Target Server Version : 100420
File Encoding         : 65001

Date: 2023-02-03 17:00:17
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
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('2', 'BR002', '5', 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '37', '6 October 2020, 0:41', '6 October 2020, 0:54');
INSERT INTO `barang` VALUES ('3', 'BR003', '1', 'Pulpen', 'Standard', '1500', '2000', 'PCS', '69', '6 October 2020, 1:34', null);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'ATK', '7 May 2017, 10:23');
INSERT INTO `kategori` VALUES ('5', 'Sabun', '7 May 2017, 10:28');
INSERT INTO `kategori` VALUES ('6', 'Snack', '6 October 2020, 0:19');
INSERT INTO `kategori` VALUES ('7', 'Minuman', '6 October 2020, 0:20');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '1');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'admin', 'uj harapan', '081234567890', 'example@gmail.com', '1674116466favicon.png', '12314121');

-- ----------------------------
-- Table structure for nota
-- ----------------------------
DROP TABLE IF EXISTS `nota`;
CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nota
-- ----------------------------
INSERT INTO `nota` VALUES ('1', 'BR001', '1', '4', '12000', '6 October 2020, 0:45', '10-2020');
INSERT INTO `nota` VALUES ('2', 'BR001', '1', '4', '12000', '6 October 2020, 0:45', '10-2020');
INSERT INTO `nota` VALUES ('3', 'BR001', '1', '4', '12000', '6 October 2020, 0:45', '10-2020');
INSERT INTO `nota` VALUES ('4', 'BR001', '1', '4', '12000', '6 October 2020, 0:45', '10-2020');
INSERT INTO `nota` VALUES ('5', 'BR001', '1', '2', '6000', '6 October 2020, 0:49', '10-2020');
INSERT INTO `nota` VALUES ('6', 'BR001', '1', '2', '6000', '6 October 2020, 0:49', '10-2020');
INSERT INTO `nota` VALUES ('7', 'BR001', '1', '2', '6000', '6 October 2020, 1:15', '10-2020');
INSERT INTO `nota` VALUES ('8', 'BR002', '1', '2', '6000', '6 October 2020, 1:17', '10-2020');
INSERT INTO `nota` VALUES ('9', 'BR001', '1', '2', '6000', '6 October 2020, 1:20', '10-2020');
INSERT INTO `nota` VALUES ('10', 'BR002', '1', '1', '3000', '19 January 2023, 15:30', '01-2023');
INSERT INTO `nota` VALUES ('11', 'BR003', '1', '1', '2000', '19 January 2023, 15:31', '01-2023');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('24', 'BR002', '1', '1', '3000', '19 January 2023, 15:30');
INSERT INTO `penjualan` VALUES ('25', 'BR003', '1', '1', '2000', '19 January 2023, 15:31');

-- ----------------------------
-- Table structure for tb_category
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Status` varchar(1) DEFAULT '',
  `InputDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `UserInput` varchar(255) DEFAULT NULL,
  `UserUpdate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_category
-- ----------------------------
INSERT INTO `tb_category` VALUES ('1', 'SKINCARE', '1', '2023-01-28 11:13:43', null, 'ADMIN', null);

-- ----------------------------
-- Table structure for tb_cp
-- ----------------------------
DROP TABLE IF EXISTS `tb_cp`;
CREATE TABLE `tb_cp` (
  `id_toko` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_cp
-- ----------------------------
INSERT INTO `tb_cp` VALUES ('1', 'BR002', 'fgjkf', 'Sabun', 'Lifeboy', '37');

-- ----------------------------
-- Table structure for tb_customer
-- ----------------------------
DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_customer
-- ----------------------------
INSERT INTO `tb_customer` VALUES ('1', 'Marketing', 'Surabaya', 'a', 'a', 'Surabaya', 'Jawa Timur', '12345', '031', '085745687777', null, '1', null, null, '2023-01-25 14:00:18', null, null, null);
INSERT INTO `tb_customer` VALUES ('2', 'Fonny', 'Surabaya', 'pulorejo', '346', 'Surabaya', 'Jawa Timur', '436', '0310000000', '438236756', null, '1', 'fajar', 'fajar', '2023-01-25 02:44:43', '2023-01-25 02:48:58', null, null);
INSERT INTO `tb_customer` VALUES ('3', 'Rio', 'Surabaya', 'SDG', 'SDG', 'Surabaya', 'Jawa Timur', 'sg', '0310000000', '258463', '0', '1', 'fajar', null, '2023-01-26 20:25:48', null, null, null);
INSERT INTO `tb_customer` VALUES ('4', 'Anastasia', 'Surabaya', null, null, 'Surabaya', 'Jawa Timur', '', null, '3213545', null, '1', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for tb_logo
-- ----------------------------
DROP TABLE IF EXISTS `tb_logo`;
CREATE TABLE `tb_logo` (
  `Logo` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_logo
-- ----------------------------
INSERT INTO `tb_logo` VALUES ('logo_apl.png', 'ANIMAX PUTRA LANCAR');

-- ----------------------------
-- Table structure for tb_product
-- ----------------------------
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductName` text NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `PurchasePrice` decimal(15,2) NOT NULL,
  `SellingPrice` decimal(15,2) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Status` varchar(1) DEFAULT '',
  `InputDate` datetime NOT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `UserInput` varchar(255) DEFAULT NULL,
  `UserUpdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_product
-- ----------------------------
INSERT INTO `tb_product` VALUES ('1', 'R3R001', '1', 'DUO R CLEANSER', 'R3R', '1000.00', '385000.00', 'PCS', '13', '1', '2023-01-24 13:14:19', '2023-02-02 19:55:12', 'ADMIN', 'fajar');
INSERT INTO `tb_product` VALUES ('2', 'R3R002', '1', 'REVITALISING TONER', 'R3R', '1000.00', '380000.00', 'PCS', '13', '1', '2023-01-24 13:14:22', '2023-02-02 19:55:12', 'ADMIN', 'fajar');
INSERT INTO `tb_product` VALUES ('3', 'R3R003', '1', 'RENEWAL ESSENCE', 'R3R', '1000.00', '950000.00', 'PCS', '13', '1', '2023-01-24 13:14:25', '2023-02-02 19:55:12', 'ADMIN', 'fajar');
INSERT INTO `tb_product` VALUES ('4', 'R3R004', '1', 'RESTORING MOISTURIZER', 'R3R', '1000.00', '750000.00', 'PCS', '13', '1', '2023-01-24 13:14:29', '2023-02-02 19:55:12', 'ADMIN', 'fajar');
INSERT INTO `tb_product` VALUES ('5', 'R3R005', '1', 'UVAB PROTECTION', 'R3R', '1000.00', '750000.00', 'PCS', '13', '1', '2023-01-24 13:14:31', '2023-02-02 19:55:12', 'ADMIN', 'fajar');

-- ----------------------------
-- Table structure for tb_stock
-- ----------------------------
DROP TABLE IF EXISTS `tb_stock`;
CREATE TABLE `tb_stock` (
  `ProductID` varchar(255) DEFAULT NULL,
  `Stock_awal` decimal(10,0) DEFAULT NULL,
  `StockMin` decimal(10,0) DEFAULT NULL,
  `StockPlus` decimal(10,0) DEFAULT NULL,
  `Stock_Sekarang` decimal(10,0) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `UserUpdate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `Source` varchar(1) DEFAULT '' COMMENT '1->Transaksi Jual; 2->Transaksi Beli; 3->Adjust'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_stock
-- ----------------------------
INSERT INTO `tb_stock` VALUES ('R3R005', '55', '5', '0', '50', '2023-01-30 22:04:32', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R002', '47', '2', '0', '45', '2023-01-30 22:05:20', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R005', '50', '3', '0', '47', '2023-01-30 22:05:20', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R002', '45', '6', '0', '39', '2023-01-30 23:00:09', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R003', '53', '5', '0', '48', '2023-01-30 23:00:09', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R004', '54', '2', '0', '52', '2023-01-30 23:00:09', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R001', '14', '1', '0', '13', '2023-02-02 19:55:12', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R002', '14', '1', '0', '13', '2023-02-02 19:55:12', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R003', '14', '1', '0', '13', '2023-02-02 19:55:12', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R004', '14', '1', '0', '13', '2023-02-02 19:55:12', '0000-00-00 00:00:00', '1');
INSERT INTO `tb_stock` VALUES ('R3R005', '14', '1', '0', '13', '2023-02-02 19:55:12', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for tb_supplyer
-- ----------------------------
DROP TABLE IF EXISTS `tb_supplyer`;
CREATE TABLE `tb_supplyer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_supplyer
-- ----------------------------

-- ----------------------------
-- Table structure for tb_transaction
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction`;
CREATE TABLE `tb_transaction` (
  `NotaID` varchar(11) NOT NULL,
  `CustomerID` varchar(255) NOT NULL,
  `Item` int(255) NOT NULL,
  `Total` decimal(15,2) NOT NULL,
  `DateInput` datetime NOT NULL,
  `UserInput` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaction
-- ----------------------------
INSERT INTO `tb_transaction` VALUES ('00001', '3', '5', '3215000.00', '2023-02-02 19:55:12', 'fajar');

-- ----------------------------
-- Table structure for tb_transaction_beli
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction_beli`;
CREATE TABLE `tb_transaction_beli` (
  `NotaID` varchar(11) NOT NULL,
  `CustomerID` varchar(255) NOT NULL,
  `Item` int(255) NOT NULL,
  `Total` decimal(15,2) NOT NULL,
  `DateInput` datetime NOT NULL,
  `UserInput` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaction_beli
-- ----------------------------

-- ----------------------------
-- Table structure for tb_transaction_detail
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction_detail`;
CREATE TABLE `tb_transaction_detail` (
  `NotaID` varchar(11) NOT NULL,
  `ProductID` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `SellingPrice` decimal(15,2) NOT NULL,
  `SubTotal` decimal(15,2) DEFAULT NULL,
  `DateInput` datetime NOT NULL,
  `UserInput` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaction_detail
-- ----------------------------
INSERT INTO `tb_transaction_detail` VALUES ('00001', 'R3R001', '1', '385000.00', '385000.00', '2023-02-02 19:55:12', 'fajar');
INSERT INTO `tb_transaction_detail` VALUES ('00001', 'R3R002', '1', '380000.00', '380000.00', '2023-02-02 19:55:12', 'fajar');
INSERT INTO `tb_transaction_detail` VALUES ('00001', 'R3R003', '1', '950000.00', '950000.00', '2023-02-02 19:55:12', 'fajar');
INSERT INTO `tb_transaction_detail` VALUES ('00001', 'R3R004', '1', '750000.00', '750000.00', '2023-02-02 19:55:12', 'fajar');
INSERT INTO `tb_transaction_detail` VALUES ('00001', 'R3R005', '1', '750000.00', '750000.00', '2023-02-02 19:55:12', 'fajar');

-- ----------------------------
-- Table structure for tb_transaction_detail_beli
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction_detail_beli`;
CREATE TABLE `tb_transaction_detail_beli` (
  `NotaID` varchar(11) NOT NULL,
  `ProductID` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `SellingPrice` decimal(15,2) NOT NULL,
  `SubTotal` decimal(15,2) DEFAULT NULL,
  `DateInput` datetime NOT NULL,
  `UserInput` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaction_detail_beli
-- ----------------------------

-- ----------------------------
-- Table structure for tb_transaction_tmp
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaction_tmp`;
CREATE TABLE `tb_transaction_tmp` (
  `NotaID` varchar(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ProductID` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `SellingPrice` decimal(10,2) DEFAULT NULL,
  `Total` decimal(10,0) NOT NULL,
  `ReadyStock` varchar(255) DEFAULT NULL,
  `periode` varchar(255) DEFAULT '',
  `DateInput` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `UserInput` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaction_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'fajar.dwr@gmail.com', 'fajar', 'fajar dwi raharjo', '1667812498_77b47d785ed516122690.png', '$2y$10$8iAviNwYxcIOc0LMEvQ1YeC.npE7uUGbnxGTZ8LWXm0k2Gpe6U5hm', null, null, null, 'f39d7f3a6b9e1ddee1d56dc24a06b1f4', '', null, '1', '0', '2022-10-20 02:51:47', '2022-10-20 02:51:47', null);
INSERT INTO `users` VALUES ('2', 'admin@gmail.com', 'admin', 'admin site', '1667812498_77b47d785ed516122690.png', '$2y$10$8iAviNwYxcIOc0LMEvQ1YeC.npE7uUGbnxGTZ8LWXm0k2Gpe6U5hm', null, null, null, 'f39d7f3a6b9e1ddee1d56dc24a06b1f4', '', null, '1', '0', '2022-10-20 02:51:47', '2022-10-20 02:51:47', null);
INSERT INTO `users` VALUES ('7', 'gundhez.dwr@gmail.com', 'gundhez', 'gundhez thok', 'default.jpg', '$2y$10$JSaKkWMbvSguMj4eNdIHaezpiUcMql/7jt9GZ63YMVB6pkFSqwoGu', null, null, null, null, null, null, '1', '0', '2022-10-20 20:51:34', '2022-10-20 20:51:34', null);
INSERT INTO `users` VALUES ('8', 'web@gmail.com', 'web', 'tukang web', 'default.jpg', '$2y$10$sJRyFKAVx6r5egrw/dPFt.BL6do/s4w1CtBB2KdkVVljVIUmXc/bG', null, null, null, null, null, null, '1', '0', '2022-10-27 04:06:00', '2022-10-27 04:06:00', null);

-- ----------------------------
-- Table structure for users_detail
-- ----------------------------
DROP TABLE IF EXISTS `users_detail`;
CREATE TABLE `users_detail` (
  `UserID` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users_detail
-- ----------------------------
INSERT INTO `users_detail` VALUES ('1', 'alamat x\r\nkota x\r\nprov x\r\nIndonesia x\r\nkota x\r\nprov \r\nIndonesia', 'kota', 'prov', 'Indonesia', '426469999', '32464361584');
INSERT INTO `users_detail` VALUES ('7', null, null, null, null, null, null);
INSERT INTO `users_detail` VALUES ('8', '5 \r\n 0', null, null, null, '55', '56');
SET FOREIGN_KEY_CHECKS=1;
