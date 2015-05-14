CREATE DATABASE  IF NOT EXISTS `portfolio` /*!40100 DEFAULT CHARACTER SET big5 */;
USE `PORTFOLIO`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: PORTFOLIO
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Item`
--

DROP TABLE IF EXISTS `Item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_price` decimal(6,0) DEFAULT NULL,
  `item_shipping` decimal(6,0) DEFAULT NULL,
  `item_type` int(2) DEFAULT NULL,
  `item_image_filepath` varchar(90) DEFAULT NULL,
  `item_upload_date` datetime DEFAULT NULL,
  `item_status` enum('SALE','SOLD','AVAILABLE') DEFAULT 'AVAILABLE',
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  KEY `item_type_idx` (`item_type`),
  CONSTRAINT `item_type_id` FOREIGN KEY (`item_type`) REFERENCES `ItemType` (`item_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Item`
--

LOCK TABLES `Item` WRITE;
/*!40000 ALTER TABLE `Item` DISABLE KEYS */;
INSERT INTO `Item` VALUES (6,'Desert Ironwood Knife','Razor sharp Damascus Steel Knife. This knife has a fully fitted Desert Ironwood handle. A real peice of art as well as something you can use!',250,15,1,'Knife-6:2015-05-13.jpg','2015-05-13 15:37:00','AVAILABLE'),(7,'Tungsten Koa Ring','A beautiful tungsten ring with a Koa Wood inlay. Koa is a native wood to Hawaiin and olds sacred meaning to it\'s people.',50,5,4,'Ring-7:2015-05-13.jpg','2015-05-13 15:55:00','AVAILABLE'),(8,'Tungsten Argentine Lignum Ring','Argentine Lignum is one of the hardest woods in the world. As it ages it will turn green.',50,5,4,'Ring-8:2015-05-13.jpg','2015-05-13 15:58:00','SOLD'),(9,'Tungsten Argentine Lignum Ring','Argentine Lignum is one of the hardest woods in the world. As it ages it will turn green.',60,20,4,'Ring-9:2015-05-13.jpg','2015-05-13 15:59:00','AVAILABLE'),(10,'Kingwood Cufflinks','Cufflinks made from Kingwood with an African Blackwood border',50,5,3,'Cufflinks-10:2015-05-14.jpg','2015-05-14 16:28:00','AVAILABLE'),(11,'Desert Ironwood Pendant','An infinity pendant carved from Desert Ironwood',50,5,5,'Pendant-11:2015-05-14.jpg','2015-05-14 16:29:00','AVAILABLE'),(12,'Koa Wood Pendant','An infinity pendant carved from Koa Wood',50,5,5,'Pendant-12:2015-05-14.jpg','2015-05-14 16:30:00','AVAILABLE'),(13,'Cocobolo Ear Gauges','Cocobolo Ear gauges',80,5,6,'Custom-13:2015-05-14.jpg','2015-05-14 16:33:00','AVAILABLE');
/*!40000 ALTER TABLE `Item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ItemType`
--

DROP TABLE IF EXISTS `ItemType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ItemType` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`item_type_id`),
  UNIQUE KEY `item_type_id_UNIQUE` (`item_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ItemType`
--

LOCK TABLES `ItemType` WRITE;
/*!40000 ALTER TABLE `ItemType` DISABLE KEYS */;
INSERT INTO `ItemType` VALUES (1,'Damascus Steel Knife'),(2,'Stainless Steel Knife'),(3,'Cufflinks'),(4,'Ring'),(5,'Pendant'),(6,'Custom');
/*!40000 ALTER TABLE `ItemType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_total` decimal(6,0) DEFAULT NULL,
  `order_shipping` decimal(6,0) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`user_id`,`item_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order`
--

LOCK TABLES `Order` WRITE;
/*!40000 ALTER TABLE `Order` DISABLE KEYS */;
/*!40000 ALTER TABLE `Order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) DEFAULT NULL,
  `user_first_name` varchar(45) DEFAULT NULL,
  `user_last_name` varchar(45) DEFAULT NULL,
  `user_phone` char(10) DEFAULT NULL,
  `user_address1` varchar(45) DEFAULT NULL,
  `user_address2` varchar(45) DEFAULT NULL,
  `user_zip` char(5) DEFAULT NULL,
  `user_city` varchar(45) DEFAULT NULL,
  `user_state` varchar(45) DEFAULT NULL,
  `user_country` varchar(45) DEFAULT NULL,
  `user_status` bit(1) DEFAULT b'1',
  `user_type` enum('AD','RG') DEFAULT 'RG',
  `user_password` varchar(45) DEFAULT NULL,
  `user_security_question1` enum('0','1','2','3','4','5') DEFAULT NULL,
  `user_answer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=big5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (2,'neildalton6@gmail.com','Neil','Dalton',NULL,'','',NULL,NULL,NULL,NULL,'','AD','20e7e17b342e091b1142e3a8d24e0f66',NULL,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-14 16:37:54
