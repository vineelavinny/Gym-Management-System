-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 29, 2023 at 06:02 AM
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
-- Database: `gym_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(11) NOT NULL,
  `attendated_date` datetime(6) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `memberid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `attendated_date`, `class_id`, `memberid`) VALUES
(9, '2023-12-02 00:00:00.000000', 6, 3),
(10, '2023-12-04 00:00:00.000000', 10, 3),
(15, '2023-11-30 00:00:00.000000', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `body_measurement`
--

CREATE TABLE `body_measurement` (
  `body_measurement_id` int(11) NOT NULL,
  `measure_date` date DEFAULT NULL,
  `weight` decimal(38,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `body_measurement`
--

INSERT INTO `body_measurement` (`body_measurement_id`, `measure_date`, `weight`, `member_id`, `height`) VALUES
(4, '2023-11-29', 55.00, 3, 5),
(5, '2023-11-28', 60.00, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `gym_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchid`, `address`, `city`, `state`, `gym_id`) VALUES
(1, 'Eastpark Blvd', 'Denton', 'Texas', 1),
(2, 'Rayzor Ranch', 'Denton', 'Texas', 1),
(3, 'Woodhills', 'Denton', 'Texas', 1),
(4, 'Hackberry', 'Irving', 'Texas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_enroll`
--

CREATE TABLE `class_enroll` (
  `class_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_enroll`
--

INSERT INTO `class_enroll` (`class_id`, `member_id`) VALUES
(6, 1),
(6, 3),
(6, 9),
(7, 3),
(7, 9),
(8, 9),
(9, 9),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `class_id` int(11) NOT NULL,
  `schedule_time` datetime(6) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`class_id`, `schedule_time`, `capacity`, `location`, `name`, `employee_id`) VALUES
(6, '2023-12-02 00:00:00.000000', 10, 'Eastpark', 'Cardio', 2),
(7, '2023-12-18 00:00:00.000000', 15, 'Eastpark', '30 days fitness program', 2),
(8, '2024-01-01 00:00:00.000000', 5, 'Rayzor Ranch', 'Full Body workout', 2),
(9, '2023-11-30 00:00:00.000000', 10, 'woodhills', '5 Day workout', 1),
(10, '2023-12-04 00:00:00.000000', 15, 'woodhills', '12 week weight loss proggram', 1),
(11, '2023-11-01 00:00:00.000000', 15, 'woodhills', '90 days workout plan', 1),
(12, '2024-01-01 00:00:00.000000', 10, 'Rayzor Ranch', 'Strength Training', 3),
(13, '2023-11-16 00:00:00.000000', 20, 'Rayzor Ranch', 'Streching', 3),
(14, '2023-11-30 00:00:00.000000', 7, 'Rayzor Ranch', 'Mobility training', 3),
(15, '2023-11-30 00:00:00.000000', 20, 'Online', 'Jumba', 2);

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan`
--

CREATE TABLE `diet_plan` (
  `diet_plan_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meal_type` varchar(255) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet_plan`
--

INSERT INTO `diet_plan` (`diet_plan_id`, `description`, `meal_type`, `instructor_id`, `member_id`, `day`) VALUES
(5, 'Oats Smoothie', 'breakfast', 6, 3, 'monday'),
(6, 'Oats Pancake', 'breakfast', 6, 3, 'tuesday'),
(7, 'Egg omelette + Multigrain bread', 'breakfast', 6, 3, 'wednesday'),
(8, 'Soya Rice', 'lunch', 6, 3, 'thursday'),
(9, 'Paneer Chapati', 'lunch', 6, 3, 'friday'),
(10, 'Chicken Rice', 'lunch', 6, 3, 'saturday'),
(11, 'Daal Rice', 'dinner', 6, 3, 'sunday'),
(12, 'Egg Bhurji Chapathi', 'dinner', 6, 3, 'monday'),
(13, 'Fish Chapathi', 'dinner', 6, 3, 'tuesday'),
(14, 'Multigrain Bread', 'breakfast', 5, 1, 'wednesday'),
(15, 'Chicken Rice', 'lunch', 5, 1, 'friday'),
(16, 'Egg bhurji Chapathi', 'dinner', 5, 1, 'wednesday'),
(17, 'Oats Smoothie', 'breakfast', 7, 2, 'monday'),
(18, 'Soya + Chicken Rice', 'lunch', 7, 2, 'thursday'),
(19, 'Fish Chapathi', 'dinner', 7, 2, 'sunday'),
(20, 'Boiled Eggs 3', 'lunch', 6, 3, 'monday'),
(21, 'Oats Smoothie', 'breakfast', 6, 9, 'monday'),
(22, 'Oats Pancake', 'breakfast', 6, 9, 'tuesday'),
(23, 'Egg omelette + Multigrain bread', 'breakfast', 6, 9, 'wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `email`, `mobile`, `name`, `branch_id`, `role_id`, `username`, `password`) VALUES
(1, 'sumanth@gmail.com', '9867453747', 'Sumanth', 1, 2, 'sumanth', 'sumanth'),
(2, 'suneel@gmail.com', '9825173844', 'Suneel', 1, 2, 'suneel', 'suneel'),
(3, 'koushik@gmail.com', '9347283734', 'Koushik', 1, 2, 'koushik', 'koushik'),
(4, 'manikanta@gmail.com', '9374587823', 'Manikanta', 4, 2, 'manikanta', 'manikanta'),
(5, 'satya@gmail.com', '9327487632', 'Satya', 1, 2, 'satya', 'satya'),
(6, 'gokul@gmail.com', '9327482737', 'Gokul', 1, 2, 'gokul', 'gokul'),
(7, 'revanth@gmail.com', '9237326824', 'Revanth', 3, 2, 'revanth', 'revanth'),
(8, 'rahul@gmail.com', '9823483263', 'Rahul', 4, 2, 'revanth', 'revanth'),
(9, 'admin@gmail.com', '9827358724', 'admin', 1, 1, 'admin', 'admin'),
(10, 'mohan@gmail.com', '8162247434', 'Mohan', 1, 3, 'mohan', 'mohan'),
(11, 'nitish@gmail.com', '9237482364', 'Nitish', 2, 3, 'nitish', 'nitish'),
(12, 'kusuma@gmail.com', '8976532651', 'kusuma', 1, 2, 'kusuma', 'kusuma');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentid` int(11) NOT NULL,
  `equipment_name` varchar(255) DEFAULT NULL,
  `maintenance_schedule` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentid`, `equipment_name`, `maintenance_schedule`, `purchase_date`, `status`, `branch_id`) VALUES
(3, 'Treadmill', 7, '2023-11-01', 'Available', 1),
(4, 'Elliptical trainer', 7, '2023-11-02', 'maintainance', 1),
(5, 'Exercise Bike', 10, '2023-11-02', 'In-use', 1),
(6, 'Dumbbell', 1, '2023-11-15', 'Available', 1),
(7, 'Smith machine', 15, '2023-11-10', 'out-of-order', 1),
(8, 'Pull-up bar', 15, '2023-11-18', 'Available', 2),
(9, 'Battle Ropes', 3, '2023-11-25', 'In-use', 2),
(10, 'Overhead press', 14, '2023-10-31', 'out-of-order', 2),
(11, 'Dumbbell', 1, '2023-11-15', 'Available', 2),
(12, 'Bench', 5, '2023-11-17', 'Available', 3),
(13, 'Leg press machine', 10, '2023-11-01', 'out-of-order', 3),
(14, 'Kettlebell', 7, '2023-11-16', 'out-of-order', 3),
(15, 'Dumbbell', 2, '2023-11-04', 'Available', 3),
(16, 'Treadmill', 7, '2023-11-06', 'Available', 4),
(17, 'Rolling machine', 5, '2023-11-06', 'maintainance', 4),
(18, 'Leg Curl', 10, '2023-11-07', 'Available', 4),
(19, 'Barbell', 5, '2023-11-22', 'Available', 4),
(20, 'Dumbbell', 4, '2023-12-05', 'Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `memberid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `comment`, `date`, `rating`, `class_id`, `memberid`) VALUES
(3, 'Excellent', '2023-11-29 00:00:00.000000', 5, 6, 3),
(4, 'Good', '2023-11-29 00:00:00.000000', 4, 7, 3),
(5, 'Nice', '2023-11-29 00:00:00.000000', 4, 10, 3),
(6, 'Good', '2023-11-29 00:00:00.000000', 3, 6, 9),
(7, 'Excellent', '2023-11-29 00:00:00.000000', 5, 6, 1),
(8, 'good', '2023-11-29 00:00:00.000000', 3, 7, 9),
(9, 'ok', '2023-11-29 00:00:00.000000', 4, 8, 9),
(10, 'fine', '2023-11-30 00:00:00.000000', 3, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `gym_id` bigint(20) NOT NULL,
  `gym_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`gym_id`, `gym_name`) VALUES
(1, 'Arnold GYM');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorid` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorid`, `description`, `employee_id`) VALUES
(5, 'trainer', 1),
(6, 'Fitness Trainer', 2),
(7, 'trainer', 3),
(8, 'trainer', 6),
(9, 'Fitness trainer', 5),
(10, 'Aerobic trainer', 12);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_member`
--

CREATE TABLE `instructor_member` (
  `member_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_member`
--

INSERT INTO `instructor_member` (`member_id`, `instructor_id`) VALUES
(1, 5),
(2, 7),
(3, 6),
(5, 7),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `gym_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `mobile`, `name`, `password`, `username`, `gym_id`) VALUES
(1, 'harini@gmail.com', '8326473233', 'Harini', 'harini', 'harini', 1),
(2, 'hari@gmail.com', '8237827378', 'Hari', 'hari', 'hari', 1),
(3, 'vineela@gmail.com', '9283846233', 'Vineela', 'vineela', 'vineela', 1),
(4, 'murali@gmail.com', '9238472367', 'Murali', 'murali', 'murali', 1),
(5, 'charan@gmail.com', '9238748234', 'Charan', 'charan', 'charan', 1),
(6, 'mahesh@gmail.com', '9324632455', 'Mahesh', 'mahesh', 'mahesh', 1),
(7, 'ravi@gmail.com', '9235382943', 'Ravi', 'ravi', 'ravi', 1),
(8, 'vijay@gmail.com', '9234673255', 'Vijay', 'vijay', 'vijay', 1),
(9, 'divya@gmail.com', '97655640213', 'Divya', 'divya', 'divya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memberplan`
--

CREATE TABLE `memberplan` (
  `memberplanid` int(11) NOT NULL,
  `plan_expiry_date` date DEFAULT NULL,
  `plan_start_date` date DEFAULT NULL,
  `memberid` int(11) DEFAULT NULL,
  `membership_list_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberplan`
--

INSERT INTO `memberplan` (`memberplanid`, `plan_expiry_date`, `plan_start_date`, `memberid`, `membership_list_id`) VALUES
(5, '2024-02-29', '2023-11-29', 3, 1),
(6, '2024-02-29', '2023-11-29', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_list`
--

CREATE TABLE `membership_list` (
  `membershipid` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `membership_duration` varchar(255) DEFAULT NULL,
  `membership_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_list`
--

INSERT INTO `membership_list` (`membershipid`, `amount`, `membership_duration`, `membership_type`) VALUES
(1, 50, '3', 'Gold'),
(2, 30, '3', 'Silver'),
(3, 10, '1', 'Bronze'),
(4, 100, '6', 'Platinum');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `payment_amount` decimal(38,2) DEFAULT NULL,
  `payment_date` datetime(6) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `gym_id` bigint(20) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `payment_amount`, `payment_date`, `payment_type`, `gym_id`, `member_id`) VALUES
(2, 50.00, '2023-11-29 00:00:00.000000', 'online', 1, 3),
(3, 50.00, '2023-11-29 00:00:00.000000', 'online', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`),
  ADD KEY `FK46dnc40blctk3s04bu4kbtjw8` (`memberid`),
  ADD KEY `FKdwyqn75vy97trdi75gat4hspl` (`class_id`);

--
-- Indexes for table `body_measurement`
--
ALTER TABLE `body_measurement`
  ADD PRIMARY KEY (`body_measurement_id`),
  ADD KEY `FK_body_measure_id` (`member_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchid`),
  ADD KEY `FK_branch_gym_id` (`gym_id`);

--
-- Indexes for table `class_enroll`
--
ALTER TABLE `class_enroll`
  ADD PRIMARY KEY (`class_id`,`member_id`),
  ADD KEY `FKdu3hopls9wtttxxi4q0qc30h5` (`member_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `FK_classes_emp_id` (`employee_id`);

--
-- Indexes for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD PRIMARY KEY (`diet_plan_id`),
  ADD KEY `FK_diet_member_id` (`member_id`),
  ADD KEY `FK_diet_ins_id` (`instructor_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `FK_emp_branch_id` (`branch_id`),
  ADD KEY `FK_emp_role_id` (`role_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentid`),
  ADD KEY `FK_Equipment_Branch_id` (`branch_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD KEY `FK_feedback_mem_id` (`memberid`),
  ADD KEY `FK_feedback_class_id` (`class_id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorid`),
  ADD KEY `FK_ins_emp_id` (`employee_id`);

--
-- Indexes for table `instructor_member`
--
ALTER TABLE `instructor_member`
  ADD PRIMARY KEY (`member_id`,`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `FK_member_gym_id` (`gym_id`);

--
-- Indexes for table `memberplan`
--
ALTER TABLE `memberplan`
  ADD PRIMARY KEY (`memberplanid`),
  ADD KEY `FK_memplan_member_id` (`memberid`),
  ADD KEY `FK_membership_id` (`membership_list_id`);

--
-- Indexes for table `membership_list`
--
ALTER TABLE `membership_list`
  ADD PRIMARY KEY (`membershipid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `FK_payment_mem_id` (`member_id`),
  ADD KEY `FK_payment_gym_id` (`gym_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `body_measurement`
--
ALTER TABLE `body_measurement`
  MODIFY `body_measurement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `diet_plan`
--
ALTER TABLE `diet_plan`
  MODIFY `diet_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `gym_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `memberplan`
--
ALTER TABLE `memberplan`
  MODIFY `memberplanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_list`
--
ALTER TABLE `membership_list`
  MODIFY `membershipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `FK46dnc40blctk3s04bu4kbtjw8` FOREIGN KEY (`memberid`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `FKdwyqn75vy97trdi75gat4hspl` FOREIGN KEY (`class_id`) REFERENCES `class_schedule` (`class_id`);

--
-- Constraints for table `body_measurement`
--
ALTER TABLE `body_measurement`
  ADD CONSTRAINT `FK_body_measure_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `FK_branch_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`);

--
-- Constraints for table `class_enroll`
--
ALTER TABLE `class_enroll`
  ADD CONSTRAINT `FKdu3hopls9wtttxxi4q0qc30h5` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `FKeerebryj4hmds28rowm4iygey` FOREIGN KEY (`class_id`) REFERENCES `class_schedule` (`class_id`);

--
-- Constraints for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD CONSTRAINT `FK_classes_emp_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD CONSTRAINT `FK_diet_ins_id` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructorid`),
  ADD CONSTRAINT `FK_diet_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_emp_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branchid`),
  ADD CONSTRAINT `FK_emp_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `FK_Equipment_Branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branchid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback_class_id` FOREIGN KEY (`class_id`) REFERENCES `class_schedule` (`class_id`),
  ADD CONSTRAINT `FK_feedback_mem_id` FOREIGN KEY (`memberid`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `FK_ins_emp_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `instructor_member`
--
ALTER TABLE `instructor_member`
  ADD CONSTRAINT `FK7uv1dqlupt5ak1ft0tkfd6wtb` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `FKep61b9rlslojo98q2euq1cobx` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructorid`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_member_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`);

--
-- Constraints for table `memberplan`
--
ALTER TABLE `memberplan`
  ADD CONSTRAINT `FK_membership_id` FOREIGN KEY (`membership_list_id`) REFERENCES `membership_list` (`membershipid`),
  ADD CONSTRAINT `FK_memplan_member_id` FOREIGN KEY (`memberid`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `FK_payment_mem_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
