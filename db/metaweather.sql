-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 03:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metaweather`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `woeid` bigint(20) NOT NULL,
  `title` varchar(64) NOT NULL,
  `location_type` varchar(32) NOT NULL,
  `latt_long` varchar(32) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` varchar(128) NOT NULL,
  `woeid` bigint(20) NOT NULL,
  `weather_state_name` varchar(16) NOT NULL,
  `weather_state_abbr` varchar(4) NOT NULL,
  `wind_direction_compass` varchar(4) NOT NULL,
  `created` datetime NOT NULL,
  `applicable_date` date NOT NULL,
  `min_temp` decimal(10,5) NOT NULL,
  `max_temp` decimal(10,5) NOT NULL,
  `the_temp` decimal(10,5) NOT NULL,
  `wind_speed` decimal(10,5) NOT NULL,
  `wind_direction` decimal(10,5) NOT NULL,
  `air_pressure` decimal(10,1) NOT NULL,
  `humidity` int(11) NOT NULL,
  `visibility` decimal(10,5) NOT NULL,
  `predictability` int(11) NOT NULL,
  `submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`woeid`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `woeid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1047379;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
