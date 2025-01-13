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
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `annonce` (
  `id_annonce` int NOT NULL AUTO_INCREMENT,
  `title_annonce` varchar(255) NOT NULL,
  `subtitle_annonce` varchar(255) NOT NULL,
  `date_annonce` date NOT NULL,
  `text_annonce` longtext NOT NULL,
  PRIMARY KEY (`id_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonce`
--

LOCK TABLES `annonce` WRITE;
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` VALUES (1,'Fin d\'ODESCA','Passage sur ERIC','2024-03-25','Bonjour à tous,</br>\nLa fin d\'Idesca est prévu pour le 31 décembre 2023. Cette nouvelle plateforme prendra le relais et permettra à tous de saisir ses nouvelles données.</br>\nCordialement,</br>\nThomas'),(2,'Bénéficier des accès','Se connecter à son GSBDD','2024-03-25','Bonjour, \nPour bénéficier des permissions de son GSBDD, merci d\'envoyer un mail à x@intradef.gouv.fr</br>\nCordialement, \nThomas'),(7,'Merci de rentrer tous les indicateurs','Case non renseigné à cocher','2024-01-08','Bonjour à tous, \nSi vous n\'êtes pas concerné pas un indicateur ce mois-ci, merci de cocher la case. \nCordialement,\nThomas'),(23,'Saisie des indicateurs du janvier','Modification de la date de saisie','2024-01-08','Bonjour, Exceptionnellement la saisie des indicateurs du mois de janvier s\'effectuera jusqu\'au 28 février 2024'),(25,'Concernant  les indicateurs Shinken ','Possibilité de consulter directement les indicateurs','2024-03-25','Bonjour, </br>\nA partir du premier mai 2025, il sera désormais possible d\'accéder directement aux indicateurs Shinken'),(28,'Titre','sous titre','2024-10-29','test test');
/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;
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
