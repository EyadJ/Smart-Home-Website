<?php

include_once("../models/device.php");

	$DeviceID = $_GET['DeviceID'];
	$newStatus = $_GET['newStatus'];

	Device::switchDeviceStatus($DeviceID, $newStatus);
	
	header("Location:../views/Rooms.php");
?>