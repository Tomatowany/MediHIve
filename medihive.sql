-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medihive`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `allergyID` int(11) NOT NULL,
  `allergyName` varchar(255) NOT NULL,
  `allergyDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allergy`
--

INSERT INTO `allergy` (`allergyID`, `allergyName`, `allergyDescription`) VALUES
(1, 'Peanut Allergy', 'Great disdain with mani'),
(2, 'Latex Allergy', 'Allergy on Latex'),
(3, 'Shrimp Allergy', 'Allergy on shrimp a seafood');

-- --------------------------------------------------------

--
-- Table structure for table `casetbl`
--

CREATE TABLE `casetbl` (
  `caseID` int(11) NOT NULL,
  `caseName` varchar(255) NOT NULL,
  `caseDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casetbl`
--

INSERT INTO `casetbl` (`caseID`, `caseName`, `caseDescription`) VALUES
(7, 'Sore Eyes', 'Painful ini'),
(8, 'Cough', 'Painful as pache'),
(9, 'Coughs', 'Painful as paches'),
(10, 'Tonsilitis', 'Litis of the tonsil');

-- --------------------------------------------------------

--
-- Table structure for table `given_allergy`
--

CREATE TABLE `given_allergy` (
  `consultationID` int(11) NOT NULL,
  `allergyID` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `given_case`
--

CREATE TABLE `given_case` (
  `consultationID` int(11) NOT NULL,
  `caseID` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `given_medicine`
--

CREATE TABLE `given_medicine` (
  `consultationID` int(11) NOT NULL,
  `medicineID` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `consultationID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `diagnosis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`consultationID`, `patientID`, `staffID`, `datetime`, `diagnosis`) VALUES
(1, 1, 14, '2023-12-05 02:09:00', 'asdasdasdasd'),
(2, 1, 13, '2023-12-14 02:12:00', 'sdhdfhgdfgfdgdg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicineID` int(11) NOT NULL,
  `medicineName` varchar(255) NOT NULL,
  `medicineDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicineID`, `medicineName`, `medicineDescription`) VALUES
(8, 'Ibuprofen', 'Headache Medicines');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `pFName` varchar(255) NOT NULL,
  `pLName` varchar(255) NOT NULL,
  `patientType` varchar(255) NOT NULL,
  `bloodType` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `civilStatus` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `staffID`, `pFName`, `pLName`, `patientType`, `bloodType`, `birthdate`, `address`, `contactNo`, `civilStatus`, `nationality`, `sex`, `occupation`, `email`) VALUES
(1, 13, 'Angelo John', 'Landiao', 'Inpatient', 'O', '2023-12-07', 'Wenchester, London, UK', '97867596054', 'Married', 'English', 'Male', 'Prime Minister', 'estrada.landiao@gmail.com'),
(4, 13, 'Jim', 'Halpert', 'Inpatient', 'AB+', '1969-12-25', 'San Francisco, U.S.A', '09675847563', 'Married', 'American', 'Male', 'Assassin', 'thesalesman@gmail.com'),
(6, 13, 'Pam', 'Halpert', 'Outpatient', 'O', '1969-12-25', 'San Francisco, U.S.A', '09675847563', 'Married', 'American', 'Female', 'Paper Salesperson', 'pamtheartist@gmail.com'),
(21, 13, ' Jaja', 'Lao', 'Inpatient', 'O', '2017-05-17', 'Tetuan Z.C', '03215689512', 'Single', 'Filipino', 'Male', 'Pupil', 'jaja.com'),
(22, 13, 'Shasha', 'ashashas', 'Inpatient', 'O+', '2023-12-08', 'hdfhdfh', '09485759486', 'Single', 'Piany', 'Male', 'Student', 'Shash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `firstName`, `lastName`, `contact`, `password`, `address`, `email`, `role`) VALUES
(13, 'Winston', 'Churchills', '09785748372', '123123', 'England', 'churchill.winston@gmail.com', 'Admin'),
(14, 'Leonard', 'Igopers', '09473847362', '123123', 'Zamboanga City, Philippines', 'leonard@wmsu.edu.com', 'Staff'),
(15, 'Rubert', 'Dela Cruz', '09455748594', 'alabsapuz0m03', 'San Roque, Zamboanga City, Philippines', 'rubertpogs@gmail.com', 'Staff'),
(16, 'Jaydee', 'Ballaho', '09583968574', 'jaydeepogi123', 'Zamboanga City, Philippines', 'ballaho.admin@gmail.com', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`allergyID`);

--
-- Indexes for table `casetbl`
--
ALTER TABLE `casetbl`
  ADD PRIMARY KEY (`caseID`);

--
-- Indexes for table `given_allergy`
--
ALTER TABLE `given_allergy`
  ADD PRIMARY KEY (`consultationID`),
  ADD KEY `given_allergy_ibfk_1` (`allergyID`);

--
-- Indexes for table `given_case`
--
ALTER TABLE `given_case`
  ADD KEY `given_case_ibfk_1` (`caseID`),
  ADD KEY `given_case_ibfk_2` (`consultationID`);

--
-- Indexes for table `given_medicine`
--
ALTER TABLE `given_medicine`
  ADD KEY `given_medicine_ibfk_1` (`consultationID`),
  ADD KEY `given_medicine_ibfk_2` (`medicineID`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`consultationID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `allergyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `casetbl`
--
ALTER TABLE `casetbl`
  MODIFY `caseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `consultationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `given_allergy`
--
ALTER TABLE `given_allergy`
  ADD CONSTRAINT `given_allergy_ibfk_1` FOREIGN KEY (`allergyID`) REFERENCES `allergy` (`allergyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `given_allergy_ibfk_2` FOREIGN KEY (`consultationID`) REFERENCES `medical_record` (`consultationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `given_case`
--
ALTER TABLE `given_case`
  ADD CONSTRAINT `given_case_ibfk_1` FOREIGN KEY (`caseID`) REFERENCES `casetbl` (`caseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `given_case_ibfk_2` FOREIGN KEY (`consultationID`) REFERENCES `medical_record` (`consultationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `given_medicine`
--
ALTER TABLE `given_medicine`
  ADD CONSTRAINT `given_medicine_ibfk_1` FOREIGN KEY (`consultationID`) REFERENCES `medical_record` (`consultationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `given_medicine_ibfk_2` FOREIGN KEY (`medicineID`) REFERENCES `medicine` (`medicineID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`),
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
