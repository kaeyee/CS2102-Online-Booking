CREATE DATABASE  IF NOT EXISTS `cs2102` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cs2102`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: cs2102
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `booking_record`
--

DROP TABLE IF EXISTS `booking_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_record` (
  `B_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Time` int(11) NOT NULL,
  `Date` date NOT NULL,
  `No_Tables_Required` int(11) NOT NULL DEFAULT '0',
  `Location` varchar(255) NOT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`B_Id`),
  UNIQUE KEY `B_Id_UNIQUE` (`B_Id`),
  KEY `Location_idx` (`Location`),
  CONSTRAINT `Location` FOREIGN KEY (`Location`) REFERENCES `restaurant` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_record`
--

LOCK TABLES `booking_record` WRITE;
/*!40000 ALTER TABLE `booking_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edit`
--

DROP TABLE IF EXISTS `edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit` (
  `B_Id` int(11) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Modified_On` datetime NOT NULL,
  PRIMARY KEY (`B_Id`,`Email_Address`,`Modified_On`),
  KEY `Email_Address_EDIT_idx` (`Email_Address`),
  CONSTRAINT `B_Id_EDIT` FOREIGN KEY (`B_Id`) REFERENCES `booking_record` (`B_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Email_Address_EDIT` FOREIGN KEY (`Email_Address`) REFERENCES `user` (`Email_Address`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edit`
--

LOCK TABLES `edit` WRITE;
/*!40000 ALTER TABLE `edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `make`
--

DROP TABLE IF EXISTS `make`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `make` (
  `B_Id` int(11) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Created_On` datetime NOT NULL,
  PRIMARY KEY (`B_Id`),
  UNIQUE KEY `B_Id_UNIQUE` (`B_Id`),
  KEY `Email_Address_idx` (`Email_Address`),
  CONSTRAINT `B_Id` FOREIGN KEY (`B_Id`) REFERENCES `booking_record` (`B_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Email_Address` FOREIGN KEY (`Email_Address`) REFERENCES `user` (`Email_Address`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `make`
--

LOCK TABLES `make` WRITE;
/*!40000 ALTER TABLE `make` DISABLE KEYS */;
/*!40000 ALTER TABLE `make` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `location` varchar(255) NOT NULL,
  `No_talbes` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`location`),
  UNIQUE KEY `location_UNIQUE` (`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Email_Address` varchar(255) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Salutation` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone_Number` int(11) DEFAULT NULL,
  `Is_Admin` bit(1) NOT NULL DEFAULT b'0',
  `Created_On` datetime NOT NULL,
  PRIMARY KEY (`Email_Address`),
  UNIQUE KEY `Email_Address_UNIQUE` (`Email_Address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-13 15:27:42
