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

 Date: 02/01/2023 15:39:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for color_detail
-- ----------------------------
DROP TABLE IF EXISTS `color_detail`;
CREATE TABLE `color_detail`  (
  `id_color_detail` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_color` int NULL DEFAULT NULL,
  `id_product_option` int NULL DEFAULT NULL,
  `value` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_color_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
