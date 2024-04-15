-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 03:40 PM
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
-- Table structure for table `users`
--




DROP TABLE IF EXISTS `user`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
 `name` varchar(20)  NOT NULL,
  `username`  varchar(50) NOT NULL,
  `phone` int(30)  DEFAULT NULL,
  `email` varchar(50)  DEFAULT NULL,
  `usertype` varchar(50)  DEFAULT NULL,
  `password` varchar(50)  DEFAULT NULL,
  `pob` varchar(50)  NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `usertype`, `password`, `pob`) 
VALUES (1, 'Nguyen Van B', 'admin', 366796412, 'admin@gmail.com', 'admin', '1234', 'Q1'), 
       (2, 'Nguyen Van C', 'CN22F2', 867086745, 'student@gmail.com', 'student', '5678', 'Q2'), 
       (15, 'nguyenvana', 'CN22F1', 923123447, 'nguyenvana@gmail.com', 'student', '1238', 'Q3'), 
       (18, 'Ngô Xuân Bách', 'HT1005', 923123447, 'nguyenvanf@gmail.com', 'teacher', '128', 'Q4'), 
       (20, 'Ngô Xuân Mạnh', 'HT1006', 923123427, 'nguyenvans@gmail.com', 'teacher', '129', 'Q5');









CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`,`code`),
  KEY `fk_teacher_user` (`code`),
  CONSTRAINT `fk_teacher_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- /*!40101 SET character_set_client = @saved_cs_client */;

 -- Dumping data for table `teacher`

INSERT INTO `teacher` VALUES (1,'HT1005'),(2,'HT1006');

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `major` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `id` (`id`),
  CONSTRAINT `fk_student_user` FOREIGN KEY (`code`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (39,'CN22F2','Công nghệ Thông tin'),(40,'CN22F1','Công nghệ Thông tin');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `num_credit` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `major` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code` (`code`),
  KEY `id` (`id`)
 ) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- /*!40101 SET character_set_client = @saved_cs_client */;





/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (16,'INT1254','Ngôn ngữ Lập trình C#','2','CNTT'),(14,'INT1255','Ngôn ngữ Lập trình C++','2','CNTT'),(17,'INT1350','Cơ sở dữ liệu','3','CNTT'),(13,'INT1620','Các hệ thống phân tán','3','CNTT'),(19,'INT1645','Nhập môn Trí tuệ Nhân Tạo','3','CNTT');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


DROP TABLE IF EXISTS `course`;


CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `time` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `room` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `teacher_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `subject_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `start_time` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `day_of_week` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `id` (`id`),
  KEY `fk_course_teacher_idx` (`teacher_code`),
  KEY `fk_course_subject_idx` (`subject_code`),
  CONSTRAINT `fk_course_subject` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_course_teacher` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into the course table
INSERT INTO `course` (`id`,`code`, `time`, `room`, `teacher_code`, `subject_code`, `start_time`, `day_of_week`) VALUES
('5','INT1255_1_FALL2018', '09:00 - 11:00', 'Room 101', 'HT1005', 'INT1254', '09:00', 'Monday');

DROP TABLE IF EXISTS `course_has_student`;

CREATE TABLE `course_has_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_h_s_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `student_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`c_h_s_code`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_course_has_student_student_idx` (`student_code`),
  KEY `fk_course_has_student_course_idx` (`course_code`),
  CONSTRAINT `fk_course_has_student_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_course_has_student_student` FOREIGN KEY (`student_code`) REFERENCES `student` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `course_has_student`
INSERT INTO `course_has_student` (`id`, `c_h_s_code`, `course_code`, `student_code`) VALUES
(3, 'INT1255_1_FALL2018_CN22F1', 'INT1255_1_FALL2018', 'CN22F1');


DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chuyencan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `giuaky` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `baitap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cuoiky` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `c_h_s_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`c_h_s_code`),
  KEY `id` (`id`),
  KEY `fk_result_course_has_student_idx` (`c_h_s_code`),
  CONSTRAINT `fk_result_course_has_student` FOREIGN KEY (`c_h_s_code`) REFERENCES `course_has_student` (`c_h_s_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `result`
INSERT INTO `result` (`id`, `chuyencan`, `giuaky`, `baitap`, `cuoiky`, `c_h_s_code`,`status`) VALUES
(15, '9', '9', '9', '9',  'INT1255_1_FALL2018_CN22F1','STUDIED');








-- DROP TABLE IF EXISTS `course_has_student`;
-- /*!40101 SET @saved_cs_client     = @@character_set_client */;
-- /*!40101 SET character_set_client = utf8 */;
