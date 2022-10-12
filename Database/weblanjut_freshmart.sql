-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 03:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblanjut_freshmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id` int(5) NOT NULL,
  `title` varchar(256) NOT NULL,
  `seller` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `available` int(3) NOT NULL,
  `star` int(1) NOT NULL,
  `price` int(12) NOT NULL,
  `imgLink` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id`, `title`, `seller`, `description`, `available`, `star`, `price`, `imgLink`) VALUES
(2, 'Timun Emas', 'Samsudin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam venenatis tempus facilisis. Donec dui neque, vulputate quis malesuada et, feugiat non mauris. Nullam placerat gravida mauris, quis consectetur felis varius.', 5, 3, 75000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191795176915034/logo2.png'),
(3, 'timun', 'Pak Ghofar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis mattis eros, vitae laoreet nisl.', 3, 2, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191794837172255/timun.png'),
(4, 'Kangkung', 'Bu Haji', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis gravida auctor. Pellentesque venenatis velit nec velit facilisis maximus. Donec.', 2, 5, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191794459684914/kangkung.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
