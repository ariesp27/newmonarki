-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Sep 2017 pada 09.10
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmonarki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggarandetail`
--

CREATE TABLE `anggarandetail` (
  `kodeangdetail` int(11) NOT NULL,
  `kode_posanggaran` int(11) NOT NULL,
  `kodefungsi` int(11) NOT NULL,
  `kodesatuan` int(11) NOT NULL,
  `noprk` varchar(50) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `uraiankegiatan` varchar(255) NOT NULL,
  `nokontrak` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `tartglmulai` date NOT NULL,
  `nilaianggaran` varchar(25) NOT NULL,
  `satuansebelum` varchar(50) NOT NULL,
  `volumesebelum` varchar(50) NOT NULL,
  `harsatmatbelum` varchar(50) NOT NULL,
  `harsatjasbelum` varchar(50) NOT NULL,
  `satuansesudah` varchar(50) NOT NULL,
  `volumesesudah` varchar(50) NOT NULL,
  `harsatmatsudah` varchar(50) NOT NULL,
  `harsatjassudah` varchar(50) NOT NULL,
  `realisasi` varchar(50) NOT NULL,
  `jan` bigint(20) NOT NULL,
  `feb` bigint(20) NOT NULL,
  `mar` bigint(20) NOT NULL,
  `apr` bigint(20) NOT NULL,
  `mei` bigint(20) NOT NULL,
  `jun` bigint(20) NOT NULL,
  `jul` bigint(20) NOT NULL,
  `agu` bigint(20) NOT NULL,
  `sep` bigint(20) NOT NULL,
  `okt` bigint(20) NOT NULL,
  `nov` bigint(20) NOT NULL,
  `des` bigint(20) NOT NULL,
  `kko` varchar(50) NOT NULL,
  `kkf` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `editby` varchar(50) NOT NULL,
  `datetime` date NOT NULL,
  `fileToUpload` varchar(50) NOT NULL,
  `images` varchar(25) NOT NULL,
  `tglapprove` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tahun` int(4) NOT NULL,
  `kodeapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggarandetail`
--

