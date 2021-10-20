/*
 Navicat Premium Data Transfer

 Source Server         : local_docker
 Source Server Type    : MySQL
 Source Server Version : 80016
 Source Host           : 127.0.0.1:3306
 Source Schema         : exchange

 Target Server Type    : MySQL
 Target Server Version : 80016
 File Encoding         : 65001

 Date: 18/10/2021 23:17:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '代理id',
  `card_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡号',
  `card_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `use_time` datetime DEFAULT NULL COMMENT '兑换时间',
  `is_use` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 是否使用',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cards_card_number_index` (`card_number`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='卡号表';

-- ----------------------------
-- Records of cards
-- ----------------------------
BEGIN;
INSERT INTO `cards` VALUES (6, 1, '629814004', '77297', '18398959054', '2021-10-18 22:33:34', 1, NULL, '2021-10-17 23:35:22', '2021-10-18 22:33:34');
INSERT INTO `cards` VALUES (7, 1, '433746529', '43115', NULL, '2021-07-17 23:35:22', 1, NULL, '2021-10-17 23:35:22', '2021-10-17 23:35:22');
INSERT INTO `cards` VALUES (8, 1, '480773053', '724849', NULL, '2021-08-17 23:35:22', 1, NULL, '2021-10-17 23:35:22', '2021-10-17 23:35:22');
INSERT INTO `cards` VALUES (9, 1, '899538595', '439242', NULL, '2021-09-17 23:35:22', 1, NULL, '2021-10-17 23:35:22', '2021-10-17 23:35:22');
INSERT INTO `cards` VALUES (10, 1, '915315738', '665607', '18390559055', '2021-10-17 23:35:22', 1, NULL, '2021-10-17 23:35:22', '2021-10-17 23:35:22');
INSERT INTO `cards` VALUES (11, 1, '312461624', '451481', '18390559055', '2021-10-17 23:35:22', 1, NULL, '2021-10-17 23:35:22', '2021-10-17 23:35:22');
INSERT INTO `cards` VALUES (12, 1, '609192096', '536029', '18390559055', '2021-10-17 23:35:22', 1, NULL, '2021-10-17 23:36:10', '2021-10-17 23:36:10');
INSERT INTO `cards` VALUES (13, 3, '222923123', '329737', '13551492234', '2021-10-18 22:40:12', 1, NULL, '2021-10-18 22:39:45', '2021-10-18 22:40:12');
INSERT INTO `cards` VALUES (14, 3, '230773669', '367465', NULL, NULL, 0, NULL, '2021-10-18 22:39:45', '2021-10-18 22:39:45');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_05_21_100000_create_teams_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_05_21_200000_create_team_user_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_05_21_300000_create_team_invitations_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_10_16_224456_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_10_16_234427_add_user_fields_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_10_16_235821_create_cards_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_10_17_000825_create_system_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '配置名称',
  `key` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '配置项字段',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '值',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of system
-- ----------------------------
BEGIN;
INSERT INTO `system` VALUES (1, '前端描述', 'description', '手机端兑换页显示说明', '2021-10-17 22:04:47', '2021-10-17 22:07:58');
INSERT INTO `system` VALUES (2, '平台名称', 'platname', '体检卡兑换中心', '2021-10-17 22:04:49', '2021-10-17 22:07:58');
INSERT INTO `system` VALUES (3, '客服电话', 'telphone', '123454354', '2021-10-17 22:04:51', '2021-10-17 22:07:58');
INSERT INTO `system` VALUES (4, '前端logo', 'logo', 'images/logo.png', '2021-10-17 22:04:53', '2021-10-17 22:07:58');
INSERT INTO `system` VALUES (5, '跳转网址', 'url', 'http://www.baidu.com', '2021-10-17 22:04:55', '2021-10-17 22:07:58');
COMMIT;

-- ----------------------------
-- Table structure for team_invitations
-- ----------------------------
DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE `team_invitations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of team_invitations
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for team_user
-- ----------------------------
DROP TABLE IF EXISTS `team_user`;
CREATE TABLE `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of team_user
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of teams
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名字(代理名)',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否管理',
  `limit` int(10) unsigned NOT NULL COMMENT '开卡上限',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, '18398959054', '吴彦祖1', NULL, NULL, '$2y$10$FbltYQvfjBYMltA6fCH/9ungeCGc3RkmijUexm9Iwb1AmjLb6Do6W', 1, 12, NULL, NULL, 'miTFNnUkFkXUddg6S8qtmbPtGuRW2GHWkZkTbrOeVSubvo4F8sJYX2eDNwbB', NULL, NULL, '2021-10-17 21:59:23', '2021-10-17 22:28:09');
INSERT INTO `users` VALUES (3, '18398959050', '吴彦祖', NULL, NULL, '$2y$10$dYMQE300atkOiZmdlQWnxORA2WPmtJN3lMgRGd0tbMK7EQeyrmunu', 0, 1000, NULL, NULL, 'tZG6VNDXq5jrMALHmqeF6iiiz1KijflXs986Ok5momGZ5AksLCEy4ntKUAGQ', NULL, NULL, '2021-10-18 22:34:35', '2021-10-18 22:34:35');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
