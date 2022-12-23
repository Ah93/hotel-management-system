-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 10:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `id_num` int(11) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `checkin` varchar(45) NOT NULL,
  `checkout` varchar(45) NOT NULL,
  `room_categ` varchar(45) NOT NULL,
  `room_num` int(11) NOT NULL,
  `price_per_night` float NOT NULL,
  `num_of_night` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `booking_status` varchar(45) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `event_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `room_id`, `name`, `id_num`, `phoneno`, `checkin`, `checkout`, `room_categ`, `room_num`, `price_per_night`, `num_of_night`, `total_price`, `booking_status`, `admin_name`, `event_date`) VALUES
(5, 113, 'Mo Eagle', 2147483633, 113952222, '2022-12-15', '2022-12-17', 'Small', 0, 10, 4, 40, 'checkedOut', 'admin', '2022-12-18 09:57:02'),
(6, 114, 'Omar Hassan', 2147483633, 114529577, '2022-12-16', '2022-12-17', 'Small', 0, 10, 4, 40, 'Cancelled', '', '0000-00-00 00:00:00'),
(7, 114, 'Omar seif', 114455225, 658998554, '2022-12-18', '2022-12-20', 'Small', 0, 10, 4, 40, 'checkedOut', 'admin', '2022-12-18 09:57:08'),
(8, 115, 'frfr', 2240, 1125, '2022-12-19', '2022-12-12', 'Small', 0, 10, 1, 10, 'checkedOut', 'admin', '2022-12-18 09:57:15'),
(9, 115, 'Omar seif', 114455225, 658998554, '2022-12-18', '2022-12-20', 'Small', 0, 10, 4, 40, 'checkedOut', 'admin', '2022-12-18 09:57:15'),
(10, 113, 'Ahmed omar', 552211445, 2147483647, '2022-12-19', '2022-12-20', 'Small', 25, 10, 3, 30, 'checkedIn', 'Abdullah Al Mamun', '2022-12-19 07:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `uid` int(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `upass` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `uemail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`uid`, `uname`, `upass`, `fullname`, `uemail`) VALUES
(1, 'mamun', '1234', 'Abdullah Al Mamun', 'mamunwitchbug@gmail.com'),
(3, 'jinat', 'jinat', 'Jinat Afroj', 'afrojjinat@gmail.com'),
(6, 'admin', '1234', 'adam sharif', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(200) NOT NULL,
  `room_cat` text NOT NULL,
  `room_number` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` text NOT NULL,
  `cus_id` int(11) NOT NULL,
  `phone` int(100) NOT NULL,
  `price_per_night` int(11) NOT NULL,
  `num_of_night` int(11) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_cat`, `room_number`, `checkin`, `checkout`, `name`, `cus_id`, `phone`, `price_per_night`, `num_of_night`, `book`) VALUES
(113, 'Small', 2, '2022-12-19', '2022-12-20', 'Ahmed omar', 552211445, 2147483647, 10, 3, 'true'),
(114, 'Small', 3, '0000-00-00', '0000-00-00', '', 0, 0, 10, 4, 'false'),
(115, 'Small', 1, '0000-00-00', '0000-00-00', '', 0, 0, 10, 4, 'false'),
(116, 'Small', 5, '0000-00-00', '0000-00-00', '', 0, 0, 10, 0, 'false'),
(117, 'Small', 25, '0000-00-00', '0000-00-00', '', 0, 0, 10, 0, 'false'),
(118, 'Small', 7, '0000-00-00', '0000-00-00', '', 0, 0, 10, 0, 'false'),
(119, 'Small', 9, '0000-00-00', '0000-00-00', '', 0, 0, 10, 0, 'false'),
(123, 'Large', 8, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(124, 'Large', 10, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(125, 'Large', 11, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(126, 'Large', 12, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(127, 'Large', 13, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(128, 'Large', 14, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(129, 'Large', 15, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(130, 'Large', 16, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(131, 'Large', 17, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(132, 'Large', 18, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(133, 'Large', 19, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(134, 'Large', 20, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false'),
(135, 'Large', 21, '0000-00-00', '0000-00-00', '', 0, 0, 15, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `roomname` text NOT NULL,
  `room_qnty` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `no_bed` int(11) NOT NULL,
  `bedtype` text NOT NULL,
  `facility` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`roomname`, `room_qnty`, `available`, `booked`, `no_bed`, `bedtype`, `facility`, `price`) VALUES
('Large', 13, 13, 0, 2, 'double', 'TV', 15),
('Small', 7, 7, 0, 1, 'single', 'TV', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`roomname`(100));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
