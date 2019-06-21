-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22 يونيو 2019 الساعة 01:05
-- إصدار الخادم: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uohb_q`
--

-- --------------------------------------------------------

--
-- بنية الجدول `date`
--

CREATE TABLE `date` (
  `id_da` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `depart`
--

CREATE TABLE `depart` (
  `depart_id` int(11) NOT NULL,
  `depart_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `depart`
--

INSERT INTO `depart` (`depart_id`, `depart_name`) VALUES
(1, 'القبول '),
(2, 'الخريجين ');

-- --------------------------------------------------------

--
-- بنية الجدول `info`
--

CREATE TABLE `info` (
  `user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `depart` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `info`
--

INSERT INTO `info` (`user`, `name`, `depart`, `phone`) VALUES
('abdxax', 'Abdulrahman', 2, 222222),
('xxx', 'ali', 1, 2222);

-- --------------------------------------------------------

--
-- بنية الجدول `mainproblem`
--

CREATE TABLE `mainproblem` (
  `id_min` int(11) NOT NULL,
  `problem` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `prob_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `problemdes`
--

CREATE TABLE `problemdes` (
  `id_prob` int(11) NOT NULL,
  `id_stus` int(11) NOT NULL,
  `depart` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contact_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_order` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_answer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `is_attach` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `problemdes`
--

INSERT INTO `problemdes` (`id_prob`, `id_stus`, `depart`, `title`, `des`, `answer`, `status`, `create_at`, `answer_at`, `contact_at`, `user_order`, `user_contact`, `user_answer`, `is_attach`) VALUES
(8, 1, 2, 'jjjjj', 'uuuuu', '', 'yy', '2019-06-19 15:50:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', ''),
(12, 4, 1, 'uuuu', 'IIIII', '', 'new', '2019-06-19 05:58:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'on'),
(13, 5, 1, 'TEST REQ', 'TEST THE SYSTEN ', '', 'new', '2019-06-19 06:00:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'on'),
(14, 4, 1, 'ccc', 'jii', '', 'new', '2019-06-19 06:11:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'لا يوجد مرفاقات '),
(15, 4, 1, 'uuuu', 'jjjj', '', 'new', '2019-06-19 06:11:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'لا يوجد مرفاقات '),
(16, 4, 2, 'TEST REQ', 'iiiii', 'Asnwer the ques', 'contact', '2019-06-21 22:43:59', '2019-06-21 04:02:51', '2019-06-22 12:43:59', 'xxx', 'xxx', 'abdxax', 'يوجد مرفاقات '),
(17, 4, 1, 'uuuu', 'www', '', 'new', '2019-06-19 06:33:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'يوجد مرفاقات '),
(18, 4, 1, 'TEST REQ', 'mm', '', 'new', '2019-06-19 06:57:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'لا يوجد مرفاقات '),
(19, 4, 1, 'عدم القبول ', 'نسبه كويسه ', '', 'new', '2019-06-21 04:05:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'لا يوجد مرفاقات '),
(20, 4, 2, 'Test sss', 'ssssa', '', 'new', '2019-06-22 12:50:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'يوجد مرفاقات '),
(21, 4, 1, 'sss', 'ssssss', '', 'new', '2019-06-22 12:51:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xxx', '', '', 'لا يوجد مرفاقات ');

-- --------------------------------------------------------

--
-- بنية الجدول `problems`
--

CREATE TABLE `problems` (
  `id_stu` int(11) NOT NULL,
  `id_uohb` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_gov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `problems`
--

INSERT INTO `problems` (`id_stu`, `id_uohb`, `id_gov`, `name`, `phone`, `create_at`) VALUES
(1, '2212', '323', 'bbb', '44444444', '2019-06-14 22:55:39'),
(4, '', '', 'bader', '3333332', '2019-06-14 12:57:12'),
(5, '9999', '888', 'kkkk', '99', '2019-06-18 21:14:54');

-- --------------------------------------------------------

--
-- بنية الجدول `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'user'),
(2, 'head'),
(3, 'admin'),
(4, 'dean');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`username`, `password`, `id_rol`) VALUES
('abdxax', '12345', 2),
('xxx', 'xxx', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id_da`),
  ADD KEY `dep` (`dep`);

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`user`),
  ADD KEY `depart` (`depart`);

--
-- Indexes for table `mainproblem`
--
ALTER TABLE `mainproblem`
  ADD PRIMARY KEY (`id_min`),
  ADD KEY `prob_dep` (`prob_dep`);

--
-- Indexes for table `problemdes`
--
ALTER TABLE `problemdes`
  ADD PRIMARY KEY (`id_prob`),
  ADD KEY `id_stus` (`id_stus`),
  ADD KEY `depart` (`depart`),
  ADD KEY `user_order` (`user_order`),
  ADD KEY `user_contact` (`user_contact`),
  ADD KEY `user_answer` (`user_answer`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id_stu`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depart`
--
ALTER TABLE `depart`
  MODIFY `depart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mainproblem`
--
ALTER TABLE `mainproblem`
  MODIFY `id_min` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problemdes`
--
ALTER TABLE `problemdes`
  MODIFY `id_prob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id_stu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `date_ibfk_1` FOREIGN KEY (`dep`) REFERENCES `depart` (`depart_id`);

--
-- القيود للجدول `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `depart` (`depart_id`);

--
-- القيود للجدول `problemdes`
--
ALTER TABLE `problemdes`
  ADD CONSTRAINT `problemdes_ibfk_1` FOREIGN KEY (`id_stus`) REFERENCES `problems` (`id_stu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `problemdes_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `depart` (`depart_id`) ON UPDATE CASCADE;

--
-- القيود للجدول `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
