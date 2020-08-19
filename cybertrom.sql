-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 08:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybertrom`
--

-- --------------------------------------------------------

--
-- Table structure for table `forminfo`
--

CREATE TABLE `forminfo` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forminfo`
--

INSERT INTO `forminfo` (`id`, `firstname`, `lastname`, `phone`, `address`, `age`, `image`) VALUES
(19, 'marco', 'asensio', '1234567899', 'madrid', 24, 0x4153454e53494f5f333830783530312e6a7067),
(20, 'karim', 'benzema', '8764938271', 'paris', 33, 0x42454e5a454d415f333830783530312e6a7067),
(21, 'dani', 'carvajal', '3652436728', 'madrid', 25, 0x43415256414a414c5f333830783530315468756d622e6a7067),
(22, 'carlos', 'casimiro', '3625614287', 'brazil', 27, 0x434153454d49524f5f333830783530312e6a7067),
(23, 'thibout', 'courtois', '1243645891', 'belgium', 23, 0x434f5552544f49535f333830783530312e6a7067),
(24, 'eden', 'hazard', '7654378291', 'belgium', 25, 0x48415a4152445f333830783530312e6a7067),
(25, 'fransisco', 'isco', '7654364571', 'malaga', 26, 0x4953434f5f333830783530312e6a7067),
(26, 'james', 'rodrigues', '6354829437', 'columbia', 28, 0x4a414d45535f333830783530312e6a7067),
(27, 'toni', 'kross', '8735261736', 'germany', 29, 0x4b524f4f535f333830783530312e6a7067),
(28, 'vieira', 'marcelo', '9876543212', 'brazil', 33, 0x4d415243454c4f5f333830783530312e6a7067),
(29, 'luka', 'modrich', '4663636363', 'crotia', 33, 0x4d4f445249435f333830783530312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'shane', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forminfo`
--
ALTER TABLE `forminfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forminfo`
--
ALTER TABLE `forminfo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
