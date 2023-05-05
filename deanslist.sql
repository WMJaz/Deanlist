-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 06:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deanslist`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants_grades`
--

CREATE TABLE `applicants_grades` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants_grades`
--

INSERT INTO `applicants_grades` (`id`, `applicant_id`, `subject_id`, `grade`) VALUES
(60, 46, 27, 1.5),
(61, 46, 28, 1.25),
(62, 46, 27, 1.5),
(63, 46, 28, 1.25),
(64, 47, 27, 1.5),
(65, 47, 28, 1.25),
(66, 54, 32, 2),
(67, 54, 33, 2),
(68, 54, 34, 2),
(69, 54, 35, 2),
(70, 54, 36, 2),
(71, 54, 37, 2),
(72, 54, 38, 2),
(73, 54, 32, 2),
(74, 54, 33, 2),
(75, 54, 34, 2),
(76, 54, 35, 2),
(77, 54, 36, 2),
(78, 54, 37, 2),
(79, 54, 38, 2),
(80, 55, 39, 1.5),
(81, 55, 40, 1.25),
(82, 55, 41, 1.75),
(83, 55, 42, 1),
(84, 55, 43, 1.25),
(85, 56, 27, 1.5),
(86, 56, 28, 1.25),
(87, 57, 29, 2.5),
(88, 57, 30, 1.5),
(89, 57, 31, 1.5),
(90, 57, 29, 2.5),
(91, 57, 30, 1.5),
(92, 57, 31, 1.5),
(93, 60, 29, 1.5),
(94, 60, 30, 1),
(95, 60, 31, 1.25),
(96, 60, 29, 1.5),
(97, 60, 30, 1),
(98, 60, 31, 1.25),
(99, 61, 27, 1.5),
(100, 61, 28, 1.5),
(115, 66, 27, 1.25),
(116, 66, 28, 1.5),
(117, 67, 27, 1.5),
(118, 67, 28, 1.75),
(119, 69, 111, 1.5),
(120, 69, 112, 1.5),
(121, 69, 113, 1),
(131, 71, 27, 1.5),
(132, 71, 28, 1.5),
(133, 72, 27, 1.5),
(134, 72, 28, 1.5),
(135, 73, 29, 1.5),
(136, 73, 30, 1.5),
(137, 73, 31, 1.5),
(138, 74, 27, 1.5),
(139, 74, 28, 1.5),
(140, 75, 27, 1.5),
(141, 75, 28, 1.5),
(142, 76, 27, 2.5),
(143, 76, 28, 1.5),
(847, 100, 39, 1),
(848, 100, 40, 1),
(849, 100, 41, 1),
(850, 100, 42, 1),
(851, 100, 43, 1),
(852, 100, 39, 1),
(853, 100, 40, 1),
(854, 100, 41, 1),
(855, 100, 42, 1),
(856, 100, 43, 1),
(857, 100, 39, 1),
(858, 100, 40, 1),
(859, 100, 41, 1),
(860, 100, 42, 1),
(861, 100, 43, 1),
(862, 100, 39, 1),
(863, 100, 40, 1),
(864, 100, 41, 1),
(865, 100, 42, 1),
(866, 100, 43, 1),
(867, 100, 39, 1),
(868, 100, 40, 1),
(869, 100, 41, 1),
(870, 100, 42, 1),
(871, 100, 43, 1),
(872, 100, 39, 1),
(873, 100, 40, 1),
(874, 100, 41, 1),
(875, 100, 42, 1),
(876, 100, 43, 1),
(877, 100, 39, 1),
(878, 100, 40, 1),
(879, 100, 41, 1),
(880, 100, 42, 1),
(881, 100, 43, 1),
(882, 100, 39, 1),
(883, 100, 40, 1),
(884, 100, 41, 1),
(885, 100, 42, 1),
(886, 100, 43, 1),
(887, 100, 39, 1),
(888, 100, 40, 1),
(889, 100, 41, 1),
(890, 100, 42, 1),
(891, 100, 43, 1),
(892, 100, 39, 1),
(893, 100, 40, 1),
(894, 100, 41, 1),
(895, 100, 42, 1),
(896, 100, 43, 1),
(897, 100, 39, 1),
(898, 100, 40, 1),
(899, 100, 41, 1),
(900, 100, 42, 1),
(901, 100, 43, 1),
(902, 100, 39, 1),
(903, 100, 40, 1),
(904, 100, 41, 1),
(905, 100, 42, 1),
(906, 100, 43, 1),
(907, 100, 39, 1),
(908, 100, 40, 1),
(909, 100, 41, 1),
(910, 100, 42, 1),
(911, 100, 43, 1),
(912, 100, 39, 1),
(913, 100, 40, 1),
(914, 100, 41, 1),
(915, 100, 42, 1),
(916, 100, 43, 1),
(917, 100, 39, 1),
(918, 100, 40, 1),
(919, 100, 41, 1),
(920, 100, 42, 1),
(921, 100, 43, 1),
(922, 100, 39, 1),
(923, 100, 40, 1),
(924, 100, 41, 1),
(925, 100, 42, 1),
(926, 100, 43, 1),
(927, 100, 39, 1),
(928, 100, 40, 1),
(929, 100, 41, 1),
(930, 100, 42, 1),
(931, 100, 43, 1),
(932, 100, 39, 1),
(933, 100, 40, 1),
(934, 100, 41, 1),
(935, 100, 42, 1),
(936, 100, 43, 1),
(937, 100, 39, 1),
(938, 100, 40, 1),
(939, 100, 41, 1),
(940, 100, 42, 1),
(941, 100, 43, 1),
(942, 100, 39, 1),
(943, 100, 40, 1),
(944, 100, 41, 1),
(945, 100, 42, 1),
(946, 100, 43, 1),
(947, 100, 39, 1),
(948, 100, 40, 1),
(949, 100, 41, 1),
(950, 100, 42, 1),
(951, 100, 43, 1),
(952, 100, 39, 1),
(953, 100, 40, 1),
(954, 100, 41, 1),
(955, 100, 42, 1),
(956, 100, 43, 1),
(1642, 129, 153, 1),
(1643, 129, 154, 1),
(1644, 129, 155, 1),
(1645, 129, 156, 1),
(1646, 129, 157, 1),
(1647, 129, 158, 1),
(1648, 129, 159, 1),
(1649, 129, 160, 1),
(1650, 129, 161, 1),
(1734, 135, 153, 1),
(1735, 135, 154, 1),
(1736, 135, 155, 1),
(1737, 135, 156, 1),
(1738, 135, 157, 1),
(1739, 135, 158, 1),
(1740, 135, 159, 1),
(1741, 135, 160, 1),
(1742, 135, 161, 1),
(1835, 153, 153, 1),
(1836, 153, 154, 1),
(1837, 153, 155, 1),
(1838, 153, 156, 1),
(1839, 153, 157, 1),
(1840, 153, 158, 1),
(1841, 153, 159, 1),
(1842, 153, 160, 1),
(1843, 153, 161, 1),
(1844, 153, 153, 1),
(1845, 153, 154, 1),
(1846, 153, 155, 1),
(1847, 153, 156, 1),
(1848, 153, 157, 1),
(1849, 153, 158, 1),
(1850, 153, 159, 1),
(1851, 153, 160, 1),
(1852, 153, 161, 1),
(1853, 153, 153, 1),
(1854, 153, 154, 1),
(1855, 153, 155, 1),
(1856, 153, 156, 1),
(1857, 153, 157, 1),
(1858, 153, 158, 1),
(1859, 153, 159, 1),
(1860, 153, 160, 1),
(1861, 153, 161, 1),
(1862, 154, 153, 1),
(1863, 154, 154, 1),
(1864, 154, 155, 1),
(1865, 154, 156, 1),
(1866, 154, 157, 1),
(1867, 154, 158, 1),
(1868, 154, 159, 1.25),
(1869, 154, 160, 1.5),
(1870, 154, 161, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `course_fullname`) VALUES
(1, 'BSCS', 'Bachelor of Science in Computer Science'),
(2, 'BSIT', 'Bacher of Science in Information Technology'),
(3, 'BSS', 'SAMPLE DESC'),
(4, 'BSVS', 'BACHELOR OF SCIENCE IN VULCANIZING SHOP');

-- --------------------------------------------------------

--
-- Table structure for table `course_schoolyear`
--

CREATE TABLE `course_schoolyear` (
  `id` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_schoolyear`
--

INSERT INTO `course_schoolyear` (`id`, `school_year`, `course_id`) VALUES
(1, '2022-2023', 1),
(3, '2021-2022', 1),
(15, '2022-2023', 2),
(16, '2023-2024', 2),
(17, '2023-2024', 3);

-- --------------------------------------------------------

--
-- Table structure for table `deanslist_applicants`
--

CREATE TABLE `deanslist_applicants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `gpa` float NOT NULL,
  `app_status` varchar(255) NOT NULL,
  `app_file` varchar(255) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `adviser_status` varchar(255) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `accept_reapplication` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deanslist_applicants`
--

