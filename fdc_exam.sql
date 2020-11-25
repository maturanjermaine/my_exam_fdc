-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 25, 2020 at 08:45 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fdc_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` bigint(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('active','removed') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `company`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contact1', 'FDC', 9270032869, 'contact1@gmail.com', 'removed', '2020-11-25 08:39:55', '2020-11-25 00:39:55'),
(2, 1, 'Contact2', 'FDC', 9270032869, 'contact2@gmail.com', 'active', '2020-11-25 00:32:26', '2020-11-25 00:32:26'),
(3, 1, 'Contact3', 'FDC', 9270032869, 'contact3@gmail.com', 'active', '2020-11-25 00:36:01', '2020-11-25 00:36:01'),
(4, 1, 'Contact4', 'FDC', 9270032869, 'contact4@gmail.com', 'active', '2020-11-25 00:36:20', '2020-11-25 00:36:20'),
(5, 1, 'Contact5', 'FDC', 9270032869, 'contact5@gmail.com', 'active', '2020-11-25 00:36:40', '2020-11-25 00:36:40'),
(6, 1, 'Contact6', 'FDC', 9270032869, 'contact6@gmail.com', 'active', '2020-11-25 00:36:54', '2020-11-25 00:36:54'),
(7, 1, 'Contact7', 'Dreamscape', 9270032869, 'contact7@gmail.com', 'removed', '2020-11-25 08:39:42', '2020-11-25 00:39:42'),
(8, 1, 'contact8', 'FDC', 9270032869, 'contact8@gmail.com', 'active', '2020-11-25 00:37:46', '2020-11-25 00:37:46'),
(9, 1, 'contact9', 'FDC\'', 9270032869, 'contact9@gmail.com', 'active', '2020-11-25 00:38:37', '2020-11-25 00:38:37'),
(10, 1, 'contact10', 'FDC', 9270032869, 'contact10@gmail.com', 'active', '2020-11-25 00:38:51', '2020-11-25 00:38:51'),
(11, 1, 'contact11', 'Dreamscape', 9270032869, 'contact11@gmail.com', 'active', '2020-11-25 00:39:12', '2020-11-25 00:39:12'),
(12, 1, 'contact12', 'Dreamscape', 9270032869, 'contact12@gmail.com', 'active', '2020-11-25 00:39:35', '2020-11-25 00:39:35'),
(13, 1, 'contact13', 'FDC', 9270032869, 'contact13@gmail.com', 'active', '2020-11-25 00:40:16', '2020-11-25 00:40:16'),
(14, 2, 'contact14', 'FDC', 9270032869, 'contact14@gmail.com', 'active', '2020-11-25 00:40:53', '2020-11-25 00:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Person One', 'person1@gmail.com', '$2y$10$nTWHV0oJqwcUmvPrhOLyi.3m3iZBImIdkf9H0bVXUALsipJA11s5G', NULL, '2020-11-25 00:29:23', '2020-11-25 00:29:23'),
(2, 'Person Two', 'person2@gmail.com', '$2y$10$UmPmZVGY9AelRvOdFGGTAuyZV6TrKyie1pkuDH.EhSzoEo9RQPKxy', NULL, '2020-11-25 00:33:31', '2020-11-25 00:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
