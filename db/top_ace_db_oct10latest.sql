-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: top_ace_db
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Francisco','Trisha','M','09068535509','Female','IC 77, Poblacion, La Trinidad, Benguet'),(3,'Ferreria','Kimberly','R','09169212756','Female','17, Pias, Mapandan, Pangasinan'),(4,'Salavatore','Perry','B','09196478953','Male','23, Quezon Hill, Baguio City'),(5,'Apostol','Shirly','G','09124789624','Female','11, Poblacion, Sta. Barbara, Pangasinan'),(6,'Corla','Elmo','F','09124796524','Male','01, New Lucban, Baguio City'),(7,'Padlan','Karl','I','09153479562','Female','99, Honeymoon Road, Baguio City'),(8,'Villanueva','Aizyl Grace','R','09354789210','Female','18, Malanay, Manaoag, Pangasinan'),(9,'Mamucod','Rico','M','09163254896','Male','12, Trancoville, Baguio City'),(10,'Alcid','Jovanni','Y','09306123945','Male','87, Golden, Moncada, Tarlac City'),(11,'Lomboy','Kissel','E','09154652560','Female','34, Aurora Hill, Baguio City');
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
  `noofjobs` int(5) DEFAULT '0',
  `emptype` enum('Front Desk Personnel','Machinist','Manager') DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Snow','Jon','Stark','09061234567','Male','#3 Winterfell, Baguio City','Active','jonsnow@yahoo.com',0,'Machinist'),(2,'Tiong','Benedict','So','09121212121','Male','Baguio City, Benguet','Active','tiong@gmail.com',0,'Manager'),(3,'Tiong','Brenwin','So','09199829872','Male','Baguio City, Benguet','Active','tiongso@gmail.com',0,'Manager'),(4,'San Pedro','Marvin','Malik','09128718711','Male','Baguio City, Benguet','Active','marvin@gmail.com',0,'Machinist'),(5,'Castro','Jameson','Side','09182763871','Male','La Trinidad, Benguet','Active','castro@yahoo.com',0,'Machinist'),(6,'Conje','Noryza','Reyes','09912877126','Female','Sual, Pangasinan','Active','conje@gmail.com',0,'Front Desk Personnel'),(7,'Roces','Mikee','Ancheta','01216521982','Female','Dagupan, Pangasinan','Active','Roces@gmail.com',0,'Front Desk Personnel');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engrecon`
--

