-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 11:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwebtabelgrafik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kejadian`
--

CREATE TABLE `kejadian` (
  `KJD_ID` int(11) NOT NULL,
  `KJD_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `KJD_OF` datetime NOT NULL DEFAULT current_timestamp(),
  `KJD_ACT` varchar(256) DEFAULT NULL,
  `KJD_DIS` varchar(256) DEFAULT NULL,
  `R_ID_KJD` int(11) NOT NULL,
  `USR_ID_KJD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kejadian`
--

INSERT INTO `kejadian` (`KJD_ID`, `KJD_ON`, `KJD_OF`, `KJD_ACT`, `KJD_DIS`, `R_ID_KJD`, `USR_ID_KJD`) VALUES
(1, '2021-11-01 07:07:46', '2021-11-01 04:07:46', 'Paradista', 'Pramatya', 2, 1),
(2, '2021-11-01 07:10:23', '2021-11-01 07:10:56', 'Pertiwi', 'Pramudita', 2, 1),
(3, '2021-11-01 07:10:23', '2021-11-01 07:10:56', 'Damawanti', 'Danastri', 3, 1),
(4, '2021-11-01 07:10:21', '2021-11-01 07:10:59', 'Dialya', 'Cahyadewi', 4, 1),
(5, '2021-11-01 09:10:00', '2021-11-01 09:10:56', 'Padmasaris', 'Praningtyas', 5, 1),
(6, '2021-11-01 09:05:23', '2021-11-01 09:10:58', 'Nala', 'Mustika', 6, 1),
(7, '2021-11-02 17:10:04', '2021-11-02 17:44:57', 'Maya', 'Mega', 7, 1),
(8, '2021-11-02 17:10:04', '2021-11-02 17:33:57', 'Laksita', 'Maharani', 8, 1),
(9, '2021-11-02 18:10:23', '2021-11-02 18:22:58', 'Lestari', 'Kinasih', 9, 1),
(10, '2021-11-02 18:12:14', '2021-11-02 18:12:58', 'Kayshilla', 'Jagasari', 10, 1),
(11, '2021-11-02 21:10:21', '2021-11-02 21:15:58', 'Indraswari', 'Indriyani', 11, 1),
(12, '2021-11-02 22:05:24', '2021-11-02 22:56:57', 'Hastanti', 'Helmawati', 12, 1),
(13, '2021-11-03 03:10:12', '2021-11-03 03:34:56', 'Hardiyati', 'Hapsari', 13, 1),
(14, '2021-11-03 03:08:11', '2021-11-03 03:23:54', 'Elok', 'Diyatri', 14, 1),
(15, '2021-11-03 05:10:10', '2021-11-03 05:34:51', 'Dita', 'Dian', 15, 1),
(16, '2021-11-03 05:10:23', '2021-11-03 05:24:56', 'Cempaka', 'Cahyaningrum', 16, 1),
(17, '2021-11-03 07:23:11', '2021-11-03 07:23:56', 'Bintari', 'Basagita', 2, 1),
(18, '2021-11-03 07:10:09', '2021-11-03 07:16:54', 'Asmiasih', 'Arisanti', 1, 1),
(19, '2021-11-03 09:10:11', '2021-11-03 09:11:34', 'Adiratna', 'Anandya', 1, 1),
(20, '2021-11-03 09:16:04', '2021-11-03 09:16:21', 'Astagina', 'Arini', 3, 1),
(21, '2021-11-01 07:10:23', '2021-11-01 07:10:56', 'Damawanti', 'Danastris', 1, 2),
(22, '2021-11-01 07:10:21', '2021-11-01 07:10:59', 'Dialya', 'Cahyadewi', 2, 2),
(23, '2021-11-01 09:10:00', '2021-11-01 09:10:56', 'Padmasari', 'Praningtyas', 2, 2),
(24, '2021-11-01 09:05:23', '2021-11-01 09:10:58', 'Nala', 'Mustika', 4, 2),
(25, '2021-11-02 17:10:04', '2021-11-02 17:44:57', 'Maya', 'Mega', 5, 2),
(26, '2021-11-02 17:10:04', '2021-11-02 17:33:57', 'Laksita', 'Maharani', 6, 2),
(27, '2021-11-02 18:10:23', '2021-11-02 18:22:58', 'Lestari', 'Kinasih', 3, 2),
(28, '2021-11-02 18:12:14', '2021-11-02 18:12:58', 'Kayshilla', 'Arisanti', 7, 2),
(29, '2021-11-02 21:10:21', '2021-11-02 21:15:58', 'Indraswari', 'Indriyani', 8, 2),
(30, '2021-11-02 22:05:24', '2021-11-02 22:56:57', 'Hastanti', 'Helmawati', 9, 2),
(31, '2021-11-03 03:10:12', '2021-11-03 03:34:56', 'Hardiyati', 'Hapsari', 10, 2),
(32, '2021-11-03 03:08:11', '2021-11-03 03:23:54', 'Elok', 'Diyatri', 10, 2),
(33, '2021-11-03 05:10:10', '2021-11-03 05:34:51', 'Dita', 'Dian', 11, 2),
(34, '2021-11-03 05:10:23', '2021-11-03 05:24:56', 'Cempaka', 'Cahyaningrum', 12, 2),
(35, '2021-11-03 07:23:11', '2021-11-03 07:23:56', 'Bintari', 'Basagita', 13, 2),
(36, '2021-11-03 07:10:09', '2021-11-03 07:16:54', 'Asmiasih', 'Arisanti', 14, 2),
(37, '2021-11-03 09:10:11', '2021-11-03 09:11:34', 'Adiratna', 'Anandya', 2, 2),
(38, '2021-11-03 09:16:04', '2021-11-03 09:16:21', 'Astagina', 'Arini', 16, 2),
(39, '2021-11-03 09:17:04', '2021-11-03 09:18:21', 'Paradista', 'Arini', 16, 2),
(40, '2021-11-03 09:18:04', '2021-11-03 09:18:45', 'Astagina', 'Pertiwi', 16, 2),
(41, '2021-11-01 07:10:23', '2021-11-01 07:10:56', 'Damayanti', 'Anindyaswari ', 1, 3),
(42, '2021-11-01 07:10:21', '2021-11-01 07:10:59', 'Dialya', 'Cahyadewi', 2, 3),
(43, '2021-11-01 09:10:00', '2021-11-01 09:10:56', 'Padmasari', 'Praningtyas', 3, 3),
(44, '2021-11-01 09:05:23', '2021-11-01 09:10:58', 'Nala', 'Damayanti', 4, 3),
(45, '2021-11-02 17:10:04', '2021-11-02 17:44:57', 'Maya', 'Mega', 5, 3),
(46, '2021-11-02 17:10:04', '2021-11-02 17:33:57', 'Laksita', 'Maharani', 6, 3),
(47, '2021-11-02 18:10:23', '2021-11-02 18:22:58', 'Lestari', 'Kinasih', 7, 3),
(48, '2021-11-02 18:12:14', '2021-11-02 18:12:58', 'Kayshilla', 'Jagasari', 8, 3),
(49, '2021-11-02 21:10:21', '2021-11-02 21:15:58', 'Indraswari', 'Indriyani', 9, 3),
(50, '2021-11-02 22:05:24', '2021-11-02 22:56:57', 'Hastanti', 'Helmawati', 10, 3),
(51, '2021-11-03 03:10:12', '2021-11-03 03:34:56', 'Hardiyati', 'Hapsari', 11, 3),
(52, '2021-11-03 03:08:11', '2021-11-03 03:23:54', 'Elok', 'Diyatri', 12, 3),
(53, '2021-11-03 05:10:10', '2021-11-03 05:34:51', 'Dita', 'Dian', 13, 3),
(54, '2021-11-03 05:10:23', '2021-11-03 05:24:56', 'Cempaka', 'Cahyaningrum', 14, 3),
(55, '2021-11-03 07:23:11', '2021-11-03 07:23:56', 'Bintari', 'Basagita', 16, 3),
(56, '2021-11-03 07:10:09', '2021-11-03 07:16:54', 'Asmiasih', 'Arisanti', 12, 3),
(57, '2021-11-03 09:10:11', '2021-11-03 09:11:34', 'Adiratna', 'Anandya', 11, 3),
(58, '2021-11-03 09:16:04', '2021-11-03 09:16:21', 'Astagina', 'Arini', 12, 3),
(59, '2021-11-03 09:17:04', '2021-11-03 09:18:21', 'Paradista', 'Arini', 13, 3),
(60, '2021-11-03 09:18:04', '2021-11-03 09:18:45', 'Astagina', 'Pertiwi', 11, 3),
(61, '2021-11-09 17:24:00', '2021-11-16 17:24:00', 'someone', 'No one', 16, 2),
(62, '2021-11-01 17:57:00', '2021-11-05 17:57:00', 'No One', 'Someone', 2, 3),
(63, '2021-11-03 18:08:00', '2021-11-03 18:09:00', 'Padmasari', 'Nala', 12, 3),
(66, '2021-11-04 00:47:00', '2021-11-04 00:49:00', 'Padmasari', 'Ayuningtyas', 2, 1),
(67, '2021-11-04 00:53:00', '2021-11-04 00:55:00', 'SOmeone', 'Padmasari', 4, 1),
(68, '2021-11-04 00:56:00', '2021-11-04 00:58:00', 'Other', 'Others', 1, 1),
(69, '2021-11-12 00:56:00', '2021-11-04 00:58:00', 'Someone', 'Another', 1, 1),
(70, '2021-11-04 03:01:00', '2021-11-04 03:04:00', 'Asmarani', 'Ardiyanti', 5, 1),
(71, '2021-11-04 10:29:00', '2021-11-04 10:30:00', 'Dian', 'Ratih', 2, 2),
(72, '2021-11-04 11:09:00', '2021-11-04 11:10:00', 'Sasmi', 'Dian', 2, 2),
(74, '2021-11-20 16:49:00', '2021-11-12 16:52:00', 'Anindyaswari ', 'Ratih', 2, 3),
(75, '2021-11-07 10:59:00', '2021-11-07 00:24:00', 'Ambar', 'Andhini', 4, 3),
(76, '2021-11-07 11:12:00', '2021-11-07 11:14:00', 'Astutiningtyas ', 'Anditya', 13, 3),
(77, '2021-11-07 12:26:00', '2021-11-07 12:27:00', 'Adiratna ', 'Arthawidya ', 1, 1),
(78, '2021-11-07 12:53:00', '2021-11-07 12:55:00', 'Cakrawati ', 'Padmasari', 13, 1),
(79, '2021-11-07 12:57:00', '2021-11-07 12:59:00', 'Anindyaswari ', 'Primaningtyas ', 15, 3),
(80, '2021-11-07 17:28:00', '2021-11-07 17:30:00', 'Hapsari ', 'Kumalasari ', 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `R_ID` int(11) NOT NULL,
  `R_DESC` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`R_ID`, `R_DESC`) VALUES
