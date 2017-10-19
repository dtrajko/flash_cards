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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `terms` VALUES (3,'1507969128.png','ball','2017-10-14 12:18:48','2017-10-14 12:18:48'),(5,'1507970448.jpg','fork','2017-10-14 12:40:48','2017-10-14 12:40:48'),(6,'1507970534.jpg','window','2017-10-14 12:42:14','2017-10-14 12:42:14'),(7,'1507970632.jpg','door','2017-10-14 12:43:52','2017-10-14 12:43:52'),(8,'1507984947.jpg','shirt','2017-10-14 16:42:27','2017-10-14 16:42:27'),(9,'1508064301.jpg','chair','2017-10-15 14:45:01','2017-10-15 14:45:01'),(10,'1508121057.jpg','spoon','2017-10-16 06:30:57','2017-10-16 06:30:57'),(11,'1508122158.jpg','match','2017-10-16 06:49:18','2017-10-16 06:49:18'),(12,'1508370122.jpg','spider','2017-10-19 03:42:02','2017-10-19 03:42:02'),(13,'1508370427.png','tree','2017-10-19 03:47:07','2017-10-19 03:47:07'),(14,'1508374953.jpg','rainbow','2017-10-19 03:50:54','2017-10-19 03:50:54'),(15,'1508371201.jpg','plane','2017-10-19 04:00:01','2017-10-19 04:00:01'),(16,'1508372590.jpg','whale','2017-10-19 04:23:10','2017-10-19 04:23:10'),(17,'1508373515.jpg','building','2017-10-19 04:38:35','2017-10-19 04:38:35'),(18,'1508373900.jpg','wheat','2017-10-19 04:45:00','2017-10-19 04:45:00'),(19,'1508374420.jpg','box','2017-10-19 04:53:40','2017-10-19 04:53:40');
