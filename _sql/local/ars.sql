-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2019 at 04:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_box` int(11) NOT NULL,
  `ice_bar` int(11) NOT NULL,
  `per_ice_bar` int(11) NOT NULL,
  `total_ice_bar` int(11) NOT NULL,
  `per_packing_price` int(11) NOT NULL,
  `transport_charge` int(11) NOT NULL,
  `total_icebar` int(11) NOT NULL,
  `less` int(11) NOT NULL,
  `packing_charge` int(11) NOT NULL,
  `excess` int(11) NOT NULL,
  `previous_balance` int(11) NOT NULL,
  `overall` int(11) NOT NULL,
  `customer_pending` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_no`, `customer_id`, `date`, `total_box`, `ice_bar`, `per_ice_bar`, `total_ice_bar`, `per_packing_price`, `transport_charge`, `total_icebar`, `less`, `packing_charge`, `excess`, `previous_balance`, `overall`, `customer_pending`, `created_at`, `updated_at`) VALUES
(1, '#', '7', '23/11/2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-23 00:56:29', '2019-11-23 00:56:29'),
(2, '#', '10', '23/11/2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-23 00:58:04', '2019-11-23 00:58:04'),
(3, '26', '7', '22/11/2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-23 01:01:48', '2019-11-23 01:01:48'),
(4, '22', '7', '23/11/2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-23 01:03:51', '2019-11-23 01:03:51'),
(5, '5', '22', '20/11/2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-11-23 01:05:37', '2019-11-23 01:05:37'),
(6, '1', '26', '12-5-2019', 20, 7, 100, 667, 150, 500, 667, 167, 3000, 6000, 0, 143000, 143000, '2019-11-30 03:43:31', '2019-11-30 03:43:31'),
(7, '1', '26', '12-5-2019', 20, 7, 100, 667, 150, 500, 667, 167, 3000, 6000, 0, 143000, 143000, '2019-11-30 04:50:00', '2019-11-30 04:50:00'),
(8, '111', '26', '12-5-2019', 20, 7, 100, 667, 150, 500, 667, 167, 3000, 6000, 0, 109750, 109750, '2019-11-30 04:59:06', '2019-11-30 04:59:06'),
(9, '11', '26', '12-5-2019', 20, 7, 100, 667, 150, 500, 667, 167, 3000, 6000, 0, 143000, 143000, '2019-11-30 05:05:05', '2019-11-30 05:05:05'),
(10, '111', '22', '12-5-2019', 40, 13, 100, 1333, 150, 500, 1333, 167, 6000, 6000, 0, 246416, 246416, '2019-12-01 01:59:26', '2019-12-01 01:59:26'),
(11, '111', '22', '12-5-2019', 40, 13, 100, 1333, 150, 500, 1333, 167, 6000, 6000, 0, 246416, 246416, '2019-12-01 02:01:43', '2019-12-01 02:01:43'),
(12, '111', '22', '12-5-2019', 40, 13, 100, 1333, 150, 500, 1333, 167, 6000, 6000, 0, 246416, 246416, '2019-12-01 02:07:10', '2019-12-01 02:07:10'),
(13, '13', '22', '13-5-2019', 40, 13, 100, 1333, 150, 500, 1333, 167, 6000, 6000, 0, 221566, 221566, '2019-12-01 02:18:33', '2019-12-01 02:18:33'),
(14, '111', '23', '13-5-2019', 50, 17, 100, 1667, 150, 500, 1667, 167, 7500, 6000, 0, 289077, 289077, '2019-12-01 02:23:14', '2019-12-01 02:23:14'),
(15, '12', '23', '12-5-2019', 40, 13, 100, 1333, 150, 500, 1333, 167, 6000, 6000, 0, 184571, 184571, '2019-12-01 02:25:02', '2019-12-01 02:25:02'),
(16, '12', '23', '12-5-2019', 30, 10, 100, 1000, 150, 500, 1000, 167, 4500, 6000, 0, 201708, 201708, '2019-12-01 02:27:41', '2019-12-01 02:27:41'),
(17, '20', '26', '18-11-2019', 30, 10, 100, 1000, 150, 500, 1000, 167, 4500, 6000, 0, 164083, 164083, '2019-12-01 02:44:37', '2019-12-01 02:44:37'),
(18, '44', '26', '12-5-2019', 20, 7, 100, 667, 150, 500, 667, 167, 3000, 6000, 0, 143000, 143000, '2019-12-01 03:14:07', '2019-12-01 03:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `bill_data`
--

DROP TABLE IF EXISTS `bill_data`;
CREATE TABLE IF NOT EXISTS `bill_data` (
  `billproduct_id` int(255) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `billproductname` varchar(255) NOT NULL,
  `box` int(255) NOT NULL,
  `loosekg` int(255) NOT NULL,
  `totalweight` int(255) NOT NULL,
  `perkgprices` int(255) NOT NULL,
  `actualprice` int(255) NOT NULL,
  `discount` int(255) DEFAULT NULL,
  `discountprice` int(255) NOT NULL,
  `netvalue` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`billproduct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`billproduct_id`, `bill_id`, `customer_id`, `billproductname`, `box`, `loosekg`, `totalweight`, `perkgprices`, `actualprice`, `discount`, `discountprice`, `netvalue`, `created_at`, `updated_at`) VALUES
(1, 0, 3, '2', 10, 100, 1000, 1000, 100000, 100, 100, 100000, '2019-12-01 07:36:59', '2019-12-01 07:36:59'),
(2, 0, 22, '4', 20, 35, 700, 200, 140000, 5, 7000, 133000, '2019-12-01 02:07:10', '2019-12-01 02:07:10'),
(3, 0, 22, '7', 20, 35, 700, 150, 105000, 5, 5250, 99750, '2019-12-01 02:07:10', '2019-12-01 02:07:10'),
(4, 0, 22, '4', 20, 35, 700, 200, 140000, 5, 7000, 133000, '2019-12-01 02:18:34', '2019-12-01 02:18:34'),
(5, 0, 22, '10', 20, 35, 700, 107, 74900, 0, 0, 74900, '2019-12-01 02:18:34', '2019-12-01 02:18:34'),
(6, 0, 23, '4', 20, 35, 700, 200, 140000, 5, 7000, 133000, '2019-12-01 02:23:14', '2019-12-01 02:23:14'),
(7, 0, 23, '7', 20, 35, 700, 150, 105000, 0, 0, 105000, '2019-12-01 02:23:14', '2019-12-01 02:23:14'),
(8, 0, 23, '10', 10, 35, 350, 107, 37450, 5, 1873, 35578, '2019-12-01 02:23:14', '2019-12-01 02:23:14'),
(9, 0, 23, '7', 20, 35, 700, 150, 105000, 5, 5250, 99750, '2019-12-01 02:25:02', '2019-12-01 02:25:02'),
(10, 0, 23, '10', 20, 35, 700, 107, 74900, 5, 3745, 71155, '2019-12-01 02:25:02', '2019-12-01 02:25:02'),
(11, 0, 23, '4', 20, 35, 700, 200, 140000, 0, 0, 140000, '2019-12-01 02:27:41', '2019-12-01 02:27:41'),
(12, 0, 23, '7', 10, 35, 350, 150, 52500, 5, 2625, 49875, '2019-12-01 02:27:41', '2019-12-01 02:27:41'),
(13, 18, 26, '4', 20, 35, 700, 200, 140000, 5, 7000, 133000, '2019-12-01 03:14:07', '2019-12-01 03:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `short_name`, `city`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(26, 'demo', 'DM', 'erode', '123-65-478', 1, '2019-11-23 00:59:23', '2019-11-23 00:59:23'),
(22, 'siva', 'sk', 'salem', '1236547890', 1, '2019-11-14 01:38:55', '2019-11-18 01:14:03'),
(23, 'Admin', 'ad', 'Tiruchengode', '1236547890', 1, '2019-11-14 02:05:23', '2019-11-23 00:57:44'),
(24, 'siva', 'sk', 'Tiruchengode', '1236547890', 0, '2019-11-14 02:44:07', '2019-11-30 07:00:17'),
(25, 'test', 'ts', 'Tiruchengode', '1236547890', 0, '2019-11-18 01:10:38', '2019-11-19 01:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_11_070855_create_students_table', 2),
(4, '2019_10_12_073250_create_posts_table', 3),
(5, '2019_10_14_070340_create_students_table', 4),
(6, '2019_10_31_062610_add_extra_field_to_users_table', 5),
(7, '2019_11_01_042541_create_customer_table', 6),
(8, '2019_11_01_080409_create_vehicle_information_table', 7),
(9, '2019_11_11_083629_create_product_table', 7),
(10, '2019_11_11_091216_create_products_table', 8),
(11, '2019_11_12_043031_create_bills_table', 9),
(12, '2019_11_13_034211_create_product_group_table', 9),
(13, '2019_11_14_034251_create_unit_table', 10),
(14, '2019_11_14_053028_create_units_table', 11),
(15, '2019_11_14_091653_create_suppliers_table', 12),
(16, '2019_11_23_062545_create_bills_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_group` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `weight`, `net_weight`, `product_group`, `unit_id`, `created_at`, `updated_at`) VALUES
(4, 'BIG R', '200', '35', '1000', 3, 3, '2019-11-12 00:31:37', '2019-11-12 03:52:46'),
(7, 'RUBA-ருபா (35KG)', '150', '35', '100', 3, 1, '2019-11-13 02:07:46', '2019-11-13 02:07:46'),
(10, 'jalebis', '107', '35', '875', 2, 3, '2019-11-14 00:53:46', '2019-11-14 00:53:46'),
(11, 'gft', '107', '35', '875', 7, 1, '2019-11-14 01:27:09', '2019-11-14 01:27:09'),
(12, 'test', '590', '600', '875', 2, 3, '2019-11-18 04:41:58', '2019-11-18 04:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

DROP TABLE IF EXISTS `product_group`;
CREATE TABLE IF NOT EXISTS `product_group` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `product_group`, `created_at`, `updated_at`) VALUES
(3, 'TANK FISH', '2019-11-12 23:36:23', '2019-11-12 23:36:23'),
(2, 'SEA FISH', '2019-11-12 23:10:52', '2019-11-12 23:36:31'),
(7, 'test', '2019-11-13 23:40:31', '2019-11-13 23:40:31'),
(8, 'demo', '2019-11-19 01:22:03', '2019-11-19 01:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `short_name`, `city`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'NELLUR S', 'N.F.S', 'Nellur', '1236547890', '2019-11-14 04:03:22', '2019-11-14 04:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, '10 KG', '2019-11-14 00:08:39', '2019-11-14 00:21:48'),
(3, '1 KG', '2019-11-14 00:30:17', '2019-11-14 00:30:17'),
(4, '35 KG', '2019-11-19 01:22:19', '2019-11-19 01:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'siva', 'sivabeec95@gmail.com', NULL, '$2y$10$JIV0sqGG02jXXi6XNCI/n.yOBdeWUXve5oHL1asCYhCNxeh4OtOYG', NULL, '2019-10-10 23:20:52', '2019-10-10 23:20:52'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$wy8uOFSXHHKV835jqKe1jO/sQD3PiCzCiLBYTpJ3hxhcp0gyjABRW', NULL, '2019-10-31 01:18:42', '2019-10-31 01:18:42'),
(3, 'kathir', 'kathirkarthik5@gmail.com', NULL, '$2y$10$bHXZ1PYV4c6pzNZqD1B.4e.LqcYr42EsI1PMhCEsh04seruBy/5kS', NULL, '2019-11-07 16:55:50', '2019-11-07 16:55:50'),
(4, 'Altius', 'ramesh@gmail.com', NULL, '$2y$10$XD4kPnOWdxYfQSBqm3.fmey1nGSO/vubyphXfaK8FS6fQK8QAvznO', NULL, '2019-11-07 17:20:01', '2019-11-07 17:20:01'),
(8, 'Admin', 'admins@gmail.com', NULL, '$2y$10$l.1lIUuC7sCQfbkj4uRib.94CkmFgZQZ3OkNJlUbsxtvbZ.tEcxgu', NULL, '2019-11-09 18:08:45', '2019-11-09 18:08:45'),
(7, 'test', 'test@gmail.com', NULL, '$2y$10$v7BAffWJ6WNh28.cmU8eI.XSfRjC/Y1c1BRelioqiWPcd5lGKB.KW', NULL, '2019-11-08 17:21:05', '2019-11-08 17:21:05'),
(9, 'Anandha', 'durai.anandha@gmail.com', NULL, '$2y$10$fSpNkBTl/xwnfiiUMdZGw.EcB/QD6NNiONBoxA.a30wckKJbjAhXm', 'lS8JrmyHvAKOtegK8Amov0lYmc8V44KRq2S2wFV98tNlUxGWOwy4jUTVnhCx', '2019-11-09 18:10:26', '2019-11-09 18:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_information`
--

DROP TABLE IF EXISTS `vehicle_information`;
CREATE TABLE IF NOT EXISTS `vehicle_information` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
