CREATE DATABASE  IF NOT EXISTS `babboSegreto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `babboSegreto`;
-- MySQL dump 10.13  Distrib 5.7.36, for Linux (x86_64)
--
-- Host: localhost    Database: babboSegreto
-- ------------------------------------------------------
-- Server version	5.7.36-0ubuntu0.18.04.1

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
-- Table structure for table `pairs`
--

DROP TABLE IF EXISTS `pairs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pairs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter` varchar(45) NOT NULL,
  `gifted` varchar(45) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estrazione` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pairs`
--

LOCK TABLES `pairs` WRITE;
/*!40000 ALTER TABLE `pairs` DISABLE KEYS */;
INSERT INTO `pairs` VALUES (1,'999','999','2021-12-05 14:53:11',0);
/*!40000 ALTER TABLE `pairs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `gruppo` varchar(45) DEFAULT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attivo` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Cappe',NULL,'2021-12-03 14:46:40',1),(2,'Dave',NULL,'2021-12-03 14:46:40',1),(3,'Benni',NULL,'2021-12-03 14:46:40',1),(4,'Cate',NULL,'2021-12-03 14:46:40',1),(5,'Ester',NULL,'2021-12-03 14:46:40',1),(6,'Chicco/Frank/Roffietto',NULL,'2021-12-04 16:14:37',1),(7,'Rinna',NULL,'2021-12-04 16:14:37',1),(8,'Giuli',NULL,'2021-12-04 16:14:37',1),(9,'Chiari',NULL,'2021-12-04 16:14:37',1),(10,'Chicca',NULL,'2021-12-04 16:14:37',1),(11,'Luci',NULL,'2021-12-04 16:14:37',1),(12,'Franci Bri',NULL,'2021-12-04 16:14:37',1),(13,'Luca',NULL,'2021-12-04 16:14:37',1),(14,'Marghe S.',NULL,'2021-12-04 16:14:37',1),(15,'Marghe C.',NULL,'2021-12-04 16:14:37',1),(16,'Pietro',NULL,'2021-12-04 16:14:37',1),(17,'Massa',NULL,'2021-12-04 16:14:37',1),(18,'Lalla',NULL,'2021-12-04 16:14:37',1),(19,'Alice',NULL,'2021-12-04 16:14:37',1),(20,'Lollo',NULL,'2021-12-04 16:14:37',1);
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

-- Dump completed on 2021-12-05 15:53:59
