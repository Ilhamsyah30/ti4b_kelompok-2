-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2024 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PERPUSTAKAAN_TI4B`
--

-- --------------------------------------------------------

--
-- Table structure for table `TBL_BOOKS`
--

CREATE TABLE `TBL_BOOKS` (
  `Id_Book` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `PublicationYear` year(4) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `Status` enum('Available','Reserved','Lost') NOT NULL DEFAULT 'Available',
  `RackLocation` enum('Rack 1','Rack 2','Rack 3','Rack 4') NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `NumberOfCopies` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TBL_BOOKS`
--

INSERT INTO `TBL_BOOKS` (`Id_Book`, `Title`, `Author`, `Publisher`, `PublicationYear`, `Genre`, `Status`, `RackLocation`, `ISBN`, `NumberOfCopies`) VALUES
(1, 'Belajar Deep Learning', 'Fajar Alpayet', 'PT.Sewu', '2018', 'Learning', 'Available', 'Rack 1', '000001', 10),
(2, 'Belajar Machine Learning', 'Muhammad Reza', 'PT.Agung SejahTera', '2017', 'Learning', 'Available', 'Rack 2', '000002', 10);

-- --------------------------------------------------------

--
-- Table structure for table `TBL_MEMBER`
--

CREATE TABLE `TBL_MEMBER` (
  `Id_Member` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `JoinDate` date NOT NULL,
  `MembershipStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `YearOfStudy` int(12) NOT NULL,
  `StudyProgram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TBL_MEMBER`
--

INSERT INTO `TBL_MEMBER` (`Id_Member`, `NIM`, `FullName`, `DateOfBirth`, `Gender`, `Email`, `PhoneNumber`, `Address`, `JoinDate`, `MembershipStatus`, `YearOfStudy`, `StudyProgram`) VALUES
(1, 101024401, 'Ilham Andriansyah', '2002-06-30', 'Male', 'ilham.andri30@gmail.com', 857232791, 'jalan.katapang andir', '2024-07-12', 'Active', 2022, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `TBL_TRANSACTION`
--

CREATE TABLE `TBL_TRANSACTION` (
  `Id_Transaction` int(11) NOT NULL,
  `Id_Member` int(11) NOT NULL,
  `Id_Book` int(11) NOT NULL,
  `BorrowDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `Status` enum('Borrowed','Returned','Overdue') NOT NULL,
  `Id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TBL_TRANSACTION`
--

INSERT INTO `TBL_TRANSACTION` (`Id_Transaction`, `Id_Member`, `Id_Book`, `BorrowDate`, `DueDate`, `ReturnDate`, `Status`, `Id_User`) VALUES
(1, 1, 1, '2024-07-12', '2024-07-26', '2024-07-19', 'Borrowed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TBL_USER`
--

CREATE TABLE `TBL_USER` (
  `Id_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Level` enum('Admin','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TBL_USER`
--

INSERT INTO `TBL_USER` (`Id_User`, `Username`, `Password`, `FullName`, `Photo`, `Level`) VALUES
(1, 'Admin', 'Admin', 'Admin', '', 'Admin'),
(2, 'Member', 'Member', 'Membership', '', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TBL_BOOKS`
--
ALTER TABLE `TBL_BOOKS`
  ADD PRIMARY KEY (`Id_Book`);

--
-- Indexes for table `TBL_MEMBER`
--
ALTER TABLE `TBL_MEMBER`
  ADD PRIMARY KEY (`Id_Member`);

--
-- Indexes for table `TBL_TRANSACTION`
--
ALTER TABLE `TBL_TRANSACTION`
  ADD PRIMARY KEY (`Id_Transaction`),
  ADD KEY `Id_Member` (`Id_Member`),
  ADD KEY `Id_Book` (`Id_Book`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `TBL_USER`
--
ALTER TABLE `TBL_USER`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TBL_BOOKS`
--
ALTER TABLE `TBL_BOOKS`
  MODIFY `Id_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `TBL_MEMBER`
--
ALTER TABLE `TBL_MEMBER`
  MODIFY `Id_Member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TBL_TRANSACTION`
--
ALTER TABLE `TBL_TRANSACTION`
  MODIFY `Id_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TBL_USER`
--
ALTER TABLE `TBL_USER`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TBL_TRANSACTION`
--
ALTER TABLE `TBL_TRANSACTION`
  ADD CONSTRAINT `Id_Book` FOREIGN KEY (`Id_Book`) REFERENCES `TBL_BOOKS` (`Id_Book`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Member` FOREIGN KEY (`Id_Member`) REFERENCES `TBL_MEMBER` (`Id_Member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_User` FOREIGN KEY (`Id_User`) REFERENCES `TBL_USER` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
