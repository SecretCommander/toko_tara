-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 04:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_tara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_petugas` int(15) NOT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_produk` int(15) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `jumlah_produk` int(5) NOT NULL,
  `foto_produk` varchar(150) NOT NULL,
  `kategori_produk` set('Makanan','Minuman','Pakaian','Obat') NOT NULL,
  `harga_produk` int(30) NOT NULL,
  `berat` int(5) UNSIGNED NOT NULL,
  `panjang` int(7) UNSIGNED NOT NULL,
  `lebar` int(7) UNSIGNED NOT NULL,
  `tinggi` int(7) UNSIGNED NOT NULL,
  `belah` tinyint(1) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_toko` int(11) NOT NULL,
  `vid` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_produk`, `nama_produk`, `jumlah_produk`, `foto_produk`, `kategori_produk`, `harga_produk`, `berat`, `panjang`, `lebar`, `tinggi`, `belah`, `deskripsi_produk`, `tgl_upload`, `id_toko`, `vid`, `foto2`, `foto3`) VALUES
(4, 'esss', 100, 'image2.jpg', 'Obat', 10000, 0, 0, 0, 0, 0, 'segerrrrr', '2023-12-08 09:37:07', 0, '0', '', ''),
(12, 'madu', 50, '655b748b20d46.jpg', 'Minuman', 200000, 50, 0, 0, 0, 0, 'sehat', '2023-11-20 15:00:27', 0, '0', '', ''),
(13, 'tes', 1, '655cc6f4b0556.jpg', 'Makanan', 5000, 5, 0, 0, 0, 0, 'ngetes doang', '2023-11-21 15:04:20', 2, '0', '', ''),
(23, 'madu', 49, '656996f0f2fb7.jpg', 'Makanan', 25000, 23, 56, 35, 65, 0, 'hujan', '2023-12-01 08:18:56', 1, '656996f0f2cbb.mp4', '656996f0f3328.png', '656996f0f3653.png'),
(25, 'mochi', 200, '65699a4190909.jpg', 'Makanan', 25000, 25, 10, 10, 100, 0, 'enakbet dah', '2023-12-01 08:33:05', 1, '65699a419053c.mp4', '65699a4190c57.', '65699a4190c62.'),
(26, 'krips', 100, '65699aa88ebab.jpg', 'Makanan', 25000, 200, 12, 121, 21, 1, 'mantap', '2023-12-01 08:34:48', 1, '65699aa88e7b4.mp4', '65699aa88ef64.', '65699aa88ef6e.'),
(27, 'hoodie', 25, '6572e433404e8.jpg', 'Pakaian', 25000, 150, 34, 4, 5, 1, 'pakaian', '2023-12-08 09:38:59', 2, '6572e433404c2.', '6572e43340970.', '6572e4334097b.');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `profile` varchar(150) DEFAULT NULL,
  `nama_pembeli` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `telepon` varchar(17) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `provinsi_p` varchar(250) NOT NULL,
  `kota_p` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `username`, `profile`, `nama_pembeli`, `password`, `telepon`, `email`, `alamat`, `tgl_lahir`, `provinsi_p`, `kota_p`) VALUES
(18, 'root', '65640a5618d99.png', 'jaya', 'root', '123456', 'jaya123@gmail.com', 'jl. patimura', '2023-11-27', '', ''),
(27, 'do', NULL, 'do', '123', '1234', 'do@gmail.com', 'asss', '1986-02-02', '11', '1101'),
(28, 'reel', NULL, 'ferel', 'what', '54678', 'fer@gmail.com', 'asas', '2023-11-09', '12', 'KAB. NIAS'),
(31, 'vik', '65619d52b9292.jpeg', 'viki', 'star', '7878', 'vikk@gmail.com', 'jalan jalan', '2023-10-31', 'SUMATERA UTARA', 'KAB. ASAHAN'),
(41, 'brim', NULL, 'achen', 'blim', '3213', 'dasjd@gmail.com', 'jl.jldasd', '2023-11-01', 'P A P U A', 'KAB. MAPPI'),
(42, 'mael', NULL, 'mael lee', 'bank', '123456', 'mael@gmail.com', 'fizi', '2023-11-30', 'RIAU', 'KAB. SIAK'),
(43, 'mario', NULL, 'nintendo', 'luigi', '474246', 'e@gmail.com', 'jdsjdkl', '2023-11-02', 'BENGKULU', 'KAB. BENGKULU UTARA'),
(45, 'biron', NULL, 'erlon', 'bir', '436', 'fix@yahoo.com', 'jl. ga tau', '2023-11-01', 'BANTEN', 'KABUPATEN LEBAK'),
(46, 'Admin', '656404f00e99d.jfif', 'admin', 'admin', '087712345678', 'admin@gmail.com', 'Jl. Pribadi', '2023-11-01', 'DI YOGYAKARTA', 'KABUPATEN BANTUL');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `nama_toko` varchar(150) NOT NULL,
  `nama_penjual` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `foto_toko` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `slogan` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `domain` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama_toko`, `nama_penjual`, `password`, `foto_toko`, `telepon`, `email`, `provinsi`, `kota`, `alamat`, `slogan`, `deskripsi`, `domain`) VALUES
(1, 'tok tar', 'rame', '1234', '65577a8527060.jpg', '123456', 'kaya@gmail.com', 'SUMATERA UTARA', 'KOTA MEDAN', 'jl.jalan', 'pelangan no.1', 'enak lah pokoknya', ''),
(2, 'indomie', 'indo', '456', '655781e6c1d16.jpg', '3456', 'indo@gmail.com', 'DKI JAKARTA', 'KOTA JAKARTA PUSAT', 'jalan presiden', 'indopride', 'murah meriah', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD UNIQUE KEY `nama_toko` (`nama_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_petugas` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_produk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
