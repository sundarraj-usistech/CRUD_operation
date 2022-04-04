-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 01:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internal_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `employee_id` int(5) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_designation` varchar(50) NOT NULL,
  `employee_mail_id` varchar(100) NOT NULL,
  `employee_doj` date NOT NULL,
  `employee_phone` varchar(15) NOT NULL,
  `employee_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`employee_id`, `employee_name`, `employee_designation`, `employee_mail_id`, `employee_doj`, `employee_phone`, `employee_status`) VALUES
(10001, 'John', 'CEO', 'john@abc.com', '2022-01-02', '9100000000', 'Active'),
(10002, 'David', 'Manager', 'david@abc.com', '2022-01-02', '9192000000', 'Active'),
(10003, 'Jack', 'HR Manager', 'jack@abc.com', '2022-01-02', '9193000000', 'Active'),
(10004, 'James', 'Consultant', 'james@abc.com', '2022-01-02', '9194000000', 'Active'),
(10005, 'Michael', 'Trainer', 'michael@abc.com', '2022-01-02', '9195000000', 'Active'),
(10006, 'Paul', 'Trainer', 'paul@abc.com', '2022-01-02', '9196000000', 'Active'),
(10007, 'Sara', 'Trainer', 'sara@abc.com', '2022-01-02', '9198000000', 'Active'),
(10008, 'name1', 'Trainee', 'name1@abc.com', '2022-01-10', '9197000000', 'Active'),
(10009, 'name2', 'Trainee', 'name2@abc.com', '2022-01-11', '9197000001', 'Active'),
(10010, 'name3', 'Trainee', 'name3@abc.com', '2022-01-11', '9197000002', 'Active'),
(10011, 'name4', 'Trainee', 'name4@abc.com', '2022-01-11', '9197000003', 'Active'),
(10012, 'name5', 'Trainee', 'name5@abc.com', '2022-01-12', '9197000004', 'Active'),
(10013, 'name6', 'Trainee', 'name6@abc.com', '2022-01-12', '9197000005', 'Active'),
(10014, 'name7', 'Trainee', 'name7@abc.com', '2022-01-13', '9197000006', 'Active'),
(10015, 'name8', 'Trainee', 'name8@abc.com', '2022-01-13', '9197000007', 'Active'),
(10016, 'name9', 'Trainee', 'name9@abc.com', '2022-01-14', '9197000008', 'Active'),
(10017, 'name10', 'Trainee', 'name10@abc.com', '2022-01-14', '9197000009', 'Active'),
(10018, 'name11', 'Trainee', 'name11@abc.com', '2022-01-14', '9197000010', 'Active'),
(10019, 'name12', 'Trainee', 'name12@abc.com', '2022-01-14', '9197000011', 'Active'),
(10020, 'name13', 'Trainee', 'name13@abc.com', '2022-01-14', '9197000012', 'Inactive'),
(10021, 'name14', 'Trainee', 'name14@abc.com', '2022-01-17', '9797979797', 'Inactive'),
(10022, 'name15', 'Trainee', 'name15@abc.com', '2022-01-17', '9197000014', 'Inactive'),
(10026, 'name16', 'Trainee', 'name16@abc.com', '2022-01-17', '9197000015', 'Inactive'),
(10027, 'name17', 'Trainee', 'name17@abc.com', '2022-01-19', '9197000016', 'Active'),
(10029, 'name18', 'Trainee', 'name18@abc.com', '2022-01-20', '9197000017', 'Active'),
(10070, 'name40', 'Trainee', 'name40@abc.com', '2022-01-24', '0422 2658664', 'Active'),
(10071, 'name42', 'Trainee', 'name42@abc.com', '2022-03-01', '0422 2658662', 'Active'),
(10073, 'name41', 'Trainee', 'name41@abc.com', '2022-03-07', '0422 2658667', 'Active'),
(10075, 'dary', 'Trainee', 'dary@abc.com', '2022-03-07', '0422 2658669', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `e_mail` (`employee_mail_id`),
  ADD UNIQUE KEY `e_phone` (`employee_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10076;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
