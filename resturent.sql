-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 05:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `quantity`, `image`, `created_at`) VALUES
(1, 'chiken fried rice', '700.00', 2, 'rice.png', '2024-04-11 12:45:19'),
(2, 'chicken kottu', '750.00', 1, 'stock-photo-sri-lankan-spicy-chicken-kottu-or-koththu-is-a-dish-made-with-diced-roti-stir-fried-and-mix-with-2249794983-removebg-preview.png', '2024-04-11 14:18:52'),
(3, 'cheese  kottu', '790.00', 1, 'image5-removebg-preview.png', '2024-04-11 14:18:56'),
(4, 'egg fried rice', '500.00', 1, 'egg-fried-rice-70b2cce-removebg-preview.png', '2024-04-11 14:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`) VALUES
(46, '0779893328', 'gayak@gmail', '0785698741', '13466', 'hiiiii', '2024-04-11 13:26:04'),
(47, 'is is', 'isurusumedha872@gmail.com', '0156584556', 'help', 'hhelp me', '2024-04-11 14:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `name` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `district` text NOT NULL,
  `total_product` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`name`, `email`, `method`, `address`, `district`, `total_product`, `total_price`, `id`, `number`) VALUES
(779893328, 'isuruisuru07648@gmail.com', 'cash on delivery', 'gfgrgfg', 'ghhkf', 'kottu (1) ', '970', 1, 0),
(0, 'kjs@gmail.com', 'cash on delivery', 'gfgrgfg', 'ghhkf', 'noodles (1) , kottu (1) ', '1320', 2, 2147483647),
(0, 'isuruisuru07648@gmail.com', 'cash on delivery', 'gfgrgfg', 'ghhkf', 'noodles (1) ', '350', 3, 0),
(0, 'isurusumedha872@gmail.com', 'cash on delivery', '21/A bodhimaluwa, parakaduwa', 'rathnapura', 'chiken fried rice (2) , chicken kottu (1) , cheese', '2041', 6, 713560794);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` decimal(7,0) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(12, 'chicken biriyani', '650', 0x696d6167652d72656d6f766562672d70726576696577202835292e706e67),
(13, 'chiken fried rice', '700', 0x726963652e706e67),
(14, 'chicken kottu', '750', 0x73746f636b2d70686f746f2d7372692d6c616e6b616e2d73706963792d636869636b656e2d6b6f7474752d6f722d6b6f74687468752d69732d612d646973682d6d6164652d776974682d64696365642d726f74692d737469722d66726965642d616e642d6d69782d776974682d323234393739343938332d72656d6f766562672d707265766965772e706e67),
(15, 'cheese  kottu', '790', 0x696d616765352d72656d6f766562672d707265766965772e706e67),
(16, 'egg fried rice', '500', 0x6567672d66726965642d726963652d373062326363652d72656d6f766562672d707265766965772e706e67),
(17, 'sea food rice', '900', 0x313337313631353633383931352d72656d6f766562672d707265766965772e706e67),
(18, 'spicy noodles', '490', 0x696d616765732d72656d6f766562672d70726576696577202831292e706e67),
(19, 'spicy ramen ', '550', 0x53706963792d52616d656e2d53512d72656d6f766562672d707265766965772e706e67),
(20, 'egg biriyani', '450', 0x696d616765732d72656d6f766562672d70726576696577202832292e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
