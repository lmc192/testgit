-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `cat_site` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cat_site`;

DROP TABLE IF EXISTS `breeds`;
CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL AUTO_INCREMENT,
  `breed_name` varchar(255) NOT NULL,
  PRIMARY KEY (`breed_id`),
  KEY `id` (`breed_id`),
  KEY `breed_name` (`breed_name`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `breeds` (`breed_id`, `breed_name`) VALUES
(1,	'Moggy'),
(2,	'Abyssinian'),
(3,	'American Bobtail'),
(4,	'American Curl'),
(5,	'American Shorthair'),
(6,	'American Wirehair'),
(7,	'Arabian Mau'),
(8,	'Balinese'),
(9,	'Bambino'),
(10,	'Bengal'),
(11,	'Birman'),
(12,	'Bombay'),
(13,	'Brazilian Shorthair'),
(14,	'British Longhair'),
(15,	'British Semi-longhair'),
(16,	'British Shorthair'),
(17,	'Burmese'),
(18,	'Burmilla'),
(19,	'Cornish Rex'),
(20,	'Cyprus'),
(21,	'Devon Rex'),
(22,	'Egyptian Mau'),
(23,	'European Shorthair'),
(24,	'Exotic Shorthair'),
(25,	'German Rex'),
(26,	'Himalayan'),
(27,	'Japanese Bobtail'),
(28,	'Longhaired Manx'),
(29,	'Maine Coon'),
(30,	'Manx'),
(31,	'Minskin'),
(32,	'Munchkin'),
(33,	'Napoleon'),
(34,	'Nebelung'),
(35,	'Norwegian Forest cat'),
(36,	'Persian'),
(37,	'Ragdoll'),
(38,	'Russian Blue'),
(39,	'Scottish Fold'),
(40,	'Siamese'),
(41,	'Siberian Forest Cat'),
(42,	'Sphynx'),
(43,	'Tonkinese'),
(44,	'Turkish Angora'),
(45,	'Turkish Van');

DROP TABLE IF EXISTS `cats`;
CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT 'default.jpg',
  `breed_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cats` (`id`, `cat_name`, `ranking`, `file_path`, `breed_id`, `gender_id`, `age`) VALUES
(1,	'Gigi',	1,	'gigi.jpg',	15,	1,	12),
(2,	'Pheobe',	2,	'phoebe.jpg',	14,	2,	16),
(3,	'Maru',	3,	'maru.jpg',	39,	1,	10),
(4,	'Cole',	4,	'cole.jpg',	1,	1,	7),
(5,	'Marmalade',	5,	'marm.jpg',	1,	1,	6),
(6,	'Moo Moo',	6,	'moomoo.jpg',	16,	2,	8),
(7,	'Lil Bub',	7,	'lilbub.jpg',	1,	2,	7),
(8,	'Tardar Sauce',	8,	'grumpycat.jpg',	1,	2,	6),
(9,	'Haku',	9,	'haku.jpg',	29,	1,	3),
(10,	'Cleo',	10,	'cleo.jpg',	42,	1,	12)

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(255) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES
(1,	'Male'),
(2,	'Female');

-- 2019-01-07 22:08:19
