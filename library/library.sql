-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `slno` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `confirmpassword` varchar(15) NOT NULL,
  `adminimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`slno`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `confirmpassword`, `adminimage`) VALUES
(1, 'Shayan', 'Ghosh', 'sg@gmail.com', 2147483647, 'Sg@123456', 'Sg@123456', '1715322700.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingno` int(10) NOT NULL,
  `studentemail` varchar(50) NOT NULL,
  `bookid` int(10) NOT NULL,
  `bookcode` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bookingdate` date NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date NOT NULL,
  `fineamount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingno`, `studentemail`, `bookid`, `bookcode`, `status`, `bookingdate`, `issuedate`, `returndate`, `fineamount`) VALUES
(1, 'am@nath.com', 2, 'BCRECPY001', 'Returned', '2024-04-25', '2024-04-26', '2024-05-07', 0),
(2, 'ns@gmail.com', 4, 'BCRECPY002', 'Returned', '2024-04-25', '2024-05-07', '2024-05-08', 0),
(3, 'ns@gmail.com', 4, 'BCRECPY003', 'Returned', '2024-04-25', '2024-05-07', '0000-00-00', 0),
(4, 'ns@gmail.com', 4, 'BCRECPY004', 'Returned', '2024-04-25', '2024-05-07', '2024-05-09', 0),
(5, 'ns@gmail.com', 4, 'BCRECPY005', 'Returned', '2024-04-25', '2024-03-07', '2024-05-09', 0),
(6, 'ns@gmail.com', 4, 'BCRECPY006', 'Returned', '2024-04-25', '2024-04-23', '2024-05-09', 0),
(7, 'ns@gmail.com', 4, 'BCRECPY007', 'Returned', '2024-04-25', '0000-00-00', '2024-05-07', 0),
(8, 'ns@gmail.com', 1, 'BCRECC001', 'Returned', '2024-04-26', '2024-04-05', '2024-05-09', 0),
(9, 'ns@gmail.com', 1, 'BCRECC001', 'Returned', '2024-04-26', '2024-05-15', '2024-05-15', 0),
(10, 'ns@gmail.com', 2, 'BCRECCPP001', 'Returned', '2024-04-13', '2024-04-14', '2024-05-15', 0),
(11, 'ns@gmail.com', 1, 'BCRECC001', 'Returned', '2024-05-24', '2024-05-24', '2024-05-24', 0),
(12, 'sr@gmail.com', 3, 'NSHMC001', 'Returned', '2024-05-24', '2024-05-24', '2024-05-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `slno` int(10) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`slno`, `subjectname`, `bookname`, `authorname`, `publisher`, `edition`) VALUES
(1, 'C', 'Let Us C', 'Yashavant P Kanetkar', 'BPB Publications; Nineteenth edition (15 December 2022); BPB Publications, Ansari Road, Dariya Ganj', '1st Edition'),
(2, 'Cpp', 'Let Us C', 'Yashavant P Kanetkar', 'BPB Publications; Nineteenth edition (15 December 2022); BPB Publications, Ansari Road, Dariya Ganj', '1st Edition'),
(3, 'Java', 'Let Us Java', 'Yashavant P Kanetkar', 'BPB Publications; Nineteenth edition (15 December 2022); BPB Publications, Ansari Road, Dariya Ganj', '1st Edition'),
(4, 'Python', 'Fluent Python', 'Luciano Ramalho', 'O Reilly Media, Inc', '1st Edition');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `slno` int(10) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `fullcoursename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`slno`, `coursename`, `fullcoursename`) VALUES
(1, 'BCA', 'Bachelor Of Computer Application'),
(5, 'BBA', 'Bachelor Of Business Adminstration'),
(6, 'BO', 'Bachelor Of Optometry'),
(7, 'BTech', 'Bachelor Of Technology');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `slno` int(10) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `departmentname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`slno`, `coursename`, `departmentname`) VALUES
(1, 'BCA', 'BCA'),
(2, 'BBA', 'BBA'),
(4, 'BBA', 'BBA ( Supply Chain Management )'),
(5, 'BBA', 'BBA ( Hospital Management )'),
(6, 'BO', 'BO'),
(7, 'BTech', 'CSE'),
(8, 'BTech', 'IT'),
(9, 'BTech', 'ME'),
(10, 'BTech', 'EE'),
(11, 'BTech', 'ECE'),
(12, 'BTech', 'AI & ML'),
(13, 'BTech', 'CSBS');

-- --------------------------------------------------------

--
-- Table structure for table `librariandetails`
--

CREATE TABLE `librariandetails` (
  `slno` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpassword` varchar(20) NOT NULL,
  `librarianimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librariandetails`
--

INSERT INTO `librariandetails` (`slno`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `confirmpassword`, `librarianimage`) VALUES
(6, 'Kron', 'Ten', 'kt@gmail.com', 7776765645, 'Kt@123456', 'Kt@123456', '1715837708.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `slno` int(11) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `bookid` int(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `bookedition` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`slno`, `subjectname`, `bookid`, `authorname`, `bookedition`, `quantity`, `price`) VALUES
(4, 'C', 1, 'Yashavant P Kanetkar', '1st Edition', 200, '289'),
(5, 'Cpp', 2, 'Yashavant P Kanetkar', '1st Edition', 300, '289'),
(6, 'Python', 4, 'Luciano Ramalho', '1st Edition', 105, '788'),
(7, 'Java', 3, 'Yashavant P Kanetkar', '1st Edition', 100, '503');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `slno` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `studentroll` bigint(15) NOT NULL,
  `studentcourse` varchar(100) NOT NULL,
  `studentdepartment` varchar(100) NOT NULL,
  `studentsemester` varchar(100) NOT NULL,
  `studentphonenumber` bigint(10) NOT NULL,
  `studentemail` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `approvestatus` varchar(10) NOT NULL,
  `studentimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`slno`, `firstname`, `lastname`, `studentroll`, `studentcourse`, `studentdepartment`, `studentsemester`, `studentphonenumber`, `studentemail`, `password`, `approvestatus`, `studentimage`) VALUES
(4, 'Monster', 'Kuntal', 1, 'BTech', 'ME', 'SEMESTER 5', 9898989898, 'ns@gmail.com', 'Ns@123456', 'AP', '1716474084.jpg'),
(5, 'GodL', 'Amarnath', 1, 'BCA', 'BCA', 'SEMESTER 6', 2222222222, 'ga@gmail.com', 'Ga@12345', 'NA', ''),
(6, 'Somnath', 'Ruidas', 1, 'BTech', 'CSE', 'SEMESTER 8', 2121212121, 'sr@gmail.com', 'Sr@12345', 'AP', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `slno` int(10) NOT NULL,
  `subjectname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`slno`, `subjectname`) VALUES
(1, 'C'),
(2, 'Cpp'),
(3, 'Java'),
(4, 'Python'),
(5, 'Operating System'),
(8, 'Software Engineering'),
(10, 'Data Structure And Algorithm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingno`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `librariandetails`
--
ALTER TABLE `librariandetails`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `librariandetails`
--
ALTER TABLE `librariandetails`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
