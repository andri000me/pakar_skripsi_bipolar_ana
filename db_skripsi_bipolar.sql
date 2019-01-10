-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jan 2019 pada 08.54
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi_bipolar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cek_diagnosa`
--

CREATE TABLE `cek_diagnosa` (
  `id_cek` int(5) NOT NULL,
  `id_diagnosa` int(5) NOT NULL,
  `id_gejala` char(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cek_diagnosa`
--

INSERT INTO `cek_diagnosa` (`id_cek`, `id_diagnosa`, `id_gejala`, `keterangan`) VALUES
(8, 1, 'GE101', ''),
(9, 1, 'GE116', ''),
(10, 1, 'GE117', ''),
(11, 1, 'GE120', ''),
(12, 1, 'GE121', ''),
(13, 1, 'GE129', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pasien` int(5) NOT NULL,
  `id_dokter` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `tanggal`, `id_pasien`, `id_dokter`) VALUES
(1, '2017-08-02 00:00:00', 15, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `alamat`, `telpon`) VALUES
(5, 'dani', 'kersar', '232323'),
(6, 'joko', 'wdewde', '123123423');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id_hasil` int(5) NOT NULL,
  `id_penyakit` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(5) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` char(2) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `telpon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `umur`, `jenis_kelamin`, `alamat`, `telpon`) VALUES
(2, 'efrefe', '33', 'Laki-Laki', 'rfdgdg', '242'),
(3, 'sdfsdf', '21', 'Laki-Laki', '14q1s', 'swer'),
(4, 'wew', 'e', 'Laki-Laki', 'dfdf', '232'),
(5, 'joko', '23', 'Laki-Laki', 'kadipiro', '087627282'),
(6, 'susilo', '25', 'Laki-Laki', 'kwaron', '085729229560'),
(7, 'erfef', 'er', 'Laki-Laki', 'erferf', 'rfrf'),
(8, 'sew', '21', 'Perempuan', 'wewewe', '1313'),
(9, 'dfdfsde', '23', 'Perempuan', 'wrwr2323', '23232'),
(10, 'joki', '21', 'Perempuan', 'wdsd1212', '1212'),
(11, 'Susilo', '21', 'Perempuan', 'sjdhsjdjsd', '128127'),
(12, 'joki', '2', 'Laki-Laki', 'wrewedf', '1212'),
(13, 'dono', '21', 'Laki-Laki', 'efdfdsfs', '12121'),
(14, 'donis', '22', 'Laki-Laki', 'sdsdsd', '12121'),
(15, 'erete', '34', 'Laki-Laki', '3rtgrtr4t4t', '354353');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` varchar(5) NOT NULL,
  `id_gejala` char(5) NOT NULL,
  `id_penyakit` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
('RE101', 'GE101', 'PE101'),
('RE102', 'GE102', 'PE101'),
('RE103', 'GE103', 'PE101'),
('RE104', 'GE104', 'PE101'),
('RE105', 'GE105', 'PE101'),
('RE106', 'GE106', 'PE101'),
('RE107', 'GE107', 'PE101'),
('RE108', 'GE108', 'PE101'),
('RE109', 'GE109', 'PE102'),
('RE110', 'GE122', 'PE102'),
('RE111', 'GE111', 'PE102'),
('RE112', 'GE105', 'PE102'),
('RE113', 'GE106', 'PE102'),
('RE114', 'GE107', 'PE102'),
('RE115', 'GE112', 'PE102'),
('RE116', 'GE113', 'PE103'),
('RE117', 'GE114', 'PE103'),
('RE118', 'GE115', 'PE103'),
('RE119', 'GE116', 'PE103'),
('RE120', 'GE106', 'PE103'),
('RE121', 'GE107', 'PE103'),
('RE122', 'GE117', 'PE103'),
('RE123', 'GE118', 'PE104'),
('RE124', 'GE113', 'PE104'),
('RE125', 'GE114', 'PE104'),
('RE126', 'GE116', 'PE104'),
('RE127', 'GE115', 'PE104'),
('RE128', 'GE119', 'PE104'),
('RE129', 'GE120', 'PE104'),
('RE130', 'GE117', 'PE104'),
('RE131', 'GE121', 'PE105'),
('RE132', 'GE122', 'PE105'),
('RE133', 'GE123', 'PE105'),
('RE134', 'GE124', 'PE105'),
('RE135', 'GE125', 'PE105'),
('RE136', 'GE126', 'PE105'),
('RE137', 'GE127', 'PE105'),
('RE138', 'GE128', 'PE106'),
('RE139', 'GE129', 'PE106'),
('RE140', 'GE130', 'PE106'),
('RE141', 'GE131', 'PE106'),
('RE142', 'GE132', 'PE106'),
('RE143', 'GE125', 'PE106'),
('RE144', 'GE126', 'PE106'),
('RE145', 'GE127', 'PE106'),
('RE146', 'GE133', 'PE107'),
('RE147', 'GE134', 'PE107'),
('RE148', 'GE135', 'PE107'),
('RE149', 'GE125', 'PE107'),
('RE150', 'GE126', 'PE107'),
('RE151', 'GE127', 'PE107');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id_aturan` int(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL,
  `bobot_aturan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(10) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `bobot_gejala` float NOT NULL,
  `episode` enum('Manic','Depresi','Hipomanic') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`, `bobot_gejala`, `episode`) VALUES
