-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 07:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_link` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url_link`, `status`) VALUES
(1, 'Syllabus', 'syllabus.php', '1'),
(2, 'Textbook\'s', 'textbooks.php', '1'),
(3, 'Manuals', 'manuals.php', '1'),
(4, 'Reference Book\'s', 'reference-books.php', '1'),
(5, 'Videos', 'videos.php', '1'),
(6, 'Notes', 'notes.php', '1'),
(7, 'Assignments', 'assignments.php', '1'),
(8, 'Examinations', 'examinations.php', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Sem III'),
(2, 'Sem IV');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `description`, `date`) VALUES
(1, 1, 'Welcome to the Md EduChem', '2021-06-06 09:55:59'),
(2, 1, 'Welcome to the Md EduChem', '2021-06-06 09:58:09'),
(3, 1, 'hello sir', '2021-06-15 18:38:53'),
(4, 21, 'website 90% completed', '2021-06-15 21:24:39'),
(5, 21, 'hello ', '2021-06-16 16:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `material_title` varchar(255) NOT NULL,
  `thambnail_url` varchar(255) DEFAULT NULL,
  `material_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `class_id`, `subject_id`, `category_id`, `material_title`, `thambnail_url`, `material_url`) VALUES
(27, 1, 1, 2, 'English', 'Dashboard/image/thambnail/2021/May/2202105022326.jpeg', 'material/2021/May/2202105022326.pdf'),
(28, 1, 1, 2, 'testing 4', 'Dashboard/image/thambnail/2021/May/2202105023628.jpeg', 'material/2021/May/2202105023628.pdf'),
(29, 1, 1, 2, 'testing 5', 'Dashboard/image/thambnail/2021/May/2202105024022.jpeg', 'material/2021/May/2202105024022.pdf'),
(30, 1, 1, 1, 'English syllabus', 'Dashboard/image/thambnail/2021/May/1202105074546.jpeg', 'material/2021/May/1202105074546.pdf'),
(31, 1, 1, 1, 'English', 'Dashboard/image/thambnail/2021/May/1202105075637.jpeg', 'material/2021/May/1202105075637.pdf'),
(32, 1, 1, 3, 'English', 'Dashboard/image/thambnail/2021/May/3202105075727.jpeg', 'material/2021/May/3202105075727.pdf'),
(33, 1, 1, 4, 'English', 'Dashboard/image/thambnail/2021/May/4202105080234.jpeg', 'material/2021/May/4202105080234.pdf'),
(34, 1, 1, 6, 'English', 'Dashboard/image/thambnail/2021/May/6202105081513.jpeg', 'material/2021/May/6202105081513.pdf'),
(35, 1, 1, 7, 'English', 'Dashboard/image/thambnail/2021/June/7202106071212.jpeg', 'material/2021/June/7202106071212.pdf'),
(38, 1, 3, 1, 'testing 12', 'Dashboard/image/thambnail/2021/June/1202106113355.jpeg', 'material/2021/June/1202106113354.pdf'),
(40, 2, 1, 2, 'English', 'Dashboard/image/thambnail/2021/June/2202106121532.jpeg', 'material/2021/June/2202106121532.pdf'),
(41, 2, 2, 3, 'testing 4', 'Dashboard/image/thambnail/2021/June/3202106010823.jpeg', 'material/2021/June/3202106010823.pdf'),
(42, 1, 1, 1, 'OOP', 'Dashboard/image/thambnail/2021/June/1202106053143.jpeg', 'material/2021/June/1202106053143.pdf'),
(43, 2, 6, 4, 'java', 'Dashboard/image/thambnail/2021/June/4202106063724.jpeg', 'material/2021/June/4202106063724.pdf'),
(44, 1, 3, 6, 'demo', 'Dashboard/image/thambnail/2021/June/6202106041210.jpeg', 'material/2021/June/6202106041210.pdf'),
(45, 1, 3, 5, 'demo', 'Dashboard/image/thambnail/video/2021/June/5202106042022.jpg', 'https://youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifiacation`
--

CREATE TABLE `notifiacation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifiacation`
--

INSERT INTO `notifiacation` (`id`, `title`, `date`) VALUES
(23, 'Welcome to the GPT', '2021-06-15 18:50:17'),
(24, 'Sem III and Sem IV classrooms are available', '2021-06-15 18:51:08'),
(25, 'Project introduction meeting started', '2021-06-16 16:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class_id`) VALUES
(1, 'Object Oreiented Programming Using \'C++\'', 1),
(2, 'Data Structure Using \'C\'', 1),
(3, 'Computer Graphics', 1),
(4, 'Database Management System', 1),
(5, 'Digital Techniques', 1),
(6, 'Java Programming', 2),
(7, 'Software Engineering', 2),
(8, 'Data Communication and Computer Network', 2),
(9, 'Microprocessers', 2),
(10, 'GUI Application Development Using VB.Net', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `college name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_role` enum('1','2') NOT NULL DEFAULT '2',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `college name`, `mobile`, `course_id`, `password`, `date`, `payment_status`, `user_role`, `status`) VALUES
(1, 'GODSE VINAYAK HARISHCHANDRA', 'VINAYAKGODSE97@GMAIL.COM', 'GPT', '9404846862', 1, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-04 19:31:09', '0', '1', '1'),
(2, 'Vinayak Godse1', 'VINAYAKGODSE9@GMAIL.COM', 'GPT', '7028589303', 1, '202cb962ac59075b964b07152d234b70', '2021-06-04 20:00:13', '0', '2', '1'),
(16, 'Vinayak Godse', 'vinayak.occinfotech@gmail.com', 'GPT', '7028589303', 2, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-06 21:15:46', '0', '2', '1'),
(21, 'Harishchandra Ramchandra Godse', 'harishgodse973@gmail.com', 'GPT', '8779961334', 1, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-15 21:21:29', '0', '2', '1'),
(22, 'Vinayak Godse', 'godsevinayak79@gmail.com', 'GPT', '7028589303', 1, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-16 15:45:59', '0', '2', '1'),
(23, 'divya', 'divya20patil@gmail.com', 'GPT', '0123456789', 2, 'c20ad4d76fe97759aa27a0c99bff6710', '2021-06-16 16:24:02', '0', '2', '1'),
(24, 'Divya', '20divyapatil@gmail.com', 'GPT', '0123456789', 2, 'c20ad4d76fe97759aa27a0c99bff6710', '2021-06-16 16:25:29', '0', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifiacation`
--
ALTER TABLE `notifiacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifiacation`
--
ALTER TABLE `notifiacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
