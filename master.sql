CREATE TABLE `statuses` (
	`id` TINYINT(3) UNSIGNED NOT NULL,
	`name` VARCHAR(25) NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	`active` INT(11) NOT NULL DEFAULT 1,
	`created_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`created_by` INT(11) NOT NULL,
	`updated_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`updated_by` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `tags` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(25) NOT NULL,
	`description` VARCHAR(255) NULL DEFAULT NULL,
	`slug` VARCHAR(25) NOT NULL,
	`active` INT(11) NOT NULL DEFAULT 1,
	`created_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`created_by` INT(11) NOT NULL,
	`updated_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`updated_by` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `categories` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	`description` VARCHAR(255) NULL DEFAULT NULL,
	`active` INT(11) NOT NULL DEFAULT 1,
	`create_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`create_by` INT(11) NOT NULL,
	`updated_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`update_by` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;

CREATE TABLE `articles` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(128) NOT NULL,
	`content` VARCHAR(15000) NULL DEFAULT NULL,
	`excerpt` VARCHAR(255) NULL DEFAULT NULL,
	`author` VARCHAR(25) NULL DEFAULT NULL,
	`slug` VARCHAR(80) NOT NULL,
	`active` INT(11) NOT NULL DEFAULT 1,
	`status_id` TINYINT(3) NOT NULL DEFAULT 1,
	`category_id` INT(11) NOT NULL DEFAULT 1,
	`created_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`created_by` INT(11) NOT NULL,
	`updated_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	`updated_by` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `slug_UNIQUE` (`slug`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `article_tag_detail` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`tags_id` INT(11) NOT NULL,
	`articles_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
