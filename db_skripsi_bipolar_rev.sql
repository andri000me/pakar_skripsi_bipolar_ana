-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2019 pada 23.51
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi_bipolar_rev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id_aturan` char(10) NOT NULL,
  `id_penyakit` char(5) NOT NULL,
  `id_gejala` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aturan`
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
('AT100', 'PE09', 'GE11'),
('AT101', 'PE09', 'GE12'),
('AT102', 'PE09', 'GE02'),
('AT103', 'PE09', 'GE13'),
('AT104', 'PE09', 'GE14'),
('AT105', 'PE09', 'GE15'),
('AT106', 'PE09', 'GE16'),
('AT107', 'PE09', 'GE23'),
('AT108', 'PE09', 'GE25'),
('AT109', 'PE09', 'GE26'),
('AT11', 'PE02', 'GE02'),
('AT110', 'PE09', 'GE27'),
('AT111', 'PE10', 'GE09'),
('AT112', 'PE10', 'GE10'),
('AT113', 'PE10', 'GE02'),
('AT114', 'PE10', 'GE11'),
('AT115', 'PE10', 'GE12'),
('AT116', 'PE10', 'GE13'),
('AT117', 'PE10', 'GE14'),
('AT118', 'PE10', 'GE15'),
('AT119', 'PE10', 'GE16'),
('AT12', 'PE02', 'GE11'),
('AT120', 'PE10', 'GE01'),
('AT121', 'PE10', 'GE03'),
('AT122', 'PE10', 'GE04'),
('AT123', 'PE10', 'GE05'),
('AT124', 'PE10', 'GE11'),
('AT125', 'PE10', 'GE17'),
('AT126', 'PE10', 'GE18'),
('AT127', 'PE10', 'GE24'),
('AT128', 'PE10', 'GE25'),
('AT129', 'PE10', 'GE26'),
('AT13', 'PE02', 'GE12'),
('AT130', 'PE10', 'GE27'),
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
('AT41', 'PE04', 'GE18'),
('AT42', 'PE05', 'GE01'),
('AT43', 'PE05', 'GE02'),
('AT44', 'PE05', 'GE03'),
('AT45', 'PE05', 'GE04'),
('AT46', 'PE05', 'GE05'),
('AT47', 'PE05', 'GE06'),
('AT48', 'PE05', 'GE07'),
('AT49', 'PE05', 'GE08'),
('AT50', 'PE05', 'GE19'),
('AT51', 'PE05', 'GE25'),
('AT52', 'PE05', 'GE26'),
('AT53', 'PE05', 'GE27'),
('AT54', 'PE06', 'GE01'),
('AT55', 'PE06', 'GE02'),
('AT56', 'PE06', 'GE03'),
('AT57', 'PE06', 'GE04'),
('AT58', 'PE06', 'GE05'),
('AT59', 'PE06', 'GE06'),
('AT60', 'PE06', 'GE07'),
('AT61', 'PE06', 'GE08'),
('AT62', 'PE06', 'GE20'),
('AT63', 'PE06', 'GE25'),
('AT64', 'PE06', 'GE26'),
('AT65', 'PE06', 'GE27'),
('AT66', 'PE07', 'GE01'),
('AT67', 'PE07', 'GE02'),
('AT68', 'PE07', 'GE03'),
('AT69', 'PE07', 'GE04'),
('AT70', 'PE07', 'GE05'),
('AT71', 'PE07', 'GE06'),
('AT72', 'PE07', 'GE07'),
('AT73', 'PE07', 'GE08'),
('AT74', 'PE07', 'GE09'),
('AT75', 'PE07', 'GE10'),
('AT76', 'PE07', 'GE11'),
('AT77', 'PE07', 'GE12'),
('AT78', 'PE07', 'GE13'),
('AT79', 'PE07', 'GE14'),
('AT80', 'PE07', 'GE15'),
('AT81', 'PE07', 'GE16'),
('AT82', 'PE07', 'GE21'),
('AT83', 'PE07', 'GE25'),
('AT84', 'PE07', 'GE26'),
('AT85', 'PE07', 'GE27'),
('AT86', 'PE08', 'GE01'),
('AT87', 'PE08', 'GE02'),
('AT88', 'PE08', 'GE03'),
('AT89', 'PE08', 'GE04'),
('AT90', 'PE08', 'GE05'),
('AT91', 'PE08', 'GE11'),
('AT92', 'PE08', 'GE17'),
('AT93', 'PE08', 'GE18'),
('AT94', 'PE08', 'GE22'),
('AT95', 'PE08', 'GE25'),
('AT96', 'PE08', 'GE26'),
('AT97', 'PE08', 'GE27'),
('AT98', 'PE09', 'GE09'),
('AT99', 'PE09', 'GE10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cek_diagnosa`
--

CREATE TABLE `tb_cek_diagnosa` (
  `id_cek` int(5) NOT NULL,
  `id_diagnosa` int(5) NOT NULL,
  `id_gejala` char(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cek_diagnosa`
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
-- Struktur dari tabel `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `id_diagnosa` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pasien` int(5) NOT NULL,
  `lama_keluhan` int(4) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`id_diagnosa`, `tanggal`, `id_pasien`, `lama_keluhan`, `id_user`) VALUES
(1, '2017-08-02 00:00:00', 15, 0, 'dok001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` char(5) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `fase_gejala` enum('1','2') NOT NULL,
  `bobot_gejala` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejala`
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
('GE13', 'Merasa menurunnya harga diri', 'Apakah Anda merasa meurunnya harga diri?', '1', 0.33),
('GE14', 'Muncul Ide-ide tentang rasa bersalah, ragu-ragu dan menurunnya kosentrasi', 'Muncul Ide-ide tentang rasa bersalah, ragu-ragu dan menurunnya kosentrasi?', '1', 0.33),
('GE15', 'Mudah Pesimis', 'Apakah Anda mudah Pesimis?', '1', 0.33),
('GE16', 'Mengalami pikiran berulang tentang kematian,  bunuh diri (dengan atau tanpa rencana)', 'Apakah Anda Mengalami pikiran berulang tentang kematian,  bunuh diri (dengan atau tanpa rencana)?\r\n', '1', 0.33),
('GE17', 'Pikiran menjadi lebih tajam', 'Pikiran menjadi lebih tajam?', '1', 0.33),
('GE18', 'Daya nilai berkurang', 'Daya nilai berkurang?', '1', 0.33),
('GE19', 'Mengalami episode manic dan tidak ada riwayat depresi mayor sebelumnya', 'Apakah Anda mengalami episode manic dan tidak ada riwayat depresi mayor sebelumnya?', '2', 0),
('GE20', 'Mengalami satu kali episode manic, depresi, atau campuran', 'Apakah Anda mengalami satu kali episode manic, depresi, atau campuran?', '2', 0),
('GE21', 'Dalam episode campuran (Episode Manic dan Depresi Mayor secara bersamaan)', 'Apakah saat ini Anda dalam episode campuran (Episode Manic dan Depresi Mayor secara bersamaan)?', '2', 0),
('GE22', 'Dalam episode hipomanic', 'Apakah saat ini Anda dalam episode hipomanic?', '2', 0),
('GE23', 'Dalam episode depresi mayor', 'Apakah saat ini Anda dalam episode depresi mayor?', '2', 0),
('GE24', 'Dalam episode depresi mayor yang disertai dengan episode hipomanic', 'Apakah saat ini Anda dalam episode depresi mayor yang disertai dengan episode hipomanic?', '2', 0),
('GE25', 'Anda pengguna obat-obatan (narkotika)', 'Apakah Anda pengguna obat-obatan (narkotika)?', '2', 0),
('GE26', 'Gejala tersebut menimbulkan gangguan dalam sosial, pekerjaan, atau sekolah', 'Apakah gejala tersebut menimbulkan gangguan dalam sosial, pekerjaan, atau sekolah?', '2', 0),
('GE27', 'Memiliki riwayat skizofrenia atau gangguan waham', 'Apakah Anda memiliki riwayat skizofrenia atau gangguan waham?', '2', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_diagnosa`
--

CREATE TABLE `tb_hasil_diagnosa` (
  `id_hasil` int(5) NOT NULL,
  `id_penyakit` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `umur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(1, 'czxczxc', 'laki-laki', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` char(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
('PE01', 'Episode Manic'),
('PE02', 'Episode  Depresi Mayor'),
('PE03', 'Episode Campuran'),
('PE04', 'Episode Hipomanic'),
('PE05', 'Bipolar 1 Episode Manic Tunggal'),
('PE06', 'Bipolar 1 Episode Manic Sekarang Ini'),
('PE07', 'Bipolar 1 Episode Campuran Saat Ini'),
('PE08', 'Bipolar 1 Episode Hipomanic'),
('PE09', 'Bipolar 1 Episode Depresi Saat Ini'),
('PE10', 'Bipolar 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','operator','dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `level`) VALUES
('admin', 'Administrator', 'admin', 'admin'),
('dok001', 'Dr. Strange', 'admin', 'dokter'),
('tester123', 'Tester Sistem', 'f5d1278e8109edd94e1e4197e04873b9', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `tb_cek_diagnosa`
--
ALTER TABLE `tb_cek_diagnosa`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cek_diagnosa`
--
ALTER TABLE `tb_cek_diagnosa`
  MODIFY `id_cek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  MODIFY `id_diagnosa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
