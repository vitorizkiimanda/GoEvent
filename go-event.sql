-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 03:42 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go-event`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_certificate`
--

CREATE TABLE `album_certificate` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendant`
--

CREATE TABLE `attendant` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_id` varchar(50) NOT NULL,
  `arrival_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendant`
--

INSERT INTO `attendant` (`user_id`, `event_id`, `status`, `ticket_id`, `arrival_time`) VALUES
(1, 20, 1, 'B25', '06:38:44'),
(5, 20, 1, 'B26', '06:46:02'),
(3, 20, 1, 'B27', '10:09:54'),
(4, 20, 1, 'B30', '10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_city` text NOT NULL,
  `event_date_starts` date NOT NULL,
  `event_time_starts` time NOT NULL,
  `event_date_ends` date NOT NULL,
  `event_time_ends` time NOT NULL,
  `event_capacity` int(11) NOT NULL,
  `event_certificate` text NOT NULL,
  `event_description` text NOT NULL,
  `event_photo` text NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `ticket_name` varchar(50) NOT NULL,
  `ticket_quantity` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `ticket_description` text NOT NULL,
  `ticket_date_starts` date NOT NULL,
  `ticket_time_starts` time NOT NULL,
  `ticket_date_ends` date NOT NULL,
  `ticket_time_ends` time NOT NULL,
  `event_type` varchar(35) NOT NULL,
  `event_topic` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_city`, `event_date_starts`, `event_time_starts`, `event_date_ends`, `event_time_ends`, `event_capacity`, `event_certificate`, `event_description`, `event_photo`, `organizer_id`, `ticket_name`, `ticket_quantity`, `ticket_price`, `ticket_description`, `ticket_date_starts`, `ticket_time_starts`, `ticket_date_ends`, `ticket_time_ends`, `event_type`, `event_topic`) VALUES
(1, 'EVALUASI', '0', '2017-12-03', '14:22:00', '2017-12-06', '23:57:00', 10, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '1_photo.jpeg', 1, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', ''),
(16, 'EVALUASI1', 'lokasi event 1', '2017-12-03', '14:22:00', '2017-12-06', '23:57:00', 10, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '1_photo.jpeg', 1, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', ''),
(17, 'COMPLETE', 'lokasi COMPLETE', '2017-12-30', '14:22:00', '2017-12-31', '23:57:00', 100, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '1_photo.jpeg', 1, 'TIker Complete', 100, 100, 'deskripsi tiket', '2017-12-16', '02:12:10', '2017-12-18', '03:00:00', 'social', 'party'),
(19, 'Percobaan 1', 'Perumnas Klender, Jalan Penggilingan, Penggilingan, East Jakarta City, Jakarta, Indonesia', '2017-12-11', '00:01:00', '2017-12-11', '01:01:00', 1500, 'certificate_template', '<p>digoyang jarang goyang</p>\r\n', '18_photo.jpeg', 11, 'vvip', 12, 10000, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Attraction', 'Charity'),
(20, 'Percobaan attendant', 'Attauhid Arh - UI, Kenari, Central Jakarta City, Jakarta, Indonesia', '2017-12-11', '01:00:00', '2017-12-11', '02:01:00', 132, 'certificate_template', '<p>Kita nobar bareng modul ini bisa atau tidak</p>\r\n', '20_photo.png', 12, 'coba saja', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Party or Social Gathering', 'Hobbies & Special Interest'),
(22, 'Percobaan  attendant 2', 'Michigan, United States', '2017-12-22', '01:00:00', '2017-12-22', '01:22:00', 1346, 'certificate_template', '<p>percobaan ini dengan penuh kesadaran</p>\r\n', '21_photo.jpeg', 12, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Tournament', 'Holiday'),
(23, 'percobaan 3', 'Oklahoma City, OK, United States', '2017-12-12', '05:00:00', '2017-12-12', '15:00:00', 145, 'certificate_template', '<p>The&nbsp;<em>Time</em>&nbsp;&amp; language tab in the new&nbsp;<em>Windows 10</em>&nbsp;Settings menu is pretty straightforward. This is where you go to&nbsp;<em>change</em>&nbsp;the&nbsp;<em>time</em>&nbsp;and date, add languages (read: keyboards) to your PC, and adjust the speech settings</p>\r\n', '23_photo.jpeg', 12, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Rally', 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `category_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `organizer_id` int(11) NOT NULL,
  `organizer_name` varchar(30) NOT NULL,
  `organizer_description` text NOT NULL,
  `organizer_phone_number` varchar(100) NOT NULL,
  `organizer_address` text NOT NULL,
  `organizer_website` text NOT NULL,
  `organizer_facebook` varchar(100) NOT NULL,
  `organizer_twitter` varchar(100) NOT NULL,
  `organizer_instagram` varchar(100) NOT NULL,
  `organizer_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`organizer_id`, `organizer_name`, `organizer_description`, `organizer_phone_number`, `organizer_address`, `organizer_website`, `organizer_facebook`, `organizer_twitter`, `organizer_instagram`, `organizer_photo`) VALUES
(0, '', '                  ', '', '', 'http://', 'facebook.com/', '@', '@', ''),
(5, 'percobaan pertama <plis update', '<p>MENCOBA UNTUK UPDATE</p>\r\n', '00099901', 'Sumedang Utara, Kabupaten Sumedang, Jawa Barat, Indonesia', 'http://iasijansansas', 'facebook.com/kokoq', '@kokoq', '@kokoq', '1_photo.png'),
(10, 'ganti nama coy', '', '0000000', 'Kalimantan Barat, Indonesia', 'http://kalbar.com', 'facebook.com/aadadad', '@adadad', 'dadaddada', 'dummy'),
(11, 'Wiwiw inc', '<p>ini adalah sebuah awal baru,&nbsp;</p>\r\n', '085695534839', 'Bratwin, Poland', 'http://wiwiwinc.com', 'facebook.com/wiwiwinc', '@wiwiwinc', '@wiwiwinc', 'dummy'),
(12, 'wiwiw ggmu', '<p>Glory Glory Manchester United, penyelenggara nobar, futsal bareng, CFD, meet up untuk reds army all Indonesia</p>\r\n', '085695534839', 'Manchester, United Kingdom', 'http://ggmu.wiwiw.go.id', 'facebook.com/ggmuwiwiw', '@ggmuwiwiw', '@ggmuwiwiw', 'dummy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_city` varchar(25) NOT NULL,
  `user_photo` text NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_uid`, `user_name`, `user_email`, `user_city`, `user_photo`, `user_password`) VALUES
(1, '102317590542089034006', 'Nuh Satria', 'nuhsatria@gmail.com', 'in', 'https://lh3.googleusercontent.com/-hsFKkGn6NuE/AAAAAAAAAAI/AAAAAAAACGo/RDsUwlhzzpU/photo.jpg', ''),
(2, '', 'nuhsat', 'nuhsat@gmail.com', 'Jakarta', '', '5e3aaac127513d79ca5aabb98dc727ee'),
(3, '', 'nuhsat123', 'nuhsat123@gmail.com', '', '', '5e3aaac127513d79ca5aabb98dc727ee'),
(4, '', 'nuhsat1234', 'nuhsat1234@gmail.com', '', '', 'be25c5d37b695f7f493fc2680f7fad7b'),
(5, '111743426734842217525', 'Zulfahmi Habibi', 'ibnuhadi11@gmail.com', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', ''),
(12, '106823636034594991808', 'Noer Herlambang', 'noer.herlambang@gmail.com', '', 'https://lh4.googleusercontent.com/-FVqmihl3XHw/AAAAAAAAAAI/AAAAAAAAEms/fwjrPTkg65Y/photo.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_organizer`
--

CREATE TABLE `user_organizer` (
  `user_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_organizer`
--

INSERT INTO `user_organizer` (`user_id`, `organizer_id`) VALUES
(5, 1),
(5, 2),
(5, 0),
(5, 0),
(5, 0),
(5, 9),
(5, 6),
(6, 11),
(12, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
