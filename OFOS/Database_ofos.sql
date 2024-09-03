-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 06:03 PM
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
-- Database: `ofos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `qty` int(20) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `rest_id`, `food_name`, `price`, `image`, `qty`, `total_price`) VALUES
(26, 17, 0, 'Pizza', 350, 'pizza.jpeg', 1, 350),
(77, 16, 17, 'Ghungi', 100, 'ghungi.jpg', 1, 100),
(78, 16, 10, 'chowmin', 80, 'veg-chowmin.jpg', 4, 80),
(79, 16, 10, 'chowmin', 80, 'veg-chowmin.jpg', 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `D_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `method` varchar(100) NOT NULL,
  `delivered` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `phone`, `email`, `shipping_address`, `total_price`, `method`, `delivered`) VALUES
(38, 16, 'Rajesh Ojha', 'Dhangadhi', '0982582222', 'rajesh12@gmail.com', 'Lalpur,kailali', 1125, 'cod', '0'),
(39, 41, 'yogesh', 'dhangadhi', '0210203201', 'yogesh12@gmail.com', 'hasanpur near galaxy collegeg', 540, 'cod', '0'),
(40, 42, 'Radha', 'chauraha', '3535524252', 'radha123@gmail.com', 'Campus road, Dhangadhi', 300, 'cod', '1'),
(41, 16, 'Arjun chy', 'kailali dhangadhi', '3223523232', 'arjun12@gmail.com', 'Buspark kailali', 380, 'cod', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `res_id`, `food_name`, `price`, `qty`) VALUES
(45, 38, 3, 'Biryani', '405', 1),
(46, 38, 14, 'Chicken _Lolipop', '250', 1),
(47, 38, 10, 'Jhol momo', '220', 1),
(48, 38, 3, 'Momo', '250', 1),
(49, 39, 15, 'Cappuccino', '180', 1),
(50, 39, 14, 'Chicken _manchaurian', '280', 1),
(51, 39, 15, 'Veg-chowmin', '80', 1),
(52, 40, 10, 'chowmin', '80', 1),
(53, 40, 10, 'Jhol momo', '220', 1),
(54, 41, 15, 'Cappuccino', '180', 1),
(55, 41, 11, 'Rice', '120', 1),
(56, 41, 15, 'Veg-chowmin', '80', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `b_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `c_id` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

CREATE TABLE `tbl_restaurants` (
  `R_ID` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`R_ID`, `o_id`, `name`, `email`, `contact`, `address`) VALUES
(10, 28, 'NAST Cafeteria', 'sunil@nast.edu.np', 98989989, 'dhangdhi'),
(11, 37, 'Dhangadhi cafe', 'tek12@gmail.com', 9828582825, 'Uttarbehadi,4 dhangadhi'),
(14, 22, 'Diamond restaurant', 'diamondrest12@gmail.com', 9828582825, 'Dhangadhi-5,Hasanpur'),
(15, 40, 'Farwest resto', 'farwestresto12@gmail.com', 986525325, 'Campus road, Dhangadhi'),
(16, 22, 'Gothalo cafe', 'gothalo123@gmail.com', 9825325222, 'Chatakpur-2,Dhangadhi,Kailali'),
(17, 40, 'Tharu home stay', 'tharu123@gmail.com', 9836522222, 'Campus road , Dhangadhi,Kailali'),
(18, 37, 'Vintage home', 'vintage123@gmail.com', 98282525, 'Taranagar-4,Dhangadhi,Kailali'),
(19, 37, 'Chaulani Resto', 'chaulani12@gmail.com', 982542365, 'LN Chok ,Dhangadhi,Kailali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `code`, `name`) VALUES
(1, 'ADM', 'Administrator'),
(2, 'OW', 'Owner'),
(3, 'CUST', 'Customer'),
(4, 'DEV', 'Delivery Boy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `password`, `role`) VALUES
(15, 'Yogesh', 'shahu', 'yogesh12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Delivery'),
(16, 'padam', 'dhami', 'padam12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(17, 'Puskar', 'Thapa', 'puskar', 0, '', '202cb962ac59075b964b07152d234b70', 'Admin'),
(22, 'ram', 'dhakal', 'ram12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Owner'),
(24, 'hari', 'ram', 'hari12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Delivery'),
(27, 'sunil', 'bist', 'sunil@nast.edu.np', 0, '', '1a1dc91c907325c69271ddf0c944bc72', 'Customer'),
(28, 'sunil2', 'bist', 'sunil@gmail.com', 0, '', '202cb962ac59075b964b07152d234b70', 'Owner'),
(31, 'arjun', 'khadka', 'arjun12@', 0, '', '81dc9bdb52d04dc20036dbd8313ed055', 'Customer'),
(32, 'deepak', 'bist', 'deepak12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(34, 'biku', 'kumar', 'biku12@', 0, '', '43cca4b3de2097b9558efefd0ecc3588', 'Customer'),
(35, 'chatur', 'das', 'chatur12@', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(37, 'Tek', 'Bist', 'tek123@', 0, '', '202cb962ac59075b964b07152d234b70', 'Owner'),
(38, 'dipen', 'bist', 'dipen123@', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(39, 'sanggam', 'chy', 'sangam@gmail.com', 0, '', '81dc9bdb52d04dc20036dbd8313ed055', 'Customer'),
(40, 'saroj', 'chy', 'saroj11@gmail', 0, '', '202cb962ac59075b964b07152d234b70', 'Owner'),
(41, 'Rajesh', 'Ojha', 'Rajesh12@gmail', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(42, 'paras', 'thapa', 'paras12@gmail', 0, '', '202cb962ac59075b964b07152d234b70', 'Customer'),
(43, 'Rita', 'Khadka', 'rita12@gmail.com', 2147483647, 'Dhangadhi-5,Hasanpur', '202cb962ac59075b964b07152d234b70', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `view_foods`
--

CREATE TABLE `view_foods` (
  `F_ID` int(11) NOT NULL,
  `R_ID` int(11) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view_foods`
--

INSERT INTO `view_foods` (`F_ID`, `R_ID`, `foodname`, `price`, `description`, `image`) VALUES
(29, 3, 'Momo', 250, 'chicken steam momo', 'steam-momo.jpeg'),
(30, 3, 'Biryani', 405, 'chicken biryani', 'biryani.jpeg'),
(31, 10, 'chowmin', 80, 'chowmin', 'veg-chowmin.jpg'),
(36, 10, 'Jhol momo', 220, 'famous  jhol momo', 'jhol momo.jpeg'),
(37, 11, 'Steam momo', 320, 'famous momo in our cafe', 'steam-momo.jpeg'),
(38, 11, 'Rice', 120, 'best rice', 'rice.jpg'),
(39, 15, 'Cappuccino', 180, 'best cappuccino', 'cappuccino.jpeg'),
(40, 15, 'Veg-chowmin', 80, 'taste our resto chowmin', 'veg-chowmin.jpg'),
(41, 14, 'Chicken _manchaurian', 280, 'famous dish in our rest', 'chicken-manchaurian.jpg'),
(42, 17, 'Ghungi', 100, 'taste our local item', 'ghungi.jpg'),
(43, 18, 'Cappuccino', 250, 'Taste the our cappuccino', 'cappuccino.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_foods`
--
ALTER TABLE `view_foods`
  ADD PRIMARY KEY (`F_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `view_foods`
--
ALTER TABLE `view_foods`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD CONSTRAINT `tbl_restaurants_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `tbl_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
