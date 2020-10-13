-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 11:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twilio_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `message_log`
--

CREATE TABLE `message_log` (
  `user_id` int(8) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_log`
--

INSERT INTO `message_log` (`user_id`, `message`, `status`, `date_sent`) VALUES
(474747, 'huy aljlfkajwelfj asshhh aast', 'delivered', '2020-10-13 21:14:24'),
(474747, 'henlo!', 'delivered', '2020-10-13 21:10:21'),
(455050, 'ayayyayay ahhhh basta!', 'delivered', '2020-10-13 21:19:26'),
(303030, 'try rani alskjdf;aiowejoi;fawef', 'delivered', '2020-10-13 21:25:15'),
(455050, 'try rani alskjdf;aiowejoi;fawef', 'delivered', '2020-10-13 21:25:15'),
(303030, 'last try di nako gutom na ahhafhahfahahah', 'delivered', '2020-10-13 21:26:10'),
(455050, 'last try di nako gutom na ahhafhahfahahah', 'delivered', '2020-10-13 21:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `program` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `phone_number`, `program`, `password`, `type`) VALUES
(303030, 'Jervey', 'Pamad', '+639956130902', 'BSIT', '321', 0),
(455050, 'Gisan Geff', 'Raniego', '+639487776849', 'BSIT', '1234', 1),
(474747, 'Miriam', 'Trinidad', '+639123789168', 'BSCS', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
