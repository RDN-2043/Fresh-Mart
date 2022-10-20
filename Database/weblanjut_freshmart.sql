-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 02:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `table_account`
--

CREATE TABLE `table_account` (
  `id` int(5) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` enum('Seller','Customer','','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_account`
--

INSERT INTO `table_account` (`id`, `username`, `password`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'seller1', 'seller1', 'Seller', '2022-10-15 02:45:31', '2022-10-15 02:45:31', '2022-10-15 02:45:31'),
(4, 'customer1', 'customer1', 'Customer', '2022-10-15 02:45:31', '2022-10-15 02:45:31', '2022-10-15 02:45:31'),
(5, 'customer2', 'customer2', 'Seller', '2022-10-15 08:13:18', '2022-10-15 08:13:18', '0000-00-00 00:00:00'),
(6, 'seller2', 'seller2', 'Seller', '2022-10-15 16:39:36', '2022-10-15 16:39:36', '2022-10-15 16:39:36'),
(7, 'seller3', 'seller3', 'Seller', '2022-10-15 16:39:36', '2022-10-15 16:39:36', '2022-10-15 16:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `table_cart`
--

CREATE TABLE `table_cart` (
  `id_product` int(5) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `imgLink` varchar(256) NOT NULL,
  `id_seller` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id`, `title`, `seller`, `description`, `available`, `star`, `price`, `imgLink`, `id_seller`) VALUES
(3, 'Ayam Krispy', 'Pak Rohmat', 'Kfc, MCD, AW??, Lewat boss, punya kami adalah yang terbaik!', 10, 5, 10000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259155332976640/Ayam_krispi.png', 3),
(6, 'Bayem', 'Bu Sofyan', 'Ayo dapatkan sayur dengan harga murah untuk setiap pembeli yang membeli di toko kami.', 10, 4, 4000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259156020826113/bayem.png', 6),
(7, 'Ayam Goreng', 'Bu Rohmah', 'Terjual ribuan, ayam goreng ini terbukti bikin ketagihan.', 13, 4, 12000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259154770919434/ayam_goreng.png', 7),
(15, 'Timun', 'Pak Rohmat', 'Timun merupakan sayur banyak mengandung mineral, jadi tunggu apalagi, mari beli!', 2, 3, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259344806453298/Timun.png', 3),
(17, 'Kangkung', 'Bu Sofyan', 'Tidak usah ragukan kualitas sayur ditempat kami, mari beli!', 2, 4, 3500, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259217740025966/kangkung.png', 6),
(18, 'Kol', 'Bu Rohmah', 'Kol terbaik hanya ada di toko kami.', 5, 3, 5000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259215114383370/Kol.png', 7),
(19, 'Sawi Hijau', 'Pak Rohmat', 'Sawi hijau bisa dipakaikan mie ayam kalian agar menjadi, mie ayam terbaik seluruh Indonesia.', 3, 3, 4000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259303576457226/sawi.png', 3),
(20, 'Ayam Bakar', 'Bu Sofyan', 'Ayam bakar kami merupakan ayam yang paling enak diantara toko lain, mari coba!', 5, 3, 25000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259153466503228/ayam_bakar.png', 6),
(21, 'Rendang', 'Pak Rohmat', 'Rendang merupakan lauk terenak dan terlezat, ayo coba ditoko kami.', 3, 5, 75000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259302628540476/rendang.png', 3),
(56, 'Ayam Kremes Cabe Ijo', 'Bu Sofyan', 'Ayam Kremes Cabe Ijo kami merupakan ayam terlezat di tahun 2022 ini!', 10, 3, 15000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259154179530762/Ayam_cabe_ijo.png', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_account`
--
ALTER TABLE `table_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_cart`
--
ALTER TABLE `table_cart`
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller` (`id_seller`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_account`
--
ALTER TABLE `table_account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_cart`
--
ALTER TABLE `table_cart`
  ADD CONSTRAINT `table_cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_product`
--
ALTER TABLE `table_product`
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`id_seller`) REFERENCES `table_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
