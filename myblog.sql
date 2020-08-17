-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2020 at 11:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Technology', '2019-06-15 07:18:14'),
(2, 'Gaming', '2019-06-15 07:18:14'),
(3, 'Auto', '2019-06-15 07:18:14'),
(4, 'Entertainment', '2019-06-15 07:18:14'),
(5, 'Books', '2019-06-15 07:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(19, 'emanuelinacio1@hotmail.com', '44c3d68092fb21d5bc5a59d6f0602b0fff8376cf586daa647d4cfb1f2fe5f86c7628ef20e6c97d5e34fea23b0d161a42c80b'),
(20, 'peter@email.com', 'c46d50f057847671f9345dd1831b4e2efa85104dff623e50481bb12533660f52ddd266724ee4eed6d7f1ddb6026330658bd6'),
(21, 'garret@email.com', '4f1f430b8742897c3adda0f65d6ec3193935a6e1ba8ddf86b4e4a00d440926deac554ccdf3a67acb9ef375c77640268f6293'),
(22, 'garret@email.com', 'b78b3b6a0ea68770b1f718586ba2fa913c047a9d8a089cef202864c18e0eb2529578e31cfddda912bdbbf9b969666131dc9f'),
(23, 'ney@email.com', '20859e91909feb5afef1e1cdc58299c4dd8c66e598436139487ee05d468e44368da872fbc952150646ebcfebd9498fed19f9');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `cover_image_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `cover_image_name`, `created_at`, `email`) VALUES
(157, 0, 'Creating a Classic Editor with a Textarea', '<p>CKEDITOR is amazing</p>\n', 'Emanuel Inacio ', 'loveimage_1577998360.jpg', '2020-01-02 13:52:40', 'emanuelinacio1@hotmail.com'),
(158, 0, 'Why you should read more', '<p>Some content about why you should read more</p>\n', 'Emanuel Inacio ', 'books_1578022150.png', '2020-01-02 20:29:10', 'emanuelinacio1@hotmail.com'),
(159, 0, 'How to decode body plot', '<p>Some content</p>\n', 'Peter Petreli', 'AC SWEEP_1578100787.png', '2020-01-03 18:19:47', 'peter@email.com'),
(160, 0, 'The fight in the seas', '<p>The day started early and calm. We took our merchandise and head to the ship to sail to the lands of the dead. It was scary at first, but as time went by, we got the hang of it and things started to get clear. We began to understand the innerworkings of the sea and how we can leverage it to our advantage.&nbsp;</p>\n', 'Emanuel Inacio ', '902096_1578125357.jpg', '2020-01-04 01:09:17', 'emanuelinacio1@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(19, 'Emanuel Inacio ', 'emanuelinacio1@hotmail.com', '$2y$10$spulBFaVqfxeXOhC/ER5eecw/I73cgep47T4ce9ewFCW0V3bFxiKW', '2019-12-29 09:34:17'),
(20, 'Peter Petreli', 'peter@email.com', '$2y$10$oCHv54a.D.F3vgwscKsrQuP3eXDVW9RAInRMcnR.01mrkhjZN0JiK', '2019-12-29 09:41:03'),
(22, 'john Garret', 'garret@email.com', '$2y$10$V0fItCcvm6q/mhC2riczc.yg9ahDfvaNTRBwRaVzdNAHKzDa2l80m', '2019-12-29 21:08:29'),
(23, 'ney', 'ney@email.com', '$2y$10$o.rHE8i9KWtPLJLoKevEt.ZzpmEaoFG9G.DX6bvGAG.KPtHHYn4Em', '2019-12-31 15:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
