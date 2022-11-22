ALTER TABLE `thitr318_vinacenter`.`vnc_users` 
ADD COLUMN `email` varchar(255) NULL AFTER `updated_at`;




CREATE TABLE `thitr318_vinacenter`.`info_users`  (
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


ALTER TABLE `thitr318_vinacenter`.`product_option` 
ADD COLUMN `is_approved` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 0 AFTER `updated_at`;
UPDATE product_option set is_approved = '1'
