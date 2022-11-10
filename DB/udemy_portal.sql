-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 09, 2022 at 11:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udemy_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'mamat ganteng', 'mamat@gmail.com', '$2y$10$LlYi5RQRiAs1KmVk1C.XoOgJ4i2mL7sZJSOgSONvaJSnk6XLFdm3.', 'admin-mamat-ganteng.png', '', '2022-10-16 07:53:30', '2022-10-17 02:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `photo`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mamat', 'gugus@gmail.com', '$2y$10$3EAgIUfD/O5pr6C/U41ubeyi57h6ZvpHLLtwnNxQlgz44NIGVBNtW', 'author-mamat-1667616680.png', '5bdc4a767912dce4488b907bd4c32decfa6b90c89fe14b642c29136961446baa', 'Active', '2022-11-04 10:01:24', '2022-11-09 10:44:33'),
(2, 'coba', 'mamat2@gmail.com', '$2y$10$MIJam8BQYT.dX2EoqAxi8.kt08MehH1eB3OcLPFfyocNV9Rlq4jCi', 'author-coba-1667603163.png', '', 'Active', '2022-11-04 23:06:03', '2022-11-04 23:06:03'),
(3, 'mamat', 'mamat2@gmail.com', '$2y$10$W2.P61woTlWAjvVpY9Q2dO..YztI1Kl5XVJRrtuwWwI5CNellMZwW', 'author-mamat-1667603255.png', '', 'Active', '2022-11-04 23:07:35', '2022-11-04 23:07:35'),
(4, 'mamat', 'mamat4@gmail.com', '$2y$10$xIdroB.votj2jycjGHpnne4nNMdfxeYzPzLaoUbkq1LM1Z8fRSrdW', '', '', 'Active', '2022-11-04 23:15:59', '2022-11-04 23:18:13'),
(5, 'ajis', 'ajis@gmail.com', '$2y$10$7J2wJP3x/dxA6Ds15q0Lyew9blWs1iwexiK2qXCSUNHr79tqv7sBa', 'author-ajis-1667604463.png', '', 'Active', '2022-11-04 23:27:43', '2022-11-04 23:27:43'),
(6, 'ganang', 'ganang@gmail.com', '$2y$10$NiottpJYXnLl0Q75VFxUbeGA4kTlDeufgS59loAD5wkazQnSFQkVC', '', '', 'Active', '2022-11-04 23:28:58', '2022-11-04 23:28:58'),
(7, 'ganang', 'ganang@gmail.com', '$2y$10$x4x32Lj.UVdQn69MTqDJ0u.2fDb8E10UcZ2KHHheeO9lLTPN7GJz.', '', '', 'Active', '2022-11-04 23:30:26', '2022-11-04 23:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `show_on_menu`, `category_order`, `language_id`, `created_at`, `updated_at`) VALUES
(3, 'National', 'Show', '2', 1, '2022-10-18 23:57:59', '2022-10-18 23:57:59'),
(4, 'Lifestyles', 'Show', '3', 1, '2022-10-18 23:58:20', '2022-10-18 23:58:20'),
(5, 'Sport', 'Show', '1', 1, '2022-10-19 01:10:53', '2022-10-19 01:10:53'),
(7, 'Olaraga', 'Show', '1', 3, '2022-11-08 08:33:46', '2022-11-08 23:05:11'),
(9, 'Gaya Hidup', 'Show', '3', 3, '2022-11-08 23:04:35', '2022-11-08 23:04:35'),
(10, 'Nasional', 'Show', '2', 3, '2022-11-08 23:04:58', '2022-11-08 23:04:58'),
(11, 'Olarage', 'Show', '1', 6, '2022-11-09 00:54:14', '2022-11-09 00:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Show',
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_title`, `faq_detail`, `faq_status`, `language_id`, `created_at`, `updated_at`) VALUES
(2, 'Faq English', 'gg', 'Show', 1, '2022-10-28 08:26:43', '2022-11-09 08:15:22'),
(3, 'Fag Indonesia', '<p>tentang</p>', 'Show', 3, '2022-11-09 08:12:03', '2022-11-09 08:15:39'),
(4, 'Faq Palembang', '<p>tentang</p>', 'Show', 6, '2022-11-09 08:12:32', '2022-11-09 08:15:59'),
(5, 'FAQ Bengali', '<p>coba</p>', 'Show', 5, '2022-11-09 08:12:51', '2022-11-09 08:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `front_settings`
--

CREATE TABLE `front_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `news_tranding_total` int NOT NULL DEFAULT '0',
  `news_tranding_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `video_total` int NOT NULL DEFAULT '0',
  `video_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `favicon` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `top_bar_date_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Hide',
  `top_bar_email` text COLLATE utf8mb4_unicode_ci,
  `top_bar_email_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `theme_color_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color_2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analytic_id` text COLLATE utf8mb4_unicode_ci,
  `analytic_id_status` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `disqus_code` text COLLATE utf8mb4_unicode_ci,
  `disqus_status` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_settings`
--

INSERT INTO `front_settings` (`id`, `news_tranding_total`, `news_tranding_status`, `video_total`, `video_status`, `favicon`, `logo`, `top_bar_date_status`, `top_bar_email`, `top_bar_email_status`, `theme_color_1`, `theme_color_2`, `analytic_id`, `analytic_id_status`, `disqus_code`, `disqus_status`, `created_at`, `updated_at`) VALUES
(1, 5, 'Show', 4, 'Show', 'settng-favicon-1667802363.png', 'settng-logo-1667862290.png', 'Show', 'portal@gmail.com', 'Show', '#729AEB', '#AAE7D0', 'G-LQEERM0YYZ', 'Show', '<div class=\"comment-fb\">\r\n                                    <div id=\"disqus_thread\"></div>\r\n                                        <script>\r\n                                            (function(){ //do not edit below this line\r\n                                                var d = document, s = d.createElement(\'script\');\r\n                                                s.src = \'https://thebar2gaming.disqus.com/embed.js\';\r\n                                                s.setAttribute(\'data-timestamp\', + new Date() );\r\n                                                (d.head || d.body).appendChild(s);\r\n                                            })();\r\n\r\n                                        </script>\r\n                                </div>', 'Show', '2022-10-19 10:41:35', '2022-11-08 00:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `home_advertisements`
--

CREATE TABLE `home_advertisements` (
  `id` bigint UNSIGNED NOT NULL,
  `above_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `above_ad_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `above_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `above_ad_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_advertisements`
--

INSERT INTO `home_advertisements` (`id`, `above_ad`, `above_ad_url`, `above_ad_status`, `above_ad_position`, `created_at`, `updated_at`) VALUES
(1, 'advertisement-home-top.png', NULL, 'Hide', 'home-top', '2022-10-18 08:54:10', '2022-11-03 23:59:24'),
(2, 'advertisement-home-bottom.png', NULL, 'Hide', 'home-bottom', '2022-10-18 08:54:27', '2022-11-03 23:59:40'),
(3, 'advertisement-sidebar.jpg', NULL, 'Hide', 'sidebar', '2022-10-18 08:54:45', '2022-10-31 08:04:47'),
(4, 'advertisement-header.png', NULL, 'Hide', 'header', '2022-10-18 09:01:58', '2022-11-03 23:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'Yes', '2022-11-08 00:40:36', '2022-11-08 04:45:51'),
(3, 'Indonesia', 'id', 'No', '2022-11-08 00:58:17', '2022-11-08 01:00:23'),
(6, 'Palembang', 'pl', 'No', '2022-11-08 05:13:53', '2022-11-08 05:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `live_channels`
--

CREATE TABLE `live_channels` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_channels`
--

INSERT INTO `live_channels` (`id`, `heading`, `video_id`, `status`, `language_id`, `created_at`, `updated_at`) VALUES
(2, 'Westlife - My Love', 'ulOb9gIGGd0', 'Active', 1, '2022-10-29 08:45:59', '2022-11-09 07:35:09'),
(3, 'M2M The Day You Went Away', 'SMwFydqI3pk', 'Active', 3, '2022-10-29 09:02:22', '2022-11-09 07:35:35'),
(4, 'Soledad- Westlife', 'FQaid7WMr4g', 'Active', 6, '2022-10-29 09:02:56', '2022-11-09 07:39:22'),
(5, 'Westlife - My Love', 'ulOb9gIGGd0', 'Active', 3, '2022-11-09 07:36:17', '2022-11-09 07:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_15_091248_create_admin_table', 1),
(7, '2022_10_17_051643_create_home_advertisements_table', 2),
(8, '2022_10_18_101917_create_categories_table', 3),
(9, '2022_10_19_001910_create_sub_categories_table', 4),
(10, '2022_10_19_012258_create_posts_table', 5),
(11, '2022_10_19_013545_create_tags_table', 6),
(12, '2022_10_19_100927_create_front_settings_table', 7),
(13, '2022_10_20_145526_create_photos_table', 8),
(14, '2022_10_22_004656_create_videos_table', 9),
(15, '2022_10_27_062348_create_pages_table', 10),
(16, '2022_10_28_075601_create_fags_table', 11),
(17, '2022_10_28_091347_create_subscibers_table', 12),
(20, '2022_10_29_081026_create_live_channels_table', 13),
(21, '2022_10_31_045908_create_online_polls_table', 14),
(22, '2022_11_04_074400_create_social_items_table', 15),
(23, '2022_11_04_091329_create_authors_table', 16),
(24, '2022_11_08_001829_create_languages_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `online_polls`
--

CREATE TABLE `online_polls` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_polls`
--

INSERT INTO `online_polls` (`id`, `question`, `yes_vote`, `no_vote`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'sample 1', '0', '0', 1, '2022-10-31 05:20:09', '2022-10-31 05:20:09'),
(2, 'sample 2', '0', '0', 1, '2022-10-31 05:21:41', '2022-10-31 05:21:41'),
(3, 'sample 3', '20', '3', 1, '2022-10-31 05:30:09', '2022-10-31 07:25:28'),
(5, 'sample 4?', '600', '400', 1, '2022-10-31 07:31:27', '2022-10-31 07:31:40'),
(6, 'Apakah kau menyukai website ini?', '3', '1', 6, '2022-10-31 08:06:47', '2022-11-09 07:52:20'),
(7, 'pas kan ?', '1', '0', 3, '2022-11-09 07:52:04', '2022-11-09 08:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `about_title` text COLLATE utf8mb4_unicode_ci,
  `about_detail` text COLLATE utf8mb4_unicode_ci,
  `about_status` text COLLATE utf8mb4_unicode_ci,
  `faq_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `faq_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `faq_status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_title` text COLLATE utf8mb4_unicode_ci,
  `contact_detail` text COLLATE utf8mb4_unicode_ci,
  `contact_status` text COLLATE utf8mb4_unicode_ci,
  `contact_map` text COLLATE utf8mb4_unicode_ci,
  `terms_title` text COLLATE utf8mb4_unicode_ci,
  `terms_detail` text COLLATE utf8mb4_unicode_ci,
  `terms_status` text COLLATE utf8mb4_unicode_ci,
  `privacy_title` text COLLATE utf8mb4_unicode_ci,
  `privacy_detail` text COLLATE utf8mb4_unicode_ci,
  `privacy_status` text COLLATE utf8mb4_unicode_ci,
  `disclaimer_title` text COLLATE utf8mb4_unicode_ci,
  `disclaimer_detail` text COLLATE utf8mb4_unicode_ci,
  `disclaimer_status` text COLLATE utf8mb4_unicode_ci,
  `login_title` text COLLATE utf8mb4_unicode_ci,
  `login_status` text COLLATE utf8mb4_unicode_ci,
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about_title`, `about_detail`, `about_status`, `faq_title`, `faq_detail`, `faq_status`, `contact_title`, `contact_detail`, `contact_status`, `contact_map`, `terms_title`, `terms_detail`, `terms_status`, `privacy_title`, `privacy_detail`, `privacy_status`, `disclaimer_title`, `disclaimer_detail`, `disclaimer_status`, `login_title`, `login_status`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'About US', '<p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\"><br></span><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\"><br></span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\"><br></span></p>', 'Show', 'FAQ', 'FAQ', 'Show', 'Contact Us', '<p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p>', 'Show', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65294810734!2d106.68943162494352!3d-6.229386704800049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1666936671125!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Terms and Conditions', 'The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done. \r\n\r\nThe contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done. \r\n\r\nThe contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done. \r\n\r\nThe contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.', 'Show', 'Privacy Policy', '<p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p>', 'Show', 'Disclaimer', '<p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</p>', 'Show', 'Login', 'Show', 1, '2022-10-27 07:11:59', '2022-10-28 09:12:21'),
(2, 'Tentang Indonesia', '<p>Tentang Aplikasi</p>', 'Show', 'FAQ Indonesai', 'FAQ Indonesai', 'Show', 'Kontak', '<p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p><p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">The contact form is currently inactive. Get a functional and working contact form with Ajax &amp; PHP in a few minutes. Just copy and paste the files, add a little code and you\'re done.&nbsp;</span></p>', 'Show', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65294810734!2d106.68943162494352!3d-6.229386704800049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1666936671125!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Syarat dan ketentuan', '<p>Formulir kontak saat ini tidak aktif. Dapatkan formulir kontak yang berfungsi dan berfungsi dengan Ajax &amp; PHP dalam beberapa menit. Cukup salin dan tempel file, tambahkan sedikit kode dan selesai. Formulir kontak saat ini tidak aktif. Dapatkan formulir kontak yang berfungsi dan berfungsi dengan Ajax &amp; PHP dalam beberapa menit. Cukup salin dan tempel file, tambahkan sedikit kode dan selesai. Formulir kontak saat ini tidak aktif. Dapatkan formulir kontak yang berfungsi dan berfungsi dengan Ajax &amp; PHP dalam beberapa menit. Cukup salin dan tempel file, tambahkan sedikit kode dan selesai. Formulir kontak saat ini tidak aktif. Dapatkan formulir kontak yang berfungsi dan berfungsi dengan Ajax &amp; PHP dalam beberapa menit. Cukup salin dan tempel file, tambahkan sedikit kode dan selesai.<br></p>', 'Show', 'Kebijakan pribadi', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 36px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; font-family: inherit; overflow: hidden; width: 270px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"id\">Kebijakan pribadi</span></pre>', 'Show', 'Penafian', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 36px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; font-family: inherit; overflow: hidden; width: 270px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"id\">Penafian</span></pre>', 'Show', 'Masuk', 'Show', 3, '2022-11-09 09:03:41', '2022-11-09 09:38:43'),
(3, 'Tentang Bengali', '<p>Teantang</p>', 'Show', 'FAQ Bengali', 'FAQ Bengali', 'Show', 'kuntak', '<p>Detal</p>', 'Show', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65294810734!2d106.68943162494352!3d-6.229386704800049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1666936671125!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Terms and Conditions', '<p>detail</p>', 'Show', 'Kebijakan pribadi bn', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 36px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; font-family: inherit; overflow: hidden; width: 270px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"id\">Kebijakan pribadi</span></pre>', 'Show', 'Penafian bn', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 36px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; font-family: inherit; overflow: hidden; width: 270px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"id\">Penafian</span></pre>', 'Show', 'ukhknkj', 'Show', 5, '2022-11-09 09:05:24', '2022-11-09 09:39:04'),
(4, 'Tentang Palembang', '<p>Palembang<br></p>', 'Show', 'Faq Palembang', 'Faq Palembang', 'Show', 'Kontaq', '<p>tt</p>', 'Show', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65294810734!2d106.68943162494352!3d-6.229386704800049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1666936671125!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Syarat dan ketentuan', '<p>Syarat dan ketentuan</p>', 'Show', 'Kebijakan dewek', '<p>Kebijakan dewek<br></p>', 'Show', 'Penafian pl', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 28px; line-height: 36px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; font-family: inherit; overflow: hidden; width: 270px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"id\">Penafian</span></pre>', 'Show', 'Masuk PL', 'Show', 6, '2022-11-09 09:05:47', '2022-11-09 09:39:25');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int NOT NULL DEFAULT '1',
  `author_id` int NOT NULL DEFAULT '0',
  `admin_id` int NOT NULL DEFAULT '0',
  `is_publish` int NOT NULL DEFAULT '0',
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `caption`, `visitor`, `author_id`, `admin_id`, `is_publish`, `language_id`, `created_at`, `updated_at`) VALUES
(2, '2022/galery-photo-1666393148.png', 'vvv', 1, 0, 1, 1, 6, '2022-10-21 22:59:08', '2022-11-09 07:29:17'),
(3, '2022/galery-photo-1666394636.png', 'vvv', 1, 0, 1, 1, 1, '2022-10-21 23:23:56', '2022-10-21 23:23:56'),
(4, '2022/galery-photo-1667978936.png', 'vvv', 1, 0, 1, 1, 3, '2022-11-09 07:28:56', '2022-11-09 07:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_id` int NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int NOT NULL,
  `author_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `is_share` int NOT NULL,
  `is_comment` int NOT NULL,
  `is_publish` int NOT NULL DEFAULT '0',
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `sub_category_id`, `post_title`, `post_detail`, `post_photo`, `visitor`, `author_id`, `admin_id`, `is_share`, `is_comment`, `is_publish`, `language_id`, `created_at`, `updated_at`) VALUES
(3, 8, 'uuu', '<p>iii</p>', '2022/uuu-1666168998.jpg', 1, 0, 1, 1, 1, 1, 1, '2022-10-19 04:17:53', '2022-10-19 08:43:18'),
(4, 7, 'post 7', '<p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et, clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat justo dolore sit invidunt.</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et, clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat justo dolore sit invidunt.</p>', '2022/post-photo-1666247626.png', 1, 0, 1, 1, 1, 1, 1, '2021-10-19 07:40:35', '2022-10-20 06:33:46'),
(5, 10, 'post 6', '<p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero.</p><p style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et, clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat justo dolore sit invidunt.</p>', '2022/post-photo-1666247598.png', 14, 0, 1, 1, 1, 1, 1, '2019-10-19 07:53:20', '2022-11-09 05:46:43'),
(6, 6, 'Post 4', '<p><span style=\"color: rgb(154, 157, 162); font-family: Montserrat, sans-serif;\">Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et.</span><br></p>', '2022/post-photo-1666247537.png', 2, 0, 1, 0, 0, 1, 1, '2022-10-19 09:03:17', '2022-10-20 08:42:48'),
(7, 8, 'post 3', '<p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.&nbsp;<br></p>', '2022/post-photo-1666247507.png', 34, 0, 1, 0, 0, 1, 1, '2022-10-19 09:15:28', '2022-11-04 09:07:59'),
(8, 9, 'Post 2', '<p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.&nbsp;<br></p>', '2022/post-photo-1666247484.png', 29, 0, 1, 0, 0, 1, 1, '2022-10-19 09:16:36', '2022-10-31 04:53:32'),
(9, 5, 'post 1', '<p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.&nbsp;<br></p>', '2022/post-photo-1666247458.png', 5, 0, 1, 0, 0, 1, 1, '2018-10-19 09:17:38', '2022-11-04 09:02:41'),
(10, 5, 'sample 1', '<p>sample 1</p>', '2022/post-photo-1667026641.png', 27, 0, 1, 1, 1, 1, 1, '2022-10-29 06:57:21', '2022-11-08 00:14:45'),
(12, 5, 'Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.', '<p>coba</p>', '2022/post-photo-1667613305.png', 3, 1, 0, 1, 1, 1, 1, '2022-11-05 01:55:05', '2022-11-09 23:10:51'),
(14, 5, 'Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem.', '<p>111</p>', '2022/post-photo-1667616933.png', 4, 1, 0, 1, 1, 1, 1, '2022-11-05 02:55:34', '2022-11-07 09:06:46'),
(15, 16, 'post 7', '<p>post 7<br></p>', '2022/post-photo-1667957054.png', 5, 0, 1, 1, 1, 1, 3, '2022-11-09 01:24:14', '2022-11-09 06:49:57'),
(16, 17, 'post 7', '<p>Post 7</p>', '2022/post-photo-1667958077.png', 2, 0, 1, 1, 1, 1, 3, '2022-11-09 01:41:17', '2022-11-09 05:08:35'),
(17, 19, 'post 7', '<p>Post 7</p>', '2022/post-photo-1667958137.png', 6, 0, 1, 1, 1, 1, 6, '2022-11-09 01:42:17', '2022-11-09 06:22:38'),
(18, 13, 'sepakbola', '<p>sepak bola</p>', '2022/post-photo-1668035402.png', 1, 1, 0, 1, 1, 0, 3, '2022-11-09 23:10:02', '2022-11-09 23:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `social_items`
--

CREATE TABLE `social_items` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_items`
--

INSERT INTO `social_items` (`id`, `icon`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-twitter', 'http://localhost:14050/', 'Show', '2022-11-04 08:02:48', '2022-11-04 08:35:36'),
(2, 'fab fa-facebook-f', 'http://localhost:14050/', 'Show', '2022-11-04 08:11:52', '2022-11-04 08:35:52'),
(3, 'fab fa-linkedin-in', 'http://localhost:14050/', 'Show', '2022-11-04 08:12:11', '2022-11-04 08:36:06'),
(4, 'fab fa-instagram', 'http://localhost:14050/', 'Show', '2022-11-04 08:12:31', '2022-11-04 08:34:58'),
(5, 'fab fa-youtube', 'http://localhost:14050/', 'Show', '2022-11-04 08:12:50', '2022-11-04 08:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mamat@gmail.com', '8d0fe68fcb0e3fd5f40583e8ba712caf07434532a68bc131feb2729103a71976', 'Pending', '2022-10-28 09:59:55', '2022-10-28 09:59:55'),
(2, 'mamat@gmail.com', '', 'Active', '2022-10-28 10:10:33', '2022-10-28 10:20:53'),
(3, 'mamatx@gmail.com', '', 'Active', '2022-10-28 10:23:13', '2022-10-28 10:23:31'),
(4, 'bangreymedia@gmail.com', '', 'Active', '2022-10-29 06:58:55', '2022-10-29 06:59:08'),
(5, 'mamatx@gmail.com', '85807841300d9a37ba779dcc6d503b96279fc421d012472b8194e7c0792048ff', 'Pending', '2022-11-04 07:39:09', '2022-11-04 07:39:09'),
(6, 'mamat@gmail.com', '511462ba7192a6c028149dfa1ce66d0e56afc7e8eed8d0e2bfd285540ac7c8d4', 'Pending', '2022-11-04 07:40:26', '2022-11-04 07:40:26'),
(7, 'mamat@gmail.com', 'd02a112615d67e08c39c6f24d8c013acda425dfd9f69b9b99b77376f4245ddf8', 'Pending', '2022-11-09 11:30:22', '2022-11-09 11:30:22'),
(8, 'mamat@gmail.com', 'e4a988bf389091754af3c92f87da2f0b52290695f6cb8b1ae7e2e97b2f6a24d5', 'Pending', '2022-11-09 11:30:27', '2022-11-09 11:30:27'),
(9, 'mamat@gmail.com', '', 'Active', '2022-11-09 11:30:32', '2022-11-09 11:30:43'),
(10, 'mamat@gmail.com', '5971cbf1f91df4bdbf795e7d62b3f2616d2d28c7a1e72a0c174dd80fbf758514', 'Pending', '2022-11-09 11:38:55', '2022-11-09 11:38:55'),
(11, 'mamat@gmail.com', '234210a57a6ec502e2e2a9e73f0d9ec1439b8352f923f571443a6088da595db4', 'Pending', '2022-11-09 11:40:58', '2022-11-09 11:40:58'),
(12, 'mamat@gmail.com', '6f21f0a3bb8cb5f8314d75ca9f4b60e77926afbd6de9594563f36c1dc4c7f365', 'Pending', '2022-11-09 11:41:54', '2022-11-09 11:41:54'),
(13, 'mamat@gmail.com', '0856c92797042006534f8af1990e50c7c3739baf9957a9cc488fb7ce45123bce', 'Pending', '2022-11-09 11:46:22', '2022-11-09 11:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_home` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hide',
  `sub_category_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category_name`, `show_on_menu`, `show_on_home`, `sub_category_order`, `category_id`, `language_id`, `created_at`, `updated_at`) VALUES
(5, 'Football', 'Show', 'Show', '1', 3, 1, '2022-10-19 01:11:43', '2022-11-08 23:36:59'),
(6, 'Khulna', 'Show', 'Show', '1', 3, 1, '2022-10-19 01:12:07', '2022-10-20 08:51:43'),
(7, 'Insurance', 'Show', 'Show', '2', 4, 1, '2022-10-19 01:12:43', '2022-11-05 03:36:03'),
(8, 'Cricket', 'Show', 'Show', '2', 5, 1, '2022-10-19 01:13:03', '2022-10-20 09:20:43'),
(9, 'Dhaka', 'Show', 'Show', '2', 3, 1, '2022-10-19 01:13:23', '2022-11-05 03:36:17'),
(10, 'Habit', 'Show', 'Show', '1', 4, 1, '2022-10-19 01:13:47', '2022-11-05 03:35:50'),
(13, 'Sepak bola', 'Show', 'Show', '1', 10, 3, '2022-11-08 23:39:52', '2022-11-08 23:49:29'),
(14, 'Khunna', 'Show', 'Show', '2', 10, 3, '2022-11-08 23:41:38', '2022-11-08 23:44:10'),
(15, 'Kebiasaan', 'Show', 'Show', '2', 9, 3, '2022-11-08 23:46:13', '2022-11-08 23:46:13'),
(16, 'Pertanggungan', 'Show', 'Show', '3', 9, 3, '2022-11-08 23:46:49', '2022-11-08 23:46:49'),
(17, 'Cricket', 'Show', 'Show', '2', 7, 3, '2022-11-08 23:47:39', '2022-11-08 23:47:39'),
(18, 'Dhaka', 'Show', 'Show', '3', 10, 3, '2022-11-08 23:48:10', '2022-11-08 23:48:10'),
(19, 'Bal cipak', 'Show', 'Show', '1', 11, 6, '2022-11-09 00:54:49', '2022-11-09 00:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` int NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 3, '999', '2022-10-19 04:17:53', '2022-10-19 07:05:49'),
(2, 3, 'uuu', '2022-10-19 04:17:53', '2022-10-19 04:17:53'),
(3, 3, '999', '2022-10-19 04:17:53', '2022-10-19 04:17:53'),
(4, 3, 'iii', '2022-10-19 04:17:53', '2022-10-19 04:17:53'),
(8, 5, '888', '2022-10-19 08:36:09', '2022-10-19 08:36:09'),
(9, 5, 'uuu', '2022-10-19 08:36:09', '2022-10-19 08:36:09'),
(10, 5, '999', '2022-10-19 08:36:09', '2022-10-19 08:36:09'),
(11, 5, 'iii', '2022-10-19 08:36:09', '2022-10-19 08:36:09'),
(12, 3, '888', '2022-10-19 08:51:33', '2022-10-19 08:51:33'),
(13, 4, 'football', '2022-10-19 08:59:28', '2022-10-19 08:59:28'),
(14, 4, 'basket', '2022-10-19 08:59:28', '2022-10-19 08:59:28'),
(15, 4, 'voli', '2022-10-19 08:59:28', '2022-10-19 08:59:28'),
(16, 4, 'Futsal', '2022-10-19 08:59:47', '2022-10-19 08:59:47'),
(17, 6, 'football', '2022-10-19 09:03:17', '2022-10-19 09:03:17'),
(18, 6, 'basket', '2022-10-19 09:03:17', '2022-10-19 09:03:17'),
(19, 6, 'voli', '2022-10-19 09:03:17', '2022-10-19 09:03:17'),
(20, 6, 'futsal', '2022-10-19 09:03:17', '2022-10-19 09:03:17'),
(21, 7, 'football', '2022-10-19 09:15:28', '2022-10-19 09:15:28'),
(22, 7, 'basket', '2022-10-19 09:15:28', '2022-10-19 09:15:28'),
(23, 7, 'voli', '2022-10-19 09:15:28', '2022-10-19 09:15:28'),
(24, 9, 'football', '2022-10-19 09:17:38', '2022-10-19 09:17:38'),
(25, 9, 'basket', '2022-10-19 09:17:38', '2022-10-19 09:17:38'),
(26, 9, 'voli', '2022-10-19 09:17:38', '2022-10-19 09:17:38'),
(27, 9, 'futsal', '2022-10-19 09:17:38', '2022-10-19 09:17:38'),
(28, 11, 'football', '2022-10-29 06:59:54', '2022-10-29 06:59:54'),
(29, 11, 'basket', '2022-10-29 06:59:54', '2022-10-29 06:59:54'),
(30, 11, 'voli', '2022-10-29 06:59:54', '2022-10-29 06:59:54'),
(31, 11, 'futsal', '2022-10-29 06:59:54', '2022-10-29 06:59:54'),
(32, 12, 'football', '2022-11-05 01:55:05', '2022-11-05 01:55:05'),
(33, 12, 'basket', '2022-11-05 01:55:05', '2022-11-05 01:55:05'),
(36, 13, 'football', '2022-11-05 01:55:56', '2022-11-05 01:55:56'),
(37, 13, 'basket', '2022-11-05 01:55:56', '2022-11-05 01:55:56'),
(40, 13, 'voli', '2022-11-05 02:16:56', '2022-11-05 02:16:56'),
(41, 13, 'futsal', '2022-11-05 02:16:56', '2022-11-05 02:16:56'),
(42, 14, 'football', '2022-11-05 02:55:34', '2022-11-05 02:55:34'),
(43, 14, 'basket', '2022-11-05 02:55:34', '2022-11-05 02:55:34'),
(44, 14, 'voli', '2022-11-05 02:55:34', '2022-11-05 02:55:34'),
(45, 14, 'futsal', '2022-11-05 02:55:34', '2022-11-05 02:55:34'),
(46, 15, 'football', '2022-11-09 01:24:14', '2022-11-09 01:24:14'),
(47, 15, 'basket', '2022-11-09 01:24:14', '2022-11-09 01:24:14'),
(48, 15, 'voli', '2022-11-09 01:24:14', '2022-11-09 01:24:14'),
(49, 15, 'futsal', '2022-11-09 01:24:14', '2022-11-09 01:24:14'),
(50, 16, 'football', '2022-11-09 01:41:17', '2022-11-09 01:41:17'),
(51, 16, 'basket', '2022-11-09 01:41:17', '2022-11-09 01:41:17'),
(52, 16, 'voli', '2022-11-09 01:41:17', '2022-11-09 01:41:17'),
(53, 16, 'futsal', '2022-11-09 01:41:17', '2022-11-09 01:41:17'),
(54, 17, 'football', '2022-11-09 01:42:17', '2022-11-09 01:42:17'),
(55, 17, 'basket', '2022-11-09 01:42:17', '2022-11-09 01:42:17'),
(56, 17, 'voli', '2022-11-09 01:42:17', '2022-11-09 01:42:17'),
(57, 17, 'futsal', '2022-11-09 01:42:17', '2022-11-09 01:42:17'),
(58, 18, 'football', '2022-11-09 23:10:02', '2022-11-09 23:10:02'),
(59, 18, 'basket', '2022-11-09 23:10:02', '2022-11-09 23:10:02'),
(60, 18, 'voli', '2022-11-09 23:10:02', '2022-11-09 23:10:02'),
(61, 18, 'futsal', '2022-11-09 23:10:02', '2022-11-09 23:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int NOT NULL DEFAULT '1',
  `author_id` int NOT NULL DEFAULT '0',
  `admin_id` int NOT NULL DEFAULT '0',
  `is_publish` int NOT NULL DEFAULT '0',
  `language_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_id`, `caption`, `visitor`, `author_id`, `admin_id`, `is_publish`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'x5WNBPWZ21w', 'vvv', 1, 0, 1, 1, 6, '2022-10-22 04:59:13', '2022-11-09 07:24:37'),
(2, 'G4nNBckyZQU', 'Utopia - Hujan', 1, 0, 1, 1, 1, '2022-10-26 02:01:47', '2022-10-26 02:01:47'),
(3, 'ulOb9gIGGd0', 'malaysia', 1, 0, 1, 1, 3, '2022-11-09 07:24:12', '2022-11-09 07:24:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_settings`
--
ALTER TABLE `front_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_advertisements`
--
ALTER TABLE `home_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_channels`
--
ALTER TABLE `live_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_polls`
--
ALTER TABLE `online_polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_items`
--
ALTER TABLE `social_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `front_settings`
--
ALTER TABLE `front_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_advertisements`
--
ALTER TABLE `home_advertisements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `live_channels`
--
ALTER TABLE `live_channels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `online_polls`
--
ALTER TABLE `online_polls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `social_items`
--
ALTER TABLE `social_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
