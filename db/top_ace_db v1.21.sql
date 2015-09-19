-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: top_ace_db
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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middleinitial` varchar(45) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `celno` varchar(45) DEFAULT NULL,
  `address` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Snow','Jon','JS','Male','09081234567','Somewhere');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `celno` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `numofjob` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` enum('Active','On leave','Resigned','Terminated') DEFAULT NULL,
  `emailad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Snow','Jon','2147483647','Male',0,'#124 Leonila Hill, Baguio City','Active','jonsnow@gmail.com'),(2,'Stark','Arya','2147483647','Female',0,'89 Betag, La Trinidad, Benguet','Active','aryastark@gmail.com'),(3,'Bing','Chandler','2147483647','Male',0,'98 Malvar, Aurora Hill, Baguio City','Active','chandlerbing@gmail.com'),(4,'Buffet','Phoebe','2147483647','Female',0,'98 Malvar, Aurora Hill, Baguio City','Active','phoebebuffet@gmail.com'),(5,'Gellar','Monica','2147483647','Female',0,'98 Malvar, Aurora Hill, Baguio City','Active','monicagellar@gmail.com'),(6,'Gellar','Ross','2147483647','Male',0,'98 Malvar, Aurora Hill, Baguio City','Active','rossgellar@gmail.com'),(7,'Green','Rachel','2147483647','Female',0,'377 Camp 7, Baguio City','Active','rachelgreen@gmail.com'),(8,'Tribiani','Joey','2147483647','Male',3,'66 Asin Road, Baguio City','Active','joeytribiani@gmail.com'),(13,'Francisco','Trisha','09068535509','Female',2,'La Trinidad Benguet','On leave','franciscotrish@gmail.com'),(14,'Potter','Harry','9565656','Male',1,'#4 Privet Drive, Owl City','Active','yerawizardharry@gmail.com');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `inventoryname` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'4BA1','engine valve',NULL,250,10),(2,'4BB','valve seal',NULL,230,20),(3,'2C','valve tappet',NULL,650,10),(4,'4DR5','valve insert ring',NULL,450,20),(5,'4M40','valve guide',NULL,600,20),(6,'4M40','gasket',NULL,500,30),(7,'4BA','piston ring','0.25',630,20),(8,'4BA','piston ring','STD',450,10),(9,'4BB','connecting rod bearing','0.5',620,20),(10,'4D30','thrust washer',NULL,120,30);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemlogs`
--

DROP TABLE IF EXISTS `itemlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemlogs` (
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
  KEY `fk_purchaseid_purchases_idx` (`purchaseid`),
  CONSTRAINT `fk_inventoryid_inventory` FOREIGN KEY (`inventoryid`) REFERENCES `inventory` (`inventoryid`),
  CONSTRAINT `fk_joborderid_joborder` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`),
  CONSTRAINT `fk_purchaseid_purchases` FOREIGN KEY (`purchaseid`) REFERENCES `purchases` (`purchaseid`),
  CONSTRAINT `fk_servicelogid_servicelogs` FOREIGN KEY (`servicelogid`) REFERENCES `servicelogs` (`servicelogid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemlogs`
--

LOCK TABLES `itemlogs` WRITE;
/*!40000 ALTER TABLE `itemlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joborder`
--

DROP TABLE IF EXISTS `joborder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joborder` (
  `joborderid` int(11) NOT NULL AUTO_INCREMENT,
  `problem` varchar(100) DEFAULT NULL,
  `symptoms` varchar(300) DEFAULT NULL,
  `datebrought` date DEFAULT NULL,
  `datestarted` date DEFAULT NULL,
  `datefinished` date DEFAULT NULL,
  `dateclaimed` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `downpayment` double DEFAULT NULL,
  `status` enum('Done','Pending','Ongoing') DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  PRIMARY KEY (`joborderid`),
  KEY `fk_clientid_client_idx` (`clientid`),
  CONSTRAINT `fk_clientid_client` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joborder`
--

LOCK TABLES `joborder` WRITE;
/*!40000 ALTER TABLE `joborder` DISABLE KEYS */;
INSERT INTO `joborder` VALUES (2,'Something','Something','0000-00-00','0000-00-00','0000-00-00','0000-00-00',1000,200,'Done',1),(3,'Something','Soemthing','2015-09-02','2015-09-02','2015-09-02','2015-09-02',500,100,'Ongoing',1);
/*!40000 ALTER TABLE `joborder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joemployee`
--

DROP TABLE IF EXISTS `joemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joemployee` (
  `joborderid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  PRIMARY KEY (`joborderid`,`employeeid`),
  KEY `fk_employeeid_employee_idx` (`employeeid`),
  CONSTRAINT `fk_employeeid_employee` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`),
  CONSTRAINT `fk_joborderid_joborder2` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joemployee`
--

LOCK TABLES `joemployee` WRITE;
/*!40000 ALTER TABLE `joemployee` DISABLE KEYS */;
INSERT INTO `joemployee` VALUES (2,1),(3,1),(2,2),(3,2);
/*!40000 ALTER TABLE `joemployee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `purchaseid` int(11) NOT NULL AUTO_INCREMENT,
  `purchasedate` date DEFAULT NULL,
  `noofitems` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  PRIMARY KEY (`purchaseid`),
  KEY `fk_clientid_client2_idx` (`clientid`),
  CONSTRAINT `fk_clientid_client2` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicelogs`
--

DROP TABLE IF EXISTS `servicelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicelogs` (
  `servicelogid` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `joborderid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  PRIMARY KEY (`servicelogid`),
  KEY `fk_joborderid_joborder3_idx` (`joborderid`),
  KEY `fk_serviceid_services_idx` (`serviceid`),
  CONSTRAINT `fk_joborderid_joborder3` FOREIGN KEY (`joborderid`) REFERENCES `joborder` (`joborderid`),
  CONSTRAINT `fk_serviceid_services` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicelogs`
--

LOCK TABLES `servicelogs` WRITE;
/*!40000 ALTER TABLE `servicelogs` DISABLE KEYS */;
INSERT INTO `servicelogs` VALUES (1,100,2,1),(2,100,2,2);
/*!40000 ALTER TABLE `servicelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` enum('Special','Regular') DEFAULT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Block Washing',2000,'Regular'),(2,'Block Sleeving',3000,'Regular'),(3,'Block Rebore',3500,'Regular'),(4,'Block Hydrotest',4500,'Regular'),(5,'Cylinder Head Hydrotest',4000,'Regular'),(6,'Valve Seat Reface',2500,'Regular'),(7,'Valve Reface',3300,'Regular'),(8,'Crankshaft Check-up',2100,'Regular'),(9,'Piston Regroove',3000,'Regular'),(10,'Side Thrust Fabricate',5000,'Regular');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middleinitial` varchar(45) NOT NULL,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin1','admin1','Benedict','Tiong','S.','admin'),(2,'admin2','admin2','Brenwin','Tiong','S.','admin'),(3,'frontdesk1','frontdesk1','Bon','Jovi','L.','frontdesk'),(4,'frontdesk2','frontdesk2','Nickel','Back','B.','frontdesk'),(5,'invpersonel1','invpersonel1','Chicken','Curry','C.','invpersonel');
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

-- Dump completed on 2015-09-19 14:00:28
