-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltn`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `created_at`) VALUES
(1, 'Maintenance', '2026-01-21 18:01:03'),
(2, 'hsad', '2026-01-22 05:15:49'),
(3, 'Shobai nacho', '2026-01-28 14:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `tutor_id`, `title`, `file_name`, `upload_date`, `subject`) VALUES
(1, 3, 'WT', '697110d8b97734.59865303_WT Project Proposal.docx', '2026-01-21 17:46:00', ''),
(4, 11, 'Paper', '6a37fe8e20cd27.19952051_2604.19305v1.pdf', '2026-06-21 15:09:02', ''),
(5, 11, 'Paper', '6a3803b8ec4a88.04468428_2306.09896v5.pdf', '2026-06-21 15:31:04', 'Research');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `tutor_id`, `student_id`, `rating`, `comment`, `created_at`) VALUES
(1, 3, 2, 4, 'good', '2026-01-21 17:52:47'),
(2, 3, 10, 5, 'Co operative', '2026-06-21 14:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `session_schedules`
--

CREATE TABLE `session_schedules` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `status` enum('available','booked') NOT NULL DEFAULT 'available',
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_schedules`
--

INSERT INTO `session_schedules` (`id`, `tutor_id`, `date`, `time_slot`, `status`, `student_id`) VALUES
(1, 3, '2026-01-27', '09:00 AM', 'booked', 2),
(2, 3, '2026-02-01', '07:00 PM', 'booked', 2),
(3, 3, '2026-02-12', '05:00 PM', 'booked', 10),
(4, 3, '2026-01-31', '09:00 AM', 'booked', 10),
(8, 11, '2026-07-03', '08:00 PM', 'available', NULL),
(9, 11, '2026-06-26', '07:00 PM', 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `education_background` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`profile_id`, `user_id`, `education_background`, `institution`, `location`) VALUES
(2, 2, 'class 2', 'preparatory grammar school', 'mirpur'),
(3, 4, 'class 9', 'chandapur school', 'chondronogor'),
(4, 8, 'class 9', 'schhol', 'bonoshree'),
(5, 10, 'college', 'college', 'mirpur'),
(6, 12, 'ghjgh', 'ghj', 'iuui');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(14, 'Bangla'),
(7, 'Biology'),
(2, 'Chemistry'),
(13, 'CSE'),
(6, 'English'),
(8, 'Higher Math'),
(3, 'ICT'),
(1, 'Math'),
(4, 'Physics'),
(10, 'Social science'),
(9, 'Statistics'),
(11, 'web tech');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_profiles`
--

CREATE TABLE `tutor_profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `education_background` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `short_bio` text DEFAULT NULL,
  `hourly_rate` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_profiles`
--

INSERT INTO `tutor_profiles` (`profile_id`, `user_id`, `education_background`, `institution`, `experience`, `subjects`, `short_bio`, `hourly_rate`) VALUES
(1, 3, 'undergraduate', 'nsu', '2 year', 'Chemistry, Math', '', 0.00),
(2, 5, 'undergraduate', 'aiub', '1 year', 'ict, math', 'pagla', 0.00),
(3, 6, 'undergraduate', 'brac', '0 year', 'math', 'nothing', 0.00),
(4, 7, 'grad', 'jnu', '1 year', 'ICT, Statistics', '', 1000.00),
(5, 9, 'grad', 'udp', 'none', 'Bangla, Biology, Higher Math', '', 700.00),
(6, 11, 'grad', 'aiub', '6 year', 'Higher Math, ICT', '', 1000.00),
(7, 13, 'fdssdf', 'sgd', '1 year', 'ICT, Physics, web tech', '', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','tutor','student-guardian') NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@proton.co', 'admin', 'active'),
(2, 'student', 'student123', 'student@proton.com', 'student-guardian', 'active'),
(3, 'tutor', 'tutor123', 'tutor@proton.com', 'tutor', 'active'),
(4, 'chandu', 'cchandu123', 'chandu@yahoo.com', 'student-guardian', 'active'),
(5, 'haradhon', 'haradhon123', 'haradhon@yahoo.com', 'tutor', 'active'),
(6, 'tutor1', 'tutor123', 'tutor@gmail.com', 'tutor', 'active'),
(7, 'kamal', '1234', 'kamal@gmail.com', 'tutor', 'active'),
(8, 'hasan', '1234', 'stu@hsjdh.com', 'student-guardian', 'active'),
(9, 'choyon', '1234', 'choyon@hat.com', 'tutor', 'pending'),
(10, 'student1', '81dc9bdb52d04dc20036dbd8313ed055', 'student@gmail.com', 'student-guardian', 'active'),
(11, 'tutor2', '81dc9bdb52d04dc20036dbd8313ed055', 'tutor2@gmail.com', 'tutor', 'active'),
(12, 'stuone', '81dc9bdb52d04dc20036dbd8313ed055', 'studentone@gmail.com', 'student-guardian', 'active'),
(13, 'tutor3', '81dc9bdb52d04dc20036dbd8313ed055', 'tutor3@gmail.com', 'tutor', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resources_tutor_id` (`tutor_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviewa` (`tutor_id`),
  ADD KEY `fk_review_student` (`student_id`);

--
-- Indexes for table `session_schedules`
--
ALTER TABLE `session_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_new_tutor_id` (`tutor_id`),
  ADD KEY `fk_student_booking` (`student_id`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `fk_student_id` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `fk_tutor_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_schedules`
--
ALTER TABLE `session_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_tutor_id` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_student` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reviewa` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_schedules`
--
ALTER TABLE `session_schedules`
  ADD CONSTRAINT `fk_new_tutor_id` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_booking` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutor_profiles`
--
ALTER TABLE `tutor_profiles`
  ADD CONSTRAINT `fk_tutor_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
