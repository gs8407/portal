-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2019 at 09:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 NOT NULL,
  `password` char(128) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `personal` varchar(512) CHARACTER SET utf8 NOT NULL,
  `image` varchar(128) CHARACTER SET utf8 NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `reset` char(128) CHARACTER SET utf8 NOT NULL,
  `admin` int(1) NOT NULL,
  `ban` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `personal`, `image`, `visibility`, `reset`, `admin`, `ban`) VALUES
(5, 'admin', '$2y$10$vdn9m5Iokki/XIMoMhNPkOgYtBhcBWgfYEbwtZmD5NstXm75IT8Qm', 'gs8407@gmail.com', 'Goran', 'Stanković', '', '\r\n', 1, '', 1, 0),
(25, 'user1', '$2y$10$hxhO3oebaCK812WJMt5lFu2ypZvxRBA4CS4IeU63aM1Gy4oJvY9KG', 'user1@mail.com', 'Mario', 'Campbell', 'Talk about a beautiful customer testimonial page. ZenDesk, a help desk software, literally provides tools for customer service. How could they do this without showcasing their happy customers?', './images/1553546679.jpg\n\n', 1, '$2y$10$spfBdiitrvhiT8MQagg7wOHiaZEd2cdGNOzqOZWwZMZJJmbGEwXQG', 0, 0),
(26, 'user2', '$2y$10$Sr7Cj2aKRTawy5FxabxRFO6t.5Dh7qbzhivjtctmb6Zj7nrEFWlK2', 'user2@mail.com', 'Ruben', 'Richardson', 'We\'re here to help companies make better life safety decisions, not guess if this weekend\'s birthday party could be rained out.', './images/1553439817.jpg\n\n', 1, '', 0, 0),
(27, 'user3', '$2y$10$2lHRVlh6rzXa2x7lQkXATeYpVPh/vH6McWi8pwIeGogdOApqIfLn.', 'user3@mail.com', 'Evangeline', 'Chambers', 'More than anything, I must have flowers always, always.', './images/1553439884.jpg\n\n', 1, '', 0, 0),
(28, 'user4', '$2y$10$1Hg1Wnaqm/uVpUajuk555.VrVGYFDoR09v2vbn62YI8yw1iLeRUy6', 'user4@mail.com', 'Annabel', 'Fox', 'At Siren Hair Studio, my mission is to help you on your quest for self-care and self-love through attainable beauty using high-quality products that are kind towards our planet, our animal friends and ourselves. ', './images/1553439963.jpg\n\n', 1, '', 0, 0),
(29, 'user5', '$2y$10$wqH0IXzB559fn4Q9MB0feOTNeluPkelXhdPUOgCzkSYfac6VpwTDS', 'user5@mail.com', 'Franky', 'Phillips', 'Our extremely talented staff of photographers don\'t simply take beautiful pictures, they produce works of art. From billboards to product photos, there is no job too big or too small. They bring experience, creativity, and out-of the-box thinking.', './images/1553440087.jpg\n\n', 1, '', 0, 0),
(30, 'user6', '$2y$10$pf4ub3VIMn/T.FTDCFQ/YOPjFqwPHdqZU1W6ZpvNsz5qw9k81ICbe', 'user6@mail.com', 'Lance', 'Montgomery', 'Knowledge is a familiarity, awareness, or understanding of someone or something, such as facts, information, descriptions, or skills, which is acquired through experience or education by perceiving, discovering, or learning.', './images/1553440919.jpg\n\n', 0, '', 0, 0),
(31, 'user7', '$2y$10$hHUQ5FbygEmad4V.J4VeE.6q4JpZ6jUsoz.dWRo9sYkwfVF2GbOV6', 'user7@mail.com', 'Jody', 'Koontz', 'At Skin we use premium waxes which are made from the finest ingredients available, wax that is designed to stick to the hair and not the skin. Lust Pink wax is the No1 best selling wax in New Zealand, used by professionals. It’s the Rolls Royce of wax.', './images/1553440795.jpg\n\n', 0, '', 0, 0),
(32, 'user8', '$2y$10$4atqCLOlyl4yAepAOZU8huBXYbeXly586jOiA9Y.sYmmht3r/hvhq', 'user8@mail.com', 'Bessie', 'Spears', 'Our International brand is the world leader in marine, yacht and protective coatings. A long-standing brand synonymous with innovation and collaboration, it is the preferred choice of industry leaders looking for excellence and expertise.', './images/1553440876.jpg\n\n', 0, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
