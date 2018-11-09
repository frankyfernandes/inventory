-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 03:44 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_manufacturer`
--

CREATE TABLE `car_manufacturer` (
  `id` int(11) NOT NULL,
  `manufacturer` varchar(250) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_manufacturer`
--

INSERT INTO `car_manufacturer` (`id`, `manufacturer`, `addedon`) VALUES
(1, 'Volvo', '2018-11-06 10:38:57'),
(2, 'TVS', '2018-11-06 10:39:03'),
(3, 'SUZUKI', '2018-11-06 10:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(250) NOT NULL,
  `model_quantity` int(11) NOT NULL,
  `model_color` varchar(250) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `manufacturer_id`, `model_name`, `model_quantity`, `model_color`, `date_modified`) VALUES
(1, 3, 'Baleno', 9, 'White', '2018-11-07 17:57:07'),
(3, 3, 'Baleno', 4, 'Blue', '2018-11-07 18:01:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_manufacturer`
--
ALTER TABLE `car_manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manufacturer` (`manufacturer`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_manufacturer`
--
ALTER TABLE `car_manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_model`
--
ALTER TABLE `car_model`
  ADD CONSTRAINT `fk_manufacturer_id` FOREIGN KEY (`manufacturer_id`) REFERENCES `car_manufacturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
