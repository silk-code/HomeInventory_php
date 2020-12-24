-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2020 at 02:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `description`) VALUES
(1, 'Produce'),
(2, 'Canned food'),
(3, 'Pasta'),
(4, 'Grains'),
(5, 'Dry beans'),
(6, 'Condiments'),
(7, 'Dairy'),
(8, 'Meat'),
(9, 'Poultry'),
(10, 'Eggs'),
(11, 'Snacks'),
(12, 'Candy'),
(13, 'Bread'),
(14, 'Pastries'),
(15, 'Nuts'),
(16, 'Non-food');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `isPerishable` tinyint(1) NOT NULL DEFAULT 0,
  `Note` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `categoryID`, `description`, `isPerishable`, `Note`) VALUES
(43, 12, 'chocolate', 0, ''),
(44, 1, 'Orange', 1, ''),
(45, 11, 'Corn chips', 0, ''),
(46, 1, 'Cabbage', 0, ''),
(47, 1, 'Orange', 0, ''),
(48, 8, 'Beef', 1, 'use by thursday or freeze'),
(49, 11, 'Corn chips', 0, ''),
(50, 7, 'Whole Milk', 0, ''),
(51, 16, 'Tide pods', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `description`) VALUES
(1, 'Pantry'),
(2, 'Fridge'),
(3, 'Freezer');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `conUnit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitID`, `description`, `conUnit`) VALUES
(1, 'Item', 'item'),
(2, 'Ounce', 'oz'),
(3, 'Pound', 'lb'),
(4, 'Kilogram', 'kg'),
(5, 'Gram', 'g'),
(6, 'Mililiters', 'ml');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `encrPassword` varchar(200) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `encrPassword`, `name`, `email`) VALUES
(6, 'CutiePieQueen112', 'encr7865', 'Sharon', 'iamthebest@ur.not'),
(8, 'Chocolate', 'encrcake', 'Chocolate Cake', 'choccake@bestcakes.com'),
(9, 'admin', 'encr12345', 'admin', 'admin@admin.com'),
(10, 'newUser', 'encr12345', 'mine', 'mine@u.com');

-- --------------------------------------------------------

--
-- Table structure for table `useritem`
--

CREATE TABLE `useritem` (
  `userItemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `unitID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useritem`
--

INSERT INTO `useritem` (`userItemID`, `userID`, `itemID`, `locationID`, `QTY`, `unitID`) VALUES
(15, 8, 44, 2, 2, 3),
(16, 8, 45, 2, 2, 3),
(17, 9, 46, 2, 2, 3),
(18, 8, 47, 1, 10, 1),
(19, 8, 48, 2, 2, 3),
(20, 8, 49, 1, 1, 1),
(21, 8, 50, 3, 4, 1),
(22, 8, 51, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `FK_category_item` (`categoryID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `useritem`
--
ALTER TABLE `useritem`
  ADD PRIMARY KEY (`userItemID`),
  ADD KEY `FK_user_userItem` (`userID`),
  ADD KEY `FK_item_userItem` (`itemID`),
  ADD KEY `FK_location_userItem` (`locationID`),
  ADD KEY `FK_unit_userItem` (`unitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `useritem`
--
ALTER TABLE `useritem`
  MODIFY `userItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_category_item` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `useritem`
--
ALTER TABLE `useritem`
  ADD CONSTRAINT `FK_item_userItem` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `FK_location_userItem` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `FK_unit_userItem` FOREIGN KEY (`unitID`) REFERENCES `unit` (`unitID`),
  ADD CONSTRAINT `FK_user_userItem` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
