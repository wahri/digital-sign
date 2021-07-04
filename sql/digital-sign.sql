-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 04 Jul 2021 pada 20.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital-sign`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`) VALUES
(1, 'admin', '$2y$10$IgnTuoUzIrSiDPdrK4d97OEe/Stv/zNuKubbLmWNO/OR69Ex9Su3S', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(64) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama`, `password`, `level`) VALUES
(1, '12345', 'Omar', '$2y$10$Kmg/vjt.OgQ/bXJi8K2eBOpZRBFccRMOvxv3MT800P9DP2BId1496', 1),
(2, '1234', 'Sarah', '$2y$10$oyhX2uaehMDyKx7LZ84GbOR1boU6MyOo/0uWoOh3641vXk7oz4xtC', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tempat_lahir` varchar(64) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `prodi` varchar(64) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `password`, `tempat_lahir`, `tanggal_lahir`, `prodi`, `alamat`, `status`) VALUES
(1, '1212', 'Andri', '$2y$10$VDuUiBBKCwQl5B53wAlQ7uP3yooLJi77p.WlVB4Z6sUl3ojvFdAPK', 'Pekanbaru', '2000-12-12', 'Teknik Informatika', 'Jl. H. Agussalim Gg. Irsyad No. 18', 1),
(4, '170401066', 'Andriansyah', '$2y$10$90JuFIr/AJMKN3t5pTOX3O2.RLUUC/6wOTtKgwX4odCiChGi7R4v2', NULL, NULL, NULL, NULL, 1),
(5, '54321', 'Joni', '$2y$10$JiCY5F2LYnYcmeAQv3Cnde8BGrFCq8APXTyzKjbWZXIl75MfmU1ES', 'Pekanbaru', '2020-08-24', 'Teknik Informatika', 'Jl. Belimbing', 1),
(6, '130401187', 'Supriyatno', '$2y$10$0ozH0BcyjAq0sx6TvkEXr.SeH2QqPl1LMY2ys2E4pwus1.7K3QTWy', 'Pekanbaru', '1994-04-21', 'Teknik Informatika', 'Jl. Surabaya', 1),
(7, '321', 'Nefri', '$2y$10$s43RxzMa.c6Fev/LjLJJXu.pPsjm00wLBTxB8cAOOX6B7DfmklJna', NULL, NULL, NULL, NULL, NULL),
(8, '0987', 'Erik Swanda Handika', '$2y$10$V5xRV.8wCBM/YEfo4jSxbujeOQ5InHJ0xbi/YsjC/bVnkIrtSlRBi', 'Pekanbaru', '2000-12-19', 'Teknik Informatika', 'Jl. Arifin Ahmad', 1),
(11, '123', 'Zita Putri Maysarah', '$2y$10$EcRHodZg4hmySAhsdK1hh.t6eYLlQcRMsDYE/2EdmH5xuXSPbNui.', 'Pekanbaru', '2000-03-26', 'Teknik Informatika', 'Pandau', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_pengajuan` int(11) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `semester` varchar(16) NOT NULL,
  `tahun_semester` int(5) NOT NULL,
  `approve_tu` int(1) DEFAULT 0,
  `approve_dekan` int(1) NOT NULL DEFAULT 0,
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  `tanggal_disetujui` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_pengajuan`, `nim`, `semester`, `tahun_semester`, `approve_tu`, `approve_dekan`, `tanggal_pengajuan`, `tanggal_disetujui`) VALUES
(2, '1212', 'GENAP', 2019, 1, 1, '2020-10-12 16:10:24', '2020-10-29 12:45:37'),
(3, '170401066', 'GENAP', 2019, 1, 1, '2020-10-29 13:29:50', '2020-10-29 13:30:36'),
(4, '1212', 'GANJIL', 2019, 1, 1, '2020-10-29 23:32:01', '2020-10-29 23:35:54'),
(5, '1212', 'GENAP', 2019, 1, 1, '2020-10-30 16:34:07', '2020-10-31 17:47:03'),
(6, '54321', 'GANJIL', 2019, 1, 1, '2020-10-31 17:45:04', '2020-10-31 17:47:20'),
(7, '54321', 'GENAP', 2019, 1, 1, '2020-10-31 17:49:13', '2020-10-31 17:49:37'),
(8, '130401187', 'GENAP', 2019, 1, 1, '2020-11-01 23:41:45', '2020-11-04 17:51:55'),
(9, '321', 'GENAP', 2019, 1, 0, '2020-11-04 17:51:05', NULL),
(10, '321', 'GENAP', 2019, 0, 0, '2020-11-04 18:04:39', NULL),
(11, '0987', 'GANJIL', 2019, 1, 1, '2020-11-04 18:50:39', '2020-11-04 18:53:26'),
(12, '123', 'GANJIL', 2019, 0, 0, '2021-03-21 02:36:49', NULL),
(13, '123', 'GENAP', 2020, 0, 0, '2021-03-21 02:37:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `nomor_surat` varchar(4) NOT NULL,
  `nama_surat` varchar(512) DEFAULT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `qr_code` varchar(256) DEFAULT NULL,
  `encrypt_code` varchar(512) DEFAULT NULL,
  `tanggal_approve` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`nomor_surat`, `nama_surat`, `id_pengajuan`, `qr_code`, `encrypt_code`, `tanggal_approve`) VALUES
('007', '20201029_007.pdf', 2, '20201029_007.png', '110592.110592.166375', '2020-10-29 12:45:37'),
('008', '20201029_008.pdf', 3, '20201029_008.png', '110592.110592.175616', '2020-10-29 13:30:36'),
('009', '20201029_009.pdf', 4, '20201029_009.png', '110592.110592.185193', '2020-10-29 23:35:53'),
('010', '20201029_010.pdf', 4, '20201029_010.png', '110592.117649.110592', '2020-10-29 23:35:54'),
('011', '20201031_011.pdf', 5, '20201031_011.png', '110592.117649.117649', '2020-10-31 17:47:02'),
('012', '20201031_012.pdf', 6, '20201031_012.png', '110592.117649.125000', '2020-10-31 17:47:20'),
('013', '20201031_013.pdf', 7, '20201031_013.png', '110592.117649.132651', '2020-10-31 17:49:37'),
('014', '20201104_014.pdf', 8, '20201104_014.png', '110592.117649.140608', '2020-11-04 17:51:55'),
('015', '20201104_015.pdf', 11, '20201104_015.png', '110592.117649.148877', '2020-11-04 18:53:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`nomor_surat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
