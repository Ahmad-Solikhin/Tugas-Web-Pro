-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 03:57 AM
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
-- Database: `kalori_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `jenis_makanan` varchar(255) NOT NULL,
  `nama_makanan` varchar(255) NOT NULL,
  `kalori_makanan` int(50) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `delete_stat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `jenis_makanan`, `nama_makanan`, `kalori_makanan`, `waktu`, `tanggal`, `delete_stat`) VALUES
(1, 'Makan Siang', 'Nasi Goreng', 100, '12:46:15', '2021-10-07', 0),
(2, 'Sarapan', 'Nasi Uduk', 100, '18:01:59', '2021-10-29', 0),
(3, 'Sarapan', 'Nasi Uduk', 100, '15:03:00', '0000-00-00', 0),
(4, 'Camilan', 'Nasi Uduk', 100, '19:03:00', '0000-00-00', 0),
(5, 'Makan Malam', 'Nasi Goreng', 150, '20:05:00', '2021-11-01', 0),
(6, 'Camilan', 'Nasi Uduk', 200, '00:28:00', '2021-11-02', 0),
(7, 'Sarapan', 'Nasi Uduk', 100, '07:15:00', '2021-12-11', 0),
(8, 'Camilan', 'Serabi', 100, '20:00:00', '2021-11-07', 0),
(9, 'Makan Siang', 'Risol', 10, '15:32:00', '2021-11-10', 0),
(10, 'Makan Siang', 'Martabak', 300, '15:19:00', '2021-11-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nm_modul` varchar(255) NOT NULL,
  `judul_modul` varchar(255) NOT NULL,
  `icon_modul` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nm_modul`, `judul_modul`, `icon_modul`, `deleted_at`, `created_at`, `update_at`) VALUES
(1, 'perhitungan', 'Perhitungan', 'unarchive', NULL, '2021-11-19 09:52:25', '2021-11-19 09:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `modul_role`
--

CREATE TABLE `modul_role` (
  `id_modul` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_count` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modul_role`
--

INSERT INTO `modul_role` (`id_modul`, `id_role`, `is_count`, `deleted_at`, `created_at`, `update_at`) VALUES
(1, 1, 0, NULL, '2021-11-19 09:54:47', '2021-11-19 09:54:47'),
(1, 2, 1, NULL, '2021-11-19 09:54:47', '2021-11-19 09:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `id_olahraga` int(11) NOT NULL,
  `waktu_olahraga` varchar(255) NOT NULL,
  `nama_olahraga` varchar(255) NOT NULL,
  `kalori_olahraga` int(50) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `delete_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olahraga`
--

INSERT INTO `olahraga` (`id_olahraga`, `waktu_olahraga`, `nama_olahraga`, `kalori_olahraga`, `waktu`, `tanggal`, `delete_stat`) VALUES
(1, 'Pagi', 'Lari', 100, '06:31:00', '2021-11-15', 0),
(2, 'Siang', 'Berenang Siang', 200, '12:43:00', '2021-11-15', 0),
(3, 'Pagi', 'duduk', 10, '16:50:00', '2021-11-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nm_role` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nm_role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Biasa', NULL, '2021-11-19 09:51:16', '2021-11-19 09:51:16'),
(2, 'Premium', NULL, '2021-11-19 09:51:55', '2021-11-19 09:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `user_username`, `user_password`, `deleted_at`, `created_at`, `update_at`, `usia`, `berat_badan`) VALUES
(1, 'Ahmad Solikhin Gayuh Raharjo', 'Asgr', '0364cdbc771133323bb211ec8980e715a8d772f4', NULL, '2021-11-17 18:12:17', '2021-11-18 20:52:42', 20, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD PRIMARY KEY (`id_olahraga`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `olahraga`
--
ALTER TABLE `olahraga`
  MODIFY `id_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