(4, 'Apakah Anda mengalami grandiositas atau percaya diri berlebihan', 0.33, 'Manic'),
(5, 'Apakah Anda mengalami gangguan atau berkurangnya kebutuhan tidur', 0.33, 'Manic'),
(6, 'Apakah Anda merasa berbicara jauh lebih banyak atau jauh lebih cepat dari biasanya', 0.33, 'Manic'),
(7, 'Apakah Anda merasa lompatan gagasan atau pikiran berlomba', 0.33, 'Manic'),
(8, 'Apakah perhatian Anda mudah teralihkan', 0.33, 'Manic'),
(9, 'Apakah Anda memiliki energi berlebih hingga memulai banyak aktivitas', 0.33, 'Manic'),
(10, 'Meningkatnya aktivitas bertujuan (sosial, seksual, pekerjaan dan sekolah)', 0.33, 'Manic'),
(11, 'Apakah Anda melakukan tindakan beresiko (kebut-kebutan, loncat sana-sini, tidak seperti biasanya)', 0.33, 'Manic'),
(12, 'Apakah Anda mengalami mood depresif atau hilangnya minat atau rasa senang', 0.33, 'Depresi'),
(13, 'Apakah Anda mengalami menurun atau meningkatnya berat badan atau nafsu makan', 0.33, 'Depresi'),
(14, 'Apakah Anda mengalami Agitasi dan retardasi psikomotor (perlambatan secara nyata pada proses piki', 0.33, 'Depresi'),
(15, 'Apakah Anda merasa kelelahan atau berkurangnya tenaga', 0.33, 'Depresi'),
(16, 'Apakah Anda merasa meurunnya harga diri', 0.33, 'Depresi'),
(17, 'Muncul Ide-ide tentang rasa bersalah, ragu-ragu dan menurunnya kosentrasi', 0.33, 'Depresi'),
(18, 'Apakah Anda mudah Pesimis', 0.33, 'Depresi'),
(19, 'Apakah Anda Mengalami pikiran berulang tentang kematian,  bunuh diri (dengan atau tanpa rencana)', 0.33, 'Depresi'),
(20, 'Pikiran menjadi lebih tajam', 0.33, 'Hipomanic'),
(21, 'Daya nilai berkurang', 0.33, 'Hipomanic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala_dipilih`
--

CREATE TABLE `tb_gejala_dipilih` (
  `id_gejaladipilih` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `nilai` int(20) NOT NULL
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `bobot_penyakit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `bobot_penyakit`) VALUES
(1, 'Bipolar 1', 100),
(2, 'Bipolar 2', 3644);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `level`) VALUES
('admin', 'Administrator', 'admin', 'admin'),
('tester', 'tester 123', 'tes12345', 'operator'),
('tester123', 'Tester Sistem', 'f5d1278e8109edd94e1e4197e04873b9', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_diagnosa`
--
ALTER TABLE `cek_diagnosa`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_gejala_dipilih`
--
ALTER TABLE `tb_gejala_dipilih`
  ADD PRIMARY KEY (`id_gejaladipilih`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

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
-- AUTO_INCREMENT for table `cek_diagnosa`
--
ALTER TABLE `cek_diagnosa`
  MODIFY `id_cek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
