-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jan 2025 pada 22.35
-- Versi server: 10.6.20-MariaDB-cll-lve
-- Versi PHP: 8.3.15

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
(17, 12, '122259557.jpeg'),
(20, 15, '1238648479.jpeg'),
(21, 4, '3965248839.jpeg'),
(22, 5, '3655641192.jpeg'),
(26, 19, '707455415.png'),
(28, 21, '1017112869.png'),
(29, 22, '3185096064.jpeg'),
(31, 22, '1628805883.jpeg'),
(32, 23, '4199700565.jpeg'),
(33, 23, '2178808523.jpeg'),
(34, 24, '2006342225.png'),
(35, 24, '1764701756.png'),
(36, 25, '2278741232.jpeg'),
(37, 25, '3881476386.png'),
(38, 25, '900935100.png'),
(39, 26, '2594749879.jpeg'),
(40, 26, '3373598652.png'),
(41, 26, '1108834161.png'),
(42, 26, '1116804963.png'),
(43, 27, '21407326.jpeg'),
(44, 27, '362766856.png'),
(45, 27, '946633059.png'),
(46, 28, '697692170.png'),
(47, 28, '977075734.png'),
(48, 28, '2727837895.png'),
(49, 29, '125301958.png'),
(50, 29, '2642339724.png'),
(51, 29, '4257431038.png'),
(52, 30, '622155796.png'),
(53, 30, '1438503087.png'),
(54, 30, '2799541913.png'),
(55, 30, '3597997602.png'),
(56, 31, '3708478002.png'),
(57, 31, '2586638576.png'),
(58, 31, '4259945256.png'),
(59, 31, '2369852307.png'),
(60, 32, '3964652365.png'),
(61, 32, '974530640.png'),
(62, 21, '3965248839.jpeg'),
(63, 33, '3965248839.jpeg');

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
(49, 2, 53),
(50, 3, 54),
(51, 3, 55),
(52, 3, 56),
(53, 3, 57),
(54, 3, 58),
(55, 3, 59),
(56, 3, 60),
(57, 2, 61),
(58, 2, 62),
(59, 1, 63),
(63, 1, 4),
(64, 1, 5),
(65, 1, 6),
(66, 1, 7),
(67, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `pajak` int(11) NOT NULL DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_tempat`, `nama_menu`, `harga`, `pajak`) VALUES
(6, 4, 'Nasi Goreng Teduh Spesial', 30000, 12),
(7, 4, 'Mie Kuah Ayam Kampung', 28000, 12),
(8, 4, 'Pisang Goreng Teduh', 20000, 12),
(9, 4, 'Roti Bakar Cokelat Keju', 18000, 12),
(10, 4, 'Kopi Kupang Signature', 25000, 12),
(11, 4, 'Es Teh Lemon', 15000, 12),
(12, 5, 'Ayam Bakar Madu', 45000, 12),
(13, 5, 'Spaghetti Carbonara', 50000, 12),
(14, 5, 'Lokita Spring Rolls', 25000, 12),
(15, 5, 'Caesar Salad', 35000, 12),
(16, 5, 'Chocolate Lava Cake', 35000, 12),
(17, 5, 'Es Krim Gelato', 30000, 12),
(18, 5, 'Mocktail Berry Bliss', 40000, 12),
(19, 5, 'Iced Caramel Latte', 35000, 12),
(28, 4, 'kopi arabika', 35000, 12),
(73, 12, 'kopi susu', 25000, 12),
(74, 12, 'kopi susu jahe', 27000, 12),
(75, 12, 'kopi arabika', 27000, 12),
(76, 12, 'es gren sabu late', 29000, 12),
(77, 12, 'es marie raget', 29000, 12),
(78, 12, 'avocado', 23000, 12),
(79, 12, 'iced late', 26000, 12),
(80, 12, 'iced rugal dolce', 29000, 12),
(81, 12, 'italyan soda mango', 34000, 12),
(82, 12, 'munkie frappe', 30000, 12),
(103, 15, 'kopi arabika', 29000, 12),
(104, 15, 'italyan soda mango', 28000, 12),
(105, 15, 'iced late', 29000, 12),
(106, 15, 'es gren sabu late', 25000, 12),
(107, 15, 'iced rugal dolce', 27000, 12),
(108, 15, 'es marie raget', 23000, 12),
(109, 15, 'cokies crumbs', 27000, 12),
(110, 15, 'carisbean', 25000, 12),
(111, 15, 'afocado frapz', 29000, 12),
(112, 15, 'choco berry', 28000, 12),
(113, 15, 'chiken katsudon', 32000, 12),
(114, 19, 'picate', 25000, 12),
(115, 19, 'pop ice', 27000, 12),
(116, 19, 'cokies crumbs', 27000, 12),
(117, 19, 'afocado frapz', 29000, 12),
(118, 19, 'es marie raget', 28000, 12),
(119, 19, 'carisbean', 30000, 12),
(120, 19, 'es gren sabu late', 29000, 12),
(121, 19, 'spicy sambal', 36000, 12),
(122, 19, 'kopi arabika', 30000, 12),
(123, 19, 'kopi susu', 23000, 12),
(124, 19, 'kopi susu', 25000, 12),
(173, 21, 'cokies crumbs', 26000, 12),
(174, 21, 'es gren sabu late', 24000, 12),
(175, 21, 'es marie raget', 27000, 12),
(176, 21, 'afocado frapz', 27000, 12),
(177, 21, 'carisbean', 30000, 12),
(178, 21, 'spicy sambal', 32000, 12),
(179, 21, 'picate', 30000, 12),
(180, 21, 'pop ice', 22000, 12),
(181, 21, 'potato wiools', 29000, 12),
(182, 21, 'prench fries', 26000, 12),
(183, 22, 'afocado frapz', 24000, 12),
(184, 22, 'avocado', 23000, 12),
(185, 22, 'cokies crumbs', 30000, 12),
(186, 22, 'carisbean', 29000, 12),
(187, 22, 'chiken katsudon', 27000, 12),
(188, 22, 'choco berry', 26000, 12),
(189, 22, 'cokles late', 24000, 12),
(190, 22, 'es gren sabu late', 29000, 12),
(191, 22, 'es marie raget', 27000, 12),
(192, 22, 'kopi arabika', 30000, 12),
(193, 23, 'kopi susu jahe', 23000, 12),
(194, 23, 'kopi arabika', 30000, 12),
(195, 23, 'es gren sabu late', 25000, 12),
(196, 23, 'es marie raget', 25000, 12),
(197, 23, 'afocado frapz', 23000, 12),
(198, 23, 'cokies crumbs', 27000, 12),
(199, 23, 'carisbean', 28000, 12),
(200, 23, 'chiken katsudon', 29000, 12),
(201, 23, 'cokles late', 24000, 12),
(202, 23, 'capucino', 21000, 12),
(203, 24, 'cokies crumbs', 26000, 12),
(204, 24, 'carisbean', 27000, 12),
(205, 24, 'chiken katsudon', 25000, 12),
(206, 24, 'choco berry', 23000, 12),
(207, 24, 'cokles late', 21000, 12),
(208, 24, 'capucino', 19000, 12),
(209, 24, 'es gren sabu late', 27000, 12),
(210, 24, 'es marie raget', 27000, 12),
(211, 24, 'afocado frapz', 28000, 12),
(212, 24, 'spicy sambal', 34000, 12),
(213, 25, 'cokies crumbs', 23000, 12),
(214, 25, 'carisbean', 29000, 12),
(215, 25, 'chiken katsudon', 25000, 12),
(216, 25, 'choco berry', 27000, 12),
(217, 25, 'cokles late', 23000, 12),
(218, 25, 'capucino', 21000, 12),
(219, 25, 'es gren sabu late', 27000, 12),
(220, 25, 'es marie raget', 27000, 12),
(221, 25, 'spicy sambal', 30000, 12),
(222, 25, 'picate', 30000, 12),
(223, 25, 'potato wiools', 26000, 12),
(224, 26, 'es gren sabu late', 25000, 12),
(225, 26, 'es marie raget', 25000, 12),
(226, 26, 'picate', 27000, 12),
(227, 26, 'potato wiools', 29000, 12),
(228, 26, 'pisang molen keju', 24000, 12),
(229, 26, 'pop ice', 21000, 12),
(230, 26, 'prench fries', 26000, 12),
(231, 26, 'cokies crumbs', 29000, 12),
(232, 26, 'carisbean', 26000, 12),
(233, 26, 'afocado frapz', 24000, 12),
(234, 27, 'afocado frapz', 24000, 12),
(235, 27, 'spicy sambal', 29000, 12),
(236, 27, 'pop ice', 25000, 12),
(237, 27, 'es gren sabu late', 26000, 12),
(238, 27, 'es marie raget', 27000, 12),
(239, 27, 'kopi arabika', 30000, 12),
(240, 27, 'kopi susu jahe', 25000, 12),
(241, 27, 'avocado', 21000, 12),
(242, 27, 'cokies crumbs', 26000, 12),
(243, 27, 'kopi susu', 23000, 12),
(244, 28, 'cokies crumbs', 27000, 12),
(245, 28, 'carisbean', 26000, 12),
(246, 28, 'chiken katsudon', 27000, 12),
(247, 28, 'choco berry', 24000, 12),
(248, 28, 'kopi arabika', 30000, 12),
(249, 28, 'cokles late', 25000, 12),
(250, 28, 'capucino', 21000, 12),
(251, 28, 'afocado frapz', 22000, 12),
(252, 28, 'avocado', 20000, 12),
(253, 28, 'kopi susu jahe', 23000, 12),
(254, 29, 'kopi arabika', 23000, 12),
(255, 29, 'kopi susu jahe', 23000, 12),
(256, 29, 'picate', 24000, 12),
(257, 29, 'pop ice', 26000, 12),
(258, 29, 'potato wiools', 27000, 12),
(259, 29, 'prench fries', 24000, 12),
(260, 29, 'es gren sabu late', 26000, 12),
(261, 29, 'es marie raget', 26000, 12),
(262, 29, 'afocado frapz', 28000, 12),
(263, 29, 'avocado', 21000, 12),
(264, 29, 'kopi arabika', 30000, 12),
(265, 30, 'cokies crumbs', 27000, 12),
(266, 30, 'carisbean', 25000, 12),
(267, 30, 'chiken katsudon', 26000, 12),
(268, 30, 'choco berry', 27000, 12),
(269, 30, 'cokles late', 26000, 12),
(270, 30, 'capucino', 23000, 12),
(271, 30, 'pop ice', 21000, 12),
(272, 30, 'prench fries', 27000, 12),
(273, 30, 'prench fries', 26000, 12),
(274, 30, 'potato wiools', 29000, 12),
(275, 30, 'prench fries', 27000, 12),
(276, 31, 'cokies crumbs', 27000, 12),
(277, 31, 'carisbean', 24000, 12),
(278, 31, 'chiken katsudon', 28000, 12),
(279, 31, 'choco berry', 27000, 12),
(280, 31, 'cokles late', 23000, 12),
(281, 31, 'capucino', 23000, 12),
(282, 31, 'es gren sabu late', 29000, 12),
(283, 31, 'es marie raget', 25000, 12),
(284, 31, 'pop ice', 21000, 12),
(285, 31, 'prench fries', 29000, 12),
(286, 31, 'potato wiools', 28000, 12),
(287, 32, 'pop ice', 23000, 12),
(288, 32, 'prench fries', 27000, 12),
(289, 32, 'potato wiools', 27000, 12),
(290, 32, 'picate', 27000, 12),
(291, 32, 'cokies crumbs', 28000, 12),
(292, 32, 'carisbean', 26000, 12),
(293, 32, 'chiken katsudon', 29000, 12),
(294, 32, 'cokles late', 23000, 12),
(295, 32, 'choco berry', 23000, 12),
(296, 32, 'afocado frapz', 24000, 12),
(297, 33, 'cokies crumbs', 20000, 12);

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
  `status_pesanan` enum('Menunggu','Diproses','Diterima','Ditolak','Gagal') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_menu`, `id_tempat`, `total_harga`, `jumlah_menu`, `waktu_pesanan`, `status_pesanan`) VALUES
