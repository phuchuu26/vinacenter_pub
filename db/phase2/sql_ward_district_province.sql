CREATE TABLE `DB`.`province`  (
  `id_province` int NULL,
  `str_province` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_status` int NULL
);


CREATE TABLE `test`.`district`  (
  `id_province` int NULL,
  `id_district` int NOT NULL,
  `str_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_status` int NULL,
  PRIMARY KEY (`id_district`)
);



CREATE TABLE `test`.`ward`  (
  `id_province` int NULL,
  `id_district` int NULL,
  `id_ward` int NOT NULL,
  `str_ward` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_status` int NULL,
  PRIMARY KEY (`id_ward`)
);