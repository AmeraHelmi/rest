-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 09:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'فطائر حلوة ', '2016-10-20 10:02:10', '2016-10-20 10:02:10'),
(7, 'فطائر حادقة', '2016-10-20 10:11:31', '2016-10-20 10:11:31'),
(8, 'بيتزا شرقى', '2016-10-20 10:14:17', '2016-10-20 10:14:17'),
(9, 'اطباق ', '2016-10-26 13:36:53', '2016-10-26 11:36:53'),
(10, 'حواوشى', '2016-10-20 10:14:35', '2016-10-20 10:14:35'),
(11, 'بيتزا ايطالى', '2016-10-20 10:14:48', '2016-10-20 10:14:48'),
(12, 'مشويات', '2016-10-26 11:36:41', '2016-10-26 11:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `tel` varchar(123) CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `tel`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, '010256642', 'test1', 'asden', '2016-10-25 15:16:21', '2016-10-25 13:16:21'),
(2, '01125648', 'alaa', 'aaaaaaaa', '2016-10-20 13:37:06', '2016-10-20 11:37:06'),
(3, '01090700833', 'اميرة حلمى', 'اسيوط', '2016-10-09 17:39:43', '2016-10-09 17:39:43'),
(4, '01250652624', 'test', 'assit', '2016-10-20 10:24:49', '2016-10-20 10:24:49'),
(5, '010245686', 'asd', 'assuit', '2016-10-20 13:32:42', '2016-10-20 13:32:42'),
(6, '012546', '', '', '2016-10-23 07:25:49', '2016-10-23 07:25:49'),
(7, '0100', 'aa', 'aa', '2016-10-24 12:00:22', '2016-10-24 12:00:22'),
(8, '01129817533', 'اميرة', 'اسيوط', '2016-10-25 09:50:17', '2016-10-25 09:50:17'),
(9, '04', 'ee', 'ee', '2016-10-25 15:20:59', '2016-10-25 13:20:59'),
(10, '01013696675', '', '', '2016-10-26 10:26:35', '2016-10-26 10:26:35'),
(11, '01025486', 'اميرة', 'اسيوط', '2016-10-26 11:38:21', '2016-10-26 11:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) DEFAULT '0',
  `customer_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `total`, `customer_tel`, `type`, `created_at`, `updated_at`) VALUES
(1, '2016-10-25', 20, '010256642', 'ديليفرى', '2016-10-25 12:02:05', '2016-10-25 10:02:05'),
(2, '2016-10-25', 9, '0', 'ديليفرى', '2016-10-25 10:12:48', '2016-10-25 10:12:48'),
(3, '2016-10-25', 23, '0', 'ديليفرى', '2016-10-25 10:15:18', '2016-10-25 10:15:18'),
(4, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 10:15:37', '2016-10-25 10:15:37'),
(5, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 10:15:49', '2016-10-25 10:15:49'),
(6, '2016-10-25', 15, '0', 'ديليفرى', '2016-10-25 10:20:02', '2016-10-25 10:20:02'),
(7, '2016-10-25', 15, '0', 'ديليفرى', '2016-10-25 10:21:52', '2016-10-25 10:21:52'),
(8, '2016-10-25', 21, '010256642', 'ديليفرى', '2016-10-25 10:22:13', '2016-10-25 10:22:13'),
(9, '2016-10-25', 9, '010256642', 'ديليفرى', '2016-10-25 10:23:50', '2016-10-25 10:23:50'),
(10, '2016-10-25', 9, '010256642', 'ديليفرى', '2016-10-25 10:24:31', '2016-10-25 10:24:31'),
(11, '2016-10-25', 9, '010256642', 'ديليفرى', '2016-10-25 10:24:59', '2016-10-25 10:24:59'),
(12, '2016-10-25', 15, '01250652624', 'ديليفرى', '2016-10-25 10:25:23', '2016-10-25 10:25:23'),
(13, '2016-10-25', 9, '01090700833', 'ديليفرى', '2016-10-25 10:28:18', '2016-10-25 10:28:18'),
(14, '2016-10-25', 369, '01090700833', 'ديليفرى', '2016-10-25 10:28:35', '2016-10-25 10:28:35'),
(15, '2016-10-25', 390, '01090700833', 'ديليفرى', '2016-10-25 12:29:29', '2016-10-25 10:29:29'),
(16, '2016-10-25', 21, '0', 'ديليفرى', '2016-10-25 12:30:20', '2016-10-25 10:30:20'),
(17, '2016-10-25', 66, '01129817533', 'ديليفرى', '2016-10-25 10:37:37', '2016-10-25 10:37:37'),
(18, '2016-10-25', 35, '0', 'ديليفرى', '2016-10-25 10:38:59', '2016-10-25 10:38:59'),
(19, '2016-10-25', 6, '01129817533', 'ديليفرى', '2016-10-25 11:24:06', '2016-10-25 11:24:06'),
(20, '2016-10-25', 6, '01129817533', 'ديليفرى', '2016-10-25 11:28:34', '2016-10-25 11:28:34'),
(21, '2016-10-25', 12, '01129817533', 'ديليفرى', '2016-10-25 11:29:44', '2016-10-25 11:29:44'),
(22, '2016-10-25', NULL, '01129817533', 'ديليفرى', '2016-10-25 11:30:01', '2016-10-25 11:30:01'),
(23, '2016-10-25', 9, '01129817533', 'ديليفرى', '2016-10-25 11:30:15', '2016-10-25 11:30:15'),
(24, '2016-10-25', NULL, '01129817533', 'ديليفرى', '2016-10-25 11:30:36', '2016-10-25 11:30:36'),
(25, '2016-10-25', 6, '01129817533', 'ديليفرى', '2016-10-25 11:30:50', '2016-10-25 11:30:50'),
(26, '2016-10-25', 9, '01129817533', 'ديليفرى', '2016-10-25 11:33:39', '2016-10-25 11:33:39'),
(27, '2016-10-25', 6, '01129817533', 'ديليفرى', '2016-10-25 11:35:06', '2016-10-25 11:35:06'),
(28, '2016-10-25', NULL, '01129817533', 'ديليفرى', '2016-10-25 11:35:46', '2016-10-25 11:35:46'),
(29, '2016-10-25', 28, '01129817533', 'ديليفرى', '2016-10-25 11:36:13', '2016-10-25 11:36:13'),
(30, '2016-10-25', 9, '01129817533', 'ديليفرى', '2016-10-25 11:38:13', '2016-10-25 11:38:13'),
(31, '2016-10-25', 15, '01129817533', 'ديليفرى', '2016-10-25 11:38:57', '2016-10-25 11:38:57'),
(32, '2016-10-25', 9, '01129817533', 'ديليفرى', '2016-10-25 11:39:44', '2016-10-25 11:39:44'),
(33, '2016-10-25', 9, '01129817533', 'ديليفرى', '2016-10-25 11:40:22', '2016-10-25 11:40:22'),
(34, '2016-10-25', 18, '01129817533', 'ديليفرى', '2016-10-25 11:41:45', '2016-10-25 11:41:45'),
(35, '2016-10-25', 106, '04', 'ديليفرى', '2016-10-25 13:46:13', '2016-10-25 13:46:13'),
(36, '2016-10-25', NULL, '04', 'ديليفرى', '2016-10-25 13:50:07', '2016-10-25 13:50:07'),
(37, '2016-10-25', NULL, '04', 'ديليفرى', '2016-10-25 13:53:21', '2016-10-25 13:53:21'),
(38, '2016-10-25', NULL, '04', 'ديليفرى', '2016-10-25 13:53:25', '2016-10-25 13:53:25'),
(39, '2016-10-25', NULL, '04', 'ديليفرى', '2016-10-25 13:53:37', '2016-10-25 13:53:37'),
(40, '2016-10-25', 15, '010256642', 'ديليفرى', '2016-10-25 13:54:25', '2016-10-25 13:54:25'),
(41, '2016-10-25', NULL, '010256642', 'ديليفرى', '2016-10-25 13:55:50', '2016-10-25 13:55:50'),
(42, '2016-10-25', 0, NULL, 'ديليفرى', '2016-10-25 13:56:06', '2016-10-25 13:56:06'),
(43, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 13:57:01', '2016-10-25 13:57:01'),
(44, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 13:57:25', '2016-10-25 13:57:25'),
(45, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 13:58:05', '2016-10-25 13:58:05'),
(46, '2016-10-25', NULL, NULL, 'ديليفرى', '2016-10-25 13:59:29', '2016-10-25 13:59:29'),
(47, '2016-10-25', 18, '0', 'ديليفرى', '2016-10-25 14:00:03', '2016-10-25 14:00:03'),
(48, '2016-10-25', NULL, '0', 'ديليفرى', '2016-10-25 14:01:06', '2016-10-25 14:01:06'),
(49, '2016-10-25', 6, '0', 'ديليفرى', '2016-10-25 14:02:04', '2016-10-25 14:02:04'),
(50, '2016-10-25', NULL, '0', 'ديليفرى', '2016-10-25 14:03:04', '2016-10-25 14:03:04'),
(51, '2016-10-25', NULL, '0', 'ديليفرى', '2016-10-25 14:03:11', '2016-10-25 14:03:11'),
(52, '2016-10-25', 6, '0', 'ديليفرى', '2016-10-25 14:03:21', '2016-10-25 14:03:21'),
(53, '2016-10-25', 36, '0', 'ديليفرى', '2016-10-25 14:04:47', '2016-10-25 14:04:47'),
(54, '2016-10-26', 9, '04', 'ديليفرى', '2016-10-26 08:19:31', '2016-10-26 08:19:31'),
(55, '2016-10-26', 37, '0', 'ديليفرى', '2016-10-26 12:23:37', '2016-10-26 10:23:37'),
(56, '2016-10-26', 48, '01025486', 'ديليفرى', '2016-10-26 13:39:56', '2016-10-26 11:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `no_items` int(11) DEFAULT '0',
  `info` varchar(2500) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL DEFAULT '2016-10-19',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `no_items`, `info`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&&فطيرة بالكريمة-كبير&', '2016-10-19', '2016-10-25 12:02:05', '2016-10-25 10:02:05'),
(2, 2, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:12:48', '2016-10-25 10:12:48'),
(3, 3, 5, 'فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:15:18', '2016-10-25 10:15:18'),
(4, 4, NULL, NULL, '2016-10-19', '2016-10-25 10:15:37', '2016-10-25 10:15:37'),
(5, 5, NULL, NULL, '2016-10-19', '2016-10-25 10:15:49', '2016-10-25 10:15:49'),
(6, 6, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:20:02', '2016-10-25 10:20:02'),
(7, 7, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:21:52', '2016-10-25 10:21:52'),
(8, 8, 3, 'فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&', '2016-10-19', '2016-10-25 10:22:13', '2016-10-25 10:22:13'),
(9, 9, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:23:50', '2016-10-25 10:23:50'),
(10, 10, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:24:32', '2016-10-25 10:24:32'),
(11, 11, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:24:59', '2016-10-25 10:24:59'),
(12, 12, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:25:23', '2016-10-25 10:25:23'),
(13, 13, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-19', '2016-10-25 10:28:18', '2016-10-25 10:28:18'),
(14, 14, 43, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&', '2016-10-19', '2016-10-25 10:28:35', '2016-10-25 10:28:35'),
(15, 15, 44, '&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالكريمة-وسط&فطيرة بالسكر سادة-كبير&فطيرة بالسكر سادة-كبير&', '2016-10-19', '2016-10-25 12:29:30', '2016-10-25 10:29:30'),
(16, 16, 4, '&&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&بيتزا بالسجق-صغير&', '2016-10-19', '2016-10-25 12:30:20', '2016-10-25 10:30:20'),
(17, 17, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '1970-01-01', '2016-10-25 10:37:37', '2016-10-25 10:37:37'),
(19, 19, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:24:06', '2016-10-25 11:24:06'),
(20, 20, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:28:34', '2016-10-25 11:28:34'),
(21, 21, 4, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:29:44', '2016-10-25 11:29:44'),
(22, 22, NULL, NULL, '2016-10-25', '2016-10-25 13:30:01', '2016-10-25 11:30:01'),
(23, 23, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:30:15', '2016-10-25 11:30:15'),
(24, 24, NULL, NULL, '2016-10-25', '2016-10-25 13:30:37', '2016-10-25 11:30:37'),
(25, 25, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:30:50', '2016-10-25 11:30:50'),
(26, 26, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:33:39', '2016-10-25 11:33:39'),
(27, 27, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:35:06', '2016-10-25 11:35:06'),
(28, 28, NULL, NULL, '2016-10-25', '2016-10-25 13:35:46', '2016-10-25 11:35:46'),
(29, 29, 4, 'فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&فطيرة بالسكر سادة-وسط&', '2016-10-25', '2016-10-25 13:36:13', '2016-10-25 11:36:13'),
(30, 30, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:38:13', '2016-10-25 11:38:13'),
(31, 31, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:38:57', '2016-10-25 11:38:57'),
(32, 32, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:39:44', '2016-10-25 11:39:44'),
(33, 33, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:40:22', '2016-10-25 11:40:22'),
(34, 34, 6, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 13:41:45', '2016-10-25 11:41:45'),
(35, 35, 8, 'بيتزا بالجبنة الرومى-صغير&بيتزا بالجبنة الرومى-صغير&بيتزا بالجبنة الرومى-صغير&بيتزا بالجبنة الرومى-صغير&بيتزا بالجبنة الرومى-صغير&بيتزا بالسجق-صغير&بيتزا بالسجق-صغير&بيتزا بالسجق-صغير&', '2016-10-25', '2016-10-25 15:46:13', '2016-10-25 13:46:13'),
(36, 36, NULL, NULL, '2016-10-25', '2016-10-25 15:50:07', '2016-10-25 13:50:07'),
(37, 37, NULL, NULL, '2016-10-25', '2016-10-25 15:53:21', '2016-10-25 13:53:21'),
(38, 38, NULL, NULL, '2016-10-25', '2016-10-25 15:53:25', '2016-10-25 13:53:25'),
(39, 39, NULL, NULL, '2016-10-25', '2016-10-25 15:53:37', '2016-10-25 13:53:37'),
(40, 40, 5, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 15:54:25', '2016-10-25 13:54:25'),
(41, 41, NULL, NULL, '2016-10-25', '2016-10-25 15:55:50', '2016-10-25 13:55:50'),
(42, 42, 0, NULL, '2016-10-25', '2016-10-25 15:56:06', '2016-10-25 13:56:06'),
(43, 43, NULL, NULL, '2016-10-25', '2016-10-25 15:57:01', '2016-10-25 13:57:01'),
(44, 44, NULL, NULL, '2016-10-25', '2016-10-25 15:57:25', '2016-10-25 13:57:25'),
(45, 45, NULL, NULL, '2016-10-25', '2016-10-25 15:58:05', '2016-10-25 13:58:05'),
(46, 46, NULL, NULL, '2016-10-25', '2016-10-25 15:59:29', '2016-10-25 13:59:29'),
(47, 47, 6, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 16:00:03', '2016-10-25 14:00:03'),
(48, 48, NULL, NULL, '2016-10-25', '2016-10-25 16:01:06', '2016-10-25 14:01:06'),
(49, 49, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 16:02:04', '2016-10-25 14:02:04'),
(50, 50, NULL, NULL, '2016-10-25', '2016-10-25 16:03:04', '2016-10-25 14:03:04'),
(51, 51, NULL, NULL, '2016-10-25', '2016-10-25 16:03:11', '2016-10-25 14:03:11'),
(52, 52, 2, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-25', '2016-10-25 16:03:21', '2016-10-25 14:03:21'),
(53, 53, 3, 'فطيرة بالسكر سادة-كبير&فطيرة بالسكر سادة-كبير&فطيرة بالسكر سادة-كبير&', '2016-10-25', '2016-10-25 16:04:47', '2016-10-25 14:04:47'),
(54, 54, 3, 'فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&', '2016-10-26', '2016-10-26 10:19:31', '2016-10-26 08:19:31'),
(55, 55, 5, '&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالكريمة-كبير&فطيرة بالكريمة-كبير&', '2016-10-26', '2016-10-26 12:23:37', '2016-10-26 10:23:37'),
(56, 56, 7, '&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&فطيرة بالسكر سادة-صغير&بيتزا بالسجق-صغير&بيتزا بالسجق-صغير&بيتزا بالسجق-صغير&', '2016-10-26', '2016-10-26 13:39:57', '2016-10-26 11:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `s_price` int(11) NOT NULL DEFAULT '0',
  `m_price` int(11) NOT NULL DEFAULT '0',
  `l_price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category_id`, `s_price`, `m_price`, `l_price`, `created_at`, `updated_at`) VALUES
(1, 'فطيرة بالسكر سادة', 6, 3, 7, 12, '2016-10-20 10:17:59', '2016-10-20 10:17:59'),
(3, 'فطيرة بالكريمة', 6, 6, 9, 14, '2016-10-20 10:18:37', '2016-10-20 10:18:37'),
(4, 'فطيرة بالكنافة', 6, 7, 10, 17, '2016-10-20 10:18:57', '2016-10-20 10:18:57'),
(5, 'فطيرة بالسجق', 7, 11, 17, 25, '2016-10-20 10:19:18', '2016-10-20 10:19:18'),
(6, 'فطيرة بالتونة', 7, 13, 18, 28, '2016-10-20 10:19:38', '2016-10-20 10:19:38'),
(7, 'فطيرة باللحمة', 7, 13, 18, 27, '2016-10-20 10:20:41', '2016-10-20 10:20:41'),
(8, 'فطيرة بالبسطرمة والبيض', 7, 14, 19, 28, '2016-10-20 10:21:00', '2016-10-20 10:21:00'),
(9, 'بيتزا بالسجق', 8, 12, 18, 22, '2016-10-20 10:21:14', '2016-10-20 10:21:14'),
(10, 'بيتزا بالتونة', 8, 14, 19, 30, '2016-10-20 10:21:29', '2016-10-20 10:21:29'),
(11, 'بيتزا باللحمة', 8, 14, 19, 30, '2016-10-20 10:21:43', '2016-10-20 10:21:43'),
(12, 'بيتزا بالبسطرمة', 8, 15, 20, 31, '2016-10-20 10:21:56', '2016-10-20 10:21:56'),
(13, 'بيتزا بالجبنة الرومى', 8, 14, 20, 30, '2016-10-20 10:22:13', '2016-10-20 10:22:13'),
(14, 'مكرونة نابولى', 9, 10, 0, 0, '2016-10-20 10:22:35', '2016-10-20 10:22:35'),
(15, 'مكرونة فونجى', 9, 14, 0, 0, '2016-10-20 10:22:53', '2016-10-20 10:22:53'),
(16, 'aa', 6, 22, 22, 3, '2016-10-20 13:35:46', '2016-10-20 13:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'disactivated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(0, 'اميرة حلمى', 'amera@amera.com', '$2y$10$2OfbN5fC0GBJDgI6EWTx9umsOk9LgB0xcEOc7ojWTf.D55F6Ufuhu', 'KXVpNrjx5s6JtUP4k72y0MHf2SsS3ZUAQww3faYX7Zs6OTjVPV1gZRy42mwe', '2016-10-20 09:40:26', '2016-10-26 11:35:46', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
