-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;


-- ---
-- Table 'user_group'
-- 
-- ---
DROP TABLE IF EXISTS `user_group`;
		
CREATE TABLE `user_group` (
  `user_group_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `user_group_name` VARCHAR(15) NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`user_group_id`)
);



-- ---
-- Table 'user'
-- 
-- ---

DROP TABLE IF EXISTS `user`;
		
CREATE TABLE `user` (
  `user_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `username` VARCHAR(35) NOT NULL DEFAULT 'NULL',
  `password` VARCHAR(16) NOT NULL DEFAULT 'NULL',
  `name` VARCHAR(30) NOT NULL DEFAULT 'NULL',
  `surname` VARCHAR(30) NULL DEFAULT NULL,
  `email` VARCHAR(35) NOT NULL DEFAULT 'NULL',
  `user_group_id` INTEGER NOT NULL,
  `created_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
);


-- ---
-- Table 'pic_categories'
-- 
-- ---

DROP TABLE IF EXISTS `pic_categories`;
		
CREATE TABLE `pic_categories` (
  `pic_category_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `pic_category_name` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`pic_category_id`)
);

-- ---
-- Table 'pic_owners'
-- 
-- ---

DROP TABLE IF EXISTS `pic_owners`;
		
CREATE TABLE `pic_owners` (
  `pic_owner_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `pic_owner_name` VARCHAR(75) NULL DEFAULT NULL,
  `created_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`pic_owner_id`)
);


-- ---
-- Table 'pics'
-- 
-- ---

DROP TABLE IF EXISTS `pics`;
		
CREATE TABLE `pics` (
  `pic_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `pic_name` VARCHAR(150) NOT NULL DEFAULT 'NULL',
  `size` INTEGER NULL DEFAULT NULL,
  `big_url` VARCHAR(200) NULL DEFAULT NULL,
  `thumbs_url` VARCHAR(200) NULL DEFAULT NULL,
  `pic_category_id` INTEGER NULL DEFAULT NULL,
  `pic_owner_id` INTEGER NULL DEFAULT NULL,
  `user_id` INTEGER NOT NULL,
  `created_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
);

-- ---
-- Table 'pic_tags'
-- 
-- ---

DROP TABLE IF EXISTS `pic_tags`;
		
CREATE TABLE `pic_tags` (
  `pic_tag_id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `pic_id` INTEGER NOT NULL,
  `tag` VARCHAR(35) NOT NULL DEFAULT 'NULL',
  `created_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`pic_tag_id`)
);


-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `user` ADD FOREIGN KEY (user_group_id) REFERENCES `user_group` (`user_group_id`);
ALTER TABLE `pics` ADD FOREIGN KEY (pic_category_id) REFERENCES `pic_categories` (`pic_category_id`);
ALTER TABLE `pics` ADD FOREIGN KEY (pic_owner_id) REFERENCES `pic_owners` (`pic_owner_id`);
ALTER TABLE `pics` ADD FOREIGN KEY (user_id) REFERENCES `user` (`user_id`);
ALTER TABLE `pic_tags` ADD FOREIGN KEY (pic_id) REFERENCES `pics` (`pic_id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `user` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_group` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pics` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pic_categories` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pic_owners` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pic_tags` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `user` (`user_id`,`username`,`password`,`name`,`surname`,`email`,`user_group_id`,`created_date`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `user_group` (`user_group_id`,`user_group_name`) VALUES
-- ('','');
-- INSERT INTO `pics` (`pic_id`,`pic_name`,`size`,`big_url`,`thumbs_url`,`pic_category_id`,`pic_owner_id`,`user_id`,`created_date`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `pic_categories` (`pic_category_id`,`pic_category_name`) VALUES
-- ('','');
-- INSERT INTO `pic_owners` (`pic_owner_id`,`pic_owner_name`,`created_date`) VALUES
-- ('','','');
-- INSERT INTO `pic_tags` (`pic_tag_id`,`pic_id`,`tag`,`created_date`) VALUES
-- ('','','','');