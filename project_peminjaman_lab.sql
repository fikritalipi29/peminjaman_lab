-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2023 pada 12.03
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
-- Struktur dari tabel `mode_rfid`
--

CREATE TABLE `mode_rfid` (
  `id` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mode_rfid`
--

INSERT INTO `mode_rfid` (`id`, `status`) VALUES
(1, '1');

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

--
-- Dumping data untuk tabel `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`id_biodata`, `no_card`, `full_name`, `address`, `jk`, `id_prodi`) VALUES
(1, '00000000000000000000', 'Super Admin', 'Super Admin', '1', 1),
(3, '907E4222', 'Mohamad Fikri Talipi', 'Kwandang', '1', 2),
(4, 'C0DD3E21', 'Marno Biki', 'Batuda\'a', '1', 2),
(5, '403FA21A', 'Isran', 'pagumayan pantai', '1', 2),
(7, '40EA651A', 'Irwan Karim', 'Gorontalo', '1', 2),
(8, 'F3818B30', 'Jefranda Modjo', 'Paguyaman', '1', 2),
(9, '812FA726', 'Minarti Tangahu', 'Pagimana', '2', 2);

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

--
-- Dumping data untuk tabel `tbl_laboratorium`
--

INSERT INTO `tbl_laboratorium` (`id_laboratorium`, `id_prodi`, `lab_name`, `capacity`) VALUES
(1, 2, 'LAB SOFTWARE', 20),
(2, 2, 'LAB JARINGAN', 20),
(3, 2, 'LAB MULTIMEDIA', 20),
(4, 2, 'LAB KOMPUTER DASAR', 20),
(5, 2, 'LAB ROBOTIKA', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mst_prodi`
--

CREATE TABLE `tbl_mst_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mst_prodi`
--

INSERT INTO `tbl_mst_prodi` (`id_prodi`, `prodi_name`) VALUES
(1, 'Super Admin'),
(2, 'TEKNIK INFORMATIKA'),
(3, 'MESIN PERALATAN PERTANIAN'),
(4, 'TEKNOLOGI HASIL PERTANIAN'),
(6, 'TEKNOLOGI REKAYASA PANGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL COMMENT 'Foreign key tbl_biodata',
  `id_lab` int(11) NOT NULL COMMENT 'Foreign key tbl_laboratorium',
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','2','3') NOT NULL COMMENT '1 = Tahap Verifikasi,\r\n2 = Terverifikasi,\r\n3 = Ditolak',
  `status_masuk` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_biodata`, `id_lab`, `start_time`, `end_time`, `status`, `status_masuk`) VALUES
(6, 4, 1, '2023-08-07 20:24:00', '2023-08-08 04:24:00', '2', 2),
(7, 4, 1, '2023-08-08 16:47:00', '2023-08-09 00:47:00', '2', 2),
(8, 4, 1, '2023-08-09 08:17:00', '2023-08-09 16:17:00', '2', 2),
(9, 4, 1, '2023-08-14 06:30:00', '2023-08-14 14:30:00', '2', 2),
(11, 4, 1, '2023-08-15 02:01:00', '2023-08-15 10:01:00', '2', 2),
(12, 4, 1, '2023-08-15 10:11:43', '2023-08-15 11:11:43', '2', 2),
(13, 4, 1, '2023-08-15 12:30:00', '2023-08-15 12:30:00', '2', 2),
(14, 5, 1, '2023-08-15 12:38:00', '2023-08-15 15:30:00', '2', 2),
(15, 5, 1, '2023-08-15 15:35:00', '2023-08-15 15:37:00', '2', 2),
(17, 4, 1, '2023-08-16 03:14:00', '2023-08-16 11:14:00', '2', 2),
(18, 5, 1, '2023-08-17 15:37:00', '2023-08-17 23:37:00', '2', 2),
(19, 9, 1, '2023-08-18 05:31:00', '2023-08-18 05:50:00', '2', 2);

--
-- Trigger `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `expired` AFTER INSERT ON `tbl_peminjaman` FOR EACH ROW BEGIN
    IF NOW() > NEW.end_time THEN
        UPDATE tbl_peminjaman
        SET status_masuk = 2
        WHERE id_peminjaman = NEW.id_peminjaman;
    END IF;
END
$$
DELIMITER ;

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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `id_biodata`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', 1),
(2, 'fikri29', '440273bc38a7df78cd9d1fa0693f09ab', '1', 3),
(3, 'marno', '7b7330311530ad2d7f0a401b6316aefa', '3', 4),
(4, 'isran', '877f57339293fd4acc2032740e973240', '3', 5),
(6, 'irwan', 'b360089e48b62d69c6c80fa1b5ef024d', '2', 7),
(7, 'nanda', '859a37720c27b9f70e11b79bab9318fe', '3', 8),
(8, 'minarti', '67dd3ea1f2ec73d9dc1aecad5790a64e', '3', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary_data`
--

CREATE TABLE `temporary_data` (
  `id` int(11) NOT NULL,
  `rfid_data` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temporary_data`
--

INSERT INTO `temporary_data` (`id`, `rfid_data`, `timestamp`) VALUES
(61, '3014B91A', '2023-08-18 05:58:04'),
(62, '71365226', '2023-08-18 05:58:14'),
(63, '9028C120', '2023-08-18 05:59:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mode_rfid`
--
ALTER TABLE `mode_rfid`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `temporary_data`
--
ALTER TABLE `temporary_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mode_rfid`
--
ALTER TABLE `mode_rfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_laboratorium`
--
ALTER TABLE `tbl_laboratorium`
  MODIFY `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_mst_prodi`
--
ALTER TABLE `tbl_mst_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `temporary_data`
--
ALTER TABLE `temporary_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
