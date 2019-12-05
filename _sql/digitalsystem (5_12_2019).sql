-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2019 at 10:42 AM
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
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` int(191) NOT NULL,
  `supplier_id` int(191) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_box` int(191) NOT NULL,
  `ice_bar` int(191) NOT NULL,
  `per_ice_bar` int(191) NOT NULL,
  `total_ice_bar` int(191) NOT NULL,
  `per_packing_price` int(191) NOT NULL,
  `transport_charge` int(191) NOT NULL,
  `total_icebar` int(191) NOT NULL,
  `less` int(191) NOT NULL,
  `packing_charge` int(191) NOT NULL,
  `excess` int(191) NOT NULL,
  `previous_balance` int(191) NOT NULL,
  `overall` int(191) NOT NULL,
  `customer_pending` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_no`, `supplier_id`, `date`, `total_box`, `ice_bar`, `per_ice_bar`, `total_ice_bar`, `per_packing_price`, `transport_charge`, `total_icebar`, `less`, `packing_charge`, `excess`, `previous_balance`, `overall`, `customer_pending`, `created_at`, `updated_at`) VALUES
(3, 2, 23, '20/11/2019', 20, 7, 10, 67, 2, 10, 67, 163, 40, 100, 0, 116428, 116428, '2019-11-27 23:22:22', '2019-11-27 23:22:22'),
(2, 1, 22, '23/11/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 600, 0, 67000, 67000, '2019-11-27 23:20:46', '2019-11-27 23:20:46'),
(4, 1, 26, '20/11/2019', 20, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 116375, 116375, '2019-11-27 23:25:24', '2019-11-27 23:25:24'),
(17, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:33:43', '2019-12-01 22:33:43'),
(16, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:31:57', '2019-12-01 22:31:57'),
(15, 88, 26, '23/11/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 100, 0, 66500, 66500, '2019-11-29 03:51:12', '2019-11-29 03:51:12'),
(14, 8890, 22, '23/11/2019', 10, 3, 10, 33, 10, 10, 33, 163, 100, 100, 0, 66580, 66580, '2019-11-29 02:10:45', '2019-11-29 02:10:45'),
(13, 889, 26, '23/11/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 100, 0, 66500, 66500, '2019-11-29 02:09:53', '2019-11-29 02:09:53'),
(12, 889, 26, '23/11/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 100, 0, 66500, 66500, '2019-11-29 02:08:51', '2019-11-29 02:08:51'),
(18, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:34:59', '2019-12-01 22:34:59'),
(19, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:35:19', '2019-12-01 22:35:19'),
(20, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:35:38', '2019-12-01 22:35:38'),
(21, 88, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 20, 100, 0, 99783, 99783, '2019-12-01 22:37:05', '2019-12-01 22:37:05'),
(22, 889, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 1, 20, 100, 0, 140196, 140196, '2019-12-01 23:25:44', '2019-12-01 23:25:44'),
(23, 889, 26, '23/11/2019', 10, 7, 10, 67, 2, 10, 67, 163, 40, 100, 0, 52553, 52553, '2019-12-01 23:29:16', '2019-12-01 23:29:16'),
(24, 5, 26, '23/11/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 100, 0, 52500, 52500, '2019-12-02 02:50:15', '2019-12-02 02:50:15'),
(25, 6, 26, '04/12/2019', 20, 7, 10, 67, 2, 10, 67, 163, 40, 100, 0, 116428, 116428, '2019-12-03 21:58:43', '2019-12-03 21:58:43'),
(26, 7, 26, '30/11/2019', 20, 7, 10, 67, 2, 10, 67, 163, 40, 100, 0, 140053, 140053, '2019-12-03 21:59:41', '2019-12-03 21:59:41'),
(27, 8, 27, '04-12-2019', 40, 13, 10, 133, 2, 10, 133, 163, 80, 100, 0, 189562, 189562, '2019-12-04 01:24:44', '2019-12-04 01:24:44'),
(28, 9, 22, '2019-12-04', 10, 3, 10, 33, 10, 10, 33, 0, 100, 357, 0, 53000, 53000, '2019-12-04 01:37:54', '2019-12-04 01:37:54'),
(29, 9, 26, '04/12/2019', 10, 3, 10, 33, 2, 10, 33, 163, 20, 100, 0, 37450, 37450, '2019-12-04 01:57:02', '2019-12-04 01:57:02'),
(30, 10, 26, '2019-12-04', 20, 7, 10, 67, 10, 10, 67, 1, 200, 49, 0, 120200, 120200, '2019-12-04 04:19:44', '2019-12-04 04:19:44'),
(31, 11, 26, '04-12-2019', 10, 3, 10, 33, 2, 0, 33, 0, 20, 100, 0, 52653, 52653, '2019-12-04 04:23:24', '2019-12-04 04:23:24'),
(32, 12, 22, '04-12-2019', 20, 7, 10, 67, 20, 10, 67, 62, 400, 0, 67000, 136500, 136500, '2019-12-04 23:19:49', '2019-12-04 23:19:49'),
(33, 13, 29, '05-12-2019', 462, 154, 200, 30800, 30, 0, 30800, 0, 13860, 0, 135256, 1467228, 1467228, '2019-12-05 00:03:24', '2019-12-05 00:03:24'),
(34, 14, 8, '05-12-2019', 10, 3, 10, 33, 2, 10, 33, 0, 20, 0, 0, 35063, 35063, '2019-12-05 04:44:48', '2019-12-05 04:44:48');

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
  `per_kg_price` decimal(10,0) NOT NULL,
  `actual_price` decimal(10,0) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `discount_price` decimal(10,0) DEFAULT '0',
  `net_value` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`billdata_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`billdata_id`, `bill_id`, `supplier_id`, `product_id`, `box`, `weight`, `net_weight`, `per_kg_price`, `actual_price`, `discount`, `discount_price`, `net_value`, `created_at`, `updated_at`) VALUES
