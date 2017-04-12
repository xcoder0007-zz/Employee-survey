-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: life_survey
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Current Database: `life_survey`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `life_survey` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `life_survey`;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('560185063ac693ba1851d80c8c6369d0','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.99 Safari/537.36',1422267958,'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"1\";s:8:\"username\";s:5:\"admin\";s:6:\"status\";s:1:\"1\";s:8:\"is_admin\";s:1:\"1\";}'),('7ce5bf479fa29f255d51f69d0ccc3216','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.99 Safari/537.36',1422263962,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'US','United States'),(2,'CA','Canada'),(3,'AF','Afghanistan'),(4,'AL','Albania'),(5,'DZ','Algeria'),(6,'DS','American Samoa'),(7,'AD','Andorra'),(8,'AO','Angola'),(9,'AI','Anguilla'),(10,'AQ','Antarctica'),(11,'AG','Antigua and/or Barbuda'),(12,'AR','Argentina'),(13,'AM','Armenia'),(14,'AW','Aruba'),(15,'AU','Australia'),(16,'AT','Austria'),(17,'AZ','Azerbaijan'),(18,'BS','Bahamas'),(19,'BH','Bahrain'),(20,'BD','Bangladesh'),(21,'BB','Barbados'),(22,'BY','Belarus'),(23,'BE','Belgium'),(24,'BZ','Belize'),(25,'BJ','Benin'),(26,'BM','Bermuda'),(27,'BT','Bhutan'),(28,'BO','Bolivia'),(29,'BA','Bosnia and Herzegovina'),(30,'BW','Botswana'),(31,'BV','Bouvet Island'),(32,'BR','Brazil'),(33,'IO','British lndian Ocean Territory'),(34,'BN','Brunei Darussalam'),(35,'BG','Bulgaria'),(36,'BF','Burkina Faso'),(37,'BI','Burundi'),(38,'KH','Cambodia'),(39,'CM','Cameroon'),(40,'CV','Cape Verde'),(41,'KY','Cayman Islands'),(42,'CF','Central African Republic'),(43,'TD','Chad'),(44,'CL','Chile'),(45,'CN','China'),(46,'CX','Christmas Island'),(47,'CC','Cocos (Keeling) Islands'),(48,'CO','Colombia'),(49,'KM','Comoros'),(50,'CG','Congo'),(51,'CK','Cook Islands'),(52,'CR','Costa Rica'),(53,'HR','Croatia (Hrvatska)'),(54,'CU','Cuba'),(55,'CY','Cyprus'),(56,'CZ','Czech Republic'),(57,'DK','Denmark'),(58,'DJ','Djibouti'),(59,'DM','Dominica'),(60,'DO','Dominican Republic'),(61,'TP','East Timor'),(62,'EC','Ecuador'),(63,'EG','Egypt'),(64,'SV','El Salvador'),(65,'GQ','Equatorial Guinea'),(66,'ER','Eritrea'),(67,'EE','Estonia'),(68,'ET','Ethiopia'),(69,'FK','Falkland Islands (Malvinas)'),(70,'FO','Faroe Islands'),(71,'FJ','Fiji'),(72,'FI','Finland'),(73,'FR','France'),(74,'FX','France, Metropolitan'),(75,'GF','French Guiana'),(76,'PF','French Polynesia'),(77,'TF','French Southern Territories'),(78,'GA','Gabon'),(79,'GM','Gambia'),(80,'GE','Georgia'),(81,'DE','Germany'),(82,'GH','Ghana'),(83,'GI','Gibraltar'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'ID','Indonesia'),(101,'IR','Iran (Islamic Republic of)'),(102,'IQ','Iraq'),(103,'IE','Ireland'),(104,'IL','Israel'),(105,'IT','Italy'),(106,'CI','Ivory Coast'),(107,'JM','Jamaica'),(108,'JP','Japan'),(109,'JO','Jordan'),(110,'KZ','Kazakhstan'),(111,'KE','Kenya'),(112,'KI','Kiribati'),(113,'KP','Korea, Democratic People\'s Republic of'),(114,'KR','Korea, Republic of'),(115,'XK','Kosovo'),(116,'KW','Kuwait'),(117,'KG','Kyrgyzstan'),(118,'LA','Lao People\'s Democratic Republic'),(119,'LV','Latvia'),(120,'LB','Lebanon'),(121,'LS','Lesotho'),(122,'LR','Liberia'),(123,'LY','Libyan Arab Jamahiriya'),(124,'LI','Liechtenstein'),(125,'LT','Lithuania'),(126,'LU','Luxembourg'),(127,'MO','Macau'),(128,'MK','Macedonia'),(129,'MG','Madagascar'),(130,'MW','Malawi'),(131,'MY','Malaysia'),(132,'MV','Maldives'),(133,'ML','Mali'),(134,'MT','Malta'),(135,'MH','Marshall Islands'),(136,'MQ','Martinique'),(137,'MR','Mauritania'),(138,'MU','Mauritius'),(139,'TY','Mayotte'),(140,'MX','Mexico'),(141,'FM','Micronesia, Federated States of'),(142,'MD','Moldova, Republic of'),(143,'MC','Monaco'),(144,'MN','Mongolia'),(145,'ME','Montenegro'),(146,'MS','Montserrat'),(147,'MA','Morocco'),(148,'MZ','Mozambique'),(149,'MM','Myanmar'),(150,'NA','Namibia'),(151,'NR','Nauru'),(152,'NP','Nepal'),(153,'NL','Netherlands'),(154,'AN','Netherlands Antilles'),(155,'NC','New Caledonia'),(156,'NZ','New Zealand'),(157,'NI','Nicaragua'),(158,'NE','Niger'),(159,'NG','Nigeria'),(160,'NU','Niue'),(161,'NF','Norfork Island'),(162,'MP','Northern Mariana Islands'),(163,'NO','Norway'),(164,'OM','Oman'),(165,'PK','Pakistan'),(166,'PW','Palau'),(167,'PA','Panama'),(168,'PG','Papua New Guinea'),(169,'PY','Paraguay'),(170,'PE','Peru'),(171,'PH','Philippines'),(172,'PN','Pitcairn'),(173,'PL','Poland'),(174,'PT','Portugal'),(175,'PR','Puerto Rico'),(176,'QA','Qatar'),(177,'RE','Reunion'),(178,'RO','Romania'),(179,'RU','Russian Federation'),(180,'RW','Rwanda'),(181,'KN','Saint Kitts and Nevis'),(182,'LC','Saint Lucia'),(183,'VC','Saint Vincent and the Grenadines'),(184,'WS','Samoa'),(185,'SM','San Marino'),(186,'ST','Sao Tome and Principe'),(187,'SA','Saudi Arabia'),(188,'SN','Senegal'),(189,'RS','Serbia'),(190,'SC','Seychelles'),(191,'SL','Sierra Leone'),(192,'SG','Singapore'),(193,'SK','Slovakia'),(194,'SI','Slovenia'),(195,'SB','Solomon Islands'),(196,'SO','Somalia'),(197,'ZA','South Africa'),(198,'GS','South Georgia South Sandwich Islands'),(199,'ES','Spain'),(200,'LK','Sri Lanka'),(201,'SH','St. Helena'),(202,'PM','St. Pierre and Miquelon'),(203,'SD','Sudan'),(204,'SR','Suriname'),(205,'SJ','Svalbarn and Jan Mayen Islands'),(206,'SZ','Swaziland'),(207,'SE','Sweden'),(208,'CH','Switzerland'),(209,'SY','Syrian Arab Republic'),(210,'TW','Taiwan'),(211,'TJ','Tajikistan'),(212,'TZ','Tanzania, United Republic of'),(213,'TH','Thailand'),(214,'TG','Togo'),(215,'TK','Tokelau'),(216,'TO','Tonga'),(217,'TT','Trinidad and Tobago'),(218,'TN','Tunisia'),(219,'TR','Turkey'),(220,'TM','Turkmenistan'),(221,'TC','Turks and Caicos Islands'),(222,'TV','Tuvalu'),(223,'UG','Uganda'),(224,'UA','Ukraine'),(225,'AE','United Arab Emirates'),(226,'GB','United Kingdom'),(227,'UM','United States minor outlying islands'),(228,'UY','Uruguay'),(229,'UZ','Uzbekistan'),(230,'VU','Vanuatu'),(231,'VA','Vatican City State'),(232,'VE','Venezuela'),(233,'VN','Vietnam'),(234,'VG','Virgin Islands (British)'),(235,'VI','Virgin Islands (U.S.)'),(236,'WF','Wallis and Futuna Islands'),(237,'EH','Western Sahara'),(238,'YE','Yemen'),(239,'YU','Yugoslavia'),(240,'ZR','Zaire'),(241,'ZM','Zambia'),(242,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'french'),(2,'german'),(3,'russian'),(4,'polish'),(5,'czech'),(6,'itlian'),(7,'arabic');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `question` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `q_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Comment évaluez-vous l\'offre du menu?					',1),(2,1,'Comment évaluez-vous la qualité gustative des plats?					',2),(3,1,'Comment évaluez-vous la qualité du service?					',3),(4,1,'Comment évaluez-vous l\'atmosphère du restaurant?					',4),(5,1,'Comment évaluez-vous la qualité des boissons?					',5),(6,2,'Wie bewerten Sie unsere Menu Auswahl?					',1),(7,2,'Wie bewerten Sie den Geschmack?					',2),(8,2,'Wie bewerten Sie den Service?					',3),(9,2,'Wie bewerten Sie die Atmosphäre im Restaurant?					',4),(10,2,'Wie bewerten Sie die Qualität der Getränke?					',5),(11,3,'Как Вы оцениваете меню?					',1),(12,3,'Как Вы оцениваете вкус блюд?					',2),(13,3,'Как Вы оцениваете уровень сервиса?					',3),(14,3,'Как Вы оцениваете атмосферу ресторана?					',4),(15,3,'Как Вы оцениваете качество напитков?				',5),(16,4,'Jak oceniasz ofertę karty zamówień?					',1),(17,4,'Jak oceniasz smak potraw?					',2),(18,4,'Jak oceniasz obsługę w restauracji?					',3),(19,4,'Jak oceniasz atmosfere restauracji?					',4),(20,4,'Jak oceniasz jakość napojów?			',5),(21,5,'Jak by jste zhodnotili nabídku jídla?					',1),(22,5,'Jak by jste zhodnotili chuť jídla?					',2),(23,5,'Jak by jste zhodnotili efektivitu služeb?					',3),(24,5,'Jak by jste zhodnotili atmosféru restaurace ?					\r\n',4),(25,5,'Jak by jste zhodnotili kvalitu nápojů?					',5),(26,6,'Come giudicate il menu\' offerto?					',1),(27,6,'Come giudicate il sapore dei piatti?					',2),(28,6,'Come giudicate il servizio?					',3),(29,6,'Come giudicate l\'atmosfera del ristorante?					',4),(30,6,'Come giudicate la qualita\' delle bevande?				',5),(31,7,'كيف تقيم قائمة الطعام 					',1),(32,7,'كيف تقيم طعم المأكولات					',2),(33,7,'كيف تقيم الخدمه 					',3),(34,7,'كيف تقيم الجو العام للمطعم 					',4),(35,7,'كيف تقيم نوعية المشروبات 					',5);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,'Excellent\r\n',1),(2,'Bien\r\n',1),(3,'Acceptable\r\n',1),(4,'Médiocre\r\n',1),(5,'',1);
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `dishes` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `atmosphere` int(11) NOT NULL,
  `drinks` int(11) NOT NULL,
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `restaurant_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (3,222,0,3,1,3,3,1,'test','2014-12-20 19:20:45',0,0),(4,222,0,3,1,3,3,1,'test','2014-12-20 19:20:45',0,0);
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alias` int(11) NOT NULL,
  `real_name` varchar(512) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin Account','admin','$2a$08$i/or5/kGn8uo74vYj1pWIeDWDgJhqW4Rln49ee5YULB9rZWeGSDla','marwan.gendy@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2015-01-26 11:24:26','2015-01-26 11:12:23','2015-01-26 10:10:00',1),(2,2,'User Account','user','$2a$08$uuSeI8mTeddT6s7tJtluJeMoIRCA6BOkfHUByuHxln66aDQKCctKa','marwan.gendy@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-01-26 09:45:05',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_restaurants`
--

DROP TABLE IF EXISTS `users_restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_restaurants` (
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_restaurants`
--

LOCK TABLES `users_restaurants` WRITE;
/*!40000 ALTER TABLE `users_restaurants` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_restaurants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-26 12:48:44
