-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2015 at 01:15 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esto`
--
CREATE DATABASE `esto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esto`;

-- --------------------------------------------------------

--
-- Table structure for table `bis`
--

CREATE TABLE IF NOT EXISTS `bis` (
  `kode` int(5) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nopol` varchar(11) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bis`
--

INSERT INTO `bis` (`kode`, `nama`, `nopol`, `kapasitas`, `status`) VALUES
(1, 'terong', 'H 1234 BH', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE IF NOT EXISTS `jalur` (
  `KDjalur` int(5) NOT NULL,
  `KotaAsal` varchar(25) NOT NULL,
  `KotaTujuan` varchar(25) NOT NULL,
  `JamBerangkat` varchar(25) NOT NULL,
  `Harga` int(10) NOT NULL,
  `KDbis` int(5) NOT NULL,
  PRIMARY KEY (`KDjalur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`KDjalur`, `KotaAsal`, `KotaTujuan`, `JamBerangkat`, `Harga`, `KDbis`) VALUES
(1, 'SALATIGA', 'SEMARANG', '10.00', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `noTiket` int(5) NOT NULL,
  `KDjalur` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `sheet` int(5) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `idUser` int(5) NOT NULL,
  PRIMARY KEY (`noTiket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`noTiket`, `KDjalur`, `harga`, `tanggal`, `sheet`, `jam`, `idUser`) VALUES
(1, 1, 20000, '2015-12-06', 1, '10.00', 1),
(2, 1, 20000, '2015-12-06', 2, '10.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tools_gallery`
--

CREATE TABLE IF NOT EXISTS `tools_gallery` (
  `gambar` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools_gallery`
--

INSERT INTO `tools_gallery` (`gambar`, `keterangan`) VALUES
('a.jpg', 'tes'),
('b.jpg', 'tes2'),
('d.jpg', 'tess'),
('c.jpg', 'teees');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `telp`, `pass`, `email`) VALUES
(1, 'abc', 'salatiga', '08123456789', 'b', 'abc@esto.com'),
(2, '123', 'Semarang', '0813234435', 'a', '123@esto.com');
