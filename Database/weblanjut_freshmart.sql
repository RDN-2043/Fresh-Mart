-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 04:45 PM
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
(2, 'Timun Emas', 'Samsudin', 'Timun Emas yang biasa kita kenal dengan cerita dongeng itu, tidak hanya itu karena di Fresh Mart juga kami menjual Timun Emas yang merupakan asli buah. Ayo mari beli !', 5, 3, 75000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191795176915034/logo2.png'),
(3, 'Timun', 'Pak Ghofar', 'Timun merupakan sayur segar bisa dimasak bisa juga di jus \"Ayo beli produk kami karena yang lain belum tentu berkualitas.\"', 3, 2, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191794837172255/timun.png'),
(4, 'Kangkung', 'Bu Haji', '\"Bingung cari sayur segar dimana? Hubungi Fresh Mart dan dapatkan berbagai menu terbaru dari kami.\"', 2, 5, 50000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191794459684914/kangkung.png'),
(5, 'Rendang', 'Pak Abdul', '\"Halo agan dan sista silahkan datang ke warung. Kami menjual berbagai olahan lauk pauk.\"', 10, 4, 30000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191793104920586/rendang.jpg\r\n'),
(6, 'Opor Ayam', 'Haji  Fachru', '\"Bingung mau cari lauk hits kekinian yang super higienis? Bebas bahan pengawet dan praktis? Kami solusinya!\"', 8, 5, 15000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191792467390485/opor_ayam.png'),
(7, 'Kol', 'Pak Fakhri', '\"Kamu butuh sayur dengan harga murah untuk acara kamu? Fresh Mart solusinya!\"', 6, 5, 3000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191794023477298/kol.png'),
(8, 'Terong', 'Pak Fadil', '\"Kamu butuh sayur dengan harga murah untuk acara kamu? Fresh Mart solusinya!\"', 13, 3, 5000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029746917602754693/terong.jpg'),
(9, 'Sayur Asem', 'Pak Thoriq', '\"Setelah membeli produk kami, jangan lupa untuk memberikan testimoni positif.\"', 10, 4, 6000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191793406918716/sayur_asem.jpg'),
(10, 'Jagung Manusia', 'Bu Siti', 'Kamu tahu apa yang menjadi kebanggaan kami? Yaitu kepuasan Anda!\"', 10, 4, 5000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191792865853530/jagung_manis.jpg'),
(11, 'Sawi', 'Bu Melati', 'Kamu tahu apa yang menjadi kebanggaan kami? Yaitu kepuasan Anda!\"', 8, 3, 2000, 'https://cdn.discordapp.com/attachments/776404266767745034/1029191793679540344/sawi.jpg\r\n');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
