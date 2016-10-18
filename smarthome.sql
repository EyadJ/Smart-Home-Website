-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 12:05 AM
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
  `imgDate` timestamp NOT NULL,
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
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceID`, `RoomID`, `DeviceName`, `DeviceState`, `GateNum`, `DeviceImgPath_on`, `DeviceImgPath_off`, `lastStatusChange`) VALUES
(101, 101, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '2016-10-06 18:24:34'),
(102, 101, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', '2016-10-07 14:01:34'),
(103, 101, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png', '2016-10-06 18:24:36'),
(201, 102, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '2016-10-05 15:47:55'),
(202, 102, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', '2016-10-07 16:43:42'),
(203, 102, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png', '2016-10-06 13:22:51'),
(301, 103, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '0000-00-00 00:00:00'),
(302, 103, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', '2016-10-06 18:24:36'),
(303, 103, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png', '2016-10-06 18:24:37'),
(401, 104, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '2016-10-04 15:03:02'),
(402, 104, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', '2016-10-06 20:28:43'),
(403, 104, 'Curtains', b'1', 0, 'curtains_opened.png', 'curtains_closed.png', '2016-10-06 12:37:49'),
(501, 105, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '0000-00-00 00:00:00'),
(502, 105, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', '0000-00-00 00:00:00'),
(503, 105, 'Curtains', b'0', 0, 'curtains_opened.png', 'curtains_closed.png', '2016-10-06 12:37:50'),
(601, 106, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '0000-00-00 00:00:00'),
(602, 106, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', '2016-10-06 20:28:44'),
(701, 107, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '2016-10-04 15:02:35'),
(801, 108, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '0000-00-00 00:00:00'),
(901, 109, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', '2016-10-06 18:27:21'),
(902, 109, 'Garage Door', b'0', 0, 'Garage-door_open.png', 'Garage-door_closed.png', '2016-10-06 20:00:52'),
(1001, 110, 'Security Camera 1', b'1', 0, 'security-camera_on.png', 'security-camera_off.png', '2016-10-04 15:02:43'),
(1002, 110, 'Security Camera 2', b'0', 0, 'security-camera_on.png', 'security-camera_off.png', '2016-10-05 12:11:53');

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
(102, 'Ahmad\'s Room', 'bedroom-male0.png'),
(103, 'Khaled\'s Room', 'bedroom-male0.png'),
(104, 'Sarah\'s Room', ''),
(105, 'Living Room', 'livingroom2.png'),
(106, 'Kitchen', 'kitchen1.png'),
(107, 'Parents Bathroom', 'bathroom0.png'),
(108, 'Bathroom', 'bathroom1.png'),
(109, 'Garage', 'garage3.png'),
(110, 'House Parameters', 'house-parameters1.png');

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
(33, 103, b'1', 'bedroom-male0.png'),
(34, 103, b'1', 'bedroom-male1.png'),
(35, 103, b'1', 'bedroom-male2.png'),
(36, 103, b'1', 'bedroom-male3.png'),
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
  `OnTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `RoomID`, `SensorName`, `SenesorState`, `GateNum`, `OnTime`) VALUES
(101, 101, 'Motion Sensor', b'0', 0, '2016-10-02'),
(102, 101, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(201, 102, 'Motion Sensor', b'0', 0, '2016-10-02'),
(202, 102, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(301, 103, 'Motion Sensor', b'0', 0, '2016-10-02'),
(302, 103, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(401, 104, 'Motion Sensor', b'0', 0, '2016-10-02'),
(402, 104, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(501, 105, 'Motion Sensor', b'0', 0, '2016-10-02'),
(502, 105, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(601, 106, 'Motion Sensor', b'0', 0, '2016-10-02'),
(602, 106, 'Temperature Sensor', b'0', 0, '2016-10-02'),
(603, 106, 'Smoke Detector', b'0', 0, '2016-10-02'),
(701, 107, 'Motion Sensor', b'0', 0, '2016-10-02'),
(801, 108, 'Motion Sensor', b'0', 0, '2016-10-02'),
(901, 109, 'Motion Sensor', b'0', 0, '2016-10-02'),
(1001, 110, 'Motion Sensor', b'0', 0, '2016-10-02'),
(1002, 110, 'Motion Sensor', b'0', 0, '2016-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(6) NOT NULL,
  `userID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `isDefault` bit(1) NOT NULL,
  `TaskName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ActionTime` date NOT NULL,
  `Duration_Minute` int(3) NOT NULL,
  `repeatDaily` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_devices`
--

CREATE TABLE `task_devices` (
  `TaskID` int(6) NOT NULL,
  `SensorID` int(4) NOT NULL,
  `DeviceID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'Khaled.alghamdi@yahoo.com', 'Khaled alghamdi', 'Son', '43211', 0, 'khaled.jpg'),
(7, 'Sarah.alghamdi@gmail.com', 'Sarah Alghamdi', 'Daughter', '44332211', 0, 'sarah.jpg'),
(12, 'asd@asd.asd', 'asd3', 'asds', 'asd123', 0, 'heffner-performance-audi-r8-twinturbo-4.jpg');

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
(6, 103),
(6, 109),
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
  ADD PRIMARY KEY (`TaskID`,`DeviceID`),
  ADD KEY `TaskID` (`TaskID`,`SensorID`,`DeviceID`),
  ADD KEY `DeviceID` (`DeviceID`),
  ADD KEY `SensorID` (`SensorID`);

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
  MODIFY `ImageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `task_devices_ibfk_1` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`),
  ADD CONSTRAINT `task_devices_ibfk_2` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`),
  ADD CONSTRAINT `task_devices_ibfk_3` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`);

--
-- Constraints for table `user_authorized_rooms`
--
ALTER TABLE `user_authorized_rooms`
  ADD CONSTRAINT `user_authorized_rooms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `user_authorized_rooms_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
