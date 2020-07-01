-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 02:41 AM
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
-- Database: `sakura`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_master`
--

CREATE TABLE `file_master` (
  `id_file_master` int(5) NOT NULL,
  `nipost` int(10) DEFAULT NULL,
  `nm_pegawai` varchar(50) DEFAULT NULL,
  `nm_dokumen` varchar(70) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(5) NOT NULL,
  `nipos` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id_master` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `status` enum('Publish','Not Publish','','') DEFAULT NULL,
  `foto_master` varchar(60) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nippos` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nippos`, `nama_pegawai`, `email`, `tanggal`) VALUES
('PG0006', '1154003', 'hinata hyuga', 'hinata.hyuga@gmail.com', '2019-03-15'),
('PG0007', '1154001', 'uzumaki naruto', 'uzumaki.naruto@gmail.com', '2019-03-15'),
('PG0008', '1154002', 'neji hyuga', 'neji.hyuga@gmail.com', '2019-03-15'),
('PG0009', '1154004', 'tenten', 'tenten@konoha.com', '2019-03-15'),
('PG0010', '1154005', 'rock lee', 'rock.lee@gmail.com', '2019-03-15'),
('PG0011', '1154006', 'aburame shino', 'abrume.shino@konoha.com', '2019-03-15'),
('PG0012', '1154008', 'inuzuka kiba', 'inuzukakiba@konoha.com', '2019-03-15'),
('PG0013', '1154007', 'haruno sakura', 'haruno.sakura@konoha.com', '2019-03-15'),
('PG0014', '1154009', 'tsunade senju', 'tsunade.senju@konoha.com', '2019-03-15'),
('PG0015', '1154010', 'hatake kakashi', 'kakashi.senpai@konoha.com', '2019-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_master`
--
ALTER TABLE `file_master`
  ADD PRIMARY KEY (`id_file_master`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_master`
--
ALTER TABLE `file_master`
  MODIFY `id_file_master` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
