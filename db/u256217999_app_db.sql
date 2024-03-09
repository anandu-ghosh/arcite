-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 01:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arcite`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `whattsapp_link` longtext NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `course_id`, `name`, `whattsapp_link`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'morning batch', 'webwhatsapp//plplplp', 1, NULL, 'active', NULL, '2024-03-08 05:35:06', '2024-03-08 05:35:06'),
(2, 1, 'evening batch', 'bfgfgfg//lklklkl', 1, NULL, 'active', NULL, '2024-03-08 05:35:30', '2024-03-08 05:35:30'),
(3, 5, 'night batch', 'gfgfg//popo', 1, NULL, 'active', NULL, '2024-03-08 12:22:04', '2024-03-08 12:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `institution_id`, `name`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Physics', 'active', 1, NULL, NULL, '2024-03-06 13:15:40', '2024-03-06 13:15:40'),
(2, 1, 'Chemistry', 'active', 1, NULL, NULL, '2024-03-06 13:15:46', '2024-03-06 13:15:46'),
(3, 2, 'Graphics', 'active', 1, NULL, NULL, '2024-03-06 13:16:00', '2024-03-06 13:16:00'),
(4, 3, 'Biotechnology', 'active', 1, 1, NULL, '2024-03-06 13:16:10', '2024-03-07 11:14:57'),
(5, 2, 'English', 'active', 1, 1, NULL, '2024-03-07 11:15:28', '2024-03-07 11:20:18'),
(6, 2, 'English 2', 'active', 1, NULL, '2024-03-07 11:18:56', '2024-03-07 11:15:38', '2024-03-07 11:18:56');

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
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `address`, `email`, `phone`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'KOTTIYAM', '2ND FLOOR SAS ARCADE, \r\nOPPOSITE VYAPARA BHAVAN, \r\nKOTTIYAM- KUNDARA ROAD, \r\nKOTTIYAM, \r\nPIN 691571', '', '', 'active', 1, 1, NULL, '2024-02-13 07:23:23', '2024-02-13 07:23:23'),
(2, 'KADAPPAKADA', 'PRASANTHI BUILDINGS,\r\nNEAR SPORTS CLUB KADAPPAKADA,\r\nKADAPPAKADA,\r\nKOLLAM,\r\nPin 691001', '', '', 'active', 1, 1, NULL, '2024-02-13 07:24:54', '2024-02-13 07:24:54'),
(3, 'KOCHI\r\n', '1st FLOOR THARIYANS BUILDING,\r\nMAHATHMA GANDHI ROAD,\r\nATLANTIS JUNCTION,\r\nPERUMANOOR,\r\nKOCHI,\r\nERNAKULAM,\r\nPin 682015', '', '', 'active', 1, 1, NULL, '2024-02-13 07:25:45', '2024-02-13 07:25:45');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_03_131441_create_roles_table', 1),
(6, '2024_01_30_204133_create_institutions_table', 1),
(7, '2024_03_04_152619_create_staffs_table', 2),
(8, '2024_03_06_162746_add_softdelete_to_staffs_table', 3),
(10, '2024_03_06_181208_create_courses_table', 4),
(13, '2024_03_07_182849_create_batches_table', 5),
(16, '2024_03_08_134028_create_students_table', 6);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TECHNICAL DIRECTOR ', 'active', 1, 1, NULL, '2024-02-13 07:26:22', '2024-02-13 07:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `institution_id`, `name`, `address`, `email`, `phone`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 12, 1, 'Vineeth A', 'kottiyam ,kollam,kerala 965124', 'vineeth@gmail.com', '9689636363', 'active', 1, NULL, '2024-03-08 05:27:49', '2024-03-08 05:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `status` enum('visit','enquiry','allocated') NOT NULL DEFAULT 'visit',
  `aadhar_number` longtext DEFAULT NULL,
  `aadhar_photo` longtext DEFAULT NULL,
  `student_photo` longtext DEFAULT NULL,
  `sslc_certificate` longtext DEFAULT NULL,
  `plustwo_certificate` longtext DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` int(10) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `address`, `mobile`, `email`, `qualification`, `status`, `aadhar_number`, `aadhar_photo`, `student_photo`, `sslc_certificate`, `plustwo_certificate`, `course_id`, `batch_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 'Devaprayag', 'P R', 'trivadrum ,kerala 698565', '56895632656', 'deva@gmail.com', 'SSLC', 'visit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 10:13:55', '2024-03-08 10:13:55'),
(16, 'Ricky', 'Kumar', 'kottiyam,kollam,kerala', '69856895', 'ricky@gmail.com', 'SSLC', 'visit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 10:14:25', '2024-03-08 10:14:25'),
(17, 'Aryan', 'C', 'pallimon,kollamm', '2356895623', 'aryan@gmail.com', 'SSLC', 'allocated', '7684343434', '1709892936-65eae548986b0.jpg', '1709892936-65eae5489facb.jpg', '1709892936-65eae548a0161.png', '1709892936-65eae548a0789.jpg', 1, 2, 1, NULL, NULL, '2024-03-08 10:15:36', '2024-03-08 12:47:37'),
(18, 'BAbu', 'K', 'kollam kollam', '5689562356', 'babu@gmail.com', 'PLUSTWO', 'enquiry', '6554343223', '1709901481-65eb06a9e050d.jpg', '1709901481-65eb06a9e6fcb.jpg', '1709901481-65eb06a9e7614.jpg', '1709901481-65eb06a9e837c.jpg', 1, NULL, 1, NULL, NULL, '2024-03-08 12:38:01', '2024-03-08 12:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MOHAMMED SAJIN S', 1, 'admin@gmail.com', '2024-01-03 12:06:33', '$2y$12$00.b8Cndj0aNgRqY9Vq.LOwqMx.bpu87hgwSLgd39nmMAn1z/XUn2', 'ezVRHKesdnSpdgFF1EUnovRrLTRdW6pcYFPDTqkxmoGq0gem8LdTTeECl8kp', 'active', NULL, '2024-01-03 12:06:33', '2024-01-03 12:06:33'),
(12, 'Vineeth A', 2, 'vineeth@gmail.com', '2024-03-08 05:27:49', '$2y$12$pO25LohcGZU9xDEAHTiJ/eKqVAt/LklGK76Sgx7mw16pt8AR4SZ/K', NULL, 'active', NULL, '2024-03-08 05:27:49', '2024-03-08 05:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffs_user_id_foreign` (`user_id`),
  ADD KEY `staffs_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`),
  ADD CONSTRAINT `staffs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
