-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: up_familytree
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `birthPlaces`
--

DROP TABLE IF EXISTS `birthPlaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `birthPlaces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `birthPlace` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `birthPlaces`
--

LOCK TABLES `birthPlaces` WRITE;
/*!40000 ALTER TABLE `birthPlaces` DISABLE KEYS */;
INSERT INTO `birthPlaces` VALUES (1,'Minsk'),(30,'Borisov');
/*!40000 ALTER TABLE `birthPlaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brothers`
--

DROP TABLE IF EXISTS `brothers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brothers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_peoples` int NOT NULL,
  `brothers` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brothers_FK` (`id_peoples`),
  KEY `brothers_FK_1` (`brothers`),
  CONSTRAINT `brothers_FK` FOREIGN KEY (`id_peoples`) REFERENCES `peoples` (`id`),
  CONSTRAINT `brothers_FK_1` FOREIGN KEY (`brothers`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brothers`
--

LOCK TABLES `brothers` WRITE;
/*!40000 ALTER TABLE `brothers` DISABLE KEYS */;
INSERT INTO `brothers` VALUES (1,26,28),(2,26,29);
/*!40000 ALTER TABLE `brothers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fathers`
--

DROP TABLE IF EXISTS `fathers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fathers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `child` int NOT NULL,
  `father` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `father_FK` (`child`),
  KEY `father_FK_1` (`father`),
  CONSTRAINT `father_FK` FOREIGN KEY (`child`) REFERENCES `peoples` (`id`),
  CONSTRAINT `father_FK_1` FOREIGN KEY (`father`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fathers`
--

LOCK TABLES `fathers` WRITE;
/*!40000 ALTER TABLE `fathers` DISABLE KEYS */;
INSERT INTO `fathers` VALUES (1,21,26),(2,26,37),(3,28,37),(4,29,37),(5,22,31),(6,23,31),(7,24,31),(8,25,36),(9,31,32),(10,34,36),(11,83,85),(12,83,85),(13,83,85),(14,83,85),(15,83,85),(16,83,85);
/*!40000 ALTER TABLE `fathers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firstNames`
--

DROP TABLE IF EXISTS `firstNames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firstNames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firstNames`
--

LOCK TABLES `firstNames` WRITE;
/*!40000 ALTER TABLE `firstNames` DISABLE KEYS */;
INSERT INTO `firstNames` VALUES (1,'danik'),(2,'marina'),(3,'varia'),(4,'tania'),(5,'alena'),(6,'alesha'),(7,'valia'),(8,'sergey'),(9,'andrey'),(10,'toma'),(11,'denis'),(12,'valodia'),(13,'nina'),(14,'kolia'),(15,'Vasia'),(16,'Dima');
/*!40000 ALTER TABLE `firstNames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastNames`
--

DROP TABLE IF EXISTS `lastNames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lastNames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastNames`
--

LOCK TABLES `lastNames` WRITE;
/*!40000 ALTER TABLE `lastNames` DISABLE KEYS */;
INSERT INTO `lastNames` VALUES (1,'shumakovich'),(2,'dubovceva'),(3,'komonova'),(4,'Koshel');
/*!40000 ALTER TABLE `lastNames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mothers`
--

DROP TABLE IF EXISTS `mothers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mothers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `child` int NOT NULL,
  `mother` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mothers_FK` (`child`),
  KEY `mothers_FK_1` (`mother`),
  CONSTRAINT `mothers_FK` FOREIGN KEY (`child`) REFERENCES `peoples` (`id`),
  CONSTRAINT `mothers_FK_1` FOREIGN KEY (`mother`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mothers`
--

LOCK TABLES `mothers` WRITE;
/*!40000 ALTER TABLE `mothers` DISABLE KEYS */;
INSERT INTO `mothers` VALUES (1,21,25),(2,26,27),(3,28,27),(4,29,27),(5,22,25),(6,23,25),(7,24,25),(8,25,33),(9,31,30),(10,34,33),(11,83,84),(12,83,84),(13,83,84),(14,83,84),(15,83,84),(16,83,84);
/*!40000 ALTER TABLE `mothers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patronymics`
--

DROP TABLE IF EXISTS `patronymics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patronymics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patronymic` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patronymics`
--

LOCK TABLES `patronymics` WRITE;
/*!40000 ALTER TABLE `patronymics` DISABLE KEYS */;
INSERT INTO `patronymics` VALUES (1,'Alexeivich'),(2,'Dimovich'),(3,'Renatovich'),(4,'Sergeevich');
/*!40000 ALTER TABLE `patronymics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peoples`
--

DROP TABLE IF EXISTS `peoples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peoples` (
  `id` int NOT NULL AUTO_INCREMENT,
  `yearOfBirth` int DEFAULT NULL,
  `id_users` int NOT NULL,
  `id_birthPlaces` int DEFAULT NULL,
  `id_firstNames` int DEFAULT NULL,
  `id_lastNames` int DEFAULT NULL,
  `id_patronymics` int DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peoples_users_id_fk` (`id_users`),
  KEY `peoples_FK` (`id_firstNames`),
  KEY `peoples_FK_1` (`id_lastNames`),
  KEY `peoples_FK_2` (`id_birthPlaces`),
  KEY `peoples_FK_3` (`id_patronymics`),
  CONSTRAINT `peoples_FK` FOREIGN KEY (`id_firstNames`) REFERENCES `firstNames` (`id`),
  CONSTRAINT `peoples_FK_1` FOREIGN KEY (`id_lastNames`) REFERENCES `lastNames` (`id`),
  CONSTRAINT `peoples_FK_2` FOREIGN KEY (`id_birthPlaces`) REFERENCES `birthPlaces` (`id`),
  CONSTRAINT `peoples_FK_3` FOREIGN KEY (`id_patronymics`) REFERENCES `patronymics` (`id`),
  CONSTRAINT `peoples_users_id_fk` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peoples`
--

LOCK TABLES `peoples` WRITE;
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` VALUES (21,2003,2,1,1,1,1,NULL),(22,NULL,2,1,2,2,1,NULL),(23,NULL,2,1,3,2,1,NULL),(24,NULL,2,1,4,2,1,NULL),(25,NULL,2,1,5,2,1,NULL),(26,NULL,2,1,6,1,1,NULL),(27,NULL,2,1,7,1,1,NULL),(28,NULL,2,1,8,1,1,NULL),(29,NULL,2,1,9,1,1,NULL),(30,NULL,2,1,10,2,1,NULL),(31,NULL,2,1,11,2,1,NULL),(32,NULL,2,1,12,2,1,NULL),(33,NULL,2,1,13,3,1,NULL),(34,NULL,2,1,4,3,1,NULL),(35,NULL,2,1,2,1,1,NULL),(36,NULL,2,1,14,3,1,NULL),(37,NULL,2,1,12,1,1,NULL),(83,2005,2,1,15,4,2,'Love programm'),(84,1986,2,1,14,4,3,'Always sailer'),(85,1985,2,30,16,4,4,'Always programmer');
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sisters`
--

DROP TABLE IF EXISTS `sisters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sisters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_peoples` int NOT NULL,
  `sisters` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sisters_FK` (`id_peoples`),
  KEY `sisters_FK_1` (`sisters`),
  CONSTRAINT `sisters_FK` FOREIGN KEY (`id_peoples`) REFERENCES `peoples` (`id`),
  CONSTRAINT `sisters_FK_1` FOREIGN KEY (`sisters`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sisters`
--

LOCK TABLES `sisters` WRITE;
/*!40000 ALTER TABLE `sisters` DISABLE KEYS */;
INSERT INTO `sisters` VALUES (1,21,22),(2,21,23),(3,21,24),(4,25,34);
/*!40000 ALTER TABLE `sisters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_login_IDX` (`login`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'danik_shumakovich');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'up_familytree'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-02 20:38:29