(1, 21, 26, 7, 10, '35', 350, '150', '52500', 5, '2625', '49875', '2019-12-01 22:37:05', '2019-12-01 22:37:05'),
(2, 22, 26, 4, 10, '35', 350, '200', '70000', 0, '0', '70000', '2019-12-01 23:25:44', '2019-12-01 23:25:44'),
(3, 23, 26, 7, 10, '35', 350, '150', '52500', 0, '0', '52500', '2019-12-01 23:29:16', '2019-12-01 23:29:16'),
(4, 24, 26, 7, 10, '35', 350, '150', '52500', 0, '0', '52500', '2019-12-02 02:50:15', '2019-12-02 02:50:15'),
(5, 25, 26, 4, 10, '35', 350, '200', '70000', 5, '3500', '66500', '2019-12-03 21:58:43', '2019-12-03 21:58:43'),
(6, 25, 26, 7, 10, '35', 350, '150', '52500', 5, '2625', '49875', '2019-12-03 21:58:43', '2019-12-03 21:58:43'),
(7, 26, 26, 4, 10, '35', 350, '200', '70000', 0, '0', '70000', '2019-12-03 21:59:41', '2019-12-03 21:59:41'),
(8, 26, 26, 4, 10, '35', 350, '200', '70000', 0, '0', '70000', '2019-12-03 21:59:41', '2019-12-03 21:59:41'),
(9, 27, 27, 4, 10, '35', 350, '200', '70000', 5, '3500', '66500', '2019-12-04 01:24:45', '2019-12-04 01:24:45'),
(10, 27, 27, 7, 10, '35', 350, '150', '52500', 5, '2625', '49875', '2019-12-04 01:24:45', '2019-12-04 01:24:45'),
(11, 27, 27, 10, 10, '35', 350, '107', '37450', 0, '0', '37450', '2019-12-04 01:24:45', '2019-12-04 01:24:45'),
(12, 27, 27, 11, 10, '35', 350, '107', '37450', 5, '1873', '35578', '2019-12-04 01:24:45', '2019-12-04 01:24:45'),
(13, 28, 22, 7, 10, '35', 350, '150', '52500', 0, '0', '52500', '2019-12-04 01:37:54', '2019-12-04 01:37:54'),
(14, 29, 26, 10, 10, '35', 350, '107', '37450', 0, '0', '37450', '2019-12-04 01:57:03', '2019-12-04 01:57:03'),
(15, 30, 26, 4, 10, '35', 350, '200', '70000', 0, '0', '70000', '2019-12-04 04:19:45', '2019-12-04 04:19:45'),
(16, 30, 26, 7, 10, '35', 350, '150', '52500', 5, '2625', '49875', '2019-12-04 04:19:45', '2019-12-04 04:19:45'),
(17, 31, 26, 7, 10, '35', 350, '150', '52500', 0, '0', '52500', '2019-12-04 04:23:24', '2019-12-04 04:23:24'),
(18, 32, 22, 4, 10, '35', 350, '200', '70000', 5, '3500', '66500', '2019-12-04 23:19:49', '2019-12-04 23:19:49'),
(19, 32, 22, 4, 10, '35', 350, '200', '70000', 0, '0', '70000', '2019-12-04 23:19:49', '2019-12-04 23:19:49'),
(20, 33, 29, 13, 232, '35', 8120, '117', '950040', 5, '47502', '902538', '2019-12-05 00:03:24', '2019-12-05 00:03:24'),
(21, 33, 29, 14, 230, '35', 8050, '68', '547400', 5, '27370', '520030', '2019-12-05 00:03:24', '2019-12-05 00:03:24'),
(22, 34, 8, 14, 10, '35', 350, '100', '35000', 0, '0', '35000', '2019-12-05 04:44:48', '2019-12-05 04:44:48');

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
(22, 'Siva', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-11-14 01:38:55', '2019-11-24 22:24:08'),
(23, 'Admin', 'ad', 'Tiruchengode', '1236547890', 0, 0, 1, '2019-11-14 02:05:23', '2019-11-23 00:57:44'),
(27, 'kumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-03 01:38:59', '2019-12-03 01:38:59'),
(28, 'sivakumar', 'sk', 'salem', '1236547890', 0, 0, 1, '2019-12-04 22:54:45', '2019-12-04 22:54:45'),
(29, 'Murugan', 'smk', 'Erode', '9715686114', 0, 0, 1, '2019-12-04 23:27:01', '2019-12-04 23:37:09'),
(30, 'test', 'TS', 'erode', '1236547890', 100000, 100, 1, '2019-12-05 03:54:54', '2019-12-05 03:55:44');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2019_11_29_060653_create_demos_table', 15);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `weight`, `net_weight`, `product_group`, `unit_id`, `created_at`, `updated_at`) VALUES
(4, 'BIG R', '200', '35', '1000', 3, 3, '2019-11-12 00:31:37', '2019-11-12 03:52:46'),
(7, 'RUBA-ருபா (35KG)', '150', '35', '100', 3, 1, '2019-11-13 02:07:46', '2019-11-13 02:07:46'),
(10, 'jalebis', '107', '35', '875', 2, 3, '2019-11-14 00:53:46', '2019-11-14 00:53:46'),
(11, 'gft', '107', '35', '875', 7, 1, '2019-11-14 01:27:09', '2019-11-14 01:27:09'),
(13, 'ROGU ரோகு', '135', '35', '0', 3, 4, '2019-12-04 23:33:13', '2019-12-04 23:49:58'),
(12, 'test', '590', '600', '875', 2, 3, '2019-11-18 04:41:58', '2019-11-18 04:41:58'),
(14, 'FUNGAS பங்கஷ்', '100', '35', '0', 3, 4, '2019-12-04 23:41:27', '2019-12-04 23:41:27'),
(15, 'MEDIUM ROGU', '115', '35', '0', 3, 4, '2019-12-04 23:42:17', '2019-12-04 23:42:17');

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
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `short_name`, `city`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NELLUR S', 'N.F.S', 'Nellur', '1236547890', 0, '2019-11-14 04:03:22', '2019-12-05 03:30:32'),
(8, 'TAGORE', 'VRC', 'Nellur', '1236547890', 1, '2019-12-04 23:34:36', '2019-12-05 04:52:20');

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
(1, '10 KG', '2019-11-14 00:08:39', '2019-11-14 00:21:48'),
(4, '35 KG', '2019-11-19 01:22:19', '2019-11-19 01:22:19'),
(5, '50KG', '2019-12-04 23:29:51', '2019-12-04 23:29:51'),
(6, '30KG', '2019-12-04 23:30:03', '2019-12-04 23:30:03');

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
