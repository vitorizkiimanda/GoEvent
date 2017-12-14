-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 03:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, 20, 1, 'B30', '10:11:55'),
(6, 27, 0, 'EV89627000', '00:00:00'),
(13, 29, 1, 'EV36132900', '02:58:26'),
(13, 36, 0, 'EV63133600', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`user_id`, `event_id`) VALUES
(13, 25);

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
-- Table structure for table `certificate_format`
--

CREATE TABLE `certificate_format` (
  `event_id` int(31) NOT NULL,
  `certificate_image` text NOT NULL,
  `font_size` varchar(100) NOT NULL,
  `font` varchar(100) NOT NULL,
  `origin_x` float NOT NULL,
  `origin_y` float NOT NULL,
  `color_r` int(11) NOT NULL,
  `color_g` int(11) NOT NULL,
  `color_b` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `rotation` int(11) NOT NULL DEFAULT '0'
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
  `event_video` varchar(255) NOT NULL,
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
  `event_topic` varchar(35) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_city`, `event_date_starts`, `event_time_starts`, `event_date_ends`, `event_time_ends`, `event_capacity`, `event_certificate`, `event_description`, `event_video`, `event_photo`, `organizer_id`, `ticket_name`, `ticket_quantity`, `ticket_price`, `ticket_description`, `ticket_date_starts`, `ticket_time_starts`, `ticket_date_ends`, `ticket_time_ends`, `event_type`, `event_topic`, `latitude`, `longitude`) VALUES
(1, 'EVALUASI', '0', '2017-12-03', '14:22:00', '2017-12-06', '23:57:00', 10, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '', '1_photo.jpeg', 1, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', 0, 0),
(16, 'EVALUASI1', 'lokasi event 1', '2017-12-03', '14:22:00', '2017-12-06', '23:57:00', 10, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '', '1_photo.jpeg', 1, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', 0, 0),
(17, 'COMPLETE', 'lokasi COMPLETE', '2017-12-30', '14:22:00', '2017-12-31', '23:57:00', 100, '1_certificate.jpeg', 'EVALUASI PAS mpkmb', '', '1_photo.jpeg', 1, 'TIker Complete', 100, 100, 'deskripsi tiket', '2017-12-16', '02:12:10', '2017-12-18', '03:00:00', 'social', 'party', 0, 0),
(19, 'Percobaan 1', 'Perumnas Klender, Jalan Penggilingan, Penggilingan, East Jakarta City, Jakarta, Indonesia', '2017-12-11', '00:01:00', '2017-12-11', '01:01:00', 1500, 'certificate_template', '<p>digoyang jarang goyang</p>\r\n', '', '18_photo.jpeg', 11, 'vvip', 12, 10000, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Attraction', 'Charity', 0, 0),
(20, 'Percobaan attendant', 'Attauhid Arh - UI, Kenari, Central Jakarta City, Jakarta, Indonesia', '2017-12-11', '01:00:00', '2017-12-11', '02:01:00', 132, 'certificate_template', '<p>Kita nobar bareng modul ini bisa atau tidak</p>\r\n', '', '20_photo.png', 12, 'coba saja', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Party or Social Gathering', 'Hobbies & Special Interest', 0, 0),
(22, 'Percobaan  attendant 2', 'Michigan, United States', '2017-12-22', '01:00:00', '2017-12-22', '01:22:00', 1346, 'certificate_template', '<p>percobaan ini dengan penuh kesadaran</p>\r\n', '', '21_photo.jpeg', 12, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Tournament', 'Holiday', 0, 0),
(23, 'percobaan 3', 'Oklahoma City, OK, United States', '2017-12-12', '05:00:00', '2017-12-12', '15:00:00', 145, 'certificate_template', '<p>The&nbsp;<em>Time</em>&nbsp;&amp; language tab in the new&nbsp;<em>Windows 10</em>&nbsp;Settings menu is pretty straightforward. This is where you go to&nbsp;<em>change</em>&nbsp;the&nbsp;<em>time</em>&nbsp;and date, add languages (read: keyboards) to your PC, and adjust the speech settings</p>\r\n', '', '23_photo.jpeg', 12, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Rally', 'Music', 0, 0),
(24, 'video', 'Texas, United States', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', 'https://www.youtube.com/watch?v=xE-Ogt9Sc_E', '24_photo.', 11, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(25, 'video 2', 'Dramaga, Bogor, West Java, Indonesia', '2017-12-29', '01:00:00', '2017-01-31', '01:00:00', 1000, 'certificate_template', '<p>tes video asyik</p>\r\n', 'https://www.youtube.com/watch?v=xE-Ogt9Sc_E', '25_photo.jpeg', 11, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Attraction', 'Health & Wellness', 0, 0),
(26, 'sfsdkljfl;kj;LKJSFL', 'KJFLKJDF;LKSJDF', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', '', '26_photo.png', 11, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(27, 'Cerita Daur Ulang (Recycling Story) I 6 - 12 Tahun', 'South Jakarta, South Jakarta City, Jakarta, Indonesia', '2017-12-25', '05:00:00', '2017-12-26', '09:00:00', 1020, 'certificate_template', '<p><strong>REGISTRATIONS ARE CLOSED</strong></p>\r\n\r\n<p>Maaf, kuota peserta untuk acara ini telah penuh. Silakan mendaftar untuk program dan lokakarya kami yang lain. Terima kasih, Tim Festival Cerita Jakarta</p>\r\n\r\n<h3><strong>DESCRIPTION</strong></h3>\r\n\r\n<p>Mari kita memanfaatkan barang-barang bekas untuk menjadi sesuatu yang bermanfaat. Pada workshop ini, kalian diajarkan bagaimana membuat wayang-wayangan dari bahan-bahan yang sudah tidak terpakai. Selain itu, kalian belajar membuat cerita dari wayang-wayang tersebut.</p>\r\n\r\n<p>---------</p>\r\n\r\n<p><em>Let&#39;s reuse our used goods into someting useful. in this workshop, you will learn to make puppet dolls from used goods. And then, you will learn to create a story for the puppets, too.</em></p>\r\n', 'https://www.youtube.com/watch?v=b7GMpjx2jDQ', '27_photo.jpeg', 11, 'Green', 100, 0, 'Green movement', '2017-12-29', '01:00:00', '2017-12-23', '02:00:00', 'Festival or Fair', 'Home & Lifestyle', 0, 0),
(28, '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', '', '28_photo.', 0, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(29, 'Berbayar', 'Payakumbuh, Payakumbuh City, West Sumatra, Indonesia', '2017-12-31', '01:00:00', '2018-01-01', '01:00:00', 1, 'certificate_template', '<p>bayar tong gua sleding lu</p>\r\n', 'http://youtube.com/watch?v=rvrZJ5C_Nwg', '29_photo.jpeg', 13, 'bayar', 1, 10000, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(30, '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', '', '30_photo.', 13, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(31, 'H - 1 panjng w;lkje;lkwjer;lkjwe;lkrjewrewkjr hwek', 'Dramaga, Bogor, West Java, Indonesia s;ladkjf;lksjdf ;lsdkjf ;sldkj f;aslk djfs;d lkjfsd; lkjfsd ;lksdjf ;sdlfk jsdf; lkjfds; lkajs', '2017-12-30', '01:00:00', '2017-12-31', '01:00:00', 100, 'certificate_template', '<p>tes aja hehe</p>\r\n', '', '31_photo.re.jpg', 13, 'tes', 1, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Rally', 'Performing & Visual Arts', 0, 0),
(32, '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', '', '32_photo.', 13, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(33, '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 'certificate_template', '', '', '33_photo.', 13, '', 0, 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(34, ';asldkfj', ';lkdsjf;lsdkjf', '0898-08-07', '08:07:00', '0081-12-01', '08:18:00', 9, 'certificate_template', '', 'https://www.youtube.com/watch?v=xE-Ogt9Sc_E', '34_photo.or.jpg', 13, ';sladkfj', 2, 2, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(35, 'sadjfs;dfj', ';lkjds;lfkj', '0000-00-00', '09:08:00', '0000-00-00', '01:00:00', 897, 'certificate_template', '<p>kjshdflksjhdf</p>\r\n', 'https://www.youtube.com/watch?v=xE-Ogt9Sc_E', '35_photo.or.jpg', 13, '987', 987, 987987, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', 0, 0),
(36, 'tes map', 'dramaga', '2017-12-14', '22:01:00', '2017-12-14', '01:00:00', 1, 'certificate_template', '<p>;lsdkfjskd</p>\r\n', 'https://www.youtube.com/watch?v=xE-Ogt9Sc_E', '36_photo.or.jpg', 13, ';lfd', 1, 1, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Select Event Type', 'Select a topic', -6.64176, 106.69);

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
(12, 'wiwiw ggmu', '<p>Glory Glory Manchester United, penyelenggara nobar, futsal bareng, CFD, meet up untuk reds army all Indonesia</p>\r\n', '085695534839', 'Manchester, United Kingdom', 'http://ggmu.wiwiw.go.id', 'facebook.com/ggmuwiwiw', '@ggmuwiwiw', '@ggmuwiwiw', 'dummy'),
(13, 'IPB', '<p>Institut Pertanian Bogor adalah lembaga pendidikan tinggi pertanian yang secara historis merupakan bentukan dari lembaga-lembaga pendidikan menengah dan tinggi pertanian serta kedokteran hewan yang dimulai telah pada awal abad ke-20 di Bogor.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Embryonal_step-5">[5]</a>&nbsp;Sebelum Perang Dunia II, lembaga-lembaga pendidikan menengah tersebut dikenal dengan nama&nbsp;<em>Middelbare Landbouwschool</em>,&nbsp;<em>Middelbare Bosbouwschool</em>&nbsp;dan&nbsp;<em>Nederlandndiche Veeartsenschool</em>.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Embryonal_step-5">[5]</a></p>\r\n\r\n<p>IPB saat ini berlokasi dilaaya Dramaga, Katan&nbsp;<a href="https://id.wikipedia.org/wiki/Dramaga,_Bogor">Dramaga</a>,&nbsp;<a href="https://id.wikipedia.org/wiki/Kabupaten_Bogor">Kabupaten Bogor</a>,&nbsp;<a href="https://id.wikipedia.org/wiki/Provinsi_Jawa_Barat">Provinsi Jawa Barat</a>.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Panduan_2007-2">[2]</a></p>\r\n\r\n<p>Lahirnya Institut Pertanian Bogor (IPB) pada tanggal&nbsp;<a href="https://id.wikipedia.org/wiki/1_September">1 September</a>&nbsp;1963 berdasarkan keputusan Menteri Perguruan Tinggi dan Ilmu Pengetahuan (PTIP) No. 92/1963 yang kemudian disahkan oleh Presiden RI Pertama dengan Keputusan No. 279/1965.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Panduan_2007-2">[2]</a>&nbsp;Pada saat itu, dua fakultas di Bogor yang berada dalam naungan UI berkembang menjadi 5 fakultas, yaitu Fakultas Pertanian, Fakultas Kedokteran Hewan, Fakultas Perikanan, Fakultas Peternakan dan Fakultas Kehutanan. Pada tahun 1964, lahir Fakultas Teknologi dan Mekanisasi Pertanian yang kini menjadi Fakultas Teknologi Pertanian.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Panduan_2007-2">[2]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Panduan_TEP_2009-6">[6]</a></p>\r\n\r\n<p>Pada tanggal&nbsp;<a href="https://id.wikipedia.org/wiki/26_Desember">26 Desember</a>&nbsp;2000, pemerintah Indonesia mengesahkan status otonomi IPB berdasarkan PP no. 152. Semenjak itu IPB merupakan perguruan tinggi berstatus Badan Hukum Milik Negara (BHMN).<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-Panduan_2007-2">[2]</a></p>\r\n\r\n<p>Tahun 2005 IPB menerapkan sistem mayor minor sebagai pengganti sistem kurikulum nasional.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-undergraduate-7">[7]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-8">[8]</a>&nbsp;Sistem ini hanya diterapkan di IPB.[<em><a href="https://id.wikipedia.org/wiki/Wikipedia:Kutip_sumber_tulisan">butuh rujukan</a></em>]&nbsp;Setiap mahasiswa IPB dimungkinkan mengambil dua atau bahkan lebih mata keahlian (jurusan) yang diminatinya.<a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-undergraduate-7">[7]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-9">[9]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-10">[10]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-11">[11]</a><a href="https://id.wikipedia.org/wiki/Institut_Pertanian_Bogor#cite_note-12">[12]</a></p>\r\n', '089657011491', 'Dramaga, Bogor, West Java, Indonesia', 'http://google.com', 'facebook.com/vitorizkiimanda', '@vito_rizki_i', '@vito_rizki_i', ' 13_photo.jpeg'),
(15, 'tes', '<p>tes</p>\r\n', '0982348', 'Dramaga, Bogor, West Java, Indonesia', 'http://google.com', 'facebook.com/vitorizkiimanda', '@vito_rizki_i', '@vito_rizki_i', '14_photo.'),
(18, ';lkdajf', '<p>;lkjds;flkj</p>\r\n', '0980', 'Dramaga, Bogor, West Java, Indonesia', 'http://google.com', 'facebook.com/', '@', '@', '16_photo.'),
(19, 'IPB', '<p>IPB ku</p>\r\n', '089657011492', 'Dramaga, Bogor, West Java, Indonesia', 'http://ipb.ac.id', 'facebook.com/ipb', '@vito_rizki_i', '@vito_rizki_i', '19_photo.pb.png'),
(20, 'ABCD', '<p>abcd</p>\r\n', '089608960896', 'Dramaga, Bogor, West Java, Indonesia', 'http://google.com', 'facebook.com/vitorizkiimanda', '@vito_rizki_i', '@vito_rizki_i', '20_photo.');

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
(12, '106823636034594991808', 'Noer Herlambang', 'noer.herlambang@gmail.com', '', 'https://lh4.googleusercontent.com/-FVqmihl3XHw/AAAAAAAAAAI/AAAAAAAAEms/fwjrPTkg65Y/photo.jpg', ''),
(13, '', 'Vito Rizki Imanda', 'vitorizkiimanda@gmail.com', 'dsafj', '', 'c97050f510a1a9384d4d8d04e41ea0be');

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
(12, 12),
(13, 13),
(13, 14),
(13, 16),
(13, 19),
(13, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `certificate_format`
--
ALTER TABLE `certificate_format`
  ADD UNIQUE KEY `event_id` (`event_id`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
