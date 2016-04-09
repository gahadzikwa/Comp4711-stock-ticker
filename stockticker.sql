-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 06:51 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `stockdistribution`;
DROP TABLE IF EXISTS `players`;
DROP TABLE IF EXISTS `ci_sessions`;

--
-- Database: `stockticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `Username` varchar(12) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Role` varchar(12) DEFAULT 'player',
  `Cash` int DEFAULT 1000,
  `Avatar` varchar(64) DEFAULT '/assets/images/avatars/default.jpg',
  PRIMARY KEY (Username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Username`, `Password`, `Role`, `Cash`) VALUES
('Mickey', '$2y$10$uuYKSeNSudTSleojm38bseb/FL5c/GTIsRd4xo9eWX36OLrRdU./i', 'Admin', 1000);

-- --------------------------------------------------------


--
-- Table structure for table `stockdistribution`
--

CREATE TABLE IF NOT EXISTS `stockdistribution` (
  `StockCode` VARCHAR(8) NOT NULL,
  `Username` VARCHAR(12) NOT NULL,
  `Certificate` VARCHAR(20) NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (StockCode, Username, Certificate),
  FOREIGN KEY (Username) REFERENCES players(Username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------------------

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


