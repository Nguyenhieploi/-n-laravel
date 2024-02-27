-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th2 27, 2024 lúc 04:51 PM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `n_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `menus`
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`, `created_at`, `updated_at`, `deleted_at`, `thumb`) VALUES
(1, 'Rau củ quả', 0, 'Rau củ quả', '<p>Rau củ quả</p>', 'rau-cu-qua', 1, '2024-02-19 21:56:02', '2024-02-19 21:56:02', NULL, '/storage/uploads/2024/02/20/491ff017-0c19-42eb-89cd-6fb6f8079a37.jpg'),
(2, 'Thịt Hải Sản Tươi Sống', 0, 'Thịt Hải Sản Tươi Sống', '<p>Thịt Hải Sản Tươi Sống</p>', 'thit-hai-san-tuoi-song', 1, '2024-02-19 23:17:13', '2024-02-19 23:17:13', NULL, '/storage/uploads/2024/02/20/thit.jpg'),
(3, 'Trái cây nhập khẩu', 0, 'Trái cây nhập khẩu', '<p>Trái cây nhập khẩu</p>', 'trai-cay-nhap-khau', 1, '2024-02-19 23:17:42', '2024-02-19 23:17:42', NULL, '/storage/uploads/2024/02/20/e90a3e03-f78c-4255-80a5-4f9ec80b0183.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_24_064344_create_menus_table', 1),
(6, '2024_01_24_071204_drop_users_table', 1),
(7, '2024_01_26_074009_add_deleted_at_to_menu_table', 1),
(8, '2024_01_29_072625_create_products_table', 1),
(9, '2024_01_29_074105_update_table_product', 1),
(10, '2024_01_31_085743_add_delete_at_to_product_table', 1),
(11, '2024_01_31_092201_update_price_column_type_product_table', 1),
(12, '2024_01_31_092616_update_price_sale_column_type_product_table', 1),
(13, '2024_01_31_095331_create_sliders_table', 1),
(14, '2024_02_05_084753_add_thumb_table_menus', 1),
(15, '2024_02_20_045021_rename_perent_id_to_parent_id_in_menus_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
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
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `price` bigint NOT NULL,
  `price_sale` decimal(8,2) DEFAULT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`, `deleted_at`) VALUES
(1, 'Cải thìa', 'Cải thìa', '<p>Cải thìa</p>', 1, 20000, NULL, 1, '2024-02-19 23:29:18', '2024-02-19 23:29:18', '/storage/uploads/2024/02/20/cai.jpg', NULL),
(2, 'Hành lá', 'Hành lá', '<p>Hành lá</p>', 1, 2000, NULL, 1, '2024-02-20 02:08:12', '2024-02-20 02:10:00', '/storage/uploads/2024/02/20/hanh.jpg', NULL),
(3, 'Nhãn da bò', 'Nhãn da bò', '<p>Nhãn da bò</p>', 3, 35000, NULL, 1, '2024-02-20 02:08:29', '2024-02-20 02:10:27', '/storage/uploads/2024/02/20/nhan-da-bo-kg.jpg', NULL),
(4, 'Mận', 'Mận', '<p>Mận</p>', 3, 25000, NULL, 1, '2024-02-20 02:09:02', '2024-02-20 02:09:02', '/storage/uploads/2024/02/20/man.jpg', NULL),
(5, 'Xoài cát', 'Xoài cát', '<p>Xoài cát</p>', 3, 55000, 45000.00, 1, '2024-02-20 02:09:27', '2024-02-20 02:39:21', '/storage/uploads/2024/02/20/xoai.jpg', NULL),
(6, 'Lõi vai bò Kube', 'Lõi vai bò Kube', '<p>Lõi vai bò Kube</p>', 2, 500000, NULL, 1, '2024-02-20 02:37:12', '2024-02-20 02:37:12', '/storage/uploads/2024/02/20/3.jpg', NULL),
(7, 'Đầu cá hồi tươi', 'Đầu cá hồi tươi', '<p>Đầu cá hồi tươi</p>', 2, 110000, NULL, 1, '2024-02-20 02:37:31', '2024-02-20 02:38:54', '/storage/uploads/2024/02/20/1.jpg', NULL),
(8, 'Đùi gà nhỏ', 'Đùi gà nhỏ', '<p>Đùi gà nhỏ</p>', 2, 35000, NULL, 1, '2024-02-20 02:37:58', '2024-02-20 02:40:13', '/storage/uploads/2024/02/20/2.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(1, '1', 'rau-cu-qua', '/storage/uploads/2024/02/20/491ff017-0c19-42eb-89cd-6fb6f8079a37.jpg', 1, 1, '2024-02-19 23:18:14', '2024-02-19 23:18:14'),
(2, 'Thịt', 'thit', '/storage/uploads/2024/02/20/thit.jpg', 1, 1, '2024-02-19 23:18:31', '2024-02-19 23:18:31'),
(3, 'Trai cây', 'trai-cay', '/storage/uploads/2024/02/20/e90a3e03-f78c-4255-80a5-4f9ec80b0183.jpg', 1, 1, '2024-02-19 23:18:48', '2024-02-19 23:18:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lợi', 'loi.nguyen@hbc.com.vn', NULL, '$2y$10$8hzFYMnwhtSs7T4Fzn4AIuhblGtAFGzgqZNqU8N5W76SptxFTEelq', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
