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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `terms` VALUES (3,'1508618234.jpg','ball','2017-10-14 12:18:48','2017-10-22 00:37:14'),(5,'1507970448.jpg','fork','2017-10-14 12:40:48','2017-10-14 12:40:48'),(6,'1508564327.jpg','window','2017-10-14 12:42:14','2017-10-21 09:38:47'),(7,'1507970632.jpg','door','2017-10-14 12:43:52','2017-10-14 12:43:52'),(8,'1507984947.jpg','shirt','2017-10-14 16:42:27','2017-10-14 16:42:27'),(9,'1508064301.jpg','chair','2017-10-15 14:45:01','2017-10-15 14:45:01'),(10,'1508121057.jpg','spoon','2017-10-16 06:30:57','2017-10-16 06:30:57'),(11,'1508122158.jpg','match','2017-10-16 06:49:18','2017-10-16 06:49:18'),(12,'1508370122.jpg','spider','2017-10-19 03:42:02','2017-10-19 03:42:02'),(13,'1508370427.png','tree','2017-10-19 03:47:07','2017-10-19 03:47:07'),(14,'1508617927.jpg','rainbow','2017-10-19 03:50:54','2017-10-22 00:32:07'),(15,'1508615976.jpg','plane','2017-10-19 04:00:01','2017-10-21 23:59:36'),(16,'1508372590.jpg','whale','2017-10-19 04:23:10','2017-10-19 04:23:10'),(17,'1508373515.jpg','building','2017-10-19 04:38:35','2017-10-19 04:38:35'),(18,'1508373900.jpg','wheat','2017-10-19 04:45:00','2017-10-19 04:45:00'),(19,'1508374420.jpg','box','2017-10-19 04:53:40','2017-10-19 04:53:40'),(22,'1508455426.jpg','eye','2017-10-20 03:23:46','2017-10-20 03:23:46'),(23,'1508458702.jpg','ear','2017-10-20 04:18:22','2017-10-20 04:18:22'),(25,'1508560266.jpg','hand','2017-10-20 04:32:16','2017-10-21 08:31:22'),(28,'1508515424.jpg','mouth','2017-10-20 20:03:44','2017-10-20 20:03:44'),(29,'1508551026.jpg','brain','2017-10-21 05:57:07','2017-10-21 05:57:07'),(30,'1508551722.png','nose','2017-10-21 06:08:42','2017-10-21 06:08:42'),(31,'1508561414.jpg','skin','2017-10-21 08:50:14','2017-10-21 08:50:14'),(32,'1508563762.jpg','tooth','2017-10-21 09:29:22','2017-10-21 09:29:22'),(33,'1508563928.jpg','plate','2017-10-21 09:32:08','2017-10-21 09:32:08'),(34,'1508564150.jpg','wood','2017-10-21 09:35:51','2017-10-21 09:35:51'),(35,'1508564554.jpg','shoe','2017-10-21 09:42:34','2017-10-21 09:42:34'),(36,'1508564946.jpg','sock','2017-10-21 09:49:06','2017-10-21 09:49:06'),(37,'1508616247.jpg','knife','2017-10-22 00:04:07','2017-10-22 00:04:07'),(38,'1508617184.jpg','cat','2017-10-22 00:19:44','2017-10-22 00:19:44'),(39,'1508617752.jpg','dog','2017-10-22 00:29:12','2017-10-22 00:29:12');
