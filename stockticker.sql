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


-- Drop Tables
DROP TABLE IF EXISTS `transactions`;
DROP TABLE IF EXISTS `movements`;
DROP TABLE IF EXISTS `players`;
DROP TABLE IF EXISTS `stocks`;

--
-- Database: `stockticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Player` varchar(6) DEFAULT NULL,
  `Cash` int(4) DEFAULT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Player`, `Cash`) VALUES
('Mickey', 1000),
('Donald', 3000),
('George', 2000),
('Henry', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Code` varchar(4) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`Code`, `Name`, `Category`, `Value`) VALUES
('BOND', 'Bonds', 'B', 66),
('GOLD', 'Gold', 'B', 110),
('GRAN', 'Grain', 'B', 113),
('IND', 'Industrial', 'B', 39),
('OIL', 'Oil', 'B', 52),
('TECH', 'Tech', 'B', 37);

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE IF NOT EXISTS `movements` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Datetime` varchar(19) DEFAULT NULL,
  `StockID` int NOT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (StockID) REFERENCES stocks(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`Datetime`, `StockID`, `Action`, `Amount`) VALUES
('2016.02.01-09:01:00', 1, 'down', 5),
('2016.02.01-09:01:02', 4, 'div', 5),
('2016.02.01-09:01:04', 5, 'down', 10),
('2016.02.01-09:01:06', 2, 'div', 5),
('2016.02.01-09:01:08', 1, 'up', 20),
('2016.02.01-09:01:10', 2, 'div', 5),
('2016.02.01-09:01:12', 2, 'down', 20),
('2016.02.01-09:01:14', 4, 'div', 10),
('2016.02.01-09:01:16', 5, 'up', 20),
('2016.02.01-09:01:18', 1, 'down', 5),
('2016.02.01-09:01:20', 1, 'up', 5),
('2016.02.01-09:01:22', 1, 'div', 20),
('2016.02.01-09:01:24', 1, 'div', 20),
('2016.02.01-09:01:26', 2, 'div', 20),
('2016.02.01-09:01:28', 4, 'up', 20),
('2016.02.01-09:01:30', 5, 'down', 20),
('2016.02.01-09:01:32', 3, 'down', 20),
('2016.02.01-09:01:34', 1, 'up', 5),
('2016.02.01-09:01:36', 2, 'down', 20),
('2016.02.01-09:01:38', 2, 'down', 20),
('2016.02.01-09:01:40', 6, 'down', 20),
('2016.02.01-09:01:42', 6, 'up', 5),
('2016.02.01-09:01:44', 5, 'up', 20),
('2016.02.01-09:01:46', 1, 'up', 5),
('2016.02.01-09:01:48', 2, 'div', 10),
('2016.02.01-09:01:50', 2, 'down', 5),
('2016.02.01-09:01:52', 2, 'up', 20),
('2016.02.01-09:01:54', 4, 'down', 10),
('2016.02.01-09:01:56', 2, 'div', 20);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `DateTime` varchar(19) DEFAULT NULL,
  `PlayerID` int NOT NULL,
  `StockID` int NOT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (PlayerID) REFERENCES players(ID),
  FOREIGN KEY (StockID) REFERENCES stocks(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`DateTime`, `PlayerID`, `StockID`, `Trans`, `Quantity`) VALUES
('2016.02.01-09:01:00', 2, 1, 'buy', 100),
('2016.02.01-09:01:05', 2, 6, 'sell', 1000),
('2016.02.01-09:01:10', 4, 6, 'sell', 1000),
('2016.02.01-09:01:15', 2, 4, 'sell', 1000),
('2016.02.01-09:01:20', 3, 2, 'sell', 100),
('2016.02.01-09:01:25', 3, 5, 'buy', 500),
('2016.02.01-09:01:30', 4, 2, 'sell', 100),
('2016.02.01-09:01:35', 4, 2, 'buy', 1000),
('2016.02.01-09:01:40', 2, 6, 'buy', 100),
('2016.02.01-09:01:45', 2, 5, 'sell', 100),
('2016.02.01-09:01:50', 2, 6, 'sell', 100),
('2016.02.01-09:01:55', 3, 5, 'buy', 100),
('2016.02.01-09:01:60', 3, 4, 'buy', 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
