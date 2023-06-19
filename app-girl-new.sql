-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for app-girl
CREATE DATABASE IF NOT EXISTS `app-girl` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `app-girl`;

-- Dumping structure for table app-girl.anonymous
CREATE TABLE IF NOT EXISTS `anonymous` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `device_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.anonymous: ~0 rows (approximately)

-- Dumping structure for table app-girl.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.category: ~1 rows (approximately)
REPLACE INTO `category` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Test', '1', '2023-06-18 08:56:36', '2023-06-18 08:56:36');

-- Dumping structure for table app-girl.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.contacts: ~0 rows (approximately)

-- Dumping structure for table app-girl.devices
CREATE TABLE IF NOT EXISTS `devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.devices: ~0 rows (approximately)

-- Dumping structure for table app-girl.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table app-girl.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table app-girl.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_product_id_foreign` (`product_id`),
  CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.images: ~2 rows (approximately)
REPLACE INTO `images` (`id`, `src`, `product_id`, `created_at`, `updated_at`) VALUES
	(2, 'products_image/gS1iyNRahlIPmgpOpQGvCWU65Y00Onhjx5X2Jrj3.jpg', 10, '2023-06-18 06:05:24', '2023-06-18 06:05:24'),
	(3, 'products_image/CwzmKZt9VaHY6Sj8op6LoV9kUzJB60Is5v0snstM.jpg', 11, '2023-06-18 08:27:43', '2023-06-18 08:27:43');

-- Dumping structure for table app-girl.member
CREATE TABLE IF NOT EXISTS `member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.member: ~0 rows (approximately)

-- Dumping structure for table app-girl.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.migrations: ~15 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2014_10_12_000000_create_users_table', 1),
	(17, '2014_10_12_100000_create_password_resets_table', 1),
	(18, '2019_08_19_000000_create_failed_jobs_table', 1),
	(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(20, '2023_02_06_070219_create_devices_table', 1),
	(21, '2023_02_07_143922_create_member_table', 1),
	(22, '2023_06_09_044551_create_anonymous_table', 1),
	(23, '2023_06_09_050039_create_policy_table', 1),
	(24, '2023_06_09_054325_create_post_table', 1),
	(25, '2023_06_09_081545_create_category_table', 1),
	(26, '2023_06_09_081549_create_products_table', 1),
	(27, '2023_06_09_081648_create_images_table', 1),
	(28, '2023_06_12_031527_create_wallpapers_table', 1),
	(29, '2023_06_12_045720_create_contacts_table', 1),
	(30, '2023_06_14_023323_create_user_like_wallpaper_table', 1);

-- Dumping structure for table app-girl.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.password_resets: ~0 rows (approximately)

-- Dumping structure for table app-girl.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
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

-- Dumping data for table app-girl.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table app-girl.policy
CREATE TABLE IF NOT EXISTS `policy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.policy: ~0 rows (approximately)

-- Dumping structure for table app-girl.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user_id_foreign` (`user_id`),
  CONSTRAINT `post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.post: ~0 rows (approximately)

-- Dumping structure for table app-girl.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.products: ~2 rows (approximately)
REPLACE INTO `products` (`id`, `name`, `age`, `country`, `video_src`, `category_id`, `description`, `view_count`, `created_at`, `updated_at`) VALUES
	(10, 'dgsdafsfwq', '23', 'ưeq2', 'video/xGNrXy63eHkMd5KfbeLxqtRGt3vrviWUMXCzbHka.mp4', 1, '<figure class="image"><img src="http://localhost/app-girl-new/public/media/z4433975604057_4781eb353264b3a1b02d9b32f071546a_1687105022.jpg"></figure><p>ahihihi</p>', NULL, '2023-06-18 06:05:24', '2023-06-18 09:17:08'),
	(11, 'TRAN VI VAN', '23', 'HN', 'video/bBOPbyjH6QN9bQuXWFbHGvovqdoIy2ic5lGCBJL9.mp4', 1, '<h2>Test</h2>', NULL, '2023-06-18 08:27:43', '2023-06-18 08:27:43');

-- Dumping structure for table app-girl.users
CREATE TABLE IF NOT EXISTS `users` (
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

-- Dumping data for table app-girl.users: ~0 rows (approximately)

-- Dumping structure for table app-girl.user_like_wallpaper
CREATE TABLE IF NOT EXISTS `user_like_wallpaper` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anonymous_id` bigint unsigned DEFAULT NULL,
  `wallpaper_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_like_wallpaper_anonymous_id_foreign` (`anonymous_id`),
  KEY `user_like_wallpaper_wallpaper_id_foreign` (`wallpaper_id`),
  CONSTRAINT `user_like_wallpaper_anonymous_id_foreign` FOREIGN KEY (`anonymous_id`) REFERENCES `anonymous` (`id`),
  CONSTRAINT `user_like_wallpaper_wallpaper_id_foreign` FOREIGN KEY (`wallpaper_id`) REFERENCES `wallpapers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.user_like_wallpaper: ~0 rows (approximately)

-- Dumping structure for table app-girl.wallpapers
CREATE TABLE IF NOT EXISTS `wallpapers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `anonymous_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallpapers_category_id_foreign` (`category_id`),
  KEY `wallpapers_anonymous_id_foreign` (`anonymous_id`),
  CONSTRAINT `wallpapers_anonymous_id_foreign` FOREIGN KEY (`anonymous_id`) REFERENCES `anonymous` (`id`),
  CONSTRAINT `wallpapers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table app-girl.wallpapers: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
