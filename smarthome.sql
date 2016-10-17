-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 02:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smarthome`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `DeviceID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `DeviceName` varchar(20) NOT NULL,
  `DeviceState` bit(1) NOT NULL,
  `GateNum` int(3) NOT NULL,
  `DeviceImgPath_on` varchar(50) NOT NULL,
  `DeviceImgPath_off` varchar(50) NOT NULL,
  PRIMARY KEY (`DeviceID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceID`, `RoomID`, `DeviceName`, `DeviceState`, `GateNum`, `DeviceImgPath_on`, `DeviceImgPath_off`) VALUES
(101, 101, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(102, 101, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png'),
(103, 101, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png'),
(201, 102, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(202, 102, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png'),
(203, 102, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png'),
(301, 103, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(302, 103, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png'),
(303, 103, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png'),
(401, 104, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(402, 104, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png'),
(403, 104, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png'),
(501, 105, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(502, 105, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png'),
(503, 105, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png'),
(601, 106, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(602, 106, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png'),
(701, 107, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(801, 108, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(901, 109, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(902, 109, 'Garage Door', b'0', 0, 'Garage-door_open.png', 'Garage-door_closed.png'),
(1001, 110, 'Security Camera 1', b'1', 0, 'security-camera_on.png', 'security-camera_off.png'),
(1002, 110, 'Security Camera 2', b'0', 0, 'security-camera_on.png', 'security-camera_off.png');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` int(4) NOT NULL,
  `RoomName` varchar(20) NOT NULL,
  `RoomImgPath` varchar(100) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `RoomImgPath`) VALUES
(101, 'Parents Room', 'sleeping room - double.jpg'),
(102, 'Ahmad''s Room', 'sleeping room - male.jpg'),
(103, 'Khaled''s Room', 'sleeping room - male.jpg'),
(104, 'Sarah''s Room', 'sleeping room - female (2).jpg'),
(105, 'Living Room', 'Living room.jpg'),
(106, 'Kitchen', 'kitchen3.png'),
(107, 'Parents Bathroom', 'Bathroom1.png'),
(108, 'Bathroom', 'Bathroom2.jpg'),
(109, 'Garage', 'garage.jpg'),
(110, 'House Parameters', 'house_parameters.png');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE IF NOT EXISTS `sensor` (
  `SensorID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SensorName` varchar(20) NOT NULL,
  `SenesorState` bit(1) NOT NULL,
  `GateNum` int(3) NOT NULL,
  `OnTime` date NOT NULL,
  PRIMARY KEY (`SensorID`),
  KEY `sensor_ibfk_1` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `RoomID`, `SensorName`, `SenesorState`, `GateNum`, `OnTime`) VALUES
(101, 101, 'Motion Sensor', b'0', 0, '2016-10-02'),
(201, 102, 'Motion Sensor', b'0', 0, '2016-10-02'),
(301, 103, 'Motion Sensor', b'0', 0, '2016-10-02'),
(401, 104, 'Motion Sensor', b'0', 0, '2016-10-02'),
(501, 105, 'Motion Sensor', b'0', 0, '2016-10-02'),
(601, 106, 'Motion Sensor', b'0', 0, '2016-10-02'),
(602, 106, 'Smoke Detector', b'0', 0, '2016-10-02'),
(701, 107, 'Motion Sensor', b'0', 0, '2016-10-02'),
(801, 108, 'Motion Sensor', b'0', 0, '2016-10-02'),
(901, 109, 'Motion Sensor', b'0', 0, '2016-10-02'),
(1001, 110, 'Motion Sensor', b'0', 0, '2016-10-02'),
(1002, 110, 'Motion Sensor', b'0', 0, '2016-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `TaskID` int(6) NOT NULL,
  `userID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `TaskName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ActionTime` date NOT NULL,
  `repeatDaily` bit(1) NOT NULL,
  PRIMARY KEY (`TaskID`),
  KEY `userID` (`userID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_devices`
--

CREATE TABLE IF NOT EXISTS `task_devices` (
  `TaskID` int(6) NOT NULL,
  `SensorID` int(4) NOT NULL,
  `DeviceID` int(4) NOT NULL,
  PRIMARY KEY (`TaskID`,`DeviceID`),
  KEY `TaskID` (`TaskID`,`SensorID`,`DeviceID`),
  KEY `DeviceID` (`DeviceID`),
  KEY `SensorID` (`SensorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(4) NOT NULL AUTO_INCREMENT,
  `Email` varchar(40) NOT NULL,
  `UserName` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `UserImagePath` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Email`, `UserName`, `Description`, `Password`, `isAdmin`, `UserImagePath`) VALUES
(1, 'eyad.jaamour@gmail.com', 'Eyad Jaamour', 'Admin', '1234', 1, 'eyad.jpg'),
(2, 'mkb_2011@hotmail.com', 'Mohsen Bakhashab', 'Admin', '1234', 1, 'Mohsen.jpg'),
(3, 'abdullah.alghamdi@gmail.com', 'Abdullah Alghamdi', 'Father', '123321', 1, 'abdullah.jpg'),
(4, 'Huda.Azzahrani@gmail.com', 'Huda Azzahrani', 'Mother', '123455', 0, 'huda.png'),
(5, 'Ahmad.alghamdi@hotmail.com', 'Ahmad alghamdi', 'Son', '123123', 0, 'ahmad.jpg'),
(6, 'Khaled.alghamdi@yahoo.com', 'Khaled alghamdi', 'Son', '43211', 0, 'khaled.jpg'),
(7, 'Sarah.alghamdi@gmail.com', 'Sarah Alghamdi', 'Daughter', '44332211', 0, 'sarah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_authorized_rooms`
--

CREATE TABLE IF NOT EXISTS `user_authorized_rooms` (
  `UserID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  PRIMARY KEY (`UserID`,`RoomID`),
  KEY `UserID` (`UserID`),
  KEY `RoomID` (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authorized_rooms`
--

INSERT INTO `user_authorized_rooms` (`UserID`, `RoomID`) VALUES
(4, 101),
(4, 106),
(4, 107),
(5, 102),
(5, 109),
(6, 103),
(6, 109),
(7, 104);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `task_devices`
--
ALTER TABLE `task_devices`
  ADD CONSTRAINT `task_devices_ibfk_3` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`),
  ADD CONSTRAINT `task_devices_ibfk_1` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`),
  ADD CONSTRAINT `task_devices_ibfk_2` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`);

--
-- Constraints for table `user_authorized_rooms`
--
ALTER TABLE `user_authorized_rooms`
  ADD CONSTRAINT `user_authorized_rooms_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `user_authorized_rooms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
