-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 06:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcuoiki214`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_lesson`
--

CREATE TABLE `completed_lesson` (
  `email` varchar(255) NOT NULL,
  `lesson_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_lesson`
--

INSERT INTO `completed_lesson` (`email`, `lesson_id`, `status`) VALUES
('user2@example.com', 18, 'Please watch the video'),
('user2@example.com', 19, 'Please watch the video'),
('user2@example.com', 26, 'Please watch the video'),
('user2@example.com', 31, 'Please watch the video'),
('user2@example.com', 36, 'Please watch the video'),
('user2@example.com', 45, 'Please watch the video'),
('user2@example.com', 46, 'Please watch the video'),
('user2@example.com', 51, 'Please watch the video');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `ReleaseDate` varchar(255) NOT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Title`, `Description`, `course_id`, `Type`, `ReleaseDate`, `images`) VALUES
('Database Management', 'Explore the fundamentals of database management.', 2, 'IT', '2022', 'https://i.pinimg.com/736x/65/7b/0e/657b0e98b19393a8d691780da41316de.jpg'),
('Web Development', 'Learn to build websites and web applications.', 3, 'IT', '2021', 'https://i.pinimg.com/564x/56/fb/22/56fb228537a3a4b79ce3a9355fd3f34e.jpg'),
('Cybersecurity Essentials', 'Essential concepts and practices in cybersecurity.', 4, 'IT', '2015', 'https://i.pinimg.com/736x/a0/23/a8/a023a8189939e6c0330510e184b16c37.jpg'),
('Data Science Fundamentals', 'Introduction to data science and analytics.', 5, 'IT', '2022', 'https://i.pinimg.com/564x/6e/e9/18/6ee918d6bad713109da451d783c45126.jpg'),
('Network Administration', 'Learn about network infrastructure and administration.', 6, 'IT', '2022', 'https://i.pinimg.com/564x/58/3d/5f/583d5f9647bfbfe5de4b74086122ca7d.jpg'),
('Software Engineering Principles', 'Principles and practices of software engineering.', 7, 'IT', '2024', 'https://i.pinimg.com/564x/30/10/e4/3010e4db2aee467f0537d2e14b8fcb7f.jpg'),
('Cloud Computing Basics', 'Introduction to cloud computing technologies.', 8, 'IT', '2023', 'https://i.pinimg.com/564x/55/98/07/5598077406c77a239478591500b03beb.jpg'),
('Machine Learning Fundamentals', 'Introduction to machine learning algorithms and techniques.', 9, 'IT', '2024', 'https://i.pinimg.com/564x/38/5e/d7/385ed712e43c1db062f3d62f0de0b2a8.jpg'),
('Mobile App Development', 'Build applications for mobile devices.', 10, 'IT', '2022', 'https://i.pinimg.com/564x/66/3b/2c/663b2c88249b087aaeab7180dd19df1e.jpg'),
('Ethical Hacking', 'Learn ethical hacking techniques and practices.', 11, 'IT', '2022', 'https://i.pinimg.com/564x/df/e2/97/dfe2977682add0204f75b7889ae603fd.jpg'),
('SFSDFSDFSDF', 'SDFSDFSDF', 12, 'SDFSDF', '0', 'SDFSDFSD');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`email`, `course_id`) VALUES
('trungductwice@gmail.com', 2),
('trungductwice@gmail.com', 3),
('trungductwice@gmail.com', 4),
('user2@example.com', 2),
('user2@example.com', 3),
('user2@example.com', 4),
('user2@example.com', 5),
('user2@example.com', 6),
('user2@example.com', 7),
('user2@example.com', 8),
('user2@example.com', 9),
('user2@example.com', 10),
('user2@example.com', 11),
('user2@example.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `email` varchar(255) NOT NULL,
  `course_id` int(12) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`email`, `course_id`, `rating`, `comment`) VALUES
('user2@example.com', 2, 'Medicore', 'VERY HELPFUL');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(255) NOT NULL,
  `Description` text NOT NULL,
  `Title` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `Description`, `Title`, `course_id`, `video`) VALUES
(7, 'Database Design and Modeling', 'Entity-Relationship Diagrams', 2, 'https://www.youtube.com/embed/xsg9BDiwiJE'),
(8, 'Query Optimization Techniques', 'Optimizing Database Queries', 2, 'https://www.youtube.com/embed/TukZd6LjeBc'),
(9, 'Data Backup and Recoverysdsd', 'Backup and Recovery Strategies', 2, 'https://www.youtube.com/embed/TYiKdH1iMsgc'),
(10, 'Database Securityhihiihi2323222ádasdasd', 'Securing Your Database', 2, 'https://www.youtube.com/embed/N8xEgSe5RwE'),
(11, 'HTML Basicssdsdsds', 'Introduction to HTML', 3, 'https://www.youtube.com/embed/FQdaUv95mR8'),
(13, 'JavaScript Essentials', 'Introduction to JavaScript', 3, 'https://www.youtube.com/embed/W6NZfCO5SIk'),
(14, 'Responsive Web Design', 'Building Responsive Websites', 3, 'https://www.youtube.com/embed/nu_pCVPKzTk'),
(15, 'Web Development Frameworks', 'Introduction to Web Development Frameworks', 3, 'https://www.youtube.com/embed/BfhSoFARn6w'),
(16, 'Introduction to Cybersecurity', 'Understanding Cybersecurity Concepts', 4, 'https://www.youtube.com/embed/z5nc9MDbvkw'),
(17, 'Network Security', 'Securing Networks', 4, 'https://www.youtube.com/embed/sesacY7Xz3c'),
(18, 'Cryptography', 'Fundamentals of Cryptography', 4, 'https://www.youtube.com/embed/6_Cxj5WKpIw'),
(19, 'Secure Coding Practices', 'Writing Secure Code', 4, 'https://www.youtube.com/embed/UAsoSAgN4jo'),
(20, 'Incident Response and Management', 'Managing Security Incidents', 4, 'https://www.youtube.com/embed/MsGl6lX-YaI'),
(21, 'Introduction to Data Science', 'Overview of Data Science', 5, 'https://www.youtube.com/embed/X3paOmcrTjQ'),
(22, 'Data Analysis with Python', 'Data Analysis using Python', 5, 'https://www.youtube.com/embed/EsDFiZPljYo'),
(23, 'Data Visualization', 'Visualizing Data', 5, 'https://www.youtube.com/embed/loYuxWSsLNc'),
(24, 'Machine Learning Algorithms', 'Fundamental ML Algorithms', 5, 'https://www.youtube.com/embed/olFxW7kdtP8'),
(25, 'Big Data Technologies', 'Introduction to Big Data', 5, 'https://www.youtube.com/embed/bc8Cdh-WY7w'),
(26, 'Network Fundamentals', 'Basics of Networking', 6, 'https://www.youtube.com/embed/fErDcUtd8fA'),
(27, 'TCP/IP Protocols', 'Understanding TCP/IP', 6, 'https://www.youtube.com/embed/PpsEaqJV_A0'),
(28, 'Routing and Switching', 'Routing and Switching Concepts', 6, 'https://www.youtube.com/embed/1z0ULvg_pW8'),
(29, 'Network Security', 'Securing Networks', 6, 'https://www.youtube.com/embed/RkPs8Jl9TKk'),
(30, 'Wireless Networking', 'Wireless Network Technologies', 6, 'https://www.youtube.com/embed/Uz-RTurph3c'),
(31, 'Software Development Lifecycle', 'Overview of SDLC', 7, 'https://www.youtube.com/embed/Fi3_BjVzpqk'),
(32, 'Requirements Engineering', 'Gathering Software Requirements', 7, 'https://www.youtube.com/embed/SS3k1X6r7s0'),
(33, 'Agile Methodologies', 'Introduction to Agile', 7, 'https://www.youtube.com/embed/QLvBK9stdoM'),
(34, 'Software Testing', 'Fundamentals of Software Testing', 7, 'https://www.youtube.com/embed/E2t5XbWwj7I'),
(35, 'Continuous Integration and Deployment', 'CI/CD Practices', 7, 'https://www.youtube.com/embed/PkNg9gUhiYQ'),
(36, 'Introduction to Cloud Computing', 'Overview of Cloud Computing', 8, 'https://www.youtube.com/embed/M988_fsOSWo'),
(37, 'Cloud Service Models', 'Types of Cloud Services', 8, 'https://www.youtube.com/embed/YpL9cEiJSKo'),
(38, 'Cloud Deployment Models', 'Different Cloud Deployment Models', 8, 'https://www.youtube.com/embed/efFGwP9YYR8'),
(39, 'Cloud Security', 'Securing Cloud Environments', 8, 'https://www.youtube.com/embed/mD8zvJ2gNrI'),
(40, 'Cloud Cost Management', 'Managing Cloud Costs', 8, 'https://www.youtube.com/embed/dLuTtwYQVk8'),
(41, 'Introduction to Machine Learning', 'Basic Concepts of Machine Learning', 9, 'https://www.youtube.com/embed/-58kO_zYUGE'),
(42, 'Supervised Learning', 'Understanding Supervised Learning', 9, 'https://www.youtube.com/embed/nZB37IBCiSA'),
(43, 'Unsupervised Learning', 'Understanding Unsupervised Learning', 9, 'https://www.youtube.com/embed/Z2czYa5gEtw'),
(44, 'Deep Learning', 'Introduction to Deep Learning', 9, 'https://www.youtube.com/embed/5tvmMX8r_OM'),
(45, 'Machine Learning Applications', 'Applications of ML', 9, 'https://www.youtube.com/embed/bRzVHlJE6Xs'),
(46, 'Introduction to Mobile App Development', 'Overview of Mobile App Development', 10, 'https://www.youtube.com/embed/BO44fhhKpAQ'),
(47, 'Native App Development', 'Developing Native Mobile Apps', 10, 'https://www.youtube.com/embed/V2PldNrGGwc'),
(48, 'Cross-Platform App Development', 'Building Cross-Platform Apps', 10, 'https://www.youtube.com/embed/Dme59GkKq7M'),
(49, 'App Deployment', 'Deploying Mobile Apps', 10, 'https://www.youtube.com/embed/16JWFpphy5E'),
(50, 'User Interface Design', 'Designing User Interfaces', 10, 'https://www.youtube.com/embed/QgJc0pYV1Ig'),
(51, 'Ethical Hacking Overview', 'Introduction to Ethical Hacking', 11, 'https://www.youtube.com/embed/mhEez4ClUPk'),
(52, 'Footprinting and Reconnaissance', 'Footprinting and Reconnaissance', 11, 'https://www.youtube.com/embed/27t2AdBgd_4'),
(53, 'Scanning Networks', 'Scanning Networks', 11, 'https://www.youtube.com/embed/ARuJi1vWc4A'),
(54, 'Enumeration and Exploitation', 'Enumeration and Exploitation', 11, 'https://www.youtube.com/embed/fjUaSNUN3m8'),
(55, 'Web Application Hacking', 'Web Application Hacking', 11, 'https://www.youtube.com/embed/ZD7Mg1NKvNg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `isAdmin` int(255) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `Token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`email`, `password`, `FirstName`, `LastName`, `isAdmin`, `isActive`, `Token`) VALUES
('adminfreecourse@gmail.com', '1', 'Admin', '', 1, 1, '123456'),
('olodo@example.com', '1', '1231232', 'SIUUUUUUUUU', 0, 0, '1e66c4645d1b26bd26011a59ab81c14c'),
('trungductwice@gmail.com', '1', 'Nguyễn', 'Đức', NULL, 1, '5b13e1fd1137ee3ff55f7e342e5ac28c'),
('user2@example.com', '1', 'Jane', 'SmithCR7', 0, 1, '123456'),
('user3@example.com', '1', '1', '1', NULL, 1, '123456'),
('user4@example.com', '1', 'Emily', 'Brown', NULL, 1, '123456'),
('user5@example.com', '1', 'Chris', 'Wilson', NULL, 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed_lesson`
--
ALTER TABLE `completed_lesson`
  ADD PRIMARY KEY (`email`,`lesson_id`),
  ADD KEY `fk_completed_lesson_lesson` (`lesson_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`email`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`email`,`course_id`),
  ADD KEY `fk_feedbacks_course` (`course_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completed_lesson`
--
ALTER TABLE `completed_lesson`
  ADD CONSTRAINT `fk_completed_lesson_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`lesson_id`),
  ADD CONSTRAINT `fk_completed_lesson_students` FOREIGN KEY (`email`) REFERENCES `students` (`email`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`email`) REFERENCES `students` (`email`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedbacks_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fk_feedbacks_students` FOREIGN KEY (`email`) REFERENCES `students` (`email`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
