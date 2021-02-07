-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 02:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `ip_address`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(24, '127.0.0.1', 23, 2, '2021-02-03 13:30:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `added_by`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Nature Honey', 4, '9.jpg', '2021-02-03 12:49:25', '2021-02-03 12:49:25', NULL),
(10, 'Olive Oil', 4, '10.jpg', '2021-02-03 12:49:57', '2021-02-03 12:49:57', NULL),
(11, 'Coconut Oil', 4, '11.jpg', '2021-02-03 12:50:24', '2021-02-03 12:50:25', NULL),
(12, 'Flower Honny', 4, '12.jpg', '2021-02-03 13:19:41', '2021-02-03 13:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `validity_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount_amount`, `validity_till`, `created_at`, `updated_at`) VALUES
(1, 'BD5', 5, '2020-12-21', '2020-12-20 15:53:04', NULL),
(3, 'BD10', 10, '2020-12-24', '2020-12-20 15:53:37', NULL),
(4, 'BD9', 60, '2020-12-25', '2020-12-20 19:11:33', NULL),
(5, 'BD7', 70, '2020-12-28', '2020-12-20 19:15:42', NULL),
(6, 'BD11', 11, '2020-12-25', '2020-12-20 19:22:34', NULL),
(7, 'BD12', 12, '2020-12-31', '2020-12-20 19:27:43', NULL),
(8, 'BD2', 20, '2020-12-01', '2020-12-21 05:46:51', NULL),
(9, 'BD3', 30, '2020-12-23', '2020-12-21 06:04:40', NULL),
(10, 'BD4', 4, '2020-12-24', '2020-12-21 06:05:23', NULL),
(11, 'BD1', 1, '2020-12-26', '2020-12-21 06:06:10', NULL),
(12, 'BD8', 8, '2020-12-23', '2020-12-21 06:08:50', NULL),
(13, 'B99', 99, '2020-12-23', '2020-12-21 06:19:34', NULL),
(14, 'BD55', 55, '2020-12-08', '2020-12-21 06:22:24', NULL),
(15, 'BD50', 50, '2020-12-24', '2020-12-22 06:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_q_s`
--

CREATE TABLE `fa_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_question` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_q_s`
--

INSERT INTO `fa_q_s` (`id`, `faq_question`, `faq_answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'What is your name', 'jahid uddin', '2020-12-06 03:53:27', '2020-12-06 06:54:40', NULL),
(10, 'hi jahid', 'yes', '2020-12-06 11:47:31', '2020-12-07 09:56:32', '2020-12-07 09:56:32'),
(11, 'Est.', 'Eius nemo ea sunt.', '2020-12-07 15:37:54', '2020-12-07 15:37:54', NULL),
(12, 'Sunt.', 'Est ducimus culpa aut.', '2020-12-07 15:37:54', '2020-12-07 15:37:54', NULL),
(13, 'At.', 'Fugit error sit quo qui.', '2020-12-07 15:37:54', '2020-12-07 15:37:55', NULL),
(14, 'i have a problem', 'what is  your  problem', '2020-12-07 15:49:00', NULL, NULL),
(15, 'What is your id namber', '112336636656', '2020-12-07 15:49:16', NULL, NULL),
(17, 'hi', 'hello', '2020-12-10 12:38:46', '2020-12-10 12:38:52', '2020-12-10 12:38:52'),
(18, 'faq', 'hello', '2020-12-13 19:30:23', '2020-12-13 19:30:28', '2020-12-13 19:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_11_29_164818_create_fa_q_s_table', 2),
(6, '2020_12_08_235359_create_catagories_table', 3),
(8, '2020_12_09_182321_create_categories_table', 4),
(9, '2020_12_13_205626_create_products_table', 5),
(10, '2020_12_14_120351_create_products_table', 6),
(11, '2020_12_15_184514_create_product_multiple_photos_table', 7),
(12, '2020_12_17_235853_create_carts_table', 8),
(14, '2020_12_20_201845_create_coupons_table', 9),
(16, '2020_12_23_214144_create_orders_table', 10),
(18, '2020_12_24_203911_create_order_lists_table', 11),
(20, '2020_12_28_191952_create_permission_tables', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_adderss` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_namber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `paid_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `email_adderss`, `phone_namber`, `country_id`, `city_id`, `address`, `note`, `sub_total`, `total`, `coupon_name`, `payment_method`, `paid_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'nishat', 'jahiduddin@gmail.com', '01756452336', 1, 1, 'Dhaka', 'dcsd', 300, 300, NULL, NULL, 1, '2020-12-24 16:08:17', NULL),
(2, 4, 'nishat', 'jahiduddin@gmail.com', '01756452336', 1, 1, 'Dhaka', 'dcsd', 300, 300, NULL, NULL, 1, '2020-12-24 16:09:22', NULL),
(3, 4, 'jahiduddin', 'jahiduddin@gmail.com', '01756452336', 1, 1, 'Dhaka', 'vvzv', 1600, 1600, NULL, NULL, 1, '2020-12-24 16:10:04', NULL),
(4, 4, 'jahiduddin', 'jahiduddin@gmail.com', '01756452336', 1, 1, 'Dhaka', 'Dhaka adcdqa', 200, 200, NULL, NULL, 1, '2020-12-25 12:20:29', NULL),
(5, 4, 'jahiduddin', 'jahiduddin@gmail.com', '01756452336', 1, 1, 'Dhaka', 'daaad', 420, 420, NULL, NULL, 1, '2020-12-25 12:21:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id`, `user_id`, `order_id`, `product_id`, `amount`, `review`, `star`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 13, 1, NULL, NULL, '2020-12-24 16:09:22', NULL),
(2, 4, 3, 11, 2, NULL, NULL, '2020-12-24 16:10:04', NULL),
(3, 4, 4, 15, 1, NULL, NULL, '2020-12-25 12:20:29', NULL),
(4, 4, 5, 15, 2, NULL, NULL, '2020-12-25 12:21:48', NULL),
(5, 4, 5, 14, 1, NULL, NULL, '2020-12-25 12:21:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_thumbnail_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_short_description`, `product_long_description`, `category_id`, `product_thumbnail_photo`, `product_slug`, `quantity`, `created_at`, `updated_at`) VALUES
(20, 'Honey', '250', 'It is a long established fact that a reader will be distracted by the readable content of a page when', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 9, '20.jpg', 'honey-1612358235', 1, '2021-02-03 13:17:15', '2021-02-03 13:17:16'),
(21, 'Oil', '45', 'It is a long established fact that a reader will be distracted by the readable content of a page when', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 10, '21.jpg', 'oil-1612358294', 2, '2021-02-03 13:18:14', '2021-02-03 13:18:14'),
(22, 'Coconut', '86', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 11, '22.jpg', 'coconut-1612358354', 4, '2021-02-03 13:19:14', '2021-02-03 13:19:14'),
(23, 'Flower', '63', 'It is a long established fact that a reader will be distracted by the', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 12, '23.jpg', 'flower-1612358514', 2, '2021-02-03 13:21:54', '2021-02-03 13:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_multiple_photos`
--

CREATE TABLE `product_multiple_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `multiple_photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multiple_photos`
--

INSERT INTO `product_multiple_photos` (`id`, `product_id`, `multiple_photo_name`, `created_at`, `updated_at`) VALUES
(1, 13, '13-1.jpeg', '2020-12-15 14:23:59', NULL),
(2, 13, '13-2.jpeg', '2020-12-15 14:23:59', NULL),
(3, 13, '13-3.jpeg', '2020-12-15 14:23:59', NULL),
(4, 13, '13-4.jpeg', '2020-12-15 14:23:59', NULL),
(5, 14, '14-1.jpeg', '2020-12-15 16:01:18', NULL),
(6, 15, '15-1.jpeg', '2020-12-17 16:47:37', NULL),
(7, 15, '15-2.jpeg', '2020-12-17 16:47:37', NULL),
(8, 16, '16-1.jpeg', '2020-12-22 11:20:52', NULL),
(9, 16, '16-2.jpeg', '2020-12-22 11:20:53', NULL),
(10, 17, '17-1.jpg', '2021-01-23 18:21:54', NULL),
(11, 17, '17-2.jpg', '2021-01-23 18:21:54', NULL),
(12, 18, '18-1.jpg', '2021-01-24 05:18:10', NULL),
(13, 18, '18-2.jpg', '2021-01-24 05:18:10', NULL),
(14, 19, '19-1.jpg', '2021-02-03 12:37:21', NULL),
(15, 19, '19-2.jpg', '2021-02-03 12:37:21', NULL),
(16, 20, '20-1.jpg', '2021-02-03 13:17:16', NULL),
(17, 20, '20-2.jpg', '2021-02-03 13:17:16', NULL),
(18, 20, '20-3.jpg', '2021-02-03 13:17:16', NULL),
(19, 21, '21-1.jpg', '2021-02-03 13:18:14', NULL),
(20, 21, '21-2.jpg', '2021-02-03 13:18:14', NULL),
(21, 22, '22-1.jpg', '2021-02-03 13:19:14', NULL),
(22, 22, '22-2.jpg', '2021-02-03 13:19:14', NULL),
(23, 23, '23-1.jpg', '2021-02-03 13:21:54', NULL),
(24, 23, '23-2.jpg', '2021-02-03 13:21:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(3, 'jahid', 'jahid@gmail.com', NULL, '$2y$10$HbLNYZdfWWvfq/O1KCr1p.bWink4CKXjL4wqI1F5vIHbs2eD3VI3S', NULL, 1, '2020-11-25 17:01:38', '2020-11-25 17:01:38'),
(4, 'jahiduddin', 'jahiduddin@gmail.com', '2020-12-05 15:09:31', '$2y$10$x011TnUwiNakG0ozhZOn8egLmMzGSWcViI.RNPUWyrg3qrCIEM.nq', 'h8GDD4vCcMg8YJPTpbkiWdbuYyPy37xIdk3zb4HOarpA2BxtBWLmE086uFLx', 2, '2020-11-25 17:03:25', '2020-12-05 15:09:31'),
(5, 'sabbir', 'sabbir@gmail.com', '2021-01-28 15:57:31', '$2y$10$0Oh0IbYD1vrO07Ean9sVH.uhz9uSRLdNSQh5CcFbyg3w.f.l4phs.', NULL, 2, '2020-11-25 17:30:03', '2020-11-25 17:30:03'),
(6, 'tamim', 'tamim@gmail.com', NULL, '$2y$10$23Dw4d6uFqKEDJFMAHCoJuiz.263A2pYT4SczveWeyfwC9pA8J/ry', NULL, 2, '2020-11-25 17:41:48', '2020-11-25 17:41:48'),
(7, 'Nayemm', 'nayemm@gmail.com', NULL, '$2y$10$96KUXGhOmKFds7Iz78fwfeyAYl5NxefUO9LJCSGSAgEwU./7lsWQK', NULL, 2, '2020-11-27 15:58:08', '2020-11-27 15:58:08'),
(8, 'sakib', 'sakib@gmail.com', NULL, '$2y$10$xWOXycUZstw3ELK1rI5xUO9LIl5b5rfEPAjcRb2iHMdHHNFhIFRiO', NULL, 2, '2020-11-28 17:14:49', '2020-11-28 17:14:49'),
(9, 'admin', 'admin@gmail.com', NULL, '$2y$10$b7Uaiv8KMvguIt.3HE3qqOuYn7jclPn6pcwhb3iXQPNfWsJKBSGsm', NULL, 2, '2020-11-30 16:56:03', '2020-11-30 16:56:03'),
(10, 'fahad', 'fahad@gmail.com', NULL, '$2y$10$T.0hl1vLRRVzo92D8d8qaeXO67R8qN1wjvIadF4oyI3CvwVV8HYYe', NULL, 2, '2020-12-01 14:18:50', '2020-12-01 14:18:50'),
(11, 'tarik', 'tarik@gmail.com', '2020-12-03 12:49:28', '$2y$10$xK0wSHjgA0qY89syQ0xAjurXCShq0elcmA.t15MzRaB/shjNZvIdq', NULL, 2, '2020-12-03 12:48:57', '2020-12-03 12:49:28'),
(15, 'mrweb', 'mrweb1905@gmail.com', '2020-12-05 15:51:29', '$2y$10$KjHixoem55aVqAd.uNFxTu9Y4CsfyYcM200pL/Ehi0Ar4q5.HgiA2', NULL, 2, '2020-12-05 15:51:13', '2020-12-05 15:51:29'),
(16, 'nishat', 'nishat@gmail.com', NULL, '$2y$10$AfbLUv2IftAEli1VfRc2ke4xrhugmFcsuo94WE2OG0/alGkrkWUhO', NULL, 1, '2020-12-08 13:25:38', '2020-12-08 13:25:38'),
(17, 'rayhan', 'rayhan@gmail.com', NULL, '$2y$10$14IubKtLE7FbYGJWm53ebuseCrn2gB2B9RE7U/LA3EfXsEoZ81oee', NULL, 2, '2020-12-09 15:58:55', '2020-12-09 15:58:55'),
(18, 'fahad', 'faranfahad@gmail.com', '2020-12-05 15:51:29', '$2y$10$qMPGPcbeYbjP5jXkQe5oEuTg/OECCMbdoMQfyLx640yE876JhxV5K', NULL, 1, '2020-12-16 13:37:42', '2020-12-16 13:37:42'),
(19, 'mobile', 'mobile@gmail.com', NULL, '$2y$10$FMpHnUmLyyr9cJkqeutMweuZ8THAy/B1aI2Q70dwkIoMTI2AXJ2ri', NULL, 2, '2020-12-16 13:37:42', '2020-12-29 17:52:38'),
(20, 'e-commerce', 'e-commerce@gmail.com', NULL, '$2y$10$kSjXidp7INoy64ImPa0i.OIDu/BWZ8UFXULAo7FE6aXn7Joit.oae', NULL, 2, '2021-01-24 05:15:19', '2021-01-24 05:15:19'),
(21, 'pc', 'pc@gmail.com', NULL, '$2y$10$RIm2Pqlfxbc4QFJRZp47Gudmjy3YP23Ia8.pjU53x4VdNXbXLkN/y', NULL, 2, '2021-01-24 05:38:35', '2021-01-24 05:38:35'),
(24, 'fdf', 'afafa@gmail.com', NULL, '$2y$10$LBAgtHdbWOJNCd/Qn9BIJuBwLlfGtz56lkIIo3oPyxhZfBe.XqBCS', NULL, 2, '2021-01-28 06:41:50', '2021-01-28 06:41:50'),
(25, 'gfgg', 'hgbhhg@gmail.com', NULL, '$2y$10$akQpQkpIwrgrJvPObcxpe.JRB1Chl4jsTO/RtuhWXXbsjWvp2j8yi', NULL, 2, '2021-01-28 15:40:49', '2021-01-28 15:40:49'),
(26, 'sumon', 'sumon@gmail.com', '2021-01-28 15:56:07', '$2y$10$aFMGpPk9CBobhCxiVI7icOQLKRwXEfDllf2lrbSKPGDyJNJX1u4jy', NULL, 2, '2021-01-28 15:45:47', '2021-01-28 15:56:07'),
(27, 'jakir', 'jakir@gmail.com', '2021-01-29 15:46:35', '$2y$10$wK/GpB/OeR5nFS6rq/KjvO1M1juCMYNhBL4KzaHBe2Qg.bc6TdWCK', NULL, 2, '2021-01-29 15:43:35', '2021-01-29 15:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_name_unique` (`coupon_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_q_s`
--
ALTER TABLE `fa_q_s`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_q_s`
--
ALTER TABLE `fa_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
