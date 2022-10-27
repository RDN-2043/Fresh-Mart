-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 06:14 AM
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
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` enum('Seller','Customer') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_account`
--

INSERT INTO `table_account` (`id`, `name`, `username`, `password`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Pak Rohmat', 'seller1', 'seller1', 'Seller', '2022-10-15 02:45:31', '2022-10-15 02:45:31', '2022-10-15 02:45:31'),
(4, 'Bu Surya', 'customer1', 'customer1', 'Customer', '2022-10-15 02:45:31', '2022-10-15 02:45:31', '2022-10-15 02:45:31'),
(5, 'Pak Samsudin', 'customer2', 'customer2', 'Seller', '2022-10-15 08:13:18', '2022-10-15 08:13:18', '0000-00-00 00:00:00'),
(6, 'Bu Sofyan', 'seller2', 'seller2', 'Seller', '2022-10-15 16:39:36', '2022-10-15 16:39:36', '2022-10-15 16:39:36'),
(7, 'Bu Rohmah', 'seller3', 'seller3', 'Seller', '2022-10-15 16:39:36', '2022-10-15 16:39:36', '2022-10-15 16:39:36'),
(8, '', 'pass1', '$2y$10$F8ZsDtHd.iXWtnpaqBOSCumFpd5r3Om3SQC.aBWpV6dffQc42cuR.', 'Seller', '2022-10-23 05:15:19', '2022-10-23 05:15:19', '0000-00-00 00:00:00'),
(9, 'pass2', 'pass2', '$2y$10$5zr1PccPKuZf/nI1GAtnoeopzTDKiHjE4gOgN4wcV4qquwu4P2YnO', 'Seller', '2022-10-23 05:17:57', '2022-10-23 05:17:57', '0000-00-00 00:00:00'),
(10, 'Padil', 'padil1', '$2y$10$7M8Jb3TCIFnd6fT752rnd.cv0V1zMxYjwaljJh6cwQMiiSeIaI/AK', 'Customer', '2022-10-26 21:20:53', '2022-10-26 21:20:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_cart`
--

CREATE TABLE `table_cart` (
  `id` int(5) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `shipped` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_cart`
--

INSERT INTO `table_cart` (`id`, `id_customer`, `id_product`, `total`, `shipped`) VALUES
(1, 3, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id` int(5) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `type` enum('Fresh','Cooked','Side') NOT NULL,
  `available` int(3) NOT NULL,
  `star` int(1) NOT NULL,
  `price` int(12) NOT NULL,
  `imgLink` varchar(256) NOT NULL,
  `id_seller` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id`, `title`, `description`, `type`, `available`, `star`, `price`, `imgLink`, `id_seller`) VALUES
(3, 'Ayam Krispy', 'Kfc, MCD, AW??, Lewat boss, punya kami adalah yang terbaik!', 'Side', 10, 5, 10000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259155332976640/Ayam_krispi.png', 3),
(6, 'Bayem', 'Ayo dapatkan sayur dengan harga murah untuk setiap pembeli yang membeli di toko kami.', 'Fresh', 10, 4, 4000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259156020826113/bayem.png', 6),
(7, 'Ayam Goreng', 'Terjual ribuan, ayam goreng ini terbukti bikin ketagihan.', 'Side', 13, 4, 12000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259154770919434/ayam_goreng.png', 7),
(8, 'Brokoli', 'Ayo dapatkan sayur dengan harga murah untuk setiap pembeli yang membeli di toko kami.', 'Fresh', 9, 3, 10000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259156478001233/brokoli.png', 6),
(10, 'Jagung Manis', 'Beli sayur di toko kami, satu-satunya toko yang menjual sayur dengan fresh, sesuai dengan nama toko kami.', 'Fresh', 10, 4, 7200, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259215890325524/Jagung_Manis.png\r\n', 7),
(11, 'Labusiem', 'Kesempatan terbatas, cuma hari ini! Promo sayur ini, hanya di toko kami.', 'Fresh', 13, 3, 4000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259215496069160/Labusiem.png', 7),
(12, 'Jahe', 'Jahe merupakan obat sekaligus rempah - rempah yang sangat baik, mari beli di toko kami.\r\n', 'Fresh', 17, 4, 3500, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259216339120148/jahe.png', 3),
(14, 'Jamur ', 'Ayo dapatkan jamur dengan harga murah untuk kalian masak dirumah.\r\n', 'Fresh', 18, 5, 2500, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259216838246410/Jamur.png', 6),
(15, 'Timun', 'Timun merupakan sayur banyak mengandung mineral, jadi tunggu apalagi, mari beli!', 'Fresh', 2, 3, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259344806453298/Timun.png', 3),
(17, 'Kangkung', 'Tidak usah ragukan kualitas sayur ditempat kami, mari beli!', 'Fresh', 2, 4, 3500, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259217740025966/kangkung.png', 6),
(18, 'Kol', 'Kol terbaik hanya ada di toko kami.', 'Fresh', 5, 3, 5000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259215114383370/Kol.png', 7),
(19, 'Sawi Hijau', 'Sawi hijau bisa dipakaikan mie ayam kalian agar menjadi, mie ayam terbaik seluruh Indonesia.', 'Fresh', 3, 3, 4000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259303576457226/sawi.png', 3),
(20, 'Ayam Bakar', 'Ayam bakar kami merupakan ayam yang paling enak diantara toko lain, mari coba!', 'Side', 5, 3, 25000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259153466503228/ayam_bakar.png', 6),
(21, 'Rendang', 'Rendang merupakan lauk terenak dan terlezat, ayo coba ditoko kami.', 'Side', 3, 5, 75000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259302628540476/rendang.png', 3),
(56, 'Ayam Kremes Cabe Ijo', 'Ayam Kremes Cabe Ijo kami merupakan ayam terlezat di tahun 2022 ini!', 'Side', 10, 3, 15000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259154179530762/Ayam_cabe_ijo.png', 6),
(57, 'Tumis Petai', 'Sayur tumis ditempat kami merupakan sayur terbaik yang pernah ada, ayo cobain!', 'Cooked', 13, 4, 5000, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259345980858408/Tumis.png', 3),
(58, 'Sayur Asem', 'Sayur tumis ditempat kami merupakan sayur terbaik yang pernah ada, ayo cobain!', 'Cooked', 9, 5, 6500, 'https://cdn.discordapp.com/attachments/776404266767745034/1032259301563191306/sayur_asem.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `table_shipped`
--

CREATE TABLE `table_shipped` (
  `id` int(5) NOT NULL,
  `id_cart` int(5) NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_shipped`
--

INSERT INTO `table_shipped` (`id`, `id_cart`, `delivered`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '2022-10-23 10:12:42', '2022-10-23 10:12:42', '2022-10-23 10:12:42');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller` (`id_seller`);

--
-- Indexes for table `table_shipped`
--
ALTER TABLE `table_shipped`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart` (`id_cart`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_cart`
--
ALTER TABLE `table_cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `table_shipped`
--
ALTER TABLE `table_shipped`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_cart`
--
ALTER TABLE `table_cart`
  ADD CONSTRAINT `table_cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_cart_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `table_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_product`
--
ALTER TABLE `table_product`
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`id_seller`) REFERENCES `table_account` (`id`);

--
-- Constraints for table `table_shipped`
--
ALTER TABLE `table_shipped`
  ADD CONSTRAINT `table_shipped_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `table_cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
