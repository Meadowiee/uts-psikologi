-- MySQL dump 10.13  Distrib 9.3.0, for macos14.7 (arm64)
--
-- Host: localhost    Database: psikologi
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1,'Test','dinosaur','Testing','2000-12-13','perempuan'),(2,'Test','tuwhaq-patmub-7nozMu','Testing','2000-06-03','perempuan'),(3,'dinosaur','dinosaur','dinosaur','2005-06-23','perempuan'),(4,'turtle','turtle','dinosaur','1997-06-23','perempuan');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `soal` json NOT NULL,
  `jawaban` json DEFAULT NULL,
  `kategori` enum('Aritmatika Dasar','Pola Naik Turun','Kombinasi Logika','Pola Tetap Berubah','Pola Acak Visual') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'[6, 9, 12, 15, 18, 21, 24]','[2, 7]','Aritmatika Dasar'),(2,'[15, 16, 18, 19, 21, 22, 24]','[2, 5]','Aritmatika Dasar'),(3,'[19, 18, 22, 21, 25, 24, 28]','[2, 7]','Aritmatika Dasar'),(4,'[16, 12, 17, 13, 18, 14, 19]','[1, 5]','Pola Naik Turun'),(5,'[2, 4, 8, 10, 20, 22, 44]','[4, 6]','Kombinasi Logika'),(6,'[15, 13, 16, 12, 17, 11, 18]','[1, 0]','Pola Naik Turun'),(7,'[25, 22, 11, 33, 30, 15, 45]','[4, 2]','Kombinasi Logika'),(8,'[49, 51, 54, 27, 9, 11, 14]','[7]','Pola Tetap Berubah'),(9,'[2, 3, 1, 3, 4, 2, 4]','[5]','Pola Acak Visual'),(10,'[19, 17, 20, 16, 21, 15, 22]','[1, 4]','Pola Naik Turun'),(11,'[94, 92, 46, 44, 22, 20, 10]','[8]','Pola Tetap Berubah'),(12,'[5, 8, 9, 8, 11, 12, 11]','[1, 4]','Pola Tetap Berubah'),(13,'[12, 15, 19, 23, 28, 33, 39]','[4, 5]','Aritmatika Dasar'),(14,'[7, 5, 10, 7, 21, 17, 68]','[6, 3]','Kombinasi Logika'),(15,'[11, 15, 18, 9, 13, 16, 8]','[1, 2]','Pola Naik Turun'),(16,'[3, 8, 15, 24, 35, 48, 63]','[8, 0]','Aritmatika Dasar'),(17,'[4, 5, 7, 4, 8, 13, 7]','[1, 4]','Pola Tetap Berubah'),(18,'[8, 5, 15, 18, 6, 3, 9]','[1, 2]','Pola Acak Visual'),(19,'[15, 6, 18, 10, 30, 23, 69]','[6, 3]','Kombinasi Logika'),(20,'[5, 35, 28, 4, 11, 77, 70]','[1, 0]','Pola Acak Visual');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `score_test` int DEFAULT NULL,
  `score_sw` int DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `age` int DEFAULT NULL,
  `result_type` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_pengguna_FK_1` (`user_id`),
  CONSTRAINT `test_pengguna_FK_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,1,NULL,NULL,NULL,'2025-06-14 13:00:33',0,NULL),(2,1,NULL,NULL,NULL,'2025-06-14 13:00:36',0,NULL),(3,1,NULL,NULL,NULL,'2025-06-14 13:05:19',0,NULL),(4,1,NULL,NULL,NULL,'2025-06-14 13:05:23',0,NULL),(5,1,NULL,NULL,NULL,'2025-06-14 13:07:36',3,NULL),(6,1,NULL,NULL,NULL,'2025-06-14 13:12:26',3,NULL),(7,1,6,93,'Rendah','2025-06-14 13:15:52',27,NULL),(8,1,NULL,NULL,NULL,'2025-06-14 16:21:29',3,NULL),(9,1,18,120,'Baik Sekali','2025-06-14 16:23:23',24,'{\"Pola Naik Turun\": 4, \"Aritmatika Dasar\": 3, \"Kombinasi Logika\": 4, \"Pola Acak Visual\": 3, \"Pola Tetap Berubah\": 4}'),(10,1,NULL,NULL,NULL,'2025-06-15 08:48:41',24,NULL),(11,1,NULL,NULL,NULL,'2025-06-15 08:50:25',24,NULL),(12,1,NULL,NULL,NULL,'2025-06-15 08:50:32',24,NULL),(13,1,NULL,NULL,NULL,'2025-06-15 08:50:56',24,NULL),(14,3,6,91,'Rendah','2025-06-15 08:54:27',25,'{\"Pola Naik Turun\": 1, \"Kombinasi Logika\": 3, \"Pola Acak Visual\": 2}'),(15,4,NULL,NULL,NULL,'2025-06-15 12:03:52',27,NULL),(16,4,NULL,NULL,NULL,'2025-06-15 12:05:39',27,NULL),(17,4,NULL,NULL,NULL,'2025-06-15 12:05:43',27,NULL),(18,4,NULL,NULL,NULL,'2025-06-15 12:07:21',27,NULL),(19,4,NULL,NULL,NULL,'2025-06-15 12:09:32',27,NULL),(20,4,NULL,NULL,NULL,'2025-06-15 12:27:14',27,NULL),(21,4,NULL,NULL,NULL,'2025-06-15 12:29:42',27,NULL),(22,4,NULL,NULL,NULL,'2025-06-15 12:33:52',27,NULL),(23,4,NULL,NULL,NULL,'2025-06-15 12:37:01',27,NULL),(24,4,NULL,NULL,NULL,'2025-06-15 12:40:18',27,NULL),(25,4,3,86,'Rendah','2025-06-15 13:47:27',27,'{\"Pola Naik Turun\": 1, \"Aritmatika Dasar\": 1, \"Pola Acak Visual\": 1}'),(26,4,4,88,'Rendah','2025-06-15 15:16:05',27,'{\"Pola Naik Turun\": 1, \"Aritmatika Dasar\": 2, \"Kombinasi Logika\": 0, \"Pola Acak Visual\": 1, \"Pola Tetap Berubah\": 0}');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `response` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `question_id` int NOT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `response_question_FK` (`question_id`),
  KEY `response_test_FK` (`test_id`),
  CONSTRAINT `response_question_FK` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `response_test_FK` FOREIGN KEY (`test_id`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES (1,7,1,0),(2,7,2,0),(3,7,3,0),(4,7,4,0),(5,7,5,0),(6,7,6,0),(7,7,7,1),(8,7,8,0),(9,7,9,0),(10,7,10,1),(11,7,11,0),(12,7,12,0),(13,7,13,1),(14,7,14,0),(15,7,15,0),(16,7,16,0),(17,7,17,0),(18,7,18,1),(19,7,19,1),(20,7,20,1),(21,9,1,1),(22,9,2,0),(23,9,3,1),(24,9,4,1),(25,9,5,1),(26,9,6,1),(27,9,7,1),(28,9,8,1),(29,9,9,1),(30,9,10,1),(31,9,11,1),(32,9,12,1),(33,9,13,1),(34,9,14,1),(35,9,15,1),(36,9,16,0),(37,9,17,1),(38,9,18,1),(39,9,19,1),(40,9,20,1),(41,14,1,0),(42,14,2,0),(43,14,3,0),(44,14,4,1),(45,14,5,1),(46,14,6,0),(47,14,7,0),(48,14,8,0),(49,14,9,1),(50,14,10,0),(51,14,11,0),(52,14,12,0),(53,14,13,0),(54,14,14,1),(55,14,15,0),(56,14,16,0),(57,14,17,0),(58,14,18,0),(59,14,19,1),(60,14,20,1),(61,17,1,0),(62,24,1,0),(63,24,2,0),(64,24,3,0),(65,24,4,0),(66,24,5,0),(67,24,6,0),(68,24,7,0),(69,25,1,0),(70,25,2,0),(71,25,3,0),(72,25,4,0),(73,25,5,0),(74,25,6,1),(75,25,7,0),(76,25,8,0),(77,25,9,0),(78,25,10,0),(79,25,11,0),(80,25,12,0),(81,25,13,0),(82,25,14,0),(83,25,15,0),(84,25,16,1),(85,25,17,0),(86,25,18,0),(87,25,19,0),(88,25,20,1),(89,26,1,1),(90,26,2,0),(91,26,3,0),(92,26,4,0),(93,26,5,0),(94,26,6,1),(95,26,7,0),(96,26,8,0),(97,26,9,0),(98,26,10,0),(99,26,11,0),(100,26,12,0),(101,26,13,0),(102,26,14,0),(103,26,15,0),(104,26,16,1),(105,26,17,0),(106,26,18,0),(107,26,19,0),(108,26,20,1);
/*!40000 ALTER TABLE `response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `result` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score_sw` int DEFAULT NULL,
  `score_test` int DEFAULT NULL,
  `age_range` json DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (1,125,20,'[21, 25]','Baik Sekali'),(2,122,19,'[21, 25]','Baik Sekali'),(3,120,18,'[21, 25]','Baik Sekali'),(4,118,17,'[21, 25]','Baik Sekali'),(5,115,16,'[21, 25]','Baik'),(6,113,15,'[21, 25]','Baik'),(7,110,14,'[21, 25]','Cukup'),(8,108,13,'[21, 25]','Cukup'),(9,106,12,'[21, 25]','Cukup'),(10,103,11,'[21, 25]','Cukup'),(11,101,10,'[21, 25]','Cukup'),(12,99,9,'[21, 25]','Kurang'),(13,96,8,'[21, 25]','Kurang'),(14,94,7,'[21, 25]','Rendah'),(15,91,6,'[21, 25]','Rendah'),(16,89,5,'[21, 25]','Rendah'),(17,87,4,'[21, 25]','Rendah'),(18,84,3,'[21, 25]','Rendah'),(19,82,2,'[21, 25]','Rendah'),(20,80,1,'[21, 25]','Rendah'),(21,77,0,'[21, 25]','Rendah'),(22,125,20,'[26, 30]','Baik Sekali'),(23,123,19,'[26, 30]','Baik Sekali'),(24,120,18,'[26, 30]','Baik Sekali'),(25,118,17,'[26, 30]','Baik Sekali'),(26,116,16,'[26, 30]','Baik'),(27,113,15,'[26, 30]','Baik'),(28,111,14,'[26, 30]','Cukup'),(29,109,13,'[26, 30]','Cukup'),(30,107,12,'[26, 30]','Cukup'),(31,104,11,'[26, 30]','Cukup'),(32,102,10,'[26, 30]','Cukup'),(33,100,9,'[26, 30]','Cukup'),(34,97,8,'[26, 30]','Kurang'),(35,95,7,'[26, 30]','Kurang'),(36,93,6,'[26, 30]','Rendah'),(37,90,5,'[26, 30]','Rendah'),(38,88,4,'[26, 30]','Rendah'),(39,86,3,'[26, 30]','Rendah'),(40,83,2,'[26, 30]','Rendah'),(41,81,1,'[26, 30]','Rendah'),(42,79,0,'[26, 30]','Rendah'),(43,127,20,'[31, 35]','Baik Sekali'),(44,125,19,'[31, 35]','Baik Sekali'),(45,122,18,'[31, 35]','Baik Sekali'),(46,120,17,'[31, 35]','Baik Sekali'),(47,117,16,'[31, 35]','Baik Sekali'),(48,115,15,'[31, 35]','Baik'),(49,113,14,'[31, 35]','Baik'),(50,110,13,'[31, 35]','Cukup'),(51,108,12,'[31, 35]','Cukup'),(52,105,11,'[31, 35]','Cukup'),(53,103,10,'[31, 35]','Cukup'),(54,101,9,'[31, 35]','Cukup'),(55,98,8,'[31, 35]','Kurang'),(56,96,7,'[31, 35]','Kurang'),(57,94,6,'[31, 35]','Rendah'),(58,91,5,'[31, 35]','Rendah'),(59,89,4,'[31, 35]','Rendah'),(60,86,3,'[31, 35]','Rendah'),(61,84,2,'[31, 35]','Rendah'),(62,82,1,'[31, 35]','Rendah'),(63,79,0,'[31, 35]','Rendah'),(64,126,20,'[36, 40]','Baik Sekali'),(65,124,19,'[36, 40]','Baik Sekali'),(66,121,18,'[36, 40]','Baik Sekali'),(67,119,17,'[36, 40]','Baik'),(68,117,16,'[36, 40]','Baik'),(69,115,15,'[36, 40]','Baik'),(70,112,14,'[36, 40]','Baik'),(71,110,13,'[36, 40]','Cukup'),(72,108,12,'[36, 40]','Cukup'),(73,106,11,'[36, 40]','Cukup'),(74,104,10,'[36, 40]','Cukup'),(75,101,9,'[36, 40]','Rendah'),(76,99,8,'[36, 40]','Rendah'),(77,97,7,'[36, 40]','Rendah'),(78,95,6,'[36, 40]','Rendah'),(79,92,5,'[36, 40]','Rendah'),(80,90,4,'[36, 40]','Rendah'),(81,88,3,'[36, 40]','Rendah'),(82,86,2,'[36, 40]','Rendah'),(83,84,1,'[36, 40]','Rendah'),(84,81,0,'[36, 40]','Rendah'),(85,129,20,'[41, 45]','Baik Sekali'),(86,126,19,'[41, 45]','Baik Sekali'),(87,124,18,'[41, 45]','Baik Sekali'),(88,121,17,'[41, 45]','Baik Sekali'),(89,119,16,'[41, 45]','Baik Sekali'),(90,117,15,'[41, 45]','Baik Sekali'),(91,114,14,'[41, 45]','Baik'),(92,112,13,'[41, 45]','Baik'),(93,110,12,'[41, 45]','Baik'),(94,107,11,'[41, 45]','Baik'),(95,105,10,'[41, 45]','Cukup'),(96,102,9,'[41, 45]','Cukup'),(97,100,8,'[41, 45]','Rendah'),(98,98,7,'[41, 45]','Rendah'),(99,95,6,'[41, 45]','Rendah'),(100,93,5,'[41, 45]','Rendah'),(101,90,4,'[41, 45]','Rendah'),(102,88,3,'[41, 45]','Rendah'),(103,86,2,'[41, 45]','Rendah'),(104,83,1,'[41, 45]','Rendah'),(105,81,0,'[41, 45]','Rendah');
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'psikologi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-16  0:04:49
