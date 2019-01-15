-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 03:56 AM
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
('AT01', 'PE01', 'GE01'),
('AT02', 'PE01', 'GE02'),
('AT03', 'PE01', 'GE03'),
('AT04', 'PE01', 'GE04'),
('AT05', 'PE01', 'GE05'),
('AT06', 'PE01', 'GE06'),
('AT07', 'PE01', 'GE07'),
('AT08', 'PE01', 'GE08'),
('AT09', 'PE02', 'GE09'),
('AT10', 'PE02', 'GE10'),
('AT11', 'PE02', 'GE02'),
('AT12', 'PE02', 'GE11'),
('AT13', 'PE02', 'GE12'),
('AT14', 'PE02', 'GE13'),
('AT15', 'PE02', 'GE14'),
('AT16', 'PE02', 'GE15'),
('AT17', 'PE02', 'GE16'),
('AT18', 'PE03', 'GE01'),
('AT19', 'PE03', 'GE02'),
('AT20', 'PE03', 'GE03'),
('AT21', 'PE03', 'GE04'),
('AT22', 'PE03', 'GE05'),
('AT23', 'PE03', 'GE06'),
('AT24', 'PE03', 'GE07'),
('AT25', 'PE03', 'GE08'),
('AT26', 'PE03', 'GE09'),
('AT27', 'PE03', 'GE10'),
('AT28', 'PE03', 'GE11'),
('AT29', 'PE03', 'GE12'),
('AT30', 'PE03', 'GE13'),
('AT31', 'PE03', 'GE14'),
('AT32', 'PE03', 'GE15'),
('AT33', 'PE03', 'GE16'),
('AT34', 'PE04', 'GE01'),
('AT35', 'PE04', 'GE02'),
('AT36', 'PE04', 'GE03'),
('AT37', 'PE04', 'GE04'),
('AT38', 'PE04', 'GE05'),
('AT39', 'PE04', 'GE11'),
('AT40', 'PE04', 'GE17'),
('AT41', 'PE04', 'GE18');

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
  `nama_gejala` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `fase_gejala` enum('1','2') NOT NULL,
  `bobot_gejala` float NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`, `pertanyaan`, `fase_gejala`, `bobot_gejala`) VALUES
('GE01', 'Mengalami grandiositas atau percaya diri berlebihan', 'Apakah Anda mengalami grandiositas atau percaya diri berlebihan?', '1', 0.33),
('GE02', 'Mengalami gangguan atau kebutuhan tidur', 'Apakah Anda mengalami gangguan atau kebutuhan tidur?', '1', 0.33),
('GE03', 'Merasa berbicara jauh lebih banyak atau jauh lebih cepat dari biasanya', 'Apakah Anda merasa berbicara jauh lebih banyak atau jauh lebih cepat dari biasanya?', '1', 0.33),
('GE04', 'Merasa lompatan gagasan atau pikiran berlomba', 'Apakah Anda merasa lompatan gagasan atau pikiran berlomba?', '1', 0.33),
('GE05', 'Perhatian Anda mudah teralihkan', 'Apakah perhatian Anda mudah teralihkan?', '1', 0.33),
('GE06', 'Memiliki energi berlebih hingga memulai banyak aktivitas', 'Apakah Anda memiliki energi berlebih hingga memulai banyak aktivitas?', '1', 0.33),
('GE07', 'Meningkatnya aktivitas bertujuan (sosial, seksual, pekerjaan dan sekolah)', 'Meningkatnya aktivitas bertujuan (sosial, seksual, pekerjaan dan sekolah)?', '1', 0.33),
('GE08', 'Melakukan tindakan beresiko (kebut-kebutan, loncat sana-sini, tidak seperti biasanya)', 'Apakah Anda melakukan tindakan beresiko (kebut-kebutan, loncat sana-sini, tidak seperti biasanya)?', '1', 0.33),
('GE09', 'Mengalami mood depresif atau hilangnya minat atau rasa senang', 'Apakah Anda mengalami mood depresif atau hilangnya minat atau rasa senang?', '1', 0.33),
('GE10', 'Mengalami menurun atau meningkatnya berat badan atau nafsu makan', 'Apakah Anda mengalami menurun atau meningkatnya berat badan atau nafsu makan?', '1', 0.33),
('GE11', 'Mengalami Agitasi dan retardasi psikomotor (perlambatan secara nyata pada proses pikir)', 'Apakah Anda mengalami Agitasi dan retardasi psikomotor (perlambatan secara nyata pada proses pikir)?', '1', 0.33),
('GE12', 'Merasa kelelahan atau berkurangnya tenaga', 'Apakah Anda merasa kelelahan atau berkurangnya tenaga?', '1', 0.33),
('GE13', 'Merasa meurunnya harga diri', 'Apakah Anda merasa meurunnya harga diri?', '1', 0.33),
('GE14', 'Muncul Ide-ide tentang rasa bersalah, ragu-ragu dan menurunnya kosentrasi', 'Muncul Ide-ide tentang rasa bersalah, ragu-ragu dan menurunnya kosentrasi?', '1', 0.33),
('GE15', 'Mudah Pesimis', 'Apakah Anda mudah Pesimis?', '1', 0.33),
('GE16', 'Mengalami pikiran berulang tentang kematian,  bunuh diri (dengan atau tanpa rencana)', 'Apakah Anda Mengalami pikiran berulang tentang kematian,  bunuh diri (dengan atau tanpa rencana)?\r\n', '1', 0.33),
('GE17', 'Pikiran menjadi lebih tajam', 'Pikiran menjadi lebih tajam?', '1', 0.33),
('GE18', 'Daya nilai berkurang', 'Daya nilai berkurang?', '1', 0.33);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(1, 'czxczxc', 'laki-laki', 34);

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
('PE01', 'Episode Manic'),
('PE02', 'Episode  Depresi Mayor'),
('PE03', 'Episode Campuran'),
('PE04', 'Episode Hipomanic');

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
