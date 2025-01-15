-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jan 2025 pada 20.03
-- Versi server: 10.6.20-MariaDB-cll-lve
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zjxtorpv_472634`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'superadmin', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `nama_file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_tempat`, `nama_file`) VALUES
(12, 7, '2165742861.jpeg'),
(13, 8, '1284376405.jpeg'),
(14, 9, '3124010322.jpeg'),
(15, 10, '4199700565.jpeg'),
(16, 11, '1468275158.jpeg'),
(17, 12, '122259557.jpeg'),
(18, 13, '567969467.jpeg'),
(19, 14, '264376970.jpeg'),
(20, 15, '1238648479.jpeg'),
(21, 4, '3965248839.jpeg'),
(22, 5, '3655641192.jpeg'),
(23, 16, '525411578.png'),
(24, 17, '3781003458.png'),
(25, 18, '2852757600.png'),
(26, 19, '707455415.png'),
(27, 20, '3672822146.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `melakukan`
--

CREATE TABLE `melakukan` (
  `id_melakukan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `melakukan`
--

INSERT INTO `melakukan` (`id_melakukan`, `id_user`, `id_pesanan`) VALUES
(17, 1, 21),
(18, 1, 22),
(19, 1, 23),
(20, 1, 24),
(21, 1, 25),
(22, 1, 26),
(23, 1, 27),
(24, 1, 28),
(25, 1, 29),
(26, 1, 30),
(27, 1, 31),
(28, 1, 32),
(29, 1, 33),
(30, 3, 34),
(31, 3, 35),
(32, 3, 36),
(33, 3, 37),
(34, 2, 38),
(35, 2, 39),
(36, 2, 40),
(37, 3, 41),
(38, 3, 42),
(39, 2, 43),
(40, 2, 44),
(41, 3, 45),
(42, 3, 46),
(43, 2, 47),
(44, 3, 48),
(45, 3, 49),
(46, 3, 50),
(47, 4, 51),
(48, 5, 52);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(19, 5, 'Iced Caramel Latte', 35000),
(25, 7, 'kopi juria asli', 45000),
(26, 7, 'kopi susu', 28000),
(27, 7, 'pisang goreng', 23000),
(28, 4, 'kopi arabika', 35000),
(29, 7, 'iced late', 25000),
(30, 7, 'mineral water', 15000),
(31, 7, 'chiken katsudon', 40000),
(32, 7, 'original churt', 20000),
(33, 7, 'es kopi', 27000),
(34, 7, 'cokles late', 29000),
(35, 7, 'es gren sabu late', 18000),
(36, 8, 'iced late', 25000),
(37, 8, 'es marie raget', 23000),
(38, 8, 'capucino', 25000),
(39, 8, 'es gren sabu late', 25000),
(40, 8, 'kopi susu', 20000),
(41, 8, 'kopi arabika', 30000),
(42, 8, 'kopi susu jahe', 18000),
(43, 9, 'meatologi', 79000),
(44, 9, 'napoleon', 59000),
(45, 9, 'picate', 89000),
(46, 9, 'choco berry', 33000),
(47, 9, 'cokies crumbs', 33000),
(48, 9, 'iced rugal dolce', 23000),
(49, 9, 'baileys frapz', 32000),
(50, 9, 'afocado frapz', 35000),
(51, 9, 'mutella frapz', 32000),
(52, 9, 'kopi arabika', 38000),
(53, 10, 'tuna salade', 39000),
(54, 10, 'tuna croissant', 49000),
(55, 10, 'royale sandwich', 49000),
(56, 10, 'spicy sambal', 56000),
(57, 10, 'beef crema', 40000),
(58, 10, 'lichee punch', 24000),
(59, 10, 'yuzu punvh', 25000),
(60, 10, 'italyan soda mango', 24000),
(61, 10, 'avocado', 23000),
(62, 10, 'kopi arabika', 27000),
(63, 11, 'nutela kraje', 35000),
(64, 11, 'buter bits', 35000),
(65, 11, 'munkie frappe', 29000),
(66, 11, 'carisbean', 35000),
(67, 11, 'iced rugal dolce', 23000),
(68, 11, 'iced late', 24000),
(69, 11, 'italyan soda mango', 35000),
(70, 11, 'es gren sabu late', 23000),
(71, 11, 'pisang goreng', 20000),
(72, 11, 'pisang molen keju', 23000),
(73, 12, 'kopi susu', 25000),
(74, 12, 'kopi susu jahe', 27000),
(75, 12, 'kopi arabika', 27000),
(76, 12, 'es gren sabu late', 29000),
(77, 12, 'es marie raget', 29000),
(78, 12, 'avocado', 23000),
(79, 12, 'iced late', 26000),
(80, 12, 'iced rugal dolce', 29000),
(81, 12, 'italyan soda mango', 34000),
(82, 12, 'munkie frappe', 30000),
(83, 13, 'es gren sabu late', 29000),
(84, 13, 'italyan soda mango', 30000),
(85, 13, 'es marie raget', 23000),
(86, 13, 'iced late', 26000),
(87, 13, 'iced rugal dolce', 27000),
(88, 13, 'afocado frapz', 25000),
(89, 13, 'cokies crumbs', 27000),
(90, 13, 'carisbean', 29000),
(91, 13, 'capucino', 26000),
(92, 13, 'cokles late', 27000),
(93, 14, 'italyan soda mango', 32000),
(94, 14, 'iced rugal dolce', 28000),
(95, 14, 'iced late', 27000),
(96, 14, 'es gren sabu late', 25000),
(97, 14, 'kopi arabika', 27000),
(98, 14, 'afocado frapz', 28000),
(99, 14, 'avocado', 21000),
(100, 14, 'es marie raget', 25000),
(101, 14, 'cokies crumbs', 30000),
(102, 14, 'chiken katsudon', 32000),
(103, 15, 'kopi arabika', 29000),
(104, 15, 'italyan soda mango', 28000),
(105, 15, 'iced late', 29000),
(106, 15, 'es gren sabu late', 25000),
(107, 15, 'iced rugal dolce', 27000),
(108, 15, 'es marie raget', 23000),
(109, 15, 'cokies crumbs', 27000),
(110, 15, 'carisbean', 25000),
(111, 15, 'afocado frapz', 29000),
(112, 15, 'choco berry', 28000),
(113, 15, 'chiken katsudon', 32000),
(114, 19, 'picate', 25000),
(115, 19, 'pop ice', 27000),
(116, 19, 'cokies crumbs', 27000),
(117, 19, 'afocado frapz', 29000),
(118, 19, 'es marie raget', 28000),
(119, 19, 'carisbean', 30000),
(120, 19, 'es gren sabu late', 29000),
(121, 19, 'spicy sambal', 36000),
(122, 19, 'kopi arabika', 30000),
(123, 19, 'kopi susu', 23000),
(124, 19, 'kopi susu', 25000),
(125, 18, 'afocado frapz', 28000),
(126, 18, 'kopi susu', 25000),
(127, 18, 'kopi arabika', 30000),
(128, 18, 'es gren sabu late', 29000),
(129, 18, 'es marie raget', 30000),
(130, 18, 'cokies crumbs', 29000),
(131, 18, 'capucino', 25000),
(132, 18, 'chiken katsudon', 27000),
(133, 18, 'pisang molen keju', 23000),
(134, 18, 'spicy sambal', 34000),
(135, 17, 'Roti kambi', 35000),
(136, 17, 'chicken', 23000),
(137, 17, 'potato wiools', 22000),
(138, 17, 'dimsum', 23000),
(139, 17, 'frisd banana', 34000),
(140, 17, 'ubu chips', 20000),
(141, 17, 'chuross', 20000),
(142, 17, 'prench fries', 15000),
(143, 17, 'kopi arabika', 30000),
(144, 17, 'afocado frapz', 25000),
(145, 17, 'es gren sabu late', 29000),
(146, 17, 'es marie raget', 27000),
(147, 16, 'd', 23000),
(148, 16, 'dumplini', 24000),
(149, 16, 'Roti kambi', 30000),
(150, 16, 'mix platior', 29000),
(151, 16, 'carisbean', 34000),
(152, 16, 'kopi arabika', 30000),
(153, 16, 'kopi susu jahe', 23000),
(154, 16, 'es gren sabu late', 25000),
(155, 16, 'es marie raget', 25000),
(156, 16, 'cokies crumbs', 32000),
(157, 16, 'choco berry', 32000),
(158, 8, 'cokies crumbs', 29000),
(159, 8, 'carisbean', 23000),
(160, 8, 'choco berry', 27000),
(161, 8, 'cokles late', 25000),
(162, 8, 'chiken katsudon', 28000),
(163, 20, 'cokies crumbs', 27000),
(164, 20, 'carisbean', 23000),
(165, 20, 'chiken katsudon', 26000),
(166, 20, 'choco berry', 25000),
(167, 20, 'cokles late', 23000),
(168, 20, 'capucino', 21000),
(169, 20, 'es gren sabu late', 24000),
(170, 20, 'avocado', 21000),
(171, 20, 'afocado frapz', 25000),
(172, 20, 'spicy sambal', 30000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_menu`, `id_tempat`, `total_harga`, `jumlah_menu`, `waktu_pesanan`, `status_pesanan`) VALUES
(21, 19, 5, 70000, 2, '2024-12-26 22:35:08', 'Diterima'),
(22, 13, 5, 50000, 1, '2024-12-26 22:35:38', 'Diterima'),
(23, 12, 5, 45000, 1, '2024-12-26 22:35:44', 'Diterima'),
(24, 12, 5, -180000, -4, '2024-12-26 23:30:15', 'Diterima'),
(25, 15, 5, -70000, -2, '2024-12-26 23:37:47', 'Diproses'),
(26, 17, 5, -150000, -5, '2024-12-26 23:45:14', 'Diproses'),
(27, 13, 5, -100000, -2, '2024-12-26 23:49:01', 'Diproses'),
(28, 17, 5, -30000, -1, '2024-12-27 00:13:06', 'Ditolak'),
(29, 19, 5, -35000, -1, '2024-12-27 00:22:14', 'Diproses'),
(30, 18, 5, -80000, -2, '2024-12-27 00:25:06', 'Diterima'),
(31, 12, 5, -135000, -3, '2024-12-27 10:46:47', 'Diproses'),
(32, 8, 4, 40000, 2, '2024-12-27 12:11:02', 'Diterima'),
(33, 11, 4, 45000, 2, '2024-12-27 12:11:23', 'Diterima'),
(34, 8, 4, -40000, -2, '2024-12-27 13:13:42', 'Diterima'),
(35, 10, 4, -50000, -2, '2024-12-27 13:14:05', 'Diterima'),
(36, 15, 5, -35000, -1, '2024-12-27 13:16:52', 'Diproses'),
(37, 17, 5, -60000, -2, '2024-12-27 13:17:32', 'Diproses'),
(38, 11, 4, -15000, -1, '2024-12-28 10:31:25', 'Diterima'),
(39, 6, 4, -60000, -2, '2024-12-28 11:17:19', 'Diterima'),
(40, 19, 5, -70000, -2, '2024-12-28 12:25:09', 'Diterima'),
(41, 13, 5, -50000, -1, '2024-12-29 12:42:06', 'Diproses'),
(42, 19, 5, 0, 0, '2024-12-29 12:53:29', 'Diproses'),
(43, 12, 5, -90000, -2, '2025-01-06 23:09:48', 'Diterima'),
(44, 7, 4, -56000, -2, '2025-01-06 23:13:36', 'Ditolak'),
(45, 12, 5, 90000, 2, '2025-01-08 09:05:27', 'Diterima'),
(46, 10, 4, 50000, 3, '2025-01-08 10:39:27', 'Diproses'),
(47, 12, 5, 90000, 2, '2025-01-08 22:40:37', 'Diproses'),
(48, 25, 7, 90000, 2, '2025-01-09 07:12:40', 'Diproses'),
(49, 93, 14, 64000, 2, '2025-01-10 15:16:41', 'Diterima'),
(50, 42, 8, 0, 1, '2025-01-12 12:56:58', 'Diterima'),
(51, 56, 10, 168000, 3, '2025-01-14 15:50:12', 'Diterima'),
(52, 152, 16, 90000, 3, '2025-01-14 16:20:24', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kafe`
--

CREATE TABLE `tempat_kafe` (
  `id_tempat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tempat` varchar(50) DEFAULT NULL,
  `nama_jalan` varchar(50) DEFAULT NULL,
  `peta_lokasi` text DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tempat_kafe`
--

INSERT INTO `tempat_kafe` (`id_tempat`, `id_user`, `nama_tempat`, `nama_jalan`, `peta_lokasi`, `kontak`) VALUES
(4, 6, 'Cafe Teduh Kupang', 'Jl. Adisucipto, Penfui', '-10.178908_123.670858', '081339451234'),
(5, 6, 'Lokita Cafe &amp; Resto', 'Jl. Thamrin No.54', '-10.160345_123.617658', '08115785678'),
(7, 6, 'my kopi-o', 'jln lantera', '-10.160345_123.617658', '082146249336'),
(8, 6, 'kopi kembo', 'jl trusan timor raaya', '-10.160345_123.617658', '0812-1910-1940'),
(9, 6, 'sombra coffe', 'jl lalamentik no 95', '-10.160345_123.617658', '0812-8069-5113'),
(10, 6, 'royal caffee', 'jl lantera', '-10.160345_123.617658', '082142335402'),
(11, 6, 'lacaja coffe', 'Jl. Adi Sucipto, Penfui', '-10.160345_123.617658', '0812-2474-2409'),
(12, 6, 'bakery cafe', 'jl antarnusa', '-10.160345_123.617658', '081237339086'),
(13, 6, 'capital caffe', 'Jl. Bund. PU No.106', '-10.178908_123.670858', '0812-3991-1919'),
(14, 6, 'kopi amabie', 'jl adi sucipto', '-10.178908_123.670858', '082335428097'),
(15, 6, 'paradox caffee', 'Jl. W.J. Lalamentik No.123, Oebufu', '-10.178908_123.670858', '0812-3919-9995'),
(16, 6, 'Jaâ€™O Coffee', 'Jl. Frans Seda No.105A, Fatululi,', '-10.178908_123.670858', '083263571208'),
(17, 6, 'kedai kopi petir', 'jl.Fatululi, Kec. Oebobo,', '-10.178908_123.670858', '0813-3911-8347'),
(18, 6, 'BILâ€™s Resto', 'jl.Bukit Intan Lestari, Alak, Kec. Alak', '-10.178908_123.670858', '0811-3821-133'),
(19, 6, 'Kampung Solor caffe', 'Jalan Siliwangi, Kelurahan Kampung Solor, Kecamata', '-10.178908_123.670858', '0811-3821-133'),
(20, 6, 'Tebing Bar And Cafe', 'jl. Alak, Kupang, Kota Kupang.', '-10.20282_123.53117', '081233331115');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `no_telpon` char(13) DEFAULT NULL,
  `status` enum('admin','pembeli','','') NOT NULL DEFAULT 'pembeli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `no_telpon`, `status`) VALUES
(1, 'arlan', '$2y$10$b7cWFMRhO7QX8WtQF7.1Ee6KM8X/vfbHLLk/TplFcyUqAfOUTslsi', '08113827421', 'pembeli'),
(2, 'artoselji', '$2y$10$lbhqRgbrNpndn0xzPbnrQeHByOfrtXAxBT0zznfDzov4Ihy.wxZxC', '0821345671', 'pembeli'),
(3, 'alfintasman', '$2y$10$YzgvuFQPslPU/zIu64BnP.MQTMLovxPUIqDYVPzfpsfw5CBH0ExFy', '082146208360', 'pembeli'),
(4, 'paul', '$2y$10$8e8UHE2DgmyVs5lFBlSLpOoyXIU.dhIZwFcaK20qttXZ4q3FmcPuG', '082145339207', 'pembeli'),
(5, 'kamilus', '$2y$10$9snZ9OaWZeJ9POykj57/BuaZSXPePsk2tmKY.Y5g8TnNlW0ZOgWci', '083456798023', 'pembeli'),
(6, 'admin', '$2y$10$a0Z6ovqcSbtJxjF9oAMVtOAzNCtnjPXxRivcVxJt9gzWDCxMvnvS6', '082111111111', 'admin'),
(7, 'ocdcafe', '$2y$10$Db3XV2akpnLSKZOjm5xJFe1Lk4VpMT3A/ms6FtwUGNQvmkDjev6Y.', '082111111111', 'admin'),
(8, 'putri', '$2y$10$kkxx2O7H27sxM4ULdUsuH.JAQhEH8pP02hTpNZ2BZMDyO5QbAxnge', '082111111111', 'pembeli');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `waktu_operasional`
--

INSERT INTO `waktu_operasional` (`id_waktu_operasional`, `id_tempat`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(6, 4, 'Senin', '08:00:00', '21:00:00'),
(7, 4, 'Selasa', '08:00:00', '21:00:00'),
(8, 4, 'Rabu', '08:00:00', '21:00:00'),
(9, 5, 'Senin', '08:00:00', '20:00:00'),
(10, 5, 'Selasa', '08:00:00', '23:00:00'),
(11, 5, 'Rabu', '08:30:00', '21:00:00'),
(12, 4, 'Kamis', '08:00:00', '10:00:00'),
(13, 5, 'Kamis', '09:30:00', '23:30:00'),
(17, 7, 'Senin', '10:00:00', '09:30:00'),
(18, 7, 'Selasa', '10:00:00', '09:30:00'),
(19, 7, 'Rabu', '10:00:00', '09:30:00'),
(21, 7, 'Jumat', '10:00:00', '09:30:00'),
(22, 5, 'Sabtu', '09:30:00', '23:30:00'),
(23, 5, 'Minggu', '07:00:00', '00:00:00'),
(24, 7, 'Sabtu', '10:00:00', '23:00:00'),
(25, 7, 'Minggu', '08:00:00', '00:00:00'),
(26, 8, 'Jumat', '08:30:00', '23:00:00'),
(27, 8, 'Sabtu', '08:00:00', '12:00:00'),
(28, 8, 'Minggu', '08:00:00', '12:00:00'),
(29, 9, 'Senin', '07:00:00', '22:00:00'),
(30, 9, 'Selasa', '07:00:00', '22:00:00'),
(31, 9, 'Rabu', '07:00:00', '22:00:00'),
(32, 9, 'Kamis', '07:00:00', '22:00:00'),
(33, 9, 'Jumat', '07:00:00', '22:00:00'),
(34, 9, 'Sabtu', '07:00:00', '23:00:00'),
(35, 9, 'Minggu', '10:00:00', '23:00:00'),
(36, 10, 'Senin', '08:00:00', '22:00:00'),
(37, 10, 'Selasa', '08:00:00', '22:00:00'),
(38, 10, 'Rabu', '08:00:00', '22:00:00'),
(39, 10, 'Kamis', '08:00:00', '22:00:00'),
(40, 10, 'Jumat', '08:00:00', '22:00:00'),
(41, 10, 'Sabtu', '07:00:00', '23:30:00'),
(42, 10, 'Minggu', '07:00:00', '23:30:00'),
(43, 11, 'Senin', '10:00:00', '23:00:00'),
(44, 11, 'Selasa', '10:00:00', '23:00:00'),
(45, 11, 'Rabu', '10:00:00', '23:00:00'),
(46, 11, 'Kamis', '10:00:00', '23:00:00'),
(47, 11, 'Jumat', '10:00:00', '23:00:00'),
(48, 11, 'Sabtu', '10:00:00', '00:00:00'),
(49, 11, 'Minggu', '14:00:00', '00:00:00'),
(50, 12, 'Senin', '09:00:00', '21:00:00'),
(51, 12, 'Selasa', '09:00:00', '21:00:00'),
(52, 12, 'Rabu', '09:00:00', '21:00:00'),
(53, 12, 'Kamis', '09:00:00', '21:00:00'),
(54, 12, 'Jumat', '09:00:00', '21:00:00'),
(55, 12, 'Sabtu', '07:00:00', '23:00:00'),
(56, 12, 'Minggu', '07:00:00', '23:00:00'),
(57, 13, 'Senin', '09:00:00', '22:00:00'),
(58, 13, 'Selasa', '09:00:00', '22:00:00'),
(59, 13, 'Rabu', '09:00:00', '22:00:00'),
(60, 13, 'Kamis', '09:00:00', '22:00:00'),
(61, 13, 'Jumat', '09:00:00', '22:00:00'),
(62, 13, 'Sabtu', '08:00:00', '02:00:00'),
(63, 13, 'Minggu', '08:00:00', '02:00:00'),
(64, 14, 'Senin', '10:00:00', '21:00:00'),
(65, 14, 'Selasa', '10:00:00', '21:00:00'),
(66, 14, 'Rabu', '10:00:00', '21:00:00'),
(67, 14, 'Kamis', '10:00:00', '21:00:00'),
(68, 14, 'Jumat', '09:00:00', '22:00:00'),
(69, 14, 'Sabtu', '09:00:00', '22:00:00'),
(70, 14, 'Minggu', '08:30:00', '23:00:00'),
(71, 15, 'Senin', '10:00:00', '23:00:00'),
(72, 15, 'Selasa', '10:00:00', '23:00:00'),
(73, 15, 'Rabu', '10:00:00', '23:00:00'),
(74, 15, 'Kamis', '10:00:00', '23:00:00'),
(75, 15, 'Jumat', '10:00:00', '00:00:00'),
(76, 15, 'Sabtu', '10:00:00', '00:00:00'),
(77, 15, 'Minggu', '10:00:00', '23:00:00'),
(78, 19, 'Senin', '17:00:00', '19:30:00'),
(79, 19, 'Selasa', '17:00:00', '19:30:00'),
(80, 19, 'Rabu', '17:00:00', '19:30:00'),
(81, 19, 'Kamis', '17:00:00', '19:30:00'),
(82, 19, 'Jumat', '17:00:00', '19:30:00'),
(83, 19, 'Sabtu', '17:00:00', '02:00:00'),
(84, 19, 'Minggu', '17:00:00', '02:00:00'),
(85, 18, 'Senin', '06:00:00', '23:00:00'),
(86, 18, 'Selasa', '06:00:00', '23:00:00'),
(87, 18, 'Rabu', '06:00:00', '23:00:00'),
(88, 18, 'Kamis', '06:00:00', '23:00:00'),
(89, 18, 'Jumat', '06:00:00', '02:00:00'),
(90, 18, 'Sabtu', '06:00:00', '02:00:00'),
(91, 18, 'Minggu', '06:00:00', '02:00:00'),
(92, 17, 'Senin', '09:00:00', '23:00:00'),
(93, 17, 'Selasa', '09:00:00', '23:00:00'),
(94, 17, 'Rabu', '09:00:00', '23:00:00'),
(95, 17, 'Kamis', '09:00:00', '23:00:00'),
(96, 17, 'Jumat', '09:00:00', '23:00:00'),
(97, 17, 'Sabtu', '09:00:00', '23:00:00'),
(98, 17, 'Minggu', '09:00:00', '23:00:00'),
(99, 16, 'Senin', '09:00:00', '23:00:00'),
(100, 16, 'Selasa', '09:00:00', '23:00:00'),
(101, 16, 'Rabu', '09:00:00', '23:00:00'),
(102, 16, 'Kamis', '09:00:00', '23:00:00'),
(103, 16, 'Jumat', '09:00:00', '23:00:00'),
(104, 16, 'Sabtu', '09:00:00', '23:00:00'),
(105, 16, 'Minggu', '09:00:00', '23:00:00'),
(106, 20, 'Senin', '16:00:00', '22:00:00'),
(107, 20, 'Selasa', '16:00:00', '22:00:00'),
(108, 20, 'Rabu', '16:00:00', '22:00:00'),
(109, 20, 'Kamis', '16:00:00', '22:00:00'),
(110, 20, 'Jumat', '16:00:00', '22:00:00'),
(111, 20, 'Sabtu', '16:00:00', '22:00:00'),
(112, 20, 'Minggu', '16:00:00', '22:00:00');

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
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `melakukan`
--
ALTER TABLE `melakukan`
  MODIFY `id_melakukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tempat_kafe`
--
ALTER TABLE `tempat_kafe`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  MODIFY `id_waktu_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
-- Ketidakleluasaan untuk tabel `tempat_kafe`
--
ALTER TABLE `tempat_kafe`
  ADD CONSTRAINT `tempat_kafe_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  ADD CONSTRAINT `waktu_operasional_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kafe` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
