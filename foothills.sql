-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 06:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foothills`
--

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ID` int(11) NOT NULL,
  `RECEIPT_NO` int(100) NOT NULL,
  `RECEIPT_DATE` date NOT NULL,
  `STUDENT_NAME` varchar(255) NOT NULL,
  `AMOUNT` int(255) NOT NULL,
  `PAID_BY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_class` varchar(15) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_contact` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_class`, `date_of_birth`, `gender`, `parent_name`, `parent_contact`, `created_at`, `updated_at`) VALUES
(2, 'Emmanuel Amoako', 'Bs 2', '2010-02-07', 'Female', 'Akosua owusuaa', 246932479, '2023-09-24 21:20:27', NULL),
(4, 'Emmanuel', 'Amoako', '2023-09-15', 'Male', 'kofi', 246746579, '2023-09-26 08:42:01', NULL),
(5, 'Amoako', 'Amoako', '2020-01-13', 'Male', 'kofi', 246746579, '2023-09-26 08:49:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(15, 'Emmanuel', 'Amoako', 'abigail@gmail.com', '0545933790', '2023-09-25 19:23:06', NULL),
(16, 'Juliana', 'Asante', 'abigail@gmail.com', '0241045549', '2023-09-25 19:23:13', NULL),
(19, 'Emmanuel', 'Oppong', 'oppong@gmail.com', '02462245678', '2023-09-26 08:23:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '3333', '$2y$10$dd8hIBiZeFLr9cX3iYTLm.hNynKA3fCbAVbn9F8THUpCwiIL4Z5TW'),
(2, '3333', '$2y$10$5uG0YuhfVHDwJmJNMDS.EO80WIGgIcJk8W7djpSTg51CABWuns.dK'),
(3, 'supremo1', '$2y$10$6Q5cZXY8IKIJpKo65qyWj.D65MZIn.f82ftO9nHHgkvqjQv4ubp1G'),
(4, '1111', '$2y$10$7yE/8u8NLh3Ye1dGBmJQXOO4qzN0OElxdIutVc0wsTNKVreWmtW02'),
(5, '1111', '$2y$10$.1RXNjwpdZuKVIBqxBX0Lu3tADEWB1Qcnw6teWxunzO0sRM7h6bay'),
(6, '1111', '$2y$10$X4fFW3BgKmUSeqTFapZlw.wY5ePRTqzCnjD62bBkkA1OBiJZHONxS'),
(7, '1111', '$2y$10$pjStJB8XMbMVUNIdx6im3OCzaYNKIC3M8nfN7dsKjyXBZabWgYefy'),
(8, '1111', '$2y$10$hsWvMZiehavWPPHJnvMP3eLpLZJJET4iMJTiGx4TCSiiPA6MtMumS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
