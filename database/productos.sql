-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prueba_gestion_productos
CREATE DATABASE IF NOT EXISTS `prueba_gestion_productos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prueba_gestion_productos`;

-- Volcando estructura para tabla prueba_gestion_productos.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.cache: ~0 rows (aproximadamente)
DELETE FROM `cache`;

-- Volcando estructura para tabla prueba_gestion_productos.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.cache_locks: ~0 rows (aproximadamente)
DELETE FROM `cache_locks`;

-- Volcando estructura para tabla prueba_gestion_productos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando estructura para tabla prueba_gestion_productos.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.jobs: ~0 rows (aproximadamente)
DELETE FROM `jobs`;

-- Volcando estructura para tabla prueba_gestion_productos.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.job_batches: ~0 rows (aproximadamente)
DELETE FROM `job_batches`;

-- Volcando estructura para tabla prueba_gestion_productos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.migrations: ~4 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_06_10_060004_create_productos_table', 1);

-- Volcando estructura para tabla prueba_gestion_productos.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando estructura para tabla prueba_gestion_productos.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `total` double NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_sku_unique` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.productos: ~30 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`id`, `sku`, `nombre`, `descripcion`, `cantidad`, `precio`, `total`, `fecha_creacion`) VALUES
	(1, 604054, 'architecto temporibus vitae', 'Repudiandae repellat qui quis eius quam.', 37, 81516, 3016092, '2025-06-13 03:24:42'),
	(2, 700284, 'dolorum dolore dignissimos', 'Voluptate dolore pariatur hic possimus aut repellat praesentium.', 12, 54922, 659064, '2025-06-13 03:24:42'),
	(3, 780032, 'molestiae rerum adipisci', 'Iste saepe vitae aspernatur dolores ad.', 3, 46781, 140343, '2025-06-13 03:24:42'),
	(4, 526351, 'aut adipisci mollitia', 'Ullam iure vero quaerat dignissimos corrupti est.', 56, 86362, 4836272, '2025-06-13 03:24:42'),
	(5, 673310, 'omnis aut sunt', 'Repudiandae aut harum mollitia facere fuga qui.', 55, 25141, 1382755, '2025-06-13 03:24:42'),
	(6, 314183, 'quam sunt sed', 'Molestias minus nam eius nemo.', 63, 7846, 494298, '2025-06-13 03:24:42'),
	(7, 597154, 'ut est recusandae', 'Est necessitatibus aut facilis cupiditate.', 90, 63642, 5727780, '2025-06-13 03:24:42'),
	(8, 764394, 'qui voluptas in', 'Enim magnam libero et.', 80, 46235, 3698800, '2025-06-13 03:24:42'),
	(9, 551549, 'et eaque ut', 'Magni veritatis sunt et soluta beatae sint.', 82, 3246, 266172, '2025-06-13 03:24:42'),
	(10, 347250, 'blanditiis officia fuga', 'Quia non natus cupiditate magni debitis voluptatem.', 26, 54370, 1413620, '2025-06-13 03:24:42'),
	(11, 446932, 'eligendi voluptatem dolor', 'Eos porro pariatur natus sed consequatur quo vel.', 7, 78252, 547764, '2025-06-13 03:24:42'),
	(12, 249360, 'at perferendis nostrum', 'Quod non voluptatem illo rerum repudiandae veritatis.', 36, 42032, 1513152, '2025-06-13 03:24:42'),
	(13, 952183, 'eos necessitatibus animi', 'Officiis eius voluptatum voluptas officia.', 79, 82606, 6525874, '2025-06-13 03:24:42'),
	(14, 347269, 'distinctio veritatis quasi', 'Natus consequatur dolorum qui accusamus.', 27, 19977, 539379, '2025-06-13 03:24:42'),
	(15, 160856, 'qui quis sint', 'Consequuntur earum tempore blanditiis amet numquam sit culpa.', 1, 8731, 8731, '2025-06-13 03:24:42'),
	(16, 726149, 'rerum occaecati saepe', 'Molestiae eum tenetur itaque voluptas.', 33, 7134, 235422, '2025-06-13 03:24:42'),
	(17, 823989, 'est voluptatibus facere', 'Ducimus voluptatem rem vero neque voluptatibus ut eligendi.', 9, 72743, 654687, '2025-06-13 03:24:42'),
	(18, 513047, 'distinctio placeat eius', 'Quia fugiat assumenda dolor non aliquid.', 14, 92767, 1298738, '2025-06-13 03:24:42'),
	(19, 569184, 'recusandae ex impedit', 'Et animi eos sapiente mollitia neque inventore.', 10, 14743, 147430, '2025-06-13 03:24:42'),
	(20, 183745, 'voluptatem consequatur sit', 'Non accusantium non possimus quis omnis nesciunt rerum iste.', 70, 60678, 4247460, '2025-06-13 03:24:42'),
	(21, 155053, 'a nobis ad', 'Perspiciatis est et nobis tempora suscipit est dolor.', 57, 53697, 3060729, '2025-06-13 03:24:42'),
	(22, 522018, 'quae ipsum aperiam', 'Ipsam esse provident qui soluta voluptatum.', 70, 32277, 2259390, '2025-06-13 03:24:42'),
	(23, 245345, 'omnis aliquam voluptatem', 'Totam eum earum officiis et suscipit earum dolore.', 55, 55237, 3038035, '2025-06-13 03:24:42'),
	(24, 257140, 'architecto et consequatur', 'Maxime commodi odio incidunt rerum blanditiis.', 42, 76587, 3216654, '2025-06-13 03:24:42'),
	(25, 152611, 'labore quisquam nulla', 'Numquam modi repellat excepturi mollitia ut.', 92, 40435, 3720020, '2025-06-13 03:24:42'),
	(26, 794247, 'eos quod sit', 'Nemo facere quia quis est rem quia numquam omnis.', 48, 15875, 762000, '2025-06-13 03:24:42'),
	(27, 971133, 'voluptatem alias ut', 'Excepturi tempora quibusdam officiis neque molestiae.', 90, 12093, 1088370, '2025-06-13 03:24:42'),
	(28, 226459, 'atque eaque molestiae', 'Numquam voluptate assumenda doloribus odio voluptatibus rem quibusdam.', 59, 24817, 1464203, '2025-06-13 03:24:42'),
	(29, 532260, 'corporis tempora rerum', 'Id dolores sed est porro incidunt sed.', 7, 15046, 105322, '2025-06-13 03:24:42'),
	(30, 832385, 'quia quo facilis', 'Iste occaecati id maiores quam impedit aspernatur.', 97, 52967, 5137799, '2025-06-13 03:24:42');

-- Volcando estructura para tabla prueba_gestion_productos.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.sessions: ~1 rows (aproximadamente)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('mVakkWEUe8o6xfHj6AHg1rMiL1fqDVJhyJuiiDjy', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicXh4VE1iUm9kN3JwSVNwMFBNMXJGN1Bqdk8xT29hZFVuQThNUjE0ayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749785178);

-- Volcando estructura para tabla prueba_gestion_productos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla prueba_gestion_productos.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Test User', 'test@example.com', NULL, '$2y$12$lJzLazvuFvMHTN5uhIigzOAvQUCXZGrX7JJaegSzKbZsZSLMebI6q', 'ekuQ2zhK0TrJnBmE5sfWIXuBZsZ3RjucVuSKQofQRdd8AXmeUV4auRbu9N5K', '2025-06-13 08:24:41', '2025-06-13 08:24:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
