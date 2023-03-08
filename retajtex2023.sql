-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 11:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retajtex2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `postion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`id`, `name`, `phone_number`, `postion`, `created_at`, `updated_at`) VALUES
(1, 'محمد محروس', '01033441143', 'مصمم جرافيك', '2023-03-08 17:03:45', '2023-03-08 17:03:45'),
(2, 'حبيبة مدحت', '0100000000', 'مشغل مكن طباعه', '2023-03-08 17:04:03', '2023-03-08 17:04:03'),
(3, 'مريم محمد', '01000000002', 'مصمم جرافيك', '2023-03-08 17:04:13', '2023-03-08 17:04:13');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_01_204942_create_sublimations_table', 1),
(6, '2023_03_06_200210_create_emps_table', 1),
(7, '2023_03_06_224704_create_old_order_sublimations_table', 1),
(8, '2023_03_06_225413_create_tests_table', 1),
(9, '2023_03_07_204005_create_operationpermissions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `old_order_sublimations`
--

CREATE TABLE `old_order_sublimations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `copy` int(11) DEFAULT NULL,
  `fileh` int(11) DEFAULT NULL,
  `total_meter` int(11) DEFAULT NULL,
  `printer` varchar(255) DEFAULT NULL,
  `type_print` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `designer` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `who_signed_order` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operationpermissions`
--

CREATE TABLE `operationpermissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `ptint_type` varchar(255) NOT NULL,
  `total_meter` int(11) NOT NULL,
  `printer` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `designer` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `note` longtext NOT NULL,
  `pic` longtext NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operationpermissions`
--

INSERT INTO `operationpermissions` (`id`, `cust_name`, `ptint_type`, `total_meter`, `printer`, `date`, `designer`, `phone_number`, `path`, `note`, `pic`, `order_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'صبري شوشة', '300', 1, 'sky', '2023-03-08', 'محمد محروس', '111111111', 'd:2222', 'asdasd', 'C:\\xampp\\tmp\\php8E14.tmp', 0, NULL, '2023-03-08 18:16:48', '2023-03-08 18:16:48'),
(6, 'اسامه جميل', '1', 22, 'dgi', '2023-03-08', 'محمد محروس', '222', '2222', '222', 'C:\\xampp\\tmp\\php62BF.tmp', 0, NULL, '2023-03-08 19:03:35', '2023-03-08 19:03:35'),
(7, 'شعبان صديق', '1', 1111, 'Fedar', '2023-03-08', 'محمد محروس', '0110000', '123', 'سيش', 'C:\\xampp\\tmp\\php3114.tmp', 0, NULL, '2023-03-08 19:20:51', '2023-03-08 19:20:51'),
(8, 'كايرو موضا', '1', 100, 'dgi', '2023-03-08', 'محمد محروس', '010000000', 'صثضثس', 'ملاحظات', 'C:\\xampp\\tmp\\phpFE67.tmp', 0, NULL, '2023-03-08 19:57:46', '2023-03-08 19:57:46'),
(9, 'ابراهيم النجار', '1', 300, 'Fedar', '2023-03-08', 'محمد محروس', '010000', 'مسشيسيش', 'ملاحظات', 'C:\\xampp\\tmp\\php90C0.tmp', 0, NULL, '2023-03-08 19:59:29', '2023-03-08 19:59:29'),
(10, 'ابراهيم النجار', '1', 40, 'Fedar', '2023-03-08', 'محمد محروس', '01000000', '213231', 'ملاحظات', 'C:\\xampp\\tmp\\php1F45.tmp', 0, NULL, '2023-03-08 20:00:06', '2023-03-08 20:00:06'),
(12, 'احمد شخرم', '20', 100, 'sky', '2023-03-08', 'محمد محروس', '2222', '1111', 'ملاحظات', 'C:\\xampp\\tmp\\phpF75A.tmp', 0, NULL, '2023-03-08 20:07:34', '2023-03-08 20:07:34'),
(13, 'احمد شخرم', '20', 100, 'sky', '2023-03-08', 'محمد محروس', '2222', '1111', 'ملاحظات', '113108-03-2023-22-08.png', 0, NULL, '2023-03-08 20:08:03', '2023-03-08 20:08:03');

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
-- Table structure for table `sublimations`
--

CREATE TABLE `sublimations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `copy` int(11) DEFAULT NULL,
  `fileh` int(11) DEFAULT NULL,
  `total_meter` int(11) DEFAULT NULL,
  `printer` varchar(255) DEFAULT NULL,
  `type_print` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `designer` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `who_signed_order` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sublimations`
--

INSERT INTO `sublimations` (`id`, `cust_name`, `copy`, `fileh`, `total_meter`, `printer`, `type_print`, `date`, `designer`, `phone_number`, `who_signed_order`, `note`, `images`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'اسامه جميل', 70, 100, 70, 'Fedar', 'اتواب', '2023-03-08', 'محمد محروس', NULL, 'حبيبة مدحت', 'الكبس علي شيفون', 'Skycolor-Sc-6160-Large-Format-Printing-10-Feet-Eco-Solvent-Printer-Photo-Canvas-Vinyl-Printer08-03-2023-22-00.jpg', NULL, '2023-03-08 17:05:21', '2023-03-08 20:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد محروس', 'admin@admin.com', NULL, '$2y$10$NAABgYD1I9BOWddKf.iHS.g6y/7YtJ03P2wu3hnqjaqYzWTNrOtNm', NULL, '2023-03-08 17:03:09', '2023-03-08 17:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_order_sublimations`
--
ALTER TABLE `old_order_sublimations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operationpermissions`
--
ALTER TABLE `operationpermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sublimations`
--
ALTER TABLE `sublimations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emps`
--
ALTER TABLE `emps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `old_order_sublimations`
--
ALTER TABLE `old_order_sublimations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operationpermissions`
--
ALTER TABLE `operationpermissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sublimations`
--
ALTER TABLE `sublimations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
