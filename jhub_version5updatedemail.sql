-- MySQL dump 10.13  Distrib 9.5.0, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jhub_db
-- ------------------------------------------------------
-- Server version	9.5.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'c64c716e-f453-11f0-b744-6f4a24d5c351:1-1630';

--
-- Table structure for table `__efmigrationshistory`
--

DROP TABLE IF EXISTS `__efmigrationshistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `__efmigrationshistory` (
  `MigrationId` varchar(150) NOT NULL,
  `ProductVersion` varchar(32) NOT NULL,
  PRIMARY KEY (`MigrationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__efmigrationshistory`
--

LOCK TABLES `__efmigrationshistory` WRITE;
/*!40000 ALTER TABLE `__efmigrationshistory` DISABLE KEYS */;
INSERT INTO `__efmigrationshistory` VALUES ('20260616045821_InitialMySQLCreate','10.0.9');
/*!40000 ALTER TABLE `__efmigrationshistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `ReferenceNumber` varchar(50) NOT NULL,
  `TourId` int NOT NULL,
  `LeadName` varchar(255) NOT NULL,
  `LeadAge` int NOT NULL,
  `LeadEmail` varchar(255) NOT NULL,
  `LeadPhone` varchar(50) NOT NULL,
  `SpecialCategory` varchar(50) NOT NULL,
  `CompanionNames` text,
  `TotalAmount` decimal(18,2) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending Validation',
  `BookingDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProofOfPaymentUrl` text,
  `Slots` int NOT NULL DEFAULT '1',
  `BookedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RefundStatus` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `RefundReason` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `RefundPayoutChannel` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `RefundNotes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `RefundRequestedAt` datetime DEFAULT NULL,
  `RefundOperatorMessage` varchar(1000) DEFAULT NULL,
  `RefundProofPath` varchar(500) DEFAULT NULL,
  `RefundUpdatedAt` datetime DEFAULT NULL,
  `IsApproved` bit(1) NOT NULL DEFAULT b'0',
  `IsArchived` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`),
  KEY `FK_Bookings_Tours_TourId` (`TourId`),
  KEY `IX_Bookings_Tracking` (`ReferenceNumber`,`LeadEmail`),
  CONSTRAINT `FK_Bookings_Tours_TourId` FOREIGN KEY (`TourId`) REFERENCES `tours` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (192,'JH-30576',49,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 15:08:15',NULL,1,'2026-10-05 15:08:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x01,0x00),(193,'JH-99706',49,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 15:08:33',NULL,1,'2026-10-05 15:08:33',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x01,0x00),(194,'JH-41972',49,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Rejected','2026-10-05 15:09:31',NULL,1,'2026-10-05 15:09:31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x00,0x01),(196,'JH-49284',49,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Rejected','2026-10-05 15:12:14',NULL,1,'2026-10-05 15:12:14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x00,0x01),(197,'JH-73412',49,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 15:12:17',NULL,1,'2026-10-05 15:12:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x01,0x00),(198,'JH-21696',52,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Rejected','2026-10-05 21:43:37',NULL,1,'2026-10-05 21:43:37',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x00,0x01),(199,'JH-80949',52,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 21:43:41',NULL,1,'2026-10-05 21:43:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x01,0x00),(200,'JH-90495',52,'Frey Calot',12,'coaltfran@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 21:43:52',NULL,1,'2026-10-05 21:43:52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-05 21:50:55',0x01,0x01),(201,'JH-61229',52,'Oliver Pineda',12,'oliverpineda1426@gmail.com','09672189373','none',NULL,4500.00,'Validated','2026-10-05 21:48:29',NULL,1,'2026-10-05 21:48:29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-05 21:50:52',0x01,0x01),(202,'JH-40458',51,'Oliver Pineda',12,'oliverpineda1426@gmail.com','09672189373','none',NULL,450000.00,'Validated','2026-10-05 21:50:40',NULL,1,'2026-10-05 21:50:40',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0x01,0x00);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `TourName` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `ReturnDate` datetime NOT NULL,
  `Description` text,
  `BasePrice` decimal(18,2) NOT NULL,
  `OperationalCost` decimal(18,2) NOT NULL,
  `TotalCapacity` int NOT NULL,
  `SlotsFilled` int NOT NULL DEFAULT '0',
  `MinParticipants` int NOT NULL,
  `Deadline` datetime NOT NULL,
  `VehicleAssignment` varchar(150) DEFAULT NULL,
  `AccommodationAssignment` varchar(150) DEFAULT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `ImageUrl` longtext,
  `ItineraryHighlights` text,
  `VendorId` int DEFAULT NULL,
  `ArchivedAt` datetime DEFAULT NULL,
  `IntensityLevel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `LandscapeType` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Activities` text,
  `IsBoosted` tinyint(1) NOT NULL DEFAULT '0',
  `BoostedAt` datetime DEFAULT NULL,
  `IsCancelled` bit(1) NOT NULL DEFAULT b'0',
  `CancelledAt` datetime DEFAULT NULL,
  `IsComplete` tinyint(1) NOT NULL DEFAULT '0',
  `CompletedAt` datetime DEFAULT NULL,
  `SlotsFilledAt` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_tour_vendor` (`VendorId`),
  CONSTRAINT `fk_tour_vendor` FOREIGN KEY (`VendorId`) REFERENCES `vendors` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_Tours_Vendors_VendorId` FOREIGN KEY (`VendorId`) REFERENCES `vendors` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (48,'El Nido, Palawan Adventure Experience','El Nido, Palawan','2026-10-11 17:05:00','2026-10-14 17:05:00','3d2n beach tour',4500.00,2000.00,4,0,0,'0001-01-01 00:00:00',NULL,NULL,'Active','/images/69e4aaa5-13e3-4602-9390-4e12141f2e73.jpg','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',19,NULL,'Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x01,'2026-10-05 01:07:41',0,NULL,NULL),(49,'Basco, Batanes Adventure Experience','Basco, Batanes','2026-10-11 17:34:00','2026-10-14 17:34:00','3d2n beach tour',4500.00,2000.00,3,3,0,'0001-01-01 00:00:00',NULL,NULL,'Archived','/images/default.jpg','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',19,'2026-10-05 22:54:02','Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x00,NULL,0,NULL,NULL),(50,'El Nido, Palawan Adventure Experience','El Nido, Palawan','2026-10-11 17:38:00','2026-10-14 17:38:00','3d2n beach tour',4500.00,2000.00,4,0,0,'0001-01-01 00:00:00',NULL,NULL,'Archived','/images/e8d73d3d-9a91-46f4-8f1e-d0cdf9daec1d.jpg','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',19,'2026-10-05 02:00:07','Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x01,'2026-10-05 02:00:07',0,NULL,NULL),(51,'Basco, Batanes Adventure Package','Basco, Batanes','2026-10-12 11:22:00','2026-10-15 11:22:00','3d2n beach tour',4500.00,2000.00,8,1,0,'0001-01-01 00:00:00',NULL,NULL,'Active','/images/4ede580f-9456-42da-8c70-3dfc81187bbc.jpeg','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',19,NULL,'Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x01,'2026-10-05 21:51:14',0,NULL,NULL),(52,'Sagada, Mountain Province Adventure Package','Sagada, Mountain Province','2026-10-12 13:40:00','2026-10-15 13:40:00','3d2n Mountain Province ',4500.00,2000.00,14,1,0,'0001-01-01 00:00:00',NULL,NULL,'Archived','/images/85b1744b-15ec-4b18-8e86-eb340844a317.webp','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',19,'2026-10-05 21:49:55','Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x01,'2026-10-05 21:45:13',0,NULL,NULL),(53,'Sagada, Mountain Province Adventure Package','Sagada, Mountain Province','2026-10-12 14:11:00','2026-10-15 14:11:00','3d2n beach tour',4500.00,2000.00,14,0,0,'0001-01-01 00:00:00',NULL,NULL,'Archived','/images/ec767a1e-1e4f-4b26-93ab-3a3af35e852d.webp','Scenic View, Local Food Trip, Guided Tour, Souvenir Shopping',20,'2026-10-05 22:38:26','Moderate','Mountain / Highlands','Hiking & Trekking',0,NULL,0x00,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Age` int NOT NULL DEFAULT '0',
  `Sex` varchar(20) NOT NULL DEFAULT '',
  `FullName` varchar(255) NOT NULL DEFAULT '',
  `PhoneNumber` varchar(20) NOT NULL DEFAULT '',
  `Status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Active',
  `IsApproved` bit(1) NOT NULL DEFAULT b'0',
  `IsRejected` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (38,'colberry@gmail.com','12345','Admin',18,'female','Alice Calot','09672189373','Active',0x00,0x00),(39,'caramel@gmail.com','12345','operator',18,'male','caramel','09672189373','Rejected',0x00,0x00),(40,'berry@gmail.com','hello','Operator',18,'male','caramel','09672189373','Active',0x00,0x00),(42,'banana@gmail.com','hello','operator',18,'female','caramel','09672189373','Rejected',0x00,0x00),(45,'potato@gmail.com','hello','operator',18,'female','Frey Calot','09672189373','Rejected',0x00,0x00),(46,'coaltfran@gmail.com','12345','Operator',18,'male','Frey Calot','09672189373','Active',0x00,0x00);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendors` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `VendorName` varchar(255) NOT NULL,
  `ServiceType` varchar(100) NOT NULL,
  `ContactInfo` varchar(255) NOT NULL,
  `PaymentTerms` longtext,
  `Status` varchar(50) DEFAULT 'Active',
  `TourId` int DEFAULT NULL,
  `Payables` decimal(18,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`),
  KEY `TourId` (`TourId`),
  CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`TourId`) REFERENCES `tours` (`Id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (19,'Transport A','Transport','09603456743','\"30% booking deposit via Bank Transfer 7 days before tour date. 70% balance via ACH within 7 days post-trip, contingent on digital submission of signed Trip Ticket, fuel logs, and toll receipts. Flat-rate vehicle pricing applies; no per-passenger adjustments.\"','Active',52,2000.00),(20,'Transport B','Transport','09603456743','\"40% booking deposit via Bank Transfer 7 days before tour date. 70% balance via ACH within 7 days post-trip, contingent on digital submission of signed Trip Ticket, fuel logs, and toll receipts. Flat-rate vehicle pricing applies; no per-passenger adjustments.\"','Active',53,2000.00),(21,'Hotel B','Accommodation','09603456743','\"40% booking deposit via Bank Transfer 7 days before tour date. 70% balance via ACH within 7 days post-trip, contingent on digital submission of signed Trip Ticket, fuel logs, and toll receipts. Flat-rate vehicle pricing applies; no per-passenger adjustments.\"','Active',NULL,2000.00),(22,'Hotel C','Accommodation','09603456743','\"40% booking deposit via Bank Transfer 7 days before tour date. 70% balance via ACH within 7 days post-trip, contingent on digital submission of signed Trip Ticket, fuel logs, and toll receipts. Flat-rate vehicle pricing applies; no per-passenger adjustments.\"','Active',NULL,2000.00),(23,'Tour Guide A','Tour Guide','09603456743','\"40% booking deposit via Bank Transfer 7 days before tour date. 70% balance via ACH within 7 days post-trip, contingent on digital submission of signed Trip Ticket, fuel logs, and toll receipts. Flat-rate vehicle pricing applies; no per-passenger adjustments.\"','Active',NULL,2000.00);
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-06  0:09:36
