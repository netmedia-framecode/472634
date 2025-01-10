-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jan 2025 pada 04.40
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_wisata_kafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `nama_file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_tempat`, `nama_file`) VALUES
(6, 4, '3888189282.jpeg'),
(7, 5, '2192978894.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `melakukan`
--

CREATE TABLE `melakukan` (
  `id_melakukan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `melakukan`
--

INSERT INTO `melakukan` (`id_melakukan`, `id_user`, `id_pesanan`) VALUES
(17, 1, 21),
(18, 1, 22),
(19, 1, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_tempat`, `nama_menu`, `harga`) VALUES
(6, 4, 'Nasi Goreng Teduh Spesial', 30000),
(7, 4, 'Mie Kuah Ayam Kampung', 28000),
(8, 4, 'Pisang Goreng Teduh', 20000),
(9, 4, 'Roti Bakar Cokelat Keju', 18000),
(10, 4, 'Kopi Kupang Signature', 25000),
(11, 4, 'Es Teh Lemon', 15000),
(12, 5, 'Ayam Bakar Madu', 45000),
(13, 5, 'Spaghetti Carbonara', 50000),
(14, 5, 'Lokita Spring Rolls', 25000),
(15, 5, 'Caesar Salad', 35000),
(16, 5, 'Chocolate Lava Cake', 35000),
(17, 5, 'Es Krim Gelato', 30000),
(18, 5, 'Mocktail Berry Bliss', 40000),
(19, 5, 'Iced Caramel Latte', 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `jumlah_menu` int(11) DEFAULT NULL,
  `waktu_pesanan` datetime DEFAULT current_timestamp(),
  `status_pesanan` enum('Menunggu','Diproses','Diterima','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_menu`, `id_tempat`, `total_harga`, `jumlah_menu`, `waktu_pesanan`, `status_pesanan`) VALUES
(21, 19, 5, 70000, 2, '2024-12-26 22:35:08', 'Diterima'),
(22, 13, 5, 50000, 1, '2024-12-26 22:35:38', 'Diterima'),
(23, 12, 5, 45000, 1, '2024-12-26 22:35:44', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kafe`
--

CREATE TABLE `tempat_kafe` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(50) DEFAULT NULL,
  `nama_jalan` varchar(50) DEFAULT NULL,
  `peta_lokasi` text DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_kafe`
--

INSERT INTO `tempat_kafe` (`id_tempat`, `nama_tempat`, `nama_jalan`, `peta_lokasi`, `kontak`) VALUES
(4, 'Cafe Teduh Kupang', 'Jl. Adisucipto, Penfui', '-10.178908_123.670858', '081339451234'),
(5, 'Lokita Cafe &amp; Resto', 'Jl. Thamrin No.54', '-10.160345_123.617658', '08115785678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `no_telpon` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `no_telpon`) VALUES
(1, 'arlan', '$2y$10$b7cWFMRhO7QX8WtQF7.1Ee6KM8X/vfbHLLk/TplFcyUqAfOUTslsi', '08113827421');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_operasional`
--

CREATE TABLE `waktu_operasional` (
  `id_waktu_operasional` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `hari` varchar(6) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu_operasional`
--

INSERT INTO `waktu_operasional` (`id_waktu_operasional`, `id_tempat`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(6, 4, 'Senin', '08:00:00', '21:00:00'),
(7, 4, 'Selasa', '08:00:00', '21:00:00'),
(8, 4, 'Rabu', '08:00:00', '21:00:00'),
(9, 5, 'Senin', '08:00:00', '20:00:00'),
(10, 5, 'Selasa', '08:00:00', '23:00:00'),
(11, 5, 'Rabu', '08:30:00', '21:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `melakukan`
--
ALTER TABLE `melakukan`
  ADD PRIMARY KEY (`id_melakukan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `tempat_kafe`
--
ALTER TABLE `tempat_kafe`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  ADD PRIMARY KEY (`id_waktu_operasional`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `melakukan`
--
ALTER TABLE `melakukan`
  MODIFY `id_melakukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tempat_kafe`
--
ALTER TABLE `tempat_kafe`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  MODIFY `id_waktu_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kafe` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `melakukan`
--
ALTER TABLE `melakukan`
  ADD CONSTRAINT `melakukan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `melakukan_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kafe` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kafe` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  ADD CONSTRAINT `waktu_operasional_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kafe` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
