# ************************************************************
# Sequel Ace SQL dump
# Версия 20042
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Хост: 127.0.0.1 (MySQL 8.0.28)
# База данных: hility_loc
# Время формирования: 2022-12-13 09:03:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`, `email`, `logo`, `website`, `created_at`, `updated_at`)
VALUES
	(8,'Coca Cola','1@1.com','storage/53e652a8e0b0e47348974a3e652551ae.png','1.com','2022-12-12 15:10:48','2022-12-12 15:10:48'),
	(9,'Tesla','1@tesla.com','storage/66e77d5cb1fd307e72bbd97a26953960.png','tesla.com','2022-12-12 15:11:28','2022-12-12 15:11:28'),
	(10,'SpaceX','1@spacex.com','storage/9b9e3da2bde2db5d9d641258c4289467.png','spacex.com','2022-12-12 15:11:53','2022-12-12 15:11:53'),
	(11,'Google','1@google.com','storage/43d94ad610830a821c76d32d1da50261.png','google.com','2022-12-12 15:12:54','2022-12-12 15:12:54'),
	(12,'Yandex','1@yandex.ru','storage/5df4e1ddbe445206c4690b28528f6972.png','yandex.ru','2022-12-12 15:13:09','2022-12-12 15:13:09'),
	(13,'Bitcoin','1@bitcoin.com','storage/24269469e161077909084295392a19ee.png','bitcoin.com','2022-12-12 15:13:35','2022-12-12 15:13:35'),
	(14,'Sber','1@sber.ru','storage/2540810156ce4d38197a49d8b4242840.png','sber.ru','2022-12-12 15:14:02','2022-12-12 15:14:02'),
	(15,'Logo','1@logo.com','storage/e807525a1866fbb3ce01543d20065434.png','logo.com','2022-12-12 15:16:14','2022-12-12 15:16:14'),
	(16,'Jetbrains','1@jetbrains.com','storage/f0b5f39cbc2403074e38e8b9d7af7f34.png','jetbrains.com','2022-12-12 15:16:38','2022-12-12 15:16:38'),
	(17,'Apple','1@apple.com','storage/cb194ed4a679df9a143a43ae87253a20.png','apple.com','2022-12-12 15:17:04','2022-12-12 15:17:04'),
	(20,'Farrari','1@ferrari.com','storage/4be06a68570953226e502d5429be5ba5.png','ferrari.com','2022-12-12 15:50:07','2022-12-12 15:50:07'),
	(21,'Comodo','1@comodo.com',NULL,'comodo.com','2022-12-12 16:13:38','2022-12-12 16:13:38'),
	(25,'Emsisoft','1@emsisoft.com','storage/6a801791b5eeec460c7c3fddfbcf8d38.png','emsisoft.com','2022-12-12 16:30:05','2022-12-12 16:30:05'),
	(26,'Fox','1@fox.com','storage/4ec5937e921250759636c716bcbee660.png','fox.com','2022-12-12 16:39:33','2022-12-12 16:46:04');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_phone_unique` (`phone`),
  KEY `employees_company_id_foreign` (`company_id`),
  CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `company_id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`)
VALUES
	(1,20,'Андрей','Шаповалов','1@1.com','45546456','2022-12-13 08:34:57','2022-12-13 08:34:57'),
	(2,14,'Елена','Запашная','2@2.com','567867','2022-12-13 08:37:02','2022-12-13 08:37:02'),
	(3,11,'Анастасия','Ногаева','3@3.com','0239475847','2022-12-13 08:37:30','2022-12-13 08:37:30'),
	(4,26,'Артём','Лазарев','4@4.com','8345982347','2022-12-13 08:38:21','2022-12-13 08:38:21'),
	(5,14,'Андрей','Смирнов','5@5.com','845763894567','2022-12-13 08:38:40','2022-12-13 08:38:40'),
	(6,9,'Мирослава','Сорокина','6@6.com','345754673546','2022-12-13 08:39:28','2022-12-13 08:39:28'),
	(7,12,'Ариана','Зиновьева','7@7.com','2374658457','2022-12-13 08:39:47','2022-12-13 08:39:47'),
	(8,10,'Виктория','Кудрявцева','8@8.com','3487658745','2022-12-13 08:40:11','2022-12-13 08:40:11'),
	(9,17,'Милана','Кулешова','9@9.com','347652089345','2022-12-13 08:40:29','2022-12-13 08:40:29'),
	(11,13,'Алиса','Островская','11@11.com','346735643456','2022-12-13 08:41:08','2022-12-13 08:41:08'),
	(12,10,'Александр','Ефимов','10@10.com','67354645645','2022-12-13 08:46:54','2022-12-13 08:56:27');

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2022_12_12_104625_create_companies_table',1),
	(6,'2022_12_12_105208_create_employees_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@admin.com',NULL,'$2y$10$rQ5vjkUUceI9LRkHRrZJWe.uWXSI6Nef3z14FqjjTXIh2AsLQCgLq','5Oo2A9KquyMbFVqBNXb3T4q1yKn7kbKgfbSoo5u05lt7uvIZGj692t8HZwzG',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
