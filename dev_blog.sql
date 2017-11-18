-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2017 at 03:18 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2017-11-17 03:42:36', '2017-11-17 03:42:36'),
(2, 'JavaScript', '2017-11-17 03:43:41', '2017-11-17 03:58:40'),
(3, 'Java', '2017-11-17 03:43:51', '2017-11-17 03:43:51'),
(4, 'MySQL', '2017-11-17 03:44:08', '2017-11-17 03:44:08'),
(5, 'Laravel', '2017-11-17 03:44:14', '2017-11-17 03:44:14'),
(6, 'Python', '2017-11-17 03:47:08', '2017-11-17 03:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `commendable_id` int(11) NOT NULL,
  `commendable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `commendable_id`, `commendable_type`, `created_at`, `updated_at`) VALUES
(1, 'nothind to do that!', 1, 1, 'App\\Models\\Post', '2017-11-17 18:42:20', '2017-11-17 18:42:20'),
(2, 'This bugs is fixed', 1, 1, 'App\\Models\\Post', '2017-11-17 18:43:43', '2017-11-17 18:43:43'),
(3, 'Nothing!', 1, 3, 'App\\Models\\Post', '2017-11-17 18:44:28', '2017-11-17 18:44:28'),
(4, 'hello!', 2, 1, 'App\\Models\\Post', '2017-11-17 19:45:48', '2017-11-17 19:45:48'),
(5, 'testing123', 3, 1, 'App\\Models\\Post', '2017-11-17 20:30:17', '2017-11-17 20:30:17'),
(6, 'testing1', 3, 1, 'App\\Models\\Post', '2017-11-17 20:33:08', '2017-11-17 20:33:08'),
(7, 'test1', 3, 2, 'App\\Models\\Post', '2017-11-17 20:34:36', '2017-11-17 20:34:36'),
(8, 'test', 3, 3, 'App\\Models\\Post', '2017-11-17 20:35:09', '2017-11-17 20:35:09'),
(9, 'err', 1, 4, 'App\\Models\\Post', '2017-11-17 20:36:12', '2017-11-17 20:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_17_030029_create_permission_tables', 2),
(4, '2017_11_17_095815_create_categories_table', 3),
(5, '2017_11_17_103102_create_posts_table', 4),
(6, '2017_11_17_235638_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `slug`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'DB error1', 'Testing 123', '5a0ece54e781f', 1, 4, '2017-11-17 05:26:04', '2017-11-17 20:36:29'),
(2, 'EJB', 'Testing with ejb', '5a0f5a36edaed', 1, 3, '2017-11-17 15:22:54', '2017-11-17 17:05:38'),
(3, 'PHP', 'Testing php', '5a0f5d324a8aa', 1, 1, '2017-11-17 15:35:38', '2017-11-17 15:35:38'),
(4, 'Odoo 9', 'Error in odoo9', '5a0fa39ac0322', 1, 6, '2017-11-17 20:36:02', '2017-11-17 20:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '2017-11-16 21:37:36', '2017-11-16 21:37:36'),
(2, 'Director', '2017-11-16 21:38:16', '2017-11-16 21:38:16'),
(3, 'Sale Staff', '2017-11-16 22:58:14', '2017-11-16 22:58:14'),
(4, 'Post Writer', '2017-11-17 04:30:04', '2017-11-17 04:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zin Mar', 'zinmar@gmail.com', '$2y$10$ESpYMYpw92VDl.FV9DB1aucgZmKry9ikzgUwPIONuDzaRVe5faZcC', '9yfiwOhssodpe8jGgM9aqxCjH9kx7l2XNrXwirTxrINEVG5LHepJh8zY6lFh', '2017-11-16 16:42:17', '2017-11-17 19:45:26'),
(2, 'Thazin', 'thazin@gmail.com', '$2y$10$GxQjbDdYXGJ1y.0FzSAGru2lKKT0yT7f.dy5cJBw6jJjlmklvqOW.', 'zzt4G5yHdVndvAV8MIfUdslROKLrDkgoccw42MfcFM4I4YJ4vjBqfuZGj3LJ', '2017-11-16 16:46:23', '2017-11-17 19:52:09'),
(3, 'Mg Mg', 'mgmg@gmail.com', '$2y$10$cxS.rfTdxMaarHx.rn7byuk7NJD.U2gzmCJiTHfQf8Nj9UR7Slyom', 'PZ4bnCPPNFT8ALfJfs8tiMW1IST4dYi926R1HExMVeIYfW2SbCWQD0a2xfZq', '2017-11-17 19:57:28', '2017-11-17 20:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE IF NOT EXISTS `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE IF NOT EXISTS `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(4, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
