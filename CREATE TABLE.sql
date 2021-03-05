CREATE TABLE 
`media` ( `id` CHAR(64) NOT NULL, 
`number` INT NOT NULL AUTO_INCREMENT, 
`thumbnail` CHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci ,
`fname` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`extension` CHAR(64)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`raw_data` LONGBLOB NOT NULL,
KEY (`number`)) ENGINE = InnoDB


CREATE TABLE 
`member` (
`id` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci  NOT NULL, 
`rank` INT, 
`kubun` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`name` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`comment_small` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci , 
`comment_large` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci , 
`address` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci ,  
`email` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`zoom_url` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`charge` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`charge_id` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci , 
`extension_fee` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci ,
`extension_fee_id` CHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci, PRIMARY KEY (`id`)
) ENGINE = InnoDB;
