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
  `Email_Address` varchar(255) NOT NULL,
  `Time` int(11) NOT NULL,
  `Date` date NOT NULL,
  `No_Table` int(11) NOT NULL DEFAULT '0',
  `Location` varchar(255) NOT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Created_On` datetime DEFAULT NULL,
  PRIMARY KEY (`B_Id`),
  UNIQUE KEY `B_Id_UNIQUE` (`B_Id`),
  KEY `Location_idx` (`Location`),
  KEY `Email_Address_idx` (`Email_Address`),
  CONSTRAINT `Email_Address` FOREIGN KEY (`Email_Address`) REFERENCES `user` (`Email_Address`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Location` FOREIGN KEY (`Location`) REFERENCES `restaurant` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_record`
--

LOCK TABLES `booking_record` WRITE;
/*!40000 ALTER TABLE `booking_record` DISABLE KEYS */;
INSERT INTO `booking_record` VALUES (1,'asdfa',1130,'2014-10-22',1,'Jurong East','','2014-10-19 19:15:54'),(2,'asdfa',1130,'2014-10-22',1,'Jurong East','','2014-10-19 19:21:09'),(3,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:43:47'),(4,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:45:46'),(5,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:50:16'),(6,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:50:37'),(7,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:51:09'),(8,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:51:37'),(9,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:55:28'),(10,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:56:10'),(11,'asdfa',1230,'2014-10-21',1,'Jurong East','','2014-10-20 14:57:02'),(12,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:59:14'),(13,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:59:18'),(14,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 14:59:29'),(15,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:00:33'),(16,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:00:47'),(17,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:03:05'),(18,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:03:07'),(19,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:04:38'),(20,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:08:38'),(21,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:08:59'),(22,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:09:29'),(23,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:10:03'),(24,'asdfa',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:10:17'),(25,'kaeyee1014@gmail.com',1,'2014-10-28',1,'Jurong East','','2014-10-26 13:52:39'),(26,'kaeyee1014@gmail.com',1130,'2014-10-27',1,'Jurong East','','2014-10-26 13:58:08'),(27,'kaeyee1014@gmail.com',1130,'2014-10-27',1,'Jurong East','','2014-10-26 13:58:43'),(28,'kaeyee1014@gmail.com',1130,'2014-10-28',5,'Jurong East','','2014-10-26 13:59:04'),(29,'kaeyee1014@gmail.com',1130,'2014-10-28',5,'Jurong East','','2014-10-26 14:05:50');
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
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `location` varchar(255) NOT NULL,
  `No_tables` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`location`),
  UNIQUE KEY `location_UNIQUE` (`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES ('Jurong East',10),('Orchard',100);
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
INSERT INTO `user` VALUES ('asdfa','asdf','asdfa','Mr','12312sfa',123123123,'\0','2014-10-16 09:40:17'),('asdfa@gmail.com','asdfasdfadsfad','asdfasdfasdfas','Dr','12312312',12312312,'\0','2014-10-20 21:49:18'),('asdfadsfasdf','dfadsf','adfadsf','Dr','123sdas',2312312,'\0','2014-10-16 14:37:48'),('asdfasd','asdfasdf','adsfasd','Dr','123asdf',123123,'\0','2014-10-15 21:49:56'),('aswww','1adasd','assw','Dr','asaw1s',1234,'\0','2014-10-15 21:50:16'),('dsfadfadf','adfads','asdfsdd','Dr','`122',12312312,'\0','2014-10-16 14:37:13'),('kaeyee1014@gmail.com','Siew','Kae Yee','Dr','cs2101kaeyee',97204796,'','2014-10-21 00:13:18');
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

-- Dump completed on 2014-10-26 14:39:22
