-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercom`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUser` (IN `id` INT(11))  BEGIN
    DELETE FROM info WHERE id=id;

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `whereUser` (IN `id` INT(11))  BEGIN
    SELECT * FROM info WHERE id=id;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(4, 'Admin', 'root', '1', '2021-03-10 15:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `code` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `name`, `entityTypeId`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(6, 'material', 'product', 'material', 'text', 'varchar', 5, ''),
(7, 'Product Type', 'product', 'productType', 'text', 'varchar', 8, ''),
(9, 'fg', 'product', 'efgf', 'text', 'varchar', 55, NULL),
(10, 'cOLOR', 'category', 'ER', 'text', 'varchar', 34, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(2, 'dff;', 0, 0),
(3, 'ass', 0, 0),
(4, 'dfg', 6, 55);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdDate` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` decimal(10,2) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customerId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `createdDate`) VALUES
(1, 0, '0.00', '0', 0, 0, '0.00', '2021-04-09 09:46:54'),
(3, 0, '0.00', '0', 0, 0, '0.00', '2021-04-09 09:49:49'),
(6, 0, '480.00', '0', 0, 0, '0.00', '2021-04-09 09:50:52'),
(7, 0, '480.00', '0', 0, 0, '0.00', '2021-04-09 09:52:24'),
(10, 0, '5.00', '0', 0, 0, '0.00', '2021-04-09 10:10:19'),
(11, 0, '5.00', '0', 0, 0, '0.00', '2021-04-09 10:14:18'),
(14, 0, '5.00', '0', 0, 0, '0.00', '2021-04-09 10:15:08'),
(15, 16, '0.00', '0', 0, 0, '0.00', '2021-04-09 10:15:10'),
(17, 0, '480.00', '0', 0, 0, '0.00', '2021-04-09 10:16:04'),
(18, 0, '0.00', '0', 0, 0, '0.00', '2021-04-09 10:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `sameAsBilling` tinyint(4) DEFAULT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `addressId`, `addressType`, `city`, `state`, `country`, `zipcode`, `sameAsBilling`, `address`) VALUES
(1, 1, 0, '', '', '', '', '', NULL, ''),
(2, 1, 0, '', '', '', '', '', NULL, ''),
(3, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(4, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(5, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(6, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(7, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(8, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(9, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(10, 2, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(11, 3, 0, '', '', '', '', '', NULL, ''),
(12, 3, 0, '', '', '', '', '', NULL, ''),
(13, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(14, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(15, 5, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(16, 5, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(17, 5, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(18, 5, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(19, 6, 0, '', '', '', '', '', NULL, ''),
(20, 6, 0, '', '', '', '', '', NULL, ''),
(21, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(22, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(23, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(24, 4, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(25, 7, 0, '', '', '', '', '', NULL, ''),
(26, 7, 0, '', '', '', '', '', NULL, ''),
(27, 8, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(28, 8, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(29, 8, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(30, 8, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(31, 8, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(32, 8, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(33, 9, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(34, 9, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(35, 9, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(36, 9, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(37, 10, 0, '', '', '', '', '', NULL, ''),
(38, 10, 0, '', '', '', '', '', NULL, ''),
(39, 8, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(40, 8, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(41, 8, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(42, 8, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(43, 11, 0, '', '', '', '', '', NULL, ''),
(44, 11, 0, '', '', '', '', '', NULL, ''),
(45, 12, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(46, 12, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(47, 13, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(48, 13, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(49, 13, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(50, 13, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(51, 14, 0, '', '', '', '', '', NULL, ''),
(52, 14, 0, '', '', '', '', '', NULL, ''),
(53, 15, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', NULL, 'Ahmadabad'),
(54, 15, 0, '', 'Ahmadabad', 'Gujarat', 'India', '258995', NULL, 'Ahmadabad'),
(55, 16, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(56, 16, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(57, 16, 0, '', 'Surat', 'Gujarat', 'India', '5585222', NULL, 'surat'),
(58, 16, 0, '', 'Surat', 'Gujarat', 'India', '555688', NULL, 'Surat'),
(59, 17, 0, '', '', '', '', '', NULL, ''),
(60, 17, 0, '', '', '', '', '', NULL, ''),
(61, 18, 0, '', '', '', '', '', NULL, ''),
(62, 18, 0, '', '', '', '', '', NULL, ''),
(63, 12, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(64, 12, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot'),
(65, 12, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', NULL, '        M Road,Rajkot'),
(66, 12, 0, '', 'Rajkot', 'GUjarat', 'India', '336645', NULL, 'M Road ,Rajkot');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL,
  `basePrice` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartItemId`, `cartId`, `productId`, `quantity`, `price`, `discount`, `createdDate`, `basePrice`) VALUES
(1, 2, 233, 1, '15.00', '10.00', '2021-04-09 15:18:02', '15'),
(2, 5, 233, 1, '15.00', '10.00', '2021-04-09 15:20:02', '15'),
(3, 6, 237, 1, '500.00', '20.00', '2021-04-09 15:20:52', '500'),
(4, 4, 237, 1, '500.00', '20.00', '2021-04-09 15:21:01', '500'),
(5, 7, 237, 1, '500.00', '20.00', '2021-04-09 15:22:25', '500'),
(6, 8, 237, 3, '500.00', '20.00', '2021-04-09 15:22:41', '500'),
(7, 9, 237, 1, '500.00', '20.00', '2021-04-09 15:36:38', '500'),
(8, 10, 233, 1, '15.00', '10.00', '2021-04-09 15:40:19', '15'),
(9, 11, 233, 1, '15.00', '10.00', '2021-04-09 15:44:19', '15'),
(10, 13, 233, 1, '15.00', '10.00', '2021-04-09 15:44:30', '15'),
(11, 14, 233, 1, '15.00', '10.00', '2021-04-09 15:45:08', '15'),
(12, 16, 233, 1, '15.00', '10.00', '2021-04-09 15:45:16', '15'),
(13, 17, 237, 1, '500.00', '20.00', '2021-04-09 15:46:04', '500'),
(14, 12, 233, 1, '15.00', '10.00', '2021-04-09 15:46:12', '15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(50) NOT NULL,
  `parentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pathId` varchar(11) NOT NULL,
  `feature` int(11) NOT NULL,
  `rehjr` varchar(255) DEFAULT NULL,
  `ER` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `description`, `status`, `pathId`, `feature`, `rehjr`, `ER`) VALUES
(1, 0, 'Bedroom', 'Good room', '1', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(3, 'first', '12', 'CMspage', 1, '2021-03-22 21:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `createdDate`) VALUES
(30, 10, 'ddcd', 'dd', '55', '2021-04-06 08:30:11'),
(34, 10, 'ghgh', 'dffg', '8585', '2021-04-06 08:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `createdDate`) VALUES
(10, 'Hv', '2021-04-05 17:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `pathId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstname`, `lastname`, `email`, `password`, `status`, `createdDate`, `updatedDate`, `pathId`) VALUES
(15, 4, 'Hemang', 'Dodiya', 'dodiyahemang48@gmail.com', '123456', '1', '2021-03-10 05:02:41', '2021-03-30 16:45:48', ''),
(16, 0, 'Mayur1', 'Chavda', 'chavdamayur@gmail.com', '123456789', '1', '2021-03-11 20:38:03', '2021-03-30 14:30:22', ''),
(28, 4, 'Goyani', 'Brijesh', 'goyanibrijesh@gmail.com', '123456', '1', '2021-03-30 17:45:23', '2021-03-30 17:45:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `addressType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(1, 15, '        M Road,Rajkot', 'Rajkot', 'Gujarat', '366699', 'India', 'Billing'),
(2, 15, 'M Road ,Rajkot', 'Rajkot', 'GUjarat', '336645', 'India', 'Shipping'),
(3, 16, 'Ahmadabad', 'Ahmadabad', 'Gujarat', '368755', 'India', 'Billing'),
(4, 16, 'Ahmadabad', 'Ahmadabad', 'Gujarat', '258995', 'India', 'Shipping'),
(5, 28, 'surat', 'Surat', 'Gujarat', '5585222', 'India', 'Billing'),
(6, 28, 'Surat', 'Surat', 'Gujarat', '555688', 'India', 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(3, 'retailer', '1', '2021-03-30 14:59:44'),
(4, 'wholesaler', '1', '2021-03-30 15:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `customerId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `createdDate`) VALUES
(1, 16, '5.00', '0', 8, 6, '50.00', '2021-04-09 15:17:17'),
(2, 15, '5.00', '0', 0, 0, '0.00', '2021-04-09 15:19:58'),
(3, 16, '480.00', '0', 0, 0, '0.00', '2021-04-09 15:19:53'),
(4, 15, '480.00', '0', 0, 0, '0.00', '2021-04-09 15:36:32'),
(5, 28, '1480.00', '0', 0, 0, '0.00', '2021-04-09 15:22:38'),
(6, 16, '5.00', '0', 0, 0, '0.00', '2021-04-09 15:44:28'),
(7, 28, '5.00', '0', 0, 0, '0.00', '2021-04-09 15:45:13'),
(8, 15, '5.00', '0', 0, 0, '0.00', '2021-04-09 15:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `orderAddressId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `sameAsBilling` tinyint(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`orderAddressId`, `OrderId`, `addressId`, `addressType`, `city`, `state`, `country`, `zipcode`, `sameAsBilling`, `address`, `customerId`) VALUES
(1, 0, 0, '', 'Surat', 'Gujarat', 'India', '5585222', 0, 'surat', 28),
(2, 0, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', 0, '        M Road,Rajkot', 15),
(3, 0, 0, '', 'Surat', 'Gujarat', 'India', '5585222', 0, 'surat', 28),
(4, 0, 0, '', 'Ahmadabad', 'Gujarat', 'India', '368755', 0, 'Ahmadabad', 16),
(5, 0, 0, '', 'Surat', 'Gujarat', 'India', '5585222', 0, 'surat', 28),
(6, 0, 0, '', 'Rajkot', 'Gujarat', 'India', '366699', 0, '        M Road,Rajkot', 15);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL,
  `basePrice` decimal(50,0) NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderItemId`, `orderId`, `productId`, `quantity`, `price`, `discount`, `createdDate`, `basePrice`, `customerId`) VALUES
(1, 0, 237, 1, '500.00', '20.00', '2021-04-09 15:22:41', '500', 28),
(2, 0, 237, 1, '500.00', '20.00', '2021-04-09 15:36:38', '500', 15),
(3, 0, 237, 3, '500.00', '20.00', '2021-04-09 15:22:41', '500', 28),
(4, 0, 233, 1, '15.00', '10.00', '2021-04-09 15:44:30', '15', 16),
(5, 0, 233, 1, '15.00', '10.00', '2021-04-09 15:45:16', '15', 28),
(6, 0, 233, 1, '15.00', '10.00', '2021-04-09 15:46:12', '15', 15);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(7, 'card Payment', '12jk5hg', 'phone payment using Debit card', 1, '2021-03-10 09:35:54'),
(8, 'COD', 'dfg4df', 'Cash on Delivery', 1, '2021-04-02 13:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `td` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `td`) VALUES
(233, '1', 'Mobile', 15, '10', 5, 'Good Qaulity', '0', '2021-03-10 09:22:47', '2021-03-10 09:22:47', NULL),
(237, '1', 'Book', 500, '20', 2, 'Book with Good knowledge', '0', '2021-04-01 19:12:17', '2021-04-01 19:12:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `imageId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallery` tinyint(1) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`imageId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`, `remove`) VALUES
(2, 'download.png', '', 0, 0, 0, 0, 233, 0),
(7, 'IBALauncher (1).exe', '', 0, 0, 0, 0, 233, 0),
(8, '', '', 0, 0, 0, 0, 233, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `customerGroupId` int(11) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(3, 233, NULL, '200'),
(4, 233, NULL, '200'),
(11, NULL, NULL, '200'),
(13, NULL, NULL, '200'),
(15, NULL, NULL, '0'),
(17, NULL, NULL, '500');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(5, 'Express Delivery -1 day', 'H3RF56', '500', 'fast delivery', '1', '2021-03-10 09:37:04'),
(6, 'Platinum delivery- 3 day', 'dfd2d', '50', 'second option', '1', '2021-04-02 13:45:55'),
(7, 'Free Delivery - 7 day', 'fdg3df', '0', 'free delivery', '1', '2021-04-02 13:46:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`orderAddressId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `product_id` (`productId`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `customerGroupId` (`customerGroupId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `orderAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `config`
--
ALTER TABLE `config`
  ADD CONSTRAINT `config_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `config_group` (`groupId`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `id` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD CONSTRAINT `product_group_price_ibfk_1` FOREIGN KEY (`customerGroupId`) REFERENCES `customer_group` (`groupId`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `product_group_price_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
