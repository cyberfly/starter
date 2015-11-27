-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2015 at 11:27 PM
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
-- Table structure for table `ref`
--

CREATE TABLE IF NOT EXISTS `ref` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `desc1` varchar(250) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL,
  `group_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `code`, `desc1`, `value`, `group_type`) VALUES
(1, '01', 'JOHOR', NULL, 6),
(2, '02', 'KEDAH', '', 6),
(3, '03', 'KELANTAN', '', 6),
(4, '04', 'MELAKA', '', 6),
(5, '05', 'NEGERI SEMBILAN', '', 6),
(6, '06', 'PAHANG', '', 6),
(7, '07', 'PULAU PINANG', '', 6),
(8, '08', 'PERAK', '', 6),
(9, '09', 'PERLIS', '', 6),
(10, '10', 'SELANGOR', '', 6),
(11, '11', 'TERENGGANU', '', 6),
(12, '12', 'SABAH', '', 6),
(13, '13', 'SARAWAK', '', 6),
(14, '14', 'WILAYAH PERSEKUTUAN KUALA LUMPUR', '', 6),
(15, '15', 'WILAYAH PERSEKUTUAN LABUAN', '', 6),
(16, '16', 'WILAYAH PERSEKUTUAN PUTRAJAYA', '', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
