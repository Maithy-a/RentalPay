-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 11:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(3) NOT NULL,
  `tenant_id` int(3) NOT NULL,
  `house_id` int(3) NOT NULL,
  `duration_month` int(2) NOT NULL,
  `total_rent` int(7) NOT NULL,
  `terms` int(2) NOT NULL,
  `rent_per_term` int(7) NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `date_contract_sign` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `tenant_id`, `house_id`, `duration_month`, `total_rent`, `terms`, `rent_per_term`, `start_day`, `end_day`, `date_contract_sign`, `status`) VALUES
(1, 1, 2, 12, 720000, 2, 360000, '2019-08-01', '2020-07-31', '2019-08-07 20:40:22', 'Active'),
(4, 5, 1, 3, 240000, 1, 240000, '2019-08-01', '2019-10-31', '2019-08-07 00:18:18', 'Active'),
(5, 6, 4, 12, 420000, 4, 105000, '2023-08-01', '2024-08-01', '2023-08-01 00:25:47', 'Active'),
(8, 9, 6, 6, 480000, 2, 240000, '2019-07-01', '2019-12-31', '2019-07-15 02:52:34', 'Inactive'),
(9, 4, 2, 3, 180000, 1, 180000, '2019-08-01', '2019-07-20', '2019-07-19 03:12:17', 'Inactive'),
(12, 10, 2, 12, 720000, 4, 180000, '2019-07-01', '2020-06-30', '2019-07-23 12:20:10', 'Inactive'),
(15, 4, 7, 3, 180000, 1, 180000, '2019-08-01', '2019-10-31', '2019-08-04 00:18:11', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(3) NOT NULL,
  `house_name` varchar(10) NOT NULL,
  `compartment` enum('Yes','No') NOT NULL,
  `rent_per_month` int(6) NOT NULL,
  `status` enum('Occupied','Empty') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_name`, `compartment`, `rent_per_month`, `status`) VALUES
(1, 'A1', 'Yes', 80000, 'Occupied'),
(2, 'A2', 'No', 60000, 'Occupied'),
(3, 'D3', 'No', 60000, 'Empty'),
(4, 'C4', 'Yes', 35000, 'Occupied'),
(6, 'A3', 'Yes', 80000, 'Empty'),
(7, 'A4', 'No', 60000, 'Occupied'),
(8, 'B3', 'Yes', 35000, 'Empty'),
(9, 'D5', 'Yes', 35000, 'Empty'),
(10, 'A7', 'Yes', 50000, 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(3) NOT NULL,
  `tenant_id` int(3) NOT NULL,
  `ref_no` varchar(11) NOT NULL,
  `amount` int(7) NOT NULL,
  `pay_from` varchar(20) NOT NULL,
  `pay_to` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `tenant_id`, `ref_no`, `amount`, `pay_from`, `pay_to`, `date`) VALUES
(2, 4, '2147483647', 180000, 'August 2019', 'October 2019', '2019-08-08 11:11:19'),
(4, 4, '8654712358', 180000, 'February 2020', 'April 2020', '2019-08-08 12:56:45'),
(5, 6, '784156978', 210000, 'August 2019', 'October 2019', '2019-08-08 13:10:15'),
(6, 6, '7456257832', 210000, 'November 2019', 'January 2020', '2019-08-08 13:40:31'),
(7, 6, '39222962841', 210000, 'February 2020', 'April 2020', '2019-08-08 14:15:58'),
(8, 5, '1551327804', 240000, 'August 2019', 'October 2019', '2019-08-09 14:24:29'),
(9, 6, '71308220851', 60000, 'May 2020', 'June 2020', '2019-08-14 11:06:25'),
(10, 6, '72912660562', 70000, 'June 2020', 'July 2020', '2019-08-14 11:22:13'),
(11, 6, '36480604749', 30000, 'August 2020', 'August 2020', '2019-08-14 11:30:35'),
(12, 9, '2099451721', 150000, 'August 2019', 'October 2019', '2019-08-15 10:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(3) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `programme` varchar(30) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `p_no` varchar(15) NOT NULL,
  `pno1` varchar(15) NOT NULL,
  `e_address` varchar(30) NOT NULL,
  `p_address` varchar(40) NOT NULL,
  `city` varchar(15) NOT NULL,
  `region` varchar(15) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `p_word` varchar(60) NOT NULL,
  `day_reg` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `fname`, `lname`, `programme`, `reg_no`, `occupation`, `p_no`, `pno1`, `e_address`, `p_address`, `city`, `region`, `u_name`, `p_word`, `day_reg`, `status`) VALUES
(1, 'Bonface', 'Maithya', 'DIT', 'DIT121-0904/2022', '', '254110007950', '255746553132', 'Maithyabon2@gmail.com', 'Kitengela', 'Nairobi', 'Kajiado', 'Maithya', '1817785c8c24645caed9264f5cac4f31', '2023-07-14', 0),
(4, 'Genny', 'Mnzava', '', '', 'Lecturer', '', '255746553132', 'genesisf@yahoo.com', '2522, Arusha', 'Arusha', 'Arusha', 'geneswaa', 'fe3742082b02380c86075d11ba88ebc0', '2019-07-14', 1),
(5, 'Agape', 'Tunzo', '', '', 'Saleswoman', '255717812676', '255746553132', 'agapemnzava@yahoo.com', '2522, Arusha', 'Arusha', 'Arusha', 'narindwa', '144d87c8323749c9bf3f0c71d3182f9d', '2019-07-14', 1),
(6, 'Ivy', 'Maina', '', '', 'Engineer', '255717812676', '255746553132', 'Mainaivy123@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Ivy2003', '25f9e794323b453885f5181f1b624d0b', '2019-07-15', 1),
(9, 'Andy', 'Tunzo', '', '', 'Manager', '255717812676', '255746553132', 'andy123@hotmail.com', '2522, Arusha', 'Arusha', 'Arusha', 'andrew', 'd41555c72445d4a3b05de048fe5f3e0d', '2019-07-15', 1),
(10, 'Love', 'Faith', '', '', 'Assistant Manager', '255717812676', '255746553132', 'faithtunzo@google.com', '2522, Arusha', 'Arusha', 'Arusha', 'loveness', '1817785c8c24645caed9264f5cac4f31', '2019-07-23', 2),
(11, 'qwert', 'yuiop', '', '', 'Plumber', '0784565656', '0784565656', 'faith.tunzo@yahoo.com', '345,Iringa', 'Iringa', 'Iringa', 'asdfg', '123456789', '2019-08-04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_contacts`
--

CREATE TABLE `tenant_contacts` (
  `contact_id` int(3) NOT NULL,
  `tenant_id` int(3) NOT NULL,
  `fname1` varchar(30) NOT NULL,
  `lname1` varchar(30) NOT NULL,
  `occupation1` varchar(30) NOT NULL,
  `nature1` varchar(20) NOT NULL,
  `pno1` varchar(15) NOT NULL,
  `pno2` varchar(15) NOT NULL,
  `e_address1` varchar(30) NOT NULL,
  `p_address1` varchar(40) NOT NULL,
  `city1` varchar(15) NOT NULL,
  `region1` varchar(15) NOT NULL,
  `fname2` varchar(30) NOT NULL,
  `lname2` varchar(30) NOT NULL,
  `occupation2` varchar(30) NOT NULL,
  `nature2` varchar(20) NOT NULL,
  `pno3` varchar(15) NOT NULL,
  `pno4` varchar(15) NOT NULL,
  `e_address2` varchar(30) NOT NULL,
  `p_address2` varchar(40) NOT NULL,
  `city2` varchar(15) NOT NULL,
  `region2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tenant_contacts`
--

INSERT INTO `tenant_contacts` (`contact_id`, `tenant_id`, `fname1`, `lname1`, `occupation1`, `nature1`, `pno1`, `pno2`, `e_address1`, `p_address1`, `city1`, `region1`, `fname2`, `lname2`, `occupation2`, `nature2`, `pno3`, `pno4`, `e_address2`, `p_address2`, `city2`, `region2`) VALUES
(1, 1, 'Simon', 'Maina', 'Lecturer', 'Brother', '0784949021', '0717225082', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Teacher', 'dad', '0754698589', '0658698589', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(4, 4, 'Stephen', 'Kanyi', 'Lecturer', 'Grandfather', '0712121212', '0745121212', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Teacher', 'brother', '0745151515', '0754151515', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(5, 5, 'Philip', 'Karanja', 'Lecturer', 'Brother', '0712121212', '0745121212', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Lecturer', 'brother', '0745151515', '0754151515', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(6, 6, 'Tugi', 'Kimani', 'Lecturer', 'Cousin', '0712121212', '0745121212', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Teacher', 'brother', '0745151515', '0754151515', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(9, 9, 'Celestine', 'Matei', 'Lecturer', 'Sister', '0712121212', '0745121212', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Lecturer', 'brother', '0745151515', '0754151515', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(11, 10, 'Abel', 'Mutua', 'Lecturer', 'Father', '0712121212', '0745121212', 'Maithyabon2@gmail.com', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Teacher', 'brother', '0745151515', '0754151515', 'bonn.dev254@gmail.com', '2544, Kajiado', 'Kitengela', 'Kajiado'),
(12, 11, 'Timothy', 'Kimani', 'Lecturer', 'Uncle', '0717454545', '0745151515', '', '2522, Nairobi', 'Nairobi', 'Nairobi', 'Bonface', 'Maithya', 'Lecturer', 'brother', '0745151515', '0717454545', '', '2544, Kajiado', 'Kitengela', 'Kajiado');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_in`
--

CREATE TABLE `tenant_in` (
  `in_id` int(3) NOT NULL,
  `contract_id` int(3) NOT NULL,
  `stat_keyholder` enum('Good','Average','Bad') NOT NULL,
  `stat_electricityRemote` enum('Good','Average','Bad') NOT NULL,
  `no_bulbs` int(2) NOT NULL,
  `stat_bulbs` enum('Good','Average','Bad') NOT NULL,
  `stat_paint` enum('Good','Average','Bad') NOT NULL,
  `stat_Windows` enum('Good','Average','Bad') NOT NULL,
  `stat_toiletSink` enum('Good','Average','Bad') NOT NULL,
  `stat_washingSink` enum('Good','Average','Bad') NOT NULL,
  `stat_doorLock` enum('Good','Average','Bad') NOT NULL,
  `stat_toiletDoorLock` enum('Good','Average','Bad') NOT NULL,
  `water_units` int(5) NOT NULL,
  `comments` text NOT NULL,
  `date_reg` date NOT NULL,
  `status` enum('Checked','Unchecked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='"stat" represents the status/condition of an item';

--
-- Dumping data for table `tenant_in`
--

INSERT INTO `tenant_in` (`in_id`, `contract_id`, `stat_keyholder`, `stat_electricityRemote`, `no_bulbs`, `stat_bulbs`, `stat_paint`, `stat_Windows`, `stat_toiletSink`, `stat_washingSink`, `stat_doorLock`, `stat_toiletDoorLock`, `water_units`, `comments`, `date_reg`, `status`) VALUES
(1, 5, 'Good', 'Average', 2, 'Good', 'Average', 'Average', '', 'Average', 'Average', 'Average', 123, 'Please fix', '2019-08-08', 'Checked');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_out`
--

CREATE TABLE `tenant_out` (
  `out_id` int(3) NOT NULL,
  `contract_id` int(3) NOT NULL,
  `stat_keyholder` enum('Good','Average','Bad') NOT NULL,
  `stat_electricityRemote` enum('Good','Average','Bad') NOT NULL,
  `no_bulbs` int(2) NOT NULL,
  `stat_bulbs` enum('Good','Average','Bad') NOT NULL,
  `stat_paint` enum('Good','Average','Bad') NOT NULL,
  `stat_Windows` enum('Good','Average','Bad') NOT NULL,
  `stat_toiletSink` enum('Good','Average','Bad') NOT NULL,
  `stat_washingSink` enum('Good','Average','Bad') NOT NULL,
  `stat_doorLock` enum('Good','Average','Bad') NOT NULL,
  `stat_toiletDoorLock` enum('Good','Average','Bad') NOT NULL,
  `comments` text NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tenant_out`
--

INSERT INTO `tenant_out` (`out_id`, `contract_id`, `stat_keyholder`, `stat_electricityRemote`, `no_bulbs`, `stat_bulbs`, `stat_paint`, `stat_Windows`, `stat_toiletSink`, `stat_washingSink`, `stat_doorLock`, `stat_toiletDoorLock`, `comments`, `date_reg`) VALUES
(1, 9, 'Good', 'Good', 2, 'Average', 'Good', 'Good', 'Good', 'Good', 'Average', 'Average', 'Gotta Pay', '2019-08-08'),
(2, 12, '', 'Bad', 1, '', 'Average', 'Good', 'Average', 'Good', 'Good', 'Average', 'Has to pay', '2019-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` enum('Administrator','Manager') NOT NULL,
  `pno` varchar(15) NOT NULL,
  `u_name` varchar(10) NOT NULL,
  `pword` varchar(60) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `role`, `pno`, `u_name`, `pword`, `date_reg`) VALUES
(1, 'RHMS', 'Administrator', '254110007950', 'Administra', '200ceb26807d6bf99fd6f4f0d1ca54d4', '2019-07-15'),
(2, 'Barack Kamau', 'Manager', '254114 286705', 'JJ', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-08-09'),
(3, 'ERHMS', 'Administrator', '254110007950', 'ADMIN', 'ADMIN123', '2024-08-23'),
(4, 'CHRISTINE', 'Manager', '254110007950', 'MACIRA', '25f9e794323b453885f5181f1b624d0b', '2024-08-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`),
  ADD UNIQUE KEY `house_name` (`house_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `ref_no` (`ref_no`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `tenant_contacts`
--
ALTER TABLE `tenant_contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `tenant_in`
--
ALTER TABLE `tenant_in`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `tenant_out`
--
ALTER TABLE `tenant_out`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant_contacts`
--
ALTER TABLE `tenant_contacts`
  MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tenant_in`
--
ALTER TABLE `tenant_in`
  MODIFY `in_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenant_out`
--
ALTER TABLE `tenant_out`
  MODIFY `out_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- Constraints for table `tenant_contacts`
--
ALTER TABLE `tenant_contacts`
  ADD CONSTRAINT `tenant_contacts_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- Constraints for table `tenant_in`
--
ALTER TABLE `tenant_in`
  ADD CONSTRAINT `tenant_in_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);

--
-- Constraints for table `tenant_out`
--
ALTER TABLE `tenant_out`
  ADD CONSTRAINT `tenant_out_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
