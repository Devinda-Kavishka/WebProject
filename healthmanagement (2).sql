-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2025 at 08:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `therapist_name` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `therapist_name`, `appointment_date`, `appointment_time`, `created_at`) VALUES
(1, 'therapist3', '2025-08-19', '15:30:00', '2025-08-19 07:11:57'),
(2, 'therapist1', '2025-08-20', '09:00:00', '2025-08-19 07:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Name` varchar(100) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Name`, `Surname`, `Email`, `Message`) VALUES
('Devinda', 'Kavishka', 'dewinda@aitbs.biz', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `service` varchar(100) NOT NULL,
  `inquiry` text NOT NULL,
  `Response` text NOT NULL,
  `status` enum('pending','in_progress','responded') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `email`, `service`, `inquiry`, `Response`, `status`) VALUES
(1, 'Bogodage Devinda Kavishka', 'devindakavishka23@mail.com', 'Yoga', 'I need session another time', 'Ok Theraspist is approved', 'responded'),
(3, 'Bogodage Deshan Kaushika', 'deshankaushika97@gmail.com', 'Meditation', 'Test', 'ok', 'responded'),
(4, 'Boodage Devinda Kavishka', 'kavishka.yogo@gmail.com', 'Meditation', 'I need change theraoist', 'ok', 'responded'),
(5, 'Boodage Devinda Kavishka', 'kavishka.yogo@gmail.com', 'Yoga', 'I need date Change', 'ok i will check', 'responded');

-- --------------------------------------------------------

--
-- Table structure for table `service_register`
--

CREATE TABLE `service_register` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` int(20) NOT NULL,
  `service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_register`
--

INSERT INTO `service_register` (`id`, `full_name`, `email`, `contact`, `service`) VALUES
(1, 'dewinda@aitbs.biz', 'dewinda@aitbs.biz', 761240025, 'Yoga'),
(2, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 750439277, 'Meditation'),
(3, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Yoga'),
(4, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Fitness'),
(5, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Fitness'),
(6, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Yoga'),
(7, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Meditation'),
(8, 'Bogodage Yohan Avishka', 'deshankaushika97@gmail.com', 761240025, 'Yoga'),
(9, 'Bogodage Devinda Kavishka', 'Devindadewinda@aitbs.biz', 761240025, 'Counseling'),
(10, 'Bogodage Devinda Kavishka', 'Devindadewinda@aitbs.biz', 761240025, 'Meditation'),
(11, 'Bogodage Devinda Kavishka', 'Devindadewinda@aitbs.biz', 76124002, 'Yoga');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('user','Therapist','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `contact`, `password`, `usertype`) VALUES
(1, 'Deshan', 'deshankaushika97@gmail.com', '0770298597', '7890', 'Therapist'),
(2, 'Deshan', 'deshankaushika97@gmail.com', '0770298597', '7890', 'Therapist'),
(3, 'yohan', 'yohan23@gmail.com', '0770298597', '7890', 'admin'),
(4, 'yohan', 'yohan23@gmail.com', '0770298597', '7890', 'admin'),
(5, 'Devinda kavishka', 'Devinda@gmail.com', '0750439277', '7890', 'user'),
(6, 'Devinda kavishka', 'Devinda@gmail.com', '0750439277', '7890', 'user'),
(10, 'Anjana', 'kavishka.yogo@gmail.com', '0750439277', '789000', 'user'),
(11, 'Lakshan Vithanage', 'lakshan23@gmail.com', '0785988849', '123456', 'Therapist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_register`
--
ALTER TABLE `service_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_register`
--
ALTER TABLE `service_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
