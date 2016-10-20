-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2016 at 08:19 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthome`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera_images`
--

CREATE TABLE `camera_images` (
  `imgID` int(5) NOT NULL,
  `cameraID` int(4) NOT NULL,
  `imgDate` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `imgPath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `DeviceID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `DeviceName` varchar(20) NOT NULL,
  `DeviceState` bit(1) NOT NULL,
  `GateNum` int(3) NOT NULL,
  `DeviceImgPath_on` varchar(50) NOT NULL,
  `DeviceImgPath_off` varchar(50) NOT NULL,
  `isStatusChanged` bit(1) NOT NULL DEFAULT b'0',
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `StepperMotorMoves` int(2) DEFAULT NULL,
  `Watts` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceID`, `RoomID`, `DeviceName`, `DeviceState`, `GateNum`, `DeviceImgPath_on`, `DeviceImgPath_off`, `isStatusChanged`, `lastStatusChange`, `StepperMotorMoves`, `Watts`) VALUES
(101, 101, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-19 13:27:10', NULL, 120),
(102, 101, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'1', '2016-10-19 13:14:18', NULL, 1800),
(103, 101, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-10-19 13:27:08', 0, 0),
(201, 102, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:31:53', NULL, 60),
(202, 102, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', b'1', '2016-10-19 11:31:18', NULL, 1200),
(203, 102, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-10-19 13:27:06', 0, 0),
(401, 104, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:31:56', NULL, 60),
(402, 104, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', b'0', '2016-10-19 11:31:05', NULL, 1200),
(403, 104, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png', b'0', '2016-10-19 07:12:46', 0, 0),
(501, 105, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:32:33', NULL, 180),
(502, 105, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'0', '2016-10-19 11:32:38', NULL, 2400),
(503, 105, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png', b'0', '2016-10-19 07:12:50', 0, 0),
(601, 106, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:33:29', NULL, 120),
(602, 106, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'0', '2016-10-19 11:33:25', NULL, 1800),
(701, 107, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-19 11:33:49', NULL, 60),
(801, 108, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:33:51', NULL, 60),
(901, 109, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-19 11:33:59', NULL, 120),
(902, 109, 'Garage Door', b'1', 0, 'Garage-door_open.png', 'Garage-door_closed.png', b'0', '2016-10-19 07:12:55', 0, 0),
(1001, 110, 'Security Camera 1', b'1', 0, 'security-camera_on.png', 'security-camera_off.png', b'0', '2016-10-04 15:02:43', NULL, 0),
(1002, 110, 'Security Camera 2', b'0', 0, 'security-camera_on.png', 'security-camera_off.png', b'0', '2016-10-05 12:11:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(4) NOT NULL,
  `RoomName` varchar(20) NOT NULL,
  `RoomImgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `RoomImgPath`) VALUES
(101, 'Parents Room', 'bedroom-double1.png'),
(102, 'Ahmad\'s Room', 'bedroom-male1.png'),
(104, 'Sarah\'s Room', 'bedroom-female1.png'),
(105, 'Living Room', 'livingroom3.png'),
(106, 'Kitchen', 'kitchen1.png'),
(107, 'Parents Bathroom', 'bathroom0.png'),
(108, 'Bathroom', 'bathroom6.png'),
(109, 'Garage', 'garage2.png'),
(110, 'House Parameters', 'house-parameters2.png');

-- --------------------------------------------------------

--
-- Table structure for table `room_backgrounds`
--

