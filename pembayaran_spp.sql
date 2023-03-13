-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2023 at 09:53 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengguna` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128))   BEGIN
SELECT * FROM pengguna WHERE username = in_username and password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswa` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128))   BEGIN
SELECT * FROM pengguna WHERE username = in_username AND password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDataKelas` (IN `in_nama` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
INSERT INTO kelas VALUES (NULL, in_nama, in_kompetensi_keahlian);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDataPembayaran` (IN `in_tahun_ajaran` VARCHAR(9), IN `in_nominal` INT(11))   BEGIN
INSERT INTO pembayaran VALUES (NULL, in_tahun_ajaran, in_nominal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDataPengguna` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(18), IN `in_role` ENUM('admin','petugas','siswa'))   BEGIN
INSERT INTO pengguna VALUES (NULL, in_username, in_password, in_role);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDataSiswa` (IN `in_nisn` VARCHAR(10), IN `in_nis` VARCHAR(5), IN `in_nama` VARCHAR(50), IN `in_alamat` TEXT, IN `in_telepon` VARCHAR(14), IN `in_kelas_id` INT, IN `in_pengguna_id` INT, IN `in_pembayaran_id` INT)   BEGIN
INSERT INTO siswa VALUES (NULL, in_nisn, in_nis, in_nama, in_alamat, in_telepon, in_kelas_id, in_pengguna_id, in_pembayaran_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllKelas` ()   SELECT * FROM kelas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllPetugas` ()   SELECT * FROM petugas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllSiswa` ()   SELECT * FROM siswa$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `getallsiswa`
-- (See below for the actual view)
--
CREATE TABLE `getallsiswa` (
`id_siswa` int(11)
,`nisn` varchar(10)
,`nis` varchar(5)
,`nama_siswa` varchar(50)
,`alamat` text
,`telepon` varchar(14)
,`id_kelas` int(11)
,`nama` varchar(10)
,`kompetensi_keahlian` varchar(50)
,`id_pembayaran` int(11)
,`tahun_ajaran` varchar(9)
,`nominal` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `kompetensi_keahlian`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'MM', 'Multimedia'),
(4, 'TKJ', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tahun_ajaran`, `nominal`) VALUES
(1, '2021', 1200000),
(2, '2022', 1200000),
(3, '2021', 1200000),
(5, '2020', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(1, 'admin1', '123', 'admin'),
(2, 'petugas1', '234', 'petugas'),
(3, 'siswa1', '345', 'siswa'),
(4, '2334', '234', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `pengguna_id`) VALUES
(1, 'Rum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(4, '1345677', '16788', 'Dani', 'jl. subur 1', '08555555555', 1, 3, 2),
(5, '234567', '2334', 'a', 'jl.sari 1', '083333333335', 2, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `tanggal_dibayar` int(2) NOT NULL,
  `tahun_dibayar` int(4) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `getallsiswa`
--
DROP TABLE IF EXISTS `getallsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getallsiswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama_siswa`, `siswa`.`alamat` AS `alamat`, `siswa`.`telepon` AS `telepon`, `kelas`.`id_kelas` AS `id_kelas`, `kelas`.`nama` AS `nama`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian`, `pembayaran`.`id_pembayaran` AS `id_pembayaran`, `pembayaran`.`tahun_ajaran` AS `tahun_ajaran`, `pembayaran`.`nominal` AS `nominal` FROM ((`siswa` left join `kelas` on((`siswa`.`kelas_id` = `kelas`.`id_kelas`))) left join `pembayaran` on((`siswa`.`pembayaran_id` = `pembayaran`.`id_pembayaran`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `kelas_id` (`kelas_id`,`pengguna_id`,`pembayaran_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `siswa_id` (`siswa_id`,`petugas_id`,`pembayaran_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
