-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2025 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlanta-task`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `logo_path` mediumtext DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dob` date DEFAULT NULL,
  `marital_status` tinyint(1) NOT NULL COMMENT '0 = Unmarried, 1 = Married',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile_no`, `email`, `address`, `role`, `designation`, `gender`, `logo_path`, `status`, `dob`, `marital_status`, `created_at`, `updated_at`) VALUES
(4, 'Kelsey Chapman', '9999999999', 'myva@mailinator.com', 'Amet nihil soluta e', 'User', 'Maiores dignissimos', 'other', NULL, 'inactive', '2023-09-30', 0, '2025-05-15 14:48:16', '2025-05-15 14:48:16'),
(7, 'Abraham sharm', '9999999115', 'tazavorox@mailifnator.comer', 'delhi', 'User', 'Rerum cupidatat ipsu', 'female', NULL, 'active', '1972-06-18', 0, '2025-05-15 14:52:52', '2025-05-16 06:14:35'),
(10, 'Ethan Watkins', '9999999999', 'kybyn@mailinator.com', 'Qui accusantium ut a', 'Admin', 'Velit sit non volup', 'male', NULL, 'inactive', '2000-06-24', 0, '2025-05-15 16:07:30', '2025-05-16 05:58:12'),
(11, 'Kiayada Sexton', '9999999999', 'bonacob@mailinator.com', 'Optio non neque rer', 'Select Role', 'Nisi quasi id volupt', 'female', NULL, 'inactive', '1991-12-05', 1, '2025-05-16 05:03:30', '2025-05-16 05:03:30'),
(12, 'Jamal sex', '9999999911', 'xavag@mailinator.com', 'delhi', 'Admin', 'Officia soluta volup', 'male', NULL, 'active', '2002-08-21', 0, '2025-05-16 05:08:21', '2025-05-16 06:17:13'),
(14, 'sangeeta Mcconnell', '9999999999', 'mateqituj@mailinator.com', 'Necessitatibus corru', 'User', 'Sint blanditiis labo', 'male', NULL, 'active', '2022-06-03', 0, '2025-05-16 05:54:11', '2025-05-16 05:55:23'),
(15, 'Cara Merrill jain', '9999999999', 'kydahi@mailinator.com', 'Aut cumque et aliqua', 'User', 'Laudantium aperiam', 'other', NULL, 'inactive', '2014-11-14', 1, '2025-05-16 06:00:04', '2025-05-16 06:40:25'),
(16, 'Hanna Trevino', '9999999991', 'cataq@mailinator.com', 'Vel aliquip providen', 'Admin', 'Unde eiusmod nihil c', 'female', NULL, 'active', '1973-11-09', 0, '2025-05-16 06:02:03', '2025-05-16 06:15:34'),
(17, 'Xaviera Campbell', '9999999999', 'zedyb@mailinator.com', 'Delectus obcaecati', 'Admin', 'Temporibus libero ev', 'female', NULL, 'inactive', '1991-09-25', 0, '2025-05-16 06:52:17', '2025-05-16 06:54:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
