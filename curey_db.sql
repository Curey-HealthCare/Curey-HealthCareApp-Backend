-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 02:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `is_callup` tinyint(1) NOT NULL,
  `appointment_time` datetime NOT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` double(8,2) NOT NULL,
  `last_checkup` datetime DEFAULT NULL,
  `re_examination` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `is_callup`, `appointment_time`, `diagnosis`, `duration`, `last_checkup`, `re_examination`, `created_at`, `updated_at`) VALUES
(1, 6, 19, 0, '2020-03-21 18:00:00', 'Operative methodical customerloyalty', 1.00, '2020-03-20 16:34:28', 1, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(2, 67, 2, 1, '2020-03-22 13:00:00', 'Realigned real-time definition', 1.00, '2020-03-20 16:34:28', 0, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(3, 23, 2, 1, '2020-03-25 14:00:00', 'Stand-alone context-sensitive complexity', 1.00, '2020-03-20 16:34:28', 1, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(4, 3, 2, 1, '2020-03-25 15:00:00', 'Secured impactful service-desk', 1.00, '2020-03-20 16:34:28', 1, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(5, 88, 2, 0, '2020-03-20 13:00:00', 'Reverse-engineered high-level architecture', 1.00, '2020-03-20 16:34:28', 0, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(6, 37, 2, 1, '2020-03-20 14:00:00', 'Monitored empowering matrix', 1.00, '2020-03-20 16:34:28', 0, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(7, 84, 19, 1, '2020-03-21 19:00:00', 'Synchronised optimizing success', 1.00, '2020-03-20 16:34:28', 0, '2020-03-20 14:34:28', '2020-03-20 14:34:28'),
(8, 10, 19, 1, '2020-03-21 20:00:00', 'Upgradable national access', 1.00, '2020-03-20 16:34:29', 0, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(9, 6, 19, 0, '2020-03-21 21:00:00', 'Up-sized even-keeled contingency', 1.00, '2020-03-20 16:34:29', 1, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(10, 48, 19, 1, '2020-03-21 22:00:00', 'Proactive scalable encryption', 1.00, '2020-03-20 16:34:29', 0, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(11, 74, 2, 0, '2020-03-22 14:00:00', 'Phased assymetric GraphicInterface', 1.00, '2020-03-20 16:34:29', 1, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(12, 5, 19, 1, '2020-03-21 23:00:00', 'Triple-buffered fault-tolerant standardization', 1.00, '2020-03-20 16:34:29', 0, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(13, 42, 19, 1, '2020-03-22 00:00:00', 'Networked content-based extranet', 1.00, '2020-03-20 16:34:29', 0, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(14, 10, 2, 1, '2020-03-25 16:00:00', 'Reactive well-modulated matrix', 1.00, '2020-03-20 16:34:29', 0, '2020-03-20 14:34:29', '2020-03-20 14:34:29'),
(15, 81, 2, 1, '2020-03-20 15:00:00', 'Front-line impactful collaboration', 1.00, '2020-03-20 16:34:30', 0, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(16, 68, 2, 1, '2020-03-22 15:00:00', 'Customer-focused value-added solution', 1.00, '2020-03-20 16:34:30', 1, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(17, 48, 2, 0, '2020-03-25 17:00:00', 'Front-line mission-critical customerloyalty', 1.00, '2020-03-20 16:34:30', 0, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(18, 52, 19, 0, '2020-03-22 01:00:00', 'Multi-channelled zerodefect orchestration', 1.00, '2020-03-20 16:34:30', 0, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(19, 48, 19, 0, '2020-03-22 02:00:00', 'Diverse homogeneous firmware', 1.00, '2020-03-20 16:34:30', 1, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(20, 5, 2, 0, '2020-03-22 16:00:00', 'Synchronised local localareanetwork', 1.00, '2020-03-20 16:34:30', 0, '2020-03-20 14:34:30', '2020-03-20 14:34:30'),
(21, 25, 19, 1, '2020-03-22 03:00:00', 'Future-proofed clear-thinking groupware', 1.00, '2020-03-20 16:34:31', 0, '2020-03-20 14:34:31', '2020-03-20 14:34:31'),
(22, 1, 2, 0, '2020-03-22 17:00:00', 'Expanded value-added conglomeration', 1.00, '2020-03-20 16:34:31', 1, '2020-03-20 14:34:31', '2020-03-20 14:34:31'),
(23, 37, 19, 1, '2020-03-22 04:00:00', 'Compatible bottom-line emulation', 1.00, '2020-03-20 16:34:31', 0, '2020-03-20 14:34:31', '2020-03-20 14:34:31'),
(24, 33, 19, 1, '2020-03-22 05:00:00', 'Ameliorated methodical securedline', 1.00, '2020-03-20 16:34:31', 0, '2020-03-20 14:34:31', '2020-03-20 14:34:31'),
(25, 3, 19, 1, '2020-03-22 06:00:00', 'User-centric foreground systemengine', 1.00, '2020-03-20 16:34:31', 0, '2020-03-20 14:34:31', '2020-03-20 14:34:31'),
(26, 52, 2, 0, '2020-04-01 14:00:00', 'Switchable disintermediate structure', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(27, 10, 19, 1, '2020-03-22 07:00:00', 'Programmable motivating leverage', 1.00, '2020-03-20 16:34:32', 1, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(28, 37, 2, 1, '2020-04-01 15:00:00', 'Synchronised intermediate artificialintelligence', 1.00, '2020-03-20 16:34:32', 1, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(29, 12, 2, 1, '2020-04-01 16:00:00', 'Implemented bi-directional attitude', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(30, 71, 19, 1, '2020-03-22 08:00:00', 'Triple-buffered client-server strategy', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(31, 5, 19, 1, '2020-03-22 09:00:00', 'Customizable client-server superstructure', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(32, 49, 19, 0, '2020-03-22 10:00:00', 'Triple-buffered intangible orchestration', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(33, 23, 19, 0, '2020-03-22 11:00:00', 'Intuitive 24/7 GraphicalUserInterface', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(34, 37, 2, 1, '2020-03-29 13:00:00', 'Multi-tiered holistic conglomeration', 1.00, '2020-03-20 16:34:32', 1, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(35, 12, 19, 1, '2020-03-28 18:00:00', 'Customer-focused 6thgeneration productivity', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(36, 74, 2, 0, '2020-04-08 14:00:00', 'Advanced impactful opensystem', 1.00, '2020-03-20 16:34:32', 0, '2020-03-20 14:34:32', '2020-03-20 14:34:32'),
(37, 5, 19, 0, '2020-03-28 19:00:00', 'Profit-focused 4thgeneration strategy', 1.00, '2020-03-20 16:34:33', 0, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(38, 23, 19, 0, '2020-03-28 20:00:00', 'Mandatory needs-based leverage', 1.00, '2020-03-20 16:34:33', 1, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(39, 74, 2, 1, '2020-03-29 14:00:00', 'Secured discrete workforce', 1.00, '2020-03-20 16:34:33', 1, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(40, 42, 2, 0, '2020-03-29 15:00:00', 'Self-enabling background approach', 1.00, '2020-03-20 16:34:33', 0, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(41, 42, 2, 1, '2020-04-08 15:00:00', 'Configurable maximized matrix', 1.00, '2020-03-20 16:34:33', 1, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(42, 6, 19, 0, '2020-03-28 21:00:00', 'Distributed 4thgeneration standardization', 1.00, '2020-03-20 16:34:33', 0, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(43, 4, 2, 1, '2020-03-20 16:00:00', 'Stand-alone radical leverage', 1.00, '2020-03-20 16:34:33', 1, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(44, 58, 19, 1, '2020-03-28 22:00:00', 'Cross-group clear-thinking interface', 1.00, '2020-03-20 16:34:33', 1, '2020-03-20 14:34:33', '2020-03-20 14:34:33'),
(45, 75, 19, 1, '2020-03-28 23:00:00', 'Profit-focused well-modulated capability', 1.00, '2020-03-20 16:34:34', 0, '2020-03-20 14:34:34', '2020-03-20 14:34:34'),
(46, 85, 19, 0, '2020-03-29 00:00:00', 'Future-proofed bi-directional analyzer', 1.00, '2020-03-20 16:34:34', 1, '2020-03-20 14:34:34', '2020-03-20 14:34:34'),
(47, 67, 2, 0, '2020-03-20 17:00:00', 'Integrated multimedia capability', 1.00, '2020-03-20 16:34:34', 0, '2020-03-20 14:34:34', '2020-03-20 14:34:34'),
(48, 78, 19, 1, '2020-03-29 01:00:00', 'Cross-platform assymetric support', 1.00, '2020-03-20 16:34:34', 0, '2020-03-20 14:34:34', '2020-03-20 14:34:34'),
(49, 75, 19, 1, '2020-03-29 02:00:00', 'Persevering empowering collaboration', 1.00, '2020-03-20 16:34:34', 0, '2020-03-20 14:34:34', '2020-03-20 14:34:34'),
(50, 76, 2, 0, '2020-04-08 16:00:00', 'Exclusive clear-thinking leverage', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(51, 85, 2, 0, '2020-03-27 13:00:00', 'Upgradable zerotolerance attitude', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(52, 67, 2, 1, '2020-04-15 14:00:00', 'Business-focused multi-state utilisation', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(53, 49, 19, 0, '2020-03-29 03:00:00', 'Operative content-based database', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(54, 3, 2, 0, '2020-03-27 14:00:00', 'Inverse system-worthy matrix', 1.00, '2020-03-20 16:34:35', 0, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(55, 78, 2, 1, '2020-03-29 16:00:00', 'Cross-group fresh-thinking groupware', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(56, 78, 2, 0, '2020-04-15 15:00:00', 'Adaptive dedicated function', 1.00, '2020-03-20 16:34:35', 1, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(57, 68, 2, 0, '2020-04-05 13:00:00', 'Enterprise-wide non-volatile middleware', 1.00, '2020-03-20 16:34:35', 0, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(58, 5, 19, 0, '2020-03-29 04:00:00', 'Versatile bi-directional moderator', 1.00, '2020-03-20 16:34:35', 0, '2020-03-20 14:34:35', '2020-03-20 14:34:35'),
(59, 23, 19, 1, '2020-03-29 05:00:00', 'Managed zeroadministration opensystem', 1.00, '2020-03-20 16:34:36', 1, '2020-03-20 14:34:36', '2020-03-20 14:34:36'),
(60, 75, 2, 0, '2020-03-27 15:00:00', 'Centralized local parallelism', 1.00, '2020-03-20 16:34:36', 0, '2020-03-20 14:34:36', '2020-03-20 14:34:36'),
(61, 68, 19, 1, '2020-03-29 06:00:00', 'Polarised context-sensitive data-warehouse', 1.00, '2020-03-20 16:34:36', 1, '2020-03-20 14:34:36', '2020-03-20 14:34:36'),
(62, 12, 2, 1, '2020-03-27 16:00:00', 'Assimilated incremental knowledgeuser', 1.00, '2020-03-20 16:34:36', 0, '2020-03-20 14:34:36', '2020-03-20 14:34:36'),
(63, 23, 2, 0, '2020-04-05 14:00:00', 'Customizable zeroadministration firmware', 1.00, '2020-03-20 16:34:37', 0, '2020-03-20 14:34:37', '2020-03-20 14:34:37'),
(64, 48, 2, 1, '2020-04-15 16:00:00', 'Up-sized high-level middleware', 1.00, '2020-03-20 16:34:37', 0, '2020-03-20 14:34:37', '2020-03-20 14:34:37'),
(65, 3, 19, 0, '2020-03-29 07:00:00', 'Exclusive needs-based conglomeration', 1.00, '2020-03-20 16:34:37', 0, '2020-03-20 14:34:37', '2020-03-20 14:34:37'),
(66, 4, 2, 0, '2020-04-22 14:00:00', 'Ameliorated actuating budgetarymanagement', 1.00, '2020-03-20 16:34:37', 0, '2020-03-20 14:34:37', '2020-03-20 14:34:37'),
(67, 12, 19, 0, '2020-03-29 08:00:00', 'Enterprise-wide user-facing architecture', 1.00, '2020-03-20 16:34:38', 0, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(68, 68, 19, 0, '2020-03-29 09:00:00', 'Extended mission-critical portal', 1.00, '2020-03-20 16:34:38', 0, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(69, 12, 19, 1, '2020-03-29 10:00:00', 'Multi-channelled foreground collaboration', 1.00, '2020-03-20 16:34:38', 1, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(70, 75, 2, 1, '2020-04-22 15:00:00', 'Focused impactful attitude', 1.00, '2020-03-20 16:34:38', 0, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(71, 88, 2, 0, '2020-04-05 15:00:00', 'Visionary exuding systemengine', 1.00, '2020-03-20 16:34:38', 0, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(72, 85, 2, 1, '2020-04-03 13:00:00', 'Multi-layered client-server hardware', 1.00, '2020-03-20 16:34:38', 1, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(73, 75, 19, 0, '2020-04-04 18:00:00', 'Exclusive hybrid migration', 1.00, '2020-03-20 16:34:38', 1, '2020-03-20 14:34:38', '2020-03-20 14:34:38'),
(74, 1, 2, 1, '2020-04-03 14:00:00', 'Optional object-oriented parallelism', 1.00, '2020-03-20 16:34:39', 0, '2020-03-20 14:34:39', '2020-03-20 14:34:39'),
(75, 1, 2, 1, '2020-04-22 16:00:00', 'De-engineered intermediate time-frame', 1.00, '2020-03-20 16:34:39', 0, '2020-03-20 14:34:39', '2020-03-20 14:34:39'),
(76, 42, 2, 1, '2020-04-03 15:00:00', 'Automated demand-driven emulation', 1.00, '2020-03-20 16:34:40', 0, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(77, 14, 19, 0, '2020-04-04 19:00:00', 'Customizable multi-state capacity', 1.00, '2020-03-20 16:34:40', 0, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(78, 78, 19, 0, '2020-04-04 20:00:00', 'Team-oriented mobile alliance', 1.00, '2020-03-20 16:34:40', 0, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(79, 74, 2, 1, '2020-04-03 16:00:00', 'Operative context-sensitive protocol', 1.00, '2020-03-20 16:34:40', 1, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(80, 81, 19, 0, '2020-04-04 21:00:00', 'Public-key system-worthy strategy', 1.00, '2020-03-20 16:34:40', 1, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(81, 25, 19, 0, '2020-04-04 22:00:00', 'Reactive mission-critical hardware', 1.00, '2020-03-20 16:34:40', 0, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(82, 68, 2, 1, '2020-04-05 16:00:00', 'Intuitive static superstructure', 1.00, '2020-03-20 16:34:40', 1, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(83, 88, 2, 0, '2020-04-29 14:00:00', 'Ameliorated national productivity', 1.00, '2020-03-20 16:34:40', 0, '2020-03-20 14:34:40', '2020-03-20 14:34:40'),
(84, 52, 19, 0, '2020-04-04 23:00:00', 'Profit-focused foreground hub', 1.00, '2020-03-20 16:34:41', 1, '2020-03-20 14:34:41', '2020-03-20 14:34:41'),
(85, 81, 2, 1, '2020-04-10 13:00:00', 'Managed nextgeneration complexity', 1.00, '2020-03-20 16:34:41', 1, '2020-03-20 14:34:41', '2020-03-20 14:34:41'),
(86, 68, 2, 1, '2020-04-12 13:00:00', 'Fundamental reciprocal portal', 1.00, '2020-03-20 16:34:41', 0, '2020-03-20 14:34:41', '2020-03-20 14:34:41'),
(87, 75, 2, 1, '2020-04-12 14:00:00', 'Total heuristic product', 1.00, '2020-03-20 16:34:42', 0, '2020-03-20 14:34:42', '2020-03-20 14:34:42'),
(88, 6, 19, 1, '2020-04-05 00:00:00', 'Front-line disintermediate productivity', 1.00, '2020-03-20 16:34:42', 1, '2020-03-20 14:34:42', '2020-03-20 14:34:42'),
(89, 12, 19, 1, '2020-04-05 01:00:00', 'Enhanced demand-driven interface', 1.00, '2020-03-20 16:34:42', 0, '2020-03-20 14:34:42', '2020-03-20 14:34:42'),
(90, 5, 19, 1, '2020-04-05 02:00:00', 'Advanced context-sensitive instructionset', 1.00, '2020-03-20 16:34:42', 0, '2020-03-20 14:34:42', '2020-03-20 14:34:42'),
(91, 74, 2, 1, '2020-04-12 15:00:00', 'Function-based multi-tasking leverage', 1.00, '2020-03-20 16:34:42', 0, '2020-03-20 14:34:42', '2020-03-20 14:34:42'),
(92, 14, 2, 1, '2020-04-12 16:00:00', 'Visionary exuding paradigm', 1.00, '2020-03-20 16:34:43', 0, '2020-03-20 14:34:43', '2020-03-20 14:34:43'),
(93, 49, 2, 0, '2020-04-19 13:00:00', 'Devolved multi-tasking help-desk', 1.00, '2020-03-20 16:34:43', 1, '2020-03-20 14:34:43', '2020-03-20 14:34:43'),
(94, 33, 2, 1, '2020-04-19 14:00:00', 'Visionary 24hour portal', 1.00, '2020-03-20 16:34:43', 1, '2020-03-20 14:34:43', '2020-03-20 14:34:43'),
(95, 25, 19, 1, '2020-04-05 03:00:00', 'Reverse-engineered modular access', 1.00, '2020-03-20 16:34:43', 0, '2020-03-20 14:34:43', '2020-03-20 14:34:43'),
(96, 42, 2, 0, '2020-04-19 15:00:00', 'Streamlined discrete definition', 1.00, '2020-03-20 16:34:43', 0, '2020-03-20 14:34:43', '2020-03-20 14:34:43'),
(97, 12, 2, 0, '2020-04-19 16:00:00', 'Diverse object-oriented product', 1.00, '2020-03-20 16:34:44', 0, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(98, 88, 2, 1, '2020-04-26 13:00:00', 'Integrated transitional analyzer', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(99, 71, 2, 0, '2020-04-10 14:00:00', 'Seamless zeroadministration circuit', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(100, 84, 2, 1, '2020-04-10 15:00:00', 'Re-engineered content-based portal', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(101, 76, 2, 1, '2020-04-29 15:00:00', 'Down-sized holistic budgetarymanagement', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(102, 81, 2, 1, '2020-04-29 16:00:00', 'Customizable object-oriented access', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(103, 37, 19, 1, '2020-04-05 04:00:00', 'Visionary uniform benchmark', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(104, 85, 19, 1, '2020-04-05 05:00:00', 'Managed uniform concept', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(105, 42, 2, 0, '2020-05-06 14:00:00', 'Persistent eco-centric help-desk', 1.00, '2020-03-20 16:34:44', 1, '2020-03-20 14:34:44', '2020-03-20 14:34:44'),
(106, 1, 19, 0, '2020-04-05 06:00:00', 'Programmable optimal data-warehouse', 1.00, '2020-03-20 16:34:45', 0, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(107, 12, 19, 1, '2020-04-05 07:00:00', 'Managed zerotolerance encryption', 1.00, '2020-03-20 16:34:45', 0, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(108, 5, 2, 0, '2020-04-10 16:00:00', 'Balanced exuding structure', 1.00, '2020-03-20 16:34:45', 0, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(109, 74, 19, 0, '2020-04-05 08:00:00', 'Multi-lateral transitional focusgroup', 1.00, '2020-03-20 16:34:45', 1, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(110, 12, 19, 1, '2020-04-05 09:00:00', 'Down-sized explicit software', 1.00, '2020-03-20 16:34:45', 0, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(111, 23, 19, 0, '2020-04-05 10:00:00', 'Automated 6thgeneration productivity', 1.00, '2020-03-20 16:34:45', 0, '2020-03-20 14:34:45', '2020-03-20 14:34:45'),
(112, 42, 2, 0, '2020-04-26 14:00:00', 'Inverse actuating attitude', 1.00, '2020-03-20 16:34:46', 0, '2020-03-20 14:34:46', '2020-03-20 14:34:46'),
(113, 74, 2, 0, '2020-04-26 15:00:00', 'Open-architected needs-based migration', 1.00, '2020-03-20 16:34:46', 1, '2020-03-20 14:34:46', '2020-03-20 14:34:46'),
(114, 78, 2, 0, '2020-05-06 15:00:00', 'Multi-channelled analyzing throughput', 1.00, '2020-03-20 16:34:46', 1, '2020-03-20 14:34:46', '2020-03-20 14:34:46'),
(115, 84, 2, 1, '2020-04-26 16:00:00', 'Virtual holistic hardware', 1.00, '2020-03-20 16:34:47', 1, '2020-03-20 14:34:47', '2020-03-20 14:34:47'),
(116, 4, 2, 1, '2020-04-17 13:00:00', 'Reactive background info-mediaries', 1.00, '2020-03-20 16:34:47', 0, '2020-03-20 14:34:47', '2020-03-20 14:34:47'),
(117, 4, 19, 1, '2020-04-11 18:00:00', 'Versatile demand-driven model', 1.00, '2020-03-20 16:34:47', 0, '2020-03-20 14:34:47', '2020-03-20 14:34:47'),
(118, 49, 19, 0, '2020-04-11 19:00:00', 'Future-proofed reciprocal toolset', 1.00, '2020-03-20 16:34:48', 0, '2020-03-20 14:34:48', '2020-03-20 14:34:48'),
(119, 4, 2, 1, '2020-05-06 16:00:00', 'Centralized reciprocal attitude', 1.00, '2020-03-20 16:34:48', 0, '2020-03-20 14:34:48', '2020-03-20 14:34:48'),
(120, 5, 2, 0, '2020-04-17 14:00:00', 'Advanced tertiary moratorium', 1.00, '2020-03-20 16:34:48', 0, '2020-03-20 14:34:48', '2020-03-20 14:34:48'),
(121, 76, 19, 0, '2020-04-11 20:00:00', 'Re-contextualized eco-centric conglomeration', 1.00, '2020-03-20 16:34:48', 0, '2020-03-20 14:34:48', '2020-03-20 14:34:48'),
(122, 85, 2, 1, '2020-04-17 15:00:00', 'Profit-focused disintermediate functionalities', 1.00, '2020-03-20 16:34:49', 0, '2020-03-20 14:34:49', '2020-03-20 14:34:49'),
(123, 14, 19, 0, '2020-04-11 21:00:00', 'Total global projection', 1.00, '2020-03-20 16:34:49', 1, '2020-03-20 14:34:49', '2020-03-20 14:34:49'),
(124, 4, 19, 1, '2020-04-11 22:00:00', 'Synergistic static hub', 1.00, '2020-03-20 16:34:49', 0, '2020-03-20 14:34:49', '2020-03-20 14:34:49'),
(125, 5, 19, 0, '2020-04-11 23:00:00', 'Assimilated bottom-line superstructure', 1.00, '2020-03-20 16:34:49', 1, '2020-03-20 14:34:49', '2020-03-20 14:34:49'),
(126, 23, 2, 1, '2020-05-13 14:00:00', 'Assimilated intangible productivity', 1.00, '2020-03-20 16:34:49', 1, '2020-03-20 14:34:49', '2020-03-20 14:34:49'),
(127, 76, 2, 1, '2020-05-13 15:00:00', 'Progressive dynamic productivity', 1.00, '2020-03-20 16:34:50', 1, '2020-03-20 14:34:50', '2020-03-20 14:34:50'),
(128, 33, 2, 0, '2020-04-17 16:00:00', 'Managed leadingedge policy', 1.00, '2020-03-20 16:34:50', 1, '2020-03-20 14:34:50', '2020-03-20 14:34:50'),
(129, 84, 2, 1, '2020-05-13 16:00:00', 'Distributed asynchronous extranet', 1.00, '2020-03-20 16:34:50', 0, '2020-03-20 14:34:50', '2020-03-20 14:34:50'),
(130, 58, 2, 1, '2020-04-24 13:00:00', 'Upgradable regional processimprovement', 1.00, '2020-03-20 16:34:50', 0, '2020-03-20 14:34:50', '2020-03-20 14:34:50'),
(131, 3, 2, 1, '2020-05-20 14:00:00', 'Versatile full-range benchmark', 1.00, '2020-03-20 16:34:50', 1, '2020-03-20 14:34:50', '2020-03-20 14:34:50'),
(132, 76, 19, 0, '2020-04-12 00:00:00', 'Future-proofed leadingedge matrices', 1.00, '2020-03-20 16:34:51', 1, '2020-03-20 14:34:51', '2020-03-20 14:34:51'),
(133, 84, 19, 1, '2020-04-12 01:00:00', 'Multi-channelled optimizing synergy', 1.00, '2020-03-20 16:34:51', 0, '2020-03-20 14:34:51', '2020-03-20 14:34:51'),
(134, 52, 19, 0, '2020-04-12 02:00:00', 'Robust 24/7 blockchain', 1.00, '2020-03-20 16:34:51', 1, '2020-03-20 14:34:51', '2020-03-20 14:34:51'),
(135, 52, 2, 1, '2020-05-20 15:00:00', 'Fully-configurable incremental encryption', 1.00, '2020-03-20 16:34:51', 0, '2020-03-20 14:34:51', '2020-03-20 14:34:51'),
(136, 48, 2, 1, '2020-04-24 14:00:00', 'Synchronised disintermediate encryption', 1.00, '2020-03-20 16:34:52', 1, '2020-03-20 14:34:52', '2020-03-20 14:34:52'),
(137, 48, 2, 0, '2020-04-24 15:00:00', 'Secured methodical structure', 1.00, '2020-03-20 16:34:52', 1, '2020-03-20 14:34:52', '2020-03-20 14:34:52'),
(138, 14, 2, 1, '2020-05-03 13:00:00', 'Intuitive demand-driven openarchitecture', 1.00, '2020-03-20 16:34:53', 0, '2020-03-20 14:34:53', '2020-03-20 14:34:53'),
(139, 33, 19, 0, '2020-04-12 03:00:00', 'Managed hybrid instructionset', 1.00, '2020-03-20 16:34:53', 0, '2020-03-20 14:34:53', '2020-03-20 14:34:53'),
(140, 85, 19, 0, '2020-04-12 04:00:00', 'Polarised zerodefect intranet', 1.00, '2020-03-20 16:34:54', 1, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(141, 6, 19, 0, '2020-04-12 05:00:00', 'Managed 3rdgeneration service-desk', 1.00, '2020-03-20 16:34:54', 0, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(142, 3, 2, 1, '2020-05-20 16:00:00', 'Self-enabling dedicated productivity', 1.00, '2020-03-20 16:34:54', 0, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(143, 37, 2, 1, '2020-04-24 16:00:00', 'Multi-lateral multi-state solution', 1.00, '2020-03-20 16:34:54', 1, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(144, 10, 2, 1, '2020-05-03 14:00:00', 'Compatible directional ability', 1.00, '2020-03-20 16:34:54', 1, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(145, 88, 19, 1, '2020-04-12 06:00:00', 'User-friendly 5thgeneration encoding', 1.00, '2020-03-20 16:34:54', 1, '2020-03-20 14:34:54', '2020-03-20 14:34:54'),
(146, 1, 19, 0, '2020-04-12 07:00:00', 'Ameliorated transitional forecast', 1.00, '2020-03-20 16:34:55', 1, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(147, 88, 2, 1, '2020-05-01 13:00:00', 'Automated even-keeled interface', 1.00, '2020-03-20 16:34:55', 0, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(148, 6, 2, 0, '2020-05-03 15:00:00', 'De-engineered bandwidth-monitored adapter', 1.00, '2020-03-20 16:34:55', 0, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(149, 25, 2, 0, '2020-05-27 14:00:00', 'Streamlined actuating analyzer', 1.00, '2020-03-20 16:34:55', 1, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(150, 33, 2, 0, '2020-05-03 16:00:00', 'Seamless content-based localareanetwork', 1.00, '2020-03-20 16:34:55', 0, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(151, 25, 2, 0, '2020-05-01 14:00:00', 'Seamless cohesive algorithm', 1.00, '2020-03-20 16:34:55', 0, '2020-03-20 14:34:55', '2020-03-20 14:34:55'),
(152, 75, 2, 0, '2020-05-01 15:00:00', 'Function-based zeroadministration openarchitecture', 1.00, '2020-03-20 16:34:56', 1, '2020-03-20 14:34:56', '2020-03-20 14:34:56'),
(153, 78, 2, 0, '2020-05-01 16:00:00', 'Total tertiary adapter', 1.00, '2020-03-20 16:34:56', 0, '2020-03-20 14:34:56', '2020-03-20 14:34:56'),
(154, 48, 2, 0, '2020-05-08 13:00:00', 'Visionary responsive time-frame', 1.00, '2020-03-20 16:34:56', 0, '2020-03-20 14:34:56', '2020-03-20 14:34:56'),
(155, 81, 2, 1, '2020-05-10 13:00:00', 'Multi-tiered intangible instructionset', 1.00, '2020-03-20 16:34:56', 1, '2020-03-20 14:34:56', '2020-03-20 14:34:56'),
(156, 75, 2, 1, '2020-05-08 14:00:00', 'Quality-focused fault-tolerant flexibility', 1.00, '2020-03-20 16:34:57', 0, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(157, 25, 2, 1, '2020-05-08 15:00:00', 'Enhanced intangible opensystem', 1.00, '2020-03-20 16:34:57', 1, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(158, 3, 19, 0, '2020-04-12 08:00:00', 'Up-sized hybrid flexibility', 1.00, '2020-03-20 16:34:57', 1, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(159, 14, 2, 1, '2020-05-27 15:00:00', 'Reduced 24/7 task-force', 1.00, '2020-03-20 16:34:57', 1, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(160, 52, 19, 1, '2020-04-12 09:00:00', 'Operative client-driven structure', 1.00, '2020-03-20 16:34:57', 0, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(161, 12, 2, 1, '2020-05-10 14:00:00', 'Fundamental even-keeled service-desk', 1.00, '2020-03-20 16:34:57', 0, '2020-03-20 14:34:57', '2020-03-20 14:34:57'),
(162, 25, 2, 0, '2020-05-08 16:00:00', 'Open-architected modular middleware', 1.00, '2020-03-20 16:34:58', 0, '2020-03-20 14:34:58', '2020-03-20 14:34:58'),
(163, 84, 19, 1, '2020-04-12 10:00:00', 'Function-based methodical complexity', 1.00, '2020-03-20 16:34:58', 1, '2020-03-20 14:34:58', '2020-03-20 14:34:58'),
(164, 6, 2, 0, '2020-05-15 13:00:00', 'Cloned multi-tasking array', 1.00, '2020-03-20 16:34:58', 0, '2020-03-20 14:34:58', '2020-03-20 14:34:58'),
(165, 25, 19, 1, '2020-04-18 18:00:00', 'Multi-channelled contextually-based openarchitecture', 1.00, '2020-03-20 16:34:58', 0, '2020-03-20 14:34:58', '2020-03-20 14:34:58'),
(166, 10, 19, 1, '2020-04-18 19:00:00', 'Future-proofed regional interface', 1.00, '2020-03-20 16:34:59', 0, '2020-03-20 14:34:59', '2020-03-20 14:34:59'),
(167, 25, 19, 1, '2020-04-18 20:00:00', 'Customizable coherent processimprovement', 1.00, '2020-03-20 16:34:59', 0, '2020-03-20 14:34:59', '2020-03-20 14:34:59'),
(168, 37, 19, 0, '2020-04-18 21:00:00', 'Synergized mission-critical pricingstructure', 1.00, '2020-03-20 16:34:59', 0, '2020-03-20 14:34:59', '2020-03-20 14:34:59'),
(169, 81, 2, 1, '2020-05-27 16:00:00', 'Centralized hybrid blockchain', 1.00, '2020-03-20 16:34:59', 1, '2020-03-20 14:34:59', '2020-03-20 14:34:59'),
(170, 74, 2, 1, '2020-05-10 15:00:00', 'Cross-group national firmware', 1.00, '2020-03-20 16:34:59', 1, '2020-03-20 14:34:59', '2020-03-20 14:34:59'),
(171, 23, 19, 0, '2020-04-18 22:00:00', 'Universal impactful intranet', 1.00, '2020-03-20 16:35:00', 0, '2020-03-20 14:35:00', '2020-03-20 14:35:00'),
(172, 33, 19, 1, '2020-04-18 23:00:00', 'Total dedicated methodology', 1.00, '2020-03-20 16:35:00', 1, '2020-03-20 14:35:00', '2020-03-20 14:35:00'),
(173, 12, 19, 1, '2020-04-19 00:00:00', 'De-engineered client-server parallelism', 1.00, '2020-03-20 16:35:00', 1, '2020-03-20 14:35:00', '2020-03-20 14:35:00'),
(174, 49, 2, 0, '2020-05-15 14:00:00', 'Decentralized impactful customerloyalty', 1.00, '2020-03-20 16:35:00', 1, '2020-03-20 14:35:00', '2020-03-20 14:35:00'),
(175, 78, 2, 0, '2020-06-03 14:00:00', 'Innovative hybrid moratorium', 1.00, '2020-03-20 16:35:01', 0, '2020-03-20 14:35:01', '2020-03-20 14:35:01'),
(176, 76, 19, 1, '2020-04-19 01:00:00', 'Team-oriented systemic service-desk', 1.00, '2020-03-20 16:35:01', 0, '2020-03-20 14:35:01', '2020-03-20 14:35:01'),
(177, 84, 2, 1, '2020-05-15 15:00:00', 'Re-engineered mission-critical architecture', 1.00, '2020-03-20 16:35:01', 1, '2020-03-20 14:35:01', '2020-03-20 14:35:01'),
(178, 76, 19, 1, '2020-04-19 02:00:00', 'Grass-roots motivating database', 1.00, '2020-03-20 16:35:01', 1, '2020-03-20 14:35:01', '2020-03-20 14:35:01'),
(179, 68, 19, 0, '2020-04-19 03:00:00', 'Operative client-driven matrices', 1.00, '2020-03-20 16:35:02', 0, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(180, 48, 19, 0, '2020-04-19 04:00:00', 'Horizontal hybrid hardware', 1.00, '2020-03-20 16:35:02', 0, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(181, 52, 2, 1, '2020-05-15 16:00:00', 'Total bi-directional processimprovement', 1.00, '2020-03-20 16:35:02', 1, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(182, 74, 19, 1, '2020-04-19 05:00:00', 'Compatible 24hour matrix', 1.00, '2020-03-20 16:35:02', 0, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(183, 23, 19, 1, '2020-04-19 06:00:00', 'Secured composite superstructure', 1.00, '2020-03-20 16:35:02', 1, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(184, 68, 19, 1, '2020-04-19 07:00:00', 'Enterprise-wide contextually-based capacity', 1.00, '2020-03-20 16:35:02', 1, '2020-03-20 14:35:02', '2020-03-20 14:35:02'),
(185, 23, 19, 0, '2020-04-19 08:00:00', 'Object-based nextgeneration function', 1.00, '2020-03-20 16:35:03', 0, '2020-03-20 14:35:03', '2020-03-20 14:35:03'),
(186, 25, 19, 1, '2020-04-19 09:00:00', 'Future-proofed 24/7 adapter', 1.00, '2020-03-20 16:35:03', 0, '2020-03-20 14:35:03', '2020-03-20 14:35:03'),
(187, 14, 19, 1, '2020-04-19 10:00:00', 'Self-enabling mission-critical focusgroup', 1.00, '2020-03-20 16:35:03', 0, '2020-03-20 14:35:03', '2020-03-20 14:35:03'),
(188, 5, 2, 0, '2020-05-22 13:00:00', 'Streamlined web-enabled migration', 1.00, '2020-03-20 16:35:03', 0, '2020-03-20 14:35:03', '2020-03-20 14:35:03'),
(189, 4, 19, 0, '2020-04-25 18:00:00', 'Distributed regional access', 1.00, '2020-03-20 16:35:04', 1, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(190, 67, 2, 0, '2020-06-03 15:00:00', 'Ameliorated executive info-mediaries', 1.00, '2020-03-20 16:35:04', 0, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(191, 84, 19, 0, '2020-04-25 19:00:00', 'Networked explicit capacity', 1.00, '2020-03-20 16:35:04', 1, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(192, 48, 2, 0, '2020-06-03 16:00:00', 'Total fresh-thinking conglomeration', 1.00, '2020-03-20 16:35:04', 0, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(193, 71, 19, 1, '2020-04-25 20:00:00', 'Phased motivating core', 1.00, '2020-03-20 16:35:04', 1, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(194, 25, 2, 1, '2020-05-22 14:00:00', 'Polarised assymetric concept', 1.00, '2020-03-20 16:35:04', 1, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(195, 84, 19, 1, '2020-04-25 21:00:00', 'Secured executive neural-net', 1.00, '2020-03-20 16:35:04', 1, '2020-03-20 14:35:04', '2020-03-20 14:35:04'),
(196, 58, 19, 0, '2020-04-25 22:00:00', 'Future-proofed didactic concept', 1.00, '2020-03-20 16:35:05', 0, '2020-03-20 14:35:05', '2020-03-20 14:35:05'),
(197, 37, 19, 1, '2020-04-25 23:00:00', 'Quality-focused even-keeled software', 1.00, '2020-03-20 16:35:05', 1, '2020-03-20 14:35:05', '2020-03-20 14:35:05'),
(198, 33, 2, 0, '2020-05-10 16:00:00', 'Profound discrete GraphicalUserInterface', 1.00, '2020-03-20 16:35:05', 0, '2020-03-20 14:35:05', '2020-03-20 14:35:05'),
(199, 42, 2, 1, '2020-05-17 13:00:00', 'Open-source content-based GraphicInterface', 1.00, '2020-03-20 16:35:05', 1, '2020-03-20 14:35:05', '2020-03-20 14:35:05'),
(200, 74, 2, 0, '2020-05-17 14:00:00', 'Right-sized tangible artificialintelligence', 1.00, '2020-03-20 16:35:06', 0, '2020-03-20 14:35:06', '2020-03-20 14:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_fees` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `delivery_fees`, `created_at`, `updated_at`) VALUES
(1, 'Mansoura', 10.00, NULL, NULL),
(2, 'Cairo', 10.00, NULL, NULL),
(3, 'Alexandria', 10.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', NULL, NULL),
(2, 'Sunday', NULL, NULL),
(3, 'Monday', NULL, NULL),
(4, 'Tuesday', NULL, NULL),
(5, 'Wednesday', NULL, NULL),
(6, 'Thursday', NULL, NULL),
(7, 'Friday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `qualifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offers_callup` tinyint(1) DEFAULT NULL,
  `fees` double(8,2) DEFAULT NULL,
  `callup_fees` double(8,2) DEFAULT NULL,
  `benefit` decimal(8,2) DEFAULT NULL,
  `cu_benefit` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `qualifications`, `speciality_id`, `address`, `offers_callup`, `fees`, `callup_fees`, `benefit`, `cu_benefit`, `created_at`, `updated_at`) VALUES
(1, 2, 'Exclusive zerodefect application', 1, '40931 Nicola Fort\nEast Geovanyborough, WI 32353-1389', 1, 455.00, 172.00, '0.23', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(2, 19, 'Multi-lateral encompassing data-warehouse', 1, '350 Vanessa Crossroad Apt. 042\nKrystalside, MS 16541-1888', 1, 215.00, 203.00, '0.23', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(3, 21, 'Customer-focused directional encoding', 2, '85735 Claudine Corners Apt. 675\nLueilwitzland, WV 64460-0680', 1, 303.00, 279.00, '0.21', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(4, 24, 'Cloned zeroadministration workforce', 2, '362 Heathcote Burg\nEast Rosalynmouth, VT 69163-6735', 0, 221.00, NULL, '0.19', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(5, 30, 'Profit-focused hybrid throughput', 2, '9963 Prohaska Junctions Apt. 892\nSouth Cathrineview, VT 47020-6322', 1, 482.00, 288.00, '0.20', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(6, 32, 'Mandatory holistic blockchain', 2, '5416 Hammes Squares\nAdamsstad, OR 42465', 0, 296.00, NULL, '0.17', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(7, 40, 'Reduced hybrid groupware', 1, '2244 Alanna Flat Suite 455\nNorth Rafaela, KY 24232-1974', 1, 448.00, 282.00, '0.23', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(8, 55, 'Front-line eco-centric definition', 1, '891 Ondricka Hill Suite 975\nJordytown, HI 13462-3108', 0, 203.00, NULL, '0.19', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(9, 57, 'Customizable user-facing ability', 1, '853 Stamm Knolls\nAlexzanderburgh, CO 79145', 0, 349.00, NULL, '0.11', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(10, 59, 'Object-based mobile synergy', 1, '1031 Cummings Avenue Suite 486\nWest Natberg, KY 57177-7575', 0, 381.00, NULL, '0.21', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(11, 61, 'Pre-emptive analyzing algorithm', 2, '58227 Willa Track Suite 534\nLoyalmouth, UT 18524', 1, 384.00, 395.00, '0.16', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(12, 63, 'Pre-emptive coherent toolset', 2, '8923 White Trail\nSouth Trishaton, ME 18267', 1, 465.00, 450.00, '0.13', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(13, 69, 'Visionary attitude-oriented leverage', 1, '33574 O\'Connell Isle\nSouth Demond, MT 51213-0694', 1, 173.00, 108.00, '0.15', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(14, 70, 'Front-line executive support', 1, '95975 Nienow Course\nFriesenshire, OH 39018-0015', 0, 486.00, NULL, '0.20', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(15, 73, 'Cross-group uniform complexity', 1, '35627 Dickens Landing\nO\'Reillystad, NC 01343-8187', 0, 397.00, NULL, '0.18', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(16, 77, 'Vision-oriented bandwidth-monitored interface', 2, '176 Rhiannon Centers Suite 304\nAntwanburgh, TN 59854', 0, 220.00, NULL, '0.11', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(17, 80, 'Intuitive contextually-based portal', 1, '411 Rutherford Divide Suite 413\nMarinabury, NH 62070-4325', 1, 272.00, 139.00, '0.12', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(18, 83, 'Triple-buffered object-oriented portal', 2, '4882 Vicky Ridge Apt. 805\nRosemariemouth, IN 68620-5195', 1, 341.00, 223.00, '0.21', 0, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(19, 87, 'Organic system-worthy emulation', 1, '9745 Solon Extension Apt. 520\nWest Felicita, UT 34339', 1, 138.00, 323.00, '0.11', 1, '2020-03-18 08:39:36', '2020-03-18 08:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_prescriptions`
--

CREATE TABLE `doctor_prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_ratings`
--

CREATE TABLE `doctor_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behavior` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `efficiency` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_ratings`
--

INSERT INTO `doctor_ratings` (`id`, `appointment_id`, `review`, `behavior`, `price`, `efficiency`, `created_at`, `updated_at`) VALUES
(1, 42, 'Yet you finished the first witness,\' said the Hatter. Alice felt dreadfully puzzled. The Hatter\'s.', 2, 1, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(2, 59, 'Beautiful, beauti--FUL SOUP!\' \'Chorus again!\' cried the Mouse, who was passing at the flowers and.', 5, 2, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(3, 63, 'Caterpillar. Alice said to Alice, that she was ever to get an opportunity of showing off her.', 3, 3, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(4, 67, 'Alice. One of the shepherd boy--and the sneeze of the tea--\' \'The twinkling of the trial.\' \'Stupid.', 1, 1, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(5, 10, 'I WAS when I grow up, I\'ll write one--but I\'m grown up now,\' she added in a long, low hall, which.', 2, 1, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(6, 100, 'Gryphon. \'I\'ve forgotten the Duchess asked, with another hedgehog, which seemed to have changed.', 4, 5, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(7, 20, 'Alice dodged behind a great crowd assembled about them--all sorts of little animals and birds.', 5, 1, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(8, 21, 'She was a little shriek and a large mushroom growing near her, she began, rather timidly, saying.', 2, 2, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(9, 88, 'Dormouse into the garden door. Poor Alice! It was the Hatter. He came in sight of the evening.', 2, 1, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(10, 85, 'Would not, could not, would not, could not, would not, could not, would not, could not, would not.', 5, 1, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(11, 1, 'Alice remained looking thoughtfully at the top of it. Presently the Rabbit just under the window.', 5, 1, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(12, 50, 'Cat. \'I said pig,\' replied Alice; \'and I wish you wouldn\'t mind,\' said Alice: \'besides, that\'s not.', 1, 4, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(13, 72, 'I had our Dinah here, I know I do!\' said Alice to herself, \'the way all the right house, because.', 1, 4, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(14, 77, 'Caterpillar seemed to quiver all over their shoulders, that all the things I used to know. Let me.', 5, 4, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(15, 30, 'White Rabbit; \'in fact, there\'s nothing written on the ground as she wandered about in the flurry.', 1, 1, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(16, 66, 'Hatter, \'or you\'ll be asleep again before it\'s done.\' \'Once upon a little shriek and a crash of.', 2, 5, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(17, 78, 'Alice started to her head, and she hurried out of the trees had a little snappishly. \'You\'re.', 5, 4, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(18, 22, 'Elsie, Lacie, and Tillie; and they can\'t prove I did: there\'s no meaning in it,\' said the.', 4, 1, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(19, 70, 'I can\'t put it into one of the month, and doesn\'t tell what o\'clock it is!\' As she said to one of.', 4, 2, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(20, 71, 'Stop this moment, I tell you, you coward!\' and at last the Caterpillar decidedly, and there was.', 3, 4, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(21, 89, 'And the Gryphon said, in a fight with another hedgehog, which seemed to have finished,\' said the.', 4, 4, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(22, 53, 'Alice; \'you needn\'t be so proud as all that.\' \'With extras?\' asked the Gryphon, and the other.', 1, 4, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(23, 54, 'The King laid his hand upon her face. \'Wake up, Dormouse!\' And they pinched it on both sides of.', 1, 3, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(24, 97, 'And she thought at first she thought it must be shutting up like telescopes: this time it all is!.', 5, 5, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(25, 95, 'D,\' she added in an angry voice--the Rabbit\'s--\'Pat! Pat! Where are you?\' And then a great.', 3, 3, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(26, 25, 'I could show you our cat Dinah: I think you\'d take a fancy to herself as she went nearer to make.', 5, 2, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(27, 36, 'He looked at it again: but he now hastily began again, using the ink, that was linked into hers.', 5, 5, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(28, 75, 'Gryphon in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an unusually large saucepan.', 1, 1, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(29, 98, 'Alice could not make out that she was saying, and the procession moved on, three of the way out of.', 3, 5, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(30, 60, 'I say--that\'s the same when I got up very sulkily and crossed over to the Knave of Hearts, who.', 3, 4, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(31, 87, 'ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense.', 2, 3, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(32, 96, 'Alice had not attended to this mouse? Everything is so out-of-the-way down here, and I\'m sure _I_.', 2, 1, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(33, 7, 'When the procession moved on, three of the trial.\' \'Stupid things!\' Alice began telling them her.', 2, 4, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(34, 15, 'What happened to you? Tell us all about it!\' and he poured a little while, however, she again.', 2, 3, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(35, 6, 'Alice. \'What sort of people live about here?\' \'In THAT direction,\' the Cat said, waving its tail.', 1, 3, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(36, 8, 'The first witness was the cat.) \'I hope they\'ll remember her saucer of milk at tea-time. Dinah my.', 1, 3, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(37, 44, 'Alice. \'Oh, don\'t bother ME,\' said Alice indignantly, and she dropped it hastily, just in time to.', 3, 3, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(38, 45, 'King was the fan and the three gardeners at it, busily painting them red. Alice thought over all.', 4, 1, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(39, 91, 'English. \'I don\'t see how he can EVEN finish, if he would not allow without knowing how old it.', 1, 3, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(40, 24, 'Mary Ann, and be turned out of the room. The cook threw a frying-pan after her as she leant.', 1, 5, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(41, 93, 'Duchess, as she spoke. \'I must be collected at once without waiting for turns, quarrelling all the.', 5, 4, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(42, 12, 'But there seemed to be a Caucus-race.\' \'What IS a long way. So she began: \'O Mouse, do you know.', 1, 3, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(43, 92, 'Mock Turtle, suddenly dropping his voice; and Alice thought she might find another key on it, and.', 4, 2, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(44, 5, 'Gryphon lifted up both its paws in surprise. \'What! Never heard of such a dreadful time.\' So Alice.', 2, 3, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(45, 73, 'Duchess and the happy summer days. THE.', 5, 1, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(46, 9, 'It\'ll be no chance of getting her hands on her hand, and Alice was beginning to grow here,\' said.', 3, 2, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(47, 82, 'I fell off the subjects on his slate with one eye, How the Owl and the reason is--\' here the.', 1, 4, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(48, 86, 'Dormouse. \'Don\'t talk nonsense,\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but.', 2, 1, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(49, 99, 'Alice. \'Now we shall have somebody to talk about wasting IT. It\'s HIM.\' \'I don\'t much care.', 1, 1, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(50, 27, 'I THINK,\' said Alice. \'You did,\' said the Gryphon, and, taking Alice by the Hatter, \'when the.', 1, 4, 5, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(51, 37, 'King eagerly, and he went on growing, and very neatly and simply arranged; the only one who got.', 2, 3, 1, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(52, 74, 'This of course, to begin at HIS time of life. The King\'s argument was, that she began looking at.', 2, 3, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(53, 28, 'THAT\'S a good deal: this fireplace is narrow, to be two people. \'But it\'s no use in waiting by the.', 1, 2, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(54, 26, 'Mock Turtle with a knife, it usually bleeds; and she felt that there was a queer-shaped little.', 1, 5, 4, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(55, 48, 'Alice could not answer without a moment\'s pause. The only things in the world you fly, Like a.', 4, 4, 2, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(56, 13, 'First, she tried the little creature down, and was just in time to be a footman because he was.', 3, 2, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05'),
(57, 81, 'Alice panted as she leant against a buttercup to rest her chin in salt water. Her first idea was.', 3, 3, 3, '2020-03-18 08:40:05', '2020-03-18 08:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `dosages`
--

CREATE TABLE `dosages` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `dosage_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, NULL),
(2, 'Female', NULL, NULL),
(3, 'Prefer not to say', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pills', NULL, NULL),
(2, 'Syrup', NULL, NULL),
(3, 'Injection', NULL, NULL),
(4, 'Headache', NULL, NULL),
(5, 'Diabetes', NULL, NULL),
(6, 'Capsules', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keyword_searches`
--

CREATE TABLE `keyword_searches` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(10) UNSIGNED NOT NULL,
  `search_query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `localization`
--

CREATE TABLE `localization` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `localization`
--

INSERT INTO `localization` (`id`, `app`, `key`, `en`, `ar`, `created_at`, `updated_at`) VALUES
(1, 'c', 'onboard1_main', 'The Best Doctors', 'افضل الأطباء', NULL, NULL),
(2, 'c', 'onboard1_para', 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor', 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك', NULL, NULL),
(3, 'c', 'next', 'Next', 'التالي', NULL, NULL),
(4, 'c', 'skip', 'Skip', 'تخطي', NULL, NULL),
(5, 'c', 'onboard2_main', 'Find your Medicine', 'ابحث عن دوائك', NULL, NULL),
(6, 'c', 'onboard2_para', 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor', 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك', NULL, NULL),
(7, 'c', 'onboard3_main', 'All-in-one-App', 'الكل في تطبيق واحد', NULL, NULL),
(8, 'c', 'onboard3_para', 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor', 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك', NULL, NULL),
(9, 'c', 'signup', 'Sign Up', 'انشاء حساب', NULL, NULL),
(10, 'c', 'signin', 'Sign In', 'تسجيل دخول', NULL, NULL),
(11, 'c', 'wel', 'Welcome Back!', 'مرحباََ بعودتك', NULL, NULL),
(12, 'c', 'sign_account', 'Sign in to your account', 'سجل الدخول الى حسابك', NULL, NULL),
(13, 'c', 'email_phone', 'Email Address or Phone Number', 'البريد الإلكتروني أو رقم الموبايل', NULL, NULL),
(14, 'c', 'e_email_phone', 'enter your email or phone number', 'ادخل بريدك الإلكتروني أو رقم الموبايل', NULL, NULL),
(15, 'c', 'u_pass', 'Your Password', 'كلمة السر الخاصة بك', NULL, NULL),
(16, 'c', 'e_pass', 'Enter your password', 'ادخل كلمة السر الخاصة بك', NULL, NULL),
(17, 'c', 'f_pass', 'Forgot Password?', 'نسيت كلمة السر', NULL, NULL),
(18, 'c', 'dont_have', 'Don’t have an account?', 'ليس لديك حساب؟', NULL, NULL),
(19, 'c', 'full_name', 'Full Name', 'الإسم بالكامل', NULL, NULL),
(20, 'c', 'u_name', 'Your name', 'إسمك', NULL, NULL),
(21, 'c', 'email', 'Email', 'البريد الإلكتروني', NULL, NULL),
(22, 'c', 'u_email', 'Your email', 'بريدك الإلكتروني', NULL, NULL),
(23, 'c', 'city', 'City', 'المدينة', NULL, NULL),
(24, 'c', 'pass', 'Password', 'كلمة السر', NULL, NULL),
(25, 'c', 'w_pass', 'Write Your password', 'اكتب كلمة السر الخاصة بك', NULL, NULL),
(26, 'c', 'c_pass', 'Confirm Password', 'تأكيد كلمة السر', NULL, NULL),
(27, 'c', 'have_acc', 'Already have an account?', 'لديك حساب بالفعل؟', NULL, NULL),
(28, 'c', 'home', 'Home', 'الرئيسية', NULL, NULL),
(29, '1', 'need_help', 'Do You Need Help?', 'بحاجة الى مساعدة؟', NULL, NULL),
(30, '1', 'find_dm', 'Find your Doctor & Medicine?', 'ابحث عن طبيبك وعلاجك', NULL, NULL),
(31, '1', 'search_dm', 'Search doctor/medication', 'ابحث عن الطبيب/الدواء', NULL, NULL),
(32, '1', 'medicine', 'MEDICATIONS', 'الأدوية', NULL, NULL),
(33, '1', 'doctor', 'DOCTORS', 'الأطباء', NULL, NULL),
(34, '1', 'appointments', 'Appointments', 'المواعيد', NULL, NULL),
(35, '1', 'prescription', 'Prescription', 'الروشتات', NULL, NULL),
(36, '1', 'orders', 'Orders', 'الطلبات', NULL, NULL),
(37, '1', 'notifications', 'Notifications', 'الإشعارات', NULL, NULL),
(38, '1', 'reviews', 'Reviews', 'التعليقات', NULL, NULL),
(39, '1', 'book_now', 'Book now', 'احجز الآن', NULL, NULL),
(40, '1', 'home_visit', 'Home Visit', 'زيارة منزلية', NULL, NULL),
(41, '1', 'booking', 'Booking', 'حجز', NULL, NULL),
(42, '1', 'biography', 'Biography', 'السيرة الشخصية', NULL, NULL),
(43, '1', 'degrees', 'Degrees', 'الدرجات', NULL, NULL),
(44, '1', 'profile', 'Profile', 'الملف الشخصي', NULL, NULL),
(45, '1', 'contact_info', 'Contact info', 'بيانات التواصل', NULL, NULL),
(46, '1', 'doctors', 'Doctors', 'الأطباء', NULL, NULL),
(47, '1', 'search_doctors', 'Search Doctors', 'البحث عن الأطباء', NULL, NULL),
(48, '1', 'book', 'Book', 'احجز', NULL, NULL),
(49, '1', 'medications', 'Medications', 'الأدوية', NULL, NULL),
(50, '1', 'search_medications', 'Search Medications', 'البحث عن الأدوية', NULL, NULL),
(51, '1', 'buy_now', 'Buy now', 'اشتري الآن', NULL, NULL),
(52, '1', 'delivery_cost', 'Delivery Cost', 'تكلفة التوصيل', NULL, NULL),
(53, '1', 'based_address', 'Based on your address', 'بناء على عنوانك', NULL, NULL),
(54, '1', 'change_address', 'Change Address', 'تغيير العنوان', NULL, NULL),
(55, '1', 'pharmacies_list', 'Pharmacies list', 'قائمة الصيدليات', NULL, NULL),
(56, '1', 'order', 'Order', 'طلب', NULL, NULL),
(57, '1', 'add_cart', 'Add to cart', 'اضف إلى العربة', NULL, NULL),
(58, '1', 'reviews', 'Reviews', 'التعليقات', NULL, NULL),
(59, '1', 'le', 'LE', 'ج.م.', NULL, NULL),
(60, '1', 'all', 'All', 'الكل', NULL, NULL),
(61, '1', 'booking', 'Booking', 'الحجز', NULL, NULL),
(62, '1', 'call_up', 'Call up', 'الإستدعاء', NULL, NULL),
(63, '1', 're_exam', 'Re-Examination', 'اعادة الكشف', NULL, NULL),
(64, '1', 'booking', 'Booking', 'الحجز', NULL, NULL),
(65, '1', 'sent_you', 'sent you a', 'ارسل اليك', NULL, NULL),
(66, '1', 'prescription', 'prescription', 'روشتة', NULL, NULL);

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
(1, '2019_12_08_170030_create_images_table', 1),
(2, '2019_12_08_170204_create_user_roles_table', 1),
(3, '2019_12_08_170234_create_genders_table', 1),
(4, '2019_12_08_170322_create_days_table', 1),
(5, '2019_12_08_170450_create_cities_table', 1),
(6, '2019_12_08_173545_create_keywords_table', 1),
(7, '2019_12_08_173629_create_users_table', 1),
(8, '2019_12_08_174741_create_products_table', 1),
(9, '2019_12_08_175004_create_products_keywords_table', 1),
(10, '2019_12_08_175122_create_pharmacies_table', 1),
(11, '2019_12_08_181644_create_products_pharmacies_table', 1),
(12, '2019_12_08_181854_create_specialities_table', 1),
(13, '2019_12_08_181942_create_doctors_table', 1),
(14, '2019_12_08_182307_create_orders_table', 1),
(15, '2019_12_08_182451_create_order_details_table', 1),
(16, '2019_12_08_182611_create_pharmacy_ratings_table', 1),
(17, '2019_12_08_182704_create_appointments_table', 1),
(18, '2019_12_08_182939_create_timetables_table', 1),
(19, '2019_12_08_183057_create_doctor_ratings_table', 1),
(20, '2019_12_08_183204_create_keyword_searches_table', 1),
(21, '2019_12_08_183301_create_order_trackings_table', 1),
(22, '2019_12_08_183446_create_payment_methods_table', 1),
(23, '2019_12_08_183728_create_doctor_prescriptions_table', 1),
(24, '2019_12_08_184744_create_prescription_details_table', 1),
(25, '2019_12_08_184942_create_requests_table', 1),
(26, '2020_02_19_175336_create_localization_table', 1),
(27, '2020_03_09_135649_prescriptions', 1),
(28, '2020_03_09_143029_dosages', 1),
(29, '2020_03_09_143409_pres_day', 1),
(30, '2020_03_09_144112_favourites', 1),
(31, '2020_03_09_144412_degrees', 1),
(32, '2020_03_13_221739_create_forget_password_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pharmacy_id` int(10) UNSIGNED NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `delivery_type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pharmacy_id`, `discount`, `delivery_type`, `created_at`, `updated_at`) VALUES
(1, 10, 19, 0.00, 1, '2020-03-19 20:33:55', '2020-03-19 20:33:55'),
(2, 10, 22, 0.00, 1, '2020-03-19 20:38:37', '2020-03-19 20:38:37'),
(3, 10, 22, 0.00, 1, '2020-03-19 20:39:05', '2020-03-19 20:39:05'),
(4, 10, 13, 0.00, 1, '2020-03-19 20:39:05', '2020-03-19 20:39:05'),
(5, 10, 22, 0.00, 1, '2020-03-19 20:40:07', '2020-03-19 20:40:07'),
(6, 10, 7, 0.00, 1, '2020-03-19 20:40:07', '2020-03-19 20:40:07'),
(7, 10, 22, 0.00, 1, '2020-03-19 20:40:38', '2020-03-19 20:40:38'),
(8, 10, 22, 0.00, 1, '2020-03-19 20:40:38', '2020-03-19 20:40:38'),
(9, 10, 7, 0.00, 1, '2020-03-19 20:40:38', '2020-03-19 20:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 78, 1, '2020-03-19 20:33:56', '2020-03-19 20:33:56'),
(2, 2, 56, 2, '2020-03-19 20:38:37', '2020-03-19 20:38:37'),
(3, 3, 56, 2, '2020-03-19 20:39:05', '2020-03-19 20:39:05'),
(4, 4, 90, 2, '2020-03-19 20:39:05', '2020-03-19 20:39:05'),
(5, 5, 56, 2, '2020-03-19 20:40:07', '2020-03-19 20:40:07'),
(6, 6, 17, 2, '2020-03-19 20:40:07', '2020-03-19 20:40:07'),
(7, 7, 56, 2, '2020-03-19 20:40:38', '2020-03-19 20:40:38'),
(8, 8, 11, 2, '2020-03-19 20:40:38', '2020-03-19 20:40:38'),
(9, 9, 17, 2, '2020-03-19 20:40:38', '2020-03-19 20:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_trackings`
--

CREATE TABLE `order_trackings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_accepted` tinyint(1) NOT NULL,
  `accepted_at` datetime NOT NULL,
  `is_prepared` tinyint(1) NOT NULL,
  `prepared_at` datetime NOT NULL,
  `is_ofd` tinyint(1) NOT NULL,
  `ofd_at` datetime NOT NULL,
  `is_waiting` tinyint(1) NOT NULL,
  `waiting_at` datetime NOT NULL,
  `is_delivered` tinyint(1) NOT NULL,
  `delivered_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `card_number` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvc` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_month` int(10) UNSIGNED NOT NULL,
  `expiry_year` int(10) UNSIGNED NOT NULL,
  `card_holder_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `benefit_delivery` decimal(8,2) DEFAULT NULL,
  `benefit_pharmacy` decimal(8,2) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `user_id`, `benefit_delivery`, `benefit_pharmacy`, `address`, `created_at`, `updated_at`) VALUES
(1, 7, '0.23', '0.17', '854 Armstrong Forge Suite 830\nLake Weldonstad, WI 31967-9760', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(2, 11, '0.22', '0.14', '8194 Damion Points\nPort Danny, OK 25484', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(3, 13, '0.16', '0.22', '8170 Camille Brooks Suite 345\nSouth Jeremychester, AR 04626-7147', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(4, 15, '0.21', '0.10', '6634 Wehner Place Suite 123\nMertzberg, AZ 06214', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(5, 18, '0.20', '0.24', '2713 Schuppe Walks Apt. 811\nGislasonfurt, DE 51303-1446', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(6, 20, '0.19', '0.23', '3382 Kiehn Mount Suite 862\nEast Elianeborough, MI 27581', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(7, 26, '0.24', '0.13', '87033 Dibbert Vista Apt. 077\nPort Ivory, WV 96293-4471', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(8, 27, '0.23', '0.25', '14374 Norbert Turnpike Suite 093\nAmaliaport, WI 94974-6094', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(9, 28, '0.11', '0.14', '5112 Marquardt Courts\nNorth Bobby, MI 76190', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(10, 29, '0.11', '0.14', '990 Ivah Fields Suite 308\nFeilmouth, SC 00213', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(11, 31, '0.15', '0.16', '512 Jacobson Stravenue Apt. 026\nAureliefort, FL 84682-2277', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(12, 35, '0.13', '0.20', '4425 Fredy Village Suite 067\nBergestad, TX 45170', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(13, 38, '0.11', '0.23', '7864 Jerde Summit\nPort Minnie, MN 49433', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(14, 39, '0.12', '0.19', '57447 Stella Plain\nBogisichtown, OH 06970', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(15, 41, '0.24', '0.12', '912 Langosh Springs\nWest Tyrell, MS 49240-6729', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(16, 45, '0.25', '0.15', '95023 Dicki Crossing Apt. 739\nSchimmelhaven, MA 68696', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(17, 46, '0.13', '0.12', '6717 Prohaska Lock\nWest Tillman, IN 38186', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(18, 60, '0.14', '0.25', '91465 Gottlieb Mission Suite 595\nStarkstad, OR 24451', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(19, 62, '0.21', '0.15', '44284 Witting Island\nWest Olabury, OR 17335', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(20, 72, '0.24', '0.20', '33437 Zachariah Spurs\nEast Darrinville, NY 38773', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(21, 82, '0.18', '0.17', '97226 Ansley Spring Suite 149\nSpinkaton, MS 16632', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(22, 86, '0.11', '0.15', '2755 Lilian Fields Apt. 079\nAlisonfort, VA 71077', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(23, 89, '0.16', '0.16', '9366 Jerry Corners\nNorth Brooklyn, DC 51291', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(24, 91, '0.17', '0.18', '3230 Kiel Estate Suite 519\nAllyland, OK 17619', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(25, 92, '0.14', '0.10', '669 Angelita Gardens Apt. 216\nBoscobury, IA 10501-7161', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(26, 95, '0.18', '0.17', '58027 Murray Track Suite 342\nMarinabury, WA 03736-9021', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(27, 97, '0.16', '0.21', '8439 Casandra River\nAnkundingland, IA 73436', '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(28, 99, '0.20', '0.21', '71036 Samir Summit Apt. 606\nNew Golden, AL 96352-6852', '2020-03-18 08:39:36', '2020-03-18 08:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_ratings`
--

CREATE TABLE `pharmacy_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `medicine_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_hour` time NOT NULL,
  `end_date` date NOT NULL,
  `frequency` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `closed` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_details`
--

CREATE TABLE `prescription_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `dosage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pres_day`
--

CREATE TABLE `pres_day` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'Fluoposide', 23.02, 'The Cat\'s head with great curiosity, and this time the Mouse was swimming away from him, and said.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(2, 'Cyprolovir', 52.94, 'Our family always HATED cats: nasty, low, vulgar things! Don\'t let him know she liked them best.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(3, 'Tolevice', 124.18, 'And the muscular strength, which it gave to my right size: the next witness.\' And he added in a.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(4, 'Lacmectin', 177.77, 'Mouse, turning to Alice, they all crowded round her once more, while the rest of the Shark, But.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(5, 'Aldurafen', 101.08, 'You\'re a serpent; and there\'s no name signed at the sudden change, but very glad to get rather.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(6, 'Abacazenil', 68.83, 'Hatter: \'I\'m on the other ladder?--Why, I hadn\'t drunk quite so much!\' said Alice, \'how am I to do.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(7, 'Ethosyn', 184.70, 'I will just explain to you to offer it,\' said Alice. \'You are,\' said the March Hare meekly.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(8, 'Argaterol', 164.43, 'Alice in a minute. Alice began to feel a little pattering of feet on the hearth and grinning from.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(9, 'Exugine', 150.95, 'Cheshire Cat, she was beginning to get in?\' \'There might be some sense in your knocking,\' the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(10, 'Enanavir', 94.30, 'It means much the most curious thing I know. Silence all round, if you wouldn\'t mind,\' said Alice.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(11, 'Prepakine', 131.73, 'I had not attended to this last remark that had fluttered down from the Gryphon, with a deep sigh.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(12, 'Acammulin', 121.40, 'It was the Hatter. \'I deny it!\' said the Dodo said, \'EVERYBODY has won, and all the other arm.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(13, 'Pandeine', 187.67, 'Dodo could not stand, and she was coming to, but it said in a sorrowful tone, \'I\'m afraid I can\'t.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(14, 'Halosyn', 21.08, 'This time there were a Duck and a pair of white kid gloves, and she had never had to leave off.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(15, 'Endomax', 198.93, 'YOU,\"\' said Alice. \'What IS the fun?\' said Alice. \'I\'ve tried every way, and nothing seems to suit.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(16, 'Epinenamic', 81.94, 'Alice\'s elbow was pressed hard against it, that attempt proved a failure. Alice heard the Queen\'s.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(17, 'Haloramine', 147.88, 'She drew her foot as far as they would die. \'The trial cannot proceed,\' said the Hatter, \'I cut.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(18, 'Mycoletine', 166.13, 'Alice herself, and shouted out, \'You\'d better not talk!\' said Five. \'I heard every word you.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(19, 'Nedopogen', 20.75, 'Caterpillar seemed to be a Caucus-race.\' \'What IS the fun?\' said Alice. \'Who\'s making personal.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(20, 'Retamectin', 81.34, 'The three soldiers wandered about in a large ring, with the other ladder?--Why, I hadn\'t to bring.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(21, 'Zygestin', 196.97, 'M, such as mouse-traps, and the three gardeners instantly threw themselves flat upon their faces.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(22, 'Sulfafase', 154.55, 'Dormouse into the garden. Then she went round the hall, but they all quarrel so dreadfully one.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(23, 'Tranracin', 182.67, 'Just then she had plenty of time as she could, for her to speak good English); \'now I\'m opening.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(24, 'Nevaferal', 116.70, 'King say in a hoarse, feeble voice: \'I heard the Rabbit say, \'A barrowful will do, to begin.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(25, 'Acustadil', 94.57, 'It sounded an excellent plan, no doubt, and very angrily. \'A knot!\' said Alice, who was a general.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(26, 'Aldacset', 98.01, 'COULD he turn them out of its mouth and yawned once or twice, half hoping she might as well look.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(27, 'Primabucil', 186.46, 'Footman continued in the direction it pointed to, without trying to make herself useful, and.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(28, 'Atomopenem', 74.27, 'ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'What IS the use of a good many little girls eat eggs.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(29, 'Accuran', 118.42, 'But do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, Miss, we\'re doing our.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(30, 'Phoslapril', 100.04, 'The first thing I\'ve got back to the Classics master, though. He was looking up into the court.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(31, 'Metasomax', 177.23, 'Some of the tea--\' \'The twinkling of the what?\' said the King. \'It began with the distant green.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(32, 'Cordathacin', 148.88, 'At last the Gryphon answered, very nearly carried it out to sea. So they couldn\'t see it?\' So she.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(33, 'Nasadazole', 30.25, 'Alice. \'Off with their heads!\' and the arm that was lying under the sea,\' the Gryphon went on.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(34, 'Claripur', 128.63, 'I\'ll be jury,\" Said cunning old Fury: \"I\'ll try the patience of an oyster!\' \'I wish the creatures.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(35, 'Amofranil', 182.17, 'Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a minute, nurse! But I\'ve got to the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(36, 'Aggradocin', 138.90, 'She stretched herself up and say \"How doth the little golden key and hurried off to the dance. So.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(37, 'Abacabisome', 137.40, 'Oh dear! I\'d nearly forgotten that I\'ve got to the law, And argued each case with my wife; And the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(38, 'Alisbucil', 35.31, 'I can\'t show it you myself,\' the Mock Turtle. \'Very much indeed,\' said Alice. \'It must be shutting.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(39, 'Ofloderall', 110.44, 'Alice said to the puppy; whereupon the puppy jumped into the garden with one finger, as he spoke.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(40, 'Subnonide', 6.34, 'Gryphon, the squeaking of the court, by the hand, it hurried off, without waiting for the hot day.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(41, 'Atracudiol', 57.87, 'Mock Turtle, \'but if you\'ve seen them at dinn--\' she checked herself hastily. \'I don\'t see how he.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(42, 'Colevate', 81.25, 'PROVES his guilt,\' said the Queen, the royal children, and everybody else. \'Leave off that!\'.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(43, 'Ethamadin', 149.92, 'ARE a simpleton.\' Alice did not dare to disobey, though she looked up, but it makes rather a.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(44, 'Ambebyclor', 142.02, 'Alice: \'allow me to sell you a couple?\' \'You are old, Father William,\' the young Crab, a little.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(45, 'Bacteridarone', 66.24, 'Mouse was speaking, and this Alice thought this a good character, But said I could shut up like a.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(46, 'Neuroline', 147.38, 'Hatter: \'as the things get used to read fairy-tales, I fancied that kind of authority among them.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(47, 'Lubinex', 68.50, 'Dormouse shook itself, and began by producing from under his arm a great hurry. \'You did!\' said.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(48, 'Albendanazole', 92.33, 'I chose,\' the Duchess was VERY ugly; and secondly, because they\'re making such a very curious to.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(49, 'Traclinum', 69.61, 'I should frighten them out of sight: then it chuckled. \'What fun!\' said the Mouse. \'Of course,\'.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(50, 'Galandocet', 162.09, 'She was a very curious to see some meaning in it.\' The jury all looked so good, that it might end.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(51, 'Betasol', 86.35, 'I shan\'t! YOU do it!--That I won\'t, then!--Bill\'s to go nearer till she had someone to listen to.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(52, 'Galanletine', 188.01, 'I\'m never sure what I\'m going to leave it behind?\' She said the young man said, \'And your hair has.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(53, 'Docprazole', 37.44, 'I am now? That\'ll be a Caucus-race.\' \'What IS the fun?\' said Alice. \'Why, SHE,\' said the Mock.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(54, 'Floxuprin', 166.74, 'The first thing I\'ve got back to the conclusion that it would all come wrong, and she at once to.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(55, 'Symbybucil', 176.59, 'English); \'now I\'m opening out like the look of it in a very hopeful tone though), \'I won\'t have.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(56, 'Galantrim', 153.21, 'Majesty,\' said Alice to herself. (Alice had no very clear notion how long ago anything had.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(57, 'Antagel', 92.24, 'THEN--she found herself in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\'.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(58, 'Nutrimara', 82.38, 'Mock Turtle replied in an undertone, \'important--unimportant--unimportant--important--\' as if she.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(59, 'Temamuran', 72.76, 'Five! Always lay the blame on others!\' \'YOU\'D better not talk!\' said Five. \'I heard every word you.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(60, 'Naveltrol', 86.10, 'When I used to call him Tortoise, if he had come back with the lobsters, out to sea!\" But the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(61, 'Capsanate', 123.27, 'Alice was soon left alone. \'I wish I had it written down: but I think I can remember feeling a.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(62, 'Phosran', 111.57, 'I\'m here! Digging for apples, indeed!\' said the Mock Turtle. \'Hold your tongue!\' said the King.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(63, 'Podofenib', 8.62, 'I\'m going to remark myself.\' \'Have you guessed the riddle yet?\' the Hatter asked triumphantly.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(64, 'Specdafinil', 153.13, 'I\'m certain! I must go back by railway,\' she said this, she looked at the moment, \'My dear! I wish.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(65, 'Pediaminphen', 197.60, 'Alice went timidly up to her great disappointment it was looking about for some way, and the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(66, 'Antatiza', 72.85, 'And it\'ll fetch things when you throw them, and all sorts of things--I can\'t remember half of.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(67, 'Ciclofase', 48.77, 'She was a table, with a bound into the garden, and I shall be late!\' (when she thought of herself.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(68, 'Alariva', 110.40, 'King said gravely, \'and go on for some minutes. The Caterpillar was the cat.) \'I hope they\'ll.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(69, 'Unizoxane', 170.26, 'I know. Silence all round, if you could draw treacle out of the cattle in the sand with wooden.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(70, 'Angiorone', 168.55, 'For this must be shutting up like telescopes: this time the Queen put on your shoes and stockings.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(71, 'Liopalene', 17.64, 'Alice opened the door of the guinea-pigs cheered, and was looking at the bottom of a book,\'.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(72, 'Amphozoxane', 11.80, 'First, because I\'m on the Duchess\'s knee, while plates and dishes crashed around it--once more the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(73, 'Doctolestid', 138.39, 'So Bill\'s got to grow here,\' said the King, \'unless it was too much frightened to say \'I once.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(74, 'Ombivac', 197.86, 'Alice\'s shoulder as she could, for the Duchess asked, with another hedgehog, which seemed to have.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(75, 'Argatanyl', 51.90, 'Because he knows it teases.\' CHORUS. (In which the wretched Hatter trembled so, that he had to ask.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(76, 'Neostin', 43.08, 'Gryphon interrupted in a VERY turn-up nose, much more like a star-fish,\' thought Alice. One of the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(77, 'Eprofetan', 141.97, 'And the Gryphon replied very readily: \'but that\'s because it stays the same solemn tone, \'For the.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(78, 'Requidazole', 38.43, 'In another minute there was no longer to be seen--everything seemed to follow, except a tiny.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(79, 'Acammunex', 186.91, 'VERY nearly at the bottom of a well--\' \'What did they live at the door-- Pray, what is the same.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(80, 'Sodidarone', 58.04, 'Said he thanked the whiting kindly, but he would deny it too: but the three gardeners, but she did.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(81, 'Ranepirox', 22.06, 'King said to the Duchess: \'flamingoes and mustard both bite. And the executioner ran wildly up and.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(82, 'Adaramine', 53.04, 'The chief difficulty Alice found at first was moderate. But the snail replied \"Too far, too far!\".', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(83, 'Oxanvax', 101.09, 'I\'ll manage better this time,\' she said, as politely as she stood still where she was, and waited.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(84, 'Azeladocin', 146.78, 'VERY unpleasant state of mind, she turned away. \'Come back!\' the Caterpillar sternly. \'Explain.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(85, 'Synthebloc', 32.19, 'I must be getting home; the night-air doesn\'t suit my throat!\' and a fan! Quick, now!\' And Alice.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(86, 'Acarposide', 84.98, 'If they had at the corners: next the ten courtiers; these were ornamented all over their slates.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(87, 'Dantomulin', 122.34, 'Alice thought this a very curious to see its meaning. \'And just as usual. I wonder if I know THAT.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(88, 'Eprolazine', 62.45, 'I\'m not myself, you see.\' \'I don\'t know what it meant till now.\' \'If that\'s all I can do without.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(89, 'Exunazole', 142.48, 'Lobster Quadrille, that she had plenty of time as she spoke; \'either you or your head must be.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(90, 'Penivarix', 67.96, 'White Rabbit blew three blasts on the floor, and a fall, and a piece of it at all; and I\'m sure I.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(91, 'Altanized', 88.23, 'Gryphon said to Alice. \'Only a thimble,\' said Alice to find her way through the glass, and she ran.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(92, 'Dorzopogen', 156.37, 'Alice had not gone much farther before she got up in such a rule at processions; \'and besides.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(93, 'Symbalamin', 22.09, 'Dodo in an undertone to the baby, and not to be afraid of it. She felt very lonely and.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(94, 'Metroposide', 45.22, 'Queen\'s ears--\' the Rabbit coming to look about her other little children, and everybody else.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(95, 'Palophine', 152.51, 'EVER happen in a tone of great relief. \'Now at OURS they had a bone in his turn; and both footmen.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(96, 'Ombirix', 19.54, 'Alice to herself. (Alice had been looking over his shoulder as he could go. Alice took up the fan.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(97, 'Oflolamin', 23.29, 'Fish-Footman was gone, and, by the officers of the month, and doesn\'t tell what o\'clock it is!\' As.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(98, 'Sacrolamide', 94.59, 'And so it was a dead silence instantly, and neither of the moment how large she had nothing else.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(99, 'Malapiride', 74.61, 'Alice thought to herself, \'in my going out altogether, like a Jack-in-the-box, and up I goes like.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(100, 'Cropogen', 103.59, 'Heads below!\' (a loud crash)--\'Now, who did that?--It was Bill, the Lizard) could not think of.', NULL, '2020-03-18 08:39:36', '2020-03-18 08:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `products_keywords`
--

CREATE TABLE `products_keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_keywords`
--

INSERT INTO `products_keywords` (`id`, `product_id`, `keyword_id`, `created_at`, `updated_at`) VALUES
(1, 64, 2, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(2, 77, 2, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(3, 2, 6, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(4, 82, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(5, 5, 2, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(6, 42, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(7, 59, 2, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(8, 14, 3, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(9, 37, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(10, 57, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(11, 59, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(12, 18, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(13, 41, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(14, 91, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(15, 2, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(16, 73, 2, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(17, 29, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(18, 14, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(19, 45, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(20, 50, 3, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(21, 12, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(22, 10, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(23, 20, 3, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(24, 56, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(25, 53, 5, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(26, 17, 6, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(27, 76, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(28, 8, 1, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(29, 43, 4, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(30, 16, 6, '2020-03-18 10:06:16', '2020-03-18 10:06:16'),
(31, 62, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(32, 35, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(33, 23, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(34, 91, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(35, 60, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(36, 82, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(37, 18, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(38, 20, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(39, 61, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(40, 42, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(41, 43, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(42, 25, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(43, 49, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(44, 34, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(45, 32, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(46, 32, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(47, 57, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(48, 36, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(49, 70, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(50, 100, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(51, 96, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(52, 80, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(53, 36, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(54, 8, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(55, 8, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(56, 55, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(57, 51, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(58, 36, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(59, 71, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(60, 55, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(61, 13, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(62, 22, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(63, 87, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(64, 67, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(65, 36, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(66, 49, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(67, 60, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(68, 74, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(69, 92, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(70, 6, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(71, 3, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(72, 96, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(73, 66, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(74, 29, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(75, 81, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(76, 55, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(77, 83, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(78, 56, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(79, 25, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(80, 15, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(81, 97, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(82, 90, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(83, 27, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(84, 99, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(85, 68, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(86, 85, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(87, 1, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(88, 93, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(89, 42, 2, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(90, 33, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(91, 70, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(92, 34, 1, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(93, 94, 4, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(94, 96, 5, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(95, 86, 3, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(96, 1, 6, '2020-03-18 10:06:17', '2020-03-18 10:06:17'),
(97, 24, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(98, 66, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(99, 53, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(100, 52, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(101, 7, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(102, 2, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(103, 21, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(104, 60, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(105, 12, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(106, 25, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(107, 65, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(108, 63, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(109, 29, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(110, 62, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(111, 55, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(112, 67, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(113, 26, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(114, 43, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(115, 73, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(116, 86, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(117, 73, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(118, 52, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(119, 34, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(120, 25, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(121, 21, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(122, 83, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(123, 87, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(124, 88, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(125, 37, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(126, 61, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(127, 47, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(128, 31, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(129, 5, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(130, 98, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(131, 18, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(132, 71, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(133, 28, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(134, 45, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(135, 75, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(136, 4, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(137, 85, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(138, 75, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(139, 16, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(140, 90, 3, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(141, 62, 2, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(142, 73, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(143, 64, 5, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(144, 27, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(145, 40, 1, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(146, 52, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(147, 9, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(148, 22, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(149, 31, 6, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(150, 5, 4, '2020-03-18 10:06:18', '2020-03-18 10:06:18'),
(151, 17, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(152, 15, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(153, 39, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(154, 41, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(155, 13, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(156, 59, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(157, 94, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(158, 6, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(159, 72, 4, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(160, 78, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(161, 77, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(162, 61, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(163, 22, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(164, 82, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(165, 34, 4, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(166, 9, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(167, 64, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(168, 34, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(169, 38, 4, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(170, 41, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(171, 66, 4, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(172, 51, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(173, 100, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(174, 89, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(175, 91, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(176, 97, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(177, 53, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(178, 46, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(179, 97, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(180, 65, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(181, 83, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(182, 74, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(183, 47, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(184, 17, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(185, 4, 5, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(186, 11, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(187, 10, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(188, 93, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(189, 39, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(190, 88, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(191, 98, 6, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(192, 70, 2, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(193, 76, 3, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(194, 31, 4, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(195, 80, 1, '2020-03-18 10:06:19', '2020-03-18 10:06:19'),
(196, 71, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(197, 50, 6, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(198, 59, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(199, 62, 6, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(200, 37, 1, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(201, 49, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(202, 38, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(203, 33, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(204, 80, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(205, 76, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(206, 56, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(207, 98, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(208, 91, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(209, 51, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(210, 27, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(211, 14, 1, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(212, 100, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(213, 57, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(214, 78, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(215, 8, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(216, 3, 6, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(217, 9, 4, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(218, 91, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(219, 92, 4, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(220, 15, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(221, 47, 4, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(222, 84, 6, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(223, 26, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(224, 47, 1, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(225, 84, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(226, 54, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(227, 28, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(228, 26, 6, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(229, 82, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(230, 74, 5, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(231, 61, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(232, 11, 2, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(233, 64, 3, '2020-03-18 10:06:20', '2020-03-18 10:06:20'),
(234, 56, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(235, 66, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(236, 97, 5, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(237, 89, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(238, 29, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(239, 20, 5, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(240, 22, 3, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(241, 65, 3, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(242, 3, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(243, 64, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(244, 98, 4, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(245, 29, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(246, 28, 5, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(247, 52, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(248, 42, 5, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(249, 79, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(250, 96, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(251, 50, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(252, 28, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(253, 39, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(254, 10, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(255, 54, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(256, 71, 4, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(257, 69, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(258, 18, 3, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(259, 40, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(260, 37, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(261, 25, 4, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(262, 8, 3, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(263, 94, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(264, 92, 1, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(265, 53, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(266, 30, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(267, 35, 6, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(268, 1, 2, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(269, 27, 3, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(270, 69, 4, '2020-03-18 10:06:21', '2020-03-18 10:06:21'),
(271, 58, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(272, 93, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(273, 66, 6, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(274, 5, 1, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(275, 16, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(276, 65, 6, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(277, 13, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(278, 95, 4, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(279, 90, 2, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(280, 63, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(281, 46, 2, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(282, 59, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(283, 84, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(284, 88, 1, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(285, 53, 4, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(286, 9, 1, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(287, 6, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(288, 80, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(289, 6, 2, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(290, 48, 2, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(291, 35, 4, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(292, 24, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(293, 44, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(294, 43, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(295, 93, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(296, 92, 3, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(297, 16, 4, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(298, 78, 1, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(299, 21, 5, '2020-03-18 10:06:22', '2020-03-18 10:06:22'),
(300, 87, 1, '2020-03-18 10:06:22', '2020-03-18 10:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `products_pharmacies`
--

CREATE TABLE `products_pharmacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `pharmacy_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_pharmacies`
--

INSERT INTO `products_pharmacies` (`id`, `product_id`, `pharmacy_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 30, 24, 85, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(2, 52, 11, 523, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(3, 89, 27, 460, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(4, 99, 11, 628, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(5, 78, 19, 19, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(6, 95, 13, 892, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(7, 8, 23, 313, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(8, 75, 16, 827, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(9, 48, 5, 379, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(10, 8, 20, 472, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(11, 54, 27, 16, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(12, 68, 3, 139, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(13, 87, 13, 738, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(14, 31, 4, 293, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(15, 32, 21, 547, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(16, 64, 20, 135, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(17, 4, 27, 207, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(18, 26, 28, 696, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(19, 11, 22, 949, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(20, 55, 22, 822, '2020-03-18 08:39:36', '2020-03-18 08:39:36'),
(21, 90, 28, 104, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(22, 13, 17, 369, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(23, 24, 9, 60, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(24, 24, 7, 515, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(25, 77, 19, 8, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(26, 19, 23, 315, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(27, 75, 21, 335, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(28, 33, 1, 975, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(29, 47, 12, 462, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(30, 56, 22, 688, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(31, 17, 7, 276, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(32, 96, 22, 403, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(33, 34, 22, 622, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(34, 11, 19, 611, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(35, 90, 13, 232, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(36, 57, 8, 483, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(37, 95, 14, 300, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(38, 20, 8, 216, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(39, 89, 18, 889, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(40, 39, 12, 899, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(41, 30, 14, 137, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(42, 11, 23, 768, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(43, 86, 18, 723, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(44, 21, 18, 604, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(45, 84, 27, 264, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(46, 28, 13, 463, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(47, 87, 22, 881, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(48, 4, 25, 223, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(49, 38, 20, 164, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(50, 57, 24, 542, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(51, 60, 12, 679, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(52, 37, 5, 704, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(53, 65, 12, 586, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(54, 68, 6, 744, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(55, 11, 4, 986, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(56, 100, 1, 670, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(57, 10, 24, 881, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(58, 30, 20, 184, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(59, 3, 2, 964, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(60, 7, 25, 107, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(61, 67, 15, 314, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(62, 26, 1, 893, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(63, 8, 28, 103, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(64, 22, 21, 566, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(65, 77, 26, 895, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(66, 68, 19, 46, '2020-03-18 08:39:37', '2020-03-18 08:39:37'),
(67, 85, 2, 654, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(68, 16, 6, 996, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(69, 30, 6, 234, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(70, 28, 19, 879, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(71, 98, 14, 116, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(72, 6, 23, 524, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(73, 44, 13, 928, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(74, 61, 1, 421, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(75, 90, 3, 689, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(76, 43, 12, 252, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(77, 24, 5, 124, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(78, 6, 14, 802, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(79, 54, 14, 675, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(80, 32, 16, 255, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(81, 88, 5, 558, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(82, 37, 10, 277, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(83, 61, 3, 492, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(84, 70, 23, 510, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(85, 6, 3, 335, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(86, 65, 11, 945, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(87, 13, 1, 28, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(88, 51, 17, 14, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(89, 23, 1, 829, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(90, 74, 14, 618, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(91, 67, 4, 722, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(92, 40, 10, 65, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(93, 10, 7, 871, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(94, 96, 4, 661, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(95, 56, 26, 858, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(96, 1, 21, 662, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(97, 80, 8, 19, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(98, 39, 7, 569, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(99, 46, 3, 72, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(100, 78, 9, 828, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(101, 48, 15, 569, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(102, 98, 13, 858, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(103, 100, 3, 61, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(104, 28, 1, 35, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(105, 74, 9, 232, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(106, 79, 17, 493, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(107, 68, 17, 761, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(108, 5, 1, 955, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(109, 50, 28, 18, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(110, 81, 27, 926, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(111, 71, 12, 579, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(112, 34, 19, 454, '2020-03-18 08:39:38', '2020-03-18 08:39:38'),
(113, 91, 22, 26, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(114, 3, 14, 123, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(115, 37, 9, 262, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(116, 4, 28, 54, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(117, 91, 2, 22, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(118, 69, 3, 500, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(119, 18, 23, 404, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(120, 68, 22, 133, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(121, 58, 13, 389, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(122, 14, 11, 907, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(123, 41, 7, 845, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(124, 90, 18, 362, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(125, 35, 26, 971, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(126, 37, 1, 340, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(127, 29, 20, 573, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(128, 76, 17, 291, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(129, 44, 6, 795, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(130, 39, 11, 528, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(131, 5, 22, 475, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(132, 28, 2, 730, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(133, 98, 18, 531, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(134, 31, 26, 976, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(135, 21, 7, 54, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(136, 46, 16, 730, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(137, 75, 23, 483, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(138, 60, 22, 340, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(139, 76, 7, 172, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(140, 62, 12, 74, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(141, 72, 21, 640, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(142, 50, 20, 919, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(143, 69, 6, 932, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(144, 62, 3, 797, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(145, 4, 13, 638, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(146, 97, 9, 175, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(147, 29, 8, 532, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(148, 81, 14, 35, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(149, 24, 23, 617, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(150, 36, 10, 572, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(151, 29, 6, 379, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(152, 43, 26, 826, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(153, 88, 26, 125, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(154, 12, 27, 659, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(155, 33, 4, 226, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(156, 80, 26, 857, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(157, 23, 21, 908, '2020-03-18 08:39:39', '2020-03-18 08:39:39'),
(158, 35, 21, 832, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(159, 21, 4, 588, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(160, 82, 8, 799, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(161, 64, 23, 933, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(162, 58, 16, 258, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(163, 37, 7, 990, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(164, 26, 21, 889, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(165, 65, 25, 975, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(166, 54, 5, 101, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(167, 54, 10, 603, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(168, 58, 19, 891, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(169, 30, 10, 243, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(170, 92, 27, 284, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(171, 16, 4, 664, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(172, 20, 27, 525, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(173, 6, 21, 968, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(174, 21, 16, 466, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(175, 24, 6, 744, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(176, 64, 27, 869, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(177, 28, 24, 228, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(178, 70, 2, 492, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(179, 87, 5, 134, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(180, 72, 5, 11, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(181, 99, 12, 962, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(182, 94, 12, 653, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(183, 49, 12, 639, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(184, 96, 19, 832, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(185, 74, 22, 992, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(186, 31, 3, 510, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(187, 15, 21, 529, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(188, 12, 10, 125, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(189, 9, 6, 85, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(190, 55, 8, 233, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(191, 45, 1, 342, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(192, 25, 8, 194, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(193, 48, 16, 357, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(194, 95, 8, 541, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(195, 67, 5, 169, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(196, 6, 24, 870, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(197, 98, 2, 308, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(198, 71, 19, 763, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(199, 46, 20, 423, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(200, 37, 20, 969, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(201, 91, 23, 284, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(202, 22, 23, 255, '2020-03-18 08:39:40', '2020-03-18 08:39:40'),
(203, 3, 21, 124, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(204, 69, 27, 470, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(205, 65, 23, 258, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(206, 67, 22, 111, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(207, 2, 19, 969, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(208, 65, 8, 985, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(209, 83, 18, 100, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(210, 97, 23, 489, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(211, 95, 16, 13, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(212, 49, 25, 625, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(213, 93, 9, 318, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(214, 29, 9, 492, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(215, 85, 1, 68, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(216, 74, 6, 825, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(217, 68, 7, 69, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(218, 90, 14, 120, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(219, 16, 3, 113, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(220, 71, 4, 862, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(221, 15, 2, 797, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(222, 67, 16, 571, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(223, 98, 22, 831, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(224, 82, 11, 502, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(225, 19, 2, 539, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(226, 5, 15, 286, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(227, 73, 19, 881, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(228, 11, 5, 213, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(229, 66, 22, 576, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(230, 66, 19, 693, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(231, 60, 24, 535, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(232, 25, 12, 907, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(233, 41, 14, 235, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(234, 93, 1, 420, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(235, 88, 19, 565, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(236, 58, 10, 275, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(237, 95, 21, 199, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(238, 2, 18, 223, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(239, 60, 11, 570, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(240, 10, 14, 459, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(241, 52, 26, 8, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(242, 79, 28, 245, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(243, 31, 14, 924, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(244, 12, 21, 981, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(245, 100, 13, 538, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(246, 32, 14, 862, '2020-03-18 08:39:41', '2020-03-18 08:39:41'),
(247, 16, 18, 853, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(248, 17, 27, 194, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(249, 1, 13, 674, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(250, 77, 9, 732, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(251, 30, 13, 109, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(252, 97, 1, 164, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(253, 17, 17, 990, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(254, 65, 6, 342, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(255, 83, 11, 991, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(256, 72, 26, 201, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(257, 42, 21, 61, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(258, 93, 13, 824, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(259, 42, 22, 578, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(260, 97, 19, 40, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(261, 66, 4, 749, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(262, 98, 17, 170, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(263, 81, 22, 924, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(264, 65, 16, 375, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(265, 81, 5, 472, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(266, 97, 3, 575, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(267, 37, 3, 624, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(268, 9, 22, 912, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(269, 31, 8, 176, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(270, 47, 16, 794, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(271, 89, 19, 610, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(272, 36, 28, 896, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(273, 14, 18, 334, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(274, 56, 10, 380, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(275, 76, 2, 520, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(276, 6, 11, 109, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(277, 41, 6, 741, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(278, 9, 9, 379, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(279, 63, 3, 104, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(280, 19, 19, 895, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(281, 28, 4, 232, '2020-03-18 08:39:42', '2020-03-18 08:39:42'),
(282, 57, 11, 57, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(283, 63, 8, 829, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(284, 91, 16, 325, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(285, 22, 7, 986, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(286, 69, 2, 2, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(287, 83, 4, 438, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(288, 98, 15, 334, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(289, 62, 2, 609, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(290, 2, 1, 297, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(291, 39, 3, 595, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(292, 43, 28, 201, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(293, 66, 6, 814, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(294, 65, 24, 470, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(295, 85, 3, 733, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(296, 36, 18, 51, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(297, 43, 4, 644, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(298, 22, 5, 341, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(299, 25, 22, 619, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(300, 43, 13, 822, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(301, 100, 17, 775, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(302, 83, 28, 141, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(303, 35, 3, 177, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(304, 99, 8, 531, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(305, 43, 17, 47, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(306, 2, 8, 717, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(307, 95, 6, 577, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(308, 52, 24, 285, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(309, 55, 9, 79, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(310, 92, 22, 502, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(311, 82, 15, 444, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(312, 47, 6, 854, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(313, 87, 2, 703, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(314, 74, 25, 991, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(315, 69, 8, 654, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(316, 72, 8, 324, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(317, 94, 2, 599, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(318, 61, 9, 145, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(319, 2, 12, 914, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(320, 60, 28, 360, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(321, 7, 6, 19, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(322, 7, 8, 490, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(323, 23, 25, 12, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(324, 96, 10, 340, '2020-03-18 08:39:43', '2020-03-18 08:39:43'),
(325, 75, 28, 823, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(326, 97, 20, 619, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(327, 4, 16, 484, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(328, 42, 4, 587, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(329, 96, 20, 502, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(330, 43, 11, 351, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(331, 97, 15, 949, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(332, 46, 18, 178, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(333, 8, 6, 465, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(334, 57, 9, 37, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(335, 98, 9, 252, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(336, 67, 20, 737, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(337, 54, 13, 906, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(338, 53, 14, 929, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(339, 19, 21, 141, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(340, 64, 5, 314, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(341, 37, 25, 854, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(342, 84, 15, 126, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(343, 71, 6, 103, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(344, 16, 22, 296, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(345, 29, 23, 76, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(346, 41, 24, 328, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(347, 14, 5, 682, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(348, 91, 4, 695, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(349, 93, 17, 829, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(350, 41, 22, 619, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(351, 79, 26, 356, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(352, 24, 15, 132, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(353, 21, 9, 229, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(354, 41, 10, 384, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(355, 92, 23, 163, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(356, 80, 5, 713, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(357, 74, 4, 460, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(358, 45, 4, 892, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(359, 50, 13, 198, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(360, 71, 22, 223, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(361, 57, 17, 38, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(362, 56, 2, 572, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(363, 67, 21, 614, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(364, 23, 12, 438, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(365, 79, 1, 737, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(366, 34, 1, 872, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(367, 9, 28, 228, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(368, 7, 13, 677, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(369, 34, 8, 55, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(370, 14, 16, 849, '2020-03-18 08:39:44', '2020-03-18 08:39:44'),
(371, 20, 22, 798, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(372, 21, 2, 239, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(373, 75, 1, 790, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(374, 75, 15, 298, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(375, 55, 16, 365, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(376, 43, 21, 480, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(377, 72, 14, 516, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(378, 38, 18, 494, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(379, 63, 2, 682, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(380, 7, 24, 946, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(381, 60, 18, 748, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(382, 44, 25, 374, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(383, 33, 8, 244, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(384, 62, 18, 401, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(385, 19, 16, 355, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(386, 44, 9, 798, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(387, 69, 19, 233, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(388, 73, 16, 270, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(389, 6, 12, 112, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(390, 61, 12, 335, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(391, 14, 24, 977, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(392, 90, 7, 810, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(393, 31, 23, 939, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(394, 49, 16, 330, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(395, 74, 13, 839, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(396, 66, 7, 381, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(397, 19, 28, 902, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(398, 73, 23, 240, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(399, 80, 28, 253, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(400, 93, 10, 685, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(401, 87, 24, 74, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(402, 90, 24, 457, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(403, 64, 11, 529, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(404, 12, 13, 682, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(405, 18, 14, 91, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(406, 29, 17, 843, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(407, 48, 28, 690, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(408, 23, 27, 562, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(409, 89, 12, 368, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(410, 72, 18, 494, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(411, 79, 11, 992, '2020-03-18 08:39:45', '2020-03-18 08:39:45'),
(412, 8, 14, 863, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(413, 100, 6, 394, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(414, 79, 21, 9, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(415, 22, 24, 827, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(416, 75, 18, 770, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(417, 92, 28, 486, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(418, 5, 5, 402, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(419, 52, 21, 312, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(420, 94, 15, 14, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(421, 8, 22, 940, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(422, 23, 5, 298, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(423, 65, 7, 449, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(424, 76, 3, 256, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(425, 49, 7, 286, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(426, 35, 22, 116, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(427, 59, 18, 536, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(428, 56, 11, 664, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(429, 11, 26, 526, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(430, 68, 28, 780, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(431, 18, 10, 746, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(432, 37, 26, 143, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(433, 90, 11, 765, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(434, 72, 1, 432, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(435, 55, 21, 587, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(436, 6, 28, 824, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(437, 32, 15, 354, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(438, 78, 23, 909, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(439, 57, 6, 882, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(440, 81, 8, 774, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(441, 85, 10, 39, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(442, 21, 14, 477, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(443, 15, 28, 312, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(444, 74, 15, 499, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(445, 25, 1, 170, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(446, 20, 5, 762, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(447, 26, 16, 286, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(448, 74, 17, 454, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(449, 78, 8, 339, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(450, 39, 10, 725, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(451, 36, 12, 714, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(452, 63, 19, 256, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(453, 62, 19, 503, '2020-03-18 08:39:46', '2020-03-18 08:39:46'),
(454, 73, 6, 193, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(455, 65, 19, 558, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(456, 93, 26, 614, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(457, 76, 23, 871, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(458, 77, 5, 624, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(459, 47, 26, 869, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(460, 87, 14, 804, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(461, 47, 2, 51, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(462, 25, 19, 61, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(463, 38, 26, 350, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(464, 76, 16, 940, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(465, 18, 11, 349, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(466, 54, 17, 842, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(467, 29, 16, 111, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(468, 3, 16, 786, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(469, 45, 8, 859, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(470, 27, 19, 261, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(471, 42, 17, 36, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(472, 35, 20, 584, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(473, 54, 19, 341, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(474, 69, 28, 26, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(475, 17, 15, 501, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(476, 3, 11, 429, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(477, 28, 26, 292, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(478, 32, 2, 891, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(479, 8, 11, 509, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(480, 14, 27, 960, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(481, 79, 25, 484, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(482, 72, 28, 277, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(483, 49, 17, 356, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(484, 66, 2, 287, '2020-03-18 08:39:47', '2020-03-18 08:39:47'),
(485, 93, 21, 913, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(486, 10, 10, 927, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(487, 3, 28, 220, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(488, 44, 2, 256, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(489, 99, 2, 279, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(490, 58, 27, 637, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(491, 45, 13, 324, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(492, 70, 4, 741, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(493, 81, 13, 198, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(494, 79, 20, 671, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(495, 70, 13, 442, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(496, 25, 4, 453, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(497, 84, 22, 947, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(498, 93, 28, 591, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(499, 34, 17, 588, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(500, 84, 20, 764, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(501, 16, 26, 866, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(502, 2, 10, 584, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(503, 20, 6, 866, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(504, 28, 7, 913, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(505, 40, 7, 696, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(506, 13, 4, 281, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(507, 72, 11, 639, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(508, 65, 9, 974, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(509, 62, 9, 961, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(510, 62, 11, 259, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(511, 74, 20, 491, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(512, 5, 20, 698, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(513, 86, 1, 247, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(514, 39, 17, 381, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(515, 82, 17, 931, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(516, 32, 13, 718, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(517, 83, 17, 644, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(518, 81, 23, 651, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(519, 44, 12, 382, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(520, 11, 14, 656, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(521, 95, 3, 786, '2020-03-18 08:39:48', '2020-03-18 08:39:48'),
(522, 61, 17, 212, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(523, 84, 24, 450, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(524, 78, 18, 10, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(525, 11, 11, 348, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(526, 45, 16, 239, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(527, 84, 16, 77, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(528, 35, 28, 106, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(529, 89, 5, 470, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(530, 16, 11, 1, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(531, 76, 12, 521, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(532, 8, 7, 408, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(533, 19, 3, 85, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(534, 56, 1, 229, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(535, 60, 16, 945, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(536, 9, 21, 498, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(537, 89, 20, 106, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(538, 52, 12, 501, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(539, 56, 6, 887, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(540, 34, 3, 757, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(541, 80, 19, 668, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(542, 74, 2, 709, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(543, 64, 8, 540, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(544, 33, 17, 193, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(545, 85, 16, 41, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(546, 46, 12, 693, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(547, 1, 20, 190, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(548, 94, 23, 619, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(549, 86, 6, 749, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(550, 15, 14, 67, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(551, 16, 1, 136, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(552, 9, 8, 162, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(553, 97, 28, 281, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(554, 81, 28, 181, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(555, 95, 5, 175, '2020-03-18 08:39:49', '2020-03-18 08:39:49'),
(556, 46, 15, 56, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(557, 26, 3, 205, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(558, 93, 15, 142, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(559, 70, 28, 303, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(560, 57, 3, 548, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(561, 49, 8, 759, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(562, 70, 15, 121, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(563, 83, 1, 712, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(564, 30, 17, 246, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(565, 53, 17, 510, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(566, 16, 28, 812, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(567, 9, 13, 653, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(568, 71, 17, 580, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(569, 65, 5, 488, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(570, 65, 15, 106, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(571, 80, 15, 17, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(572, 39, 23, 880, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(573, 98, 27, 49, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(574, 91, 1, 482, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(575, 74, 24, 545, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(576, 10, 22, 426, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(577, 5, 24, 478, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(578, 11, 13, 746, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(579, 50, 16, 830, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(580, 69, 17, 451, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(581, 27, 12, 855, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(582, 62, 15, 293, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(583, 30, 4, 670, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(584, 45, 28, 883, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(585, 20, 28, 984, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(586, 54, 16, 692, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(587, 43, 20, 249, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(588, 62, 25, 347, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(589, 5, 9, 196, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(590, 23, 14, 991, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(591, 73, 28, 707, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(592, 1, 19, 945, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(593, 64, 9, 131, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(594, 36, 4, 676, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(595, 9, 11, 637, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(596, 99, 27, 302, '2020-03-18 08:39:50', '2020-03-18 08:39:50'),
(597, 35, 17, 92, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(598, 91, 9, 247, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(599, 70, 16, 735, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(600, 67, 12, 145, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(601, 7, 10, 255, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(602, 95, 12, 857, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(603, 54, 3, 992, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(604, 7, 28, 904, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(605, 5, 25, 990, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(606, 20, 12, 757, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(607, 7, 22, 497, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(608, 100, 7, 560, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(609, 61, 11, 922, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(610, 15, 11, 469, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(611, 28, 12, 513, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(612, 59, 3, 945, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(613, 48, 13, 325, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(614, 94, 22, 58, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(615, 86, 24, 766, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(616, 31, 5, 707, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(617, 73, 9, 748, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(618, 93, 11, 236, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(619, 27, 7, 358, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(620, 30, 5, 99, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(621, 21, 21, 626, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(622, 89, 14, 535, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(623, 15, 25, 592, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(624, 63, 11, 444, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(625, 51, 10, 926, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(626, 16, 24, 900, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(627, 73, 11, 93, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(628, 90, 12, 254, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(629, 20, 16, 80, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(630, 92, 9, 878, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(631, 4, 12, 514, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(632, 83, 9, 140, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(633, 73, 7, 495, '2020-03-18 08:39:51', '2020-03-18 08:39:51'),
(634, 34, 27, 445, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(635, 2, 13, 703, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(636, 89, 7, 104, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(637, 10, 25, 471, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(638, 67, 7, 813, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(639, 60, 19, 836, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(640, 86, 13, 916, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(641, 2, 24, 371, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(642, 57, 14, 310, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(643, 97, 10, 651, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(644, 34, 7, 635, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(645, 31, 15, 424, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(646, 77, 22, 635, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(647, 47, 23, 987, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(648, 64, 26, 867, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(649, 39, 14, 280, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(650, 96, 16, 345, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(651, 18, 22, 524, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(652, 84, 21, 322, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(653, 8, 21, 591, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(654, 50, 23, 136, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(655, 71, 26, 913, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(656, 61, 23, 312, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(657, 55, 23, 59, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(658, 12, 25, 653, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(659, 47, 13, 38, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(660, 38, 23, 549, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(661, 35, 12, 24, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(662, 65, 22, 447, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(663, 86, 7, 366, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(664, 85, 19, 854, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(665, 18, 25, 161, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(666, 26, 7, 25, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(667, 15, 8, 119, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(668, 91, 19, 917, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(669, 31, 13, 809, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(670, 24, 12, 319, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(671, 19, 25, 206, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(672, 83, 15, 713, '2020-03-18 08:39:52', '2020-03-18 08:39:52'),
(673, 25, 17, 655, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(674, 19, 10, 421, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(675, 55, 26, 903, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(676, 90, 9, 146, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(677, 33, 14, 499, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(678, 72, 16, 701, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(679, 99, 23, 674, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(680, 64, 28, 555, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(681, 9, 15, 515, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(682, 23, 8, 953, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(683, 40, 8, 646, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(684, 99, 13, 549, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(685, 85, 23, 360, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(686, 65, 4, 491, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(687, 12, 7, 625, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(688, 23, 20, 678, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(689, 40, 22, 72, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(690, 68, 13, 814, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(691, 28, 23, 105, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(692, 34, 28, 759, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(693, 38, 9, 265, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(694, 20, 23, 117, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(695, 11, 17, 948, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(696, 59, 16, 559, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(697, 15, 6, 500, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(698, 47, 14, 388, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(699, 85, 12, 147, '2020-03-18 08:39:53', '2020-03-18 08:39:53'),
(700, 27, 5, 830, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(701, 96, 2, 768, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(702, 38, 3, 473, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(703, 85, 4, 955, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(704, 14, 22, 204, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(705, 12, 12, 576, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(706, 60, 2, 626, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(707, 9, 10, 803, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(708, 25, 23, 583, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(709, 46, 9, 459, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(710, 75, 22, 271, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(711, 16, 12, 887, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(712, 51, 23, 849, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(713, 20, 17, 161, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(714, 27, 23, 519, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(715, 94, 13, 134, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(716, 35, 6, 271, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(717, 53, 10, 363, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(718, 13, 21, 911, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(719, 55, 14, 238, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(720, 76, 27, 791, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(721, 33, 3, 23, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(722, 84, 6, 903, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(723, 89, 22, 847, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(724, 78, 15, 733, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(725, 3, 24, 723, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(726, 18, 1, 116, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(727, 42, 12, 263, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(728, 21, 8, 430, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(729, 2, 11, 387, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(730, 7, 7, 168, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(731, 64, 12, 756, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(732, 49, 10, 130, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(733, 71, 25, 128, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(734, 43, 22, 436, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(735, 93, 23, 125, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(736, 70, 14, 328, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(737, 18, 15, 211, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(738, 98, 10, 484, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(739, 18, 3, 490, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(740, 78, 28, 251, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(741, 85, 26, 854, '2020-03-18 08:39:54', '2020-03-18 08:39:54'),
(742, 42, 6, 39, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(743, 100, 4, 613, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(744, 31, 7, 387, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(745, 41, 9, 418, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(746, 31, 6, 706, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(747, 1, 12, 611, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(748, 38, 5, 580, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(749, 99, 14, 991, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(750, 2, 6, 327, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(751, 40, 14, 13, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(752, 94, 27, 446, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(753, 66, 28, 153, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(754, 69, 4, 211, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(755, 8, 15, 24, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(756, 90, 10, 461, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(757, 25, 18, 545, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(758, 27, 27, 41, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(759, 93, 14, 34, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(760, 58, 20, 337, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(761, 51, 26, 424, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(762, 52, 14, 438, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(763, 48, 24, 667, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(764, 6, 20, 240, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(765, 14, 4, 292, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(766, 64, 18, 280, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(767, 75, 17, 289, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(768, 70, 25, 186, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(769, 23, 11, 822, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(770, 64, 21, 913, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(771, 28, 5, 169, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(772, 92, 17, 25, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(773, 13, 28, 71, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(774, 46, 23, 424, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(775, 70, 3, 742, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(776, 29, 4, 791, '2020-03-18 08:39:55', '2020-03-18 08:39:55'),
(777, 27, 4, 317, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(778, 47, 7, 484, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(779, 15, 22, 131, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(780, 14, 2, 878, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(781, 81, 7, 658, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(782, 9, 18, 258, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(783, 37, 4, 867, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(784, 24, 19, 203, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(785, 60, 4, 154, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(786, 17, 19, 722, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(787, 47, 3, 781, '2020-03-18 08:39:56', '2020-03-18 08:39:56');
INSERT INTO `products_pharmacies` (`id`, `product_id`, `pharmacy_id`, `count`, `created_at`, `updated_at`) VALUES
(788, 37, 27, 394, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(789, 24, 16, 276, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(790, 18, 16, 407, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(791, 2, 28, 147, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(792, 26, 18, 324, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(793, 76, 1, 422, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(794, 83, 26, 912, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(795, 100, 22, 680, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(796, 7, 16, 569, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(797, 10, 27, 672, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(798, 39, 26, 107, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(799, 94, 19, 124, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(800, 46, 28, 102, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(801, 71, 10, 895, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(802, 58, 21, 617, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(803, 18, 18, 584, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(804, 77, 3, 640, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(805, 63, 13, 962, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(806, 59, 14, 370, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(807, 88, 3, 417, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(808, 82, 18, 21, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(809, 58, 28, 136, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(810, 80, 6, 101, '2020-03-18 08:39:56', '2020-03-18 08:39:56'),
(811, 46, 13, 865, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(812, 64, 3, 685, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(813, 39, 5, 136, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(814, 51, 24, 111, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(815, 71, 28, 413, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(816, 77, 25, 157, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(817, 72, 19, 968, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(818, 80, 21, 37, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(819, 53, 12, 955, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(820, 89, 13, 489, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(821, 28, 16, 652, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(822, 55, 17, 721, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(823, 10, 17, 738, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(824, 17, 8, 817, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(825, 51, 8, 280, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(826, 69, 22, 762, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(827, 93, 27, 126, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(828, 35, 27, 219, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(829, 10, 18, 657, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(830, 12, 24, 608, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(831, 96, 14, 65, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(832, 24, 4, 529, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(833, 94, 9, 921, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(834, 61, 28, 785, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(835, 47, 19, 234, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(836, 41, 27, 88, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(837, 24, 27, 929, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(838, 20, 25, 64, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(839, 9, 7, 295, '2020-03-18 08:39:57', '2020-03-18 08:39:57'),
(840, 2, 16, 353, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(841, 67, 11, 270, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(842, 72, 22, 406, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(843, 14, 12, 817, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(844, 3, 26, 140, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(845, 27, 1, 309, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(846, 75, 13, 239, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(847, 71, 8, 951, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(848, 90, 23, 190, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(849, 17, 1, 354, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(850, 42, 7, 967, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(851, 6, 13, 314, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(852, 27, 6, 272, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(853, 83, 22, 781, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(854, 32, 23, 894, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(855, 50, 3, 378, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(856, 21, 6, 295, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(857, 6, 19, 620, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(858, 63, 26, 597, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(859, 85, 7, 783, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(860, 21, 24, 831, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(861, 33, 16, 742, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(862, 76, 19, 133, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(863, 98, 11, 158, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(864, 26, 22, 194, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(865, 63, 6, 16, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(866, 18, 24, 926, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(867, 38, 7, 578, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(868, 93, 24, 61, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(869, 70, 8, 607, '2020-03-18 08:39:58', '2020-03-18 08:39:58'),
(870, 13, 20, 373, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(871, 94, 28, 449, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(872, 4, 6, 61, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(873, 20, 4, 624, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(874, 48, 23, 731, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(875, 60, 27, 667, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(876, 56, 27, 354, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(877, 62, 24, 568, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(878, 89, 6, 538, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(879, 18, 17, 450, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(880, 1, 2, 982, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(881, 51, 18, 361, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(882, 33, 15, 260, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(883, 69, 10, 204, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(884, 31, 25, 762, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(885, 81, 1, 362, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(886, 78, 14, 744, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(887, 100, 21, 852, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(888, 59, 20, 258, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(889, 30, 21, 304, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(890, 31, 28, 875, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(891, 51, 14, 480, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(892, 40, 1, 265, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(893, 70, 22, 335, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(894, 2, 15, 101, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(895, 54, 22, 326, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(896, 80, 1, 127, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(897, 16, 20, 335, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(898, 64, 1, 156, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(899, 67, 13, 692, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(900, 85, 22, 178, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(901, 39, 18, 69, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(902, 76, 11, 832, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(903, 87, 17, 648, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(904, 38, 24, 726, '2020-03-18 08:39:59', '2020-03-18 08:39:59'),
(905, 49, 2, 806, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(906, 66, 25, 874, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(907, 59, 6, 765, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(908, 8, 2, 969, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(909, 87, 19, 689, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(910, 91, 26, 789, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(911, 75, 26, 249, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(912, 52, 10, 500, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(913, 37, 24, 625, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(914, 76, 20, 147, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(915, 74, 18, 263, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(916, 73, 24, 130, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(917, 98, 25, 926, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(918, 42, 13, 111, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(919, 2, 2, 284, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(920, 69, 14, 262, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(921, 53, 13, 473, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(922, 84, 13, 814, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(923, 36, 22, 401, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(924, 80, 25, 616, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(925, 90, 1, 267, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(926, 85, 5, 746, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(927, 16, 16, 785, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(928, 61, 14, 304, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(929, 87, 4, 915, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(930, 24, 26, 809, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(931, 44, 11, 772, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(932, 24, 18, 62, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(933, 54, 24, 219, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(934, 99, 9, 162, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(935, 19, 27, 664, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(936, 5, 19, 811, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(937, 17, 16, 755, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(938, 64, 14, 150, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(939, 2, 21, 855, '2020-03-18 08:40:00', '2020-03-18 08:40:00'),
(940, 26, 26, 999, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(941, 36, 9, 581, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(942, 59, 22, 596, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(943, 42, 8, 194, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(944, 47, 10, 623, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(945, 4, 22, 236, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(946, 56, 15, 424, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(947, 9, 26, 820, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(948, 78, 6, 600, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(949, 61, 26, 989, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(950, 85, 17, 541, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(951, 13, 23, 58, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(952, 14, 10, 126, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(953, 97, 6, 745, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(954, 50, 7, 723, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(955, 48, 18, 679, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(956, 40, 27, 368, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(957, 76, 10, 992, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(958, 60, 21, 551, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(959, 61, 19, 530, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(960, 50, 19, 391, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(961, 89, 4, 281, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(962, 16, 27, 577, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(963, 4, 23, 102, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(964, 61, 27, 908, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(965, 83, 21, 959, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(966, 90, 25, 449, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(967, 36, 2, 672, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(968, 32, 9, 944, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(969, 35, 1, 556, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(970, 57, 27, 470, '2020-03-18 08:40:01', '2020-03-18 08:40:01'),
(971, 41, 1, 519, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(972, 59, 10, 411, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(973, 15, 7, 426, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(974, 61, 16, 938, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(975, 31, 9, 517, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(976, 35, 25, 83, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(977, 1, 23, 999, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(978, 11, 24, 440, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(979, 12, 2, 125, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(980, 73, 26, 978, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(981, 28, 11, 72, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(982, 14, 17, 596, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(983, 7, 15, 684, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(984, 23, 15, 764, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(985, 81, 16, 676, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(986, 18, 20, 134, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(987, 40, 2, 971, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(988, 12, 3, 552, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(989, 14, 1, 348, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(990, 64, 22, 642, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(991, 52, 15, 228, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(992, 90, 19, 556, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(993, 66, 12, 195, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(994, 33, 7, 921, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(995, 51, 15, 557, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(996, 15, 4, 58, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(997, 7, 18, 533, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(998, 100, 14, 819, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(999, 15, 10, 703, '2020-03-18 08:40:02', '2020-03-18 08:40:02'),
(1000, 32, 28, 896, '2020-03-18 08:40:02', '2020-03-18 08:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `available_at` datetime DEFAULT NULL,
  `pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Brain Surgeon', NULL, NULL),
(2, 'Therapist', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `user_id`, `day_id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 61, 1, '13:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(2, 61, 2, '13:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(3, 32, 7, '15:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(4, 40, 3, '14:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(5, 83, 6, '15:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(6, 83, 6, '16:00:00', '22:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(7, 61, 1, '14:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(8, 69, 5, '17:00:00', '22:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(9, 61, 7, '14:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(10, 59, 7, '13:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(11, 21, 2, '13:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(12, 70, 1, '13:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(13, 73, 7, '17:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(14, 61, 3, '14:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(15, 63, 1, '14:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(16, 30, 3, '15:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(17, 57, 1, '16:00:00', '20:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(18, 32, 4, '13:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(19, 2, 5, '14:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(20, 73, 2, '16:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(21, 40, 2, '13:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(22, 19, 1, '18:00:00', '23:09:56', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(23, 70, 1, '17:00:00', '23:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(24, 70, 5, '18:00:00', '00:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(25, 73, 6, '16:00:00', '20:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(26, 30, 5, '15:00:00', '20:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(27, 80, 1, '14:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(28, 77, 5, '13:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(29, 70, 1, '14:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(30, 73, 4, '14:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(31, 32, 1, '14:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(32, 21, 7, '15:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(33, 24, 2, '15:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(34, 80, 7, '13:00:00', '16:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(35, 55, 4, '17:00:00', '23:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(36, 73, 3, '16:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(37, 70, 7, '13:00:00', '17:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(38, 40, 1, '18:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(39, 73, 1, '15:00:00', '20:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(40, 73, 7, '13:00:00', '19:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(41, 77, 1, '15:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(42, 61, 1, '15:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(43, 24, 3, '15:00:00', '21:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(44, 2, 2, '13:00:00', '18:00:00', '2020-03-20 14:34:17', '2020-03-20 14:34:17'),
(45, 21, 6, '18:00:00', '00:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(46, 83, 6, '15:00:00', '19:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(47, 77, 7, '13:00:00', '17:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(48, 2, 7, '13:00:00', '18:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(49, 61, 5, '15:00:00', '21:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(50, 80, 7, '17:00:00', '21:00:00', '2020-03-20 14:34:18', '2020-03-20 14:34:18'),
(51, 19, 7, '13:00:00', '21:00:00', NULL, NULL),
(52, 19, 4, '15:00:00', '23:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_login` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `full_name`, `username`, `email`, `email_verified_at`, `phone`, `password`, `api_token`, `image_id`, `role_id`, `gender_id`, `city_id`, `address`, `first_login`, `remember_token`, `created_at`, `updated_at`, `is_confirmed`) VALUES
(1, 'Javier', 'Toy', 'Gustave Beatty', 'orlando.daugherty', 'marielle.yost@yahoo.com', '2020-03-18 08:39:35', '01514820640', '2y,m7[I5e3eGs', 'ifDPsohDedyoTxR8YnprpNUMlkEcDfOsh099LVQyxUTCtol5o6kCircR4oLAr2ANTVaz33qSi8Do9Jv6', NULL, 1, 1, 2, '55218 Chasity Village\nPort Sherwood, MN 08618', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(2, 'Benton', 'Muller', 'Vita Stamm', 'lavinia.bartoletti', 'makayla56@yahoo.com', '2020-03-18 08:39:35', '01050951928', 'q:5=]L:vS\"}=}_ra\'', 'OcD9H2TsLR53bqNwNX9q9lGadAu73R1Y7RJbjFmckiSSUBE1eaHt8heoy2pfJPv8GbblFBKzSKokdeSt', NULL, 3, 1, 2, '1067 Hagenes Club Suite 891\nSouth Autumnburgh, TN 56228', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(3, 'Stanford', 'Raynor', 'Nicolette Stark', 'dock.daugherty', 'green.witting@hotmail.com', '2020-03-18 08:39:35', '01256674752', 'Mox<guAQ`', 'E0w2by2868GFiIOkb8W2uE6ZF9O4DKkbmy508P0m6c4dB1UwLGRTS7kVHq1PtqnfSemTH972VhaZcIIL', NULL, 1, 1, 2, '8263 Gregoria Alley\nSouth Fern, FL 22556', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(4, 'Ezequiel', 'Kessler', 'August Breitenberg', 'alba29', 'kathlyn96@hotmail.com', '2020-03-18 08:39:35', '01045697354', '\'mX^}2R', 'WQFwfp7j4xorlr3qFrjNE8su0NHjNUwdMLiJtAeSN8TycpkyXa1VFWUkO0nFhLmOZzyueQoJQufkOa2t', NULL, 1, 1, 3, '88466 Lonzo Tunnel\nPort Arno, MT 56194', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(5, 'Wilfrid', 'Schmitt', 'Katelynn Halvorson', 'coby48', 'simonis.kasandra@gmail.com', '2020-03-18 08:39:35', '01575739631', 'DL?w2=', '9wwuTXsfuA0cjXNOOtHnYVTb6wS19NUsg9PiAoExAQKuE2lve1Rb3MRDKxrzI4x4qNcggbOJZvfdTm3v', NULL, 1, 1, 2, '6709 Kenny Walks Apt. 037\nWest Triston, DC 63641-8726', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(6, 'Floy', 'Lockman', 'Marta Dooley', 'mmonahan', 'johnathan.fritsch@gmail.com', '2020-03-18 08:39:35', '01078505061', '2[@1qv$kG`c2[yZr#', 'fRCBTVBp3AkrYKu0hklbVGyJmrTiq7I6R6rC1tYcPpTqq4Ghawv8kGKPsTQIgPpgkoA2PfVnhOlHBxfI', NULL, 1, 1, 3, '97825 Easter Ridges Apt. 651\nMarksland, DE 91071-9911', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(7, 'Korbin', 'Schaden', 'Eulah Deckow', 'cyrus.west', 'ngislason@yahoo.com', '2020-03-18 08:39:35', '01170674291', 'ii\'zNN^', '6dOJnUbQmFfarvp0VCNfkmiaRzWtzJSx8LqXyjN8Kl0X1gBDH3HfjIQxyvewwk1ZDdQ1fdjIBNLgxsqv', NULL, 2, 3, 3, '789 Llewellyn Shoal\nKelsitown, UT 18363', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(8, 'Deja', 'D\'Amore', 'Catalina Koepp', 'dhyatt', 'aleen35@gmail.com', '2020-03-18 08:39:35', '01231560213', 'mml!X[;n{\\~g?cz8x$', 'yvJ2GYbmm7QDOEBlm1hCNY2UKCpLdNk8TjM4tJwXkbW5lKIJCJmNsBszgZ9WTz0xgbY1gtJbTSWYYnDi', NULL, 4, 2, 1, '58491 Nader Stream Apt. 246\nLake Danika, AK 62157-0966', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(9, 'Ashtyn', 'Kovacek', 'Shakira Goodwin', 'marcella85', 'rodger04@yahoo.com', '2020-03-18 08:39:35', '01085120558', '[8V6t@CnEFSr4Gf', 'gKeYNocXzNO7t0X8ONDyNIJj7kfBJBngVlbxavKIjaJcBI6Jp21UFaj8FDMCCXOLtpxkmHCJY5G4KVyr', NULL, 4, 3, 1, '4092 Schoen Forge\nWest Denis, MA 00040-9319', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(10, 'Melvina', 'Glover', 'Gardner Legros', 'hyatt.kraig', 'pouros.ruben@gmail.com', '2020-03-18 08:39:35', '01206855497', 'uzs>eb+E^', 'GHey4gCo6UWUi7ddEpAhZB6S9fmUwUV5yTW3AWGoLT808UN9rQxDhltOdOz2piWb7OAoeYm78XdjCyFz', NULL, 1, 3, 1, '66856 Cummerata Drive\nNorth Corineburgh, OR 95107', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(11, 'Bernard', 'Lubowitz', 'Joesph Bernhard', 'merlin.boyer', 'pinkie.feil@gmail.com', '2020-03-18 08:39:35', '01277354982', 'O7m(m|^\\P&vtN~', 'WBsCNhCQkmwMSWfmpdMs0ncs788fAaGe1iAg1iTtowa6ZgfD1X8DgBIe8TuVg8Cw3hhgTiXsCyniK6sq', NULL, 2, 1, 2, '9584 Aubrey Causeway Suite 428\nEast Orionview, LA 43546', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(12, 'Roxane', 'Senger', 'Kayla Dach', 'helen20', 'max.murazik@gmail.com', '2020-03-18 08:39:35', '01544642429', 'pYcOdgj,T.#1_0c', 'ibthwOqY8zr0ebZ2tGQbE0RPgoRwFB5Cqb549Apcdgxayttrxvc4AIkNjD2koFfpQsmpFSwA1nAZCgN5', NULL, 1, 1, 3, '77404 Gleichner Streets Suite 078\nEast Neilburgh, SC 68167-2815', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(13, 'Alycia', 'Barrows', 'Ms. Lina Jacobson', 'bernardo.towne', 'cschaefer@hotmail.com', '2020-03-18 08:39:35', '01064422339', '9UasM5(Q,bnJsVy\'`|J', 'NfR3vhpg5OGZYxr04lePK8XtmmnwY6kLFt5rteLVQimjUiuGGB6oUKduJgKxaNtjuNzIadcRRnXMXOQO', NULL, 2, 3, 2, '1104 Austyn Parkways\nPagacport, RI 35301-3153', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(14, 'Isobel', 'Hickle', 'Zane Morar', 'mckenna.bruen', 'charlotte16@hotmail.com', '2020-03-18 08:39:35', '01095512454', '[y>@XG[b1vI', 'XkfQJShuHPZmSDT3uR804rwDZCEccEGBWRNqVaTZcZeNVVrko0CwF4gxawlmOZBv8JS1EB5UDtSYgeoo', NULL, 1, 1, 2, '50761 Romaguera Track Apt. 049\nMaximeshire, NJ 18709', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(15, 'Brittany', 'Ernser', 'Gonzalo Keeling DVM', 'amya.waters', 'vmcclure@yahoo.com', '2020-03-18 08:39:35', '01086914762', '3&R6rcmi%>Mh^', 'p4vH4WXBqT7wYWs1HBgFto8m8ytmT6ZHifAQdJcbXYrj2b0YTjg8iTFxNcSDZjHH31yL0imQbNQV2fNv', NULL, 2, 2, 2, '86971 Rubye Walks Apt. 195\nEast Donnieland, NJ 21141', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(16, 'Darwin', 'Beier', 'Dr. Judson Ortiz IV', 'mcdermott.miles', 'schulist.maci@yahoo.com', '2020-03-18 08:39:35', '01179505676', 'U\"]#za|!MU\\i,\"~~U.af', 'rGSq8s6TCznXt7kX0ZaZ3o9yJ8DFzchVcbI5ujMpPL3RN7TkkXgAnwNNYFtB6LxuScYP1PytnTgmaVrK', NULL, 4, 3, 1, '8780 Eloy Plains\nProsaccofort, CA 78664-7189', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(17, 'Pamela', 'Hettinger', 'Dr. Elian Murphy', 'muller.antonetta', 'bennett25@yahoo.com', '2020-03-18 08:39:35', '01060992148', 'eggut/IM7QIuoR)[Hj1', '1wotVU4nsUGzZEhspWrXIaTgiZJc9PdbReiO1AlVX6IzE7d7BZUw72cWaCrr57zx4KwJrLnqAk67slB2', NULL, 4, 1, 1, '5331 Maryse Union\nBlakemouth, KY 08674', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(18, 'Susanna', 'Dooley', 'Mrs. Maryse Rosenbaum I', 'kemmer.lempi', 'osinski.osborne@hotmail.com', '2020-03-18 08:39:35', '01130368695', 'YUCk:d*uGg`2', 'Sc3Ieg6CCUHKSDWcVxryngEpmh1gQSLBNehUib8hBDuWRZ9a9jkcOmG3FrkbfnGLHaqCYSjzgjoAM7uS', NULL, 2, 2, 2, '42785 Kassulke Park\nRutheview, ME 70178', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(19, 'Horace', 'Wintheiser', 'Deven Paucek', 'delmer20', 'crist.rowland@yahoo.com', '2020-03-18 08:39:35', '01218171820', '@P?GYqV_%ZQ', 'eOFTSo6EW7678GmitVFTztk372r9Xelh0xsAEBr7YDFPK3vsBQHG7X1wnBFk9nhSRsNNtggvRJJEgmvv', NULL, 3, 2, 1, '67681 Grover Junction\nLeannonbury, SC 68711', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(20, 'Myah', 'Raynor', 'Prof. Vince Haag', 'qsmitham', 'beahan.madge@hotmail.com', '2020-03-18 08:39:35', '01589704630', '_\'B,Ri4N%C`kH', 'cj5kgruAuOmvyNd9ZD6oRVPdP2ey1kJ1iQ3fclQRKbcnck2kG8QiG3gFxVPS7hafbFUtI9dxYgLhl0my', NULL, 2, 2, 3, '86845 Cristobal Square\nPort Drewborough, AK 35896', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(21, 'Neil', 'Ward', 'Beulah Wilderman MD', 'coconnell', 'vshanahan@yahoo.com', '2020-03-18 08:39:35', '01160641344', 'v0\'\\|?m;A>~\'QVF', 'CfklcljSEXhiZ2FVv5KVRD3R42FCOsPemIac0zCWu2mUiwbeSseNruRROmkSwMXP20qE0geeyjjSgNiV', NULL, 3, 1, 3, '5436 Abernathy Greens\nWest Sarina, ME 08519-3351', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(22, 'Lorena', 'Harber', 'Oran Mosciski', 'lulu.osinski', 'shania.hayes@hotmail.com', '2020-03-18 08:39:35', '01251248301', 'ytnqFArg#]0VSGwDdI', 'cYm2m0Jd0bq5dmRTYn5KCM4Rn6TJwRSlEFs80lqxLD2TekVRiPZp234g6zXykTOJD0PgFJphjdILx16Q', NULL, 4, 1, 1, '804 Lucious Forge Suite 241\nPort Maida, ND 20495-5453', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(23, 'Jalyn', 'Bernhard', 'Jazmin Greenholt', 'johnny54', 'dillon77@gmail.com', '2020-03-18 08:39:35', '01548596855', 'B]uwDk', 'miqBxRDYwKlq1QAj7Cx9ccvYLDnoDhzhHDJvLQcSG9XEvsbOwb8xju8fpfDXOCLJKtxJqMQ1tAA1itwJ', NULL, 1, 3, 3, '60738 Katheryn Land\nLurlinechester, SC 39293', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(24, 'Sally', 'VonRueden', 'Trent Bernier', 'haag.laisha', 'mkshlerin@gmail.com', '2020-03-18 08:39:35', '01010941516', ',sz*(fnQ', 'PVehwf5PRHwlVt3dbweWL3kGuowfB2AmUu6roPTDXCKSEdJ02fsKf0xOO0VLiXzSRETj1CR2RZZgFGuz', NULL, 3, 2, 1, '12644 Zulauf Inlet\nHomenickview, WY 94987', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(25, 'Jeffry', 'Nolan', 'Lukas Stark', 'effie73', 'okon.quinten@yahoo.com', '2020-03-18 08:39:35', '01166828765', '[(pQC6ZRb(6)hPou', '04j2ZojnNlfrcVcLH2vHYDABqs8ehrVTMWy26JEhRlhZBQNV0K3xw5VWoebMQd1NJwT2ZEu7ZPHo1552', NULL, 1, 3, 3, '3678 Nickolas Fords Apt. 739\nMannport, RI 49040-9634', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(26, 'Art', 'Keeling', 'Dr. Art Medhurst', 'leola.harvey', 'america.schmidt@hotmail.com', '2020-03-18 08:39:35', '01063066944', 'xw!>4}o5`', 'aHUyFjFL9XvrSIm97GQvAWUfPkDxDE23OjY4MGxzlVwmLHNTpHU9g0hjbOYxNYTE0HUMKhjgmSDAwo5N', NULL, 2, 1, 3, '31104 Archibald Wells Suite 487\nAliyahport, NE 15015-6380', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(27, 'Marvin', 'Will', 'Myah Sauer', 'devin.rutherford', 'djacobson@hotmail.com', '2020-03-18 08:39:35', '01219407199', 'utbNQfS\'A)}I0', 'qnhepQFJNtrnFAjg872wISklNFJDbiqg9OXJuJkRWNTCiyVtneMHGkJqirD2l1brTHTH81AOqaEhIeTN', NULL, 2, 2, 1, '40371 Ole Coves Suite 408\nMariahstad, CA 88352', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(28, 'Rocky', 'Osinski', 'Martina Bruen', 'suzanne01', 'carol.leuschke@hotmail.com', '2020-03-18 08:39:35', '01104318600', 'Om(3$huf(`Q=h', 'o1o4zjF2gsL0S7hJH5G6MecX4Bn77sJjsu7STrWapOYehpJdDraepS1fb48jF5nzlslRTdRrvao5pbsQ', NULL, 2, 2, 1, '623 Lilliana Cliff Suite 907\nHirtheshire, WY 97134-7008', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(29, 'Derick', 'Towne', 'Dr. Cali Metz', 'jed57', 'wunsch.trevor@yahoo.com', '2020-03-18 08:39:35', '01251319411', 'NVN?sE\"lT', 'roI96sPpsblaI8FGYENg0aKyHoc9i8nA7UVlBcYnZls30ahJiKX3r3ojPVP6swBCiPqmevOmUgvyQnBC', NULL, 2, 3, 3, '2556 Kim Summit Suite 935\nPort Lutherfurt, WY 20999', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(30, 'Savanah', 'Corkery', 'Antwan Hand', 'marge57', 'funk.kacey@hotmail.com', '2020-03-18 08:39:35', '01545792129', 'D}\"{W`LYL/', 'JoachE6yvJ6MbvoYt64sT1IRkYGOx4SbzhWe7JwQMvCHUZKiUfrkmEIpFpbAQ1ek9r5KbqHSl5ZrpSAO', NULL, 3, 2, 2, '71057 Tad Extension Suite 120\nJeanneville, WA 26396', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(31, 'Rocio', 'Goyette', 'Reid Mertz', 'ibednar', 'howe.frederic@hotmail.com', '2020-03-18 08:39:35', '01113990640', 'W.\\z0<#Bs', 'M984mFOC7N4gMa0iLB34moEZWweUC2e5HXcWUjS2fuZS7CF4tRQaKZl9A2KKCC63idNvccQz47mqSvzF', NULL, 2, 3, 3, '25405 Adolfo Terrace\nFarrellview, NE 57816', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(32, 'Eden', 'O\'Kon', 'Geovany Jerde IV', 'mcdermott.kurtis', 'lbalistreri@yahoo.com', '2020-03-18 08:39:35', '01171821157', 'I)xyiikQ)jA', 'qjRpV9shKOXd3Jc326wu2Ks7Z1tPu8XuyR5RzqW4HIxbGqReZUqXY29mk2Z0YW1OfKbk8ZiHxTsIPxn8', NULL, 3, 1, 1, '66062 Madelynn Summit Suite 508\nSouth Jess, NJ 30494-5291', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(33, 'Leann', 'Skiles', 'Dr. Rosalee Welch', 'zgottlieb', 'mabshire@yahoo.com', '2020-03-18 08:39:35', '01219414980', '=V*q^AE:hIc[', 'sSPM9WaN5VfKX9Uy4QxFVpBQO14ziun6chZSjhFLbK8Q5oulLqNIGlaHKT3NFRYlkn5QXkWRKxhrNfM8', NULL, 1, 2, 3, '38026 Schiller Knoll Suite 174\nEast Jazlyn, NH 58761', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(34, 'Joanie', 'Stoltenberg', 'David Turcotte', 'hillary.jacobson', 'paris.mohr@gmail.com', '2020-03-18 08:39:35', '01226404977', 'YPU@gJL!k%wS/', 'N1zk7M5V2ZjCmIIValTOrYFhUw82hdr0ewruWOCFKIIGZ4iazgq0g88lG5pEGfYMXyBBGEmiskbZGdZs', NULL, 4, 1, 2, '51322 Kayley Extensions\nTremblaymouth, IN 56129', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(35, 'Norval', 'Bogan', 'Dannie Luettgen', 'hagenes.meda', 'considine.kyleigh@gmail.com', '2020-03-18 08:39:35', '01085766988', 'kxQD1)0Y', 'XRWYTef7dYHDVrq5uXv9uIpSUACPFIYFvD82JQMVw8xuydHGbNNBUjkImA89lxVKOft1ESm476uQFq5P', NULL, 2, 2, 1, '93556 Ralph Row\nSouth Madelynbury, GA 32002-3423', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(36, 'Celestine', 'Bailey', 'Afton Wilderman', 'hackett.aurore', 'heath69@gmail.com', '2020-03-18 08:39:35', '01218485766', '(;u3HvA#G!eik', 'nY7lc4Br6NYyHKxn6O7enXwij6Ky1aAUzrBqbrlA90HTY5d0wi5UIAXGDgDtO7ArPr7h7C8jBajcniJF', NULL, 4, 3, 3, '859 Deangelo Expressway Apt. 596\nSouth Jamarfort, DE 08227', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(37, 'Rahsaan', 'Schmidt', 'Miss Calista Gusikowski', 'carroll.marcelle', 'fwill@yahoo.com', '2020-03-18 08:39:35', '01087778379', '/u27E&7@~cgpwgo[/B', '5QCZuJUa1I7cBXe9j9XDdVgnijzZmpV702NhTruespziSDzxKnM8oIh33w7gCyNqnDuXhNFiPY9NYCst', NULL, 1, 2, 2, '95391 Gerhold Ridges Apt. 889\nWymanton, AL 19695-1191', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(38, 'Kiara', 'Bogan', 'Celestine Kunde', 'alessia.hirthe', 'ccassin@yahoo.com', '2020-03-18 08:39:35', '01123179441', '[Q*W\'J=ncS&@4@f_4', 'DiGEGK7gfMCPSgrmrOQDWr4WgqR2ReqGCcmbr9SJoqPm99J4cWUxv5jS6VLIQOv5DpNxbe6fvPkjdvS1', NULL, 2, 3, 1, '39483 Kulas Falls Suite 846\nLake Devon, VA 47550-3932', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(39, 'Delbert', 'Kilback', 'Amira Leffler V', 'bessie08', 'mohr.delta@gmail.com', '2020-03-18 08:39:35', '01597589854', '8.NdeG<Hl]^V]rRC', 'TJQi9pCyP5W4Ddpe060OKqIZzqukQSgaObxVBkgfAwzBM4Pp7mgIdc2KtGFuERk9np4j1IRQUVeiyLg7', NULL, 2, 3, 3, '828 Theresa Route\nLake Karson, ID 14977', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(40, 'Lee', 'Christiansen', 'Dr. Brayan Daugherty', 'hermiston.arthur', 'esperanza04@yahoo.com', '2020-03-18 08:39:35', '01031011131', 'I.XRlt@KST$K', 'bWZBr0AgoSwMPi3ogKkBF78HqRwkmd7H7Si18ZgpOn8dlHbyHwBZOQTO9kZl4awbGxcFLsHWIHK7sxpg', NULL, 3, 3, 2, '14471 Kassulke Pike Suite 113\nGrimesfurt, NC 54595', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(41, 'Agustin', 'Purdy', 'Mrs. Anya Hartmann', 'demarcus.marks', 'mhaag@gmail.com', '2020-03-18 08:39:35', '01102851712', 'fE;F5~$/uGD)', 'TTBA4ptHa79R4FemZYhzsXhvwsSHTdfZW07xpOyMJ8O1gtgPMCnPPVf2YvpSlQg06LJMlgV9sA4ylnrE', NULL, 2, 2, 3, '84183 Jacobs Locks\nO\'Konstad, ND 14077', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(42, 'Turner', 'Larson', 'Darius Herzog', 'neil.terry', 'gwendolyn04@hotmail.com', '2020-03-18 08:39:35', '01027080664', '\\3,o[Ye%P{1N', 'WSgy2ltlmujOB2QJI7rH5y5n0sxgWSXBDKXVzOApfMvMn1jSlMc5pcXAlg5xCJevtSR5im5L1Ssvxy4V', NULL, 1, 1, 2, '8135 Schulist Motorway\nNorth King, SD 14175', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(43, 'Clementina', 'Grady', 'Prof. Mateo Hauck Jr.', 'rylee.torp', 'lilyan.kub@yahoo.com', '2020-03-18 08:39:35', '01596818041', 'E\'gfa^h|6*C;4@$', 'XUipiHG52lGm6XwBNGGiBDAx1swgtFMFCzU2aEUZYjMNdIPDrGPkNdAkZJ6QfmrGmv0ncoswjEnGavM5', NULL, 4, 1, 2, '1819 Erica Dale Apt. 825\nNew Robertoshire, AL 65323-6552', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(44, 'Brandt', 'Durgan', 'Emmie Doyle', 'dedrick36', 'gkoelpin@gmail.com', '2020-03-18 08:39:35', '01590921346', 'X|^QPK*1n|q2~i*b', 'kmW3Smo2zUx2CX5x0BPTXXQlVrYGkBPjtbHFpzwO7cnY7p4P6mdWSSdi28cemfnsv6hkDu4Tzg8v7vO4', NULL, 4, 1, 3, '9186 Richmond Brooks Suite 700\nMertztown, MT 99630', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(45, 'Dorothy', 'Schulist', 'Eric Wiza I', 'conroy.loren', 'feest.ethan@hotmail.com', '2020-03-18 08:39:35', '01064490614', 'Ny/mE!3qP\'dU3M!', 'KTrp2aQsZABVbSGHj1ntbnkaOCGql3aDsT0ECmuyVgkG609YrkNhvo18aihGzMbKmujjbIJv9rd4uEqv', NULL, 2, 2, 2, '7127 Wilkinson Forks\nLeannonberg, KY 66565', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(46, 'Maxie', 'Macejkovic', 'Raina Monahan', 'kris77', 'stark.irving@yahoo.com', '2020-03-18 08:39:35', '01574168362', '}Y)dHHEX', 'YK4lwX6a2HeIVhHjlknNqVwc6oIwtPWPjzMCgr7ePfLFt8jclB7b2tZkTn5si6Nc6l8zhlgYp3XZ33qs', NULL, 2, 3, 3, '661 Talon Overpass\nWeissnatbury, TN 14885-7798', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(47, 'Cary', 'Fahey', 'Haylie Feeney DDS', 'norval95', 'brown76@yahoo.com', '2020-03-18 08:39:35', '01204784721', ']og^.~n>q@]gHrO%~:u', 'RSFzjBNFAp2pjwzutQcm9AuD7UGFkxy7l9YwwViMfNG3OHgQ6YBEBjACb7d2CzLUXZrdYI7ZkGHGRoMp', NULL, 4, 2, 3, '96957 Zane Throughway Suite 841\nLake Adaline, ID 01768-0075', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(48, 'Johnson', 'Gleichner', 'Santino Renner V', 'santa77', 'elwyn18@hotmail.com', '2020-03-18 08:39:35', '01214857562', '#7?\\,\\90QYD_VF7+ly\"', 'jHsm0TzCCCaHPBaK7xJJr9My1U8n0w1p3FD3IkYe8dNmhtgBcnovnLLWHkCKEUtMssGAp2ZYw4mRqfw5', NULL, 1, 3, 2, '518 Hand Estate Apt. 927\nNew Vicky, SD 07043-4147', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(49, 'Estel', 'Koepp', 'Yadira Schmeler', 'kraig.ebert', 'brandyn22@gmail.com', '2020-03-18 08:39:35', '01533289943', 'mBS~APdl&MyE:0f', 'Cy8CWFN9sD73J7Olc6x9LJeEqTdNmlEhtPsdYkwi0v8N0oVGv0CgT3qPxtQWz6jDCwsFrMIx2BN7uw6J', NULL, 1, 1, 1, '89142 Howe Drive\nWest Chasitytown, AZ 04474', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(50, 'Grayson', 'Gulgowski', 'Dr. Velma Klein III', 'udare', 'mgoldner@gmail.com', '2020-03-18 08:39:35', '01231377562', '-+aX3n7^)g[r', 'hkVGomwYtfqZogebeBZsCEWN550VBqqpN1of42ypsASQQm3HzsLL8ysmynWbdFtf0NSG8AuMcMngOTXv', NULL, 4, 1, 3, '204 Waldo Mills Suite 350\nPort Joelleburgh, DC 77620-2937', 0, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(51, 'Guiseppe', 'Powlowski', 'Reba Pacocha Sr.', 'cristina23', 'alta.fadel@gmail.com', '2020-03-18 08:39:35', '01270726191', 'i4n}Ld~J`', 'R4Z6QZsOnMr8WucecncM7Vz7h8DpFKv6VvhX3ls2wmfbAU2G0DDHHsR7v5jWwrC0qZQfG6m7lkxbFdK3', NULL, 4, 3, 1, '792 Hershel Station\nTiaraville, GA 54860-8827', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(52, 'Deion', 'Batz', 'Kip Kuhn', 'rohan.cali', 'wconroy@yahoo.com', '2020-03-18 08:39:35', '01109629864', '<].IkQS+HbAI43~{5iC', 'j3FXEIm6U6dOjm8DkIfu4U1GdunNukePQffLjntukIciAAcGrxvPydzjxBqan022qS6H1zbiAsD4ciYT', NULL, 1, 3, 1, '88087 Hauck Ports Suite 393\nHammesport, MT 95110-7279', 1, '1', '2020-03-18 08:39:35', '2020-03-18 08:39:35', 1),
(53, 'Ricardo', 'Stamm', 'Alexane Stiedemann', 'elton.pacocha', 'bogisich.jada@hotmail.com', '2020-03-18 08:39:36', '01063553695', '<SXn^QRa', 'SafzpueoFUhVJPxiNKJuyoAN6WMbFCVWrr6kL7OnTwBlAeFWzO6yJBWkF54U0bSBkNw1a1nvBkjqR2vi', NULL, 4, 3, 1, '142 Orville Ferry\nLednerstad, WY 08059-1645', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(54, 'Kitty', 'O\'Keefe', 'Prof. Muhammad Macejkovic', 'rice.leonardo', 'uaufderhar@hotmail.com', '2020-03-18 08:39:36', '01217188817', 'bc=o\\@', 'i9JTyE39hB3TaAKPVafHf7SdvC2zZcYqZ02WT6unflVTEEnSfnQG9z6G48xK9uaTkfXYKtEpzCno2059', NULL, 4, 3, 1, '8229 Feest Corner\nNorth Aminaberg, ME 98316', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(55, 'Beverly', 'Herman', 'Prof. Immanuel Aufderhar', 'xfeest', 'barry47@gmail.com', '2020-03-18 08:39:36', '01578703232', 'b#pc6.2', 'rLRm4lWLg6GPodyZUk5D1ZiQo3pp8ZGBYOoLtigptwLsB9RDseBJx838tWCN9sN54z0FaqSD7AQ3W5lO', NULL, 3, 2, 2, '84584 Grady Stream Suite 011\nWest Krystal, LA 70372', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(56, 'Kaia', 'Jakubowski', 'Miss Susie Ebert', 'boyer.levi', 'trent61@gmail.com', '2020-03-18 08:39:36', '01191046682', 'yh%t.xy#JRLu0CYQ', 'K6mx88If4YUaPpoIQRF9BFvm3Uz3skcqhU5OrOuFRIv2geMXaGfYJzhZ7v2tLnasFvYag8u4ZgU1vgCW', NULL, 4, 1, 3, '256 Rita Causeway\nParkerside, UT 72364-7653', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(57, 'Macy', 'Balistreri', 'Buddy Legros', 'christophe74', 'qlittle@gmail.com', '2020-03-18 08:39:36', '01062645046', ';6c>;dX!o6', '8ZlJB7ALXiD3yfGHUueIOFu1i52z7X0N0CjdlARgEwitBSpDk9KokYWzKTFV1w5ayhC9saFu1CfDp2Ea', NULL, 3, 1, 1, '9835 Melyssa Shoal\nNorth Darbymouth, MN 13075', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(58, 'Gus', 'Koss', 'Ms. Dana Schmeler I', 'ocarroll', 'meghan.schultz@gmail.com', '2020-03-18 08:39:36', '01177235059', 'F48\\a(mfjP5]*6.$', 'AzA1MC26zG0Qbk5hWgpBrX8CdRJnIkIySttu0l93oupWjBkXqYseVWhbJz9Eq5WK4OoT2mJAPolGObs1', NULL, 1, 3, 2, '58226 Schinner Glen\nLake Parisbury, DC 97400', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(59, 'Tatyana', 'Fritsch', 'Dr. Reinhold Donnelly', 'hand.queenie', 'jberge@hotmail.com', '2020-03-18 08:39:36', '01187345553', 'NbW&)dmkv]H/vg(:)yx', 'eczcbwthPCvcj9Epl3KgM0VfNlCvyOKSsLyK4qzV5Cb6RDB60PId2Ly8KrETO1CMAA4wHkGsiBlTupBV', NULL, 3, 2, 2, '26297 Fay Rapid Suite 699\nDurganshire, AR 83529-0858', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(60, 'Hazle', 'Daniel', 'Ms. Addie Reinger', 'jkuphal', 'akuhn@yahoo.com', '2020-03-18 08:39:36', '01013564661', 'aUL-UdjI>', 'lKGwoQZ0k9GgXfAgFoLCoDaabpO9e4qZVipCk6Pps7OlCnKdQWOrLjenw0sTX4TxvZWBNwTgDqQqwOBy', NULL, 2, 3, 1, '4065 Maximus Forks Suite 158\nWest Krystal, MA 80292-6114', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(61, 'Arvilla', 'Oberbrunner', 'Chelsea Simonis', 'magali.kertzmann', 'jamarcus37@hotmail.com', '2020-03-18 08:39:36', '01190777098', '=JXaDYZaA#/c\"ino/au=', 'foZ1MkoDOpiLJlM5pJJg0urQuF28qMw0PXGTfd6KtHiSVnOy0nHhwChgLfBGcEQL9X6iuiaDTYyh4Cbe', NULL, 3, 2, 1, '4674 Metz Groves\nWest Gretchen, GA 14360', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(62, 'Danika', 'Hoppe', 'Judy Hane', 'zterry', 'buckridge.brigitte@hotmail.com', '2020-03-18 08:39:36', '01570349617', 'h`im}BZlpCWvr{>', 'MSGcdsEm2opDPtFXGQMv0rN1FsYWAnObn25FDh8JHo6IFjg95dT0Gs6rhZ6PynZABKAtGXLhFwc9mBW8', NULL, 2, 2, 3, '222 Pagac Meadow\nGibsonmouth, NC 70241-7894', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(63, 'Laila', 'Rohan', 'Dr. Alison Ferry', 'mitchell.mohamed', 'fae99@yahoo.com', '2020-03-18 08:39:36', '01115690722', '.36o}\\*iC;}GjlN', 'DVc8HYrRlt9Gq5ntLH64e5sSh1xhxsxcxR22xteQTlUeHyoNRMw1Uwegm1kC0WAhObG3oho4VuJk7EV8', NULL, 3, 1, 1, '39225 Orlando Alley\nVidalside, CO 42300', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(64, 'Wayne', 'Bogisich', 'Deron Brekke', 'qmosciski', 'ustreich@gmail.com', '2020-03-18 08:39:36', '01020120887', 'l^mH6tLhR=qk?7Pm', 'QIdPFpO7cLocMEufgqr7UCC1Kd8jzUvrP4NxZocSybuxbcgdv7gDQ3kfiJtF75FMm4u3s15uF24E2RJD', NULL, 4, 3, 1, '876 Marisa Branch Suite 640\nTraceyside, KS 23515-9524', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(65, 'Xzavier', 'Grant', 'Mrs. Assunta Beier', 'epaucek', 'herman.olaf@hotmail.com', '2020-03-18 08:39:36', '01292055190', 'D<?$U;ousf~lz9Z', 'UWl8GT4Mpse9YAAth1Iq6u3f2Z2KT6A7laCoztdCnemSnXJWXL7fi2ojppk3wU9II5cEVYPbFlUtg7aC', NULL, 4, 1, 3, '8016 Sonny Cape Apt. 752\nSouth Anastacioland, ID 65329', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(66, 'Precious', 'Orn', 'Emery Lubowitz Sr.', 'magdalen.okon', 'egutmann@hotmail.com', '2020-03-18 08:39:36', '01250660962', '4Nc2Ko`d:r', 'MpS6YXJ0hhSVg9XVYed8SsGDSXD0F7rtgXcG16yycNYsGGdjwkgwgET9btnW1NDYcfSZ4GZBObvg98H9', NULL, 4, 3, 2, '563 Bobbie Valley\nDaughertyville, FL 33529-2291', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(67, 'Tremaine', 'Dare', 'Zelda Vandervort IV', 'grant.kyla', 'eschulist@hotmail.com', '2020-03-18 08:39:36', '01170436154', '{fAVvy]x]^\'G^L+&Yq', 'Q0NJm1gkGoMen5e7bU9yJpR4VB6lNO8wLGRDKIIcUtJ0Y2kTTmWZDNtOOP4rKkkiLhCxTgJU6ThFkW9S', NULL, 1, 2, 3, '8664 Kaycee Street\nHellenville, KS 59479-3179', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(68, 'Rebeka', 'Kuhlman', 'Noah Medhurst', 'jacobson.claudia', 'llubowitz@yahoo.com', '2020-03-18 08:39:36', '01285422865', 'DODW\"-_,>Bcb()jPjzsl', '5YdSbuhNmda9nNmCPGFIefpDnzFqhDZ5wSjKLIqLSmMWJR5BdK1o2M5aXt58Z2qklOQ4NwGSgTmGyQJr', NULL, 1, 3, 2, '4425 Swaniawski Dale Suite 142\nNew Rossie, HI 16783-1170', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(69, 'Dallas', 'Jones', 'Ms. Alycia Cole IV', 'wilhelmine.haley', 'kihn.celine@hotmail.com', '2020-03-18 08:39:36', '01211571386', 'n@*8T&Cu/qnFMI3', 'BBdQ0xZHddSRhFoR01V5EDbMfv1tdZ0HbpAQDMzCFYfGzKZXEj51PoHl2hExvLPtMKEfvMVPrPf8zHiu', NULL, 3, 2, 2, '794 Gutkowski Common Suite 061\nBartonchester, ID 50485', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(70, 'Foster', 'Grimes', 'Herminia Maggio', 'lemke.dillan', 'kturcotte@yahoo.com', '2020-03-18 08:39:36', '01023467179', '^dSzQC]N1', 'VS7xCSxV3vGEmL0uhPS4JHsNQNAHNgMdKJ12xeaIp2ZJzrg45AojnYBtc6CaIsdvNhiFXSInAGbBeoul', NULL, 3, 3, 2, '685 Baylee Burgs\nVivianneberg, GA 42015', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(71, 'Chris', 'Murphy', 'Amaya Boehm', 'mclaughlin.ara', 'calista51@hotmail.com', '2020-03-18 08:39:36', '01537880350', '|*\"z1GnENFmr^52T\'b,', '77MO8bk6K0m6F0yLkL6dCaMtE7VaANmgYdIG2eucOrNiWYkkoexOjZXIGypwXD29DWCP39koBXNkBMGE', NULL, 1, 1, 3, '65070 Grimes Loop Suite 244\nLilianeborough, VT 21438', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(72, 'Junior', 'Kerluke', 'Antonia Wiegand II', 'howe.mohammad', 'dorthy.doyle@yahoo.com', '2020-03-18 08:39:36', '01022169420', '>.0e`Gz6jjJ@]Ww', 'QH5I2xoyXNraG4ChcxxRdqidPl8CJFVXHcjgwEAFIj8xZxJIRLxO58YORCAGcuw1m1mQ2KsYpzKYadtJ', NULL, 2, 1, 2, '74557 Lesch Prairie\nBuckshire, MN 39387', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(73, 'Berniece', 'Ernser', 'Prof. Gennaro Carter Sr.', 'otto.dubuque', 'ferry.madisen@hotmail.com', '2020-03-18 08:39:36', '01267934768', '4+l9C)bh', 'MOBS9QECKYsNmrOSl551tr5pYQd5TMlSEnr8JXzzNlL5YMI9c3mEIIbOuGI8D0haZzI4nIlwmCnCf8YU', NULL, 3, 1, 1, '63743 Ankunding Point Suite 049\nBelleberg, PA 04156-6178', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(74, 'Alba', 'Hackett', 'Danielle Ritchie', 'rfadel', 'hauck.zetta@yahoo.com', '2020-03-18 08:39:36', '01196019786', 'n^A\\C1', '3sHoHRimcKF7jXbtrW0eo4w0MoG5X6ArxteNKm95r4sp5kBQ7JE3PgkNtEtdQsQBemCuG7TrGKPwDjis', NULL, 1, 2, 3, '6740 Mohr Lakes Apt. 394\nWest Astridfurt, LA 98165-9194', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(75, 'Giovani', 'Wolf', 'Prof. Orville Boyer Jr.', 'timothy.lakin', 'stroman.hilda@gmail.com', '2020-03-18 08:39:36', '01168734173', '_?<hgb,A', 't4NKgCMu0q3tEnAjgesrHWhBzd2dFUWM3dCTNxvOrS6glK4MVdxJRsIVB81l2io1dCJUQ5OYoLaa8rri', NULL, 1, 2, 2, '9785 Rowe Brook\nJaclynfurt, NY 68238-5061', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(76, 'Layne', 'Kassulke', 'Miss Avis Schmitt', 'princess14', 'goldner.novella@yahoo.com', '2020-03-18 08:39:36', '01017056235', 'U\"Wx=0WO&@sR.', 'oebTccX1ssBZqD3l7rfsUH1TafdDruLohYGLaBIK4x37NuJgQOJouOG3hptzrSVbZD3qWysjTaKJGPu6', NULL, 1, 1, 3, '73937 Quitzon Lodge Apt. 030\nReedmouth, DC 43269-6214', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(77, 'Alva', 'Ziemann', 'Leopoldo Dietrich DDS', 'amanda.hand', 'hope76@yahoo.com', '2020-03-18 08:39:36', '01140077218', 'G3fj0XTrM/5', 'CVkLOLlIMFfojLyARuAFIKWUtagrxbL7Zo53R7yIrNtCkflmLGmeGlSI4Eu3CSeC8X4dU35SP3FYDMnS', NULL, 3, 3, 1, '3233 Hilpert Avenue Apt. 513\nNew Elenora, NJ 83194', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(78, 'Johnnie', 'Klein', 'Prof. Irma Wilderman V', 'bashirian.dominic', 'jovany.grant@hotmail.com', '2020-03-18 08:39:36', '01243420743', 'EL:J-<GJ||*(', 'oHKSxt9fI4VAqUOEXF9VMXmX8437n8R5Y6Yok75T46FzfPXlkfwg9Lr86sCF4VHRiMW6sjkNQ3yw32Oq', NULL, 1, 2, 3, '1267 Aditya Views\nPort Dariusmouth, WV 88330-0351', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(79, 'Jaydon', 'Kiehn', 'Mr. Justus Mueller V', 'velma.hauck', 'trey.pollich@yahoo.com', '2020-03-18 08:39:36', '01167026541', '3I1{M9gloxu^}I\\\\.Qa\'', 'E7o2dAj3EMgwY3MWBPKypHIArSYhXsOp58qbstoHDMJM639smQxxg48J5hilZfSWVcFy4BG5S7KqGsc2', NULL, 4, 2, 3, '8186 Sylvia Glens Apt. 087\nHintzshire, AK 75783-7639', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(80, 'Donnie', 'O\'Keefe', 'Miss Elyse Heathcote', 'karine84', 'lcollins@yahoo.com', '2020-03-18 08:39:36', '01138448349', 'L=o_(n\\=SyGd?RX{w7@', 'lrJAPiv7u1L8jPPZ37JEZSshLppihAjbCARWRZffW2wcpCzDi3TdZFJmG9147zYVS06wCNORheSYOXXk', NULL, 3, 2, 2, '37354 Miles Park Suite 273\nBatzchester, RI 16985-5268', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(81, 'Lupe', 'Cole', 'Alessandro Zemlak', 'owhite', 'ktremblay@yahoo.com', '2020-03-18 08:39:36', '01052372615', 'UsLOOkh', 'pMcjra8mf01R9a5AM5Ilk0BvwZVVrvh7tvsHih4OMsG29me2dh9s3LkDVx8NbUgV9kMf50WFAsz29fjC', NULL, 1, 2, 1, '692 Sophia Prairie Suite 415\nAbdullahhaven, ID 32055', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(82, 'Rudolph', 'Kilback', 'Antonetta Johnston MD', 'barrows.vilma', 'jonatan87@hotmail.com', '2020-03-18 08:39:36', '01285580501', 'E`,\"KZ\'b', 'Ckcn64fifX1WCWL8MbmB68PsYHbh4ETmffckfIDTG4H3C7QbM7chiWUN5SlKGTHqHM15yHnVlu9KnkPa', NULL, 2, 2, 1, '88450 Prosacco Rapids\nLake Bridgettemouth, TN 84815-9465', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(83, 'Moriah', 'Fisher', 'Doris Howell', 'timothy.crona', 'vonrueden.kendall@gmail.com', '2020-03-18 08:39:36', '01252414944', ',?/\'98Gr|C(\\O8|@k2?R', 'mte3Qus90o0k6Wt0Lcyql7DMbGJJpnBsLm2tGfEymkeifCWn5uz4oEJAXuCJt0lpNZdHeioZNNtEOQNJ', NULL, 3, 3, 2, '443 Hermina Union Suite 124\nVicentaview, PA 14830', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(84, 'Molly', 'Feeney', 'Ms. Priscilla Hackett', 'rosina.gusikowski', 'egreen@yahoo.com', '2020-03-18 08:39:36', '01537279831', 'fL?x(nCrm#', 'kDI2VozAHqgvrlYwTaq1tS8uKZQTFU3JjCBGYQiqUYAKImDy7srcsdMne358PfpXNRMnYtCQnaKT2aB0', NULL, 1, 1, 2, '1185 Jerde Shoal\nSouth Khalid, VT 43691-2956', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(85, 'Patricia', 'Rau', 'Rodolfo Schuppe', 'josiane32', 'odubuque@hotmail.com', '2020-03-18 08:39:36', '01036127404', '=K.FT,4WI8}bYS', 'uKQ3s3wnBtzRuVFAqBQgFfkuhPzbvs8WVR5iBi286GihRRng8nsbhTt1VofCTKtsADliJZchzK01V7jX', NULL, 1, 3, 3, '789 Zemlak Lodge Apt. 534\nPort Janborough, CT 66480', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(86, 'Maximus', 'Herman', 'Angus Kuvalis', 'susanna69', 'xortiz@hotmail.com', '2020-03-18 08:39:36', '01299414058', 'D;3C2`v', 'PITTny4CCVmg6y1EpvDmBRJwz13BXZAKvXQUnmEjQLTBFQjaitYhsESQhPMmGLfFsclBSjlrfeAEbfVA', NULL, 2, 2, 1, '368 Chadrick Pike\nSouth Lyric, RI 42024-4677', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(87, 'Maegan', 'Rolfson', 'Abagail Becker', 'celine48', 'cummerata.beau@gmail.com', '2020-03-18 08:39:36', '01503405742', '}|,S/n1y', 'o6vBAxN3M2zGcXczS4qdnKwfnVFoVAqr1eNp2tLZ9vVP0GXoqibK5hBlpZqWyPieZMi2P0uoMRu9woFZ', NULL, 3, 3, 2, '53339 Donnie Park\nLake Tyrellborough, GA 94585', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(88, 'Anastasia', 'Koch', 'Mariam Ziemann', 'ziemann.monica', 'eloise.kemmer@yahoo.com', '2020-03-18 08:39:36', '01029844752', 'qTC8p]p6Ckhk=ju^q', 'mL21Sd4cCS4b44acSxLOY5ZwgRe0zbE482ro7AvNkCR024xLAeVidUF7iqIGKjNxged4lALXN0b2r80C', NULL, 1, 3, 1, '9723 Gregorio Hollow Apt. 156\nAidenhaven, OR 22080-3673', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(89, 'Keenan', 'Aufderhar', 'Prof. Rodger Halvorson', 'gaylord.cortney', 'marcelina.rutherford@yahoo.com', '2020-03-18 08:39:36', '01229002161', 'f{t<zE&Gy+C.t5o,a~2G', 'C4e2i9bj6GTgB4q8ihKIJhP8LihiqRdLtfGasAw5E6WUctKNK8yzKrYGBVhkH5yuJV2Hk1Ee7HtVfGpk', NULL, 2, 3, 2, '46426 Orn Knoll Suite 581\nNew Litzy, NC 79541', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(90, 'Abelardo', 'Walsh', 'Orrin Lockman', 'kerluke.alysa', 'renner.etha@gmail.com', '2020-03-18 08:39:36', '01238651008', 'p76Pfsk/6;-\"s.r', 'e9q9CYYdtKFpwUXdeP72DLlMZAWg66F5kl6ffKjMKSAaFe3Pz3zvdeZeSLTujOu8kRmXK5Z5ORKYe0Gt', NULL, 4, 1, 2, '23611 Barrows Route Apt. 413\nEdythfurt, AZ 27573', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(91, 'Burnice', 'Pfeffer', 'Jessyca Baumbach', 'sierra.dicki', 'rodrick18@yahoo.com', '2020-03-18 08:39:36', '01152737230', 'iho{LwhEJj8xN1/v\'', '8ayYxQdZCRE2W36saJ4H02XKJqHjqyeNzF58Ly6ABGZzCFBFEalMGUIcO9WcL8bsNHl7ZjSZMtuRg5sO', NULL, 2, 3, 1, '5351 Kris Village Suite 473\nZitaport, WA 44274', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(92, 'Ethan', 'Ruecker', 'Sydnie Lakin', 'hollie57', 'lura60@yahoo.com', '2020-03-18 08:39:36', '01118620949', '7BoSZr6.y4\"<}n', 'RNlmoCag7AJHCJ8YeUYUh5X5EtPbILb7KyhpOVx4lQwS3OkQfw7Bytv9gStYxKVbBiHNX7OE5xHkN2ZT', NULL, 2, 2, 1, '51044 Kling Mills Apt. 645\nSouth Paulinehaven, LA 30215-6990', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(93, 'Madyson', 'Jakubowski', 'Prof. Stevie Zieme Jr.', 'verna.nolan', 'hickle.josefina@yahoo.com', '2020-03-18 08:39:36', '01272332127', 'ErGMS&%n#B', '0HgFo1F0IssTNifEdstjMr6vedIDDFHvS3f3b7GQJZs4QHVfyeXoOo7v6QesSCx4JbgR0XW2q64oJzA7', NULL, 4, 3, 2, '441 Hettinger Greens\nEffertzview, ID 80904', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(94, 'Braulio', 'Jakubowski', 'Mr. Deven Lang', 'ehudson', 'ulises12@hotmail.com', '2020-03-18 08:39:36', '01270894551', 'zw\"l>bh%8', 'oJCYVy6mvsuyRAGxFShlSIEJCQy4fC9ztwccUKStDFq7fgHw0iGRvhGD0SnzmVeAul1ION79bbj3QUQW', NULL, 4, 3, 3, '92896 Gaylord Street Suite 189\nEast Barryville, MI 66548-2115', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(95, 'Webster', 'Homenick', 'Hortense Treutel', 'wmiller', 'hildegard.haley@hotmail.com', '2020-03-18 08:39:36', '01278482736', 'u91EpJHIKs5oq8rb', 'puzpiKru7Yg1MLRbH0NSnX0u7TEAfs7KdQkGYKN3ZSyuozCl2mHhjE7aH6X0MJ1w5qOTL1J4IVnmUfrg', NULL, 2, 1, 2, '83469 Juvenal Forest Apt. 657\nPort Phoebe, OH 11458', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(96, 'Kelsi', 'Goldner', 'Harmony Leffler', 'treutel.floy', 'christine.schaden@gmail.com', '2020-03-18 08:39:36', '01528042366', '`x#wfn9*$6TN', '7MhNLxrgfxEBwc1YpoK0DUKOHwJDQJnH63pB3kp3e18I7qC6RYBgFxa1LsYUHR2I1eQGIjFpwykSFwP8', NULL, 4, 1, 2, '38562 Zemlak Harbor Apt. 679\nCleoraport, WA 78129', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(97, 'Lamont', 'Yost', 'Aliyah Smitham', 'pgulgowski', 'mathias.becker@yahoo.com', '2020-03-18 08:39:36', '01103952435', 'n[3O*;{O', 'zE99fNjixruBSXpq1ZwBDASMmqabcTBoHDta9W1vf1rZacXqguACs4tJ9FT1OZtghei6sGRINmaqvhB6', NULL, 2, 3, 3, '830 Abbigail Dale\nEast Tressa, NE 57982', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(98, 'Emilio', 'Beahan', 'Miss Daisha Oberbrunner', 'gfahey', 'ortiz.zelma@yahoo.com', '2020-03-18 08:39:36', '01077928420', 'Wd#0xubMbXf82K4', 'dNikp3ULd0zfjJDccX6WreDVTXRNYnZD4NbkSzlPkvNJSwprI1vn3RgIfCerEUQCfuwlYWpq2aRpU6Tz', NULL, 4, 2, 1, '6330 Dino Fords\nPort Alvenaland, NH 47356', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(99, 'Kyler', 'Gottlieb', 'Dr. Ramiro Kreiger', 'cdenesik', 'morar.brando@yahoo.com', '2020-03-18 08:39:36', '01057441923', '[BJ<XGodvx?H=\\', 'GGRd59QVT8VNKDOY2ZZz4o2WrGzwg63BZ8y6L4fGhm8U6kio6AfioQxZf6jcXTpzbkT26AKwSJwk1pWt', NULL, 2, 1, 3, '5154 Rowe Street Apt. 398\nEast Marcosberg, RI 73297-8734', 0, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1),
(100, 'Jaren', 'Bergstrom', 'Alexandrea Altenwerth', 'nikolas78', 'hborer@yahoo.com', '2020-03-18 08:39:36', '01521848246', '&+|\\Gb)Cu\\-?h)9>27hh', 'oUYlcoaAHd0K2hXsTYQ90Afs9yC3KakXoPUM2AZDiGmUbME5idONIr6O5m3USST2IwNDBCog55gQe97x', NULL, 4, 3, 3, '96546 Kozey Center Apt. 215\nCandidastad, LA 83586-1318', 1, '1', '2020-03-18 08:39:36', '2020-03-18 08:39:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Customer', NULL, NULL),
(2, 'Pharmacy', NULL, NULL),
(3, 'Doctor', NULL, NULL),
(4, 'Delivery', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degrees_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_user_id_unique` (`user_id`),
  ADD KEY `doctors_speciality_id_foreign` (`speciality_id`);

--
-- Indexes for table `doctor_prescriptions`
--
ALTER TABLE `doctor_prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_prescriptions_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `doctor_ratings`
--
ALTER TABLE `doctor_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_ratings_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `dosages`
--
ALTER TABLE `dosages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosages_prescription_id_foreign` (`prescription_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_product_id_foreign` (`product_id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forget_password_email_foreign` (`email`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyword_searches`
--
ALTER TABLE `keyword_searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyword_searches_user_id_foreign` (`user_id`),
  ADD KEY `keyword_searches_keyword_id_foreign` (`keyword_id`);

--
-- Indexes for table `localization`
--
ALTER TABLE `localization`
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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_pharmacy_id_foreign` (`pharmacy_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_trackings`
--
ALTER TABLE `order_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_trackings_user_id_foreign` (`user_id`),
  ADD KEY `order_trackings_order_id_foreign` (`order_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_user_id_foreign` (`user_id`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pharmacies_user_id_unique` (`user_id`);

--
-- Indexes for table `pharmacy_ratings`
--
ALTER TABLE `pharmacy_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy_ratings_order_id_foreign` (`order_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_details_prescription_id_foreign` (`prescription_id`),
  ADD KEY `prescription_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `pres_day`
--
ALTER TABLE `pres_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pres_day_prescription_id_foreign` (`prescription_id`),
  ADD KEY `pres_day_day_id_foreign` (`day_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_image_id_foreign` (`image_id`);

--
-- Indexes for table `products_keywords`
--
ALTER TABLE `products_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_keywords_keyword_id_foreign` (`keyword_id`),
  ADD KEY `products_keywords_product_id_foreign` (`product_id`);

--
-- Indexes for table `products_pharmacies`
--
ALTER TABLE `products_pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pharmacies_product_id_foreign` (`product_id`),
  ADD KEY `products_pharmacies_pharmacy_id_foreign` (`pharmacy_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_product_id_foreign` (`product_id`),
  ADD KEY `requests_pharmacy_id_foreign` (`pharmacy_id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetables_user_id_foreign` (`user_id`),
  ADD KEY `timetables_day_id_foreign` (`day_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD KEY `users_image_id_foreign` (`image_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_gender_id_foreign` (`gender_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor_prescriptions`
--
ALTER TABLE `doctor_prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_ratings`
--
ALTER TABLE `doctor_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `dosages`
--
ALTER TABLE `dosages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keyword_searches`
--
ALTER TABLE `keyword_searches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `localization`
--
ALTER TABLE `localization`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_trackings`
--
ALTER TABLE `order_trackings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pharmacy_ratings`
--
ALTER TABLE `pharmacy_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_details`
--
ALTER TABLE `prescription_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pres_day`
--
ALTER TABLE `pres_day`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `products_keywords`
--
ALTER TABLE `products_keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `products_pharmacies`
--
ALTER TABLE `products_pharmacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctor_prescriptions`
--
ALTER TABLE `doctor_prescriptions`
  ADD CONSTRAINT `doctor_prescriptions_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`);

--
-- Constraints for table `doctor_ratings`
--
ALTER TABLE `doctor_ratings`
  ADD CONSTRAINT `doctor_ratings_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`);

--
-- Constraints for table `dosages`
--
ALTER TABLE `dosages`
  ADD CONSTRAINT `dosages_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD CONSTRAINT `forget_password_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `keyword_searches`
--
ALTER TABLE `keyword_searches`
  ADD CONSTRAINT `keyword_searches_keyword_id_foreign` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`),
  ADD CONSTRAINT `keyword_searches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_pharmacies` (`id`);

--
-- Constraints for table `order_trackings`
--
ALTER TABLE `order_trackings`
  ADD CONSTRAINT `order_trackings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_trackings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD CONSTRAINT `pharmacies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pharmacy_ratings`
--
ALTER TABLE `pharmacy_ratings`
  ADD CONSTRAINT `pharmacy_ratings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD CONSTRAINT `prescription_details_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `doctor_prescriptions` (`id`),
  ADD CONSTRAINT `prescription_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `pres_day`
--
ALTER TABLE `pres_day`
  ADD CONSTRAINT `pres_day_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  ADD CONSTRAINT `pres_day_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products_keywords`
--
ALTER TABLE `products_keywords`
  ADD CONSTRAINT `products_keywords_keyword_id_foreign` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`),
  ADD CONSTRAINT `products_keywords_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_pharmacies`
--
ALTER TABLE `products_pharmacies`
  ADD CONSTRAINT `products_pharmacies_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`),
  ADD CONSTRAINT `products_pharmacies_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`),
  ADD CONSTRAINT `requests_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetables_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  ADD CONSTRAINT `timetables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
