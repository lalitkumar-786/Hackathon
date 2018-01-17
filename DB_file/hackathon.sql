-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 11:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--
CREATE DATABASE IF NOT EXISTS `hackathon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackathon`;

-- --------------------------------------------------------

--
-- Table structure for table `code_bytes`
--

CREATE TABLE `code_bytes` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sharing_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussion_replies`
--

CREATE TABLE `discussion_replies` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_replies`
--

INSERT INTO `discussion_replies` (`id`, `username`, `message`, `created_at`, `updated_at`) VALUES
(3, 'aaa@a', 'aaaaaaaaaaa', '2017-03-24 11:11:17', '2017-03-24 11:11:17'),
(3, 'aaa@a', 'nsfgnkfdnb', '2017-03-24 11:16:36', '2017-03-24 11:16:36'),
(4, 'aaa@a', 'do not try to do this', '2017-03-24 14:05:04', '2017-03-24 14:05:04'),
(4, 'aaa@a', 'but this world is cruel', '2017-03-24 14:05:46', '2017-03-24 14:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_thread`
--

CREATE TABLE `discussion_thread` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_thread`
--

INSERT INTO `discussion_thread` (`id`, `username`, `topic`, `topic_description`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'aa', 'aa', 'aa', '2017-03-24 10:49:30', '2017-03-24 10:49:30'),
(2, 'aaa@a', 'aa', 'aa', 'aa', '2017-03-24 10:53:43', '2017-03-24 10:53:43'),
(3, 'aaa@a', 'aa', 'aa', 'aa', '2017-03-24 11:10:01', '2017-03-24 11:10:01'),
(4, 'aaa@a', 'hackathon', 'lets hack our way out', 'hackathon', '2017-03-24 14:04:22', '2017-03-24 14:04:22'),
(5, 'aaa@a', 'hackathon', 'sadfsfsfs', 'asdf', '2017-03-24 14:13:01', '2017-03-24 14:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `judge_stats`
--

CREATE TABLE `judge_stats` (
  `submission_id` int(10) UNSIGNED NOT NULL,
  `verdict` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judge_stats`
--

INSERT INTO `judge_stats` (`submission_id`, `verdict`, `created_at`, `updated_at`) VALUES
(1, 'Skipped', '2017-03-24 15:21:27', '2017-03-24 15:21:27'),
(2, 'AC', '2017-03-24 15:22:18', '2017-03-24 15:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `firstname`, `lastname`, `remember_token`, `created_at`, `updated_at`) VALUES
('aa@aa', 'a', 'aa', 'aa', NULL, '2017-03-24 03:26:24', '2017-03-24 03:26:24'),
('aaa@a', 'a', 'aaa', 'aaa', NULL, '2017-03-24 03:23:33', '2017-03-24 03:23:33'),
('ranjeet@gmail.com', '123456', 'Ranjeet Kumar', 'Yadav', NULL, '2017-03-24 05:05:13', '2017-03-24 05:05:13'),
('s@a', 'a', 's', 's', NULL, '2017-03-24 05:08:54', '2017-03-24 05:08:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_24_051054_database', 2);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `owner`, `title`, `description`, `requirements`, `created_at`, `updated_at`) VALUES
(13, 'asa', 'bjdb', 'fdsf', 'dfsf', '2017-03-24 12:30:06', '2017-03-24 12:30:06'),
(13, 'asa', 'adffdsafa', 'dasfsdfsaf', 'dsfafasdff', '2017-03-24 13:12:27', '2017-03-24 13:12:27'),
(13, 'asa', 'afafasdffa', 'afdfaf', 'dsfasdfafdsaf', '2017-03-24 13:14:17', '2017-03-24 13:14:17'),
(13, 'asa', 'sfadsfasf', 'dssafasfafdgfdgd', 'fgfdgfg', '2017-03-24 13:15:13', '2017-03-24 13:15:13'),
(13, 'asa', 'asdadasda', 'sfsdfsdf', 'sdffsdf', '2017-03-24 13:16:02', '2017-03-24 13:16:02'),
(13, 'asa', 'qweqe', 'qeqweqeqe', 'qweqweqwe', '2017-03-24 13:23:36', '2017-03-24 13:23:36'),
(13, 'asa', '1312313', 'sfasfsf', 'asdffasfddsf', '2017-03-24 13:27:25', '2017-03-24 13:27:25'),
(13, 'asa', 'qweqeq', 'qweqe', 'qweqeq', '2017-03-24 13:28:03', '2017-03-24 13:28:03'),
(13, 'asa', 'qweqweqw', 'qweqeqwe', 'qweqweq', '2017-03-24 13:29:52', '2017-03-24 13:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects_accept`
--

CREATE TABLE `projects_accept` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shared_documents`
--

CREATE TABLE `shared_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shared_documents`
--

INSERT INTO `shared_documents` (`id`, `username`, `file_url`, `description`, `course_code`, `type`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'dsadfaf', 'dsad', 'cs31', 'da', NULL, NULL),
(2, 'aaa@a', 'we.iiitdmj.ac.n', 'feaafe', 'dadde', 'doc', '2017-03-24 12:15:14', '2017-03-24 12:15:14'),
(3, 'aaa@a', 'shared_documents//UYQq0zc8LkoOtVF4xEtxqoDQS3l6VWNZD5Ek0HCh.txt', 'asdasd', 'asdasdasd', 'text/plain', '2017-03-24 16:53:50', '2017-03-24 16:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `upload_private`
--

CREATE TABLE `upload_private` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_public`
--

CREATE TABLE `upload_public` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_public`
--

INSERT INTO `upload_public` (`username`, `title`, `filename`, `created_at`, `updated_at`) VALUES
('test@iiitdmj.ac.in', 'fae', 'test@iiitdmj.ac.in/public/jAq8Xcw16xna180gBsuuUGZB91ec6SE9B1MflGQP.png', '2017-03-24', '2017-03-24'),
('test@iiitdmj.ac.in', '123', 'test@iiitdmj.ac.in/public/xmFzRnOMDkiAQJuvrIiuHrBjVtMuMNwDWCC6tGRG.png', '2017-03-24', '2017-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code_bytes`
--
ALTER TABLE `code_bytes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_bytes_username_foreign` (`username`(191));

--
-- Indexes for table `discussion_thread`
--
ALTER TABLE `discussion_thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_thread_username_foreign` (`username`(191));

--
-- Indexes for table `judge_stats`
--
ALTER TABLE `judge_stats`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `shared_documents`
--
ALTER TABLE `shared_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion_thread`
--
ALTER TABLE `discussion_thread`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `judge_stats`
--
ALTER TABLE `judge_stats`
  MODIFY `submission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shared_documents`
--
ALTER TABLE `shared_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
