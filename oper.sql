-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 11:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oper`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseparticipants`
--

CREATE TABLE `courseparticipants` (
  `Id` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseparticipants`
--

INSERT INTO `courseparticipants` (`Id`, `ParticipantId`, `CourseId`, `Grade`) VALUES
(15, 5, -1, 0),
(16, 5, -1, 0),
(17, 6, -1, 0),
(18, 6, -1, 0),
(19, 5, 13, 2),
(20, 6, 13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `CreatorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Id`, `Name`, `CreatorId`) VALUES
(13, 'terminieren', 11);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `DateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`Id`, `FirstName`, `LastName`, `DateOfBirth`) VALUES
(5, 'Anne', 'Blume', '2000-01-01'),
(6, 'Christian', 'Deppendorf', '2000-01-01'),
(7, 'Erik', 'Finster', '1986-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Hash` varchar(500) NOT NULL,
  `Salt` varchar(100) NOT NULL,
  `Mail` varchar(500) DEFAULT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  `Token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Hash`, `Salt`, `Mail`, `FirstName`, `LastName`, `DateOfBirth`, `IsAdmin`, `Token`) VALUES
(5, 'TestUser', 'af41d54e9bc6fe876df60851b0750ce5db0335f1f1c0163b967557d74ffe36f4', 'Wed Jun 26, 2019 18:49', 'testmail@example.com', 'Foo', 'Bar-Baz', '1970-01-01', 1, ''),
(11, 'asdf', '95661a28a8e15ae45801720837cc4af9f1d2dfe2d2b8767a1ae24b53f3ca7b07', 'Tue Jul 09, 2019 17:34', 'asdf', 'asdf', 'sdf', '2000-01-01', 0, 'c6a1435b6fa8b539464ea4c4f6e49bc84891c85a52ff2b0a88f75035c6027fffe4b0afa43f341fce5ac85d05c9c96ac55314da0be00b7060907df2aadb18b8b9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseparticipants`
--
ALTER TABLE `courseparticipants`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`ParticipantId`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CreatorId` (`CreatorId`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseparticipants`
--
ALTER TABLE `courseparticipants`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
