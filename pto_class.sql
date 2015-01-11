-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2015 at 09:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pto`
--

-- --------------------------------------------------------

--
-- Table structure for table `pto_class`
--

CREATE TABLE IF NOT EXISTS `pto_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  `class_title` varchar(255) NOT NULL,
  `class_description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pto_class`
--

INSERT INTO `pto_class` (`class_id`, `language`, `class_title`, `class_description`, `photo`) VALUES
(1, 'English', 'Pronancy', 'jslfjsldfjsl', '0'),
(3, 'urdu', 'Grammer', 'sfjslfjlsfslf', '0'),
(4, 'Punjabi', 'Bol Chal', 'sdfsd', ''),
(5, 'Saraiki', 'Bol Chal', 'sjfsldjf', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
