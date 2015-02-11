-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 07:17 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categorytree_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `uploader_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=139 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `categorytree_id`, `name`, `draft`, `public`, `active`, `description`, `start`, `end`, `uploader_id`) VALUES
(1, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(2, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(3, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(4, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(5, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(6, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(7, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(8, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(9, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(10, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-08', '2015-01-15', 5),
(11, NULL, '1', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(12, NULL, '1', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(13, NULL, '1', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(14, NULL, '1', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(15, NULL, '1/2015', 1, 1, 1, 'aaa', '2015-01-20', '2015-01-20', 5),
(16, NULL, '1/2015', 1, 1, 1, 'aaa', '2015-01-20', '2015-01-20', 5),
(17, NULL, '1/2015', 1, 1, 1, 'aaa', '2015-01-20', '2015-01-20', 5),
(18, NULL, 'a1', 1, 1, 1, '11', '2015-01-20', '2015-01-20', 5),
(19, NULL, 'a1', 1, 1, 1, '11', '2015-01-20', '2015-01-20', 5),
(20, NULL, '1', 1, 1, 1, '1', '2015-01-20', '2015-01-20', 5),
(21, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(22, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-20', '2015-01-20', 5),
(23, NULL, '1/2015', 1, 1, 1, 'Lorem ipsum', '2015-01-20', '2015-01-20', 5),
(24, NULL, '1/2015', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(25, NULL, '1/2015', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(26, NULL, '1/2015', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(27, NULL, '1/2015', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(28, NULL, '1/2015', 1, 1, 1, 'aq', '2015-01-20', '2015-01-20', 5),
(29, NULL, '1/2015', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(30, NULL, '1/2015', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(31, NULL, 'aa', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(32, NULL, 'aa', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(33, NULL, '11', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(34, NULL, '11', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(35, NULL, '11', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(36, NULL, '11', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(37, NULL, 'aa', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(38, NULL, 'aa', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(39, NULL, 'aa', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(40, NULL, '1', 1, 1, 1, 'aa', '2015-01-20', '2015-01-20', 5),
(41, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(42, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(43, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(44, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(45, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(46, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(47, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(48, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(49, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(50, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(51, NULL, '1', 1, 1, 1, 'q', '2015-01-20', '2015-01-20', 5),
(52, NULL, '1', 1, 1, 1, 'q', '2015-01-20', '2015-01-20', 5),
(53, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(54, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(55, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(56, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(57, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(58, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(59, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(60, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(61, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(62, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(63, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(64, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(65, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(66, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(67, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(68, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(69, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(70, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(71, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(72, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(73, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(74, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(75, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(76, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(77, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(78, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(79, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(80, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(81, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(82, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(83, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(84, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(85, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(86, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(87, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(88, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(89, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(90, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(91, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(92, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(93, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(94, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(95, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(96, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(97, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(98, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(99, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(100, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(101, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(102, NULL, '1', 1, 1, 1, 'a', '2015-01-20', '2015-01-20', 5),
(103, NULL, '11', 1, 1, 1, '111', '2015-01-28', '2015-01-20', 5),
(104, NULL, '03/SP2/XVIII.JATIM/12/2014', 1, 1, 1, 'Focus Group Discussion (FGD) Penyempurnaan Aplikasi Sistem', '2015-02-01', '2015-02-01', 5),
(105, NULL, '07/SP2/XVIII.JATIM/09/2014', 1, 1, 1, 'Kegiatan Pemaparan Hasil Diklat Pemeriksaan Barang dan Jasa', '2014-09-30', '2014-09-30', 5),
(106, NULL, '109/2014', 1, 1, 1, 'Pemaparan Hasil Diklat Pemeriksaan Investigasi', '2014-09-30', '2014-09-30', 5),
(107, NULL, '109/2014', 1, 1, 1, 'Pemaparan Hasil Diklat Pemeriksaan Investigasi', '2014-09-30', '2014-09-30', 5),
(108, NULL, '/SP2/XVIII.JATIM/01/2015', 1, 1, 1, 'lorem ipsum dolor sit amet', '2015-01-29', '2015-01-29', 5),
(109, NULL, '/SP2/XVIII.JATIM/01/2015', 1, 1, 1, 'lorem ipsum dolor sit amet', '2015-01-29', '2015-01-29', 5),
(110, NULL, '/SP2/XVIII.JATIM/01/2015', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2015-01-29', '2015-01-29', 5),
(111, NULL, '/SP2/XVIII.JATIM/01/2015', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2015-01-29', '2015-01-29', 5),
(112, NULL, '/SP2/XVIII.JATIM/01/2015', 1, 1, 1, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '2015-01-29', '2015-01-29', 5),
(113, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2015-01-29', '2015-01-29', 5),
(114, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'lorem ipsum dolor sit amet', '2015-01-29', '2015-01-29', 5),
(115, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'Pemaparan Hasil Diklat Pemeriksaan Investigasi 2', '2015-01-29', '2015-01-29', 5),
(116, NULL, '4/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'Pemaparan Hasil Diklat Pemeriksaan Investigasi', '2015-01-29', '2015-01-29', 5),
(117, NULL, '/SP2/XVIII.SBY/01/2010', 1, 1, 1, 'coba kegiatan tahun 2010', '2010-01-05', '2010-01-05', 5),
(118, NULL, '/SP2/XVIII.SBY/01/2010', 1, 1, 1, 'coba kegiatan tahun 2010', '2010-01-05', '2010-01-05', 5),
(119, NULL, '/SP2/XVIII.SBY/01/2010', 1, 1, 1, 'coba kegiatan tahun 2010', '2010-01-05', '2010-01-05', 5),
(120, NULL, '/SP2/XVIII.SBY/01/2010', 1, 1, 1, 'coba kegiatan tahun 2010', '2010-01-05', '2010-01-05', 5),
(121, NULL, '/SP2/XVIII.SBY/02/2011', 1, 1, 1, 'coba kegiatan tahun 2011', '2011-02-01', '2011-02-01', 5),
(122, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'awal tahun 2015', '2015-01-01', '2015-01-01', 5),
(123, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'tanggal 2 januari', '2015-01-02', '2015-01-02', 5),
(124, NULL, '1/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari', '2015-01-31', '2015-01-31', 5),
(125, NULL, '2/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(126, NULL, '3/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(127, NULL, '4/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(128, NULL, '5/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(129, NULL, '6/SP2/XVIII.SBY/01/2015', 0, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(130, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(131, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'awal tahun 2015', '2015-01-31', '2015-01-31', 5),
(132, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(133, NULL, '/SP2/XVIII.SBY/01/2015', 1, 1, 1, 'akhir bulan januari 2015', '2015-01-31', '2015-01-31', 5),
(134, NULL, '1/XIX.SBY', 0, 1, 1, 'addison design pattern', '2015-02-03', '2015-02-03', 5),
(135, NULL, '/ST/XVIII.SBY/02/2015', 1, 1, 1, 'Pemeriksaan Belanja Infrastruktur Kota Probolinggo', '2015-02-23', '2015-03-28', 5),
(136, NULL, '/ST/XVIII.SBY/01/2015', 1, 1, 1, 'Pemeriksaan Pendahuluan atas Laporan Keuangan Pemerintah Daerah (LKPD) Tahun Anggaran 2014 pada Pemerintah Kabupaten Situbondo di Situbondo.', '2015-01-30', '2015-03-08', 5),
(137, NULL, '/ST/XVIII.SBY/01/2015', 1, 1, 1, 'Pemeriksaan Pendahuluan atas Laporan Keuangan Pemerintah Daerah (LKPD) Tahun Anggaran 2014 pada Pemerintah Kabupaten Situbondo di Situbondo.', '2015-01-30', '2015-03-08', 5),
(138, NULL, '/ST/XVIII.SBY/01/2015', 1, 1, 1, 'Pemeriksaan Pendahuluan atas Laporan Keuangan Pemerintah Daerah (LKPD) Tahun Anggaran 2014 pada Pemerintah Kabupaten Situbondo di Situbondo.', '2015-01-30', '2015-02-24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `activities_users`
--

CREATE TABLE IF NOT EXISTS `activities_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `activity_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `duty_id` int(11) NOT NULL DEFAULT '9',
  `tagged` tinyint(1) NOT NULL DEFAULT '1',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1480 ;

--
-- Dumping data for table `activities_users`
--

INSERT INTO `activities_users` (`id`, `activity_id`, `user_id`, `duty_id`, `tagged`, `start`, `end`, `active`) VALUES
(1, 0, 0, 9, 1, NULL, NULL, 1),
(2, 0, 0, 9, 1, NULL, NULL, 1),
(3, 0, 0, 9, 1, NULL, NULL, 1),
(4, 0, 0, 9, 1, NULL, NULL, 1),
(5, 0, 0, 9, 1, NULL, NULL, 1),
(6, 0, 0, 9, 1, NULL, NULL, 1),
(7, 0, 0, 9, 1, NULL, NULL, 1),
(8, 11, 5, 9, 1, NULL, NULL, 1),
(9, 11, 4, 9, 1, NULL, NULL, 1),
(10, 11, 3, 9, 1, NULL, NULL, 1),
(11, 11, 2, 9, 1, NULL, NULL, 1),
(12, 11, 6, 9, 1, NULL, NULL, 1),
(13, 11, 1, 9, 1, NULL, NULL, 1),
(14, 12, 5, 9, 1, NULL, NULL, 1),
(15, 12, 4, 9, 1, NULL, NULL, 1),
(16, 12, 3, 9, 1, NULL, NULL, 1),
(17, 12, 2, 9, 1, NULL, NULL, 1),
(18, 12, 6, 9, 1, NULL, NULL, 1),
(19, 12, 1, 9, 1, NULL, NULL, 1),
(20, 13, 5, 9, 1, NULL, NULL, 1),
(21, 13, 4, 9, 1, NULL, NULL, 1),
(22, 13, 3, 9, 1, NULL, NULL, 1),
(23, 13, 2, 9, 1, NULL, NULL, 1),
(24, 13, 6, 9, 1, NULL, NULL, 1),
(25, 13, 1, 9, 1, NULL, NULL, 1),
(26, 14, 5, 9, 1, NULL, NULL, 1),
(27, 14, 4, 9, 1, NULL, NULL, 1),
(28, 14, 3, 9, 1, NULL, NULL, 1),
(29, 14, 2, 9, 1, NULL, NULL, 1),
(30, 14, 6, 9, 1, NULL, NULL, 1),
(31, 14, 1, 9, 1, NULL, NULL, 1),
(32, 15, 5, 9, 1, NULL, NULL, 1),
(33, 15, 4, 9, 1, NULL, NULL, 1),
(34, 15, 3, 9, 1, NULL, NULL, 1),
(35, 15, 2, 9, 1, NULL, NULL, 1),
(36, 15, 6, 9, 1, NULL, NULL, 1),
(37, 15, 1, 9, 1, NULL, NULL, 1),
(38, 16, 5, 9, 1, NULL, NULL, 1),
(39, 16, 4, 9, 1, NULL, NULL, 1),
(40, 16, 3, 9, 1, NULL, NULL, 1),
(41, 16, 2, 9, 1, NULL, NULL, 1),
(42, 16, 6, 9, 1, NULL, NULL, 1),
(43, 16, 1, 9, 1, NULL, NULL, 1),
(44, 17, 5, 9, 1, NULL, NULL, 1),
(45, 17, 4, 9, 1, NULL, NULL, 1),
(46, 17, 3, 9, 1, NULL, NULL, 1),
(47, 17, 2, 9, 1, NULL, NULL, 1),
(48, 17, 6, 9, 1, NULL, NULL, 1),
(49, 17, 1, 9, 1, NULL, NULL, 1),
(50, 18, 5, 9, 1, NULL, NULL, 1),
(51, 18, 4, 9, 1, NULL, NULL, 1),
(52, 18, 3, 9, 1, NULL, NULL, 1),
(53, 18, 2, 9, 1, NULL, NULL, 1),
(54, 18, 6, 9, 1, NULL, NULL, 1),
(55, 18, 1, 9, 1, NULL, NULL, 1),
(56, 19, 5, 9, 1, NULL, NULL, 1),
(57, 19, 4, 9, 1, NULL, NULL, 1),
(58, 19, 3, 9, 1, NULL, NULL, 1),
(59, 19, 2, 9, 1, NULL, NULL, 1),
(60, 19, 6, 9, 1, NULL, NULL, 1),
(61, 19, 1, 9, 1, NULL, NULL, 1),
(62, 20, 5, 9, 1, NULL, NULL, 1),
(63, 20, 4, 9, 1, NULL, NULL, 1),
(64, 20, 3, 9, 1, NULL, NULL, 1),
(65, 20, 2, 9, 1, NULL, NULL, 1),
(66, 20, 6, 9, 1, NULL, NULL, 1),
(67, 20, 1, 9, 1, NULL, NULL, 1),
(68, 21, 5, 9, 1, NULL, NULL, 1),
(69, 21, 4, 9, 1, NULL, NULL, 1),
(70, 21, 3, 9, 1, NULL, NULL, 1),
(71, 21, 2, 9, 1, NULL, NULL, 1),
(72, 21, 6, 9, 1, NULL, NULL, 1),
(73, 21, 1, 9, 1, NULL, NULL, 1),
(74, 22, 5, 9, 1, NULL, NULL, 1),
(75, 22, 4, 9, 1, NULL, NULL, 1),
(76, 22, 3, 9, 1, NULL, NULL, 1),
(77, 22, 2, 9, 1, NULL, NULL, 1),
(78, 22, 6, 9, 1, NULL, NULL, 1),
(79, 22, 1, 9, 1, NULL, NULL, 1),
(80, 23, 5, 9, 1, NULL, NULL, 1),
(81, 23, 4, 9, 1, NULL, NULL, 1),
(82, 23, 3, 9, 1, NULL, NULL, 1),
(83, 23, 2, 9, 1, NULL, NULL, 1),
(84, 23, 6, 9, 1, NULL, NULL, 1),
(85, 23, 1, 9, 1, NULL, NULL, 1),
(86, 24, 5, 9, 1, NULL, NULL, 1),
(87, 24, 4, 9, 1, NULL, NULL, 1),
(88, 24, 3, 9, 1, NULL, NULL, 1),
(89, 24, 2, 9, 1, NULL, NULL, 1),
(90, 24, 6, 9, 1, NULL, NULL, 1),
(91, 24, 1, 9, 1, NULL, NULL, 1),
(92, 0, 0, 9, 1, NULL, NULL, 1),
(93, 0, 0, 9, 1, NULL, NULL, 1),
(94, 25, 5, 9, 1, NULL, NULL, 1),
(95, 25, 4, 9, 1, NULL, NULL, 1),
(96, 25, 3, 9, 1, NULL, NULL, 1),
(97, 25, 2, 9, 1, NULL, NULL, 1),
(98, 25, 6, 9, 1, NULL, NULL, 1),
(99, 25, 1, 9, 1, NULL, NULL, 1),
(100, 26, 5, 9, 1, NULL, NULL, 1),
(101, 26, 4, 9, 1, NULL, NULL, 1),
(102, 26, 3, 9, 1, NULL, NULL, 1),
(103, 26, 2, 9, 1, NULL, NULL, 1),
(104, 26, 6, 9, 1, NULL, NULL, 1),
(105, 26, 1, 9, 1, NULL, NULL, 1),
(106, 27, 5, 9, 1, NULL, NULL, 1),
(107, 27, 4, 9, 1, NULL, NULL, 1),
(108, 27, 3, 9, 1, NULL, NULL, 1),
(109, 27, 2, 9, 1, NULL, NULL, 1),
(110, 27, 6, 9, 1, NULL, NULL, 1),
(111, 27, 1, 9, 1, NULL, NULL, 1),
(112, 28, 5, 9, 1, NULL, NULL, 1),
(113, 28, 4, 9, 1, NULL, NULL, 1),
(114, 28, 3, 9, 1, NULL, NULL, 1),
(115, 28, 2, 9, 1, NULL, NULL, 1),
(116, 28, 6, 9, 1, NULL, NULL, 1),
(117, 28, 1, 9, 1, NULL, NULL, 1),
(118, 29, 5, 9, 1, NULL, NULL, 1),
(119, 29, 4, 9, 1, NULL, NULL, 1),
(120, 29, 3, 9, 1, NULL, NULL, 1),
(121, 29, 2, 9, 1, NULL, NULL, 1),
(122, 29, 6, 9, 1, NULL, NULL, 1),
(123, 29, 1, 9, 1, NULL, NULL, 1),
(124, 30, 5, 9, 1, NULL, NULL, 1),
(125, 30, 4, 9, 1, NULL, NULL, 1),
(126, 30, 3, 9, 1, NULL, NULL, 1),
(127, 30, 2, 9, 1, NULL, NULL, 1),
(128, 30, 6, 9, 1, NULL, NULL, 1),
(129, 30, 1, 9, 1, NULL, NULL, 1),
(130, 31, 5, 9, 1, NULL, NULL, 1),
(131, 31, 4, 9, 1, NULL, NULL, 1),
(132, 31, 3, 9, 1, NULL, NULL, 1),
(133, 31, 2, 9, 1, NULL, NULL, 1),
(134, 31, 6, 9, 1, NULL, NULL, 1),
(135, 31, 1, 9, 1, NULL, NULL, 1),
(136, 32, 5, 9, 1, NULL, NULL, 1),
(137, 32, 4, 9, 1, NULL, NULL, 1),
(138, 32, 3, 9, 1, NULL, NULL, 1),
(139, 32, 2, 9, 1, NULL, NULL, 1),
(140, 32, 6, 9, 1, NULL, NULL, 1),
(141, 32, 1, 9, 1, NULL, NULL, 1),
(142, 33, 5, 9, 1, NULL, NULL, 1),
(143, 33, 4, 9, 1, NULL, NULL, 1),
(144, 33, 3, 9, 1, NULL, NULL, 1),
(145, 33, 2, 9, 1, NULL, NULL, 1),
(146, 33, 6, 9, 1, NULL, NULL, 1),
(147, 33, 1, 9, 1, NULL, NULL, 1),
(148, 34, 5, 9, 1, NULL, NULL, 1),
(149, 34, 4, 9, 1, NULL, NULL, 1),
(150, 34, 3, 9, 1, NULL, NULL, 1),
(151, 34, 2, 9, 1, NULL, NULL, 1),
(152, 34, 6, 9, 1, NULL, NULL, 1),
(153, 34, 1, 9, 1, NULL, NULL, 1),
(154, 35, 5, 9, 1, NULL, NULL, 1),
(155, 35, 4, 9, 1, NULL, NULL, 1),
(156, 35, 3, 9, 1, NULL, NULL, 1),
(157, 35, 2, 9, 1, NULL, NULL, 1),
(158, 35, 6, 9, 1, NULL, NULL, 1),
(159, 35, 1, 9, 1, NULL, NULL, 1),
(160, 36, 5, 9, 1, NULL, NULL, 1),
(161, 36, 4, 9, 1, NULL, NULL, 1),
(162, 36, 3, 9, 1, NULL, NULL, 1),
(163, 36, 2, 9, 1, NULL, NULL, 1),
(164, 36, 6, 9, 1, NULL, NULL, 1),
(165, 36, 1, 9, 1, NULL, NULL, 1),
(166, 37, 5, 9, 1, NULL, NULL, 1),
(167, 37, 4, 9, 1, NULL, NULL, 1),
(168, 37, 3, 9, 1, NULL, NULL, 1),
(169, 37, 2, 9, 1, NULL, NULL, 1),
(170, 37, 6, 9, 1, NULL, NULL, 1),
(171, 37, 1, 9, 1, NULL, NULL, 1),
(172, 38, 5, 9, 1, NULL, NULL, 1),
(173, 38, 4, 9, 1, NULL, NULL, 1),
(174, 38, 3, 9, 1, NULL, NULL, 1),
(175, 38, 2, 9, 1, NULL, NULL, 1),
(176, 38, 6, 9, 1, NULL, NULL, 1),
(177, 38, 1, 9, 1, NULL, NULL, 1),
(178, 39, 5, 9, 1, NULL, NULL, 1),
(179, 39, 4, 9, 1, NULL, NULL, 1),
(180, 39, 3, 9, 1, NULL, NULL, 1),
(181, 39, 2, 9, 1, NULL, NULL, 1),
(182, 39, 6, 9, 1, NULL, NULL, 1),
(183, 39, 1, 9, 1, NULL, NULL, 1),
(184, 40, 5, 9, 1, NULL, NULL, 1),
(185, 40, 4, 9, 1, NULL, NULL, 1),
(186, 40, 3, 9, 1, NULL, NULL, 1),
(187, 40, 2, 9, 1, NULL, NULL, 1),
(188, 40, 6, 9, 1, NULL, NULL, 1),
(189, 40, 1, 9, 1, NULL, NULL, 1),
(190, 41, 5, 9, 1, NULL, NULL, 1),
(191, 41, 4, 9, 1, NULL, NULL, 1),
(192, 41, 3, 9, 1, NULL, NULL, 1),
(193, 41, 2, 9, 1, NULL, NULL, 1),
(194, 41, 6, 9, 1, NULL, NULL, 1),
(195, 41, 1, 9, 1, NULL, NULL, 1),
(196, 42, 5, 9, 1, NULL, NULL, 1),
(197, 42, 4, 9, 1, NULL, NULL, 1),
(198, 42, 3, 9, 1, NULL, NULL, 1),
(199, 42, 2, 9, 1, NULL, NULL, 1),
(200, 42, 6, 9, 1, NULL, NULL, 1),
(201, 42, 1, 9, 1, NULL, NULL, 1),
(202, 43, 5, 9, 1, NULL, NULL, 1),
(203, 43, 4, 9, 1, NULL, NULL, 1),
(204, 43, 3, 9, 1, NULL, NULL, 1),
(205, 43, 2, 9, 1, NULL, NULL, 1),
(206, 43, 6, 9, 1, NULL, NULL, 1),
(207, 43, 1, 9, 1, NULL, NULL, 1),
(208, 44, 5, 9, 1, NULL, NULL, 1),
(209, 44, 4, 9, 1, NULL, NULL, 1),
(210, 44, 3, 9, 1, NULL, NULL, 1),
(211, 44, 2, 9, 1, NULL, NULL, 1),
(212, 44, 6, 9, 1, NULL, NULL, 1),
(213, 44, 1, 9, 1, NULL, NULL, 1),
(214, 45, 5, 9, 1, NULL, NULL, 1),
(215, 45, 4, 9, 1, NULL, NULL, 1),
(216, 45, 3, 9, 1, NULL, NULL, 1),
(217, 45, 2, 9, 1, NULL, NULL, 1),
(218, 45, 6, 9, 1, NULL, NULL, 1),
(219, 45, 1, 9, 1, NULL, NULL, 1),
(220, 48, 5, 9, 1, NULL, NULL, 1),
(221, 48, 4, 9, 1, NULL, NULL, 1),
(222, 48, 3, 9, 1, NULL, NULL, 1),
(223, 48, 2, 9, 1, NULL, NULL, 1),
(224, 48, 6, 9, 1, NULL, NULL, 1),
(225, 48, 1, 9, 1, NULL, NULL, 1),
(226, 49, 5, 9, 1, NULL, NULL, 1),
(227, 49, 4, 9, 1, NULL, NULL, 1),
(228, 49, 3, 9, 1, NULL, NULL, 1),
(229, 49, 2, 9, 1, NULL, NULL, 1),
(230, 49, 6, 9, 1, NULL, NULL, 1),
(231, 49, 1, 9, 1, NULL, NULL, 1),
(232, 50, 5, 9, 1, NULL, NULL, 1),
(233, 50, 4, 9, 1, NULL, NULL, 1),
(234, 50, 3, 9, 1, NULL, NULL, 1),
(235, 50, 2, 9, 1, NULL, NULL, 1),
(236, 50, 6, 9, 1, NULL, NULL, 1),
(237, 50, 1, 9, 1, NULL, NULL, 1),
(238, 51, 5, 9, 1, NULL, NULL, 1),
(239, 51, 4, 9, 1, NULL, NULL, 1),
(240, 51, 3, 9, 1, NULL, NULL, 1),
(241, 51, 2, 9, 1, NULL, NULL, 1),
(242, 51, 6, 9, 1, NULL, NULL, 1),
(243, 51, 1, 9, 1, NULL, NULL, 1),
(244, 52, 5, 9, 1, NULL, NULL, 1),
(245, 52, 4, 9, 1, NULL, NULL, 1),
(246, 52, 3, 9, 1, NULL, NULL, 1),
(247, 52, 2, 9, 1, NULL, NULL, 1),
(248, 52, 6, 9, 1, NULL, NULL, 1),
(249, 52, 1, 9, 1, NULL, NULL, 1),
(250, 53, 5, 9, 1, NULL, NULL, 1),
(251, 53, 4, 9, 1, NULL, NULL, 1),
(252, 53, 3, 9, 1, NULL, NULL, 1),
(253, 53, 2, 9, 1, NULL, NULL, 1),
(254, 53, 6, 9, 1, NULL, NULL, 1),
(255, 53, 1, 9, 1, NULL, NULL, 1),
(256, 54, 5, 9, 1, NULL, NULL, 1),
(257, 54, 4, 9, 1, NULL, NULL, 1),
(258, 54, 3, 9, 1, NULL, NULL, 1),
(259, 54, 2, 9, 1, NULL, NULL, 1),
(260, 54, 6, 9, 1, NULL, NULL, 1),
(261, 54, 1, 9, 1, NULL, NULL, 1),
(262, 55, 5, 9, 1, NULL, NULL, 1),
(263, 55, 4, 9, 1, NULL, NULL, 1),
(264, 55, 3, 9, 1, NULL, NULL, 1),
(265, 55, 2, 9, 1, NULL, NULL, 1),
(266, 55, 6, 9, 1, NULL, NULL, 1),
(267, 55, 1, 9, 1, NULL, NULL, 1),
(268, 56, 5, 9, 1, NULL, NULL, 1),
(269, 56, 4, 9, 1, NULL, NULL, 1),
(270, 56, 3, 9, 1, NULL, NULL, 1),
(271, 56, 2, 9, 1, NULL, NULL, 1),
(272, 56, 6, 9, 1, NULL, NULL, 1),
(273, 56, 1, 9, 1, NULL, NULL, 1),
(274, 57, 5, 9, 1, NULL, NULL, 1),
(275, 57, 4, 9, 1, NULL, NULL, 1),
(276, 57, 3, 9, 1, NULL, NULL, 1),
(277, 57, 2, 9, 1, NULL, NULL, 1),
(278, 57, 6, 9, 1, NULL, NULL, 1),
(279, 57, 1, 9, 1, NULL, NULL, 1),
(280, 58, 5, 9, 1, NULL, NULL, 1),
(281, 58, 4, 9, 1, NULL, NULL, 1),
(282, 58, 3, 9, 1, NULL, NULL, 1),
(283, 58, 2, 9, 1, NULL, NULL, 1),
(284, 58, 6, 9, 1, NULL, NULL, 1),
(285, 58, 1, 9, 1, NULL, NULL, 1),
(286, 59, 5, 9, 1, NULL, NULL, 1),
(287, 59, 4, 9, 1, NULL, NULL, 1),
(288, 59, 3, 9, 1, NULL, NULL, 1),
(289, 59, 2, 9, 1, NULL, NULL, 1),
(290, 59, 6, 9, 1, NULL, NULL, 1),
(291, 59, 1, 9, 1, NULL, NULL, 1),
(292, 60, 5, 9, 1, NULL, NULL, 1),
(293, 60, 4, 9, 1, NULL, NULL, 1),
(294, 60, 3, 9, 1, NULL, NULL, 1),
(295, 60, 2, 9, 1, NULL, NULL, 1),
(296, 60, 6, 9, 1, NULL, NULL, 1),
(297, 60, 1, 9, 1, NULL, NULL, 1),
(298, 61, 5, 9, 1, NULL, NULL, 1),
(299, 61, 4, 9, 1, NULL, NULL, 1),
(300, 61, 3, 9, 1, NULL, NULL, 1),
(301, 61, 2, 9, 1, NULL, NULL, 1),
(302, 61, 6, 9, 1, NULL, NULL, 1),
(303, 61, 1, 9, 1, NULL, NULL, 1),
(304, 62, 5, 9, 1, NULL, NULL, 1),
(305, 62, 4, 9, 1, NULL, NULL, 1),
(306, 62, 3, 9, 1, NULL, NULL, 1),
(307, 62, 2, 9, 1, NULL, NULL, 1),
(308, 62, 6, 9, 1, NULL, NULL, 1),
(309, 62, 1, 9, 1, NULL, NULL, 1),
(310, 63, 5, 9, 1, NULL, NULL, 1),
(311, 63, 4, 9, 1, NULL, NULL, 1),
(312, 63, 3, 9, 1, NULL, NULL, 1),
(313, 63, 2, 9, 1, NULL, NULL, 1),
(314, 63, 6, 9, 1, NULL, NULL, 1),
(315, 63, 1, 9, 1, NULL, NULL, 1),
(316, 64, 5, 9, 1, NULL, NULL, 1),
(317, 64, 4, 9, 1, NULL, NULL, 1),
(318, 64, 3, 9, 1, NULL, NULL, 1),
(319, 64, 2, 9, 1, NULL, NULL, 1),
(320, 64, 6, 9, 1, NULL, NULL, 1),
(321, 64, 1, 9, 1, NULL, NULL, 1),
(322, 65, 5, 9, 1, NULL, NULL, 1),
(323, 65, 4, 9, 1, NULL, NULL, 1),
(324, 65, 3, 9, 1, NULL, NULL, 1),
(325, 65, 2, 9, 1, NULL, NULL, 1),
(326, 65, 6, 9, 1, NULL, NULL, 1),
(327, 65, 1, 9, 1, NULL, NULL, 1),
(328, 66, 5, 9, 1, NULL, NULL, 1),
(329, 66, 4, 9, 1, NULL, NULL, 1),
(330, 66, 3, 9, 1, NULL, NULL, 1),
(331, 66, 2, 9, 1, NULL, NULL, 1),
(332, 66, 6, 9, 1, NULL, NULL, 1),
(333, 66, 1, 9, 1, NULL, NULL, 1),
(334, 67, 5, 9, 1, NULL, NULL, 1),
(335, 67, 4, 9, 1, NULL, NULL, 1),
(336, 67, 3, 9, 1, NULL, NULL, 1),
(337, 67, 2, 9, 1, NULL, NULL, 1),
(338, 67, 6, 9, 1, NULL, NULL, 1),
(339, 67, 1, 9, 1, NULL, NULL, 1),
(340, 68, 5, 9, 1, NULL, NULL, 1),
(341, 68, 4, 9, 1, NULL, NULL, 1),
(342, 68, 3, 9, 1, NULL, NULL, 1),
(343, 68, 2, 9, 1, NULL, NULL, 1),
(344, 68, 6, 9, 1, NULL, NULL, 1),
(345, 68, 1, 9, 1, NULL, NULL, 1),
(346, 69, 5, 9, 1, NULL, NULL, 1),
(347, 69, 4, 9, 1, NULL, NULL, 1),
(348, 69, 3, 9, 1, NULL, NULL, 1),
(349, 69, 2, 9, 1, NULL, NULL, 1),
(350, 69, 6, 9, 1, NULL, NULL, 1),
(351, 69, 1, 9, 1, NULL, NULL, 1),
(352, 70, 5, 9, 1, NULL, NULL, 1),
(353, 70, 4, 9, 1, NULL, NULL, 1),
(354, 70, 3, 9, 1, NULL, NULL, 1),
(355, 70, 2, 9, 1, NULL, NULL, 1),
(356, 70, 6, 9, 1, NULL, NULL, 1),
(357, 70, 1, 9, 1, NULL, NULL, 1),
(358, 71, 5, 9, 1, NULL, NULL, 1),
(359, 71, 4, 9, 1, NULL, NULL, 1),
(360, 71, 3, 9, 1, NULL, NULL, 1),
(361, 71, 2, 9, 1, NULL, NULL, 1),
(362, 71, 6, 9, 1, NULL, NULL, 1),
(363, 71, 1, 9, 1, NULL, NULL, 1),
(364, 72, 5, 9, 1, NULL, NULL, 1),
(365, 72, 4, 9, 1, NULL, NULL, 1),
(366, 72, 3, 9, 1, NULL, NULL, 1),
(367, 72, 2, 9, 1, NULL, NULL, 1),
(368, 72, 6, 9, 1, NULL, NULL, 1),
(369, 72, 1, 9, 1, NULL, NULL, 1),
(370, 73, 5, 9, 1, NULL, NULL, 1),
(371, 73, 4, 9, 1, NULL, NULL, 1),
(372, 73, 3, 9, 1, NULL, NULL, 1),
(373, 73, 2, 9, 1, NULL, NULL, 1),
(374, 73, 6, 9, 1, NULL, NULL, 1),
(375, 73, 1, 9, 1, NULL, NULL, 1),
(376, 74, 5, 9, 1, NULL, NULL, 1),
(377, 74, 4, 9, 1, NULL, NULL, 1),
(378, 74, 3, 9, 1, NULL, NULL, 1),
(379, 74, 2, 9, 1, NULL, NULL, 1),
(380, 74, 6, 9, 1, NULL, NULL, 1),
(381, 74, 1, 9, 1, NULL, NULL, 1),
(382, 75, 5, 9, 1, NULL, NULL, 1),
(383, 75, 4, 9, 1, NULL, NULL, 1),
(384, 75, 3, 9, 1, NULL, NULL, 1),
(385, 75, 2, 9, 1, NULL, NULL, 1),
(386, 75, 6, 9, 1, NULL, NULL, 1),
(387, 75, 1, 9, 1, NULL, NULL, 1),
(388, 76, 5, 9, 1, NULL, NULL, 1),
(389, 76, 4, 9, 1, NULL, NULL, 1),
(390, 76, 3, 9, 1, NULL, NULL, 1),
(391, 76, 2, 9, 1, NULL, NULL, 1),
(392, 76, 6, 9, 1, NULL, NULL, 1),
(393, 76, 1, 9, 1, NULL, NULL, 1),
(394, 77, 5, 9, 1, NULL, NULL, 1),
(395, 77, 4, 9, 1, NULL, NULL, 1),
(396, 77, 3, 9, 1, NULL, NULL, 1),
(397, 77, 2, 9, 1, NULL, NULL, 1),
(398, 77, 6, 9, 1, NULL, NULL, 1),
(399, 77, 1, 9, 1, NULL, NULL, 1),
(400, 78, 5, 9, 1, NULL, NULL, 1),
(401, 78, 4, 9, 1, NULL, NULL, 1),
(402, 78, 3, 9, 1, NULL, NULL, 1),
(403, 78, 2, 9, 1, NULL, NULL, 1),
(404, 78, 6, 9, 1, NULL, NULL, 1),
(405, 78, 1, 9, 1, NULL, NULL, 1),
(406, 79, 5, 9, 1, NULL, NULL, 1),
(407, 79, 4, 9, 1, NULL, NULL, 1),
(408, 79, 3, 9, 1, NULL, NULL, 1),
(409, 79, 2, 9, 1, NULL, NULL, 1),
(410, 79, 6, 9, 1, NULL, NULL, 1),
(411, 79, 1, 9, 1, NULL, NULL, 1),
(412, 80, 5, 9, 1, NULL, NULL, 1),
(413, 80, 4, 9, 1, NULL, NULL, 1),
(414, 80, 3, 9, 1, NULL, NULL, 1),
(415, 80, 2, 9, 1, NULL, NULL, 1),
(416, 80, 6, 9, 1, NULL, NULL, 1),
(417, 80, 1, 9, 1, NULL, NULL, 1),
(418, 81, 5, 9, 1, NULL, NULL, 1),
(419, 81, 4, 9, 1, NULL, NULL, 1),
(420, 81, 3, 9, 1, NULL, NULL, 1),
(421, 81, 2, 9, 1, NULL, NULL, 1),
(422, 81, 6, 9, 1, NULL, NULL, 1),
(423, 81, 1, 9, 1, NULL, NULL, 1),
(424, 82, 5, 9, 1, NULL, NULL, 1),
(425, 82, 4, 9, 1, NULL, NULL, 1),
(426, 82, 3, 9, 1, NULL, NULL, 1),
(427, 82, 2, 9, 1, NULL, NULL, 1),
(428, 82, 6, 9, 1, NULL, NULL, 1),
(429, 82, 1, 9, 1, NULL, NULL, 1),
(430, 83, 5, 9, 1, NULL, NULL, 1),
(431, 83, 4, 9, 1, NULL, NULL, 1),
(432, 83, 3, 9, 1, NULL, NULL, 1),
(433, 83, 2, 9, 1, NULL, NULL, 1),
(434, 83, 6, 9, 1, NULL, NULL, 1),
(435, 83, 1, 9, 1, NULL, NULL, 1),
(436, 84, 5, 9, 1, NULL, NULL, 1),
(437, 84, 4, 9, 1, NULL, NULL, 1),
(438, 84, 3, 9, 1, NULL, NULL, 1),
(439, 84, 2, 9, 1, NULL, NULL, 1),
(440, 84, 6, 9, 1, NULL, NULL, 1),
(441, 84, 1, 9, 1, NULL, NULL, 1),
(442, 85, 5, 9, 1, NULL, NULL, 1),
(443, 85, 4, 9, 1, NULL, NULL, 1),
(444, 85, 3, 9, 1, NULL, NULL, 1),
(445, 85, 2, 9, 1, NULL, NULL, 1),
(446, 85, 6, 9, 1, NULL, NULL, 1),
(447, 85, 1, 9, 1, NULL, NULL, 1),
(448, 86, 5, 9, 1, NULL, NULL, 1),
(449, 86, 4, 9, 1, NULL, NULL, 1),
(450, 86, 3, 9, 1, NULL, NULL, 1),
(451, 86, 2, 9, 1, NULL, NULL, 1),
(452, 86, 6, 9, 1, NULL, NULL, 1),
(453, 86, 1, 9, 1, NULL, NULL, 1),
(454, 87, 5, 9, 1, NULL, NULL, 1),
(455, 87, 4, 9, 1, NULL, NULL, 1),
(456, 87, 3, 9, 1, NULL, NULL, 1),
(457, 87, 2, 9, 1, NULL, NULL, 1),
(458, 87, 6, 9, 1, NULL, NULL, 1),
(459, 87, 1, 9, 1, NULL, NULL, 1),
(460, 88, 5, 9, 1, NULL, NULL, 1),
(461, 88, 4, 9, 1, NULL, NULL, 1),
(462, 88, 3, 9, 1, NULL, NULL, 1),
(463, 88, 2, 9, 1, NULL, NULL, 1),
(464, 88, 6, 9, 1, NULL, NULL, 1),
(465, 88, 1, 9, 1, NULL, NULL, 1),
(466, 89, 5, 9, 1, NULL, NULL, 1),
(467, 89, 4, 9, 1, NULL, NULL, 1),
(468, 89, 3, 9, 1, NULL, NULL, 1),
(469, 89, 2, 9, 1, NULL, NULL, 1),
(470, 89, 6, 9, 1, NULL, NULL, 1),
(471, 89, 1, 9, 1, NULL, NULL, 1),
(472, 90, 5, 9, 1, NULL, NULL, 1),
(473, 90, 4, 9, 1, NULL, NULL, 1),
(474, 90, 3, 9, 1, NULL, NULL, 1),
(475, 90, 2, 9, 1, NULL, NULL, 1),
(476, 90, 6, 9, 1, NULL, NULL, 1),
(477, 90, 1, 9, 1, NULL, NULL, 1),
(478, 91, 5, 9, 1, NULL, NULL, 1),
(479, 91, 4, 9, 1, NULL, NULL, 1),
(480, 91, 3, 9, 1, NULL, NULL, 1),
(481, 91, 2, 9, 1, NULL, NULL, 1),
(482, 91, 6, 9, 1, NULL, NULL, 1),
(483, 91, 1, 9, 1, NULL, NULL, 1),
(484, 92, 5, 9, 1, NULL, NULL, 1),
(485, 92, 4, 9, 1, NULL, NULL, 1),
(486, 92, 3, 9, 1, NULL, NULL, 1),
(487, 92, 2, 9, 1, NULL, NULL, 1),
(488, 92, 6, 9, 1, NULL, NULL, 1),
(489, 92, 1, 9, 1, NULL, NULL, 1),
(490, 93, 5, 9, 1, NULL, NULL, 1),
(491, 93, 4, 9, 1, NULL, NULL, 1),
(492, 93, 3, 9, 1, NULL, NULL, 1),
(493, 93, 2, 9, 1, NULL, NULL, 1),
(494, 93, 6, 9, 1, NULL, NULL, 1),
(495, 93, 1, 9, 1, NULL, NULL, 1),
(496, 94, 5, 9, 1, NULL, NULL, 1),
(497, 94, 4, 9, 1, NULL, NULL, 1),
(498, 94, 3, 9, 1, NULL, NULL, 1),
(499, 94, 2, 9, 1, NULL, NULL, 1),
(500, 94, 6, 9, 1, NULL, NULL, 1),
(501, 94, 1, 9, 1, NULL, NULL, 1),
(502, 95, 5, 9, 1, NULL, NULL, 1),
(503, 95, 4, 9, 1, NULL, NULL, 1),
(504, 95, 3, 9, 1, NULL, NULL, 1),
(505, 95, 2, 9, 1, NULL, NULL, 1),
(506, 95, 6, 9, 1, NULL, NULL, 1),
(507, 95, 1, 9, 1, NULL, NULL, 1),
(508, 96, 5, 9, 1, NULL, NULL, 1),
(509, 96, 4, 9, 1, NULL, NULL, 1),
(510, 96, 3, 9, 1, NULL, NULL, 1),
(511, 96, 2, 9, 1, NULL, NULL, 1),
(512, 96, 6, 9, 1, NULL, NULL, 1),
(513, 96, 1, 9, 1, NULL, NULL, 1),
(514, 97, 5, 9, 1, NULL, NULL, 1),
(515, 97, 4, 9, 1, NULL, NULL, 1),
(516, 97, 3, 9, 1, NULL, NULL, 1),
(517, 97, 2, 9, 1, NULL, NULL, 1),
(518, 97, 6, 9, 1, NULL, NULL, 1),
(519, 97, 1, 9, 1, NULL, NULL, 1),
(520, 98, 5, 9, 1, NULL, NULL, 1),
(521, 98, 4, 9, 1, NULL, NULL, 1),
(522, 98, 3, 9, 1, NULL, NULL, 1),
(523, 98, 2, 9, 1, NULL, NULL, 1),
(524, 98, 6, 9, 1, NULL, NULL, 1),
(525, 98, 1, 9, 1, NULL, NULL, 1),
(526, 99, 5, 9, 1, NULL, NULL, 1),
(527, 99, 4, 9, 1, NULL, NULL, 1),
(528, 99, 3, 9, 1, NULL, NULL, 1),
(529, 99, 2, 9, 1, NULL, NULL, 1),
(530, 99, 6, 9, 1, NULL, NULL, 1),
(531, 99, 1, 9, 1, NULL, NULL, 1),
(532, 100, 5, 9, 1, NULL, NULL, 1),
(533, 100, 4, 9, 1, NULL, NULL, 1),
(534, 100, 3, 9, 1, NULL, NULL, 1),
(535, 100, 2, 9, 1, NULL, NULL, 1),
(536, 100, 6, 9, 1, NULL, NULL, 1),
(537, 100, 1, 9, 1, NULL, NULL, 1),
(538, 101, 5, 9, 1, NULL, NULL, 1),
(539, 101, 4, 9, 1, NULL, NULL, 1),
(540, 101, 3, 9, 1, NULL, NULL, 1),
(541, 101, 2, 9, 1, NULL, NULL, 1),
(542, 101, 6, 9, 1, NULL, NULL, 1),
(543, 101, 1, 9, 1, NULL, NULL, 1),
(544, 102, 5, 9, 1, NULL, NULL, 1),
(545, 102, 4, 9, 1, NULL, NULL, 1),
(546, 102, 3, 9, 1, NULL, NULL, 1),
(547, 102, 2, 9, 1, NULL, NULL, 1),
(548, 102, 6, 9, 1, NULL, NULL, 1),
(549, 102, 1, 9, 1, NULL, NULL, 1),
(550, 103, 5, 9, 1, NULL, NULL, 1),
(551, 103, 4, 9, 1, NULL, NULL, 1),
(552, 103, 3, 9, 1, NULL, NULL, 1),
(553, 103, 2, 9, 1, NULL, NULL, 1),
(554, 103, 6, 9, 1, NULL, NULL, 1),
(555, 103, 1, 9, 1, NULL, NULL, 1),
(556, 104, 5, 9, 1, NULL, NULL, 1),
(557, 104, 4, 9, 1, NULL, NULL, 1),
(558, 104, 3, 9, 1, NULL, NULL, 1),
(559, 104, 2, 9, 1, NULL, NULL, 1),
(560, 104, 6, 9, 1, NULL, NULL, 1),
(561, 104, 1, 9, 1, NULL, NULL, 1),
(562, 105, 4, 9, 1, NULL, NULL, 1),
(563, 105, 5, 9, 1, NULL, NULL, 1),
(564, 105, 24, 9, 1, NULL, NULL, 1),
(565, 116, 5, 8, 1, NULL, NULL, 1),
(566, 116, 5, 9, 1, NULL, NULL, 1),
(567, 116, 29, 9, 1, NULL, NULL, 1),
(568, 116, 4, 9, 1, NULL, NULL, 1),
(569, 116, 16, 9, 1, NULL, NULL, 1),
(570, 116, 32, 9, 1, NULL, NULL, 1),
(571, 116, 11, 9, 1, NULL, NULL, 1),
(572, 116, 12, 9, 1, NULL, NULL, 1),
(573, 116, 20, 9, 1, NULL, NULL, 1),
(574, 116, 14, 9, 1, NULL, NULL, 1),
(575, 116, 10, 9, 1, NULL, NULL, 1),
(576, 116, 22, 9, 1, NULL, NULL, 1),
(577, 116, 3, 9, 1, NULL, NULL, 1),
(578, 116, 21, 9, 1, NULL, NULL, 1),
(579, 116, 15, 9, 1, NULL, NULL, 1),
(580, 116, 31, 9, 1, NULL, NULL, 1),
(581, 116, 26, 9, 1, NULL, NULL, 1),
(582, 116, 28, 9, 1, NULL, NULL, 1),
(583, 116, 13, 9, 1, NULL, NULL, 1),
(584, 116, 2, 9, 1, NULL, NULL, 1),
(585, 116, 30, 9, 1, NULL, NULL, 1),
(586, 116, 18, 9, 1, NULL, NULL, 1),
(587, 116, 9, 9, 1, NULL, NULL, 1),
(588, 116, 6, 9, 1, NULL, NULL, 1),
(589, 116, 25, 9, 1, NULL, NULL, 1),
(590, 116, 24, 9, 1, NULL, NULL, 1),
(591, 116, 33, 9, 1, NULL, NULL, 1),
(592, 116, 34, 9, 1, NULL, NULL, 1),
(593, 116, 1, 9, 1, NULL, NULL, 1),
(594, 116, 17, 9, 1, NULL, NULL, 1),
(595, 116, 19, 9, 1, NULL, NULL, 1),
(596, 116, 8, 9, 1, NULL, NULL, 1),
(597, 116, 7, 9, 1, NULL, NULL, 1),
(598, 116, 27, 9, 1, NULL, NULL, 1),
(599, 116, 23, 9, 1, NULL, NULL, 1),
(600, 118, 7, 8, 1, NULL, NULL, 1),
(601, 118, 5, 9, 1, NULL, NULL, 1),
(602, 118, 29, 9, 1, NULL, NULL, 1),
(603, 118, 4, 9, 1, NULL, NULL, 1),
(604, 118, 16, 9, 1, NULL, NULL, 1),
(605, 118, 32, 9, 1, NULL, NULL, 1),
(606, 118, 11, 9, 1, NULL, NULL, 1),
(607, 118, 12, 9, 1, NULL, NULL, 1),
(608, 118, 20, 9, 1, NULL, NULL, 1),
(609, 118, 14, 9, 1, NULL, NULL, 1),
(610, 118, 10, 9, 1, NULL, NULL, 1),
(611, 118, 22, 9, 1, NULL, NULL, 1),
(612, 118, 3, 9, 1, NULL, NULL, 1),
(613, 118, 21, 9, 1, NULL, NULL, 1),
(614, 118, 15, 9, 1, NULL, NULL, 1),
(615, 118, 31, 9, 1, NULL, NULL, 1),
(616, 118, 26, 9, 1, NULL, NULL, 1),
(617, 118, 28, 9, 1, NULL, NULL, 1),
(618, 118, 13, 9, 1, NULL, NULL, 1),
(619, 118, 2, 9, 1, NULL, NULL, 1),
(620, 118, 30, 9, 1, NULL, NULL, 1),
(621, 118, 18, 9, 1, NULL, NULL, 1),
(622, 118, 9, 9, 1, NULL, NULL, 1),
(623, 118, 6, 9, 1, NULL, NULL, 1),
(624, 118, 24, 9, 1, NULL, NULL, 1),
(625, 118, 33, 9, 1, NULL, NULL, 1),
(626, 118, 34, 9, 1, NULL, NULL, 1),
(627, 118, 1, 9, 1, NULL, NULL, 1),
(628, 118, 17, 9, 1, NULL, NULL, 1),
(629, 118, 19, 9, 1, NULL, NULL, 1),
(630, 118, 8, 9, 1, NULL, NULL, 1),
(631, 118, 27, 9, 1, NULL, NULL, 1),
(632, 118, 23, 9, 1, NULL, NULL, 1),
(633, 119, 7, 8, 1, NULL, NULL, 1),
(634, 119, 5, 9, 1, NULL, NULL, 1),
(635, 119, 29, 9, 1, NULL, NULL, 1),
(636, 119, 4, 9, 1, NULL, NULL, 1),
(637, 119, 16, 9, 1, NULL, NULL, 1),
(638, 119, 32, 9, 1, NULL, NULL, 1),
(639, 119, 11, 9, 1, NULL, NULL, 1),
(640, 119, 12, 9, 1, NULL, NULL, 1),
(641, 119, 20, 9, 1, NULL, NULL, 1),
(642, 119, 14, 9, 1, NULL, NULL, 1),
(643, 119, 10, 9, 1, NULL, NULL, 1),
(644, 119, 22, 9, 1, NULL, NULL, 1),
(645, 119, 3, 9, 1, NULL, NULL, 1),
(646, 119, 21, 9, 1, NULL, NULL, 1),
(647, 119, 15, 9, 1, NULL, NULL, 1),
(648, 119, 31, 9, 1, NULL, NULL, 1),
(649, 119, 26, 9, 1, NULL, NULL, 1),
(650, 119, 28, 9, 1, NULL, NULL, 1),
(651, 119, 13, 9, 1, NULL, NULL, 1),
(652, 119, 2, 9, 1, NULL, NULL, 1),
(653, 119, 30, 9, 1, NULL, NULL, 1),
(654, 119, 18, 9, 1, NULL, NULL, 1),
(655, 119, 9, 9, 1, NULL, NULL, 1),
(656, 119, 6, 9, 1, NULL, NULL, 1),
(657, 119, 24, 9, 1, NULL, NULL, 1),
(658, 119, 33, 9, 1, NULL, NULL, 1),
(659, 119, 34, 9, 1, NULL, NULL, 1),
(660, 119, 1, 9, 1, NULL, NULL, 1),
(661, 119, 17, 9, 1, NULL, NULL, 1),
(662, 119, 19, 9, 1, NULL, NULL, 1),
(663, 119, 8, 9, 1, NULL, NULL, 1),
(664, 119, 27, 9, 1, NULL, NULL, 1),
(665, 119, 23, 9, 1, NULL, NULL, 1),
(666, 120, 7, 8, 1, NULL, NULL, 1),
(667, 120, 5, 9, 1, NULL, NULL, 1),
(668, 120, 29, 9, 1, NULL, NULL, 1),
(669, 120, 4, 9, 1, NULL, NULL, 1),
(670, 120, 16, 9, 1, NULL, NULL, 1),
(671, 120, 32, 9, 1, NULL, NULL, 1),
(672, 120, 11, 9, 1, NULL, NULL, 1),
(673, 120, 12, 9, 1, NULL, NULL, 1),
(674, 120, 20, 9, 1, NULL, NULL, 1),
(675, 120, 14, 9, 1, NULL, NULL, 1),
(676, 120, 10, 9, 1, NULL, NULL, 1),
(677, 120, 22, 9, 1, NULL, NULL, 1),
(678, 120, 3, 9, 1, NULL, NULL, 1),
(679, 120, 21, 9, 1, NULL, NULL, 1),
(680, 120, 15, 9, 1, NULL, NULL, 1),
(681, 120, 31, 9, 1, NULL, NULL, 1),
(682, 120, 26, 9, 1, NULL, NULL, 1),
(683, 120, 28, 9, 1, NULL, NULL, 1),
(684, 120, 13, 9, 1, NULL, NULL, 1),
(685, 120, 2, 9, 1, NULL, NULL, 1),
(686, 120, 30, 9, 1, NULL, NULL, 1),
(687, 120, 18, 9, 1, NULL, NULL, 1),
(688, 120, 9, 9, 1, NULL, NULL, 1),
(689, 120, 6, 9, 1, NULL, NULL, 1),
(690, 120, 24, 9, 1, NULL, NULL, 1),
(691, 120, 33, 9, 1, NULL, NULL, 1),
(692, 120, 34, 9, 1, NULL, NULL, 1),
(693, 120, 1, 9, 1, NULL, NULL, 1),
(694, 120, 17, 9, 1, NULL, NULL, 1),
(695, 120, 19, 9, 1, NULL, NULL, 1),
(696, 120, 8, 9, 1, NULL, NULL, 1),
(697, 120, 27, 9, 1, NULL, NULL, 1),
(698, 120, 23, 9, 1, NULL, NULL, 1),
(699, 121, 7, 8, 1, NULL, NULL, 1),
(700, 121, 5, 9, 1, NULL, NULL, 1),
(701, 121, 29, 9, 1, NULL, NULL, 1),
(702, 121, 4, 9, 1, NULL, NULL, 1),
(703, 121, 16, 9, 1, NULL, NULL, 1),
(704, 121, 32, 9, 1, NULL, NULL, 1),
(705, 121, 11, 9, 1, NULL, NULL, 1),
(706, 121, 12, 9, 1, NULL, NULL, 1),
(707, 121, 20, 9, 1, NULL, NULL, 1),
(708, 121, 14, 9, 1, NULL, NULL, 1),
(709, 121, 10, 9, 1, NULL, NULL, 1),
(710, 121, 22, 9, 1, NULL, NULL, 1),
(711, 121, 3, 9, 1, NULL, NULL, 1),
(712, 121, 21, 9, 1, NULL, NULL, 1),
(713, 121, 15, 9, 1, NULL, NULL, 1),
(714, 121, 31, 9, 1, NULL, NULL, 1),
(715, 121, 26, 9, 1, NULL, NULL, 1),
(716, 121, 28, 9, 1, NULL, NULL, 1),
(717, 121, 13, 9, 1, NULL, NULL, 1),
(718, 121, 2, 9, 1, NULL, NULL, 1),
(719, 121, 30, 9, 1, NULL, NULL, 1),
(720, 121, 18, 9, 1, NULL, NULL, 1),
(721, 121, 9, 9, 1, NULL, NULL, 1),
(722, 121, 6, 9, 1, NULL, NULL, 1),
(723, 121, 24, 9, 1, NULL, NULL, 1),
(724, 121, 33, 9, 1, NULL, NULL, 1),
(725, 121, 34, 9, 1, NULL, NULL, 1),
(726, 121, 1, 9, 1, NULL, NULL, 1),
(727, 121, 17, 9, 1, NULL, NULL, 1),
(728, 121, 19, 9, 1, NULL, NULL, 1),
(729, 121, 8, 9, 1, NULL, NULL, 1),
(730, 121, 27, 9, 1, NULL, NULL, 1),
(731, 121, 23, 9, 1, NULL, NULL, 1),
(732, 122, 7, 8, 1, NULL, NULL, 1),
(733, 122, 5, 9, 1, NULL, NULL, 1),
(734, 122, 29, 9, 1, NULL, NULL, 1),
(735, 122, 4, 9, 1, NULL, NULL, 1),
(736, 122, 16, 9, 1, NULL, NULL, 1),
(737, 122, 32, 9, 1, NULL, NULL, 1),
(738, 122, 11, 9, 1, NULL, NULL, 1),
(739, 122, 12, 9, 1, NULL, NULL, 1),
(740, 122, 20, 9, 1, NULL, NULL, 1),
(741, 122, 14, 9, 1, NULL, NULL, 1),
(742, 122, 10, 9, 1, NULL, NULL, 1),
(743, 122, 22, 9, 1, NULL, NULL, 1),
(744, 122, 3, 9, 1, NULL, NULL, 1),
(745, 122, 21, 9, 1, NULL, NULL, 1),
(746, 122, 15, 9, 1, NULL, NULL, 1),
(747, 122, 31, 9, 1, NULL, NULL, 1),
(748, 122, 26, 9, 1, NULL, NULL, 1),
(749, 122, 28, 9, 1, NULL, NULL, 1),
(750, 122, 13, 9, 1, NULL, NULL, 1),
(751, 122, 2, 9, 1, NULL, NULL, 1),
(752, 122, 30, 9, 1, NULL, NULL, 1),
(753, 122, 18, 9, 1, NULL, NULL, 1),
(754, 122, 9, 9, 1, NULL, NULL, 1),
(755, 122, 6, 9, 1, NULL, NULL, 1),
(756, 122, 24, 9, 1, NULL, NULL, 1),
(757, 122, 33, 9, 1, NULL, NULL, 1),
(758, 122, 34, 9, 1, NULL, NULL, 1),
(759, 122, 1, 9, 1, NULL, NULL, 1),
(760, 122, 17, 9, 1, NULL, NULL, 1),
(761, 122, 19, 9, 1, NULL, NULL, 1),
(762, 122, 8, 9, 1, NULL, NULL, 1),
(763, 122, 27, 9, 1, NULL, NULL, 1),
(764, 122, 23, 9, 1, NULL, NULL, 1),
(765, 123, 7, 8, 1, NULL, NULL, 1),
(766, 123, 5, 9, 1, NULL, NULL, 1),
(767, 123, 29, 9, 1, NULL, NULL, 1),
(768, 123, 4, 9, 1, NULL, NULL, 1),
(769, 123, 16, 9, 1, NULL, NULL, 1),
(770, 123, 32, 9, 1, NULL, NULL, 1),
(771, 123, 11, 9, 1, NULL, NULL, 1),
(772, 123, 12, 9, 1, NULL, NULL, 1),
(773, 123, 20, 9, 1, NULL, NULL, 1),
(774, 123, 14, 9, 1, NULL, NULL, 1),
(775, 123, 10, 9, 1, NULL, NULL, 1),
(776, 123, 22, 9, 1, NULL, NULL, 1),
(777, 123, 3, 9, 1, NULL, NULL, 1),
(778, 123, 21, 9, 1, NULL, NULL, 1),
(779, 123, 15, 9, 1, NULL, NULL, 1),
(780, 123, 31, 9, 1, NULL, NULL, 1),
(781, 123, 26, 9, 1, NULL, NULL, 1),
(782, 123, 28, 9, 1, NULL, NULL, 1),
(783, 123, 13, 9, 1, NULL, NULL, 1),
(784, 123, 2, 9, 1, NULL, NULL, 1),
(785, 123, 30, 9, 1, NULL, NULL, 1),
(786, 123, 18, 9, 1, NULL, NULL, 1),
(787, 123, 9, 9, 1, NULL, NULL, 1),
(788, 123, 6, 9, 1, NULL, NULL, 1),
(789, 123, 24, 9, 1, NULL, NULL, 1),
(790, 123, 33, 9, 1, NULL, NULL, 1),
(791, 123, 34, 9, 1, NULL, NULL, 1),
(792, 123, 1, 9, 1, NULL, NULL, 1),
(793, 123, 17, 9, 1, NULL, NULL, 1),
(794, 123, 19, 9, 1, NULL, NULL, 1),
(795, 123, 8, 9, 1, NULL, NULL, 1),
(796, 123, 27, 9, 1, NULL, NULL, 1),
(797, 123, 23, 9, 1, NULL, NULL, 1),
(798, 124, 65, 8, 1, NULL, NULL, 1),
(799, 124, 5, 8, 1, NULL, NULL, 1),
(800, 124, 54, 9, 1, NULL, NULL, 1),
(801, 124, 29, 9, 1, NULL, NULL, 1),
(802, 124, 55, 9, 1, NULL, NULL, 1),
(803, 124, 45, 9, 1, NULL, NULL, 1),
(804, 124, 4, 9, 1, NULL, NULL, 1),
(805, 124, 16, 9, 1, NULL, NULL, 1),
(806, 124, 67, 9, 1, NULL, NULL, 1),
(807, 124, 73, 9, 1, NULL, NULL, 1),
(808, 124, 32, 9, 1, NULL, NULL, 1),
(809, 124, 11, 9, 1, NULL, NULL, 1),
(810, 124, 48, 9, 1, NULL, NULL, 1),
(811, 124, 12, 9, 1, NULL, NULL, 1),
(812, 124, 62, 9, 1, NULL, NULL, 1),
(813, 124, 20, 9, 1, NULL, NULL, 1),
(814, 124, 14, 9, 1, NULL, NULL, 1),
(815, 124, 58, 9, 1, NULL, NULL, 1),
(816, 124, 10, 9, 1, NULL, NULL, 1),
(817, 124, 22, 9, 1, NULL, NULL, 1),
(818, 124, 3, 9, 1, NULL, NULL, 1),
(819, 124, 21, 9, 1, NULL, NULL, 1),
(820, 124, 15, 9, 1, NULL, NULL, 1),
(821, 124, 68, 9, 1, NULL, NULL, 1),
(822, 124, 44, 9, 1, NULL, NULL, 1),
(823, 124, 64, 9, 1, NULL, NULL, 1),
(824, 124, 31, 9, 1, NULL, NULL, 1),
(825, 124, 43, 9, 1, NULL, NULL, 1),
(826, 124, 59, 9, 1, NULL, NULL, 1),
(827, 124, 61, 9, 1, NULL, NULL, 1),
(828, 124, 49, 9, 1, NULL, NULL, 1),
(829, 124, 26, 9, 1, NULL, NULL, 1),
(830, 124, 28, 9, 1, NULL, NULL, 1),
(831, 124, 41, 9, 1, NULL, NULL, 1),
(832, 124, 40, 9, 1, NULL, NULL, 1),
(833, 124, 13, 9, 1, NULL, NULL, 1),
(834, 124, 2, 9, 1, NULL, NULL, 1),
(835, 124, 30, 9, 1, NULL, NULL, 1),
(836, 124, 18, 9, 1, NULL, NULL, 1),
(837, 124, 57, 9, 1, NULL, NULL, 1),
(838, 124, 63, 9, 1, NULL, NULL, 1),
(839, 124, 74, 9, 1, NULL, NULL, 1),
(840, 124, 9, 9, 1, NULL, NULL, 1),
(841, 124, 76, 9, 1, NULL, NULL, 1),
(842, 124, 6, 9, 1, NULL, NULL, 1),
(843, 124, 24, 9, 1, NULL, NULL, 1),
(844, 124, 33, 9, 1, NULL, NULL, 1),
(845, 124, 51, 9, 1, NULL, NULL, 1),
(846, 124, 34, 9, 1, NULL, NULL, 1),
(847, 124, 60, 9, 1, NULL, NULL, 1),
(848, 124, 53, 9, 1, NULL, NULL, 1),
(849, 124, 37, 9, 1, NULL, NULL, 1),
(850, 124, 1, 9, 1, NULL, NULL, 1),
(851, 124, 72, 9, 1, NULL, NULL, 1),
(852, 124, 36, 9, 1, NULL, NULL, 1),
(853, 124, 47, 9, 1, NULL, NULL, 1),
(854, 124, 17, 9, 1, NULL, NULL, 1),
(855, 124, 39, 9, 1, NULL, NULL, 1),
(856, 124, 56, 9, 1, NULL, NULL, 1),
(857, 124, 19, 9, 1, NULL, NULL, 1),
(858, 124, 46, 9, 1, NULL, NULL, 1),
(859, 124, 8, 9, 1, NULL, NULL, 1),
(860, 124, 75, 9, 1, NULL, NULL, 1),
(861, 124, 70, 9, 1, NULL, NULL, 1),
(862, 124, 42, 9, 1, NULL, NULL, 1),
(863, 124, 38, 9, 1, NULL, NULL, 1),
(864, 124, 7, 9, 1, NULL, NULL, 1),
(865, 124, 71, 9, 1, NULL, NULL, 1),
(866, 124, 52, 9, 1, NULL, NULL, 1),
(867, 124, 27, 9, 1, NULL, NULL, 1),
(868, 124, 23, 9, 1, NULL, NULL, 1),
(869, 124, 50, 9, 1, NULL, NULL, 1),
(870, 124, 66, 9, 1, NULL, NULL, 1),
(871, 124, 35, 9, 1, NULL, NULL, 1),
(872, 124, 69, 9, 1, NULL, NULL, 1),
(873, 125, 65, 8, 1, NULL, NULL, 1),
(874, 125, 5, 8, 1, NULL, NULL, 1),
(875, 125, 54, 9, 1, NULL, NULL, 1),
(876, 125, 29, 9, 1, NULL, NULL, 1),
(877, 125, 55, 9, 1, NULL, NULL, 1),
(878, 125, 45, 9, 1, NULL, NULL, 1),
(879, 125, 4, 9, 1, NULL, NULL, 1),
(880, 125, 16, 9, 1, NULL, NULL, 1),
(881, 125, 67, 9, 1, NULL, NULL, 1),
(882, 125, 73, 9, 1, NULL, NULL, 1),
(883, 125, 32, 9, 1, NULL, NULL, 1),
(884, 125, 11, 9, 1, NULL, NULL, 1),
(885, 125, 48, 9, 1, NULL, NULL, 1),
(886, 125, 12, 9, 1, NULL, NULL, 1),
(887, 125, 62, 9, 1, NULL, NULL, 1),
(888, 125, 20, 9, 1, NULL, NULL, 1),
(889, 125, 14, 9, 1, NULL, NULL, 1),
(890, 125, 58, 9, 1, NULL, NULL, 1),
(891, 125, 10, 9, 1, NULL, NULL, 1),
(892, 125, 22, 9, 1, NULL, NULL, 1),
(893, 125, 3, 9, 1, NULL, NULL, 1),
(894, 125, 21, 9, 1, NULL, NULL, 1),
(895, 125, 15, 9, 1, NULL, NULL, 1),
(896, 125, 68, 9, 1, NULL, NULL, 1),
(897, 125, 44, 9, 1, NULL, NULL, 1),
(898, 125, 64, 9, 1, NULL, NULL, 1),
(899, 125, 31, 9, 1, NULL, NULL, 1),
(900, 125, 43, 9, 1, NULL, NULL, 1),
(901, 125, 59, 9, 1, NULL, NULL, 1),
(902, 125, 61, 9, 1, NULL, NULL, 1),
(903, 125, 49, 9, 1, NULL, NULL, 1),
(904, 125, 26, 9, 1, NULL, NULL, 1),
(905, 125, 28, 9, 1, NULL, NULL, 1),
(906, 125, 41, 9, 1, NULL, NULL, 1),
(907, 125, 40, 9, 1, NULL, NULL, 1),
(908, 125, 13, 9, 1, NULL, NULL, 1),
(909, 125, 2, 9, 1, NULL, NULL, 1),
(910, 125, 30, 9, 1, NULL, NULL, 1),
(911, 125, 18, 9, 1, NULL, NULL, 1),
(912, 125, 57, 9, 1, NULL, NULL, 1),
(913, 125, 63, 9, 1, NULL, NULL, 1),
(914, 125, 74, 9, 1, NULL, NULL, 1),
(915, 125, 9, 9, 1, NULL, NULL, 1),
(916, 125, 76, 9, 1, NULL, NULL, 1),
(917, 125, 6, 9, 1, NULL, NULL, 1),
(918, 125, 24, 9, 1, NULL, NULL, 1),
(919, 125, 33, 9, 1, NULL, NULL, 1),
(920, 125, 51, 9, 1, NULL, NULL, 1),
(921, 125, 34, 9, 1, NULL, NULL, 1),
(922, 125, 60, 9, 1, NULL, NULL, 1),
(923, 125, 53, 9, 1, NULL, NULL, 1),
(924, 125, 37, 9, 1, NULL, NULL, 1),
(925, 125, 1, 9, 1, NULL, NULL, 1),
(926, 125, 72, 9, 1, NULL, NULL, 1),
(927, 125, 36, 9, 1, NULL, NULL, 1),
(928, 125, 47, 9, 1, NULL, NULL, 1),
(929, 125, 17, 9, 1, NULL, NULL, 1),
(930, 125, 39, 9, 1, NULL, NULL, 1),
(931, 125, 56, 9, 1, NULL, NULL, 1),
(932, 125, 19, 9, 1, NULL, NULL, 1),
(933, 125, 46, 9, 1, NULL, NULL, 1),
(934, 125, 8, 9, 1, NULL, NULL, 1),
(935, 125, 75, 9, 1, NULL, NULL, 1),
(936, 125, 70, 9, 1, NULL, NULL, 1),
(937, 125, 42, 9, 1, NULL, NULL, 1),
(938, 125, 38, 9, 1, NULL, NULL, 1),
(939, 125, 7, 9, 1, NULL, NULL, 1),
(940, 125, 71, 9, 1, NULL, NULL, 1),
(941, 125, 52, 9, 1, NULL, NULL, 1),
(942, 125, 27, 9, 1, NULL, NULL, 1),
(943, 125, 23, 9, 1, NULL, NULL, 1),
(944, 125, 50, 9, 1, NULL, NULL, 1),
(945, 125, 66, 9, 1, NULL, NULL, 1),
(946, 125, 35, 9, 1, NULL, NULL, 1),
(947, 125, 69, 9, 1, NULL, NULL, 1),
(948, 126, 5, 8, 1, NULL, NULL, 1),
(949, 126, 65, 8, 1, NULL, NULL, 1),
(950, 126, 54, 9, 1, NULL, NULL, 1),
(951, 126, 29, 9, 1, NULL, NULL, 1),
(952, 126, 55, 9, 1, NULL, NULL, 1),
(953, 126, 45, 9, 1, NULL, NULL, 1),
(954, 126, 4, 9, 1, NULL, NULL, 1),
(955, 126, 16, 9, 1, NULL, NULL, 1),
(956, 126, 67, 9, 1, NULL, NULL, 1),
(957, 126, 73, 9, 1, NULL, NULL, 1),
(958, 126, 32, 9, 1, NULL, NULL, 1),
(959, 126, 11, 9, 1, NULL, NULL, 1),
(960, 126, 48, 9, 1, NULL, NULL, 1),
(961, 126, 12, 9, 1, NULL, NULL, 1),
(962, 126, 62, 9, 1, NULL, NULL, 1),
(963, 126, 20, 9, 1, NULL, NULL, 1),
(964, 126, 14, 9, 1, NULL, NULL, 1),
(965, 126, 58, 9, 1, NULL, NULL, 1),
(966, 126, 10, 9, 1, NULL, NULL, 1),
(967, 126, 22, 9, 1, NULL, NULL, 1),
(968, 126, 3, 9, 1, NULL, NULL, 1),
(969, 126, 21, 9, 1, NULL, NULL, 1),
(970, 126, 15, 9, 1, NULL, NULL, 1),
(971, 126, 68, 9, 1, NULL, NULL, 1),
(972, 126, 44, 9, 1, NULL, NULL, 1),
(973, 126, 64, 9, 1, NULL, NULL, 1),
(974, 126, 31, 9, 1, NULL, NULL, 1),
(975, 126, 43, 9, 1, NULL, NULL, 1),
(976, 126, 59, 9, 1, NULL, NULL, 1),
(977, 126, 61, 9, 1, NULL, NULL, 1),
(978, 126, 49, 9, 1, NULL, NULL, 1),
(979, 126, 26, 9, 1, NULL, NULL, 1),
(980, 126, 28, 9, 1, NULL, NULL, 1),
(981, 126, 41, 9, 1, NULL, NULL, 1),
(982, 126, 40, 9, 1, NULL, NULL, 1),
(983, 126, 13, 9, 1, NULL, NULL, 1),
(984, 126, 2, 9, 1, NULL, NULL, 1),
(985, 126, 30, 9, 1, NULL, NULL, 1),
(986, 126, 18, 9, 1, NULL, NULL, 1),
(987, 126, 57, 9, 1, NULL, NULL, 1),
(988, 126, 63, 9, 1, NULL, NULL, 1),
(989, 126, 74, 9, 1, NULL, NULL, 1),
(990, 126, 9, 9, 1, NULL, NULL, 1),
(991, 126, 6, 9, 1, NULL, NULL, 1),
(992, 126, 24, 9, 1, NULL, NULL, 1),
(993, 126, 33, 9, 1, NULL, NULL, 1),
(994, 126, 51, 9, 1, NULL, NULL, 1),
(995, 126, 34, 9, 1, NULL, NULL, 1),
(996, 126, 60, 9, 1, NULL, NULL, 1),
(997, 126, 53, 9, 1, NULL, NULL, 1),
(998, 126, 37, 9, 1, NULL, NULL, 1),
(999, 126, 1, 9, 1, NULL, NULL, 1),
(1000, 126, 72, 9, 1, NULL, NULL, 1),
(1001, 126, 36, 9, 1, NULL, NULL, 1),
(1002, 126, 47, 9, 1, NULL, NULL, 1),
(1003, 126, 17, 9, 1, NULL, NULL, 1),
(1004, 126, 39, 9, 1, NULL, NULL, 1),
(1005, 126, 56, 9, 1, NULL, NULL, 1),
(1006, 126, 19, 9, 1, NULL, NULL, 1),
(1007, 126, 46, 9, 1, NULL, NULL, 1),
(1008, 126, 8, 9, 1, NULL, NULL, 1),
(1009, 126, 75, 9, 1, NULL, NULL, 1),
(1010, 126, 70, 9, 1, NULL, NULL, 1),
(1011, 126, 42, 9, 1, NULL, NULL, 1),
(1012, 126, 38, 9, 1, NULL, NULL, 1),
(1013, 126, 7, 9, 1, NULL, NULL, 1),
(1014, 126, 71, 9, 1, NULL, NULL, 1),
(1015, 126, 52, 9, 1, NULL, NULL, 1),
(1016, 126, 27, 9, 1, NULL, NULL, 1),
(1017, 126, 23, 9, 1, NULL, NULL, 1),
(1018, 126, 50, 9, 1, NULL, NULL, 1),
(1019, 126, 66, 9, 1, NULL, NULL, 1),
(1020, 126, 35, 9, 1, NULL, NULL, 1),
(1021, 126, 69, 9, 1, NULL, NULL, 1),
(1022, 127, 5, 8, 1, NULL, NULL, 1),
(1023, 127, 65, 8, 1, NULL, NULL, 1),
(1024, 127, 54, 9, 1, NULL, NULL, 1),
(1025, 127, 29, 9, 1, NULL, NULL, 1),
(1026, 127, 55, 9, 1, NULL, NULL, 1),
(1027, 127, 45, 9, 1, NULL, NULL, 1),
(1028, 127, 4, 9, 1, NULL, NULL, 1),
(1029, 127, 16, 9, 1, NULL, NULL, 1),
(1030, 127, 67, 9, 1, NULL, NULL, 1),
(1031, 127, 73, 9, 1, NULL, NULL, 1),
(1032, 127, 32, 9, 1, NULL, NULL, 1),
(1033, 127, 11, 9, 1, NULL, NULL, 1),
(1034, 127, 48, 9, 1, NULL, NULL, 1),
(1035, 127, 12, 9, 1, NULL, NULL, 1),
(1036, 127, 62, 9, 1, NULL, NULL, 1),
(1037, 127, 20, 9, 1, NULL, NULL, 1),
(1038, 127, 14, 9, 1, NULL, NULL, 1),
(1039, 127, 58, 9, 1, NULL, NULL, 1),
(1040, 127, 10, 9, 1, NULL, NULL, 1),
(1041, 127, 22, 9, 1, NULL, NULL, 1),
(1042, 127, 3, 9, 1, NULL, NULL, 1),
(1043, 127, 21, 9, 1, NULL, NULL, 1),
(1044, 127, 15, 9, 1, NULL, NULL, 1),
(1045, 127, 68, 9, 1, NULL, NULL, 1),
(1046, 127, 44, 9, 1, NULL, NULL, 1),
(1047, 127, 64, 9, 1, NULL, NULL, 1),
(1048, 127, 31, 9, 1, NULL, NULL, 1),
(1049, 127, 43, 9, 1, NULL, NULL, 1),
(1050, 127, 59, 9, 1, NULL, NULL, 1),
(1051, 127, 61, 9, 1, NULL, NULL, 1),
(1052, 127, 49, 9, 1, NULL, NULL, 1),
(1053, 127, 26, 9, 1, NULL, NULL, 1),
(1054, 127, 28, 9, 1, NULL, NULL, 1),
(1055, 127, 41, 9, 1, NULL, NULL, 1),
(1056, 127, 40, 9, 1, NULL, NULL, 1),
(1057, 127, 13, 9, 1, NULL, NULL, 1),
(1058, 127, 2, 9, 1, NULL, NULL, 1),
(1059, 127, 30, 9, 1, NULL, NULL, 1),
(1060, 127, 18, 9, 1, NULL, NULL, 1),
(1061, 127, 57, 9, 1, NULL, NULL, 1),
(1062, 127, 63, 9, 1, NULL, NULL, 1),
(1063, 127, 74, 9, 1, NULL, NULL, 1),
(1064, 127, 9, 9, 1, NULL, NULL, 1),
(1065, 127, 6, 9, 1, NULL, NULL, 1),
(1066, 127, 24, 9, 1, NULL, NULL, 1),
(1067, 127, 33, 9, 1, NULL, NULL, 1),
(1068, 127, 51, 9, 1, NULL, NULL, 1),
(1069, 127, 34, 9, 1, NULL, NULL, 1),
(1070, 127, 60, 9, 1, NULL, NULL, 1),
(1071, 127, 53, 9, 1, NULL, NULL, 1),
(1072, 127, 37, 9, 1, NULL, NULL, 1),
(1073, 127, 1, 9, 1, NULL, NULL, 1),
(1074, 127, 72, 9, 1, NULL, NULL, 1),
(1075, 127, 36, 9, 1, NULL, NULL, 1),
(1076, 127, 47, 9, 1, NULL, NULL, 1),
(1077, 127, 17, 9, 1, NULL, NULL, 1),
(1078, 127, 39, 9, 1, NULL, NULL, 1),
(1079, 127, 56, 9, 1, NULL, NULL, 1),
(1080, 127, 19, 9, 1, NULL, NULL, 1),
(1081, 127, 46, 9, 1, NULL, NULL, 1),
(1082, 127, 8, 9, 1, NULL, NULL, 1),
(1083, 127, 75, 9, 1, NULL, NULL, 1),
(1084, 127, 70, 9, 1, NULL, NULL, 1),
(1085, 127, 42, 9, 1, NULL, NULL, 1),
(1086, 127, 38, 9, 1, NULL, NULL, 1),
(1087, 127, 7, 9, 1, NULL, NULL, 1),
(1088, 127, 71, 9, 1, NULL, NULL, 1),
(1089, 127, 52, 9, 1, NULL, NULL, 1),
(1090, 127, 27, 9, 1, NULL, NULL, 1),
(1091, 127, 23, 9, 1, NULL, NULL, 1),
(1092, 127, 50, 9, 1, NULL, NULL, 1),
(1093, 127, 66, 9, 1, NULL, NULL, 1),
(1094, 127, 35, 9, 1, NULL, NULL, 1),
(1095, 127, 69, 9, 1, NULL, NULL, 1),
(1096, 128, 65, 8, 1, NULL, NULL, 1),
(1097, 128, 5, 9, 1, NULL, NULL, 1),
(1098, 128, 54, 9, 1, NULL, NULL, 1),
(1099, 128, 29, 9, 1, NULL, NULL, 1),
(1100, 128, 55, 9, 1, NULL, NULL, 1),
(1101, 128, 45, 9, 1, NULL, NULL, 1),
(1102, 128, 4, 9, 1, NULL, NULL, 1),
(1103, 128, 16, 9, 1, NULL, NULL, 1),
(1104, 128, 67, 9, 1, NULL, NULL, 1),
(1105, 128, 73, 9, 1, NULL, NULL, 1),
(1106, 128, 32, 9, 1, NULL, NULL, 1),
(1107, 128, 11, 9, 1, NULL, NULL, 1),
(1108, 128, 48, 9, 1, NULL, NULL, 1),
(1109, 128, 12, 9, 1, NULL, NULL, 1),
(1110, 128, 62, 9, 1, NULL, NULL, 1),
(1111, 128, 20, 9, 1, NULL, NULL, 1),
(1112, 128, 14, 9, 1, NULL, NULL, 1),
(1113, 128, 58, 9, 1, NULL, NULL, 1),
(1114, 128, 10, 9, 1, NULL, NULL, 1),
(1115, 128, 22, 9, 1, NULL, NULL, 1),
(1116, 128, 3, 9, 1, NULL, NULL, 1),
(1117, 128, 21, 9, 1, NULL, NULL, 1),
(1118, 128, 15, 9, 1, NULL, NULL, 1),
(1119, 128, 68, 9, 1, NULL, NULL, 1),
(1120, 128, 44, 9, 1, NULL, NULL, 1),
(1121, 128, 64, 9, 1, NULL, NULL, 1),
(1122, 128, 31, 9, 1, NULL, NULL, 1),
(1123, 128, 43, 9, 1, NULL, NULL, 1),
(1124, 128, 59, 9, 1, NULL, NULL, 1),
(1125, 128, 61, 9, 1, NULL, NULL, 1),
(1126, 128, 49, 9, 1, NULL, NULL, 1),
(1127, 128, 26, 9, 1, NULL, NULL, 1),
(1128, 128, 28, 9, 1, NULL, NULL, 1),
(1129, 128, 41, 9, 1, NULL, NULL, 1),
(1130, 128, 40, 9, 1, NULL, NULL, 1),
(1131, 128, 13, 9, 1, NULL, NULL, 1),
(1132, 128, 2, 9, 1, NULL, NULL, 1),
(1133, 128, 30, 9, 1, NULL, NULL, 1),
(1134, 128, 18, 9, 1, NULL, NULL, 1),
(1135, 128, 57, 9, 1, NULL, NULL, 1),
(1136, 128, 63, 9, 1, NULL, NULL, 1),
(1137, 128, 74, 9, 1, NULL, NULL, 1),
(1138, 128, 9, 9, 1, NULL, NULL, 1),
(1139, 128, 6, 9, 1, NULL, NULL, 1),
(1140, 128, 24, 9, 1, NULL, NULL, 1),
(1141, 128, 33, 9, 1, NULL, NULL, 1),
(1142, 128, 51, 9, 1, NULL, NULL, 1),
(1143, 128, 34, 9, 1, NULL, NULL, 1),
(1144, 128, 60, 9, 1, NULL, NULL, 1),
(1145, 128, 53, 9, 1, NULL, NULL, 1),
(1146, 128, 37, 9, 1, NULL, NULL, 1),
(1147, 128, 1, 9, 1, NULL, NULL, 1),
(1148, 128, 72, 9, 1, NULL, NULL, 1),
(1149, 128, 36, 9, 1, NULL, NULL, 1),
(1150, 128, 47, 9, 1, NULL, NULL, 1),
(1151, 128, 17, 9, 1, NULL, NULL, 1),
(1152, 128, 39, 9, 1, NULL, NULL, 1),
(1153, 128, 56, 9, 1, NULL, NULL, 1),
(1154, 128, 19, 9, 1, NULL, NULL, 1),
(1155, 128, 46, 9, 1, NULL, NULL, 1),
(1156, 128, 8, 9, 1, NULL, NULL, 1),
(1157, 128, 75, 9, 1, NULL, NULL, 1),
(1158, 128, 70, 9, 1, NULL, NULL, 1),
(1159, 128, 42, 9, 1, NULL, NULL, 1),
(1160, 128, 38, 9, 1, NULL, NULL, 1),
(1161, 128, 7, 9, 1, NULL, NULL, 1),
(1162, 128, 71, 9, 1, NULL, NULL, 1),
(1163, 128, 52, 9, 1, NULL, NULL, 1),
(1164, 128, 27, 9, 1, NULL, NULL, 1),
(1165, 128, 23, 9, 1, NULL, NULL, 1),
(1166, 128, 50, 9, 1, NULL, NULL, 1),
(1167, 128, 66, 9, 1, NULL, NULL, 1),
(1168, 128, 35, 9, 1, NULL, NULL, 1),
(1169, 128, 69, 9, 1, NULL, NULL, 1),
(1170, 129, 5, 8, 1, NULL, NULL, 1),
(1171, 129, 65, 8, 1, NULL, NULL, 1),
(1172, 129, 54, 9, 1, NULL, NULL, 1),
(1173, 129, 29, 9, 1, NULL, NULL, 1),
(1174, 129, 55, 9, 1, NULL, NULL, 1),
(1175, 129, 45, 9, 1, NULL, NULL, 1),
(1176, 129, 4, 9, 1, NULL, NULL, 1),
(1177, 129, 16, 9, 1, NULL, NULL, 1),
(1178, 129, 67, 9, 1, NULL, NULL, 1),
(1179, 129, 73, 9, 1, NULL, NULL, 1),
(1180, 129, 32, 9, 1, NULL, NULL, 1),
(1181, 129, 11, 9, 1, NULL, NULL, 1),
(1182, 129, 48, 9, 1, NULL, NULL, 1),
(1183, 129, 12, 9, 1, NULL, NULL, 1),
(1184, 129, 62, 9, 1, NULL, NULL, 1),
(1185, 129, 20, 9, 1, NULL, NULL, 1),
(1186, 129, 14, 9, 1, NULL, NULL, 1),
(1187, 129, 58, 9, 1, NULL, NULL, 1),
(1188, 129, 10, 9, 1, NULL, NULL, 1),
(1189, 129, 22, 9, 1, NULL, NULL, 1),
(1190, 129, 3, 9, 1, NULL, NULL, 1),
(1191, 129, 21, 9, 1, NULL, NULL, 1),
(1192, 129, 15, 9, 1, NULL, NULL, 1),
(1193, 129, 68, 9, 1, NULL, NULL, 1),
(1194, 129, 44, 9, 1, NULL, NULL, 1),
(1195, 129, 64, 9, 1, NULL, NULL, 1),
(1196, 129, 31, 9, 1, NULL, NULL, 1),
(1197, 129, 43, 9, 1, NULL, NULL, 1),
(1198, 129, 59, 9, 1, NULL, NULL, 1),
(1199, 129, 61, 9, 1, NULL, NULL, 1),
(1200, 129, 49, 9, 1, NULL, NULL, 1),
(1201, 129, 26, 9, 1, NULL, NULL, 1),
(1202, 129, 28, 9, 1, NULL, NULL, 1),
(1203, 129, 41, 9, 1, NULL, NULL, 1),
(1204, 129, 40, 9, 1, NULL, NULL, 1),
(1205, 129, 13, 9, 1, NULL, NULL, 1),
(1206, 129, 2, 9, 1, NULL, NULL, 1),
(1207, 129, 30, 9, 1, NULL, NULL, 1),
(1208, 129, 18, 9, 1, NULL, NULL, 1),
(1209, 129, 57, 9, 1, NULL, NULL, 1),
(1210, 129, 63, 9, 1, NULL, NULL, 1),
(1211, 129, 74, 9, 1, NULL, NULL, 1),
(1212, 129, 9, 9, 1, NULL, NULL, 1),
(1213, 129, 6, 9, 1, NULL, NULL, 1),
(1214, 129, 24, 9, 1, NULL, NULL, 1),
(1215, 129, 33, 9, 1, NULL, NULL, 1),
(1216, 129, 51, 9, 1, NULL, NULL, 1),
(1217, 129, 34, 9, 1, NULL, NULL, 1),
(1218, 129, 60, 9, 1, NULL, NULL, 1),
(1219, 129, 53, 9, 1, NULL, NULL, 1),
(1220, 129, 37, 9, 1, NULL, NULL, 1),
(1221, 129, 1, 9, 1, NULL, NULL, 1),
(1222, 129, 72, 9, 1, NULL, NULL, 1),
(1223, 129, 36, 9, 1, NULL, NULL, 1),
(1224, 129, 47, 9, 1, NULL, NULL, 1),
(1225, 129, 17, 9, 1, NULL, NULL, 1),
(1226, 129, 39, 9, 1, NULL, NULL, 1),
(1227, 129, 56, 9, 1, NULL, NULL, 1),
(1228, 129, 19, 9, 1, NULL, NULL, 1),
(1229, 129, 46, 9, 1, NULL, NULL, 1),
(1230, 129, 8, 9, 1, NULL, NULL, 1),
(1231, 129, 75, 9, 1, NULL, NULL, 1),
(1232, 129, 70, 9, 1, NULL, NULL, 1),
(1233, 129, 42, 9, 1, NULL, NULL, 1),
(1234, 129, 38, 9, 1, NULL, NULL, 1),
(1235, 129, 7, 9, 1, NULL, NULL, 1),
(1236, 129, 71, 9, 1, NULL, NULL, 1),
(1237, 129, 52, 9, 1, NULL, NULL, 1),
(1238, 129, 27, 9, 1, NULL, NULL, 1),
(1239, 129, 23, 9, 1, NULL, NULL, 1),
(1240, 129, 50, 9, 1, NULL, NULL, 1),
(1241, 129, 66, 9, 1, NULL, NULL, 1),
(1242, 129, 35, 9, 1, NULL, NULL, 1),
(1243, 129, 69, 9, 1, NULL, NULL, 1),
(1244, 130, 5, 8, 1, NULL, NULL, 1),
(1245, 130, 29, 9, 1, NULL, NULL, 1),
(1246, 130, 4, 9, 1, NULL, NULL, 1),
(1247, 130, 16, 9, 1, NULL, NULL, 1),
(1248, 130, 32, 9, 1, NULL, NULL, 1),
(1249, 130, 11, 9, 1, NULL, NULL, 1),
(1250, 130, 12, 9, 1, NULL, NULL, 1),
(1251, 130, 20, 9, 1, NULL, NULL, 1),
(1252, 130, 14, 9, 1, NULL, NULL, 1),
(1253, 130, 10, 9, 1, NULL, NULL, 1),
(1254, 130, 22, 9, 1, NULL, NULL, 1),
(1255, 130, 3, 9, 1, NULL, NULL, 1),
(1256, 130, 21, 9, 1, NULL, NULL, 1),
(1257, 130, 15, 9, 1, NULL, NULL, 1),
(1258, 130, 31, 9, 1, NULL, NULL, 1),
(1259, 130, 26, 9, 1, NULL, NULL, 1),
(1260, 130, 28, 9, 1, NULL, NULL, 1),
(1261, 130, 13, 9, 1, NULL, NULL, 1),
(1262, 130, 2, 9, 1, NULL, NULL, 1),
(1263, 130, 30, 9, 1, NULL, NULL, 1),
(1264, 130, 18, 9, 1, NULL, NULL, 1),
(1265, 130, 9, 9, 1, NULL, NULL, 1),
(1266, 130, 6, 9, 1, NULL, NULL, 1),
(1267, 130, 24, 9, 1, NULL, NULL, 1),
(1268, 130, 33, 9, 1, NULL, NULL, 1),
(1269, 130, 34, 9, 1, NULL, NULL, 1),
(1270, 130, 1, 9, 1, NULL, NULL, 1),
(1271, 130, 17, 9, 1, NULL, NULL, 1),
(1272, 130, 19, 9, 1, NULL, NULL, 1),
(1273, 130, 8, 9, 1, NULL, NULL, 1),
(1274, 130, 7, 9, 1, NULL, NULL, 1),
(1275, 130, 27, 9, 1, NULL, NULL, 1),
(1276, 130, 23, 9, 1, NULL, NULL, 1),
(1277, 131, 5, 8, 1, NULL, NULL, 1),
(1278, 131, 29, 9, 1, NULL, NULL, 1),
(1279, 131, 4, 9, 1, NULL, NULL, 1),
(1280, 131, 16, 9, 1, NULL, NULL, 1),
(1281, 131, 32, 9, 1, NULL, NULL, 1),
(1282, 131, 11, 9, 1, NULL, NULL, 1),
(1283, 131, 12, 9, 1, NULL, NULL, 1),
(1284, 131, 20, 9, 1, NULL, NULL, 1),
(1285, 131, 14, 9, 1, NULL, NULL, 1),
(1286, 131, 10, 9, 1, NULL, NULL, 1),
(1287, 131, 22, 9, 1, NULL, NULL, 1),
(1288, 131, 3, 9, 1, NULL, NULL, 1),
(1289, 131, 21, 9, 1, NULL, NULL, 1),
(1290, 131, 15, 9, 1, NULL, NULL, 1),
(1291, 131, 31, 9, 1, NULL, NULL, 1),
(1292, 131, 26, 9, 1, NULL, NULL, 1),
(1293, 131, 28, 9, 1, NULL, NULL, 1),
(1294, 131, 13, 9, 1, NULL, NULL, 1),
(1295, 131, 2, 9, 1, NULL, NULL, 1),
(1296, 131, 30, 9, 1, NULL, NULL, 1),
(1297, 131, 18, 9, 1, NULL, NULL, 1),
(1298, 131, 9, 9, 1, NULL, NULL, 1),
(1299, 131, 6, 9, 1, NULL, NULL, 1),
(1300, 131, 24, 9, 1, NULL, NULL, 1),
(1301, 131, 33, 9, 1, NULL, NULL, 1),
(1302, 131, 34, 9, 1, NULL, NULL, 1),
(1303, 131, 1, 9, 1, NULL, NULL, 1),
(1304, 131, 17, 9, 1, NULL, NULL, 1),
(1305, 131, 19, 9, 1, NULL, NULL, 1),
(1306, 131, 8, 9, 1, NULL, NULL, 1),
(1307, 131, 7, 9, 1, NULL, NULL, 1),
(1308, 131, 27, 9, 1, NULL, NULL, 1),
(1309, 131, 23, 9, 1, NULL, NULL, 1),
(1310, 132, 5, 8, 1, NULL, NULL, 1),
(1311, 132, 29, 9, 1, NULL, NULL, 1),
(1312, 132, 4, 9, 1, NULL, NULL, 1),
(1313, 132, 16, 9, 1, NULL, NULL, 1),
(1314, 132, 32, 9, 1, NULL, NULL, 1),
(1315, 132, 11, 9, 1, NULL, NULL, 1),
(1316, 132, 12, 9, 1, NULL, NULL, 1),
(1317, 132, 20, 9, 1, NULL, NULL, 1),
(1318, 132, 14, 9, 1, NULL, NULL, 1),
(1319, 132, 10, 9, 1, NULL, NULL, 1),
(1320, 132, 22, 9, 1, NULL, NULL, 1),
(1321, 132, 3, 9, 1, NULL, NULL, 1),
(1322, 132, 21, 9, 1, NULL, NULL, 1),
(1323, 132, 15, 9, 1, NULL, NULL, 1),
(1324, 132, 31, 9, 1, NULL, NULL, 1),
(1325, 132, 26, 9, 1, NULL, NULL, 1),
(1326, 132, 28, 9, 1, NULL, NULL, 1),
(1327, 132, 13, 9, 1, NULL, NULL, 1),
(1328, 132, 2, 9, 1, NULL, NULL, 1),
(1329, 132, 30, 9, 1, NULL, NULL, 1),
(1330, 132, 18, 9, 1, NULL, NULL, 1),
(1331, 132, 9, 9, 1, NULL, NULL, 1),
(1332, 132, 6, 9, 1, NULL, NULL, 1),
(1333, 132, 24, 9, 1, NULL, NULL, 1),
(1334, 132, 33, 9, 1, NULL, NULL, 1),
(1335, 132, 34, 9, 1, NULL, NULL, 1),
(1336, 132, 1, 9, 1, NULL, NULL, 1),
(1337, 132, 17, 9, 1, NULL, NULL, 1),
(1338, 132, 19, 9, 1, NULL, NULL, 1),
(1339, 132, 8, 9, 1, NULL, NULL, 1),
(1340, 132, 7, 9, 1, NULL, NULL, 1),
(1341, 132, 27, 9, 1, NULL, NULL, 1),
(1342, 132, 23, 9, 1, NULL, NULL, 1),
(1343, 133, 5, 8, 1, NULL, NULL, 1),
(1344, 133, 65, 9, 1, NULL, NULL, 1),
(1345, 133, 54, 9, 1, NULL, NULL, 1),
(1346, 133, 55, 9, 1, NULL, NULL, 1),
(1347, 133, 45, 9, 1, NULL, NULL, 1),
(1348, 133, 67, 9, 1, NULL, NULL, 1),
(1349, 133, 73, 9, 1, NULL, NULL, 1),
(1350, 133, 48, 9, 1, NULL, NULL, 1),
(1351, 133, 62, 9, 1, NULL, NULL, 1),
(1352, 133, 58, 9, 1, NULL, NULL, 1),
(1353, 133, 68, 9, 1, NULL, NULL, 1),
(1354, 133, 44, 9, 1, NULL, NULL, 1),
(1355, 133, 64, 9, 1, NULL, NULL, 1),
(1356, 133, 43, 9, 1, NULL, NULL, 1),
(1357, 133, 59, 9, 1, NULL, NULL, 1),
(1358, 133, 61, 9, 1, NULL, NULL, 1),
(1359, 133, 49, 9, 1, NULL, NULL, 1),
(1360, 133, 41, 9, 1, NULL, NULL, 1),
(1361, 133, 40, 9, 1, NULL, NULL, 1),
(1362, 133, 57, 9, 1, NULL, NULL, 1),
(1363, 133, 63, 9, 1, NULL, NULL, 1),
(1364, 133, 51, 9, 1, NULL, NULL, 1),
(1365, 133, 60, 9, 1, NULL, NULL, 1),
(1366, 133, 53, 9, 1, NULL, NULL, 1),
(1367, 133, 37, 9, 1, NULL, NULL, 1),
(1368, 133, 72, 9, 1, NULL, NULL, 1),
(1369, 133, 36, 9, 1, NULL, NULL, 1),
(1370, 133, 47, 9, 1, NULL, NULL, 1),
(1371, 133, 39, 9, 1, NULL, NULL, 1),
(1372, 133, 56, 9, 1, NULL, NULL, 1),
(1373, 133, 46, 9, 1, NULL, NULL, 1),
(1374, 133, 70, 9, 1, NULL, NULL, 1),
(1375, 133, 42, 9, 1, NULL, NULL, 1),
(1376, 133, 38, 9, 1, NULL, NULL, 1),
(1377, 133, 71, 9, 1, NULL, NULL, 1),
(1378, 133, 52, 9, 1, NULL, NULL, 1),
(1379, 133, 50, 9, 1, NULL, NULL, 1),
(1380, 133, 66, 9, 1, NULL, NULL, 1),
(1381, 133, 35, 9, 1, NULL, NULL, 1),
(1382, 133, 69, 9, 1, NULL, NULL, 1),
(1383, 134, 5, 9, 1, NULL, NULL, 1),
(1384, 134, 65, 9, 1, NULL, NULL, 1),
(1385, 134, 54, 9, 1, NULL, NULL, 1),
(1386, 134, 29, 9, 1, NULL, NULL, 1),
(1387, 134, 55, 9, 1, NULL, NULL, 1),
(1388, 134, 45, 9, 1, NULL, NULL, 1),
(1389, 134, 4, 9, 1, NULL, NULL, 1),
(1390, 134, 16, 9, 1, NULL, NULL, 1),
(1391, 134, 67, 9, 1, NULL, NULL, 1),
(1392, 134, 73, 9, 1, NULL, NULL, 1),
(1393, 134, 32, 9, 1, NULL, NULL, 1),
(1394, 134, 11, 9, 1, NULL, NULL, 1),
(1395, 134, 48, 9, 1, NULL, NULL, 1),
(1396, 134, 12, 9, 1, NULL, NULL, 1),
(1397, 134, 62, 9, 1, NULL, NULL, 1),
(1398, 134, 20, 9, 1, NULL, NULL, 1),
(1399, 134, 14, 9, 1, NULL, NULL, 1),
(1400, 134, 58, 9, 1, NULL, NULL, 1),
(1401, 134, 10, 9, 1, NULL, NULL, 1),
(1402, 134, 22, 9, 1, NULL, NULL, 1),
(1403, 134, 3, 9, 1, NULL, NULL, 1),
(1404, 134, 21, 9, 1, NULL, NULL, 1),
(1405, 134, 15, 9, 1, NULL, NULL, 1),
(1406, 134, 68, 9, 1, NULL, NULL, 1),
(1407, 134, 44, 9, 1, NULL, NULL, 1),
(1408, 134, 64, 9, 1, NULL, NULL, 1),
(1409, 134, 31, 9, 1, NULL, NULL, 1),
(1410, 134, 43, 9, 1, NULL, NULL, 1),
(1411, 134, 59, 9, 1, NULL, NULL, 1),
(1412, 134, 61, 9, 1, NULL, NULL, 1),
(1413, 134, 49, 9, 1, NULL, NULL, 1),
(1414, 134, 26, 9, 1, NULL, NULL, 1),
(1415, 134, 28, 9, 1, NULL, NULL, 1),
(1416, 134, 41, 9, 1, NULL, NULL, 1),
(1417, 134, 40, 9, 1, NULL, NULL, 1),
(1418, 134, 13, 9, 1, NULL, NULL, 1),
(1419, 134, 2, 9, 1, NULL, NULL, 1),
(1420, 134, 30, 9, 1, NULL, NULL, 1),
(1421, 134, 18, 9, 1, NULL, NULL, 1),
(1422, 134, 57, 9, 1, NULL, NULL, 1),
(1423, 134, 63, 9, 1, NULL, NULL, 1),
(1424, 134, 74, 9, 1, NULL, NULL, 1),
(1425, 134, 9, 9, 1, NULL, NULL, 1),
(1426, 134, 6, 9, 1, NULL, NULL, 1),
(1427, 134, 24, 9, 1, NULL, NULL, 1),
(1428, 134, 33, 9, 1, NULL, NULL, 1),
(1429, 134, 51, 9, 1, NULL, NULL, 1),
(1430, 134, 34, 9, 1, NULL, NULL, 1),
(1431, 134, 60, 9, 1, NULL, NULL, 1),
(1432, 134, 53, 9, 1, NULL, NULL, 1),
(1433, 134, 37, 9, 1, NULL, NULL, 1),
(1434, 134, 1, 9, 1, NULL, NULL, 1),
(1435, 134, 72, 9, 1, NULL, NULL, 1),
(1436, 134, 36, 9, 1, NULL, NULL, 1),
(1437, 134, 47, 9, 1, NULL, NULL, 1),
(1438, 134, 17, 9, 1, NULL, NULL, 1),
(1439, 134, 39, 9, 1, NULL, NULL, 1),
(1440, 134, 56, 9, 1, NULL, NULL, 1),
(1441, 134, 19, 9, 1, NULL, NULL, 1),
(1442, 134, 46, 9, 1, NULL, NULL, 1),
(1443, 134, 8, 9, 1, NULL, NULL, 1),
(1444, 134, 75, 9, 1, NULL, NULL, 1),
(1445, 134, 70, 9, 1, NULL, NULL, 1),
(1446, 134, 42, 9, 1, NULL, NULL, 1),
(1447, 134, 38, 9, 1, NULL, NULL, 1),
(1448, 134, 7, 9, 1, NULL, NULL, 1),
(1449, 134, 71, 9, 1, NULL, NULL, 1),
(1450, 134, 52, 9, 1, NULL, NULL, 1),
(1451, 134, 27, 9, 1, NULL, NULL, 1);
INSERT INTO `activities_users` (`id`, `activity_id`, `user_id`, `duty_id`, `tagged`, `start`, `end`, `active`) VALUES
(1452, 134, 23, 9, 1, NULL, NULL, 1),
(1453, 134, 50, 9, 1, NULL, NULL, 1),
(1454, 134, 66, 9, 1, NULL, NULL, 1),
(1455, 134, 35, 9, 1, NULL, NULL, 1),
(1456, 134, 69, 9, 1, NULL, NULL, 1),
(1457, 135, 1, 1, 1, '2015-02-23', '2015-02-26', 1),
(1458, 135, 2, 3, 1, '2015-02-23', '2015-03-03', 1),
(1459, 135, 21, 5, 1, '2015-02-23', '2015-03-28', 1),
(1460, 135, 14, 7, 1, '2015-02-23', '2015-03-28', 1),
(1461, 135, 5, 7, 1, '2015-02-23', '2015-03-28', 1),
(1462, 136, 1, 1, 1, '2015-01-30', '2015-02-03', 1),
(1463, 136, 77, 3, 1, '2015-01-30', '2015-02-11', 1),
(1464, 136, 9, 5, 1, '2015-01-30', '2015-03-08', 1),
(1465, 136, 5, 7, 1, '2015-01-30', '2015-03-08', 1),
(1466, 136, 32, 7, 1, '2015-01-30', '2015-03-08', 1),
(1467, 136, 6, 7, 1, '2015-01-30', '2015-03-08', 1),
(1468, 137, 1, 1, 1, '2015-01-30', '2015-02-03', 1),
(1469, 137, 77, 3, 1, '2015-01-30', '2015-02-11', 1),
(1470, 137, 9, 5, 1, '2015-01-30', '2015-03-08', 1),
(1471, 137, 5, 7, 1, '2015-01-30', '2015-03-08', 1),
(1472, 137, 32, 7, 1, '2015-01-30', '2015-03-08', 1),
(1473, 137, 6, 7, 1, '2015-01-30', '2015-03-08', 1),
(1474, 138, 1, 1, 1, '2015-01-30', '2015-02-03', 1),
(1475, 138, 77, 3, 1, '2015-01-30', '2015-02-07', 1),
(1476, 138, 9, 5, 1, '2015-01-30', '2015-02-24', 1),
(1477, 138, 5, 7, 1, '2015-01-30', '2015-02-24', 1),
(1478, 138, 32, 7, 1, '2015-01-30', '2015-02-24', 1),
(1479, 138, 6, 7, 1, '2015-01-30', '2015-02-24', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activityuserviews`
--
CREATE TABLE IF NOT EXISTS `activityuserviews` (
`id` bigint(20)
,`activity_id` bigint(20)
,`user_id` int(11)
,`duty_id` int(11)
,`tagged` tinyint(1)
,`userstart` date
,`userend` date
,`active` tinyint(1)
,`categorytree_id` int(11)
,`activityname` varchar(255)
,`activitydraft` tinyint(1)
,`activitypublic` tinyint(1)
,`activitydescription` text
,`activitystart` date
,`activityend` date
,`activityactive` tinyint(1)
,`evidencename` varchar(255)
,`evidenceextension` varchar(255)
,`type_id` int(11)
,`evidenceactive` tinyint(1)
,`typename` varchar(255)
,`typedescription` varchar(255)
,`typeactive` tinyint(1)
,`username` varchar(255)
,`useractive` tinyint(1)
,`dutyname` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `calendarviews`
--
CREATE TABLE IF NOT EXISTS `calendarviews` (
`id` bigint(20)
,`activity_id` bigint(20)
,`user_id` int(11)
,`tagged` tinyint(1)
,`userstart` date
,`userend` date
,`active` tinyint(1)
,`activityname` varchar(255)
,`activitydescription` text
,`start` date
,`end` date
,`uploader_id` int(11)
,`activitydraft` tinyint(1)
,`activityactive` tinyint(1)
,`username` varchar(255)
,`userfullname` varchar(255)
,`useractive` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(1, 'Pendidikan', 1),
(2, 'Pemeriksaan', 1),
(3, 'Unsur Pengembangan Profesi', 1),
(4, 'Unsur Penunjang', 1),
(5, 'Pendidikan Sekolah untuk Memperoleh Ijazah/Gelar', 1),
(6, 'Pendidikan dan Pelatihan Fungsional di Bidang Pemeriksaan Serta Memperoleh Surat Tanda Tamat dan Pelatihan (STTPP) atau Sertifikat', 1),
(7, 'Pendidikan dan Pelatihan Prajabatan', 1),
(8, 'Diploma III', 1),
(9, 'Mengikuti Diklat Prajabatan Fungsional Pemeriksa Terampil', 1),
(10, 'Mengikuti Pendidikan dan Pelatihan di Bidang Pemeriksaan', 1),
(11, 'Lamanya Lebih dari 960 Jam', 1),
(12, 'Lamanya antara 641 - 960 Jam', 1),
(13, 'Lamanya antara 481 - 640 Jam', 1),
(14, 'Lamanya antara 161 - 480 Jam', 1),
(15, 'Lamanya antara 81 - 160 Jam', 1),
(16, 'Lamanya antara 30 - 80 Jam', 1),
(17, 'Pendidikan dan Pelatihan serta Sertifikasi Peran', 1),
(18, 'Ketua Tim Yunior (KTY)', 1),
(19, 'Anggota Tim Senior (ATS)', 1),
(20, 'Pendidikan dan Pelatihan Prajabatan Golongan II', 1),
(21, 'Penyusunan Rencana Kerja Pemeriksaan (RKP)', 1),
(22, 'Sarjana Strata Tiga (S3)', 1),
(23, 'Sarjana Strata Dua (S2)', 1),
(24, 'Sarjana Strata Satu (S1)/Diploma IV', 1),
(25, 'Pengendali Mutu (PM)', 1),
(26, 'Pengendali Teknis (PT)', 1),
(27, 'Ketua Tim Senior (KTS)', 1),
(28, 'Pendidikan dan Pelatihan Prajabatan Golongan III', 1),
(29, 'Melaksanakan administrasi dalam rangka penyusunan RKP', 1),
(30, 'Melaksanakan administrasi dalam rangka penyusunan tema pemeriksaan', 1),
(31, 'Melaksanakan administrasi dalam rangka penyusunan proposal pemeriksaan', 1),
(32, 'Mengumpulkan data dalam rangka penyusunan RKP', 1),
(33, 'Mengumpulkan data dalam rangka penyusunan revisi RKP', 1),
(34, 'Mengumpulkan data dalam rangka penyusunan tema pemeriksaan', 1),
(35, 'Mengumpulkan data dalam rangka penyusunan proposal pemeriksaan', 1),
(36, 'Menyusun tema pemeriksaan', 1),
(37, 'Menyusun usulan RKP', 1),
(38, 'Menyusun proposal pemeriksaan', 1),
(39, 'Mengusulkan RKP', 1),
(40, 'Mengusulkan Revisi RKP', 1),
(41, 'Mengusulkan tema pemeriksaan', 1),
(42, 'Mengusulkan proposal pemeriksaan', 1),
(43, 'Mengusulkan strategi pemeriksaan', 1),
(44, 'Mereviu RKP', 1),
(45, 'Mereviu Revisi RKP', 1),
(46, 'Mereviu tema pemeriksaan', 1),
(47, 'Mereviu proposal pemeriksaan', 1),
(48, 'Mereviu strategi pemeriksaan', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `categorytreecategoryviews`
--
CREATE TABLE IF NOT EXISTS `categorytreecategoryviews` (
`id` int(11)
,`categorytreeparent_id` int(11)
,`categorytreelft` int(11)
,`categorytreerght` int(11)
,`categorytree_id` int(11)
,`position_id` int(11)
,`active` tinyint(1)
,`categoryname` varchar(255)
,`positionname` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `categorytreeprefixviews`
--
CREATE TABLE IF NOT EXISTS `categorytreeprefixviews` (
`id` int(11)
,`categorytreeparent_id` int(11)
,`categorytreelft` int(11)
,`categorytreerght` int(11)
,`category_id` int(11)
,`categorytreeactive` int(11)
,`categorytreeposition_id` int(11)
,`prefixposition_id` int(11)
,`categoryname` varchar(255)
,`prefixname` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `categorytrees`
--

CREATE TABLE IF NOT EXISTS `categorytrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorytrees_prefixes`
--

CREATE TABLE IF NOT EXISTS `categorytrees_prefixes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorytree_id` int(11) NOT NULL,
  `prefix_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorytrees_values`
--

CREATE TABLE IF NOT EXISTS `categorytrees_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorytree_id` int(11) NOT NULL,
  `positionlevel_id` int(11) NOT NULL,
  `value` decimal(20,3) NOT NULL,
  `size_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chiefs`
--

CREATE TABLE IF NOT EXISTS `chiefs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chiefs`
--

INSERT INTO `chiefs` (`id`, `user_id`, `active`) VALUES
(1, 1, 1),
(2, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chiefs_departements`
--

CREATE TABLE IF NOT EXISTS `chiefs_departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chief_id` int(11) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chiefs_departements`
--

INSERT INTO `chiefs_departements` (`id`, `chief_id`, `departement_id`, `start`, `end`, `active`) VALUES
(1, 1, 6, '2015-01-16', NULL, 1),
(2, 2, 1, '2015-01-27', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `see` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `name`, `ip`, `content`, `see`, `active`) VALUES
(1, 5, NULL, '127.0.0.1', 'keep goin''', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `parent_id`, `lft`, `rght`, `description`, `address`, `active`) VALUES
(1, 'Perwakilan', NULL, 1, 12, 'BPK RI Perwakilan Provinsi Jawa Timur', 'Jl. Juanda', 1),
(2, 'Sekretariat', 1, 2, 3, 'Sekretariat', 'Jl. Juanda', 1),
(3, 'SAP I', 1, 4, 5, 'Sub Auditorat Jawa Timur I', 'Jl. Juanda', 1),
(4, 'SAP II', 1, 6, 7, 'Sub Auditorat Jawa Timur II', 'Jl. Juanda', 1),
(5, 'SAP III', 1, 8, 9, 'Sub Auditorat Jawa Timur III', 'Jl. Juanda', 1),
(6, 'SAP IV', 1, 10, 11, 'Sub Auditorat Jawa Timur IV', 'Jl. Juanda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departements_letters`
--

CREATE TABLE IF NOT EXISTS `departements_letters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departement_id` int(11) NOT NULL,
  `letter_id` bigint(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departements_users`
--

CREATE TABLE IF NOT EXISTS `departements_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=83 ;

--
-- Dumping data for table `departements_users`
--

INSERT INTO `departements_users` (`id`, `departement_id`, `user_id`, `start`, `end`, `active`) VALUES
(1, 2, 1, '0000-00-00', NULL, 0),
(2, 3, 1, '0000-00-00', NULL, 0),
(3, 4, 1, '0000-00-00', NULL, 0),
(4, 5, 1, '0000-00-00', NULL, 0),
(5, 6, 1, '2015-01-16', NULL, 1),
(6, 6, 2, '2015-01-16', NULL, 1),
(7, 6, 3, '2015-01-16', NULL, 1),
(8, 6, 4, '2015-01-16', NULL, 1),
(9, 6, 5, '2015-01-16', NULL, 1),
(10, 6, 6, '2015-01-16', NULL, 1),
(11, 6, 7, '2015-01-22', NULL, 1),
(12, 6, 8, '2015-01-22', NULL, 1),
(13, 6, 9, '2015-01-22', NULL, 1),
(14, 6, 10, '2015-01-22', NULL, 1),
(15, 6, 11, '2015-01-22', NULL, 1),
(16, 6, 12, '2015-01-22', NULL, 1),
(17, 6, 13, '2015-01-22', NULL, 1),
(18, 6, 14, '2015-01-22', NULL, 1),
(19, 6, 15, '2015-01-22', NULL, 1),
(20, 6, 16, '2015-01-22', NULL, 1),
(21, 6, 17, '2015-01-22', NULL, 1),
(22, 6, 18, '2015-01-22', NULL, 1),
(23, 6, 19, '2015-01-22', NULL, 1),
(24, 6, 20, '2015-01-22', NULL, 1),
(25, 6, 21, '2015-01-22', NULL, 1),
(26, 6, 22, '2015-01-22', NULL, 1),
(27, 6, 23, '2015-01-22', NULL, 1),
(28, 6, 24, '2015-01-22', NULL, 1),
(29, 6, 25, '2015-01-22', NULL, 1),
(30, 6, 26, '2015-01-22', NULL, 1),
(31, 6, 27, '2015-01-22', NULL, 1),
(32, 6, 28, '2015-01-22', NULL, 1),
(33, 6, 29, '2015-01-22', NULL, 1),
(34, 6, 30, '2015-01-22', NULL, 1),
(35, 6, 31, '2015-01-22', NULL, 1),
(36, 6, 32, '2015-01-22', NULL, 1),
(37, 6, 33, '2015-01-22', NULL, 1),
(38, 6, 34, '2015-01-22', NULL, 1),
(39, 3, 35, '2015-01-22', NULL, 1),
(40, 3, 36, '2015-01-22', NULL, 1),
(41, 3, 37, '2015-01-22', NULL, 1),
(42, 3, 38, '2015-01-22', NULL, 1),
(43, 3, 39, '2015-01-22', NULL, 1),
(44, 3, 40, '2015-01-22', NULL, 1),
(45, 3, 41, '2015-01-22', NULL, 1),
(46, 3, 42, '2015-01-22', NULL, 1),
(47, 3, 43, '2015-01-22', NULL, 1),
(48, 3, 44, '2015-01-22', NULL, 1),
(49, 3, 45, '2015-01-22', NULL, 1),
(50, 3, 46, '2015-01-22', NULL, 1),
(51, 3, 47, '2015-01-22', NULL, 1),
(52, 3, 48, '2015-01-22', NULL, 1),
(53, 3, 49, '2015-01-22', NULL, 1),
(54, 3, 50, '2015-01-22', NULL, 1),
(55, 3, 51, '2015-01-22', NULL, 1),
(56, 3, 52, '2015-01-22', NULL, 1),
(57, 3, 53, '2015-01-22', NULL, 1),
(58, 3, 54, '2015-01-22', NULL, 1),
(59, 3, 55, '2015-01-22', NULL, 1),
(60, 3, 56, '2015-01-22', NULL, 1),
(61, 3, 57, '2015-01-22', NULL, 1),
(62, 3, 58, '2015-01-22', NULL, 1),
(63, 3, 59, '2015-01-22', NULL, 1),
(64, 3, 60, '2015-01-22', NULL, 1),
(65, 3, 61, '2015-01-22', NULL, 1),
(66, 3, 62, '2015-01-22', NULL, 1),
(67, 3, 63, '2015-01-22', NULL, 1),
(68, 3, 64, '2015-01-22', NULL, 1),
(69, 3, 65, '2015-01-22', NULL, 1),
(70, 3, 66, '2015-01-22', NULL, 1),
(71, 3, 67, '2015-01-22', NULL, 1),
(72, 3, 68, '2015-01-22', NULL, 1),
(73, 3, 69, '2015-01-22', NULL, 1),
(74, 3, 70, '2015-01-22', NULL, 1),
(75, 3, 71, '2015-01-22', NULL, 1),
(76, 3, 72, '2015-01-22', NULL, 1),
(77, 3, 73, '2015-01-22', NULL, 1),
(78, 4, 74, '2015-01-23', NULL, 1),
(79, 4, 75, '2015-01-23', NULL, 1),
(80, 1, 76, '2015-01-28', NULL, 1),
(81, 6, 77, '2015-02-11', NULL, 1),
(82, 2, 78, '2015-02-11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE IF NOT EXISTS `duties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `duties`
--

INSERT INTO `duties` (`id`, `name`, `active`) VALUES
(1, 'Penanggung Jawab', 1),
(2, 'Wakil Penanggung Jawab', 1),
(3, 'Pengendali Teknis', 1),
(4, 'Wakil Pengendali Teknis', 1),
(5, 'Ketua Tim', 1),
(6, 'Ketua Sub Tim', 1),
(7, 'Anggota Tim', 1),
(8, 'Pemapar', 1),
(9, 'Peserta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `name`, `description`, `active`) VALUES
(1, 'DIII', 'Diploma III', 1),
(2, 'S1', 'Sarjana Strata Satu/Diploma IV', 1),
(3, 'S2', 'Sarjana Strata Dua', 1),
(4, 'S3', 'Sarjana Strata Tiga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educations_users`
--

CREATE TABLE IF NOT EXISTS `educations_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE IF NOT EXISTS `entities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entitycategory_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `capital` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `entitycategory_id`, `name`, `capital`, `active`) VALUES
(1, 1, 'Jawa Timur', 'Surabaya', 1),
(2, 2, 'Surabaya', 'Surabaya', 1),
(3, 3, 'Sidoarjo', 'Sidoarjo', 1),
(4, 3, 'Pasuruan', 'Pasuruan', 1),
(5, 3, 'Bangkalan', 'Bangkalan', 1),
(6, 3, 'Banyuwangi', 'Banyuwangi', 1),
(7, 3, 'Blitar', 'Kanigoro', 1),
(8, 3, 'Bojonegoro', 'Bojonegoro', 1),
(9, 3, 'Bondowoso', 'Bondowoso', 1),
(10, 3, 'Gresik', 'Gresik', 1),
(11, 3, 'Jember', 'Jember', 1),
(12, 3, 'Jombang', 'Jombang', 1),
(13, 3, 'Kediri', 'Pare', 1),
(14, 3, 'Lamongan', 'Lamongan', 1),
(15, 3, 'Lumajang', 'Lumajang', 1),
(16, 3, 'Madiun', 'Caruban', 1),
(17, 3, 'Magetan', 'Magetan', 1),
(18, 3, 'Malang', 'Kepanjen', 1),
(19, 3, 'Mojokerto', 'Mojokerto', 1),
(20, 3, 'Nganjuk', 'Nganjuk', 1),
(21, 3, 'Ngawi', 'Ngawi', 1),
(22, 3, 'Pacitan', 'Pacitan', 1),
(23, 3, 'Pamekasan', 'Pamekasan', 1),
(24, 3, 'Pasuruan', 'Pasuruan', 0),
(25, 3, 'Ponorogo', 'Ponorogo', 1),
(26, 3, 'Probolinggo', 'Kraksaan', 1),
(27, 3, 'Sampang', 'Sampang', 1),
(28, 3, 'Situbondo', 'Situbondo', 1),
(29, 3, 'Sumenep', 'Sumenep', 1),
(30, 3, 'Trenggalek', 'Trenggalek', 1),
(31, 3, 'Tuban', 'Tuban', 1),
(32, 3, 'Tulungagung', 'Tulungagung', 1),
(33, 2, 'Batu', 'Batu', 1),
(34, 2, 'Blitar', 'Blitar', 1),
(35, 2, 'Kediri', 'Kediri', 1),
(36, 2, 'Madiun', 'Madiun', 1),
(37, 2, 'Malang', 'Malang', 1),
(38, 2, 'Mojokerto', 'Mojokerto', 1),
(39, 2, 'Pasuruan', 'Pasuruan', 1),
(40, 2, 'Probolinggo', 'Probolinggo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entitycategories`
--

CREATE TABLE IF NOT EXISTS `entitycategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `entitycategories`
--

INSERT INTO `entitycategories` (`id`, `name`, `active`) VALUES
(1, 'Provinsi', 1),
(2, 'Kota', 1),
(3, 'Kabupaten', 1),
(4, 'Kantor', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `entityviews`
--
CREATE TABLE IF NOT EXISTS `entityviews` (
`id` int(11)
,`entitycategory_id` int(11)
,`name` varchar(255)
,`capital` varchar(255)
,`active` tinyint(1)
,`entitycategoryname` varchar(255)
,`entitycategoryactive` tinyint(1)
,`fullname` varchar(511)
,`lettername` text
);
-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `value` decimal(20,3) NOT NULL,
  `categorytree_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evidences`
--

CREATE TABLE IF NOT EXISTS `evidences` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'pdf',
  `type_id` int(11) NOT NULL DEFAULT '1',
  `uploader_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `activity_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `evidences`
--

INSERT INTO `evidences` (`id`, `name`, `extension`, `type_id`, `uploader_id`, `active`, `activity_id`) VALUES
(1, NULL, 'pdf', 1, 5, 1, 1),
(2, NULL, 'pdf', 1, 5, 1, 2),
(3, NULL, 'pdf', 1, 5, 1, 3),
(4, NULL, 'pdf', 1, 5, 1, 4),
(5, NULL, 'pdf', 1, 5, 1, 5),
(6, NULL, 'pdf', 1, 5, 1, 6),
(7, NULL, 'pdf', 1, 5, 1, 7),
(8, NULL, 'pdf', 1, 5, 1, 8),
(9, NULL, 'pdf', 1, 5, 1, 9),
(10, NULL, 'pdf', 1, 5, 1, 10),
(11, NULL, 'pdf', 1, 5, 1, 11),
(12, NULL, 'pdf', 1, 5, 1, 12),
(13, NULL, 'pdf', 1, 5, 1, 13),
(14, NULL, 'pdf', 1, 5, 1, 14),
(15, NULL, 'pdf', 1, 5, 1, 15),
(16, NULL, 'pdf', 1, 5, 1, 18),
(17, NULL, 'pdf', 1, 5, 1, 20),
(18, NULL, 'pdf', 1, 5, 1, 21),
(19, NULL, 'pdf', 1, 5, 1, 22),
(20, NULL, 'pdf', 1, 5, 1, 24),
(21, NULL, 'pdf', 1, 5, 1, 26),
(22, NULL, 'pdf', 1, 5, 1, 28),
(23, NULL, 'pdf', 1, 5, 1, 29),
(24, NULL, 'pdf', 1, 5, 1, 33),
(25, NULL, 'pdf', 1, 5, 1, 37),
(26, NULL, 'pdf', 1, 5, 1, 40),
(27, NULL, 'pdf', 1, 5, 1, 41),
(28, NULL, 'pdf', 1, 5, 1, 42),
(29, NULL, 'pdf', 1, 5, 1, 49),
(30, NULL, 'pdf', 1, 5, 1, 6),
(31, NULL, 'pdf', 1, 5, 1, 51),
(32, NULL, 'pdf', 1, 5, 1, 53),
(33, NULL, 'pdf', 1, 5, 1, 62),
(34, NULL, 'pdf', 1, 5, 1, 64),
(35, NULL, 'pdf', 1, 5, 1, 67),
(36, NULL, 'pdf', 1, 5, 1, 68),
(37, NULL, 'pdf', 1, 5, 1, 72),
(38, NULL, 'pdf', 1, 5, 1, 6),
(39, NULL, 'pdf', 1, 5, 1, 97),
(40, NULL, 'pdf', 1, 5, 1, 101),
(41, NULL, 'pdf', 1, 5, 1, 102),
(42, NULL, 'pdf', 1, 5, 1, 103),
(43, NULL, 'png', 1, 5, 1, 104),
(44, NULL, 'png', 1, 5, 1, 105),
(45, '109/2014', 'pdf', 6, 5, 1, 106),
(46, '109/2014', 'pdf', 6, 5, 1, 107),
(47, '/SP2/XVIII.JATIM/01/2015', 'pdf', 6, 5, 1, 108),
(48, '/SP2/XVIII.JATIM/01/2015', 'pdf', 6, 5, 1, 109),
(49, '/SP2/XVIII.JATIM/01/2015', 'pdf', 6, 5, 1, 110),
(50, '/SP2/XVIII.JATIM/01/2015', 'pdf', 6, 5, 1, 111),
(51, '/SP2/XVIII.JATIM/01/2015', 'pdf', 6, 5, 1, 112),
(52, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 113),
(53, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 114),
(54, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 115),
(55, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 116),
(56, '/SP2/XVIII.SBY/01/2010', 'pdf', 6, 5, 1, 118),
(57, '/SP2/XVIII.SBY/01/2010', 'pdf', 6, 5, 1, 119),
(58, '/SP2/XVIII.SBY/01/2010', 'pdf', 6, 5, 1, 120),
(59, '/SP2/XVIII.SBY/02/2011', 'pdf', 6, 5, 1, 121),
(60, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 122),
(61, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 123),
(62, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 124),
(63, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 125),
(64, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 126),
(65, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 127),
(66, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 128),
(67, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 129),
(68, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 130),
(69, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 131),
(70, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 132),
(71, '/SP2/XVIII.SBY/01/2015', 'pdf', 6, 5, 1, 133),
(72, 'coba lagi', 'pdf', 1, 5, 1, 133),
(73, NULL, 'pdf', 1, 5, 1, 134),
(74, 'transfer', 'pdf', 6, 5, 1, 134),
(75, 'Draft ST', 'pdf', 1, 5, 1, 135),
(76, 'Draft ST', 'pdf', 1, 5, 1, 136),
(77, 'Draft ST', 'pdf', 1, 5, 1, 137),
(78, 'Draft ST', 'pdf', 1, 5, 1, 138);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created`, `modified`, `active`) VALUES
(1, 'Admin', 'Administrator', '2015-01-15 20:59:49', '2015-01-15 20:59:49', 1),
(2, 'Manager', 'Manager', '2015-01-15 20:59:59', '2015-01-15 20:59:59', 1),
(3, 'User', 'User', '2015-01-15 21:00:08', '2015-01-15 21:00:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `active`) VALUES
(1, 'PPK', 'Pejabat Pembuat Komitmen', 1),
(2, 'Bendahara', 'Bendahara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_users`
--

CREATE TABLE IF NOT EXISTS `jobs_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs_users`
--

INSERT INTO `jobs_users` (`id`, `job_id`, `user_id`, `start`, `end`, `active`) VALUES
(1, 1, 78, '2015-01-01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lettercategories`
--

CREATE TABLE IF NOT EXISTS `lettercategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lettercategories`
--

INSERT INTO `lettercategories` (`id`, `name`, `active`) VALUES
(1, 'SP2 Ekspose', 1),
(2, 'ST Pemeriksaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE IF NOT EXISTS `letters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `activity_id` bigint(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `lettercategory_id` int(11) NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `activity_id`, `type_id`, `lettercategory_id`, `entity_id`, `name`, `date`, `uploader_id`, `active`) VALUES
(1, 106, 6, 1, NULL, '109/2014', '2014-09-30', 5, 1),
(2, 107, 6, 1, NULL, '109/2014', '2014-09-30', 5, 1),
(3, 108, 6, 1, NULL, '/SP2/XVIII.JATIM/01/2015', '2015-01-29', 5, 1),
(4, 109, 6, 1, NULL, '/SP2/XVIII.JATIM/01/2015', '2015-01-29', 5, 1),
(5, 110, 6, 1, NULL, '/SP2/XVIII.JATIM/01/2015', '2015-01-29', 5, 1),
(6, 111, 6, 1, NULL, '/SP2/XVIII.JATIM/01/2015', '2015-01-29', 5, 1),
(7, 112, 6, 1, NULL, '/SP2/XVIII.JATIM/01/2015', '2015-01-29', 5, 1),
(8, 113, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-29', 5, 1),
(9, 114, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-29', 5, 1),
(10, 115, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-29', 5, 1),
(11, 116, 6, 1, NULL, '4/SP2/XVIII.SBY/01/2015', '2015-01-29', 5, 1),
(12, 118, 6, 1, NULL, '/SP2/XVIII.SBY/01/2010', '2010-01-05', 5, 1),
(13, 119, 6, 1, NULL, '/SP2/XVIII.SBY/01/2010', '2010-01-05', 5, 1),
(14, 120, 6, 1, NULL, '/SP2/XVIII.SBY/01/2010', '2010-01-05', 5, 1),
(15, 121, 6, 1, NULL, '/SP2/XVIII.SBY/02/2011', '2011-02-01', 5, 1),
(16, 122, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-01', 5, 1),
(17, 123, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-02', 5, 1),
(18, 124, 6, 1, NULL, '1/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(19, 125, 6, 1, NULL, '2/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(20, 126, 6, 1, NULL, '3/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(21, 127, 6, 1, NULL, '4/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(22, 128, 6, 1, NULL, '5/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(23, 129, 6, 1, NULL, '6/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(24, 130, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(25, 131, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(26, 132, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(27, 133, 6, 1, NULL, '/SP2/XVIII.SBY/01/2015', '2015-01-31', 5, 1),
(28, 135, 1, 2, 40, '/ST/XVIII.SBY/02/2015', '2015-02-23', 5, 1),
(29, 136, 1, 2, 28, '/ST/XVIII.SBY/01/2015', '2015-01-30', 5, 1),
(30, 137, 1, 2, 28, '/ST/XVIII.SBY/01/2015', '2015-01-30', 5, 1),
(31, 138, 1, 2, 28, '/ST/XVIII.SBY/01/2015', '2015-01-30', 5, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `letteruserviews`
--
CREATE TABLE IF NOT EXISTS `letteruserviews` (
`id` bigint(20)
,`activity_id` bigint(20)
,`type_id` int(11)
,`lettercategory_id` int(11)
,`uploader_id` int(11)
,`lettername` varchar(255)
,`active` tinyint(1)
,`activityname` varchar(255)
,`activitydraft` tinyint(1)
,`activitypublic` tinyint(1)
,`activitydescription` text
,`date` date
,`activitystart` date
,`activityend` date
,`activityactive` tinyint(1)
,`evidenceid` bigint(20)
,`evidenceactive` tinyint(1)
,`user_id` int(11)
,`duty_id` int(11)
,`activityusertagged` tinyint(1)
,`activityuseractive` tinyint(1)
,`username` varchar(255)
,`useractive` tinyint(1)
,`dutyname` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `letterviews`
--
CREATE TABLE IF NOT EXISTS `letterviews` (
`id` bigint(20)
,`activity_id` bigint(20)
,`type_id` int(11)
,`lettercategory_id` int(11)
,`entity_id` int(11)
,`uploader_id` int(11)
,`lettername` varchar(255)
,`date` date
,`active` tinyint(1)
,`categorytree_id` int(11)
,`activityname` varchar(255)
,`activitydraft` tinyint(1)
,`activitypublic` tinyint(1)
,`activitydescription` text
,`activitystart` date
,`activityend` date
,`activityactive` tinyint(1)
,`entityname` varchar(255)
,`typename` varchar(255)
,`typedescription` varchar(255)
,`lettercategoryname` varchar(255)
,`uploadername` varchar(255)
,`evidenceid` bigint(20)
,`evidencename` varchar(255)
,`evidenceactive` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positionlevel_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `positionlevel_id`, `name`, `description`, `active`) VALUES
(1, 2, 'I/a', 'Juru Muda', 1),
(2, 2, 'I/b', 'Juru Muda Tingkat I', 1),
(3, 2, 'I/c', 'Juru', 1),
(4, 2, 'I/d', 'Juru Tingkat I', 1),
(5, 2, 'II/a', 'Pengatur Muda', 1),
(6, 2, 'II/b', 'Pengatur Muda Tingkat I', 1),
(7, 2, 'II/c', 'Pengatur', 1),
(8, 2, 'II/d', 'Pengatur Tingkat I', 1),
(9, 2, 'III/a', 'Penata Muda', 1),
(10, 2, 'III/b', 'Penata Muda Tingkat I', 1),
(11, 3, 'III/c', 'Penata', 1),
(12, 3, 'III/d', 'Penata Tingkat I', 1),
(13, 6, 'IV/a', 'Pembina', 1),
(14, 6, 'IV/b', 'Pembina Tingkat I', 1),
(15, 6, 'IV/c', 'Pembina Utama Muda', 1),
(16, 7, 'IV/d', 'Pembina Utama Madya', 1),
(17, 7, 'IV/e', 'Pembina Utama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `levels_users`
--

CREATE TABLE IF NOT EXISTS `levels_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `levels_users`
--

INSERT INTO `levels_users` (`id`, `level_id`, `user_id`, `start`, `end`, `active`) VALUES
(1, 8, 5, '2015-01-22', NULL, 1),
(2, 10, 14, '2015-01-22', NULL, 1),
(3, 11, 18, '2015-01-22', NULL, 1),
(4, 11, 7, '2015-01-22', NULL, 1),
(5, 11, 13, '2015-01-22', NULL, 1),
(6, 10, 22, '2015-01-22', NULL, 1),
(7, 11, 17, '2015-01-22', NULL, 1),
(8, 14, 1, '2015-01-22', NULL, 1),
(9, 12, 2, '2015-01-22', NULL, 1),
(10, 12, 3, '2015-01-22', NULL, 1),
(11, 11, 4, '2015-01-22', NULL, 1),
(12, 10, 7, '2012-01-22', '2015-01-21', 1),
(13, 11, 8, '2015-01-22', NULL, 1),
(14, 11, 9, '2015-01-22', NULL, 1),
(15, 11, 11, '2015-01-22', NULL, 1),
(16, 11, 16, '2015-01-22', NULL, 1),
(17, 11, 12, '2015-01-22', NULL, 1),
(18, 11, 15, '2015-01-22', NULL, 1),
(19, 11, 19, '2015-01-22', NULL, 1),
(20, 10, 20, '2015-01-22', NULL, 1),
(21, 10, 23, '2015-01-22', NULL, 1),
(22, 9, 6, '2015-01-22', NULL, 1),
(23, 9, 24, '2015-01-22', NULL, 1),
(24, 12, 26, '2015-01-22', NULL, 1),
(25, 12, 27, '2015-01-22', NULL, 1),
(26, 11, 28, '2015-01-22', NULL, 1),
(27, 11, 29, '2015-01-22', NULL, 1),
(28, 10, 30, '2015-01-22', NULL, 1),
(29, 10, 31, '2015-01-22', NULL, 1),
(30, 10, 32, '2015-01-22', NULL, 1),
(31, 10, 33, '2015-01-22', NULL, 1),
(32, 7, 34, '2015-01-22', NULL, 1),
(33, 14, 35, '2015-01-22', NULL, 1),
(34, 13, 36, '2015-01-22', NULL, 1),
(35, 13, 37, '2015-01-22', NULL, 1),
(36, 12, 38, '2015-01-22', NULL, 1),
(37, 12, 39, '2015-01-22', NULL, 1),
(38, 11, 40, '2015-01-22', NULL, 1),
(39, 11, 41, '2015-01-22', NULL, 1),
(40, 11, 42, '2015-01-22', NULL, 1),
(41, 11, 43, '2015-01-22', NULL, 1),
(42, 12, 44, '2015-01-22', NULL, 1),
(43, 11, 45, '2015-01-22', NULL, 1),
(44, 11, 46, '2015-01-22', NULL, 1),
(45, 11, 47, '2015-01-22', NULL, 1),
(46, 11, 48, '2015-01-22', NULL, 1),
(47, 11, 49, '2015-01-22', NULL, 1),
(48, 11, 50, '2015-01-22', NULL, 1),
(49, 11, 51, '2015-01-22', NULL, 1),
(50, 11, 52, '2015-01-22', NULL, 1),
(51, 11, 53, '2015-01-22', NULL, 1),
(52, 11, 54, '2015-01-22', NULL, 1),
(53, 10, 55, '2015-01-22', NULL, 1),
(54, 10, 56, '2015-01-22', NULL, 1),
(55, 10, 57, '2015-01-22', NULL, 1),
(56, 10, 58, '2015-01-22', NULL, 1),
(57, 10, 59, '2015-01-22', NULL, 1),
(58, 10, 60, '2015-01-22', NULL, 1),
(59, 10, 61, '2015-01-22', NULL, 1),
(60, 10, 62, '2015-01-22', NULL, 1),
(61, 10, 63, '2015-01-22', NULL, 1),
(62, 10, 64, '2015-01-22', NULL, 1),
(63, 9, 65, '2015-01-22', NULL, 1),
(64, 10, 66, '2015-01-22', NULL, 1),
(65, 9, 67, '2015-01-22', NULL, 1),
(66, 9, 68, '2015-01-22', NULL, 1),
(67, 9, 69, '2015-01-22', NULL, 1),
(68, 9, 70, '2015-01-22', NULL, 1),
(69, 9, 71, '2015-01-22', NULL, 1),
(70, 9, 72, '2015-01-22', NULL, 1),
(71, 9, 73, '2015-01-22', NULL, 1),
(72, 13, 74, '2015-01-23', NULL, 1),
(73, 13, 75, '2015-01-23', NULL, 1),
(74, 16, 76, '2015-01-28', NULL, 1),
(75, 9, 7, '2010-01-01', '2012-01-21', 1),
(76, 11, 10, '2014-01-22', NULL, 1),
(77, 10, 21, '2015-01-01', NULL, 1),
(78, 12, 77, '2015-02-11', NULL, 1),
(79, 12, 78, '2015-02-11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `positionlevels`
--

CREATE TABLE IF NOT EXISTS `positionlevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `positionlevels`
--

INSERT INTO `positionlevels` (`id`, `position_id`, `name`, `active`) VALUES
(1, 1, 'Semua', 1),
(2, 1, 'Pemeriksa Pertama', 1),
(3, 1, 'Pemeriksa Muda', 1),
(4, 3, 'Semua', 1),
(5, 2, 'Semua', 1),
(6, 2, 'Pemeriksa Madya', 1),
(7, 2, 'Pemeriksa Utama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `active`) VALUES
(1, 'Semua', 1),
(2, 'Pemeriksa', 1),
(3, 'Pemeriksa Golongan II', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefixes`
--

CREATE TABLE IF NOT EXISTS `prefixes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `prefixes`
--

INSERT INTO `prefixes` (`id`, `name`, `active`) VALUES
(1, NULL, 1),
(2, 'I', 1),
(3, 'II', 1),
(4, 'III', 1),
(5, 'IV', 1),
(6, 'V', 1),
(7, 'VI', 1),
(8, 'VII', 1),
(9, 'VIII', 1),
(10, 'IX', 1),
(11, 'X', 1),
(12, '1', 1),
(13, '2', 1),
(14, '3', 1),
(15, '4', 1),
(16, '5', 1),
(17, '6', 1),
(18, '7', 1),
(19, '8', 1),
(20, '9', 1),
(21, '10', 1),
(22, '11', 1),
(23, '12', 1),
(24, '13', 1),
(25, '14', 1),
(26, '15', 1),
(27, '16', 1),
(28, '17', 1),
(29, '18', 1),
(30, '19', 1),
(31, '20', 1),
(32, 'A', 1),
(33, 'B', 1),
(34, 'C', 1),
(35, 'D', 1),
(36, 'E', 1),
(37, 'F', 1),
(38, 'G', 1),
(39, 'H', 1),
(40, 'I', 1),
(41, 'J', 1),
(42, 'K', 1),
(43, 'L', 1),
(44, 'M', 1),
(45, 'N', 1),
(46, 'O', 1),
(47, 'P', 1),
(48, 'Q', 1),
(49, 'R', 1),
(50, 'S', 1),
(51, 'T', 1),
(52, 'U', 1),
(53, 'V', 1),
(54, 'W', 1),
(55, 'X', 1),
(56, 'Y', 1),
(57, 'Z', 1),
(58, 'a', 1),
(59, 'b', 1),
(60, 'c', 1),
(61, 'd', 1),
(62, 'e', 1),
(63, 'f', 1),
(64, 'g', 1),
(65, 'h', 1),
(66, 'i', 1),
(67, 'j', 1),
(68, 'k', 1),
(69, 'l', 1),
(70, 'm', 1),
(71, 'n', 1),
(72, 'o', 1),
(73, 'p', 1),
(74, 'q', 1),
(75, 'r', 1),
(76, 's', 1),
(77, 't', 1),
(78, 'u', 1),
(79, 'v', 1),
(80, 'w', 1),
(81, 'x', 1),
(82, 'y', 1),
(83, 'z', 1),
(84, '1)', 1),
(85, '2)', 1),
(86, '3)', 1),
(87, '4)', 1),
(88, '5)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `active`) VALUES
(1, 'ATY', 'Anggota Tim Yunior', 1),
(2, 'ATS', 'Anggota Tim Senior', 1),
(3, 'KTY', 'Ketua Tim Yunior', 1),
(4, 'KTS', 'Ketua Tim Senior', 1),
(5, 'PT', 'Pengendali Teknis', 1),
(6, 'PM', 'Pengendali Mutu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=79 ;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `role_id`, `user_id`, `start`, `end`, `active`) VALUES
(1, 2, 5, '2015-01-22', NULL, 1),
(2, 2, 14, '2015-01-22', NULL, 1),
(3, 2, 18, '2015-01-22', NULL, 1),
(4, 3, 7, '2015-01-22', NULL, 1),
(5, 2, 13, '2015-01-22', NULL, 1),
(6, 1, 22, '2015-01-22', NULL, 1),
(7, 2, 17, '2015-01-22', NULL, 1),
(8, 6, 1, '2015-01-22', NULL, 1),
(9, 4, 2, '2015-01-22', NULL, 1),
(10, 3, 3, '2015-01-22', NULL, 1),
(11, 3, 4, '2015-01-22', NULL, 1),
(12, 3, 7, '2011-01-22', '2015-01-21', 1),
(13, 2, 8, '2015-01-22', NULL, 1),
(14, 2, 9, '2015-01-22', NULL, 1),
(15, 3, 11, '2015-01-22', NULL, 1),
(16, 2, 16, '2015-01-22', NULL, 1),
(17, 2, 12, '2015-01-22', NULL, 1),
(18, 2, 15, '2015-01-22', NULL, 1),
(19, 2, 19, '2015-01-22', NULL, 1),
(20, 1, 20, '2015-01-22', NULL, 1),
(21, 1, 23, '2015-01-22', NULL, 1),
(22, 1, 6, '2015-01-22', NULL, 1),
(23, 1, 24, '2015-01-22', NULL, 1),
(24, 3, 26, '2015-01-22', NULL, 1),
(25, 4, 27, '2015-01-22', NULL, 1),
(26, 2, 28, '2015-01-22', NULL, 1),
(27, 2, 29, '2015-01-22', NULL, 1),
(28, 2, 30, '2015-01-22', NULL, 1),
(29, 1, 31, '2015-01-22', NULL, 1),
(30, 1, 32, '2015-01-22', NULL, 1),
(31, 1, 33, '2015-01-22', NULL, 1),
(32, 1, 34, '2015-01-22', NULL, 1),
(33, 6, 35, '2015-01-22', NULL, 1),
(34, 4, 36, '2015-01-22', NULL, 1),
(35, 4, 37, '2015-01-22', NULL, 1),
(36, 4, 38, '2015-01-22', NULL, 1),
(37, 3, 39, '2015-01-22', NULL, 1),
(38, 2, 40, '2015-01-22', NULL, 1),
(39, 2, 41, '2015-01-22', NULL, 1),
(40, 2, 42, '2015-01-22', NULL, 1),
(41, 3, 43, '2015-01-22', NULL, 1),
(42, 3, 44, '2015-01-22', NULL, 1),
(43, 3, 45, '2015-01-22', NULL, 1),
(44, 3, 46, '2015-01-22', NULL, 1),
(45, 2, 47, '2015-01-22', NULL, 1),
(46, 2, 48, '2015-01-22', NULL, 1),
(47, 2, 49, '2015-01-22', NULL, 1),
(48, 2, 50, '2015-01-22', NULL, 1),
(49, 2, 51, '2015-01-22', NULL, 1),
(50, 2, 52, '2015-01-22', NULL, 1),
(51, 2, 53, '2015-01-22', NULL, 1),
(52, 2, 54, '2015-01-22', NULL, 1),
(53, 2, 55, '2015-01-22', NULL, 1),
(54, 2, 56, '2015-01-22', NULL, 1),
(55, 1, 57, '2015-01-22', NULL, 1),
(56, 2, 58, '2015-01-22', NULL, 1),
(57, 2, 59, '2015-01-22', NULL, 1),
(58, 2, 60, '2015-01-22', NULL, 1),
(59, 2, 61, '2015-01-22', NULL, 1),
(60, 2, 62, '2015-01-22', NULL, 1),
(61, 1, 63, '2015-01-22', NULL, 1),
(62, 2, 64, '2015-01-22', NULL, 1),
(63, 2, 65, '2015-01-22', NULL, 1),
(64, 1, 66, '2015-01-22', NULL, 1),
(65, 1, 67, '2015-01-22', NULL, 1),
(66, 1, 68, '2015-01-22', NULL, 1),
(67, 1, 69, '2015-01-22', NULL, 1),
(68, 1, 70, '2015-01-22', NULL, 1),
(69, 1, 71, '2015-01-22', NULL, 1),
(70, 1, 72, '2015-01-22', NULL, 1),
(71, 1, 73, '2015-01-22', NULL, 1),
(72, 6, 74, '2015-01-23', NULL, 1),
(73, 4, 75, '2015-01-23', NULL, 1),
(74, 6, 76, '2015-01-28', NULL, 1),
(75, 2, 21, '2015-01-01', NULL, 1),
(76, 3, 10, '2015-01-01', NULL, 1),
(77, 4, 77, '2015-02-11', NULL, 1),
(78, 4, 78, '2015-02-11', NULL, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `simplecategorytreeprefixviews`
--
CREATE TABLE IF NOT EXISTS `simplecategorytreeprefixviews` (
`id` int(11)
,`categorytree_id` int(11)
,`prefix_id` int(11)
,`position_id` int(11)
,`active` tinyint(1)
,`prefix` varchar(255)
,`position` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `simplecategorytreeviews`
--
CREATE TABLE IF NOT EXISTS `simplecategorytreeviews` (
`id` int(11)
,`parent_id` int(11)
,`lft` int(11)
,`rght` int(11)
,`active` tinyint(1)
,`name` varchar(255)
,`categorytree_id` int(11)
,`category_id` int(11)
,`position_id` int(11)
,`position` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `categorytree_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(20,3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`, `active`) VALUES
(1, 'ST', 'Surat Tugas', 1),
(2, 'SKP', 'SKP', 1),
(3, 'SP2P', 'Surat Perintah Penugasan Pemeriksaan', 1),
(4, 'SKPP', 'Surat Keterangan Penyelesaian Penugasan', 1),
(5, 'SP3', 'Surat Perintah Persiapan Pemeriksaan', 1),
(6, 'SP2', 'Surat Perintah Penugasan', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `uploaders`
--
CREATE TABLE IF NOT EXISTS `uploaders` (
`id` int(11)
,`name` varchar(255)
,`active` tinyint(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `usercareerviews`
--
CREATE TABLE IF NOT EXISTS `usercareerviews` (
`id` int(11)
,`user_id` int(11)
,`number` varchar(255)
,`name` varchar(255)
,`active` tinyint(1)
,`userlevelid` int(11)
,`level_id` int(11)
,`levelstart` date
,`levelend` date
,`levelactive` tinyint(1)
,`levelname` varchar(255)
,`leveldescription` varchar(255)
,`positionlevelname` varchar(255)
,`userroleid` int(11)
,`role_id` int(11)
,`rolestart` date
,`roleend` date
,`roleactive` tinyint(1)
,`rolename` varchar(255)
,`roledescription` varchar(255)
,`userdepartementid` int(11)
,`departement_id` int(11)
,`departementstart` date
,`departementend` date
,`departementactive` tinyint(1)
,`departementname` varchar(255)
,`departementdescription` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userdepartementviews`
--
CREATE TABLE IF NOT EXISTS `userdepartementviews` (
`id` int(11)
,`departement_id` int(11)
,`user_id` int(11)
,`start` date
,`end` date
,`active` tinyint(1)
,`departementname` varchar(255)
,`departementdescription` varchar(255)
,`departementactive` tinyint(1)
,`username` varchar(255)
,`useractive` tinyint(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userjobviews`
--
CREATE TABLE IF NOT EXISTS `userjobviews` (
`id` int(11)
,`job_id` int(11)
,`user_id` int(11)
,`start` date
,`end` date
,`active` tinyint(1)
,`username` varchar(255)
,`usernumber` varchar(255)
,`useractive` tinyint(1)
,`jobname` varchar(255)
,`jobdescription` varchar(255)
,`jobactive` tinyint(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userlevelviews`
--
CREATE TABLE IF NOT EXISTS `userlevelviews` (
`id` int(11)
,`level_id` int(11)
,`user_id` int(11)
,`start` date
,`end` date
,`active` tinyint(1)
,`name` varchar(255)
,`useractive` tinyint(1)
,`levelname` varchar(255)
,`leveldescription` varchar(255)
,`levelactive` tinyint(1)
,`positionlevelname` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userroleviews`
--
CREATE TABLE IF NOT EXISTS `userroleviews` (
`id` int(11)
,`role_id` int(11)
,`user_id` int(11)
,`start` date
,`end` date
,`active` tinyint(1)
,`rolename` varchar(255)
,`roledescription` varchar(255)
,`roleactive` tinyint(1)
,`username` varchar(255)
,`useractive` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oldnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `number`, `oldnumber`, `cardnumber`, `name`, `fullname`, `birthdate`, `birthplace`, `sex`, `active`) VALUES
(1, 3, '197104031997031004', '$2a$10$dfPbFWkiMU95L8CaTr5dmODoG0cU8VjFk1Tkv2p/JRDAK19D11jX.', '197104031997031004', NULL, NULL, 'Pemut Aryo Wibowo', 'Pemut Aryo Wibowo', NULL, NULL, 1, 1),
(2, 3, '197105081997031003', '$2a$10$Csxz9ERKlCQfadlTMMvZxeqCXYFiIhsxthn2HEbmAjd9wL40JiAxK', '197105081997031003', NULL, NULL, 'Iwan Hery Setiawan', 'Iwan Hery Setiawan, S.E.,Ak.', NULL, NULL, 1, 1),
(3, 3, '197104141998032002', '$2a$10$M7FzR631nQ256mDu6HAkIezjLPl2l7wBwlFnrU9g34rU3DbhfSpfm', '197104141998032002', NULL, NULL, 'Dyah Rahmana Kurniawati', 'Dyah Rahmana Kurniawati, S.E.,Ak.', NULL, NULL, 1, 1),
(4, 3, '197502232002121006', '$2a$10$/w6wcgQCCOZ24uy4AoZLSezdfai01Xx/AMlUItDvwk4ONqrLVxYWC', '197502232002121006', NULL, NULL, 'Aloysius Agung Purwandaru', 'Aloysius Agung Purwandaru, S.E.,M.Ec.Dev.,MPP.,Ak.', NULL, NULL, 1, 1),
(5, 3, 'aan', '$2a$10$1SG6xYzpbJ2CXXHiW0Sdeu1/w8b3UnBmDR/kHtdf3Smp7xWa3gcJG', '198603282008011001', '240005447', NULL, 'Aan Subarkah', 'Aan Subarkah', '1986-03-28', 'Gadungrejo, Klirong', 1, 1),
(6, 3, '198207152011051001', '$2a$10$auV.mNU3ytI4nM9IoEnqreT0kkuLt9vW/AuVCtQq97D9XEtY7N1ji', '198207152011051001', NULL, NULL, 'Nanang Widyanto Saputro', 'Nanang Widyanto Saputro, S.Hut.', NULL, NULL, 1, 1),
(7, 3, '197608061999111001', '$2a$10$NEU1IZOj5E2UVk70ODSzjO4gaVuuyvAN.ccawf.RqhgAyTtYEGIES', '197608061999111001', NULL, NULL, 'Supatman', 'Supatman, S.E.,M.Ak.,Ak.', NULL, NULL, 1, 1),
(8, 3, '198105052005012015', '$2a$10$iZ0dxwIB8hiGy42lVf5ti.4N7w1ihyWn1rhAgTh740SyVkrhogMaa', '198105052005012015', NULL, NULL, 'Rosita Rifiani', 'Rosita Rifiani, S.E.,Ak.', NULL, NULL, 1, 1),
(9, 3, '197509102003121002', '$2a$10$rmmbSrCkFhvJpPCCL75vOOfBJg8bZMyjKtXRm4o63P69psi3YlDNO', '197509102003121002', NULL, NULL, 'Mohamad Fadli', 'Mohamad Fadli, S.E.,MA.,MAP.,Ak.', NULL, NULL, 1, 1),
(10, 3, '197912162005012012', '$2a$10$LfC4dOLLEdG92Y.4DX9uf.SxSlqNFXUF0BRN5uKAHqhTnEilCs2Su', '197912162005012012', NULL, NULL, 'Dwi Agustina Hariyati', 'Dwi Agustina Hariyati, S.E.,Ak.', NULL, NULL, 1, 1),
(11, 3, '198106242005012005', '$2a$10$F2NCxMt3g2Erd2Vs3fhEy.Q/dF2OOT.zzRRbjxg5zxQu.9a5JR3P6', '198106242005012005', NULL, NULL, 'Anidya Sylviani', 'Anidya Sylviani, S.E., M.M., Ak.', NULL, NULL, 1, 1),
(12, 3, '198001042006042006', '$2a$10$c6s6prZ5aEswbmG/dLbB.e0DHYZzXovAglvWe.4yjrDUZUXYCG1KO', '198001042006042006', NULL, NULL, 'Ary Fajar Nursanti', 'Ary Fajar Nursanti, S.E.,Ak.', NULL, NULL, 1, 1),
(13, 3, '197805142006042003', '$2a$10$H/cJPMFpdKmbwdMLOuYaz.9uTov7MlPbJA8I6lxiVXr9HTQ9LWHo6', '197805142006042003', NULL, NULL, 'Indri Gatari Mauludin', 'Indri Gatari Mauludin, S.E.,M.H.,Ak.', NULL, NULL, 1, 1),
(14, 3, '198303042006042009', '$2a$10$hWJ5kt2EdJHA.4pVNpUnr.DYRRBUlexTp6xGc48xlRr.U67n5obJG', '198303042006042009', NULL, NULL, 'Dica Surya Cardina', 'Dica Surya Cardina, S.E.,Ak.', NULL, NULL, 1, 1),
(15, 3, '198101102006042002', '$2a$10$XDS2bVsjl90KNveND3SL4uu.jdXA/eK6q5ISlft/nMS6SquQ2Ce7u', '198101102006042002', NULL, NULL, 'Etiauly Ardiasari', 'Etiauly Ardiasari, S.E.', NULL, NULL, 1, 1),
(16, 3, '198406132006042003', '$2a$10$ceo6jdhuyz7eO/AT1vJmCO0SALk49aKqQ2tzbLoeuJV6gr/BodWza', '198406132006042003', NULL, NULL, 'Amy Ramadhani', 'Amy Ramadhani, S.E.,Ak.', NULL, NULL, 1, 1),
(17, 3, '198003292006042002', '$2a$10$T2wJ9BNdP8StMhOrAje5eOGW/fJPWccouiObGVFgeL8wUcAE09SSu', '198003292006042002', NULL, NULL, 'Retno Hidayati', 'Retno Hidayati, S.E.,Ak.', NULL, NULL, 1, 1),
(18, 3, '197911172007082001', '$2a$10$aO6O/Bg7xIpxm35ob4oVHObitVG6X76enmdx6NEI1hdals/Svswm6', '197911172007082001', NULL, NULL, 'Lidya Seventeen Nova', 'Lidya Seventeen Nova, S.E.,Ak.', NULL, NULL, 1, 1),
(19, 3, '198212272007082001', '$2a$10$7TKCbn1G6pTH.OZ2DTavOeyLFxce.cLBtVDJTwTEHHjz2KSw/vHnu', '198212272007082001', NULL, NULL, 'Rismawaty', 'Rismawaty, S.E., Ak.', NULL, NULL, 1, 1),
(20, 3, '198311072007082001', '$2a$10$MZg2UX25W/AcrbwC0YxI/Oj1RrH5pOv2.aIJzLj5ESrl7Xja6chFq', '198311072007082001', NULL, NULL, 'Dewi Novita Sari', 'Dewi Novita Sari, S.T.', NULL, NULL, 1, 1),
(21, 3, '198210182007081001', '$2a$10$ZG.cSCmrrQA4uCQ1Fip5puRgEQyhuwn5BQhTgwd9pq/Bj4aFWXAni', '198210182007081001', NULL, NULL, 'Eka Riana Kusumasto', 'Eka Riana Kusumasto, S.E.,Ak.', NULL, NULL, 1, 1),
(22, 3, '198001182008081001', '$2a$10$zCzNwAnZD0imuqUurp0KhedEmJLH6VJzNAqM7fG0Y/Y52EIjZDmj6', '198001182008081001', NULL, NULL, 'Dwiputro Raharjo', 'Dwiputro Raharjo, S.T.', NULL, NULL, 1, 1),
(23, 3, '198612242010052001', '$2a$10$U08yQ1jiOMsPhxorwxQwUO685IGZ2K4bccX.u4t1oWvZYqDjk0fhm', '198612242010052001', NULL, NULL, 'Wendy Kenafiana Assanti', 'Wendy Kenafiana Assanti, S.H.', NULL, NULL, 1, 1),
(24, 3, '198711272011052001', '$2a$10$S39pQCYAMmAkQrfa86OWhOfA5YYxetHFbaU6oRXMAyCPJAp8ECKuS', '198711272011052001', NULL, NULL, 'Nancy Dwi Sari Simanungkalit', 'Nancy Dwi Sari Simanungkalit, S.E.', NULL, NULL, 1, 1),
(25, 3, '198207152011051001', '$2a$10$gMBQeoMPI4ipcrsopbfUIuV.UYywEWpLE7uI4tpJDd0dwxO3vmgMi', '198207152011051001', NULL, NULL, 'Nanang Widyanto Saputro', 'Nanang Widyanto Saputro, S.Hut.', NULL, NULL, 1, 0),
(26, 3, '196608131997032001', '$2a$10$wGPbgs/RomzH/nXWYAu/IOqthcPXg9upNtxquFH6vD7J7gYzed4Zu', '196608131997032001', NULL, NULL, 'Haryatun', 'Haryatun, S.E.', '1966-08-13', NULL, 1, 1),
(27, 3, '197112101997032003', '$2a$10$WaV52I/2Si6SAsGUAXh1meT5oxv9ovoaoraWOur3pFEBaIfGZZ0Jy', '197112101997032003', NULL, NULL, 'Vina Herdiani', 'Vina Herdiani, S.E.', '1971-12-10', NULL, 1, 1),
(28, 3, '198306182007081001', '$2a$10$BDoZWyaX2ERM5c1Q5hErhuSO5fVyL.BdI3dSwlekQtCJCQvTuWaRW', '198306182007081001', NULL, NULL, 'Hendy Ramadhani Nugraha', 'Hendy Ramadhani Nugraha, S.H.', '1983-06-18', NULL, 1, 1),
(29, 3, '197510012007081001', '$2a$10$D2jc0X4FBIQ5olF3/lgx7uQo9BpBFwA7fsfMzX73py83mmtTwPubG', '197510012007081001', NULL, NULL, 'Agus Prastyo', 'Agus Prastyo, SE., Ak.', '1975-10-01', NULL, 1, 1),
(30, 3, '197903172007082001', '$2a$10$5Jtj3SYWawB1KAe1P83IYe72meiYn/GWJI66Ii5q8HhCzesz/m9HO', '197903172007082001', NULL, NULL, 'Leli Eka Widayanti', 'Leli Eka Widayanti, S.E.,Ak.', '1979-03-17', NULL, 1, 1),
(31, 3, '198310042008081001', '$2a$10$XAap60OweMMKi.kXHD5P9OixIfa3/f2YDEN3I9bZMIi697bZXwdhq', '198310042008081001', NULL, NULL, 'Gaguk Wicaksono', 'Gaguk Wicaksono, S.E.', '1983-10-04', NULL, 1, 1),
(32, 3, '198410272009062001', '$2a$10$u3bGzz3AHCKvooSZeC9NLOUzgdiG9HR37DjLF3VEtqDOPjUjFzicW', '198410272009062001', NULL, NULL, 'Angela Prima Octaviani Landowero', 'Angela Prima Octaviani Landowero, S.E.', '1984-10-27', NULL, 1, 1),
(33, 3, '198112232008081001', '$2a$10$fYhOPem2/J/FHAtzte3UZ.M6ERJo6OR4Pis62B/3zutFz4k3mn30u', '198112232008081001', NULL, NULL, 'Nasrul Huda', 'Nasrul Huda, S.E.', '1981-12-23', NULL, 1, 1),
(34, 3, '198611032009061001', '$2a$10$4K82nihWERsohz9Aw.Ooi.VN.1azrwSmwCuFK1R1s2FIGGGDTrq5C', '198611032009061001', NULL, NULL, 'Novan Ariful Hamdan Choirul Ana', 'Novan Ariful Hamdan Choirul Ana', '1986-11-03', NULL, 1, 1),
(35, 3, '197502161997031002', '$2a$10$n.TbQOEfxXpy7MGX99/vuuonhOtLUwsd86QZl72/zvvnB6Gvj5/f6', '197502161997031002', NULL, NULL, 'Yuan Candra Djaisin', 'Yuan Candra Djaisin, S.E.,M.M.,Ak.,CPA.', '1975-02-16', NULL, 1, 1),
(36, 3, '197109171997032003', '$2a$10$zsKwP0X9JV7ZSUTS/KdH0OeUNa6mNSNKUR6WxRrBy5ctgu9ZxQmjC', '197109171997032003', NULL, NULL, 'Puthu Ayu Purbaningsih', 'Puthu Ayu Purbaningsih, S.E., M.M., Ak.', '1971-09-17', NULL, 1, 1),
(37, 3, '197506071995022002', '$2a$10$Hc6BzJIG9Z/J1BZxyAhWq.5sauHs8ZPrmrVkWLZGxuH4YR1ATljCC', '197506071995022002', NULL, NULL, 'Nyra Yuliantina', 'Nyra Yuliantina, S.E.,M.Appl.Fin.,Ak., CFE.', '1975-06-07', NULL, 1, 1),
(38, 3, '197608091998112001', '$2a$10$Ck5IbgLJ6LZLi4gBdT/N0.yhb1wugAFDTQRgBzRCPBf3xsU3MmDCa', '197608091998112001', NULL, NULL, 'Sri Lestari', 'Sri Lestari, S.E., M.A.B., Ak.', '1976-08-09', NULL, 1, 1),
(39, 3, '197705242002122002', '$2a$10$t6tmNwjkpQmrwhQxQiBob.PIjl0Fl2C9y506FlGlr0FU9rNqJfRni', '197705242002122002', NULL, NULL, 'Rifiani Ristanti', 'Rifiani Ristanti, S.E., Ak.', '1977-05-24', NULL, 1, 1),
(40, 3, '197209131997032002', '$2a$10$qTUF4KFU0FBcoLfFUDXHCu/wiufMKYVqB/MGj7YiX1DkIwq6/IYi2', '197209131997032002', NULL, NULL, 'Indah Winarni', 'Indah Winarni, SE., Ak.', '1972-09-13', NULL, 1, 1),
(41, 3, '196312301984031002', '$2a$10$hQR6KnEvfuAqAyi9oocNkOyeXJiE3IUuAoJ/shOdu8j3Wmfi1dsmu', '196312301984031002', NULL, NULL, 'I Made Darmawan', 'I Made Darmawan, S.E.', '1963-12-30', NULL, 1, 1),
(42, 3, '196203171985031003', '$2a$10$8Ci85SLbJyq2yCJDQyp0sOh03RoIyCj1bA/ufV1QmL6K/IckcO4ou', '196203171985031003', NULL, NULL, 'Setyo Kahono', 'Setyo Kahono', '1962-03-17', NULL, 1, 1),
(43, 3, '197804202006041003', '$2a$10$HhcBu3i4xohvBQ8LCy4wnOuzF91j6hu7Vxvt4Je740ZPl7XHlLape', '197804202006041003', NULL, NULL, 'Gandung Siswantoro', 'Gandung Siswantoro, S.E.,Ak., CFE', '1978-04-20', NULL, 1, 1),
(44, 3, '197609212003121006', '$2a$10$TWHUCwMaVXMWA0BVCKtjM.pQGbAMBGxRuNr5PKMRDyH44aO8xEsYe', '197609212003121006', NULL, NULL, 'Fitrawan', 'Fitrawan, S.E.,MPP.,MAP.,Ak.', '1976-09-21', NULL, 1, 1),
(45, 3, '197410142002121005', '$2a$10$bhMvJuo8kG2z1PwbK1KQ4O0JwL8LrWEO66.LqasHAvnlX1EHy2Vei', '197410142002121005', NULL, NULL, 'Aldi Scesar', 'Aldi Scesar, S.E.,M.Ec.Dev.,Ak.', '1974-10-14', NULL, 1, 1),
(46, 3, '198211212006042002', '$2a$10$k69/IXqzD3rAYzbZvv62pegN3RY2jlhDmTRPvdDf9bhpi9my4Bcyi', '198211212006042002', NULL, NULL, 'Rizqi Novanny', 'Rizqi Novanny, S.H., CFE.', '1982-11-21', NULL, 1, 1),
(47, 3, '198011192006041001', '$2a$10$n9UdY5vTxa3jq7iblkzp6OExNMgO2tajKX6c7MLRcSlnjQHAlumoy', '198011192006041001', NULL, NULL, 'Rakhmat Prasetyo', 'Rakhmat Prasetyo, S.E.', '1980-11-19', NULL, 1, 1),
(48, 3, '198101012007081001', '$2a$10$utRc2fRy5Y.mruW0gfEfeOR14PQ3wXSPY.1jEoNHq.qqvCDG0fJCC', '198101012007081001', NULL, NULL, 'Ari Setiyadi', 'Ari Setiyadi, S.E., Ak.', '1981-01-01', NULL, 1, 1),
(49, 3, '197808252007081001', '$2a$10$FAbSGV3LyVOIQsXFMbKrMuc54BdzAzej0qjdAVbFxCFyeNOTBCKQm', '197808252007081001', NULL, NULL, 'Hary Setiawan', 'Hary Setiawan, S.E., Ak.', '1978-08-25', NULL, 1, 1),
(50, 3, '198209062006042003', '$2a$10$hAmfoa7MEI9tpT/jPFVBGOBhR7u31G0gVRE7bVU5drcDC1xtzdCgy', '198209062006042003', NULL, NULL, 'Widhi Anggraeni', 'Widhi Anggraeni, S.E.', '1982-09-06', NULL, 1, 1),
(51, 3, '197605262006042007', '$2a$10$PTRgn5NhsJ4hZ0vDGWXBAOosGtb5HEzvIup2B41HT.Ex4DqGoF9Ku', '197605262006042007', NULL, NULL, 'Nina Krisnawati', 'Nina Krisnawati, S.E.,Ak.', '1976-05-26', NULL, 1, 1),
(52, 3, '197803222007082001', '$2a$10$KU7YwjJ6O8gpwR6AMWiQbe5k6clmq47Exw/X.EihcH3iElYw8Rd8u', '197803222007082001', NULL, NULL, 'Tamam Fissafari', 'Tamam Fissafari, SE., Ak.', '1978-03-22', NULL, 1, 1),
(53, 3, '197808222007082001', '$2a$10$/Vo5MYDO0Z4eb/ihjznNzOxozkBLdGmqROzNBBUQgmn/4.BhSO2ZS', '197808222007082001', NULL, NULL, 'Nurul Nugraheny', 'Nurul Nugraheny, S.E., Ak.', '1978-08-22', NULL, 1, 1),
(54, 3, '197605302007081001', '$2a$10$mD6gVzq74ChnkxGLuOxMEO/Nc4ed5jkNLyazybVYxe24S0ElsDHIa', '197605302007081001', NULL, NULL, 'Achmad Dwi Cahyadi', 'Achmad Dwi Cahyadi, S.E.', '1976-05-30', NULL, 1, 1),
(55, 3, '197808082006042002', '$2a$10$FnPbL2QKSgXa2UuHsqZ7COVRR9jVupYnmKuTAzQl0yE7V7ZLjZS0O', '197808082006042002', NULL, NULL, 'Agustina Santi Astuti', 'Agustina Santi Astuti, S.E., Ak.', '1978-08-08', NULL, 1, 1),
(56, 3, '198106082006042005', '$2a$10$Ao0zU2CYAvTxYc39lf3GoO0eVJFQpec8PWVTQCDNYDrcPg5aVl2qG', '198106082006042005', NULL, NULL, 'Rina Yuniarti', 'Rina Yuniarti, S.H.', '1981-06-08', NULL, 1, 1),
(57, 3, '198006192007082001', '$2a$10$RwoiC5L/G.v9Zu56uCQE6OgfsBkiZdbrUiI3/1g57FMRuiNgABeka', '198006192007082001', NULL, NULL, 'Luriani Tria Heriyuniarti', 'Luriani Tria Heriyuniarti, SE., Ak.', '1980-06-19', NULL, 1, 1),
(58, 3, '198207042006041002', '$2a$10$O1.XYXrAANDNLxnRJHh1GOvTKIlz7/ynpWcbu3btbsTaoERQH8x3e', '198207042006041002', NULL, NULL, 'Doddy Arif Wibowo', 'Doddy Arif Wibowo, S.E.', '1982-07-04', NULL, 1, 1),
(59, 3, '197905062007081001', '$2a$10$fNK3kaOHInGy6iGLkL7i0OLeBiROH3ISUcshh78h5nfdfq1U54rrm', '197905062007081001', NULL, NULL, 'Gautomo Adiguno', 'Gautomo Adiguno, S.T.', '1979-05-06', NULL, 1, 1),
(60, 3, '198304142007081001', '$2a$10$4Ang/TUqWKT.Iy/KnJmfKez6vInLlnYqw/J7HeRkZBYQEdIYi49iG', '198304142007081001', NULL, NULL, 'Nur Fadli', 'Nur Fadli, S.H.', '1983-04-14', NULL, 1, 1),
(61, 3, '197908042007082001', '$2a$10$wxwwxDA6lh8X1MMDp5MjV.eNEqMEyMCw/YADFyXNn8xscjesa9Zvi', '197908042007082001', NULL, NULL, 'Hanif Rosiyah', 'Hanif Rosiyah, S.E.,Ak.', '1979-08-04', NULL, 1, 1),
(62, 3, '198307192007081001', '$2a$10$gK5tg3L6BfygpTMP4Num5OEvTxIr27XPiBmG0bVvgiLs0uVWNqaiy', '198307192007081001', NULL, NULL, 'Bhayu Agung Pramono', 'Bhayu Agung Pramono, S.H.', '1983-07-19', NULL, 1, 1),
(63, 3, '198412112008081001', '$2a$10$TicLiHE3bwwY97E8BrN8h.IhIxr7qwFbCwkm9u6c5r2JTlG/4VBYa', '198412112008081001', NULL, NULL, 'Lutvi Effendi', 'Lutvi Effendi, S.E.', '1984-12-11', NULL, 1, 1),
(64, 3, '198207082006041003', '$2a$10$8xKdXKwHUunuufTk97O/N.ehipuQDob1BTmJn/Grvtn559eZaSnbG', '198207082006041003', NULL, NULL, 'Fransisko', 'Fransisko, S.E., M.M.', '1982-07-08', NULL, 1, 1),
(65, 3, '198607232008011001', '$2a$10$W/Ac8gEmSQOoneKcWWQwluLUoDhTxc3dZitQ2JSAUDEuzm6XzqAo2', '198607232008011001', NULL, NULL, 'Abdurrohman', 'Abdurrohman, S.Akt', '1986-07-23', NULL, 1, 1),
(66, 3, '198503192009062001', '$2a$10$PVxPRRyIuhvgGEnukz./Fu3E8QQAkIEo02GmncWAQyN.6s40XaBn6', '198503192009062001', NULL, NULL, 'Wullyartha Hernitra', 'Wullyartha Hernitra, S.E.', '1985-03-19', NULL, 1, 1),
(67, 3, '198109012008082001', '$2a$10$AM4I/woB75lOP8T.U8PnKevGQBYIg6OVe/drINwVAV/JVo8NhNyQ2', '198109012008082001', NULL, NULL, 'Ana Muyasaroh', 'Ana Muyasaroh, S.E.', '1981-09-01', NULL, 1, 1),
(68, 3, '198605252010052001', '$2a$10$ztAjd1SaJJSGsDpdKjk8cOhmdS1uBWixfU9PITb/tIahmaBvO/kLu', '198605252010052001', NULL, NULL, 'Farah Fachrisa', 'Farah Fachrisa, SE., Ak.', '1986-05-25', NULL, 1, 1),
(69, 3, '198506042007011002', '$2a$10$d7Pz.sJLAk8mN1Q/WQKsqu7c9FpAFkDMo7SdJNBTDbq1OSTbtXT2C', '198506042007011002', NULL, NULL, 'Zuniar Viki Fardiyanta', 'Zuniar Viki Fardiyanta, S.ST.', '1985-06-04', NULL, 1, 1),
(70, 3, '198510162008011003', '$2a$10$I..0pjQMwJU81PrryWRoXu8PBkOuvASZFiO8WfRlnDMofMfzHUfYa', '198510162008011003', NULL, NULL, 'Sandro Wahyu Prasetya', 'Sandro Wahyu Prasetya, S.E.', '1985-10-16', NULL, 1, 1),
(71, 3, '198204162011051001', '$2a$10$RB7BgpRhIcrny8vzjtZpFORkMThaRSju3Peimm6W7lT/riQihLjmW', '198204162011051001', NULL, NULL, 'Syafrizal Akmal', 'Syafrizal Akmal, S.T.', '1982-04-16', NULL, 1, 1),
(72, 3, '198804012011051001', '$2a$10$T8TZy62Bl9ApZ.mIzAE8WuhFc9uHFNJRulPUZ5EPLLOUYu1O/MZzG', '198804012011051001', NULL, NULL, 'Puji Eka Purnama', 'Puji Eka Purnama, S.Kel.', '1988-04-01', NULL, 1, 1),
(73, 3, '198706072012111001', '$2a$10$dqRMbHKcSvOnq/5olsck5.HY0vK1t7MSEzvdEWD0LpKA1NF.Vi6CO', '198706072012111001', NULL, NULL, 'Andrew Wijaya', 'Andrew Wijaya, S.Kom', '1987-06-07', NULL, 1, 1),
(74, 3, '196909291996031001', '$2a$10$RU7cZKmukK4HeTcrcDdKNO1sjzrfEyUxp6eg2u5LJx7X5Qcr.6/Fm', '196909291996031001', NULL, NULL, 'M. Ali Asyhar', 'M. Ali Asyhar, SE., Ak.', '1969-09-29', NULL, 1, 1),
(75, 3, '197706031998111001', '$2a$10$GcQC9PHLtoaDqmEw6AtnN.jwXnkmHFhIqaEA5bCP6eKT1I/editre', '197706031998111001', NULL, NULL, 'Saepuloh', 'Saepuloh, S.E.,Ak.', '1977-06-03', NULL, 1, 1),
(76, 3, '195510311978021001', '$2a$10$TBLZqD31P/x177Ym4ODHpOlG.3AvEEj7X38aXYjZpk6O/BqObs4o2', '195510311978021001', NULL, NULL, 'Muzakkir', 'Drs. Muzakkir', '1955-10-31', NULL, 1, 1),
(77, 3, '197510132002121003', '$2a$10$orb7PtQZtRvcucHR0uEWDe2AZ9r6OSIo90cY2./EPAZZmCRzgA9U6', '197510132002121003', NULL, NULL, 'N. Diva Mahaendra', 'N. Diva Mahaendra, S.E., M.M., Ak.', '1975-10-13', NULL, 1, 1),
(78, 3, '197109171996031005', '$2a$10$EcPHHsadBdqFnafWWjVbtu5EEQhwesJMZkNqDZQni39iCnpzmSqvm', '197109171996031005', NULL, NULL, 'Muhammad Hidayat', 'Muhammad Hidayat, S.E.', '1971-09-17', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_periods`
--

CREATE TABLE IF NOT EXISTS `users_periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `positionlevel_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_positionlevels`
--

CREATE TABLE IF NOT EXISTS `users_positionlevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `positionlevel_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `users_positionlevels`
--

INSERT INTO `users_positionlevels` (`id`, `user_id`, `positionlevel_id`, `start`, `end`, `active`) VALUES
(4, 27, 3, '2015-01-22', NULL, 1),
(3, 26, 3, '2015-01-22', NULL, 1),
(5, 28, 3, '2015-01-22', NULL, 1),
(6, 29, 3, '2015-01-22', NULL, 1),
(7, 30, 2, '2015-01-22', NULL, 1),
(8, 31, 2, '2015-01-22', NULL, 1),
(9, 32, 2, '2015-01-22', NULL, 1),
(10, 33, 2, '2015-01-22', NULL, 1),
(11, 34, 2, '2015-01-22', NULL, 1),
(12, 35, 6, '2015-01-22', NULL, 1),
(13, 36, 6, '2015-01-22', NULL, 1),
(14, 37, 6, '2015-01-22', NULL, 1),
(15, 38, 3, '2015-01-22', NULL, 1),
(16, 39, 3, '2015-01-22', NULL, 1),
(17, 40, 3, '2015-01-22', NULL, 1),
(18, 41, 3, '2015-01-22', NULL, 1),
(19, 42, 3, '2015-01-22', NULL, 1),
(20, 43, 3, '2015-01-22', NULL, 1),
(21, 44, 3, '2015-01-22', NULL, 1),
(22, 45, 3, '2015-01-22', NULL, 1),
(23, 46, 3, '2015-01-22', NULL, 1),
(24, 47, 3, '2015-01-22', NULL, 1),
(25, 48, 3, '2015-01-22', NULL, 1),
(26, 49, 3, '2015-01-22', NULL, 1),
(27, 50, 3, '2015-01-22', NULL, 1),
(28, 51, 3, '2015-01-22', NULL, 1),
(29, 52, 3, '2015-01-22', NULL, 1),
(30, 53, 3, '2015-01-22', NULL, 1),
(31, 54, 3, '2015-01-22', NULL, 1),
(32, 55, 2, '2015-01-22', NULL, 1),
(33, 56, 2, '2015-01-22', NULL, 1),
(34, 57, 2, '2015-01-22', NULL, 1),
(35, 58, 2, '2015-01-22', NULL, 1),
(36, 59, 2, '2015-01-22', NULL, 1),
(37, 60, 2, '2015-01-22', NULL, 1),
(38, 61, 2, '2015-01-22', NULL, 1),
(39, 62, 2, '2015-01-22', NULL, 1),
(40, 63, 2, '2015-01-22', NULL, 1),
(41, 64, 2, '2015-01-22', NULL, 1),
(42, 65, 2, '2015-01-22', NULL, 1),
(43, 66, 2, '2015-01-22', NULL, 1),
(44, 67, 2, '2015-01-22', NULL, 1),
(45, 68, 2, '2015-01-22', NULL, 1),
(46, 69, 2, '2015-01-22', NULL, 1),
(47, 70, 2, '2015-01-22', NULL, 1),
(48, 71, 2, '2015-01-22', NULL, 1),
(49, 72, 2, '2015-01-22', NULL, 1),
(50, 73, 2, '2015-01-22', NULL, 1),
(51, 74, 6, '2015-01-23', NULL, 1),
(52, 75, 6, '2015-01-23', NULL, 1),
(53, 76, 7, '2015-01-28', NULL, 1),
(54, 77, 3, '2015-02-11', NULL, 1),
(55, 78, 3, '2015-02-11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_positions`
--

CREATE TABLE IF NOT EXISTS `users_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_positions`
--

INSERT INTO `users_positions` (`id`, `user_id`, `position_id`, `start`, `end`, `active`) VALUES
(1, 1, 1, '2014-07-20', NULL, 1);

-- --------------------------------------------------------

--
-- Structure for view `activityuserviews`
--
DROP TABLE IF EXISTS `activityuserviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `activityuserviews` AS select `au`.`id` AS `id`,`au`.`activity_id` AS `activity_id`,`au`.`user_id` AS `user_id`,`au`.`duty_id` AS `duty_id`,`au`.`tagged` AS `tagged`,`au`.`start` AS `userstart`,`au`.`end` AS `userend`,`au`.`active` AS `active`,`a`.`categorytree_id` AS `categorytree_id`,`a`.`name` AS `activityname`,`a`.`draft` AS `activitydraft`,`a`.`public` AS `activitypublic`,`a`.`description` AS `activitydescription`,`a`.`start` AS `activitystart`,`a`.`end` AS `activityend`,`a`.`active` AS `activityactive`,`e`.`name` AS `evidencename`,`e`.`extension` AS `evidenceextension`,`e`.`type_id` AS `type_id`,`e`.`active` AS `evidenceactive`,`t`.`name` AS `typename`,`t`.`description` AS `typedescription`,`t`.`active` AS `typeactive`,`u`.`name` AS `username`,`u`.`active` AS `useractive`,`d`.`name` AS `dutyname` from (((((`activities_users` `au` left join `users` `u` on((`au`.`user_id` = `u`.`id`))) left join `activities` `a` on((`au`.`activity_id` = `a`.`id`))) left join `evidences` `e` on((`a`.`id` = `e`.`activity_id`))) left join `types` `t` on((`e`.`type_id` = `t`.`id`))) left join `duties` `d` on((`au`.`duty_id` = `d`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `calendarviews`
--
DROP TABLE IF EXISTS `calendarviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `calendarviews` AS select `a`.`id` AS `id`,`a`.`activity_id` AS `activity_id`,`a`.`user_id` AS `user_id`,`a`.`tagged` AS `tagged`,`a`.`start` AS `userstart`,`a`.`end` AS `userend`,`a`.`active` AS `active`,`b`.`name` AS `activityname`,`b`.`description` AS `activitydescription`,`b`.`start` AS `start`,`b`.`end` AS `end`,`b`.`uploader_id` AS `uploader_id`,`b`.`draft` AS `activitydraft`,`b`.`active` AS `activityactive`,`u`.`name` AS `username`,`u`.`fullname` AS `userfullname`,`u`.`active` AS `useractive` from ((`activities_users` `a` left join `activities` `b` on((`a`.`activity_id` = `b`.`id`))) left join `users` `u` on((`a`.`user_id` = `u`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `categorytreecategoryviews`
--
DROP TABLE IF EXISTS `categorytreecategoryviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `categorytreecategoryviews` AS select `t`.`id` AS `id`,`t`.`parent_id` AS `categorytreeparent_id`,`t`.`lft` AS `categorytreelft`,`t`.`rght` AS `categorytreerght`,`t`.`category_id` AS `categorytree_id`,`t`.`position_id` AS `position_id`,`t`.`active` AS `active`,`c`.`name` AS `categoryname`,`p`.`name` AS `positionname` from ((`categorytrees` `t` left join `categories` `c` on((`t`.`category_id` = `c`.`id`))) left join `positions` `p` on((`t`.`position_id` = `p`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `categorytreeprefixviews`
--
DROP TABLE IF EXISTS `categorytreeprefixviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `categorytreeprefixviews` AS select `t`.`id` AS `id`,`t`.`parent_id` AS `categorytreeparent_id`,`t`.`lft` AS `categorytreelft`,`t`.`rght` AS `categorytreerght`,`t`.`category_id` AS `category_id`,`t`.`active` AS `categorytreeactive`,`t`.`position_id` AS `categorytreeposition_id`,`k`.`position_id` AS `prefixposition_id`,`c`.`name` AS `categoryname`,`p`.`name` AS `prefixname` from (((`categorytrees` `t` left join `categorytrees_prefixes` `k` on((`t`.`id` = `k`.`categorytree_id`))) left join `categories` `c` on((`t`.`category_id` = `c`.`id`))) left join `prefixes` `p` on((`k`.`prefix_id` = `p`.`id`))) union select `t`.`id` AS `id`,`t`.`parent_id` AS `categorytreeparent_id`,`t`.`lft` AS `categorytreelft`,`t`.`rght` AS `categorytreerght`,`t`.`category_id` AS `category_id`,`t`.`position_id` AS `categorytreeposition_id`,`t`.`active` AS `categorytreeactive`,`k`.`position_id` AS `prefixposition_id`,`c`.`name` AS `categoryname`,`p`.`name` AS `prefixname` from (((`categorytrees_prefixes` `k` left join `categorytrees` `t` on((`t`.`id` = `k`.`categorytree_id`))) left join `categories` `c` on((`t`.`category_id` = `c`.`id`))) left join `prefixes` `p` on((`k`.`prefix_id` = `p`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `entityviews`
--
DROP TABLE IF EXISTS `entityviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `entityviews` AS select `e`.`id` AS `id`,`e`.`entitycategory_id` AS `entitycategory_id`,`e`.`name` AS `name`,`e`.`capital` AS `capital`,`e`.`active` AS `active`,`ec`.`name` AS `entitycategoryname`,`ec`.`active` AS `entitycategoryactive`,concat(`ec`.`name`,' ',`e`.`name`) AS `fullname`,concat(`ec`.`name`,' ',`e`.`name`,' di ',`e`.`capital`) AS `lettername` from (`entities` `e` left join `entitycategories` `ec` on((`e`.`entitycategory_id` = `ec`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `letteruserviews`
--
DROP TABLE IF EXISTS `letteruserviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `letteruserviews` AS select `l`.`id` AS `id`,`l`.`activity_id` AS `activity_id`,`l`.`type_id` AS `type_id`,`l`.`lettercategory_id` AS `lettercategory_id`,`l`.`uploader_id` AS `uploader_id`,`l`.`lettername` AS `lettername`,`l`.`active` AS `active`,`l`.`activityname` AS `activityname`,`l`.`activitydraft` AS `activitydraft`,`l`.`activitypublic` AS `activitypublic`,`l`.`activitydescription` AS `activitydescription`,`l`.`date` AS `date`,`l`.`activitystart` AS `activitystart`,`l`.`activityend` AS `activityend`,`l`.`activityactive` AS `activityactive`,`l`.`evidenceid` AS `evidenceid`,`l`.`evidenceactive` AS `evidenceactive`,`au`.`user_id` AS `user_id`,`au`.`duty_id` AS `duty_id`,`au`.`tagged` AS `activityusertagged`,`au`.`active` AS `activityuseractive`,`u`.`name` AS `username`,`u`.`active` AS `useractive`,`d`.`name` AS `dutyname` from (((`activities_users` `au` left join `letterviews` `l` on((`l`.`activity_id` = `au`.`activity_id`))) left join `users` `u` on((`au`.`user_id` = `u`.`id`))) left join `duties` `d` on((`au`.`duty_id` = `d`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `letterviews`
--
DROP TABLE IF EXISTS `letterviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `letterviews` AS select `l`.`id` AS `id`,`l`.`activity_id` AS `activity_id`,`l`.`type_id` AS `type_id`,`l`.`lettercategory_id` AS `lettercategory_id`,`l`.`entity_id` AS `entity_id`,`l`.`uploader_id` AS `uploader_id`,`l`.`name` AS `lettername`,`l`.`date` AS `date`,`l`.`active` AS `active`,`a`.`categorytree_id` AS `categorytree_id`,`a`.`name` AS `activityname`,`a`.`draft` AS `activitydraft`,`a`.`public` AS `activitypublic`,`a`.`description` AS `activitydescription`,`a`.`start` AS `activitystart`,`a`.`end` AS `activityend`,`a`.`active` AS `activityactive`,`e`.`name` AS `entityname`,`t`.`name` AS `typename`,`t`.`description` AS `typedescription`,`lc`.`name` AS `lettercategoryname`,`u`.`name` AS `uploadername`,`ev`.`id` AS `evidenceid`,`ev`.`name` AS `evidencename`,`ev`.`active` AS `evidenceactive` from ((((((`letters` `l` left join `activities` `a` on((`l`.`activity_id` = `a`.`id`))) left join `entities` `e` on((`l`.`entity_id` = `e`.`id`))) left join `types` `t` on((`l`.`type_id` = `t`.`id`))) left join `lettercategories` `lc` on((`l`.`lettercategory_id` = `lc`.`id`))) left join `uploaders` `u` on((`l`.`uploader_id` = `u`.`id`))) left join `evidences` `ev` on((`a`.`id` = `ev`.`activity_id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `simplecategorytreeprefixviews`
--
DROP TABLE IF EXISTS `simplecategorytreeprefixviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `simplecategorytreeprefixviews` AS select `s`.`id` AS `id`,`s`.`categorytree_id` AS `categorytree_id`,`s`.`prefix_id` AS `prefix_id`,`s`.`position_id` AS `position_id`,`s`.`active` AS `active`,`p`.`name` AS `prefix`,`l`.`name` AS `position` from ((`categorytrees_prefixes` `s` join `prefixes` `p` on((`s`.`prefix_id` = `p`.`id`))) join `positions` `l` on((`s`.`position_id` = `l`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `simplecategorytreeviews`
--
DROP TABLE IF EXISTS `simplecategorytreeviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `simplecategorytreeviews` AS select `c`.`id` AS `id`,`c`.`parent_id` AS `parent_id`,`c`.`lft` AS `lft`,`c`.`rght` AS `rght`,`c`.`active` AS `active`,`k`.`name` AS `name`,`c`.`id` AS `categorytree_id`,`k`.`id` AS `category_id`,`c`.`position_id` AS `position_id`,`p`.`name` AS `position` from ((`categorytrees` `c` join `categories` `k` on((`c`.`category_id` = `k`.`id`))) join `positions` `p` on((`c`.`position_id` = `p`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `uploaders`
--
DROP TABLE IF EXISTS `uploaders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `uploaders` AS select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`active` AS `active` from `users` where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `usercareerviews`
--
DROP TABLE IF EXISTS `usercareerviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `usercareerviews` AS select `u`.`id` AS `id`,`u`.`id` AS `user_id`,`u`.`number` AS `number`,`u`.`name` AS `name`,`u`.`active` AS `active`,`l`.`id` AS `userlevelid`,`l`.`level_id` AS `level_id`,`l`.`start` AS `levelstart`,`l`.`end` AS `levelend`,`l`.`active` AS `levelactive`,`l`.`levelname` AS `levelname`,`l`.`leveldescription` AS `leveldescription`,`l`.`positionlevelname` AS `positionlevelname`,`r`.`id` AS `userroleid`,`r`.`role_id` AS `role_id`,`r`.`start` AS `rolestart`,`r`.`end` AS `roleend`,`r`.`active` AS `roleactive`,`r`.`rolename` AS `rolename`,`r`.`roledescription` AS `roledescription`,`d`.`id` AS `userdepartementid`,`d`.`departement_id` AS `departement_id`,`d`.`start` AS `departementstart`,`d`.`end` AS `departementend`,`d`.`active` AS `departementactive`,`d`.`departementname` AS `departementname`,`d`.`departementdescription` AS `departementdescription` from (((`users` `u` left join `userlevelviews` `l` on((`u`.`id` = `l`.`user_id`))) left join `userroleviews` `r` on((`u`.`id` = `r`.`user_id`))) left join `userdepartementviews` `d` on((`u`.`id` = `d`.`user_id`)));

-- --------------------------------------------------------

--
-- Structure for view `userdepartementviews`
--
DROP TABLE IF EXISTS `userdepartementviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `userdepartementviews` AS select `du`.`id` AS `id`,`du`.`departement_id` AS `departement_id`,`du`.`user_id` AS `user_id`,`du`.`start` AS `start`,`du`.`end` AS `end`,`du`.`active` AS `active`,`d`.`name` AS `departementname`,`d`.`description` AS `departementdescription`,`d`.`active` AS `departementactive`,`u`.`name` AS `username`,`u`.`active` AS `useractive` from ((`departements_users` `du` left join `departements` `d` on((`du`.`departement_id` = `d`.`id`))) left join `users` `u` on((`du`.`user_id` = `u`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `userjobviews`
--
DROP TABLE IF EXISTS `userjobviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `userjobviews` AS select `ju`.`id` AS `id`,`ju`.`job_id` AS `job_id`,`ju`.`user_id` AS `user_id`,`ju`.`start` AS `start`,`ju`.`end` AS `end`,`ju`.`active` AS `active`,`u`.`name` AS `username`,`u`.`number` AS `usernumber`,`u`.`active` AS `useractive`,`j`.`name` AS `jobname`,`j`.`description` AS `jobdescription`,`j`.`active` AS `jobactive` from ((`jobs_users` `ju` left join `users` `u` on((`ju`.`user_id` = `u`.`id`))) left join `jobs` `j` on((`ju`.`job_id` = `j`.`id`))) where (1 = 1);

-- --------------------------------------------------------

--
-- Structure for view `userlevelviews`
--
DROP TABLE IF EXISTS `userlevelviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `userlevelviews` AS select `lu`.`id` AS `id`,`lu`.`level_id` AS `level_id`,`lu`.`user_id` AS `user_id`,`lu`.`start` AS `start`,`lu`.`end` AS `end`,`lu`.`active` AS `active`,`u`.`name` AS `name`,`u`.`active` AS `useractive`,`l`.`name` AS `levelname`,`l`.`description` AS `leveldescription`,`l`.`active` AS `levelactive`,`p`.`name` AS `positionlevelname` from (((`levels_users` `lu` left join `users` `u` on((`lu`.`user_id` = `u`.`id`))) left join `levels` `l` on((`lu`.`level_id` = `l`.`id`))) left join `positionlevels` `p` on((`l`.`positionlevel_id` = `p`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `userroleviews`
--
DROP TABLE IF EXISTS `userroleviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `userroleviews` AS select `ru`.`id` AS `id`,`ru`.`role_id` AS `role_id`,`ru`.`user_id` AS `user_id`,`ru`.`start` AS `start`,`ru`.`end` AS `end`,`ru`.`active` AS `active`,`r`.`name` AS `rolename`,`r`.`description` AS `roledescription`,`r`.`active` AS `roleactive`,`u`.`name` AS `username`,`u`.`active` AS `useractive` from ((`roles_users` `ru` left join `roles` `r` on((`ru`.`role_id` = `r`.`id`))) left join `users` `u` on((`ru`.`user_id` = `u`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
