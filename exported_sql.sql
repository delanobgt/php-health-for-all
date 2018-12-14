-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2018 at 05:06 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `healthforall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'The Only Admin', '2018-12-10 22:47:54', '2018-12-10 22:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `posted_by` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `content`, `discussion_id`, `posted_by`, `created_at`, `updated_at`) VALUES
(1, 'beli obat cacing dong!\r\n', 1, 'edwin@gmail.com', '2018-12-11 04:28:39', '2018-12-11 04:28:39'),
(2, 'kamu kurang aqua', 2, 'query@gmail.com', '2018-12-11 04:47:55', '2018-12-11 04:47:55'),
(3, 'pegang batu aja bang', 2, 'query@gmail.com', '2018-12-11 04:48:37', '2018-12-11 04:48:37'),
(4, 'jangan suka makan sembarangan', 1, 'erwin@gmail.com', '2018-12-13 22:39:02', '2018-12-13 22:39:02'),
(5, 'apa jenis kankernya?', 3, 'doctor@gmail.com', '2018-12-13 23:38:31', '2018-12-13 23:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `symptom` varchar(256) NOT NULL,
  `info` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `patient_id`, `timestamp`, `approved`, `symptom`, `info`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-12-18 17:12:00', 1, 'cacingan', 'okay datang aja', '2018-12-11 04:26:13', '2018-12-11 04:26:57'),
(6, 1, 1, '2018-12-14 17:00:00', 0, 'cancer akut', NULL, '2018-12-13 23:03:48', '2018-12-13 23:03:48'),
(14, 7, 6, '2018-12-17 05:00:00', 1, 'symptom A', 'approve lagi', '2018-12-13 23:39:31', '2018-12-14 00:27:01'),
(15, 7, 6, '2018-12-18 05:00:00', 0, 'symptom B', NULL, '2018-12-13 23:39:39', '2018-12-13 23:39:39'),
(17, 7, 6, '2018-12-16 05:00:00', 1, 'symptom C', 'saya approve deh', '2018-12-13 23:40:02', '2018-12-14 00:26:47'),
(18, 1, 1, '2018-12-15 06:00:00', 0, 'W', NULL, '2018-12-14 00:25:23', '2018-12-14 00:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `posted_by` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `answer_id`, `posted_by`, `created_at`, `updated_at`) VALUES
(1, 'iya juga ya', 1, 'edwin@gmail.com', '2018-12-11 04:31:06', '2018-12-11 04:31:06'),
(2, 'mereknya apa dok', 1, 'edwin@gmail.com', '2018-12-11 04:34:38', '2018-12-11 04:34:38'),
(3, 'makasih bang', 2, 'query@gmail.com', '2018-12-11 04:48:03', '2018-12-11 04:48:03'),
(4, 'ngaco kamu ', 2, 'query@gmail.com', '2018-12-11 04:48:21', '2018-12-11 04:48:21'),
(5, 'hallosaya dokter', 2, 'irvin@gmail.com', '2018-12-11 04:50:28', '2018-12-11 04:50:28'),
(6, 'jangan suka jajan di pinggir jalan', 4, 'erwin@gmail.com', '2018-12-13 22:39:12', '2018-12-13 22:39:12'),
(7, 'okeeeeeeeee', 3, 'query@gmail.com', '2018-12-13 22:40:20', '2018-12-13 22:40:20'),
(8, 'saya admin', 4, 'admin@admin.com', '2018-12-13 23:32:14', '2018-12-13 23:32:14'),
(9, 'coba jawab dulu, baru bisa saya bantu', 5, 'doctor@gmail.com', '2018-12-13 23:38:42', '2018-12-13 23:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `posted_by` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `title`, `description`, `posted_by`, `created_at`, `updated_at`) VALUES
(1, 'Cacingan', 'saya cacingan, dok!', 'irvin@gmail.com', '2018-12-11 04:27:59', '2018-12-11 04:27:59'),
(2, 'cacingan lagi dok', 'sakit perut ga habis', 'query@gmail.com', '2018-12-11 04:47:30', '2018-12-11 04:47:30'),
(3, 'Cancer Akut', 'cancer yang sangat akut sekali', 'admin@admin.com', '2018-12-13 23:30:54', '2018-12-13 23:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `specialist` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `description` varchar(256) DEFAULT '''''',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `age`, `specialist`, `gender`, `description`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'William', 19, 'Cancer', 'M', '\'\'', 1, '2018-12-11 04:17:17', '2018-12-13 23:34:06'),
(2, 'Irvin Delano', 19, 'Heart', 'M', '\'\'saya ganteng', 1, '2018-12-11 04:19:06', '2018-12-13 23:34:07'),
(3, 'Jonet', 19, 'Patologist', 'M', '\'\'', 1, '2018-12-11 04:19:57', '2018-12-14 00:29:01'),
(5, 'Erlina', 90, 'Patologist', 'F', '\'\'', 1, '2018-12-13 22:22:07', '2018-12-13 23:34:10'),
(7, 'Doctor', 90, 'No specialist', 'F', 'asd\r\n', 1, '2018-12-13 23:37:21', '2018-12-13 23:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `gender`, `ban`, `created_at`, `updated_at`) VALUES
(1, 'Erwin', 19, 'M', 0, '2018-12-11 04:24:42', '2018-12-13 23:34:19'),
(2, 'Edwin', 19, 'M', 0, '2018-12-11 04:25:06', '2018-12-13 23:34:50'),
(3, 'Hardyas', 19, 'M', 0, '2018-12-11 04:25:25', '2018-12-13 23:34:23'),
(5, 'Query', 90, 'M', 0, '2018-12-13 22:40:05', '2018-12-14 00:29:05'),
(6, 'patient', 90, 'M', 0, '2018-12-13 23:36:58', '2018-12-13 23:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('doctor','patient','admin') NOT NULL,
  `detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `role`, `detail_id`) VALUES
('admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1),
('doctor@gmail.com', '1f0160076c9f42a157f0a8f0dcc68e02ff69045b', 'doctor', 7),
('edwin@gmail.com', '3c7a591985b5e780ebcc40916fdeb443b8541c2a', 'patient', 2),
('erlina@gmail.com', '0fb92f51e14489b1cad544ed31f1acab14b48354', 'doctor', 5),
('erwin@gmail.com', '0c2a6e12a3ee3123563f88831cd6d692c33fb195', 'patient', 1),
('hardy@gmail.com', '44d4965a812933b10b69b364b6683ae640a9fbc9', 'patient', 3),
('irvin@gmail.com', '6327ce8c64e29e84c4a351f3f8168a875269c69f', 'doctor', 2),
('jonet@gmail.com', 'e5f4c7594a077f37fa56af07d4ec323de367c7cf', 'doctor', 3),
('patient@gmail.com', 'b1b0b8de8a6228f6501c0560365d3a7d74ffcd8e', 'patient', 6),
('query@gmail.com', '7cd9148ec5a552dbf68de5a6debcf8e4d974db72', 'patient', 5),
('william@gmail.com', 'c824fe0afe16857dd6f587aa7c4044d2642d60fb', 'doctor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;