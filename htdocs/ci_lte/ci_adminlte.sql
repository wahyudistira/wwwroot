-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: ci_adminlte
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `admin_preferences`
--

DROP TABLE IF EXISTS `admin_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `user_panel` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_form` tinyint(1) NOT NULL DEFAULT '0',
  `messages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `notifications_menu` tinyint(1) NOT NULL DEFAULT '0',
  `tasks_menu` tinyint(1) NOT NULL DEFAULT '0',
  `user_menu` tinyint(1) NOT NULL DEFAULT '1',
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_preferences`
--

LOCK TABLES `admin_preferences` WRITE;
/*!40000 ALTER TABLE `admin_preferences` DISABLE KEYS */;
INSERT INTO `admin_preferences` VALUES (1,0,0,0,0,0,1,0,0);
/*!40000 ALTER TABLE `admin_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` char(7) NOT NULL DEFAULT '#607D8B',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator','#3f51b5'),(2,'members','General User','#000000');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_preferences`
--

DROP TABLE IF EXISTS `public_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_preferences` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `transition_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_preferences`
--

LOCK TABLES `public_preferences` WRITE;
/*!40000 ALTER TABLE `public_preferences` DISABLE KEYS */;
INSERT INTO `public_preferences` VALUES (1,0);
/*!40000 ALTER TABLE `public_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_menu`
--

DROP TABLE IF EXISTS `sys_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `menu_name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `menu_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `level` tinyint(1) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `lang` varchar(124) DEFAULT NULL,
  `activelink` varchar(124) DEFAULT NULL,
  `is_treeview` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_menu`
--

LOCK TABLES `sys_menu` WRITE;
/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;
INSERT INTO `sys_menu` VALUES (1,0,'Dashboard','admin/dashboard',2,1,0,'fa fa-shield','untuk menyimpan menu dashboard','menu_dashboard','Dashboard',0),(2,0,'Administrator','#',3,1,0,'fa fa-cogs',NULL,'menu_administration','menu_administration',1),(3,2,'users','admin/users',4,1,1,'fa fa-user',NULL,'menu_users','users',0),(4,2,'Security groups','admin/groups',5,1,1,'fa fa-shield',NULL,'menu_security_groups','groups',0),(5,0,'Preferences','#',6,1,0,'fa fa-cogs',NULL,'menu_preferences','prefs',1),(6,5,'Interfaces','admin/prefs/interfaces/admin',7,1,1,'fa fa-user',NULL,'menu_interfaces','interfaces',0),(7,11,'Files','admin/files',8,1,1,'fa fa-file',NULL,'menu_files','files',0),(8,11,'database','admin/database',9,1,1,'fa fa-database',NULL,'menu_database_utility','database',0),(9,11,'license','admin/license',10,1,1,'fa fa-legal',NULL,'menu_license','license',0),(10,11,'resources','admin/resources',11,1,1,'fa fa-cubes',NULL,'menu_resources','resources',0),(11,0,'maintenance','#',6,1,0,'fa fa-shield',NULL,'menu_maintenance','maintenance',1),(12,0,'Dashboard','admin/dashboard',12,0,0,'fa fa-dashborad',NULL,'menu_dashboard','Dashboard',0),(13,3,'Profile','admin/users',14,1,2,'fa fa-user',NULL,'menu_users_profile','profile',0),(14,0,'Setting','#',15,1,0,'fa fa-user',NULL,'menu_setting','setting',1),(15,14,'Global Setting','#',16,1,1,'fa fa-user',NULL,'menu_global_setting','Global',0),(16,15,'Spesial Settting','admin/dashboard',17,1,2,'fa fa-user',NULL,'menu_spesial_setting','spesial',0),(17,14,'resources','admin/resources',18,1,1,'fa fa-user',NULL,'menu_resources','resources',0);
/*!40000 ALTER TABLE `sys_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'localhost:8080','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com',NULL,NULL,NULL,'hUXYrhIJUkCtaOyiKIiClO',1268889823,1507109206,1,'Admin','istrator','ADMIN','0'),(2,'::1','','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',NULL,'s@s.com',NULL,NULL,NULL,'i/iX/MbglXWE22E1zVAfa.',1506657710,1507103789,1,'s','s','s','08199999999');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_menulvl0`
--

DROP TABLE IF EXISTS `vw_menulvl0`;
/*!50001 DROP VIEW IF EXISTS `vw_menulvl0`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_menulvl0` AS SELECT 
 1 AS `id`,
 1 AS `parent_id`,
 1 AS `menu_name`,
 1 AS `url`,
 1 AS `menu_order`,
 1 AS `status`,
 1 AS `level`,
 1 AS `icon`,
 1 AS `description`,
 1 AS `lang`,
 1 AS `activelink`,
 1 AS `is_treeview`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_menulvl1`
--

DROP TABLE IF EXISTS `vw_menulvl1`;
/*!50001 DROP VIEW IF EXISTS `vw_menulvl1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_menulvl1` AS SELECT 
 1 AS `id`,
 1 AS `parent_id`,
 1 AS `menu_name`,
 1 AS `url`,
 1 AS `menu_order`,
 1 AS `status`,
 1 AS `level`,
 1 AS `icon`,
 1 AS `description`,
 1 AS `lang`,
 1 AS `activelink`,
 1 AS `is_treeview`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_menulvl2`
--

DROP TABLE IF EXISTS `vw_menulvl2`;
/*!50001 DROP VIEW IF EXISTS `vw_menulvl2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_menulvl2` AS SELECT 
 1 AS `id`,
 1 AS `parent_id`,
 1 AS `menu_name`,
 1 AS `url`,
 1 AS `menu_order`,
 1 AS `status`,
 1 AS `level`,
 1 AS `icon`,
 1 AS `description`,
 1 AS `lang`,
 1 AS `activelink`,
 1 AS `is_treeview`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_menulvl0`
--

/*!50001 DROP VIEW IF EXISTS `vw_menulvl0`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_menulvl0` AS select `sys_menu`.`id` AS `id`,`sys_menu`.`parent_id` AS `parent_id`,`sys_menu`.`menu_name` AS `menu_name`,`sys_menu`.`url` AS `url`,`sys_menu`.`menu_order` AS `menu_order`,`sys_menu`.`status` AS `status`,`sys_menu`.`level` AS `level`,`sys_menu`.`icon` AS `icon`,`sys_menu`.`description` AS `description`,`sys_menu`.`lang` AS `lang`,`sys_menu`.`activelink` AS `activelink`,`sys_menu`.`is_treeview` AS `is_treeview` from `sys_menu` where ((`sys_menu`.`status` = 1) and (`sys_menu`.`level` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_menulvl1`
--

/*!50001 DROP VIEW IF EXISTS `vw_menulvl1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_menulvl1` AS select `sys_menu`.`id` AS `id`,`sys_menu`.`parent_id` AS `parent_id`,`sys_menu`.`menu_name` AS `menu_name`,`sys_menu`.`url` AS `url`,`sys_menu`.`menu_order` AS `menu_order`,`sys_menu`.`status` AS `status`,`sys_menu`.`level` AS `level`,`sys_menu`.`icon` AS `icon`,`sys_menu`.`description` AS `description`,`sys_menu`.`lang` AS `lang`,`sys_menu`.`activelink` AS `activelink`,`sys_menu`.`is_treeview` AS `is_treeview` from `sys_menu` where ((`sys_menu`.`status` = 1) and (`sys_menu`.`level` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_menulvl2`
--

/*!50001 DROP VIEW IF EXISTS `vw_menulvl2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_menulvl2` AS select `sys_menu`.`id` AS `id`,`sys_menu`.`parent_id` AS `parent_id`,`sys_menu`.`menu_name` AS `menu_name`,`sys_menu`.`url` AS `url`,`sys_menu`.`menu_order` AS `menu_order`,`sys_menu`.`status` AS `status`,`sys_menu`.`level` AS `level`,`sys_menu`.`icon` AS `icon`,`sys_menu`.`description` AS `description`,`sys_menu`.`lang` AS `lang`,`sys_menu`.`activelink` AS `activelink`,`sys_menu`.`is_treeview` AS `is_treeview` from `sys_menu` where ((`sys_menu`.`status` = 1) and (`sys_menu`.`level` = 2)) */;
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

-- Dump completed on 2017-10-04 17:01:15
