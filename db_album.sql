-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 10:22 AM
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
-- Database: `db_album`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `album_cover` varchar(255) NOT NULL,
  `album_release` int(11) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_cover`, `album_release`, `artist`, `genre`) VALUES
(1, 'MULTIVERSES', 'Feast_-_Multiverses.jpeg', 2017, 1, 5),
(2, 'Lelaku', '1200x1200bf-60.jpg', 2015, 3, 1),
(4, 'ATTUNE', 'lenka-attune-Cover-Art.jpg', 2017, 5, 1),
(5, 'Pandai Besi', 'artworks-000049229103-nkgfs7-t500x500.jpg', 2007, 6, 1),
(6, 'American Teen', 'Khalid_-_American_Teen.png', 2017, 4, 2),
(7, 'Dunia Batas', 'Duniabatas.jpg', 2014, 2, 1),
(9, 'Di Kala Senja', 'god.png', 2021, 5, 12),
(10, 'Maju Terus', 'Quillnes_Orion_Grandiose_f5736237-da3e-4c2a-93c4-fb5ebaf14c3e.png', 2013, 6, 12),
(16, 'Ruang Tunggu', 'Quillnes_myzza_65a72eab-d154-4a6d-8ac9-ca7f9fd42e2b.png', 2017, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`) VALUES
(1, '.Feast'),
(2, 'Payung Teduh'),
(3, 'Fourtwnty'),
(4, 'Khalid'),
(5, 'Lenka'),
(6, 'Efek Rumah Kaca'),
(8, 'Stars and Rabbit'),
(13, 'Ananda Myzza');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Pop'),
(2, 'Hip Hop'),
(3, 'Jazz'),
(5, 'Rock'),
(12, 'Indie'),
(15, 'Funk'),
(16, 'Country'),
(17, 'J-Pop'),
(19, 'K-Pop'),
(24, 'I-Pop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `artist` (`artist`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`artist`) REFERENCES `artist` (`artist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
