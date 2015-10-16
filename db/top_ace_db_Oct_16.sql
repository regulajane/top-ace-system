-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2015 at 06:52 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `top_ace_db`
--
CREATE DATABASE IF NOT EXISTS `top_ace_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `top_ace_db`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clientid` int(15) NOT NULL AUTO_INCREMENT,
  `cllastname` varchar(50) DEFAULT NULL,
  `clfirstname` varchar(50) DEFAULT NULL,
  `clmidinitial` varchar(5) DEFAULT NULL,
  `clcelno` varchar(15) DEFAULT NULL,
  `clgender` enum('Male','Female') DEFAULT NULL,
  `claddress` varchar(300) DEFAULT NULL,
  `clsince` date DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `cllastname`, `clfirstname`, `clmidinitial`, `clcelno`, `clgender`, `claddress`, `clsince`) VALUES
(1, 'Francisco', 'Trisha', 'M', '09068535509', 'Female', 'IC 77, Poblacion, La Trinidad, Benguet', '2014-02-13'),
(3, 'Ferreria', 'Kimberly', 'R', '09169212756', 'Female', '17, Pias, Mapandan, Pangasinan', '2013-10-10'),
(4, 'Salavatore', 'Perry', 'B', '09196478953', 'Male', '23, Quezon Hill, Baguio City', '2013-10-10'),
(5, 'Apostol', 'Shirly', 'G', '09124789624', 'Female', '11, Poblacion, Sta. Barbara, Pangasinan', '2015-10-10'),
(6, 'Corla', 'Elmo', 'F', '09124796524', 'Male', '01, New Lucban, Baguio City', '2015-10-10'),
(7, 'Padlan', 'Karl', 'I', '09153479562', 'Female', '99, Honeymoon Road, Baguio City', '2013-10-10'),
(8, 'Villanueva', 'Aizyl Grace', 'R', '09354789210', 'Female', '18, Malanay, Manaoag, Pangasinan', '2015-10-10'),
(9, 'Mamucod', 'Rico', 'M', '09163254896', 'Male', '12, Trancoville, Baguio City', '2014-02-13'),
(10, 'Alcid', 'Jovanni', 'Y', '09306123945', 'Male', '87, Golden, Moncada, Tarlac City', '2014-02-13'),
(11, 'Lomboy', 'Kissel', 'E', '09154652560', 'Female', '34, Aurora Hill, Baguio City', '2014-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employeeid` int(15) NOT NULL AUTO_INCREMENT,
  `emplastname` varchar(50) DEFAULT NULL,
  `empfirstname` varchar(50) DEFAULT NULL,
  `empmiddlename` varchar(50) DEFAULT NULL,
  `empcelno` varchar(15) DEFAULT NULL,
  `empgender` enum('Male','Female') DEFAULT NULL,
  `empaddress` varchar(300) DEFAULT NULL,
  `empstatus` enum('Active','Inactive') DEFAULT NULL,
  `empemailad` varchar(50) DEFAULT NULL,
  `noofjobs` int(5) DEFAULT '0',
  `emptype` enum('Front Desk Personnel','Machinist','Manager') DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeid`, `emplastname`, `empfirstname`, `empmiddlename`, `empcelno`, `empgender`, `empaddress`, `empstatus`, `empemailad`, `noofjobs`, `emptype`) VALUES
(1, 'Snow', 'Jon', 'Stark', '09061234567', 'Male', '#3 Winterfell, Baguio City', 'Active', 'jonsnow@yahoo.com', 4, 'Machinist'),
(2, 'Tiong', 'Benedict', 'So', '09121212121', 'Male', 'Baguio City, Benguet', 'Active', 'tiong@gmail.com', 0, 'Manager'),
(3, 'Tiong', 'Brenwin', 'So', '09199829872', 'Male', 'Baguio City, Benguet', 'Active', 'tiongso@gmail.com', 0, 'Manager'),
(4, 'San Pedro', 'Marvin', 'Malik', '09128718711', 'Male', 'Baguio City, Benguet', 'Active', 'marvin@gmail.com', 2, 'Machinist'),
(5, 'Castro', 'Jameson', 'Side', '09182763871', 'Male', 'La Trinidad, Benguet', 'Active', 'castro@yahoo.com', 2, 'Machinist'),
(6, 'Conje', 'Noryza', 'Reyes', '09912877126', 'Female', 'Sual, Pangasinan', 'Active', 'conje@gmail.com', 0, 'Front Desk Personnel'),
(7, 'Roces', 'Mikee', 'Ancheta', '01216521982', 'Female', 'Dagupan, Pangasinan', 'Active', 'Roces@gmail.com', 0, 'Front Desk Personnel');

-- --------------------------------------------------------

--
-- Table structure for table `engrecon`
--

CREATE TABLE IF NOT EXISTS `engrecon` (
  `engreconid` int(15) NOT NULL AUTO_INCREMENT,
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`engreconid`),
  KEY `fk_engrecon_joborderid_idx` (`joborderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `engreconfab`
--

CREATE TABLE IF NOT EXISTS `engreconfab` (
  `engreconfabid` int(15) NOT NULL AUTO_INCREMENT,
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`engreconfabid`),
  KEY `fk_engreconfab_joborderid_idx` (`joborderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fabrications`
--

CREATE TABLE IF NOT EXISTS `fabrications` (
  `fabricationid` int(15) NOT NULL AUTO_INCREMENT,
  `fabricationdesc` varchar(500) DEFAULT NULL,
  `fabricationquantity` int(5) DEFAULT NULL,
  `fabricationprice` decimal(11,2) DEFAULT NULL,
  `fabricationstatus` enum('Pending','Started','Done') DEFAULT 'Pending',
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`fabricationid`),
  KEY `fk_fabrications_joborderid_idx` (`joborderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fabrications`
--

INSERT INTO `fabrications` (`fabricationid`, `fabricationdesc`, `fabricationquantity`, `fabricationprice`, `fabricationstatus`, `joborderid`) VALUES
(1, 'Bronze Fabriction', 25, '500.00', 'Pending', 5);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryid` int(15) NOT NULL AUTO_INCREMENT,
  `inventoryname` varchar(300) DEFAULT NULL,
  `inventorysize` varchar(50) DEFAULT NULL,
  `inventoryprice` decimal(11,2) DEFAULT NULL,
  `inventoryquantity` int(5) DEFAULT NULL,
  `modelid` int(15) DEFAULT NULL,
  `reorderlevel` int(11) DEFAULT '10',
  PRIMARY KEY (`inventoryid`),
  KEY `fk_inventory_modelid_idx` (`modelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=804 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `inventoryname`, `inventorysize`, `inventoryprice`, `inventoryquantity`, `modelid`, `reorderlevel`) VALUES
(1, 'Engine Valve', NULL, '600.00', 100, 1, 10),
(2, 'Engine Valve', NULL, '400.00', 100, 2, 10),
(3, 'Engine Valve', NULL, '300.00', 100, 3, 10),
(4, 'Engine Valve', NULL, '350.00', 100, 4, 10),
(5, 'Engine Valve', NULL, '245.00', 100, 5, 10),
(6, 'Engine Valve', NULL, '150.75', 100, 6, 10),
(7, 'Engine Valve', NULL, '340.00', 100, 7, 10),
(8, 'Engine Valve', NULL, '245.50', 100, 8, 10),
(9, 'Engine Valve', NULL, '120.00', 100, 9, 10),
(10, 'Engine Valve', NULL, '135.00', 100, 10, 10),
(11, 'Engine Valve', NULL, '450.00', 100, 11, 10),
(12, 'Engine Valve', NULL, '345.00', 100, 12, 10),
(13, 'Engine Valve', NULL, '254.00', 100, 13, 10),
(14, 'Engine Valve', NULL, '323.90', 100, 14, 10),
(15, 'Engine Valve', NULL, '445.00', 100, 15, 10),
(16, 'Engine Valve', NULL, '345.00', 100, 16, 10),
(17, 'Engine Valve', NULL, '167.00', 100, 17, 10),
(18, 'Engine Valve', NULL, '340.00', 100, 18, 10),
(19, 'Engine Valve', NULL, '231.00', 100, 19, 10),
(20, 'Engine Valve', NULL, '609.00', 100, 20, 10),
(21, 'Engine Valve', NULL, '780.00', 100, 21, 10),
(22, 'Engine Valve', NULL, '890.00', 100, 22, 10),
(23, 'Engine Valve', NULL, '1500.00', 100, 23, 10),
(24, 'Engine Valve', NULL, '798.00', 100, 24, 10),
(25, 'Engine Valve', NULL, '450.00', 100, 25, 10),
(26, 'Engine Valve', NULL, '540.00', 100, 26, 10),
(27, 'Engine Valve', NULL, '789.00', 100, 27, 10),
(28, 'Engine Valve', NULL, '1254.00', 100, 28, 10),
(29, 'Engine Valve', NULL, '370.00', 100, 29, 10),
(30, 'Valve Seal', NULL, '450.00', 100, 1, 10),
(31, 'Valve Seal', NULL, '670.00', 100, 2, 10),
(32, 'Valve Seal', NULL, '650.00', 100, 3, 10),
(33, 'Valve Seal', NULL, '340.00', 100, 4, 10),
(34, 'Valve Seal', NULL, '456.00', 100, 5, 10),
(35, 'Valve Seal', NULL, '345.00', 100, 6, 10),
(36, 'Valve Seal', NULL, '567.00', 100, 7, 10),
(37, 'Valve Seal', NULL, '789.00', 100, 8, 10),
(38, 'Valve Seal', NULL, '234.00', 100, 9, 10),
(39, 'Valve Seal', NULL, '670.00', 100, 10, 10),
(40, 'Valve Seal', NULL, '569.00', 100, 11, 10),
(41, 'Valve Seal', NULL, '450.00', 100, 12, 10),
(42, 'Valve Seal', NULL, '680.00', 100, 13, 10),
(43, 'Valve Seal', NULL, '350.00', 100, 14, 10),
(44, 'Valve Seal', NULL, '670.00', 100, 15, 10),
(45, 'Valve Seal', NULL, '345.00', 100, 16, 10),
(46, 'Valve Seal', NULL, '234.50', 100, 17, 10),
(47, 'Valve Seal', NULL, '780.00', 100, 18, 10),
(48, 'Valve Seal', NULL, '760.00', 100, 19, 10),
(49, 'Valve Seal', NULL, '230.00', 100, 20, 10),
(50, 'Valve Seal', NULL, '670.00', 100, 21, 10),
(51, 'Valve Seal', NULL, '345.00', 100, 22, 10),
(52, 'Valve Seal', NULL, '560.00', 100, 23, 10),
(53, 'Valve Seal', NULL, '230.00', 100, 24, 10),
(54, 'Valve Seal', NULL, '440.00', 100, 25, 10),
(55, 'Valve Seal', NULL, '650.00', 100, 26, 10),
(56, 'Valve Seal', NULL, '340.00', 100, 27, 10),
(57, 'Valve Seal', NULL, '560.00', 100, 28, 10),
(58, 'Valve Seal', NULL, '230.00', 100, 29, 10),
(59, 'Valve Tappet', NULL, '450.25', 100, 1, 10),
(60, 'Valve Tappet', NULL, '670.00', 100, 2, 10),
(61, 'Valve Tappet', NULL, '890.00', 100, 3, 10),
(62, 'Valve Tappet', NULL, '450.00', 100, 4, 10),
(63, 'Valve Tappet', NULL, '235.00', 100, 5, 10),
(64, 'Valve Tappet', NULL, '340.00', 100, 6, 10),
(65, 'Valve Tappet', NULL, '790.00', 100, 7, 10),
(66, 'Valve Tappet', NULL, '670.00', 100, 8, 10),
(67, 'Valve Tappet', NULL, '560.00', 100, 9, 10),
(68, 'Valve Tappet', NULL, '777.00', 100, 10, 10),
(69, 'Valve Tappet', NULL, '556.00', 100, 11, 10),
(70, 'Valve Tappet', NULL, '787.50', 100, 12, 10),
(71, 'Valve Tappet', NULL, '340.00', 100, 13, 10),
(72, 'Valve Tappet', NULL, '450.00', 100, 14, 10),
(73, 'Valve Tappet', NULL, '560.00', 100, 15, 10),
(74, 'Valve Tappet', NULL, '435.00', 100, 16, 10),
(75, 'Valve Tappet', NULL, '879.00', 100, 17, 10),
(76, 'Valve Tappet', NULL, '567.00', 100, 18, 10),
(77, 'Valve Tappet', NULL, '845.00', 100, 19, 10),
(78, 'Valve Tappet', NULL, '738.00', 100, 20, 10),
(79, 'Valve Tappet', NULL, '577.00', 100, 21, 10),
(80, 'Valve Tappet', NULL, '535.00', 100, 22, 10),
(81, 'Valve Tappet', NULL, '456.67', 100, 23, 10),
(82, 'Valve Tappet', NULL, '436.90', 100, 24, 10),
(83, 'Valve Tappet', NULL, '789.00', 100, 25, 10),
(84, 'Valve Tappet', NULL, '437.00', 100, 26, 10),
(85, 'Valve Tappet', NULL, '909.00', 100, 27, 10),
(86, 'Valve Tappet', NULL, '999.00', 100, 28, 10),
(87, 'Valve Tappet', NULL, '1456.00', 100, 29, 10),
(88, 'Valve Insert Ring', NULL, '345.00', 100, 1, 10),
(89, 'Valve Insert Ring', NULL, '290.00', 100, 2, 10),
(90, 'Valve Insert Ring', NULL, '560.00', 100, 3, 10),
(91, 'Valve Insert Ring', NULL, '567.25', 100, 4, 10),
(92, 'Valve Insert Ring', NULL, '340.00', 100, 5, 10),
(93, 'Valve Insert Ring', NULL, '670.00', 100, 6, 10),
(94, 'Valve Insert Ring', NULL, '579.00', 100, 7, 10),
(95, 'Valve Insert Ring', NULL, '434.00', 100, 8, 10),
(96, 'Valve Insert Ring', NULL, '790.00', 100, 9, 10),
(97, 'Valve Insert Ring', NULL, '760.00', 100, 10, 10),
(98, 'Valve Insert Ring', NULL, '538.00', 100, 11, 10),
(99, 'Valve Insert Ring', NULL, '560.00', 100, 12, 10),
(100, 'Valve Insert Ring', NULL, '890.00', 100, 13, 10),
(101, 'Valve Insert Ring', NULL, '678.00', 100, 14, 10),
(102, 'Valve Insert Ring', NULL, '560.00', 100, 15, 10),
(103, 'Valve Insert Ring', NULL, '580.00', 100, 16, 10),
(104, 'Valve Insert Ring', NULL, '648.00', 100, 17, 10),
(105, 'Valve Insert Ring', NULL, '457.25', 100, 18, 10),
(106, 'Valve Insert Ring', NULL, '670.00', 100, 19, 10),
(107, 'Valve Insert Ring', NULL, '599.00', 100, 20, 10),
(108, 'Valve Insert Ring', NULL, '234.00', 100, 21, 10),
(109, 'Valve Insert Ring', NULL, '450.00', 100, 22, 10),
(110, 'Valve Insert Ring', NULL, '350.00', 100, 23, 10),
(111, 'Valve Insert Ring', NULL, '435.00', 100, 24, 10),
(112, 'Valve Insert Ring', NULL, '670.00', 100, 25, 10),
(113, 'Valve Insert Ring', NULL, '690.00', 100, 26, 10),
(114, 'Valve Insert Ring', NULL, '345.00', 100, 27, 10),
(115, 'Valve Insert Ring', NULL, '450.00', 100, 28, 10),
(116, 'Valve Insert Ring', NULL, '340.00', 100, 29, 10),
(117, 'Valve Guide', NULL, '550.00', 100, 1, 10),
(118, 'Valve Guide', NULL, '670.00', 100, 2, 10),
(119, 'Valve Guide', NULL, '650.00', 100, 3, 10),
(120, 'Valve Guide', NULL, '890.00', 100, 4, 10),
(121, 'Valve Guide', NULL, '567.00', 100, 5, 10),
(122, 'Valve Guide', NULL, '789.00', 100, 6, 10),
(123, 'Valve Guide', NULL, '567.00', 100, 7, 10),
(124, 'Valve Guide', NULL, '434.25', 100, 8, 10),
(125, 'Valve Guide', NULL, '563.00', 100, 9, 10),
(126, 'Valve Guide', NULL, '233.00', 100, 10, 10),
(127, 'Valve Guide', NULL, '679.00', 100, 11, 10),
(128, 'Valve Guide', NULL, '650.00', 100, 12, 10),
(129, 'Valve Guide', NULL, '345.00', 100, 13, 10),
(130, 'Valve Guide', NULL, '340.00', 100, 14, 10),
(131, 'Valve Guide', NULL, '680.00', 100, 15, 10),
(132, 'Valve Guide', NULL, '650.00', 100, 16, 10),
(133, 'Valve Guide', NULL, '450.00', 100, 17, 10),
(134, 'Valve Guide', NULL, '560.00', 100, 18, 10),
(135, 'Valve Guide', NULL, '450.00', 100, 19, 10),
(136, 'Valve Guide', NULL, '430.00', 100, 20, 10),
(137, 'Valve Guide', NULL, '439.00', 100, 21, 10),
(138, 'Valve Guide', NULL, '467.00', 100, 22, 10),
(139, 'Valve Guide', NULL, '890.00', 100, 23, 10),
(140, 'Valve Guide', NULL, '659.00', 100, 24, 10),
(141, 'Valve Guide', NULL, '888.00', 100, 25, 10),
(142, 'Valve Guide', NULL, '545.00', 100, 26, 10),
(143, 'Valve Guide', NULL, '565.00', 100, 27, 10),
(144, 'Valve Guide', NULL, '456.00', 100, 28, 10),
(145, 'Valve Guide', NULL, '789.00', 100, 29, 10),
(146, 'Gasket', NULL, '770.00', 100, 1, 10),
(147, 'Gasket', NULL, '1349.00', 100, 2, 10),
(148, 'Gasket', NULL, '1569.00', 100, 3, 10),
(149, 'Gasket', NULL, '450.00', 100, 4, 10),
(150, 'Gasket', NULL, '3234.00', 100, 5, 10),
(151, 'Gasket', NULL, '6908.00', 100, 6, 10),
(152, 'Gasket', NULL, '4467.00', 100, 7, 10),
(153, 'Gasket', NULL, '450.00', 100, 8, 10),
(154, 'Gasket', NULL, '230.90', 100, 9, 10),
(155, 'Gasket', NULL, '788.00', 100, 10, 10),
(156, 'Gasket', NULL, '550.00', 100, 11, 10),
(157, 'Gasket', NULL, '2322.00', 100, 12, 10),
(158, 'Gasket', NULL, '1122.00', 100, 13, 10),
(159, 'Gasket', NULL, '3556.00', 100, 14, 10),
(160, 'Gasket', NULL, '7760.00', 100, 15, 10),
(161, 'Gasket', NULL, '560.00', 100, 16, 10),
(162, 'Gasket', NULL, '343.00', 100, 17, 10),
(163, 'Gasket', NULL, '545.00', 100, 18, 10),
(164, 'Gasket', NULL, '324.00', 100, 19, 10),
(165, 'Gasket', NULL, '5455.00', 100, 20, 10),
(166, 'Gasket', NULL, '2122.00', 100, 21, 10),
(167, 'Gasket', NULL, '2215.00', 100, 22, 10),
(168, 'Gasket', NULL, '547.00', 100, 23, 10),
(169, 'Gasket', NULL, '888.00', 100, 24, 10),
(170, 'Gasket', NULL, '887.00', 100, 25, 10),
(171, 'Gasket', NULL, '434.00', 100, 26, 10),
(172, 'Gasket', NULL, '232.00', 100, 27, 10),
(173, 'Gasket', NULL, '3223.00', 100, 28, 10),
(174, 'Gasket', NULL, '546.00', 100, 29, 10),
(175, 'Piston Ring', '0.25', '776.00', 100, 1, 10),
(176, 'Piston Ring', '0.25', '725.00', 100, 2, 10),
(177, 'Piston Ring', '0.25', '566.00', 100, 3, 10),
(178, 'Piston Ring', '0.25', '766.00', 100, 4, 10),
(179, 'Piston Ring', '0.25', '450.00', 100, 5, 10),
(180, 'Piston Ring', '0.25', '650.00', 100, 6, 10),
(181, 'Piston Ring', '0.25', '1200.50', 100, 7, 10),
(182, 'Piston Ring', '0.25', '800.00', 100, 8, 10),
(183, 'Piston Ring', '0.25', '350.00', 100, 9, 10),
(184, 'Piston Ring', '0.25', '400.00', 100, 10, 10),
(185, 'Piston Ring', '0.25', '360.00', 100, 11, 10),
(186, 'Piston Ring', '0.25', '400.00', 100, 12, 10),
(187, 'Piston Ring', '0.25', '550.00', 100, 13, 10),
(188, 'Piston Ring', '0.25', '580.25', 100, 14, 10),
(189, 'Piston Ring', '0.25', '1200.00', 100, 15, 10),
(190, 'Piston Ring', '0.25', '1100.00', 100, 16, 10),
(191, 'Piston Ring', '0.25', '580.00', 100, 17, 10),
(192, 'Piston Ring', '0.25', '500.00', 100, 18, 10),
(193, 'Piston Ring', '0.25', '650.00', 100, 19, 10),
(194, 'Piston Ring', '0.25', '750.00', 100, 20, 10),
(195, 'Piston Ring', '0.25', '700.00', 100, 21, 10),
(196, 'Piston Ring', '0.25', '720.00', 100, 22, 10),
(197, 'Piston Ring', '0.25', '680.00', 100, 23, 10),
(198, 'Piston Ring', '0.25', '600.00', 100, 24, 10),
(199, 'Piston Ring', '0.25', '1150.00', 100, 25, 10),
(200, 'Piston Ring', '0.25', '1000.00', 100, 26, 10),
(201, 'Piston Ring', '0.25', '800.00', 100, 27, 10),
(202, 'Piston Ring', '0.25', '850.00', 100, 28, 10),
(203, 'Piston Ring', '0.25', '300.00', 100, 29, 10),
(204, 'Main Bearing', '0.25', '660.00', 100, 1, 10),
(205, 'Main Bearing', '0.25', '880.00', 100, 2, 10),
(206, 'Main Bearing', '0.25', '980.00', 100, 3, 10),
(207, 'Main Bearing', '0.25', '1000.50', 100, 4, 10),
(208, 'Main Bearing', '0.25', '650.00', 100, 5, 10),
(209, 'Main Bearing', '0.25', '850.00', 100, 6, 10),
(210, 'Main Bearing', '0.25', '360.00', 100, 7, 10),
(211, 'Main Bearing', '0.25', '480.00', 100, 8, 10),
(212, 'Main Bearing', '0.25', '370.00', 100, 9, 10),
(213, 'Main Bearing', '0.25', '460.00', 100, 10, 10),
(214, 'Main Bearing', '0.25', '460.00', 100, 11, 10),
(215, 'Main Bearing', '0.25', '450.00', 100, 12, 10),
(216, 'Main Bearing', '0.25', '550.00', 100, 13, 10),
(217, 'Main Bearing', '0.25', '580.00', 100, 14, 10),
(218, 'Main Bearing', '0.25', '600.00', 100, 15, 10),
(219, 'Main Bearing', '0.25', '650.00', 100, 16, 10),
(220, 'Main Bearing', '0.25', '700.00', 100, 17, 10),
(221, 'Main Bearing', '0.25', '400.50', 100, 18, 10),
(222, 'Main Bearing', '0.25', '660.00', 100, 19, 10),
(223, 'Main Bearing', '0.25', '730.00', 100, 20, 10),
(224, 'Main Bearing', '0.25', '390.00', 100, 21, 10),
(225, 'Main Bearing', '0.25', '450.00', 100, 22, 10),
(226, 'Main Bearing', '0.25', '470.00', 100, 23, 10),
(227, 'Main Bearing', '0.25', '520.00', 100, 24, 10),
(228, 'Main Bearing', '0.25', '500.00', 100, 25, 10),
(229, 'Main Bearing', '0.25', '600.00', 100, 26, 10),
(230, 'Main Bearing', '0.25', '400.00', 100, 27, 10),
(231, 'Main Bearing', '0.25', '390.00', 100, 28, 10),
(232, 'Main Bearing', '0.25', '380.00', 100, 29, 10),
(233, 'Connecting Rod Bearing', '0.25', '410.00', 100, 1, 10),
(234, 'Connecting Rod Bearing', '0.25', '570.00', 100, 2, 10),
(235, 'Connecting Rod Bearing', '0.25', '580.00', 100, 3, 10),
(236, 'Connecting Rod Bearing', '0.25', '585.00', 100, 4, 10),
(237, 'Connecting Rod Bearing', '0.25', '550.90', 100, 5, 10),
(238, 'Connecting Rod Bearing', '0.25', '290.00', 100, 6, 10),
(239, 'Connecting Rod Bearing', '0.25', '375.00', 100, 7, 10),
(240, 'Connecting Rod Bearing', '0.25', '850.00', 100, 8, 10),
(241, 'Connecting Rod Bearing', '0.25', '800.00', 100, 9, 10),
(242, 'Connecting Rod Bearing', '0.25', '690.00', 100, 10, 10),
(243, 'Connecting Rod Bearing', '0.25', '900.00', 100, 11, 10),
(244, 'Connecting Rod Bearing', '0.25', '1500.00', 100, 12, 10),
(245, 'Connecting Rod Bearing', '0.25', '1400.00', 100, 13, 10),
(246, 'Connecting Rod Bearing', '0.25', '400.00', 100, 14, 10),
(247, 'Connecting Rod Bearing', '0.25', '500.00', 100, 15, 10),
(248, 'Connecting Rod Bearing', '0.25', '520.00', 100, 16, 10),
(249, 'Connecting Rod Bearing', '0.25', '530.00', 100, 17, 10),
(250, 'Connecting Rod Bearing', '0.25', '580.00', 100, 18, 10),
(251, 'Connecting Rod Bearing', '0.25', '670.00', 100, 19, 10),
(252, 'Connecting Rod Bearing', '0.25', '680.00', 100, 20, 10),
(253, 'Connecting Rod Bearing', '0.25', '600.00', 100, 21, 10),
(254, 'Connecting Rod Bearing', '0.25', '800.00', 100, 22, 10),
(255, 'Connecting Rod Bearing', '0.25', '900.00', 100, 23, 10),
(256, 'Connecting Rod Bearing', '0.25', '980.00', 100, 24, 10),
(257, 'Connecting Rod Bearing', '0.25', '970.00', 100, 25, 10),
(258, 'Connecting Rod Bearing', '0.25', '600.00', 100, 26, 10),
(259, 'Connecting Rod Bearing', '0.25', '900.00', 100, 27, 10),
(260, 'Connecting Rod Bearing', '0.25', '800.00', 100, 28, 10),
(261, 'Connecting Rod Bearing', '0.25', '860.00', 100, 29, 10),
(262, 'Thrust Washer', NULL, '700.00', 100, 1, 10),
(263, 'Thrust Washer', NULL, '470.00', 100, 2, 10),
(264, 'Thrust Washer', NULL, '860.00', 100, 3, 10),
(265, 'Thrust Washer', NULL, '900.00', 100, 4, 10),
(266, 'Thrust Washer', NULL, '900.00', 100, 5, 10),
(267, 'Thrust Washer', NULL, '860.00', 100, 6, 10),
(268, 'Thrust Washer', NULL, '470.00', 100, 7, 10),
(269, 'Thrust Washer', NULL, '700.00', 100, 8, 10),
(270, 'Thrust Washer', NULL, '800.00', 100, 9, 10),
(271, 'Thrust Washer', NULL, '800.00', 100, 10, 10),
(272, 'Thrust Washer', NULL, '980.00', 100, 11, 10),
(273, 'Thrust Washer', NULL, '600.00', 100, 12, 10),
(274, 'Thrust Washer', NULL, '650.00', 100, 13, 10),
(275, 'Thrust Washer', NULL, '750.75', 100, 14, 10),
(276, 'Thrust Washer', NULL, '1800.00', 100, 15, 10),
(277, 'Thrust Washer', NULL, '1500.00', 100, 16, 10),
(278, 'Thrust Washer', NULL, '700.00', 100, 17, 10),
(279, 'Thrust Washer', NULL, '730.00', 100, 18, 10),
(280, 'Thrust Washer', NULL, '440.00', 100, 19, 10),
(281, 'Thrust Washer', NULL, '399.00', 100, 20, 10),
(282, 'Thrust Washer', NULL, '770.00', 100, 21, 10),
(283, 'Thrust Washer', NULL, '885.00', 100, 22, 10),
(284, 'Thrust Washer', NULL, '880.00', 100, 23, 10),
(285, 'Thrust Washer', NULL, '695.00', 100, 24, 10),
(286, 'Thrust Washer', NULL, '990.00', 100, 25, 10),
(287, 'Thrust Washer', NULL, '1000.00', 100, 26, 10),
(288, 'Thrust Washer', NULL, '188.00', 100, 27, 10),
(289, 'Thrust Washer', NULL, '280.00', 100, 28, 10),
(290, 'Thrust Washer', NULL, '780.00', 100, 29, 10),
(291, 'Camshaft Bushing', NULL, '1000.00', 100, 1, 10),
(292, 'Camshaft Bushing', NULL, '900.00', 100, 2, 10),
(293, 'Camshaft Bushing', NULL, '1500.00', 100, 3, 10),
(294, 'Camshaft Bushing', NULL, '900.00', 100, 4, 10),
(295, 'Camshaft Bushing', NULL, '800.00', 100, 5, 10),
(296, 'Camshaft Bushing', NULL, '500.75', 100, 6, 10),
(297, 'Camshaft Bushing', NULL, '750.00', 100, 7, 10),
(298, 'Camshaft Bushing', NULL, '650.00', 100, 8, 10),
(299, 'Camshaft Bushing', NULL, '600.00', 100, 9, 10),
(300, 'Camshaft Bushing', NULL, '850.00', 100, 10, 10),
(301, 'Camshaft Bushing', NULL, '980.00', 100, 11, 10),
(302, 'Camshaft Bushing', NULL, '1200.00', 100, 12, 10),
(303, 'Camshaft Bushing', '', '460.00', 100, 13, 10),
(304, 'Camshaft Bushing', NULL, '600.00', 100, 14, 10),
(305, 'Camshaft Bushing', NULL, '600.00', 100, 15, 10),
(306, 'Camshaft Bushing', NULL, '600.00', 100, 16, 10),
(307, 'Camshaft Bushing', NULL, '700.00', 100, 17, 10),
(308, 'Camshaft Bushing', NULL, '750.00', 100, 18, 10),
(309, 'Camshaft Bushing', NULL, '600.00', 100, 19, 10),
(310, 'Camshaft Bushing', NULL, '600.00', 100, 20, 10),
(311, 'Camshaft Bushing', NULL, '600.00', 100, 21, 10),
(312, 'Camshaft Bushing', NULL, '750.00', 100, 22, 10),
(313, 'Camshaft Bushing', NULL, '750.00', 100, 23, 10),
(314, 'Camshaft Bushing', NULL, '750.00', 100, 24, 10),
(315, 'Camshaft Bushing', NULL, '1200.00', 100, 25, 10),
(316, 'Camshaft Bushing', NULL, '750.00', 100, 26, 10),
(317, 'Camshaft Bushing', NULL, '400.00', 100, 27, 10),
(318, 'Camshaft Bushing', NULL, '800.00', 100, 28, 10),
(319, 'Camshaft Bushing', NULL, '900.00', 100, 29, 10),
(320, 'Piston Assembly', NULL, '900.00', 100, 1, 10),
(321, 'Piston Assembly', NULL, '700.00', 100, 2, 10),
(322, 'Piston Assembly', NULL, '600.00', 100, 3, 10),
(323, 'Piston Assembly', NULL, '650.00', 100, 4, 10),
(324, 'Piston Assembly', NULL, '760.50', 100, 5, 10),
(325, 'Piston Assembly', NULL, '800.00', 100, 6, 10),
(326, 'Piston Assembly', NULL, '990.00', 100, 7, 10),
(327, 'Piston Assembly', NULL, '980.00', 100, 8, 10),
(328, 'Piston Assembly', NULL, '1000.00', 100, 9, 10),
(329, 'Piston Assembly', NULL, '1100.00', 100, 10, 10),
(330, 'Piston Assembly', NULL, '400.00', 100, 11, 10),
(331, 'Piston Assembly', NULL, '500.00', 100, 12, 10),
(332, 'Piston Assembly', NULL, '600.00', 100, 13, 10),
(333, 'Piston Assembly', NULL, '800.00', 100, 14, 10),
(334, 'Piston Assembly', NULL, '750.00', 100, 15, 10),
(335, 'Piston Assembly', NULL, '500.00', 100, 16, 10),
(336, 'Piston Assembly', NULL, '500.60', 100, 17, 10),
(337, 'Piston Assembly', NULL, '800.00', 100, 18, 10),
(338, 'Piston Assembly', NULL, '600.00', 100, 19, 10),
(339, 'Piston Assembly', NULL, '650.00', 100, 20, 10),
(340, 'Piston Assembly', NULL, '1000.00', 100, 21, 10),
(341, 'Piston Assembly', NULL, '770.00', 100, 22, 10),
(342, 'Piston Assembly', NULL, '550.00', 100, 23, 10),
(343, 'Piston Assembly', NULL, '600.00', 100, 24, 10),
(344, 'Piston Assembly', NULL, '500.00', 100, 25, 10),
(345, 'Piston Assembly', NULL, '480.00', 100, 26, 10),
(346, 'Piston Assembly', NULL, '590.00', 100, 27, 10),
(347, 'Piston Assembly', NULL, '100.00', 100, 28, 10),
(348, 'Piston Assembly', NULL, '500.00', 100, 29, 10),
(349, 'Piston Pin', NULL, '600.00', 100, 1, 10),
(350, 'Piston Pin', NULL, '520.00', 100, 2, 10),
(351, 'Piston Pin', NULL, '900.00', 100, 3, 10),
(352, 'Piston Pin', NULL, '670.00', 100, 4, 10),
(353, 'Piston Pin', NULL, '700.00', 100, 5, 10),
(354, 'Piston Pin', NULL, '500.00', 100, 6, 10),
(355, 'Piston Pin', NULL, '600.00', 100, 7, 10),
(356, 'Piston Pin', NULL, '770.00', 100, 8, 10),
(357, 'Piston Pin', NULL, '640.00', 100, 9, 10),
(358, 'Piston Pin', NULL, '680.00', 100, 10, 10),
(359, 'Piston Pin', NULL, '940.00', 100, 11, 10),
(360, 'Piston Pin', NULL, '800.00', 100, 12, 10),
(361, 'Piston Pin', NULL, '670.00', 100, 13, 10),
(362, 'Piston Pin', NULL, '600.00', 100, 14, 10),
(363, 'Piston Pin', NULL, '800.00', 100, 15, 10),
(364, 'Piston Pin', NULL, '700.00', 100, 16, 10),
(365, 'Piston Pin', NULL, '890.00', 100, 17, 10),
(366, 'Piston Pin', NULL, '780.00', 100, 18, 10),
(367, 'Piston Pin', NULL, '700.00', 100, 19, 10),
(368, 'Piston Pin', NULL, '700.00', 100, 20, 10),
(369, 'Piston Pin', NULL, '600.00', 100, 21, 10),
(370, 'Piston Pin', NULL, '700.00', 100, 22, 10),
(371, 'Piston Pin', NULL, '800.00', 100, 23, 10),
(372, 'Piston Pin', NULL, '670.00', 100, 24, 10),
(373, 'Piston Pin', NULL, '760.00', 100, 25, 10),
(374, 'Piston Pin', NULL, '650.00', 100, 26, 10),
(375, 'Piston Pin', NULL, '500.00', 100, 27, 10),
(376, 'Piston Pin', NULL, '900.00', 100, 28, 10),
(377, 'Piston Pin', NULL, '800.00', 100, 29, 10),
(378, 'Liner', NULL, '600.00', 100, 1, 10),
(379, 'Liner', NULL, '400.00', 100, 2, 10),
(380, 'Liner', NULL, '510.00', 100, 3, 10),
(381, 'Liner', NULL, '520.00', 100, 4, 10),
(382, 'Liner', NULL, '840.00', 100, 5, 10),
(383, 'Liner', NULL, '940.00', 100, 6, 10),
(384, 'Liner', NULL, '650.00', 100, 7, 10),
(385, 'Liner', NULL, '720.00', 100, 8, 10),
(386, 'Liner', NULL, '700.00', 100, 9, 10),
(387, 'Liner', NULL, '800.00', 100, 10, 10),
(388, 'Liner', NULL, '760.00', 100, 11, 10),
(389, 'Liner', NULL, '740.00', 100, 12, 10),
(390, 'Liner', NULL, '800.00', 100, 13, 10),
(391, 'Liner', NULL, '700.00', 100, 14, 10),
(392, 'Liner', NULL, '640.00', 100, 15, 10),
(393, 'Liner', NULL, '600.00', 100, 16, 10),
(394, 'Liner', NULL, '500.00', 100, 17, 10),
(395, 'Liner', NULL, '450.00', 100, 18, 10),
(396, 'Liner', NULL, '400.00', 100, 19, 10),
(397, 'Liner', NULL, '300.00', 100, 20, 10),
(398, 'Liner', NULL, '1100.00', 100, 21, 10),
(399, 'Liner', NULL, '1000.00', 100, 22, 10),
(400, 'Liner', NULL, '400.00', 100, 23, 10),
(401, 'Liner', NULL, '700.00', 100, 24, 10),
(402, 'Liner', NULL, '700.00', 100, 25, 10),
(403, 'Liner', NULL, '600.00', 100, 26, 10),
(404, 'Liner', NULL, '550.00', 100, 27, 10),
(405, 'Liner', NULL, '880.00', 100, 28, 10),
(406, 'Liner', NULL, '630.00', 100, 29, 10),
(407, 'Overhauling Gasket', NULL, '750.00', 100, 1, 10),
(408, 'Overhauling Gasket', NULL, '890.00', 100, 2, 10),
(409, 'Overhauling Gasket', NULL, '670.00', 100, 3, 10),
(410, 'Overhauling Gasket', NULL, '780.00', 100, 4, 10),
(411, 'Overhauling Gasket', NULL, '800.00', 100, 5, 10),
(412, 'Overhauling Gasket', NULL, '600.00', 100, 6, 10),
(413, 'Overhauling Gasket', NULL, '600.00', 100, 7, 10),
(414, 'Overhauling Gasket', NULL, '900.00', 100, 8, 10),
(415, 'Overhauling Gasket', NULL, '860.00', 100, 9, 10),
(416, 'Overhauling Gasket', NULL, '700.00', 100, 10, 10),
(417, 'Overhauling Gasket', NULL, '860.00', 100, 11, 10),
(418, 'Overhauling Gasket', NULL, '750.00', 100, 12, 10),
(419, 'Overhauling Gasket', NULL, '620.00', 100, 13, 10),
(420, 'Overhauling Gasket', NULL, '830.00', 100, 14, 10),
(421, 'Overhauling Gasket', NULL, '780.00', 100, 15, 10),
(422, 'Overhauling Gasket', NULL, '900.00', 100, 16, 10),
(423, 'Overhauling Gasket', NULL, '800.00', 100, 17, 10),
(424, 'Overhauling Gasket', NULL, '700.00', 100, 18, 10),
(425, 'Overhauling Gasket', NULL, '740.00', 100, 19, 10),
(426, 'Overhauling Gasket', NULL, '680.00', 100, 20, 10),
(427, 'Overhauling Gasket', NULL, '900.00', 100, 21, 10),
(428, 'Overhauling Gasket', NULL, '850.00', 100, 22, 10),
(429, 'Overhauling Gasket', NULL, '850.00', 100, 23, 10),
(430, 'Overhauling Gasket', NULL, '659.00', 100, 24, 10),
(431, 'Overhauling Gasket', NULL, '750.00', 100, 25, 10),
(432, 'Overhauling Gasket', NULL, '899.00', 100, 26, 10),
(433, 'Overhauling Gasket', NULL, '850.75', 100, 27, 10),
(434, 'Overhauling Gasket', NULL, '1000.00', 100, 28, 10),
(435, 'Overhauling Gasket', NULL, '900.00', 100, 29, 10),
(436, 'Piston Ring', '0.5', '776.00', 100, 1, 10),
(437, 'Piston Ring', '0.5', '776.00', 100, 2, 10),
(438, 'Piston Ring', '0.5', '776.00', 100, 3, 10),
(439, 'Piston Ring', '0.5', '776.00', 100, 4, 10),
(440, 'Piston Ring', '0.5', '776.00', 100, 5, 10),
(441, 'Piston Ring', '0.5', '776.00', 100, 6, 10),
(442, 'Piston Ring', '0.5', NULL, 100, 7, 10),
(443, 'Piston Ring', '0.5', NULL, 100, 8, 10),
(444, 'Piston Ring', '0.5', NULL, 100, 9, 10),
(445, 'Piston Ring', '0.5', '0.00', NULL, 10, 10),
(446, 'Piston Ring', '0.5', NULL, NULL, 11, 10),
(447, 'Piston Ring', '0.5', NULL, NULL, 12, 10),
(448, 'Piston Ring', '0.5', NULL, NULL, 13, 10),
(449, 'Piston Ring', '0.5', NULL, NULL, 14, 10),
(450, 'Piston Ring', '0.5', NULL, NULL, 16, 10),
(451, 'Piston Ring', '0.5', NULL, NULL, 17, 10),
(452, 'Piston Ring', '0.5', NULL, NULL, 18, 10),
(453, 'Piston Ring', '0.5', NULL, NULL, 19, 10),
(454, 'Piston Ring', '0.5', NULL, NULL, 20, 10),
(455, 'Piston Ring', '0.5', NULL, NULL, 21, 10),
(456, 'Piston Ring', '0.5', NULL, NULL, 22, 10),
(457, 'Piston Ring', '0.5', NULL, NULL, 23, 10),
(458, 'Piston Ring', '0.5', NULL, NULL, 24, 10),
(459, 'Piston Ring', '0.5', NULL, NULL, 25, 10),
(460, 'Piston Ring', '0.5', NULL, NULL, 26, 10),
(461, 'Piston Ring', '0.5', NULL, NULL, 27, 10),
(462, 'Piston Ring', '0.5', NULL, NULL, 28, 10),
(463, 'Piston Ring', '0.5', NULL, NULL, 29, 10),
(464, 'Piston Ring', '0.75', NULL, NULL, 1, 10),
(465, 'Piston Ring', '0.75', NULL, NULL, 2, 10),
(466, 'Piston Ring', '0.75', NULL, NULL, 3, 10),
(467, 'Piston Ring', '0.75', NULL, NULL, 4, 10),
(468, 'Piston Ring', '0.75', NULL, NULL, 5, 10),
(469, 'Piston Ring', '0.75', NULL, NULL, 6, 10),
(470, 'Piston Ring', '0.75', NULL, NULL, 7, 10),
(471, 'Piston Ring', '0.75', NULL, NULL, 8, 10),
(472, 'Piston Ring', '0.75', NULL, NULL, 9, 10),
(473, 'Piston Ring', '0.75', NULL, NULL, 10, 10),
(474, 'Piston Ring', '0.75', NULL, NULL, 11, 10),
(475, 'Piston Ring', '0.75', NULL, NULL, 12, 10),
(476, 'Piston Ring', '0.75', NULL, NULL, 13, 10),
(477, 'Piston Ring', '0.75', NULL, NULL, 14, 10),
(478, 'Piston Ring', '0.75', NULL, NULL, 15, 10),
(479, 'Piston Ring', '0.75', NULL, NULL, 16, 10),
(480, 'Piston Ring', '0.75', NULL, NULL, 17, 10),
(481, 'Piston Ring', '0.75', NULL, NULL, 18, 10),
(482, 'Piston Ring', '0.75', NULL, NULL, 19, 10),
(483, 'Piston Ring', '0.75', NULL, NULL, 20, 10),
(484, 'Piston Ring', '0.75', NULL, NULL, 21, 10),
(485, 'Piston Ring', '0.75', NULL, NULL, 22, 10),
(486, 'Piston Ring', '0.75', NULL, NULL, 23, 10),
(487, 'Piston Ring', '0.75', NULL, NULL, 24, 10),
(488, 'Piston Ring', '0.75', NULL, NULL, 25, 10),
(489, 'Piston Ring', '0.75', NULL, NULL, 26, 10),
(490, 'Piston Ring', '0.75', NULL, NULL, 27, 10),
(491, 'Piston Ring', '0.75', NULL, NULL, 28, 10),
(492, 'Piston Ring', '0.75', NULL, NULL, 29, 10),
(493, 'Piston Ring', 'STD', NULL, NULL, 1, 10),
(494, 'Piston Ring', 'STD', NULL, NULL, 2, 10),
(495, 'Piston Ring', 'STD', NULL, NULL, 3, 10),
(496, 'Piston Ring', 'STD', NULL, NULL, 4, 10),
(497, 'Piston Ring', 'STD', NULL, NULL, 5, 10),
(498, 'Piston Ring', 'STD', NULL, NULL, 6, 10),
(499, 'Piston Ring', 'STD', NULL, NULL, 7, 10),
(500, 'Piston Ring', 'STD', NULL, NULL, 8, 10),
(501, 'Piston Ring', 'STD', NULL, NULL, 9, 10),
(502, 'Piston Ring', 'STD', NULL, NULL, 10, 10),
(503, 'Piston Ring', 'STD', NULL, NULL, 11, 10),
(504, 'Piston Ring', 'STD', NULL, NULL, 12, 10),
(505, 'Piston Ring', 'STD', NULL, NULL, 13, 10),
(506, 'Piston Ring', 'STD', NULL, NULL, 14, 10),
(507, 'Piston Ring', 'STD', NULL, NULL, 15, 10),
(508, 'Piston Ring', 'STD', NULL, NULL, 16, 10),
(509, 'Piston Ring', 'STD', NULL, NULL, 17, 10),
(510, 'Piston Ring', 'STD', NULL, NULL, 18, 10),
(511, 'Piston Ring', 'STD', NULL, NULL, 19, 10),
(512, 'Piston Ring', 'STD', NULL, NULL, 20, 10),
(513, 'Piston Ring', 'STD', NULL, NULL, 21, 10),
(514, 'Piston Ring', 'STD', NULL, NULL, 22, 10),
(515, 'Piston Ring', 'STD', NULL, NULL, 23, 10),
(516, 'Piston Ring', 'STD', NULL, NULL, 24, 10),
(517, 'Piston Ring', 'STD', NULL, NULL, 25, 10),
(518, 'Piston Ring', 'STD', NULL, NULL, 26, 10),
(519, 'Piston Ring', 'STD', NULL, NULL, 27, 10),
(520, 'Piston Ring', 'STD', NULL, NULL, 28, 10),
(521, 'Piston Ring', 'STD', NULL, NULL, 29, 10),
(522, 'Main Bearing', '0.5', NULL, NULL, 1, 10),
(523, 'Main Bearing', '0.5', NULL, NULL, 2, 10),
(524, 'Main Bearing', '0.5', NULL, NULL, 3, 10),
(525, 'Main Bearing', '0.5', NULL, NULL, 4, 10),
(526, 'Main Bearing', '0.5', NULL, NULL, 5, 10),
(527, 'Main Bearing', '0.5', NULL, NULL, 6, 10),
(528, 'Main Bearing', '0.5', NULL, NULL, 7, 10),
(529, 'Main Bearing', '0.5', NULL, NULL, 8, 10),
(530, 'Main Bearing', '0.5', NULL, NULL, 9, 10),
(531, 'Main Bearing', '0.5', NULL, NULL, 10, 10),
(532, 'Main Bearing', '0.5', NULL, NULL, 11, 10),
(533, 'Main Bearing', '0.5', NULL, NULL, 12, 10),
(534, 'Main Bearing', '0.5', NULL, NULL, 13, 10),
(535, 'Main Bearing', '0.5', NULL, NULL, 14, 10),
(536, 'Main Bearing', '0.5', NULL, NULL, 15, 10),
(537, 'Main Bearing', '0.5', NULL, NULL, 16, 10),
(538, 'Main Bearing', '0.5', NULL, NULL, 17, 10),
(539, 'Main Bearing', '0.5', NULL, NULL, 18, 10),
(540, 'Main Bearing', '0.5', NULL, NULL, 19, 10),
(541, 'Main Bearing', '0.5', NULL, NULL, 20, 10),
(542, 'Main Bearing', '0.5', NULL, NULL, 21, 10),
(543, 'Main Bearing', '0.5', NULL, NULL, 22, 10),
(544, 'Main Bearing', '0.5', NULL, NULL, 23, 10),
(545, 'Main Bearing', '0.5', NULL, NULL, 24, 10),
(546, 'Main Bearing', '0.5', NULL, NULL, 25, 10),
(547, 'Main Bearing', '0.5', NULL, NULL, 26, 10),
(548, 'Main Bearing', '0.5', NULL, NULL, 27, 10),
(549, 'Main Bearing', '0.5', NULL, NULL, 28, 10),
(550, 'Main Bearing', '0.5', NULL, NULL, 29, 10),
(551, 'Main Bearing', '0.75', NULL, NULL, 1, 10),
(552, 'Main Bearing', '0.75', NULL, NULL, 2, 10),
(553, 'Main Bearing', '0.75', NULL, NULL, 3, 10),
(554, 'Main Bearing', '0.75', NULL, NULL, 4, 10),
(555, 'Main Bearing', '0.75', NULL, NULL, 5, 10),
(556, 'Main Bearing', '0.75', NULL, NULL, 6, 10),
(557, 'Main Bearing', '0.75', NULL, NULL, 7, 10),
(558, 'Main Bearing', '0.75', NULL, NULL, 8, 10),
(559, 'Main Bearing', '0.75', NULL, NULL, 9, 10),
(560, 'Main Bearing', '0.75', NULL, NULL, 10, 10),
(561, 'Main Bearing', '0.75', NULL, NULL, 11, 10),
(562, 'Main Bearing', '0.75', NULL, NULL, 12, 10),
(563, 'Main Bearing', '0.75', NULL, NULL, 13, 10),
(564, 'Main Bearing', '0.75', NULL, NULL, 14, 10),
(565, 'Main Bearing', '0.75', NULL, NULL, 15, 10),
(566, 'Main Bearing', '0.75', NULL, NULL, 16, 10),
(567, 'Main Bearing', '0.75', NULL, NULL, 17, 10),
(568, 'Main Bearing', '0.75', NULL, NULL, 18, 10),
(569, 'Main Bearing', '0.75', NULL, NULL, 19, 10),
(570, 'Main Bearing', '0.75', NULL, NULL, 20, 10),
(571, 'Main Bearing', '0.75', NULL, NULL, 21, 10),
(572, 'Main Bearing', '0.75', NULL, NULL, 22, 10),
(573, 'Main Bearing', '0.75', NULL, NULL, 23, 10),
(574, 'Main Bearing', '0.75', NULL, NULL, 24, 10),
(575, 'Main Bearing', '0.75', NULL, NULL, 25, 10),
(576, 'Main Bearing', '0.75', NULL, NULL, 26, 10),
(577, 'Main Bearing', '0.75', NULL, NULL, 27, 10),
(578, 'Main Bearing', '0.75', NULL, NULL, 28, 10),
(579, 'Main Bearing', '0.75', NULL, NULL, 29, 10),
(580, 'Main Bearing', 'STD', NULL, NULL, 1, 10),
(581, 'Main Bearing', 'STD', NULL, NULL, 2, 10),
(582, 'Main Bearing', 'STD', NULL, NULL, 3, 10),
(583, 'Main Bearing', 'STD', NULL, NULL, 4, 10),
(584, 'Main Bearing', 'STD', NULL, NULL, 5, 10),
(585, 'Main Bearing', 'STD', NULL, NULL, 6, 10),
(586, 'Main Bearing', 'STD', NULL, NULL, 7, 10),
(587, 'Main Bearing', 'STD', NULL, NULL, 8, 10),
(588, 'Main Bearing', 'STD', NULL, NULL, 9, 10),
(589, 'Main Bearing', 'STD', NULL, NULL, 10, 10),
(590, 'Main Bearing', 'STD', NULL, NULL, 11, 10),
(591, 'Main Bearing', 'STD', NULL, NULL, 12, 10),
(592, 'Main Bearing', 'STD', NULL, NULL, 13, 10),
(593, 'Main Bearing', 'STD', NULL, NULL, 14, 10),
(594, 'Main Bearing', 'STD', NULL, NULL, 15, 10),
(595, 'Main Bearing', 'STD', NULL, NULL, 16, 10),
(596, 'Main Bearing', 'STD', NULL, NULL, 17, 10),
(597, 'Main Bearing', 'STD', NULL, NULL, 18, 10),
(598, 'Main Bearing', 'STD', NULL, NULL, 19, 10),
(599, 'Main Bearing', 'STD', NULL, NULL, 20, 10),
(600, 'Main Bearing', 'STD', NULL, NULL, 21, 10),
(601, 'Main Bearing', 'STD', NULL, NULL, 22, 10),
(602, 'Main Bearing', 'STD', NULL, NULL, 23, 10),
(603, 'Main Bearing', 'STD', NULL, NULL, 24, 10),
(604, 'Main Bearing', 'STD', NULL, NULL, 25, 10),
(605, 'Main Bearing', 'STD', NULL, NULL, 26, 10),
(606, 'Main Bearing', 'STD', NULL, NULL, 27, 10),
(607, 'Main Bearing', 'STD', NULL, NULL, 28, 10),
(608, 'Main Bearing', 'STD', NULL, NULL, 29, 10),
(609, 'Connecting Rod Bearing', '0.5', NULL, NULL, 1, 10),
(610, 'Connecting Rod Bearing', '0.5', NULL, NULL, 2, 10),
(611, 'Connecting Rod Bearing', '0.5', NULL, NULL, 3, 10),
(612, 'Connecting Rod Bearing', '0.5', NULL, NULL, 4, 10),
(613, 'Connecting Rod Bearing', '0.5', NULL, NULL, 5, 10),
(614, 'Connecting Rod Bearing', '0.5', NULL, NULL, 6, 10),
(615, 'Connecting Rod Bearing', '0.5', NULL, NULL, 7, 10),
(616, 'Connecting Rod Bearing', '0.5', NULL, NULL, 8, 10),
(617, 'Connecting Rod Bearing', '0.5', NULL, NULL, 9, 10),
(618, 'Connecting Rod Bearing', '0.5', NULL, NULL, 10, 10),
(619, 'Connecting Rod Bearing', '0.5', NULL, NULL, 11, 10),
(620, 'Connecting Rod Bearing', '0.5', NULL, NULL, 12, 10),
(621, 'Connecting Rod Bearing', '0.5', NULL, NULL, 13, 10),
(622, 'Connecting Rod Bearing', '0.5', NULL, NULL, 14, 10),
(623, 'Connecting Rod Bearing', '0.5', NULL, NULL, 15, 10),
(624, 'Connecting Rod Bearing', '0.5', NULL, NULL, 16, 10),
(625, 'Connecting Rod Bearing', '0.5', NULL, NULL, 17, 10),
(626, 'Connecting Rod Bearing', '0.5', NULL, NULL, 18, 10),
(627, 'Connecting Rod Bearing', '0.5', NULL, NULL, 19, 10),
(628, 'Connecting Rod Bearing', '0.5', NULL, NULL, 20, 10),
(629, 'Connecting Rod Bearing', '0.5', NULL, NULL, 21, 10),
(630, 'Connecting Rod Bearing', '0.5', NULL, NULL, 22, 10),
(631, 'Connecting Rod Bearing', '0.5', NULL, NULL, 23, 10),
(632, 'Connecting Rod Bearing', '0.5', NULL, NULL, 24, 10),
(633, 'Connecting Rod Bearing', '0.5', NULL, NULL, 25, 10),
(634, 'Connecting Rod Bearing', '0.5', NULL, NULL, 26, 10),
(635, 'Connecting Rod Bearing', '0.5', NULL, NULL, 27, 10),
(636, 'Connecting Rod Bearing', '0.5', NULL, NULL, 28, 10),
(637, 'Connecting Rod Bearing', '0.5', NULL, NULL, 29, 10),
(638, 'Connecting Rod Bearing', '0.75', NULL, NULL, 1, 10),
(639, 'Connecting Rod Bearing', '0.75', NULL, NULL, 2, 10),
(640, 'Connecting Rod Bearing', '0.75', NULL, NULL, 3, 10),
(641, 'Connecting Rod Bearing', '0.75', NULL, NULL, 4, 10),
(642, 'Connecting Rod Bearing', '0.75', NULL, NULL, 5, 10),
(643, 'Connecting Rod Bearing', '0.75', NULL, NULL, 6, 10),
(644, 'Connecting Rod Bearing', '0.75', NULL, NULL, 7, 10),
(645, 'Connecting Rod Bearing', '0.75', NULL, NULL, 8, 10),
(646, 'Connecting Rod Bearing', '0.75', NULL, NULL, 9, 10),
(647, 'Connecting Rod Bearing', '0.75', NULL, NULL, 10, 10),
(648, 'Connecting Rod Bearing', '0.75', NULL, NULL, 11, 10),
(649, 'Connecting Rod Bearing', '0.75', NULL, NULL, 12, 10),
(650, 'Connecting Rod Bearing', '0.75', NULL, NULL, 13, 10),
(651, 'Connecting Rod Bearing', '0.75', NULL, NULL, 14, 10),
(652, 'Connecting Rod Bearing', '0.75', NULL, NULL, 15, 10),
(653, 'Connecting Rod Bearing', '0.75', NULL, NULL, 16, 10),
(654, 'Connecting Rod Bearing', '0.75', NULL, NULL, 17, 10),
(655, 'Connecting Rod Bearing', '0.75', NULL, NULL, 18, 10),
(656, 'Connecting Rod Bearing', '0.75', NULL, NULL, 19, 10),
(657, 'Connecting Rod Bearing', '0.75', NULL, NULL, 20, 10),
(658, 'Connecting Rod Bearing', '0.75', NULL, NULL, 21, 10),
(659, 'Connecting Rod Bearing', '0.75', NULL, NULL, 22, 10),
(660, 'Connecting Rod Bearing', '0.75', NULL, NULL, 23, 10),
(661, 'Connecting Rod Bearing', '0.75', NULL, NULL, 24, 10),
(662, 'Connecting Rod Bearing', '0.75', NULL, NULL, 25, 10),
(663, 'Connecting Rod Bearing', '0.75', NULL, NULL, 26, 10),
(664, 'Connecting Rod Bearing', '0.75', NULL, NULL, 27, 10),
(665, 'Connecting Rod Bearing', '0.75', NULL, NULL, 28, 10),
(666, 'Connecting Rod Bearing', '0.75', NULL, NULL, 29, 10),
(667, 'Connecting Rod Bearing', 'STD', NULL, NULL, 1, 10),
(668, 'Connecting Rod Bearing', 'STD', NULL, NULL, 2, 10),
(669, 'Connecting Rod Bearing', 'STD', NULL, NULL, 3, 10),
(670, 'Connecting Rod Bearing', 'STD', NULL, NULL, 4, 10),
(671, 'Connecting Rod Bearing', 'STD', NULL, NULL, 5, 10),
(672, 'Connecting Rod Bearing', 'STD', NULL, NULL, 6, 10),
(673, 'Connecting Rod Bearing', 'STD', NULL, NULL, 7, 10),
(674, 'Connecting Rod Bearing', 'STD', NULL, NULL, 8, 10),
(675, 'Connecting Rod Bearing', 'STD', NULL, NULL, 9, 10),
(676, 'Connecting Rod Bearing', 'STD', NULL, NULL, 10, 10),
(677, 'Connecting Rod Bearing', 'STD', NULL, NULL, 11, 10),
(678, 'Connecting Rod Bearing', 'STD', NULL, NULL, 12, 10),
(679, 'Connecting Rod Bearing', 'STD', NULL, NULL, 13, 10),
(680, 'Connecting Rod Bearing', 'STD', NULL, NULL, 14, 10),
(681, 'Connecting Rod Bearing', 'STD', NULL, NULL, 15, 10),
(682, 'Connecting Rod Bearing', 'STD', NULL, NULL, 16, 10),
(683, 'Connecting Rod Bearing', 'STD', NULL, NULL, 17, 10),
(684, 'Connecting Rod Bearing', 'STD', NULL, NULL, 18, 10),
(685, 'Connecting Rod Bearing', 'STD', NULL, NULL, 19, 10),
(686, 'Connecting Rod Bearing', 'STD', NULL, NULL, 20, 10),
(687, 'Connecting Rod Bearing', 'STD', NULL, NULL, 21, 10),
(688, 'Connecting Rod Bearing', 'STD', NULL, NULL, 22, 10),
(689, 'Connecting Rod Bearing', 'STD', NULL, NULL, 23, 10),
(690, 'Connecting Rod Bearing', 'STD', NULL, NULL, 24, 10),
(691, 'Connecting Rod Bearing', 'STD', NULL, NULL, 25, 10),
(692, 'Connecting Rod Bearing', 'STD', NULL, NULL, 26, 10),
(693, 'Connecting Rod Bearing', 'STD', NULL, NULL, 27, 10),
(694, 'Connecting Rod Bearing', 'STD', NULL, NULL, 28, 10),
(695, 'Connecting Rod Bearing', 'STD', NULL, NULL, 29, 10),
(696, 'Bearing', NULL, NULL, NULL, 30, 10),
(697, 'Bearing', NULL, NULL, NULL, 31, 10),
(698, 'Bearing', NULL, NULL, NULL, 32, 10),
(699, 'Bearing', NULL, NULL, NULL, 33, 10),
(700, 'Bearing', NULL, NULL, NULL, 34, 10),
(701, 'Bearing', NULL, NULL, NULL, 35, 10),
(702, 'Bearing', NULL, NULL, NULL, 36, 10),
(703, 'Bearing', NULL, NULL, NULL, 37, 10),
(704, 'Bearing', NULL, NULL, NULL, 38, 10),
(705, 'Bearing', NULL, NULL, NULL, 39, 10),
(706, 'Bearing', NULL, NULL, NULL, 40, 10),
(707, 'Bearing', NULL, NULL, NULL, 41, 10),
(708, 'Bearing', NULL, NULL, NULL, 42, 10),
(709, 'Bearing', NULL, NULL, NULL, 43, 10),
(710, 'Bearing', NULL, NULL, NULL, NULL, 10),
(711, 'Bearing', NULL, NULL, NULL, NULL, 10),
(712, 'Bearing', NULL, NULL, NULL, NULL, 10),
(713, 'Bearing', NULL, NULL, NULL, NULL, 10),
(714, 'Bearing', NULL, NULL, NULL, NULL, 10),
(715, 'Bearing', NULL, NULL, NULL, NULL, 10),
(716, 'Bearing', NULL, NULL, NULL, NULL, 10),
(717, 'Bearing', NULL, NULL, NULL, NULL, 10),
(718, 'Bearing', NULL, NULL, NULL, NULL, 10),
(719, 'Bearing', NULL, NULL, NULL, NULL, 10),
(720, 'Bearing', NULL, NULL, NULL, NULL, 10),
(721, 'Bearing', NULL, NULL, NULL, NULL, 10),
(722, 'Bearing', NULL, NULL, NULL, NULL, 10),
(723, 'Bearing', NULL, NULL, NULL, NULL, 10),
(724, 'Bearing', NULL, NULL, NULL, NULL, 10),
(725, 'Bearing', NULL, NULL, NULL, NULL, 10),
(726, 'Bearing', NULL, NULL, NULL, NULL, 10),
(727, 'Bearing', NULL, NULL, NULL, NULL, 10),
(728, 'Bearing', NULL, NULL, NULL, NULL, 10),
(729, 'Bearing', NULL, NULL, NULL, NULL, 10),
(730, 'Bearing', NULL, NULL, NULL, NULL, 10),
(731, 'Bearing', NULL, NULL, NULL, NULL, 10),
(732, 'Bearing', NULL, NULL, NULL, NULL, 10),
(733, 'Bearing', NULL, NULL, NULL, NULL, 10),
(734, 'Bearing', NULL, NULL, NULL, NULL, 10),
(735, 'Bearing', NULL, NULL, NULL, NULL, 10),
(736, 'Bearing', NULL, NULL, NULL, NULL, 10),
(737, 'Bearing', NULL, NULL, NULL, NULL, 10),
(738, 'Bearing', NULL, NULL, NULL, NULL, 10),
(739, 'Bearing', NULL, NULL, NULL, NULL, 10),
(740, 'Bearing', NULL, NULL, NULL, NULL, 10),
(741, 'Bearing', NULL, NULL, NULL, NULL, 10),
(742, 'Bearing', NULL, NULL, NULL, NULL, 10),
(743, 'Bearing', NULL, NULL, NULL, NULL, 10),
(744, 'Bearing', NULL, NULL, NULL, NULL, 10),
(745, 'Bearing', NULL, NULL, NULL, NULL, 10),
(746, 'Bearing', NULL, NULL, NULL, NULL, 10),
(747, 'Bearing', NULL, NULL, NULL, NULL, 10),
(748, 'Bearing', NULL, NULL, NULL, NULL, 10),
(749, 'Bearing', NULL, NULL, NULL, NULL, 10),
(750, 'Bearing', NULL, NULL, NULL, NULL, 10),
(751, 'Bearing', NULL, NULL, NULL, NULL, 10),
(752, 'Bearing', NULL, NULL, NULL, NULL, 10),
(753, 'Bearing', NULL, NULL, NULL, NULL, 10),
(754, 'Bearing', NULL, NULL, NULL, NULL, 10),
(755, 'Bearing', NULL, NULL, NULL, NULL, 10),
(756, 'Bearing', NULL, NULL, NULL, NULL, 10),
(757, 'Bearing', NULL, NULL, NULL, NULL, 10),
(758, 'Bearing', NULL, NULL, NULL, NULL, 10),
(759, 'Bearing', NULL, NULL, NULL, NULL, 10),
(760, 'Bearing', NULL, NULL, NULL, NULL, 10),
(761, 'Bearing', NULL, NULL, NULL, NULL, 10),
(762, 'Bearing', NULL, NULL, NULL, NULL, 10),
(763, 'Bearing', NULL, NULL, NULL, NULL, 10),
(764, 'Bearing', NULL, NULL, NULL, NULL, 10),
(765, 'Bearing', NULL, NULL, NULL, NULL, 10),
(767, 'Bearing', NULL, NULL, NULL, NULL, 10),
(768, 'Bearing', NULL, NULL, NULL, NULL, 10),
(769, 'Bearing', NULL, NULL, NULL, NULL, 10),
(770, 'Bearing', NULL, NULL, NULL, NULL, 10),
(771, 'Bearing', NULL, NULL, NULL, NULL, 10),
(772, 'Bearing', NULL, NULL, NULL, NULL, 10),
(773, 'Bearing', NULL, NULL, NULL, NULL, 10),
(774, 'Bearing', NULL, NULL, NULL, NULL, 10),
(775, 'Bearing', NULL, NULL, NULL, NULL, 10),
(776, 'Bearing', NULL, NULL, NULL, NULL, 10),
(777, 'Bearing', NULL, NULL, NULL, NULL, 10),
(778, 'Bearing', NULL, NULL, NULL, NULL, 10),
(779, 'Bearing', NULL, NULL, NULL, NULL, 10),
(780, 'Bearing', NULL, NULL, NULL, NULL, 10),
(781, 'Bearing', NULL, NULL, NULL, NULL, 10),
(782, 'Bearing', NULL, NULL, NULL, NULL, 10),
(783, 'Bearing', NULL, NULL, NULL, NULL, 10),
(784, 'Bearing', NULL, NULL, NULL, NULL, 10),
(785, 'Bearing', NULL, NULL, NULL, NULL, 10),
(786, '', NULL, NULL, NULL, NULL, 10),
(787, '', NULL, NULL, NULL, NULL, 10),
(788, '', NULL, NULL, NULL, NULL, 10),
(789, '', NULL, NULL, NULL, NULL, 10),
(790, '', NULL, NULL, NULL, NULL, 10),
(791, '', NULL, NULL, NULL, NULL, 10),
(792, '', NULL, NULL, NULL, NULL, 10),
(793, '', NULL, NULL, NULL, NULL, 10),
(794, '', NULL, NULL, NULL, NULL, 10),
(795, '', NULL, NULL, NULL, NULL, 10),
(796, '', NULL, NULL, NULL, NULL, 10),
(797, '', NULL, NULL, NULL, NULL, 10),
(798, '', NULL, NULL, NULL, NULL, 10),
(799, '', NULL, NULL, NULL, NULL, 10),
(800, '', NULL, NULL, NULL, NULL, 10),
(801, '', NULL, NULL, NULL, NULL, 10),
(802, '', NULL, NULL, NULL, NULL, 10),
(803, '', NULL, NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `itemlogs`
--

CREATE TABLE IF NOT EXISTS `itemlogs` (
  `itemlogid` int(15) NOT NULL AUTO_INCREMENT,
  `itemprice` decimal(11,2) DEFAULT NULL,
  `itemquantity` int(5) DEFAULT NULL,
  `saleid` int(15) DEFAULT NULL,
  `joborderid` int(15) DEFAULT NULL,
  `inventoryid` int(15) DEFAULT NULL,
  PRIMARY KEY (`itemlogid`),
  KEY `fk_itemlogs_saleid_idx` (`saleid`),
  KEY `fk_itemlogs_joborderid_idx` (`joborderid`),
  KEY `fk_itemlogs_inventoryid_idx` (`inventoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `joborders`
--

CREATE TABLE IF NOT EXISTS `joborders` (
  `joborderid` int(15) NOT NULL AUTO_INCREMENT,
  `problem` varchar(500) DEFAULT NULL,
  `datebrought` date DEFAULT NULL,
  `datestarted` date DEFAULT NULL,
  `datefinished` date DEFAULT NULL,
  `dateclaimed` date DEFAULT NULL,
  `downpayment` decimal(11,2) DEFAULT NULL,
  `joprice` decimal(11,2) DEFAULT NULL,
  `jostatus` enum('Pending','Done') DEFAULT NULL,
  `preparedby` varchar(100) DEFAULT NULL,
  `modelno` varchar(50) DEFAULT NULL,
  `engineno` varchar(50) DEFAULT NULL,
  `supervisor` varchar(100) DEFAULT NULL,
  `jotype` enum('EngRecon','Fabrication','EngReconFab') DEFAULT NULL,
  `clientid` int(15) DEFAULT NULL,
  PRIMARY KEY (`joborderid`),
  KEY `fk_joborders_clientid_idx` (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201510157 ;

--
-- Dumping data for table `joborders`
--

INSERT INTO `joborders` (`joborderid`, `problem`, `datebrought`, `datestarted`, `datefinished`, `dateclaimed`, `downpayment`, `joprice`, `jostatus`, `preparedby`, `modelno`, `engineno`, `supervisor`, `jotype`, `clientid`) VALUES
(1, 'P1', '2015-10-10', NULL, NULL, NULL, '500.00', '1150.00', 'Pending', 'Noryza Conje', '8', '2392932', 'Benedict Tiong', 'EngRecon', 1),
(2, 'P2', '2015-10-10', NULL, NULL, NULL, '500.00', '600.00', 'Pending', 'Noryza Conje', '6', '343434', 'Brenwin Tiong', 'EngRecon', 6),
(3, 'P1', '2015-10-10', NULL, NULL, NULL, '500.00', '500.00', 'Pending', 'Noryza Conje', '15', '4344343434', 'Benedict Tiong', 'EngRecon', 6),
(4, 'P2', '2015-10-11', NULL, NULL, NULL, '500.00', '2300.00', 'Pending', 'Mikee Roces', '14', '348736478', 'Benedict Tiong', 'EngRecon', 3),
(5, '', '2015-10-11', '2015-10-11', NULL, NULL, '500.00', '500.00', 'Pending', 'Mikee Roces', NULL, NULL, 'Brenwin Tiong', 'Fabrication', 1),
(201510155, 'Problem', '2015-10-15', NULL, NULL, NULL, '500.00', '1600.00', 'Pending', 'Roces, Mikee', '16', '3.2734678236487E+15', 'Tiong, Benedict', 'EngRecon', 3),
(201510156, 'Problem', '2015-10-15', NULL, NULL, NULL, '500.00', '2000.00', 'Pending', 'Roces, Mikee', '18', '323746287346', 'Tiong, Brenwin', 'EngRecon', 5);

-- --------------------------------------------------------

--
-- Table structure for table `joemployees`
--

CREATE TABLE IF NOT EXISTS `joemployees` (
  `joborderid` int(15) NOT NULL,
  `employeeid` int(15) NOT NULL,
  PRIMARY KEY (`joborderid`,`employeeid`),
  KEY `fk_joemployees_employeeid_idx` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joemployees`
--

INSERT INTO `joemployees` (`joborderid`, `employeeid`) VALUES
(1, 1),
(3, 1),
(4, 1),
(201510156, 1),
(4, 4),
(201510155, 4),
(2, 5),
(201510155, 5);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `modelid` int(15) NOT NULL AUTO_INCREMENT,
  `modelno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`modelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`modelid`, `modelno`) VALUES
(1, '4BA1'),
(2, '4BB'),
(3, '3L/2L'),
(4, '2C'),
(5, 'MAZDA S2'),
(6, 'MAZDA R2'),
(7, '4DR5'),
(8, '4M40'),
(9, '4D56'),
(10, '4D30'),
(11, '4HF1'),
(12, '10PD'),
(13, '6D14'),
(14, '6BD1'),
(15, '6BG1'),
(16, '4D55'),
(17, '4D56'),
(18, '4D32'),
(19, '4HE1'),
(20, '4D35'),
(21, '4HG1'),
(22, '4HJ1'),
(23, 'PREGIO 3.0'),
(24, '7K'),
(25, '4K/5K'),
(26, '5L'),
(27, '2E'),
(28, '4G32'),
(29, '4G33'),
(30, '08-R2 AXLE LOCK FBJ'),
(31, '129'),
(32, '336 DG154614  (15ID * 46OD *14T'),
(33, '339'),
(34, '346 2RS'),
(35, '382'),
(36, '394'),
(37, '408'),
(38, '453'),
(39, '455'),
(40, '635'),
(41, '639'),
(42, '686ZZ'),
(43, '1201'),
(44, '1202'),
(45, '1205 KOYO'),
(46, '1207'),
(47, '1208'),
(48, '12648/10 timken'),
(49, '2201'),
(50, '2309 SLEEVE'),
(51, '2585'),
(52, '2872'),
(53, '30311 KOYO'),
(54, '30311 D KOYO'),
(55, '3720'),
(56, '3775'),
(57, '3782/20'),
(58, '3877 TIMKEN'),
(59, '50441'),
(60, '5107'),
(61, '5206 (OR3206) IJK-JAP'),
(62, '5210'),
(63, '5210'),
(64, '5305'),
(65, '5309'),
(66, '6314 2RS KOYO'),
(67, '6314 ZNR KOYO'),
(68, '6316'),
(69, '6316 SKF'),
(70, '6386'),
(71, '6403'),
(72, '6800'),
(73, '6810'),
(74, '6901 LL NTN'),
(75, '6901 2RS KSM'),
(76, '6902'),
(77, '6915'),
(78, '6924'),
(79, '7002'),
(80, '7018'),
(81, '7205'),
(82, '7207'),
(83, '7407'),
(84, '11162'),
(85, '11300'),
(86, '14276'),
(87, '14585'),
(88, '15117'),
(89, '15245'),
(90, '15520'),
(91, '15578'),
(92, '15578'),
(93, '15590 TIMKEN'),
(94, '16001'),
(95, '16002'),
(96, '16150'),
(97, '16284'),
(98, '18620'),
(99, '18685'),
(100, '22210'),
(101, '22215RHRW33C3M KOYO'),
(102, '22303'),
(103, '22310'),
(104, '22313'),
(105, '22324'),
(106, '22523'),
(107, '25523'),
(108, '26882/20'),
(109, '26883'),
(110, '28622'),
(111, '29521'),
(112, '30202'),
(113, '30204'),
(114, '30205'),
(115, '30205  SKF'),
(116, '30206'),
(117, '30207'),
(118, '30208'),
(119, '30210');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `saleid` int(15) NOT NULL AUTO_INCREMENT,
  `saledate` date DEFAULT NULL,
  `noofitems` int(5) DEFAULT NULL,
  `saleprice` decimal(11,2) DEFAULT NULL,
  `clientid` int(15) DEFAULT NULL,
  PRIMARY KEY (`saleid`),
  KEY `fk_sales_clientid_idx` (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleid`, `saledate`, `noofitems`, `saleprice`, `clientid`) VALUES
(1, '2015-08-28', 1, '500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicelogs`
--

CREATE TABLE IF NOT EXISTS `servicelogs` (
  `servicelogid` int(15) NOT NULL AUTO_INCREMENT,
  `serviceprice` decimal(11,2) DEFAULT NULL,
  `joborderid` int(15) DEFAULT NULL,
  `serviceid` int(15) DEFAULT NULL,
  PRIMARY KEY (`servicelogid`),
  KEY `fk_servicelogs_joborderid_idx` (`joborderid`),
  KEY `fk_servicelogs_serviceid_idx` (`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `servicelogs`
--

INSERT INTO `servicelogs` (`servicelogid`, `serviceprice`, `joborderid`, `serviceid`) VALUES
(2, NULL, 1, 12),
(3, NULL, 1, 5),
(4, NULL, 2, 5),
(5, NULL, 3, 4),
(6, NULL, 4, 1),
(7, NULL, 4, 16),
(8, NULL, 201510155, 13),
(9, NULL, 201510155, 17),
(10, NULL, 201510156, 1),
(11, NULL, 201510156, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serviceid` int(15) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(300) DEFAULT NULL,
  `serviceprice` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `servicename`, `serviceprice`) VALUES
(1, 'Block Sleeving', '1500.00'),
(2, 'Block Washing', '1200.00'),
(3, 'Bloack Rebore', '5000.00'),
(4, 'Block Hydrotest', '500.00'),
(5, 'Block Resurface', '600.00'),
(6, 'Block and Con Rod Refitting', '800.00'),
(7, 'Block Align Boring', '750.00'),
(8, 'Cylinder Head Hydrotest', '1200.00'),
(9, 'Cylinder Head Resurface', '1100.00'),
(10, 'Cylinder Head Washing ', '900.00'),
(11, 'Cylinder Head Cold Welding', '950.00'),
(12, 'Valve Seat Insert', '550.00'),
(13, 'Valve Gulda Replace', '700.00'),
(14, 'Valve Clearance', '650.00'),
(15, 'Crankshaft Regrind Mala and Con Rod', '850.00'),
(16, 'Crackshaft Gear Pull out', '800.00'),
(17, 'Crackshaft Check-up', '900.00'),
(18, 'Rear Oil Seal Build-up and and Machining', '950.00'),
(19, 'Front Oil Seal Build-up', '700.00'),
(20, 'Con Rod Arm Rebushing', '500.00'),
(21, 'Con Rod Arm Re-std', '1000.00'),
(22, 'Con Rod Arm Alignment', '900.00'),
(23, 'Camshaft Bushing Replace', '1250.00'),
(24, 'Piston Press In/Out', '1100.00'),
(25, 'Piston Rearcove', '1300.00'),
(26, 'Side Thrust Fabricate', '1500.00'),
(27, 'Side Thrust Build-up and Machining', '1450.00'),
(28, 'Idler Gear Rebushing', '900.00'),
(29, 'Pulley Re-sleeving-Build-up', '800.00');

-- --------------------------------------------------------

--
-- Table structure for table `servicesinventory`
--

CREATE TABLE IF NOT EXISTS `servicesinventory` (
  `serviceid` int(15) NOT NULL,
  `inventoryid` int(15) NOT NULL,
  PRIMARY KEY (`serviceid`,`inventoryid`),
  KEY `fk_servicesinventory_inventoryid_idx` (`inventoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicesinventory`
--

INSERT INTO `servicesinventory` (`serviceid`, `inventoryid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `userfirstname` varchar(50) DEFAULT NULL,
  `userlastname` varchar(50) DEFAULT NULL,
  `usermidinitial` varchar(5) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpassword`, `userfirstname`, `userlastname`, `usermidinitial`, `usertype`) VALUES
(1, 'admin1', 'admin1', 'Benedict', 'Tiong', 'S', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `engrecon`
--
ALTER TABLE `engrecon`
  ADD CONSTRAINT `fk_engrecon_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `engreconfab`
--
ALTER TABLE `engreconfab`
  ADD CONSTRAINT `fk_engreconfab_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fabrications`
--
ALTER TABLE `fabrications`
  ADD CONSTRAINT `fk_fabrications_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_inventory_modelid` FOREIGN KEY (`modelid`) REFERENCES `models` (`modelid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `itemlogs`
--
ALTER TABLE `itemlogs`
  ADD CONSTRAINT `fk_itemlogs_inventoryid` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itemlogs_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itemlogs_saleid` FOREIGN KEY (`saleid`) REFERENCES `sales` (`saleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `joborders`
--
ALTER TABLE `joborders`
  ADD CONSTRAINT `fk_joborders_clientid` FOREIGN KEY (`clientid`) REFERENCES `clients` (`clientid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `joemployees`
--
ALTER TABLE `joemployees`
  ADD CONSTRAINT `fk_joemployees_employeeid` FOREIGN KEY (`employeeid`) REFERENCES `employees` (`employeeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_joemployees_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_clientid` FOREIGN KEY (`clientid`) REFERENCES `clients` (`clientid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servicelogs`
--
ALTER TABLE `servicelogs`
  ADD CONSTRAINT `fk_servicelogs_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicelogs_serviceid` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servicesinventory`
--
ALTER TABLE `servicesinventory`
  ADD CONSTRAINT `fk_servicesinventory_inventoryid` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicesinventory_serviceid` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
