-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2026 at 03:27 PM
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`, `cdesc`) VALUES
(1, 'clothes', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `subject`, `message`) VALUES
(1, 'ali', '934352552', 'ali@gmail.com', 'update', 'add childern clothes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `created_at`) VALUES
(1, 1, 1498.00, '2026-07-05 09:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `pid`, `qty`, `price`) VALUES
(1, 1, 3, 1, 999),
(2, 1, 4, 1, 499);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` text NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `pqty` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdesc`, `pimage`, `pprice`, `pqty`, `cid`) VALUES
(2, 'women dress', 'A breezy, floor-length A-line maxi dress crafted from 100% premium cotton. It features a flattering V-neckline, puff sleeves, and a tiered skirt that offers graceful movement. The vibrant floral print and relaxed fit make it perfect for warm, casual days.', 'p3.png', 1999.00, 4, 1),
(3, 'Men dress', 'The pinnacle of formal elegance, requiring a tuxedo, bow tie, and patent leather shoes.', 'p8.png', 999.00, 4, 1),
(4, 'Men dress', 'As a product from the Elite Edition, this formal shirt boasts micro-fine stitching and lock-stitched buttons for a refined look. With ready-to-wear convenience and full sleeves for all-season use, it offers both slim fit and regular fit options. Note: Regular fit includes front pocket.  Micro-fine Stitching Lock-stitched Buttons Ready to Wear Full Sleeves Formal Wear For all Seasons Slim Fit & Regular Fit Front pocket only available in regular fit sizes', 'p10.png', 499.00, 4, 1),
(5, 'women dress abc', 'A stunning, form-fitting evening gown crafted from luxurious crepe silk. This sleeveless dress features a plunging neckline, intricate beadwork along the waistline, and a high side-slit that adds a touch of modern sophistication.', 'p5.png', 499.00, 4, 1),
(6, 'women dress', 'An elegant three-piece suit featuring a digitally printed lawn shirt, detailed with a delicate embroidered neckline and lace edgings. Paired with a breathable, lightweight chiffon dupatta and dyed cambric trousers, this outfit offers a comfortable, vibrant, and traditional look.', 'p6.png', 999.00, 3, 1),
(7, 'Men dress', 'As a product from the Elite Edition, this formal shirt boasts micro-fine stitching and lock-stitched buttons for a refined look. With ready-to-wear convenience and full sleeves for all-season use, it offers both slim fit and regular fit options. Note: Regular fit includes front pocket.  Micro-fine Stitching Lock-stitched Buttons Ready to Wear Full Sleeves Formal Wear For all Seasons Slim Fit & Regular Fit Front pocket only available in regular fit sizes', 'p11.png', 999.00, 2, 1),
(10, 'childern dress', 'Bright yellow kids’ outfit with a cute embroidered bear face on both the sweatshirt and pants. Made from soft, comfy fabric, perfect for everyday wear and play.\r\n\r\nFeatures:\r\n\r\nLong-sleeve sweatshirt with bear embroidery\r\n\r\nMatching pants with elastic waist\r\n\r\nSoft, breathable material\r\n\r\nFun and cheerful design', 'child.webp', 500.00, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(150) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `uname`, `uemail`, `uaddress`, `uphone`, `upass`) VALUES
(1, 'ali', 'ali@gmail.com', 'karachi', '03034545343', '$2y$10$sOdrvHO.7cMFJYzbSJPTD.oyKPC0ad/92frc1zo89Z2pmHtabmqzG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
