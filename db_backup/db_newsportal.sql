-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 04:53 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `about` varchar(200) NOT NULL,
  `details` varchar(1024) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `source` varchar(256) NOT NULL,
  `publish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `about`, `details`, `photo`, `source`, `publish`) VALUES
(1, 'Title-1', 'About-1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis ipsa tempore at recusandae ut veritatis cumque fuga rem earum dolor doloremque dolore nisi veniam, beatae ratione esse fugiat asperiores. Officia!', 'public/files/p_01.png', 'https://www.google.com/', '2023-01-08 14:20:09'),
(2, 'Titile-2', 'About-2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi quae ipsam recusandae natus consequuntur, eaque laudantium accusantium quis, inventore autem tenetur vel ullam ipsum? Quis, itaque amet. Quidem, error quibusdam.\r\nRem, sunt? Quis, cumque. Fuga perferendis, aspernatur sapiente molestiae commodi sunt ratione nisi enim doloribus temporibus ad blanditiis debitis laudantium recusandae, ipsam expedita tempora odio distinctio ullam magni dicta vel.', 'public/files/p_02.png', 'https://www.source_2.com/', '2022-12-19 06:13:46'),
(3, 'Titile-3', 'About-3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus veritatis atque dolores obcaecati reprehenderit ex ipsam et, ad inventore non alias quis illum esse adipisci voluptatem debitis aspernatur cum quos.\r\nVeniam eum reiciendis, quas assumenda laborum ab! Porro fuga quos velit exercitationem dolorem reiciendis consequuntur alias! Commodi sequi officiis laborum, quia facere enim repudiandae perferendis soluta vero voluptatem. Voluptatem, qui.\r\nVoluptatem velit doloremque fugit ipsa numquam sint dignissimos quidem alias, ut eligendi soluta dolor laborum consectetur qui unde rerum tempore. A ut eum obcaecati laboriosam eligendi sint accusantium laudantium iste.', 'public/files/p_05.png', 'https://www.source_3.com/', '2023-01-08 15:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'moder'),
(4, 'staff'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(3, 'active'),
(5, 'bunned'),
(2, 'confirmed'),
(4, 'inactive'),
(1, 'pending'),
(6, 'unbanned');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL,
  `role_id` int NOT NULL,
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `passw`, `email`, `regdate`, `role_id`, `status_id`) VALUES
(1, 'Superuser', '794d824566c564c154e4626ad7517b04', 'user-1@ukr.net', '2022-12-18 11:39:39', 1, 3),
(28, 'User_1', '90abed74e9e0751f4e4f3ce891a77083', 'summit@gmail.com', '2023-01-08 16:31:21', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
