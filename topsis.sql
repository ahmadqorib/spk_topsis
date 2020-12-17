-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2020 at 02:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `prosessor` varchar(200) NOT NULL,
  `hardisk` varchar(200) NOT NULL,
  `ram` varchar(200) NOT NULL,
  `vga` varchar(200) NOT NULL,
  `layar` varchar(200) NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode`, `alternatif`, `kategori`, `harga`, `prosessor`, `hardisk`, `ram`, `vga`, `layar`, `photo`) VALUES
(13, 'A1', 'ASUS X302u (A)', 3, '7599000', 'Intel Core i 5', '1 TB', '4 GB', 'NVIDIA GFORDE', '14 inc', 'dota_2_art_background_clean_95130_1366x768.jpg'),
(14, 'A2', 'Acer Aspire E5 (B)', 2, '8199000', 'Intel Core i5', '500GB', '4 GB', 'NVIDIA Geforce 820M', '15 inc', 'dota_2_earthshaker_art_100138_1366x768.jpg'),
(15, 'A4', 'Lenovo Y50', 5, '13499000', 'Intel Core i7', '1 TB', '8 GB', 'NVIDIA GFORDE GTX', '15', 'rubicks_cube_dota_2_art_95292_1366x768.jpg'),
(16, 'A3', 'Dell Inspiron (C)', 4, '8610000', 'Core i5', '750 GB', '4 GB', 'Nvidio GT 740', '15', 'rubicks_cube_dota_2_art_95292_1366x768.jpg'),
(17, 'A5', 'Lenovo Ideapad (E)', 5, '5399000', 'Core i 3', '500 GB', '2 GB', 'NVIDIA GFORDE', '14 inc', 'rubicks_cube_dota_2_art_95292_1366x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_topsis`
--

CREATE TABLE `hasil_topsis` (
  `id` int(11) NOT NULL,
  `rank` int(10) NOT NULL,
  `id_alternatif` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_topsis`
--

INSERT INTO `hasil_topsis` (`id`, `rank`, `id_alternatif`) VALUES
(27, 1, 15),
(28, 2, 16),
(29, 3, 13),
(30, 4, 14),
(31, 5, 17);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_alternatif`
--

CREATE TABLE `kategori_alternatif` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_alternatif`
--

INSERT INTO `kategori_alternatif` (`id`, `kategori`) VALUES
(2, 'Acer'),
(3, 'Asus'),
(4, 'Dell'),
(5, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(110) NOT NULL,
  `kriteria` tinyint(4) NOT NULL,
  `nilai` varchar(110) NOT NULL,
  `atribut` tinyint(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `kriteria`, `nilai`, `atribut`, `keterangan`) VALUES
(40, 'C1', 1, '3', 2, ''),
(41, 'C3', 2, '2', 1, ''),
(42, 'C4', 3, '3', 1, ''),
(43, 'C2', 4, '2', 1, ''),
(45, 'C5', 5, '3', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(532, '13', '40', '3'),
(533, '13', '43', '2'),
(534, '13', '41', '3'),
(535, '13', '42', '5'),
(536, '13', '45', '3'),
(537, '14', '40', '3'),
(538, '14', '43', '2'),
(539, '14', '41', '3'),
(540, '14', '42', '3'),
(541, '14', '45', '3'),
(542, '16', '40', '2'),
(543, '16', '43', '2'),
(544, '16', '41', '3'),
(545, '16', '42', '4'),
(546, '16', '45', '3'),
(547, '15', '40', '1'),
(548, '15', '43', '3'),
(549, '15', '41', '3'),
(550, '15', '42', '5'),
(551, '15', '45', '5'),
(552, '17', '40', '5'),
(553, '17', '43', '1'),
(554, '17', '41', '1'),
(555, '17', '42', '3'),
(556, '17', '45', '3');

-- --------------------------------------------------------

--
-- Table structure for table `range_kriteria`
--

CREATE TABLE `range_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` varchar(200) NOT NULL,
  `range_kriteria` varchar(200) NOT NULL,
  `nilai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `range_kriteria`
--

INSERT INTO `range_kriteria` (`id`, `id_kriteria`, `range_kriteria`, `nilai`) VALUES
(10, '40 ', '> 15000000', '1'),
(11, '41 ', 'Rendah', '1'),
(12, '41 ', 'Sedang', '2'),
(13, '40 ', '8,5 - 15 juta', '2'),
(14, '40 ', '7 - 8,5 jt', '3'),
(15, '40 ', '5,5 - 7 jt', '4'),
(16, '40 ', '< 5,5', '5'),
(17, '41 ', 'Tinggi', '3'),
(18, '42 ', '128 GB', '1'),
(19, '42 ', '320 GB', '2'),
(20, '42 ', '500 GB', '3'),
(21, '42 ', '750 GB', '4'),
(22, '42 ', '> 1 TB', '5'),
(23, '43 ', '2 GB', '1'),
(24, '43 ', '4 GB', '2'),
(25, '43 ', '8 GB', '3'),
(26, '43 ', '16 GB', '4'),
(27, '43 ', '32 GB', '5'),
(28, '45 ', 'Rendah', '1'),
(29, '45 ', 'Sedang', '3'),
(30, '45 ', 'Tinggi', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_topsis`
--
ALTER TABLE `hasil_topsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_alternatif`
--
ALTER TABLE `kategori_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `range_kriteria`
--
ALTER TABLE `range_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hasil_topsis`
--
ALTER TABLE `hasil_topsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kategori_alternatif`
--
ALTER TABLE `kategori_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT for table `range_kriteria`
--
ALTER TABLE `range_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
