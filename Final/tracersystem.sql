-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 07:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `addgrad`
--

CREATE TABLE `addgrad` (
  `id` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `yeargraduate` varchar(255) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addgrad`
--

INSERT INTO `addgrad` (`id`, `name`, `gender`, `course`, `yeargraduate`, `addres`, `username`, `password`) VALUES
(NULL, '', '', 'BSIT', '', 'Brgy.Capaclan Romblon, Romblon', '', ''),
(NULL, 'jake mortos', 'Male', 'BSIT', '2021', 'Brgy.Capaclan Romblon, Romblon', 'jake', 'mortos'),
(NULL, 'Johnny Montero', 'Male', 'BSIT', '2021', 'Brgy. III, Poblacion Romblon, Romblon', 'johnny', 'montero'),
(NULL, 'pampoo', 'male', 'BSIT', '2021', 'Sawang', 'pampoo', 'lutan'),
(NULL, 'Mangaring', 'Male', 'BSBA', '2019', 'Madrona street barangay 3, Romblon, Romblon', 'joel', 'montero'),
(NULL, 'Mangaring', 'Male', 'BSIT', '2021', 'Madrona street barangay 3, Romblon, Romblon', 'johnny', 'montero');

-- --------------------------------------------------------

--
-- Table structure for table `alumniaccount`
--

CREATE TABLE `alumniaccount` (
  `Lname` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Mname` varchar(20) NOT NULL,
  `Age` int(100) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Yeargraduated` varchar(20) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Cnumber` varchar(55) NOT NULL,
  `Job` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Username` varchar(55) NOT NULL,
  `Password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `beed`
--

CREATE TABLE `beed` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `yeargraduate` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `employed` varchar(255) NOT NULL,
  `unemployed` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bsba`
--

CREATE TABLE `bsba` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `yeargraduate` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `employed` varchar(255) NOT NULL,
  `unemployed` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bsed`
--

CREATE TABLE `bsed` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `yeargraduate` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `employed` varchar(255) NOT NULL,
  `unemployed` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bsit`
--

CREATE TABLE `bsit` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `yeargraduate` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `employed` varchar(255) NOT NULL,
  `unemployed` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterlist`
--

CREATE TABLE `masterlist` (
  `id` int(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Cnumber` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Yeargraduate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterlist`
--

INSERT INTO `masterlist` (`id`, `Lname`, `Fname`, `Mname`, `Age`, `Gender`, `Cnumber`, `Address`, `Email`, `Yeargraduate`) VALUES
(4, 'Montero', 'Johnny', 'Mangaring', '33', 'Male', '09093585693', 'Brgy. III, Poblacion Romblon, Romblon', 'johnnymontero4@gmail.com', '2021'),
(5, 'Ibabao', 'Robert', 'Lapus', '25', 'Male', '09093595696', 'Brgy. Sawang Romblon, Romblon', 'robertmababaako@gmail.com', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`id`, `username`, `password`) VALUES
(3, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beed`
--
ALTER TABLE `beed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsba`
--
ALTER TABLE `bsba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsed`
--
ALTER TABLE `bsed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsit`
--
ALTER TABLE `bsit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterlist`
--
ALTER TABLE `masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masterlist`
--
ALTER TABLE `masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
