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
-- Table structure for table `saisie_taux`
--

DROP TABLE IF EXISTS `saisie_taux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saisie_taux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `session` int DEFAULT NULL,
  `id_user_acess` int NOT NULL,
  `periode` varchar(255) NOT NULL,
  `id_armee` int DEFAULT NULL,
  `effectif_prev` int DEFAULT NULL,
  `effectif_inc` int DEFAULT NULL,
  `effectif_equip` int DEFAULT NULL,
  `date_edit` datetime NOT NULL,
  `commentaire` longtext,
  `non_concerne` varchar(45) NOT NULL,
  `id_gsbdd` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_saisie_taux_armee_idx` (`id_armee`),
  KEY `FK_saisie_taux_user_acess_idx` (`id_user_acess`),
  CONSTRAINT `FK_saisie_taux_armee` FOREIGN KEY (`id_armee`) REFERENCES `armee` (`id_armee`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_saisie_taux_user_acess` FOREIGN KEY (`id_user_acess`) REFERENCES `user_acess` (`id_user_acess`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saisie_taux`
--

LOCK TABLES `saisie_taux` WRITE;
/*!40000 ALTER TABLE `saisie_taux` DISABLE KEYS */;
INSERT INTO `saisie_taux` VALUES (16,'taux école',1,47,'2024-02',1,1,1,1,'2024-11-04 10:01:05','test angers / fev','0',1),(17,'taux école',1,47,'2024-03',3,1,1,1,'2024-11-04 12:19:35','anger mars','0',1),(18,'taux école',1,32,'2024-02',2,1,1,1,'2024-11-04 12:22:05','2 fev','0',2),(20,'taux école',1,33,'2024-03',1,1,1,1,'2024-11-04 13:02:41','3 mars','0',3),(21,'taux école',1,32,'2024-02',1,1,1,1,'2024-11-04 13:45:26','test nn cncerné','0',2),(22,'taux école',1,32,'2024-02',1,1,1,1,'2024-11-04 13:45:54','test concerné ','0',2),(23,'taux école',1,47,'2024-11',1,1,1,1,'2024-11-05 08:53:47','','0',1),(24,'taux école',1,47,'2024-11',2,3,3,2,'2024-11-05 09:14:07','','0',1),(25,'taux école',1,47,'2024-11',3,1,1,1,'2024-11-05 09:35:52','','0',1),(26,'taux école',1,47,'2024-11',4,1,1,1,'2024-11-05 10:50:59','test modif','0',1),(27,'taux école',1,47,'2024-12',NULL,NULL,NULL,NULL,'2024-11-05 10:50:59',NULL,'0',1),(28,'taux école',NULL,32,'2024-11',NULL,NULL,NULL,NULL,'2024-11-05 13:37:45',NULL,'0',2),(29,'taux école',NULL,32,'2024-12',NULL,NULL,NULL,NULL,'2024-11-05 13:40:35',NULL,'0',2),(30,'taux école',NULL,47,'2024-10',NULL,NULL,NULL,NULL,'2024-11-05 14:29:45',NULL,'0',1),(31,'taux école',1,32,'2024-10',1,1,1,1,'2024-11-05 14:31:20','','0',2),(33,'taux école',1,47,'2024-09',1,1,1,1,'2024-11-05 14:33:32','','0',1),(34,'taux école',NULL,32,'2024-09',NULL,NULL,NULL,NULL,'2024-11-05 14:35:16',NULL,'0',2),(35,'taux école',1,47,'2024-09',2,1,1,1,'2024-11-05 14:35:29','','0',1),(36,'taux école',NULL,33,'2024-02',NULL,NULL,NULL,NULL,'2024-11-05 14:51:53',NULL,'0',3),(37,'taux école',NULL,32,'2024-07',NULL,NULL,NULL,NULL,'2024-11-12 08:42:16',NULL,'0',2),(42,'taux hors école',0,47,'2024-11',1,1,1,1,'2024-11-18 14:44:33','test taux hors école2','0',1),(43,'taux opex unite',0,47,'2024-11',1,1,1,1,'2024-11-18 14:58:47','test taux opex','0',1),(44,'taux hors école',0,47,'2024-02',1,3,3,2,'2024-12-02 13:03:55','fevrier taux h ecole','0',1),(45,'taux opex isole',0,47,'2024-03',2,1,1,1,'2024-12-02 14:33:22','taux opex isole mars ','0',1),(46,'taux opex isole',0,47,'2024-03',3,1,1,1,'2024-12-02 14:38:26','test taux opex isole','0',1);
/*!40000 ALTER TABLE `saisie_taux` ENABLE KEYS */;
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
