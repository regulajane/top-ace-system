-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: top_ace_db2
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientid` int(15) NOT NULL AUTO_INCREMENT,
  `cllastname` varchar(50) DEFAULT NULL,
  `clfirstname` varchar(50) DEFAULT NULL,
  `clmidinitial` varchar(5) DEFAULT NULL,
  `clcelno` varchar(15) DEFAULT NULL,
  `clgender` enum('Male','Female') DEFAULT NULL,
  `claddress` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Francisco','Trisha','M','09068535509','Female','IC 77, Poblacion, La Trinidad, Benguet');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `employeeid` int(15) NOT NULL AUTO_INCREMENT,
  `emplastname` varchar(50) DEFAULT NULL,
  `empfirstname` varchar(50) DEFAULT NULL,
  `empmiddlename` varchar(50) DEFAULT NULL,
  `empcelno` varchar(15) DEFAULT NULL,
  `empgender` enum('Male','Female') DEFAULT NULL,
  `empaddress` varchar(300) DEFAULT NULL,
  `empstatus` enum('Active','Inactive') DEFAULT NULL,
  `empemailad` varchar(50) DEFAULT NULL,
  `noofjobs` int(5) DEFAULT NULL,
  `emptype` enum('Front Desk Personnel','Machinist') DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Snow','Jon','Stark','09061234567','Male','#3 Winterfell, Baguio City','Active','jonsnow@yahoo.com',1,'Machinist');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engrecon`
--

DROP TABLE IF EXISTS `engrecon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `engrecon` (
  `engreconid` int(15) NOT NULL AUTO_INCREMENT,
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`engreconid`),
  KEY `fk_engrecon_joborderid_idx` (`joborderid`),
  CONSTRAINT `fk_engrecon_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engrecon`
--

LOCK TABLES `engrecon` WRITE;
/*!40000 ALTER TABLE `engrecon` DISABLE KEYS */;
INSERT INTO `engrecon` VALUES (1,1);
/*!40000 ALTER TABLE `engrecon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engreconfab`
--

DROP TABLE IF EXISTS `engreconfab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `engreconfab` (
  `engreconfabid` int(15) NOT NULL AUTO_INCREMENT,
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`engreconfabid`),
  KEY `fk_engreconfab_joborderid_idx` (`joborderid`),
  CONSTRAINT `fk_engreconfab_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engreconfab`
--

