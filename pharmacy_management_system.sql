-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 05:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_name` varchar(40) DEFAULT NULL,
  `mobile_number` varchar(40) NOT NULL DEFAULT '',
  `customer_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `mobile_number`, `customer_address`) VALUES
('Ayon Dey', '01710329076', 'Hilalpur,Sylhet'),
('Md Kamran Ahmad', '01717929270', 'Amberkhana,Sylhet'),
('Shawon Dey', '01723957194', 'Hilalpur,Sylhet'),
('Sahin Ahmed', '01759938450', NULL),
('Azhar Hussain Masum', '01773654647', 'Kajol Shah,Sylhet'),
('Rubaiat Jahan', '01778941727', NULL),
('Asad', '0179254654', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(40) DEFAULT NULL,
  `mobile_number` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `medicine_name`, `mobile_number`, `quantity`, `date`, `username`) VALUES
(141, 'Napa', '01778941727', 10, '2019-01-09 15:32:18', NULL),
(142, 'Fexo 120', '01778941727', 10, '2019-01-09 15:32:18', NULL),
(143, 'Neotack 150 mg', '01710329076', 5, '2019-01-09 15:58:10', NULL),
(144, 'Napa', '01710329076', 5, '2019-01-09 15:58:11', NULL),
(145, 'Fexo 120', '01759938450', 6, '2019-01-09 16:22:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL DEFAULT '',
  `mobile_number` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(40) DEFAULT NULL,
  `manager_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_name`, `username`, `mobile_number`, `password`, `manager_address`) VALUES
('Ayon', 'Ayon_neub', '01710329076', 'admin', 'khulna'),
('Mh Dalwar', 'dalwar_neub', '01740181770', 'admin', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_name` varchar(40) NOT NULL DEFAULT '',
  `medicine_group` varchar(40) DEFAULT NULL,
  `medicine_cost` double DEFAULT NULL,
  `medicine_price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `supplier_name` varchar(40) DEFAULT NULL,
  `shelf_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_name`, `medicine_group`, `medicine_cost`, `medicine_price`, `quantity`, `expired_date`, `supplier_name`, `shelf_no`) VALUES
('Fexo 120', 'Fexofenadine Hydrochloride', 6.5, 8, 244, '2019-06-06', 'Square', 1),
('Methipred 8', 'Methylpredisolone', 9, 10, 537, '2019-06-06', 'Beximco', 2),
('Napa', 'iss', 33, 35, 743, '2019-04-03', 'Beximco', 3),
('Neotack 150 mg', 'Ranitidine', 2.5, 3, 22, '2019-06-06', 'Square', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `id` int(11) NOT NULL,
  `M_name` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_order`
--

CREATE TABLE `pharmacy_order` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(40) DEFAULT NULL,
  `supplier_name` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(1) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_order`
--

INSERT INTO `pharmacy_order` (`id`, `medicine_name`, `supplier_name`, `quantity`, `date`, `flag`, `username`) VALUES
(1, 'Methipred 8', 'Beximco', 2, '2018-12-23 03:04:41', 1, 'Ayon_neub'),
(2, 'Methipred 8', 'Beximco', 30, '2018-12-23 03:04:41', 1, 'Ayon_neub'),
(3, 'Methipred 8', 'Beximco', 30, '2018-12-23 03:06:40', 1, 'Ayon_neub'),
(4, 'Methipred 8', 'Beximco', 30, '2018-12-23 05:01:09', 1, 'Ayon_neub'),
(5, 'Methipred 8', 'Beximco', 30, '2019-01-09 16:08:45', 1, 'Ayon_neub'),
(6, 'Napa', 'Beximco', 2, '2019-01-09 16:08:45', 1, 'Ayon_neub');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_name` varchar(40) NOT NULL DEFAULT '',
  `mobile_number` varchar(40) NOT NULL DEFAULT '',
  `supplier_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_name`, `mobile_number`, `supplier_address`) VALUES
('Beximco', '0171*******', 'Dhaka,Bangladesh'),
('Square', '01723957195', 'Dhaka,Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`mobile_number`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);
ALTER TABLE `customer` ADD FULLTEXT KEY `mobile_number_2` (`mobile_number`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_name` (`medicine_name`),
  ADD KEY `mobile_number` (`mobile_number`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_name`),
  ADD KEY `supplier_name` (`supplier_name`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_order`
--
ALTER TABLE `pharmacy_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_name` (`medicine_name`),
  ADD KEY `supplier_name` (`supplier_name`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pharmacy_order`
--
ALTER TABLE `pharmacy_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`medicine_name`) REFERENCES `medicine` (`medicine_name`),
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`mobile_number`) REFERENCES `customer` (`mobile_number`),
  ADD CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`username`) REFERENCES `manager` (`username`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`supplier_name`) REFERENCES `supplier` (`supplier_name`);

--
-- Constraints for table `pharmacy_order`
--
ALTER TABLE `pharmacy_order`
  ADD CONSTRAINT `pharmacy_order_ibfk_1` FOREIGN KEY (`medicine_name`) REFERENCES `medicine` (`medicine_name`),
  ADD CONSTRAINT `pharmacy_order_ibfk_2` FOREIGN KEY (`supplier_name`) REFERENCES `supplier` (`supplier_name`),
  ADD CONSTRAINT `pharmacy_order_ibfk_3` FOREIGN KEY (`username`) REFERENCES `manager` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
