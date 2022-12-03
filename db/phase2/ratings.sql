/*
 Navicat Premium Data Transfer

 Source Server         : localhost (admin.admin)
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : 127.0.0.1:3306
 Source Schema         : thitr318_vinacenter

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 03/12/2022 23:54:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ratings
-- ----------------------------
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `rating` int NOT NULL,
  `rateable_id` int UNSIGNED NOT NULL,
  `rateable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  `review` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ratings_rateable_id_rateable_type_index`(`rateable_id`, `rateable_type`) USING BTREE,
  INDEX `ratings_rateable_id_index`(`rateable_id`) USING BTREE,
  INDEX `ratings_rateable_type_index`(`rateable_type`) USING BTREE,
  INDEX `ratings_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
