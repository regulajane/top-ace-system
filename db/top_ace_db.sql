-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2015 at 02:23 AM
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
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middleinitial` varchar(45) DEFAULT NULL,
  `celno` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `lastname`, `firstname`, `middleinitial`, `celno`, `gender`, `address`) VALUES
(1, 'Balbino', 'Manuel Aldrin', 'D', 906111111, 'male', 'Ilocos Sur'),
(2, 'Borja', 'Adrian', 'S', 906222222, 'male', 'Pangasinan'),
(3, 'Carolino', 'Kevin', 'S', 933333333, 'male', 'Baguio City'),
(4, 'Faelnar', 'Jerico', NULL, 943434344, 'male', NULL),
(5, 'Pambid', 'Russell', NULL, 912331827, 'male', NULL),
(6, 'Conje', 'Noryza Rose', 'L', 928138192, 'female', 'Pangasinan'),
(7, 'Francisco', 'Trisha', NULL, 912837191, 'female', NULL),
(8, 'Roces', 'Mikee', NULL, 912736119, 'female', NULL),
(9, 'Say-awen', 'Regula Jane', NULL, 913165212, 'female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employeeid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `celno` int(11) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `backjob` int(11) DEFAULT NULL,
  `numofjob` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` enum('Active','On leave','Resigned','Terminated') DEFAULT NULL,
  `emailad` varchar(45) DEFAULT NULL,
  `type` enum('Machinist','Frontdesk') DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `lastname`, `firstname`, `celno`, `gender`, `backjob`, `numofjob`, `address`, `status`, `emailad`, `type`) VALUES
