-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2026 at 08:00 AM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_accounts`
--

CREATE TABLE `register_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_accounts`
--

INSERT INTO `register_accounts` (`id`, `username`, `email`, `password`) VALUES
(1, 'ricajoy30', 'ricajoymasarap@gmail.com', '$2y$10$vu/7OGaEBqd7ZU6dH7rTkeFafe9JRVFJg1mxvUvyYeYhrPelvWQE.'),
(2, 'channelxvince', 'channelquiazon@gmail.com', '$2y$10$hlU5z71dikTHQYSHoo79L.wponSt1/7XifTPc2RvphwbgwnktEsna');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `role`) VALUES
(1, 'Dessire Clair Perez', 'admin', '$2y$10$90MfWVOtnae4RbIZ.GPf1.xOSmabetLQrtYlOrZR4wPunj/S1/64.', 'admin'),
(2, 'Channel Quiazon', 'learner', '$2y$10$FCCRQGYMp7ERZPYfx4CiL.V8cILLxGcfK8G32YO.J.GlNgFmz2C62', 'learner'),
(3, 'Roan Sampang', 'instructor', '$2y$10$KpSFlHB5B/F3ENr1uNOCv.u9EluS9hvDxMjup7TrEGt15Bfo3UaUq', 'instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_accounts`
--
ALTER TABLE `register_accounts`
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
-- AUTO_INCREMENT for table `register_accounts`
--
ALTER TABLE `register_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
