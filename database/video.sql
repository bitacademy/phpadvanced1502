-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 02:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_pachet` int(4) NOT NULL,
  `data_publicare` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `url`, `id_pachet`, `data_publicare`, `status`) VALUES
(1, 'https://www.youtube.com/watch?v=IFu2yrIDsss', 1, '2015-03-01 00:00:00', 1),
(2, 'https://www.youtube.com/watch?v=Bznxx12Ptl0', 2, '2015-03-07 00:00:00', 1),
(3, 'https://www.youtube.com/watch?v=pgYEcAs03mk', 3, '2015-03-06 00:00:00', 1),
(4, 'https://www.youtube.com/watch?v=nj1fwTkBL8Q', 1, '2015-03-05 00:00:00', 1),
(5, 'https://www.youtube.com/watch?v=WJq2drq17Q8', 3, '2015-03-04 00:00:00', 1),
(6, 'https://www.youtube.com/watch?v=kDhdaLNrhVo', 2, '2015-03-03 00:00:00', 1),
(7, 'https://www.youtube.com/watch?v=yyDUC1LUXSU', 2, '2015-03-02 00:00:00', 1),
(8, 'https://www.youtube.com/watch?v=0DdCoNbbRvQ', 3, '2015-03-04 00:00:00', 1),
(9, 'https://www.youtube.com/watch?v=8PaoLy7PHwk', 3, '2015-03-04 00:00:00', 1),
(10, 'https://www.youtube.com/watch?v=_BRv9wGf5pk', 1, '2015-03-03 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
