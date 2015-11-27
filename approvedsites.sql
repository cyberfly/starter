-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2015 at 11:26 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qb_starter`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedsites`
--

CREATE TABLE IF NOT EXISTS `approvedsites` (
  `id` int(10) NOT NULL,
  `agcode` varchar(28) NOT NULL DEFAULT '',
  `agname` varchar(45) DEFAULT NULL,
  `add1` varchar(45) NOT NULL DEFAULT '',
  `add2` varchar(45) DEFAULT NULL,
  `add3` varchar(45) DEFAULT NULL,
  `city` varchar(45) NOT NULL DEFAULT '',
  `postcode` varchar(5) DEFAULT NULL,
  `state` varchar(45) NOT NULL DEFAULT '',
  `tel` varchar(15) NOT NULL DEFAULT '',
  `fax` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `create_by` varchar(20) NOT NULL DEFAULT '',
  `create_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lst_modif_by` varchar(20) NOT NULL DEFAULT '',
  `lst_modif_dtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvedsites`
--

INSERT INTO `approvedsites` (`id`, `agcode`, `agname`, `add1`, `add2`, `add3`, `city`, `postcode`, `state`, `tel`, `fax`, `email`, `create_by`, `create_dtm`, `lst_modif_by`, `lst_modif_dtm`, `created_at`, `updated_at`) VALUES
(1, '010101', 'KOMMS Sungai Petani', 'No 1, Jalan Haji Tapah,', 'Taman Perindustrian Sungai Petani', '', 'Sungai Petani', '10000', '02', '01-123456789', '01-123456789', 'sungaipetani@komms.com.my', '1', '2015-11-25 02:15:32', '1', '2015-11-24 09:04:43', '2015-11-24 01:04:43', '2015-11-24 01:04:43'),
(2, '010102', 'KOMMS Alor Setar', 'No. 2 Jalan Pokok Setar,\n', 'Bandar Alor Setar.', NULL, 'Alor Setar', '10002', '02', '01-123456788', '01-123456788', 'alorsetar@komms.com.my', '1', '2015-11-25 03:06:58', '1', '2015-11-24 09:22:39', '2015-11-24 01:22:39', '2015-11-24 01:22:39'),
(4, '009103', 'KOMMS Tampin', 'Lot 30', 'Jalan Tampin 2/1', 'Taman Tampin Jaya', 'Tampin', '34000', '01', '07-1234567', '07-1234567', 'komms_tampin@email.com', '1', '2015-11-25 07:45:03', '1', '2015-11-25 07:45:03', '2015-11-24 19:36:54', '2015-11-24 23:45:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedsites`
--
ALTER TABLE `approvedsites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agcode` (`agcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvedsites`
--
ALTER TABLE `approvedsites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
