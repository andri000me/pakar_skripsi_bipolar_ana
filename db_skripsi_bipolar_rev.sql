-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 05:50 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_skripsi_bipolar_rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE IF NOT EXISTS `tb_aturan` (
  `id_aturan` char(5) NOT NULL,
  `id_penyakit` char(5) NOT NULL,
  `id_gejala` char(5) NOT NULL,
  PRIMARY KEY (`id_aturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aturan`
--

INSERT INTO `tb_aturan` (`id_aturan`, `id_penyakit`, `id_gejala`) VALUES
('AT01', 'PE01', 'GE08'),
('AT02', 'PE02', 'GE10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cek_diagnosa`
--

CREATE TABLE IF NOT EXISTS `tb_cek_diagnosa` (
  `id_cek` int(5) NOT NULL AUTO_INCREMENT,
  `id_diagnosa` int(5) NOT NULL,
  `id_gejala` char(5) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_cek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_cek_diagnosa`
--

INSERT INTO `tb_cek_diagnosa` (`id_cek`, `id_diagnosa`, `id_gejala`, `keterangan`) VALUES
(8, 1, 'GE101', ''),
(9, 1, 'GE116', ''),
(10, 1, 'GE117', ''),
(11, 1, 'GE120', ''),
(12, 1, 'GE121', ''),
(13, 1, 'GE129', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosa`
--

CREATE TABLE IF NOT EXISTS `tb_diagnosa` (
  `id_diagnosa` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `id_pasien` int(5) NOT NULL,
  `lama_keluhan` int(4) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id_diagnosa`),
  KEY `id_pasien` (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`id_diagnosa`, `tanggal`, `id_pasien`, `lama_keluhan`, `id_user`) VALUES
(1, '2017-08-02 00:00:00', 15, 0, 'dok001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE IF NOT EXISTS `tb_gejala` (
  `id_gejala` char(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `fase_gejala` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`, `fase_gejala`) VALUES
('GE01', 'asdadasda', '1'),
('GE02', 'asasdasd', '1'),
('GE03', 'asdas', '1'),
('GE04', 'asdasdad', '1'),
('GE05', 'vvcbcvbcv', '1'),
('GE06', 'vbnvnvn', '1'),
('GE07', 'ytutu', '1'),
('GE08', 'hjkjkjhk', '1'),
('GE09', 'nvnvbn', '1'),
('GE10', 'cxzczc', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala_dipilih`
--

CREATE TABLE IF NOT EXISTS `tb_gejala_dipilih` (
  `id_gejaladipilih` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  PRIMARY KEY (`id_gejaladipilih`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_diagnosa`
--

CREATE TABLE IF NOT EXISTS `tb_hasil_diagnosa` (
  `id_hasil` int(5) NOT NULL,
  `id_penyakit` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE IF NOT EXISTS `tb_pasien` (
  `id_pasien` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `umur` int(3) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE IF NOT EXISTS `tb_penyakit` (
  `id_penyakit` char(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
('PE01', 'Bipolar 1'),
('PE02', 'Bipolar 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','operator','dokter') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `level`) VALUES
('admin', 'Administrator', 'admin', 'admin'),
('dok001', 'Dr. Strange', 'admin', 'dokter'),
('tester123', 'Tester Sistem', 'f5d1278e8109edd94e1e4197e04873b9', 'operator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