LOCK TABLES `engrecon` WRITE;
/*!40000 ALTER TABLE `engrecon` DISABLE KEYS */;
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
  `fabricationprice` decimal(11,2) DEFAULT NULL,
  `fabricationstatus` enum('Pending','Started','Done') DEFAULT NULL,
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
  `reorderlevel` int(11) DEFAULT '10',
  PRIMARY KEY (`inventoryid`),
  KEY `fk_inventory_modelid_idx` (`modelid`),
  CONSTRAINT `fk_inventory_modelid` FOREIGN KEY (`modelid`) REFERENCES `models` (`modelid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=407 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'Engine Valve',NULL,600.00,100,1,10),(2,'Engine Valve',NULL,400.00,100,2,10),(3,'Engine Value',NULL,300.00,100,3,10),(4,'Engine Value',NULL,350.00,100,4,10),(5,'Engine Value',NULL,245.00,100,5,10),(6,'Engine Value',NULL,150.75,100,6,10),(7,'Engine Value',NULL,340.00,100,7,10),(8,'Engine Value',NULL,245.50,100,8,10),(9,'Engine Value',NULL,120.00,100,9,10),(10,'Engine Value',NULL,135.00,100,10,10),(11,'Engine Value',NULL,450.00,100,11,10),(12,'Engine Value',NULL,345.00,100,12,10),(13,'Engine Value',NULL,254.00,100,13,10),(14,'Engine Value',NULL,323.90,100,14,10),(15,'Engine Value',NULL,445.00,100,15,10),(16,'Engine Value',NULL,345.00,100,16,10),(17,'Engine Value',NULL,167.00,100,17,10),(18,'Engine Value',NULL,340.00,100,18,10),(19,'Engine Value',NULL,231.00,100,19,10),(20,'Engine Value',NULL,609.00,100,20,10),(21,'Engine Value',NULL,780.00,100,21,10),(22,'Engine Value',NULL,890.00,100,22,10),(23,'Engine Value',NULL,1500.00,100,23,10),(24,'Engine Value',NULL,798.00,100,24,10),(25,'Engine Value',NULL,450.00,100,25,10),(26,'Engine Value',NULL,540.00,100,26,10),(27,'Engine Value',NULL,789.00,100,27,10),(28,'Engine Value',NULL,1254.00,100,28,10),(29,'Engine Value',NULL,370.00,100,29,10),(30,'Valve Seal',NULL,450.00,100,1,10),(31,'Valve Seal',NULL,670.00,100,2,10),(32,'Valve Seal',NULL,650.00,100,3,10),(33,'Valve Seal',NULL,340.00,100,4,10),(34,'Valve Seal',NULL,456.00,100,5,10),(35,'Valve Seal',NULL,345.00,100,6,10),(36,'Valve Seal',NULL,567.00,100,7,10),(37,'Valve Seal',NULL,789.00,100,8,10),(38,'Valve Seal',NULL,234.00,100,9,10),(39,'Valve Seal',NULL,670.00,100,10,10),(40,'Valve Seal',NULL,569.00,100,11,10),(41,'Valve Seal',NULL,450.00,100,12,10),(42,'Valve Seal',NULL,680.00,100,13,10),(43,'Valve Seal',NULL,350.00,100,14,10),(44,'Valve Seal',NULL,670.00,100,15,10),(45,'Valve Seal',NULL,345.00,100,16,10),(46,'Valve Seal',NULL,234.50,100,17,10),(47,'Valve Seal',NULL,780.00,100,18,10),(48,'Valve Seal',NULL,760.00,100,19,10),(49,'Valve Seal',NULL,230.00,100,20,10),(50,'Valve Seal',NULL,670.00,100,21,10),(51,'Valve Seal',NULL,345.00,100,22,10),(52,'Valve Seal',NULL,560.00,100,23,10),(53,'Valve Seal',NULL,230.00,100,24,10),(54,'Valve Seal',NULL,440.00,100,25,10),(55,'Valve Seal',NULL,650.00,100,26,10),(56,'Valve Seal',NULL,340.00,100,27,10),(57,'Valve Seal',NULL,560.00,100,28,10),(58,'Valve Seal',NULL,230.00,100,29,10),(59,'Valve Tappet',NULL,450.25,100,1,10),(60,'Valve Tappet',NULL,670.00,100,2,10),(61,'Valve Tappet',NULL,890.00,100,3,10),(62,'Valve Tappet',NULL,450.00,100,4,10),(63,'Valve Tappet',NULL,235.00,100,5,10),(64,'Valve Tappet',NULL,340.00,100,6,10),(65,'Valve Tappet',NULL,790.00,100,7,10),(66,'Valve Tappet',NULL,670.00,100,8,10),(67,'Valve Tappet',NULL,560.00,100,9,10),(68,'Valve Tappet',NULL,777.00,100,10,10),(69,'Valve Tappet',NULL,556.00,100,11,10),(70,'Valve Tappet',NULL,787.50,100,12,10),(71,'Valve Tappet',NULL,340.00,100,13,10),(72,'Valve Tappet',NULL,450.00,100,14,10),(73,'Valve Tappet',NULL,560.00,100,15,10),(74,'Valve Tappet',NULL,435.00,100,16,10),(75,'Valve Tappet',NULL,879.00,100,17,10),(76,'Valve Tappet',NULL,567.00,100,18,10),(77,'Valve Tappet',NULL,845.00,100,19,10),(78,'Valve Tappet',NULL,738.00,100,20,10),(79,'Valve Tappet',NULL,577.00,100,21,10),(80,'Valve Tappet',NULL,535.00,100,22,10),(81,'Valve Tappet',NULL,456.67,100,23,10),(82,'Valve Tappet',NULL,436.90,100,24,10),(83,'Valve Tappet',NULL,789.00,100,25,10),(84,'Valve Tappet',NULL,437.00,100,26,10),(85,'Valve Tappet',NULL,909.00,100,27,10),(86,'Valve Tappet',NULL,999.00,100,28,10),(87,'Valve Tappet',NULL,1456.00,100,29,10),(88,'Valve Insert Ring',NULL,345.00,100,1,10),(89,'Valve Insert Ring',NULL,290.00,100,2,10),(90,'Valve Insert Ring',NULL,560.00,100,3,10),(91,'Valve Insert Ring',NULL,567.25,100,4,10),(92,'Valve Insert Ring',NULL,340.00,100,5,10),(93,'Valve Insert Ring',NULL,670.00,100,6,10),(94,'Valve Insert Ring',NULL,579.00,100,7,10),(95,'Valve Insert Ring',NULL,434.00,100,8,10),(96,'Valve Insert Ring',NULL,790.00,100,9,10),(97,'Valve Insert Ring',NULL,760.00,100,10,10),(98,'Valve Insert Ring',NULL,538.00,100,11,10),(99,'Valve Insert Ring',NULL,560.00,100,12,10),(100,'Valve Insert Ring',NULL,890.00,100,13,10),(101,'Valve Insert Ring',NULL,678.00,100,14,10),(102,'Valve Insert Ring',NULL,560.00,100,15,10),(103,'Valve Insert Ring',NULL,580.00,100,16,10),(104,'Valve Insert Ring',NULL,648.00,100,17,10),(105,'Valve Insert Ring',NULL,457.25,100,18,10),(106,'Valve Insert Ring',NULL,670.00,100,19,10),(107,'Valve Insert Ring',NULL,599.00,100,20,10),(108,'Valve Insert Ring',NULL,234.00,100,21,10),(109,'Valve Insert Ring',NULL,450.00,100,22,10),(110,'Valve Insert Ring',NULL,350.00,100,23,10),(111,'Valve Insert Ring',NULL,435.00,100,24,10),(112,'Valve Insert Ring',NULL,670.00,100,25,10),(113,'Valve Insert Ring',NULL,690.00,100,26,10),(114,'Valve Insert Ring',NULL,345.00,100,27,10),(115,'Valve Insert Ring',NULL,450.00,100,28,10),(116,'Valve Insert Ring',NULL,340.00,100,29,10),(117,'Valve Guide',NULL,550.00,100,1,10),(118,'Valve Guide',NULL,670.00,100,2,10),(119,'Valve Guide',NULL,650.00,100,3,10),(120,'Valve Guide',NULL,890.00,100,4,10),(121,'Valve Guide',NULL,567.00,100,5,10),(122,'Valve Guide',NULL,789.00,100,6,10),(123,'Valve Guide',NULL,567.00,100,7,10),(124,'Valve Guide',NULL,434.25,100,8,10),(125,'Valve Guide',NULL,563.00,100,9,10),(126,'Valve Guide',NULL,233.00,100,10,10),(127,'Valve Guide',NULL,679.00,100,11,10),(128,'Valve Guide',NULL,650.00,100,12,10),(129,'Valve Guide',NULL,345.00,100,13,10),(130,'Valve Guide',NULL,340.00,100,14,10),(131,'Valve Guide',NULL,680.00,100,15,10),(132,'Valve Guide',NULL,650.00,100,16,10),(133,'Valve Guide',NULL,450.00,100,17,10),(134,'Valve Guide',NULL,560.00,100,18,10),(135,'Valve Guide',NULL,450.00,100,19,10),(136,'Valve Guide',NULL,430.00,100,20,10),(137,'Valve Guide',NULL,439.00,100,21,10),(138,'Valve Guide',NULL,467.00,100,22,10),(139,'Valve Guide',NULL,890.00,100,23,10),(140,'Valve Guide',NULL,659.00,100,24,10),(141,'Valve Guide',NULL,888.00,100,25,10),(142,'Valve Guide',NULL,545.00,100,26,10),(143,'Valve Guide',NULL,565.00,100,27,10),(144,'Valve Guide',NULL,456.00,100,28,10),(145,'Valve Guide',NULL,789.00,100,29,10),(146,'Gasket',NULL,770.00,100,1,10),(147,'Gasket',NULL,1349.00,100,2,10),(148,'Gasket',NULL,1569.00,100,3,10),(149,'Gasket',NULL,450.00,100,4,10),(150,'Gasket',NULL,3234.00,100,5,10),(151,'Gasket',NULL,6908.00,100,6,10),(152,'Gasket',NULL,4467.00,100,7,10),(153,'Gasket',NULL,450.00,100,8,10),(154,'Gasket',NULL,230.90,100,9,10),(155,'Gasket',NULL,788.00,100,10,10),(156,'Gasket',NULL,550.00,100,11,10),(157,'Gasket',NULL,2322.00,100,12,10),(158,'Gasket',NULL,1122.00,100,13,10),(159,'Gasket',NULL,3556.00,100,14,10),(160,'Gasket',NULL,7760.00,100,15,10),(161,'Gasket',NULL,560.00,100,16,10),(162,'Gasket',NULL,343.00,100,17,10),(163,'Gasket',NULL,545.00,100,18,10),(164,'Gasket',NULL,324.00,100,19,10),(165,'Gasket',NULL,5455.00,100,20,10),(166,'Gasket',NULL,2122.00,100,21,10),(167,'Gasket',NULL,2215.00,100,22,10),(168,'Gasket',NULL,547.00,100,23,10),(169,'Gasket',NULL,888.00,100,24,10),(170,'Gasket',NULL,887.00,100,25,10),(171,'Gasket',NULL,434.00,100,26,10),(172,'Gasket',NULL,232.00,100,27,10),(173,'Gasket',NULL,3223.00,100,28,10),(174,'Gasket',NULL,546.00,100,29,10),(175,'Piston Ring','0.25,0.5,0.75, STD',776.00,100,1,10),(176,'Piston Ring','0.25,0.5,0.75, STD',725.00,100,2,10),(177,'Piston Ring','0.25,0.5,0.75, STD',566.00,100,3,10),(178,'Piston Ring','0.25,0.5,0.75, STD',766.00,100,4,10),(179,'Piston Ring','0.25,0.5,0.75, STD',450.00,100,5,10),(180,'Piston Ring','0.25,0.5,0.75, STD',650.00,100,6,10),(181,'Piston Ring','0.25,0.5,0.75, STD',1200.50,100,7,10),(182,'Piston Ring','0.25,0.5,0.75, STD',800.00,100,8,10),(183,'Piston Ring','0.25,0.5,0.75, STD',350.00,100,9,10),(184,'Piston Ring','0.25,0.5,0.75, STD',400.00,100,10,10),(185,'Piston Ring','0.25,0.5,0.75, STD',360.00,100,11,10),(186,'Piston Ring','0.25,0.5,0.75, STD',400.00,100,12,10),(187,'Piston Ring','0.25,0.5,0.75, STD',550.00,100,13,10),(188,'Piston Ring','0.25,0.5,0.75, STD',580.25,100,14,10),(189,'Piston Ring','0.25,0.5,0.75, STD',1200.00,100,15,10),(190,'Piston Ring','0.25,0.5,0.75, STD',1100.00,100,16,10),(191,'Piston Ring','0.25,0.5,0.75, STD',580.00,100,17,10),(192,'Piston Ring','0.25,0.5,0.75, STD',500.00,100,18,10),(193,'Piston Ring','0.25,0.5,0.75, STD',650.00,100,19,10),(194,'Piston Ring','0.25,0.5,0.75, STD',750.00,100,20,10),(195,'Piston Ring','0.25,0.5,0.75, STD',700.00,100,21,10),(196,'Piston Ring','0.25,0.5,0.75, STD',720.00,100,22,10),(197,'Piston Ring','0.25,0.5,0.75, STD',680.00,100,23,10),(198,'Piston Ring','0.25,0.5,0.75, STD',600.00,100,24,10),(199,'Piston Ring','0.25,0.5,0.75, STD',1150.00,100,25,10),(200,'Piston Ring','0.25,0.5,0.75, STD',1000.00,100,26,10),(201,'Piston Ring','0.25,0.5,0.75, STD',800.00,100,27,10),(202,'Piston Ring','0.25,0.5,0.75, STD',850.00,100,28,10),(203,'Piston Ring','0.25,0.5,0.75, STD',300.00,100,29,10),(204,'Main Bearing','0.25,0.5,0.75, STD',660.00,100,1,10),(205,'Main Bearing','0.25,0.5,0.75, STD',880.00,100,2,10),(206,'Main Bearing','0.25,0.5,0.75, STD',980.00,100,3,10),(207,'Main Bearing','0.25,0.5,0.75, STD',1000.50,100,4,10),(208,'Main Bearing','0.25,0.5,0.75, STD',650.00,100,5,10),(209,'Main Bearing','0.25,0.5,0.75, STD',850.00,100,6,10),(210,'Main Bearing','0.25,0.5,0.75, STD',360.00,100,7,10),(211,'Main Bearing','0.25,0.5,0.75, STD',480.00,100,8,10),(212,'Main Bearing','0.25,0.5,0.75, STD',370.00,100,9,10),(213,'Main Bearing','0.25,0.5,0.75, STD',460.00,100,10,10),(214,'Main Bearing','0.25,0.5,0.75, STD',460.00,100,11,10),(215,'Main Bearing','0.25,0.5,0.75, STD',450.00,100,12,10),(216,'Main Bearing','0.25,0.5,0.75, STD',550.00,100,13,10),(217,'Main Bearing','0.25,0.5,0.75, STD',580.00,100,14,10),(218,'Main Bearing','0.25,0.5,0.75, STD',600.00,100,15,10),(219,'Main Bearing','0.25,0.5,0.75, STD',650.00,100,16,10),(220,'Main Bearing','0.25,0.5,0.75, STD',700.00,100,17,10),(221,'Main Bearing','0.25,0.5,0.75, STD',400.50,100,18,10),(222,'Main Bearing','0.25,0.5,0.75, STD',660.00,100,19,10),(223,'Main Bearing','0.25,0.5,0.75, STD',730.00,100,20,10),(224,'Main Bearing','0.25,0.5,0.75, STD',390.00,100,21,10),(225,'Main Bearing','0.25,0.5,0.75, STD',450.00,100,22,10),(226,'Main Bearing','0.25,0.5,0.75, STD',470.00,100,23,10),(227,'Main Bearing','0.25,0.5,0.75, STD',520.00,100,24,10),(228,'Main Bearing','0.25,0.5,0.75, STD',500.00,100,25,10),(229,'Main Bearing','0.25,0.5,0.75, STD',600.00,100,26,10),(230,'Main Bearing','0.25,0.5,0.75, STD',400.00,100,27,10),(231,'Main Bearing','0.25,0.5,0.75, STD',390.00,100,28,10),(232,'Main Bearing','0.25,0.5,0.75, STD',380.00,100,29,10),(233,'Connecting Rod Bearing','0.25,0.5,0.75, STD',410.00,100,1,10),(234,'Connecting Rod Bearing','0.25,0.5,0.75, STD',570.00,100,2,10),(235,'Connecting Rod Bearing','0.25,0.5,0.75, STD',580.00,100,3,10),(236,'Connecting Rod Bearing','0.25,0.5,0.75, STD',585.00,100,4,10),(237,'Connecting Rod Bearing','0.25,0.5,0.75, STD',550.90,100,5,10),(238,'Connecting Rod Bearing','0.25,0.5,0.75, STD',290.00,100,6,10),(239,'Connecting Rod Bearing','0.25,0.5,0.75, STD',375.00,100,7,10),(240,'Connecting Rod Bearing','0.25,0.5,0.75, STD',850.00,100,8,10),(241,'Connecting Rod Bearing','0.25,0.5,0.75, STD',800.00,100,9,10),(242,'Connecting Rod Bearing','0.25,0.5,0.75, STD',690.00,100,10,10),(243,'Connecting Rod Bearing','0.25,0.5,0.75, STD',900.00,100,11,10),(244,'Connecting Rod Bearing','0.25,0.5,0.75, STD',1500.00,100,12,10),(245,'Connecting Rod Bearing','0.25,0.5,0.75, STD',1400.00,100,13,10),(246,'Connecting Rod Bearing','0.25,0.5,0.75, STD',400.00,100,14,10),(247,'Connecting Rod Bearing','0.25,0.5,0.75, STD',500.00,100,15,10),(248,'Connecting Rod Bearing','0.25,0.5,0.75, STD',520.00,100,16,10),(249,'Connecting Rod Bearing','0.25,0.5,0.75, STD',530.00,100,17,10),(250,'Connecting Rod Bearing','0.25,0.5,0.75, STD',580.00,100,18,10),(251,'Connecting Rod Bearing','0.25,0.5,0.75, STD',670.00,100,19,10),(252,'Connecting Rod Bearing','0.25,0.5,0.75, STD',680.00,100,20,10),(253,'Connecting Rod Bearing','0.25,0.5,0.75, STD',600.00,100,21,10),(254,'Connecting Rod Bearing','0.25,0.5,0.75, STD',800.00,100,22,10),(255,'Connecting Rod Bearing','0.25,0.5,0.75, STD',900.00,100,23,10),(256,'Connecting Rod Bearing','0.25,0.5,0.75, STD',980.00,100,24,10),(257,'Connecting Rod Bearing','0.25,0.5,0.75, STD',970.00,100,25,10),(258,'Connecting Rod Bearing','0.25,0.5,0.75, STD',600.00,100,26,10),(259,'Connecting Rod Bearing','0.25,0.5,0.75, STD',900.00,100,27,10),(260,'Connecting Rod Bearing','0.25,0.5,0.75, STD',800.00,100,28,10),(261,'Connecting Rod Bearing','0.25,0.5,0.75, STD',860.00,100,29,10),(262,'Thrust Washer',NULL,700.00,100,1,10),(263,'Thrust Washer',NULL,470.00,100,2,10),(264,'Thrust Washer',NULL,860.00,100,3,10),(265,'Thrust Washer',NULL,900.00,100,4,10),(266,'Thrust Washer',NULL,900.00,100,5,10),(267,'Thrust Washer',NULL,860.00,100,6,10),(268,'Thrust Washer',NULL,470.00,100,7,10),(269,'Thrust Washer',NULL,700.00,100,8,10),(270,'Thrust Washer',NULL,800.00,100,9,10),(271,'Thrust Washer',NULL,800.00,100,10,10),(272,'Thrust Washer',NULL,980.00,100,11,10),(273,'Thrust Washer',NULL,600.00,100,12,10),(274,'Thrust Washer',NULL,650.00,100,13,10),(275,'Thrust Washer',NULL,750.75,100,14,10),(276,'Thrust Washer',NULL,1800.00,100,15,10),(277,'Thrust Washer',NULL,1500.00,100,16,10),(278,'Thrust Washer',NULL,700.00,100,17,10),(279,'Thrust Washer',NULL,730.00,100,18,10),(280,'Thrust Washer',NULL,440.00,100,19,10),(281,'Thrust Washer',NULL,399.00,100,20,10),(282,'Thrust Washer',NULL,770.00,100,21,10),(283,'Thrust Washer',NULL,885.00,100,22,10),(284,'Thrust Washer',NULL,880.00,100,23,10),(285,'Thrust Washer',NULL,695.00,100,24,10),(286,'Thrust Washer',NULL,990.00,100,25,10),(287,'Thrust Washer',NULL,1000.00,100,26,10),(288,'Thrust Washer',NULL,188.00,100,27,10),(289,'Thrust Washer',NULL,280.00,100,28,10),(290,'Thrust Washer',NULL,780.00,100,29,10),(291,'Camshaft Bushing',NULL,1000.00,100,1,10),(292,'Camshaft Bushing',NULL,900.00,100,2,10),(293,'Camshaft Bushing',NULL,1500.00,100,3,10),(294,'Camshaft Bushing',NULL,900.00,100,4,10),(295,'Camshaft Bushing',NULL,800.00,100,5,10),(296,'Camshaft Bushing',NULL,500.75,100,6,10),(297,'Camshaft Bushing',NULL,750.00,100,7,10),(298,'Camshaft Bushing',NULL,650.00,100,8,10),(299,'Camshaft Bushing',NULL,600.00,100,9,10),(300,'Camshaft Bushing',NULL,850.00,100,10,10),(301,'Camshaft Bushing',NULL,980.00,100,11,10),(302,'Camshaft Bushing',NULL,1200.00,100,12,10),(303,'Camshaft Bushing','',460.00,100,13,10),(304,'Camshaft Bushing',NULL,600.00,100,14,10),(305,'Camshaft Bushing',NULL,600.00,100,15,10),(306,'Camshaft Bushing',NULL,600.00,100,16,10),(307,'Camshaft Bushing',NULL,700.00,100,17,10),(308,'Camshaft Bushing',NULL,750.00,100,18,10),(309,'Camshaft Bushing',NULL,600.00,100,19,10),(310,'Camshaft Bushing',NULL,600.00,100,20,10),(311,'Camshaft Bushing',NULL,600.00,100,21,10),(312,'Camshaft Bushing',NULL,750.00,100,22,10),(313,'Camshaft Bushing',NULL,750.00,100,23,10),(314,'Camshaft Bushing',NULL,750.00,100,24,10),(315,'Camshaft Bushing',NULL,1200.00,100,25,10),(316,'Camshaft Bushing',NULL,750.00,100,26,10),(317,'Camshaft Bushing',NULL,400.00,100,27,10),(318,'Camshaft Bushing',NULL,800.00,100,28,10),(319,'Camshaft Bushing',NULL,900.00,100,29,10),(320,'Piston Assembly',NULL,900.00,100,1,10),(321,'Piston Assembly',NULL,700.00,100,2,10),(322,'Piston Assembly',NULL,600.00,100,3,10),(323,'Piston Assembly',NULL,650.00,100,4,10),(324,'Piston Assembly',NULL,760.50,100,5,10),(325,'Piston Assembly',NULL,800.00,100,6,10),(326,'Piston Assembly',NULL,990.00,100,7,10),(327,'Piston Assembly',NULL,980.00,100,8,10),(328,'Piston Assembly',NULL,1000.00,100,9,10),(329,'Piston Assembly',NULL,1100.00,100,10,10),(330,'Piston Assembly',NULL,400.00,100,11,10),(331,'Piston Assembly',NULL,500.00,100,12,10),(332,'Piston Assembly',NULL,600.00,100,13,10),(333,'Piston Assembly',NULL,800.00,100,14,10),(334,'Piston Assembly',NULL,750.00,100,15,10),(335,'Piston Assembly',NULL,500.00,100,16,10),(336,'Piston Assembly',NULL,500.60,100,17,10),(337,'Piston Assembly',NULL,800.00,100,18,10),(338,'Piston Assembly',NULL,600.00,100,19,10),(339,'Piston Assembly',NULL,650.00,100,20,10),(340,'Piston Assembly',NULL,1000.00,100,21,10),(341,'Piston Assembly',NULL,770.00,100,22,10),(342,'Piston Assembly',NULL,550.00,100,23,10),(343,'Piston Assembly',NULL,600.00,100,24,10),(344,'Piston Assembly',NULL,500.00,100,25,10),(345,'Piston Assembly',NULL,480.00,100,26,10),(346,'Piston Assembly',NULL,590.00,100,27,10),(347,'Piston Assembly',NULL,100.00,100,28,10),(348,'Piston Assembly',NULL,500.00,100,29,10),(349,'Piston Pin',NULL,600.00,100,1,10),(350,'Piston Pin',NULL,520.00,100,2,10),(351,'Piston Pin',NULL,900.00,100,3,10),(352,'Piston Pin',NULL,670.00,100,4,10),(353,'Piston Pin',NULL,700.00,100,5,10),(354,'Piston Pin',NULL,500.00,100,6,10),(355,'Piston Pin',NULL,600.00,100,7,10),(356,'Piston Pin',NULL,770.00,100,8,10),(357,'Piston Pin',NULL,640.00,100,9,10),(358,'Piston Pin',NULL,680.00,100,10,10),(359,'Piston Pin',NULL,940.00,100,11,10),(360,'Piston Pin',NULL,800.00,100,12,10),(361,'Piston Pin',NULL,670.00,100,13,10),(362,'Piston Pin',NULL,600.00,100,14,10),(363,'Piston Pin',NULL,800.00,100,15,10),(364,'Piston Pin',NULL,700.00,100,16,10),(365,'Piston Pin',NULL,890.00,100,17,10),(366,'Piston Pin',NULL,780.00,100,18,10),(367,'Piston Pin',NULL,700.00,100,19,10),(368,'Piston Pin',NULL,700.00,100,20,10),(369,'Piston Pin',NULL,600.00,100,21,10),(370,'Piston Pin',NULL,700.00,100,22,10),(371,'Piston Pin',NULL,800.00,100,23,10),(372,'Piston Pin',NULL,670.00,100,24,10),(373,'Piston Pin',NULL,760.00,100,25,10),(374,'Piston Pin',NULL,650.00,100,26,10),(375,'Piston Pin',NULL,500.00,100,27,10),(376,'Piston Pin',NULL,900.00,100,28,10),(377,'Piston Pin',NULL,800.00,100,29,10),(378,'Liner',NULL,600.00,100,1,10),(379,'Liner',NULL,400.00,100,2,10),(380,'Liner',NULL,510.00,100,3,10),(381,'Liner',NULL,520.00,100,4,10),(382,'Liner',NULL,840.00,100,5,10),(383,'Liner',NULL,940.00,100,6,10),(384,'Liner',NULL,650.00,100,7,10),(385,'Liner',NULL,720.00,100,8,10),(386,'Liner',NULL,700.00,100,9,10),(387,'Liner',NULL,800.00,100,10,10),(388,'Liner',NULL,760.00,100,11,10),(389,'Liner',NULL,740.00,100,12,10),(390,'Liner',NULL,800.00,100,13,10),(391,'Liner',NULL,700.00,100,14,10),(392,'Liner',NULL,640.00,100,15,10),(393,'Liner',NULL,600.00,100,16,10),(394,'Liner',NULL,500.00,100,17,10),(395,'Liner',NULL,450.00,100,18,10),(396,'Liner',NULL,400.00,100,19,10),(397,'Liner',NULL,300.00,100,20,10),(398,'Liner',NULL,1100.00,100,21,10),(399,'Liner',NULL,1000.00,100,22,10),(400,'Liner',NULL,400.00,100,23,10),(401,'Lner',NULL,700.00,100,24,10),(402,'Lner',NULL,700.00,100,25,10),(403,'Lner',NULL,600.00,100,26,10),(404,'Lner',NULL,550.00,100,27,10),(405,'Lner',NULL,880.00,100,28,10),(406,'Lner',NULL,630.00,100,29,10);
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
  `preparedby` int(11) DEFAULT NULL,
  `modelno` varchar(50) DEFAULT NULL,
  `engineno` varchar(50) DEFAULT NULL,
  `supervisor` int(11) DEFAULT NULL,
  `jotype` enum('EngRecon','Fabrication','EngReconFab') DEFAULT NULL,
  `clientid` int(15) DEFAULT NULL,
  PRIMARY KEY (`joborderid`),
  KEY `fk_joborders_clientid_idx` (`clientid`),
  CONSTRAINT `fk_joborders_clientid` FOREIGN KEY (`clientid`) REFERENCES `clients` (`clientid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joborders`
--

LOCK TABLES `joborders` WRITE;
/*!40000 ALTER TABLE `joborders` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,'4BA1'),(2,'4BB'),(3,'3L/2L'),(4,'2C'),(5,'MAZDA S2'),(6,'MAZDA R2'),(7,'4DR5'),(8,'4M40'),(9,'4D56'),(10,'4D30'),(11,'4HF1'),(12,'10PD'),(13,'6D14'),(14,'6BD1'),(15,'6BG1'),(16,'4D55'),(17,'4D56'),(18,'4D32'),(19,'4HE1'),(20,'4D35'),(21,'4HG1'),(22,'4HJ1'),(23,'PREGIO 3.0'),(24,'7K'),(25,'4K/5K'),(26,'5L'),(27,'2E'),(28,'4G32'),(29,'4G33');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Block Sleeving',1500.00),(2,'Block Washing',1200.00),(3,'Bloack Rebore',5000.00),(4,'Block Hydrotest',500.00),(5,'Block Resurface',600.00),(6,'Block and Con Rod Refitting',800.00),(7,'Block Align Boring',750.00),(8,'Cylinder Head Hydrotest',1200.00),(9,'Cylinder Head Resurface',1100.00),(10,'Cylinder Head Washing ',900.00),(11,'Cylinder Head Cold Welding',950.00),(12,'Valve Seat Insert',550.00),(13,'Valve Gulda Replace',700.00),(14,'Valve Clearance',650.00),(15,'Crankshaft Regrind Mala and Con Rod',850.00),(16,'Crackshaft Gear Pull out',800.00),(17,'Crackshaft Check-up',900.00),(18,'Rear Oil Seal Build-up and and Machining',950.00),(19,'Front Oil Seal Build-up',700.00),(20,'Con Rod Arm Rebushing',500.00),(21,'Con Rod Arm Re-std',1000.00),(22,'Con Rod Arm Alignment',900.00),(23,'Camshaft Bushing Replace',1250.00),(24,'Piston Press In/Out',1100.00),(25,'Piston Rearcove',1300.00),(26,'Side Thrust Fabricate',1500.00),(27,'Side Thrust Build-up and Machining',1450.00),(28,'Idler Gear Rebushing',900.00),(29,'Pulley Re-sleeving-Build-up',800.00);
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

-- Dump completed on 2015-10-10 13:33:23
