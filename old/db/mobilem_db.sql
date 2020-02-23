-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:46 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobilem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `LastLoginDateTime` varchar(50) NOT NULL,
  `LastLogoutDateTime` varchar(50) NOT NULL,
  `LoginCount` int(10) NOT NULL,
  `LoginStatus` varchar(10) NOT NULL,
  `CurrentStatus` varchar(10) NOT NULL,
  `CurrentLoginFrom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`, `LastLoginDateTime`, `LastLogoutDateTime`, `LoginCount`, `LoginStatus`, `CurrentStatus`, `CurrentLoginFrom`) VALUES
('mobilemlucknow@gmail.com', '82554caae94464a5c4a44da24df09fe8', '', '0', 0, 'true', 'false', 'Website'),
('sandeep@gmail.com', '943f1e091d4537307cf3cb2e2748d47a', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
`AdID` int(10) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `SubTitle` varchar(1000) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Price` int(10) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Image1` varchar(200) NOT NULL,
  `Image2` varchar(200) NOT NULL,
  `Image3` varchar(200) NOT NULL,
  `AddDate` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `City` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`AdID`, `Title`, `SubTitle`, `Category`, `Brand`, `Status`, `Price`, `Location`, `Description`, `Image1`, `Image2`, `Image3`, `AddDate`, `Email`, `Contact`, `City`) VALUES
