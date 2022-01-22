-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 06:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market place`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditorcomment`
--

CREATE TABLE `auditorcomment` (
  `commentID` int(11) NOT NULL,
  `auditorID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditorcomment`
--

INSERT INTO `auditorcomment` (`commentID`, `auditorID`, `clientID`, `adminID`, `comment`) VALUES
(60, 38, 6, 7, 'auditor is here'),
(61, 38, 1, 7, 'auditor is here'),
(62, 38, 6, 7, 'hellooo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatID` int(11) NOT NULL,
  `Fromm` int(11) NOT NULL,
  `Too` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `State` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ChatID`, `Fromm`, `Too`, `Message`, `Time`, `State`) VALUES
(48, 1, 7, 'i am client', '10:44:23', 0),
(50, 7, 1, 'i am admin 1', '10:46:27', 1),
(54, 7, 1, 'i am omar admin', '10:53:40', 1),
(55, 7, 1, 'hello', '10:55:39', 1),
(56, 7, 1, 'i am admin 1', '10:59:22', 1),
(57, 1, 7, 'ana mariam', '11:02:35', 0),
(59, 1, 7, 'ana mariam', '11:03:21', 0),
(61, 6, 7, 'i have a question please !!', '03:53:19', 0),
(62, 38, 1, 'surveyform.php', '05:17:04', 1),
(63, 38, 1, 'surveyform.php', '08:09:50', 1),
(64, 38, 6, 'surveyform.php', '08:11:39', 1),
(66, 38, 39, 'Misbehaviour happened from AdminID 7 !!!', '08:59:42', 1),
(68, 39, 39, 'Misbehaviour happened from AdminID 7 !!!', '09:28:00', 1),
(69, 38, 39, 'Misbehaviour happened from AdminID 7 !!!', '04:52:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderarray`
--

CREATE TABLE `orderarray` (
  `arrayID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderarray`
--

INSERT INTO `orderarray` (`arrayID`, `OrderID`, `ProductID`, `Quantity`, `Size`) VALUES
(152, 137, 13, 2, 'Small'),
(154, 140, 9, 2, 'Small'),
(155, 145, 13, 2, 'Small'),
(156, 147, 9, 1, 'Small'),
(157, 148, 10, 3, 'Medium'),
(158, 149, 13, 2, 'Medium'),
(160, 156, 12, 2, 'Medium'),
(162, 157, 9, 1, 'Small'),
(163, 158, 13, 1, 'Small'),
(164, 163, 11, 2, 'Small'),
(165, 163, 9, 3, 'Small'),
(166, 166, 10, 1, 'Small'),
(167, 190, 9, 2, 'Small'),
(169, 210, 13, 3, 'Small'),
(170, 211, 13, 1, 'Small'),
(171, 212, 9, 2, 'Medium'),
(172, 216, 13, 2, 'Small');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`) VALUES
(130, 6),
(131, 6),
(132, 6),
(133, 6),
(134, 6),
(135, 1),
(136, 1),
(137, 6),
(138, 1),
(139, 6),
(140, 6),
(141, 6),
(142, 1),
(143, 6),
(144, 1),
(145, 6),
(146, 6),
(147, 6),
(148, 6),
(149, 6),
(150, 6),
(151, 6),
(152, 6),
(153, 6),
(154, 6),
(155, 6),
(156, 1),
(157, 1),
(158, 6),
(159, 6),
(160, 7),
(161, 7),
(162, 7),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 6),
(211, 59),
(212, 59),
(213, 59),
(214, 59),
(215, 59),
(216, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Fabric` varchar(100) NOT NULL,
  `AverageRate` decimal(10,0) NOT NULL,
  `Stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Category`, `Price`, `Amount`, `Description`, `Fabric`, `AverageRate`, `Stock`) VALUES
(9, 'black sweater', 'shirt', '400', 100, 'wearable fashionable daily sweater!', '%83-VISCOSE %12-POLYESTER ', '0', 1),
(10, 'Crew Neck Istanbul Printed Short Sleeve Cotton T-Shirt', 'shirt', '300', 50, 'printed t-shirt for summer vibes', 'Single Jersey', '0', 1),
(11, 'Crew Neck Istanbul P', 'shirt', '250', 30, 'V Neck Short Sleeve Basic Cotton Men T-Shirt', 'MAIN FABRIC %100-COTTON', '0', 1),
(12, '779 Regular Fit Men Jeans', 'jacket', '700', 30, 'From combed cotton fabric short sleeved T-Shirt', 'MAIN FABRIC %100-COTTON', '0', 1),
(13, 'Maroon mid-length dress', 'dress', '799', 40, 'Basic everyday dress', 'MAIN FABRIC %98-POLYESTER %2-ELASTANE', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `ImageID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`ImageID`, `productID`, `image`) VALUES
(11, 9, 'product images/WhatsApp Image 2022-01-17 at 10.51.18 PM.jpeg'),
(12, 10, 'product images/WhatsApp Image 2022-01-17 at 10.51.21 PM.jpeg'),
(13, 11, 'product images/WhatsApp Image 2022-01-17 at 10.51.20 PM(2).jpeg'),
(14, 12, 'product images/WhatsApp Image 2022-01-17 at 10.51.23 PM(2).jpeg'),
(15, 13, 'product images/WhatsApp Image 2022-01-17 at 10.51.22 PM(4).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Review` varchar(100) NOT NULL,
  `reviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`ProductID`, `UserID`, `Review`, `reviewID`) VALUES
(13, 6, 'wowww!!!!', 13),
(9, 1, 'very nice materail !!', 14),
(9, 6, 'WOOOWW!!', 15),
(11, 1, 'amazing shirt !!', 16),
(13, 59, 'Very Nice Dress', 18),
(13, 1, 'I loves THISS DRESS!!', 19);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ReceiptID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `DateOfOrder` date NOT NULL,
  `ShippingDate` date NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ReceiptID`, `OrderID`, `DateOfOrder`, `ShippingDate`, `TotalPrice`) VALUES
(100, 130, '2022-01-10', '2022-01-15', 2151),
(101, 131, '2022-01-10', '2022-01-15', 2255),
(102, 133, '2022-01-10', '2022-01-15', 902),
(103, 134, '2022-01-10', '2022-01-15', 2151),
(104, 135, '2022-01-13', '2022-01-18', 902),
(105, 136, '2022-01-17', '2022-01-22', 150),
(106, 137, '2022-01-17', '2022-01-22', 1598),
(107, 138, '2022-01-18', '2022-01-23', 2498),
(108, 140, '2022-01-18', '2022-01-23', 800),
(109, 145, '2022-01-18', '2022-01-23', 1598),
(110, 146, '2022-01-18', '2022-01-23', 0),
(111, 147, '2022-01-18', '2022-01-23', 400),
(112, 148, '2022-01-18', '2022-01-23', 900),
(113, 149, '2022-01-18', '2022-01-23', 1598),
(114, 156, '2022-01-19', '2022-01-24', 1700),
(115, 157, '2022-01-19', '2022-01-24', 1000),
(116, 158, '2022-01-19', '2022-01-24', 799),
(117, 163, '2022-01-21', '2022-01-26', 1700),
(118, 164, '2022-01-21', '2022-01-26', 0),
(119, 165, '2022-01-21', '2022-01-26', 0),
(120, 166, '2022-01-21', '2022-01-26', 300),
(121, 167, '2022-01-21', '2022-01-26', 0),
(122, 168, '2022-01-21', '2022-01-26', 0),
(123, 169, '2022-01-21', '2022-01-26', 0),
(124, 170, '2022-01-21', '2022-01-26', 0),
(125, 171, '2022-01-21', '2022-01-26', 0),
(126, 172, '2022-01-21', '2022-01-26', 0),
(127, 173, '2022-01-21', '2022-01-26', 0),
(128, 174, '2022-01-21', '2022-01-26', 0),
(129, 175, '2022-01-21', '2022-01-26', 0),
(130, 176, '2022-01-21', '2022-01-26', 0),
(131, 177, '2022-01-21', '2022-01-26', 0),
(132, 178, '2022-01-21', '2022-01-26', 0),
(133, 179, '2022-01-21', '2022-01-26', 0),
(134, 180, '2022-01-21', '2022-01-26', 0),
(135, 181, '2022-01-21', '2022-01-26', 0),
(136, 182, '2022-01-21', '2022-01-26', 0),
(137, 183, '2022-01-21', '2022-01-26', 0),
(138, 184, '2022-01-21', '2022-01-26', 0),
(139, 185, '2022-01-21', '2022-01-26', 0),
(140, 186, '2022-01-21', '2022-01-26', 0),
(141, 187, '2022-01-21', '2022-01-26', 0),
(142, 188, '2022-01-21', '2022-01-26', 0),
(143, 189, '2022-01-21', '2022-01-26', 0),
(144, 190, '2022-01-21', '2022-01-26', 800),
(145, 191, '2022-01-21', '2022-01-26', 0),
(146, 192, '2022-01-21', '2022-01-26', 0),
(147, 193, '2022-01-21', '2022-01-26', 0),
(148, 194, '2022-01-21', '2022-01-26', 0),
(149, 195, '2022-01-21', '2022-01-26', 0),
(150, 196, '2022-01-21', '2022-01-26', 0),
(151, 197, '2022-01-21', '2022-01-26', 0),
(152, 198, '2022-01-21', '2022-01-26', 0),
(153, 199, '2022-01-21', '2022-01-26', 0),
(154, 200, '2022-01-21', '2022-01-26', 0),
(155, 201, '2022-01-21', '2022-01-26', 300),
(156, 202, '2022-01-21', '2022-01-26', 0),
(157, 203, '2022-01-21', '2022-01-26', 0),
(158, 204, '2022-01-21', '2022-01-26', 0),
(159, 205, '2022-01-21', '2022-01-26', 0),
(160, 206, '2022-01-21', '2022-01-26', 0),
(161, 207, '2022-01-21', '2022-01-26', 0),
(162, 208, '2022-01-21', '2022-01-26', 0),
(163, 209, '2022-01-21', '2022-01-26', 0),
(164, 210, '2022-01-21', '2022-01-26', 2397),
(165, 211, '2022-01-22', '2022-01-27', 799),
(166, 212, '2022-01-22', '2022-01-27', 800),
(167, 213, '2022-01-22', '2022-01-27', 0),
(168, 214, '2022-01-22', '2022-01-27', 0),
(169, 215, '2022-01-22', '2022-01-27', 0),
(170, 216, '2022-01-22', '2022-01-27', 1598);

-- --------------------------------------------------------

--
-- Table structure for table `requested_products`
--

CREATE TABLE `requested_products` (
  `RequestedID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductName` varchar(20) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `ProductLink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_products`
--

INSERT INTO `requested_products` (`RequestedID`, `UserID`, `ProductName`, `Picture`, `ProductLink`) VALUES
(2, 1, 'nike shoes', 'requested/ship.jfif', 'https://www.nike.com/eg/'),
(3, 1, 'nike shoes', 'requested/ship.jfif', 'https://www.nike.com/eg/'),
(4, 1, 'nike shoes', 'requested/ship.jfif', 'https://www.nike.com/eg/'),
(5, 6, 'nike shoes', 'requested/ship.jfif', 'https://www.nike.com/eg/');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `ProductID`) VALUES
(9, 'mariam', 3, 'Perfecctt !!!', 1642797803, 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `surveyID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `purchase` varchar(100) NOT NULL,
  `usagee` varchar(100) NOT NULL,
  `firstuse` varchar(100) NOT NULL,
  `satisfiction` varchar(100) NOT NULL,
  `customerservice` varchar(100) NOT NULL,
  `problems` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`surveyID`, `clientID`, `quality`, `purchase`, `usagee`, `firstuse`, `satisfiction`, `customerservice`, `problems`) VALUES
(2, 1, 'Importnant', 'Very Importnant', 'Somewhat Importnant', 'Not Importnant', 'Satisfied', 'No', 'No,the problem was not resolved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `ProfilePicture` varchar(100) NOT NULL,
  `RoleType` int(5) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `AverageRate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Address`, `Password`, `Gender`, `DateOfBirth`, `ProfilePicture`, `RoleType`, `Email`, `Phone`, `AverageRate`) VALUES
(1, 'Mariam', 'Ismail', 'Giza', '123', 'female', '2001-02-15', 'images/pexels-mart-production-9558574.jpg', 1, 'mariam@gmail.com', '0100122372', '0'),
(6, 'Rana', 'Ismail', 'Gize', 'rana123', 'female', '1999-06-11', 'images/0ef8b33bd056c77d4df2ca0efeffd1d5.jpg', 1, 'rana@gmail.com', '01144352269', '0'),
(7, 'Omar', 'Alaa', 'Aswan', 'omar123', 'male', '1999-09-12', 'images/gym.png', 2, 'omar@gmail.com', '01016633884', '0'),
(33, 'kiro', 'khairy', 'giza', 'kirokiro', 'male', '2001-02-22', 'images/images.jpg', 1, 'kiro@gmail.com', '345678', '0'),
(38, 'aly', 'khairy', 'aswan', 'alyaly', 'male', '2001-02-16', 'images/images.jpg', 4, 'aly@gmail.com', '01001227327', '0'),
(39, 'Bahaa', 'Mostafa', 'Alexandria', 'bahaaba', 'male', '2001-05-07', 'images/download.png', 3, 'bahaa@gamil.com', '01016633884', '0'),
(48, 'bakr', 'ahmed', 'new cairo', 'bakrbakr', 'male', '2001-12-21', 'images/mariam1.jpg', 1, 'bakr@gmail.com', '01001227327', '0'),
(59, 'mostafa', 'ismail', 'giza', 'mostafa', 'male', '2001-03-28', 'images/fghj.jpg', 1, 'mostafa@gmail.com', '01001227327', '0');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `RoleID` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`RoleID`, `role`) VALUES
(1, 'client'),
(2, 'admin'),
(3, 'hr'),
(4, 'auditor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditorcomment`
--
ALTER TABLE `auditorcomment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `auditorID` (`auditorID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`),
  ADD KEY `chat_ibfk_2` (`Fromm`),
  ADD KEY `chat_ibfk_3` (`Too`);

--
-- Indexes for table `orderarray`
--
ALTER TABLE `orderarray`
  ADD PRIMARY KEY (`arrayID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ReceiptID`);

--
-- Indexes for table `requested_products`
--
ALTER TABLE `requested_products`
  ADD PRIMARY KEY (`RequestedID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`surveyID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditorcomment`
--
ALTER TABLE `auditorcomment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orderarray`
--
ALTER TABLE `orderarray`
  MODIFY `arrayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `requested_products`
--
ALTER TABLE `requested_products`
  MODIFY `RequestedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditorcomment`
--
ALTER TABLE `auditorcomment`
  ADD CONSTRAINT `auditorcomment_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `auditorcomment_ibfk_2` FOREIGN KEY (`auditorID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `auditorcomment_ibfk_3` FOREIGN KEY (`clientID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`Fromm`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`Too`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderarray`
--
ALTER TABLE `orderarray`
  ADD CONSTRAINT `orderarray_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderarray_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `product_review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `requested_products`
--
ALTER TABLE `requested_products`
  ADD CONSTRAINT `requested_products_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
