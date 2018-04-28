-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2018 at 06:57 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `OnlinePizzaOrder`
--

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `P_Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Category` varchar(40) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`P_Id`, `Name`, `Category`, `Price`, `Description`, `Image`, `Stock`) VALUES
(1, 'ULTIMATE SUPREME', 'Pizza', 9.99, 'Large round pizza with Pepperoni, Italian Sausage, Mushrooms, Onions and Green Peppers', 'ULTIMATE SUPREME.jpg', 25),
(2, '3 MEAT TREAT', 'Pizza', 8.99, 'Large round pizza with Pepperoni, Italian Sausage and Bacon', '3 MEAT TREAT.jpg', 65);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Email` varchar(40) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Authority` int(2) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Email`, `Username`, `Password`, `Authority`, `Name`, `Phone`, `Address`) VALUES
('123@123.com', '123', '$2y$10$DDfZ16GSwIG3q2QO0A9cKe2UTAH79tB1yRccf48MX6dJr95LpajEq', 0, '123', 123, '123'),
('abc_123@gmail.com', 'abc', '$2y$10$xo/qSvS1p7hZuYaHYZT1X.JI/sT23hRkhQLZ0R.u3v46D1kWfEHia', 0, 'abc', 1234567890, '800 campbell road'),
('temoc@gmail.com', 'temoc', '$2y$10$IN8M3ARXRT9RwyulHo8AbeL5LvjatOY/szJ5VJwztkPaHzO5cfQpK', 0, 'temoc', 1234567890, '800 west coit road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `P_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
