-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 02:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chirag`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
                            `id` int(11) NOT NULL,
                            `booking_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
                            `booking_name` varchar(500) NOT NULL,
                            `booking_totalamount` float NOT NULL,
                            `booking_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_timestamp`, `booking_name`, `booking_totalamount`, `booking_image`) VALUES
(1, '2021-07-29 10:39:21', 'Anshul', 600, 'profile1.jpg'),
(2, '2021-07-29 10:39:25', 'Chirag', 8000, 'profile2.jpg'),
(3, '2021-07-29 10:39:21', 'Akash', 600000, 'profile3.jpg'),
(4, '2021-07-29 10:39:25', 'Sachin', 85720, 'profile4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking_log`
--

CREATE TABLE `booking_log` (
                               `log_Id` int(11) NOT NULL,
                               `booking_id` int(11) DEFAULT NULL,
                               `log_name` varchar(500) NOT NULL,
                               `log_amount` float NOT NULL,
                               `log_status` varchar(50) NOT NULL,
                               `log_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_log`
--

INSERT INTO `booking_log` (`log_Id`, `booking_id`, `log_name`, `log_amount`, `log_status`, `log_timestamp`) VALUES
(0, 1, 'Advance', 50, 'received', '2021-07-29 11:35:12'),
(1, 2, 'Advance', 500, 'due', '2021-07-29 11:35:12'),
(3, 1, 'Main Amount ', 550, 'due', '2021-07-29 11:59:33'),
(5, 2, 'Main Amount ', 7500, 'due', '2021-07-29 11:35:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_log`
--
ALTER TABLE `booking_log`
    ADD PRIMARY KEY (`log_Id`),
    ADD KEY `booking_log_bookings_id_fk` (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_log`
--
ALTER TABLE `booking_log`
    ADD CONSTRAINT `booking_log_bookings_id_fk` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
