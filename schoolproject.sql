-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 03:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE schoolproject;
USE schoolproject;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` int(100) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', 2147483647, 'I am interested in the computer science program.'),
(2, 'Bob Smith', 'bob.smith@example.com', 2147483647, 'Looking forward to joining the engineering departm'),
(3, 'Charlie Brown', 'charlie.brown@example.com', 2147483647, 'Excited about the opportunities in the business sc'),
(4, 'Diana Williams', 'diana.williams@example.com', 2147483647, 'Hoping to pursue a degree in environmental science'),
(5, 'Evan Davis', 'evan.davis@example.com', 2147483647, 'I have a passion for art and design.'),
(6, 'Fiona Miller', 'fiona.miller@example.com', 2147483647, 'Interested in the psychology program.'),
(7, 'George Wilson', 'george.wilson@example.com', 2147483647, 'Looking to major in mathematics.'),
(8, 'Hannah Taylor', 'hannah.taylor@example.com', 2109876543, 'I am enthusiastic about studying literature.'),
(9, 'Isaac Turner', 'isaac.turner@example.com', 1098765432, 'Excited to explore the world of chemistry.'),
(10, 'Jasmine Clark', 'jasmine.clark@example.com', 2147483647, 'Interested in joining the physics department.'),
(11, 'Kevin Lee', 'kevin.lee@example.com', 2147483647, 'Looking forward to contributing to the computer en'),
(12, 'Lily Garcia', 'lily.garcia@example.com', 2147483647, 'Passionate about studying history.'),
(13, 'Mason Hall', 'mason.hall@example.com', 2147483647, 'Interested in pursuing a degree in economics.'),
(14, 'Nora Brown', 'nora.brown@example.com', 2147483647, 'Excited about the opportunities in the medical fie'),
(15, 'Oscar Miller', 'oscar.miller@example.com', 2147483647, 'Hoping to contribute to the field of political sci'),
(16, 'Penelope Turner', 'penelope.turner@example.com', 2147483647, 'I have a keen interest in astronomy.'),
(17, 'Quincy Smith', 'quincy.smith@example.com', 2109876543, 'Looking forward to joining the communication studi'),
(18, 'Rachel Wilson', 'rachel.wilson@example.com', 1098765432, 'Excited about the possibilities in the film studie'),
(19, 'Samuel Davis', 'samuel.davis@example.com', 2147483647, 'Interested in exploring the world of sociology.'),
(20, 'Tessa Taylor', 'tessa.taylor@example.com', 2147483647, 'Looking forward to studying anthropology.'),
(21, 'Ulysses Turner', 'ulysses.turner@example.com', 2147483647, 'Hoping to contribute to the field of geology.');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `about`, `image`) VALUES
(1, 'BTech', 'Mechanical engineering programs are available at both the undergraduate and graduate levels. The average time to complete a mechanical engineering degree is 5-6 years, although it can be done within 4 years..', 'image/machenical.png'),
(2, 'BBA', 'Marketing refers to activities a company undertakes to promote the buying or selling of a product or service. Marketing includes advertising, selling, and delivering products to consumers or other businesses. Some marketing is done by affiliates on behalf of a company.', 'image/marketing.png'),
(3, 'BCA', 'Web development is the work involved in creating, building, and maintaining websites and web applications. It can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.', 'image/web.jpg'),
(4, 'BTech', 'Tech programs have comprehensive curriculums under various specializations that provide practical knowledge on engineering concepts. Students learn computer programming, engineering mathematics, basic electronics. You will learn the fundamental engineering concepts as well as the specialization-based concepts.', 'image/tech.png'),
(5, 'BBA', 'A Bachelor of Business Administration (BBA) is a three-year undergraduate degree. It\'s one of the most popular bachelor\'s degrees and is in high demand because of its versatility. \r\nThe course covers: Business management, Finance, Sales and marketing, Human resources, Business operations. \r\nThe course also helps students gain skills in: Leadership, Entrepreneurship, Managerial', 'image/business.png'),
(6, 'BCA', 'Graphic designers, also referred to as graphic artists or communication designers, combine art and technology to communicate ideas through images and the layout of websites and printed pages. They may use a variety of design elements to achieve artistic or decorative effects.', 'image/graphic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `course` varchar(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `course`, `image`) VALUES
(1, 'Pranjal ', 'I had a truly remarkable experience solving the error. After investing several hours into troubleshooting, I finally arrived at a solution. Surprisingly, the key was a simple adjustment—changing the variable name from $row to $info. This subtle modification proved to be the missing piece that resolved the issue. ', '0', 'image/teacher6.png'),
(2, 'Umang', 'Some qualities of a good teacher include skills in communication, listening, collaboration, adaptability, empathy and patience. Other characteristics of effective teaching include an engaging classroom presence, value in real-world learning, exchange of best practices and a lifelong love of learning.08', '0', 'image/teacher4.png'),
(3, 'Asrif', 'Some qualities of a good teacher include skills in communication, listening, collaboration, adaptability, empathy and patience. Other characteristics of effective teaching include an engaging classroom presence, value in real-world learning, exchange of best practices and a lifelong love of learning.08', '0', 'image/teacher2.jpg'),
(4, 'Ashirwad', 'Rich in nutrients: Whole grains used in multigrain atta are packed with essential vitamins and minerals like B vitamins, iron, zinc, and magnesium. These nutrients are crucial for maintaining good health.', '0', 'image/teacher3.png'),
(5, 'Cherrysunati', 'From productivity to customization, learn how to get things done more quickly with your browser.\r\nShare suggestions, ask questions, and connect with other users and top contributors in the Google Chrome help forum.', '0', 'image/teacher5.png'),
(6, 'Lord Krishna', 'He is the first medical authority. He is the Supreme Personality of Godhead who appeared millions and millions of years ago on the earth. It was he who propagated the System of medicine, the original system of medicine.', '0', 'image/krishna_in_mcu_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `course` varchar(80) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `course`, `usertype`, `password`) VALUES
(1, 'admin', '99999999999', 'admin@gmail.com', 'admin', 'admin', '11'),
(2, 'pranjal', '9999999999', 'pranjalmodanwal@gmail.com', 'BCA', 'student', '11'),
(4, 'Diana Williams', '6543210987', 'diana.williams@example.com', 'BBA', 'student', '11'),
(7, 'George Wilson', '3210987654', 'george.wilson@example.com', 'BTech', 'student', '11'),
(8, 'Hannah Taylor', '2109876543', 'hannah.taylor@example.com', 'BBA', 'student', '11'),
(9, 'Isaac Turner', '1098765432', 'isaac.turner@example.com', 'BCA', 'student', '11'),
(10, 'Ella Moore', '9876543210', 'ella.moore@example.com', 'BCA', 'student', '11'),
(11, 'James Johnson', '8765432109', 'james.johnson@example.com', 'BCA', 'student', '11'),
(12, 'Emma Anderson', '7654321098', 'emma.anderson@example.com', 'BTech', 'student', '11'),
(13, 'Liam Martinez', '6543210987', 'liam.martinez@example.com', 'BBA', 'student', '11'),
(14, 'Ava Clark', '5432109876', 'ava.clark@example.com', 'BBA', 'student', '11'),
(15, 'Logan Walker', '4321098765', 'logan.walker@example.com', 'BTech', 'student', '11'),
(16, 'Mia Hall', '3210987654', 'mia.hall@example.com', 'BTech', 'student', '11'),
(17, 'Noah Turner', '2109876543', 'noah.turner@example.com', 'BTech', 'student', '11'),
(18, 'Sophie Garcia', '1098765432', 'sophie.garcia@example.com', 'BCA', 'student', '11'),
(19, 'Jackson Smith', '9876543210', 'jackson.smith@example.com', 'BCA', 'student', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
