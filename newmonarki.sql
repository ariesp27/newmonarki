/*
Navicat MySQL Data Transfer

Source Server         : Arie
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : newmonarki

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-13 15:45:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `disburst`
-- ----------------------------
DROP TABLE IF EXISTS `disburst`;
CREATE TABLE `disburst` (
  `kodedisburst` int(11) NOT NULL AUTO_INCREMENT,
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
  `randomid` varchar(11) NOT NULL,
  PRIMARY KEY (`kodedisburst`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of disburst
-- ----------------------------
INSERT INTO `disburst` VALUES ('22', '0', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '135000', '9JsiuhVN5b');
INSERT INTO `disburst` VALUES ('23', '0', '165000', '165000', '165000', '165000', '165000', '165000', '165000', '165000', '165000', '165000', '165000', '165000', 'bfAhIpm1ZH');
INSERT INTO `disburst` VALUES ('24', '0', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', 'f2h7EWFaSM');
INSERT INTO `disburst` VALUES ('25', '0', '176000', '176000', '176000', '176000', '176000', '176000', '176000', '176000', '176000', '176000', '176000', '176000', 'SQAt7FljBO');
INSERT INTO `disburst` VALUES ('26', '0', '195000', '195000', '195000', '195000', '195000', '195000', '195000', '195000', '195000', '195000', '195000', '195000', 'gyTVfsIP6E');
INSERT INTO `disburst` VALUES ('27', '0', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', '235000', 'SEApskc6Id');
INSERT INTO `disburst` VALUES ('30', '0', '3500', '3500', '3500', '3500', '3500', '3500', '3500', '3500', '3500', '3500', '3500', '3500', 'PsednVZjGA');
INSERT INTO `disburst` VALUES ('31', '0', '550', '550', '550', '550', '550', '550', '550', '550', '550', '550', '550', '550', 'gK4SajrDtV');
INSERT INTO `disburst` VALUES ('32', '0', '600', '600', '600', '600', '600', '600', '600', '600', '600', '600', '600', '600', 'vuygS21IKd');

-- ----------------------------
-- Table structure for `fungsi`
-- ----------------------------
DROP TABLE IF EXISTS `fungsi`;
CREATE TABLE `fungsi` (
  `kodefungsi` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(50) NOT NULL,
  PRIMARY KEY (`kodefungsi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fungsi
-- ----------------------------
INSERT INTO `fungsi` VALUES ('1', 'Test penamabahan fungsi pertama');
INSERT INTO `fungsi` VALUES ('2', 'Test penambahan fungsi kedua');

-- ----------------------------
-- Table structure for `headeranggaran`
-- ----------------------------
DROP TABLE IF EXISTS `headeranggaran`;
CREATE TABLE `headeranggaran` (
  `kodeanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `noprk` varchar(100) NOT NULL,
  `nousulan` varchar(100) NOT NULL,
  `nopr` varchar(100) NOT NULL,
  `kodewbs` varchar(100) NOT NULL,
  `kode_posanggaran` int(11) NOT NULL,
  `kodefungsi` int(11) NOT NULL,
  `kodesatuan` int(11) NOT NULL,
  `uraiankegiatan` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `tartglmulai` date NOT NULL,
  `blnmulai` varchar(25) NOT NULL,
  `prioritas` bigint(25) NOT NULL,
  `kko` varchar(25) NOT NULL,
  `kkf` varchar(25) NOT NULL,
  `mitigasi` varchar(100) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `randomid` varchar(10) NOT NULL,
  `image` varchar(25) NOT NULL,
  `kodeapp` int(11) NOT NULL,
  PRIMARY KEY (`kodeanggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of headeranggaran
-- ----------------------------
INSERT INTO `headeranggaran` VALUES ('71', '112233', '0', '', '', '1', '1', '11', 'Pengadaan server Citrix (APP Purwokerto)', '6 bulan', '2017-10-02', '', '1', '1506254731_101.pdf', '1506254731_719.pdf', '', 'AI', 'bfAhIpm1ZH', '', '5');
INSERT INTO `headeranggaran` VALUES ('72', '445566', '0', '', '', '1', '1', '10', 'Pengadaan Server Tableau (APP Karawang)', '6 bulan', '2017-11-06', '', '1', '1506255015_131.pdf', '1506255016_433.pdf', '', 'AO', '9JsiuhVN5b', '', '3');
INSERT INTO `headeranggaran` VALUES ('73', '667788', '0', '', '', '0', '0', '11', '(revisi) Pengadaan kendaraan operasional ', '6 bulan', '2017-10-09', '', '1', '', '', '', 'AI', 'SQAt7FljBO', '', '2');
INSERT INTO `headeranggaran` VALUES ('74', '997755', '0', '', '', '0', '0', '11', '(revisi)  Pengadaan laptop divisi TI', '3 bulan', '2017-11-20', '', '1', '', '', '', 'AI', 'f2h7EWFaSM', '', '2');
INSERT INTO `headeranggaran` VALUES ('75', '041102017', '0', '', '', '0', '0', '10', '(revisi) Pengadaan gardu listrik baru (APP Semarang)', '1 Tahun', '2017-08-07', '', '1', '1507107965_150.xlsx', '1507107965_804.docx', '', 'AO', 'gyTVfsIP6E', '', '7');
INSERT INTO `headeranggaran` VALUES ('76', '880022', '0', '', '', '0', '0', '11', 'Pengadaan alat fire protection (APP Semarang)', '6 bulan', '2017-04-03', '', '1', '', '', '', 'AI', 'SEApskc6Id', '', '7');
INSERT INTO `headeranggaran` VALUES ('80', '3', '0', '', '', '0', '0', '13', 'test tiga', '', '2017-09-04', '', '1', '1507545371_297.pdf', '1507545371_901.pdf', '', 'AI', 'PsednVZjGA', '', '2');
INSERT INTO `headeranggaran` VALUES ('86', '', 'APP06/10/2017/001', 'NO.PR/10/2017/001 ', 'M.3515.17.07.1.0001', '0', '0', '11', 'Pengadaan kamera pengawas CCTV ', '', '2018-03-28', 'Maret', '1', '1507775927_931.xlsx', '1507775927_395.docx', 'ini mitigasi pertama', 'AO', 'gK4SajrDtV', '', '6');
INSERT INTO `headeranggaran` VALUES ('87', '', 'APP06/10/2017/002', 'NO.PR/10/2017/002 ', 'M.3515.17.07.1.0066', '0', '0', '10', 'Pembangunan mushola gedung baru ', '', '2018-02-05', 'Februari', '1', '1507776163_733.docx', '1507776163_458.docx', 'ini mitigasi kedua', 'AI', 'vuygS21IKd', '', '6');

-- ----------------------------
-- Table structure for `newdetailanggaran`
-- ----------------------------
DROP TABLE IF EXISTS `newdetailanggaran`;
CREATE TABLE `newdetailanggaran` (
  `kodedetail` int(11) NOT NULL AUTO_INCREMENT,
  `kodeanggaran` int(11) NOT NULL,
  `volumejasa` bigint(100) NOT NULL,
  `volumematerial` bigint(100) NOT NULL,
  `hrgsatuanjasa` bigint(100) NOT NULL,
  `hrgsatuanmaterial` bigint(100) NOT NULL,
  `alasan` text NOT NULL,
  `status` int(11) NOT NULL,
  `tglapprove` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `randomid` varchar(10) NOT NULL,
  PRIMARY KEY (`kodedetail`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of newdetailanggaran
-- ----------------------------
INSERT INTO `newdetailanggaran` VALUES ('147', '0', '3', '6', '1500000', '3500000', ' Usulan ini sudah di evaluasi.', '3', '2017-09-24 20:23:05', 'bfAhIpm1ZH');
INSERT INTO `newdetailanggaran` VALUES ('148', '0', '2', '3', '1250000', '2500000', ' Usulan ini sudah di evaluasi.', '3', '2017-09-24 20:22:00', '9JsiuhVN5b');
INSERT INTO `newdetailanggaran` VALUES ('149', '0', '3', '6', '1250000', '3250000', '', '4', null, 'bfAhIpm1ZH');
INSERT INTO `newdetailanggaran` VALUES ('152', '0', '3', '6', '1000000', '3050000', '  RAB ini sudah terevaluasi', '8', '2017-09-25 14:37:27', 'bfAhIpm1ZH');
INSERT INTO `newdetailanggaran` VALUES ('153', '0', '3', '6', '1000000', '3050000', '', '9', null, 'bfAhIpm1ZH');
INSERT INTO `newdetailanggaran` VALUES ('155', '0', '2', '2', '14500000', '28000000', ' sudah evaluasi', '3', '2017-10-05 13:19:57', 'SQAt7FljBO');
INSERT INTO `newdetailanggaran` VALUES ('156', '0', '5', '5', '1000000', '4500000', '  usulan ini sudah di evaluasi', '3', '2017-09-27 00:04:48', 'f2h7EWFaSM');
INSERT INTO `newdetailanggaran` VALUES ('158', '0', '5', '5', '985000', '4350000', '', '4', null, 'f2h7EWFaSM');
INSERT INTO `newdetailanggaran` VALUES ('159', '0', '4', '4', '950000', '4150000', ' rab ini sudah di evaluasi.', '8', '2017-09-27 00:31:38', 'f2h7EWFaSM');
INSERT INTO `newdetailanggaran` VALUES ('161', '0', '4', '4', '950000', '4150000', '', '9', null, 'f2h7EWFaSM');
INSERT INTO `newdetailanggaran` VALUES ('163', '0', '2', '5', '2500000', '15000000', ' Usulan ini sudah terealuasi.', '3', '2017-10-04 16:48:29', 'gyTVfsIP6E');
INSERT INTO `newdetailanggaran` VALUES ('164', '0', '4', '10', '4500000', '8500000', '  Usulan ini sudah terealuasi.', '3', '2017-10-04 16:51:25', 'SEApskc6Id');
INSERT INTO `newdetailanggaran` VALUES ('166', '0', '2', '5', '2250000', '14550000', '', '4', null, 'gyTVfsIP6E');
INSERT INTO `newdetailanggaran` VALUES ('167', '0', '4', '10', '4350000', '8450000', '', '4', null, 'SEApskc6Id');
INSERT INTO `newdetailanggaran` VALUES ('168', '0', '2', '4', '2500000', '15000000', ' RAB ini sudah terevaluasi.', '8', '2017-10-05 11:42:38', 'gyTVfsIP6E');
INSERT INTO `newdetailanggaran` VALUES ('169', '0', '3', '9', '4500000', '8500000', ' RAB ini sudah di approved.', '6', '2017-10-05 11:18:42', 'SEApskc6Id');
INSERT INTO `newdetailanggaran` VALUES ('170', '0', '2', '2', '135000000', '27000000', '', '4', null, 'SQAt7FljBO');
INSERT INTO `newdetailanggaran` VALUES ('171', '0', '2', '2', '12500000', '26500000', ' evaluasi', '8', '2017-10-05 13:53:39', 'SQAt7FljBO');
INSERT INTO `newdetailanggaran` VALUES ('176', '0', '2', '3', '2000', '1500', '', '0', null, 'PsednVZjGA');
INSERT INTO `newdetailanggaran` VALUES ('179', '0', '3', '2', '6500', '7000', ' usulan ini sudah terevaluasi.', '3', '2017-10-12 12:51:59', 'gK4SajrDtV');
INSERT INTO `newdetailanggaran` VALUES ('180', '0', '3', '8', '7500', '2500', '  usulan ini sudah terevaluasi.', '3', '2017-10-12 12:52:07', 'vuygS21IKd');
INSERT INTO `newdetailanggaran` VALUES ('181', '0', '2', '3', '1365000', '2850000', '', '4', null, '9JsiuhVN5b');
INSERT INTO `newdetailanggaran` VALUES ('183', '0', '2', '3', '6500', '7500', '', '4', null, 'gK4SajrDtV');
INSERT INTO `newdetailanggaran` VALUES ('185', '0', '3', '9', '6500', '5000', '', '4', null, 'vuygS21IKd');
INSERT INTO `newdetailanggaran` VALUES ('188', '0', '3', '2', '4900', '6900', '', '5', '2017-10-13 15:13:44', 'gK4SajrDtV');
INSERT INTO `newdetailanggaran` VALUES ('189', '0', '3', '8', '7500', '2500', '', '5', '2017-10-13 15:41:28', 'vuygS21IKd');

-- ----------------------------
-- Table structure for `pembayaran`
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `kodeapp` int(11) NOT NULL,
  `kodepym` int(11) NOT NULL AUTO_INCREMENT,
  `koderealisasi` int(11) DEFAULT NULL,
  `nomigo` varchar(100) NOT NULL,
  `tglpym` date DEFAULT NULL,
  `jmlpym` bigint(25) DEFAULT NULL,
  `tahap` bigint(25) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `randomid` varchar(225) NOT NULL,
  PRIMARY KEY (`kodepym`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('3', '39', null, '', '2017-12-11', '805000', '1', '2017-12-17', '9JsiuhVN5b');
INSERT INTO `pembayaran` VALUES ('5', '40', null, '', '2017-12-04', '2650000', '1', '2017-12-04', 'bfAhIpm1ZH');
INSERT INTO `pembayaran` VALUES ('2', '41', null, '', '2017-12-19', '7650000', '1', '2017-12-19', 'SQAt7FljBO');
INSERT INTO `pembayaran` VALUES ('2', '42', null, '', '2017-12-20', '7650000', '2', '2017-12-20', 'SQAt7FljBO');
INSERT INTO `pembayaran` VALUES ('2', '43', null, '', '2017-12-08', '2000000', '1', '2017-12-08', 'f2h7EWFaSM');
INSERT INTO `pembayaran` VALUES ('2', '44', null, '', '2017-12-11', '2000000', '2', '2017-12-11', 'f2h7EWFaSM');

-- ----------------------------
-- Table structure for `pos_anggaran`
-- ----------------------------
DROP TABLE IF EXISTS `pos_anggaran`;
CREATE TABLE `pos_anggaran` (
  `kode_posanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `posanggaran` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_posanggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pos_anggaran
-- ----------------------------
INSERT INTO `pos_anggaran` VALUES ('1', 'Test penambahan anggaran pertama');
INSERT INTO `pos_anggaran` VALUES ('2', 'Test penambahan anggaran kedua');

-- ----------------------------
-- Table structure for `realisasi`
-- ----------------------------
DROP TABLE IF EXISTS `realisasi`;
CREATE TABLE `realisasi` (
  `kodeapp` int(11) NOT NULL,
  `koderealisasi` int(11) NOT NULL AUTO_INCREMENT,
  `kodedetail` int(11) NOT NULL,
  `nokontrak` varchar(25) NOT NULL,
  `nospk` varchar(100) NOT NULL,
  `nopo` varchar(100) NOT NULL,
  `nilaikontrak` bigint(25) NOT NULL,
  `namavendor` varchar(25) NOT NULL,
  `tglkontrak` date NOT NULL,
  `status` int(11) NOT NULL,
  `randomid` varchar(25) NOT NULL,
  PRIMARY KEY (`koderealisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of realisasi
-- ----------------------------
INSERT INTO `realisasi` VALUES ('5', '11', '0', '001/KTRK/09/17', '', '', '20650000', 'PT. ABCD', '2017-12-04', '9', 'bfAhIpm1ZH');
INSERT INTO `realisasi` VALUES ('3', '12', '0', '002/KTRK/09/17', '', '', '12500000', 'PT.WXYZ', '2017-11-13', '9', '9JsiuhVN5b');
INSERT INTO `realisasi` VALUES ('2', '13', '0', 'KTRK/270917/AO', '', '', '20000000', 'PT. CIWANGI', '2017-11-20', '9', 'f2h7EWFaSM');

-- ----------------------------
-- Table structure for `satuan`
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `kodesatuan` int(11) NOT NULL AUTO_INCREMENT,
  `namasatuan` varchar(25) NOT NULL,
  PRIMARY KEY (`kodesatuan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES ('1', 'orang');
INSERT INTO `satuan` VALUES ('2', 'Ls');
INSERT INTO `satuan` VALUES ('3', 'Lot');
INSERT INTO `satuan` VALUES ('4', 'Dokumen');
INSERT INTO `satuan` VALUES ('5', 'Tim');
INSERT INTO `satuan` VALUES ('6', 'Kali');
INSERT INTO `satuan` VALUES ('7', 'Trip');
INSERT INTO `satuan` VALUES ('8', 'Md');
INSERT INTO `satuan` VALUES ('9', 'Buah');
INSERT INTO `satuan` VALUES ('10', 'Kegiatan');
INSERT INTO `satuan` VALUES ('11', 'Unit');
INSERT INTO `satuan` VALUES ('12', 'Bulan');
INSERT INTO `satuan` VALUES ('13', 'M3');
INSERT INTO `satuan` VALUES ('14', 'Set');
INSERT INTO `satuan` VALUES ('15', 'Gln');
INSERT INTO `satuan` VALUES ('16', 'Dus');
INSERT INTO `satuan` VALUES ('17', 'Tahun');
INSERT INTO `satuan` VALUES ('18', 'Judul');
INSERT INTO `satuan` VALUES ('19', 'Pegawai');
INSERT INTO `satuan` VALUES ('20', 'Tbg');

-- ----------------------------
-- Table structure for `user_login`
-- ----------------------------
DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `kodelogin` int(11) NOT NULL AUTO_INCREMENT,
  `kodegi` int(11) NOT NULL,
  `kodeapp` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kodeapd` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `images` varchar(25) NOT NULL,
  PRIMARY KEY (`kodelogin`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_login
-- ----------------------------
INSERT INTO `user_login` VALUES ('7', '0', '0', 'user', '0', 'arie@tabs.co.id', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'staff', '');
INSERT INTO `user_login` VALUES ('8', '0', '0', 'Admin', '0', 'admin@tabs.co.id', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'admin', '');
INSERT INTO `user_login` VALUES ('9', '0', '0', 'MAPP', '0', 'mapp@pln.co.id', 'mapp', '1916bbda7f6556bfa7250e122f1f0f2f', 'manager', 'manager', '');
INSERT INTO `user_login` VALUES ('10', '0', '0', 'assmen enjin', '0', 'assenjin@pln.co.id', 'assenjin', '97cdf836f5f8ff8da2e6fae211945630', 'assman', 'staff', '');
INSERT INTO `user_login` VALUES ('12', '0', '0', 'Kantor Induk', '0', 'ki@pln.co.id', 'ki', '988287f7a1eb966ffc4e19bdbdeec7c3', 'KI', 'kantor induk', '');

-- ----------------------------
-- Table structure for `wbs`
-- ----------------------------
DROP TABLE IF EXISTS `wbs`;
CREATE TABLE `wbs` (
  `kodewbs` varchar(100) NOT NULL,
  `namawbs` varchar(100) NOT NULL,
  `jeniswbs` varchar(25) NOT NULL,
  PRIMARY KEY (`kodewbs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wbs
-- ----------------------------
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0001', 'TRANSFORMATOR 500 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0004', 'TRANSFORMATOR 150 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0005', 'TRANSFORMATOR 70 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0006', 'SWITCHGEAR 500 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0008', 'SWITCHGEAR 150 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0015', 'SHARED FACILITIES 500 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0017', 'SHARED FACILITIES 150 KV ', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0032', 'COMMON FACILITY', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0035', 'SUTET 500 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0037', 'SUTET 150 KV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0045', 'Additional - pemeliharaan CCTV', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.1.0066', 'SARANA BANGUNAN & HALAMAN', 'rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0001', 'TRANSFORMATOR 500 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0004', 'TRANSFORMATOR 150 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0005', 'TRANSFORMATOR 70 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0006', 'SWITCHGEAR 500 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0008', 'SWITCHGEAR 150 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0015', 'SHARED FACILITIES 500 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0017', 'SHARED FACILITIES  150 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0032', 'COMMON FACILITY (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0035', 'SUTET 500 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0037', 'SUTET 150 KV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0045', 'Additional - pemeliharaan CCTV (NR)', 'non rutin');
INSERT INTO `wbs` VALUES ('M.3515.17.07.2.0066', 'SARANA BANGUNAN & HALAMAN (NR)', 'non rutin');
