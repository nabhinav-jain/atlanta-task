CREATE DATABASE IF NOT EXISTS `atlanta_task`;
USE `atlanta_task`;
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
-- Database: `atlanta_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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


--
-- Indexes for dumped tables
--
INSERT INTO `users` (`name`, `mobile_no`, `email`, `address`, `role`, `designation`, `gender`, `logo_path`, `status`, `dob`, `marital_status`, `created_at`, `updated_at`) VALUES
('Aman Sharma', '9876543210', 'aman.sharma@example.com', '123 Civil Lines, Delhi', 'admin', 'Team Lead', 'male', NULL, 'active', '1990-01-15', 1, NOW(), NOW()),
('Sneha Verma', '9123456780', 'sneha.verma@example.com', '45 Residency Road, Mumbai', 'user', 'Developer', 'female', NULL, 'active', '1995-07-20', 0, NOW(), NOW()),
('Rajeev Kapoor', '9988776655', 'rajeev.kapoor@example.com', '78 MG Road, Pune', 'manager', 'HR Manager', 'male', NULL, 'inactive', '1988-11-05', 1, NOW(), NOW()),
('Meera Joshi', '9112233445', 'meera.joshi@example.com', '22 Lake View, Bangalore', 'admin', 'Senior Developer', 'female', NULL, 'active', '1992-03-12', 1, NOW(), NOW()),
('Aryan Singh', '9001122334', 'aryan.singh@example.com', '90 Hill Top, Chennai', 'user', 'Intern', 'male', NULL, 'active', '2000-06-30', 0, NOW(), NOW()),
('Tanvi Das', '9345678901', 'tanvi.das@example.com', '12 Ocean Drive, Kolkata', 'user', 'QA Engineer', 'female', NULL, 'inactive', '1994-09-09', 0, NOW(), NOW()),
('Kunal Mehta', '9870012345', 'kunal.mehta@example.com', '77 Palm Street, Jaipur', 'manager', 'Product Manager', 'male', NULL, 'active', '1985-05-25', 1, NOW(), NOW()),
('Neha Agarwal', '9765432109', 'neha.agarwal@example.com', '34 Park Lane, Ahmedabad', 'admin', 'Tech Lead', 'female', NULL, 'active', '1991-02-14', 1, NOW(), NOW()),
('Vikram Rao', '9321456789', 'vikram.rao@example.com', '19 Lotus Enclave, Hyderabad', 'user', 'UX Designer', 'male', NULL, 'inactive', '1993-08-18', 1, NOW(), NOW()),
('Divya Patel', '9876543211', 'divya.patel@example.com', '56 Spring Field, Surat', 'user', 'Data Analyst', 'female', NULL, 'active', '1996-12-10', 0, NOW(), NOW());

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
