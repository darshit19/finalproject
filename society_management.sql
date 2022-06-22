-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 10:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `name`, `mobile`, `password`) VALUES
(1, 'darshitgsorathiya7@gmail.com', 'Darshit Sorathiya', '9898881839', 'darshit');

-- --------------------------------------------------------

--
-- Table structure for table `announcementtb`
--

CREATE TABLE `announcementtb` (
  `ann_id` int(11) NOT NULL,
  `ann_title` varchar(255) NOT NULL,
  `ann_text` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `ann_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcementtb`
--

INSERT INTO `announcementtb` (`ann_id`, `ann_title`, `ann_text`, `b_id`, `ann_date`) VALUES
(2, 'xyz', 'abcdefghijklmnopqrstuvwzxyz', 'A', '02-06-22'),
(4, 'Ganpati Utsav', 'For Ganpati Utsav every flat has to pay 1000 rs ', 'A', '02-06-22'),
(5, 'Parking Issues', 'Meeting at 9.30 pm at club house', 'A', '15-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `buildingtb`
--

CREATE TABLE `buildingtb` (
  `b_id` varchar(255) NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `flats_per_floor` int(11) NOT NULL,
  `total_flats` int(11) NOT NULL,
  `maintainance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildingtb`
--

INSERT INTO `buildingtb` (`b_id`, `no_of_floors`, `flats_per_floor`, `total_flats`, `maintainance`) VALUES
('A', 4, 4, 16, 1500),
('B', 4, 4, 16, 1000),
('C', 4, 4, 16, 500),
('D', 5, 3, 15, 300);

-- --------------------------------------------------------

--
-- Table structure for table `collectiontb`
--

CREATE TABLE `collectiontb` (
  `maint_id` int(11) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collectiontb`
--

INSERT INTO `collectiontb` (`maint_id`, `flatno`, `b_id`) VALUES
(1, 'A101', 'A'),
(1, 'A103', 'A'),
(4, 'A101', 'A'),
(5, 'A101', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `commiteetb`
--

CREATE TABLE `commiteetb` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `m_mobile` varchar(50) NOT NULL,
  `m_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commiteetb`
--

INSERT INTO `commiteetb` (`m_id`, `m_name`, `role_id`, `b_id`, `m_mobile`, `m_email`) VALUES
(1, 'Rahul Maurya', 1, 'A', '9876543212', 'rahul@gmail.com'),
(2, 'Gaurav Chauhan', 2, 'A', '9876543211', 'gaurav@gmail.com'),
(3, 'Chirag Padsala', 1, 'B', '8798790000', 'chirag@gmail.com'),
(4, 'Bhautik Italiya', 2, 'B', '6932590000', 'bhautik@gmail.com'),
(5, 'Jayesh Sorathiya', 1, 'C', '7778880000', 'jayesh@gmail.com'),
(6, 'Rahul Shingala', 2, 'C', '7531600000', 'rahuls@gmail.com'),
(7, 'Ghanshyam Sorathiya', 2, 'D', '7405270000', 'ghanshyam@gmail.com'),
(8, 'Chirag Boghara', 1, 'D', '9265920000', 'cb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `complainttb`
--

CREATE TABLE `complainttb` (
  `comp_id` int(11) NOT NULL,
  `comp_title` varchar(255) NOT NULL,
  `comp_text` varchar(255) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `comp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainttb`
--

INSERT INTO `complainttb` (`comp_id`, `comp_title`, `comp_text`, `flatno`, `b_id`, `comp_date`) VALUES
(4, 'Regarding Parking Problem', 'Someone always park bike in my parking area', 'A101', 'A', '17-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `expensetb`
--

CREATE TABLE `expensetb` (
  `exp_id` int(11) NOT NULL,
  `exp_day` int(11) NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `exp_source` varchar(255) NOT NULL,
  `exp_amount` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensetb`
--

INSERT INTO `expensetb` (`exp_id`, `exp_day`, `exp_month`, `exp_year`, `exp_source`, `exp_amount`, `b_id`) VALUES
(1, 13, 6, 2022, 'Light Bill', 12000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `flattb`
--

CREATE TABLE `flattb` (
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `floorno` int(11) NOT NULL,
  `isowned` int(11) NOT NULL,
  `isonrent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flattb`
--

INSERT INTO `flattb` (`flatno`, `b_id`, `floorno`, `isowned`, `isonrent`) VALUES
('A101', 'A', 1, 1, 1),
('A102', 'A', 1, 1, 0),
('A103', 'A', 1, 1, 0),
('A104', 'A', 1, 0, 0),
('A201', 'A', 2, 0, 0),
('A202', 'A', 2, 0, 0),
('A203', 'A', 2, 1, 0),
('A204', 'A', 2, 0, 0),
('A301', 'A', 3, 0, 0),
('A302', 'A', 3, 0, 0),
('A303', 'A', 3, 0, 0),
('A304', 'A', 3, 1, 0),
('A401', 'A', 4, 0, 0),
('A402', 'A', 4, 0, 0),
('A403', 'A', 4, 0, 0),
('A404', 'A', 4, 0, 0),
('B101', 'B', 1, 0, 0),
('B102', 'B', 1, 0, 0),
('B103', 'B', 1, 0, 0),
('B104', 'B', 1, 0, 0),
('B201', 'B', 2, 0, 0),
('B202', 'B', 2, 0, 0),
('B203', 'B', 2, 0, 0),
('B204', 'B', 2, 0, 0),
('B301', 'B', 3, 0, 0),
('B302', 'B', 3, 0, 0),
('B303', 'B', 3, 0, 0),
('B304', 'B', 3, 0, 0),
('B401', 'B', 4, 0, 0),
('B402', 'B', 4, 0, 0),
('B403', 'B', 4, 0, 0),
('B404', 'B', 4, 0, 0),
('C101', 'C', 1, 0, 0),
('C102', 'C', 1, 1, 0),
('C103', 'C', 1, 0, 0),
('C104', 'C', 1, 0, 0),
('C201', 'C', 2, 0, 0),
('C202', 'C', 2, 0, 0),
('C203', 'C', 2, 0, 0),
('C204', 'C', 2, 0, 0),
('C301', 'C', 3, 0, 0),
('C302', 'C', 3, 0, 0),
('C303', 'C', 3, 0, 0),
('C304', 'C', 3, 0, 0),
('C401', 'C', 4, 0, 0),
('C402', 'C', 4, 0, 0),
('C403', 'C', 4, 0, 0),
('C404', 'C', 4, 0, 0),
('D101', 'D', 1, 0, 0),
('D102', 'D', 1, 0, 0),
('D103', 'D', 1, 0, 0),
('D201', 'D', 2, 0, 0),
('D202', 'D', 2, 0, 0),
('D203', 'D', 2, 0, 0),
('D301', 'D', 3, 0, 0),
('D302', 'D', 3, 0, 0),
('D303', 'D', 3, 0, 0),
('D401', 'D', 4, 0, 0),
('D402', 'D', 4, 0, 0),
('D403', 'D', 4, 0, 0),
('D501', 'D', 5, 0, 0),
('D502', 'D', 5, 0, 0),
('D503', 'D', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incometb`
--

CREATE TABLE `incometb` (
  `in_id` int(11) NOT NULL,
  `in_day` int(11) NOT NULL,
  `in_month` int(11) NOT NULL,
  `in_year` int(11) NOT NULL,
  `in_source` varchar(255) NOT NULL,
  `in_amount` float NOT NULL,
  `b_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incometb`
--

INSERT INTO `incometb` (`in_id`, `in_day`, `in_month`, `in_year`, `in_source`, `in_amount`, `b_id`) VALUES
(1, 28, 2, 1999, 'Tower Rent', 1200, 'A'),
(2, 13, 1, 2022, 'Tower Rent', 40000, 'A'),
(3, 28, 6, 2022, 'Tower Rent', 40000, 'A'),
(4, 14, 6, 2022, 'Hall Rent', 6000, 'A'),
(8, 12, 2, 2022, 'Hall Rent', 3000, 'A'),
(13, 10, 4, 2022, 'Maintainance of this month', 1000, 'A'),
(14, 12, 2, 2023, 'Tower Rent', 5000, 'A'),
(15, 15, 4, 2023, 'Hall Rent', 40000, 'A'),
(16, 10, 5, 2022, 'Maintainance of this month', 0, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `maintainancetb`
--

CREATE TABLE `maintainancetb` (
  `maint_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `ac_status` int(11) NOT NULL,
  `m_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintainancetb`
--

INSERT INTO `maintainancetb` (`maint_id`, `month`, `year`, `b_id`, `ac_status`, `m_money`) VALUES
(1, 1, 2022, 'A', 1, 1000),
(4, 2, 2022, 'A', 1, 1000),
(5, 4, 2022, 'A', 0, 1000),
(6, 5, 2022, 'A', 0, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `messagetb`
--

CREATE TABLE `messagetb` (
  `msg_id` int(11) NOT NULL,
  `msg_text` varchar(255) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `m_id` int(11) NOT NULL,
  `msg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagetb`
--

INSERT INTO `messagetb` (`msg_id`, `msg_text`, `flatno`, `m_id`, `msg_date`) VALUES
(7, 'hello', 'A101', 1, '2001-06-22'),
(8, 'hello', 'A104', 1, '2001-06-22'),
(9, 'ghjkklpo', 'A101', 1, '2001-06-22'),
(10, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A101', 1, '2001-06-22'),
(11, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A102', 1, '2001-06-22'),
(12, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A103', 1, '2001-06-22'),
(13, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A104', 1, '2001-06-22'),
(14, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A201', 1, '2001-06-22'),
(15, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A202', 1, '2001-06-22'),
(16, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A203', 1, '2001-06-22'),
(17, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A204', 1, '2001-06-22'),
(18, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A301', 1, '2001-06-22'),
(19, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A302', 1, '2001-06-22'),
(20, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A303', 1, '2001-06-22'),
(21, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A304', 1, '2001-06-22'),
(22, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A401', 1, '2001-06-22'),
(23, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A402', 1, '2001-06-22'),
(24, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A403', 1, '2001-06-22'),
(25, 'Your maintainance of february moth is remaining.Please pay as soon as possible', 'A404', 1, '2001-06-22'),
(26, 'sfgh', 'A102', 1, '2003-06-22'),
(27, 'sfgh', 'A104', 1, '2003-06-22'),
(28, 'sfgh', 'A201', 1, '2003-06-22'),
(29, 'sfgh', 'A202', 1, '2003-06-22'),
(30, 'sfgh', 'A203', 1, '2003-06-22'),
(31, 'sfgh', 'A204', 1, '2003-06-22'),
(32, 'sfgh', 'A301', 1, '2003-06-22'),
(33, 'sfgh', 'A302', 1, '2003-06-22'),
(34, 'sfgh', 'A303', 1, '2003-06-22'),
(35, 'sfgh', 'A304', 1, '2003-06-22'),
(36, 'sfgh', 'A401', 1, '2003-06-22'),
(37, 'sfgh', 'A402', 1, '2003-06-22'),
(38, 'sfgh', 'A403', 1, '2003-06-22'),
(39, 'sfgh', 'A404', 1, '2003-06-22'),
(40, 'Your maintainace for month April is remaining', 'A102', 1, '2015-06-22'),
(41, 'Your maintainace for month April is remaining', 'A103', 1, '2015-06-22'),
(42, 'Your maintainace for month April is remaining', 'A104', 1, '2015-06-22'),
(43, 'Your maintainace for month April is remaining', 'A201', 1, '2015-06-22'),
(44, 'Your maintainace for month April is remaining', 'A202', 1, '2015-06-22'),
(45, 'Your maintainace for month April is remaining', 'A203', 1, '2015-06-22'),
(46, 'Your maintainace for month April is remaining', 'A204', 1, '2015-06-22'),
(47, 'Your maintainace for month April is remaining', 'A301', 1, '2015-06-22'),
(48, 'Your maintainace for month April is remaining', 'A302', 1, '2015-06-22'),
(49, 'Your maintainace for month April is remaining', 'A303', 1, '2015-06-22'),
(50, 'Your maintainace for month April is remaining', 'A304', 1, '2015-06-22'),
(51, 'Your maintainace for month April is remaining', 'A401', 1, '2015-06-22'),
(52, 'Your maintainace for month April is remaining', 'A402', 1, '2015-06-22'),
(53, 'Your maintainace for month April is remaining', 'A403', 1, '2015-06-22'),
(54, 'Your maintainace for month April is remaining', 'A404', 1, '2015-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `ownertb`
--

CREATE TABLE `ownertb` (
  `owe_id` int(11) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `owe_name` varchar(255) NOT NULL,
  `owe_mobile` varchar(255) NOT NULL,
  `owe_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownertb`
--

INSERT INTO `ownertb` (`owe_id`, `flatno`, `b_id`, `owe_name`, `owe_mobile`, `owe_email`) VALUES
(1, 'A101', 'A', 'Darshit Sorathiya', '9265922489', 'darshitgsorathiya7@gmail.com'),
(2, 'A304', 'A', 'Ghanshyam Sorathiya', '7405270000', 'gvs@gmail.com'),
(3, 'A203', 'A', 'Rudra Sojitra', '7896540000', 'rudra@gmail.com'),
(4, 'C102', 'C', 'Gaurang Sorathiya', '9978180000', 'gaurang@gmail.com'),
(5, 'A102', 'A', 'Harry Kheni', '8888890000', 'harry@gmail.com'),
(6, 'A103', 'A', 'Ram Sojitra', '9999999999', 'ram@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rentertb`
--

CREATE TABLE `rentertb` (
  `r_id` int(11) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_mobile` varchar(15) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `rent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentertb`
--

INSERT INTO `rentertb` (`r_id`, `flatno`, `b_id`, `r_name`, `r_mobile`, `r_email`, `rent`) VALUES
(1, 'A101', 'A', 'Harry Kheni', '8888888888', 'harrykheni7213@gmail.com', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `responsetb`
--

CREATE TABLE `responsetb` (
  `res_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `res_text` varchar(255) NOT NULL,
  `res_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsetb`
--

INSERT INTO `responsetb` (`res_id`, `comp_id`, `res_text`, `res_date`) VALUES
(3, 4, 'Your issue is solved \r\nYou will not face the same problem again', '17-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `roletb`
--

CREATE TABLE `roletb` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletb`
--

INSERT INTO `roletb` (`role_id`, `role_name`) VALUES
(1, 'Secretary'),
(2, 'Treasure');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletb`
--

CREATE TABLE `vehicletb` (
  `v_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `vehicle_num` varchar(255) NOT NULL,
  `flatno` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicletb`
--

INSERT INTO `vehicletb` (`v_id`, `type_id`, `color`, `v_name`, `vehicle_num`, `flatno`, `b_id`) VALUES
(4, 1, 'Black', 'Unicorn', 'GJ-05-AD-0283', 'A101', 'A'),
(6, 2, 'Matt Black', 'Honda Civic', 'GJ-05-AD-0288', 'A101', 'A'),
(7, 1, 'Brown', 'TVS Jupiter', 'GJ-05-BC-0283', 'A101', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletypetb`
--

CREATE TABLE `vehicletypetb` (
  `type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicletypetb`
--

INSERT INTO `vehicletypetb` (`type_id`, `type`) VALUES
(1, '2 Wheeler'),
(2, '4 wheeler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcementtb`
--
ALTER TABLE `announcementtb`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `buildingtb`
--
ALTER TABLE `buildingtb`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `collectiontb`
--
ALTER TABLE `collectiontb`
  ADD KEY `maint_id` (`maint_id`),
  ADD KEY `flatno` (`flatno`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `commiteetb`
--
ALTER TABLE `commiteetb`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `commiteetb_ibfk_2` (`b_id`);

--
-- Indexes for table `complainttb`
--
ALTER TABLE `complainttb`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `flatno` (`flatno`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `expensetb`
--
ALTER TABLE `expensetb`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `flattb`
--
ALTER TABLE `flattb`
  ADD PRIMARY KEY (`flatno`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `incometb`
--
ALTER TABLE `incometb`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `maintainancetb`
--
ALTER TABLE `maintainancetb`
  ADD PRIMARY KEY (`maint_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `messagetb`
--
ALTER TABLE `messagetb`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `flatno` (`flatno`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `ownertb`
--
ALTER TABLE `ownertb`
  ADD PRIMARY KEY (`owe_id`),
  ADD UNIQUE KEY `flatno` (`flatno`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `rentertb`
--
ALTER TABLE `rentertb`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `flatno` (`flatno`);

--
-- Indexes for table `responsetb`
--
ALTER TABLE `responsetb`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `roletb`
--
ALTER TABLE `roletb`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `vehicletb`
--
ALTER TABLE `vehicletb`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `flatno` (`flatno`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `vehicletypetb`
--
ALTER TABLE `vehicletypetb`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcementtb`
--
ALTER TABLE `announcementtb`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commiteetb`
--
ALTER TABLE `commiteetb`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `complainttb`
--
ALTER TABLE `complainttb`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expensetb`
--
ALTER TABLE `expensetb`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incometb`
--
ALTER TABLE `incometb`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `maintainancetb`
--
ALTER TABLE `maintainancetb`
  MODIFY `maint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messagetb`
--
ALTER TABLE `messagetb`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ownertb`
--
ALTER TABLE `ownertb`
  MODIFY `owe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentertb`
--
ALTER TABLE `rentertb`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responsetb`
--
ALTER TABLE `responsetb`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roletb`
--
ALTER TABLE `roletb`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicletb`
--
ALTER TABLE `vehicletb`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicletypetb`
--
ALTER TABLE `vehicletypetb`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collectiontb`
--
ALTER TABLE `collectiontb`
  ADD CONSTRAINT `collectiontb_ibfk_1` FOREIGN KEY (`maint_id`) REFERENCES `maintainancetb` (`maint_id`),
  ADD CONSTRAINT `collectiontb_ibfk_2` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`),
  ADD CONSTRAINT `collectiontb_ibfk_3` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`);

--
-- Constraints for table `commiteetb`
--
ALTER TABLE `commiteetb`
  ADD CONSTRAINT `commiteetb_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roletb` (`role_id`),
  ADD CONSTRAINT `commiteetb_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complainttb`
--
ALTER TABLE `complainttb`
  ADD CONSTRAINT `complainttb_ibfk_1` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complainttb_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expensetb`
--
ALTER TABLE `expensetb`
  ADD CONSTRAINT `expensetb_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`);

--
-- Constraints for table `flattb`
--
ALTER TABLE `flattb`
  ADD CONSTRAINT `flattb_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incometb`
--
ALTER TABLE `incometb`
  ADD CONSTRAINT `incometb_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`);

--
-- Constraints for table `maintainancetb`
--
ALTER TABLE `maintainancetb`
  ADD CONSTRAINT `maintainancetb_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`);

--
-- Constraints for table `messagetb`
--
ALTER TABLE `messagetb`
  ADD CONSTRAINT `messagetb_ibfk_1` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messagetb_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `commiteetb` (`m_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ownertb`
--
ALTER TABLE `ownertb`
  ADD CONSTRAINT `ownertb_ibfk_1` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ownertb_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentertb`
--
ALTER TABLE `rentertb`
  ADD CONSTRAINT `rentertb_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentertb_ibfk_2` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `responsetb`
--
ALTER TABLE `responsetb`
  ADD CONSTRAINT `responsetb_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `complainttb` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicletb`
--
ALTER TABLE `vehicletb`
  ADD CONSTRAINT `vehicletb_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `vehicletypetb` (`type_id`),
  ADD CONSTRAINT `vehicletb_ibfk_2` FOREIGN KEY (`flatno`) REFERENCES `flattb` (`flatno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicletb_ibfk_3` FOREIGN KEY (`b_id`) REFERENCES `buildingtb` (`b_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
