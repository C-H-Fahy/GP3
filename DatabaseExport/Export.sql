-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 05:29 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member` int(11) DEFAULT NULL,
  `performance` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member` (`member`),
  KEY `performance` (`performance`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `member`, `performance`, `seats`) VALUES
(1, 1234, 2, 4),
(2, 1111, 3, 5),
(3, 1111, 12, 5),
(4, 1444, 2, 7),
(5, 3333, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `location` char(255) DEFAULT NULL,
  `address` text,
  `manager` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `location`, `address`, `manager`) VALUES
(1, 'Intu', 'Watford', '10, High Str', 'Andy Smith'),
(2, 'Phoenix', 'Hitchin', '2, Swan Lane', 'Mary Jobs'),
(3, 'Rialto', 'Stevenage', '6, London Rd', 'Tuhaj Bey'),
(4, 'Intimate', 'Watford', '3, Broad Ave', 'Marek Huk');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `released` int(11) DEFAULT NULL,
  `title` char(255) NOT NULL,
  `director` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `released`, `title`, `director`) VALUES
(1, 1941, 'The Maltese Falcon', 'John Huston'),
(2, 1940, 'Rebecca', 'Alfred Hitchcock'),
(3, 1944, 'House of Dracula', 'Eric Kenton'),
(4, 1943, 'Jane Eyre Robert', 'Stevenson'),
(5, 1942, 'Casablanca', 'Michael Curtiz'),
(6, 1949, 'The Third Man', 'Carol Reed'),
(7, 1945, 'Brief Encounter', 'David Lean'),
(8, 1948, 'Key Largo', 'John Huston'),
(9, 1946, 'Notorious', 'Alfred Hitchcock'),
(10, 1948, 'Rope', 'Alfred Hitchcock'),
(11, 1949, 'African Queen', 'John Huston'),
(12, NULL, 'Spellbound', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(15) DEFAULT NULL,
  `name` char(255) NOT NULL,
  `joined` date DEFAULT NULL,
  `active` char(31) DEFAULT 'Active',
  `role_type` char(16) DEFAULT 'member',
  `password` char(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3335 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `title`, `name`, `joined`, `active`, `role_type`, `password`) VALUES
(1111, 'Ms', 'Helen Miranda', '2017-12-21', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(1234, 'Mr', 'Jose Alves', '2017-12-27', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(1333, 'Dr', 'Vito Gelato', '2018-01-06', 'Lapsed', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(1344, 'Dr', 'Guy Redmond', '2018-02-09', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(1444, 'Ms', 'Maria Partou', '2018-03-11', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(2111, 'Ms', 'Lindsay White', '2018-03-16', 'Cancelled', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(2121, 'Mr', 'David Wilkinson', '2018-03-18', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(3333, 'Ms', 'Olenka Sama', '2018-12-12', 'Active', 'member', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW'),
(1, NULL, 'admin-test', '2022-03-17', 'Active', 'manager', '$2y$10$DkCfOzjBMDMDUoIVv0gSku5Q4pch.yk7oxRIupUtwCiA/W9IkAthW');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cinema` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `film` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film` (`film`),
  KEY `cinema` (`cinema`,`screen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `cinema`, `screen`, `film`, `date`, `time`) VALUES
(1, 1, 1, 11, '2019-06-20', '19:00:00'),
(2, 1, 2, 2, '2019-06-20', '19:00:00'),
(3, 1, 3, 8, '2019-06-20', '19:00:00'),
(4, 1, 1, 11, '2019-06-21', '19:00:00'),
(5, 3, 1, 2, '2019-06-21', '19:00:00'),
(6, 1, 1, 11, '2019-06-24', '19:00:00'),
(7, 3, 2, 12, '2019-06-20', '19:30:00'),
(8, 3, 2, 10, '2019-06-22', '19:30:00'),
(9, 2, 1, 5, '2019-06-20', '19:30:00'),
(10, 4, 1, 7, '2019-06-21', '20:00:00'),
(11, 4, 1, 7, '2019-06-23', '19:30:00'),
(12, 3, 2, 1, '2019-06-21', '19:30:00'),
(13, 4, 1, 11, '2019-06-26', '19:00:00'),
(14, 1, 2, 9, '2019-06-26', '19:00:00'),
(15, 1, 3, 10, '2019-06-23', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE IF NOT EXISTS `screen` (
  `cinema` int(11) NOT NULL DEFAULT '0',
  `screen` int(11) NOT NULL DEFAULT '0',
  `seats` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`cinema`,`screen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`cinema`, `screen`, `seats`, `price`) VALUES
(1, 1, 30, 550),
(1, 2, 40, 450),
(1, 3, 50, 350),
(2, 1, 25, 600),
(3, 1, 46, 400),
(3, 2, 66, 300),
(4, 1, 6, 800);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
