-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2020 at 12:46 PM
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
-- Database: `digitalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ac_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `ac_holder`, `ac_no`, `bank_name`, `short_name`, `branch`, `opening_balance`, `created_at`, `updated_at`) VALUES
(5, 'surender', '660892314567', 'State bank of india', 'SBI', 'Erode', 1000, '2020-06-21 02:04:10', '2020-06-21 02:04:10'),
(7, 'Test', '660892314568', 'KVB', 'KVB', 'Erode', 1500, '2020-06-21 02:08:42', '2020-06-21 02:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `bill_data`
--

DROP TABLE IF EXISTS `bill_data`;
CREATE TABLE IF NOT EXISTS `bill_data` (
  `billdata_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `box` int(11) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `loose_box` int(11) NOT NULL,
  `loose_kg` float NOT NULL,
  `net_weight` int(11) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `total_weight` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `net_value` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`billdata_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`billdata_id`, `bill_id`, `supplier_id`, `product_id`, `box`, `weight`, `loose_box`, `loose_kg`, `net_weight`, `discount`, `total_weight`, `price`, `net_value`, `created_at`, `updated_at`) VALUES
(45, 52, 8, 10, 10, '50', 10, 0, 0, 10, 0, '107', '48150', '2020-05-18 08:34:55', '2020-05-25 06:15:36'),
(44, 52, 8, 4, 20, '10', 0, 0, 0, 5, 0, '200', '38000', '2020-05-18 08:34:55', '2020-05-25 06:15:39'),
(43, 52, 8, 15, 10, '30', 0, 0, 0, 2, 0, '115', '33810', '2020-05-18 08:34:55', '2020-05-25 06:15:41'),
(42, 52, 8, 14, 15, '50', 0, 1, 0, 0, 0, '100', '75100', '2020-05-18 08:34:55', '2020-05-25 06:15:44'),
(41, 52, 8, 13, 10, '10', 0, 0, 0, 5, 0, '135', '12825', '2020-05-18 08:34:55', '2020-05-25 06:15:46'),
(40, 52, 8, 7, 10, '35', 0, 1, 0, 0, 0, '150', '53625', '2020-05-18 08:34:55', '2020-05-25 06:15:49'),
(51, 58, 1, 4, 10, '10', 0, 0, 0, 0, 0, '200', '20000', '2020-05-21 05:03:10', '2020-05-25 06:15:52'),
(50, 57, 1, 4, 10, '10', 0, 0, 0, 0, 0, '200', '20000', '2020-05-20 08:52:02', '2020-05-25 06:15:56'),
(49, 56, 1, 4, 10, '10', 0, 20.5, 0, 0, 0, '200', '20000', '2020-05-20 07:20:25', '2020-05-26 09:38:14'),
(48, 55, 8, 7, 10, '35', 0, 1.5, 0, 0, 0, '150', '52500', '2020-05-20 07:12:55', '2020-05-25 06:16:00'),
(47, 54, 1, 4, 10, '10', 0, 0, 0, 5, 0, '200', '19000', '2020-05-19 11:30:34', '2020-05-25 06:16:02'),
(46, 53, 8, 4, 10, '10', 0, 0, 0, 0, 0, '200', '20000', '2020-05-18 11:06:20', '2020-05-25 06:16:04'),
(52, 60, 1, 4, 10, '10', 1, 1, 100, 0, 117, '200', '23140', '2020-05-21 09:09:23', '2020-05-21 14:40:00'),
(53, 61, 1, 4, 10, '10', 0, 0, 100, 0, 100, '200', '20000', '2020-05-23 00:37:54', '2020-05-23 00:37:54'),
(54, 62, 1, 13, 5, '35', 0, 0, 175, 0, 175, '115', '20125', '2020-06-08 04:01:21', '2020-06-08 04:01:21'),
(55, 62, 1, 16, 2, '35', 1, 1, 70, 0, 81, '116', '9338', '2020-06-08 04:01:22', '2020-06-10 18:08:37'),
(56, 62, 1, 7, 0, '0', 0, 0, 0, 0, 6, '117', '702', '2020-06-08 04:01:22', '2020-06-08 04:01:22'),
(57, 62, 1, 14, 1, '35', 0, 0, 35, 0, 35, '118', '4130', '2020-06-08 04:01:22', '2020-06-08 04:01:22'),
(58, 62, 1, 17, 0, '0', 1, 1, 0, 0, 22, '350', '7700', '2020-06-08 04:01:22', '2020-06-08 04:01:22'),
(59, 63, 10, 4, 25, '35', 0, 0, 875, 5, 875, '107', '88944', '2020-06-08 04:26:47', '2020-06-08 04:26:47'),
(60, 63, 10, 18, 5, '35', 0, 0, 175, 5, 175, '107', '17789', '2020-06-08 04:26:48', '2020-06-08 04:26:48'),
(61, 63, 10, 19, 20, '35', 0, 0, 700, 5, 700, '107', '71155', '2020-06-08 04:26:48', '2020-06-08 04:26:48'),
(62, 63, 10, 20, 40, '35', 0, 0, 1400, 5, 1400, '94', '125020', '2020-06-08 04:26:48', '2020-06-08 04:26:48'),
(63, 63, 10, 14, 30, '35', 0, 0, 1050, 5, 1050, '59', '58853', '2020-06-08 04:26:48', '2020-06-08 04:26:48'),
(64, 2, 1, 4, 10, '35', 0, 0, 350, 18, 332, '200', '66400', '2020-06-16 02:41:54', '2020-06-16 02:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` int(11) NOT NULL,
  `opening_box` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `serial_no`, `name`, `short_name`, `city`, `phone`, `opening_balance`, `opening_box`, `status`, `created_at`, `updated_at`) VALUES
