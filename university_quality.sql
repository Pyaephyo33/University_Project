-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 10:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_quality`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_data`
--

CREATE TABLE `categories_data` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_data`
--

INSERT INTO `categories_data` (`CategoryID`, `CategoryName`) VALUES
(1, 'ctest'),
(2, 'ctest2'),
(3, 'ctest3'),
(4, 'ctest4');

-- --------------------------------------------------------

--
-- Table structure for table `closure_data`
--

CREATE TABLE `closure_data` (
  `ClosureID` int(11) NOT NULL,
  `ClosureTitle` varchar(50) NOT NULL,
  `FirstClosureDate` date NOT NULL,
  `FinalClosureDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `closure_data`
--

INSERT INTO `closure_data` (`ClosureID`, `ClosureTitle`, `FirstClosureDate`, `FinalClosureDate`) VALUES
(1, 'testdate', '2022-03-31', '2022-04-21'),
(2, 'testdate1', '2022-03-15', '2022-04-08'),
(3, 'testdate2', '2022-03-15', '2022-03-16'),
(4, 'test8', '2022-04-06', '2022-10-06'),
(5, 'com1', '2022-04-27', '2022-05-07'),
(6, 'testt2', '2022-04-14', '2022-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `department_data`
--

CREATE TABLE `department_data` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(50) NOT NULL,
  `Depart_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_data`
--

INSERT INTO `department_data` (`DepartmentID`, `DepartmentName`, `Depart_phone`) VALUES
(1, 'D1', '0912312323'),
(2, 'D2', '09123123213'),
(3, 'D3', '96754765456'),
(4, 'D4', '0789789789');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_data`
--

CREATE TABLE `feedback_data` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IdeaID` int(11) NOT NULL,
  `Feedback` varchar(50) NOT NULL,
  `Annoymous` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_data`
--

INSERT INTO `feedback_data` (`FeedbackID`, `UserID`, `IdeaID`, `Feedback`, `Annoymous`) VALUES
(1, 1, 1, 'hello', 0),
(7, 1, 3, 'hello1', 0),
(8, 1, 3, 'hello2', 1),
(11, 1, 4, 'hello2', 0),
(12, 1, 4, 'hello1', 0),
(13, 1, 4, 'hello3', 1),
(14, 1, 4, 'hello4', 0),
(16, 1, 4, 'hello5', 0),
(17, 1, 4, 'hello6', 0),
(18, 1, 4, 'hello7', 0),
(19, 5, 4, 'hello', 0),
(20, 7, 5, 'Aww, i thought science is important but biology is', 0),
(21, 1, 5, 'thank', 1),
(22, 2, 5, 'no thank to u', 1),
(23, 7, 6, 'no thank to u', 1),
(24, 7, 6, 'good idea and nice work', 1),
(25, 1, 8, 'nice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `idea_data`
--

CREATE TABLE `idea_data` (
  `IdeaID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ClosureID` int(11) NOT NULL,
  `Idea_title` varchar(50) NOT NULL,
  `Idea_description` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `IdeaFile` varchar(255) NOT NULL,
  `IdeaFileSize` int(11) NOT NULL,
  `Annoymous` int(2) NOT NULL DEFAULT 0,
  `View` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idea_data`
--

INSERT INTO `idea_data` (`IdeaID`, `UserID`, `ClosureID`, `Idea_title`, `Idea_description`, `CategoryID`, `IdeaFile`, `IdeaFileSize`, `Annoymous`, `View`) VALUES
(1, 1, 1, 'testidea1', 'wqeqweeqw', 1, 'Test1.docx', 11453, 0, 61),
(2, 1, 1, 'testidea2', 'qweqweqweqwe', 2, 'Test2.docx', 11453, 1, 73),
(3, 1, 1, 'testidea3', 'ewqewq', 3, 'Test3.docx', 11453, 1, 45),
(4, 1, 1, 'testidea4', 'qweqweqwe', 4, 'Test4.docx', 11453, 0, 244),
(5, 7, 5, 'Science Idea', 'science subject is really important and primary objects in physics and biology', 3, 'gg.docx', 11996, 0, 26),
(6, 1, 5, 'Biology', 'Bio', 3, 'ss.docx', 11998, 1, 7),
(7, 1, 5, 'History Idea ', 'Year 144, creating wheels', 4, 'Task5.docx', 11993, 1, 5),
(8, 1, 6, 'myanmar', 'aaaaaaaaaaaa', 2, 'aa.docx', 11995, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rating_data`
--

CREATE TABLE `rating_data` (
  `RatingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` varchar(10) NOT NULL,
  `IdeaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_data`
--

INSERT INTO `rating_data` (`RatingID`, `UserID`, `Rating`, `IdeaID`) VALUES
(5, 1, 'like', 1),
(15, 2, 'like', 5),
(19, 7, 'like', 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles_data`
--

CREATE TABLE `roles_data` (
  `RoleID` int(11) NOT NULL,
  `Users' Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_data`
--

INSERT INTO `roles_data` (`RoleID`, `Users' Role`) VALUES
(1, 'Admin'),
(2, 'QA Manager'),
(3, 'QA Coordinator'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `User_email` varchar(30) NOT NULL,
  `User_password` varchar(30) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `PhoneNo` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`UserID`, `FullName`, `User_email`, `User_password`, `RoleID`, `DepartmentID`, `PhoneNo`, `Address`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 1, 1, '79066789678', 'qweqwe'),
(2, 'QaM', 'QaM@gmail.com', '123', 2, 4, '0789789789', 'qweqwe'),
(3, 'QaC', 'QaC@gmail.com', '123', 3, 1, '0789789789', 'qweqwe'),
(4, 'test', 'Test@gmail.com', '123', 4, 4, '0789789789', 'qweqwe'),
(5, 'admin2', 'admin2@gmail.com', '123', 1, 1, '79066789678', 'asdasd'),
(6, 'test2', 'Test2@gmail.com', '123', 4, 1, '0789789789', 'qweqwe'),
(7, 'Linn', 'Linn@gmail.com', '123', 4, 3, '454651289', 'Landon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_data`
--
ALTER TABLE `categories_data`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `closure_data`
--
ALTER TABLE `closure_data`
  ADD PRIMARY KEY (`ClosureID`);

--
-- Indexes for table `department_data`
--
ALTER TABLE `department_data`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `feedback_data`
--
ALTER TABLE `feedback_data`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `Feedback` (`Feedback`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `IdeaID` (`IdeaID`);

--
-- Indexes for table `idea_data`
--
ALTER TABLE `idea_data`
  ADD PRIMARY KEY (`IdeaID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `ClosureID` (`ClosureID`);

--
-- Indexes for table `rating_data`
--
ALTER TABLE `rating_data`
  ADD PRIMARY KEY (`RatingID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `UserID_2` (`UserID`),
  ADD KEY `IdeaID` (`IdeaID`);

--
-- Indexes for table `roles_data`
--
ALTER TABLE `roles_data`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `User_email` (`User_email`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_data`
--
ALTER TABLE `categories_data`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `closure_data`
--
ALTER TABLE `closure_data`
  MODIFY `ClosureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_data`
--
ALTER TABLE `department_data`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_data`
--
ALTER TABLE `feedback_data`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `idea_data`
--
ALTER TABLE `idea_data`
  MODIFY `IdeaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating_data`
--
ALTER TABLE `rating_data`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles_data`
--
ALTER TABLE `roles_data`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback_data`
--
ALTER TABLE `feedback_data`
  ADD CONSTRAINT `feedback_data_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users_data` (`UserID`),
  ADD CONSTRAINT `feedback_data_ibfk_2` FOREIGN KEY (`IdeaID`) REFERENCES `idea_data` (`IdeaID`);

--
-- Constraints for table `idea_data`
--
ALTER TABLE `idea_data`
  ADD CONSTRAINT `idea_data_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users_data` (`UserID`),
  ADD CONSTRAINT `idea_data_ibfk_3` FOREIGN KEY (`CategoryID`) REFERENCES `categories_data` (`CategoryID`),
  ADD CONSTRAINT `idea_data_ibfk_4` FOREIGN KEY (`ClosureID`) REFERENCES `closure_data` (`ClosureID`);

--
-- Constraints for table `rating_data`
--
ALTER TABLE `rating_data`
  ADD CONSTRAINT `rating_data_ibfk_1` FOREIGN KEY (`IdeaID`) REFERENCES `idea_data` (`IdeaID`);

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `users_data_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department_data` (`DepartmentID`),
  ADD CONSTRAINT `users_data_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `roles_data` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
