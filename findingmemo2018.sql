-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2018 pada 08.45
-- Versi server: 10.1.21-MariaDB
-- Versi PHP: 5.6.30

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(10) NOT NULL,
  `uraian_akun` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `uraian_akun`, `keterangan`) VALUES
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
-- Struktur dari tabel `isi_memo`
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
-- Dumping data untuk tabel `isi_memo`
--

INSERT INTO `isi_memo` (`id_ismo`, `nomor_memo`, `mak`, `akun`, `tanggal_entri`, `waktu_entri`, `perihal`, `id_jenis_perihal`, `nilai`, `id_jemo`, `id_user`, `disposisippk`, `catatan`, `kondisi`) VALUES
(1, '1/Teksurla.01-TPSA/ND/RT.001/12/2017', '3473.009', '521111', '2017-12-22', '09:41:29', 'tes user dibawah 50 juta pengadaan', 1, '25.000.000', 1, 1, NULL, 'tolak memo pertama', 98),
(3, '2/Teksurla.01-TPSA/ND/RT.001/12/2017', '3473.0001', '521111', '2017-12-22', '11:04:07', 'tes pengadaan dibawah 50 juta ke bendahara', 1, '13.000.000', 3, 1, 5, '', 99),
(4, '3/Teksurla.01-TPSA/ND/RT.003/12/2017', '3473.009', '521111', '2017-12-25', '07:04:11', 'tes pengadaan dibawah 50 juta pengadaan tidak bendahara', 1, '10.500.000', 1, 1, 6, '', 99),
(5, '4/Teksurla.01-TPSA/ND/RT.001/12/2017', '3473.009', '521219', '2017-12-25', '07:24:56', 'tes non pengadaan ', 2, '10.000.000', 3, 1, NULL, '', 99),
(6, '5/Teksurla.01-TPSA/ND/RT.001/12/2017', '3473.009', '521111', '2017-12-26', '07:15:33', 'tes 100 juta', 1, '70.000.000', 1, 1, 5, '', 99),
(7, '6/Teksurla.01-TPSA/ND/RT.001/1/2018', '3473.009', '521119', '2018-01-02', '07:56:10', 'tes vira pengadaan 80 juta', 1, '80.000.000', 3, 11, 5, '', 99),
(8, '7/Teksurla.02-TPSA/ND/RT.001/1/2018', '3473.009', '521219', '2018-01-02', '08:02:40', 'tes sugi diatas 20 juta', 1, '25.000.000', 3, 14, NULL, NULL, 98),
(9, '9/Teksurla.03-TPSA/ND/RT.002/1/2018', '3473.009', '521119', '2018-01-02', '08:23:32', 'tes yuni 50 juta', 1, '55.000.000', 3, 13, NULL, NULL, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(30) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`, `keterangan`) VALUES
(1, 'Admin', 'Admin'),
(2, 'KPA', 'Kuasa Pengguna Anggaran'),
(3, 'Bendahara', 'Bendahara'),
(4, 'PPK', 'Pejabat Pembuat Komitmen'),
(5, 'PPSPM', 'Pejabat Pembuat Surat Perintah Membayar'),
(6, 'Pejabat Pengadaan', NULL),
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
(17, 'userumum', 'ini user umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_memo`
--

CREATE TABLE `jenis_memo` (
  `id_jemo` int(11) NOT NULL,
  `nm_jemo` varchar(20) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_memo`
--

INSERT INTO `jenis_memo` (`id_jemo`, `nm_jemo`, `keterangan`) VALUES
(1, 'PNPB', NULL),
(2, 'RM', NULL),
(3, 'KEGIATAN', NULL),
(4, 'SARPRAS', NULL),
(5, 'TECHNOPARK', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_perihal`
--

CREATE TABLE `jenis_perihal` (
  `id_jenhal` int(10) NOT NULL,
  `nm_jenis_perihal` char(20) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_perihal`
--

INSERT INTO `jenis_perihal` (`id_jenhal`, `nm_jenis_perihal`, `keterangan`) VALUES
(1, 'pengadaan', 'ini memo pengadaan'),
(2, 'nonpengadaan', 'ini memo non pengadaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aksi`
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
-- Dumping data untuk tabel `log_aksi`
--

INSERT INTO `log_aksi` (`no_aksi`, `id_ismo`, `id_pelaku`, `tgl_aksi`, `waktu_entri`, `aksi`) VALUES
(1, 1, 1, '2017-12-22', '08:24:42', 4),
(2, 1, 3, '2017-12-22', '09:27:07', 2),
(3, 1, 1, '2017-12-22', '09:36:53', 4),
(4, 1, 3, '2017-12-22', '09:39:01', 2),
(5, 1, 1, '2017-12-22', '09:41:29', 4),
(6, 1, 3, '2017-12-22', '09:45:35', 3),
(13, 3, 1, '2017-12-22', '11:04:07', 4),
(14, 3, 3, '2017-12-22', '11:06:14', 1),
(15, 3, 4, '2017-12-22', '11:07:20', 1),
(16, 3, 5, '2017-12-22', '02:41:07', 1),
(17, 3, 7, '2017-12-25', '10:28:00', 1),
(18, 3, 8, '2017-12-25', '10:51:27', 1),
(19, 3, 6, '2017-12-25', '05:42:21', 1),
(20, 4, 1, '2017-12-25', '06:07:28', 4),
(21, 4, 3, '2017-12-25', '06:53:45', 2),
(22, 4, 1, '2017-12-25', '07:04:11', 4),
(23, 4, 3, '2017-12-25', '07:09:48', 1),
(24, 4, 4, '2017-12-25', '07:11:22', 1),
(25, 4, 7, '2017-12-25', '07:20:06', 1),
(26, 4, 8, '2017-12-25', '07:21:46', 1),
(27, 4, 6, '2017-12-25', '07:22:15', 1),
(28, 5, 1, '2017-12-25', '07:24:56', 4),
(29, 5, 3, '2017-12-25', '08:39:11', 1),
(30, 5, 4, '2017-12-25', '09:05:34', 1),
(31, 5, 5, '2017-12-26', '10:42:01', 1),
(33, 5, 6, '2017-12-26', '11:04:31', 1),
(34, 5, 4, '2017-12-26', '11:26:44', 1),
(35, 5, 3, '2017-12-26', '11:48:22', 1),
(37, 5, 5, '2017-12-26', '12:06:22', 1),
(38, 6, 1, '2017-12-26', '07:00:37', 4),
(39, 6, 3, '2017-12-26', '07:03:40', 1),
(40, 6, 4, '2017-12-26', '07:08:38', 2),
(41, 6, 1, '2017-12-26', '07:15:33', 4),
(42, 6, 3, '2017-12-26', '07:16:29', 1),
(43, 6, 4, '2017-12-26', '07:19:36', 1),
(44, 6, 7, '2017-12-26', '07:43:51', 1),
(45, 6, 8, '2017-12-26', '08:02:10', 1),
(46, 6, 6, '2017-12-26', '08:08:37', 1),
(47, 7, 11, '2018-01-02', '07:56:10', 4),
(48, 8, 14, '2018-01-02', '08:02:40', 4),
(49, 9, 13, '2018-01-02', '08:23:32', 4),
(50, 7, 3, '2018-01-02', '01:32:52', 1),
(51, 7, 4, '2018-01-02', '02:13:19', 1),
(52, 7, 7, '2018-01-02', '02:15:03', 1),
(53, 7, 8, '2018-01-02', '02:17:16', 1),
(54, 7, 6, '2018-01-02', '02:19:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_anggaran`
--

CREATE TABLE `mata_anggaran` (
  `id_akun` varchar(10) NOT NULL,
  `uraian_akun` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_anggaran`
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
-- Struktur dari tabel `status_memo`
--

CREATE TABLE `status_memo` (
  `id_status` int(11) NOT NULL,
  `nm_status_memo` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_memo`
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`, `keterangan`) VALUES
(1, 'Sasmita Liestyasari', 'mita', 'mita123', 1, NULL),
(2, 'Rizki Adi Nugroho', 'rizki', 'rizki123', 1, NULL),
(3, 'M.Ilyas', 'kpa', 'kpa2017', 2, ''),
(4, 'Adi SR', 'ppk', 'ppk2017', 3, ''),
(5, 'Sutedjo', 'bendahara', 'bendahara2017', 4, ''),
(6, 'Slamet Wahyudi', 'spm', 'spm2017', 5, ''),
(7, 'Dinar Novandia', 'pengadaan', 'pengadaan2017', 6, ''),
(8, 'Darmawan', 'penerima', 'penerima2017', 7, ''),
(9, 'M. Irfan', 'progsur', 'progsur2017', 8, ''),
(10, 'Handoko Manoto', 'sarpras', 'sarpras2017', 9, ''),
(11, 'Trevi Jayanti', 'umum', 'umum2017', 10, ''),
(12, 'Virana Setya ', 'vira', 'vira123', 11, NULL),
(13, 'Sugiyati', 'sugi', 'sugi123', 14, NULL),
(14, 'Wahyuni', 'yuni', 'yuni123', 13, NULL),
(15, 'Rinny', 'rinny', 'rinny123', 15, NULL),
(16, 'Ira', 'ira', 'ira123', 16, ''),
(17, 'Anggun', 'anggun', 'anggun123', 12, NULL),
(18, 'userumum', 'user', 'user2017', 17, 'userumum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `isi_memo`
--
ALTER TABLE `isi_memo`
  ADD PRIMARY KEY (`id_ismo`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jemo` (`id_jemo`),
  ADD KEY `id_jenis_perihal` (`id_jenis_perihal`),
  ADD KEY `kondisi` (`kondisi`),
  ADD KEY `isi_memo_ibfk_5` (`disposisippk`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_memo`
--
ALTER TABLE `jenis_memo`
  ADD PRIMARY KEY (`id_jemo`);

--
-- Indeks untuk tabel `jenis_perihal`
--
ALTER TABLE `jenis_perihal`
  ADD PRIMARY KEY (`id_jenhal`);

--
-- Indeks untuk tabel `log_aksi`
--
ALTER TABLE `log_aksi`
  ADD PRIMARY KEY (`no_aksi`),
  ADD KEY `id_ismo` (`id_ismo`),
  ADD KEY `log_aksi_ibfk_2` (`id_pelaku`);

--
-- Indeks untuk tabel `mata_anggaran`
--
ALTER TABLE `mata_anggaran`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `status_memo`
--
ALTER TABLE `status_memo`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `isi_memo`
--
ALTER TABLE `isi_memo`
  MODIFY `id_ismo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis_memo`
--
ALTER TABLE `jenis_memo`
  MODIFY `id_jemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log_aksi`
--
ALTER TABLE `log_aksi`
  MODIFY `no_aksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `status_memo`
--
ALTER TABLE `status_memo`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `isi_memo`
--
ALTER TABLE `isi_memo`
  ADD CONSTRAINT `isi_memo_ibfk_1` FOREIGN KEY (`id_jemo`) REFERENCES `jenis_memo` (`id_jemo`),
  ADD CONSTRAINT `isi_memo_ibfk_2` FOREIGN KEY (`id_jenis_perihal`) REFERENCES `jenis_perihal` (`id_jenhal`),
  ADD CONSTRAINT `isi_memo_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `isi_memo_ibfk_4` FOREIGN KEY (`kondisi`) REFERENCES `status_memo` (`id_status`),
  ADD CONSTRAINT `isi_memo_ibfk_5` FOREIGN KEY (`disposisippk`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `log_aksi`
--
ALTER TABLE `log_aksi`
  ADD CONSTRAINT `log_aksi_ibfk_1` FOREIGN KEY (`id_ismo`) REFERENCES `isi_memo` (`id_ismo`),
  ADD CONSTRAINT `log_aksi_ibfk_2` FOREIGN KEY (`id_pelaku`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
