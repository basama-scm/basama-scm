-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 05:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scmc45`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(64) DEFAULT NULL,
  `user` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `nohp` varchar(12) NOT NULL,
  `level` varchar(64) DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `user`, `pass`, `nohp`, `level`, `status`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081201928371', 'Administrator', 'Aktif'),
(8, 'Manager', 'manager', '1d0258c2440a8d19e716292b231e3190', '081294829384', 'Manager', 'Aktif'),
(10, 'Gudang', 'gudang', '202446dd1d6028084426867365b0c7a1', '081294827462', 'Gudang', 'Aktif'),
(11, 'Kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', '081292039102', 'Kasir', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_atribut`
--

CREATE TABLE `tb_atribut` (
  `id_atribut` varchar(16) NOT NULL,
  `nama_atribut` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atribut`
--

INSERT INTO `tb_atribut` (`id_atribut`, `nama_atribut`) VALUES
('A01', 'Jenis Barang'),
('A02', 'Harga'),
('A03', 'Stock');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli`
--

CREATE TABLE `tb_beli` (
  `idb` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl_beli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataset`
--

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `id_atribut` varchar(16) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dataset`
--

INSERT INTO `tb_dataset` (`id_dataset`, `nomor`, `id_atribut`, `id_nilai`, `nama`) VALUES
(172, 7, 'A02', 27, 'MAGICOM PHILIPS HD-3131'),
(171, 7, 'A01', 1, 'MAGICOM PHILIPS HD-3131'),
(170, 6, 'A03', 29, 'MAGICOM PHILIPS HD-3119'),
(177, 9, 'A01', 1, 'MAGICOM COSMOS CRJ-1803 1,2 L'),
(169, 6, 'A02', 27, 'MAGICOM PHILIPS HD-3119'),
(168, 6, 'A01', 1, 'MAGICOM PHILIPS HD-3119'),
(167, 5, 'A03', 29, 'MAGICOM MITO R7 5 IN 1'),
(166, 5, 'A02', 27, 'MAGICOM MITO R7 5 IN 1'),
(176, 8, 'A03', 30, 'MAGICOM TRISONIC T-707A 1,8L'),
(165, 5, 'A01', 1, 'MAGICOM MITO R7 5 IN 1'),
(164, 4, 'A03', 29, 'MAGICOM KIRIN KRC-620D'),
(163, 4, 'A02', 27, 'MAGICOM KIRIN KRC-620D'),
(162, 4, 'A01', 1, 'MAGICOM KIRIN KRC-620D'),
(175, 8, 'A02', 28, 'MAGICOM TRISONIC T-707A 1,8L'),
(161, 3, 'A03', 30, 'MAGICOM KIRIN KRC-389'),
(160, 3, 'A02', 27, 'MAGICOM KIRIN KRC-389'),
(159, 3, 'A01', 1, 'MAGICOM KIRIN KRC-389'),
(158, 2, 'A03', 30, 'MAGICOM KIRIN KRC-088'),
(174, 8, 'A01', 1, 'MAGICOM TRISONIC T-707A 1,8L'),
(157, 2, 'A02', 27, 'MAGICOM KIRIN KRC-088'),
(156, 2, 'A01', 1, 'MAGICOM KIRIN KRC-088'),
(155, 1, 'A03', 29, 'MAGICOM KIRIN KRC-087'),
(173, 7, 'A03', 30, 'MAGICOM PHILIPS HD-3131'),
(154, 1, 'A02', 28, 'MAGICOM KIRIN KRC-087'),
(153, 1, 'A01', 1, 'MAGICOM KIRIN KRC-087'),
(178, 9, 'A02', 28, 'MAGICOM COSMOS CRJ-1803 1,2 L'),
(179, 9, 'A03', 30, 'MAGICOM COSMOS CRJ-1803 1,2 L'),
(180, 10, 'A01', 1, 'MAGICOM COSMOS CRJ-9303 '),
(181, 10, 'A02', 27, 'MAGICOM COSMOS CRJ-9303 '),
(182, 10, 'A03', 30, 'MAGICOM COSMOS CRJ-9303 '),
(183, 11, 'A01', 1, 'MAGICOM MIYAKO MCM-5122C'),
(184, 11, 'A02', 28, 'MAGICOM MIYAKO MCM-5122C'),
(185, 11, 'A03', 29, 'MAGICOM MIYAKO MCM-5122C'),
(186, 12, 'A01', 1, 'MAGICOM MIYAKO MCM-606A'),
(187, 12, 'A02', 28, 'MAGICOM MIYAKO MCM-606A'),
(188, 12, 'A03', 29, 'MAGICOM MIYAKO MCM-606A'),
(189, 13, 'A01', 1, 'MAGICOM MIYAKO MCM-508SBC'),
(190, 13, 'A02', 28, 'MAGICOM MIYAKO MCM-508SBC'),
(191, 13, 'A03', 29, 'MAGICOM MIYAKO MCM-508SBC'),
(192, 14, 'A01', 1, 'MAGICOM MIYAKO MCM-508'),
(193, 14, 'A02', 28, 'MAGICOM MIYAKO MCM-508'),
(194, 14, 'A03', 29, 'MAGICOM MIYAKO MCM-508'),
(195, 15, 'A01', 1, 'MAGICOM MIYAKO MCM-507'),
(196, 15, 'A02', 28, 'MAGICOM MIYAKO MCM-507'),
(197, 15, 'A03', 29, 'MAGICOM MIYAKO MCM-507'),
(198, 16, 'A01', 1, 'MAGICOM YONGMA SMC-8045 1,3L'),
(199, 16, 'A02', 27, 'MAGICOM YONGMA SMC-8045 1,3L'),
(200, 16, 'A03', 30, 'MAGICOM YONGMA SMC-8045 1,3L'),
(201, 17, 'A01', 1, 'MAGICOM YONGMA SMC-6013 2.L'),
(202, 17, 'A02', 27, 'MAGICOM YONGMA SMC-6013 2.L'),
(203, 17, 'A03', 30, 'MAGICOM YONGMA SMC-6013 2.L'),
(204, 18, 'A01', 1, 'MAGICOM YONGMA SMC-8033 2.L'),
(205, 18, 'A02', 27, 'MAGICOM YONGMA SMC-8033 2.L'),
(206, 18, 'A03', 30, 'MAGICOM YONGMA SMC-8033 2.L'),
(207, 19, 'A01', 1, 'MAGICOM YONGMA SMC-5031 1.3 L'),
(208, 19, 'A02', 27, 'MAGICOM YONGMA SMC-5031 1.3 L'),
(209, 19, 'A03', 30, 'MAGICOM YONGMA SMC-5031 1.3 L'),
(210, 20, 'A01', 1, 'MAGICOM YONGMA SMC-7033 2.L'),
(211, 20, 'A02', 27, 'MAGICOM YONGMA SMC-7033 2.L'),
(212, 20, 'A03', 29, 'MAGICOM YONGMA SMC-7033 2.L'),
(213, 21, 'A01', 3, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-135E'),
(214, 21, 'A02', 27, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-135E'),
(215, 21, 'A03', 29, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-135E'),
(216, 22, 'A01', 3, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-128BIT'),
(217, 22, 'A02', 27, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-128BIT'),
(218, 22, 'A03', 30, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-128BIT'),
(219, 23, 'A01', 3, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-226BIT'),
(220, 23, 'A02', 27, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-226BIT'),
(221, 23, 'A03', 30, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-226BIT'),
(222, 24, 'A01', 18, 'MAGIC JAR JUMBO YONGMA SMC-5049 5.4 L'),
(223, 24, 'A02', 27, 'MAGIC JAR JUMBO YONGMA SMC-5049 5.4 L'),
(224, 24, 'A03', 30, 'MAGIC JAR JUMBO YONGMA SMC-5049 5.4 L'),
(225, 25, 'A01', 18, 'MAGIC JAR JUMBO KIRIN KRW-920S 20. L'),
(226, 25, 'A02', 27, 'MAGIC JAR JUMBO KIRIN KRW-920S 20. L'),
(227, 25, 'A03', 30, 'MAGIC JAR JUMBO KIRIN KRW-920S 20. L'),
(228, 26, 'A01', 18, 'MAGIC JAR JUMBO MIYAKO MCG-171 16.7 L'),
(229, 26, 'A02', 27, 'MAGIC JAR JUMBO MIYAKO MCG-171 16.7 L'),
(230, 26, 'A03', 30, 'MAGIC JAR JUMBO MIYAKO MCG-171 16.7 L'),
(231, 27, 'A01', 19, 'STAND MIXER TURBO EHM-9588 5.5L'),
(232, 27, 'A02', 27, 'STAND MIXER TURBO EHM-9588 5.5L'),
(233, 27, 'A03', 29, 'STAND MIXER TURBO EHM-9588 5.5L'),
(234, 28, 'A01', 19, 'STAND MIXER TURBO EHM-9595 5 L'),
(235, 28, 'A02', 27, 'STAND MIXER TURBO EHM-9595 5 L'),
(236, 28, 'A03', 29, 'STAND MIXER TURBO EHM-9595 5 L'),
(237, 29, 'A01', 19, 'STAND MIXER TURBO EHM-9090 '),
(238, 29, 'A02', 27, 'STAND MIXER TURBO EHM-9090 '),
(239, 29, 'A03', 29, 'STAND MIXER TURBO EHM-9090 '),
(240, 30, 'A01', 19, 'STAND MIXER MITO MX 700 7 L'),
(241, 30, 'A02', 27, 'STAND MIXER MITO MX 700 7 L'),
(242, 30, 'A03', 30, 'STAND MIXER MITO MX 700 7 L'),
(243, 31, 'A01', 19, 'STAND MIXER MITO MX 100 5 L'),
(244, 31, 'A02', 27, 'STAND MIXER MITO MX 100 5 L'),
(245, 31, 'A03', 30, 'STAND MIXER MITO MX 100 5 L'),
(246, 32, 'A01', 19, 'STAND MIXER PHILIPS HR-1559'),
(247, 32, 'A02', 27, 'STAND MIXER PHILIPS HR-1559'),
(248, 32, 'A03', 30, 'STAND MIXER PHILIPS HR-1559'),
(249, 33, 'A01', 20, 'HAND MIXER PHILIPS HR-1552'),
(250, 33, 'A02', 27, 'HAND MIXER PHILIPS HR-1552'),
(251, 33, 'A03', 30, 'HAND MIXER PHILIPS HR-1552'),
(252, 34, 'A01', 19, 'STAND MIXER MIYAKO SM-625'),
(253, 34, 'A02', 28, 'STAND MIXER MIYAKO SM-625'),
(254, 34, 'A03', 30, 'STAND MIXER MIYAKO SM-625'),
(255, 35, 'A01', 19, 'STAND MIXER COSMOS CM-1689'),
(256, 35, 'A02', 27, 'STAND MIXER COSMOS CM-1689'),
(257, 35, 'A03', 30, 'STAND MIXER COSMOS CM-1689'),
(258, 36, 'A01', 19, 'STAND MIXER KIRIN KSM-391S'),
(259, 36, 'A02', 27, 'STAND MIXER KIRIN KSM-391S'),
(260, 36, 'A03', 30, 'STAND MIXER KIRIN KSM-391S'),
(261, 37, 'A01', 20, 'HAND MIXER MIYAKO HM-620'),
(262, 37, 'A02', 28, 'HAND MIXER MIYAKO HM-620'),
(263, 37, 'A03', 29, 'HAND MIXER MIYAKO HM-620'),
(264, 38, 'A01', 21, 'AIR COOLER GREE GTA-1COOL 4'),
(265, 38, 'A02', 27, 'AIR COOLER GREE GTA-1COOL 4'),
(266, 38, 'A03', 29, 'AIR COOLER GREE GTA-1COOL 4'),
(267, 39, 'A01', 21, 'AIRCOOLER SHARP PJ-A26MY-B'),
(268, 39, 'A02', 27, 'AIRCOOLER SHARP PJ-A26MY-B'),
(269, 39, 'A03', 30, 'AIRCOOLER SHARP PJ-A26MY-B'),
(270, 40, 'A01', 21, 'AIRCOOLER SHARP PJ-A36TY-B/W'),
(271, 40, 'A02', 27, 'AIRCOOLER SHARP PJ-A36TY-B/W'),
(272, 40, 'A03', 30, 'AIRCOOLER SHARP PJ-A36TY-B/W'),
(273, 41, 'A01', 21, 'AIRCOOLER SHARP PJ-A55TY-B/W'),
(274, 41, 'A02', 27, 'AIRCOOLER SHARP PJ-A55TY-B/W'),
(275, 41, 'A03', 30, 'AIRCOOLER SHARP PJ-A55TY-B/W'),
(276, 42, 'A01', 21, 'AIRCOOLER SHARP PJ-A77TY-E'),
(277, 42, 'A02', 27, 'AIRCOOLER SHARP PJ-A77TY-E'),
(278, 42, 'A03', 30, 'AIRCOOLER SHARP PJ-A77TY-E'),
(279, 43, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-101'),
(280, 43, 'A02', 28, 'WIRELESS MICROPHONE ADVANCE MIC-101'),
(281, 43, 'A03', 29, 'WIRELESS MICROPHONE ADVANCE MIC-101'),
(282, 44, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-102'),
(283, 44, 'A02', 28, 'WIRELESS MICROPHONE ADVANCE MIC-102'),
(284, 44, 'A03', 29, 'WIRELESS MICROPHONE ADVANCE MIC-102'),
(285, 45, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-103'),
(286, 45, 'A02', 28, 'WIRELESS MICROPHONE ADVANCE MIC-103'),
(287, 45, 'A03', 30, 'WIRELESS MICROPHONE ADVANCE MIC-103'),
(288, 46, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-201'),
(289, 46, 'A02', 27, 'WIRELESS MICROPHONE ADVANCE MIC-201'),
(290, 46, 'A03', 29, 'WIRELESS MICROPHONE ADVANCE MIC-201'),
(291, 47, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-301'),
(292, 47, 'A02', 27, 'WIRELESS MICROPHONE ADVANCE MIC-301'),
(293, 47, 'A03', 29, 'WIRELESS MICROPHONE ADVANCE MIC-301'),
(294, 48, 'A01', 22, 'WIRELESS MICROPHONE ADVANCE MIC-884'),
(295, 48, 'A02', 28, 'WIRELESS MICROPHONE ADVANCE MIC-884'),
(296, 48, 'A03', 30, 'WIRELESS MICROPHONE ADVANCE MIC-884'),
(297, 49, 'A01', 23, 'REGULATOR GAS MIYAKO RM-201M'),
(298, 49, 'A02', 28, 'REGULATOR GAS MIYAKO RM-201M'),
(299, 49, 'A03', 30, 'REGULATOR GAS MIYAKO RM-201M'),
(300, 50, 'A01', 23, 'REGULATOR GAS QUANTUM QRH-08GB'),
(301, 50, 'A02', 28, 'REGULATOR GAS QUANTUM QRH-08GB'),
(302, 50, 'A03', 30, 'REGULATOR GAS QUANTUM QRH-08GB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jual`
--

CREATE TABLE `tb_jual` (
  `id_jual` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_jual` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jual`
--

INSERT INTO `tb_jual` (`id_jual`, `id_admin`, `nama`, `total`, `tanggal_jual`) VALUES
(2, 11, 'Deri', 'Rp 2.300.000', '2023-08-07 22:14:39'),
(3, 11, 'Roza', 'Rp 700.000', '2023-08-07 22:15:45'),
(4, 11, 'Redha', 'Rp 1.425.000', '2023-08-07 22:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jualdetail`
--

CREATE TABLE `tb_jualdetail` (
  `id_detail` int(11) NOT NULL,
  `id_jual` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jualdetail`
--

INSERT INTO `tb_jualdetail` (`id_detail`, `id_jual`, `id_produk`, `banyak`) VALUES
(1, 1, 31, 3),
(2, 1, 8, 1),
(3, 2, 38, 2),
(4, 3, 5, 1),
(5, 4, 43, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `ket`) VALUES
(1, 'MAGICOM', '-'),
(2, 'POMPA AIR', '-'),
(3, 'MAGIC JAR', ''),
(4, 'STAND MIXER', ''),
(5, 'HAND MIXER', ''),
(6, 'AIR COOLER', ''),
(7, 'WIRELESS', '\r\n'),
(9, 'REGULATOR', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `tgl_datang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `id_admin`, `id_pembelian`, `tgl_datang`) VALUES
(1, 10, 1, '2023-08-06 15:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_atribut` varchar(255) NOT NULL,
  `nama_nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_atribut`, `nama_nilai`) VALUES
(1, 'A01', 'MAGICOM'),
(3, 'A01', 'POMPA AIR'),
(18, 'A01', 'MAGIC JAR'),
(19, 'A01', 'STAND MIXER'),
(20, 'A01', 'HAND MIXER'),
(21, 'A01', 'AIR COOLER'),
(22, 'A01', 'WIRELESS'),
(23, 'A01', 'REGULATOR'),
(27, 'A02', 'Mahal'),
(28, 'A02', 'Murah'),
(29, 'A03', 'Banyak'),
(30, 'A03', 'Sedikit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderdetail`
--

CREATE TABLE `tb_orderdetail` (
  `id_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_orderdetail`
--

INSERT INTO `tb_orderdetail` (`id_detail`, `id_pembelian`, `id_produk`, `banyak`) VALUES
(1, 1, 8, 3),
(2, 1, 3, 12),
(3, 2, 1, 5),
(4, 3, 12, 10),
(5, 4, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `total` varchar(255) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `tanggal_beli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_admin`, `nama`, `alamat`, `nohp`, `total`, `ket`, `tanggal_beli`) VALUES
(2, 11, 'Adit Mulyo', 'PT Elektronik Jaya Padang', '086278398726', 'Rp 1.375.000', 'Pending', '2023-08-07 22:09:29'),
(3, 11, 'Reza Mulia', 'PT Suka Jadi', '083748744321', 'Rp 2.300.000', 'Pending', '2023-08-07 22:10:38'),
(4, 11, 'Kevin Syahputra', 'PT Solusindo', '085243121622', 'Rp 3.300.000', 'Pending', '2023-08-07 22:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nama_produk` varchar(64) DEFAULT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `id_admin`, `nama_produk`, `harga_beli`, `harga_jual`, `stock`) VALUES
(1, 1, NULL, 'MAGICOM KIRIN KRC-087', 275000, 295000, 1505),
(2, 1, NULL, 'MAGICOM KIRIN KRC-088', 500000, 520000, 508),
(3, 1, NULL, 'MAGICOM KIRIN KRC-389', 580000, 595000, 113),
(4, 1, NULL, 'MAGICOM KIRIN KRC-620D', 600000, 625000, 10),
(5, 1, NULL, 'MAGICOM MITO R7 5 IN 1', 680000, 700000, 5),
(6, 1, NULL, 'MAGICOM PHILIPS HD-3119', 650000, 675000, 5),
(7, 1, NULL, 'MAGICOM PHILIPS HD-3131', 700000, 725000, 7),
(8, 1, NULL, 'MAGICOM TRISONIC T-707A 1,8L', 240000, 260000, 6),
(9, 1, NULL, 'MAGICOM COSMOS CRJ-1803 1,2 L', 270000, 295000, 5),
(10, 1, NULL, 'MAGICOM COSMOS CRJ-9303', 460000, 475000, 5),
(11, 1, NULL, 'MAGICOM MIYAKO MCM-5122C', 250000, 275000, 7),
(12, 1, NULL, 'MAGICOM MIYAKO MCM-606A', 230000, 250000, 5),
(13, 1, NULL, 'MAGICOM MIYAKO MCM-508SBC', 300000, 325000, 6),
(14, 1, NULL, 'MAGICOM MIYAKO MCM-508', 260000, 285000, 3),
(15, 1, NULL, 'MAGICOM MIYAKO MCM-507', 275000, 290000, 4),
(16, 1, NULL, 'MAGICOM YONGMA SMC-8045 1,3L', 695000, 715000, 17),
(17, 1, NULL, 'MAGICOM YONGMA SMC-6013 2.L', 730000, 745000, 14),
(18, 1, NULL, 'MAGICOM YONGMA SMC-8033 2.L', 730000, 745000, 13000),
(19, 1, NULL, 'MAGICOM YONGMA SMC-5031 1.3 L', 630000, 645000, 4),
(20, 1, NULL, 'MAGICOM YONGMA SMC-7033 2.L', 730000, 745000, 10),
(21, 2, NULL, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-135E', 625000, 650000, 4),
(22, 2, NULL, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-128BIT', 525000, 550000, 4),
(23, 2, NULL, 'POMPA AIR LISTRIK OTOMATIS SHIMIZU PS-226BIT', 970000, 995000, 5),
(24, 3, NULL, 'MAGIC JAR JUMBO YONGMA SMC-5049 5.4 L', 2000000, 2050000, 19),
(25, 3, NULL, 'MAGIC JAR JUMBO KIRIN KRW-920S 20. L', 1650000, 1725000, 7),
(26, 3, NULL, 'MAGIC JAR JUMBO MIYAKO MCG-171 16.7 L', 1450000, 1475000, 7),
(27, 4, NULL, 'STAND MIXER TURBO EHM-9588 5.5L', 2280000, 2325000, 3),
(28, 4, NULL, 'STAND MIXER TURBO EHM-9595 5 L', 1320000, 1375000, 6),
(29, 4, NULL, 'STAND MIXER TURBO EHM-9090', 370000, 395000, 6),
(30, 4, NULL, 'STAND MIXER MITO MX 700 7 L', 2100000, 2375000, 5),
(31, 4, NULL, 'STAND MIXER MITO MX 100 5 L', 1900000, 1995000, 17),
(32, 4, NULL, 'STAND MIXER PHILIPS HR-1559', 630000, 645000, 4),
(33, 5, NULL, 'HAND MIXER PHILIPS HR-1552', 480000, 495000, 5),
(34, 4, NULL, 'STAND MIXER MIYAKO SM-625', 300000, 325000, 5),
(35, 4, NULL, 'STAND MIXER COSMOS CM-1689', 370000, 395000, 10),
(36, 4, NULL, 'STAND MIXER KIRIN KSM-391S', 355000, 375000, 6),
(37, 5, NULL, 'HAND MIXER MIYAKO HM-620', 190000, 215000, 2),
(38, 6, NULL, 'AIR COOLER GREE GTA-1COOL 4', 1100000, 1150000, 2),
(39, 6, NULL, 'AIRCOOLER SHARP PJ-A26MY-B', 1000000, 1025000, 5),
(40, 6, NULL, 'AIRCOOLER SHARP PJ-A36TY-B/W', 1180000, 1225000, 4),
(41, 6, NULL, 'AIRCOOLER SHARP PJ-A55TY-B/W', 1370000, 1395000, 5),
(42, 6, NULL, 'AIRCOOLER SHARP PJ-A77TY-E', 1700000, 1725000, 5),
(43, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-101', 275000, 285000, 0),
(44, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-102', 250000, 265000, 5),
(45, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-103', 275000, 285000, 5),
(46, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-201', 475000, 485000, 4),
(47, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-301', 800000, 825000, 5),
(48, 7, NULL, 'WIRELESS MICROPHONE ADVANCE MIC-884', 80000, 90000, 5),
(49, 9, NULL, 'REGULATOR GAS MIYAKO RM-201M', 75000, 85000, 5),
(50, 9, NULL, 'REGULATOR GAS QUANTUM QRH-08GB', 80000, 90000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp`
--

CREATE TABLE `tb_temp` (
  `id_temp` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_temp` date NOT NULL,
  `jam_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_atribut`
--
ALTER TABLE `tb_atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indexes for table `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD PRIMARY KEY (`idb`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `tb_jualdetail`
--
ALTER TABLE `tb_jualdetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_temp`
--
ALTER TABLE `tb_temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_beli`
--
ALTER TABLE `tb_beli`
  MODIFY `idb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `tb_jual`
--
ALTER TABLE `tb_jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jualdetail`
--
ALTER TABLE `tb_jualdetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tb_temp`
--
ALTER TABLE `tb_temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
