-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: contact_system
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstSurname` varchar(255) NOT NULL,
  `secondSurname` varchar(255) NOT NULL,
  `companyName` varchar(150) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Oriana','Guadalupe','Colina','Perea','Electronic C','Ingeniero','orianacolina@gmail.com','04129479573'),(2,'María','García','Martínez','Rodríguez','Innovate Corp','Diseñadora','maria.garcia@innovate.com','04129876543'),(3,'Carlos','López','Hernández','Gómez','Data Systems','Analista','carlos.lopez@data.com','04123456789'),(4,'Ana','Martínez','Sánchez','Fernández','Cloud Networks','Ingeniera','ana.martinez@cloud.com','04127654321'),(5,'Luis','Rodríguez','Díaz','Pérez','Web Services','Consultor','luis.rodriguez@web.com','04124567890'),(6,'Sofía','Fernández','Gómez','García','Mobile Apps','Desarrolladora','sofia.fernandez@mobile.com','04128765432'),(7,'Pedro','Gómez','Pérez','López','AI Innovations','Científico de Datos','pedro.gomez@ai.com','04125678901'),(8,'Laura','Sánchez','López','Martínez','Cyber Security','Especialista','laura.sanchez@cyber.com','04126543210'),(9,'Diego','Hernández','Martínez','Sánchez','Blockchain Tech','Desarrollador','diego.hernandez@blockchain.com','04127890123'),(10,'Carmen','Díaz','García','Rodríguez','Virtual Reality','Diseñadora','carmen.diaz@vr.com','04129012345'),(11,'Juan','Pérez','González','López','Tech Solutions','Desarrollador','juan15.perez@tech.com','04121234557'),(12,'María','García','Martínez','Rodríguez','Innovate Corp','Diseñadora','maria31.garcia@innovate.com','041298261543'),(13,'Carlos','López','Hernández','Gómez','Data Systems','Analista','carlos2.lopez@data.com','04123456209'),(14,'Ana','Martínez','Sánchez','Fernández','Cloud Networks','Ingeniera','anaa.martinez@cloud.com','04127614390'),(15,'Luis','Rodríguez','Díaz','Pérez','Web Services','Consultor','luis31.rodriguez@web.com','04124567894'),(16,'Sofía','Fernández','Gómez','García','Mobile Apps','Desarrolladora','sofia561fernandez@mobile.com','04128125432'),(17,'Pedro','Gómez','Pérez','López','AI Innovations','Científico de Datos','pedro3.gomez@ai.com','04125678912'),(18,'Laura','Sánchez','López','Martínez','Cyber Security','Especialista','laura200sanchez@cyber.com','04126580210'),(20,'Carmen','Díaz','García','Rodríguez','Virtual Reality','Diseñadora','carmendiaz@vr.com','04129012645');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-14 18:32:38
