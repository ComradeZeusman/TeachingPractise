-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 01:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachingpractise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `email`, `password`) VALUES
(1, 'Mr jere', 'stanfordperenje@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin_complaint`
--

CREATE TABLE `admin_complaint` (
  `ID` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applied_for`
--

CREATE TABLE `applied_for` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_for`
--

INSERT INTO `applied_for` (`ID`, `student_id`, `school_id`) VALUES
(1, 7, 4),
(2, 7, 5),
(3, 8, 5),
(4, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assigned_school` varchar(255) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`assignment_id`, `student_id`, `assigned_school`, `supervisor_id`) VALUES
(23, 7, '4', 3),
(24, 8, '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `continuous1`
--

CREATE TABLE `continuous1` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `Subjects` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `number_of_pupils` int(250) NOT NULL,
  `class` varchar(50) NOT NULL,
  `care_element` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `continuous1`
--

INSERT INTO `continuous1` (`id`, `student_id`, `date`, `reg_number`, `school_name`, `Subjects`, `time`, `number_of_pupils`, `class`, `care_element`, `topic`) VALUES
(4, 7, '2023-11-25', 'BEH/01/01/01', 'Kalileni private secondary school', 'Bilogy\r\nmathematics', '20:18', 200, 'Form 4 A', 'kayatu', 'kaya man');

-- --------------------------------------------------------

--
-- Table structure for table `first_clinical_grade`
--

CREATE TABLE `first_clinical_grade` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `maximum_score` int(100) NOT NULL,
  `actual_score` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `wanted_subjects` varchar(255) NOT NULL,
  `school_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `wanted_subjects`, `school_location`) VALUES
(4, 'Kalileni private secondary school', 'Bilogy\r\nmathematics', 'Lilongwe'),
(5, 'Kalonga pvt school', 'English\r\nBible knowledge', 'Lunzu'),
(6, 'LIVINGSTONIA CDSS', 'Physics\r\nChemistry', 'Kalonga');

-- --------------------------------------------------------

--
-- Table structure for table `second_clinical_grade`
--

CREATE TABLE `second_clinical_grade` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `item` int(255) NOT NULL,
  `maximum_score` int(100) NOT NULL,
  `actual_score` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `school_email` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `preferred_subjects` text NOT NULL,
  `preferred_district` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved` varchar(255) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `reg_number`, `school_email`, `program`, `year`, `semester`, `preferred_subjects`, `preferred_district`, `password`, `approved`, `school_name`, `subjects`) VALUES
(7, 'Madalo', 'Perenje', 'BEH/01/01/01', 'cen-01-33-21@unilia.ac.mw', 'Bachelor of Education in Humanities', 4, 7, 'Biology\r\nEnglish', 'Kasungu', '$2y$10$M/flBWElAlysU63zbtgL2uBHo7ObyR2O4FGwX0Iiuqy8n/nW7pNPS', 'Yes', NULL, NULL),
(8, 'Vitumbiko', 'Shaba', 'ICT/01/33/22', 'cen-01-15-21@unilia.ac.mw', 'Bachelor of Education in Humanities', 4, 7, 'Biology', 'Machinga', '$2y$10$TjcpORF2JudM/LVDgsByueOk4HNbHWcIX2PBz2UsP5mS5KKQcL3YW', 'Yes', 'Kalileni private secondary school', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `student_complaint`
--

CREATE TABLE `student_complaint` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `school_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `first_name`, `last_name`, `school_email`, `phone_number`, `password`) VALUES
(3, 'Tawonga', 'Mkandawire', 'tmkandawire@unilia.ac.mw', '+265993616223', '$2y$10$wRaapaTcNGZfJpunJPJFh.Wm14ua/zaMKdRquSt4tcVTuPEmnDn2q');

-- --------------------------------------------------------

--
-- Table structure for table `tppayment`
--

CREATE TABLE `tppayment` (
  `ID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `merchant` varchar(255) NOT NULL,
  `reciept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tppayment`
--

INSERT INTO `tppayment` (`ID`, `student_id`, `amount`, `date`, `merchant`, `reciept`) VALUES
(18, 7, 300000, '2023-08-24T12:00:00.000Z', 'UNILIA LAWS CAMPOS', 'uploads/WhatsApp Image 2023-11-16 at 16.08.05_bc148b45.jpg'),
(19, 8, 300000, '2023-08-24T12:00:00.000Z', 'UNILIA LAWS CAMPOS', 'uploads/WhatsApp Image 2023-11-16 at 16.08.05_bc148b45.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin_complaint`
--
ALTER TABLE `admin_complaint`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `applied_for`
--
ALTER TABLE `applied_for`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `continuous1`
--
ALTER TABLE `continuous1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `second_clinical_grade`
--
ALTER TABLE `second_clinical_grade`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_complaint`
--
ALTER TABLE `student_complaint`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `tppayment`
--
ALTER TABLE `tppayment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_complaint`
--
ALTER TABLE `admin_complaint`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_for`
--
ALTER TABLE `applied_for`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `continuous1`
--
ALTER TABLE `continuous1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_complaint`
--
ALTER TABLE `student_complaint`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tppayment`
--
ALTER TABLE `tppayment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_complaint`
--
ALTER TABLE `admin_complaint`
  ADD CONSTRAINT `admin_complaint_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `admin_complaint_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `applied_for`
--
ALTER TABLE `applied_for`
  ADD CONSTRAINT `applied_for_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`);

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `assigned_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `assigned_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`supervisor_id`);

--
-- Constraints for table `continuous1`
--
ALTER TABLE `continuous1`
  ADD CONSTRAINT `continuous1_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  ADD CONSTRAINT `first_clinical_grade_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `second_clinical_grade`
--
ALTER TABLE `second_clinical_grade`
  ADD CONSTRAINT `second_clinical_grade_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `student_complaint`
--
ALTER TABLE `student_complaint`
  ADD CONSTRAINT `student_complaint_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `student_complaint_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `tppayment`
--
ALTER TABLE `tppayment`
  ADD CONSTRAINT `tppayment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
