-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:10 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch7.30a`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allcat`
-- (See below for the actual view)
--
CREATE TABLE `allcat` (
`maincat` varchar(20)
,`categories_id` int(5)
,`subcat` mediumtext
);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cstatus` enum('yes','no') DEFAULT 'yes',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `priorities` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `description`, `cstatus`, `create_at`, `update_at`, `priorities`) VALUES
(1, 'dfsd', NULL, 'yes', '2024-02-02 03:26:36', '2024-02-02 03:26:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cstatus` enum('yes','no') DEFAULT 'yes',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `priorities` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `cstatus`, `create_at`, `update_at`, `priorities`) VALUES
(1, 'Electronics', 'All type of electronics', 'no', '2024-01-24 03:37:33', '2024-01-01 03:37:33', NULL),
(2, 'Furniture', 'All type of Furniture', 'yes', '2024-01-24 03:43:18', '2024-01-24 03:43:18', NULL),
(3, 'Vechile', 'spelling nahi aati hemant ko moye moye', 'yes', '2024-01-24 03:49:03', '2024-01-24 03:49:03', NULL),
(4, 'Crockery', 'nahi he', 'yes', '2024-01-24 03:56:10', '2024-01-24 03:56:10', NULL),
(5, 'Books', 'all types of books ', 'yes', '2024-01-25 03:36:48', '2024-01-25 03:36:48', NULL),
(6, 'Garments', 'gfd', 'no', '2024-01-25 03:51:22', '2024-01-29 03:22:04', NULL),
(7, 'stationary', 'ok', 'yes', '2024-01-26 02:37:19', '2024-01-29 03:22:41', NULL),
(8, 'Ceramic', 'this is test', 'yes', '2024-01-26 02:50:05', '2024-01-26 02:50:05', NULL),
(9, 'Machine\'s', 'ok', 'yes', '2024-01-26 03:05:45', '2024-01-26 03:05:45', NULL),
(10, 'Colddrink', 'ok', 'yes', '2024-01-26 03:06:15', '2024-01-29 03:13:05', NULL),
(11, 'Lubricants', '', 'yes', '2024-01-27 03:18:45', '2024-01-27 03:18:45', NULL),
(12, 'Grocery', '', 'yes', '2024-01-27 03:19:41', '2024-01-27 03:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` enum('image','audio','video','pdf','other') NOT NULL,
  `main` enum('yes','no') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `path`, `type`, `main`, `created_at`) VALUES
(1, 'product', 'public/images/1709260088__DSC3215.jpg', 'image', 'yes', '2024-03-01 02:28:08'),
(2, 'product sub image', 'public/images/1709260088_road-1072823_640 (1).jpg', 'image', 'no', '2024-03-01 02:28:08'),
(3, 'product sub image', 'public/images/1709260088_axixa full stack.jpg', 'image', 'no', '2024-03-01 02:28:08'),
(4, 'product', 'public/images/1709520432_PXL_20210321_115438336.jpg', 'image', 'yes', '2024-03-04 02:47:12'),
(5, 'product sub image', 'public/images/1709520432_IMG_20210313_125218_555.jpg', 'image', 'no', '2024-03-04 02:47:12'),
(6, 'product sub image', 'public/images/1709520432_nsplogo1.jpg', 'image', 'no', '2024-03-04 02:47:12'),
(7, 'product sub image', 'public/images/1709520432_PXL_20210321_124810594.jpg', 'image', 'no', '2024-03-04 02:47:12'),
(8, 'product sub image', 'public/images/1709520432_PXL_20210321_124236429.jpg', 'image', 'no', '2024-03-04 02:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(15) DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `product_discount` int(5) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `batch_number` int(5) DEFAULT NULL,
  `status` enum('yes','no') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_discount`, `product_description`, `batch_number`, `status`, `created_at`) VALUES
(2, 'My Product', 25000, 25, '<p>ok</p>', NULL, NULL, '2024-03-01 02:28:08'),
(3, 'mug', 300, 14, '<p>dekho wo aa gaya</p>', NULL, NULL, '2024-03-04 02:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `product_id` int(5) NOT NULL,
  `media_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`product_id`, `media_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategories`
--

CREATE TABLE `product_subcategories` (
  `product_id` int(5) NOT NULL,
  `subcategories_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcategories`
--

INSERT INTO `product_subcategories` (`product_id`, `subcategories_id`) VALUES
(2, 6),
(2, 7),
(2, 9),
(3, 1),
(3, 4),
(3, 5),
(3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cstatus` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `priorities` int(3) DEFAULT NULL,
  `categories_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `cstatus`, `created_at`, `updated_at`, `priorities`, `categories_id`) VALUES
(1, 'Electronics', 'All type of electronics', 'no', '2024-01-24 03:37:33', '2024-02-21 02:39:40', NULL, 1),
(2, 'Furniture', 'All type of Furniture', 'yes', '2024-01-24 03:43:18', '2024-02-21 02:39:40', NULL, 2),
(3, 'Vechile', 'spelling nahi aati hemant ko moye moye', 'yes', '2024-01-24 03:49:03', '2024-02-21 02:39:40', NULL, 3),
(4, 'Crockery', 'nahi he', 'yes', '2024-01-24 03:56:10', '2024-02-24 02:53:31', NULL, 5),
(5, 'Books', 'all types of books ', 'yes', '2024-01-25 03:36:48', '2024-02-24 02:53:41', NULL, 2),
(6, 'Garments', 'gfd', 'no', '2024-01-25 03:51:22', '2024-02-24 02:53:31', NULL, 5),
(7, 'stationary', 'ok', 'yes', '2024-01-26 02:37:19', '2024-02-24 02:53:31', NULL, 1),
(8, 'Ceramic', 'this is test', 'yes', '2024-01-26 02:50:05', '2024-02-24 02:53:31', NULL, 3),
(9, 'Machine\'s', 'ok', 'yes', '2024-01-26 03:05:45', '2024-02-24 02:53:31', NULL, 1),
(10, 'Colddrink', 'ok', 'yes', '2024-01-26 03:06:15', '2024-02-24 02:53:31', NULL, 3);

-- --------------------------------------------------------

--
-- Structure for view `allcat`
--
DROP TABLE IF EXISTS `allcat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allcat`  AS SELECT `categories`.`name` AS `maincat`, `subcategories`.`categories_id` AS `categories_id`, group_concat(concat(`subcategories`.`id`,'-',`subcategories`.`name`) separator ',') AS `subcat` FROM (`subcategories` join `categories` on(`categories`.`id` = `subcategories`.`categories_id`)) GROUP BY `categories`.`name` ORDER BY `categories`.`name` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`product_id`,`media_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `product_subcategories`
--
ALTER TABLE `product_subcategories`
  ADD PRIMARY KEY (`product_id`,`subcategories_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
