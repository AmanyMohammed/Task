-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 07:08 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Task`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(100) NOT NULL,
  `bookAuther` varchar(100) NOT NULL,
  `bookDescription` text NOT NULL,
  `bookBody` text NOT NULL,
  `bookPicture` varchar(300) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`),
  KEY `categoryId_2` (`categoryId`),
  KEY `categoryId_3` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `bookName`, `bookAuther`, `bookDescription`, `bookBody`, `bookPicture`, `categoryId`) VALUES
(10, 'book2', 'Amany Mohammed', 'Book about coding', 'Coding Book', 'molodotme.jpg', 12),
(11, 'book1', 'Amr Mohammed', 'Book about cooking', 'Cooking Book', 'molodotme.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  `categoryDescription` text NOT NULL,
  `categoryPicture` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `categoryName`, `categoryDescription`, `categoryPicture`) VALUES
(11, 'category 1', 'Cooking Books', '10404139_10153241212569774_4471239508480630265_n.jpg'),
(12, 'category 2', 'Coding Books', 'keep-calm-and-enjoy-life-2641.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `Book_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