INSERT INTO `anggarandetail` (`kodeangdetail`, `kode_posanggaran`, `kodefungsi`, `kodesatuan`, `noprk`, `jenis`, `namakegiatan`, `uraiankegiatan`, `nokontrak`, `durasi`, `tartglmulai`, `nilaianggaran`, `satuansebelum`, `volumesebelum`, `harsatmatbelum`, `harsatjasbelum`, `satuansesudah`, `volumesesudah`, `harsatmatsudah`, `harsatjassudah`, `realisasi`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `kko`, `kkf`, `status`, `alasan`, `editby`, `datetime`, `fileToUpload`, `images`, `tglapprove`, `tahun`, `kodeapp`) VALUES
(16, 1, 1, 6, '20170814', 'AO', 'revisi Pengadaan kendaraan operasional', 'Pembelian 10 unit mobil Daihatsu Xenia', '', '2 bulan', '2017-09-01', '30000000', '', '5', '25000000', '0', '', '', '', '', '25008000', 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, 2084000, '', '', 0, ' ', '', '0000-00-00', '', '', '2017-08-31 09:28:34', 2017, 0),
(17, 2, 2, 11, '20170813', 'AI', 'Pengadaan PC', 'Pembelian 10 set pc', '', '2 bulan', '2017-09-01', '20000000', '', '10', '10000000', '0', '', '', '', '', '6000000', 500000, 500000, 500000, 500000, 500000, 500000, 500000, 0, 1000000, 500000, 500000, 500000, 'icon1.png', 'icon2.png', 1, ' approved', '', '2017-08-11', '', '', '2017-08-30 07:30:58', 2017, 0),
(18, 2, 2, 2, '20170816', 'AI', 'Pembangunan gedung Call Center PLN', 'Pembelian bahan-bahan bangunan', '20170816', '6 bulan', '2017-10-03', '150000000', 'unit', '1', '100000000', '50000000', '', '', '', '', '', 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, 12500000, '3', '3', 0, ' ', '', '2017-08-16', '', '', '0000-00-00 00:00:00', 2017, 0),
(19, 2, 2, 9, '20170816', 'AO', 'Pengadaan ATK ', 'Pembelian ATK', '', '1 bulan', '2017-09-01', '70000000', '', '50', '6000000', '0', '', '', '', '', '1000', 500000, 500000, 500000, 500000, 500000, 500000, 500000, 500000, 500000, 500000, 500000, 500000, '', '', 0, ' approve', '', '0000-00-00', '', '', '2017-09-01 07:36:11', 2017, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `disburst`
--

CREATE TABLE `disburst` (
  `kodedisburst` int(11) NOT NULL,
  `kodeanggaran` int(11) NOT NULL,
  `jan` bigint(100) NOT NULL,
  `feb` bigint(100) NOT NULL,
  `mar` bigint(100) NOT NULL,
  `apr` bigint(100) NOT NULL,
  `mei` bigint(100) NOT NULL,
  `jun` bigint(100) NOT NULL,
  `jul` bigint(100) NOT NULL,
  `agu` bigint(100) NOT NULL,
  `sep` bigint(100) NOT NULL,
  `okt` bigint(100) NOT NULL,
  `nov` bigint(100) NOT NULL,
  `des` bigint(100) NOT NULL,
  `randomid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disburst`
--

INSERT INTO `disburst` (`kodedisburst`, `kodeanggaran`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `randomid`) VALUES
(3, 0, 2500, 3000, 3000, 3000, 3000, 3000, 2500, 2500, 2500, 2500, 2500, 2500, 'orGxL5ZgQ7'),
(4, 0, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 3500, 'BKZYQ7ahEF'),
(7, 0, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 45500, 'am9j7X5Fyn'),
(8, 0, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 65000, 'ola6WNCcPb'),
(12, 0, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 160000, 'zSrJYDeUg4'),
(16, 0, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 8900, 'l1OtVTP64E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fungsi`
--

CREATE TABLE `fungsi` (
  `kodefungsi` int(11) NOT NULL,
  `fungsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `fungsi`
--

INSERT INTO `fungsi` (`kodefungsi`, `fungsi`) VALUES
(1, 'Test penamabahan fungsi pertama'),
(2, 'Test penambahan fungsi kedua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `headeranggaran`
--

CREATE TABLE `headeranggaran` (
  `kodeanggaran` int(11) NOT NULL,
  `noprk` varchar(100) NOT NULL,
  `kode_posanggaran` int(11) NOT NULL,
  `kodefungsi` int(11) NOT NULL,
  `kodesatuan` int(11) NOT NULL,
  `uraiankegiatan` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `tartglmulai` date NOT NULL,
  `prioritas` bigint(25) NOT NULL,
  `kko` varchar(25) NOT NULL,
  `kkf` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `randomid` varchar(10) NOT NULL,
  `image` varchar(25) NOT NULL,
  `kodeapp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `headeranggaran`
--

INSERT INTO `headeranggaran` (`kodeanggaran`, `noprk`, `kode_posanggaran`, `kodefungsi`, `kodesatuan`, `uraiankegiatan`, `durasi`, `tartglmulai`, `prioritas`, `kko`, `kkf`, `jenis`, `randomid`, `image`, `kodeapp`) VALUES
(55, '20170907', 1, 1, 4, 'Pengadaan notebook div ADM', '1 jam', '2017-10-02', 1, '', '', 'AI', 'orGxL5ZgQ7', '', 0),
(56, '20170907', 2, 2, 1, 'Perbaikan gedung PLN TJBT', '1 jam', '2017-10-02', 1, '', '', 'AO', 'l1OtVTP64E', '', 0),
(59, '20170908', 1, 1, 4, 'Pembelian alat kebersihan ', '1 jam', '2017-10-02', 1, '', '', 'AI', 'BKZYQ7ahEF', '', 0),
(60, '20170909', 2, 2, 10, 'Pengadaan kendaraan dinas ', '1 jam', '2017-10-02', 1, '', '', 'AO', 'ola6WNCcPb', '', 0),
(61, '123', 1, 1, 16, 'Pengadaan CCTV div HUMAS', '1 jam', '2017-10-02', 1, '1504963700_273.', '1504963700_101.', 'AI', 'am9j7X5Fyn', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newdetailanggaran`
--

CREATE TABLE `newdetailanggaran` (
  `kodedetail` int(11) NOT NULL,
  `kodeanggaran` int(11) NOT NULL,
  `volumejasa` bigint(100) NOT NULL,
  `volumematerial` bigint(100) NOT NULL,
  `hrgsatuanjasa` bigint(100) NOT NULL,
  `hrgsatuanmaterial` bigint(100) NOT NULL,
  `alasan` text NOT NULL,
  `status` int(11) NOT NULL,
  `tglapprove` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `randomid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `newdetailanggaran`
--

INSERT INTO `newdetailanggaran` (`kodedetail`, `kodeanggaran`, `volumejasa`, `volumematerial`, `hrgsatuanjasa`, `hrgsatuanmaterial`, `alasan`, `status`, `tglapprove`, `randomid`) VALUES
(73, 0, 15, 15, 100000, 100000, ' sudah di evaluasi', 3, '2017-09-08 02:18:31', 'orGxL5ZgQ7'),
(74, 0, 15, 15, 450000, 550000, ' Sudah di evaluasi', 3, '2017-09-07 03:02:19', 'l1OtVTP64E'),
(75, 0, 15, 10, 250000, 300000, '', 4, '2017-09-15 02:16:22', 'orGxL5ZgQ7'),
(76, 0, 15, 15, 460000, 510000, '', 4, '0000-00-00 00:00:00', 'l1OtVTP64E'),
(81, 0, 12, 12, 210000, 250000, ' RAB ini sudah selesai di evaluasi', 8, '2017-09-15 02:16:26', 'orGxL5ZgQ7'),
(84, 0, 5, 5, 150000, 250000, ' anggaran ini sudah di evaluasi', 3, '2017-09-08 06:42:43', 'BKZYQ7ahEF'),
(89, 0, 4, 4, 133000, 211000, '', 4, '2017-09-19 02:10:55', 'BKZYQ7ahEF'),
(92, 0, 15, 20, 500000, 750000, ' anggaran ini sudah di evaluasi', 3, '2017-09-09 07:38:55', 'ola6WNCcPb'),
(93, 0, 15, 15, 1500000, 1200000, ' ', 3, '2017-09-18 09:38:41', 'am9j7X5Fyn'),
(94, 0, 12, 12, 1250000, 1150000, '', 4, '2017-09-18 09:38:54', 'am9j7X5Fyn'),
(95, 0, 15, 15, 450000, 650000, '', 4, '0000-00-00 00:00:00', 'ola6WNCcPb'),
(97, 0, 8, 8, 950000, 950000, ' RAB ini sudah di evaluasi', 8, '2017-09-18 09:39:10', 'am9j7X5Fyn'),
(98, 0, 10, 10, 350000, 650000, ' RAB ini sudah di evaluasi', 8, '2017-09-10 13:36:12', 'ola6WNCcPb'),
(108, 0, 12, 12, 210000, 250000, '', 9, NULL, 'orGxL5ZgQ7'),
(111, 0, 4, 4, 12150000, 5500000, '', 4, '2017-09-18 07:55:12', 'zSrJYDeUg4'),
(113, 0, 4, 4, 12150000, 5500000, '', 5, '2017-09-18 07:55:12', 'zSrJYDeUg4'),
(114, 0, 4, 4, 125000, 215000, ' rab ini sudah di evaluasi', 8, '2017-09-19 01:09:06', 'BKZYQ7ahEF'),
(117, 0, 8, 8, 425000, 450000, ' rab ini sudah di evaluasi', 8, '2017-09-19 01:11:52', 'l1OtVTP64E'),
(118, 0, 4, 4, 125000, 215000, '', 9, NULL, 'BKZYQ7ahEF'),
(119, 0, 8, 8, 950000, 950000, '', 9, NULL, 'am9j7X5Fyn'),
(121, 0, 8, 8, 425000, 450000, '', 9, NULL, 'l1OtVTP64E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kodepym` int(11) NOT NULL,
  `koderealisasi` int(11) DEFAULT NULL,
  `tglpym` date DEFAULT NULL,
  `jmlpym` bigint(25) DEFAULT NULL,
  `tahap` bigint(25) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `randomid` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kodepym`, `koderealisasi`, `tglpym`, `jmlpym`, `tahap`, `tglinput`, `randomid`) VALUES
(18, NULL, '2017-09-18', 125000, 1, '2017-09-14', 'orGxL5ZgQ7'),
(19, NULL, '2017-09-18', 125000, 2, '2017-09-15', 'orGxL5ZgQ7'),
(20, NULL, '2017-09-19', 200000, 3, '2017-09-16', 'orGxL5ZgQ7'),
(21, NULL, '2017-09-19', 1160100, 1, '2017-09-19', 'BKZYQ7ahEF'),
(22, NULL, '2017-09-19', 64500, 1, '2017-09-19', 'l1OtVTP64E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pos_anggaran`
--

CREATE TABLE `pos_anggaran` (
  `kode_posanggaran` int(11) NOT NULL,
  `posanggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pos_anggaran`
--

INSERT INTO `pos_anggaran` (`kode_posanggaran`, `posanggaran`) VALUES
(1, 'Test penambahan anggaran pertama'),
(2, 'Test penambahan anggaran kedua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE `realisasi` (
  `koderealisasi` int(11) NOT NULL,
  `kodedetail` int(11) NOT NULL,
  `nokontrak` varchar(25) NOT NULL,
  `nilaikontrak` bigint(25) NOT NULL,
  `namavendor` varchar(25) NOT NULL,
  `tglkontrak` date NOT NULL,
  `status` int(11) NOT NULL,
  `randomid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`koderealisasi`, `kodedetail`, `nokontrak`, `nilaikontrak`, `namavendor`, `tglkontrak`, `status`, `randomid`) VALUES
(5, 0, '54326', 4250000, 'PT. SKPM', '2017-09-15', 9, 'orGxL5ZgQ7'),
(6, 0, '979', 1150000, 'PT. PMM', '2017-09-19', 9, 'BKZYQ7ahEF'),
(7, 0, '474', 6450000, 'PT. KZL', '2017-09-19', 9, 'l1OtVTP64E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `kodesatuan` int(11) NOT NULL,
  `namasatuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`kodesatuan`, `namasatuan`) VALUES
(1, 'orang'),
(2, 'Ls'),
(3, 'Lot'),
(4, 'Dokumen'),
(5, 'Tim'),
(6, 'Kali'),
(7, 'Trip'),
(8, 'Md'),
(9, 'Buah'),
(10, 'Kegiatan'),
(11, 'Unit'),
(12, 'Bulan'),
(13, 'M3'),
(14, 'Set'),
(15, 'Gln'),
(16, 'Dus'),
(17, 'Tahun'),
(18, 'Judul'),
(19, 'Pegawai'),
(20, 'Tbg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `kodelogin` int(11) NOT NULL,
  `kodegi` int(11) NOT NULL,
  `kodeapp` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kodeapd` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `images` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`kodelogin`, `kodegi`, `kodeapp`, `nama`, `kodeapd`, `email`, `username`, `password`, `level`, `jabatan`, `images`) VALUES
(7, 0, 0, 'user', 0, 'arie@tabs.co.id', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'staff', ''),
(8, 0, 0, 'Admin', 0, 'admin@tabs.co.id', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'admin', ''),
(9, 0, 0, 'MAPP', 0, 'mapp@pln.co.id', 'mapp', '1916bbda7f6556bfa7250e122f1f0f2f', 'manager', 'manager', ''),
(10, 0, 0, 'assmen enjin', 0, 'assenjin@pln.co.id', 'assenjin', '97cdf836f5f8ff8da2e6fae211945630', 'assman', 'staff', ''),
(12, 0, 0, 'Kantor Induk', 0, 'ki@pln.co.id', 'ki', '988287f7a1eb966ffc4e19bdbdeec7c3', 'KI', 'kantor induk', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggarandetail`
--
ALTER TABLE `anggarandetail`
  ADD PRIMARY KEY (`kodeangdetail`);

--
-- Indexes for table `disburst`
--
ALTER TABLE `disburst`
  ADD PRIMARY KEY (`kodedisburst`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD PRIMARY KEY (`kodefungsi`);

--
-- Indexes for table `headeranggaran`
--
ALTER TABLE `headeranggaran`
  ADD PRIMARY KEY (`kodeanggaran`);

--
-- Indexes for table `newdetailanggaran`
--
ALTER TABLE `newdetailanggaran`
  ADD PRIMARY KEY (`kodedetail`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kodepym`);

--
-- Indexes for table `pos_anggaran`
--
ALTER TABLE `pos_anggaran`
  ADD PRIMARY KEY (`kode_posanggaran`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`koderealisasi`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kodesatuan`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`kodelogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggarandetail`
--
ALTER TABLE `anggarandetail`
  MODIFY `kodeangdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `disburst`
--
ALTER TABLE `disburst`
  MODIFY `kodedisburst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `kodefungsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `headeranggaran`
--
ALTER TABLE `headeranggaran`
  MODIFY `kodeanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `newdetailanggaran`
--
ALTER TABLE `newdetailanggaran`
  MODIFY `kodedetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kodepym` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pos_anggaran`
--
ALTER TABLE `pos_anggaran`
  MODIFY `kode_posanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `koderealisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `kodesatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `kodelogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