(5, 'sumsung j2 s6', '2 GB RAM AND 32 GB Hard Disk ', 'mobile', 'DELL', 'true', 6000, 'lucknow', 'Brand sumsung \r\nModel sumsung j2 s6 Pro\r\n1 gb ram and 32 gb hard disk \r\n8 MP Front Camera and 13 MP Rear Camera\r\n', '1.jpeg', '4.jpeg', '3.jpeg', '2018-01-27', 'sandy@gmail.com', '9087654321', 'lucknow'),
(6, 'sumsung j2 note5', '2 GB RAM AND 32 GB Hard Disk ', 'mobile', 'sumsung', 'true', 9000, 'lucknow', 'Brand sumsung Model sumsung j2 s6 Pro 1 gb ram and 32 gb hard disk 8 MP Front Camera and 13 MP Rear Camera', '2.jpeg', '3.jpeg', '7.jpeg', '2018-01-27', 'sandy@gmail.com', '9087654321', 'lucknow'),
(7, 'sumsung j2 note5', 'Brand sumsung Model sumsung j2 s6 ', 'mobile', 'sumsung', 'true', 9000, 'lucknow', 'Brand sumsung Model sumsung j2 s6 Pro 1 gb ram and 32 gb hard disk 8 MP Front Camera and 13 MP Rear Camera', '4.jpeg', '8.jpeg', '6.jpeg', '2018-01-27', 'sandy@gmail.com', '9087654321', 'Aligang');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`BrandID` int(10) NOT NULL,
  `BrandName` varchar(200) NOT NULL,
  `BrandLogo` varchar(200) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`, `BrandLogo`, `Date`, `Status`) VALUES
(1, 'Nokia', '74_71.jpg', '2017-11-29', 'true'),
(3, 'DELL', 'dell-na-laptop-original-imafy2gc5um6m7xx.jpeg', '2017-12-31', 'true'),
(4, 'Asus', 'acer-notebook-original-imaeshfrgscxttzg.jpeg', '2017-12-31', 'true'),
(5, 'Lenevo', 'asus-na-gaming-laptop-original-imafytb7kdrafhy6.jpeg', '2017-12-31', 'true'),
(6, 'sumsung', 'msi-notebook-original-imaerz73ujag6qpf.jpeg', '2017-12-31', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`CartID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Price` int(10) NOT NULL,
  `SubTotal` int(10) NOT NULL,
  `BuyStatus` varchar(5) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `SystemID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Date`, `Status`) VALUES
(2, 'tablet', '2017-11-30', 'true'),
(4, 'laptop', '2017-12-02', 'true'),
(5, 'mobile', '2017-12-02', 'true'),
(8, 'Accessories', '2017-12-21', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`ID` int(60) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Date` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `Subject`, `Address`, `Date`) VALUES
(5, 'jyoti', 'j@gmail.com', 'jyoti ', 'Hi! my name is jyoti', '2018-01-27 06:17:35pm'),
(6, 'kdjglfk', 'dkjgldjf', 'dnflkndsj', 'ksndfkjnsjd', '2018-01-27 06:19:08pm');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `LastLoginDateTime` varchar(50) NOT NULL,
  `LastLogoutDateTime` varchar(50) NOT NULL,
  `LoginCount` int(10) NOT NULL,
  `LoginStatus` varchar(10) NOT NULL,
  `CurrentStatus` varchar(10) NOT NULL,
  `CurrentLoginFrom` varchar(20) NOT NULL,
  `Otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `Password`, `LastLoginDateTime`, `LastLogoutDateTime`, `LoginCount`, `LoginStatus`, `CurrentStatus`, `CurrentLoginFrom`, `Otp`) VALUES
('spgour8741@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-03-11 05:35:55pm', '0', 3, 'true', 'true', 'Website', 213351);

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE IF NOT EXISTS `logindetails` (
`LoginDetailsID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mac` varchar(50) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `Browser` varchar(100) NOT NULL,
  `OS` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `LoginDate` varchar(20) NOT NULL,
  `LoginTime` varchar(20) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `LoginFrom` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`LoginDetailsID`, `Email`, `Mac`, `IP`, `Browser`, `OS`, `UserName`, `LoginDate`, `LoginTime`, `UserType`, `LoginFrom`) VALUES
(1, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-05', '10:08:21pm', 'Customer', ''),
(2, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-05', '10:36:31pm', 'Customer', ''),
(3, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-05', '10:45:29pm', 'Customer', ''),
(4, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-07', '07:17:14pm', 'Customer', ''),
(5, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-14', '11:52:30am', 'Customer', ''),
(6, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-14', '01:16:51pm', 'Customer', ''),
(7, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-14', '01:19:31pm', 'Customer', ''),
(8, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-14', '01:21:44pm', 'Customer', ''),
(9, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-15', '11:58:22pm', 'Customer', ''),
(10, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-18', '04:09:50pm', 'Customer', ''),
(11, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-22', '06:33:39pm', 'Customer', ''),
(12, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-22', '06:39:22pm', 'Customer', ''),
(13, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '11:32:00am', 'Customer', 'Website'),
(14, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '11:32:41am', 'Customer', 'Website'),
(15, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '11:35:26am', 'Customer', 'Website'),
(16, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '01:13:34pm', 'Admin', 'Website'),
(17, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '01:16:16pm', 'Admin', 'Website'),
(18, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '01:16:29pm', 'Admin', 'Website'),
(19, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '01:28:06pm', 'Admin', 'Website'),
(20, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-29', '04:34:25pm', 'Customer', 'Website'),
(21, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-30', '03:07:23pm', 'Admin', 'Website'),
(22, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-30', '03:11:10pm', 'Customer', 'Website'),
(23, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-30', '04:24:54pm', 'Admin', 'Website'),
(24, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '127.0.0.1', 'Firefox', 'Windows 7', 'Kashyap-PC', '2017-11-30', '04:34:01pm', 'Customer', 'Website'),
(25, 'hk@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-30', '06:52:47pm', 'Customer', 'Website'),
(26, 'mobilemlucknow@gmail.com', '1A-D2-24-8E-D7-30', '', 'Chrome', 'Windows 7', 'Kashyap-PC', '2017-11-30', '06:54:24pm', 'Admin', 'Website'),
(27, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '122.163.202.144', 'Firefox', 'Windows 7', 'abts-north-dynamic-144.202.163.122.airtelbroadband.in', '2017-11-30', '07:32:56pm', 'Admin', 'Website'),
(28, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '47.8.13.31', 'Handheld Browser', 'Android', '47.8.13.31', '2017-11-30', '09:17:40pm', 'Admin', 'Website'),
(29, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '112.79.135.202', 'Chrome', 'Windows 8.1', '112-79-135-202.live.vodafone.in', '2017-12-02', '12:12:49pm', 'Admin', 'Website'),
(30, 'maaz.97@icloud.com', '00-15-5D-84-47-05', '112.79.180.64', 'Handheld Browser', 'Android', '112-79-180-64.live.vodafone.in', '2017-12-05', '09:42:14am', 'Customer', 'Website'),
(31, 'taukeerahmad1997@gamil.com', '00-15-5D-84-47-05', '47.8.3.86', 'Handheld Browser', 'Android', '47.8.3.86', '2017-12-06', '12:53:01am', 'Customer', 'Website'),
(32, 'amsiddiqui1986@gmail.com', '00-15-5D-84-47-05', '112.79.223.8', 'Handheld Browser', 'Android', '112-79-223-8.live.vodafone.in', '2017-12-06', '11:20:31am', 'Customer', 'Website'),
(33, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '61.0.199.145', 'Chrome', 'Windows 7', '61.0.199.145', '2017-12-06', '01:46:41pm', 'Admin', 'Website'),
(34, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '61.0.199.145', 'Chrome', 'Windows 7', '61.0.199.145', '2017-12-06', '02:40:14pm', 'Admin', 'Website'),
(35, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '47.8.13.114', 'Chrome', 'Windows 7', '47.8.13.114', '2017-12-15', '02:16:31pm', 'Admin', 'Website'),
(36, 'hk@gmail.com', '00-15-5D-84-47-05', '47.8.13.114', 'Chrome', 'Windows 7', '47.8.13.114', '2017-12-15', '02:32:15pm', 'Customer', 'Website'),
(37, 'mohit26490@gmail.com', '00-15-5D-84-47-05', '47.8.9.25', 'Chrome', 'Windows 7', '47.8.9.25', '2017-12-16', '03:55:46pm', 'Customer', 'Website'),
(38, 'aadi.saket28@gmail.com', '00-15-5D-84-47-05', '47.8.7.210', 'Handheld Browser', 'Android', '47.8.7.210', '2017-12-16', '05:03:02pm', 'Customer', 'Website'),
(39, 'hk@gmail.com', '00-15-5D-84-47-05', '47.8.11.24', 'Handheld Browser', 'Android', '47.8.11.24', '2017-12-16', '06:38:04pm', 'Customer', 'Website'),
(40, 'mohit26490@gmail.com', '00-15-5D-84-47-05', '47.8.13.130', 'Handheld Browser', 'Android', '47.8.13.130', '2017-12-16', '07:21:25pm', 'Customer', 'Website'),
(41, 'mohit26490@gmail.com', '00-15-5D-84-47-05', '47.8.12.12', 'Handheld Browser', 'Android', '47.8.12.12', '2017-12-17', '09:55:51am', 'Customer', 'Website'),
(42, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '47.8.13.126', 'Handheld Browser', 'Android', '47.8.13.126', '2017-12-17', '06:01:29pm', 'Admin', 'Website'),
(43, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '47.8.13.126', 'Chrome', 'Linux', '47.8.13.126', '2017-12-17', '06:03:45pm', 'Admin', 'Website'),
(44, 'hk@gmail.com', '00-15-5D-84-47-05', '47.8.1.90', 'Handheld Browser', 'Android', '47.8.1.90', '2017-12-19', '11:17:28am', 'Customer', 'Website'),
(45, 'hk@gmail.com', '00-15-5D-84-47-05', '47.8.1.90', 'Handheld Browser', 'Android', '47.8.1.90', '2017-12-19', '11:29:15am', 'Customer', 'Website'),
(46, 'aadi.saket28@gmail.com', '00-15-5D-84-47-05', '47.8.7.239', 'Handheld Browser', 'Android', '47.8.7.239', '2017-12-19', '09:24:49pm', 'Customer', 'Website'),
(47, 'mohit26490@gmail.com', '00-15-5D-84-47-05', '47.8.2.102', 'Chrome', 'Windows 7', '47.8.2.102', '2017-12-20', '01:46:09pm', 'Customer', 'Website'),
(48, 'hk@gmail.com', '00-15-5D-84-47-05', '171.79.109.79', 'Chrome', 'Windows 8.1', 'abts-north-dynamic-79.109.79.171.airtelbroadband.in', '2017-12-20', '06:10:06pm', 'Customer', 'Website'),
(49, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '112.79.137.235', 'Handheld Browser', 'iPhone', '112-79-137-235.live.vodafone.in', '2017-12-20', '08:01:16pm', 'Admin', 'Website'),
(50, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '112.79.132.211', 'Handheld Browser', 'iPhone', '112-79-132-211.live.vodafone.in', '2017-12-20', '08:58:17pm', 'Admin', 'Website'),
(51, 'mobilemlucknow@gmail.com', '00-15-5D-84-47-05', '47.8.14.154', 'Chrome', 'Windows 10', '47.8.14.154', '2017-12-21', '12:02:31am', 'Admin', 'Website'),
(52, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2017-12-31', '12:04:50pm', 'Admin', 'Website'),
(53, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2017-12-31', '05:41:56pm', 'Customer', 'Website'),
(54, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2017-12-31', '05:54:49pm', 'Admin', 'Website'),
(55, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-01', '12:47:15pm', 'Admin', 'Website'),
(56, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-02', '10:29:03am', 'Admin', 'Website'),
(57, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '11:27:22am', 'Customer', 'Website'),
(58, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '11:31:08am', 'Customer', 'Website'),
(59, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '11:34:46am', 'Customer', 'Website'),
(60, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:06:53pm', 'Customer', 'Website'),
(61, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:10:49pm', 'Customer', 'Website'),
(62, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:17:56pm', 'Customer', 'Website'),
(63, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:21:16pm', 'Customer', 'Website'),
(64, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:24:40pm', 'Customer', 'Website'),
(65, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:34:42pm', 'Customer', 'Website'),
(66, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:35:38pm', 'Customer', 'Website'),
(67, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '02:47:33pm', 'Customer', 'Website'),
(68, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '02:49:46pm', 'Customer', 'Website'),
(69, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '05:50:43pm', 'Admin', 'Website'),
(70, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-04', '11:41:34am', 'Customer', 'Website'),
(71, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-04', '12:04:35pm', 'Customer', 'Website'),
(72, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-04', '05:51:05pm', 'Admin', 'Website'),
(73, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '10:38:44am', 'Admin', 'Website'),
(74, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '11:14:08am', 'Admin', 'Website'),
(75, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '11:25:45am', 'Admin', 'Website'),
(76, 's@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '11:39:46am', 'Customer', 'Website'),
(77, 'sp@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '05:53:28pm', 'Customer', 'Website'),
(78, 'sp@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '05:57:07pm', 'Customer', 'Website'),
(79, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '05:59:49pm', 'Admin', 'Website'),
(80, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '06:22:14pm', 'Admin', 'Website'),
(81, 'q@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '07:17:28pm', 'Customer', 'Website'),
(82, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-06', '10:26:46am', 'Admin', 'Website'),
(83, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-06', '11:20:46am', 'Admin', 'Website'),
(84, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-06', '04:40:09pm', 'Admin', 'Website'),
(85, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '12:40:26pm', 'Admin', 'Website'),
(86, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '12:45:09pm', 'Admin', 'Website'),
(87, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '12:58:54pm', 'Admin', 'Website'),
(88, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '01:10:51pm', 'Admin', 'Website'),
(89, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '01:14:23pm', 'Admin', 'Website'),
(90, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Handheld Browser', 'iPhone', 'SANDEEP', '2018-01-07', '02:27:04pm', 'Admin', 'Website'),
(91, 'kk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '02:51:13pm', 'Customer', 'Website'),
(92, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '01:27:45pm', 'Customer', 'Website'),
(93, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '02:46:47pm', 'Customer', 'Website'),
(94, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '03:16:17pm', 'Customer', 'Website'),
(95, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Firefox', 'Windows 8.1', 'SANDEEP', '2018-01-16', '03:20:49pm', 'Customer', 'Website'),
(96, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '03:23:36pm', 'Customer', 'Website'),
(97, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-18', '07:15:43pm', 'Admin', 'Website'),
(98, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Firefox', 'Windows 8.1', 'SANDEEP', '2018-01-18', '07:18:05pm', 'Admin', 'Website'),
(99, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-18', '07:18:44pm', 'Admin', 'Website'),
(100, 'go@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Firefox', 'Windows 8.1', 'SANDEEP', '2018-01-19', '10:42:24am', 'Customer', 'Website'),
(101, 'go@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '10:44:51am', 'Customer', 'Website'),
(102, 'go@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '12:02:04pm', 'Customer', 'Website'),
(103, 'go@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '01:00:10pm', 'Customer', 'Website'),
(104, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '03:38:19pm', 'Admin', 'Website'),
(105, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '03:40:35pm', 'Admin', 'Website'),
(106, 'mobilemlucknow@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '04:40:34pm', 'Admin', 'Website'),
(107, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '05:53:48pm', 'Customer', 'Website'),
(108, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '06:19:29pm', 'Customer', 'Website'),
(109, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '06:23:13pm', 'Customer', 'Website'),
(110, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-19', '06:37:47pm', 'Customer', 'Website'),
(111, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '03:00:23pm', 'Customer', 'Website'),
(112, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '03:24:14pm', 'Customer', 'Website'),
(113, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '03:40:48pm', 'Customer', 'Website'),
(114, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '04:07:49pm', 'Customer', 'Website'),
(115, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '04:21:31pm', 'Customer', 'Website'),
(116, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '06:57:47pm', 'Customer', 'Website'),
(117, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '07:13:19pm', 'Customer', 'Website'),
(118, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Edge', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '12:23:13am', 'Customer', 'Website'),
(119, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '02:09:20pm', 'Customer', 'Website'),
(120, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '02:16:15pm', 'Customer', 'Website'),
(121, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Handheld Browser', 'iPhone', 'DESKTOP-NGAOOIK', '2018-01-21', '02:19:48pm', 'Customer', 'Website'),
(122, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '02:37:39pm', 'Customer', 'Website'),
(123, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '03:04:13pm', 'Customer', 'Website'),
(124, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '03:30:57pm', 'Customer', 'Website'),
(125, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-21', '03:33:16pm', 'Customer', 'Website'),
(126, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '01:14:58pm', 'Customer', 'Website'),
(127, 'hello@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '01:40:35pm', 'Customer', 'Website'),
(128, 'ss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '01:51:01pm', 'Customer', 'Website'),
(129, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '02:31:07pm', 'Customer', 'Website'),
(130, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '02:35:12pm', 'Customer', 'Website'),
(131, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '02:36:03pm', 'Customer', 'Website'),
(132, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '02:54:50pm', 'Customer', 'Website'),
(133, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '03:08:02pm', 'Customer', 'Website'),
(134, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:40:06pm', 'Customer', 'Website'),
(135, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:41:47pm', 'Customer', 'Website'),
(136, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:44:05pm', 'Customer', 'Website'),
(137, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:48:05pm', 'Customer', 'Website'),
(138, 'a@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:50:25pm', 'Customer', 'Website'),
(139, 'a@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '04:51:41pm', 'Customer', 'Website'),
(140, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '05:01:01pm', 'Admin', 'Website'),
(141, 'vikasnwg@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '05:38:13pm', 'Customer', 'Website'),
(142, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '11:49:32am', 'Admin', 'Website'),
(143, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '02:36:13pm', 'Admin', 'Website'),
(144, 'ausaf@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '03:45:40pm', 'Customer', 'Website'),
(145, 'ausaf@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '03:47:01pm', 'Customer', 'Website'),
(146, 'ausaf@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '03:57:30pm', 'Customer', 'Website'),
(147, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-23', '04:09:37pm', 'Admin', 'Website'),
(148, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-24', '03:19:20pm', 'Admin', 'Website'),
(149, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-24', '04:05:49pm', 'Admin', 'Website'),
(150, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-24', '05:05:36pm', 'Customer', 'Website'),
(151, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-25', '01:53:29pm', 'Customer', 'Website'),
(152, 's@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-25', '02:04:46pm', 'Customer', 'Website'),
(153, 'sandy@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '10:32:44am', 'Customer', 'Website'),
(154, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '12:01:42pm', 'Admin', 'Website'),
(155, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '04:31:52pm', 'Admin', 'Website'),
(156, 'sandy@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '04:34:20pm', 'Customer', 'Website'),
(157, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '05:39:50pm', 'Admin', 'Website'),
(158, 'sandy@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-27', '06:01:52pm', 'Customer', 'Website'),
(159, 'sandy@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-29', '11:20:02am', 'Customer', 'Website'),
(160, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-02-03', '06:40:32pm', 'Customer', 'Website'),
(161, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-02-03', '06:42:11pm', 'Customer', 'Website'),
(162, 'sp@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-02-03', '07:04:46pm', 'Customer', 'Website'),
(163, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '11:09:52am', 'Admin', 'Website'),
(164, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '11:12:59am', 'Customer', 'Website'),
(165, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '11:55:26am', 'Customer', 'Website'),
(166, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '12:17:09pm', 'Admin', 'Website'),
(167, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '12:18:40pm', 'Customer', 'Website'),
(168, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-13', '04:17:05pm', 'Admin', 'Website'),
(169, 'alok@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-13', '04:22:37pm', 'Customer', 'Website'),
(170, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-14', '11:05:37am', 'Admin', 'Website'),
(171, 'shivam@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-14', '11:43:47am', 'Customer', 'Website'),
(172, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '12:54:35pm', 'Customer', 'Website'),
(173, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '05:31:03pm', 'Customer', 'Website'),
(174, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '05:39:48pm', 'Customer', 'Website'),
(175, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '05:42:36pm', 'Admin', 'Website'),
(176, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '06:36:10pm', 'Admin', 'Website'),
(177, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-18', '02:29:16pm', 'Customer', 'Website'),
(178, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-18', '02:37:02pm', 'Customer', 'Website'),
(179, 'alok@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-19', '01:33:40pm', 'Customer', 'Website'),
(180, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '12:30:59pm', 'Customer', 'Website'),
(181, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '12:32:05pm', 'Customer', 'Website'),
(182, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:05:04pm', 'Customer', 'Website'),
(183, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:06:37pm', 'Customer', 'Website'),
(184, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:08:19pm', 'Customer', 'Website'),
(185, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:19:20pm', 'Admin', 'Website'),
(186, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-23', '05:03:11pm', 'Customer', 'Website'),
(187, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-23', '05:11:17pm', 'Admin', 'Website'),
(188, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-23', '05:19:54pm', 'Admin', 'Website'),
(189, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-27', '11:11:29am', 'Customer', 'Website'),
(190, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-27', '12:26:56pm', 'Admin', 'Website'),
(191, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-07', '04:08:35pm', 'Customer', 'Website'),
(192, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-07', '04:25:27pm', 'Customer', 'Website'),
(193, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-07', '04:27:02pm', 'Customer', 'Website'),
(194, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-07', '04:36:08pm', 'Customer', 'Website'),
(195, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-11', '12:13:35pm', 'Admin', 'Website'),
(196, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-11', '02:27:41pm', 'Admin', 'Website'),
(197, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-11', '05:07:40pm', 'Customer', 'Website'),
(198, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-11', '05:34:21pm', 'Customer', 'Website'),
(199, 'spgour8741@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-11', '05:35:55pm', 'Customer', 'Website'),
(200, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-12', '10:08:02am', 'Admin', 'Website'),
(201, 'mobilemlucknow@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-03-12', '10:09:56am', 'Admin', 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE IF NOT EXISTS `orderproduct` (
`OrderProductID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`OrderID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `EmailAlt` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `SubTotal` int(10) NOT NULL,
  `DeliveryCharge` int(10) NOT NULL,
  `Tax` int(10) NOT NULL,
  `TotalCharge` int(10) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `StatusByCustomer` varchar(10) NOT NULL,
  `StatusByAdmin` varchar(10) NOT NULL,
  `DeliveryStatus` varchar(10) NOT NULL,
  `PaymentStatus` varchar(10) NOT NULL,
  `PaymentReqID` varchar(100) NOT NULL,
  `PaymentID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertracing`
--

CREATE TABLE IF NOT EXISTS `ordertracing` (
`OrderTraceID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mac` varchar(50) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `Browser` varchar(100) NOT NULL,
  `OS` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `OrderFrom` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertracing`
