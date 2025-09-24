-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2022 at 08:27 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floating_lights_festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `custFirst_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custLast_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custCity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custState` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custZip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custPhone` varchar(255) NOT NULL,
  `custEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `custFirst_Name`, `custLast_Name`, `custAddress`, `custCity`, `custState`, `custZip`, `custPhone`, `custEmail`) VALUES
(1, 'Eugene', 'Fitzherbert', '123 Forest Way', 'Paradise', 'CA', '95967', '5301234567', 'flynnrider@gmail.com'),
(2, 'Dolores', 'Madrigal', '528 Encanto Way', 'Hollywood', 'CA', '90027', '2135684926', 'doloresm@gmail.com'),
(3, 'Bruno ', 'Madrigal', '623 Encanto Way', 'Hollywood', 'CA', '90027', '2138462513', 'brunomadrigal@gmail.com'),
(4, 'Alma', 'Madrigal', '812 Encanto Way', 'Hollywood', 'CA', '90027', '2136495128', 'abuelamadrigal@gmail.com'),
(5, 'Antonio', 'Madrigal', '652 Encanto Way', 'Hollywood', 'CA', '90027', '2136759134', 'antoniom@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int NOT NULL AUTO_INCREMENT,
  `eventName` varchar(255) NOT NULL,
  `eventLocation` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventImage` varchar(255) NOT NULL,
  `eventImgAlt` varchar(255) NOT NULL,
  `eventCost` int NOT NULL,
  `eventPageID` varchar(255) NOT NULL,
  `eventDetail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `eventHero` varchar(255) NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventLocation`, `eventDate`, `eventImage`, `eventImgAlt`, `eventCost`, `eventPageID`, `eventDetail`, `eventHero`) VALUES
(1, 'Floating Lights - Sacramento', 'Sacramento,CA', '2022-06-04', 'sac.jpg', 'Sacramento Yellow Bridge aerial view', 35, 'sacpage', '\r\nLocated in the Capitol of the Golden State. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'sac2.jpg'),
(2, 'Floating Lights - Los Angeles', 'Los Angeles, CA', '2022-06-11', 'la.jpg', 'Street of La with palm trees and Hollywood sign visible', 35, 'lapage', '\r\nLocated in the heart of Hollywood. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'la2.jpg'),
(3, 'Floating Lights - San Francisco', 'San Francisco, CA', '2022-06-18', 'sf.jpg', 'Aerial view of Golden Gate bridge in San Francisco', 35, 'sfpage', '\r\nLocated 10 minutes away from the Golden Gate Bridge. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'sf2.jpg'),
(4, 'Floating Lights - Las Vegas', 'Las Vegas, NV', '2022-06-25', 'lv.jpg', 'Aerial view of Las Vegas strip', 35, 'lvpage', '\r\nLocated 15 minutes from the famous Strip. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'lv2.jpg'),
(5, 'Floating Lights - Chicago', 'Chicago, IL', '2022-07-02', 'chic.jpg', 'Chicago silver bean', 35, 'chicpage', '\r\nLocated in the self proclaimed Pizza capital of the world. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'chic2.jpg'),
(6, 'Floating Lights - Miami', 'Miami, FL', '2022-07-09', 'miami2.jpg', 'Miami Beach ', 35, 'miamipage', '\r\nLocated in the Sunshine State. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'miami2.jpg'),
(7, 'Floating Lights - Hilo', 'Hilo, HI', '2022-07-16', 'hilo.jpg', 'Aerial view of Hilo coast', 35, 'hilopage', '\r\nLocated 11 miles north of Akaka Falls. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'hilo2.jpg'),
(8, 'Floating Lights - Houston', 'Houston, TX', '2022-07-23', 'houston2.jpg', 'Houston park and City skyline', 35, 'houspage', '\r\nLocated in the world capital of space exploration. You and your family are sure to have a blast.\r\n\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'houston2.jpg'),
(9, 'Floating Lights - San Diego', 'San Diego, CA', '2022-07-30', 'sd.jpg', 'San Diego city skyline', 35, 'sdpage', '\r\nLocated 30 minutes away from the San Diego Zoo. You and your family are sure to have a blast.\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', 'sd2.jpg'),
(10, 'Floating Lights - New York', 'New York, NY', '2022-08-06', 'ny.jpg', 'Times Square at night', 35, 'nypage', 'Located right in the heart of the famous Times Square. You and your family are sure to have a blast.\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', ''),
(11, 'Floating Lights - Anchorage', 'Anchorage, AK', '2022-08-13', 'al.jpg', 'Northern Lights in Alaska', 35, 'akpage', 'Located in Beautiful Alaska. You and your family are sure to have a blast.\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', ''),
(12, 'Floating Lights - Salt Lake City', 'Salt Lake City, UT', '2022-08-20', 'slc.jpg', 'Snowy mountains with a sunset behind in Salt Lake City Utah', 35, 'slcpage', 'Located in the Beehive state. You and your family are sure to have a blast.\r\n\r\n<ul>\r\n    <li>Kids and pets are welcome!</li>\r\n    <li>One (1) Lantern is included with admission</li>\r\n    <li>Parking Included in Admission Price</li>\r\n</ul>', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` int NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `itemPrice`) VALUES
(1, 'General Admission', 35),
(2, 'Child Admission', 15),
(3, 'Parking', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `orderDate` date NOT NULL,
  `customerID` int NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `customerID`) VALUES
(1, '2022-02-19', 1),
(2, '2022-02-17', 2),
(3, '2022-02-14', 3),
(4, '2022-02-10', 4),
(5, '2022-02-02', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `firstName`, `lastName`, `email`) VALUES
(14, 'reggiee76', '$argon2i$v=19$m=65536,t=4,p=1$NTFyY3BkaXpnN3lCSzQ3WQ$fF1VHiNQ/PTLcFwvUczgzhl7eY6jHR9CHYhxPf4+gqI', 'Regina', 'Gil', 'reginagil76@gmail.com'),
(15, 'test', '$argon2i$v=19$m=65536,t=4,p=1$cnh4ME9xS0ZRUzRERmhadQ$8+wdWI4++jRs1/r1kxFXTPqxyYw44g4qyL5vz1lrrxM', 'test', 'test', 'test@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
