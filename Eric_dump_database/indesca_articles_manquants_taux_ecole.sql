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
-- Table structure for table `articles_manquants_taux_ecole`
--

DROP TABLE IF EXISTS `articles_manquants_taux_ecole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles_manquants_taux_ecole` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_saisie` int NOT NULL,
  `rag` varchar(255) NOT NULL,
  `nb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_saisie` (`id_saisie`,`rag`),
  KEY `rag` (`rag`),
  CONSTRAINT `articles_manquants_taux_ecole_ibfk_1` FOREIGN KEY (`rag`) REFERENCES `articles` (`rag_article`) ON DELETE CASCADE,
  CONSTRAINT `articles_manquants_taux_ecole_ibfk_2` FOREIGN KEY (`id_saisie`) REFERENCES `taux_ecole` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_manquants_taux_ecole`
--

LOCK TABLES `articles_manquants_taux_ecole` WRITE;
/*!40000 ALTER TABLE `articles_manquants_taux_ecole` DISABLE KEYS */;
INSERT INTO `articles_manquants_taux_ecole` VALUES (6,576,'1005SH0009222','7'),(9,576,'1005SH0009221','8'),(10,576,'1005SH0012174','10'),(11,576,'1005SH0009220','10'),(27,576,'1005SH0011935','2'),(36,563,'5340SH0021674','6'),(37,563,'5340SH0021675','5'),(38,563,'6780SH0035569','1'),(42,563,'4240SH0017013','8'),(43,575,'1005SH0009220','8'),(46,575,'4230SH0015780','10'),(47,575,'4230SH0015769','7'),(48,575,'5340SH0027765','1'),(49,560,'1005SH0009220','8'),(50,560,'4240SH0009182','12'),(55,561,'8340SH0000264','8'),(56,579,'8465SH0003890','8'),(57,561,'4220SH0015875','1'),(58,405,'8415SH0036445','1'),(60,407,'8470SH0039965','2'),(61,402,'5140SH0006298','2'),(72,408,'4220SH0015875','1'),(73,408,'8340SH0000525','2'),(75,581,'8465SH0016978','10'),(78,561,'8465SH0016978','10'),(79,318,'8405SH0019926','2'),(80,318,'7230SH0000854','2'),(83,584,'8405SH0024635','4');
/*!40000 ALTER TABLE `articles_manquants_taux_ecole` ENABLE KEYS */;
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
