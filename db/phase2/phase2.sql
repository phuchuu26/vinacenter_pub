ALTER TABLE `thitr318_vinacenter`.`vnc_users` 
ADD COLUMN `email` varchar(255) NULL AFTER `updated_at`;



CREATE TABLE `thitr318_vinacenter`.`info_users`  (
  `id_info_user` int NULL,
  `id_user` int NOT NULL,
  `id_province` int NULL,
  `id_district` int NULL,
  `str_address` varchar(255) NULL,
  `account_number` varchar(255) NULL COMMENT 'số tk',
  `account_name` varchar(255) NULL COMMENT 'tên tk',
  `bank_name` varchar(255) NULL COMMENT 'tên NH',
  `str_wallet_momo` varchar(255) NULL COMMENT 'số ví',
  `str_phone` varchar(255) NULL COMMENT 'sdt',
  PRIMARY KEY (`id_user`)
);
