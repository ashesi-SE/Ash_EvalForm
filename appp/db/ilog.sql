-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2014 at 04:32 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ilog_table`
--

CREATE TABLE IF NOT EXISTS `ilog_table` (
  `Issue_ID` int(30) NOT NULL AUTO_INCREMENT,
  `Issue` varchar(80) NOT NULL,
  `Location` varchar(60) NOT NULL,
  `Description` varchar(80) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Issue_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40;

--
-- Dumping data for table `ilog_table`
--

INSERT INTO `ilog_table` (`Issue_ID`, `Issue`, `Location`, `Description`, `Email`) VALUES
(39, 'printer', 'Library', 'out of tonner', 'mawumefa@ashesi.edu.gh'),
(38, 'Projector', '218', 'Not functioning', 'makstanleyz@ashesi.edu.gh'),
(37, 'Broken chair', '116', 'Legs of 5 tables broken', 'johndoe@ashesi.edu.gh'),
(36, 'internet', '221', 'network problem', 'martha.kumi@ashesi.edu.gh');
