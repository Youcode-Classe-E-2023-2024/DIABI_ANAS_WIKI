-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 09:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `title` varchar(111) NOT NULL,
  `content` text NOT NULL,
  `status` enum('public','archived') NOT NULL DEFAULT 'public',
  `category_id` int(111) DEFAULT NULL,
  `createdAt` varchar(111) NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `status`, `category_id`, `createdAt`, `edited_at`, `user_id`) VALUES
(2, 'article', ' Programming is the art of instructing computers to perform tasks by providing them with a set of logical and structured instructions. It is a creative and problem-solving endeavor that empowers individuals to transform ideas into functional software. Programmers use various programming languages, such as Python, Java, and JavaScript, to communicate with computers and build applications ranging from simple scripts to complex software systems. The process involves breaking down problems into smaller, manageable components and crafting efficient algorithms to solve them. Beyond syntax and code, programming fosters a mindset of continuous learning, adaptability, and precision, as developers strive to create elegant solutions that address real-world challenges. In an ever-evolving technological landscape, programming serves as a cornerstone for innovation, driving advancements in diverse fields and shaping the digital future.', 'archived', 0, '2024-01-11 13:53:38', '2024-01-11 12:55:32', 1),
(3, '', '', 'archived', 0, '2024-01-11 13:54:08', '2024-01-11 12:55:34', 1),
(4, 'Article ', ' is the art of instructing computers to perform tasks by providing them with a set of logical and structured instructions. It is a creative and problem-solving endeavor that empowers individuals to transform ideas into functional software. Programmers use various programming languages, such as Python, Java, and JavaScript, to communicate with computers and build applications ranging from simple scripts to complex software systems. The process involves breaking down problems into smaller, manageable components and crafting efficient algorithms to solve them. Beyond syntax and code, programming fosters a mindset of continuous learning, adaptability, and precision, as developers strive to create elegant solutions that address real-world challenges. In an ever-evolving technological landscape, programming serves as a cornerstone for innovation, driving advancements in diverse fields and shaping the digital future.', 'public', 2, '2024-01-11 13:56:46', '2024-01-11 21:48:32', 3),
(5, 'test', 'testcategorie', 'public', 2, '2024-01-11 21:43:59', NULL, 1),
(6, 'Article Title', ' is the art of instructing computers to perform tasks by providing them with a set of logical and structured instructions. It is a creative and problem-solving endeavor that empowers individuals to transform ideas into functional software. Programmers use various programming languages, such as Python, Java, and JavaScript, to communicate with computers and build applications ranging from simple scripts to complex software systems. The process involves breaking down problems into smaller, manageable components and crafting efficient algorithms to solve them. Beyond syntax and code, programming fosters a mindset of continuous learning, adaptability, and precision, as developers strive to create elegant solutions that address real-world challenges. In an ever-evolving technological landscape, programming serves as a cornerstone for innovation, driving advancements in diverse fields and shaping the digital future.', 'public', 1, '2024-01-11 22:25:15', '2024-01-11 21:48:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `tag_id` varchar(111) NOT NULL,
  `article_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`tag_id`, `article_id`) VALUES
('1', 1),
('1', 1),
('1', 1),
('1', 1),
('1', 1),
('1', 1),
('2', 1),
('1', 2),
('2', 3),
('1', 5),
('1', 3),
('2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `edited_at`) VALUES
(1, 'Categorie_1', '2024-01-11 00:24:10', NULL),
(2, 'Categorie_2', '2024-01-11 00:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(111) NOT NULL,
  `name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Tag_1'),
(2, 'tag_2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(111) NOT NULL,
  `pwd` varchar(111) NOT NULL,
  `role` varchar(111) NOT NULL DEFAULT 'auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`, `role`) VALUES
(1, 'admin', 'admin@admin.admin', '$2y$10$DSc5ylWuAnyZGdi/15lqXuT8jMVyPoQ2Gb0BnQvB6jesMFjITH1G6', 'admin'),
(2, 'yassin', 'yassin@gmail.com', '$2y$10$JpzJcfjb7RL9fPbnLn8c0uXUVlj2RTo9WO5silbpA9oGZHbPSJrDW', 'auteur'),
(3, 'user2', 'user@user.user', '$2y$10$t3GF9Rn9dvt/VKXSsDU67.4m/wm.Paz8l/juS9VNB/tiWRri8dqIy', 'auteur'),
(4, 'jjj', 'jjj@oo.oo', '$2y$10$mn5vN0xGFX0CJbdV95fjveShm09s4kdgQ1.fLk0mycEWKRBB4fLp6', 'auteur'),
(5, 'admin1', 'anas@anas.anas', '$2y$10$xzY6mTwHFuVpzErLqK1UUusZ9mYAwJpuBcHRU7ocZVpXvks3tDgs6', 'auteur'),
(6, 'naoufal', 'naoufal@gmail.com', '$2y$10$n6KST9M9EXB64BzD0vPTMO86lDFd78b4w.J.kHCbYWiDBx9fEM/KC', 'auteur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
