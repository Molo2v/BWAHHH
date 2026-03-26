-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2026 at 07:13 PM
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
-- Database: `ecommerce_sj`
--

-- --------------------------------------------------------

--
-- Table structure for table `db2`
--

CREATE TABLE `db2` (
  `ID` int(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total_price` int(30) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `db2`
--

INSERT INTO `db2` (`ID`, `product_name`, `price`, `quantity`, `total_price`, `customer_name`, `email`, `customer_address`, `contact_no`) VALUES
(1, 'Leash', 255, 1, 255, '', '', '', 0),
(1, 'Leash', 255, 1, 255, '', '', '', 0),
(1, 'Leash', 255, 1, 255, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(1, 'ww', 1, 1, 1, '', '', '', 0),
(1, 'ww', 1, 1, 1, '', '', '', 0),
(1, 'ww', 1, 1, 1, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(0, '', 0, 0, 0, '', '', '', 0),
(3, 'Leash', 300, 1, 300, '123', '1213', '123', 123),
(3, 'Leash', 300, 2, 600, 'fs', 'fsa', 'dsa', 21),
(3, 'Leash', 300, 2, 600, 'fs', 'fsa', 'dsa', 21),
(3, 'Leash', 300, 2, 600, 'dsa', 'dsa', 'dsa', 23),
(4, 'Nike Cortez 2017', 5000, 2, 10000, 'Dominique Kyla Yhanelle San Juan', 'yhanellekyla@gmail.com', 'LAGRO, QC', 2147483647),
(5, 'Nike Flex Contact 3', 5000, 2, 10000, 'Dominique Kyla Yhanelle San Juan', 'yhanellekyla@gmail.com', 'LAGRO, QC', 2147483647),
(5, 'Nike Flex Contact 3', 5000, 1, 5000, 'Dominique Kyla Yhanelle San Juan', 'yhanellekyla@gmail.com', 'LAGRO, QC', 2147483647);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