(22, 6, 'Siva', 'sk', 'salem', '1236547890', 2500, 250, 1, '2019-11-14 01:38:55', '2019-12-21 05:42:19'),
(23, 1, 'Admin', 'ad', 'Tiruchengode', '1236547890', 0, 0, 1, '2019-11-14 02:05:23', '2019-11-23 00:57:44'),
(27, 4, 'kumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-03 01:38:59', '2019-12-03 01:38:59'),
(28, 5, 'sivakumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-04 22:54:45', '2019-12-04 22:54:45'),
(29, 7, 'Murugan', 'smk', 'Erode', '9715686114', 0, 0, 1, '2019-12-04 23:27:01', '2019-12-04 23:37:09'),
(30, 2, 'test', 'TS', 'erode', '1236547890', 100000, 100, 1, '2019-12-05 03:54:54', '2019-12-05 03:55:44'),
(31, 8, 'Raj', 'Raj', 'salem', '1234567890', 50000, 0, 1, '2020-07-06 02:57:30', '2020-07-06 05:24:47'),
(32, 3, 'Demo', 'DE', 'salem', '1234567890', 1000, 100, 1, '2020-07-06 05:21:50', '2020-07-06 05:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer_rate_fixings`
--

DROP TABLE IF EXISTS `customer_rate_fixings`;
CREATE TABLE IF NOT EXISTS `customer_rate_fixings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `fixing_rate` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_rate_fixings`
--

INSERT INTO `customer_rate_fixings` (`id`, `customer_id`, `product_id`, `fixing_rate`, `created_at`, `updated_at`) VALUES
(1, 22, 4, 100, '2019-12-10 23:26:18', '2019-12-10 23:26:18'),
(2, 28, 7, 150, '2019-12-11 01:19:33', '2019-12-11 01:19:33'),
(3, 22, 14, 1000, '2020-05-22 10:38:36', '2020-05-22 10:38:36'),
(5, 23, 15, 1500, '2020-05-22 13:41:36', '2020-05-22 13:41:36'),
(6, 23, 4, 2000, '2020-05-22 13:42:10', '2020-05-22 13:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

DROP TABLE IF EXISTS `demos`;
CREATE TABLE IF NOT EXISTS `demos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, '2019_11_23_062545_create_bills_table', 13),
(17, '2019_11_28_042307_create_bills_table', 14),
(18, '2019_11_29_060653_create_demos_table', 15),
(19, '2019_12_06_062426_create_trips_table', 16),
(20, '2019_12_06_092322_create_sales_table', 17),
(21, '2019_12_09_074746_create_sales_products_table', 18),
(22, '2019_12_11_033028_create_customer_rate_fixings_table', 19),
(23, '2019_12_11_045317_create_customer_rate_fixings_table', 20),
(24, '2020_04_17_101609_create_set_trip_table', 21),
(25, '2020_05_08_085008_create_payments_table', 22),
(26, '2020_05_15_151929_create_bank__details_table', 22),
(27, '2020_05_16_065643_create_bank_details_table', 23),
(28, '2020_05_18_125953_create_paid_details_table', 24),
(29, '2020_05_22_121458_create_sales_paid_details_table', 25),
(30, '2020_06_11_152718_create_paid_details_table', 26),
(31, '2020_06_16_074657_create_purchases_table', 27),
(32, '2020_06_16_081457_create_purchases_products_table', 28),
(33, '2020_06_16_084649_create_sales_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `paid_details`
--

DROP TABLE IF EXISTS `paid_details`;
CREATE TABLE IF NOT EXISTS `paid_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` int(11) NOT NULL,
  `return_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_details`
--

INSERT INTO `paid_details` (`id`, `bill_id`, `date`, `supplier_id`, `customer_id`, `paid_amount`, `debit`, `return_box`, `note`, `bank_id`, `transfer_type`, `ref_no`, `balance`, `created_at`, `updated_at`) VALUES
(20, '2', '2020-06-24', 1, 0, '0', 1000, '0', 'No command', '7', '1', '123456789012', 10000, '2020-06-24 08:46:45', '2020-06-24 08:46:45'),
(19, '2', '2020-06-24', 1, 0, '0', 500, '1', 'No command', '5', '1', '123456789012', 10100, '2020-06-24 08:45:08', '2020-06-24 08:45:08'),
(15, '2', '2020-06-24', 1, 0, '0', 400, '1', 'No command', '5', '1', '123456789012', 600, '2020-06-24 08:35:17', '2020-06-24 08:35:17'),
(16, '2', '2020-06-24', 1, 0, '0', 500, '1', 'No command', '7', '1', '123456789012', 1000, '2020-06-24 08:37:03', '2020-06-24 08:37:03'),
(17, '2', '2020-06-24', 0, 22, '10000', 0, '1', 'No command', '5', '1', '123456789012', 10600, '2020-06-24 08:43:21', '2020-06-24 08:43:21'),
(18, '2', '2020-06-24', 0, 22, '10000', 0, '1', 'No command', '7', '1', '123456789012', 11000, '2020-06-24 08:44:19', '2020-06-24 08:44:19');

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sivabeec95@gmail.com', '$2y$10$tGbhhLoNLE5pZV.0O6RQL.ItH3Ri6KfgbNXNdOIPOjEBxqAWaoalm', '2019-12-21 04:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `product_group` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `product_group`, `unit_id`, `created_at`, `updated_at`) VALUES
(30, 'Ruba', '117', 2, 4, '2020-07-06 04:07:43', '2020-07-06 04:07:43'),
(29, 'Katlla', '116', 2, 4, '2020-07-06 04:07:13', '2020-07-06 04:07:13'),
(28, 'Roug', '115', 3, 4, '2020-07-06 04:06:41', '2020-07-06 04:06:41'),
(27, 'Fungus', '59', 3, 4, '2020-07-06 02:59:55', '2020-07-06 02:59:55'),
(26, 'RC', '94', 3, 4, '2020-07-06 02:59:26', '2020-07-06 02:59:26'),
(25, 'BIG G', '107', 3, 4, '2020-07-06 02:59:02', '2020-07-06 02:59:02'),
(24, 'BIG K', '107', 3, 4, '2020-07-06 02:58:50', '2020-07-06 02:58:50'),
(23, 'BIG R', '107', 3, 4, '2020-07-06 02:58:25', '2020-07-06 02:58:25'),
(22, 'BIG G', '100', 3, 6, '2020-07-01 06:24:53', '2020-07-01 06:24:53'),
(21, 'Jalebis', '200', 3, 1, '2020-07-01 06:08:56', '2020-07-01 06:08:56'),
(31, 'Rote', '350', 2, 6, '2020-07-06 04:08:11', '2020-07-06 04:08:11');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `product_group`, `created_at`, `updated_at`) VALUES
(3, 'TANK FISH', '2019-11-12 23:36:23', '2019-11-12 23:36:23'),
(2, 'SEA FISH', '2019-11-12 23:10:52', '2019-11-12 23:36:31'),
(9, 'Test', '2020-04-17 04:37:56', '2020-05-19 11:24:43'),
(10, 'Demo', '2020-05-19 11:24:48', '2020-05-19 11:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `trip_id` int(11) NOT NULL,
  `total_no_of_box` int(11) NOT NULL,
  `no_of_ice_bar` int(11) NOT NULL,
  `per_ice_bar` int(11) NOT NULL,
  `per_packing_price` int(11) NOT NULL,
  `today_box` int(11) NOT NULL,
  `balance_box` int(11) NOT NULL,
  `total_box` int(11) NOT NULL,
  `grass_amount` int(11) NOT NULL,
  `transport_charge` int(11) NOT NULL,
  `icebar_amount` int(11) NOT NULL,
  `packing_charge` int(11) NOT NULL,
  `excess` int(11) NOT NULL,
  `less` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `pre_balance` int(11) NOT NULL,
  `overall` int(11) NOT NULL,
  `amount_pending` int(11) NOT NULL,
  `box_pending` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `bill_no`, `supplier_id`, `date`, `trip_id`, `total_no_of_box`, `no_of_ice_bar`, `per_ice_bar`, `per_packing_price`, `today_box`, `balance_box`, `total_box`, `grass_amount`, `transport_charge`, `icebar_amount`, `packing_charge`, `excess`, `less`, `current_balance`, `pre_balance`, `overall`, `amount_pending`, `box_pending`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2020-06-16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(2, 2, 1, '2020-06-16', 1, 10, 3, 0, 0, 10, 0, 10, 66400, 0, 0, 0, 0, 0, 66400, 0, 66400, 64000, 0, '2020-06-16 02:41:54', '2020-06-16 02:41:54'),
(3, 3, 1, '2020-06-16', 1, 120, 40, 200, 30, 120, 10, 130, 361677, 0, 8000, 3600, 0, 0, 373277, 66400, 439677, 373277, 120, '2020-06-16 02:55:49', '2020-06-16 02:55:49'),
(8, 8, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 140, 155, 28400, 0, 0, 0, 0, 0, 28400, 536877, 565277, 28400, 15, '2020-07-01 06:09:33', '2020-07-01 06:09:33'),
(7, 7, 1, '2020-07-01', 3, 10, 3, 0, 0, 10, 130, 140, 49800, 0, 0, 0, 0, 0, 49800, 487077, 536877, 49800, 10, '2020-07-01 03:50:10', '2020-07-01 03:50:10'),
(6, 6, 1, '2020-06-16', 1, 10, 3, 0, 0, 10, 370, 380, 49800, 0, 0, 0, 0, 0, 49800, 1186231, 1236031, 49800, 10, '2020-06-16 06:00:59', '2020-06-16 06:00:59'),
(9, 8, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 140, 155, 28400, 0, 0, 0, 0, 0, 28400, 536877, 565277, 28400, 15, '2020-07-01 06:09:45', '2020-07-01 06:09:45'),
(10, 8, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 140, 155, 28400, 0, 0, 0, 0, 0, 28400, 536877, 565277, 28400, 15, '2020-07-01 06:10:00', '2020-07-01 06:10:00'),
(11, 11, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 185, 200, 28400, 0, 0, 0, 0, 0, 28400, 622077, 650477, 28400, 15, '2020-07-01 06:10:55', '2020-07-01 06:10:55'),
(12, 11, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 185, 200, 28400, 0, 0, 0, 0, 0, 28400, 622077, 650477, 28400, 15, '2020-07-01 06:11:31', '2020-07-01 06:11:31'),
(13, 13, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 215, 230, 30400, 0, 0, 0, 0, 0, 30400, 678877, 709277, 30400, 15, '2020-07-01 06:19:26', '2020-07-01 06:19:26'),
(14, 13, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 215, 230, 30400, 0, 0, 0, 0, 0, 30400, 678877, 709277, 30400, 15, '2020-07-01 06:19:38', '2020-07-01 06:19:38'),
(15, 13, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 215, 230, 30400, 0, 0, 0, 0, 0, 30400, 678877, 709277, 30400, 15, '2020-07-01 06:19:52', '2020-07-01 06:19:52'),
(16, 13, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 215, 230, 30400, 0, 0, 0, 0, 0, 30400, 678877, 709277, 30400, 15, '2020-07-01 06:19:55', '2020-07-01 06:19:55'),
(17, 13, 1, '2020-07-01', 3, 15, 3, 0, 0, 15, 215, 230, 30400, 0, 0, 0, 0, 0, 30400, 678877, 709277, 30400, 15, '2020-07-01 06:21:33', '2020-07-01 06:21:33'),
(18, 18, 1, '2020-07-01', 3, 16, 3, 0, 0, 16, 290, 306, 30900, 0, 0, 0, 0, 0, 30900, 830877, 861777, 30900, 16, '2020-07-01 06:25:29', '2020-07-01 06:25:29'),
(19, 19, 10, '2020-07-06', 3, 120, 40, 200, 30, 120, 0, 120, 361677, 0, 8000, 3600, 0, 0, 373277, 0, 373277, 373277, 120, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(20, 20, 1, '2020-07-06', 3, 22, 7, 200, 30, 22, 306, 328, 102696, 0, 1466, 660, 0, 0, 104822, 861777, 966599, 104822, 22, '2020-07-06 04:21:30', '2020-07-06 04:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_products`
--

DROP TABLE IF EXISTS `purchases_products`;
CREATE TABLE IF NOT EXISTS `purchases_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `box` int(11) NOT NULL,
  `weight` float NOT NULL,
  `loose_box` int(11) NOT NULL,
  `loose_kg` float NOT NULL,
  `net_weight` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_weight` int(11) NOT NULL,
  `price` float NOT NULL,
  `netvalue` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases_products`
--

INSERT INTO `purchases_products` (`id`, `bill_id`, `supplier_id`, `product_id`, `box`, `weight`, `loose_box`, `loose_kg`, `net_weight`, `discount`, `total_weight`, `price`, `netvalue`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 4, 25, 35, 0, 0, 875, 44, 831, 107, 88917, '2020-06-16 02:57:04', '2020-06-16 02:57:04'),
(2, 5, 1, 18, 5, 35, 0, 0, 175, 9, 166, 107, 17762, '2020-06-16 02:57:04', '2020-06-16 02:57:04'),
(6, 6, 1, 7, 10, 35, 0, 0, 350, 18, 332, 150, 49800, '2020-06-16 06:01:00', '2020-06-16 06:01:00'),
(5, 5, 1, 14, 30, 35, 1, 0, 1050, 53, 997, 59, 58823, '2020-06-16 02:57:04', '2020-06-16 02:57:04'),
(7, 7, 1, 7, 10, 35, 0, 0, 350, 18, 332, 150, 49800, '2020-07-01 03:50:11', '2020-07-01 03:50:11'),
(8, 12, 1, 21, 10, 10, 5, 5, 150, 8, 142, 200, 28400, '2020-07-01 06:11:32', '2020-07-01 06:11:32'),
(9, 17, 1, 21, 10, 10, 5, 5, 160, 8, 152, 200, 30400, '2020-07-01 06:21:33', '2020-07-01 06:21:33'),
(10, 18, 1, 22, 10, 30, 6, 25, 325, 16, 309, 100, 30900, '2020-07-01 06:25:29', '2020-07-01 06:25:29'),
(11, 19, 10, 25, 25, 35, 0, 0, 875, 44, 831, 107, 88917, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(12, 19, 10, 24, 5, 35, 0, 0, 175, 9, 166, 107, 17762, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(13, 19, 10, 25, 20, 35, 0, 0, 700, 35, 665, 107, 71155, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(14, 19, 10, 26, 40, 35, 0, 0, 1400, 70, 1330, 94, 125020, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(15, 19, 10, 27, 30, 35, 0, 0, 1050, 53, 997, 59, 58823, '2020-07-06 04:15:40', '2020-07-06 04:15:40'),
(16, 20, 1, 28, 10, 35, 0, 0, 350, 18, 332, 115, 38180, '2020-07-06 04:21:30', '2020-07-06 04:21:30'),
(17, 20, 1, 29, 5, 35, 0, 0, 175, 9, 166, 116, 19256, '2020-07-06 04:21:30', '2020-07-06 04:21:30'),
(18, 20, 1, 30, 2, 35, 0, 0, 70, 4, 66, 117, 7722, '2020-07-06 04:21:30', '2020-07-06 04:21:30'),
(19, 20, 1, 27, 2, 35, 0, 0, 70, 4, 66, 118, 7788, '2020-07-06 04:21:30', '2020-07-06 04:21:30'),
(20, 20, 1, 31, 3, 30, 0, 0, 90, 5, 85, 350, 29750, '2020-07-06 04:21:30', '2020-07-06 04:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `trip_id` int(11) NOT NULL,
  `total_no_of_box` int(11) NOT NULL,
  `today_box` int(11) NOT NULL,
  `balance_box` int(11) NOT NULL,
  `total_box` int(11) NOT NULL,
  `grass_amount` int(11) NOT NULL,
  `transport_charge` int(11) NOT NULL,
  `excess` int(11) NOT NULL,
  `less` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `pre_balance` int(11) NOT NULL,
  `overall` int(255) NOT NULL,
  `amount_pending` int(11) NOT NULL,
  `box_pending` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_no`, `customer_id`, `date`, `trip_id`, `total_no_of_box`, `today_box`, `balance_box`, `total_box`, `grass_amount`, `transport_charge`, `excess`, `less`, `current_balance`, `pre_balance`, `overall`, `amount_pending`, `box_pending`, `created_at`, `updated_at`) VALUES
(1, 0, 22, '2020-06-16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, NULL, NULL),
(2, 2, 22, '2020-06-16', 1, 10, 10, 250, 260, 350000, 0, 0, 0, 350000, 2502, 352502, 280000, 3, '2020-06-16 05:00:15', '2020-06-16 05:00:15'),
(3, 3, 23, '2020-06-16', 1, 15, 15, 0, 15, 962500, 0, 0, 0, 962500, 0, 962500, 962500, 15, '2020-06-16 10:08:27', '2020-06-16 10:08:27'),
(4, 4, 23, '2020-06-17', 1, 1, 1, 15, 16, 52500, 0, 0, 0, 52500, 962500, 1015000, 52500, 1, '2020-06-16 13:02:36', '2020-06-16 13:02:36'),
(5, 5, 23, '2020-06-17', 1, 3, 3, 16, 19, 105000, 0, 0, 0, 105000, 1015000, 1120000, 105000, 3, '2020-06-16 13:43:22', '2020-06-16 13:43:22'),
(6, 6, 23, '2020-06-17', 1, 1, 1, 19, 20, 37450, 0, 0, 0, 0, 1120000, 1157450, 0, 1, '2020-06-17 09:46:21', '2020-06-17 09:46:21'),
(7, 7, 22, '2020-06-19', 1, 1, 1, 10, 11, 35000, 0, 0, 0, 35000, 350002, 385002, 35000, 1, '2020-06-19 03:39:48', '2020-06-19 03:39:48'),
(8, 8, 22, '2020-06-28', 1, 1, 1, 254, 255, 3500, 0, 0, 0, 3500, 317502, 321002, 3500, 1, '2020-06-28 12:14:05', '2020-06-28 12:14:05'),
(9, 9, 22, '2020-07-01', 3, 3, 3, 5, 8, 6000, 0, 0, 0, 6000, 318502, 324502, 6000, 3, '2020-07-01 06:16:45', '2020-07-01 06:16:45'),
(10, 10, 22, '2020-07-01', 3, 3, 3, 8, 11, 7500, 0, 0, 0, 7500, 324502, 332002, 7500, 3, '2020-07-01 06:26:20', '2020-07-01 06:26:20'),
(11, 11, 29, '2020-07-06', 3, 10, 10, 0, 10, 41995, 0, 0, 0, 41995, 0, 41995, 41995, 10, '2020-07-06 04:26:54', '2020-07-06 04:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `sales_paid_details`
--

DROP TABLE IF EXISTS `sales_paid_details`;
CREATE TABLE IF NOT EXISTS `sales_paid_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_paid_details`
--

INSERT INTO `sales_paid_details` (`id`, `bill_id`, `date`, `paid_amount`, `return_box`, `note`, `created_at`, `updated_at`) VALUES
(1, '7', '2020-05-22', '1000', '0', 'No command', '2020-05-22 09:44:52', '2020-05-22 09:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

DROP TABLE IF EXISTS `sales_products`;
CREATE TABLE IF NOT EXISTS `sales_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loose_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loose_kg` float NOT NULL,
  `total_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `netvalue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sales_id`, `customer_id`, `product_id`, `box`, `weight`, `net_weight`, `loose_box`, `loose_kg`, `total_weight`, `price`, `netvalue`, `created_at`, `updated_at`) VALUES
(37, '11', '29', '31', '0', '30', '0', '1', 22, '22', '350', '7700', '2020-07-06 04:26:55', '2020-07-06 04:26:55'),
(36, '11', '29', '27', '1', '35', '35', '0', 0, '35', '118', '4130', '2020-07-06 04:26:55', '2020-07-06 04:26:55'),
(35, '11', '29', '30', '0', '35', '0', '0', 6, '6', '117', '702', '2020-07-06 04:26:55', '2020-07-06 04:26:55'),
(34, '11', '29', '29', '2', '35', '70', '1', 10.5, '80.5', '116', '9338', '2020-07-06 04:26:55', '2020-07-06 04:26:55'),
(33, '11', '29', '28', '5', '35', '175', '0', 0, '175', '115', '20125', '2020-07-06 04:26:55', '2020-07-06 04:26:55'),
(32, '10', '22', '22', '2', '30', '60', '1', 15, '75', '100', '7500', '2020-07-01 06:26:20', '2020-07-01 06:26:20'),
(31, '9', '22', '21', '3', '10', '30', '0', 0, '30', '200', '6000', '2020-07-01 06:16:45', '2020-07-01 06:16:45'),
(30, '8', '22', '4', '1', '35', '35', '0', 0, '35', '100', '3500', '2020-06-28 12:14:05', '2020-06-28 12:14:05'),
(28, '6', '23', '18', '1', '35', '35', '0', 0, '350', '107', '37450', '2020-06-17 09:46:21', '2020-06-17 09:46:21'),
(29, '7', '22', '4', '1', '35', '35', '0', 0, '350', '100', '35000', '2020-06-19 03:39:48', '2020-06-19 03:39:48'),
(26, '4', '23', '7', '1', '35', '35', '0', 0, '350', '150', '52500', '2020-06-16 13:02:36', '2020-06-16 13:02:36'),
(25, '3', '23', '7', '5', '35', '175', '0', 0, '1750', '150', '262500', '2020-06-16 10:08:27', '2020-06-16 10:08:27'),
(24, '3', '23', '4', '10', '35', '350', '0', 0, '3500', '200', '700000', '2020-06-16 10:08:27', '2020-06-16 10:08:27'),
(23, '2', '22', '4', '10', '35', '350', '0', 0, '3500', '100', '350000', '2020-06-16 05:00:15', '2020-06-16 05:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `set_trip`
--

DROP TABLE IF EXISTS `set_trip`;
CREATE TABLE IF NOT EXISTS `set_trip` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `set_trip` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_trip`
--

INSERT INTO `set_trip` (`id`, `set_trip`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2020-07-06 06:48:50');

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
  `opening_balance` int(11) NOT NULL,
  `opening_box` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `short_name`, `city`, `phone`, `opening_balance`, `opening_box`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NELLUR S', 'N.F.S', 'Nellur', '1236547890', 0, 0, 1, '2019-11-14 04:03:22', '2019-12-08 22:38:59'),
(8, 'TAGORE', 'VRC', 'Nellur', '1236547890', 100000, 500, 1, '2019-12-04 23:34:36', '2019-12-09 22:17:59'),
(9, 'testing', 'TS', 'Tiruchengode', '1236547890', 150000, 150, 1, '2019-12-09 22:15:58', '2019-12-09 22:15:58'),
(10, 'NELLUR', 'sk', 'Tiruchengode', '1236547890', 150000, 150, 1, '2019-12-10 04:34:07', '2019-12-10 04:34:07'),
(13, 'sivakumar', 'sk', 'salem', '1234567890', 1000, 100, 1, '2020-05-19 11:24:06', '2020-05-19 11:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_types`
--

DROP TABLE IF EXISTS `transfer_types`;
CREATE TABLE IF NOT EXISTS `transfer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_types`
--

INSERT INTO `transfer_types` (`id`, `types`, `created_at`, `updated_at`) VALUES
(1, 'bank', '2020-06-09 08:16:18', '2020-06-09 08:16:18'),
(2, 'Cheque', '2020-06-09 08:16:52', '2020-06-09 08:16:52'),
(3, 'cod', '2020-06-09 08:17:05', '2020-06-09 08:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `trip_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_name`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Trip 1', '2019-12-06', '2019-12-06 01:22:22', '2019-12-06 01:22:22'),
(3, 'Trip 3', '2020-04-17', '2020-04-17 04:38:49', '2020-04-17 04:38:49'),
(4, 'Trip 4', '2020-05-19', '2020-05-19 11:25:05', '2020-05-19 11:25:17');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, '10', '2019-11-14 00:08:39', '2019-12-21 04:03:22'),
(4, '35', '2019-11-19 01:22:19', '2019-12-21 04:03:31'),
(5, '50', '2019-12-04 23:29:51', '2019-12-21 04:03:41'),
(6, '30', '2019-12-04 23:30:03', '2019-12-21 04:03:50');

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
(1, 'siva', 'sivabeec95@gmail.com', NULL, '$2y$10$B8wlV3zfemOeAsDr/L06SOUppMGDL.hRxYKVEGFkz7QOTJpvYIo.O', NULL, '2019-10-10 23:20:52', '2019-12-21 03:23:47'),
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
