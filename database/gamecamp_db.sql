-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.43 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.21.0.7344
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gamecamp_db
CREATE DATABASE IF NOT EXISTS `gamecamp_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gamecamp_db`;

-- Dumping structure for table gamecamp_db.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_game1_idx` (`game_id`),
  KEY `fk_cart_user1_idx` (`user_id`),
  CONSTRAINT `fk_cart_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_from_id` int NOT NULL,
  `user_to_id` int NOT NULL,
  `message` text,
  `date_time` datetime DEFAULT NULL,
  `msg_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user1_idx` (`user_from_id`),
  KEY `fk_chat_user2_idx` (`user_to_id`),
  KEY `fk_chat_msg_status1_idx` (`msg_status_id`),
  CONSTRAINT `fk_chat_msg_status1` FOREIGN KEY (`msg_status_id`) REFERENCES `msg_status` (`id`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`user_from_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_chat_user2` FOREIGN KEY (`user_to_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.developer
CREATE TABLE IF NOT EXISTS `developer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `developer_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.game
CREATE TABLE IF NOT EXISTS `game` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_name` varchar(45) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` text,
  `slogan` text,
  `publisher_id` int NOT NULL,
  `developer_id` int NOT NULL,
  `game_position_id` int NOT NULL,
  `platform_id` int NOT NULL,
  `game_status_id` int NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `discount` double DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_game_publisher_idx` (`publisher_id`),
  KEY `fk_game_developer1_idx` (`developer_id`),
  KEY `fk_game_game_staus1_idx` (`game_position_id`),
  KEY `fk_game_platform1_idx` (`platform_id`),
  KEY `fk_game_game_status1_idx` (`game_status_id`),
  CONSTRAINT `fk_game_developer1` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`id`),
  CONSTRAINT `fk_game_game_status1` FOREIGN KEY (`game_status_id`) REFERENCES `game_status` (`id`),
  CONSTRAINT `fk_game_game_staus1` FOREIGN KEY (`game_position_id`) REFERENCES `game_position` (`id`),
  CONSTRAINT `fk_game_platform1` FOREIGN KEY (`platform_id`) REFERENCES `platform` (`id`),
  CONSTRAINT `fk_game_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.game_images
CREATE TABLE IF NOT EXISTS `game_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `game_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_images_game1_idx` (`game_id`),
  CONSTRAINT `fk_game_images_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.game_position
CREATE TABLE IF NOT EXISTS `game_position` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_position_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.game_status
CREATE TABLE IF NOT EXISTS `game_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_status_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL,
  `gender_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.msg_status
CREATE TABLE IF NOT EXISTS `msg_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `msg_status_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.platform
CREATE TABLE IF NOT EXISTS `platform` (
  `id` int NOT NULL AUTO_INCREMENT,
  `platform_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_id`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.publisher
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.sellings
CREATE TABLE IF NOT EXISTS `sellings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_id` int NOT NULL,
  `user_id` int NOT NULL,
  `purchased_date` date DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sellings_game1_idx` (`game_id`),
  KEY `fk_sellings_user1_idx` (`user_id`),
  CONSTRAINT `fk_sellings_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  CONSTRAINT `fk_sellings_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.specification
CREATE TABLE IF NOT EXISTS `specification` (
  `game_id` int NOT NULL,
  `os` text,
  `processor` text,
  `memory` text,
  `video_card` text,
  `sound_card` text,
  `hdd_space` text,
  PRIMARY KEY (`game_id`),
  KEY `fk_specification_game1_idx` (`game_id`),
  CONSTRAINT `fk_specification_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  `position_id` int NOT NULL,
  `user_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_gender1_idx` (`gender_id`),
  KEY `fk_user_position1_idx` (`position_id`),
  KEY `fk_user_user_status1_idx` (`user_status_id`),
  CONSTRAINT `fk_user_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_position1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`),
  CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table gamecamp_db.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_game1_idx` (`game_id`),
  KEY `fk_wishlist_user1_idx` (`user_id`),
  CONSTRAINT `fk_wishlist_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  CONSTRAINT `fk_wishlist_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
