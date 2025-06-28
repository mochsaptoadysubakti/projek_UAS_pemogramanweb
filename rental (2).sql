-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 05:24 PM
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
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_03_08_115712_create_motors_table', 2),
(6, '2025_03_09_074737_add_profile_image_to_users_table', 3),
(7, '2025_03_09_071929_add_profile_image_to_users_table', 4),
(8, '2025_03_11_225854_add_phone_to_users_table', 5),
(9, '2025_05_14_162957_create_transaksis_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `motors`
--

CREATE TABLE `motors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Tersedia','Disewa') NOT NULL DEFAULT 'Tersedia',
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motors`
--

INSERT INTO `motors` (`id`, `nama`, `jenis`, `deskripsi`, `harga`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha R15', 'Sport', 'Motor sport fairing...', 160000, 'Disewa', 'r15.jpg', '2025-06-10 01:19:36', '2025-06-12 07:24:10'),
(2, 'Honda CBR150R', 'Sport', 'Menawarkan keseimbangan...', 155000, 'Tersedia', 'cbr150r.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(3, 'Kawasaki Ninja 250', 'Sport', 'Legenda di kelas 250cc...', 250000, 'Tersedia', 'ninja250.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(4, 'Honda Supra X 125', 'Bebek', 'Dikenal sangat irit...', 90000, 'Tersedia', 'suprax125.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(5, 'Yamaha Jupiter MX', 'Bebek', 'Motor bebek dengan sentuhan sporty...', 95000, 'Tersedia', 'jupitermx.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(6, 'Suzuki Satria F150', 'Bebek', 'Ayago yang terkenal...', 100000, 'Tersedia', 'satriaf150.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(7, 'Yamaha NMax', 'Matic', 'Skutik maxi premium...', 100000, 'Tersedia', 'nmax.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(8, 'Honda PCX', 'Matic', 'Menawarkan kemewahan...', 120000, 'Tersedia', 'pcx.jpg', '2025-06-10 01:19:36', '2025-06-10 01:19:36'),
(9, 'Vespa Primavera', 'Matic', 'Skutik ikonik dengan desain retro-modern...', 150000, 'Tersedia', 'vespa.jpeg', '2025-06-10 01:19:36', '2025-06-10 01:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1iOSruX21Vpx37oh5JtauDrhD6Rjf1G3bftQgTmr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicVpONmZnVkw3RHo1TVNpZHp0bFBFd2E0UFFDaWZ6NVFHWW82bERnbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749738327),
('1ZRvIEIJMmQ93XnYICht0gouHvmmMwXF7DfVSUAV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUxLSTFLOFF3R2dmbXdTYzBUSmlEWGdLdTlEZ3A3ZkJneFpkME5TWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749730143);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `motor_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status` enum('pending','dibayar','selesai') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `motor_id`, `start_date`, `duration`, `payment_method`, `total_biaya`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-06-10', -1, 'GoPay', -135000, 'pending', '2025-06-10 01:51:32', '2025-06-10 01:51:32'),
(2, 1, 1, '2025-06-10', -1, 'Tunai', -135000, 'pending', '2025-06-10 01:53:04', '2025-06-10 01:53:04'),
(3, 1, 2, '2025-06-10', -4, 'GoPay', -605000, 'pending', '2025-06-10 01:54:23', '2025-06-10 01:54:23'),
(4, 1, 2, '2025-06-12', -3, 'GoPay', -450000, 'pending', '2025-06-10 01:58:34', '2025-06-10 01:58:34'),
(5, 1, 9, '2025-06-11', -4, 'BCA', -585000, 'pending', '2025-06-10 02:01:24', '2025-06-10 02:01:24'),
(6, 1, 2, '2025-06-11', -2, 'BCA', -295000, 'pending', '2025-06-10 18:06:22', '2025-06-10 18:06:22'),
(7, 1, 2, '2025-06-12', -8, 'GoPay', -1225000, 'pending', '2025-06-12 05:31:22', '2025-06-12 05:31:22'),
(8, 1, 2, '2025-06-14', -2, 'Tunai', -295000, 'pending', '2025-06-12 07:25:18', '2025-06-12 07:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'younjang', '083189916740', 'ady1@gmail.com', 'profile_images/brTPcZ0OD0ELWEZZqyFwAN8CPCLwJLxVKxJPpDVl.jpg', NULL, '$2y$12$urjTNv3XE9wW3EOGrHebNeq7aC5gMWSg7J6xrhJGV0U5kB2JAxQ2C', NULL, '2025-03-11 00:29:24', '2025-06-10 18:05:08'),
(2, 'suyo', '083189916740', 'suyo21@gmail.com', 'profile_images/R2vSU5veSxMlTaCsWQrIsFUN8LrHH1N5WlMHXHLr.jpg', NULL, '$2y$12$ylAJ5xCr/JQF1NlFInY9K.xT2K25GKu3BiH9dzpr/hLvahFOzxgHC', NULL, '2025-04-15 01:36:37', '2025-04-15 01:37:26'),
(3, 'nur', NULL, 'nur12@gmail.com', NULL, NULL, '$2y$12$h7TjdBT7v.zjCAMR44NM9eqlECPVoCDbk7k9vzOJWFrNXPEh1w6XC', NULL, '2025-04-15 20:11:36', '2025-04-15 20:11:36'),
(4, 'ika', NULL, 'icahya223@gmail.com', NULL, NULL, '$2y$12$i7MkZx6pQsel485yyqQlQObY4nExwPj4Os9A9G.EEbvANE6o/LQIK', NULL, '2025-04-15 21:08:14', '2025-04-15 21:08:14'),
(5, 'Test User', NULL, 'test@example.com', NULL, NULL, '$2y$12$PL1N0Ud4.2cv2pfmggy/RuYTZ2HpriA75JnVFw.1mTpwKQ2pYNIs.', NULL, '2025-06-09 02:05:38', '2025-06-09 02:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motors`
--
ALTER TABLE `motors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_motor_id_foreign` (`motor_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `motors`
--
ALTER TABLE `motors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_motor_id_foreign` FOREIGN KEY (`motor_id`) REFERENCES `motors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
