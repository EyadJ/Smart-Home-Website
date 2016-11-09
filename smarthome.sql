-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 12:19 PM
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
  `GateNum` int(3) DEFAULT '0',
  `DeviceImgPath_on` varchar(50) NOT NULL,
  `DeviceImgPath_off` varchar(50) NOT NULL,
  `isStatusChanged` bit(1) NOT NULL DEFAULT b'0',
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Watts` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceID`, `RoomID`, `DeviceName`, `DeviceState`, `GateNum`, `DeviceImgPath_on`, `DeviceImgPath_off`, `isStatusChanged`, `lastStatusChange`, `Watts`) VALUES
(101, 101, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-11-07 08:21:50', 120),
(102, 101, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'1', '2016-11-07 19:03:12', 1800),
(103, 101, 'Curtains', b'1', -1, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-11-07 19:03:13', 0),
(104, 101, 'Alarm', b'0', -1, 'alarm.png', 'alarm_off.png', b'1', '2016-11-02 17:03:58', 0),
(201, 102, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-28 06:46:43', 60),
(202, 102, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'1', '2016-10-28 06:46:37', 1200),
(203, 102, 'Curtains', b'1', -1, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-11-02 17:04:01', 0),
(204, 102, 'Alarm', b'0', -1, 'alarm.png', 'alarm_off.png', b'1', '2016-11-05 04:01:19', 0),
(401, 104, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-20 13:07:24', 60),
(402, 104, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', b'0', '2016-10-19 11:31:05', 1200),
(403, 104, 'Curtains', b'0', -1, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-11-02 17:04:07', 0),
(404, 104, 'Alarm', b'0', -1, 'alarm.png', 'alarm_off.png', b'1', '2016-11-02 17:04:10', 0),
(501, 105, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:32:33', 180),
(502, 105, 'AC', b'1', 0, 'cooler_on.png', 'cooler_off.png', b'0', '2016-10-19 11:32:38', 2400),
(503, 105, 'Curtains', b'1', -1, 'curtains_opened.png', 'curtains_closed.png', b'1', '2016-11-02 17:04:12', 0),
(504, 105, 'Alarm', b'0', -1, 'alarm.png', 'alarm_off.png', b'0', '2016-11-02 17:04:14', 0),
(601, 106, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:33:29', 120),
(602, 106, 'AC', b'0', 0, 'cooler_on.png', 'cooler_off.png', b'1', '2016-10-20 13:07:01', 1800),
(604, 106, 'Alarm', b'0', -1, 'alarm.png', 'alarm_off.png', b'0', '2016-11-02 17:04:16', 0),
(701, 107, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-23 17:01:17', 60),
(801, 108, 'Roof Lamp', b'1', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'0', '2016-10-19 11:33:51', 60),
(901, 109, 'Roof Lamp', b'0', 0, 'Roof_Lamp_on.png', 'Roof_Lamp_off.png', b'1', '2016-10-31 21:50:22', 120),
(902, 109, 'Garage Door', b'0', -1, 'Garage-door_open.png', 'Garage-door_closed.png', b'1', '2016-11-05 05:23:23', 0),
(1001, 110, 'Security Camera', b'1', 0, 'security-camera_on.png', 'security-camera_off.png', b'1', '2016-11-08 09:41:26', 0),
(1002, 110, 'Security Camera', b'1', 0, 'security-camera_on.png', 'security-camera_off.png', b'1', '2016-11-05 05:22:23', 0),
(1004, 110, 'Alarm', b'0', 0, 'alarm.png', 'alarm_off.png', b'1', '2016-11-08 09:49:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `device_stepper_motor`
--

CREATE TABLE `device_stepper_motor` (
  `DeviceID` int(4) NOT NULL,
  `GateNum1` int(3) NOT NULL DEFAULT '0',
  `GateNum2` int(3) NOT NULL DEFAULT '0',
  `GateNum3` int(3) NOT NULL DEFAULT '0',
  `GateNum4` int(3) NOT NULL DEFAULT '0',
  `StepperMotorMoves` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_stepper_motor`
--

INSERT INTO `device_stepper_motor` (`DeviceID`, `GateNum1`, `GateNum2`, `GateNum3`, `GateNum4`, `StepperMotorMoves`) VALUES
(103, 1, 0, 0, 0, 0),
(203, 2, 0, 0, 0, 0),
(403, 3, 0, 0, 0, 0),
(503, 4, 0, 0, 0, 0),
(902, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gpio_pins`
--

CREATE TABLE `gpio_pins` (
  `PinID` int(3) NOT NULL,
  `isPinInput` bit(1) DEFAULT NULL,
  `Type` varchar(4) NOT NULL DEFAULT 'I2C',
  `PinNumber` varchar(2) NOT NULL,
  `PI4Jnumber` varchar(2) NOT NULL,
  `MCP23017` varchar(4) DEFAULT NULL,
  `Color` varchar(15) NOT NULL,
  `DeviceName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpio_pins`
--

INSERT INTO `gpio_pins` (`PinID`, `isPinInput`, `Type`, `PinNumber`, `PI4Jnumber`, `MCP23017`, `Color`, `DeviceName`) VALUES
(1, NULL, 'GPIO', '17', '00', NULL, 'Green', ''),
(2, NULL, 'GPIO', '18', '01', NULL, 'Green', ''),
(3, NULL, 'GPIO', '27', '02', NULL, 'Green', ''),
(4, NULL, 'GPIO', '22', '03', NULL, 'Green', ''),
(5, NULL, 'GPIO', '23', '04', NULL, 'Green', ''),
(6, NULL, 'GPIO', '24', '05', NULL, 'Green', ''),
(7, NULL, 'GPIO', '25', '06', NULL, 'Green', ''),
(8, NULL, 'GPIO', '04', '07', NULL, 'Green', 'IR Reciver'),
(9, NULL, 'GPIO', '02', '08', NULL, 'Blue', 'I2C'),
(10, NULL, 'GPIO', '03', '09', NULL, 'Blue', 'I2C'),
(11, NULL, 'GPIO', '08', '10', NULL, 'Light Purple', ''),
(12, NULL, 'GPIO', '07', '11', NULL, 'Light Purple', ''),
(13, NULL, 'GPIO', '10', '12', NULL, 'Light Purple', ''),
(14, NULL, 'GPIO', '09', '13', NULL, 'Light Purple', ''),
(15, NULL, 'GPIO', '11', '14', NULL, 'Light Purple', ''),
(16, NULL, 'GPIO', '14', '15', NULL, 'Dark Purple', ''),
(17, NULL, 'GPIO', '15', '16', NULL, 'Dark Purple', ''),
(18, NULL, 'GPIO', '05', '21', NULL, 'Green', ''),
(19, NULL, 'GPIO', '06', '22', NULL, 'Green', ''),
(20, NULL, 'GPIO', '13', '23', NULL, 'Green', ''),
(21, NULL, 'GPIO', '19', '24', NULL, 'Green', ''),
(22, NULL, 'GPIO', '26', '25', NULL, 'Green', ''),
(23, NULL, 'GPIO', '12', '26', NULL, 'Green', ''),
(24, NULL, 'GPIO', '16', '27', NULL, 'Green', ''),
(25, NULL, 'GPIO', '20', '28', NULL, 'Green', ''),
(26, NULL, 'GPIO', '21', '29', NULL, 'Green', ''),
(27, NULL, 'I2C', 'A0', 'A0', '0x20', 'Black', ''),
(28, NULL, 'I2C', 'A1', 'A1', '0x20', 'Black', ''),
(29, NULL, 'I2C', 'A2', 'A2', '0x20', 'Black', ''),
(30, NULL, 'I2C', 'A3', 'A3', '0x20', 'Black', ''),
(31, NULL, 'I2C', 'A4', 'A4', '0x20', 'Black', ''),
(32, NULL, 'I2C', 'A5', 'A5', '0x20', 'Black', ''),
(33, NULL, 'I2C', 'A6', 'A6', '0x20', 'Black', ''),
(34, NULL, 'I2C', 'A7', 'A7', '0x20', 'Black', ''),
(35, NULL, 'I2C', 'B0', 'B0', '0x20', 'yellow', ''),
(36, NULL, 'I2C', 'B1', 'B1', '0x20', 'yellow', ''),
(37, NULL, 'I2C', 'B2', 'B2', '0x20', 'yellow', ''),
(38, NULL, 'I2C', 'B3', 'B3', '0x20', 'yellow', ''),
(39, NULL, 'I2C', 'B4', 'B4', '0x20', 'yellow', ''),
(40, NULL, 'I2C', 'B5', 'B5', '0x20', 'yellow', ''),
(41, NULL, 'I2C', 'B6', 'B6', '0x20', 'yellow', ''),
(42, NULL, 'I2C', 'B7', 'B7', '0x20', 'yellow', ''),
(43, NULL, 'I2C', 'A0', 'A0', '0x21', 'Blue', ''),
(44, NULL, 'I2C', 'A1', 'A1', '0x21', 'Blue', ''),
(45, NULL, 'I2C', 'A2', 'A2', '0x21', 'Blue', ''),
(46, NULL, 'I2C', 'A3', 'A3', '0x21', 'Blue', ''),
(47, NULL, 'I2C', 'A4', 'A4', '0x21', 'Blue', ''),
(48, NULL, 'I2C', 'A5', 'A5', '0x21', 'Blue', ''),
(49, NULL, 'I2C', 'A6', 'A6', '0x21', 'Blue', ''),
(50, NULL, 'I2C', 'A7', 'A7', '0x21', 'Blue', ''),
(51, NULL, 'I2C', 'B0', 'B0', '0x21', 'White', ''),
(52, NULL, 'I2C', 'B1', 'B1', '0x21', 'White', ''),
(53, NULL, 'I2C', 'B2', 'B2', '0x21', 'White', ''),
(54, NULL, 'I2C', 'B3', 'B3', '0x21', 'White', ''),
(55, NULL, 'I2C', 'B4', 'B4', '0x21', 'White', ''),
(56, NULL, 'I2C', 'B5', 'B5', '0x21', 'White', ''),
(57, NULL, 'I2C', 'B6', 'B6', '0x21', 'White', ''),
(58, NULL, 'I2C', 'B7', 'B7', '0x21', 'White', ''),
(59, NULL, 'I2C', 'A0', 'A0', '0x22', 'Black', ''),
(60, NULL, 'I2C', 'A1', 'A1', '0x22', 'Black', ''),
(61, NULL, 'I2C', 'A2', 'A2', '0x22', 'Black', ''),
(62, NULL, 'I2C', 'A3', 'A3', '0x22', 'Black', ''),
(63, NULL, 'I2C', 'A4', 'A4', '0x22', 'Black', ''),
(64, NULL, 'I2C', 'A5', 'A5', '0x22', 'Black', ''),
(65, NULL, 'I2C', 'A6', 'A6', '0x22', 'Black', ''),
(66, NULL, 'I2C', 'A7', 'A7', '0x22', 'Black', ''),
(67, NULL, 'I2C', 'B0', 'B0', '0x22', 'Yellow', ''),
(68, NULL, 'I2C', 'B1', 'B1', '0x22', 'Yellow', ''),
(69, NULL, 'I2C', 'B2', 'B2', '0x22', 'Yellow', ''),
(70, NULL, 'I2C', 'B3', 'B3', '0x22', 'Yellow', ''),
(71, NULL, 'I2C', 'B4', 'B4', '0x22', 'Yellow', ''),
(72, NULL, 'I2C', 'B5', 'B5', '0x22', 'Yellow', ''),
(73, NULL, 'I2C', 'B6', 'B6', '0x22', 'Yellow', ''),
(74, NULL, 'I2C', 'B7', 'B7', '0x22', 'Yellow', ''),
(75, NULL, 'I2C', 'A0', 'A0', '0x23', 'Blue', ''),
(76, NULL, 'I2C', 'A1', 'A1', '0x23', 'Blue', ''),
(77, NULL, 'I2C', 'A2', 'A2', '0x23', 'Blue', ''),
(78, NULL, 'I2C', 'A3', 'A3', '0x23', 'Blue', ''),
(79, NULL, 'I2C', 'A4', 'A4', '0x23', 'Blue', ''),
(80, NULL, 'I2C', 'A5', 'A5', '0x23', 'Blue', ''),
(81, NULL, 'I2C', 'A6', 'A6', '0x23', 'Blue', ''),
(82, NULL, 'I2C', 'A7', 'A7', '0x23', 'Blue', ''),
(83, NULL, 'I2C', 'B0', 'B0', '0x23', 'White', ''),
(84, NULL, 'I2C', 'B1', 'B1', '0x23', 'White', ''),
(85, NULL, 'I2C', 'B2', 'B2', '0x23', 'White', ''),
(86, NULL, 'I2C', 'B3', 'B3', '0x23', 'White', ''),
(87, NULL, 'I2C', 'B4', 'B4', '0x23', 'White', ''),
(88, NULL, 'I2C', 'B5', 'B5', '0x23', 'White', ''),
(89, NULL, 'I2C', 'B6', 'B6', '0x23', 'White', ''),
(90, NULL, 'I2C', 'B7', 'B7', '0x23', 'White', '');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `ID` int(2) NOT NULL,
  `DeviceName` varchar(25) NOT NULL,
  `IPaddress` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ID`, `DeviceName`, `IPaddress`) VALUES
(1, 'Router', '192.168.1.1'),
(2, 'Raspberry Pi', '192.168.1.x'),
(3, 'Relay Switch', '192.168.1.x'),
(4, 'Security Camera 1', '192.168.1.100'),
(5, 'Security Camera 2', '192.168.1.101');

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
(101, 'Parents Room', 'bedroom-double7'),
(102, 'Ahmad\'s Room', 'bedroom-male2.png'),
(104, 'Sarah\'s Room', 'bedroom-female1.png'),
(105, 'Living Room', 'livingroom2.png'),
(106, 'Kitchen', 'kitchen1.png'),
(107, 'Parents Bathroom', 'bathroom0.png'),
(108, 'Bathroom', 'bathroom5.png'),
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
(39, 101, b'1', 'bedroom-double2.png'),
(40, 101, b'1', 'bedroom-double3.png'),
(44, 101, b'1', 'bedroom-double7'),
(46, 102, b'0', 'bedroom-male5.png'),
(47, 101, b'0', 'bedroom-double5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `SensorID` int(4) NOT NULL,
  `SensorTypeID` int(2) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SenesorState` bit(1) NOT NULL DEFAULT b'1',
  `GateNum` int(3) NOT NULL,
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `SensorTypeID`, `RoomID`, `SenesorState`, `GateNum`, `lastStatusChange`) VALUES
(100, 20, 101, b'0', 0, '2016-11-06 17:39:55'),
(101, 10, 101, b'0', 0, '2016-10-20 13:50:20'),
(102, 12, 101, b'0', 0, '2016-10-20 13:51:01'),
(103, 13, 101, b'0', 0, '2016-11-06 17:39:57'),
(200, 20, 102, b'0', 0, '2016-11-06 17:39:58'),
(201, 10, 102, b'0', 0, '2016-10-20 13:50:23'),
(202, 12, 102, b'0', 0, '2016-10-20 13:50:58'),
(203, 13, 102, b'0', 0, '2016-11-06 17:39:59'),
(400, 20, 104, b'0', 0, '2016-11-06 17:40:00'),
(401, 10, 104, b'0', 0, '2016-10-20 13:50:25'),
(402, 12, 104, b'0', 0, '2016-10-20 13:50:56'),
(403, 13, 104, b'0', 0, '2016-11-06 17:40:03'),
(500, 20, 105, b'0', 0, '2016-11-06 17:40:04'),
(501, 10, 105, b'0', 0, '2016-10-20 13:50:26'),
(502, 12, 105, b'0', 0, '2016-10-20 13:50:54'),
(503, 13, 105, b'0', 0, '2016-11-06 17:40:06'),
(600, 20, 106, b'0', 0, '2016-11-06 17:40:08'),
(601, 10, 106, b'0', 0, '2016-10-20 13:50:28'),
(602, 12, 106, b'0', 0, '2016-10-20 13:50:52'),
(604, 11, 106, b'0', 0, '2016-11-07 19:01:06'),
(700, 20, 107, b'0', 0, '2016-11-06 17:40:10'),
(701, 10, 107, b'0', 0, '2016-10-20 13:50:30'),
(800, 20, 108, b'0', 0, '2016-11-06 17:40:11'),
(801, 10, 108, b'0', 0, '2016-10-20 13:50:32'),
(900, 20, 109, b'0', 0, '2016-11-06 17:40:12'),
(901, 10, 109, b'0', 0, '2016-10-20 13:50:35'),
(1000, 20, 110, b'0', 0, '2016-11-06 17:40:13'),
(1001, 10, 110, b'0', 0, '2016-11-08 05:40:06'),
(1002, 14, 110, b'0', -1, '2016-11-06 17:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_multi_gate`
--

CREATE TABLE `sensor_multi_gate` (
  `SensorID` int(4) NOT NULL,
  `GateNum1` int(3) NOT NULL DEFAULT '0',
  `GateNum2` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_multi_gate`
--

INSERT INTO `sensor_multi_gate` (`SensorID`, `GateNum1`, `GateNum2`) VALUES
(1002, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensor_type`
--

CREATE TABLE `sensor_type` (
  `SensorTypeID` int(2) NOT NULL,
  `SensorName` varchar(20) NOT NULL,
  `SensorImgPath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_type`
--

INSERT INTO `sensor_type` (`SensorTypeID`, `SensorName`, `SensorImgPath`) VALUES
(10, 'Motion Sensor', 'motion-sensor4.jpg'),
(11, 'Smoke Detector', 'smoke-sensor3.png'),
(12, 'Temperature Sensor', 'temperature-sensor2.png'),
(13, 'Light Sensor', 'light-sensor3.png'),
(14, 'Ultrasonic', 'ultrasonic.jpg'),
(20, 'Clock', 'timer7.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_status`
--

CREATE TABLE `table_status` (
  `TableID` int(4) NOT NULL,
  `TableName` varchar(6) NOT NULL,
  `isTableUpdated` bit(1) NOT NULL DEFAULT b'0',
  `LastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_status`
--

INSERT INTO `table_status` (`TableID`, `TableName`, `isTableUpdated`, `LastUpdated`) VALUES
(1, 'Device', b'0', '2016-11-04 19:01:01'),
(2, 'Task', b'0', '2016-11-04 19:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(6) NOT NULL,
  `UserID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SensorID` int(4) NOT NULL,
  `isDisabled` bit(1) NOT NULL DEFAULT b'0',
  `isDefault` bit(1) NOT NULL DEFAULT b'0',
  `TaskName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ActionTime` time DEFAULT NULL,
  `repeatDaily` bit(1) NOT NULL,
  `ActionDate` date DEFAULT NULL,
  `AlarmDuration` int(3) NOT NULL DEFAULT '0',
  `AlarmInterval` int(2) NOT NULL DEFAULT '0',
  `SelectedSensorValue` int(3) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NotifyByEmail` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `UserID`, `RoomID`, `SensorID`, `isDisabled`, `isDefault`, `TaskName`, `ActionTime`, `repeatDaily`, `ActionDate`, `AlarmDuration`, `AlarmInterval`, `SelectedSensorValue`, `DateCreated`, `NotifyByEmail`) VALUES
(6, 1, 108, 801, b'0', b'1', 'open lights on motion sensor', NULL, b'1', NULL, 0, 0, 0, '2016-10-26 18:50:03', b'0'),
(18, 3, 101, 100, b'0', b'0', 'alarm', '05:20:00', b'0', '2016-10-23', 10, 1, 0, '2016-10-26 18:50:03', b'0'),
(19, 4, 101, 102, b'0', b'0', 'turn ac on', NULL, b'1', NULL, 0, 0, 30, '2016-10-26 18:50:03', b'0'),
(20, 7, 104, 403, b'0', b'0', 'morning routine', NULL, b'1', NULL, 15, 2, 1, '2016-10-26 18:50:03', b'0'),
(21, 3, 109, 900, b'1', b'0', 'Test', '20:07:00', b'0', '2016-10-23', 0, 0, 45, '2016-10-26 18:50:03', b'0'),
(22, 5, 102, 201, b'0', b'0', 'test Ahmad', NULL, b'0', '2016-10-31', 5, 2, 23, '2016-10-26 18:50:03', b'0'),
(24, 4, 106, 600, b'0', b'0', 'remember to turn oven off', '10:45:00', b'0', '2016-10-30', 6, 1, 0, '2016-10-30 05:04:21', b'0'),
(29, 1, 110, 1002, b'0', b'0', 'Notify me on low water level', NULL, b'1', NULL, 0, 0, 40, '2016-11-05 04:35:15', b'1'),
(30, 1, 110, 1001, b'0', b'0', 'Parameter Security', NULL, b'1', NULL, 15, 0, 0, '2016-11-05 04:50:17', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `task_camera`
--

CREATE TABLE `task_camera` (
  `TaskID` int(4) NOT NULL,
  `DeviceID` int(4) NOT NULL,
  `TakeImage` int(3) DEFAULT '1',
  `TakeVideo` int(3) DEFAULT '0',
  `Resolution` int(4) NOT NULL DEFAULT '480'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_devices`
--

CREATE TABLE `task_devices` (
  `TaskID` int(6) NOT NULL,
  `DeviceID` int(4) NOT NULL,
  `RequiredDeviceStatus` int(2) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_devices`
--

INSERT INTO `task_devices` (`TaskID`, `DeviceID`, `RequiredDeviceStatus`) VALUES
(6, 801, 1),
(18, 101, 1),
(18, 102, 0),
(18, 103, -1),
(18, 104, 1),
(19, 101, 1),
(19, 102, 1),
(19, 103, 0),
(19, 104, -1),
(20, 401, 1),
(20, 402, 0),
(20, 403, 1),
(20, 404, 1),
(21, 901, 0),
(21, 902, 1),
(22, 201, 0),
(22, 202, 1),
(22, 203, 1),
(22, 204, 1),
(24, 601, -1),
(24, 602, -1),
(24, 604, 1),
(29, 1001, -1),
(29, 1002, -1),
(29, 1004, -1),
(30, 1001, 1),
(30, 1002, 1),
(30, 1004, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(4) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `UserName` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0',
  `isDisabled` bit(1) NOT NULL DEFAULT b'0',
  `UserImagePath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `UserName`, `Title`, `Password`, `isAdmin`, `isDisabled`, `UserImagePath`) VALUES
(1, 'system.admin@gmail.com', 'System Admin', 'Admin', '1234', b'1', b'0', 'superAdmin.png'),
(3, 'abdullah.alghamdi@gmail.com', 'Abdullah Alghamdi', 'Father', '123321', b'1', b'0', 'abdullah.jpg'),
(4, 'Huda.Azzahrani@gmail.com', 'Huda Azzahrani', 'Mother', '12345', b'0', b'0', 'huda.png'),
(5, 'Ahmad.alghamdi@hotmail.com', 'Ahmad alghamdi', 'Son', '123123', b'0', b'0', 'ahmad.jpg'),
(7, 'Sarah.alghamdi@gmail.com', 'Sarah Alghamdi', 'Daughter', '44332211', b'0', b'0', 'sarah.png');

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
-- Indexes for table `device_stepper_motor`
--
ALTER TABLE `device_stepper_motor`
  ADD PRIMARY KEY (`DeviceID`),
  ADD KEY `DeviceID` (`DeviceID`),
  ADD KEY `GateNum1` (`GateNum1`),
  ADD KEY `GateNum2` (`GateNum2`),
  ADD KEY `GateNum3` (`GateNum3`),
  ADD KEY `GateNum4` (`GateNum4`);

--
-- Indexes for table `gpio_pins`
--
ALTER TABLE `gpio_pins`
  ADD PRIMARY KEY (`PinID`),
  ADD UNIQUE KEY `PinID` (`PinID`);

--
-- Indexes for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD PRIMARY KEY (`ID`);

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
  ADD KEY `sensor_ibfk_1` (`RoomID`),
  ADD KEY `SensorTypeID` (`SensorTypeID`);

--
-- Indexes for table `sensor_multi_gate`
--
ALTER TABLE `sensor_multi_gate`
  ADD PRIMARY KEY (`SensorID`),
  ADD KEY `SensorID` (`SensorID`);

--
-- Indexes for table `sensor_type`
--
ALTER TABLE `sensor_type`
  ADD PRIMARY KEY (`SensorTypeID`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`),
  ADD KEY `userID` (`UserID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `SensorID` (`SensorID`);

--
-- Indexes for table `task_camera`
--
ALTER TABLE `task_camera`
  ADD PRIMARY KEY (`TaskID`,`DeviceID`),
  ADD KEY `TaskID` (`TaskID`,`DeviceID`),
  ADD KEY `DeviceID` (`DeviceID`);

--
-- Indexes for table `task_devices`
--
ALTER TABLE `task_devices`
  ADD PRIMARY KEY (`TaskID`,`DeviceID`),
  ADD KEY `DeviceID` (`DeviceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
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
-- AUTO_INCREMENT for table `gpio_pins`
--
ALTER TABLE `gpio_pins`
  MODIFY `PinID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `ip_address`
--
ALTER TABLE `ip_address`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  MODIFY `ImageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Constraints for table `device_stepper_motor`
--
ALTER TABLE `device_stepper_motor`
  ADD CONSTRAINT `device_stepper_motor_ibfk_1` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`),
  ADD CONSTRAINT `device_stepper_motor_ibfk_2` FOREIGN KEY (`GateNum1`) REFERENCES `gpio_pins` (`PinID`);

--
-- Constraints for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  ADD CONSTRAINT `room_backgrounds_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `sensor_ibfk_2` FOREIGN KEY (`SensorTypeID`) REFERENCES `sensor_type` (`SensorTypeID`);

--
-- Constraints for table `sensor_multi_gate`
--
ALTER TABLE `sensor_multi_gate`
  ADD CONSTRAINT `sensor_multi_gate_ibfk_1` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`);

--
-- Constraints for table `task_camera`
--
ALTER TABLE `task_camera`
  ADD CONSTRAINT `task_camera_ibfk_1` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`),
  ADD CONSTRAINT `task_camera_ibfk_2` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`);

--
-- Constraints for table `task_devices`
--
ALTER TABLE `task_devices`
  ADD CONSTRAINT `task_devices_ibfk_3` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`),
  ADD CONSTRAINT `task_devices_ibfk_4` FOREIGN KEY (`TaskID`) REFERENCES `task` (`TaskID`);

--
-- Constraints for table `user_authorized_rooms`
--
ALTER TABLE `user_authorized_rooms`
  ADD CONSTRAINT `user_authorized_rooms_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `user_authorized_rooms_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
