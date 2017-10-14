DROP TABLE IF EXISTS `terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `terms` VALUES
(3,'1507969128.png','ball','2017-10-14 12:18:48','2017-10-14 12:18:48'),
(5,'1507970448.jpg','fork','2017-10-14 12:40:48','2017-10-14 12:40:48'),
(6,'1507970534.jpg','window','2017-10-14 12:42:14','2017-10-14 12:42:14'),
(7,'1507970632.jpg','door','2017-10-14 12:43:52','2017-10-14 12:43:52'),
(8,'1507984947.jpg','shirt','2017-10-14 16:42:27','2017-10-14 16:42:27');
