-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `sms`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `course`
-- --

-- CREATE TABLE `course` (
--   `id` int(11) NOT NULL,
--   `code` varchar(50) NOT NULL DEFAULT '0',
--   `time` varchar(50) DEFAULT NULL,
--   `room` varchar(50) DEFAULT NULL,
--   `teacher_code` varchar(50) NOT NULL,
--   `subject_code` varchar(50) NOT NULL,
--   `start_time` varchar(5) DEFAULT NULL,
--   `day_of_week` varchar(50) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `course`
-- --

-- INSERT INTO `course` (`id`, `code`, `time`, `room`, `teacher_code`, `subject_code`, `start_time`, `day_of_week`) VALUES
-- (18, 'INT1254_1_FALL2024', '2:00 - 5:00', 'H105', 'HT1005', 'INT1254', '2:00', 'Thứ sáu'),
-- (5, 'INT1255_1_FALL2024', '09:00 - 11:00', 'H101', 'HT1005', 'INT1255', '09:00', 'Thứ hai'),
-- (9, 'INT1350_1_FALL2024', '12:00 - 3:00', 'H104', 'HT1006', 'INT1350', '12:00', 'Thứ tư'),
-- (6, 'INT1620_1_FALL2024', '2:00 - 5:00', 'H102', 'HT1005', 'INT1620', '2:00', 'Thứ năm');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `course_has_student`
-- --

-- CREATE TABLE `course_has_student` (
--   `id` int(11) NOT NULL,
--   `c_h_s_code` varchar(50) NOT NULL,
--   `course_code` varchar(50) NOT NULL,
--   `student_code` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `course_has_student`
-- --

-- INSERT INTO `course_has_student` (`id`, `c_h_s_code`, `course_code`, `student_code`) VALUES
-- (7, 'INT1254_1_FALL2024', 'INT1254_1_FALL2024', '2251120319'),
-- (1, 'INT1255_1_FALL2024', 'INT1255_1_FALL2024', '2251120325'),
-- (3, 'INT1350_1_FALL2024', 'INT1350_1_FALL2024', '2251120321'),
-- (5, 'INT1620_1_FALL2024', 'INT1620_1_FALL2024', '2251120275');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `result`
-- --

-- CREATE TABLE `result` (
--   `id` int(11) NOT NULL,
--   `chuyencan` varchar(50) NOT NULL DEFAULT '0',
--   `giuaky` varchar(50) NOT NULL DEFAULT '0',
--   `cuoiky` varchar(50) NOT NULL DEFAULT '0',
--   `c_h_s_code` varchar(50) NOT NULL,
--   `status` varchar(50) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `result`
-- --

-- INSERT INTO `result` (`id`, `chuyencan`, `giuaky`, `cuoiky`, `c_h_s_code`, `status`) VALUES
-- (1, '9', '9', '8', 'INT1350_1_FALL2024', 'Đã học'),
-- (2, '8', '9', '8', 'INT1255_1_FALL2024', 'Đã học'),
-- (4, '7', '9', '8', 'INT1620_1_FALL2024', 'Đã học'),
-- (5, '9', '6', '7', 'INT1254_1_FALL2024', 'Đã học');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `student`
-- --

-- CREATE TABLE `student` (
--   `id` int(11) NOT NULL,
--   `code` varchar(50) NOT NULL,
--   `major` varchar(50) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `student`
-- --

-- INSERT INTO `student` (`id`, `code`, `major`) VALUES
-- (48, '2251120275', 'Công nghệ thông tin'),
-- (56, '2251120319', 'Công nghệ thông tin'),
-- (55, '2251120321', 'Công nghệ thông tin'),
-- (54, '2251120325', 'Công nghệ thông tin');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `subject`
-- --

-- CREATE TABLE `subject` (
--   `id` int(11) NOT NULL,
--   `code` varchar(50) NOT NULL,
--   `subjectname` varchar(50) NOT NULL,
--   `num_credit` varchar(50) NOT NULL,
--   `major` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `subject`
-- --

-- INSERT INTO `subject` (`id`, `code`, `subjectname`, `num_credit`, `major`) VALUES
-- (16, 'INT1254', 'Ngôn ngữ Lập trình C#', '2', 'CNTT'),
-- (14, 'INT1255', 'Ngôn ngữ Lập trình C++', '2', 'CNTT'),
-- (17, 'INT1350', 'Cơ sở dữ liệu', '3', 'CNTT'),
-- (13, 'INT1620', 'Các hệ thống phân tán', '3', 'CNTT'),
-- (19, 'INT1645', 'Nhập môn Trí tuệ Nhân Tạo', '3', 'CNTT');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `teacher`
-- --

-- CREATE TABLE `teacher` (
--   `id` int(11) NOT NULL,
--   `code` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `teacher`
-- --

-- INSERT INTO `teacher` (`id`, `code`) VALUES
-- (1, 'HT1005'),
-- (2, 'HT1006');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `users`
-- --

-- CREATE TABLE `users` (
--   `name` varchar(20) NOT NULL,
--   `username` varchar(50) NOT NULL,
--   `phone` int(30) DEFAULT NULL,
--   `birthday` date DEFAULT NULL,
--   `email` varchar(50) DEFAULT NULL,
--   `usertype` varchar(50) DEFAULT NULL,
--   `password` varchar(50) DEFAULT NULL,
--   `pob` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `users`
-- --

-- INSERT INTO `users` (`name`, `username`, `phone`, `birthday`, `email`, `usertype`, `password`, `pob`) VALUES
-- ('Lê Văn Cừ', '2251120275', 366796412, '2004-01-02', '2251120275@ut.edu.vn', 'student', '003', 'Bình Phước'),
-- ('Lê Đào Khang Thịnh', '2251120319', 124135325, '2024-01-06', '2251120319@ut.edu.vn', 'student', '002', 'Tây Ninh'),
-- ('Lê Hữu Thông', '2251120321', 12412412, '2024-04-11', '2251120321@ut.edu.vn', 'student', '001', 'Ninh Thuận'),
-- ('Đặng Đức Tĩnh', '2251120325', 923123444, '2024-05-01', '2251120325@ut.edu.vn', 'student', '000', 'Ninh Thuận'),
-- ('ADMIN', 'admin', 366796412, '2020-04-09', 'admin@gmail.com', 'admin', '1234', 'Q1'),
-- ('Nguyễn Ngọc Thạch', 'HT1005', 923123447, NULL, 'nguyenvanf@gmail.com', 'teacher', '128', 'Q4'),
-- ('Nguyễn Văn Diêu', 'HT1006', 923123427, NULL, 'nguyenvans@gmail.com', 'teacher', '129', 'Q5');

CREATE TABLE `financial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_h_s_code` varchar(50) NOT NULL,
  `tuition` DECIMAl (10,0),
  `payment`DECIMAl (10,0),
  `payment_status` varchar(50) NULL ,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`id`, `c_h_s_code`, `tuition`, `payment`,`payment_status`) VALUES
(1, 'INT1254_1_FALL2024', '1062000','1062000', 'Đã đóng đủ'),
(2, 'INT1255_1_FALL2024', '1062000','1000000', 'Chưa đóng đủ'),
(3, 'INT1350_1_FALL2024', '1062000', '1000000','Chưa đóng đủ'),
(4, 'INT1620_1_FALL2024', '1062000', '1062000','Đã đóng đủ');



--
-- Indexes for dumped tables
--
-- Indexes for table `financial`
ALTER TABLE `financial`
ADD CONSTRAINT `fk_financial_c_h_s_code`
FOREIGN KEY (`c_h_s_code`) REFERENCES `course_has_student` (`c_h_s_code`)
ON DELETE CASCADE
ON UPDATE CASCADE;
-- --
-- -- Indexes for table `course`
-- --
-- ALTER TABLE `course`
--   ADD PRIMARY KEY (`code`),
--   ADD KEY `id` (`id`),
--   ADD KEY `fk_course_teacher_idx` (`teacher_code`),
--   ADD KEY `fk_course_subject_idx` (`subject_code`);

-- --
-- -- Indexes for table `course_has_student`
-- --
-- ALTER TABLE `course_has_student`
--   ADD PRIMARY KEY (`c_h_s_code`),
--   ADD UNIQUE KEY `id_UNIQUE` (`id`),
--   ADD KEY `fk_course_has_student_student_idx` (`student_code`),
--   ADD KEY `fk_course_has_student_course_idx` (`course_code`);

-- --
-- -- Indexes for table `result`
-- --
-- ALTER TABLE `result`
--   ADD PRIMARY KEY (`id`,`c_h_s_code`),
--   ADD KEY `id` (`id`),
--   ADD KEY `fk_result_course_has_student_idx` (`c_h_s_code`);

-- --
-- -- Indexes for table `student`
-- --
-- ALTER TABLE `student`
--   ADD PRIMARY KEY (`code`),
--   ADD KEY `id` (`id`);

-- --
-- -- Indexes for table `subject`
-- --
-- ALTER TABLE `subject`
--   ADD PRIMARY KEY (`code`),
--   ADD UNIQUE KEY `code` (`code`),
--   ADD KEY `id` (`id`);

-- --
-- -- Indexes for table `teacher`
-- --
-- ALTER TABLE `teacher`
--   ADD PRIMARY KEY (`id`,`code`),
--   ADD KEY `fk_teacher_user` (`code`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`username`),
--   ADD UNIQUE KEY `username` (`username`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `course`
-- --
-- ALTER TABLE `course`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

-- --
-- -- AUTO_INCREMENT for table `course_has_student`
-- --
-- ALTER TABLE `course_has_student`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

-- --
-- -- AUTO_INCREMENT for table `result`
-- --
-- ALTER TABLE `result`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

-- --
-- -- AUTO_INCREMENT for table `student`
-- --
-- ALTER TABLE `student`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

-- --
-- -- AUTO_INCREMENT for table `subject`
-- --
-- ALTER TABLE `subject`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

-- --
-- -- Constraints for dumped tables
-- --

-- --
-- -- Constraints for table `course`
-- --
-- ALTER TABLE `course`
--   ADD CONSTRAINT `fk_course_subject` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `fk_course_teacher` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --
-- -- Constraints for table `course_has_student`
-- --
-- ALTER TABLE `course_has_student`
--   ADD CONSTRAINT `fk_course_has_student_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `fk_course_has_student_student` FOREIGN KEY (`student_code`) REFERENCES `student` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --
-- -- Constraints for table `result`
-- --
-- ALTER TABLE `result`
--   ADD CONSTRAINT `fk_result_course_has_student` FOREIGN KEY (`c_h_s_code`) REFERENCES `course_has_student` (`c_h_s_code`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --
-- -- Constraints for table `student`
-- --
-- ALTER TABLE `student`
--   ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --
-- -- Constraints for table `teacher`
-- --
-- ALTER TABLE `teacher`
--   ADD CONSTRAINT `fk_teacher_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
-- COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
