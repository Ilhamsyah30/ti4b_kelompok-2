-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2024 at 10:39 AM
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
-- Database: `perpustakaan_ti4b`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
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
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`Id_Book`, `Title`, `Author`, `Publisher`, `PublicationYear`, `Genre`, `Status`, `RackLocation`, `ISBN`, `NumberOfCopies`) VALUES
(1, 'Belajar Deep Learning', 'Fajar Alpayet', 'PT.Sewu', '2018', 'Learning', 'Available', 'Rack 1', '000001', 7),
(2, 'Belajar Machine Learning', 'Muhammad Reza', 'PT.Agung SejahTera', '2017', 'Learning', 'Available', 'Rack 2', '000002', 9),
(4, 'Buku Memasak', 'Ilham Andriansyah', 'PT.AGUNG Sedayu', '2020', 'Learning', 'Available', 'Rack 1', '111222', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
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
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`Id_Member`, `NIM`, `FullName`, `DateOfBirth`, `Gender`, `Email`, `PhoneNumber`, `Address`, `JoinDate`, `MembershipStatus`, `YearOfStudy`, `StudyProgram`) VALUES
(2, 1, 'Ilham Andriansyah', '2024-07-16', 'Male', '@gmail.com', 857232791, 'jalan.mekar sari', '2024-07-15', 'Active', 2022, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `Id_Transaction` int(11) NOT NULL,
  `Id_Member` int(11) NOT NULL,
  `Id_Book` int(11) NOT NULL,
  `BorrowDate` varchar(30) NOT NULL,
  `DueDate` varchar(30) NOT NULL,
  `ReturnDate` varchar(30) DEFAULT NULL,
  `StatusTransaction` enum('Borrowed','Returned','Overdue') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`Id_Transaction`, `Id_Member`, `Id_Book`, `BorrowDate`, `DueDate`, `ReturnDate`, `StatusTransaction`) VALUES
(2, 2, 1, '16-07-2024', '23-07-2024', '25-07-2024', 'Returned'),
(3, 2, 1, '16-07-2024', '23-07-2024', '17-07-2024', 'Returned'),
(4, 2, 1, '17-07-2024', '14-08-2024', '17-07-2024', 'Returned'),
(5, 2, 1, '07-07-2024', '23-07-2024', NULL, 'Returned'),
(6, 2, 1, '17-07-2024', '24-07-2024', NULL, 'Borrowed'),
(7, 2, 2, '17-07-2024', '24-07-2024', NULL, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Level` enum('Admin','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id_User`, `Username`, `Password`, `FullName`, `Level`) VALUES
(1, 'Admin', '$2y$10$0ytYJF98cGtxAe88cu4B3ekzNYHA1ViwnKGXSDWp00gDwykd.og8.', 'Admin', 'Admin'),
(2, 'Member', 'Member', 'Membership', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`Id_Book`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`Id_Member`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`Id_Transaction`),
  ADD KEY `Id_Member` (`Id_Member`),
  ADD KEY `Id_Book` (`Id_Book`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `Id_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `Id_Member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `Id_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
