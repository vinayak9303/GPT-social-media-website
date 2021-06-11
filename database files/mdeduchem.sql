-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 10:24 PM
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
-- Database: `mdeduchem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url_link`) VALUES
(1, 'Syllabus', 'syllabus.php'),
(2, 'Textbook', 'textbooks.php'),
(3, 'Practical Book', 'practical-books.php'),
(4, 'Reference Book', 'reference-books.php'),
(5, 'Video', 'videos.php'),
(6, 'Notes', 'notes.php'),
(7, 'Exercise', 'exercises.php'),
(8, 'Examination', 'examinations.php'),
(9, 'CET', 'cet.php'),
(10, 'Career Guidance', 'career-guidance.php');

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
(1, '11th'),
(2, '12th'),
(3, '11th + 12th');

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
(27, 1, 1, 2, 'English', 'Admin/image/thambnail/2021/May/2202105022326.jpeg', 'material/2021/May/2202105022326.pdf'),
(28, 1, 1, 2, 'testing 4', 'Admin/image/thambnail/2021/May/2202105023628.jpeg', 'material/2021/May/2202105023628.pdf'),
(29, 1, 1, 2, 'testing 5', 'Admin/image/thambnail/2021/May/2202105024022.jpeg', 'material/2021/May/2202105024022.pdf'),
(30, 1, 1, 1, 'English syllabus', 'Admin/image/thambnail/2021/May/1202105074546.jpeg', 'material/2021/May/1202105074546.pdf'),
(31, 1, 1, 1, 'English', 'Admin/image/thambnail/2021/May/1202105075637.jpeg', 'material/2021/May/1202105075637.pdf'),
(32, 1, 1, 3, 'English', 'Admin/image/thambnail/2021/May/3202105075727.jpeg', 'material/2021/May/3202105075727.pdf'),
(33, 1, 1, 4, 'English', 'Admin/image/thambnail/2021/May/4202105080234.jpeg', 'material/2021/May/4202105080234.pdf'),
(34, 1, 1, 6, 'English', 'Admin/image/thambnail/2021/May/6202105081513.jpeg', 'material/2021/May/6202105081513.pdf'),
(35, 1, 1, 7, 'English', 'Admin/image/thambnail/2021/June/7202106071212.jpeg', 'material/2021/June/7202106071212.pdf'),
(38, 1, 3, 1, 'testing 12', 'Admin/image/thambnail/2021/June/1202106113355.jpeg', 'material/2021/June/1202106113354.pdf');

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
(20, 'Welcome to the Md EduChem', '2021-06-05 14:28:29'),
(22, 'Welcome to the Md EduChem 11th class', '2021-06-05 21:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cet` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `cet`) VALUES
(1, 'English', '0'),
(2, 'Marathi', '0'),
(3, 'Physics', '1'),
(4, 'Chemistry', '1'),
(5, 'Biology', '1'),
(6, 'Mathematics', '1'),
(7, 'IT', '0'),
(8, 'Computer Science', '0'),
(9, 'AST', '0'),
(10, 'Crop Science', '0'),
(11, 'Animal Science', '0'),
(12, 'Geography', '0'),
(13, 'Environment Education', '0'),
(14, 'Physical Education', '0');

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
  `user_role` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `college name`, `mobile`, `course_id`, `password`, `date`, `payment_status`, `user_role`) VALUES
(1, 'GODSE VINAYAK HARISHCHANDRA', 'VINAYAKGODSE97@GMAIL.COM', 'GPT', '9404846862', 1, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-04 19:31:09', '0', '1'),
(2, 'Vinayak Godse', 'VINAYAKGODSE9@GMAIL.COM', 'GPT', '7028589303', 1, 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-04 20:00:13', '0', '2'),
(3, 'Vinayak Godse', 'harishgodse973@gmail.com', 'GPT', '7028589303', 3, 'c20ad4d76fe97759aa27a0c99bff6710', '2021-06-05 10:38:06', '0', '2');

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
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifiacation`
--
ALTER TABLE `notifiacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
