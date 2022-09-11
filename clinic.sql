-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2022 at 02:11 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_features`
--

DROP TABLE IF EXISTS `aboutus_features`;
CREATE TABLE IF NOT EXISTS `aboutus_features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus_features`
--

INSERT INTO `aboutus_features` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'feature 11', 'CGA1Cdd96ozrXWozEJvQNdWI9ketcPYShzuRdcbX.png', '2022-08-29 15:16:16', '2022-08-29 15:16:28'),
(3, 'ggjhhjh', 'r4zkkehmofM0m4iv4rLd2JaUfmsfZddGWzL6XKe3.png', '2022-08-29 16:48:32', '2022-08-29 16:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `archeiveclients`
--

DROP TABLE IF EXISTS `archeiveclients`;
CREATE TABLE IF NOT EXISTS `archeiveclients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nemployees` int NOT NULL,
  `setting_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at_str` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archeiveclients_setting_id_foreign` (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archeiveclients`
--

INSERT INTO `archeiveclients` (`id`, `name`, `phone`, `country`, `email`, `nemployees`, `setting_id`, `status`, `created_at_str`, `created_at`, `updated_at`) VALUES
(18, 'client4', '6565665', 'egypt', 'client3@gmail.com', 244, 2, 1, '1661852175', '2022-08-30 07:36:15', '2022-08-30 07:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'rtl4zO64CkOBZRe4HdwrmsEY7UmnvE6uz9kcEBfP.png', '2022-07-25 12:57:19', '2022-08-29 15:21:57'),
(5, '6M8Bfo207hUrZORDvTw1iEWoGEmC1q98w7GMoqUM.png', '2022-08-29 16:49:05', '2022-08-29 16:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Hend Ahmed', 'malakmamdouh443@gmail.com', '01015447822', 'jhjhhjjhjhjh', '2022-08-28 10:20:03', '2022-08-28 10:20:03'),
(2, 'malak', 'malak@gmail.com', '67666767', 'hellllllo', '2022-08-28 10:51:06', '2022-08-28 10:51:06'),
(3, 'malak', 'malak@gmail.com', '67666767', 'hellllllo', '2022-08-29 09:38:17', '2022-08-29 09:38:17'),
(4, 'Hend Ahmed', 'malakmamdouh443@gmail.com', '01015447822', 'hhhgfhgff', '2022-08-29 15:40:08', '2022-08-29 15:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

DROP TABLE IF EXISTS `headers`;
CREATE TABLE IF NOT EXISTS `headers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `welcomeMsg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkUrl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headers`
--

INSERT INTO `headers` (`id`, `title`, `welcomeMsg`, `description`, `image`, `linkName`, `linkUrl`, `created_at`, `updated_at`) VALUES
(4, 'hghghghg', 'welocme', 'hggggggggg', '6vsOq0L1KsSolV9dOWFiFHPUUnidNv7MVUo7dmDX.png', 'hhhhhhhhhhhh', '', '2022-08-29 16:42:59', '2022-08-29 16:42:59'),
(3, 'title 1', 'welocme', 'des 1', 'b0SE2DsnHgoydSi5M7CeEEJE4L733IkPF6kCRA46.png', 'kkkk', '', '2022-08-29 14:43:18', '2022-08-29 14:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_07_165740_create_roles_table', 1),
(5, '2022_06_07_165808_create_permissions_table', 1),
(6, '2022_06_07_165835_create_role_permissions_table', 1),
(7, '2022_06_11_054130_create_settings_table', 1),
(8, '2022_07_01_171153_create_notifications_table', 1),
(9, '2022_07_03_143438_create_archeiveclients_table', 1),
(10, '2022_07_25_090521_create_parteners_table', 1),
(11, '2022_07_25_094639_create_clients_table', 2),
(12, '2022_07_20_143210_create_features_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('b43c741c-ef6c-405d-b94a-2f3f9e2129d4', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":1,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-25\",\"time\":\"09:35\"}', '2022-07-28 17:12:35', '2022-07-25 07:35:18', '2022-07-28 17:12:35'),
('3bab8195-f7b1-4cbf-aedb-746362fa0433', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":2,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-25\",\"time\":\"09:35\"}', '2022-07-28 17:12:35', '2022-07-25 07:35:34', '2022-07-28 17:12:35'),
('2689998a-390f-46ef-8c7d-dbd23d0088c4', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":3,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-25\",\"time\":\"09:37\"}', '2022-07-28 17:12:35', '2022-07-25 07:37:02', '2022-07-28 17:12:35'),
('13d63ac0-2820-4ff4-93c4-e97283c587db', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":4,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-25\",\"time\":\"09:39\"}', '2022-07-28 17:12:35', '2022-07-25 07:39:18', '2022-07-28 17:12:35'),
('1702da3b-756c-415a-91fb-a57ef0b8cdbb', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":5,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-25\",\"time\":\"12:04\"}', '2022-07-28 17:12:35', '2022-07-25 10:04:42', '2022-07-28 17:12:35'),
('15a766c0-0959-479f-b2b8-59ef793e6459', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":6,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:00\"}', NULL, '2022-08-30 07:00:03', '2022-08-30 07:00:03'),
('c72b1d0d-e08b-49d3-a04e-e71829257dbe', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":7,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:00\"}', NULL, '2022-08-30 07:00:30', '2022-08-30 07:00:30'),
('17784de3-7386-4169-8c20-bae52a05c557', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":8,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:13\"}', NULL, '2022-08-30 07:13:42', '2022-08-30 07:13:42'),
('53c72c48-4820-4892-9ebb-6868ed8b74eb', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":9,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:14\"}', NULL, '2022-08-30 07:14:36', '2022-08-30 07:14:36'),
('60dc150c-70bb-453f-b4ce-c312a4405590', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":10,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:15\"}', NULL, '2022-08-30 07:15:58', '2022-08-30 07:15:58'),
('0b202a6d-7c7e-4a62-b470-921448935c07', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":11,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:16\"}', NULL, '2022-08-30 07:16:34', '2022-08-30 07:16:34'),
('cd1d66ca-89d4-401a-930d-c7a21a840cca', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":12,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:17\"}', NULL, '2022-08-30 07:17:47', '2022-08-30 07:17:47'),
('a2a6a6fb-6d37-4bec-97ed-75f5bd31df58', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":13,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:21\"}', NULL, '2022-08-30 07:21:47', '2022-08-30 07:21:47'),
('c7c74615-ce79-4bb6-afd1-df0d7a3ce79b', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":14,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:22\"}', NULL, '2022-08-30 07:22:11', '2022-08-30 07:22:11'),
('8b38671c-fcfb-4d55-9b8a-b886e45127cb', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":15,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:25\"}', NULL, '2022-08-30 07:25:40', '2022-08-30 07:25:40'),
('8e84ef19-1159-42e5-a2c9-45e1c5b5349d', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":16,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:29\"}', NULL, '2022-08-30 07:29:10', '2022-08-30 07:29:10'),
('382482d2-ea74-44b4-8185-704a56dbe6c9', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":17,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:34\"}', NULL, '2022-08-30 07:34:10', '2022-08-30 07:34:10'),
('6d6a1d37-948a-40e2-9e89-7fea4c5aaf66', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":18,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-08-30\",\"time\":\"09:36\"}', NULL, '2022-08-30 07:36:15', '2022-08-30 07:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleware` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quard` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_ar`, `name_en`, `name_fr`, `quard`, `created_at`, `updated_at`) VALUES
(1, 'ادمن', 'admins', 'admins', 'admin', NULL, NULL),
(2, 'مستخدمين', 'users', 'users', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `roles_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `backImg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iconImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `backImg`, `iconImg`, `created_at`, `updated_at`) VALUES
(2, 'title 1', 'des 1', '0WQYWL5NHDwcCThSby2Zvba3AXqYX1WnXjOUke3n.png', 'rUdQJcI51l3G3HPQ0TctAF4dfCmsimRI1cteBur0.png', '2022-08-29 16:16:21', '2022-08-29 16:23:25'),
(4, 'ttttttt', 'mmmmmmm', 'FmKqNbmkrbcs0oXWbOsVzMRjFBDbga1LGXwsC7QZ.png', 'iePe2eJedfFhxKCPBGqQ2iMU6EizXDd69ix7q3F4.png', '2022-08-29 16:24:12', '2022-08-29 16:24:12'),
(5, 'uyyyyyy', 'hjjjjjjjj', 'SM0m1GObUxqRk4HgUGJtzinT4zRShlmvcbLlwoYM.png', 'plbpL6uPglVpQYbA7ZaXu5vaosC98nkQv088VvIy.png', '2022-08-29 16:25:01', '2022-08-30 10:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linked_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `linked_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'demoLink1', 'link1', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(2, 'demoUserName1', 'username1', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(3, 'demoPassword1', 'password1', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(4, 'demoLink2', 'link2', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(5, 'demoUserName2', 'username2', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(6, 'demoPassword2', 'password2', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(7, 'demoLink3', 'link3', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(8, 'demoUserName3', 'username3', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(9, 'demoPassword3', 'password3', NULL, 'demo', '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(10, 'facebook', 'facebook', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:41'),
(11, 'twitter', 'twitter', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:41'),
(12, 'mail', 'mail', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:41'),
(13, 'marketer', 'real state marketer', NULL, 'work', '2022-07-25 11:34:35', '2022-07-25 11:34:46'),
(14, 'companies', 'real state companies', NULL, 'work', '2022-07-25 11:34:35', '2022-07-25 11:34:46'),
(15, 'training', 'training-advertising..etc', NULL, 'work', '2022-07-25 11:34:35', '2022-07-25 11:34:46'),
(16, 'home1title', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(17, 'home1des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(18, 'home2title', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(19, 'home2des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(20, 'section1title', 'رواد CRM - برنامج ادارة علاقات العملاء', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 12:35:56'),
(21, 'section1header', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(22, 'section1des', 'سوف يساعدك رواد CRM في تسجيل وحفظ بيانات العملاء بشكل منظم وتفصيلي وتسهيل عملية شراء بشكل احترافي وسرعة التواصل معهم وبالتالي زيادة المبيعات. حيث يعمل نظام رواد CRM على تصنيف كل مرحلة من مراحل البيع حسب احتياج العميل مع تواجد خدمة عملاء ليسجلوا ماذا يحدث مع العميل بالتفصيل. وبامكانك ايضا امكانية ربط النظام عن طريق تطبيقات للاندرويد والايفون ليسهل على المستخدمين امكانية الحصول على احتياجهم في اي وقت واي مكان بحيث يتوافر عضوية لكل مسئول على حسب الوظيفة الخاصة به في الشركة.\r\n', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 12:35:56'),
(23, 'section2header', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(24, 'section2des', 'يتيح لك رواد CRM امكانية الحصول على تطبيق للجوال ، حتى يتيح لك التمكن من الوصول لبيانات عملائك في كل مكان حيث يوفّر عليك الوقت في الرجوع لجهازك المكتبي لتسجيل بيانات عميلك او مراجعة بيناته ، ليُسهل عملية البيع بشكل سريع مع ضمان توفير الدعم الفني للتطبيق بشكل دوري لمعالجة اي اخطاء ، والمحافطة على متابعة عملك دون اضاعة وقت متوفر على متجر جوجل بلاي وآبل ستور\r\n\r\n', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 12:35:56'),
(25, 'section3header', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(26, 'section3des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(27, 'section2title', 'رواد CRM على جوالك', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 12:35:56'),
(28, 'feature1title', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(29, 'feature1des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(30, 'feature2title', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(31, 'feature2des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(32, 'feature3title', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(33, 'feature3des', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(34, 'partener1name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(35, 'partener2name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(36, 'partener3name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(37, 'partener4name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(38, 'client1name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(39, 'client2name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(40, 'client3name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(41, 'client4name', '', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(42, 'closeSite', '0', NULL, NULL, '2022-07-25 11:34:35', '2022-07-25 11:34:35'),
(43, 'section1img', 'LotnjAboXb9bwx3iKNpRopQAWBh2qZ95GVjfM6TH.png', NULL, NULL, '2022-07-25 12:35:56', '2022-07-25 12:35:56'),
(44, 'section2img', '1NZWwq6Uk9GnvkcxoupcB0PdOA3Zl0F8iI8OGJlF.png', NULL, NULL, '2022-07-25 12:35:56', '2022-07-25 12:35:56'),
(45, 'logoimg', 'HN36s8yX6s8luMYLqxfiHFx3GjrutHfOY1o0N5eF.png', NULL, NULL, '2022-07-27 11:02:35', '2022-08-29 15:43:35'),
(46, 'aboutustitle', 'title 1', NULL, NULL, '2022-08-29 14:49:05', '2022-08-29 14:49:05'),
(47, 'aboutusdes', 'des 1', NULL, NULL, '2022-08-29 14:49:05', '2022-08-29 14:49:05'),
(48, 'aboutusimg', '', NULL, NULL, '2022-08-29 14:49:05', '2022-08-29 15:59:23'),
(55, 'featurestitle', 'titleeeeeee', NULL, NULL, '2022-08-29 16:56:07', '2022-08-29 16:56:07'),
(49, 'demoLink', 'link', NULL, NULL, '2022-08-29 14:51:08', '2022-08-29 14:51:08'),
(50, 'demoUserName', 'user', NULL, NULL, '2022-08-29 14:51:08', '2022-08-29 14:51:08'),
(51, 'demoPassword', 'password', NULL, NULL, '2022-08-29 14:51:08', '2022-08-29 14:51:08'),
(52, 'phone', '01015447822', NULL, NULL, '2022-08-29 15:46:19', '2022-08-29 15:46:19'),
(53, 'email', 'malakmamdouh443@gmail.com', NULL, NULL, '2022-08-29 15:46:19', '2022-08-29 15:46:19'),
(54, 'instagram', 'instagram', NULL, NULL, '2022-08-29 15:46:19', '2022-08-29 15:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `language`, `block`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'malakmamdouh443@gmail.com', '1', NULL, '$2y$10$qMvD8Ev/oef7CB0pD6cLDOG/B6VNzndyBMCgwpR1o3SilNRfx85vO', 'ar', NULL, NULL, '2022-07-25 11:33:54', '2022-08-29 14:24:28'),
(2, 'Hend Ahmed', 'test@technomasr.com', '2', NULL, '$2y$10$X/9TvdtBC8xu4N9ub/f6IuyaNLjXOh.ZKJXyCHKSs9DN.N0purxpi', 'ar', NULL, NULL, '2022-07-25 14:48:00', '2022-07-25 14:48:08'),
(3, 'Hend Ahmed', 'admin@ilawfair.com', '2', NULL, '$2y$10$d77jzHoF0Qqup8WAltJXSeSFIgIFIG7tJ0qTtEDxt3UFaOxJeN.sm', 'ar', NULL, NULL, '2022-07-25 14:48:56', '2022-07-25 14:49:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
