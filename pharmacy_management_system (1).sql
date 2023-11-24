-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 10:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharmacy_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_name` varchar(40) DEFAULT NULL,
  `mobile_number` varchar(40) NOT NULL DEFAULT '',
  `customer_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `mobile_number`, `customer_address`) VALUES
('Ayon DEy', '0171033', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
`id` int(11) NOT NULL,
  `medicine_name` varchar(40) DEFAULT NULL,
  `mobile_number` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `medicine_name`, `mobile_number`, `quantity`, `date`, `username`) VALUES
(159, 'Napa', '0171033', 20, '2019-07-29 08:10:10', 'Musa_NEUB'),
(160, 'Napa', '0171033', 40, '2019-07-29 08:10:10', 'Musa_NEUB');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
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
('Md Musa Ahmed', 'Musa_NEUB', '0171722', 'admin', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
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
('Napa', 'dfs', 23, 2, 162, '0000-00-00', 'Beximco', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE IF NOT EXISTS `medicine_list` (
`id` int(11) NOT NULL,
  `M_name` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list2`
--

CREATE TABLE IF NOT EXISTS `medicine_list2` (
`id` int(11) NOT NULL,
  `M_name` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_order`
--

CREATE TABLE IF NOT EXISTS `pharmacy_order` (
`id` int(11) NOT NULL,
  `medicine_name` varchar(40) DEFAULT NULL,
  `supplier_name` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(1) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_name` varchar(40) NOT NULL DEFAULT '',
  `mobile_number` varchar(40) NOT NULL DEFAULT '',
  `supplier_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_name`, `mobile_number`, `supplier_address`) VALUES
('Beximco', '01717929270', ''),
('Square', '01723957195', 'Dhaka,Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`mobile_number`), ADD UNIQUE KEY `mobile_number` (`mobile_number`), ADD FULLTEXT KEY `mobile_number_2` (`mobile_number`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
 ADD PRIMARY KEY (`id`), ADD KEY `medicine_name` (`medicine_name`), ADD KEY `mobile_number` (`mobile_number`), ADD KEY `username` (`username`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
 ADD PRIMARY KEY (`medicine_name`), ADD KEY `supplier_name` (`supplier_name`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_list2`
--
ALTER TABLE `medicine_list2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_order`
--
ALTER TABLE `pharmacy_order`
 ADD PRIMARY KEY (`id`), ADD KEY `medicine_name` (`medicine_name`), ADD KEY `supplier_name` (`supplier_name`), ADD KEY `username` (`username`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medicine_list2`
--
ALTER TABLE `medicine_list2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_order`
--
ALTER TABLE `pharmacy_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
