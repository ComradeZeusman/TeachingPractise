-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 11:41 AM
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

--
-- Dumping data for table `admin_complaint`
--

INSERT INTO `admin_complaint` (`ID`, `admin_id`, `student_id`, `complaint`, `time`) VALUES
(2, 1, 7, 'a m sick', '2023-11-28 07:15:00pm');

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
(4, 8, 6),
(5, 10, 4),
(6, 10, 6);

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
(29, 7, '4', 3),
(30, 8, '5', 6),
(31, 10, '4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `classcontrol`
--

CREATE TABLE `classcontrol` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classcontrol2`
--

CREATE TABLE `classcontrol2` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, 7, '2023-12-01', 'BEH/01/01/01', 'Kalileni private secondary school', 'Bilogy\r\nmathematics', '12:37', 70, 'Form 4 A', 'kayatu', 'kaya man');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_assessment`
--

CREATE TABLE `evaluation_assessment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL,
  `actual_score_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation_assessment`
--

INSERT INTO `evaluation_assessment` (`id`, `student_id`, `actual_score_introduction`, `actual_score_pacing`, `actual_score_teaching_materials`, `actual_score_teaching_methods`, `actual_score_questions`) VALUES
(6, 7, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_assessment2`
--

CREATE TABLE `evaluation_assessment2` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL,
  `actual_score_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `lesson_presentation`
--

CREATE TABLE `lesson_presentation` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL,
  `actual_score_questions` int(11) NOT NULL,
  `actual_score_instruction` int(11) NOT NULL,
  `actual_score_chalkboard` int(11) NOT NULL,
  `actual_score_subject_mastery` int(11) NOT NULL,
  `actual_score_conclusion` int(11) NOT NULL,
  `actual_score_rapport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_presentation2`
--

CREATE TABLE `lesson_presentation2` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL,
  `actual_score_teaching_methods` int(11) NOT NULL,
  `actual_score_questions` int(11) NOT NULL,
  `actual_score_instruction` int(11) NOT NULL,
  `actual_score_chalkboard` int(11) NOT NULL,
  `actual_score_subject_mastery` int(11) NOT NULL,
  `actual_score_conclusion` int(11) NOT NULL,
  `actual_score_rapport` int(11) NOT NULL
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personalandprofessional`
--

CREATE TABLE `personalandprofessional` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personalandprofessional2`
--

CREATE TABLE `personalandprofessional2` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_introduction` int(11) NOT NULL,
  `actual_score_pacing` int(11) NOT NULL,
  `actual_score_teaching_materials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recordkeeping`
--

CREATE TABLE `recordkeeping` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_success_criteria` int(11) NOT NULL,
  `actual_score_sequence` int(11) NOT NULL,
  `actual_score_content` int(11) NOT NULL,
  `actual_score_intro_conclusion` int(11) NOT NULL,
  `actual_score_teaching_material` int(11) NOT NULL,
  `actual_score_strategies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recordkeeping2`
--

CREATE TABLE `recordkeeping2` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `actual_score_success_criteria` int(11) NOT NULL,
  `actual_score_sequence` int(11) NOT NULL,
  `actual_score_content` int(11) NOT NULL,
  `actual_score_intro_conclusion` int(11) NOT NULL,
  `actual_score_teaching_material` int(11) NOT NULL,
  `actual_score_strategies` int(11) NOT NULL
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
(7, 'Madalo', 'Perenje', 'BEH/01/01/01', 'cen-01-33-21@unilia.ac.mw', 'Bachelor of Education in Humanities', 4, 7, 'Biology\r\nEnglish', 'Kasungu', '$2y$10$UjEcMlvxUgyNYD39x0jYruoR12reQAJQGrD/JJ09eRRES6ZfgVZ5u', 'Yes', NULL, NULL),
(8, 'Vitumbiko', 'Shaba', 'ICT/01/33/22', 'cen-01-15-21@unilia.ac.mw', 'Bachelor of Education in Humanities', 4, 7, 'Biology', 'Machinga', '$2y$10$TjcpORF2JudM/LVDgsByueOk4HNbHWcIX2PBz2UsP5mS5KKQcL3YW', 'Yes', 'Kalileni private secondary school', 'Biology'),
(10, 'Calyx', 'Chisiza', 'ICT/01/33/21', 'ict-01-09-21@unilia.ac.mw', 'Bachelor of Education in Sciences', 4, 7, 'lkxslknclknc', 'Mulanje', '$2y$10$Q1F5odzlTK93q1NyEabv.uG1HXpB2RWCH/yl/5S0sjD5OyFCOyj6.', 'Yes', NULL, NULL);

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
(3, 'Tawonga', 'Mkandawire', 'tmkandawire@unilia.ac.mw', '+265993616223', '$2y$10$wRaapaTcNGZfJpunJPJFh.Wm14ua/zaMKdRquSt4tcVTuPEmnDn2q'),
(5, 'Stan', 'Shaba', 'uniliastudentsunionvotingsyste@gmail.com', '0888501819', '$2y$10$Lq3NLYemb/z/Cle/.8w/Nujjv8sdTuYfa8Zp4QRs5bP7vwsv30qMK'),
(6, 'Anitta', 'Maida', 'ict-01-08-21@unilia.ac.mw', '+2658888159', '$2y$10$0hqMNGig/XF1UkuPtP7w.ub9/grHsHCtirYDv8U6OW5i7CEkf1NnC');

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
(26, 8, 200000, '2023-10-26T12:00:00.000Z', 'UNILIA LAWS CAMPUS FEES', 'uploads/85a977ed-6073-408a-8fb4-0ae943020cac.jpeg'),
(27, 7, 300000, '2023-08-24T12:00:00.000Z', 'UNILIA LAWS CAMPOS', 'uploads/WhatsApp Image 2023-11-16 at 16.08.05_bc148b45.jpg'),
(28, 10, 300000, '2023-08-24T12:00:00.000Z', 'UNILIA LAWS CAMPOS', 'uploads/WhatsApp Image 2023-11-16 at 16.08.05_bc148b45.jpg');

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
-- Indexes for table `classcontrol`
--
ALTER TABLE `classcontrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `classcontrol2`
--
ALTER TABLE `classcontrol2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `continuous1`
--
ALTER TABLE `continuous1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `evaluation_assessment`
--
ALTER TABLE `evaluation_assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `evaluation_assessment2`
--
ALTER TABLE `evaluation_assessment2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `lesson_presentation`
--
ALTER TABLE `lesson_presentation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `lesson_presentation2`
--
ALTER TABLE `lesson_presentation2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalandprofessional`
--
ALTER TABLE `personalandprofessional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalandprofessional2`
--
ALTER TABLE `personalandprofessional2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `recordkeeping`
--
ALTER TABLE `recordkeeping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `recordkeeping2`
--
ALTER TABLE `recordkeeping2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applied_for`
--
ALTER TABLE `applied_for`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `classcontrol`
--
ALTER TABLE `classcontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classcontrol2`
--
ALTER TABLE `classcontrol2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `continuous1`
--
ALTER TABLE `continuous1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evaluation_assessment`
--
ALTER TABLE `evaluation_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `evaluation_assessment2`
--
ALTER TABLE `evaluation_assessment2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_presentation`
--
ALTER TABLE `lesson_presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lesson_presentation2`
--
ALTER TABLE `lesson_presentation2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personalandprofessional`
--
ALTER TABLE `personalandprofessional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personalandprofessional2`
--
ALTER TABLE `personalandprofessional2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recordkeeping`
--
ALTER TABLE `recordkeeping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recordkeeping2`
--
ALTER TABLE `recordkeeping2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_complaint`
--
ALTER TABLE `student_complaint`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tppayment`
--
ALTER TABLE `tppayment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- Constraints for table `classcontrol`
--
ALTER TABLE `classcontrol`
  ADD CONSTRAINT `classcontrol_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `classcontrol2`
--
ALTER TABLE `classcontrol2`
  ADD CONSTRAINT `classcontrol2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `continuous1`
--
ALTER TABLE `continuous1`
  ADD CONSTRAINT `continuous1_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `evaluation_assessment`
--
ALTER TABLE `evaluation_assessment`
  ADD CONSTRAINT `evaluation_assessment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `evaluation_assessment2`
--
ALTER TABLE `evaluation_assessment2`
  ADD CONSTRAINT `evaluation_assessment2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `first_clinical_grade`
--
ALTER TABLE `first_clinical_grade`
  ADD CONSTRAINT `first_clinical_grade_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `lesson_presentation`
--
ALTER TABLE `lesson_presentation`
  ADD CONSTRAINT `lesson_presentation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `lesson_presentation2`
--
ALTER TABLE `lesson_presentation2`
  ADD CONSTRAINT `lesson_presentation2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `personalandprofessional2`
--
ALTER TABLE `personalandprofessional2`
  ADD CONSTRAINT `personalandprofessional2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `recordkeeping`
--
ALTER TABLE `recordkeeping`
  ADD CONSTRAINT `recordkeeping_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `recordkeeping2`
--
ALTER TABLE `recordkeeping2`
  ADD CONSTRAINT `recordkeeping2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

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
