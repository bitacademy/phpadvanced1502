-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2015 at 11:47 AM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

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
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `data_nastere` date NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `data_inscriere` datetime NOT NULL,
  `data_logare` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `name`, `email`, `mobile`, `data_nastere`, `adresa`, `data_inscriere`, `data_logare`) VALUES
(1, 'popescu', 'cc03e747a6afbbcbf8be7668acfebee5', 'Popescu Alexandru', 'apopescu@bitvideo.ro', '40722345678', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ionescu', 'cc03e747a6afbbcbf8be7668acfebee5', 'Ionescu Daniel', 'dionescu@bitacad.ro', '0722123456', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'rconstantinescu', 'cc03e747a6afbbcbf8be7668acfebee5', 'Radu Constantinescu', 'rconstantinescu@bitacad.ro', '0722123456', '1999-03-12', 'Bd. Iuliu Maniu 43, Bucuresti 5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
