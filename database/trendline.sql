-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 09:05 PM
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
-- Database: `trendline`
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `return_date` date DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_10_07_133435_create_products_table', 1),
(5, '2024_10_07_135920_create_orders_table', 1),
(6, '2024_10_07_144933_create_order_details_table', 1),
(7, '2024_10_07_172213_create_carts_table', 1),
(8, '2024_10_08_103819_drop_product_id_from_orders_table', 1),
(9, '2024_10_08_103902_add_product_id_to_order_details_table', 1),
(10, '2024_10_08_104633_make_user_id_nullable_in_orders_table', 1),
(11, '2024_10_08_142528_create_order_statuses_table', 1),
(12, '2024_10_09_090210_add_price_and_quantity_to_order_details_table', 1),
(13, '2024_10_09_100047_add_for_rent_column_to_products_table', 1),
(14, '2024_10_09_100857_add_order_type_column_to_orders_table', 1),
(15, '2024_10_09_101305_add_return_date_column_to_order_details_table', 1),
(16, '2024_10_09_105514_add_return_date_to_carts_table', 1),
(17, '2024_10_10_053046_create_product_categories_table', 1),
(18, '2024_10_10_053130_add_category_id_to_products_table', 1),
(19, '2024_10_10_053207_create_variations_table', 1),
(20, '2024_10_10_071801_add_variation_id_to_carts_table', 1),
(21, '2024_10_10_071928_add_variation_id_to_order_details_table', 1),
(22, '2024_10_10_103158_create_comments_table', 1),
(23, '2024_10_10_134842_add_image_column_to_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_type` varchar(255) NOT NULL DEFAULT 'purchase',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_last_name` varchar(255) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `billing_mobile_no` varchar(255) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_zip_code` varchar(255) NOT NULL,
  `shipping_first_name` varchar(255) DEFAULT NULL,
  `shipping_last_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_mobile_no` varchar(255) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_area` varchar(255) NOT NULL,
  `for_rent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `quantity`, `shipping_area`, `for_rent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pink Top', 'Beautifull ladies top', 2000.00, 'imgs/pink-sweater-front.jpg', 10, 'All over Pakistan', 0, '2024-10-10 11:35:40', '2024-10-10 11:35:40'),
(2, 2, 'Black heels article', 'a nice ladies high heel foot ware', 3000.00, 'imgs/6.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 11:46:29', '2024-10-10 11:46:29'),
(3, 3, 'Pink girl shoes', 'ladies comfortable pink shoes', 4000.00, 'imgs/1.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 11:51:57', '2024-10-10 11:51:57'),
(5, 4, 'Flat shoes', 'Ladies fancy flat shoes', 4500.00, 'imgs/flat1.jpg', 20, 'All over Pakistan', 0, '2024-10-10 11:55:03', '2024-10-10 11:56:12'),
(6, 5, 'Summer T-shirt', 'men\'s beautiful t-shirt', 2500.00, 'imgs/shirt1.jpg', 10, 'All over Pakistan', 0, '2024-10-10 11:57:13', '2024-10-10 11:57:13'),
(7, 6, 'Male Formal dress', 'men\'s beautifull formal dressing', 8000.00, 'imgs/1dress.jpg', 10, 'All over Pakistan', 0, '2024-10-10 11:58:34', '2024-10-10 11:58:34'),
(8, 7, 'White with tea pink shoes', 'men\'s nice shoes', 5000.00, 'imgs/bda1d11c9852a3dfc6b18c5c710f029e_crb9uite878c73agn190_image.png', 10, 'All over Pakistan', 0, '2024-10-10 12:00:05', '2024-10-10 12:00:05'),
(9, 8, 'Leather shoes', 'men\'s leather premium shoes', 3000.00, 'imgs/leather1.jpg', 10, 'All over Pakistan', 0, '2024-10-10 12:01:22', '2024-10-10 12:01:22'),
(10, 9, 'Neon red Lipstick', 'beautifull neon lipstick', 1500.00, 'imgs/lipstick1.jpg', 10, 'All over Pakistan', 0, '2024-10-10 12:03:53', '2024-10-10 12:03:53'),
(11, 10, 'maskara article', 'best maskara ever', 1200.00, 'imgs/WhatsApp Image 2024-09-28 at 1.33.41 AM.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 12:05:58', '2024-10-10 12:05:58'),
(12, 11, 'Liner article', 'nice liner', 1300.00, 'imgs/WhatsApp Image 2024-09-28 at 2.19.10 AM.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 12:07:14', '2024-10-10 12:07:14'),
(13, 12, 'blush on', 'best blush on', 5000.00, 'imgs/blush-1063136.jpg', 10, 'All over Pakistan', 0, '2024-10-10 12:08:08', '2024-10-10 12:08:08'),
(14, 13, 'EyeShadow article', 'best ey shadow product', 8000.00, 'imgs/2.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 12:08:57', '2024-10-10 12:08:57'),
(15, 14, 'makeup brushes', 'best brushes for makeup', 5000.00, 'imgs/2.jpeg', 10, 'All over Pakistan', 0, '2024-10-10 12:09:55', '2024-10-10 12:09:55'),
(16, 15, 'Perfume Article', 'very decent scent', 6000.00, 'imgs/ai-generated-8727927.jpg', 12, 'All over Pakistan', 0, '2024-10-10 12:15:52', '2024-10-10 12:15:52'),
(17, 16, 'Anklet', 'Beautifull ladies anklet', 5000.00, 'imgs/5e421217dcf82a73a886de55540fb7ba_cr01oile878c738r3c5g_image (1).png', 12, 'All over Pakistan', 0, '2024-10-10 12:16:53', '2024-10-10 12:16:53'),
(18, 17, 'bracelate article', 'nice article for wrist', 700.00, 'imgs/81aecff793271ccb4e94a60771ebec6f_cpt3nk5e878c73abtgg0_image.png', 13, 'All over Pakistan', 0, '2024-10-10 12:17:58', '2024-10-10 12:17:58'),
(19, 18, 'Pendent Article', 'Ladies fancy pendent', 3000.00, 'imgs/03de761d65ea57761320ad1bac0c6fe5_clodej14msbc7397nvg0_image.png', 14, 'All over Pakistan', 0, '2024-10-10 12:18:57', '2024-10-10 12:18:57'),
(20, 19, 'Crystal Couple ring', 'nice rings for couple', 3000.00, 'imgs/676e7d4c499b76f3cc352c0589e0f090_cjmr91h4msba38gmkuug_image.png', 14, 'All over Pakistan', 0, '2024-10-10 12:19:51', '2024-10-10 12:19:51'),
(21, 20, 'Silver Earings', 'nice earings', 3000.00, 'imgs/WhatsApp Image 2024-09-17 at 11.48.20 PM.jpeg', 15, 'All over Pakistan', 0, '2024-10-10 12:20:50', '2024-10-10 12:20:50'),
(22, 21, 'Wrist watch', 'nice watch', 4000.00, 'imgs/watch1.jpg', 15, 'All over Pakistan', 0, '2024-10-10 12:21:38', '2024-10-10 12:21:38'),
(23, 22, 'Vase Article', 'very nice vase for indoor decoration', 4000.00, 'imgs/ai-generated-8549404.jpg', 15, 'All over Pakistan', 0, '2024-10-10 12:22:34', '2024-10-10 12:22:34'),
(24, 23, 'Painting article', 'a beautiful antique painting', 6000.00, 'imgs/1.jpeg', 15, 'All over Pakistan', 0, '2024-10-10 12:23:36', '2024-10-10 12:23:36'),
(25, 24, 'Wall Clock', 'A fancy wall clock', 5000.00, 'imgs/1stclock.jpg', 15, 'All over Pakistan', 0, '2024-10-10 12:25:22', '2024-10-10 12:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'women dresses Top', '2024-10-10 11:25:54', '2024-10-10 11:25:54'),
(2, 'women footware Heel', '2024-10-10 11:26:16', '2024-10-10 11:26:16'),
(3, 'women footware shoes', '2024-10-10 11:26:27', '2024-10-10 11:26:27'),
(4, 'women footware flat', '2024-10-10 11:26:43', '2024-10-10 11:26:43'),
(5, 'men\'s T-shirt', '2024-10-10 11:26:55', '2024-10-10 11:26:55'),
(6, 'men\'s diner suit', '2024-10-10 11:27:08', '2024-10-10 11:27:08'),
(7, 'men\'s footware shoes', '2024-10-10 11:27:23', '2024-10-10 11:27:23'),
(8, 'men\'s footware leather shoes', '2024-10-10 11:27:36', '2024-10-10 11:27:36'),
(9, 'lipstick', '2024-10-10 11:27:59', '2024-10-10 11:27:59'),
(10, 'maskara', '2024-10-10 11:28:07', '2024-10-10 11:28:07'),
(11, 'liner', '2024-10-10 11:32:20', '2024-10-10 11:32:20'),
(12, 'blush on', '2024-10-10 11:32:24', '2024-10-10 11:32:24'),
(13, 'eye shadow pellete', '2024-10-10 11:32:35', '2024-10-10 11:32:35'),
(14, 'makeup brushes', '2024-10-10 11:32:50', '2024-10-10 11:32:50'),
(15, 'perfuem', '2024-10-10 11:32:53', '2024-10-10 11:32:53'),
(16, 'anklet', '2024-10-10 11:33:08', '2024-10-10 11:33:08'),
(17, 'bracelate', '2024-10-10 11:33:19', '2024-10-10 11:33:19'),
(18, 'pendent', '2024-10-10 11:33:25', '2024-10-10 11:33:25'),
(19, 'rings', '2024-10-10 11:33:28', '2024-10-10 11:33:28'),
(20, 'earings', '2024-10-10 11:33:31', '2024-10-10 11:33:31'),
(21, 'watch', '2024-10-10 11:33:41', '2024-10-10 11:33:41'),
(22, 'vase', '2024-10-10 11:33:49', '2024-10-10 11:33:49'),
(23, 'paintings', '2024-10-10 11:33:54', '2024-10-10 11:33:54'),
(24, 'clock', '2024-10-10 11:33:57', '2024-10-10 11:33:57');

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
('t7ujxZKLAMc0mP2pJrE3jZerbqku9xkfxi9YVMOu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmpleE51OTgxVzBZTnV4dFFmTmJWc241VURpejB4R0FRd3hjMTJVRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9fQ==', 1728586403);

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
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@trendline.com', NULL, '$2y$12$KtW5aOqwAK1ULyCDBh600O0ZzvurclF1PXNQAnREN058.yAL9inNi', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `color`, `size`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'pink', 'Small', 1, '2024-10-10 11:35:40', '2024-10-10 11:35:40'),
(2, 'pink', 'Medium', 1, '2024-10-10 11:35:40', '2024-10-10 11:35:40'),
(3, 'black', 'Medium', 2, '2024-10-10 11:46:29', '2024-10-10 11:46:29'),
(4, 'pink', 'Large', 3, '2024-10-10 11:51:57', '2024-10-10 11:51:57'),
(6, 'orange', 'Large', 5, '2024-10-10 11:56:12', '2024-10-10 11:56:12'),
(7, 'pink', 'Medium', 6, '2024-10-10 11:57:13', '2024-10-10 11:57:13'),
(8, 'brown', 'Medium', 7, '2024-10-10 11:58:34', '2024-10-10 11:58:34'),
(9, 'pink', 'Medium', 8, '2024-10-10 12:00:05', '2024-10-10 12:00:05'),
(10, 'brown', 'Medium', 9, '2024-10-10 12:01:22', '2024-10-10 12:01:22'),
(11, 'red', 'Small', 10, '2024-10-10 12:03:53', '2024-10-10 12:03:53'),
(12, 'black', 'Medium', 11, '2024-10-10 12:05:58', '2024-10-10 12:05:58'),
(13, 'black', 'Medium', 12, '2024-10-10 12:07:14', '2024-10-10 12:07:14'),
(14, 'black', 'Large', 13, '2024-10-10 12:08:08', '2024-10-10 12:08:08'),
(15, 'brown', 'Medium', 14, '2024-10-10 12:08:57', '2024-10-10 12:08:57'),
(16, 'pink', 'Medium', 15, '2024-10-10 12:09:55', '2024-10-10 12:09:55'),
(17, 'orange', 'Medium', 16, '2024-10-10 12:15:52', '2024-10-10 12:15:52'),
(18, 'pink', 'Medium', 16, '2024-10-10 12:15:52', '2024-10-10 12:15:52'),
(19, 'pink', 'Medium', 17, '2024-10-10 12:16:53', '2024-10-10 12:16:53'),
(20, 'blue', 'Small', 18, '2024-10-10 12:17:58', '2024-10-10 12:17:58'),
(21, 'yellow', 'Medium', 19, '2024-10-10 12:18:57', '2024-10-10 12:18:57'),
(22, 'blue', 'Small', 20, '2024-10-10 12:19:51', '2024-10-10 12:19:51'),
(23, 'blue', 'Medium', 20, '2024-10-10 12:19:51', '2024-10-10 12:19:51'),
(24, 'gray', 'Medium', 21, '2024-10-10 12:20:50', '2024-10-10 12:20:50'),
(25, 'brown', 'Medium', 22, '2024-10-10 12:21:38', '2024-10-10 12:21:38'),
(26, 'purple', 'Medium', 23, '2024-10-10 12:22:34', '2024-10-10 12:22:34'),
(27, 'yellow', 'Medium', 24, '2024-10-10 12:23:36', '2024-10-10 12:23:36'),
(28, 'gray', 'Medium', 25, '2024-10-10 12:25:22', '2024-10-10 12:25:22');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_variation_id_foreign` (`variation_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_variation_id_foreign` (`variation_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_statuses_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`);

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
