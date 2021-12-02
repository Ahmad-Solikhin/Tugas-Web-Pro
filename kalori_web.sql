-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 11:33 AM
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
  `id_user` int(11) NOT NULL,
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

INSERT INTO `data` (`id_data`, `id_user`, `jenis_makanan`, `nama_makanan`, `kalori_makanan`, `waktu`, `tanggal`, `delete_stat`) VALUES
(1, 2, 'Sarapan', 'Bubur Ayam', 372, '07:00:00', '2021-11-25', 0),
(13, 2, 'Makan Malam', 'Nasi Goreng', 267, '20:15:00', '2021-11-24', 0),
(14, 2, 'Camilan', 'Martabak Manis', 270, '18:53:00', '2021-11-25', 0),
(15, 1, 'Makan Malam', 'Mie Goreng', 400, '19:00:00', '2021-12-01', 0);

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
(1, 'premium', 'Perhitungan', 'unarchive', NULL, '2021-11-19 09:52:25', '2021-11-19 09:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `modul_role`
--

CREATE TABLE `modul_role` (
  `id_modul` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_count` int(11) NOT NULL,
  `is_restore` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modul_role`
--

INSERT INTO `modul_role` (`id_modul`, `id_role`, `is_count`, `is_restore`, `deleted_at`, `created_at`, `update_at`) VALUES
(1, 1, 0, 0, NULL, '2021-11-19 09:54:47', '2021-11-19 09:54:47'),
(1, 2, 1, 1, NULL, '2021-11-19 09:54:47', '2021-11-19 09:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `id_olahraga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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

INSERT INTO `olahraga` (`id_olahraga`, `id_user`, `waktu_olahraga`, `nama_olahraga`, `kalori_olahraga`, `waktu`, `tanggal`, `delete_stat`) VALUES
(1, 2, 'Pagi', 'Jogging', 144, '06:00:00', '2021-11-25', 0);

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
  `id_role` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `id_role`, `user_username`, `user_password`, `deleted_at`, `created_at`, `update_at`, `usia`, `berat_badan`, `tinggi_badan`) VALUES
(1, 'Ahmad Solikhin ', 1, 'Asgr01', '0364cdbc771133323bb211ec8980e715a8d772f4', NULL, '2021-11-17 18:12:17', '2021-12-02 16:01:34', 20, 90, 175),
(2, 'Ahmad Solikhin Gayuh Raharjo', 2, 'Asgr02', '0364cdbc771133323bb211ec8980e715a8d772f4', NULL, '2021-11-19 13:28:04', '2021-12-01 17:28:32', 20, 85, 178);

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
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `olahraga`
--
ALTER TABLE `olahraga`
  MODIFY `id_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
