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
-- Table structure for table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `connexion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time_connexion` varchar(20) NOT NULL,
  `connexion_name` varchar(255) NOT NULL,
  `connexion_domain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connexion`
--

LOCK TABLES `connexion` WRITE;
/*!40000 ALTER TABLE `connexion` DISABLE KEYS */;
INSERT INTO `connexion` VALUES (1,'2023-10-10 08:14:00','%username%\n','%COMPUTERNAME%\n'),(2,'2023-10-10 08:14:00','%username%\n','%COMPUTERNAME%\n'),(3,'2023-10-10 11:47:07','%username%\n','%COMPUTERNAME%\n'),(4,'2023-10-10 11:47:07','%username%\n','%COMPUTERNAME%\n'),(5,'2023-10-12 13:12:41','%username%\n','%COMPUTERNAME%\n'),(6,'2023-10-12 13:12:41','%username%\n','%COMPUTERNAME%\n'),(7,'2023-10-16 07:30:52','%username%\n','%COMPUTERNAME%\n'),(8,'2023-10-16 07:30:52','%username%\n','%COMPUTERNAME%\n'),(9,'2023-10-16 07:39:38','%username%\n','%COMPUTERNAME%\n'),(10,'2023-10-16 07:39:38','%username%\n','%COMPUTERNAME%\n'),(11,'2023-10-17 07:26:50','%username%\n','%COMPUTERNAME%\n'),(12,'2023-10-17 07:26:50','%username%\n','%COMPUTERNAME%\n'),(13,'2023-10-20 13:19:35','%username%\n','%COMPUTERNAME%\n'),(14,'2023-10-20 13:19:35','%username%\n','%COMPUTERNAME%\n'),(15,'2023-10-23 06:47:46','%username%\n','%COMPUTERNAME%\n'),(16,'2023-10-23 06:47:46','%username%\n','%COMPUTERNAME%\n'),(17,'2023-10-24 06:38:52','%username%\n','%COMPUTERNAME%\n'),(18,'2023-10-24 06:38:52','%username%\n','%COMPUTERNAME%\n'),(19,'2023-10-24 06:41:53','%username%\n','%COMPUTERNAME%\n'),(20,'2023-10-24 06:41:53','%username%\n','%COMPUTERNAME%\n'),(21,'2023-10-24 07:16:59','%username%\n','%COMPUTERNAME%\n'),(22,'2023-10-24 07:16:59','%username%\n','%COMPUTERNAME%\n'),(23,'2023-10-24 10:42:22','%username%\n','%COMPUTERNAME%\n'),(24,'2023-10-24 10:42:22','%username%\n','%COMPUTERNAME%\n'),(25,'2023-10-24 11:09:00','%username%\n','%COMPUTERNAME%\n'),(26,'2023-10-24 11:09:00','%username%\n','%COMPUTERNAME%\n'),(27,'2023-10-24 11:09:56','%username%\n','%COMPUTERNAME%\n'),(28,'2023-10-24 11:09:56','%username%\n','%COMPUTERNAME%\n'),(29,'2023-10-24 11:30:12','%username%\n','%COMPUTERNAME%\n'),(30,'2023-10-24 11:30:12','%username%\n','%COMPUTERNAME%\n'),(31,'2023-10-24 12:32:07','%username%\n','%COMPUTERNAME%\n'),(32,'2023-10-24 12:32:07','%username%\n','%COMPUTERNAME%\n'),(33,'2023-11-06 07:42:56','%username%\n','%COMPUTERNAME%\n'),(34,'2023-11-06 07:42:56','%username%\n','%COMPUTERNAME%\n'),(35,'2023-11-06 08:07:22','%username%\n','%COMPUTERNAME%\n'),(36,'2023-11-06 08:07:22','%username%\n','%COMPUTERNAME%\n'),(37,'2023-11-06 08:47:00','%username%\n','%COMPUTERNAME%\n'),(38,'2023-11-06 08:47:00','%username%\n','%COMPUTERNAME%\n'),(39,'2023-11-06 08:59:12','%username%\n','%COMPUTERNAME%\n'),(40,'2023-11-06 08:59:12','%username%\n','%COMPUTERNAME%\n'),(41,'2023-11-06 08:59:21','%username%\n','%COMPUTERNAME%\n'),(42,'2023-11-06 08:59:21','%username%\n','%COMPUTERNAME%\n'),(43,'2023-11-06 09:01:09','%username%\n','%COMPUTERNAME%\n'),(44,'2023-11-06 09:01:09','%username%\n','%COMPUTERNAME%\n'),(45,'2023-11-06 09:02:58','%username%\n','%COMPUTERNAME%\n'),(46,'2023-11-06 09:02:58','%username%\n','%COMPUTERNAME%\n'),(47,'2023-11-06 09:44:26','%username%\n','%COMPUTERNAME%\n'),(48,'2023-11-06 09:44:26','%username%\n','%COMPUTERNAME%\n'),(49,'2023-11-06 11:35:06','%username%\n','%COMPUTERNAME%\n'),(50,'2023-11-06 11:35:06','%username%\n','%COMPUTERNAME%\n'),(51,'2023-11-06 11:59:32','%username%\n','%COMPUTERNAME%\n'),(52,'2023-11-06 11:59:32','%username%\n','%COMPUTERNAME%\n'),(53,'2023-11-06 13:28:00','%username%\n','%COMPUTERNAME%\n'),(54,'2023-11-06 13:28:00','%username%\n','%COMPUTERNAME%\n'),(55,'2023-11-06 13:29:10','%username%\n','%COMPUTERNAME%\n'),(56,'2023-11-06 13:29:10','%username%\n','%COMPUTERNAME%\n'),(57,'2023-11-06 13:31:09','%username%\n','%COMPUTERNAME%\n'),(58,'2023-11-06 13:31:09','%username%\n','%COMPUTERNAME%\n'),(59,'2023-11-06 13:37:34','%username%\n','%COMPUTERNAME%\n'),(60,'2023-11-06 13:37:34','%username%\n','%COMPUTERNAME%\n'),(61,'2023-11-06 13:42:43','%username%\n','%COMPUTERNAME%\n'),(62,'2023-11-06 13:42:43','%username%\n','%COMPUTERNAME%\n'),(63,'2023-11-06 13:43:12','%username%\n','%COMPUTERNAME%\n'),(64,'2023-11-06 13:43:12','%username%\n','%COMPUTERNAME%\n'),(65,'2023-11-06 13:44:08','%username%\n','%COMPUTERNAME%\n'),(66,'2023-11-06 13:44:08','%username%\n','%COMPUTERNAME%\n'),(67,'2023-11-06 13:45:34','%username%\n','%COMPUTERNAME%\n'),(68,'2023-11-06 13:45:34','%username%\n','%COMPUTERNAME%\n'),(69,'2023-11-06 13:59:34','%username%\n','%COMPUTERNAME%\n'),(70,'2023-11-06 13:59:34','%username%\n','%COMPUTERNAME%\n'),(71,'2023-11-06 14:00:55','%username%\n','%COMPUTERNAME%\n'),(72,'2023-11-06 14:00:55','%username%\n','%COMPUTERNAME%\n'),(73,'2023-11-06 14:03:18','%username%\n','%COMPUTERNAME%\n'),(74,'2023-11-06 14:03:18','%username%\n','%COMPUTERNAME%\n'),(75,'2023-11-06 14:15:00','%username%\n','%COMPUTERNAME%\n'),(76,'2023-11-06 14:15:00','%username%\n','%COMPUTERNAME%\n'),(77,'2023-11-06 15:03:16','%username%\n','%COMPUTERNAME%\n'),(78,'2023-11-06 15:03:16','%username%\n','%COMPUTERNAME%\n'),(79,'2023-11-06 15:12:21','%username%\n','%COMPUTERNAME%\n'),(80,'2023-11-06 15:12:21','%username%\n','%COMPUTERNAME%\n'),(81,'2023-11-07 07:40:25','%username%\n','%COMPUTERNAME%\n'),(82,'2023-11-07 07:40:25','%username%\n','%COMPUTERNAME%\n'),(83,'2023-11-07 08:52:41','%username%\n','%COMPUTERNAME%\n'),(84,'2023-11-07 08:52:41','%username%\n','%COMPUTERNAME%\n'),(85,'2023-11-07 11:29:38','%username%\n','%COMPUTERNAME%\n'),(86,'2023-11-07 11:29:38','%username%\n','%COMPUTERNAME%\n'),(87,'2023-11-07 13:20:07','%username%\n','%COMPUTERNAME%\n'),(88,'2023-11-07 13:20:07','%username%\n','%COMPUTERNAME%\n'),(89,'2023-11-07 13:23:02','%username%\n','%COMPUTERNAME%\n'),(90,'2023-11-07 13:23:02','%username%\n','%COMPUTERNAME%\n'),(91,'2023-11-07 14:20:23','%username%\n','%COMPUTERNAME%\n'),(92,'2023-11-07 14:20:23','%username%\n','%COMPUTERNAME%\n'),(93,'2023-11-08 07:21:06','%username%\n','%COMPUTERNAME%\n'),(94,'2023-11-08 07:21:06','%username%\n','%COMPUTERNAME%\n'),(95,'2023-11-09 09:39:17','%username%\n','%COMPUTERNAME%\n'),(96,'2023-11-09 09:39:17','%username%\n','%COMPUTERNAME%\n'),(97,'2023-11-09 15:58:38','%username%\n','%COMPUTERNAME%\n'),(98,'2023-11-09 15:58:38','%username%\n','%COMPUTERNAME%\n'),(99,'2023-11-09 16:03:06','%username%\n','%COMPUTERNAME%\n'),(100,'2023-11-09 16:03:06','%username%\n','%COMPUTERNAME%\n'),(101,'2023-11-13 07:44:10','%username%\n','%COMPUTERNAME%\n'),(102,'2023-11-13 07:44:10','%username%\n','%COMPUTERNAME%\n'),(103,'2023-11-13 09:18:25','%username%\n','%COMPUTERNAME%\n'),(104,'2023-11-13 09:18:25','%username%\n','%COMPUTERNAME%\n'),(105,'2023-11-13 09:49:24','%username%\n','%COMPUTERNAME%\n'),(106,'2023-11-13 09:49:24','%username%\n','%COMPUTERNAME%\n');
/*!40000 ALTER TABLE `connexion` ENABLE KEYS */;
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
