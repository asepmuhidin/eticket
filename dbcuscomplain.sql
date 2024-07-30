-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 10:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcuscomplain`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `alpha1` varchar(3) NOT NULL,
  `alpha2` varchar(3) NOT NULL,
  `num1` int(11) NOT NULL,
  `num2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `cluster_id`, `alpha1`, `alpha2`, `num1`, `num2`, `created_at`, `updated_at`) VALUES
(4, 8, 'DA', 'DI', 1, 22, '2024-01-17 07:04:50', '2024-01-17 07:04:50'),
(5, 7, 'FA', 'FD', 1, 26, '2024-01-17 07:04:50', '2024-01-17 07:04:50'),
(6, 6, 'EA', 'EC', 1, 20, '2024-01-17 07:04:50', '2024-01-17 07:04:50'),
(7, 5, 'CA', 'CI', 1, 40, '2024-01-17 07:04:50', '2024-01-17 07:04:50'),
(8, 4, 'AA', 'AE', 1, 30, '2024-01-17 07:04:50', '2024-01-17 07:04:50'),
(9, 3, 'ED', 'EQ', 1, 57, '2024-01-17 07:04:50', '2024-01-31 03:34:10'),
(10, 2, 'BA', 'BK', 1, 40, '2024-01-17 07:04:50', '2024-01-17 07:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE `clusters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clusters`
--

INSERT INTO `clusters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Ganesha', '2024-01-15 06:54:45', '2024-01-17 01:48:35'),
(3, 'Amrita', '2024-01-15 06:54:53', '2024-01-17 01:48:21'),
(4, 'Gayatri', '2024-01-17 01:48:47', '2024-01-17 01:48:47'),
(5, 'Dharmawangsa', '2024-01-17 01:49:03', '2024-01-17 01:49:03'),
(6, 'Ilmenite', '2024-01-17 01:49:15', '2024-01-17 01:49:15'),
(7, 'Amarta', '2024-01-17 01:49:33', '2024-01-17 01:49:33'),
(8, 'Ruko Arundaya', '2024-01-17 01:49:59', '2024-01-17 01:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `initial` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `type`, `user_id`, `initial`, `description`, `created_at`, `updated_at`) VALUES
(4, 'C-', 9, 'YAO', NULL, '2024-01-15 03:22:59', '2024-01-26 06:53:57'),
(6, 'C', 10, 'RZD', NULL, '2024-01-23 02:58:30', '2024-01-26 06:53:33'),
(7, 'AJB', 13, 'DHN', NULL, '2024-01-26 06:54:58', '2024-01-26 06:57:33'),
(8, 'C+', 11, 'DSI', NULL, '2024-01-26 06:57:25', '2024-01-26 06:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `cluster_id`, `created_at`, `updated_at`) VALUES
(4, 'Tipe 36/72', 4, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(5, 'Tipe 36/VAR', 4, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(6, 'Tipe 45/VAR', 2, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(7, 'Tipe 45/90', 2, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(8, 'Tipe 60/VAR 1 Lantai', 2, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(9, 'Tipe 60/120 1 Lantai', 2, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(10, 'Tipe 60/VAR 1 Lantai', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(11, 'Tipe 60/120 1 Lantai', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(12, 'Tipe 90/VAR', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(13, 'Tipe 90/120', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(14, 'Tipe 69/VAR', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(15, 'Tipe 69/120', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(16, 'Tipe 60/VAR 2 Lantai', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(17, 'Tipe 60/90 2 Lantai', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(18, 'Tipe 65/72', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(19, 'Tipe 79/VAR', 5, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(20, 'Tipe 65/VAR', 6, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(21, 'Tipe 65/72', 6, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(22, 'Tipe 65/84', 6, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(23, 'Tipe 79/VAR', 6, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(24, 'Tipe 79/84', 6, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(25, 'Tipe 36/VAR', 3, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(26, 'Tipe 36/72', 3, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(27, 'Tipe 33/VAR', 3, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(28, 'Tipe 33/66', 3, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(29, 'Tipe 36/VAR', 7, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(30, 'Tipe 36/72', 7, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(31, 'TipeRuko tidak standar', 8, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(32, 'TipeRuko 4,5x12', 8, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(33, 'TipeRuko 4,5x15', 8, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(34, 'TipeRuko 4,5x14', 8, '2024-01-17 02:34:59', '2024-01-17 02:34:59'),
(36, 'Type 55/66', 3, '2024-01-31 03:30:50', '2024-01-31 03:30:50'),
(37, 'Type 55/VAR', 3, '2024-01-31 03:31:07', '2024-01-31 03:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemDescription`, `created_at`, `updated_at`) VALUES
(2, 'Keramik', '2024-01-15 04:37:55', '2024-01-29 07:22:45'),
(4, 'Jendela', '2024-01-16 01:44:44', '2024-01-29 07:22:19'),
(5, 'Bocor', '2024-01-19 07:37:09', '2024-01-29 07:22:04'),
(6, 'Cat', '2024-01-19 07:37:33', '2024-01-29 07:21:55'),
(7, 'Dinding', '2024-01-19 07:37:50', '2024-01-29 07:21:42'),
(8, 'Pintu', '2024-01-29 03:06:17', '2024-01-29 07:21:27'),
(9, 'Skonengan', '2024-01-29 07:22:56', '2024-01-29 07:22:56'),
(10, 'Lampu', '2024-01-29 07:23:17', '2024-01-29 07:23:17'),
(11, 'Listrik', '2024-01-29 07:23:26', '2024-01-29 07:23:26'),
(12, 'Sanitairy', '2024-01-29 07:23:43', '2024-01-29 07:23:43'),
(13, 'Plafond', '2024-01-29 07:24:20', '2024-01-29 07:24:20'),
(14, 'Kanopi', '2024-01-29 07:24:30', '2024-01-29 07:24:30'),
(15, 'Genteng', '2024-01-29 07:24:47', '2024-01-29 07:24:47'),
(16, 'Carport', '2024-01-29 07:24:57', '2024-01-29 07:24:57'),
(17, 'Vynil', '2024-01-29 07:25:11', '2024-01-29 07:25:11'),
(18, 'Carport', '2024-01-29 07:25:18', '2024-01-29 07:25:18'),
(19, 'Conwood', '2024-01-29 07:25:30', '2024-01-29 07:25:30'),
(20, 'Tangga', '2024-01-29 07:25:35', '2024-01-29 07:25:35'),
(21, 'Topian', '2024-01-29 08:43:02', '2024-01-29 08:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `item_progress`
--

CREATE TABLE `item_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `change_date` date NOT NULL,
  `note` text DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_progress`
--

INSERT INTO `item_progress` (`id`, `item_ticket_id`, `status_id`, `change_date`, `note`, `remarks`, `reason`, `attachment`, `created_at`, `updated_at`) VALUES
(35, 76, 6, '2024-01-30', NULL, 'Penggantian Tusenklep pipa air', NULL, NULL, '2024-02-01 02:50:36', '2024-02-01 02:51:35'),
(36, 76, 3, '2024-01-31', NULL, NULL, NULL, NULL, '2024-02-01 02:53:06', '2024-02-01 02:53:06'),
(37, 81, 6, '2024-02-05', NULL, NULL, NULL, NULL, '2024-02-01 02:59:40', '2024-02-01 02:59:40'),
(38, 80, 6, '2024-02-06', NULL, NULL, NULL, NULL, '2024-02-01 03:01:43', '2024-02-01 03:01:43'),
(39, 79, 6, '2024-02-07', NULL, NULL, NULL, NULL, '2024-02-01 03:02:38', '2024-02-01 03:02:38'),
(40, 78, 6, '2024-02-07', NULL, NULL, NULL, NULL, '2024-02-01 03:05:18', '2024-02-01 03:05:18'),
(41, 77, 6, '2024-02-08', NULL, NULL, NULL, NULL, '2024-02-01 03:06:05', '2024-02-01 03:06:05'),
(42, 71, 6, '2024-02-08', NULL, NULL, NULL, NULL, '2024-02-01 03:18:38', '2024-02-01 03:18:38'),
(43, 83, 6, '2024-02-01', NULL, NULL, 'Ganti foto', '170710511578-me.jpeg', '2024-02-05 03:31:25', '2024-02-05 03:51:55'),
(44, 83, 3, '2024-02-05', NULL, NULL, NULL, '170710581049-40_jateng_3-3384020402.webp;17071058104-imam.jpeg', '2024-02-05 04:03:30', '2024-02-05 04:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `item_ticket`
--

CREATE TABLE `item_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_ticket`
--

INSERT INTO `item_ticket` (`id`, `item_id`, `ticket_id`, `status_id`, `created_at`, `updated_at`) VALUES
(71, 5, 1, 1, '2024-01-31 04:05:08', '2024-01-31 04:05:08'),
(72, 4, 2, 1, '2024-01-31 04:10:20', '2024-01-31 04:10:20'),
(73, 7, 2, 1, '2024-01-31 04:10:20', '2024-01-31 04:10:20'),
(74, 12, 2, 1, '2024-01-31 04:10:20', '2024-01-31 04:10:20'),
(75, 20, 2, 1, '2024-01-31 04:10:20', '2024-01-31 04:10:20'),
(76, 12, 3, 1, '2024-01-31 04:19:39', '2024-01-31 04:19:39'),
(77, 5, 4, 1, '2024-01-31 04:30:18', '2024-01-31 04:30:18'),
(78, 5, 5, 1, '2024-01-31 04:39:35', '2024-01-31 04:39:35'),
(79, 5, 6, 1, '2024-01-31 04:45:35', '2024-01-31 04:45:35'),
(80, 5, 7, 1, '2024-01-31 05:08:38', '2024-01-31 05:08:38'),
(81, 5, 8, 1, '2024-01-31 05:17:42', '2024-01-31 05:17:42'),
(82, 5, 9, 1, '2024-01-31 08:58:55', '2024-01-31 08:58:55'),
(83, 5, 10, 1, '2024-01-31 09:06:37', '2024-01-31 09:06:37'),
(84, 7, 10, 1, '2024-01-31 09:06:37', '2024-01-31 09:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2023-11-28 03:05:12', '2023-11-28 03:05:12', 'CS', 'Customer Service'),
(2, '2023-11-28 03:05:12', '2023-12-05 08:15:32', 'SS', 'Sales Senior'),
(3, '2023-11-28 03:05:12', '2023-11-28 03:05:12', 'PIC', 'PIC Projek'),
(4, '2023-11-28 03:05:12', '2023-11-28 03:05:12', 'PM', 'Projek Manager'),
(9, '2023-12-05 07:42:14', '2023-12-05 07:42:14', 'SA', 'Super Admin'),
(10, '2023-12-11 06:31:53', '2023-12-11 06:31:53', 'PL', 'Perencanaan dan Penjadwalan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_02_111913_create_products_table', 1),
(7, '2023_11_10_063657_create_permission_tables', 1),
(8, '2023_11_25_081842_create_levels_tabel', 1),
(9, '2023_11_25_174120_create_status_tables', 1),
(10, '2023_11_25_175414_create_tictypes_table', 1),
(14, '2023_11_29_102231_create_tickets_table', 2),
(15, '2014_10_12_000000_create_users_table', 3),
(16, '2024_01_11_095246_create_complains_table', 4),
(18, '2024_01_11_095425_create_clusters_table', 4),
(19, '2024_01_11_095516_create_houses_table', 4),
(22, '2024_01_11_095352_create_item_complains_table', 5),
(23, '2024_01_11_095614_create_blocks_table', 6),
(28, '2024_01_19_105648_create_item_ticket_table', 7),
(29, '2024_01_19_170027_create_item__progress_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 13),
(8, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('asep.muhidin@gmail.com', '$2y$10$15EyB.WtHUhiKE9V9d5SYuMa8fmX5cwF.nyCpwE2QMwPpNSxSJDmG', '2023-11-28 07:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(2, 'edit-role', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(3, 'delete-role', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(4, 'create-user', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(5, 'edit-user', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(6, 'delete-user', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(7, 'create-product', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(8, 'edit-product', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(9, 'delete-product', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(10, 'create-level', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(11, 'edit-level', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(12, 'delete-level', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(13, 'create-status', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(14, 'edit-status', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(15, 'delete-status', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(16, 'create-type', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(17, 'edit-type', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(18, 'delete-type', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(19, 'create-ticket', 'web', '2023-11-29 03:31:28', '2023-11-29 03:31:28'),
(20, 'edit-ticket', 'web', '2023-11-29 03:31:28', '2023-11-29 03:31:28'),
(21, 'delete-ticket', 'web', '2023-11-29 03:31:28', '2023-11-29 03:31:28'),
(22, 'create-permission', 'web', '2023-12-11 03:52:08', '2023-12-11 03:52:08'),
(23, 'edit-permission', 'web', '2023-12-11 03:52:08', '2023-12-11 03:52:08'),
(26, 'delete-permission', 'web', '2023-12-11 03:52:08', '2023-12-11 03:52:08'),
(27, 'ticket-delegate', 'web', '2023-12-11 04:16:51', '2023-12-11 04:16:51'),
(30, 'pm-approval-ticket', 'web', '2023-12-11 08:38:54', '2023-12-11 08:38:54'),
(31, 'ss-approval-ticket', 'web', '2023-12-11 08:39:11', '2023-12-11 08:39:11'),
(32, 'delegate-ticket', 'web', '2023-12-11 08:44:36', '2023-12-11 08:44:36'),
(33, 'progress-ticket', 'web', '2023-12-12 04:39:30', '2023-12-12 04:39:30'),
(34, 'create-complain', 'web', '2024-01-15 03:33:50', '2024-01-15 03:33:50'),
(35, 'edit-complain', 'web', '2024-01-15 03:34:00', '2024-01-15 03:34:00'),
(36, 'delete-complain', 'web', '2024-01-15 03:34:11', '2024-01-15 03:34:11'),
(37, 'create-itemcomplain', 'web', '2024-01-15 03:34:26', '2024-01-15 03:34:26'),
(38, 'edit-itemcomplain', 'web', '2024-01-15 03:34:41', '2024-01-15 03:34:41'),
(39, 'delete-itemcomplain', 'web', '2024-01-15 03:34:56', '2024-01-15 03:34:56'),
(40, 'create-house', 'web', '2024-01-15 06:35:13', '2024-01-15 06:35:13'),
(41, 'edit-house', 'web', '2024-01-15 06:35:32', '2024-01-15 06:35:32'),
(42, 'delete-house', 'web', '2024-01-15 06:35:44', '2024-01-15 06:35:44'),
(43, 'create-cluster', 'web', '2024-01-15 07:03:40', '2024-01-15 07:03:40'),
(44, 'edit-cluster', 'web', '2024-01-15 07:03:50', '2024-01-15 07:03:50'),
(45, 'delete-cluster', 'web', '2024-01-15 07:04:02', '2024-01-15 07:04:02'),
(46, 'create-block', 'web', '2024-01-15 07:04:24', '2024-01-15 07:04:24'),
(47, 'edit-block', 'web', '2024-01-15 07:04:34', '2024-01-15 07:04:34'),
(48, 'delete-block', 'web', '2024-01-15 07:04:45', '2024-01-15 07:04:45'),
(49, 'create-ticket-progress', 'web', '2024-01-22 07:57:40', '2024-01-22 07:57:40'),
(50, 'edit-ticket-progress', 'web', '2024-01-22 07:57:55', '2024-01-22 07:57:55'),
(51, 'delete-ticket-progress', 'web', '2024-01-22 07:58:08', '2024-01-22 07:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tesss', 'rdsdsds', '2023-11-30 02:59:56', '2023-11-30 02:59:56'),
(2, 'tess2', 'tsssss', '2023-11-30 07:01:21', '2023-11-30 07:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(2, 'Admin', 'web', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(4, 'Customer Service', 'web', '2023-12-05 08:17:30', '2023-12-05 08:17:30'),
(5, 'Sales Approval', 'web', '2023-12-08 07:24:43', '2023-12-08 07:24:43'),
(6, 'Ticket Delegate', 'web', '2023-12-11 04:40:23', '2023-12-11 04:40:23'),
(7, 'Planning', 'web', '2023-12-11 06:50:55', '2023-12-11 06:50:55'),
(8, 'Manager Approval', 'web', '2023-12-11 08:39:54', '2023-12-11 08:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 4),
(8, 4),
(9, 4),
(19, 2),
(19, 4),
(20, 2),
(20, 4),
(21, 2),
(21, 4),
(27, 2),
(30, 2),
(30, 8),
(31, 2),
(31, 5),
(32, 2),
(32, 6),
(33, 2),
(33, 7),
(49, 7),
(50, 7),
(51, 7);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sales_approve` int(11) NOT NULL,
  `person_delegate` int(11) NOT NULL,
  `pm_approve` int(11) NOT NULL,
  `cs` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  `auto_email_ss` tinyint(1) DEFAULT NULL,
  `auto_email_pm` tinyint(1) DEFAULT NULL,
  `sub_no_block` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sales_approve`, `person_delegate`, `pm_approve`, `cs`, `pl`, `title`, `description`, `auto_email_ss`, `auto_email_pm`, `sub_no_block`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 4, 1, 10, NULL, NULL, 0, 0, 'A;B', NULL, '2024-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Open', 'ticket open', 'info', '2023-11-28 03:05:12', '2023-11-30 07:38:23'),
(2, 'On Progress', 'ticket on progress', 'primary', '2023-11-28 03:05:12', '2024-01-26 07:06:05'),
(3, 'Close', 'ticket close', 'dark', '2023-11-28 03:05:12', '2023-11-30 07:41:10'),
(4, 'Cancel', 'ticket cancel', 'danger', '2023-11-28 03:05:12', '2023-11-30 07:41:18'),
(5, 'Onhold', 'Tiket ditunda', 'warning', '2024-01-18 09:24:17', '2024-01-18 09:24:32'),
(6, 'On Start', 'Waktu Mulai Pengerjaan', 'primary', '2024-01-29 08:17:32', '2024-01-31 04:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `delegateTo` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `level1_confirm` tinyint(1) NOT NULL DEFAULT 0,
  `level1_confirm_date` date DEFAULT NULL,
  `level2_confirm` tinyint(1) NOT NULL DEFAULT 0,
  `level2_confirm_date` date DEFAULT NULL,
  `custname` varchar(100) DEFAULT '',
  `complain_date` date DEFAULT current_timestamp(),
  `complain_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `block` varchar(4) NOT NULL,
  `block_no` int(11) DEFAULT 0,
  `block_sub` varchar(2) DEFAULT NULL,
  `bast_date` date DEFAULT NULL,
  `renov_date` date DEFAULT NULL,
  `complain_count` int(11) DEFAULT 0,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `war_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `type_id`, `status_id`, `subject`, `message`, `delegateTo`, `attachment`, `level1_confirm`, `level1_confirm_date`, `level2_confirm`, `level2_confirm_date`, `custname`, `complain_date`, `complain_id`, `cluster_id`, `house_id`, `block`, `block_no`, `block_sub`, `bast_date`, `renov_date`, `complain_count`, `comments`, `created_at`, `updated_at`, `due_date`, `war_date`) VALUES
(1, 12, 2, 1, 'COMPLAIN (+) EP/51', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EP/51</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EP/51, terkait dengan kebocoran. Sebagai berikut :</p>\r\n\r\n<p>1. Kebocoran dikamar anak posisi dekat kusen jendela</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '17066739077-IMG_0-(4).MOV', 0, NULL, 1, '2024-01-31', 'Ilham Fajar', '2024-01-27', 8, 3, 36, 'EP', 51, NULL, '2023-08-18', '2023-11-22', 1, '<p>segera di lakukan perbaikan terkait perihal tsb diatas maks 3 feb 24</p>', '2024-01-31 04:05:08', '2024-01-31 08:24:59', '2024-02-03', NULL),
(2, 12, 1, 1, 'COMPLAIN (-) EP/30', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (-) EP/30</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Ceklist)&nbsp;</strong>&nbsp;konsumen EP/30, terkait ceklist rumah sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li>Selang closet lantai 2 sudah berkarat, tidak seperti barang baru.</li>\r\n	<li>Ada kebocoran pada pipa wastafel lantai 2</li>\r\n	<li>Jendela karatan dan sedikit rusak pada kamar utama lantai 2.</li>\r\n	<li>Tembok yang menempel dengan pintu geser di kamar utama lantai 2 keadaannya gompel&nbsp;pada pinggirannya.</li>\r\n	<li>Beberapa lapisan pada tangga sudah lepas.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mohon arahan dan solusi dari Bapak terkait hal ini.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170667422033-checklistkeluhanrumahep30.zip', 0, NULL, 1, '2024-01-31', 'Tri Wisnu', '2024-01-28', 4, 3, 36, 'EP', 30, NULL, NULL, '2024-01-31', 1, '<p>segera di selesaikan pekerjaan check list tsb diata maksimal tgl 5 febuari 24</p>', '2024-01-31 04:10:20', '2024-01-31 08:23:34', '2024-02-05', NULL),
(3, 12, 1, 1, 'COMPLAIN (+) EN/27', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EN/27</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain)</strong>&nbsp;konsumen EN/27, terkait dengan Pompa. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170667477941-Screenshot-2024-01-30-104126.png', 0, NULL, 1, '2024-01-31', 'Vandy Prasetyo Nugroho', '2024-01-30', 8, 3, 36, 'EN', 27, NULL, '2023-03-03', NULL, 1, '<p>terkait komplain diatas secara aturan masa garansi telah berakhir</p>\r\n\r\n<p>terkait keluhan diatas sifat nya hanya membantu secara penjelasan</p>\r\n\r\n<p>seluruh biaya yang timbul adalah beban konsumen</p>', '2024-01-31 04:19:39', '2024-01-31 08:21:58', '2024-02-03', NULL),
(4, 12, 2, 1, 'COMPLAIN (+) EG/15', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EG/15</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EG/15, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170667541891-Screenshot-2024-01-30-104451.png;17066754187-Video-(1).mov', 0, NULL, 1, '2024-01-31', 'Aldi Wahyu Darmawan', '2024-01-30', 8, 3, 28, 'EG', 15, NULL, '2021-12-22', '2022-01-18', 1, '<p>keluhan minor mohon segera di perbaiki terkait perihal tsb diatas</p>\r\n\r\n<p>maksimal pelaksanaan s/d 2 febuari 24 ( cuaca mendukung )</p>', '2024-01-31 04:30:18', '2024-01-31 08:18:27', '2024-02-02', NULL),
(5, 12, 2, 1, 'COMPLAIN (+) EQ/6', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EQ/6</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EQ/6, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170667597389-IMG_3411.MOV;170667597520-Screenshot-2024-01-31-095236.png', 0, NULL, 1, '2024-01-31', 'Muhammad Miki Maulana', '2024-01-31', 8, 3, 37, 'EQ', 6, NULL, '2023-08-02', NULL, 1, '<p>segera untuk&nbsp; memperbaiki terkait keluhan tsb diatas</p>\r\n\r\n<p>maksimal finish tgl 7 febuari 2024</p>', '2024-01-31 04:39:35', '2024-01-31 08:16:20', '2024-02-07', NULL),
(6, 12, 2, 1, 'COMPLAIN (+) EF/9', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EF/9</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EF/9, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '17066763326-permohonanperbaikanrumahbocor.zip;170667633541-Screenshot-2024-01-31-095726.png', 0, NULL, 1, '2024-01-31', 'Bagus/Ayu Saputri', '2024-01-31', 8, 3, 28, 'EF', 9, NULL, '2021-12-28', '2023-06-14', 1, '<p>segera dijalnkan</p>\r\n\r\n<p>maksimal penyelesaian tgl 5 feb 24</p>', '2024-01-31 04:45:35', '2024-01-31 08:14:58', '2024-02-05', NULL),
(7, 12, 2, 1, 'COMPLAIN (+) EF/25', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EF/25</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EF/25, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170667771583-Screenshot-2024-01-31-114809.png;170667771582-VID-20240131-WA0000.mp4', 0, NULL, 1, '2024-01-31', 'Rangga Adi Saputra/Tania Citra Intani', '2024-01-31', 8, 3, 28, 'EF', 25, NULL, '2021-12-18', '2022-03-05', 1, '<p>mohon segera di tindak lanjuti hal tsb diatas</p>\r\n\r\n<p>pekerjaa kebocoran</p>\r\n\r\n<p>pelaksanaan maksimal s/d 6 febuari 24</p>', '2024-01-31 05:08:38', '2024-01-31 08:12:51', '2024-02-06', NULL),
(8, 12, 2, 1, 'COMPLAIN (+) EF/6', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EF/6</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EF/6, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>\r\n\r\n<p>&nbsp;</p>', NULL, '170667826266-recomplenbocor.zip;170667826246-Screenshot-2024-01-31-120904.png', 0, NULL, 1, '2024-01-31', 'Sonia Kaswanti', '2024-01-31', 8, 3, 28, 'EF', 6, NULL, '2021-12-28', '2022-01-15', 1, '<p>mohon diselesaikan max tgl 6 febuari 2024</p>', '2024-01-31 05:17:42', '2024-01-31 08:11:14', '2024-02-06', NULL),
(9, 12, 2, 1, 'COMPLAIN (+) EQ/7', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EQ/7</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EQ/7, terkait dengan Kebocoran. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170669153138-image_67112705-(1).JPG;170669153258-image_67112705.JPG;170669153284-image_67125505.JPG;170669153397-image_67141633.JPG;170669153411-image_67142913.JPG;170669153466-image_67160065.JPG;170669153581-Screenshot-2024-01-31-153916.png', 0, NULL, 1, '2024-02-01', 'Kevin Chandra/Annisa Nurdjannah', '2024-01-31', 8, 3, 37, 'EQ', 7, NULL, '2023-07-15', NULL, 1, '<p>komplain medium pekerjaan maksimal sampai dengan 6 febuari</p>', '2024-01-31 08:58:55', '2024-02-01 06:11:49', '2024-02-06', NULL),
(10, 12, 2, 1, 'COMPLAIN (+) EM 18', '<p>Kepada Yth,&nbsp;</p>\r\n\r\n<p>Bpk. Eko Cahyono&nbsp;</p>\r\n\r\n<p><strong>(Project Manager)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perihal : KOMPLAIN (+) EM/18</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berikut kami sampaikan&nbsp;<strong>(Komplain +)</strong>&nbsp;konsumen EM/18, terkait dengan Kebocoran dan dinding retak. Mohon arahan dan solusi dari Bapak terkait hal ini.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Terima kasih</p>', NULL, '170669199728-recomplenbocor.zip;170669199766-Screenshot-2024-01-31-155232.png', 0, NULL, 1, '2024-02-01', 'Christiyana', '2024-01-31', 8, 3, 26, 'EM', 18, NULL, '2022-10-14', NULL, 1, '<p>mohon ditindak lanjuti pekerjaan tsb diatas</p>\r\n\r\n<p>dengan atur man power max pekerjaan selesai 6 feb 24</p>', '2024-01-31 09:06:37', '2024-02-01 06:10:36', '2024-02-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tictypes`
--

CREATE TABLE `tictypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tictypes`
--

INSERT INTO `tictypes` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Low', 'LOW', '2023-11-28 03:05:12', '2023-11-30 07:11:25'),
(2, 'Medium', 'Medium', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(3, 'High', 'High', '2023-11-28 03:05:12', '2023-11-28 03:05:12'),
(4, 'Urgent', 'Urgent', '2023-11-28 03:05:12', '2023-11-28 03:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `isLeader` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level_id`, `isLeader`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$CtP9d0GrHBxszr7qWJDR4OYQZLkvB0ZjjC8mF6VPgzjY6/gCe6J2O', 9, 0, 'iaTpKuI04OVHV3j2Pdg6Pnm4NNOPiyq7qVDtAnzupgznx8I7RXZAzsNgGpXA', '2023-12-05 07:59:32', '2023-12-05 07:59:32'),
(9, 'Yudiana Pratama', 'yudiana.pratama@timahproperti.co.id', NULL, '$2y$10$W9qkb1NSeiFjv1sueTEiNe157wVo8tvgVcDiNC89HYxJEWJbEj4.u', 10, 0, NULL, '2024-01-26 06:49:39', '2024-01-26 06:49:39'),
(10, 'Rizal Juhud', 'rizal.juhud@timahproperti.co.id', NULL, '$2y$10$IW39mY12mYIUzGTBWV5wwOrMqnk5x.DuxSEVsrIPh4DuIn4KmQ8lW', 10, 0, NULL, '2024-01-26 06:50:12', '2024-01-26 06:50:12'),
(11, 'Dani Sumantri', 'dani.sumantri@timahproperti.co.id', NULL, '$2y$10$ga7ceh7zYslZhe.WIHA70.BJ/dBBo3Fw2RXZK/JkGoBAjkT0NTioy', 10, 0, 'UqdycyFkzdbjNMhCThK4RkU6zCs5tmLKo7BxcDgrOb6MqLJEw3wAYbUzXmyJ', '2024-01-26 06:50:48', '2024-01-26 06:50:48'),
(12, 'Srie Wulandari', 'srie.wulandari@timahproperti.co.id', NULL, '$2y$10$E9/8hQdQ56omC9ofVNdo9ug6.wxGfB3Axc34Fp1EQ188Bh1xEFkXS', 1, 0, 'XGlQ2thWY5Gq03fAc9o8GB9i0gsyCgxXRKBX3LCokmEU0Gl9mnxgEEmrbudG', '2024-01-26 06:51:36', '2024-01-26 06:51:36'),
(13, 'Dian Hardian', 'hardiansandidian@gmail.com', NULL, '$2y$10$28.aO51V6XLYGDANr6PI1eUj77xbXvqDb9A2fgjXX6lvcDIaTpIme', 10, 0, NULL, '2024-01-26 06:52:18', '2024-01-26 06:52:18'),
(14, 'Eko Cahyono', 'eko.cahyono@timahproperti.co.id', NULL, '$2y$10$MGsaF8rQTqX8mo2byPv5euWFqj9yhCpY9UVaFrMB2SbrgADuShGGO', 4, 0, NULL, '2024-01-26 06:59:52', '2024-01-26 06:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_progress`
--
ALTER TABLE `item_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_ticket`
--
ALTER TABLE `item_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tictypes`
--
ALTER TABLE `tictypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item_progress`
--
ALTER TABLE `item_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `item_ticket`
--
ALTER TABLE `item_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tictypes`
--
ALTER TABLE `tictypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
