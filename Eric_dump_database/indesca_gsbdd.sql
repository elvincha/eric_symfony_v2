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
-- Table structure for table `gsbdd`
--

DROP TABLE IF EXISTS `gsbdd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsbdd` (
  `id_gsbdd` int NOT NULL AUTO_INCREMENT,
  `nom_gsbdd` varchar(255) NOT NULL,
  `code` varchar(3) GENERATED ALWAYS AS (right(`nom_gsbdd`,3)) STORED,
  `indic_ecole` tinyint(1) NOT NULL,
  `indic_hors_ecole` tinyint(1) NOT NULL,
  `indic_opex_unite` tinyint(1) NOT NULL,
  `indic_opex_isole` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_gsbdd`),
  KEY `nom_gsbdd` (`nom_gsbdd`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsbdd`
--

LOCK TABLES `gsbdd` WRITE;
/*!40000 ALTER TABLE `gsbdd` DISABLE KEYS */;
INSERT INTO `gsbdd` (`id_gsbdd`, `nom_gsbdd`, `indic_ecole`, `indic_hors_ecole`, `indic_opex_unite`, `indic_opex_isole`) VALUES (1,'AMS Angers-Le Mans-Saumur GSBdD',0,1,1,1),(2,'AGE Angoulême GSBdD',1,1,1,1),(3,'BFT Belfort GSBdD',1,1,1,1),(4,'BSN Besançon GSBdD',1,1,1,1),(5,'BMA Bordeaux-Mérignac GSBdD',1,1,1,1),(6,'BGA Bourges-Avord GSBdD',1,1,1,1),(7,'BSL Brest-Lorient GSBdD',1,1,1,1),(8,'CQV Vannes-Coëtquidan GSBdD',1,1,1,1),(9,'CVI Calvi GSBdD',1,1,1,1),(10,'CCN Carcassonne GSBdD',1,1,1,1),(11,'CZX Cazaux GSBdD',1,1,1,1),(12,'CVM Charleville-Mézières GSBdD',1,1,1,1),(13,'CBG Cherbourg GSBdD',1,1,1,1),(14,'CFD Clermont-Ferrand GSBdD',1,1,1,1),(15,'CRL Creil GSBdD',1,1,1,1),(16,'DGN Draguignan GSBdD',1,1,1,1),(17,'LXE Epinal-Luxeuil GSBdD',1,1,1,1),(18,'EVS Evreux GSBdD',1,1,1,1),(19,'GAP Gap GSBdD',1,1,1,1),(20,'GVC Grenoble-Annecy-Chambéry GSBdD',1,1,1,1),(21,'ISP Istres-Salon de Provence GSBdD',1,1,1,1),(22,'LLE Lille GSBdD',1,1,1,1),(23,'LVV Lyon-Mont-Verdun GSBdD',1,1,1,1),(24,'MRS Marseille Aubagne GSBdD',1,1,1,1),(25,'MDM Mont-de-Marsan GSBdD',1,1,1,1),(26,'MTN Montauban-Agen GSBdD',1,1,1,1),(27,'MNM Mourmelon Mailly GSBdD',1,1,1,1),(28,'NCY Nancy GSBdD',1,1,1,1),(29,'NLL Nîmes-Orange-Laudun GSBdD',1,1,1,1),(30,'OAN Orléans-Bricy GSBdD',1,1,1,1),(31,'PAU Pau-Bayonne-Tarbes GSBdD',1,1,1,1),(32,'PBG Phalsbourg GSBdD',1,1,1,1),(33,'SMP Poitiers-Saint-Maixent GSBdD',1,1,1,1),(34,'RVC Rennes GSBdD',1,1,1,1),(35,'RSC Rochefort-Cognac GSBdD',1,1,1,1),(36,'STC Saint-Christol GSBdD',1,1,1,1),(37,'SDC Saint-Dizier-Chaumont GSBdD',1,1,1,1),(38,'SHC Strasbourg-Haguenau GSBdD',1,1,1,1),(39,'TLN Toulon GSBdD',1,1,1,1),(40,'TLS Toulouse-Castres GSBdD',1,1,1,1),(41,'TRS Tours GSBdD',1,1,1,1),(42,'VTI Ventiseri-Solenzara GSBdD',1,1,1,1),(43,'VRN Verdun GSBdD',1,1,1,1),(45,'PEM Paris-Ecole militaire GSBdD',1,1,1,1),(46,'SGM St Germain-en-Laye GSBdD',1,1,1,1),(47,'MHY Montlhéry GSBdD',1,1,1,1),(48,'VLM Versailles GSBdD',1,1,1,1),(49,'VLY Villacoublay GSBdD',1,1,1,1),(50,'VCN Vincennes GSBdD',1,1,1,1),(51,'GUY Guyane GSBdD',1,1,1,1),(52,'FAZ La Réunion-Mayotte GSBdD',1,1,1,1),(53,'PF Polynésie française GSBdD',1,1,1,1),(54,'NC Nouvelle-Calédonie GSBdD',1,1,1,1),(55,'FFA Antilles GSBdD',1,1,1,1),(56,'FCI Côte dIvoire GSBdD',1,1,1,1),(57,'FDJ Djibouti GSBdD',1,1,1,1),(58,'EAU Emirats-Arabes-Unis GSBdD',1,1,1,1),(59,'EFS Sénégal GSBdD',1,1,1,1),(60,'EFG Gabon GSBdD',1,1,1,1),(68,'DIJ Dijon GSBdD',1,1,1,1),(69,'LVB La Valbonne GSBdD',1,1,1,1),(71,'MTZ Metz GSBdD',1,1,1,1),(74,'VLC Valence GSBdD',1,1,1,1),(76,'BLG Brive GSBdD',1,1,1,1),(81,'CLR Colmar GSBdD',1,1,1,1),(82,'test2',0,1,1,0);
/*!40000 ALTER TABLE `gsbdd` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-13 13:20:21
