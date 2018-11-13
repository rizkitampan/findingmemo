-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 09:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findingmemo2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(10) NOT NULL,
  `uraian_akun` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `uraian_akun`, `keterangan`) VALUES
('521111', 'Belanja Keperluan Perkantoran', ''),
('521115', 'Belanja Honor Operasional Satuan Kerja', ''),
('521119', 'Belanja Barang Operasional Lainnya', ''),
('521211', 'Belanja Bahan', ''),
('521213', 'Belanja Honor Output Kegiatan', ''),
('521219', 'Belanja Barang Non Operasional Lainnya', ''),
('521811', 'Belanja Barang Persediaan Barang Konsumsi', ''),
('522111', 'Belanja Langganan Listrik', ''),
('522112', 'Belanja Langganan Telepon', ''),
('522113', 'Belanja Langganan Air', ''),
('522141', 'Belanja Sewa', ''),
('522151', 'Belanja Jasa Profesi', ''),
('522191', 'Belanja Jasa Lainnya', ''),
('523111', 'Belanja Pemeliharaan Gedung dan Bangunan', ''),
('523121', 'Belanja Pemeliharaan Peralatan dan Mesin', ''),
('523123', 'Belanja Barang Persediaan Pemeliharaan', ''),
('524111', 'Belanja Perjalanan Dinas Biasa', ''),
('524113', 'Belanja Perjalanan Dinas Dalam Kota', ''),
('524114', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota', ''),
('524119', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota', ''),
('532111', 'Belanja Modal Peralatan dan Mesin', '');

-- --------------------------------------------------------

--
-- Table structure for table `isi_memo`
--

CREATE TABLE `isi_memo` (
  `id_ismo` int(11) NOT NULL,
  `nomor_memo` varchar(50) DEFAULT NULL,
  `mak` varchar(20) NOT NULL,
  `akun` varchar(6) NOT NULL,
  `tanggal_entri` date DEFAULT NULL,
  `waktu_entri` time NOT NULL,
  `perihal` text,
  `id_jenis_perihal` int(11) DEFAULT NULL,
  `nilai` varchar(10000) DEFAULT NULL,
  `id_jemo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `disposisippk` int(10) DEFAULT NULL,
  `catatan` text,
  `kondisi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_memo`
--

INSERT INTO `isi_memo` (`id_ismo`, `nomor_memo`, `mak`, `akun`, `tanggal_entri`, `waktu_entri`, `perihal`, `id_jenis_perihal`, `nilai`, `id_jemo`, `id_user`, `disposisippk`, `catatan`, `kondisi`) VALUES
(8, '001/Teksurla.03-TPSA/ND/PL.01.03/1/2018', '522191', '522191', '2018-01-17', '02:38:55', 'Biaya iuran pengurusan administrasi radio AAIC-IA-15 BJ.3 bulan Januari', 2, '150.000', 1, 13, 5, NULL, 98),
(9, '001/Teksurla.02-TPSA/ND/RT.00.00/1/2018', '521119', '521119', '2018-01-15', '02:53:46', 'Permohonan penggantian biaya rapat', 2, '1.126.000', 2, 14, 5, '', 97),
(10, '002/Teksurla.02-TPSA/ND/RT.01.00/1/2018', '524113', '524113', '2018-01-16', '02:56:31', 'Permohonan pembayaran perjalanan dinas dalam kota ', 2, '300.000', 2, 14, NULL, NULL, 98),
(11, '007/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.002', '521119', '2018-01-18', '09:22:51', 'pembayaran konsumsi rapat finding memo', 2, '348.000', 2, 11, 5, NULL, 98),
(12, '007.1/Teksurla.01-TPSA/ND/RT.01.00/1/2018', '3473.002', '524111', '2018-01-18', '09:25:24', 'SPD Cibinong-Bogor ', 2, '1.590.000', 2, 11, NULL, NULL, 98),
(13, '008/Teksurla.01-TPSA/ND/RT.01.00/1/2018', '3473.994', '524113', '2018-01-19', '09:52:16', 'SPD Dalam kota ke cibinong', 2, '150.000', 2, 11, NULL, NULL, 98),
(14, '008.1/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-19', '09:53:20', 'pengadaan buku navigasi kapal', 1, '2.920.000', 2, 11, 6, NULL, 98),
(15, '008.2/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-19', '09:54:27', 'pengadaan buku log kapal', 1, '25.344.000', 2, 11, 6, NULL, 98),
(16, '008.3/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-19', '09:55:36', 'pembayaran konsumsi rapat keuangan', 2, '603.000', 2, 11, 5, NULL, 98),
(17, '008.4/Teksurla.01-TPSA/ND/RT.01.00/1/2018', '3473.994', '524111', '2018-01-19', '09:56:41', 'SPD Bali ', 2, '10.260.000', 2, 11, 5, NULL, 98),
(18, '008.5/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-19', '09:57:36', 'pengadaan ATK', 1, '19.372.080', 2, 11, NULL, NULL, 98),
(19, '002/Teksurla.03-TPSA/ND/KU.00.02/1/2018', '521213', '521213', '2018-01-18', '01:20:05', 'Honor output kegiatan ', 2, '15.620.000', 3, 13, 5, '', 98),
(20, '002.1/Teksurla.03-TPSA/ND/KU.00.02/1/2018', '521213', '521213', '2018-01-18', '01:22:34', 'Honor output kegiatan (PPNPN)', 2, '31.330.000', 3, 13, 5, NULL, 98),
(21, '002.2/Teksurla.03-TPSA/ND/KU.00.02/1/2018', '522191', '522191', '2018-01-18', '01:25:36', 'Biaya penyedia awak kapal & jasa keagenan bln Jan\'18', 1, '173.620.000', 3, 13, 6, NULL, 98),
(22, '003/Teksurla.02-TPSA/ND/RT 02.00/1/2018', '524113', '524113', '2018-01-19', '01:41:56', 'Permohonan pembayaran perjalanan dinas dalam kota', 2, '1.350.000', 2, 14, 5, NULL, 98),
(23, '004/Teksurla.02-TPSA/ND/RT.00.00/1/2018', '521119', '521119', '2018-01-19', '01:44:33', 'Permohonan penggantian biaya rapat', 2, '1.430.000', 2, 14, 5, NULL, 98),
(24, '009/Teksurla.01-TPSA/ND/PL.01.03/1/2018', '3473.994', '522113', '2018-01-22', '03:10:35', 'pembayaran air tawar', 2, '9.000.000', 2, 11, 5, NULL, 98),
(25, '009.1/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-22', '03:26:24', 'pembayaran konsumsi rapat TU dan analisa jabatan', 2, '356.000', 2, 11, 5, NULL, 98),
(26, '010/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-24', '01:53:44', 'pembayaran konsumsi bersih-bersih workshop', 2, '200.000', 2, 11, NULL, NULL, 98),
(27, '011/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521219', '2018-01-25', '11:25:49', 'konsumsi workshop', 2, '300.000', 2, 11, NULL, NULL, 98),
(28, '012/Teksurla.01-TPSA/ND/PL.03/1/2018', '3473.994', '523121', '2018-01-26', '10:15:02', 'penggantian suku cadang kendaraan dinas 1313 LQ', 2, '500.000', 2, 11, NULL, NULL, 98),
(29, '012.1/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-26', '03:04:24', 'pembayaran konsumsi rapat lakip TPSA', 2, '658.000', 2, 11, NULL, NULL, 98),
(30, '012.2/Teksurla.01-TPSA/ND/RT.03/1/2018', '3473.994', '521119', '2018-01-26', '03:05:32', 'pengiriman kalender balai teksurla 2018', 2, '376.500', 2, 11, NULL, NULL, 98),
(31, '012.3/Teksurla.01-TPSA/ND/RT.03/1/2018', '3473.994', '521119', '2018-01-26', '03:06:24', 'penjilidan laporan LAKIP TPSA', 2, '150.000', 2, 11, NULL, NULL, 98),
(32, '012.4/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-26', '03:08:18', 'pembayaran konsumsi kegiatan workshop', 2, '200.000', 2, 11, NULL, NULL, 98),
(33, '012.5/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-26', '03:09:22', 'pembelian accu GS astra', 2, '954.000', 2, 11, NULL, NULL, 98),
(34, '013/Teksurla.01-TPSA/ND/RT.02.01/1/2018', '3473.994', '523121', '2018-01-30', '10:06:53', 'pembayaran BBM', 2, '950.000', 2, 11, NULL, NULL, 98),
(35, '013.1/Teksurla.01-TPSA/ND/RT.03/1/2018', '3473.994', '521119', '2018-01-30', '02:23:20', 'penjilidan laporan akhir kegiatan', 2, '302.000', 2, 11, NULL, NULL, 98),
(36, '013.2/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-30', '02:24:47', 'uang muka konsumsi rapat', 2, '1.120.000', 2, 11, NULL, NULL, 98),
(37, '014/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-31', '07:47:57', 'pengadaan materai', 1, '450.000', 2, 11, NULL, NULL, 98),
(38, '014.1/Teksurla.01-TPSA/ND/RT.00.00/1/2018', '3473.994', '521119', '2018-01-31', '07:48:46', 'uang muka konsumsi rapat', 2, '1.540.000', 2, 11, NULL, NULL, 98),
(39, '005/Teksurla.02--TPSA/ND//RT 00.02/1/2018', '3473.002', '524111', '2018-01-31', '09:19:33', 'Permohonan SPD ke Bandung', 2, '3.190.000', 2, 14, NULL, NULL, 98),
(40, '014.2/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-31', '03:09:04', 'pembayaran bahan perawatan workshop balai teksurla', 2, '4.285.018', 2, 11, NULL, NULL, 98),
(41, '014.3/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-31', '03:09:55', 'pembelian terpal', 2, '700.000', 2, 11, NULL, NULL, 98),
(42, '014.4/Teksurla.01-TPSA/ND/PL.01.00/1/2018', '3473.994', '521811', '2018-01-31', '03:10:49', 'pembelian bahan perawatan workshop', 2, '136.000', 2, 11, NULL, NULL, 98),
(43, '014.5/Teksurla.01-TPSA/ND/RT.02.01/1/2018', '3473.994', '523121', '2018-01-31', '03:11:37', 'perbaikan kendaraan dinas B 6504 PLQ', 2, '170.000', 2, 11, NULL, NULL, 98),
(44, '006/Teksurla.02-TPSA/ND//RT.00.00/1/2018', '3473.002', '521119', '2018-01-31', '03:17:15', 'Penggantian biaya rapat', 2, '993.900', 2, 14, NULL, NULL, 98);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(30) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `keterangan`) VALUES
(1, 'Admin', 'Admin'),
(2, 'KPA', 'Kuasa Pengguna Anggaran'),
(3, 'Bendahara', 'Bendahara'),
(4, 'PPK', 'Pejabat Pembuat Komitmen'),
(5, 'Pejabat Pengadaan', NULL),
(6, 'PPSPM', 'Pejabat Pembuat Surat Perintah Membayar'),
(7, 'Penerima Barang', NULL),
(8, 'Ka Program Survei', NULL),
(9, 'Ka Sarpras', NULL),
(10, 'Ka Subbag Tata Usaha', NULL),
(11, 'Sekretaris TU', 'Ini Sekretaris TU'),
(12, 'Sekretaris OFS', 'Ini Sekretaris OFS'),
(13, 'Sekretaris Sarpras', 'Ini Sekretaris Sarpras'),
(14, 'Sekretaris Opsur', 'Ini Sekretaris Opsur'),
(15, 'Sekretaris KPA', 'Ini Sekretaris KPA'),
(16, 'Sekretaris Data', 'Ini Sekretaris Data'),
(17, 'userumum', 'ini user umum'),
(18, 'SPIP', 'Ini untuk Tim SPIP');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_memo`
--

CREATE TABLE `jenis_memo` (
  `id_jemo` int(11) NOT NULL,
  `nm_jemo` varchar(20) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_memo`
--

INSERT INTO `jenis_memo` (`id_jemo`, `nm_jemo`, `keterangan`) VALUES
(1, 'PNPB', NULL),
(2, 'RM', NULL),
(3, 'KEGIATAN', NULL),
(4, 'SARPRAS', NULL),
(5, 'TECHNOPARK', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perihal`
--

CREATE TABLE `jenis_perihal` (
  `id_jenhal` int(10) NOT NULL,
  `nm_jenis_perihal` char(20) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perihal`
--

INSERT INTO `jenis_perihal` (`id_jenhal`, `nm_jenis_perihal`, `keterangan`) VALUES
(1, 'pengadaan', 'ini memo pengadaan'),
(2, 'nonpengadaan', 'ini memo non pengadaan');

-- --------------------------------------------------------

--
-- Table structure for table `log_aksi`
--

CREATE TABLE `log_aksi` (
  `no_aksi` int(10) NOT NULL,
  `id_ismo` int(10) NOT NULL,
  `id_pelaku` int(10) NOT NULL,
  `tgl_aksi` date DEFAULT NULL,
  `waktu_entri` time DEFAULT NULL,
  `aksi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_aksi`
--

INSERT INTO `log_aksi` (`no_aksi`, `id_ismo`, `id_pelaku`, `tgl_aksi`, `waktu_entri`, `aksi`) VALUES
(45, 8, 13, '2018-01-17', '02:38:55', 4),
(46, 9, 14, '2018-01-15', '02:53:46', 4),
(47, 10, 14, '2018-01-16', '02:56:31', 4),
(48, 11, 11, '2018-01-18', '09:22:52', 4),
(49, 12, 11, '2018-01-18', '09:25:24', 4),
(50, 9, 3, '2018-01-18', '02:16:24', 1),
(51, 8, 3, '2018-01-18', '02:19:23', 1),
(52, 9, 4, '2018-01-18', '02:23:33', 1),
(53, 8, 4, '2018-01-18', '02:58:00', 1),
(54, 11, 3, '2018-01-19', '08:00:05', 1),
(55, 12, 3, '2018-01-19', '08:01:09', 1),
(56, 13, 11, '2018-01-19', '09:52:16', 4),
(57, 14, 11, '2018-01-19', '09:53:20', 4),
(58, 15, 11, '2018-01-19', '09:54:27', 4),
(59, 16, 11, '2018-01-19', '09:55:37', 4),
(60, 17, 11, '2018-01-19', '09:56:41', 4),
(61, 18, 11, '2018-01-19', '09:57:37', 4),
(62, 19, 13, '2018-01-18', '01:13:36', 4),
(63, 20, 13, '2018-01-18', '01:22:34', 4),
(64, 21, 13, '2018-01-18', '01:25:36', 4),
(65, 22, 14, '2018-01-19', '01:41:56', 4),
(66, 23, 14, '2018-01-19', '01:44:33', 4),
(67, 14, 3, '2018-01-22', '09:35:29', 1),
(68, 20, 3, '2018-01-22', '09:35:55', 1),
(69, 15, 3, '2018-01-22', '09:36:19', 1),
(70, 13, 3, '2018-01-22', '09:37:13', 3),
(71, 23, 3, '2018-01-22', '09:38:07', 1),
(72, 22, 3, '2018-01-22', '09:38:33', 1),
(73, 20, 4, '2018-01-22', '11:47:25', 1),
(74, 22, 4, '2018-01-22', '11:47:39', 1),
(75, 23, 4, '2018-01-22', '11:47:50', 1),
(76, 11, 4, '2018-01-22', '11:47:58', 1),
(77, 15, 4, '2018-01-22', '11:48:11', 1),
(78, 24, 11, '2018-01-22', '03:10:35', 4),
(79, 25, 11, '2018-01-22', '03:26:24', 4),
(80, 18, 3, '2018-01-23', '08:35:16', 1),
(81, 21, 3, '2018-01-23', '08:35:39', 1),
(82, 19, 3, '2018-01-23', '08:35:59', 1),
(83, 25, 3, '2018-01-23', '08:47:47', 1),
(84, 24, 3, '2018-01-23', '08:49:53', 1),
(85, 16, 3, '2018-01-23', '08:50:07', 1),
(86, 21, 4, '2018-01-23', '10:10:19', 1),
(87, 19, 4, '2018-01-23', '10:10:27', 1),
(88, 24, 4, '2018-01-23', '10:11:02', 1),
(89, 26, 11, '2018-01-24', '01:53:44', 4),
(90, 26, 3, '2018-01-25', '08:19:31', 1),
(91, 27, 11, '2018-01-25', '11:25:49', 4),
(92, 28, 11, '2018-01-26', '10:15:02', 4),
(93, 29, 11, '2018-01-26', '03:04:26', 4),
(94, 30, 11, '2018-01-26', '03:05:33', 4),
(95, 31, 11, '2018-01-26', '03:06:24', 4),
(96, 32, 11, '2018-01-26', '03:08:18', 4),
(97, 33, 11, '2018-01-26', '03:09:22', 4),
(98, 17, 3, '2018-01-26', '03:43:24', 1),
(99, 29, 3, '2018-01-29', '09:55:40', 1),
(100, 30, 3, '2018-01-29', '09:56:09', 1),
(101, 31, 3, '2018-01-29', '09:57:01', 1),
(102, 33, 3, '2018-01-29', '09:57:20', 1),
(103, 28, 3, '2018-01-29', '09:57:57', 1),
(104, 14, 4, '2018-01-29', '10:26:27', 1),
(105, 16, 4, '2018-01-29', '10:26:41', 1),
(106, 17, 4, '2018-01-29', '10:27:29', 1),
(107, 25, 4, '2018-01-29', '10:30:21', 1),
(108, 25, 4, '2018-01-29', '10:30:22', 1),
(109, 9, 5, '2018-01-29', '10:31:19', 1),
(110, 19, 5, '2018-01-29', '10:31:56', 1),
(111, 22, 5, '2018-01-29', '10:32:06', 1),
(112, 20, 5, '2018-01-29', '10:32:15', 1),
(113, 23, 5, '2018-01-29', '10:32:28', 1),
(114, 11, 5, '2018-01-29', '10:32:43', 1),
(115, 16, 5, '2018-01-29', '10:33:26', 1),
(116, 25, 5, '2018-01-29', '10:33:48', 1),
(117, 17, 5, '2018-01-29', '10:34:02', 1),
(118, 24, 5, '2018-01-29', '10:34:25', 1),
(119, 14, 5, '2018-01-29', '10:53:15', 1),
(121, 9, 6, '2018-01-29', '10:55:30', 1),
(122, 15, 5, '2018-01-29', '11:12:44', 1),
(123, 32, 3, '2018-01-30', '08:05:19', 1),
(124, 34, 11, '2018-01-30', '10:06:53', 4),
(125, 35, 11, '2018-01-30', '02:23:20', 4),
(126, 36, 11, '2018-01-30', '02:24:47', 4),
(127, 37, 11, '2018-01-31', '07:47:57', 4),
(128, 38, 11, '2018-01-31', '07:48:46', 4),
(129, 34, 3, '2018-01-31', '07:49:10', 1),
(130, 39, 14, '2018-01-31', '09:19:33', 4),
(131, 40, 11, '2018-01-31', '03:09:05', 4),
(132, 41, 11, '2018-01-31', '03:09:55', 4),
(133, 42, 11, '2018-01-31', '03:10:49', 4),
(134, 43, 11, '2018-01-31', '03:11:38', 4),
(135, 44, 14, '2018-01-31', '03:17:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mata_anggaran`
--

CREATE TABLE `mata_anggaran` (
  `id_akun` varchar(10) NOT NULL,
  `uraian_akun` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_anggaran`
--

INSERT INTO `mata_anggaran` (`id_akun`, `uraian_akun`, `keterangan`) VALUES
('521111', 'Belanja Keperluan Perkantoran', ''),
('521115', 'Belanja Honor Operasional Satuan Kerja', ''),
('521119', 'Belanja Barang Operasional Lainnya', ''),
('521211', 'Belanja Bahan', ''),
('521213', 'Belanja Honor Output Kegiatan', ''),
('521219', 'Belanja Barang Operasional Lainnya', ''),
('521811', 'Belanja Barang Persediaan Barang Konsumsi', ''),
('522111', 'Belanja Langganan Listrik', ''),
('522112', 'Belanja Langganan Telepon', ''),
('522113', 'Belanja Langganan Air', ''),
('522141', 'Belanja Sewa', ''),
('522151', 'Belanja Jasa Profesi', ''),
('522191', 'Belanja Jasa Lainnya', ''),
('523111', 'Belanja Pemeliharaan Gedung dan Bangunan', ''),
('523121', 'Belanja Pemeliharaan Peralatan dan Mesin', ''),
('523123', 'Belanja Barang Persediaan Pemeliharaan', ''),
('524111', 'Belanja Perjalanan Dinas Biasa', ''),
('524113', 'Belanja Perjalanan Dinas Dalam Kota', ''),
('524114', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota', ''),
('524119', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota', ''),
('532111', 'Belanja Modal Peralatan dan Mesin', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_memo`
--

CREATE TABLE `status_memo` (
  `id_status` int(11) NOT NULL,
  `nm_status_memo` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_memo`
--

INSERT INTO `status_memo` (`id_status`, `nm_status_memo`, `keterangan`) VALUES
(1, 'Dilanjutkan', 'Melanjutkan Memo'),
(2, 'Direvisi', 'Merevisi Memo'),
(3, 'Ditolak', 'Menolak Memo'),
(4, 'Insert', 'Memasukkan Memo'),
(97, 'tengahjalan', 'memo tengah jalan'),
(98, 'belum selesai', 'memo belum selesai'),
(99, 'selesai', 'memo selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`, `keterangan`) VALUES
(1, 'Sasmita Liestyasari', 'mita', 'mita123', 1, NULL),
(2, 'Rizki Adi Nugroho', 'rizki', 'rizki123', 1, NULL),
(3, 'M.Ilyas', 'kpa', 'kpa2018', 2, ''),
(4, 'Adi SR', 'ppk', 'ppk2018', 3, ''),
(5, 'Sutedjo', 'bendahara', 'bendahara2018', 4, ''),
(6, 'Denny Arbahri', 'spm', 'spm2018', 5, ''),
(7, 'Dinar Novandia', 'pengadaan', 'pengadaan2018', 6, ''),
(8, 'Darmawan', 'penerima', 'penerima2018', 7, ''),
(9, 'M. Irfan', 'progsur', 'progsur2018', 8, ''),
(10, 'Handoko Manoto', 'sarpras', 'sarpras2018', 9, ''),
(11, 'Trevi Jayanti', 'umum', 'umum2018', 10, ''),
(12, 'Virana Setya ', 'vira', 'vira123', 11, NULL),
(13, 'Sugiyati', 'sugi', 'sugi123', 14, NULL),
(14, 'Wahyuni', 'yuni', 'yuni123', 13, NULL),
(15, 'Rinny', 'rinny', 'rinny123', 15, NULL),
(16, 'Ira', 'ira', 'ira123', 16, ''),
(17, 'Anggun', 'anggun', 'anggun123', 12, NULL),
(18, 'userumum', 'user', 'user2018', 17, 'userumum'),
(19, 'Imam Mudita', 'immud', 'immud2018', 18, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `isi_memo`
--
ALTER TABLE `isi_memo`
  ADD PRIMARY KEY (`id_ismo`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jemo` (`id_jemo`),
  ADD KEY `id_jenis_perihal` (`id_jenis_perihal`),
  ADD KEY `kondisi` (`kondisi`),
  ADD KEY `isi_memo_ibfk_5` (`disposisippk`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_memo`
--
ALTER TABLE `jenis_memo`
  ADD PRIMARY KEY (`id_jemo`);

--
-- Indexes for table `jenis_perihal`
--
ALTER TABLE `jenis_perihal`
  ADD PRIMARY KEY (`id_jenhal`);

--
-- Indexes for table `log_aksi`
--
ALTER TABLE `log_aksi`
  ADD PRIMARY KEY (`no_aksi`),
  ADD KEY `id_ismo` (`id_ismo`),
  ADD KEY `log_aksi_ibfk_2` (`id_pelaku`);

--
-- Indexes for table `mata_anggaran`
--
ALTER TABLE `mata_anggaran`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `status_memo`
--
ALTER TABLE `status_memo`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isi_memo`
--
ALTER TABLE `isi_memo`
  MODIFY `id_ismo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jenis_memo`
--
ALTER TABLE `jenis_memo`
  MODIFY `id_jemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aksi`
--
ALTER TABLE `log_aksi`
  MODIFY `no_aksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `status_memo`
--
ALTER TABLE `status_memo`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `isi_memo`
--
ALTER TABLE `isi_memo`
  ADD CONSTRAINT `isi_memo_ibfk_1` FOREIGN KEY (`id_jemo`) REFERENCES `jenis_memo` (`id_jemo`),
  ADD CONSTRAINT `isi_memo_ibfk_2` FOREIGN KEY (`id_jenis_perihal`) REFERENCES `jenis_perihal` (`id_jenhal`),
  ADD CONSTRAINT `isi_memo_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `isi_memo_ibfk_4` FOREIGN KEY (`kondisi`) REFERENCES `status_memo` (`id_status`);

--
-- Constraints for table `log_aksi`
--
ALTER TABLE `log_aksi`
  ADD CONSTRAINT `log_aksi_ibfk_1` FOREIGN KEY (`id_ismo`) REFERENCES `isi_memo` (`id_ismo`),
  ADD CONSTRAINT `log_aksi_ibfk_2` FOREIGN KEY (`id_pelaku`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
