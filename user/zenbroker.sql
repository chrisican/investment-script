-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2022 at 06:04 AM
-- Server version: 10.3.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenbroker`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id_no` int(11) NOT NULL,
  `wallets` varchar(255) DEFAULT NULL,
  `addresses` varchar(2048) DEFAULT NULL,
  `qrcode` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id_no`, `wallets`, `addresses`, `qrcode`) VALUES
(1, 'BTC', '153ByvKtXyqGw4PCWNKgexYLeM8okSP6j8', 'bitcoinqr.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_no` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_no`, `firstname`, `lastname`, `user_email`, `user_pass`, `address`, `city`, `country`, `phone`, `photo`, `reg_date`) VALUES
(1, 'Zenith', 'Trade', 'admin@zenithbrokertrade.org', '7e58d63b60197ceb55a1c487989a3720', 'Enugu', 'Enugu', 'Australia', '', 'cirrus.png', '2021-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id_no` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `ftxn` varchar(512) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` decimal(19,9) DEFAULT NULL,
  `fproof` varchar(255) DEFAULT NULL,
  `fcomment` varchar(1024) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `request_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id_no`, `user_email`, `ftxn`, `currency`, `amount`, `fproof`, `fcomment`, `status`, `request_date`) VALUES
(100, 'lizescada.eg@gmail.com', 'TXN257278', 'BTC', 0.376915410, NULL, NULL, 'approved', '2022-02-12'),
(104, 'donbaron2334@gmail.com', 'TXN209330', 'BTC', 6.654328000, NULL, NULL, 'approved', '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_no` int(11) NOT NULL,
  `txn` varchar(25) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `package` varchar(512) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT 'USD',
  `duration` varchar(512) DEFAULT '30',
  `interest` decimal(8,2) DEFAULT NULL,
  `role` varchar(512) DEFAULT 'investor',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `transact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_no`, `txn`, `user_email`, `package`, `amount`, `currency`, `duration`, `interest`, `role`, `status`, `transact_date`) VALUES
(12, 'TXN598068', 'user@gmail.com', 'starter', 100.00, 'Bitcoin', '30', 0.10, 'investor', 'pending', '2022-02-04'),
(14, 'TXN712608', 'admin@zenithbrokertrade.org', 'Gold Plus', 100000.00, 'BTC', '365', 0.10, 'investor', 'approved', '2022-02-04'),
(15, 'TXN749289', 'admin@zenithbrokertrade.org', 'Gold Plus', 100000.00, 'BTC', '365', 0.10, 'investor', 'pending', '2022-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_no` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `affid` int(255) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_no`, `firstname`, `lastname`, `user_email`, `user_pass`, `address`, `city`, `country`, `phone`, `photo`, `affid`, `reg_date`) VALUES
(35, 'Daniel', 'John', 'user@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', NULL, NULL, NULL, NULL, NULL, 111111, '2021-12-28'),
(37, 'Baron', 'Pacioty', 'donbaron2334@gmail.com', '8b649262319dd4f032f6f7bb156e10c4', NULL, NULL, NULL, NULL, NULL, 248002, '2022-02-04'),
(38, 'Elizabeth', 'Grigorova', 'lizescada.eg@gmail.com', '9bfae9bb28dcfbfb6a9b9c6f09d2b5c0', NULL, NULL, NULL, NULL, NULL, 332145, '2022-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id_no` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `wtxn` varchar(512) DEFAULT NULL,
  `wcurrency` varchar(255) DEFAULT NULL,
  `wamount` decimal(19,9) DEFAULT NULL,
  `wallet_address` varchar(512) DEFAULT NULL,
  `wstatus` varchar(255) NOT NULL DEFAULT 'pending',
  `withdraw_request_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
