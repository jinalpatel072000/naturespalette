-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2020 at 08:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nature`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'charmi', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `appevents`
--

CREATE TABLE `appevents` (
  `sq_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appevents`
--

INSERT INTO `appevents` (`sq_no`, `customer_id`, `event_id`) VALUES
(1, 2, 7),
(2, 2, 6),
(5, 2, 2),
(7, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `ph_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT 1,
  `subscription` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`customer_id`, `name`, `age`, `gender`, `location`, `ph_no`, `email`, `attendance`, `subscription`) VALUES
(2, 'karan', 30, 'male', 'mumbai', '1234567890', 'veenar295@gmail.com', 1, 1),
(3, 'shweta', 25, 'female', 'mumbai', '8652320137', 'jpatel7102000@gmail.com', 1, 1),
(4, 'darshan', 20, 'male', 'mumbai', '8976452130', 'craghavani342@gmail.com', 1, 1),
(5, 'animal habitats', 56, 'female', 'mumbai', '1234567890', 'craghavani342@gmail.com', 1, 1),
(9, 'hfgjfgjkfhk', 56, 'male', 'Pune', '8652320137', 'jinal.patel@somaiya.edu', 1, 1),
(10, 'animal habitats', 56, 'female', 'mumbai', '1234567890', 'craghavani342@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `creation_time`) VALUES
(1, 'm1', '2020-07-11 13:50:37'),
(2, 'safari group', '2020-07-11 13:50:37'),
(3, 'safari ', '2020-07-11 13:50:37'),
(7, 'animal safari', '2020-07-11 17:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `batch_member`
--

CREATE TABLE `batch_member` (
  `sq_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_member`
--

INSERT INTO `batch_member` (`sq_no`, `member_id`, `id`) VALUES
(44, 49, 2),
(45, 49, 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `desc_link` varchar(100) NOT NULL,
  `max_registration` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_type`, `event_name`, `start_date`, `end_date`, `desc_link`, `max_registration`, `Time`) VALUES
(2, 'Seminar', 'photography', '2020-07-18', '2020-07-20', 'photography.com', 80, '2020-07-11 13:41:10'),
(6, 'Trip', 'the zoo trip', '2020-07-31', '2020-07-31', 'zoomanagement.co.in', 80, '2020-07-11 13:41:10'),
(7, 'Seminar', 'the zoo trip', '2020-08-06', '2020-08-09', 'zoomanagement.co.in', 80, '2020-07-11 13:41:10'),
(9, 'Seminar', 'animal habitats', '2020-08-29', '2020-08-29', 'animalcare.in', 48, '2020-08-14 18:16:32'),
(12, 'Seminar', 'animal habitats', '2020-10-22', '2020-11-05', 'www.naturespalette.in', 50, '2020-10-01 14:10:47'),
(13, 'Trip', 'Sunday Stroll at the Farm', '2020-10-23', '2020-11-05', 'www.naturespalette.in', 80, '2020-10-01 16:39:33'),
(14, '', 'Sunday Stroll at the Farm', '2020-11-04', '2020-11-04', 'www.naturespalette.in', 0, '2020-10-01 16:47:43'),
(15, 'Trip', 'Sunday  at the Farm', '2020-11-06', '2020-11-07', 'www.naturespalette.in', 0, '2020-10-01 16:52:30'),
(16, 'Trip', 'Sunday  at the Farm', '2020-11-06', '2020-11-10', 'www.naturespalette.in', 38, '2020-10-01 18:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `gen_multi_img`
--

CREATE TABLE `gen_multi_img` (
  `img_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `send_email` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `username`, `email`, `send_email`) VALUES
(1, 'veena raghavani', 'veenar295@gmail.com', 1),
(2, 'jinal patel', 'jpatel7102000@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members_data`
--

CREATE TABLE `members_data` (
  `member_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ph_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_expiry` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `member_pass` varchar(100) NOT NULL,
  `batches` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_data`
--

INSERT INTO `members_data` (`member_id`, `name`, `ph_no`, `email`, `member_expiry`, `gender`, `age`, `location`, `member_pass`, `batches`) VALUES
(49, 'shweta', '9890444876', 'sraghavani1@gmail.com', '2020-08-22', 'female', 25, 'mumbai', '4620', ''),
(50, 'jinal', '9892454510', 'jinal.patel@somaiya.edu', '2020-08-28', 'female', 20, 'navi mumbai', '9465', ''),
(66, 'charmi', '7738636990', 'craghavani342@gmail.com', '2020-11-07', 'female', 20, 'pune', '0496', 'm1,safari group,safari '),
(67, 'hfgjfgjkfhk', '8652320137', 'jinal.patel@somaiya.edu', '2020-10-21', 'female', 557, 'pun', '5817', 'safari group,safari ');

-- --------------------------------------------------------

--
-- Table structure for table `member_exp`
--

CREATE TABLE `member_exp` (
  `exp_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `a_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_exp`
--

INSERT INTO `member_exp` (`exp_id`, `member_name`, `title`, `description`, `attachments`, `batch_id`, `a_time`) VALUES
(35, 'charmi', 'first newsletter ', 'it is nearer to station', 'a12.jpg', 3, '2020-08-27 17:57:17'),
(36, 'charmi', 'the exact place	Koyna ', 'it is nearer to station', 'a8.jpg', 1, '2020-08-27 17:57:32'),
(37, 'charmi', 'the exact place	Koyna ', 'it is nearer to station', 'a1.jpg', 2, '2020-08-27 17:57:46'),
(38, 'Shweta', 'the exact place	Koyna ', 'estgurtuityityuko', 'a9.jpg', 1, '2020-08-27 17:58:08'),
(39, 'charmi', 'the exact place	Koyna ', 'jhlguyoyu', 'a9.jpg', 3, '2020-08-27 17:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `member_exp1`
--

CREATE TABLE `member_exp1` (
  `exp_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `batch_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_exp1`
--

INSERT INTO `member_exp1` (`exp_id`, `member_name`, `title`, `description`, `attachments`, `message`, `add_time`, `batch_id`, `approved`) VALUES
(137, 'charmi', 'first newsletter ', 'yu8oyp0y8i', '', 'charmi  would like to request an Experience.', '2020-09-01 21:00:12', 1, 1),
(138, 'darsh kapoor', 'Coringa Wildlife Sanctuary', 'Coringa Wildlife Sanctuary is a wildlife sanctuary and estuary situated near Kakinada in Andhra Pradesh, India.[2][3] It is the second largest stretch of mangrove forests in India with 24 mangrove tree species and more than 120 bird species. It is home to the critically endangered white-backed vulture and the long billed vulture.[1] In a mangrove ecosystem the water bodies of the ocean/sea and the river meet together at a certain point.', '', 'darsh kapoor  would like to request an Experience.', '2020-09-02 18:05:01', 1, 1),
(139, 'jinal', 'Maha Ganga Wildlife Sanctuary ', 'yhuittky7k7yuoiuo8', '', 'jinal  would like to request an Experience.', '2020-09-03 13:42:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi_img`
--

CREATE TABLE `multi_img` (
  `img_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_img`
--

INSERT INTO `multi_img` (`img_id`, `img`, `e_id`) VALUES
(86, 'a6.jpg', 137),
(87, 'a7.jpg', 137),
(88, 'a10.jpg', 138),
(89, 'a11.jpg', 138),
(90, 'a12.jpg', 138),
(91, 'a1.jpg', 139),
(92, 'a6.jpg', 139),
(93, 'a7.jpg', 139);

-- --------------------------------------------------------

--
-- Table structure for table `ncgen_members`
--

CREATE TABLE `ncgen_members` (
  `gen_memberid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `ph_no` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `exp_date` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nclogin`
--

CREATE TABLE `nclogin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nclogin`
--

INSERT INTO `nclogin` (`id`, `username`, `password`) VALUES
(1, 'member', '5858');

-- --------------------------------------------------------

--
-- Table structure for table `ncmembers`
--

CREATE TABLE `ncmembers` (
  `member_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ph_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_expiry` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ncmembers`
--

INSERT INTO `ncmembers` (`member_id`, `name`, `ph_no`, `email`, `member_expiry`, `gender`, `age`, `location`, `batch_id`) VALUES
(0, 'shweta', '8652320137', 'draghavani01@gmail.com', '2020-07-01', 'female', 24, 'mumbai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nc_gen_exp`
--

CREATE TABLE `nc_gen_exp` (
  `exp_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `exp_title` varchar(60) NOT NULL,
  `exp_desc` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nc_gen_notice`
--

CREATE TABLE `nc_gen_notice` (
  `not_id` int(11) NOT NULL,
  `not_title` varchar(60) NOT NULL,
  `not_desc` text NOT NULL,
  `not_attachments` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nc_notice`
--

CREATE TABLE `nc_notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_desc` text NOT NULL,
  `attachments` varchar(100) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nc_notice`
--

INSERT INTO `nc_notice` (`notice_id`, `notice_title`, `notice_desc`, `attachments`, `batch_id`, `time`) VALUES
(11, 'junagadh exact location', 'it is nearer to station ', '../files/a10.jpg', 3, '2020-07-11 18:34:05'),
(12, 'the exact place	Koyna ', 'it is nearer to station', '../files/a7.jpg', 3, '2020-08-14 19:14:54'),
(14, 'the exact place	Koyna ', 'it is nearer to station', '../files/a9.jpg', 1, '2020-08-14 19:28:55'),
(18, 'the exact place	Koyna ', 'its beautiful ', '', 1, '2020-08-26 21:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `sr_no` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `nl_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`sr_no`, `title`, `description`, `attachments`, `nl_time`) VALUES
(5, 'safari', 'will have fun', '', '2020-07-11 18:23:33'),
(7, 'first newsletter ', ' dfhrtfigkugolyulpgyikkkkkkkuhikyuhgejihtrriyrjrjrjrjrjrjrjrjtyhhhhhhhhhhhhhhhu8jrt89898989898989hujjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjuuuuuuuuuuuuuuuuuuuuftgihhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhtu8uuuuuuuuuuuuuuutrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrooooooooooooooooooooooooooooooooooooooo', ' ../files/a9.jpg', '2020-08-17 13:01:57'),
(10, 'the exact place	Koyna ', ' ey6r4uy75tr78', ' ../files/abstract.docx', '2020-08-25 14:03:43'),
(11, 'first newsletter ', ' ghkmg', ' ../files/querycode.pdf', '2020-08-25 14:07:13'),
(12, 'Maha Ganga Wildlife Sanctuary ', ' kopuiu-[pu[i9[9o=[i0[90', ' radiol.2018180736.pdf', '2020-08-31 20:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `notice1`
--

CREATE TABLE `notice1` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_desc` varchar(100) NOT NULL,
  `attachments` varchar(100) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice1`
--

INSERT INTO `notice1` (`notice_id`, `notice_title`, `notice_desc`, `attachments`, `eventid`, `time`) VALUES
(23, 'the exact place  ', 'Koyna Wildlife Sanctuary is a wildlife sanctuary and natural World Heritage Site, which is located i', ' ../files/a7.jpg', 6, '2020-07-05 16:10:13'),
(24, 'place of visit', 'Bhadra Wildlife Sanctuary is a protected area and a tiger reserve as part of Project Tiger, situated', ' ../files/a10.jpg', 2, '2020-07-05 16:12:34'),
(26, 'instructions', 'ghfjkfkuhlkkrfshbdfhgrjnghrufjkfkjrufjruher  ', '', 2, '2020-07-12 14:12:45'),
(27, 'the exact place	Koyna ', ' Koyna Wildlife Sanctuary is a wildlife sanctuary and natural World Heritage Site, which is located ', ' ../files/a12.jpg', 2, '2020-08-14 19:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uc_gen_events`
--

CREATE TABLE `uc_gen_events` (
  `genevent_id` int(11) NOT NULL,
  `event_title` varchar(60) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `des_liink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event`
--

CREATE TABLE `upcoming_event` (
  `UCevent_id` int(11) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description_link` varchar(100) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `e_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_event`
--

INSERT INTO `upcoming_event` (`UCevent_id`, `event_type`, `event_name`, `start_date`, `end_date`, `description_link`, `batch_id`, `e_time`) VALUES
(1, 'Seminar', 'safari', '2020-07-01', '2020-08-03', 'jinal.com', 1, '2020-07-11 13:56:39'),
(2, 'Trip', 'gujarat safari ', '2020-06-25', '2020-06-26', 'uhjgkgfvik', 1, '2020-07-11 13:56:39'),
(16, 'Trip', 'the zoo trip', '2020-07-09', '2020-07-23', 'zooooo.in', 2, '2020-07-11 13:56:39'),
(69, 'Trip', 'Sunday Stroll at the Farm', '2020-08-09', '2020-08-09', 'www.goldenislesmagazine.com', 7, '2020-07-12 14:51:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appevents`
--
ALTER TABLE `appevents`
  ADD PRIMARY KEY (`sq_no`),
  ADD KEY `appevents_ibfk_1` (`customer_id`),
  ADD KEY `appevents_ibfk_2` (`event_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batch_member`
--
ALTER TABLE `batch_member`
  ADD PRIMARY KEY (`sq_no`),
  ADD KEY `batch_member_ibfk_1` (`member_id`),
  ADD KEY `batch_member_ibfk_2` (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gen_multi_img`
--
ALTER TABLE `gen_multi_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `gen_multi_img_ibfk_1` (`e_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_data`
--
ALTER TABLE `members_data`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_exp`
--
ALTER TABLE `member_exp`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `member_exp1`
--
ALTER TABLE `member_exp1`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `multi_img`
--
ALTER TABLE `multi_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `multi_img_ibfk_1` (`e_id`);

--
-- Indexes for table `ncgen_members`
--
ALTER TABLE `ncgen_members`
  ADD PRIMARY KEY (`gen_memberid`);

--
-- Indexes for table `nclogin`
--
ALTER TABLE `nclogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncmembers`
--
ALTER TABLE `ncmembers`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `nc_gen_exp`
--
ALTER TABLE `nc_gen_exp`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `nc_gen_notice`
--
ALTER TABLE `nc_gen_notice`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `nc_notice`
--
ALTER TABLE `nc_notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `notice1`
--
ALTER TABLE `notice1`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `uc_gen_events`
--
ALTER TABLE `uc_gen_events`
  ADD PRIMARY KEY (`genevent_id`);

--
-- Indexes for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  ADD PRIMARY KEY (`UCevent_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appevents`
--
ALTER TABLE `appevents`
  MODIFY `sq_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `batch_member`
--
ALTER TABLE `batch_member`
  MODIFY `sq_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gen_multi_img`
--
ALTER TABLE `gen_multi_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members_data`
--
ALTER TABLE `members_data`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `member_exp`
--
ALTER TABLE `member_exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `member_exp1`
--
ALTER TABLE `member_exp1`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `multi_img`
--
ALTER TABLE `multi_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `ncgen_members`
--
ALTER TABLE `ncgen_members`
  MODIFY `gen_memberid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nclogin`
--
ALTER TABLE `nclogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nc_gen_exp`
--
ALTER TABLE `nc_gen_exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nc_gen_notice`
--
ALTER TABLE `nc_gen_notice`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nc_notice`
--
ALTER TABLE `nc_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notice1`
--
ALTER TABLE `notice1`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `uc_gen_events`
--
ALTER TABLE `uc_gen_events`
  MODIFY `genevent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  MODIFY `UCevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appevents`
--
ALTER TABLE `appevents`
  ADD CONSTRAINT `appevents_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `applicants` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appevents_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `batch_member`
--
ALTER TABLE `batch_member`
  ADD CONSTRAINT `batch_member_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members_data` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `batch_member_ibfk_2` FOREIGN KEY (`id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gen_multi_img`
--
ALTER TABLE `gen_multi_img`
  ADD CONSTRAINT `gen_multi_img_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `nc_gen_exp` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_exp`
--
ALTER TABLE `member_exp`
  ADD CONSTRAINT `member_exp_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `member_exp1`
--
ALTER TABLE `member_exp1`
  ADD CONSTRAINT `member_exp1_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `multi_img`
--
ALTER TABLE `multi_img`
  ADD CONSTRAINT `multi_img_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `member_exp1` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ncmembers`
--
ALTER TABLE `ncmembers`
  ADD CONSTRAINT `ncmembers_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `nc_notice`
--
ALTER TABLE `nc_notice`
  ADD CONSTRAINT `nc_notice_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `notice1`
--
ALTER TABLE `notice1`
  ADD CONSTRAINT `notice1_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `table1`
--
ALTER TABLE `table1`
  ADD CONSTRAINT `table1_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `table1_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `ncmembers` (`member_id`);

--
-- Constraints for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  ADD CONSTRAINT `upcoming_event_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
