-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2021 at 04:53 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `absents`
--

CREATE TABLE `absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `facultie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absents`
--

INSERT INTO `absents` (`id`, `user_id`, `no`, `status`, `facultie`, `nota`, `day`, `created_at`, `updated_at`) VALUES
(1, 107, 1, 1, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(2, 289, 1, 1, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(3, 291, 1, 1, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(4, 292, 1, 0, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(5, 293, 1, 0, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(6, 294, 1, 0, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48'),
(7, 295, 1, 0, '18', NULL, '2021-03-27', '2021-03-27 17:46:48', '2021-03-27 17:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `target_audience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `teacher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hw_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_date` date NOT NULL,
  `final_time` time NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_user`
--

CREATE TABLE `assignment_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hw_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `choice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_times`
--

CREATE TABLE `collection_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sho3ba` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collection_times`
--

INSERT INTO `collection_times` (`id`, `sho3ba`, `created_at`, `updated_at`) VALUES
(8, 'b241', '2021-04-06 05:25:07', '2021-04-06 05:25:07'),
(9, 'b4401', '2021-04-06 07:45:18', '2021-04-06 07:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`, `available`) VALUES
(2, 'دورة (تحسين تلاوة القرآن الكريم)', '2021-02-11 06:52:20', '2021-03-30 03:23:12', 1),
(3, 'دورة (إتمام الحركات)', '2021-02-11 06:52:27', '2021-03-30 03:23:09', 1),
(4, 'دورة ( القاعدة النورانية)', '2021-02-11 06:52:33', '2021-03-30 03:23:05', 1),
(5, 'دورة (التأهيل للسند)', '2021-02-11 06:52:38', '2021-03-30 03:23:01', 1),
(6, 'دورة (تثبيت القرآن الكريم)', '2021-02-11 06:52:42', '2021-03-30 03:22:58', 1),
(7, 'دورة (تعاهدوا)', '2021-02-11 06:52:45', '2021-03-30 03:22:45', 1),
(8, 'دورة (الشاطبية)', '2021-02-11 06:52:50', '2021-03-30 03:28:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `bill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `bill`, `created_at`, `updated_at`) VALUES
(10, 295, 7, NULL, NULL, NULL),
(11, 296, 7, NULL, NULL, NULL),
(12, 294, 8, NULL, NULL, NULL),
(13, 293, 8, NULL, NULL, NULL),
(14, 292, 8, NULL, NULL, NULL),
(15, 291, 8, NULL, NULL, NULL),
(16, 290, 8, NULL, NULL, NULL),
(17, 289, 6, NULL, NULL, NULL),
(18, 288, 6, NULL, NULL, NULL),
(19, 287, 6, NULL, NULL, NULL),
(20, 286, 6, NULL, NULL, NULL),
(21, 285, 6, NULL, NULL, NULL),
(22, 284, 4, NULL, NULL, NULL),
(23, 283, 4, NULL, NULL, NULL),
(24, 282, 4, NULL, NULL, NULL),
(25, 281, 4, NULL, NULL, NULL),
(26, 280, 4, NULL, NULL, NULL),
(27, 279, 4, NULL, NULL, NULL),
(28, 278, 4, NULL, NULL, NULL),
(29, 277, 4, NULL, NULL, NULL),
(30, 276, 5, NULL, NULL, NULL),
(31, 275, 5, NULL, NULL, NULL),
(32, 274, 5, NULL, NULL, NULL),
(33, 273, 5, NULL, NULL, NULL),
(34, 272, 5, NULL, NULL, NULL),
(35, 271, 5, NULL, NULL, NULL),
(36, 270, 5, NULL, NULL, NULL),
(37, 269, 5, NULL, NULL, NULL),
(38, 268, 5, NULL, NULL, NULL),
(39, 267, 5, NULL, NULL, NULL),
(40, 266, 5, NULL, NULL, NULL),
(41, 265, 5, NULL, NULL, NULL),
(42, 264, 5, NULL, NULL, NULL),
(43, 263, 5, NULL, NULL, NULL),
(44, 262, 5, NULL, NULL, NULL),
(45, 261, 5, NULL, NULL, NULL),
(46, 260, 5, NULL, NULL, NULL),
(47, 259, 5, NULL, NULL, NULL),
(48, 258, 5, NULL, NULL, NULL),
(49, 257, 5, NULL, NULL, NULL),
(50, 256, 5, NULL, NULL, NULL),
(51, 255, 5, NULL, NULL, NULL),
(52, 254, 5, NULL, NULL, NULL),
(53, 253, 5, NULL, NULL, NULL),
(54, 252, 3, NULL, NULL, NULL),
(55, 251, 3, NULL, NULL, NULL),
(56, 250, 3, NULL, NULL, NULL),
(57, 249, 3, NULL, NULL, NULL),
(58, 248, 3, NULL, NULL, NULL),
(59, 247, 3, NULL, NULL, NULL),
(60, 246, 3, NULL, NULL, NULL),
(61, 245, 3, NULL, NULL, NULL),
(62, 244, 3, NULL, NULL, NULL),
(63, 243, 3, NULL, NULL, NULL),
(64, 242, 3, NULL, NULL, NULL),
(65, 241, 3, NULL, NULL, NULL),
(66, 240, 3, NULL, NULL, NULL),
(67, 239, 3, NULL, NULL, NULL),
(68, 238, 3, NULL, NULL, NULL),
(69, 237, 3, NULL, NULL, NULL),
(70, 236, 3, NULL, NULL, NULL),
(71, 235, 3, NULL, NULL, NULL),
(72, 234, 3, NULL, NULL, NULL),
(73, 233, 3, NULL, NULL, NULL),
(74, 232, 3, NULL, NULL, NULL),
(75, 231, 3, NULL, NULL, NULL),
(76, 230, 3, NULL, NULL, NULL),
(77, 229, 3, NULL, NULL, NULL),
(78, 228, 3, NULL, NULL, NULL),
(79, 227, 3, NULL, NULL, NULL),
(80, 226, 2, NULL, NULL, NULL),
(81, 225, 2, NULL, NULL, NULL),
(82, 223, 2, NULL, NULL, NULL),
(83, 224, 2, NULL, NULL, NULL),
(84, 222, 2, NULL, NULL, NULL),
(85, 221, 2, NULL, NULL, NULL),
(86, 220, 2, NULL, NULL, NULL),
(87, 219, 2, NULL, NULL, NULL),
(88, 218, 2, NULL, NULL, NULL),
(89, 217, 2, NULL, NULL, NULL),
(90, 216, 2, NULL, NULL, NULL),
(91, 215, 2, NULL, NULL, NULL),
(92, 214, 2, NULL, NULL, NULL),
(93, 213, 2, NULL, NULL, NULL),
(94, 212, 2, NULL, NULL, NULL),
(95, 211, 2, NULL, NULL, NULL),
(96, 210, 2, NULL, NULL, NULL),
(97, 209, 2, NULL, NULL, NULL),
(98, 208, 2, NULL, NULL, NULL),
(99, 207, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_requests`
--

CREATE TABLE `employment_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_date` date NOT NULL,
  `exam_open` time NOT NULL,
  `exam_close` time NOT NULL,
  `timer` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_user`
--

CREATE TABLE `exam_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `exam_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` bigint(20) NOT NULL,
  `expense` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `sana` int(11) NOT NULL,
  `fainal` int(11) NOT NULL,
  `hudur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `attachements` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_9_21_172733_create_permissions_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_03_05_102924_create_students_table', 1),
(5, '2019_03_05_122054_create_sections_table', 1),
(6, '2019_03_10_103459_create_collection_times_table', 1),
(7, '2019_03_11_144023_create_programmes_table', 1),
(8, '2019_03_11_221446_create_absents_table', 1),
(9, '2019_03_12_081434_create_subjects_table', 1),
(10, '2019_03_13_143341_create_schedules_table', 1),
(11, '2019_03_16_193952_create_grades_table', 1),
(12, '2021_02_11_092301_create_courses_table', 2),
(13, '2021_02_14_102735_create_user_course_table', 3),
(14, '2021_02_16_101242_rename_table', 4),
(15, '2021_02_16_141055_change_columns_to_nullable', 5),
(16, '2021_02_17_153915_add_on_delete_cascade', 6),
(17, '2021_02_22_185732_create_assignments_table', 7),
(18, '2021_02_22_213428_add_user_id_to_assignments_table', 8),
(19, '2021_02_22_215142_remove_user_id', 9),
(20, '2021_02_24_174456_add_section_id_to_subject__table', 10),
(21, '2021_02_24_231648_create_assignment_upload_table', 11),
(22, '2021_02_25_011352_rename__table', 12),
(23, '2021_02_25_030329_rename__table2', 13),
(24, '2021_02_25_230350_add_homework_number_to_assignments_table', 14),
(25, '2021_03_03_010208_create_exams_table', 15),
(26, '2021_03_03_012326_modify_unit_column_in_exams_table', 16),
(27, '2021_03_03_191846_remove_unit_column_from_exams_table', 17),
(28, '2021_03_06_031736_create_questions_table', 18),
(29, '2021_03_06_034055_create_choices_table', 19),
(30, '2021_03_10_021237_add_type_column_to_questions_table', 20),
(31, '2021_03_14_085840_add_bill_to_students_table', 21),
(32, '2021_03_14_092427_add_bill_to_students_table', 22),
(33, '2021_03_14_120159_create_messages_table', 23),
(34, '2021_03_14_122432_add_teacher_id_to_messages_table', 24),
(35, '2021_03_21_005959_create_student_exam_table', 25),
(36, '2021_03_21_010635_create_student_exam_answers', 26),
(37, '2021_03_21_051741_delete_mark_column', 27),
(38, '2021_03_25_190700_change_table_name_student_exams', 28),
(39, '2021_03_25_192100_change_table_name_exam_student_table', 29),
(40, '2021_03_27_232319_create_ads_table', 30),
(41, '2021_03_28_041154_create_finances_table', 31),
(42, '2021_03_29_005514_create_salaries_table', 32),
(43, '2021_03_29_151105_create_employment_requests_table', 33),
(44, '2021_03_30_054127_add_register_column_to_courses_table', 34),
(45, '2021_03_30_060331_add_available_column', 35),
(46, '2021_03_30_073200_add_registation_time_to_permission_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('n@n.com', '$2y$10$8Dk0k1JLvuYoO12KniYSj.HtdDBuMEt6DSElOEKIXer6yy3OLMVDm', '2019-04-03 11:25:28'),
('michaelnabil926@gmail.com', '$2y$10$3h2PObE2.8gnJVKOtol.euFUTSoRP/MozEm8FLTLymsegGJ8xjeR6', '2019-04-07 09:20:46'),
('n@hotmail.com', '$2y$10$I2sWVy6JUOrWPC6JNpsvAeba1o7F/LYpX.sCd.zImY1e3sShad26q', '2019-04-07 13:00:38'),
('rana.alrasheed7@gmail.com', '$2y$10$QIz7BCk6rMVSYWdXJg98vOe8P2HBBL62Ben9GhvsrOoPlKbd.Q7Hi', '2019-04-09 15:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `student_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `student_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `student_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `moderator_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `moderator_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `moderator_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `moderator_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `teacher_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `teacher_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `teacher_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `teacher_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `score_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `score_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `score_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `score_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `subject_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `subject_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `subject_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `subject_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `time_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `time_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `time_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `time_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `facultie_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `facultie_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `facultie_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `facultie_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `absent_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `absent_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `absent_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `absent_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `sana_drsia_delete` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `sana_drsia_add` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `sana_drsia_edit` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `sana_drsia_view` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `finance` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `register_time` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `student_delete`, `student_add`, `student_edit`, `student_view`, `moderator_delete`, `moderator_add`, `moderator_edit`, `moderator_view`, `teacher_delete`, `teacher_add`, `teacher_edit`, `teacher_view`, `score_delete`, `score_add`, `score_edit`, `score_view`, `subject_delete`, `subject_add`, `subject_edit`, `subject_view`, `time_delete`, `time_add`, `time_edit`, `time_view`, `facultie_delete`, `facultie_add`, `facultie_edit`, `facultie_view`, `absent_delete`, `absent_add`, `absent_edit`, `absent_view`, `sana_drsia_delete`, `sana_drsia_add`, `sana_drsia_edit`, `sana_drsia_view`, `finance`, `register_time`, `created_at`, `updated_at`) VALUES
(1, 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', NULL, NULL),
(2, 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'enable', 'enable', 'enable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', NULL, NULL),
(3, 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'disable', 'enable', NULL, '2021-04-06 08:25:47'),
(4, 'disable', 'disable', 'enable', 'enable', 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'enable', 'disable', '2021-03-28 01:21:31', '2021-03-30 05:03:15'),
(7, 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2019-04-08 06:28:31', '2019-04-08 06:28:31'),
(8, 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2019-04-08 06:31:08', '2019-04-08 06:31:08'),
(9, 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2019-04-08 06:34:06', '2019-04-08 06:34:06'),
(10, 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2021-03-27 21:50:02', '2021-03-27 21:50:02'),
(11, 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2021-03-27 21:50:21', '2021-03-27 21:50:21'),
(20, 'enable', 'enable', 'enable', 'enable', 'disable', 'disable', 'enable', 'enable', 'enable', 'enable', 'enable', 'enable', 'disable', 'disable', 'enable', 'enable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2021-03-28 20:49:07', '2021-03-28 20:49:07'),
(21, 'enable', 'disable', 'disable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'enable', 'enable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', 'disable', '2021-03-28 22:07:19', '2021-03-28 22:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`, `available`, `created_at`, `updated_at`) VALUES
(1, 'دبلوم الإشراف', 1, '2019-04-03 09:17:23', '2019-04-03 09:17:23'),
(2, 'دبلوم المديرات', 1, '2019-04-03 21:42:21', '2019-04-03 21:42:21'),
(5, 'دبلوم رياض الأطفال', 1, '2019-04-03 21:43:06', '2019-04-03 21:43:06'),
(6, 'دبلوم المعلمات', 1, '2019-04-10 14:16:19', '2019-04-10 14:16:19'),
(7, 'برنامج رافد 1', 1, '2020-09-21 07:07:24', '2020-09-21 07:07:24'),
(8, 'برنامج رافد 2', 1, '2020-09-21 07:07:38', '2020-09-21 07:07:38'),
(9, 'برنامج اتقان', 1, '2020-09-21 07:07:48', '2020-09-21 07:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0=>true/false,1=>MCQ',
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` bigint(20) NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` int(11) NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `collection_time_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `nota`, `created_at`, `updated_at`) VALUES
(10, 'r1442', 'لايوجد', '2020-09-15 15:06:39', '2020-09-15 15:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_arabda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sana_drasia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('enable','disable','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `rakam_akdemi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `city`, `name_arabda`, `phone_arabda`, `arabda`, `sana_drasia`, `bill`, `status`, `rakam_akdemi`, `sana`, `user_id`, `created_at`, `updated_at`) VALUES
(51, 'الرياض', 'فواز الصبي', '0556597779', 'أب', 'دبلوم المديرات', NULL, 'enable', '20200913691', '0', 104, '2020-09-16 12:56:21', '2021-02-15 15:07:44'),
(52, 'الرياض.الياسمين', 'عبدالله حمد عبدالعزيز الهدلق', '0505475264', 'أب', 'برنامج رافد 1', NULL, 'enable', '2020097202', '0', 105, '2020-09-22 06:43:45', '2021-02-15 15:07:44'),
(53, 'الرياض.الربوة', 'منصور راشد محمد الهويمل', '0506288007', 'أب', 'برنامج رافد 1', NULL, 'enable', '2020098016', '0', 106, '2020-09-22 06:49:32', '2021-03-31 18:03:07'),
(54, 'الرياض.اشبيليا', 'يوسف محمد الفوزان', '0532732998', 'أب', 'برنامج رافد 1', NULL, 'enable', '2020092011', '0', 107, '2020-09-22 06:56:21', '2021-03-31 18:00:17'),
(55, 'الرياض.العليا', 'عبدالعزيز  سعود سعد العريفي', '0500004424', 'أخ او أخت', 'برنامج رافد 1', NULL, 'enable', '20200912412', '0', 108, '2020-09-22 07:02:18', '2021-03-31 18:00:34'),
(56, 'الرياض.التخصصي', 'بندر علي عبدالعزيز الرميحي', '0569200663', 'زوج او زوجة', 'برنامج رافد 1', NULL, 'enable', '202009519', '0', 109, '2020-09-22 07:11:55', '2021-03-31 18:00:34'),
(57, 'الرياض.الشهداء', 'فوستر هوبي', '0542527833', 'زوج او زوجة', 'برنامج رافد 1', NULL, 'enable', '2020099958', '0', 110, '2020-09-22 07:22:28', '2020-09-22 09:59:02'),
(58, 'الرياض.المعذر الشمالي', 'أسماء أحمد الخثعمي', '0550685512', 'أخ او أخت', 'برنامج رافد 1', NULL, 'enable', '2020098312', '0', 111, '2020-09-22 07:27:04', '2021-03-31 18:00:34'),
(59, 'الرياض.الشفا', 'محمد سعيد حسن المجادعة', '0506980977', 'أب', 'برنامج رافد 1', NULL, 'enable', '2020099409', '0', 112, '2020-09-22 07:31:48', '2020-09-22 07:31:48'),
(60, 'الرياض.الشفا', 'سارة السرحان', '0543136763', 'أم', 'برنامج رافد 1', NULL, 'enable', '2020098785', '0', 113, '2020-09-22 07:36:48', '2020-09-22 07:36:48'),
(61, 'الرياض.الملقا', 'لينا احمد الراشد', '050528366', 'أخ او أخت', 'برنامج رافد 1', NULL, 'enable', '2020095582', '0', 114, '2020-09-22 07:41:24', '2020-09-22 07:41:24'),
(62, 'الرياض.العليا', 'فيصل عبدالله فهد بن هديان', '0544629144', 'زوج او زوجة', 'برنامج رافد 1', NULL, 'enable', '2020091635', '0', 115, '2020-09-22 07:45:36', '2020-09-22 07:45:36'),
(63, 'الجزائر', 'فاتح رابحة صليحة', '00213657417078', 'أم', 'برنامج رافد 1', NULL, 'enable', '20200913005', '0', 116, '2020-09-22 07:55:23', '2020-09-22 09:40:32'),
(64, 'الرياض.ظهرة البديعة', 'بدور سعود العريفي', '0555202226', 'أخ او أخت', 'برنامج رافد 1', NULL, 'enable', '2020093201', '0', 117, '2020-09-22 08:01:46', '2020-09-22 08:01:46'),
(65, 'الرياض.مخرج28', 'نوره سعود العريفي', '0550551009', 'أخ او أخت', 'برنامج رافد 1', NULL, 'enable', '2020095152', '0', 118, '2020-09-22 08:07:15', '2020-09-22 08:07:15'),
(66, 'الرياض', 'بندر محمد', '055140514', 'زوج او زوجة', 'برنامج رافد 1', NULL, 'enable', '20200910', '0', 119, '2020-09-22 08:15:21', '2020-09-22 08:15:21'),
(67, 'الرياض.الشفا', 'جواهر سالم يسلم العوض', '0598953407', 'أم', 'برنامج رافد 1', NULL, 'enable', '202009827', '0', 120, '2020-09-22 08:19:09', '2020-09-22 08:19:09'),
(68, 'الرياض.عكاظ', 'لم تكتب', '0559999005', 'زوج او زوجة', 'برنامج رافد 1', NULL, 'enable', '2020099727', '0', 121, '2020-09-22 08:23:32', '2020-09-22 08:23:32'),
(69, 'الرياض', 'نورة راشد عبدالعزيز الثنيان', '0503215823', 'أم', 'برنامج رافد 1', NULL, 'enable', '2020099064', '0', 122, '2020-09-22 08:27:11', '2020-09-22 08:27:11'),
(70, 'الرياض.السعادة', 'محمد سليمان صالح التويجري', '0552285511', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020092088', '0', 123, '2020-09-22 08:42:17', '2020-09-22 08:42:17'),
(71, 'الرياض.الربوة', 'عبدالعزيز أحمد محمد الأحيدب', '0503422123', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020099861', '0', 124, '2020-09-22 08:46:50', '2020-09-22 08:46:50'),
(72, 'الرياض', 'عبدالله ابراهيم العوض', '0590004711', 'أخ او أخت', 'دبلوم الإشراف', NULL, 'enable', '2020096835', '0', 125, '2020-09-22 08:50:46', '2020-09-22 08:50:46'),
(73, 'الرياض.حطين', 'سامية حمدناصر القديري', '0555090139', 'اخرى', 'دبلوم الإشراف', NULL, 'enable', '2020094897', '0', 126, '2020-09-22 08:55:45', '2020-09-22 08:55:45'),
(74, 'الرياض.الروضة', 'محمد عبدالرحمن العويس', '0560666813', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020097746', '0', 127, '2020-09-22 09:01:20', '2020-09-22 09:01:20'),
(75, 'الرياض.قرطبة', 'طيف المسند', '05466502707', 'اخرى', 'دبلوم الإشراف', NULL, 'enable', '2020098694', '0', 128, '2020-09-22 09:07:02', '2020-09-22 09:07:02'),
(76, 'الرياض.التعاون', 'لم تكتب', '0595928999', 'أب', 'دبلوم الإشراف', NULL, 'enable', '202009901', '0', 129, '2020-09-22 09:14:32', '2020-09-22 09:14:32'),
(77, 'الرياض.الملقا', 'كمال صالح علي القاضي', '0559922606', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020098180', '0', 130, '2020-09-22 09:18:18', '2020-09-22 09:18:18'),
(78, 'الرياض.لبن', 'عبدالوهاب محمد علي الورد', '0506798246', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '20200912571', '0', 131, '2020-09-22 09:22:34', '2020-09-22 09:22:34'),
(79, 'الرياض.الجنادرية', 'فهد خليف ناصر الشمري', '0558810578', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020091480', '0', 132, '2020-09-22 09:29:09', '2020-09-22 09:29:09'),
(80, 'الرياض.الجزيرة', 'إبراهيم محمد رفيق أكبر', '0506304115', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020094480', '0', 133, '2020-09-22 09:33:05', '2020-09-22 09:33:05'),
(81, 'الرياض.الاندلس', 'الحسين أحمد التوم الأمين', '0556080882', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020099610', '0', 134, '2020-09-22 09:36:37', '2020-09-22 09:36:37'),
(82, 'الرياض.الروضة', 'محمد الرشيد عبدالرحمن الأزرق', '0597655333', 'اخرى', 'دبلوم الإشراف', NULL, 'enable', '20200911801', '0', 135, '2020-09-22 09:43:20', '2020-09-22 09:43:20'),
(83, 'الرياض', 'عبدالعزيز عبدالرحمن إبراهيم العطر', '0555700403', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020096942', '0', 136, '2020-09-22 09:46:35', '2020-09-22 09:46:35'),
(84, 'الرياض.الشفا', 'عبدالله حسن عبدالرحمن الضعيان', '0564910098', 'زوج او زوجة', 'دبلوم الإشراف', NULL, 'enable', '2020092969', '0', 137, '2020-09-22 09:50:36', '2020-09-22 09:50:36'),
(85, 'الرياض.العارض', 'فيصل السيف', '0560444111', 'أخ او أخت', 'دبلوم الإشراف', NULL, 'enable', '2020098424', '0', 138, '2020-09-22 09:56:36', '2020-09-22 09:56:36'),
(86, 'الرياض.الشفا', 'عبدالرحمن علي فراج الفراج', '0535066798', 'اخرى', 'برنامج رافد 1', NULL, 'enable', '2020096877', '0', 139, '2020-09-23 18:06:34', '2020-09-23 18:06:34'),
(87, 'الرياض.العليا', 'بدور العريفي', '0555202226', 'أخ او أخت', 'برنامج رافد 2', NULL, 'enable', '2020092749', '0', 140, '2020-09-23 18:18:49', '2020-09-23 18:18:49'),
(88, 'الرياض.الملز', 'احمد عبدالله الخليفة', '0545519370', 'اخرى', 'برنامج رافد 2', NULL, 'enable', '2020098630', '0', 141, '2020-09-23 18:23:40', '2020-09-23 18:23:40'),
(89, 'الرياض.الغنامية', 'ياسين علي عبدالله جراح', '0533360131', 'زوج او زوجة', 'برنامج رافد 2', NULL, 'enable', '20200911327', '0', 142, '2020-09-23 18:28:56', '2020-09-23 18:28:56'),
(90, 'الرياض.لبن', 'عجلان علي محمد الشهري', '0590884993', 'زوج او زوجة', 'برنامج رافد 2', NULL, 'enable', '2020093860', '0', 143, '2020-09-23 18:33:15', '2020-09-23 18:33:15'),
(91, 'الرياض', 'فهدعبدالمحسن عبدالله المحيسن', '0552211233', 'زوج او زوجة', 'برنامج رافد 2', NULL, 'enable', '2020097751', '0', 144, '2020-09-23 18:36:47', '2020-09-23 18:36:47'),
(92, 'الرياض.طويق', 'سلطان', '0508027655', 'زوج او زوجة', 'برنامج رافد 2', NULL, 'enable', '20200910174', '0', 145, '2020-09-23 18:39:56', '2020-09-23 18:39:56'),
(93, 'الرياض.المعذر الشمالي', 'لم تكتب', '0554403672', 'أم', 'برنامج رافد 2', NULL, 'enable', '20200912238', '0', 146, '2020-09-23 18:42:54', '2020-09-23 18:42:54'),
(94, 'الرياض.الوادي', 'شافعي عبده علي حجاج', '0550499689', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '20200910010', '0', 147, '2020-09-26 08:32:43', '2020-09-26 08:32:43'),
(95, 'الرياض.الحمراء', 'منير محمد إنصاف طرابلسي', '0554309471', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '202009117', '0', 148, '2020-09-26 08:36:12', '2020-09-26 08:36:12'),
(96, 'الرياض.المروج', 'فهد عبدالعزيز محمد المعمري', '0555486862', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020093059', '0', 149, '2020-09-26 08:39:22', '2020-09-26 08:39:22'),
(97, 'الرياض.المروج', 'وليد عبدالرحمن ابراهيم الحديثي', '0555446057', 'اخرى', 'برنامج اتقان', NULL, 'enable', '2020091909', '0', 150, '2020-09-26 08:42:42', '2020-09-26 08:42:42'),
(98, 'الرياض.الامانة', 'ابتهال محمد الرحيمي', '0536496847', 'اخرى', 'برنامج اتقان', NULL, 'enable', '20200912159', '0', 151, '2020-09-26 08:48:34', '2020-09-26 08:48:34'),
(99, 'الرياض.غرناطه', 'علي مسفر الشمراني', '0555608281', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020091483', '0', 152, '2020-09-26 08:51:40', '2020-09-26 08:51:40'),
(100, 'الرياض.العقيق', 'خالدفهد المهنا', '0505464695', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '20200914305', '0', 153, '2020-09-26 08:55:11', '2020-09-26 08:55:11'),
(101, 'الرياض.قرطبة', 'عبدالعزيز حياء عايض السحيمي', '0599997275', 'اخرى', 'برنامج اتقان', NULL, 'enable', '20200912794', '0', 154, '2020-09-26 08:57:54', '2020-09-26 08:57:54'),
(102, 'الرياض.المحمدية', 'محمد حمد ابراهيم المناع', '0505403703', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020097689', '0', 155, '2020-09-26 09:07:41', '2020-09-26 09:07:41'),
(103, 'الرياض.المروج', 'عبدالله راشد التمامي', '0552858105', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '202009744', '0', 156, '2020-09-26 09:11:06', '2020-09-26 09:11:06'),
(104, 'الرياض', 'سعد عبد الخالق حسني الغامدي', '0504211308', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020098611', '0', 157, '2020-09-26 09:14:28', '2020-09-26 09:14:28'),
(105, 'الرياض.الوادي', 'ليلى إبراهيم محمد الحوشان', '0534071788', 'أخ او أخت', 'برنامج اتقان', NULL, 'enable', '2020096042', '0', 158, '2020-09-26 09:21:17', '2020-09-26 09:21:17'),
(106, 'الرياض.الروضة', 'عبدالسلام عبدالعزيز عبداللطيف الدايل', '0550066033', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '20200912876', '0', 159, '2020-09-26 09:27:14', '2020-09-26 09:27:14'),
(107, 'الرياض.النفل', 'ربى محمد عبدالعزيز التميمي', '0506103377', 'أخ او أخت', 'برنامج اتقان', NULL, 'enable', '20200910160', '0', 160, '2020-09-26 09:30:46', '2020-09-26 09:30:46'),
(108, 'الرياض.السلام', 'عبد المجيد إبراهيم الرزقان', '0561878725', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020097138', '0', 161, '2020-09-26 09:43:38', '2020-09-26 09:43:38'),
(109, 'الرياض.المصيف', 'عبده مارش البخيتي', '0502253290', 'أب', 'برنامج اتقان', NULL, 'enable', '2020097687', '0', 162, '2020-09-26 09:48:11', '2020-09-26 09:48:11'),
(110, 'الرياض', 'لم تكتب', '0581499210', 'أم', 'برنامج اتقان', NULL, 'enable', '202009251', '0', 163, '2020-09-26 09:50:53', '2020-09-26 09:50:53'),
(111, 'الرياض.العقيق', 'إبراهيم الضويحي', '0505114188', 'أب', 'برنامج اتقان', NULL, 'enable', '2020098966', '0', 164, '2020-09-26 09:54:18', '2020-09-26 09:54:18'),
(112, 'الرياض.البديعة', 'وجدان محمد ابراهيم المطرف', '0536947331', 'اخرى', 'دبلوم المديرات', NULL, 'enable', '2020098870', '0', 165, '2020-09-27 05:21:21', '2020-09-27 05:21:21'),
(113, 'الرياض.العارض', 'حنان الخريف', '0546225147', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '2020092762', '0', 166, '2020-09-27 05:24:28', '2020-09-27 05:24:28'),
(114, 'الرياض.العليا', 'تهاني علي بخيت باكيلي', '0545588588', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '20200914770', '0', 167, '2020-09-27 05:27:36', '2020-09-27 05:27:36'),
(115, 'الرياض.اسكان الحرس', 'فهد سعود كليفيخ العتيبي', '0504175785', 'أب', 'دبلوم المديرات', NULL, 'enable', '202009858', '0', 168, '2020-09-27 05:30:40', '2020-09-27 05:30:40'),
(116, 'الرياض.اليرموك', 'لم تكتب', '0505492053', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '2020093409', '0', 169, '2020-09-27 05:34:04', '2020-09-27 05:34:04'),
(117, 'الرياض.النموذجية', 'عبدالقادر محمد صالح', '0552999553', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200911391', '0', 170, '2020-09-27 05:36:51', '2020-09-27 05:36:51'),
(118, 'الرياض.سكن جامعة الامام', 'عبدالله ابراهيم السلوم', '0555213839', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200910861', '0', 171, '2020-09-27 05:39:54', '2020-09-27 05:39:54'),
(119, 'الرياض.العليا', 'عبدالعزيز محمد سليمان الصيخن', '0506199145', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200910862', '0', 172, '2020-09-27 05:43:19', '2020-09-27 05:43:19'),
(120, 'الرياض.عرقة', 'شريفة يحيى يحيى الزهراني', '0555279548', 'أم', 'دبلوم المديرات', NULL, 'enable', '2020097864', '0', 173, '2020-09-27 05:45:53', '2020-09-27 05:45:53'),
(121, 'الرياض.الحمراء', 'سلمان صالح عثمان العتيبي', '0504881965', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '20200911018', '0', 174, '2020-09-27 05:48:51', '2020-09-27 05:48:51'),
(122, 'الرياض.عرقة', 'هيثم عبدالرحمن ابراهيم الجديد', '0555211808', 'أب', 'دبلوم المديرات', NULL, 'enable', '2020094648', '0', 175, '2020-09-27 05:51:25', '2020-09-27 05:51:25'),
(123, 'الرياض.لبن', 'عمر علي ابراهيم العمران', '0557385720', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200910155', '0', 176, '2020-09-27 05:54:03', '2020-09-27 05:54:03'),
(124, 'الرياض.الشفا', 'ابراهيم منصور عبد الرحمن القباع', '0554134415', 'اخرى', 'دبلوم المديرات', NULL, 'enable', '2020093869', '0', 177, '2020-09-27 06:01:09', '2020-09-27 06:01:09'),
(125, 'الرياض.العارض', 'عبدالرحمن عبدالله المرشد', '0504204960', 'أب', 'دبلوم المديرات', NULL, 'enable', '20200911588', '0', 178, '2020-09-27 06:21:40', '2020-09-27 06:21:40'),
(126, 'الرياض.حطين', 'تركي عبدالله ابراهيم النشوان', '0533321313', 'اخرى', 'دبلوم المديرات', NULL, 'enable', '2020095971', '0', 179, '2020-09-27 06:24:22', '2020-09-27 06:24:22'),
(127, 'الرياض.الصحافة', 'خالد عبدالرزاق مغربي', '0503044036', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '2020097498', '0', 180, '2020-09-27 06:27:18', '2020-09-27 06:27:18'),
(128, 'الرياض.لبن', 'حسن علي ناصرالقحطاني', '0555197146', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200913546', '0', 181, '2020-09-27 06:30:12', '2020-09-27 06:30:12'),
(129, 'الرياض.العريجا', 'منيرة علي حسين بكار', '0552035621', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '20200912905', '0', 182, '2020-09-27 06:46:41', '2020-09-27 06:46:41'),
(130, 'الرياض.ام الحمام', 'منار عايض خلف السبيعي', '0530663260', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '2020097722', '0', 183, '2020-09-27 06:49:37', '2020-09-27 06:49:37'),
(131, 'الرياض.الروضة', 'محمد نبيل الخلاوي', '0532020301', 'اخرى', 'دبلوم المديرات', NULL, 'enable', '202009517', '0', 184, '2020-09-27 06:53:02', '2020-09-27 06:53:02'),
(132, 'الرياض.المرسلات', 'يوسف المشاري', '0598843680', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '2020093634', '0', 185, '2020-09-27 06:56:11', '2020-09-27 06:56:11'),
(133, 'الرياض.سكن جامعة الملك سعود', 'فيصل عبدالعزيز محمد التميمي', '0555407027', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200914459', '0', 186, '2020-09-27 06:59:29', '2020-09-27 06:59:29'),
(134, 'الرياض.الملقا', 'عبدالعزيز ناصر محمد الهديان', '0505112180', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '2020096308', '0', 187, '2020-09-27 07:07:33', '2020-09-27 07:07:33'),
(135, 'الرياض.قرطبه', 'ماجد بن فهد', '0566650604', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '202009572', '0', 188, '2020-09-27 07:10:29', '2020-09-27 07:10:29'),
(136, 'الرياض.الملقا', 'هياخالد محمد العثمان', '0561359995', 'اخرى', 'دبلوم المديرات', NULL, 'enable', '20200910196', '0', 189, '2020-09-27 07:13:46', '2020-09-27 07:13:46'),
(137, 'الرياض.الدرعية', 'عبدالإله بن عبدالعزيز الزعير', '0555283614', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200915', '0', 190, '2020-09-27 07:17:25', '2020-09-27 07:17:25'),
(138, 'الرياض.قرطبه', 'عبدالرحمن فهد عبدالرحمن الخميس', '05038386888', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '20200912018', '0', 191, '2020-09-27 07:34:03', '2020-09-27 07:34:03'),
(139, 'الرياض.الغبيراء', 'سارة حسين عبد الله المشدلي', '0504127454', 'أخ او أخت', 'دبلوم الإشراف', NULL, 'enable', '20200911077', '0', 192, '2020-09-27 07:45:12', '2020-09-27 07:45:12'),
(140, 'الرياض.المصيف', 'شيخة', '0559798907', 'أخ او أخت', 'دبلوم الإشراف', NULL, 'enable', '202009352', '0', 193, '2020-09-27 07:48:54', '2020-09-27 07:48:54'),
(141, 'الرياض.العارض', 'سطام سفر المطيري', '0556099499', 'اخرى', 'دبلوم الإشراف', NULL, 'enable', '2020095256', '0', 194, '2020-09-27 08:00:10', '2020-09-27 08:00:10'),
(142, 'الرياض.النموذجية', 'اريج الرومي', '0531111002', 'أم', 'برنامج رافد 2', NULL, 'enable', '2020097524', '0', 195, '2020-09-28 05:54:22', '2020-09-28 05:54:22'),
(143, 'الرياض', 'مشاعل عبدالله علي الدريهم', '0557770600', 'أخ او أخت', 'برنامج رافد 2', NULL, 'enable', '2020094852', '0', 196, '2020-09-28 05:57:21', '2020-09-28 05:57:21'),
(144, 'الرياض', 'الجوهرة مناحي محمد العجمي', '0538080021', 'أخ او أخت', 'دبلوم المديرات', NULL, 'enable', '2020095795', '0', 197, '2020-09-28 06:15:48', '2020-09-28 06:15:48'),
(145, 'الرياض.الملقا', 'ابراهيم عبدالعزيز الصبيح', '0505460840', 'أب', 'دبلوم المديرات', NULL, 'enable', '20200913490', '0', 198, '2020-09-28 06:18:08', '2020-09-28 06:18:08'),
(146, 'الرياض.الصحافة', 'فريح عايد اللويحق المطيري', '0505668306', 'زوج او زوجة', 'دبلوم المديرات', NULL, 'enable', '202009270', '0', 199, '2020-09-28 06:21:30', '2020-09-28 06:21:30'),
(147, 'الرياض', 'غزواء عليثه عباد المطيري', '0507197708', 'أم', 'دبلوم المديرات', NULL, 'enable', '2020092608', '0', 200, '2020-09-28 06:27:59', '2020-09-28 06:27:59'),
(148, 'الرياض.الشفا', 'عبدالحميد حميد صالح رياش', '0543134879', 'زوج او زوجة', 'برنامج رافد 2', NULL, 'enable', '202009488', '0', 201, '2020-09-30 07:10:46', '2020-09-30 07:10:46'),
(149, 'الرياض.لبن', 'محمد مطر علي الغامدي', '0502053054', 'أب', 'برنامج رافد 2', NULL, 'enable', '2020098264', '0', 202, '2020-09-30 07:13:51', '2020-09-30 07:13:51'),
(150, 'الرياض.الصحافة', 'عبدالإله بن إبراهيم سليمان الدخيل', '0505103730', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '202009523', '0', 203, '2020-09-30 07:22:05', '2020-09-30 07:22:05'),
(151, 'الرياض.قرطبه', 'عبد الإله محمد زين هيج', '0504681967', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020091697', '0', 204, '2020-09-30 07:24:53', '2020-09-30 07:24:53'),
(152, 'الرياض.الربيع', 'شايعه العبيد', '0552118000', 'أم', 'برنامج اتقان', NULL, 'enable', '2020094567', '0', 205, '2020-09-30 07:28:35', '2020-09-30 07:28:35'),
(153, 'الرياض.الوادي', 'شنيف الشنيف', '0555151693', 'زوج او زوجة', 'برنامج اتقان', NULL, 'enable', '2020095589', '0', 206, '2020-09-30 07:31:49', '2020-09-30 07:31:49'),
(154, 'الرياض', 'لم تكتب', '0552202082', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103331', '0', 207, '2020-10-07 07:11:00', '2020-10-07 07:11:00'),
(155, 'العراق', 'لم تكتب', '07723934918', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201013645', '0', 208, '2020-10-07 07:13:31', '2020-10-07 07:13:31'),
(156, 'الرياض', 'لم تكتب', '0552766265', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012721', '0', 209, '2020-10-07 07:15:29', '2020-10-07 07:15:29'),
(157, 'الرياض', 'لم تكتب', '0502883303', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101605', '0', 210, '2020-10-07 07:17:19', '2020-10-07 07:17:19'),
(158, 'الرياض', 'لم تكتب', '0508434375', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010569', '0', 211, '2020-10-07 07:20:38', '2020-10-07 07:20:38'),
(159, 'الرياض', 'لم تكتب', '0557589232', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '202010521', '0', 212, '2020-10-07 07:22:43', '2020-10-07 07:22:43'),
(160, 'الرياض', 'لم تكتب', '0590087113', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107683', '0', 213, '2020-10-07 07:24:45', '2020-10-07 07:24:45'),
(161, 'الرياض', 'لم تكتب', '0507488726', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012085', '0', 214, '2020-10-07 07:26:15', '2020-10-07 07:26:15'),
(162, 'الرياض', 'لم تكتب', '0503920370', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010951', '0', 215, '2020-10-07 07:28:55', '2020-10-07 07:28:55'),
(163, 'الرياض', 'لم تكتب', '0509114144', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012165', '0', 216, '2020-10-07 07:30:44', '2020-10-07 07:30:44'),
(164, 'الرياض', 'لم تكتب', '0507158281', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020106328', '0', 217, '2020-10-07 07:33:11', '2020-10-07 07:33:11'),
(165, 'الرياض', 'لم تكتب', '0506692948', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012722', '0', 218, '2020-10-07 07:37:48', '2020-10-07 07:37:48'),
(166, 'الرياض', 'لم تكتب', '0541353059', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020105432', '0', 219, '2020-10-07 07:40:13', '2020-10-07 07:40:13'),
(167, 'الرياض', 'لم تكتب', '0565601484', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010353', '0', 220, '2020-10-07 07:41:49', '2020-10-07 07:41:49'),
(168, 'الرياض', 'لم تكتب', '0558553551', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102104', '0', 221, '2020-10-07 07:44:08', '2020-10-07 07:44:08'),
(169, 'الرياض', 'لم تكتب', '0552777055', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109778', '0', 222, '2020-10-07 07:45:58', '2020-10-07 07:45:58'),
(170, 'الرياض', 'لم تكتب', '0555476651', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103310', '0', 223, '2020-10-07 07:47:59', '2020-10-07 07:47:59'),
(171, 'الرياض', 'لم تكتب', '0504257126', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103900', '0', 224, '2020-10-07 07:49:22', '2020-10-07 07:49:22'),
(172, 'الرياض', 'لم تكتب', '0554279791', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201011343', '0', 225, '2020-10-07 07:51:25', '2020-10-07 07:51:25'),
(173, 'الرياض', 'لم تكتب', '0502034866', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010142', '0', 226, '2020-10-07 07:53:05', '2020-10-07 07:53:05'),
(174, 'الرياض', 'لم تكتب', '0505461872', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010988', '0', 227, '2020-10-07 08:03:33', '2020-10-07 08:03:33'),
(175, 'الرياض', 'لم تكتب', '0502883303', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102655', '0', 228, '2020-10-07 08:05:05', '2020-10-07 08:05:05'),
(176, 'الرياض', 'لم تكتب', '0532750855', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102723', '0', 229, '2020-10-07 08:07:09', '2020-10-07 08:07:09'),
(177, 'الرياض', 'لم تكتب', '0554461365', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020105500', '0', 230, '2020-10-07 08:08:51', '2020-10-07 08:08:51'),
(178, 'الرياض', 'لم تكتب', '0544706009', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109852', '0', 231, '2020-10-07 08:10:33', '2020-10-07 08:10:33'),
(179, 'الرياض', 'لم تكتب', '0503762936', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108494', '0', 232, '2020-10-07 08:12:18', '2020-10-07 08:12:18'),
(180, 'الرياض', 'لم تكتب', '0504793155', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '202010932', '0', 233, '2020-10-07 08:14:06', '2020-10-07 08:14:06'),
(181, 'الرياض', 'لم تكتب', '0548393291', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102587', '0', 234, '2020-10-07 08:16:04', '2020-10-07 08:16:04'),
(182, 'الرياض', 'لم تكتب', '0569986529', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020104202', '0', 235, '2020-10-07 08:18:22', '2020-10-07 08:18:22'),
(183, 'الاردن', 'لم تكتب', '972595454861', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101687', '0', 236, '2020-10-07 08:21:22', '2020-10-07 08:21:22'),
(184, 'الرياض', 'لم تكتب', '0553877758', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109392', '0', 237, '2020-10-07 08:23:14', '2020-10-07 08:23:14'),
(185, 'الرياض', 'لم تكتب', '0507876510', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103161', '0', 238, '2020-10-07 08:25:19', '2020-10-07 08:25:19'),
(186, 'الرياض', 'لم تكتب', '0503074033', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107633', '0', 239, '2020-10-07 08:30:04', '2020-10-07 08:30:04'),
(187, 'الرياض', 'لم تكتب', '0504461971', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020105894', '0', 240, '2020-10-07 08:38:51', '2020-10-07 08:38:51'),
(188, 'الرياض', 'لم تكتب', '0536368814', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102674', '0', 241, '2020-10-07 08:41:31', '2020-10-07 08:41:31'),
(189, 'الرياض', 'لم تكتب', '0505109940', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '202010684', '0', 242, '2020-10-07 08:43:52', '2020-10-07 08:43:52'),
(190, 'الرياض', 'لم تكتب', '0504452579', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108152', '0', 243, '2020-10-07 08:47:37', '2020-10-07 08:47:37'),
(191, 'الرياض', 'لم تكتب', '0536886033', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '202010712', '0', 244, '2020-10-07 08:50:07', '2020-10-07 08:50:07'),
(192, 'الرياض', 'لم تكتب', '0509266926', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012773', '0', 245, '2020-10-07 08:53:00', '2020-10-07 08:53:00'),
(193, 'الرياض', 'لم تكتب', '0504247570', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101256', '0', 246, '2020-10-07 08:54:48', '2020-10-07 08:54:48'),
(194, 'الرياض', 'لم تكتب', '0596623453', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102753', '0', 247, '2020-10-07 08:56:46', '2020-10-07 08:56:46'),
(195, 'الرياض', 'لم تكتب', '0502006093', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201011271', '0', 248, '2020-10-07 08:58:41', '2020-10-07 08:58:41'),
(196, 'الرياض', 'لم تكتب', '0559233898', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201011562', '0', 249, '2020-10-07 09:00:34', '2020-10-07 09:00:34'),
(197, 'الرياض', 'لم تكتب', '0550977828', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107646', '0', 250, '2020-10-07 09:02:12', '2020-10-07 09:02:12'),
(198, 'الرياض', 'لم تكتب', '0554444892', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107367', '0', 251, '2020-10-07 09:04:15', '2020-10-07 09:04:15'),
(199, 'الرياض', 'لم تكتب', '0504260851', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109646', '0', 252, '2020-10-07 09:06:04', '2020-10-07 09:06:04'),
(200, 'الرياض', 'لم تكتب', '0557596261', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102692', '0', 253, '2020-10-12 07:10:51', '2020-10-12 07:10:51'),
(201, 'الرياض', 'لم تكتب', '0545304496', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201013680', '0', 254, '2020-10-12 07:13:13', '2020-10-12 07:13:13'),
(202, 'الرياض', 'لم تكتب', '0533700909', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101581', '0', 255, '2020-10-12 07:14:22', '2020-10-12 07:14:22'),
(203, 'الرياض', 'لم تكتب', '0571477318', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103902', '0', 256, '2020-10-12 07:15:57', '2020-10-12 07:15:57'),
(204, 'الرياض', 'لم تكتب', '0558047500', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201011024', '0', 257, '2020-10-12 07:18:52', '2020-10-12 07:18:52'),
(205, 'الرياض', 'لم تكتب', '0504104338', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020105336', '0', 258, '2020-10-12 07:20:23', '2020-10-12 07:20:23'),
(206, 'الرياض', 'لم تكتب', '0505470168', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020106135', '0', 259, '2020-10-12 07:21:46', '2020-10-12 07:21:46'),
(207, 'الرياض', 'لم تكتب', '00201010706339', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101897', '0', 260, '2020-10-12 07:23:40', '2020-10-12 07:23:40'),
(208, 'الرياض', 'لم تكتب', '0581384941', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108909', '0', 261, '2020-10-12 07:25:01', '2020-10-12 07:25:01'),
(209, 'الرياض', 'لم تكتب', '0541677802', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109154', '0', 262, '2020-10-12 07:27:13', '2020-10-12 07:27:13'),
(210, 'الرياض', 'لم تكتب', '0553045381', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101412', '0', 263, '2020-10-12 07:29:14', '2020-10-12 07:29:14'),
(211, 'الرياض', 'لم تكتب', '0505255815', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010583', '0', 264, '2020-10-12 07:30:48', '2020-10-12 07:30:48'),
(212, 'الرياض', 'لم تكتب', '0507857169', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201011344', '0', 265, '2020-10-12 07:33:17', '2020-10-12 07:33:17'),
(213, 'الرياض', 'لم تكتب', '0501584295', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101336', '0', 266, '2020-10-12 07:35:00', '2020-10-12 07:35:00'),
(214, 'الرياض', 'لم تكتب', '0555451863', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020109813', '0', 267, '2020-10-12 07:36:40', '2020-10-12 07:36:40'),
(215, 'الرياض', 'لم تكتب', '0538747265', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107421', '0', 268, '2020-10-12 07:38:31', '2020-10-12 07:38:31'),
(216, 'الرياض', 'لم تكتب', '0544238544', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108062', '0', 269, '2020-10-12 07:40:17', '2020-10-12 07:40:17'),
(217, 'الرياض', 'لم تكتب', '0556437439', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020106526', '0', 270, '2020-10-12 07:42:00', '2020-10-12 07:42:00'),
(218, 'الرياض', 'لم تكتب', '0503156965', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101040', '0', 271, '2020-10-12 07:44:09', '2020-10-12 07:44:09'),
(219, 'الرياض', 'لم تكتب', '0504140734', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102666', '0', 272, '2020-10-12 07:45:59', '2020-10-12 07:45:59'),
(220, 'الرياض', 'لم تكتب', '0592289144', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101379', '0', 273, '2020-10-12 07:47:47', '2020-10-12 07:47:47'),
(221, 'الرياض', 'لم تكتب', '0532141955', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020105557', '0', 274, '2020-10-12 07:50:40', '2020-10-12 07:50:40'),
(222, 'الرياض', 'لم تكتب', '0509790908', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010491', '0', 275, '2020-10-12 07:52:16', '2020-10-12 07:52:16'),
(223, 'الرياض', 'لم تكتب', '0506547499', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107998', '0', 276, '2020-10-12 07:54:02', '2020-10-12 07:54:02'),
(224, 'الرياض', 'لم تكتب', '0952439361', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101222', '0', 277, '2020-10-12 08:07:55', '2020-10-12 08:07:55'),
(225, 'الرياض', 'لم تكتب', '0554180008', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020103557', '0', 278, '2020-10-12 08:09:58', '2020-10-12 08:09:58'),
(226, 'الرياض', 'لم تكتب', '0508748321', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020106681', '0', 279, '2020-10-12 08:11:36', '2020-10-12 08:11:36'),
(227, 'الرياض', 'لم تكتب', '0555710048', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201010531', '0', 280, '2020-10-12 08:14:12', '2020-10-12 08:14:12'),
(228, 'الرياض', 'لم تكتب', '0502077855', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014227', '0', 281, '2020-10-12 08:15:59', '2020-10-12 08:15:59'),
(229, 'الرياض', 'لم تكتب', '0500100490', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102409', '0', 282, '2020-10-12 08:17:17', '2020-10-12 08:17:17'),
(230, 'الرياض', 'لم تكتب', '0555007382', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014188', '0', 283, '2020-10-12 08:19:07', '2020-10-12 08:19:07'),
(231, 'الرياض', 'لم تكتب', '0554267124', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108888', '0', 284, '2020-10-12 08:20:30', '2020-10-12 08:20:30'),
(232, 'الرياض', 'لم تكتب', '0547245452', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014245', '0', 285, '2020-10-12 14:01:55', '2020-10-12 14:01:55'),
(233, 'الرياض', 'لم تكتب', '0547245451', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014316', '0', 286, '2020-10-12 14:03:25', '2020-10-12 14:03:25'),
(234, 'الرياض', 'لم تكتب', '0553075701', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020108684', '0', 287, '2020-10-12 14:05:29', '2021-03-31 18:00:38'),
(235, 'الرياض', 'لم تكتب', '0530783754', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101216', '0', 288, '2020-10-12 14:06:47', '2021-03-31 18:00:38'),
(236, 'الرياض', 'لم تكتب', '0535757615', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020102821', '0', 289, '2020-10-12 14:08:13', '2021-03-31 18:00:17'),
(237, 'الرياض', 'لم تكتب', '0535335317', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014022', '0', 290, '2020-10-12 14:13:39', '2021-02-23 13:58:10'),
(238, 'الرياض', 'لم تكتب', '0506226096', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201012802', '0', 291, '2020-10-12 14:15:19', '2021-03-31 18:00:17'),
(239, 'الرياض', 'لم تكتب', '0538567885', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201014978', '0', 292, '2020-10-12 14:17:17', '2021-03-31 18:00:17'),
(240, 'الرياض', 'لم تكتب', '0599018700', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '20201013635', '0', 293, '2020-10-12 14:18:58', '2021-03-31 18:00:17'),
(241, 'الرياض', 'لم تكتب', '0534901149', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020107343', '0', 294, '2020-10-12 14:20:06', '2021-03-31 18:00:17'),
(242, 'الرياض', 'لم تكتب', '0502482332', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '2020101243', '0', 295, '2020-10-12 14:27:54', '2021-03-31 18:00:17'),
(243, 'الرياض', 'لم تكتب', '0555146421', 'اخرى', 'لم تسجل في دبلوم او برنامج', NULL, 'enable', '202010523', '0', 296, '2020-10-12 14:29:32', '2021-02-23 13:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_answers`
--

CREATE TABLE `student_exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sana_drsia_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `National_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT '2019-04-03',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `image`, `National_ID`, `phone`, `years`, `date`, `note`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$xGleFcu1xM7W5KR1OfeLH.RpAsd3i/fPCFyT8VzfIsK.dqZMGwOUW', 3, 'default.png', 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', '2019-04-03', 'admin@admin.com', 'xReT8bvgEVFx48bdGfgZt4zUSKJWtisKyzFR1ynn977AxCVQQXu9ixu4mnNw', NULL, NULL),
(104, 'فاطمة فهيد السبيعي', 'hoor1100@hotmail.com', NULL, '$2y$10$z9roqmbJqCg0o2Fq169Ck./8GsYuLIdiv0VrlGEM1SH6ZamIeBSyu', 1, 'default.png', '1234567865', '0547271231', 'ماجستير', '2003-05-06', 'لايوجد', NULL, '2020-09-16 12:56:21', '2020-09-16 12:56:21'),
(105, 'أبرار عبدالله حمد الهدلق', 'Abrar.alhadlaq@gmail.com', NULL, '$2y$10$5VRjwMvU97nQHyl7ftoTMuugpwnkFo0.Q7TK2QJw5.y5HbSpWpXve', 1, 'default.png', '1099574947', '0502489716', 'بكالوريس', '1998-04-18', 'لا يوجد', NULL, '2020-09-22 06:43:45', '2020-09-22 06:43:45'),
(106, 'بدرية ابراهيم عبدالله المحارب', 'bdor-@hotmail.com', NULL, '$2y$10$ftkkdUZpMz6NUDq29ekYQuVaq7cji2ZqeB5oAvnmFKDXxCDpTnFnu', 1, 'default.png', '1000292100', '0506288007', 'ثانوي', '1972-11-13', 'لا يوجد', NULL, '2020-09-22 06:49:32', '2020-09-22 06:49:32'),
(107, 'سحر يوسف محمد الفوزان', 'sahar.y.fz33@gmail.com', NULL, '$2y$10$JI/yT95ZU9Zle/pdVBx3I.LPqJvm58DLBCfCnh8xn3.KKJxFRj7Fe', 1, 'default.png', '1032499376', '0559001933', 'ثانوي', '1983-10-15', 'تعاني من ضغط', NULL, '2020-09-22 06:56:21', '2020-09-22 06:56:21'),
(108, 'نورة سعود سعد العريفي', 'n.s.m.d.266@gmail.com', NULL, '$2y$10$fogTCyw6OH/C1ZTMbepllumBv6c2F0/70IbNv5M0EK4U9OktmSPRm', 1, 'default.png', '1077484820', '0550551009', 'بكالوريس', '1986-12-21', 'لا يوجد', NULL, '2020-09-22 07:02:18', '2020-09-22 07:02:18'),
(109, 'هيله رميح علي الرميحي', 'abn.alkreem1400@gmail.com', NULL, '$2y$10$HG.rFuldLVAnn9G.zIQQ2.onuKyzF4uxn5OowwYXX7Ktjjk7QKAzu', 1, 'default.png', '1065843805', '0548285080', 'بكالوريس', '1989-05-07', 'تعاني من ضغط', NULL, '2020-09-22 07:11:55', '2020-09-22 07:11:55'),
(110, 'جاكلين كولازو هابي', 'ameenahsa65@gmail.com', NULL, '$2y$10$cvRKRJDJ2Y9YOAsMxDkp2umsTKnoqxwRM6.V4rl82VWkUiWHA6jlK', 1, 'default.png', '2309853212', '0567602318', 'ثانوي', '1965-07-15', 'لايوجد', NULL, '2020-09-22 07:22:28', '2020-09-22 09:59:02'),
(111, 'أحلام أحمد سفير الخثعمي', 'almumayaz555@gmail.com', NULL, '$2y$10$7Nn.4Vdezw5PCxpkQYMXe.s0LkraKqi3y0goT2s.zIVL/2.EWojbu', 1, 'default.png', '1063366031', '0550625556', 'بكالوريس', '1987-08-03', 'لايوجد', NULL, '2020-09-22 07:27:04', '2020-09-22 07:27:04'),
(112, 'غصون محمد سعيد المجادعه', 'ghoussonee@gmail.com', NULL, '$2y$10$6kMrVbSIXfr1AEWUg7lOIu0VgYk.QEVAP3uLOTPFa9.aVMxCi9ZLK', 1, 'default.png', '1073124735', '0533642461', 'بكالوريس', '1991-08-05', 'لايوجد', NULL, '2020-09-22 07:31:48', '2020-09-22 07:31:48'),
(113, 'هياء منصور محمد المنصور', 'rnh435001249@gmail.com', NULL, '$2y$10$zgWx9N8ksceWCpc.qsDxYuTXJa59/ceTbIVpEPCeb/hqdyw/Fj2pG', 1, 'default.png', '1090214964', '0591105241', 'بكالوريس', '1996-03-22', 'لايوجد', NULL, '2020-09-22 07:36:48', '2020-09-22 07:36:48'),
(114, 'أميرة عبدالله احمد الناصر', 'aameera155@gmail.com', NULL, '$2y$10$rXns/veoAY5bTMLOfSpUceAlWeMe9N9sLkkeV12IaAfzbn/CCzzJe', 1, 'default.png', '1039559156', '0505190107', 'بكالوريس', '1977-06-18', 'لايوجد', NULL, '2020-09-22 07:41:24', '2020-09-22 07:41:24'),
(115, 'ساره منصور راشد الهويمل', 'sara.mansour.h@gmail.com', NULL, '$2y$10$4/Ko.Qb.VqooomolrpFfB.LZRF/LtaSlSwxhU6GtEBZ3jR/HioQMy', 1, 'default.png', '1075065605', '0552488766', 'بكالوريس', '1991-09-18', 'حساسية صدر', NULL, '2020-09-22 07:45:36', '2020-09-22 07:45:36'),
(116, 'جيهاد لطفي بريكسي تاني', 'talohaasouma31tablette@gmail.com', NULL, '$2y$10$Qj61hb487tYZofc7qcRfYO9WK5mpgOa5i6Dfl/I09cTdzyoSB4o5a', 1, 'default.png', '119891110113470006', '00213675097312', 'بكالوريس', '1989-12-19', 'الذئبة الحمراء و الغدة الدرقية خمول', NULL, '2020-09-22 07:55:23', '2020-09-22 09:40:10'),
(117, 'مشاعل سعود سعد العريفي', 'majaa1409@gmail.com', NULL, '$2y$10$ozwsNo1O/kg14gcLZjxGn.cEGmOcq27ClgHzGHgXMFQjyRxNV2gRi', 1, 'default.png', '1057617001', '0539113122', 'بكالوريس', '1988-10-21', 'لايوجد', NULL, '2020-09-22 08:01:46', '2020-09-22 08:01:46'),
(118, 'بدور سعود سعد العريفي', 'lenah.m.s756@windowslive.com', NULL, '$2y$10$69W1vXSAL6/cywr8nv7y4eODg3KltDkEoQB4xxIY7MoDY3UeM4Cta', 1, 'default.png', '1017233550', '0555202226', 'بكالوريس', '1981-09-17', 'لايوجد', NULL, '2020-09-22 08:07:15', '2020-09-22 08:07:15'),
(119, 'فلوة عايض سعيد آل جبهان', 'felwah.a@gmail.com', NULL, '$2y$10$78UdwmAd4si52HqThhWpMOB7sadtXU3qj4D9DL/UxLGCBeANoVYoi', 1, 'default.png', '1020514608', '0559633297', 'بكالوريس', '1983-03-23', 'لايوجد', NULL, '2020-09-22 08:15:21', '2020-09-22 08:15:21'),
(120, 'ساره سعود مرسل السعيد', 'sooosoo-9999@hotmail.com', NULL, '$2y$10$LXO.r9GYvg4WHdHuhSxhTOYZyJO/VRBNYu7yVDIpSna42HS853fH2', 1, 'default.png', '1077725826', '0550345477', 'بكالوريس', '1988-08-28', 'لايوجد', NULL, '2020-09-22 08:19:09', '2020-09-22 08:19:09'),
(121, 'عبير ابراهيم مبارك الشريدي', 'abeer.iibrahim@icloud.com', NULL, '$2y$10$jcQSY2tiEg0URJmkBdyTsOVKClRziDDmRQljIwUtcBA6o48hAPiLe', 1, 'default.png', '1000251247', '0551684713', 'ثانوي', '1979-06-09', 'لايوجد', NULL, '2020-09-22 08:23:32', '2020-09-22 08:23:32'),
(122, 'نوره راشد عبدالعزيز الثنيان', 'noorah411@outlook.sa', NULL, '$2y$10$qhnAUuH0UAflT28AIvZ8EuLSy1MQlXpF9vUc8DE8SI0isEbz05EjG', 1, 'default.png', '1086908264', '0506315791', 'بكالوريس', '1995-07-29', 'لايوجد', NULL, '2020-09-22 08:27:11', '2020-09-22 08:27:11'),
(123, 'امتنان ابراهيم حماد التويجري', 'Emtenan.tu@hotmai.com', NULL, '$2y$10$35eeiUYsNRv83crcPABgIun3HQDsUNpeD862Y5ovbTF1AsFzzx9e.', 1, 'default.png', '1094165634', '0559087673', 'بكالوريس', '1996-02-05', 'لايوجد', NULL, '2020-09-22 08:42:17', '2020-09-22 08:42:17'),
(124, 'أروى عبدالله عبدالرحمن البراك', 'arwaaa1424@gmail.com', NULL, '$2y$10$fA4Ai449CeRrScw5H5Qu3ely9ot.v3hxJH7D8aE7xghes7quc8hQu', 1, 'default.png', '1094796131', '0505192339', 'بكالوريس', '1985-04-17', 'لايوجد', NULL, '2020-09-22 08:46:50', '2020-09-22 08:46:50'),
(125, 'آمنه إبراهيم عبدالله العوض', 'amnah.alawadh@gmail.com', NULL, '$2y$10$nIarHzw4IXZCvCAfNUr.Yu/.crtyQI8qmdoqJF.dD2C4uq2QBODB2', 1, 'default.png', '1100150307', '0536009334', 'بكالوريس', '1994-08-05', 'لايوجد', NULL, '2020-09-22 08:50:46', '2020-09-22 08:50:46'),
(126, 'بدريةابراهيم فوزان الشايع', 'ba.alshaya93@gmail.com', NULL, '$2y$10$.i3ntAle8iI1amswAWM9n.ByF0d4n5HxcZNUk98xE6t.mNpYnk0KK', 1, 'default.png', '1044885695', '0550513514', 'ماجستير', '1968-09-24', 'لايوجد', NULL, '2020-09-22 08:55:45', '2020-09-22 08:55:45'),
(127, 'حنان صالح سعد السليمان', '7anoone.s3@gmail.com', NULL, '$2y$10$8wvOwb0mFlq0xQSyUXqmieeAcQzPqDBqYz57EVwBo/.0sFaemMggS', 1, 'default.png', '10223536250', '0554203199', 'ثانوي', '1984-07-20', 'لايوجد', NULL, '2020-09-22 09:01:20', '2020-09-22 09:01:20'),
(128, 'خلود محمد ابراهيم العمر', 'Kalod329@gmail.Com', NULL, '$2y$10$LWES.G/O.W8uulCehtFLzeNpCGNAtrX7gmy0AaXa4aB4FypVc6JXy', 1, 'default.png', '1011684089', '0555486699', 'ثانوي', '1980-06-21', 'لايوجد', NULL, '2020-09-22 09:07:02', '2020-09-22 09:07:02'),
(129, 'زهرة محمد ابراهيم طلاس', 'zahra.talas@icloud.com', NULL, '$2y$10$vM/1OplwSJ5C7kamwCy2J.E0QKF6DruJhTVFXJWXICSnErv2QglGm', 1, 'default.png', '1107356022', '0541247645', 'ثانوي', '1973-07-21', 'لايوجد', NULL, '2020-09-22 09:14:32', '2020-09-22 09:14:32'),
(130, 'عبير محفوظ سعيد المرشدي', 'bero.m7.bero@gmail.com', NULL, '$2y$10$fw4E4vtwyeZmFkfoNdEFbuuuOOLO1fcBOyRJwG7YNSluVXOPFaC5q', 1, 'default.png', '1137358857', '0533132062', 'بكالوريس', '1978-11-04', 'لايوجد', NULL, '2020-09-22 09:18:18', '2020-09-22 09:18:18'),
(131, 'فاتن يحيى عبدالله القحطاني', 'Ftoon017@gmail.com', NULL, '$2y$10$tNGtob7zeOr7yV5X6miP6uQTZ6XOAarC4Y.PYKx6OCfAR0wgH5YEq', 1, 'default.png', '1063648537', '0508817788', 'بكالوريس', '1989-10-10', 'لايوجد', NULL, '2020-09-22 09:22:34', '2020-09-22 09:22:34'),
(132, 'فيروز مطيران رميح الشمري', 'fyrwzalshmry1@gmail.com', NULL, '$2y$10$2gxbPM6nx1fpu/krOfWIn.R1y.jo73x/ESm/uJb6ilm.zsz5xdznO', 1, 'default.png', '1067736024', '0500316151', 'بكالوريس', '1989-11-21', 'لايوجد', NULL, '2020-09-22 09:29:09', '2020-09-22 09:29:09'),
(133, 'منى عمر عبد العزيز الجنايني', 'mm.nn20008@gmail.com', NULL, '$2y$10$xTtx.DCKt45FzUOuP3JLJ.YMWkQy/X19WczxJYATeoxX/z60K0ujq', 1, 'default.png', '1095571723', '0506339440', 'بكالوريس', '1982-08-15', 'لايوجد', NULL, '2020-09-22 09:33:05', '2020-09-22 09:33:05'),
(134, 'نعمات موسى بابكر الحسين', 'ne3mat-93@hotmail.com', NULL, '$2y$10$C1rQuhUP7EoHen99P8TpkOjbHrWzLUtaqc5a6QQXh.PQWeizTDw5q', 1, 'default.png', '2078584352', '0505398699', 'ماجستير', '1991-05-18', 'لايوجد', NULL, '2020-09-22 09:36:37', '2020-09-22 09:36:37'),
(135, 'هدى الأمين عثمان الأزرق', 'darnwer40@gmail.com', NULL, '$2y$10$ULY8exr2BlWSj08tDi0MkOIirKUdGOm8TNf.MjkbztbQg/XLTMP5.', 1, 'default.png', '2002083075', '0582192304', 'ثانوي', '1963-01-01', 'لايوجد', NULL, '2020-09-22 09:43:20', '2020-09-22 09:43:20'),
(136, 'وداد إبراهيم عبدالله العجلان', 'do0oda-@hotmail.com', NULL, '$2y$10$S.HhzX4lY/GJGx9NfEVluep/qwET.XwGlMoWW79eTBpFrYROxgoNa', 1, 'default.png', '1021314800', '0554338926', 'بكالوريس', '1983-05-14', 'لايوجد', NULL, '2020-09-22 09:46:35', '2020-09-22 09:46:35'),
(137, 'هند فهد محمد الفلاج', 'Hind.15.1436@gmail.com', NULL, '$2y$10$IZKZYJX98Z0LQx1ZhARneugG7.QtgHj6r3xRYOtr2RVNYkSVVEKzK', 1, 'default.png', '1041196153', '0556444366', 'ثانوي', '1976-06-28', 'ضغط', NULL, '2020-09-22 09:50:36', '2020-09-22 09:50:36'),
(138, 'هيا ناصر محمد السيف', 'haya.n.m.s.123@gmail.com', NULL, '$2y$10$wTDtgtdC7CVB1Fe6TBrOc.wrEItbIM2gsE.Ika3N..r1JDtnAMFOu', 1, 'default.png', '1090478940', '0566646472', 'بكالوريس', '1966-10-16', 'لايوجد', NULL, '2020-09-22 09:56:36', '2020-09-22 09:56:36'),
(139, 'أسماء بنت محمد بن علي الفراج', 'am1134282@gmail.com', NULL, '$2y$10$XBAHoh0xOZqTmIen.TNLquP2P53xsJYMBiNQDjSMA7yoyIpYdBgdu', 1, 'default.png', '1065903635', '0503141013', 'بكالوريس', '1973-08-26', 'لايوجد', NULL, '2020-09-23 18:06:34', '2020-09-23 18:06:34'),
(140, 'شروق سعود سعد العريفي', 'traveler123.000@gmail.com', NULL, '$2y$10$MHtNmVhQ2FSTetTMkMcsU.liYDGE9ACdgEBwGTislLyHP/1L4jqSa', 1, 'default.png', '1078592480', '0555111361', 'بكالوريس', '1992-09-09', 'لايوجد', NULL, '2020-09-23 18:18:49', '2020-09-23 18:18:49'),
(141, 'رضا بدير الحسنين أبو عساكر', 'lora.ksa2012@gmial.com', NULL, '$2y$10$9edXQUQi4miPyDLcjhKPCuDhvPjqdUV/u2v/eB.3xSSYGqtVJcolu', 1, 'default.png', '1132402635', '0556220913', 'ثانوي', '2020-12-15', 'لايوجد', NULL, '2020-09-23 18:23:40', '2020-09-23 18:23:40'),
(142, 'نايفه أحمد محمد جراح', 'aishah.jarah105@gmail.com', NULL, '$2y$10$tk1JIXsXIMnT0gM52RfH6ucmK.VNDaPTB1bQKquXDF6mVTA05znHS', 1, 'default.png', '1061035868', '0504728033', 'ثانوي', '1989-02-27', 'لايوجد', NULL, '2020-09-23 18:28:56', '2020-09-23 18:28:56'),
(143, 'دلال محمد احمد الشهري', 'd5o0o5ly@gmail.com', NULL, '$2y$10$Cnba9yWygB6xkqegpdg.1OiDLgHze82Ttd8tX.i8odZrQbmhY4AvW', 1, 'default.png', '1039877707', '0595167852', 'بكالوريس', '1984-05-28', 'الغدة', NULL, '2020-09-23 18:33:15', '2020-09-23 18:33:15'),
(144, 'نوره محمد ابراهيم الجردان', 'noorah.mj@gmail.com', NULL, '$2y$10$S3DNvSYu54fr50oGnurgPugcE1bHnNE.h6jCOWYbvqyDsRvjOKa1G', 1, 'default.png', '1051767166', '0554256233', 'بكالوريس', '1971-07-29', 'لايوجد', NULL, '2020-09-23 18:36:47', '2020-09-23 18:36:47'),
(145, 'نورة موسى حاوي حكمي', 'noorahakami1416@gmail.com', NULL, '$2y$10$uxjm/gadVF0HW7STxPLSxOhWy4b43O7wpkYpxsxBzbCe5mgJoRpMa', 1, 'default.png', '1091953314', '0559370589', 'بكالوريس', '1995-08-05', 'لايوجد', NULL, '2020-09-23 18:39:56', '2020-09-23 18:39:56'),
(146, 'ساره منصور محمد الشريمي', 'sarahmansour376@gmail.com', NULL, '$2y$10$FnopQgogA9aOVl8Br6lx7..qt21Z.bYlFPmqzzCxoL8fBIa6Tjvrq', 1, 'default.png', '1069386769', '0553380205', 'ثانوي', '1990-12-12', 'السكري', NULL, '2020-09-23 18:42:54', '2020-09-23 18:42:54'),
(147, 'سمية توفيق محمد البعداني', 'amsm192448@qmail.com', NULL, '$2y$10$Ao4rkLQQYrIg1k56rhSMAOyhn8Ex9BmWaM0pqIwBIS/tbPbPYVjzi', 1, 'default.png', '4161535721', '0532436453', 'ثانوي', '2020-09-21', 'لا', NULL, '2020-09-26 08:32:43', '2020-09-26 08:32:43'),
(148, 'منال ابراهيم سعيد البني', 'manalalbeni1999@gmail.com', NULL, '$2y$10$ZXEKcCOmWe6LYnRxcpO2FuWO9ZI6YDUoPkqDUPUKPZvVQWOcPdAo6', 1, 'default.png', '012777497', '0578667262', 'بكالوريس', '1980-07-10', 'لايوجد', NULL, '2020-09-26 08:36:12', '2020-09-26 08:36:12'),
(149, 'فوزية سليمان سعد السراء', 'fawziah.s.s.2@gmail.com', NULL, '$2y$10$WBuR4N5snQ6Uc7GO15OYbOHnsFd7nZJ.txJF400y0wqWg4wsmrJ3m', 1, 'default.png', '1022275687', '0504443324', 'بكالوريس', '1961-01-01', 'هشاشة عظام وجيوب انفية', NULL, '2020-09-26 08:39:22', '2020-09-26 08:39:22'),
(150, 'ناديه محمد منيع البلاع', 'umnorah@yahoo.com', NULL, '$2y$10$rAmfaBhlGn3Snd1DRqqWkO5rz2Kjj9HYR/6A9qXQzYneNMCTtwo6.', 1, 'default.png', '1054693518', '0505446057', 'بكالوريس', '1964-03-06', 'لايوجد', NULL, '2020-09-26 08:42:42', '2020-09-26 08:42:42'),
(151, 'نوال حامد الرحيمي', 'nawal_hamed77@hotmail.com', NULL, '$2y$10$0LGsMPM3zJ6YfB5kMDNUxucVpTwWrx.eGV0PnTXtRf/MnW6EyVyp.', 1, 'default.png', '1040098715', '0552623140', 'ثانوي', '1974-09-11', 'لايوجد', NULL, '2020-09-26 08:48:34', '2020-09-26 08:48:34'),
(152, 'خيريه احمد صالح الشمراني', 'afk400@hotmail.com', NULL, '$2y$10$I/T1aZRQpB5pr7oYbSmiPu49Xlbpy38jZIF5lvOxgm41nYWY4w4cS', 1, 'default.png', '1048416216', '0504161088', 'بكالوريس', '1981-11-02', 'لايوجد', NULL, '2020-09-26 08:51:40', '2020-09-26 08:51:40'),
(153, 'هيفاء عبدالرحمن عبدالله الحميزي', 'Haifaalhumaizi@gmail.com', NULL, '$2y$10$0EJCjpxKvW4hOjliB.5F3.WpU14u04.KTewDB1PRnBgUx6XpoSMR.', 1, 'default.png', '1015145475', '0503231738', 'ثانوي', '1966-10-29', 'لايوجد', NULL, '2020-09-26 08:55:11', '2020-09-26 08:55:11'),
(154, 'حصه تهامي معجب الزهراني', 'Miss_Husah@hotmail.com', NULL, '$2y$10$fP8hQzlMmh0lXPyLzSROXuwoR9xcav8cNX8ydE8oF.rQVknu.c1ZG', 1, 'default.png', '1021802515', '0506389289', 'ثانوي', '1969-07-30', 'لايوجد', NULL, '2020-09-26 08:57:54', '2020-09-26 08:57:54'),
(155, 'نوال عبد الكريم محمد الحسين', 'nah366@gmail.com', NULL, '$2y$10$AAXc0uuRoNlS/l9HtK/xOuBR3hIFfmVh97E5azG5eOgjqFAGRTaZm', 1, 'default.png', '1032944900', '0554617612', 'بكالوريس', '1969-12-23', 'حساسية ربو', NULL, '2020-09-26 09:07:41', '2020-09-26 09:07:41'),
(156, 'سمية براهيم عثمان السلطان', 'somayyah2030@icloud.com', NULL, '$2y$10$/hB.83AuN/ZjR09ivUBzKOwCWwP7Z5UQNCOZR3TFFT/Jz4OYzDmde', 1, 'default.png', '1074638147', '0500271124', 'بكالوريس', '1992-12-05', 'لايوجد', NULL, '2020-09-26 09:11:06', '2020-09-26 09:11:06'),
(157, 'صالحة سعيد محمد الخريمي الغامدي', 'Saleha87gh@gmail.com', NULL, '$2y$10$el7PrC8PA3vHsQfj9KDwyeBuDxx8XASAwKHIb8rq7EUk.O4wPthl6', 1, 'default.png', '1066377878', '0568557357', 'ثانوي', '1963-11-18', 'القلب', NULL, '2020-09-26 09:14:28', '2020-09-26 09:14:28'),
(158, 'نورة إبراهيم محمد الحوشان', 'Nora.alhoshan@gmail.com', NULL, '$2y$10$MUJRMSiu5MuA1nsmfuTrc.zXt3Q3uThAeBnONirFZmH7BmNP4KqNq', 1, 'default.png', '1085953683', '0553994326', 'بكالوريس', '1992-12-12', 'لايوجد', NULL, '2020-09-26 09:21:17', '2020-09-26 09:21:17'),
(159, 'فاطمة غالب أحمد المقيط', 'f.t.m708090@gmail.com', NULL, '$2y$10$OkS8qfQ1ZZJZp3G8mMu.f.ysw7a/w3twXZHMIaTVVoBvff/ZRT8Eq', 1, 'default.png', '1045052097', '0503203222', 'بكالوريس', '1980-08-18', 'لايوجد', NULL, '2020-09-26 09:27:14', '2020-09-26 09:27:14'),
(160, 'رحاب محمد عبدالعزيز التميمي', 'rehabbb147@gmail.com', NULL, '$2y$10$oTkKb1szSNRdRUhtDfTGs.UiwAIqDyZbP6oksEmwzlwOtF/ZC0Xge', 1, 'default.png', '1101601647', '0553854233', 'بكالوريس', '1997-02-20', 'لايوجد', NULL, '2020-09-26 09:30:46', '2020-09-26 09:30:46'),
(161, 'بارعة صالح عيد اليحيى', 'b.s.a.s.y44@gmail.com', NULL, '$2y$10$UolNio6tbfN7YvkKYwmhSegM1NHk6zfkiEDWiPNp66phYIk0dKnDO', 1, 'default.png', '1096198393', '0599886272', 'بكالوريس', '1995-03-25', 'لايوجد', NULL, '2020-09-26 09:43:38', '2020-09-26 09:43:38'),
(162, 'دليلة عبده مارش البخيتي', 'Dalilabokhity2d@gmail.com', NULL, '$2y$10$6igz8vs1FGfYDNhzk61k3uGPn7w8tO.GkFmDboN5Ya3xc77X5q9w.', 1, 'default.png', '02500163', '0558894150', 'بكالوريس', '1990-02-10', 'لايوجد', NULL, '2020-09-26 09:48:11', '2020-09-26 09:48:11'),
(163, 'ريمه حامد سعدون السلمي', 'reemaalsulami45@gmail.com', NULL, '$2y$10$rKMG0I.IBw4rReiptn2PeOvMHvNGDYaUri8tvl1MUW8Ufy6D7tgKS', 1, 'default.png', '1098623356', '0566973271', 'بكالوريس', '1997-06-13', 'فقر دم', NULL, '2020-09-26 09:50:53', '2020-09-26 09:50:53'),
(164, 'اللولو إبراهيم عبدالمحسن الضويحي', 'allolo.ibrahim57@gmail.com', NULL, '$2y$10$dcwoz.BdXNGJTi9Sb1U3LeymSEkdC1t5XielZOIBF869gEV2r0ZPW', 1, 'default.png', '1100325149', '0549718493', 'بكالوريس', '1994-01-02', 'لايوجد', NULL, '2020-09-26 09:54:18', '2020-09-26 09:54:18'),
(165, 'بهية بنت مطرف بن محمد المطرف', 'Alrere500@gmail.com', NULL, '$2y$10$juGVRqE0zmWi.hD8H7NrGuK/1pKuYMrHmDzZninFeaN8ld2UNJZom', 1, 'default.png', '1005484223', '0504388693', 'ثانوي', '2020-09-21', 'لايوجد', NULL, '2020-09-27 05:21:21', '2020-09-27 05:21:21'),
(166, 'أفنان فهد محمد الخريف', 'a92538604@gmail.com', NULL, '$2y$10$UzZOSlA9EaIGZzWzYNcHEuDLuxvKGny50UQJQjxvJtOIBNJBPl/IC', 1, 'default.png', '1107817445', '0547999644', 'بكالوريس', '1994-09-25', 'لايوجد', NULL, '2020-09-27 05:24:28', '2020-09-27 05:24:28'),
(167, 'ابتسام علي بخيت باكيلي', 'E.bakili@gmail.com', NULL, '$2y$10$Ale99MTn/RqMo7FJw7SHku5Yiyd1uj/W.kqjJpTyJLplxnyUaPAU6', 1, 'default.png', '1000990331', '0553275333', 'بكالوريس', '1971-08-23', 'لايوجد', NULL, '2020-09-27 05:27:36', '2020-09-27 05:27:36'),
(168, 'فوزيه عايض عواض العتيبي', 'dhaf277@hotmail.com', NULL, '$2y$10$jsEh5yE9RsCFQAAav1UrP.rL1EvSp6D7GjmRKOQaWPX69Q8Hds04q', 1, 'default.png', '1024013409', '0505574099', 'بكالوريس', '1980-08-26', 'لايوجد', NULL, '2020-09-27 05:30:40', '2020-09-27 05:30:40'),
(169, 'حصه عبدالعزيز عبدالرحمن المطرودي', 'hussahaziz@icloud.com', NULL, '$2y$10$CuovUCHrKduW3s88DpA.4.vpa7XTIAmMiSl4qC3hzu2cmg8k.xS3a', 1, 'default.png', '1011323050', '0550556250', 'ثانوي', '1955-08-26', 'لايوجد', NULL, '2020-09-27 05:34:04', '2020-09-27 05:34:04'),
(170, 'مريم بنت عمر محمد بن مخاشن', 'alnarjss7@gmail.com', NULL, '$2y$10$a6FdCPD7NrJQFLxdqYAscOQXKjzLPTreNyn0UnXnOKF9opsbhRqsW', 1, 'default.png', '1133175479', '0555412927', 'بكالوريس', '1981-01-01', 'لايوجد', NULL, '2020-09-27 05:36:51', '2020-09-27 05:36:51'),
(171, 'عزيزة عبدالعزيز ناصر الشاهين', 'aashaheen3839@gmail.com', NULL, '$2y$10$NJFxX9nywIEHaDCQE2PPOeyLLz/bLLp.nkyHuPOU8y7ntGDee01ua', 1, 'default.png', '1065826867', '0555213839', 'ثانوي', '1978-03-23', 'ربو', NULL, '2020-09-27 05:39:54', '2020-09-27 05:39:54'),
(172, 'وفاء بنت محمد عبدالله الصيخان', 'wafa2day@hotmail.com', NULL, '$2y$10$F5VpCMCzFePnoLhy2cphbuH/hkRAPmifE99XWdfYE3agNq1/PYl0.', 1, 'default.png', '1024500769', '0503123430', 'بكالوريس', '1977-09-21', 'لايوجد', NULL, '2020-09-27 05:43:19', '2020-09-27 05:43:19'),
(173, 'بتول أحمد صالح الزهراني', 'batoolakz@gmail.com', NULL, '$2y$10$voTMKy8lyvV/Ithli7bSa.InUnRMPXbcfhD18/VXgcYHQC8vTRgnu', 1, 'default.png', '1086379011', '0500166286', 'بكالوريس', '1994-01-18', 'لايوجد', NULL, '2020-09-27 05:45:53', '2020-09-27 05:45:53'),
(174, 'عواطف صالح عثمان العتيبي', 'a102030uy@gmil.com', NULL, '$2y$10$6.lrfPO.jJO3LFdCy6v6yeSzwHrXQY1.qtBLTfLRg0YBSXWf/vrN6', 1, 'default.png', '1046818686', '0502117385', 'ثانوي', '1979-05-28', 'لايوجد', NULL, '2020-09-27 05:48:51', '2020-09-27 05:48:51'),
(175, 'ريم عبدالعزيز إبراهيم المغيليث', 'atorah37@gmail.com', NULL, '$2y$10$r81cZEhuY3cLMfyepxubQu6JlUs9Gpcdv11CQrUDSazQS./nXdQBG', 1, 'default.png', '1027286762', '0505211808', 'بكالوريس', '1982-07-19', 'لايوجد', NULL, '2020-09-27 05:51:25', '2020-09-27 05:51:25'),
(176, 'هند محمد سعد السالم', 'hind_434@hotmail.com', NULL, '$2y$10$G.2Q0dztF/Vk68QgkSeVvevpZaHqUiinTo0m5iyHksS3Nl0fW5E3u', 1, 'default.png', '1086582127', '0541655553', 'بكالوريس', '1994-06-02', 'لايوجد', NULL, '2020-09-27 05:54:03', '2020-09-27 05:54:03'),
(177, 'اسماء عبد الله عبد العزيز العبد السلام', 'Umibrahim516@gmail.com', NULL, '$2y$10$sl196BrP91ThnrJpzzGwM.1IRM8jw8cVp1qnIRk0frI/AW0LUNRmu', 1, 'default.png', '1028127452', '504290861', 'بكالوريس', '1972-12-14', 'لايوجد', NULL, '2020-09-27 06:01:09', '2020-09-27 06:01:09'),
(178, 'منيرة عبدالرحمن عبدالله المرشد', 'mooony1426@gmail.com', NULL, '$2y$10$YwVrQDEDyJhgXvep1AO9..W9u3Y5RuyyU2SCfiYt9jvpNW9o8f4L.', 1, 'default.png', '1075457257', '0550556095', 'بكالوريس', '1985-08-02', 'لايوجد', NULL, '2020-09-27 06:21:39', '2020-09-27 06:21:39'),
(179, 'منى عبدالمحسن ابراهيم السعيد', 'giftmona@gmail.com', NULL, '$2y$10$aJ/WGIdIJ4tIqnjs2lH5EOv42kwWgng2JxHsOTvUR7Jbc.RuXacAe', 1, 'default.png', '1049973776', '0558388883', 'بكالوريس', '1993-09-03', 'لايوجد', NULL, '2020-09-27 06:24:22', '2020-09-27 06:24:22'),
(180, 'ميساء فائق إبراهيم جستنيه', 'mfaeg76@gmail.com', NULL, '$2y$10$Wvl25C9oXel2ExbcXl.rXOlcElaRk7FmweiCqWlhaprPaDaApmoWe', 1, 'default.png', '1004211551', '0506194910', 'بكالوريس', '1976-11-24', 'لايوجد', NULL, '2020-09-27 06:27:18', '2020-09-27 06:27:18'),
(181, 'نوره شائع محمد القحطاني', 'nourahshaya1398@gmail.com', NULL, '$2y$10$eFLF33rFxJfcCsO7jtjvxeEeqd8VT0m.BhxoJdW5dy/2uWHnPPz/.', 1, 'default.png', '1006464810', '0507142866', 'بكالوريس', '1978-06-20', 'لايوجد', NULL, '2020-09-27 06:30:12', '2020-09-27 06:30:12'),
(182, 'فاطمة علي حسين بكار سلمان', 'f-bakar1@hotmail.com', NULL, '$2y$10$koGp72Szq8u27ejDVC7dveZe5Z80WG0kVOvEnmJUASCUxq5U8GrEa', 1, 'default.png', '1071105173', '0551843002', 'بكالوريس', '1984-05-10', 'لايوجد', NULL, '2020-09-27 06:46:41', '2020-09-27 06:46:41'),
(183, 'مي عايض خلف السبيعي', 'mmay.999666@gmail.com', NULL, '$2y$10$V2MCqqLlziGzl.gOqc8cj.v2gS5iwAAJ.fWR9v297FH7F4uV.j9zu', 1, 'default.png', '1098712442', '0503589499', 'ثانوي', '1998-02-27', 'لايوجد', NULL, '2020-09-27 06:49:37', '2020-09-27 06:49:37'),
(184, 'نوريه صالح الصانع', 'nsa2016mas@gmail.com', NULL, '$2y$10$uaozRuGFUWwEJyymm/bMIOqzEYIa0J96xPW9kcGWbHPvuPu2avwNe', 1, 'default.png', '1017043223', '0505905923', 'بكالوريس', '2020-09-22', 'لايوجد', NULL, '2020-09-27 06:53:02', '2020-09-27 06:53:02'),
(185, 'شفاء حمدان الحمدان', 'dmeeeer@gmail.com', NULL, '$2y$10$t89DqjS1sENgSceZ5I170.PnN8ViaGuSKgdcjCkh7SVc.OPkzo6r2', 1, 'default.png', '1071910739', '0501400140', 'بكالوريس', '2020-09-22', 'ضغط', NULL, '2020-09-27 06:56:11', '2020-09-27 06:56:11'),
(186, 'آمال عبدالعزيز سعود التميمي', 'hooopes@gmail.com', NULL, '$2y$10$VortF5JYl7rJ716O2go5keV9uk2RmIxEHWXEe1UYgb1phUc9a27jS', 1, 'default.png', '1000309805', '0555407068', 'ماجستير', '1981-10-18', 'لايوجد', NULL, '2020-09-27 06:59:29', '2020-09-27 06:59:29'),
(187, 'أسماء عبدالله محمد الحماد', 'a.alhamad020@gmail.com', NULL, '$2y$10$a/cg7m2PLrHI1g05Md6AyOVMxg607XOcQYKUwBzePVQSo.v8lOLbW', 1, 'default.png', '1031051756', '0555112180', 'ثانوي', '1972-08-14', 'لايوجد', NULL, '2020-09-27 07:07:33', '2020-09-27 07:07:33'),
(188, 'مها منير المطيري', 'omrafif1431@gmail.com', NULL, '$2y$10$c6iO5ruJK3ED5P06mXc.LOLRyRol/cq02BMRMJut.bWq2KHMrIvjW', 1, 'default.png', '1077807236', '0540607444', 'بكالوريس', '1987-09-09', 'لايوجد', NULL, '2020-09-27 07:10:29', '2020-09-27 07:10:29'),
(189, 'منى سعد عمر المحمود', 'haya-khaled1@hotmail.com', NULL, '$2y$10$NV4M96XVD3Suz7y6dvlTbuIAilIWy4/tVLbtN33HkZFDrJbHD/BLW', 1, 'default.png', '1038813547', '0554457335', 'ثانوي', '1970-09-02', 'ضغط', NULL, '2020-09-27 07:13:46', '2020-09-27 07:13:46'),
(190, 'بسمه محمد ناصر الفصام', 'basmah.m.f.28@gmail.com', NULL, '$2y$10$OrIxZ3wHI5n/5.LY3uw4r.dBGdNQQQiD2tiJcBTWH.Mn3RiBdx5o2', 1, 'default.png', '1013919533', '0506215833', 'بكالوريس', '1984-08-28', 'لايوجد', NULL, '2020-09-27 07:17:25', '2020-09-27 07:17:25'),
(191, 'ندى حسن عبدالعزيز الداود', 'nd536699334@gmail.com', NULL, '$2y$10$gcb5HppSsUcPxtqKQ7138.kFJYLPX8DqF9ER9gR2d0pOStgu036Km', 1, 'default.png', '1080388885', '0536699334', 'بكالوريس', '1992-06-21', 'لايوجد', NULL, '2020-09-27 07:34:03', '2020-09-27 07:34:03'),
(192, 'سماح حسين عبد الله المشدلي', 'samah2017sss@outlook.sa', NULL, '$2y$10$4duVgC9TMD34JNPGeobmCuiIpI2J83NcwaWAH6EfABUh0SnXOehti', 1, 'default.png', '2053803918', '0559632089', 'ثانوي', '1985-08-01', 'لايوجد', NULL, '2020-09-27 07:45:12', '2020-09-27 07:45:12'),
(193, 'وفاء  سليمان مرجي الحربي', 'wafa.suliman1411@gmail.com', NULL, '$2y$10$.Bgv1aMq3vdRlj0HKlT0UeD2ohIWWWUYjTa4QiGDlXVDJKs3ytq6i', 1, 'default.png', '1070400963', '0531518289', 'بكالوريس', '1990-12-02', 'لايوجد', NULL, '2020-09-27 07:48:54', '2020-09-27 07:48:54'),
(194, 'ساره منير المطيري', 'umsattam@gmail.com', NULL, '$2y$10$Ly40v3ywQet9xlo7bim/1e/quB4dbTxgcr1vHHkvfFqtGEr2RxRoy', 1, 'default.png', '1039389109', '0534467449', 'ثانوي', '1975-07-10', 'لايوجد', NULL, '2020-09-27 08:00:10', '2020-09-27 08:00:10'),
(195, 'حصة عبدالله عبدالرحمن العساف', 'hessahalassaf39@hotmail.com', NULL, '$2y$10$KqFlU.iPx2Fmhag2fCpUoeMgSBjGLSg/cmRrhYlO7sYG4CP78qDSu', 1, 'default.png', '1106905795', '0544364395', 'بكالوريس', '2000-02-25', 'لايوجد', NULL, '2020-09-28 05:54:21', '2020-09-28 05:54:21'),
(196, 'نوال عبدالله علي الدريهم', 'shmmr565@gmail.com', NULL, '$2y$10$9Qfn6MZYjujLOX4iA/baeuBz.b9EoCanFgOek3TwxDJKU9ULEMQlq', 1, 'default.png', '1037739115', '0551000565', 'ثانوي', '1985-07-05', 'لايوجد', NULL, '2020-09-28 05:57:21', '2020-09-28 05:57:21'),
(197, 'فاطمة مناحي محمد العجمي', 'fmalajmi622@gmail.com', NULL, '$2y$10$8Yk8yC9YBtwBxCsfJQ7fjelpJa3G3MUYX4AcaCb2p2i8E5fmGDsfi', 1, 'default.png', '1113776494', '0559004070', 'بكالوريس', '2000-10-28', 'لايوجد', NULL, '2020-09-28 06:15:48', '2020-09-28 06:15:48'),
(198, 'رغد ابراهيم عبدالعزيز الصبيح', 'raghd.ibrahim.su@gmail.com', NULL, '$2y$10$VsdADOjmSCkg50KR7/yTjOQFtv6Xyox6qDMeek/A.eodm6GCLrxHO', 1, 'default.png', '1069368692', '0540606588', 'بكالوريس', '1990-12-28', 'لايوجد', NULL, '2020-09-28 06:18:08', '2020-09-28 06:18:08'),
(199, 'ريم محمد عواض المطيري', 'rfr1418@hotmail.com', NULL, '$2y$10$fo5WUw9fRm1GJ.3YZXG8uetXojWa3HSqCx.a03vZ0kl7P4ysXuPTi', 1, 'default.png', '1033699792', '0545499464', 'بكالوريس', '1979-08-31', 'ربو', NULL, '2020-09-28 06:21:30', '2020-09-28 06:21:30'),
(200, 'مريم شداد راجي المطيري', 'mariam-almutairi@outlook.com', NULL, '$2y$10$I2nT.IkDLFX7dh0TcmlCnO8OB71TecXO8cBeihP8Jrix.PBhPCxs2', 1, 'default.png', '1095677967', '0504321703', 'بكالوريس', '1996-07-13', 'لايوجد', NULL, '2020-09-28 06:27:59', '2020-09-28 06:27:59'),
(201, 'هيلة هيثم محمد اليافعي', 'hailaalyafei@gmail.com', NULL, '$2y$10$4kAGYw66K94pxl1AXh/gGuDrDmv/6.f0SQl0xzR0A4/rgQnAZiGDy', 1, 'default.png', '6069093767', '0559058450', 'ثانوي', '1982-12-30', 'لايوجد', NULL, '2020-09-30 07:10:46', '2020-09-30 07:10:46'),
(202, 'مريم محمد مطر الغامدي', 'm100mm200@gmail.com', NULL, '$2y$10$OtvBPAp8pEigKFGPv2KWq.pLKwDjZPoLwLSjeP7EoVyCt.rba9a36', 1, 'default.png', '110538114', '0507058896', 'بكالوريس', '1998-01-24', 'لايوجد', NULL, '2020-09-30 07:13:51', '2020-09-30 07:13:51'),
(203, 'عواطف صالح محمد الجطيلي', 'awatefj16@gmail.com', NULL, '$2y$10$4c4OKxq/Cemck0QkcLauhOkUdsYmm7eASSt093COpdSNwII7ir2ye', 1, 'default.png', '103335866', '0541094443', 'ثانوي', '1975-07-10', 'لايوجد', NULL, '2020-09-30 07:22:05', '2020-09-30 07:22:05'),
(204, 'منيرة علي زين هيج', 'monerh.haij@gmail.com', NULL, '$2y$10$w98SmlDPHZyQvbYpU6MYTu2Wk87M5IbNOT0ygDxINQ7hyaqVh06Pm', 1, 'default.png', '2059036307', '0540242266', 'ثانوي', '1965-07-01', 'لايوجد', NULL, '2020-09-30 07:24:53', '2020-09-30 07:24:53'),
(205, 'الوجد خالد ابراهيم العبيد', 'alwajd.alobaid@gmail.com', NULL, '$2y$10$wi8WvomBpYcgdikC7wHNC.acmafXxKJBKPCuBbrLNcjRYrNvfhelG', 1, 'default.png', '1088634728', '0537878877', 'بكالوريس', '1995-10-09', 'لايوجد', NULL, '2020-09-30 07:28:35', '2020-09-30 07:28:35'),
(206, 'شيخه سعد سليمان العبيد', 'mrmoayad9@gmail.com', NULL, '$2y$10$v8b6infAWRFv7fzr7DCnIegUWZ0mpRI6YzkTBSKYx31ZBleTes2lG', 1, 'default.png', '1045301601', '0555151693', 'بكالوريس', '1970-09-02', 'سكر', NULL, '2020-09-30 07:31:49', '2020-09-30 07:31:49'),
(207, 'الجوهرة عبدالله ناصر السيف', 'lama-almbark@hotmail.com', NULL, '$2y$10$gLp712.OtMhefch5rvY9qe8BV1w5ajifvdeV.0EgLZDM0B6gAr8EK', 1, 'default.png', '1011111111', '0552202082', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:11:00', '2020-10-07 07:11:00'),
(208, 'امل فيصل يونس', 'amalalhaiat321@gmail.com', NULL, '$2y$10$C9LpQY705jw1DI.bbB7JeO.sI1zlCqRNMSIx3.KRObCIXLDpls1ve', 1, 'default.png', '1011111111', '07723934918', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:13:31', '2020-10-07 07:13:31'),
(209, 'أمجاد عبد العزيز العوشن', 'al.amjad101@gmail.com', NULL, '$2y$10$QrG8PrlBUwwFhSEeHEKrteGK1kXX6iZPrwYg9Ga7HsH8Fspj8eX3.', 1, 'default.png', '1011111111', '0552766265', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:15:29', '2020-10-07 07:15:29'),
(210, 'أمل احمد زيد الغملاس', 'amal0502883303@gmail.com', NULL, '$2y$10$UXA.LXNKEcsjyoTkX7DCqeApqwB2lYPl5W2Zq5vU5jZXuGVLgDBWW', 1, 'default.png', '1011111111', '0502883303', 'بكالوريس', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 07:17:19', '2020-10-07 07:17:19'),
(211, 'سارة أحمد عبدالله الهدلق', 'sara.ahmad1416@gmail.com', NULL, '$2y$10$4VdfYg2cKBLIKcQEQ7154uG6F8C1CPtfQ/M5pyDQ4y8TL4JV5KxT.', 1, 'default.png', '1011111111', '0508434375', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:20:38', '2020-10-07 07:20:38'),
(212, 'سميه محمد حسان', 'semaabusin@hotmail.com', NULL, '$2y$10$bx9xKH311sJKs5djkNE13Oo.h8qr.7yjaS1vIlZkJiddB7hdKzbce', 1, 'default.png', '1011111111', '0557589232', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:22:43', '2020-10-07 07:22:43'),
(213, 'شيخة إبراهيم محمد بن حمدان', 'sbinhamdan@gmail.com', NULL, '$2y$10$cfpiJRNBBsZvba8kG4zukucYFE8GpfHXR2Ai5HR9.2pebaoToUThu', 1, 'default.png', '1011111111', '0590087113', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:24:45', '2020-10-07 07:24:45'),
(214, 'عائشة عمر سالم باحطاب', 'asm70asm@gmail.com', NULL, '$2y$10$qKrQkKGAN/3EqUGeza7FueqSh5Nt48Yh13x9M7BP3Byru1e5pOcFS', 1, 'default.png', '1011111111', '0507488726', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:26:15', '2020-10-07 07:26:15'),
(215, 'علياء سيد على الهاشم', 'al-kawthar2009@hotmail.com', NULL, '$2y$10$CmzqhqJKT/DRHlPLOyriDeKCwFPcy0JCGNwEfbvLg2dKGXloYlVIq', 1, 'default.png', '1011111111', '0503920370', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:28:55', '2020-10-07 07:28:55'),
(216, 'فاطمه فهيد متعب السبيعي', 'fhydfatmh2@gmail.com', NULL, '$2y$10$Myb2eQduQaH6fn64RJDHvejONZXzv.iiEzzCbEspjd.ZE1Qi8luTS', 1, 'default.png', '1011111111', '0509114144', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:30:44', '2020-10-07 07:30:44'),
(217, 'فاطمه محمد علي عسيري', 'AaFiafi47@gmail.com', NULL, '$2y$10$0g6tQUBKZUefwLLppaIR..dmE0NpYU5TGtMyIhd7SqCLpAREvWi.2', 1, 'default.png', '1011111111', '0507158281', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:33:11', '2020-10-07 07:33:11'),
(218, 'فايزة محسن محمد المالكي', 'rasha1almalke@gmail.com', NULL, '$2y$10$KIHpNAOfUkvIOLMJss8PtOeqC8auzQG.13ZOgMqK/E3EP9DJR.tNu', 1, 'default.png', '1011111111', '0506692948', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:37:48', '2020-10-07 07:37:48'),
(219, 'فتحية شعب عبد الله البراهيم', 'fatahya_albrahim@icloud.com', NULL, '$2y$10$ygM7cMkvGJLs/CPJI/67BOfhAhbIovOR/ZYj7x3E9KxsjPliiPO/e', 1, 'default.png', '1011111111', '0541353059', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:40:13', '2020-10-07 07:40:13'),
(220, 'لطيفه حمد الضويان', 'Latifahbnthamad@gmail.com', NULL, '$2y$10$ga5kAtSGW9muV0FPscB56OkL39vpvhN7AlANrsat5Zm7ghPKcm3uW', 1, 'default.png', '1011111111', '0565601484', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:41:49', '2020-10-07 07:41:49'),
(221, 'ليلى ناصر عبدالمحسن الزكري', 'lnz1433@gmail.com', NULL, '$2y$10$pScE7w2zcH9.So.Z0mWP0.qZ/x9ygi7xdtmIUcJUy6lRYYWiju6cK', 1, 'default.png', '1011111111', '0558553551', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:44:08', '2020-10-07 07:44:08'),
(222, 'لينا يحيى سعيد الشنتف', 'lena1shantaf@gmail.com', NULL, '$2y$10$5OVYT4vV.O259abYy5gBou3SbWLC0ywKgtD0g7Nxx.gZog8.X1DRS', 1, 'default.png', '1011111111', '0552777055', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:45:58', '2020-10-07 07:45:58'),
(223, 'منى نور احمد المالكي', 'moon23noor@gmail.com', NULL, '$2y$10$7jMY71qc5NkZBh3lkDubwOyf5XW7ntghrncvnHtYBrz7Xf.61HkOW', 1, 'default.png', '1011111111', '0555476651', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:47:59', '2020-10-07 07:47:59'),
(224, 'منيره عبدالله عبدالرحمن الحجاب', 'Mnyrhalhjab@gmail.com', NULL, '$2y$10$Ol.D2FKhmSmWzv4S1wC7F.ms7BLyDMu6PdGiGN6AsptMD8A8Vu0Qi', 1, 'default.png', '1011111111', '0504257126', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 07:49:22', '2020-10-07 07:49:22'),
(225, 'منيره محمد علي الداود', 'memodode3@gmail.com', NULL, '$2y$10$l5v9QGHVW7rN7ZOVZKzxdudsmmg8qu/RBHItZehhe3vfCetukOACi', 1, 'default.png', '1011111111', '0554279791', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 07:51:25', '2020-10-07 07:51:25'),
(226, 'نجاة محمد ضيف الله الغامدي', 'najnaj1000@hotmail.com', NULL, '$2y$10$bjao.FpDfCibV3ymzp72m.jNW.NL2dfbORYl5hSOzofs0rUDL8ywG', 1, 'default.png', '1011111111', '0502034866', 'ماجستير', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 07:53:05', '2020-10-07 07:53:05'),
(227, 'أسماء عبدالعزيز فارس الفارس', 'asallfares@gmail.com', NULL, '$2y$10$XU6YgweUZqYkg0VcD7E5D.jnRnpfMI5XDslZaxv5jRnf1wPbdKnp.', 1, 'default.png', '1011111111', '0505461872', 'ماجستير', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:03:33', '2020-10-07 08:03:33'),
(228, 'أمل احمد زيد الغملاس', 'amla19911411@gmail.com', NULL, '$2y$10$S7SJiJY7DaK5LqLibYfBdO.vUsDxWfAAtpLt2O8XvgfW218VzGXuq', 1, 'default.png', '1011111111', '0502883303', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:05:05', '2020-10-07 08:05:05'),
(229, 'امل سفر مسفر اللقماني', 'alxlx40@gmail.com', NULL, '$2y$10$Dhd/97hZztU/KXyogCHGn.Au0WvoXEaSaMQ0vlRSiDeD1wnsmEFT2', 1, 'default.png', '1011111111', '0532750855', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:07:09', '2020-10-07 08:07:09'),
(230, 'امل محمد عساف الغامدي', 'amahmedb055@gmail.com', NULL, '$2y$10$ansg9lEyREZwX4gPviYNTu3ANs8PrkjdfGtRwHF2PL8dqFrui3E7O', 1, 'default.png', '1011111111', '0554461365', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:08:51', '2020-10-07 08:08:51'),
(231, 'تسنيم حامد يوسف مؤذن', 'tas888811@gmail.com', NULL, '$2y$10$mEa6sKqVjoWyD65xp.x/kepQXZgH82MNKh76km36BZE.wVpOzoC26', 1, 'default.png', '1011111111', '0544706009', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:10:33', '2020-10-07 08:10:33'),
(232, 'جواهر سالم أحمد حسين', 'jwahersa1977m@gmail.com', NULL, '$2y$10$GcSfICZxep0NxEpzqd2/GekeA0jCiBpcKMMGiJECI1m5xHR/Bw6HW', 1, 'default.png', '1011111111', '0503762936', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:12:18', '2020-10-07 08:12:18'),
(233, 'حياة عيسى ابراهيم حكمي', 'hayat2020@gmail.com', NULL, '$2y$10$QzoBsdJKJY/9lP1vMCHgBuvwmG6vgSfI1//fMLWQ46P8MWnXoyr0q', 1, 'default.png', '1011111111', '0504793155', 'بكالوريس', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:14:06', '2020-10-07 08:14:06'),
(234, 'خولة خالد عبدالله الجرجير', 'khwlah34@gmail.com', NULL, '$2y$10$YvZzpaSUQX3jRNktYk2hcu4gHHanl3xWHIryKXEMVJf4NxnTqzVku', 1, 'default.png', '1011111111', '0548393291', 'بكالوريس', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:16:04', '2020-10-07 08:16:04'),
(235, 'رهف إبراهيم المهيدب', 'Rhfalmuhaidib@gmail.com', NULL, '$2y$10$K0cwgOZe3VcXJHGefv7Hb.CbYS9fB1Zy7yhHWS51xSmhG2Ry.DEwO', 1, 'default.png', '1011111111', '0569986529', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:18:22', '2020-10-07 08:18:22'),
(236, 'ريهام ابراهيم عبد القادر البرغوثي', 'way.iman80@gmail.com', NULL, '$2y$10$BVeHyEsUEOvXQuoHrpVFAuBaGoY/YIza/8wdBUdlwLipsdcu2IraW', 1, 'default.png', '1011111111', '972595454861', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:21:22', '2020-10-07 08:21:22'),
(237, 'سارة راشد عبدالله المطرد', 'sarah_r_2311@hotmail.com', NULL, '$2y$10$ePkppTvKcnHRuKureIlLKeySc1VwBDRKoaEZWfmGZXbxyj5DvLV5e', 1, 'default.png', '1011111111', '0553877758', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:23:14', '2020-10-07 08:23:14'),
(238, 'صباح منصور حسين الجبري', 'sabahalgbre@gmail.com', NULL, '$2y$10$l5vBB89tUhl6TkXqQkKWw.vBurhocTYpB1oskHnPQ5XYuCjRmHDna', 1, 'default.png', '1011111111', '0507876510', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:25:19', '2020-10-07 08:25:19'),
(239, 'غيثه مستور صالح العلياني', 'gootygg77@gmail.com', NULL, '$2y$10$5d3R4CW0PrjGL.CCiI0dP.PPeCLLws8qHlzmPdsIuKBXO6khxlnEC', 1, 'default.png', '1011111111', '0503074033', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:30:04', '2020-10-07 08:30:04'),
(240, 'لمى سعد إبراهيم الغصين', 'lumasaad9194@yahoo.com', NULL, '$2y$10$iAnGpUo6JpnQmKXa2VHdz.ucNX.C5mdgRHd7KqvZcypfE8hgnC7uK', 1, 'default.png', '1011111111', '0504461971', 'ثانوي', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:38:51', '2020-10-07 08:38:51'),
(241, 'مريم علي ماطر خبراني', 'seso06no@hotmail.cnm', NULL, '$2y$10$5qOFcby3K8NimAKPvwaqSeeSkwyZf.ns1a376BkICuRlXoqrfHsq2', 1, 'default.png', '1011111111', '0536368814', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:41:31', '2020-10-07 08:41:31'),
(242, 'منى محمد فطيس الغامدي', 'omwaled1995@gmail.com', NULL, '$2y$10$qmL4zU1JiHnrSZ6NiDbdDebFgud8kE.Faug0ut4bR5NUKQaWwmV42', 1, 'default.png', '1011111111', '0505109940', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:43:52', '2020-10-07 08:43:52'),
(243, 'نوال عبدالله محمد الحرقان', 'im506.iw@gmail.com', NULL, '$2y$10$mcJiLOoFCT3B/nu49HFXIe7ptI7XmiyNPP1/e7evaZxNWbWc2Xu02', 1, 'default.png', '1011111111', '0504452579', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:47:37', '2020-10-07 08:47:37'),
(244, 'نورة حمد عبدالله العثمان', 'Noar31044@Gmail.Com', NULL, '$2y$10$HcztCyLDvykAvujrj7fDHeM8r1/I4Q0zOwIoEeAIhbIujAJP6qaX.', 1, 'default.png', '1011111111', '0536886033', 'بكالوريس', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:50:07', '2020-10-07 08:50:07'),
(245, 'نورة خلف الرويضان', 'No.kr2015@gmail.com', NULL, '$2y$10$GHnCZNFVXQFFiRn/IITnreG.V4alC8WSSxowh3QgRYhpfn1XQUDBG', 1, 'default.png', '1011111111', '0509266926', 'ماجستير', '2002-02-02', 'لايوجد', NULL, '2020-10-07 08:53:00', '2020-10-07 08:53:00'),
(246, 'هند عبدالعزيز ابراهيم السعيد', 'has0777@gmail.com', NULL, '$2y$10$us/15BoDUzJwXf.KzISyH./FtNnEhZKaVQWrS45R59snAO6TasMLi', 1, 'default.png', '1011111111', '0504247570', 'بكالوريس', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:54:48', '2020-10-07 08:54:48'),
(247, 'هند عبدالله سعود الحمد', 'zammr26@gmail.com', NULL, '$2y$10$SR2BWUxbDiPy4oHxRBggrem8IctmIMFzFlppL1/jqKQ9jctWN2xK6', 1, 'default.png', '1011111111', '0596623453', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:56:46', '2020-10-07 08:56:46'),
(248, 'هيا معجب بويريد القحطاني', 'Mo7bAtAlr7mAn@hotmAil.Com', NULL, '$2y$10$41agkrlWqZBfSWOZCnq9EetZ9K6JjApRrAQd8sKb3lgt1yCuta1tu', 1, 'default.png', '1011111111', '0502006093', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 08:58:41', '2020-10-07 08:58:41'),
(249, 'أشواق خميس سعيد بايعشوت', 'ashwaqkhmys400011@gmail.com', NULL, '$2y$10$eAf5ckw/POcn34li0M3ZV.gq.oX.ieF08eaNtcan85L0f/5UV4UiS', 1, 'default.png', '1011111111', '0559233898', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 09:00:34', '2020-10-07 09:00:34'),
(250, 'رباب علي محمد جعفر', 'rabab.282.ali@gmail.com', NULL, '$2y$10$VYROE4ucoUYeURH8hPnIP.MYE8F3rt/SvBmh7P9tFZA.CbSleybcm', 1, 'default.png', '1011111111', '0550977828', 'ثانوي', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 09:02:12', '2020-10-07 09:02:12'),
(251, 'رقية عبدالعزيز عبدالله الشميمري', 'Meme1408gogo@gamil.com', NULL, '$2y$10$8dSly7i6xbydoPQ9E5DwIu6EHEMRQRtm9ujSgiyXF3rhhpUpTj0Hu', 1, 'default.png', '1011111111', '0554444892', 'دبلوم', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 09:04:15', '2020-10-07 09:04:15'),
(252, 'جواهر حسين عبدالرحمن العويفير', 'j.s.m.l.a2010@gmail.com', NULL, '$2y$10$ZUBKBAXu05XJ3PTbRtXoPugFM1xY5VSUNuBfNur3SmOsl0CjA7ODe', 1, 'default.png', '1011111111', '0504260851', 'بكالوريس', '2002-02-02', 'لا يوجد', NULL, '2020-10-07 09:06:04', '2020-10-07 09:06:04'),
(253, 'الجوهرة غانم السلمي', 'aljwharah-77@hotmail.com', NULL, '$2y$10$.LFXDV1.jVHH5utcv.TspuHwcvmK2UjnLp38pYANRXf2qyhebQw56', 1, 'default.png', '1011111111', '0557596261', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:10:51', '2020-10-12 07:10:51'),
(254, 'إيمان أحمد النبوى جاد', 'umasim507@gmail.com', NULL, '$2y$10$gKiJ8./l7IfH4Wh5sg1oV.FNk3azPZAB4FsnzIddvZjXwDFDqtmcK', 1, 'default.png', '1011111111', '0545304496', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:13:13', '2020-10-12 07:13:13'),
(255, 'أبرار عبدالرحمن عبدالله الدحيم', 'Abrar111@windowslive.com', NULL, '$2y$10$fsA/.14cX4DvOq4zHrLxJuey/bUI3bDemLIYDHWbVHZV7TDsbR4JC', 1, 'default.png', '1011111111', '0533700909', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:14:22', '2020-10-12 07:14:22'),
(256, 'جيجي فاطمة تاتارات غفور', 'fathy.fathyia@gmail.com', NULL, '$2y$10$Uo0JgsmKxmdUkb3TMcYBOuc17dBZVV40yG.BtdGFdEjIRXPYYZYvK', 1, 'default.png', '1011111111', '0571477318', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:15:57', '2020-10-12 07:15:57'),
(257, 'روان عبدالله محمد العيسى', 'Rawanz.ra@gmail.com', NULL, '$2y$10$23L1M.z5X0WYPFfG6VdXHO7Gt/6Xe5cLN2sUKwfsDDQncFjiCqA0a', 1, 'default.png', '1011111111', '0558047500', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:18:52', '2020-10-12 07:18:52'),
(258, 'ريم محمد عبدالله الرويتع', 'alreemana@gmail.com', NULL, '$2y$10$J6yAvitrM9/2mTdh2gzC4eviBxxDxNUf8Hzxb6WE1ppa/YOMYCXba', 1, 'default.png', '1011111111', '0504104338', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:20:23', '2020-10-12 07:20:23'),
(259, 'زين علي عبدالرحيم قاضي', 'z_kadi@hotmail.com', NULL, '$2y$10$ehRbWoWVNoY16.efFcqfQe6iHep5Fkf.EBCuXhod.yYPaCyUgpSOq', 1, 'default.png', '1011111111', '0505470168', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:21:46', '2020-10-12 07:21:46'),
(260, 'سارة رمضان محمد أبوزيد', 'saaraa4u1@gmail.com', NULL, '$2y$10$56xmD3PAUvm8V2gNEgiQYuHBuVF5ZR6NcNh2g/ZUvVxoOWlTdIgPy', 1, 'default.png', '1011111111', '00201010706339', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:23:40', '2020-10-12 07:23:40'),
(261, 'ساره محمد أيمن جعلوك', 'bentalsoltana@gmail.com', NULL, '$2y$10$oybeajew5pLZDWo.nanDu.M6SrLyCZ4V32esTZdJS4nGfajDxm8De', 1, 'default.png', '1011111111', '0581384941', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:25:01', '2020-10-12 07:25:01'),
(262, 'عائشة حمد عبدالرحمن المزروع', 'ishahalmazroa@gmail.com', NULL, '$2y$10$xD9xAVhpxixB1SMenpUpxuWB7xwVrawKDnRrOIpKrRiIVwiaNnKcO', 1, 'default.png', '1011111111', '0541677802', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:27:13', '2020-10-12 07:27:13'),
(263, 'عبير محمد ابراهيم الغفيلي', 'abcabeer1@gmail.com', NULL, '$2y$10$a0pdDBbx5Bd4CBATls.1EeGnOoSJn.ylI8DelJPHzgPYza7VmxDT2', 1, 'default.png', '1011111111', '0553045381', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:29:14', '2020-10-12 07:29:14'),
(264, 'عتيقه أحمد يحيى القاضي', 'ma7atalqadi@gmail.com', NULL, '$2y$10$6IF4a3Rc04f6oZmyuyH0bOsxyj3XmOaIXnqKiJY6bmLNxtlX.HzlO', 1, 'default.png', '1011111111', '0505255815', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:30:48', '2020-10-12 07:30:48'),
(265, 'غزوى الشيباني', 'Zooz_b2014@hotmail.com', NULL, '$2y$10$B44XcNyXmdszzYc4.HJSweT9MH9i8b8YAeV08Ut2QCkspqHd5OG7K', 1, 'default.png', '1011111111', '0507857169', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:33:17', '2020-10-12 07:33:17'),
(266, 'فاطمة عبد العزيز عبد الرحمن شعبان', 'saraashqar@gmail.com', NULL, '$2y$10$nxHXp96qXG7Cq4URQjHgEevwrpnmupGHYnhmk3lVDoipv.2VNUVFG', 1, 'default.png', '1011111111', '0501584295', 'ماجستير', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:35:00', '2020-10-12 07:35:00'),
(267, 'فوزيه عبدالله خلف المرشود', 'foz.aa.m@gmail.com', NULL, '$2y$10$858jUaVQPC6NqkR5hi8vOOcqWO7H5e2.ldTLY8K0U3FYF5Hqyv2.i', 1, 'default.png', '1011111111', '0555451863', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:36:40', '2020-10-12 07:36:40'),
(268, 'قمر توفيق سليمان الجوجه', 'soltanahqamar@gmail.com', NULL, '$2y$10$EBpRXXKFCGJ7SR8H0HsQcesBduqpy1ungB9geXWI1XRFXGOb50d5W', 1, 'default.png', '1011111111', '0538747265', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:38:31', '2020-10-12 07:38:31'),
(269, 'مشاعل عبدالله سعد البواردي', 'masb@hotmail.com', NULL, '$2y$10$i6d2qU6Kk6Ui3xQFqyG0fOD7AP8if3PzUTmpimrU5F/8HbzaQP.tG', 1, 'default.png', '1011111111', '0544238544', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:40:17', '2020-10-12 07:40:17'),
(270, 'منال محمد عبدالعزيز الزيدان', 'mnola-28@hotmail.com', NULL, '$2y$10$EA.n20kxkzMKz35fqFr39u32MQYjfsmD9yYLzXl2robTFxXYSoU2S', 1, 'default.png', '1011111111', '0556437439', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:42:00', '2020-10-12 07:42:00'),
(271, 'مها محمد عبدالعزيز السليمان', 'klegh.12@gmail.com', NULL, '$2y$10$NJ.K.RXhsDsRp/b4Y8gTFeQ0ClCdi5T3eXs6QxGsnXOEYykEpBEwy', 1, 'default.png', '1011111111', '0503156965', 'ماجستير', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:44:09', '2020-10-12 07:44:09'),
(272, 'مها عبدالرحمن محمد المنصور', 'almaha55777@gmail.com', NULL, '$2y$10$GibPX2NPfIcbqJaGYrhG/OBdZoLmDczEAAvSZQt2heaUfqUcQCvbC', 1, 'default.png', '1011111111', '0504140734', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:45:59', '2020-10-12 07:45:59'),
(273, 'نورة موسى صالح الجيّد', 'nawarh57@gmail.com', NULL, '$2y$10$.EhKR78/QYWhpm8H36U2YOtFdcEnJWI6HMRc4gIXjbxhavhTPFgzK', 1, 'default.png', '1011111111', '0592289144', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:47:47', '2020-10-12 07:47:47'),
(274, 'نورة محمد عبدالرحمن العنقري', 'nouraalangeri@gmail.com', NULL, '$2y$10$msGVvt5GT8F2BVFH4yskfOyEBSW3IXwQRkh3U65eUwoMo1.6BQJPO', 1, 'default.png', '1011111111', '0532141955', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:50:40', '2020-10-12 07:50:40'),
(275, 'هاجر إبراهيم آل عبيد', 'jojey1999@hotmail.com', NULL, '$2y$10$gJdbEcgdzX73JhHV6AtfYunyGPQLbMxl/xfxl1ZQVQ/fnn1.ABvEy', 1, 'default.png', '1011111111', '0509790908', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:52:16', '2020-10-12 07:52:16'),
(276, 'هلا بدر محمد الشلوي', 'HalaBm12@gmail.com', NULL, '$2y$10$xkW9tOPHO0PrpoqZIbOeq.Hw2XBJzl5Ywoc7FnnzENCM.GHfIMQxS', 1, 'default.png', '1011111111', '0506547499', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 07:54:02', '2020-10-12 07:54:02'),
(277, 'ايناس نزار عبدالرحمن العمر', 'nzaralomarenas@gmail.com', NULL, '$2y$10$8bdS36FYSiny/N.VNhqMyuq.fVtspBezfEsU7uDVKVW/LnsycdGyy', 1, 'default.png', '1011111111', '0952439361', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:07:55', '2020-10-12 08:07:55'),
(278, 'تهاني غازي علي العصيمي', 'tahanialosaimi15@gmail.com', NULL, '$2y$10$/1JKRz18B.qdKSbmWfND9.lk18tm78Ez3H8PJFYwdXHiahu1hWdNG', 1, 'default.png', '1011111111', '0554180008', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:09:58', '2020-10-12 08:09:58'),
(279, 'خولة عبدالله عيسى والد', 'pinkangel1430@hotmail.com', NULL, '$2y$10$BOjj1c6R0NhSIwP0n3KdUumk81NHA5beReUyES594orh5u5ia76QS', 1, 'default.png', '1011111111', '0508748321', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:11:36', '2020-10-12 08:11:36'),
(280, 'فاتن عبدالله فهد العيسى', 'fatenaleisa00@gmail.com', NULL, '$2y$10$t4Uwu5w0ze.NZASZu/1ZxOwQ3Ns2UzkxiWir8XesIVA/FPNLXCJM2', 1, 'default.png', '1011111111', '0555710048', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:14:12', '2020-10-12 08:14:12'),
(281, 'لطيفه أحمد عبدالله العبدالله', 'zahera9090@gmail.com', NULL, '$2y$10$FUEYZMfmhyaQgnq36fka0OD4jAQUQ4BPzIaKYfh66bl.mtecPOVXO', 1, 'default.png', '1011111111', '0502077855', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:15:59', '2020-10-12 08:15:59'),
(282, 'لولوه عبدالله عبدالرحمن المصبح', 'star.girlss749@gmail.com', NULL, '$2y$10$1ORvjG.tzh4m6/hZo1ZUUu09Udlat3cefYVWz6rxWpO7o.CpI1Acm', 1, 'default.png', '1011111111', '0500100490', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:17:17', '2020-10-12 08:17:17'),
(283, 'لينة أحمد يوسف اليوسف', 'leeenah6@gmailm.com', NULL, '$2y$10$uWnDBXz9tOug2R9mJaCzce5hlvsTCXCp5kE5XQHJI/1i0xaWHSzsC', 1, 'default.png', '1011111111', '0555007382', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:19:07', '2020-10-12 08:19:07'),
(284, 'هند يحيى هادي عسكر', 'mghol025@gmail.com', NULL, '$2y$10$S8NQH9eIcdy2vVCc5b4gcea5kY.Re.VokRV.saBfzLFnYH28k8faS', 1, 'default.png', '1011111111', '0554267124', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 08:20:30', '2020-10-12 08:20:30'),
(285, 'عهد ماجد محمد الماجد', 'ahadmajed9@gmail.com', NULL, '$2y$10$Lbgv4nDjVEwx8x7hqe.xpONJDsI9/U38jZ9TQPCSHsUy3roOwMTue', 1, 'default.png', '1011111111', '0547245452', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:01:55', '2020-10-12 14:01:55'),
(286, 'غيداء ماجد محمد الماجد', 'gmajed09@gmail.com', NULL, '$2y$10$WUBVs8p.Mdv27CHu66DpkeKJ7G/FVOVcUGADKiFGdvh7BQzUaH2Y6', 1, 'default.png', '1011111111', '0547245451', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:03:25', '2020-10-12 14:03:25'),
(287, 'هند محمد عبدالله الطويل', 'Hendm1433@gmail.com', NULL, '$2y$10$r6DhBkYrTQxGS67sIHksYuwP61SJ4nDyz8WDUCnmdbSmoqFRfEmsu', 1, 'default.png', '1011111111', '0553075701', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:05:29', '2020-10-12 14:05:29'),
(288, 'وفاء نواف صالح الزير', 'F.n.z66@hotmail.com', NULL, '$2y$10$47SxPYo/3sGOhF2X5d7YveQoxUhBv1dmThmen9m0DSJBbzyUJkGlW', 1, 'default.png', '1011111111', '0530783754', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:06:47', '2020-10-12 14:06:47'),
(289, 'شيماء عطاالله نور الإسلام', 'shymanoor-361@hotmail.com', NULL, '$2y$10$gXAumuriq/jDIXHJRmw8EuGBtWMFCisnyOVKOsiNdtoHdojD8GEhe', 1, 'default.png', '1011111111', '0535757615', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:08:13', '2020-10-12 14:08:13'),
(290, 'أروى إبراهيم عبدالله العثمان', 'arew2009@hotmail.com', NULL, '$2y$10$e/mHhKvXyUOI6naOwigmpOvcY0E5PGdgYZ3IMqkJen5tzSzee5dE.', 1, 'default.png', '101111111', '0535335317', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:13:39', '2020-10-12 14:13:39'),
(291, 'أسماء حمد محمد الربيعة', 'asmahamd414@gmail.com', NULL, '$2y$10$MFehVgAz0GRx1yOQSp1aLezyLvtQ5azmdbE496UcSotqxKdfLdz4.', 1, 'default.png', '1011111111', '0506226096', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:15:19', '2020-10-12 14:15:19'),
(292, 'أمل علي درعان الدرعان', 'Amlaldraan97@gmail.com', NULL, '$2y$10$H9uidx6u/pmQfZznJC26Ke0S4FTaq.KQSPzNbwgdIcuQtX3ZmPWX6', 1, 'default.png', '1011111111', '0538567885', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:17:17', '2020-10-12 14:17:17');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `image`, `National_ID`, `phone`, `years`, `date`, `note`, `remember_token`, `created_at`, `updated_at`) VALUES
(293, 'حنان وفيق مصطفى عرنوس', 'heno993320@gmail.com', NULL, '$2y$10$zqTHidhLFrquBxJGRhSRR.46CIN.U1Eix/6HVEINlNF90iE9Ly6SC', 1, 'default.png', '1011111111', '0599018700', 'ثانوي', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:18:58', '2020-10-12 14:18:58'),
(294, 'عبير عايد فهيد العنزي', 'aa29aa7aa1408@gmail.com', NULL, '$2y$10$M7QAwb6E9Yr06.0pgYQqE.4zob6/GTklyXZO1oBduK2AK1D2T0N6a', 1, 'default.png', '1011111111', '0534901149', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:20:06', '2020-10-12 14:20:06'),
(295, 'عهود هذال وصل القحطاني', 'aohoood430001333@hotmail.com', NULL, '$2y$10$.1qqm0AmfuDU7tBsLFQYrusbMB18mFYDtdHCtdSxzpnlbxKRQHqCO', 1, 'default.png', '1011111111', '0502482332', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:27:54', '2020-10-12 14:27:54'),
(296, 'فاطمة صالح عبدالله السحيباني', 'ftm4444@hotmail.com', NULL, '$2y$10$vXWxdR8qkV.jLfEQhNOny.5vGUN9DZQ8KFJinwEL0VCKm.TNc5mfy', 1, 'default.png', '101111111', '0555146421', 'بكالوريس', '2002-02-20', 'لايوجد', NULL, '2020-10-12 14:29:32', '2020-10-12 14:29:32'),
(297, 'اسماء ناصر محمد الرشيد', 'asma990018@gmail.com', NULL, '$2y$10$xjKs5DAPgLu//MCN1H0jquF99T7JCOno.SkdlzNDi93NGLL4d1W9q', 2, 'default.png', '1003010889', '0505447355', 'بكالوريس', '1973-02-23', 'لايوجد', NULL, '2020-10-18 05:15:59', '2020-10-18 05:15:59'),
(298, 'اروى عبدالعزيز السويلم', 'arwaalswilem@gmail.com', NULL, '$2y$10$MbF6AAYvJyDAYPonSvroY.sz/uDD4IZvq1yi4Co.CLQgXlAxVuqA2', 2, 'default.png', '1062622301', '0554003100', 'بكالوريس', '1989-07-26', 'لايوجد', NULL, '2020-10-18 05:20:41', '2020-10-18 05:20:41'),
(299, 'اسماء حمد محمد الربيعة', 'asmahamd.414@gmail.com', NULL, '$2y$10$.nk8u8MQ9sDEG2J36SbiNeqa9LA40w7RiOcIiIiYKiFqAu5k0xKl6', 2, 'default.png', '1028777199', '0506226096', 'دبلوم', '2020-02-20', 'الايميل اضفت نقطة لاكتمال التسجيل الايميل الاصلي asmahamd414@gmail.com', NULL, '2020-10-18 05:38:58', '2020-10-18 05:38:58'),
(300, 'آمال عبدالعظيم عبدالحميد الخطيب', 'a.alkhateeb@windowslive.com', NULL, '$2y$10$142Dtg8A8eN2XXpDFV9Ufed184qVski2l7VujcL3FalEQpKSSMpsC', 2, 'default.png', '2033524592', '0503464510', 'بكالوريس', '1969-06-14', 'لايوجد', NULL, '2020-10-18 05:44:26', '2020-10-18 05:44:26'),
(301, 'دارين ناصر احمد الجبر', 'd.n.a.j@hotmail.com', NULL, '$2y$10$TtrztHwT2tztlyBERlCRJuAvmjTTiwO62iRir.LjUtlRoVUSf488.', 2, 'default.png', '1038509558', '0547271231', 'بكالوريس', '1983-04-01', 'لايوجد', NULL, '2020-10-18 05:50:09', '2020-10-18 05:50:09'),
(302, 'حصة عبدالله عبدالرحمن الفنتوخ', 'hessa1440@gmail.com', NULL, '$2y$10$/UV43DL6ICci1mrcAJ8vlu0ei875y6pV3zF1CtUhyGDCpYSY8qDCq', 2, 'default.png', '1047023401', '0556252595', 'دبلوم', '1965-10-26', 'لايوجد', NULL, '2020-10-18 05:57:00', '2020-10-18 06:29:58'),
(303, 'لولوة عبدالرحمن حمد التميمي', 'alburhan1435@gmail.com', NULL, '$2y$10$YRSVYstTRH1Xv91iMaiHn.zbQn7yyOD5vjvAVF3QCKvw5hxLPWsHu', 2, 'default.png', '1036762365', '0503271685', 'بكالوريس', '1971-10-17', 'لايوجد', NULL, '2020-10-18 06:01:52', '2020-10-18 06:01:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absents`
--
ALTER TABLE `absents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absents_user_id_foreign` (`user_id`);

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisments_programme_id_foreign` (`programme_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_subject_id_foreign` (`subject_id`),
  ADD KEY `assignments_section_id_foreign` (`section_id`),
  ADD KEY `assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `assignment_user`
--
ALTER TABLE `assignment_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_user_assignment_id_foreign` (`assignment_id`),
  ADD KEY `assignment_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choices_question_id_foreign` (`question_id`);

--
-- Indexes for table `collection_times`
--
ALTER TABLE `collection_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`);

--
-- Indexes for table `employment_requests`
--
ALTER TABLE `employment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_subject_id_foreign` (`subject_id`),
  ADD KEY `exams_section_id_foreign` (`section_id`),
  ADD KEY `exams_user_id_foreign` (`user_id`);

--
-- Indexes for table `exam_user`
--
ALTER TABLE `exam_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_exam_user_id_foreign` (`user_id`),
  ADD KEY `student_exam_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_user_id_foreign` (`user_id`),
  ADD KEY `grades_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_subject_id_foreign` (`subject_id`),
  ADD KEY `schedules_collection_time_id_foreign` (`collection_time_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_rakam_akdemi_unique` (`rakam_akdemi`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_exam_answers`
--
ALTER TABLE `student_exam_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_exam_answers_exam_id_foreign` (`exam_id`),
  ADD KEY `student_exam_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_user_id_foreign` (`user_id`),
  ADD KEY `subjects_sana_drsia_id_foreign` (`sana_drsia_id`),
  ADD KEY `subjects_section_id_foreign` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absents`
--
ALTER TABLE `absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `assignment_user`
--
ALTER TABLE `assignment_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_times`
--
ALTER TABLE `collection_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `employment_requests`
--
ALTER TABLE `employment_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_user`
--
ALTER TABLE `exam_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `student_exam_answers`
--
ALTER TABLE `student_exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absents`
--
ALTER TABLE `absents`
  ADD CONSTRAINT `absents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD CONSTRAINT `advertisments_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignment_user`
--
ALTER TABLE `assignment_user`
  ADD CONSTRAINT `assignment_user_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_user`
--
ALTER TABLE `exam_user`
  ADD CONSTRAINT `student_exam_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_exam_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_collection_time_id_foreign` FOREIGN KEY (`collection_time_id`) REFERENCES `collection_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_exam_answers`
--
ALTER TABLE `student_exam_answers`
  ADD CONSTRAINT `student_exam_answers_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_exam_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_sana_drsia_id_foreign` FOREIGN KEY (`sana_drsia_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
