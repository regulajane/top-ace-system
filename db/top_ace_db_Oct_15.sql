-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2015 at 05:15 AM
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
(1, 'Snow', 'Jon', 'Stark', '09061234567', 'Male', '#3 Winterfell, Baguio City', 'Active', 'jonsnow@yahoo.com', 3, 'Machinist'),
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
  PRIMARY KEY (`inventoryid`),
  KEY `fk_inventory_modelid_idx` (`modelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=804 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `inventoryname`, `inventorysize`, `inventoryprice`, `inventoryquantity`, `modelid`) VALUES
(1, 'Engine Valve', NULL, '600.00', 100, 1),
(2, 'Engine Valve', NULL, '400.00', 100, 2),
(3, 'Engine Valve', NULL, '300.00', 100, 3),
(4, 'Engine Valve', NULL, '350.00', 100, 4),
(5, 'Engine Valve', NULL, '245.00', 100, 5),
(6, 'Engine Valve', NULL, '150.75', 100, 6),
(7, 'Engine Valve', NULL, '340.00', 100, 7),
(8, 'Engine Valve', NULL, '245.50', 100, 8),
(9, 'Engine Valve', NULL, '120.00', 100, 9),
(10, 'Engine Valve', NULL, '135.00', 100, 10),
(11, 'Engine Valve', NULL, '450.00', 100, 11),
(12, 'Engine Valve', NULL, '345.00', 100, 12),
(13, 'Engine Valve', NULL, '254.00', 100, 13),
(14, 'Engine Valve', NULL, '323.90', 100, 14),
(15, 'Engine Valve', NULL, '445.00', 100, 15),
(16, 'Engine Valve', NULL, '345.00', 100, 16),
(17, 'Engine Valve', NULL, '167.00', 100, 17),
(18, 'Engine Valve', NULL, '340.00', 100, 18),
(19, 'Engine Valve', NULL, '231.00', 100, 19),
(20, 'Engine Valve', NULL, '609.00', 100, 20),
(21, 'Engine Valve', NULL, '780.00', 100, 21),
(22, 'Engine Valve', NULL, '890.00', 100, 22),
(23, 'Engine Valve', NULL, '1500.00', 100, 23),
(24, 'Engine Valve', NULL, '798.00', 100, 24),
(25, 'Engine Valve', NULL, '450.00', 100, 25),
(26, 'Engine Valve', NULL, '540.00', 100, 26),
(27, 'Engine Valve', NULL, '789.00', 100, 27),
(28, 'Engine Valve', NULL, '1254.00', 100, 28),
(29, 'Engine Valve', NULL, '370.00', 100, 29),
(30, 'Valve Seal', NULL, '450.00', 100, 1),
(31, 'Valve Seal', NULL, '670.00', 100, 2),
(32, 'Valve Seal', NULL, '650.00', 100, 3),
(33, 'Valve Seal', NULL, '340.00', 100, 4),
(34, 'Valve Seal', NULL, '456.00', 100, 5),
(35, 'Valve Seal', NULL, '345.00', 100, 6),
(36, 'Valve Seal', NULL, '567.00', 100, 7),
(37, 'Valve Seal', NULL, '789.00', 100, 8),
(38, 'Valve Seal', NULL, '234.00', 100, 9),
(39, 'Valve Seal', NULL, '670.00', 100, 10),
(40, 'Valve Seal', NULL, '569.00', 100, 11),
(41, 'Valve Seal', NULL, '450.00', 100, 12),
(42, 'Valve Seal', NULL, '680.00', 100, 13),
(43, 'Valve Seal', NULL, '350.00', 100, 14),
(44, 'Valve Seal', NULL, '670.00', 100, 15),
(45, 'Valve Seal', NULL, '345.00', 100, 16),
(46, 'Valve Seal', NULL, '234.50', 100, 17),
(47, 'Valve Seal', NULL, '780.00', 100, 18),
(48, 'Valve Seal', NULL, '760.00', 100, 19),
(49, 'Valve Seal', NULL, '230.00', 100, 20),
(50, 'Valve Seal', NULL, '670.00', 100, 21),
(51, 'Valve Seal', NULL, '345.00', 100, 22),
(52, 'Valve Seal', NULL, '560.00', 100, 23),
(53, 'Valve Seal', NULL, '230.00', 100, 24),
(54, 'Valve Seal', NULL, '440.00', 100, 25),
(55, 'Valve Seal', NULL, '650.00', 100, 26),
(56, 'Valve Seal', NULL, '340.00', 100, 27),
(57, 'Valve Seal', NULL, '560.00', 100, 28),
(58, 'Valve Seal', NULL, '230.00', 100, 29),
(59, 'Valve Tappet', NULL, '450.25', 100, 1),
(60, 'Valve Tappet', NULL, '670.00', 100, 2),
(61, 'Valve Tappet', NULL, '890.00', 100, 3),
(62, 'Valve Tappet', NULL, '450.00', 100, 4),
(63, 'Valve Tappet', NULL, '235.00', 100, 5),
(64, 'Valve Tappet', NULL, '340.00', 100, 6),
(65, 'Valve Tappet', NULL, '790.00', 100, 7),
(66, 'Valve Tappet', NULL, '670.00', 100, 8),
(67, 'Valve Tappet', NULL, '560.00', 100, 9),
(68, 'Valve Tappet', NULL, '777.00', 100, 10),
(69, 'Valve Tappet', NULL, '556.00', 100, 11),
(70, 'Valve Tappet', NULL, '787.50', 100, 12),
(71, 'Valve Tappet', NULL, '340.00', 100, 13),
(72, 'Valve Tappet', NULL, '450.00', 100, 14),
(73, 'Valve Tappet', NULL, '560.00', 100, 15),
(74, 'Valve Tappet', NULL, '435.00', 100, 16),
(75, 'Valve Tappet', NULL, '879.00', 100, 17),
(76, 'Valve Tappet', NULL, '567.00', 100, 18),
(77, 'Valve Tappet', NULL, '845.00', 100, 19),
(78, 'Valve Tappet', NULL, '738.00', 100, 20),
(79, 'Valve Tappet', NULL, '577.00', 100, 21),
(80, 'Valve Tappet', NULL, '535.00', 100, 22),
(81, 'Valve Tappet', NULL, '456.67', 100, 23),
(82, 'Valve Tappet', NULL, '436.90', 100, 24),
(83, 'Valve Tappet', NULL, '789.00', 100, 25),
(84, 'Valve Tappet', NULL, '437.00', 100, 26),
(85, 'Valve Tappet', NULL, '909.00', 100, 27),
(86, 'Valve Tappet', NULL, '999.00', 100, 28),
(87, 'Valve Tappet', NULL, '1456.00', 100, 29),
(88, 'Valve Insert Ring', NULL, '345.00', 100, 1),
(89, 'Valve Insert Ring', NULL, '290.00', 100, 2),
(90, 'Valve Insert Ring', NULL, '560.00', 100, 3),
(91, 'Valve Insert Ring', NULL, '567.25', 100, 4),
(92, 'Valve Insert Ring', NULL, '340.00', 100, 5),
(93, 'Valve Insert Ring', NULL, '670.00', 100, 6),
(94, 'Valve Insert Ring', NULL, '579.00', 100, 7),
(95, 'Valve Insert Ring', NULL, '434.00', 100, 8),
(96, 'Valve Insert Ring', NULL, '790.00', 100, 9),
(97, 'Valve Insert Ring', NULL, '760.00', 100, 10),
(98, 'Valve Insert Ring', NULL, '538.00', 100, 11),
(99, 'Valve Insert Ring', NULL, '560.00', 100, 12),
(100, 'Valve Insert Ring', NULL, '890.00', 100, 13),
(101, 'Valve Insert Ring', NULL, '678.00', 100, 14),
(102, 'Valve Insert Ring', NULL, '560.00', 100, 15),
(103, 'Valve Insert Ring', NULL, '580.00', 100, 16),
(104, 'Valve Insert Ring', NULL, '648.00', 100, 17),
(105, 'Valve Insert Ring', NULL, '457.25', 100, 18),
(106, 'Valve Insert Ring', NULL, '670.00', 100, 19),
(107, 'Valve Insert Ring', NULL, '599.00', 100, 20),
(108, 'Valve Insert Ring', NULL, '234.00', 100, 21),
(109, 'Valve Insert Ring', NULL, '450.00', 100, 22),
(110, 'Valve Insert Ring', NULL, '350.00', 100, 23),
(111, 'Valve Insert Ring', NULL, '435.00', 100, 24),
(112, 'Valve Insert Ring', NULL, '670.00', 100, 25),
(113, 'Valve Insert Ring', NULL, '690.00', 100, 26),
(114, 'Valve Insert Ring', NULL, '345.00', 100, 27),
(115, 'Valve Insert Ring', NULL, '450.00', 100, 28),
(116, 'Valve Insert Ring', NULL, '340.00', 100, 29),
(117, 'Valve Guide', NULL, '550.00', 100, 1),
(118, 'Valve Guide', NULL, '670.00', 100, 2),
(119, 'Valve Guide', NULL, '650.00', 100, 3),
(120, 'Valve Guide', NULL, '890.00', 100, 4),
(121, 'Valve Guide', NULL, '567.00', 100, 5),
(122, 'Valve Guide', NULL, '789.00', 100, 6),
(123, 'Valve Guide', NULL, '567.00', 100, 7),
(124, 'Valve Guide', NULL, '434.25', 100, 8),
(125, 'Valve Guide', NULL, '563.00', 100, 9),
(126, 'Valve Guide', NULL, '233.00', 100, 10),
(127, 'Valve Guide', NULL, '679.00', 100, 11),
(128, 'Valve Guide', NULL, '650.00', 100, 12),
(129, 'Valve Guide', NULL, '345.00', 100, 13),
(130, 'Valve Guide', NULL, '340.00', 100, 14),
(131, 'Valve Guide', NULL, '680.00', 100, 15),
(132, 'Valve Guide', NULL, '650.00', 100, 16),
(133, 'Valve Guide', NULL, '450.00', 100, 17),
(134, 'Valve Guide', NULL, '560.00', 100, 18),
(135, 'Valve Guide', NULL, '450.00', 100, 19),
(136, 'Valve Guide', NULL, '430.00', 100, 20),
(137, 'Valve Guide', NULL, '439.00', 100, 21),
(138, 'Valve Guide', NULL, '467.00', 100, 22),
(139, 'Valve Guide', NULL, '890.00', 100, 23),
(140, 'Valve Guide', NULL, '659.00', 100, 24),
(141, 'Valve Guide', NULL, '888.00', 100, 25),
(142, 'Valve Guide', NULL, '545.00', 100, 26),
(143, 'Valve Guide', NULL, '565.00', 100, 27),
(144, 'Valve Guide', NULL, '456.00', 100, 28),
(145, 'Valve Guide', NULL, '789.00', 100, 29),
(146, 'Gasket', NULL, '770.00', 100, 1),
(147, 'Gasket', NULL, '1349.00', 100, 2),
(148, 'Gasket', NULL, '1569.00', 100, 3),
(149, 'Gasket', NULL, '450.00', 100, 4),
(150, 'Gasket', NULL, '3234.00', 100, 5),
(151, 'Gasket', NULL, '6908.00', 100, 6),
(152, 'Gasket', NULL, '4467.00', 100, 7),
(153, 'Gasket', NULL, '450.00', 100, 8),
(154, 'Gasket', NULL, '230.90', 100, 9),
(155, 'Gasket', NULL, '788.00', 100, 10),
(156, 'Gasket', NULL, '550.00', 100, 11),
(157, 'Gasket', NULL, '2322.00', 100, 12),
(158, 'Gasket', NULL, '1122.00', 100, 13),
(159, 'Gasket', NULL, '3556.00', 100, 14),
(160, 'Gasket', NULL, '7760.00', 100, 15),
(161, 'Gasket', NULL, '560.00', 100, 16),
(162, 'Gasket', NULL, '343.00', 100, 17),
(163, 'Gasket', NULL, '545.00', 100, 18),
(164, 'Gasket', NULL, '324.00', 100, 19),
(165, 'Gasket', NULL, '5455.00', 100, 20),
(166, 'Gasket', NULL, '2122.00', 100, 21),
(167, 'Gasket', NULL, '2215.00', 100, 22),
(168, 'Gasket', NULL, '547.00', 100, 23),
(169, 'Gasket', NULL, '888.00', 100, 24),
(170, 'Gasket', NULL, '887.00', 100, 25),
(171, 'Gasket', NULL, '434.00', 100, 26),
(172, 'Gasket', NULL, '232.00', 100, 27),
(173, 'Gasket', NULL, '3223.00', 100, 28),
(174, 'Gasket', NULL, '546.00', 100, 29),
(175, 'Piston Ring', '0.25', '776.00', 100, 1),
(176, 'Piston Ring', '0.25', '725.00', 100, 2),
(177, 'Piston Ring', '0.25', '566.00', 100, 3),
(178, 'Piston Ring', '0.25', '766.00', 100, 4),
(179, 'Piston Ring', '0.25', '450.00', 100, 5),
(180, 'Piston Ring', '0.25', '650.00', 100, 6),
(181, 'Piston Ring', '0.25', '1200.50', 100, 7),
(182, 'Piston Ring', '0.25', '800.00', 100, 8),
(183, 'Piston Ring', '0.25', '350.00', 100, 9),
(184, 'Piston Ring', '0.25', '400.00', 100, 10),
(185, 'Piston Ring', '0.25', '360.00', 100, 11),
(186, 'Piston Ring', '0.25', '400.00', 100, 12),
(187, 'Piston Ring', '0.25', '550.00', 100, 13),
(188, 'Piston Ring', '0.25', '580.25', 100, 14),
(189, 'Piston Ring', '0.25', '1200.00', 100, 15),
(190, 'Piston Ring', '0.25', '1100.00', 100, 16),
(191, 'Piston Ring', '0.25', '580.00', 100, 17),
(192, 'Piston Ring', '0.25', '500.00', 100, 18),
(193, 'Piston Ring', '0.25', '650.00', 100, 19),
(194, 'Piston Ring', '0.25', '750.00', 100, 20),
(195, 'Piston Ring', '0.25', '700.00', 100, 21),
(196, 'Piston Ring', '0.25', '720.00', 100, 22),
(197, 'Piston Ring', '0.25', '680.00', 100, 23),
(198, 'Piston Ring', '0.25', '600.00', 100, 24),
(199, 'Piston Ring', '0.25', '1150.00', 100, 25),
(200, 'Piston Ring', '0.25', '1000.00', 100, 26),
(201, 'Piston Ring', '0.25', '800.00', 100, 27),
(202, 'Piston Ring', '0.25', '850.00', 100, 28),
(203, 'Piston Ring', '0.25', '300.00', 100, 29),
(204, 'Main Bearing', '0.25', '660.00', 100, 1),
(205, 'Main Bearing', '0.25', '880.00', 100, 2),
(206, 'Main Bearing', '0.25', '980.00', 100, 3),
(207, 'Main Bearing', '0.25', '1000.50', 100, 4),
(208, 'Main Bearing', '0.25', '650.00', 100, 5),
(209, 'Main Bearing', '0.25', '850.00', 100, 6),
(210, 'Main Bearing', '0.25', '360.00', 100, 7),
(211, 'Main Bearing', '0.25', '480.00', 100, 8),
(212, 'Main Bearing', '0.25', '370.00', 100, 9),
(213, 'Main Bearing', '0.25', '460.00', 100, 10),
(214, 'Main Bearing', '0.25', '460.00', 100, 11),
(215, 'Main Bearing', '0.25', '450.00', 100, 12),
(216, 'Main Bearing', '0.25', '550.00', 100, 13),
(217, 'Main Bearing', '0.25', '580.00', 100, 14),
(218, 'Main Bearing', '0.25', '600.00', 100, 15),
(219, 'Main Bearing', '0.25', '650.00', 100, 16),
(220, 'Main Bearing', '0.25', '700.00', 100, 17),
(221, 'Main Bearing', '0.25', '400.50', 100, 18),
(222, 'Main Bearing', '0.25', '660.00', 100, 19),
(223, 'Main Bearing', '0.25', '730.00', 100, 20),
(224, 'Main Bearing', '0.25', '390.00', 100, 21),
(225, 'Main Bearing', '0.25', '450.00', 100, 22),
(226, 'Main Bearing', '0.25', '470.00', 100, 23),
(227, 'Main Bearing', '0.25', '520.00', 100, 24),
(228, 'Main Bearing', '0.25', '500.00', 100, 25),
(229, 'Main Bearing', '0.25', '600.00', 100, 26),
(230, 'Main Bearing', '0.25', '400.00', 100, 27),
(231, 'Main Bearing', '0.25', '390.00', 100, 28),
(232, 'Main Bearing', '0.25', '380.00', 100, 29),
(233, 'Connecting Rod Bearing', '0.25', '410.00', 100, 1),
(234, 'Connecting Rod Bearing', '0.25', '570.00', 100, 2),
(235, 'Connecting Rod Bearing', '0.25', '580.00', 100, 3),
(236, 'Connecting Rod Bearing', '0.25', '585.00', 100, 4),
(237, 'Connecting Rod Bearing', '0.25', '550.90', 100, 5),
(238, 'Connecting Rod Bearing', '0.25', '290.00', 100, 6),
(239, 'Connecting Rod Bearing', '0.25', '375.00', 100, 7),
(240, 'Connecting Rod Bearing', '0.25', '850.00', 100, 8),
(241, 'Connecting Rod Bearing', '0.25', '800.00', 100, 9),
(242, 'Connecting Rod Bearing', '0.25', '690.00', 100, 10),
(243, 'Connecting Rod Bearing', '0.25', '900.00', 100, 11),
(244, 'Connecting Rod Bearing', '0.25', '1500.00', 100, 12),
(245, 'Connecting Rod Bearing', '0.25', '1400.00', 100, 13),
(246, 'Connecting Rod Bearing', '0.25', '400.00', 100, 14),
(247, 'Connecting Rod Bearing', '0.25', '500.00', 100, 15),
(248, 'Connecting Rod Bearing', '0.25', '520.00', 100, 16),
(249, 'Connecting Rod Bearing', '0.25', '530.00', 100, 17),
(250, 'Connecting Rod Bearing', '0.25', '580.00', 100, 18),
(251, 'Connecting Rod Bearing', '0.25', '670.00', 100, 19),
(252, 'Connecting Rod Bearing', '0.25', '680.00', 100, 20),
(253, 'Connecting Rod Bearing', '0.25', '600.00', 100, 21),
(254, 'Connecting Rod Bearing', '0.25', '800.00', 100, 22),
(255, 'Connecting Rod Bearing', '0.25', '900.00', 100, 23),
(256, 'Connecting Rod Bearing', '0.25', '980.00', 100, 24),
(257, 'Connecting Rod Bearing', '0.25', '970.00', 100, 25),
(258, 'Connecting Rod Bearing', '0.25', '600.00', 100, 26),
(259, 'Connecting Rod Bearing', '0.25', '900.00', 100, 27),
(260, 'Connecting Rod Bearing', '0.25', '800.00', 100, 28),
(261, 'Connecting Rod Bearing', '0.25', '860.00', 100, 29),
(262, 'Thrust Washer', NULL, '700.00', 100, 1),
(263, 'Thrust Washer', NULL, '470.00', 100, 2),
(264, 'Thrust Washer', NULL, '860.00', 100, 3),
(265, 'Thrust Washer', NULL, '900.00', 100, 4),
(266, 'Thrust Washer', NULL, '900.00', 100, 5),
(267, 'Thrust Washer', NULL, '860.00', 100, 6),
(268, 'Thrust Washer', NULL, '470.00', 100, 7),
(269, 'Thrust Washer', NULL, '700.00', 100, 8),
(270, 'Thrust Washer', NULL, '800.00', 100, 9),
(271, 'Thrust Washer', NULL, '800.00', 100, 10),
(272, 'Thrust Washer', NULL, '980.00', 100, 11),
(273, 'Thrust Washer', NULL, '600.00', 100, 12),
(274, 'Thrust Washer', NULL, '650.00', 100, 13),
(275, 'Thrust Washer', NULL, '750.75', 100, 14),
(276, 'Thrust Washer', NULL, '1800.00', 100, 15),
(277, 'Thrust Washer', NULL, '1500.00', 100, 16),
(278, 'Thrust Washer', NULL, '700.00', 100, 17),
(279, 'Thrust Washer', NULL, '730.00', 100, 18),
(280, 'Thrust Washer', NULL, '440.00', 100, 19),
(281, 'Thrust Washer', NULL, '399.00', 100, 20),
(282, 'Thrust Washer', NULL, '770.00', 100, 21),
(283, 'Thrust Washer', NULL, '885.00', 100, 22),
(284, 'Thrust Washer', NULL, '880.00', 100, 23),
(285, 'Thrust Washer', NULL, '695.00', 100, 24),
(286, 'Thrust Washer', NULL, '990.00', 100, 25),
(287, 'Thrust Washer', NULL, '1000.00', 100, 26),
(288, 'Thrust Washer', NULL, '188.00', 100, 27),
(289, 'Thrust Washer', NULL, '280.00', 100, 28),
(290, 'Thrust Washer', NULL, '780.00', 100, 29),
(291, 'Camshaft Bushing', NULL, '1000.00', 100, 1),
(292, 'Camshaft Bushing', NULL, '900.00', 100, 2),
(293, 'Camshaft Bushing', NULL, '1500.00', 100, 3),
(294, 'Camshaft Bushing', NULL, '900.00', 100, 4),
(295, 'Camshaft Bushing', NULL, '800.00', 100, 5),
(296, 'Camshaft Bushing', NULL, '500.75', 100, 6),
(297, 'Camshaft Bushing', NULL, '750.00', 100, 7),
(298, 'Camshaft Bushing', NULL, '650.00', 100, 8),
(299, 'Camshaft Bushing', NULL, '600.00', 100, 9),
(300, 'Camshaft Bushing', NULL, '850.00', 100, 10),
(301, 'Camshaft Bushing', NULL, '980.00', 100, 11),
(302, 'Camshaft Bushing', NULL, '1200.00', 100, 12),
(303, 'Camshaft Bushing', '', '460.00', 100, 13),
(304, 'Camshaft Bushing', NULL, '600.00', 100, 14),
(305, 'Camshaft Bushing', NULL, '600.00', 100, 15),
(306, 'Camshaft Bushing', NULL, '600.00', 100, 16),
(307, 'Camshaft Bushing', NULL, '700.00', 100, 17),
(308, 'Camshaft Bushing', NULL, '750.00', 100, 18),
(309, 'Camshaft Bushing', NULL, '600.00', 100, 19),
(310, 'Camshaft Bushing', NULL, '600.00', 100, 20),
(311, 'Camshaft Bushing', NULL, '600.00', 100, 21),
(312, 'Camshaft Bushing', NULL, '750.00', 100, 22),
(313, 'Camshaft Bushing', NULL, '750.00', 100, 23),
(314, 'Camshaft Bushing', NULL, '750.00', 100, 24),
(315, 'Camshaft Bushing', NULL, '1200.00', 100, 25),
(316, 'Camshaft Bushing', NULL, '750.00', 100, 26),
(317, 'Camshaft Bushing', NULL, '400.00', 100, 27),
(318, 'Camshaft Bushing', NULL, '800.00', 100, 28),
(319, 'Camshaft Bushing', NULL, '900.00', 100, 29),
(320, 'Piston Assembly', NULL, '900.00', 100, 1),
(321, 'Piston Assembly', NULL, '700.00', 100, 2),
(322, 'Piston Assembly', NULL, '600.00', 100, 3),
(323, 'Piston Assembly', NULL, '650.00', 100, 4),
(324, 'Piston Assembly', NULL, '760.50', 100, 5),
(325, 'Piston Assembly', NULL, '800.00', 100, 6),
(326, 'Piston Assembly', NULL, '990.00', 100, 7),
(327, 'Piston Assembly', NULL, '980.00', 100, 8),
(328, 'Piston Assembly', NULL, '1000.00', 100, 9),
(329, 'Piston Assembly', NULL, '1100.00', 100, 10),
(330, 'Piston Assembly', NULL, '400.00', 100, 11),
(331, 'Piston Assembly', NULL, '500.00', 100, 12),
(332, 'Piston Assembly', NULL, '600.00', 100, 13),
(333, 'Piston Assembly', NULL, '800.00', 100, 14),
(334, 'Piston Assembly', NULL, '750.00', 100, 15),
(335, 'Piston Assembly', NULL, '500.00', 100, 16),
(336, 'Piston Assembly', NULL, '500.60', 100, 17),
(337, 'Piston Assembly', NULL, '800.00', 100, 18),
(338, 'Piston Assembly', NULL, '600.00', 100, 19),
(339, 'Piston Assembly', NULL, '650.00', 100, 20),
(340, 'Piston Assembly', NULL, '1000.00', 100, 21),
(341, 'Piston Assembly', NULL, '770.00', 100, 22),
(342, 'Piston Assembly', NULL, '550.00', 100, 23),
(343, 'Piston Assembly', NULL, '600.00', 100, 24),
(344, 'Piston Assembly', NULL, '500.00', 100, 25),
(345, 'Piston Assembly', NULL, '480.00', 100, 26),
(346, 'Piston Assembly', NULL, '590.00', 100, 27),
(347, 'Piston Assembly', NULL, '100.00', 100, 28),
(348, 'Piston Assembly', NULL, '500.00', 100, 29),
(349, 'Piston Pin', NULL, '600.00', 100, 1),
(350, 'Piston Pin', NULL, '520.00', 100, 2),
(351, 'Piston Pin', NULL, '900.00', 100, 3),
(352, 'Piston Pin', NULL, '670.00', 100, 4),
(353, 'Piston Pin', NULL, '700.00', 100, 5),
(354, 'Piston Pin', NULL, '500.00', 100, 6),
(355, 'Piston Pin', NULL, '600.00', 100, 7),
(356, 'Piston Pin', NULL, '770.00', 100, 8),
(357, 'Piston Pin', NULL, '640.00', 100, 9),
(358, 'Piston Pin', NULL, '680.00', 100, 10),
(359, 'Piston Pin', NULL, '940.00', 100, 11),
(360, 'Piston Pin', NULL, '800.00', 100, 12),
(361, 'Piston Pin', NULL, '670.00', 100, 13),
(362, 'Piston Pin', NULL, '600.00', 100, 14),
(363, 'Piston Pin', NULL, '800.00', 100, 15),
(364, 'Piston Pin', NULL, '700.00', 100, 16),
(365, 'Piston Pin', NULL, '890.00', 100, 17),
(366, 'Piston Pin', NULL, '780.00', 100, 18),
(367, 'Piston Pin', NULL, '700.00', 100, 19),
(368, 'Piston Pin', NULL, '700.00', 100, 20),
(369, 'Piston Pin', NULL, '600.00', 100, 21),
(370, 'Piston Pin', NULL, '700.00', 100, 22),
(371, 'Piston Pin', NULL, '800.00', 100, 23),
(372, 'Piston Pin', NULL, '670.00', 100, 24),
(373, 'Piston Pin', NULL, '760.00', 100, 25),
(374, 'Piston Pin', NULL, '650.00', 100, 26),
(375, 'Piston Pin', NULL, '500.00', 100, 27),
(376, 'Piston Pin', NULL, '900.00', 100, 28),
(377, 'Piston Pin', NULL, '800.00', 100, 29),
(378, 'Liner', NULL, '600.00', 100, 1),
(379, 'Liner', NULL, '400.00', 100, 2),
(380, 'Liner', NULL, '510.00', 100, 3),
(381, 'Liner', NULL, '520.00', 100, 4),
(382, 'Liner', NULL, '840.00', 100, 5),
(383, 'Liner', NULL, '940.00', 100, 6),
(384, 'Liner', NULL, '650.00', 100, 7),
(385, 'Liner', NULL, '720.00', 100, 8),
(386, 'Liner', NULL, '700.00', 100, 9),
(387, 'Liner', NULL, '800.00', 100, 10),
(388, 'Liner', NULL, '760.00', 100, 11),
(389, 'Liner', NULL, '740.00', 100, 12),
(390, 'Liner', NULL, '800.00', 100, 13),
(391, 'Liner', NULL, '700.00', 100, 14),
(392, 'Liner', NULL, '640.00', 100, 15),
(393, 'Liner', NULL, '600.00', 100, 16),
(394, 'Liner', NULL, '500.00', 100, 17),
(395, 'Liner', NULL, '450.00', 100, 18),
(396, 'Liner', NULL, '400.00', 100, 19),
(397, 'Liner', NULL, '300.00', 100, 20),
(398, 'Liner', NULL, '1100.00', 100, 21),
(399, 'Liner', NULL, '1000.00', 100, 22),
(400, 'Liner', NULL, '400.00', 100, 23),
(401, 'Liner', NULL, '700.00', 100, 24),
(402, 'Liner', NULL, '700.00', 100, 25),
(403, 'Liner', NULL, '600.00', 100, 26),
(404, 'Liner', NULL, '550.00', 100, 27),
(405, 'Liner', NULL, '880.00', 100, 28),
(406, 'Liner', NULL, '630.00', 100, 29),
(407, 'Overhauling Gasket', NULL, '750.00', 100, 1),
(408, 'Overhauling Gasket', NULL, '890.00', 100, 2),
(409, 'Overhauling Gasket', NULL, '670.00', 100, 3),
(410, 'Overhauling Gasket', NULL, '780.00', 100, 4),
(411, 'Overhauling Gasket', NULL, '800.00', 100, 5),
(412, 'Overhauling Gasket', NULL, '600.00', 100, 6),
(413, 'Overhauling Gasket', NULL, '600.00', 100, 7),
(414, 'Overhauling Gasket', NULL, '900.00', 100, 8),
(415, 'Overhauling Gasket', NULL, '860.00', 100, 9),
(416, 'Overhauling Gasket', NULL, '700.00', 100, 10),
(417, 'Overhauling Gasket', NULL, '860.00', 100, 11),
(418, 'Overhauling Gasket', NULL, '750.00', 100, 12),
(419, 'Overhauling Gasket', NULL, '620.00', 100, 13),
(420, 'Overhauling Gasket', NULL, '830.00', 100, 14),
(421, 'Overhauling Gasket', NULL, '780.00', 100, 15),
(422, 'Overhauling Gasket', NULL, '900.00', 100, 16),
(423, 'Overhauling Gasket', NULL, '800.00', 100, 17),
(424, 'Overhauling Gasket', NULL, '700.00', 100, 18),
(425, 'Overhauling Gasket', NULL, '740.00', 100, 19),
(426, 'Overhauling Gasket', NULL, '680.00', 100, 20),
(427, 'Overhauling Gasket', NULL, '900.00', 100, 21),
(428, 'Overhauling Gasket', NULL, '850.00', 100, 22),
(429, 'Overhauling Gasket', NULL, '850.00', 100, 23),
(430, 'Overhauling Gasket', NULL, '659.00', 100, 24),
(431, 'Overhauling Gasket', NULL, '750.00', 100, 25),
(432, 'Overhauling Gasket', NULL, '899.00', 100, 26),
(433, 'Overhauling Gasket', NULL, '850.75', 100, 27),
(434, 'Overhauling Gasket', NULL, '1000.00', 100, 28),
(435, 'Overhauling Gasket', NULL, '900.00', 100, 29),
(436, 'Piston Ring', '0.5', '776.00', 100, 1),
(437, 'Piston Ring', '0.5', '776.00', 100, 2),
(438, 'Piston Ring', '0.5', '776.00', 100, 3),
(439, 'Piston Ring', '0.5', '776.00', 100, 4),
(440, 'Piston Ring', '0.5', '776.00', 100, 5),
(441, 'Piston Ring', '0.5', '776.00', 100, 6),
(442, 'Piston Ring', '0.5', NULL, 100, 7),
(443, 'Piston Ring', '0.5', NULL, 100, 8),
(444, 'Piston Ring', '0.5', NULL, 100, 9),
(445, 'Piston Ring', '0.5', '0.00', NULL, 10),
(446, 'Piston Ring', '0.5', NULL, NULL, 11),
(447, 'Piston Ring', '0.5', NULL, NULL, 12),
(448, 'Piston Ring', '0.5', NULL, NULL, 13),
(449, 'Piston Ring', '0.5', NULL, NULL, 14),
(450, 'Piston Ring', '0.5', NULL, NULL, 16),
(451, 'Piston Ring', '0.5', NULL, NULL, 17),
(452, 'Piston Ring', '0.5', NULL, NULL, 18),
(453, 'Piston Ring', '0.5', NULL, NULL, 19),
(454, 'Piston Ring', '0.5', NULL, NULL, 20),
(455, 'Piston Ring', '0.5', NULL, NULL, 21),
(456, 'Piston Ring', '0.5', NULL, NULL, 22),
(457, 'Piston Ring', '0.5', NULL, NULL, 23),
(458, 'Piston Ring', '0.5', NULL, NULL, 24),
(459, 'Piston Ring', '0.5', NULL, NULL, 25),
(460, 'Piston Ring', '0.5', NULL, NULL, 26),
(461, 'Piston Ring', '0.5', NULL, NULL, 27),
(462, 'Piston Ring', '0.5', NULL, NULL, 28),
(463, 'Piston Ring', '0.5', NULL, NULL, 29),
(464, 'Piston Ring', '0.75', NULL, NULL, 1),
(465, 'Piston Ring', '0.75', NULL, NULL, 2),
(466, 'Piston Ring', '0.75', NULL, NULL, 3),
(467, 'Piston Ring', '0.75', NULL, NULL, 4),
(468, 'Piston Ring', '0.75', NULL, NULL, 5),
(469, 'Piston Ring', '0.75', NULL, NULL, 6),
(470, 'Piston Ring', '0.75', NULL, NULL, 7),
(471, 'Piston Ring', '0.75', NULL, NULL, 8),
(472, 'Piston Ring', '0.75', NULL, NULL, 9),
(473, 'Piston Ring', '0.75', NULL, NULL, 10),
(474, 'Piston Ring', '0.75', NULL, NULL, 11),
(475, 'Piston Ring', '0.75', NULL, NULL, 12),
(476, 'Piston Ring', '0.75', NULL, NULL, 13),
(477, 'Piston Ring', '0.75', NULL, NULL, 14),
(478, 'Piston Ring', '0.75', NULL, NULL, 15),
(479, 'Piston Ring', '0.75', NULL, NULL, 16),
(480, 'Piston Ring', '0.75', NULL, NULL, 17),
(481, 'Piston Ring', '0.75', NULL, NULL, 18),
(482, 'Piston Ring', '0.75', NULL, NULL, 19),
(483, 'Piston Ring', '0.75', NULL, NULL, 20),
(484, 'Piston Ring', '0.75', NULL, NULL, 21),
(485, 'Piston Ring', '0.75', NULL, NULL, 22),
(486, 'Piston Ring', '0.75', NULL, NULL, 23),
(487, 'Piston Ring', '0.75', NULL, NULL, 24),
(488, 'Piston Ring', '0.75', NULL, NULL, 25),
(489, 'Piston Ring', '0.75', NULL, NULL, 26),
(490, 'Piston Ring', '0.75', NULL, NULL, 27),
(491, 'Piston Ring', '0.75', NULL, NULL, 28),
(492, 'Piston Ring', '0.75', NULL, NULL, 29),
(493, 'Piston Ring', 'STD', NULL, NULL, 1),
(494, 'Piston Ring', 'STD', NULL, NULL, 2),
(495, 'Piston Ring', 'STD', NULL, NULL, 3),
(496, 'Piston Ring', 'STD', NULL, NULL, 4),
(497, 'Piston Ring', 'STD', NULL, NULL, 5),
(498, 'Piston Ring', 'STD', NULL, NULL, 6),
(499, 'Piston Ring', 'STD', NULL, NULL, 7),
(500, 'Piston Ring', 'STD', NULL, NULL, 8),
(501, 'Piston Ring', 'STD', NULL, NULL, 9),
(502, 'Piston Ring', 'STD', NULL, NULL, 10),
(503, 'Piston Ring', 'STD', NULL, NULL, 11),
(504, 'Piston Ring', 'STD', NULL, NULL, 12),
(505, 'Piston Ring', 'STD', NULL, NULL, 13),
(506, 'Piston Ring', 'STD', NULL, NULL, 14),
(507, 'Piston Ring', 'STD', NULL, NULL, 15),
(508, 'Piston Ring', 'STD', NULL, NULL, 16),
(509, 'Piston Ring', 'STD', NULL, NULL, 17),
(510, 'Piston Ring', 'STD', NULL, NULL, 18),
(511, 'Piston Ring', 'STD', NULL, NULL, 19),
(512, 'Piston Ring', 'STD', NULL, NULL, 20),
(513, 'Piston Ring', 'STD', NULL, NULL, 21),
(514, 'Piston Ring', 'STD', NULL, NULL, 22),
(515, 'Piston Ring', 'STD', NULL, NULL, 23),
(516, 'Piston Ring', 'STD', NULL, NULL, 24),
(517, 'Piston Ring', 'STD', NULL, NULL, 25),
(518, 'Piston Ring', 'STD', NULL, NULL, 26),
(519, 'Piston Ring', 'STD', NULL, NULL, 27),
(520, 'Piston Ring', 'STD', NULL, NULL, 28),
(521, 'Piston Ring', 'STD', NULL, NULL, 29),
(522, 'Main Bearing', '0.5', NULL, NULL, 1),
(523, 'Main Bearing', '0.5', NULL, NULL, 2),
(524, 'Main Bearing', '0.5', NULL, NULL, 3),
(525, 'Main Bearing', '0.5', NULL, NULL, 4),
(526, 'Main Bearing', '0.5', NULL, NULL, 5),
(527, 'Main Bearing', '0.5', NULL, NULL, 6),
(528, 'Main Bearing', '0.5', NULL, NULL, 7),
(529, 'Main Bearing', '0.5', NULL, NULL, 8),
(530, 'Main Bearing', '0.5', NULL, NULL, 9),
(531, 'Main Bearing', '0.5', NULL, NULL, 10),
(532, 'Main Bearing', '0.5', NULL, NULL, 11),
(533, 'Main Bearing', '0.5', NULL, NULL, 12),
(534, 'Main Bearing', '0.5', NULL, NULL, 13),
(535, 'Main Bearing', '0.5', NULL, NULL, 14),
(536, 'Main Bearing', '0.5', NULL, NULL, 15),
(537, 'Main Bearing', '0.5', NULL, NULL, 16),
(538, 'Main Bearing', '0.5', NULL, NULL, 17),
(539, 'Main Bearing', '0.5', NULL, NULL, 18),
(540, 'Main Bearing', '0.5', NULL, NULL, 19),
(541, 'Main Bearing', '0.5', NULL, NULL, 20),
(542, 'Main Bearing', '0.5', NULL, NULL, 21),
(543, 'Main Bearing', '0.5', NULL, NULL, 22),
(544, 'Main Bearing', '0.5', NULL, NULL, 23),
(545, 'Main Bearing', '0.5', NULL, NULL, 24),
(546, 'Main Bearing', '0.5', NULL, NULL, 25),
(547, 'Main Bearing', '0.5', NULL, NULL, 26),
(548, 'Main Bearing', '0.5', NULL, NULL, 27),
(549, 'Main Bearing', '0.5', NULL, NULL, 28),
(550, 'Main Bearing', '0.5', NULL, NULL, 29),
(551, 'Main Bearing', '0.75', NULL, NULL, 1),
(552, 'Main Bearing', '0.75', NULL, NULL, 2),
(553, 'Main Bearing', '0.75', NULL, NULL, 3),
(554, 'Main Bearing', '0.75', NULL, NULL, 4),
(555, 'Main Bearing', '0.75', NULL, NULL, 5),
(556, 'Main Bearing', '0.75', NULL, NULL, 6),
(557, 'Main Bearing', '0.75', NULL, NULL, 7),
(558, 'Main Bearing', '0.75', NULL, NULL, 8),
(559, 'Main Bearing', '0.75', NULL, NULL, 9),
(560, 'Main Bearing', '0.75', NULL, NULL, 10),
(561, 'Main Bearing', '0.75', NULL, NULL, 11),
(562, 'Main Bearing', '0.75', NULL, NULL, 12),
(563, 'Main Bearing', '0.75', NULL, NULL, 13),
(564, 'Main Bearing', '0.75', NULL, NULL, 14),
(565, 'Main Bearing', '0.75', NULL, NULL, 15),
(566, 'Main Bearing', '0.75', NULL, NULL, 16),
(567, 'Main Bearing', '0.75', NULL, NULL, 17),
(568, 'Main Bearing', '0.75', NULL, NULL, 18),
(569, 'Main Bearing', '0.75', NULL, NULL, 19),
(570, 'Main Bearing', '0.75', NULL, NULL, 20),
(571, 'Main Bearing', '0.75', NULL, NULL, 21),
(572, 'Main Bearing', '0.75', NULL, NULL, 22),
(573, 'Main Bearing', '0.75', NULL, NULL, 23),
(574, 'Main Bearing', '0.75', NULL, NULL, 24),
(575, 'Main Bearing', '0.75', NULL, NULL, 25),
(576, 'Main Bearing', '0.75', NULL, NULL, 26),
(577, 'Main Bearing', '0.75', NULL, NULL, 27),
(578, 'Main Bearing', '0.75', NULL, NULL, 28),
(579, 'Main Bearing', '0.75', NULL, NULL, 29),
(580, 'Main Bearing', 'STD', NULL, NULL, 1),
(581, 'Main Bearing', 'STD', NULL, NULL, 2),
(582, 'Main Bearing', 'STD', NULL, NULL, 3),
(583, 'Main Bearing', 'STD', NULL, NULL, 4),
(584, 'Main Bearing', 'STD', NULL, NULL, 5),
(585, 'Main Bearing', 'STD', NULL, NULL, 6),
(586, 'Main Bearing', 'STD', NULL, NULL, 7),
(587, 'Main Bearing', 'STD', NULL, NULL, 8),
(588, 'Main Bearing', 'STD', NULL, NULL, 9),
(589, 'Main Bearing', 'STD', NULL, NULL, 10),
(590, 'Main Bearing', 'STD', NULL, NULL, 11),
(591, 'Main Bearing', 'STD', NULL, NULL, 12),
(592, 'Main Bearing', 'STD', NULL, NULL, 13),
(593, 'Main Bearing', 'STD', NULL, NULL, 14),
(594, 'Main Bearing', 'STD', NULL, NULL, 15),
(595, 'Main Bearing', 'STD', NULL, NULL, 16),
(596, 'Main Bearing', 'STD', NULL, NULL, 17),
(597, 'Main Bearing', 'STD', NULL, NULL, 18),
(598, 'Main Bearing', 'STD', NULL, NULL, 19),
(599, 'Main Bearing', 'STD', NULL, NULL, 20),
(600, 'Main Bearing', 'STD', NULL, NULL, 21),
(601, 'Main Bearing', 'STD', NULL, NULL, 22),
(602, 'Main Bearing', 'STD', NULL, NULL, 23),
(603, 'Main Bearing', 'STD', NULL, NULL, 24),
(604, 'Main Bearing', 'STD', NULL, NULL, 25),
(605, 'Main Bearing', 'STD', NULL, NULL, 26),
(606, 'Main Bearing', 'STD', NULL, NULL, 27),
(607, 'Main Bearing', 'STD', NULL, NULL, 28),
(608, 'Main Bearing', 'STD', NULL, NULL, 29),
(609, 'Connecting Rod Bearing', '0.5', NULL, NULL, 1),
(610, 'Connecting Rod Bearing', '0.5', NULL, NULL, 2),
(611, 'Connecting Rod Bearing', '0.5', NULL, NULL, 3),
(612, 'Connecting Rod Bearing', '0.5', NULL, NULL, 4),
(613, 'Connecting Rod Bearing', '0.5', NULL, NULL, 5),
(614, 'Connecting Rod Bearing', '0.5', NULL, NULL, 6),
(615, 'Connecting Rod Bearing', '0.5', NULL, NULL, 7),
(616, 'Connecting Rod Bearing', '0.5', NULL, NULL, 8),
(617, 'Connecting Rod Bearing', '0.5', NULL, NULL, 9),
(618, 'Connecting Rod Bearing', '0.5', NULL, NULL, 10),
(619, 'Connecting Rod Bearing', '0.5', NULL, NULL, 11),
(620, 'Connecting Rod Bearing', '0.5', NULL, NULL, 12),
(621, 'Connecting Rod Bearing', '0.5', NULL, NULL, 13),
(622, 'Connecting Rod Bearing', '0.5', NULL, NULL, 14),
(623, 'Connecting Rod Bearing', '0.5', NULL, NULL, 15),
(624, 'Connecting Rod Bearing', '0.5', NULL, NULL, 16),
(625, 'Connecting Rod Bearing', '0.5', NULL, NULL, 17),
(626, 'Connecting Rod Bearing', '0.5', NULL, NULL, 18),
(627, 'Connecting Rod Bearing', '0.5', NULL, NULL, 19),
(628, 'Connecting Rod Bearing', '0.5', NULL, NULL, 20),
(629, 'Connecting Rod Bearing', '0.5', NULL, NULL, 21),
(630, 'Connecting Rod Bearing', '0.5', NULL, NULL, 22),
(631, 'Connecting Rod Bearing', '0.5', NULL, NULL, 23),
(632, 'Connecting Rod Bearing', '0.5', NULL, NULL, 24),
(633, 'Connecting Rod Bearing', '0.5', NULL, NULL, 25),
(634, 'Connecting Rod Bearing', '0.5', NULL, NULL, 26),
(635, 'Connecting Rod Bearing', '0.5', NULL, NULL, 27),
(636, 'Connecting Rod Bearing', '0.5', NULL, NULL, 28),
(637, 'Connecting Rod Bearing', '0.5', NULL, NULL, 29),
(638, 'Connecting Rod Bearing', '0.75', NULL, NULL, 1),
(639, 'Connecting Rod Bearing', '0.75', NULL, NULL, 2),
(640, 'Connecting Rod Bearing', '0.75', NULL, NULL, 3),
(641, 'Connecting Rod Bearing', '0.75', NULL, NULL, 4),
(642, 'Connecting Rod Bearing', '0.75', NULL, NULL, 5),
(643, 'Connecting Rod Bearing', '0.75', NULL, NULL, 6),
(644, 'Connecting Rod Bearing', '0.75', NULL, NULL, 7),
(645, 'Connecting Rod Bearing', '0.75', NULL, NULL, 8),
(646, 'Connecting Rod Bearing', '0.75', NULL, NULL, 9),
(647, 'Connecting Rod Bearing', '0.75', NULL, NULL, 10),
(648, 'Connecting Rod Bearing', '0.75', NULL, NULL, 11),
(649, 'Connecting Rod Bearing', '0.75', NULL, NULL, 12),
(650, 'Connecting Rod Bearing', '0.75', NULL, NULL, 13),
(651, 'Connecting Rod Bearing', '0.75', NULL, NULL, 14),
(652, 'Connecting Rod Bearing', '0.75', NULL, NULL, 15),
(653, 'Connecting Rod Bearing', '0.75', NULL, NULL, 16),
(654, 'Connecting Rod Bearing', '0.75', NULL, NULL, 17),
(655, 'Connecting Rod Bearing', '0.75', NULL, NULL, 18),
(656, 'Connecting Rod Bearing', '0.75', NULL, NULL, 19),
(657, 'Connecting Rod Bearing', '0.75', NULL, NULL, 20),
(658, 'Connecting Rod Bearing', '0.75', NULL, NULL, 21),
(659, 'Connecting Rod Bearing', '0.75', NULL, NULL, 22),
(660, 'Connecting Rod Bearing', '0.75', NULL, NULL, 23),
(661, 'Connecting Rod Bearing', '0.75', NULL, NULL, 24),
(662, 'Connecting Rod Bearing', '0.75', NULL, NULL, 25),
(663, 'Connecting Rod Bearing', '0.75', NULL, NULL, 26),
(664, 'Connecting Rod Bearing', '0.75', NULL, NULL, 27),
(665, 'Connecting Rod Bearing', '0.75', NULL, NULL, 28),
(666, 'Connecting Rod Bearing', '0.75', NULL, NULL, 29),
(667, 'Connecting Rod Bearing', 'STD', NULL, NULL, 1),
(668, 'Connecting Rod Bearing', 'STD', NULL, NULL, 2),
(669, 'Connecting Rod Bearing', 'STD', NULL, NULL, 3),
(670, 'Connecting Rod Bearing', 'STD', NULL, NULL, 4),
(671, 'Connecting Rod Bearing', 'STD', NULL, NULL, 5),
(672, 'Connecting Rod Bearing', 'STD', NULL, NULL, 6),
(673, 'Connecting Rod Bearing', 'STD', NULL, NULL, 7),
(674, 'Connecting Rod Bearing', 'STD', NULL, NULL, 8),
(675, 'Connecting Rod Bearing', 'STD', NULL, NULL, 9),
(676, 'Connecting Rod Bearing', 'STD', NULL, NULL, 10),
(677, 'Connecting Rod Bearing', 'STD', NULL, NULL, 11),
(678, 'Connecting Rod Bearing', 'STD', NULL, NULL, 12),
(679, 'Connecting Rod Bearing', 'STD', NULL, NULL, 13),
(680, 'Connecting Rod Bearing', 'STD', NULL, NULL, 14),
(681, 'Connecting Rod Bearing', 'STD', NULL, NULL, 15),
(682, 'Connecting Rod Bearing', 'STD', NULL, NULL, 16),
(683, 'Connecting Rod Bearing', 'STD', NULL, NULL, 17),
(684, 'Connecting Rod Bearing', 'STD', NULL, NULL, 18),
(685, 'Connecting Rod Bearing', 'STD', NULL, NULL, 19),
(686, 'Connecting Rod Bearing', 'STD', NULL, NULL, 20),
(687, 'Connecting Rod Bearing', 'STD', NULL, NULL, 21),
(688, 'Connecting Rod Bearing', 'STD', NULL, NULL, 22),
(689, 'Connecting Rod Bearing', 'STD', NULL, NULL, 23),
(690, 'Connecting Rod Bearing', 'STD', NULL, NULL, 24),
(691, 'Connecting Rod Bearing', 'STD', NULL, NULL, 25),
(692, 'Connecting Rod Bearing', 'STD', NULL, NULL, 26),
(693, 'Connecting Rod Bearing', 'STD', NULL, NULL, 27),
(694, 'Connecting Rod Bearing', 'STD', NULL, NULL, 28),
(695, 'Connecting Rod Bearing', 'STD', NULL, NULL, 29),
(696, 'Bearing', NULL, NULL, NULL, 30),
(697, 'Bearing', NULL, NULL, NULL, 31),
(698, 'Bearing', NULL, NULL, NULL, 32),
(699, 'Bearing', NULL, NULL, NULL, 33),
(700, 'Bearing', NULL, NULL, NULL, 34),
(701, 'Bearing', NULL, NULL, NULL, 35),
(702, 'Bearing', NULL, NULL, NULL, 36),
(703, 'Bearing', NULL, NULL, NULL, 37),
(704, 'Bearing', NULL, NULL, NULL, 38),
(705, 'Bearing', NULL, NULL, NULL, 39),
(706, 'Bearing', NULL, NULL, NULL, 40),
(707, 'Bearing', NULL, NULL, NULL, 41),
(708, 'Bearing', NULL, NULL, NULL, 42),
(709, 'Bearing', NULL, NULL, NULL, 43),
(710, 'Bearing', NULL, NULL, NULL, NULL),
(711, 'Bearing', NULL, NULL, NULL, NULL),
(712, 'Bearing', NULL, NULL, NULL, NULL),
(713, 'Bearing', NULL, NULL, NULL, NULL),
(714, 'Bearing', NULL, NULL, NULL, NULL),
(715, 'Bearing', NULL, NULL, NULL, NULL),
(716, 'Bearing', NULL, NULL, NULL, NULL),
(717, 'Bearing', NULL, NULL, NULL, NULL),
(718, 'Bearing', NULL, NULL, NULL, NULL),
(719, 'Bearing', NULL, NULL, NULL, NULL),
(720, 'Bearing', NULL, NULL, NULL, NULL),
(721, 'Bearing', NULL, NULL, NULL, NULL),
(722, 'Bearing', NULL, NULL, NULL, NULL),
(723, 'Bearing', NULL, NULL, NULL, NULL),
(724, 'Bearing', NULL, NULL, NULL, NULL),
(725, 'Bearing', NULL, NULL, NULL, NULL),
(726, 'Bearing', NULL, NULL, NULL, NULL),
(727, 'Bearing', NULL, NULL, NULL, NULL),
(728, 'Bearing', NULL, NULL, NULL, NULL),
(729, 'Bearing', NULL, NULL, NULL, NULL),
(730, 'Bearing', NULL, NULL, NULL, NULL),
(731, 'Bearing', NULL, NULL, NULL, NULL),
(732, 'Bearing', NULL, NULL, NULL, NULL),
(733, 'Bearing', NULL, NULL, NULL, NULL),
(734, 'Bearing', NULL, NULL, NULL, NULL),
(735, 'Bearing', NULL, NULL, NULL, NULL),
(736, 'Bearing', NULL, NULL, NULL, NULL),
(737, 'Bearing', NULL, NULL, NULL, NULL),
(738, 'Bearing', NULL, NULL, NULL, NULL),
(739, 'Bearing', NULL, NULL, NULL, NULL),
(740, 'Bearing', NULL, NULL, NULL, NULL),
(741, 'Bearing', NULL, NULL, NULL, NULL),
(742, 'Bearing', NULL, NULL, NULL, NULL),
(743, 'Bearing', NULL, NULL, NULL, NULL),
(744, 'Bearing', NULL, NULL, NULL, NULL),
(745, 'Bearing', NULL, NULL, NULL, NULL),
(746, 'Bearing', NULL, NULL, NULL, NULL),
(747, 'Bearing', NULL, NULL, NULL, NULL),
(748, 'Bearing', NULL, NULL, NULL, NULL),
(749, 'Bearing', NULL, NULL, NULL, NULL),
(750, 'Bearing', NULL, NULL, NULL, NULL),
(751, 'Bearing', NULL, NULL, NULL, NULL),
(752, 'Bearing', NULL, NULL, NULL, NULL),
(753, 'Bearing', NULL, NULL, NULL, NULL),
(754, 'Bearing', NULL, NULL, NULL, NULL),
(755, 'Bearing', NULL, NULL, NULL, NULL),
(756, 'Bearing', NULL, NULL, NULL, NULL),
(757, 'Bearing', NULL, NULL, NULL, NULL),
(758, 'Bearing', NULL, NULL, NULL, NULL),
(759, 'Bearing', NULL, NULL, NULL, NULL),
(760, 'Bearing', NULL, NULL, NULL, NULL),
(761, 'Bearing', NULL, NULL, NULL, NULL),
(762, 'Bearing', NULL, NULL, NULL, NULL),
(763, 'Bearing', NULL, NULL, NULL, NULL),
(764, 'Bearing', NULL, NULL, NULL, NULL),
(765, 'Bearing', NULL, NULL, NULL, NULL),
(767, 'Bearing', NULL, NULL, NULL, NULL),
(768, 'Bearing', NULL, NULL, NULL, NULL),
(769, 'Bearing', NULL, NULL, NULL, NULL),
(770, 'Bearing', NULL, NULL, NULL, NULL),
(771, 'Bearing', NULL, NULL, NULL, NULL),
(772, 'Bearing', NULL, NULL, NULL, NULL),
(773, 'Bearing', NULL, NULL, NULL, NULL),
(774, 'Bearing', NULL, NULL, NULL, NULL),
(775, 'Bearing', NULL, NULL, NULL, NULL),
(776, 'Bearing', NULL, NULL, NULL, NULL),
(777, 'Bearing', NULL, NULL, NULL, NULL),
(778, 'Bearing', NULL, NULL, NULL, NULL),
(779, 'Bearing', NULL, NULL, NULL, NULL),
(780, 'Bearing', NULL, NULL, NULL, NULL),
(781, 'Bearing', NULL, NULL, NULL, NULL),
(782, 'Bearing', NULL, NULL, NULL, NULL),
(783, 'Bearing', NULL, NULL, NULL, NULL),
(784, 'Bearing', NULL, NULL, NULL, NULL),
(785, 'Bearing', NULL, NULL, NULL, NULL),
(786, '', NULL, NULL, NULL, NULL),
(787, '', NULL, NULL, NULL, NULL),
(788, '', NULL, NULL, NULL, NULL),
(789, '', NULL, NULL, NULL, NULL),
(790, '', NULL, NULL, NULL, NULL),
(791, '', NULL, NULL, NULL, NULL),
(792, '', NULL, NULL, NULL, NULL),
(793, '', NULL, NULL, NULL, NULL),
(794, '', NULL, NULL, NULL, NULL),
(795, '', NULL, NULL, NULL, NULL),
(796, '', NULL, NULL, NULL, NULL),
(797, '', NULL, NULL, NULL, NULL),
(798, '', NULL, NULL, NULL, NULL),
(799, '', NULL, NULL, NULL, NULL),
(800, '', NULL, NULL, NULL, NULL),
(801, '', NULL, NULL, NULL, NULL),
(802, '', NULL, NULL, NULL, NULL),
(803, '', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201510156 ;

--
-- Dumping data for table `joborders`
--

INSERT INTO `joborders` (`joborderid`, `problem`, `datebrought`, `datestarted`, `datefinished`, `dateclaimed`, `downpayment`, `joprice`, `jostatus`, `preparedby`, `modelno`, `engineno`, `supervisor`, `jotype`, `clientid`) VALUES
(1, 'P1', '2015-10-10', NULL, NULL, NULL, '500.00', '1150.00', 'Pending', 'Noryza Conje', '8', '2392932', 'Benedict Tiong', 'EngRecon', 1),
(2, 'P2', '2015-10-10', NULL, NULL, NULL, '500.00', '600.00', 'Pending', 'Noryza Conje', '6', '343434', 'Brenwin Tiong', 'EngRecon', 6),
(3, 'P1', '2015-10-10', NULL, NULL, NULL, '500.00', '500.00', 'Pending', 'Noryza Conje', '15', '4344343434', 'Benedict Tiong', 'EngRecon', 6),
(4, 'P2', '2015-10-11', NULL, NULL, NULL, '500.00', '2300.00', 'Pending', 'Mikee Roces', '14', '348736478', 'Benedict Tiong', 'EngRecon', 3),
(5, '', '2015-10-11', '2015-10-11', NULL, NULL, '500.00', '500.00', 'Pending', 'Mikee Roces', NULL, NULL, 'Brenwin Tiong', 'Fabrication', 1),
(201510155, 'Problem', '2015-10-15', NULL, NULL, NULL, '500.00', '1600.00', 'Pending', 'Roces, Mikee', '16', '3.2734678236487E+15', 'Tiong, Benedict', 'EngRecon', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

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
(29, '4G33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, NULL, 201510155, 17);

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
