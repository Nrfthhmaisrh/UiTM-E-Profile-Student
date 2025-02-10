-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 07:24 AM
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
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'System Maintenance', 'The system will be under maintenance on March 10, 2025, from 12 AM to 3 AM.', '2025-02-10 06:00:22'),
(2, 'New Course Registration', 'Course registration for Semester 2 opens on March 15, 2025.', '2025-02-10 06:00:22'),
(3, 'Exam Schedule Released', 'The final exam schedule is now available on the student portal.', '2025-02-10 06:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Present','Absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `course_id`, `date`, `status`) VALUES
(76, '2024947793', 1, '2025-01-15', 'Present'),
(77, '2024947793', 2, '2025-01-16', 'Absent'),
(78, '2024947793', 3, '2025-01-17', 'Present'),
(79, '2024947793', 4, '2025-01-18', 'Absent'),
(80, '2024947793', 5, '2025-01-19', 'Present'),
(81, '2024947793', 6, '2025-01-20', 'Absent'),
(82, '2024947793', 1, '2025-01-15', 'Present'),
(83, '2024947793', 2, '2025-01-16', 'Absent'),
(84, '2024947793', 3, '2025-01-17', 'Present'),
(85, '2024947793', 4, '2025-01-18', 'Absent'),
(86, '2024947793', 5, '2025-01-19', 'Present'),
(87, '2024947793', 6, '2025-01-20', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `instructor` varchar(50) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `student_id`, `course_name`, `instructor`, `credits`) VALUES
(1, '2024947793', 'Gamification for Content Management', 'Mohd Akmal Faiz Bin Osman', 3),
(2, '2024947793', 'Problem Solving and Program Design 2', 'Normashidayu Binti Abu Bakar', 3),
(3, '2024947793', 'Advanced Database Management System', 'Mohamad Syauqi bin Mohamad Arifin', 3),
(4, '2024947793', 'User Experience Design', 'Dr.Nor Erlissa Bnti Abd Aziz', 3),
(5, '2024947793', 'Information System', 'Mohd Akmal Faiz Bin Osman', 3),
(6, '2024947793', 'Advanced Web Design Development and Content Management', 'Faizal Haini Bin Fadzil', 4),
(7, '2024947793', 'English For Professional Correspondence', 'Tengku Mohd Farid Bin Tg Abdul Aziz', 2),
(8, '2024947793', 'Introductory Arabic (Level II)', 'Dr Mohd Sollah Bin Mohamed', 2),
(9, '2022456271', 'Gamification for Content Management', 'Mohd Akmal Faiz Bin Osman', 3),
(10, '2022456271', 'Problem Solving and Program Design 2', 'Normashidayu Binti Abu Bakar', 3),
(11, '2022456271', 'Advanced Database Management System', 'Mohamad Syauqi bin Mohamad Arifin', 3),
(12, '2022456271', 'User Experience Design', 'Dr.Nor Erlissa Bnti Abd Aziz', 3),
(13, '2022456271', 'Information System', 'Mohd Akmal Faiz Bin Osman', 3),
(14, '2022456271', 'Advanced Web Design Development and Content Management', 'Faizal Haini Bin Fadzil', 4),
(15, '2022456271', 'English For Professional Correspondence', 'Tengku Mohd Farid Bin Tg Abdul Aziz', 2),
(16, '2022456271', 'Introductory Arabic (Level II)', 'Dr Mohd Sollah Bin Mohamed', 2),
(17, '2023667799', 'Gamification for Content Management', 'Mohd Akmal Faiz Bin Osman', 3),
(18, '2023667799', 'Problem Solving and Program Design 2', 'Normashidayu Binti Abu Bakar', 3),
(19, '2023667799', 'Advanced Database Management System', 'Mohamad Syauqi bin Mohamad Arifin', 3),
(20, '2023667799', 'User Experience Design', 'Dr.Nor Erlissa Bnti Abd Aziz', 3),
(21, '2023667799', 'Information System', 'Mohd Akmal Faiz Bin Osman', 3),
(22, '2023667799', 'Advanced Web Design Development and Content Management', 'Faizal Haini Bin Fadzil', 4),
(23, '2023667799', 'English For Professional Correspondence', 'Tengku Mohd Farid Bin Tg Abdul Aziz', 2),
(24, '2023667799', 'Introductory Arabic (Level II)', 'Dr Mohd Sollah Bin Mohamed', 2),
(25, '2023778899', 'Gamification for Content Management', 'Mohd Akmal Faiz Bin Osman', 3),
(26, '2023778899', 'Problem Solving and Program Design 2', 'Normashidayu Binti Abu Bakar', 3),
(27, '2023778899', 'Advanced Database Management System', 'Mohamad Syauqi bin Mohamad Arifin', 3),
(28, '2023778899', 'User Experience Design', 'Dr.Nor Erlissa Bnti Abd Aziz', 3),
(29, '2023778899', 'Information System', 'Mohd Akmal Faiz Bin Osman', 3),
(30, '2023778899', 'Advanced Web Design Development and Content Management', 'Faizal Haini Bin Fadzil', 4),
(31, '2023778899', 'English For Professional Correspondence', 'Tengku Mohd Farid Bin Tg Abdul Aziz', 2),
(32, '2023778899', 'Introductory Arabic (Level II)', 'Dr Mohd Sollah Bin Mohamed', 2),
(33, '2021215588', 'Gamification for Content Management', 'Mohd Akmal Faiz Bin Osman', 3),
(34, '2021215588', 'Problem Solving and Program Design 2', 'Normashidayu Binti Abu Bakar', 3),
(35, '2021215588', 'Advanced Database Management System', 'Mohamad Syauqi bin Mohamad Arifin', 3),
(36, '2021215588', 'User Experience Design', 'Dr.Nor Erlissa Bnti Abd Aziz', 3),
(37, '2021215588', 'Information System', 'Mohd Akmal Faiz Bin Osman', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `course` varchar(60) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'uploads/default-profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `phone`, `password`, `course`, `photo`) VALUES
('2021215588', 'Fathihah', 'fathihah@gmail.com', '0138769277', 'fath123', 'IM110', 'uploads/fath.jpg'),
('2022456271', 'Aina', 'aina@gmail.com', '0167823452', 'aina123', 'CDIM262', 'uploads/aina.jpg'),
('2022789177', 'Safika', 'pika@gmail.com', '0187625691', 'pika123', 'CDIM110', 'uploads/pika.jpg'),
('2022876955', 'ku mirwazi', 'kumirwazi@gmail.com', '0132987225', 'ku123', 'CDIM110', 'uploads/ku mirwazi.jpg'),
('2022882189', 'piqah', 'piqah@gmail.com', '0189265784', 'piqah123', 'CDIM110', 'uploads/piqah.jpg'),
('2023667799', 'Dina', 'dina@gmail.com', '0187654321', 'dina123', 'CDIM262', 'uploads//dina.jpg'),
('2023778899', 'Hani', 'hani@gmail.com', '0198763421', 'hani123', 'CDIM262', 'uploads/hani.jpg'),
('2024867211', 'Ainul', 'ainul@gmail.com', '0115678432', 'ainul123', 'CDIM110', 'uploads/dhiyah.jpg'),
('2024947793', 'Maisarah', 'maisarah@gmail.com', '01160937522', 'Mai12345678', 'CDIM262', 'uploads/maisarah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `support_requests`
--

CREATE TABLE `support_requests` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('Pending','In Progress','Resolved') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_requests`
--

INSERT INTO `support_requests` (`id`, `student_id`, `subject`, `message`, `status`, `created_at`) VALUES
(1, '2024947793', 'lala', 'hiiii', 'Pending', '2025-02-10 06:08:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `support_requests`
--
ALTER TABLE `support_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `support_requests`
--
ALTER TABLE `support_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
