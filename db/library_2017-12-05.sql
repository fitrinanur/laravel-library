# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: library
# Generation Time: 2017-12-05 15:18:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `name`, `email`, `website`, `address`, `created_at`, `updated_at`)
VALUES
	(10,'Ardani Rohman','master.ardani@gmail.com','ardani.github.io','blotan Rt 7 Rw 2 Siwal Baki','2017-12-05 06:04:27','2017-12-05 06:51:05'),
	(16,'Ardani Rohman','ardani@mam.vom','ardani.com','blotan Rt 7 Rw 2 Siwal Baki','2017-12-05 06:55:59','2017-12-05 06:55:59'),
	(17,'Andi','dmad@gmail.xom','saljksal','salksa','2017-12-05 06:56:36','2017-12-05 07:08:32'),
	(18,'skalsak','akjsak@gmail.com','saksjak.com','jdakjsakjsna','2017-12-05 07:00:31','2017-12-05 07:00:31'),
	(19,'sakjskak','sjaksjak@gmail.com','kashakjsa.com','nsjhdsjdhbjkfidf','2017-12-05 07:01:56','2017-12-05 07:01:56'),
	(20,'sasa','sasa@gmail.com','sasa.com','sasasassa','2017-12-05 07:53:28','2017-12-05 07:53:28');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `publisher_id` int(10) unsigned NOT NULL,
  `publish_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmd_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `edition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_category_id_foreign` (`category_id`),
  KEY `books_author_id_foreign` (`author_id`),
  KEY `books_publisher_id_foreign` (`publisher_id`),
  KEY `books_gmd_id_foreign` (`gmd_id`),
  KEY `books_subject_id_foreign` (`subject_id`),
  KEY `books_location_id_foreign` (`location_id`),
  CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_gmd_id_foreign` FOREIGN KEY (`gmd_id`) REFERENCES `gmds` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `books_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `inventory_number`, `title`, `author_id`, `category_id`, `publisher_id`, `publish_place`, `location_id`, `year`, `gmd_id`, `subject_id`, `edition`, `class`, `language`, `isbn`, `synopsis`, `image`, `status`, `created_at`, `updated_at`)
VALUES
	(6,'12133','sds',10,1,9,'jakarta',1,'200',2,1,'1','434','indo','33333','33333dd','','0',NULL,NULL);

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Fiction',NULL,NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gmds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gmds`;

CREATE TABLE `gmds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gmd_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `gmds` WRITE;
/*!40000 ALTER TABLE `gmds` DISABLE KEYS */;

INSERT INTO `gmds` (`id`, `gmd_type`, `created_at`, `updated_at`)
VALUES
	(2,'Imagess','2017-11-19 02:25:35','2017-11-23 05:43:14'),
	(3,'File','2017-11-22 08:48:35','2017-11-22 08:48:35');

/*!40000 ALTER TABLE `gmds` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table loans
# ------------------------------------------------------------

DROP TABLE IF EXISTS `loans`;

CREATE TABLE `loans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `book_first_id` int(10) unsigned NOT NULL,
  `book_second_id` int(11) DEFAULT NULL,
  `borrow` date NOT NULL,
  `duedate` date NOT NULL,
  `return` date DEFAULT NULL,
  `fine` int(100) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;

INSERT INTO `loans` (`id`, `user_id`, `book_first_id`, `book_second_id`, `borrow`, `duedate`, `return`, `fine`, `created_at`, `updated_at`)
VALUES
	(1,3,7,7,'2017-11-29','2017-12-01','2017-12-07',3000,'2017-11-26 12:10:19','2017-12-01 07:27:10'),
	(2,2,6,7,'2017-11-30','2017-11-27','2017-11-30',0,'2017-11-26 13:45:49','2017-11-29 13:55:00'),
	(3,2,6,7,'2017-11-30','2017-11-27',NULL,0,'2017-11-26 13:45:58','2017-11-26 13:45:58'),
	(4,1,6,6,'2017-11-28','2017-11-30',NULL,0,'2017-11-26 13:48:06','2017-11-26 13:48:06'),
	(5,3,6,6,'2017-11-29','2017-12-01','2017-12-09',4000,'2017-11-29 09:28:13','2017-11-29 16:49:13'),
	(6,3,6,7,'2017-11-29','2017-12-01','2017-12-07',3000,'2017-11-29 09:28:16','2017-11-29 16:43:37'),
	(7,3,7,7,'2017-12-01','2017-12-04','2017-12-08',2000,'2017-12-01 07:26:02','2017-12-01 08:50:24'),
	(8,2,6,7,'2017-12-01','2017-12-09',NULL,0,'2017-12-01 07:26:47','2017-12-01 07:26:47');

