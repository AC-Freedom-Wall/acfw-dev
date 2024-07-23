-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2024 at 12:19 AM
-- Server version: 10.11.8-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  `lock_post` int(11) NOT NULL DEFAULT 0,
  `boardcol` varchar(45) DEFAULT NULL,
  `thumbup` int(11) NOT NULL DEFAULT 0,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`idx`, `name`, `pw`, `title`, `content`, `date`, `hit`, `lock_post`, `boardcol`, `thumbup`, `file`) VALUES
(1, 'test', '1111', 'testtitle', 'testcontent', '2020-12-01', 42, 0, '0', 0, ''),
(2, 'temp', '$2y$10$3qwQBciThgUtDeDYdt2TSem3Bw0AhHbkjFhSCm.RFJb1ckcwyD9/G', 'temp', 'asdkl;fjas;lkdfjaslkdfjsaldfk', '2024-07-09', 5, 0, NULL, 0, ''),
(3, 'asdasdasd', '$2y$10$koD.edNOBksl.pzWQ30E6OPFozDztWlsjkokuUWxRGo5gre3igLX6', 'asdfasdfasdf', 'asdasdasdasdasdasdfsadfsdfsadf', '2024-07-09', 5, 0, NULL, 0, ''),
(4, '123123', '$2y$10$HoDGfHXelcy/OF4PQ8nmRu1pM1Ej6ecoq86c/xGvB7HC17urnWA2q', '123123', '123123123123123', '2024-07-09', 0, 1, NULL, 0, ''),
(5, 'lsdkfjaslkfjaslkdfj', '$2y$10$gDF8fcTDFdTKtRkIBmC3UOv16SJpvFowEw4qT9kymjMLh0acbyorK', 'asdfljasdlfkjasldfk', 'sldkfjlskdfjlskdfjlsd', '2024-07-09', 1, 1, NULL, 0, ''),
(6, 'zxczxc', '$2y$10$PT92SH07JCGu5SkaDR9Y.uZMzKvXrgcLlcrJwaoAWYVpo2AoZ1PFu', 'zxczxc', 'zxczxc', '2024-07-09', 0, 1, NULL, 0, ''),
(7, 'afasdfawseg', '$2y$10$.4xZtvJZcN7BieeBc3sOkuuLdCfzLg7SCOAZ0dZmgycWJKF.MTDpi', 'aetawte', 'asdgasdfasdf', '2024-07-10', 2, 0, NULL, 0, '180501_board.zip'),
(8, 'aefg a35w4hsexd', '$2y$10$.Y7P10vSPTokR.qyPksf9OZMe5Pd.jRF9pvqZNkRUn.5g7wQRyElq', 'fbg eys5h', 'actgq3va  y4bves gxvb ', '2024-07-10', 1, 0, NULL, 0, '180501_board.zip'),
(9, 'drgwaergergerg', '$2y$10$mHCebJTQBBRYQdPTOxMCEed.JYUEucaRoTW8/6yqt9a7p8hSukBUi', 'dfgdxfbdfbdsfgb', 'vesthsrfxnxergthbrnf', '2024-07-10', 2, 0, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `levelpoint`
--

CREATE TABLE `levelpoint` (
  `idx` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `levelpoint`
--

INSERT INTO `levelpoint` (`idx`, `userid`, `point`) VALUES
(9, 'user', 0),
(11, 'aaa', 1),
(12, 'bbb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`) VALUES
(2, 'user', '$2y$10$j8ph5eq8Jofad4dKt5x3rOmysTmtVjbNV00qfjXzk83ibnDDxurmm', 'user'),
(4, 'aaa', '$2y$10$a8h/dERwDJiRLcc2Xj6ujOtw6x8HWevnej1vcxL0TDWxBNct.c6Tm', 'ccc'),
(5, 'bbb', '$2y$10$AEYQN4Lu4wpfY/9TjJmqFO1yGN/ulggWbgxtOSnkqISI79WcdK3Yi', 'ccc');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`idx`, `con_num`, `name`, `pw`, `content`, `date`) VALUES
(1, 1, '313131', '$2y$10$xRB1jvBPAhao1lzUhcUfCut86LFNFfFO74ZCqz05PI/VeCGSfsH4u', 'asdasdasd', '2024-07-09'),
(2, 1, '343452354', '$2y$10$CigSCfh0xSvMe9fqOybGvuAoE6e066UfgOv0AjDjljupcyBsJB6y6', 'aaaaaaaaaaaaaaaaa', '2024-07-09'),
(3, 1, '1111', '$2y$10$mBpX.vWlIQfKbq/sozHy1.2pll1P5.sKnMMbcTYJChezVRbXXWj3a', '1111', '2024-07-09'),
(4, 1, 'asdasd', '$2y$10$dcYxhfpfhdogIW922zqmZOk8Q/PFf9cDlh3iYy2.dND7kJsGA.xCa', 'asdasd', '2024-07-09'),
(5, 2, 'asdasd', '$2y$10$YfsLYMy8XD4u7ihoHYq1G.4l.NiuDUA8WUEeJPSoLSZoM0Np9IoL.', 'asdasd', '2024-07-10'),
(6, 2, '123123', '$2y$10$lVIt4p7gSWhi.qhCJuna3.MWGnXnrE478BvwEk8.DcNe0aGcmHND.', '123123123', '2024-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `levelpoint`
--
ALTER TABLE `levelpoint`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `levelpoint`
--
ALTER TABLE `levelpoint`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
