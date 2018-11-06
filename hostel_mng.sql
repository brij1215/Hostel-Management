-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 07:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` varchar(10) NOT NULL,
  `Pwd` varchar(20) NOT NULL,
  `Type` enum('REPRESENTATIVE','SUPER_ADMIN','STAFF') NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Pwd`, `Type`, `Name`) VALUES
('bkm123', 'pwd123', 'REPRESENTATIVE', 'brijesh'),
('dilip123', 'pwd123', 'REPRESENTATIVE', 'dilip'),
('suprio123', 'pwd123', 'STAFF', 'aaditya');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `CompId` int(5) NOT NULL,
  `StdId` varchar(10) NOT NULL,
  `Complaint` varchar(500) NOT NULL,
  `CompDate` date NOT NULL,
  `CompStatus` varchar(20) NOT NULL DEFAULT 'Process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`CompId`, `StdId`, `Complaint`, `CompDate`, `CompStatus`) VALUES
(8, '2016CA41', 'please wash the bathroom', '2018-04-18', 'Process'),
(9, '2016CA41', 'change the mess menu of friday.', '2018-04-18', 'Process'),
(10, '2016CA52', 'change the mess menu.', '2018-04-18', 'Process');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `Name` varchar(50) NOT NULL,
  `MessName` varchar(50) DEFAULT NULL,
  `WardenName` varchar(30) DEFAULT NULL,
  `Info` varchar(200) DEFAULT NULL,
  `Type` enum('boys','girls') DEFAULT NULL,
  `Contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`Name`, `MessName`, `WardenName`, `Info`, `Type`, `Contact`) VALUES
('B.G. Tilak Hostel', 'B.G. Tilak Hostel Mess', 'Dr. Basant Kumar', 'B.G. Tilak Hostel is a boys hostel which is located on campus Area.', 'boys', '227-1133'),
('C.V. Raman Hostel', 'C.V. Raman Hostel Mess', 'Dr. Yogendra K. Prajapati', 'C.V. Raman Hostel is a boys hostel which is located on campus Hostel Area.', 'boys', '227-1139'),
('International House', 'International House Mess', 'Dr. Radharani Mewaram', 'International House is a guest hostel.', 'girls', '227-1141'),
('K.N. Girls Hostel ', 'K.N. Girls Hostel Mess', 'Dr. Manisha Sachan', 'K.N. Girls Hostel is a girls hostel', 'girls', '227-1126'),
('M.M. Malviya Hostel', 'M.M. Malviya Hostel Mess', 'Dr. Kumar Pallav', 'M.M. Malviya Hostel is a boys hostel which is located on campus area.', 'boys', '2271129'),
('P.D. Tondon Hostel', 'P.D. Tondon Hostel Mess', 'Dr. Ranvijay', 'P.D. Tondon Hostel is a boys Hostel which is located on campus area.', 'boys', '227-1131'),
('PG Hostel', 'Swami Vivekanda Boys Hostel Mess', 'Dr Animesh Kumar Ojha', 'PG Hostel  is for PG and Research students ', 'boys', '227-1121'),
('R.N. Tagore Hostel', 'R.N. Tagore Hostel Mess', 'Dr. Ashutosh Pandey', 'R.N. Tagore Hostel is a boys hostel which is located on hostel campus.', 'boys', '227-1137'),
('S.N. Girls Hostel', 'S.N. Girls Hostel Mess', 'Dr. Radharani Mewaram', 'S.N. Girls Hostel is a girls Hostel.', 'girls', '227-1123'),
('S.V. Patel Hostel', 'S.V. Patel Hostel Mess', 'Dr. Manish Gupta', 'S.V. Patel Hostel is a boys hostel which is located on campus area.', 'boys', '2271135'),
('Swami Vivekananda Boys Hostel', 'Swami Vivekananda Boys Hostel Mess', 'Dr. Nekram Rawal', 'Swami Vivekanda Boys Hostel is the biggest boys hostel which is located on main campus.', 'boys', '227-118');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `HostelName` varchar(50) NOT NULL,
  `noticeDate` date DEFAULT NULL,
  `Notice` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`HostelName`, `noticeDate`, `Notice`) VALUES
('B.G. Tilak Hostel', '2018-03-27', 'All of student should submit there fees confermation letter.'),
('C.V. Raman Hostel', '2018-03-04', 'Students collect their furniture from caretaker till 21-3-18'),
('P.D. Tondon Hostel', '2018-03-08', 'mess management committee should draft the  mess menu.\r\nkind give your opinion.'),
('PG Hostel', '2017-03-07', 'electrician are available in hostel 2 to 5 PM.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RegNo` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Program` enum('BTech','MTech','PHD','MCA','MSW','MSc') NOT NULL,
  `Branch` enum('None','Bio Technology','Civil Engineering','Computer Science and Engineering','Chemical Engineering','Electrical Engineering','Electronics and Communication Engineering','Information Technology','Mechanical Engineering','Production and Industrial Engineering') NOT NULL,
  `ProgramYear` int(11) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `HostelName` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Pwd` varchar(30) NOT NULL DEFAULT 'pwd123',
  `Photograph` varchar(30) DEFAULT '',
  `FeeStatus` enum('Submit','Not Submit') NOT NULL DEFAULT 'Not Submit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `Name`, `Program`, `Branch`, `ProgramYear`, `Address`, `HostelName`, `Email`, `Pwd`, `Photograph`, `FeeStatus`) VALUES
('20154011', 'Arun Singn', 'BTech', 'Civil Engineering', 3, '308, Patal Hostel, MNNIT Allahabad', 'S.V. Patel Hostel', 'arun.mnnit@gmail.com', 'pwd123', '', 'Not Submit'),
('2016CA41', 'Brij Kishor', 'MCA', 'None', 2, '205, tilak Hostel MNNIT Allahabad', 'B.G. Tilak Hostel', 'brijkishor.mnnit@gmail.com', 'pwd123', '', 'Not Submit'),
('2016CA43', 'Dilip Kumar Yadav', 'MCA', 'None', 2, '204, Tilak Hostel, MNNIT Allahabad', 'B.G. Tilak Hostel', 'dilipyadav.mnnit@gmail.com', 'pwd123', '', 'Not Submit'),
('2016CA52', 'Barsha Mandal', 'MCA', 'None', 2, 'K.N hostel', 'K.N. Girls Hostel ', 'dkhkghhgh@gmail.com', 'pwd120', '', 'Not Submit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`CompId`),
  ADD UNIQUE KEY `CompId` (`CompId`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD UNIQUE KEY `HostelName` (`HostelName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RegNo`),
  ADD UNIQUE KEY `RegNo` (`RegNo`),
  ADD KEY `HostelName` (`HostelName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `CompId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`HostelName`) REFERENCES `hostel` (`Name`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`HostelName`) REFERENCES `hostel` (`Name`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
