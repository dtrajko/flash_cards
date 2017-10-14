DROP TABLE IF EXISTS `vocabulary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vocabulary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` tinyint(3) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vocabulary_language_id_index` (`language_id`),
  KEY `vocabulary_term_id_index` (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `vocabulary` VALUES
(3,'la balle',3,3,'2017-10-14 12:26:59','2017-10-14 12:26:59'),
(4,'der Ball',2,3,'2017-10-14 12:27:34','2017-10-14 12:27:34'),
(5,'die Tür',2,7,'2017-10-14 12:45:08','2017-10-14 12:45:08'),
(6,'la porte',2,7,'2017-10-14 12:45:31','2017-10-14 12:45:31'),
(7,'la cuillère',2,5,'2017-10-14 12:46:16','2017-10-14 12:46:16'),
(8,'der Löffel',2,5,'2017-10-14 12:46:37','2017-10-14 12:46:37'),
(9,'la fenêtre',3,6,'2017-10-14 15:53:08','2017-10-14 15:53:08'),
(10,'das Fenster',2,6,'2017-10-14 15:53:20','2017-10-14 15:53:20'),
(11,'das Hemd',2,8,'2017-10-14 16:43:12','2017-10-14 16:43:12');
