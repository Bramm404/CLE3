-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2026 at 01:34 PM
-- Server version: 8.4.2
-- PHP Version: 8.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geldlift_db`
--
CREATE DATABASE IF NOT EXISTS `geldlift_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `geldlift_db`;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int UNSIGNED NOT NULL,
  `user` int UNSIGNED DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user`, `name`, `surname`, `email`, `address`, `message`) VALUES
(1, 4, 'Bram', 'den Boer', 'test@plan.nl', ' , , ', ''),
(2, 4, 'Bram', 'den Boer', 'test@plan.nl', ' , , ', ''),
(3, 4, 'Bram', 'den Boer', 'test@plan.nl', ' , , ', ''),
(4, 4, 'Bram', 'den Boer', 'test@plan.nl', 'Kerkweh 216, 2941KK, Lekkahkerk', 'Wat?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `business_name`, `password`, `phone`) VALUES
(1, 'w', 'b', 'wb@bw.nl', 'lol', '$2y$12$gQMYTFXPzgCCg2vYwPadZ.UCQB5xnBFWIbnkK3YObbgYpXAteiux.', '0312213'),
(2, 'Bram', 'den Boer', 'b@c.nl', 'Lol', '$2y$12$0Dy94UYF0v9bx5XvjX4i7eOfdw7iV4NjYx0FcBXS9fHzrzhIrVW62', '042'),
(3, 'Bram', 'den Boer', 'bramdb16703@gmail.com', 'LEQ Reclame', '$2y$12$6v4FAs.kC9AzEmvYmWXE9.ervymX.A3othHZTmncH5rk5YQj/wv/O', ''),
(4, 'Bram', 'den Boer', 'test@plan.nl', 'Ruud\'s frituur', '$2y$12$BMJg9H4zlfmf7TcyVATYcORqkVzlJLwjLDwfNLz3VIz8uuXQmzyzi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
