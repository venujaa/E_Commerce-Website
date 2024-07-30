-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2024 at 04:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc1`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `name` varchar(225) NOT NULL,
  `location` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`name`, `location`) VALUES
('apple iphone 11 pro ', 'upload/p15.jpg'),
('apple iphone 15 plus', 'upload/p5.jpg'),
('Apple iPhone 15 Pro ', 'upload/Apple-iPhone-15-Pro-768x768.jpg'),
('Apple iPhone 15 pro Max ', 'upload/Apple-iPhone-15-Pro-3-1-768x768.jpg'),
('Google Pixel 7 Pro', 'upload/Google-Pixel-7-Pro-5G-1-768x768.jpg'),
('oppo a74 5g', 'upload/p9.jpg'),
('oppo a76', 'upload/p8.jpg'),
('oppo a78', 'upload/p13.jpg'),
('oppo find x5 lite', 'upload/p10.jpg'),
('samsung galaxy a03s', 'upload/p20.jpg'),
('samsung galaxy a05s', 'upload/p3.jpg'),
('Samsung Galaxy F34', 'upload/Galaxy-F34-5G-1-768x768.jpg'),
('Samsung Galaxy F54', 'upload/Untitled-design-3-768x768.png'),
('samsung galaxy m22', 'upload/p12.jpg'),
('Samsung Galaxy S20', 'upload/S20.jfif'),
('samsung galaxy s23 fe', 'upload/p2.jpg'),
('samsung galaxy z flip3', 'upload/p17.jpg'),
('Samsung Galaxy Z Fold 5', 'upload/Untitled-design-11-768x768.jpg'),
('tecno spark 7 pro', 'upload/p11.jpg'),
('xiaomi poco x3 pro', 'upload/p18.jpg'),
('xiaomi redmi 13c', 'upload/p4.jpg'),
('xiaomi redmi 9a', 'upload/p16.jpg'),
('xiaomi redmi note 10s', 'upload/p19.jpg'),
('Xiaomi Redmi Note 12 Pro', 'upload/Xiaomi-Redmi-Note-12-Pro-4G-8GB-RAM-256GB-2-600x600.jpg'),
('Xiaomi Redmi Note 12S', 'upload/Redmi-Note-12S-768x768.jpg'),
('zte blade a5 2020', 'upload/p7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL,
  `product` varchar(225) NOT NULL,
  `customer` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '0',
  `amount` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `product`, `customer`, `location`, `date`, `status`, `amount`) VALUES
(25, 'tharsikan7@gmail.com', ',Google Pixel 7 Pro', 'tharsikan7', 'Kaithady south Kaithady', '2024-01-26 08:54:24', 0, '340103'),
(26, 'tharsikan645@gmail.com', ',samsung galaxy a03s', 'Tharsikan645', 'Kaithady south Kaithady', '2024-01-26 10:04:41', 0, '50990'),
(30, 'tharsikan645@gmail.com', ',tecno spark 7 pro', 'Tharsikan645', 'Kaithady south Kaithady', '2024-01-26 10:27:35', 0, '33990');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `name` varchar(225) NOT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `description`, `price`) VALUES
('apple iphone 11 pro ', '512GB (DIRECT IMPORT)', '289990.00'),
('Apple iPhone 15 Pro ', '8GB RAM 1TB ROM,<br>\r\n48MP Main |Ultra Wide | Telephoto, <br>Enter A17 Pro Game‑changing chip. Ground-breaking performance', '579000.00'),
('Apple iPhone 15 pro Max ', '8GB RAM 256GB ROM,\r\n48MP Main |Ultra Wide | Telephoto,\r\nEnter A17 Pro Game‑changing chip. Ground-breaking performance', '579900.00'),
('Google Pixel 7 Pro', '12GB RAM 512GB internal storage,OS Android 13', '340103.09'),
('oppo a74 5g', '6GB RAM|128GB', '61990.00'),
('oppo a76', '6GB RAM|128GB', '58990.00'),
('oppo a78', '8GB RAM|128GB', '71490.00'),
('oppo find x5 lite', '8GB RAM|256GB', '94990.00'),
('samsung galaxy a03s', '3GB RAM|32GB', '50990.00'),
('Samsung Galaxy F34', '8GB RAM | 128GB ROM | Expandable Upto 1 TB,13MP Front Camera\r\n', '32000.00'),
('Samsung Galaxy F54', '8GB RAM | 256GB ROM | Expandable Upto 1 TB,6000 mAh Battery', '139900.00'),
('samsung galaxy m22', '6GB RAM|128GB', '94990.00'),
('samsung galaxy z flip3', '5G 256GB', '354990.00'),
('Samsung Galaxy Z Fold 5', '12GB RAM | 256GB ROM,Foldable Dynamic AMOLED 2X, 120Hz', '529900.00'),
('tecno spark 7 pro', '4GB RAM|128GB', '33990.00'),
('xiaomi poco x3 pro', '6GB RAM|128GB', '99990.00'),
('xiaomi redmi 9a', '8GB RAM|128GB', '29990.00'),
('xiaomi redmi note 10s', '8GB RAM|128GB', '74990.00'),
('Xiaomi Redmi Note 12S', '108MP pro-grade main camera,90Hz FHD+ AMOLED DotDisplay', '78247.42'),
('zte blade a5 2020', '2GB RAM|32GB', '34990.00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`name`, `email`, `message`, `date`) VALUES
('Tharsik', 'tharsikan645@gmail.com', '                  dfdgdgf  ', '2023-12-17 20:54:14'),
('kumar', 'tharsikan645@gmail.com', '                    very good', '2023-12-17 21:03:41'),
('Tharsikan7', 'tharsikan7@gmail.com', '              good job      ', '2024-01-26 08:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(225) NOT NULL,
  `password` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `is_Admin` tinyint(1) DEFAULT NULL,
  `is_Sadmin` tinyint(1) DEFAULT NULL,
  `verify_token` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=no,1=yes',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `username`, `phone`, `is_Admin`, `is_Sadmin`, `verify_token`, `created_at`, `verify_status`) VALUES
('tharsikan2@gmail.com', '$2y$10$bezAeOPO0uC7TO6Mzn6kyu64p5Pp/.nEMcocajMRDdz4v.DGIcCzu', 'Tharsikan2', '0762354785', NULL, 1, '', '2023-11-28 15:23:29', 1),
('tharsikan3@gmail.com', '$2y$10$c6ZLOAa9EHVxCGWo6Z6c3OuzkWPolGTorUC9WnQqhSVzIsKfcAuZy', 'Tharsikan3', '0765454435', 1, NULL, '', '2023-11-28 15:23:29', 1),
('tharsikan4@gmail.com', '$2y$10$qV1gk.XVQ/q2sBMYoRkpreJSbHhV/Gq3QJXwii0Utka34Wd1OBBB.', 'Tharsikan4', '0768787878', 1, NULL, '', '2023-11-28 15:23:29', 1),
('tharsikan645@gmail.com', '$2y$10$59xU9NNTYCDOWaxCXYAz6OKj.RHhyKb1zABXDOWbxVKkgVwgqg.1a', 'Tharsikan645', '0766413644', NULL, NULL, '3e7b5310402bdbf26c01632b774a60b5', '2024-01-26 09:58:21', 1),
('tharsikan7@gmail.com', '$2y$10$ktLlCQTNQaQZ6SOGxCyQFeqZO.4.MaOkte1evAZThGYqmqCT6kYbi', 'Tharsikan7', '0765454435', NULL, NULL, 'a5ef064b360c2fc141a2da5edbef48b2', '2023-11-28 16:02:42', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`name`) REFERENCES `image` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
