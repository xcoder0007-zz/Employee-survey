-- MySQL dump 10.13  Distrib 5.5.42, for Linux (x86_64)
--
-- Host: localhost    Database: sunrise_restaurant_survey
-- ------------------------------------------------------
-- Server version	5.5.42-cll

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
-- Current Database: `sunrise_restaurant_survey`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sunrise_restaurant_survey` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sunrise_restaurant_survey`;

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
INSERT INTO `ci_sessions` VALUES ('30ee6386af8f4462d556819d2c8c493f','41.65.31.101','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36',1426233358,'a:2:{s:9:\"user_data\";s:0:\"\";s:18:\"flash:new:redirect\";b:0;}'),('4ff1bcd50604466496a752a543e41559','197.134.86.60','Mozilla/5.0 (Linux; Android 4.4.2; en-gb; SAMSUNG GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/',1426198013,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"11\";s:8:\"username\";s:3:\"CBH\";s:6:\"status\";s:1:\"1\";s:8:\"is_admin\";s:1:\"0\";s:13:\"restaurant_id\";s:1:\"1\";s:11:\"language_id\";s:1:\"8\";}'),('52b798adc771aa92920e7a74eb51597e','41.65.71.144','Mozilla/5.0 (Linux; Android 4.4.2; SM-T531 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Saf',1426185924,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"4\";s:8:\"username\";s:3:\"ABH\";s:6:\"status\";s:1:\"1\";s:8:\"is_admin\";s:1:\"1\";s:13:\"restaurant_id\";s:2:\"24\";s:11:\"language_id\";s:1:\"8\";}'),('539c5f6298f83a2a1420c8fe0d0abfc4','66.249.81.204','Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20110814 Firefox/6.0 Google favicon',1426232894,'a:2:{s:9:\"user_data\";s:0:\"\";s:18:\"flash:new:redirect\";b:0;}'),('a51172808923549c82572c17c4f934af','41.65.31.118','Mozilla/5.0 (iPad; CPU OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/75',1426180691,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"11\";s:8:\"username\";s:3:\"CBH\";s:6:\"status\";s:1:\"1\";s:8:\"is_admin\";s:1:\"0\";s:13:\"restaurant_id\";s:1:\"1\";s:11:\"language_id\";s:1:\"2\";}'),('b6fd09fc6f7606c24a34dfcb5f120d3d','41.65.71.144','Mozilla/5.0 (Linux; Android 4.4.2; SM-T531 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Saf',1426182357,'a:2:{s:9:\"user_data\";s:0:\"\";s:18:\"flash:new:redirect\";b:0;}'),('cbb7bdb80106e6c1137cb777a74db704','41.65.71.141','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36',1426187773,'a:2:{s:9:\"user_data\";s:0:\"\";s:18:\"flash:new:redirect\";b:0;}'),('edb8b58f4ffc3e97228287c848221198','197.134.86.60','Mozilla/5.0 (Linux; Android 4.4.2; en-gb; SAMSUNG GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/',1426187712,'a:2:{s:9:\"user_data\";s:0:\"\";s:18:\"flash:new:redirect\";b:0;}'),('fda7b12a9db18780145883d0cb86ff72','105.39.101.24','Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; GT-N8000 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 S',1426187180,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"11\";s:8:\"username\";s:3:\"CBH\";s:6:\"status\";s:1:\"1\";s:8:\"is_admin\";s:1:\"0\";s:13:\"restaurant_id\";s:1:\"1\";s:11:\"language_id\";s:1:\"8\";}');
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
-- Table structure for table `daily_mails`
--

DROP TABLE IF EXISTS `daily_mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_mails`
--

LOCK TABLES `daily_mails` WRITE;
/*!40000 ALTER TABLE `daily_mails` DISABLE KEYS */;
INSERT INTO `daily_mails` VALUES (1,'marwan.gendy@gmail.com',1),(2,'marwan.gendy@sunrise-resorts.com',1);
/*!40000 ALTER TABLE `daily_mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'SUNRISE Grand Select Crystal Bay','92d5e-resize-crystal-bay-logo.jpg','CB'),(2,'SUNRISE Select Royal Makadi ','1b311-sunrise-select-royal-makadi-resort-logo-one-color.jpg','RM'),(3,'SUNRISE Select Diamond Beach','46803-sunrise-select-diamond-beach-resort-logo-one-color-small.jpg','DB'),(4,'SUNRISE Grand Select Arabian Beach','eaa44-sunrise-arabianl_logo.jpg','AB'),(5,'Feastval Shedwan','0baa4-festival-logo.jpg','SH'),(6,'Festival Smart Line','7b098-smart-line.jpg','SL'),(7,'SUNRISE Grand Select Montemare','c74b6-montemare.png','MO'),(8,'SUNRISE Holidays','8380e-sunrise-holidays-resort-logo-one-color.jpg','HO'),(9,'Festival Le Jardin','bf722-festival-le-jardin-logo.jpg','LJ'),(10,'Festival Riviera','4396e-festival-riviera-logo.jpg','RV'),(11,'SENTIDO Mamlouk Palace','720e5-sentido-logo.jpg','MP'),(12,'SUNRISE Select Garden Beach','c56c1-sunrise-select-garden-beach-resort-spa-logo-one-color-large.jpg','GB');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'French'),(2,'German'),(3,'Russian'),(4,'Polish'),(5,'Czech'),(6,'Italian'),(7,'Arabic'),(8,'English');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificants`
--

DROP TABLE IF EXISTS `notificants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificants`
--

LOCK TABLES `notificants` WRITE;
/*!40000 ALTER TABLE `notificants` DISABLE KEYS */;
INSERT INTO `notificants` VALUES (1,'marwan.gendy@gmail.com',2),(2,'abbas.elshabasy@sunrise-resorts.com',1),(3,'Said.Atiek@sunrise-resorts.com,sue.horner@sunrise-resorts.com,abbas.elshabasy@sunrise-resorts.com,Sherif.naguib@sunrise-resorts.com,Ashraf.Elharizy@Sunrise-Resorts.com,mohamed.kamel@sunrise-resorts.comو',4),(4,'gouda.ramadan@sunrise-resorts.com,abbas.elshabasy@sunrise-resorts.com, alaa.mahmoud@sunrisehotels-egypt.com',1);
/*!40000 ALTER TABLE `notificants` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Comment évaluez-vous l\'offre du menu?					',1),(2,1,'Comment évaluez-vous la qualité gustative des plats?					',2),(3,1,'Comment évaluez-vous la qualité du service?					',3),(4,1,'Comment évaluez-vous l\'atmosphère du restaurant?					',4),(5,1,'Comment évaluez-vous la qualité des boissons?					',5),(6,2,'Wie bewerten Sie unsere Menu Auswahl?					',1),(7,2,'Wie bewerten Sie den Geschmack?					',2),(8,2,'Wie bewerten Sie den Service?					',3),(9,2,'Wie bewerten Sie die Atmosphäre im Restaurant?					',4),(10,2,'Wie bewerten Sie die Qualität der Getränke?					',5),(11,3,'Как Вы оцениваете меню?					',1),(12,3,'Как Вы оцениваете вкус блюд?					',2),(13,3,'Как Вы оцениваете уровень сервиса?					',3),(14,3,'Как Вы оцениваете атмосферу ресторана?					',4),(15,3,'Как Вы оцениваете качество напитков?				',5),(16,4,'Jak oceniasz ofertę karty zamówień?					',1),(17,4,'Jak oceniasz smak potraw?					',2),(18,4,'Jak oceniasz obsługę w restauracji?					',3),(19,4,'Jak oceniasz atmosfere restauracji?					',4),(20,4,'Jak oceniasz jakość napojów?			',5),(21,5,'Jak by jste zhodnotili nabídku jídla?					',1),(22,5,'Jak by jste zhodnotili chuť jídla?					',2),(23,5,'Jak by jste zhodnotili efektivitu služeb?					',3),(24,5,'Jak by jste zhodnotili atmosféru restaurace ?					\r\n',4),(25,5,'Jak by jste zhodnotili kvalitu nápojů?					',5),(26,6,'Come giudicate il menu\' offerto?					',1),(27,6,'Come giudicate il sapore dei piatti?					',2),(28,6,'Come giudicate il servizio?					',3),(29,6,'Come giudicate l\'atmosfera del ristorante?					',4),(30,6,'Come giudicate la qualita\' delle bevande?				',5),(31,7,'كيف تقيم قائمة الطعام 					',1),(32,7,'كيف تقيم طعم المأكولات					',2),(33,7,'كيف تقيم الخدمه 					',3),(34,7,'كيف تقيم الجو العام للمطعم 					',4),(35,7,'كيف تقيم نوعية المشروبات 					',5),(36,8,'How do you rate the menu offer?',1),(37,8,'How do you rate the taste of the dishes?',2),(38,8,'How do you rate the service?',3),(39,8,'How do you rate the restaurant atmosphere?',4),(40,8,'How do you rate the quality of the drinks?',5);
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
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,'Excellent\r\n',1,1),(2,'Très Bien\n',1,2),(3,'Bien',1,3),(4,'Acceptable',1,4),(5,'Médiocre',1,5),(6,'Excellent',8,1),(7,'Very Good',8,2),(8,'Good',8,3),(9,'Fair',8,4),(10,'Poor',8,5),(11,'Ausgezeichnet',2,1),(12,'Sehr gut',2,2),(13,'Gut',2,3),(14,'Befriedigend',2,4),(15,'Schlecht',2,5),(16,'Отлично',3,1),(17,'Очень Хорошо',3,2),(18,'Хорошо',3,3),(19,'Удовлетв',3,4),(20,'Плохо',3,5),(21,'Doskonale',4,1),(22,'Bardzo Dobrze',4,2),(23,'Dobrze',4,3),(24,'Dostatecznie',4,4),(25,'Słabo',4,5),(26,'Výborné',5,1),(27,'Velmi Dobré ',5,2),(28,'Dobré',5,3),(29,'Uspokojivé',5,4),(30,'Špatné',5,5),(31,'Eccellente',6,1),(32,'Ottimo ',6,2),(33,'Buono',6,3),(34,'Sufficiente',6,4),(35,'Insufficiente',6,5),(36,'ممتاز',7,1),(37,'جيد جدا ',7,2),(38,'جيد',7,3),(39,'مقبول',7,4),(40,'ضعيف',7,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` VALUES (1,'PANORAMA Mediterranean Restaurant',1),(2,'MASALA Indian Restaurant',1),(3,'Felucca Fish Restaurant',1),(4,'Main Restaurant (Rainbow)',1),(5,'Posidon Beach',1),(6,'Shahrazad (Main Restaurant)',2),(7,'Trattoria (Italian Restaurant)',2),(8,'Asian Restaurant',2),(9,'Dalila Restaurant (Egyptain Food)',2),(10,'T-Bones  - steak house ',2),(11,'El Paso (Mexican  Food)',2),(12,'Bedouin',2),(13,'Sirene (Fish Restaurant)',2),(14,'Half-moon restaurant (Main Restaurant)',3),(15,'San Marino (Italian Restaurant) ',3),(16,'Kandahar restaurant',3),(17,'Blue bay',3),(18,'International (Main Restaurant)',4),(19,'Nora Nora ',4),(20,'La Pergola (Italian Restaurant)',4),(21,'Masala  (Indian Restaurant)',4),(22,'Blue Blue ',4),(23,'Water Fall (Mangolian Restaurant)',4),(24,'Sabai (Thai Restaurant)',4),(25,'Cote D\'Azur (French Restaurant)',4),(26,'Felucca (Fish Restaurant)',4),(27,'Atlantic Pearl Restaurant ',5),(28,'Restaurant Garden Shedwan',5),(29,'Smart Line Restaurant ',6),(30,'SUNRISE (Main Restaurant)',7),(31,'Venezia Restaurant',7),(32,'Felucca Restaurant',7),(33,'Asiatic Fusion Restaurant ',7),(34,'Mediterranean Restaurant',8),(35,'El Sol Restaurant',8),(36,'Arabian Night Restaurant',8),(37,'Aida Restaurant',8),(38,'Les Palmiers   (Main Restaurant )',9),(39,'Mamma Mia  (Italian Restaurant)',9),(40,'The View   (Main Restaurant )',10),(41,'Asian Restaurant ',10),(42,'Shahrazad Restaurant ( Main Restaurant )',11),(43,'El  Paso Restaurant',11),(44,'Asian Restaurant',11),(45,'Gardino Restaurant ( Main Restaurant)',12),(46,'Gamila Restaurant',12),(47,'La Tratoria Restaurant',12),(48,'Grill House ',11);
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
  `comments` longtext COLLATE utf8_unicode_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `restaurant_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `picture` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

--
-- Table structure for table `texts`
--

DROP TABLE IF EXISTS `texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `t_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texts`
--

LOCK TABLES `texts` WRITE;
/*!40000 ALTER TABLE `texts` DISABLE KEYS */;
INSERT INTO `texts` VALUES (1,'Text message',8,2),(2,'Audio message',8,3),(3,'Submit my survey',8,5),(4,'Additional comments may be added via',8,1),(5,'This information will be used  internally by SUNRISE Group and will not be released for any commercial purpose',8,4),(6,'رسالة نصية',7,2),(7,'رسالة صوتية',7,3),(8,'ارسال دراستى ',7,5),(9,'يمكن إضافة تعليقات إضافية عبر',7,1),(10,'وسيتم استخدام هذه المعلومات داخليا من قبل مجموعة صن رايز ولن يتم استخدامها لأي غرض تجاري',7,4),(11,'messaggio di testo',6,2),(12,'messaggio audio',6,3),(13,'Invia i miei commenti',6,5),(14,'Ulteriori commenti possono essere aggiunti tramite',6,1),(15,'ueste informazioni saranno utilizzate internamente dalla Compagnia SUNRISE e non saranno pubblicate per scopi commerciali.',6,4),(16,'Textová zpráva ',5,2),(17,'Zvuková zpráva',5,3),(18,'Odeslat mé hodnocení',5,5),(19,'Dodatečné poznámky mohou být přidány pomocí ',5,1),(20,'Tyto informace budou použity výlučně pro interní účely Skupiny SUNRISE, a nebudou zpřístupněny pro jakékoli komerční účely',5,4),(21,'Wiadomości tekstowej',4,2),(22,'Wiadomości głosowej',4,3),(23,'Zapisz moją ankietę',4,5),(24,'Dodatkowe komentarze mogą być dodane za pośrednictwem ',4,1),(25,'nformacje te będą użyte wewnętrznie przez firmę SUNRISE i nie zostaną wykorzystane w celach komercyjnych ',4,4),(31,'Текстовое сообщение',3,2),(32,'Аудио сообщение',3,3),(33,'Завершить анкетирование',3,5),(34,'Дополнительные комментарии могут быть добавлены через:',3,1),(35,'Эта информация быть использована компанией SUNRISE только для внутренего анализа и не будет распространяться в коммерческих целях',3,4),(36,'Text Nachricht',2,2),(37,'Audio Nachricht',2,3),(38,'Umfrage abschicken',2,5),(39,'Sie können uns weiters Ihren Kommentar in folgender Form hinterlassen: ',2,1),(40,'Diese Information wird nur innerhalb der SUNRISE Gruppe und nicht für kommerzielle Zwecke verwendet. ',2,4),(41,'Message texte',1,2),(42,'Message audio',1,3),(43,'Transmettez mon questionnaire',1,5),(44,'Des commentaires supplémentaires peuvent être ajoutés via',1,1),(45,'Ces informations seront utilisées en interne par le Groupe SUNRISE et ne seront pas publiés à des fins commerciales',1,4),(46,'Room Nr.:\r\n',8,6),(47,'Nationality:\r\n',8,7),(48,'Nr. de Chambre:\r\n\r\n',1,6),(49,'Nationalité:\r\n',1,7),(50,'Zimmer Nr:\r\n',2,6),(51,'Nationalität:\r\n',2,7),(52,'Номер комнаты:\r\n',3,6),(53,'Национальность:\r\n',3,7),(54,'Pokój nr:\r\n',4,6),(55,'Narodowość:\r\n',4,7),(56,'Číslo pokoje.:\r\n',5,6),(57,'Národnost:\r\n',5,7),(58,'رقم الغرفه:\r\n',7,6),(59,'الجنسية:\r\n',7,7);
/*!40000 ALTER TABLE `texts` ENABLE KEYS */;
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
INSERT INTO `user_autologin` VALUES ('179cd3a4d58fae0f918cb0596150f1f3',11,'Mozilla/5.0 (Linux; Android 4.4.2; en-gb; SAMSUNG GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.5 Chrome/28.0.1500.94 Mobil','197.134.86.60','2015-03-12 22:06:59'),('1834dc5550926ea18c18c8fb7dd350a5',11,'Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; GT-N8000 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30','105.39.101.24','2015-03-12 18:58:50'),('59a9081d1b9c93ca56b5b3551f293c7d',2,'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0','41.65.31.105','2015-02-19 13:59:56'),('a47cc625883ae9fc17228b4141a8a670',2,'Mozilla/5.0 (Linux; Android 4.4.2; en-gb; SAMSUNG SM-T531 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.5 Chrome/28.0.1500.94 Safari','41.65.31.118','2015-02-23 08:38:39'),('b948e182df1d37b756206723ac202725',11,'Mozilla/5.0 (Linux; Android 4.4.2; fr-fr; SAMSUNG SM-T231 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.5 Chrome/28.0.1500.94 Safari','197.134.127.244','2015-03-12 13:08:40'),('d4a42b705b1587e40f59d88eb897b04e',11,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0','41.65.31.110','2015-03-12 15:01:51');
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
  `admin` tinyint(1) DEFAULT '0',
  `hotel_relation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin Account','admin','$2a$08$i/or5/kGn8uo74vYj1pWIeDWDgJhqW4Rln49ee5YULB9rZWeGSDla','marwan.gendy@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'105.202.27.241','2015-03-12 17:05:39','2015-01-26 11:12:23','2015-03-12 17:05:39',1,1),(2,2,'User Account','user','$2a$08$uuSeI8mTeddT6s7tJtluJeMoIRCA6BOkfHUByuHxln66aDQKCctKa','marwan.gendy@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'105.202.27.241','2015-03-12 17:04:24','0000-00-00 00:00:00','2015-03-12 17:04:24',0,2),(3,3,'ahmed.shehata','ahmed.shehata','$2a$08$NfbkdHdcZQ4wj28pUiqkBudjpBFzmzWrCuaebooCuojSq9wZWHAwa','ahmed.shehata@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-02-26 14:01:38',0,3),(4,4,'ABH','ABH','$2a$08$wAf4M3W.vPw3bVwWyhIJo.BlAIFFvF470sOtEnS91vqz5ezGMgTxi','abh@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.71.144','2015-03-12 18:31:32','0000-00-00 00:00:00','2015-03-12 18:31:32',1,4),(5,5,'RMH','RMH','$2a$08$eenoSHmyNDHF.luiLvLd2.MPdOyZm56OzH3rqqy4N/W2RS/qQCRSy','rmh@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:49:34','0000-00-00 00:00:00','2015-03-10 10:49:34',0,5),(6,6,'SSH','SHH','$2a$08$.pnYCIKKjJVOMz7UW.CIuutlVcdo2QPGvzvESPZL730xSyiRcfXaO','ssh@festival-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-03-10 10:18:39',0,6),(7,7,'LJH','LJH','$2a$08$HDiUxTgHLRrvHjUJGJ0tiuv/ThTzuhr4QQsKA23A4VX6kTBXtSvE.','LJH@festival-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:42:36','0000-00-00 00:00:00','2015-03-10 10:42:36',0,7),(8,8,'RVH','RVH','$2a$08$6Z85l6.XybrutY1X/Bhh9Ol4W6y0nzybrRr.qEKiRKQNX.i0b.T8W','rvh@festival-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:42:54','0000-00-00 00:00:00','2015-03-10 10:42:54',0,8),(9,9,'SLH','SLH','$2a$08$KrlhPGqpg0xJjL0g/wondeHprTkQHEiGaYkjjzg8k5i8UF.txP1jG','slh@festival-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:43:40','0000-00-00 00:00:00','2015-03-10 10:43:40',0,9),(10,10,'MPH','MPH','$2a$08$Udw5nlynrylBIsFyCseY3OFGxrBTbbVvk4ZhHjCeGQLyIOEs/XYg6','MOH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:36:24','0000-00-00 00:00:00','2015-03-10 10:36:24',0,10),(11,11,'CBH','CBH','$2a$08$EteAvsvM49RimqcZTqwy1Oj.y9Q7jqgnU2g6j70Do6wNvum0fQUpC','CBH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'197.134.86.60','2015-03-12 22:06:59','0000-00-00 00:00:00','2015-03-12 22:06:59',0,11),(12,12,'MMH','MMH','$2a$08$CoE9WB9UXcLXcKK6lEx1JO2dzWmtcoJTGcQ/y6wLuce7JZxeV2KAm','MMH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:45:40','0000-00-00 00:00:00','2015-03-10 10:45:40',0,12),(13,13,'HOH','HOH','$2a$08$ELq4WEq9LeIvdXb.z8wu0.WK8f7IlqKdbXDTITrHVSi8KA4ABLH5K','HOH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-03-10 10:30:09',0,13),(14,14,'DBH','DBH','$2a$08$Cj2rDrAt9TzXJRdEkUha9ekc9PhXoYmQikwrmSOUFDl4qtxzpR5pW','DBH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:44:39','0000-00-00 00:00:00','2015-03-10 10:44:39',0,14),(15,15,'GBH','GBH','$2a$08$KR63VRu3nfofqRb0zKK/peX1ARzielN3sQ8Lgmfp8mj0B8xH8A.xO','GBH@sunrise-resorts.com',1,0,NULL,NULL,NULL,NULL,NULL,'41.65.31.110','2015-03-10 10:34:26','0000-00-00 00:00:00','2015-03-10 10:34:26',0,15);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_hotels`
--

DROP TABLE IF EXISTS `users_hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_hotels` (
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_hotels`
--

LOCK TABLES `users_hotels` WRITE;
/*!40000 ALTER TABLE `users_hotels` DISABLE KEYS */;
INSERT INTO `users_hotels` VALUES (3,7),(4,4),(5,2),(6,5),(7,9),(8,10),(9,6),(10,11),(11,1),(12,7),(13,8),(14,3),(15,12);
/*!40000 ALTER TABLE `users_hotels` ENABLE KEYS */;
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
INSERT INTO `users_restaurants` VALUES (2,1),(2,2),(1,3),(1,4),(1,2),(1,1),(1,5),(1,8),(1,12),(1,9),(1,11),(1,6),(1,13),(1,10),(1,7),(1,17),(1,14),(1,16),(1,15),(3,33),(3,32),(3,30),(3,31),(4,22),(4,25),(4,26),(4,18),(4,20),(4,21),(4,19),(4,24),(4,23),(5,8),(5,12),(5,9),(5,11),(5,6),(5,13),(5,10),(5,7),(6,27),(6,28),(7,38),(7,39),(8,41),(8,40),(9,29),(10,44),(10,43),(10,48),(10,42),(11,3),(11,4),(11,2),(11,1),(11,5),(12,33),(12,32),(12,30),(12,31),(13,37),(13,36),(13,35),(13,34),(14,17),(14,14),(14,16),(14,15),(15,46),(15,45),(15,47);
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

-- Dump completed on 2015-03-13 10:02:24
