-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 01:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `his_pulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id_deposit` int(11) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id_deposit`, `waktu_masuk`, `deposit`) VALUES
(11, '2017-01-09 00:00:00', 107875),
(12, '2017-01-19 00:00:00', 300000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `depo_baru`
--
CREATE TABLE `depo_baru` (
`deposit` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `depo_terakhir`
--
CREATE TABLE `depo_terakhir` (
`deposit_akhir` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `nominal`, `harga_jual`) VALUES
(1, 5, 7000),
(2, 10, 12000),
(3, 15, 17000),
(4, 20, 22000),
(5, 25, 27000),
(6, 50, 52000),
(17, 100, 100000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_hutang_all`
--
CREATE TABLE `jumlah_hutang_all` (
`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_keluar_all`
--
CREATE TABLE `jumlah_keluar_all` (
`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_laba_all`
--
CREATE TABLE `jumlah_laba_all` (
`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_lunas_all`
--
CREATE TABLE `jumlah_lunas_all` (
`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_total_all`
--
CREATE TABLE `jumlah_total_all` (
`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `jumlah`, `keterangan`) VALUES
(1, '19-01-2017', 90000, 'lain lain');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trx` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `tanggal_trx` text NOT NULL,
  `tanggal_lunas` text NOT NULL,
  `deposit_akhir` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `keterangan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `user`, `id_harga`, `tanggal_trx`, `tanggal_lunas`, `deposit_akhir`, `harga_modal`, `laba`, `keterangan`) VALUES
(4, '089509221110', 2, '09-01-2017', '14-01-2017', 97750, 10125, 1875, 'LUNAS'),
(5, '0895700885489', 1, '10-01-2017', '11-01-2017', 92575, 5175, 1825, 'LUNAS'),
(6, '085725031264', 1, '10-01-2017', '19-01-2017', 86975, 5600, 1400, 'LUNAS'),
(7, '085725626073', 1, '12-01-2017', '19-01-2017', 81375, 5600, 1400, 'LUNAS'),
(8, '085729397888', 2, '13-01-2017', '14-01-2017', 70775, 10600, 1400, 'LUNAS'),
(9, '085725626073', 1, '14-01-2017', '19-01-2017', 65175, 5600, 1400, 'LUNAS'),
(10, '085725031264', 1, '14-01-2017', '19-01-2017', 59575, 5600, 1400, 'LUNAS'),
(11, '08985242966', 4, '16-01-2017', '', 39450, 20125, 1875, 'HUTANG'),
(12, '0895700885489', 2, '17-01-2017', '17-01-2017', 29325, 10125, 1875, 'LUNAS'),
(13, '085725626073', 1, '17-01-2017', '17-01-2017', 23725, 5600, 1400, 'LUNAS'),
(14, '082218603334', 2, '18-01-2017', '', 13100, 10625, 1375, 'HUTANG'),
(15, '088216637184', 2, '18-01-2017', '18-01-2017', 2775, 10325, 1675, 'LUNAS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksihutang`
--
CREATE TABLE `transaksihutang` (
`id_trx` int(11)
,`user` varchar(50)
,`nominal` int(11)
,`harga_modal` int(11)
,`harga_jual` int(11)
,`laba` int(11)
,`tanggal_trx` text
,`keterangan` char(10)
,`deposit_akhir` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksilunas`
--
CREATE TABLE `transaksilunas` (
`id_trx` int(11)
,`user` varchar(50)
,`nominal` int(11)
,`harga_modal` int(11)
,`harga_jual` int(11)
,`laba` int(11)
,`tanggal_trx` text
,`keterangan` char(10)
,`deposit_akhir` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksisemua`
--
CREATE TABLE `transaksisemua` (
`id_trx` int(11)
,`user` varchar(50)
,`nominal` int(11)
,`harga_modal` int(11)
,`harga_jual` int(11)
,`laba` int(11)
,`tanggal_trx` text
,`keterangan` char(10)
,`deposit_akhir` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksitoday`
--
CREATE TABLE `transaksitoday` (
`id_trx` int(11)
,`user` varchar(50)
,`nominal` int(11)
,`harga_modal` int(11)
,`harga_jual` int(11)
,`laba` int(11)
,`tanggal_trx` text
,`keterangan` char(10)
,`deposit_akhir` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `depo_baru`
--
DROP TABLE IF EXISTS `depo_baru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `depo_baru`  AS  (select `deposit`.`deposit` AS `deposit` from `deposit` where `deposit`.`id_deposit` in (select max(`deposit`.`id_deposit`) from `deposit`)) ;

-- --------------------------------------------------------

--
-- Structure for view `depo_terakhir`
--
DROP TABLE IF EXISTS `depo_terakhir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `depo_terakhir`  AS  (select `transaksi`.`deposit_akhir` AS `deposit_akhir` from `transaksi` where `transaksi`.`id_trx` in (select max(`transaksi`.`id_trx`) from `transaksi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_hutang_all`
--
DROP TABLE IF EXISTS `jumlah_hutang_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_hutang_all`  AS  (select sum(`harga`.`harga_jual`) AS `jumlah` from (`transaksi` join `harga` on((`harga`.`id_harga` = `transaksi`.`id_harga`))) where (`transaksi`.`keterangan` = 'HUTANG')) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_keluar_all`
--
DROP TABLE IF EXISTS `jumlah_keluar_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_keluar_all`  AS  (select sum(`pengeluaran`.`jumlah`) AS `jumlah` from `pengeluaran`) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_laba_all`
--
DROP TABLE IF EXISTS `jumlah_laba_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_laba_all`  AS  (select sum(`transaksi`.`laba`) AS `jumlah` from `transaksi`) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_lunas_all`
--
DROP TABLE IF EXISTS `jumlah_lunas_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_lunas_all`  AS  (select sum(`harga`.`harga_jual`) AS `jumlah` from (`transaksi` join `harga` on((`harga`.`id_harga` = `transaksi`.`id_harga`))) where (`transaksi`.`keterangan` = 'LUNAS')) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_total_all`
--
DROP TABLE IF EXISTS `jumlah_total_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_total_all`  AS  (select sum(`harga`.`harga_jual`) AS `jumlah` from (`transaksi` join `harga` on((`harga`.`id_harga` = `transaksi`.`id_harga`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `transaksihutang`
--
DROP TABLE IF EXISTS `transaksihutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksihutang`  AS  (select `transaksi`.`id_trx` AS `id_trx`,`transaksi`.`user` AS `user`,`harga`.`nominal` AS `nominal`,`transaksi`.`harga_modal` AS `harga_modal`,`harga`.`harga_jual` AS `harga_jual`,`transaksi`.`laba` AS `laba`,`transaksi`.`tanggal_trx` AS `tanggal_trx`,`transaksi`.`keterangan` AS `keterangan`,`transaksi`.`deposit_akhir` AS `deposit_akhir` from (`transaksi` join `harga` on((`transaksi`.`id_harga` = `harga`.`id_harga`))) where (`transaksi`.`keterangan` = 'HUTANG')) ;

-- --------------------------------------------------------

--
-- Structure for view `transaksilunas`
--
DROP TABLE IF EXISTS `transaksilunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksilunas`  AS  (select `transaksi`.`id_trx` AS `id_trx`,`transaksi`.`user` AS `user`,`harga`.`nominal` AS `nominal`,`transaksi`.`harga_modal` AS `harga_modal`,`harga`.`harga_jual` AS `harga_jual`,`transaksi`.`laba` AS `laba`,`transaksi`.`tanggal_trx` AS `tanggal_trx`,`transaksi`.`keterangan` AS `keterangan`,`transaksi`.`deposit_akhir` AS `deposit_akhir` from (`transaksi` join `harga` on((`transaksi`.`id_harga` = `harga`.`id_harga`))) where (`transaksi`.`keterangan` = 'LUNAS')) ;

-- --------------------------------------------------------

--
-- Structure for view `transaksisemua`
--
DROP TABLE IF EXISTS `transaksisemua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksisemua`  AS  (select `transaksi`.`id_trx` AS `id_trx`,`transaksi`.`user` AS `user`,`harga`.`nominal` AS `nominal`,`transaksi`.`harga_modal` AS `harga_modal`,`harga`.`harga_jual` AS `harga_jual`,`transaksi`.`laba` AS `laba`,`transaksi`.`tanggal_trx` AS `tanggal_trx`,`transaksi`.`keterangan` AS `keterangan`,`transaksi`.`deposit_akhir` AS `deposit_akhir` from (`transaksi` join `harga` on((`transaksi`.`id_harga` = `harga`.`id_harga`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `transaksitoday`
--
DROP TABLE IF EXISTS `transaksitoday`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksitoday`  AS  (select `transaksi`.`id_trx` AS `id_trx`,`transaksi`.`user` AS `user`,`harga`.`nominal` AS `nominal`,`transaksi`.`harga_modal` AS `harga_modal`,`harga`.`harga_jual` AS `harga_jual`,`transaksi`.`laba` AS `laba`,`transaksi`.`tanggal_trx` AS `tanggal_trx`,`transaksi`.`keterangan` AS `keterangan`,`transaksi`.`deposit_akhir` AS `deposit_akhir` from (`transaksi` join `harga` on((`transaksi`.`id_harga` = `harga`.`id_harga`))) where (`transaksi`.`tanggal_trx` = convert(date_format(now(),'%d-%m-%Y') using latin1))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
