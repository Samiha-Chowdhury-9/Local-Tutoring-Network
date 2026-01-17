-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2026 at 11:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltn`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Phone number` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` enum('Tutor','Admin','Student-Guardian') NOT NULL,
  `Status` enum('Active','Pending','Inactive','Blocked') NOT NULL,
  `Created at` datetime NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Gender`, `Phone number`, `Email`, `Password`, `Role`, `Status`, `Created at`, `Subject`) VALUES
(1, 'Rahim Sir', 'Male', '', 'rahim@gmail.com', '1234', 'Tutor', 'Active', '0000-00-00 00:00:00', 'Math'),
(2, 'Karim Sir', 'Male', '', 'karim@gmail.com', '1234', 'Tutor', 'Active', '0000-00-00 00:00:00', 'Physics'),
(3, 'Saima Mam', 'Female', '', 'saima@gmail.com', '1234', 'Tutor', 'Active', '0000-00-00 00:00:00', 'Chemistry'),
(4, 'John Doe', 'Male', '', 'john@gmail.com', '1234', 'Tutor', 'Active', '0000-00-00 00:00:00', 'English'),
(5, 'Mrinmoyee', 'Female', '01553700774', 'test@gmail.com', '1234', 'Student-Guardian', 'Active', '2026-01-17 11:08:01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
