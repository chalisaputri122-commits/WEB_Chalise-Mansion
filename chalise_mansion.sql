-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2026 at 12:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalise_mansion`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'sepatu\r\n', NULL, NULL),
(3, 'flatshoes', NULL, NULL),
(4, 'sandal\r\n', NULL, NULL),
(5, 'moles\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_10_14_131135_create_products_table', 1),
(6, '2026_10_14_131929_create_sales_table', 1),
(7, '2026_10_14_132015_create_sale_items_table', 1),
(8, '2026_10_17_155448_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `purchase_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `selling_price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `nama`, `brand`, `size`, `color`, `stock`, `purchase_price`, `selling_price`, `created_at`, `updated_at`, `image`, `category_id`) VALUES
(1, '0909', 'Sneakers Classic', 'adidas', '37', 'ungu', 0, '500000.00', '300000.00', '2026-10-19 08:43:19', '2026-10-19 09:07:47', 'images/puma1.png', 4),
(2, 'csp09', 'flatshoes', 'puma', '37', 'silver', 0, '200000.00', '250000.00', '2026-10-19 08:48:35', '2026-10-19 08:54:08', 'images/puma2.png', 3),
(3, '31313', 'sandal slop', 'ando', '38', 'hitam', 4, '500000.00', '100000.00', '2026-10-19 08:56:21', '2026-10-19 09:06:27', 'images/puma3.png', 4),
(4, '0707', 'moles', 'sakaki', '36', 'kuning soft', 10, '1000000.00', '120000.00', '2026-10-20 06:15:34', '2026-10-20 06:15:34', 'images/puma4.png', 5),
(5, '55555', 'flatshoes', 'puma', '38', 'pink', 0, '1500000.00', '300000.00', '2026-10-20 06:18:50', '2026-10-24 21:15:55', 'images/puma5.png', 3),
(8, '0809', 'flatshoes', 'puma', '37', 'silver', 3, '1500000.00', '300000.00', '2026-10-20 06:20:46', '2026-10-21 05:23:23', 'images/puma6.png', 3),
(9, '0031', 'sandal', 'nike', '39', 'biru pink', 4, '10000000.00', '2000000.00', '2026-10-20 06:55:00', '2026-10-20 07:49:45', 'images/puma7.png', 3),
(10, '3232', 'Sneakers Classic', 'new balenc', '37', 'putih abu', 2, '2400000.00', '800000.00', '2026-10-20 07:10:39', '2026-10-20 07:11:25', 'images/puma8.png', 2),
(11, '3434', 'casual', 'vans', '42', 'full black', 1, '800000.00', '450000.00', '2026-10-20 07:51:58', '2026-10-20 07:53:02', 'images/puma11.png', 2),
(12, '00999', 'slip-on', 'rebook', '43', 'full white', 4, '1200000.00', '500000.00', '2026-10-20 08:00:31', '2026-10-20 08:00:31', 'images/puma9.png', 2),
(13, '09876', 'heels', 'ysl', '42', 'merah hitam', 0, '50000000.00', '30000000.00', '2026-10-21 05:16:26', '2026-10-24 21:15:55', 'images/puma10.png', 4),
(14, '0987', 'boots', 'ventela', '40', 'hija', 0, '150000.00', '200000.00', '2026-10-21 05:20:34', '2026-10-21 05:22:27', 'images/puma11.png', 2),
(17, '0810', 'Casual', 'adidas', '38', 'kuning', 2, '4000000.00', '250000.00', '2026-10-21 06:00:32', '2026-10-21 06:00:32', 'images/puma12.png', 2),
(18, '1090', 'Casual', 'Nike', '38', 'abu abu', 1, '300000.00', '200000.00', '2026-10-21 06:02:06', '2026-10-21 06:02:58', 'images/puma13.png', 2),
(19, 'ch0987', 'boots', 'ventela', '38', 'cream', 2, '100000.00', '55000.00', '2026-10-22 06:35:02', '2026-10-22 06:35:02', 'images/puma14.png', 2),
(21, 'SS0009', 'Sneakers', 'PUMA', '36', 'PINK', 100, '150000000.00', '1200000.00', '2026-10-24 21:14:20', '2026-10-24 21:14:20', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `paid` decimal(12,2) NOT NULL,
  `change` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_number`, `total`, `paid`, `change`, `created_at`, `updated_at`) VALUES
