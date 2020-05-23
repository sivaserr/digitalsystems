-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2020 at 06:24 AM
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
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `bank_name`, `short_name`, `created_at`, `updated_at`) VALUES
(4, 'State bank of india', 'SBI', '2020-05-19 11:32:12', '2020-05-19 11:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` int(191) NOT NULL,
  `supplier_id` int(191) NOT NULL,
  `date` date NOT NULL,
  `trip_id` int(11) NOT NULL,
  `total_box` int(191) NOT NULL,
  `balance_box` int(11) NOT NULL,
  `overall_box` int(11) NOT NULL,
  `ice_bar` int(191) NOT NULL,
  `per_ice_bar` int(191) NOT NULL,
  `total_ice_bar` int(191) NOT NULL,
  `per_packing_price` int(191) NOT NULL,
  `transport_charge` int(191) NOT NULL,
  `total_icebar` int(191) NOT NULL,
  `less` int(191) NOT NULL,
  `packing_charge` int(191) NOT NULL,
  `excess` int(191) NOT NULL,
  `current_balance` int(191) NOT NULL,
  `pre_balance` int(11) NOT NULL,
  `overall` int(191) NOT NULL,
  `amount_pending` int(191) NOT NULL,
  `box_pending` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_no`, `supplier_id`, `date`, `trip_id`, `total_box`, `balance_box`, `overall_box`, `ice_bar`, `per_ice_bar`, `total_ice_bar`, `per_packing_price`, `transport_charge`, `total_icebar`, `less`, `packing_charge`, `excess`, `current_balance`, `pre_balance`, `overall`, `amount_pending`, `box_pending`, `created_at`, `updated_at`) VALUES
(45, 0, 0, '2020-05-17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(52, 46, 8, '2020-05-18', 1, 75, 0, 0, 25, 10, 250, 150, 500, 250, 510, 11250, 0, 261510, 0, 373000, 261510, 0, '2020-05-18 08:34:54', '2020-05-18 08:34:54'),
(53, 53, 8, '2020-05-18', 1, 10, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0, 281510, 20000, 0, '2020-05-18 11:06:20', '2020-05-18 11:06:20'),
(54, 54, 1, '2020-05-19', 3, 10, 0, 0, 3, 0, 0, 150, 500, 0, 0, 1500, 0, 19000, 0, 21000, 21000, 0, '2020-05-19 11:30:34', '2020-05-19 11:30:34'),
(55, 55, 8, '2020-05-20', 3, 10, 0, 0, 3, 0, 0, 0, 0, 0, 4010, 0, 0, 52500, 0, 52500, 52500, 0, '2020-05-20 07:12:55', '2020-05-20 07:12:55'),
(56, 56, 1, '2020-05-20', 3, 11, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0, 39000, 20000, 0, '2020-05-20 07:20:25', '2020-05-20 07:20:25'),
(57, 57, 1, '2020-05-20', 3, 10, 21, 31, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 1000, 59000, 10000, 5, '2020-05-20 08:52:02', '2020-05-20 08:52:02'),
(58, 58, 1, '2020-05-21', 3, 10, 31, 41, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 59000, 79000, 5000, 0, '2020-05-21 05:03:10', '2020-05-21 05:03:10'),
(59, 59, 1, '2020-05-21', 3, 11, 41, 52, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20300, 79000, 99300, 20300, 11, '2020-05-21 09:07:00', '2020-05-21 09:07:00'),
(60, 60, 1, '2020-05-21', 3, 11, 52, 63, 3, 0, 0, 0, 0, 0, 0, 0, 0, 23140, 99300, 122440, 23140, 11, '2020-05-21 09:09:23', '2020-05-21 09:09:23'),
(61, 61, 1, '2020-05-23', 3, 10, 63, 73, 3, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 122440, 142440, 20000, 10, '2020-05-23 00:37:54', '2020-05-23 00:37:54');

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
  `net_weight` int(11) NOT NULL,
  `loose_box` int(11) NOT NULL,
  `loose_kg` int(11) NOT NULL,
  `overall_weight` int(11) NOT NULL,
  `per_kg_price` decimal(10,0) NOT NULL,
  `actual_price` decimal(10,0) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `discount_price` decimal(10,0) DEFAULT '0',
  `net_value` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`billdata_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`billdata_id`, `bill_id`, `supplier_id`, `product_id`, `box`, `weight`, `net_weight`, `loose_box`, `loose_kg`, `overall_weight`, `per_kg_price`, `actual_price`, `discount`, `discount_price`, `net_value`, `created_at`, `updated_at`) VALUES
