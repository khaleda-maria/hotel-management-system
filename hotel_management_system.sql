-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 09:40 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`, `access_level`, `deletion_status`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(1, 'luxury room', 'this is an wow room', 1, 1),
(2, 'Family Room', 'this is comfortable for a happy family!', 1, 1),
(4, 'Studio Room', 'awesome', 1, 1),
(7, 'Delux', 'wow category', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` int(30) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `address`, `phone_number`, `deletion_status`) VALUES
(1, 'maria', 'rahman', 'maria@gmail.com', '263bce650e68ab4e23f28263760b9fa5', 'gertbery', 1234, 1),
(2, 'Khaleda', 'Akter', 'khaleda@gmail.com', '6bf2ec7be1181b4f17824ffe7266c7af', 'abc', 123456, 1),
(6, 'mazharul', 'Islam', 'mazharulslm9@gmail.com', 'b352eefad3780f23439eac78995f36fa', 'abc', 12345, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(100) NOT NULL,
  `gallery_des` text NOT NULL,
  `gallery_date` date NOT NULL,
  `gallery_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_des`, `gallery_date`, `gallery_image`, `publication_status`, `deletion_status`) VALUES
(2, 'Front view of Hotel', 'this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel', '2016-05-14', '../assets/admin_assets/gallery_image/gallery-2.jpg', 1, 1),
(3, 'Front view of  restaurent', 'this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel this is wow view of hotel', '2016-05-12', '../assets/admin_assets/gallery_image/gallery-5.jpg', 1, 1),
(4, ' Excellent Beach View', 'Best beach View  Best beach View  Best beach View  Best beach View  Best beach View  Best beach View  Best beach View  Best beach View ', '2016-05-02', '../assets/admin_assets/gallery_image/gallery-6.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `res_id` int(11) NOT NULL,
  `session_id` varchar(60) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `total_room` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`res_id`, `session_id`, `arrival_date`, `departure_date`, `total_room`, `category_id`, `adult`, `children`, `deletion_status`) VALUES
(13, '2cf0k4g7hfd9pgfesro6l7go67', '2016-05-14', '2016-05-16', 2, '4', 2, 1, 1),
(20, 'e80s6t09tsihsjfh7dmeikboj2', '2016-05-14', '2016-05-17', 1, '1', 2, 1, 1),
(21, '', '2017-01-24', '2017-01-27', 2, '<br />\r\n<b>Notice</b>:  Undefined variable: category_info in <b>C:xampphtdocsfinal_hmssource_filespages\reservation_by_room_id_content.php</b> on line <b>68</b><br />\r\n', 2, 1, 1),
(22, '', '2017-01-23', '2017-01-26', 2, '<br />\r\n<b>Notice</b>:  Undefined variable: category_info in <b>C:xampphtdocsfinal_hmssource_filespages\reservation_by_room_id_content.php</b> on line <b>68</b><br />\r\n', 2, 1, 1),
(23, '', '2017-01-24', '2017-01-27', 2, '<br />\r\n<b>Notice</b>:  Undefined variable: category_info in <b>C:xampphtdocsfinal_hmssource_filespages\reservation_by_room_id_content.php</b> on line <b>68</b><br />\r\n', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(10) NOT NULL,
  `room_num` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `room_short_des` text NOT NULL,
  `room_long_des` text NOT NULL,
  `room_price` float NOT NULL,
  `room_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_num`, `room_name`, `category_id`, `room_short_des`, `room_long_des`, `room_price`, `room_image`, `publication_status`, `deletion_status`) VALUES
(10, 105, 'CHAMELI', 1, 'wow room', 'wow room wow room wow room wow room wow room wow room wow room wow room wow room wow room wow room wow room', 12000, '../assets/admin_assets/room_image/room_2.jpg', 1, 1),
(11, 104, 'CHAMPA', 2, 'best for family Relaxation ', 'best for family Relaxation best for family Relaxation best for family Relaxation best for family Relaxation best for family Relaxation best for family Relaxation best for family Relaxation', 15000, '../assets/admin_assets/room_image/room_4.jpg', 1, 1),
(12, 101, 'CHANDA', 1, 'wow room for luxury in your leisure!', 'wow room for luxury in your leisure! wow room for luxury in your leisure! wow room for luxury in your leisure! wow room for luxury in your leisure! wow room for luxury in your leisure! wow room for luxury in your leisure!', 20000, '../assets/admin_assets/room_image/room_5.jpg', 1, 1),
(13, 102, 'TOGOR', 4, 'best for your shooting!', 'best for your shooting! best for your shooting! best for your shooting! best for your shooting! best for your shooting! best for your shooting! best for your shooting! best for your shooting!', 14000, '../assets/admin_assets/room_image/room_3.jpg', 1, 1),
(14, 103, 'MALOTI', 1, 'best for your Luxury Period!', 'best for your Luxury Period! best for your Luxury Period! best for your Luxury Period! best for your Luxury Period! best for your Luxury Period! best for your Luxury Period! best for your Luxury Period!', 21000, '../assets/admin_assets/room_image/room_1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_subtitle` varchar(100) NOT NULL,
  `special_offer` int(10) NOT NULL,
  `slider_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slider_subtitle`, `special_offer`, `slider_image`, `publication_status`, `deletion_status`) VALUES
(1, 'GOLAP', 'Special Offer', 12000, '../assets/admin_assets/slider_image/slider-1.jpg', 1, 1),
(2, 'FAMILY', 'We are offering', 10000, '../assets/admin_assets/slider_image/slider-2.jpg', 0, 1),
(3, 'FAMILY', 'We are offering', 10000, '../assets/admin_assets/slider_image/best-canary-island_3526891b.jpg', 1, 0),
(4, 'FAMILY', 'We are offering', 10000, '../assets/admin_assets/slider_image/slider-4.jpg', 1, 1),
(11, 'LUXURY', 'Special Offer', 7000, '../assets/admin_assets/slider_image/slider-2.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
