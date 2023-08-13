-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 10:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client_contact_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `client_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `description`, `type`, `client_code`) VALUES
(1, 'penda', 'he love programming', 'expert', 'AAA001'),
(2, 'penda', 'he love programming', 'expert', 'AAA002'),
(3, 'Information Technology (IT)', 'kgggh', 'kkk', 'AAA003'),
(4, 'GRADE 12 CERTIFICATE', 'll', 'kk', 'AAA004'),
(5, 'Johannes Ando Pendapala ', 'kkk', 'kkk', 'AAA005'),
(6, 'sselma', 'ghgt', 'hhb', 'AAA006'),
(7, 'momycc', 'ggc', 'x', 'AAA007'),
(8, 'hilma', 'mfd', 'tgr', 'AAA008'),
(9, 'hilma', 'mfd', 'tgr', 'AAA009'),
(10, 'martha', 'gwedhiindje', 'frt', 'AAA010'),
(11, 'martha', 'gwedhiindje', 'frt', 'AAA011'),
(12, 'martha', 'gwedhiindje', 'frt', 'AAA012'),
(13, 'martha', 'gwedhiindje', 'frt', 'AAA013'),
(14, 'Dian', 'my sister', 'general', 'AAA014');

-- --------------------------------------------------------

--
-- Table structure for table `client_contact_links`
--

CREATE TABLE `client_contact_links` (
  `id` int(11) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_contact_links`
--

INSERT INTO `client_contact_links` (`id`, `client_id`, `contact_id`) VALUES
(9, 1, 1),
(8, 1, 10),
(10, 4, 7),
(11, 4, 8),
(5, 8, 1),
(2, 8, 5),
(3, 8, 7),
(4, 8, 8),
(1, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `surname`, `email`) VALUES
(1, 'selma', 'ntinda', 'sek@gmail.com'),
(5, 'Johannes Ando Pendapala Ntinda', 'Ando', 'selmakristof@gmail.com'),
(7, 'Johannes Ando Pendapala Ntinda', 'Andokl', 'selmakristokf@gmail.com'),
(8, 'saija', 'krtak\"', 'selmakristkof@gmail.com'),
(10, 'cope', 'done', 'don@gmail.com'),
(11, 'petrus', 'pamwe', 'zip@gmail.com'),
(12, 'brother', 'ben', 'ben@gmail.com'),
(13, 'big', 'bp', 'bp@hotmaul.com'),
(14, 'petrusj', 'donejo', 'zipo@gmail.com'),
(15, 'tangi', 'tega', 'tangi@gmail.com'),
(16, 'face', 'one', 'zip2@gmail.com'),
(17, 'carel', 'ntinda', 'carel@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_code` (`client_code`);

--
-- Indexes for table `client_contact_links`
--
ALTER TABLE `client_contact_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_link` (`client_id`,`contact_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_contact_links`
--
ALTER TABLE `client_contact_links`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