LOCK TABLES `engreconfab` WRITE;
/*!40000 ALTER TABLE `engreconfab` DISABLE KEYS */;
/*!40000 ALTER TABLE `engreconfab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabrications`
--

DROP TABLE IF EXISTS `fabrications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabrications` (
  `fabricationid` int(15) NOT NULL AUTO_INCREMENT,
  `fabricationdesc` varchar(500) DEFAULT NULL,
  `fabricationquantity` int(5) DEFAULT NULL,
  `joborderid` int(15) DEFAULT NULL,
  PRIMARY KEY (`fabricationid`),
  KEY `fk_fabrications_joborderid_idx` (`joborderid`),
  CONSTRAINT `fk_fabrications_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabrications`
--

LOCK TABLES `fabrications` WRITE;
/*!40000 ALTER TABLE `fabrications` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabrications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inventoryid` int(15) NOT NULL AUTO_INCREMENT,
  `inventoryname` varchar(300) DEFAULT NULL,
  `inventorysize` varchar(50) DEFAULT NULL,
  `inventoryprice` decimal(11,2) DEFAULT NULL,
  `inventoryquantity` int(5) DEFAULT NULL,
  `modelid` int(15) DEFAULT NULL,
  PRIMARY KEY (`inventoryid`),
  KEY `fk_inventory_modelid_idx` (`modelid`),
  CONSTRAINT `fk_inventory_modelid` FOREIGN KEY (`modelid`) REFERENCES `models` (`modelid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'Engine Valve',NULL,600.00,3,1);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemlogs`
--

DROP TABLE IF EXISTS `itemlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemlogs` (
  `itemlogid` int(15) NOT NULL AUTO_INCREMENT,
  `itemprice` decimal(11,2) DEFAULT NULL,
  `itemquantity` int(5) DEFAULT NULL,
  `saleid` int(15) DEFAULT NULL,
  `joborderid` int(15) DEFAULT NULL,
  `inventoryid` int(15) DEFAULT NULL,
  PRIMARY KEY (`itemlogid`),
  KEY `fk_itemlogs_saleid_idx` (`saleid`),
  KEY `fk_itemlogs_joborderid_idx` (`joborderid`),
  KEY `fk_itemlogs_inventoryid_idx` (`inventoryid`),
  CONSTRAINT `fk_itemlogs_inventoryid` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemlogs_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemlogs_saleid` FOREIGN KEY (`saleid`) REFERENCES `sales` (`saleid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemlogs`
--

LOCK TABLES `itemlogs` WRITE;
/*!40000 ALTER TABLE `itemlogs` DISABLE KEYS */;
INSERT INTO `itemlogs` VALUES (1,600.00,1,1,1,1);
/*!40000 ALTER TABLE `itemlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joborders`
--

DROP TABLE IF EXISTS `joborders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joborders` (
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
  KEY `fk_joborders_clientid_idx` (`clientid`),
  CONSTRAINT `fk_joborders_clientid` FOREIGN KEY (`clientid`) REFERENCES `clients` (`clientid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joborders`
--

LOCK TABLES `joborders` WRITE;
/*!40000 ALTER TABLE `joborders` DISABLE KEYS */;
INSERT INTO `joborders` VALUES (1,'Defective','2015-08-28','2015-08-28',NULL,NULL,200.00,1500.00,'Pending','Rachel Green','4BA1','S5874DGY','Benedict Tiong','EngRecon',1);
/*!40000 ALTER TABLE `joborders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joemployees`
--

DROP TABLE IF EXISTS `joemployees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joemployees` (
  `joborderid` int(15) NOT NULL,
  `employeeid` int(15) NOT NULL,
  PRIMARY KEY (`joborderid`,`employeeid`),
  KEY `fk_joemployees_employeeid_idx` (`employeeid`),
  CONSTRAINT `fk_joemployees_employeeid` FOREIGN KEY (`employeeid`) REFERENCES `employees` (`employeeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_joemployees_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joemployees`
--

LOCK TABLES `joemployees` WRITE;
/*!40000 ALTER TABLE `joemployees` DISABLE KEYS */;
/*!40000 ALTER TABLE `joemployees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `models` (
  `modelid` int(15) NOT NULL AUTO_INCREMENT,
  `modelno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`modelid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,'4BA1');
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `saleid` int(15) NOT NULL AUTO_INCREMENT,
  `saledate` date DEFAULT NULL,
  `noofitems` int(5) DEFAULT NULL,
  `saleprice` decimal(11,2) DEFAULT NULL,
  `clientid` int(15) DEFAULT NULL,
  PRIMARY KEY (`saleid`),
  KEY `fk_sales_clientid_idx` (`clientid`),
  CONSTRAINT `fk_sales_clientid` FOREIGN KEY (`clientid`) REFERENCES `clients` (`clientid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'2015-08-28',1,500.00,1);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicelogs`
--

DROP TABLE IF EXISTS `servicelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicelogs` (
  `servicelogid` int(15) NOT NULL AUTO_INCREMENT,
  `serviceprice` decimal(11,2) DEFAULT NULL,
  `joborderid` int(15) DEFAULT NULL,
  `serviceid` int(15) DEFAULT NULL,
  PRIMARY KEY (`servicelogid`),
  KEY `fk_servicelogs_joborderid_idx` (`joborderid`),
  KEY `fk_servicelogs_serviceid_idx` (`serviceid`),
  CONSTRAINT `fk_servicelogs_joborderid` FOREIGN KEY (`joborderid`) REFERENCES `joborders` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicelogs_serviceid` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicelogs`
--

LOCK TABLES `servicelogs` WRITE;
/*!40000 ALTER TABLE `servicelogs` DISABLE KEYS */;
INSERT INTO `servicelogs` VALUES (1,1500.00,1,1);
/*!40000 ALTER TABLE `servicelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `serviceid` int(15) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(300) DEFAULT NULL,
  `serviceprice` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Block Sleeving',1500.00);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicesinventory`
--

DROP TABLE IF EXISTS `servicesinventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicesinventory` (
  `serviceid` int(15) NOT NULL,
  `inventoryid` int(15) NOT NULL,
  PRIMARY KEY (`serviceid`,`inventoryid`),
  KEY `fk_servicesinventory_inventoryid_idx` (`inventoryid`),
  CONSTRAINT `fk_servicesinventory_inventoryid` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicesinventory_serviceid` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicesinventory`
--

LOCK TABLES `servicesinventory` WRITE;
/*!40000 ALTER TABLE `servicesinventory` DISABLE KEYS */;
INSERT INTO `servicesinventory` VALUES (1,1);
/*!40000 ALTER TABLE `servicesinventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `userfirstname` varchar(50) DEFAULT NULL,
  `userlastname` varchar(50) DEFAULT NULL,
  `usermidinitial` varchar(5) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin1','admin1','Benedict','Tiong','S','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-24 19:16:36
