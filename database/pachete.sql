-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 02:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitvideo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pachete`
--

CREATE TABLE IF NOT EXISTS `pachete` (
`id` int(5) NOT NULL,
  `tip_pachet` varchar(255) NOT NULL,
  `caracteristici` text NOT NULL,
  `suma_plata` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='bitvideo plati table(id, tip_pachet, caracteristici, suma_plata)';

--
-- Dumping data for table `pachete`
--

INSERT INTO `pachete` (`id`, `tip_pachet`, `caracteristici`, `suma_plata`) VALUES
(1, 'Sport', 'Meciuri celebre: Box, Baschet, Fotbal, Tenis', 10),
(2, 'Film', 'Filme', 25),
(3, 'Desene', 'Desene Animate', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pachete`
--
ALTER TABLE `pachete`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pachete`
--
ALTER TABLE `pachete`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
