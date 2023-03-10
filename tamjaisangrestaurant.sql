-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamjaisangrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(5) NOT NULL,
  `User_name` varchar(50) DEFAULT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(25) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone_number` varchar(10) DEFAULT NULL,
  `User_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `User_name`, `First_name`, `Last_name`, `Password`, `Email`, `Phone_number`, `User_level`) VALUES
(300, 'Soms_s', 'Somjai', 'Suaymak', '25f9e794323b453885f5181f1b624d0b', 'somjai@gmail.com', '0981122333', 'Member'),
(301, 'Nata_m', 'Natee', 'Meesuk', '25f9e794323b453885f5181f1b624d0b', 'Natee@gmail.com', '0981122334', 'Member'),
(302, 'Kamon_s', 'Kamonwan', 'Srichan', '25f9e794323b453885f5181f1b624d0b', 'Kamon@gmail.com', '0983458791', 'Member'),
(303, 'Lalisa_j', 'Lalisa', 'Jaidee', '25f9e794323b453885f5181f1b624d0b', 'Lalisa@gmail.com', '0986624891', 'Member'),
(304, 'Mana_t', 'Mana', 'Thong', '25f9e794323b453885f5181f1b624d0b', 'Mana@gmail.com', '0927162301', 'Member'),
(305, 'Sapan_p', 'Sapan', 'Putaro', '25f9e794323b453885f5181f1b624d0b', 'Sapan@gmail.com', '0855425667', 'Member'),
(306, 'kan_l', 'Kanna', 'Lapadee', '25f9e794323b453885f5181f1b624d0b', 'kanna_l@gmail.com', '0827619876', 'Member'),
(308, 'Pasin_mag', 'Pasin', 'Makrung', 'cda0ed854624a98a0fc6692c023c9441', 'makrung_p@silapkorn.edu', '0811469772', 'Admin'),
(309, 'Test_User', 'Pasin', 'Makrung(M)', '25f9e794323b453885f5181f1b624d0b', 'test@gmail.com', '0877657445', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(5) NOT NULL,
  `First_nameEm` varchar(20) NOT NULL,
  `Last_nameEm` varchar(25) NOT NULL,
  `Image_emp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_nameEm`, `Last_nameEm`, `Image_emp`) VALUES
(63010, 'Chutima', 'Mueanprasat', 'emp03.jpg'),
(63011, 'Sirikorn', 'Auaibangmod', 'emp02.jpg'),
(63012, 'Kiratika', 'Siam-aku', 'emp05.jpg'),
(63013, 'Patchareeporn', 'Saratee', 'emp04.jpg'),
(63014, 'Pasin', 'Makrung', 'emp01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` varchar(10) NOT NULL,
  `FoodName` varchar(20) NOT NULL,
  `FoodType` varchar(20) NOT NULL,
  `Price` int(50) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `FoodName`, `FoodType`, `Price`, `Image`) VALUES
('000', 'Chicken Noodle', 'Noodle', 45, '6.jpg'),
('001', 'Fried noodlewithpork', 'Noodle', 60, '22.jpg'),
('002', 'Red pork over rice', 'Rice', 50, '7.jpg'),
('003', 'Friedchickenoverrice', 'Rice', 50, '21.jpg'),
('004', 'Roastedduckoverrice', 'Rice', 70, '20.jpg'),
('005', 'Fried rice', 'Rice', 40, '19.jpg'),
('006', 'Streamed rice', 'Rice', 20, '18.jpg'),
('007', 'ThaiBasilChicken', 'Rice', 40, '17.jpg'),
('008', 'Pork Noodle', 'Noodle', 45, '16.jpg'),
('009', 'Tom Kha Gai', 'Soup', 45, '15.jpg'),
('010', 'Tom Yum Goong', 'Soup', 45, '14.jpg'),
('011', 'Tom Yum Seafood', 'Soup', 45, '13.jpg'),
('012', 'Seaweed Soup', 'Soup', 35, '12.jpg'),
('013', 'Pork green curry', 'Soup', 80, '4.jpg'),
('014', 'Pork soup', 'Soup', 25, '3.jpg'),
('015', 'Papaya salad', 'Salad', 25, '5.jpg'),
('016', 'Seafood salad', 'Salad', 30, '11.jpg'),
('017', 'Sticky rice', 'Rice', 10, '10.jpg'),
('018', 'Ground pork salad', 'Salad', 35, '9.jpg'),
('019', 'Omelet', 'Egg', 10, '8.jpg'),
('020', 'Egg drop soup', 'Egg', 15, '2.jpg'),
('021', 'Fried egg', 'Egg', 10, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `Order_ID` varchar(20) NOT NULL,
  `Employee_ID` int(5) NOT NULL,
  `Food_ID` varchar(10) NOT NULL,
  `FoodName` varchar(20) NOT NULL,
  `items` int(3) NOT NULL,
  `customer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`Order_ID`, `Employee_ID`, `Food_ID`, `FoodName`, `items`, `customer_ID`) VALUES
('01', 63010, '001', 'Fried noodlewithpork', 3, 309),
('02', 63012, '002', 'Red pork over rice', 1, 302),
('03', 63011, '010', 'Tom Yum Goong', 2, 306),
('04', 63013, '019', 'Omelet', 4, 304),
('05', 63014, '016', 'Seafood salad', 6, 301),
('06', 63014, '005', 'Fried rice', 2, 301);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Food_ID` (`Food_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD CONSTRAINT `foodorder_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  ADD CONSTRAINT `foodorder_ibfk_2` FOREIGN KEY (`Food_ID`) REFERENCES `food` (`Food_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
