-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 01:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(126) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`, `rating`) VALUES
(2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 'Part No. : 930H0-21010-001', 'Sparepart Kelistrikan', 150000, 4, 'aki1.jpg', 4),
(5, 'SPAKBOARD DEPAN', 'SPAKBOARD DEPAN SUZUKI TORNADO ORIGINAL', 'Sparepart BODY', 195000, 98, 'spakboard1.jpeg', 4),
(6, 'SPAKBOARD BELAKANG', 'SPAKBOARD BELAKANG SUZUKI TORNADO ORIGINAL', 'Sparepart BODY', 42000, 7, 'spakbor_belakang_motor_suzuki_tornado.jpg', 0),
(7, 'SPAKBOARD BELAKANG', 'SPAKBOARD BELAKANG SUZUKI NEX ORIGINAL', 'Sparepart BODY', 97000, 8, 'spalbor_belakang_suzuki_nex.jpg', 0),
(9, 'ECSTAR 0W-20 SN (4L)', 'Part No. : 990H0-21010-001', 'OLI', 95000, 40, 'oli21.jpg', 0),
(11, 'ROLLER SKYWAVE SPIN SKYDRIVE SET 12 GRAM SUZUKI', 'HARGA DI ATAS 1 SET/6PCS/6BIJI BISA DI APLIKASI KAN UNTUK VARIO 125/150 INJ OLD NEW/PCX STOK SELALU READY JADI JANGAN TANYA LAGi,LANGSUNG AJA DI ORDER', 'Sparepart Mesin', 75000, 9, 'roller1.jpg', 0),
(12, 'Oli Shell', 'Oli Shell', 'OLI', 198000, 3, 'shell_shell-helix-hx7-5w-40-oli-mesin-mobil-4-l-_full01.jpg', 0),
(13, 'Oli Yamalube', 'Oli Yamalube', 'OLI', 198000, 20, '3611839081.jpg', 0),
(14, 'Oliku', 'oliku', 'OLI', 198000, 20, 'Oli-diesel-untuk-motor-kemampuannya-terbukti-lebih-prima-namun-masih-diperdebatkan.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `kode_invoice` varchar(30) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `bukti` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0:belum bayar,1:sudah bayar,2:dikirim,3:diterima/selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `kode_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `bukti`, `created_by`, `status`) VALUES
(1, '', 'Vester Simbolon', 'Perumahan Kirana Cikarang', '2021-04-02 02:25:21', '2021-04-03 02:25:21', '', 0, 3),
(2, '', 'Silvester Simbolon', 'Perumahan Kirana Cikarang', '2021-04-02 21:56:56', '2021-04-03 21:56:56', '', 0, 2),
(3, '', 'Ridho', 'Jakarta Timur', '2021-04-08 02:44:05', '2021-04-09 02:44:05', '', 0, 1),
(4, '', '', '', '2021-05-13 13:27:01', '2021-05-14 13:27:01', '', 0, 0),
(5, '', 'fdsgag', 'dgasdgsag', '2021-05-27 18:20:32', '2021-05-28 18:20:32', '', 0, 0),
(6, '', 'ghdfhsd', 'hfdhfdshsd', '2021-05-27 22:09:30', '2021-05-28 22:09:30', '', 0, 0),
(7, '20190501TRFGE', 'gdsfgfdhsdfhs', 'hdfhdsfhs', '2021-05-27 22:13:57', '2021-05-28 22:13:57', '', 6, 3),
(8, '20210528EZPD0', 'hfdshdsh', 'hfdhsdhsdh', '2021-05-28 23:10:33', '2021-05-29 23:10:33', '', 6, 3),
(9, '20210528RTVZT', 'gdsgdsaga', 'gsdghasha', '2021-05-28 23:12:32', '2021-05-29 23:12:32', '', 6, 3),
(10, '20210528NY5KX', 'gdgdfhds', 'hfdhdshsd', '2021-05-28 23:13:51', '2021-05-29 23:13:51', '', 6, 0),
(11, '202105308RKG0', 'ttgdsga', 'gsdgsdag', '2021-05-30 09:44:11', '2021-05-31 09:44:11', '', 6, 3),
(12, '202106030RRL2', 'Amalia Safira Rhamadany', 'Jalan Jembawan III no.4B-47', '2021-06-03 21:37:56', '2021-06-04 21:37:56', '', 6, 0),
(13, '20210607ILRXU', 'Amalia Safira Rhamadany', 'Jalan Jembawan III no.4B-47', '2021-06-07 17:10:07', '2021-06-08 17:10:07', 'BUKTI_1623061440.jpeg', 8, 3),
(14, '20210608U3K3U', 'Defan', 'Jalan Jembawan III no.4B-47', '2021-06-08 18:13:50', '2021-06-09 18:13:50', 'BUKTI_1623150840.jpg', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL,
  `rating` int(1) NOT NULL,
  `rating_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_user`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`, `rating`, `rating_at`) VALUES
(1, 1, 6, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 1, 150000, '', 5, '0000-00-00 00:00:00'),
(2, 1, 6, 5, 'SPAKBOARD DEPAN', 1, 195000, '', 4, '0000-00-00 00:00:00'),
(3, 1, 6, 7, 'SPAKBOARD BELAKANG', 1, 97000, '', 4, '0000-00-00 00:00:00'),
(4, 2, 4, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 1, 150000, '', 5, '0000-00-00 00:00:00'),
(5, 2, 4, 5, 'SPAKBOARD DEPAN', 1, 195000, '', 3, '0000-00-00 00:00:00'),
(6, 3, 5, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 4, 150000, '', 4, '0000-00-00 00:00:00'),
(7, 4, 5, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 1, 150000, '', 2, '0000-00-00 00:00:00'),
(8, 5, 7, 5, 'SPAKBOARD DEPAN', 1, 195000, '', 5, '0000-00-00 00:00:00'),
(9, 7, 7, 7, 'SPAKBOARD BELAKANG', 1, 97000, '', 3, '2021-05-28 20:55:36'),
(10, 7, 7, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 1, 150000, '', 1, '2021-05-30 09:46:46'),
(19, 13, 8, 5, 'SPAKBOARD DEPAN', 1, 195000, '', 5, '2021-06-07 20:41:38'),
(20, 14, 8, 2, 'Aki Motor Suzuki RGV 250 Bosch RBTZ 5S', 1, 150000, '', 4, '2021-06-08 18:15:11');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok = stok-NEW.jumlah
WHERE id_barang= NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'vester', 'admin', 'admin', 1),
(2, 'siipande', 'pande', '123', 1),
(4, 'McDream', 'McDream', '123', 2),
(5, 'kwetiau', 'kwetiau', 'qwe', 2),
(6, 'Vester', 'vester', 'vester', 2),
(7, 'budi', 'budi', 'budi123', 2),
(8, 'Amalia Safira Rhamadany', 'amaliasr', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
