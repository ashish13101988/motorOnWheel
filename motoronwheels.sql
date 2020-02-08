-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 07:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motoronwheels`
--

-- --------------------------------------------------------

--
-- Table structure for table `adimg`
--

CREATE TABLE `adimg` (
  `imgId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adimg`
--

INSERT INTO `adimg` (`imgId`, `user_id`, `ads_id`, `imgname`, `created_at`) VALUES
(2634, 9, 49, '5e37ce1940fb7.jpg', '2020-02-03 07:39:05'),
(2635, 9, 50, '5e37d5197e29f.jpg', '2020-02-03 08:08:57'),
(2636, 9, 50, '5e37d5197ea0b.jpg', '2020-02-03 08:08:57'),
(2637, 10, 51, '5e37f370063e7.jpg', '2020-02-03 10:18:24'),
(2638, 10, 51, '5e37f37006b4b.jpg', '2020-02-03 10:18:24'),
(2639, 9, 52, '5e3d84a930d50.jpg', '2020-02-07 15:39:21'),
(2640, 9, 52, '5e3d84a93144d.jpg', '2020-02-07 15:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `cartype` varchar(50) NOT NULL,
  `carname` varchar(100) NOT NULL,
  `carmodel` varchar(50) DEFAULT NULL,
  `bodytype` varchar(50) DEFAULT NULL,
  `odometer` varchar(50) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `engine` varchar(50) DEFAULT NULL,
  `price` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `cylinder` varchar(50) DEFAULT NULL,
  `engineDes` varchar(255) DEFAULT NULL,
  `fuelEconomy` varchar(50) DEFAULT NULL,
  `turbo` varchar(50) DEFAULT NULL,
  `power` varchar(50) DEFAULT NULL,
  `tow` varchar(50) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `seats` varchar(50) DEFAULT NULL,
  `doors` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `status`, `cartype`, `carname`, `carmodel`, `bodytype`, `odometer`, `transmission`, `engine`, `price`, `year`, `cylinder`, `engineDes`, `fuelEconomy`, `turbo`, `power`, `tow`, `colour`, `seats`, `doors`, `created_at`) VALUES
(49, 9, 'aprove', 'used', 'BMW', 'M3', 'Sedan', '10000', 'Manual', NULL, '9230', '2016', '8', 'petrol', '8', NULL, NULL, NULL, 'teal', '15', '2', '2020-02-03 18:42:03'),
(50, 9, 'aprove', 'new', 'BMW', 'M2', 'Coupe', '8522', 'manual', NULL, '9999', '2018', '3', 'Turbo 3.2 Diesel', '11', NULL, NULL, NULL, 'red', '2', '2', '2020-02-04 19:41:54'),
(51, 10, 'aprove', 'new', 'Mercedes-Benz', 'SLS-Class', 'Convertible', '1200', 'automatic', NULL, '90000', '2020', '6', 'Turbo 2.2 Petrol', '8', NULL, NULL, NULL, 'red', '2', '2', '2020-02-03 13:06:39'),
(52, 9, 'pending', 'used', 'Hyundai', 'Accent', 'Sedan', '12', 'automatic', NULL, '9999', '2018', '4', 'turbo petrol', '12', NULL, NULL, NULL, 'indigo', '4', '4', '2020-02-07 15:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `bodytype`
--

CREATE TABLE `bodytype` (
  `id` int(11) NOT NULL,
  `bodytype` varchar(50) NOT NULL,
  `bodyimg` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bodytype`
--

