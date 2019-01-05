-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 07:45 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `breed_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `breed_name`) VALUES
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

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT 'default.jpg',
  `breed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `cat_name`, `position`, `visible`, `file_path`, `breed_id`) VALUES
(1, 'Gigi', 1, 1, '1.jpg', 1),
(2, 'Phoebe', 2, 1, '2.jpg', 1),
(8, 'MooMoo', 3, 1, 'default.jpg', 41),
(9, 'MeowMeowFace', 4, 1, 'default.jpg', 14),
(10, 'REALLY REALLY LONG ASS NAME', 5, 1, 'default.jpg', 8),
(11, 'name', 2, 1, 'default.jpg', 5),
(12, 'name', 2, 1, 'default.jpg', 5),
(14, 'name', 2, 1, 'default.jpg', 5),
(15, 'name', 2, 1, 'default.jpg', 5),
(17, 'TESTING', 9, 1, 'default.jpg', 37),
(18, 'Test Cat Insert with a Brreed', 11, 0, 'default.jpg', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `breed_name` (`breed_name`(191));

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
