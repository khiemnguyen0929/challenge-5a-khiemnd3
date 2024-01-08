CREATE DATABASE  IF NOT EXISTS `challenge5a_hiepnv` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `challenge5a_hiepnv`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 192.168.144.139    Database: challenge5a_hiepnv
-- ------------------------------------------------------
-- Server version	5.7.37

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('student','teacher','admin') COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'teacher1','$2y$10$X3lZ4RlS./Zm3wF0T.1aveHoKVQk2QOLnudXw65YRuyCBeYPKgCcu','Teacher 1','teacher1@vcs.com','0901123451','teacher',NULL),(2,'teacher2','$2y$10$NIZWCEeURkgVJ0xhqe0A5eCb7aqw4s7Bb1HTwLwypF9b4abeIxv/e','Teacher 2','teacher2@vcs.com','0901123452','admin','alabatrap'),(3,'student1','$2y$10$RlxM.ZpQO5np803oQx168.K3hKqahqIpSQ9MmJxmj5EqGQJaffU.6','Student 1','student1A@vcs.com','0901123453','student','lÃ m bÃ i táº­p Ä‘Ãª'),(4,'student2','$2y$10$DptkWZ6rmfQ/LuKMWi/SwefHgaHR8yh8R7xYZmVFnDHJN0.DQ6oWy','Student 2','student2@vcs.com','0901123454','student',NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `avt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avatar`
--

LOCK TABLES `avatar` WRITE;
/*!40000 ALTER TABLE `avatar` DISABLE KEYS */;
INSERT INTO `avatar` VALUES (1,'/uploads/default.png'),(2,'/uploads/a6440d31-1c05-31e1-dcad-cad772b04258.jpg'),(3,'/uploads/3943fee1-0129-0e7c-d307-3076141f258f.png'),(4,'/uploads/default.png');
/*!40000 ALTER TABLE `avatar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenge`
--

LOCK TABLES `challenge` WRITE;
/*!40000 ALTER TABLE `challenge` DISABLE KEYS */;
INSERT INTO `challenge` VALUES (1,'cÃ¢u 1','Ä‘Ã¡p Ã¡n lÃ  1 sá»‘ tá»« 1 Ä‘áº¿n 10','/uploads/challenges/2.txt'),(4,'cÃ¢u 4','1 tuáº§n cÃ³ máº¥y ngÃ y','/uploads/challenges/7.txt');
/*!40000 ALTER TABLE `challenge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challengs`
--

DROP TABLE IF EXISTS `challengs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `challengs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challengs`
--

LOCK TABLES `challengs` WRITE;
/*!40000 ALTER TABLE `challengs` DISABLE KEYS */;
/*!40000 ALTER TABLE `challengs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise`
--

DROP TABLE IF EXISTS `exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise`
--

LOCK TABLES `exercise` WRITE;
/*!40000 ALTER TABLE `exercise` DISABLE KEYS */;
INSERT INTO `exercise` VALUES (4,1,'Bai 4','alo alo','/uploads/works/a_tour_of_sage.pdf','2022-02-28 14:12:24','2022-03-07 14:12:24'),(5,2,'BÃ i 5','suuuuuuu','/uploads/works/271382984_320127416673769_2336783466851981571_n.jpg','2022-02-28 15:24:47','2022-03-07 15:24:47');
/*!40000 ALTER TABLE `exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submit_exercise`
--

DROP TABLE IF EXISTS `submit_exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submit_exercise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exerciseId` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submit_exercise`
--

LOCK TABLES `submit_exercise` WRITE;
/*!40000 ALTER TABLE `submit_exercise` DISABLE KEYS */;
INSERT INTO `submit_exercise` VALUES (1,1,'/uploads/submit_works/123_295lhl.txt','2022-02-28 06:14:42',3),(19,2,'/uploads/submit_works/271382984_320127416673769_2336783466851981571_n_jumlae.jpg','2022-02-28 13:44:04',3),(20,3,'/uploads/submit_works/Danh sÃ¡ch bÃ i táº­p thá»±c hÃ nh_lppn7m.docx','2022-02-28 14:11:41',3),(21,2,'/uploads/submit_works/a_tour_of_sage_7gx86c.pdf','2022-02-28 14:12:49',4),(22,5,'/uploads/submit_works/images_b9eovz.png','2022-02-28 15:25:40',3),(23,5,'/uploads/submit_works/271382984_320127416673769_2336783466851981571_n_7rwmlr.jpg','2022-02-28 15:26:05',4);
/*!40000 ALTER TABLE `submit_exercise` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-01 13:02:11
