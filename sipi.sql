-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 02:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipi`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_07_18_030350_create_purchase_order_table', 1),
(4, '2019_07_18_031654_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `id_purchase_order` int(11) NOT NULL,
  `jumlah_pembayaran` varchar(30) NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `id_purchase_order`, `jumlah_pembayaran`, `tgl_pembayaran`) VALUES
(2, 7, '500000', '2019-07-02'),
(7, 6, '500000', '1924-03-14'),
(9, 7, '1000000', '1970-01-01'),
(10, 7, '250000', '2019-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_purchase_order` bigint(20) UNSIGNED NOT NULL,
  `no_purchase_order` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_invoice` date NOT NULL,
  `nama_project` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_purchase_order` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_delivery` int(11) NOT NULL,
  `progress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id_purchase_order`, `no_purchase_order`, `no_invoice`, `tgl_invoice`, `nama_project`, `customer`, `nominal_purchase_order`, `status_delivery`, `progress`) VALUES
(6, '123/ABC.00.00/2021', '23', '2019-11-27', 'ASDe', 'PT. ABCe', '3000000', 1, 'er3'),
(7, 'dhsjfhsd', 'jsdhfsdj', '2019-07-02', 'sdfjh', 'jshkjdhas', '2000000', 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nik`, `username`, `password`, `email`, `user_level`, `created_at`, `updated_at`) VALUES
(1, '0', 'awq3', 'awq', 'awq@napitupulu.info', 2, '2019-07-17 21:02:00', '2019-07-17 21:02:00'),
(2, '123666', 'enam', 'enam', 'enam@mail.com', 4, NULL, NULL),
(3, '2', 'najwa.melani', '9d69e1682a249f52cd2984bcb831d227', 'mardhiyah.ilsa@gmail.co.id', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(4, '234', 'awan', 'awan', 'jherm4n@gmail.com', 1, '2019-07-18 10:16:07', '2019-07-18 10:16:07'),
(5, '3', 'titi28', '364bfb1d2b042dcf9eee797f0f637fdd', 'dalima13@irawan.ac.id', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(6, '32423', 'qwe', 'qwe', 'tes@mail.com', 4, NULL, NULL),
(7, '4', 'voktaviani', '221db5f64af63d9a267b9a39ad74dc37', 'bakidin.pratiwi@pratiwi.tv', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(8, '5', 'purwanto.narpati', 'df2a1fb712d727be37aa7ed9e3db31fc', 'paris51@usamah.go.id', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(9, '6', 'zizi87', '0cc3b2ade73d2d7f614cba3394ca8e20', 'tnovitasari@sihombing.desa.id', 1, '2019-07-17 21:02:00', '2019-07-17 21:02:00'),
(10, '7', 'malik07', 'f027d296636305952f2f20b7ece4a259', 'pwasita@melani.web.id', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(11, '8', 'lnurdiyanti', '2df4b27dde510b90949525aaa0f49fe9', 'prayitna48@palastri.org', 1, '2019-07-17 21:02:01', '2019-07-17 21:02:01'),
(12, '9', 'dsafitri', 'af1e5f8fec4a2a06987e4065b3c26a6b', 'saadat.pradana@gmail.co.id', 1, '2019-07-17 21:02:00', '2019-07-17 21:02:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_purchase_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id_purchase_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
