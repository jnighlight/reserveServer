-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: diga_reservation_system
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`accessory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` VALUES (1,'USB Cable',NULL),(2,'Power Adapter',NULL),(3,'Carrying Bag',NULL),(4,'Instruction Manual',NULL);
/*!40000 ALTER TABLE `accessory` ENABLE KEYS */;
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
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `monday` tinyint(1) DEFAULT NULL,
  `tuesday` tinyint(1) DEFAULT NULL,
  `wednesday` tinyint(1) DEFAULT NULL,
  `thursday` tinyint(1) DEFAULT NULL,
  `friday` tinyint(1) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'College 101','teacher@stetson.edu','12:00:00','18:00:00',1,0,1,0,1,5);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `equipment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(30) DEFAULT NULL,
  `manufacturer` varchar(30) DEFAULT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `equipment_type_id` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`equipment_id`),
  KEY `equipment_type_id` (`equipment_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (1,'serial_number','manufacturer','model_number','HOORAY. LOOK AT ME!. I\'M A DESCRIPTION!.','PowerShot G16','http://www.usa.canon.com/CUSA/assets/app/images/cameras/powershot/PS_G16/g16_586x186.gif',1,0),(2,'serial_number','manufacturer','model_number','LOOK AT ME, I AM ALSO A DESCRIPTION!!','Vixia HF R40','http://www.usa.canon.com/CUSA/assets/app/images/camcorder/VIXIA_HF_R40/vixia_hfr40_586x186.gif',2,0);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_accessory`
--

DROP TABLE IF EXISTS `equipment_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment_accessory` (
  `equipment_id` bigint(20) NOT NULL DEFAULT '0',
  `accessory_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`equipment_id`,`accessory_id`),
  KEY `accessory_id` (`accessory_id`),
  CONSTRAINT `equipment_accessory_ibfk_1` FOREIGN KEY (`accessory_id`) REFERENCES `accessory` (`accessory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_accessory`
--

LOCK TABLES `equipment_accessory` WRITE;
/*!40000 ALTER TABLE `equipment_accessory` DISABLE KEYS */;
INSERT INTO `equipment_accessory` VALUES (1,1),(2,1),(1,2),(2,2),(2,3),(2,4);
/*!40000 ALTER TABLE `equipment_accessory` ENABLE KEYS */;
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
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `checkout_assistant_email` varchar(30) NOT NULL,
  PRIMARY KEY (`equipment_reservation_id`),
  KEY `borrowers_email` (`borrowers_email`),
  KEY `checkout_assistant_email` (`checkout_assistant_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_reservation`
--

LOCK TABLES `equipment_reservation` WRITE;
/*!40000 ALTER TABLE `equipment_reservation` DISABLE KEYS */;
INSERT INTO `equipment_reservation` VALUES (1,'mburton1@stetson.edu',2,'2014-01-11 23:06:38','2014-01-13 23:06:38','Notes about this checkout!!','jlites@stetson.edu'),(2,'mburton1@stetson.edu',1,'2014-01-12 01:13:18','2014-01-14 01:13:18','Blah Blah Blah','jlites@stetson.edu');
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
INSERT INTO `equipment_reservation_accessory` VALUES (1,1,1),(1,2,0),(1,3,1),(1,4,0),(2,1,0),(2,2,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_type`
--

LOCK TABLES `equipment_type` WRITE;
/*!40000 ALTER TABLE `equipment_type` DISABLE KEYS */;
INSERT INTO `equipment_type` VALUES (1,'Camera'),(2,'Video Camera');
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
  PRIMARY KEY (`room_id`),
  KEY `building_id` (`building_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (5,123,4,'Dat room in davis','google.com'),(6,321,5,'Dat rum in NAUGHT Davis',''),(7,456,5,'Another room in not davis','');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
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
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`room_reservation_id`),
  KEY `email` (`email`),
  KEY `room_id` (`room_id`),
  KEY `building_id` (`building_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_reservation`
--

LOCK TABLES `room_reservation` WRITE;
/*!40000 ALTER TABLE `room_reservation` DISABLE KEYS */;
INSERT INTO `room_reservation` VALUES (1,'jlites@stetson.edu',4,5,'2014-02-02 12:00:00','2014-02-02 18:00:00'),(5,'mburton1@stetson.edu',4,5,'2014-02-11 00:00:00','2014-02-11 12:00:00'),(6,'mburton1@stetson.edu',4,5,'2014-02-12 08:00:00','2014-02-12 12:00:00'),(7,'mburton1@stetson.edu',4,5,'2014-02-10 00:00:00','2014-02-10 12:00:00'),(8,'mburton1@stetson.edu',4,5,'2014-02-12 07:30:00','2014-02-12 08:00:00'),(9,'mburton1@stetson.edu',4,5,'2014-02-12 07:00:00','2014-02-12 07:30:00'),(10,'mburton1@stetson.edu',4,5,'2014-02-13 13:00:00','2014-02-13 14:00:00'),(11,'mburton1@stetson.edu',5,6,'2014-02-20 00:00:00','2014-02-20 12:00:00'),(12,'mburton1@stetson.edu',5,6,'2014-02-12 00:00:00','2014-02-12 12:00:00'),(13,'mburton1@stetson.edu',5,6,'2014-02-13 00:00:00','2014-02-13 12:00:00'),(14,'mburton1@stetson.edu',4,5,'2014-02-13 12:00:00','2014-02-13 13:00:00'),(15,'mburton1@stetson.edu',5,6,'2014-02-11 12:00:00','2014-02-11 13:30:00');
/*!40000 ALTER TABLE `room_reservation` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specification`
--

LOCK TABLES `specification` WRITE;
/*!40000 ALTER TABLE `specification` DISABLE KEYS */;
INSERT INTO `specification` VALUES (1,'Megapixel','12.1',1),(2,'Optical Zoom','5.0x',1),(3,'Digital Zoom','4.0x',1);
/*!40000 ALTER TABLE `specification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `email` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id_number` (`id_number`),
  KEY `user_level_id` (`user_level_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('mburton1@stetson.edu','password','Mark','Burton','77',1,'?S9?zV?\n?n?a{	??~?q???????V?r \r??f~P?|9???tG?-??\0/?&?Y??#\'I??+p?.??ku?[?!???=?k??c?m???DTz????b??(#?','55'),('jlites@stetson.edu','password','Jacob','Lites','680',1,'G?S[c??O???=????44?fS?W@?????:???? ???F?84?\0????p?/??|?FUa`\Z?-???e??\0??(?8_r?3?T\ZUs?q??????|????^C???x=????1?3??C?=o?','097');
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

-- Dump completed on 2014-02-14 15:58:46
