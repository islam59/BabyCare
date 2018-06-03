-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 03:50 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_babycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `goalone` text NOT NULL,
  `goaltwo` text NOT NULL,
  `goalthree` text NOT NULL,
  `goalfour` text NOT NULL,
  `thinking` text NOT NULL,
  `progressbabycare` int(11) NOT NULL,
  `progressinfant` int(11) NOT NULL,
  `progressfood` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `goalone`, `goaltwo`, `goalthree`, `goalfour`, `thinking`, `progressbabycare`, `progressinfant`, `progressfood`, `status`) VALUES
(1, 'Goal One: Description Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Goal Two: Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Goal Three: Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Goal Four: Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 2016', 85, 30, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `title`, `note`, `status`) VALUES
(1, 'CONTACT ME', 'For any type of query about your Baby, Babycare and our Babycare Online service with any type of suggestion, Please send me a message with valid contact information. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `replay` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `name`, `email`, `subject`, `message`, `replay`, `status`, `date`) VALUES
(3, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '', 0, '2017-01-04 20:51:37'),
(4, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '', 0, '2017-01-04 20:51:37'),
(5, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '', 0, '2017-01-04 20:51:37'),
(6, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '', 0, '2017-01-04 20:51:37'),
(7, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '', 0, '2017-01-05 06:42:11'),
(8, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', 'sdafsaf  asdf ', 1, '2017-01-05 06:39:48'),
(9, 'Islam Hossain', 'islam2311@live.com', 'test message 1', 'echo echo echo', '2016 2016 2016 new replay.. ', 0, '2017-01-05 06:47:00'),
(10, '123123', 'akm_a_abdullah@yahoo.com', 'jjj', 'jjjjjjjjjjjjj j j jjj jjj', '2017-01-07 08:45:072017-01-07 08:45:072 017-01-07 08:45:07 201 7-0 1-07  08:45:07 2 017-01-07  08:45:072017-01-07 08:4 5:07  2017 -01-07  0 8:45:07 2017- 0 1-07  08:45:072017-01-07 08:45:07\r\n2017-01-07 08:45:072017-01-07 08:45:072 017-01-07 08:45:07 201 7-0 1-07  08:45:07 2 017-01-07  08:45:072017-01-07 08:4 5:07  2017 -01-07  0 8:45:07 2017- 0 1-07  08:45:072017-01-07 08:45:07\r\n2017-01-07 08:45:072017-01-07 08:45:072 017-01-07 08:45:07 201 7-0 1-07  08:45:07 2 017-01-07  08:45:072017-01-07 08:4 5:07  2017 -01-07  0 8:45:07 2017- 0 1-07  08:45:072017-01-07 08:45:07\r\n2017-01-07 08:45:072017-01-07 08:45:072 017-01-07 08:45:07 201 7-0 1-07  08:45:07 2 017-01-07  08:45:072017-01-07 08:4 5:07  2017 -01-07  0 8:45:07 2017- 0 1-07  08:45:072017-01-07 08:45:07', 0, '2017-01-08 10:34:43'),
(11, 'asdfsa faf', 'harano_dwin@yahoo.com', 'df asdf', 'sdf asdf asfsadfsadf sf s d  sfa sdfsdf dsdf', '', 0, '2017-01-11 15:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `name`, `image`, `status`) VALUES
(1, 'BabyCare', 'bddea0338d.jpg', 1),
(2, 'DIEASES', 'port02.jpg', 1),
(3, 'VACCINATION', 'vaccination.jpg', 1),
(4, 'FOOD & NUTRITION', 'port03.jpg', 1),
(5, 'DOCTORS & HOSPITALS', 'port04.jpg', 0),
(7, 'test sql', '86d3e154c2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id`, `menuid`, `title`, `body`, `image`, `tags`, `status`, `date`) VALUES
(1, 1, 'Babycare 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when \r\n//image\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when ', '2.jpg', 'Tags: Tags:', 1, '2017-01-07 02:27:56'),
(2, 1, 'Babycare 2', 'It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when \r\n//image\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when It is a long established fact that a reader will be distracted by the readable content of a page when ', '2.jpg', '', 1, '2016-12-28 23:21:18'),
(3, 2, 'Diseas 1', 'dieseas....... ................ .............. ................... ................ ................ ................ .................. ...............', '46e6c77242.jpg', 'Tags: tags tags tags', 1, '2017-01-04 16:37:09'),
(4, 2, 'Diseas 2', 'dieseas.. ............ .................. .................................. ....................... .......................... .................. ......', 'no image', 'Tags: ', 1, '2017-01-04 19:20:40'),
(5, 2, 'Diseas 3', 'dieseas. ........... ............ ................... ............... ................ ........ .......... ......... .......... ..... ........... ........ .....', 'def6886300.png', 'Tags: Tags: ', 1, '2017-01-11 15:31:36'),
(6, 7, 'à¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ)-à¦à¦° à¦“à§Ÿà¦¾à¦•à§à¦¤ à¦¹à¦¬à§‡ à¦¸à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¤à§à¦®à¦¿ à¦¸à¦¾à¦²à¦¾à¦¤ ', 'dsfa asd asdfsadfas dfsad fà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾ à¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ \r\n//image\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œà¦¤à¦¬à§‡ à¦¸à¦¾à¦°à¦¾ à¦¦à§à¦¨à¦¿à§Ÿà¦¾à¦‡ à¦¤à§‹à¦®à¦¾à¦° à¦œà¦¨à§à¦¯ à¦®à¦¾à¦¸à¦œà¦¿à¦¦à¥¤ à¦¯à§‡à¦–à¦¾à¦¨à§‡à¦‡ à¦¸à¦¾à¦²à¦¾à¦¤ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ', 'a161c8507a.png', '(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ ', 1, '2017-01-11 15:31:26'),
(7, 7, ' (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ (à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ ', '\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ', '', '\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ\r\n(à¦¨à¦¾à¦®à¦¾à¦¯/à¦¨à¦¾à¦®à¦¾à¦œ', 1, '2017-01-11 15:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site`
--

CREATE TABLE `tb_site` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_site`
--

INSERT INTO `tb_site` (`id`, `status`, `title`, `name`, `address`, `description`) VALUES
(1, 0, 'BabyCare - Complete Guide for baby growth', 'BabyCare', 'Some Address 987,<br/>\r\n+34 9054 5455,<br/>\r\nMadrid, Spain.', '2017, BabyCare, Caring for Baby, Baby Food, Infant of Baby!');

-- --------------------------------------------------------

--
-- Table structure for table `tb_social`
--

CREATE TABLE `tb_social` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_social`
--

INSERT INTO `tb_social` (`id`, `name`, `link`, `status`) VALUES
(1, 'facebook', 'www.facebook.com2016', 1),
(2, 'twitter', 'www.twitter.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_theme`
--

CREATE TABLE `tb_theme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `linkbootstrap` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_theme`
--

INSERT INTO `tb_theme` (`id`, `name`, `link`, `linkbootstrap`, `image`, `status`) VALUES
(1, 'Teal Garden', '    <link href="assets/css/main.css" rel="stylesheet">', '<link href="assets/css/bootstrap.css" rel="stylesheet">', 'theme01.jpg', 1),
(3, 'Orange Tree', '    <link href="assets/css/mainorange.css" rel="stylesheet">', '<link href="assets/css/bootstrapOrange.css" rel="stylesheet">', 'theme02.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `gender`, `password`, `address`, `type`, `status`) VALUES
(1, 'IslamHossain', 'islam@mail.com', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '14/2, Dhanmondi, Dhaka, Bangladesh.\r\n+880 1914 441334', 'Admin', 1),
(3, 'admin test', 'admin@mail.com', 'on', '202cb962ac59075b964b07152d234b70', 'test address', 'User', 1),
(4, 'test', 'test@mail.com', 'on', '098f6bcd4621d373cade4e832627b4f6', 'test address', 'User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wellcome`
--

CREATE TABLE `tb_wellcome` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wellcome`
--

INSERT INTO `tb_wellcome` (`id`, `image`, `note`, `status`) VALUES
(1, 'e276d33cc0.png', 'Hello everybody. I''m Stanley, a free handsome bootstrap theme coded by BlackTie.co. A really simple theme for those wanting to showcase their work with a cute & clean style.\r\n\r\nPlease, consider to register to our newsletter to be updated with our latest themes and freebies. Like always, you can use this theme in any project freely. Share it with your friends.', 1),
(2, 'MY WORK', 'Show your work here. Dribbble shots from the awesome <a href="#">designerDavid Creighton-Pester</a>.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site`
--
ALTER TABLE `tb_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_social`
--
ALTER TABLE `tb_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_theme`
--
ALTER TABLE `tb_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wellcome`
--
ALTER TABLE `tb_wellcome`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_site`
--
ALTER TABLE `tb_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_social`
--
ALTER TABLE `tb_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_theme`
--
ALTER TABLE `tb_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_wellcome`
--
ALTER TABLE `tb_wellcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