(4, 296, 32, 48000, 2, '2025-01-24 23:00:00', 'Gagal'),
(5, 281, 31, 46000, 2, '2025-01-24 23:00:37', 'Diterima'),
(6, 296, 32, 48000, 2, '2025-01-24 23:08:41', 'Gagal'),
(7, 297, 33, 40000, 2, '2025-01-24 23:20:38', 'Diproses'),
(8, 28, 4, 70000, 2, '2025-01-24 23:28:27', 'Diproses');

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
(4, 6, 'Cafe Teduh Kupang', 'Jl. Adisucipto, Penfui timur', '-10.178908_123.670858', '081339451234'),
(5, 6, 'Lokita Cafe &amp; Resto', 'Jl. Thamrin No.54', '-10.160345_123.617658', '08115785678'),
(12, 6, 'bakery cafe', 'jl antarnusa', '-10.160345_123.617658', '081237339086'),
(15, 6, 'paradox caffee', 'Jl. W.J. Lalamentik No.123, Oebufu', '-10.178908_123.670858', '0812-3919-9995'),
(19, 6, 'Kampung Solor caffe', 'Jalan Siliwangi, Kelurahan Kampung Solor, Kecamata', '-10.178908_123.670858', '0811-3821-133'),
(21, 9, 'kafe kikikaka', 'jl.Kayu Putih, Kec. Oebobo', '-10,16144_123,62301', '0852-9991-2554'),
(22, 10, 'my kopi-o', 'Jl. Samratulangi No.9b, Oesapa', '-10.14977_123.63153', '081138221888'),
(23, 12, 'royal caffee', 'Jl. Bund. PU Kelurahan No.10, Tuak Daun Merah, Kec', '-10.18621_123.60942', '081246615557'),
(24, 13, 'ja,o caffe', 'Jl. Frans Seda No.105A, Fatululi, Kec. Oebobo, Kot', '-10.16118_123.60953', '082134562330'),
(25, 14, 'kedai kopi petir', 'Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara ', '-10.16902_123.60647', '081339118347'),
(26, 15, 'kapital caffe', 'Jl. Bund. PU No.106, Tuak Daun Merah, Kec. Oebobo,', '-10.16811_123.62907', '081239911919'),
(27, 16, 'kopi kembo', 'Jl. Terusan Timor Raya No.1b, Klp. Lima, Kec. Klp.', '-10.14534_123.61543', '081219101940'),
(28, 17, 'sombra coffe', 'Jl. W.J. Lalamentik No.95, Oebufu, Kec. Oebobo, Ko', '-10.17213_123.61101', '081280695113'),
(29, 18, 'kopi amabie', 'Jl. Amabi No.67, Maulafa, Kec. Maulafa, Kota Kupan', '-10.18413_123.61260', '082134572083'),
(30, 19, 'Tebing Bar And Cafe', 'Alak, City,, Alak, Kupang, Kota Kupang, Nusa Tengg', '-10.20293_123.53120', '081233331115'),
(31, 20, 'BILâ€™s Resto', 'Perumahan Bukit Intan Lestari, Alak, Kec. Alak, Ko', '-10.17628_123.53896', '08113821133'),
(32, 21, 'Lacaza Coffee', 'RJ67+5J5, Jl. Fetor Funay, Oepura, Kec. Maulafa, K', '-10.18939_123.61425', '081224742409'),
(33, 23, 'kafe ocd beach', 'Lasiana, Kec. Klp. Lima, Kota Kupang, Nusa Tenggar', '-10.13149_123.66997', '085239159401');

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
(8, 'putri', '$2y$10$kkxx2O7H27sxM4ULdUsuH.JAQhEH8pP02hTpNZ2BZMDyO5QbAxnge', '082111111111', 'pembeli'),
(9, 'admin1', '$2y$10$.bHeQMYZbaCpok38q9rh6uFjIAqzkQpKZWJhwexGzHLsufUDLJXCS', '081236135963', 'admin'),
(10, 'admin2', '$2y$10$zNemBSR21tw7EfxOIF9bK.YyJUtnmF/1Lys4E2WcsMzJIQ7uxSP9C', '082146208360', 'admin'),
(11, 'ito', '$2y$10$ru5lUHbIDGoo2g942U1PJ.TP70uF4jtb5CAtzs1y8FL85vHFlhOZW', '086774532105', 'pembeli'),
(12, 'admin3', '$2y$10$dV1lh.zxA8NxeaJYI6NFEulUJTCG.maVgO3xeC30BKMqUa/aH/diu', '082146208360', 'admin'),
(13, 'admin4', '$2y$10$iyLGVxAcESaFfOoE/Vv3VeXGf0uOulnzlhtuVp83uSnZENRtEG47G', '082146208360', 'admin'),
(14, 'admin5', '$2y$10$LT2o54qVU7C90LT2fjY.yel1tdXCjXAU7S7rqN8wdUNOzXJGTvU3i', '082146208360', 'admin'),
(15, 'admin6', '$2y$10$Gllu1kG1w7ka59v4inhyKOQx1Dxt9vC6Rfv0ZpGMBOTEJhU0KlUuu', '082146208360', 'admin'),
(16, 'admin7', '$2y$10$kytDEo7qjDPBT7.TR4vA2.CX20s2JJs0BX6gCLWd/MC0fdW6U6nPC', '082146208360', 'admin'),
(17, 'admin8', '$2y$10$Pl2m.zUaN/pJR2Xz2YQeseqCN6JJRU3VRwmWUkFLwhh7BYXNE635O', '082146208360', 'admin'),
(18, 'admin9', '$2y$10$y1xu5pOohzgXGLKMlP.vbuPJD/w4vn5k7OIgClGd33R3IQ5DBfU2K', '082146208360', 'admin'),
(19, 'admin10', '$2y$10$eVWIo7opIuxQsYGUl69zA.VukPxH/CTD/eyEFVAhJkxugfO5sfJfS', '082146208360', 'admin'),
(20, 'admin11', '$2y$10$EPuDObvgX00mBAval4ppWuzFpC5omZqiyAel1UGo4qEHjM0SmtkPK', '082146208360', 'admin'),
(21, 'admin12', '$2y$10$RwJ9ownON89eiJ.TdAXFNeFYzWbB.3pjpbZ.VI4E13jMvLw2rne/O', '082146208360', 'admin'),
(22, 'rila', '$2y$10$dfvNfWIjcHg.a9PF54K0.OjaHWIsU3aqHPpIIUz3VsyhvAwNZNwEu', '082146208350', 'pembeli'),
(23, 'tasman', '$2y$10$OMcVxQf7KZgoHu15Mzw8Rezvi4.mJjzmdcr4YfcALSgCxjxPzGIM2', '082146208360', 'admin');

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
(22, 5, 'Sabtu', '09:30:00', '23:30:00'),
(23, 5, 'Minggu', '07:00:00', '00:00:00'),
(50, 12, 'Senin', '09:00:00', '21:00:00'),
(51, 12, 'Selasa', '09:00:00', '21:00:00'),
(52, 12, 'Rabu', '09:00:00', '21:00:00'),
(53, 12, 'Kamis', '09:00:00', '21:00:00'),
(54, 12, 'Jumat', '09:00:00', '21:00:00'),
(55, 12, 'Sabtu', '07:00:00', '23:00:00'),
(56, 12, 'Minggu', '07:00:00', '23:00:00'),
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
(113, 21, 'Senin', '09:00:00', '23:00:00'),
(114, 21, 'Selasa', '09:00:00', '23:00:00'),
(115, 21, 'Rabu', '09:00:00', '23:00:00'),
(116, 21, 'Kamis', '09:00:00', '23:00:00'),
(117, 21, 'Jumat', '21:00:00', '23:00:00'),
(118, 21, 'Sabtu', '09:00:00', '23:00:00'),
(119, 21, 'Minggu', '15:00:00', '22:00:00'),
(120, 22, 'Senin', '10:00:00', '22:00:00'),
(121, 22, 'Selasa', '10:00:00', '22:00:00'),
(122, 22, 'Rabu', '10:00:00', '22:00:00'),
(123, 22, 'Rabu', '10:00:00', '22:00:00'),
(124, 22, 'Kamis', '10:00:00', '22:00:00'),
(125, 22, 'Jumat', '10:00:00', '22:00:00'),
(126, 22, 'Sabtu', '10:00:00', '23:00:00'),
(127, 22, 'Minggu', '10:00:00', '22:00:00'),
(128, 23, 'Senin', '10:00:00', '21:45:00'),
(129, 23, 'Selasa', '10:00:00', '21:45:00'),
(130, 23, 'Rabu', '10:00:00', '21:45:00'),
(131, 23, 'Kamis', '10:00:00', '21:45:00'),
(132, 23, 'Kamis', '10:00:00', '21:45:00'),
(133, 23, 'Jumat', '10:00:00', '21:45:00'),
(134, 23, 'Sabtu', '10:00:00', '21:45:00'),
(135, 23, 'Minggu', '10:00:00', '21:45:00'),
(136, 24, 'Senin', '09:00:00', '22:00:00'),
(137, 24, 'Selasa', '09:00:00', '22:00:00'),
(138, 24, 'Rabu', '09:00:00', '22:00:00'),
(139, 24, 'Kamis', '09:00:00', '22:00:00'),
(140, 24, 'Jumat', '09:00:00', '22:00:00'),
(141, 24, 'Sabtu', '09:00:00', '22:00:00'),
(142, 25, 'Senin', '09:00:00', '23:00:00'),
(143, 25, 'Selasa', '09:00:00', '23:00:00'),
(144, 25, 'Rabu', '09:00:00', '23:00:00'),
(145, 25, 'Kamis', '09:00:00', '23:00:00'),
(146, 25, 'Jumat', '09:00:00', '23:00:00'),
(147, 25, 'Sabtu', '09:00:00', '23:00:00'),
(148, 25, 'Minggu', '15:00:00', '23:00:00'),
(149, 26, 'Senin', '09:00:00', '23:00:00'),
(150, 26, 'Selasa', '09:00:00', '23:00:00'),
(151, 26, 'Rabu', '09:00:00', '23:00:00'),
(152, 26, 'Rabu', '09:00:00', '23:00:00'),
(153, 26, 'Kamis', '09:00:00', '23:00:00'),
(154, 26, 'Jumat', '09:00:00', '23:00:00'),
(155, 26, 'Sabtu', '09:00:00', '23:00:00'),
(156, 26, 'Minggu', '15:00:00', '23:00:00'),
(157, 27, 'Senin', '10:00:00', '22:00:00'),
(158, 27, 'Selasa', '10:00:00', '22:00:00'),
(159, 27, 'Rabu', '10:00:00', '22:00:00'),
(160, 27, 'Kamis', '10:00:00', '22:00:00'),
(161, 27, 'Jumat', '10:00:00', '22:00:00'),
(162, 27, 'Sabtu', '10:00:00', '22:00:00'),
(163, 27, 'Minggu', '10:00:00', '22:23:00'),
(164, 28, 'Senin', '07:00:00', '22:00:00'),
(165, 28, 'Selasa', '07:00:00', '22:00:00'),
(166, 28, 'Rabu', '07:00:00', '22:00:00'),
(167, 28, 'Kamis', '07:00:00', '22:00:00'),
(168, 28, 'Jumat', '07:00:00', '22:00:00'),
(169, 28, 'Sabtu', '07:00:00', '23:00:00'),
(170, 28, 'Minggu', '10:00:00', '23:00:00'),
(171, 29, 'Senin', '11:00:00', '23:00:00'),
(172, 29, 'Selasa', '11:00:00', '23:00:00'),
(173, 29, 'Rabu', '11:00:00', '23:00:00'),
(174, 29, 'Kamis', '11:00:00', '23:00:00'),
(175, 29, 'Jumat', '11:00:00', '23:00:00'),
(176, 29, 'Sabtu', '11:00:00', '23:00:00'),
(177, 29, 'Minggu', '17:00:00', '23:00:00'),
(178, 30, 'Senin', '16:00:00', '22:00:00'),
(179, 30, 'Selasa', '16:00:00', '22:00:00'),
(180, 30, 'Rabu', '16:00:00', '23:00:00'),
(181, 30, 'Kamis', '16:00:00', '23:00:00'),
(182, 30, 'Jumat', '16:00:00', '23:00:00'),
(183, 30, 'Sabtu', '16:00:00', '23:00:00'),
(184, 30, 'Minggu', '16:00:00', '23:00:00'),
(185, 31, 'Senin', '10:00:00', '20:30:00'),
(186, 31, 'Selasa', '10:00:00', '20:30:00'),
(187, 31, 'Rabu', '10:00:00', '20:30:00'),
(188, 31, 'Kamis', '10:00:00', '20:30:00'),
(189, 31, 'Jumat', '10:00:00', '20:30:00'),
(190, 31, 'Sabtu', '10:00:00', '20:30:00'),
(191, 31, 'Minggu', '10:00:00', '20:30:00'),
(192, 32, 'Senin', '09:00:00', '23:00:00'),
(193, 32, 'Selasa', '09:00:00', '23:00:00'),
(194, 32, 'Rabu', '09:00:00', '23:00:00'),
(195, 32, 'Kamis', '09:00:00', '23:00:00'),
(196, 32, 'Jumat', '09:00:00', '23:00:00'),
(197, 32, 'Sabtu', '09:00:00', '23:00:00'),
(198, 32, 'Minggu', '09:00:00', '23:00:00'),
(199, 33, 'Senin', '09:00:00', '22:00:00'),
(200, 33, 'Selasa', '09:00:00', '22:00:00');

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
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `melakukan`
--
ALTER TABLE `melakukan`
  MODIFY `id_melakukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tempat_kafe`
--
ALTER TABLE `tempat_kafe`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  MODIFY `id_waktu_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

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
