-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2022 at 04:57 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hilltone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin 1', '123'),
(2, 'admin 2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `quantity`) VALUES
(19, 'Biola Mahal', 'pexels-pixabay-462447.jpg', 33333, 1),
(20, 'Gitar Listrik 2', 'pexels-karolina-grabowska-4472061.jpg', 100000, 1),
(21, 'Gitar Listrik', 'pexels-gustavo-borges-2646825.jpg', 200000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`) VALUES
(9, 'samuel', '123'),
(10, 'stefannus', '123'),
(11, 'victor', '123'),
(12, 'jason', '123'),
(13, 'Noel', '123');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `flat` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `pin_code` varchar(200) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `timestamp`) VALUES
(1, 'Stefannus Christian', '082114063898', 'christianismanto@gmail.com', 'paypal', 'Calvin Institute of Technology', 'GRII', 'Jakarta', 'Sunter', 'Indonesia', '555555', 'Electric Guitar 1 (3) ', 750, '2022-04-23 14:53:41'),
(2, 'Samuel', '1234', 'samuel_marcelino@gmail.com', 'paypal', 'apartemen CIT', 'jalan IRGG', 'Bandung', 'Canada', 'India', '112233', 'Gitar Listrik 2 (2) , Violin Sultan (3) ', 499997, '2022-04-23 14:53:41'),
(3, 'Noel Mandak', '32424', 'batu@gmail.com', 'Debit BCA', '2003', 'Lantai 20', 'Lakers', 'Bandung', 'Russia', '12345', 'Piano CIT (1) , Gitar Listrik (1) , Gitar Listrik 2 (2) , Violin Sultan (3) ', 823453, '2022-04-23 14:53:41'),
(4, 'Victor', '123131', 'victor@gmalil.com', 'COD', 'adawd', 'asdad', 'asdwad', 'asdad', 'asdwad', '23424', 'Piano Sultan (2) ', 4684840, '2022-04-23 14:54:57'),
(5, 'Noel Mandak', '12344', 'noel@calvin.id', 'Debit BCA', 'asdads', 'asdad', 'asdwa', 'asdawd', 'asdwada', '1233', 'Biola Mahal (1) , Gitar Listrik 2 (1) , Gitar Listrik (3) ', 733333, '2022-04-23 16:54:49'),
(6, 'Noel Mandak', '12344', 'noel@calvin.id', 'Debit BCA', 'asdads', 'asdad', 'asdwa', 'asdawd', 'asdwada', '1233', 'Biola Mahal (1) , Gitar Listrik 2 (1) , Gitar Listrik (3) ', 733333, '2022-04-23 16:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(5, 'Gitar Listrik', 200000, 'pexels-gustavo-borges-2646825.jpg'),
(6, 'Gitar Listrik 2', 100000, 'pexels-karolina-grabowska-4472061.jpg'),
(10, 'Biola Mahal', 33333, 'pexels-pixabay-462447.jpg'),
(12, 'Piano', 122344, 'pexels-pixabay-164743.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
