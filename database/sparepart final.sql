-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 18.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparepart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(6) NOT NULL,
  `warna` varchar(64) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `kode_part` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `ditransaksi` int(11) NOT NULL,
  `dipesan` int(11) NOT NULL,
  `image` varchar(256) DEFAULT 'book-default-cover.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `id_kategori`, `harga`, `warna`, `berat`, `kode_part`, `stok`, `ditransaksi`, `dipesan`, `image`) VALUES
(24, 'AHM Oil MPX2 â€“ 0.8 L 10W-30', 14, 58500, 'putih', '1kg', '08232M99K0LN5', 25, 11, 0, 'img1714634332.jpg'),
(25, 'Oli Gardan â€“ Transmission Gear Oil', 14, 16500, 'Merah,Putih', '0,5kg', '08294M99Z8YN1', 35, 15, 0, 'img1714634514.jpg'),
(26, 'Saringan Udara â€“ Honda BeAT FI / BeAT eSP / BeAT POP eSP', 13, 52500, 'Hijau, Hitam', '0,5kg', '17210K16900', 25, 15, 0, 'img1714635044.jpg'),
(27, 'Saringan Udara â€“ Honda Old CB150R, New CB150R Streetfire K15G, New CB150R Streetfire K15M & CBR 150R K45G', 13, 61000, 'Hijau, Hitam', '0,5kg', '17211K15900', 26, 15, 0, 'img1714635305.jpg'),
(28, 'Busi (Spark Plug CPR9EA9 (NGK)) â€“ Vario 150 eSP K59J & Vario 125 eSP K60R', 5, 23000, 'putih', '0,2kg', '31926KRM841', 14, 1, 0, 'img1714635425.jpg'),
(29, 'Busi â€“ Spark Plug U27EPR-N9 (DS)', 5, 21000, 'putih', '0,1', '31919K25602', 12, 3, 0, 'img1714635638.jpg'),
(30, 'Ban Belakang Honda Vario 160 K2S (120/70-14M/C 61P)', 6, 400000, 'Hitam', '6kg', '42711K2SN01', 49, 2, 0, 'img1714635749.jpg'),
(31, 'Ban Tubles Belakang Honda PCX 150 K97', 6, 432000, 'Hitam', '5kg', '42711K97N02', 25, 0, 0, 'img1714635843.jpg'),
(35, 'Van Belt (Belt Drive) â€“ PCX 150 & ADV', 7, 165000, 'Hitam', '0,3kg', '23100K97T01', 24, 0, 0, 'img1716347481.jpg'),
(36, 'Van Belt (Belt Drive Kit) â€“ Vario 125 eSP K60', 7, 172000, 'Hitam', '0,3kg', '23100K35BA0', 22, 0, 0, 'img1716347568.jpg'),
(37, 'Kampas Rem Tromol NA â€“ Honda GL MAX, Mega Pro, Tiger', 8, 46500, 'Silver', '0,7kg', '43120362001', 15, 0, 0, 'img1716347787.jpg'),
(38, 'Kampas Rem Depan (Pad Set FR Brake) â€“ Honda CB150R StreetFire (Old), CBR150R K45A, New CB150R Streetfire, New CBR 150R K45G,CB', 8, 64000, 'Coklat', '0,4kg', '06455KPPN02', 15, 0, 0, 'img1716347892.jpg'),
(39, 'Bearing (Bearing NDL.20X26X20 LBL) â€“ Honda CRF 150L, CRF 250 Rally, Gold Wing, SH150i', 9, 162000, 'Silver', '0,5kg', '91072MY1005', 12, 0, 0, 'img1716348366.jpg'),
(40, 'Bearing Ball Radial 6207 SPL L â€“ Honda CBR 150, New CB150R Streetfire, New CBR 150R K45G, Supra GTR 150', 9, 74500, 'Silver', '0,5kg', '91002KPP901', 13, 0, 0, 'img1716348461.jpg'),
(41, 'Shock Breaker Kanan Depan â€“ Honda Tiger New Revolution', 15, 737000, 'Hitam', '3kg', '51400KCJ671', 6, 0, 0, 'img1716348571.jpg'),
(42, 'Shock breaker Belakang Honda CB150X', 15, 788000, 'Merah', '3,1kg', '52400K3B305', 6, 0, 0, 'img1716348686.jpg'),
(44, 'Disk Clutch LBL Honda Grand Impressa & OLD Type', 16, 162000, 'Gold', '0,4', '22201MR8000', 3, 0, 0, 'img1716349843.jpg'),
(45, 'Kampas Kopling (Disk Clutch Friction) â€“ GL Max, MegaPro, Tiger, Supra XX, Phantom', 16, 27500, 'Coklat', '0,4kg', '22201MJ8001', 5, 0, 0, ''),
(46, 'Aki 6N4-2A-4 GS â€“ Honda WIN', 11, 86000, 'Hitam', '1kg', '31500GF6FM0', 2, 0, 0, 'img1716350780.jpg'),
(47, 'ACCU â€“ BATTERY GTZ4V', 11, 241000, 'HItam,Merah', '2kg', '31500KWWA01', 7, 0, 0, 'img1716350883.jpg'),
(48, 'Set Rantai Roda (Drive Chain Kit) â€“ Tiger', 10, 832000, 'Silver', '2kg', ' 06401KCJ690', 7, 0, 0, 'img1716351204.jpg'),
(49, 'Rantai Roda Kit (Drive Chain Kit) â€“ CB150 StreetFire', 10, 357000, 'Silver', '2kg', '06401K45N01', 5, 0, 0, 'img1716351400.jpg'),
(50, 'Piston Kit 0,25 â€“ Honda Vario 125 CBS Helm IN FI, Vario 125 Techno Helm In FI', 12, 131500, 'Silver', '0,5kg', '131A2KWN902', 2, 0, 0, 'img1716351511.jpg'),
(51, 'Piston Kit (STD) â€“ Honda CS1', 12, 171000, 'Silver', '0,5kg', '131A1KWC900', 1, 0, 0, 'img1716351614.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_transaksi`, `id_barang`) VALUES
('27052024001', 25),
('27052024002', 26),
('28052024003', 26),
('28052024004', 27),
('28052024005', 26),
('28052024006', 25),
('28052024007', 26),
('28052024008', 26),
('30052024009', 24),
('30052024009', 27),
('30052024010', 25),
('31052024011', 27),
('31052024012', 24),
('31052024013', 24),
('31052024014', 29),
('31052024015', 26),
('31052024016', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(3) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(5, 'Busi'),
(6, 'Ban'),
(7, 'Van Belt'),
(8, 'Kampas Rem'),
(9, 'Bearing'),
(10, 'Gir Set'),
(11, 'Battery / Aki'),
(12, 'Piston Kit'),
(13, 'Filter Udara'),
(14, 'Oli'),
(15, 'Shockbreaker'),
(16, 'Disc Clutch');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `id_user` varchar(12) NOT NULL,
  `email_user` varchar(128) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `berat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(12) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `batas_ambil` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_detail`
--

CREATE TABLE `pesan_detail` (
  `id` int(11) NOT NULL,
  `id_pesan` varchar(12) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(3) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_pesan` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` enum('belum diambil','diambil') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tgl_transaksi`, `id_pesan`, `id_user`, `tgl_pengembalian`, `status`, `total_harga`) VALUES
('27052024001', '2024-05-27', '27052024001', 28, '2024-05-27', 'diambil', 16500),
('27052024002', '2024-05-27', '28052024001', 28, '2024-05-27', 'diambil', 52500),
('28052024003', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 52500),
('28052024004', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 61000),
('28052024005', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 52500),
('28052024006', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 16500),
('28052024007', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 52500),
('28052024008', '2024-05-28', '28052024001', 28, '2024-05-28', 'diambil', 52500),
('30052024009', '2024-05-30', '28052024001', 28, '2024-05-30', 'diambil', 119500),
('30052024010', '2024-05-30', '30052024001', 29, '2024-05-31', 'diambil', 16500),
('31052024011', '2024-05-31', '30052024001', 29, '2024-05-31', 'diambil', 61000),
('31052024012', '2024-05-31', '31052024001', 28, '2024-05-31', 'diambil', 58500),
('31052024013', '2024-05-31', '31052024001', 28, '2024-05-31', 'diambil', 58500),
('31052024014', '2024-05-31', '31052024001', 28, '2024-05-31', 'diambil', 21000),
('31052024015', '2024-05-31', '31052024001', 28, '2024-05-31', 'diambil', 52500),
('31052024016', '2024-05-31', '31052024001', 28, '2024-05-31', 'diambil', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`, `alamat`) VALUES
(24, 'Algifari', 'algifari.afa@gmail.com', 'pro1714621792.jpg', '$2y$10$WuvCcxdDqfLUmioN8WZzietwbOAwRV.dkHktViKjAFARqGvhN2dNi', 1, 1, 1714460103, ''),
(25, 'sam', 'sam@gmail.com', 'default.jpg', '$2y$10$iTZGcgPznCQGk6/ectMuTutfaIruyenBFF0Zcq12TT6hRrwj.bNca', 2, 1, 1714722297, ''),
(26, 'Muhamad Khalafi Al Gifari Helwani', 'algifari.afa@gmail.com', 'default.jpg', '$2y$10$z92SOs8lJ1yflEtb2cmN1usy2ouX6QIp/RtVbudTFB6tD9rnZunNC', 2, 1, 1715000843, 'tangerang'),
(27, 'Algifari', 'ragnafari123@gmail.com', 'default.jpg', '$2y$10$/T40zokdI57IaNuCrluO5eNoYFdEJz.tdU/RVx.38T3sBb885sBFW', 2, 1, 1715000867, 'tangerang'),
(28, 'RIZAL NUR FIRMANSYAH', 'firmanz565@gmail.com', 'default.jpg', '$2y$10$yuG6QuEnSxkiRnYrrjcOCOQM.6ExbZattI0IMVHIXQJqNPq7M68/u', 1, 1, 1716641541, 'kalideres'),
(29, 'Ridho', 'ridho@gmail.com', 'default.jpg', '$2y$10$kSLR2WvQGyDMnUOCGuWRFuNbtRjwCLON2rbloRKfiH49Ke8nF31Xi', 2, 1, 1716965833, 'ridho');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `pesan_detail`
--
ALTER TABLE `pesan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan_detail`
--
ALTER TABLE `pesan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
