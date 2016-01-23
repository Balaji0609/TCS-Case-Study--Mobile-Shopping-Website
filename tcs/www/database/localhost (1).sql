-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2013 at 02:12 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytest`
--
CREATE DATABASE `mytest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mytest`;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `productid` int(10) NOT NULL,
  `os` varchar(20) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `connectivity` varchar(20) NOT NULL,
  `camera` varchar(10) NOT NULL,
  UNIQUE KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`productid`, `os`, `processor`, `connectivity`, `camera`) VALUES
(1001, 'Android', 'Dual Core', '3G', '3.2 MP'),
(1002, 'Windows', 'Dual Core', '3G', '5 MP'),
(1003, 'Android', 'Dual Core', '3G', '5 MP'),
(1004, 'Android', 'Dual Core', '3G', '3.2 MP'),
(1005, 'Android', 'Quad Core', '3G', '8 MP');

-- --------------------------------------------------------

--
-- Table structure for table `mobcatalog`
--

CREATE TABLE IF NOT EXISTS `mobcatalog` (
  `productid` int(10) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `brandname` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `warranty` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ipath` varchar(20) NOT NULL,
  UNIQUE KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobcatalog`
--

INSERT INTO `mobcatalog` (`productid`, `productname`, `brandname`, `quantity`, `warranty`, `price`, `type`, `ipath`) VALUES
(1001, 'S6802 Galaxy Ace Duos', 'Samsung', 10, 2, 15000, 'mobile', 'image/1.jpg'),
(1002, 'Lumia 710', 'Nokia', 20, 2, 22000, 'mobile', 'image/2.jpg'),
(1003, 'S5830 Galaxy Ace', 'Samsung', 15, 2, 16000, 'mobile', 'image/3.jpg'),
(1004, 'Lumia 520', 'Nokia', 5, 2, 12000, 'mobile', 'image/4.jpg'),
(1005, 'A 111 Canvas Doodle', 'Micromax', 15, 2, 16000, 'mobile', 'image/5.jpg'),
(1006, 'Stereo Headset', 'BlackBerry', 100, 1, 700, 'access', 'image/6.jpg'),
(1007, '3.5mm Jack Handsfree', 'SkullCandy', 50, 1, 800, 'access', 'image/7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offerstable`
--

CREATE TABLE IF NOT EXISTS `offerstable` (
  `productid` int(10) NOT NULL,
  `ipath` varchar(20) NOT NULL,
  `discount` int(3) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  UNIQUE KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerstable`
--

INSERT INTO `offerstable` (`productid`, `ipath`, `discount`, `startdate`, `enddate`) VALUES
(1001, 'image/offer1.jpg', 5, '2013-08-30', '2013-09-30'),
(1004, 'image/offer2.jpg', 10, '2013-08-30', '2013-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `servicetable`
--

CREATE TABLE IF NOT EXISTS `servicetable` (
  `productid` int(10) NOT NULL,
  `serviceid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `servicedate` date NOT NULL,
  `customername` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `warranty` int(5) NOT NULL,
  `defect` varchar(50) NOT NULL,
  `duedate` date NOT NULL,
  `servicecharge` int(10) NOT NULL,
  UNIQUE KEY `productid` (`productid`,`serviceid`,`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soldproducts`
--

CREATE TABLE IF NOT EXISTS `soldproducts` (
  `productid` int(10) NOT NULL,
  `billid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `purchdate` date NOT NULL,
  `productname` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `cdnumber` varchar(20) NOT NULL,
  UNIQUE KEY `productid` (`productid`),
  UNIQUE KEY `productname` (`productname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userstable`
--

CREATE TABLE IF NOT EXISTS `userstable` (
  `username` varchar(20) NOT NULL,
  `customerid` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  UNIQUE KEY `username` (`username`,`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstable`
--

INSERT INTO `userstable` (`username`, `customerid`, `password`, `email`, `phonenumber`) VALUES
('sense', '9497', '1234', 'sense@gmail.com', 7299);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
