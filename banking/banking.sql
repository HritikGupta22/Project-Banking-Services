-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 04:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `sr` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `accno` varchar(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `blc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`sr`, `name`, `accno`, `email`, `blc`) VALUES
(1, 'Hritik', '23101', 'hritk13@gmail.com', 56100),
(2, 'sachin', '23102', 'sachin11@gmail.com', 15000),
(3, 'rohit', '23103', 'rht12@gmail.com', 12700),
(4, 'alok', '23104', 'alok31@gmail.com', 42026),
(5, 'aryan', '23105', 'arn48@gmail.com', 19269),
(6, 'virat', '23106', 'virat@gmail.com', 21586),
(7, 'anurag', '23107', 'arg99@gmail.com', 36000),
(8, 'dhoni', '23108', 'msd@gmail.com', 29290),
(9, 'aman', '23109', 'aman@gmail.com', 17731),
(10, 'vivek', '23110', 'vk@gmail.com', 26744);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sr` int(11) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `receiver` varchar(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sr`, `sender`, `receiver`, `amount`, `time`) VALUES
(1, '23102', '23101', 10, '2023-01-16 20:35:11'),
(2, '23101', '23109', 3000, '2023-01-16 20:37:17'),
(3, '23101', '23110', 400, '2023-01-16 20:37:49'),
(4, '23101', '23106', 1000, '2023-01-16 20:39:02'),
(5, '23104', '23110', 500, '2023-01-16 20:41:12'),
(6, '23101', '23105', 1000, '2023-01-16 20:41:35'),
(7, '23101', '23109', 33, '2023-01-16 20:42:01'),
(8, '23102', '23109', 28, '2023-01-16 20:42:24'),
(9, '23104', '23106', 2000, '2023-01-16 20:43:15'),
(10, '23101', '23107', 10000, '2023-01-16 20:43:47'),
(11, '23102', '23104', 700, '2023-01-16 20:44:09'),
(12, '23107', '23110', 644, '2023-01-16 20:44:44'),
(13, '23101', '23109', 400, '2023-01-16 20:48:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