--

INSERT INTO `ordertracing` (`OrderTraceID`, `OrderID`, `Email`, `Mac`, `IP`, `Browser`, `OS`, `UserName`, `Date`, `Time`, `OrderFrom`) VALUES
(1, 1, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:11:19pm', 'Website'),
(2, 1, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:18:22pm', 'Website'),
(3, 2, 'hk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-03', '12:21:41pm', 'Website'),
(9, 8, 's@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '11:42:33am', 'Website'),
(10, 9, 's@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-05', '05:50:49pm', 'Website'),
(13, 12, 'kk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '02:51:40pm', 'Website'),
(14, 13, 'kk@gmail.com', 'E6-02-9B-2F-FC-3D', '127.0.0.1', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-07', '02:52:54pm', 'Website'),
(15, 14, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '02:48:19pm', 'Website'),
(16, 15, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '02:53:32pm', 'Website'),
(17, 16, 'show@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-16', '03:00:40pm', 'Website'),
(18, 1, 'spgour8741@gmail.com', 'E6-02-9B-2F-FC-3D', '', 'Chrome', 'Windows 8.1', 'SANDEEP', '2018-01-20', '03:01:23pm', 'Website'),
(19, 2, 'vikasnwg@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-NGAOOIK', '2018-01-22', '05:42:22pm', 'Website'),
(20, 3, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-10', '11:14:22am', 'Website'),
(21, 4, 'alok@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-13', '04:23:01pm', 'Website'),
(22, 5, 'shivam@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-14', '11:44:20am', 'Website'),
(23, 6, 'shivam@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-14', '11:46:06am', 'Website'),
(24, 7, 'shivam@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-14', '11:47:13am', 'Website'),
(25, 8, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '12:55:00pm', 'Website'),
(26, 9, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '12:57:55pm', 'Website'),
(27, 10, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '01:02:09pm', 'Website'),
(28, 11, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '01:42:31pm', 'Website'),
(29, 12, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '01:52:42pm', 'Website'),
(30, 13, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '05:31:40pm', 'Website'),
(31, 14, 'sss@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-17', '05:40:33pm', 'Website'),
(32, 15, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:09:46pm', 'Website'),
(33, 16, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:33:27pm', 'Website'),
(34, 17, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:34:18pm', 'Website'),
(35, 18, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-21', '06:40:07pm', 'Website'),
(36, 19, 'sandeep@gmail.com', '28-F1-0E-41-A0-C1', '', 'Chrome', 'Windows 10', 'DESKTOP-TCMHBFB', '2018-02-23', '05:04:19pm', 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`ProductID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `SubName` varchar(1000) NOT NULL,
  `Category` int(100) DEFAULT NULL,
  `Brand` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Price` int(10) NOT NULL,
  `Discount` int(5) NOT NULL,
  `Description` longtext NOT NULL,
  `Image1` varchar(200) NOT NULL,
  `Image2` varchar(200) NOT NULL,
  `Image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `image6` varchar(200) NOT NULL,
  `image7` varchar(200) NOT NULL,
  `AddDate` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `SubName`, `Category`, `Brand`, `Status`, `Price`, `Discount`, `Description`, `Image1`, `Image2`, `Image3`, `image4`, `image5`, `image6`, `image7`, `AddDate`) VALUES
(24, 'Nokia 216 (Grey)', '', 5, '', 'In-Stock', 2590, 10, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">0.3MP primary camera with LED flash and 0.3MP front facing camera</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">696 centimeters (2.4-inch) QVGA display with 230 x 320 pixels resolution</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Series 30+ operating system, 16MB RAM, 16MB internal memory expandable up to 32GB and dual SIM (2G+2G)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1020mAH lithium-ion</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li></ul><div><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; color: rgb(51, 51, 51); font-family: Arial; font-size: 12px; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">OS</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Series 30+</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">16 MB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">81.6 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Product Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">11.7 x 1.3 x 5 cm</td></tr><tr class="batteries"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Batteries:</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1 Lithium ion batteries required. (included)</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">216</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Wireless communication technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Bluetooth</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GSM, (900/1800MHz)</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Dual SIM, Music Player, Video Player, FM Radio</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Other camera features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">0.3MP</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Candybar Phone</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">81.6 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Grey</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1020</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Battery, Charger Earphone and Manual</td></tr></tbody></table></div>', 'f1 (7).jpg', 'm1.jpg', 'm2.jpg', '', '', '', '', '2018-03-11'),
(25, 'Samsung On7 Pro (Gold)', '13MP primary camera and  5MP front facing camera', 5, '', 'In-Stock', 0, 5, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13MP primary camera with auto mode, beauty face, continuous shot, interval shot, panorama mode and 5MP front facing camera with palm gesture selfie and 120 degree selfie mode</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13.86 centimeters (5.5-inch) TFT capacitive touchscreen with 720 x 1280 pixels HD display</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Andorid v6.0 Marshmallow operating system with 1.2GHz Qualcomm Snapdragon quad core processor, 2GB RAM, 16GB internal memory expandable up to 128GB and dual SIM (micro+micro) dual-standby (4G+4G)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Removable Li-Ion 3000 mAh battery.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);"><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; color: rgb(51, 51, 51); font-family: Arial; font-size: 12px; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">OS</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Android</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">2 GB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">172 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Product Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">7.8 x 15.2 x 0.8 cm</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">G-600FY</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Wireless communication technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Bluetooth, WiFi Hotspot</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GSM, (850/900/1800/1900 MHz), 4G LTE, (2600/2100/2300/1900/1800/850/900/800 MHz)</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Dual SIM, GPS, Music Player, Video Player, FM Radio, Accelerometer, Proximity sensor, E-mail</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Other camera features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">13MP Primary &amp; 5MP front</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Touchscreen Phone</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">172 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Gold</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">3000</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Travel Adaptor, USB Cable and User Guide</td></tr></tbody></table></span></li></ul>', 'm6.jpeg', 'm7.jpg', 'm4.jpg', '', '', '', '', '2018-03-11'),
(26, 'Samsung Guru Music 2 SM-B310E (White)', 'Memory expandable up to 16GB and dual SIM (GSM GSM)', 5, '', 'In-Stock', 2399, 2, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">FM Radio, FM Recording</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">2-Inch (5.1 centimeters) QQVGA display with 128 x 160 pixels resolution</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Memory expandable up to 16GB and dual SIM (GSM GSM)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">800mAH lithium-ion battery providing talk-time of 11 hours</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li></ul><div><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; color: rgb(51, 51, 51); font-family: Arial; font-size: 12px; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">208 MB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">191 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Package Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">12.3 x 7.6 x 7.5 cm</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">SM-B310E</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GSM(900/1800 MHz)</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Dual SIM,Music Player,FM Radio</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Candybar</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">191 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">White</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">800</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Battery, Charger, Headset and User Manual</td></tr></tbody></table></div>', 'm3.png', 'm1.jpg', 'f1 (1).jpg', '', '', '', '', '2018-03-11'),
(28, 'Samsung Galaxy On7 Prime', 'Gold, 3GB RAM + 32GB Memory', 5, 'sumsung', 'In-Stock', 12000, 50, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13MP primary camera with f1.9 with auto focus and rear flash and 13MP front facing camera</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13.88 centimeters (5.5-inch) FHD Display with 1080 x 1920 pixels resolution</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Android v7.1 Nougat operating system with 1.6GHz Exynos 7870 octa core processor</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">3GB RAM, 32GB internal memory expandable up to addl. 256GB and dual SIM (nano+nano) dual-standby (4G+4G)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">3300mAH lithium-ion battery</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Earphones to be purchased separately</span></li></ul><div><div class="secHeader" style="border-bottom: 1px solid rgb(204, 204, 204); padding: 0px 0px 7px 10px; font-size: 16px; color: rgb(51, 51, 51); font-family: Arial;">Technical Details</div><div class="content pdClearfix" style="margin: 10px 0px 0px 12px; color: rgb(51, 51, 51); font-size: 12px; line-height: 16px; font-family: Arial;"><div class="attrG" style="clear: both; border: none;"><div class="pdTab" style="margin-left: 7px; width: 624.5px;"><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">OS</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Android</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">3 GB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">168 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Product Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">0.8 x 15.2 x 7.5 cm</td></tr><tr class="batteries"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Batteries:</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1 Lithium ion batteries required. (included)</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">SM-G611FD</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Wireless communication technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Bluetooth, WiFi Hotspot</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">2G, GSM, 3G, WCDMA, 4G LTE, FDD, TDD</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Dual SIM, GPS, Music Player, Video Player</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Other camera features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">13MP</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Touchscreen Phone</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">168 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Gold</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">3300</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Travel Adapter, USB Cable and User Manual (Earphones are to be purchased separately)</td></tr></tbody></table></div></div></div></div>', 'f1 (1).jpg', 'f1 (6).jpg', 'm1.jpg', '', '', '', '', '2018-03-11'),
(29, 'Samsung Guru 1200 (GT-E1200, White)', '', 5, '', 'In-Stock', 5499, 4, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Poly ringtone</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1.52-inch TFT screen with 128x128 pixels resolution</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Samsung proprietary operating system with single sim</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">800mAH battery providing talktime of 8 hours 40 minutes and standby time of 720 hours</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 month manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li></ul><div><div class="secHeader" style="border-bottom: 1px solid rgb(204, 204, 204); padding: 0px 0px 7px 10px; font-size: 16px; color: rgb(51, 51, 51); font-family: Arial;">Technical Details</div><div class="content pdClearfix" style="margin: 10px 0px 0px 12px; color: rgb(51, 51, 51); font-size: 12px; line-height: 16px; font-family: Arial;"><div class="attrG" style="clear: both; border: none;"><div class="pdTab" style="margin-left: 7px; width: 624.5px;"><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">OS</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Samsung Proprietary</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">156 MB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">63.5 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Product Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1.4 x 4.6 x 10.8 cm</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GT-E1200</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GSM(900/1800 MHz)</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1.52 Inches TFT Display,800 Mah Battery,Torch Light</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Device interface - primary</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Keypad</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Candybar</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">63.5 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">White</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">800</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Phone Talk Time</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">480 Minutes</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Phone Standby Time (with data)</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">792 Hours</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Battery, Charger and User Guide</td></tr></tbody></table></div></div></div></div>', 'f1 (5).jpg', 'f1 (6).jpg', '521.jpg', '', '', '', '', '2018-03-11');
INSERT INTO `products` (`ProductID`, `Name`, `SubName`, `Category`, `Brand`, `Status`, `Price`, `Discount`, `Description`, `Image1`, `Image2`, `Image3`, `image4`, `image5`, `image6`, `image7`, `AddDate`) VALUES
(31, 'Samsung Galaxy J7 Pro (Black, 64GB) with Offers', '13MP primary camera and 13MP front facing camera', 5, 'sumsung', 'In-Stock', 12000, 5, '<ul class="a-unordered-list a-vertical a-spacing-none" style="margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13MP primary camera and 13MP front facing camera</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">13.97 centimeters (5.5-inch) capacitive touchscreen with 1080 x 1920 pixels resolution</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Android v7.0 Nougat operating system with 1.6GHz Exynos 77870 octa core processor, 3GB RAM, 64GB internal memory expandable up to 128GB and dual SIM dual-standby (4G+3G)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">3000mAH lithium-ion battery</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</span></li></ul><div><table cellspacing="0" cellpadding="0" border="0" style="width: 605px; table-layout: fixed; color: rgb(51, 51, 51); font-family: Arial; font-size: 12px; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;"><tbody><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">OS</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Android</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">RAM</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">3 GB</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">449 g</td></tr><tr class="size-weight"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Product Dimensions</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">15.2 x 0.8 x 7.5 cm</td></tr><tr class="batteries"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Batteries:</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">1 Lithium ion batteries required. (included)</td></tr><tr class="item-model-number"><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Item model number</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">SM-J730GZKWINS</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Wireless communication technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Bluetooth, WiFi Hotspot</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Connectivity technologies</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">GSM, 3G, WCDMA, 4G LTE</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Special features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Dual SIM</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Other camera features</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">13MP</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Form factor</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Touchscreen Phone</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Weight</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">449 Grams</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Colour</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Black</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Battery Power Rating</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">3000</td></tr><tr><td class="label" style="vertical-align: top; padding-top: 3px; padding-right: 1px; padding-left: 10px; color: rgb(102, 102, 102); font-size: 12px; border-top: 1px dotted rgb(204, 204, 204); line-height: 18px; background-color: rgb(245, 245, 245); width: 211px;">Whats in the box</td><td class="value" style="vertical-align: top; padding: 3px 1px 3px 10px; color: rgb(51, 51, 51); border-top: 1px dotted rgb(204, 204, 204); line-height: 18px;">Handset, Charger, Battery, Hands-free Earphone and User Manual</td></tr></tbody></table></div>', 'm5.jpg', 'm4.jpg', 'm11.png', '', '', '', '', '2018-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`UserID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `OTPCode` varchar(10) NOT NULL,
  `OTPStatus` varchar(10) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserID`, `Name`, `Mobile`, `Gender`, `Email`, `Password`, `OTPCode`, `OTPStatus`, `Date`) VALUES
(1, 'sandeep  kumar gond', '9260936018', 'Male', 'spgour8741@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '433764', 'true', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(60) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `date`) VALUES
(4, 'Slider1.jpg', '2018-01-06'),
(5, 'Slider2.jpg', '2018-01-06'),
(6, 'Slider3.jpg', '2018-01-06'),
(7, 'Slider4.jpg', '2018-01-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
 ADD PRIMARY KEY (`AdID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
 ADD PRIMARY KEY (`LoginDetailsID`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
 ADD PRIMARY KEY (`OrderProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `ordertracing`
--
ALTER TABLE `ordertracing`
 ADD PRIMARY KEY (`OrderTraceID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
MODIFY `AdID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `BrandID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `CartID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `ID` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
MODIFY `LoginDetailsID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
MODIFY `OrderProductID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordertracing`
--
ALTER TABLE `ordertracing`
MODIFY `OrderTraceID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
