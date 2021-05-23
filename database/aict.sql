CREATE DATABASE  IF NOT EXISTS `aict` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `aict`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: aict
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `children` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `gender` enum('me','ke') DEFAULT NULL,
  `is_staying_home` enum('ndio','hapana') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `children_ibfk_1` (`particulars_id`),
  CONSTRAINT `children_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `children`
--

LOCK TABLES `children` WRITE;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` VALUES (63,29,'Daniel Kiba',9,'me','ndio'),(64,30,'Daniel Peter',10,'me','ndio');
/*!40000 ALTER TABLE `children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `is_graduate` varchar(10) NOT NULL,
  `has_bible_knowledge` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `particulars_id` (`particulars_id`),
  KEY `education_ibfk_1` (`particulars_id`),
  CONSTRAINT `education_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (63,17,'ndio','hapana'),(64,18,'hapana','ndio');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employment` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `employer` varchar(100) NOT NULL,
  `skills` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employment_ibfk_1` (`particulars_id`),
  CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employment`
--

LOCK TABLES `employment` WRITE;
/*!40000 ALTER TABLE `employment` DISABLE KEYS */;
INSERT INTO `employment` VALUES (63,18,'Azania Bank','Mhasibu'),(64,19,'Azam Media','Mhasibu');
/*!40000 ALTER TABLE `employment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leadership`
--

DROP TABLE IF EXISTS `leadership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leadership` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Hakuna',
  `special_needs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Hakuna',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Hakuna',
  PRIMARY KEY (`id`),
  UNIQUE KEY `particulars_id` (`particulars_id`),
  KEY `leadership_ibfk_1` (`particulars_id`),
  CONSTRAINT `leadership_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadership`
--

LOCK TABLES `leadership` WRITE;
/*!40000 ALTER TABLE `leadership` DISABLE KEYS */;
INSERT INTO `leadership` VALUES (63,11,'Hakuna','Hakuna','Hakuna'),(64,12,'Muongoza Kwaya','Hakuna','Hakuna');
/*!40000 ALTER TABLE `leadership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marital_status`
--

DROP TABLE IF EXISTS `marital_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marital_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL DEFAULT 'single',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_status`
--

LOCK TABLES `marital_status` WRITE;
/*!40000 ALTER TABLE `marital_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `marital_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `particulars`
--

DROP TABLE IF EXISTS `particulars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `particulars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) NOT NULL,
  `gender` enum('me','ke') DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL DEFAULT 'null',
  `photo` varchar(255) NOT NULL DEFAULT 'null',
  `marital_status` enum('single','married','divorced','widowed') NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `date_of_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_no` (`phone_no`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `particulars`
--

LOCK TABLES `particulars` WRITE;
/*!40000 ALTER TABLE `particulars` DISABLE KEYS */;
INSERT INTO `particulars` VALUES (63,'Christina Kusaga','ke','1984-04-11','458 Dar es Salaam','0625000111','tinakusaga@azania.co.tz','uploads/20210507_032405.jpg','married','Kusaga Wilfred','2021-05-07 15:24:05'),(64,'Devin Mosha','ke','1981-03-18','78 Tukuyu','0625100200','devinmosha@hotmail.co.uk','uploads/20210510_123304.jpg','married','Kenneth Peter','2021-05-09 14:33:04');
/*!40000 ALTER TABLE `particulars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'administrator'),(2,'standard');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religious_details`
--

DROP TABLE IF EXISTS `religious_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `religious_details` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `date_of_salvation` date NOT NULL,
  `date_of_baptism` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `prefered_work` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `reason_of_baptism` text NOT NULL,
  `date_joined` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `religious_details_ibfk_1` (`particulars_id`),
  CONSTRAINT `religious_details_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religious_details`
--

LOCK TABLES `religious_details` WRITE;
/*!40000 ALTER TABLE `religious_details` DISABLE KEYS */;
INSERT INTO `religious_details` VALUES (63,10,'2014-04-09','2007-02-09','Shinyanga','Kuhubiri','9','Yeye ni mwokozi wa maisha yangu amenitendea maajabu','2017-09-13'),(64,11,'2015-01-09','2010-04-16','Mji Mwema','Uimbaji','9','Yeye ni mwokozi wangu','2017-02-08');
/*!40000 ALTER TABLE `religious_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residence`
--

DROP TABLE IF EXISTS `residence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `residence` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `residence_ibfk_1` (`particulars_id`),
  CONSTRAINT `residence_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residence`
--

LOCK TABLES `residence` WRITE;
/*!40000 ALTER TABLE `residence` DISABLE KEYS */;
INSERT INTO `residence` VALUES (63,18,'Toangoma','Shuleni','10'),(64,19,'Toangoma','Kwa Msisi','10');
/*!40000 ALTER TABLE `residence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'Idara ya Injili na Umisheni'),(2,'Idara ya Wanawake na Watoto'),(3,'Idara ya Vijana'),(4,'Idara ya Elimu ya Kikristo'),(5,'Kamati ya Fedha'),(6,'Kamati ya Uchumi, Mipango na Maendeleo'),(7,'Kamati ya Huduma ya Mtoto'),(8,'Kamati ya Wadhamini'),(9,'AIC Kongowe Safina Choir');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spouse`
--

DROP TABLE IF EXISTS `spouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spouse` (
  `particulars_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `date_of_marriage` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_ibfk_1` (`particulars_id`),
  CONSTRAINT `spouse_ibfk_1` FOREIGN KEY (`particulars_id`) REFERENCES `particulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spouse`
--

LOCK TABLES `spouse` WRITE;
/*!40000 ALTER TABLE `spouse` DISABLE KEYS */;
INSERT INTO `spouse` VALUES (63,19,'Raphael Daud','2013-06-04'),(64,20,'Julius Kabwe','2008-05-14');
/*!40000 ALTER TABLE `spouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `fullname` (`fullname`),
  KEY `permission_fk` (`permission_id`),
  CONSTRAINT `permission_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shemed.blackops@gmail.com','Seleman Hemed','s.hemed','$2y$10$bYfJj56Mqy3sxXFyaWSBJ.1SbvS4FgRu7BB80FQHtq1Dn38JTitcS',1),(2,'operator@aict.com','Operator AICT','operator','$2y$10$bYfJj56Mqy3sxXFyaWSBJ.1SbvS4FgRu7BB80FQHtq1Dn38JTitcS',2);
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

-- Dump completed on 2021-05-11 23:24:28