(45, 52, 8, 10, 10, '50', 0, 500, 0, 0, '107', '53500', 10, '5350', '48150', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(44, 52, 8, 4, 20, '10', 0, 200, 0, 0, '200', '40000', 5, '2000', '38000', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(43, 52, 8, 15, 10, '30', 0, 300, 0, 0, '115', '34500', 2, '690', '33810', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(42, 52, 8, 14, 15, '50', 0, 750, 1, 0, '100', '75100', 0, '0', '75100', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(41, 52, 8, 13, 10, '10', 0, 100, 0, 0, '135', '13500', 5, '675', '12825', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(40, 52, 8, 7, 10, '35', 0, 350, 1, 0, '150', '53625', 0, '0', '53625', '2020-05-18 08:34:55', '2020-05-18 08:34:55'),
(51, 58, 1, 4, 10, '10', 0, 100, 0, 0, '200', '20000', 0, '0', '20000', '2020-05-21 05:03:10', '2020-05-21 05:03:10'),
(50, 57, 1, 4, 10, '10', 0, 100, 0, 0, '200', '20000', 0, '0', '20000', '2020-05-20 08:52:02', '2020-05-20 08:52:02'),
(49, 56, 1, 4, 10, '10', 0, 100, 1, 0, '200', '20000', 0, '0', '20000', '2020-05-20 07:20:25', '2020-05-20 07:20:25'),
(48, 55, 8, 7, 10, '35', 0, 350, 0, 0, '150', '52500', 0, '0', '52500', '2020-05-20 07:12:55', '2020-05-20 07:12:55'),
(47, 54, 1, 4, 10, '10', 0, 100, 0, 0, '200', '20000', 5, '1000', '19000', '2020-05-19 11:30:34', '2020-05-19 11:30:34'),
(46, 53, 8, 4, 10, '10', 0, 100, 0, 0, '200', '20000', 0, '0', '20000', '2020-05-18 11:06:20', '2020-05-18 11:06:20'),
(52, 60, 1, 4, 10, '10', 100, 1, 1, 117, '200', '23140', 0, '0', '23140', '2020-05-21 09:09:23', '2020-05-21 14:40:00'),
(53, 61, 1, 4, 10, '10', 100, 0, 0, 100, '200', '20000', 0, '0', '20000', '2020-05-23 00:37:54', '2020-05-23 00:37:54');

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
  `opening_balance` int(11) NOT NULL,
  `opening_box` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `short_name`, `city`, `phone`, `opening_balance`, `opening_box`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Siva', 'sk', 'salem', '1236547890', 2500, 250, 1, '2019-11-14 01:38:55', '2019-12-21 05:42:19'),
(23, 'Admin', 'ad', 'Tiruchengode', '1236547890', 0, 0, 1, '2019-11-14 02:05:23', '2019-11-23 00:57:44'),
(27, 'kumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-03 01:38:59', '2019-12-03 01:38:59'),
(28, 'sivakumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-04 22:54:45', '2019-12-04 22:54:45'),
(29, 'Murugan', 'smk', 'Erode', '9715686114', 0, 0, 1, '2019-12-04 23:27:01', '2019-12-04 23:37:09'),
(30, 'test', 'TS', 'erode', '1236547890', 100000, 100, 1, '2019-12-05 03:54:54', '2019-12-05 03:55:44');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_rate_fixings`
--

INSERT INTO `customer_rate_fixings` (`id`, `customer_id`, `product_id`, `fixing_rate`, `created_at`, `updated_at`) VALUES
(1, 22, 4, 100, '2019-12-10 23:26:18', '2019-12-10 23:26:18'),
(2, 28, 7, 150, '2019-12-11 01:19:33', '2019-12-11 01:19:33'),
(3, 22, 14, 1000, '2020-05-22 10:38:36', '2020-05-22 10:38:36'),
(4, 22, 7, 2000, '2020-05-22 13:39:18', '2020-05-22 13:39:18'),
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(29, '2020_05_22_121458_create_sales_paid_details_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `paid_details`
--

DROP TABLE IF EXISTS `paid_details`;
CREATE TABLE IF NOT EXISTS `paid_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_details`
--

INSERT INTO `paid_details` (`id`, `bill_id`, `date`, `paid_amount`, `return_box`, `note`, `created_at`, `updated_at`) VALUES
(48, '58', '2020-05-22', '4000', '3', 'Pending paid', '2020-05-21 05:09:46', '2020-05-21 05:09:46'),
(47, '58', '2020-05-21', '16000', '7', 'No command', '2020-05-21 05:07:28', '2020-05-21 05:07:28');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `product_group`, `unit_id`, `created_at`, `updated_at`) VALUES
(4, 'BIG R', '200', 3, 1, '2019-11-12 00:31:37', '2019-11-12 03:52:46'),
(7, 'RUBA-ருபா (35KG)', '150', 3, 4, '2019-11-13 02:07:46', '2019-11-13 02:07:46'),
(10, 'jalebis', '107', 2, 5, '2019-11-14 00:53:46', '2019-11-14 00:53:46'),
(13, 'ROGU ரோகு', '135', 3, 1, '2019-12-04 23:33:13', '2019-12-04 23:49:58'),
(14, 'FUNGAS பங்கஷ்', '100', 3, 5, '2019-12-04 23:41:27', '2019-12-04 23:41:27'),
(15, 'MEDIUM ROGU', '115', 3, 6, '2019-12-04 23:42:17', '2019-12-04 23:42:17');

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
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_no` int(191) NOT NULL,
  `customer_id` int(191) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_id` int(11) NOT NULL,
  `total_box` int(191) NOT NULL,
  `loose_box` int(191) NOT NULL,
  `balance_box` int(11) NOT NULL,
  `ovarall_box` int(191) NOT NULL,
  `current_balance` int(191) NOT NULL,
  `previous_balance` int(191) NOT NULL,
  `overall_balance` int(191) NOT NULL,
  `amount_pending` int(11) NOT NULL,
  `box_pending` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_no`, `customer_id`, `date`, `trip_id`, `total_box`, `loose_box`, `balance_box`, `ovarall_box`, `current_balance`, `previous_balance`, `overall_balance`, `amount_pending`, `box_pending`, `created_at`, `updated_at`) VALUES
(1, 0, 22, '', 0, 20, 1, 0, 1000, 1000, 1, 1000, 0, 0, NULL, NULL),
(2, 0, 22, '', 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, NULL, NULL),
(3, 0, 23, '09-12-2019', 0, 10, 1, 0, 11, 6200, 1, 6200, 6200, 0, '2019-12-09 04:45:18', '2019-12-09 04:45:18'),
(4, 0, 23, '09-12-2019', 0, 10, 1, 0, 11, 6200, 1, 6200, 6200, 0, '2019-12-09 04:46:32', '2019-12-09 04:46:32'),
(5, 0, 23, '09-12-2019', 0, 10, 1, 0, 11, 6200, 1, 6200, 6200, 0, '2019-12-09 04:47:04', '2019-12-09 04:47:04'),
(6, 1, 23, '09-12-2019', 0, 10, 1, 0, 11, 6200, 1, 6200, 6200, 0, '2019-12-09 04:52:14', '2019-12-09 04:52:14'),
(7, 22, 27, '10-12-2019', 0, 10, 1, 0, 11, 6200, 1, 6200, 5200, 0, '2019-12-09 21:56:23', '2019-12-09 21:56:23');

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
  `loose_kg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `netvalue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sales_id`, `customer_id`, `product_id`, `box`, `weight`, `net_weight`, `loose_box`, `loose_kg`, `total_weight`, `price`, `netvalue`, `created_at`, `updated_at`) VALUES
(1, '1', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL),
(2, '1', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL),
(3, '5', '23', '4', '10', '3', '30', '1', '1', '31', '200', '6200', '2019-12-09 04:47:04', '2019-12-09 04:47:04'),
(4, '6', '23', '4', '10', '3', '30', '1', '1', '31', '200', '6200', '2019-12-09 04:52:14', '2019-12-09 04:52:14'),
(5, '7', '27', '4', '10', '3', '30', '1', '1', '31', '200', '6200', '2019-12-09 21:56:23', '2019-12-09 21:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `set_trip`
--

DROP TABLE IF EXISTS `set_trip`;
CREATE TABLE IF NOT EXISTS `set_trip` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `set_trip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_trip`
--

INSERT INTO `set_trip` (`id`, `set_trip`, `created_at`, `updated_at`) VALUES
(1, '3', NULL, '2020-05-19 11:25:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
