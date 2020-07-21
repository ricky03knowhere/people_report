-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2020 at 03:02 PM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE IF NOT EXISTS `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `picture`) VALUES
('23728298181', 'Hayomi Minokawa', 'ayumi', '09877', '082739454345', 'FB_IMG_15765615917707728.jpg'),
('66464828822', 'Ina Inggrawati', 'ina', '333', '087534654636', 'aeriereal-role-model-spring-2020-lana-condor-photo-credit-andrew-budda-3-1582597502.jpg'),
('66464792828', 'Nuna Kirana', 'Nuna', '4699', '084854346366', 'FB_IMG_15765615971641949.jpg'),
('33322212009', 'Nyi X', 'nyi', '111', '0854349464643', '1b2fb0c7ca4d1977647bc87a421b037a.jpg'),
('64646640089', 'Putri Renita', 'lucu', '333', '0824346464', 'FB_IMG_15738798677267579.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','terverifikasi') NOT NULL,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(37373, '2020-04-25', '66464792828', 'Ada Pencurian dan pembacokan senjata tajam', '168954.jpg', 'terverifikasi'),
(46646, '2020-04-25', '66464828822', 'Pos Cibatek rubuh oleh badai', 'FB_IMG_15755608288090882.jpg', '0'),
(64346, '2020-06-19', '66464828822', 'Dinding Jalan dicorat coret ', 'FB_IMG_15875288391193291.jpg', '0'),
(59464, '2020-06-10', '23728298181', 'Jalan Cibuntu rusak dan berlubang', 'FB_IMG_15721463319229108.jpg', ''),
(11133, '2020-07-10', '23728298181', 'Ada Perampokan', 'FB_IMG_15722452711408384.jpg', 'terverifikasi'),
(66333, '2020-07-18', '33322212009', 'Tanah amblas di daerah Bojong', 'FB_IMG_15697402403679544.jpg', ''),
(55333, '2020-07-18', '33322212009', 'Perampokan uang di dekat rumah', 'IMG-20200715-WA0000.jpg', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas','masyarakat','') NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `picture`) VALUES
(111, 'Hayomi', 'yomi', '777', '082928285250', 'admin', 'dcb0bc71bbd9e42c1f3bba6c36b73a021.jpg'),
(222, 'Sweet DarkGreen', 'sweet', '333', '083927283237', 'petugas', 'FB_IMG_15765615883579522.jpg'),
(333, 'Nyi X', 'nyai', '111', '082927229113', 'masyarakat', '1b2fb0c7ca4d1977647bc87a421b037a1.jpg'),
(666, 'Zulaikha Syadie', 'ika', '111', '085665508888', 'admin', 'FB_IMG_15745066640456488.jpg'),
(306, 'Verlina', 'ver', '111', '08854564805', 'masyarakat', 'FB_IMG_15765615850108609.jpg'),
(606, 'Sonic', 'son', '6767', '085737663331', 'masyarakat', 'FB_IMG_15854698340365878.jpg'),
(464, 'Mamat Basreng', 'mamat', 'baso01', '08543131326', 'petugas', 'FB_IMG_15875290703432810.jpg'),
(909, 'Ijat', 'Ijat', '009', '085665695995', 'petugas', 'dragon_ball_z_ss.jpg'),
(31313, 'neng gigi', 'nyai', '111', '6131313', 'admin', 'images-10.png');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(12337, 59464, '2020-07-10', 'Kami segera kirimkan bantuan', 606),
(12336, 37373, '2020-07-14', 'Kami segera ke TKP', 222);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