CREATE TABLE `room_backgrounds` (
  `ImageID` int(5) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `isDefault` bit(1) NOT NULL DEFAULT b'0',
  `ImgPath` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_backgrounds`
--

INSERT INTO `room_backgrounds` (`ImageID`, `RoomID`, `isDefault`, `ImgPath`) VALUES
(1, 101, b'1', 'bedroom-double1.png'),
(2, 105, b'1', 'livingroom1.png'),
(3, 105, b'1', 'livingroom2.png'),
(4, 105, b'1', 'livingroom3.png'),
(5, 109, b'1', 'garage0.png'),
(6, 109, b'1', 'garage1.png'),
(7, 109, b'1', 'garage2.png'),
(8, 109, b'1', 'garage3.png'),
(9, 110, b'1', 'house-parameters1.png'),
(10, 110, b'1', 'house-parameters2.png'),
(11, 106, b'1', 'kitchen1.png'),
(12, 106, b'1', 'kitchen2.png'),
(13, 106, b'1', 'kitchen3.png'),
(14, 108, b'1', 'bathroom0.png'),
(15, 108, b'1', 'bathroom1.png'),
(16, 108, b'1', 'bathroom2.png'),
(17, 108, b'1', 'bathroom3.png'),
(18, 108, b'1', 'bathroom4.png'),
(19, 108, b'1', 'bathroom5.png'),
(20, 108, b'1', 'bathroom6.png'),
(21, 107, b'1', 'bathroom0.png'),
(22, 107, b'1', 'bathroom1.png'),
(23, 107, b'1', 'bathroom2.png'),
(24, 107, b'1', 'bathroom3.png'),
(25, 107, b'1', 'bathroom4.png'),
(26, 107, b'1', 'bathroom5.png'),
(27, 107, b'1', 'bathroom6.png'),
(28, 104, b'1', 'bedroom-female1.png'),
(29, 104, b'1', 'bedroom-female2.png'),
(30, 102, b'1', 'bedroom-male1.png'),
(31, 102, b'1', 'bedroom-male2.png'),
(32, 102, b'1', 'bedroom-male3.png'),
(37, 106, b'1', 'kitchen4.png'),
(38, 106, b'1', 'kitchen5.png'),
(39, 101, b'1', 'bedroom-double2.png'),
(40, 101, b'1', 'bedroom-double3.png');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `SensorID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SensorName` varchar(20) NOT NULL,
  `SenesorState` bit(1) NOT NULL,
  `GateNum` int(3) NOT NULL,
  `SensorValue` int(4) NOT NULL DEFAULT '0',
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `RoomID`, `SensorName`, `SenesorState`, `GateNum`, `SensorValue`, `lastStatusChange`) VALUES
(101, 101, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(102, 101, 'Temperature Sensor', b'0', 0, 27, '2016-10-19 09:07:08'),
(201, 102, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(202, 102, 'Temperature Sensor', b'0', 0, 20, '2016-10-19 09:07:04'),
(401, 104, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(402, 104, 'Temperature Sensor', b'0', 0, 18, '2016-10-19 09:06:59'),
(501, 105, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(502, 105, 'Temperature Sensor', b'0', 0, 16, '2016-10-19 09:06:53'),
(601, 106, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(602, 106, 'Temperature Sensor', b'0', 0, 23, '2016-10-19 09:06:45'),
(603, 106, 'Smoke Detector', b'0', 0, 0, '2016-10-01 21:00:00'),
(701, 107, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(801, 108, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(901, 109, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(1001, 110, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00'),
(1002, 110, 'Motion Sensor', b'0', 0, 0, '2016-10-01 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(6) NOT NULL,
  `userID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `isDefault` bit(1) NOT NULL DEFAULT b'0',
  `TaskName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ActionTime` timestamp NOT NULL,
  `Duration_Minute` int(3) NOT NULL,
  `repeatDaily` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `userID`, `RoomID`, `isDefault`, `TaskName`, `ActionTime`, `Duration_Minute`, `repeatDaily`) VALUES
(1, 1, 101, b'1', 'asd', '2016-10-15 13:18:42', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `task_devices`
--

CREATE TABLE `task_devices` (
  `TaskID` int(6) NOT NULL,
  `SensorID` int(4) NOT NULL,
  `DeviceID` int(4) NOT NULL,
  `RequiredDeviceStatus` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_devices`
--

INSERT INTO `task_devices` (`TaskID`, `SensorID`, `DeviceID`, `RequiredDeviceStatus`) VALUES
(1, 101, 101, b'1'),
(1, 101, 102, b'0'),
(1, 101, 103, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(4) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `UserName` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `UserImagePath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Email`, `UserName`, `Description`, `Password`, `isAdmin`, `UserImagePath`) VALUES
(1, 'eyad.jaamour@gmail.com', 'Eyad Jaamour', 'Admin', '1234', 1, 'eyad.jpg'),
(2, 'mkb_2011@hotmail.com', 'Mohsen Bakhashab', 'Admin', '1234', 1, 'Mohsen.jpg'),
(3, 'abdullah.alghamdi@gmail.com', 'Abdullah Alghamdi', 'Father', '123321', 1, 'abdullah.jpg'),
(4, 'Huda.Azzahrani@gmail.com', 'Huda Azzahrani', 'Mother', '123455', 0, 'huda.png'),
(5, 'Ahmad.alghamdi@hotmail.com', 'Ahmad alghamdi', 'Son', '123123', 0, 'ahmad.jpg'),
(7, 'Sarah.alghamdi@gmail.com', 'Sarah Alghamdi', 'Daughter', '44332211', 0, 'sarah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_authorized_rooms`
--

CREATE TABLE `user_authorized_rooms` (
  `UserID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL
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
(7, 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera_images`
--
ALTER TABLE `camera_images`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `cameraID` (`cameraID`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`DeviceID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  ADD PRIMARY KEY (`ImageID`,`RoomID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`SensorID`),
  ADD KEY `sensor_ibfk_1` (`RoomID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `task_devices`
--
ALTER TABLE `task_devices`
  ADD PRIMARY KEY (`TaskID`,`SensorID`,`DeviceID`),
  ADD KEY `SensorID` (`SensorID`),
  ADD KEY `DeviceID` (`DeviceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_authorized_rooms`
--
ALTER TABLE `user_authorized_rooms`
  ADD PRIMARY KEY (`UserID`,`RoomID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera_images`
--
ALTER TABLE `camera_images`
  MODIFY `imgID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  MODIFY `ImageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `camera_images`
--
ALTER TABLE `camera_images`
  ADD CONSTRAINT `camera_images_ibfk_1` FOREIGN KEY (`cameraID`) REFERENCES `device` (`DeviceID`);

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  ADD CONSTRAINT `room_backgrounds_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

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
  ADD CONSTRAINT `task_devices_ibfk_2` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`),
  ADD CONSTRAINT `task_devices_ibfk_3` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`),
  ADD CONSTRAINT `task_devices_ibfk_4` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`);

--
-- Constraints for table `user_authorized_rooms`
--
ALTER TABLE `user_authorized_rooms`
  ADD CONSTRAINT `user_authorized_rooms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `user_authorized_rooms_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
