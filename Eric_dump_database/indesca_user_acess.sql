CREATE DATABASE  IF NOT EXISTS `indesca` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `indesca`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: indesca
-- ------------------------------------------------------
-- Server version	8.0.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `user_acess`
--

DROP TABLE IF EXISTS `user_acess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_acess` (
  `id_user_acess` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_gsbdd` int NOT NULL,
  `current_acess` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user_acess`),
  KEY `FK_user_acess_user` (`id_user`),
  KEY `doublon` (`id_gsbdd`,`id_user`),
  CONSTRAINT `FK_user_acess_gsbdd` FOREIGN KEY (`id_gsbdd`) REFERENCES `gsbdd` (`id_gsbdd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_acess_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_acess`
--

LOCK TABLES `user_acess` WRITE;
/*!40000 ALTER TABLE `user_acess` DISABLE KEYS */;
INSERT INTO `user_acess` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,1,29,1),(32,2,2,0),(33,2,3,1),(34,2,4,1),(36,4,2,1),(40,10,20,0),(47,2,1,1),(48,14,3,1),(49,14,1,0),(50,2,5,1),(51,2,7,1),(52,2,10,1),(53,2,8,1),(54,2,9,1),(55,2,14,1),(56,2,15,1),(57,2,16,1),(58,2,17,1),(59,2,18,1),(60,2,20,1),(61,2,19,1),(62,2,21,1),(63,2,22,1),(64,1,34,1),(65,1,9,1),(66,1,30,1),(67,1,31,1),(68,1,32,1),(69,1,33,1),(70,2,56,1),(71,1,35,1),(72,2,23,1),(73,1,36,1),(74,2,24,1),(75,2,25,1),(76,1,37,1),(77,2,27,1),(78,1,38,1),(79,2,28,1),(80,1,39,1),(81,2,29,1),(82,2,30,1),(83,1,41,1),(84,2,31,1),(85,1,40,1),(86,2,32,1),(87,1,42,1),(88,2,33,1),(89,1,43,1),(90,2,34,1),(91,1,55,1),(92,2,35,1),(93,2,36,1),(94,1,56,1),(95,2,37,1),(96,1,59,1),(97,2,38,1),(98,2,39,1),(99,1,57,1),(100,2,40,1),(101,1,58,1),(102,2,41,1),(103,1,60,1),(104,1,51,1),(105,2,42,1),(106,1,52,1),(107,2,43,1),(108,1,54,1),(109,2,55,1),(110,1,53,1),(111,2,59,1),(112,2,57,1),(114,2,58,1),(115,1,47,1),(116,2,60,1),(117,1,45,1),(118,2,51,1),(119,1,46,1),(120,2,54,1),(121,2,53,1),(122,1,48,1),(124,1,50,1),(125,2,47,1),(126,1,49,1),(127,2,45,1),(128,2,46,1),(130,2,48,1),(131,2,49,1),(132,2,50,1),(133,2,6,1),(134,2,11,1),(135,2,12,1),(136,2,13,1),(137,2,52,1),(138,1,68,1),(139,1,69,1),(140,1,71,1),(141,1,74,1),(142,1,76,1),(143,2,76,1),(144,2,68,1),(145,2,69,1),(146,2,71,1),(147,2,26,1),(148,2,74,1),(151,22,1,0),(152,30,2,1),(153,29,1,1);
/*!40000 ALTER TABLE `user_acess` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-13 13:20:22
