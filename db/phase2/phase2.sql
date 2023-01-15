ALTER TABLE `thitr318_vinacenter_demo`.`vnc_users` 
ADD COLUMN `email` varchar(255) NULL AFTER `updated_at`;




CREATE TABLE `thitr318_vinacenter_demo`.`info_users`  (
  `id_info_user` int UNSIGNED NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_province` int NULL,
  `id_district` int NULL,
  `id_ward` int NULL,
  `str_address` varchar(255) NULL,
  `account_number` varchar(255) NULL COMMENT 'số tk',
  `account_name` varchar(255) NULL COMMENT 'tên tk',
  `bank_name` varchar(255) NULL COMMENT 'tên NH',
  `str_wallet_momo` varchar(255) NULL COMMENT 'số ví',
  `str_phone` varchar(255) NULL COMMENT 'sdt',
  `str_email` varchar(255) NULL COMMENT 'sdt',
  `reset_token` varchar(255) NULL,
  `created_at` timestamp(0) NULL,
  `updated_at` timestamp(0) NULL,
  PRIMARY KEY (`id_info_user`)
);


CREATE TABLE `vn_ct`.`ratings`  (
  `id` int NOT NULL,
  `user_id` int NULL,
  `product_id` int NULL,
  `rating` int NULL,
  `comment` varchar(255) NULL,
  `status` int NULL,
  `created_at` int NULL,
  PRIMARY KEY (`id`)
);


ALTER TABLE `thitr318_vinacenter_demo`.`product_option` 
ADD COLUMN `is_approved` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 0 AFTER `updated_at`;
UPDATE product_option set is_approved = '1';



ALTER TABLE `thitr318_vinacenter_demo`.`order_detail` 
ADD COLUMN `voucher_code` varchar(255) NULL AFTER `updated_at`;

ALTER TABLE `thitr318_vinacenter_demo`.`order_detail` 
ADD COLUMN `discount` float NULL AFTER `voucher_code`;


ALTER TABLE `thitr318_vinacenter_demo`.`order_product` 
ADD COLUMN `is_draft` int NULL DEFAULT 0 AFTER `updated_at`;



SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for service_customer
-- ----------------------------
DROP TABLE IF EXISTS `service_customer`;
CREATE TABLE `service_customer`  (
  `id_service_customer` int NOT NULL AUTO_INCREMENT,
  `name_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `service_type` int NULL DEFAULT NULL COMMENT '1 : sua chua, 2: ve sinh may tinh',
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 : tinh phi, 2 : bao hanh',
  `customer_id` int NULL DEFAULT NULL COMMENT 'filled when method == 2',
  `order_id` int NULL DEFAULT NULL COMMENT 'filled when method == 2',
  `order_detail_id` int NULL DEFAULT NULL COMMENT 'filled when method == 2',
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ten sp',
  `condition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'tinh trang khi nhan may',
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_service_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;




---------------------

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for service_customer_detail
-- ----------------------------
DROP TABLE IF EXISTS `service_customer_detail`;
CREATE TABLE `service_customer_detail`  (
  `id_service_customer_detail` int NOT NULL AUTO_INCREMENT,
  `id_service_customer` int NULL DEFAULT NULL,
  `item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'hang muc sua chua/thay the',
  `unit_price` float NULL DEFAULT NULL COMMENT 'don gia',
  `qty` int NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL COMMENT 'thanh tien',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_service_customer_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;



ALTER TABLE `thitr318_vinacenter_demo`.`vnc_product` 
ADD COLUMN `id_accessory` varchar(255) NULL AFTER `updated_at`,
ADD COLUMN `id_color` varchar(255) NULL AFTER `id_accessory`;

ALTER TABLE `thitr318_vinacenter_demo`.`order_detail` 
ADD COLUMN `id_color` varchar(255) NULL COMMENT 'nullable' AFTER `discount`,
ADD COLUMN `id_accessory` varchar(255) NULL COMMENT 'nullable' AFTER `id_color`;


-- update loai sp ban chay -> thong thuong
UPDATE product_option
SET salestop_salesoff = 1
WHERE  salestop_salesoff = 2

INSERT INTO `thitr318_vinacenter`.`product_type`(`id`, `name`) VALUES (4, 'Sản phẩm đã qua sử dụng');

