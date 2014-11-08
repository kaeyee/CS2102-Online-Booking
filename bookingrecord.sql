CREATE DATABASE  IF NOT EXISTS `cs2102` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cs2102`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: cs2102
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
  PRIMARY KEY (`B_Id`,`Location`),
  UNIQUE KEY `B_Id_UNIQUE` (`B_Id`),
  KEY `Location_idx` (`Location`),
  KEY `Email_Address_idx` (`Email_Address`),
  CONSTRAINT `Email_Address` FOREIGN KEY (`Email_Address`) REFERENCES `user` (`Email_Address`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Location` FOREIGN KEY (`Location`) REFERENCES `restaurant` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_record`
--

LOCK TABLES `booking_record` WRITE;
/*!40000 ALTER TABLE `booking_record` DISABLE KEYS */;
INSERT INTO `booking_record` VALUES (11,'asdfa@gmail.com',1230,'2014-10-21',1,'Jurong East','','2014-10-20 14:57:02'),(20,'asdfa@gmail.com',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:08:38'),(24,'asdfa@gmail.com',1130,'2014-10-21',1,'Jurong East','','2014-10-20 15:10:17'),(27,'kaeyee1014@gmail.com',1130,'2014-10-27',1,'Jurong East','','2014-10-26 13:58:43'),(28,'kaeyee1014@gmail.com',1130,'2014-10-28',5,'Jurong East','','2014-10-26 13:59:04'),(29,'kaeyee1014@gmail.com',1130,'2014-10-28',5,'Jurong East','','2014-10-26 14:05:50'),(30,'angie@gmail.com',1230,'2014-11-27',3,'Bishan','','2014-11-08 20:29:48'),(31,'asdfa@gmail.com',1830,'2014-11-12',1,'Tuas Link','There are 2 babies coming. Hope to provided baby\'s chairs','2014-11-08 20:30:47'),(32,'dingku6chong2002@msn.com',1230,'2014-11-11',2,'Bugis','','2014-11-08 20:31:48'),(33,'dingku6chong2002@msn.com',1830,'2014-11-22',1,'Bugis','','2014-11-08 20:32:02'),(34,'dingku6chong2002@msn.com',1830,'2014-11-23',1,'Admiralty','','2014-11-08 20:32:13'),(35,'chenchen@gmail.com',1900,'2014-11-24',2,'Kent Ridge','AMCISA party','2014-11-08 20:33:19'),(36,'chenchen@gmail.com',1900,'2014-11-26',1,'Boon Lay','with NTU','2014-11-08 20:34:26'),(37,'dingkuanchong2003@msn.com',1830,'2014-12-06',3,'Admiralty','Hope the 3 tables are at beside each other','2014-11-08 20:35:50'),(38,'fanaduh2012@hotmail.com',1130,'2014-11-25',5,'Telok Blangah','','2014-11-08 20:40:08'),(39,'fanaduh2012@hotmail.com',1800,'2014-11-29',2,'Telok Blangah','','2014-11-08 20:40:24'),(40,'fanaduh2012@hotmail.com',1230,'2014-11-30',4,'Ang Mo Kio','','2014-11-08 20:40:35'),(41,'dingkuanchong2010@msn.com',1830,'2014-11-18',4,'Bishan','','2014-11-08 20:41:08'),(42,'dingkuanchong2010@msn.com',1830,'2014-11-18',5,'Pasir Ris','','2014-11-08 20:41:24'),(43,'gohengchye12@msn.com',1800,'2014-12-25',2,'Clementi','','2014-11-08 20:42:12'),(44,'gohengchye12@msn.com',1230,'2014-11-25',1,'Chinatown','','2014-11-08 20:42:28'),(45,'gohengchye12@msn.com',1830,'2015-01-13',4,'Bras Basah','','2014-11-08 20:44:22'),(46,'hengzhemin95@yahoo.com',1800,'2014-11-10',3,'Bayfront','','2014-11-08 20:45:54'),(47,'hengzhemin95@yahoo.com',1800,'2014-11-15',3,'Bayfront','','2014-11-08 20:46:03'),(48,'hengzhemin95@yahoo.com',1230,'2014-11-30',2,'Ang Mo Kio','','2014-11-08 20:46:43'),(49,'fanan999@hotmail.com',1230,'2014-11-25',3,'Aljunied','','2014-11-08 20:47:29'),(50,'fanan999@hotmail.com',1830,'2014-11-26',4,'City Hall','','2014-11-08 20:47:42'),(51,'fanan999@hotmail.com',1130,'2014-11-27',1,'Botanic Gardens','','2014-11-08 20:47:50'),(52,'fanan999@hotmail.com',1130,'2014-11-29',2,'Bukit Panjang','','2014-11-08 20:48:01'),(53,'ge1992@hotmail.com',1230,'2014-11-22',1,'Stadium','','2014-11-08 20:48:28'),(54,'ge1992@hotmail.com',1900,'2014-11-26',5,'Bukit Gombak','can prepare beer?','2014-11-08 20:48:52'),(55,'ge1992@hotmail.com',1830,'2014-11-09',2,'Holland Village','','2014-11-08 20:49:07'),(56,'geyufu92@hotmail.com',1830,'2014-11-10',2,'Bukit Panjang','','2014-11-08 20:49:33'),(57,'geyufu92@hotmail.com',1800,'2014-11-27',1,'Buangkok','','2014-11-08 20:49:44'),(58,'fanzen2013@hotmail.com',1200,'2014-11-25',3,'Boon Lay','','2014-11-08 20:50:24'),(59,'fanzen2013@hotmail.com',1900,'2014-12-05',5,'Bukit Batok','','2014-11-08 20:50:41'),(60,'lindan@gmail.com',1800,'2014-11-24',5,'Commonwealth','badminton celebration\r\n','2014-11-08 20:51:20'),(61,'lindan@gmail.com',1900,'2014-11-27',1,'Kranji','another celebration','2014-11-08 20:51:36'),(62,'lindan@gmail.com',1230,'2014-12-19',1,'Queenstown','','2014-11-08 20:51:55'),(63,'longlongwei@msn.com',1130,'2014-11-12',1,'Braddell','','2014-11-08 20:53:13'),(64,'longlongwei@msn.com',1900,'2014-12-21',1,'Woodlands','','2014-11-08 20:53:25'),(65,'longlongwei@msn.com',1830,'2014-11-26',3,'Tuas Link','','2014-11-08 20:53:35'),(66,'liuzhanpeng2011@msn.com',1800,'2014-11-19',5,'Clementi','','2014-11-08 20:54:04'),(67,'liuzhanpeng2011@msn.com',1230,'2014-11-15',1,'Bugis','','2014-11-08 20:54:15'),(68,'liuzhanpeng2011@msn.com',1900,'2014-11-30',1,'Tiong Bahru','','2014-11-08 20:54:25'),(69,'pengjiayuan2@hotmail.com',1200,'2014-11-12',3,'Yew Tee','','2014-11-08 20:54:53'),(70,'pengjiayuan2@hotmail.com',1830,'2014-11-27',5,'Beauty World','','2014-11-08 20:55:04'),(71,'pengjiayuan2@hotmail.com',1230,'2014-11-09',3,'Tai Seng','','2014-11-08 20:55:17'),(72,'liuzhanpeng2011@msn.com',1200,'2015-02-06',1,'Bukit Gombak','','2014-11-08 20:55:42'),(73,'huangran1995@yahoo.com',1130,'2015-01-31',1,'Botanic Gardens','','2014-11-08 20:56:29'),(74,'lerxinkoh@msn.com',1800,'2014-12-28',2,'Bukit Panjang','','2014-11-08 20:57:18'),(75,'lerxinkoh@msn.com',1830,'2014-11-13',5,'Little India','','2014-11-08 20:57:31'),(76,'lerxinkoh@msn.com',1800,'2014-11-10',4,'Serangoon','','2014-11-08 20:57:44'),(77,'luizhanpeng1995@msn.com',1130,'2014-11-19',1,'Admiralty','','2014-11-08 20:58:10'),(78,'luizhanpeng1995@msn.com',1130,'2014-11-15',1,'City Hall','','2014-11-08 20:58:21'),(79,'luizhanpeng1995@msn.com',1130,'2014-11-25',3,'Haw Par Villa','','2014-11-08 20:58:30'),(80,'zhengzhong76@yahoo.com',1230,'2014-11-26',2,'Aljunied','Mentors outing','2014-11-08 20:59:06'),(81,'zhengzhong76@yahoo.com',1200,'2014-11-25',3,'Braddell','','2014-11-08 20:59:17'),(82,'zhengzhong76@yahoo.com',1130,'2014-11-27',1,'Sembawang','','2014-11-08 20:59:25'),(83,'zhengzhong76@yahoo.com',1200,'2014-11-22',1,'Bukit Brown','','2014-11-08 20:59:37'),(84,'zhengzhong76@yahoo.com',1200,'2015-01-09',1,'Kovan','','2014-11-08 20:59:51'),(85,'tayweiguo1981@msn.com',1830,'2014-11-26',2,'Bugis','','2014-11-08 21:00:34'),(86,'tayweiguo1981@msn.com',1230,'2014-11-10',2,'Habour Front','','2014-11-08 21:00:43'),(87,'tayweiguo1981@msn.com',1830,'2014-11-14',5,'Hillview','','2014-11-08 21:00:54'),(88,'xiexin2012@gmail.com',1800,'2014-11-19',1,'Bishan','need baby seats','2014-11-08 21:01:28'),(89,'xiexin2012@gmail.com',1830,'2014-11-12',5,'Bartley','','2014-11-08 21:01:38'),(90,'pengjioon011@hotmail.com',1900,'2014-11-25',1,'Aljunied','','2014-11-08 21:02:10'),(91,'pengjioon011@hotmail.com',1200,'2014-12-01',4,'Bayfront','','2014-11-08 21:02:26'),(92,'ongkahhong195@gmail.com',1130,'2014-11-16',1,'Buangkok','vegeterian','2014-11-08 21:03:21'),(93,'ongkahhong195@gmail.com',1230,'2014-11-14',1,'Orchard','','2014-11-08 21:03:30'),(94,'luiyuyao@hotmail.com',1900,'2014-11-13',5,'Orchard','','2014-11-08 21:03:55'),(95,'luiyuyao@hotmail.com',1800,'2014-12-10',1,'Boon Lay','','2014-11-08 21:04:06'),(96,'huangran1995@yahoo.com',1130,'2014-11-12',1,'Boon Keng','','2014-11-08 21:04:53'),(97,'huangran1995@yahoo.com',1230,'2014-11-27',1,'Bishan','','2014-11-08 21:05:05'),(98,'dingkuanchong20@msn.com',1130,'2014-11-24',1,'Choa Chu Kang','','2014-11-08 21:05:35'),(99,'dingkuanchong20@msn.com',1830,'2014-11-18',1,'Aljunied','','2014-11-08 21:05:46'),(100,'fanasn2014@hotmail.com',1130,'2014-11-27',1,'Toa Payoh','','2014-11-08 21:09:26'),(101,'fanasn2014@hotmail.com',1230,'2014-12-14',1,'Bedok','','2014-11-08 21:09:41'),(102,'fanbowan4@hotmail.com',1130,'2014-11-12',1,'Canberra','','2014-11-08 21:10:23'),(103,'fanbowan4@hotmail.com',1800,'2014-11-26',1,'Changi Airport','','2014-11-08 21:11:36'),(104,'dingkuanchong2010@msn.com',1800,'2014-11-25',1,'Tanjong Pagar','','2014-11-08 21:12:14'),(105,'geyu661992@hotmail.com',1230,'2014-11-15',1,'Boon Keng','','2014-11-08 21:12:44'),(106,'huangran1993@yahoo.com',1230,'2014-11-20',3,'Orchard','','2014-11-08 21:13:33'),(107,'huangran1993@yahoo.com',1830,'2014-12-25',1,'Orchard','','2014-11-08 21:13:45'),(108,'ongkahhong@gmail.com',1230,'2014-11-30',4,'Bugis','','2014-11-08 21:15:00'),(109,'ongkahhong@gmail.com',1900,'2014-11-14',1,'Ang Mo Kio','','2014-11-08 21:15:12'),(110,'ongkahhong@gmail.com',1900,'2014-11-10',4,'Expo','','2014-11-08 21:16:07'),(111,'ongkahhong@gmail.com',1130,'2014-12-09',3,'Botanic Gardens','','2014-11-08 21:16:22'),(112,'ongkahhong@gmail.com',1800,'2014-11-15',1,'Tai Seng','','2014-11-08 21:16:35'),(113,'penggeyuan2011@hotmail.com',1800,'2014-11-19',1,'Clarke Quay','','2014-11-08 21:17:18'),(114,'ongkahhong98@gmail.com',1900,'2014-11-10',3,'Choa Chu Kang','','2014-11-08 21:18:54'),(115,'fanrandyan67@hotmail.com',1830,'2014-12-18',1,'Bukit Gombak','','2014-11-08 21:20:11'),(116,'fanrandyan67@hotmail.com',1900,'2014-11-22',5,'Bartley','','2014-11-08 21:20:20'),(117,'fanrandyan67@hotmail.com',1900,'2014-11-12',5,'Kent Ridge','','2014-11-08 21:20:32'),(118,'fanrandyan67@hotmail.com',1230,'2014-11-24',1,'Tampines','','2014-11-08 21:21:27'),(119,'dingkua654ong1@msn.com',1230,'2014-11-18',1,'Hillview','','2014-11-08 21:22:19'),(120,'dingkua654ong1@msn.com',1800,'2014-11-13',2,'One-North','','2014-11-08 21:22:32'),(121,'dingkua654ong1@msn.com',1130,'2014-11-19',1,'Botanic Gardens','','2014-11-08 21:23:03'),(122,'chenchen@gmail.com',1900,'2014-11-12',5,'Kent Ridge','','2014-11-08 21:23:30'),(123,'gohengchye2014@msn.com',1800,'2014-11-18',4,'Orchard','','2014-11-08 21:24:43'),(124,'gohengchye2014@msn.com',1830,'2014-11-27',4,'Bugis','','2014-11-08 21:24:54');
/*!40000 ALTER TABLE `booking_record` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-08 21:26:10
