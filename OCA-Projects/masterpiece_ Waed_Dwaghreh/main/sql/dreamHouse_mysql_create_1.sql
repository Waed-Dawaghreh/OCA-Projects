CREATE TABLE `Admin` (
	`admin_id` INT(10) NOT NULL AUTO_INCREMENT,
	`admin_name` varchar(100) NOT NULL,
	`admin_email` varchar(100) NOT NULL,
	`admin_password` TEXT NOT NULL,
	`admin_image` blob NOT NULL,
	PRIMARY KEY (`admin_id`)
);

CREATE TABLE `user` (
	`user_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_name` varchar(255) NOT NULL,
	`user_email` varchar(255) NOT NULL,
	`user_phone` DECIMAL(16) NOT NULL,
	`user_image` blob ,
	`user_password` varchar(255) NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `city` (
	`city_id` INT(10) NOT NULL AUTO_INCREMENT,
	`country` varchar(100) NOT NULL,
	`city_name` varchar(100) NOT NULL,
	PRIMARY KEY (`city_id`)
);

CREATE TABLE `property` (
	`property_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_id` INT(10) NOT NULL ,
	`city_id` INT(10) NOT NULL,
	`property_name` varchar(500) NOT NULL,
	`property_desc` TEXT NOT NULL,
	`property_status` varchar(100) NOT NULL,
	`property_type` varchar(100) NOT NULL,
	`property_images` blob ,
	`property_bedrooms` INT(10) NOT NULL,
	`property_bathrooms` INT(10) NOT NULL,
	`property_rooms` INT(10) NOT NULL,
	`property_features` TEXT,
	`property_price` DECIMAL(10) NOT NULL,
	`property_area_size` DECIMAL(10) ,
	`building_age` DATE NOT NULL,
	`adderss` TEXT NOT NULL,
	`longitude` FLOAT(20) NOT NULL,
	`latitude` FLOAT(20) NOT NULL,
	PRIMARY KEY (`property_id`)
);

CREATE TABLE `reviwes` (
	`review_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_id` INT(10) NOT NULL,
	`property_id` INT(10) NOT NULL,
	`rating` FLOAT(10) NOT NULL,
	`review_desc` TEXT NOT NULL,
	`review_status` varchar(100) NOT NULL,
	PRIMARY KEY (`review_id`)
);

CREATE TABLE `toure_sqedual` (
	`toure_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_id` INT(10) NOT NULL,
	`property_id` INT(10) NOT NULL,
	`date` DATE NOT NULL,
	`toure_status` varchar(100) NOT NULL,
	PRIMARY KEY (`toure_id`)
);

ALTER TABLE `property` ADD CONSTRAINT `property_fk0` FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`);

ALTER TABLE `property` ADD CONSTRAINT `property_fk1` FOREIGN KEY (`city_id`) REFERENCES `city`(`city_id`);

ALTER TABLE `reviwes` ADD CONSTRAINT `reviwes_fk0` FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`);

ALTER TABLE `reviwes` ADD CONSTRAINT `reviwes_fk1` FOREIGN KEY (`property_id`) REFERENCES `property`(`property_id`);

ALTER TABLE `toure_sqedual` ADD CONSTRAINT `toure_sqedual_fk0` FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`);

ALTER TABLE `toure_sqedual` ADD CONSTRAINT `toure_sqedual_fk1` FOREIGN KEY (`property_id`) REFERENCES `property`(`property_id`);

