DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `languages` VALUES (1,'English','1507986818.jpg',0,'2017-10-14 17:13:38','2017-10-25 20:58:24'),(2,'Deutsch','1507986518.jpg',1,'2017-10-14 17:08:38','2017-12-02 11:08:22'),(3,'Français','1507986530.jpg',1,'2017-10-14 17:08:50','2017-12-02 11:08:23'),(9,'Српски','1507989268.jpg',0,'2017-10-14 17:54:28','2017-10-21 13:00:22');