/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `location`, `created_at`, `updated_at`)
VALUES
	(1,'Rak 1.1',NULL,NULL),
	(2,'Rak 1.2','2017-11-19 03:36:58','2017-11-19 03:36:58'),
	(3,'Rak 1.3','2017-11-23 05:23:49','2017-11-23 05:23:49');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_11_17_033457_create_categories_table',1),
	(4,'2017_11_17_033638_create_gmds_table',1),
	(5,'2017_11_17_033732_create_subjects_table',1),
	(6,'2017_11_17_033836_create_locations_table',1),
	(7,'2017_11_17_033938_create_authors_table',1),
	(8,'2017_11_17_034156_create_publishers_table',1),
	(9,'2017_11_17_034609_create_profiles_table',2),
	(10,'2017_11_17_040652_create_books_table',3),
	(11,'2017_11_17_042228_create_loans_table',4),
	(12,'2017_11_19_034051_entrust_setup_tables',5);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table publishers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `publishers`;

CREATE TABLE `publishers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;

INSERT INTO `publishers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`)
VALUES
	(3,'Gavamedias','087987987987','gava@gmail.com','jakartas','2017-11-20 06:20:50','2017-12-05 07:30:19'),
	(4,'publishator','082345678901','publishator@yahoo.com','publishatore.sa','2017-11-20 06:23:17','2017-12-05 07:45:30'),
	(5,'publishator','083678789678','blisk@gmail.coms','solo sukoharjo','2017-11-20 06:27:10','2017-12-05 07:28:36'),
	(6,'tri riandari','086789876789','echikawananahara@yahoo.coms','tamrin no.23','2017-11-21 04:24:12','2017-12-05 07:35:36'),
	(9,'gramedia','0856478987689','gramediaoffset@gmail.com','jakarta tengah','2017-11-21 06:44:12','2017-12-05 07:38:30'),
	(10,'Gmedia','085647898768','gmedia.nets','gmedia solo','2017-12-05 07:33:55','2017-12-05 07:36:04');

/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
	(2,1),
	(3,2);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administration','Only one and only admin','2017-11-19 03:47:17','2017-11-19 03:47:17'),
	(2,'user','Registed User','Access for registed user','2017-11-19 03:47:17','2017-11-19 03:47:17');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Programming',NULL,NULL),
	(2,'Design','2017-11-19 02:41:19','2017-11-19 02:41:19');

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Fitrina','missfitrina@gmail.com','$2y$10$evKrojqUnrC2kRK6Dccwd.Iuk8m6qWznifjaarM8/g1zJ1SmWMXtm','XvQ85qSegwQLQOJ3FsMDdiRqumJIImpcC56DbAMpYn2AvNDmtVV3oLWnZlhq','2017-11-17 05:02:18','2017-11-17 05:02:18'),
	(2,'admin1','admin1@local.local','$2y$10$mJHjcECrdAB1VjU725qz5.tkBuzf87Wtm8jkrzBKuCVUDTqBR2bmW','z2zgEGzlZjgyAo4tFjQPqph51HajtdaAjIdQK7jfDUzMS45RtMgcmHSvctqK','2017-11-19 03:47:17','2017-11-19 03:47:17'),
	(3,'user1','user1@local.local','$2y$10$E24HB.FsZkexf.8roKmYyOw.xDi1Ly9MbMf5ZV1fCU9NDoQa4XHD.',NULL,'2017-11-19 03:47:17','2017-11-19 03:47:17');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
