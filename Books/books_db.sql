-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 10:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `book_id`, `booking_date`) VALUES
(2, 1, 4, '2025-06-01 09:33:38'),
(3, 1, 4, '2025-06-01 10:47:11'),
(4, 1, 6, '2025-06-01 10:55:37'),
(5, 1, 5, '2025-06-01 11:02:41'),
(6, 1, 4, '2025-06-01 11:44:47'),
(7, 1, 4, '2025-06-01 11:45:52'),
(8, 1, 4, '2025-06-01 15:00:22'),
(9, 1, 5, '2025-06-01 15:00:55'),
(10, 1, 5, '2025-06-01 15:03:56'),
(11, 1, 4, '2025-06-01 15:06:28'),
(12, 1, 5, '2025-06-01 15:13:54'),
(13, 1, 4, '2025-06-01 15:21:51'),
(14, 1, 4, '2025-06-01 15:21:56'),
(15, 1, 4, '2025-06-01 15:25:48'),
(16, 2, 4, '2025-06-01 17:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `book_desc` text DEFAULT NULL,
  `book_rating` int(11) DEFAULT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_author`, `book_desc`, `book_rating`, `book_image`, `title`, `author`, `description`, `genre`, `rating`, `image`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, 'November 9', 'Colleen Hoover', '', 'Zhanër 1', 5, 'book1.jpg'),
(5, NULL, NULL, NULL, NULL, NULL, 'The 7 habits of highly effective people', 'Stephen Covey', '', 'Zhanër 2', 4, 'book2.jpg'),
(6, NULL, NULL, NULL, NULL, NULL, 'Surviving Summer', 'Lynley Phillips', '', 'Zhanër 3', 3, 'book3.jpg'),
(8, NULL, NULL, NULL, NULL, NULL, 'The River Is Waiting', ' Wally Lamb', '', '', 0, NULL),
(9, NULL, NULL, NULL, NULL, NULL, 'Tell Me Everything', 'Elizabeth Strout ', '', '', 0, NULL),
(10, NULL, NULL, NULL, NULL, NULL, 'Touch', 'Rebecca Miller', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
(1, 'admin', 'admin', 'admin@example.com', '$2y$10$jeP.hDieCVfTCUHAJfA5oep4YtTzdJgyEFZywby6FMlnQTp0qx.q6', '$2y$10$jeP.hDieCVfTCUHAJfA5oep4YtTzdJgyEFZywby6FMlnQTp0qx.q6', 1),
(2, NULL, 'test', NULL, '$2y$10$Ea6YpDYRIl9JfFoIByD3fOPPv48VbWEaSJM8jAQTh8t2NJT1YNx3m', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