INSERT INTO `deanslist_applicants` (`id`, `user_id`, `user_name`, `email`, `curriculum`, `semester`, `year_level`, `section`, `school_year_id`, `gpa`, `app_status`, `app_file`, `adviser_id`, `adviser_status`, `feedback`, `created_at`, `accept_reapplication`) VALUES
(46, 48, 'test test', 'test123@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.375, 'Declined', 'score.png', 7, 'Declined', '', '2023-05-03 07:16:38', 0),
(47, 50, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.375, 'Declined', 'ccs-logo.png', 7, 'Declined', '', '2023-05-03 07:02:41', 0),
(54, 51, 'Denise Gerzon', 'denisegerzon@wmsu.edu.ph', 'BSCS', '1', '3', 'A', 1, 2, 'Declined', 'ccs-logo.png', 7, 'Declined', 'sample', '2023-05-03 07:06:59', 0),
(55, 52, 'Abdulasis Hamja', 'abdulasis@wmsu.edu.ph', 'BSCS', '2', '3', 'C', 1, 1.35, 'Accepted', 'ccs-logo.png', 7, 'Accepted', '', '2023-05-02 15:37:33', 0),
(56, 53, 'Josh Yasil', 'joshyasil@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.375, 'Accepted', 'ccs-logo.png', 7, 'Accepted', '', '2023-05-03 12:39:37', 0),
(57, 54, 'Mark Vladimir', 'markvladimir@wmsu.edu.ph', 'BSCS', '2', '4', 'A', 1, 1.83333, 'Pending', 'ccs-logo.png', 7, 'Accepted', '', '2023-05-03 12:39:57', 0),
(60, 55, 'Bushra Adjaluddin', 'bushra@wmsu.edu.ph', 'BSCS', '2', '4', 'A', 1, 1.25, 'Declined', 'ccs-logo.png', 7, 'Declined', '', '2023-05-03 05:56:32', 0),
(61, 56, 'Juan Dela Cruz', 'juandelacruz@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.5, 'Pending', 'ccs-logo.png', 7, 'Accepted', '', '2023-05-03 12:40:14', 0),
(66, 64, 'LeBron James', 'lebronjames@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.375, 'Pending', 'scorequiz.png', 7, 'Accepted', '', '2023-05-03 12:40:16', 0),
(67, 65, 'Aiyayuu Misyu', 'aiyayuu@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.625, 'Declined', 'male.png', 7, 'Declined', 'SAMPLE FEED yeah!!', '2023-05-03 05:51:35', 0),
(69, 66, 'Lucky Me Maggie', 'maggie@wmsu.edu.ph', 'BSIT', '2', '4', 'A', 15, 1.33333, 'Pending', 'male.png', 7, 'Accepted', '', '2023-05-03 12:40:42', 0),
(70, 67, 'kyrie irving', 'kyrie@wmsu.edu.ph', 'BSCS', '1', '1', 'A', 1, 2, 'Pending', 'ballaho.png', 7, 'Accepted', 'sample feedback', '2023-05-03 12:40:45', 0),
(71, 68, 'juan juan', '1@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.5, 'Pending', 'male.png', 7, 'Accepted', '', '2023-05-03 12:40:48', 0),
(72, 69, 'Two Two', '2@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.5, 'Pending', 'male.png', 7, 'Pending', '', '2023-05-02 15:26:20', 0),
(73, 70, 'three three', 'three@wmsu.edu.ph', 'BSCS', '2', '4', 'A', 1, 1.5, 'Declined', 'male.png', 7, 'Declined', 'sample feed\n', '2023-05-04 03:38:36', 0),
(74, 71, 'Four Four', 'four@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.5, 'Declined', 'male.png', 7, 'Declined', 'four four sample feedback', '2023-05-03 07:15:18', 0),
(75, 72, 'Hay Payb', 'haypayb@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 1.5, 'Accepted', 'male.png', 7, 'Accepted', '', '2023-05-03 12:35:58', 0),
(76, 73, 'Up Here', 'uphere@wmsu.edu.ph', 'BSCS', '1', '4', 'A', 1, 2, 'Pending', 'male.png', 8, 'Pending', '', '2023-05-02 15:26:20', 0),
(78, 74, 'qwe qwe', 'qwe@wmsu.edu.ph', 'BSCS', '1', '1', 'B', 1, 1.19444, 'Pending', 'photo_6217418791567078755_y.jpg', 17, 'Pending', '', '2023-05-02 15:26:20', 0),
(100, 125, '123 123', 'eh202200295@wmsu.edu.ph', 'BSCS', '2', '3', 'A', 1, 1, 'Declined', 'photo_6217418791567078755_y.jpg', 13, 'Declined', 'sample feedback', '2023-05-02 15:34:15', 0),
(129, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 1, 1, 'Accepted', 'ss.png', 4, 'Accepted', '', '2023-05-03 13:28:47', 1),
(134, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 1, 0, 'Incomplete', '', 18, 'Pending', '', '2023-05-04 00:20:12', 1),
(135, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 1, 1, 'Accepted', 'ss.png', 18, 'Accepted', '', '2023-05-04 00:20:12', 1),
(136, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 3, 0, 'Incomplete', '', 19, 'Pending', '', '2023-05-04 03:47:58', 1),
(138, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '2', 'B', 1, 0, 'Incomplete', '', 4, 'Pending', '', '2023-05-04 03:47:58', 1),
(139, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '2', 'B', 1, 0, 'Incomplete', '', 4, 'Pending', '', '2023-05-04 03:47:58', 1),
(143, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '2', '1', 'B', 1, 0, 'Incomplete', '', 6, 'Pending', '', '2023-05-04 03:47:58', 1),
(147, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '2', 'C', 3, 0, 'Incomplete', '', 19, 'Pending', '', '2023-05-04 03:47:58', 1),
(148, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '3', 'B', 3, 0, 'Incomplete', '', 15, 'Pending', '', '2023-05-04 03:47:58', 1),
(152, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '2', '2', 'C', 1, 0, 'Incomplete', '', 10, 'Pending', '', '2023-05-04 03:47:58', 1),
(153, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 1, 1, 'Declined', 'ss.png', 7, 'Declined', 'sample 12234444', '2023-05-04 03:47:58', 1),
(154, 44, 'John Doe', 'johndoe@wmsu.edu.ph', 'BSCS', '1', '1', 'C', 1, 1.14, 'Pending', 'ss.png', 19, 'Pending', '', '2023-05-04 03:48:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deans_listers`
--

CREATE TABLE `deans_listers` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gpa` float NOT NULL,
  `department` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deans_listers`
--

INSERT INTO `deans_listers` (`id`, `app_id`, `fullname`, `gpa`, `department`, `yearlevel`) VALUES
(9, 55, 'Abdulasis Hamja', 1.35, 'BSCS', '3'),
(10, 56, 'Josh Yasil', 1.375, 'BSCS', '4'),
(11, 75, 'Hay Payb', 1.5, 'BSCS', '4'),
(13, 129, 'John Doe', 1, 'BSCS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dean_applicants`
--

CREATE TABLE `dean_applicants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `total_gpa` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dean_applicants`
--

INSERT INTO `dean_applicants` (`id`, `name`, `email`, `school_year`, `curriculum`, `year_level`, `section`, `total_gpa`, `status`, `user_id`) VALUES
(26, 'Josh Yasil', 'joshuayasil@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '1', 'A', 1.11111, 'Declined', 23),
(27, 'Ejay Pogi', 'ejaypogi@wmsu.edu.ph', 'School Year 2023-2024', 'cs', '4', 'A', 1.25, 'pending', 16),
(29, 'Ejay McSing', 'xt202001281@wmsu.edu.ph', 'School Year 2023-2024', 'cs', '4', 'A', 1.5, 'pending', 2),
(30, 'Ejay McSing', 'emiljohn1129@gmail.com', 'School Year 2022-2023', 'cs', '4', 'A', 1.5, 'Accepted', 1),
(31, 'Ejay McSing', 'ejaymcsing@gmail.com', 'School Year 2022-2023', 'cs', '4', 'A', 1.5, 'pending', 3),
(32, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '3', 'C', 1, 'Declined', 15),
(33, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '3', 'A', 1, 'Declined', 15),
(34, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '1', 'A', 1, 'Declined', 15),
(35, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2023-2024', 'cs', '2', 'A', 1, 'Declined', 15),
(36, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '3', 'A', 1, 'Declined', 15),
(37, 'Emil John', 'emiljohn@wmsu.edu.ph', 'School Year 2023-2024', 'it', '3', 'A', 0, 'Declined', 15),
(38, 'Mark Vladimir', 'markvladimir@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '1', 'A', 1.5, 'Accepted', 38),
(39, 'Mark Vladimir', 'markvladimir@wmsu.edu.ph', 'School Year 2022-2023', 'cs', '4', 'A', 1.5, 'Accepted', 38),
(40, 'Mark Vladimir', 'markvladimir@wmsu.edu.ph', 'School Year 2023-2024', 'cs', '4', 'C', 1.5, 'Accepted', 38),
(41, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'School Year 2022-2023', 'it', '1', 'A', 0, 'Declined', 24),
(42, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'School Year 2022-2023', 'it', '1', 'A', 0, 'Declined', 24),
(43, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'School Year 2022-2023', 'it', '1', 'A', 0, 'Declined', 24),
(44, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'School Year 2022-2023', 'it', '2', 'A', 0, 'Declined', 24),
(45, 'Daph Nagata', 'daphnagata@wmsu.edu.ph', 'School Year 2022-2023', 'it', '4', 'C', 0, 'Declined', 24);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `img` varchar(75) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rank` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `img`, `firstname`, `lastname`, `rank`, `email`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(3, '', 'Dr. Roderick', 'P. Go', 'College Dean', 'roderickgo@wmsu.edu.ph', 'Adviser', '2023-01-25 14:03:58', '2023-04-27 10:30:35', 0),
(4, 'odon.png', 'Engr. Odon A. ', 'Maravillas, Jr., MSCS', 'Associate Dean', 'odonmaravillas@wmsu.edu.ph', 'Adviser', '2023-01-25 14:05:17', '2023-04-13 14:40:55', 0),
(6, 'belamide.png', 'Engr. Gadmar M.', 'Belamide, MEnggEd-ICT', 'College Secretary', 'gadmarbelamide@wmsu.edu.ph', 'Admin', '2023-01-25 14:06:48', '2023-04-13 14:50:20', 0),
(7, 'sadiwa.png', 'Ms. Lucy  ', 'Felix-Sadiwa, MSCS', 'CS Department Head', 'lucyfelix@wmsu.edu.ph', 'Adviser', '2023-01-25 14:10:13', '2023-04-13 14:50:46', 0),
(8, 'escorialj.png', 'Mr. John Augustus', 'A. Escorial, MIT', 'IT Department Head', 'johnaugustus@wmsu.edu.ph', 'Adviser', '2023-01-25 14:11:18', '2023-04-13 14:51:04', 0),
(9, 'escoriala.png', 'Mrs. Aida  ', 'A. Escorial, MIT', 'Graduate Program Chair', 'aidaescorial@wmsu.edu.ph', 'Adviser', '2023-01-25 14:12:48', '2023-04-13 14:50:05', 0),
(10, 'aripE.png', 'Engr. Edwip I.  ', 'Arip, MEnggEd-ICT', 'External Studies Unit Technical Associate', 'edwinarip@wmsu.edu.ph', 'None', '2023-01-25 14:13:50', '2023-04-13 14:49:47', 0),
(11, 'aripJ.png', 'Mr. John Paul ', ' I. Arip LMS', 'Quality Assurance', 'johpaularip@wmsu.edu.ph', 'None', '2023-01-25 14:14:25', '2023-04-13 14:49:26', 0),
(12, 'female.png', 'Mrs. Justin Anne ', ' Albay-Arip', 'Visiting Lecturer', 'justinannearip@wmsu.edu.ph', 'None', '2023-01-25 14:15:02', '2023-04-13 14:48:49', 0),
(13, 'ballaho.png', 'Mr. Jaydee  ', 'C. Ballaho', 'LMS Lead Developer', 'jaydeeballaho@wmsu.edu.ph', 'Adviser', '2023-01-25 14:15:37', '2023-04-13 14:47:49', 0),
(14, 'catadman.png', 'Mr. Jason', 'A. Catadman ', 'LMS Assistant Developer', 'jasoncatadman@wmsu.edu.ph', 'Adviser', '2023-01-25 14:16:11', '2023-04-13 14:51:27', 0),
(15, 'flores.png', 'Engr. Mark L. ', 'Flores, MEnggEd-ICT ', 'Director, Data Protection and Security', 'markflores@wmsu.edu.ph', 'None', '2023-01-25 14:17:53', '2023-04-13 14:52:44', 0),
(16, 'gregana.png', 'Ms. Pauleen Jean ', 'E. Gregana ', 'Inactive', 'pauleenjeangregana@wmsu.edu.ph', 'None', '2023-01-25 14:18:37', '2023-04-13 14:54:04', 0),
(17, 'female.png', 'Ms. Aradzna ', ' M. Kamman', 'Visiting Lecturer', 'aradznakamman@wmsu.edu.ph', 'None', '2023-01-25 14:19:25', '2023-04-13 14:54:25', 0),
(18, 'female.png', 'Ms. Mara ', 'Marie Liao', 'Visiting Lecturer', 'maramarieliao@wmsu.edu.ph', 'Adviser', '2023-01-25 14:20:14', '2023-04-13 14:54:46', 0),
(19, 'lines.png', 'Engr. Marvic ', 'A. Lines, MEnggEd-ICT', 'LMS Training and Management', 'marviclines@wmsu.edu.ph', 'Adviser', '2023-01-25 14:21:12', '2023-04-13 14:55:19', 0),
(20, 'female.png', 'Ms. Ceed Janelle  ', 'B. Lorenzo', 'Visiting Lecturer', 'ceedjanellelorenzo@wmsu.edu.ph', 'None', '2023-01-25 14:22:11', '2023-04-13 14:55:51', 0),
(21, 'lorenzo.png', 'Engr. Ceed Jezreel  ', 'B. Lorenzo, MIT', 'Research Coordinator', 'ceedjezreellorenzo@wmsu.edu.ph', 'None', '2023-01-25 14:23:18', '2023-04-13 14:56:19', 0),
(22, 'rojas.png', 'Engr. Marjorie  ', 'A. Rojas', 'Student Affairs and Guidance Coordinator', 'marjorierojas@wmsu.edu.ph', 'Adviser', '2023-01-25 14:24:09', '2023-04-13 14:56:42', 0),
(23, 'male.png', 'Mr. Theo Jay ', 'M&#039;lleno Sanson', 'Visiting Lecturer', 'theojaysanson@wmsu.edu.ph', 'None', '2023-01-25 14:24:52', '2023-04-13 14:52:05', 0),
(24, 'tahil.png', 'Mr. Salimar B.  ', 'Tahil, MEnggEd-ICT', 'Asst. Director, MISTO', 'salimartahil@wmsu.edu.ph', 'Adviser', '2023-01-25 14:25:31', '2023-04-13 14:57:09', 0),
(25, 'timpangco.png', 'Mr. Whesley', 'G. Timpangco ', 'LMS Network Engineer', 'whesleytimpangco@wmsu.edu.ph', 'None', '2023-01-25 14:26:12', '2023-04-13 14:57:25', 0),
(26, 'jackaria.png', 'Ms. Alhadzra  ', 'M. Jackaria', 'Laboratory Technician', 'alhadzrajackaria@wmsu.edu.ph', 'None', '2023-01-25 14:26:58', '2023-04-13 14:58:12', 0),
(27, 'male.png', 'Mr. John Roy  ', 'S. Velario', 'Administrative Assistant', 'johnroyvelario@wmsu.edu.ph', 'None', '2023-01-25 14:27:34', '2023-04-13 14:57:43', 0),
(43, 'male.png', 'LeBron', 'James', 'Goat', 'lebronjames@wmsu.edu.ph', 'None', '2023-04-13 14:59:22', '2023-04-13 14:59:33', 0),
(44, 'male.png', 'Mark', 'Vladimir', 'Tampa LeadDev', 'markvladimir@wmsu.edu.ph', 'None', '2023-04-13 14:59:58', '2023-04-13 14:59:58', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grades_list`
-- (See below for the actual view)
--
CREATE TABLE `grades_list` (
`applicant_id` int(11)
,`subject_name` varchar(255)
,`grade` float
);

-- --------------------------------------------------------

--
-- Table structure for table `listers`
--

CREATE TABLE `listers` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `GPA` float NOT NULL,
  `department` varchar(30) NOT NULL,
  `year_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listers`
--

INSERT INTO `listers` (`id`, `firstname`, `lastname`, `GPA`, `department`, `year_level`) VALUES
(1, 'Mark', 'Vladimir', 1, 'BSCS', 3),
(2, 'Pogi', 'Hamja', 1, 'BSCS', 3),
(3, 'hAMJA', 'vLADIMIR', 2, 'BSCS', 4),
(4, 'Nash', 'Sari', 1.5, 'BSCS', 3),
(5, 'Andrei', 'Cafino', 1.75, 'BSIT', 3),
(6, 'Denise', 'Vonn', 1.75, 'BSCS', 3),
(7, 'Jsohua', 'Yasil', 1, 'BSCS', 3),
(8, 'Jenny', 'Vladimir', 1.5, 'BSCS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `years` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `code`, `description`, `years`, `level`, `created_at`, `updated_at`) VALUES
(1, 'BSCS', 'Bachelor of Science in Computer Science', 3, 'Bachelor', '2022-11-03 07:10:55', '2023-04-26 20:34:34'),
(2, 'BSIT', 'Bachelor of Science in Information Technology', 4, 'Bachelor', '2022-11-03 07:24:14', '2023-04-10 12:49:33'),
(21, 'BSS', 'SAMPLE DESC', 2, 'Diploma', '2023-05-03 04:54:31', '2023-05-03 04:54:31'),
(22, 'BSVS', 'BACHELOR OF SCIENCE IN VULCANIZING SHOP', 2, 'Bachelor', '2023-05-03 05:25:40', '2023-05-03 05:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `sy_application_time`
--

CREATE TABLE `sy_application_time` (
  `id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `1st_sem` tinyint(1) NOT NULL DEFAULT 0,
  `2nd_sem` tinyint(1) NOT NULL DEFAULT 0,
  `1st_sem_start` date DEFAULT NULL,
  `1st_sem_end` date DEFAULT NULL,
  `2nd_sem_start` date DEFAULT NULL,
  `2nd_sem_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sy_application_time`
--

INSERT INTO `sy_application_time` (`id`, `sy_id`, `1st_sem`, `2nd_sem`, `1st_sem_start`, `1st_sem_end`, `2nd_sem_start`, `2nd_sem_end`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 3, 1, 1, NULL, NULL, NULL, NULL),
(7, 15, 1, 1, NULL, NULL, NULL, NULL),
(8, 16, 1, 1, NULL, NULL, NULL, NULL),
(9, 17, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sy_subjects`
--

CREATE TABLE `sy_subjects` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `lec_units` int(11) NOT NULL,
  `lab_units` int(11) NOT NULL,
  `pre_req` varchar(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sy_subjects`
--

INSERT INTO `sy_subjects` (`id`, `subject_code`, `subject_name`, `lec_units`, `lab_units`, `pre_req`, `sem`, `course_id`, `year_level`, `sy_id`) VALUES
(23, 'CC108', 'Computer Programming IV', 3, 1, 'CC102', 2, 2, 1, 16),
(24, 'CC100', 'Introduction to Computing', 3, 1, 'None', 1, 2, 1, 16),
(25, 'CC102', 'Computer Programming III', 3, 1, 'None', 1, 2, 1, 16),
(27, 'CS 143', 'Thesis 2', 3, 0, 'CS 130', 1, 1, 4, 1),
(28, 'HIST 100', 'Life and Works of Rizal', 3, 0, 'None', 1, 1, 4, 1),
(29, 'CS 142', 'Social Issues and Professional Practice', 3, 0, 'CS 132', 2, 1, 4, 1),
(30, 'HIST 101', 'Readings in Philippine History', 3, 0, 'None', 2, 1, 4, 1),
(31, 'A&H', 'Art Appreciation', 3, 0, 'None', 2, 1, 4, 1),
(32, 'CS 131', 'Automata Theory and Formal Languanges', 3, 0, 'CS 122', 1, 1, 3, 1),
(33, 'CS 133', 'Information Assurance and Security', 2, 0, 'CC 104', 1, 1, 3, 1),
(34, 'CS 135', 'Advanced Database Systems', 3, 3, 'CC 104', 1, 1, 3, 1),
(35, 'CS 137', 'Software Engineering 1', 2, 3, 'CC 104', 1, 1, 3, 1),
(36, 'CS 139', 'Web Programming and Development', 3, 3, ' CC 104', 1, 1, 3, 1),
(37, 'CS 140', 'CS Elective 2', 2, 3, 'CC 104', 1, 1, 3, 1),
(38, 'CC 105', 'Application Development and Emerging Technologies', 2, 3, 'CC 104', 1, 1, 3, 1),
(39, 'CS 130', 'CS Thesis 1 ', 3, 0, '3rd Standing', 2, 1, 3, 1),
(40, 'CS 132', 'Software Engineering 2 ', 2, 3, 'CS 137', 2, 1, 3, 1),
(41, 'CS 134', 'Operating Systems', 3, 3, 'CS 120', 2, 1, 3, 1),
(42, 'CS 136', 'Modeling and Simulation', 2, 3, 'CS 131', 2, 1, 3, 1),
(43, 'CS 138', 'CS Electives 3', 3, 0, 'None', 2, 1, 3, 1),
(44, 'CS 121', 'Object-Oriented Programming', 3, 3, 'CC 102', 1, 1, 2, 1),
(45, 'CS 123', 'Discrete Structures 2', 3, 0, 'CS 111', 1, 1, 2, 1),
(46, 'CS 125', 'Digital Design', 3, 3, 'CS 111', 1, 1, 2, 1),
(47, 'CS 127', 'Human Computer Interaction', 0, 3, 'CC 102', 1, 1, 2, 1),
(48, 'CC 103', 'Data Structures and Algorithms', 3, 3, 'CC 102', 1, 1, 2, 1),
(49, 'MATH 104', 'Calculus 2', 3, 0, 'MATH 103', 1, 1, 2, 1),
(50, 'LIT 101', 'Philippine Literature', 3, 0, 'None', 1, 1, 2, 1),
(51, 'PE 103', 'Physical Education 3', 3, 0, 'None', 1, 1, 2, 1),
(52, 'CS 120', 'Architecture and Organization', 3, 3, 'CS 111', 2, 1, 2, 1),
(53, 'CS 122', 'Design and Analysis of Algorithms', 3, 0, 'CC 103', 2, 1, 2, 1),
(54, 'CS 124', 'Programming Languages', 2, 3, 'CC 103', 2, 1, 2, 1),
(55, 'CS 126', 'Networks and Communications', 2, 3, 'CC 102', 2, 1, 2, 1),
(56, 'CS 128', 'CS Elective 1', 2, 3, '2nd Year Standing', 2, 1, 2, 1),
(57, 'CC 104', 'Information Management', 3, 3, 'CS 121', 2, 1, 2, 1),
(58, 'PE 104', 'Physical Education 4', 2, 0, 'None', 2, 1, 2, 1),
(68, 'CC 102', 'Computer Programming 2', 3, 3, 'CC 101', 2, 1, 1, 1),
(69, 'CS 111', 'Discrete Structures 1', 3, 0, 'MATH 100', 2, 1, 1, 1),
(70, 'MATH 103', 'Calculus 1 ', 3, 0, 'MATH 100', 2, 1, 1, 1),
(71, 'CW 101', 'The Contemporary World', 3, 0, 'None', 2, 1, 1, 1),
(72, 'STS 100', 'Science, Technology and Society', 3, 0, 'None', 2, 1, 1, 1),
(73, 'FIL 102', 'Retorika', 3, 0, 'FIL 102', 2, 1, 1, 1),
(74, 'PE 102', 'Physical Education 2', 2, 0, 'None', 2, 1, 1, 1),
(75, 'NSTP 2', 'National Service Training Program 2', 3, 0, 'None', 2, 1, 1, 1),
(76, 'EUTH B', 'Euthenics B', 2, 0, 'None', 2, 1, 1, 1),
(77, 'IT 141', 'Capstone Project and Research 2', 3, 0, 'IT 140', 1, 2, 4, 15),
(78, 'IT 143', 'Information Assurance and Security 2', 2, 3, 'IT 130', 1, 2, 4, 15),
(79, 'IT 145', 'IT Elective 4', 2, 3, '4th Year Standing', 1, 2, 4, 15),
(82, 'IT 130', 'Information Assurance and Security 1', 2, 3, 'IT 135', 2, 2, 3, 15),
(83, 'IT 132', 'Software Engineering', 3, 3, 'CC 105', 2, 2, 3, 15),
(84, 'IT 134', 'Social and Professional Practice', 3, 0, '3rd Year Standing', 2, 2, 3, 15),
(85, 'IT 136', 'IT Elective 2', 2, 3, '3rd Year Standing', 2, 2, 3, 15),
(86, 'IT 138', 'IT Elective 3', 2, 3, '3rd Year Standing', 2, 2, 3, 15),
(87, 'IT 131', 'Advanced Database Systems', 3, 3, 'CC 104', 1, 2, 3, 15),
(88, 'IT 133', 'Networking 2', 2, 3, 'IT 124', 1, 2, 3, 15),
(89, 'IT 135', 'Systems Intergration and Architecture', 2, 3, 'IT 122', 1, 2, 3, 15),
(90, 'IT 137', 'Web Systems and Technologies', 3, 3, 'CC 104', 1, 2, 3, 15),
(91, 'IT 139', 'IT Elective 1', 2, 3, '3rd Year Standing', 1, 2, 3, 15),
(92, 'CC 105', 'Application Development and Emerging Technologies', 2, 3, 'CC 104', 1, 2, 3, 15),
(111, 'IT 142', 'Systems Administration and Maintenance', 2, 3, 'IT 143', 2, 2, 4, 15),
(112, 'IT 144', 'Practicum / Industry Immersion', 0, 9, 'Graduating', 2, 2, 4, 15),
(113, 'IT 123', 'Bulkanizing', 3, 3, 'None', 2, 2, 4, 15),
(123, 'SM 101', 'SAMPLE 101', 3, 0, 'NONE', 1, 3, 1, 17),
(124, 'SM 102', 'SAMPLE 102', 3, 0, 'NONE', 1, 3, 1, 17),
(153, 'CC 100', 'Introduction to Computing', 2, 3, 'None', 1, 1, 1, 1),
(154, 'CC 101', 'Computer Programming 1 ', 3, 3, 'None', 1, 1, 1, 1),
(155, 'CAS 101', 'Purposive Communication', 3, 0, 'None', 1, 1, 1, 1),
(156, 'MATH 100', 'Mathematics in the Modern World', 3, 0, 'None', 1, 1, 1, 1),
(157, 'US 101', 'Understanding the Self', 3, 0, 'None', 1, 1, 1, 1),
(158, 'FIL 101', 'Komunikasyon sa Akademikong Filipino', 3, 0, 'None', 1, 1, 1, 1),
(159, 'PE 101', 'Physical Education 1', 2, 0, 'None', 1, 1, 1, 1),
(160, 'NSTP', 'National Service Training Program 1', 3, 0, 'None', 1, 1, 1, 1),
(161, 'EUTH A', 'Euthenics A', 2, 0, 'None', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_grades`
--

CREATE TABLE `tbl_list_grades` (
  `grades_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_list_grades`
--

INSERT INTO `tbl_list_grades` (`grades_id`, `subject_id`, `applicant_id`, `grade`) VALUES
(95, 50, 49, 2),
(96, 51, 49, 2),
(97, 52, 50, 2),
(98, 53, 50, 2),
(99, 54, 50, 2),
(100, 50, 51, 3),
(101, 51, 51, 500),
(102, 50, 49, 2),
(103, 51, 49, 2),
(104, 50, 53, 3),
(105, 51, 53, 3),
(106, 50, 53, 3),
(107, 51, 53, 2),
(108, 50, 55, 2),
(109, 51, 55, 2),
(110, 50, 56, 2),
(111, 51, 56, 2),
(112, 50, 57, 2),
(113, 51, 57, 2),
(114, 50, 58, 3),
(115, 51, 58, 2),
(116, 50, 59, 2),
(117, 51, 59, 5),
(118, 50, 60, 2),
(119, 51, 60, 1),
(120, 50, 60, 2),
(121, 51, 60, 1),
(122, 50, 60, 2),
(123, 51, 60, 1),
(124, 50, 60, 2),
(125, 51, 60, 1),
(126, 50, 60, 2),
(127, 51, 60, 1),
(128, 50, 60, 2),
(129, 51, 60, 1),
(130, 6, 66, 3),
(131, 7, 66, 3),
(132, 8, 66, 2),
(133, 9, 66, 1),
(134, 10, 66, 2),
(135, 11, 66, 2),
(136, 12, 66, 1),
(137, 13, 66, 2),
(138, 14, 66, 2),
(139, 6, 67, 2),
(140, 7, 67, 2),
(141, 8, 67, 2),
(142, 9, 67, 2),
(143, 10, 67, 2),
(144, 11, 67, 2),
(145, 12, 67, 2),
(146, 13, 67, 2),
(147, 14, 67, 2),
(148, 6, 67, 1),
(149, 7, 67, 1),
(150, 8, 67, 1),
(151, 9, 67, 1),
(152, 10, 67, 1),
(153, 11, 67, 1),
(154, 12, 67, 1),
(155, 13, 67, 1),
(156, 14, 67, 1),
(157, 6, 67, 1),
(158, 7, 67, 1),
(159, 8, 67, 1),
(160, 9, 67, 1),
(161, 10, 67, 1),
(162, 11, 67, 1),
(163, 12, 67, 1),
(164, 13, 67, 1),
(165, 14, 67, 1),
(166, 6, 67, 1),
(167, 7, 67, 1),
(168, 8, 67, 1),
(169, 9, 67, 1),
(170, 10, 67, 1),
(171, 11, 67, 1),
(172, 12, 67, 1),
(173, 13, 67, 1),
(174, 14, 67, 1),
(175, 6, 67, 1),
(176, 7, 67, 1),
(177, 8, 67, 1),
(178, 9, 67, 1),
(179, 10, 67, 1),
(180, 11, 67, 1),
(181, 12, 67, 1),
(182, 13, 67, 1),
(183, 14, 67, 1),
(184, 6, 67, 1),
(185, 7, 67, 1),
(186, 8, 67, 1),
(187, 9, 67, 1),
(188, 10, 67, 1),
(189, 11, 67, 1),
(190, 12, 67, 1),
(191, 13, 67, 1),
(192, 14, 67, 1),
(193, 6, 67, 1),
(194, 7, 67, 1),
(195, 8, 67, 1),
(196, 9, 67, 1),
(197, 10, 67, 1),
(198, 11, 67, 1),
(199, 12, 67, 1),
(200, 13, 67, 1),
(201, 14, 67, 1),
(202, 6, 67, 1),
(203, 7, 67, 1),
(204, 8, 67, 1),
(205, 9, 67, 1),
(206, 10, 67, 1),
(207, 11, 67, 1),
(208, 12, 67, 1),
(209, 13, 67, 1),
(210, 14, 67, 1),
(211, 6, 67, 1),
(212, 7, 67, 1),
(213, 8, 67, 1),
(214, 9, 67, 1),
(215, 10, 67, 1),
(216, 11, 67, 1),
(217, 12, 67, 1),
(218, 13, 67, 1),
(219, 14, 67, 1),
(220, 6, 67, 1),
(221, 7, 67, 1),
(222, 8, 67, 1),
(223, 9, 67, 1),
(224, 10, 67, 1),
(225, 11, 67, 1),
(226, 12, 67, 1),
(227, 13, 67, 1),
(228, 14, 67, 1),
(229, 6, 67, 1),
(230, 7, 67, 1),
(231, 8, 67, 1),
(232, 9, 67, 1),
(233, 10, 67, 1),
(234, 11, 67, 1),
(235, 12, 67, 1),
(236, 13, 67, 1),
(237, 14, 67, 1),
(238, 6, 67, 1),
(239, 7, 67, 1),
(240, 8, 67, 1),
(241, 9, 67, 1),
(242, 10, 67, 1),
(243, 11, 67, 1),
(244, 12, 67, 1),
(245, 13, 67, 1),
(246, 14, 67, 1),
(247, 6, 67, 1),
(248, 7, 67, 1),
(249, 8, 67, 1),
(250, 9, 67, 1),
(251, 10, 67, 1),
(252, 11, 67, 1),
(253, 12, 67, 1),
(254, 13, 67, 1),
(255, 14, 67, 1),
(256, 6, 67, 1),
(257, 7, 67, 1),
(258, 8, 67, 1),
(259, 9, 67, 1),
(260, 10, 67, 1),
(261, 11, 67, 1),
(262, 12, 67, 1),
(263, 13, 67, 1),
(264, 14, 67, 1),
(265, 6, 67, 1),
(266, 7, 67, 1),
(267, 8, 67, 1),
(268, 9, 67, 1),
(269, 10, 67, 1),
(270, 11, 67, 1),
(271, 12, 67, 1),
(272, 13, 67, 1),
(273, 14, 67, 1),
(274, 6, 67, 1),
(275, 7, 67, 1),
(276, 8, 67, 1),
(277, 9, 67, 1),
(278, 10, 67, 1),
(279, 11, 67, 1),
(280, 12, 67, 1),
(281, 13, 67, 1),
(282, 14, 67, 1),
(283, 6, 67, 1),
(284, 7, 67, 1),
(285, 8, 67, 1),
(286, 9, 67, 1),
(287, 10, 67, 1),
(288, 11, 67, 1),
(289, 12, 67, 1),
(290, 13, 67, 1),
(291, 14, 67, 1),
(292, 6, 67, 1),
(293, 7, 67, 1),
(294, 8, 67, 1),
(295, 9, 67, 1),
(296, 10, 67, 1),
(297, 11, 67, 1),
(298, 12, 67, 1),
(299, 13, 67, 1),
(300, 14, 67, 1),
(301, 6, 67, 1),
(302, 7, 67, 1),
(303, 8, 67, 1),
(304, 9, 67, 1),
(305, 10, 67, 1),
(306, 11, 67, 1),
(307, 12, 67, 1),
(308, 13, 67, 1),
(309, 14, 67, 1),
(310, 6, 67, 1),
(311, 7, 67, 1),
(312, 8, 67, 1),
(313, 9, 67, 1),
(314, 10, 67, 1),
(315, 11, 67, 1),
(316, 12, 67, 1),
(317, 13, 67, 1),
(318, 14, 67, 1),
(319, 6, 67, 1),
(320, 7, 67, 1),
(321, 8, 67, 1),
(322, 9, 67, 1),
(323, 10, 67, 1),
(324, 11, 67, 1),
(325, 12, 67, 1),
(326, 13, 67, 1),
(327, 14, 67, 1),
(328, 6, 67, 1),
(329, 7, 67, 1),
(330, 8, 67, 1),
(331, 9, 67, 1),
(332, 10, 67, 1),
(333, 11, 67, 1),
(334, 12, 67, 1),
(335, 13, 67, 1),
(336, 14, 67, 1),
(337, 6, 67, 1),
(338, 7, 67, 1),
(339, 8, 67, 1),
(340, 9, 67, 1),
(341, 10, 67, 1),
(342, 11, 67, 1),
(343, 12, 67, 1),
(344, 13, 67, 1),
(345, 14, 67, 1),
(346, 6, 67, 1),
(347, 7, 67, 1),
(348, 8, 67, 1),
(349, 9, 67, 1),
(350, 10, 67, 1),
(351, 11, 67, 1),
(352, 12, 67, 1),
(353, 13, 67, 1),
(354, 14, 67, 1),
(355, 6, 67, 1),
(356, 7, 67, 1),
(357, 8, 67, 1),
(358, 9, 67, 1),
(359, 10, 67, 1),
(360, 11, 67, 1),
(361, 12, 67, 1),
(362, 13, 67, 1),
(363, 14, 67, 1),
(364, 6, 67, 1),
(365, 7, 67, 1),
(366, 8, 67, 1),
(367, 9, 67, 1),
(368, 10, 67, 1),
(369, 11, 67, 1),
(370, 12, 67, 1),
(371, 13, 67, 1),
(372, 14, 67, 1),
(373, 6, 67, 1),
(374, 7, 67, 1),
(375, 8, 67, 1),
(376, 9, 67, 1),
(377, 10, 67, 1),
(378, 11, 67, 1),
(379, 12, 67, 1),
(380, 13, 67, 1),
(381, 14, 67, 1),
(382, 6, 67, 1),
(383, 7, 67, 1),
(384, 8, 67, 1),
(385, 9, 67, 1),
(386, 10, 67, 1),
(387, 11, 67, 1),
(388, 12, 67, 1),
(389, 13, 67, 1),
(390, 14, 67, 1),
(391, 6, 67, 1),
(392, 7, 67, 1),
(393, 8, 67, 1),
(394, 9, 67, 1),
(395, 10, 67, 1),
(396, 11, 67, 1),
(397, 12, 67, 1),
(398, 13, 67, 1),
(399, 14, 67, 1),
(400, 6, 67, 1),
(401, 7, 67, 1),
(402, 8, 67, 1),
(403, 9, 67, 1),
(404, 10, 67, 1),
(405, 11, 67, 1),
(406, 12, 67, 1),
(407, 13, 67, 1),
(408, 14, 67, 1),
(409, 6, 67, 1),
(410, 7, 67, 1),
(411, 8, 67, 1),
(412, 9, 67, 1),
(413, 10, 67, 1),
(414, 11, 67, 1),
(415, 12, 67, 1),
(416, 13, 67, 1),
(417, 14, 67, 1),
(418, 6, 67, 1),
(419, 7, 67, 1),
(420, 8, 67, 1),
(421, 9, 67, 1),
(422, 10, 67, 1),
(423, 11, 67, 1),
(424, 12, 67, 1),
(425, 13, 67, 1),
(426, 14, 67, 1),
(427, 6, 67, 1),
(428, 7, 67, 1),
(429, 8, 67, 1),
(430, 9, 67, 1),
(431, 10, 67, 1),
(432, 11, 67, 1),
(433, 12, 67, 1),
(434, 13, 67, 1),
(435, 14, 67, 1),
(436, 6, 67, 1),
(437, 7, 67, 1),
(438, 8, 67, 1),
(439, 9, 67, 1),
(440, 10, 67, 1),
(441, 11, 67, 1),
(442, 12, 67, 1),
(443, 13, 67, 1),
(444, 14, 67, 1),
(445, 6, 67, 1),
(446, 7, 67, 1),
(447, 8, 67, 1),
(448, 9, 67, 1),
(449, 10, 67, 1),
(450, 11, 67, 1),
(451, 12, 67, 1),
(452, 13, 67, 1),
(453, 14, 67, 1),
(454, 6, 67, 1),
(455, 7, 67, 1),
(456, 8, 67, 1),
(457, 9, 67, 1),
(458, 10, 67, 1),
(459, 11, 67, 1),
(460, 12, 67, 1),
(461, 13, 67, 1),
(462, 14, 67, 1),
(463, 6, 67, 1),
(464, 7, 67, 1),
(465, 8, 67, 1),
(466, 9, 67, 1),
(467, 10, 67, 1),
(468, 11, 67, 1),
(469, 12, 67, 1),
(470, 13, 67, 1),
(471, 14, 67, 1),
(472, 6, 67, 1),
(473, 7, 67, 1),
(474, 8, 67, 1),
(475, 9, 67, 1),
(476, 10, 67, 1),
(477, 11, 67, 1),
(478, 12, 67, 1),
(479, 13, 67, 1),
(480, 14, 67, 1),
(481, 6, 67, 1),
(482, 7, 67, 1),
(483, 8, 67, 1),
(484, 9, 67, 1),
(485, 10, 67, 1),
(486, 11, 67, 1),
(487, 12, 67, 3),
(488, 13, 67, 1),
(489, 14, 67, 1),
(490, 6, 67, 1),
(491, 7, 67, 1),
(492, 8, 67, 1),
(493, 9, 67, 1),
(494, 10, 67, 1),
(495, 11, 67, 1),
(496, 12, 67, 3),
(497, 13, 67, 1),
(498, 14, 67, 1),
(499, 6, 67, 1),
(500, 7, 67, 1),
(501, 8, 67, 1),
(502, 9, 67, 1),
(503, 10, 67, 1),
(504, 11, 67, 1),
(505, 12, 67, 3),
(506, 13, 67, 1),
(507, 14, 67, 1),
(508, 6, 67, 1),
(509, 7, 67, 1),
(510, 8, 67, 1),
(511, 9, 67, 1),
(512, 10, 67, 1),
(513, 11, 67, 1),
(514, 12, 67, 3),
(515, 13, 67, 1),
(516, 14, 67, 1),
(517, 6, 123, 1),
(518, 7, 123, 1),
(519, 8, 123, 1),
(520, 9, 123, 1),
(521, 10, 123, 1),
(522, 11, 123, 1),
(523, 12, 123, 1),
(524, 13, 123, 1),
(525, 14, 123, 1),
(526, 6, 124, 1),
(527, 7, 124, 1),
(528, 8, 124, 1),
(529, 9, 124, 2),
(530, 10, 124, 2),
(531, 11, 124, 2),
(532, 12, 124, 2),
(533, 13, 124, 1),
(534, 14, 124, 2),
(535, 6, 124, 1),
(536, 7, 124, 1),
(537, 8, 124, 1),
(538, 9, 124, 2),
(539, 10, 124, 2),
(540, 11, 124, 2),
(541, 12, 124, 2),
(542, 13, 124, 1),
(543, 14, 124, 2),
(544, 6, 124, 1),
(545, 7, 124, 1),
(546, 8, 124, 1),
(547, 9, 124, 2),
(548, 10, 124, 2),
(549, 11, 124, 2),
(550, 12, 124, 2),
(551, 13, 124, 1),
(552, 14, 124, 2),
(553, 6, 124, 1),
(554, 7, 124, 1),
(555, 8, 124, 1),
(556, 9, 124, 2),
(557, 10, 124, 2),
(558, 11, 124, 2),
(559, 12, 124, 2),
(560, 13, 124, 1),
(561, 14, 124, 2),
(562, 15, 67, 1),
(563, 16, 67, 1),
(564, 17, 67, 1),
(565, 18, 67, 1),
(566, 19, 67, 1),
(567, 20, 67, 1),
(568, 21, 67, 1),
(569, 22, 67, 1),
(570, 23, 67, 1),
(571, 6, 67, 1),
(572, 7, 67, 1),
(573, 8, 67, 1),
(574, 9, 67, 1),
(575, 10, 67, 1),
(576, 11, 67, 1),
(577, 12, 67, 1),
(578, 13, 67, 1),
(579, 14, 67, 1),
(580, 6, 130, 1),
(581, 7, 130, 1),
(582, 8, 130, 1),
(583, 9, 130, 1),
(584, 10, 130, 1),
(585, 11, 130, 1),
(586, 12, 130, 1),
(587, 13, 130, 1),
(588, 14, 130, 1),
(589, 6, 131, 1),
(590, 7, 131, 1),
(591, 8, 131, 1),
(592, 9, 131, 1),
(593, 10, 131, 1),
(594, 11, 131, 1),
(595, 12, 131, 1),
(596, 13, 131, 1),
(597, 14, 131, 1),
(598, 6, 131, 1),
(599, 7, 131, 1),
(600, 8, 131, 1),
(601, 9, 131, 1),
(602, 10, 131, 1),
(603, 11, 131, 2),
(604, 12, 131, 1),
(605, 13, 131, 1),
(606, 14, 131, 2),
(607, 6, 67, 2),
(608, 7, 67, 2),
(609, 8, 67, 1),
(610, 9, 67, 2),
(611, 10, 67, 2),
(612, 11, 67, 2),
(613, 12, 67, 1),
(614, 13, 67, 1),
(615, 14, 67, 2),
(616, 6, 67, 1),
(617, 7, 67, 1),
(618, 8, 67, 1),
(619, 9, 67, 1),
(620, 10, 67, 1),
(621, 11, 67, 1),
(622, 12, 67, 1),
(623, 13, 67, 1),
(624, 14, 67, 1),
(625, 6, 135, 1),
(626, 7, 135, 1),
(627, 8, 135, 1),
(628, 9, 135, 1),
(629, 10, 135, 1),
(630, 11, 135, 1),
(631, 12, 135, 1),
(632, 13, 135, 1),
(633, 14, 135, 1),
(634, 6, 135, 1),
(635, 7, 135, 1),
(636, 8, 135, 2),
(637, 9, 135, 1),
(638, 10, 135, 1),
(639, 11, 135, 1),
(640, 12, 135, 2),
(641, 13, 135, 1),
(642, 14, 135, 2),
(643, 6, 123, 1),
(644, 7, 123, 1),
(645, 8, 123, 3),
(646, 9, 123, 2),
(647, 10, 123, 1),
(648, 11, 123, 1),
(649, 12, 123, 1),
(650, 13, 123, 2),
(651, 14, 123, 2),
(652, 6, 67, 2),
(653, 7, 67, 2),
(654, 8, 67, 2),
(655, 9, 67, 1),
(656, 10, 67, 2),
(657, 11, 67, 2),
(658, 12, 67, 1),
(659, 13, 67, 2),
(660, 14, 67, 2),
(661, 6, 67, 1),
(662, 7, 67, 1),
(663, 8, 67, 1),
(664, 9, 67, 1),
(665, 10, 67, 2),
(666, 11, 67, 2),
(667, 12, 67, 2),
(668, 13, 67, 1),
(669, 14, 67, 2),
(670, 50, 67, 2),
(671, 51, 67, 1),
(672, 6, 67, 2),
(673, 7, 67, 2),
(674, 8, 67, 1),
(675, 9, 67, 1),
(676, 10, 67, 1),
(677, 11, 67, 1),
(678, 12, 67, 1),
(679, 13, 67, 1),
(680, 14, 67, 1),
(681, 6, 67, 2),
(682, 7, 67, 1),
(683, 8, 67, 1),
(684, 9, 67, 1),
(685, 10, 67, 2),
(686, 11, 67, 1),
(687, 12, 67, 1),
(688, 13, 67, 1),
(689, 14, 67, 1),
(690, 6, 67, 2),
(691, 7, 67, 1),
(692, 8, 67, 1),
(693, 9, 67, 1),
(694, 10, 67, 2),
(695, 11, 67, 1),
(696, 12, 67, 1),
(697, 13, 67, 1),
(698, 14, 67, 1),
(699, 6, 67, 1),
(700, 7, 67, 1),
(701, 8, 67, 1),
(702, 9, 67, 2),
(703, 10, 67, 2),
(704, 11, 67, 2),
(705, 12, 67, 1),
(706, 13, 67, 2),
(707, 14, 67, 1),
(708, 15, 67, 2),
(709, 16, 67, 1),
(710, 17, 67, 1),
(711, 18, 67, 2),
(712, 19, 67, 2),
(713, 20, 67, 2),
(714, 21, 67, 1),
(715, 22, 67, 1),
(716, 23, 67, 1),
(717, 6, 67, 1),
(718, 7, 67, 1),
(719, 8, 67, 1),
(720, 9, 67, 1),
(721, 10, 67, 1),
(722, 11, 67, 1),
(723, 12, 67, 1),
(724, 13, 67, 1),
(725, 14, 67, 1),
(726, 6, 147, 2),
(727, 7, 147, 2),
(728, 8, 147, 2),
(729, 9, 147, 1),
(730, 10, 147, 1),
(731, 11, 147, 1),
(732, 12, 147, 1),
(733, 13, 147, 1),
(734, 14, 147, 1),
(735, 6, 67, 1),
(736, 7, 67, 1),
(737, 8, 67, 2),
(738, 9, 67, 2),
(739, 10, 67, 1),
(740, 11, 67, 1),
(741, 12, 67, 1),
(742, 13, 67, 1),
(743, 14, 67, 1),
(744, 6, 67, 2),
(745, 7, 67, 2),
(746, 8, 67, 1),
(747, 9, 67, 1),
(748, 10, 67, 1),
(749, 11, 67, 1),
(750, 12, 67, 1),
(751, 13, 67, 1),
(752, 14, 67, 1),
(753, 6, 67, 1),
(754, 7, 67, 1),
(755, 8, 67, 1),
(756, 9, 67, 1),
(757, 10, 67, 2),
(758, 11, 67, 3),
(759, 12, 67, 1),
(760, 13, 67, 1),
(761, 14, 67, 1),
(762, 95, 123, 1),
(763, 96, 123, 1),
(764, 97, 123, 2),
(765, 98, 123, 2),
(766, 99, 123, 2),
(767, 6, 147, 1),
(768, 7, 147, 1),
(769, 8, 147, 1),
(770, 9, 147, 1),
(771, 10, 147, 2),
(772, 11, 147, 1),
(773, 12, 147, 1),
(774, 13, 147, 1),
(775, 14, 147, 1),
(776, 6, 147, 1),
(777, 7, 147, 1),
(778, 8, 147, 1),
(779, 9, 147, 1),
(780, 10, 147, 2),
(781, 11, 147, 1),
(782, 12, 147, 2),
(783, 13, 147, 1),
(784, 14, 147, 1),
(785, 50, 67, 1),
(786, 51, 67, 2),
(787, 44, 135, 3),
(788, 45, 135, 3),
(789, 46, 135, 3),
(790, 47, 135, 3),
(791, 48, 135, 3),
(792, 49, 135, 3),
(793, 44, 124, 2),
(794, 45, 124, 1),
(795, 46, 124, 1),
(796, 47, 124, 2),
(797, 48, 124, 2),
(798, 49, 124, 1),
(799, 44, 130, 1),
(800, 45, 130, 1),
(801, 46, 130, 1),
(802, 47, 130, 1),
(803, 48, 130, 2),
(804, 49, 130, 1),
(805, 6, 131, 1),
(806, 7, 131, 1),
(807, 8, 131, 1),
(808, 9, 131, 1),
(809, 10, 131, 1),
(810, 11, 131, 1),
(811, 12, 131, 1),
(812, 13, 131, 1),
(813, 14, 131, 1),
(814, 6, 67, 1),
(815, 7, 67, 1),
(816, 8, 67, 2),
(817, 9, 67, 1),
(818, 10, 67, 1),
(819, 11, 67, 1),
(820, 12, 67, 1),
(821, 13, 67, 1),
(822, 14, 67, 1),
(823, 6, 135, 1),
(824, 7, 135, 1),
(825, 8, 135, 1),
(826, 9, 135, 1),
(827, 10, 135, 1),
(828, 11, 135, 1),
(829, 12, 135, 2),
(830, 13, 135, 1),
(831, 14, 135, 1),
(832, 6, 135, 1),
(833, 7, 135, 1),
(834, 8, 135, 1),
(835, 9, 135, 1),
(836, 10, 135, 1),
(837, 11, 135, 1),
(838, 12, 135, 2),
(839, 13, 135, 1),
(840, 14, 135, 1),
(841, 6, 130, 1),
(842, 7, 130, 1),
(843, 8, 130, 1),
(844, 9, 130, 1),
(845, 10, 130, 1),
(846, 11, 130, 1),
(847, 12, 130, 1),
(848, 13, 130, 1),
(849, 14, 130, 1),
(850, 6, 163, 1),
(851, 7, 163, 1),
(852, 8, 163, 1),
(853, 9, 163, 1),
(854, 10, 163, 1),
(855, 11, 163, 1),
(856, 12, 163, 1),
(857, 13, 163, 1),
(858, 14, 163, 1),
(859, 6, 163, 1),
(860, 7, 163, 1),
(861, 8, 163, 1),
(862, 9, 163, 1),
(863, 10, 163, 1),
(864, 11, 163, 1),
(865, 12, 163, 1),
(866, 13, 163, 1),
(867, 14, 163, 1),
(868, 6, 124, 1),
(869, 7, 124, 1),
(870, 8, 124, 1),
(871, 9, 124, 1),
(872, 10, 124, 1),
(873, 11, 124, 1),
(874, 12, 124, 1),
(875, 13, 124, 2),
(876, 14, 124, 2),
(877, 50, 166, 1),
(878, 51, 166, 2),
(879, 52, 163, 2),
(880, 53, 163, 2),
(881, 54, 163, 2),
(882, 50, 168, 2),
(883, 51, 168, 1),
(884, 50, 169, 2),
(885, 51, 169, 2),
(886, 50, 170, 2),
(887, 51, 170, 2),
(888, 24, 123, 1),
(889, 25, 123, 2),
(890, 26, 123, 1),
(891, 27, 123, 2),
(892, 28, 123, 2),
(893, 29, 123, 2),
(894, 30, 123, 1),
(895, 31, 123, 3),
(896, 1, 123, 1),
(897, 2, 123, 1),
(898, 39, 123, 1),
(899, 40, 123, 1),
(900, 41, 123, 1),
(901, 42, 123, 1),
(902, 43, 123, 1),
(903, 50, 135, 2),
(904, 51, 135, 1),
(905, 50, 135, 2),
(906, 51, 135, 1),
(907, 52, 135, 2),
(908, 53, 135, 2),
(909, 54, 135, 1),
(910, 52, 135, 2),
(911, 53, 135, 2),
(912, 54, 135, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `curriculum` varchar(50) NOT NULL,
  `year_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `sem`, `curriculum`, `year_level`) VALUES
(1, 'Software Engineering 1', 1, 'cs', 3),
(2, 'Automata Theory and Formal Languages', 1, 'cs', 3),
(6, 'Introduction to Computing', 1, 'cs', 1),
(7, 'Computer Programming 1', 1, 'cs', 1),
(8, 'Purposive Communication', 1, 'cs', 1),
(9, 'Mathematics in the Modern World', 1, 'cs', 1),
(10, 'Understanding the Self', 1, 'cs', 1),
(11, 'Komunikasyon sa Akedimikong Filipino', 1, 'cs', 1),
(12, 'Physical Education 1', 1, 'cs', 1),
(13, 'National Service Training Program 1', 1, 'cs', 1),
(14, 'Euthenics A', 1, 'cs', 1),
(15, 'Discrete Structures 1', 2, 'cs', 1),
(16, 'Computer Programming 2', 2, 'cs', 1),
(17, 'Calculus 1', 2, 'cs', 1),
(18, 'The Contemporary World', 2, 'cs', 1),
(19, 'Science, Technology and Society', 2, 'cs', 1),
(20, 'Retorika', 2, 'cs', 1),
(21, 'Physical Education 2', 2, 'cs', 1),
(22, 'National Service Training Program 2', 2, 'cs', 1),
(23, 'Euthenics B', 2, 'cs', 1),
(24, 'Object-Oriented Programming', 1, 'cs', 2),
(25, 'Discrete Structures 2', 1, 'cs', 2),
(26, 'Digital Design', 1, 'cs', 2),
(27, 'Human Computer Interaction', 1, 'cs', 2),
(28, 'Data Structures and Algorithms', 1, 'cs', 2),
(29, 'Calculus 2', 1, 'cs', 2),
(30, 'Philippine Literature', 1, 'cs', 2),
(31, 'Physical Education 3', 1, 'cs', 2),
(32, 'Architecture and Organization', 2, 'cs', 2),
(33, 'Design and Analysis of Algorithms', 2, 'cs', 2),
(34, 'Programming Languages', 2, 'cs', 2),
(35, 'Networks and Communications', 2, 'cs', 2),
(36, 'CS Elective 1', 2, 'cs', 2),
(37, 'Information Management', 2, 'cs', 2),
(38, 'Physical Education 4', 2, 'cs', 2),
(39, 'Advanced Database Systems', 1, 'cs', 3),
(40, 'Information Assurance and Security', 1, 'cs', 3),
(41, 'Web Programming and Development', 1, 'cs', 3),
(42, 'CS Elective 2', 1, 'cs', 3),
(43, 'Application Development and Emerging Technologies', 1, 'cs', 3),
(44, 'CS Thesis 1', 2, 'cs', 3),
(45, 'Software Engineering 2', 2, 'cs', 3),
(46, 'Operating Systems', 2, 'cs', 3),
(47, 'Modeling and Simulation', 2, 'cs', 3),
(48, 'CS Elective 3', 2, 'cs', 3),
(49, 'Ethics 101', 2, 'cs', 3),
(50, 'Thesis 2', 1, 'cs', 4),
(51, 'Life and Works of Rizal', 1, 'cs', 4),
(52, 'Social Issues and Professional Practice', 2, 'cs', 4),
(53, 'Reading in Philippine History', 2, 'cs', 4),
(54, 'Art Appreciation', 2, 'cs', 4),
(55, 'Introduction to Computing', 1, 'it', 1),
(56, 'Computer Programming 1', 1, 'it', 1),
(57, 'Purposive Communication', 1, 'it', 1),
(58, 'Mathematics in the Modern World', 1, 'it', 1),
(59, 'Understanding the Self', 1, 'it', 1),
(60, 'Komunikasyon sa Akademikong Filipino', 1, 'it', 1),
(61, 'Physical Education 1', 1, 'it', 1),
(62, 'National Service Training Program', 1, 'it', 1),
(63, 'Euthenics A', 1, 'it', 1),
(64, 'Discrete Mathematics', 2, 'it', 1),
(65, 'Operating Systems', 2, 'it', 1),
(66, 'Computer Programming 2', 2, 'it', 1),
(67, 'Life and Works of Rizal', 2, 'it', 1),
(68, 'Art Appreciation', 2, 'it', 1),
(69, 'Retorika', 2, 'it', 1),
(70, 'Physical Education 2', 2, 'it', 1),
(71, 'National Service Training Program 2', 2, 'it', 1),
(72, 'Euthenics B', 2, 'it', 1),
(73, 'Object-Oriented Programming', 1, 'it', 2),
(74, '', 1, 'it', 2),
(75, 'Platform Technologies', 1, 'it', 2),
(76, 'Human Computer Interaction', 1, 'it', 2),
(77, 'Data Structues and Algorithms', 1, 'it', 2),
(78, 'Readings in Philippine History', 1, 'it', 2),
(79, 'Science, Technology and Society', 1, 'it', 2),
(80, 'Philippine Literature', 1, 'it', 2),
(81, 'Physical Education 3', 1, 'it', 2),
(82, 'Integrative Programming and Technologies', 2, 'it', 2),
(83, 'Networking 1', 2, 'it', 2),
(84, 'Quantitative Methods', 2, 'it', 2),
(85, 'Information Management', 2, 'it', 2),
(86, 'The Contemporary World', 2, 'it', 2),
(87, 'Ethics', 2, 'it', 2),
(88, 'Physical Education 4', 2, 'it', 2),
(89, 'Advanced Database Systems', 1, 'it', 3),
(90, 'Networking 2', 1, 'it', 3),
(91, 'Systems Integration and Technologies', 1, 'it', 3),
(92, 'Web Systems and Technologies', 1, 'it', 3),
(93, 'IT Elective 1', 1, 'it', 3),
(94, 'Application Development and Emerging Technologies', 1, 'it', 3),
(95, 'Information Assurance and Security 1', 2, 'it', 3),
(96, 'Software Engineering', 2, 'it', 3),
(97, 'Social and Professional Practice', 2, 'it', 3),
(98, 'IT Elective 2', 2, 'it', 3),
(99, 'IT Elective 3', 2, 'it', 3),
(100, 'Capstone Project and Research 2', 1, 'it', 4),
(101, 'Information Assurance and Security 2', 1, 'it', 4),
(102, 'IT Elective 4', 1, 'it', 4),
(103, 'Systems Administration and Maintenance', 2, 'it', 4),
(104, 'Practicum/Industry Immersion', 2, 'it', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tlb_applicant`
--

CREATE TABLE `tlb_applicant` (
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tlb_applicant`
--

INSERT INTO `tlb_applicant` (`applicant_id`, `user_id`, `grade_file`) VALUES
(67, 24, NULL),
(68, 24, NULL),
(69, 24, NULL),
(70, 24, NULL),
(71, 24, NULL),
(72, 24, NULL),
(73, 24, NULL),
(74, 24, NULL),
(75, 24, NULL),
(76, 24, NULL),
(77, 24, NULL),
(78, 24, NULL),
(79, 24, NULL),
(80, 24, NULL),
(81, 24, NULL),
(82, 24, NULL),
(83, 24, NULL),
(84, 24, NULL),
(85, 24, NULL),
(86, 24, NULL),
(87, 24, NULL),
(88, 24, NULL),
(89, 24, NULL),
(90, 24, NULL),
(91, 24, NULL),
(92, 24, NULL),
(93, 24, NULL),
(94, 24, NULL),
(95, 24, NULL),
(96, 24, NULL),
(97, 24, NULL),
(98, 24, NULL),
(99, 24, NULL),
(100, 24, NULL),
(101, 24, NULL),
(102, 24, NULL),
(103, 24, NULL),
(104, 24, NULL),
(105, 24, NULL),
(106, 24, NULL),
(107, 24, NULL),
(108, 24, NULL),
(109, 24, NULL),
(110, 24, NULL),
(111, 24, NULL),
(112, 24, NULL),
(113, 24, NULL),
(114, 24, NULL),
(115, 24, NULL),
(116, 24, NULL),
(117, 24, NULL),
(118, 24, NULL),
(119, 24, NULL),
(120, 24, NULL),
(121, 24, NULL),
(122, 24, NULL),
(123, 15, NULL),
(124, 23, NULL),
(125, 23, NULL),
(126, 23, NULL),
(127, 23, NULL),
(128, 24, NULL),
(129, 24, NULL),
(130, 36, NULL),
(131, 37, NULL),
(132, 37, NULL),
(133, 24, NULL),
(134, 24, NULL),
(135, 38, NULL),
(136, 38, NULL),
(137, 15, NULL),
(138, 24, NULL),
(139, 24, NULL),
(140, 24, NULL),
(141, 24, NULL),
(142, 24, NULL),
(143, 24, NULL),
(144, 24, NULL),
(145, 24, NULL),
(146, 24, NULL),
(147, 17, NULL),
(148, 24, NULL),
(149, 24, NULL),
(150, 24, NULL),
(151, 15, NULL),
(152, 17, NULL),
(153, 17, NULL),
(154, 24, NULL),
(155, 38, NULL),
(156, 23, NULL),
(157, 36, NULL),
(158, 37, NULL),
(159, 24, NULL),
(160, 38, NULL),
(161, 38, NULL),
(162, 36, NULL),
(163, 25, NULL),
(164, 25, NULL),
(165, 23, NULL),
(166, 16, NULL),
(167, 25, NULL),
(168, 2, NULL),
(169, 1, NULL),
(170, 3, NULL),
(171, 15, NULL),
(172, 15, NULL),
(173, 38, NULL),
(174, 38, NULL),
(175, 38, NULL),
(176, 38, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `verify_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_type`, `curriculum`, `user_status`, `verify_token`) VALUES
(44, 'johndoe@wmsu.edu.ph', 'password', 'John', 'Doe', 'student', 'BSCS', 'Active', ''),
(45, 'lucyfelix@wmsu.edu.ph', 'password', 'Lucy Felix', 'Sadiwa', 'adviser', 'BSCS', 'Active', ''),
(46, 'janedoe@wmsu.edu.ph', 'password', 'Jane', 'Doe', 'student', 'BSCS', '', ''),
(47, 'gadmarbelamide@wmsu.edu.ph', 'password', 'Gadmar', 'Belamide', 'admin', 'BSCS', 'Active', ''),
(48, 'test123@wmsu.edu.ph', 'password', 'test', 'test', 'student', 'BSCS', '', ''),
(49, 'wadwad@wmsu.edu.ph', 'password', 'wad', 'wad', 'student', 'BSCS', '', ''),
(50, 'daphnagata@wmsu.edu.ph', 'password', 'Daph', 'Nagata', 'student', 'BSCS', '', ''),
(51, 'denisegerzon@wmsu.edu.ph', 'password', 'Denise', 'Gerzon', 'student', 'BSCS', 'Active', ''),
(52, 'abdulasis@wmsu.edu.ph', 'password', 'Abdulasis', 'Hamja', 'student', 'BSCS', '', ''),
(53, 'joshyasil@wmsu.edu.ph', 'password', 'Josh', 'Yasil', 'student', 'BSCS', '', ''),
(54, 'markvladimir@wmsu.edu.ph', 'password', 'Mark', 'Vladimir', 'student', 'BSCS', '', ''),
(55, 'bushra@wmsu.edu.ph', 'password', 'Bushra', 'Adjaluddin', 'student', 'BSCS', '', ''),
(56, 'juandelacruz@wmsu.edu.ph', 'password', 'Juan', 'Dela Cruz', 'student', 'BSCS', '', ''),
(57, 'faberdrive@wmsu.edu.ph', 'password', 'Faber', 'Drive', 'student', 'BSCS', '', ''),
(58, 'aprilboy@wmsu.edu.ph', 'password', 'April', 'Boy', 'student', 'BSCS', '', ''),
(59, 'andreicafino@wmsu.edu.ph', 'password', 'Andrei', 'Cafino', 'student', 'BSIT', '', ''),
(60, 'peejayvidad@wmsu.edu.ph', 'password', 'Peejay', 'Vidad', 'student', 'BSCS', '', ''),
(61, 'shift@wmsu.edu.ph', 'password', 'Shift', 'Na Tayo', 'student', 'BSCS', '', ''),
(62, 'minmax@wmsu.edu.ph', 'password', 'Min', 'Max', 'student', 'BSCS', '', ''),
(63, 'stephencurry@wmsu.edu.ph', 'password', 'Stephen', 'Curry', 'student', 'BSCS', '', ''),
(64, 'lebronjames@wmsu.edu.ph', 'password', 'LeBron', 'James', 'student', 'BSCS', '', ''),
(65, 'aiyayuu@wmsu.edu.ph', 'password', 'Aiyayuu', 'Misyu', 'student', 'BSCS', '', ''),
(66, 'maggie@wmsu.edu.ph', 'password', 'Lucky Me', 'Maggie', 'student', 'BSIT', '', ''),
(67, 'kyrie@wmsu.edu.ph', 'password', 'kyrie', 'irving', 'student', 'BSCS', '', ''),
(68, '1@wmsu.edu.ph', 'passowrd', 'juan', 'juan', 'student', 'BSCS', '', ''),
(69, '2@wmsu.edu.ph', 'passowrd', 'Two', 'Two', 'student', 'BSCS', '', ''),
(70, 'three@wmsu.edu.ph', 'password', 'three', 'three', 'student', 'BSCS', '', ''),
(71, 'four@wmsu.edu.ph', 'password', 'Four', 'Four', 'student', 'BSCS', '', ''),
(72, 'haypayb@wmsu.edu.ph', 'password', 'Hay', 'Payb', 'student', 'BSCS', '', ''),
(73, 'uphere@wmsu.edu.ph', 'password', 'Up', 'Here', 'student', 'BSCS', '', ''),
(74, 'qwe@wmsu.edu.ph', '123123', 'qwe', 'qwe', 'student', 'BSCS', 'Active', '439169408fd156f12fcc72a92725125b'),
(75, 'asd@wmsu.edu.ph', '123456', 'qwe', 'qwe', 'student', 'BSCS', 'Active', 'c427859d63cf5de36812bbdd10f5be86'),
(76, 'asd@wasd.com', '123123', 'qwe', 'qwe', 'student', 'BSCS', 'Active', 'beefa17837aebd84e2c57d44112507bb'),
(77, '123@gmail.com', '123123', 'asd', 'asd', 'student', 'BSCS', 'Active', '60b524804ffa5a72f17a32e006de06d3'),
(78, 'qweqwe@gmail.com', '123123', 'qwe', 'qwe', 'student', 'BSCS', 'Active', 'e427b05b8ca440b38dfd39f335c04b36'),
(79, 'asdasd@wmsu.edu.ph', '123123', 'asd', 'asd', 'student', 'BSCS', 'Pending', 'fb350a038b9b8100310174cc2d123b26'),
(80, 'helloworld1@wmsu.edu.ph', '123123', 'zzxc', 'zxccc', 'student', 'BSCS', 'Pending', 'cab9c4ce563b8d8b9bcd7b9c261b4adf'),
(87, 'xt202002168@wmsu.edu.ph', '123', 'test', 'testtt', 'student', 'BSIT', 'Pending', '329fce9f3431c35b43d7453dfc4690b9'),
(92, 'a@wmsu.edu.ph', '123', '123', '123', 'student', 'BSCS', 'Pending', '21e31e6e62402e1522162b5c1473d69f'),
(93, 'akosidoggie@wmsu.edu.ph', '123', '123', '123', 'student', 'BSCS', 'Pending', '4336bd48973de497183affa978b586b3'),
(108, 'eh20220029512@wmsu.edu.ph', '123', 'sample', 'sample', 'student', 'BSCS', 'Pending', 'a62e6c49d35a59b9a4659ca2dfd331cd'),
(114, 'sample@wmsu.edu.ph', '123', '1234', '1234', 'student', 'BSCS', 'Pending', '9920c81b6b710425a8e49ab8b33b3bf3'),
(117, 'eh2022002qqww95@wmsu.edu.ph', 'qwqw', 'qwqw', 'qwqw', 'student', 'BSCS', 'Pending', 'ba791d0f06b903d27347dd8bbed48246'),
(118, 'jascha.mascunana@wmsu.edu.ph', 'chazz123123123', 'Jascha', 'Mascuñana', 'student', 'BSCS', 'Active', '1e4be8c85665d6414df4beba48c6fbd2'),
(123, 'jaydeeballaho@wmsu.edu.ph', 'password', 'Jaydee', 'Ballaho', 'adviser', 'BSCS', 'Active', '175777eaf8ac5f11304e6dd222836f19'),
(125, 'eh202200295@wmsu.edu.ph', '123', '123', '123', 'student', 'BSCS', 'Active', '1caf56e5dbebedb385800587d2184965'),
(126, 'eh2022002951@wmsu.edu.ph', '123', '123', '123', 'student', 'BSCS', 'Pending', '7686c85eedf854ce1e5c71f67cc9f2d6'),
(127, 'sajdnasjjas@wmsu.edu.ph', '123', '123', '123', 'student', 'BSCS', 'Pending', 'a5057119e4aa32890de1f008a9b2052a');

-- --------------------------------------------------------

--
-- Structure for view `grades_list`
--
DROP TABLE IF EXISTS `grades_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grades_list`  AS SELECT `applicants_grades`.`applicant_id` AS `applicant_id`, `sy_subjects`.`subject_name` AS `subject_name`, `applicants_grades`.`grade` AS `grade` FROM (`applicants_grades` join `sy_subjects` on(`sy_subjects`.`id` = `applicants_grades`.`subject_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_grades`
--
ALTER TABLE `applicants_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_schoolyear`
--
ALTER TABLE `course_schoolyear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course_id`);

--
-- Indexes for table `deanslist_applicants`
--
ALTER TABLE `deanslist_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `adviser_id` (`adviser_id`),
  ADD KEY `sy` (`school_year_id`);

--
-- Indexes for table `deans_listers`
--
ALTER TABLE `deans_listers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_id` (`app_id`);

--
-- Indexes for table `dean_applicants`
--
ALTER TABLE `dean_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listers`
--
ALTER TABLE `listers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sy_application_time`
--
ALTER TABLE `sy_application_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sy_time_id` (`sy_id`);

--
-- Indexes for table `sy_subjects`
--
ALTER TABLE `sy_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_list_grades`
--
ALTER TABLE `tbl_list_grades`
  ADD PRIMARY KEY (`grades_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tlb_applicant`
--
ALTER TABLE `tlb_applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_grades`
--
ALTER TABLE `applicants_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1871;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_schoolyear`
--
ALTER TABLE `course_schoolyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `deanslist_applicants`
--
ALTER TABLE `deanslist_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `deans_listers`
--
ALTER TABLE `deans_listers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dean_applicants`
--
ALTER TABLE `dean_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `listers`
--
ALTER TABLE `listers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sy_application_time`
--
ALTER TABLE `sy_application_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sy_subjects`
--
ALTER TABLE `sy_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_list_grades`
--
ALTER TABLE `tbl_list_grades`
  MODIFY `grades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=913;

--
-- AUTO_INCREMENT for table `tlb_applicant`
--
ALTER TABLE `tlb_applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants_grades`
--
ALTER TABLE `applicants_grades`
  ADD CONSTRAINT `applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `deanslist_applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `sy_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_schoolyear`
--
ALTER TABLE `course_schoolyear`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deanslist_applicants`
--
ALTER TABLE `deanslist_applicants`
  ADD CONSTRAINT `adviser_id` FOREIGN KEY (`adviser_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sy` FOREIGN KEY (`school_year_id`) REFERENCES `course_schoolyear` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deans_listers`
--
ALTER TABLE `deans_listers`
  ADD CONSTRAINT `app_id` FOREIGN KEY (`app_id`) REFERENCES `deanslist_applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sy_application_time`
--
ALTER TABLE `sy_application_time`
  ADD CONSTRAINT `sy_time_id` FOREIGN KEY (`sy_id`) REFERENCES `course_schoolyear` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sy_subjects`
--
ALTER TABLE `sy_subjects`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sy_id` FOREIGN KEY (`sy_id`) REFERENCES `course_schoolyear` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
