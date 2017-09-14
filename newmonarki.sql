-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Sep 2017 pada 12.34
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

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
  `des` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, '20170904', 1, 1, 4, 'Test penambahan pertama revisi', '1 tahun', '2017-10-10', 1, '1504516665_331.jpg', '1504516665_998.jpg', 'AI', '14MaY90Klp', '', 0),
(9, '20170905', 2, 2, 9, 'Test penambahan kedua', '1 bulan', '2017-10-02', 1, '1504516067_448.jpg', '1504516067_893.jpg', 'AI', 'sD6BvAr820', '', 0),
(10, '565', 1, 1, 17, 'Test penambahan AI keempat', '1 bulan', '2017-10-09', 1, '1504518560_548.', '1504518560_640.', 'AI', 's5U6JxvO9S', '', 0),
(11, '700', 2, 2, 4, 'Test penambahan AO kedua revisi', '1 tahun', '2017-10-09', 2, '', '', 'AO', 'H0Ds4Zw6mk', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newdetailanggaran`
--

CREATE TABLE `newdetailanggaran` (
  `kodedetail` int(11) NOT NULL,
  `kodeanggaran` int(11) NOT NULL,
  `hrgsatuanmaterial` bigint(100) NOT NULL,
  `volumematerial` bigint(100) NOT NULL,
  `status` int(11) NOT NULL,
  `hrgsatuanjasa` bigint(100) NOT NULL,
  `volumejasa` bigint(100) NOT NULL,
  `alasan` text NOT NULL,
  `tglapprove` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `randomid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `newdetailanggaran`
--

INSERT INTO `newdetailanggaran` (`kodedetail`, `kodeanggaran`, `hrgsatuanmaterial`, `volumematerial`, `status`, `hrgsatuanjasa`, `volumejasa`, `alasan`, `tglapprove`, `randomid`) VALUES
(10, 8, 1500006, 50, 1, 1000006, 50, ' sudah approved', '2017-09-04 10:23:26', '14MaY90Klp'),
(11, 9, 150000, 5, 1, 100000, 5, ' sudah approved', '2017-09-04 10:27:15', 'sD6BvAr820'),
(13, 10, 150000, 5, 0, 100000, 5, '', NULL, 's5U6JxvO9S'),
(14, 11, 1500008, 55, 1, 1000008, 55, ' sudah approved', '2017-09-04 10:31:02', 'H0Ds4Zw6mk');

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
  `tglinput` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `kodeangdetail` int(11) NOT NULL,
  `nilaikontrak` bigint(25) NOT NULL,
  `namavendor` varchar(25) NOT NULL,
  `tglkontrak` date NOT NULL,
  `status` int(11) NOT NULL,
  `fileToUpload` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`koderealisasi`, `kodeangdetail`, `nilaikontrak`, `namavendor`, `tglkontrak`, `status`, `fileToUpload`) VALUES
(4, 0, 0, '', '0000-00-00', 0, 'icon3.png'),
(5, 0, 1, 'a', '2017-08-30', 0, 'icon1.png');

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
  `nama` varchar(25) NOT NULL,
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

INSERT INTO `user_login` (`kodelogin`, `nama`, `email`, `username`, `password`, `level`, `jabatan`, `images`) VALUES
(7, 'user', 'arie@tabs.co.id', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'us', 'staff', ''),
(8, 'admin', 'admin@tabs.co.id', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'sa', 'admin', ''),
(9, 'MAPP', '-', 'mapp', '1916bbda7f6556bfa7250e122f1f0f2f', 'ma', 'manager', ''),
(10, 'assmen haset', 'asshaset@pln.co.id', 'asshaset', 'e00d208dc86cd44ee18925b60e4e6b3b', 'ass', 'staff', '');

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
  MODIFY `kodedisburst` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `kodefungsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `headeranggaran`
--
ALTER TABLE `headeranggaran`
  MODIFY `kodeanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `newdetailanggaran`
--
ALTER TABLE `newdetailanggaran`
  MODIFY `kodedetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kodepym` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pos_anggaran`
--
ALTER TABLE `pos_anggaran`
  MODIFY `kode_posanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `koderealisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `kodesatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `kodelogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
