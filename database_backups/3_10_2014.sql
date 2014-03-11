-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: diga_reservation_system
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.2

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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('admin',2,'Admin User, account GOD','$roleLvl = Yii::app()->db->createCommand()->select(\'user_level_id\')->from(\'user\')->where(\'email=\\\'\'.(Yii::app()->user->id).\'\\\'\')->queryRow(); return 1==$roleLvl[\'user_level_id\'];','N;'),('user',2,'logged in student using their account','$roleLvl = Yii::app()->db->createCommand()->select(\'user_level_id\')->from(\'user\')->where(\'email=\\\'\'.(Yii::app()->user->id).\'\\\'\')->queryRow(); return 3==$roleLvl[\'user_level_id\'];','N;'),('workStudy',2,'Work Study Student, higherthan user','$roleLvl = Yii::app()->db->createCommand()->select(\'user_level_id\')->from(\'user\')->where(\'email=\\\'\'.(Yii::app()->user->id).\'\\\'\')->queryRow(); return 2==$roleLvl[\'user_level_id\'];','N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accessory`
--

DROP TABLE IF EXISTS `accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessory` (
  `accessory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `equipment_id` int(4) NOT NULL,
  PRIMARY KEY (`accessory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` VALUES (8,'Accessory 1',125),(9,'Accessory 2',125);
/*!40000 ALTER TABLE `accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alerted_admin`
--

DROP TABLE IF EXISTS `alerted_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alerted_admin` (
  `alerted_admin_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`alerted_admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerted_admin`
--

LOCK TABLES `alerted_admin` WRITE;
/*!40000 ALTER TABLE `alerted_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `alerted_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (4,'Davis'),(5,'Not Davis');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `monday` tinyint(1) DEFAULT NULL,
  `tuesday` tinyint(1) DEFAULT NULL,
  `wednesday` tinyint(1) DEFAULT NULL,
  `thursday` tinyint(1) DEFAULT NULL,
  `friday` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (7,5,'Motorcycle Jupming','jupman@jump.com','2014-01-24','2014-03-31','12:00:00','13:00:00',0,1,0,1,0),(8,4,'DateCourse 102','dateEamil@emaeeil.ede','2014-02-01','2014-02-28','01:00:00','02:30:00',1,0,1,0,1);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `equipment_id` int(4) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(30) DEFAULT NULL,
  `manufacturer` varchar(30) DEFAULT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `equipment_type_id` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `su_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`equipment_id`),
  KEY `equipment_type_id` (`equipment_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (125,'','','','This is a description. This is a very impressive thing we have right here. Lots of amazing things about it. Probably the most amazing thing on the face of the Planet. I\'m just saying, you\'re lucky Stetson was awesome enough to purchase one. Back in my day we used to have to do this by hand.!!!!!!!!.','Amazing Thing',NULL,1,1,''),(127,'','','','','Super Incredible Thing','/html/reserveServer/diga_reservation_system/images/equipment/equipment_image_127.jpg',1,1,'');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_checkin`
--

DROP TABLE IF EXISTS `equipment_checkin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_checkin` (
  `equipment_checkin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `borrowers_email` varchar(30) NOT NULL,
  `equipment_id` bigint(20) NOT NULL,
  `checkin_date` date NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `checkin_assistant_email` varchar(30) NOT NULL,
  PRIMARY KEY (`equipment_checkin_id`),
  KEY `borrowers_email` (`borrowers_email`),
  KEY `checkout_assistant_email` (`checkin_assistant_email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_checkin`
--

LOCK TABLES `equipment_checkin` WRITE;
/*!40000 ALTER TABLE `equipment_checkin` DISABLE KEYS */;
INSERT INTO `equipment_checkin` VALUES (17,'jlites@stetson.edu',127,'2014-03-08','Returned.','mburton1@stetson.edu'),(16,'jlites@stetson.edu',125,'2014-03-08','Boom-shaka-laka','mburton1@stetson.edu'),(18,'jlites@stetson.edu',125,'2014-03-17','Accessory 2 is missing.','mburton1@stetson.edu'),(19,'jlites@stetson.edu',125,'2014-10-10','hIYAH','mburton1@stetson.edu');
/*!40000 ALTER TABLE `equipment_checkin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_checkin_accessory`
--

DROP TABLE IF EXISTS `equipment_checkin_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_checkin_accessory` (
  `equipment_checkin_id` bigint(20) NOT NULL,
  `accessory_id` int(11) NOT NULL,
  `present` tinyint(1) NOT NULL,
  PRIMARY KEY (`equipment_checkin_id`,`accessory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_checkin_accessory`
--

LOCK TABLES `equipment_checkin_accessory` WRITE;
/*!40000 ALTER TABLE `equipment_checkin_accessory` DISABLE KEYS */;
INSERT INTO `equipment_checkin_accessory` VALUES (13,8,0),(18,8,0),(18,9,0),(19,8,0),(19,9,0);
/*!40000 ALTER TABLE `equipment_checkin_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_problem_report`
--

DROP TABLE IF EXISTS `equipment_problem_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_problem_report` (
  `equipment_problem_report_id` bigint(20) NOT NULL DEFAULT '0',
  `equipment_id` bigint(20) NOT NULL,
  `reported_by_email` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `problem_type_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`equipment_problem_report_id`),
  KEY `equipment_id` (`equipment_id`),
  KEY `reported_by_email` (`reported_by_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_problem_report`
--

LOCK TABLES `equipment_problem_report` WRITE;
/*!40000 ALTER TABLE `equipment_problem_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment_problem_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_reservation`
--

DROP TABLE IF EXISTS `equipment_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_reservation` (
  `equipment_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrowers_email` varchar(30) NOT NULL,
  `equipment_id` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `checkout_assistant_email` varchar(30) NOT NULL,
  PRIMARY KEY (`equipment_reservation_id`),
  KEY `borrowers_email` (`borrowers_email`),
  KEY `checkout_assistant_email` (`checkout_assistant_email`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_reservation`
--

LOCK TABLES `equipment_reservation` WRITE;
/*!40000 ALTER TABLE `equipment_reservation` DISABLE KEYS */;
INSERT INTO `equipment_reservation` VALUES (27,'mburton1@stetson.edu',127,'2014-03-08','2014-03-08','Some Notes.','mburton1@stetson.edu'),(26,'jlites@stetson.edu',125,'2014-03-08','2014-03-08','boom','mburton1@stetson.edu'),(28,'jlites@stetson.edu',125,'2014-03-25','2014-04-14','Everything present and accounted for :)','mburton1@stetson.edu'),(29,'jlites@stetson.edu',125,'2014-08-04','2014-12-14','Boom.','mburton1@stetson.edu');
/*!40000 ALTER TABLE `equipment_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_reservation_accessory`
--

DROP TABLE IF EXISTS `equipment_reservation_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_reservation_accessory` (
  `equipment_reservation_id` bigint(20) NOT NULL,
  `accessory_id` int(11) NOT NULL,
  `present` tinyint(1) NOT NULL,
  PRIMARY KEY (`equipment_reservation_id`,`accessory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_reservation_accessory`
--

LOCK TABLES `equipment_reservation_accessory` WRITE;
/*!40000 ALTER TABLE `equipment_reservation_accessory` DISABLE KEYS */;
INSERT INTO `equipment_reservation_accessory` VALUES (13,8,1),(25,8,1),(28,8,1),(28,9,1),(29,8,0),(29,9,1);
/*!40000 ALTER TABLE `equipment_reservation_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_type`
--

DROP TABLE IF EXISTS `equipment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_type` (
  `equipment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`equipment_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_type`
--

LOCK TABLES `equipment_type` WRITE;
/*!40000 ALTER TABLE `equipment_type` DISABLE KEYS */;
INSERT INTO `equipment_type` VALUES (1,'Camera'),(2,'Video Camera'),(3,'Microphone');
/*!40000 ALTER TABLE `equipment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `allDay` smallint(5) unsigned NOT NULL DEFAULT '0',
  `start` int(10) unsigned DEFAULT NULL,
  `end` int(10) unsigned DEFAULT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_helper`
--

DROP TABLE IF EXISTS `events_helper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_helper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_helper`
--

LOCK TABLES `events_helper` WRITE;
/*!40000 ALTER TABLE `events_helper` DISABLE KEYS */;
INSERT INTO `events_helper` VALUES (1,1,'test event 1'),(2,1,'test event 2');
/*!40000 ALTER TABLE `events_helper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_user_preference`
--

DROP TABLE IF EXISTS `events_user_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_user_preference` (
  `user_id` int(10) unsigned NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `mobile_alert` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(40) DEFAULT NULL,
  `email_alert` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_user_preference`
--

LOCK TABLES `events_user_preference` WRITE;
/*!40000 ALTER TABLE `events_user_preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `events_user_preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jqcalendar`
--

DROP TABLE IF EXISTS `jqcalendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jqcalendar` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `IsAllDayEvent` smallint(6) NOT NULL,
  `Color` varchar(200) DEFAULT NULL,
  `RecurringRule` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jqcalendar`
--

LOCK TABLES `jqcalendar` WRITE;
/*!40000 ALTER TABLE `jqcalendar` DISABLE KEYS */;
INSERT INTO `jqcalendar` VALUES (3,'record',NULL,NULL,'2014-01-27 01:00:00','2014-01-27 02:00:00',0,NULL,NULL);
/*!40000 ALTER TABLE `jqcalendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_hour`
--

DROP TABLE IF EXISTS `lab_hour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_hour` (
  `lab_hour` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `monday` tinyint(1) DEFAULT NULL,
  `tuesday` tinyint(1) DEFAULT NULL,
  `wednesday` tinyint(1) DEFAULT NULL,
  `thursday` tinyint(1) DEFAULT NULL,
  `friday` tinyint(1) DEFAULT NULL,
  `saturday` tinyint(1) DEFAULT NULL,
  `sunday` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`lab_hour`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_hour`
--

LOCK TABLES `lab_hour` WRITE;
/*!40000 ALTER TABLE `lab_hour` DISABLE KEYS */;
INSERT INTO `lab_hour` VALUES (1,5,'2014-02-01','2014-03-31','15:00:00','16:30:00',0,0,0,0,0,1,1);
/*!40000 ALTER TABLE `lab_hour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_type`
--

DROP TABLE IF EXISTS `problem_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problem_type` (
  `problem_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`problem_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_type`
--

LOCK TABLES `problem_type` WRITE;
/*!40000 ALTER TABLE `problem_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `problem_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `monday_open` time NOT NULL,
  `monday_close` time NOT NULL,
  `tuesday_open` time NOT NULL,
  `tuesday_close` time NOT NULL,
  `wednesday_open` time NOT NULL,
  `wednesday_close` time NOT NULL,
  `thursday_open` time NOT NULL,
  `thursday_close` time NOT NULL,
  `friday_open` time NOT NULL,
  `friday_close` time NOT NULL,
  `saturday_open` time NOT NULL,
  `saturday_close` time NOT NULL,
  `sunday_open` time NOT NULL,
  `sunday_close` time NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `building_id` (`building_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (5,123,4,'Dat room in davis','google.com','07:00:00','20:00:00','08:30:00','23:59:59','07:00:00','20:00:00','07:00:00','20:00:00','07:00:00','20:00:00','07:00:00','20:00:00','07:00:00','20:00:00'),(6,321,5,'Dat rum in NAUGHT Davis','','08:30:00','22:00:00','08:30:00','22:00:00','08:30:00','22:00:00','08:30:00','22:00:00','08:30:00','22:00:00','08:30:00','22:00:00','08:30:00','22:00:00'),(7,456,5,'Another room in not davis','','08:30:00','23:00:00','08:30:00','23:00:00','08:30:00','23:00:00','08:30:00','23:00:00','08:30:00','23:00:00','08:30:00','23:00:00','08:30:00','23:00:00');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_equipment`
--

DROP TABLE IF EXISTS `room_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_equipment` (
  `room_equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`room_equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_equipment`
--

LOCK TABLES `room_equipment` WRITE;
/*!40000 ALTER TABLE `room_equipment` DISABLE KEYS */;
INSERT INTO `room_equipment` VALUES (1,5,'Digital Printer','67314278631','The printer that prints digital thaaaangs',''),(2,5,'That other printer','654654','No one likes this one','');
/*!40000 ALTER TABLE `room_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_equipment_reservation`
--

DROP TABLE IF EXISTS `room_equipment_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_equipment_reservation` (
  `room_equipment_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_equipment_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  PRIMARY KEY (`room_equipment_reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_equipment_reservation`
--

LOCK TABLES `room_equipment_reservation` WRITE;
/*!40000 ALTER TABLE `room_equipment_reservation` DISABLE KEYS */;
INSERT INTO `room_equipment_reservation` VALUES (1,1,'bob@bob.com',5,'2014-03-08 15:30:00','2014-03-08 16:30:00'),(2,1,'jlites@stetson.edu',5,'2014-03-08 15:00:00','2014-03-08 15:30:00');
/*!40000 ALTER TABLE `room_equipment_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_problem_report`
--

DROP TABLE IF EXISTS `room_problem_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_problem_report` (
  `room_problem_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `reported_by_email` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `problem_type_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`room_problem_report_id`),
  KEY `room_id` (`room_id`),
  KEY `building_id` (`building_id`),
  KEY `reported_by_email` (`reported_by_email`),
  KEY `problem_type_id` (`problem_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_problem_report`
--

LOCK TABLES `room_problem_report` WRITE;
/*!40000 ALTER TABLE `room_problem_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_problem_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_reservation`
--

DROP TABLE IF EXISTS `room_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_reservation` (
  `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`room_reservation_id`),
  KEY `email` (`email`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_reservation`
--

LOCK TABLES `room_reservation` WRITE;
/*!40000 ALTER TABLE `room_reservation` DISABLE KEYS */;
INSERT INTO `room_reservation` VALUES (1,'jlites@stetson.edu',5,'2014-02-02 12:00:00','2014-02-02 18:00:00'),(16,'jlites@stetson.edu',5,'2014-02-27 10:00:00','2014-02-27 11:00:00'),(5,'mburton1@stetson.edu',5,'2014-02-11 00:00:00','2014-02-11 12:00:00'),(6,'mburton1@stetson.edu',5,'2014-02-12 08:00:00','2014-02-12 12:00:00'),(7,'mburton1@stetson.edu',5,'2014-02-10 00:00:00','2014-02-10 12:00:00'),(8,'mburton1@stetson.edu',5,'2014-02-12 07:30:00','2014-02-12 08:00:00'),(9,'mburton1@stetson.edu',5,'2014-02-12 07:00:00','2014-02-12 07:30:00'),(10,'mburton1@stetson.edu',5,'2014-02-13 13:00:00','2014-02-13 14:00:00'),(11,'mburton1@stetson.edu',6,'2014-02-20 00:00:00','2014-02-20 12:00:00'),(12,'mburton1@stetson.edu',6,'2014-02-12 00:00:00','2014-02-12 12:00:00'),(13,'mburton1@stetson.edu',6,'2014-02-13 00:00:00','2014-02-13 12:00:00'),(14,'mburton1@stetson.edu',5,'2014-02-13 12:00:00','2014-02-13 13:00:00'),(15,'mburton1@stetson.edu',6,'2014-02-11 12:00:00','2014-02-11 13:30:00'),(19,'jlites@stetson.edu',5,'2014-02-26 10:00:00','2014-02-26 12:00:00'),(20,'jlites@stetson.edu',5,'2014-02-28 10:00:00','2014-02-28 12:00:00'),(21,'jlites@stetson.edu',5,'2014-02-24 10:00:00','2014-02-24 12:00:00'),(22,'jlites@stetson.edu',5,'2014-02-27 13:00:00','2014-02-27 14:30:00'),(23,'jlites@stetson.edu',5,'2014-02-23 12:00:00','2014-02-23 13:00:00'),(24,'mburton1@stetson.edu',5,'2014-02-25 13:00:00','2014-02-25 13:30:00'),(25,'jlites@stetson.edu',5,'2014-02-25 10:30:00','2014-02-25 12:00:00'),(26,'jlites@stetson.edu',5,'2014-03-05 12:00:00','2014-03-05 13:30:00');
/*!40000 ALTER TABLE `room_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_reservation_permission`
--

DROP TABLE IF EXISTS `room_reservation_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_reservation_permission` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_reservation_permission`
--

LOCK TABLES `room_reservation_permission` WRITE;
/*!40000 ALTER TABLE `room_reservation_permission` DISABLE KEYS */;
INSERT INTO `room_reservation_permission` VALUES (2,7),(1,6),(13,5);
/*!40000 ALTER TABLE `room_reservation_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_reservation_policy`
--

DROP TABLE IF EXISTS `room_reservation_policy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_reservation_policy` (
  `room_reservation_policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reservable` tinyint(1) NOT NULL,
  `max_reservation_hours` int(11) NOT NULL,
  PRIMARY KEY (`room_reservation_policy_id`),
  KEY `building_id` (`building_id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_reservation_policy`
--

LOCK TABLES `room_reservation_policy` WRITE;
/*!40000 ALTER TABLE `room_reservation_policy` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_reservation_policy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specification`
--

DROP TABLE IF EXISTS `specification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specification` (
  `specification_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `equipment_id` bigint(20) NOT NULL,
  PRIMARY KEY (`specification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specification`
--

LOCK TABLES `specification` WRITE;
/*!40000 ALTER TABLE `specification` DISABLE KEYS */;
INSERT INTO `specification` VALUES (4,'Spec 1','5GHz',125),(5,'Spec 2','5GB',125),(6,'Spec 3','12MP',125);
/*!40000 ALTER TABLE `specification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `user_level_id` int(11) NOT NULL DEFAULT '1',
  `salt` varchar(200) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_number` (`id_number`),
  UNIQUE KEY `email` (`email`),
  KEY `user_level_id` (`user_level_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (13,'jlites@stetson.edu','password','Jacob','Lites','555',1,'salty','800--'),(12,'mburton1@stetson.edu','password','Mark','Burton','777',3,'salty','333'),(14,'sdandy@stetson.edu','dandyguy','Space','Dandy','123457890',2,'','80022');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_level` (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`user_level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_level`
--

LOCK TABLES `user_level` WRITE;
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` VALUES (1,'casual'),(2,'workstudy'),(3,'admin');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_warning`
--

DROP TABLE IF EXISTS `user_warning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_warning` (
  `user_warning_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `user_warning_type_id` int(11) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`user_warning_id`),
  KEY `email` (`email`),
  KEY `user_warning_type_id` (`user_warning_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_warning`
--

LOCK TABLES `user_warning` WRITE;
/*!40000 ALTER TABLE `user_warning` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_warning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_warning_type`
--

DROP TABLE IF EXISTS `user_warning_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_warning_type` (
  `user_warning_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_warning_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_warning_type`
--

LOCK TABLES `user_warning_type` WRITE;
/*!40000 ALTER TABLE `user_warning_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_warning_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-10 21:49:02
