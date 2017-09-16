-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 01:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaurav`
--

-- --------------------------------------------------------

--
-- Table structure for table `cycle`
--

CREATE TABLE `cycle` (
  `manufacturer` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `bicyclepic` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `ownerid` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycle`
--

INSERT INTO `cycle` (`manufacturer`, `model`, `bicyclepic`, `description`, `available`, `ownerid`) VALUES
('Hero', 'DTB', '1774178.jpg', 'Looks and Runs smooth', 0, 2015092);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownername` text NOT NULL,
  `ownerrollnumber` int(100) NOT NULL,
  `ownerpic` varchar(100) NOT NULL,
  `owneremail` varchar(100) NOT NULL,
  `ownerphonenumber` bigint(10) NOT NULL,
  `owneraddress` varchar(100) NOT NULL,
  `ownerpassword` varchar(100) NOT NULL,
  `ownerwallet` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownername`, `ownerrollnumber`, `ownerpic`, `owneremail`, `ownerphonenumber`, `owneraddress`, `ownerpassword`, `ownerwallet`) VALUES
('Gaurav Nayak', 2015092, 'DSC06570.png', 'gaurav.n.ind@gmail.com', 8989094088, 'G-402 Hall 4', 'qwerty', 56.3167);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `transaction_id` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `renter_id` int(100) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`transaction_id`, `owner_id`, `renter_id`, `timedate`, `amount`) VALUES
(14, 2015092, 2015114, '2017-04-30 06:05:59', 0.316667);

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `fullname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `rollnumber` int(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `wallet` float NOT NULL,
  `bookingstatus` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`fullname`, `email`, `rollnumber`, `pass`, `phonenumber`, `address`, `wallet`, `bookingstatus`) VALUES
('janesh behera', 'janeshbehera17@gmail.com', 2015114, '2015114', 9439941006, 'G-402', 176.683, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rentstop`
--

CREATE TABLE `rentstop` (
  `transaction_id_rent` int(100) NOT NULL,
  `stopdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentstop`
--

INSERT INTO `rentstop` (`transaction_id_rent`, `stopdate`) VALUES
(14, '2017-04-30 06:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `repairrequestowner`
--

CREATE TABLE `repairrequestowner` (
  `ownerrollnumber` int(100) NOT NULL,
  `owneremail` varchar(100) NOT NULL,
  `ownername` text NOT NULL,
  `repairdescription` text NOT NULL,
  `repairdone` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cycle`
--
ALTER TABLE `cycle`
  ADD KEY `cycle_ibfk_1` (`ownerid`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerrollnumber`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`rollnumber`);

--
-- Indexes for table `rentstop`
--
ALTER TABLE `rentstop`
  ADD KEY `fk_transaction_id_rent` (`transaction_id_rent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