(1, 'Interlock Hose Reel Front'),
(2, 'Interlock Hose Reel Rear'),
(3, 'Interlock Input Coupler Stow'),
(4, 'Interlock Input Hose Boom Stow'),
(5, 'Interlock Platform Stow'),
(6, 'Interlock Platform Nozle Left'),
(7, 'Interlock Platform Nozle Right'),
(8, 'Interlock Boom Stow'),
(9, 'Interlock Static Reel Front'),
(10, 'Interlock Static Reel Rear'),
(11, 'Interlock Bottom Loading'),
(12, 'Interlock Handrail'),
(13, 'PTO'),
(14, 'Preventive Maintenance'),
(15, 'Interlock System Fault'),
(16, 'Breakdown');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USR_ID` int(11) NOT NULL,
  `USR_USERNAME` varchar(256) NOT NULL,
  `USR_PASSSWORD` varchar(256) NOT NULL,
  `USR_NAME` varchar(512) NOT NULL,
  `USR_PHOTO` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USR_ID`, `USR_USERNAME`, `USR_PASSSWORD`, `USR_NAME`, `USR_PHOTO`) VALUES
(1, 'agniasari', 'agniasariPass', 'Agniasari Candramaya', 'agniasari.jpg'),
(2, 'kencana', 'kencanaPass', 'Kencana Nindita', 'kencana.jpg'),
(3, 'sasmaya', 'sasmayaPass', 'Sasmaya Ratimaya', 'sasmaya.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`KJD_ID`),
  ADD KEY `FOREIGN_KEJADIAN` (`R_ID_KJD`),
  ADD KEY `FOREIGN_USER` (`USR_ID_KJD`);

--
-- Indexes for table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `KJD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `reason`
--
ALTER TABLE `reason`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD CONSTRAINT `FOREIGN_KEJADIAN` FOREIGN KEY (`R_ID_KJD`) REFERENCES `reason` (`R_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_USER` FOREIGN KEY (`USR_ID_KJD`) REFERENCES `user` (`USR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
