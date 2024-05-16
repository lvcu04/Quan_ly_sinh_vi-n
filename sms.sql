-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 09:20 AM
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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `time` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `teacher_code` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `start_time` date DEFAULT NULL,
  `lesson` varchar(50) DEFAULT NULL,
  `status_course` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `time`, `room`, `teacher_code`, `subject_code`, `start_time`, `lesson`, `status_course`) VALUES
<<<<<<< HEAD
(18, 'INT1254_FALL2024', '09:25 - 11:55', 'H105', 'HT1008', 'INT1254', '2024-05-14', '4-6', 1),
(5, 'INT1255_FALL2024', '09:25 - 11:55', 'H101', 'HT1003', 'INT1255', '2024-05-18', '4-6', 0),
(9, 'INT1350_FALL2024', '12:10 - 14:40', 'H104', 'HT1006', 'INT1350', '2024-05-17', '7-9', 1),
(8, 'INT1360_FALL2024', '09:25 - 11:55', 'H301', 'HT1007', 'INT1360', '2024-05-15', '4-6', 1),
(6, 'INT1620_FALL2024', '14:50 - 17:20', 'H102', 'HT1009', 'INT1620', '2024-05-14', '10-12', 0),
(3, 'INT1630_FALL2024', '12:00 - 3:00', 'H201', 'HT1006', 'INT1630', '2024-05-16', '7-9', 1),
(4, 'INT1645_FALL2024', '12:00 - 3:00', 'H202', 'HT1004', 'INT1645', '2024-05-13', '7-9', 1);
=======
(18, 'INT1254_FALL2024', '09:25 - 11:55', 'H105', 'HT1008', 'INT1254', '2024-04-10', '4-6', 1),
(5, 'INT1255_FALL2024', '09:25 - 11:55', 'H101', 'HT1003', 'INT1255', '2024-04-19', '4-6', 0),
(9, 'INT1350_FALL2024', '12:10 - 14:40', 'H104', 'HT1006', 'INT1350', '2024-05-17', '7-9', 1),
(8, 'INT1360_FALL2024', '09:25 - 11:55', 'H301', 'HT1007', 'INT1360', '2024-05-11', '4-6', 1),
(6, 'INT1620_FALL2024', '14:50 - 17:20', 'H102', 'HT1009', 'INT1620', '2024-04-26', '10-12', 0),
(3, 'INT1630_FALL2024', '12:00 - 3:00', 'H201', 'HT1006', 'INT1630', '2024-05-09', '7-9', 1),
(4, 'INT1645_FALL2024', '12:00 - 3:00', 'H202', 'HT1004', 'INT1645', '2024-05-09', '7-9', 1);
>>>>>>> origin/main

-- --------------------------------------------------------

--
-- Table structure for table `course_has_student`
--

CREATE TABLE `course_has_student` (
  `id` int(255) NOT NULL,
  `c_h_s_code` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `c_h_s_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_has_student`
--

INSERT INTO `course_has_student` (`id`, `c_h_s_code`, `course_code`, `student_code`, `c_h_s_status`) VALUES
(1, 'CNTT2024_001', 'INT1254_FALL2024', '2251120321', 1),
(2, 'CNTT2024_002', 'INT1255_FALL2024', '2251120277', 1),
(3, 'CNTT2024_003', 'INT1255_FALL2024', '2251120325', 0),
(4, 'CNTT2024_004', 'INT1350_FALL2024', '2251120319', 0),
(5, 'CNTT2024_005', 'INT1620_FALL2024', '2251120275', 1),
(6, 'CNTT2024_006', 'INT1254_FALL2024', '2251120266', 1),
(7, 'CNTT2024_007', 'INT1360_FALL2024', '2251120275', 1),
(8, 'CNTT2024_008', 'INT1360_FALL2024', '2251120321', 1),
(9, 'CNTT2024_009', 'INT1630_FALL2024', '2251120275', 1),
(10, 'CNTT2024_010', 'INT1645_FALL2024', '2251120321', 1),
(11, 'CNTT2024_011', 'INT1620_FALL2024', '2251120266', 1),
(12, 'CNTT2024_012', 'INT1620_FALL2024', '2251120319', 1),
(13, 'CNTT2024_013', 'INT1620_FALL2024', '2251120321', 1),
(14, 'CNTT2024_014', 'INT1254_FALL2024', '2251120275', 1),
(15, 'CNTT2024_015', 'INT1254_FALL2024', '2251120277', 1),
(16, 'CNTT2024_016', 'INT1254_FALL2024', '2251120325', 1),
(17, 'CNTT2024_017', 'INT1255_FALL2024', '2251120321', 1),
(18, 'CNTT2024_018', 'INT1255_FALL2024', '2251120275', 1),
(19, 'CNTT2024_019', 'INT1350_FALL2024', '2251120275', 1),
(20, 'CNTT2024_020', 'INT1350_FALL2024', '2251120277', 1),
(21, 'CNTT2024_021', 'INT1350_FALL2024', '2251120325', 1),
(22, 'CNTT2024_022', 'INT1630_FALL2024', '2251120266', 1),
(23, 'CNTT2024_023', 'INT1630_FALL2024', '2251120325', 1),
(24, 'CNTT2024_024', 'INT1630_FALL2024', '2251120321', 1),
(25, 'CNTT2024_025', 'INT1630_FALL2024', '2251120319', 1);

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `id` int(11) NOT NULL,
  `c_h_s_code` varchar(50) NOT NULL,
  `tuition` decimal(10,0) DEFAULT NULL,
  `payment` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`id`, `c_h_s_code`, `tuition`, `payment`) VALUES
