-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Current Database: `project`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `project`;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `uid` bigint(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `apr_num` int(3) NOT NULL,
  PRIMARY KEY (`uid`,`bid`),
  KEY `bid` (`bid`),
  CONSTRAINT `application_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  CONSTRAINT `bid` FOREIGN KEY (`bid`) REFERENCES `block` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (8,1,0),(7298347598,1,0),(7298347599,22,1);
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(20) NOT NULL,
  `hid` int(10) NOT NULL,
  `bsw_long` float(8,5) NOT NULL,
  `bsw_lat` float(8,5) NOT NULL,
  `bne_long` float(8,5) NOT NULL,
  `bne_lat` float(8,5) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `block_ibfk_1` (`hid`),
  CONSTRAINT `block_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hood` (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block`
--

LOCK TABLES `block` WRITE;
/*!40000 ALTER TABLE `block` DISABLE KEYS */;
INSERT INTO `block` VALUES (1,'MetroTech',1,122.12345,123.15435,124.12485,125.74562),(2,'FultonSt',1,124.12345,125.15435,126.12485,127.74562),(3,'GoldSt',1,126.12345,127.15435,128.12485,129.74562),(4,'MansuSt',1,128.12344,129.15434,124.12485,131.74562),(5,'NassauSt',1,130.12344,131.15434,132.12485,133.74562),(6,'Manhattan_1',2,132.12344,133.14545,134.12344,135.14565),(7,'Manhattan_2',2,134.12344,135.14545,136.12344,137.14565),(8,'Manhattan_3',2,136.12344,137.14545,138.12344,139.14565),(9,'Manhattan_4',2,138.12344,139.14545,140.12344,141.14565),(10,'Manhattan_5',2,140.12344,142.14545,142.12344,143.14565),(11,'Bronx_1',3,142.87473,143.23454,144.12344,145.13455),(12,'Bronx_2',3,144.87473,145.23454,146.12344,147.13455),(13,'Bronx_3',3,146.87473,147.23454,148.12344,149.13455),(14,'Bronx_4',3,148.87473,149.23454,150.12344,151.13455),(15,'Bronx_5',3,150.87473,151.23454,152.12344,153.13455),(16,'LongIsland_1',4,152.12344,153.42345,154.43546,163.42316),(17,'LongIsland_2',4,154.12344,153.42345,156.43546,163.42316),(18,'LongIsland_3',4,156.12344,153.42345,158.43546,163.42316),(19,'LongIsland_4',4,158.12344,153.42345,160.43546,163.42316),(20,'LongIsland_5',4,160.12344,153.42345,162.43546,163.42316),(21,'NewPort11',5,90.12333,90.21355,95.23323,95.23232),(22,'NewPort22',5,95.12333,95.21355,100.23323,100.23232);
/*!40000 ALTER TABLE `block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block_application`
--

DROP TABLE IF EXISTS `block_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_application` (
  `uid` bigint(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `apr_num` int(3) NOT NULL,
  PRIMARY KEY (`uid`,`bid`),
  KEY `bid` (`bid`),
  CONSTRAINT `block_application_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  CONSTRAINT `block_application_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `block` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_application`
--

LOCK TABLES `block_application` WRITE;
/*!40000 ALTER TABLE `block_application` DISABLE KEYS */;
INSERT INTO `block_application` VALUES (8,1,0);
/*!40000 ALTER TABLE `block_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block_thread`
--

DROP TABLE IF EXISTS `block_thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `block_thread` (
  `thread_id` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  PRIMARY KEY (`thread_id`,`bid`),
  KEY `block_thread_ibfk_2` (`bid`),
  CONSTRAINT `block_thread_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`),
  CONSTRAINT `block_thread_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `block` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_thread`
--

LOCK TABLES `block_thread` WRITE;
/*!40000 ALTER TABLE `block_thread` DISABLE KEYS */;
INSERT INTO `block_thread` VALUES (11,1),(12,3),(13,21);
/*!40000 ALTER TABLE `block_thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `f_id`
--

DROP TABLE IF EXISTS `f_id`;
/*!50001 DROP VIEW IF EXISTS `f_id`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `f_id` AS SELECT 
 1 AS `fid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `friend_application`
--

DROP TABLE IF EXISTS `friend_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friend_application` (
  `uid1` bigint(10) NOT NULL,
  `uid2` bigint(10) NOT NULL,
  PRIMARY KEY (`uid1`,`uid2`),
  KEY `friend_relation_ibfk_2` (`uid2`),
  CONSTRAINT `friend_application_ibfk_1` FOREIGN KEY (`uid1`) REFERENCES `user` (`uid`),
  CONSTRAINT `friend_application_ibfk_2` FOREIGN KEY (`uid2`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_application`
--

LOCK TABLES `friend_application` WRITE;
/*!40000 ALTER TABLE `friend_application` DISABLE KEYS */;
INSERT INTO `friend_application` VALUES (123,6465418297),(123,6465418691);
/*!40000 ALTER TABLE `friend_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_relation`
--

DROP TABLE IF EXISTS `friend_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friend_relation` (
  `uid1` bigint(10) NOT NULL,
  `uid2` bigint(10) NOT NULL,
  PRIMARY KEY (`uid1`,`uid2`),
  KEY `friend_relation_ibfk_2` (`uid2`),
  CONSTRAINT `friend_relation_ibfk_1` FOREIGN KEY (`uid1`) REFERENCES `user` (`uid`),
  CONSTRAINT `friend_relation_ibfk_2` FOREIGN KEY (`uid2`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_relation`
--

LOCK TABLES `friend_relation` WRITE;
/*!40000 ALTER TABLE `friend_relation` DISABLE KEYS */;
INSERT INTO `friend_relation` VALUES (123,8),(1111,123),(123,321),(123,666),(1672347981,1672347984),(1672347982,1672347989),(5671111124,5671111125),(6465418688,6465418690),(7298347593,7298347594),(7298347598,7298347599),(7298347600,7298347601);
/*!40000 ALTER TABLE `friend_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hood`
--

DROP TABLE IF EXISTS `hood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hood` (
  `hid` int(10) NOT NULL AUTO_INCREMENT,
  `hood_name` varchar(30) NOT NULL,
  `hsw_long` float(8,5) NOT NULL,
  `hsw_lat` float(8,5) NOT NULL,
  `hne_long` float(8,5) NOT NULL,
  `hne_lat` float(8,5) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hood`
--

LOCK TABLES `hood` WRITE;
/*!40000 ALTER TABLE `hood` DISABLE KEYS */;
INSERT INTO `hood` VALUES (1,'Brooklyn',122.12345,123.15435,132.12485,133.74562),(2,'Manhattan',132.12344,133.14545,142.12344,143.14565),(3,'Bronx',142.87473,143.23454,152.12344,153.13455),(4,'LongIsland',152.12344,153.42345,162.43546,163.42316),(5,'NewPort',90.12333,90.21355,100.23323,100.23232);
/*!40000 ALTER TABLE `hood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hood_thread`
--

DROP TABLE IF EXISTS `hood_thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hood_thread` (
  `thread_id` int(10) NOT NULL,
  `hid` int(10) NOT NULL,
  PRIMARY KEY (`thread_id`,`hid`),
  KEY `hood_thread_ibfk_2` (`hid`),
  CONSTRAINT `hood_thread_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`),
  CONSTRAINT `hood_thread_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `hood` (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hood_thread`
--

LOCK TABLES `hood_thread` WRITE;
/*!40000 ALTER TABLE `hood_thread` DISABLE KEYS */;
INSERT INTO `hood_thread` VALUES (14,1),(15,2),(16,3);
/*!40000 ALTER TABLE `hood_thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msg` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `author` bigint(10) NOT NULL,
  `timestamp` datetime NOT NULL,
  `textbody` varchar(1500) NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `msg_ibfk_1` (`author`),
  CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msg`
--

LOCK TABLES `msg` WRITE;
/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` VALUES (1,6465418688,'2018-10-05 14:00:00','hi'),(2,6465418690,'2017-10-05 14:00:00','hi?'),(3,6465418692,'2018-04-05 14:00:00','Aoligay!'),(4,5671111124,'2018-04-10 12:00:00','Hi!'),(5,7298347593,'2018-01-10 12:00:00','What\'s your name?'),(6,6465418688,'2018-01-05 10:00:00','???'),(7,1672347981,'2018-01-01 09:23:45','Go'),(8,123,'2019-01-01 09:23:44','zai?'),(9,321,'2018-01-01 09:23:45','kkp?'),(10,123,'2018-01-01 09:23:46','no neigui?'),(11,321,'2018-01-01 09:23:47','gkd?'),(12,666,'2018-01-01 09:23:48','quan bu dai bu?'),(13,123,'2019-01-01 09:23:44','gua ke le?'),(14,321,'2018-01-01 09:23:45','ni ye shi?'),(15,123,'2018-01-01 09:23:46','ying gai b-?'),(16,321,'2018-01-01 09:23:47','gong xi ni?'),(17,666,'2018-01-01 09:23:48','yi qi chong xiu?'),(18,123,'2019-12-24 02:29:06','123');
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `neighbor_relation`
--

DROP TABLE IF EXISTS `neighbor_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `neighbor_relation` (
  `uid1` bigint(10) NOT NULL,
  `uid2` bigint(10) NOT NULL,
  PRIMARY KEY (`uid1`,`uid2`),
  KEY `neighbor_relation_ibfk_2` (`uid2`),
  CONSTRAINT `neighbor_relation_ibfk_1` FOREIGN KEY (`uid1`) REFERENCES `user` (`uid`),
  CONSTRAINT `neighbor_relation_ibfk_2` FOREIGN KEY (`uid2`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `neighbor_relation`
--

LOCK TABLES `neighbor_relation` WRITE;
/*!40000 ALTER TABLE `neighbor_relation` DISABLE KEYS */;
INSERT INTO `neighbor_relation` VALUES (123,321),(6465418688,6465418689),(6465418690,6465418691),(6465418692,6465418693);
/*!40000 ALTER TABLE `neighbor_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thread` (
  `thread_id` int(10) NOT NULL AUTO_INCREMENT,
  `thread_name` varchar(50) NOT NULL,
  `thread_type` varchar(3) NOT NULL,
  `last_msg_id` int(10) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_ibfk_1` (`last_msg_id`),
  CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`last_msg_id`) REFERENCES `msg` (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread`
--

LOCK TABLES `thread` WRITE;
/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
INSERT INTO `thread` VALUES (1,'neighbor_chat','1',1),(2,'neighbor_chat','1',1),(3,'neighbor_chat','1',1),(4,'friend_chat','0',1),(5,'friend_chat','0',1),(6,'friend_chat','0',1),(7,'friend_chat','0',1),(8,'friend_chat','0',1),(9,'friend_chat','0',1),(10,'friend_chat','0',1),(11,'MetroTech_Study','2',1),(12,'GoldSt_Selling','2',1),(13,'NewPort11_Renting','2',1),(14,'Brooklyn_Safety','3',1),(15,'Manhattan_Show','3',1),(16,'Bronx_Soccer','3',1),(17,'test_friend','0',9),(18,'test_neighbor','1',9),(19,'MetroTech_algorithm','2',1);
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread_msgs`
--

DROP TABLE IF EXISTS `thread_msgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thread_msgs` (
  `thread_id` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL,
  PRIMARY KEY (`thread_id`,`msg_id`),
  KEY `thread_msgs_ibfk_2` (`msg_id`),
  CONSTRAINT `thread_msgs_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`),
  CONSTRAINT `thread_msgs_ibfk_2` FOREIGN KEY (`msg_id`) REFERENCES `msg` (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread_msgs`
--

LOCK TABLES `thread_msgs` WRITE;
/*!40000 ALTER TABLE `thread_msgs` DISABLE KEYS */;
INSERT INTO `thread_msgs` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(11,8),(17,8),(18,8),(11,9),(17,9),(18,9),(11,10),(11,11),(11,12),(19,13),(19,14),(19,15),(19,16),(19,17),(11,18);
/*!40000 ALTER TABLE `thread_msgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread_users`
--

DROP TABLE IF EXISTS `thread_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thread_users` (
  `thread_id` int(10) NOT NULL,
  `uid` bigint(10) NOT NULL,
  `last_review_time` datetime NOT NULL,
  PRIMARY KEY (`thread_id`,`uid`),
  KEY `thread_users_ibfk_2` (`uid`),
  CONSTRAINT `thread_users_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`),
  CONSTRAINT `thread_users_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread_users`
--

LOCK TABLES `thread_users` WRITE;
/*!40000 ALTER TABLE `thread_users` DISABLE KEYS */;
INSERT INTO `thread_users` VALUES (1,6465418688,'2018-10-05 14:00:00'),(1,6465418689,'2018-10-05 14:00:00'),(2,6465418690,'2018-10-05 14:00:00'),(2,6465418691,'2018-10-05 14:00:00'),(3,6465418692,'2018-10-05 14:00:00'),(3,6465418693,'2018-10-05 14:00:00'),(4,5671111124,'2018-10-05 14:00:00'),(4,5671111125,'2018-10-05 14:00:00'),(5,7298347593,'2018-10-05 14:00:00'),(5,7298347594,'2018-10-05 14:00:00'),(6,6465418688,'2018-10-05 14:00:00'),(6,6465418690,'2018-10-05 14:00:00'),(7,1672347981,'2018-10-05 14:00:00'),(7,1672347984,'2018-10-05 14:00:00'),(11,123,'2019-12-24 02:29:06'),(11,321,'2018-01-01 00:00:00'),(11,666,'2018-01-01 00:00:00'),(17,123,'2018-01-01 00:00:00'),(17,321,'2018-01-01 00:00:00'),(18,123,'2018-01-01 00:00:00'),(18,321,'2018-01-01 00:00:00'),(19,123,'2018-01-01 00:00:00'),(19,321,'2018-01-01 00:00:00'),(19,666,'2018-01-01 00:00:00');
/*!40000 ALTER TABLE `thread_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `uid` bigint(10) NOT NULL,
  `upwd` varchar(255) NOT NULL,
  `last_logout_time` datetime DEFAULT NULL,
  `bid` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `bid` (`bid`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `block` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'$2y$10$36uqvk2UOMdl0JW8q4hcqOJ5XOC/Pzo67/G7jj2cZiAbgvw0NYpXe',NULL,5),(123,'$2y$10$pYuFl4027irLzjYaFAFDGOTjPGh8kRYs8qC5HTBCaE5PH1gABq5yu','2018-01-01 00:00:00',1),(321,'$2y$10$pYuFl4027irLzjYaFAFDGOTjPGh8kRYs8qC5HTBCaE5PH1gABq5yu','2018-01-01 00:00:00',1),(666,'$2y$10$pYuFl4027irLzjYaFAFDGOTjPGh8kRYs8qC5HTBCaE5PH1gABq5yu','2018-01-01 00:00:00',1),(1111,'$2y$10$KvyPGd6GajO8McPuOIH2UePi9EqlI9QyhKOopX135dEq7yiFG7Jlq','2019-12-23 21:28:30',1),(123321,'$2y$10$R3oWqTYZrZIBr9Id3ww7jOE6C5SxBdYK8hJutGr8wnXtwQgdP9i2K',NULL,1),(1672347981,'aaaaax','2018-10-10 14:10:30',12),(1672347982,'aaaaay','2018-10-11 15:00:12',13),(1672347983,'aaaaaz','2018-10-11 16:12:30',13),(1672347984,'aaabbb','2018-10-11 16:45:30',14),(1672347985,'aaaccc','2018-10-12 16:56:30',14),(1672347986,'aaaddd','2018-10-13 17:42:00',15),(1672347987,'aaaeee','2018-10-15 07:34:30',15),(1672347988,'aaafff','2018-10-15 23:23:43',16),(1672347989,'aaaggg','2018-10-16 13:00:00',16),(5671111120,'SDaaal','2018-10-05 20:01:30',6),(5671111121,'aI45an','2018-10-05 21:12:30',7),(5671111122,'aFWEvao','2018-10-05 21:13:23',8),(5671111123,'aSDFfp','2018-10-05 22:12:51',8),(5671111124,'aF3hnfq','2018-10-05 23:12:30',9),(5671111125,'aaehcxr','2018-10-06 00:01:00',9),(5671111126,'aaEaCs','2018-10-06 03:01:30',10),(5671111127,'aaVDFt','2018-10-07 09:00:00',10),(5671111128,'aaaaau','2018-10-08 10:10:30',11),(5671111129,'aaaaav','2018-10-08 12:34:30',11),(5671111130,'aaaaaw','2018-10-09 13:01:10',12),(6465418297,'Faaaj','2018-10-05 19:00:00',5),(6465418688,'aa_aa','2018-10-05 14:00:00',1),(6465418689,'a!aab','2018-10-05 14:00:30',1),(6465418690,'aaaac','2018-10-05 14:01:00',2),(6465418691,'aa.ad','2018-10-05 14:01:30',2),(6465418692,'aa,ae','2018-10-05 15:00:00',3),(6465418693,'aaaaf','2018-10-05 16:00:00',3),(6465418694,'Aaaag','2018-10-05 17:00:30',4),(6465418695,'Baaaah','2018-10-05 18:01:00',4),(6465418696,'Naaaai','2018-10-05 19:00:30',5),(6465418698,'Gaaaak','2018-10-05 20:00:00',6),(6465418699,'aD23am','2018-10-05 20:45:46',7),(7298347591,'aaaqqq','2018-10-21 15:00:00',21),(7298347592,'aaarrr','2018-10-22 17:00:30',1),(7298347593,'aaasss','2018-10-23 05:01:00',3),(7298347594,'aaattt','2018-10-24 07:00:30',21),(7298347595,'aaauuu','2018-10-25 08:00:38',22),(7298347596,'aaavvv','2018-10-26 09:00:54',22),(7298347597,'aaawww','2018-10-26 10:00:30',22),(7298347598,'a?axxx','2018-10-27 22:01:00',0),(7298347599,'aaayyy','2018-10-30 23:00:30',0),(7298347600,'aaazzz','2018-10-31 19:00:23',0),(7298347601,'asdfas','2018-02-01 00:00:00',0),(8576892731,'aaahhh','2018-10-17 15:00:30',17),(8576892732,'aaaiii','2018-10-18 17:01:54',17),(8576892733,'aaajjj','2018-10-18 08:04:49',18),(8576892734,'aaakkk','2018-10-18 14:06:38',18),(8576892735,'aaalll','2018-10-18 16:00:20',19),(8576892736,'aaammm','2018-10-19 14:00:30',19),(8576892737,'aaannn','2018-10-20 14:01:00',20),(8576892738,'aaaooo','2018-10-20 14:00:30',20),(8576892739,'aaappp','2018-10-20 12:00:34',21);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profile` (
  `uid` bigint(10) NOT NULL,
  `unickname` varchar(30) DEFAULT NULL,
  `self_introduction` varchar(500) DEFAULT NULL,
  `family_introduction` varchar(500) DEFAULT NULL,
  `photo_link` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (8,'gongjuren',NULL,NULL,NULL),(123,'GM','asdf','ff','pic/testGM.jpeg'),(321,'GM_xiaohao',NULL,NULL,NULL),(666,'GM_xiaoxiaohao',NULL,NULL,NULL),(1111,NULL,NULL,NULL,NULL),(123321,NULL,NULL,NULL,NULL),(1672347981,'S12K',NULL,NULL,NULL),(1672347982,'DBS',NULL,NULL,NULL),(1672347983,'98Kar',NULL,NULL,NULL),(1672347984,'Groza',NULL,NULL,NULL),(1672347985,'Victor',NULL,NULL,NULL),(1672347986,'UMP9',NULL,NULL,NULL),(1672347987,'QBZ',NULL,NULL,NULL),(1672347988,'QBU',NULL,NULL,NULL),(1672347989,'',NULL,NULL,NULL),(5671111120,'AWM',NULL,NULL,NULL),(5671111121,'LuBenWei',NULL,NULL,NULL),(5671111122,'55KAI',NULL,NULL,NULL),(5671111123,'DP28',NULL,NULL,NULL),(5671111124,'P1911',NULL,NULL,NULL),(5671111125,'',NULL,NULL,NULL),(5671111126,'P92',NULL,NULL,NULL),(5671111127,'',NULL,NULL,NULL),(5671111128,'Win95',NULL,NULL,NULL),(5671111129,'M1897',NULL,NULL,NULL),(5671111130,'S686',NULL,NULL,NULL),(6465418292,'RuoZhiW',NULL,NULL,NULL),(6465418297,'SCAR',NULL,NULL,NULL),(6465418688,'John',NULL,NULL,NULL),(6465418689,'Richard',NULL,NULL,NULL),(6465418690,'ZhiZhangW',NULL,NULL,NULL),(6465418691,'ErZiWang',NULL,NULL,NULL),(6465418693,'AK47',NULL,NULL,NULL),(6465418694,'M416',NULL,NULL,NULL),(6465418695,'HK416',NULL,NULL,NULL),(6465418696,'M4A1',NULL,NULL,NULL),(6465418698,'AUG',NULL,NULL,NULL),(6465418699,'M24',NULL,NULL,NULL),(7298347591,'SKT',NULL,NULL,NULL),(7298347592,'Faker',NULL,NULL,NULL),(7298347593,'TheShy',NULL,NULL,NULL),(7298347594,'DoinB',NULL,NULL,NULL),(7298347595,'NingW',NULL,NULL,NULL),(7298347596,'',NULL,NULL,NULL),(7298347597,'ZZW123',NULL,NULL,NULL),(7298347598,'ZHP100',NULL,NULL,NULL),(7298347599,'??Thomas',NULL,NULL,NULL),(7298347600,'NiBABA',NULL,NULL,NULL),(7298347601,'DB100FEN',NULL,NULL,NULL),(8576892731,'',NULL,NULL,NULL),(8576892732,'Ninja',NULL,NULL,NULL),(8576892733,'Dva',NULL,NULL,NULL),(8576892734,'',NULL,NULL,NULL),(8576892735,'GUABISIMA',NULL,NULL,NULL),(8576892736,'LGD',NULL,NULL,NULL),(8576892737,'EDG',NULL,NULL,NULL),(8576892738,'IGNB',NULL,NULL,NULL),(8576892739,'C9',NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `project`
--

USE `project`;

--
-- Final view structure for view `f_id`
--

/*!50001 DROP VIEW IF EXISTS `f_id`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `f_id` (`fid`) AS select `friend_relation`.`uid2` AS `fid` from `friend_relation` where (`friend_relation`.`uid1` = 123) union select `friend_relation`.`uid1` AS `fid` from `friend_relation` where (`friend_relation`.`uid2` = 123) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-24 21:39:55
