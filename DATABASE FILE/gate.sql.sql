-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineleavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL COMMENT 'Employee ID',
  `ename` varchar(255) NOT NULL COMMENT 'Employee''s Username',
  `descr` varchar(255) NOT NULL COMMENT 'Leave Reason',
  `fromdate` date NOT NULL,
  `exittime` time(0) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `eid`, `ename`, `descr`, `fromdate`, `exittime`, `status`) VALUES
(1, 2, 'Fadhil', 'Other : Demo Test', '2021-07-01', '19:01:09', 'Rejected'),

(3, 4, 'Aswathy', 'Sick : Wont be able to join as I am not feeling well enough! Need to take some rest.', '2021-07-25', '17:01:09', 'Pending'),

(5, 5, 'Nihla', 'Casual : need to spend some time with my family!', '2021-07-26', '09:01:09', 'Pending'),
(6, 6, 'Anagha', 'Sick : I need to Quarantine myself!', '2021-07-26', '19:01:09', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users'

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(20) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `gnmail` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `name`, `password`, `type`, `email`, `gender`, `department`, `year`, `phone`, `gnmail`) VALUES
(9, 'Admin', 'admin', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 'admin', 'liamoore@gmail.com', 'Male', 'HOD', '1', '7458965000', '1222321'),
(7,'Security','security','$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6','security','security@gmail.com','Male','SEC','10','2322122343','3442211321'),
(2, 'Fadhil', 'Fadhil', '$2y$10$NjAyZjNlNTlkOTMyMmIyYejMwaXLwOFJCppILaR0.AmyrNlmO0JS2', 'employee', 'Fadhil@gmail.com', 'Male', 'CSE', '2', '7412589650', '2343222'),
(3, ' Smith', 'johnsmith', '$2y$10$ZTY1NzVmMDJjNDdjYTU5YOCU.DCwg6aozzlER9OJQZOr.ElTfDiEm', 'employee', 'johnns@gmail.com', 'Male', 'MEC', '2', '7458965555', '2232222'),
(4, 'Aswathy KR', 'Aswathy', '$2y$10$ZjU1MWNhNzEzYzE1NDFlNe16xtxBPvyzUvoCDarzc8.0Iy2LuAHcO', 'employee', 'eparker@gmail.com', 'Female', 'CSE', '3', '7890000010', '2322112'),
(5, 'Nihla', 'Nihla', '$2y$10$ODRmZWRiMDVjMjU4MmE4O.o4gd1xaga.DkOqBAkNs8gobYFOD8JNO', 'employee', 'Nihlaj@gmail.com', 'Female', 'CSE-AI', '1', '7458960000', '12111121'),
(6, 'Anagha Menon', 'Anagha', '$2y$10$OTUyYTFlNDg1NTlhMjEwO.Lj4vqVaPWUVdrPZQ8nj2YZ1otkAAI.O', 'employee', 'Anagha@gmail.com', 'Female', 'EEE', '4', '7410256001', '12122322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
