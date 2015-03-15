-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 07:07 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `data_nastere` date NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `data_inscriere` datetime NOT NULL,
  `data_logare` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customers`
--


INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `data_nastere`, `adresa`, `data_inscriere`, `data_logare`) VALUES
(1, 'Popescu Alexandru', 'apopescu@bitvideo.ro', '40722345678', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ionescu Daniel', 'dioanescu@bitacad.ro', '0722123456', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Radu Constantinescu', 'rconstantinescu@bitacad.ro', '0722123456', '1999-03-12', 'Bd. Iuliu Maniu 43, Bucuresti 5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
