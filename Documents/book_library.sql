-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 10:50 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `age`, `genre`, `book_id`) VALUES
(1, 'Tracy Wolff', '59', 'Paranormal', 1),
(2, 'Sarah J.Maas', '36', 'Action,Adventure,Romance', 2),
(3, 'J.R.R. Tolkien', '81', 'Fantasy', 3),
(3, 'J.R.R. Tolkien', '81', 'Fiction', 4),
(1, 'Tracy Wolff', '59', 'Fiction', 5),
(2, 'Sarah J.Maas', '36', 'Fiction', 6),
(4, 'Vikram Seth', '68', 'Poetry', 7),
(4, 'Vikram Seth', '68', 'Poetry', 8),
(4, 'Vikram Seth', '68', 'Poetry', 9),
(5, 'Abu\'l-Fazl ibn Mubarak', 'deceased', 'Biography', 10),
(6, 'Philip Zimbardo', '87', 'Psychology', 11),
(6, 'Philip Zimbardo', '87', 'Psychology', 12),
(6, 'Philip Zimbardo', '87', 'Psychology', 13),
(7, 'Jane Austen', 'deceased', 'Novel', 14),
(7, 'Jane Austen', 'deceased', 'Novel', 15),
(7, 'Jane Austen', 'deceased', 'Novel', 16),
(7, 'Jane Austen', 'deceased', 'Novel', 17),
(7, 'Jane Austen', 'deceased', 'Novel', 18),
(7, 'Jane Austen', 'deceased', 'Novel', 19),
(7, 'Jane Austen', 'deceased', 'Novel', 20),
(8, 'J.M. Coetzee', '81', 'Novel', 21),
(8, 'J.M. Coetzee', '81', 'Novel', 22),
(8, 'J.M. Coetzee', '81', 'Novel', 23);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `book_genre` varchar(255) DEFAULT NULL,
  `age_group` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `retail_price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`book_id`, `book_name`, `publish_date`, `book_genre`, `age_group`, `price`, `description`, `retail_price`, `quantity`, `image`, `date_added`) VALUES
(1, 'Charm', '2022-11-08', 'Paranormal', '14+', '500', '', '600', 20, 'charm.jpg', '0000-00-00 00:00:00'),
(2, 'A Court of Thorns and Roses', '2015-05-05', 'Action,Adventure,Romance', '14+', '350', '', '400', 15, 'court.jpg', '0000-00-00 00:00:00'),
(3, 'The Hobbit', '2020-09-21', 'Fantasy', '10+', '300', '', '500', 5, 'theHobbit.jpg', '0000-00-00 00:00:00'),
(4, 'Letters from Father Christmas', '2005-04-10', 'Fiction', '6-9,10-12', '250', '', '300', 20, 'letters.jpg', '0000-00-00 00:00:00'),
(5, 'Back in the Burbs', '2021-03-30', 'Fiction', '16+', '335', '', '335', 8, 'backInTheBurbs.jpg', '0000-00-00 00:00:00'),
(6, 'Throne of Glass', '2021-01-28', 'Fiction', '14+', '400', '', '500', 12, 'throneOfGlass.jpg', '0000-00-00 00:00:00'),
(7, 'The Tale Of Melon City', '1981-01-01', 'Poetry', '16+', '600', '', '600', 5, 'taleOfMelonCity.jpg', '0000-00-00 00:00:00'),
(8, 'The Humble Administrator\'s Garden', '1985-01-01', 'Poetry', '18+', '180', '', '250', 10, 'humbleGarden.jpg', '0000-00-00 00:00:00'),
(9, 'All You Who Sleep Tonight', '1990-01-01', 'Poetry', '18+', '195', '', '195', 5, 'allWhoSleep.jpg', '0000-00-00 00:00:00'),
(11, 'The Cognitive Control of Motivation', '1969-01-01', 'Psychology', '18+', '255', '', '255', 2, 'cognitiveControl.jpg', '0000-00-00 00:00:00'),
(12, 'Stanford Prison Experiment: A simulation study of the psychology of imprisonment', '1972-01-01', 'Psychology', '18+', '120', '', '120', 1, 'stanfordExp.jpg', '0000-00-00 00:00:00'),
(13, 'Influencing Attitudes and Changing Behavior', '1969-01-01', 'Psychology', '18+', '150', '', '300', 5, 'influencingAttitudes.jpg', '0000-00-00 00:00:00'),
(14, 'Sense and Sensibility', '1811-01-01', 'Novel', '12+', '220', '', '220', 7, 'sense.jpg', '0000-00-00 00:00:00'),
(15, 'Pride and Prejudice', '1813-01-01', 'Novel', '14+', '300', '', '450', 10, 'pride.jpg', '0000-00-00 00:00:00'),
(16, 'Mansfield Park', '1814-01-01', 'Novel', '18R', '340', '', '340', 3, 'mansfield.jpg', '0000-00-00 00:00:00'),
(17, 'Emma', '1815-01-01', 'Novel', '6-9,10-12', '450', '', '450', 14, 'emma.jpg', '0000-00-00 00:00:00'),
(18, 'Northanger Abbey', '1818-01-01', 'Novel', '12+', '550', '', '0', 0, 'northhanger.jpg', '0000-00-00 00:00:00'),
(19, 'Persuasion', '1818-01-01', 'Novel', '18R', '220', '', '220', 2, 'persuasion.jpg', '0000-00-00 00:00:00'),
(20, 'Lady Susan', '1871-01-01', 'Novel', '18R', '100', '', '100', 8, 'ladySusan.jpg', '0000-00-00 00:00:00'),
(21, 'The Childhood of Jesus', '2013-01-01', 'Novel', '12-15', '325', '', '325', 2, 'childhood.jpg', '0000-00-00 00:00:00'),
(22, 'The Schooldays of Jesus', '2016-01-01', 'Novel', '8-10', '325', '', '325', 2, 'schooldays.jpg', '0000-00-00 00:00:00'),
(23, 'The Death of Jesus', '2019-01-01', 'Novel', '12-17', '325', '', '325', 5, 'death.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_surname` varchar(255) DEFAULT NULL,
  `member_age` int(11) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`member_id`, `member_name`, `member_surname`, `member_age`, `member_email`, `member_password`) VALUES
(1, 'Herman', 'Mans', 29, 'hsmans0601@gmail.com', 'Password1'),
(27, 'John', 'Doe', NULL, NULL, NULL),
(28, 'John', 'Doe2', NULL, NULL, NULL),
(29, 'Karla ', 'Mans', 0, 'karlamans93@gmail.com', 'Password2'),
(30, '', '', 53, '', ''),
(31, '', '', 53, '', ''),
(32, '', '', 53, '', ''),
(33, '', '', 53, '', ''),
(34, '', '', 53, '', ''),
(35, '', '', 53, '', ''),
(36, '', '', 53, '', ''),
(37, '', '', 53, '', ''),
(38, '', '', 53, '', ''),
(39, '', '', 53, '', ''),
(40, '', '', 53, '', ''),
(41, '', '', 53, '', ''),
(42, '', '', 53, '', ''),
(43, '', '', 53, '', ''),
(44, '', '', 53, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
