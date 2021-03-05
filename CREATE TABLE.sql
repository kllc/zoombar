
SELECT * FROM `member` AS b,
(SELECT * FROM `media` ORDER BY `number`) AS d,
(SELECT id,MAX(`number`) AS n FROM `media` GROUP BY id) AS md
WHERE b.id = d.id
AND   d.id = md.id
AND   d.`number` = md.n
ORDER BY b.`rank`


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

CREATE TABLE 
`date` ( `id` CHAR(64)  NOT NULL, 
`date` DATE , 
`time` TIME , 
`zoom_id` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE = InnoDB;







--直近７日
select
date_format(date_add(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY), interval td.generate_series day), '%Y-%m-%d') as d
from
(
SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 7
) as td
