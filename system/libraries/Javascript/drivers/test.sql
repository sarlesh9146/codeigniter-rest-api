-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 06:37 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `router_details`
--

CREATE TABLE `router_details` (
  `id` int(11) NOT NULL,
  `dns_name` varchar(200) NOT NULL,
  `host_name` varchar(150) NOT NULL,
  `client_ip_address` varchar(50) NOT NULL,
  `mac_address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `router_details`
--

INSERT INTO `router_details` (`id`, `dns_name`, `host_name`, `client_ip_address`, `mac_address`, `status`) VALUES
(1, 'dns1.smtp.com', 'smtp', '192.168.0.1', 'as:12:sd:sd:2s', 0),
(2, 'dns1.smtp.com', 'smtp', '192.168.0.1', 'as:12:sd:sd:2s', 0),
(3, 'dns1.smtp.com', 'smtp', '192.168.0.2', 'as:12:bd:sd:2s', 0),
(4, 'dns2.smtp.com', 'smtp', '192.168.0.3', 'as:12:dd:sd:2s', 0),
(5, 'dn3.smtp.com', 'smtp', '192.168.0.4', 'as:s2:sd:sd:2s', 1),
(6, 'dns4.smtp.com', 'smtp', '192.168.0.5', '2s:12:sd:sd:2s', 0),
(7, 'dns5.smtp.com', 'smtp', '192.168.0.6', 'as:12:sd:sd:2s', 0),
(8, 'dns6.smtp.com', 'smtp', '192.168.0.7', 'as:12:sd:sd:2s', 0),
(9, 'dns7.smtp.com', 'smtp', '192.168.0.8', 'as:52:sd:sd:2s', 0),
(10, 'dns8.smtp.com', 'smtp', '192.168.0.10', 'as:12:sd:sd:2s', 0),
(11, 'dns9.smtp.com', 'smtp', '192.168.0.11', 'as:12:sd:sd:2s', 0),
(12, 'dns2.smtp.com', 'smtp', '192.168.0.12', 'as:12:sd:sd:2s', 0),
(13, 'dns8.smtp.com', 'smtp', '192.168.0.13', 'as:12:sd:sd:2s', 0),
(14, 'dns3.smtp.com', 'smtp', '192.168.0.14', 'as:12:sd:sd:2s', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_email`, `user_pwd`, `user_type`, `created_at`, `updated_at`, `status`) VALUES
(8, 'sar', 'kumar', 'sarlesh@gmail.com', '32b718da8899a9a79f63e91e632cf4ac', 'admin', '2020-06-07 03:53:57', '2020-06-07 03:55:23', 0),
(11, 'user11', 'one', 'user1@gmail.com', '32b718da8899a9a79f63e91e632cf4ac', 'user', '2020-06-07 05:52:39', '2020-06-07 07:41:20', 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `user_insert_data` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.created_at = CURRENT_TIMESTAMP()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_update_data` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.updated_at = CURRENT_TIMESTAMP()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `router_details`
--
ALTER TABLE `router_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `router_details`
--
ALTER TABLE `router_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