(1, 'CM-20261019155406-7Q9B', '250000.00', '250000.00', '0.00', '2026-10-19 08:54:06', '2026-10-19 08:54:06'),
(2, 'CM-20261019155450-T3Z7', '300000.00', '350000.00', '50000.00', '2026-10-19 08:54:50', '2026-10-19 08:54:50'),
(3, 'INV-OUJUODEXCA', '100000.00', '100000.00', '0.00', '2026-10-19 09:06:26', '2026-10-19 09:06:26'),
(4, 'INV-PDTZCQUJRK', '300000.00', '300000.00', '0.00', '2026-10-19 09:07:47', '2026-10-19 09:07:47'),
(5, 'INV-1QJWLMCUFM', '300000.00', '300000.00', '0.00', '2026-10-20 06:21:43', '2026-10-20 06:21:43'),
(6, 'INV-J6H544B5SW', '800000.00', '800000.00', '0.00', '2026-10-20 07:11:24', '2026-10-20 07:11:24'),
(7, 'INV-B3WWKYD174', '900000.00', '900000.00', '0.00', '2026-10-20 07:16:12', '2026-10-20 07:16:12'),
(8, 'INV-ZNMCEEEAQY', '2000000.00', '2500000.00', '500000.00', '2026-10-20 07:49:44', '2026-10-20 07:49:44'),
(9, 'INV-8VIRNSSVG9', '450000.00', '500000.00', '50000.00', '2026-10-20 07:53:01', '2026-10-20 07:53:01'),
(10, 'INV-MHLRV6IJOS', '200000.00', '250000.00', '50000.00', '2026-10-21 05:22:23', '2026-10-21 05:22:23'),
(11, 'INV-EFXJFWOU2Z', '300000.00', '500000.00', '200000.00', '2026-10-21 05:23:23', '2026-10-21 05:23:23'),
(12, 'INV-CZXNTFWMJU', '200000.00', '300000.00', '100000.00', '2026-10-21 06:02:56', '2026-10-21 06:02:56'),
(13, 'INV-XVAH8N2YQS', '60600000.00', '100000000.00', '39400000.00', '2026-10-24 21:15:55', '2026-10-24 21:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '250000.00', '250000.00', '2026-10-19 08:54:08', '2026-10-19 08:54:08'),
(2, 2, 1, 1, '300000.00', '300000.00', '2026-10-19 08:54:50', '2026-10-19 08:54:50'),
(3, 3, 3, 1, '100000.00', '100000.00', '2026-10-19 09:06:27', '2026-10-19 09:06:27'),
(4, 4, 1, 1, '300000.00', '300000.00', '2026-10-19 09:07:47', '2026-10-19 09:07:47'),
(5, 5, 8, 1, '300000.00', '300000.00', '2026-10-20 06:21:43', '2026-10-20 06:21:43'),
(6, 6, 10, 1, '800000.00', '800000.00', '2026-10-20 07:11:25', '2026-10-20 07:11:25'),
(7, 7, 5, 3, '300000.00', '900000.00', '2026-10-20 07:16:12', '2026-10-20 07:16:12'),
(8, 8, 9, 1, '2000000.00', '2000000.00', '2026-10-20 07:49:44', '2026-10-20 07:49:44'),
(9, 9, 11, 1, '450000.00', '450000.00', '2026-10-20 07:53:02', '2026-10-20 07:53:02'),
(10, 10, 14, 1, '200000.00', '200000.00', '2026-10-21 05:22:26', '2026-10-21 05:22:26'),
(11, 11, 8, 1, '300000.00', '300000.00', '2026-10-21 05:23:23', '2026-10-21 05:23:23'),
(12, 12, 18, 1, '200000.00', '200000.00', '2026-10-21 06:02:57', '2026-10-21 06:02:57'),
(13, 13, 5, 2, '300000.00', '600000.00', '2026-10-24 21:15:55', '2026-10-24 21:15:55'),
(14, 13, 13, 2, '30000000.00', '60000000.00', '2026-10-24 21:15:55', '2026-10-24 21:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Chalise', 'admin@chalise.com', NULL, '$2y$12$mjBb9qro5p8kXal/w63bduXbsUQFFlN1b04s0Fxw58aVk8ADSKu2i', NULL, '2026-10-25 01:36:02', '2026-10-24 18:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_items_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
