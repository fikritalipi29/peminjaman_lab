-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 17.34
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_peminjaman_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `id_biodata` int(11) NOT NULL,
  `no_card` varchar(25) NOT NULL COMMENT 'Nomer Dari RFID',
  `full_name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `jk` enum('1','2') NOT NULL COMMENT '1 = Laki - Laki\r\n2 = Perempuan',
  `id_prodi` int(11) NOT NULL COMMENT 'Foreign key tbl_prodi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laboratorium`
--

CREATE TABLE `tbl_laboratorium` (
  `id_laboratorium` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL COMMENT 'Foreign key tbl_prodi',
  `lab_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mst_prodi`
--

CREATE TABLE `tbl_mst_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL COMMENT 'Foreign key tbl_biodata',
  `id_lab` int(11) NOT NULL COMMENT 'Foreign key tbl_laboratorium',
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1 = Tahap Verifikasi,\r\n2 = Terverifikasi,\r\n3 = Ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1','2','3') NOT NULL COMMENT '0 = Super Admin,\r\n1 = Admin,\r\n2 = Kepala Laboratorium,\r\n3 = Peminjam',
  `id_biodata` int(11) NOT NULL COMMENT 'Foreign key tbl_biodata'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD UNIQUE KEY `no_card` (`no_card`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tbl_laboratorium`
--
ALTER TABLE `tbl_laboratorium`
  ADD PRIMARY KEY (`id_laboratorium`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tbl_mst_prodi`
--
ALTER TABLE `tbl_mst_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_biodata` (`id_biodata`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_laboratorium`
--
ALTER TABLE `tbl_laboratorium`
  MODIFY `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_mst_prodi`
--
ALTER TABLE `tbl_mst_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