(1, 'CNTT2024_003', 1062000, 1000000),
(2, 'CNTT2024_001', 1062000, 1000000),
(3, 'CNTT2024_004', 1062000, 1062000),
(4, 'CNTT2024_005', 1062000, 1062000),
(5, 'CNTT2024_002', 1062000, 1062000),
(6, 'CNTT2024_010', 1062000, 1062000),
(7, 'CNTT2024_011', 1062000, 1062000);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `teacher_code` varchar(50) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `relationship` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `teacher_code`, `student_code`, `subject_code`, `relationship`) VALUES
(1, 'HT1006', '2251120275', 'INT1630', 'Hướng dẫn làm đồ án'),
(2, 'HT1005', '2251120325', 'INT1255', 'Giảng dạy'),
(3, 'HT1005', '2251120321', 'INT1254', 'Giảng dạy'),
(4, 'HT1005', '2251120319', 'INT1350', 'Giảng dạy'),
(5, 'HT1009', '2251120275', 'INT1620', 'Hướng dẫn làm đồ án'),
(6, 'HT1008', '2251120325', 'INT1255', 'Giảng dạy'),
(7, 'HT1007', '2251120321', 'INT1254', 'Giảng dạy'),
(8, 'HT1010', '2251120319', 'INT1350', 'Giảng dạy');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `chuyencan` varchar(50) NOT NULL DEFAULT '0',
  `giuaky` varchar(50) NOT NULL DEFAULT '0',
  `cuoiky` varchar(50) NOT NULL DEFAULT '0',
  `c_h_s_code` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `diemtongket` float GENERATED ALWAYS AS (cast(`chuyencan` as float) * 0.2 + cast(`giuaky` as float) * 0.3 + cast(`cuoiky` as float) * 0.5) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `chuyencan`, `giuaky`, `cuoiky`, `c_h_s_code`, `status`) VALUES
