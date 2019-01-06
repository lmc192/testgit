-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 11:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat_site`
--
CREATE DATABASE IF NOT EXISTS `cat_site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cat_site`;

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

DROP TABLE IF EXISTS `breeds`;
CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `breed_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed_id`, `breed_name`) VALUES
(1, 'Moggy'),
(2, 'Abyssinian'),
(3, 'American Bobtail'),
(4, 'American Curl'),
(5, 'American Shorthair'),
(6, 'American Wirehair'),
(7, 'Arabian Mau'),
(8, 'Balinese'),
(9, 'Bambino'),
(10, 'Bengal'),
(11, 'Birman'),
(12, 'Bombay'),
(13, 'Brazilian Shorthair'),
(14, 'British Longhair'),
(15, 'British Semi-longhair'),
(16, 'British Shorthair'),
(17, 'Burmese'),
(18, 'Burmilla'),
(19, 'Cornish Rex'),
(20, 'Cyprus'),
(21, 'Devon Rex'),
(22, 'Egyptian Mau'),
(23, 'European Shorthair'),
(24, 'Exotic Shorthair'),
(25, 'German Rex'),
(26, 'Himalayan'),
(27, 'Japanese Bobtail'),
(28, 'Longhaired Manx'),
(29, 'Maine Coon'),
(30, 'Manx'),
(31, 'Minskin'),
(32, 'Munchkin'),
(33, 'Napoleon'),
(34, 'Nebelung'),
(35, 'Norwegian Forest cat'),
(36, 'Persian'),
(37, 'Ragdoll'),
(38, 'Russian Blue'),
(39, 'Scottish Fold'),
(40, 'Siamese'),
(41, 'Siberian Forest Cat'),
(42, 'Sphynx'),
(43, 'Tonkinese'),
(44, 'Turkish Angora'),
(45, 'Turkish Van');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

DROP TABLE IF EXISTS `cats`;
CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT 'default.jpg',
  `breed_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `cat_name`, `position`, `file_path`, `breed_id`, `gender_id`, `age`) VALUES
(1, 'Gigi', 1, 'gigi.jpg', 15, 1, 12),
(2, 'Pheobe', 2, 'phoebe.jpg', 14, 2, 16),
(3, 'Maru', 3, 'maru.jpg', 39, 1, 10),
(4, 'Cole', 4, 'cole.jpg', 1, 1, 7),
(5, 'Marmalade', 5, 'marm.jpg', 1, 1, 6),
(6, 'Moo Moo', 6, 'moomoo.jpg', 16, 2, 8),
(7, 'Lil Bub', 7, 'lilbub.jpg', 1, 2, 7),
(8, 'Tardar Sauce', 8, 'grumpycat.jpg', 1, 2, 6),
(9, 'Haku', 9, 'haku.jpg', 29, 1, 3),
(10, 'Cleo', 10, 'cleo.jpg', 42, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`),
  ADD KEY `id` (`breed_id`),
  ADD KEY `breed_name` (`breed_name`(191));

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