(1, 'Snow', 'Jon', 2147483647, 'Male', NULL, NULL, NULL, NULL, NULL, 'Machinist'),
(2, 'Stark', 'Arya', 2147483647, 'Female', NULL, NULL, NULL, NULL, NULL, 'Frontdesk'),
(3, 'Bing', 'Chandler', 2147483647, 'Male', NULL, 1, 'Cebu', 'Active', 'bing@gmail.com', 'Machinist'),
(4, 'Buffet', 'Phoebe', 2147483647, 'Female', NULL, NULL, NULL, NULL, NULL, 'Machinist'),
(5, 'Gellar', 'Monica', 2147483647, 'Female', NULL, NULL, NULL, NULL, NULL, 'Frontdesk'),
(6, 'Gellar', 'Ross', 2147483647, 'Male', NULL, NULL, NULL, NULL, NULL, 'Machinist'),
(7, 'Green', 'Rachel', 2147483647, 'Female', NULL, NULL, NULL, NULL, NULL, 'Frontdesk'),
(8, 'Tribiani', 'Joey', 2147483647, 'Male', NULL, NULL, NULL, NULL, NULL, 'Machinist'),
(9, 'Jovi', 'Bon', 2147483647, 'Male', 0, NULL, 'Baguio City', 'Active', 'bon@gmail.com', 'Machinist'),
(10, 'Roces', 'Mikee', 2147483647, 'Female', 0, NULL, 'Baguio CIty', 'Active', 'roces@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fabrications`
--

CREATE TABLE IF NOT EXISTS `fabrications` (
  `fabricationid` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(45) DEFAULT NULL,
  `fabricationprice` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `dateor` date DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  PRIMARY KEY (`fabricationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fabrications`
--

INSERT INTO `fabrications` (`fabricationid`, `itemname`, `fabricationprice`, `qty`, `dateor`, `clientid`) VALUES
(1, '2C', 100, 1, '2015-09-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `inventoryname` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `inventoryname`, `type`, `size`, `price`, `quantity`) VALUES
(1, '4BA1', 'engine valve', NULL, 250, 10),
(2, '4BB', 'valve seal', NULL, 230, 20),
(3, '2C', 'valve tappet', NULL, 650, 10),
(4, '4DR5', 'valve insert ring', NULL, 450, 20),
(5, '4M40', 'valve guide', NULL, 600, 20),
(6, '4M40', 'gasket', NULL, 500, 30),
(7, '4BA', 'piston ring', '0.25', 630, 20),
(8, '4BA', 'piston ring', 'STD', 450, 10),
(9, '4BB', 'connecting rod bearing', '0.5', 620, 20),
(10, '4D30', 'thrust washer', NULL, 120, 30);

-- --------------------------------------------------------

--
-- Table structure for table `itemlogs`
--

CREATE TABLE IF NOT EXISTS `itemlogs` (
  `itemlogid` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `joborderid` int(11) DEFAULT NULL,
  `inventoryid` int(11) NOT NULL,
  `servicelogid` int(11) DEFAULT NULL,
  `purchaseid` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemlogid`),
  KEY `fk_joborderid_joborder_idx` (`joborderid`),
  KEY `fk_inventoryid_inventory_idx` (`inventoryid`),
  KEY `fk_servicelogid_servicelogs_idx` (`servicelogid`),
  KEY `fk_purchaseid_purchases_idx` (`purchaseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `joborder`
--

CREATE TABLE IF NOT EXISTS `joborder` (
  `joborderid` int(11) NOT NULL AUTO_INCREMENT,
  `problem` varchar(45) DEFAULT NULL,
  `symptoms` varchar(45) DEFAULT NULL,
  `datebrought` date DEFAULT NULL,
  `datestarted` date DEFAULT NULL,
  `datefinished` date DEFAULT NULL,
  `dateclaimed` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `downpayment` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `modelid` int(11) DEFAULT NULL,
  PRIMARY KEY (`joborderid`),
  KEY `fk_clientid_client_idx` (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `joborder`
--

INSERT INTO `joborder` (`joborderid`, `problem`, `symptoms`, `datebrought`, `datestarted`, `datefinished`, `dateclaimed`, `price`, `downpayment`, `status`, `clientid`, `modelid`) VALUES
(41, 'fix', 'fix', '2015-09-17', NULL, NULL, NULL, 5000, 100, 'Pending', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `joemployee`
--

CREATE TABLE IF NOT EXISTS `joemployee` (
  `joborderid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  PRIMARY KEY (`joborderid`,`employeeid`),
  KEY `fk_employeeid_employee_idx` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joemployee`
--

INSERT INTO `joemployee` (`joborderid`, `employeeid`) VALUES
(41, 1),
(41, 4);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `modelid` int(11) NOT NULL AUTO_INCREMENT,
  `modelDesc` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`modelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`modelid`, `modelDesc`, `type`) VALUES
(1, 'Model 1', 'Engine Valve'),
(2, 'Model 2', 'Engine Valve'),
(3, 'Model 3', 'Engine Valve'),
(4, 'Model 4', 'Engine Valve'),
(5, 'Model 5', 'Engine Valve');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `purchaseid` int(11) NOT NULL AUTO_INCREMENT,
  `purchasedate` date DEFAULT NULL,
  `noofitems` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  PRIMARY KEY (`purchaseid`),
  KEY `fk_clientid_client2_idx` (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `servicelogs`
--

CREATE TABLE IF NOT EXISTS `servicelogs` (
  `servicelogid` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `joborderid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  PRIMARY KEY (`servicelogid`),
  KEY `fk_joborderid_joborder3_idx` (`joborderid`),
  KEY `fk_serviceid_services_idx` (`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `servicelogs`
--

INSERT INTO `servicelogs` (`servicelogid`, `price`, `joborderid`, `serviceid`) VALUES
(40, NULL, 41, 2),
(41, NULL, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` enum('special','regular') DEFAULT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `servicename`, `price`, `type`) VALUES
(1, 'Block Washing', 2000, 'regular'),
(2, 'Block Sleeving', 3000, 'regular'),
(3, 'Block Rebore', 3500, 'regular'),
(4, 'Block Hydrotest', 4500, 'regular'),
(5, 'Cylinder Head Hydrotest', 4000, 'regular'),
(6, 'Valve Seat Reface', 2500, 'regular'),
(7, 'Valve Reface', 3300, 'regular'),
(8, 'Crankshaft Check-up', 2100, 'regular'),
(9, 'Piston Regroove', 3000, 'regular'),
(10, 'Side Thrust Fabricate', 5000, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middleinitial` varchar(45) NOT NULL,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `firstname`, `lastname`, `middleinitial`, `usertype`) VALUES
(1, 'admin1', 'admin1', 'Benedict', 'Tiong', 'S.', 'admin'),
(2, 'admin2', 'admin2', 'Brenwin', 'Tiong', 'S.', 'admin'),
(3, 'frontdesk1', 'frontdesk1', 'Bon', 'Jovi', 'L.', 'frontdesk'),
(4, 'frontdesk2', 'frontdesk2', 'Nickel', 'Back', 'B.', 'frontdesk'),
(5, 'invpersonel1', 'invpersonel1', 'Chicken', 'Curry', 'C.', 'invpersonel');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemlogs`
--
ALTER TABLE `itemlogs`
  ADD CONSTRAINT `fk_inventoryid_inventory` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`),
  ADD CONSTRAINT `fk_joborderid_joborder` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`),
  ADD CONSTRAINT `fk_purchaseid_purchases` FOREIGN KEY (`purchaseid`) REFERENCES `purchases` (`purchaseid`),
  ADD CONSTRAINT `fk_servicelogid_servicelogs` FOREIGN KEY (`servicelogid`) REFERENCES `servicelogs` (`servicelogid`);

--
-- Constraints for table `joemployee`
--
ALTER TABLE `joemployee`
  ADD CONSTRAINT `fk_employeeid_employee` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`),
  ADD CONSTRAINT `fk_joborderid_joborder2` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_clientid_client2` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`) ON UPDATE CASCADE;

--
-- Constraints for table `servicelogs`
--
ALTER TABLE `servicelogs`
  ADD CONSTRAINT `fk_joborderid_joborder3` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`),
  ADD CONSTRAINT `fk_serviceid_services` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
