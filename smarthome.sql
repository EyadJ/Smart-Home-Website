-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 05:53 PM
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
-- Table structure for table `camera_gallery`
--

CREATE TABLE `camera_gallery` (
  `MultimediaID` int(6) NOT NULL,
  `cameraID` int(4) NOT NULL,
  `isImage` bit(1) NOT NULL DEFAULT b'1',
  `imgDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `imgPath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera_gallery`
--

INSERT INTO `camera_gallery` (`MultimediaID`, `cameraID`, `isImage`, `imgDate`, `imgPath`) VALUES
(201, 1002, b'1', '2016-12-09 23:26:12', 'Camera_1002_10-12-2016_02-26-12-69.jpg'),
(202, 1002, b'1', '2016-12-09 23:26:12', 'Camera_1002_10-12-2016_02-26-12-270.jpg'),
(203, 1002, b'1', '2016-12-09 23:26:12', 'Camera_1002_10-12-2016_02-26-12-536.jpg'),
(204, 1002, b'1', '2016-12-09 23:26:12', 'Camera_1002_10-12-2016_02-26-12-801.jpg'),
(205, 1002, b'1', '2016-12-09 23:26:13', 'Camera_1002_10-12-2016_02-26-13-14.jpg'),
(206, 1001, b'1', '2016-12-09 23:26:12', 'Camera_1001_10-12-2016_02-26-12-68.jpg'),
(207, 1001, b'1', '2016-12-09 23:26:12', 'Camera_1001_10-12-2016_02-26-12-762.jpg'),
(208, 1001, b'1', '2016-12-09 23:26:13', 'Camera_1001_10-12-2016_02-26-13-624.jpg'),
(209, 1001, b'1', '2016-12-09 23:26:14', 'Camera_1001_10-12-2016_02-26-14-575.jpg'),
(210, 1001, b'1', '2016-12-09 23:26:15', 'Camera_1001_10-12-2016_02-26-15-193.jpg'),
(211, 1002, b'1', '2016-12-09 23:27:05', 'Camera_1002_10-12-2016_02-27-05-687.jpg'),
(212, 1002, b'1', '2016-12-09 23:27:05', 'Camera_1002_10-12-2016_02-27-05-991.jpg'),
(213, 1002, b'1', '2016-12-09 23:27:06', 'Camera_1002_10-12-2016_02-27-06-488.jpg'),
(214, 1002, b'1', '2016-12-09 23:27:06', 'Camera_1002_10-12-2016_02-27-06-687.jpg'),
(215, 1002, b'1', '2016-12-09 23:27:07', 'Camera_1002_10-12-2016_02-27-07-198.jpg'),
(216, 1002, b'1', '2016-12-09 23:27:05', 'Camera_1002_10-12-2016_02-27-05-696.jpg'),
(217, 1002, b'1', '2016-12-09 23:27:06', 'Camera_1002_10-12-2016_02-27-06-15.jpg'),
(218, 1002, b'1', '2016-12-09 23:27:06', 'Camera_1002_10-12-2016_02-27-06-274.jpg'),
(219, 1002, b'1', '2016-12-09 23:27:06', 'Camera_1002_10-12-2016_02-27-06-840.jpg'),
(220, 1002, b'1', '2016-12-09 23:27:07', 'Camera_1002_10-12-2016_02-27-07-317.jpg'),
(221, 1001, b'1', '2016-12-09 23:27:05', 'Camera_1001_10-12-2016_02-27-05-630.jpg'),
(222, 1001, b'1', '2016-12-09 23:27:07', 'Camera_1001_10-12-2016_02-27-07-176.jpg'),
(223, 1001, b'1', '2016-12-09 23:27:08', 'Camera_1001_10-12-2016_02-27-08-211.jpg'),
(224, 1001, b'1', '2016-12-09 23:27:09', 'Camera_1001_10-12-2016_02-27-09-113.jpg'),
(225, 1001, b'1', '2016-12-09 23:27:10', 'Camera_1001_10-12-2016_02-27-10-113.jpg'),
(226, 1001, b'1', '2016-12-09 23:27:05', 'Camera_1001_10-12-2016_02-27-05-648.jpg'),
(227, 1001, b'1', '2016-12-09 23:27:07', 'Camera_1001_10-12-2016_02-27-07-325.jpg'),
(228, 1001, b'1', '2016-12-09 23:27:08', 'Camera_1001_10-12-2016_02-27-08-271.jpg'),
(229, 1001, b'1', '2016-12-09 23:27:09', 'Camera_1001_10-12-2016_02-27-09-456.jpg'),
(230, 1001, b'1', '2016-12-09 23:27:10', 'Camera_1001_10-12-2016_02-27-10-650.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `DeviceID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `DeviceName` varchar(20) NOT NULL,
  `DeviceState` bit(1) NOT NULL,
  `isVisible` bit(1) NOT NULL DEFAULT b'1',
  `isStatusChanged` bit(1) NOT NULL,
  `GateNum` int(3) DEFAULT '0',
  `Watts` int(4) NOT NULL DEFAULT '0',
  `lastStatusChange` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DeviceImgPath_on` varchar(50) NOT NULL,
  `DeviceImgPath_off` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`DeviceID`, `RoomID`, `DeviceName`, `DeviceState`, `isVisible`, `isStatusChanged`, `GateNum`, `Watts`, `lastStatusChange`, `DeviceImgPath_on`, `DeviceImgPath_off`) VALUES
(101, 101, 'Roof Lamp', b'1', b'1', b'1', 91, 120, '2016-12-12 16:43:37', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(102, 101, 'AC', b'0', b'1', b'1', 103, 1800, '2016-12-11 16:12:35', 'cooler_on.png', 'cooler_off.png'),
(103, 101, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-02 21:41:20', 'curtains_opened.png', 'curtains_closed.png'),
(104, 101, 'Alarm', b'0', b'1', b'0', 75, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(201, 102, 'Roof Lamp', b'1', b'1', b'1', 92, 60, '2016-12-12 16:48:39', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(202, 102, 'AC', b'1', b'1', b'1', 101, 1200, '2016-12-12 17:10:01', 'cooler_on.png', 'cooler_off.png'),
(203, 102, 'Curtains', b'1', b'1', b'1', -1, 0, '2016-12-12 16:48:42', 'curtains_opened.png', 'curtains_closed.png'),
(204, 102, 'Alarm', b'0', b'1', b'1', 78, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(401, 104, 'Roof Lamp', b'0', b'1', b'1', 93, 60, '2016-12-11 14:21:33', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(402, 104, 'AC', b'0', b'1', b'1', 102, 1200, '2016-12-11 16:12:35', 'cooler_on.png', 'cooler_off.png'),
(403, 104, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-11 12:35:39', 'curtains_opened.png', 'curtains_closed.png'),
(404, 104, 'Alarm', b'0', b'1', b'1', 79, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(501, 105, 'Roof Lamp', b'1', b'1', b'1', 94, 180, '2016-12-11 14:27:28', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(502, 105, 'AC', b'0', b'1', b'1', 100, 2400, '2016-12-11 16:12:43', 'cooler_on.png', 'cooler_off.png'),
(503, 105, 'Curtains', b'1', b'1', b'1', -1, 0, '2016-12-02 21:41:20', 'curtains_opened.png', 'curtains_closed.png'),
(504, 105, 'Alarm', b'0', b'1', b'0', 80, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(601, 106, 'Roof Lamp', b'0', b'1', b'0', 95, 120, '2016-12-02 21:41:20', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(602, 106, 'AC', b'0', b'1', b'0', 99, 1800, '2016-12-02 21:41:20', 'cooler_on.png', 'cooler_off.png'),
(604, 106, 'Alarm', b'0', b'1', b'1', 76, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(801, 108, 'Roof Lamp', b'0', b'1', b'0', 96, 60, '2016-12-02 21:41:20', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(901, 109, 'Roof Lamp', b'0', b'1', b'0', 97, 120, '2016-12-02 21:41:21', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(902, 109, 'Garage Door', b'0', b'1', b'1', -1, 0, '2016-12-14 13:34:58', 'Garage-door_open.png', 'Garage-door_closed.png'),
(1001, 110, 'Security Camera', b'0', b'1', b'0', 107, 0, '2016-11-28 21:00:00', 'security-camera_on.png', 'security-camera_off.png'),
(1002, 110, 'Security Camera', b'0', b'1', b'0', 108, 0, '2016-11-28 21:00:00', 'security-camera_on.png', 'security-camera_off.png'),
(1004, 110, 'Alarm', b'0', b'1', b'1', 77, 0, '2016-12-12 17:05:12', 'alarm.png', 'alarm_off.png'),
(1005, 110, 'Water Pump', b'0', b'0', b'0', 106, 0, '2016-11-25 21:00:00', 'null', 'null');

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
  `StepperMotorMoves` int(4) NOT NULL DEFAULT '0',
  `MaxValue` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_stepper_motor`
--

INSERT INTO `device_stepper_motor` (`DeviceID`, `GateNum1`, `GateNum2`, `GateNum3`, `GateNum4`, `StepperMotorMoves`, `MaxValue`) VALUES
(103, 39, 40, 41, 42, 0, 0),
(203, 83, 84, 85, 86, 0, 0),
(403, 35, 36, 37, 38, 0, 0),
(503, 27, 28, 29, 30, 5999, 0),
(902, 31, 32, 33, 34, 0, 5600);

-- --------------------------------------------------------

--
-- Table structure for table `gpio_pins`
--

CREATE TABLE `gpio_pins` (
  `PinID` int(3) NOT NULL,
  `Type` varchar(6) NOT NULL DEFAULT 'I2C',
  `PinNumber` varchar(2) NOT NULL,
  `PI4Jnumber` varchar(3) NOT NULL,
  `MCP23017` varchar(4) DEFAULT NULL,
  `Color` varchar(15) NOT NULL,
  `DeviceName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpio_pins`
--

INSERT INTO `gpio_pins` (`PinID`, `Type`, `PinNumber`, `PI4Jnumber`, `MCP23017`, `Color`, `DeviceName`) VALUES
(1, 'GPIO', '17', '00', NULL, 'Green', ''),
(2, 'GPIO', '18', '01', NULL, 'Green', ''),
(3, 'GPIO', '27', '02', NULL, 'Green', ''),
(4, 'GPIO', '22', '03', NULL, 'Green', ''),
(5, 'GPIO', '23', '04', NULL, 'Green', ''),
(6, 'GPIO', '24', '05', NULL, 'Green', ''),
(7, 'GPIO', '25', '06', NULL, 'Green', ''),
(18, 'GPIO', '05', '21', NULL, 'Green', ''),
(19, 'GPIO', '06', '22', NULL, 'Green', ''),
(20, 'GPIO', '13', '23', NULL, 'Green', ''),
(21, 'GPIO', '19', '24', NULL, 'Green', ''),
(22, 'GPIO', '26', '25', NULL, 'Green', ''),
(23, 'GPIO', '12', '26', NULL, 'Green', ''),
(24, 'GPIO', '16', '27', NULL, 'Green', ''),
(25, 'GPIO', '20', '28', NULL, 'Green', ''),
(26, 'GPIO', '21', '29', NULL, 'Green', ''),
(27, 'I2C', 'A0', 'A0', '0x20', 'Black', ''),
(28, 'I2C', 'A1', 'A1', '0x20', 'Black', ''),
(29, 'I2C', 'A2', 'A2', '0x20', 'Black', ''),
(30, 'I2C', 'A3', 'A3', '0x20', 'Black', ''),
(31, 'I2C', 'A4', 'A4', '0x20', 'Black', ''),
(32, 'I2C', 'A5', 'A5', '0x20', 'Black', ''),
(33, 'I2C', 'A6', 'A6', '0x20', 'Black', ''),
(34, 'I2C', 'A7', 'A7', '0x20', 'Black', ''),
(35, 'I2C', 'B0', 'B0', '0x20', 'yellow', ''),
(36, 'I2C', 'B1', 'B1', '0x20', 'yellow', ''),
(37, 'I2C', 'B2', 'B2', '0x20', 'yellow', ''),
(38, 'I2C', 'B3', 'B3', '0x20', 'yellow', ''),
(39, 'I2C', 'B4', 'B4', '0x20', 'yellow', ''),
(40, 'I2C', 'B5', 'B5', '0x20', 'yellow', ''),
(41, 'I2C', 'B6', 'B6', '0x20', 'yellow', ''),
(42, 'I2C', 'B7', 'B7', '0x20', 'yellow', ''),
(43, 'I2C', 'A0', 'A0', '0x21', 'Blue', ''),
(44, 'I2C', 'A1', 'A1', '0x21', 'Blue', ''),
(45, 'I2C', 'A2', 'A2', '0x21', 'Blue', ''),
(46, 'I2C', 'A3', 'A3', '0x21', 'Blue', ''),
(47, 'I2C', 'A4', 'A4', '0x21', 'Blue', ''),
(48, 'I2C', 'A5', 'A5', '0x21', 'Blue', ''),
(49, 'I2C', 'A6', 'A6', '0x21', 'Blue', ''),
(50, 'I2C', 'A7', 'A7', '0x21', 'Blue', ''),
(51, 'I2C', 'B0', 'B0', '0x21', 'White', ''),
(52, 'I2C', 'B1', 'B1', '0x21', 'White', ''),
(53, 'I2C', 'B2', 'B2', '0x21', 'White', ''),
(54, 'I2C', 'B3', 'B3', '0x21', 'White', ''),
(55, 'I2C', 'B4', 'B4', '0x21', 'White', ''),
(56, 'I2C', 'B5', 'B5', '0x21', 'White', ''),
(57, 'I2C', 'B6', 'B6', '0x21', 'White', ''),
(58, 'I2C', 'B7', 'B7', '0x21', 'White', ''),
(59, 'I2C', 'A0', 'A0', '0x24', 'Black', ''),
(60, 'I2C', 'A1', 'A1', '0x24', 'Black', ''),
(61, 'I2C', 'A2', 'A2', '0x24', 'Black', ''),
(62, 'I2C', 'A3', 'A3', '0x24', 'Black', ''),
(63, 'I2C', 'A4', 'A4', '0x24', 'Black', ''),
(64, 'I2C', 'A5', 'A5', '0x24', 'Black', ''),
(65, 'I2C', 'A6', 'A6', '0x24', 'Black', ''),
(66, 'I2C', 'A7', 'A7', '0x24', 'Black', ''),
(67, 'I2C', 'B0', 'B0', '0x24', 'Yellow', ''),
(68, 'I2C', 'B1', 'B1', '0x24', 'Yellow', ''),
(69, 'I2C', 'B2', 'B2', '0x24', 'Yellow', ''),
(70, 'I2C', 'B3', 'B3', '0x24', 'Yellow', ''),
(71, 'I2C', 'B4', 'B4', '0x24', 'Yellow', ''),
(72, 'I2C', 'B5', 'B5', '0x24', 'Yellow', ''),
(73, 'I2C', 'B6', 'B6', '0x24', 'Yellow', ''),
(74, 'I2C', 'B7', 'B7', '0x24', 'Yellow', ''),
(75, 'I2C', 'A0', 'A0', '0x25', 'Blue', ''),
(76, 'I2C', 'A1', 'A1', '0x25', 'Blue', ''),
(77, 'I2C', 'A2', 'A2', '0x25', 'Blue', ''),
(78, 'I2C', 'A3', 'A3', '0x25', 'Blue', ''),
(79, 'I2C', 'A4', 'A4', '0x25', 'Blue', ''),
(80, 'I2C', 'A5', 'A5', '0x25', 'Blue', ''),
(81, 'I2C', 'A6', 'A6', '0x25', 'Blue', ''),
(82, 'I2C', 'A7', 'A7', '0x25', 'Blue', ''),
(83, 'I2C', 'B0', 'B0', '0x25', 'White', ''),
(84, 'I2C', 'B1', 'B1', '0x25', 'White', ''),
(85, 'I2C', 'B2', 'B2', '0x25', 'White', ''),
(86, 'I2C', 'B3', 'B3', '0x25', 'White', ''),
(87, 'I2C', 'B4', 'B4', '0x25', 'White', ''),
(88, 'I2C', 'B5', 'B5', '0x25', 'White', ''),
(89, 'I2C', 'B6', 'B6', '0x25', 'White', ''),
(90, 'I2C', 'B7', 'B7', '0x25', 'White', ''),
(91, 'Relay', '1', '1.1', NULL, 'Green', ''),
(92, 'Relay', '2', '1.2', NULL, 'Green', ''),
(93, 'Relay', '3', '1.3', NULL, 'Green', ''),
(94, 'Relay', '4', '1.4', NULL, 'Green', ''),
(95, 'Relay', '5', '1.5', NULL, 'Green', ''),
(96, 'Relay', '6', '1.6', NULL, 'Green', ''),
(97, 'Relay', '7', '1.7', NULL, 'Green', ''),
(98, 'Relay', '8', '1.8', NULL, 'Green', ''),
(99, 'Relay', '9', '2.1', NULL, 'Green', ''),
(100, 'Relay', '10', '2.2', NULL, 'Green', ''),
(101, 'Relay', '11', '2.3', NULL, 'Green', ''),
(102, 'Relay', '12', '2.4', NULL, 'Green', ''),
(103, 'Relay', '13', '2.5', NULL, 'Green', ''),
(104, 'Relay', '14', '2.6', NULL, 'Green', ''),
(105, 'Relay', '15', '2.7', NULL, 'Green', ''),
(106, 'Relay', '16', '2.8', NULL, 'Green', ''),
(107, 'Camera', '4', '4', NULL, 'Black', 'Camera1'),
(108, 'Camera', '5', '5', NULL, 'Black', 'Camera2');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `ID` int(2) NOT NULL,
  `DeviceName` varchar(25) NOT NULL,
  `IPaddress` varchar(15) CHARACTER SET utf8 NOT NULL,
  `CameraID` int(4) DEFAULT NULL,
  `RotationBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ID`, `DeviceName`, `IPaddress`, `CameraID`, `RotationBy`) VALUES
(1, 'Router', '192.168.1.1', NULL, NULL),
(2, 'Raspberry Pi', '192.168.1.19', NULL, NULL),
(3, 'Relay Switch', '192.168.1.102', NULL, NULL),
(4, 'Security Camera 1', '192.168.1.100', 1001, 270),
(5, 'Security Camera 2', '192.168.1.101', 1002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `LogRecordID` int(7) NOT NULL,
  `RecordCategoryID` int(2) NOT NULL,
  `Description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `EntryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogRecordID`, `RecordCategoryID`, `Description`, `EntryDate`) VALUES
(1, 15, 'Admin (System Admin) added a new user (test)', '2016-12-11 19:45:53'),
(2, 16, 'Admin (System Admin) deleted user (test)', '2016-12-11 19:55:18'),
(4, 17, 'Admin (System Admin) disabled the account of user (Ahmad alghamdi)', '2016-12-11 20:10:30'),
(5, 17, 'Admin (System Admin) Enabled the account of user (Ahmad alghamdi)', '2016-12-11 20:13:48'),
(7, 18, 'Admin (System Admin) authorized (House_Parameters) to user (Ahmad alghamdi)', '2016-12-11 20:56:21'),
(9, 18, 'Admin (System Admin) unauthorized (House_Parameters) from user (Ahmad alghamdi)', '2016-12-11 20:56:24'),
(12, 15, 'Admin (System Admin) added a new user (test test2)', '2016-12-12 16:06:21'),
(13, 17, 'Admin (System Admin) disabled the account of user (test test2)', '2016-12-12 16:06:40'),
(14, 16, 'Admin (System Admin) deleted user (test test2)', '2016-12-12 16:07:04'),
(15, 15, 'Admin (System Admin) added a new user (new test)', '2016-12-12 16:08:06'),
(16, 16, 'Admin (System Admin) deleted user (new test)', '2016-12-12 16:08:49'),
(33, 18, 'Admin (System Admin) authorized (Kitchen) to user (Sarah Alghamdi)', '2016-12-12 17:16:32'),
(34, 18, 'Admin (System Admin) unauthorized (Kitchen) from user (Sarah Alghamdi)', '2016-12-12 17:16:33'),
(35, 27, 'Admin (System Admin) deleted task (231) from room (Kitchen)', '2016-12-12 19:00:39'),
(36, 25, 'Admin (System Admin) created a task with name (new task) in room (Garage)', '2016-12-12 19:05:03'),
(38, 25, 'Admin (System Admin) created a task with name (new test) in room (Garage)', '2016-12-12 19:07:08'),
(39, 25, 'Admin (System Admin) created a task with name (newest test) in room (Garage)', '2016-12-12 19:11:58'),
(41, 26, 'Admin (System Admin) edited task (newest test) in room (Garage)', '2016-12-12 19:14:58'),
(42, 27, 'Admin (System Admin) deleted task (newest test) from room (Garage)', '2016-12-12 19:18:26'),
(43, 27, 'Admin (System Admin) deleted task (newest test) from room (Garage)', '2016-12-12 20:42:20'),
(46, 28, 'Admin (System Admin) changed his/her personal settings', '2016-12-13 09:31:49'),
(47, 29, 'Admin (System Admin) uploaded a new background for room (Parents_Room)', '2016-12-13 22:11:29'),
(49, 22, 'Admin (System Admin) has successfully logged in', '2016-12-13 22:16:57'),
(51, 21, 'Failed log in attempt with Email (lets.test@website.com) & Password (lets.lets)', '2016-12-13 22:18:17'),
(52, 22, 'Admin (System Admin) has successfully logged in', '2016-12-13 22:18:19'),
(53, 24, 'Admin (System Admin) [Opened] the (Garage Door) in (Garage)', '2016-12-14 13:34:55'),
(54, 24, 'Admin (System Admin) [Closed] the (Garage Door) in (Garage)', '2016-12-14 13:34:58'),
(55, 22, 'Admin (System Admin) has successfully logged in', '2016-12-14 17:23:13'),
(56, 22, 'Admin (System Admin) has successfully logged in', '2016-12-14 17:25:37'),
(57, 22, 'Admin (System Admin) has successfully logged in', '2016-12-14 17:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `log_category`
--

CREATE TABLE `log_category` (
  `RecordCategoryID` int(2) NOT NULL,
  `CategoryName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `isImportant` bit(1) NOT NULL DEFAULT b'0',
  `LogDescription` varchar(100) CHARACTER SET utf8 NOT NULL,
  `MessageDescription` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_category`
--

INSERT INTO `log_category` (`RecordCategoryID`, `CategoryName`, `isImportant`, `LogDescription`, `MessageDescription`) VALUES
(11, 'task_executed', b'0', 'Task ($TaskName) excuted with ($selectedSensor) & turned ($device1) [ON/OFF], ($device2) [ON/OFF], …', 'Task ($TaskName) excuted with ($selectedSensor) & turned ($device1) [ON/OFF], ($device2) [ON/OFF], …'),
(12, 'smoke_sensor_on', b'1', 'Smoke sensor detected a fire or a gas leak, the system is in Freeze-Mode', 'Smoke sensor detected a fire or a gas leak, The System is in Freeze-Mode, Devices cant be Switched ON/OFF, the Tasks will be Disabled as well.'),
(13, 'water_tank_level', b'1', 'Water level in the tank has reached ($UltraSonicSensor) %', 'Water level in the tank has reached ($UltraSonicSensor) %'),
(14, 'parameters_breached', b'1', 'House parameters are breached, the Alarms turned ON, & the Cameras took imgs', 'House parameters were breached, the alarms turned on, & the Cameras took images, if this is a mistake, the alarms can be turned off through the website'),
(15, 'admin_added_user', b'1', 'Admin ($AdminUserName) added a new user ($UserName)', NULL),
(16, 'admin_deleted_user', b'1', 'Admin ($AdminUserName) deleted user ($UserName)', NULL),
(17, 'admin_disabled_user_account', b'1', 'Admin ($AdminUserName) disabled the account of user ($UserName) ', NULL),
(18, 'admin_Enabled_user_account', b'1', 'Admin ($AdminUserName) Enabled the account of user ($UserName)', NULL),
(19, 'room_authorization_added', b'0', 'Admin ($AdminUserName) authorized ($RoomName) to user ($UserName)', NULL),
(20, 'room_authorization_removed', b'0', 'Admin ($AdminUserName) unauthorized ($RoomName) from user ($UserName)', NULL),
(21, 'failed_log_in', b'1', 'Failed log in attempt with Email ($Email) & Password ($Password)', NULL),
(22, 'user_loged_in', b'0', 'User ($UserName) has successfully logged in', NULL),
(23, 'user_changed_device_status', b'0', 'User ($UserName) turned the ($DeviceName) [ON/OFF] in ($RoomName)', NULL),
(24, 'user_changed_motor_status', b'0', 'User ($UserName) [Opened/Closed] the ($DeviceName) in ($RoomName)', NULL),
(25, 'user_created_task', b'0', 'User ($UserName) created a task with name ($TaskName) in room ($RoomName)', NULL),
(26, 'user_edited_task', b'0', 'User ($UserName) edited task ($TaskName) in room ($RoomName)', NULL),
(27, 'user_deleted_task', b'0', 'User ($UserName) deleted task ($TaskName) from room ($RoomName)', NULL),
(28, 'user_changed_his_settings', b'0', 'User ($UserName) changed his/her personal settings', NULL),
(29, 'user_uploaded_room_BG', b'0', 'User ($UserName) uploaded a new background for room ($RoomName)', NULL);

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
(101, 'Parents_Room', 'bedroom-double1.png'),
(102, 'Ahmad_Room', 'bedroom-male2.png'),
(104, 'Sarah_Room', 'bedroom-female1.png'),
(105, 'Living_Room', 'livingroom2.png'),
(106, 'Kitchen', 'kitchen1.png'),
(108, 'Bathroom', 'bathroom5.png'),
(109, 'Garage', 'garage2.png'),
(110, 'House_Parameters', 'house-parameters2.png');

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
(28, 104, b'1', 'bedroom-female1.png'),
(29, 104, b'1', 'bedroom-female2.png'),
(30, 102, b'1', 'bedroom-male1.png'),
(31, 102, b'1', 'bedroom-male2.png'),
(39, 101, b'1', 'bedroom-double2.png'),
(40, 101, b'1', 'bedroom-double3.png'),
(44, 101, b'1', 'bedroom-double7'),
(46, 102, b'0', 'bedroom-male5.png'),
(47, 101, b'0', 'bedroom-double5.jpg'),
(52, 104, b'0', 'Sarah_Room_2016-12-10-06-36-51.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `SensorID` int(4) NOT NULL,
  `SensorTypeID` int(2) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SenesorState` bit(1) NOT NULL,
  `SensorValue` int(5) NOT NULL,
  `isVisible` bit(1) NOT NULL DEFAULT b'1',
  `GateNum` int(3) NOT NULL,
  `lastStatusChange` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `SensorTypeID`, `RoomID`, `SenesorState`, `SensorValue`, `isVisible`, `GateNum`, `lastStatusChange`) VALUES
(100, 20, 101, b'0', 0, b'1', -1, '2016-11-20 19:34:47'),
(101, 10, 101, b'0', 0, b'1', 57, '2016-12-02 19:36:35'),
(102, 12, 101, b'0', 24, b'1', 5, '2016-12-02 21:41:38'),
(103, 13, 101, b'0', 0, b'1', 19, '2016-12-02 20:15:39'),
(200, 20, 102, b'0', 0, b'1', -1, '2016-11-20 19:37:00'),
(201, 10, 102, b'0', 0, b'1', 55, '2016-12-02 19:36:41'),
(202, 12, 102, b'0', 25, b'1', 3, '2016-12-02 21:41:54'),
(203, 13, 102, b'0', 0, b'1', 22, '2016-12-02 20:15:39'),
(400, 20, 104, b'0', 0, b'1', -1, '2016-11-20 19:37:48'),
(401, 10, 104, b'0', 0, b'1', 56, '2016-12-02 19:36:46'),
(402, 12, 104, b'0', 25, b'1', 4, '2016-12-02 21:47:41'),
(403, 13, 104, b'0', 0, b'1', 21, '2016-12-02 20:15:39'),
(500, 20, 105, b'0', 0, b'1', -1, '2016-11-20 19:38:57'),
(501, 10, 105, b'0', 0, b'1', 53, '2016-12-02 20:16:28'),
(502, 12, 105, b'0', 24, b'1', 2, '2016-12-02 21:46:52'),
(503, 13, 105, b'0', 0, b'1', 20, '2016-12-02 21:41:29'),
(600, 20, 106, b'0', 0, b'1', -1, '2016-11-20 19:39:51'),
(601, 10, 106, b'0', 0, b'1', 52, '2016-12-02 20:16:29'),
(602, 12, 106, b'0', 22, b'1', 1, '2016-12-02 21:47:42'),
(604, 11, 106, b'0', 0, b'1', 6, '2016-12-01 15:32:11'),
(800, 20, 108, b'0', 0, b'1', -1, '2016-11-20 19:41:04'),
(801, 10, 108, b'0', 0, b'1', 51, '2016-12-02 16:16:17'),
(900, 20, 109, b'0', 0, b'1', -1, '2016-11-20 19:41:31'),
(901, 10, 109, b'0', 0, b'1', 54, '2016-12-02 20:16:29'),
(1000, 20, 110, b'0', 0, b'1', -1, '2016-11-20 19:43:22'),
(1001, 15, 110, b'0', 0, b'1', 43, '2016-12-09 14:48:03'),
(1002, 14, 110, b'0', 23, b'1', -1, '2016-12-02 21:47:40'),
(1003, 14, 110, b'0', 19, b'0', -1, '2016-12-02 21:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_multi_gate`
--

CREATE TABLE `sensor_multi_gate` (
  `SensorID` int(4) NOT NULL,
  `GateNum1` int(3) NOT NULL DEFAULT '0',
  `GateNum2` int(3) NOT NULL DEFAULT '0',
  `MaxValue` int(5) NOT NULL,
  `MinValue` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_multi_gate`
--

INSERT INTO `sensor_multi_gate` (`SensorID`, `GateNum1`, `GateNum2`, `MaxValue`, `MinValue`) VALUES
(1002, 23, 24, 9, 2),
(1003, 25, 26, 15, 5);

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
(15, 'Infrared Sensor', 'infrared.png'),
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
(1, 'Device', b'1', '2016-12-07 13:16:22'),
(2, 'Task', b'1', '2016-12-12 17:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(6) NOT NULL,
  `UserID` int(4) NOT NULL,
  `RoomID` int(4) NOT NULL,
  `SensorID` int(4) NOT NULL,
  `isDeleted` bit(1) NOT NULL DEFAULT b'0',
  `isDisabled` bit(1) NOT NULL DEFAULT b'0',
  `isDefault` bit(1) NOT NULL DEFAULT b'0',
  `TaskName` varchar(35) CHARACTER SET utf8 NOT NULL,
  `ActionTime` time DEFAULT NULL,
  `repeatDaily` bit(1) NOT NULL,
  `ActionDate` date DEFAULT NULL,
  `AlarmDuration` int(3) NOT NULL DEFAULT '0',
  `AlarmInterval` int(2) NOT NULL DEFAULT '0',
  `SelectedSensorValue` int(3) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NotifyByEmail` bit(1) NOT NULL DEFAULT b'0',
  `EnableTaskOnTime` time DEFAULT NULL,
  `DisableTaskOnTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `UserID`, `RoomID`, `SensorID`, `isDeleted`, `isDisabled`, `isDefault`, `TaskName`, `ActionTime`, `repeatDaily`, `ActionDate`, `AlarmDuration`, `AlarmInterval`, `SelectedSensorValue`, `DateCreated`, `NotifyByEmail`, `EnableTaskOnTime`, `DisableTaskOnTime`) VALUES
(6, 1, 108, 801, b'0', b'0', b'1', 'open lights on motion sensor', NULL, b'1', NULL, -1, -1, -1, '2016-10-26 18:50:03', b'0', NULL, NULL),
(18, 1, 101, 100, b'0', b'1', b'0', 'alarm', '05:30:00', b'0', '2016-11-10', 10, 1, -1, '2016-11-13 15:13:46', b'0', NULL, NULL),
(19, 1, 101, 102, b'0', b'1', b'0', 'turn ac on', NULL, b'1', NULL, -1, -1, 25, '2016-12-09 12:31:14', b'1', NULL, NULL),
(20, 1, 104, 403, b'0', b'0', b'0', 'morning routine', NULL, b'1', NULL, -1, -1, 1, '2016-11-30 20:18:36', b'0', NULL, NULL),
(21, 3, 109, 900, b'0', b'1', b'0', 'Test', '20:07:00', b'0', '2016-10-23', -1, -1, 45, '2016-10-26 18:50:03', b'0', NULL, NULL),
(22, 1, 102, 201, b'0', b'1', b'0', 'test Ahmad', NULL, b'0', '2016-10-31', 5, 2, 23, '2016-11-21 00:45:31', b'0', NULL, NULL),
(24, 4, 106, 600, b'0', b'1', b'0', 'remember to turn oven off', '10:45:00', b'0', '2016-10-30', 6, 1, 0, '2016-10-30 05:04:21', b'0', NULL, NULL),
(58, 1, 102, 200, b'0', b'1', b'0', 'mmm', '04:49:00', b'0', '2016-11-21', -1, -1, 0, '2016-12-09 13:11:47', b'0', NULL, NULL),
(59, 1, 110, 1001, b'0', b'0', b'0', 'Parameter Security', NULL, b'1', NULL, 0, 0, -1, '2016-12-11 17:17:28', b'1', '01:00:00', '05:30:00'),
(60, 1, 106, 604, b'0', b'0', b'0', 'Smoke', NULL, b'1', NULL, 10, 0, 0, '2016-12-07 21:17:54', b'1', NULL, NULL),
(61, 1, 101, 101, b'0', b'0', b'0', 'My Room', NULL, b'1', NULL, -1, -1, -1, '2016-11-30 18:14:42', b'0', NULL, NULL),
(62, 1, 101, 101, b'0', b'0', b'0', 'Motion', NULL, b'1', NULL, -1, -1, -1, '2016-11-30 20:03:14', b'0', NULL, NULL),
(63, 1, 101, 103, b'0', b'1', b'0', 'hi', NULL, b'1', NULL, -1, -1, 1, '2016-11-30 20:02:32', b'0', NULL, NULL),
(64, 1, 101, 103, b'0', b'1', b'0', '1', NULL, b'1', NULL, -1, -1, 0, '2016-11-30 20:02:26', b'0', NULL, NULL),
(65, 1, 102, 201, b'0', b'0', b'0', 'My Room2', NULL, b'1', NULL, -1, -1, -1, '2016-11-30 18:44:35', b'0', NULL, NULL),
(66, 1, 102, 201, b'0', b'0', b'0', '1', NULL, b'1', NULL, -1, -1, 1, '2016-11-30 18:43:05', b'0', NULL, NULL),
(71, 1, 110, 1001, b'0', b'0', b'0', 'tesssss', NULL, b'1', NULL, -1, -1, -1, '2016-12-11 17:16:21', b'0', NULL, NULL),
(72, 1, 105, 501, b'0', b'0', b'0', 'asd1', NULL, b'1', NULL, -1, -1, -1, '2016-12-08 09:16:12', b'0', NULL, NULL),
(73, 1, 105, 501, b'0', b'0', b'0', '121', NULL, b'1', NULL, -1, -1, 4, '2016-12-08 09:18:06', b'0', NULL, NULL),
(74, 1, 105, 502, b'0', b'0', b'0', 'qw', NULL, b'1', NULL, -1, -1, 30, '2016-12-08 09:18:36', b'0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_camera`
--

CREATE TABLE `task_camera` (
  `TaskID` int(4) NOT NULL,
  `DeviceID` int(4) NOT NULL,
  `RequiredDeviceStatus` int(2) NOT NULL DEFAULT '-1',
  `TakeImage` int(3) DEFAULT '1',
  `TakeVideo` int(3) DEFAULT '0',
  `Resolution` int(4) NOT NULL DEFAULT '480'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_camera`
--

INSERT INTO `task_camera` (`TaskID`, `DeviceID`, `RequiredDeviceStatus`, `TakeImage`, `TakeVideo`, `Resolution`) VALUES
(59, 1001, 1, 15, -1, 480),
(59, 1002, 1, 10, -1, 480),
(71, 1001, 1, 22, -1, 480),
(71, 1002, 1, 1, -1, 480);

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
(20, 403, 0),
(20, 404, 0),
(21, 901, 0),
(21, 902, 1),
(22, 201, 0),
(22, 202, 1),
(22, 203, 1),
(22, 204, 1),
(24, 601, -1),
(24, 602, -1),
(24, 604, 1),
(58, 201, -1),
(58, 202, 1),
(58, 203, -1),
(58, 204, -1),
(59, 1004, 1),
(60, 601, -1),
(60, 602, -1),
(60, 604, 1),
(61, 101, 1),
(61, 102, 1),
(61, 103, -1),
(61, 104, -1),
(62, 101, 0),
(62, 102, 0),
(62, 103, -1),
(62, 104, -1),
(63, 101, 0),
(63, 102, 0),
(63, 103, -1),
(63, 104, -1),
(64, 101, 0),
(64, 102, 0),
(64, 103, -1),
(64, 104, -1),
(65, 201, 1),
(65, 202, 1),
(65, 203, -1),
(65, 204, -1),
(66, 201, 0),
(66, 202, 0),
(66, 203, -1),
(66, 204, -1),
(71, 1004, 0),
(72, 501, 0),
(72, 502, 1),
(72, 503, 1),
(72, 504, 0),
(73, 501, 0),
(73, 502, 1),
(73, 503, 0),
(73, 504, -1),
(74, 501, 1),
(74, 502, 0),
(74, 503, 0),
(74, 504, -1);

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
  `UserImagePath` varchar(100) NOT NULL DEFAULT 'Default_User_Img.png',
  `CellPhone` int(10) NOT NULL,
  `SendEmail` bit(1) NOT NULL DEFAULT b'1',
  `SendSMS` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `UserName`, `Title`, `Password`, `isAdmin`, `isDisabled`, `UserImagePath`, `CellPhone`, `SendEmail`, `SendSMS`) VALUES
(1, 'system.admin@gmail.com', 'System Admin', 'Admin', '1234', b'1', b'0', 'superAdmin.png', 542991095, b'1', b'1'),
(3, 'abdullah.alghamdi@gmail.com', 'Abdullah Alghamdi', 'Father', '123321', b'1', b'0', 'abdullah.jpg', 555555555, b'1', b'1'),
(4, 'Huda.Azzahrani@gmail.com', 'Huda Azzahrani', 'Mother', '12345', b'0', b'0', 'huda.png', 548251871, b'1', b'1'),
(5, 'Ahmad.alghamdi@hotmail.com', 'Ahmad alghamdi', 'Son', '', b'0', b'0', 'ahmad.jpg', 548922584, b'0', b'1'),
(7, 'Sarah.alghamdi@gmail.com', 'Sarah Alghamdi', 'Daughter', '44332211', b'0', b'0', 'sarah.png', 584965482, b'1', b'0');

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
(5, 102),
(5, 109),
(7, 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera_gallery`
--
ALTER TABLE `camera_gallery`
  ADD PRIMARY KEY (`MultimediaID`),
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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CameraID` (`CameraID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`LogRecordID`),
  ADD KEY `RecordCategoryID` (`RecordCategoryID`);

--
-- Indexes for table `log_category`
--
ALTER TABLE `log_category`
  ADD PRIMARY KEY (`RecordCategoryID`);

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
-- AUTO_INCREMENT for table `camera_gallery`
--
ALTER TABLE `camera_gallery`
  MODIFY `MultimediaID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `gpio_pins`
--
ALTER TABLE `gpio_pins`
  MODIFY `PinID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `ip_address`
--
ALTER TABLE `ip_address`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `LogRecordID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `log_category`
--
ALTER TABLE `log_category`
  MODIFY `RecordCategoryID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  MODIFY `ImageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `camera_gallery`
--
ALTER TABLE `camera_gallery`
  ADD CONSTRAINT `camera_gallery_ibfk_1` FOREIGN KEY (`cameraID`) REFERENCES `device` (`DeviceID`);

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
-- Constraints for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD CONSTRAINT `ip_address_ibfk_1` FOREIGN KEY (`CameraID`) REFERENCES `device` (`DeviceID`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`RecordCategoryID`) REFERENCES `log_category` (`RecordCategoryID`);

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
