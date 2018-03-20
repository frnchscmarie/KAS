-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 09:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knoxville`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` varchar(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `client_name`, `address`, `contact_no`) VALUES
('00000000000', '123', '123asdasdasd', '123'),
('00000000001', 'SADSADAS123123', 'ASDSAD12123', 'ASDASD'),
('00000000002', 'dsfsd', 'er34', '3242'),
('00000000003', 'chesca', '213asda', '213');

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `orderID` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `due` date NOT NULL,
  `userID` varchar(20) NOT NULL,
  `clientID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`orderID`, `date`, `time`, `due`, `userID`, `clientID`) VALUES
('180315-0000', '2018-03-15', '13:02:00', '2018-03-22', 'admin', '00000000001'),
('180315-0001', '2018-03-15', '13:19:00', '2018-03-22', 'admin', '00000000001'),
('180319-0002', '2018-03-19', '22:01:00', '2018-03-26', 'admin', '00000000001'),
('180319-0003', '2018-03-19', '22:03:00', '2018-03-26', 'admin', '00000000001'),
('180319-0004', '2018-03-19', '22:04:00', '2018-03-26', 'admin', '00000000001'),
('180319-0005', '2018-03-19', '22:04:00', '2018-03-26', 'admin', '00000000001'),
('180319-0006', '2018-03-19', '22:05:00', '2018-03-26', 'admin', '00000000001'),
('180319-0007', '2018-03-19', '22:06:00', '2018-03-26', 'admin', '00000000001'),
('180319-0008', '2018-03-19', '23:24:00', '2018-03-26', 'admin', '00000000001'),
('180319-0009', '2018-03-19', '23:25:00', '2018-03-26', 'admin', '00000000001'),
('180319-0010', '2018-03-19', '23:26:00', '2018-03-26', 'admin', '00000000001'),
('180319-0011', '2018-03-19', '23:27:00', '2018-03-26', 'admin', '00000000001'),
('180319-0012', '2018-03-19', '23:29:00', '2018-03-26', 'admin', '00000000001'),
('180319-0013', '2018-03-19', '23:30:00', '2018-03-26', 'admin', '00000000001'),
('180319-0014', '2018-03-19', '23:32:00', '2018-03-26', 'admin', '00000000001'),
('180319-0015', '2018-03-19', '23:33:00', '2018-03-26', 'admin', '00000000001'),
('180319-0016', '2018-03-19', '23:34:00', '2018-03-26', 'admin', '00000000001'),
('180319-0017', '2018-03-19', '23:35:00', '2018-03-26', 'admin', '00000000001'),
('180319-0018', '2018-03-19', '23:37:00', '2018-03-26', 'admin', '00000000001'),
('180319-0019', '2018-03-19', '23:37:00', '2018-03-26', 'admin', '00000000001'),
('180319-0020', '2018-03-19', '23:37:00', '2018-03-26', 'admin', '00000000001'),
('180319-0021', '2018-03-19', '23:39:00', '2018-03-26', 'admin', '00000000001'),
('180319-0022', '2018-03-19', '23:45:00', '2018-03-26', 'admin', '00000000001'),
('180319-0023', '2018-03-19', '00:24:00', '2018-03-27', 'admin', '00000000001'),
('180319-0024', '2018-03-19', '00:24:00', '2018-03-27', 'admin', '00000000001'),
('180319-0025', '2018-03-19', '02:09:00', '2018-03-27', 'admin', '00000000001'),
('180320-0026', '2018-03-20', '11:27:00', '2018-03-27', 'admin', '00000000001'),
('180320-0027', '2018-03-20', '12:04:00', '2018-03-27', 'admin', '00000000000'),
('180320-0028', '2018-03-20', '12:07:00', '2018-03-27', 'admin', '00000000000');

-- --------------------------------------------------------

--
-- Table structure for table `client_quote`
--

CREATE TABLE `client_quote` (
  `quoteID` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `due` date NOT NULL,
  `userID` varchar(20) NOT NULL,
  `clientID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_quote`
--

INSERT INTO `client_quote` (`quoteID`, `date`, `time`, `due`, `userID`, `clientID`) VALUES
('0000000001', '2018-03-08', '02:05:00', '2018-03-22', 'admin', '0000000001'),
('180319-0001', '2018-03-19', '00:00:00', '2018-03-26', 'admin', '00000000001'),
('180319-0002', '2018-03-19', '00:00:00', '2018-03-26', 'admin', '00000000001'),
('180319-0003', '2018-03-19', '23:12:00', '2018-03-26', 'admin', '00000000001'),
('180319-0004', '2018-03-19', '23:31:00', '2018-03-26', 'admin', '00000000001'),
('180320-0005', '2018-03-19', '02:20:00', '2018-03-27', 'admin', '00000000001'),
('180320-0006', '2018-03-19', '02:21:00', '2018-03-27', 'admin', '00000000001'),
('180320-0007', '2018-03-19', '02:22:00', '2018-03-27', 'admin', '00000000001'),
('180320-0008', '2018-03-19', '02:24:00', '2018-03-27', 'admin', '00000000001'),
('180320-0009', '2018-03-20', '12:06:00', '2018-03-27', 'admin', '00000000000');

-- --------------------------------------------------------

--
-- Table structure for table `defectiveitems`
--

CREATE TABLE `defectiveitems` (
  `defectID` int(11) NOT NULL,
  `stockID` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `delivererID` varchar(10) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `assigned` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverer`