(1, '9', '9', '8', 'CNTT2024_001', 'Đã học'),
(2, '8', '9', '8', 'CNTT2024_002', 'Đã học'),
(4, '3', '4', '2', 'CNTT2024_003', 'Đã học'),
(5, '9', '6', '7', 'CNTT2024_004', 'Đã học'),
(6, '3', '5', '6', 'CNTT2024_006', 'Đã học'),
(7, '9', '8', '9', 'CNTT2024_005', 'Đã học');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `major` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `code`, `major`) VALUES
(61, '2251120266', 'Mạng máy tính và truyền thông dữ liệu'),
(48, '2251120275', 'Công nghệ thông tin'),
(60, '2251120277', 'Hệ thống thông tin quản lý'),
(56, '2251120319', 'Công nghệ thông tin'),
(59, '2251120321', 'Công nghệ thông tin'),
(54, '2251120325', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `num_credit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `subjectname`, `num_credit`) VALUES
(16, 'INT1254', 'Lập trình hướng đối tượng', '2'),
(14, 'INT1255', 'Cơ sở dữ liệu & giải thuật', '2'),
(17, 'INT1350', 'Cơ sở dữ liệu', '3'),
(15, 'INT1360', 'Toán rời rạc', '2'),
(13, 'INT1620', 'Lập trình web', '3'),
(18, 'INT1630', 'Thiết kế hệ thống', '3'),
(19, 'INT1645', 'Mạng máy tính', '3');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `level` varchar(11) DEFAULT NULL,
  `training` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `code`, `sex`, `title`, `level`, `training`) VALUES
(1, 'HT1005', 'Nam', 'Giảng viên', 'Thạc sĩ', 'Mạng máy tính và truyền thông dữ liệu'),
(2, 'HT1006', 'Nam', 'Giảng viên', 'Thạc sĩ', 'Công nghệ thông tin'),
(3, 'HT1003', 'Nam', 'Giảng viên', 'Thạc sĩ', 'Công nghệ thông tin'),
(4, 'HT1004', 'Nữ', 'Giảng viên', 'Thạc sĩ', 'Mạng máy tính và truyền thông dữ'),
(5, 'HT1008', 'Nam', 'Giảng viên', 'Thạc sĩ', 'Công nghệ thông tin'),
(6, 'HT1007', 'Nam', 'Giảng viên', 'Thạc sĩ', 'Công nghệ thông tin'),
(7, 'HT1009', 'Nữ', 'Giảng viên', 'Thạc sĩ', 'Công nghệ thông tin'),
(8, 'HT1010', 'Nữ', 'Trợ giảng', 'Thạc sĩ', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` int(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `phone`, `birthday`, `email`, `usertype`, `password`, `pob`) VALUES
('Lê Văn An', '2251120266', 129391283, '2024-05-07', '2251120266@ut.edu.vn', 'student', '006', 'TP.Hồ Chí Minh'),
('Lê Văn Cừ', '2251120275', 366796412, '2004-01-02', '2251120275@ut.edu.vn', 'student', '003', 'Bình Phước'),
('Nguyễn Văn Nam', '2251120277', 343526456, '2024-05-07', '2251120277@ut.edu.vn', 'student', '005', 'TP.Hồ Chí Minh'),
('Lê Đào Khang Thịnh', '2251120319', 124135325, '2024-01-06', '2251120319@ut.edu.vn', 'student', '002', 'Tây Ninh'),
('Lê Hữu Thông', '2251120321', 12412412, '2024-05-07', '2251120321@ut.edu.vn', 'student', '009', 'Ninh Thuận'),
('Đặng Đức Tĩnh', '2251120325', 923123444, '2024-05-01', '2251120325@ut.edu.vn', 'student', '000', 'Ninh Thuận'),
('ADMIN', 'admin', 366796412, '2020-04-09', 'admin@gmail.com', 'admin', '1234', 'TP.Hồ Chí Minh'),
('Võ Văn Bình ', 'HT1003', 91241241, '1975-11-17', 'vovanbinh@ut.edu.vn', 'teacher', '6575', 'TP.Hồ Chí Minh'),
('Phan Thị Hồng Nhung', 'HT1004', 912412515, '1988-09-10', 'phanthihongnhung@ut.edu.vn', 'teacher', '757', 'TP.Hồ Chí Minh'),
('Nguyễn Ngọc Thạch', 'HT1005', 923123447, '1973-06-05', 'nguyenvanf@gmail.com', 'teacher', '128', 'TP.Hồ Chí Minh'),
('Nguyễn Văn Diêu', 'HT1006', 923123427, '1965-04-11', 'nguyenvans@gmail.com', 'teacher', '129', 'TP.Hồ Chí Minh'),
('Bùi Trọng Hiếu', 'HT1007', 912412514, '1970-07-07', 'buitronghieu@ut.edu.vn', 'teacher', '754', 'TP.Hồ Chí Minh'),
('Vũ Đình Long', 'HT1008', 912412515, '1977-11-29', 'vudinhlong@ut.edu.vn', 'teacher', '756', 'TP.Hồ Chí Minh'),
('Trần Thị Mỹ Tiên', 'HT1009', 912412513, '1987-03-17', 'tranthimytien@ut.edu.vn', 'teacher', '753', 'TP.Hồ Chí Minh'),
('Trần Thị Yến ', 'HT1010', 912412513, '1991-03-20', 'tranthiyen@ut.edu.vn', 'teacher', '752', 'TP.Hồ Chí Minh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_course_teacher_idx` (`teacher_code`),
  ADD KEY `fk_course_subject_idx` (`subject_code`);

--
-- Indexes for table `course_has_student`
--
ALTER TABLE `course_has_student`
  ADD PRIMARY KEY (`c_h_s_code`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_course_has_student_student_idx` (`student_code`),
  ADD KEY `fk_course_has_student_course_idx` (`course_code`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_financial_c_h_s_code` (`c_h_s_code`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_code` (`teacher_code`),
  ADD KEY `student_code` (`student_code`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_c_h_s_result` (`c_h_s_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`,`code`),
  ADD KEY `fk_teacher_user` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_has_student`
--
ALTER TABLE `course_has_student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_subject` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_course_teacher` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_has_student`
--
ALTER TABLE `course_has_student`
  ADD CONSTRAINT `fk_course_has_student_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_course_has_student_student` FOREIGN KEY (`student_code`) REFERENCES `student` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `financial`
--
ALTER TABLE `financial`
  ADD CONSTRAINT `fk_financial_c_h_s_code` FOREIGN KEY (`c_h_s_code`) REFERENCES `course_has_student` (`c_h_s_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`code`),
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`student_code`) REFERENCES `student` (`code`),
  ADD CONSTRAINT `relationship_ibfk_3` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_c_h_s_result` FOREIGN KEY (`c_h_s_code`) REFERENCES `course_has_student` (`c_h_s_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

ALTER TABLE course
ADD COLUMN display_count INT DEFAULT 0;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
