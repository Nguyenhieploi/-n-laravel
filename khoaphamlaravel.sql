-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2024 at 03:05 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoaphamlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`, `created_at`, `updated_at`, `deleted_at`, `thumb`) VALUES
(31, 'Hành', 0, 'Hành', '<p>Hành</p>', 'hanh', 1, '2024-01-31 02:16:19', '2024-02-05 00:44:30', '2024-02-05 00:44:30', NULL),
(35, 'dsadsadasdas', 0, 'das', '<p>das</p>', 'dsadsadasdas', 1, '2024-02-05 01:52:23', '2024-02-05 02:04:34', '2024-02-05 02:04:34', NULL),
(29, 'Cải', 27, 'Cải', '<p>Cải</p>', 'cai', 1, '2024-01-30 00:56:07', '2024-01-30 00:56:07', NULL, NULL),
(27, 'Rau củ quả sạch', 0, 'Rau', '<p>Rau&nbsp;</p>', 'rau', 1, '2024-01-30 00:55:41', '2024-02-05 02:05:51', NULL, '/storage/uploads/2024/02/05/test.jpg'),
(28, 'Diếp cá', 27, 'Diếp cá', '<p>Diếp cá</p>', 'diep-ca', 1, '2024-01-30 00:55:51', '2024-01-30 00:55:51', NULL, NULL),
(26, 'Mận', 24, 'Mận', '<p>Mận</p>', 'man', 1, '2024-01-30 00:55:12', '2024-01-30 00:55:12', NULL, NULL),
(24, 'Trái cây', 0, 'Trái cây', '<p>Trái cây</p>', 'trai-cay', 1, '2024-01-30 00:54:53', '2024-02-05 03:42:46', NULL, '/storage/uploads/2024/02/05/Xoài.jpg'),
(25, 'Xoài', 24, 'Xoài', '<p>Xoài</p>', 'xoai', 1, '2024-01-30 00:55:04', '2024-01-30 00:55:04', NULL, NULL),
(32, 'Nhãn', 0, 'Nhãn', '<p>Nhãn</p>', 'nhan', 1, '2024-01-31 20:28:42', '2024-02-05 00:44:27', '2024-02-05 00:44:27', NULL),
(33, 'Thịt phẩm sống', 0, 'Thịt phẩm sống', '<p>Thịt phẩm sống</p>', 'thit-pham-song', 1, '2024-02-05 00:44:51', '2024-02-05 02:04:47', NULL, '/storage/uploads/2024/02/05/thit.jpg'),
(37, 'dsa', 0, 'dasdas', '<p>dasa</p>', 'dsa', 1, '2024-02-05 01:54:47', '2024-02-05 02:04:31', '2024-02-05 02:04:31', '/storage/uploads/2024/02/05/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_24_064344_create_menus_table', 1),
(6, '2024_01_24_071204_drop_users_table', 1),
(7, '2024_01_26_074009_add_deleted_at_to_menu_table', 2),
(8, '2024_01_29_072625_create_products_table', 3),
(9, '2024_01_29_074105_update_table_product', 4),
(10, '2024_01_31_085743_add_delete_at_to_product_table', 5),
(11, '2024_01_31_092201_update_price_column_type_product_table', 6),
(12, '2024_01_31_092616_update_price_sale_column_type_product_table', 7),
(13, '2024_01_31_095331_create_sliders_table', 8),
(14, '2024_02_05_084753_add_thumb_table_menus', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `price` bigint NOT NULL,
  `price_sale` bigint DEFAULT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`, `deleted_at`) VALUES
(2, 'Cải thìa', 'Cải thìa', '<p>Cải thìa</p>', 29, 12000, 11000, 1, '2024-01-30 01:00:43', '2024-02-05 03:31:01', '/storage/uploads/2024/02/05/1.jpg', NULL),
(3, 'Xoài cát Hòa Lộc', 'Xoài cát Hòa Lộc', '<p>Xoài cát Hòa Lộc</p>', 25, 35000, 30000, 1, '2024-01-30 01:01:43', '2024-02-05 03:40:16', '/storage/uploads/2024/02/05/xoai.jpg', NULL),
(4, 'Mận An Phước', 'Mận An Phước', '<p>Mận An Phước</p>', 24, 25000, 10000, 1, '2024-01-30 01:02:29', '2024-02-05 03:36:18', '/storage/uploads/2024/02/05/2.jpg', '2024-01-31 02:10:14'),
(11, 'Hành lá', 'Hành lá', '<p>Hành lá</p>', 27, 5000, 2000, 1, '2024-01-31 02:24:27', '2024-02-05 03:38:29', '/storage/uploads/2024/02/05/4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(12, 'Trái cây tươi ngọt', '#', '/storage/uploads/2024/02/05/Xoài.jpg', 1, 1, '2024-02-05 00:25:53', '2024-02-05 03:42:17'),
(13, 'Rau củ quả sạch', '#', '/storage/uploads/2024/02/05/test.jpg', 1, 1, '2024-02-05 00:32:59', '2024-02-05 00:32:59'),
(10, 'Thịt nhập khẩu từ Úc', '#', '/storage/uploads/2024/02/05/thit.jpg', 1, 1, '2024-02-05 00:20:36', '2024-02-05 00:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hiệp Lợi', 'loi.nguyen@hbc.com.vn', NULL, '$2y$10$CCd4otZlp1QMWNQWSlkTEOiowOPbKwJbx0Eh4Zr57PNXaZiy3SPXm', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
