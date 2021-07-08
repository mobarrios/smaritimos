--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `updated_at` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Provincia de Buenos Aires',6,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(2,'Capital Federal',6,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(3,'Catamarca',1,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(4,'Chaco',2,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(5,'Chubut',5,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(6,'Córdoba',4,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(7,'Corrientes',2,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(8,'Entre Ríos',2,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(9,'Formosa',2,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(10,'Jujuy',1,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(11,'La Pampa',4,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(12,'La Rioja',1,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(13,'Mendoza',3,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(14,'Misiones',2,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(15,'Neuquén',5,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(16,'Río Negro',5,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(17,'Salta',1,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(18,'San Juan',3,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(19,'San Luis',3,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(20,'Santa Cruz',5,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(21,'Santa Fe',4,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(22,'Santiago del Estero',4,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(23,'Tierra del Fuego',5,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL),(24,'Tucumán',1,'2014-12-14 22:26:42','2014-12-14 22:26:42',NULL);
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;