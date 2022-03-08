-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 10:55 PM
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
  `id` int(11) NOT NULL DEFAULT '0',
  `member` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member` (`member`),
  KEY `performance` (`performance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` char(255) NOT NULL,
  `location` char(255) DEFAULT NULL,
  `address` text,
  `manager` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `custID` int(10) NOT NULL,
  `custName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `custAddress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `custTown` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `custPostcode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `custTel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `custEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custID`, `custName`, `custAddress`, `custTown`, `custPostcode`, `custTel`, `custEmail`) VALUES
(56, 'Foo Inc.', '23 Main St.', 'London', 'N9 3TB', '02083641248', 'enquiries@fooinc.com'),
(2, 'Freens R Us', '35 Cow Slip Hill', 'Hatfield', 'AL10 4NA', '07896541235', 'freensrus@freens.com'),
(13, 'Kevlins', '11 Southbury Rd.', 'London', 'EN1 4HB', '07789612354', 'contactus@kevlins.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL DEFAULT '0',
  `released` int(11) DEFAULT NULL,
  `title` char(255) NOT NULL,
  `director` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemID` int(10) NOT NULL AUTO_INCREMENT,
  `itemDesc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=901 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemDesc`) VALUES
(563, '56" Blue Freen'),
(851, 'Spline End (Xtra Large)'),
(652, '3" Red Freen'),
(570, 'Small Cog'),
(571, 'Large Cog'),
(900, 'Bronze bolt'),
(420, 'Spline End (Small)');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `title` char(15) DEFAULT NULL,
  `name` char(255) DEFAULT NULL,
  `joined` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `invoice_no` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `itemQty` int(6) NOT NULL,
  `itemPrice` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`invoice_no`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`invoice_no`, `item_id`, `itemQty`, `itemPrice`) VALUES
(125, 563, 4, '3.50'),
(125, 851, 32, '0.25'),
(125, 652, 5, '12.00'),
(126, 563, 500, '3.50'),
(126, 652, 750, '12.00'),
(127, 563, 500, '3.50'),
(127, 652, 500, '12.00'),
(124, 571, 30, '10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `invoiceNo` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `custID` int(10) NOT NULL,
  PRIMARY KEY (`invoiceNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=128 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`invoiceNo`, `date`, `custID`) VALUES
(125, '2016-01-13', 56),
(126, '2016-09-14', 2),
(127, '2016-05-09', 13),
(124, '2015-12-15', 13);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `id` int(11) NOT NULL DEFAULT '0',
  `cinema` int(11) DEFAULT NULL,
  `screen` int(11) DEFAULT NULL,
  `film` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `seatsleft` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film` (`film`),
  KEY `cinema` (`cinema`,`screen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE IF NOT EXISTS `screen` (
  `cinema` int(11) NOT NULL DEFAULT '0',
  `screen` int(11) NOT NULL DEFAULT '0',
  `seats` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`cinema`,`screen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