INSERT INTO `bodytype` (`id`, `bodytype`, `bodyimg`, `created_at`) VALUES
(3, 'convertible', 'convertible.png', '2020-02-08 14:20:04'),
(4, 'sedan', 'sedan.png', '2020-02-08 14:25:18'),
(5, 'ute', 'ute.png', '2020-02-08 14:35:30'),
(8, 'hatch', 'hatch.png', '2020-02-08 14:52:49'),
(9, 'bus', 'bus.png', '2020-02-08 14:58:04'),
(10, 'van', 'van.png', '2020-02-08 15:00:25'),
(11, 'people mover', 'people mover.png', '2020-02-08 15:01:57'),
(12, 'wagon', 'wagon.png', '2020-02-08 15:06:48'),
(13, 'light truck', 'light truck.png', '2020-02-08 15:07:42'),
(14, 'coupe', 'coupe.png', '2020-02-08 15:09:32'),
(15, 'suv', 'suv.png', '2020-02-08 15:18:17'),
(16, 'cab chassis', 'cab chassis.png', '2020-02-08 15:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `carbrands`
--

CREATE TABLE `carbrands` (
  `brand_id` int(11) NOT NULL,
  `brandname` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carbrands`
--

INSERT INTO `carbrands` (`brand_id`, `brandname`, `logo`, `created_at`) VALUES
(3, ' audi', ' audi.png', '2020-02-08 11:16:05'),
(4, 'Mercedes-Benz', 'mercedes-benz.png', '2020-02-08 11:18:49'),
(5, 'Maserati', 'maserati.png', '2020-02-08 11:20:24'),
(6, 'ferrari', 'ferrari.png', '2020-02-08 11:23:49'),
(7, 'BMW', 'bmw.png', '2020-02-08 11:25:54'),
(8, 'ford', 'ford.png', '2020-02-08 11:26:57'),
(11, 'renault', 'renault.png', '2020-02-08 18:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `carname` varchar(50) NOT NULL,
  `carmodel` varchar(50) NOT NULL,
  `bodytype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carname`, `carmodel`, `bodytype`) VALUES
(2, 'audi', 'A1', 'Hatch'),
(3, 'audi', 'A2', 'Hatch'),
(4, 'audi', 'A3', 'Hatch'),
(5, 'audi', 'A4', 'Sedan'),
(6, 'audi', 'A5', 'Hatch'),
(7, 'BMW', 'M2', 'Coupe'),
(8, 'BMW', 'M3', 'Sedan'),
(9, 'BMW', 'M4', 'Convertible'),
(10, 'BMW', 'M5', 'Sedan'),
(11, 'ford', 'bronco', 'Cab Chassis'),
(12, 'ford', 'capri', 'Coupe'),
(13, 'ford', 'endura', 'SUV'),
(14, 'Mercedes-Benz', 'R-Class', 'Sedan'),
(15, 'Mercedes-Benz', 'S-Class', 'Sedan'),
(16, 'Mercedes-Benz', 'SL-Class', 'Convertible'),
(17, 'Mercedes-Benz', 'SLS-Class', 'Convertible'),
(18, 'Mercedes-Benz', 'V-Class', 'Minivan'),
(19, 'Nisan', 'Bluebird', 'Compact'),
(20, 'Nisan', 'Cima', 'Sedan'),
(21, 'Nisan', 'Cube', 'Hatch'),
(22, 'Nisan', 'Dualis', 'SUV'),
(23, 'ford', 'F100', 'Cab Chassis'),
(24, 'Hyundai', 'Accent', 'Sedan'),
(25, 'Hyundai', 'Accent', 'hatch'),
(26, 'kia', 'Carnival', 'people mover'),
(27, 'kia', 'Rio', 'hatch'),
(28, 'kia', 'Rio', 'sedan');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enqId` int(11) NOT NULL,
  `adId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(9, 'ashish kumar', 'ashish13101988@gmail.com', '$2y$10$N0lM4rcaoDCs0ciE1e.3Wuaq0pVrd0dLJNTQssxEDmUCB5rapqD0u', ''),
(10, 'praveen kumar', 'praveen.143r@gmail.com', '$2y$10$86811iBRFx2Q4FItbb2GvOE8tTFatXX9jdnaEAhfMVCeKhDiksBmy', ''),
(11, 'john deo', 'john@demo.com', '$2y$10$i39FuTPQyajHYDPdHY1GyeIljVhRYxOC59qhYgacUlg3iJH8HBPLK', ''),
(12, 'janny deo', 'janny@demomail.com', '$2y$10$BDZKEG2/4DUlrIbwtpn1Be1FIVaW9WABhoUgF2MIjnIPzbHaueBzi', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `ads_id`, `created_at`) VALUES
(23, 9, 50, '2020-02-03 17:55:22'),
(24, 9, 49, '2020-02-03 17:55:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adimg`
--
ALTER TABLE `adimg`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bodytype`
--
ALTER TABLE `bodytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carbrands`
--
ALTER TABLE `carbrands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enqId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adimg`
--
ALTER TABLE `adimg`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2641;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bodytype`
--
ALTER TABLE `bodytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `carbrands`
--
ALTER TABLE `carbrands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enqId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
