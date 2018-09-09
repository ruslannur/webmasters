CREATE TABLE `users_tbl` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`u_name` VARCHAR(500) NOT NULL,
	`u_email` VARCHAR(500) NOT NULL,
	`u_pwd` TEXT NOT NULL,
	`u_dsc` TEXT NOT NULL,
	`u_image` VARCHAR(500) NOT NULL,
	`u_phone` VARCHAR(20) NOT NULL,
	`u_city` VARCHAR(500) NOT NULL,
	`u_status` INT(11) NOT NULL,
	`u_create_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
AUTO_INCREMENT=16;