--

INSERT INTO `deliverer` (`delivererID`, `vehicle`, `contact_no`, `assigned`) VALUES
('18-003-000', 'Jeep', 134567, 'al'),
('18-003-001', 'Motor bike', 323, 'asas'),
('18-003-002', 'Motor bike', 2147483647, 'al'),
('18-003-003', 'Motor bike', 32131, 'dad'),
('18-003-004', 'Motor bike', 231231, 'gamban');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `item_desc` varchar(30) NOT NULL,
  `unit_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `item_desc`, `unit_price`) VALUES
(5, 'Hydraulics', 0),
(6, 'asdasd123', 1234570),
(8, 'qwer', 34);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `quantity` int(11) NOT NULL DEFAULT '1',
  `itemID` int(11) NOT NULL,
  `orderID` varchar(11) NOT NULL,
  `unit_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`quantity`, `itemID`, `orderID`, `unit_price`) VALUES
(4, 2, '180319-0009', 1),
(3, 2, '180319-0010', 3),
(3, 2, '180319-0011', 4),
(4, 2, '180319-0013', 3),
(3, 2, '180319-0014', 4),
(3, 2, '180319-0017', 3),
(7, 2, '180319-0019', 13),
(6, 2, '180319-0021', 7),
(5, 2, '180319-0022', 6),
(4, 2, '180319-0023', 5),
(2, 2, '180319-0024', 5),
(3, 2, '180319-0025', 3),
(4, 2, '180320-0026', 5),
(3, 2, '180320-0027', 2),
(3, 2, '180320-0028', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `unit_price` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '1',
  `itemID` int(11) NOT NULL,
  `quoteID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`unit_price`, `quantity`, `itemID`, `quoteID`) VALUES
(3, 4, 2, '180319-0001'),
(5, 4, 2, '180319-0002'),
(3, 2, 2, '180319-0003'),
(5, 3, 2, '180319-0004'),
(7, 6, 2, '180319-0008'),
(4, 3, 2, '180320-0005'),
(3, 2, 2, '180320-0006'),
(3, 3, 2, '180320-0007'),
(1, 3, 2, '180320-0008'),
(3, 3, 2, '180320-0009');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reason` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_agent`
--

CREATE TABLE `sales_agent` (
  `userID` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_agent`
--

INSERT INTO `sales_agent` (`userID`, `password`, `birthdate`, `email`, `contact_no`, `fullname`, `isAdmin`) VALUES
('18-002-002', 'sdsadsa', '2019-02-01', 'dasdsad@gmail.com', 'dasdasdsa', 'dsadsadsadsa', 0),
('admin', '1234', '2017-09-01', 'lala', '123', 'lala', 1),
('auds', '1234', '1998-11-12', 'anwaje@yahoo.com', '0919123456', 'Audrey Waje', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `shipID` int(11) NOT NULL,
  `delivererID` varchar(10) NOT NULL,
  `orderID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipID`, `delivererID`, `orderID`) VALUES
(6, '18-003-000', '180315-0008'),
(1, '2', '23'),
(2, '2', '23'),
(4, '2', '23'),
(5, '2', '23');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_status`
--

CREATE TABLE `shipment_status` (
  `statusID` int(11) NOT NULL,
  `shipID` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_status`
--

INSERT INTO `shipment_status` (`statusID`, `shipID`, `status`, `location`, `date`, `time`) VALUES
(4, 5, 'Scheduled', '', '2017-10-10', '23:28:00.000000'),
(6, 5, 'Forwarded to', 'dsad', '2017-10-10', '23:40:00.000000'),
(7, 6, 'Scheduled', '', '2018-03-15', '11:56:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `stockID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`itemID`, `quantity`, `date`, `stockID`) VALUES
(2, 5, '2018-03-20', '12312333'),
(2, 100, '2018-03-20', '12321312323'),
(2, 10, '2018-03-20', '213123'),
(2, 7, '2018-03-20', '54321'),
(5, 7, '2018-03-20', '12312333'),
(5, 50, '2018-03-20', '12321312323'),
(5, 6, '2018-03-20', '54321'),
(5, 5, '2018-03-20', '9999'),
(5, 10, '2018-03-20', 'abc0192'),
(6, 17, '2018-03-20', '213123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `client_quote`
--
ALTER TABLE `client_quote`
  ADD PRIMARY KEY (`quoteID`),
  ADD KEY `userID` (`userID`,`clientID`);

--
-- Indexes for table `defectiveitems`
--
ALTER TABLE `defectiveitems`
  ADD PRIMARY KEY (`defectID`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`delivererID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`itemID`,`orderID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`itemID`,`quoteID`),
  ADD KEY `itemID` (`itemID`,`quoteID`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`returnID`);

--
-- Indexes for table `sales_agent`
--
ALTER TABLE `sales_agent`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipID`,`orderID`),
  ADD KEY `delivererID` (`delivererID`),
  ADD KEY `orderID` (`orderID`) USING BTREE;

--
-- Indexes for table `shipment_status`
--
ALTER TABLE `shipment_status`
  ADD PRIMARY KEY (`statusID`),
  ADD KEY `ship_id` (`shipID`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`itemID`,`stockID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defectiveitems`
--
ALTER TABLE `defectiveitems`
  MODIFY `defectID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipment_status`
--
ALTER TABLE `shipment_status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
