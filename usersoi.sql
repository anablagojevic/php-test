-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 04:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `city`, `street`, `country`) VALUES
(1, 'John', 'Doe', 'New York', 'Wall Street 12', 'USA'),
(2, 'Scarllet', 'Smith', 'England', 'Oxford Street 123', 'London'),
(3, 'Jean', 'Dupont', 'Paris', 'Rue de la Liberte 123', 'France'),
(4, 'Sean', 'Johanson', 'Paris', 'Rue de la Liberte 123', 'France'),
(5, 'Juan', 'Perez', 'Buenos Aires', 'Avenida de Mayo 123', 'Argentina'),
(23, 'Marko', 'Miljkovic', 'Belgrade', 'Nehruova 12', 'Serbia'),
(24, 'Mateja', 'Mastelica', 'Belgrade', 'Ljutice Bogdana 12', 'Serbia'),
(25, 'Max', 'Fischer', 'Munich', 'Berlin Street 123', 'Germany'),
(26, 'Ana', 'Blagojevic', 'Beograd', 'Pere Cetkovica', 'Srbija'),
(27, 'Nina', 'Badric', 'Beograd', 'Resavska 28', 'Srbija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
