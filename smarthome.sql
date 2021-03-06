-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 09:49 AM
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
(231, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-12-840.jpg'),
(232, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-13-550.jpg'),
(233, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-14-149.jpg'),
(234, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-14-752.jpg'),
(235, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-15-391.jpg'),
(236, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-16-71.jpg'),
(237, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-16-723.jpg'),
(238, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-17-317.jpg'),
(239, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-17-917.jpg'),
(240, 1002, b'1', '2016-12-20 11:35:12', 'Camera_1002_20-12-2016_17-35-18-481.jpg'),
(241, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-12-837.jpg'),
(242, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-13-855.jpg'),
(243, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-14-927.jpg'),
(244, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-16-29.jpg'),
(245, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-17-103.jpg'),
(246, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-18-383.jpg'),
(247, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-19-462.jpg'),
(248, 1001, b'1', '2016-12-20 11:35:12', 'Camera_1001_20-12-2016_17-35-20-613.jpg'),
(249, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-43-322.jpg'),
(250, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-44-40.jpg'),
(251, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-44-518.jpg'),
(252, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-45-35.jpg'),
(253, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-45-635.jpg'),
(254, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-46-61.jpg'),
(255, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-46-605.jpg'),
(256, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-47-20.jpg'),
(257, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-47-549.jpg'),
(258, 1002, b'1', '2016-12-20 15:04:43', 'Camera_1002_20-12-2016_21-04-48-23.jpg'),
(259, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-43-318.jpg'),
(260, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-44-530.jpg'),
(261, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-45-637.jpg'),
(262, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-46-635.jpg'),
(263, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-47-794.jpg'),
(264, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-48-649.jpg'),
(265, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-49-649.jpg'),
(266, 1001, b'1', '2016-12-20 15:04:43', 'Camera_1001_20-12-2016_21-04-50-491.jpg'),
(348, 1002, b'0', '2016-12-21 14:48:27', 'Camera_1002_21-12-2016_20-48-27-322.mp4'),
(349, 1001, b'0', '2016-12-21 14:48:27', 'Camera_1001_21-12-2016_20-48-27-263.mp4'),
(350, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-04-866.jpg'),
(351, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-04-866.jpg'),
(352, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-05-151.jpg'),
(353, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-05-161.jpg'),
(354, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-05-419.jpg'),
(355, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-05-447.jpg'),
(356, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-05-685.jpg'),
(357, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-05-734.jpg'),
(358, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-05-951.jpg'),
(359, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-06-23.jpg'),
(360, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-06-218.jpg'),
(361, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-06-315.jpg'),
(362, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-06-485.jpg'),
(363, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-06-603.jpg'),
(364, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-06-754.jpg'),
(365, 1001, b'1', '2016-12-21 14:51:04', 'Camera_1001_21-12-2016_20-51-06-890.jpg'),
(366, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-07-20.jpg'),
(367, 1002, b'1', '2016-12-21 14:51:04', 'Camera_1002_21-12-2016_20-51-07-286.jpg'),
(368, 1002, b'1', '2016-12-21 14:53:52', 'Camera_1002_21-12-2016_20-53-52-938.jpg'),
(369, 1001, b'1', '2016-12-21 14:53:52', 'Camera_1001_21-12-2016_20-53-52-938.jpg'),
(370, 1002, b'1', '2016-12-21 14:54:34', 'Camera_1002_21-12-2016_20-54-34-68.jpg'),
(371, 1001, b'1', '2016-12-21 14:54:34', 'Camera_1001_21-12-2016_20-54-34-65.jpg'),
(372, 1002, b'1', '2016-12-21 14:57:20', 'Camera_1002_21-12-2016_20-57-20-597.jpg'),
(373, 1001, b'1', '2016-12-21 14:57:20', 'Camera_1001_21-12-2016_20-57-20-593.jpg'),
(374, 1002, b'0', '2016-12-21 14:58:58', 'Camera_1002_21-12-2016_20-58-58-897.mp4'),
(375, 1001, b'0', '2016-12-21 14:58:58', 'Camera_1001_21-12-2016_20-58-58-901.mp4'),
(376, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-24-809.jpg'),
(377, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-24-812.jpg'),
(378, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-25-75.jpg'),
(379, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-25-98.jpg'),
(380, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-25-342.jpg'),
(381, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-25-389.jpg'),
(382, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-25-607.jpg'),
(383, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-25-679.jpg'),
(384, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-25-873.jpg'),
(385, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-25-968.jpg'),
(386, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-26-140.jpg'),
(387, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-26-259.jpg'),
(388, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-26-406.jpg'),
(389, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-26-551.jpg'),
(390, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-26-677.jpg'),
(391, 1001, b'1', '2016-12-21 15:01:24', 'Camera_1001_21-12-2016_21-01-26-837.jpg'),
(392, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-26-944.jpg'),
(393, 1002, b'1', '2016-12-21 15:01:24', 'Camera_1002_21-12-2016_21-01-27-215.jpg');

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
(101, 101, 'Roof Lamp', b'0', b'1', b'1', 91, 120, '2016-12-31 15:01:23', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(102, 101, 'AC', b'0', b'1', b'1', 103, 1800, '2017-01-01 19:22:35', 'cooler_on.png', 'cooler_off.png'),
(103, 101, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-31 14:59:22', 'curtains_opened.png', 'curtains_closed.png'),
(104, 101, 'Alarm', b'0', b'1', b'0', 75, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(201, 102, 'Roof Lamp', b'1', b'1', b'1', 92, 60, '2016-12-27 19:29:20', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(202, 102, 'AC', b'0', b'1', b'1', 101, 1200, '2017-01-01 22:34:47', 'cooler_on.png', 'cooler_off.png'),
(203, 102, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-14 19:49:13', 'curtains_opened.png', 'curtains_closed.png'),
(204, 102, 'Alarm', b'0', b'1', b'0', 78, 0, '2016-12-14 17:22:14', 'alarm.png', 'alarm_off.png'),
(401, 104, 'Roof Lamp', b'1', b'1', b'1', 93, 60, '2017-01-01 22:34:49', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(402, 104, 'AC', b'0', b'1', b'1', 102, 1200, '2017-01-01 22:34:52', 'cooler_on.png', 'cooler_off.png'),
(403, 104, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-23 09:06:51', 'curtains_opened.png', 'curtains_closed.png'),
(404, 104, 'Alarm', b'0', b'1', b'1', 79, 0, '2016-12-23 09:06:50', 'alarm.png', 'alarm_off.png'),
(501, 105, 'Roof Lamp', b'0', b'1', b'1', 94, 180, '2016-12-19 09:05:13', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(502, 105, 'AC', b'1', b'1', b'1', 100, 2400, '2017-01-01 21:59:48', 'cooler_on.png', 'cooler_off.png'),
(503, 105, 'Curtains', b'0', b'1', b'1', -1, 0, '2016-12-23 20:25:48', 'curtains_opened.png', 'curtains_closed.png'),
(504, 105, 'Alarm', b'0', b'1', b'0', 80, 0, '2016-12-02 21:41:20', 'alarm.png', 'alarm_off.png'),
(601, 106, 'Roof Lamp', b'0', b'1', b'0', 95, 120, '2016-12-02 21:41:20', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(602, 106, 'AC', b'0', b'1', b'1', 99, 1800, '2017-01-01 21:59:50', 'cooler_on.png', 'cooler_off.png'),
(604, 106, 'Alarm', b'0', b'1', b'0', 76, 0, '2016-12-14 17:22:35', 'alarm.png', 'alarm_off.png'),
(801, 108, 'Roof Lamp', b'0', b'1', b'0', 96, 60, '2016-12-02 21:41:20', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(901, 109, 'Roof Lamp', b'0', b'1', b'0', 97, 120, '2016-12-02 21:41:21', 'Roof_Lamp_on.png', 'Roof_Lamp_off.png'),
(902, 109, 'Garage Door', b'1', b'1', b'1', -1, 0, '2016-12-31 14:59:45', 'Garage-door_open.png', 'Garage-door_closed.png'),
(1001, 110, 'Security Camera', b'0', b'1', b'0', 107, 0, '2016-11-28 21:00:00', 'security-camera_on.png', 'security-camera_off.png'),
(1002, 110, 'Security Camera', b'0', b'1', b'0', 108, 0, '2016-11-28 21:00:00', 'security-camera_on.png', 'security-camera_off.png'),
(1004, 110, 'Alarm', b'0', b'1', b'0', 77, 0, '2016-12-24 18:07:35', 'alarm.png', 'alarm_off.png'),
(1005, 110, 'Water Pump', b'0', b'0', b'0', 82, 0, '2016-12-14 19:21:00', 'water-tank.png', 'water-tank.png');

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
(103, 39, 40, 41, 42, 5499, 5500),
(203, 83, 84, 85, 86, 5499, 5500),
(403, 35, 36, 37, 38, 5499, 5500),
(503, 27, 28, 29, 30, 5499, 5500),
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
  `RotationBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ID`, `DeviceName`, `IPaddress`, `RotationBy`) VALUES
(1, 'Router', '192.168.1.1', NULL),
(2, 'Raspberry Pi', '192.168.1.99', NULL),
(3, 'Relay Switch', '192.168.1.102', NULL),
(4, 'Security Camera 1', '192.168.1.100', 270),
(5, 'Security Camera 2', '192.168.1.101', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `LogRecordID` int(7) NOT NULL,
  `RecordCategoryID` int(2) NOT NULL,
  `isDeleted` bit(1) NOT NULL DEFAULT b'0',
  `Description` varchar(250) CHARACTER SET utf8 NOT NULL,
  `EntryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogRecordID`, `RecordCategoryID`, `isDeleted`, `Description`, `EntryDate`) VALUES
(1, 15, b'0', 'Admin (System Admin) added a new user (test)', '2016-12-11 16:45:53'),
(2, 16, b'0', 'Admin (System Admin) deleted user (test)', '2016-12-11 16:55:18'),
(4, 17, b'0', 'Admin (System Admin) disabled the account of user (Ahmad alghamdi)', '2016-12-11 17:10:30'),
(5, 18, b'0', 'Admin (System Admin) Enabled the account of user (Ahmad alghamdi)', '2016-12-11 17:13:48'),
(7, 19, b'0', 'Admin (System Admin) authorized (House_Parameters) to user (Ahmad alghamdi)', '2016-12-11 17:56:21'),
(9, 20, b'0', 'Admin (System Admin) unauthorized (House_Parameters) from user (Ahmad alghamdi)', '2016-12-11 17:56:24'),
(12, 15, b'0', 'Admin (System Admin) added a new user (test test2)', '2016-12-12 13:06:21'),
(13, 17, b'0', 'Admin (System Admin) disabled the account of user (test test2)', '2016-12-12 13:06:40'),
(14, 16, b'0', 'Admin (System Admin) deleted user (test test2)', '2016-12-12 13:07:04'),
(15, 15, b'0', 'Admin (System Admin) added a new user (new test)', '2016-12-12 13:08:06'),
(16, 16, b'0', 'Admin (System Admin) deleted user (new test)', '2016-12-12 13:08:49'),
(33, 19, b'0', 'Admin (System Admin) authorized (Kitchen) to user (Sarah Alghamdi)', '2016-12-12 14:16:32'),
(34, 20, b'0', 'Admin (System Admin) unauthorized (Kitchen) from user (Sarah Alghamdi)', '2016-12-12 14:16:33'),
(35, 27, b'0', 'Admin (System Admin) deleted task (231) from room (Kitchen)', '2016-12-12 16:00:39'),
(36, 25, b'0', 'Admin (System Admin) created a task with name (new task) in room (Garage)', '2016-12-12 16:05:03'),
(38, 25, b'0', 'Admin (System Admin) created a task with name (new test) in room (Garage)', '2016-12-12 16:07:08'),
(39, 25, b'0', 'Admin (System Admin) created a task with name (newest test) in room (Garage)', '2016-12-12 16:11:58'),
(41, 26, b'0', 'Admin (System Admin) edited task (newest test) in room (Garage)', '2016-12-12 16:14:58'),
(42, 27, b'0', 'Admin (System Admin) deleted task (newest test) from room (Garage)', '2016-12-12 16:18:26'),
(43, 27, b'0', 'Admin (System Admin) deleted task (newest test) from room (Garage)', '2016-12-12 17:42:20'),
(46, 28, b'0', 'Admin (System Admin) changed his/her personal settings', '2016-12-13 06:31:49'),
(47, 29, b'0', 'Admin (System Admin) uploaded a new background for room (Parents_Room)', '2016-12-13 19:11:29'),
(49, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-13 19:16:57'),
(52, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-13 19:18:19'),
(53, 24, b'0', 'Admin (System Admin) [Opened] the (Garage Door) in (Garage)', '2016-12-14 10:34:55'),
(54, 24, b'0', 'Admin (System Admin) [Closed] the (Garage Door) in (Garage)', '2016-12-14 10:34:58'),
(55, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-14 14:23:13'),
(56, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-14 14:25:37'),
(57, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-14 14:26:11'),
(58, 24, b'0', 'Admin (System Admin) [Opened] the (Curtains) in (Ahmad_Room)', '2016-12-14 16:49:09'),
(59, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Ahmad_Room)', '2016-12-14 16:49:11'),
(60, 24, b'0', 'Admin (System Admin) [Opened] the (Curtains) in (Ahmad_Room)', '2016-12-14 16:49:12'),
(61, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Ahmad_Room)', '2016-12-14 16:49:13'),
(68, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-14 18:30:48'),
(69, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-14 20:16:17'),
(70, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-14 20:16:18'),
(71, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Kitchen)', '2016-12-14 20:16:23'),
(72, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Kitchen)', '2016-12-14 20:16:24'),
(73, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-14 20:23:09'),
(74, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-14 20:23:14'),
(75, 19, b'0', 'Admin (System Admin) authorized (Ahmad_Room) to user (System Admin)', '2016-12-14 20:55:22'),
(76, 20, b'0', 'Admin (System Admin) unauthorized (Ahmad_Room) from user (System Admin)', '2016-12-14 20:55:23'),
(77, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-15 09:21:11'),
(78, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-15 09:21:12'),
(80, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-15 10:18:25'),
(81, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-15 14:56:42'),
(82, 17, b'0', 'Admin (System Admin) disabled the account of user (Huda Azzahrani)', '2016-12-15 15:11:30'),
(83, 18, b'0', 'Admin (System Admin) Enabled the account of user (Huda Azzahrani)', '2016-12-15 15:11:33'),
(84, 19, b'0', 'Admin (System Admin) authorized (House_Parameters) to user (Ahmad alghamdi)', '2016-12-15 15:11:40'),
(85, 20, b'0', 'Admin (System Admin) unauthorized (House_Parameters) from user (Ahmad alghamdi)', '2016-12-15 15:11:41'),
(86, 15, b'0', 'Admin (System Admin) added a new user (Riyad Jaamour)', '2016-12-16 03:04:15'),
(87, 15, b'0', 'Admin (System Admin) added a new user (test)', '2016-12-16 03:10:46'),
(88, 16, b'0', 'Admin (System Admin) deleted user (test)', '2016-12-16 03:10:54'),
(89, 22, b'0', 'User (Riyad Jaamour) has successfully logged in', '2016-12-16 03:11:48'),
(90, 19, b'0', 'Admin (System Admin) authorized (Parents_Room) to user (Riyad Jaamour)', '2016-12-16 03:22:08'),
(91, 19, b'0', 'Admin (System Admin) authorized (House_Parameters) to user (Riyad Jaamour)', '2016-12-16 03:26:21'),
(92, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-16 05:02:14'),
(93, 20, b'0', 'Admin (System Admin) unauthorized (Parents_Room) from user (Riyad Jaamour)', '2016-12-16 05:59:33'),
(94, 20, b'0', 'Admin (System Admin) unauthorized (House_Parameters) from user (Riyad Jaamour)', '2016-12-16 06:08:26'),
(95, 16, b'0', 'Admin (System Admin) deleted user (Riyad Jaamour)', '2016-12-16 06:08:30'),
(96, 24, b'0', 'Admin (System Admin) [Opened] the (Curtains) in (Parents_Room)', '2016-12-16 08:19:10'),
(97, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Parents_Room)', '2016-12-16 08:19:11'),
(98, 26, b'0', 'Admin (System Admin) edited task (Parents Room Motion) in room (Parents_Room)', '2016-12-16 17:39:29'),
(99, 11, b'0', 'Task Boy Room Motion in Ahmad_Room Excuted with Motion Sensor and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-14 14:07:39'),
(100, 11, b'0', 'Task Parents Room after no Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-14 14:08:05'),
(101, 11, b'0', 'Task Boy Room after no Motion in Ahmad_Room Excuted with Motion Sensor and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-14 14:08:43'),
(102, 11, b'0', 'Task Parents Room Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-14 14:09:48'),
(103, 11, b'0', 'Task Parents Room after no Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-14 14:10:51'),
(104, 11, b'0', 'Task Parents Room Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-14 14:18:24'),
(105, 11, b'0', 'Task Parents Room after no Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-14 14:19:26'),
(106, 11, b'0', 'Task Parents Room Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-14 14:21:44'),
(107, 11, b'0', 'Task Parents Room after no Motion in Parents_Room Excuted with Motion Sensor and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-14 14:22:46'),
(108, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-15 04:03:02'),
(109, 11, b'0', 'Task (Parents Room Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-15 04:03:35'),
(110, 11, b'0', 'Task (Parents Room after no Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-15 04:06:21'),
(113, 13, b'0', 'Task (Water) in House_Parameters Executed with (Ultrasonic) The Water level in the tank has reached 40%.', '2016-12-15 04:07:20'),
(116, 11, b'0', 'Task (Parents Room Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-15 04:08:57'),
(117, 11, b'0', 'Task (Parents Room after no Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-15 04:09:59'),
(118, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-15 04:11:27'),
(119, 11, b'0', 'Task (AC ON) in Parents_Room Executed with (Temperature Sensor) and Turned ( AC [true] )', '2016-12-16 12:50:59'),
(132, 25, b'0', 'Admin (System Admin) created a task with name (testin) in room (Garage)', '2016-12-16 18:24:31'),
(133, 27, b'0', 'Admin (System Admin) deleted task (testin) from room (Garage)', '2016-12-16 18:24:36'),
(134, 27, b'0', 'Admin (System Admin) deleted task (testin) from room (Garage)', '2016-12-16 18:24:54'),
(137, 11, b'0', 'Task (AC ON) in Parents_Room Executed with (Temperature Sensor) and Turned ( AC [true] )', '2016-12-17 08:35:48'),
(139, 13, b'0', 'Task (Water) in House_Parameters Executed with (Ultrasonic) The Water level in the tank has reached 40%.', '2016-12-17 08:41:09'),
(171, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-17 09:30:34'),
(173, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-17 09:31:38'),
(177, 13, b'0', 'Task (Water) in House_Parameters Executed with (Ultrasonic) The Water level in the tank has reached 40%.', '2016-12-17 09:34:00'),
(179, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Parents_Room)', '2016-12-17 09:52:00'),
(180, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-17 09:52:02'),
(182, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 08:10:38'),
(183, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 08:19:56'),
(184, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 09:46:59'),
(185, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 10:36:31'),
(186, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 10:58:37'),
(187, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Parents_Room)', '2016-12-20 11:04:06'),
(188, 26, b'0', 'Admin (System Admin) edited task (Light) in room (Parents_Room)', '2016-12-20 11:05:25'),
(189, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-20 11:05:42'),
(190, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Parents_Room)', '2016-12-20 11:09:35'),
(191, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Ahmad_Room)', '2016-12-20 11:10:06'),
(192, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Ahmad_Room)', '2016-12-20 11:10:10'),
(193, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-20 11:10:13'),
(194, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:10:44'),
(195, 11, b'0', 'Task (Parents Room after no Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( Curtains [false] )', '2016-12-20 11:11:39'),
(196, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:39'),
(197, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:41'),
(198, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:42'),
(199, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:44'),
(200, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:47'),
(201, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:49'),
(202, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:51'),
(203, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:53'),
(204, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:55'),
(205, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:57'),
(206, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:11:59'),
(207, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:01'),
(208, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:03'),
(209, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:05'),
(210, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:07'),
(211, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:09'),
(212, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:12:11'),
(213, 26, b'0', 'Admin (System Admin) edited task (Parents Room after no Motion) in room (Parents_Room)', '2016-12-20 11:12:18'),
(214, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:12:48'),
(215, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:12:48'),
(216, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-20 11:13:00'),
(217, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Parents_Room)', '2016-12-20 11:13:01'),
(218, 11, b'0', 'Task (Light) in Parents_Room Executed with (Light Sensor) and Turned ( Roof Lamp [true] ), ( Curtains [true] )', '2016-12-20 11:13:49'),
(219, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 11:14:09'),
(220, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:14:46'),
(221, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:14:46'),
(222, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:14:46'),
(223, 14, b'0', 'Task (Camera) in House_Parameters Executed with (Infrared Sensor) House parameters are breached, The Security Camera Took 8 Imgs, The Security Camera Took 10 Imgs', '2016-12-20 11:14:58'),
(224, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 11:16:14'),
(225, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 11:27:24'),
(226, 14, b'0', 'Task (Camera) in House_Parameters Executed with (Infrared Sensor) House parameters are breached, The Security Camera Took 8 Imgs, The Security Camera Took 10 Imgs', '2016-12-20 11:27:25'),
(227, 14, b'0', 'Task (Camera) in House_Parameters Executed with (Infrared Sensor) House parameters are breached, The Security Camera Took 8 Imgs, The Security Camera Took 10 Imgs', '2016-12-20 11:35:13'),
(228, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 11:36:15'),
(229, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-20 14:42:15'),
(230, 11, b'0', 'Task (AC ON) in Parents_Room Executed with (Temperature Sensor) and Turned ( AC [true] )', '2016-12-20 14:43:05'),
(231, 11, b'0', 'Task (Parents Room Motion) in Parents_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 14:43:24'),
(232, 11, b'0', 'Task (Boy Room Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 14:43:30'),
(233, 11, b'0', 'Task (Girl Room Motion) in Sarah_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 14:43:34'),
(234, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 14:43:45'),
(235, 11, b'0', 'Task (Kitchen Motion) in Kitchen Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] )', '2016-12-20 14:43:45'),
(236, 11, b'0', 'Task (open lights on motion sensor) in Bathroom Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 14:43:45'),
(237, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 14:44:33'),
(238, 11, b'0', 'Task (Girl Room after no Motion) in Sarah_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 14:44:37'),
(239, 11, b'0', 'Task (Kitchen after no Motion) in Kitchen Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] )', '2016-12-20 14:44:41'),
(240, 11, b'0', 'Task (Bathroom after no Motion) in Bathroom Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 14:44:49'),
(241, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 14:44:49'),
(242, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 14:49:21'),
(243, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 14:56:34'),
(244, 11, b'0', 'Task (Boy Room Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 14:57:04'),
(245, 11, b'0', 'Task (Girl Room Motion) in Sarah_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 14:57:08'),
(246, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 14:57:14'),
(247, 11, b'0', 'Task (Kitchen Motion) in Kitchen Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] )', '2016-12-20 14:57:14'),
(248, 11, b'0', 'Task (open lights on motion sensor) in Bathroom Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 14:57:24'),
(249, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 14:58:05'),
(250, 11, b'0', 'Task (Girl Room after no Motion) in Sarah_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 14:58:11'),
(251, 11, b'0', 'Task (Kitchen after no Motion) in Kitchen Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] )', '2016-12-20 14:58:17'),
(252, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 14:58:23'),
(253, 11, b'0', 'Task (Bathroom after no Motion) in Bathroom Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 14:58:26'),
(254, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-20 14:59:43'),
(255, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2016-12-20 14:59:52'),
(256, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Parents_Room)', '2016-12-20 15:00:26'),
(257, 11, b'0', 'Task (Boy Room Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 15:01:22'),
(258, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 15:02:56'),
(259, 11, b'0', 'Task (Garage Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [true] )', '2016-12-20 15:04:23'),
(260, 14, b'0', 'Task (Camera) in House_Parameters Executed with (Infrared Sensor) House parameters are breached, The Security Camera Took 8 Imgs, The Security Camera Took 10 Imgs', '2016-12-20 15:04:43'),
(261, 14, b'0', 'Task (Camera) in House_Parameters Executed with (Infrared Sensor) House parameters are breached, The Security Camera Took 8 Imgs, The Security Camera Took 10 Imgs', '2016-12-20 15:04:47'),
(262, 11, b'0', 'Task (Boy Room Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [true] ), ( AC [true] ), ( Curtains [true] )', '2016-12-20 15:04:52'),
(263, 11, b'0', 'Task (Garage after no Motion) in Garage Executed with (Motion Sensor) and Turned ( Roof Lamp [false] )', '2016-12-20 15:05:51'),
(264, 11, b'0', 'Task (Boy Room after no Motion) in Ahmad_Room Executed with (Motion Sensor) and Turned ( Roof Lamp [false] ), ( AC [false] ), ( Curtains [false] )', '2016-12-20 15:05:53'),
(265, 26, b'0', 'Admin (System Admin) edited task (Girl Room Motion) in room (Sarah_Room)', '2016-12-21 06:32:35'),
(266, 26, b'0', 'Admin (System Admin) edited task (Girl Room Motion) in room (Sarah_Room)', '2016-12-21 06:34:51'),
(267, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-21 09:48:43'),
(268, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Ahmad_Room)', '2016-12-21 09:49:12'),
(269, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-21 09:49:57'),
(270, 25, b'0', 'Admin (System Admin) created a task with name (asd) in room (Kitchen)', '2016-12-21 20:20:43'),
(271, 27, b'0', 'Admin (System Admin) deleted task (asd) from room (Kitchen)', '2016-12-21 20:20:54'),
(272, 26, b'0', 'Admin (System Admin) edited task (Kitchen after no Motion) in room (Kitchen)', '2016-12-21 20:33:40'),
(273, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-21 20:38:05'),
(274, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-21 20:38:16'),
(275, 26, b'0', 'Admin (System Admin) edited task (Camera) in room (House_Parameters)', '2016-12-21 20:38:24'),
(276, 25, b'0', 'Admin (System Admin) created a task with name (test security) in room (House_Parameters)', '2016-12-21 20:39:39'),
(277, 27, b'0', 'Admin (System Admin) deleted task (test security) from room (House_Parameters)', '2016-12-21 20:40:34'),
(278, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-22 09:24:40'),
(280, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-22 10:15:52'),
(281, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2016-12-22 14:54:14'),
(282, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2016-12-22 14:54:15'),
(283, 26, b'0', 'Admin (System Admin) edited task (Living Room Motion Room after no Motion) in room (Living_Room)', '2016-12-22 14:55:07'),
(284, 26, b'0', 'Admin (System Admin) edited task (Living Room Motion Room after no Motion) in room (Living_Room)', '2016-12-22 14:55:11'),
(285, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 08:58:02'),
(286, 15, b'0', 'Admin (System Admin) added a new user (test)', '2016-12-23 09:00:27'),
(288, 22, b'0', 'User (test) has successfully logged in', '2016-12-23 09:03:26'),
(289, 19, b'0', 'Admin (System Admin) authorized (Sarah_Room) to user (test)', '2016-12-23 09:05:49'),
(290, 19, b'0', 'Admin (System Admin) authorized (Kitchen) to user (test)', '2016-12-23 09:05:56'),
(291, 23, b'0', 'User (test) turned the (Roof Lamp) [ON] in (Sarah_Room)', '2016-12-23 09:06:45'),
(292, 23, b'0', 'User (test) turned the (AC) [ON] in (Sarah_Room)', '2016-12-23 09:06:47'),
(293, 24, b'0', 'User (test) [Opened] the (Curtains) in (Sarah_Room)', '2016-12-23 09:06:48'),
(294, 23, b'0', 'User (test) turned the (Alarm) [ON] in (Sarah_Room)', '2016-12-23 09:06:50'),
(295, 23, b'0', 'User (test) turned the (Alarm) [OFF] in (Sarah_Room)', '2016-12-23 09:06:50'),
(296, 24, b'0', 'User (test) [Closed] the (Curtains) in (Sarah_Room)', '2016-12-23 09:06:51'),
(297, 23, b'0', 'User (test) turned the (AC) [OFF] in (Sarah_Room)', '2016-12-23 09:06:53'),
(298, 23, b'0', 'User (test) turned the (AC) [ON] in (Kitchen)', '2016-12-23 09:07:04'),
(299, 23, b'0', 'User (test) turned the (AC) [OFF] in (Kitchen)', '2016-12-23 09:07:05'),
(300, 25, b'0', 'User (test) created a task with name (fajer prayer) in room (Sarah_Room)', '2016-12-23 09:17:54'),
(302, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 09:23:18'),
(303, 17, b'0', 'Admin (System Admin) disabled the account of user (test)', '2016-12-23 09:26:04'),
(304, 22, b'0', 'User (test) has successfully logged in', '2016-12-23 09:26:10'),
(305, 20, b'0', 'Admin (System Admin) unauthorized (Kitchen) from user (test)', '2016-12-23 10:29:53'),
(306, 20, b'0', 'Admin (System Admin) unauthorized (Sarah_Room) from user (test)', '2016-12-23 10:29:54'),
(307, 19, b'0', 'Admin (System Admin) authorized (Sarah_Room) to user (test)', '2016-12-23 10:30:29'),
(308, 19, b'0', 'Admin (System Admin) authorized (Kitchen) to user (test)', '2016-12-23 10:30:30'),
(309, 20, b'0', 'Admin (System Admin) unauthorized (Kitchen) from user (test)', '2016-12-23 10:46:59'),
(310, 19, b'0', 'Admin (System Admin) authorized (Kitchen) to user (test)', '2016-12-23 10:47:01'),
(311, 19, b'0', 'Admin (System Admin) authorized (Bathroom) to user (test)', '2016-12-23 10:47:41'),
(312, 20, b'0', 'Admin (System Admin) unauthorized (Bathroom) from user (test)', '2016-12-23 10:47:42'),
(313, 27, b'0', 'Admin (System Admin) deleted task (fajer prayer) from room (Sarah_Room)', '2016-12-23 10:48:48'),
(314, 20, b'0', 'Admin (System Admin) unauthorized (Kitchen) from user (test)', '2016-12-23 10:48:54'),
(315, 20, b'0', 'Admin (System Admin) unauthorized (Sarah_Room) from user (test)', '2016-12-23 10:48:55'),
(316, 16, b'0', 'Admin (System Admin) deleted user (test)', '2016-12-23 10:49:13'),
(317, 17, b'0', 'Admin (System Admin) disabled the account of user (Sarah Alghamdi)', '2016-12-23 10:51:10'),
(318, 18, b'0', 'Admin (System Admin) Enabled the account of user (Sarah Alghamdi)', '2016-12-23 10:51:14'),
(319, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 10:53:35'),
(320, 22, b'0', 'User (Huda Azzahrani) has successfully logged in', '2016-12-23 10:54:33'),
(325, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 10:56:53'),
(326, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 11:44:16'),
(327, 25, b'0', 'Admin (Abdullah Alghamdi) created a task with name (test admin) in room (Parents_Room)', '2016-12-23 11:45:24'),
(328, 27, b'0', 'Admin (Abdullah Alghamdi) deleted task (test admin) from room (Parents_Room)', '2016-12-23 11:46:19'),
(334, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 11:48:57'),
(335, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 11:58:38'),
(336, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 11:58:50'),
(341, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 12:03:25'),
(343, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 12:04:00'),
(344, 25, b'0', 'Admin (Abdullah Alghamdi) created a task with name (Fajer Prayer) in room (Ahmad_Room)', '2016-12-23 12:05:11'),
(345, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 12:07:41'),
(346, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 12:37:29'),
(347, 25, b'0', 'Admin (Abdullah Alghamdi) created a task with name (new task) in room (Kitchen)', '2016-12-23 12:53:16'),
(348, 27, b'0', 'Admin (Abdullah Alghamdi) deleted task (new task) from room (Kitchen)', '2016-12-23 12:53:34'),
(349, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 12:53:44'),
(350, 25, b'0', 'Admin (System Admin) created a task with name (tempratue task) in room (Kitchen)', '2016-12-23 12:54:14'),
(351, 27, b'0', 'Admin (System Admin) deleted task (tempratue task) from room (Kitchen)', '2016-12-23 13:23:49'),
(352, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 13:24:04'),
(353, 27, b'0', 'Admin (Abdullah Alghamdi) deleted task (Fajer Prayer) from room (Ahmad_Room)', '2016-12-23 13:24:42'),
(364, 22, b'0', 'User (Huda Azzahrani) has successfully logged in', '2016-12-23 14:57:12'),
(365, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 14:57:31'),
(366, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 14:58:20'),
(372, 22, b'0', 'User (Ahmad alghamdi) has successfully logged in', '2016-12-23 19:37:03'),
(373, 25, b'0', 'User (Ahmad alghamdi) created a task with name (Work Alarm) in room (Ahmad_Room)', '2016-12-23 19:38:19'),
(376, 22, b'0', 'User (Sarah Alghamdi) has successfully logged in', '2016-12-23 19:50:21'),
(377, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 19:52:14'),
(378, 19, b'0', 'Admin (System Admin) authorized (Kitchen) to user (Sarah Alghamdi)', '2016-12-23 19:53:55'),
(379, 19, b'0', 'Admin (System Admin) authorized (Living_Room) to user (Sarah Alghamdi)', '2016-12-23 19:54:23'),
(380, 19, b'0', 'Admin (System Admin) authorized (Living_Room) to user (Ahmad alghamdi)', '2016-12-23 19:54:39'),
(381, 22, b'0', 'User (Sarah Alghamdi) has successfully logged in', '2016-12-23 19:54:54'),
(382, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 19:55:19'),
(383, 19, b'0', 'Admin (System Admin) authorized (Living_Room) to user (Huda Azzahrani)', '2016-12-23 19:55:25'),
(384, 22, b'0', 'User (Sarah Alghamdi) has successfully logged in', '2016-12-23 19:55:34'),
(385, 22, b'0', 'User (Ahmad alghamdi) has successfully logged in', '2016-12-23 19:55:50'),
(386, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 19:56:15'),
(387, 22, b'0', 'User (Sarah Alghamdi) has successfully logged in', '2016-12-23 19:57:32'),
(388, 25, b'0', 'User (Sarah Alghamdi) created a task with name (Turn AC OFF when Cold) in room (Sarah_Room)', '2016-12-23 19:58:27'),
(389, 22, b'0', 'User (Huda Azzahrani) has successfully logged in', '2016-12-23 19:58:55'),
(390, 25, b'0', 'User (Huda Azzahrani) created a task with name (Turn AC ON) in room (Kitchen)', '2016-12-23 19:59:57'),
(391, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 20:00:26'),
(392, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 20:01:44'),
(393, 25, b'0', 'Admin (Abdullah Alghamdi) created a task with name (Gas and Fire Detection) in room (Kitchen)', '2016-12-23 20:02:31'),
(394, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 20:06:04'),
(395, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2016-12-23 20:06:27'),
(396, 25, b'0', 'Admin (Abdullah Alghamdi) created a task with name (Water Tank level 20%) in room (House_Parameters)', '2016-12-23 20:07:27'),
(397, 26, b'0', 'Admin (Abdullah Alghamdi) edited task (Water Tank level 40%) in room (House_Parameters)', '2016-12-23 20:08:12'),
(402, 23, b'0', 'Admin (Abdullah Alghamdi) turned the (AC) [OFF] in (Living_Room)', '2016-12-23 20:25:46'),
(403, 23, b'0', 'Admin (Abdullah Alghamdi) turned the (Roof Lamp) [OFF] in (Sarah_Room)', '2016-12-23 20:25:47'),
(404, 24, b'0', 'Admin (Abdullah Alghamdi) [Closed] the (Curtains) in (Living_Room)', '2016-12-23 20:25:48'),
(405, 23, b'0', 'Admin (Abdullah Alghamdi) turned the (Roof Lamp) [OFF] in (Ahmad_Room)', '2016-12-23 20:25:49'),
(408, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-23 20:39:36'),
(409, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-24 20:48:21'),
(410, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-25 04:49:07'),
(411, 29, b'0', 'Admin (System Admin) uploaded a new background for room (House_Parameters)', '2016-12-25 14:16:10'),
(412, 19, b'0', 'Admin (System Admin) authorized (Ahmad_Room) to user (Huda Azzahrani)', '2016-12-26 11:57:02'),
(413, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2016-12-26 12:44:22'),
(414, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2016-12-26 12:44:23'),
(415, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2016-12-26 12:57:27'),
(416, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2016-12-26 12:57:29'),
(417, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Parents_Room)', '2016-12-26 13:41:50'),
(418, 24, b'0', 'Admin (System Admin) [Opened] the (Garage Door) in (Garage)', '2016-12-27 12:53:40'),
(419, 24, b'0', 'Admin (System Admin) [Closed] the (Garage Door) in (Garage)', '2016-12-27 12:53:43'),
(420, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Ahmad_Room)', '2016-12-27 13:02:28'),
(421, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Sarah_Room)', '2016-12-27 13:02:30'),
(422, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-27 19:28:37'),
(423, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-27 19:28:39'),
(424, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Ahmad_Room)', '2016-12-27 19:29:19'),
(425, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Ahmad_Room)', '2016-12-27 19:29:20'),
(426, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-27 19:29:20'),
(427, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-27 19:29:21'),
(428, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Sarah_Room)', '2016-12-27 19:29:26'),
(429, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-27 19:31:39'),
(430, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-27 19:31:40'),
(431, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Sarah_Room)', '2016-12-27 19:32:01'),
(432, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Kitchen)', '2016-12-27 19:32:02'),
(433, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Sarah_Room)', '2016-12-27 19:32:04'),
(434, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Kitchen)', '2016-12-27 19:32:05'),
(435, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2016-12-27 19:34:26'),
(436, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2016-12-27 19:34:27'),
(437, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Sarah_Room)', '2016-12-27 19:34:57'),
(438, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Sarah_Room)', '2016-12-27 19:34:58'),
(439, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Living_Room)', '2016-12-27 19:35:01'),
(440, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Living_Room)', '2016-12-27 19:35:01'),
(441, 22, b'0', 'Admin (System Admin) has successfully logged in', '2016-12-31 14:59:03'),
(442, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Parents_Room)', '2016-12-31 14:59:14'),
(443, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2016-12-31 14:59:17'),
(444, 24, b'0', 'Admin (System Admin) [Opened] the (Curtains) in (Parents_Room)', '2016-12-31 14:59:20'),
(445, 24, b'0', 'Admin (System Admin) [Closed] the (Curtains) in (Parents_Room)', '2016-12-31 14:59:22'),
(446, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2016-12-31 14:59:25'),
(447, 24, b'0', 'Admin (System Admin) [Opened] the (Garage Door) in (Garage)', '2016-12-31 14:59:45'),
(448, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [OFF] in (Parents_Room)', '2016-12-31 15:01:23'),
(449, 25, b'0', 'Admin (System Admin) created a task with name (test) in room (Parents_Room)', '2016-12-31 15:07:40'),
(450, 20, b'0', 'Admin (System Admin) unauthorized (Ahmad_Room) from user (Huda Azzahrani)', '2016-12-31 15:08:46'),
(451, 25, b'0', 'Admin (System Admin) created a task with name (test) in room (House_Borders)', '2016-12-31 15:11:56'),
(452, 27, b'0', 'Admin (System Admin) deleted task (test) from room (House_Borders)', '2016-12-31 15:12:23'),
(453, 22, b'0', 'User (Ahmad alghamdi) has successfully logged in', '2016-12-31 15:16:26'),
(454, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-01 10:15:46'),
(455, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-01 13:33:48'),
(456, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2017-01-01 13:38:27'),
(457, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2017-01-01 13:38:27'),
(458, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Parents_Room)', '2017-01-01 19:22:34'),
(459, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Parents_Room)', '2017-01-01 19:22:35'),
(460, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 21:47:59'),
(461, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 21:48:00'),
(462, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 21:49:14'),
(463, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 21:49:15'),
(464, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 21:49:17'),
(465, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Living_Room)', '2017-01-01 21:59:48'),
(466, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Kitchen)', '2017-01-01 21:59:49'),
(467, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Kitchen)', '2017-01-01 21:59:50'),
(468, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:08:25'),
(469, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:08:26'),
(470, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:08:27'),
(471, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:08:57'),
(472, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:08:58'),
(473, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:11:48'),
(474, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:11:49'),
(475, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:17:31'),
(476, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:17:31'),
(477, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:17:40'),
(478, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:17:42'),
(479, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Ahmad_Room)', '2017-01-01 22:34:47'),
(480, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Ahmad_Room)', '2017-01-01 22:34:47'),
(481, 23, b'0', 'Admin (System Admin) turned the (Roof Lamp) [ON] in (Sarah_Room)', '2017-01-01 22:34:49'),
(482, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Sarah_Room)', '2017-01-01 22:34:50'),
(483, 23, b'0', 'Admin (System Admin) turned the (AC) [ON] in (Sarah_Room)', '2017-01-01 22:34:50'),
(484, 23, b'0', 'Admin (System Admin) turned the (AC) [OFF] in (Sarah_Room)', '2017-01-01 22:34:52'),
(485, 27, b'0', 'Admin (System Admin) deleted task (test) from room (Parents_Room)', '2017-01-03 14:17:53'),
(486, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-05 18:41:12'),
(487, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-05 18:57:43'),
(488, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-05 18:58:47'),
(494, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-06 08:10:24'),
(495, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-06 08:10:34'),
(496, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:11:45'),
(497, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:17:30'),
(498, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:22:20'),
(499, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:43:45'),
(500, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:44:09'),
(501, 28, b'0', 'Admin (System Admin) changed his/her PASSWORD', '2017-01-06 08:44:14'),
(502, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2017-01-06 08:44:43'),
(503, 28, b'0', 'Admin (Abdullah Alghamdi) changed his/her PASSWORD', '2017-01-06 08:44:58'),
(505, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2017-01-06 08:51:32'),
(506, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-06 08:51:39'),
(508, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2017-01-06 08:52:12'),
(693, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-08 21:59:22'),
(694, 26, b'0', 'Admin (System Admin) edited task (Fajer prayer) in room (Parents_Room)', '2017-01-08 22:04:48'),
(695, 22, b'0', 'Admin (Abdullah Alghamdi) has successfully logged in', '2017-01-08 22:06:16'),
(703, 26, b'0', 'Admin (Abdullah Alghamdi) edited task (Boy Room Motion) in room (Ahmad_Room)', '2017-01-08 22:11:06'),
(704, 21, b'0', 'Failed log in attempt with Email (eyad.jaamour@gmail.com) & IP Address (::1)', '2017-01-08 22:16:16'),
(705, 21, b'0', 'Failed log in attempt with Email (eyad.jaamour@gmail.com) & IP Address (::1)', '2017-01-08 22:16:19'),
(706, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-08 22:16:26'),
(707, 22, b'0', 'Admin (System Admin) has successfully logged in', '2017-01-09 04:59:31');

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
(19, 'admin_authorized_room', b'0', 'Admin ($AdminUserName) authorized ($RoomName) to user ($UserName)', NULL),
(20, 'admin_unauthorized_room', b'0', 'Admin ($AdminUserName) unauthorized ($RoomName) from user ($UserName)', NULL),
(21, 'failed_log_in_attempt', b'1', 'Failed log in attempt with Email ($Email) & Password ($Password)', NULL),
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
(110, 'House_Borders', 'house-Borders1.png');

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
(9, 110, b'1', 'house-Borders1.png'),
(10, 110, b'0', 'house-Borders2.png'),
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
(52, 104, b'0', 'Sarah_Room_2016-12-10-06-36-51.jpg'),
(53, 110, b'0', 'House_Borders_2016-12-25-14-16-10.png');

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
(101, 10, 101, b'0', 0, b'1', 57, '2017-01-09 06:25:50'),
(102, 12, 101, b'0', 24, b'1', 5, '2016-12-02 21:41:38'),
(103, 13, 101, b'0', 0, b'1', 19, '2016-12-02 20:15:39'),
(200, 20, 102, b'0', 0, b'1', -1, '2016-11-20 19:37:00'),
(201, 10, 102, b'0', 0, b'1', 55, '2016-12-02 19:36:41'),
(202, 12, 102, b'0', 25, b'1', 3, '2016-12-02 21:41:54'),
(203, 13, 102, b'0', 0, b'1', 22, '2016-12-02 20:15:39'),
(400, 20, 104, b'0', 0, b'1', -1, '2016-11-20 19:37:48'),
(401, 10, 104, b'1', 0, b'1', 56, '2017-01-09 06:40:08'),
(402, 12, 104, b'0', 25, b'1', 4, '2016-12-02 21:47:41'),
(403, 13, 104, b'0', 0, b'1', 21, '2016-12-02 20:15:39'),
(500, 20, 105, b'0', 0, b'1', -1, '2016-11-20 19:38:57'),
(501, 10, 105, b'0', 0, b'1', 53, '2016-12-02 20:16:28'),
(502, 12, 105, b'0', 24, b'1', 2, '2016-12-02 21:46:52'),
(503, 13, 105, b'0', 0, b'1', 20, '2016-12-02 21:41:29'),
(600, 20, 106, b'0', 0, b'1', -1, '2016-11-20 19:39:51'),
(601, 10, 106, b'0', 0, b'1', 52, '2017-01-09 06:38:34'),
(602, 12, 106, b'0', 22, b'1', 1, '2016-12-02 21:47:42'),
(604, 11, 106, b'0', 0, b'1', 6, '2016-12-26 12:26:25'),
(800, 20, 108, b'0', 0, b'1', -1, '2016-11-20 19:41:04'),
(801, 10, 108, b'0', 0, b'1', 51, '2016-12-02 16:16:17'),
(900, 20, 109, b'0', 0, b'1', -1, '2016-11-20 19:41:31'),
(901, 10, 109, b'1', 0, b'1', 54, '2017-01-09 06:42:12'),
(1000, 20, 110, b'0', 0, b'1', -1, '2016-11-20 19:43:22'),
(1001, 15, 110, b'0', 0, b'1', 43, '2016-12-23 09:02:58'),
(1002, 14, 110, b'0', 6, b'1', -1, '2016-12-20 18:37:26'),
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
(1002, 23, 24, 15, 6),
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
(10, 'Motion Sensor', 'motion-sensor4.png'),
(11, 'Smoke Detector', 'smoke-sensor3.png'),
(12, 'Temperature Sensor', 'temperature-sensor2.png'),
(13, 'Light Sensor', 'light-sensor3.png'),
(14, 'Ultrasonic Sensor', 'ultrasonic.png'),
(15, 'Infrared Sensor', 'infrared.png'),
(20, 'Clock', 'timer7.png');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `ID` int(4) NOT NULL,
  `cameraID` int(4) NOT NULL DEFAULT '-1',
  `isImage` bit(1) DEFAULT NULL,
  `Value` int(4) DEFAULT NULL,
  `logInAttempt_IP` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `logInAttempt_count` int(2) DEFAULT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Device', b'1', '2016-12-22 09:24:40'),
(2, 'Task', b'1', '2016-12-22 14:55:07');

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
  `TaskName` varchar(50) CHARACTER SET utf8 NOT NULL,
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
(61, 1, 101, 101, b'0', b'0', b'1', 'Parents Room Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-16 21:22:01', b'1', NULL, NULL),
(65, 1, 102, 201, b'0', b'1', b'1', 'Boy Room Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-08 08:55:50', b'0', NULL, NULL),
(66, 5, 102, 201, b'0', b'0', b'0', 'Boy Room after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-08 08:56:14', b'0', NULL, NULL),
(70, 3, 101, 101, b'0', b'1', b'0', 'Parents Room after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-16 21:12:48', b'0', NULL, NULL),
(71, 1, 104, 401, b'0', b'0', b'1', 'Girl Room Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-21 06:34:51', b'0', NULL, NULL),
(72, 7, 104, 401, b'0', b'0', b'0', 'Girl Room after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-08 09:05:00', b'0', NULL, NULL),
(74, 1, 105, 501, b'0', b'1', b'1', 'Living Room Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-08 09:50:11', b'0', NULL, NULL),
(75, 1, 105, 501, b'0', b'1', b'1', 'Living Room Motion Room after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-22 14:55:11', b'0', NULL, NULL),
(76, 1, 106, 601, b'0', b'0', b'1', 'Kitchen Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-08 09:07:45', b'0', NULL, NULL),
(77, 4, 106, 601, b'0', b'0', b'0', 'Kitchen after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-21 20:33:40', b'0', NULL, NULL),
(78, 3, 108, 801, b'0', b'0', b'0', 'Bathroom after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-08 09:11:03', b'0', NULL, NULL),
(79, 1, 109, 901, b'0', b'0', b'1', 'Garage Motion', NULL, b'1', NULL, -1, -1, -1, '2016-12-08 09:11:37', b'0', NULL, NULL),
(80, 3, 109, 901, b'0', b'0', b'0', 'Garage after no Motion', NULL, b'1', NULL, -1, -1, 1, '2016-12-08 09:11:55', b'0', NULL, NULL),
(81, 4, 101, 102, b'0', b'0', b'0', 'AC ON', NULL, b'1', NULL, -1, -1, 25, '2016-12-08 10:22:30', b'0', NULL, NULL),
(82, 4, 101, 103, b'0', b'0', b'0', 'Light', NULL, b'1', NULL, -1, -1, 0, '2016-12-19 07:15:56', b'0', NULL, NULL),
(83, 1, 110, 1001, b'0', b'0', b'1', 'Camera', NULL, b'1', NULL, -1, -1, -1, '2016-12-21 20:38:24', b'0', NULL, NULL),
(84, 3, 110, 1002, b'0', b'0', b'0', 'Water Tank level 40%', NULL, b'1', NULL, -1, -1, 40, '2016-12-23 20:08:12', b'1', NULL, NULL),
(85, 1, 101, 100, b'0', b'0', b'0', 'Fajer prayer', '05:45:00', b'1', NULL, 1, 0, 0, '2017-01-08 22:04:48', b'0', NULL, NULL),
(93, 5, 102, 200, b'0', b'0', b'0', 'Work Alarm', '07:06:00', b'1', NULL, 10, 2, 0, '2016-12-23 19:38:19', b'0', NULL, NULL),
(94, 7, 104, 402, b'0', b'0', b'0', 'Turn AC OFF when Cold', NULL, b'1', NULL, -1, -1, 20, '2016-12-23 19:58:27', b'0', NULL, NULL),
(95, 4, 106, 602, b'0', b'0', b'0', 'Turn AC ON', NULL, b'1', NULL, -1, -1, 30, '2016-12-23 19:59:57', b'0', NULL, NULL),
(96, 1, 106, 604, b'0', b'0', b'1', 'Gas and Fire Detection', NULL, b'1', NULL, -1, -1, 0, '2016-12-23 20:02:31', b'1', NULL, NULL),
(97, 3, 110, 1002, b'0', b'0', b'0', 'Water Tank level 20%', NULL, b'1', NULL, -1, -1, 20, '2016-12-23 20:07:27', b'1', NULL, NULL),
(99, 1, 110, 1002, b'1', b'0', b'1', 'test', NULL, b'1', NULL, -1, -1, 30, '2016-12-31 15:11:56', b'1', NULL, NULL);

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
(83, 1001, 1, 8, -1, 480),
(83, 1002, 1, 1, -1, 480),
(84, 1001, -1, -1, -1, -1),
(84, 1002, -1, -1, -1, -1),
(97, 1001, -1, -1, -1, -1),
(97, 1002, -1, -1, -1, -1),
(99, 1001, -1, -1, -1, -1),
(99, 1002, -1, -1, -1, -1);

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
(61, 101, 1),
(61, 102, 1),
(61, 103, 1),
(61, 104, -1),
(65, 201, 1),
(65, 202, 1),
(65, 203, 1),
(65, 204, -1),
(66, 201, 0),
(66, 202, 0),
(66, 203, 0),
(66, 204, -1),
(70, 101, 0),
(70, 102, -1),
(70, 103, 0),
(70, 104, -1),
(71, 401, 1),
(71, 402, 1),
(71, 403, 1),
(71, 404, -1),
(72, 401, 0),
(72, 402, 0),
(72, 403, 0),
(72, 404, -1),
(74, 501, 1),
(74, 502, 1),
(74, 503, 1),
(74, 504, -1),
(75, 501, 0),
(75, 502, 0),
(75, 503, 0),
(75, 504, -1),
(76, 601, 1),
(76, 602, 1),
(76, 604, -1),
(77, 601, 0),
(77, 602, 0),
(77, 604, -1),
(78, 801, 0),
(79, 901, 1),
(79, 902, -1),
(80, 901, 0),
(80, 902, -1),
(81, 101, -1),
(81, 102, 1),
(81, 103, -1),
(81, 104, -1),
(82, 101, 1),
(82, 102, 1),
(82, 103, 0),
(82, 104, -1),
(83, 1004, -1),
(84, 1004, -1),
(85, 101, 1),
(85, 102, 0),
(85, 103, -1),
(85, 104, 1),
(93, 201, 1),
(93, 202, 0),
(93, 203, 1),
(93, 204, 1),
(94, 401, -1),
(94, 402, 0),
(94, 403, -1),
(94, 404, -1),
(95, 601, -1),
(95, 602, 1),
(95, 604, -1),
(96, 601, -1),
(96, 602, -1),
(96, 604, -1),
(97, 1004, -1),
(99, 1004, -1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(4) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `UserName` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0',
  `isDisabled` bit(1) NOT NULL DEFAULT b'0',
  `UserImagePath` varchar(200) CHARACTER SET utf8 DEFAULT 'Default_User_Img.png',
  `CellPhone` int(10) DEFAULT NULL,
  `SendEmail` bit(1) NOT NULL DEFAULT b'1',
  `SendSMS` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `UserName`, `Title`, `Password`, `isAdmin`, `isDisabled`, `UserImagePath`, `CellPhone`, `SendEmail`, `SendSMS`) VALUES
(1, 'mkb_2011@hotmail.com', 'System Admin', 'Admin', '$2y$10$P2EkzImuA0xKvjiiE5YvZ.ZXfHUkdsOU6xtZK3q/1K1HvbsIgVgbO', b'1', b'0', 'superAdmin.png', 542991095, b'1', b'0'),
(3, 'eyad.jaamour@gmail.com', 'Abdullah Alghamdi', 'Father', '$2y$10$ua9Sc12bcNP2uzN3/1Do1.p7Y1HaCmq9KwL4HTOpK87Jmn3CheEEm', b'1', b'0', 'abdullah.jpg', 555555555, b'1', b'0'),
(4, 'medo2011r@gmail.com', 'Huda Azzahrani', 'Mother', '$2y$10$U24g.LTwOCFzMRl8BfDljOzP.LAvfZjPmzttTiKh5NpyELHQkrshu', b'0', b'0', 'huda.png', 548251871, b'1', b'0'),
(5, 'eyad.jaamour@hotmail.com', 'Ahmad alghamdi', 'Son', '$2y$10$auoOYT5lBEmd6xm/HgT.x..7abTpb9/fTyMGsmJyulDAc7vKwFuWe', b'0', b'0', 'ahmad.jpg', 548922584, b'0', b'0'),
(7, 'meedoobak@gmail.com', 'Sarah Alghamdi', 'Daughter', '$2y$10$EXpJPNML2cVbeBP1olVnleLsouceWcHxB8SU7iCxei0u/6O25QH5G', b'0', b'0', 'sarah.png', 584965482, b'1', b'0');

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
(4, 105),
(4, 106),
(5, 102),
(5, 105),
(5, 109),
(7, 104),
(7, 105),
(7, 106);

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
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `MultimediaID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;
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
  MODIFY `LogRecordID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;
--
-- AUTO_INCREMENT for table `log_category`
--
ALTER TABLE `log_category`
  MODIFY `RecordCategoryID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `room_backgrounds`
--
ALTER TABLE `room_backgrounds`
  MODIFY `ImageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `device_stepper_motor_ibfk_1` FOREIGN KEY (`DeviceID`) REFERENCES `device` (`DeviceID`);

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
