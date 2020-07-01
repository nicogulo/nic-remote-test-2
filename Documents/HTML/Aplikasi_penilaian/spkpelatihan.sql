-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 07:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkpelatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `rules` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `rules`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE `himpunan` (
  `id_himpunan` int(10) NOT NULL,
  `batas_atas` text NOT NULL,
  `batas_bawah` text NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `batas_atas`, `batas_bawah`, `nilai`) VALUES
(1, '100', '80', '5'),
(2, '79', '60', '4'),
(3, '59', '40', '3'),
(4, '39', '20', '2'),
(5, '19', '0', '1'),
(6, '', '', ''),
(7, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kdKriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `sifat` char(1) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kdKriteria`, `kriteria`, `sifat`, `bobot`) VALUES
(3, 'Materi', 'B', 5),
(5, 'Fasilitator', 'B', 4),
(6, 'Dipahami', 'B', 3),
(7, 'Sikap', 'B', 4),
(8, 'Penampilan', 'B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `kdPelatihan` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idnilai`, `kdPelatihan`, `kdKriteria`, `nilai`) VALUES
(1, 13, 3, 2),
(2, 13, 5, 5),
(3, 13, 6, 5),
(4, 13, 7, 4),
(5, 13, 8, 3),
(6, 14, 3, 2),
(7, 14, 5, 2),
(8, 14, 6, 3),
(9, 14, 7, 5),
(10, 14, 8, 3),
(11, 18, 3, 5),
(12, 18, 5, 3),
(13, 18, 6, 5),
(14, 18, 7, 3),
(15, 18, 8, 5),
(16, 19, 3, 3),
(17, 19, 5, 3),
(18, 19, 6, 3),
(19, 19, 7, 3),
(20, 19, 8, 3),
(21, 18, 3, 1),
(22, 18, 5, 3),
(23, 18, 6, 4),
(24, 18, 7, 3),
(25, 18, 8, 4),
(26, 18, 3, 3),
(27, 18, 5, 3),
(28, 18, 6, 3),
(29, 18, 7, 3),
(30, 18, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `kdPelatihan` int(11) NOT NULL,
  `pelatihan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` int(20) NOT NULL,
  `bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`kdPelatihan`, `pelatihan`, `alamat`, `telp`, `bidang`) VALUES
(17, 'PT DEF', 'bekasi', 2187567, 'kesehatan'),
(18, 'PT Delta Teguh Pratama', 'bekasi', 2147483647, 'SDM'),
(19, 'PT ABC', 'bogor', 2147483647, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kdSubKriteria`, `subKriteria`, `value`, `kdKriteria`) VALUES
(1, 'tidak terkait', 1, 3),
(2, 'kurang terkait', 2, 3),
(3, 'cukup terkait', 3, 3),
(4, 'terkait', 4, 3),
(5, 'sangat terkait', 5, 3),
(11, 'sangat tidak menguasai materi', 1, 5),
(12, 'tidak menguasai materi', 2, 5),
(13, 'cukup menguasai materi', 3, 5),
(14, 'menguasai materi', 4, 5),
(15, 'sangat menguasai materi', 5, 5),
(16, 'tidak mudah dipahami', 1, 6),
(17, 'kurang mudah dipahami', 2, 6),
(18, 'cukup mudah dipahami', 3, 6),
(19, 'mudah dipahami', 4, 6),
(20, 'sangat mudah dipahami', 5, 6),
(21, 'sangat tidak baik', 1, 7),
(22, 'tidak baik', 2, 7),
(23, 'cukup baik', 3, 7),
(24, 'baik', 4, 7),
(25, 'sangat baik', 5, 7),
(26, 'sangat buruk', 1, 8),
(27, 'buruk', 2, 8),
(28, 'cukup', 3, 8),
(29, 'baik', 4, 8),
(30, 'sangat baik', 5, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id_himpunan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kdKriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`kdPelatihan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`),
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id_himpunan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `kdPelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kdKriteria`) REFERENCES `kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
